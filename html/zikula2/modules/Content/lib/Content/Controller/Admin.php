<?php

/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */
class Content_Controller_Admin extends Zikula_AbstractController
{

    /**
     * Main Page list
     * @return <type>
     */
    public function main($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        $view = FormUtil::newForm('Content', $this);
        return $view->execute('admin/main.tpl', new Content_Form_Handler_Admin_Main($args));
    }

    /**
     * Change admin settings
     * @return <type>
     */
    public function settings()
    {
        $view = FormUtil::newForm('Content', $this);
        return $view->execute('admin/settings.tpl', new Content_Form_Handler_Admin_Settings(array()));
    }

    /**
     * Create new page
     * @param <type> $args
     * @return <type>
     */
    public function newpage($args)
    {
        $view = FormUtil::newForm('Content', $this);
        return $view->execute('admin/newpage.tpl', new Content_Form_Handler_Admin_NewPage($args));
    }

    /**
     * Edit singel page
     * @param array $args
     * @return <type>
     */
    public function editpage($args)
    {
        $view = FormUtil::newForm('Content', $this);
        return $view->execute('admin/editpage.tpl', new Content_Form_Handler_Admin_Page($args));
    }

    /**
     * Clone single page
     * @param <type> $args
     * @return <type>
     */
    public function clonepage($args)
    {
        $view = FormUtil::newForm('Content', $this);
        return $view->execute('admin/clonepage.tpl', new Content_Form_Handler_Admin_ClonePage($args));
    }

    /**
     * New content element
     * @param <type> $args
     * @return <type>
     */
    public function newcontent($args)
    {
        $view = FormUtil::newForm('Content', $this);
        return $view->execute('admin/newcontent.tpl', new Content_Form_Handler_Admin_NewContent($args));
    }

    /**
     * Edit single content item
     * @param <type> $args
     * @return <type>
     */
    public function editcontent($args)
    {
        $view = FormUtil::newForm('Content', $this);
        return $view->execute('admin/editcontent.tpl', new Content_Form_Handler_Admin_EditContent($args));
    }

    /**
     * Translate page
     * @param <type> $args
     * @return <type>
     */
    public function translatepage($args)
    {
        $view = FormUtil::newForm('Content', $this);
        return $view->execute('admin/translatepage.tpl', new Content_Form_Handler_Admin_TranslatePage($args));
    }

    /**
     * Translate content item
     * @param <type> $args
     * @return <type>
     */
    public function translatecontent($args)
    {
        $view = FormUtil::newForm('Content', $this);
        return $view->execute('admin/translatecontent.tpl', new Content_Form_Handler_Admin_TranslateContent($args));
    }

    /**
     * History
     * @param <type> $args
     * @return <type>
     */
    public function history($args)
    {
        $view = FormUtil::newForm('Content', $this);
        return $view->execute('admin/history.tpl', new Content_Form_Handler_Admin_HistoryContent($args));
    }

    /**
     * Restore deleted pages
     * @param <type> $args
     * @return <type>
     */
    public function deletedpages($args)
    {
        $view = FormUtil::newForm('Content', $this);
        return $view->execute('admin/deletedpages.tpl', new Content_Form_Handler_Admin_DeletedPages($args));
    }

    /**
     * perform a ContentType upgrade on all modules
     * @param string $modname (optional and unused at the moment)
     */
    public function upgradecontenttypes($modname=null)
    {
        $count = ModUtil::apiFunc('Content', 'admin', 'upgradecontenttypes', $modname);
        if ($count == 0) {
            LogUtil::registerStatus($this->__('No ContentTypes upgraded (there were no matches found).'));
        }
        $this->redirect(ModUtil::url('Content', 'admin', 'main'));
    }
    
    public function migrate($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Content::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());
        $migratemodule = $this->request->getPost()->get('migratemodule', isset($args['migratemodule']) ? $args['migratemodule'] : null);
        if (isset($migratemodule)) {
            $this->checkCsrfToken();
            if (Content_Migration_Util::migrate($migratemodule)) {
                LogUtil::registerStatus($this->__f("Module '%s' migrated successfully.", $migratemodule));
            } else {
                LogUtil::registerError($this->__f("Error: Unable to migrate module '%s'.", $migratemodule));
            }
            $this->redirect(ModUtil::url('Content', 'admin', 'main'));
        }
        return $this->view->fetch('admin/migrate.tpl');
    }

}
