<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/questiontype.php');
require_once($CFG->dirroot . '/question/type/multianswer/questiontype.php');

class qtype_multianswerwiris extends qtype_wq {

    public function __construct() {
        parent::__construct(new qtype_multianswer());
    }    
    
    public function create_editing_form($submiturl, $question, $category, $contexts, $formeditable) {
        global $CFG;
        require_once($CFG->dirroot . '/question/type/multianswerwiris/edit_multianswerwiris_form.php');
        $wform = $this->base->create_editing_form($submiturl, $question, $category, $contexts, $formeditable);
        return new qtype_multianswerwiris_edit_form($wform, $submiturl, $question, $category, $contexts, $formeditable);
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

    public function save_question_options($question) {
        global $DB;

        // This function needs to be able to handle the case where the existing set of wrapped
        // questions does not match the new set of wrapped questions so that some need to be
        // created, some modified and some deleted
        // Unfortunately the code currently simply overwrites existing ones in sequence. This
        // will make re-marking after a re-ordering of wrapped questions impossible and
        // will also create difficulties if questiontype specific tables reference the id.

        // First we get all the existing wrapped questions
        if (!$oldwrappedids = $DB->get_field('question_multianswer', 'sequence',
                array('question' => $question->id))) {
            $oldwrappedquestions = array();
        } else {
            $oldwrappedquestions = $DB->get_records_list('question', 'id',
                    explode(',', $oldwrappedids), 'id ASC');
        }

        $sequence = array();
        foreach ($question->options->questions as $wrapped) {
            if (!empty($wrapped)) {
                // if we still have some old wrapped question ids, reuse the next of them

                if (is_array($oldwrappedquestions) &&
                        $oldwrappedquestion = array_shift($oldwrappedquestions)) {
                    $wrapped->id = $oldwrappedquestion->id;
                    if ($oldwrappedquestion->qtype != $wrapped->qtype) {
                        switch ($oldwrappedquestion->qtype) {
                            case 'multichoicewiris':
                                $DB->delete_records('question_multichoice',
                                        array('question' => $oldwrappedquestion->id));
                                break;
                            case 'shortanswerwiris':
                                $DB->delete_records('question_shortanswer',
                                        array('question' => $oldwrappedquestion->id));
                                break;
                            case 'numerical':
                                $DB->delete_records('question_numerical',
                                        array('question' => $oldwrappedquestion->id));
                                break;
                            default:
                                throw new moodle_exception('qtypenotrecognized',
                                        'qtype_multianswer', '', $oldwrappedquestion->qtype);
                                $wrapped->id = 0;
                        }
                    }
                } else {
                    $wrapped->id = 0;
                }
            }
            $wrapped->name = $question->name;
            $wrapped->parent = $question->id;
            $previousid = $wrapped->id;
            // save_question strips this extra bit off the category again.
            $wrapped->category = $question->category . ',1';
            $wrapped = question_bank::get_qtype($wrapped->qtype)->save_question(
                    $wrapped, clone($wrapped));
            $sequence[] = $wrapped->id;
            if ($previousid != 0 && $previousid != $wrapped->id) {
                // for some reasons a new question has been created
                // so delete the old one
                question_delete_question($previousid);
            }
        }

        // Delete redundant wrapped questions
        if (is_array($oldwrappedquestions) && count($oldwrappedquestions)) {
            foreach ($oldwrappedquestions as $oldwrappedquestion) {
                question_delete_question($oldwrappedquestion->id);
            }
        }

        if (!empty($sequence)) {
            $multianswer = new stdClass();
            $multianswer->question = $question->id;
            $multianswer->sequence = implode(',', $sequence);
            if ($oldid = $DB->get_field('question_multianswer', 'id',
                    array('question' => $question->id))) {
                $multianswer->id = $oldid;
                $DB->update_record('question_multianswer', $multianswer);
            } else {
                $DB->insert_record('question_multianswer', $multianswer);
            }
        }

        $this->save_hints($question);
        parent::save_question_options($question);
    }    
    
    public function get_question_options($question) {
        $this->base->get_question_options($question);
        return true;        
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
            $qo->wirisquestion[0] = $wirisquestion;
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
            
            $qo->wirisquestion[0] = trim($this->decode_html_entities($data['#']['wirisquestion'][0]['#']));
            return $qo;
        }            
    }     
    
}
?>
