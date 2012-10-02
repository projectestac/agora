<?php
/**
 * Volatile block container
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: block.pnformvolatile.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Blocks
 */

/**
 * Volatile block container
 *
 * This block is a hack, a not so elegant solution, to situations where you need to put
 * pnForms plugins inside conditional smarty tags like if-then-else and foreach. You can
 * get into problems if you make templates like this:
 * <code>
 *  <!--[foreach from=... item=...]-->
 *    <!--[pnformtextinput ...]-->
 *    <!--[pnformbutton ...]-->
 *  <!--[/foreach]-->
 * </code>
 * This is because the number of plugins on the page may change from one page to another
 * due to changing conditions or amount of items in the foreach loop: on the first page
 * you might have 5 iterations, whereas on postback you suddenly have 6. What should then
 * be done to the missing (or excess) persisted plugin data on postback? The answer is:
 * pnForms cannot handle this - your code will break!
 *
 * So you need to tell pnForms that the block inside the foreach tags is volatile - pnForms
 * should not try to save the state of the plugins inside the foreach loop. This is done
 * with the volatile block:
 * <code>
 *  <!--[pnformvolatile]-->
 *  <!--[foreach from=... item=...]-->
 *    <!--[pnformtextinput ...]-->
 *    <!--[pnformbutton ...]-->
 *  <!--[/foreach]-->
 *  <!--[/pnformvolatile]-->
 * </code>
 * This disables the ability to persist data in the pnForms plugins, but does save you
 * from trouble in some situations.
 *
 * You don't need the volatile block if you can guarantee that the number of elements will
 * be the same always.
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormVolatile extends pnFormPlugin
{
    var $volatile = 1;

    function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }


    function create(&$render, &$params)
    {
    }
}


function smarty_block_pnformvolatile($params, $content, &$render)
{
    return $render->pnFormRegisterBlock('pnFormVolatile', $params, $content);
}
