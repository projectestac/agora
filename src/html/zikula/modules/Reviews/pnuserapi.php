<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 372 2009-12-05 20:29:56Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Reviews
 */

/**
 * get a specific review
 *
 * @param $args['id'] id of review to get
 * @return mixed item array, or false on failure
 */
function Reviews_userapi_get($args)
{
    // argument check
    if ((!isset($args['id']) || !is_numeric($args['id'])) &&
         !isset($args['title'])) {
        return LogUtil::registerArgsError();
    }

    // define the permission filter to apply
    $permFilter   = array();
    $permFilter[] = array('component_left'  => 'Reviews',
                          'component_right' => 'Item',
                          'instance_left'   => 'title',
                          'instance_right'  => 'id',
                          'level'           => ACCESS_READ);

    if (isset($args['id']) && is_numeric($args['id'])) {
        return DBUtil::selectObjectByID('reviews', $args['id'], 'id', '', $permFilter);
    } else {
        return DBUtil::selectObjectByID('reviews', $args['title'], 'urltitle', '', $permFilter);
    }
}

/**
 * get all reviews
 *
 * @return mixed array of items, or false on failure
 */
function Reviews_userapi_getall($args)
{
    $dom = ZLanguage::getModuleDomain('Reviews');

    // optional arguments.
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
    if (!isset($args['order'])) {
        $args['order'] = 'id';
    }
    if (!isset($args['category'])) {
        $args['category'] = null;
    }

    if (!is_numeric($args['startnum']) ||
        !is_numeric($args['numitems'])) {
        return LogUtil::registerArgsError();
    }

    $args['catFilter'] = array();
    if (isset($args['category']) && !empty($args['category'])){
        if (is_array($args['category'])) { 
            $args['catFilter'] = $args['category'];
        } elseif (isset($args['property'])) {
            $property = $args['property'];
            $args['catFilter'][$property] = $args['category'];
        }
        $args['catFilter']['__META__'] = array('module' => 'Reviews');
    }

    // security check
    if (!SecurityUtil::checkPermission('Reviews::', '::', ACCESS_READ)) {
        return array();
    }

    // define the permission filter to apply
    $permFilter   = array();
    $permFilter[] = array('component_left'  => 'Reviews',
                          'component_right' => 'Item',
                          'instance_left'   => 'title',
                          'instance_right'  => 'id',
                          'level'           => ACCESS_READ);

    // get database setup
    $pntable = pnDBGetTables();
    $columns = $pntable['reviews_column'];

    $whereargs = array();
    // check and form where clause
    if (isset($args['letter'])) {
        $whereargs[] = "$columns[title] LIKE '" . DataUtil::formatForStore($args['letter']) . "%'";
    }
    if (pnConfigGetVar('multilingual') == 1 && !$args['ignoreml'] && $args['language']) {
        $whereargs[] = "($columns[language] = '" . DataUtil::formatForStore($args['language']) . "' OR $columns[language] = '')";
    }

    // construct the where statements
    $where = '';
    if (count($whereargs) > 0) {
        $where = ' WHERE ' . implode(' AND ', $whereargs);
    }

    // get the objects from the db
    $objArray = DBUtil::selectObjectArray('reviews', $where, $args['order'], $args['startnum']-1, $args['numitems'], '', $permFilter, $args['catFilter']);

    // check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($objArray === false) {
        return LogUtil::registerError(__('Error! Could not load items.', $dom));
    }

    // need to do this here as the category expansion code can't know the
    // root category which we need to build the relative path component
    if (pnModGetVar('Reviews', 'enablecategorization') && $objArray && isset($args['catregistry']) && $args['catregistry']) {
        ObjectUtil::postProcessExpandedObjectArrayCategories ($objArray, $args['catregistry']);
    }

    // return the items
    return $objArray;
}

/**
 * utility function to count the number of items held by this module
 *
 * @return integer number of items held by this module
 */
function Reviews_userapi_countitems($args)
{
    // security check
    if (!SecurityUtil::checkPermission('Reviews::', '::', ACCESS_READ)) {
        return 0;
    }

    $args['catFilter'] = array();

    if ($args['category']){
        if (is_array($args['category'])) {
            $args['catFilter'] = $args['category'];
        } else {
            $args['catFilter'][] = $args['category'];
        }
        $args['catFilter']['__META__'] = array('module' => 'Reviews');
    }

    // Get optional arguments a build the where conditional
    // Credit to Jorg Napp for this superb technique.
    $pntable = pnDBGetTables();
    $columns = $pntable['reviews_column'];

    $queryargs = array();
    if (isset($args['letter'])) {
        $queryargs[] = "$columns[title] LIKE '" . DataUtil::formatForStore($args['letter']) . "%'";
    }

    $where = '';
    if (count($queryargs) > 0) {
        $where = ' WHERE ' . implode(' AND ', $queryargs);
    }

    // Return the number of items
    return DBUtil::selectObjectCount('reviews', $where, 'id', false, $args['catFilter']);
}

/**
 * increment the item read count
 * @author Mark West
 * @return bool true on success, false on failiure
 */
function Reviews_userapi_incrementreadcount($args)
{
    if ((!isset($args['id']) || !is_numeric($args['id'])) &&
         !isset($args['title'])) {
        return LogUtil::registerArgsError();
    }

    if (isset($args['id'])) {
        return DBUtil::incrementObjectFieldByID('reviews', 'hits', $args['id'], 'id');
    } else {
        return DBUtil::incrementObjectFieldByID('reviews', 'hits', $args['title'], 'urltitle');
    }
}

