<?php
/**
 * Formicula - the contact mailer for Zikula
 * -----------------------------------------
 *
 * @copyright  (c) Formicula Development Team
 * @link       http://code.zikula.org/formicula
 * @version    $Id: pnversion.php 159 2009-11-10 15:47:32Z drak $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Frank Schummertz <frank@zikula.org>
 * @package    Third_Party_Components
 * @subpackage formicula
 */

$dom = ZLanguage::getModuleDomain('formicula');

$modversion['name'] = 'formicula';
$modversion['version'] = '2.2';
$modversion['description'] = __('Formicula forms module', $dom);
$modversion['displayname'] = __('Formicula', $dom);
//! module url shoudl be in lowercase without spaces different to displayname
$modversion['url'] = __('formicula', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/eng/manual.htm';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Frank Schummertz';
$modversion['contact'] = 'frank@zikula.org';
$modversion['admin'] = 1;
$modversion['user'] = 1;
$modversion['securityschema'] = array('formicula::' => 'form_id:contact_id:' );
