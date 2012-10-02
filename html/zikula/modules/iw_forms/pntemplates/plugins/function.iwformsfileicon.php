<?php
function smarty_function_iwformsfileicon($params, &$smarty)
{
	$fileName = $params['fileName'];
		
	// Get file extension
	$fileExtension = strtolower(substr(strrchr($fileName,"."),1));

	// get file icon
	$ctypeArray = pnModFunc('iw_main', 'user', 'getMimetype', array('extension' => $fileExtension));
	$fileIcon = $ctypeArray['icon'];
			
	$formsfileicon = $fileIcon;

	return $formsfileicon;
}
