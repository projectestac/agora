<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: pnversion.php 40 2009-01-09 14:13:23Z herr.vorragend $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
* set modversion info
*/

$modversion['name']                = 'Web_Links';
$modversion['displayname']        = 'Weblinks';
$modversion['description']        = 'Web Links Module';
$modversion['url']                 = 'Web_Links';
$modversion['version']            = '2.0';
$modversion['credits']            = 'pndocs/credits.txt';
$modversion['help']                = 'pndocs/install.txt';
$modversion['changelog']        = 'pndocs/changelog.txt';
$modversion['license']            = 'pndocs/license.txt';
$modversion['official']            = 0;
$modversion['author']            = 'Petzi-Juist';
$modversion['contact']            = 'http://www.petzi-juist.de/';
$modversion['admin']            = 1;
$modversion['user']                = 1;
$modversion['securityschema']    = array('Web_Links::Category' => 'Category name::Category ID',
                                        'Web_Links::Link' => 'Category name:Link name:Link ID');