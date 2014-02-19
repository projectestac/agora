<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/questiontype.php');
require_once($CFG->dirroot . '/question/type/multichoice/questiontype.php');


class qtype_multichoicewiris extends qtype_wq {
    
    public function __construct() {
        parent::__construct(new qtype_multichoice());
    }    
    
    public function create_editing_form($submiturl, $question, $category, $contexts, $formeditable) {
        global $CFG;
        require_once($CFG->dirroot . '/question/type/multichoicewiris/edit_multichoicewiris_form.php');
        $wform = $this->base->create_editing_form($submiturl, $question, $category, $contexts, $formeditable);
        return new qtype_multichoicewiris_edit_form($wform, $submiturl, $question, $category, $contexts, $formeditable);
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
    
    protected function make_question_instance($questiondata) {
        question_bank::load_question_definition_classes($this->name());
        if ($questiondata->options->single) {
            $class = 'qtype_multichoicewiris_single_question';
        } else {
            $class = 'qtype_multichoicewiris_multi_question';
        }
        return new $class();
    }    
    
    public function export_to_xml($question, qformat_xml $format, $extra=null) {
        $expout = "    <single>" . $format->get_single($question->options->single) .
                "</single>\n";
        $expout .= "    <shuffleanswers>" .
                $format->get_single($question->options->shuffleanswers) .
                "</shuffleanswers>\n";
        $expout .= "    <answernumbering>" . $question->options->answernumbering .
                "</answernumbering>\n";
        $expout .= $format->write_combined_feedback($question->options, $question->id, $question->contextid);
        $expout .= $format->write_answers($question->options->answers);        
        $expout .= parent::export_to_xml($question, $format);
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
            $qo = $format->import_multichoice($data);
            $qo->qtype = 'multichoicewiris';
            $wirisquestion = '<question><wirisCasSession>';
            $wirisquestion .= htmlspecialchars($this->wrsqz_mathmlDecode(trim($data['#']['wirisquestion'][0]['#'])), ENT_COMPAT, "UTF-8");
            $wirisquestion .= '</wirisCasSession>';
            
            if (isset($data['#']['wirisoptions']) && count($data['#']['wirisoptions'][0]['#']) > 0){
                $wirisquestion .= '<localData>';    
                $wirisquestion .= $this->wrsqz_getCASForComputations($data);
                $wirisquestion .= $this->wrsqz_hiddenInitialCASValue($data);
                $wirisquestion .= '</localData>';
            }            
            
            if (isset($data['#']['wirisoverrideanswer']) && $data['#']['wirisoverrideanswer'][0]['#'] != ""){
                $overrideAnswers = explode(';', $data['#']['wirisoverrideanswer'][0]['#']);
                foreach($overrideAnswers as $key => $value){
                    if (trim($value) != ''){
                        $msg = '<p><strong>' . get_string('warning') . '</strong>:<br />';
                        $msg .= '<em>' . $data['#']['name'][0]['#']['text'][0]['#'] . '</em><br />';
                        $msg .= get_string('multichoicewiris_cantimportoverride', 'qtype_multichoicewiris');
                        $msg .= '</p>';
                        echo $msg;
                    }
                }
            }
            
            $wirisquestion .= '</question>';
            $qo->wirisquestion[0] = $wirisquestion;
            return $qo;
        }else{
            //Moodle 2.x
            $qo = $format->import_multichoice($data);
            $qo->qtype = 'multichoicewiris';
            $qo->wirisquestion[0] = trim($this->decode_html_entities($data['#']['wirisquestion'][0]['#']));
            return $qo;
        }            
    }
}

?>
