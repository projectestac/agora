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
 * Strings for component 'question', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   question
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Действие';
$string['addanotherhint'] = 'Добавить еще подсказку';
$string['addcategory'] = 'Добавить категорию';
$string['addmorechoiceblanks'] = 'Добавить {no} варианта(ов) ответа(ов)';
$string['adminreport'] = 'Сообщение о возможных проблемах в базе данных ваших вопросов';
$string['answer'] = 'Ответ';
$string['answers'] = 'Ответы';
$string['answersaved'] = 'Ответ сохранен';
$string['attemptfinished'] = 'Попытка завершена';
$string['attemptfinishedsubmitting'] = 'Попытка завершена и передана для оценки';
$string['attemptoptions'] = 'Настройки попытки';
$string['availableq'] = 'Доступно?';
$string['badbase'] = 'Некорректное основание перед знаком **: {$a}**';
$string['behaviour'] = 'Режим';
$string['behaviourbeingused'] = 'Используемый режим: {$a}';
$string['broken'] = 'Это «неработающая ссылка», она указывает на несуществующий файл.';
$string['byandon'] = '<em>{$a->user}</em>, <em>{$a->time}</em>';
$string['cannotcopybackup'] = 'Невозможно скопировать резервный файл';
$string['cannotcreate'] = 'Невозможно создать новую запись в таблице question_attempts';
$string['cannotcreatepath'] = 'Невозможно создать папку {$a}';
$string['cannotdeletebehaviourinuse'] = 'Вы не можете удалить режим «{$a}», так как он используется попытками вопроса.';
$string['cannotdeletecate'] = 'Вы не можете удалить эту категорию - это категория по умолчанию для данного контекста.';
$string['cannotdeleteneededbehaviour'] = 'Невозможно удалить режим вопроса «{$a}», так как есть другие режимы, зависящие от него.';
$string['cannotdeleteqtypeinuse'] = 'Вы не можете удалить тип вопроса «{$a}». Вопросы этого типа есть в банке вопросов.';
$string['cannotdeleteqtypeneeded'] = 'Вы не можете удалить тип вопроса «{$a}», так как есть другие типы вопросов, зависящие от него.';
$string['cannotenable'] = 'Нельзя напрямую создать вопрос типа «{$a}».';
$string['cannotenablebehaviour'] = 'Режим вопроса «{$a}» не может использоваться напрямую. Он только для внутреннего использования.';
$string['cannotfindcate'] = 'Не удалось найти запись для  категории';
$string['cannotfindquestionfile'] = 'Не удалось найти данные вопроса в ZIP-файле';
$string['cannotgetdsfordependent'] = 'Не удалось получить указанный набор данных для зависимого вопроса!
(Вопрос: {$a->id}, элемент набора данных: {$a->item})';
$string['cannotgetdsforquestion'] = 'Не удалось получить указанный набор данных для вычисляемого вопроса!
(Вопрос: {$a})';
$string['cannothidequestion'] = 'Не удалось скрыть вопрос';
$string['cannotimportformat'] = 'К сожалению, импорт этого формата еще не реализован!';
$string['cannotinsertquestion'] = 'Не удалось вставить новый вопрос!';
$string['cannotinsertquestioncatecontext'] = 'Не удалось вставить новую категорию вопросов {$a->cat}. Неверный contextid {$a->ctx}';
$string['cannotloadquestion'] = 'Не удается загрузить вопрос';
$string['cannotmovequestion'] = 'Этот скрипт не предназначен для переноса вопросов, с которыми связаны файлы из разных областей.';
$string['cannotopenforwriting'] = 'Невозможно открыть для записи:
{$a}';
$string['cannotpreview'] = 'Вы не можете просмотреть эти вопросы!';
$string['cannotread'] = 'Не удалось импортировать файл (или файл пуст)';
$string['cannotretrieveqcat'] = 'Невозможно получить категорию для вопроса';
$string['cannotunhidequestion'] = 'Не удалось сделать вопрос видимым.';
$string['cannotunzip'] = 'Невозможно распаковать файл.';
$string['cannotwriteto'] = 'Невозможно записать экспортированные вопросы в {$a}';
$string['category'] = 'Категория';
$string['categorycurrent'] = 'Текущая категория';
$string['categorycurrentuse'] = 'Использовать эту категорию';
$string['categorydoesnotexist'] = 'Эта категория не существует';
$string['categoryinfo'] = 'Информация о категории';
$string['categorymove'] = 'Категория «{$a->name}» содержит вопросы {$a->count} (некоторые из них могут быть старыми - скрытыми вопросами, которые все еще используется в некоторых имеющихся тестах). <br /> Выберите другую категорию, в которую они будут перемещены.';
$string['categorymoveto'] = 'Сохранить в категории';
$string['categorynamecantbeblank'] = 'Имя категории не должно быть пустым';
$string['changeoptions'] = 'Изменить параметры';
$string['changepublishstatuscat'] = 'Для категории <a href="{$a->caturl}">«{$a->name}»</a> в курсе «{$a->coursename}» будет изменен статус совместного использования со значения <strong>{$a->changefrom}</strong> на <strong>{$a->changeto}</strong>.';
$string['check'] = 'Проверить';
$string['chooseqtypetoadd'] = 'Выберите тип вопроса для добавления';
$string['clearwrongparts'] = 'Удалить некорректные ответы';
$string['clickflag'] = 'Отметить вопрос';
$string['clicktoflag'] = 'Отметить этот вопрос флажком, чтобы не забыть о нём';
$string['clicktounflag'] = 'Снять флажок';
$string['clickunflag'] = 'Снять флажок';
$string['closepreview'] = 'Закрыть предварительный просмотр';
$string['combinedfeedback'] = 'Комбинированный отзыв';
$string['comment'] = 'Комментарий';
$string['commented'] = 'Прокомментировано: {$a}';
$string['commentormark'] = 'Оставить комментарий или переопределить оценку';
$string['comments'] = 'Комментарии';
$string['commentx'] = 'Комментарий: {$a}';
$string['complete'] = 'Выполнен';
$string['contexterror'] = 'Вы должны были попасть сюда, только  том случае, если переносите категорию вопросов в другой контекст.';
$string['copy'] = 'Скопировать из {$a} и изменить ссылки';
$string['correct'] = 'Верно';
$string['correctfeedback'] = 'Для любого правильного ответа';
$string['correctfeedbackdefault'] = 'Ваш ответ верный.';
$string['created'] = 'Создано';
$string['createdby'] = 'Создано:';
$string['createdmodifiedheader'] = 'Создано/сохранено';
$string['createnewquestion'] = 'Создать новый вопрос...';
$string['cwrqpfs'] = 'Выбор случайного вопроса из подкатегорий';
$string['cwrqpfsinfo'] = '<p>Во время обновления до Moodle 1.9 мы будем разделять категории вопросов по разным контекстам. Некоторые категории и вопросы на Вашем сайте могут изменить свой статус разделения.
Это необходимо в редких случаях, когда один или более «случайных» вопросов в тесте установлены так, чтобы выбрать из смеси опубликованных и неопубликованных категорий (как происходит на этом сайте). Это бывает, когда «случайный» вопрос выбирается из подкатегорий и одна или более подкатегорий имеют другой статус разделения к родительской категории, в которой создан случайный вопрос. </p>
<p> Категории вопросов, в которых «случайные» вопросы выбраны из родительских категорий, будут иметь такой же статус разделения как категория со «случайным» вопросом при модернизации к Moodle 1.9. Последующие категории будут иметь свой измененный статус разделения. Вопросы, которые затронуты, продолжат работать во всех существующих тестах, пока Вы не удалите их из этих тестов. </p>';
$string['cwrqpfsnoprob'] = 'На вашем сайте нет категорий вопросов, подверженных ситуации, когда вопросы случайно выбираются из подкатегорий.';
$string['decimalplacesingrades'] = 'Количество знаков после запятой в оценке';
$string['defaultfor'] = 'По умолчанию для {$a}';
$string['defaultinfofor'] = 'Категория по умолчанию для общих вопросов в контексте «{$a}».';
$string['defaultmark'] = 'Балл по умолчанию';
$string['defaultmarkmustbepositive'] = 'По умолчанию оценка должна быть положительной.';
$string['deletecoursecategorywithquestions'] = 'Вопросы в банке вопросов связаны с этой категорией курса. При продолжении они будут удалены. Перед этим Вы можете переместить их, используя интерфейс банка вопросов.';
$string['deletequestioncheck'] = 'Вы уверены, что хотите удалить «{$a}»?';
$string['deletequestionscheck'] = 'Вы уверены, что хотите удалить следующие вопросы? <br /> <br /> {$a}
';
$string['deletingbehaviour'] = 'Удаление режима вопроса «{$a}»';
$string['deletingqtype'] = 'Удаление типа вопроса «{$a}»';
$string['didnotmatchanyanswer'] = '[Не соответствует ни один ответ]';
$string['disabled'] = 'Отключено';
$string['displayoptions'] = 'Настройки отображения';
$string['disterror'] = 'Возникли проблемы с распределением типа {$a}';
$string['donothing'] = 'Не копировать и не перемещать файлы и не менять ссылки.';
$string['editcategories'] = 'Редактировать категории';
$string['editcategories_help'] = 'Вместо того, чтобы держать все вопросы в одном большом списке, их можно распределить по категориям и подкатегориям.

