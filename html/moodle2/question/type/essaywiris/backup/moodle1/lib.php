<?php
defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->dirroot . '/question/type/wq/quizzes/quizzes.php');
require_once($CFG->dirroot . '/question/type/wq/lib.php');

/**
 * Essay WIRIS question type conversion handler
 */
class moodle1_qtype_essaywiris_handler extends moodle1_qtype_essay_handler {

    public function get_question_subpaths() {
        return array('ESSAYWIRIS', 'ESSAYWIRIS/WIRISOPTIONS');
    }
    
    
    /**
     * Appends the essay WIRIS specific information to the question
     */
    public function process_question(array $data, array $raw) {
        parent::process_question($data, $raw);

        $data['actualessaywiris']['id'] = $this->converter->get_nextid();
        
        $wirisprogram = '<question><wirisCasSession>';
        $wirisprogram .= htmlspecialchars(wrsqz_mathmlDecode($data['essaywiris'][0]['wirisprogram']), ENT_COMPAT, "utf-8");
        $wirisprogram .= '</wirisCasSession>';
        
        if (isset($data['essaywiris'][0]['wirisoptions']) && count($data['essaywiris'][0]['wirisoptions']) > 0){
            $wirisprogram .= '<localData>';
            $wirisprogram .= $this->wrsqz_getCASForComputations($data);
            $wirisprogram .= $this->wrsqz_hiddenInitialCASValue($data);
            $wirisprogram .= '</localData>';
        }
        
        $wirisprogram .= '</question>';
        $data['actualessaywiris']['xml'] = $wirisprogram;
        $this->write_xml('question_xml', $data['actualessaywiris'], array('/question_xml/id'));           
        
    }
    
    function wrsqz_getCASForComputations($data){
        global $CFG;
        $wrap = com_wiris_system_CallWrapper::getInstance();
        
        $wirisquestion = '';
        if (isset($data['essaywiris'][0]['wirisoptions'][0]['wiriscasforcomputations'])){
            if ($data['essaywiris'][0]['wirisoptions'][0]['wiriscasforcomputations'] == 1){
                $wrap->start();
                $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_SHOW_CAS . '">';
                $wirisquestion .= com_wiris_quizzes_impl_LocalData::$VALUE_SHOW_CAS_ADD;
                $wrap->stop();
                $wirisquestion .= '</data>';
            }else if ($data['essaywiris'][0]['wirisoptions'][0]['wiriscasforcomputations'] == 2){
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
        if (isset($data['essaywiris'][0]['wirisoptions'][0]['hiddeninitialcasvalue'])){
            $wrap->start();
            $wirisquestion .= '<data name="' . com_wiris_quizzes_impl_LocalData::$KEY_CAS_INITIAL_SESSION . '">';
            $wrap->stop();
            $initialCASValue = $data['essaywiris'][0]['wirisoptions'][0]['hiddeninitialcasvalue'];
            $wirisquestion .= htmlspecialchars(wrsqz_mathmlDecode(trim($initialCASValue)), ENT_COMPAT, "UTF-8");
            $wirisquestion .= '</data>';
        }
        
        return $wirisquestion;
    }
}
