<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class Feeds_Controller_User extends Zikula_AbstractController
{

    /**
     * the main user function
     */
    function main($args)
    {
        $this->redirect(ModUtil::url('Feeds', 'user', 'view', $args));
    }

    /**
     * view items
     * This is a standard function to provide an overview of all of the items
     * available from the module.
     */
    function view($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Feeds::', "::", ACCESS_OVERVIEW), LogUtil::getErrorMsgPermission());

        // Get parameters from whatever input we need.
        $startnum = (int)FormUtil::getPassedValue('startnum', isset($args['startnum']) ? $args['startnum'] : 1, 'GET');
        $prop = (string)FormUtil::getPassedValue('prop', isset($args['prop']) ? $args['prop'] : null, 'GET');
        $cat = (string)FormUtil::getPassedValue('cat', isset($args['cat']) ? $args['cat'] : null, 'GET');

        // defaults and input validation
        if (!is_numeric($startnum) || $startnum < 1) {
            $startnum = 1;
        }

        // get all module vars for later use
        $modvars = $this->getVars();

        // check if categorisation is enabled
        if ($modvars['enablecategorization']) {
            // get the categories registered for the Pages
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('Feeds', 'feeds');
            $props = array_keys($catregistry);

            // validate the property
            if (empty($prop) || !in_array($prop, $props)) {
                $prop = $props[0];
            }

            // if the property and the category are specified
            // means that we'll list the feeds that belongs to that category
            if (!empty($cat)) {
                if (!is_numeric($cat)) {
                    $rootCat = CategoryUtil::getCategoryByID($catregistry[$prop]);
                    $cat = CategoryUtil::getCategoryByPath($rootCat['path'] . '/' . $cat);
                } else {
                    $cat = CategoryUtil::getCategoryByID($cat);
                }
                if (!empty($cat) && isset($cat['path'])) {
                    // include all it's subcategories and build the filter
                    $categories = categoryUtil::getCategoriesByPath($cat['path'], '', 'path');
                    $catstofilter = array();
                    foreach ($categories as $category) {
                        $catstofilter[] = $category['id'];
                    }
                    $catFilter = array($prop => $catstofilter);
                } else {
                    return LogUtil::registerError($this->__('Invalid category'));
                }

                // if nothing or only property is specified
                // means that we'll list the subcategories available on that property
            } else {
                $rootCat = CategoryUtil::getCategoryByID($catregistry[$prop]);
                $rootCat['path'] .= '/'; // add this to make the relative paths of the subcategories with ease
                $categories = CategoryUtil::getCategoriesByParentID($rootCat['id']);
            }
        }

        // List of subcategories
        if (!isset($catFilter) && $modvars['enablecategorization']) {
            //Assign the action to perform
            $this->view->assign('action', 'subcatslist');
            // Assign the data to display
            $this->view->assign('rootCat', $rootCat);
            $this->view->assign('property', $prop);
            $this->view->assign('categories', $categories);

            // List of Feeds
            // of an specific category if enabledcategorization
        } else {
            //Assign the action to perform
            $this->view->assign('action', 'feedslist');

            if ($modvars['enablecategorization']) {
                // Assign the data to display
                $this->view->assign('category', $cat);
            }

            // Get all matching feeds
            $items = ModUtil::apiFunc('Feeds', 'user', 'getall', array('startnum' => $startnum,
                        'numitems' => $modvars['feedsperpage'],
                        'category' => isset($catFilter) ? $catFilter : null,
                        'catregistry' => isset($catregistry) ? $catregistry : null));

            if ($items === false) {
                LogUtil::registerStatus($this->__('No Feeds found.'));
            }

            // assign the values for the smarty plugin to produce a pager
            $this->view->assign('pager', array('numitems' => ModUtil::apiFunc('Feeds', 'user', 'countitems', array('category' => isset($catFilter) ? $catFilter : null)),
                'itemsperpage' => $modvars['feedsperpage']));

            // assign the items to the template
            $this->view->assign('items', $items);
        }

        // assign various useful template variables
        $this->view->assign('startnum', $startnum);
        $this->view->assign('lang', ZLanguage::getLanguageCode());

        // Return the output that has been generated by this function
        return $this->view->fetch('user/view.tpl');
    }

    /**
     * display item
     * This is a standard function to provide detailed informtion on a single feed item
     * available from the module.
     */
    function display($args)
    {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        $title = FormUtil::getPassedValue('title', isset($args['title']) ? $args['title'] : null, 'REQUEST');
        $startnum = (int)FormUtil::getPassedValue('startnum', isset($args['startnum']) ? $args['startnum'] : 1, 'GET');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
        if (!empty($objectid)) {
            $fid = $objectid;
        }

        // Validate the essential parameters
        if ((empty($fid) || !is_numeric($fid)) && (empty($title))) {
            return LogUtil::registerArgsError();
        }
        if (!empty($title)) {
            unset($fid);
        }

        // defaults and input validation
        if (!is_numeric($startnum) || $startnum < 1) {
            $startnum = 1;
        }
        $feedstartnum = ($startnum < 1) ? 0 : $startnum - 1;  // The feed index starts at 0, not 1
        // Define the cache id
        if (isset($fid)) {
            $this->view->setCacheId(md5('display' . $fid . $startnum));
        } else {
            $this->view->setCacheId($title);
        }

        // check out if the contents are cached.
        if ($this->view->is_cached('user/display.tpl')) {
            return $this->view->fetch('user/display.tpl');
        }

        // Get the feed
        if (isset($fid)) {
            $item = ModUtil::apiFunc('Feeds', 'user', 'get', array('fid' => $fid));
        } else {
            $item = ModUtil::apiFunc('Feeds', 'user', 'get', array('title' => $title));
            System::queryStringSetVar('fid', $item['fid']);
        }

        if ($item === false) {
            return LogUtil::registerError($this->__('Error! Could not load any Feeds.'), 404);
        }

        // read the feed source
        $FeedInfo = ModUtil::apiFunc('Feeds', 'user', 'getfeed', array('fid' => $item['fid']));

        // get all module vars
        $modvars = $this->getVars();

        // Display details of the item.
        $this->view->assign('item', $item);
        $this->view->assign('startnum', $startnum);
        $this->view->assign('feedstartnum', $feedstartnum);
        $this->view->assign('feed', $FeedInfo['feed']);

        $this->view->assign('pager', array('numitems' => $FeedInfo['count'],
            'itemsperpage' => $modvars['itemsperpage']));

        // Return the output that has been generated by this function
        return $this->view->fetch('user/display.tpl');
    }

    /**
     * display all items for a given category
     * This is a standard function to provide detailed informtion on multiple feed items in a category
     * from the module.
     */
    function category($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Feeds::', "::", ACCESS_OVERVIEW), LogUtil::getErrorMsgPermission());

        $cat = FormUtil::getPassedValue('cat', isset($args['cat']) ? $args['cat'] : null, 'GET');
        $startnum = (int)FormUtil::getPassedValue('startnum', isset($args['startnum']) ? $args['startnum'] : 1, 'GET');
        // defaults and input validation
        if (!is_numeric($startnum) || $startnum < 1) {
            $startnum = 1;
        }
        $feedstartnum = ($startnum < 1) ? 0 : $startnum - 1;  // The feed index starts at 0, not 1
        // get all module vars for later use
        $modvars = $this->getVars();

        if (!$modvars['enablecategorization']) {
            $this->redirect(ModUtil::url('Feeds', 'user', 'view'));
        }
        
        // Define the cache id
        if (isset($cat) && is_numeric($cat)) {
            $this->view->setCacheId(md5("category" . $cat . $startnum));
        } else {
            return LogUtil::registerError($this->__('Invalid category'));
        }

        // check out if the contents are cached.
        if ($this->view->is_cached('user/category.tpl')) {
            return $this->view->fetch('user/category.tpl');
        }

        // get the categories registered for the Pages
        $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('Feeds', 'feeds');
        $props = array_keys($catregistry);

        // validate the property
        if (empty($prop) || !in_array($prop, $props)) {
            $prop = $props[0];
        }

        $catInfo = CategoryUtil::getCategoryByID($cat);

        if (!empty($catInfo) && isset($catInfo['path'])) {
            // include all it's subcategories and build the filter
            $categories = categoryUtil::getCategoriesByPath($catInfo['path'], '', 'path');
            $catstofilter = array();
            foreach ($categories as $category) {
                $catstofilter[] = $category['id'];
            }
            $catFilter = array($prop => $catstofilter);
        } else {
            return LogUtil::registerError($this->__('Invalid category'));
        }

        // Get all matching feeds
        $items = ModUtil::apiFunc('Feeds', 'user', 'getall', array('category' => isset($catFilter) ? $catFilter : null,
                    'catregistry' => isset($catregistry) ? $catregistry : null));

        if ($items === false) {
            LogUtil::registerStatus($this->__('No Feeds found.'));
            $FeedInfo['feed'] = null;
            $FeedInfo['count'] = 0;
        } else {
            $FeedLinkBack = array(); // used to pass information about the category to the feed item so can link back to it
            $furls = array();
            foreach ($items as $item) {
                $feed = ModUtil::apiFunc('Feeds', 'user', 'get', array('fid' => $item['fid']));
                if ($feed != false) {
                    $furls[] = $feed['url'];
                    $FeedLinkBack[$feed['url']] = array('name' => $feed['name'], 'fid' => $feed['fid'], 'url' => $feed['url']);
                }
            }

            // read the feed sources
            $FeedInfo = ModUtil::apiFunc('Feeds', 'user', 'getfeed', array('furl' => $furls, 'limit' => $modvars['multifeedlimit']));
        }

        // Display details of the item.
        $this->view->assign('lang', ZLanguage::getLanguageCode());
        $this->view->assign('catID', $cat);
        $this->view->assign('FeedLinkBack', $FeedLinkBack);
        $this->view->assign('category', $catInfo);
        $this->view->assign('property', $prop);
        $this->view->assign('startnum', $startnum);
        if (is_object($FeedInfo['feed'])) {
            $this->view->assign('feeditems', $FeedInfo['feed']->get_items($feedstartnum, $modvars['itemsperpage']));
        }

        // assign the values for the smarty plugin to produce a pager
        $this->view->assign('pager', array('numitems' => $FeedInfo['count'],
            'itemsperpage' => $modvars['itemsperpage']));

        // Return the output that has been generated by this function
        return $this->view->fetch('user/category.tpl');
    }

    /**
     * This forces an update of the SimplePie Feed Caches
     * A key is used to prevent others from running this potentially time consuming function
     */
    function updatecache($args)
    {
        $key = FormUtil::getPassedValue('key', isset($args['key']) ? $args['key'] : null, 'GET');

        // get all module vars for later use
        $modvars = $this->getVars();

        // Check for a valid key
        if ($key != $modvars['key']) {
            return LogUtil::registerError($this->__('Incorrect Key given. No update performed.'));
        }

        // Get all matching feeds
        $items = ModUtil::apiFunc('Feeds', 'user', 'getall');
        if ($items === false) {
            LogUtil::registerStatus($this->__('No Feeds found.'));
        }

        // assemble all the feed urls to update
        $furls = array();
        foreach ($items as $item) {
            $feed = ModUtil::apiFunc('Feeds', 'user', 'get', array('fid' => $item['fid']));
            if ($feed != false) {
                $furls[] = $feed['url'];
            }
        }

        // Now go get the feeds and update the cache
        $FeedInfo = ModUtil::apiFunc('Feeds', 'user', 'getfeed', array('furl' => $furls,
                    'limit' => $modvars['multifeedlimit'],
                    'cron' => 1));

        // Create output
        // Don't want renderer for cron jobs, just a small amount of text with an update message
        echo $this->__('Items updated in Feed cache') . ': ' . $FeedInfo['count'];
        if ($FeedInfo['error']) {
            echo ' ' . $this->__('Error') . ': ' . $FeedInfo['error'];
        }

        return true;
    }

}