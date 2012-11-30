<?php

/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */

/**
 * Class to control User interface
 */
class Downloads_Api_User extends Zikula_AbstractApi
{
    /**
     * Download Item status
     */

    const STATUS_ALL = -1;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * get downloads filtered as requested
     * @param type $args
     * @return array of objects
     */
    public function getall($args)
    {
        // declare args
        $category = isset($args['category']) ? $args['category'] : 0;
        $startnum = isset($args['startnum']) ? $args['startnum'] : 0;
        $orderby = isset($args['orderby']) ? $args['orderby'] : 'title';
        $orderdir = isset($args['orderdir']) ? $args['orderdir'] : 'ASC';
        $limit = isset($args['limit']) ? $args['limit'] : $this->getVar('perpage');
        $status = isset($args['status']) ? $args['status'] : self::STATUS_ACTIVE;

        $downloads = $this->entityManager->getRepository('Downloads_Entity_Download')
                ->getCollection($orderby, $orderdir, $startnum, $category, $status, $limit);

        $result = array();
        foreach ($downloads as $key => $download) {
            if ((!SecurityUtil::checkPermission('Downloads::Item', $download->getLid() . '::', ACCESS_READ)) ||
                    (!SecurityUtil::checkPermission('Downloads::Category', $download->getCategory()->getCid() . '::', ACCESS_READ))) {
                continue;
            } else {
                $result[$key] = $download;
            }
        }
        return $result;
    }

    /**
     * cound the number of results in the query
     * @param array $args
     * @return integer
     */
    public function countQuery($args)
    {
        $args['limit'] = -1;
        $items = $this->getall($args);
        return count($items);
    }

    public function getSubCategories($args)
    {
        $category = isset($args['category']) ? $args['category'] : 0;

        $subcategories = $this->entityManager->getRepository('Downloads_Entity_Categories')->findBy(array('pid' => $category));

        foreach ($subcategories as $key => $subcategory) {
            if (!SecurityUtil::checkPermission('Downloads::Category', $subcategory->getCid() . '::', ACCESS_READ)) {
                unset($subcategories[$key]);
            }
        }

        return $subcategories;
    }

    /**
     * Clear cache for given item. Can be called from other modules to clear an item cache.
     *
     * @param $item - the item: array with data or id of the item
     */
    public function clearItemCache(Downloads_Entity_Download $item)
    {
        // Clear View_cache
        $cache_ids = array();
        $cache_ids[] = 'display|lid_' . $item->getLid();
        $cache_ids[] = 'view|cid_' . $item->getCid();
        $view = Zikula_View::getInstance('Downloads');
        foreach ($cache_ids as $cache_id) {
            $view->clear_cache(null, $cache_id);
        }

        // clear Theme_cache
        $cache_ids = array();
        $cache_ids[] = 'Downloads|user|display|lid_' . $item->getLid();
        $cache_ids[] = 'Downloads|user|view|category_' . $item->getCid(); // view function (item list by category)
        $cache_ids[] = 'homepage'; // for homepage (it can be adjustment in module settings)
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