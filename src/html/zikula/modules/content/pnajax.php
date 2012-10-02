<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: pnajax.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

Loader::requireOnce('modules/content/common.php');

function content_ajax_dragcontent($args)
{
    $dom = ZLanguage::getModuleDomain('content');
    $ok = pnModAPIFunc('content', 'content', 'dragcontent', array('pageId' => FormUtil::getPassedValue('pid', null, 'P'), 'contentId' => FormUtil::getPassedValue('cid', null, 'P'), 'contentAreaIndex' => FormUtil::getPassedValue('cai', null, 'P'),
        'position' => FormUtil::getPassedValue('pos', null, 'P')));
    if (!$ok) {
        return array('ok' => false, 'message' => LogUtil::getErrorMessagesText());
    }

    return array('ok' => true, 'message' => __('OK', $dom));
}

