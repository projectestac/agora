<?php

/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */
class Content_Api_Layout extends Zikula_AbstractApi
{

    public function getLayouts($args)
    {
        $plugins = Content_Util::getPlugins('Layout');
        $layouts = array();
        $names = array();

        for ($i = 0, $cou = count($plugins); $i < $cou; ++$i) {
            $plugin = $plugins[$i];
            $layouts[$i] = array(
                'name' => $plugin->getName(),
                'title' => $plugin->getTitle(),
                'description' => $plugin->getDescription(),
                'numberOfContentAreas' => $plugin->getNumberOfContentAreas(),
                'image' => $plugin->getImage());
            $names[$i] = $layouts[$i]['name'];
        }
        // sort the layouts array by the name
        array_multisort($names, SORT_ASC, $layouts);

        return $layouts;
    }

    public function getLayoutPlugin($args)
    {
        $classname = "Content_LayoutType_" . $args['layout'];
        $view = Zikula_View::getInstance('Content');
        return new $classname($view);
    }

    public function getLayout($args)
    {
        $plugin = $this->getLayoutPlugin($args);
        return array(
            'name' => $plugin->getName(),
            'title' => $plugin->getTitle(),
            'description' => $plugin->getDescription(),
            'numberOfContentAreas' => $plugin->getNumberOfContentAreas(),
            'image' => $plugin->getImage(),
            'template' => $plugin->getTemplate(),
            'editTemplate' => $plugin->getEditTemplate(),
            'plugin' => $plugin);
    }
}
