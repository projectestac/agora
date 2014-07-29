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
 * Strings for component 'scheduler', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   scheduler
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Действие';
$string['addappointment'] = 'Добавить другого студента';
$string['addondays'] = 'Добавить встречи на';
$string['addscheduled'] = 'Добавить студента в расписание';
$string['addscheduled_help'] = '<h3>Запись на встречу при создании интервала времени</h3>
<p>Используя эту ссылку, Вы можете записать пользователя на встречу в данном интервале времени. Это простой и быстрый способ настройки встречи для группы. </p>';
$string['addsession'] = 'Добавить несколько интервалов';
$string['addsingleslot'] = 'Добавить один интервал';
$string['addslot'] = 'Вы можете в любой момент добавить дополнительные интервалы времени для встреч.';
$string['addstudenttogroup'] = 'Добавить этого студента к группе в расписании';
$string['allappointments'] = 'Все встречи';
$string['allowgroup'] = 'Интервал для одного студента - щёлкните для изменения';
$string['allslotsincloseddays'] = 'Все интервалы были в закрытых днях';
$string['allteachersgrading'] = 'Учителя могут выставлять оценки во всех встречах';
$string['allteachersgrading_desc'] = 'Если включено, учителя могут оценивать встречи, в которых они не участвовали.';
$string['alreadyappointed'] = 'Запись на встречу невозможна. Интервал времени уже полностью заполнен.';
$string['appointagroup'] = 'Встреча для группы студентов';
$string['appointagroup_help'] = 'Выберите, хотите ли Вы записать на встречу только себя или же хотите записать всю группу целиком.';
$string['appointfor'] = 'Встреча для';
$string['appointformygroup'] = 'Записать на встречу всю мою групу';
$string['appointingstudent'] = 'Встреча для интервала времени';
$string['appointingstudentinnew'] = 'Встреча для нового интервала времени';
$string['appointmentmode'] = 'Настройка режима записи на встречи';
$string['appointmentmode_help'] = '<p>Вы можете выбрать следующие варианты реализации записи на приём: </p>
<p><ul>
<li><b>Режим «Студенты могут записаться только на одну встречу»:</b> У студента может быть только одна запись на встречу в этом модуле. Даже после встречи с учителем студент не сможет записаться на следующую встречу. Единственный способ дать студенту возможность снова записаться на встречу - удалить старую запись о прошедшей встрече.</li>
<li><b> Режим «Студенты могут записаться только на одну встречу за один раз»:</b> Студент может записаться лишь на одну будущую встречу. После того как время этой встречи пройдет, студент сможет записаться снова. Этот режим подходит для назначения встреч по долгосрочным проектам, особенно когда необходимы несколько встреч на разных этапах проекта.
</li>
</ul>
</p>';
$string['appointmentno'] = 'Встреча {$a}';
$string['appointmentnotes'] = 'Примечание к встрече';
$string['appointments'] = 'Встречи';
$string['appointsolo'] = 'только я';
$string['appointsomeone'] = 'Добавить новую встречу';
$string['attendable'] = 'Могут записаться';
$string['attendablelbl'] = 'Всего кандидатов для записи';
$string['attended'] = 'Записаны';
$string['attendedlbl'] = 'Количество записанных студентов';
$string['attendedslots'] = 'Интервалы времени с записями';
$string['availableslots'] = 'Доступные интервалы времени';
$string['availableslotsall'] = 'Все интервалы времени';
$string['availableslotsnotowned'] = 'Чужие';
$string['availableslotsowned'] = 'Мои';
$string['bookwithteacher'] = 'Зарегистрировал';
$string['bookwithteacher_help'] = 'Выберите учителя для встречи.';
$string['break'] = 'Перерыв между интервалами времени';
$string['breaknotnegative'] = 'Величина перерыва не может быть отрицательным числом';
$string['cancelledbystudent'] = '{$a} : Встреча отменена или перенесена студентом';
$string['cancelledbyteacher'] = '{$a} : Встреча отменена учителем';
$string['choice'] = 'Выбор';
$string['chooseexisting'] = 'Выберите существующий';
$string['choosingslotstart'] = 'Выберите время начала';
$string['choosingslotstart_help'] = 'Измените (или выберите) время начала встречи. Если данная встреча будет накладываться на другие интервалы, Вам будет задан вопрос
о замене данным интервалом всех интервалов, с которыми выявлены конфликты. Обратите внимание, что настройки нового интервала заменят все предыдущие
настройки.';
$string['comments'] = 'Примечания';
$string['complete'] = 'Занято';
$string['composeemail'] = 'Написать письмо:';
$string['confirmdelete'] = 'Удаление нельзя будет отменить. Вы точно хотите продолжить?';
$string['conflictingslots'] = 'Конфликтующие интервалы времени';
$string['course'] = 'Курс';
$string['csvencoding'] = 'Кодировка текстового файла';
$string['csvfieldseparator'] = 'Разделитель полей для csv';
$string['csvparms'] = 'Параметры форматирования csv';
$string['csvrecordseparator'] = 'Разделитель записей для csv';
$string['cumulatedduration'] = 'Суммарная продолжительность встреч';
$string['date'] = 'Дата';
$string['datelist'] = 'Обзор';
$string['defaultslotduration'] = 'Продолжительность интервала по умолчанию';
$string['defaultslotduration_help'] = 'Продолжительность по умолчанию интервала времени (в минутах) для встреч, которые Вы настраиваете';
$string['deleteallslots'] = 'Удалить все интервалы';
$string['deleteallunusedslots'] = 'Удалить все неиспользованные интервалы';
$string['deletemyslots'] = 'Удалить все мои интервалы';
$string['deleteselection'] = 'Удалить отмеченные интервалы';
$string['deletetheseslots'] = 'Удалить эти интервалы';
$string['deleteunusedslots'] = 'Удалить мои неиспользованные интервалы';
$string['department'] = 'Откуда?';
$string['disengage'] = 'Удалить мои встречи';
$string['displayfrom'] = 'Показать встречи студентам начиная с';
$string['distributetoslot'] = 'Распространить на всю группу';
$string['divide'] = 'Разбить на интервалы?';
$string['dontforgetsaveadvice'] = 'Вы изменили список людей, записанных на встречу. Не забудьте сохранить эту форму для подтверждения внесения изменений.';
$string['downloadexcel'] = 'Экспортировать в Excel';
$string['downloads'] = 'Экспорт';
$string['duration'] = 'Продолжительность';
$string['durationrange'] = 'Величина интервала должна быть в диапазоне от {$a->min} до {$a->max} минут.';
$string['email_applied_html'] = '<p> Встреча была назначена на {$a->date} в {$a->time}<br/>
студентом <a href="{$a->attendee_url}">{$a->attendee}</a> по курсу:

