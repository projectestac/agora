<?php

/**
 * Zikula Application Framework
 *
 * @package	XTEC advMailer
 * @author	Francesc Bassas i Bullich
 * @license	GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

$modversion['name']           = 'advMailer';
$modversion['displayname']    = __('XTEC Advanced Mailer');
$modversion['description']    = __('Amplia les funcionalitats del mòdul Mailer per poder enviar correu electrònic utilitzant el servei web de la XTEC');
$modversion['url']            = __('advmailer');
$modversion['version']        = '1.0.0';
$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/help.txt';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = false;
$modversion['author']         = 'Francesc Bassas i Bullich';
$modversion['contact']        = '';
$modversion['securityschema'] = array('advMailer::' => '::');

// module dependencies
$modversion['dependencies'] = array(
    array(  'modname'    => 'Mailer',
            'minversion' => '2.0', 'maxversion' => '',
            'status'     => PNMODULE_DEPENDENCY_REQUIRED    )
    );
