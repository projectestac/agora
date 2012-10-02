<?php
    require_once('../../../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    
    require_once('import19.lib.php');
        
    admin_externalpage_setup('import19');
    
    require_adminps();    

    echo $OUTPUT->header();
	echo '<h2>'.get_string('import19','local_agora').'</h2>';
	
	$filename = optional_param('filename',false, PARAM_TEXT);
	$delete = optional_param('delete',false, PARAM_TEXT);
	$path = $CFG->dataroot.'/agora/import19/';
	
	if($filename){
		
		if(substr(strtolower($filename), -5) === '.zipd'){
			rename($path.$filename,substr($path.$filename,0,-1));
			$filename = substr($path.$filename,0,-1);
		}
		
		if(import19_restore($filename)){
			rename($path.$filename,$path.$filename.'d');
		}
	} else {
		if($delete)
			if(unlink($path.$delete)) echo $OUTPUT->notification("Fitxer $delete eliminat");
		import19_filelist();
	} 
	

	echo $OUTPUT->footer();



