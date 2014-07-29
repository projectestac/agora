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
 * Strings for component 'quiz_statistics', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   quiz_statistics
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actualresponse'] = 'Фактический ответ';
$string['allattempts'] = 'все попытки';
$string['allattemptsavg'] = 'Средняя оценка по всем попыткам';
$string['allattemptscount'] = 'Общее количество полностью оцененных попыток';
$string['analysisofresponses'] = 'Анализ ответов';
$string['analysisofresponsesfor'] = 'Анализ ответов на «{$a}».';
$string['attempts'] = 'Попытки';
$string['attemptsall'] = 'все попытки';
$string['attemptsfirst'] = 'первая попытка';
$string['backtoquizreport'] = 'Вернуться к основной странице статистики';
$string['calculatefrom'] = 'Рассчитать статистику';
$string['cic'] = 'Коэффициент внутренней согласованности (для {$a})';
$string['completestatsfilename'] = 'completestats';
$string['count'] = 'Количество';
$string['coursename'] = 'Название курса';
$string['detailedanalysis'] = 'Более детальный анализ ответов на этот вопрос';
$string['discrimination_index'] = 'Индекс дискриминации';
$string['downloadeverything'] = 'Скачать полный отчет как {$a->formatsmenu} {$a->downloadbutton}';
$string['duration'] = 'Открыть на';
$string['errordeleting'] = 'Ошибка при удалении старых записей {$a}.';
$string['erroritemappearsmorethanoncewithdifferentweight'] = 'Вопрос ({$a}) присутствует несколько раз с различными весами в разных местах теста. В настоящее время это не поддерживается в статистическом отчете и может сделать статистику этого вопроса ненадежной.';
$string['errormedian'] = 'Ошибка выборки среднего';
$string['errorpowerquestions'] = 'Ошибка выборки данных расчета дисперсии для оценок вопроса';
$string['errorpowers'] = 'Ошибка выборки данных расчета дисперсии для оценок вопроса';
$string['errorrandom'] = 'Ошибка получения данных случайных элементов';
$string['errorratio'] = 'Соотношение ошибок (для {$a})';
$string['errorstatisticsquestions'] = 'Ошибка выборки данных расчета статистики для оценок вопроса';
$string['facility'] = 'Индекс легкости';
$string['firstattempts'] = 'первые попытки';
$string['firstattemptsavg'] = 'Средняя оценка первых попыток';
$string['firstattemptscount'] = 'Количество полностью оцененных первых попыток';
$string['frequency'] = 'Частота';
$string['highestattempts'] = 'лучшая из оцененных попыток';
$string['highestattemptsavg'] = 'средняя оценка из лучших оцененных попыток';
$string['intended_weight'] = 'Намеченный вес';
$string['kurtosis'] = 'Оценка распределения эксцесса (для {$a})';
$string['lastattempts'] = 'Последняя попытка';
$string['lastattemptsavg'] = 'Средняя оценка последних попыток';
$string['lastcalculated'] = 'Последние ранее рассчитанные попытки {$a->lastcalculated};  с тех пор - {$a->count}.';
$string['median'] = 'Медиана оценок (для {$a})';
$string['modelresponse'] = 'Модель ответа';
$string['negcovar'] = 'Отрицательная ковариация оценки с общей оценкой попытки';
$string['negcovar_help'] = 'Оценка этого вопроса в этом наборе попыток теста меняется в противоположную сторону от общей оценки попытки. Средняя общая оценка попытки склонна быть ниже средней когда оценка для этого вопроса выше средней, и наоборот.

В этом случае уравнение для эффективного веса вопроса не может быть решено. Можно рассчитать эффективный вес для других вопросов этого теста и эффективный вес для этого вопроса, если выделенным вопросам с отрицательной ковариацией задать максимальную оценку ноль.

Если при редактировании теста дать этим вопросам с отрицательной ковариацией максимальную оценку ноль, то эффективный вес этого вопроса будет равен нулю, а реальный эффективный вес других вопросов будет равным рассчитанному сейчас.';
$string['nostudentsingroup'] = 'В этой группе нет студентов';
$string['optiongrade'] = 'Частичный кредит';
$string['partofquestion'] = 'Часть вопроса';
$string['pluginname'] = 'Статистика';
$string['position'] = 'Позиция';
$string['positions'] = 'Позиция(и)';
$string['questioninformation'] = 'Информация вопроса';
$string['questionname'] = 'Название вопроса';
$string['questionnumber'] = '№';
$string['questionstatistics'] = 'Статистика вопроса';
$string['questionstatsfilename'] = 'questionstats';
$string['questiontype'] = 'Тип вопроса';
$string['quizinformation'] = 'Информация о тесте';
$string['quizname'] = 'Название теста';
$string['quizoverallstatistics'] = 'Общая статистика теста';
$string['quizstructureanalysis'] = 'Анализ структуры теста';
$string['recalculatenow'] = 'Пересчитать сейчас';
$string['reportsettings'] = 'Настройки статистического отчета';
$string['response'] = 'Ответ';
$string['skewness'] = 'Оценка асимметрии распределения (для {$a})';
$string['standarddeviation'] = 'Стандартное отклонение (для {$a})';
$string['standarddeviationq'] = 'Стандартное отклонение';
$string['standarderror'] = 'Стандартная ошибка ( для {$a})';
$string['statistics'] = 'Статистика';
$string['statistics:componentname'] = 'Статистический отчет теста';
$string['statisticsreport'] = 'Статистический отчет';
$string['statisticsreportgraph'] = 'Статистика по позиции вопроса';
$string['statistics:view'] = 'Просматривать статистический отчет';
$string['statsfor'] = 'Статистика теста (для {$a})';
