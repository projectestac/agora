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

class Pages_ContentType_Pages
{

    private $_qb;
    private $_itemsPerPage;
    private $_startNumber = 1;
    private $_pager = false;
    private $_numberOfItems = 0;

    /**
     * construct
     */
    public function __construct()
    {
        $em = ServiceUtil::getService('doctrine.entitymanager');
        $this->_qb = $em->createQueryBuilder();
        $this->_qb->select('p')
                  ->from('Pages_Entity_Page', 'p')
                  ->leftJoin('p.categories', 'c');

        $this->_itemsPerPage = ModUtil::getVar('Pages', 'itemsperpage', 25);
    }

    /**
     * set start number
     *
     * @param int $startNumber Start number.
     *
     * @return void
     */
    public function setStartNumber($startNumber)
    {
        $this->_startNumber = $startNumber-1;
    }


    /**
     * set order
     *
     * @param string $orderBy E.g. titles.
     * @param string $orderDirection ASC/DESC.
     *
     * @return void
     */
    public function setOrder($orderBy, $orderDirection = 'ASC')
    {
        $this->_qb->orderBy('p.'.$orderBy, $orderDirection);
    }


    /**
     * set start number
     *
     * @param string $language Language code.
     *
     * @return void
     */
    public function setLanguage($language)
    {
        $multilingual = System::getVar('multilingual', false);
        if (!empty($language) && !$multilingual) {
            $this->_qb->andWhere('p.language = :language')
                      ->setParameter('language', $language);
        }
    }


    /**
     * set category
     *
     * @param mixed $category Category id.
     *
     * @return void
     */
    public function setCategory($category)
    {
        if (is_array($category)) {
            $this->_qb->andWhere('c.category in (:categories)')
                ->setParameter('categories', $category);
        } else if (!empty($category)) {
            $this->_qb->andWhere('c.category = :categories')
                      ->setParameter('categories', $category);
        }


    }

    /**
     * return page as array
     *
     * @return array
     */
    public function get()
    {
        $query = $this->_qb->getQuery();
        if ($this->_pager) {
            $this->_numberOfItems = \DoctrineExtensions\Paginate\Paginate::getTotalQueryResults($query);
            $paginateQuery = \DoctrineExtensions\Paginate\Paginate::getPaginateQuery($query, $this->_startNumber, $this->_itemsPerPage); // Step 2 and 3
            return $paginateQuery->getResult();
        } else {
            //$query->setFirstResult($this->_startNumber)
            //      ->setMaxResults($this->_itemsPerPage);
            return $query->getResult();
        }
    }

    /**
     * enable Pager
     *
     * @return array
     */
    public function enablePager()
    {
        $this->_pager = true;
    }


    /**
     * return page as array
     *
     * @return array
     */
    public function getPager()
    {
        return array(
            'itemsperpage' => $this->_itemsPerPage,
            'numitems'     => $this->_numberOfItems
        );
    }





}