<?php

class Agoraportal_Block_AgoraQuestion extends Zikula_Controller_AbstractBlock {

    public function init() {
        return false;
    }

    public function info() {
        $dom = ZLanguage::getModuleDomain('Agoraportal');

        return array('module' => 'Agoraportal',
            'text_type' => 'agoraQuestion',
            'text_type_long' => __('Mostra un quadre de diàleg per verificar els gestors de centre', $dom),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true,
            'admin_tableless' => true);
    }

    public function display($blockinfo) {
        return false;
    }
}