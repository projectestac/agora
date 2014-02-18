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
 * Strings for component 'scorm', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   scorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activation'] = 'Активация';
$string['activityloading'] = 'Вы будете автоматически перенаправлены на элемент курса в';
$string['activityoverview'] = 'Есть пакеты SCORM, которые требуют Вашего внимания';
$string['activitypleasewait'] = 'Загружается элемент курса, пожалуйста, подождите...';
$string['adminsettings'] = 'Настройки администратора';
$string['advanced'] = 'Параметры';
$string['aicchacpkeepsessiondata'] = 'Хранить данные о сессии AICC HACP';
$string['aicchacpkeepsessiondata_desc'] = 'Продолжительность времени (в днях) хранения данных о сессии внешней AICC HACP  (большая длительность дополнит таблицу со старыми данными, но может быть полезна при отладке)';
$string['aicchacptimeout'] = 'Тайм-аут AICC HACP';
$string['aicchacptimeout_desc'] = 'Период времени в минутах, когда сессия внешнего AICC HACP может оставаться открытой';
$string['allowapidebug'] = 'Активировать отладку и трассировку API  (устанавливается захват маски с apidebugmask)';
$string['allowtypeaicchacp'] = 'Включить внешний AICC HACP';
$string['allowtypeaicchacp_desc'] = 'Включенный параметр позволяет связь с внешним AICC HACP, не требуя входа пользователя в систему для post-запросов из внешнего пакета AICC';
$string['allowtypeexternal'] = 'Разрешить внешний тип пакета';
$string['allowtypeexternalaicc'] = 'Разрешить прямой URL-адрес AICC';
$string['allowtypeexternalaicc_desc'] = 'Включенный параметр позволяет использовать прямой URL-адрес к простому пакету AICC';
$string['allowtypeimsrepository'] = 'Разрешить IMS пакеты';
$string['allowtypelocalsync'] = 'Разрешить загруженный тип пакета';
$string['apidebugmask'] = 'Отладка API с захватом маски - используйте простое регулярное выражение  <username>:<activityname>. Например: admin:.* отладка возможна только для пользователя-администратора.';
$string['areacontent'] = 'Файлы содержимого';
$string['areapackage'] = 'Файл пакета';
$string['asset'] = 'Элемент';
$string['assetlaunched'] = 'Элемент - Просмотрен';
$string['attempt'] = 'Попытка';
$string['attempt1'] = '1 попытка';
$string['attempts'] = 'Попытки';
$string['attemptstatusall'] = 'Моя домашняя страница и страница предпросмотра SCORM';
$string['attemptstatusentry'] = 'Только страница предпросмотра SCORM';
$string['attemptstatusmy'] = 'Только моя домашняя страница';
$string['attemptsx'] = '{$a} попыток';
$string['attr_error'] = 'Плохое значение атрибута ({$a->attr}) в теге {$a->tag}.';
$string['autocontinue'] = 'Автопродолжение';
$string['autocontinuedesc'] = 'При включенном параметре последующие учебные объекты запускаются автоматически, в противном случае нужно нажимать на кнопку Продолжить.';
$string['autocontinue_help'] = 'Если параметр включен, то последующие учебные объекты будут запускаться автоматически, в противном случае потребуется нажимать кнопку «Продолжить».';
$string['averageattempt'] = 'Среднее попыток';
$string['badmanifest'] = 'Какие-то ошибки манифеста: см. журнала ошибок';
$string['badpackage'] = 'Указанный пакет/манифест не является допустимым. Проверьте его и повторите попытку.';
$string['browse'] = 'Предпросмотр';
$string['browsed'] = 'Найден';
$string['browsemode'] = 'Режим предпросмотра';
$string['browserepository'] = 'Посмотреть  репозиторий';
$string['cannotfindsco'] = 'Не удалось найти SCO (Shareable Content Object - Разделяемый объект содержимого)';
$string['chooseapacket'] = 'Выберите или модернизируйте SCORM пакет';
$string['completed'] = 'Завершено';
$string['completionscorerequired'] = 'Необходимо набрать требуемый минимум баллов';
$string['completionscorerequired_help'] = 'Включение этого параметра потребует, чтобы пользователь набрал по меньшей мере минимальное количество баллов, чтобы отметить этот SCORM завершенным, а также выполнить любые другие требования завершения активного элемента.';
$string['completionstatus_completed'] = 'Завершено';
$string['completionstatus_passed'] = 'Пройдено';
$string['completionstatusrequired'] = 'Требуется достичь состояния';
$string['completionstatusrequired_help'] = 'Пользователь должен проверить одно или несколько состояний  и достичь по меньшей мере одного из них, чтобы отметить этот SCORM завершенным, а также выполнить любые другие требования завершения активного элемента.';
$string['confirmloosetracks'] = 'ВНИМАНИЕ: Вероятно, пакет был изменен. Если структура пакета изменилась, то некоторые попытки пользователей дорожек могли быть потеряны при обновлении.';
$string['contents'] = 'Содержание';
$string['coursepacket'] = 'Пакет курса';
$string['coursestruct'] = 'Структура курса';
$string['currentwindow'] = 'В текущем окне
';
$string['datadir'] = 'Ошибка файловой системы: Невозможно создать директорию для хранения данных курса';
$string['defaultdisplaysettings'] = 'Параметры отображения по умолчанию';
$string['defaultgradesettings'] = 'Настройки оценок по умолчанию';
$string['defaultothersettings'] = 'Остальные парметры по умолчанию';
$string['deleteallattempts'] = 'Удалить все попытки';
$string['deleteattemptcheck'] = 'Вы абсолютно уверены, что хотите полностью удалить эти попытки?';
$string['deleteuserattemptcheck'] = 'Вы абсолютно уверены, что хотите полностью удалить все свои попытки?';
$string['details'] = 'Подробный отчет';
$string['directories'] = 'Отображать панель ссылок';
$string['disabled'] = 'Выключить';
$string['display'] = 'Отображать контент';
$string['displayattemptstatus'] = 'Отображать состояние попытки';
$string['displayattemptstatusdesc'] = 'Итог попыток пользователя будет показан в блоке Обзора курса на странице Мой Moodle и/или на странице SCORM.';
$string['displayattemptstatus_help'] = 'При включенном параметре итог попыток пользователя будет показан в блоке Обзора курса на странице Мой Moodle и/или на странице SCORM.';
$string['displaycoursestructure'] = 'Отображать структуру курса на главной странице';
$string['displaycoursestructuredesc'] = 'При включенном параметре на странице SCORM  отображается оглавление.';
$string['displaycoursestructure_help'] = 'При включенном параметре оглавление отображается на странице структуры SCORM.';
$string['displaydesc'] = 'Надо ли отображать пакет SCORM  в новом окне.';
$string['displaysettings'] = 'Параметры отображения';
$string['dnduploadscorm'] = 'Добавить пакет SCORM';
$string['domxml'] = 'Внешняя библиотека DOMXML';
$string['duedate'] = 'Срок выполнения';
$string['element'] = 'Элемент';
$string['elementdefinition'] = 'Элемент "Определение"';
$string['enter'] = 'Войти';
$string['entercourse'] = 'Вход в SCORM курс';
$string['errorlogs'] = 'Журнал ошибок';
$string['everyday'] = 'Каждый день';
$string['everytime'] = 'При каждом использовании';
$string['exceededmaxattempts'] = 'Вы достигли максимального количества попыток.';
$string['exit'] = 'Выйти из курса';
$string['exitactivity'] = 'Перейти на главную страницу курса';
$string['expired'] = 'Извините, данный элемент курса закрыт в {$a} и уже не доступен';
$string['external'] = 'Время обновления внешних пакетов';
$string['failed'] = 'Неудачно';
$string['finishscorm'] = 'Если Вы закончили просмотр этого ресурса, {$a}';
$string['finishscormlinkname'] = 'щелкните здесь, чтобы вернуться на страницу курса';
$string['firstaccess'] = 'Первый раз';
$string['firstattempt'] = 'Первая попытка';
$string['forcecompleted'] = 'Принудительное завершение
';
$string['forcecompleteddesc'] = 'Этот параметр задает значение по умолчанию для настройки принудительного завершения';
$string['forcecompleted_help'] = 'Если параметр включен, то текущей попытке принудительно назначается статус «завершено». (Применимо только к пакетам SCORM 1.2.)';
$string['forcejavascript'] = 'Заставить пользователей включить JavaScript';
$string['forcejavascript_desc'] = 'При включенном параметре (рекомендуется) предотвращается доступ к объектам SCORM, если в браузере пользователя не поддерживается/отключен JavaScript.

