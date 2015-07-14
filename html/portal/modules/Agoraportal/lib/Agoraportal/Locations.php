<?php

/**
 * Class Locations
 * This class manages bunches of locations
 */
class Locations {

    private static $locations;

    /**
     * Gets all the Locations in an associative array (locationId => locationName)
     * @return array of locations
     */
    public static function get_all() {
        if (!empty(self::$locations)) {
            return self::$locations;
        }

        $rows = DBUtil::selectObjectArray(Location::TABLE, "", 'locationName');
        self::$locations = array();
        foreach ($rows as $key => $row) {
            self::$locations[$row['locationId']] = $row['locationName'];
        }
        return self::$locations;
    }

    /**
     * Get the name description of the requested locationId
     * @param $id
     * @return name or false if not found
     */
    public static function get_location_name($id) {
        $locations = self::get_all();
        if (isset($locations[$id])) {
            return $locations[$id];
        }
        return false;
    }
}

/**
 * Class Location
 * Describes a Location
 */
class Location extends AgoraBase {

    const TABLE = 'agoraportal_location';

    protected $locationId;
    protected $locationName;

    /**
     * Gets a Location by the locationId
     * @param $id
     * @return bool|Location
     */
    public static function get_by_id($id) {
        $row = DBUtil::selectObjectByID(self::TABLE, $id, 'locationId');
        if (!$row) {
            return false;
        }
        return new Location($row);
    }

    /**
     * Creates a new Location
     * @param $locationName name to insert
     * @return false|Location
     */
    public static function create($locationName) {
        $row = array('locationName' => $locationName);
        if (!$obj = DBUtil::insertObject($row, self::TABLE, 'locationId')) {
            return LogUtil::registerError('No s\'ha pogut crear el Servei Territorial');
        }

        return self::get_by_id($obj['locationId']);
    }

    /**
     * Updates the instance info
     * @return int if succeeded
     */
    public function save() {
        $where = "locationId = $this->locationId";
        $item = $this->get_array();
        return DBUTil::updateObject($item, self::TABLE, $where);
    }

    /**
     * Delete a Location from the system
     * @param $id
     * @return bool
     */
    public static function delete($id) {
        $item = self::get_by_id($id);
        if (!$item) {
            return true;
        }

        // Finally, delete Location
        if (!DBUtil::deleteObjectByID(self::TABLE, $id, 'locationId')) {
            return LogUtil::registerError('No s\'ha pogut esborrar l\'element de '.self::TABLE);
        }
        return true;
    }
}

