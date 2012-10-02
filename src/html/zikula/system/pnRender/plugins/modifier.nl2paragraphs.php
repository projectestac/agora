<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.nl2paragraphs.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier format the output of a comment
 * 
 * The plugin compares the comment against the comment with all tags stipped 
 * to determine of there is html content. If no html content is found then 
 * each newline (\n) is converted to an close/open parapgraph pair </p><p>
 * lastly the output is wrapped in a paragraph (<p>content</p>) - this should
 * form valid html for a non formatted comment
 *
 * Example
 * 
 *   <!--[$myvar|nl2paragraphs]-->
 * 
 * 
 * @author       Mark West
 * @since        12/5/2005
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_nl2paragraphs($string)
{
    // compare the stipped version with original (identical means an unformated comment)
    if ($string == strip_tags($string)) {
        // strip all carriage returns (we're only interested in newlines)
        $string = str_replace("\r", '', $string);
        // replace newlines with a paragraph delimiter
        $string = str_replace("\n", '</p><p>', $string);
        // wrap string in a paragraph
        $string = '<p>' . $string . '</p>';
        // drop any empty parapgraphs
        $string = str_replace('<p></p>', '', $string);
    }

    return $string;
}
