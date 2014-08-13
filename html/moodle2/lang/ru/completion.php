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
 * Strings for component 'completion', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   completion
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['achievinggrade'] = 'Достижение оценки';
$string['activities'] = 'Элементы';
$string['activitiescompleted'] = 'Завершение активного элемента курса';
$string['activitiescompletednote'] = 'Примечание: завершение активного элемента должно быть установлено для этого элемента в приведенном выше списке.';
$string['activityaggregation'] = 'Требуемое условие';
$string['activityaggregation_all'] = 'ВСЕ выбранные активные элементы должны быть завершены';
$string['activityaggregation_any'] = 'ЛЮБОЙ из выбранных активных элементов должен быть завершен';
$string['activitycompletion'] = 'Выполнение элемента курса';
$string['aggregationmethod'] = 'Способ объединения';
$string['all'] = 'Соответствие всем критериям';
$string['any'] = 'Соответствие любому из критериев';
$string['approval'] = 'Одобрение';
$string['badautocompletion'] = 'При включении автоматического отслеживания выполнения, Вам также необходимо включить как минимум одно требование (ниже).';
$string['completed'] = 'Выполнено';
$string['completedunlocked'] = 'Настройки отслеживания выполнения разблокированы';
$string['completedunlockedtext'] = 'При сохранении изменений достижения всех студентов будут очищены. Если Вы передумали, не сохраняйте форму.';
$string['completedwarning'] = 'Настройки отслеживания выполнения заблокированы';
$string['completedwarningtext'] = 'Один или несколько студентов ({$a}) уже завершили этот элемент. Изменение настроек приведет к удалению их достижений и может ввести пользователей в заблуждение. В связи с этим данные настройки были заблокированы. Не следует их разблокировать без крайней необходимости.';
$string['completion'] = 'Отслеживание выполнения';
$string['completionactivitydefault'] = 'По умолчанию использовать настройки активного элемента';
$string['completion-alt-auto-enabled'] = 'Система отметила этот элемент как выполненный, в соответствии с условиями: {$a}';
$string['completion-alt-auto-fail'] = 'Выполнено: {$a} (оценка ниже проходного балла)';
$string['completion-alt-auto-n'] = 'Не выполнено: {$a}';
$string['completion-alt-auto-pass'] = 'Выполнено: {$a} (оценка выше проходного балла)';
$string['completion-alt-auto-y'] = 'Выполнено: {$a}';
$string['completion-alt-manual-enabled'] = 'Студенты могут вручную отмечать этот элемент как выполненный: {$a}';
$string['completion-alt-manual-n'] = 'Не выполнено: {$a}. Выберите, чтобы отметить элемент как выполненный';
$string['completion-alt-manual-y'] = 'Выполнено: {$a}. Выберите, чтобы отметить элемент курса как невыполненный';
$string['completion_automatic'] = 'Отображать элемент курса как пройденный, при выполнении условий';
$string['completiondefault'] = 'Отслеживание завершения по умолчанию';
$string['completiondisabled'] = 'Отключено, не отображается в настройках элемента(ов)';
$string['completionduration'] = 'Зачисление';
$string['completionenabled'] = 'Включено, управляется через настройки отслеживания выполнения и параметры отдельных элементов курса';
$string['completionexpected'] = 'Планируется выполнение до';
$string['completionexpected_help'] = 'Данная настройка определяет дату, когда элемент курса ориентировочно должен быть выполнен. Эта дата не отображается для студентов, и выводится только в отчете о выполнении элемента.';
$string['completion-fail'] = 'Выполнено (оценка ниже проходного балла)';
$string['completion_help'] = 'Если параметр включен, то будет отслеживаться (вручную или автоматически) завершение элементов курса, основываясь на определенных условиях. Можно устанавливать несколько условий, но в этом случае элемент будет считаться завершенным при выполнении ВСЕХ условий.

Отметка рядом с названием элемента на странице курса показывает, что элемент завершен.';
$string['completionicons'] = 'Поля для отметок о выполнении';
$string['completionicons_help'] = 'Отметка рядом с названием элемента может быть использована для отображения завершения элемента.

Если показано поле с пунктирной границей - это значит, что отметка появится автоматически после завершения элемента в соответствии с установленными преподавателем условиями.

