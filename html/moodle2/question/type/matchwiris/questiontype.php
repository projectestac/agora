<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/questiontype.php');
require_once($CFG->dirroot . '/question/type/match/questiontype.php');

class qtype_matchwiris extends qtype_wq {

    public function __construct() {
        parent::__construct(new qtype_match());
    }    

    public function create_editing_form($submiturl, $question, $category, $contexts, $formeditable) {
        global $CFG;
        require_once($CFG->dirroot . '/question/type/matchwiris/edit_matchwiris_form.php');
        $wform = $this->base->create_editing_form($submiturl, $question, $category, $contexts, $formeditable);
        return new qtype_matchwiris_edit_form($wform, $submiturl, $question, $category, $contexts, $formeditable);
    }
    
    public function initialise_question_instance(question_definition $question, $questiondata) {
        parent::initialise_question_instance($question, $questiondata);
        $question->shufflestems = &$question->base->shufflestems;
        $question->correctfeedback = &$question->base->correctfeedback;
        $question->correctfeedbackformat = &$question->base->correctfeedbackformat;
        $question->partiallycorrectfeedback = &$question->base->partiallycorrectfeedback;
        $question->partiallycorrectfeedbackformat = &$question->base->partiallycorrectfeedbackformat;
        $question->incorrectfeedback = &$question->base->incorrectfeedback;
        $question->incorrectfeedbackformat = &$question->base->incorrectfeedbackformat;
        $question->stems = &$question->base->stems;
        $question->choices = &$question->base->choices;
        $question->right = &$question->base->right;
        $question->stemformat = &$question->base->stemformat;
    }
    
    public function export_to_xml($question, qformat_xml $format, $extra=null) {
        $fs = get_file_storage();
        $contextid = $question->contextid;
        $expout = "    <shuffleanswers>" . $format->get_single($question->options->shuffleanswers) . "</shuffleanswers>\n";
        $expout .= $format->write_combined_feedback($question->options, $question->id, $question->contextid);
        foreach ($question->options->subquestions as $subquestion) {
            $files = $fs->get_area_files($contextid, 'qtype_match',
                    'subquestion', $subquestion->id);
            $expout .= "    <subquestion " .
                    $format->format($subquestion->questiontextformat) . ">\n";
            $expout .= $format->writetext($subquestion->questiontext, 3);
            $expout .= $format->write_files($files);
            $expout .= "      <answer>\n";
            $expout .= $format->writetext($subquestion->answertext, 4);
            $expout .= "      </answer>\n";
            $expout .= "    </subquestion>\n";
        }
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
            $qo = $format->import_match($data);
            $qo->qtype = 'matchwiris';
            $wirisquestion = '<question><wirisCasSession>';
            $wirisquestion .= htmlspecialchars($this->wrsqz_mathmlDecode(trim($data['#']['wirisquestion'][0]['#'])), ENT_COMPAT, "UTF-8");
            $wirisquestion .= '</wirisCasSession>';

            if (isset($data['#']['wirisoptions']) && count($data['#']['wirisoptions'][0]['#']) > 0){
                $wirisquestion .= '<localData>';    
                $wirisquestion .= $this->wrsqz_getCASForComputations($data);
                $wirisquestion .= $this->wrsqz_hiddenInitialCASValue($data);
                $wirisquestion .= '</localData>';
            }            
            
            $wirisquestion .= '</question>';
            $qo->wirisquestion = $wirisquestion;
            return $qo;
        }else{
            //Moodle 2.x
            $qo = $format->import_match($data);
            $qo->qtype = 'matchwiris';
            $qo->wirisquestion = trim($this->decode_html_entities($data['#']['wirisquestion'][0]['#']));
            return $qo;
        }            
    }    
    
}

?>
