<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/questiontype.php');
require_once($CFG->dirroot . '/question/type/multianswer/questiontype.php');

class qtype_multianswerwiris extends qtype_wq {

    public function __construct() {
        parent::__construct(new qtype_multianswer());
    }
    
    public function save_question_options($question) {
        global $DB;
        
        // Delete old subquestions. The Moodle implementation is somewhat more
        // efficient because it reuses the questions, but we do that way so we
        // can call base method.
        
        $oldidsseq = $DB->get_field('question_multianswer', 'sequence', array('question' => $question->id));
        if(!empty($oldidsseq)) {
            $oldids = explode(',', $oldidsseq);
            foreach($oldids as $id) {
                question_delete_question($id);
            }
        }
        parent::save_question_options($question);
    }
    
    public function save_question($authorizedquestion, $form) {
        $question = qtype_multianswer_extract_question($form->questiontext);
        $question->qtype = 'multianswerwiris';
        
        foreach($question->options->questions as $key => $value){
            if ($question->options->questions[$key]->qtype != 'numerical'){
                $question->options->questions[$key]->qtype = $value->qtype . 'wiris';    
            }
        }
        
        if (isset($authorizedquestion->id)) {
            $question->id = $authorizedquestion->id;
        }

        $question->category = $authorizedquestion->category;
        $form->defaultmark = $question->defaultmark;
        $form->questiontext = $question->questiontext;
        $form->questiontextformat = 0;
        $form->options = clone($question->options);
        unset($question->options);
        return parent::save_question($question, $form);
    }
    
    public function create_editing_form($submiturl, $question, $category, $contexts, $formeditable) {
        global $CFG;
        require_once($CFG->dirroot . '/question/type/multianswerwiris/edit_multianswerwiris_form.php');
        $wform = $this->base->create_editing_form($submiturl, $question, $category, $contexts, $formeditable);
        return new qtype_multianswerwiris_edit_form($wform, $submiturl, $question, $category, $contexts, $formeditable);
    }
    
    public function initialise_question_instance(question_definition $question, $questiondata) {
        parent::initialise_question_instance($question, $questiondata);
        
        $question->subquestions = $question->base->subquestions;
        // Add WIRIS quizzes question to subquestions
        foreach($question->subquestions as $key => $subquestion){
            if (substr($subquestion->get_type_name(),-5) == 'wiris') {
                $question->subquestions[$key]->wirisquestion = $question->wirisquestion;
            }
        }
        // Change wiris subquestions by moodle standard implementation in base object.
        foreach($question->base->subquestions as $key => $subquestion) {
            if(isset($subquestion->base)){
                // put maxmark to base. It was set up by multianswer 
                // get_question_options because subquestions don't have entry
                // to quiz_question_instance table.
                $subquestion->base->maxmark = &$subquestion->maxmark;
                $question->base->subquestions[$key] = $subquestion->base;
            }
        }
        $question->places = &$question->base->places;
        $question->textfragments = &$question->base->textfragments;      
    }

    public function export_to_xml($question, qformat_xml $format, $extra=null) {
        $expout = '';
        $expout .= "    <wirissubquestions>\n";
        
        foreach ($question->options->questions as $key => $value){
            $expout .= "        <wirissubquestion>\n";
            if (isset($value->questiontext)){
                $expout .= "            <![CDATA[" . $value->questiontext . "]]>\n";    
            }
            $expout .= "        </wirissubquestion>\n";
        }
        
        $expout .= "    </wirissubquestions>\n";
        $expout .= parent::export_to_xml($question, $format);
        return $expout;
    }    
    
    public function import_from_xml($data, $question, qformat_xml $format, $extra=null) {
        if (isset($question) && $question == 0){
            return false;
        }
        if (isset($data['#']['wirisquestion']) && substr($data['#']['wirisquestion'][0]['#'], 0, 9) == '«session'){
            //Moodle 1.9
            $text = $data['#']['wirisquestiontext'][0]['#']['text'][0]['#'];
            $text = $this->wrsqz_adapttext($text);
            $data['#']['questiontext'][0]['#']['text'][0]['#'] = $text;            
            $qo = $format->import_multianswer($data);
            $qo->qtype = 'multianswerwiris';
            
            foreach($qo->options->questions as $key => $value){
                if ($value->qtype != 'numerical'){
                    $qo->options->questions[$key]->qtype = $value->qtype . 'wiris';
                }
            }
            
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
            if (isset($data['#']['wirissubquestions'])){
                foreach ($data['#']['wirissubquestions']['0']['#']['wirissubquestion'] as $index => $subq) {
                    $pos = $index + 1;
                    $text = $data['#']['questiontext']['0']['#']['text']['0']['#'];
                    $data['#']['questiontext']['0']['#']['text']['0']['#'] = preg_replace('~{#' . $pos . '}~', trim($subq['#']), $text);
                }
            }
            
            $qo = $format->import_multianswer($data);
            $qo->qtype = 'multianswerwiris';
            
            foreach($qo->options->questions as $key => $value){
                if ($value->qtype != 'numerical'){
                    $qo->options->questions[$key]->qtype = $value->qtype . 'wiris';
                }
            }
            
            $qo->wirisquestion = trim($this->decode_html_entities($data['#']['wirisquestion'][0]['#']));
            return $qo;
        }            
    }     
    
}
?>
