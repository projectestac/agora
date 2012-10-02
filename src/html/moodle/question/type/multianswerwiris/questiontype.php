<?php
global $CFG;
require_once($CFG->dirroot . '/question/type/multianswer/questiontype.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/libquestiontype.php');
require_once($CFG->dirroot . '/wiris-quizzes/lib/deprecated.php');
mb_internal_encoding('UTF-8');

class question_multianswerwiris_qtype extends embedded_cloze_qtype{

    var $useableQuestionTypes = array(
        'shortanswer',
        'shortanswerwiris',
        'multichoice',
        'multichoicewiris',
        'numerical'
    );
    
    function name() {
        return 'multianswerwiris';
    }

    function get_question_options(&$question) {
		if (parent::get_question_options($question)) {
			return wrsqz_get_question_options('multianswer', 'wmansprom', $question);
		}
		return false;
	}

    function save_question_options($question) {

        global $QTYPES;

        $result = new stdClass;

        // This function needs to be able to handle the case where the existing set of wrapped
        // questions does not match the new set of wrapped questions so that some need to be
        // created, some modified and some deleted
        // Unfortunately the code currently simply overwrites existing ones in sequence. This
        // will make re-marking after a re-ordering of wrapped questions impossible and
        // will also create difficulties if questiontype specific tables reference the id.

        // First we get all the existing wrapped questions
        if (!$oldwrappedids = get_field('question_multianswer', 'sequence', 'question', $question->id)) {
            $oldwrappedquestions = array();
        } else {
            $oldwrappedquestions = get_records_list('question', 'id', $oldwrappedids, 'id ASC');
        }
        $sequence = array();
        foreach($question->options->questions as $wrapped) {
            if (!empty($wrapped)){
            // if we still have some old wrapped question ids, reuse the next of them

                if (is_array($oldwrappedquestions) && $oldwrappedquestion = array_shift($oldwrappedquestions)) {
                    $wrapped->id = $oldwrappedquestion->id;
                    if($oldwrappedquestion->qtype != $wrapped->qtype ) {
                        switch ($oldwrappedquestion->qtype) {
                        case 'multichoicewiris':
                            delete_records('question_multichoicewiris', 'question' , $oldwrappedquestion->id );
                        case 'multichoice':
                            delete_records('question_multichoice', 'question' , $oldwrappedquestion->id );
                            break;
                        case 'shortanswerwiris':
                            delete_records('question_shortanswerwiris', 'question' , $oldwrappedquestion->id );
                        case 'shortanswer':
                            delete_records('question_shortanswer', 'question' , $oldwrappedquestion->id );
                            break;
                        case 'numerical':
                            delete_records('question_numerical', 'question' , $oldwrappedquestion->id );
                            break;
                        default:
                                print_error('qtypenotrecognized', 'qtype_multianswer','',$oldwrappedquestion->qtype);
                                        $wrapped->id = 0 ;
                        }
                    }
                }else {
                    $wrapped->id = 0 ;
                }
            }
            $wrapped->name = $question->name;
            $wrapped->parent = $question->id;
            $previousid = $wrapped->id ;
            $wrapped->category = $question->category . ',1'; // save_question strips this extra bit off again.
            
            wrsqz_addWirisFieldsToWrapped($question, $wrapped);

            //$wrapped->hiddenCASValue = $question->hiddenCASValue;
            $wrapped = $QTYPES[$wrapped->qtype]->save_question($wrapped,
                    $wrapped, $question->course);
            $sequence[] = $wrapped->id;
            if ($previousid != 0 && $previousid != $wrapped->id ) {
                // for some reasons a new question has been created
                // so delete the old one
                delete_question($previousid) ;
            }
        }

        // Delete redundant wrapped questions
        if(is_array($oldwrappedquestions) && count($oldwrappedquestions)){
            foreach ($oldwrappedquestions as $oldwrappedquestion) {
                delete_question($oldwrappedquestion->id) ;
            }
        }

        if (!empty($sequence)) {
            $multianswer = new stdClass;
            $multianswer->question = $question->id;
            $multianswer->sequence = implode(',', $sequence);
            if ($oldid = get_field('question_multianswer', 'id', 'question', $question->id)) {
                $multianswer->id = $oldid;
                if (!update_record("question_multianswer", $multianswer)) {
                    $result->error = "Could not update cloze question options! " .
                            "(id=$multianswer->id)";
                    return $result;
                }
            } else {
                if (!insert_record("question_multianswer", $multianswer)) {
                    $result->error = "Could not insert cloze question options!";
                    return $result;
                }
            }
        }
        return wrsqz_save_question_options('multianswer', 'wmansprom', $question);
    }

