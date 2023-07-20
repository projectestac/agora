<?php

/**
 * Class ClientTypes
 * This class manages bunches of clientTypes
 */
class ClientTypes {

    // Just a cache of the types in the Database
    private static $types;

    /**
     * Gets all the clientTypes in an associative array (typeId => typeName)
     * @return array of types
     */
    public static function get_all() {
        if (!empty(self::$types)) {
            return self::$types;
        }

        $rows = DBUtil::selectObjectArray(ClientType::TABLE, "", 'typeName');
        self::$types = array();
        foreach ($rows as $key => $row) {
            self::$types[$row['typeId']] = $row['typeName'];
        }
        return self::$types;
    }

    /**
     * Get the name description of the requested TypeId
     * @param $id
     * @return name or false if not found
     */
    public static function get_type_name($id) {
        $types = self::get_all();
        if (isset($types[$id])) {
            return $types[$id];
        }
        return false;
    }
}

/**
 * Class ClientType
 * This class describes a ClientType
 */
class ClientType extends AgoraBase {

    const TABLE = 'agoraportal_clientType';

    protected $typeId;
    protected $typeName;

    /**
     * Gets a ClientType by the typeId
     * @param $id
     * @return bool|ClientType
     */
    public static function get_by_id($id) {
        $row = DBUtil::selectObjectByID(self::TABLE, $id, 'typeId');
        if (!$row) {
            return false;
        }
        return new ClientType($row);
    }

    /**
     * Creates a new ClientType
     * @param $typeName name to insert
     * @return false|ClientType
     */
    public static function create($typeName) {
        $row = array('typeName' => $typeName);
        if (!$obj = DBUtil::insertObject($row, self::TABLE, 'typeId')) {
            return LogUtil::registerError('No s\'ha pogut crear la tipologia de centre');
        }

        return self::get_by_id($obj['typeId']);
    }

    /**
     * Updates the instance info
     * @return int if succeeded
     */
    public function save() {
        $where = "typeId = $this->typeId";
        $item = $this->get_array();
        return DBUTil::updateObject($item, self::TABLE, $where);
    }

    /**
     * Delete a ClientType from the system
     * @param $id
     * @return bool
     */
    public static function delete($id) {
        $item = self::get_by_id($id);
        if (!$item) {
            return true;
        }

        // Finally, delete ClientType
        if (!DBUtil::deleteObjectByID(self::TABLE, $id, 'typeId')) {
            return LogUtil::registerError('No s\'ha pogut esborrar l\'element de '.self::TABLE);
        }
        return true;
    }
}

