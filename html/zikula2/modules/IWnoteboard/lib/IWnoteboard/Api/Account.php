<?php
class IWnoteboard_Api_Account extends Zikula_AbstractApi
{
    public function getAll($args) {
        // Create an array of links to return
        $items = array();
        $items['1'] = array('url' => ModUtil::url('IWnoteboard', 'user', 'nova', array('m' => 'n')),
                            'module' => 'IWnoteboard',
                            'title' => $this->__('Add a new note'),
                            'icon' => 'newNote.png');
        // Return the items
        return $items;
    }
}