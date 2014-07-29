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
 * Strings for component 'portfolio', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activeexport'] = 'Разрешить активный экспорт';
$string['activeportfolios'] = 'Доступные портфолио';
$string['addalltoportfolio'] = 'Экспортировать все в портфолио';
$string['addnewportfolio'] = 'Добавить новое портфолио';
$string['addtoportfolio'] = 'Экспортировать в портфолио';
$string['alreadyalt'] = 'Уже экспортировано - пожалуйста, нажмите здесь для разрешения этой передачи';
$string['alreadyexporting'] = 'Вы уже сделали экспорт активного портфолио в этой сессии. Перед продолжением, Вы должны либо завершить этот экспорт или отменить его. Хотите продолжить? (Если нет, то он будет отменен).';
$string['availableformats'] = 'Доступные форматы эспорта';
$string['callbackclassinvalid'] = 'Класс обратного вызова определен неверно или не является частью иерархии portfolio_caller';
$string['callercouldnotpackage'] = 'Ошибка упаковки ваших данных для экспорта: исходная ошибка {$a}';
$string['cannotsetvisible'] = 'Не удается это сделать видимым - плагин должен быть полностью отключен, поскольку он неверно сконфигурирован';
$string['commonportfoliosettings'] = 'Общие настройки портфолио';
$string['commonsettingsdesc'] = '<p>Если передача предусматривает «Умеренное» или «Высокое» количество времени, то может ли пользователь дождаться завершения передачи или нет.</p><p>Увеличение размера до порога «Умеренное» происходит сразу же без вопросов к пользователю, а «Умеренное» и «Высокое» время передачи означает, что у Вас есть выбор, но предупреждает, что это может занять некоторое время.</p><p>Кроме того, некоторые плагины для портфолио могут полностью игнорировать эту опцию и ставить все передачи в очередь.</p>';
$string['configexport'] = 'Настроить экспортированные данные';
$string['configplugin'] = 'Настроить плагин портфолио';
$string['configure'] = 'Настроить';
$string['confirmcancel'] = 'Вы уверены, что хотите прервать этот экспорт?';
$string['confirmexport'] = 'Пожалуйста, подтвердите этот экспорт';
$string['confirmsummary'] = 'Итог Вашего экспорта';
$string['continuetoportfolio'] = 'Продолжить портфолио';
$string['deleteportfolio'] = 'Удалить экземпляр портфолио';
$string['destination'] = 'Назначение';
$string['disabled'] = 'К сожалению, экспорт портфолио не доступен на этом сайте';
$string['disabledinstance'] = 'Отключено';
$string['displayarea'] = 'Область экспорта';
$string['displayexpiry'] = 'Время передачи истекло';
$string['displayinfo'] = 'Информация об экспорте';
$string['dontwait'] = 'Не ждать';
$string['enabled'] = 'Включить портфолио';
$string['enableddesc'] = 'При включенном параметре пользователи смогут экспортировать во внешние системы или веб-страницы содержимое, например, сообщения форумов и ответы на задания.';
$string['err_uniquename'] = 'Название портфолио должно быть уникальным (для плагина)';
$string['exportalreadyfinished'] = 'Экспорт портфолио завершен!';
$string['exportalreadyfinisheddesc'] = 'Экспорт портфолио завершен!';
$string['exportcomplete'] = 'Экспорт портфолио завершен!';
$string['exportedpreviously'] = 'Предыдущий экспорт';
$string['exportexceptionnoexporter'] = 'portfolio_export_exception было получено активной сессией, а не экспортером объекта';
$string['exportexpired'] = 'Время экспорта портфолио истекло';
$string['exportexpireddesc'] = 'Вы пытаетесь повторить экспорт некоторой информации или начать пустой экспорт. Чтобы сделать всё правильно, Вам нужно перейти назад в оригинальное местоположение и начать всё снова. Это иногда случается, если Вы использовали кнопку «Назад» после того, как экспорт был успешно произведет, или добавили в закладки ошибочный адрес.';
$string['exporting'] = 'Экспортирование в портфолио';
$string['exportingcontentfrom'] = 'Экспортирование контента из {$a}';
$string['exportingcontentto'] = 'Экспортирование контента в {$a}';
$string['exportqueued'] = 'Экспорт портфолио был успешно добавлен в очередь на передачу';
$string['exportqueuedforced'] = 'Экспорт портфолио был успешно добавлен в очередь на передачу (удаленная система предписывает очередь передач)';
$string['failedtopackage'] = 'Не удается найти файлы в пакете';
$string['failedtosendpackage'] = 'Ошибка отправки данных выбранной системы портфолио: исходная ошибка {$a}';
$string['filedenied'] = 'Доступ к этому файлу запрещен';
$string['filenotfound'] = 'Файл не найден';
$string['fileoutputnotsupported'] = 'Перезапись выходного файла не поддерживается для этого формата';
$string['format_document'] = 'Документ';
$string['format_file'] = 'Файл';
$string['format_image'] = 'Изображение';
$string['format_leap2a'] = 'Формат портфолио Leap2A';
$string['format_mbkp'] = 'Формат резервного копирования Moodle';
$string['format_pdf'] = 'PDF';
$string['format_plainhtml'] = 'HTML';
$string['format_presentation'] = 'Презентация';
$string['format_richhtml'] = 'HTML с вложениями';
$string['format_spreadsheet'] = 'Электронная таблица';
$string['format_text'] = 'Текст';
$string['format_video'] = 'Видео';
$string['hidden'] = 'Скрыто';
$string['highdbsizethreshold'] = 'Большой размер передаваемой базы данных';
$string['highdbsizethresholddesc'] = 'Количество записей в базе данных велико, что может привести к большой длительности передачи';
$string['highfilesizethreshold'] = 'Превышен размер файла';
$string['highfilesizethresholddesc'] = 'Размер файла больше установленного порога, это может привести к большой затрате времени на передачу';
$string['insanebody'] = 'Привет! Вы получили это сообщение от администратора {$a->sitename}.

