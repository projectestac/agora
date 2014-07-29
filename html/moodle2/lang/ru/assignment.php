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
 * Strings for component 'assignment', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Есть задания, требующие Вашего внимания';
$string['addsubmission'] = 'Добавить ответ';
$string['allowdeleting'] = 'Разрешить удаление';
$string['allowdeleting_help'] = 'Если параметр включен, то студенты могут удалять загруженные файлы в любое время до представления работы для оценивания.';
$string['allowmaxfiles'] = 'Максимальное число загружаемых файлов';
$string['allowmaxfiles_help'] = 'Максимальное количество файлов, которые могут быть загружены. Это число нигде не показывается, поэтому желательно указать количество загружаемых файлов в описании задания.';
$string['allownotes'] = 'Разрешить комментарии';
$string['allownotes_help'] = 'Если параметр включен, то студенты могут вводить заметки в текстовое поле, как в задании Ответ - в виде текста.';
$string['allowresubmit'] = 'Несколько попыток';
$string['allowresubmit_help'] = 'Если параметр включен, то студентам будет разрешено отсылать исправленный ответ уже после того, как ответ был оценен (для повторной оценки).';
$string['alreadygraded'] = 'Ваше задание уже было оценено, а пересдачи не разрешены.';
$string['assignment:addinstance'] = 'Добавлять новое задание';
$string['assignmentdetails'] = 'Детали задания';
$string['assignment:exportownsubmission'] = 'Экспортировать свои задания';
$string['assignment:exportsubmission'] = 'Экспортировать задания';
$string['assignment:grade'] = 'Оценка задания';
$string['assignmentmail'] = '{$a->teacher} написал отзыв на Ваш ответ на задание «{$a->assignment}».

