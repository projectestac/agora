<?php

class Content_Migration_ContentExpress extends Content_Migration_AbstractModule
{

    /**
     * record index
     * @var integer
     */
    private $recordCount = 0;
    /**
     * map page level structure
     * @var array
     */
    private $recordLevels = array();

    /**
     * constructor
     */
    public function __construct()
    {
        $this->migrateCategories = true;
        $this->pageMap[0] = 0;
        parent::__construct();
    }

    protected function getCategories()
    {
        $sql = "SELECT mc_id, mc_parent_id, mc_title FROM " . $this->tablePrefix . "_ce_categories ORDER BY mc_parent_id, mc_id";
        $result = DBUtil::executeSQL($sql);
        $categories = DBUtil::marshallObjects($result);
        $reformattedArray = array();
        foreach ($categories as $category) {
            if ($category['mc_parent_id'] == '-1') {
                $category['mc_parent_id'] = 0;
            }
            $reformattedArray[] = array(
                'id' => $category['mc_id'],
                'pid' => $category['mc_parent_id'],
                'title' => $category['mc_title'],
            );
        }
        return $reformattedArray;
    }

    protected function createRecords($pid = -1, $lvl = 0)
    {
        $sql = "SELECT * FROM " . $this->tablePrefix . "_ce_contentitems WHERE mc_parent_id=$pid ORDER BY mc_id";
        $pid = ($pid == -1) ? 0 : $pid;
        $this->recordLevels[$pid] = $lvl;
        $result = DBUtil::executeSQL($sql);
        $pages = DBUtil::marshallObjects($result);
        $fieldmap = $this->getFieldMap();
        $i = 0;
        foreach ($pages as $page) {
            // correct values to Content appropriate types
            $page['mc_parent_id'] = ($page['mc_parent_id'] == -1) ? 0 : $page['mc_parent_id'];
            $page['mc_status'] = $page['mc_status'] - 1;
            // remap fieldnames
            $currentRecordCount = $this->recordCount;
            foreach ($fieldmap as $newfield => $oldfield) {
                $this->records[$currentRecordCount][$newfield] = $page[$oldfield];
            }
            $this->records[$currentRecordCount]['language'] = ZLanguage::getLanguageCode();
            $this->records[$currentRecordCount]['layouttype'] = 'Column1';
            $this->records[$currentRecordCount]['position'] = $i;
            $this->records[$currentRecordCount]['level'] = $this->recordLevels[$page['mc_parent_id']];
            $this->records[$currentRecordCount]['setleft'] = ++$this->structureIndex; //0; //++$left;
            // create contenttype items
            $this->records[$currentRecordCount]['useheader'] = true;
            // this could loop and create multiple contentitems if needed
            $this->records[$currentRecordCount]['contentitems'] = array(0 => array(
                    'contenttype' => 'Html',
                    'areaIndex' => '1',
                    'inputType' => 'text',
                    'data' => $page['mc_text'],
                    ));
            $this->recordCount++;
            $i++; // position index
            // create recursive records for all child pages
            $this->createRecords($page['mc_id'], $lvl + 1);
            $this->records[$currentRecordCount]['setright'] = ++$this->structureIndex; //1; //++$left;
        }
        //return count($pages);
    }

    private function getFieldMap()
    {
        $map = array(
            'id' => 'mc_id',
            'title' => 'mc_title',
            'categoryid' => 'mc_cat_id',
            'ppid' => 'mc_parent_id',
            'showtitle' => 'mc_enable_title',
            'activefrom' => 'mc_start_date',
            'activeto' => 'mc_end_date',
            'active' => 'mc_status',
            'views' => 'mc_times_read',
        );
        return $map;
    }

}