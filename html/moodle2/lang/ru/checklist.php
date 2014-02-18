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
 * Strings for component 'checklist', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   checklist
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcomments'] = 'Добавить коментарии';
$string['additem'] = 'Добавить';
$string['additemalt'] = 'Добавить новый пункт к списку';
$string['additemhere'] = 'Вставить новый пункт после текущего';
$string['addownitems'] = 'Добавить свои собственные пункты';
$string['addownitems-stop'] = 'Завершить добавление собственных пунктов';
$string['allowmodulelinks'] = 'Разрешить связи с модулями';
$string['anygrade'] = 'Любой';
$string['autopopulate'] = 'Показывать модули курса в контрольном списке';
$string['autopopulate_help'] = 'Это позволяет автоматически добавлять список всех ресурсов и элементов текущего курса к контрольному списку.<br />
Этот список будет обновляться в соответствии с изменениями в Вашем курсе, каждый раз, как только Вы откроете страницу «Редактировать» контрольного списка.<br />
Элементы в списке можно прятать, нажимая кнопку «Скрыть» рядом с ними.<br />
Чтобы удалить автоматически добавленные элементы из списка, установите это свойство обратно в значение «Нет», после чего нажмите «Удалить пункты, которые соответствуют модулю курса» на странице «Редактировать».';
$string['autoupdate'] = 'Отмечать, когда модуль завершен';
$string['autoupdate_help'] = 'Это позволяет автоматически отмечать пункт Вашего контрольного списка, как только Вы выполните соответствующий элемент курса.<br />
Понятие \'Выполнено\' для элемента курса меняется в зависимости от типа элемента курса - \'просмотр\' для ресурса, \'отправить\' для теста или другого задания, \'сообщение\' для форума или \'присоединение\' для чата, и т.д.<br />
Если в Moodle 2.0 отслеживание выполнения включено для определенных элементов курсов, то оно будет использовано для отметки пунктов в списке.<br />
Для более детальной информации о том, какое состояние элемента курса рассматривается как \'выполнено\', попросите администратора Вашего сайта просмотреть содержимое файла \'mod/checklist/autoupdate.php\'.<br />
Примечание: чтобы изменения, сделанные студентом в некотором элементе курса, отобразились в его контрольном списке, может пройти до 60 секунд.';
$string['autoupdatenote'] = 'Если «студент» отметил это как автоматически обновляемое - никаких обновлений не будет показано в контрольных списках «Только преподаватели».';
$string['autoupdatewarning_both'] = 'Пункты этого контрольного списка будут обновлены автоматически (как только студенты выполнят соответствующий элемент курса). Однако, так как этот контрольный список является типом «Студенты и преподаватели», индикатор выполнения будет обновлен после подтверждения указанных отметок преподавателем.';
$string['autoupdatewarning_student'] = 'Пункты этого списка будут обновлены автоматически (как только студенты выполнят соответствующий элемент курса).';
$string['autoupdatewarning_teacher'] = 'Автоматическое обновление этого контрольного списка включено, но эти отметки не будут показаны, поскольку сейчас отображаются отметки только «Преподавателей».';
$string['calendardescription'] = 'Это событие было добавлено в контрольный список: $a';
$string['canceledititem'] = 'Отменить';
$string['changetextcolour'] = 'Следующий цвет текста';
$string['checkeditemsdeleted'] = 'Отмеченные пункты удалены';
$string['checklist'] = 'контрольный список';
$string['checklist:addinstance'] = 'Добавить новый контрольный список';
$string['checklistautoupdate'] = 'Позволить автоматическое обновление контрольного списка';
$string['checklist:edit'] = 'Создать и редактировать контрольный список';
$string['checklist:emailoncomplete'] = 'Получать е-мейл о завершении';
$string['checklistfor'] = 'Контрольный список для';
$string['checklistintro'] = 'Вступление';
$string['checklist:preview'] = 'Просматривать контрольный список';
$string['checklistsettings'] = 'Настройки';
$string['checklist:updatelocked'] = 'Обновлять заблокированные контрольные отметки';
$string['checklist:updateother'] = 'Обновлять контрольные отметки студентов';
$string['checklist:updateown'] = 'Обновлять свои контрольные отметки';
$string['checklist:viewmenteereports'] = 'Просматривать достижения подопечных (только)';
$string['checklist:viewreports'] = 'Просматривать достижения студентов';
$string['checks'] = 'Контрольные отметки';
$string['comments'] = 'Комментарии';
$string['completionpercent'] = 'Процент элементов, которые должны быть отмечены:';
$string['completionpercentgroup'] = 'Требует проверки';
$string['configchecklistautoupdate'] = 'Прежде чем разрешить это, Вы должны внести некоторые изменения в код ядра Moodle. Детальные инструкции смотрите в файле mod/checklist/README.txt';
$string['configshowcompletemymoodle'] = 'Если это отключено, то выполненные контрольные списки будут скрыты на странице \'Мой Moodle\'.';
$string['configshowmymoodle'] = 'Если это отключено, то элементы курса «Контрольный список» (с индикаторами выполнения) далее не будут присутствовать на странице «Мой Moodle».';
$string['confirmdeleteitem'] = 'Вы действительно хотите безвозвратно удалить эти пункты контрольного списка?';
$string['deleteitem'] = 'Удалить это пункт';
$string['duedatesoncalendar'] = 'Добавить соответствующие даты в календарь';
$string['edit'] = 'Редактировать контрольный список';
$string['editchecks'] = 'Редактировать отметки';
$string['editdatesstart'] = 'Редактировать даты';
$string['editdatesstop'] = 'Закончить редактировать даты';
$string['edititem'] = 'Редактировать этот пункт';
$string['emailoncomplete'] = 'Отправлять письма преподавателям, когда контрольный список заполнен';
$string['emailoncompletebody'] = 'Пользователь {$a->user} выполнил контрольный список «{$a->checklist}» в курсе «{$a->coursename}»
Просмотреть контрольный список можно здесь:';
$string['emailoncompletebodyown'] = 'Вы выполнили контрольный список «{$a->checklist}» в курсе «{$a->coursename}».
Просмотреть контрольный список можно здесь:';
$string['emailoncomplete_help'] = 'Когда контрольный список выполнен, может быть отправлено письмо с подтверждениями: студенту, который его выполнил; всем преподавателям на курсе или тем и другим.<br />
Администратор может задать, кто будет получать эти сообщения используя разрешение «mod:checklist/emailoncomplete» - по умолчанию, все преподаватели (в том числе и без права редактирования) могут получать эти сообщения.';
$string['emailoncompletesubject'] = 'Пользователь {$a->user} выполнил контрольный список «{$a->checklist}»';
$string['emailoncompletesubjectown'] = 'Вы выполнили контрольный список «{$a->checklist}»';
$string['export'] = 'Экспортировать пункты';
$string['forceupdate'] = 'Обновить отметки для всех автоматически созданных пунктов';
$string['gradetocomplete'] = 'Оценок к завершению:';
$string['guestsno'] = 'У Вас нет прав на просмотр этого контрольного списка';
$string['headingitem'] = 'Этот пункт является заголовком и не будет иметь рядом поля для отметки';
$string['import'] = 'Импортировать пункты';
$string['importfile'] = 'Выберите файл для импорта';
$string['importfromcourse'] = 'Весь курс';
$string['importfromsection'] = 'Текущий раздел';
$string['indentitem'] = 'Пункт с отступом';
$string['itemcomplete'] = 'Выполнено';
$string['items'] = 'Пункты контрольного списка';
$string['linktomodule'] = 'Связь с этим модулем';
$string['lockteachermarks'] = 'Заблокировать отметки преподавателя';
$string['lockteachermarks_help'] = 'Если при включенном параметре преподаватель сохранит отметку «Да», то он больше не сможет ее изменить. Только пользователи с правом «mod/checklist:updatelocked» будут иметь возможность изменить отметку.';
$string['lockteachermarkswarning'] = 'Примечание: после сохранения отметок Вы больше не сможете изменить ни одной метки «Да»';
$string['modulename'] = 'Контрольный список';
$string['modulenameplural'] = 'Контрольные списки';
$string['moveitemdown'] = 'Переместить пункт вниз';
$string['moveitemup'] = 'Переместить пункт вверх';
$string['noitems'] = 'В контрольном списке нет пунктов';
$string['optionalhide'] = 'Спрятать необязательные пункты';
$string['optionalitem'] = 'Этот пункт необязательный';
$string['optionalshow'] = 'Показать необязательные пункты';
$string['percentcomplete'] = 'Обязательные пункты';
$string['percentcompleteall'] = 'Все пункты';
$string['pluginadministration'] = 'Управление контрольным списком';
$string['pluginname'] = 'Контрольный список';
$string['preview'] = 'Предварительный просмотр';
$string['progress'] = 'Достижения';
$string['removeauto'] = 'Удалить пункты, соответствующие модулю курса';
$string['report'] = 'Просмотр достижений';
$string['reporttablesummary'] = 'Таблица показывает пункты контрольного списка, выполненные каждым студентом';
$string['requireditem'] = 'Этот пункт является обязательным - он должен быть выполнен';
$string['resetchecklistprogress'] = 'Вернуть контрольный список и пользовательские пункты в начальное состояние';
$string['savechecks'] = 'Сохранить';
$string['showcompletemymoodle'] = 'Показывать выполненные контрольные списки на странице «Мой Moodle»';
$string['showfulldetails'] = 'Показать подробную информацию';
$string['showmymoodle'] = 'Показывать контрольные списки на странице «Мой Moodle»';
$string['showprogressbars'] = 'Показать индикатор выполнения';
$string['teacheralongsidecheck'] = 'Студенты и преподаватели';
$string['teachercomments'] = 'Преподаватели могут добавлять комментарии';
$string['teacherdate'] = 'Дата последнего обновления этого пункта преподавателем';
$string['teacheredit'] = 'Изменено';
$string['teacherid'] = 'Преподаватель, который последним обновил эту отметку';
$string['teachermarkno'] = 'Преподаватель утверждает, что Вы НЕ завершили это.';
$string['teachermarkundecided'] = 'Преподаватель пока не отметил это.';
$string['teachermarkyes'] = 'Преподаватель утверждает, что Вы завершили это';
$string['teachernoteditcheck'] = 'Только студенты';
$string['teacheroverwritecheck'] = 'Только преподаватели';
$string['theme'] = 'Тема оформления контрольного списка';
$string['toggledates'] = 'Показать/скрыть автора и дату отметки';
$string['unindentitem'] = 'Пункт без отступа';
$string['updatecompletescore'] = 'Сохранить отметки о выполнении';
$string['updateitem'] = 'Обновить';
$string['userdate'] = 'Дата последнего изменения этого пункта пользователем';
$string['useritemsallowed'] = 'Пользователь может добавлять собственные пункты';
$string['useritemsdeleted'] = 'Удален пользовательский пункт';
$string['view'] = 'Просмотреть контрольный список';
$string['viewall'] = 'Просмотреть всех студентов';
$string['viewallcancel'] = 'Отменить';
$string['viewallsave'] = 'Сохранить';
$string['viewsinglereport'] = 'Просмотреть достижения этого пользователя';
$string['viewsingleupdate'] = 'Обновить достижения этого пользователя';
$string['yesnooverride'] = 'Да, без замещения';
$string['yesoverride'] = 'Да, с замещением';