<p>{$a->course_short}: <a href="{$a->course_url}">{$a->course}</a></p>

<p>с использованием модуля расписания под названием «<i>{$a->module}</i>» на сайте <a href="{$a->site_url}">{$a->site}</a>.</p>';
$string['email_applied_plain'] = 'Встреча была назначена на {$a->date} в {$a->time}
студентом {$a->attendee} по курсу:

{$a->course_short}: {$a->course}

с использованием модуля расписания под названием «{$a->module}» на сайте {$a->site}.';
$string['email_applied_subject'] = '{$a->course_short}: Новая встреча';
$string['email_cancelled_html'] = '<p>Ваша встреча <b>{$a->date}</b> в <b>{$a->time}</b><br/>
со студентом <b><a href="{$a->attendee_url}">{$a->attendee}</a></b> по курсу:</p>

<p><b>{$a->course_short} : <a href="{$a->course_url}">{$a->course}</a></b></p>

<p>в модуле расписания под названием «<i>{$a->module}</i>» на сайте <b><a href="{$a->site_url}">{$a->site}</a></b></p>

<p><b><span style="color: red">была отменена или перенесена</span></b>.</p>';
$string['email_cancelled_plain'] = 'Ваша встреча {$a->date} в {$a->time}
со студентом {$a->attendee} по курсу:

{$a->course_short} : {$a->course}

в модуле расписания под названием «{$a->module}» на сайте {$a->site}

была отменена или перенесена.';
$string['email_cancelled_subject'] = '{$a->course_short}: Встреча отменена или перенесена студентом';
$string['emailreminder'] = 'Отправить напоминание по электронной почте';
$string['email_reminder_html'] = '<p>У Вас назначена встреча <b>{$a->date}</b>
с <b>{$a->time}</b> до <b>{$a->endtime}</b><br/>
с <b><a href="{$a->attendant_url}">{$a->attendant}</a></b>.</p>

<p>Место встречи: <b>{$a->location}</b></p>';
$string['emailreminderondate'] = 'Дата отправки напоминания по электронной почте';
$string['email_reminder_plain'] = 'У Вас назначена встреча
{$a->date} с {$a->time} до {$a->endtime}
с {$a->attendant}.

Место встречи: {$a->location}';
$string['email_reminder_subject'] = '{$a->course_short}: Напоминание о встрече';
$string['email_teachercancelled_html'] = '<p>Ваша встреча <b>{$a->date}</b> в <b>{$a->time} </b><br/>
с <b><a href="{$a->attendant_url}">{$a->attendant}</a></b> ({$a->staffrole}) по курсу:</p>

<p><b>{$a->course_short}: <a href="{$a->course_url}">{$a->course}</a></b></p>

<p>в модуле расписания под названием «<i>{$a->module}</i>» на сайте <b><a href="{$a->site_url}">{$a->site}</a></b></p>

<p><b><span style="color : red">была отменена</span></b>. Пожалуйста, запишитесь на другое время.</p>';
$string['email_teachercancelled_plain'] = 'Ваша встреча {$a->date} в {$a->time}
с {$a->attendant} ({$a->staffrole}) по курсу:

{$a->course_short}: {$a->course}

в модуле расписания под названием «{$a->module}» на сайте {$a->site}

была отменена. Пожалуйста, запишитесь на другое время.';
$string['email_teachercancelled_subject'] = '{$a->course_short}: Встреча отменена учителем';
$string['end'] = 'Окончание';
$string['enddate'] = 'Повторять интервал времени до';
$string['endtime'] = 'Время окончания';
$string['exclusive'] = 'Встреча для одного';
$string['exclusivity'] = 'Вид интервала времени';
$string['exclusivity_help'] = '<p>Вы можете установить максимальное число студентов, которые могут записаться на заданный интервал. </p>
<p>Установка значения в 1 (по умолчанию) переключает интервал в режим встречи для одного студента</p>
<p>Если для интервала разрешена запись неограниченного количества студентов (значение равно 0), то записаться сможет любое количество студентов, даже если другие интервалы в этом временном диапазоне позволяют записаться только одному или нескольким студентам на встречу.
</p>';
$string['exclusivitylockedto'] = 'Вы не можете изменить режим интервала при записи на встречу. Будет применено действующее ограничение для выбранного интервала времени. Если это новый интервал, то будет использовано ограничение по умолчанию, равное 1.';
$string['exclusivityoverload'] = 'На данный интервал времени уже записалось {$a} студентов. Это значение больше допустимого данным параметром.';
$string['explaingeneralconfig'] = 'Эти параметры могут быть установлены только на уровне сайта и будет применены ко всем расписаниям на этом сайте Moodle.';
$string['exportinstructions'] = 'Перед началом использования сгенерированного файла экспорта следует сохранить его на жестком диске вашего компьютера.';
$string['finalgrade'] = 'Итоговая оценка';
$string['firstslotavailable'] = 'Первый интервал времени будет открыт в:';
$string['for'] = 'для';
$string['forbidgroup'] = 'Интервал для группы студентов - щёлкните для изменения';
$string['forcewhenoverlap'] = 'Принудительно ставить при наложении';
$string['forcewhenoverlap_help'] = '<p>Этот параметр позволяет принудительно добавить интервалы для встречи при обнаружении конфликтов с другими интервалами.
Если данный параметр включен, только «чистые» интервалы будут добавлены, конфликты будут проигнорированы.</p>

