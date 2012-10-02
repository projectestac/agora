<?php
/**
 * Show the manage module site
 * @author		Felix Casanellas (felix.casanellas@gmail.com)
 * @return		The configuration information
 */
function Export_admin_main(){
	// Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}
	
	$dom = ZLanguage::getModuleDomain('Export');
	// Create output object
	$pnRender = pnRender::getInstance('Export',false);
	
	$backup_folder = FormUtil::getPassedValue('backup_folder', isset($args['backup_folder']) ? $args['backup_folder'] : null, 'POST');
	$root = '';
	if (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1){
		$root = $GLOBALS['PNConfig']['Multisites']['filesRealPath'].'/data/';
	}
	if($backup_folder) pnModSetVar('Export', 'backup_folder', $backup_folder);
	else $backup_folder = pnModGetVar('Export', 'backup_folder');
    
	//Check if the backup folder exists and is writable
	if($backup_folder != ""){
	    if(!file_exists($root.$backup_folder)){
	        LogUtil::registerError(__('Backup folder don\'t exists', $dom)); 
	    }else{
    	    if(!is_writeable($root.$backup_folder)){
    	        LogUtil::registerError(__('Backup folder is not writeable', $dom));   
    	    } 
	    }
	}else{
            LogUtil::registerError(__('Backup folder is not set', $dom));	        
	}
	
	$pnRender->assign('backup_folder', $backup_folder);
	return $pnRender->fetch('Export_admin_main.htm');
}


/**
 * Export modules
 * @author:    Felix Casanellas (felix.casanellas@gmail.com)
 * @return:		Shows the list of the actual maodules and their propieties
*/
function Export_admin_exportModules(){
	// Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}
	
	$dom = ZLanguage::getModuleDomain('Export');
	$modules_selected = FormUtil::getPassedValue('modules_selected', isset($args['modules_selected']) ? $args['modules_selected'] : null, 'POST');
	// Create output object
	$pnRender = pnRender::getInstance('Export',false);
	
	if (!empty($modules_selected)){
	    //S'agafen tots els moduls de la llista, es genera el paquet d'exportació
        if (!$export_pack =  pnModAPIFunc ('Export', 'admin', 'getExportPack', array('modules_selected'=>$modules_selected))){
	        LogUtil::registerError(__('It\'s not possible to generate the export pack', $dom));
	    }else{
			//$pnRender -> assign('export_pack', $export_pack);
			// get file size
            $fileSize = filesize($export_pack);
            $file = basename($export_pack);
            // begin writing headers
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Type: application/tar");
            // force the download
            $header = "Content-Disposition: attachment; filename=" . $file . ";";
            header($header);
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . $fileSize);
            ob_end_clean();
            readfile($export_pack);
            unlink($export_pack);
		}    
	}else{
	    //Es busquen tots els possibles moduls a exportar i es passa una llista a la plantilla
	    if($modules_info = pnModAPIFunc('Export', 'admin', 'modulesInfo')){
	         $pnRender -> assign('modules_info', $modules_info);   
	    }	    
	}											
	return $pnRender -> fetch('Export_admin_export_modules.htm');
}