Если этот параметр отключен, то пользователь может просмотреть SCORM, но связь не возможна и информация об оценке не будет сохранена.';
$string['forcejavascriptmessage'] = 'Для просмотра этого объекта  необходимо использование JavaScript. Пожалуйста, включите JavaScript в своем браузере и попробуйте еще раз.';
$string['forcenewattempt'] = 'Всегда новая попытка';
$string['forcenewattemptdesc'] = 'При включенном параметре каждый доступ к пакету SCORM будет засчитываться как новая попытка.';
$string['forcenewattempt_help'] = 'Если параметр включен, то каждый доступ к пакету SCORM будет считаться новой попыткой.';
$string['found'] = 'Манифест найден';
$string['frameheight'] = 'Высота фрейма или окна.';
$string['framewidth'] = 'Ширина фрейма или окна.';
$string['fullscreen'] = 'Во весь экран';
$string['general'] = 'Основные данные';
$string['gradeaverage'] = 'Средняя оценка';
$string['gradeforattempt'] = 'Оценка за попытку';
$string['gradehighest'] = 'Высшая оценка';
$string['grademethod'] = 'Метод оценивания';
$string['grademethoddesc'] = 'Метод оценивания задает как оценка за одну попытку определяет весь активный элемент.';
$string['grademethod_help'] = 'Метод оценивания задает, как определяется оценка отдельной попытки.

