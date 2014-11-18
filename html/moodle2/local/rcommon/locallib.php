<?php

class rcommon_publisher {

    public static function get($id) {
        global $DB;
        return $DB->get_record('rcommon_publisher', array('id' => $id));
    }

    public static function check_auth($publisherid, $user, $passwd) {
        global $DB;

        if (!$user || !$passwd) {
            return false;
        }

        return $DB->record_exists('rcommon_publisher', array('id' => $publisherid, 'username' => $user, 'password' => $passwd));
    }

}

class rcommon_level {

    public static function get_by_format($format) {
        global $DB;
        $emptysql = $DB->sql_isempty('rcommon_level', 'code', false, false);
        $sql = "SELECT * FROM {rcommon_level}
            WHERE id IN (SELECT DISTINCT levelid FROM {rcommon_books} WHERE format = :format) AND NOT $emptysql ORDER BY code, name";

        return $DB->get_records_sql($sql, array('format' => $format));
    }

    public static function get_create_by_code($code) {
        global $DB;

        if ($code == null or empty($code)) {
            $code = 'SENSE NIVELL';
        }

		if (is_numeric($code)) {
			return $code;
		}

		if (!$levelid = $DB->get_field('rcommon_level', 'id', array('code' => $code))) {
			// If the level does not exist create it
			$record = new stdClass();
			$record->name = $code;
			$record->code = $code;
			$record->timemodified = time();
			$record->timecreated = $record->timemodified;
			$levelid = $DB->insert_record('rcommon_level', $record);
		}

        return $levelid;
    }
}

class rcommon_book{
    public static $allowedformats = array('webcontent');

    public static function get($id) {
        global $DB;
        return $DB->get_record('rcommon_books', array('id' => $id));
    }

    public static function get_by_level($levelid, $format = false) {
        global $DB;

        $emptysql = $DB->sql_isempty('rcommon_books', 'rb.isbn', false, false);
        $sql = "SELECT rb.*, rp.name as publisher FROM {rcommon_books} rb
                    INNER JOIN {rcommon_publisher} rp ON rb.publisherid = rp.id
                    WHERE rb.levelid = :levelid AND rb.format = :format AND NOT $emptysql
                    ORDER BY rp.name, rb.name ASC";
        $params = array('levelid' => $levelid);
        if ($format) {
            $params['format'] = $format;
        }
        return $DB->get_records_sql($sql, $params);
    }

    public static function check_auth($bookid, $user, $passwd) {
        global $DB;

        if (!$publisherid = $DB->get_field('rcommon_books', 'publisherid', array('id' => $bookid))) {
            return false;
        }
        return rcommon_publisher::check_auth($publisherid, $user, $passwd);
    }

    public static function add_update($record) {
        global $DB;

        if (empty($record->isbn)) {
            return false;
        }

        // Check that book name isn't larger than 255 characters
        if (textlib::strlen($record->name) > 255) {
            $record->name = textlib::substr($record->name, 0, 255);
        }

        // Check that book summary isn't larger than 1024 characters
        if (textlib::strlen($record->summary) > 1024) {
            $record->summary = textlib::substr($record->summary, 0, 1024);
        }

        $record->format = textlib::strtolower($record->format);
        $record->levelid = rcommon_level::get_create_by_code($record->levelid);

        // Test that de obligatory fields aren't empty
        $obligatoryarray = array('isbn', 'levelid', 'format', 'summary');
        foreach ($obligatoryarray as $value) {
            if (empty($record->$value)) {
                throw new Exception('Required parameter <strong>'.$value.' not found!</strong>');
            }
        }

        $record->timemodified = time();
        if (!$bookid = $DB->get_field('rcommon_books', 'id', array('isbn' => $record->isbn))) {
            $record->timecreated = $record->timemodified;
            return $DB->insert_record('rcommon_books', $record);
        } else {
            $record->id = $bookid;
            if ($DB->update_record('rcommon_books', $record)) {
                return $bookid;
            }
        }
        return false;
    }

