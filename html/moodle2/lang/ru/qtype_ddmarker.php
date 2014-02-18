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
 * Strings for component 'qtype_ddmarker', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_ddmarker
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmoreitems'] = 'Добавить маркеры - {no}';
$string['alttext'] = 'Альтернативный текст';
$string['answer'] = 'Ответ';
$string['bgimage'] = 'Фоновое изображение';
$string['coords'] = 'Координаты';
$string['correctansweris'] = 'Верный ответ: {$a}';
$string['draggableimage'] = 'Перетаскиваемое изображение';
$string['draggableitem'] = 'Перетаскиваемый элемент';
$string['draggableitemheader'] = 'Перетаскиваемый элемент {$a}';
$string['draggableitemtype'] = 'Тип';
$string['draggableword'] = 'Перетаскиваемый текст';
$string['dropzone'] = 'Зона размещения {$a}';
$string['dropzoneheader'] = 'Зоны размещения';
$string['followingarewrong'] = 'Следующие маркеры были помещены в ошибочные зоны: {$a}.';
$string['followingarewrongandhighlighted'] = 'Следующие маркеры были неверно расположены: {$a}. Подсвеченные маркеры теперь показаны с правильными расположениями.<br /> Нажмите на маркер, чтобы подсветить разрешенную зону.';
$string['formerror_nobgimage'] = 'Вам нужно выбрать изображение в качестве фона для зоны размещения.';
$string['formerror_noitemselected'] = 'Вы определили зону размещения, но не выбрали маркер, который будет размещаться в этой зоне';
$string['formerror_nosemicolons'] = 'Отсутствуют запятые в строке координат. Ваши координаты для {$a->shape} должны быть представлены как - {$a->coordsstring}';
$string['formerror_onlysometagsallowed'] = 'Только теги «{$a}» разрешены в качестве метки для маркера';
$string['formerror_onlyusewholepositivenumbers'] = 'Пожалуйста, используйте только целые положительные числа для определения x,y координат и/или ширины и высоты фигуры. Ваши координаты для {$a->shape} должны быть представлены как - {$a->coordsstring}';
$string['formerror_polygonmusthaveatleastthreepoints'] = 'Для многоугольника вам нужно определить как минимум 3 точки. Ваши координаты для {$a->shape} должны быть представлены как - {$a->coordsstring}';
$string['formerror_shapeoutsideboundsofbgimage'] = 'Заданная Вами фигура вышла за пределы фонового изображения';
$string['formerror_toomanysemicolons'] = 'Вы указали слишком много запятых в качестве разделяющих элементов координат. Ваши координаты для {$a->shape} должны быть представлены как - {$a->coordsstring}';
$string['formerror_unrecognisedwidthheightpart'] = 'Не удалось определить ширину и высоту, заданные Вами. Ваши координаты для {$a->shape} должны быть представлены как - {$a->coordsstring}';
$string['formerror_unrecognisedxypart'] = 'Не удалось определить координаты x и y, указанные Вами. Ваши координаты для {$a->shape} должны быть представлены как - {$a->coordsstring}';
$string['infinite'] = 'Использовать неоднократно';
$string['marker'] = 'Маркер';
$string['marker_n'] = 'Маркер {no}';
$string['markers'] = 'Маркеры';
$string['nolabel'] = 'Нет текстовой метки';
$string['pleasedragatleastonemarker'] = 'Ваш ответ не полный -  на изображении нужно разместить не менее 1-го маркера.';
$string['pluginname'] = 'Перетаскивание маркеров';
$string['pluginnameadding'] = 'Добавить «Перетаскивание маркеров»';
$string['pluginnameediting'] = 'Редактировать «Перетаскивания маркеров»';
$string['pluginname_help'] = 'Выберите файл с фоновым изображением, введите текстовые метки для маркеров и определите зоны размещения на фоновом изображении, на которые нужно будет перетаскивать ответы.';
$string['pluginnamesummary'] = 'Маркеры перетаскиваются на фоновое изображение.';
$string['previewarea'] = 'Предпросмотр  зоны -';
$string['previewareaheader'] = 'Предварительный просмотр';
$string['previewareamessage'] = 'Выберите файл с фоновым изображением, введите текстовые метки для маркеров и определите зоны на фоновом изображении, куда они должны перетаскиваться.';
$string['refresh'] = 'Обновить предпросмотр';
$string['shape'] = 'Фигура';
$string['shape_circle'] = 'Окружность';
$string['shape_circle_coords'] = 'x,y;r (где x, y - координаты центра окружности и r - радиус)';
$string['shape_circle_lowercase'] = 'окружность';
$string['shape_polygon'] = 'Многоугольник';
$string['shape_polygon_coords'] = 'x1,y1;x2,y2;x3,y3;x4,y4....(где x1, y1 - координаты первой вершины, x2, y2 - координаты второй и т.д. Вам не нужно повторять координаты первой вершины, чтобы замкнуть многоугольник)';
$string['shape_polygon_lowercase'] = 'многоугольник';
$string['shape_rectangle'] = 'Прямоугольник';
$string['shape_rectangle_coords'] = 'x,y;w,h (где x,y - координаты верхнего левого угла прямоугольника; w - ширина и h - высота прямоугольника)';
$string['shape_rectangle_lowercase'] = 'прямоугольник';
$string['showmisplaced'] = 'Выделить зоны размещения, в которых нет верно расположенных  маркеров';
$string['shuffleimages'] = 'Перемешивать перетаскиваемые элементы при каждой попытке ответа на вопрос';
$string['stateincorrectlyplaced'] = 'Неверно размещенные маркеры';
$string['summariseplaceno'] = 'Зона размещения {$a}';
$string['ytop'] = 'Верх';