Есть 4 метода оценивания:

* Объекты обучения - количество завершенных/пройденных объектов обучения
* Лучшая оценка - высший балл из полученных во всех пройденных учебных объектах
* Средняя оценка - среднее всех баллов * Суммарная оценка - сумма всех баллов.';
$string['gradescoes'] = 'Учебные объекты';
$string['gradesettings'] = 'Настройки оценивания';
$string['gradesum'] = 'Суммарная оценка';
$string['height'] = 'Высота';
$string['hidden'] = 'Скрыть';
$string['hidebrowse'] = 'Отключить режим предпросмотра';
$string['hidebrowsedesc'] = 'Режим предварительного просмотра позволяет студенту просматривать пакет SCORM перед попыткой пройти его.';
$string['hidebrowse_help'] = '<h2>Скрыть кнопку «Предпросмотр» </h2>

<p> Если эта опция будет установлена в «Да», то кнопка «Предпросмотр» на странице Пакета SCORM/AICC будет скрыта.</p>

<p>По умолчанию ученик может выбрать способ предварительного просмотра результата, или старается выполнить попытку обычным способом. </p>

<p> Когда Объект обучения завершен способом предварительного просмотра, это обозначается иконкой <img src="<?php echo $CFG->wwwroot.\'/mod/scorm/pix/browsed.gif\' ?>" alt="<?php print_string(\'browsed\',\'scorm\') ?>" title="<?php print_string(\'browsed\',\'scorm\') ?>" />.</p>';
$string['hideexit'] = 'Скрыть ссылку выхода';
$string['hidenav'] = 'Скрыть кнопки навигации';
$string['hidenavdesc'] = 'Показать или скрыть кнопки навигации.';
$string['hidereview'] = 'Скрыть кнопку предпросмотра';
$string['hidetoc'] = 'Показать оглавление';
$string['hidetocdesc'] = 'Этот параметр определяет, как оглавление отображается в окне проигрывателя SCORM.';
$string['hidetoc_help'] = 'Эта настройка определяет как оглавление отображается в плеере SCORM.';
$string['highestattempt'] = 'Лучшая попытка';
$string['identifier'] = 'Идентификатор вопроса';
$string['incomplete'] = 'Не завершено';
$string['info'] = 'Введение';
$string['interactions'] = 'Взаимодействие';
$string['interactionscorrectcount'] = 'Количество правильных результатов для вопроса';
$string['interactionsid'] = 'ID элемента';
$string['interactionslatency'] = 'Время, прошедшее между моментом, когда студент получил возможность для ответа и временем его первого ответа.';
$string['interactionslearnerresponse'] = 'Ответ студента';
$string['interactionspattern'] = 'Образец правильного ответа';
$string['interactionsresponse'] = 'Ответы студентов';
$string['interactionsresult'] = 'Итог, основанный на ответе студента и правильном результате';
$string['interactionsscoremax'] = 'Максимальное значение в диапазоне исходных баллов';
$string['interactionsscoremin'] = 'Минимальное значение в диапазоне исходных баллов';
$string['interactionsscoreraw'] = 'Номер, который отражает продуктивность студента в сравнении с минимальным и максимальным значением';
$string['interactionssuspenddata'] = 'Место для хранения и извлечения данных между сеансами студента';
$string['interactionstime'] = 'Время начала попытки';
$string['interactionstype'] = 'Тип вопроса';
$string['interactionsweight'] = 'Вес, назначенный элементу';
$string['invalidactivity'] = 'Элемент курса SCORM некорректен';
$string['invalidhacpsession'] = 'Неверный HACP сессии';
$string['invalidmanifestresource'] = 'ВНИМАНИЕ:  в манифесте были указаны следующие ресурсы, но они не найдены:';
$string['invalidurl'] = 'Указан неправильный URL-адрес.';
$string['invalidurlhttpcheck'] = 'Указан неправильный URL-адрес. Сообщение отладки:<pre>{$a->cmsg}</pre>';
$string['last'] = 'Последний раз работал';
$string['lastaccess'] = 'Последний доступ';
$string['lastattempt'] = 'Завершена последняя попытка';
$string['lastattemptlock'] = 'Блокировка после последней попытки';
$string['lastattemptlockdesc'] = 'При включенном параметре студент не имеет возможности запустить SCORM после использования всех выделенных ему попыток.';
$string['lastattemptlock_help'] = 'Если параметр включен, то студент не может запустить проигрыватель SCORM после израсходования им всех разрешенных попыток.';
$string['location'] = 'Отображать панель навигации';
$string['max'] = 'Максимальный балл';
$string['maximumattempts'] = 'Количество попыток';
$string['maximumattemptsdesc'] = 'Данный параметр устанавливает максимальное количество попыток по умолчанию для элемента курса';
$string['maximumattempts_help'] = '<h2>Количество попыток</h2>

