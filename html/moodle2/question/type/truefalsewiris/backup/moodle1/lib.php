<?php
defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->dirroot . '/question/type/wq/quizzes/quizzes.php');
require_once($CFG->dirroot . '/question/type/wq/lib.php');

class moodle1_qtype_truefalsewiris_handler extends moodle1_qtype_truefalse_handler{
    
    public function get_question_subpaths() {
        return array(
            'ANSWERS/ANSWER',
            'TRUEFALSE',
            'TRUEFALSEWIRIS',
            'TRUEFALSEWIRIS/WIRISOPTIONS'
        );
    }    
    
    public function process_question(array $data, array $raw) {
        parent::process_question($data, $raw);
        
        $data['actualtruefalsewiris']['id'] = $this->converter->get_nextid();
        
        $wirisprogram = '<question><wirisCasSession>';
        $wirisprogram .= htmlspecialchars(wrsqz_mathmlDecode($data['truefalsewiris'][0]['wirisprogram']), ENT_COMPAT, "utf-8");
        $wirisprogram .= '</wirisCasSession>';
        
        if (isset($data['truefalsewiris'][0]['wirisoptions']) && count($data['truefalsewiris'][0]['wirisoptions']) > 0){
            $wirisprogram .= '<localData>';
            $wirisprogram .= $this->wrsqz_getCASForComputations($data);
            $wirisprogram .= $this->wrsqz_hiddenInitialCASValue($data);
            $wirisprogram .= '</localData>';
        }        
        
        $wirisprogram .= '</question>';
        
        $wirisoverrideanswer = $data['truefalsewiris'][0]['wirisoverrideanswer'];
        
        $data['actualtruefalsewiris']['xml'] = $wirisprogram;
        $data['actualtruefalsewiris']['options'] = $wirisoverrideanswer;
        
        $this->write_xml('question_xml', $data['actualtruefalsewiris'], array('/question_xml/id'));
    }  
    
    function wrsqz_getCASForComputations($data){
        $wrap = com_wiris_system_CallWrapper::getInstance();
        
        $wirisquestion = '';
        $wrap->start();
        if (isset($data['truefalsewiris'][0]['wirisoptions'][0]['wiriscasforcomputations'])){
            if ($data['truefalsewiris'][0]['wirisoptions'][0]['wiriscasforcomputations'] == 1){
                $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS . '">';
                $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_ADD;
                $wirisquestion .= '</data>';
            }else if ($data['truefalsewiris'][0]['wirisoptions'][0]['wiriscasforcomputations'] == 2){
                $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS . '">';
                $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_REPLACE_INPUT;
                $wirisquestion .= '</data>';            
            }
        }else{
            $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS . '">';
            $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_FALSE;
            $wirisquestion .= '</data>';            
        }
        $wrap->stop();
        return $wirisquestion;
    }
    
    function wrsqz_hiddenInitialCASValue($data){
        $wrap = com_wiris_system_CallWrapper::getInstance();
        
        $wirisquestion = '';
        if (isset($data['truefalsewiris'][0]['wirisoptions'][0]['hiddeninitialcasvalue'])){
            $wrap->start();
            $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_CAS_INITIAL_SESSION . '">';
            $wrap->stop();
            $initialCASValue = $data['truefalsewiris'][0]['wirisoptions'][0]['hiddeninitialcasvalue'];
            $wirisquestion .= htmlspecialchars(wrsqz_mathmlDecode(trim($initialCASValue)), ENT_COMPAT, "utf-8");
            $wirisquestion .= '</data>';
        }
        
        return $wirisquestion;
    }    
        
}
?>
