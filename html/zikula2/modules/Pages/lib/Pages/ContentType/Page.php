<?php
/**
 * Copyright Pages Team 2012
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Pages
 * @link https://github.com/zikula-modules/Pages
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

class Pages_ContentType_Page
{

    private $_page;
    public $entityManager;

    /**
     * construct
     */
    public function __construct()
    {
        $this->entityManager = ServiceUtil::getService('doctrine.entitymanager');
    }


    /**
     * find
     *
     * @param array $args Arguments.
     *
     * @return boolean
     */
    public function find($args)
    {

        // Argument check
        if ((!isset($args['pageid']) || !is_numeric($args['pageid'])) && !isset($args['title'])) {
            return LogUtil::registerArgsError();
        }

        $where = array();
        if (isset($args['pageid']) && is_numeric($args['pageid'])) {
            $where['pageid'] = $args['pageid'];
        } else {
            $where['urltitle'] = $args['title'];
        }

        $this->_page = $this->entityManager->getRepository('Pages_Entity_Page')->findOneBy($where);
        if (!$this->_page) {
            return LogUtil::registerArgsError();
        }

        // Permission check
        if (!SecurityUtil::checkPermission('Pages:title:', $this->_page->getPageid().'::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        return true;

    }

    /**
     * find
     *
     * @param int id Page id.
     *
     * @return boolean
     */
    public function findById($id)
    {
        $this->_page = $this->entityManager->find('Pages_Entity_Page', $id);
        if (!$this->_page) {
            return LogUtil::registerArgsError();
        }

        // Permission check
        if (!SecurityUtil::checkPermission('Pages:title:', $this->_page->getPageid().'::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        return true;
    }

    /**
     * create
     *
     */
    public function create()
    {
        $this->_page = new Pages_Entity_Page();
    }

    /**
     * return page as array
     *
     * @return mixed array or false
     */
    public function toArray()
    {
        if (!$this->_page) {
            return false;
        }

        return $this->_page->toArray();
    }

    /**
     * return page as array
     *
     * @return array
     */
    public function getId()
    {
        return $this->_page->getPageId();
    }

    /**
     * return page as doctrine2 object
     *
     * @return object
     */
    public function get()
    {
        return $this->_page;
    }


    /**
     * return page as array
     *
     * @return array
     */
    public function getAccessLevel()
    {
        $pageid = $this->_page->getPageid();
        $title = $this->_page->getTitle();

        if (SecurityUtil::checkPermission('Pages::Page', "$title::$pageid", ACCESS_READ)) {
            $accessLevel = ACCESS_READ;
            if (SecurityUtil::checkPermission('Pages::', "$title::$pageid", ACCESS_COMMENT)) {
                $accessLevel = ACCESS_COMMENT;
                if (SecurityUtil::checkPermission('Pages::', "$title::$pageid", ACCESS_EDIT)) {
                    $accessLevel = ACCESS_EDIT;
                }
            }
        } else {
            $accessLevel = ACCESS_NONE;
        }

        return $accessLevel;
    }

    /**
     * return page as array
     *
     * @return array
     */
    public function incrementReadCount()
    {
        $this->_page->incrementCounter();
        $this->entityManager->flush();
        return true;
    }


    /**
     * return page as array
     *
     * @param array $data Page data.
     *
     * @return boolean
     */
    public function set($data)
    {
        // define the permalink title if not present
        $urltitlecreatedfromtitle = false;
        if (!isset($data['urltitle']) || empty($data['urltitle'])) {
            $data['urltitle'] = DataUtil::formatPermalink($data['title']);
            $urltitlecreatedfromtitle = true;
        }

        if (ModUtil::apiFunc('Pages', 'admin', 'checkuniquepermalink', $data) === false) {
            $data['urltitle'] = '';
            if ($urltitlecreatedfromtitle == true) {
                return LogUtil::registerError(__('The permalinks retrieved from the title has to be unique!'));
            } else {
                return LogUtil::registerError(__('The permalink has to be unique!'));
            }
            return LogUtil::registerError(
                __('The permalink has been removed, please update the page with a correct and unique permalink')
            );
        }

        $this->_page->merge($data);
        $this->entityManager->persist($this->_page);
        $this->entityManager->flush();
        return true;
    }

    /**
     * return page as array
     *
     * @return boolean
     */
    public function remove()
    {
        $this->entityManager->remove($this->_page);
        $this->entityManager->flush();
        return true;
    }

}