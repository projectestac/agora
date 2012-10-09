<?php

//XTEC ************ FITXER AFEGIT - Automate course creation
//2012.10.08 @sarjona - Adapted to use adodb functions

/// Bulk course creation script from a comma separated file


// For speed reasons, bypasses ADODB so only works with MySQL
//  - Went from taking about half an hour to under a minute

// Additionally for speed reasons, INSERT queries are concatenated,
// and can get quite large: if you have checked everything, and 
// errors are occuring on large inserts, try upping the MySQL Server
// query limit (a function of "net buffer length", though more my.cnf/my.ini
// tweaking could be required)

// Somewhat hacked from /admin/uploaduser.php

// @Moodle: fgetcsv has been here since PHP3, it's much faster than any Perl-style explode tricks!

// Update: Minor changes to validation (seems faster, more extensible) and added
// appropriate SQL maintenance queries - quite a lot of database activity could
// cause problems, especially under MySQL.

// Update: Ability to specify slash-delimited "Category paths",
// and will also create new categories as necessary.

// N.B. If a category name is not unique, will pick the first one it comes across.

// Update: Can specify section headings (weeks/topics).

// Update: Can enrol course teachers and set associated information
//          Ability to specify user account via ID or a unique (for security reasons) search string
//          (as used on the Administration > Edit User Accounts page)

// N.B. Using user account search strings instead of IDs gives a performance hit with a large number of teachers

// I did not add Student enrolment, though this would be relatively trivial, as this is already
// handled by the far more elegant enrolment plugin system.
// Teachers are a sort of "course property", but Students are not.

// Rory Allford (rory@allford.net)





// -----------------------------------------------------------------------------------------------------

// UPDATED BY: Ashley Gooding & Cole Spicer
// UPDATE: Added compatability for newer versions of moodle as well as made future updates easier
//                Just add new mdl_course column names to $optional and $validate arrays.
// DATE: 3/27/07
// @version v1.1

// -----------------------------------------------------------------------------------------------------


// -----------------------------------------------------------------------------------------------------

// UPDATED BY: Ashley Gooding & Cole Spicer
// UPDATE: Add template functionality. Specify the shortname of an existing course to serve as a template.
// DATE: 5/9/07
// @version v1.2

// -----------------------------------------------------------------------------------------------------




//error_reporting(E_ALL | E_STRICT );

