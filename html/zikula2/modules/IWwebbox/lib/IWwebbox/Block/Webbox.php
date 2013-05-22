<?php
// TODO: Bloc options managment
class IWwebbox_Block_Webbox extends Zikula_Controller_AbstractBlock {

    /**
     * initialise block
     *
     * @author		Albert Pérez Monfort (intraweb)
     */
    public function init() {
        // Security
        SecurityUtil::registerPermissionSchema('IWwebbox:webboxBlock:', 'Block title::');
    }

    /**
     * get information on block
     *
     * @author       Albert P�rez Monfort (intraweb@xtec.cat)
     * @return       array       The block information
     */
    public function info() {
        // Values
        return array('text_type' => 'Webbox',
            'module' => 'IWwebbox',
            'text_type_long' => $this->__('Web sites container'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    /**
     * update block settings
     *
     * @author       Albert P�rez Monfort (intraweb@xtec.cat)
     * @param        array       $blockinfo     a blockinfo structure
     * @return       $blockinfo  the modified blockinfo structure
     */
    public function update($row) {
        $vars['weburlvalue'] = FormUtil::getPassedValue('weburlvalue', -1, 'POST');
        $vars['widthvalue'] = FormUtil::getPassedValue('widthvalue', -1, 'POST');
        $vars['heightvalue'] = FormUtil::getPassedValue('heightvalue', -1, 'POST');
        $vars['titlevalue'] = FormUtil::getPassedValue('titlevalue', -1, 'POST');
        $vars['notunregvalue'] = FormUtil::getPassedValue('notunregvalue', -1, 'POST');
        $vars['scrollvalue'] = FormUtil::getPassedValue('scrollvalue', -1, 'POST');

        $row['content'] = BlockUtil::varsToContent($vars);
        return $row;
    }

    /*
      function feeds_displayfeedblock_update($blockinfo)
      {
      $vars['feedid'] = FormUtil::getPassedValue('feedid', 1, 'POST');
      $vars['numitems'] = FormUtil::getPassedValue('numitems', 0, 'POST');
      $vars['displayimage'] = FormUtil::getPassedValue('displayimage', -1, 'POST');

      $blockinfo['content'] = BlockUtil::varsToContent($vars);

      return $blockinfo;
      }
     */

    /**
     * modify block settings
     *
     * @author       Albert P�rez Monfort (intraweb@xtec.cat)
     * @param        array       $blockinfo     a blockinfo structure
     * @return       output		the block form
     */
    public function modify($row) {
        // Get current content
        $vars = BlockUtil::varsFromContent($row['content']);

        if (!empty($vars['weburlvalue'])) {
            $IWwebbox['weburlvalue'] = $vars['weburlvalue'];
            $IWwebbox['widthvalue'] = $vars['widthvalue'];
            $IWwebbox['heightvalue'] = $vars['heightvalue'];
            $IWwebbox['titlevalue'] = $vars['titlevalue'];
            $IWwebbox['scrollvalue'] = $vars['scrollvalue'];
            $IWwebbox['notunregvalue'] = $vars['notunregvalue'];
        } else {
            $IWwebbox['weburlvalue'] = 'http://';
            $IWwebbox['widthvalue'] = '100';
            $IWwebbox['heightvalue'] = '600';
            $IWwebbox['titlevalue'] = '';
            $IWwebbox['scrollvalue'] = '1';
            $IWwebbox['notunregvalue'] = '';
        }

        $view = Zikula_View::getInstance('IWwebbox');

        $view->assign($IWwebbox);

        // get the block output from the template
        $blockinfo['content'] = $view->fetch('IWwebbox_block_edit.htm');

        // return the rendered block
        return BlockUtil::themeBlock($blockinfo);
    }

    /**
     * display block
     *
     * @author       Albert P�rez Monfort (intraweb@xtec.cat)
     * @param        array       $blockinfo     a blockinfo structure
     * @return       output      the rendered bock
     */
    public function display($row) {
        // Get current content
        $vars = BlockUtil::varsFromContent($row['content']);
        
        // Security check
        if (!SecurityUtil::checkPermission('IWwebbox:webboxBlock:', $row['title'] . "::", ACCESS_READ)) {
            return false;
        }
        
        // Add 'http://' if any protocol is specified in the URL
        if (!parse_url($vars['weburlvalue'], PHP_URL_SCHEME)) {
            $vars['weburlvalue'] = 'http://' . $vars['weburlvalue'];
        }

        if ($vars['titlevalue'] == 1 && $vars['widthvalue'] > 98)
            $vars['widthvalue'] = 98;

        $vars['scrolls'] = ($vars['scrollvalue'] == 1) ? 'auto' : 'no';

        if (($vars['notunregvalue'] == 1 && !UserUtil::isLoggedIn()) || $vars['notunregvalue'] == '-1') {
            if ($vars['widthvalue'] != 0) {

                if ($vars['titlevalue'] == '1')
                    $row['title'] = '';

                // Create output object
                $view = Zikula_View::getInstance('IWwebbox', false);

                // assign the block vars
                $view->assign($vars);

                if (($vars['notunregvalue'] == 1 && !UserUtil::isLoggedIn()) || $vars['notunregvalue'] == '-1') {
                    // Populate block info and pass to theme
                    $row['content'] = $view->fetch('IWwebbox_block_display.htm');
                    return BlockUtil::themeBlock($row);
                }
            }
        }
        return false;
    }

}