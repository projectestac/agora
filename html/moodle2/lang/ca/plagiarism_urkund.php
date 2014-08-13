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
 * Strings for component 'plagiarism_urkund', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   plagiarism_urkund
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['defaultsdesc'] = 'Els següents paràmetres són els valors predeterminats quan s\'habilita URKUND dins d\'un mòdul d\'activitat';
$string['defaultupdated'] = 'Els valors per defecte s\'han actualitzat';
$string['filereset'] = 'S\'ha restablert un fitxer per tornar a enviar-lo a URKUND';
$string['optout'] = 'Opt-out';
$string['pending'] = 'Aquest fitxer està pendent d\'enviar-se a URKUND';
$string['pluginname'] = 'Connector de plagi d\'URKUND';
$string['previouslysubmitted'] = 'Enviat anteriorment com';
$string['processing'] = 'Aquest fitxer ha estat enviat a URKUND, i ara és a l\'espera que l\'anàlisi estigui disponibles';
$string['savedconfigfailed'] = 'Heu introduït un nom d\'usuari/contrasenya incorrecte, URKUND s\'ha desactivat, si us plau, torneu-ho a intentar.';
$string['savedconfigsuccess'] = 'S\'ha guardat la configuració de plagi';
$string['showwhenclosed'] = 'Quan l\'activitat està tancada';
$string['similarity'] = 'URKUND';
$string['studentdisclosure'] = 'Divulgació de l\'estudiant';
$string['studentdisclosuredefault'] = 'Tots els fitxers carregats s\'enviaran al servei de detecció de plagi de URKUND, Si voleu evitar que s\'utilitzi el vostre document com una font per a l\'anàlisi fora d\'aquest lloc per altres organitzacions, podeu utilitzar l\'enllaç opt-out que surt després que es generi l\'informe.';
$string['studentdisclosure_help'] = 'Aquest text es mostrarà a tots els estudiants a la pàgina de càrrega d\'arxius.';
$string['studentemailcontent'] = 'El fitxer que heu enviat a {$a-> nomdelmòdul} de {$a->nomdelcurs} ha estat processat per l\'eina de plagi de URKUND. {$A->enllaçdelmòdul}


Si voleu evitar que s\'utilitzi el vostre document com una font per a l\'anàlisi fora d\'aquest lloc per altres organitzacions, podeu utilitzar aquest enllaç a opt-out:. {$ A->optoutlink}';
$string['studentemailsubject'] = 'Fitxer processat per URKUND';
$string['submitondraft'] = 'Envieu el fitxer un cop carregat';
$string['submitonfinal'] = 'Envieu el fitxer quan l\'estudiant l\'envia per avaluar';
$string['toolarge'] = 'Aquest fitxer és massa gran perquè URKUND el pugui processar';
$string['unknownwarning'] = 'S\'ha produït un error quan s\'intentava enviar aquest fitxer a URKUND';
$string['unsupportedfiletype'] = 'Aquest tipus de fitxer no és compatible amb URKUND';
$string['urkund'] = 'Connector de plagi de URKUND';
$string['urkund_api'] = 'Direcció d\'integració de URKUND';
$string['urkund_api_help'] = 'Aquesta és la direcció de l\'API URKUND';
$string['urkunddefaults'] = 'Configuració de URKUND';
$string['urkund_draft_submit'] = 'Quan s\'hauria d\'enviar el fitxer a URKUND';
$string['urkundexplain'] = 'Si voleu més informació sobre aquest connector aneu a: <a href="http://www.urkund.com/int/en/" target="_blank">http://www.urkund.com/int/en/</a>';
$string['urkund_lang'] = 'Idioma';
$string['urkund_lang_help'] = 'Codi de llenguatge proporcionat per URKUND';
$string['urkund_password'] = 'Contrasenya';
$string['urkund_password_help'] = 'Contrasenya proporcionada per URKUND per accedir a API';
$string['urkund_receiver'] = 'Receptor de l\'adreça';
$string['urkund_receiver_help'] = 'Aquesta és l\'única adreça que ofereix URKUND al professor';
$string['urkund_show_student_report'] = 'Mostra l\'informe de similitud als alumnes';
$string['urkund_show_student_report_help'] = 'L\'informe de similitud mostra un desglossament de quines parts de la tramesa són plagi i el lloc on URKUND ha detactat per primera vegada aquest contingut';
$string['urkund_show_student_score'] = 'Mostra el percentatge de similitud a l\'alumne';
$string['urkund_show_student_score_help'] = 'El percentatge de similitud és el percentatge de la tramesa que s\'ha relacionat amb un altre contingut.';
$string['urkund_studentemail'] = 'Envia un correu electrònic a l\'alumne';
$string['urkund_studentemail_help'] = 'En processar un fitxer s\'enviarà un correu electrònic a l\'alumne per fer-li saber que hi ha un informe disponible, el correu electrònic també inclou l\'enllaç opt-out.';
$string['urkund_username'] = 'Nom d\'usuari';
$string['urkund_username_help'] = 'Nom d\'usuari proporcionat per URKUND per accedir a API';
$string['useurkund'] = 'Activa URKUND';