<p>Если параметр отключен, процедура добавления интервалов будет прервана при выявлении конфликтов, и Вам будет предложено
удалить ранее заданные интервалы прежде, чем будут добавлены новые.</p>';
$string['forcourses'] = 'Выберите студентов из курсов';
$string['friday'] = 'Пятница';
$string['generalconfig'] = 'Общие настройки';
$string['grade'] = 'Оценка';
$string['gradingstrategy'] = 'Методика оценивания';
$string['gradingstrategy_help'] = 'Выберите методику определения оценки в расписании, когда у студентов назначено несколько встреч.
    Журнал оценок может показать <ul><li>либо среднюю оценку,</li><li>либо высшую оценку,</li></ul> которую получил студент.';
$string['group'] = 'группа';
$string['groupbreakdown'] = 'По размеру группы';
$string['groupscheduling'] = 'Включить запись на встречи группами';
$string['groupscheduling_desc'] = 'Разрешить записывать всю группу за один раз.
(В отличие от глобального параметра, групповой режим для данного элемента должен быть установлен в «Видимые группы» или «Изолированные группы», чтобы можно было воспользоваться данной возможностью.)';
$string['groupsession'] = 'Групповая встреча';
$string['groupsize'] = 'Размер группы';
$string['guestscantdoanything'] = 'Гости не могут здесь ничего изменять.';
$string['howtoaddstudents'] = 'Используйте  назначение ролей для модуля, чтобы добавить студентов в расписание на глобальном уровне.<br/>Вы также можете использовать настройку ролей в модуле для того, чтобы назначить тех, кто будет регистрировать ваших студентов на встречи.';
$string['ignoreconflicts'] = 'Игнорировать конфликты в расписании';
$string['ignoreconflicts_help'] = 'Если данный параметр включен, то встреча будет перемещена на заданную дату и время, даже если в это время уже заданы какие-то встречи. Это может привести к накладкам во встречах у некоторых учителей или студентов, поэтому данной возможностью следует пользоваться осторожно.';
$string['incourse'] = 'в курсе';
$string['introduction'] = 'Вступление';
$string['invitation'] = 'Приглашение';
$string['invitationtext'] = 'Пожалуйста, выберите временной интервал для встречи';
$string['isnonexclusive'] = 'Групповой';
$string['lengthbreakdown'] = 'По длительности интервала';
$string['limited'] = 'Ограничено ({$a} осталось)';
$string['location'] = 'Место встречи';
$string['location_help'] = 'Укажите информацию о месте, где будет проходить встреча.';
$string['markasseennow'] = 'Отметить как присутствовавшего';
$string['markseen'] = 'Пожалуйста, после встречи со студентом сделайте отметку «Присутствовал», установив соответствующий переключатель в таблице выше.';
$string['maxgrade'] = 'Взять высшую оценку';
$string['maxstudentlistsize'] = 'Максимальная длина списка студентов';
$string['maxstudentlistsize_desc'] = 'Максимальная длина списка студентов, которым необходимо назначить встречу,отображаемая в интерфейсе управления расписанием для учителя. Если студентов будет больше, то список не будет показан.';
$string['maxstudentsperslot'] = 'Максимальное количество студентов в данном интервале времени';
$string['maxstudentsperslot_desc'] = 'Интервалы для встреч с группой могут содержать не более этого количества студентов. Обратите внимание: Вы всегда можете установить значение «Не ограничено» для интервала времени.';
$string['meangrade'] = 'Взять среднюю оценку';
$string['meetingwith'] = 'Встреча с вашим';
$string['meetingwithplural'] = 'Встреча с вашими';
$string['mins'] = 'минут';
$string['minutes'] = 'минут';
$string['minutesperslot'] = 'минут на интервал';
$string['missingstudents'] = 'Количество студентов, еще не записавшихся на встречу: {$a}.';
$string['missingstudentsmany'] = 'Количество студентов, еще не записавшихся на встречу: {$a}. Список не будет отображен из-за размера.';
$string['mode'] = 'Режим';
$string['modulename'] = 'Расписание';
$string['modulename_help'] = 'Модуль «Расписание» поможет Вам планировать встречи с Вашими студентами.

