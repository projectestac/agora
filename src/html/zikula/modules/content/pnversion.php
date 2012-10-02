<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: pnversion.php 368 2010-01-05 11:07:47Z herr.vorragend $
 * @license See license.txt
 */

// The following information is used by the Modules module
// for display and upgrade purposes
$dom = ZLanguage::getModuleDomain('content');
$modversion['name']           = 'content';
// the version string must not exceed 10 characters!
$modversion['version']        = '3.1.0';
$modversion['displayname']    = __('Content editing', $dom);
$modversion['description']    = __('Content is a page editing module. With it you can insert and edit various content items, such as HTML texts, videos, Google maps and much more.', $dom);
//! module url should be different to displayname and in lowercase without space
$modversion['url']            = __('content', $dom);

// The following in formation is used by the credits module
// to display the correct credits
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['credits']        = 'pndocs/readme.txt';
$modversion['help']           = 'pndocs/readme.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 0;
$modversion['author']         = 'Jorn Wildt';
$modversion['contact']        = 'http://www.elfisk.dk/';
$modversion['admin']          = 1;

// This one adds the info to the DB, so that users can click on the
// headings in the permission module
$modversion['securityschema'] = array('content::' => '::',
                                      'content:plugins:layout' => 'Layout name::',
                                      'content:plugins:content' => 'content type name::',
                                      'content:page:' => '::');
