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

class Pages_Api_Admin extends Zikula_AbstractApi
{


    /**
     * Purge the permalink fields in the Pages table
     *
     * @return bool true on success, false on failure
     */
    public function purgepermalinks()
    {
        $this->throwForbiddenUnless(
            SecurityUtil::checkPermission('Pages::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission()
        );

        $pages = $this->entityManager->getRepository('Pages_Entity_Page')->findAll();
        foreach ($pages as $page) {
            $perma = strtolower(DataUtil::formatPermalink($page->getUrltitle()));
            if ($page->getUrltitle() != $perma) {
                $page->setUrltitle($perma);
            }
        }
        $this->entityManager->flush();
        return true;
    }

    /**
     * get available admin panel links
     *
     * @return array array of admin links
     */
    public function getlinks()
    {
        $links = array();

        if (SecurityUtil::checkPermission('Pages::', '::', ACCESS_READ)) {
            $links[] = array(
                'url'  => ModUtil::url('Pages', 'admin', 'view'),
                'text' => $this->__('Pages list'),
                'class' => 'z-icon-es-view'
            );
        }
        if (SecurityUtil::checkPermission('Pages::', '::', ACCESS_ADD)) {
            $links[] = array(
                'url'  => ModUtil::url('Pages', 'admin', 'modify'),
                'text' => $this->__('Create a page'),
                'class' => 'z-icon-es-new'
            );
        }
        if (SecurityUtil::checkPermission('Pages::', '::', ACCESS_ADMIN)) {
            $links[] = array(
                'url'  => ModUtil::url('Pages', 'admin', 'purge'),
                'text' => $this->__('Purge permalinks'),
                'class' => 'z-icon-es-regenerate'
            );
            $links[] = array(
                'url'  => ModUtil::url('Pages', 'admin', 'modifyconfig'),
                'text' => $this->__('Settings'),
                'class' => 'z-icon-es-config'
            );
        }

        return $links;
    }

    /**
     * check if a permalink is unique for Pages
     *
     * @param array $args Arguments.
     *
     * @return boolean true if permalink is unique, otherwise false
     */
    public function checkuniquepermalink($args)
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb->select('count(p)')
            ->from('Pages_Entity_Page', 'p')
            ->where('p.urltitle = :urltitle')
            ->setParameter('urltitle', $args['urltitle']);
        if (isset($args['pageid']) && $args['pageid']) {
            $qb->andWhere('p.pageid != :pageid')
               ->setParameter('pageid', $args['pageid']);

        }
        $count = $qb->getQuery()->getSingleScalarResult();

        return !((bool)$count);
    }
}