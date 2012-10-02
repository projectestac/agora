<?php
/**
 * Get a file from a server folder even it is out of the public html directory
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	name of the file that have to be gotten
 * @return:	The file information
*/
function iw_vhmenu_user_getFile($args)
{
	//$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	// File name with the path
	$fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : 0, 'GET');
//die($fileName);

	// Security check
/*	if (!SecurityUtil::checkPermission('iw_vhmenu::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}*/
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	return pnModFunc('iw_main', 'user', 'getFile', array('fileName' => $fileName,
								'sv' => $sv));

}
