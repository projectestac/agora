<?php

interface com_wiris_quizzes_api_QuestionRequest extends com_wiris_quizzes_api_Serializable{
	function addMetaProperty($name, $value);
}
