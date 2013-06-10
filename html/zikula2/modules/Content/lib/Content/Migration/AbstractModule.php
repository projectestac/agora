<?php

abstract class Content_Migration_AbstractModule
{

    /**
     * Should we migrate existing 'local' categories?
     * @var boolean
     */
    protected $migrateCategories = false;
    /**
     * Map oldId => newIdPath
     * @var array
     */
    private $categoryPathMap = array();
    /**
     * Map oldId => newId
     * @var array
     */
    private $categoryMap = array();
    /**
     * The 'local' category id of the root category in your table
     * @var integer
     */
    protected $rootCategoryLocalId = 0;
    /**
     * Zikula's current table prefix
     * @var string
     */
    protected $tablePrefix;
    /**
     * Map oldPageId => newPageId
     * @var array
     */
    protected $pageMap = array();
    /**
     * array of records to be converted
     * @var array
     */
    protected $records = array();
    /**
     * The last existing 'setLeft/setRight' value in the table
     * @var integer
     */
    protected $structureIndex;

    /**
     * Category data
     * structure return data in array(array('id' => '', 'pid' => '', 'title' => '', 'lang' => ''))
     * order the categories by parent id so lowest parent category ids are first, then by category id
     * e.g. ORDER BY pid, cid
     */
    abstract protected function getCategories();

    /**
     * Content records
     * structure return data as array of arrays by Content field names
     */
    abstract protected function createRecords();

    /**
     * constructor
     */
    public function __construct()
    {
        $this->tablePrefix = System::getVar('prefix');
        $this->structureIndex = DBUtil::selectFieldMax('content_page', 'setRight');
    }

    /**
     * public execute function
     */
    public function execute()
    {
        if ($this->migrateCategories) {
            $this->importCategories();
        }
        $this->importData();
    }

    /**
     * import the categories provided
     */
    private function importCategories()
    {
        $rootCatId = CategoryRegistryUtil::getRegisteredModuleCategory('Content', 'content_page', ModUtil::getVar('Content', 'categoryPropPrimary'));
        $rootCatObj = CategoryUtil::getCategoryById($rootCatId);
        $this->categoryPathMap[$this->rootCategoryLocalId] = $rootCatObj['path'];
        $this->categoryMap[$this->rootCategoryLocalId] = (int)$rootCatId;

        $oldCategories = $this->getCategories();
        foreach ($oldCategories as $oldCategory) {
            if (isset($this->categoryPathMap[$oldCategory['pid']])) {
                $id = CategoryUtil::createCategory($this->categoryPathMap[$oldCategory['pid']], $oldCategory['title'], null, $oldCategory['title'], $oldCategory['title']);
                $catObj = CategoryUtil::getCategoryById($id);
                $this->categoryPathMap[$oldCategory['id']] = $catObj['path'];
                $this->categoryMap[$oldCategory['id']] = (int)$id;
            }
        }
    }

    /**
     * create the new pages and content items from data
     */
    private function importData()
    {
        $this->createRecords();
        $items = $this->records;
        foreach ($items as $item) {
            // create page 
            $page = array(
                'parentPageId' => (int)$this->pageMap[(int)$item['ppid']],
                'level' => $item['level'],
                'title' => $item['title'],
                'urlname' => DataUtil::formatForURL($item['title']),
                'layout' => $item['layouttype'],
                'showTitle' => $item['showtitle'],
                'views' => $item['views'],
                'activeFrom' => $item['activefrom'],
                'activeTo' => $item['activeto'],
                'active' => $item['active'],
                'categoryId' => $this->categoryMap[(int)$item['categoryid']],
                'position' => $item['position'],
                'setLeft' => $item['setleft'],
                'setRight' => $item['setright'],
                'language' => $item['language']);

            // insert the page
            $obj = DBUtil::insertObject($page, 'content_page');

            // add item id to pagemap
            $this->pageMap[(int)$item['id']] = (int)$obj['id'];

            // create the contentitems for this page
            $content = array();
            if ($item['useheader']) {
                $content[] = array(
                    'pageId' => $obj['id'],
                    'areaIndex' => '0',
                    'position' => '0',
                    'module' => 'Content',
                    'type' => 'Heading',
                    'data' => serialize(array(
                        'text' => $item['title'],
                        'headerSize' => 'h3')));
            }
            foreach ($item['contentitems'] as $position => $pageParts) {
                $content[] = array(
                    'pageId' => $obj['id'],
                    'areaIndex' => $pageParts['areaIndex'],
                    'position' => $position,
                    'module' => 'Content',
                    'type' => $pageParts['contenttype'],
                    'data' => serialize(array(
                        'text' => $pageParts['data'],
                        'inputType' => $pageParts['inputType'])));
            }

            // write the items to the dbase
            foreach ($content as $contentItem) {
                DBUtil::insertObject($contentItem, 'content_content');
            }
        }
    }

}