Каждая категория принадлежит определенному контексту, от чего зависит, где именно могут использоваться вопросы:

* Контекст элемента курса - вопросы доступны только рамках модуля элемента курса (например, теста).
* Контекст курса - вопросы доступны во всех элементах этого курса.
* Контекст категории курсов - вопросы доступны во всех элементах категории курсов и во всех курсах этой категории.
* Контекст системы - вопросы доступны во всех курсах и элементах курсов на этом сайте.

Распределение вопросов по категориям также необходимо для выбора вопросов случайным образом - вопросы выбираются случайным образом из определенной категории.';
$string['editcategory'] = 'Редактировать категорию';
$string['editingcategory'] = 'Редактирование категории';
$string['editingquestion'] = 'Редактирование вопроса';
$string['editquestion'] = 'Редактировать вопрос';
$string['editquestions'] = 'Редактировать вопросы';
$string['editthiscategory'] = 'Редактирование категории';
$string['emptyxml'] = 'Неизвестная ошибка - пустой файл imsmanifest.xml';
$string['enabled'] = 'Включено';
$string['erroraccessingcontext'] = 'Нет доступа к контексту';
$string['errordeletingquestionsfromcategory'] = 'Ошибка удаления вопросов из категории {$a}';
$string['errorduringpost'] = 'Возникла ошибка при заключительной обработке!';
$string['errorduringpre'] = 'Возникла ошибка при предварительной обработке!';
$string['errorduringproc'] = 'Возникла ошибка при обработке!';
$string['errorduringregrade'] = 'Не удалось переоценить вопрос {$a->qid}, возвращено в состояние {$a->stateid}.';
$string['errorfilecannotbecopied'] = 'Ошибка: невозможно скопировать файл {$a}.';
$string['errorfilecannotbemoved'] = 'Ошибка: невозможно переместить файл {$a}.';
$string['errorfileschanged'] = 'Ошибка: файлы, на которые ссылается вопрос, были изменены после отображения формы.';
$string['errormanualgradeoutofrange'] = 'Для вопроса «{$a->name}» оценка {$a->grade} не попадает в диапазон от 0 до {$a->maxgrade} .
Оценка и комментарий не были сохранены.';
$string['errormovingquestions'] = 'Ошибка при перемещении вопросов со следующими ID: {$a}.';
$string['errorpostprocess'] = 'Возникла ошибка при заключительной обработке!';
$string['errorpreprocess'] = 'Возникла ошибка при предварительной обработке!';
$string['errorprocess'] = 'Возникла ошибка при обработке!';
$string['errorprocessingresponses'] = 'Возникла ошибка при обработке Ваших ответов ({$a}). Нажмите Далее, чтобы вернуться на предыдущую страницу, и попробуйте еще раз.';
$string['errorsavingcomment'] = 'Ошибка при сохранении в базе данных комментария к вопросу «{$a->name}».';
$string['errorsavingflags'] = 'При сохранении состояния флажка возникла ошибка.';
$string['errorupdatingattempt'] = 'Ошибка при обновлении в базе данных попытки {$a->id}.';
$string['exportcategory'] = 'Экспортировать категорию';
$string['exportcategory_help'] = 'Этот параметр определяет категории, из которых будут экспортироваться вопросы.

