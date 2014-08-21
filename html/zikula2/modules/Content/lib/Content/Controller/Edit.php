<?php

/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */
class Content_Controller_Edit extends Zikula_AbstractController
{
    /* =[ Main page tree ]============================================================ */

    public function main($args)
    {
        LogUtil::log($this->__f('Warning! %1$s is deprecated. Please use the Admin controller instead.', array(__CLASS__ . '::' . __FUNCTION__)), E_USER_DEPRECATED);
        $this->redirect(ModUtil::url('Content', 'admin', 'main', $args));
    }

    /* =[ Create new page ]=========================================================== */

    public function newpage($args)
    {
        LogUtil::log($this->__f('Warning! %1$s is deprecated. Please use the Admin controller instead.', array(__CLASS__ . '::' . __FUNCTION__)), E_USER_DEPRECATED);
        $this->redirect(ModUtil::url('Content', 'admin', 'newpage', $args));
    }

    /* =[ Edit single page ]========================================================== */

    public function editpage($args)
    {
        LogUtil::log($this->__f('Warning! %1$s is deprecated. Please use the Admin controller instead.', array(__CLASS__ . '::' . __FUNCTION__)), E_USER_DEPRECATED);
        $this->redirect(ModUtil::url('Content', 'admin', 'editpage', $args));
    }

    /* =[ Clone single page ]========================================================== */

    public function clonepage($args)
    {
        LogUtil::log($this->__f('Warning! %1$s is deprecated. Please use the Admin controller instead.', array(__CLASS__ . '::' . __FUNCTION__)), E_USER_DEPRECATED);
        $this->redirect(ModUtil::url('Content', 'admin', 'clonepage', $args));
    }

    /* =[ New content element ]======================================================= */

    public function newcontent($args)
    {
        LogUtil::log($this->__f('Warning! %1$s is deprecated. Please use the Admin controller instead.', array(__CLASS__ . '::' . __FUNCTION__)), E_USER_DEPRECATED);
        $this->redirect(ModUtil::url('Content', 'admin', 'newcontent', $args));
    }

    /* =[ Edit single content item ]================================================== */

    public function editcontent($args)
    {
        LogUtil::log($this->__f('Warning! %1$s is deprecated. Please use the Admin controller instead.', array(__CLASS__ . '::' . __FUNCTION__)), E_USER_DEPRECATED);
        $this->redirect(ModUtil::url('Content', 'admin', 'editcontent', $args));
    }

    /* =[ Translate page ]============================================================ */

    public function translatepage($args)
    {
        LogUtil::log($this->__f('Warning! %1$s is deprecated. Please use the Admin controller instead.', array(__CLASS__ . '::' . __FUNCTION__)), E_USER_DEPRECATED);
        $this->redirect(ModUtil::url('Content', 'admin', 'translatepage', $args));
    }

    /* =[ Translate content item ]==================================================== */

    public function translatecontent($args)
    {
        LogUtil::log($this->__f('Warning! %1$s is deprecated. Please use the Admin controller instead.', array(__CLASS__ . '::' . __FUNCTION__)), E_USER_DEPRECATED);
        $this->redirect(ModUtil::url('Content', 'admin', 'translatecontent', $args));
    }

    /* =[ History ]=================================================================== */

    public function history($args)
    {
        LogUtil::log($this->__f('Warning! %1$s is deprecated. Please use the Admin controller instead.', array(__CLASS__ . '::' . __FUNCTION__)), E_USER_DEPRECATED);
        $this->redirect(ModUtil::url('Content', 'admin', 'history', $args));
    }

    /* =[ Restore deleted pages ]===================================================== */

    public function deletedpages($args)
    {
        LogUtil::log($this->__f('Warning! %1$s is deprecated. Please use the Admin controller instead.', array(__CLASS__ . '::' . __FUNCTION__)), E_USER_DEPRECATED);
        $this->redirect(ModUtil::url('Content', 'admin', 'deletedpages', $args));
    }

}