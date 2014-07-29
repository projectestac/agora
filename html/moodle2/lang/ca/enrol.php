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
 * Strings for component 'enrol', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actenrolshhdr'] = 'Mòduls d\'inscripció disponibles';
$string['addinstance'] = 'Afegeix un mètode';
$string['ajaxnext25'] = 'Els 25 següents...';
$string['ajaxoneuserfound'] = 'S\'ha trobat 1 usuari';
$string['ajaxxusersfound'] = 'S\'han trobat {$a} usuaris';
$string['assignnotpermitted'] = 'No teniu permís o no podeu assignar rols en aquest curs';
$string['bulkuseroperation'] = 'Operació amb usuaris en bloc';
$string['configenrolplugins'] = 'Seleccioneu tots els mòduls requerits i organitzeu-los en l\'ordre apropiat.';
$string['custominstancename'] = 'Nom de la instància personalitzat';
$string['defaultenrol'] = 'Afegeix instància als nous cursos';
$string['defaultenrol_desc'] = 'És possible afegir aquest mòdul a tots els nous cursos per defecte.';
$string['deleteinstanceconfirm'] = 'Esteu a punt de suprimir el mètode d\'inscripció "{$a->name}". Les inscripcions de tots els {$a->users} usuaris inscrits mitjançant aquest mètode seran cancel·lades i se suprimiran totes les seves dades relatives a aquests cursos, com ara qualificacions, pertinença a grups o subscripcions a fòrums.

Esteu segur que voleu continuar?';
$string['deleteinstanceconfirmself'] = 'Esteu segur que voleu suprimir la instància "{$a->name}" que us dona accés a aquest curs? És possible que no pugueu tornar a entrar al curs si continueu.';
$string['deleteinstancenousersconfirm'] = 'Esteu a punt de suprimir el mètode d\'inscripció "{$a->name}".

