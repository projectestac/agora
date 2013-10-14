<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Utility functions.
 *
 * @package    tool
 * @subpackage odisseagtafsync
 * @copyright  2013 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;

require_once($CFG->dirroot . '/admin/tool/uploaduser/locallib.php');
require_once($CFG->dirroot.'/group/lib.php');
require_once($CFG->dirroot.'/cohort/lib.php');
require_once('lib/ftp4p.class.php');
   
class odissea_gtaf_synchronizer {

    public $errors = array();
    protected $ftp = null;
    protected $files = null;
    protected $inputpath = null;
    protected $iscron = false;
    protected $isfolders = true;  //determines if folders path exits or not
    protected $outputpath = null;
    protected $outputtmppath = null;
    protected $outputbackuppath = null;
    protected $outputresultspath = null;
    protected $outputcsvimportpath = null;
    protected $returnurl = 'index.php';
    
    const SYNCHRO_CSVIMPORT_TYPE = 'gtafsync';
    const SYNCHRO_BACKUPFOLDER = 'backup';  //Folder inside outpath to put backup files
    const SYNCHRO_TEMPFOLDER = 'pending';   //Folder inside outpath to put FTP downloaded files until there are processed
    const SYNCHRO_RESULTSFOLDER = 'results';   //Folder inside outpath to put FTP downloaded files until there are processed
    
    const SYNCHRO_STUDENT = 'alumnes';
    const SYNCHRO_TEACHERS = 'professors';
    const SYNCHRO_ENROLMENTS = 'baixa_alumnes';
    
    const SYNCHRO_ENCODING = 'utf8';
    const SYNCHRO_OUTPUTDELIMETER = ';';
    const SYNCHRO_DELIMETERNAME = 'semicolon';  //comma: ","
                                                //semicolon: ";"
                                                //colon: ":"
                                                //tab: "\t"
    
    const SYNCHRO_UUPASSWORDNEW = 0; //0: Field required in file
                                     //1: Create password if needed
    const SYNCHRO_UUPASSWORDOLD = 0; //0: Field required in file
                                     //1: Create password if needed
    const SYNCHRO_UUALLOWRENAMES = 0;   //0: No
                                        //1: Yes
    const SYNCHRO_UUALLOWDELETES = 0;   //0: No
                                        //1: Yes
    const SYNCHRO_UUALLOWSUSPENDS = 0;  //0: No
                                        //1: Yes
    const SYNCHRO_UUBULK = UU_BULK_NEW; //UU_BULK_NONE: None
                                        //UU_BULK_NEW: New users
                                        //UU_BULK_UPDATED: Update users
                                        //UU_BULK_ALL: All users
    const SYNCHRO_UURESETPASSWORDS = UU_BULK_NEW;   //UU_PWRESET_NONE: No password is reset
                                                    //UU_PWRESET_WEAK: Only reset weak passwords
                                                    //UU_PWRESET_ALL: Reset all passwords
    const SYNCHRO_MAILADMINS = 1;   //0: No
                                    //1: Yes
    
    function odissea_gtaf_synchronizer($iscron = false) {

        //set system configuration
        @set_time_limit(1800); // 30 minuts should be enough
        @raise_memory_limit('256M');

        //set parameters
        global $CFG, $USER;

        $settings = get_config('tool_odisseagtafsync');        
        
        $this->iscron = $iscron;  // variable that determines if visual aspect are shown or not
               
        //check if can connect with FTP server
        $this->inputpath = $settings->inputpath; 
        $this->ftp = new ftp4p($settings->ftphost, $settings->ftpusername, $settings->ftppassword, true, true, $CFG->dataroot . '/' . $settings->outputpath);
        $this->files = $this->ftp->get_dir_list($this->inputpath);
        if ($this->files === FALSE) {
            $this->isfolders = false;
            $this->errors[] = get_string('ftpdirlisterror', 'tool_odisseagtafsync');
        }
       
        // Initialize all folders if needed
        $this->outputpath = $CFG->dataroot . '/' . $settings->outputpath;
        $this->prepare_folder($this->outputpath);

        // Folder where to leave FTP content
        $this->outputtmppath = $this->outputpath . '/' . self::SYNCHRO_TEMPFOLDER;   // Temporaly folder where to download FTP content
        $this->prepare_folder($this->outputtmppath);
        
        // Folder where to copy CSV files to proccess (for using Moodle standard csvlib)
        $this->outputcsvimportpath = $CFG->tempdir.'/csvimport/'.self::SYNCHRO_CSVIMPORT_TYPE.'/'.$USER->id;   // CSV import folder
        $this->prepare_folder($this->outputcsvimportpath);
        
        // Folder where to backup downloaded files after processing
        $this->outputbackuppath = $this->outputpath . '/' . self::SYNCHRO_BACKUPFOLDER; 
        $this->prepare_folder($this->outputbackuppath);
        
        // Folder where to leave results
        $this->outputresultspath = $this->outputpath . '/' . self::SYNCHRO_RESULTSFOLDER;   // Temporaly folder where to download FTP content
        $this->prepare_folder($this->outputresultspath);
    }
    
    function prepare_folder($folder){
        if (!is_dir($folder)) {
            if (!$this->create_upload_directory($folder)) {
                $this->isfolders = false;
                $this->errors[] = get_string('createpatherror', 'tool_odisseagtafsync', $folder);
            }
        }
    }

    function synchro() {
        global $CFG;
        
        $results = array();

        // Check if there are errors to avoid synchro
        if (!$this->isfolders) {
            if (!$this->iscron) {
                //error(implode(', ', $this->errors), $this->returnurl);
                return;
            } else {
                return implode(', ', $this->errors);
            }
        }

        require_once($CFG->libdir . '/adminlib.php');
        require_once($CFG->libdir . '/csvlib.class.php');
        require_once($CFG->dirroot . '/user/profile/lib.php');

        // Download getted files list
        if (is_array($this->files)) {
            foreach ($this->files as $file) {
                $fnamearray = explode("/", $file);
                $fname = $fnamearray[count($fnamearray) - 1];
                $prefixfname = substr($fname, 0, strlen($fname) - 16);
                if ($prefixfname == self::SYNCHRO_STUDENT 
                        || $prefixfname == self::SYNCHRO_TEACHERS 
//                        || $prefixfname == self::SYNCHRO_ENROLMENTS   // Commented to avoid unenrolments - Request of Odissea team (20131014)
                        ) {
                    if (!$this->ftp->get_file($file, $this->outputtmppath . '/' . $fname, false)) {
                        continue;
                    }
                    // Delete from FTP server the downloaded files
                    $this->ftp->del_file($file);  
                }
            }
        }


        // Check if there are new files
        if ($files = opendir($this->outputtmppath)) {
            while (($file = readdir($files)) !== false) {
                if (is_file($this->outputtmppath . '/' . $file)) {
                    // Check files type to call the appropriate function
                    switch (substr($file, 0, strlen($file) - 16)) {
                        case self::SYNCHRO_STUDENT: case self::SYNCHRO_TEACHERS:
                            $results[$file] = $this->synchro_users($file);
                            break;
/* Commented to avoid unenrolments - Request of Odissea team (20131014)
                        case self::SYNCHRO_ENROLMENTS:
                            $results[$file] = $this->synchro_enrolments($file);
                            break;
 */
                    }
                }
            }
        }

        return $results;
    }

