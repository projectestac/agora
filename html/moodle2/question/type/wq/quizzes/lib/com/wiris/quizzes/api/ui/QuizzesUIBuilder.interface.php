<?php

interface com_wiris_quizzes_api_ui_QuizzesUIBuilder {
	function getMathViewer();
	function newAuxiliarCasField($question, $instance, $index);
	function newAuthoringField($question, $instance, $index);
	function newAnswerField($question, $instance, $index);
	function newAnswerFeedback($question, $instance, $index);
	function setLanguage($lang);
}
