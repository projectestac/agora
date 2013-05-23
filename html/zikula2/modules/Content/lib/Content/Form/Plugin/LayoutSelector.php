<?php

class Content_Form_Plugin_LayoutSelector extends Zikula_Form_Plugin_DropdownList
{
    function load(Zikula_Form_View $view, &$params)
    {
        // get all layouts if needed
        if (array_key_exists('layouts', $params)) {
            $layouts = $params['layouts'];
        } else {
            $layouts = ModUtil::apiFunc('Content', 'Layout', 'getLayouts');
            if ($layouts === false) {
                return false;
            }
        }
        foreach ($layouts as $layout) {
            $this->_addItem($layout['title'], $layout['name'], $layout['image']);
        }
        parent::load($view, $params);
    }
    
    /**
     * Add item to list.
     *
     * @param string $text  The text of the item.
     * @param string $value The value of the item.
     * @param string $image The image of the item.
     *
     * @return void
     */
    private function _addItem($text, $value, $image = null)
    {
        $item = array(
            'text' => $text,
            'value' => $value,
        	'image'	=> $image);

        $this->items[] = $item;
    }
}
