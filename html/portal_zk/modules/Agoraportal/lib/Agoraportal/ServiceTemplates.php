<?php

/**
 * Class ServiceTemplates
 * This class manages bunches of ServiceTemplates
 */
class ServiceTemplates {

    // Cache of the array of templates
    private static $templates;

    /**
     * Returns an array with all the ServiceTemplate class
     * @return array
     */
    public static function get_full_info() {
        $rows = DBUtil::selectObjectArray(ServiceTemplate::TABLE, "", 'description');
        $templates = array();
        foreach ($rows as $key => $row) {
            $template = new ServiceTemplate($row);
            $templates[$template->modelTypeId] = $template;
        }
        return $templates;
    }

    /**
     * Returns an array with key - values (shortcode -> description)
     * @return array
     */
    public static function get_all() {
        if (!empty(self::$templates)) {
            return self::$templates;
        }

        $rows = DBUtil::selectObjectArray(ServiceTemplate::TABLE, "", 'description');
        self::$templates = array();
        foreach ($rows as $key => $row) {
            self::$templates[$row['shortcode']] = $row['description'];
        }
        return self::$templates;
    }

    /**
     * Returns the description of one template
     * @param $shortcode
     * @return bool
     */
    public static function get_template_description($shortcode) {
        $templates = self::get_all();
        if (isset($templates[$shortcode])) {
            return $templates[$shortcode];
        }
        return false;
    }
}

/**
 * Class ServiceTemplate
 * Describes a ServiceTemplate (used on Nodes)
 */
class ServiceTemplate extends AgoraBase {

    const TABLE = 'agoraportal_modelTypes';

    protected $modelTypeId;
    protected $shortcode; // Short code to be used in the forms
    protected $description; // Human readable description
    protected $url; // URL to be replaced
    protected $dbHost; // dbHost to be replaced

    /**
     * Gets a ServiceTemplate by the modelTypeId
     * @param $id
     * @return false|ServiceTemplate
     */
    public static function get_by_id($id) {
        $row = DBUtil::selectObjectByID(self::TABLE, $id, 'modelTypeId');
        if (!$row) {
            return false;
        }
        return new ServiceTemplate($row);
    }

    /**
     * Returns a ServiceTemplate by the shortcode
     * @param $shortcode
     * @return false|ServiceTemplate
     */
    public static function get_by_shortcode($shortcode) {
        $row = DBUtil::selectObjectByID(self::TABLE, $shortcode, 'shortcode');
        if (!$row) {
            return false;
        }
        return new ServiceTemplate($row);
    }

    /**
     * Creates a new ServiceTemplate
     * @param $row to insert
     * @return false|ServiceTemplate
     */
    public static function create($row) {
        if (!$obj = DBUtil::insertObject($row, self::TABLE, 'modelTypeId')) {
            return LogUtil::registerError('No s\'ha pogut crear la plantilla de nodes');
        }
        return self::get_by_id($obj['modelTypeId']);
    }

    /**
     * Updates the instance info
     * @return int if succeeded
     */
    public function save() {
        $where = "modelTypeId = $this->modelTypeId";
        $item = $this->get_array();
        return DBUTil::updateObject($item, self::TABLE, $where);
    }

    /**
     * Delete a ServiceTemplate from the system
     * @param $id
     * @return bool
     */
    public static function delete($id) {
        $item = self::get_by_id($id);
        if (!$item) {
            return true;
        }

        if (!DBUtil::deleteObjectByID(self::TABLE, $id, 'modelTypeId')) {
            return LogUtil::registerError('No s\'ha pogut esborrar l\'element de '.self::TABLE);
        }
        return true;
    }
}