    function synchro_users($file) {
        global $CFG, $DB, $STD_FIELDS, $PRF_FIELDS, $PAGE;

        $settings = get_config('tool_odisseagtafsync'); 
        
        // Copy specified file to csvimport folder 
        $this->prepare_folder($this->outputcsvimportpath);
        if (!copy($this->outputtmppath . '/' . $file, $this->outputcsvimportpath. '/' . $file)) {
            $this->errors[] = 'Error copying file to csvimport folder: '.$this->outputcsvimportpath. '/' . $file;
            return;
        }
        
        // Create a backup of downloaded file
        $filename = get_filename_withoutrepeat($file, $this->outputpath . '/' . self::SYNCHRO_BACKUPFOLDER);
        if (!copy($this->outputtmppath . '/' . $file, $this->outputpath . '/' . self::SYNCHRO_BACKUPFOLDER . '/' . $filename)) {
            $this->errors[] = 'Error doing file backup: '.$file;
            return;
        }        
        
        //ODISSEAGTAFSYNC-XTEC ************ AFEGIT - Code adapted from admin/tool/uploaduser/index.php
        //2013.08.23  @sarjona
        @set_time_limit(60*60); // 1 hour should be enough
        raise_memory_limit(MEMORY_HUGE);
        
        $struserrenamed             = get_string('userrenamed', 'tool_uploaduser');
        $strusernotrenamedexists    = get_string('usernotrenamedexists', 'error');
        $strusernotrenamedmissing   = get_string('usernotrenamedmissing', 'error');
        $strusernotrenamedoff       = get_string('usernotrenamedoff', 'error');
        $strusernotrenamedadmin     = get_string('usernotrenamedadmin', 'error');

        $struserupdated             = get_string('useraccountupdated', 'tool_uploaduser');
        $strusernotupdated          = get_string('usernotupdatederror', 'error');
        $strusernotupdatednotexists = get_string('usernotupdatednotexists', 'error');
        $strusernotupdatedadmin     = get_string('usernotupdatedadmin', 'error');

        $struseruptodate            = get_string('useraccountuptodate', 'tool_uploaduser');

        $struseradded               = get_string('newuser');
        $strusernotadded            = get_string('usernotaddedregistered', 'error');
        $strusernotaddederror       = get_string('usernotaddederror', 'error');

        $struserdeleted             = get_string('userdeleted', 'tool_uploaduser');
        $strusernotdeletederror     = get_string('usernotdeletederror', 'error');
        $strusernotdeletedmissing   = get_string('usernotdeletedmissing', 'error');
        $strusernotdeletedoff       = get_string('usernotdeletedoff', 'error');
        $strusernotdeletedadmin     = get_string('usernotdeletedadmin', 'error');

        $strcannotassignrole        = get_string('cannotassignrole', 'error');

        $struserauthunsupported     = get_string('userauthunsupported', 'error');
        $stremailduplicate          = get_string('useremailduplicate', 'error');

        $strinvalidpasswordpolicy   = get_string('invalidpasswordpolicy', 'error');
        $errorstr                   = get_string('error');

        $stryes                     = get_string('yes');
        $strno                      = get_string('no');
        $stryesnooptions = array(0=>$strno, 1=>$stryes);

        $returnurl = new moodle_url('/admin/tool/odisseagtafsync/index.php');

        $today = time();
        $today = make_timestamp(date('Y', $today), date('m', $today), date('d', $today), 0, 0, 0);

        // array of all valid fields for validation
        $STD_FIELDS = array('id', 'firstname', 'lastname', 'username', 'email',
                'city', 'country', 'lang', 'timezone', 'mailformat',
                'maildisplay', 'maildigest', 'htmleditor', 'autosubscribe',
                'institution', 'department', 'idnumber', 'skype',
                'msn', 'aim', 'yahoo', 'icq', 'phone1', 'phone2', 'address',
                'url', 'description', 'descriptionformat', 'password',
                'auth',        // watch out when changing auth type or using external auth plugins!
                'oldusername', // use when renaming users - this is the original username
                'suspended',   // 1 means suspend user account, 0 means activate user account, nothing means keep as is for existing users
                'deleted',     // 1 means delete user
            );

        $PRF_FIELDS = array();

        if ($prof_fields = $DB->get_records('user_info_field')) {
            foreach ($prof_fields as $prof_field) {
                $PRF_FIELDS[] = 'profile_field_'.$prof_field->shortname;
            }
        }
        unset($prof_fields);
        
        $formdata = new stdClass();        
        $formdata->uutype = $settings->uutype;
        $formdata->uuupdatetype = $settings->uuupdatetype;
        $formdata->uupasswordnew = self::SYNCHRO_UUPASSWORDNEW;
        $formdata->uupasswordold = self::SYNCHRO_UUPASSWORDOLD;
        $formdata->uuallowrenames = self::SYNCHRO_UUALLOWRENAMES;
        $formdata->uuallowdeletes = self::SYNCHRO_UUALLOWDELETES;
        $formdata->uuallowsuspends = self::SYNCHRO_UUALLOWSUSPENDS;
        $formdata->uubulk = self::SYNCHRO_UUBULK;
        $formdata->uunoemailduplicates = $settings->uunoemailduplicates;
        $formdata->uustandardusernames = $settings->uustandardusernames;
        $formdata->uuforcepasswordchange = self::SYNCHRO_UURESETPASSWORDS;
        $formdata->uulegacy1 = $settings->uulegacy1;
        $formdata->uulegacy2 = $settings->uulegacy2;
        $formdata->uulegacy3 = $settings->uulegacy3;
        $formdata->auth = $settings->auth;
        $formdata->maildisplay = $settings->maildisplay;
        $formdata->mailformat = $settings->mailformat;
        $formdata->maildigest = $settings->maildigest;
        $formdata->autosubscribe = $settings->autosubscribe;
        $formdata->trackforums = $settings->trackforums;
        $formdata->htmleditor = $settings->htmleditor;
        $formdata->country = $settings->country;
        $formdata->timezone = $settings->timezone;
        $formdata->lang = $settings->lang;
        
        //start CSV import
        $cir = new csv_import_reader($file, self::SYNCHRO_CSVIMPORT_TYPE);
        $content = file_get_contents($this->outputcsvimportpath. '/' . $file);
        $readcount = $cir->load_csv_content($content, self::SYNCHRO_ENCODING, self::SYNCHRO_DELIMETERNAME, 'validate_user_upload_columns');
        unset($content);

        if ($readcount === false) {
            $this->errors[] = get_string('csvloaderror', 'error');
            return;
        } else if ($readcount == 0) {
            $this->errors[] = get_string('csvemptyfile', 'error');
            return;
        }
        // test if columns ok
        $filecolumns = uu_validate_user_upload_columns($cir, $STD_FIELDS, $PRF_FIELDS, $returnurl);

        $optype = $formdata->uutype;

        $updatetype        = isset($formdata->uuupdatetype) ? $formdata->uuupdatetype : 0;
        $createpasswords   = (!empty($formdata->uupasswordnew) and $optype != UU_USER_UPDATE);
        $updatepasswords   = (!empty($formdata->uupasswordold)  and $optype != UU_USER_ADDNEW and $optype != UU_USER_ADDINC and ($updatetype == UU_UPDATE_FILEOVERRIDE or $updatetype == UU_UPDATE_ALLOVERRIDE));
        $allowrenames      = (!empty($formdata->uuallowrenames) and $optype != UU_USER_ADDNEW and $optype != UU_USER_ADDINC);
        $allowdeletes      = (!empty($formdata->uuallowdeletes) and $optype != UU_USER_ADDNEW and $optype != UU_USER_ADDINC);
        $allowsuspends     = (!empty($formdata->uuallowsuspends));
        $bulk              = $formdata->uubulk;
        $noemailduplicates = $formdata->uunoemailduplicates;
        $standardusernames = $formdata->uustandardusernames;
        $resetpasswords    = isset($formdata->uuforcepasswordchange) ? $formdata->uuforcepasswordchange : UU_PWRESET_NONE;
        
/*
        $optype = self::SYNCHRO_UUTYPE;

        $updatetype        = self::SYNCHRO_UUUPDATETYPE;
        $createpasswords   = (self::SYNCHRO_UUPASSWORDNEW and $optype != UU_USER_UPDATE);
        $updatepasswords   = (self::SYNCHRO_UUPASSWORDOLD and $optype != UU_USER_ADDNEW and $optype != UU_USER_ADDINC and ($updatetype == UU_UPDATE_FILEOVERRIDE or $updatetype == UU_UPDATE_ALLOVERRIDE));
        $allowrenames      = (self::SYNCHRO_UUALLOWRENAMES and $optype != UU_USER_ADDNEW and $optype != UU_USER_ADDINC);
        $allowdeletes      = (self::SYNCHRO_UUALLOWDELETES and $optype != UU_USER_ADDNEW and $optype != UU_USER_ADDINC);
        $allowsuspends     = (self::SYNCHRO_UUALLOWSUSPENDS);
        $bulk              = self::SYNCHRO_UUBULK;
        $noemailduplicates = self::SYNCHRO_UUNOEMAILDUPLICATES;
        $standardusernames = self::SYNCHRO_UUSTANDARDUSERNAMES;
        $resetpasswords    = self::SYNCHRO_UURESETPASSWORDS;
*/

        // verification moved to two places: after upload and into form2
        $usersnew      = 0;
        $usersupdated  = 0;
        $usersuptodate = 0; //not printed yet anywhere
        $userserrors   = 0;
        $deletes       = 0;
        $deleteerrors  = 0;
        $renames       = 0;
        $renameerrors  = 0;
        $usersskipped  = 0;
        $weakpasswords = 0;

        // caches
        $ccache         = array(); // course cache - do not fetch all courses here, we  will not probably use them all anyway!
        $cohorts        = array();
        $rolecache      = uu_allowed_roles_cache(); // roles lookup cache
        $manualcache    = array(); // cache of used manual enrol plugins in each course
        $supportedauths = odissea_uu_supported_auths();
        

        //XTEC ************ MODIFICAT - Enrolments must be set to 'manual' in order to be edited from Moodle
        //2013.10.14 @aginard
        if (enrol_is_enabled('manual')) {
            $manual = enrol_get_plugin('manual');
        } else {
            $manual = NULL;
            $this->errors[] = get_string('manualnotenabled', 'tool_odisseagtafsync');
            return;
        }
        //************ ORIGINAL
        /*
        // We use flatfile plugin to unenrol users throught the cron
        if (enrol_is_enabled('flatfile')) {
            $manual = enrol_get_plugin('flatfile');
        } else {
            $manual = NULL;
            $this->errors[] = get_string('flatfilenotenabled', 'tool_odisseagtafsync');
            return;
        }
        */
        //************ FI                        


        // clear bulk selection
        if ($bulk) {
            $SESSION->bulk_users = array();
        }

        // init csv import helper
        $cir->init();
        $linenum = 1; //column header is first line

        // init upload progress tracker
        $upt = new odissea_uu_progress_tracker();
        $upt->start(); // start table

        while ($line = $cir->next()) {
            $upt->flush();
            $linenum++;

            $upt->track('line', $linenum);

            $user = new stdClass();

            // add fields to user object
            foreach ($line as $keynum => $value) {
                if (!isset($filecolumns[$keynum])) {
                    // this should not happen
                    continue;
                }
                $key = $filecolumns[$keynum];
                if (strpos($key, 'profile_field_') === 0) {
                    //NOTE: bloody mega hack alert!!
                    if (isset($USER->$key) and is_array($USER->$key)) {
                        // this must be some hacky field that is abusing arrays to store content and format
                        $user->$key = array();
                        $user->$key['text']   = $value;
                        $user->$key['format'] = FORMAT_MOODLE;
                    } else {
                        $user->$key = $value;
                    }
                } else {
                    $user->$key = $value;
                }

                if (in_array($key, $upt->columns)) {
                    // default value in progress tracking table, can be changed later
                    $upt->track($key, s($value), 'normal');
                }
            }
            if (!isset($user->username)) {
                // prevent warnings below
                $user->username = '';
            }

            if ($optype == UU_USER_ADDNEW or $optype == UU_USER_ADDINC) {
                // user creation is a special case - the username may be constructed from templates using firstname and lastname
                // better never try this in mixed update types
                $error = false;
                if (!isset($user->firstname) or $user->firstname === '') {
                    $upt->track('status', get_string('missingfield', 'error', 'firstname'), 'error');
                    $upt->track('firstname', $errorstr, 'error');
                    $error = true;
                }
                if (!isset($user->lastname) or $user->lastname === '') {
                    $upt->track('status', get_string('missingfield', 'error', 'lastname'), 'error');
                    $upt->track('lastname', $errorstr, 'error');
                    $error = true;
                }
                if ($error) {
                    $userserrors++;
                    continue;
                }
                // we require username too - we might use template for it though
                if (empty($user->username) and !empty($formdata->username)) {
                    $user->username = uu_process_template($formdata->username, $user);
                    $upt->track('username', s($user->username));
                }
            }

            // normalize username
            $originalusername = $user->username;
            if ($standardusernames) {
                $user->username = clean_param($user->username, PARAM_USERNAME);
            }

            // make sure we really have username
            if (empty($user->username)) {
                $upt->track('status', get_string('missingfield', 'error', 'username'), 'error');
                $upt->track('username', $errorstr, 'error');
                $userserrors++;
                continue;
            } else if ($user->username === 'guest') {
                $upt->track('status', get_string('guestnoeditprofileother', 'error'), 'error');
                $userserrors++;
                continue;
            }
            if ($user->username !== clean_param($user->username, PARAM_USERNAME)) {
                $upt->track('status', get_string('invalidusername', 'error', 'username'), 'error');
                $upt->track('username', $errorstr, 'error');
                $userserrors++;
            }
            if ($existinguser = $DB->get_record('user', array('username'=>$user->username, 'mnethostid'=>$CFG->mnet_localhost_id))) {
                $upt->track('id', $existinguser->id, 'normal', false);
            }

            // find out in username incrementing required
            if ($existinguser and $optype == UU_USER_ADDINC) {
                $user->username = uu_increment_username($user->username);
                $existinguser = false;
            }

            // notify about nay username changes
            if ($originalusername !== $user->username) {
                $upt->track('username', '', 'normal', false); // clear previous
                $upt->track('username', s($originalusername).'-->'.s($user->username), 'info');
            } else {
                $upt->track('username', s($user->username), 'normal', false);
            }

            // add default values for remaining fields
            $formdefaults = array();
            foreach ($STD_FIELDS as $field) {
                if (isset($user->$field)) {
                    continue;
                }
                // all validation moved to form2
                  if (isset($formdata->$field)) {
                    // process templates
                    $user->$field = uu_process_template($formdata->$field, $user);
                    $formdefaults[$field] = true;
                    if (in_array($field, $upt->columns)) {
                        $upt->track($field, s($user->$field), 'normal');
                    }
                }
            }
            foreach ($PRF_FIELDS as $field) {
                if (isset($user->$field)) {
                    continue;
                }
                if (isset($formdata->$field)) {
                    // process templates
                    $user->$field = uu_process_template($formdata->$field, $user);
                    $formdefaults[$field] = true;
                }
            }

            // delete user
            if (!empty($user->deleted)) {
                if (!$allowdeletes) {
                    $usersskipped++;
                    $upt->track('status', $strusernotdeletedoff, 'warning');
                    continue;
                }
                if ($existinguser) {
                    if (is_siteadmin($existinguser->id)) {
                        $upt->track('status', $strusernotdeletedadmin, 'error');
                        $deleteerrors++;
                        continue;
                    }
                    if (delete_user($existinguser)) {
                        $upt->track('status', $struserdeleted);
                        $deletes++;
                    } else {
                        $upt->track('status', $strusernotdeletederror, 'error');
                        $deleteerrors++;
                    }
                } else {
                    $upt->track('status', $strusernotdeletedmissing, 'error');
                    $deleteerrors++;
                }
                continue;
            }
            // we do not need the deleted flag anymore
            unset($user->deleted);

            // renaming requested?
            if (!empty($user->oldusername) ) {
                if (!$allowrenames) {
                    $usersskipped++;
                    $upt->track('status', $strusernotrenamedoff, 'warning');
                    continue;
                }

                if ($existinguser) {
                    $upt->track('status', $strusernotrenamedexists, 'error');
                    $renameerrors++;
                    continue;
                }

                if ($user->username === 'guest') {
                    $upt->track('status', get_string('guestnoeditprofileother', 'error'), 'error');
                    $renameerrors++;
                    continue;
                }

                if ($standardusernames) {
                    $oldusername = clean_param($user->oldusername, PARAM_USERNAME);
                } else {
                    $oldusername = $user->oldusername;
                }

                // no guessing when looking for old username, it must be exact match
                if ($olduser = $DB->get_record('user', array('username'=>$oldusername, 'mnethostid'=>$CFG->mnet_localhost_id))) {
                    $upt->track('id', $olduser->id, 'normal', false);
                    if (is_siteadmin($olduser->id)) {
                        $upt->track('status', $strusernotrenamedadmin, 'error');
                        $renameerrors++;
                        continue;
                    }
                    $DB->set_field('user', 'username', $user->username, array('id'=>$olduser->id));
                    $upt->track('username', '', 'normal', false); // clear previous
                    $upt->track('username', s($oldusername).'-->'.s($user->username), 'info');
                    $upt->track('status', $struserrenamed);
                    $renames++;
                } else {
                    $upt->track('status', $strusernotrenamedmissing, 'error');
                    $renameerrors++;
                    continue;
                }
                $existinguser = $olduser;
                $existinguser->username = $user->username;
            }

            // can we process with update or insert?
            $skip = false;
            switch ($optype) {
                case UU_USER_ADDNEW:
                    if ($existinguser) {
                        $usersskipped++;
                        $upt->track('status', $strusernotadded, 'warning');
                        $skip = true;
                    }
                    break;

                case UU_USER_ADDINC:
                    if ($existinguser) {
                        //this should not happen!
                        $upt->track('status', $strusernotaddederror, 'error');
                        $userserrors++;
                        $skip = true;
                    }
                    break;

                case UU_USER_ADD_UPDATE:
                    break;

                case UU_USER_UPDATE:
                    if (!$existinguser) {
                        $usersskipped++;
                        $upt->track('status', $strusernotupdatednotexists, 'warning');
                        $skip = true;
                    }
                    break;

                default:
                    // unknown type
                    $skip = true;
            }

            if ($skip) {
                continue;
            }

            if ($existinguser) {
                $user->id = $existinguser->id;

                $upt->track('username', html_writer::link(new moodle_url('/user/profile.php', array('id'=>$existinguser->id)), s($existinguser->username)), 'normal', false);
                $upt->track('suspended', $stryesnooptions[$existinguser->suspended] , 'normal', false);

                if (is_siteadmin($user->id)) {
                    $upt->track('status', $strusernotupdatedadmin, 'error');
                    $userserrors++;
                    continue;
                }

                $existinguser->timemodified = time();
                // do NOT mess with timecreated or firstaccess here!

                //load existing profile data
                profile_load_data($existinguser);

                $upt->track('auth', $existinguser->auth, 'normal', false);

                $doupdate = false;
                $dologout = false;

                if ($updatetype != UU_UPDATE_NOCHANGES) {
                    if (!empty($user->auth) and $user->auth !== $existinguser->auth) {
                        $upt->track('auth', s($existinguser->auth).'-->'.s($user->auth), 'info', false);
                        $existinguser->auth = $user->auth;
                        if (!isset($supportedauths[$user->auth])) {
                            $upt->track('auth', $struserauthunsupported, 'warning');
                        }
                        $doupdate = true;
                        if ($existinguser->auth === 'nologin') {
                            $dologout = true;
                        }
                    }
                    $allcolumns = array_merge($STD_FIELDS, $PRF_FIELDS);
                    foreach ($allcolumns as $column) {
                        if ($column === 'username' or $column === 'password' or $column === 'auth' or $column === 'suspended') {
                            // these can not be changed here
                            continue;
                        }
                        if (!property_exists($user, $column) or !property_exists($existinguser, $column)) {
                            // this should never happen
                            continue;
                        }
                        if ($updatetype == UU_UPDATE_MISSING) {
                            if (!is_null($existinguser->$column) and $existinguser->$column !== '') {
                                continue;
                            }
                        } else if ($updatetype == UU_UPDATE_ALLOVERRIDE) {
                            // we override everything

                        } else if ($updatetype == UU_UPDATE_FILEOVERRIDE) {
                            if (!empty($formdefaults[$column])) {
                                // do not override with form defaults
                                continue;
                            }
                        }
                        if ($existinguser->$column !== $user->$column) {
                            if ($column === 'email') {
                                if ($DB->record_exists('user', array('email'=>$user->email))) {
                                    if ($noemailduplicates) {
                                        $upt->track('email', $stremailduplicate, 'error');
                                        $upt->track('status', $strusernotupdated, 'error');
                                        $userserrors++;
                                        continue 2;
                                    } else {
                                        $upt->track('email', $stremailduplicate, 'warning');
                                    }
                                }
                                if (!validate_email($user->email)) {
                                    $upt->track('email', get_string('invalidemail'), 'warning');
                                }
                            }

                            if (in_array($column, $upt->columns)) {
                                $upt->track($column, s($existinguser->$column).'-->'.s($user->$column), 'info', false);
                            }
                            $existinguser->$column = $user->$column;
                            $doupdate = true;
                        }
                    }
                }

                try {
                    $auth = get_auth_plugin($existinguser->auth);
                } catch (Exception $e) {
                    $upt->track('auth', get_string('userautherror', 'error', s($existinguser->auth)), 'error');
                    $upt->track('status', $strusernotupdated, 'error');
                    $userserrors++;
                    continue;
                }
                $isinternalauth = $auth->is_internal();

                // deal with suspending and activating of accounts
                if ($allowsuspends and isset($user->suspended) and $user->suspended !== '') {
                    $user->suspended = $user->suspended ? 1 : 0;
                    if ($existinguser->suspended != $user->suspended) {
                        $upt->track('suspended', '', 'normal', false);
                        $upt->track('suspended', $stryesnooptions[$existinguser->suspended].'-->'.$stryesnooptions[$user->suspended], 'info', false);
                        $existinguser->suspended = $user->suspended;
                        $doupdate = true;
                        if ($existinguser->suspended) {
                            $dologout = true;
                        }
                    }
                }

                // changing of passwords is a special case
                // do not force password changes for external auth plugins!
                $oldpw = $existinguser->password;
                if (!$isinternalauth) {
                    $existinguser->password = 'not cached';
                    $upt->track('password', '-', 'normal', false);
                    // clean up prefs
                    unset_user_preference('create_password', $existinguser);
                    unset_user_preference('auth_forcepasswordchange', $existinguser);

                } else if (!empty($user->password)) {
                    if ($updatepasswords) {
                        $errmsg = null;
                        $weak = !check_password_policy($user->password, $errmsg);
                        if ($resetpasswords == UU_PWRESET_ALL or ($resetpasswords == UU_PWRESET_WEAK and $weak)) {
                            if ($weak) {
                                $weakpasswords++;
                                $upt->track('password', $strinvalidpasswordpolicy, 'warning');
                            }
                            set_user_preference('auth_forcepasswordchange', 1, $existinguser);
                        } else {
                            unset_user_preference('auth_forcepasswordchange', $existinguser);
                        }
                        unset_user_preference('create_password', $existinguser); // no need to create password any more
                        $existinguser->password = hash_internal_user_password($user->password);
                        $upt->track('password', $user->password, 'normal', false);
                    } else {
                        // do not print password when not changed
                        $upt->track('password', '', 'normal', false);
                    }
                }

                if ($doupdate or $existinguser->password !== $oldpw) {
                    // we want only users that were really updated

                    $DB->update_record('user', $existinguser);
                    $upt->track('status', $struserupdated);
                    $usersupdated++;
                    // pre-process custom profile menu fields data from csv file
                    $existinguser = uu_pre_process_custom_profile_data($existinguser);
                    // save custom profile fields data from csv file
                    profile_save_data($existinguser);

                    events_trigger('user_updated', $existinguser);

                    if ($bulk == UU_BULK_UPDATED or $bulk == UU_BULK_ALL) {
                        if (!in_array($user->id, $SESSION->bulk_users)) {
                            $SESSION->bulk_users[] = $user->id;
                        }
                    }

                } else {
                    // no user information changed
                    $upt->track('status', $struseruptodate);
                    $usersuptodate++;

                    if ($bulk == UU_BULK_ALL) {
                        if (!in_array($user->id, $SESSION->bulk_users)) {
                            $SESSION->bulk_users[] = $user->id;
                        }
                    }
                }

                if ($dologout) {
                    session_kill_user($existinguser->id);
                }

            } else {
                // save the new user to the database
                $user->confirmed    = 1;
                $user->timemodified = time();
                $user->timecreated  = time();
                $user->mnethostid   = $CFG->mnet_localhost_id; // we support ONLY local accounts here, sorry

                if (!isset($user->suspended) or $user->suspended === '') {
                    $user->suspended = 0;
                } else {
                    $user->suspended = $user->suspended ? 1 : 0;
                }
                $upt->track('suspended', $stryesnooptions[$user->suspended], 'normal', false);

                if (empty($user->auth)) {
                    $user->auth = 'manual';
                }
                $upt->track('auth', $user->auth, 'normal', false);

                // do not insert record if new auth plugin does not exist!
                try {
                    $auth = get_auth_plugin($user->auth);
                } catch (Exception $e) {
                    $upt->track('auth', get_string('userautherror', 'error', s($user->auth)), 'error');
                    $upt->track('status', $strusernotaddederror, 'error');
                    $userserrors++;
                    continue;
                }
                if (!isset($supportedauths[$user->auth])) {
                    $upt->track('auth', $struserauthunsupported, 'warning');
                }

                $isinternalauth = $auth->is_internal();

                if (empty($user->email)) {
                    $upt->track('email', get_string('invalidemail'), 'error');
                    $upt->track('status', $strusernotaddederror, 'error');
                    $userserrors++;
                    continue;

                } else if ($DB->record_exists('user', array('email'=>$user->email))) {
                    if ($noemailduplicates) {
                        $upt->track('email', $stremailduplicate, 'error');
                        $upt->track('status', $strusernotaddederror, 'error');
                        $userserrors++;
                        continue;
                    } else {
                        $upt->track('email', $stremailduplicate, 'warning');
                    }
                }
                if (!validate_email($user->email)) {
                    $upt->track('email', get_string('invalidemail'), 'warning');
                }

                $forcechangepassword = false;

                if ($isinternalauth) {
                    if (empty($user->password)) {
                        if ($createpasswords) {
                            $user->password = 'to be generated';
                            $upt->track('password', '', 'normal', false);
                            $upt->track('password', get_string('uupasswordcron', 'tool_uploaduser'), 'warning', false);
                        } else {
                            $upt->track('password', '', 'normal', false);
                            $upt->track('password', get_string('missingfield', 'error', 'password'), 'error');
                            $upt->track('status', $strusernotaddederror, 'error');
                            $userserrors++;
                            continue;
                        }
                    } else {
                        $errmsg = null;
                        $weak = !check_password_policy($user->password, $errmsg);
                        if ($resetpasswords == UU_PWRESET_ALL or ($resetpasswords == UU_PWRESET_WEAK and $weak)) {
                            if ($weak) {
                                $weakpasswords++;
                                $upt->track('password', $strinvalidpasswordpolicy, 'warning');
                            }
                            $forcechangepassword = true;
                        }
                        //XTEC ************ MODIFICAT - To let importing users from Moodle 1.9 with password information
                        //2012.06.20  @sarjona
                        if (strlen($user->password) == 32){
                            $user->password = $user->password;
                        } else{
                            $user->password = hash_internal_user_password($user->password);
                        }
                        //************ ORIGINAL
                        /*  
                        $user->password = hash_internal_user_password($user->password);
                        */
                        //************ FI                        
                    }
                } else {
                    $user->password = 'not cached';
                    $upt->track('password', '-', 'normal', false);
                }

                // create user - insert_record ignores any extra properties
                $user->id = $DB->insert_record('user', $user);
                $upt->track('username', html_writer::link(new moodle_url('/user/profile.php', array('id'=>$user->id)), s($user->username)), 'normal', false);

                // pre-process custom profile menu fields data from csv file
                $user = uu_pre_process_custom_profile_data($user);
                // save custom profile fields data
                profile_save_data($user);

                if ($forcechangepassword) {
                    set_user_preference('auth_forcepasswordchange', 1, $user);
                }
                if ($user->password === 'to be generated') {
                    set_user_preference('create_password', 1, $user);
                }

                $upt->track('status', $struseradded);
                $upt->track('id', $user->id, 'normal', false);
                $usersnew++;

                // make sure user context exists
                context_user::instance($user->id);

                events_trigger('user_created', $user);

                if ($bulk == UU_BULK_NEW or $bulk == UU_BULK_ALL) {
                    if (!in_array($user->id, $SESSION->bulk_users)) {
                        $SESSION->bulk_users[] = $user->id;
                    }
                }
            }


            // add to cohort first, it might trigger enrolments indirectly - do NOT create cohorts here!
            foreach ($filecolumns as $column) {
                if (!preg_match('/^cohort\d+$/', $column)) {
                    continue;
                }

                if (!empty($user->$column)) {
                    $addcohort = $user->$column;
                    if (!isset($cohorts[$addcohort])) {
                        if (is_number($addcohort)) {
                            // only non-numeric idnumbers!
                            $cohort = $DB->get_record('cohort', array('id'=>$addcohort));
                        } else {
                            $cohort = $DB->get_record('cohort', array('idnumber'=>$addcohort));
                        }

                        if (empty($cohort)) {
                            $cohorts[$addcohort] = get_string('unknowncohort', 'core_cohort', s($addcohort));
                        } else if (!empty($cohort->component)) {
                            // cohorts synchronised with external sources must not be modified!
                            $cohorts[$addcohort] = get_string('external', 'core_cohort');
                        } else {
                            $cohorts[$addcohort] = $cohort;
                        }
                    }

                    if (is_object($cohorts[$addcohort])) {
                        $cohort = $cohorts[$addcohort];
                        if (!$DB->record_exists('cohort_members', array('cohortid'=>$cohort->id, 'userid'=>$user->id))) {
                            cohort_add_member($cohort->id, $user->id);
                            // we might add special column later, for now let's abuse enrolments
                            $upt->track('enrolments', get_string('useradded', 'core_cohort', s($cohort->name)));
                        }
                    } else {
                        // error message
                        $upt->track('enrolments', $cohorts[$addcohort], 'error');
                    }
                }
            }


            // find course enrolments, groups, roles/types and enrol periods
            // this is again a special case, we always do this for any updated or created users
            foreach ($filecolumns as $column) {
                if (!preg_match('/^course\d+$/', $column)) {
                    continue;
                }
                $i = substr($column, 6);

                if (empty($user->{'course'.$i})) {
                    continue;
                }
                $shortname = $user->{'course'.$i};
                if (!array_key_exists($shortname, $ccache)) {
                    if (!$course = $DB->get_record('course', array('shortname'=>$shortname), 'id, shortname')) {
                        $upt->track('enrolments', get_string('unknowncourse', 'error', s($shortname)), 'error');
                        continue;
                    }
                    $ccache[$shortname] = $course;
                    $ccache[$shortname]->groups = null;
                }
                $courseid      = $ccache[$shortname]->id;
                $coursecontext = context_course::instance($courseid);
                if (!isset($manualcache[$courseid])) {
                    $manualcache[$courseid] = false;
                    if ($manual) {
                        //ODISSEAGTAFSYNC-XTEC ************ MODIFICAT - Add enrol manual instance to the course if it isn't
                        //2013.08.23 @sarjona
                        //2013.10.14 @aginard: changed 'flatfile' by 'manual'
                        $instance = $DB->get_record('enrol',
                                        array('courseid' => $courseid, 'enrol' => 'manual'));
                        if (empty($instance)) {
                            $enrol_manual = new enrol_manual_plugin();
                            $enrolid = $enrol_manual->add_instance($course);
                            $instance = $DB->get_record('enrol', array('id' => $enrolid));
                            $manualcache[$courseid] = $instance;
                        } else {
                            if ($instances = enrol_get_instances($courseid, false)) {
                                foreach ($instances as $instance) {
                                    if ($instance->enrol === 'manual') {
                                        $manualcache[$courseid] = $instance;
                                        break;
                                    }
                                }
                            }                            
                        }
                        //************ FI                        
                    }
                }

                if ($manual and $manualcache[$courseid]) {

                    // find role
                    $rid = false;
                    if (!empty($user->{'role'.$i})) {
                        $addrole = $user->{'role'.$i};
                        if (array_key_exists($addrole, $rolecache)) {
                            $rid = $rolecache[$addrole]->id;
                        } else {
                            $upt->track('enrolments', get_string('unknownrole', 'error', s($addrole)), 'error');
                            continue;
                        }

                    } else if (!empty($user->{'type'.$i})) {
                        // if no role, then find "old" enrolment type
                        $addtype = $user->{'type'.$i};
                        if ($addtype < 1 or $addtype > 3) {
                            $upt->track('enrolments', $strerror.': typeN = 1|2|3', 'error');
                            continue;
                        } else if (empty($formdata->{'uulegacy'.$addtype})) {
                            continue;
                        } else {
                            $rid = $formdata->{'uulegacy'.$addtype};
                        }
                    } else {
                        // no role specified, use the default from manual enrol plugin
                        $rid = $manualcache[$courseid]->roleid;
                    }

                    if ($rid) {
                        // find duration
                        $timeend   = 0;
                        if (!empty($user->{'enrolperiod'.$i})) {
                            $duration = (int)$user->{'enrolperiod'.$i} * 60*60*24; // convert days to seconds
                            if ($duration > 0) { // sanity check
                                $timeend = $today + $duration;
                            }
                        } else if ($manualcache[$courseid]->enrolperiod > 0) {
                            $timeend = $today + $manualcache[$courseid]->enrolperiod;
                        }

                        $manual->enrol_user($manualcache[$courseid], $user->id, $rid, $today, $timeend);

                        $a = new stdClass();
                        $a->course = $shortname;
                        $a->role   = $rolecache[$rid]->name;
                        $upt->track('enrolments', get_string('enrolledincourserole', 'enrol_manual', $a));
                    }
                }

                // find group to add to
                if (!empty($user->{'group'.$i})) {
                    // make sure user is enrolled into course before adding into groups
                    if (!is_enrolled($coursecontext, $user->id)) {
                        $upt->track('enrolments', get_string('addedtogroupnotenrolled', '', $user->{'group'.$i}), 'error');
                        continue;
                    }
                    //build group cache
                    if (is_null($ccache[$shortname]->groups)) {
                        $ccache[$shortname]->groups = array();
                        if ($groups = groups_get_all_groups($courseid)) {
                            foreach ($groups as $gid=>$group) {
                                $ccache[$shortname]->groups[$gid] = new stdClass();
                                $ccache[$shortname]->groups[$gid]->id   = $gid;
                                $ccache[$shortname]->groups[$gid]->name = $group->name;
                                if (!is_numeric($group->name)) { // only non-numeric names are supported!!!
                                    $ccache[$shortname]->groups[$group->name] = new stdClass();
                                    $ccache[$shortname]->groups[$group->name]->id   = $gid;
                                    $ccache[$shortname]->groups[$group->name]->name = $group->name;
                                }
                            }
                        }
                    }
                    // group exists?
                    $addgroup = $user->{'group'.$i};
                    if (!array_key_exists($addgroup, $ccache[$shortname]->groups)) {
                        // if group doesn't exist,  create it
                        $newgroupdata = new stdClass();
                        $newgroupdata->name = $addgroup;
                        $newgroupdata->courseid = $ccache[$shortname]->id;
                        $newgroupdata->description = '';
                        $gid = groups_create_group($newgroupdata);
                        if ($gid){
                            $ccache[$shortname]->groups[$addgroup] = new stdClass();
                            $ccache[$shortname]->groups[$addgroup]->id   = $gid;
                            $ccache[$shortname]->groups[$addgroup]->name = $newgroupdata->name;
                        } else {
                            $upt->track('enrolments', get_string('unknowngroup', 'error', s($addgroup)), 'error');
                            continue;
                        }
                    }
                    $gid   = $ccache[$shortname]->groups[$addgroup]->id;
                    $gname = $ccache[$shortname]->groups[$addgroup]->name;

                    try {
                        if (groups_add_member($gid, $user->id)) {
                            $upt->track('enrolments', get_string('addedtogroup', '', s($gname)));
                        }  else {
                            $upt->track('enrolments', get_string('addedtogroupnot', '', s($gname)), 'error');
                        }
                    } catch (moodle_exception $e) {
                        $upt->track('enrolments', get_string('addedtogroupnot', '', s($gname)), 'error');
                        continue;
                    }
                }
            }
        }
        $response = $upt->close(); // close table

        $cir->close();
        $cir->cleanup(true);
        //************ FI                        

        // If have been some error, send mail to admin
        if (self::SYNCHRO_MAILADMINS == 1 && ($userserrors > 0 || $usersskipped > 0)) {
            $a->filename = $filename;
            $a->errors = ($userserrors > 0) ? $userserrors : 0;
            $a->warnings = ($usersskipped > 0) ? $usersskipped : 0;
            email_to_user(get_admin(), get_admin(), get_string('mailsubject', 'tool_odisseagtafsync'), get_string('mailerror', 'tool_odisseagtafsync', $a), get_string('mailerror', 'tool_odisseagtafsync', $a));
        }

        if (!$this->iscron) {
            $renderer = $PAGE->get_renderer('tool_odisseagtafsync');
            $params = array();
            $params['optype'] = $optype;
            $params['usersnew'] = $usersnew;
            $params['usersupdated'] = $usersupdated + $usersuptodate;
            $params['allowdeletes'] = $allowdeletes;
            $params['deletes'] = $deletes;
            $params['deleteerrors'] = $deleteerrors;
            $params['allowrenames'] = $allowrenames;
            $params['renames'] = $renames;
            $params['renameerrors'] = $renameerrors;
            $params['usersskipped'] = $usersskipped;            
            $params['weakpasswords'] = $weakpasswords;            
            $params['userserrors'] = $userserrors;            
            $results = $renderer->process_csv_page($file, $response, $params);            
        } else {
            $results = get_string('syncusersok', 'tool_odisseagtafsync', $file);
        }
        $this->save_logs($response[0], $file);
        
        // Removed file from tmpfolder to avoid process it again
        unlink($this->outputtmppath . '/' . $file); 

        return $results;        
    }
    
