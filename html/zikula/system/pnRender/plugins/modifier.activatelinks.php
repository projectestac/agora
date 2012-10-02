<?php
/**
 * Zikula Application Framework
 *
 * @link http://www.zikula.org
 * @version $Id: modifier.activatelinks.php 27067 2009-10-21 17:20:35Z drak $
 * @author Joao Prado Maia (jpm@pessoal.org) - http://pessoal.org
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty Plugin
 * -------------------------------------------------------------
 * Type:    modifier
 * Name:    activatelinks
 * Purpose: Plugin to replace URLs found within a string into HTML links.
 *
 */
function smarty_modifier_activatelinks($text)
{
    $text = preg_replace("'(\w+)://([\w\+\-\@\=\?\.\%\/\:\&\;~\|]+)(\.)?'", "<a href=\"\\1://\\2\">\\1://\\2</a>", $text);
    $text = preg_replace("'(\s+)www\.([\w\+\-\@\=\?\.\%\/\:\&\;~\|]+)(\.\s|\s)'", "\\1<a href=\"http://www.\\2\">www.\\2</a>\\3" , $text);

    return $text;
}
