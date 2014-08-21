<?php

/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */
class Content_Api_Admin extends Zikula_AbstractApi
{

    /**
     * get available admin panel links
     *
     * @return array array of admin links
     */
    public function getLinks()
    {
        $links = array();

        if (SecurityUtil::checkPermission('Content::', '::', ACCESS_EDIT)) {
            $links[] = array(
                'url' => ModUtil::url('Content', 'admin', 'main'),
                'text' => $this->__('Page list'),
                'class' => 'z-icon-es-view',
                'links' => array(
                    array('url'  => ModUtil::url('Content', 'user', 'sitemap'),
                          'text' => $this->__('Sitemap')),
                    array('url'  => ModUtil::url('Content', 'user', 'extlist'),
                          'text' => $this->__('Extended')),
                    array('url'  => ModUtil::url('Content', 'user', 'pagelist'),
                          'text' => $this->__('Complete')),
                    array('url'  => ModUtil::url('Content', 'user', 'categories'),
                          'text' => $this->__('Category list')),
                    array('url'  => ModUtil::url('Content', 'admin', 'deletedpages'),
                          'text' => $this->__('Restore pages')),
                ));
        }
        if (SecurityUtil::checkPermission('Content::', '::', ACCESS_ADD)) {
            $links[] = array(
                'url'   => ModUtil::url('Content', 'admin', 'newPage'),
                'text'  => $this->__('Add new page'),
                'class' => 'z-icon-es-new');
        }
        if (SecurityUtil::checkPermission('Content::', '::', ACCESS_ADMIN)) {
            $links[] = array(
                'url'   => ModUtil::url('Content', 'admin', 'settings'),
                'text'  => $this->__('Settings'),
                'class' => 'z-icon-es-config');
            $links[] = array(
                'url'   => ModUtil::url('Content', 'admin', 'upgradecontenttypes'),
                'text'  => $this->__('Upgrade ContentTypes'),
                'class' => 'z-icon-es-gears');
            $links[] = array(
                'url'   => ModUtil::url('Content', 'admin', 'migrate'),
                'text'  => $this->__('Migrate Data'),
                'class' => 'z-icon-es-regenerate');
        }

        return $links;
    }

    public function getStyleClasses($args)
    {
        $classes = array();
        $userClasses = $this->getVar('styleClasses');
        $userClasses = explode("\n", $userClasses);

        foreach ($userClasses as $class)
        {
            list($value, $text) = explode('|', $class);
            $value = trim($value);
            $text = trim($text);
            if (!empty($text) && !empty($value)) {
                $classes[] = array('text' => $text, 'value' => $value);
            }
        }

        return $classes;
    }

    /**
     * perform a ContentType upgrade on all modules
     * @param string $modname (optional and unused at the moment)
     */
    public function upgradecontenttypes($modname=null)
    {
        if ($modname == null) {
            $modules = ModUtil::getModules();
            $count = 0;
            foreach ($modules as $module) {
                // there is no need to upgrade Content ContentTypes because they are done on module upgrade.
                if ($module['name'] <> 'Content') {
                    $count += Content_Installer::updateContentType($module['name']);
                }
            }
        } else {
            $count = Content_Installer::updateContentType($modname);
        }
        return $count;
    }
}
