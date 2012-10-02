<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: modifier.formatezcomment.php 631 2009-11-26 16:28:16Z herr.vorragend $
 * @license See license.txt
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
 *   <!--[$comment|formatezcomment]-->
 * 
 * 
 * @author  Mark West
 * @since        12/5/2005
 * @param array    $string     the contents to transform
 * @return string   the modified output
 */
function smarty_modifier_formatezcomment($string)
{
    // compare the stipped version with original (identical means an unformated comment)
    if ($string == strip_tags($string)) {
        // strip all carriage returns (we're only interested in newlines)
        $string = str_replace("\r", '', $string);
        // replace newlines with a paragraph delimiter
        $string = str_replace("\n", '</p><p>', $string);
        // wrap string in a parapraph
        $string = '<p>' . $string . '</p>';
        // drop any empty parapgraphs
        $string = str_replace('<p></p>', '', $string);
    }
    return $string;
}


