<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 411 2010-04-23 16:02:49Z yokav $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Pages
 */

/**
 * get a specific item
 * @param $args['pageid'] id of example item to get
 * @return mixed item array, or false on failure
 */
function Pages_userapi_get($args)
{
    // Argument check
    if ((!isset($args['pageid']) || !is_numeric($args['pageid'])) &&
         !isset($args['title'])) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('Pages');

    // check for the parse parameter
    if (!isset($args['parse']) || !is_bool($args['parse']))  {
        $args['parse'] = false;
    }

    // define the permission filter to apply
    $permFilter   = array();
    $permFilter[] = array('component_left'  => 'Pages',
                          'instance_left'   => 'title',
                          'instance_right'  => 'pageid',
                          'level'           => ACCESS_READ);

    if (isset($args['pageid']) && is_numeric($args['pageid'])) {
        $item = DBUtil::selectObjectByID('pages', $args['pageid'], 'pageid', '', $permFilter);
    } else {
        $item = DBUtil::selectObjectByID('pages', $args['title'], 'urltitle', '', $permFilter);
    }

    // need to do this here as the category expansion code can't know the
    // root category which we need to build the relative path component
    if ($item && isset($args['catregistry']) && $args['catregistry']) {
        if (!Loader::loadClass('CategoryUtil')) {
            pn_exit(__f('Error! Unable to load class [%s]', 'CategoryUtil', $dom));
        }
        ObjectUtil::postProcessExpandedObjectCategories($item, $args['catregistry']);
    }

    if (pnModGetVar('Pages', 'enablecategorization') && !empty($item['__CATEGORIES__'])) {
        if (!CategoryUtil::hasCategoryAccess($item['__CATEGORIES__'], 'Pages')) {
            return false;
        }
    }

    // if the parse parameter was true lets get the template source using our custom resource
    if ($args['parse']) {
        $render = & pnRender::getInstance('Pages');
        $render->force_compile = true;
        //$render->register_resource('pagesvar');
        $resourceid = 'pagesitem'.$item['pageid'].$item['language'];
        $GLOBALS[$resourceid] =& $item['content'];
        $item['content'] = $render->fetch("pagesvar:$resourceid", $item['pageid'], $item['pageid']);
    }

    return $item;
}

/**
 * get all pages
 * @return mixed array of items, or false on failure
 */
function Pages_userapi_getall($args)
{
    // Optional arguments.
    if (!isset($args['startnum']) || empty($args['startnum'])) {
        $args['startnum'] = 0;
    }
    if (!isset($args['numitems']) || empty($args['numitems'])) {
        $args['numitems'] = -1;
    }
    if (!isset($args['ignoreml']) || !is_bool($args['ignoreml'])) {
        $args['ignoreml'] = false;
    }
    if (!isset($args['language'])) {
        $args['language'] = null;
    }
    if (!isset($args['category'])) {
        $args['category'] = null;
    }

    if (!is_numeric($args['startnum']) ||
        !is_numeric($args['numitems'])) {
        return LogUtil::registerArgsError();
    }

    // Security check
    if (!SecurityUtil::checkPermission('Pages::', '::', ACCESS_READ)) {
        return array();
    }

    $dom = ZLanguage::getModuleDomain('Pages');

    $args['catFilter'] = array();
    if (isset($args['category']) && !empty($args['category'])){
        if (is_array($args['category'])) { 
            $args['catFilter'] = $args['category'];
        } elseif (isset($args['property'])) {
            $property = $args['property'];
            $args['catFilter'][$property] = $args['category'];
        }
        $args['catFilter']['__META__'] = array('module' => 'Pages');
    }

    // populate an array with each part of the where clause and then implode the array if there is a need.
    // credit to Jorg Napp for this technique - markwest
    $pntable = pnDBGetTables();
    $pagescolumn = $pntable['pages_column'];
    $queryargs = array();
    if (pnConfigGetVar('multilingual') == 1 && !$args['ignoreml'] && $args['language']) {
        $queryargs[] = "$pagescolumn[language] = '" . DataUtil::formatForStore($args['language']) . "'";
    }

    $where = null;
    if (count($queryargs) > 0) {
        $where = ' WHERE ' . implode(' AND ', $queryargs);
    }

    // define the permission filter to apply
    $permFilter   = array();
    $permFilter[] = array('component_left'  => 'Pages',
                          'instance_left'   => 'title',
                          'instance_right'  => 'pageid',
                          'level'           => ACCESS_READ);

    $orderby = $pagescolumn['pageid'];

    if (isset($args['order']) && !empty($args['order'])) {
         $order = $args['order'];

         $p = strpos($order, ' '); 
         if ($p > 0) { 
             $f = strtolower(StringUtil::left($order, $p));
             $orderDirection = strtolower(substr($order, $p + 1));
             if ($orderDirection != 'asc' && $orderDirection != 'desc') {
                 $orderDirection = 'desc';
             }
            $orderby = $pagescolumn[$f] . ' ' . $orderDirection; 
        } else { 
             $orderby = $pagescolumn[strtolower($order)]; 
        }
    }    

    // get the objects from the db
    $objArray = DBUtil::selectObjectArray('pages', $where, $orderby, $args['startnum']-1, $args['numitems'], '', $permFilter, $args['catFilter']);

    // check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($objArray === false) {
        return LogUtil::registerError(__('Error! Could not load any page.', $dom));
    }

    // need to do this here as the category expansion code can't know the
    // root category which we need to build the relative path component
     if ($objArray && isset($args['catregistry']) && $args['catregistry']) {
        if (!Loader::loadClass('CategoryUtil')) {
            pn_exit(__f('Error! Unable to load class [%s]', 'CategoryUtil', $dom));
        }
        ObjectUtil::postProcessExpandedObjectArrayCategories($objArray, $args['catregistry']);
    }

    // return the items
    return $objArray;
}

