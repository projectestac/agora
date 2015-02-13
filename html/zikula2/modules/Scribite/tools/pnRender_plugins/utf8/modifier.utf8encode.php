<?php
/**
 * Smarty modifier to prepare a string in 8859-1-charset 
 * to utf-8 (ex. for UTF-8-PostNuke-Sites)
 * 
 * Example
 *   <!--[$MyVar|utf8encode]-->
 * 
 * @author       Sven Schomacker aka hilope
 * @since        5/9/2005
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_utf8encode($string)
{
    return utf8_encode($string);
}
?>
