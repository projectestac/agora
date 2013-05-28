<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

class Weblinks_ContentType_Links extends Content_AbstractContentType
{
    private $_em;
    protected $headline;
    protected $limit;
    protected $template = '';
    protected $categories = array();
    
    function __construct(Zikula_View $view)
    {
        parent::__construct($view);
        $this->_em = ServiceUtil::getService('doctrine.entitymanager');
    }

    public function getTitle() {
        return $this->__('Weblinks List');
    }
    
    public function getDescription() {
        return $this->__('Displays a list of Weblinks.');
    }

    public function loadData(&$data) {
        $this->headline = $data['headline'];
        $this->limit = $data['limit'];
        $this->template = $data['template'];
        $this->categories = $data['categories'];
        return;
    }

    public function display() {
        $links = $this->_em->getRepository('Weblinks_Entity_Link')->getLinks(Weblinks_Entity_Link::ACTIVE, ">=", $this->categories, null, 'DESC', $this->limit);
        
        $this->view->assign('links', $links)
                ->assign('headline', $this->headline);

        return $this->view->fetch($this->getTemplate());
    }
    
    public function startEditing()
    {
        $categories = Weblinks_Util::checkCategoryPermissions($this->_em->getRepository('Weblinks_Entity_Category')->getAll());
        
        $items = array();
        foreach ($categories as $category) {
            $items[] = array(
                'text' => $category->getTitle(),
                'value' => $category->getCat_id());
        }
        $this->view->assign('categories', $items);

    }
    
    public function displayEditing() {
        $cats = array();
        $output = $this->headline . '<br />';
        if ($this->categories) {
            foreach ($this->categories as $id) {
                $cats[]  = $this->_em->find('Weblinks_Entity_Category', $id)->getTitle();
            }
            $catlist = implode (', ', $cats);
            $output .= $this->__('Display weblinks from catgories') . ':<br />';
            $output .= "$catlist<br />";
        }
        $output .= $this->__f('Maximum %s links.', $this->limit) . '<br />';
        return $output;
    }

    public function getDefaultData() {
        $defaultdata = array(
            'headline' => $this->__('Weblinks'),
            'limit' => 10,
            'categories' => null,
            'template' => '');

        return $defaultdata;
    }

    public function getSearchableText() {
        return; // html_entity_decode(strip_tags($this->text));
    }
    
    public function getTemplate()
    {
        $this->view->setCacheId($this->contentId);
        if ($this->template && $this->view->template_exists($this->template)) {
            return $this->template;
        } else {
            return 'contenttype/links_view.tpl';
        }
    }
}