Некоторые форматы импорта (GIFT и Moodle XML) позволяют включить в файл экспорта категорию и контекст, давая возможность (при желании) воссоздать их при импорте. Для этого необходимо отметить соответствующие поля.';
$string['exporterror'] = 'При экспорте возникли ошибки!';
$string['exportfilename'] = 'вопросы';
$string['exportnameformat'] = '%Y%m%d-%H%M';
$string['exportquestions'] = 'Экспорт вопросов в файл';
$string['exportquestions_help'] = 'Эта функция позволяет экспортировать в текстовый файл вопросы всей категории (и любых ее подкатегорий).

Учтите, что в зависимости от выбранного формата файла часть информации вопросов и некоторые типы вопросов не могут быть экспортированы.';
$string['feedback'] = 'Отзыв';
$string['filecantmovefrom'] = 'Файлы вопросов не могут быть перемещены, потому что Вы не имеете права на удаление файлов из места, из которого Вы пытаетесь переместить вопросы.';
$string['filecantmoveto'] = 'Файлы вопросов не могут быть перемещены или скопированы, потому что у Вас нет права на добавление файлов в место, где Вы пытаетесь создать новые вопросы.';
$string['fileformat'] = 'Формат файла';
$string['filesareacourse'] = 'область файлов курса';
$string['filesareasite'] = 'область файлов сайта';
$string['filestomove'] = 'Переместить/скопировать файлы в {$a}?';
$string['fillincorrect'] = 'Отобразить правильные ответы';
$string['flagged'] = 'Отмечено';
$string['flagthisquestion'] = 'Отметить этот вопрос';
$string['formquestionnotinids'] = 'Форма содержит вопрос, который не находится в questionids (не имеет ID)';
$string['fractionsnomax'] = 'Один из вариантов ответа должен быть полностью правильным, т.е. иметь оценку 100%.';
$string['generalfeedback'] = 'Общий отзыв к вопросу';
$string['generalfeedback_help'] = 'Общий отзыв отображается студенту после того, как он попытался ответить на вопрос. В отличие от конкретного отзыва, который зависит от типа вопроса и ответа, данного студентом, всем студентам отображается одинаковый текст общего отзыва.

