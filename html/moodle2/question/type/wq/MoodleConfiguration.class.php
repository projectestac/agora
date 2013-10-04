<?php
require_once dirname(__FILE__) . '/quizzes/lib/com/wiris/quizzes/api/Configuration.interface.php';

class MoodleConfiguration implements com_wiris_quizzes_api_Configuration{
    
    function get($key){
        global $CFG;
        if($key == "quizzes.cache.dir") {
                return $CFG->dataroot . "/filter/wiris/cache";
        }
        if($key == "quizzes.proxy.url") {
                return $CFG->wwwroot . "/question/type/wq/quizzes/service.php";
        }
        return NULL;        
    }
    
}

?>
