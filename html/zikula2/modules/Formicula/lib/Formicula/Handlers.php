<?php

/**
 * Handlers for the Formicula module
 *
 */
class Formicula_Handlers 
{
    // Content plugin for displaying forms
    public static function getTypes(Zikula_Event $event) {
        $types = $event->getSubject();
        $types->add('Formicula_ContentType_Form');
    }
}