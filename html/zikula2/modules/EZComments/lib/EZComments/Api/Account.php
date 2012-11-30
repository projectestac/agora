<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @license See license.txt
 */

class EZComments_Api_Account extends Zikula_AbstractApi
{
    /**
    * Return an array of items to show in the your account panel
    *
    * @return   array
    */
    public function getall()
    {
        $items = array();
        $useAccountPage = ModUtil::getVar('EZComments', 'useaccountpage', '1');
        if ($useAccountPage) {
            // Create an array of links to return
            $items['1'] = array('url'   => ModUtil::url('EZComments', 'user', 'main'),
                                'title' => $this->__('Manage my comments'),
                                'icon'  => 'mycommentsbutton.png',
                                'set'   => null);
        }

        // return the items
        return $items;
    }
}
