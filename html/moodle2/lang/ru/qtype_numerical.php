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
 * Strings for component 'qtype_numerical', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_numerical
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acceptederror'] = 'Допустимая погрешность';
$string['addmoreanswerblanks'] = 'Добавить {no} варианта(ов) ответа(ов)';
$string['addmoreunitblanks'] = 'Добавить {no} единиц(ы) измерения';
$string['answercolon'] = 'Ответ:';
$string['answermustbenumberorstar'] = 'Ответ должен быть числом, к примеру -1.234 или 3e8, или "*".';
$string['answerno'] = 'Вариант ответа {$a}';
$string['decfractionofquestiongrade'] = 'в виде дроби (от 0 до 1) от оценки за вопрос';
$string['decfractionofresponsegrade'] = 'в виде дроби (от 0 до 1) от оценки за ответ';
$string['decimalformat'] = 'знаков';
$string['editableunittext'] = 'текстовое поле ввода';
$string['errornomultiplier'] = 'Вам необходимо указать множитель для этой единицы измерения.';
$string['errorrepeatedunit'] = 'Не может быть двух единиц измерения с одним именем.';
$string['geometric'] = 'Геометрическая';
$string['invalidnumber'] = 'Вы должны ввести действительное число.';
$string['invalidnumbernounit'] = 'Вы должны ввести действительное число. Не включайте в ответ размерность .';
$string['invalidnumericanswer'] = 'В одном ответе Вы ввели недействительное число.';
$string['invalidnumerictolerance'] = 'В одной из погрешностей Вы ввели недействительное число.';
$string['leftexample'] = 'слева, например $1,00 или £1.00';
$string['manynumerical'] = 'Единицы измерения необязательны. Если они будут введены, то они будут использоваться для преобразования ответа в первую единицу измерения перед сортировкой.';
$string['multiplier'] = 'Множитель';
$string['nominal'] = 'Номинальная';
$string['noneditableunittext'] = 'НЕТ текста для Размерности 1';
$string['nonvalidcharactersinnumber'] = 'Число содержит некорректные символы';
$string['notenoughanswers'] = 'Вам необходимо ввести, как минимум, один вариант ответа.';
$string['nounitdisplay'] = 'Не оценивать единицу измерения';
$string['numericalmultiplier'] = 'Множитель';
$string['numericalmultiplier_help'] = 'Множитель - это коэффициент, на который будет умножаться правильный числовой ответ.

Первая единица измерения по умолчанию имеет множитель 1. Таким образом, если правильный числовой ответ - "5500" и в качестве первой единицы измерения задано значение "Вт", имеющее по умолчанию множитель 1, то правильным ответом будет "5500 Вт".

Если добавить единицу измерения "кВт" с множителем 0,001, то добавится правильный ответ "5,5 кВт". Это означает, что оба ответа "5500 Вт" и "5,5 кВт" будут считаться верными.

Заметьте, что допустимая погрешность тоже умножается, то есть погрешность в 100 Вт станет погрешностью 0,1 кВт.';
$string['oneunitshown'] = 'Первая единица измерения автоматически показывается рядом с полем ответа.';
$string['onlynumerical'] = 'Единицы измерения не используются вообще. Оценивается только ЧИСЛОВОЙ ОТВЕТ.';
$string['pleaseenterananswer'] = 'Пожалуйста, введите ответ.';
$string['pleaseenteranswerwithoutthousandssep'] = 'Введите свой ответ без использования разделителя тысяч ({$a}).';
$string['pluginname'] = 'Числовой ответ';
$string['pluginnameadding'] = 'Добавление вопроса с числовым ответом';
$string['pluginnameediting'] = 'Редактирование вопроса с числовым ответом';
$string['pluginname_help'] = 'Для студента вопрос с числовым ответом выглядит так же, как и вопрос типа "Короткий ответ".
Отличие в том, что в ответе на числовой вопрос допускается погрешность. Таким образом можно указать диапазон значений в качестве правильного ответа. Например, если ответом является число 10 и установлена погрешность, равная 2; тогда любое число от 8 до 12 будет восприниматься как верный ответ.';
$string['pluginnamesummary'] = 'Позволяет оценивать числовые ответы, в том числе с единицами измерения, несколькими способами, в том числе с учётом погрешностей.';
$string['relative'] = 'Относительная';
$string['rightexample'] = 'справа, как 1,00см или 1,00км';
$string['selectunit'] = 'Выберите единицу измерения';
$string['selectunits'] = 'Выберите единицы измерения';
$string['studentunitanswer'] = 'Ввод с использованием единиц измерения';
$string['tolerancetype'] = 'Тип погрешности';
$string['unit'] = 'Размерность';
$string['unitappliedpenalty'] = 'Эта оценка включает штраф в размере {$a} за неверную единицу измерения.';
$string['unitchoice'] = 'набор переключателей';
$string['unitedit'] = 'Редактировать единицу измерения';
$string['unitgraded'] = 'Единица измерения должна присутствовать: она тоже будет оцениваться.';
$string['unithandling'] = 'Оперирование размерностью';
$string['unithdr'] = 'Единица измерения "{$a}"';
$string['unitincorrect'] = 'Вы не указали правильную размерность.';
$string['unitmandatory'] = 'Обязательно';
$string['unitmandatory_help'] = '* Ответ будет оцениваться с учетом введенной размерности.

* Будет применяться штраф, если поле размерности пустое';
$string['unitnotselected'] = 'Вы должны выбрать единицу измерения.';
$string['unitonerequired'] = 'Вы должны ввести хотя бы одну размерность';
$string['unitoptional'] = 'Необязательная единица измерения';
$string['unitoptional_help'] = '* Если поле единицы измерения не пусто, ответ будет оценен с учетом этой единицы измерения.

* Если указана неверная или неизвестная единица измерения, ответ будет считаться неверным.';
$string['unitpenalty'] = 'Штраф за единицу измерения';
$string['unitpenalty_help'] = 'Штраф применяется, если

 - В поле ввода единиц измерения указана неопределенная единица измерения
 - Единица измерения указана в поле для ввода числового ответа';
$string['unitposition'] = 'Положение единиц измерения';
$string['unitselect'] = 'В раскрывающемся меню';
$string['validnumberformats'] = 'Допустимые форматы чисел';
$string['validnumberformats_help'] = '* Обычные числа: 13500.67; 13 500.67; 13500,67 или 13 500,67

* Если запятая (,) используется в качестве разделителя тысяч, то обязательно нужно указывать десятичную точку (.): 13,500.67; 13,500.0

* Для экспоненциальной записи чисел используйте знак E, например 1.350067 * 10<sup>4</sup> можно записать как 1.350067 Е4  или  1.350067 E04';
$string['validnumbers'] = '13500.67; 13 500.67; 13,500.67; 13500,67; 13 500,67; 1.350067 E4 или 1.350067 E04';
