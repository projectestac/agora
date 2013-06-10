<?php
/**
 * Copyright Pages Team 2012
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Pages
 * @link https://github.com/zikula-modules/Pages
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

class Pages_Api_User extends Zikula_AbstractApi
{
    /**
     * get a specific item
     *
     * @param $args['pageid'] id of example item to get
     *
     * @return mixed item array, or false on failure
     */
    public function get($args)
    {
        // Argument check
        if ((!isset($args['pageid']) || !is_numeric($args['pageid'])) &&
                !isset($args['title'])) {
            return LogUtil::registerArgsError();
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
            ObjectUtil::postProcessExpandedObjectCategories($item, $args['catregistry']);
        }

        if (ModUtil::getVar('Pages', 'enablecategorization') && !empty($item['__CATEGORIES__'])) {
            if (!CategoryUtil::hasCategoryAccess($item['__CATEGORIES__'], 'Pages')) {
                return false;
            }
        }

        return $item;
    }

    /**
     * get all pages
     *
     * @param array $args Arguments array.
     *
     * @return mixed array of items, or false on failure
     */
    public function getall($args)
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

        if (!is_numeric($args['startnum']) || !is_numeric($args['numitems'])) {
            return LogUtil::registerArgsError();
        }

        // Security check
        if (!SecurityUtil::checkPermission('Pages::', '::', ACCESS_READ)) {
            return array();
        }

        $catFilter = array();
        if (isset($args['category']) && !empty($args['category'])) {
            if (is_array($args['category'])) {
                $catFilter = $args['category'];
            } elseif (isset($args['property'])) {
                $property = $args['property'];
                $catFilter[$property] = $args['category'];
            }
            $catFilter['__META__'] = array('module' => 'Pages');
        } elseif (isset($args['catfilter'])) {
            $catFilter = $args['catfilter'];
        }

        // populate an array with each part of the where clause and then implode the array if there is a need.
        // credit to Jorg Napp for this technique - markwest
        $table = DBUtil::getTables();
        $pagescolumn = $table['pages_column'];
        $queryargs = array();
        if (System::getVar('multilingual') == 1 && !$args['ignoreml'] && $args['language']) {
            $queryargs[] = '(' . $pagescolumn['language'] . ' = "' . DataUtil::formatForStore($args['language']) . '"'
                    .' OR ' . $pagescolumn['language'] . ' = "")';
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
            $orderby = $pagescolumn[strtolower($args['order'])];
        }
        $orderdir = 'DESC';
        if (isset($args['orderdir']) && !empty($args['orderdir'])) {
            $orderdir = $args['orderdir'];
        }
        $orderby = $orderby . ' ' . $orderdir;

        // get the objects from the db
        $objArray = DBUtil::selectObjectArray(
            'pages',
            $where,
            $orderby,
            $args['startnum']-1,
            $args['numitems'],
            '',
            $permFilter,
            $catFilter
        );

        // check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($objArray === false) {
            return LogUtil::registerError($this->__('Error! Could not load any page.'));
        }

        // need to do this here as the category expansion code can't know the
        // root category which we need to build the relative path component
        if ($objArray && isset($args['catregistry']) && $args['catregistry']) {
            ObjectUtil::postProcessExpandedObjectArrayCategories($objArray, $args['catregistry']);
        }

        // return the items
        return $objArray;
    }

    /**
     * utility function to count the number of items held by this module
     *
     *
     *
     * @return integer number of items held by this module
     */
    public function countitems($args)
    {
        $catFilter = array();
        if (isset($args['category']) && !empty($args['category'])){
            if (is_array($args['category'])) {
                $catFilter = $args['category'];
            } elseif (isset($args['property'])) {
                $property = $args['property'];
                $catFilter[$property] = $args['category'];
            }
            $catFilter['__META__'] = array('module' => 'Pages');
        } elseif (isset($args['catfilter'])) {
            $catFilter = $args['catfilter'];
        }

        // return the number of items
        return DBUtil::selectObjectCount('pages', '', 'pageid', false, $catFilter);
    }

    /**
     * increment the item read count
     * @author Mark West
     * @return bool true on success, false on failiure
     */
    public function incrementreadcount($args)
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
     * @param array $args Arguments array.
     *
     * @return string custom url string
     */
    public function encodeurl($args)
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
                $item = ModUtil::apiFunc('Pages', 'user', 'get', array('pageid' => $args['args']['pageid']));
            } else {
                $item = ModUtil::apiFunc('Pages', 'user', 'get', array('title' => $args['args']['title']));
            }
            if (ModUtil::getVar('Pages', 'addcategorytitletopermalink') && isset($args['args']['cat'])) {
                $vars = $args['args']['cat'].'/'.$item['urltitle'];
            } else {
                $vars = $item['urltitle'];
            }
            if (isset($args['args']['page']) && $args['args']['page'] != 1) {
                $vars .= '/page/'.$args['args']['page'];
            }
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
     * @param array $args Arguments array.
     *
     * @return bool true if successful, false otherwise
     */
    public function decodeurl($args)
    {
        // check we actually have some vars to work with...
        if (!isset($args['vars'])) {
            return LogUtil::registerArgsError();
        }

        // define the available user functions
        $funcs = array('main', 'view', 'display');
        // set the correct function name based on our input
        if (empty($args['vars'][2])) {
            System::queryStringSetVar('func', 'main');
        } elseif (!in_array($args['vars'][2], $funcs)) {
            System::queryStringSetVar('func', 'display');
            $nextvar = 2;
        } else {
            System::queryStringSetVar('func', $args['vars'][2]);
            $nextvar = 3;
        }

        // add the category info
        if (FormUtil::getPassedValue('func') == 'view' && isset($args['vars'][$nextvar])) {
            // get rid of unused vars
            $args['vars'] = array_slice($args['vars'], $nextvar);
            System::queryStringSetVar('prop', (string)$args['vars'][0]);
            if (isset ($args['vars'][1])) {
                // check if there's a page arg
                $varscount = count($args['vars']);
                ($args['vars'][$varscount-2] == 'startnum') ? $pagersize = 2 : $pagersize = 0;
                System::queryStringSetVar('startnum', $args['vars'][$varscount-1]);
                // extract the category path
                $cat = implode('/', array_slice($args['vars'], 1, $varscount - $pagersize - 1));
                System::queryStringSetVar('cat', $cat);
            }
        }

        // identify the correct parameter to identify the page
        if (FormUtil::getPassedValue('func') == 'display') {
            // get rid of unused vars
            $args['vars'] = array_slice($args['vars'], $nextvar);
            $nextvar = 0;
            // remove any category path down to the leaf category
            $varscount = count($args['vars']);
            if (ModUtil::getVar('Pages', 'addcategorytitletopermalink') && !empty($args['vars'][$nextvar+1])) {
                ($args['vars'][$varscount-2] == 'page') ? $pagersize = 2 : $pagersize = 0;
                $category = array_slice($args['vars'], 0, $varscount - 1 - $pagersize);
                System::queryStringSetVar('cat', implode('/',$category));
                array_splice($args['vars'], 0, $varscount - 1 - $pagersize);
            }
            if (is_numeric($args['vars'][$nextvar])) {
                System::queryStringSetVar('pageid', $args['vars'][$nextvar]);
            } else {
                System::queryStringSetVar('title', $args['vars'][$nextvar]);
            }
            $nextvar++;
            if (isset($args['vars'][$nextvar]) && $args['vars'][$nextvar] == 'page') {
                System::queryStringSetVar('page', (int)$args['vars'][$nextvar+1]);
            }
        }

        return true;
    }

    /**
     * get meta data for the module
     *
     * @return array
     */
    public function getmodulemeta()
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

    /**
     * Clear cache for given item. Can be called from other modules to clear an item cache.
     *
     * @param $item - the item: array with data or id of the item
     */
    public function clearItemCache($item)
    {
        if ($item && !is_array($item)) {
            $item = ModUtil::apiFunc('Pages', 'user', 'get', array('sid' => $item));
        }
        if ($item) {
            // Clear View_cache
            $cache_ids = array();
            $cache_ids[] = $item['sid'];
            $cache_ids[] = 'view';
            $cache_ids[] = 'main';
            $view = Zikula_View::getInstance('Pages');
            foreach ($cache_ids as $cache_id) {
                $view->clear_cache(null, $cache_id);
            }

            // Clear Theme_cache
            $cache_ids = array();
            $cache_ids[] = 'Pages/user/display/pageid_'.$item['pageid']; // for given page Id, according to new cache_id structure in Zikula 1.3.2.dev (1.3.3)
            $cache_ids[] = 'homepage'; // for homepage (it can be adjustment in module settings)
            $cache_ids[] = 'Pages/user/view'; // view function (pages list)
            $cache_ids[] = 'Pages/user/main'; // main function
            $theme = Zikula_View_Theme::getInstance();
            //if (Zikula_Core::VERSION_NUM > '1.3.2') {
            if (method_exists($theme, 'clear_cacheid_allthemes')) {
                $theme->clear_cacheid_allthemes($cache_ids);
            } else {
                // clear cache for current theme only
                foreach ($cache_ids as $cache_id) {
                    $theme->clear_cache(null, $cache_id);
                }
            }
        }
    }

}