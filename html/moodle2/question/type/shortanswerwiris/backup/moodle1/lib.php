<?php
defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->dirroot . '/question/type/wq/quizzes/quizzes.php');
require_once($CFG->dirroot . '/question/type/wq/lib.php');

class moodle1_qtype_shortanswerwiris_handler extends moodle1_qtype_shortanswer_handler{
    /**
     * @return array
     */
    public function get_question_subpaths() {
        return array(
            'ANSWERS/ANSWER',
            'SHORTANSWER',
            'SHORTANSWERWIRIS',
            'SHORTANSWERWIRIS/WIRISOPTIONS',
        );
    }

    /**
     * Appends the shortanswerwiris specific information to the question
     */
    public function process_question(array $data, array $raw) {
        //$wirisquestion = '';
        $isCompound = false;
        $originalAnswerText = '';
        
        if (isset($data['shortanswerwiris'][0]['wiriseditor'])){
            $wiriseditor = array();
            parse_str($data['shortanswerwiris'][0]['wiriseditor'], $wiriseditor);
            if (isset($wiriseditor['multipleAnswers']) && $wiriseditor['multipleAnswers'] == true){
                $isCompound = true;
            }
        }        
        
        if ($isCompound){
            foreach ($data['answers']['answer'] as $key => $value){
                $originalAnswerText = $value['answer_text'];
                $answerText = $this->wrsqz_convertForCompound($originalAnswerText);
                $data['answers']['answer'][$key]['answer_text'] = $answerText;
            }
        }
        
        parent::process_question($data, $raw);

        $data['actualshortanswerwiris']['id'] = $this->converter->get_nextid();
        
        $wirisprogram = '<question><wirisCasSession>';
        $wirisprogram .= htmlspecialchars(wrsqz_mathmlDecode($data['shortanswerwiris'][0]['wirisprogram']), ENT_COMPAT, "utf-8");
        $wirisprogram .= '</wirisCasSession>';
        
        $wirisprogram .= '<correctAnswers>';
        foreach($data['answers'] as $key=>$value){
            $answerText = $value[0]['answer_text'];
            $wirisprogram .= '<correctAnswer type="mathml">';    
            if ($isCompound){
                $wirisprogram .= htmlspecialchars($answerText, ENT_COMPAT, "utf-8");
            }else{
                $wirisprogram .= trim($answerText);
            }            
            $wirisprogram .= '</correctAnswer>';
        }
        $wirisprogram .= '</correctAnswers>';
        
        if (isset($data['shortanswerwiris'][0]['wiriseditor'])){
            $wirisprogram .= $this->wrsqz_getExtraParameters($data, $isCompound, $originalAnswerText);
        }
        $wirisprogram .= '</question>';
        $data['actualshortanswerwiris']['xml'] = $wirisprogram;
        $this->write_xml('question_xml', $data['actualshortanswerwiris'], array('/question_xml/id'));
    }    
    