<p> Этим определяется количество попыток, разрешенных пользователям. <br /> Работает только с SCORM1.2 и пакетами AICC. SCORM2004 сам определяет максимальное количество попыток. </p>';
$string['maximumgradedesc'] = 'Данный параметр устанавливает максимальную оценку по умолчанию для элемента курса';
$string['menubar'] = 'Отображать панель меню';
$string['min'] = 'Минимальный балл';
$string['missing_attribute'] = 'Атрибут {$a->attr} отсутствует в теге {$a->tag}';
$string['missingparam'] = 'Требуемый параметр отсутствует или неверен';
$string['missing_tag'] = 'Отсутствует тег {$a->tag}';
$string['mode'] = 'Режим';
$string['modulename'] = 'Пакет SCORM';
$string['modulename_help'] = 'Пакет SCORM представляет собой набор файлов, которые упакованы в соответствии с согласованным стандартом для учебных объектов. Модуль SCORM позволяет добавить в курс пакеты SCORM или AICC, которые загружаются в виде архива.

Содержимое обычно отображается на нескольких страницах, с навигацией между страницами. Существуют различные варианты для отображения содержимого: в всплывающем окне, с оглавлением, с кнопками навигации и т.д. Пакеты SCORM обычно содержат вопросы,  оценки за ответы записывается в журнал оценок.

