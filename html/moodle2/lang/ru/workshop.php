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
 * Strings for component 'workshop', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   workshop
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregategrades'] = 'Пересчет оценок';
$string['aggregation'] = 'Расчет итоговой оценки';
$string['allocate'] = 'Распределение работ';
$string['allocatedetails'] = 'ожидалось: {$a->expected}<br />представлено: {$a->submitted}<br />не размещено: {$a->allocate}';
$string['allocation'] = 'Распределение работ';
$string['allocationconfigured'] = 'Распределение настроено';
$string['allocationdone'] = 'Распределение выполнено';
$string['allocationerror'] = 'Ошибка распределения';
$string['allsubmissions'] = 'Все работы ({$a})';
$string['alreadygraded'] = 'Уже оценено';
$string['areaconclusion'] = 'Текст заключения';
$string['areainstructauthors'] = 'Инструкции для работы';
$string['areainstructreviewers'] = 'Инструкции по оценке';
$string['areaoverallfeedbackattachment'] = 'Вложения общего отзыва';
$string['areaoverallfeedbackcontent'] = 'Тексты общего отзыва';
$string['areasubmissionattachment'] = 'Приложения к работе';
$string['areasubmissioncontent'] = 'Текст работы';
$string['assess'] = 'Оценить';
$string['assessedexample'] = 'Оцененный пример работы';
$string['assessedsubmission'] = 'Оцененная работа';
$string['assessingexample'] = 'Оценка примера работы';
$string['assessingsubmission'] = 'Оценка работы';
$string['assessment'] = 'Оценка';
$string['assessmentby'] = 'от <a href="{$a->url}">{$a->name}</a>';
$string['assessmentbyfullname'] = 'Оценка от {$a}';
$string['assessmentbyyourself'] = 'Самооценка';
$string['assessmentdeleted'] = 'Оценивание удалено';
$string['assessmentend'] = 'Конец оценивания';
$string['assessmentendbeforestart'] = 'Окончание оценивания не может быть указано раньше даты начала оценивания.';
$string['assessmentenddatetime'] = 'Срок оценивания:{$a->daydatetime} ({$a->distanceday})';
$string['assessmentendevent'] = '{$a} (конец оценивания)';
$string['assessmentform'] = 'Форма оценки';
$string['assessmentofsubmission'] = '<a href="{$a->assessmenturl}">Оценить</a>  <a href="{$a->submissionurl}">{$a->submissiontitle}</a>';
$string['assessmentreference'] = 'Рекомендуемая оценка';
$string['assessmentreferenceconflict'] = 'Не доступен пример работы для оценивания которого Вы предоставили ссылку.';
$string['assessmentreferenceneeded'] = 'Вы должны оценить этот пример работы близко к рекомендуемой оценке. Нажмите кнопку «Продолжить» для оценки работы.';
$string['assessmentsettings'] = 'Параметры оценки';
$string['assessmentstart'] = 'Начало оценивания';
$string['assessmentstartdatetime'] = 'Открыто для оценивания с: {$a->daydatetime} ({$a->distanceday})';
$string['assessmentstartevent'] = '{$a} (открывается для оценивания)';
$string['assessmentweight'] = 'Вес оценки';
$string['assignedassessments'] = 'Работы, представленные для оценивания';
$string['assignedassessmentsnone'] = 'Нет работ, представленных для оценивания';
$string['backtoeditform'] = 'Вернуться к редактированию формы';
$string['byfullname'] = 'от <a href="{$a->url}">{$a->name}</a>';
$string['calculategradinggrades'] = 'Вычислить баллы за оценивание';
$string['calculategradinggradesdetails'] = 'ожидалось: {$a->expected}<br />вычислено: {$a->calculated}';
$string['calculatesubmissiongrades'] = 'Вычислить оценки за работы';
$string['calculatesubmissiongradesdetails'] = 'ожидалось: {$a->expected}<br />вычислено: {$a->calculated}';
$string['chooseuser'] = 'Выберите пользователя...';
$string['clearaggregatedgrades'] = 'Очистить все итоговые оценки';
$string['clearaggregatedgradesconfirm'] = 'Вы действительно хотите очистить вычисленные оценки за работы и баллы за оценивание?';
$string['clearaggregatedgrades_help'] = 'Итоговые оценки за работы и баллы за оценивание будут очищены. Вы можете снова пересчитать эти оценки с нуля в фазе Оценивание оценок.';
$string['clearassessments'] = 'Очистить оценки';
$string['clearassessmentsconfirm'] = 'Вы уверены, что хотите удалить все баллы за оценивание? Вы не сможете вернуть свои собственные оценки, а рецензенты должны будут заново оценить размещенные работы.';
$string['clearassessments_help'] = 'Вычисленные оценки за работы и баллы за оценивание будут очищены. Информация в форме оценки будет сохранена, но все рецензенты должны снова открыть форму оценки и заново сохранить оценки для получения вычисленной оценки.';
$string['conclusion'] = 'Заключение';
$string['conclusion_help'] = 'Текст заключения отображается участникам в конце семинара.';
$string['configexamplesmode'] = 'Режим по умолчанию оценки примеров в семинарах';
$string['configgrade'] = 'Максимальная оценка по умолчанию для работ в семинарах';
$string['configgradedecimals'] = 'Количество десятичных цифр после запятой по умолчанию при отображении оценок.';
$string['configgradinggrade'] = 'Максимальная оценка по умолчанию для оценок в семинарах';
$string['configmaxbytes'] = 'По умолчанию максимальный размер представляемого файла для всех семинаров на сайте (соотносится с установленным в курсе ограничением и с другими локальными установками).';
$string['configstrategy'] = 'Стратегия оценки по умолчанию для семинаров.';
$string['createsubmission'] = 'Отправить';
$string['daysago'] = 'Прошло дней - {$a}';
$string['daysleft'] = 'Осталось дней - {$a}';
$string['daystoday'] = 'сегодня';
$string['daystomorrow'] = 'завтра';
$string['daysyesterday'] = 'вчера';
$string['deadlinesignored'] = 'Ограничение времени к Вам не относятся';
$string['editassessmentform'] = 'Редактировать форму оценки';
$string['editassessmentformstrategy'] = 'Редактировать форму оценки ({$a})';
$string['editingassessmentform'] = 'Редактирование формы оценки';
$string['editingsubmission'] = 'Редактирование работы';
$string['editsubmission'] = 'Редактировать работу';
$string['err_multiplesubmissions'] = 'При редактировании этой формы был сохранен еще один вариант работы. Несколько представленных работ одного пользователя не допускается.';
$string['err_removegrademappings'] = 'Не удалось удалить сопоставления неиспользованных оценок';
$string['evaluategradeswait'] = 'Пожалуйста, подождите, пока вычисляются оценки и баллы за оценивание';
$string['evaluation'] = 'Оценивание оценок';
$string['evaluationmethod'] = 'Метод оценивания оценок';
$string['evaluationmethod_help'] = 'Метод оценивания оценок определяет, как вычисляются баллы за оценивание. Вы можете позволить неоднократно пересчитывать баллы с различными настройками, пока не получите приемлемый результат.';
$string['evaluationsettings'] = 'Параметры оценки';
$string['example'] = 'Пример работы';
$string['exampleadd'] = 'Добавить пример работы';
$string['exampleassess'] = 'Оценить пример работы';
$string['exampleassessments'] = 'Пример работы для оценки';
$string['exampleassesstask'] = 'Оценить примеры';
$string['exampleassesstaskdetails'] = 'ожидалось: {$a->expected}<br />оценено: {$a->assessed}';
$string['examplecomparing'] = 'Сравнение оценок примера работы';
$string['exampledelete'] = 'Удалить пример';
$string['exampledeleteconfirm'] = 'Вы действительно хотите удалить следующий пример работы? Нажмите кнопку «Продолжить» для удаления работы.';
$string['exampleedit'] = 'Редактировать пример';
$string['exampleediting'] = 'Редактирование примера';
$string['exampleneedassessed'] = 'Сначала Вы должны оценить все представленные примеры';
$string['exampleneedsubmission'] = 'Сначала Вы должны представить свою работу и оценить все представленные примеры';
$string['examplesbeforeassessment'] = 'Примеры должны быть оценены до оценивания работ сокурсников.';
$string['examplesbeforesubmission'] = 'Необходимо оценить примеры до представления собственной работы';
$string['examplesmode'] = 'Режим оценки примеров';
$string['examplesubmissions'] = 'Примеры работ';
$string['examplesvoluntary'] = 'Добровольная оценка примера работы';
$string['feedbackauthor'] = 'Отзыв для автора';
$string['feedbackauthorattachment'] = 'Приложение';
$string['feedbackby'] = 'Отзыв на {$a}';
$string['feedbackreviewer'] = 'Отзыв для рецензента';
$string['feedbacksettings'] = 'Отзыв';
$string['formataggregatedgrade'] = '{$a->grade}';
$string['formataggregatedgradeover'] = '<del>{$a->grade}</del><br /><ins>{$a->over}</ins>';
$string['formatpeergrade'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span>';
$string['formatpeergradeover'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span>';
$string['formatpeergradeoverweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span> @ <span class="weight">{$a->weight}</span>';
$string['formatpeergradeweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span> @ <span class="weight">{$a->weight}</span>';
$string['givengrades'] = 'Данные оценки';
$string['gradecalculated'] = 'Вычисленная оценка за работу';
$string['gradedecimals'] = 'Десятичных знаков в оценках';
$string['gradegivento'] = '&gt;';
$string['gradeinfo'] = 'Оценка: {$a->received} из {$a->max}';
$string['gradeitemassessment'] = '{$a->workshopname} (оценка)';
$string['gradeitemsubmission'] = '{$a->workshopname} (работа)';
$string['gradeover'] = 'Переопределить оценку за работу';
$string['gradereceivedfrom'] = '&lt;';
$string['gradesreport'] = 'Отчет об оценках семинара';
$string['gradinggrade'] = 'Оценка за оценивание';
$string['gradinggradecalculated'] = 'Вычисленная оценка за оценивание';
$string['gradinggrade_help'] = 'Этот параметр определяет максимальную оценку, которая может быть получена за оценивание работы.';
$string['gradinggradeof'] = 'Баллы за оценивание (из {$a})';
$string['gradinggradeover'] = 'Переопределить баллы за оценивание';
$string['gradingsettings'] = 'Параметры оценивания';
$string['groupnoallowed'] = 'Вы не можете получить доступ к любой группе в этом семинаре';
$string['iamsure'] = 'Да, я уверен(а)';
$string['info'] = 'Информация';
$string['instructauthors'] = 'Инструкции для работы';
$string['instructreviewers'] = 'Инструкции по оценке';
$string['introduction'] = 'Введение';
$string['latesubmissions'] = 'Работы, отправленные с опозданием';
$string['latesubmissionsallowed'] = 'Разрешить работы, отправленные с опозданием';
$string['latesubmissions_desc'] = 'Разрешить представление работ после крайнего срока';
$string['latesubmissions_help'] = 'Если параметр включен, то автор может представить свою работу после истечения срока представления или в фазе оценки. Работы, отправленные с опозданием, уже нельзя будет изменить.';
$string['maxbytes'] = 'Максимальный размер вложенного файла';
$string['modulename'] = 'Семинар';
$string['modulename_help'] = 'Модуль «Семинар» позволяет накапливать, просматривать, рецензировать и взаимно оценивать студенческие работы.

Студенты могут представлять свою работу в виде любых файлов, например, документы Word и электронные таблицы, а также могут вводить текст непосредственно в поле с помощью текстового редактора.

Материалы оцениваются с использованием нескольких критериев формы оценки, заданной преподавателем. Процесс оценки сокурсников и понимание формы оценки может быть осуществлено заранее с примером материалов, представленных преподавателем, вместе со ссылкой для оценивания. Студентам предоставляется возможность оценить одно или несколько представлений своих сокурсников. Представляемые работы и рецензии могут быть анонимными, если требуется.

Студенты получают две оценки за семинар - оценку за свою работу и баллы за свою оценку работ своих сокурсников. Оба типа записываются в журнал оценок.';
$string['modulenameplural'] = 'Семинары';
$string['mysubmission'] = 'Моя работа';
$string['nattachments'] = 'Максимальное количество приложений к работе';
$string['noexamples'] = 'В этом семинаре еще нет примеров';
$string['noexamplesformready'] = 'Вы должны определить форму оценки, прежде чем предоставлять пример работы';
$string['nogradeyet'] = 'Еще не оценено';
$string['nosubmissionfound'] = 'Не найдено работ этого пользователя';
$string['nosubmissions'] = 'На этом семинаре еще не представлено ни одной работы';
$string['notassessed'] = 'Еще не оцененные';
$string['nothingtoreview'] = 'Нечего рассматривать';
$string['notoverridden'] = 'Не переопределено';
$string['noworkshops'] = 'В этом курсе нет семинаров';
$string['noyoursubmission'] = 'Вы еще не отправили свою работу';
$string['nullgrade'] = '-';
$string['overallfeedback'] = 'Общий отзыв';
$string['overallfeedbackfiles'] = 'Максимальное количество вложений общего отзыва';
$string['overallfeedbackmaxbytes'] = 'Максимальный размер файла';
$string['overallfeedbackmode'] = 'Режим общего отзыва';
$string['overallfeedbackmode_0'] = 'Отключен';
$string['overallfeedbackmode_1'] = 'Включен (дополнительный)';
$string['overallfeedbackmode_2'] = 'Включен (обязательный)';
$string['overallfeedbackmode_help'] = 'При включенном параметре внизу формы оценивания отображается текстовое поле. Там рецензенты могут написать общий отзыв к работе или предоставить дополнительные пояснения своей оценки.';
$string['page-mod-workshop-x'] = 'Любая страница модуля Семинар';
$string['participant'] = 'Участник';
$string['participantrevierof'] = 'Рецензируемые участником:';
$string['participantreviewedby'] = 'Рецензенты участника:';
$string['phaseassessment'] = 'Фаза оценивания';
$string['phaseclosed'] = 'Закрыто';
$string['phaseevaluation'] = 'Фаза оценивания оценок';
$string['phasesetup'] = 'Фаза настройки';
$string['phasesoverlap'] = 'Фаза представления и фаза оценки не могут перекрываться';
$string['phasesubmission'] = 'Фаза представления работ';
$string['pluginadministration'] = 'Управление семинаром';
$string['pluginname'] = 'Семинар';
$string['prepareexamples'] = 'Подготовить примеры работ';
$string['previewassessmentform'] = 'Предварительный просмотр';
$string['publishedsubmissions'] = 'Опубликованные работы';
$string['publishsubmission'] = 'Публикация работы';
$string['publishsubmission_help'] = 'Опубликованные работы доступны другим после завершения семинара.';
$string['reassess'] = 'Переоценить';
$string['receivedgrades'] = 'Полученные оценки';
$string['recentassessments'] = 'Оценки семинара:';
$string['recentsubmissions'] = 'Работы семинара:';
$string['saveandclose'] = 'Сохранить и закрыть';
$string['saveandcontinue'] = 'Сохранить и продолжить редактирование';
$string['saveandpreview'] = 'Сохранить и посмотреть';
$string['saveandshownext'] = 'Сохранить и показать следующее';
$string['selfassessmentdisabled'] = 'Самооценка отключена';
$string['showingperpage'] = 'Элементов на странице - {$a}';
$string['showingperpagechange'] = 'Изменить ...';
$string['someuserswosubmission'] = 'Есть по меньшей мере один автор, который еще не представил свою работу';
$string['sortasc'] = 'Сортировать по возрастанию';
$string['sortdesc'] = 'Сортировать по убыванию';
$string['strategy'] = 'Стратегия оценивания';
$string['strategyhaschanged'] = 'Стратегия оценивания семинара изменилась, так как форма была открыта для редактирования.';
$string['strategy_help'] = 'Стратегия оценки определяет используемую форму оценивания и методы оценивания работ.
Есть 4 варианта:

* Совокупная оценка - оценивается и комментируется соответствие заданным критериям
* Комментарии - комментируется соответствие заданным критериям, но оценка не может быть выставлена
* Количество ошибок - комментируется и оценивается (да/нет) соответствие заданным утверждениям
* Рубрика - оценивается соответствие одному заданному критерию';
$string['submission'] = 'Работа';
$string['submissionattachment'] = 'Приложение';
$string['submissionby'] = 'Работа {$a}';
$string['submissioncontent'] = 'Содержимое работы';
$string['submissionend'] = 'Конец представления работ';
$string['submissionendbeforestart'] = 'Окончание срока подачи работ не может быть установлено ранее даты начала.';
$string['submissionenddatetime'] = 'Конец представления работ: {$a->daydatetime} ({$a->distanceday})';
$string['submissionendevent'] = '{$a} (Окончание срока подачи работ)';
$string['submissionendswitch'] = 'Переключить на следующий этап после истечения срока подачи работ.';
$string['submissionendswitch_help'] = 'Если задано окончание срока подачи работ и установлен этот флажок, то семинар будет автоматически переключаться на этап оценивания после истечения срока подачи работ.

Если эта функция включена, то также рекомендуется задать метод планируемого распределения. Если работы не распределяются, то оценивание не может быть проведено, даже если сам семинар находится в стадии оценивания.';
$string['submissiongrade'] = 'Оценка за работу';
$string['submissiongrade_help'] = 'Этот параметр определяет максимальную оценку, которая может быть получена за представленные работы.';
$string['submissiongradeof'] = 'Оценка за работу (из {$a})';
$string['submissionsettings'] = 'Параметры работы';
$string['submissionstart'] = 'Начало представления работ';
$string['submissionstartdatetime'] = 'Начало представления работ: {$a->daydatetime} ({$a->distanceday})';
$string['submissionstartevent'] = '{$a} (открывается для представлений)';
$string['submissiontitle'] = 'Название';
$string['subplugintype_workshopallocation'] = 'Метод распределения работ';
$string['subplugintype_workshopallocation_plural'] = 'Методы распределения работ';
$string['subplugintype_workshopeval'] = 'Метод выставления баллов за оценивание';
$string['subplugintype_workshopeval_plural'] = 'Методы выставления баллов за оценивание';
$string['subplugintype_workshopform'] = 'Стратегия оценивания';
$string['subplugintype_workshopform_plural'] = 'Стратегии оценивания';
$string['switchingphase'] = 'Переключение фазы';
$string['switchphase'] = 'Переключить фазу';
$string['switchphase10info'] = 'Вы собираетесь переключить семинар в фазу <strong> «Настройка»</strong>. В этой фазе пользователи не могут изменять свои работы или оценки работ. Преподаватели могут использовать эту фазу для изменения настроек семинара, изменения стратегии оценивания и корректировки формы оценивания.';
$string['switchphase20info'] = 'Вы собираетесь переключить семинар в фазу <strong> «Представление»</strong>. В этой фазе студенты могут представить свои работы (в течение срока для представления, если он задан). Преподаватели могут распределять работы для рецензирования сокурсниками.';
$string['switchphase30auto'] = 'После {$a->daydatetime} ({$a->distanceday}) семинар будет автоматически переключаться в фазу оценивания';
$string['switchphase30info'] = 'Вы собираетесь переключить семинар в фазу<strong> «Оценивание»</strong>. В этой фазе рецензенты могут оценивать представленные работы (в течение срока для оценки, если он задан).';
$string['switchphase40info'] = 'Вы собираетесь переключить семинар в фазу <strong> «Оценивание оценок»</strong>. В этой фазе пользователи не могут изменять свои работы и оценки работ. Преподаватели могут использовать инструменты оценивания оценок для расчета итоговых оценок и предоставлять отзывы для рецензентов.';
$string['switchphase50info'] = 'Вы собираетесь закрыть семинар. Это приведет к появлению вычисленных оценок в журнале оценок. Студенты смогут просматривать свои работы и их оценки.';
$string['taskassesspeers'] = 'Оценки сокурсников';
$string['taskassesspeersdetails'] = 'итог: {$a->total}<br />ожидается: {$a->todo}';
$string['taskassessself'] = 'Самооценка';
$string['taskconclusion'] = 'Написать заключение для семинара';
$string['taskinstructauthors'] = 'Предоставить инструкции для работы';
$string['taskinstructreviewers'] = 'Предоставить инструкции по оцениванию';
$string['taskintro'] = 'Задать введение для семинара';
$string['tasksubmit'] = 'Отправить работу';
$string['toolbox'] = 'Инструменты семинара';
$string['undersetup'] = 'В настоящее время семинар настраивается. Пожалуйста, подождите, пока он перейдет в следующую фазу.';
$string['useexamples'] = 'Использовать примеры';
$string['useexamples_desc'] = 'Для тренировки в оценивании предоставляются примеры работ.';
$string['useexamples_help'] = 'Если параметр включен, то пользователи могут попробовать оценить один или несколько представленных примеров и сравнить свои оценки с рекомендуемыми оценками. Эти оценки не учитываются в оценке за оценивание.';
$string['usepeerassessment'] = 'Использовать оценки сокурсников';
$string['usepeerassessment_desc'] = 'Студенты могут оценивать другие работы';
$string['usepeerassessment_help'] = 'Если параметр включен, то пользователь может оценить работы, представленные другими сокурсниками, и получит баллы за оценивание в дополнение к оценке за собственную работу.';
$string['userdatecreated'] = 'представлено: <span>{$a}</span>';
$string['userdatemodified'] = 'изменено: <span>{$a}</span>';
$string['userplan'] = 'План семинара';
$string['userplan_help'] = 'План семинара отображает все его фазы и списки задач для каждой фазы. Текущая фаза будет выделена и завершенные задачи помечены галочкой.';
$string['useselfassessment'] = 'Использовать самооценки';
$string['useselfassessment_desc'] = 'Студенты могут оценивать свою собственную работу';
$string['useselfassessment_help'] = 'Если параметр включен, то
пользователь может оценить собственную работу и получит баллы за оценивание в дополнение к оценке за свою работу.';
$string['weightinfo'] = 'Вес: {$a}';
$string['withoutsubmission'] = 'Рецензент без собственной работы';
$string['workshop:addinstance'] = 'Добавлять новый семинар';
$string['workshop:allocate'] = 'Размещать работы для рассмотрения';
$string['workshop:editdimensions'] = 'Редактировать форму оценки';
$string['workshop:ignoredeadlines'] = 'Игнорировать ограничения по времени';
$string['workshop:manageexamples'] = 'Управлять примером работы';
$string['workshopname'] = 'Название семинара';
$string['workshop:overridegrades'] = 'Переопределять вычисленные оценки';
$string['workshop:peerassess'] = 'Оценивать сокурсников';
$string['workshop:publishsubmissions'] = 'Публиковать работы';
$string['workshop:submit'] = 'Представлять';
$string['workshop:switchphase'] = 'Переключать фазы';
$string['workshop:view'] = 'Просматривать семинар';
$string['workshop:viewallassessments'] = 'Просматривать все оценки';
$string['workshop:viewallsubmissions'] = 'Просматривать все работы';
$string['workshop:viewauthornames'] = 'Просматривать имена авторов';
$string['workshop:viewauthorpublished'] = 'Просматривать авторов опубликованных работ';
$string['workshop:viewpublishedsubmissions'] = 'Просматривать опубликованные работы';
$string['workshop:viewreviewernames'] = 'Просматривать имена рецензентов';
$string['yourassessment'] = 'Ваша оценка';
$string['yourgrades'] = 'Ваши оценки';
$string['yoursubmission'] = 'Ваша работа';
