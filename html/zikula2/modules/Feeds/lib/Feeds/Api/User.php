<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

class Feeds_Api_User extends Zikula_AbstractApi
{
    /**
     * get all feeds feeds
     * @return mixed array of items, or false on failure
     */
    public function getall($args)
    {
        // Optional arguments.
        if (!isset($args['startnum']) || !is_numeric($args['startnum'])) {
            $args['startnum'] = 0;
        }
        if (!isset($args['numitems']) || !is_numeric($args['numitems'])) {
            $args['numitems'] = -1;
        }
        if (!isset($args['category'])) {
            $args['category'] = null;
        }

        if (!is_numeric($args['startnum']) ||
                !is_numeric($args['numitems'])) {
            return LogUtil::registerArgsError();
        }

        $items = array();

        // Security check
        if (!SecurityUtil::checkPermission( 'Feeds::', '::', ACCESS_READ)) {
            return $items;
        }

        $args['catFilter'] = array();
        if (isset($args['category']) && !empty($args['category'])){
            if (is_array($args['category'])) {
                $args['catFilter'] = $args['category'];
            } elseif (isset($args['property'])) {
                $property = $args['property'];
                $args['catFilter'][$property] = $args['category'];
            }
            $args['catFilter']['__META__'] = array('module' => 'Feeds');
        }

        // define the permission filter to apply
        $permFilter = array(array('realm'           => 0,
                        'component_left'  => 'Feeds',
                        'component_right' => 'item',
                        'instance_left'   => 'name',
                        'instance_right'  => 'fid',
                        'level'           => ACCESS_READ));

        $orderby = null;
        if (!empty($args['order'])) {
            $dbtable = DBUtil::getTables();
            $feedscolumn = $dbtable['feeds_column'];
            $orderby = $feedscolumn[$args['order']].' DESC';
        }

        // get the objects from the db
        $objArray = DBUtil::selectObjectArray('feeds', '', 'fid', $args['startnum']-1, $args['numitems'], '', $permFilter, $args['catFilter']);

        if ($objArray === false) {
            return LogUtil::registerError(__('Error! Could not load any Feed.'));
        }

        // need to do this here as the category expansion code can't know the
        // root category which we need to build the relative path component
        if ($objArray && isset($args['catregistry']) && $args['catregistry']) {
            ObjectUtil::postProcessExpandedObjectArrayCategories($objArray, $args['catregistry']);
        }

        // Return the items
        return $objArray;
    }

    /**
     * get a specific item
     * @param $args['fid'] id of example item to get
     * @return mixed item array, or false on failure
     */
    public function get($args)
    {
        // optional arguments
        if (isset($args['objectid'])) {
            $args['fid'] = $args['objectid'];
        }

        if ((!isset($args['fid']) || !is_numeric($args['fid'])) &&
                !isset($args['title'])) {
            return LogUtil::registerArgsError();
        }

        // define the permission filter to apply
        $permFilter = array(array('realm'           => 0,
                        'component_left'  => 'Feeds',
                        'component_right' => 'item',
                        'instance_left'   => 'name',
                        'instance_right'  => 'fid',
                        'level'           => ACCESS_READ));

        if (isset($args['fid']) && is_numeric($args['fid'])) {
            return DBUtil::selectObjectByID('feeds', $args['fid'], 'fid', '', $permFilter);
        } else {
            return DBUtil::selectObjectByID('feeds', $args['title'], 'urltitle', '', $permFilter);
        }
    }

    /**
     * utility function to count the url of items held by this module
     *
     * @return integer count of items held by this module
     */
    public function countitems($args)
    {
        $args['catFilter'] = array();
        if (isset($args['category']) && !empty($args['category'])){
            if (is_array($args['category'])) {
                $args['catFilter'] = $args['category'];
            } elseif (isset($args['property'])) {
                $property = $args['property'];
                $args['catFilter'][$property] = $args['category'];
            }
            $args['catFilter']['__META__'] = array('module' => 'Feeds');
        }

        return DBUtil::selectObjectCount('feeds', '', 'fid', false, $args['catFilter']);
    }