    public static function clean($bookid, $time) {
        global $DB;
        $units2delete = $DB->get_records_select('rcommon_books_units', 'bookid = :bookid AND timemodified < :time', array('bookid' => $bookid, 'time' => $time));
        foreach ($units2delete as $unit) {
            if (!$DB->record_exists('rcontent', array('bookid' => $bookid, 'unitid' => $unit->id))) {
                $DB->delete_records('rcommon_books_units', array('id' => $unit->id));
            }
        }
        $acts2delete = $DB->get_records_select('rcommon_books_activities', 'bookid = :bookid AND timemodified < :time', array('bookid' => $bookid, 'time' => $time));
        foreach ($acts2delete as $act) {
            if (!$DB->record_exists('rcontent', array('bookid' => $bookid, 'unitid' => $act->unitid, 'activityid' => $act->id))) {
                $DB->delete_records('rcommon_books_activities', array('id' => $act->id));
            }
        }
    }

    public static function delete($bookid, $publisherid) {
        global $DB;
        $book = $DB->get_record('rcommon_books', array('id' => $bookid, 'publisherid' => $publisherid));
        if ($book) {
            $DB->delete_records('rcommon_books', array('id' => $bookid, 'publisherid' => $publisherid));
            $DB->delete_records('rcommon_books_units', array('bookid' => $bookid));
            $DB->delete_records('rcommon_books_activities', array('bookid' => $bookid));
            return true;
        }
        return false;
    }
}

class rcommon_unit{

    public static function get($id) {
        global $DB;
        return $DB->get_record('rcommon_books_units', array('id' => $id));
    }

    public static function get_from_code($code, $bookid) {
        global $DB;
        return $DB->get_record('rcommon_books_units', array('code' => $code, 'bookid' => $bookid));
    }

    public static function get_by_book($bookid) {
        global $DB;
        $emptysql = $DB->sql_isempty('rcommon_books_units', 'code', false, false);
        return $DB->get_records_select('rcommon_books_units', "bookid = :bookid AND NOT $emptysql", array('bookid' => $bookid), 'sortorder, name');
    }

    public static function add_update($record) {
        global $DB;

        if (empty($record->code) || empty($record->bookid)) {
            return false;
        }

        // Check that unit name isn't larger than 200 characters
        if (textlib::strlen($record->name) > 200) {
            $record->name = textlib::substr($record->name, 0, 200);
        }

        // Check that unit summary isn't larger than 1024 characters
        if (textlib::strlen($record->summary) > 1024) {
            $record->summary = textlib::substr($record->summary, 0, 1024);
        }

        $record->timemodified = time();
        if (!$unitid = $DB->get_field('rcommon_books_units', 'id', array('bookid' => $record->bookid, 'code' => $record->code))) {
            $record->timecreated = $record->timemodified;
            return $DB->insert_record('rcommon_books_units', $record);
        } else {
            $record->id = $unitid;
            if ($DB->update_record('rcommon_books_units', $record)) {
                return $unitid;
            }
        }
        return false;
    }
}

class rcommon_activity{

    public static function get($id) {
        global $DB;
        return $DB->get_record('rcommon_books_activities', array('id' => $id));
    }

    public static function get_from_code($code, $unitid, $bookid) {
        global $DB;
        return $DB->get_record('rcommon_books_activities', array('code' => $code, 'unitid' => $unitid, 'bookid' => $bookid));
    }

    public static function get_by_unit($unitid, $bookid) {
        global $DB;
        $emptysql = $DB->sql_isempty('rcommon_books_activities', 'code', false, false);
        return $DB->get_records_select('rcommon_books_activities', "bookid = :bookid AND unitid = :unitid AND NOT $emptysql",
            array('bookid' => $bookid, 'unitid' => $unitid), 'sortorder, name');
    }

    public static function add_update($record) {
        global $DB;

        if (empty($record->code) || empty($record->bookid) || empty($record->unitid)) {
            return false;
        }

        // Check that unit activity isn't larger than 200 characters
        if (textlib::strlen($record->name) > 200) {
            $record->name = textlib::substr($record->name, 0, 200);
        }

        // Check that unit summary isn't larger than 1024 characters
        if (textlib::strlen($record->summary) > 1024) {
            $record->summary = textlib::substr($record->summary, 0, 1024);
        }

        $record->timemodified = time();

        $params = array('bookid' => $record->bookid, 'unitid' => $record->unitid, 'code' => $record->code);
        if (!$activityid = $DB->get_field('rcommon_books_activities', 'id', $params)) {
            $record->timecreated = $record->timemodified;
            return $DB->insert_record('rcommon_books_activities', $record);
        } else {
            $record->id = $activityid;
            if ($DB->update_record('rcommon_books_activities', $record)) {
                return $activityid;
            }
        }
        return false;
    }
}


