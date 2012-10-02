<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 39 2009-12-20 07:03:12Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage FAQ
 */

/**
 * get all FAQs
 *
 * @param    int     $args['starnum']    (optional) first item to return
 * @param    int     $args['numitems']   (optional) number if items to return
 * @param    bool    $args['answered']   (optional) return only answered FAQ's
 * @return   array   array of items, or false on failure
 */
function FAQ_userapi_getall($args)
{
    // Security check
    if (!SecurityUtil::checkPermission('FAQ::', '::', ACCESS_READ)) {
        return array();
    }

    $dom = ZLanguage::getModuleDomain('FAQ');

    // Optional arguments.
    if (!isset($args['startnum']) || !is_numeric($args['startnum'])) {
        $args['startnum'] = 1;
    }
    if (!isset($args['numitems']) || !is_numeric($args['numitems'])) {
        $args['numitems'] = -1;
    }
    if (!isset($args['category'])) {
        $args['category'] = null;
    }
    if (!isset($args['order'])) {
        $args['order'] = 'faqid';
    }

    $args['catFilter'] = array();
    if (isset($args['category']) && !empty($args['category'])){
        if (is_array($args['category'])) {
            $args['catFilter'] = $args['category'];
        } elseif (isset($args['property'])) {
            $property = $args['property'];
            $args['catFilter'][$property] = $args['category'];
        }
        $args['catFilter']['__META__'] = array('module' => 'FAQ');
    }

    $whereclause = '';
    if (isset($args['answered']) && is_bool($args['answered']) && $args['answered']) {
        $whereclause = ' WHERE pn_answer != \'\'';
    }

    // define the permission filter to apply
    $permFilter = array(array('realm'          => 0,
                              'component_left' => 'FAQ',
                              'instance_left'  => 'faqid',
                              'instance_right' => '',
                              'level'          => ACCESS_READ));

    // get the objects from the db
    $objArray = DBUtil::selectObjectArray('faqanswer', $whereclause, $args['order'], $args['startnum']-1, $args['numitems'], '', $permFilter, $args['catFilter']);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($objArray === false) {
        return LogUtil::registerError(__('Error! Could not load items.', $dom));
    }

    // need to do this here as the category expansion code can't know the
    // root category which we need to build the relative path component
    if ($objArray && isset($args['catregistry']) && $args['catregistry']) {
        if (!Loader::loadClass ('CategoryUtil')) {
            pn_exit(__f('Error! Unable to load class [%s%]', 'CategoryRegistryUtil', $dom));
        }
        ObjectUtil::postProcessExpandedObjectArrayCategories($objArray, $args['catregistry']);
    }

    // Return the items
    return $objArray;
}

/**
 * get a specific faq
 *
 * @param    $args['faqid']  id of faq to get
 * @param    $args['objectid']  id of faq to get (maps to faqid if present)
 * @return   array         item array, or false on failure
 */
function FAQ_userapi_get($args)
{
    if (isset($args['objectid']) && is_numeric($args['objectid'])) {
        $args['faqid'] = $args['objectid'];
    }
    if ((!isset($args['faqid']) || !is_numeric($args['faqid'])) &&
         !isset($args['title'])) {
        return LogUtil::registerArgsError();
    }

    // define the permission filter to apply
    $permFilter = array(array('realm'          => 0,
                              'component_left' => 'FAQ',
                              'instance_left'  => 'faqid',
                              'instance_right' => '',
                              'level'          => ACCESS_READ));

    if (isset($args['faqid']) && is_numeric($args['faqid'])) {
        return DBUtil::selectObjectByID('faqanswer', $args['faqid'], 'faqid', '', $permFilter);
    } else {
        return DBUtil::selectObjectByID('faqanswer', $args['title'], 'urltitle', '', $permFilter);
    }
}

/**
 * utility function to count the number of items held by this module
 *
 * @return   integer   number of items held by this module
 */
function FAQ_userapi_countitems($args)
{
    $args['catFilter'] = array();
    if (isset($args['category']) && !empty($args['category'])){
        if (is_array($args['category'])) {
            $args['catFilter'] = $args['category'];
        } elseif (isset($args['property'])) {
            $property = $args['property'];
            $args['catFilter'][$property] = $args['category'];
        }
        $args['catFilter']['__META__'] = array('module' => 'FAQ');
    }

    // Return the number of items
    return DBUtil::selectObjectCount('faqanswer', '', 'faqid', false, $args['catFilter']);
}

