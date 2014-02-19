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
 * Strings for component 'simplecertificate', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   simplecertificate
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allusers'] = 'Все пользователи';
$string['awarded'] = 'Награжденые';
$string['awardedto'] = 'Награждается';
$string['bulkaction'] = 'Выберите групповую операцию';
$string['bulkbuttonlabel'] = 'Отправить';
$string['bulkview'] = 'Групповые операции';
$string['cantdeleteissue'] = 'Ошибка при удалении выданных сертификатов';
$string['cantissue'] = 'Сертификат не может быть выдан так как пользователь не достиг целей курса';
$string['certificateimage'] = 'Файл с изображением сертификата';
$string['certificateimage_help'] = 'Это изображение будет использовано в сертификате';
$string['certificatename'] = 'Название сертификата';
$string['certificatename_help'] = 'Название сертификата';
$string['certificatetext'] = 'Текст сертификата';
$string['certificatetext_help'] = 'Это текст, который будет выводиться в сертификате. В тексте можно использовать следующие подстановки, которые будут заменены такими значениями, как название курса, имя студента, оценка и т.п.

{USERNAME} -> Полное имя пользователя
{COURSENAME} -> Полное название курса (или значение поля «Альтернативное название курса»)
{GRADE} -> Форматированная оценка
{DATE} -> Форматированная дата
{OUTCOME} -> Показатели
{HOURS} -> Значение поля «Объем курса в часах»
{TEACHERS} -> Список преподавателей
{IDNUMBER} -> Идентификационный номер пользователя
{FIRSTNAME} -> Имя пользователя
{LASTNAME} -> Фамилия пользователя
{EMAIL} -> Электронная почта пользователя
{ICQ} -> ICQ пользователя
{SKYPE} -> Skype пользователя
{YAHOO} -> Yahoo messenger пользователя
{AIM} -> AIM пользователя
{MSN} -> MSN пользователя
{PHONE1} -> Телефон №1 пользователя
{PHONE2} -> Телефон №2 пользователя
{INSTITUTION} -> Институт пользователя
{DEPARTMENT} -> Подразделение пользователя
{ADDRESS} -> Адрес пользователя
{CITY} -> Город пользователя
{COUNTRY} -> Страна пользователя
{URL} -> Домашняя страничка пользователя
{CERTIFICATECODE} -> Уникальный текстовый код сертификата
{PROFILE_xxxx} -> Дополнительные поля профиля пользователя

Пример использования дополнительных полей профиля пользователя для «PROFILE_». Если Вы создали дополнительное поле профиля с кратким название «birthday», для вставки его значения в текст сертификата используйте подстановку {PROFILE_BIRTHDAY}.
В тексте можно использовать основные тэги html, основные шрифты, таблицы, но избегайте позиционирования элементов.';
$string['certificatetextx'] = 'Положение текста сертификата по горизонтали';
$string['certificatetexty'] = 'Положение текста сертификата по вертикали';
$string['certificateverification'] = 'Проверка выданного сертификата';
$string['certlifetime'] = 'Сохранять выданный сертификат: (в месяцах)';
$string['certlifetime_help'] = 'Время, в течение которого необходимо хранить выданные сертификаты на сервере. Сертификаты выданные ранее указанного срока будут автоматически удаляться.';
$string['code'] = 'Код';
$string['codex'] = 'Положение QR-кода по горизонтали';
$string['codey'] = 'Положение QR-кода по вертикали';
$string['completedusers'] = 'Пользователи, которые достигли целей курса';
$string['completiondate'] = 'Курс завершен';
$string['coursegrade'] = 'Оценка за курс';
$string['coursehours'] = 'Объем курса в часах';
$string['coursehours_help'] = 'Объем курса в часах';
$string['coursename'] = 'Альтернативное название курса';
$string['coursename_help'] = 'Альтернативное название курса';
$string['coursetimereq'] = 'Требуется провести в курсе (минут)';
$string['coursetimereq_help'] = 'Укажите здесь минимальное количество минут, которые студент должен провести в курсе прежде чем он сможет получить сертификат.';
$string['datefmt'] = 'Формат даты';
$string['datefmt_help'] = 'Введите PHP-шаблон для формата даты (http://www.php.net/manual/en/function.strftime.php). Или оставьте поле пустым, тогда будет использован формат по умолчанию для языка пользователя.';
$string['defaultcertificatetextx'] = 'Положение текста по горизонтали (значение по умолчанию)';
$string['defaultcertificatetexty'] = 'Положение текста по вертикали (значение по умолчанию)';
$string['defaultcodex'] = 'Положение QR-кода по горизонтали (значение по умолчанию)';
$string['defaultcodey'] = 'Положение QR-кода по вертикали (значение по умолчанию)';
$string['defaultheight'] = 'Высота (значение по умолчанию)';
$string['defaultperpage'] = 'На странице';
$string['defaultperpage_help'] = 'Количество сертификатов для отображения на странице (не более 200)';
$string['defaultwidth'] = 'Ширина (значение по умолчанию)';
$string['deletissuedcertificates'] = 'Удалить выданные сертификаты';
$string['delivery'] = 'Доставка';
$string['delivery_help'] = 'Выберите способ, которым студенты должны получать сертификаты.