/**
 * create a new Reviews item
 *
 * @param $args['name'] name of the item
 * @param $args['number'] number of the item
 * @return mixed Reviews item ID on success, false on failure
 */
function Reviews_userapi_create($args)
{
    $dom = ZLanguage::getModuleDomain('Reviews');

    // Argument check
    if ((!isset($args['title'])) ||
        (!isset($args['text'])) ||
        (!isset($args['reviewer'])) ||
        (!isset($args['email']))) {
        return LogUtil::registerArgsError();
    }

    // Security check
    if (!SecurityUtil::checkPermission('Reviews::', "$args[title]::", ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }

    // set some defaults
    if (!isset($args['language'])) {
        $args['language'] = '';
    }

    // define the permalink title if not present
    if (!isset($args['urltitle']) || empty($args['urltitle'])) {
        $args['urltitle'] = DataUtil::formatPermalink($args['title']);
    }

    // insert object to db
    if (!DBUtil::insertObject($args, 'reviews', 'id')) {
        return LogUtil::registerError(__('Error! Creation attempt failed.', $dom));
    }

    // Let any hooks know that we have created a new item
    pnModCallHooks('item', 'create', $args['id'], array('module' => 'Reviews'));

    // Return the id of the newly created item to the calling process
    return $args['id'];
}

/**
 * form custom url string
 *
 * @author Mark West
 * @return string custom url string
 */
function Reviews_userapi_encodeurl($args)
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
    if ($args['func'] == 'view') {
        // category list
        if (isset($args['args']['prop'])) {
            $vars = $args['args']['prop'];
            if (isset($args['args']['cat'])) {
                $vars .= '/'.$args['args']['cat'];
            }
        // letter list
        } elseif (isset($args['args']['letter'])) {
            $vars = 'letter/'.$args['args']['letter'];
        }
        if (isset($args['args']['page']) && $args['args']['page'] != 1) {
            $vars .= (empty($vars) ? '' : '/').'page/'.$args['args']['page'];
        }
    }

    // for the display function use either the title (if present) or the page id
    if ($args['func'] == 'display') {
        // check for the generic object id parameter
        if (isset($args['args']['objectid'])) {
            $args['args']['id'] = $args['args']['objectid'];
        }
        // get the item (will be cached by DBUtil)
        if (isset($args['args']['id'])) {
            $item = pnModAPIFunc('Reviews', 'user', 'get', array('id' => $args['args']['id']));
        } else {
            $item = pnModAPIFunc('Reviews', 'user', 'get', array('title' => $args['args']['title']));
        }
        if (pnModGetVar('Reviews', 'addcategorytitletopermalink') && isset($args['args']['cat'])) {
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
function Reviews_userapi_decodeurl($args)
{
    // check we actually have some vars to work with...
    if (!isset($args['vars'])) {
        return LogUtil::registerArgsError();
    }

    // define the available user functions
    $funcs = array('main', 'view', 'display', 'new', 'create');
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

    // check the list function
    if (FormUtil::getPassedValue('func') == 'view' && isset($args['vars'][$nextvar])) {
        // get rid of unused vars
        $args['vars'] = array_slice($args['vars'], $nextvar);

        // check if the letter parameter is present
        if ($args['vars'][0] == 'letter') {
            pnQueryStringSetVar('letter', (string)$args['vars'][1]);
            $nextvar = 2;
        } elseif ($args['vars'][0] == 'page') {
            pnQueryStringSetVar('page', (int)$args['vars'][1]);
            $nextvar = 0;
        } else {
            // add the category info
            pnQueryStringSetVar('prop', (string)$args['vars'][0]);
            $nextvar = 1;

            if (isset ($args['vars'][1])) {
                // check if there's a page arg
                $varscount = count($args['vars']);
                ($args['vars'][$varscount-2] == 'page') ? $pagersize = 2 : $pagersize = 0;
                // extract the category path
                $cat = implode('/', array_slice($args['vars'], 1, $varscount - $pagersize - 1));
                pnQueryStringSetVar('cat', $cat);
                $nextvar = 2;
            }
        }
        if (isset($args['vars'][$nextvar]) && $nextvar != 0 && $args['vars'][$nextvar] == 'page') {
            pnQueryStringSetVar('page', (int)$args['vars'][$nextvar+1]);
        }
    }

    // identify the correct parameter to identify the page
    if (FormUtil::getPassedValue('func') == 'display') {
        // get rid of unused vars
        $args['vars'] = array_slice($args['vars'], $nextvar);
        $nextvar = 0;
        // remove any category path down to the leaf category
        $varscount = count($args['vars']);
        if (pnModGetVar('Reviews', 'addcategorytitletopermalink') && !empty($args['vars'][$nextvar+1])) {
            ($args['vars'][$varscount-2] == 'page') ? $pagersize = 2 : $pagersize = 0;
            $category = array_slice($args['vars'], 0, $varscount - 1 - $pagersize);
            pnQueryStringSetVar('cat', implode('/',$category));
            array_splice($args['vars'], 0,  $varscount - 1 - $pagersize);
        }
        if (is_numeric($args['vars'][$nextvar])) {
            pnQueryStringSetVar('id', $args['vars'][$nextvar]);
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
function Reviews_userapi_getmodulemeta()
{
   return array('viewfunc'    => 'view',
                'displayfunc' => 'display',
                'newfunc'     => 'new',
                'createfunc'  => 'create',
                'modifyfunc'  => 'modify',
                'updatefunc'  => 'update',
                'deletefunc'  => 'delete',
                'titlefield'  => 'title',
                'itemid'      => 'id');
}
