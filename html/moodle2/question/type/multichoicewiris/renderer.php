<?php
require_once($CFG->dirroot . '/question/type/multichoice/renderer.php');
require_once($CFG->dirroot . '/question/type/wq/renderer.php');


class qtype_multichoicewiris_single_renderer extends qtype_wq_renderer {
    public function __construct(moodle_page $page, $target){
        parent::__construct(new qtype_multichoice_single_renderer($page, $target), $page, $target);
    }
}


class qtype_multichoicewiris_multi_renderer extends qtype_wq_renderer {
    public function __construct(moodle_page $page, $target){
        parent::__construct(new qtype_multichoice_multi_renderer($page, $target), $page, $target);
    }
}

?>
