<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: pnversion.php 684 2010-05-12 07:28:04Z herr.vorragend $
 * @license See license.txt
 */

$dom = ZLanguage::getModuleDomain('EZComments');

// Information for the modules admin
$modversion['name']           = 'EZComments';
$modversion['displayname']    = __('Comments', $dom);
$modversion['description']    = __('Attach comments to every kind of content using hooks', $dom);
//! module url in lowercase and different to displayname
$modversion['url']            = __('comments', $dom);
$modversion['version']        = '2.0.0';

// I suspect these are not respected as the should
$modversion['admin']          = 1;
$modversion['user']           = 1;

// Information for the credits module
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/install.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 0;
$modversion['author']         = 'The EZComments Development Team';
$modversion['contact']        = 'http://code.zikula.org/ezcomments/';

// This one adds the info to the DB, so that users can click on the
// headings in the permission module
$modversion['securityschema'] = array(
                                      'EZComments::'          => 'Module:Item ID:Comment ID',
                                      'EZComments::trackback' => 'Module:Item ID:',
                                      'EZComments::pingback'  => 'Module:Item ID:'
                                     );

// recommended and required modules
$modversion['dependencies'] = array(
                                    array('modname'    => 'akismet',
                                          'minversion' => '1.0', 'maxversion' => '',
                                          'status'     => PNMODULE_DEPENDENCY_RECOMMENDED),
                                    array('modname'    => 'ContactList',
                                          'minversion' => '1.0', 'maxversion' => '',
                                          'status'     => PNMODULE_DEPENDENCY_RECOMMENDED),
                                    array('modname'    => 'MyProfile',
                                          'minversion' => '1.2', 'maxversion' => '',
                                          'status'     => PNMODULE_DEPENDENCY_RECOMMENDED),
                                    array('modname'    => 'InterCom',
                                          'minversion' => '2.1', 'maxversion' => '',
                                          'status'     => PNMODULE_DEPENDENCY_RECOMMENDED)
                                   );
