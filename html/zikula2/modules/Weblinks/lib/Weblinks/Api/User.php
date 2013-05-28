<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class Weblinks_Api_User extends Zikula_AbstractApi
{

    /**
     * Convert orderby string to array for use in dql
     * 
     * @param string $args['orderby']
     * 
     * @return array
     */
    public function orderby($args)
    {
        // Argument check
        if (!isset($args['orderby'])) {
            return LogUtil::registerArgsError();
        }
        switch ($args['orderby']) {
            case 'titleD':
                return array('sortby' => 'title', 'sortdir' => 'DESC');
                break;
            case 'dateA':
                return array('sortby' => 'date', 'sortdir' => 'ASC');
                break;
            case 'dateD':
                return array('sortby' => 'date', 'sortdir' => 'DESC');
                break;
            case 'hitsA':
                return array('sortby' => 'hits', 'sortdir' => 'ASC');
                break;
            case 'hitsD':
                return array('sortby' => 'hits', 'sortdir' => 'DESC');
                break;
            case 'titleA':
            default:
                return array('sortby' => 'title', 'sortdir' => 'ASC');
                break;
        }
    }

    /**
     * Search category title for matching query word(s)
     * 
     * @param string $args['query']
     * 
     * @return array of categories
     */
    public function searchcats($args)
    {
        // Argument check
        if (!isset($args['query'])) {
            return LogUtil::registerArgsError();
        }

        $dql = "SELECT a FROM Weblinks_Entity_Category a";
        $dql .= " WHERE a.title LIKE '%" . DataUtil::formatForStore($args['query']) . "%'";
         // generate query
        $query = $this->entityManager->createQuery($dql);

        try {
            $searchcats = $query->getResult();
        } catch (Exception $e) {
            return LogUtil::registerError($this->__('Error! Could not load items: ' . $e->getMessage()));
        }
        
        // Return the subcategories array
        return Weblinks_Util::checkCategoryPermissions($searchcats, ACCESS_READ);
    }

    /**
     * Search links title for matching query word(s)
     * 
     * @param string $args['query']
     * 
     * @return array of links
     */
    public function search_weblinks($args)
    {
        // Argument check
        if (!isset($args['query'])) {
            return LogUtil::registerArgsError();
        }

        $query = DataUtil::formatForStore($args['query']);
        $orderBy = (isset($args['orderby'])) ? $args['orderby'] : array('sortby' => 'date', 'sortdir' => 'ASC');
        $startNum = (isset($args['startnum']) && is_numeric($args['startnum'])) ? $args['startnum'] : 1;
        $limit = (isset($args['limit']) && is_numeric($args['limit'])) ? $args['limit'] : 0;

        $result = $this->entityManager->getRepository('Weblinks_Entity_Link')->searchLinks($query, $orderBy['sortby'], $orderBy['sortdir'], $limit, $startNum);

        // filter result set for Link perms?

        // check for db error
        if ($result === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        
        // Return the array
        return Weblinks_Util::checkCategoryPermissions($result, ACCESS_READ);
    }

    /**
     * Count how many Link results there are for the search query
     * 
     * @return integer
     */
    public function countsearchlinks($args)
    {
        // Argument check
        if (!isset($args['query'])) {
            return LogUtil::registerArgsError();
        }

        $query = DataUtil::formatForStore($args['query']);
        $result = $this->entityManager->getRepository('Weblinks_Entity_Link')->searchLinks($query);
        
        // should process for permissions here too?

        return count($result);
    }

    /**
     * Obtain n number random links
     * 
     * @param integer $args['num'] (optional) (default: 1)
     * 
     * @return mixed (integer/array) of links
     */
    public function random($args)
    {
        $num = (isset($args['num']) && is_numeric($args['num'])) ? $args['num'] : 1;

        $weblinks = array();

        // this is unfortunate since every record must be retrieved in order to randomize them properly.
        $templinks = Weblinks_Util::checkCategoryPermissions($this->entityManager->getRepository('Weblinks_Entity_Link')->getLinks(), ACCESS_READ);
        if (count($templinks) > $num) {
            $randomIds = array_rand($templinks, $num);
            if (is_array($randomIds)) {
                foreach ($randomIds as $id) {
                    $weblinks[] = $templinks[$id];
                }
            } else {
                $weblinks[] = $templinks[$randomIds];
            }
        } else {
            $weblinks = $templinks;
        }
        
        // extract the lids
        $lidarray = array();
        $linkTitles = array();
        foreach ($weblinks as $link) {
            $lidarray[] = $link['lid'];
            $linkTitles[$link['lid']] = $link['title'];
        }
        

        if (count($lidarray) < 1) { // if no link
            return LogUtil::registerError($this->__('Sorry! There are no links to select randomly.'));
        }

        if ($num > 1) {
            $returnValue = array();
            foreach ($lidarray as $lid) {
                $returnValue[] = array('lid' => $lid, 'title' => $linkTitles[$lid]);
            }
        } else {
            $returnValue = $lidarray[0];
        }
        
        return $returnValue;
    }

    /**
     * Add link request to db
     * 
     * @param array $args new link content
     * @param integer $args['lid'] the link ID to modify
     * 
     * @return boolean
     */
    public function modifylinkrequest($args)
    {
        // Argument check
        if (!isset($args['lid']) || !is_numeric($args['lid'])) {
            return LogUtil::registerArgsError();
        }

        // Security check
        if (!$this->getVar('blockunregmodify') == 1 &&
                !SecurityUtil::checkPermission('Weblinks::', "::", ACCESS_COMMENT)) {
            return LogUtil::registerPermissionError();
        }
        
        // get original link
        $originalLink = $this->entityManager->find('Weblinks_Entity_Link', $args['lid']);
        // set modified values in original link
        $originalLink->setModifiedContent($args);
        $originalLink->setModifySubmitter($args['modifysubmitter']);
        // update original link status
        $originalLink->setStatus(Weblinks_Entity_Link::ACTIVE_MODIFIED);
        
        $this->entityManager->flush();
        
        return true;
    }

    /**
     * Add link to db
     * 
     * @param array $link
     * 
     * @return mixed integer/boolean
     */
    public function add($link)
    {
        // Security check
        if (!$this->getVar('links_anonaddlinklock') == 1 &&
                !SecurityUtil::checkPermission('Weblinks::', "::", ACCESS_COMMENT)) {
            return LogUtil::registerPermissionError();
        }

        $checkurl = $this->entityManager->getRepository('Weblinks_Entity_Link')->findBy(array('url' => $link['url']));
        $valid = System::varValidate($link['url'], 'url');

        if (count($checkurl) > 0) {
            return LogUtil::registerError($this->__('Sorry! This URL is already listed in the database!'));
        } else if ($valid == false) {
            return LogUtil::registerError($this->__('Sorry! Error! You must type a URL for the web link!'));
        } else if (empty($link['title'])) {
            return LogUtil::registerError($this->__('Sorry! Error! You must type a title for the URL!'));
        } else if (empty($link['cat_id']) || !is_numeric($link['cat_id'])) {
            return LogUtil::registerError($this->__('Sorry! Error! No category!'));
        } else if (empty($link['description'])) {
            return LogUtil::registerError($this->__('Sorry! Error! You must type a description for the URL!'));
        } else {
            if (empty($link['name'])) {
                $link['name'] = System::getVar("anonymous");
            }

            $link['submitter'] = $link['name'];
            $link['status'] = Weblinks_Entity_Link::INACTIVE;

            $linkEntity = new Weblinks_Entity_Link();
        
            try {
                $linkEntity->merge($link);
                $linkEntity->setCategory($this->entityManager->find('Weblinks_Entity_Category', $link['cat_id']));
                $this->entityManager->persist($linkEntity);
                $this->entityManager->flush();
            } catch (Zikula_Exception $e) {
                return LogUtil::registerError($this->__("ERROR: The link was not created: " . $e->getMessage()));
            }

            LogUtil::registerStatus($this->__("Thank you! Your link submission has been received."));

            if (empty($link['email'])) {
                LogUtil::registerStatus($this->__("It will be checked by the site admin."));
            } else {
                LogUtil::registerStatus($this->__("You'll receive an e-mail message when it's approved."));
            }
            
            return $linkEntity->getLid();
        }
    }

}