    function wrsqz_getCASForComputations($data){
        $wrap = com_wiris_system_CallWrapper::getInstance();
        
        $wirisquestion = '';
        if (isset($data['shortanswerwiris'][0]['wirisoptions'][0]['wiriscasforcomputations'])){
            if ($data['shortanswerwiris'][0]['wirisoptions'][0]['wiriscasforcomputations'] == 1){
                $wrap->start();
                $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS . '">';
                $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_ADD;
                $wrap->stop();
                $wirisquestion .= '</data>';
            }else if ($data['shortanswerwiris'][0]['wirisoptions'][0]['wiriscasforcomputations'] == 2){
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
        $wrap = com_wiris_system_CallWrapper::getInstance();
        
        $wirisquestion = '';
        if (isset($data['shortanswerwiris'][0]['wirisoptions'][0]['hiddeninitialcasvalue'])){
            $wrap->start();
            $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_CAS_INITIAL_SESSION . '">';
            $wrap->stop();
            $initialCASValue = $data['shortanswerwiris'][0]['wirisoptions'][0]['hiddeninitialcasvalue'];
            $wirisquestion .= htmlspecialchars(wrsqz_mathmlDecode(trim($initialCASValue)), ENT_COMPAT, "UTF-8");
            $wirisquestion .= '</data>';
        }
        
        return $wirisquestion;
    }
    
    function wrsqz_getExtraParameters($data, $isCompound, $originalAnswerText){
        $wrap = com_wiris_system_CallWrapper::getInstance();
        
        //Grade function
        $wiriseditor = array();
        parse_str($data['shortanswerwiris'][0]['wiriseditor'], $wiriseditor);     
        
        $wirisprogram = '';
        
        if (count($wiriseditor) > 0){
            $wirisprogram .= '<assertions>';
            if (isset($wiriseditor['testFunctionName'])){
                foreach($data['answers']['answer'] as $key => $value){
                    $wirisprogram .= '<assertion name="syntax_expression" correctAnswer="' . $key . '"/>';
                }
                foreach ($wiriseditor['testFunctionName'] as $key => $value){
                    $wirisprogram .= '<assertion name="equivalent_function" correctAnswer="' . $key . '">';
                    $wirisprogram .= '<param name="name">' . $value . '</param>';
                    $wirisprogram .= '</assertion>';
                }                    
            }else{
                foreach($data['answers']['answer'] as $key => $value){
                    $wirisprogram .= '<assertion name="syntax_expression" correctAnswer="' . $key . '"/>';
                    $wirisprogram .= '<assertion name="equivalent_symbolic" correctAnswer="' . $key . '"/>';                
                }
            }
            $wirisprogram .= '</assertions>';    

            //Editor and compound answer
            $wirisprogram .= '<localData>';
            if (!$isCompound){
                if (isset($wiriseditor['editor']) && $wiriseditor['editor'] == true){
                    $wrap->start();
                    $wirisprogram .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_INPUT_FIELD . '">';
                    $wirisprogram .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_INLINE_EDITOR;
                    $wrap->stop();
                    $wirisprogram .= '</data>';
                }else{
                    $wrap->start();
                    $wirisprogram .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_INPUT_FIELD . '">';
                    $wirisprogram .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT;
                    $wrap->stop();
                    $wirisprogram .= '</data>';
                }
            }else{
                $wrap->start();
                $wirisprogram .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_INPUT_FIELD . '">';
                $wirisprogram .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_POPUP_EDITOR;
                $wirisprogram .= '</data>';
                
                $wirisprogram .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER_GRADE . '">';
                $wirisprogram .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTE;
                $wirisprogram .= '</data>';                
                
                $distribution = $this->wrsqz_getDistribution($originalAnswerText);
                $wirisprogram .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTION . '">';
                if ($distribution != ''){
                    $wirisprogram .= $distribution;
                }
                $wirisprogram .= '</data>';                
                $wrap->stop();
            }
            if (isset($wiriseditor['multipleAnswers']) && $wiriseditor['multipleAnswers'] == true){
                $wrap->start();
                $wirisprogram .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER . '">';
                $wirisprogram .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE;
                $wrap->stop();
                $wirisprogram .= '</data>';
            }else{
                $wrap->start();
                $wirisprogram .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_COMPOUND_ANSWER . '">';
                $wirisprogram .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_COMPOUND_ANSWER_FALSE;
                $wrap->stop();
                $wirisprogram .= '</data>';
            }

            if (isset($data['shortanswerwiris'][0]['wirisoptions']) && count($data['shortanswerwiris'][0]['wirisoptions']) > 0){
                $wirisprogram .= $this->wrsqz_getCASForComputations($data);
                $wirisprogram .= $this->wrsqz_hiddenInitialCASValue($data);
            }                

            $wirisprogram .= '</localData>';

        }else{
            $wirisprogram .= '<localData>';
            if (isset($data['shortanswerwiris'][0]['wirisoptions']) && count($data['shortanswerwiris'][0]['wirisoptions']) > 0){
                $wirisprogram .= $this->wrsqz_getCASForComputations($data);
                $wirisprogram .= $this->wrsqz_hiddenInitialCASValue($data);
            }    
            $wrap->start();
            $wirisprogram .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_OPENANSWER_INPUT_FIELD . '">';
            $wirisprogram .= com_wiris_quizzes_impl_LocalData::$VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT;
            $wirisprogram .= '</data>';                    
            $wrap->stop();            
            $wirisprogram .= '</localData>';
        }
        
        return $wirisprogram;
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
?>