    /**
     * Prepare enrol_flatfile location file to process it when cron will be executed
     * @param string $file Filename with enrolments
     * @return boolean 
     */
    function synchro_enrolments($file) {      
        global $PAGE;
        
        // Create a backup of downloaded file
        $filename = get_filename_withoutrepeat($file, $this->outputpath . '/' . self::SYNCHRO_BACKUPFOLDER);
        if (!copy($this->outputtmppath . '/' . $file, $this->outputpath . '/' . self::SYNCHRO_BACKUPFOLDER . '/' . $filename)) {
            $this->errors[] = 'Error doing file backup: '.$file;
            return;
        }
        
        $flatfilelocation = get_config('enrol_flatfile', 'location');
        if (empty($flatfilelocation)) {
            $flatfilelocation = $this->outputpath . '/enrolments.txt';
            set_config('location', $flatfilelocation, 'enrol_flatfile');
        }
        if (file_exists($flatfilelocation)){
            $content = file_get_contents($this->outputtmppath. '/' . $file);        
            if (!file_put_contents($flatfilelocation, $content, FILE_APPEND)) {
                $this->errors[] = 'Error putting content from '.$file.' to '.$flatfilelocation;
                return;
            }
        } else{
            if (!copy($this->outputtmppath . '/' . $file, $flatfilelocation)) {
                $this->errors[] = 'Error copying file '.$file.' to '.$flatfilelocation;
                return;
            }            
        }
        
        if (!$this->iscron) {
            $renderer = $PAGE->get_renderer('tool_odisseagtafsync');
            $params = array();
            $params['file'] = $file;
            $params['flatfilelocation'] = $flatfilelocation;
            $results = $renderer->prepare_enrolments_page($params);            
        } else {
            $results = get_string('preparedenrolmentsok_cron', 'tool_odisseagtafsync', $flatfilelocation);
        }
        
        // Removed file from tmpfolder to avoid process it again
        unlink($this->outputtmppath . '/' . $file); 
        
        return $results;
    }

