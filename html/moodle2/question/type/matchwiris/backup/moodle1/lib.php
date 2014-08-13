<?php
defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->dirroot . '/question/type/wq/quizzes/quizzes.php');
require_once($CFG->dirroot . '/question/type/wq/lib.php');

/**
 * Matching WIRIS question type conversion handler
 */
class moodle1_qtype_matchwiris_handler extends moodle1_qtype_match_handler {

    /**
     * @return array
     */
    public function get_question_subpaths() {
        return array(
            'MATCHOPTIONS',
            'MATCHS/MATCH',
            'MATCHWIRIS',
            'MATCHWIRIS/WIRISOPTIONS'
        );
    }

    /**
     * Appends the matchwiris specific information to the question
     */
    public function process_question(array $data, array $raw) {
        parent::process_question($data, $raw);
        
        $data['actualmatchwiris']['id'] = $this->converter->get_nextid();
        
        $wirisprogram = '<question><wirisCasSession>';
        $wirisprogram .= htmlspecialchars(wrsqz_mathmlDecode($data['matchwiris'][0]['wirisprogram']), ENT_COMPAT, "utf-8");
        $wirisprogram .= '</wirisCasSession>';
        
        if (isset($data['matchwiris'][0]['wirisoptions']) && count($data['matchwiris'][0]['wirisoptions']) > 0){
            $wirisprogram .= '<localData>';
            $wirisprogram .= $this->wrsqz_getCASForComputations($data);
            $wirisprogram .= $this->wrsqz_hiddenInitialCASValue($data);
            $wirisprogram .= '</localData>';
        }        
        
        $wirisprogram .= '</question>';
        $data['actualmatchwiris']['xml'] = $wirisprogram;
        $this->write_xml('question_xml', $data['actualmatchwiris'], array('/question_xml/id'));        
    }
    
    function wrsqz_getCASForComputations($data){
        global $CFG;
        $wrap = com_wiris_system_CallWrapper::getInstance();
        
        $wirisquestion = '';
        if (isset($data['matchwiris'][0]['wirisoptions'][0]['wiriscasforcomputations'])){
            if ($data['matchwiris'][0]['wirisoptions'][0]['wiriscasforcomputations'] == 1){
                $wrap->start();
                $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS . '">';
                $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_ADD;
                $wrap->stop();
                $wirisquestion .= '</data>';
            }else if ($data['matchwiris'][0]['wirisoptions'][0]['wiriscasforcomputations'] == 2){
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
        if (isset($data['matchwiris'][0]['wirisoptions'][0]['hiddeninitialcasvalue'])){
            $wrap->start();
            $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_CAS_INITIAL_SESSION . '">';
            $wrap->stop();
            $initialCASValue = $data['matchwiris'][0]['wirisoptions'][0]['hiddeninitialcasvalue'];
            $wirisquestion .= htmlspecialchars(wrsqz_mathmlDecode(trim($initialCASValue)), ENT_COMPAT, "UTF-8");
            $wirisquestion .= '</data>';
        }
        
        return $wirisquestion;
    }    
    
}