Вы можете использовать общий отзыв, чтобы показать студентам правильный ответ и, возможно, ссылку на дополнительную информацию, которую они могут использовать для понимания вопроса.';
$string['getcategoryfromfile'] = 'Получить категории из файла';
$string['getcontextfromfile'] = 'Получить контекст из файла';
$string['hidden'] = 'Скрыть';
$string['hintn'] = 'Подсказка {no}';
$string['hintnoptions'] = 'Варианты подсказок {no}';
$string['hinttext'] = 'Текст подсказки';
$string['howquestionsbehave'] = 'Какой режим вопросов';
$string['howquestionsbehave_help'] = 'Студенты могут взаимодействовать с вопросами теста разными отличающимися способами.

Например, студенты должны дать ответ на каждый вопрос без получения оценки и отзыва, а затем они увидят результаты всего теста. Это будет режим «Отложенного отзыва».

И, альтернативно, студенты, ответив на каждый вопрос, сразу получают отзыв и, если они с первого раза ответили неверно, то сразу получают право на повторную попытку с возможность получения меньшей оценки. Это режим «Интерактивный с несколькими попытками».

Это, пожалуй, два наиболее часто используемых режимов поведения вопросов.';
$string['ignorebroken'] = 'Игнорировать битые ссылки';
$string['importcategory'] = 'Категория для импорта';
$string['importcategory_help'] = 'Этот параметр определяет категорию, в которую будут импортированы вопросы.

Файлы некоторых форматов, например GIFT и Moodle XML, могут содержать информация о категории и контексте вопросов. Чтобы использовать эти значения, а не указанную категорию, отметьте соответствующие поля. Если категории, указанные в импортируемом файле не существуют, то они будут созданы.';
$string['importerror'] = 'При импорте возникла ошибка';
$string['importerrorquestion'] = 'Ошибка при импорте вопроса';
$string['importfromcoursefiles'] = '... или выберите для импорта файл курса.';
$string['importfromupload'] = 'Выберите файл для загрузки ...';
$string['importingquestions'] = 'Импортировано вопросов из файла - {$a}';
$string['importparseerror'] = 'При анализе файла импорта найдены ошибки. Ни один вопрос не был импортирован. Для импорта вопросов установите в параметре «Остановка при ошибке» вариант «Нет» и повторите попытку.';
$string['importquestions'] = 'Импорт вопросов из файла';
$string['importquestions_help'] = 'Эта функция позволяет импортировать вопросы разных форматов из текстового файла. Обратите внимание, что файл должен быть в кодировке UTF-8.';
$string['importwrongfiletype'] = 'Формат выбранного файла ({$a->actualtype}) не соответствует указанному типу формата импорта ({$a->expectedtype}).';
$string['impossiblechar'] = 'Недопустимый символ {$a}  используется в качестве скобок.';
$string['includesubcategories'] = 'Отображать вопросы, находящиеся и в подкатегориях';
$string['incorrect'] = 'Неверно';
$string['incorrectfeedback'] = 'На любой неправильный ответ';
$string['incorrectfeedbackdefault'] = 'Ваш ответ неправильный.';
$string['information'] = 'Информация';
$string['invalidanswer'] = 'Неполный ответ';
$string['invalidarg'] = 'Указаны некорректные аргументы или неправильно сконфигурирован сервер.';
$string['invalidcategoryidforparent'] = 'Недопустимый ID родительской категории!';
$string['invalidcategoryidtomove'] = 'Недопустимый ID категории для перемещения!';
$string['invalidconfirm'] = 'Некорректная строка подтверждения';
$string['invalidcontextinhasanyquestions'] = 'Функции question_context_has_any_questions передан некорректный контекст';
$string['invalidgrade'] = 'Оценки не подходят к опциям оценивания - вопрос пропущен';
$string['invalidpenalty'] = 'Недопустимый штраф';
$string['invalidwizardpage'] = 'Указана некорректная страница мастера!';
$string['lastmodifiedby'] = 'Последнее изменение:';
$string['linkedfiledoesntexist'] = 'Связанный файл {$a} не существует';
$string['makechildof'] = 'Сделать подкатегорией «{$a}»';
$string['makecopy'] = 'Сделать копию вопроса';
$string['maketoplevelitem'] = 'Переместить на верхний уровень';
$string['manualgradeoutofrange'] = 'Оценка вне допустимого диапазона';
$string['manuallygraded'] = 'Оценено вручную на {$a->mark} со следующим комментарием: {$a->comment}';
$string['mark'] = 'Оценка';
$string['markedoutof'] = 'Балл';
$string['markedoutofmax'] = 'Балл: {$a}';
$string['markoutofmax'] = 'Баллов: {$a->mark} от максимума {$a->max}';
$string['marks'] = 'Оценки';
$string['matchgrades'] = 'Сопоставление оценок';
$string['matchgradeserror'] = 'Если оценки нет в списке, выводить сообщение об ошибке';
$string['matchgrades_help'] = 'Импортируемые оценки должны совпадать с одной допустимой оценкой из фиксированного списка - 100; 90; 80; 75; 70; 66.666; 60; 50; 40; 33.333; 30; 25; 20; 16.666; 14.2857; 12.5; 11.111; 10; 5; 0 (и такие же отрицательные значения). Если оценка не соответствует ни одному из вариантов в списке, то возможно два варианта действия:

