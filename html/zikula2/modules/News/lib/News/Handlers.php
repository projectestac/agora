<?php

/**
 * Event handlers for the News module
 *
 * @author Craig Heydenburg
 */
class News_Handlers 
{
    // Post pending content to pending_content module Event handler
    public static function pendingContent(Zikula_Event $event)
    {
        $dom = ZLanguage::getModuleDomain('News');
        ModUtil::dbInfoLoad('News');
        $dbtables = DBUtil::getTables();
        $columns = $dbtables['news_column'];
        $count = DBUtil::selectObjectCount('news', "WHERE $columns[published_status]=2");
        if ($count > 0) {
            $collection = new Zikula_Collection_Container('News');
            $collection->add(new Zikula_Provider_AggregateItem('submission', _n('News article', 'News articles', $count, $dom), $count, 'admin', 'view', array('news_status'=>2)));
            $event->getSubject()->add($collection);
        }
    }

    // deliver Content plugin for displaying news articles
    public static function getTypes(Zikula_Event $event) {
        $types = $event->getSubject();
        $types->add('News_ContentType_NewsArticles');
    }
}