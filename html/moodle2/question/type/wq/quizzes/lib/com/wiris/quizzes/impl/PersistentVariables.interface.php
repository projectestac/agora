<?php

interface com_wiris_quizzes_impl_PersistentVariables {
	function unlockVariable($name);
	function lockVariable($name);
	function setVariable($name, $value);
	function getVariable($name);
}
