<?php
require_once($CFG->dirroot . '/question/type/wq/renderer.php');
require_once($CFG->dirroot . '/question/type/match/renderer.php');

class qtype_matchwiris_helper_renderer extends qtype_match_renderer {
    
    protected function format_choices($question) {
        $choices = parent::format_choices($question);
        
        foreach ($choices as $key => $choice) {
            $choices[$key] = $question->expand_variables_text($choice);
        }
        
        return $choices;
    }
}

class qtype_matchwiris_renderer extends qtype_wq_renderer {
    public function __construct(moodle_page $page, $target) {
        parent::__construct(new qtype_matchwiris_helper_renderer($page, $target), $page, $target);
    }
    
}

?>
