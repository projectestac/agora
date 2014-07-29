<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/wq/questiontype.php');
require_once($CFG->dirroot . '/question/type/shortanswer/questiontype.php');
require_once($CFG->dirroot . '/question/type/wq/quizzes/quizzes.php');

class qtype_shortanswerwiris extends qtype_wq {
    
    public function __construct() {
        parent::__construct(new qtype_shortanswer());
    }
    
    public function create_editing_form($submiturl, $question, $category, $contexts, $formeditable) {
        global $CFG;
        require_once($CFG->dirroot . '/question/type/shortanswerwiris/edit_shortanswerwiris_form.php');
        $wform = new qtype_shortanswerwiris_helper_edit_form($submiturl, $question, $category, $contexts, $formeditable);
        return new qtype_shortanswerwiris_edit_form($wform, $submiturl, $question, $category, $contexts, $formeditable);
    }
    public function initialise_question_instance(question_definition $question, $questiondata) {
        parent::initialise_question_instance($question, $questiondata);
        $question->answers = &$question->base->answers;
    }

    public function export_to_xml($question, qformat_xml $format, $extra=null) {
        $expout = "    <usecase>{$question->options->usecase}</usecase>\n";
        $expout .= $format->write_answers($question->options->answers);
        $expout .= parent::export_to_xml($question, $format);
        return $expout;
    }    
    
    public function import_from_xml($data, $question, qformat_xml $format, $extra=null) {
        $wrap = com_wiris_system_CallWrapper::getInstance();
        
        if (isset($question) && $question == 0){
            return false;
        }
        if (isset($data['#']['wirisquestion']) && substr($data['#']['wirisquestion'][0]['#'], 0, 9) == '«session'){
            //Import from Moodle 1.x            
            $isCompound = false;
            
            if (isset($data['#']['wiriseditor'])){
                $wiriseditor = array();
                parse_str($data['#']['wiriseditor'][0]['#'], $wiriseditor);
                if (isset($wiriseditor['multipleAnswers']) && $wiriseditor['multipleAnswers'] == true){
                    if (isset($wiriseditor['testFunctionName'])){
                        $msg = '<p><strong>' . get_string('warning') . '</strong>:<br />';
                        $msg .= '<em>' . $data['#']['name'][0]['#']['text'][0]['#'] . '</em><br />';
                        $msg .= get_string('shortanswerwiris_cantimportcompoundtest', 'qtype_shortanswerwiris');
                        $msg .= '</p>';
                        echo $msg;
                    }
                    $isCompound = true;
                }
            }
            
            $text = $data['#']['questiontext'][0]['#']['text'][0]['#'];
            $text = $this->wrsqz_adapttext($text);
            $data['#']['questiontext'][0]['#']['text'][0]['#'] = $text;
            $answers = $data['#']['answer'];
            foreach ($answers as $key => $value){
                $text = $answers[$key]['#']['feedback'][0]['#']['text'][0]['#'];
                $text = $this->wrsqz_adapttext($text);
                $data['#']['answer'][$key]['#']['feedback'][0]['#']['text'][0]['#'] = $text;
                if ($isCompound){
                    //Compound answers
                    //$originalText will be used to check if there's a distribution
                    $originalText = $answers[$key]['#']['text'][0]['#'];
                    $text = $this->wrsqz_convertForCompound($originalText);
                    $data['#']['answer'][$key]['#']['text'][0]['#'] = $text;
                }
            }
            $text = $data['#']['generalfeedback'][0]['#']['text'][0]['#'];
            $text = $this->wrsqz_adapttext($text);
            $data['#']['generalfeedback'][0]['#']['text'][0]['#'] = $text;
            $qo = parent::import_from_xml($data, $question, $format, $extra);
            $wirisquestion = '<question><wirisCasSession>';
            $wirisquestion .= htmlspecialchars($this->wrsqz_mathmlDecode(trim($data['#']['wirisquestion'][0]['#'])), ENT_COMPAT, "UTF-8");
            $wirisquestion .= '</wirisCasSession>';

            $wirisquestion .= '<correctAnswers>';
            
            foreach($data['#']['answer'] as $key=>$value){
                $answer_text = $value['#']['text'][0]['#'];
                $wirisquestion .= '<correctAnswer type="mathml">';    
                if ($isCompound){
                    $wirisquestion .= htmlspecialchars($answer_text, ENT_COMPAT, "UTF-8");
                }else{
                    $wirisquestion .= $answer_text;
                }
                $wirisquestion .= '</correctAnswer>';
            }
            
            $wirisquestion .= '</correctAnswers>';            
            
            
            if (isset($data['#']['wiriseditor'])){
                
                $wiriseditor = array();
                parse_str($data['#']['wiriseditor'][0]['#'], $wiriseditor);
                
                if (count($wiriseditor) > 0){
                    //Grade function
                    $wrap->start();
                    $wirisquestion .= '<assertions>';    
                    if (isset($wiriseditor['testFunctionName'])){
                        foreach($answers as $key => $value){
                            $wirisquestion .= '<assertion name="' . com_wiris_quizzes_impl_Assertion::$SYNTAX_EXPRESSION. '" correctAnswer="' . $key . '"/>';
                        }
                        foreach ($wiriseditor['testFunctionName'] as $key => $value){
                            $wirisquestion .= '<assertion name="' . com_wiris_quizzes_impl_Assertion::$EQUIVALENT_FUNCTION . '" correctAnswer="' . $key . '">';
                            if (substr($value, 0, 1) == '#'){
                                $value = substr($value, 1);
                            }
                            $wirisquestion .= '<param name="name">' . $value . '</param>';
                            $wirisquestion .= '</assertion>';
                        }
                    }else{
                        foreach($answers as $key => $value){
                            $wirisquestion .= '<assertion name="' . com_wiris_quizzes_impl_Assertion::$SYNTAX_EXPRESSION. '" correctAnswer="' . $key . '"/>';
                            $wirisquestion .= '<assertion name="' . com_wiris_quizzes_impl_Assertion::$EQUIVALENT_SYMBOLIC . '" correctAnswer="' . $key . '"/>';
                        }
                    }
                    $wirisquestion .= '</assertions>';    
                    $wrap->stop();
                    
                    //Editor and compound answer
                    $wirisquestion .= '<localData>';    
                    $wrap->start();
                    if (!$isCompound){
                        if (isset($wiriseditor['editor']) && $wiriseditor['editor'] == true){
                            $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_INPUT_FIELD . '">';
                            $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_INLINE_EDITOR;
                            $wirisquestion .= '</data>';
                        }else{
                            $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_INPUT_FIELD . '">';
                            $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT;
                            $wirisquestion .= '</data>';
                        }
                    }else{
                        //For compound answer set as default Popup editor
                        $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_INPUT_FIELD . '">';
                        $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_POPUP_EDITOR;
                        $wirisquestion .= '</data>';
                        
                        $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER_GRADE . '">';
                        $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTE;
                        $wirisquestion .= '</data>';

                        $distribution = $this->wrsqz_getDistribution($originalText);
                        $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTION . '">';
                        if ($distribution != ''){
                            $wirisquestion .= $distribution;
                        }
                        $wirisquestion .= '</data>';                        
                    }
                    if (isset($wiriseditor['multipleAnswers']) && $wiriseditor['multipleAnswers'] == true){
                        $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER . '">';
                        $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE;
                        $wirisquestion .= '</data>';
                    }else{
                        $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER . '">';
                        $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_FALSE;
                        $wirisquestion .= '</data>';
                    }
                    $wrap->stop();
                    if (isset($data['#']['wirisoptions']) && count($data['#']['wirisoptions'][0]['#']) > 0){
                        $wirisquestion .= $this->wrsqz_getCASForComputations($data);
                        $wirisquestion .= $this->wrsqz_hiddenInitialCASValue($data);
                    }
                    
                    $wirisquestion .= '</localData>';
                }else{
                    $wirisquestion .= '<localData>';    
                    if (isset($data['#']['wirisoptions']) && count($data['#']['wirisoptions'][0]['#']) > 0){
                        $wirisquestion .= $this->wrsqz_getCASForComputations($data);
                        $wirisquestion .= $this->wrsqz_hiddenInitialCASValue($data);
                    }
                    $wrap->start();
                    $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_INPUT_FIELD . '">';
                    $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT;
                    $wirisquestion .= '</data>';                    
                    $wrap->stop();
                    $wirisquestion .= '</localData>';
                }
            }
            $wirisquestion .= '</question>';
            $qo->wirisquestion = $wirisquestion;
        }else{
            //Import from Moodle 2.x
            $qo = $format->import_shortanswer($data);
            $qo->qtype = 'shortanswerwiris';
            $qo->wirisquestion = trim($this->decode_html_entities($data['#']['wirisquestion'][0]['#']));
        }        
        return $qo;
    }
    