* Если оценки нет в списке, выводить сообщение об ошибке - если вопрос содержит любую оценку, не перечисленную в списке, то выводится сообщение об ошибке и вопрос не импортируется.
* Если оценки нет в списке, выбирать ближайшую - если оценка не соответствует ни одному из значений в списке, то она заменяется на наиболее близкую из списка.';
$string['matchgradesnearest'] = 'Если оценки нет в списке, выбирать ближайшую';
$string['missingcourseorcmid'] = 'Для функции print_question необходимо указать courseid или cmid.';
$string['missingcourseorcmidtolink'] = 'Для функции get_question_edit_link указать courseid или cmid.';
$string['missingimportantcode'] = 'В типе вопроса отсутствует важный код: {$a}';
$string['missingoption'] = 'В вопросе типа «Вложенные ответы (cloze)» {$a} пропущены параметры.';
$string['modified'] = 'Последнее сохранение:';
$string['move'] = 'Переместить из {$a} и изменить ссылки';
$string['movecategory'] = 'Переместить категорию';
$string['movedquestionsandcategories'] = 'Переместить вопросы и их категории из {$a->oldplace} в {$a->newplace}.';
$string['movelinksonly'] = 'Просто поменять ссылки, не перемещая или копируя файлы';
$string['moveq'] = 'Переместить вопрос(ы)';
$string['moveqtoanothercontext'] = 'Переместить вопрос в другой контекст';
$string['moveto'] = 'Переместить в >>';
$string['movingcategory'] = 'Перемещение категории';
$string['movingcategoryandfiles'] = 'Вы действительно хотите переместить категорию «{$a->name}» и все дочерние категории в контекст «{$a->contextto}»? <br /> В области «{$a->fromareaname}» обнаружено файлов, связанных с вопросами - {$a->urlcount}. Вы хотите скопировать или переместить их в область «{$a->toareaname}»?';
$string['movingcategorynofiles'] = 'Вы действительно хотите переместить категорию «{$a->name}» и все дочерние категории в контекст «{$a->contextto}»?';
$string['movingquestions'] = 'Перемещение вопросов и любых файлов';
$string['movingquestionsandfiles'] = 'Вы действительно хотите переместить вопрос(ы) {$a->questions} в контекст <strong>«{$a->tocontext}»</strong>?<br /> В области «{$a->fromareaname}» обнаружено файлов, связанных с этим(и) вопросом(ами) - <strong>{$a->urlcount}</strong>. Вы хотите скопировать или переместить их в область «{$a->toareaname}»?';
$string['movingquestionsnofiles'] = 'Вы действительно хотите переместить вопрос(ы) {$a->questions} в контекст <strong>«{$a->tocontext}»</strong>?<br />В области «{$a->fromareaname}» нет файлов, связанных с этим(и) вопросом(ами).';
$string['needtochoosecat'] = 'Выберите категорию, в которую необходимо перенести этот вопрос или нажмите «Отмена».';
$string['nocate'] = 'Нет такой категории «{$a}»!';
$string['nopermissionadd'] = 'У Вас нет прав для добавления сюда вопросов.';
$string['nopermissionmove'] = 'У Вас нет права на перемещение  вопросов отсюда. Вы должны сохранить вопрос в этой категории, либо сохранить его как новый вопрос.';
$string['noprobs'] = 'В Вашей базе вопросов проблем не найдено';
$string['noquestions'] = 'Не найдены вопросы, которые могут быть экспортированы. Убедитесь, что для экспорта Вы выбрали категорию, которая содержит вопросы.';
$string['noquestionsinfile'] = 'В импортируемом файле нет вопросов';
$string['noresponse'] = 'Без ответа';
$string['notanswered'] = 'Нет ответа';
$string['notchanged'] = 'Не изменилось с последней попытки';
$string['notenoughanswers'] = 'Этот тип вопроса требует не менее {$a} ответов.';
$string['notenoughdatatoeditaquestion'] = 'Не указаны ни ID вопроса, ни ID категории и тип вопроса.';
$string['notenoughdatatomovequestions'] = 'Вы должны указать ID для вопросов, которые хотите переместить';
$string['notflagged'] = 'Не отмечено';
$string['notgraded'] = 'Не оценен';
$string['notshown'] = 'Не показывать';
$string['notyetanswered'] = 'Пока нет ответа';
$string['notyourpreview'] = 'Это не Ваш просмотр';
$string['novirtualquestiontype'] = 'Нет виртуального типа вопроса для для типа вопроса «{$a}»';
$string['numqas'] = 'Количество попыток вопроса(ов)';
$string['numquestions'] = 'Кол-во вопросов';
$string['numquestionsandhidden'] = '{$a->numquestions} (+{$a->numhidden} скрыто)';
$string['options'] = 'Параметры';
$string['orphanedquestionscategory'] = 'Вопросы, сохраненные из удаленных категорий';
$string['orphanedquestionscategoryinfo'] = 'Иногда (в основном, из-за ошибок программного обеспечения) вопросы могут оставаться в базе данных, хотя из соответствующей категории вопрос был удален. Из курса вопрос не удален, как было и раньше на этом сайте. Данная категория была создана автоматически и старые вопросы перемещены сюда, чтобы Вы могли управлять ими. Обратите внимание, что, вероятно, были потеряны любые изображения или медиа-файлы, используемые в этих вопросах.';
$string['page-question-category'] = 'Страница категорий вопросов';
$string['page-question-edit'] = 'Страница редактирования вопросов';
$string['page-question-export'] = 'Страница экспорта вопросов';
$string['page-question-import'] = 'Страница импорта вопросов';
$string['page-question-x'] = 'Любая страница вопросов';
$string['parent'] = 'Родитель (верхний уровень)';
$string['parentcategory'] = 'Родительская категория';
$string['parentcategory_help'] = 'Родительская категория, в которой будет размещена новая категория. «Верхний уровень» означает, что категория не будет содержаться ни в какой другой категории. Контексты категорий выделены жирным шрифтом. К каждом контексте должна быть по меньшей мере одна категория.';
$string['parenthesisinproperclose'] = 'Круглая скобка перед ** не закрыта в {$a} **';
$string['parenthesisinproperstart'] = 'Круглая скобка перед ** не открыта в {$a} **';
$string['parsingquestions'] = 'Получение вопросов из импортируемого файла';
$string['partiallycorrect'] = 'Частично правильный';
$string['partiallycorrectfeedback'] = 'На любой частично правильный ответ';
$string['partiallycorrectfeedbackdefault'] = 'Ваш ответ частично правильный.';
$string['penaltyfactor'] = 'Штраф';
$string['penaltyfactor_help'] = 'Этот параметр определяет, какая часть набранных баллов должна вычитаться за каждый  неправильный ответ на вопрос. Штрафы применяются, только если тест запущен в обучающем режиме.

