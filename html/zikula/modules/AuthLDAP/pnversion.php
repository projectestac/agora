<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 53 2009-11-08 14:38:41Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage AuthLDAP
*/

$dom = ZLanguage::getModuleDomain('AuthLDAP');
$modversion['name']           = 'AuthLDAP';
$modversion['url'] = __('authldap', $dom);
$modversion['displayname']    = __('AuthLDAP', $dom);
$modversion['description']    = __('LDAP authentication', $dom);
$modversion['version']        = '1.0';
$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/help.txt';
$modversion['install']        = 'pndocs/install.html';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 1;
$modversion['author']         = 'Mike Goldfinger';
$modversion['contact']        = 'MikeGoldfinger@linuxmail.org';
$modversion['dependencies']    = array(array('modname'    => 'AuthPN',
                                             'minversion' => '1.0',
                                             'maxversion' => '',
                                             'status'     => PNMODULE_DEPENDENCY_REQUIRED));
