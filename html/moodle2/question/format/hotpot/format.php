<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Import questions from Hot Potatoes 6 xml files into Moodle question bank
 *
 * @package questionbank
 * @subpackage importexport
 * @copyright 2010 onwards Gordon Bateson <gordon.bateson@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// get hotpot class - required for parsing HP files

defined('MOODLE_INTERNAL') || die();

if (file_exists($CFG->dirroot.'/mod/hotpot/locallib.php')) {
    require_once($CFG->dirroot.'/mod/hotpot/locallib.php');
}

/**
 * qformat_hotpot
 *
 * @copyright 2010 Gordon Bateson
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since     Moodle 2.0
 */
class qformat_hotpot extends qformat_default {

    /**
     * provide_import
     *
     * @return xxx
     */
    function provide_import()  {
        global $CFG;
        // disable import if the HotPot module does not exist
        // because we need "mod/hotpot/locallib.php"
        return file_exists($CFG->dirroot.'/mod/hotpot/locallib.php');
    }

    /**
     * mime_type
     *
     * @return xxx
     */
    public function mime_type() {
        return 'text/xml';
    }

    /**
     * readquestions
     *
     * @param xxx $lines
     * @param xxx $context (optional, default=null)
     * @return xxx
     */
    function readquestions ($lines, $context=null)  {
        /// Parses an array of lines into an array of questions,
        /// where each item is a question object as defined by
        /// readquestion().

        global $CFG;

        // get Hot Potatoes quiz type
        $quiztype = '';
        if ($pos = strrpos($this->realfilename, '.')) {
            $filetype = substr($this->realfilename, $pos+1);
            switch ($filetype) {
                case 'jcl': $quiztype = 'jcloze'; break;
                case 'jcw': $quiztype = 'jcross'; break;
                case 'jmt': $quiztype = 'jmatch'; break;
                case 'jmx': $quiztype = 'jmix'; break;
                case 'jqz': $quiztype = 'jquiz'; break;
            }
        }

        if ($quiztype=='') {
            $this->error('Input file not recognized as a Hot Potatoes XML file');
            return false;
        }

        $classfile = $CFG->dirroot.'/mod/hotpot/source/hp/6/'.$quiztype.'/xml/class.php';
        if (! file_exists($classfile)) {
            $this->error('HotPot import class file missing: '.$classfile);
            return false;
        }
        require_once($classfile);

        $classname = 'hotpot_source_hp_6_'.$quiztype.'_xml';
        if (! class_exists($classname)) {
            $this->error('HotPot import class missing: '.$classname);
            return false;
        }
        $source = new $classname(implode($lines, ' '), $this);

        // build XML tree for this HotPot
        $source->xml_get_filecontents();

        // convert xml to questions array
        $questions = array();
        switch ($quiztype) {
            case 'jcloze': $this->process_jcloze($source, $questions); break;
            case 'jcross': $this->process_jcross($source, $questions); break;
            case 'jmatch': $this->process_jmatch($source, $questions); break;
            case 'jmix'  : $this->process_jmix($source, $questions); break;
            case 'jquiz' : $this->process_jquiz($source, $questions); break;
        }

        if (count($questions)==0) {
            $this->error(get_string('giftnovalidquestion', 'quiz'));
            return false;
        }

        return $questions;
    }

