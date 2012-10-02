<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: modifier.makeParagraph.php 104 2008-12-20 22:23:27Z hilope $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     steffen voss
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage scribite!
 */

// Use this modifier in order to set text in textare into paragraphs when
// no ENTER is pressed in wysiwyg-editor and no p-tags have been added

function smarty_modifier_makeParagraph($string)
{
    if (substr($string, 0, 3)!="<p>") {
        return("<p>".$string."</p>");
    } else {
        return($string);
    }
}