// Some Regex constants

    define('TOPIC_FIELD','/^(topic)([0-9]|[1-4][0-9]|5[0-2])$/');
    define('TEACHER_FIELD','/^(teacher)([1-9]+\d*)(_account|_role)$/');

    require_once('../config.php');
    require_once("../course/lib.php");
    require_once("$CFG->libdir/blocklib.php");
    $courseid=-1;

    function csverror($message, $link='') {
        global $CFG, $SESSION;
    
        print_heading(get_string('error'));
        echo '<br />';
    
        $message = clean_text($message);
    
        print_simple_box($message, 'center', '', '#FFBBBB', 5, 'errorbox');
    
        if (!$link) {
            if ( !empty($SESSION->fromurl) ) {
                $link = $SESSION->fromurl;
                unset($SESSION->fromurl);
            } else {
                $link = $CFG->wwwroot .'/';
            }
        }
        print_continue($link);
        print_footer();
        die;
    }

    function getdefaultcategory() {
        global $CFG;
        global $USER;
        
        $categoryid = 1;
        if ($rs = get_record_sql('SELECT MIN(id) as mincategory FROM '.$CFG->prefix.'course_categories')){
            $categoryid = $rs->mincategory;
        } else{
            csverror('You have no category table!','uploadcourse.php?sesskey='.$USER->sesskey);
        }
        return $categoryid;
    }
    function checkisint($supposedint) {
        return ((string)intval($supposedint) == $supposedint) ? true : false;
    }
    function checkisstring($supposedstring) {
        $supposedstring = trim($supposedstring); // Is it just spaces?
        return (strlen($supposedstring) == 0) ? false : true;
    }
    function validateas($value, $validatename, $lineno, $fieldname = '') {
  
        // Validates each field based on information in the $validate array
        global $USER;
        global $validate;
        
        ($fieldname=='') and ($fieldname=$validatename);
                                
        (isset($validate[$validatename])) or csverror('Coding Error: Unvalidated field type: "'.$validatename.'"','uploadcourse.php?sesskey='.$USER->sesskey);

        $format = $validate[$validatename];

        switch($format[0]) {
        case 1: // String
                if (($maxlen = $format[1])!=0)  // Max length?
                    (strlen($value) <=$format[1]) or csverror('Invalid value for field '.$fieldname.' (length &gt; '.$format[1].'). '.
                                      get_string('erroronline', 'error', $lineno) .". ".
                                      get_string('processingstops', 'error'), 
                                      'uploadcourse.php?sesskey='.$USER->sesskey);
                if ($format[2] == 1) // Not null?
                    checkisstring($value) or csverror('Invalid value for field '.$fieldname.' (only spaces or missing). '.
                                  get_string('erroronline', 'error', $lineno) .". ".
                                  get_string('processingstops', 'error'), 
                                  'uploadcourse.php?sesskey='.$USER->sesskey);
        break;

        case 2: // Integer
                checkisint($value) or csverror('Invalid value for field '.$fieldname.' (not an integer). '.
                                  get_string('erroronline', 'error', $lineno) .". ".
                                  get_string('processingstops', 'error'), 
                                  'uploadcourse.php?sesskey='.$USER->sesskey);
                
                if (($max = $format[1])!=0)  // Max value?
                    ($value <= $max) or csverror('Invalid value for field '.$fieldname.' (&gt; '.$max.'). '.
                          get_string('erroronline', 'error', $lineno) .". ".
                          get_string('processingstops', 'error'), 
                          'uploadcourse.php?sesskey='.$USER->sesskey);

                $min = $format[2];  // Min value
                    ($value >= $min) or csverror('Invalid value for field '.$fieldname.' (&lt; '.$min.'). '.
                          get_string('erroronline', 'error', $lineno) .". ".
                          get_string('processingstops', 'error'), 
                          'uploadcourse.php?sesskey='.$USER->sesskey);
        break;
    
        case 3: // Timestamp - validates and converts to Unix Time
            if (($value = strtotime($value)) < 1)
                                csverror('Invalid value for field '.$fieldname.' (Bad Timestamp). '.
                                  get_string('erroronline', 'error', $lineno) .". ".
                                  get_string('processingstops', 'error'), 
                                  'uploadcourse.php?sesskey='.$USER->sesskey);
        break;

        case 4: // Domain
            $validvalues = explode(',',$format[1]);
            if (array_search($value,$validvalues)===false)
                    csverror('Invalid value for field '.$fieldname.' (Must be one of {'.$format[1].'}). '.
                      get_string('erroronline', 'error', $lineno) .". ".
                      get_string('processingstops', 'error'), 
                      'uploadcourse.php?sesskey='.$USER->sesskey);
        break; 

        case 5: // Category
            if (checkisint($value)) {
              // It's a Category ID Number
                categoryexists_ex($value) or csverror('Invalid value for field '.$fieldname.' (No Category with ID '.$value.'). '.
                          get_string('erroronline', 'error', $lineno) .". ".
                          get_string('processingstops', 'error'), 
                          'uploadcourse.php?sesskey='.$USER->sesskey);
            } elseif(checkisstring($value)) {
               // It's a Category Path string
               
               $value=trim(str_replace('\\','/',$value)," \t\n\r\0\x0B/");
               // Clean path, ensuring all slashes are forward ones
               
               (strlen($value)>0) or csverror('Invalid value for field '.$fieldname.' (Path string not set). '.
                          get_string('erroronline', 'error', $lineno) .". ".
                          get_string('processingstops', 'error'), 
                          'uploadcourse.php?sesskey='.$USER->sesskey);
                
                unset ($cats);
                $cats=explode('/',$value); // Break up path into array
                
                (count($cats)>0) or csverror('Invalid value for field '.$fieldname.' (Path string "'.$value.'" invalid - not delimited correctly). '.
                          get_string('erroronline', 'error', $lineno) .". ".
                          get_string('processingstops', 'error'), 
                          'uploadcourse.php?sesskey='.$USER->sesskey);
                          
                foreach ($cats as $n => $item) { // Validate the path
                  
                  $item=trim($item); // Remove whitespace
                  
                  (strlen($item) <= 255) or csverror('Invalid value for field '.$fieldname.' (Category name "'.$item.'" length &gt; 255). '.
                                      get_string('erroronline', 'error', $lineno) .". ".
                                      get_string('processingstops', 'error'), 
                                      'uploadcourse.php?sesskey='.$USER->sesskey);
                  
                  checkisstring($item) or csverror('Invalid value for field '.$fieldname.' (Path string "'.$value.'" invalid - category name at position '.($n+1).' as shown is invalid). '.
                      get_string('erroronline', 'error', $lineno) .". ".
                      get_string('processingstops', 'error'), 
                      'uploadcourse.php?sesskey='.$USER->sesskey); 
                }
                
                $value=$cats; // Return the array
                unset ($cats);
               
            } else {
               csverror('Invalid value for field '.$fieldname.' (not an integer or string). '.
                      get_string('erroronline', 'error', $lineno) .". ".
                      get_string('processingstops', 'error'), 
                      'uploadcourse.php?sesskey='.$USER->sesskey); 
            }
        break;
        case 6: // User ID or Name (Search String)
            $value=trim($value);
            if (checkisint($value)) { // User ID
                userexists_ex($value)  or csverror('Invalid value for field '.$fieldname.' (No User with ID '.$value.'). '.
                          get_string('erroronline', 'error', $lineno) .". ".
                          get_string('processingstops', 'error'), 
                          'uploadcourse.php?sesskey='.$USER->sesskey);
            } elseif (checkisstring($value)) { // User Search String
                // Only PHP5 supports named arguments
                $usersearch=get_users_listing('lastaccess','ASC',0,99999,$value,'','');
                if (isset($usersearch) and ($usersearch!==false) and is_array($usersearch) and (($ucount=count($usersearch))>0)) {
                    ($ucount==1) or csverror('Invalid value for field '.$fieldname.' (Search string ambiguous; returned multiple ['.$ucount.'] results). '.
                                  get_string('erroronline', 'error', $lineno) .". ".
                                  get_string('processingstops', 'error'), 
                                  'uploadcourse.php?sesskey='.$USER->sesskey);
                    reset($usersearch);
                    $uid=key($usersearch);
                    (checkisint($uid) && userexists_ex($uid)) or csverror('Invalid value for field '.$fieldname.' (Search string returned a nonexistent user ?!). '.
                                  get_string('erroronline', 'error', $lineno) .". ".
                                  get_string('processingstops', 'error'), 
                                  'uploadcourse.php?sesskey='.$USER->sesskey);
                    $value=$uid; // Return found user id
                } else {
                    csverror('Invalid value for field '.$fieldname.' (Search string returned no results). '.
                                  get_string('erroronline', 'error', $lineno) .". ".
                                  get_string('processingstops', 'error'), 
                                  'uploadcourse.php?sesskey='.$USER->sesskey);
                }
            } else {
              if ($format[2] == 1) // Not null?
                    csverror('Invalid value for field '.$fieldname.' (only spaces or missing). '.
                                  get_string('erroronline', 'error', $lineno) .". ".
                                  get_string('processingstops', 'error'), 
                                  'uploadcourse.php?sesskey='.$USER->sesskey);
            }
        break; 

        default:
            csverror('Coding Error: Bad field validation type: "'.$fieldname.'"','uploadcourse.php?sesskey='.$USER->sesskey);
        break;
        }

        return $value;

    }
    function categoryexists_ex($categoryid) {
        // Does category with given id exist?
        global $CFG;
        
        if ($rs = get_record('course_categories', 'id', $categoryid) ){
            return $rs->id ? true : false;
        } else {
            return false;
        }
    }
    function userexists_ex($userid) {
        // Does category with given id exist?
        global $CFG;
        
        if ($rs = get_record ('user', 'deleted', 0, 'id', $userid) ){
            return $rs->id ? true : false;
        } else {
            return false;
        }
    }
    function microtime_float()
    {
        // In case we don't have php5
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
    function mystr($value)
    {
        // Prepare $value for inclusion in SQL Query
//        return '\''.mysql_real_escape_string(mb_convert_encoding($value, "UTF-8")).'\'';;
        return mb_convert_encoding($value, "UTF-8");
    }
    
    function fast_get_category_ex($hname, &$hstatus, $hparent=0)
    {
        // Find category with the given name and parentID, or create it, in both cases returning a category ID
        /* $hstatus:
            -1  :   Failed to create category
            1   :   Existing category found
            2   :   Created new category successfully
        */
        
        static $cat;
        static $cname;
        
        global $CFG;
        global $USER;
        
        $cname = mystr($hname);
        
        // Check if a category with the same name and parent ID already exists
        if ($rs = get_record ('course_categories', 'name', $hname, 'parent', $hparent) ){
            $cat = $rs->id;
            $hparent = $rs->parent;
            $hstatus=1;
            return $cat;
        } else {
            // Create it - moodle does set sortorder to 999, and doesn't use the description field
            $course_category = new stdClass();
            $course_category->name = $hname;
            $course_category->description ='';
            $course_category->parent =$hparent;
            $course_category->sortorder =999;
            $course_category->coursecount =0;
            $course_category->visible =1;
            $course_category->timemodified =0;
            
            if ($categoryid = insert_record('course_categories', $course_category)){
                $hstatus = 2;
                return $categoryid;
            } else{
              // Failed!
                $hstatus=-1;
                return -1;
            }
        }      
    }
    
    function fast_is_course($hshortname) {
        // Does a course with the given shortname exist?
        global $CFG;
                
        if ($rs = get_record('course',  'ShortName', $hshortname) ) { // Check shortname is unique before inserting 
            if ($rs->id)
              return true;
        }
        return false;
    }
    
	// Edited by Ashley Gooding & Cole Spicer to fix problems with 1.7.1 and make easier to dynamically add new columns
    function fastcreatecourse_ex($hcategory, $course, $header, $validate) { 
		if(!is_array($course) || !is_array($header) || !is_array($validate)) {
			return -2;
		}  
		 
        global $CFG, $optional;
        // declaring as static prevents object pointers being continually created and destroyed, saving time in theory
        static $courseid;
        static $dcomma; // Creating SQL for composite fields
        static $dtopics;
        static $dtopicno;
        static $dtopicname;
        static $dteachers;
        static $dteacherno;
        static $dteacherdata;
			
	// Dynamically Create Query Based on number of headings excluding Teacher[1,2,...] and Topic[1,2,...]
        // Added for increased functionality with newer versions of moodle
	// Author: Ashley Gooding & Cole Spicer
        static $tempstring;
        
        $course_category = new stdClass();
        $course_category->category = $hcategory;                                
        $course_category->modinfo = '';                                
        foreach ($header as $i => $col) {
            $col = strtolower($col);
            if(preg_match(TOPIC_FIELD, $col) || preg_match(TEACHER_FIELD, $col) || $col == 'category' || $col == 'template') {
                    continue;
            }
            if($col == 'expirythreshold') {
                    $course[$col] = $course[$col]*86400;
            }
            $temparray = explode(',',$validate[$col][1]);
            if($validate[$col][0] == 1 || ($validate[$col][0] == 4  && !checkisint($temparray[0]) ) ) { //String or Domain with strings
                $course_category->$col = mystr($course[$col]);
            } else {
                $course_category->$col = $course[$col];
            }
        }

        if (isset($exist_maxbyes) && (!$exist_maxbyes)){
            $course_category->maxbytes = $optional['maxbytes'];
        }

        if (!$courseid = insert_record('course', $course_category)){
            return -2;
        }
        
        if(isset($course['template']) && $course['template'] != '') {
            if (!$rs = get_record('course', 'shortname', $course['template']) ) { 
                return -7;
            }
                        
            if (!execute_sql('INSERT INTO '.$CFG->prefix.'block_instance (blockid, pageid, pagetype, position, weight, visible, configdata) SELECT blockid, '.$courseid.', pagetype, position, weight, visible, configdata FROM '.$CFG->prefix.'block_instance WHERE pageid = '.$rs->id)){
                return -8;
            }
        }
        else {
            $page = page_create_object(PAGE_COURSE_VIEW, $courseid);
            blocks_repopulate_page($page); // Setup blocks
        }
        
        
        $dtopics=''; // String concatenation for topic INSERT
        $dcomma=false; // Should we add a comma before the next item?
        
        if (isset($course['topics'])) { // Any topic headings specified ?
            foreach($course['topics'] as $dtopicno => $dtopicname) 
            if ($dtopicno <= $course['numsections']) { // Avoid overflowing topic headings
              if ($dcomma==true) { 
                    $dtopics.=',';
                } else {
                  $dcomma=true;
                }
                $dtopics.='('.$courseid.','.mystr($dtopicno).','.mystr($dtopicname).',\'\',\'1\')';
            }
        }
        
        if (!isset($course['topics'][0])) {
            // Ensure at least default topic section exists
            if ($dcomma==true) { 
                $dtopics.=',';
            } else {
              $dcomma=true;
            }
            $dtopics.='(\''.$courseid.'\',\'0\',\'\',\'\',\'1\');';
        } else {
            $dtopics.=';';
        }
        
        $course_section = new stdClass();
        $course_section->course = $courseid;
        $course_section->section = 0;
        $course_section->summary = '';
        $course_section->sequence = '';
        $course_section->visible = 1;

        if (!insert_record('course_sections', $course_section)){
            return -3;
        }
        
        $dteachers=''; // String concatenation for topic INSERT
        $dcomma=false; // Should we add a comma before the next item?
        
		
		
		
		// SELECT id FROM mdl_role WHERE name = blah
		// use that id and change insert to:
		// mdl_role_assignments
		// roleid   	 contextid   	 userid   	timemodified   	 modifierid   	 enrol
		//               courseshit                                       0         'manual'
		
		// If SELECT id...  doesnt work (returns false or contians no items) then throw error
		
		$roleid;
		
		if (!$context = get_context_instance(CONTEXT_COURSE, $courseid)) {
        	return -6;
    	}
		
        if (isset($course['teachers_enrol']) && (count($course['teachers_enrol'])>0)) { // Any teachers specified?
            $role_assignment = new stdClass();
            $role_assignment->contextid = $context->id;
            $role_assignment->timemodified = $course['timecreated'];
            $role_assignment->modifierid = 0;
            $role_assignment->enrol = 'manual';

            foreach($course['teachers_enrol'] as $dteacherno => $dteacherdata) {
                if (isset($dteacherdata['_account'])) {
                    $role_assignment->userid = $dteacherdata['_account'];
                    if (!$rs = get_record('role', 'shortname', $dteacherdata['_role']) ) {
                        return -5;
                    } 
                    $role_assignment->roleid = $rs->id;
                }
                insert_record('role_assignments', $role_assignment);                
            }
        }       
        
        return 1;
    }

    require_login();
    
    $stradministration = get_string('administration');
    $strchoose = get_string('choose');
    $struploadcourses = 'Upload Courses';
    
    /// Print the header

    //XTEC ************ MODIFICAT - To avoid deprecated warnings
    //2012.10.09 @sarjona
    $navlinks = array();
    $navlinks[] = array('name' => $struploadcourses,
                                            'link' =>'#',
                                            'type' => 'misc');
    $navigation = build_navigation($navlinks);
    print_header_simple(format_string($struploadcourses), "",
                 $navigation, "", "", true, "", '');    
    //************ ORIGINAL
    /*    
    print_header("$site->shortname: $struploadcourses", $site->fullname, 
                 "<a href=\"index.php\">$stradministration</a> -> $struploadcourses");

    */
    //************ FI
    if (is_agora() && !is_xtecadmin() || (!is_agora() && !isadmin())){
        csverror('You must be a super-administrator to add courses in this way.');
    }

/*    if (!confirm_sesskey()) {
        csverror(get_string('confirmsesskeybad', 'error'));
    } */

    if (! $site = get_site()) {
        csverror('Could not find site-level course');
    }

    if (!$adminuser = get_admin()) {
        csverror('Could not find site admin');
    }

    set_time_limit(300); // Up the php timeout
    $time_start = microtime_float(); // Just for timing



    $csv_encode = '/\&\#44/';
    if (isset($CFG->CSV_DELIMITER)) {        
        $csv_delimiter = '\\' . $CFG->CSV_DELIMITER;
        $csv_delimiter2 = $CFG->CSV_DELIMITER;

        if (isset($CFG->CSV_ENCODE)) {
            $csv_encode = '/\&\#' . $CFG->CSV_ENCODE . '/';
        }
    } else {
        $csv_delimiter = '\,';
        $csv_delimiter2 = ',';
    }



/// If a file has been uploaded, then process it

    
    require_once($CFG->dirroot.'/lib/uploadlib.php');
    
    $um = new upload_manager('coursefile',false,false,null,false,0);
    if ($um->preprocess_files()) {
  
        if (!isset($um->files['coursefile']))
            csverror('Upload Error!', 'uploadcourse.php?sesskey='.$USER->sesskey);
        
        $filename = $um->files['coursefile']['tmp_name'];
        
        // Everything to Unix Line Endings
        $text = my_file_get_contents($filename);
        $text = preg_replace('!\r\n?!',"\n",$text);
        if ($fp = fopen($filename, "w")) {
            fwrite($fp,$text);
            unset($text); // Memory!
            fclose($fp);
        } else {
            csverror('File I/O Error! (1)', 'uploadcourse.php?sesskey='.$USER->sesskey);
        }

        if (!$fp = fopen($filename, "r")) {
            csverror('File I/O Error! (2)', 'uploadcourse.php?sesskey='.$USER->sesskey);
        } 

        // make arrays of fields for error checking
        $defaultcategory = getdefaultcategory();
        $defaultmtime = time();

        $required = array(  'fullname' => false, // Mandatory fields
                            'shortname' => false);

        $optional = array(  'category' => $defaultcategory, // Default values for optional fields
                            'sortorder' => 0,
                            'summary' => 'Write a concise and interesting paragraph here that explains what this course is about',
                            'format' => 'weeks',
                            'showgrades' => 1,
                            'newsitems' => 5,
                            'teacher' => 'Teacher',
                            'teachers' => 'Teachers',
                            'student' => 'Student',
                            'students' => 'Students',
                            'startdate' => $defaultmtime,
                            'numsections' => 10,
                            'maxbytes' => get_max_upload_file_size(),
                            'visible' => 1,
                            'groupmode' => 0,
                            'timecreated' => $defaultmtime,
                            'timemodified' => $defaultmtime,
                            'idnumber' => '',
                            'password' => '',
                            'enrolperiod' => 0,
                            'groupmodeforce' => 0,
                            'metacourse' => 0,
                            'lang' => '',
                            'theme' => '',
                            'cost' => '',
                            'showreports' => 0,
                            'guest' => 0,
							'enrollable' => 1,
							'enrolstartdate' => $defaultmtime,
							'enrolenddate' => $defaultmtime,
							'notifystudents' => 0,
							'template' => '',
							'expirynotify' => 0,
							'expirythreshold' => 10);

        $validate = array(  'fullname' => array(1,254,1), // Validation information - see validateas function
                            'shortname' => array(1,100,1),
                            'category' => array(5),
                            'sortorder' => array(2,4294967295,0),
                            'summary' => array(1,0,0),
                            'format' => array(4,'social,topics,weeks'),
                            'showgrades' => array(4,'0,1'),
                            'newsitems' => array(2,10,0),
                            'teacher' => array(1,100,1),
                            'teachers' => array(1,100,1),
                            'student' => array(1,100,1),
                            'students' => array(1,100,1),
                            'startdate' => array(3),
                            'numsections' => array(2,52,0),
                            'maxbytes' => array(2,$CFG->maxbytes,0),
                            'visible' => array(4,'0,1'),
                            'groupmode' => array(4,NOGROUPS.','.SEPARATEGROUPS.','.VISIBLEGROUPS),
                            'timecreated' => array(3),
                            'timemodified' => array(3),
                            'idnumber' => array(1,100,0),
                            'password' => array(1,50,0),
                            'enrolperiod' => array(2,4294967295,0),
                            'groupmodeforce' => array(4,'0,1'),
                            'metacourse' => array(4,'0,1'),
                            'lang' => array(1,50,0),
                            'theme' => array(1,50,0),
                            'cost' => array(1,10,0),
                            'showreports' => array(4,'0,1'),
                            'guest' => array(4,'0,1,2'),
							'enrollable' => array(4,'0,1'),
							'enrolstartdate' => array(3),
							'enrolenddate' => array(3),
							'notifystudents' => array(4,'0,1'),
							'template' => array(1,0,0),
							'expirynotify' => array(4,'0,1'),
							'expirythreshold' => array(2,30,1), // Following ones cater for [something]N
                            'topic' => array(1,0,0),
                            'teacher_account' => array(6,0),
                            'teacher_role' => array(1,40,0));

        $header = fgetcsv($fp, 1024);
        // check for valid field names

        if (($header[0]==null)&&(count($line)<1)) // Blank Line?
            csverror('First line must be the CSV header', 'uploadcourse.php?sesskey='.$USER->sesskey);  
        
        foreach ($header as $i => $h) {
            if ($h==null)
                csverror('Null CSV columns are not permitted in header', 'uploadcourse.php?sesskey='.$USER->sesskey);
                        if (preg_match(TOPIC_FIELD,$h)) { // Regex defined header names
                        } elseif (preg_match(TEACHER_FIELD,$h)) {                         
                        } else {
                if (!(isset($required[$h]) || isset($optional[$h]))) 
                    csverror(get_string('invalidfieldname', 'error', $h), 'uploadcourse.php?sesskey='.$USER->sesskey);
    
                if (isset($required[$h])) $required[$h] = true; // Mark Field as present
            }
        }
        // check for required fields
        foreach ($required as $key => $value) {
            if ($value != true) 
                csverror(get_string('fieldrequired', 'error', $key), 'uploadcourse.php?sesskey='.$USER->sesskey);
        }

        $fieldcount = count($header);
        $lineno=2;
        unset($bulkcourses);

        while (($line = fgetcsv($fp, 1024)) !== false) {
            if (($line[0]!=null)||(count($line)>1)) { // Blank Line?
                if (count($line) > $fieldcount)
                    csverror('Too many actual values. '.
                              get_string('erroronline', 'error', $lineno) .". ".
                              get_string('processingstops', 'error'), 
                              'uploadcourse.php?sesskey='.$USER->sesskey);
                foreach ($header as $i => $h) {
                    // Is line complete?
                    if (!isset($line[$i])) {
                        csverror(get_string('missingfield', 'error', $h). ". ".
                              get_string('erroronline', 'error', $lineno) .". ".
                              get_string('processingstops', 'error'), 
                              'uploadcourse.php?sesskey='.$USER->sesskey);
                    }
                }
                unset($coursetocreate);
                unset($coursetopics);
                unset($courseteachers);
                foreach ($optional as $key => $value) { // Set course array to defaults
                    $coursetocreate[$key] = $value;
                }
                foreach ($line as $key => $value) { // Validate each value
                    $cf = $header[$key];
                    if (preg_match(TOPIC_FIELD,$cf,$matches)) {
                      $coursetopics[$matches[2]] = validateas($value,$matches[1], $lineno, $cf);
                    } elseif (preg_match(TEACHER_FIELD,$cf,$matches)) {
                      $tmp=validateas($value,$matches[1].$matches[3], $lineno, $cf);
                      (isset($tmp)&&($tmp!='')) and
                          ($courseteachers[$matches[2]][$matches[3]] = $tmp);
                    } else {
                        $coursetocreate[$cf] = validateas($value, $cf, $lineno); // Accept value if it passed validation
                    }
                }
//                $coursetocreate['topics'] = $coursetopics;
				
                if (isset($courseteachers))
                foreach ($courseteachers as $key => $value) // Deep validate course teacher info on second pass
                {
                  if (isset($value) && (count($value) > 0)){
                    if (!(isset($value['_account'])&&checkisint($value['_account'])))
                         csverror('Invalid value for field teacher'.$key.' - other fields were specified but required teacher'.$key.'_account was null. '.
                          get_string('erroronline', 'error', $lineno) .". ".
                          get_string('processingstops', 'error'), 
                          'uploadcourse.php?sesskey='.$USER->sesskey);
                    // Hardcoded default values (that are as close to moodle's UI as possible)
                    // and we can't assume PHP5 so no pointers!
                    if (!isset($value['_role']))
                        $courseteachers[$key]['_role'] = '';
                  }
                }
                $coursetocreate['teachers_enrol'] = $courseteachers;
                $bulkcourses[] = $coursetocreate; // Merge into array
            }
            $lineno++;
        }

        fclose($fp);
        
        if ((!isset($bulkcourses)) or (count($bulkcourses)==0))
            csverror('No courses were parsed from CSV', 'uploadcourse.php?sesskey='.$USER->sesskey);
        else
            notify('Parsed '.count($bulkcourses).' course(s) from CSV','notifysuccess');
            
        // Running Status Totals
        
        $t = 0; // Read courses
        $s = 0; // Skipped courses
        $n = 0; // Created courses
        $p = 0; // Broken courses (failed halfway through
        
        $cat_e = 0; // Errored categories
        $cat_c = 0; // Created categories

        foreach ($bulkcourses as $bulkcourse) {
            // Try to create the course
            if (!fast_is_course($bulkcourse['shortname'])) {
              
                $coursetocategory = 0; // Category ID
                
                if (is_array($bulkcourse['category'])) {
                    // Course Category creation routine as a category path was given
                    
                    $curparent=0;
                    $curstatus=0;
    
                    foreach ($bulkcourse['category'] as $catindex => $catname) {
                      $curparent = fast_get_category_ex($catname,$curstatus,$curparent);
                        switch ($curstatus) {
                          case 1: // Skipped the category, already exists
                          break;
                          case 2: // Created a category
                            $cat_c++;
                          break;
                          default:
                            $cat_e+=count($bulkcourse['category']) - $catindex;
                            $coursetocategory=-1;
                            notify('An error occured creating category with name '.$catname.', meaning a total '.(count($bulkcourse['category']) - $catindex).' category(ies) failed','notifyproblem');
                          break 2;
                        }      
                    }
                    ($coursetocategory==-1) or $coursetocategory = $curparent;
                    // Last category created will contain the actual course
                } else {
                    // It's just a straight category ID
                    $coursetocategory=$bulkcourse['category'];
                }
                
                if ($coursetocategory==-1) {
                    notify('Course with ShortName '.$bulkcourse['shortname'].' could not be created because parent category(ies) failed','notifyproblem');
                } else {
                    //switch (fastcreatecourse_ex($coursetocategory, $bulkcourse['sortorder'], $bulkcourse['fullname'], $bulkcourse['shortname'], $bulkcourse['summary'], $bulkcourse['format'], $bulkcourse['showgrades'], $bulkcourse['newsitems'], $bulkcourse['teacher'], $bulkcourse['teachers'], $bulkcourse['student'], $bulkcourse['students'], $bulkcourse['startdate'], $bulkcourse['numsections'], $bulkcourse['maxbytes'], $bulkcourse['visible'], $bulkcourse['groupmode'], $bulkcourse['timecreated'], $bulkcourse['timemodified'], $bulkcourse['idnumber'], $bulkcourse['password'], $bulkcourse['enrolperiod'], $bulkcourse['groupmodeforce'], $bulkcourse['metacourse'], $bulkcourse['lang'], $bulkcourse['theme'], $bulkcourse['cost'], $bulkcourse['showreports'], $bulkcourse['guest'], $bulkcourse['enrollable'], $bulkcourse['enrolstartdate'], $bulkcourse['enrolenddate'], $bulkcourse['notifystudents'], $bulkcourse['expirynotify'], $bulkcourse['expirythreshold'], $bulkcourse, $header, $validate, $bulkcourse['topics'], $bulkcourse['teachers_enrol'])) {
					switch (fastcreatecourse_ex($coursetocategory, $bulkcourse, $header, $validate)) {
                    case 1:
                        $n++; // Succeeded
                    break;
                    case -3:
                        notify('Could not create topic sections for course with ShortName '.$bulkcourse['shortname'],'notifyproblem');
                        $p++;
                    break;
                    case -4:
                        notify('Could not enrol teachers for course with ShortName '.$bulkcourse['shortname'],'notifyproblem');
                        $p++;
                    break;
					case -5:
						notify('Could not find teacher role for course with ShortName '.$bulkcourse['shortname'],'notifyproblem');
						$p++;
					break;
					case -6:
						notify('Could not enrol teacher for course due to course misconfiguration. Course ShortName: '.$bulkcourse['shortname'],'notifyproblem');
						$p++;
					break;
					case -7:
						notify('Could not find template for course with ShortName '.$bulkcourse['template'].' Course with ShortName '.$bulkcourse['shortname'].' failed.','notifyproblem');
						$p++;
					break;	
					case -8:
						notify('SQL Template Error for template course with ShortName '.$bulkcourse['template'].' Course with ShortName '.$bulkcourse['shortname'].' failed.','notifyproblem');
						$p++;
					break;	
                    default:
                        notify('An Error occured creating course with ShortName '.$bulkcourse['shortname'],'notifyproblem');
                    break;
                }
              }
            } else {
              // Skip course, already exists
              $s++;
            }
            $t++;
        }    

        notify('Created '.$n.' course(s) out of '.$t,'notifysuccess');

        if ($s > 0)
            notify ($s.' course(s) were skipped (duplicate ShortName)','notifysuccess');
        if ($p > 0)
            notify ($p.' course(s) could not be fully created, due to errors. Though they make work, it is advisable to delete them and try again.','notifyproblem');
            
        if (($e = $t - $n - $s - $p) > 0)
            notify ($e.' course(s) failed due to errors','notifyproblem');
        
        if ($cat_e > 0)
            notify ($cat_e.' new category(ies) failed due to errors','notifyproblem');
            
        if ($cat_c > 0) {
            notify ($cat_c.' new category(ies) were created','notifysuccess');
            notify ('You may wish to manually Re-Sort the categories','notifysuccess');
            
            // We don't automatically sort alphabetically, as the somewhat clunky category sorting
            // method used by moodle could annoy the user
        }
        
        
    
        fix_course_sortorder(); // Re-sort courses
        
        notify('Re-Sorted courses','notifysuccess');
        
/*        // We potentially did a lot to the Database: avoid tempting fate
        if (mysql_query('ANALYZE TABLE `'.$CFG->prefix.'course`') && mysql_query('ANALYZE TABLE `'.$CFG->prefix.'course_categories`') && mysql_query('ANALYZE TABLE `'.$CFG->prefix.'course_sections`') && mysql_query('ANALYZE TABLE `'.$CFG->prefix.'user_teachers`'))
            notify('ANALYZE Database Tables OK','notifysuccess');
        else
            notify('Could not ANALYZE Database Tables (`'.$CFG->prefix.'course`, `'.$CFG->prefix.'course_categories`, `'.$CFG->prefix.'course_sections` and `'.$CFG->prefix.'user_teachers`) - You should do this manually','notifyproblem');

        if (mysql_query('OPTIMIZE TABLE `'.$CFG->prefix.'course`') && mysql_query('OPTIMIZE TABLE `'.$CFG->prefix.'course_categories`') && mysql_query('OPTIMIZE TABLE `'.$CFG->prefix.'course_sections`') && mysql_query('OPTIMIZE TABLE `'.$CFG->prefix.'user_teachers`'))
            notify('OPTIMIZE Database Tables OK','notifysuccess');
        else
            notify('Could not OPTIMIZE Database Tables (`'.$CFG->prefix.'course`, `'.$CFG->prefix.'course_categories`, `'.$CFG->prefix.'course_sections` and `'.$CFG->prefix.'user_teachers`) - You should do this manually','notifyproblem');
*/
        $time_end = microtime_float();

        notify('Total Execution Time: '.round(($time_end - $time_start),2).' s','notifysuccess');

        echo '<hr />';
        
    } else {
    
    // Print Help
    
    ?><center><p>Upload an <a href="http://www.rfc-editor.org/rfc/rfc4180.txt" target="_blank">RFC4180</a>-Compliant CSV file.<br />Valid fields for each course are:</p><table border="1" style="font-family:monospace;font-size:8pt;width:500px;">
<tr><th>Field</th><th>Value</th></tr>
<tr><td>category</td><td>[Forward]Slash-Delimited Category &quot;Path&quot; String (new categories are created as necessary) OR Integer Database Category ID</td></tr>
<tr><td>cost</td><td>String(10)</td></tr>
<tr><td>enrolperiod</td><td>Integer/Seconds</td></tr>
<tr><td>enrollable</td><td>0=FALSE,1=TRUE</td></tr>
<tr><td>enrolstartdate</td><td>String Date Literal</td></tr>
<tr><td>enrolenddate</td><td>String Date Literal</td></tr>
<tr><td>expirynotify</td><td>0=FALSE,1=TRUE</td></tr>
<tr><td>expirythreshold</td><td>Integer Value Between 10-30</td></tr>
<tr><td>format</td><td>String('social','topics','weeks')</td></tr>
<tr><td>fullname</td><td>String(254)</td></tr>
<tr><td>groupmode</td><td>0=NOGROUPS,1=SEPARATEGROUPS,2=VISIBLEGROUPS</td></tr>
<tr><td>groupmodeforce</td><td>0=FALSE,1=TRUE</td></tr>
<tr><td>guest</td><td>0=NO,1=YES,2=WITHKEY</td></tr>
<tr><td>idnumber</td><td>String(100)</td></tr>
<tr><td>lang</td><td>String(10)</td></tr>
<tr><td>maxbytes</td><td>Integer(Site Max)</td></tr>
<tr><td>metacourse</td><td>0=FALSE,1=TRUE</td></tr>
<tr><td>newsitems</td><td>Integer(10)</td></tr>
<tr><td>notifystudents</td><td>0=FALSE,1=TRUE</td></tr>
<tr><td>numsections</td><td>Integer(52)</td></tr>
<tr><td>password</td><td>String(50)</td></tr>
<tr><td>shortname</td><td>String(100)</td></tr>
<tr><td>showgrades</td><td>0=FALSE,1=TRUE</td></tr>
<tr><td>showreports</td><td>0=FALSE,1=TRUE</td></tr>
<tr><td>sortorder</td><td>Integer</td></tr>
<tr><td>startdate</td><td>String Date Literal</td></tr>
<tr><td>student</td><td>String(100)</td></tr>
<tr><td>students</td><td>String(100)</td></tr>
<tr><td>summary</td><td>Text</td></tr>
<tr><td>teacher</td><td>String(100)</td></tr>
<tr><td>teachers</td><td>String(100)</td></tr>
<tr><td>teacher[1,2,...]_account</td><td>Search String that returns only one User Account (as used in <a href="user.php" target="_blank">Administration &raquo; Edit user accounts</a> OR Integer Database User ID</td></tr>
<tr><td>teacher[1,2,...]_role</td><td>String(40) - "teacher" enrolls a teacher with the 'Non-editing teacher' role.  "editingteacher" enrolls a teacher will the full 'Teacher' role.</td></tr>
<tr><td>template</td><td>String</td></tr>
<tr><td>theme</td><td>String(50)</td></tr>
<tr><td>timecreated</td><td>String Date Literal</td></tr>
<tr><td>timemodified</td><td>String Date Literal</td></tr>
<tr><td>topic0 [main heading], topic1 ... topic52 [topic/week headings]</td><td>Text</td></tr>
<tr><td>visible</td><td>0=FALSE,1=TRUE</td></tr>
</table></center>
<?php

    }

/// Print the form
    print_heading('Upload Courses');
    $maxuploadsize = get_max_upload_file_size();
    echo '<center>';
    echo '<form method="post" enctype="multipart/form-data" action="uploadcourse.php">'.
         $strchoose.':<input type="hidden" name="MAX_FILE_SIZE" value="'.$maxuploadsize.'">'.
         '<input type="hidden" name="sesskey" value="'.$USER->sesskey.'">'.
         '<input type="file" name="coursefile" size="30">'.
         '<input type="submit" value="Upload">'.
         '</form></br>';
    echo '</center>';
    //XTEC ************ MODIFICAT - To avoid deprecated warnings
    //2012.10.09 @sarjona
    print_footer();
    //************ ORIGINAL
    //print_footer($course);
    //************ FI



function my_file_get_contents($filename, $use_include_path = 0) {
/// Returns the file as one big long string

    $data = "";
    $file = @fopen($filename, "rb", $use_include_path);
    if ($file) {
        while (!feof($file)) {
            $data .= fread($file, 1024);
        }
        fclose($file);
    }
    return $data;
}

?>