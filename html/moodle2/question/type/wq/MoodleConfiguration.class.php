<?php
require_once dirname(__FILE__) . '/quizzes/lib/com/wiris/quizzes/api/Configuration.interface.php';

class MoodleConfiguration implements com_wiris_quizzes_api_Configuration{
    
    function get($key){
        global $CFG;

        // Inherit moodle proxy configuration.

        $moodleproxyenabled = isset($CFG->proxyhost) && !empty($CFG->proxyhost);
        $proxyportenabled = isset($CFG->proxyport) && !empty($CFG->proxyport);
        $proxyuserenabled = isset($CFG->proxyuser) && !empty($CFG->proxyuser);
        $proxypassenabled = isset($CFG->proxypassword) && !empty($CFG->proxypassword);

        if($key == 'quizzes.httpproxy.host' && $moodleproxyenabled) {
            return $CFG->proxyhost;
        }
        if($key == 'quizzes.httpproxy.port' && $moodleproxyenabled && $proxyportenabled) {
            return $CFG->proxyport;
        }
        if($key == 'quizzes.httpproxy.user' && $moodleproxyenabled && $proxyuserenabled) {
            return $CFG->proxyuser;
        }
        if ($key == 'quizzes.httpproxy.pass' && $moodleproxyenabled && $proxypassenabled) {
            return $CFG->proxypassword;
        }

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