SCORM может быть использован:

* Для представления мультимедийного контента и анимации
* Как инструмент оценивания';
$string['modulenameplural'] = 'Пакеты SCORM';
$string['navigation'] = 'Навигация';
$string['newattempt'] = 'Начать новую попытку';
$string['next'] = 'Продолжить';
$string['noactivity'] = 'Ничего не произошло';
$string['noattemptsallowed'] = 'Количество попыток';
$string['noattemptsmade'] = 'Выполнено попыток';
$string['no_attributes'] = 'Тег {$a->tag} должны иметь атрибуты';
$string['no_children'] = 'Тег {$a->tag} должен иметь потомка';
$string['nolimit'] = 'Не ограничено';
$string['nomanifest'] = 'Манифест не найден';
$string['noprerequisites'] = 'Извините, но Вы не выполнили требуемые предварительные условия для перехода к этому активному элементу.';
$string['noreports'] = 'Нет отчетов для показа';
$string['normal'] = 'Обычный';
$string['noscriptnoscorm'] = 'Ваш браузер не поддерживает JavaScript или JavaScript отключен. Невозможно воспроизвести пакет SCORM или корректно сохранить данные.';
$string['notattempted'] = 'Не приступал';
$string['not_corr_type'] = 'Несоответствие типа для тега {$a->tag}';
$string['notopenyet'] = 'Извините, данный элемент курса не доступен до {$a}';
$string['objectives'] = 'Объекты';
$string['optallstudents'] = 'все пользователи';
$string['optattemptsonly'] = 'только пользователи с попытками';
$string['options'] = 'Параметры (мешают некоторым браузером)';
$string['optionsadv'] = 'Дополнительные параметры';
$string['optionsadv_desc'] = 'При установленном флажке ширина и высота будут перечислены в качестве дополнительных параметров.';
$string['optnoattemptsonly'] = 'только пользователи без попыток';
$string['organization'] = 'Организация';
$string['organizations'] = 'Организаций';
$string['othersettings'] = 'Дополнительные настройки';
$string['othertracks'] = 'Дополнительные данные';
$string['package'] = 'Файл с пакетом';
$string['packagedir'] = 'Ошибка файловой системы: невозможно создать директорию для пакета';
$string['packagefile'] = 'Нет указанного файла пакета';
$string['package_help'] = 'Пакет - это отдельный файл с расширением <b>zip</b> (или <b>pif</b>), содержащий файлы курса, поддерживающие AICC или SCORM.';
$string['packageurl'] = 'URL';
$string['packageurl_help'] = 'Этот параметр позволяет задать адрес (URL) пакета SCORM вместо выбора загрузки файла стандартным способом.';
$string['page-mod-scorm-x'] = 'Любая страница модуля SCORM';
$string['pagesize'] = 'Кол-во на странице';
$string['passed'] = 'Выполнено успешно';
$string['php5'] = 'PHP 5 (собственная библиотека DOMXML)';
$string['pluginadministration'] = 'Управление пакетом SCORM';
$string['pluginname'] = 'Пакет SCORM';
$string['popup'] = 'В новом окне';
$string['popupmenu'] = 'В выпадающем меню';
$string['popupopen'] = 'Открыть пакет в новом окне';
$string['popupsblocked'] = 'Вероятно, всплывающие окна заблокированы. Проигрывание этого пакета SCORM остановлено. Пожалуйста, проверьте настройки своего браузера и повторите попытку.';
$string['position_error'] = 'Тег {$a->tag} не может быть дочерним для тега {$a->parent}';
$string['preferencespage'] = 'Настройки';
$string['preferencesuser'] = 'Настройки отчета';
$string['prev'] = 'Предыдущий';
$string['raw'] = 'Балл';
$string['regular'] = 'Регулярный манифест';
$string['report'] = 'Отчет';
$string['reportcountallattempts'] = 'Попыток - {$a->nbattempts} для пользователей - {$a->nbusers}, из результатов - {$a->nbresults}';
$string['reportcountattempts'] = 'результатов - {$a->nbresults} (пользователей - {$a->nbusers})
';
$string['reports'] = 'Отчеты';
$string['resizable'] = 'Разрешить изменение размеров окна';
$string['result'] = 'Результат';
$string['results'] = 'Результаты';
$string['review'] = 'Обзор';
$string['reviewmode'] = 'Режим просмотра';
$string['scoes'] = 'Обучающие объекты';
$string['score'] = 'Балл';
$string['scorm:addinstance'] = 'Добавлять новый пакет SCORM';
$string['scormclose'] = 'До';
$string['scormcourse'] = 'Учебный курс';
$string['scorm:deleteownresponses'] = 'Удалять свои попытки';
$string['scorm:deleteresponses'] = 'Удалить попытки';
$string['scormloggingoff'] = 'Выключть лог API ';
$string['scormloggingon'] = 'Включть лог API ';
$string['scormopen'] = 'Открыть';
$string['scormresponsedeleted'] = 'Удаленные попытки пользователя';
$string['scorm:savetrack'] = 'Сохранять прохождение';
$string['scorm:skipview'] = 'Пропускать обзор';
$string['scormtype'] = 'Тип';
$string['scormtype_help'] = 'Этот параметр определяет каким образом пакет SCROM будет включен в курс. Существует 4 варианта:

