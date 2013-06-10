<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

class Weblinks_Handlers
{

    /**
     * Event handler to provide pending content
     * @param Zikula_Event $event 
     */
    public static function pendingContent(Zikula_Event $event)
    {
        if (ModUtil::getVar('Weblinks', 'showPendingContent')) {
            $dom = ZLanguage::getModuleDomain('Weblinks');
            $em = ServiceUtil::getService('doctrine.entitymanager');
            $count = $em->getRepository('Weblinks_Entity_Link')->getCount(Weblinks_Entity_Link::INACTIVE, '=');
            if ($count > 0) {
                $collection = new Zikula_Collection_Container('Weblinks');
                $collection->add(new Zikula_Provider_AggregateItem('submission', _n('New link', 'New links', $count, $dom), $count, 'admin', 'view'));
                $event->getSubject()->add($collection);
            }
            $count = $em->getRepository('Weblinks_Entity_Link')->getCount(Weblinks_Entity_Link::ACTIVE_BROKEN, '=');
            if ($count > 0) {
                $collection = new Zikula_Collection_Container('Weblinks');
                $collection->add(new Zikula_Provider_AggregateItem('submission', _n('Broken link', 'Broken links', $count, $dom), $count, 'admin', 'listbrokenlinks'));
                $event->getSubject()->add($collection);
            }
            $count = $em->getRepository('Weblinks_Entity_Link')->getCount(Weblinks_Entity_Link::ACTIVE_MODIFIED, '=');
            if ($count > 0) {
                $collection = new Zikula_Collection_Container('Weblinks');
                $collection->add(new Zikula_Provider_AggregateItem('submission', _n('Modified link', 'Modified links', $count, $dom), $count, 'admin', 'listmodrequests'));
                $event->getSubject()->add($collection);
            }
        }
    }

    /**
     * Event handler to provide Content module ContentTypes
     * @param Zikula_Event $event 
     */
    public static function getTypes(Zikula_Event $event)
    {
        $types = $event->getSubject();
        $types->add('Weblinks_ContentType_Links');
    }

}