    function save_logs($logs, $filename) {
        if (!empty($logs)) {
            //transform array to string			
            $str = '';
            foreach ($logs as $log) {
                $str .= implode(self::SYNCHRO_OUTPUTDELIMETER, $log) . "\n";
            }
            //change $filename extension to csv
            $filename = substr($filename, 0, strlen($filename) - 4) . '.csv';
            
            //save string to file
            $filename = get_filename_withoutrepeat($filename, $this->outputresultspath);

            if (!$f = fopen($this->outputresultspath . '/' . $filename, 'w')) {
                $this->errors[] = 'KO! Imposible to create the output file';
                return;
            }

            if (!fputs($f, utf8_decode($str))) {
                $this->errors[] = 'KO! Imposible to write in the output file';
                return;
            }

            return;
        } else {
            $this->errors[] = 'KO! Empty string result';
            return;
        }
    }

    /**
     * Create a directory.
     *
     * @uses $CFG
     * @param string $directory  a string of directory names 
     * @return string|false Returns full path to directory if successful, false if not
     */
    function create_upload_directory($directory) {

        global $CFG;

        umask(0000);

        $directory = str_replace("\\", "/", $directory);

        $dirarray = explode("/", $directory);
        $currdir = '';

        foreach ($dirarray as $dir) {
            if ($dir == '') {
                continue;
            }
            if ($CFG->ostype != "WINDOWS") {
                $strstart = '/';
            } else {
                $strstart = '';
            }
            $currdir = ($currdir != '') ? $currdir . '/' . $dir : $strstart . $dir;
            if (!is_dir($currdir)) {
                if (!mkdir($currdir)) {
                    return false;
                }
                //@chmod($currdir, $CFG->directorypermissions);  // Just in case mkdir didn't do it
            }
        }
        return $currdir;
    }
    
