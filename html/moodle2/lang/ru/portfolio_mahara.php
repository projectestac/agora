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
 * Strings for component 'portfolio_mahara', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_mahara
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enableleap2a'] = 'Включить поддержку Leap2A (требуется Mahara 1.3 или выше)';
$string['err_invalidhost'] = 'Неработоспособный хост MNet';
$string['err_invalidhost_help'] = 'Этот плагин сконфигурирован на неправильный (или уже удаленный) хост MNet. Этот плагин используется хостами Moodle Networking с опубликованными SSO IDP и подписанными SSO_SP.';
$string['err_networkingoff'] = 'MNet выключен';
$string['err_networkingoff_help'] = 'MNet отключен полностью. Включите его перед попыткой сконфигурировать этот плагин. Любые экземпляры этого плагина будут невидимы, пока это не будет исправлено - Вы должны вручную сделать их видимыми. До этого они не могут быть использованы.';
$string['err_nomnetauth'] = 'Плагин аутентификации MNet отключен';
$string['err_nomnetauth_help'] = 'Требуемый для этой службы плагин «Аутентификация MNet» отключен.';
$string['err_nomnethosts'] = 'Необходима поддержка MNet';
$string['err_nomnethosts_help'] = 'Этот плагин полагается на равноправных участников MNet с опубликованным SSO IDP , подписанным SSO SP, опубликованными службами портфолио<b>и</b>  к тому же подписанных плагином аутентификации MNet. Любые экземпляры этого плагина будут скрыты, пока эти условия не будут выполнены. Потом их нужно настроить вручную, чтобы сделать видимыми.';
$string['failedtojump'] = 'Не удалось установить соединение с удаленным сервером';
$string['failedtoping'] = 'Не удалось установить соединение с удаленным сервером: {$a}';
$string['mnethost'] = 'MNet хост';
$string['mnet_nofile'] = 'Не удается найти файл в объекте передачи - странная ошибка';
$string['mnet_nofilecontents'] = 'Найден файл в объекте передачи, но не удалось получить содержимое - странная ошибка: {$a}';
$string['mnet_noid'] = 'Не удалось найти соответствующую запись перехода для этого ключа';
$string['mnet_notoken'] = 'Не удалось найти ключ, соответствующий этому переходу';
$string['mnet_wronghost'] = 'Отдаленный хост не соответствует переходу для этого ключа';
$string['pf_description'] = 'Разрешение пользователям размещать контент Moodle на этот хост, <br /> подписаться <b>и</b> опубликовать эту службу позволит пользователям, авторизованным на Вашем сайте, размещать контент на {$a}. <br /><ul><li> <em>Зависимость:</em> Вы также должны <strong>опубликовать</strong> службу SSO (Service Provider) для  {$a}. </li><li> <em>Зависимость:</em> Вы должны также <strong>подписаться</strong> на службу SSO (Service Provider) на {$a}. </li><li> <em>Зависимость:</em> Вы также должны включить плагин аутентификации MNet. </li></ul><br />';
$string['pf_name'] = 'Службы портфолио';
$string['pluginname'] = 'Портфолио Mahara';
$string['senddisallowed'] = 'Сейчас Вы не можете передать файлы на Mahara';
$string['url'] = 'URL';
