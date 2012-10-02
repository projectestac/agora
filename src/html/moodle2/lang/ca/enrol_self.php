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
 * Strings for component 'enrol_self', language 'ca', branch 'MOODLE_23_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['customwelcomemessage'] = 'Missatge de benvinguda personalitzat';
$string['defaultrole'] = 'Assignació de rol per defecte';
$string['defaultrole_desc'] = 'Trieu el rol que serà assignat als usuaris durant el procés d\'inscripció';
$string['editenrolment'] = 'Editeu la inscripció';
$string['enrolenddate'] = 'Data final';
$string['enrolenddate_help'] = 'Si s\'habilita, els usuaris només es poden inscriure fins aquest període';
$string['enrolenddaterror'] = 'La fi del període d\'inscripció no pot ser abans de la data d\'inici.';
$string['enrolme'] = 'Inscriu-me';
$string['enrolperiod'] = 'Duració de la inscripció';
$string['enrolperiod_desc'] = 'La duració del temps d\'inscripció per defecte en segons. Si es configura amb el valor cero, la duració de la inscripció esdevé il·limitada.';
$string['enrolperiod_help'] = 'La data en que la inscripció és vàlida, que comença al moment en que l\'usuari s\'inscriu ell mateix. Si es deshabilita, la duració de la inscripció esdevé il·limitada.';
$string['enrolstartdate'] = 'Data d\'inici';
$string['enrolstartdate_help'] = 'Si s\'habilita, els usuaris només es poden inscriure a partir d\'aquest període';
$string['groupkey'] = 'Utilitza les claus d\'inscripció del grup';
$string['groupkey_desc'] = 'Utilitza les claus d\'inscripció de grup per defecte.';
$string['groupkey_help'] = 'A més a més de restringir l\'accés  al curs, a l\'únic que coneix la clau, utilitza una clau d\'inscripció de grup. Els usuaris s\'afegiran al grup de forma automàtica quan s\'inscriguen al curs.

Per utilitzar una clau d\'inscripció de grup, cal especificar una clau d\'inscripció als paràmetres del curs així com la clau d\'inscripció de grup als paràmetres del grup.';
$string['longtimenosee'] = 'Cancel·la la inscripció si roman inactiu des de';
$string['longtimenosee_help'] = 'Si els usuaris no han accedit a un curs després d\'un llarg període de temps, se\'ls cancel·larà la inscripció de forma automàtica.
Aquest paràmetre especifica aquest temps límit.';
$string['maxenrolled'] = 'Nombre màxim d\'usuaris inscrits';
$string['maxenrolled_help'] = 'Especifica el nombre màxim d\'usuaris que es poden inscriure. 0 significa que no hi ha límit';
$string['maxenrolledreached'] = 'Ja s\'ha assolit el nombre màxim d\'usuaris que heu permès auto inscriure\'s.';
$string['nopassword'] = 'No cal clau d\'inscripció.';
$string['password'] = 'Clau d\'inscripció';
$string['password_help'] = 'Una clau d\'inscripció habilita per accedir al curs que està restringit sols als qui coneixen la clau.

Si el camp es deixa en blanc, qualsevol usuari podrà inscriure\'s al curs.

Si especifiqueu una clau d\'inscripció, qualsevol usuari que intenti inscriure\'s al curs, haurà de donar la clau. Avís: L\'usuari sols haurà de posar la clau d\'inscripció UNA sola vegada quan s\'inscrigui al curs.';
$string['passwordinvalid'] = 'Clau d\'inscripció incorrecta, prova-ho una altre cop';
$string['passwordinvalidhint'] = 'Aquesta clau d\'inscripció es errònia, si us plau torneu a intentar-ho<br />
(Heus ací una pista: comença per \'{$a}\'.)

(Una pista: comença per \'{$a}\'';
$string['pluginname'] = 'Auto inscripció';
$string['pluginname_desc'] = 'El connector d\'auto inscripció  habilita als usuaris per escollir els cursos en els quals volen participar. Els cursos poden estar protegits per una clau d\'inscripció. La inscripció es fa de forma interna amb el connector d\'inscripció el qual ha d\'estar habilitat al mateix curs.';
$string['requirepassword'] = 'És necessària una clau d\'inscripció';
$string['requirepassword_desc'] = 'Força la clau d\'inscripció per als cursos nous i impedeix la cancel·lació de la inscripció als cursos que ja existien.';
$string['role'] = 'Rol assignat per defecte';
$string['self:config'] = 'Auto-configura instàncies d\'inscripció';
$string['self:manage'] = 'Gestioni els usuaris inscrits';
$string['self:unenrol'] = 'Cancel·la la inscripció d\'usuaris del curs';
$string['self:unenrolself'] = 'Cancel·la la inscripció teva del curs';
$string['sendcoursewelcomemessage'] = 'Envia un missatge de benvinguda al curs';
$string['sendcoursewelcomemessage_help'] = 'Si s\'habilita, els usuaris rebran un missatge de benvinguda per correu electrònic quan auto-inscriguin al curs.';
$string['showhint'] = 'Mostra la pista';
$string['showhint_desc'] = 'Mostra la primera lletra de la contrasenya d\'accés del convidat.';
$string['status'] = 'Habilita les auto-inscripcions.';
$string['status_desc'] = 'Permet als usuaris auto-inscriure\'s al curs per defecte.';
$string['status_help'] = 'Aquest paràmetre determina quan un usuari pot inscriure\'s ( i també auto-cancel·lar si té el permís apropiat) ell mateix al curs.';
$string['unenrol'] = 'Cancel·la la inscripció de l\'usuari.';
$string['unenrolselfconfirm'] = 'De veritat voleu cancel·lar la vostra inscripció al curs "{$a}"?';
$string['unenroluser'] = 'De veritat voleu cancel·lar la inscripció de l\'usuari "{$a->user}" al curs  "{$a->course}"?';
$string['usepasswordpolicy'] = 'Utilitza la política de contrasenyes.';
$string['usepasswordpolicy_desc'] = 'Utilitza la política de contrasenyes estàndard per la inscripció de claus.';
$string['welcometocourse'] = 'Benvingut/da a {$a}';
$string['welcometocoursetext'] = 'Benvingut/da a {$a->coursename}!
Una de les primeres coses que hauríeu de fer és editar el vostre perfil de manera que tothom us pugui conèixer una mica més:
{$a->profileurl}';