    /**
     * process_jcloze
     *
     * @param xxx $source (passed by reference)
     * @param xxx $questions (passed by reference)
     */
    function process_jcloze(&$source, &$questions)  {
        // define default grade (per cloze gap)
        $defaultmark = 1;
        $gap_count = 0;

        if (strpos($source->filecontents, '<gap-fill><question-record>')) {
            $startwithgap = true;
        } else {
            $startwithgap = false;
        }

        // xml tags for the start of the gap-fill exercise
        $tags = 'data,gap-fill';

        $x = 0;
        while (($exercise = "[$x]['#']") && $source->xml_value($tags, $exercise)) {
            // there is usually only one exercise in a file

            $question = $this->defaultquestion();
            $question->qtype = 'multianswer';
            $question->name = $this->hotpot_get_title($source, $x, ($x>0));
            $question->questiontext = '';
            $question->questiontextformat = FORMAT_HTML;

            if (intval($source->xml_value('hotpot-config-file,'.$source->hbs_quiztype.',use-drop-down-list'))) {
                $dropdownlist = $this->hotpot_jcloze_wordlist($source);
                $answertype = 'multichoice';
            } else {
                $dropdownlist = false;
                $answertype = 'shortanswer';

                // add wordlist, if required (not required if we are using dropdowns)
                if (intval($source->xml_value('hotpot-config-file,'.$source->hbs_quiztype.',include-word-list'))) {
                    $question->questiontext .= '<p class="hotpotwordlist">'.implode(' ', $this->hotpot_jcloze_wordlist($source)).'</p>';
                }
            }

            // add reading, if any
            $question->questiontext .= $this->hotpot_get_reading($source);

            $question->course = $this->course->id;
            $question->options = new stdClass();
            $question->options->questions = array(); // one for each gap

            $q = 0;
            $looping = true;
            while ($looping) {

                // get next bit of text
                $questiontext = $source->xml_value($tags, $exercise."[$q]");
                $questiontext = $this->hotpot_prepare_str($questiontext);

                // get next gap
                $gap_marker = '';
                $question_record = $exercise."['question-record'][$q]['#']";
                if ($source->xml_value($tags, $question_record)) {

                    // add gap marker
                    $gap_count++;
                    $gap_marker = '{#'.($q+1).'}';

                    // initialize gap details
                    $gap = new stdClass();
                    $gap->qtype = $answertype; // leave as lower case
                    $gap->defaultmark = $defaultmark; // Moodle 2.1+
                    $gap->defaultgrade = $defaultmark; // Moodle 2.0
                    $gap->usecase = 0;
                    $gap->answer = array();
                    $gap->fraction = array();
                    $gap->feedback = array();

                    if ($answertype=='multichoice') {
                        $gap->single = 1;
                        $gap->answernumbering = 0;
                        $gap->shuffleanswers = 0;
                        $gap->correctfeedback = array('text'=>'', 'format'=>FORMAT_HTML);
                        $gap->incorrectfeedback = array('text'=>'', 'format'=>FORMAT_HTML);
                        $gap->partiallycorrectfeedback = array('text'=>'', 'format'=>FORMAT_HTML);
                    }

                    // add answers
                    $answers = array();
                    if ($dropdownlist) {
                        $a = 0;
                        $correcttext = '';
                        $correctfeedback = '';
                        while (($answer=$question_record."['answer'][$a]['#']") && $source->xml_value($tags, $answer)) {
                            if (intval($source->xml_value($tags,  $answer."['correct'][0]['#']"))) {
                                $correcttext = $this->hotpot_prepare_str($source->xml_value($tags,  $answer."['text'][0]['#']"));
                                $correctfeedback = $this->hotpot_prepare_str($source->xml_value($tags,  $answer."['feedback'][0]['#']"));
                                break;
                            }
                            $a++;
                        }

                        foreach ($dropdownlist as $text) {
                            if ($text==$correcttext) {
                                $fraction = 1;
                                $feedback = $correctfeedback;
                            } else {
                                $fraction = 0;
                                $feedback = '';
                            }
                            $gap->answer[] = array('text' => $text, 'format' => FORMAT_HTML);
                            $gap->fraction[] = $fraction;
                            $gap->feedback[] = array('text' => $feedback, 'format' => FORMAT_HTML);
                            $answers[] = ($fraction==0 ? '' : '=').$text.($feedback=='' ? '' : ('#'.$feedback));
                        }
                    } else {
                        $a = 0;
                        while (($answer=$question_record."['answer'][$a]['#']") && $source->xml_value($tags, $answer)) {
                            $text = $this->hotpot_prepare_str($source->xml_value($tags,  $answer."['text'][0]['#']"));
                            $correct = $source->xml_value($tags,  $answer."['correct'][0]['#']");
                            $feedback = $this->hotpot_prepare_str($source->xml_value($tags,  $answer."['feedback'][0]['#']"));
                            if (strlen($text)) {
                                // set score (0=0%, 1=100%)
                                $fraction = empty($correct) ? 0 : 1;
                                // store answer
                                $gap->answer[] = $text;
                                $gap->fraction[] = $fraction;
                                $gap->feedback[] = array('text' => $feedback, 'format' => FORMAT_HTML);
                                $answers[] = (empty($fraction) ? '' : '=').$text.(empty($feedback) ? '' : ('#'.$feedback));
                            }
                            $a++;
                        }
                    }
                    // compile answers into question text
                    $gap->questiontext = array(
                        'text' => '{'.$defaultmark.':'.strtoupper($answertype).':'.implode('~', $answers).'}',
                        'format' => FORMAT_MOODLE,
                    );
                    $question->options->questions[] = $gap;
                } // end if gap

                if (strlen($questiontext) || strlen($gap_marker)) {
                    if ($startwithgap) {
                        $question->questiontext .= $gap_marker.$questiontext;
                    } else {
                        $question->questiontext .= $questiontext.$gap_marker;
                    }
                } else {
                    $looping = false;
                }

                $q++;
            } // end while $looping

            if ($q) {
                // define total grade for this exercise
                $question->defaultmark = $gap_count * $defaultmark; // Moodle 2.1+
                $question->defaultgrade = $question->defaultmark; // Moodle 2.0

                // add this cloze as a single question object
                $questions[] = $question;
            } else {
                // no gaps found in this text so don't add this question
                // import will fail and error message will be displayed:
            }

            $x++;
        } // end while $exercise
    }

