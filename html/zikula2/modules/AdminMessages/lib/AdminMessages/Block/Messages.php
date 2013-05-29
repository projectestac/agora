<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: messages.php 27048 2009-10-21 14:55:13Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Admin_Messages
 */
class AdminMessages_Block_Messages extends Zikula_Controller_AbstractBlock {

    /**
     * initialise block
     * @author Jim McDonald <jim@mcdee.net>
     * @link http://www.mcdee.net
     */
    public function init() {
        // Security
        SecurityUtil::registerPermissionSchema('AdminMessages:messagesblock:', 'block title::');
    }

    /**
     * get information on block
     * @author Jim McDonald <jim@mcdee.net>
     * @link http://www.mcdee.net
     * @return array blockinfo array
     */
    public function info() {
        // Values
        return array('module' => 'AdminMessages',
            'text_type' => $this->__('Messages'),
            'text_type_long' => $this->__('Display administrator messages'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    /**
     * display block
     * @author Jim McDonald <jim@mcdee.net>
     * @link http://www.mcdee.net
     * @param 'row' blockinfo array
     * @return string HTML output string
     */
    public function display($row) {
        // set default values
        // The default is to remove the title so that a specific block template override for the admin
        // messages block isn't required (one that doesn't display the standard block title0 since this
        // module provides it's own title to items.
        if (!empty($row['title'])) {
            $row['title'] = '';
        }

        //security check
        if (!SecurityUtil::checkPermission('AdminMessages:messagesblock:', "$row[title]::", ACCESS_READ)) {
            return;
        }

        // Check the module is available
        if (!ModUtil::available('AdminMessages')) {
            return;
        }

        // Create output object
        $view = Zikula_View::getInstance('AdminMessages');

        // Define the cacheid
        $view->cache_id = UserUtil::getVar('uid');

        // check out if the contents are cached.
        if ($view->is_cached('admin_messages_block_messages.htm')) {
            // Populate block info and pass to theme
            $row['content'] = $view->fetch('admin_messages_block_messages.tpl');
            return BlockUtil::themeBlock($row);
        }

        // call the api function
        $messages = ModUtil::apiFunc('AdminMessages', 'user', 'getactive');

        if (!$messages)
            $messages = array();

        $messagestodisplay = array();
        foreach ($messages as $message) {
            $show = 0;
            // Since the API has already done the permissions check
            // there's no need to duplicate the checks here.
            // We'll still the support admin panel 'permission' settings
            // as these are still useful as a quick solution
            switch ($message['view']) {
                case 1:
                    // Message for everyone
                    $show = 1;
                    break;
                case 2:
                    // Message for users
                    if (UserUtil::isLoggedIn()) {
                        $show = 1;
                    }
                    break;
                case 3:
                    // Messages for non-users
                    if (!UserUtil::isLoggedIn()) {
                        $show = 1;
                    }
                    break;
                case 4:
                    // Messages for administrators of any description
                    if (SecurityUtil::checkPermission('::', '::', ACCESS_ADMIN)) {
                        $show = 1;
                    }
                    break;
            }
            if ($show) {
                $messagestodisplay[] = $message;
            }
        }

        // check for an empty result set
        if (empty($messagestodisplay))
            return;

        $view->assign('messages', $messagestodisplay);

        // Populate block info and pass to theme
        $row['content'] = $view->fetch('admin_messages_block_messages.tpl');

        return BlockUtil::themeBlock($row);
    }

}