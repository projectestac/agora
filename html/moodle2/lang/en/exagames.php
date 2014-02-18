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
 * Strings for component 'exagames', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   exagames
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configure_questions'] = 'Configure Questions';
$string['configure_quiz'] = 'Configure Quiz';
$string['exagamesintro'] = 'Intro';
$string['exagamesname'] = 'Name';
$string['game_braingame'] = 'braingame';
$string['game_gamelabs'] = 'gamelabs.at';
$string['game_tiles'] = 'exaclick';
$string['game_tiles_rules'] = 'Are you ready for the exaclick challenge? Try to recognize what you see on these pictures and answer the questions. Here is what you need to do:<br />1. Click “Start” and a hidden image will appear. Tiles will gradually drop revealing more and more of the image/clip.<br />2. If you think you know enough, click “Stop”, the earlier you click “Stop” the higher your score will be. – But watch out!  If you click too early you might not yet see enough to answer the question!<br />3. Answer the pertaining question before time runs out.  You have 40 seconds to answer each question. You will get a higher score for more difficult questions and the faster you answer. Give a wrong answer and you will lose a life.<br />4. Keep on going until the end of the game<br />The questions will get more and more difficult. Be careful, you only have three lives. Only the most courageous and clever learners will be able to break the high-score. May the force be with you!';
$string['gametype'] = 'Game-Type';
$string['gametype_help'] = 'Exabis-Games currently consist of three different games:

* braingame - here Moodle-Tests are enhanced with a funny Flash-animation. The goal is to catapult the scientist into outer space - by not answering all questions correctly he only falls into the water!
* exaclick uncovers a hidden picture/clip for the player. If the "stop"-button is clicked - time stops and a Moodle-quiz-question has to be answered. This question has to be configured at the beginning by the trainer with the Flash-editor in the "configure questions"-tab.<br /><br />ATTENTION: the game only accepts links to files that are accessible for students within Moodle, i.e. from within a course-folder. the picture/clip has to be uploaded before question-configuration.
* gamelabs.at - this Opensource online-adventure-creator enables you to create small adventures based upon any subject. Games that have been created (by a trainer or a student) can be embedded into Moodle here.';
$string['modulename'] = 'Exabis Games';
$string['modulenameplural'] = 'Exabis Games';
$string['noquizzesincourse'] = 'Please create {$a->linkTag}a new quiz</a> first, before you add an Exabis Game!';
$string['pluginadministration'] = 'Exabis Games administration';
$string['pluginname'] = 'Exabis Games';
$string['question_configured'] = 'Question configured';
$string['question_not_configured'] = 'Question not configured';
$string['quizid'] = 'Quiz';
$string['quizid_help'] = 'choose the quiz that the braingame or exaclick should be based upon';
$string['savingdata'] = 'Saving data...';
$string['url'] = 'Url';
$string['url_help'] = 'paste your gamelabs.at-adventure game here to embed it.<br /><br />this option will only work with a gamelabs-game-link and does not need Moodle-questions.';
$string['version_5.2.0_needed'] = 'Exagames requires at least PHP-Version 5.2.0';