Учителя определяют временные интервалы для встреч, затем студенты выбирают один из них в Moodle.
Учителя могут отмечать присутствие студентов, результаты встречи (и, при необходимости, выставлять оценки) в модуле «Расписание».

Поддерживается создание расписания для встреч с группой студентов: в каждый интервал времени может записаться несколько студентов. Также есть возможность запланировать в расписании встречу для всей группы студентов одновременно.';
$string['modulename_link'] = 'mod/scheduler/view';
$string['modulenameplural'] = 'Расписания';
$string['monday'] = 'Понедельник';
$string['move'] = 'Изменить';
$string['moveslot'] = 'Переместить интервал';
$string['multiplestudents'] = 'Разрешить несколько студентов в одном интервале времени?';
$string['myappointments'] = 'Мои встречи';
$string['name'] = 'Название расписания';
$string['needteachers'] = 'Интервалы времени не могут быть добавлены, так как на курсе отсутствуют учителя';
$string['negativerange'] = 'Диапазон отрицательный. Этого не может быть.';
$string['never'] = 'Никогда';
$string['newappointment'] = '{$a} : Новая встреча';
$string['noappointments'] = 'Нет встреч';
$string['noexistingstudents'] = 'Нет студентов';
$string['nogroups'] = 'Нет групп, доступных для расписания встреч.';
$string['noresults'] = 'Нет результатов.';
$string['noschedulers'] = 'Нет расписаний';
$string['noslots'] = 'Нет свободных интервалов для встреч.';
$string['noslotsavailable'] = 'Нет обязательных встреч или все объявленные встречи уже распределены.';
$string['noslotsopennow'] = 'Сейчас нет открытых интервалов времени.';
$string['nostudents'] = 'Нет записанных на встречу студентов';
$string['nostudenttobook'] = 'Нет студентов для записи';
$string['note'] = 'Оценка';
$string['noteacherforslot'] = 'Нет учителя для интервалов времени';
$string['noteachershere'] = 'Учитель отсутствует';
$string['notes'] = 'Примечания';
$string['notifications'] = 'Уведомления';
$string['notifications_help'] = 'Если данный параметр включен, учителя и студенты будут получать уведомления при записи на встречу или при ее отмене.';
$string['notselected'] = 'Вы еще не сделали выбор';
$string['now'] = 'Сейчас';
$string['occurrences'] = 'Наблюдения';
$string['on'] = 'на';
$string['oneappointmentonly'] = 'Студенты могут записаться только на одну встречу';
$string['oneatatime'] = 'Студенты могут записаться только на одну встречу за один раз';
$string['onedaybefore'] = '1 день до интервала';
$string['oneslotadded'] = 'Один интервал добавлен';
$string['oneweekbefore'] = '1 неделя до интервала';
$string['onthemorningofappointment'] = 'Утром в день встречи';
$string['overall'] = 'Общая';
$string['overlappings'] = 'Некоторые другие интервалы перекрываются';
$string['pluginadministration'] = 'Управление расписанием';
$string['pluginname'] = 'Расписание';
$string['registeredlbl'] = 'Записанные студенты';
$string['reminder'] = 'Напоминание';
$string['remindertext'] = 'Это напоминание о том, что Вы еще не записались на встречу. Пожалуйста, сделайте это как можно скорее, выбрав интервал времени в';
$string['remindtitle'] = '{$a}: Напоминание о встрече';
$string['remindwhere'] = 'Место проведения встречи:';
$string['remindwithwhom'] = 'Запланирована встреча с';
$string['resetappointments'] = 'Удалить встречи и оценки';
$string['resetslots'] = 'Удалить интервалы времени';
$string['return'] = 'Вернуться к курсу';
$string['reuse'] = 'Повторно использовать этот интервал';
$string['reuseguardtime'] = 'Время перед повторным использованием интервала';
$string['reuseguardtime_help'] = '<p>Этот параметр задает продолжительность защитной задержки для интервалов, которые отмечены как «Повторно не использовать».</p>
<p>Если интервал отмечен как повторно не используемый, он будет автоматически удалён, когда студент изменит запись на встречу, полностью осовободив интервал, или когда учитель отменит все запланированные встречи в этом интервале. Удаление также произойдет, когда интервал начинается слишком близко к текущему моменту времени.</p>
<p>Это параметр определяет задержку, начиная с текущего момента времени, в рамках которой освободившийся интервал будет удалён и станет недоступным для дальнейшей записи на встречу.</p>';
$string['reuse_help'] = '<i>Используемый повторно</i> интервал будет оставаться в расписании, даже если студент или учитель отменили встречу. Освободившийся интервал будет снова доступен для записи.</p>