Открыть в новом окне: сертификат откроется в новом окне браузера.

Скачать: откроется окно загрузки файла

Отправить по электронной почте: сертификат будет отправлен студенту по электронной почте

После того как пользователь получит свой сертификат, если он нажмет на ссылку на сертификат на домашней странице курса, он увидит дату выдачи сертификата и сможет просмотреть полученный сертификат.';
$string['designoptions'] = 'Настройки дизайна';
$string['download'] = 'Скачать';
$string['emailcertificate'] = 'Отправить по электронной почте';
$string['emailfrom'] = 'Отправлять электронную почту от имени';
$string['emailfrom_help'] = 'Альтернативное имя отправителя для использования при отправке сертификата';
$string['emailothers'] = 'Адреса для уведомления';
$string['emailothers_help'] = 'Введите здесь через запятую адреса электронной почты тех, кого нужно уведомлять о получении студентом сертификата.';
$string['emailsent'] = 'Сообщения электронной почты были отправлены';
$string['emailstudentsubject'] = 'Сертификат об окончании курса «{$a->course}»';
$string['emailstudenttext'] = 'Здравствуйте, {$a->username}.

В этому письму прикреплен Ваш сертификат об окончании курса «{$a->course}».

Это автоматические сообщение, на него не нужно отвечать';
$string['emailteachermail'] = '{$a->student} получил сертификат: «{$a->certificate}» об окончании курса «{$a->course}».

Вы можете посмотреть его здесь:

{$a->url}';
$string['emailteachermailhtml'] = '{$a->student} получил сертификат: «<i>{$a->certificate}</i>» об окончании курса «{$a->course}.

Вы можете посмотреть его здесь: <a href="{$a->url}">Отчет о сертификатах</a>.';
$string['emailteachers'] = 'Уведомлять учителей по электронной почте';
$string['emailteachers_help'] = 'При включении этого параметра учителя будут получать по электронной почте уведомления о получении студентами сертификатов.';
$string['enablesecondpage'] = 'Включить обратную сторону сертификата';
$string['enablesecondpage_help'] = 'Включить возможность редактирования обратной стороны сертификата. При выключении этого параметра на обратной сторону сертификата будет вывводиться только QR-код (если включено его использование)';
$string['filenotfound'] = 'Файл не найден : {$a}';
$string['getcertificate'] = 'Получить сертификат';
$string['grade'] = 'Оценка';
$string['gradefmt'] = 'Формат оценки';
$string['gradefmt_help'] = 'Есть три доступных формата, в которых можно выводить оценку на сертификате:

Оценка в процентах: Оценка выводится в процентах.
Оценка в баллах: Выводится величина оценки в баллах.
Буквенная оценка: Выводится буква, соответствующая оценке в процентах.';
$string['gradeletter'] = 'Буквенная оценка';
$string['gradepercent'] = 'Оценка в процентах';
$string['gradepoints'] = 'Оценка в баллах';
$string['height'] = 'Высота сертификата';
$string['hours'] = 'часа(ов)';
$string['intro'] = 'Введение';
$string['invalidcode'] = 'Неверный код сертификата';
$string['issued'] = 'Выдан';
$string['issueddate'] = 'Дата выдачи';
$string['issueddownload'] = 'Загружен выданный сертификат [id: {$a}]';
$string['issuedview'] = 'Выданные сертификаты';
$string['issueoptions'] = 'Настройки выдачи сертификата';
$string['keywords'] = 'сертификат, курс, pdf, moodle';
$string['modulename'] = 'Простой сертификат';
$string['modulenameplural'] = 'Простые сертификаты';
$string['multipdf'] = 'Скачать сертификаты в zip-архиве';
$string['neverdeleteoption'] = 'Никогда не удалять';
$string['nocertificatesissued'] = 'Нет выданных сертификатов';
$string['nodelivering'] = 'Не отправлять студенту сертификат, пользователь получит сертификат иным способом.';
$string['onepdf'] = 'Скачать сертификаты в одном pdf-файле';
$string['openbrowser'] = 'Открыть в новом окне';
$string['opendownload'] = 'Нажмите на кнопку, чтобы сохранить сертификат на свой компьютер';
$string['openemail'] = 'Нажмите на кнопку для отправки Вам сертификата по электронной почте.';
$string['openwindow'] = 'Нажмите на кнопку, чтобы открыть сертификат в новом окне браузера';
$string['pluginadministration'] = 'Управление модулем «Простой сертификат»';
$string['pluginname'] = 'Простой сертификат';
$string['printdate'] = 'Дата печати';
$string['printdate_help'] = 'Это дата, которая будет выводиться, если выбрана печать даты. Если указана дата окончания курса, но студент не закончил курс, то будет выведена дата получения сертификата. Вы также можете выбрать для печати дату выставления оценки за определенный элемент курса. Если сертификат будет выдан до выставления оценки за этот элемент курса, то будет выведена дата получения сертификата.';
$string['printgrade'] = 'Выводить оценку';
$string['printgrade_help'] = 'Вы можете выбрать любой доступный элемент оценивания из журнала оценок, для того, чтобы вывести соответствующую оценку пользователя в сертификате. Элементы оценивания перечислены в том же порядке, что и в журнале оценок. Формат оценки можно выбрать ниже.';
$string['printoutcome'] = 'Выводить значение показателя';
$string['printoutcome_help'] = 'Вы можете выбрать любой из показателей курса, чтобы выводить в сертификате название показателя и оценку пользователя за этот показатель. Например: «Выпускная работа: Отлично»';
$string['printqrcode'] = 'Выводить QR-код сертификата';
$string['printqrcode_help'] = 'Выводить или нет QR-код сертификата';
$string['qrcodefirstpage'] = 'Выводить QR-код на первой странице';
$string['qrcodefirstpage_help'] = 'Выводить QR-код на первой странице сертификата';
$string['qrcodeposition'] = 'Расположение QR-кода';
$string['qrcodeposition_help'] = 'Это координаты X и Y (в милиметрах) QR-кода';
$string['receiveddate'] = 'Дата получения';
$string['report'] = 'Отчет';
$string['requiredtimenotmet'] = 'Вы должны провести в курсе как минимум {$a->requiredtime} минут для того, чтобы получить сертификат';
$string['secondimage'] = 'Файл изображения обратной стороны сертификата';
$string['secondimage_help'] = 'Это изображение будет использоваться на обратной стороне сертификата';
$string['secondpageoptions'] = 'Обратная сторона сертификата';
$string['secondpagetext'] = 'Текст на обратной стороне';
$string['secondpagex'] = 'Положение текста на обратной стороне по горизонтали';
$string['secondpagey'] = 'Положение текста на обратной стороне по вертикали';
$string['secondtextposition'] = 'Положение текста на обратной стороне';
$string['secondtextposition_help'] = 'Это координаты X и Y (в милиметрах) текста на обратной стороне сертификата';
$string['sendtoemail'] = 'Отправить пользователю по электронной почте';
$string['showusers'] = 'Показать';
$string['size'] = 'Размер сертификата';
$string['size_help'] = 'Это ширина и высота сертификата (в миллиметрах), по умолчанию используется формат A4 в альбомной ориентации';
$string['standardview'] = 'Выдать пробный сертификат';
$string['summaryofattempts'] = 'Ранее выданные сертификаты';
$string['textposition'] = 'Положение текста сертификата';
$string['textposition_help'] = 'Это координаты X и Y (в миллиметрах) текста сертификата';
$string['userdateformat'] = 'Пользовательский формат даты (согласно настройкам языка по умочанию)';
$string['variablesoptions'] = 'Другие настройки';
$string['verifycertificate'] = 'Проверить сертификат';
$string['viewcertificateviews'] = 'Просмотр выданных сертификатов ({$a})';
$string['width'] = 'Ширина сертификата';