Некоторые экземпляры плагина портфолио были автоматически отключены по причине неправильной конфигурации. Поэтому пользователи в данный момент не смогут производить экспорт этих портфолио.

Список отключенных экземпляров плагинов портфолио:

{$a->textlist}.

Нужно это исправить как можно быстрее, посетив {$a->fixurl}.';
$string['insanebodyhtml'] = '<p>Привет! Вы получили это сообщение от администратора {$a->sitename}. </p> <p>Некоторые экземпляры плагина портфолио были автоматически отключены по причине неправильной конфигурации. Поэтому пользователи в данный момент не смогут производить экспорт этих портфолио. </p> <p>Список отключенных экземпляров плагинов портфолио: </p> {$a->htmllist} <p> Нужно это исправить как можно быстрее, посетив <a href="{$a->fixurl}">страницу конфигурирования портфолио</a></p>';
$string['insanebodysmall'] = 'Привет! Вы получили это сообщение от администратора {$a->sitename}. Некоторые экземпляры плагина портфолио были автоматически отключены по причине неправильно конфигурации. Поэтому пользователи в данный момент не смогут производить экспорт этих портфолио. Нужно это исправить как можно быстрее, посетив {$a->fixurl}.';
$string['insanesubject'] = 'Некоторые экзампляры портфолио автоматически отключены';
$string['instancedeleted'] = 'Портфолио успешно удалено';
$string['instanceismisconfigured'] = 'Экземпляр портфолио неверно настроен, и был пропущен. Ошибка: {$a}';
$string['instancenotdelete'] = 'Ошибка удаления портфолио';
$string['instancenotsaved'] = 'Ошибка сохранения портфолио';
$string['instancesaved'] = 'Портфолио успешно сохранено';
$string['invalidaddformat'] = 'Ошибка добавления формата к portfolio_add_button.({$a}) Обязано быть одно из PORTFOLIO_ADD_XXX';
$string['invalidbuttonproperty'] = 'Не удается найти это свойство ({$a}) для portfolio_button';
$string['invalidconfigproperty'] = 'Не удается найти это свойство конфигурации ({$a->property} для {$a->class})';
$string['invalidexportproperty'] = 'Не удается найти это свойство экспорта конфигурации ({$a->property} для {$a->class})';
$string['invalidfileareaargs'] = 'Неверная область аргументов файла передана set_file_and_format_data - должно быть contextid, component, filearea и itemid';
$string['invalidformat'] = 'Какие-то экспортируемые данные в неверном формате, {$a}';
$string['invalidinstance'] = 'Не удается найти экземпляр этого портфолио';
$string['invalidpreparepackagefile'] = 'Ошибочный вызов prepare_package_file - или один файл или несколько файлов должны быть заданы';
$string['invalidproperty'] = 'Не удается найти это свойство ({$a->property} для {$a->class})';
$string['invalidsha1file'] = 'Неверный вызов get_sha1_file - или один файл или несколько файлов должны быть заданы';
$string['invalidtempid'] = 'Ошибочный идентификатор экспорта. Возможно он просрочен.';
$string['invaliduserproperty'] = 'Не удается найти это свойство пользовательской конфигурации ({$a->property} из {$a->class})';
$string['leap2a_emptyselection'] = 'Требуемое значение не выбрано';
$string['leap2a_entryalreadyexists'] = 'Вы пытаетесь добавить запись Leap2A  с идентификатором ({$a}), которая уже создана в этой ленте';
$string['leap2a_feedtitle'] = 'Leap2A экспорт из Moodle в {$a}';
$string['leap2a_filecontent'] = 'Попытка установить содержимое записи в файл Leap2A, вместо использования подкласса файла';
$string['leap2a_invalidentryfield'] = 'Вы пытаетесь задать поле записи, которой не существует ({$a}) или которая не может быть выбрана напрямую';
$string['leap2a_invalidentryid'] = 'Вы пытаетесь получить доступ к записи по идентификатору, который не создан ({$a})';
$string['leap2a_missingfield'] = 'Требуемое значение поля Leap2A {$a} отсутствует';
$string['leap2a_nonexistantlink'] = 'Запись Leap2A ({$a->from}) пытается получить ссылку на несуществуюшщую запись ({$a->to}) с rel {$a->rel}';
$string['leap2a_overwritingselection'] = 'Перезапись оригинального типа вхождения ({$a}) выборкой make_selection';
$string['leap2a_selflink'] = 'Вхождение Leap2A ({$a->id}) пытается связать себя с rel {$a->rel}';
$string['logs'] = 'Журнал событий передачи';
$string['logsummary'] = 'Предыдущие успешные передачи';
$string['manageportfolios'] = 'Управление портфолио';
$string['manageyourportfolios'] = 'Управление Вашими портфолио';
$string['mimecheckfail'] = 'Плагин портфолио {$a->plugin} не поддерживает этот тип MIME {$a->mimetype}';
$string['missingcallbackarg'] = 'Пропущен аргумент обратного вызова {$a->arg} для класса {$a->class}';
$string['moderatedbsizethreshold'] = 'Умеренный размер передаваемой БД';
$string['moderatedbsizethresholddesc'] = 'Количество записей БД, превышение которого потребует умеренного количества времени для передачи';
$string['moderatefilesizethreshold'] = 'Умеренный размер передаваемого файла';
$string['moderatefilesizethresholddesc'] = 'Размер файла, превышающий этот порог, потребует умеренного количества времени для передачи';
$string['multipleinstancesdisallowed'] = 'Попытка создать еще один экземпляр плагина, у которого есть запрет на создание нескольких экземпляров ({$a})';
$string['mustsetcallbackoptions'] = 'Вы обязаны установить опцию обратного вызова в конструкторе portfolio_add_button или используя метод set_callback_options';
$string['noavailableplugins'] = 'Извините, но нет доступных портфолио для экспорта';
$string['nocallbackclass'] = 'Не удается найти класс обратной связи для использования ({$a})';
$string['nocallbackcomponent'] = 'Не удалось найти указанный компонент ({$a}).';
$string['nocallbackfile'] = 'Что-то нарушено в модуле, который Вы пытаетесь экспортировать - не удается найти требуемый файл портфолио';
$string['noclassbeforeformats'] = 'Вы обязаны установить класс обратного вызова перед вызовом set_formats в portfolio_button';
$string['nocommonformats'] = 'Нет общих форматов между любым доступным плагином портфолио и расположением вызова {$a->location} (вызывающий поддерживает {$a->formats})';
$string['noinstanceyet'] = 'Еще не выбрано';
$string['nologs'] = 'Нет событий для отображения';
$string['nomultipleexports'] = 'Извините, но место назначения портфолио ({$a->plugin}) не поддерживает несколько экспортов одновременно. Пожалуйста, сначала <a href="{$a->link}">закончите  текущий экспорт</a> и попробуйте снова';
$string['nonprimative'] = 'Нестандартное значение было послано как аргумент обратного вызова в portfolio_add_button. В продолжении отказано. Ключ был {$a->key} и значение - {$a->value}';
$string['nopermissions'] = 'Извините, но у Вас нет необходимых прав для экспорта файлов из этой области';
$string['notexportable'] = 'Извините, но тип контента, который Вы пытаетесь экспортировать, не может быть экспортирован';
$string['notimplemented'] = 'Извините, но Вы пытаетесь экспортировать контент в таком формате, который пока еще не реализован ({$a})';
$string['notyetselected'] = 'Еще не выбрано';
$string['notyours'] = 'Вы пытаетесь возобновить экспорт портфолио, который Вам не принадлежит!';
$string['nouploaddirectory'] = 'Не удается создать временный каталог для размещения Ваших данных';
$string['off'] = 'Включено, но скрыто';
$string['on'] = 'Включено и видимо';
$string['plugin'] = 'Плагин портфолио';
$string['plugincouldnotpackage'] = 'Ошибка в упаковке Ваших данных для экспорта: исходная ошибка {$a}';
$string['pluginismisconfigured'] = 'Плагин портфолио неверно сконфигурирован, пропущено. Ошибка: {$a}';
$string['portfolio'] = 'Портфолио';
$string['portfolios'] = 'Портфолио';
$string['queuesummary'] = 'Передачи в очереди в данный момент';
$string['returntowhereyouwere'] = 'Возвращение к месту, где Вы были';
$string['save'] = 'Сохранить';
$string['selectedformat'] = 'Выбранный формат экспорта';
$string['selectedwait'] = 'Ждать выбранный?';
$string['selectplugin'] = 'Выберите место назначения';
$string['singleinstancenomultiallowed'] = 'Доступен только один экземпляр плагина портфолио, несколько экспортов в сессии не поддерживается.Уже есть активный экспорт в сессии, использующей этот плагин!';
$string['somepluginsdisabled'] = 'Некоторые плагины портфолио целиком были отключены, потому что они либо неверно сконфигурированы, либо полагаются на что-то другое:';
$string['sure'] = 'Вы уверены, что хотите удалить«{$a}»? Это действие не может быть отменено.';
$string['thirdpartyexception'] = 'Сторонее исключение было получено в течение экспорта портфолио ({$a}). Прервите и вызовите вновь, но это должно быть действительно исправлено';
$string['transfertime'] = 'Время передачи';
$string['unknownplugin'] = 'Неизвестно (возможно, были удалены администратором)';
$string['wait'] = 'Подождите';
$string['wanttowait_high'] = 'Не рекомендуется ожидать окончания текущей передачи, но если Вы уверены и знаете, что делаете - можете подождать.';
$string['wanttowait_moderate'] = 'Вы по-прежнему хотите передать? Это может занять несколько минут';