Если показано пустое поле со сплошной границей, то Вы можете щелкнуть по нему и установить галочку, чтобы отметить завершение элемента (при повторном щелчке отметка снимается). Отметка не обязательна и является лишь способом отслеживания Вашего продвижения в курсе.';
$string['completion_manual'] = 'Студенты могут вручную отмечать элемент курса как выполненный.';
$string['completionmenuitem'] = 'Отслеживание выполнения';
$string['completion-n'] = 'Не выполнено';
$string['completion_none'] = 'Не отображать выполнение элемента';
$string['completionnotenabled'] = 'Отслеживание выполнения отключено';
$string['completionnotenabledforcourse'] = 'Отслеживание выполнения в этом курсе отключено';
$string['completionnotenabledforsite'] = 'Отслеживание выполнения на этом сайте отключено';
$string['completionondate'] = 'Дата';
$string['completionondatevalue'] = 'Пользователь должен оставаться зачисленным до';
$string['completion-pass'] = 'Выполнено (оценка выше проходного балла)';
$string['completionsettingslocked'] = 'Настройки выполнения заблокированы';
$string['completion-title-manual-n'] = 'Отметить как выполненное:{$a}';
$string['completion-title-manual-y'] = 'Отметить как невыполненное: {$a}';
$string['completionusegrade'] = 'Требуется оценка';
$string['completionusegrade_desc'] = 'Студент должен получить оценку для выполнения этого элемента';
$string['completionusegrade_help'] = 'При отметке этого варианта элемент считается выполненным, когда студент получает оценку. Будут отображаться значки успешного или неудачного выполнения, если в настройках элемента указан проходной балл.';
$string['completionview'] = 'Требуется просмотр';
$string['completionview_desc'] = 'Студент должен просмотреть этот элемент, чтобы он считался выполненным';
$string['completion-y'] = 'Выполнено';
$string['configcompletiondefault'] = 'Значение по умолчанию для отслеживания завершения при создании новых активных элементов.';
$string['configenablecompletion'] = 'При включении у Вас появится возможность отслеживать выполнение элементов курса.';
$string['confirmselfcompletion'] = 'Самостоятельное подтверждение выполнения';
$string['courseaggregation'] = 'Требуемое условие';
$string['courseaggregation_all'] = 'ВСЕ выбранные курсы должны быть завершены';
$string['courseaggregation_any'] = 'ЛЮБОЙ из выбранных курсов должен быть завершен';
$string['coursealreadycompleted'] = 'Вы уже завершили данный курс';
$string['coursecomplete'] = 'Курс завершен';
$string['coursecompleted'] = 'Курс завершен';
$string['coursecompletion'] = 'Завершение курса';
$string['coursecompletioncondition'] = 'Состояние: {$a}';
$string['coursegrade'] = 'Оценка за курс';
$string['coursesavailable'] = 'Доступные курсы';
$string['coursesavailableexplaination'] = 'Примечание: состояние завершения курса должно быть установлено для курса в приведенном выше списке.';
$string['criteria'] = 'Критерии';
$string['criteriagroup'] = 'Группа критериев';
$string['criteriarequiredall'] = 'Требуются соответствие всем указанным ниже критериям';
$string['criteriarequiredany'] = 'Требуется соответствие любому из указанных ниже критериев';
$string['csvdownload'] = 'Скачать в формате электронной таблицы (UTF-8 .csv)';
$string['datepassed'] = 'Дата прохождения';
$string['days'] = 'Дней';
$string['daysoftotal'] = '{$a->days} из {$a->total}';
$string['deletecompletiondata'] = 'Удалить данные о завершении';
$string['dependencies'] = 'Зависимости';
$string['dependenciescompleted'] = 'Завершение других курсов';
$string['editcoursecompletionsettings'] = 'Настройки отслеживания выполнения для курса';
$string['enablecompletion'] = 'Включить отслеживание выполнения';
$string['enablecompletion_help'] = 'Однажды включенные, настройки отслеживания завершения отображаются как на странице отслеживания завершения, так и в настройках активного элемента.';
$string['enrolmentduration'] = 'Продолжительность зачисления';
$string['enrolmentdurationlength'] = 'Пользователь должен оставаться зачисленным на протяжении';
$string['err_noactivities'] = 'Отслеживание выполнения не настроено ни для одного элемента курса, поэтому здесь нечего отображать. Вы можете настроить отслеживание выполнения при редактировании параметров отдельных элементов.';
$string['err_nocourses'] = 'Отслеживание выполнения курса не включено ни для одного другого курса, поэтому здесь нечего отображать. Вы можете настроить отслеживание завершения курса в его настройках курса.';
$string['err_nograde'] = 'Для этого курса не была установлена проходная оценка курса. Чтобы включить этот критерий, необходимо создать проходную оценку для этого курса.';
$string['err_noroles'] = 'В этом курсе нет ролей с правом «moodle/course:markcomplete».';
$string['err_nousers'] = 'Нет студентов в этом курсе или группе, для которых отображается информация о завершении. (По умолчанию, информация о завершении отображается только для студентов, поэтому если нет студентов, то Вы увидите эту ошибку. Администраторы могут изменить этот параметр на странице администрирования.)';
$string['err_settingslocked'] = 'Один или несколько студентов уже выполнили требования этого критерия, поэтому настройки были заблокированы. При разблокировке настроек критерия данные пользователей о его выполнении будут удалены и может возникнуть путаница.';
$string['err_system'] = 'Произошла внутренняя системная ошибка завершения. (Системные администраторы могут включить информацию об отладке для просмотра подробностей.)';
$string['eventcoursecompleted'] = 'Курс завершен';
$string['eventcoursecompletionupdated'] = 'Завершение курса обновлено';
$string['eventcoursemodulecompletionupdated'] = 'Завершение модуля курса обновлено';
$string['excelcsvdownload'] = 'Скачать в Excel-совместимом формате (.csv)';
$string['fraction'] = 'Доля';
$string['graderequired'] = 'Необходимая оценка курса';
$string['gradexrequired'] = 'Необходимо {$a}';
$string['inprogress'] = 'В процессе';
$string['manualcompletionby'] = 'Кто должен вручную поставить отметку о выполнении?';
$string['manualcompletionbynote'] = 'Примечание: Право moodle/course:markcomplete  должно быть предоставлено роли в приведенном списке.';
$string['manualselfcompletion'] = 'Пользователь может сам поставить отметку о выполнении';
$string['manualselfcompletionnote'] = 'Примечание: блок самостоятельного завершения должен быть добавлен в курс, если самозавершение вручную включено.';
$string['markcomplete'] = 'Отметить как выполненный';
$string['markedcompleteby'] = 'Отметку о выполнении поставил пользователь «{$a}»';
$string['markingyourselfcomplete'] = 'Самостоятельно отметить как выполненный';
$string['moredetails'] = 'Подробнее';
$string['nocriteriaset'] = 'Для этого курса не установлены критерии завершения';
$string['notcompleted'] = 'Не выполнено';
$string['notenroled'] = 'Вы не записаны на этот курс';
$string['nottracked'] = 'Вы в настоящее время не отслеживаете завершение в этом курсе';
$string['notyetstarted'] = 'Еще не началось';
$string['overallaggregation'] = 'Требуемые условия завершения';
$string['overallaggregation_all'] = 'Курс завершается, когда ВСЕ условия будут выполнены';
$string['overallaggregation_any'] = 'Курс завершается, когда ЛЮБОЕ из условий будет выполнено';
$string['pending'] = 'Ожидается';
$string['periodpostenrolment'] = 'Период после записи на курс';
$string['progress'] = 'Достижения студента';
$string['progress-title'] = '{$a->user}, {$a->activity}: {$a->state} {$a->date}';
$string['progresstotal'] = 'Прогресс: {$a->complete} / {$a->total}';
$string['recognitionofpriorlearning'] = 'Распознавание предшествующего обучения';
$string['remainingenroledfortime'] = 'Оставаться зарегистрированным в течение определенного периода времени';
$string['remainingenroleduntildate'] = 'Оставшиеся записанными на курс до указанной даты';
$string['reportpage'] = 'Показать пользователей с {$a->from} по {$a->to} из {$a->total}.';
$string['requiredcriteria'] = 'Необходимые критерии';
$string['restoringcompletiondata'] = 'Запись данных отслеживания выполнения';
$string['roleaggregation'] = 'Требуемое условие';
$string['roleaggregation_all'] = 'ВСЕ выбранные роли помечать при выполнении условия';
$string['roleaggregation_any'] = 'ЛЮБУЮ из выбранных ролей помечать при выполнении условия';
$string['saved'] = 'Сохранено';
$string['seedetails'] = 'Подробнее';
$string['self'] = 'Самостоятельно';
$string['selfcompletion'] = 'Самостоятельное выполнение';
$string['showinguser'] = 'Отображается информация о пользователе';
$string['unenrolingfromcourse'] = 'Отчисление из курса';
$string['unenrolment'] = 'Исключение из курса';
$string['unit'] = 'Модуль';
$string['unlockcompletion'] = 'Разблокировать настройки';
$string['unlockcompletiondelete'] = 'Разблокировать настройки и удалить данные о выполнении элемента пользователями';
$string['usealternateselector'] = 'Использовать альтернативный способ выбора курса';
$string['usernotenroled'] = 'Пользователь не записан на этот курс';
$string['viewcoursereport'] = 'Просмотреть отчет по курсу';
$string['viewingactivity'] = 'Просмотр элемента «{$a}»';
$string['writingcompletiondata'] = 'Запись данных отслеживания выполнения';
$string['xdays'] = 'дней: {$a}';
$string['yourprogress'] = 'Ваши достижения';