    /**
     * hotpot_jcloze_wordlist
     *
     * @param xxx $source (passed by reference)
     * @return xxx
     */
    function hotpot_jcloze_wordlist(&$source) {
        $wordlist = array();

        $q = 0;
        $tags = 'data,gap-fill,question-record';
        while (($question="[$q]['#']") && $source->xml_value($tags, $question)) {
            $a = 0;
            $aa = 0;
            while (($answer=$question."['answer'][$a]['#']") && $source->xml_value($tags, $answer)) {
                $text = $source->xml_value($tags,  $answer."['text'][0]['#']");
                $correct = $source->xml_value($tags, $answer."['correct'][0]['#']");
                if (strlen($text) && intval($correct)) {
                    $wordlist[] = $text;
                    $aa++;
                }
                $a++;
            }
            $q++;
        }

        $wordlist = array_unique($wordlist);
        sort($wordlist);

        return $wordlist;
    }

    /**
     * process_jcross
     *
     * @param xxx $source (passed by reference)
     * @param xxx $questions (passed by reference)
     */
    function process_jcross(&$source, &$questions)  {
        // xml tags to the start of the crossword exercise clue items
        $tags = 'data,crossword,clues,item';

        $x = 0;
        while (($item = "[$x]['#']") && $source->xml_value($tags, $item)) {

            $text = $source->xml_value($tags, $item."['def'][0]['#']");
            $answer = $source->xml_value($tags, $item."['word'][0]['#']");

            if ($text && $answer) {
                $question = $this->defaultquestion();
                $question->qtype = 'shortanswer';
                $question->name = $this->hotpot_get_title($source, $x, true);

                if ($source->xml_value_bool($source->hbs_software.'-config-file,'.$source->hbs_quiztype.',case-sensitive')) {
                    $question->usecase = 1;
                } else {
                    $question->usecase = 0;
                }
                $question->questiontext = $this->hotpot_prepare_str($text);
                $question->questiontextformat = FORMAT_HTML;

                $question->answer = array($this->hotpot_prepare_str($answer));
                $question->fraction = array(1);
                $question->feedback = array(array('text'=>'', 'format'=>FORMAT_MOODLE));

                $questions[] = $question;
            }
            $x++;
        }
    }

    /**
     * process_jmatch
     *
     * @param xxx $source (passed by reference)
     * @param xxx $questions (passed by reference)
     */
    function process_jmatch(&$source, &$questions)  {
        // define default grade (per matched pair)
        $defaultmark = 1;
        $match_count = 0;

        // xml tags to the start of the matching exercise
        $tags = 'data,matching-exercise';

        $x = 0;
        while (($exercise = "[$x]['#']") && $source->xml_value($tags, $exercise)) {
            // there is usually only one exercise in a file

            $question = $this->defaultquestion();
            $question->qtype = 'match';
            $question->name = $this->hotpot_get_title($source, $x, ($x>0));

            $question->correctfeedback = array('text'=>'', 'format'=>FORMAT_HTML);
            $question->incorrectfeedback = array('text'=>'', 'format'=>FORMAT_HTML);
            $question->partiallycorrectfeedback = array('text'=>'', 'format'=>FORMAT_HTML);

            $question->questiontext = $this->hotpot_get_reading($source);
            $question->questiontext .= $this->hotpot_get_instructions($source);
            $question->questiontextformat = FORMAT_HTML;

            $question->subquestions = array();
            $question->subanswers = array();
            $p = 0;
            while (($pair = $exercise."['pair'][$p]['#']") && $source->xml_value($tags, $pair)) {
                $left = $source->xml_value($tags, $pair."['left-item'][0]['#']['text'][0]['#']");
                $right = $source->xml_value($tags, $pair."['right-item'][0]['#']['text'][0]['#']");
                if ($left && $right) {
                    $match_count++;
                    $question->subquestions[$p] = array(
                        'text' => $this->hotpot_prepare_str($left),
                        'format' => FORMAT_HTML
                    );
                    $question->subanswers[$p] = $this->hotpot_prepare_str($right);
                }
                $p++;
            }
            $question->defaultmark = $match_count * $defaultmark; // Moodle 2.1+
            $question->defaultgrade = $question->defaultmark; // Moodle 2.0
            $questions[] = $question;
            $x++;
        }
    }

