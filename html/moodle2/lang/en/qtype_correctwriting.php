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
 * Strings for component 'qtype_correctwriting', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_correctwriting
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['absenthintpenaltyfactor'] = 'Penalty factor for absent token mistake hints';
$string['absenthintpenaltyfactor_help'] = 'For hints, revealing a token text, absent token mistake is a special case. Other mistakes means student at least tried to typed anything close to this token anywhere in response, but absent token means he does not type it at all. So for that particular mistake hints will reveal more information. The factor allows you to increase penalty for such hints. If resulting penalty will exceed 1, the hint will be disabled.';
$string['absentmistakemessage'] = '{$a} is missing';
$string['absentmistakeweight'] = 'Penalty for missing token';
$string['absentmistakeweight_help'] = 'Penalty for each missing token in student\'s response, if the number of mistakes not exceed maximum mistake percentage.';
$string['addedmistakemessage'] = 'there is extra "{$a}"';
$string['addedmistakemessage_notexist'] = '"{$a}" should not be in response';
$string['addedmistakeweight'] = 'Penalty for extra token';
$string['addedmistakeweight_help'] = 'Penalty for each extra token in student\'s response, if the number of mistakes not exceed maximum mistake percentage.';
$string['and'] = 'and';
$string['answersinstruct'] = 'Enter one or more correct answers. When you try to save the questions, answers will be tokenized using rules of selected language and you will be given an option to enter descriptions for each token. Token description is used instead of token text in mistake messages and hints to not disclose to the student actual value of the token. If you leave description empty, token value will be used instead. But you must enter correct number of empty strings as descriptions to be sure you don\'t just forget to enter descriptions when adding new answer.';
$string['caseno'] = 'No, case is unimportant';
$string['casesensitive'] = 'Case sensitivity';
$string['caseyes'] = 'Yes, case is important';
$string['clanguagemulticharliteral'] = 'There are several characters in character literal at {$a->linestart}:{$a->colstart}';
$string['correctwriting'] = 'Correct writing';
$string['enterlexemedescriptions'] = 'Please enter token descriptions';
$string['foundlexicalerrors'] = 'There are lexical errors in your answer. Please consider fixing following errors:';
$string['foundmistake'] = 'There is mistake in your response:';
$string['foundmistakes'] = 'There are mistakes in your response:';
$string['hintgradeborder'] = 'Minimum grade for answer to display mistakes';
$string['hintgradeborder_help'] = 'Only answers with grade greater or equal this grade will be considered correct and display mistakes and hints. An answers with the lower grades will be used only when exactly matched. You could use an answers with the lower grade to give a special feedback for some mistakes.';
$string['hinting'] = 'Hinting options';
$string['hinting_help'] = 'Hinting options allows you to set availability and penalties for various hints. To disable any hint type, just set its penalty above 1.';
$string['imageanswer'] = 'Correct answer:';
$string['imageresponse'] = 'You response:';
$string['langid'] = 'Language of the answer';
$string['langid_help'] = 'This language will be used to tokenize answers and responses to the question.';
$string['lexemedescriptions'] = 'Descriptions for the tokens';
$string['lexical_analyzer'] = 'Typo analysis';
$string['lexical_analyzer_help'] = 'Typo analysis assumes, that student can have mistakes inside of tokens. Turn it off if any mistakes inside of lexemes should be treated other lexemes';
$string['lexicalerrorthreshold'] = 'Lexical error threshold';
$string['lexicalerrorthreshold_help'] = 'A maximum <a href = "http://en.wikipedia.org/wiki/Damerau%E2%80%93Levenshtein_distance">Damerau-Levenshtein distance</a> between correct and incorrect words for incorrect word to be considered a typo. Enter it as a fraction of the length of the correct word.';
$string['lexicalerrorweight'] = 'Penalty for lexical mistake';
$string['lexicalerrorweight_help'] = 'Penalty for each lexical mistake in student\'s response: a typo, an extra or absent separator etc.';
$string['maxmistakepercentage'] = 'Maximum percent of mistakes';
$string['maxmistakepercentage_help'] = 'Maximum allowed number of mistakes in student\'s response as a percent of the number of the tokens in the answer. If the number of mistakes exceed that, answer will be considered not matched at all.';
$string['mistakentokens'] = 'mistaken tokens';
$string['movedmistakemessage'] = '{$a} misplaced';
$string['movedmistakemessagenodescription'] = 'the "{$a->value}" at {$a->line}:{$a->position} is misplaced';
$string['movedmistakeweight'] = 'Penalty for misplaced token';
$string['movedmistakeweight_help'] = 'Penalty for each misplaced token in student\'s response, if the number of mistakes not exceed maximum mistake percentage.';
$string['objectname'] = 'question';
$string['parseerror'] = 'Ошибка при синтаксическом разборе! Пожалуйста, проверьте свой ответ еще раз и исправьте её';
$string['pleaseenterananswer'] = 'Please enter an answer.';
$string['pluginname'] = 'Correct writing';
$string['pluginnameadding'] = 'Adding a correct writing question';
$string['pluginnameediting'] = 'Editing a correct writing question';
$string['pluginname_help'] = 'Enter the question and correct answer(s). When you try to save question, answer will be breaked down to the smallest meaningful parts of selectet languges - the <b>tokens</b>. You need to write grammatical role of these tokens to be shown in the mistake message. If you leave description string empty, token text will be used in mistake message instead.';
$string['pluginname_link'] = 'question/type/correctwriting';
$string['pluginnamesummary'] = 'Question type that can automatically find mistakes in the string response and grade it with penalties. It currently supports token sequence errors: finding misplaced, absent and extra tokens.';
$string['questioneditingheading'] = 'Question editing settings';
$string['sequence_analyzer'] = 'Token sequence analysis';
$string['sequence_analyzer_help'] = 'Token sequence analysis assumes that order of tokens in the answer is important. It can find and report misplaced tokens to the student. Turn it off if tokens from the correct answer could be given by student in any order.';
$string['syntax_analyzer'] = 'Tree coverage analysis';
$string['syntax_analyzer_help'] = 'Tree coverage analysis can be used if language supports parsing for reducing amount of mistakes, shown to student. Note, that it would not be ran, if language does not support parsing';
$string['tokens'] = 'Tokens';
$string['toobigfloatvalue'] = 'This value should be no more than {$a}';
$string['toosmallfloatvalue'] = 'This value should be not less than {$a}';
$string['usesomething'] = 'Use {$a}';
$string['whatis'] = 'what is {$a}';
$string['whatishint'] = 'the {$a->tokendescr} is "{$a->tokenvalue}"';
$string['whatishintpenalty'] = 'Penalty for "what is" hint';
$string['whatishintpenalty_help'] = '"What is" hint allows student to see token value instead of description in mistake message in adaptive behaviour. Setting penalty above 1 will disable the hint.';
$string['wherepichint'] = 'where {$a} should be (picture)';
$string['wherepichintpenalty'] = 'Penalty for "where" picture hint';
$string['wherepichintpenalty_help'] = '"Where" picture hint shows student a picture about a place (between what tokens?) should be placed a missing or misplaced token. Token descriptions are used when possible, token value otherwise. Setting penalty above 1 will disable the hint.';
$string['wheretxtafter'] = 'the {$a->token} could be placed after {$a->after}';
$string['wheretxtbefore'] = 'the {$a->token} could be placed before {$a->before}';
$string['wheretxtbetween'] = 'the {$a->token} could be placed between {$a->after} and {$a->before}';
$string['wheretxthint'] = 'where {$a} should be';
$string['wheretxthintpenalty'] = 'Penalty for "where" text hint';
$string['wheretxthintpenalty_help'] = '"Where" text hint shows student a text message about a place (between what tokens?) should be placed a missing or misplaced token. Token descriptions are used when possible, token value otherwise. Setting penalty above 1 will disable the hint.';
$string['writelessdescriptions'] = 'Supplied amount of descriptions are more than amount of tokens';
$string['writemoredescriptions'] = 'Supplied amount of descriptions are less than amount of tokens';
