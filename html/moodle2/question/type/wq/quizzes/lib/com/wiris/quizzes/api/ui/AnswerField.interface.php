<?php

interface com_wiris_quizzes_api_ui_AnswerField extends com_wiris_quizzes_api_ui_QuizzesField{
	function getEditorAsync($listener);
	function getEditor();
	function setEditorInitialParams($parameters);
	function getFieldType();
}
