<?php

class rcommon_level{

    static function get_create_by_code($code){
        global $DB;

        if ($code == null or $code == '') {
            $code = 'SENSE NIVELL';
        }

        if (!$levelid = $DB->get_field('rcommon_level','id', array('code'=>$code))) {
            //if the level does not exist create it
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
    static function add_update($record){
        global $DB;

        // Check that book name isn't larger than 255 characters
        if (textlib::strlen($record->name) > 255) {
            $record->name = textlib::substr($record->name, 0, 255);
        }

        // Check that book summary isn't larger than 1024 characters
        if (textlib::strlen($record->summary) > 1024){
            $record->summary = textlib::substr($record->summary, 0, 1024);
        }

        $record->format = textlib::strtolower($record->format);
        $record->levelid = rcommon_level::get_create_by_code($record->levelid);

        // Test that de obligatory fields aren't empty
        $obligatoryarray = array('isbn', 'levelid', 'format', 'summary');
        foreach($obligatoryarray as $value) {
            if(empty($record->$value)) {
                throw new Exception('Required parameter <strong>'.$value.' not found!</strong>');
            }
        }

        $record->timemodified = time();
        if (!$bookid = $DB->get_field('rcommon_books','id',array('isbn'=>$record->isbn))) {
            $record->timecreated = $record->timemodified;
            return $DB->insert_record('rcommon_books', $record);
        } else {
            $record->id = $bookid;
            if($DB->update_record('rcommon_books', $record)){
                return $bookid;
            }
        }
        return false;
    }
}

class rcommon_unit{

    static function add_update($record){
        global $DB;

        // Check that unit name isn't larger than 200 characters
        if (textlib::strlen($record->name) > 200){
            $record->name = textlib::substr($record->name, 0, 200);
        }

        // Check that unit summary isn't larger than 1024 characters
        if (textlib::strlen($record->summary) > 1024){
            $record->summary = textlib::substr($record->summary, 0, 1024);
        }

        $record->timemodified = time();
        if (!$unitid = $DB->get_field('rcommon_books_units','id', array('bookid'=>$record->bookid, 'code'=>$record->code))) {
            $record->timecreated = $record->timemodified;
            return $DB->insert_record('rcommon_books_units', $record);
        } else {
            $record->id = $unitid;
            if($DB->update_record('rcommon_books_units', $record)){
                return $unitid;
            }
        }
        return false;
    }
}

class rcommon_activity{

    static function add_update($record){
        global $DB;

        // Check that unit activity isn't larger than 200 characters
        if (textlib::strlen($record->name) > 200){
            $record->name = textlib::substr($record->name, 0, 200);
        }

        // Check that unit summary isn't larger than 1024 characters
        if (textlib::strlen($record->summary) > 1024){
            $record->summary = textlib::substr($record->summary, 0, 1024);
        }

        $record->timemodified = time();

        $params = array('bookid'=>$record->bookid, 'unitid'=>$record->unitid, 'code'=>$record->code);
        if (!$activityid = $DB->get_field('rcommon_books_activities','id', $params)) {
            $record->timecreated = $record->timemodified;
            return $DB->insert_record('rcommon_books_activities', $record);
        } else {
            $record->id = $activityid;
            if($DB->update_record('rcommon_books_activities', $record)){
                return $activityid;
            }
        }
        return false;
    }
}


class credentials{

    static function get($id){
        global $DB;
        $cred = $DB->get_record('rcommon_user_credentials', array('id' => $id));

        if(!$cred || !self::check_empty_credential($cred)){
            return false;
        }
        return $cred;
    }

    static function get_by_user_isbn($userid, $isbn){
        global $DB;

        $cred = $DB->get_record('rcommon_user_credentials', array('isbn'=>$isbn, 'euserid' => $userid));
        if(!$cred || !self::check_empty_credential($cred)){
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
