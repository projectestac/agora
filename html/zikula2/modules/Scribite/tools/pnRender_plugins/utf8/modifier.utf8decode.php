<?php
/**
 * Smarty modifier to prepare a string in utf-8-charset 
 * to ISO-8859-1 (ex. for ISO-PostNuke-Sites)
 * 
 * Example
 *   <!--[$MyVar|utf8decode]-->
 * 
 * @author       Sven Schomacker aka hilope
 * @since        5/9/2005
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_utf8decode($string)
{
    return utf8_decode($string);
}
?>
