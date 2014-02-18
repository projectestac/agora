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
 * Strings for component 'debug', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   debug
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['authpluginnotfound'] = 'Не найден плагин аутентификации «{$a}».';
$string['blocknotexist'] = 'Блок «{$a}» не существует';
$string['cannotbenull'] = '{$a} не может быть пустым!';
$string['cannotdowngrade'] = 'Невозможно откатить плагин «{$a->plugin}» с версии {$a->oldversion} до {$a->newversion}.';
$string['cannotfindadmin'] = 'Не удалось найти пользователя с правами администратора!';
$string['cannotinitpage'] = 'Невозможно полностью инициализировать страницу:
некорректно {$a->name} id {$a->id}';
$string['cannotsetuptable'] = 'НЕ удалось создать таблиц: {$a}!';
$string['codingerror'] = 'Обнаружена ошибка кодирования, она должна быть исправлена программистом: {$a}';
$string['configmoodle'] = 'Moodle еще не настроен. В первую очередь Вам необходимо отредактировать config.php.';
$string['erroroccur'] = 'Во время этого процесса произошла ошибка';
$string['invalidarraysize'] = 'Неправильный размер массивов в параметрах {$a}';
$string['invalideventdata'] = 'Представлены некорректные данные: {$a}';
$string['invalidparameter'] = 'Обнаружено неверное значение параметра.';
$string['invalidresponse'] = 'Обнаружено неверное значение ответа.';
$string['missingconfigversion'] = 'Таблица «config» не содержит версии, продолжение невозможно.';
$string['modulenotexist'] = 'Модуль {$a} не существует';
$string['morethanonerecordinfetch'] = 'Найдено более одной записи в fetch()!';
$string['mustbeoveride'] = 'Абстрактный метод «{$a}» должен быть переопределен.';
$string['noadminrole'] = 'Невозможно найти роль администратора';
$string['noblocks'] = 'Ни один блок не установлен!';
$string['nocate'] = 'Нет категории!';
$string['nomodules'] = 'Не найдено ни одного модуля!!';
$string['nopageclass'] = 'Импортировано {$a}, но не найдены классы страницы';
$string['noreports'] = 'Не доступен ни один отчет';
$string['notables'] = 'Нет таблиц!';
$string['phpvaroff'] = 'Переменная PHP-сервера «{$a->name}» должна быть установлена в Off - {$a->link}';
$string['phpvaron'] = 'Переменная PHP-сервера «{$a->name}» не установлена в On - {$a->link}';
$string['sessionmissing'] = 'Отсутствует объект сессии «{$a}»';
$string['sqlrelyonobsoletetable'] = 'В этом SQL используются устаревшие таблицы: {$a}! Ваш программный код должен быть исправлен разработчиком.';
$string['withoutversion'] = 'Главный файл version.php отсутствует, не доступен для чтения или испорчен.';
$string['xmlizeunavailable'] = 'Недоступны функции xmlize';
