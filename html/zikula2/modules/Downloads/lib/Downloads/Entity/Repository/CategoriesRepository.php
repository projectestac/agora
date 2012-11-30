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

class Downloads_Entity_Repository_CategoriesRepository extends EntityRepository
{

    /**
     * Get all sorted categories
     * 
     * @param string $orderBy
     * @return array of objects 
     */
    public function getAll($orderBy = "title")
    {
        $dql = "SELECT a FROM Downloads_Entity_Categories a";
        $dql .= " ORDER BY a.$orderBy";

        // generate query
        $query = $this->_em->createQuery($dql);

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

}