    /**
     *
     * @param string $file Filename to restore from backup folder
     */
    function restore_file($file) {
        global $PAGE;
        
        if (empty($file)) {
            $this->errors[] = get_string('restorefile_nofile', 'tool_odisseagtafsync');
            return;
        }

        if (!is_file($this->outputbackuppath . '/' . $file)) {
            $this->errors[] = get_string('restorefile_filenofound', 'tool_odisseagtafsync', $file);
            return;
        }
        
        if (file_exists($this->outputtmppath . '/' . $file)) {
            $this->errors[] = get_string('restorefile_fileexists', 'tool_odisseagtafsync', $file);
            return;
        }
        
        if (!copy($this->outputbackuppath . '/' . $file, $this->outputtmppath. '/' . $file)) {
            $this->errors[] = get_string('restorefile_errorcopyingfile', 'tool_odisseagtafsync', $file);
            return;
        }    
        
        $renderer = $PAGE->get_renderer('tool_odisseagtafsync');
        $params = array();
        $params['file'] = $file;
        $results[$file] = $renderer->process_restore_file_page($params);      
        
        return $results;
    }

}


/**
 * Validation callback function - verified the column line of csv file.
 * Converts column names to lowercase too.
 */
function validate_user_upload_columns(&$columns) {
    global $STD_FIELDS, $PRF_FIELDS;

    if (count($columns) < 2) {
        return get_string('csvfewcolumns', 'error');
    }

    // test columns
    $processed = array();
    foreach ($columns as $key => $unused) {
        $columns[$key] = strtolower($columns[$key]); // no unicode expected here, ignore case
        $field = $columns[$key];
        if (!in_array($field, $STD_FIELDS) && !in_array($field, $PRF_FIELDS) && // if not a standard field and not an enrolment field, then we have an error
                !preg_match('/^course\d+$/', $field) && !preg_match('/^group\d+$/', $field) &&
                !preg_match('/^type\d+$/', $field) && !preg_match('/^role\d+$/', $field)) {
            return get_string('invalidfieldname', 'error', $field);
        }
        if (in_array($field, $processed)) {
            return get_string('csvcolumnduplicates', 'error');
        }
        $processed[] = $field;
    }
    return true;
}