    function save_question($authorizedquestion, $form, $course) {

        wrsqz_presave_question('multianswer', 'wmansprom', $authorizedquestion, $form, $course);
  
        global $CFG;
        require_once($CFG->dirroot . '/wiris-quizzes/lib/libquestiontype.php');
        $question = wrsqz_qtype_multianswer_extract_question($form);

        if (isset($authorizedquestion->id)) {
            $question->id = $authorizedquestion->id;
        }
        $question->category = $authorizedquestion->category;
        $form->course = $course; // To pass the course object to
                                 // save_question_options, where it is
                                 // needed to call type specific
                                 // save_question methods.
        $form->defaultgrade = $question->defaultgrade;
        $form->questiontext = $question->questiontext;
        // We do not force MOODLE_FORMAT: it is incoherent with default
        // multianswer behavior, but MOODLE_FORMAT will introduce links,
        // smileys and other undesired features, and it is coherent with
		    // default questiontype behavior.
        // $form->questiontextformat = 0;

        $form->options = clone($question->options);
        unset($question->options);
        return default_questiontype::save_question($question, $form, $course);
    }

    function create_session_and_responses(&$question, &$state, $cmoptions, $attempt) {
      parent::create_session_and_responses($question, $state, $cmoptions, $attempt);
      return wrsqz_create_session_and_responses('multianswer', 'wmansprom', $question, $state, $cmoptions, $attempt);
    }

    function restore_session_and_responses(&$question, &$state) {
      $values = wrsqz_restore_session_and_responses_1('multianswer', 'wmansprom', $question, $state);
      $toReturn = parent::restore_session_and_responses($question, $state);
      wrsqz_restore_session_and_responses_2('multianswer', 'wmansprom', $values, $question, $state);
      return  $toReturn;
    }

    function save_session_and_responses(&$question, &$state) {
      return wrsqz_save_session_and_responses('multianswer', 'wmansprom', $question, $state);
    }

    function delete_question($questionid) {
		if (!wrsqz_delete_question('multianswer', 'wmansprom', $questionid)) {
			return false;
		}
		return parent::delete_question($questionid);
	}

