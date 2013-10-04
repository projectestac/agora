<?php

interface com_wiris_quizzes_api_Question extends com_wiris_quizzes_api_Serializable{
	function addAssertion($name, $correctAnswer, $studentAnswer, $parameters);
	function getStudentQuestion();
}
