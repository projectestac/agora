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
 * Strings for component 'enrol_mnet', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['error_multiplehost'] = 'От данного хоста уже существуют экземпляры плагина зачисления MNet . Разрешается только один экземпляр плагина от каждого хоста и/или один экземпляр для «Всех хостов».';
$string['instancename'] = 'Название способа записи на курс';
$string['instancename_help'] = 'Вы можете произвольно переименовать этот вариант метода регистрации MNet. Если Вы оставите это поле пустым, то, по умолчанию, название варианта будет содержать имя отдаленного хоста и назначенные роли для его пользователей.';
$string['mnet_enrol_description'] = 'Публикация  этой службы позволит администраторам {$a} записывать своих студентов на курсы, созданные на Вашем сайте. <br/><ul><li> <em>Зависимость:</em> Вы должны <strong>подписаться</strong> на службу SSO (Поставщика удостоверений) на {$a}. </li><li> <em>Зависимость:</em> Вы также должны <strong>опубликовать</strong> службу SSO (Поставщика служб) для {$a}. </li></ul><br/> Подпишитесь на эту службу, чтобы иметь возможность записывать своих студентов на курсы в {$a}. <br/><ul><li> <em>Зависимость:</em> Вы также должны <strong>опубликовать</strong> службу SSO (Поставщика удостоверений) для {$a}. </li><li> <em>Зависимость:</em> Вы также должны <strong>подписаться</strong> на службу SSO (Поставщика служб) на {$a}. </li></ul><br/>';
$string['mnet_enrol_name'] = 'Отдаленная служба зачисления';
$string['pluginname'] = 'Аутентификация MNet';
$string['pluginname_desc'] = 'Позволяет отдаленным хостам MNet зачислять своих пользователей на наши курсы.';
$string['remotesubscriber'] = 'Отдаленный хост';
$string['remotesubscriber_help'] = 'Выберите «Все хосты», чтобы открыть этот курс для всех сетевых Moodle (MNet), предлагая услугу отдаленной записи. Или выберите один хост, чтобы сделать этот курс доступным только для его пользователей.';
$string['remotesubscribersall'] = 'Все хосты';
$string['roleforremoteusers'] = 'Роль для их пользователей';
$string['roleforremoteusers_help'] = 'Эту роль получит отдаленный пользователь из выбранного хоста.';
