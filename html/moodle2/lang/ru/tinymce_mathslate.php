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
 * Strings for component 'tinymce_mathslate', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   tinymce_mathslate
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cancel'] = 'Отмена';
$string['cancel_desc'] = 'Выйти без сохранения';
$string['clear'] = 'Удалить выделение или все выражение';
$string['display'] = 'Показать формулу';
$string['display_desc'] = 'Добавить формулу на отдельной строке';
$string['help'] = 'Доступ к документации';
$string['inline'] = 'Линейная формула';
$string['inline_desc'] = 'Добавить формулу в предложении или параграфе';
$string['mathjaxurl'] = 'URL-адрес MathJax';
$string['mathjaxurl_desc'] = 'URL на файл MathJax.js, который Mathslate должен загрузить, если MathJax не доступен и настроен (возможно при использовании фильтра Moodle TeX). По умолчанию загружается из интернета через http. Если на сайте применяется https, то используйте "https://c328740.ssl.cf1.rackcdn.com/mathjax/latest/MathJax.js" или лучше установите локальную копию.';
$string['mathslate'] = 'MathSlate';
$string['mathslate:desc'] = 'Добавить уравнение';
$string['nomathjax'] = '<p>MathJax, вероятно, отсутствует на этом сайте. Для того, чтобы использовать этот плагин, MathJax должен быть настроен. MathJax является программной библиотекой с открытым исходным кодом и позволяет отображать формулы в любом браузере, который поддерживает javascript. Mathslate использует его для создания формул в редакторе. Поэтому необходимо проверить в системных настройках этого сайта возможность установки MathJax. Смотрите <a href="http://mathjax.org" target="_blank">сайт mathjax.org</a> для получения дополнительных инструкций.</p>';
$string['pluginname'] = 'TinyMCE Mathslate';
$string['redo'] = 'Повторить только что отмененное действие';
$string['requiretex'] = 'Требовать  фильтр TeX';
$string['requiretex_desc'] = 'При включенном параметре кнопка «Mathslate» видна только тогда, когда фильтр TeX включен в редакторе контекста. Отключите параметр, если хотите, чтобы кнопка отображалась на глобальном уровне (нормальном, если MathJax входит в заголовок сайта).';
$string['title'] = 'Редактор MathSlate';
$string['undo'] = 'Отменить предыдущее действие';