    /**
     * Get Feeds via SimplePie
     *
     * @param integer fid feed id (not required if feed url is present)
     * @param string  furl feed url or urls for Multifeed request (not requred if feed id is present)
     * @param integer limit set how many items are returned per feed with Multifeeds (default is all)
     * @param integer cron  set to 1 to update all caches right now (default is 0, update cache only if needed)
     * @return mixed item array containing total item count, error information, and object with all the requested feeds
     */
    public function getfeed($args)
    {
        // Argument check
        if ((!isset($args['fid']) || !is_numeric($args['fid']))
                && (!isset($args['furl']) || (!is_string($args['furl']) && (!is_array($args['furl']))))) {
            return LogUtil::registerArgsError();
        }

        // Optional arguments.
        if (!isset($args['limit']) || !is_numeric($args['limit'])) {
            $args['limit'] = 0;  // 0 = don't set a limit
        }
        if (!isset($args['cron']) || !is_numeric($args['cron'])) {
            $args['cron'] = 0;  // not a cron job update
        } else {
            $args['cron'] = 1;  // it is a cron job update
        }

        // get all module vars for later use
        $modvars = $this->getVars();

        // check if the feed id is set, grab the feed from the db
        if (isset($args['fid'])) {
            $feed = ModUtil::apiFunc('Feeds', 'user', 'get', array('fid' => $args['fid']));
            $url = $feed['url'];
        } elseif(isset($args['furl'])) {
            $url = $args['furl'];
        }

        // Now setup SimplePie for the feed
        $theFeed = new SimplePieFeed();
        $theFeed->set_feed_url($url);
        $theFeed->set_cache_location(CacheUtil::getLocalDir($modvars['cachedirectory']));
        $theFeed->enable_order_by_date(true);

        // Get the charset used for the output, and tell SimplePie about it so it will try to use the same for its output
        $charset = ZLanguage::getDBCharset();
        if ($charset != '') {
            $theFeed->set_output_encoding($charset);
        }

        // Set the feed limits (note: this is a per feed limit that applies if multiple feeds are used)
        if ($args['limit'] > 0) {
            $theFeed->set_item_limit($args['limit']);
        }

        // Set Cache Duration
        if ($args['cron'] == 1) {
            $theFeed->set_cache_duration(0);          // force cache to update immediately (a cron job needs to do that)

        } elseif ($modvars['usingcronjob'] == 1) {   // Using a cron job to update the cache (but not this time), so per SimplePie docs...
            $theFeed->set_cache_duration(999999999);  // set to 999999999 to not update the cache with this request
            $theFeed->set_timeout(-1);                // set timeout to -1 to prevent SimplePie from retrying previous failed feeds

        } else {
            $theFeed->set_cache_duration($modvars['cacheinterval']);  // Use the specified cache interval.
        }

        // tell SimplePie to go and do its thing
        $theFeed->init();

        $returnFeed['count'] = $theFeed->get_item_quantity(); // total items returned
        $returnFeed['error'] = $theFeed->error();             // Return any errors
        $returnFeed['feed']  = $theFeed;                      // The feed information

        // Per SimplePie documentation, there is a bug in versions of PHP older than 5.3 where PHP doesn't release memory properly in certain cases.
        // This is the workaround
        $theFeed->__destruct();
        unset($theFeed);

        return $returnFeed;
    }

    /**
     * form custom url string
     *
     * @author Mark West
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
            if (isset($args['args']['startnum'])) {
                $vars .= '/startnum/'.$args['args']['startnum'];
            }
        }

        // for the display function use either the title (if present) or the page id
        if ($args['func'] == 'display') {
            // check for the generic object id parameter
            if (isset($args['args']['objectid'])) {
                $args['args']['fid'] = $args['args']['objectid'];
            }
            // get the item (will be cached by DBUtil)
            $item = ModUtil::apiFunc('Feeds', 'user', 'get', array('fid' => $args['args']['fid']));
            $vars = $item['urltitle'];
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
                // extract the category path
                $cat = implode('/', array_slice($args['vars'], 1, $varscount - 1 - $pagersize));
                System::queryStringSetVar('cat', $cat);
                if ($args['vars'][$varscount-2] == 'startnum') {
                    System::queryStringSetVar('startnum', $args['vars'][$varscount-1]);
                }
            }
        }

        // identify the correct parameter to identify the page
        if (FormUtil::getPassedValue('func') == 'display') {
            if (is_numeric($args['vars'][$nextvar])) {
                System::queryStringSetVar('fid', $args['vars'][$nextvar]);
            } else {
                System::queryStringSetVar('title', $args['vars'][$nextvar]);
            }
        }

        return true;
    }

    /**
     * get meta data for the module
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
                'titlefield'  => 'name',
                'itemid'      => 'fid');
    }
}