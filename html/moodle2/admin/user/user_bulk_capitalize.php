<?php
//XTEC ************ FITXER AFEGIT - To allow capitalize user names
//2012.12.07 @sarjona

/**
 * script for bulk user capitalize operations
 *
 * @package    admin
 * @subpackage user
 * @author  Pau Ferrer Ocaña - pau.ferrer-ocana@upcnet.es
 * Original code written by Pau Ferrer Ocaña on Departament d'Ensenyament
 * Generalitat de Catalunya (http://projectes.lafarga.cat/projects/agora)
 * 
 * Ported to Moodle 2 by UPCnet (http://www.upcnet.es)
 * 
 * @copyright  2012 Generalitat de Catalunya, UPCnet
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php');

$confirm = optional_param('confirm', 0, PARAM_BOOL);

require_login();
admin_externalpage_setup('userbulk');
require_capability('moodle/user:editprofile', get_context_instance(CONTEXT_SYSTEM));

$return = $CFG->wwwroot.'/'.$CFG->admin.'/user/user_bulk.php';

if (empty($SESSION->bulk_users)) {
    redirect($return);
}


//TODO: add support for large number of users

if ($confirm and confirm_sesskey()) {
    list($in, $params) = $DB->get_in_or_equal($SESSION->bulk_users);
    $rs = $DB->get_recordset_select('user', "id $in", $params);
    foreach($rs as $user){
		$user->firstname = mb_convert_case($user->firstname, MB_CASE_TITLE, "UTF-8");
		$user->lastname = mb_convert_case($user->lastname, MB_CASE_TITLE, "UTF-8");
		$user->timemodified = time();

		if (!is_siteadmin($user) and $USER->id != $user->id and $DB->update_record('user', $user)) {
			unset($SESSION->bulk_users[$user->id]);
		} else {
			notify(get_string('capitalizenot', 'local_agora', fullname($user, true)));
		}
    }
    $rs->close();
    redirect($return, get_string('changessaved'));
    
} else {
    echo $OUTPUT->header();
    list($in, $params) = $DB->get_in_or_equal($SESSION->bulk_users);
    $userlist = $DB->get_records_select_menu('user', "id $in", $params, 'fullname', 'id,'.$DB->sql_fullname().' AS fullname');
    $usernames = implode(', ', $userlist);
    
    echo $OUTPUT->heading(get_string('confirmation', 'admin'));
    $formcontinue = new single_button(new moodle_url('user_bulk_capitalize.php', array('confirm' => 1)), get_string('yes'));
    $formcancel = new single_button(new moodle_url('user_bulk.php'), get_string('no'), 'get');
    echo $OUTPUT->confirm(get_string('capitalizecheckfull', 'local_agora', $usernames), $formcontinue, $formcancel);
    echo $OUTPUT->footer();
}

