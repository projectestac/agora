<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: ephem.php 355 2009-11-11 13:10:50Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Ephemerids
 */
class Ephemerids_Block_Ephem extends Zikula_Controller_AbstractBlock {

    /**
     * initialise block
     */
    function init() {
        // Security
        SecurityUtil::registerPermissionSchema('Ephemeridsblock::', 'Block title::');
    }

    /**
     * get information on block
     */
    public function info() {
        // Values
        return array('module' => 'Ephemerids',
            'text_type' => $this->__('Ephemerids'),
            'text_type_long' => $this->__('Ephemerid'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    public function display($blockinfo) {
        // Security check
        if (!SecurityUtil::checkPermission('Ephemeridsblock::', "$blockinfo[title]::", ACCESS_READ)) {
            return;
        }

        if (!ModUtil::available('Ephemerids')) {
            return;
        }

        // Create output object
        $view = Zikula_View::getInstance('Ephemerids');

        $view->assign('items', ModUtil::apiFunc('Ephemerids', 'user', 'gettoday'));

        // Populate block info and pass to theme
        $blockinfo['content'] = $view->fetch('ephemerids_block_ephem.tpl');

        return BlockUtil::themeBlock($blockinfo);
    }

}