Вы можете посмотреть его по ссылке:
{$a->url}';
$string['assignmentmailhtml'] = '{$a->teacher} написал отзыв на Ваш ответ на задание «<i>{$a->assignment}</i>».<br /><br />
Вы можете посмотреть его, добавленный к <a href="{$a->url}">ответу на задание</a>.';
$string['assignmentmailsmall'] = '{$a->teacher} написал отзыв на Ваш ответ на задание «{$a->assignment}». Вы можете посмотреть отзыв, добавленный к ответу.';
$string['assignmentname'] = 'Название задания';
$string['assignmentsubmission'] = 'Отправленные ответы на задания';
$string['assignment:submit'] = 'Отправка задания';
$string['assignmenttype'] = 'Тип задания';
$string['assignment:view'] = 'Просмотр задания';
$string['availabledate'] = 'Доступно с';
$string['cannotdeletefiles'] = 'Произошла ошибка и файл не был удален';
$string['cannotviewassignment'] = 'Вы не можете просмотреть это задание';
$string['changegradewarning'] = 'Это задание с оцененными ответами и изменение оценки не будет автоматически пересчитывать существующие оценки. Необходимо повторно переоценить все  представленные ответы, если Вы хотите изменить оценку.';
$string['closedassignment'] = 'Это задание закрыто, так как срок подачи ответов уже истек.';
$string['comment'] = 'Отзыв';
$string['commentinline'] = 'Включить в отзыв текст ответа студента';
$string['commentinline_help'] = 'Если параметр включен, то при оценивании текст ответа будет скопирован в поле комментария отзыва, облегчая комментирование (используя разные цвета) или изменение первоначального текста.';
$string['configitemstocount'] = 'Тип подсчитываемых элементов для студенческих материалов в онлайн заданиях';
$string['configmaxbytes'] = 'Установленный по умолчанию максимальный размер для всех заданий на сайте (соотносится с установленным ограничением по курсу и с другими локальными установками)';
$string['configshowrecentsubmissions'] = 'Все могут видеть уведомления об ответах и получать отчеты активности.';
$string['confirmdeletefile'] = 'Вы абсолютно уверены, что хотите удалить этот файл?<br /><strong>{$a}</strong>';
$string['coursemisconf'] = 'Курс некорректно настроен';
$string['currentgrade'] = 'Текущая оценка в журнале';
$string['deleteallsubmissions'] = 'Удалить все ответы';
$string['deletefilefailed'] = 'Ошибка удаления файла.';
$string['description'] = 'Описание';
$string['downloadall'] = 'Скачать все задания в одном ZIP-архиве';
$string['draft'] = 'Черновик';
$string['due'] = 'Крайний срок сдачи';
$string['duedate'] = 'Последний срок сдачи';
$string['duedateno'] = 'Срок сдачи не ограничен';
$string['early'] = 'раньше на {$a}';
$string['editmysubmission'] = 'Редактировать мой ответ';
$string['editthesefiles'] = 'Редактировать эти файлы';
$string['editthisfile'] = 'Обновить этот файл';
$string['emailstudents'] = 'Уведомления студентов по электронной почте';
$string['emailteachermail'] = '{$a->username} отправил(а) новый ответ на задание «{$a->assignment}»
Ответы на это задание доступны по адресу:
{$a->url}';
$string['emailteachermailhtml'] = '{$a->username} отправил(а) {$a->timeupdated} новый ответ на задание <i>«{$a->assignment}».</i><br /><br />
Ответы на это задание <a href="{$a->url}">расположены на сайте</a>.';
$string['emailteachers'] = 'Отправлять уведомления учителям';
$string['emailteachers_help'] = 'Если параметр включен, то преподаватели получают уведомление по электронной почте всякий раз, когда студенты представляют или обновляют свой ответ. Уведомления получат только те преподаватели, которые могут оценивать данное задание. Например, если в курсе используются отдельные группы, то преподаватели, ограниченные работой в конкретных группах, не будут получать уведомления о представлении ответов на данное задание студентами из других групп.';
$string['emptysubmission'] = 'Вы еще ничего не отправляли.';
$string['enablenotification'] = 'Отправлять уведомления по электронной почте';
$string['enablenotification_help'] = 'Если параметр включен, ученики будут получать уведомления по электронной почте о том, что их ответы были оценены.';
$string['errornosubmissions'] = 'Нет никаких ответов на задание';
$string['existingfiledeleted'] = 'Существующий файл был удален: {$a}';
$string['failedupdatefeedback'] = 'Не удалось обновить отзыв пользователю {$a}';
$string['feedback'] = 'Отзыв';
$string['feedbackfromteacher'] = 'Отзыв от {$a}';
$string['feedbackupdated'] = 'Отзыв изменен для {$a} чел.';
$string['finalize'] = 'Запретить обновление ответов';
$string['finalizeerror'] = 'Произошла ошибка. Это задание не может быть завершено';
$string['futureaassignment'] = 'Это задание не существует.';
$string['graded'] = 'Оценено';
$string['guestnosubmit'] = 'Извините, гость не может отправлять ответ на задание. Вы должны зарегистрироваться (войти под своей учетной записью), чтобы могли отправить свой ответ.';
$string['guestnoupload'] = 'Извините, гости не могут отвечать на задания';
$string['helpoffline'] = '<p>Этот режим полезен, когда задание должно быть выполнено вне Moodle.
Например, где-либо в сети или лицом к лицу. </p> <p>Студенты видят описание задания, но не могут в ответ загрузить файлы или написать текст.
Оценивание заданий работает обычно и студенты будут уведомлены о своих оценках.</p>';
$string['helponline'] = '<p> Этот тип задания позволяет пользователям редактировать текст ответа, используя обычные инструменты редактирования. Преподаватели могут оценивать их непосредственно в браузере, и даже добавлять комментарии или делать исправления.</p>
<p>(Если Вы знакомы с предыдущими версиями Moodle, то отметим, что этот тип задания похож на устаревший элемент «Рабочая тетрадь») </p>';
$string['helpupload'] = '<p> Этот вид задания позволяет каждому участнику загрузить один или несколько файлов в любом формате.
Это могут быть документы Word, изображения, архив веб-сайта, или все, что Вы попросите их представить. </p>
<p> Этот тип также позволяет загружать несколько файлов ответов. Файлы ответов могут быть загружены до их представления. Задание может быть использовано для того, чтобы дать каждому участнику различные файлы для работы. </p>
<p> Участники также могут вводить заметки, описывающие представленные файлы, состояние выполнения или любую другую текстовую информацию. </p>
<p> Завершение заданий такого рода может быть вручную указано студентом. Вы можете в любое время просмотреть текущее состояние и отметить незавершенные задания как черновик. Любое неоцененное задание Вы можете вернуть к статусу черновика. </p>';
$string['helpuploadsingle'] = '<p>Этот тип задания позволяет участнику отправить в качестве ответа один произвольный файл любого типа.</p> <p>Например, картинку, документ Word, архив, или что угодно другое.</p>';
$string['hideintro'] = 'Скрыть описание, пока задание не станет доступным';
$string['hideintro_help'] = 'Если параметр включен, то описание задания будет скрыто до наступления даты, указанной в поле «Доступно с». Будет отображаться только название задания.';
$string['invalidassignment'] = 'Некорректное задание';
$string['invalidfileandsubmissionid'] = 'Отсутствует файл или ID ответа.';
$string['invalidid'] = 'Некорректный идентификатор задания';
$string['invalidsubmissionid'] = 'Некорректный идентификатор ответа на задание';
$string['invalidtype'] = 'Некорректный тип задания';
$string['invaliduserid'] = 'Некорректный идентификатор пользователя';
$string['itemstocount'] = 'Количество';
$string['lastgrade'] = 'Последняя оценка';
$string['late'] = 'Срок выполнения закончился {$a} назад';
$string['maximumgrade'] = 'Максимальная оценка';
$string['maximumsize'] = 'Максимальный размер';
$string['maxpublishstate'] = 'Максимальный срок видимости записи блога';
$string['messageprovider:assignment_updates'] = 'Уведомления о задании (2.2)';
$string['modulename'] = 'Задание (2.2)';
$string['modulename_help'] = 'Задания позволяют преподавателю ставить определенную задачу, с ответами как в режиме онлайн, так и вне сайта. Все они затем могут быть оценены.';
$string['modulenameplural'] = 'Задания (2.2)';
$string['newsubmissions'] = 'Представленные ответы';
$string['noassignments'] = 'Ответов еще нет';
$string['noattempts'] = 'Не было ни одной попытки отправить ответ на это задание';
$string['noblogs'] = 'У Вас нет записей в блоге для отправки';
$string['nofiles'] = 'Не отправлено ни одного файла';
$string['nofilesyet'] = 'Пока еще не отправлено ни одного файла';
$string['nomoresubmissions'] = 'Дальнейшие представления ответов не разрешены';
$string['norequiregrading'] = 'Нет заданий, которые нужно оценить.';
$string['nosubmisson'] = 'Нет представленных ответов на задание.';
$string['notavailableyet'] = 'Извините, задание пока что недоступно. Инструкции к заданию будут отображены здесь после указанной ниже даты.';
$string['notes'] = 'Комментарии';
$string['notesempty'] = 'Нет записей';
$string['notesupdateerror'] = 'Ошибка во время обновления оценок';
$string['notgradedyet'] = 'Пока не оценен';
$string['notsubmittedyet'] = 'Ответ пока не отправлен';
$string['onceassignmentsent'] = 'Если Вы отправите задание для получения оценки, Вы больше не сможете удалять или прикреплять файлы. Хотите продолжить?';
$string['operation'] = 'Операция';
$string['optionalsettings'] = 'Дополнительные настройки';
$string['overwritewarning'] = 'Предупреждение: Ваш новый ответ заменит предыдущий';
$string['page-mod-assignment-submissions'] = 'Страница представления модуля задания';
$string['page-mod-assignment-view'] = 'Главная страница модуля задания';
$string['page-mod-assignment-x'] = 'Любая страница модуля задания';
$string['pagesize'] = 'Количество ответов на странице';
$string['pluginadministration'] = 'Управление заданием';
$string['pluginname'] = 'Задание (2.2)';
$string['popupinnewwindow'] = 'Открывать во всплывающем окне';
$string['preventlate'] = 'Запретить отправку ответа после истечения срока выполнения';
$string['quickgrade'] = 'Перейти в режим быстрой оценки';
$string['quickgrade_help'] = 'Если параметр включен, то на одной странице могут быть оценены несколько заданий. Добавив оценки и комментарии, нажмите кнопку «Сохранить все мои отзывы», чтобы сохранить все изменения для этой страницы.';
$string['requiregrading'] = 'Требует оценки';
$string['responsefiles'] = 'Файлы ответа';
$string['reviewed'] = 'Просмотрено';
$string['saveallfeedback'] = 'Сохранить все мои отзывы';
$string['selectblog'] = 'Выберите, какую запись блога Вы хотите отправить';
$string['sendformarking'] = 'Отправить для оценки';
$string['showrecentsubmissions'] = 'Показать последние ответы';
$string['submission'] = 'Ответ';
$string['submissiondraft'] = 'Черновик ответа';
$string['submissionfeedback'] = 'Отзыв на ответ';
$string['submissions'] = 'Ответы';
$string['submissionsaved'] = 'Ваши изменения сохранены';
$string['submissionsnotgraded'] = 'Не оцененных заданий: {$a}';
$string['submitassignment'] = 'Отправьте свой ответ, используя эту форму';
$string['submitedformarking'] = 'Задание отправлено для получения оценки и не может быть обновлено';
$string['submitformarking'] = 'Окончательная отправка для получения оценки';
$string['submitted'] = 'Представлено';
$string['submittedfiles'] = 'Отправленные файлы';
$string['subplugintype_assignment'] = 'Тип задания';
$string['subplugintype_assignment_plural'] = 'Типы заданий';
$string['trackdrafts'] = 'Включить кнопку «Отправить для оценки»';
$string['trackdrafts_help'] = 'Кнопка «Отправить для оценки» позволяет студентам уведомить преподавателя о завершении работы над заданием. Преподаватель может вернуть задание в статус черновика (например, если что-то необходимо доделать).';
$string['typeblog'] = 'Запись в блоге';
$string['typeoffline'] = 'Ответ - вне сайта';
$string['typeonline'] = 'Ответ - в виде текста';
$string['typeupload'] = 'Ответ - в виде нескольких файлов';
$string['typeuploadsingle'] = 'Ответ - в виде файла';
$string['unfinalize'] = 'Вернуть на доработку';
$string['unfinalizeerror'] = 'Возникла ошибка и этот ответ не может быть возвращен в черновики';
$string['unfinalize_help'] = 'Возвращение статуса незавершенного задания позволяет студентам внести изменения в выполненные задания.';
$string['unsupportedsubplugin'] = 'Тип задания «{$a}» не поддерживается. Вы можете подождать, пока этот тип задания не станет доступным или удалить задание.';
$string['upgradenotification'] = 'Этот активный элемент базируется на старом модуле задания.';
$string['uploadafile'] = 'Загрузить файл';
$string['uploadbadname'] = 'Этот файл содержит недопустимые символы и не может быть закачан';
$string['uploadedfiles'] = 'загруженные файлы';
$string['uploaderror'] = 'При отправке файла на сервер произошла ошибка';
$string['uploadfailnoupdate'] = 'Файл был закачан, но обновить Ваш  ответ не удалось!';
$string['uploadfiles'] = 'Загрузить файлы';
$string['uploadfiletoobig'] = 'Файл слишком большой (ограничение в {$a} байт)';
$string['uploadnofilefound'] = 'Файл не был найден. Вы уверены, что выбрали файл для загрузки?';
$string['uploadnotregistered'] = '«{$a}» был закачан, но ответ не зарегистрирован';
$string['uploadsuccess'] = 'Закачка файла «{$a}» завершена';
$string['usermisconf'] = 'Пользователь некорректно настроен';
$string['usernosubmit'] = 'Извините, Вам не разрешено отправлять задание.';
$string['viewassignmentupgradetool'] = 'Просмотр способов обновления задания';
$string['viewfeedback'] = 'Посмотреть оценки задания и отзывы';
$string['viewmysubmission'] = 'Просмотреть мои ответы';
$string['viewsubmissions'] = 'Просмотр ответов на задание - {$a}';
$string['yoursubmission'] = 'Ваш ответ';