/**
 * 
 * @return array auth_name=>auth_string pairs with ALL (not only supported) auths
 */
function odissea_uu_supported_auths (){
    $plugins = get_enabled_auth_plugins();
    $choices = array();
    foreach ($plugins as $plugin) {
        $choices[$plugin] = get_string('pluginname', "auth_{$plugin}");
    }

    return $choices;    
/*
    $supportedauths = uu_supported_auths(); // officially supported plugins that are enabled
    if (!in_array('odissea', $supportedauths)) { // Add also Odissea authentication method
        $supportedauths['odissea'] = get_string('pluginname', 'auth_odissea');
    }
    return $supportedauths;
 */
}

/**
 *
 * @param string $file
 * @param string $folder 
 */
function get_filename_withoutrepeat ($file, $folder){
    $i = 1;
    $filename = $file;
    $fileext = substr($file, strrpos($file, '.'));
    while (file_exists($folder. '/' . $filename)) {
        if (substr($filename, strlen($filename) - 5, 1) != ')') {
            $filename = substr($filename, 0, strlen($filename) - 4) . '(' . $i . ')'.$fileext;
        } else {
            $j = 6;
            while (substr($filename, strlen($filename) - ($j + 1), 1) != '(') {
                $j++;
            }
            $filename = substr($filename, 0, strlen($filename) - $j) . $i . ')'.$fileext;  // need upgrade
        }
        $i++;
    }
    return $filename;
}


