<?php
require ("includes/dirOperations.inc.php");
require ("includes/tar.class.php");

/**
 * Gets a list of all active modules and  if thy're allowed to be exported
 * @author:    Felix Casanellas (felix.casanellas@gmail.com)
 * @return:		An array with the modules info
*/
function Export_adminapi_modulesInfo(){
	// Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}

	$return_list = array();
	$allowed_modules = array();
	$all_modules = pnModGetModsTable();

	$i = 0;
	foreach ($all_modules as $module) {
		if ($module['state'] == '3' && $module['type'] != '3'){
			$return_list[$i]['name'] = $module['name'];
			$return_list[$i]['displayname'] = $module['displayname'];
			$module_routes = DBUtil::selectObjectArray('export_routes', "WHERE `module_name` = '".$module['name']."'");
			$module_tables = DBUtil::selectObjectArray('export_tables', "WHERE `module_name` = '".$module['name']."'");
			if (!empty($module_routes)){
				foreach ($module_routes as $key => $mod){
					$return_list[$i]['routes'][$key]['var_id'] = $mod['id'];
					$return_list[$i]['routes'][$key]['variable'] = $mod['variable'];
					$return_list[$i]['routes'][$key]['variable_chk'] = (pnModGetVar($mod['module_name'], $mod['variable'])) ? '1' : '0';
					$return_list[$i]['routes'][$key]['route'] = pnModGetVar($mod['module_name'], $mod['variable']);
					$return_list[$i]['routes'][$key]['root_module'] = $mod['root_module'];
					$return_list[$i]['routes'][$key]['root_variable'] = $mod['root_variable'];
					$return_list[$i]['routes'][$key]['route_chk'] = pnModAPIFunc('Export', 'admin', 'checkRoute', array(
																					'module_name' => $mod['module_name'],
																					'variable' => $mod['variable']));
				}
			}
			if (!empty($module_tables)){
				foreach ($module_tables as $key => $mod){
					$return_list[$i]['tables'][$key] = $mod['table_name'];
				}
			}
			$i++;
		}
	}

	return $return_list;
}


/**
 * Checks if the route defined in a module variable is correct
 * @author:    Felix Casanellas (felix.casanellas@gmail.com)
 * @return:	   the complete route if it's correct, 0 in the other case
*/
function Export_adminapi_checkRoute($args){
	// Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}

	$module_name = FormUtil::getPassedValue('module_name', isset($args['module_name']) ? $args['module_name'] : null, 'REQUEST');
    $variable = FormUtil::getPassedValue('variable', isset($args['variable']) ? $args['variable'] : null, 'REQUEST');

    // Check if another module variable is needed to compose the route
    $module_info = DBUtil::selectObjectArray('export_routes', "WHERE `module_name` = '".$module_name."' AND `variable` = '".$variable."'");
    $root = '';
    if (!empty($module_info)){
		if (($module_info[0]['root_module'] != '') && ($module_info[0]['root_variable'] != '')){
			$root = pnModAPIFunc('Export', 'admin', 'checkRoute', array(
																	'module_name' => $module_info[0]['root_module'],
																	'variable' => $module_info[0]['root_variable']));
		}
	}
	if ($root == '0'){
		 $response = '0';
	}elseif ($folder = pnModGetVar($module_name, $variable)){
		if ($root == ''){
			if (file_exists($folder)){
				if (is_writable($folder)){
					$response = $folder;
				}
				else{
					$response = '-2';
				}
			}else{
				$response = '0';
			}
		}else{
			if (file_exists($root.'/'.$folder)){
				if (is_writable($root.'/'.$folder)){
					$response = $root.'/'.$folder;
				}
				else{
					$response = '-2';
				}
			}else{
				$response = '0';
			}
		}
	}
	return $response;
}


