<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage AdminMessages
 */
class AdminMessages_Version extends Zikula_AbstractVersion {

    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("AdminMessages");
        $meta['description'] = $this->__("Provides a means of publishing, editing and scheduling special announcements from the site administrator.");
        $meta['url'] = 'AdminMessages';
        $meta['version'] = '2.2.0';

        $meta['securityschema'] = array('AdminMessages::' => 'message title::message id');
        return $meta;
    }

}
