<?php

interface com_wiris_quizzes_api_ui_QuizzesField extends com_wiris_quizzes_api_ui_QuizzesComponent{
	function addQuizzesFieldListener($listener);
	function setValue($value);
	function getValue();
}