/**
 * utility function to count the number of items held by this module
 * @return integer number of items held by this module
 */
function Pages_userapi_countitems($args)
{
    $args['catFilter'] = array();

    if (isset($args['category']) && !empty($args['category'])){
        if (is_array($args['category'])) { 
            $args['catFilter'] = $args['category'];
        } elseif (isset($args['property'])) {
            $property = $args['property'];
            $args['catFilter'][$property] = $args['category'];
        }
        $args['catFilter']['__META__'] = array('module' => 'Pages');
    }

    // return the number of items
    return DBUtil::selectObjectCount('pages', '', 'pageid', false, $args['catFilter']);
}

/**
 * increment the item read count
 * @author Mark West
 * @return bool true on success, false on failiure
 */
function Pages_userapi_incrementreadcount($args)
{
    if ((!isset($args['pageid']) || !is_numeric($args['pageid'])) &&
         !isset($args['title'])) {
        return LogUtil::registerArgsError();
    }

    if (isset($args['pageid'])) {
        return DBUtil::incrementObjectFieldByID('pages', 'counter', $args['pageid'], 'pageid');
    } else {
        return DBUtil::incrementObjectFieldByID('pages', 'counter', $args['title'], 'urltitle');
    }
}

/**
 * form custom url string
 *
 * @author Mark West
 * @return string custom url string
 */
function Pages_userapi_encodeurl($args)
{
    // check we have the required input
    if (!isset($args['modname']) || !isset($args['func']) || !isset($args['args'])) {
        return LogUtil::registerArgsError();
    }

    if (!isset($args['type'])) {
        $args['type'] = 'user';
    }

    // create an empty string ready for population
    $vars = '';

    // view function
    if ($args['func'] == 'view' && isset($args['args']['prop'])) {
        $vars = $args['args']['prop'];
        if (isset($args['args']['cat'])) {
            $vars .= '/'.$args['args']['cat'];
        }
        if (isset($args['args']['startnum']) && $args['args']['startnum'] != 1) {
            $vars .= (empty($vars) ? '' : '/').'startnum/'.$args['args']['startnum'];
        }
    }

    // for the display function use either the title (if present) or the page id
    if ($args['func'] == 'display') {
        // check for the generic object id parameter
        if (isset($args['args']['objectid'])) {
            $args['args']['pageid'] = $args['args']['objectid'];
        }
        // get the item (will be cached by DBUtil)
        if (isset($args['args']['pageid'])) {
            $item = pnModAPIFunc('Pages', 'user', 'get', array('pageid' => $args['args']['pageid']));
        } else {
            $item = pnModAPIFunc('Pages', 'user', 'get', array('title' => $args['args']['title']));
        }
        if (pnModGetVar('Pages', 'addcategorytitletopermalink') && isset($args['args']['cat'])) {
            $vars = $args['args']['cat'].'/'.$item['urltitle'];
        } else { 
            $vars = $item['urltitle'];
        }
        if (isset($args['args']['page']) && $args['args']['page'] != 1) {
            $vars .= '/page/'.$args['args']['page'];
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
function Pages_userapi_decodeurl($args)
{
    // check we actually have some vars to work with...
    if (!isset($args['vars'])) {
        return LogUtil::registerArgsError();
    }

    // define the available user functions
    $funcs = array('main', 'view', 'display');
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
            ($args['vars'][$varscount-2] == 'startnum') ? $pagersize = 2 : $pagersize = 0;
            pnQueryStringSetVar('startnum', $args['vars'][$varscount-1]);
            // extract the category path
            $cat = implode('/', array_slice($args['vars'], 1, $varscount - $pagersize - 1));
            pnQueryStringSetVar('cat', $cat);
        }
    }

    // identify the correct parameter to identify the page
    if (FormUtil::getPassedValue('func') == 'display') {
        // get rid of unused vars
        $args['vars'] = array_slice($args['vars'], $nextvar);
        $nextvar = 0;
        // remove any category path down to the leaf category
        $varscount = count($args['vars']);
        if (pnModGetVar('Pages', 'addcategorytitletopermalink') && !empty($args['vars'][$nextvar+1])) {
            ($args['vars'][$varscount-2] == 'page') ? $pagersize = 2 : $pagersize = 0;
            $category = array_slice($args['vars'], 0, $varscount - 1 - $pagersize);
            pnQueryStringSetVar('cat', implode('/',$category));
            array_splice($args['vars'], 0,  $varscount - 1 - $pagersize);
        }
        if (is_numeric($args['vars'][$nextvar])) {
            pnQueryStringSetVar('pageid', $args['vars'][$nextvar]);
        } else {
            pnQueryStringSetVar('title', $args['vars'][$nextvar]);
        }
        $nextvar++;
        if (isset($args['vars'][$nextvar]) && $args['vars'][$nextvar] == 'page') {
            pnQueryStringSetVar('page', (int)$args['vars'][$nextvar+1]);
        }
    }

    return true;
}

/**
 * get meta data for the module
 */
function Pages_userapi_getmodulemeta()
{
   return array('viewfunc'    => 'view',
                'displayfunc' => 'display',
                'newfunc'     => 'new',
                'createfunc'  => 'create',
                'modifyfunc'  => 'modify',
                'updatefunc'  => 'update',
                'deletefunc'  => 'delete',
                'titlefield'  => 'title',
                'itemid'      => 'pageid');
}
