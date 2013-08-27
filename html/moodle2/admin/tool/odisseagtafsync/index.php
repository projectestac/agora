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
 * Tool to synchronize users between GTAF and Odissea. It download CSV files from
 * specified FTP server and process them
 *
 * @package    tool
 * @subpackage odisseagtafsync
 * @copyright  2013 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__) . '/../../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once(dirname(__FILE__) . '/locallib.php');
require_once(dirname(__FILE__) . '/config_form.php');
require_once(dirname(__FILE__) . '/sync_form.php');
require_once(dirname(__FILE__) . '/move_form.php');

// admin_externalpage_setup calls require_login and checks moodle/site:config
admin_externalpage_setup('odisseagtafsync');

$renderer = $PAGE->get_renderer('tool_odisseagtafsync');

$header = get_string('pluginname', 'tool_odisseagtafsync');

$form_config = new tool_odisseagtafsync_config_form(
        new moodle_url('/'. $CFG->admin . '/tool/odisseagtafsync/index.php'));
$form_sync = new tool_odisseagtafsync_sync_form(
        new moodle_url('/'. $CFG->admin . '/tool/odisseagtafsync/synchronizer.php'));
$form_move = new tool_odisseagtafsync_move_form(
        new moodle_url('/'. $CFG->admin . '/tool/odisseagtafsync/synchronizer.php'));

$form_config->set_data(get_config('tool_odisseagtafsync'));

$returnurl = new moodle_url('/'. $CFG->admin . '/tool/odisseagtafsync/index.php');

if ($form_config->is_cancelled()) {
    redirect($returnurl);
} else if ($fromform = $form_config->get_data()) {
    set_config('ftphost', $fromform->ftphost, 'tool_odisseagtafsync');
    set_config('ftpusername', $fromform->ftpusername, 'tool_odisseagtafsync');
    set_config('ftppassword', $fromform->ftppassword, 'tool_odisseagtafsync');
    set_config('inputpath', $fromform->inputpath, 'tool_odisseagtafsync');
    set_config('outputpath', $fromform->outputpath, 'tool_odisseagtafsync');

    set_config('uutype', $fromform->uutype, 'tool_odisseagtafsync');
    set_config('uuupdatetype', $fromform->uuupdatetype, 'tool_odisseagtafsync');
    set_config('uunoemailduplicates', $fromform->uunoemailduplicates, 'tool_odisseagtafsync');
    set_config('uustandardusernames', $fromform->uustandardusernames, 'tool_odisseagtafsync');
    set_config('uulegacy1', $fromform->uulegacy1, 'tool_odisseagtafsync');
    set_config('uulegacy2', $fromform->uulegacy2, 'tool_odisseagtafsync');
    set_config('uulegacy3', $fromform->uulegacy3, 'tool_odisseagtafsync');
    
    set_config('auth', $fromform->auth, 'tool_odisseagtafsync');
    set_config('maildisplay', $fromform->maildisplay, 'tool_odisseagtafsync');
    set_config('mailformat', $fromform->mailformat, 'tool_odisseagtafsync');
    set_config('maildigest', $fromform->maildigest, 'tool_odisseagtafsync');
    set_config('autosubscribe', $fromform->autosubscribe, 'tool_odisseagtafsync');
    set_config('trackforums', $fromform->trackforums, 'tool_odisseagtafsync');
    set_config('htmleditor', $fromform->htmleditor, 'tool_odisseagtafsync');
    set_config('country', $fromform->country, 'tool_odisseagtafsync');    
    set_config('timezone', $fromform->timezone, 'tool_odisseagtafsync');
    set_config('lang', $fromform->lang, 'tool_odisseagtafsync');

    redirect($returnurl);
}


//echo '<pre>';
//var_dump($form);
//echo '</pre>';

echo $renderer->header();
echo $renderer->heading(get_string('pluginname', 'tool_odisseagtafsync'));
echo $renderer->box(get_string('paramsdesc', 'tool_odisseagtafsync'));
$form_config->display();
$form_sync->display();
$form_move->display();
echo $renderer->footer();






//echo $renderer->index_page($header);


//XTEC ************* ADD -> New page to run all the synchronization
//2011.01.25 @mmartinez
/*
class block_odissea_gtaf_synchronization extends block_base {

    function init() {
        $this->title = get_string('blockname', 'blocks/odissea_gtaf_synchronization');
        $this->version = 2011121992;
        $this->cron = 8*60*60; //24h * 60' * 60'' = 86400
    }

    function applicable_formats() {
        return array('none' => true);
    }
    function instance_allow_multiple() {
        return false;
    }

    function get_content() {
        return '';
    }
    
    function has_config() {
        return true;
    }
    
    function cron(){
    	//load syncronicer
    	require_once 'synchronizer.php';
    	$synchro = new odissea_gtaf_synchronizer(true);
    	//call synchro
        $result = $synchro->synchro();
        //print result
        mtrace(' '.$result);
        
        return true;
    }
}
*/
//*********** FI
