<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: function.popgraphic.php 40 2009-01-09 14:13:23Z herr.vorragend $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

function smarty_function_popgraphic($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    extract($params);
    unset($params);

    if ($hits>=pnModGetVar('Web_Links', 'popular')) {
        echo "&nbsp;<img src=\"images/icons/extrasmall/flag.gif\" alt=\"".__('Popular', $dom)."\" title=\"".__('Popular', $dom)."\" />";
    }
    return;
}