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
 * Strings for component 'message_email', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowusermailcharset'] = 'Разрешить пользователю выбирать кодировку';
$string['configallowusermailcharset'] = 'Включение этого параметра разрешит каждому пользователю устанавливать собственную кодировку для писем электронной почты.';
$string['configmailnewline'] = 'Символы перевода строки, используемые в почтовых сообщениях. CRLF требуется в соответствии с RFC 822bis; некоторые почтовые серверы автоматически конвертируют LF в CRLF; другие почтовые сервера некорректно конвертируют CRLF в CRCRLF, а иные отвергают сообщения с простым LF (например, qmail). Попробуйте изменить этот параметр, если у Вас возникают проблемы с  доставкой почты или с сообщениями с двумя пустыми строками подряд.';
$string['confignoreplyaddress'] = 'Иногда сообщения электронной почты отсылаются без непосредственного участия пользователя (например, сообщения с форума). Указанный здесь адрес электронной почты будет использоваться как обратный адрес, в том случае, если получатели не должны иметь возможность ответить непосредственно пользователю (например, когда пользователь не хочет показывать свой адрес).';
$string['configsitemailcharset'] = 'Вся электронная почта с Вашего сайта будет отправляться в указанной здесь кодировке. При этом каждый пользователь сможет изменить ее, если будет включен следующий параметр.';
$string['configsmtphosts'] = 'Введите полное имя одного или нескольких SMTP-серверов, которые Moodle должен использовать для отправки электронной почты (например, «mail.a.com» или «mail.a.com;mail.b.com»).Чтобы указать нестандартный (любой кроме 25) порт, используйте синтаксис [сервер]:[порт] (например, «mail.a.com:587»). Для безопасного соединения порт 465 обычно используется с SSL, порт 587 - с TLS. При необходимости выберите ниже безопасный протокол. Если оставить поле пустым, то Moodle будет использовать метод отправки почты, установленный в настройках PHP.';
$string['configsmtpmaxbulk'] = 'Максимальное количество сообщений, посылаемых за одну SMTP-сессию. Группировка сообщений может ускорить отправку писем. При значениях меньше 2 каждое электронное сообщение будет отправляться отдельной SMTP-сессией.';
$string['configsmtpsecure'] = 'Если SMTP-сервер требует защищенного соединения, то задайте соответствующий тип протокола.';
$string['configsmtpuser'] = 'Если Вы указали выше SMTP-сервер, и ему необходима аутентификация, то введите здесь имя пользователя и пароль.';
$string['email'] = 'Отправлять уведомления по электронной почте на';
$string['ifemailleftempty'] = 'Оставьте пустым для отправки уведомлений по адресу {$a}';
$string['mailnewline'] = 'Символы перевода строки в электронных письмах';
$string['noreplyaddress'] = 'Адрес для писем без ответа';
$string['pluginname'] = 'Электронная почта';
$string['sitemailcharset'] = 'Кодировка';
$string['smtphosts'] = 'SMTP-серверы';
$string['smtpmaxbulk'] = 'Ограничение сессии SMTP';
$string['smtppass'] = 'Пароль SMTP';
$string['smtpsecure'] = 'Безопасность SMTP';
$string['smtpuser'] = 'Логин SMTP';