/**
 * Add a variable to a module
 * @author:    Felix Casanellas (felix.casanellas@gmail.com)
 * @return:		The form to add the variable
*/
function Export_admin_addVariable(){
	// Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}
	
	$dom = ZLanguage::getModuleDomain('Export');
	
	$variable = FormUtil::getPassedValue('variable', isset($args['variable']) ? $args['variable'] : null, 'GETPOST');
	$module = FormUtil::getPassedValue('mod', isset($args['mod']) ? $args['mod'] : null, 'GETPOST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$root_module = FormUtil::getPassedValue('root_module', isset($args['root_module']) ? $args['root_module'] : null, 'GETPOST');
	$root_variable = FormUtil::getPassedValue('root_variable', isset($args['root_variable']) ? $args['root_variable'] : null, 'GETPOST');
	$var_id = FormUtil::getPassedValue('var_id', isset($args['var_id']) ? $args['var_id'] : null, 'GETPOST');
		
	if ($confirm){
		pnModAPIFunc('Export', 'admin', 'addVariable', array('variable' => $variable,
															'module_name' => $module,
															'root_module' => $root_module,
															'root_variable' => $root_variable,
															'var_id' => $var_id));
		return pnRedirect(pnModURL('export', 'admin', 'manage'));
	}else{
		// Create output object
		$pnRender = pnRender::getInstance('Export',false);
		$pnRender -> assign('module', $module);
		$pnRender -> assign('variable', $variable);
		$pnRender -> assign('root_module', $root_module);
		$pnRender -> assign('root_variable', $root_variable);		
		$pnRender -> assign('var_id', $var_id);	

		return $pnRender -> fetch('Export_admin_add_variable.htm');
	}
}


/**
 * Delete a variable of a module
 * @author:    Felix Casanellas (felix.casanellas@gmail.com)
 * @return:		A message with the result of the action
 */
function Export_admin_delVariable(){
	// Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}
	
	$dom = ZLanguage::getModuleDomain('Export');
	
	$variable = FormUtil::getPassedValue('variable', isset($args['variable']) ? $args['variable'] : null, 'GETPOST');
	$module = FormUtil::getPassedValue('mod', isset($args['mod']) ? $args['mod'] : null, 'GETPOST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	
	if ($confirm){
		pnModAPIFunc('Export', 'admin', 'delVariable', array('variable' => $variable,
															'module_name' => $module));
															
		LogUtil::registerStatus (__('Variable succesfully removed.', $dom));
		return pnRedirect(pnModURL('export', 'admin', 'manage'));
	}else{
		// Create output object
		$pnRender = pnRender::getInstance('Export',false);
		$pnRender -> assign('module', $module);
		$pnRender -> assign('variable', $variable);		

		return $pnRender -> fetch('Export_admin_del_variable.htm');
	}
}


/**
 * Take the export pack and replace actual modules with new versions 
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return A list with the correctly imported modules 
 */
function Export_admin_import(){
    // Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}

	$dom = ZLanguage::getModuleDomain('Export');
    $temp_path = FormUtil::getPassedValue('temp_path', isset($args['temp_path']) ? $args['temp_path'] : null, 'POST');
    $modules_selected = FormUtil::getPassedValue('modules_selected', isset($args['modules_selected']) ? $args['modules_selected'] : null, 'POST');
    $backup = FormUtil::getPassedValue('backup', isset($args['backup']) ? $args['backup'] : null, 'POST');
	$pnRender = pnRender::getInstance('Export',false);
	$package_url = FormUtil::getPassedValue('package_url', isset($args['package_url']) ? $args['package_url'] : null, 'POST');
	
	
	$no_allowed = ((pnModGetVar('export', 'import_user') != '') && (pnModGetVar('export', 'import_user') != pnUserGetVar('uname'))) ? '1' : '0';
	/*$multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;
	$no_allowed = (($multizk) && (pnUserGetVar('uname')!='xtecadmin')) ? '1' : '0';*/
	
	if (($package_name = $_FILES['package']['name']) || ($package_url && ($package_url != 'http://'))){
		if (($package_name) && ($package_url != 'http://')){
			// Error message
			LogUtil::registerError(__('It\'s not possible to import a local package and another from an URL together', $dom));
			return $pnRender -> fetch('Export_admin_import_upload.htm');
		}
		if ($package_url && ($package_url != 'http://')){
			$file_name = substr($package_url, strrpos($package_url, '/'));
			if ($content = file_get_contents($package_url)){
				$temp_path = sys_get_temp_dir() . "/" . $file_name;
				$fp = fopen($temp_path, 'w');
				fwrite($fp, $content);
				fclose($fp);
			}
			else{
				// Error
				LogUtil::registerError(__('It\'s not possible to upload the package', $dom));
				return $pnRender -> fetch('Export_admin_import_upload.htm');
			}			
		}
		else{
			$temp_path = $_FILES['package']['tmp_name'];
			copy($temp_path, sys_get_temp_dir() . "/" . $package_name);
			$temp_path = sys_get_temp_dir() . "/" . $package_name;
		}
	    // Show a list with the modules of the package
	    $modules_list = pnModAPIFunc ('Export', 'admin', 'getModulesFromPack', array('pack_path'=>$temp_path));
	    $unavailable_list = $modules_list['Unavailable'];
	    if(pnConfigGetVar('Version_Num') != $modules_list['ZkVersion']) LogUtil::registerError(__f('Zikula version %s is required.', $modules_list['ZkVersion'], $dom));
	    
	    $modules_list = $modules_list['Available'];
	    $pnRender -> assign('temp_path', $temp_path);
	    $pnRender -> assign('modules_list', $modules_list);
	    $pnRender -> assign('unavailable_list', $unavailable_list);
	    
	    // Check if backup folder is available
    	$backup_folder = pnModGetVar("export", "backup_folder");
		if (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1){
			$backup_folder = $GLOBALS['PNConfig']['Multisites']['filesRealPath'].'/data/'.$backup_folder;
		}
    	if(pnModGetVar("export", "backup_folder")){    	    
    	    if(!file_exists($backup_folder)){
    	        $pnRender -> assign('backup_error', __('Backup folder don\'t exists', $dom));
    	    }elseif(!is_writeable($backup_folder)){
    	        $pnRender -> assign('backup_error', __('Backup folder is not writeable', $dom));
    	    } 
    	}else{
    	        $pnRender -> assign('backup_error', __('Backup folder is not set in the module configuration', $dom));
    	}
	    return $pnRender -> fetch('Export_admin_import_select.htm');
    	            
	}elseif(!empty($modules_selected)){
	    // Import the selected module
	    // Make backup if is required
	    if(!empty($backup)){
	        if(!$backup_result = pnModAPIFunc ('Export', 'admin', 'backupModules', array('modules_selected'=>$modules_selected))){
	            LogUtil::registerError(__('Backup failure!', $dom));
	            return $pnRender -> fetch('Export_admin_import_upload.htm');
	        }
	    }
	    $imported_modules =  pnModAPIFunc ('Export', 'admin', 'importPack', array('pack_path'=>$temp_path,
                                                                                 'modules_selected'=>$modules_selected));
	    $pnRender -> assign('imported_modules', $imported_modules);
	    return $pnRender -> fetch('Export_admin_import_report.htm');
	    
	}else{
		$pnRender->assign('no_allowed', $no_allowed);
	    return $pnRender -> fetch('Export_admin_import_upload.htm');
	}
}


/**
 * Shows the list of all backups available and allows to delete or restore it 
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return Nothing
 */
function Export_admin_backup(){
    // Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}
	
	$dom = ZLanguage::getModuleDomain('Export');
	$pnRender = pnRender::getInstance('Export',false);
	$backup_folder = pnModGetVar("export", "backup_folder");
	if (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1){
		$backup_folder = $GLOBALS['PNConfig']['Multisites']['filesRealPath'].'/data/'.$backup_folder;
	}
    
	//Check if the backup folder exists and is writable
	if(pnModGetVar("export", "backup_folder")){
	    if(!file_exists($backup_folder)){
	        LogUtil::registerError(__('Backup folder don\'t exists', $dom));
	        return $pnRender -> fetch('Export_admin_backup_list.htm');    
	    }elseif(!is_writeable($backup_folder)){
	        LogUtil::registerError(__('Backup folder is not writeable', $dom));
	        return $pnRender -> fetch('Export_admin_backup_list.htm');    
	    } 
	}else{
            LogUtil::registerError(__('Backup folder is not set in the module configuration', $dom));
            return $pnRender -> fetch('Export_admin_backup_list.htm');	        
	}	
	
	$handle = opendir($backup_folder);
	$backup_files = array();
	$i=0;
	
    while (false !== ($file = readdir($handle))) {
		if(substr($file, 0, 1)!='.'){
            $backup_files[$i]['file'] = $file;
            $time = substr( substr($file, strlen('export_pack_')),0 ,-strlen('.tar')); 
            $backup_files[$i]['date'] = date("F j, Y, g:i a", $time);
            $backup_files[$i]['modules'] =  pnModAPIFunc ('Export', 'admin', 'getModulesFromPack', array('pack_path'=>$backup_folder . '/' . $file));
            $i++;  
        }
    }
    
    $pnRender -> assign('backup_files', $backup_files);
    return $pnRender -> fetch('Export_admin_backup_list.htm');
}


/**
 * Delete the selected backup file of the server 
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return Nothing
 */
function Export_admin_backup_del(){
    // Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}
	
	$dom = ZLanguage::getModuleDomain('Export');
	$pnRender = pnRender::getInstance('Export',false);
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$backup_file = FormUtil::getPassedValue('backup_file', isset($args['backup_file']) ? $args['backup_file'] : null, 'GETPOST');
	$backup_folder = pnModGetVar("export", "backup_folder");
	if (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1){
		$backup_folder = $GLOBALS['PNConfig']['Multisites']['filesRealPath'].'/data/'.$backup_folder;
	}
	
	if($confirm){
	    // delete the backup file
	    if(!unlink($backup_folder . '/' . $backup_file)){
	        LogUtil::registerError(__('It\'s not possible to delete the backup', $dom));
	    }
	    return pnModFunc ('Export', 'admin', 'backup');   
	}
	
	// Show confirmation message
	$pnRender -> assign('backup_file', $backup_file);
	return $pnRender -> fetch('Export_admin_backup_delete.htm');
}


/**
 * Restore the selected backup file 
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return Nothing
 */
function Export_admin_backup_restore(){
    // Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}
	
	$dom = ZLanguage::getModuleDomain('Export');
	$pnRender = pnRender::getInstance('Export',false);
	$modules_selected = FormUtil::getPassedValue('modules_selected', isset($args['modules_selected']) ? $args['modules_selected'] : null, 'POST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$backup_file = FormUtil::getPassedValue('backup_file', isset($args['backup_file']) ? $args['backup_file'] : null, 'GETPOST');
	$backup_folder = pnModGetVar("export", "backup_folder");
	if (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1){
		$backup_folder = $GLOBALS['PNConfig']['Multisites']['filesRealPath'].'/data/'.$backup_folder;
	}
	
	if($confirm){
	    $backup_modules =  pnModAPIFunc ('Export', 'admin', 'importPack', array('pack_path' => $backup_folder . '/' . $backup_file,
                                                                                 'modules_selected' => $modules_selected));
	    $pnRender -> assign('backup_modules', $backup_modules);
	    return $pnRender -> fetch('Export_admin_backup_report.htm');	      
	}
	
	// Show confirmation message
	$modules_list = pnModAPIFunc('Export', 'admin', 'getModulesFromPack', array('pack_path'=> pnModGetVar("export", "backup_folder") . '/' . $backup_file));
	$modules_list = $modules_list['Available'];
	$pnRender -> assign('backup_file', $backup_file);
	$pnRender -> assign('modules_list', $modules_list);
	return $pnRender -> fetch('Export_admin_backup_restore.htm');
}


/**
 * Shows a list with the parameters of each module
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return Nothing
 */
function Export_admin_manage(){
    // Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}
	
	$mod = FormUtil::getPassedValue('mod', isset($args['mod']) ? $args['mod'] : null, 'REQUEST');
	$dom = ZLanguage::getModuleDomain('Export');
	$pnRender = pnRender::getInstance('Export',false);
	$no_allowed = ((pnModGetVar('export', 'import_user') != '') && (pnModGetVar('export', 'import_user') != pnUserGetVar('uname'))) ? '1' : '0'; 
	
	//Es busquen tots els possibles moduls a exportar i es passa una llista a la plantilla
	if(!$modules_info = pnModAPIFunc('Export', 'admin', 'modulesInfo')){
		LogUtil::registerError(__('No modules to show', $dom));
	}	    
	$modules_result = array();
	foreach ($modules_info as $module){		
		$tables_list =  DBUtil::metaTables('', '', pnConfigGetVar('prefix').'_'.$module['name'].'%');
		// In some modules the name of the module use capital letters and the name of the tables no
		if (empty($tables_list)) $tables_list =  DBUtil::metaTables('', '', pnConfigGetVar('prefix').'_'.strtolower($module['name']).'%');
		if (!empty($tables_list)) $module['tables_suggest'] = array();
		
		foreach ($tables_list as $table){
			if (!in_array($table, $module['tables'])) $module['tables_suggest'][] = $table;
		}
		$modules_result[] = $module;		
	}
    $pnRender -> assign('prefix', pnConfigGetVar('prefix')); 
    $pnRender -> assign('modules_info', $modules_result);
    $pnRender -> assign('no_allowed', $no_allowed);
    return $pnRender -> fetch('Export_admin_manage_modules.htm');
}


/**
 * Add or delete tables of a module
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return Nothing
 */
function Export_admin_addDelTable(){
    // Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}
	
	$dom = ZLanguage::getModuleDomain('Export');
	$mod = FormUtil::getPassedValue('mod', isset($args['mod']) ? $args['mod'] : null, 'GET');
	$action = FormUtil::getPassedValue('action', isset($args['action']) ? $args['action'] : null, 'GET');
	$table_name = FormUtil::getPassedValue('table_name', isset($args['table_name']) ? $args['table_name'] : null, 'POST');
	$table_array = (is_array($table_name)) ? $table_name : array('0' => $table_name);
	$pnRender = pnRender::getInstance('Export',false);
	
	foreach ($table_array as $table_name){
		if($action == 'add'){
			//Check if table exists
			if (!DBUtil::metaTables('', '', $table_name)){
				LogUtil::registerError(__('The table doesn\'t exist ', $dom));
			}
			else{
				// Table exists.
				$items = array('module_name' => $mod,
								'table_name' => $table_name);
				if (!DBUtil::insertObject($items, 'export_tables')){
					 LogUtil::registerError(__('Error! Add attempt failed.', $dom));
				 }
				 else{
					 LogUtil::registerStatus(__f('Table %1$s added.<a href="#%2$s"> Follow in the last module</a>',array($table_name, $mod) ,$dom));
				 }
			}
		}
		else{
			$where = "WHERE module_name='".$mod."' AND table_name='".$table_name."'";
			 if (!DBUtil::deleteWhere('export_tables', $where)){
				  LogUtil::registerError(__('Error! Deletion attempt failed.', $dom));
			  }else{
				  LogUtil::registerStatus(__f('Table %1$s deleted.<a href="#%2$s"> Follow in the last module</a>',array($table_name, $mod), $dom));
			  }
		}
	}
	return pnRedirect(pnModURL('export', 'admin', 'manage', array('mod' => $mod)));
}

