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

class Weblinks_Entity_Repository_CategoryRepository extends EntityRepository
{

    /**
     * Get all sorted categories from parent
     * 
     * @param string $orderBy (optional)
     * @param integer $pid (parent id) (optional)
     * @return array of objects 
     */
    public function getAll($orderBy = "title", $pid = null)
    {
        $dql = "SELECT a FROM Weblinks_Entity_Category a";
        if (isset($pid)) {
            $dql .= " WHERE a.parent_id = :pid";
        }
        $dql .= " ORDER BY a.$orderBy";

        // generate query
        $query = $this->_em->createQuery($dql);
        if (isset($pid)) {
            $query->setParameter('pid', $pid);
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
     * Retrieve count of categories
     * 
     * @return Scalar 
     */
    public function getCount()
    {
        $dql = "SELECT COUNT(DISTINCT a.cat_id) FROM Weblinks_Entity_Category a";

        return $this->_em->createQuery($dql)->getResult(Query::HYDRATE_SINGLE_SCALAR);
    }
    
    /**
     * Determine if a category exists at this level already
     * 
     * @param array $category
     * @return boolean 
     */
    public function exists(Array $category)
    {
        $dql = "SELECT COUNT(DISTINCT a.cat_id) FROM Weblinks_Entity_Category a";
        $dql .= " WHERE a.title = :title";
        $dql .= " AND a.parent_id = :parent_id";
        
        $query = $this->_em->createQuery($dql);
        $query->setParameter('title', $category['title']);
        $query->setParameter('parent_id', $category['parent_id']);
        
        return ($query->getResult(Query::HYDRATE_SINGLE_SCALAR) > 0) ? true : false;
    }
}