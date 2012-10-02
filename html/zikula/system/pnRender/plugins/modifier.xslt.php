<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2007, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.xslt.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier to apply a xml stylesheet to a variable
 *
 * The modifier requires php 5's DOM and XSLT funtionality
 *
 * Example
 *
 *   <!--[$myvar|xslt:'your_xsl_file.xsl']-->
 *
 * @author       Mark West
 * @since        11 Jan 2007
 * @see          modifier.xslt.php::smarty_modifier_xslt
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_xslt($string, $styleurl)
{
    // create new objects
    $doc = new DOMDocument();
    $xsl = new XSLTProcessor();

    // check for the stylesheet parameter
    if (!isset($styleurl) || empty($styleurl)) {
        return $string;
    }

    // load and import stylesheet
    $doc->load($styleurl);
    $xsl->importStyleSheet($doc);

    // load xml source
    $doc->loadXML($string);

    // apply stylesheet and return output
    return $xsl->transformToXML($doc);
}
