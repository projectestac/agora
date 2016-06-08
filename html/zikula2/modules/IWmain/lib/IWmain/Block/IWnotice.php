<?php

class IWmain_Block_IWnotice extends Zikula_Controller_AbstractBlock {

    protected function postInitialize() {
        // Set caching to false by default.
        $this->view->setCaching(false);
    }

    /**
     * Default initialisation
     */
    public function init() {
        
    }

    /**
     * Standard block function to get the general information about the block
     * 
     * @author Toni Ginard
     * @return array Block information
     */
    public function info() {
        return array(
            'text_type' => 'IWnotice',
            'module' => 'IWmain',
            'text_type_long' => $this->__('Show notices to the user'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    /**
     * Get the block information and show it if necessary
     * 
     * @author Toni Ginard
     * @param array Block info without content
     * @return array Block info ready to be displayed
     */
    public function display($row) {
        // Access only allowed to registered users, but in read only mode, allow access to everybody
        if (ModUtil::getVar('IWmain', 'readonly') != 1) {
            if (UserUtil::isGuestUser()) {
                return false;
            }
        }

        // Prepare general vars
        $bid = $row['bid'];
        $content = unserialize($row['content']);
        $startTime = $content['startTime'];
        $endTime = $content['endTime'];
        $message = '';
        $admin = false;

        // Prepare time vars
        if ($startTime != '0') {
            $startTime = mktime('0', '0', '0', (int) substr($startTime, 4, 2), (int) substr($startTime, 6, 2), (int) substr($startTime, 0, 4));
        }
        if ($endTime != '0') {
            $endTime = mktime('23', '59', '59', (int) substr($endTime, 4, 2), (int) substr($endTime, 6, 2), (int) substr($endTime, 0, 4));
        }

        // Set message
        if ((!empty($content['adminNotice']) || !empty($content['userNotice'])) && (($startTime == '0') || (time() >= $startTime)) && (($endTime == '0') || (time() <= $endTime))) {
            if (!SecurityUtil::checkPermission('IWmain::', '::', ACCESS_ADMIN)) {
                // User is not admin
                $message = $content['userNotice'];
            } else {
                // User is admin
                $message = $content['adminNotice'];
                $admin = true;
            }
        }

        if (empty($message)) {
            // If there is no message, don't show the block
            return false;

        } else {

            // Pass values to the template
            $this->view->assign('message', $message)
                    ->assign('admin', $admin)
                    ->assign('bid', $bid);

            // Get the HTML content of the block
            $row['content'] = $this->view->fetch('IWmain_block_IWnotice.tpl');

            return BlockUtil::themesideblock($row);
        }
    }

}