class odissea_uu_progress_tracker {
    private $_row;
    public $columns = array('status', 'line', 'id', 'username', 'firstname', 'lastname', 'email', 'password', 'auth', 'enrolments', 'suspended', 'deleted');
    protected $return = array();
    protected $print = '';

    /**
     * Print table header.
     * @return void
     */
    public function start() {
        $ci = 0;
        $this->print .= '<table id="uuresults" class="generaltable boxaligncenter flexible-wrap" summary="'.get_string('uploadusersresult', 'tool_uploaduser').'">';
        $this->print .= '<tr class="heading r0">';
        $this->print .= '<th class="header c'.$ci++.'" scope="col">'.get_string('status').'</th>';
        $this->print .= '<th class="header c'.$ci++.'" scope="col">'.get_string('uucsvline', 'tool_uploaduser').'</th>';
        $this->print .= '<th class="header c'.$ci++.'" scope="col">ID</th>';
        $this->print .= '<th class="header c'.$ci++.'" scope="col">'.get_string('username').'</th>';
        $this->print .= '<th class="header c'.$ci++.'" scope="col">'.get_string('firstname').'</th>';
        $this->print .= '<th class="header c'.$ci++.'" scope="col">'.get_string('lastname').'</th>';
        $this->print .= '<th class="header c'.$ci++.'" scope="col">'.get_string('email').'</th>';
        $this->print .= '<th class="header c'.$ci++.'" scope="col">'.get_string('password').'</th>';
        $this->print .= '<th class="header c'.$ci++.'" scope="col">'.get_string('authentication').'</th>';
        $this->print .= '<th class="header c'.$ci++.'" scope="col">'.get_string('enrolments', 'enrol').'</th>';
        $this->print .= '<th class="header c'.$ci++.'" scope="col">'.get_string('suspended', 'auth').'</th>';
        $this->print .= '<th class="header c'.$ci++.'" scope="col">'.get_string('delete').'</th>';
        $this->print .= '</tr>';
        $this->return[0] = $this->columns;
        $this->_row = null;
    }