    /**
     * process_jmix
     *
     * @param xxx $source (passed by reference)
     * @param xxx $questions (passed by reference)
     */
    function process_jmix(&$source, &$questions)  {
        // define default grade (per segment)
        $defaultmark = 1;
        $segment_count = 0;

        // xml tags to the start of the jumbled order exercise
        $tags = 'data,jumbled-order-exercise';

        $x = 0;
        while (($exercise = "[$x]['#']") && $source->xml_value($tags, $exercise)) {
            // there is usually only one exercise in a file

            $question = $this->defaultquestion();
            $question->qtype = 'shortanswer';
            $question->name = $this->hotpot_get_title($source, $x, ($x>0));

            $question->answer = array();
            $question->fraction = array();
            $question->feedback = array();

            $i = 0;
            $segments = array();
            while ($segment = $source->xml_value($tags, $exercise."['main-order'][0]['#']['segment'][$i]['#']")) {
                $segments[] = $this->hotpot_prepare_str($segment);
                $segment_count++;
                $i++;
            }
            $answer = implode(' ', $segments);

            shuffle($segments);

            $question->questiontext = $this->hotpot_get_reading($source);
            $question->questiontext .= $this->hotpot_get_instructions($source);
            $question->questiontext .= ' &nbsp; <nobr><b>[ &nbsp; '.implode(' &nbsp; ', $segments).' &nbsp; ]</b></nobr>';
            $question->questiontextformat = FORMAT_HTML;

            $a = 0;
            while (!empty($answer)) {
                $question->answer[$a] = $answer;
                $question->fraction[$a] = 1;
                $question->feedback[$a] = array('text'=>'', 'format'=>FORMAT_MOODLE);
                $answer = $this->hotpot_prepare_str($source->xml_value($tags, $exercise."['alternate'][$a]['#']"));
                $a++;
            }
            $question->defaultmark = $segment_count * $defaultmark; // Moodle 2.1+
            $question->defaultgrade = $question->defaultmark; // Moodle 2.0
            $questions[] = $question;
            $x++;
        }
    }

