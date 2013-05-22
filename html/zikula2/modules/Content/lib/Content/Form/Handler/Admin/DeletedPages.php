<?php

class Content_Form_Handler_Admin_DeletedPages extends Zikula_Form_AbstractHandler
{
    public function __construct($args)
    {
        $this->args = $args;
    }

    public function initialize(Zikula_Form_View $view)
    {
        $offset = (int)FormUtil::getPassedValue('offset');
        $versionscnt = ModUtil::apiFunc('Content', 'History', 'getDeletedPagesCount');
        $versions = ModUtil::apiFunc('Content', 'History', 'getDeletedPages', array('offset' => $offset));
        if ($versions === false) {
            return $this->view->registerError(null);
        }

        // Assign the values for the smarty plugin to produce a pager
        $this->view->assign('numitems', $versionscnt);
        foreach ($versions as &$version) {
            $version['data'] = unserialize($version['data']);
        }
        $this->view->assign('versions', $versions);
        
        PageUtil::setVar('title', $this->__("Restore deleted pages"));

        return true;
    }

    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        $url = ModUtil::url('Content', 'admin', 'main');

        if ($args['commandName'] == 'restore') {
            $ok = ModUtil::apiFunc('Content', 'History', 'restoreVersion', array('id' => $args['commandArgument']));
            if ($ok === false) {
                return $this->view->registerError(null);
            }
        }

        return $this->view->redirect($url);
    }
}
