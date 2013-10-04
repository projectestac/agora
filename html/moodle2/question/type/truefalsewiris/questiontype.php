<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/questiontype.php');
require_once($CFG->dirroot . '/question/type/truefalse/questiontype.php');

class qtype_truefalsewiris extends qtype_wq {

    public function __construct() {
        parent::__construct(new qtype_truefalse());
    }

    public function create_editing_form($submiturl, $question, $category, $contexts, $formeditable) {
        global $CFG;
        require_once($CFG->dirroot . '/question/type/truefalsewiris/edit_truefalsewiris_form.php');
        $wform = $this->base->create_editing_form($submiturl, $question, $category, $contexts, $formeditable);
        return new qtype_truefalsewiris_edit_form($wform, $submiturl, $question, $category, $contexts, $formeditable);
    }    
    
    public function menu_name() {
        return $this->local_name();
    }    

    public function display_question_editing_page($mform, $question, $wizardnow) {
        //This method is used to load tiny_mce.js before quizzes.js
        parent::display_question_editing_page($mform, $question, $wizardnow);
        global $PAGE;
        $PAGE->requires->js('/question/type/wq/quizzes/service.php?name=quizzes.js&service=resource');
    }
    
    protected function initialise_question_instance(question_definition $question, $questiondata) {
        parent::initialise_question_instance($question, $questiondata);
    }
    
    public function save_question_options($question) {
        global $DB;
        
        if (!isset($question->correctanswer)){
            $question->correctanswer = 0;
        }
        
        parent::save_question_options($question);
        
        $wiris = $DB->get_record('qtype_wq', array('question' => $question->id));
        $wiris->options = $question->wirisoverrideanswer;
        $DB->update_record('qtype_wq', $wiris);     
        
        return true;
    }       

    public function export_to_xml($question, qformat_xml $format, $extra=null) {
        global $DB;
        $correctanswer = $DB->get_record('qtype_wq', array('question' => $question->id), 'options')->options;
        
        $expout = $format->write_answers($question->options->answers);        
        $expout .= parent::export_to_xml($question, $format);
        $expout .= "    <wirisoverrideanswer>\n";
        $expout .= "<![CDATA[" . $correctanswer . "]]>\n";
        $expout .= "    </wirisoverrideanswer>\n";
        
        return $expout;
    }    
    
    public function import_from_xml($data, $question, qformat_xml $format, $extra=null) {
        if (isset($question) && $question == 0){
            return false;
        }
        if (isset($data['#']['wirisquestion']) && substr($data['#']['wirisquestion'][0]['#'], 0, 9) == '«session'){
            //Moodle 1.9
            $text = $data['#']['questiontext'][0]['#']['text'][0]['#'];
            $text = $this->wrsqz_adapttext($text);
            $data['#']['questiontext'][0]['#']['text'][0]['#'] = $text;            
            $qo = $format->import_truefalse($data);
            $qo->qtype = 'truefalsewiris';
            $wirisquestion = '<question><wirisCasSession>';
            $wirisquestion .= htmlspecialchars($this->wrsqz_mathmlDecode(trim($data['#']['wirisquestion'][0]['#'])), ENT_COMPAT, "UTF-8");
            $wirisquestion .= '</wirisCasSession>';
            
            
            if (count($data['#']['wirisoptions'][0]['#']) > 0){
                $wirisquestion .= '<localData>';    
                $wirisquestion .= $this->wrsqz_getCASForComputations($data);
                $wirisquestion .= $this->wrsqz_hiddenInitialCASValue($data);
                $wirisquestion .= '</localData>';
            }            
            
            $wirisquestion .= '</question>';
            $qo->wirisquestion[0] = $wirisquestion;
            if (isset($data['#']['wirisoverrideanswer'])){
                $qo->wirisoverrideanswer = trim($data['#']['wirisoverrideanswer'][0]['#']);    
            }
            return $qo;
        }else{
            //Moodle 2.x
            $qo = $format->import_truefalse($data);
            $qo->qtype = 'truefalsewiris';
            $qo->wirisquestion[0] = trim($data['#']['wirisquestion'][0]['#']);
            if (isset($data['#']['wirisoverrideanswer'])){
                $qo->wirisoverrideanswer = trim($this->decode_html_entities($data['#']['wirisoverrideanswer'][0]['#']));
            }
            return $qo;
        }            
    }    
    
}