    /**
     * process_jquiz
     *
     * @param xxx $source (passed by reference)
     * @param xxx $questions (passed by reference)
     */
    function process_jquiz(&$source, &$questions)  {
        // define default grade (per question)
        $defaultmark = 1;

        // xml tags to the start of the questions
        $tags = 'data,questions';

        $x = 0;
        while (($exercise = "[$x]['#']") && $source->xml_value($tags, $exercise)) {
            // there is usually only one 'questions' object in a single exercise

            $q = 0;
            while (($question_record = $exercise."['question-record'][$q]['#']") && $source->xml_value($tags, $question_record)) {

                $question = $this->defaultquestion();
                $question->defaultmark = $defaultmark; // Moodle 2.1+
                $question->defaultgrade = $defaultmark; // Moodle 2.0
                $question->name = $this->hotpot_get_title($source, $q, true);

                $text = $source->xml_value($tags, $question_record."['question'][0]['#']");
                $question->questiontext = $this->hotpot_prepare_str($text);
                $question->questiontextformat = FORMAT_HTML;

				// CONTRIB-3565: initialize generalfeedback to prevent "can't be null" errors on Oracle
				$question->generalfeedback = '';
                $question->generalfeedbackformat = FORMAT_HTML;

                $type = $source->xml_value($tags, $question_record."['question-type'][0]['#']");
                //  1 : multiple choice
                //  2 : short-answer
                //  3 : hybrid
                //  4 : multiple select

                if ($type==2) {
                    $question->qtype = 'shortanswer';
                } else {
                    $question->qtype = 'multichoice';
                    $question->correctfeedback = array('text'=>'', 'format'=>FORMAT_HTML);
                    $question->incorrectfeedback = array('text'=>'', 'format'=>FORMAT_HTML);
                    $question->partiallycorrectfeedback = array('text'=>'', 'format'=>FORMAT_HTML);
                }
                if ($type==4) {
                    $question->single = 0; // multiple select
                } else {
                    $question->single = 1;
                }

                // set tags to start of answers array
                $answers = $question_record."['answers'][0]['#']";

                // workaround required to calculate scores for multiple select answers
                $no_of_correct_answers = 0;
                if ($type==4) {
                    $a = 0;
                    while (($answer = $answers."['answer'][$a]['#']") && $source->xml_value($tags, $answer)) {
                        $correct = $source->xml_value($tags, $answer."['correct'][0]['#']");
                        if (empty($correct)) {
                            // do nothing
                        } else {
                            $no_of_correct_answers++;
                        }
                        $a++;
                    }
                }
                $a = 0;
                $question->answer = array();
                $question->fraction = array();
                $question->feedback = array();

                $aa = 0;
                $correct_answers = array();
                $correct_answers_all_zero = true;
                while (($answer = $answers."['answer'][$a]['#']") && $source->xml_value($tags, $answer)) {
                    $correct = $source->xml_value($tags, $answer."['correct'][0]['#']");
                    if (empty($correct)) {
                        $fraction = 0;
                    } else if ($type==4) { // multiple select
                        // strange behavior if the $fraction isn't exact to 5 decimal places
                        $fraction = round(1/$no_of_correct_answers, 5);
                    } else {
                        // HP6 JQuiz
                        $percent = $source->xml_value($tags, $answer."['percent-correct'][0]['#']");
                        $fraction = $percent/100;
                    }
                    $answertext = $this->hotpot_prepare_str($source->xml_value($tags, $answer."['text'][0]['#']"));
                    if (strlen($answertext)) {
                        if ($question->qtype=='shortanswer') {
                            $question->answer[$aa] = $answertext;
                        } else {
                            $question->answer[$aa] = array('text'=>$answertext, 'format' => FORMAT_HTML);
                        }
                        $question->fraction[$aa] = $fraction;
                        $question->feedback[$aa] = array(
                            'text' => $this->hotpot_prepare_str($source->xml_value($tags, $answer."['feedback'][0]['#']")),
                            'format' => FORMAT_HTML
                        );
                        if ($correct) {
                            if ($fraction) {
                                $correct_answers_all_zero = false;
                            }
                            $correct_answers[] = $aa;
                        }
                        $aa++;
                    }
                    $a++;
                }
                if ($correct_answers_all_zero) {
                    // correct answers all have score of 0%,
                    // so reset score for correct answers 100%
                    foreach ($correct_answers as $aa) {
                        $question->fraction[$aa] = 1;
                    }
                }
                // add a sanity check for empty questions, see MDL-17779
                if (strlen($question->questiontext)) {
                    $questions[] = $question;
                }
                $q++;
            }
            $x++;
        }
    }

    /**
     * hotpot_get_title
     *
     * @param object $source (passed by reference)
     * @param integer $q the question number
     * @param boolean $append_q_to_title if true, append ($q) to title
     * @return xxx
     */
    function hotpot_get_title(&$source, $q, $append_q_to_title)  {
        $title = $source->xml_value('data,title');
        if ($append_q_to_title) {
            $title .= ' ('.($q+1).')';
        }
        return $this->hotpot_prepare_str($title);
    }

    /**
     * hotpot_get_instructions
     *
     * @param xxx $source (passed by reference)
     * @return xxx
     */
    function hotpot_get_instructions(&$source)  {
        $text = $source->xml_value($source->hbs_software.'-config-file,'.$source->hbs_quiztype.',instructions');
        if (empty($text)) {
            switch ($source->hbs_software) {
                case 'hotpot': $text = "Hot Potatoes $source->hbs_quiztype"; break;
                case 'textoys': $text = "TexToys $source->hbs_quiztype"; break;
                default: $text = "$source->hbs_quiztype";
            }
        }
        return $this->hotpot_prepare_str($text);
    }

    /**
     * hotpot_get_reading
     *
     * @param xxx $source (passed by reference)
     * @return xxx
     */
    function hotpot_get_reading(&$source)  {
        $str = '';
        $tags = 'data,reading';
        if ($source->xml_value("$tags,include-reading")) {
            if ($title = $source->xml_value("$tags,reading-title")) {
                $str .= "<h3>$title</h3>";
            }
            if ($text = $source->xml_value("$tags,reading-text")) {
                $str .= "<p>$text</p>";
            }
        }
        return $this->hotpot_prepare_str($str);
    }

    /**
     * hotpot_prepare_str
     *
     * @param xxx $str
     * @return xxx
     */
    function hotpot_prepare_str($str)  {
        // convert html entities to unicode

        if (method_exists('textlib', 'textlib')) {
            // Moodle 2.0 and 2.1
            $textlib = textlib_get_instance();
            return $textlib->entities_to_utf8($str, true);
        }

        return textlib::entities_to_utf8($str, true);
    }
} // end class