class credentials{

    public static function get($id) {
        global $DB;
        $cred = $DB->get_record('rcommon_user_credentials', array('id' => $id));

        if (!$cred || !self::check_empty_credential($cred)) {
            return false;
        }
        return $cred;
    }

    public static function get_by_user_isbn($userid, $isbn) {
        global $DB;

        $cred = $DB->get_record('rcommon_user_credentials', array('isbn' => $isbn, 'euserid' => $userid));
        if (!$cred || !self::check_empty_credential($cred)) {
            return false;
        }
        return $cred;
    }

    static function add($isbn, $credentials, $username_or_id = false){
        global $DB;

        $record               	= new stdClass();
        $record->isbn 			= $isbn;
	    $record->credentials 	= $credentials;

        if(!is_numeric($username_or_id)){
            $record->euserid = $DB->get_field('user','id',array('username'=>$username_or_id));
            if(!$record->euserid) return false;
        } else if($username_or_id !== false){
            $record->euserid = $username_or_id;
        }

        $record->timemodified = time();
	    $record->timecreated  = $record->timemodified;
        return $DB->insert_record('rcommon_user_credentials', $record);
    }

    static function update($id, $isbn, $credentials, $username_or_id = false){
        global $DB;

        $record               	= new stdClass();
        $record->id 			= $id;
        $record->isbn 			= $isbn;
	    $record->credentials 	= $credentials;

        if(is_string($username_or_id)){
            $record->euserid = $DB->get_field('user','id',array('username'=>$username_or_id));
            if(!$record->euserid) return false;
        } else if($username_or_id !== false){
            $record->euserid = $username_or_id;
        }

        $record->timemodified = time();
        return $DB->update_record('rcommon_user_credentials', $record);
    }

    static function assign($id, $userid){
        global $DB;

        $record               = new StdClass();
        $record->id           = $id;
        $record->euserid      = $userid;
        $record->timemodified = time();

        return $DB->update_record('rcommon_user_credentials', $record);
    }

    static function unassign($id){
        global $DB;

        $record               = new StdClass();
        $record->id           = $id;
        $record->euserid      = 0;
        $record->timemodified = time();

        return $DB->update_record('rcommon_user_credentials', $record);
    }

    static function check_empty_credential($credential){
        if ($credential->credentials == ' ' || empty($credential->credentials)){
            self::delete($credential->id);
            return false;
        }
        return true;
    }

    static function bulk_assign_users($bookisbn, array $ids, array $users){
        global $DB;

        $i = 0;
        $ids_where = implode(',', $ids);

        $params = array('isbn'=>$bookisbn);
        $empty_credentials = $DB->get_records_select('rcommon_user_credentials', "isbn = :isbn AND euserid = 0 AND id IN ({$ids_where})", $params);
        if ($empty_credentials){
            foreach($empty_credentials as $credential_id => $c){
                if ($i > count($users) - 1){
                    break;
                }

                $params['euserid'] = $users[$i];
                if ($existing_cred = $DB->get_record('rcommon_user_credentials', $params)){
                    // Unassign empty credentials
                    if(!self::check_empty_credential($existing_cred)){
                        continue;
                    }
                }

                if (self::assign($credential_id, $users[$i])){
                    $i++;
                }
            }
        }

        return $i;
    }

    static function bulk_unassign_users($bookisbn, array $users){
        global $DB;

        $i = 0;
        foreach ($users as $userid){
            $credid = $DB->get_field('rcommon_user_credentials', 'id', array('isbn'=>$bookisbn, 'euserid' => $userid));
            if ($credid){
                if(self::unassign($credid)){
                    $i++;
                }
            }
        }
        return $i;
    }

    static function bulk_unassign(array $ids){
        global $DB;

        $ids_where = implode(',', $ids);
        return $DB->execute("UPDATE {rcommon_user_credentials} SET euserid = 0, timemodified = '" . time() . "' WHERE id IN ({$ids_where})");
    }

    static function bulk_delete(array $ids){
        global $DB;

        $ids_where = implode(',', $ids);
        return $DB->execute("DELETE FROM {rcommon_user_credentials} WHERE id IN ({$ids_where})");
    }

    static function delete($id){
        global $DB;
        return $DB->delete_records('rcommon_user_credentials', array('id' => $id));
    }
}
