<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Weblinks_Entity_Link as Link;

class Weblinks_Entity_Repository_LinkRepository extends EntityRepository
{

    /**
     * Retrieve count of categories
     * 
     * @return Scalar 
     */
    public function getCount($status = Link::ACTIVE, $comp = ">=", $category = 0)
    {
        $dql = "SELECT COUNT(DISTINCT a.lid) FROM Weblinks_Entity_Link a";
        $dql .= " WHERE a.status $comp :status";
        if ($category > 0) {
            $dql .= " AND a.category IN (:cat)";
        }
        
        $query = $this->_em->createQuery($dql);
        
        $query->setParameter('status', $status);
        if ($category > 0) {
            $query->setParameter('cat', $category);
        }

        return $query->getResult(Query::HYDRATE_SINGLE_SCALAR);
    }
    
    /**
     * Retrieve collection of links
     * 
     * @param integer $status
     * @return array 
     */
    public function getLinks($status = Link::ACTIVE, $comp = ">=", $category = 0, $orderBy = null, $sortDir = 'DESC', $limit = 0, $startNum = 1, $beginning = null, $end = null)
    {
        $dql = "SELECT a, c FROM Weblinks_Entity_Link a JOIN a.category c";
        $dql .= " WHERE a.status $comp :status";
        if ($category > 0) {
            $dql .= " AND a.category IN (:cat)";
        }
        if (isset($beginning)) {
            if (!isset($end)) {
                $end = new DateTime();
                $end->setTime(23, 59, 59);
            }
            $dql .= " AND a.date >= :beginning";
            $dql .= " AND a.date <= :end";
        }
        if ($orderBy) {
            $dql .= " ORDER BY a.$orderBy $sortDir";
        }

        $query = $this->_em->createQuery($dql);

        if ($limit > 0) {
            $query->setMaxResults($limit);
        }
        if ($startNum > 1) {
            $query->setFirstResult($startNum);
        }

        if (isset($beginning)) {
            $query->setParameter('beginning', $beginning);
            $query->setParameter('end', $end);
        }
        if ($category > 0) {
            if (is_array($category)) {
                $category = implode(',', $category);
            }
            $query->setParameter('cat', $category);
        }
        $query->setParameter('status', $status);
        
        return $query->getResult(Query::HYDRATE_ARRAY);
    }

    /**
     * search collection of link titles
     * 
     * @param integer $status
     * @return array 
     */
    public function searchLinks($query, $orderBy = 'title', $sortDir = 'ASC', $limit = 0, $startNum = 1)
    {
        $dql = "SELECT a, c FROM Weblinks_Entity_Link a JOIN a.category c";
        $dql .= " WHERE a.title LIKE '%" . DataUtil::formatForStore($query) . "%'";
        $dql .= " AND a.status >= :status";

        if ($orderBy) {
            $dql .= " ORDER BY a.$orderBy $sortDir";
        }

        $query = $this->_em->createQuery($dql);

        if ($limit > 0) {
            $query->setMaxResults($limit);
        }
        if ($startNum > 1) {
            $query->setFirstResult($startNum);
        }

        $query->setParameter('status', Link::ACTIVE);
        try {
            $result = $query->getResult(Query::HYDRATE_ARRAY);
        } catch (Exception $e) {
            $result = false;
        }
        return $result;
    }

    /**
     * Count the number of links by Date in a given time period
     * 
     * @param DateTime $beginning
     * @param DateTime $end (default today)
     * @param integer $status (default ACTIVE)
     * @return Scalar 
     */
    public function countByDatePeriod(DateTime $beginning, DateTime $end = null, $status = Link::ACTIVE)
    {
        if (!isset($end)) {
            // default end is now
            $end = new DateTime();
        }
        $dql = "SELECT COUNT(DISTINCT a.lid) FROM Weblinks_Entity_Link a";
        $dql .= " WHERE a.status >= :status";
        $dql .= " AND a.date >= :beginning";
        $dql .= " AND a.date <= :end";

        $query = $this->_em->createQuery($dql);
        $query->setParameter('status', $status);
        $query->setParameter('beginning', $beginning);
        $query->setParameter('end', $end);
        
        // TODO - filter by perms?
        
        return $query->getResult(Query::HYDRATE_SINGLE_SCALAR);
    }
    
    /**
     * Increment the hit count for an item
     * 
     * @param object $item
     * @param integer $increment
     */
    public function addHit($item, $increment = 1)
    {
        $currentValue = $item->getHits();
        try {
            $item->setHits($currentValue + $increment);
            $this->_em->persist($item);
            $this->_em->flush();
        } catch (Exception $e) {
            echo "<pre>";
            var_dump($e->getMessage());
            die;
        }
    }

}