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
 * Strings for component 'assignfeedback_editpdf', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_editpdf
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['black'] = 'Черный';
$string['blue'] = 'Синий';
$string['cannotopenpdf'] = 'Не удается открыть файл PDF. Файл может быть поврежден или имеет неподдерживаемый формат.';
$string['command'] = 'Команда:';
$string['comment'] = 'Комментарии';
$string['commentcolour'] = 'Цвет комментария';
$string['couldnotsavepage'] = 'Невозможно сохранить страницу {$a}';
$string['deleteannotation'] = 'Удалить аннотацию';
$string['deletecomment'] = 'Удалить комментарий';
$string['downloadablefilename'] = 'feedback.pdf';
$string['editpdf'] = 'Аннотация PDF';
$string['editpdf_help'] = 'Аннотация студенческих работ непосредственно в браузере и создание отредактированного загружаемого PDF.';
$string['enabled'] = 'Аннотация PDF';
$string['enabled_help'] = 'При включенном параметре учитель может создать PDF-файлы аннотации при оценивании работ. Это позволяет учителю добавить комментарий, рисунок и штампы прямо поверх студенческих работ. Аннотация делается в браузере и не требует дополнительного программного обеспечения.';
$string['errorgenerateimage'] = 'Ошибка создания изображения с использованием Ghostscript, информация отладчика: {$a}';
$string['filter'] = 'Фильтр комментариев ...';
$string['generatefeedback'] = 'Создать отзыв PDF';
$string['generatingpdf'] = 'Создание PDF ...';
$string['gotopage'] = 'Перейти на страницу';
$string['green'] = 'Зеленый';
$string['gspath'] = 'Путь к Ghostscript';
$string['gspath_help'] = 'В большинстве установок Linux это можно оставить как «/usr/bin/gs». В Windows это будет что-то вроде «c:gsbingswin32c.exe» (убедитесь, что путь не содержит пробелов - при необходимости скопируйте файлы «gswin32c.exe» и «gsdll32.dll» в новую папку без пробелов в пути)';
$string['highlight'] = 'Выделение';
$string['jsrequired'] = 'Для аннотации PDF требуется JavaScript. Включите JavaScript в своем браузере, чтобы использовать эту функцию.';
$string['launcheditor'] = 'Запуск редактора PDF...';
$string['line'] = 'Линия';
$string['loadingeditor'] = 'Загрузка редактора PDF';
$string['navigatenext'] = 'Следующая страница';
$string['navigateprevious'] = 'Предыдущая страница';
$string['output'] = 'Выход:';
$string['oval'] = 'Овал';
$string['pagenumber'] = 'Страница  {$a}';
$string['pagexofy'] = 'Страница {$a->page} из {$a->total}';
$string['pen'] = 'Ручка';
$string['pluginname'] = 'Аннотация PDF';
$string['rectangle'] = 'Прямоугольник';
$string['red'] = 'Красный';
$string['result'] = 'Результат:';
$string['searchcomments'] = 'Поиск комментариев';
$string['select'] = 'Выбрать';
$string['stamp'] = 'Штамп';
$string['stamps'] = 'Штампы';
$string['stampsdesc'] = 'Штампы должны быть файлами изображений (рекомендованный размер: 40x40). Эти изображения могут быть использованы с инструментом Штамп для аннотации PDF.';
$string['test_doesnotexist'] = 'Путь к ghostscript указывает на несуществующий файл';
$string['test_empty'] = 'Путь к ghostscript пуст - введите корректный путь';
$string['testgs'] = 'Тест пути к ghostscript';
$string['test_isdir'] = 'Путь к ghostscript ведет к папке, укажите программу ghostscript в заданном пути';
$string['test_notestfile'] = 'Тест PDF отсутствует';
$string['test_notexecutable'] = 'Путь к ghostscript ведет к не исполняемому файлу';
$string['tool'] = 'Инструмент';
$string['toolbarbutton'] = '{$a->tool} {$a->shortcut}';
$string['unsavedchanges'] = 'Несохраненные изменения';
$string['white'] = 'Белый';
$string['yellow'] = 'Желтый';
