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
$modulesToUpgrade = array("News", "IWnoteboard", "IWmessages", "IWforms", "Pages", "Content", "IWforums", "AdminMessages", "Blocks");

foreach ($modulesToUpgrade as $module) {
	$moduleId ='';
	$moduleIdContent = '';

	$moduleTable = 'hook_area';
	$stmt = $connection->prepare("SELECT id FROM $moduleTable WHERE owner = '$module' AND category = 'ui_hooks'");

	if (!$stmt->execute()) {
		die(__('FATAL ERROR: Cannot get id from module $module'));
	}

	$result = $stmt->fetchAll(PDO::FETCH_NUM);

	$moduleId = $result[0][0];

	if ($result[1][0]) {
		// Special case for Content Module
		$moduleIdContent = $result[1][0];
	}

	// Check if module exists in hook_binding table
	$tableName = 'hook_binding';
	$stmtModuleExists = $connection->prepare("SELECT id FROM $tableName WHERE sowner = '$module' AND powner = 'Scribite'");

	if (!$stmtModuleExists->execute()) {
		die(__('FATAL ERROR: Cannot get id from hook_binding table - Module: $module '));
	}else {
		$resultExist = $stmtModuleExists->fetch(PDO::FETCH_NUM);

		if (!$resultExist) {
			// If not exists insert into table
			$stmtInsert = $connection->prepare("INSERT INTO $tableName (sowner, powner, sareaid, pareaid, category, sortorder) VALUES ('$module', 'Scribite', '$moduleId', '$scribiteId', 'ui_hooks', 999)");

			if (!$stmtInsert->execute()) {
				echo ('ERROR___MODULE___'.$module.': Error inserting data into hook_binding table <br/>');
			}else {
				echo ('MODULE___'.$module.': Data inserted into hook_binding table <br/>');
			}
		}else {
			echo ('MODULE___'.$module.': Already exists in hook_binding table<br/>');
		}

		// Special case for Content Module
		if ($moduleIdContent && !$resultExist) {
			$stmtInsertContent = $connection->prepare("INSERT INTO $tableName (sowner, powner, sareaid, pareaid, category, sortorder) VALUES ('$module', 'Scribite', '$moduleIdContent', '$scribiteId', 'ui_hooks', 999)");

			if (!$stmtInsertContent->execute()) {
				echo ('ERROR___MODULE___'.$module.': Error inserting data into hook_binding table <br/>');
			}else {
				echo ('MODULE___'.$module.': Data inserted into hook_binding table<br/>');
			}
		}elseif ($moduleIdContent && $resultExist) {
			echo ('MODULE___'.$module.': Already exists in hook_binding table<br/>');
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

			// Check if hook_runtime already exists
			$tableName = 'hook_runtime';

			$stmtCheckRuntime = $connection->prepare("SELECT id FROM $tableName WHERE sareaid=$moduleId AND pareaid=$scribiteId AND eventname='$eventName[0]'");

			if (!$stmtCheckRuntime->execute()) {
				die(__('FATAL ERROR: Cannot get id from hook_runtime table - Module: $module '));
			}else {
				$runtimeExist = $stmtCheckRuntime->fetch(PDO::FETCH_NUM);

				if (!$runtimeExist) {
					// Insert event into hook_runtime

					$stmtInsertRuntime = $connection->prepare("INSERT INTO $tableName (sowner, powner, sareaid, pareaid, eventname, classname, method, serviceid, priority) VALUES
							('$module', 'Scribite', '$moduleId', '$scribiteId', '$eventName[0]', 'Scribite_HookHandlers', 'uiEdit', 'scribite.editor', 10)");

					if (!$stmtInsertRuntime->execute()) {
						echo ('ERROR___MODULE___'.$module.': Error inserting event into hook_runtime table <br/>');
					}else {
						echo ('MODULE___'.$module.': Event inserted into hook_runtime table <br/>');
					}
				}else {
					echo ('MODULE___'.$module.': Already exists in hook_runtime table<br/>');
				}
			}
		}
	}
	echo "<br/>";
}

// Extra querys for Scribite
$tableName = 'module_vars';
$stmtUpdateScribite = $connection->prepare("UPDATE $tableName SET value = 's:7:\"TinyMce\"' WHERE modname='Scribite' AND name='DefaultEditor' ");

if (!$stmtUpdateScribite->execute()) {
	die(__('FATAL ERROR: Cannot set TinyMCE Default Editor'));
}else {
	echo "TinyMCE has been established as default Scribite Editor<br/>";
}

$tableName = 'module_vars';
$stmtUpdatePlugin = $connection->prepare("
		UPDATE $tableName
		SET value = 'a:10:{i:0;s:4:\"link\";i:1;s:13:\"searchreplace\";i:2;s:7:\"preview\";i:3;s:14:\"insertdatetime\";i:4;s:9:\"wordcount\";i:5;s:10:\"autoresize\";i:6;s:10:\"fullscreen\";i:7;s:5:\"print\";i:9;s:4:\"code\";i:10;s:5:\"files\";}'
		WHERE modname='moduleplugin.scribite.tinymce' AND name = 'activeplugins'
		");

if (!$stmtUpdatePlugin->execute()) {
	die(__('FATAL ERROR: Cannot update moduleplugin.scribite.tinymce'));
}else {
	echo "moduleplugin.scribite.tinymce Updated<br/>";
}

$stmtUpdateLanguage = $connection->prepare("UPDATE $tableName SET value = 's:2:\"ca\";' WHERE modname='moduleplugin.scribite.tinymce' AND name='language'");

if (!$stmtUpdatePlugin->execute()) {
	die(__('FATAL ERROR: Cannot update language on moduleplugin.scribite.tinymce'));
}else {
	echo "Updated language on moduleplugin.scribite.tinymce<br/>";
}