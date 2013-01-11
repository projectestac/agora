<?php

/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */

/**
 * Class to control Admin interface
 */
class Downloads_Api_Admin extends Zikula_AbstractApi {

    /**
     * Get available admin panel links
     *
     * @return array array of admin links
     */
    public function getlinks() {
        // Define an empty array to hold the list of admin links
        $links = array();

        if (SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN)) {
            $links[] = array(
                'url' => ModUtil::url('Downloads', 'admin', 'main'),
                'text' => $this->__('File List'),
                'class' => 'z-icon-es-view');
        }

        if (SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN)) {
            $links[] = array(
                'url' => ModUtil::url('Downloads', 'admin', 'edit'),
                'text' => $this->__('New download'),
                'class' => 'z-icon-es-new');
        }

        if (SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN)) {
            $links[] = array(
                'url' => ModUtil::url('Downloads', 'admin', 'categoryList'),
                'text' => $this->__('Categories'),
                'class' => 'z-icon-es-cubes',
                'links' => array(
                    array('url' => ModUtil::url('Downloads', 'admin', 'categoryList'),
                        'text' => $this->__('View/edit Categories')),
                    array('url' => ModUtil::url('Downloads', 'admin', 'editCategory'),
                        'text' => $this->__('New category')),
                    ));
        }

        if (SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN)) {
            $links[] = array(
                'url' => ModUtil::url('Downloads', 'admin', 'modifyconfig'),
                'text' => $this->__('Settings'),
                'class' => 'z-icon-es-config');
        }

        /*         * ***** AFEGIT XTEC ****** */
        if (SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN)) {
            // get not validated downloads
            $items = ModUtil::apifunc('Downloads', 'user', 'countQuery', array('status' => Downloads_Api_User::STATUS_INACTIVE));

            $links[] = array(
                'url' => ModUtil::url('Downloads', 'admin', 'validate'),
                'text' => $this->__('Validate') . ' (' . $items . ')',
                'class' => 'z-icon-es-ok');
        }
        /*         * ***** FINAL AFEGIT XTEC ****** */

        return $links;
    }

}