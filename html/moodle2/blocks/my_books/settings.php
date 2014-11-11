<?php
//delete all rscorm my_books auto add entries
//TODO abertranb confirmar que sigui necessari
if (false) {
    if ($module = $DB->get_record('modules', array('name' => 'rscorm'), 'id')){
    	if ($cs = $DB->get_record('course_sections', array('course' => 1, 'section' => 2), 'id')){
    	    if ($cms = $DB->get_records_select('course_modules', 'course = 1 AND module = '.$module->id.' AND section = '.$cs->id, array(), 'id, instance')){
    	    	include_once($CFG->dirroot.'/mod/rscorm/lib.php');
    		    foreach ($cms as $cm){
    		    	rscorm_delete_instance($cm->instance);
    		    	$DB->delete_records('course_modules', array('id' => $cm->id));
    		    }
    	    }
    	}
    }
    //delete all rcontent my_books out add entries
    if ($module = $DB->get_record('modules', array('name' => 'rcontent'), 'id')){
    	if ($cs = $DB->get_record('course_sections', array('course' => 1, 'section' => 2), 'id')){
    	    if ($cms = $DB->get_records_select('course_modules', 'course = 1 AND module = '.$module->id.' AND section = '.$cs->id, array(), 'id, instance')){
    	    	include_once($CFG->dirroot.'/mod/rcontent/lib.php');
    		    foreach ($cms as $cm){
    		    	rcontent_delete_instance($cm->instance);
    		    	delete_records('course_modules', 'id', $cm->id);
    		    }
    	    }
    	}
    }
}


// Set how to open the viewer
$options = array('0' => get_string('samewindow', 'block_my_books'), '1' => get_string('popup', 'block_my_books')); // not nice at all
$settings->add(new admin_setting_configselect('mybooks/viewer_opening', get_string('viewertypeopen', 'block_my_books'),
    get_string('viewertypeopeninfo', 'block_my_books'), '1', $options));

// Set the with of the frame or de popup windows
$settings->add(new admin_setting_configtext('mybooks/width', get_string('width', 'block_my_books'),
get_string('widthinfo', 'block_my_books'), '800'));

// Set the height of the frame or the opoup windows
$settings->add(new admin_setting_configtext('mybooks/height', get_string('height', 'block_my_books'),
    get_string('heightinfo', 'block_my_books'), 600));

// Set how the activity have to be opened
$options = array('0' => get_string('samewindow', 'block_my_books'), '1' => get_string('popup', 'block_my_books')); // not nice at all
$settings->add(new admin_setting_configselect('mybooks/activity_opening', get_string('activitytypeopen', 'block_my_books'),
    get_string('activitytypeopeninfo', 'block_my_books'), '0', $options));

// Popup header
$settings->add(new admin_setting_heading('block_my_books_popup', get_string('popupconfig', 'block_my_books'), ''));

// Popup resizable
$settings->add(new admin_setting_configcheckbox('mybooks/resizable', get_string('resizable', 'block_my_books'),
    get_string('resizableinfo', 'block_my_books'), 1));

// Popup scrollbars
$settings->add(new admin_setting_configcheckbox('mybooks/scrollbars', get_string('scrollbars', 'block_my_books'),
    get_string('scrollbarsinfo', 'block_my_books'), 1));

// Popup show directories bar
$settings->add(new admin_setting_configcheckbox('mybooks/directories', get_string('directories', 'block_my_books'),
    get_string('directoriesinfo', 'block_my_books'), 0));

// Popup show location bar
$settings->add(new admin_setting_configcheckbox('mybooks/location', get_string('location', 'block_my_books'),
    get_string('locationinfo', 'block_my_books'), 0));

// Popup show menu bar
$settings->add(new admin_setting_configcheckbox('mybooks/menubar', get_string('menubar', 'block_my_books'),
    get_string('menubarinfo', 'block_my_books'), 0));

// Popup show tool bar
$settings->add(new admin_setting_configcheckbox('mybooks/toolbar', get_string('toolbar', 'block_my_books'),
    get_string('toolbarinfo', 'block_my_books'), 0));

// Show status bar
$settings->add(new admin_setting_configcheckbox('mybooks/status', get_string('status', 'block_my_books'),
    get_string('statusinfo', 'block_my_books'), 1));

// ********** END

// MARSUPIAL ************** AFEGIR -> EVO: credencials
// 2012.07.06 @mmartinez
$settings->add(new admin_setting_configcheckbox('mybooks/addkey', get_string('key_setting', 'block_my_books'),
		get_string('key_setting_info', 'block_my_books'), 1));
// ************ FI
