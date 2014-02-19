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
 * Strings for component 'qtype_calculated', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_calculated
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additem'] = 'Добавить вариант';
$string['addmoreanswerblanks'] = 'Добавить вариант ответа';
$string['addmoreunitblanks'] = 'Добавить размерности - {$a} ';
$string['addsets'] = 'Добавить набор(ы)';
$string['answerhdr'] = 'Вариант ответа';
$string['answerstoleranceparam'] = 'Параметры погрешности ответов';
$string['answerwithtolerance'] = '{$a->answer} (±{$a->tolerance} {$a->tolerancetype})';
$string['anyvalue'] = 'Любое значение';
$string['atleastoneanswer'] = 'Вам необходимо указать хотя бы один вариант ответа.';
$string['atleastonerealdataset'] = 'В тексте вопроса должен быть по меньшей мере один реальный набор данных';
$string['atleastonewildcard'] = 'В формуле ответа или тексте вопроса должен быть по меньшей мере один подстановочный знак ';
$string['calcdistribution'] = 'Распределение';
$string['calclength'] = 'Десятичных знаков';
$string['calcmax'] = 'Максимум';
$string['calcmin'] = 'Минимум';
$string['choosedatasetproperties'] = 'Укажите свойства набора данных подстановочных знаков';
$string['choosedatasetproperties_help'] = 'Набор данных представляет собой набор значений, вставляемый вместо подстановочных знаков. Вы можете создать частный набор данных для конкретного вопроса или общий набор данных, которые могут быть использованы другими вычисляемыми вопросами, входящими в категорию.';
$string['correctanswerformula'] = 'Формула правильного ответа';
$string['correctanswershows'] = 'Отображение правильного ответа';
$string['correctanswershowsformat'] = 'Формат';
$string['correctfeedback'] = 'Для любого правильного ответа';
$string['dataitemdefined'] = 'доступны с {$a} числовыми значениями ';
$string['datasetrole'] = 'Подстановочные знаки <strong>{x..}</strong> будут заменены числовыми значениями из их набора';
$string['decimals'] = 'используя {$a}';
$string['deleteitem'] = 'Удалить вариант';
$string['deletelastitem'] = 'Удалить последний вариант';
$string['distributionoption'] = 'Выбрать параметр распределения';
$string['editdatasets'] = 'Редактировать наборы данных подстановочных знаков';
$string['editdatasets_help'] = 'Значения подстановочного знака могут быть созданы путем ввода числа в каждое поле подстановочного знака и нажатием кнопки «Добавить». Для автоматического создания 10 или более значений выберите необходимое количество значений, затем нажмите на кнопку «Добавить». Равномерное распределение означает, что любое значение диапазона может быть сгенерировано с равной вероятностью; логарифмическое распределение означает, что более вероятно значение из нижней части диапазона.';
$string['existingcategory1'] = 'использовать существующий общий набор данных';
$string['existingcategory2'] = 'файл из уже существующего набора файлов, которые используются также другими вопросами в этой категории';
$string['existingcategory3'] = 'ссылка на уже существующий набор ссылок, которые также используются другими вопросами в этой категории';
$string['forceregeneration'] = 'принудительно обновить';
$string['forceregenerationall'] = 'принудительное обновление всех подстановочных знаков';
$string['forceregenerationshared'] = 'принудительное обновление только подстановочных знаков, которые не являются общими';
$string['functiontakesatleasttwo'] = 'Функция {$a} должна иметь минимум два аргумента';
$string['functiontakesnoargs'] = 'Функция {$a} не принимает никаких аргументов';
$string['functiontakesonearg'] = 'Функция {$a} должна иметь только один аргумент';
$string['functiontakesoneortwoargs'] = 'Функция {$a} должна иметь один или два аргумента';
$string['functiontakestwoargs'] = 'Функция {$a} должна иметь два аргумента';
$string['generatevalue'] = 'Создать новое значение между';
$string['getnextnow'] = 'Получить новый «Добавляемый вариант»';
$string['hexanotallowed'] = 'В наборе данных <strong>{$a->name}</strong> шестнадцатеричный формат значения {$a->value} не допускается';
$string['illegalformulasyntax'] = 'Синтаксис формулы не может начинаться с «{$a}»';
$string['incorrectfeedback'] = 'Для любого неправильного ответа';
$string['itemno'] = 'Вариант {$a}';
$string['itemscount'] = 'Всего<br />вариантов';
$string['itemtoadd'] = 'Добавляемый вариант';
$string['keptcategory1'] = 'использовать ранее применяемый общий набор данных';
$string['keptcategory2'] = 'прежний файл из многоразового набора файлов той же категории';
$string['keptcategory3'] = 'прежняя ссылка из многоразового набора ссылок той же категории';
$string['keptlocal1'] = 'использовать ранее применяемый частный набор данных';
$string['keptlocal2'] = 'прежний файл с тем же вопросом из частного набора файлов ';
$string['keptlocal3'] = 'прежняя ссылка с тем же вопросом из частного набора ссылок';
$string['lengthoption'] = 'Выбрать параметр длины';
$string['loguniform'] = 'Логарифмическое';
$string['loguniformbit'] = 'цифр, с логарифмическим распределением';
$string['makecopynextpage'] = 'Следующая страница (новый вопрос)';
$string['mandatoryhdr'] = 'Обязательные подстановочные знаки, использующиеся в вариантах ответа';
$string['max'] = 'Максимум';
$string['min'] = 'Минимум';
$string['minmax'] = 'Диапазон значений';
$string['missingformula'] = 'Отсутствующая формула';
$string['missingname'] = 'Нет названия вопроса';
$string['missingquestiontext'] = 'Нет текста вопроса';
$string['mustbenumeric'] = 'Здесь нужно ввести число.';
$string['mustenteraformulaorstar'] = 'Вы должны ввести формулу или «*».';
$string['mustnotbenumeric'] = 'Это не число.';
$string['newcategory1'] = 'использовать новый общий набор данных';
$string['newcategory2'] = 'файл из нового набора файлов, которые также могут быть использованы другими вопросами в этой категории';
$string['newcategory3'] = 'ссылка с новым набором ссылок, которые также могут быть использованы другими вопросами в этой категории';
$string['newlocal1'] = 'использовать новый частный набор данных';
$string['newlocal2'] = 'файл из нового набора файлов, который будет использоваться только этим вопросом';
$string['newlocal3'] = 'ссылка из нового набора ссылок, который будет использоваться только этим вопросом';
$string['newsetwildcardvalues'] = 'новый набор (новые наборы) значений подстановочного знака (подстановочных знаков)';
$string['nextitemtoadd'] = 'Следующий «Добавляемый вариант»';
$string['nextpage'] = 'Следующая страница';
$string['nocoherencequestionsdatyasetcategory'] = 'Для вопроса id {$a->qid} в категории id {$a->qcat} нет совпадения с общим подстановочным знаком {$a->name} категории id {$a->sharedcat}. Отредактируйте вопрос.';
$string['nocommaallowed'] = 'Запятая (,) не может быть использована, используйте точку (.), например: 0.013 или 1.3e-2';
$string['nodataset'] = 'ничего - это не подстановочный знак';
$string['nosharedwildcard'] = 'Нет общих подстановочных знаков в этой категории';
$string['notvalidnumber'] = 'Значение подстановочного знака не является допустимым числом';
$string['oneanswertrueansweroutsidelimits'] = 'По меньшей мере, один правильный ответ вне пределов диапазона верного значения. <br /> Изменить настройки погрешности ответов, доступные в Расширенных параметрах';
$string['param'] = 'Параметр {<strong>{$a}</strong>}';
$string['partiallycorrectfeedback'] = 'Для любого частично правильного ответа';
$string['pluginname'] = 'Вычисляемый';
$string['pluginnameadding'] = 'Добавление «Вычисляемого вопроса»';
$string['pluginnameediting'] = 'Редактирование «Вычисляемого вопроса»';
$string['pluginname_help'] = 'Вычисляемые вопросы позволяют создавать индивидуальные числовые вопросы, используя подстановочные знаки в фигурных скобках, которые заменяются индивидуальными значениями при прохождении теста. Например, в вопросе «Какова площадь прямоугольника длиной {L} и шириной {W}?» формулой правильного ответа должно быть «{L} * {W}» (где * означает умножение).';
$string['pluginnamesummary'] = 'Вычисляемые вопросы подобны числовым вопросам, только в них используются числа, которые случайно выбираются из набора при прохождении теста.';
$string['possiblehdr'] = 'Возможные подстановочные знаки представлены только в тексте вопроса';
$string['questiondatasets'] = 'Наборы данных вопроса';
$string['questiondatasets_help'] = 'Наборы данных подстановочных знаков вопроса, которые будут использоваться в каждом отдельном вопросе';
$string['questionstoredname'] = 'Название сохраненного вопроса';
$string['replacewithrandom'] = 'Заменить на случайное значение';
$string['reuseifpossible'] = 'повторно использовать предыдущее доступное значение';
$string['setno'] = 'Набор {$a}';
$string['setwildcardvalues'] = 'Значения набора (наборов) подстановочного знака или знаков';
$string['sharedwildcard'] = 'Общий подстановочный знак {<strong>{$a}</strong>}';
$string['sharedwildcardname'] = 'Общий подстановочный знак';
$string['sharedwildcards'] = 'Общие подстановочные знаки';
$string['showitems'] = 'Отобразить';
$string['significantfigures'] = 'с {$a}';
$string['significantfiguresformat'] = 'значащих цифр';
$string['synchronize'] = 'Синхронизировать данные из общих наборов с другими вопросами теста';
$string['synchronizeno'] = 'Не синхронизировать';
$string['synchronizeyes'] = 'Синхронизировать';
$string['synchronizeyesdisplay'] = 'Синхронизировать и отобразить названия общих наборов данных как префикс названия вопроса';
$string['tolerance'] = 'Погрешность &plusmn;';
$string['trueanswerinsidelimits'] = 'Правильный ответ: {$a->correct} в пределах диапазона правильного значения {$a->true}';
$string['trueansweroutsidelimits'] = '<span class="error">ОШИБКА! Правильный ответ: {$a->correct} вне пределов диапазона правильного значения {$a->true}</span>';
$string['uniform'] = 'Равномерное';
$string['uniformbit'] = 'десятичных знаков, с равномерным распределением';
$string['unsupportedformulafunction'] = 'Функция {$a} не поддерживается';
$string['updatecategory'] = 'Обновить категорию';
$string['updatedatasetparam'] = 'Обновить параметры наборов данных';
$string['updatetolerancesparam'] = 'Обновить параметры погрешности ответов';
$string['updatewildcardvalues'] = 'Обновить значения подстановочного знака (знаков)';
$string['useadvance'] = 'Используйте кнопку Прогресс, чтобы увидеть ошибки';
$string['usedinquestion'] = 'Используются в вопросе';
$string['wildcard'] = 'Подстановочный знак {<strong>{$a}</strong>}';
$string['wildcardparam'] = 'Параметры подстановочных знаков, используемые при генерации значений';
$string['wildcardrole'] = 'Подстановочные знаки <strong>{x..}</strong> будут заменены числовыми значениями из сгенерированных';
$string['wildcards'] = 'Подстановочные знаки  {a}...{z}';
$string['wildcardvalues'] = 'Значения подстановочного знака (знаков)';
$string['wildcardvaluesgenerated'] = 'Сгенерированные значения подстановочного знака (знаков)';
$string['youmustaddatleastoneitem'] = 'Вы должны добавить по меньшей мере один элемент набора данных, прежде чем сможете сохранить этот вопрос.';
$string['youmustaddatleastonevalue'] = 'Вы должны добавить по меньшей мере один набор значений подстановочного знака (знаков), прежде чем сможете сохранить этот вопрос.';
$string['youmustenteramultiplierhere'] = 'Здесь нужно ввести множитель.';
$string['zerosignificantfiguresnotallowed'] = 'Верный ответ не может иметь ноль значимых цифр!';
