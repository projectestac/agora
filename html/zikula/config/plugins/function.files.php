<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: modifier.makeParagraph.php 138 2009-02-11 07:13:10Z hilope $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     steffen voss
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage scribite!
 */

function smarty_function_files()
{
    $dom = ZLanguage::getModuleDomain('Files');
    PageUtil::addVar('javascript', 'modules/Files/pnjavascript/getFiles.js');
    $content = '<div style="clear:both">&nbsp;</div>';
    $content .= '<div style="margin-left: 20px;">';
    $content .= '<div style="width: 50px; float:left">';
    $content .= '<label for="none"><strong>' . __('Files', $dom) . ':</strong></label>';
    $content .= '</div>';
    $content .= '<div style="float:left" id="files">';
    $content .= '<input type="text" id="hook_form_file" />';
    $content .= '<input type="button" onclick="javascript:Loadwindow()" value="' . __('Browse', $dom) .'" />';
    $content .= '</div>';
    $content .= '</div>';
    $content .= '<div style="clear:both">&nbsp;</div>';
    return $content;
}