* Загружаемый пакет - Пакет SCORM будет загружаться через стандартное средство загрузки файлов
* Манифест внешнего SCORM - В этом режиме нужно указать адрес файла imsmanifest.xml пакета. Имейте в виду: если в этом адресе доменное имя отличается от имени Вашего сайта, то лучше использовать вариант "Скачиваемый пакет", иначе оценки не будут сохранены.
* Скачиваемый пакет - Нужно будет указать адрес пакета. Пакет будет разархивирован и сохранен локально. При обновлении внешнего пакета он будет обновляться.
* Хранилище локального контента IMS - Включить пакет, который будет выбираться из хранилища IMS.';
$string['scorm:viewreport'] = 'Просматривать отчеты';
$string['scorm:viewscores'] = 'Просматривать оценки';
$string['scrollbars'] = 'Разрешить прокручивание окна';
$string['selectall'] = 'Выбрать все';
$string['selectnone'] = 'Отменить все';
$string['show'] = 'Показать';
$string['sided'] = 'В стороне';
$string['skipview'] = 'Учащийся пропускает страницу со структурой контента';
$string['skipviewdesc'] = 'Этот параметр устанавливает значение по умолчанию, когда для страницы пропускается структура содержимого';
$string['skipview_help'] = '<h2>Пропуск учеником страницы структуры содержимого </h2>

<p> Если вы добавляете пакет только с одним Объектом обучения, вы можете выбрать автоматический пропуск страницы структуры, когда пользователи выбирают SCORM на странице курса. </p>

<p>Вы можете выбрать:</p>

<ul>
       <li><strong>Никогда</strong> не пропускать страницу структуры содержимого.</li>
       <li><strong>Первый раз</strong> пропустить страницу структуры только в первый раз.</li>
       <li><strong>Всегда</strong> пропускать страницу структуры.</li>
   </ul>';
