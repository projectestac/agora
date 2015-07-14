<?php

/**
 * Class SQLCommands
 * This class manages bunches of SQLCommands
 */
class SQLCommands {

    /**
     * Get available Commands for a ServiceType and Type of command (name or id)
     * @param $serviceId
     * @param $type
     * @return array
     */
    public static function getCommands($serviceId, $type) {
        $where = "WHERE serviceId = $serviceId";
        $type = SQLCommands::get_command_typeId($type);
        if ($type > 0) {
            $where .= " AND type = $type";
        }
        $rows = DBUtil::selectObjectArray(SQLCommand::TABLE, $where, 'comandId');
        $commands = array();
        foreach ($rows as $key => $row) {
            $command = new SQLCommand($row);
            $commands[$command->comandId] = $command;
        }
        return $commands;
    }

    /**
     * Returns the command typeId for a name or id
     * @param $type
     * @return string
     */
    public static function get_command_typeId($type) {
        if (!is_numeric($type)) {
            $type = strtolower($type);
            $commands = array('all', 'select', 'insert', 'update', 'delete', 'alter');
            $commands = array_flip($commands);
            return $commands[$type];
        }
        return $type;
    }

}

/**
 * Class SQLCommand
 * Describe a SQLCommand
 */
class SQLCommand extends AgoraBase {

    const TABLE = 'agoraportal_mysql_comands';

    // Available command types
    const COMMAND_TYPE_ALL = 0;
    const COMMAND_TYPE_SELECT = 1;
    const COMMAND_TYPE_UPDATE = 2;
    const COMMAND_TYPE_DELETE = 3;
    const COMMAND_TYPE_ALTER = 4;

    protected $comandId;
    protected $serviceId;
    protected $comand;
    protected $description;
    protected $type;

    /**
     * Gets a SQLCommand by the comandId
     * @param $id
     * @return bool|SQLCommand
     */
    public static function get_by_id($id) {
        $row = DBUtil::selectObjectByID(self::TABLE, $id, 'comandId');
        if (!$row) {
            return false;
        }
        return new SQLCommand($row);
    }

    /**
     * Creates a new SQLCommand
     * @param $row to insert
     * @return false|SQLCommand
     */
    public static function create($row) {
        if (!isset($row['serviceId']) || !isset($row['comand']) || !isset($row['description']) || !isset($row['type'])
            || empty($row['serviceId']) || empty($row['comand']) || empty($row['description'])|| empty($row['description'])) {
            return LogUtil::registerError('Falten dades del obligatòries del SQL. Reviseu les dades');
        }

        $row['type'] = SQLCommands::get_command_typeId($row['type']);
        if ($row['type'] == 0) {
            return LogUtil::registerError('Sel·leccioneu un tipus');
        }

        if (!$obj = DBUtil::insertObject($row, self::TABLE, 'comandId')) {
            return LogUtil::registerError('No s\'ha pogut crear la comanda');
        }

        return self::get_by_id($obj['comandId']);
    }

    /**
     * Set a command type
     * @param $type string or id name of the type
     */
    public function set_type($type) {
        $this->type = SQLCommands::get_command_typeId($type);
    }

    /**
     * Updates the instance info
     * @return int if succeeded
     */
    public function save() {
        $where = "comandId = $this->comandId";
        $item = $this->get_array();
        return DBUTil::updateObject($item, self::TABLE, $where);
    }

    /**
     * Delete a SQLCommand from the system
     * @param $id
     * @return bool
     */
    public static function delete($id) {
        $item = self::get_by_id($id);
        if (!$item) {
            return true;
        }

        if (!DBUtil::deleteObjectByID(self::TABLE, $id, 'comandId')) {
            return LogUtil::registerError('No s\'ha pogut esborrar l\'element de '.self::TABLE);
        }
        return true;
    }

    /**
     * Returns the related typename
     * @return string typename
     */
    public function get_typename() {
        $commands = array('all', 'select', 'insert', 'update', 'delete', 'alter');
        return $commands[$this->type];
    }

}