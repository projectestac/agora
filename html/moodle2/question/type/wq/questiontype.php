<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/config.php');
require_once($CFG->dirroot . '/question/type/wq/quizzes/quizzes.php');

class qtype_wq extends question_type {
    
    protected $base;
        
    public function __construct(question_type $base = NULL){
        $this->base = $base;
    }
    
    public function create_editing_form($submiturl, $question, $category, $contexts, $formeditable) {
        global $CFG;
        require_once($CFG->dirroot . '/question/type/wq/edit_wq_form.php');
        $wform = $this->base->create_editing_form($submiturl, $question, $category, $contexts, $formeditable);
        return new qtype_wq_edit_form($wform, $submiturl, $question, $category, $contexts, $formeditable);
    }

    public function save_question_options($question) {
        global $DB;
        
        //Multianswerwiris has his own save_question_options
        //Other types can use the standard Moodle function
        if ($question->qtype != 'multianswerwiris'){
            $this->base->save_question_options($question);    
        }
        
        //We don't save another xml if we are in a cloze subquestion
        if (isset($question->parent) && $question->parent > 0){
            return true;
        }
        
        $wiris = $DB->get_record('qtype_wq', array('question' => $question->id));
        
        if (empty($wiris->id)){
            $wiris = new stdClass();
            $wiris->question = $question->id;
            $wiris->xml = $question->wirisquestion[0];
            $wiris->hash = '';
            $wiris->options = '';
            $wiris->id = $DB->insert_record('qtype_wq', $wiris);
        }else{
            $wiris->xml = $question->wirisquestion[0];
            $wiris->hash = '';
            $wiris->options = '';
            $DB->update_record('qtype_wq', $wiris);     
        }

        return true;
    }    
    
    public function delete_question($questionid, $contextid) {
        global $DB;
        
        $this->base->delete_question($questionid, $contextid);
        $DB->delete_records('qtype_wq', array('question'=>$questionid));
    }

    public function get_question_options($question) {
        return $this->base->get_question_options($question);
    }    
    
    //Added $question->qtype = $this; to use shortanswerwiris
    protected function initialise_question_instance(question_definition $question, $questiondata) {
        $this->base->initialise_question_instance($question, $questiondata);
        $question->qtype = $this;
    }    
    
    //This method has to be overriden in each real question
    public function menu_name() {
        global $PAGE;
        $PAGE->requires->js('/question/type/wq/js/display.js',false);
        return $this->local_name();
    }
    
    public function export_to_xml($question, qformat_xml $format, $extra=null) {
        global $DB;
        $xml = $DB->get_record('qtype_wq', array('question' => $question->id), 'xml')->xml;
        
        $expout = "    <wirisquestion>\n";
        $expout .=  htmlspecialchars($xml, ENT_COMPAT, "UTF-8");
        $expout .= "    </wirisquestion>\n";
        
        return $expout;
    }
    
    public function extra_question_fields() {
        return $this->base->extra_question_fields();
    }    
    
    function wrsqz_mathmlDecode($input) {
        $from = array('«', '»', '¨', '§', '`');
        $to = array('<', '>', '"', '&', '\'');
        $r = str_replace($from, $to, $input);
        return $this->decode_html_entities($r);
    }
    
    protected function wrsqz_adapttext($text){
        $n0 = 0;
        $n1 = stripos($text, '«math');
        if ($n1 === false){
            return $text;
        }
        $output = '';
        while($n1 !== false) {
            $output .= substr($text, $n0, $n1 - $n0);
            $n0 = $n1;
            $n1 = stripos($text, '«/math»', $n0)+8;
            $innertext = substr($text, $n0, $n1 - $n0);
            $innertext = str_replace('&quot;', '¨', $innertext);
            $output .= $innertext;
            $n0 = $n1;
            $n1 = stripos($text, '«math', $n0);
        }
        $output .= substr($text, $n0);
        return $output;
    }
    
    function wrsqz_getCASForComputations($data){
        global $CFG;
        $wrap = com_wiris_quizzes_wrap_Wrapper::getInstance();
        
        $wirisquestion = '';
        if (isset($data['#']['wirisoptions'][0]['#']['wirisCASForComputations'])){
            if ($data['#']['wirisoptions'][0]['#']['wirisCASForComputations'][0]['#'] == 1){
                $wrap->start();
                $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS . '">';
                $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_ADD;
                $wirisquestion .= '</data>';
                $wrap->stop();
            }else if ($data['#']['wirisoptions'][0]['#']['wirisCASForComputations'][0]['#'] == 2){
                $wrap->start();
                $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS . '">';
                $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_REPLACE_INPUT;
                $wrap->stop();
                $wirisquestion .= '</data>';            
            }
        }else{
            $wrap->start();
            $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS . '">';
            $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_FALSE;
            $wrap->stop();
            $wirisquestion .= '</data>';            
        }
        return $wirisquestion;
    }
    
    function wrsqz_hiddenInitialCASValue($data){
        global $CFG;
        $wrap = com_wiris_quizzes_wrap_Wrapper::getInstance();

        $wirisquestion = '';
        if (isset($data['#']['wirisoptions'][0]['#']['hiddenInitialCASValue'])){
            $wrap->start();
            $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_CAS_INITIAL_SESSION . '">';
            $wrap->stop();
            $initialCASValue = $data['#']['wirisoptions'][0]['#']['hiddenInitialCASValue'][0]['#'];
            $wirisquestion .= htmlspecialchars($this->wrsqz_mathmlDecode(trim($initialCASValue)), ENT_COMPAT, "utf-8");
            $wirisquestion .= '</data>';
        }
        
        return $wirisquestion;
    }
    
    function decode_html_entities($xml) {
        $htmlentitiestable = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES, 'UTF-8');
        $xmlentitiestable = get_html_translation_table(HTML_SPECIALCHARS , ENT_COMPAT, 'UTF-8');
        $entitiestable = array_diff($htmlentitiestable, $xmlentitiestable);
        $decodetable = array_flip($entitiestable);
        $xml = str_replace(array_keys($decodetable), array_values($decodetable), $xml);
        return $xml;
    }       
    
}