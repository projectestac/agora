<?php
// MARSUPIAL ********* ADDED -> settings for my books block

//delete all rscorm my_books auto add entries
if ($module = get_record('modules', 'name', 'rscorm', '', '', '', '', 'id')){
	if ($cs = get_record('course_sections', 'course', 1, 'section', 2, '', '', 'id')){
	    if ($cms = get_records_select('course_modules', 'course = 1 AND module = '.$module->id.' AND section = '.$cs->id, '', 'id, instance')){
	    	include_once($CFG->dirroot.'/mod/rscorm/lib.php');
		    foreach ($cms as $cm){
		    	rscorm_delete_instance($cm->instance);
		    	delete_records('course_modules', 'id', $cm->id);
		    }
	    }
	}	
}
//delete all rcontent my_books out add entries
if ($module = get_record('modules', 'name', 'rcontent', '', '', '', '', 'id')){
	if ($cs = get_record('course_sections', 'course', 1, 'section', 2, '', '', 'id')){
	    if ($cms = get_records_select('course_modules', 'course = 1 AND module = '.$module->id.' AND section = '.$cs->id, '', 'id, instance')){
	    	include_once($CFG->dirroot.'/mod/rcontent/lib.php');
		    foreach ($cms as $cm){
		    	rcontent_delete_instance($cm->instance);
		    	delete_records('course_modules', 'id', $cm->id);
		    }
	    }
	}	
}

//set setting

    /// set how to open the viewer
    $options = array('0'=>get_string('samewindow', 'blocks/my_books'), '1'=>get_string('popup', 'blocks/my_books')); // not nice at all
    $settings->add(new admin_setting_configselect('mybooks_viewer_opening', get_string('viewertypeopen', 'blocks/my_books'),
        get_string('viewertypeopeninfo', 'blocks/my_books'), '1', $options));

    /// set the with of the frame or de popup windows
    $settings->add(new admin_setting_configtext('mybooks_width', get_string('width', 'blocks/my_books'),
    get_string('widthinfo', 'blocks/my_books'), '800'));

    /// set the height of the frame or the opoup windows
    $settings->add(new admin_setting_configtext('mybooks_height', get_string('height', 'blocks/my_books'),
        get_string('heightinfo', 'blocks/my_books'), 600));

    /// set how the activity have to be opened
    $options = array('0'=>get_string('samewindow', 'blocks/my_books'), '1'=>get_string('popup', 'blocks/my_books')); // not nice at all
    $settings->add(new admin_setting_configselect('mybooks_activity_opening', get_string('activitytypeopen', 'blocks/my_books'),
        get_string('activitytypeopeninfo', 'blocks/my_books'), '0', $options));
        
    /// popup header
    $temp = new admin_settingpage('mybooks_popupconfig', get_string('popupconfig', 'blocks/my_books'));
    
    
    $settings->add(new admin_setting_heading('block_my_books_popup', get_string('popupconfig','blocks/my_books'), ''));    
    
    ///popup resizable                   
    $settings->add(new admin_setting_configcheckbox('mybooks_resizable', get_string('resizable', 'blocks/my_books'),
        get_string('resizableinfo', 'blocks/my_books'),1));

    /// popup scrollbars
    $settings->add(new admin_setting_configcheckbox('mybooks_scrollbars', get_string('scrollbars', 'blocks/my_books'),
        get_string('scrollbarsinfo', 'blocks/my_books'),1));

    /// popup show directories bar
    $settings->add(new admin_setting_configcheckbox('mybooks_directories', get_string('directories', 'blocks/my_books'),
        get_string('directoriesinfo', 'blocks/my_books'),0));

    /// popup show location bar
    $settings->add(new admin_setting_configcheckbox('mybooks_location', get_string('location', 'blocks/my_books'),
        get_string('locationinfo', 'blocks/my_books'),0));

    /// popup show menu bar
    $settings->add(new admin_setting_configcheckbox('mybooks_menubar', get_string('menubar', 'blocks/my_books'),
        get_string('menubarinfo', 'blocks/my_books'),0));

    /// popup show tool bar
    $settings->add(new admin_setting_configcheckbox('mybooks_toolbar', get_string('toolbar', 'blocks/my_books'),
        get_string('toolbarinfo', 'blocks/my_books'),0));

    /// show status bar
    $settings->add(new admin_setting_configcheckbox('mybooks_status', get_string('status', 'blocks/my_books'),
        get_string('statusinfo', 'blocks/my_books'),1));

// ********** END

// MARSUPIAL ************** AFEGIR -> EVO: credencials
// 2012.07.06 @mmartinez    
    $settings->add(new admin_setting_configcheckbox('mybooks_addkey', get_string('key_setting', 'blocks/my_books'),
    		get_string('key_setting_info', 'blocks/my_books'), 1));
// ************ FI
?>