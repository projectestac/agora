<?php
/**
 * Category checkbox list plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformdropdownlist.php 22138 2007-06-01 10:19:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/** Make sure to use require_once() instead of Loader::requireOnce() since "function.xxx.php"
 is loaded by Smarty (the base render class) with the use of require_once(). We do not want to
 get in conflict with that.*/
require_once 'system/pnForm/plugins/function.pnformcheckboxlist.php';
require_once 'system/pnForm/plugins/function.pnformcategoryselector.php';


/**
 * Category selector
 *
 * This plugin creates a category selector using a series of checkboxes
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormCategoryCheckboxList extends pnFormCheckboxList
{
    var $editLink;
    var $category;

    
    function getFilename()
    {
        return __FILE__;
    }


    function load(&$render, $params)
    {
        pnFormCategorySelector::loadParameters($this, false, $params);
        parent::load($render, $params);
    }


    function render(&$render)
    {
        $result = parent::render($render);

        if ($this->editLink && !empty($this->category) 
            && SecurityUtil::checkPermission( 'Categories::', "$this->category[id]::", ACCESS_EDIT)) 
        {
            $url = DataUtil::formatForDisplay(pnModURL ('Categories', 'user', 'edit', array('dr' => $this->category['id'])));
            $result .= "<a class=\"z-formnote\" href=\"$url\">" . __('Edit'). '</a>';
        }

        return $result;
    }
}


function smarty_function_pnformcategorycheckboxlist($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormCategoryCheckboxList', $params);
}