<p><i>Повторно не используемый</i> интервал будет автоматически удалён в выше описанных случаях, если он начинается слишком близко к текущему моменту (считается, что Вы можете не желать добавлять ограничение так близко к текущему моменту времени). Защитная задержка может быть установлена с помощью параметра «Время перед повторным использованием интервала».
</p>';
$string['revoke'] = 'Отменить встречу';
$string['saturday'] = 'Суббота';
$string['save'] = 'Сохранить';
$string['savechoice'] = 'Сохранить мой выбор';
$string['savecomment'] = 'Сохранить примечание';
$string['saveseen'] = 'Сохранить отметку о присутствии';
$string['schedule'] = 'Расписание';
$string['scheduleappointment'] = 'Запись на встречу для {$a}';
$string['schedulecancelled'] = '{$a} : Ваша встреча отменена или перенесена';
$string['schedulegroups'] = 'Расписание по группе';
$string['scheduleinnew'] = 'Записаться в новый интервал';
$string['scheduler'] = 'Расписание';
$string['scheduler:addinstance'] = 'Добавить новое расписание';
$string['scheduler:appoint'] = 'Встреча';
$string['scheduler:attend'] = 'Записанные студенты';
$string['scheduler:canscheduletootherteachers'] = 'Планировать встречи для других учителей';
$string['scheduler:canseeotherteachersbooking'] = 'Просматривать графики встреч других учителей';
$string['scheduler:disengage'] = 'Удалять все встречи (всех студентов)';
$string['scheduler:manage'] = 'Управлять своими временными интервалами и встречами';
$string['scheduler:manageallappointments'] = 'Управлять всей информацией в расписании';
$string['scheduler:seeotherstudentsbooking'] = 'Просматривать регистрации других студентов на конкретный интервал времени';
$string['scheduler:seeotherstudentsresults'] = 'Просматривать результаты других студентов в конкретном интервале времени';
$string['schedulestudents'] = 'Расписание по студенту';
$string['seen'] = 'Присутствовал';
$string['setreused'] = 'Использовать повторно';
$string['setunreused'] = 'Повторно не использовать';
$string['showemailplain'] = 'Показывать адреса электронной почты как обычный текст';
$string['showemailplain_desc'] = 'В интерфейсе управления расписанием для учителя, показывать адреса электронной почты студентов, для которых требуется запись на встречу,  ещё и обычным текстом, в дополнение к ссылкам mailto:.';
$string['slot_is_just_in_use'] = 'Извините, этот интервал времени только что был выбран другим студентом для встречи!<br>Попробуйте еще раз.';
$string['slots'] = 'Интервалы';
$string['slotsadded'] = 'Было добавлено интервалов: {$a}';
$string['slottype'] = 'Тип интервала';
$string['slotupdated'] = 'Один интервал был обновлён';
$string['slotwarning'] = '<b>Предупреждение: </b>Перемещение этого интервала на указанное время конфликтует с интервалами, перечисленными ниже. Включите параметр «Игнорировать конфликты в расписании», если вы все-таки хотите перенести этот интервал времени.';
$string['staffbreakdown'] = 'По роли «{$a}»';
$string['staffmember'] = 'Сотрудник';
$string['staffrolename'] = 'Название роли учителя';
$string['staffrolename_help'] = 'Метка для роли с правами регистрации студентов на встречу. Это не обязательно должен быть «учитель».';
$string['start'] = 'Начало';
$string['startpast'] = 'Вы не можете задать начало интервала для встречи ранее текущего момента';
$string['starttime'] = 'Время начала';
$string['statistics'] = 'Статистика';
$string['strdownloadcsvgrades'] = 'Экспорт оценок в CSV';
$string['strdownloadcsvslots'] = 'Экспорт интервалов в CSV';
$string['strdownloadexcelsingle'] = 'Экспорт в Excel одним листом';
$string['strdownloadexcelteachers'] = 'Экспорт в Excel по роли «{$a}»';
$string['strdownloadodssingle'] = 'Экспорт в OpenDoc одним листом';
$string['strdownloadodsteachers'] = 'Экспорт в OpenDoc по роли «{$a}»';
$string['student'] = 'Студент';
$string['studentbreakdown'] = 'По студентам';
$string['studentcomments'] = 'Примечания для студентов';
$string['studentdetails'] = 'Подробная информация по студенту';
$string['studentmultiselect'] = 'Каждый студент может быть выбран только один раз в этом интервале времени';
$string['studentnotes'] = 'Ваши примечания об этой встрече';
$string['students'] = 'Студенты';
$string['sunday'] = 'Воскресенье';
$string['teacher'] = 'Учитель';
$string['thursday'] = 'Четверг';
$string['tuesday'] = 'Вторник';
$string['unattended'] = 'Не присутствовали';
$string['unlimited'] = 'Без ограничений';
$string['unregisteredlbl'] = 'Незаписанные студенты';
$string['updategrades'] = 'Обновить оценки';
$string['updatesingleslot'] = '';
$string['updatingappointment'] = 'Обновить информацию о встрече';
$string['wednesday'] = 'Среда';
$string['welcomebackstudent'] = 'Выделенная жирным шрифтом строка в таблице ниже указывает на выбранное Вами время встречи. Вы можете изменить его на любой другой доступный интервал времени.';
$string['welcomenewstudent'] = 'Таблица ниже показывает все доступные интервалы времени для встречи. Выберите желаемый интервал, установив отметку рядом с ним, и не забудьте нажать кнопку «Сохранить мой выбор» после этого. Если позже Вы захотите внести изменения - зайдите на эту страницу еще раз.';
$string['welcomenewteacher'] = 'Пожалуйста, нажмите кнопку ниже, чтобы добавить интервалы для встреч, доступные для показа всем Вашим студентам.';
$string['what'] = 'Что?';
$string['whathappened'] = 'Что происходило?';
$string['whatresulted'] = 'Каков результат?';
$string['when'] = 'Когда?';
$string['where'] = 'Где?';
$string['who'] = 'С кем?';
$string['whosthere'] = 'Кто здесь?';
$string['xdaysbefore'] = '{$a} дней до интервала';
$string['xweeksbefore'] = '{$a} недель до интервала';
$string['yourappointmentnote'] = 'Примечания лично для Вас';
$string['yourslotnotes'] = 'Примечания к встрече';
