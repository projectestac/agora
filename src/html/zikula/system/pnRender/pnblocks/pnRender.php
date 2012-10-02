<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnRender.php 27057 2009-10-21 16:15:43Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 *
 * pnRender - Zikula wrapper class for Smarty
 * Display a pnRender block
 *
 * @package     Zikula_System_Modules
 * @subpackage  pnRender
 */

/**
 * initialise block
 *
 * @author    Frank Schummertz
 * @author    Jörg Napp
 */
function pnRender_pnRenderblock_init()
{
    // Security
    pnSecAddSchema('pnRender:pnRenderblock:', 'Block title::');
}

/**
 * Get information on block
 *
 * @author    Frank Schummertz
 * @author    Jörg Napp
 * @return    array    blockinfo array
 */
function pnRender_pnRenderblock_info()
{
    return array('module'         => 'pnRender',
                 'text_type'      => __('Rendering engine'),
                 'text_type_long' => __('Custom rendering engine block'),
                 'allow_multiple' => true,
                 'form_content'   => false,
                 'form_refresh'   => false,
                 'show_preview'   => true);
}

/**
 * Display the block
 *
 * @author    Frank Schummertz
 * @param     $row     blockinfo array
 * @return    string   HTML output string
 */
function pnRender_pnRenderblock_display($row)
{
    if (!SecurityUtil::checkPermission('pnRender:pnRenderblock:', "$row[title]::", ACCESS_OVERVIEW)) {
        return;
    }

    // Break out options from our content field
    $vars = pnBlockVarsFromContent($row['content']);

    // Parameter check
    if (!isset($vars['template']) || !isset($vars['module'])) {
        $row['content'] = DataUtil::formatForDisplayHTML(__('Misconfigured block')) ;
        return pnBlockThemeBlock($row);
    }

    // If the module is available we load the user api to ensure that the language
    // defines are present for use inside of the block. If we do not do this, the user
    // will see _THEDEFINES only
    // If the module is not available we show an error messages.
    if ( (!pnModAvailable($vars['module'])) || (!pnModAPILoad($vars['module'], 'user')) ) {
        $row['content'] = DataUtil::formatForDisplayHTML(__('Misconfigured block').' - '.__('No module.')) . $vars['module'];
        return pnBlockThemeBlock($row);
    }

    $pnRender = & pnRender::getInstance($vars['module'], false);

    // Get the additional parameters and assign them
    if (isset($vars['parameters']) && !empty($vars['parameters'])) {
        $params = explode( ';', $vars['parameters'] );
        if (count($params) > 0 ) {
            foreach($params as $param) {
                $assign = explode('=', $param);
                $pnRender->assign(trim($assign[0]), trim($assign[1]));
            }
        }
    }

    $row['content'] = $pnRender->fetch($vars['template']);

    return pnBlockThemeBlock($row);
}

/**
 * Update the block
 *
 * @author    Frank Schummertz
 * @author    Jörg Napp
 * @param     $row     old blockinfo array
 * @return    array    new blockinfo array
 */
function pnRender_pnRenderblock_update($row)
{
    if (!SecurityUtil::checkPermission('pnRender:pnRenderblock:', "$row[title]::", ACCESS_ADMIN)) {
        return false;
    }
    $module = FormUtil::getPassedValue('pnrmodule', null, 'POST');
    $template = FormUtil::getPassedValue('pnrtemplate', null, 'POST');
    $parameters = FormUtil::getPassedValue('pnrparameters', null, 'POST');

    $row['content'] = pnBlockVarsToContent(compact('module', 'template', 'parameters' ));
    return($row);
}

/**
 * Modify the block
 *
 * @author    Frank Schummertz
 * @author    Jörg Napp
 * @param     $row     blockinfo array
 * @return    string   HTML output string
 */
function pnRender_pnRenderblock_modify($row)
{
    if (!SecurityUtil::checkPermission('pnRender:pnRenderblock:', "$row[title]::", ACCESS_ADMIN)) {
        return false;
    }
    // Break out options from our content field
    $vars = pnBlockVarsFromContent($row['content']);

    // set some defaults
    !isset($vars['module']) ? $vars['module'] = '' : null;
    !isset($vars['template']) ? $vars['template'] = '' : null;
    !isset($vars['parameters']) ? $vars['parameters'] = '' : null;

    $pnRender = & pnRender::getInstance('pnRender', false);
    $pnRender->assign($vars);
    return $pnRender->fetch('pnrender_block_pnrender.htm');
}
