<?php
require_once($CFG->dirroot . '/question/type/wq/lib.php');
require_once($CFG->dirroot . '/question/type/multianswer/question.php');
require_once($CFG->dirroot . '/question/type/wq/step.php');

class qtype_multianswerwiris_question extends qtype_multianswer_question {
    
    public function __construct() {
        parent::__construct();
        $this->step = new qtype_wirisstep();
    }

    public function start_attempt(question_attempt_step $step, $variant) {
        $sub = '';
        $subgenfeed = '';
        $subcorrectfeed = '';
        $subincorrectfeed = '';
        $subpartcorrectfeed = '';
        foreach($this->subquestions as $key => $value){
            $sub .= $this->subquestions[$key]->questiontext . ' ';
            $subgenfeed .= $this->subquestions[$key]->generalfeedback . ' ';
            $class = get_class($this->subquestions[$key]->qtype);
            if ($class == 'qtype_multichoicewiris'){
                $subcorrectfeed .= $this->subquestions[$key]->correctfeedback . ' ';
                $subincorrectfeed .= $this->subquestions[$key]->incorrectfeedback . ' ';
                $subpartcorrectfeed .= $this->subquestions[$key]->partiallycorrectfeedback . ' ';
            }
        }
        
        $qi = wrsqz_get_question_instance(null, 'mathml', $this, $this->questiontext . ' ' . $sub . ' ' . $this->generalfeedback . ' ' .
                $subgenfeed . ' ' . $subcorrectfeed . ' ' . $subincorrectfeed . ' ' . $subpartcorrectfeed, null, $variant);
        $step->set_qt_var('_qi', $qi->serialize());
        $randomSeed = $qi->instance->userData->randomSeed;

        parent::start_attempt($step, $randomSeed+100000);
        
        $this->step->load($step);
    }
    
    public function grade_response(array $response) {
        if ($this->step->is_attempt_limit_reached()) {
            // Do not grade and tell teacher to do so...
            return array(null,question_state::$needsgrading);
        }
        try {
            $r = parent::grade_response($response);
            $this->step->reset_attempts();
        } catch (moodle_exception $ex) {
            $this->step->inc_attempts();
            throw $ex;
        }
        return $r;
    }

    public function get_expected_data() {
        $expected = array();
        foreach ($this->subquestions as $i => $subq) {
            $substep = $this->get_substep(null, $i);
            foreach ($subq->get_expected_data() as $name => $type) {
                if ($subq->qtype->name() == 'multichoicewiris' && $subq->layout == qtype_multichoice_base::LAYOUT_DROPDOWN) {
                    $expected[$substep->add_prefix($name)] = PARAM_RAW;
                } else {
                    $expected[$substep->add_prefix($name)] = $type;
                }
            }
        }
        $expected['_sqi'] = PARAM_RAW_TRIMMED;
        return $expected;
    }    
    
    public function summarise_response(array $response) {
        if (isset($response['answer'])) {
            return 'Student answer not previewable.';
            //return $response['answer'];
        } else {
            return null;
        }
    }    

    public function get_question_summary() {
        $summary = $this->html_to_text($this->questiontext, $this->questiontextformat);
        foreach ($this->subquestions as $i => $subq) {
            switch ($subq->qtype->name()) {
                case 'multichoicewiris':
                    $choices = array();
                    $dummyqa = new question_attempt($subq, $this->contextid);
                    foreach ($subq->get_order($dummyqa) as $ansid) {
                        $choices[] = $this->html_to_text($subq->answers[$ansid]->answer,
                                $subq->answers[$ansid]->answerformat);
                    }
                    $answerbit = '{' . implode('; ', $choices) . '}';
                    break;
                case 'numerical':
                case 'shortanswerwiris':
                    $answerbit = '_____';
                    break;
                default:
                    $answerbit = '{ERR unknown sub-question type}';
            }
            $summary = str_replace('{#' . $i . '}', $answerbit, $summary);
        }
        return $summary;
    }
 
    public function apply_attempt_state(question_attempt_step $step) {
        $this->step->load($step);
        foreach ($this->subquestions as $i => $subq) {
            if (get_class($subq->qtype) == 'qtype_shortanswerwiris'){
                //$subq->wrsqz_set_random_seed($randomSeed);
                $subq->apply_attempt_state($this->get_substep($step, $i));
            }else if (get_class($subq->qtype) == 'qtype_multichoicewiris'){
                $subq->apply_attempt_state($this->get_substep($step, $i));
            }
        }
    }
    
}
?>
