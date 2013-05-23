<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Mark West [markwest]
 * @author     Mateo Tibaquira [mateo]
 * @author     Erik Spaan [espaan]
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */
class News_Version extends Zikula_AbstractVersion
{

    public function getMetaData()
    {
        $meta = array();
        $meta['displayname'] = $this->__('News publisher');
        $meta['description'] = $this->__('Provides the ability to publish and manage news articles contributed by site users, with support for news categories and various associated blocks.');
        $meta['version'] = '3.0.0';
        //! this defines the module's url
        $meta['url'] = $this->__('news');
        $meta['core_min'] = '1.3.0'; // requires minimum 1.3.0 or later
        $meta['capabilities'] = array(HookUtil::SUBSCRIBER_CAPABLE => array('enabled' => true));
        $meta['securityschema'] = array('News::' => 'Contributor ID::Article ID',
                'News:pictureupload:' => '::',
                'News:publicationdetails:' => '::');
        // Module depedencies
        $meta['dependencies'] = array(
                array('modname'    => 'Scribite',
                      'minversion' => '4.2.1',
                      'maxversion' => '',
                      'status'     => ModUtil::DEPENDENCY_RECOMMENDED),
                array('modname'    => 'EZComments',
                      'minversion' => '3.0.1',
                      'maxversion' => '',
                      'status'     => ModUtil::DEPENDENCY_RECOMMENDED),
        );
        return $meta;
    }

    protected function setupHookBundles()
    {
        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.news.ui_hooks.articles', 'ui_hooks', $this->__('News Articles Hooks'));
        $bundle->addEvent('display_view', 'news.ui_hooks.articles.display_view');
        $bundle->addEvent('form_edit', 'news.ui_hooks.articles.form_edit');
        $bundle->addEvent('form_delete', 'news.ui_hooks.articles.form_delete');
        $bundle->addEvent('validate_edit', 'news.ui_hooks.articles.validate_edit');
        $bundle->addEvent('validate_delete', 'news.ui_hooks.articles.validate_delete');
        $bundle->addEvent('process_edit', 'news.ui_hooks.articles.process_edit');
        $bundle->addEvent('process_delete', 'news.ui_hooks.articles.process_delete');
        $this->registerHookSubscriberBundle($bundle);

        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.news.filter_hooks.articles', 'filter_hooks', $this->__('News Display Hooks'));
        $bundle->addEvent('filter', 'news.filter_hooks.articles.filter');
        $this->registerHookSubscriberBundle($bundle);
    }

}