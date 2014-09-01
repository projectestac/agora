<?php

interface com_wiris_quizzes_api_QuestionInstance extends com_wiris_quizzes_api_Serializable{
	function areVariablesReady();
	function getAssertionChecks($correctAnswer, $studentAnswer);
	function getStudentAnswer($index);
	function setStudentAnswer($index, $answer);
	function setCasSession($session);
	function setRandomSeed($seed);
	function getStudentQuestionInstance();
	function getAnswerGrade($correctAnswer, $studentAnswer, $question);
	function expandVariablesText($text);
	function expandVariablesMathML($mathml);
	function expandVariables($html);
	function isAnswerCorrect($studentAnswer);
	function update($response);
}
