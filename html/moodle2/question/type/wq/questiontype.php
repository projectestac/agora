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
        // We don't save another xml if we are in a cloze subquestion.
        if (empty($question->parent)) {
            $wiris = $DB->get_record('qtype_wq', array('question' => $question->id));
            if (empty($wiris->id)) {
                $wiris = new stdClass();
                $wiris->question = $question->id;
                $wiris->xml = $question->wirisquestion;
                $wiris->hash = '';
                $wiris->options = '';
                $wiris->id = $DB->insert_record('qtype_wq', $wiris);
            }
            else {
                $wiris->xml = $question->wirisquestion;
                $wiris->hash = '';
                $wiris->options = '';
                $DB->update_record('qtype_wq', $wiris);     
            }    
        }
        // Save question type options after wiris XML becaus if it fails we at
        // least have saved the WIRIS part (relevant in multianswer case).
        return $this->base->save_question_options($question);
    }    
    
    public function delete_question($questionid, $contextid) {
        global $DB;
        
        $this->base->delete_question($questionid, $contextid);
        $DB->delete_records('qtype_wq', array('question'=>$questionid));
    }

    public function get_question_options($question) {
        global $DB, $OUTPUT;
        if($this->base->get_question_options($question) === false) {
            return false;
        }
        // Load question XML from DB.
        if(empty($question->parent)){
            $record = $DB->get_record('qtype_wq', array('question' => $question->id), 'xml,options');
            if($record !== false) {
                $question->options->wirisquestion = $record->xml;
                $question->options->wirisoptions = $record->options;
            } else {
                $OUTPUT->notification('Failed to load WIRIS quizzes XML definition for question id ' . $question->id . '.');
                return false;
            }
        }
        return true;
    }
    
    protected function make_question_instance($questiondata) {
        question_bank::load_question_definition_classes($this->name());
        $basequestion = $this->base->make_question_instance($questiondata);
        $class = 'qtype_' . $this->name() . '_question';
        return new $class($basequestion);
    }
    
    protected function initialise_question_instance(question_definition $question, $questiondata) {
        $this->base->initialise_question_instance($question->base, $questiondata);
        
        $question->id = &$question->base->id;
        $question->category = &$question->base->category;
        $question->contextid = &$question->base->contextid;
        $question->parent = &$question->base->parent;
        // Fix question type.
        $question->qtype = $this;
        $question->name = &$question->base->name;
        $question->questiontext = &$question->base->questiontext;
        $question->questiontextformat = &$question->base->questiontextformat;
        $question->generalfeedback = &$question->base->generalfeedback;
        $question->generalfeedbackformat = &$question->base->generalfeedbackformat;
        $question->defaultmark = &$question->base->defaultmark;
        $question->length = &$question->base->length;
        $question->penalty = &$question->base->penalty;
        $question->stamp = &$question->base->stamp;
        $question->version = &$question->base->version;
        $question->hidden = &$question->base->hidden;
        $question->timecreated = &$question->base->timecreated;
        $question->timemodified = &$question->base->timemodified;
        $question->createdby = &$question->base->createdby;
        $question->modifiedby = &$question->base->modifiedby;
        $question->hints = &$question->base->hints;
        
        // Load question xml into WIRIS quizzes API question object.
        if(empty($question->parent)){
            $builder = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
            $question->wirisquestion = $builder->readQuestion($questiondata->options->wirisquestion);
        }
    }
    
    //This method has to be overriden in each real question
    public function menu_name() {
        // Include JavaScript Hack to modify question chooser.
        global $CFG;
        global $PAGE;
        if ($CFG->version < 2014051200) {
            // Backwards compatibility.
            $PAGE->requires->js('/question/type/wq/js/display.js',false);
        }
        else {
            // New moodle-standard way.
            $PAGE->requires->yui_module('moodle-qtype_wq-question_chooser', 'M.qtype_wq.question_chooser.init');
        }
        
        
        return $this->local_name();
    }
    
    public function display_question_editing_page($mform, $question, $wizardnow) {
        //This method is used to load tiny_mce.js before quizzes.js
        parent::display_question_editing_page($mform, $question, $wizardnow);
        global $PAGE;
        $PAGE->requires->js('/question/type/wq/quizzes/service.php?name=quizzes.js&service=resource');
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
        $wrap = com_wiris_system_CallWrapper::getInstance();
        
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
        $wrap = com_wiris_system_CallWrapper::getInstance();

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