$string['slashargs'] = 'ВНИМАНИЕ: на этом сайте отключено использование «slash arguments» и объекты могут вести себя не так, как ожидается.';
$string['stagesize'] = 'Размер области контента';
$string['stagesize_help'] = '<h2>Размер</h2>
<p> Эти два параметра настройки Объектов обучения определяют высоту и ширину фрейма/окна. </p>';
$string['started'] = 'Приступил';
$string['status'] = 'Статус';
$string['statusbar'] = 'Показать строку состояния';
$string['student_response'] = 'Ответ';
$string['subplugintype_scormreport'] = 'Отчет';
$string['subplugintype_scormreport_plural'] = 'Отчеты';
$string['suspended'] = 'Приостановлено';
$string['syntax'] = 'Синтаксическая ошибка';
$string['tag_error'] = 'Неизвестный тег ({$a->tag}) со следующим содержанием: {$a->value}';
$string['time'] = 'Время';
$string['timerestrict'] = 'Ограничить период отправки ответа';
$string['title'] = 'Название';
$string['toc'] = 'Оглавление';
$string['toolbar'] = 'Отображать панель управления';
$string['too_many_attributes'] = 'Тег {$a->tag} имеет слишком много атрибутов';
$string['too_many_children'] = 'Тег {$a->tag} имеет слишком много потомков';
$string['totaltime'] = 'Время';
$string['trackingloose'] = 'Внимание: Данные прослеживания этого SCORM пакета будут потеряны!';
$string['type'] = 'Тип';
$string['typeaiccurl'] = 'URL-адрес внешней AICC';
$string['typeexternal'] = 'Манифест внешнего SCORMа';
$string['typelocal'] = 'Загруженный пакет';
$string['typelocalsync'] = 'Скачиваемый пакет';
$string['unziperror'] = 'Ошибка при распаковке пакета';
$string['updatefreq'] = 'Частота автообновления';
$string['updatefreqdesc'] = 'Данный параметр устанавливает частоту автоматического обновления по умолчанию для элемента курса';
$string['updatefreq_help'] = 'Это позволяет автоматически загружать и обновлять внешний пакет';
$string['validateascorm'] = 'Верный SCORM пакет';
$string['validation'] = 'Верный результат';
$string['validationtype'] = 'Желательно установить библиотеку DOMXML, используемую для проверки манифеста SCORM. Если не уверены - оставьте выбранный вариант.';
$string['value'] = 'Значение';
$string['versionwarning'] = 'Манифест версии старше чем 1.3, предупреждение в теге {$a->tag}';
$string['viewallreports'] = 'Просмотр отчетов для {$a} попыток';
$string['viewalluserreports'] = 'Просмотр отчетов для {$a} пользователей';
$string['whatgrade'] = 'Оценивание попыток';
$string['whatgradedesc'] = 'Какая оценка из завершенных попыток записывается в журнал оценок, если разрешено несколько попыток - лучшая, средняя, из первой или последней попыток?';
$string['whatgrade_help'] = 'Если разрешено несколько попыток, то этот параметр определяет, какая оценка будет записана в журнал оценок: высшая, средняя, оценка первой или последней завершенной попытки. К последней завершенной попытке не относятся неудачные попытки.

Указания по управлению несколькими попытками:

* возможность начать новую попытку обеспечивает флажок выше кнопки «Ввод» на странице структуры содержимого. Убедитесь, что Вы предоставили доступ к этой странице, если хотите разрешить более одной попытки.

* Некоторые пакеты SCORM «понимают» особенности применения новых попыток, а многие - нет. Это значит, что если студент повторно входит в имеющиеся попытки, а внутренняя логика SCORM не позволяет избежать перезаписи предыдущих попыток, то они могут быть перезаписаны, хотя попытка была «завершена» или «передана».

* Настройки «Принудительно завершать», «Принудительная новая попытка» и «Блокировка после последней попытки» также обеспечивает дальнейшее управление несколькими попытками.';
$string['width'] = 'Ширина';
$string['window'] = 'Окно';
