<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: quote.php 358 2009-11-11 13:46:21Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Quotes
 */

/**
 * Init quotes block
 * @author The Zikula Development Team <erik@slooff.com>
 * @link http://www.zikula.org
 */
function Quotes_quoteblock_init()
{
    // Security
    SecurityUtil::registerPermissionSchema('Quotes:Quoteblock:', 'Block title::');
}

/**
 * Return Quotes blockinfo array
 * @author The Zikula Development Team <erik@slooff.com>
 * @link http://www.zikula.org
 * @return array
 */
function Quotes_quoteblock_info()
{
    $dom = ZLanguage::getModuleDomain('Quotes');

    return array('module' => 'Quotes',
                 'text_type' => __('Quote', $dom),
                 'text_type_long' => __('Random quote block', $dom),
                 'allow_multiple' => true,
                 'form_content' => false,
                 'form_refresh' => false,
                 'show_preview' => true);
}

/**
 * Display quotes block
 * @author The Zikula Development Team <erik@slooff.com>
 * @link http://www.zikula.org
 * @param 'blockinfo' blockinfo array
 * @return HTML String
 */
function quotes_quoteblock_display($blockinfo)
{
    // security check
    if (!SecurityUtil::checkPermission('Quotes:Quoteblock:', "$blockinfo[title]::", ACCESS_READ)) {
        return;
    }

    // check if the quotes module is available
    if (!pnModAvailable('Quotes')) {
        return;
    }

    $dom = ZLanguage::getModuleDomain('Quotes');

    // count the number of quotes in the db
    $total  = pnModAPIFunc('Quotes', 'user', 'countitems');

    // Create output object
    $render = & pnRender::getInstance('Quotes');

    mt_srand((double)microtime()*1000000);

    $quote = array();
    // display an error if there are less than two quotes in the db
    // otherwise assign a random quote to the template
    if ($total < 2) {
        $quote['error'] = __('There are too few Quotes in the database', $dom);
    } else {
        $random = mt_rand(0,($total));
        $quotes = pnModAPIFunc('Quotes', 'user', 'getall', array('numitems' => 1, 'startnum' => $random));
        // assign the first quote in the result set (there will only ever be one...)
        $quote = $quotes[0];
        $quote['error'] = false;
    }

    $render->assign('quote', $quote);
    $render->assign('bid', $blockinfo['bid']);

    // get the block output from the template
    $blockinfo['content'] = $render->fetch('quotes_block_quote.htm');

    // return the rendered block
    return pnBlockThemeBlock($blockinfo);
}
