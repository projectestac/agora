<?PHP //$Id: analytics.php,v 1.0 2009/08/20 10:48:52 moodler Exp $

//incloïm el lib que calgui
//require_once dirname(__FILE__).'/lib.php';


//bloc de llistat d'opcions que s'ofereixen
class block_admin_service extends block_list {

    function init() {
        /* Important!!
		 * S'ha de poder adaptar les consultes al DATA
		 * Per fer-ho s'ha de poder fer la sequente SQL per posar el camp DATA
		 * 	ALTER TABLE mdl_analytics_sessions
		 *		ADD COLUMN time_executed2 timestamp with time zone DEFAULT now();
		 */
    	$this->title = 'Analytics';
        $this->version = 2009082000;
    }

    function instance_config($instance) {
        parent::instance_config($instance);
        $this->title = 'Analytics';
    }

    function applicable_formats() {
        return array('site' => true);
    }

 	
    function get_content() {
        global $CFG, $USER, $COURSE;

		if (empty($this->instance->pageid)) { // sticky
            if (!empty($COURSE)) {
                $this->instance->pageid = $COURSE->id;
            }
        }

        if (empty($this->instance)) {
            return $this->content = '';
        } else if ($this->instance->pageid == SITEID) {
            // return $this->content = '';
        }

        if (!empty($this->instance->pageid)) {
            $context = get_context_instance(CONTEXT_COURSE, $this->instance->pageid);
            if ($COURSE->id == $this->instance->pageid) {
                $course = $COURSE;
            } else {
                $course = get_record('course', 'id', $this->instance->pageid);
            }
        } else {
            $context = get_context_instance(CONTEXT_SYSTEM);
            $course = $SITE;
        }
        	// cal limitar els rols que el poden veure?

    	if (has_capability('moodle/legacy:admin', $context, $USER->id, false)){	
    //    	$this->course = get_record('course', 'id', $this->instance->pageid);*/
        	
	        if($this->content !== NULL){
	        	return $this->content;
	        }

	        $this->content = new stdClass;
	        $this->content->items = array();
	        $this->content->icons = array();
	        $this->content->footer = '';
	
	        $this->load_content_for_site();
	        
	        return $this->content;
    	}
    }
    
	function load_content_for_site() {
        global $CFG;
        //accés a rendiment
		$this->content->items[] = '<a href="blocks/admin_service/rendiment/index.php">'.get_string('rendiment','block_admin_service').'</a>';
		$this->content->icons[] = '<img src="'.$CFG->pixpath.'/i/item.gif"/>';
		//accés als indicadors
		$this->content->items[] = '<a href="blocks/admin_service/indicadors/index.php">'.get_string('indicadors','block_admin_service').'</a>';
		$this->content->icons[] = '<img src="'.$CFG->pixpath.'/i/item.gif"/>';
		//accés a la configuració
		$this->content->items[] = '<a href="blocks/admin_service/config/index.php">'.get_string('config','block_admin_service').'</a>';
		$this->content->icons[] = '<img src="'.$CFG->pixpath.'/i/item.gif"/>';
	}
	
}

?>