    function get_correct_responses(&$question, &$state) {
        wrsqz_swap('multianswer', 'wmansprom', $question, $state);
		$response = parent::get_correct_responses($question, $state);
		return wrsqz_get_correct_responses('multianswer', 'wmansprom', $response, $question, $state);
    }

/*
 * This is a modified version of print_question_formulation_and_controls from
 * multianswer/questiontype.php
 */
    function print_question_formulation_and_controls(&$question, &$state, $cmoptions, $options) {

        global $QTYPES, $CFG, $USER;
        $readonly = empty($options->readonly) ? '' : 'readonly="readonly"';
        $disabled = empty($options->readonly) ? '' : 'disabled="disabled"';
        $formatoptions = new stdClass;
        $formatoptions->noclean = true;
        $formatoptions->para = false;
        $nameprefix = $question->name_prefix;

        // adding an icon with alt to warn user this is a fill in the gap question
        // MDL-7497
        if (!empty($USER->screenreader)) {
            echo "<img src=\"$CFG->wwwroot/question/type/$question->qtype/icon.gif\" ".
                "class=\"icon\" alt=\"".get_string('clozeaid','qtype_multichoice')."\" />  ";
        }

        echo '<div class="ablock clearfix">';
        // For this question type, we better print the image on top:
        if ($image = get_question_image($question)) {
            echo('<img class="qimage" src="' . $image . '" alt="" /><br />');
        }

        $qtextremaining = format_text($question->questiontext,
                $question->questiontextformat, $formatoptions, $cmoptions->course);

        $strfeedback = get_string('feedback', 'quiz');

        // The regex will recognize text snippets of type {#X}
        // where the X can be any text not containg } or white-space characters.

        while (ereg('\{#([^[:space:]}]*)}', $qtextremaining, $regs)) {
            $qtextsplits = explode($regs[0], $qtextremaining, 2);
            echo $qtextsplits[0];
            echo "<label>"; // MDL-7497
            $qtextremaining = $qtextsplits[1];

            $positionkey = $regs[1];
            if (isset($question->options->questions[$positionkey]) && $question->options->questions[$positionkey] != ''){
            $wrapped = &$question->options->questions[$positionkey];
            $answers = &$wrapped->options->answers;
           // $correctanswers = $QTYPES[$wrapped->qtype]->get_correct_responses($wrapped, $state);

            $inputname = $nameprefix.$positionkey;
            if (isset($state->responses[$positionkey])) {
                $response = $state->responses[$positionkey];
            } else {
                $response = null;
            }

            // Determine feedback popup if any
            $popup = '';
            $style = '';
            $feedbackimg = '';
            $feedback = '' ;
            $correctanswer = '';
            $strfeedbackwrapped  = $strfeedback;
                $testedstate = clone($state);
                if (($correctanswers =  $QTYPES[$wrapped->qtype]->get_correct_responses($wrapped, $testedstate))!==false) {
                    if ($options->readonly && $options->correct_responses) {
                        $delimiter = '';
                        if ($correctanswers) {
                            foreach ($correctanswers as $ca) {
                                switch($wrapped->qtype){
                                    case 'numerical':
                                    case 'shortanswer':
                                    case 'shortanswerwiris':
                                        $correctanswer .= $delimiter.$ca;
                                        break ;
                                    case 'multichoice':
                                    case 'multichoicewiris':
                                        if (isset($answers[$ca])){
                                            $correctanswer .= $delimiter.$answers[$ca]->answer;
                                        }
                                        break ;
                                }
                                $delimiter = ', ';
                            }
                        }
                    }
                    if ($correctanswer!='') {
                        $feedback = '<div class="correctness">';
                        $feedback .= get_string('correctansweris', 'quiz', s($correctanswer, true));
                        $feedback .= '</div>';
                    }
                }
            if ($options->feedback) {
                $chosenanswer = null;
                switch ($wrapped->qtype) {
                    case 'shortanswerwiris':
                        $index=0;
                        $maxgrade=0.0;
                        if(isset($state->grades) && isset($state->grades[$positionkey])){
                            foreach ($answers as $answer){
                                if(isset($state->grades[$positionkey][$index]) &&
                                $state->grades[$positionkey][$index]>$maxgrade){
                                    $chosenanswer = clone($answer);
                                    $maxgrade = $state->grades[$positionkey][$index];
                                }
                                $index++;
                            }
                        }
                        //Try string comparation if wiris grade is zero for this response.
                        if(!empty($chosenanswer)){
                            break;
                        }

                    case 'numerical':
                    case 'shortanswer':
                        $testedstate = clone($state);
                        $testedstate->responses[''] = $response;
                        foreach ($answers as $answer) {
                            if($QTYPES[$wrapped->qtype]->test_response($wrapped, $testedstate, $answer)) {
                                $chosenanswer = clone($answer);
                                break;
                            }
                        }
                        break;
                    case 'multichoicewiris':
                    case 'multichoice':
                        if (isset($answers[$response])) {
                            $chosenanswer = clone($answers[$response]);
                        }
                        break;
                    default:
                        break;
                }

                // Set up a default chosenanswer so that all non-empty wrong
                // answers are highlighted red
                if (empty($chosenanswer) && $response != '') {
                    $chosenanswer = new stdClass;
                    $chosenanswer->fraction = 0.0;
                }

                if (isset($chosenanswer->feedback) && $chosenanswer->feedback !== '') {
                    $feedback = s(str_replace(array("\\", "'"), array("\\\\", "\\'"), $feedback.$chosenanswer->feedback));
                    if  ($options->readonly && $options->correct_responses) {
                        $strfeedbackwrapped = get_string('correctanswerandfeedback', 'qtype_multianswer');
                    }else {
                        $strfeedbackwrapped = get_string('feedback', 'quiz');
                    }
                    $popup = " onmouseover=\"return overlib('$feedback', STICKY, MOUSEOFF, CAPTION, '$strfeedbackwrapped', FGCOLOR, '#FFFFFF');\" ".
                             " onmouseout=\"return nd();\" ";
                }

                /// Determine style
                if ($options->feedback && $response != '') {
                    $style = 'class = "'.question_get_feedback_class($chosenanswer->fraction).'"';
                    $feedbackimg = question_get_feedback_image($chosenanswer->fraction);
                } else {
                    $style = '';
                    $feedbackimg = '';
                }
            }
            if ($feedback !== '' && $popup === ''){
                $strfeedbackwrapped = get_string('correctanswer', 'qtype_multianswer');
                $feedback = s(str_replace(array("\\", "'"), array("\\\\", "\\'"), $feedback));
                $popup = " onmouseover=\"return overlib('$feedback', STICKY, MOUSEOFF, CAPTION, '$strfeedbackwrapped', FGCOLOR, '#FFFFFF');\" ".
                             " onmouseout=\"return nd();\" ";
            }

            // Print the input control
            $editor = false;
            switch ($wrapped->qtype) {
                case 'shortanswerwiris':
                  mb_parse_str($wrapped->options->wiris->eqoption, $eqoptionArray);
                  $editor = (isset($eqoptionArray['editor']) && $eqoptionArray['editor'] == 'true');
                case 'shortanswer':
                case 'numerical':
                  if(!$editor){
                    $size = 1 ;
                    foreach ($answers as $answer) {
                      if (strlen(trim($answer->answer)) > $size ){
                        $assembledAnswer = wrsqz_assemble(wrsqz_variablesToText($answer->answer),$state->vars);
                        $size = strlen(trim($assembledAnswer));
                      }
                    }
                    if (strlen(trim($response))> $size ){
                      $size = strlen(trim($response))+1;
                    }
                    $size = $size + rand(0,$size*0.15);
                    $size > 60 ? $size = 60 : $size = $size;
                    $styleinfo = "size=\"$size\"";
                        /**
                        * Uncomment the following lines if you want to limit for small sizes.
                        * Results may vary with browsers see MDL-3274
                        */
                        /*
                        if ($size < 2) {
                            $styleinfo = 'style="width: 1.1em;"';
                        }
                        if ($size == 2) {
                            $styleinfo = 'style="width: 1.9em;"';
                        }
                        if ($size == 3) {
                            $styleinfo = 'style="width: 2.3em;"';
                        }
                        if ($size == 4) {
                            $styleinfo = 'style="width: 2.8em;"';
                        }
                        */

                      echo "<input $style $readonly $popup name=\"$inputname\"";
                      echo "  type=\"text\" value=\"".s($response, true)."\" ".$styleinfo." /> ";
                    }else{
                      echo wrsqz_embeddedShortanswerInput($wrapped, $response, $inputname, $style, $readonly, $popup);
                    }
                    if ($feedback!=='' && !empty($USER->screenreader)) {
                      echo "<img src=\"$CFG->pixpath/i/feedback.gif\" alt=\"$feedback\" />";
                    }
                    echo $feedbackimg;
                    break;
                case 'multichoicewiris':
                case 'multichoice':
                 if ($wrapped->options->layout == 0 ){
                    $outputoptions = '<option></option>'; // Default empty option
                    foreach ($answers as $mcanswer) {
                        $selected = '';
                        if ($response == $mcanswer->id) {
                            $selected = ' selected="selected"';
                        }
                        $outputoptions .= "<option value=\"$mcanswer->id\"$selected>" .
                                s($mcanswer->answer, true) . '</option>';
                    }
                    // In the next line, $readonly is invalid HTML, but it works in
                    // all browsers. $disabled would be valid, but then the JS for
                    // displaying the feedback does not work. Of course, we should
                    // not be relying on JS (for accessibility reasons), but that is
                    // a bigger problem.
                    //
                    // The span is used for safari, which does not allow styling of
                    // selects.
                    echo "<span $style><select $popup $readonly $style name=\"$inputname\">";
                    echo $outputoptions;
                    echo '</select></span>';
                    if ($feedback !== '' && !empty($USER->screenreader)) {
                        echo "<img src=\"$CFG->pixpath/i/feedback.gif\" alt=\"$feedback\" />";
                    }
                    echo $feedbackimg;
                    }else if ($wrapped->options->layout == 1 || $wrapped->options->layout == 2){
                        $ordernumber=0;
                        $anss =  Array();
                        foreach ($answers as $mcanswer) {
                            $ordernumber++;
                            $checked = '';
                            $chosen = false;
                            $type = 'type="radio"';
                            $name   = "name=\"{$inputname}\"";
                            if ($response == $mcanswer->id) {
                                $checked = 'checked="checked"';
                                $chosen = true;
                            }
                            $a = new stdClass;
                            $a->id   = $question->name_prefix . $mcanswer->id;
                            $a->class = '';
                            $a->feedbackimg = '';

                    // Print the control
                    $a->control = "<input $readonly id=\"$a->id\" $name $checked $type value=\"$mcanswer->id\" />";
                if ($options->correct_responses && $mcanswer->fraction > 0) {
                    $a->class = question_get_feedback_class(1);
                }
                if (($options->feedback && $chosen) || $options->correct_responses) {
                    if ($type == ' type="checkbox" ') {
                        $a->feedbackimg = question_get_feedback_image($mcanswer->fraction > 0 ? 1 : 0, $chosen && $options->feedback);
                    } else {
                        $a->feedbackimg = question_get_feedback_image($mcanswer->fraction, $chosen && $options->feedback);
                    }
                }

                // Print the answer text: no automatic numbering

                $a->text =format_text($mcanswer->answer, FORMAT_MOODLE, $formatoptions, $cmoptions->course);

                // Print feedback if feedback is on
                if (($options->feedback || $options->correct_responses) && ($checked )) { //|| $options->readonly
                    $a->feedback = format_text($mcanswer->feedback, true, $formatoptions, $cmoptions->course);
                } else {
                    $a->feedback = '';
                }

                    $anss[] = clone($a);
                }
                ?>
            <?php    if ($wrapped->options->layout == 1 ){
            ?>
                  <table class="answer">
                    <?php $row = 1; foreach ($anss as $answer) { ?>
                      <tr class="<?php echo 'r'.$row = $row ? 0 : 1; ?>">
                        <td class="c0 control">
                          <?php echo $answer->control; ?>
                        </td>
                        <td class="c1 text <?php echo $answer->class ?>">
                          <label for="<?php echo $answer->id ?>">
                            <?php echo $answer->text; ?>
                            <?php echo $answer->feedbackimg; ?>
                          </label>
                        </td>
                        <td class="c0 feedback">
                          <?php echo $answer->feedback; ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </table>
                  <?php }else  if ($wrapped->options->layout == 2 ){
                    ?>

                  <table class="answer">
                      <tr class="<?php echo 'r'.$row = $row ? 0 : 1; ?>">
                    <?php $row = 1; foreach ($anss as $answer) { ?>
                        <td class="c0 control">
                          <?php echo $answer->control; ?>
                        </td>
                        <td class="c1 text <?php echo $answer->class ?>">
                          <label for="<?php echo $answer->id ?>">
                            <?php echo $answer->text; ?>
                            <?php echo $answer->feedbackimg; ?>
                          </label>
                        </td>
                        <td class="c0 feedback">
                          <?php echo $answer->feedback; ?>
                        </td>
                    <?php } ?>
                      </tr>
                  </table>
                  <?php }

                    }else {
                        echo "no valid layout";
                    }

                    break;
                default:
                    $a = new stdClass;
                    $a->type = $wrapped->qtype ;
                    $a->sub = $positionkey;
                    print_error('unknownquestiontypeofsubquestion', 'qtype_multianswer','',$a);
                    break;
           }
           echo "</label>"; // MDL-7497
        }
        else {
            if(!  isset($question->options->questions[$positionkey])){
                echo $regs[0]."</label>";
            }else {
                echo '</label><div class="error" >'.get_string('questionnotfound','qtype_multianswer',$positionkey).'</div>';
            }
       }
    }

        // Print the final piece of question text:
        echo $qtextremaining;
        if(!empty($question->options->wiris->options['wirisCASForComputations'])){
          $wirisCASContent = '';
          if (isset($state->responses['wirisCASHidden'])) {
            $wirisCASContent = htmlentities(stripslashes_safe($state->responses['wirisCASHidden']), ENT_QUOTES, 'UTF-8');
          }
          echo '<br />';
          echo wrsqz_wirisCASAppletHTML($nameprefix, $wirisCASContent, false, 630, 300);
          require_js(array('yui_yahoo', 'yui_dom-event'));
          require_js($CFG->wwwroot.'/wiris-quizzes/js/wiris-quizzes.js');
        }
        $this->print_question_submit_buttons($question, $state, $cmoptions, $options);
        echo '</div>';
    }

  function grade_responses(&$question, &$state, $cmoptions) {
		wrsqz_swap('multianswer', 'wmansprom', $question, $state);
    wrsqz_hideCASSession('multianswer', 'wmansprom', $question, $state);
		$toreturn = wrsqz_grade_responses('multianswer', 'wmansprom', $question, $state, $cmoptions);
    wrsqz_restoreCASSession('multianswer', 'wmansprom', $question, $state);
    return $toreturn;
	}
    
    function print_question(&$question, &$state, $number, $cmoptions, $options) {
		wrsqz_print_question('multianswer', 'wmansprom', $question, $state, $number, $cmoptions, $options);
		return parent::print_question($question, $state, $number, $cmoptions, $options);
	}

    function response_summary($question, $state, $length=80){
        return wrsqz_response_summary('multianswer', 'wmansprom',$question, $state, $length);
    }

    /*Deprecated*/
    function print_question_form_end($question, $submitscript = '', $hiddenfields = '') {
		wrsqz_print_question_form_end('multianswer', 'wmansprom', $question, $submitscript, $hiddenfields);
		parent::print_question_form_end($question, $submitscript, $hiddenfields);
	}
    
    function restore_recode_answer($state, $restore) {
        $info = wrsqz_restore_recode_answer_1('multianswer', 'wmansprom',$state,$restore);
        $answers = parent::restore_recode_answer($state, $restore);
        return wrsqz_restore_recode_answer_2('multianswer', 'wmansprom', $info, $answers, $state, $restore);
    }
    
    function backup($bf, $preferences, $question, $level = 6) {
        if(!(method_exists($this,"extra_question_fields"))){
            $extra_question_fields = wrsqz_deprecated_extra_question_fields('multianswer');
        }else{
            $extra_question_fields = $this->extra_question_fields();
        }
        if(!(method_exists($this,"questionid_column_name"))){
            $question_id_column_name = wrsqz_deprecated_question_id_column_name('multianswer');
        }else{
            $question_id_column_name = $this->questionid_column_name();
        }
        if(parent::backup($bf, $preferences, $question,$level) !== false){
            return wrsqz_backup('multianswer', 'wmansprom', $bf, $preferences, $question, $level, $extra_question_fields, $question_id_column_name);
        }
        return false;
    }

	function restore($old_question_id, $new_question_id, $info, $restore) {
		if (parent::restore($old_question_id, $new_question_id, $info, $restore) !== false) {
			return wrsqz_restore('multianswer', 'wmansprom', $old_question_id, $new_question_id, $info,$restore);
		}
		return false;
	}

    function export_to_xml($question, $format, $extra = null) {
		return wrsqz_export_to_xml('multianswer', 'wmansprom', $question, $format, $extra);
	}

	function import_from_xml($data, $question, $format, $extra = null) {
		return wrsqz_import_from_xml('multianswer', 'wmansprom', $data, $question, $format, $extra);
	}
    function display_question_editing_page(&$mform, $question, $wizardnow){
        return wrsqz_display_question_editing_page('multianswer','wmansprom',$mform, $question, $wizardnow);
    }
    
}

if (function_exists('question_register_questiontype')) {
	question_register_questiontype(new question_multianswerwiris_qtype());
}
else {
	$QTYPES['multianswerwiris'] = new question_multianswerwiris_qtype();
	$QTYPE_MENU['multianswerwiris'] = 'multianswerwiris';
}
?>