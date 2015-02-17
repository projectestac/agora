<?php

/**
 * XTEC ************ Added upgradeModules- 
 * Upgrade all modules and create necesary hooks for Scribite modules
 * 2015.02.17 @author - Nacho Abejaro
 * 
 * @var $modulesToUpgrade: Array with the name modules to upgrade. You must configure it
 */

include 'lib/bootstrap.php';
include_once __DIR__.'/plugins/Doctrine/Plugin.php';

/** Upgrade All Modules **/

$core->init();

define('_ZINSTALLVER', Zikula_Core::VERSION_NUM);

ModUtil::loadApi('Extensions', 'admin', true);

$results = ModUtil::apiFunc('Extensions', 'admin', 'upgradeall');

if ($results) {	
	foreach ($results as $modname => $result) {
		if ($result) {
			echo '<li class="passed">' . DataUtil::formatForDisplay($modname) . ' ' . __('upgraded') . '</li>' . "\n";
		} else {
			echo '<li class="failed">' . DataUtil::formatForDisplay($modname) . ' ' . __('not upgraded') . '</li>' . "\n";
		}
	}
}else {
	echo "Any module to upgrade <br/>";
}

/** Create all hooks for Scribite **/

// Get Scribite id
PluginUtil::loadPlugin('SystemPlugin_Doctrine_Plugin');
$eventManager = $core->getEventManager();

$dbEvent = new Zikula_Event('doctrine.init_connection', null, array('lazy' => true));

$connection = $eventManager->notify($dbEvent)->getData();

$moduleTable = 'hook_area';
$stmt = $connection->prepare("SELECT id FROM $moduleTable WHERE owner = 'Scribite'");

if (!$stmt->execute()) {
	die(__('FATAL ERROR: Cannot get Scribite Id'));
}

$result = $stmt->fetch(PDO::FETCH_NUM);

$scribiteId = $result[0];
echo "Scribite ID: ".$scribiteId."<br/>";

// Modules to Upgrade
$modulesToUpgrade = array("News", "IWnoteboard", "IWmessages", "IWforms", "Pages", "Content");

foreach ($modulesToUpgrade as $module) {
	$moduleId ='';
	
	$moduleTable = 'hook_area';
	$stmt = $connection->prepare("SELECT id FROM $moduleTable WHERE owner = '$module' AND category = 'ui_hooks'");
	
	if (!$stmt->execute()) {
		die(__('FATAL ERROR: Cannot get id from module $module'));
	}
	
	$result = $stmt->fetch(PDO::FETCH_NUM);
	
	$moduleId = $result[0];
	
	// Check if module exists in hook_binding table
	$tableName = 'hook_binding';
	$stmtModuleExists = $connection->prepare("SELECT id FROM $tableName WHERE sowner = '$module' AND powner = 'Scribite'");

	if (!$stmtModuleExists->execute()) {
		die(__('FATAL ERROR: Cannot get id from hook_binding table - Module: $module '));
	}else {
		$result = $stmtModuleExists->fetch(PDO::FETCH_NUM);
		
		if (!$result[0]) {
			// If not exists insert into table
			$stmtInsert = $connection->prepare("INSERT INTO $tableName (sowner, powner, sareaid, pareaid, category, sortorder) VALUES ('$module', 'Scribite', '$moduleId', '$scribiteId', 'ui_hooks', 999)");
			
			if (!$stmtInsert->execute()) {
				echo ('ERROR___MODULE___'.$module.': Error inserting data into hook_binding table <br/>');
			}else {
				echo ('MODULE___'.$module.': Data inserted into hook_binding table <br/>');
			}
		}else {
			echo ('MODULE___'.$module.': Already in hook_binding table<br/>');
		}	
	}
	
	// Get eventName from hook_subscriber
	$tableName = 'hook_subscriber';
	$stmtGetEventName = $connection->prepare("SELECT eventname FROM $tableName WHERE owner = '$module' AND hooktype = 'form_edit'");
	
	if (!$stmtGetEventName->execute()) {
		die(__('FATAL ERROR: Cannot get eventname from hook_subscriber table.'));
	}else {
		$eventName = $stmtGetEventName->fetch(PDO::FETCH_NUM);
		
		if ($eventName[0]) {
			// Insert event into hook_runtime
			$tableName = 'hook_runtime';
			$stmtInsertRuntime = $connection->prepare("INSERT INTO $tableName (sowner, powner, sareaid, pareaid, eventname, classname, method, serviceid, priority) VALUES
					('$module', 'Scribite', '$moduleId', '$scribiteId', '$eventName[0]', 'Scribite_HookHandlers', 'uiEdit', 'scribite.editor', 10)");
				
			if (!$stmtInsertRuntime->execute()) {
				echo ('ERROR___MODULE___'.$module.': Error inserting event into hook_runtime table <br/>');
			}else {
				echo ('MODULE___'.$module.': Event inserted into hook_runtime table <br/>');
			}
		}		
	}
}

// Extra querys for Scribite
$tableName = 'module_vars';
$stmtUpdateScribite = $connection->prepare("UPDATE $tableName SET value = 's:7:\"TinyMce\"' WHERE modname='Scribite' AND name='DefaultEditor' ");

if (!$stmtUpdateScribite->execute()) {
	die(__('FATAL ERROR: Cannot set TinyMCE Default Editor'));
}else {
	echo "Set TinyMCE Default Scribite Editor...<br/>";
}