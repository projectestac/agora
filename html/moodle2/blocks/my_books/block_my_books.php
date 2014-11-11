<?php
// MARSUPIAL ************* ADDED -> block my_books


class block_my_books extends block_list {

    function init() {
        $this->title = get_string('my_books', 'block_my_books');
    }

    function instance_allow_multiple() {
        return false;
    }

    function has_config() {
        return true;
    }

	/*function applicable_formats() {
	    return array('site-index' => true);
	}*/

    function get_content() {

    	global $CFG, $USER, $DB, $OUTPUT;

        if (empty($USER->id)) {
            return $this->content;
        }

	    // If the content is already computed, do not compute it again
	    if ($this->content !== null) {
	        return $this->content;
	    }

    	$this->content = new stdClass;
    	$this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';
        $mybooksconfig = get_config('mybooks');

        require_once($CFG->dirroot.'/local/rcommon/locallib.php');

        // Load user books
        $sql = "SELECT * FROM {rcommon_user_credentials} RUC
            INNER JOIN {rcommon_books} RB ON RB.isbn = RUC.isbn AND RB.format != 'scorm'
            WHERE RUC.euserid = $USER->id
            ORDER BY RB.name";

        if (!$user_credentials = $DB->get_records_sql($sql)){
        	$this->content->items[] = get_string('nobooks', 'block_my_books');
        	$this->content->icons[] = '';
        } else {
	        foreach ($user_credentials as $user_credential){
	        	/// load book data
	        	if (!$book = $DB->get_record('rcommon_books', array('isbn' => $user_credential->isbn))){
	        		//$this->content->items[] = get_string('error_loading_data', 'block_my_books').$user_credential->isbn;  //debug mode
	        		//$this->content->icons[] = '<img src="'.$OUTPUT->pix_url('icon', 'rscorm').'" class="icon" alt="rscorm icon" />';  //debug mode
	        	    continue;
	        	}
	        	if (!in_array(textlib::strtolower($book->format), rcommon_book::$allowedformats)) {
                    continue;
                }
	        	// check rcontent to know if isset entry for that book
        		if ($rcontent = $DB->get_record('rcontent', array('course' => 1, 'bookid' => $book->id, 'unitid' => 0))){
        			///isset, then search course_module and print link
        			if (!$cm = get_coursemodule_from_instance('rcontent', $rcontent->id, 1)){
        				$this->content->items[] = get_string('error_loading_data', 'block_my_books');
        				$this->content->icons[]='<img src="'.$OUTPUT->pix_url('icon', 'rcontent').'" class="icon" alt="rscorm icon" />';
        				continue;
        			}
        			$a = '<a href="'.$CFG->wwwroot.'/mod/rcontent/view.php?id='.$cm->id.'" title="'.$book->name.'"';
        			if ($mybooksconfig->viewer_opening == 1) {
        				$a .= ' target="_blank"';
        			}
        			$a .= '>'.$book->name.'</a>';
        			$this->content->items[] = $a;
        			$this->content->icons[]='<img src="'.$OUTPUT->pix_url('icon', 'rcontent').'" class="icon" alt="rscorm icon" />';
        		} else {
        			// No isset, then add new rcontent
        			$add = new stdClass();
        		    $add->course         = 1;
        		    $add->name           = addslashes($book->name);
        		    $add->levelid        = $book->levelid;
                    $add->isbn           = $book->id;
                    $add->unit           = 0;
                    $add->activity       = 0;
                    $add->summary        = 'Auto added from my_books block';
        		    $add->whatgrade      = 0;
        		    $add->windowpopup    = 0;
        		    $add->framepage      = 1;
        		    $add->coursemodule	 = 0;
        		    $add->cmidnumber	 = 0;
        		    $add->windowpopup    = $mybooksconfig->activity_opening;
        		    $add->resizable      = $mybooksconfig->resizable;
        		    $add->scrollbars     = $mybooksconfig->scrollbars;
        		    $add->directories    = $mybooksconfig->directories;
        		    $add->location       = $mybooksconfig->location;
        		    $add->menubar        = $mybooksconfig->menubar;
        		    $add->toolbar        = $mybooksconfig->toolbar;
        		    $add->status         = $mybooksconfig->status;
        		    $add->width          = $mybooksconfig->width;
				    $add->height         = $mybooksconfig->height;

				    $add->section        = 2;
				    $add->visible        = 1;
				    $module = $DB->get_record('modules', array('name' => 'rcontent'), 'id');
				    $add->module         = $module->id;

				    include_once($CFG->dirroot.'/mod/rcontent/lib.php');

				    /// add entry to rscorm table
				    if (!$add->instance = rcontent_add_instance($add)) {
				    	$this->content->items[] = get_string('error_loading_data', 'block_my_books');
				    	$this->content->icons[]='<img src="'.$OUTPUT->pix_url('icon', 'rcontent').'" class="icon" alt="rscorm icon" />';
        	            return $this->content;
				    }

				    if (! $add->coursemodule = add_course_module($add) ) {
				        $this->content->items[] = get_string('error_loading_data', 'block_my_books');
				        $this->content->icons[]='<img src="'.$OUTPUT->pix_url('icon', 'rcontent').'" class="icon" alt="rscorm icon" />';
                                            return $this->content;
				    }

                    $sectionid = course_add_cm_to_section($add->course, $add->module, $add->section);
				    if (! $sectionid ) {
				        $this->content->items[] = get_string('error_loading_data', 'block_my_books');
				        $this->content->icons[]='<img src="'.$OUTPUT->pix_url('icon', 'rcontent').'" class="icon" alt="rscorm icon" />';
                                            return $this->content;
				    }
				    if (! $DB->set_field("course_modules", 'section', $sectionid, array("id" => $add->coursemodule))) {
				        $this->content->items[] = get_string('error_loading_data', 'block_my_books');
				        $this->content->icons[]='<img src="'.$OUTPUT->pix_url('icon', 'rcontent').'" class="icon" alt="rscorm icon" />';
        	            return $this->content;
				    }

				    // make sure visibility is set correctly (in particular in calendar)
				    set_coursemodule_visible($add->coursemodule, $add->visible);

				    if (isset($add->cmidnumber)) { //label
				        // set cm idnumber
				        set_coursemodule_idnumber($add->coursemodule, $add->cmidnumber);
				    }

				    $a = '<a href="'.$CFG->wwwroot.'/mod/rcontent/view.php?id='.$add->coursemodule.'" title="'.$book->name.'"';
				    if ($mybooksconfig->viewer_opening == 1) {
				    	$a .= ' target="_blank"';
				    }
				    $a .= '>'.$book->name.'</a>';
				    $this->content->items[] = $a;
        			$this->content->icons[]='<img src="'.$OUTPUT->pix_url('icon', 'rcontent').'" class="icon" alt="rscorm icon" />';
        		}
	        }
        }
		// MARSUPIAL ************ AFEGIT -> EVO: credentials
		// 2012.07.06 @mmartinez
		$bt = "";
        $context = context_system::instance(); // pinned blocks do not have own context
		if (has_capability('local/rcommon:managecredentials', $context)) {
			$bt = '<a href="' . $CFG->wwwroot . '/local/rcommon/users.php?action=manage&username='.$USER->username.'" title="' . get_string('manage_button_title', 'block_my_books') . '"><button>' . get_string('manage_button', 'block_my_books') . '</button></a>';
		}
		if ($mybooksconfig->addkey && has_capability('local/rcommon:manageowncredentials', $context)) {
			$bt .= '<a href="' . $CFG->wwwroot.'/local/rcommon/add_user_credential.php?username='.$USER->username.'" title="' . get_string('addkey_button_title', 'block_my_books') . '"><button>' . get_string('addkey_button', 'block_my_books') . '</button></a>';
		}
		$this->content->items[] = '<br>' . $bt;
		$this->content->icons[] = '';
		// *********** FI
    	return $this->content;
    }
}