    private function wrsqz_convertForCompound($text){
        $answerArray = array();
        $compoundanswertext = '<math xmlns="http://www.w3.org/1998/Math/MathML">';
        
        $text = trim($text);
        if (!strpos($text, '(')){
            $answerArray = explode(" ", $text);
            foreach($answerArray as $key => $value){
                if ($key != 0){
                    $compoundanswertext .= '<mspace linebreak="newline"/>';
                }
                $value = trim($value);
                $compoundanswertext .= '<mi>' . substr($value, 1) . '</mi><mo>=</mo><mi>' . $value . '</mi>';
            }
        }else{
            $answerArray = explode(")", $text);
            foreach($answerArray as $key => $value){
                if ($value != ''){
                    if ($key != 0){
                        $compoundanswertext .= '<mspace linebreak="newline"/>';
                    }
                    $openPar = strpos($value, '(');
                    $value = trim(substr($value, 0, $openPar));
                    $compoundanswertext .= '<mi>' . substr($value, 1) . '</mi><mo>=</mo><mi>' . $value . '</mi>';
                }
            }
        }
     
        $compoundanswertext .= '</math>';
        return $compoundanswertext;
    }
    
    private function wrsqz_getDistribution($text){
        $distribution = '';
        $text = trim($text);
        $answerArray = explode("#", $text);
        
        foreach($answerArray as $key => $value){
            if (strpos($value, '(')){
                $value = trim($value);
                $compoundArray = explode(" ", $value);
                $distribution .= $compoundArray[1] . ' ';
            }
        }
        $distribution = str_replace('(', '', $distribution);
        $distribution = str_replace(')', '', $distribution);
        return trim($distribution);
    }
    
}