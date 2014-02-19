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
 * Strings for component 'enrol', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actenrolshhdr'] = 'Доступные способы записи на курс';
$string['addinstance'] = 'Добавить способ';
$string['ajaxnext25'] = 'Следующие 25 ...';
$string['ajaxoneuserfound'] = 'Найден 1 пользователь';
$string['ajaxxusersfound'] = 'Найдено пользователей: {$a}';
$string['assignnotpermitted'] = 'Вы не можете назначать роли в этом курсе.';
$string['bulkuseroperation'] = 'Действия над несколькими пользователями';
$string['configenrolplugins'] = 'Пожалуйста, выберите все необходимые способы и расставьте в соответствующем порядке.';
$string['custominstancename'] = 'Название способа';
$string['defaultenrol'] = 'Добавлять этот способ для новых курсов';
$string['defaultenrol_desc'] = 'Можно добавить этот способ по умолчанию во все новые курсы.';
$string['deleteinstanceconfirm'] = 'Вы хотите удалить способ записи «{$a->name}». Все обучающиеся пользователи, записанные этим способом ({$a->users}), будут отчислены и все данные пользователей, связанные с курсом (оценки, членство в группах, сообщения в форумах) будут удалены.

Вы уверены, что хотите продолжить?';
$string['deleteinstancenousersconfirm'] = 'Вы хотите удалить способ записи «{$a->name}».
Вы уверены, что хотите продолжить?';
$string['durationdays'] = 'Дней: {$a}';
$string['enrol'] = 'Записать';
$string['enrolcandidates'] = 'Не записанные на курс пользователи';
$string['enrolcandidatesmatching'] = 'Подходящие не записанные пользователи';
$string['enrolcohort'] = 'Записать глобальную группу';
$string['enrolcohortusers'] = 'Записать пользователей на курс';
$string['enrollednewusers'] = 'Успешно записано {$a} новых пользователей';
$string['enrolledusers'] = 'Записанные на курс пользователи';
$string['enrolledusersmatching'] = 'Подходящие записанные пользователи';
$string['enrolme'] = 'Записаться на курс';
$string['enrolmentinstances'] = 'Способы записи на курс';
$string['enrolmentnew'] = 'Новая регистрация в';
$string['enrolmentnewuser'] = '{$a->user} зарегистрирован на курсе «{$a->course}»';
$string['enrolmentoptions'] = 'Настройка записи на курс';
$string['enrolments'] = 'Запись на курсы';
$string['enrolnotpermitted'] = 'Вы не можете записать никого в этот курс';
$string['enrolperiod'] = 'Продолжительность обучения';
$string['enroltimecreated'] = 'Дата зачисления';
$string['enroltimeend'] = 'Окончание обучения';
$string['enroltimestart'] = 'Начало обучения';
$string['enrolusage'] = 'Способы / записано';
$string['enrolusers'] = 'Записать пользователей на курс';
$string['errajaxfailedenrol'] = 'Ошибка записи пользователя на курс';
$string['errajaxsearch'] = 'Ошибка при поиске пользователей';
$string['erroreditenrolment'] = 'При настройке записи на курс произошла ошибка';
$string['errorenrolcohort'] = 'Ошибка создания синхронизации записи с глобальной группой в этом курсе.';
$string['errorenrolcohortusers'] = 'Ошибка записи членов глобальной группы в этом курсе.';
$string['errorthresholdlow'] = 'Порог уведомления должен быть не менее 1 дня.';
$string['errorwithbulkoperation'] = 'При действии над несколькими пользователями произошла ошибка';
$string['expirynotify'] = 'Уведомлять об истечении срока обучения';
$string['expirynotifyall'] = 'Преподавателя и учащегося';
$string['expirynotifyenroller'] = 'Только преподавателя';
$string['expirynotify_help'] = 'Этот параметр определяет, будет ли посылаться уведомление об истечении срока обучения.';
$string['expirynotifyhour'] = 'Время отправки уведомления об истечении срока обучения';
$string['expirythreshold'] = 'Порог уведомления';
$string['expirythreshold_help'] = 'За сколько уведомлять пользователей об истечении срока их обучения?';
$string['extremovedaction'] = 'Действия при исключении из внешнего источника';
$string['extremovedaction_help'] = 'Выберите выполняемое действие при исчезновении пользователя из внешнего источника записи на курс. Обратите внимание, что из курса удаляются некоторые настройки  и данные пользователя при исключении его из курса.';
$string['extremovedkeep'] = 'Оставить пользователя записанным';
$string['extremovedsuspend'] = 'Заблокировать запись на курс';
$string['extremovedsuspendnoroles'] = 'Заблокировать запись на курс и удалить назначенные роли';
$string['extremovedunenrol'] = 'Исключить пользователя из курса';
$string['finishenrollingusers'] = 'Окончание записи пользователей';
$string['invalidenrolinstance'] = 'Неправильный способ записи';
$string['invalidrole'] = 'Неправильная роль';
$string['manageenrols'] = 'Управление способами записи';
$string['manageinstance'] = 'Управление';
$string['nochange'] = 'Без изменений';
$string['noexistingparticipants'] = 'Нет участников';
$string['noguestaccess'] = 'Гости не имеют доступа к этому курсу; пожалуйста, войдите в систему.';
$string['none'] = 'Никто';
$string['notenrollable'] = 'Вы не можете записаться на этот курс';
$string['notenrolledusers'] = 'Другие пользователи';
$string['otheruserdesc'] = 'Следующие пользователи не записаны на этот курс, но имеют в нём унаследованные или назначенные роли.';
$string['participationactive'] = 'Активно';
$string['participationstatus'] = 'Состояние';
$string['participationsuspended'] = 'Заблокировано';
$string['periodend'] = 'до {$a}';
$string['periodnone'] = 'зачислены {$a}';
$string['periodstart'] = 'с {$a}';
$string['periodstartend'] = 'с {$a->start} до {$a->end}';
$string['recovergrades'] = 'Восстанавливать старые оценки пользователя, если возможно';
$string['rolefromcategory'] = '{$a->role} (Унаследовано от категории курса)';
$string['rolefrommetacourse'] = '{$a->role} (Унаследовано от родительского курса)';
$string['rolefromsystem'] = '{$a->role} (Назначено на уровне сайта)';
$string['rolefromthiscourse'] = '{$a->role} (Назначено в этом курсе)';
$string['startdatetoday'] = 'Сегодня';
$string['synced'] = 'Синхронизировано';
$string['totalenrolledusers'] = 'На курс записано пользователей: {$a}';
$string['totalotherusers'] = 'Других пользователей: {$a}';
$string['unassignnotpermitted'] = 'Вы не можете отменить назначение ролей в этом курсе';
$string['unenrol'] = 'Исключить';
$string['unenrolconfirm'] = 'Вы действительно хотите исключить пользователя «{$a->user}» из курса «{$a->course}»?';
$string['unenrolme'] = 'Исключить себя из курса «{$a}»';
$string['unenrolnotpermitted'] = 'Вы не можете исключить этого пользователя из этого курса.';
$string['unenrolroleusers'] = 'Исключить пользователей';
$string['uninstallconfirm'] = 'Вы собираетесь полностью удалить способ записи "{$a}". В результате будут полностью удалены и все данные пользователей, зачисленных этим способом (оценки, членство в группах, сообщения в форумах).

Вы УВЕРЕНЫ, что хотите продолжить?';
$string['uninstalldelete'] = 'Отчислить всех учащихся и удалить способ';
$string['uninstalldeletefiles'] = 'Все данные, связанные со способом записи "{$a->plugin}" были удалены из базы данных. Для полного удаления способа (и предотвращения его самоустановки) с сервера необходимо удалить этот каталог: {$a->directory}';
$string['uninstallmigrate'] = 'Удалить способ, но сохранить всех учащихся';
$string['uninstallmigrating'] = 'Сохранено учащихся - «{$a}»';
$string['unknowajaxaction'] = 'Запрошено неизвестное действие';
$string['unlimitedduration'] = 'Без ограничений';
$string['usersearch'] = 'Поиск';
$string['withselectedusers'] = 'С выбранными пользователями';
