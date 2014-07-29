<?php
require_once($CFG->dirroot . '/question/type/wq/quizzes/quizzes.php');

class qtype_wq_question extends question_with_responses {
    /**
     * @var question_definition
     *   The base question.
     * **/
    public $base;
    
    /**
     * @var com_wiris_quizzes_api_Question
     *   The com.wiris.quizzes.api.Question object for this question.
     * **/
    public $wirisquestion;
    
    /**
     * @var com_wiris_quizzes_api_QuestionInstance
     *   The com.wiris.quizzes.api.QuestionInstance object for the current 
     *   attempt.
     * **/
    public $wirisquestioninstance;
    
    public function __construct(question_definition $base = NULL){
        $this->base = $base;
    }
    /**
     * Initializes WIRIS question calling the service in order to get the value
     * of the variables to render the question.
     * 
     * @param question_attempt_step $step
     *   The attempt step.
     * @param int $variant 
     *   The random seed to be used in this question.
     * **/
    public function start_attempt(question_attempt_step $step, $variant){
        $this->base->start_attempt($step, $variant);
        
        //Get variables from WIRIS quizzes service.
        
        //TODO: Do not call service when there aren't variables to request. This
        //      could be done also in WIRIS quizzes generic.
        
        $builder = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
        $text = $this->join_all_text();
        $this->wirisquestioninstance = $builder->newQuestionInstance();
        $this->wirisquestioninstance->setRandomSeed($variant);
        
        //This is for testing, it's never used in production.
        global $CFG;
        if (isset($CFG->wq_random_seed) && $CFG->wq_random_seed!='false') {
            $this->wirisquestioninstance->setRandomSeed($CFG->wq_random_seed);
            set_config('wq_random_seed', 'false');
        }
        
        // Do the call.
        $request = $builder->newVariablesRequest($text, $this->wirisquestion, $this->wirisquestioninstance);
        $response = $this->call_wiris_service($request);
        $this->wirisquestioninstance->update($response);
        // Save the result.
        $step->set_qt_var('_qi', $this->wirisquestioninstance->serialize());
    }
    /**
     * Initializes a question from an intermediate state. It reads the question
     * instance form the saved XML and updates the plotter image cache if 
     * necessary.
     * **/
    public function apply_attempt_state(question_attempt_step $step) {
        $this->base->apply_attempt_state($step);
        // Recover the questioninstance variable saved on start_attempt().
        $xml = $step->get_qt_var('_qi');
        $builder = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
        $this->wirisquestioninstance = $builder->readQuestionInstance($xml);
        
        // Be sure that plotter images don't got removed, and recompute them 
        // otherwise.
        
        // ToDo: put it in WIRIS quizzes generic API with name areVariablesReady().
        $wrap = com_wiris_system_CallWrapper::getInstance();
        $wrap->start();
        $ready = $this->wirisquestioninstance->instance->isCacheReady();
        $wrap->stop();
        
        if (!$ready){
            //We make a new request to the service if plotter images are not cached.
            $request = $builder->newVariablesRequest($this->join_all_text(), $this->wirisquestion, $this->wirisquestioninstance);
            $response = $this->call_wiris_service($request);
            $this->wirisquestioninstance->update($response);
            // We don't need to save this question instance in database because 
            // only the plotter image files were updated.
        }
    }
    
    public function get_question_summary() {
        $text = $this->base->get_question_summary();
        return $this->expand_variables_text($text);
    }
    
    public function get_num_variants() {
        if ($this->wirisquestion->getAlgorithm() != null) {
            return 65536;
        }
        else {
            return 1;
        }
    }
    
    public function get_min_fraction() {
        return $this->base->get_min_fraction();
    }
    
    public function get_max_fraction() {
        return $this->base->get_max_fraction();
    }
    
    public function clear_wrong_from_response(array $response) {
        return $this->base->clear_wrong_from_response($response);
    }
    
    public function get_num_parts_right(array $response) {
        return $this->base->get_num_parts_right($response);
    }
    
    public function get_expected_data() {
        $expected = $this->base->get_expected_data();
        $expected['_sqi'] = PARAM_RAW_TRIMMED;
        return $expected;  
    }
    
    public function get_correct_response() {
        return $this->base->get_correct_response();
    }
    
    public function prepare_simulated_post_data($simulatedresponse) {
        return $this->base->prepare_simulated_post_data($simulatedresponse);
    }
    
    public function format_text($text, $format, $qa, $component, $filearea, $itemid, $clean = false) {
        if ($format == FORMAT_PLAIN) {
            $text = $this->base->format_text($text, $format, $qa, $component, $filearea, $itemid, $clean);
            $format = FORMAT_HTML;
        }
        $text = $this->expand_variables($text);
        return $this->base->format_text($text, $format, $qa, $component, $filearea, $itemid, $clean);
    }
    
