<?php
//XTEC ************ FITXER AFEGIT - To allow capitalize user names
//2010.06.30 @pferre22
//@AUTHOR Pau Ferrer Ocaña - pferre22@xtec.cat

/**
* script for bulk user capitalize operations
*/

require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php');

$confirm = optional_param('confirm', 0, PARAM_BOOL);

admin_externalpage_setup('userbulk');
require_capability('moodle/user:editprofile', get_context_instance(CONTEXT_SYSTEM));

$return = $CFG->wwwroot.'/'.$CFG->admin.'/user/user_bulk.php';

if (empty($SESSION->bulk_users)) {
    redirect($return);
}

admin_externalpage_print_header();

//TODO: add support for large number of users

if ($confirm and confirm_sesskey()) {
    $primaryadmin = get_admin();

    $in = implode(',', $SESSION->bulk_users);
    if ($rs = get_recordset_select('user', "id IN ($in)")) {
        while ($user = rs_fetch_next_record($rs)) {
        	$user->firstname = ucwords($user->firstname);
        	$user->lastname = ucwords($user->lastname);
        	$user->timemodified = time();

            if ($primaryadmin->id != $user->id and $USER->id != $user->id and update_record('user', $user)) {
                unset($SESSION->bulk_users[$user->id]);
            } else {
                notify(get_string('ucwordsnot', '', fullname($user, true)));
            }
        }
        rs_close($rs);
    }
    else{
    	error('Error updating user record');
    }
    redirect($return, get_string('changessaved'));

} else {
    $in = implode(',', $SESSION->bulk_users);
    $userlist = get_records_select_menu('user', "id IN ($in)", 'fullname', 'id,'.sql_fullname().' AS fullname');
    $usernames = implode(', ', $userlist);
    $optionsyes = array();
    $optionsyes['confirm'] = 1;
    $optionsyes['sesskey'] = sesskey();
    print_heading(get_string('confirmation', 'admin'));
    notice_yesno(get_string('ucwordscheckfull', '', $usernames), 'user_bulk_ucwords.php', 'user_bulk.php', $optionsyes, NULL, 'post', 'get');

}

admin_externalpage_print_footer();
?>
