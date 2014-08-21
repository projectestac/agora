<?php

class Content_Types
{

    /**
     * stack of classnames and information
     * @var array
     */
    private $types;

    /**
     * constructor.
     */
    public function __construct() {
        $this->types = array(
            'ContentType' => array(),
            'LayoutType' => array());
    }

    /**
     * add a Type to the stack
     * @param string $classname
     */
    public function add($classname) {
        if (is_string($classname)) {
            $parts = explode('_', $classname);
            if (count($parts) == 3) {
                $this->types[$parts[1]][] = array(
                    'module' => $parts[0],
                    'name' => $parts[2],
                    'class' => $classname,
                );
            }
        }
    }

    /**
     * return array of available plugins that have been
     * validated to be instanceof the base class
     * @param string $type Content|Layout
     * @return array
     */
    public function getValidatedPlugins($type) {
        $plugins = array();
        $baseclass = "Content_Abstract" . $type;
        foreach ($this->types[$type] as $type) {
            $view = Zikula_View::getInstance($type['module']);
            $instance = new $type['class']($view);
            if ($instance instanceof $baseclass) {
                $plugins[] = $instance;
            }
        }
        usort($plugins, array('Content_Types', 'pluginSort'));
        return $plugins;
    }

    /**
     * callback function for usort
     * @param object $a
     * @param object $b
     * @return boolean
     */
    private static function pluginSort($a, $b)
    {
        return strcmp($a->getTitle(), $b->getTitle());
    }

}
