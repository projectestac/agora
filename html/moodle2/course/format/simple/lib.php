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
 * This file contains main class for the course format Simple Topic
 *
 * @since     2.0
 * @package   format_simple
 * @copyright 2012 UPCnet
 * @author Pau Ferrer Ocaña pau.ferrer-ocana@upcnet.es, Jaume Fernàndez Valiente jfern343@xtec.cat
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot. '/course/format/lib.php');
require_once($CFG->dirroot. '/course/format/topics/lib.php');

/**
 * Main class for the Simple Topics course format
 *
 * @package    format_simple
 * @copyright  2012 UPCnet
 * @author Pau Ferrer Ocaña pau.ferrer-ocana@upcnet.es, Jaume Fernàndez Valiente jfern343@xtec.cat
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class format_simple extends format_topics {

	
}

function format_simple_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload){

    if ($context->contextlevel != CONTEXT_MODULE) {
        return false;
    }

    if ($filearea !== 'bigicon') {
        return false;
    }

    array_shift($args); // ignore revision - designed to prevent caching problems only

    $fs = get_file_storage();
    $relativepath = implode('/', $args);
    $fullpath = rtrim("/$context->id/format_simple/$filearea/0/$relativepath", '/');
    $file = $fs->get_file_by_hash(sha1($fullpath));

    $filter = 0;
	$forcedownload = false;
    // finally send the file
    send_stored_file($file, 86400, $filter, $forcedownload);
}

function simple_get_current_icon_url($modname, $instanceid){
	global $CFG, $COURSE;
	
	$context = context_module::instance($instanceid,IGNORE_MISSING);
	if($context){ 
		// Get file
		$fs = get_file_storage();
		$component = 'format_simple';
		$filearea = 'bigicon';
		$files = $fs->get_area_files($context->id, $component, $filearea, 0, "sortorder, itemid, filepath, filename", false);
		if(!empty($files)){
			$file = array_pop($files);
			$url = "{$CFG->wwwroot}/pluginfile.php/{$file->get_contextid()}/$component/$filearea";
			return $url.$file->get_filepath().$file->get_itemid().'/'.$file->get_filename();
		}
	}
	return false;
}

//Retorna la url de la icona
function simple_get_icon_url($mod, $instanceid = false){
	if($instanceid){
		$icon = simple_get_current_icon_url($mod->modname, $instanceid);
		if($icon) return $icon;
	}
	return simple_get_default_icon_url($mod);
}

function simple_get_default_icon_url($mod){
	global $OUTPUT;
	// Support modules setting their own, external, icon image
    if (empty($mod->iconurl) && empty($mod->icon)) {
		return $OUTPUT->pix_url('icon', $mod->modname);
	}
	return $mod->get_icon_url();
}

//Updates the selected imatge to the course module from the form
function simple_update_module_image($data) {
    if($data->simple_image == 0 && (!isset($data->default_image) || $data->default_image == 'current')) {
        //It's not necessary to change current image
        return;
    }
    
    //First, try to erase current image if current is not selected
    if($data->simple_image == 0 && isset($data->default_image) && $data->default_image != 'current'){
    	simple_delete_module_image($data->coursemodule);
    }
    
    //Then copy the image selected to the module space
    simple_add_module_image($data);
}

//Adds the selected imatge to the course module from the form
function simple_add_module_image($data) {
	global $CFG, $USER;
    
    $cmid = $data->coursemodule;
	
    if($data->simple_image == 0){   	
    	//Copy file if default is not selected
    	if($data->default_image != 'default'){
    		//Copy the file from $data->default_image
    		$fs = get_file_storage();
 			$context = context_module::instance($cmid);
 			$component = 'format_simple';
			$filearea = 'bigicon';
			// Prepare file record object
			$fileinfo = array(
			    'contextid' => $context->id, // ID of context
			    'component' => $component,     // usually = table name
			    'filearea' => $filearea,     // usually = table name
			    'itemid' => 0,               // usually = ID of row in table
			    'filepath' => '/',           // any path beginning and ending in /
				'userid' => $USER->id); // any filename
			
    		if(strpos($data->default_image,'subject/')===0){
    			$fileinfo['filename'] = $data->default_image;
				$from_path = "$CFG->dirroot/course/format/simple/pix/".$data->default_image;
				$fs->create_file_from_pathname($fileinfo, $from_path);
    		} else {
    			//Copy only in the database!
    			$file = $fs->get_file_by_id($data->default_image);
    			if($file){
	    			$fileinfo['filename'] = $file->get_filename();
	    			$fs->create_file_from_storedfile($fileinfo,$file->get_id());
    			}
    		}
    	}
    	
    	return;
    }
    
    //Personalized image uploaded
    $fs = get_file_storage();
    $context = get_context_instance(CONTEXT_MODULE, $cmid);
    
	$component = 'format_simple';
	$filearea = 'bigicon';
    $draftitemid = $data->simple_icon;
    
    $file_options = array('subdirs' => false, 'maxfiles' => 1, 'accepted_types' => 'image'); 
    if ($draftitemid) {
        file_save_draft_area_files($draftitemid, $context->id, $component, $filearea, 0, $file_options);
    }
	return;
	
}

//Deletes the selected imatge to the course module from the form
function simple_delete_module_image($cmid) {
    
    $context = get_context_instance(CONTEXT_MODULE, $cmid);
    if($context){
    	$fs = get_file_storage();
		$component = 'format_simple';
		$filearea = 'bigicon';
    	//Erase current image
		$files = $fs->get_area_files($context->id, $component, $filearea);
		foreach($files as $file){
			$file->delete();
		}
    }
}

function simple_coursemodule_elements(&$mform, $mod) {
    global $CFG, $PAGE, $DB, $USER;

	$courseid = $mod->course;
	$modname = $mod->modname;
	
    if ($modname == 'label') return;

	$mform->addElement('header', 'simple_iconhdr', get_string('icon', 'format_simple'));

	//TODO: Ajuda
	//$mform->addHelpButton('simple_iconhdr', 'icon', 'format_simple');

	$instanceid = isset($_GET["update"]) ? $_GET["update"] : false;
		
	$default_icon = simple_get_default_icon_url($mod, $instanceid);
	$current_icon = simple_get_current_icon_url($modname, $instanceid);
        
	//Opcions de les icones a triar
	$icon_options = array();
	$icons_url = array();
	$icons_hash = array();
	
	$current_image_atts = array('id'=>'def_img', 'class'=>'simple-bigicon icon', 'alt'=>'' );
	if ($current_icon) {
		$current_image_atts['src'] = $current_icon;
		$icon_options['current'] = get_string('use_current_image', 'format_simple');
		$icons_url['current'] = $current_icon;
		//$icons_hash[sha1_file($pathname)] = true;
	} else {
		$current_image_atts['src'] = $default_icon;
	}
	$current_image = html_writer::empty_tag('img', $current_image_atts);
	
	$icon_options['default'] = get_string('default', 'format_simple');
	$icons_url['default'] = (string)$default_icon;
	//$icons_hash[sha1_file($pathname)] = true;
	
	//Imatges per matèries predefinides
	$act_icon_folder_data = "$CFG->dirroot/course/format/simple/pix/subject/";
	if (file_exists($act_icon_folder_data) && $handle = opendir($act_icon_folder_data)) {
		while (false !== ($file = readdir($handle))) {
			$matches = array();
			if (preg_match('/(\w+)\.(png|jpg|gif)/i', $file, $matches)) {
				$key =  'subject/' . $matches[0];
				$icon_options[$key] = get_string($matches[1], 'format_simple');
				$icons_url[$key] = "$CFG->wwwroot/course/format/simple/pix/$key";
				$icons_hash[sha1_file("$act_icon_folder_data/$matches[0]")] = true;
			}
		}
		closedir($handle);
	}
	
	$component = 'format_simple';
	$filearea = 'bigicon';
	
	
	//User and Course uploaded images
	$contextcourse = context_course::instance($courseid);
	
	//Get child activities contexts:
	$select = "contextlevel = :ctxlevel AND path LIKE :path";
    $params = array('path'=> $contextcourse->path.'/%', 'ctxlevel' => CONTEXT_MODULE);
    $act_contexts = $DB->get_fieldset_select('context','id',$select,$params);
    
    $params = array('component'=>$component, 'filearea'=>$filearea, 'userid' => $USER->id);
	if(!empty($act_contexts)){
		$contexts = implode(',',$act_contexts);
		$select = 'component = :component AND filearea = :filearea AND (contextid IN('.$contexts.') OR userid = :userid)';
		$file_records = $DB->get_records_select('files', $select, $params, 'sortorder, itemid, filepath, filename');
	} else {
	    $file_records = $DB->get_records('files', $params, 'sortorder, itemid, filepath, filename');
	}

	if($file_records){
		$fs = get_file_storage();
		$current_withoutslash = clean_param($current_icon, PARAM_FILE);
		foreach($file_records as $file){
			$file = $fs->get_file_instance($file);
			
			if(!$file->is_directory()){
				$filename = $file->get_filename();
				$filehash = $file->get_contenthash();
				if($filename != $current_withoutslash && !isset($icons_hash[$filehash])){
					$key = $file->get_id();
					$icon_options[$key] = $filename;
					
					$url = "{$CFG->wwwroot}/pluginfile.php/{$file->get_contextid()}/$component/$filearea";
		    		$icons_url[$key] = $url.$file->get_filepath().$file->get_itemid().'/'.$filename;
		    		
		    		$icons_hash[$filehash] = true;
				}
			}
		}
	}
	
	
	$jsmodule = array(
	    'name'     => 'format_simple',
	    'fullpath' => '/course/format/simple/module.js',
	    'requires' => array('base'),
	);
	$PAGE->requires->js_init_call('M.format_simple.init', array($icons_url), true, $jsmodule);
	
	$imagearray = array();
	$imagearray[] = & $mform->createElement('radio', 'simple_image', '', get_string('use_existing_image', 'format_simple'), 0);
	$imagearray[] = & $mform->createElement('select', 'default_image', '', $icon_options);
	$imagearray[] = & $mform->createElement('radio', 'simple_image', '', get_string('upload_image', 'format_simple'), 1);
	
	$separators = array(
		0 => '<br/>',
		1 => $current_image . '<br/>');
	
	$mform->addGroup($imagearray, 'simple_image', '', $separators, false);
	$mform->setDefault('simple_image', 0);
	$mform->disabledIf('default_image', 'simple_image', 'neq', '0');
	
	$mform->addElement('filepicker', 'simple_icon',  get_string('select_file', 'format_simple'), null,
				array('subdirs' => false, 'maxfiles' => 1, 'accepted_types' => 'image'));
	$mform->disabledIf('simple_icon', 'simple_image', 'neq', '1');
}