/**
 * Add or modify a variable
 * @author:    Felix Casanellas (felix.casanellas@gmail.com)
 * @return:	   true if succed, error in the other cases
*/
function Export_adminapi_addVariable($args){
	// Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}

	$module = FormUtil::getPassedValue('module_name', isset($args['module_name']) ? $args['module_name'] : null, 'REQUEST');
	$variable = FormUtil::getPassedValue('variable', isset($args['variable']) ? $args['variable'] : null, 'REQUEST');
	$root_module = FormUtil::getPassedValue('root_module', isset($args['root_module']) ? $args['root_module'] : null, 'REQUEST');
	$root_variable = FormUtil::getPassedValue('root_variable', isset($args['root_variable']) ? $args['root_variable'] : null, 'REQUEST');
	$var_id = FormUtil::getPassedValue('var_id', isset($args['var_id']) ? $args['var_id'] : null, 'REQUEST');

	$dom = ZLanguage::getModuleDomain('Export');

	if ($variable == "") return LogUtil::registerError(__('Variable is not defined', $dom));
	if (($root_module!='' && $root_variable=='') || ($root_module=='' && $root_variable!='')) return LogUtil::registerError(__('Additional module/variable is not defined', $dom));

	if ($var_id == ''){
		// Is a new register
		$items = array ('module_name' => $module,
						'variable' => $variable);
		if ($root_module!=''){
			$items['root_module'] = $root_module;
			$items['root_variable'] = $root_variable;
		}
		if (!DBUtil::insertObject($items, 'export_routes')) {
			return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
		}
	}else{
		// Is a modification
		$items = array ('module_name' => $module,
						'variable' => $variable,
						'root_module' => $root_module,
						'root_variable' => $root_variable);
		$where = "WHERE `id` = '".$var_id."'";
		if (!DBUTil::updateObject ($items, 'export_routes', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
	}
	return true;
}


/**
 * Delete a variable
 * @author:    Felix Casanellas (felix.casanellas@gmail.com)
 * @return:	   true if succed, error in the other cases
*/
function Export_adminapi_delVariable($args){
	// Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}

	$module = FormUtil::getPassedValue('module_name', isset($args['module_name']) ? $args['module_name'] : null, 'REQUEST');
	$variable = FormUtil::getPassedValue('variable', isset($args['variable']) ? $args['variable'] : null, 'REQUEST');

	$dom = ZLanguage::getModuleDomain('Export');

	$where = "WHERE `module_name` = '".$module."' AND `variable` = '".$variable."'";
	if(!DBUtil::deleteWhere('export_routes', $where)){
		return LogUtil::registerError (__('Error! Remove attempt failed.', $dom));
	}

	return true;
}


/**
 * Gets a package with all files required to export the selected modules
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return zip file, false if error
 */
function Export_adminapi_getExportPack($args){
    // Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}

    $modules_selected = FormUtil::getPassedValue('modules_selected', isset($args['modules_selected']) ? $args['modules_selected'] : null, 'REQUEST');
    $root_dir = FormUtil::getPassedValue('root_dir', isset($args['root_dir']) ? $args['root_dir'] : null, 'REQUEST');
	if(empty($root_dir)) $root_dir = sys_get_temp_dir();
	$root_dir .= "/export_pack_" . time();
	mkdir($root_dir);

    $max = count($modules_selected);
    for ($i=0; $i<$max; $i++){
        mkdir($root_dir . "/" . $modules_selected[$i]);
        pnModAPIFunc ('Export', 'admin', 'copyFiles', array('selected_module'=>$modules_selected[$i],
                                                          'pack_module_path'=>$root_dir . "/" . $modules_selected[$i]));
        pnModAPIFunc ('Export', 'admin', 'getXMLFile', array('selected_module'=>$modules_selected[$i],
                                                          'pack_module_path'=>$root_dir . "/" . $modules_selected[$i]));
    }
    pnModAPIFunc ('Export', 'admin', 'exportUsers', array('root_dir'=>$root_dir));

    //$zip = new ZipStream($fileName);
    $path = realpath($root_dir);
    $tar = new tar();

	$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
	foreach($objects as $name => $object){
		$tar->addFile($name, 'export_pack/'.substr($name, strlen($path.'/')));
		//$zip->add_file_from_path('export_pack/'.substr($name, strlen($root_dir.'/')), $name);
	}
	//$zip->finish();
	$tar->toTar($path.'.tar',FALSE);
	unset($tar);

    recursive_remove_directory($path);
    //return true;
    return $path.'.tar';
}


/**
 * Copy all module's files to the Pack module path
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return zip file, false if error
 */
function Export_adminapi_copyFiles($args){
    // Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}

    $selected_module = FormUtil::getPassedValue('selected_module', isset($args['selected_module']) ? $args['selected_module'] : null, 'REQUEST');
    $pack_module_path = FormUtil::getPassedValue('pack_module_path', isset($args['pack_module_path']) ? $args['pack_module_path'] : null, 'REQUEST');

	$dst = $pack_module_path . '/files';
	mkdir($dst);
	$variables = DBUtil::selectObjectArray('export_routes', 'WHERE `module_name`="'.$selected_module.'"');

	foreach($variables as $var){
		$route_chk = pnModAPIFunc ('Export', 'admin', 'checkRoute', array('module_name' => $var['module_name'],
																		  'variable' => $var['variable']));
		if($route_chk != '0'){
			$tmp_dst = $dst . "/" .$var['variable'];
			mkdir($tmp_dst);
			recurseCopy($route_chk, $tmp_dst);
		}
	}
}


/**
 * Create an XML file into the module folder. This file is required to export module's tables
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return
 */
function Export_adminapi_getXMLFile($args){
	// Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}

    $selected_module = FormUtil::getPassedValue('selected_module', isset($args['selected_module']) ? $args['selected_module'] : null, 'REQUEST');
    $pack_module_path = FormUtil::getPassedValue('pack_module_path', isset($args['pack_module_path']) ? $args['pack_module_path'] : null, 'REQUEST');

	$dst = $pack_module_path . '/data';
	mkdir($dst);

	$where = "WHERE module_name='".$selected_module."'";
	$tables_list = DBUtil::selectObjectArray('export_tables', $where);

	foreach($tables_list as $pos=>$table){
		pnModDBInfoLoad($selected_module);
	    $prefix_length = strlen(pnConfigGetVar('prefix')) + 1;
	    $table = substr($table['table_name'], $prefix_length);
	    pnModAPIFunc ('Export', 'admin', 'tableToXML', array('table'=>$table,
                                                            'path'=>$dst . "/"));
	}

	// create XML metadata document
	$doc = new DomDocument('1.0');

	$root = $doc->createElement('metadata');
    $root = $doc->appendChild($root);

    $where = "WHERE `pn_name`='" . $selected_module . "'";
    $select = DBUtil::selectObjectArray('modules', $where);
    $module_version = $doc->createElement('moduleVersion');
    $module_version = $root->appendChild($module_version);
    $value = $doc->createTextNode($select['0']['version']);
    $value = $module_version->appendChild($value);

    $zikula_version = $doc->createElement('zikulaVersion');
    $zikula_version = $root->appendChild($zikula_version);
    $value = $doc->createTextNode(PN_VERSION_NUM);
    $value = $zikula_version->appendChild($value);

    $module_vars = $doc->createElement('moduleVars');
    $module_vars = $root->appendChild($module_vars);
    $where = "WHERE `pn_modname`='" . $selected_module ."'";
    $module_vars_list = DBUtil::selectObjectArray('module_vars', $where);
    foreach($module_vars_list as $pos=>$row){
            $var_node = $doc->createElement(utf8_encode($row['name']));
            $var_node = $module_vars->appendChild($var_node);
            $var_value = pnModGetVar($selected_module, $row['name'] );
            $var_value = $doc->createTextNode(utf8_encode($var_value));
            $var_value = $var_node->appendChild($var_value);
    }

    $xml_string = $doc->saveXML();
    $file = fopen($dst . "/metadata.xml", "w");
    fwrite($file, $xml_string);
    fclose($file);
}


/**
 * Take the export pack path and replace actual modules with new versions
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return An array with the correctly imported modules
 */
function Export_adminapi_importPack($args){
// Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) ||!pnUserLoggedIn()) {
           return LogUtil::registerPermissionError();
    }

    $dom = ZLanguage::getModuleDomain('Export');
    $pack_path = FormUtil::getPassedValue('pack_path', isset($args['pack_path']) ? $args['pack_path'] : null, 'REQUEST');
    $modules_selected = FormUtil::getPassedValue('modules_selected', isset($args['modules_selected']) ? $args['modules_selected'] : null, 'REQUEST');

    $root_dir = sys_get_temp_dir() . "/import_pack_" . time();
    mkdir($root_dir);

    $tar = new tar();
    $tar->openTar($pack_path, FALSE);

    if ($tar->extractTar($root_dir)){
        unlink($pack_path);

        //$dir_id = opendir($root_dir);
        //$dir_cont = readdir($dir_id);
        $dir_cont = scandir($root_dir);
        $dir_cont = $dir_cont['2'];

        if($dir_cont != 'export_pack'){
            recursive_remove_directory($root_dir);
            return LogUtil::registerError(__('Corrupt package', $dom));
        }

        $dir_cont_array = scandir($root_dir . '/' . $dir_cont);
        $imported_modules = array();

        // Import all tables of system and modules
        foreach ($dir_cont_array as $dir_cont){
        //while($dir_cont = readdir($dir_id)){
            if($dir_cont == 'System'){
                //Check if the origin zikula version is the same of the actual version
                $objDOM = simplexml_load_file($root_dir . '/export_pack/System/metadata.xml');
                $zikula_version = utf8_decode($objDOM->zikulaVersion);
                if ($zikula_version != PN_VERSION_NUM){
                    recursive_remove_directory($root_dir);
                    return LogUtil::registerError(__f('Zikula version %s is required', $zikula_version, $dom));
                }
                // Import all system tables
                // "Categories" module tables must be loaded
                pnModDBInfoLoad('Categories');

                //$data_dir_id = opendir($root_dir . '/export_pack/System');
                $data_dir_id = scandir($root_dir . '/export_pack/System');

                foreach ($data_dir_id as $data_dir_cont){
                //while($data_dir_cont = readdir($data_dir_id)){
                    if(($data_dir_cont != '.') && ($data_dir_cont != '..' && ($data_dir_cont != 'metadata.xml'))){
                        $table = substr($data_dir_cont, 0, -4);
                        $columns = DBUtil::metaColumnNames($table);
                        DBUtil::truncateTable($table);
                        $XML_file = simplexml_load_file($root_dir . '/export_pack/System/' . $data_dir_cont);
                        foreach($XML_file->row as $row){
                            $fields = '';
                            $values = '';
                            foreach($row->children() as $field){
                                $fieldname = $field->getName();
                                if (in_array($fieldname, $columns)){
                                    $fields .= $fieldname.',';
                                    $field_value = str_replace("'", "''", utf8_decode($field));
                                    $field_value = str_replace("\''", "\'", $field_value);
                                    $values .= ($field == '$$NULL$$') ? "NULL," :"'".$field_value."',";
                                    //$values .= ($field == '$$NULL$$') ? "NULL," :"'".ereg_replace("[^\\](')[^']|^(')", "\\2'", utf8_decode($field))."',";
                                    //$values .= ($field == '$$NULL$$') ? "NULL," :"`".utf8_decode($field)."`,";
                                }
                                //$row_array[$field->getName()] = utf8_decode($field);
                            }
                            $sql = "INSERT INTO ".pnConfigGetVar('prefix').'_'.$table."(".substr($fields, 0, -1).") VALUES(".substr($values, 0, -1).")";
                            DBUtil::executeSQL($sql);
                        }
                        /*
                          foreach($XML_file->row as $row){
                          $row_array = array();
                          foreach($row->children() as $field){
                          $row_array[$field->getName()] = utf8_decode($field);
                          }
                          DBUtil::insertObject($row_array, $table );
                          } */
                    }
                }
                continue;
            }

            //Check if folder corresponds to an installed module and the module is selected
            if(pnModAvailable($dir_cont)&&in_array($dir_cont, $modules_selected)){
                pnModDBInfoLoad($dir_cont);
                
                // Check if the exported module version is the same of the installed module
                $objDOM = simplexml_load_file($root_dir . '/export_pack/' . $dir_cont . '/data/metadata.xml');
                $module_version = utf8_decode($objDOM->moduleVersion);
                $where = "WHERE `pn_name`='" . $dir_cont . "'";
                $select = DBUtil::selectObjectArray('modules', $where);

                if($select['0']['version'] != $module_version){
                    recursive_remove_directory($root_dir);
                    return LogUtil::registerError(__f('The module %1$s requires the version %2$s', array($dir_cont, $module_version), $dom));
                }

                // Delete old files and copy the imported module files to the server
                // Get varibles from folder names
                $routes = array();
                $i = 0;

                //$files_dir_id = opendir($root_dir . '/export_pack/' . $dir_cont . '/files');
                $files_dir_id = scandir($root_dir . '/export_pack/' . $dir_cont . '/files');

                foreach ($files_dir_id as $files_dir_cont){
                    //while($files_dir_cont = readdir($files_dir_id)){
                    if(($files_dir_cont != '.') && ($files_dir_cont != '..')){
                        $route = pnModAPIFunc('Export', 'admin', 'checkRoute', array(
                                                                                    'module_name' => $dir_cont,
                                                                                    'variable' => $files_dir_cont));
                        if (substr($route, -1) == '/') $route = substr($route, 0, -1);
                        if ((!empty($route)) && ($route != '0')){
                            $routes[$i]['src'] = $root_dir . '/export_pack/' . $dir_cont . '/files/' . $files_dir_cont;
                            $routes[$i]['dst'] = $route;
                            $i++;
                        }
                    }
                }

                // Delete old files
                foreach ($routes as $route){
                    if (file_exists($route['dst'])){
                        if(!recursive_remove_directory($route['dst'])){
                            if (!is_writable($route['dst'])){
                                LogUtil::registerError(__f('It\'s not possible to remove <i>%s</i> directory because it\'s not writable', $route['dst'], $dom));
                            }else{
                                LogUtil::registerError(__f('It\'s not possible to remove <i>%s</i> directory', $route['dst'], $dom));
                            }
                        }
                    }
                }

                // Copy new files
                foreach ($routes as $route){
                    if (!file_exists($route['dst'])) mkdir($route['dst']);
                    recurseCopy($route['src'], $route['dst']);
                }

                // Copy the module variables from metadata.xml file
                // Check if the variable contains a route to a directory. Then we don't overwrites it
                $where = 'WHERE `module_name` = "'.$dir_cont.'"';
                $def_vars = DBUtil::selectObjectArray('export_routes', $where);
                $vars = array();
                foreach ($def_vars as $var){
                    $vars[] = $var['variable'];
                    if(($var['root_module']==$var['module_name'])&&(!in_array($var['root_variable'], $vars))) $vars[] = $var['root_variable'];
                }
                foreach($objDOM->moduleVars->children() as $var){
                    $var_name = $var->getName();
                    $var_value = utf8_decode($var);
                    if (!in_array($var_name, $vars)) pnModSetVar($dir_cont, $var_name, $var_value);
                }

                // Delete old database values and import new values

                //$data_dir_id = opendir($root_dir . '/export_pack/' . $dir_cont . '/data');
                $data_dir_id = scandir($root_dir . '/export_pack/' . $dir_cont . '/data');
                // Load module tables
                pnModDBInfoLoad($dir_cont);
                $all_tables = pnDBGetTables();

                foreach($data_dir_id as $data_dir_cont){
                //while($data_dir_cont = readdir($data_dir_id)){
                    if(($data_dir_cont != '.') && ($data_dir_cont != '..' && ($data_dir_cont != 'metadata.xml'))){
                        $table = substr($data_dir_cont, 0, -4);

                        if (array_key_exists($table, $all_tables)){
                            $columns = DBUtil::metaColumnNames($table);
                            DBUtil::truncateTable($table);
                            $XML_file = simplexml_load_file($root_dir . '/export_pack/' . $dir_cont . '/data/' . $data_dir_cont);
                            foreach($XML_file->row as $row){
                                //$row_array = array();
                                $fields = '';
                                $values = '';
                                foreach($row->children() as $field){
                                    if (in_array($field->getName(), $columns)){
                                        $fields .= $field->getName().',';
                                        $field_value = str_replace("'", "''", utf8_decode($field));
                                        $field_value = str_replace("\''", "\'", $field_value);
                                        $values .= ($field == '$$NULL$$') ? "NULL," :"'".$field_value."',";
                                        //$values .= ($field == '$$NULL$$') ? "NULL," :"`".utf8_decode($field)."`,";
                                        //$row_array[$field->getName()] = utf8_decode($field);
                                    }
                                }
                                $sql = "INSERT INTO ".pnConfigGetVar('prefix').'_'.$table."(".substr($fields, 0, -1).") VALUES(".substr($values, 0, -1).")";
                                //DBUtil::insertObject($row_array, $table);
                                DBUtil::executeSQL($sql);
                            }
                        }
                    }
                }

                $imported_modules[] = $dir_cont;
            }
        }

        //recursive_remove_directory($root_dir);
        return $imported_modules;
    }else{
        return LogUtil::registerError(__('It\'s not possible to open the package.', $dom));
    }
}



/**
 * Export User and Groups tabes
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return nothing
 */
function Export_adminapi_exportUsers($args){
    // Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}

    $root_dir = FormUtil::getPassedValue('root_dir', isset($args['root_dir']) ? $args['root_dir'] : null, 'REQUEST');

	mkdir($root_dir . '/System');

	$tables_array = array('Users$$users', 'Users$$users_temp', 'Group$$groups', 'Group$$group_membership', 'Permissions$$group_perms', 'Categories$$categories_category', 'Categories$$categories_mapmeta', 'Categories$$categories_mapobj', 'Categories$$categories_registry');

	// Create an XML file for each table of the array
	foreach($tables_array as $index=>$table){
		$module_array = explode('$$', $table);
		$module_name = $module_array['0'];
		$table_name = $module_array['1'];
		pnModDBInfoLoad($module_name);
	    pnModAPIFunc ('Export', 'admin', 'tableToXML', array('table'=>$table_name,
                                                            'path'=>$root_dir . '/System/'));
	}

	// Ceate an XML metadata file
	$doc = new DomDocument('1.0');
	$root = $doc->createElement('metadata');
    $root = $doc->appendChild($root);

    $zikula_version = $doc->createElement('zikulaVersion');
    $zikula_version = $root->appendChild($zikula_version);
    $value = $doc->createTextNode(PN_VERSION_NUM);
    $value = $zikula_version->appendChild($value);

    $xml_string = $doc->saveXML();
    $file = fopen($root_dir . '/System/metadata.xml', "w");
    fwrite($file, $xml_string);
    fclose($file);
}


/**
 * Generate an XML file with the table data and save it in the path
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return nothing
 */
function Export_adminapi_tableToXML($args){
    // Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}
    $path = FormUtil::getPassedValue('path', isset($args['path']) ? $args['path'] : null, 'REQUEST');
    $table = FormUtil::getPassedValue('table', isset($args['table']) ? $args['table'] : null, 'REQUEST');

    //$table_content = DBUtil::selectObjectArray($table);
	//$table_rows = DBUtil::selectObjectArray($table);

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	$table_rows =& $dbconn->Execute('SELECT * FROM '.pnConfigGetVar('prefix').'_'.$table);
	$columns = DBUtil::metaColumnNames($table);
	$num_columns = array();
	foreach ($columns as $column) $num_columns[] = $column;
	$table_content = array();
	$i = 0;
	$j = 0;
	foreach ($table_rows as $row) {
		foreach ($row as $key => $field){
				$table_content[$i][$num_columns[$j]] = (is_null($field)) ? '$$NULL$$' : $field;
				$j++;
		}
		$j = 0;
		$i++;
	}
	/*
	$table_column = pnDBGetTables();
	$table_column = $table_column[$table.'_column'];
	foreach ($table_rows as $i => $row){
		foreach ($columns as $column){
			$key = array_keys($table_column,$column);
			$key = $key[count($key)-1];
			if($key != '')$table_content[$i][$key] = $row[$key];
		}
	}
	*/

    // create a new XML document
    $doc = new DomDocument('1.0');
    // create root node
    $root = $doc->createElement($table);
    $root = $doc->appendChild($root);

    // process one row at a time
    foreach($table_content as $row){
        // add node for each row
        $occ = $doc->createElement('row');
        $occ = $root->appendChild($occ);
        // add a child node for each field
        foreach ($row as $fieldname => $fieldvalue) {
            $child = $doc->createElement(utf8_encode($fieldname));
            $child = $occ->appendChild($child);
            $value = $doc->createTextNode(utf8_encode($fieldvalue));
            $value = $child->appendChild($value);
        }
    }

    $xml_string = $doc->saveXML();
    $file = fopen($path . $table . '.xml', "w");
    fwrite($file, $xml_string);
    fclose($file);
}


/**
 * Generate an array with all modules of the package in the path
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return array with all modules
 */
function Export_adminapi_getModulesFromPack($args){
    // Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}

    $pack_path = FormUtil::getPassedValue('pack_path', isset($args['pack_path']) ? $args['pack_path'] : null, 'REQUEST');
	$list = array();
	$versions_list = array();
	$zk_version = '';

	$tar = new tar();
	if(!$tar->openTar($pack_path,FALSE)) return LogUtil::registerError(__('Could not open package', $dom));

	if($tar->numFiles > 0) {
		foreach($tar->files as $id => $information) {
			$content['name'] = $information[name];
			$list[] = $content;
			// Get the version of each module
			if(substr($information[name], strrpos($information[name], '/')) == '/metadata.xml'){
				if(substr($information[name], strpos($information[name], '/')) != '/System/metadata.xml'){
					$version = explode('moduleVersion', $information[file]);
					$version = substr($version['1'], 1, strlen($version['1'])-3);
					$versions_list[substr($information[name], 12, strlen(substr($information[name], 12, -18)))] = $version;
				}
				else{
					$zk_version = explode('zikulaVersion', $information[file]);
					$zk_version = substr($zk_version['1'], 1, strlen($zk_version['1'])-3);
				}
			}
		}
	}

	/*$za = new ZipArchive();
	$za->open($pack_path);

	for ($i=0; $i<$za->numFiles;$i++) {
		$list[] = $za->statIndex($i);
	}
	$za->close();*/

	//$zipfile = new PclZip($pack_path);
	//$list = $zip->listContent();
	$last_module = '';
	$modules_list = array();
	$module_name = array();
	$i = 1;
	$j = 1;

	foreach($list as $key=>$folder){
	    $filename = $folder['name'];
	    $filename = explode('/', $filename);
	    if ((!empty($filename['1'])) && ($filename['1'] != 'System')){
			if (in_array($filename['1'], $module_name)){
				if (($filename['2'] == 'files') && (!empty($filename['3']))){
					// Add variables of the module
					if (!in_array($filename['3'], $modules_list['Available'][$filename['1']]['variables'])){
						$modules_list['Available'][$filename['1']]['variables'][] = $filename['3'];
						$modules_list['Available'][$filename['1']]['var_chk'][$filename['3']] = pnModAPIFunc ('Export', 'admin', 'checkRoute', array('module_name' => $filename['1'],
																																					'variable' => $filename['3']));
						// Check if the variable is defined in th export_routes table, else define -1 as var_chk value
						$var_defined = DBUtil::selectObjectArray('export_routes', 'WHERE `module_name`="'.$filename['1'].'" AND `variable`="'.$filename['3'].'"');
						if (empty($var_defined)){
							$modules_list['Available'][$filename['1']]['var_chk'][$filename['3']] = '-1';
						}
					}
				}
			}elseif (in_array($filename['1'], $modules_list['Unavailable'])){
			}else{
				// Check if the module is available
				if(pnModAvailable($filename['1'])){
	                $where = "WHERE `pn_name`='" . $filename['1'] . "'";
                    $select = DBUtil::selectObjectArray('modules', $where);
                    $displayname = $select['0']['displayname'];
	                $modules_list['Available'][$filename['1']]['displayname'] = $displayname;
	                $modules_list['Available'][$filename['1']]['req_version'] = $versions_list[$filename['1']];
	                $modules_list['Available'][$filename['1']]['local_version'] = $select['0']['version'];
	                if (!in_array($filename['1'], $module_name)) $module_name[] = $filename['1'];
	            }else{
					$modules_list['Unavailable'][] = $filename['1'];
	            }
			}
		}
	}
	$modules_list['ZkVersion'] = $zk_version;
	return $modules_list;
}


/**
 * Generate a backup of the selected modules and store it in the server
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return array with all modules
 */
function Export_adminapi_backupModules($args){
    // Security check
    if (!SecurityUtil::checkPermission( 'Export::', '::', ACCESS_ADMIN) || !pnUserLoggedIn()) {
		return LogUtil::registerPermissionError();
	}

    $modules_selected = FormUtil::getPassedValue('modules_selected', isset($args['modules_selected']) ? $args['modules_selected'] : null, 'REQUEST');
	$backup_folder = pnModGetVar("export", "backup_folder");
	if (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1){
		$backup_folder = $GLOBALS['PNConfig']['Multisites']['filesRealPath'].'/data/'.$backup_folder;
	}

	if($backup_file = pnModAPIFunc ('Export', 'admin', 'getExportPack', array('modules_selected'=>$modules_selected,
                                                                   		  'root_dir' => $backup_folder))){
	    return true;
    }else{
        return LogUtil::registerError(__('The backup package cannot be generated', $dom));
    }
}


