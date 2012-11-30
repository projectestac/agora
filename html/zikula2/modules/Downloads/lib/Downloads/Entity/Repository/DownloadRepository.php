<?php

/**
 * PostCalendar
 * 
 * @license MIT
 * @copyright   Copyright (c) 2012, Craig Heydenburg, Sound Web Development
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Downloads_Entity_Download as Download;

class Downloads_Entity_Repository_DownloadRepository extends EntityRepository
{

    /**
     * Get a collection of items for display
     * 
     * @param string $orderBy
     * @param string $orderDir
     * @param integer $startNum
     * @param integer $category
     * @param integer $status
     * @param integer $limit
     * @return array of objects 
     */
    public function getCollection($orderBy, $orderDir, $startNum, $category, $status, $limit)
    {
        $dql = "SELECT a FROM Downloads_Entity_Download a JOIN a.category c";
        $where = array();

        if (!empty($category)) {
            $where[] = "a.category = :category";
        }
        if (($status == Download::STATUS_ACTIVE) || ($status == Download::STATUS_INACTIVE)) {
            $where[] = "a.status = :status";
        }
        if (!empty($where)) {
            $dql .= ' WHERE ' . implode(' AND ', $where);
        }

        $dql .= " ORDER BY a.$orderBy $orderDir";

        // generate query
        $query = $this->_em->createQuery($dql);

        if ($startNum > 0) {
            $query->setFirstResult($startNum);
        }
        if ($limit > 0) {
            $query->setMaxResults($limit);
        }

        // Add query parameters
        if (!empty($category)) {
            $query->setParameter('category', (int)$category);
        }
        if (($status == Download::STATUS_ACTIVE) || ($status == Download::STATUS_INACTIVE)) {
            $query->setParameter('status', $status);
        }

        try {
            $result = $query->getResult();
        } catch (Exception $e) {
            echo "<pre>";
            var_dump($e->getMessage());
            var_dump($query->getDQL());
            var_dump($query->getParameters());
            var_dump($query->getSQL());
            die;
        }
        return $result;
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