    public function expand_variables($text) {
        if (isset($this->wirisquestioninstance)) {
            $text = $this->wirisquestioninstance->expandVariables($text);
        }
        return $text;
    }
    
    public function expand_variables_text($text) {
        if (isset($this->wirisquestioninstance)) {
            $text = $this->wirisquestioninstance->expandVariablesText($text);
        }
        return $text;
    }
    
    public function expand_variables_mathml($text) {
        if (isset($this->wirisquestioninstance)) {
            $text = $this->wirisquestioninstance->expandVariablesMathML($text);
        }
        return $text;
    }
    
    public function html_to_text($text, $format) {
        return $this->base->html_to_text($text, $format);
    }
    
    public function check_file_access($qa, $options, $component, $filearea, $args, $forcedownload){
        return $this->base->check_file_access($qa, $options, $component, $filearea, $args, $forcedownload);
    }
    
    /**
     * question_response_answer_comparer interface.
     * **/
    public function compare_response_with_answer(array $response, question_answer $answer) {
        return $this->base->compare_response_with_answer($response, $answer);
    }
    public function get_answers(){
        return $this->base->get_answers();
    }
    /**
     * question_manually_gradable interface
     * **/
    public function is_complete_response(array $response){
        return $this->base->is_complete_response($response);
    }
    
    public function is_same_response(array $prevresponse, array $newresponse){
        $baseresponse = $this->base->is_same_response($prevresponse, $newresponse);
        return $baseresponse && (
               (empty($newresponse['_sqi']) && empty($prevresponse['_sqi'])) 
            || (!empty($prevresponse['_sqi']) && !empty($newresponse['_sqi']) && $newresponse['_sqi'] == $prevresponse['_sqi'])
                                );
        
    }
    
    public function summarise_response(array $response){
        $text = $this->base->summarise_response($response);
        $text = $this->expand_variables_text($text);
        return $text;
    }
    
    public function classify_response(array $response){
        return $this->base->classify_response($response);
    }
    /**
     * question_automatically_gradable interface
     * **/
    public function is_gradable_response(array $response){
        return $this->base->is_gradable_response($response);
    }
    
    public function get_validation_error(array $response){
        return $this->base->get_validation_error($response);
    }
    
    public function grade_response(array $response){
        return $this->base->grade_response($response);
    }
    
    public function get_hint($hintnumber, question_attempt $qa){
        return $this->base->get_hint($hintnumber, $qa);
    }
    
    public function get_right_answer_summary(){
        $text = $this->base->get_right_answer_summary();
        return $this->expand_variables_text($text);
    }
    public function format_hint(question_hint $hint, question_attempt $qa){
        return $this->format_text($hint->hint, $hint->hintformat, $qa,
                'question', 'hint', $hint->id);
    }
    /**
     * interface question_automatically_gradable_with_countback
     * **/
    public function compute_final_grade($responses, $totaltries){
        return $this->base->compute_final_grade($responses, $totaltries);
    }
    public function make_behaviour(question_attempt $qa, $preferredbehaviour){
        return $this->base->make_behaviour($qa, $preferredbehaviour);
    }
    
    /**
     * Custom interface.
     * **/
    
    /**
     * @return All the text of the question in a single string so WIRIS quizzes
     * can extract the variable placeholders.
     */
    public function join_all_text() {
        // Question text and general feedback.
        $text = $this->questiontext . ' ' . $this->generalfeedback;
        // Hints.
        foreach ($this->hints as $hint) {
           $text .= ' ' . $hint->hint; 
        }
        
        return $text;
    }
    
    function call_wiris_service($request) {
        global $COURSE;
        global $USER;
        
        $builder = com_wiris_quizzes_api_QuizzesBuilder::getInstance();
        
        $request->addMetaProperty('questionref', (!empty($COURSE) ? $COURSE->id : '') . '/' . (!empty($question) ? $question->id : ''));
        $request->addMetaProperty('userref', (!empty($USER) ? $USER->id : ''));

        $service = $builder->getQuizzesService();
        
        try {
            $response = $service->execute($request);
        } catch(Exception $e) {
            global $CFG;
            global $_POST;
            
            $a = new stdClass();
            $a->questionname = $this->name;
            
            $link = null;
            if (isset($_POST['cmid'])){
                $link = $CFG->wwwroot . '/mod/quiz/view.php?id=' . $_POST['cmid'];
            }
            
            throw new moodle_exception('wirisquestionincorrect', 'qtype_wq', $link, $a, '');
        }
        
        return $response;
    }
}