    /**
     * Flush previous line and start a new one.
     * @return void
     */
    public function flush($linenum = -1) {
        if (empty($this->_row) or empty($this->_row['line']['normal'])) {
            // Nothing to print - each line has to have at least number
            $this->_row = array();
            foreach ($this->columns as $col) {
                $this->_row[$col] = array('normal'=>'', 'info'=>'', 'warning'=>'', 'error'=>'');
            }
            return;
        }
        
        if ($linenum < 0){
            $linenum = count($this->return);
        }
        $ci = 0;
        $ri = $linenum;
        $this->print .= '<tr class="r'.$ri.'">';
        foreach ($this->_row as $key=>$field) {
            $str = ' ';
            foreach ($field as $type=>$content) {
                if ($field[$type] !== '') {
                    $str = $field[$type];
                    $field[$type] = '<span class="uu'.$type.'">'.$field[$type].'</span>';
                } else {
                    unset($field[$type]);
                }
            }
            $this->print .= '<td class="cell c'.$ci++.'">';
            if (!empty($str)) {
                $this->return[$linenum][] = str_replace(';', ',', str_replace('&quot;', '"', $str));
                unset($str);
            }
            if (!empty($field)) {
                $this->print .= implode('<br />', $field);
            } else {
                $this->print .= '&nbsp;';
            }
            $this->print .= '</td>';
        }
        $this->print .= '</tr>';
        foreach ($this->columns as $col) {
            $this->_row[$col] = array('normal'=>'', 'info'=>'', 'warning'=>'', 'error'=>'');
        }
    }

    /**
     * Add tracking info
     * @param string $col name of column
     * @param string $msg message
     * @param string $level 'normal', 'warning' or 'error'
     * @param bool $merge true means add as new line, false means override all previous text of the same type
     * @return void
     */
    public function track($col, $msg, $level = 'normal', $merge = true) {
        if (empty($this->_row)) {
            $this->flush(); //init arrays
        }
        if (!in_array($col, $this->columns)) {
            debugging('Incorrect column:'.$col);
            return;
        }
        if ($merge) {
            if ($this->_row[$col][$level] != '') {
                $this->_row[$col][$level] .='<br />';
            }
            $this->_row[$col][$level] .= $msg;
        } else {
            $this->_row[$col][$level] = $msg;
        }
    }

    /**
     * Print the table end
     * @return void
     */
    public function close() {
        $this->flush();
        $this->print .= '</table>';
        return array($this->return, $this->print);
    }
}