/**
 * form custom url string
 *
 * @author Mark West
 * @return string custom url string
 */
function FAQ_userapi_encodeurl($args)
{
    // check we have the required input
    if (!isset($args['modname']) || !isset($args['func']) || !isset($args['args'])) {
        return LogUtil::registerArgsError();
    }

    if (!isset($args['type'])) {
        $args['type'] = 'user';
    }

    // check for an object id
    if (isset($args['objectid'])) {
        $args['args']['faqid'] = $args['objectid'];
    }

    // create an empty string ready for population
    $vars = '';

    // add the category name to the view link
    if ($args['func'] == 'view' && isset($args['args']['prop'])) {
        $vars = $args['args']['prop'];
        if (isset($args['args']['cat'])) {
            $vars .= '/'.$args['args']['cat'];
        }
    }

    // for the display function use either the title (if present) or the page id
    if ($args['func'] == 'display') {
        // check for the generic object id parameter
        if (isset($args['args']['objectid'])) {
            $args['args']['faqid'] = $args['args']['objectid'];
        }
        // get the item (will be cached by DBUtil)
        $item = pnModAPIFunc('FAQ', 'user', 'get', array('faqid' => $args['args']['faqid']));
        if (pnModGetVar('FAQ', 'addcategorytitletopermalink') && isset($args['args']['cat'])) {
            $vars = $args['args']['cat'].'/'.$item['urltitle'];
        } else {
            $vars = $item['urltitle'];
        }
    }

    // don't display the function name if either displaying an page or the normal overview
    if ($args['func'] == 'main' || $args['func'] == 'display') {
        $args['func'] = '';
    }

    // construct the custom url part
    if (empty($args['func']) && empty($vars)) {
        return $args['modname'] . '/';
    } elseif (empty($args['func'])) {
        return $args['modname'] . '/' . $vars . '/';
    } elseif (empty($vars)) {
        return $args['modname'] . '/' . $args['func'] . '/';
    } else {
        return $args['modname'] . '/' . $args['func'] . '/' . $vars . '/';
    }
}

/**
 * decode the custom url string
 *
 * @author Mark West
 * @return bool true if successful, false otherwise
 */
function FAQ_userapi_decodeurl($args)
{
    // check we actually have some vars to work with...
    if (!isset($args['vars'])) {
        return LogUtil::registerArgsError();
    }

    // define the available user functions
    $funcs = array('main', 'view', 'display', 'ask', 'create');

    // set the correct function name based on our input
    if (empty($args['vars'][2])) {
        pnQueryStringSetVar('func', 'main');
    } elseif (!in_array($args['vars'][2], $funcs)) {
        pnQueryStringSetVar('func', 'display');
        $nextvar = 2;
    } else {
        pnQueryStringSetVar('func', $args['vars'][2]);
        $nextvar = 3;
    }

    // add the category info
    if (FormUtil::getPassedValue('func') == 'view' && isset($args['vars'][$nextvar])) {
        // get rid of unused vars
        $args['vars'] = array_slice($args['vars'], $nextvar);
        pnQueryStringSetVar('prop', (string)$args['vars'][0]);

        if (isset ($args['vars'][1])) {
            // check if there's a page arg
            $varscount = count($args['vars']);
            ($args['vars'][$varscount-2] == 'page') ? $pagersize = 2 : $pagersize = 0;
            // extract the category path
            $cat = implode('/', array_slice($args['vars'], 1, $varscount - $pagersize - 1));
            pnQueryStringSetVar('cat', $cat);
        }
    }

    // identify the correct parameter to identify the page
    if (FormUtil::getPassedValue('func') == 'display') {
        if (pnModGetVar('FAQ', 'addcategorytitletopermalink') && !empty($args['vars'][$nextvar+1])) {
            $nextvar++;
        }
        if (is_numeric($args['vars'][$nextvar])) {
            pnQueryStringSetVar('faqid', $args['vars'][$nextvar]);
        } else {
            pnQueryStringSetVar('title', $args['vars'][$nextvar]);
        }
    }

    return true;
}

/**
 * get meta data for the module
 *
 */
function FAQ_userapi_getmodulemeta()
{
   return array('viewfunc'    => 'view',
                'displayfunc' => 'display',
                'newfunc'     => 'new',
                'createfunc'  => 'create',
                'modifyfunc'  => 'modify',
                'updatefunc'  => 'update',
                'deletefunc'  => 'delete',
                'titlefield'  => 'question',
                'itemid'      => 'faqid');
}
