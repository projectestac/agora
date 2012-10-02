<?php
/*
 * In this file there is code needed only for old moodles.
 */
global $CFG;
mb_internal_encoding('UTF-8');
require_once($CFG->dirroot . '/lib/dmllib.php');

function wrsqz_print_question_form_end($questionType, $dbType, &$question, &$submitscript, &$hiddenfields) {
	if (($objProblem = get_record('question_' . $dbType, 'question', $question->id)) !== false) {
		$program = $objProblem->program;

		if($program == 'NULL') {
			$program = wrsqz_getDefaultCASCode(wrsqz_currentCASLanguage());
		}
	}
	else {
		$program = wrsqz_getDefaultCASCode(wrsqz_currentCASLanguage());
	}

	echo '<script type="text/javascript">'."\n";
    echo 'var i = true;'."\n";
    echo 'function changeState() {'."\n";
    echo '  if (i) {'."\n";
    echo '      document.getElementsByName(\'WirisCASApplet\')[0].height = \'0\';'."\n";
    echo '      document.getElementById(\'myapplet\').style.visibility = \'hidden\';'."\n";
    echo '      document.getElementById(\'mybutton\').value = \'SHOW\';'."\n";
    echo '  }'."\n";
    echo '  else if (!i) {'."\n";
    echo '      document.getElementById(\'myapplet\').style.visibility = \'visible\';'."\n";
    echo '      document.getElementById(\'mybutton\').value = \'HIDE\';'."\n";
    echo '      document.getElementsByName(\'WirisCASApplet\')[0].height = \'400\';'."\n";
    echo '  }'."\n";
    echo '  i = !i;'."\n";
    echo '  return true;'."\n";
    echo '}'."\n";
    echo 'function onSubmit() {'."\n";
    echo '  document.getElementsByName(\'hiddenCASValue\')[0].value = document.getElementsByName(\'WirisCASApplet\')[0].getXML();'."\n";
    echo '}';
    echo '</script>'."\n";
    echo '<tr valign="top">'."\n";
    echo '	<td align="right">'."\n";
    echo '		<b>Wiris Quizzes:</b>'."\n";
    echo '	</td>'."\n";
    echo '	<td align="left">'."\n";
    echo '      <p align="right">'."\n";
    echo '          <input type="button" onclick="javascript:changeState();" id="mybutton" value="SHOW"/>'."\n";
    echo '      </p>'."\n";
    echo '      <div id="myapplet" style="visibility:hidden;" >'."\n";
    echo '          <applet name="WirisCASApplet" code="'.wrsqz_getCASClass(wrsqz_currentCASLanguage()).'" codebase="'.$CFG->wiriscascodebase.'" archive="'.wrsqz_getCASArchive(wrsqz_currentCASLanguage()).'" height="0" WIDTH="100%">'."\n";
    echo '              <param name="version" value="2.0"/>'."\n";
    echo '              <param name="command" value="false"/>'."\n";
    echo '				<param name="commands" value="false"/>'."\n";
    echo '				<param name="interface" value="false"/>'."\n";
    echo '				<param name="XMLinitialText" value="<?php echo $program; ?>"/>'."\n";
    echo '			</applet>'."\n";
    echo '		</div>'."\n";
    echo '	</td>'."\n";
    echo '</tr>'."\n";

	$submitscript = 'onclick="javascript:onSubmit();"';
	$hiddenfields = '<input type="hidden" name="hiddenCASValue" />';
}
function wrsqz_deprecated_html_is_blank($string){
    return trim(strip_tags($string, '<img><object><applet><input><select><textarea><hr>')) == '';
}
function wrsqz_deprecated_answersList($question){
    $answers = get_records('question_answers', 'question', $question->id);
    $answersId = array();
    foreach ($answers as $id=>$answer){
        $answersId[] = $id;
    }
	sort($answersId, SORT_NUMERIC);
    return implode(',',$answersId);
}

//These two functions are used at the moment (moodle 1.9.8) only by shortanswer,
//but most probably they'll be used by more qtypes later. They are needed until 1.9.3
function wrsqz_deprecated_question_id_column_name($questionType){
    if($questionType == 'shortanswer'){
        return 'question';
    }else{
        return null;
    }
}
function wrsqz_deprecated_extra_question_fields($questionType){
    if($questionType == 'shortanswer'){
        return array('question_shortanswer','answers','usecase');
    }else{
        return null;
    }
}

// http_build_query for PHP4
if(!function_exists('http_build_query')){
  function http_build_query($data, $numeric_prefix = '', $arg_separator = '&') {
    $toReturn = '';
    foreach ($data as $key => $value) {
      $toReturn .= rawurlencode($key) . '=' . rawurlencode($value) . $arg_separator;
    }

    return $toReturn;
  }
}
?>
