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
 * Strings for component 'tool_qeupgradehelper', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_qeupgradehelper
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Действие';
$string['alreadydone'] = 'Все уже было обновлено';
$string['areyousure'] = 'Вы уверены?';
$string['areyousuremessage'] = 'Вы хотите приступить к обновлению всех попыток ({$a->numtoconvert}) теста «{$a->name}» в курсе {$a->shortname}?';
$string['areyousureresetmessage'] = 'Тест «{$a->name}» в курсе {$a->shortname} содержит попытки ({$a->totalattempts}), из которых ({$a->convertedattempts}) были преобразованы из старой системы. Часть их ({$a->resettableattempts}) может быть сброшена для последующего повторного обновления. Вы хотите приступить к этому?';
$string['attemptstoconvert'] = 'Попытки, требующие обновления';
$string['backtoindex'] = 'Вернуться на главную страницу';
$string['conversioncomplete'] = 'Преобразование завершено';
$string['convertattempts'] = 'Обновление попыток';
$string['convertedattempts'] = 'Обновленные попытки';
$string['convertquiz'] = 'Обновление попыток ...';
$string['cronenabled'] = 'Использовать Cron';
$string['croninstructions'] = 'Вы можете использовать Cron для автоматического завершения обновления. Cron будет запускаться в выбранные часы суток (в соответствии с местным временем сервера). При каждом запуске Cron`а он будет обрабатывать несколько попыток до истечения лимита времени, потом он будет остановлен и ждать следующего запуска Cron. Даже если Вы используете Cron, он ничего не будет делать, если обнаруживает, что основные обновления до 2.1 были завершены.';
$string['cronprocesingtime'] = 'Продолжительность каждого запуска cron';
$string['cronsetup'] = 'Настройка cron';
$string['cronsetup_desc'] = 'Вы можете настроить cron для автоматического завершения обновления результатов попыток теста.';
$string['cronstarthour'] = 'Время запуска';
$string['cronstophour'] = 'Время остановки';
$string['extracttestcase'] = 'Извлечение случайного примера теста';
$string['extracttestcase_desc'] = 'Использовать пример данных из базы данных, чтобы помочь создать тесты, которые могут быть применены для проверки обновлений.';
$string['gotoindex'] = 'Вернуться к списку тестов, которые могут быть обновлены';
$string['gotoquizreport'] = 'Перейти к отчетам этого теста для проверки обновления';
$string['gotoresetlink'] = 'Перейти к списку тестов, которые могут быть сброшены';
$string['includedintheupgrade'] = 'Включить в обновление?';
$string['invalidquizid'] = 'Неверный ID теста. Тест не существует или не имеет попыток для обновления.';
$string['listpreupgrade'] = 'Список тестов и попыток';
$string['listpreupgrade_desc'] = 'В списке отображается отчет о всех тестах в системе и количестве имеющихся в них попыток. Он дает представление о масштабах обновления, которое Вы можете сделать.';
$string['listpreupgradeintro'] = 'Это количество попыток тестов, которые должны быть обработаны при обновлении сайта. Несколько десятков тысяч не должно беспокоить. При большем количестве Вы должны представлять, как долго будет выполняться обновление.';
$string['listtodo'] = 'Список обновляемых тестов';
$string['listtodo_desc'] = 'Список отображает отчет о всех тестах в системе (если таковые имеются), в которых есть попытки, которые нуждаются в обновлении до новых возможностей вопросов.';
$string['listtodointro'] = 'Все эти тесты содержат результаты попыток, которые должны быть обновлены. Вы можете обновить попытки, нажав на ссылку.';
$string['listupgraded'] = 'Список уже обновленных тестов, которые могут быть сброшены';
$string['listupgraded_desc'] = 'Список отображает отчет о всех тестах в системе с обновленными попытками, в которых по-прежнему присутствуют старые данные. Поэтому обновление может быть сброшено и проведено заново.';
$string['listupgradedintro'] = 'Все эти тесты содержат обновленные попытки, в которых по-прежнему есть старые данные. Поэтому они могут быть сброшены и повторно сделано обновление.';
$string['noquizattempts'] = 'На всём сайте нет ни одной попытки тестов!';
$string['nothingupgradedyet'] = 'Нет обновленных попыток, которые могут быть сброшены';
$string['notupgradedsiterequired'] = 'Этот скрипт может работать только до обновления сайта.';
$string['numberofattempts'] = 'Количество попыток теста';
$string['oldsitedetected'] = 'Этот сайт еще не был обновлен, чтобы использовать новые возможности вопросов.';
$string['outof'] = '{$a->some} из {$a->total}';
$string['pluginname'] = 'Помощник обновления возможностей вопросов';
$string['pretendupgrade'] = 'Выполнить пробный прогон обновления попыток';
$string['pretendupgrade_desc'] = 'Обновление происходит в три этапа: загрузка существующих данных из базы данных; их преобразование; а затем запись преобразованных данных в БД. Этот скрипт будет проверять первые две части этого процесса.';
$string['questionsessions'] = 'Сессии вопроса';
$string['quizid'] = 'ID теста';
$string['quizupgrade'] = 'Состояние обновления теста';
$string['quizzesthatcanbereset'] = 'Следующие тесты содержат обновленные попытки, которые можно сбросить';
$string['quizzestobeupgraded'] = 'Все тесты с попытками';
$string['quizzeswithunconverted'] = 'Следующие тесты содержат попытки, требующие обновления';
$string['resetcomplete'] = 'Сброс выполнен';
$string['resetquiz'] = 'Сброс попыток...';
$string['resettingquizattempts'] = 'Сброс попыток теста';
$string['resettingquizattemptsprogress'] = 'Сброс попытки {$a->done} / {$a->outof}';
$string['upgradedsitedetected'] = 'Этот сайт был обновлен для использования новых возможностей вопросов.';
$string['upgradedsiterequired'] = 'Этот скрипт может работать только после обновления сайта.';
$string['upgradingquizattempts'] = 'Обновление попыток теста «{$a->name}» в курсе {$a->shortname}';
$string['veryoldattemtps'] = 'Ваш сайт имеет попытки теста ({$a}), которые не были полностью обновлены при обновлении с Moodle 1.4 до Moodle 1.5. Эти попытки будут рассмотрены перед основным обновлением. Вы должны предусмотреть необходимое дополнительное время для этого.';