Штраф должен быть числом в диапазоне от 0 до 1. Штраф = 1 означает, что студент должен ответить на данный вопрос с первого раза, чтобы получить за него баллы.
Штраф = 0 означает, что студент может отвечать на вопрос сколько захочет и при этом может получить максимальный балл.';
$string['penaltyforeachincorrecttry'] = 'Штраф за каждую неправильную попытку';
$string['penaltyforeachincorrecttry_help'] = 'Если Вы используете режим «Интерактивный с несколькими попытками» или «Обучающий режим», то студент будет иметь несколько попыток, чтобы правильно ответить на вопрос. Этот параметр определяет штраф за каждую неверную попытку.

Штраф - доля итоговой оценки вопроса, поэтому, если вопрос оценивается в три балла, а штраф равен 0.3333333, то студент получит 3 балла, если сразу правильно ответит на вопрос; 2 балла он получит при правильном ответе со второй попытки и 1 - при правильном ответе в третьей попытке.';
$string['permissionedit'] = 'Редактировать этот вопрос';
$string['permissionmove'] = 'Перемещать этот вопрос';
$string['permissionsaveasnew'] = 'Сохранять вопрос как новый';
$string['permissionto'] = 'У вас есть права:';
$string['previewquestion'] = 'Просмотр вопроса: {$a}';
$string['published'] = 'доступно';
$string['qtypeveryshort'] = 'Тип';
$string['questionaffected'] = '<a href="{$a->qurl}">Вопрос «{$a->name}» ({$a->qtype})</a> находится в этой категории вопросов, но также используется в <a href="{$a->qurl}"> тесте «{$a->quizname}»</a> в курсе «{$a->coursename}».';
$string['questionbank'] = 'Банк вопросов';
$string['questionbehaviouradminsetting'] = 'Настройки режима вопроса';
$string['questionbehavioursdisabled'] = 'Отключить режимы вопроса';
$string['questionbehavioursdisabledexplained'] = 'Введите через запятую список режимов, которые Вы хотите скрыть в выпадающем меню';
$string['questionbehavioursorder'] = 'Порядок режимов вопроса';
$string['questionbehavioursorderexplained'] = 'Введите через запятую список режимов в порядке, в котором Вы хотите их показать в выпадающем меню';
$string['questioncategory'] = 'Категория вопроса';
$string['questioncatsfor'] = 'Категории вопросов для «{$a}»';
$string['questiondoesnotexist'] = 'Вопрос не существует';
$string['questionidmismatch'] = 'Несоответствие идентификаторов вопроса';
$string['questionname'] = 'Название вопроса';
$string['questionno'] = 'Вопрос {$a}';
$string['questionpreviewdefaults'] = 'Настройки по умолчанию при предварительном просмотре вопроса';
$string['questionpreviewdefaults_desc'] = 'Эти значения по умолчанию используются, когда пользователь первый раз просматривает вопрос в банке вопросов. После того как пользователь предварительно просмотрел вопрос, его личные предпочтения хранятся в виде пользовательских настроек.';
$string['questions'] = 'Вопросы';
$string['questionsaveerror'] = 'При сохранении вопроса произошли ошибки - ({$a})';
$string['questionsinuse'] = '(* Вопросы, отмеченные знаком «*», уже используются в некоторых тестах. Эти вопросы будут удалены только из категории, но не из этих тестов.)';
$string['questionsmovedto'] = 'Всё еще использующиеся вопросы перемещены в «{$a}» в родительской категории курса.';
$string['questionsrescuedfrom'] = 'Вопросы, сохраненые из контекста «{$a}».';
$string['questionsrescuedfrominfo'] = 'Эти вопросы (некоторые из которых возможно скрыты) были сохранены при удалении контекста «{$a}», потому что они всё еще используются некоторыми тестами или другими элементами курсов.';
$string['questiontext'] = 'Текст вопроса';
$string['questiontype'] = 'Тип вопроса';
$string['questionuse'] = 'Использовать вопрос в этом элементе курса';
$string['questionvariant'] = 'Вид вопроса';
$string['questionx'] = 'Вопрос {$a}';
$string['requiresgrading'] = 'Требуется оценивание';
$string['responsehistory'] = 'История ответов';
$string['restart'] = 'Начать сначала';
$string['restartwiththeseoptions'] = 'Начать снова с этими параметрами';
$string['reviewresponse'] = 'Обзор ответов';
$string['rightanswer'] = 'Правильный ответ';
$string['rightanswer_help'] = 'Резюме на правильный ответ генерируется автоматически. Это можно ограничить, чтобы Вы, при желании, могли объяснить правильное решение в общем отзыве к этому вопросу, отключив этот параметр.';
$string['save'] = 'Сохранить';
$string['saved'] = 'Сохранено: {$a}';
$string['saveflags'] = 'Сохранить состояние отметок';
$string['selectacategory'] = 'Выберите категорию:';
$string['selectaqtypefordescription'] = 'Выберите тип вопроса, чтобы увидеть его описание.';
$string['selectcategoryabove'] = 'Выберите категорию выше';
$string['selectquestionsforbulk'] = 'Выберите вопросы для массовых действий';
$string['settingsformultipletries'] = 'Настройки для нескольких попыток';
$string['shareincontext'] = 'Сделать общими в контексте «{$a}»';
$string['showhidden'] = 'Также показывать старые вопросы';
$string['showmarkandmax'] = 'Показывать полученную оценку и максимально возможную';
$string['showmaxmarkonly'] = 'Показывать только максимально возможную оценку';
$string['shown'] = 'Показывать';
$string['shownumpartscorrect'] = 'Показать количество правильных ответов';
$string['shownumpartscorrectwhenfinished'] = 'Показать количество правильных ответов после окончания';
$string['showquestiontext'] = 'Показать текст вопроса в списке вопросов';
$string['specificfeedback'] = 'Отзыв на конкретный ответ';
$string['specificfeedback_help'] = 'Отзыв, который зависит от того, какой ответ дал студент.';
$string['started'] = 'Начало';
$string['state'] = 'Состояние';
$string['step'] = 'Шаг';
$string['stoponerror'] = 'Остановиться при ошибке';
$string['stoponerror_help'] = 'Этот параметр определяет, следует ли прекратить процесс импорта при обнаружении ошибок в некоторых вопросах (в результате чего все вопросы не будут импортированы) или же следует пропустить все вопросы с ошибками и импортировать все вопросы без ошибок.';
$string['submissionoutofsequence'] = 'Доступ не по порядку.
Не нажимайте копку «Назад» при работе с вопросами теста.';
$string['submissionoutofsequencefriendlymessage'] = 'Вы ввели данные в неправильном порядке. Это могло произойти при использовании кнопок браузера «Назад» или «Вперед». Не используйте их во время теста. Это также может произойти, если Вы нажмете куда-нибудь еще при загрузке страницы. Для продолжения нажмите кнопку <strong>Продолжить</strong>.';
$string['submit'] = 'Отправить';
$string['submitandfinish'] = 'Отправить и завершить';
$string['submitted'] = 'Отправлено: {$a}';
$string['technicalinfo'] = 'Техническая информация';
$string['technicalinfo_help'] = 'Эта техническая информация, вероятно, имеет смысл только для разработчиков, работающих над новыми видами вопросов. Она также может быть полезна при диагностировании проблем с вопросами.';
$string['technicalinfominfraction'] = 'Минимальная доля: {$a}';
$string['technicalinfoquestionsummary'] = 'Резюме вопроса: {$a}';
$string['technicalinforightsummary'] = 'Резюме правильного ответа: {$a}';
$string['technicalinfostate'] = 'Состояние вопроса: {$a}';
$string['tofilecategory'] = 'Сохранять категорию в файле';
$string['tofilecontext'] = 'Сохранять контекст в файле';
$string['uninstallbehaviour'] = 'Удалить этот режим вопроса.';
$string['uninstallqtype'] = 'Удалить этот тип вопроса.';
$string['unknown'] = 'неизвестно';
$string['unknownbehaviour'] = 'Неизвестный режим: «{$a}».';
$string['unknownorunhandledtype'] = 'Неизвестный или необработанный  тип вопроса: {$a}';
$string['unknownquestion'] = 'Неизвестный вопрос: {$a}.';
$string['unknownquestioncatregory'] = 'Неизвестная категория вопроса: {$a}.';
$string['unknownquestiontype'] = 'Неизвестный тип вопроса: {$a}';
$string['unknowntolerance'] = 'Неизвестный тип отклонения {$a}';
$string['unpublished'] = 'недоступно';
$string['updatedisplayoptions'] = 'Обновить настройки отображения';
$string['upgradeproblemcategoryloop'] = 'При обновлении категорий вопросов обнаружена проблема. В дереве категорий произошло зацикливание. Затронуты категории с ID {$a}.';
$string['upgradeproblemcouldnotupdatecategory'] = 'Не удалось обновить категорию вопросов «{$a->name}» ({$a->id}).';
$string['upgradeproblemunknowncategory'] = 'При обновлении категорий вопросов обнаружена проблема. Категория {$a->id} входит в родительскую категорию {$a->parent}, которой не существует. Измените родительскую категорию для устранения проблемы.';
$string['whethercorrect'] = 'Правилен ли ответ';
$string['whethercorrect_help'] = 'Предусматривает текстовое описание «Правильно», «Частично правильно» или «Неправильно» и еще цветовую подсветку, которая передает ту же информацию.';
$string['withselected'] = 'С выбранными';
$string['wrongprefix'] = 'Некорректный формат префикса названия {$a}';
$string['xoutofmax'] = '{$a->mark} из {$a->max}';
$string['yougotnright'] = 'Вы правильно выбрали {$a->num}.';
$string['youmustselectaqtype'] = 'Вы должны выбрать тип вопроса.';
$string['yourfileshoulddownload'] = 'Загрузка экспортируемого файла вскоре должна начаться. Если этого не произошло, <a href="{$a}">нажмите сюда</a>.';
