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
 * Strings for component 'tool_behat', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_behat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aim'] = 'Это инструмент управления помогает разработчикам и создателем тестов создавать файлы .feature, описывающие функционал Moodle, и  автоматически их запускать.';
$string['allavailablesteps'] = 'Все имеющиеся определения шагов';
$string['giveninfo'] = 'Дано. Процессы настройки конфигурации';
$string['infoheading'] = 'Информация';
$string['installinfo'] = 'Прочтите информацию по установке и выполнению тестов {$a}';
$string['moreinfoin'] = 'Более подробная информация в {$a}';
$string['newstepsinfo'] = 'Прочтите информацию о том, как добавить новые определения шагов - {$a}';
$string['newtestsinfo'] = 'Прочтите информацию о том, как написать новые тесты - {$a}';
$string['nostepsdefinitions'] = 'Нет определений шагов, соответствующих этим условиям фильтрации';
$string['pluginname'] = 'Приемочные испытания';
$string['runclitool'] = 'Чтобы получить список определений шагов, Вам необходимо запустить в интерфейсе командной строки инструмент Behat, который создаст директорию $CFG->behat_dataroot. Перейдите в корневой каталог Moodle и выполните команду «{$a}».';
$string['stepsdefinitionscomponent'] = 'Область';
$string['stepsdefinitionscontains'] = 'Содержит';
$string['stepsdefinitionsfilters'] = 'Определения шагов';
$string['stepsdefinitionstype'] = 'Тип';
$string['theninfo'] = 'Затем. Проверки на соответствие ожидаемым результатам';
$string['unknownexceptioninfo'] = 'Возникла ошибка в работе Selenium или браузера. Пожалуйста, убедитесь, что используется последняя версия Selenium.
Ошибка:';
$string['viewsteps'] = 'Фильтр';
$string['wheninfo'] = 'Когда. Действия, вызывающие события';
$string['wrongbehatsetup'] = 'Что-то не так с установкой Behat. Необходимо: <ul><li> Запустить «php admin/tool/behat/cli/init.php» из корневого каталога Moodle. </li><li> Разрешить исполнение файла vendor/bin/behat.</li></ul>';
