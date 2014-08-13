<?php
require_once dirname(__FILE__) . '/quizzes/lib/com/wiris/quizzes/api/Configuration.interface.php';

class MoodleConfiguration implements com_wiris_quizzes_api_Configuration{
    
    function get($key){
        global $CFG;
        if($key == 'quizzes.cache.dir') {
            return $CFG->dataroot . '/filter/wiris/cache';
        }
        if($key == 'quizzes.proxy.url') {
            return $CFG->wwwroot . '/question/type/wq/quizzes/service.php';
        }
        if($key == 'quizzes.referer.url') {
            global $COURSE;
            $query = '';
            if(isset($COURSE->id)){
                $query .= '?course=' . $COURSE->id;
            }
            if(isset($COURSE->category)) {
                $query .= empty($query) ? '?' : '&';
                $query .= 'category=' . $COURSE->category;
            }
            return $CFG->wwwroot . $query;
	}
        return NULL;        
    }
    
}

?>