Esteu segur que voleu continuar?';
$string['disableinstanceconfirmself'] = 'Esteu segur que voler inhabilitar la instància "{$a->name}" que us dona accés a aquest curs? És possible que no pugueu tornar a entrar al curs si continueu.';
$string['durationdays'] = '{$a} dies';
$string['editenrolment'] = 'Editeu la inscripció';
$string['enrol'] = 'Inscriu';
$string['enrolcandidates'] = 'Usuaris no inscrits';
$string['enrolcandidatesmatching'] = 'Cerca d\'usuaris no inscrits';
$string['enrolcohort'] = 'Inscriu cohort';
$string['enrolcohortusers'] = 'Inscriu usuaris';
$string['enrollednewusers'] = '{$a} nous usuaris inscrits amb èxit';
$string['enrolledusers'] = 'Usuaris inscrits';
$string['enrolledusersmatching'] = 'Cerca d\'usuaris inscrits';
$string['enrolme'] = 'Inscriu-me en aquest curs';
$string['enrolmentinstances'] = 'Mètodes d\'inscripció';
$string['enrolmentnew'] = 'Nova inscripció en {$a}';
$string['enrolmentnewuser'] = '{$a->user} s\'ha inscrit al curs "{$a->course}"';
$string['enrolmentoptions'] = 'Opcions d\'inscripció';
$string['enrolments'] = 'Inscripcions';
$string['enrolnotpermitted'] = 'No teniu permís o no podeu inscriure ningú en aquest curs';
$string['enrolperiod'] = 'Durada de la inscripció';
$string['enroltimecreated'] = 'S\'ha creat la inscripció';
$string['enroltimeend'] = 'La inscripció acaba';
$string['enroltimestart'] = 'La inscripció comença';
$string['enrolusage'] = 'Instàncies / inscripcions';
$string['enrolusers'] = 'Inscriu usuaris';
$string['errajaxfailedenrol'] = 'La inscripció de l\'usuari ha fallat';
$string['errajaxsearch'] = 'S\'ha produït un error mentre es cercaven usuaris';
$string['erroreditenrolment'] = 'S\'ha produït un error mentre s\'intentava editar una inscripció d\'usuaris';
$string['errorenrolcohort'] = 'S\'ha produït un error mentre es creava una instància d\'inscripció de cohorts sincronitzades en aquest curs';
$string['errorenrolcohortusers'] = 'S\'ha produït un error mentre s\'inscrivien membres d\'una cohort en aquest curs.';
$string['errorthresholdlow'] = 'El llindar de notificació ha de ser com a mínim 1 dia.';
$string['errorwithbulkoperation'] = 'Ha succeït un error quan es processava el canvi d\'inscripció en bloc.';
$string['eventuserenrolmentcreated'] = 'Usuari inscrit al curs';
$string['eventuserenrolmentdeleted'] = 'Cancel·lada la inscripció de l\'usuari al curs';
$string['eventuserenrolmentupdated'] = 'Actualizada la cancel·lació d\'inscripció de l\'usuari';
$string['expirynotify'] = 'Notifica abans que venci la inscripció';
$string['expirynotifyall'] = 'A l\'usuari inscrit i a qui fa les inscripcions';
$string['expirynotifyenroller'] = 'Només a l\'usuari que fa les inscripcions';
$string['expirynotify_help'] = 'Aquest paràmetre determina l\'enviament de missatges per a notificar el venciment de la inscripció.';
$string['expirynotifyhour'] = 'Hora per a enviar notificacions de venciment d\'inscripció';
$string['expirythreshold'] = 'Llindar de notificació';
$string['expirythreshold_help'] = 'Quant de temps abans del venciment cal notificar-ho als usuaris?';
$string['extremovedaction'] = 'Acció de cancel·lació d\'inscripció externa';
$string['extremovedaction_help'] = 'Seleccioneu l\'acció per dur a terme quan la inscripció d\'usuaris desaparegui de la font d\'inscripció externa. Tingueu en compte que algunes dades d\'usuari i paràmetres són purgats del curs durant la cancel·lació d\'inscripció del curs.';
$string['extremovedkeep'] = 'Mantingues l\'usuari inscrit';
$string['extremovedsuspend'] = 'Deshabilita la inscripció al curs';
$string['extremovedsuspendnoroles'] = 'Deshabilita la inscripció al curs i suprimeix els rols';
$string['extremovedunenrol'] = 'Cancel·la la inscripció al curs de l\'usuari';
$string['finishenrollingusers'] = 'Acaba d\'inscriure als usuaris';
$string['instanceeditselfwarning'] = 'Avís:';
$string['instanceeditselfwarningtext'] = 'Esteu inscrit en aquest curs mitjançant aquest mètode d\'inscripció. Els canvis poden afectar el vostre accés a aquest curs.';
$string['invalidenrolinstance'] = 'Instància d\'inscripció invàlida';
$string['invalidrole'] = 'Rol invàlid';
$string['manageenrols'] = 'Gestiona els mòduls d\'inscripció';
$string['manageinstance'] = 'Gestiona';
$string['migratetomanual'] = 'Migra a inscripcions manuals';
$string['nochange'] = 'No canvies';
$string['noexistingparticipants'] = 'No existeixen participants';
$string['noguestaccess'] = 'Els visitants no poden accedir a aquest curs, proveu d\'identificar-vos.';
$string['none'] = 'Cap';
$string['notenrollable'] = 'No us podeu inscriure en aquest curs.';
$string['notenrolledusers'] = 'Altres usuaris';
$string['otheruserdesc'] = 'Els següents usuaris no estan inscrits en aquest curs, però sí que tenen rols, heretats o assignats dins.';
$string['participationactive'] = 'Actiu';
$string['participationstatus'] = 'Estat';
$string['participationsuspended'] = 'Suspès';
$string['periodend'] = 'fins a {$a}';
$string['periodnone'] = 'inscrits {$a}';
$string['periodstart'] = 'des de {$a}';
$string['periodstartend'] = 'des de {$a->start} fins a {$a->end}';
$string['recovergrades'] = 'Recupera les qualificacions antigues d\'usuari si és possible';
$string['rolefromcategory'] = '{$a->role} (Heretat de la categoria de curs)';
$string['rolefrommetacourse'] = '{$a->role} (Heretat del curs pare)';
$string['rolefromsystem'] = '{$a->role} (Assignat a nivell de lloc)';
$string['rolefromthiscourse'] = '{$a->role} (Assignat en aquest curs)';
$string['startdatetoday'] = 'Hui';
$string['synced'] = 'Sincronitzat';
$string['testsettings'] = 'Paràmetres de la prova';
$string['testsettingsheading'] = 'Paràmetres d\'inscripció de prova  - {$a}';
$string['totalenrolledusers'] = '{$a} usuaris inscrits';
$string['totalotherusers'] = '{$a} altres usuaris';
$string['unassignnotpermitted'] = 'No teniu permís per llevar l\'assignació de rols en aquest curs';
$string['unenrol'] = 'Cancel·la la inscripció en aquest curs';
$string['unenrolconfirm'] = 'Esteu segur que voleu cancel·lar la inscripció de l\'usuari "{$a->user}" del curs "{$a->course}"?';
$string['unenrolme'] = 'Cancel·la la meva inscripció en {$a}';
$string['unenrolnotpermitted'] = 'No teniu permís o no podeu cancel·lar la inscripció d\'aquest usuari en aquest curs.';
$string['unenrolroleusers'] = 'Cancel·la la inscripció dels usuaris';
$string['uninstallmigrating'] = 'S\'estan migrant "{$a}" inscripcions';
$string['unknowajaxaction'] = 'Sol·licitud d\'acció desconeguda';
$string['unlimitedduration'] = 'Il·limitat';
$string['usersearch'] = 'Cerca';
$string['withselectedusers'] = 'Amb els usuaris seleccionats';
