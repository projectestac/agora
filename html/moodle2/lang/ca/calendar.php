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
 * Strings for component 'calendar', language 'ca', branch 'MOODLE_23_STABLE'
 *
 * @package   calendar
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['advancedoptions'] = 'Opcions avançades';
$string['allday'] = 'Tot el dia';
$string['calendar'] = 'Calendari';
$string['calendarheading'] = 'Calendari {$a}';
$string['calendarpreferences'] = 'Preferències del calendari';
$string['calendarurl'] = 'URL del calendari: {$a}';
$string['clickhide'] = 'feu clic per ocultar';
$string['clickshow'] = 'feu clic per mostrar';
$string['commontasks'] = 'Opcions';
$string['confirmeventdelete'] = 'Esteu segur que voleu suprimir aquest esdeveniment?';
$string['course'] = 'Curs';
$string['courseevent'] = 'Esdeveniment de curs';
$string['courseevents'] = 'Esdeveniments del curs';
$string['courses'] = 'Cursos';
$string['dayview'] = 'Visualització del dia';
$string['daywithnoevents'] = 'Aquest dia no té esdeveniments.';
$string['default'] = 'Per defecte';
$string['deleteevent'] = 'Suprimeix esdeveniment';
$string['deleteevents'] = 'Suprimeix esdeveniments';
$string['detailedmonthview'] = 'Visualització detallada del mes';
$string['durationminutes'] = 'Durada en minuts';
$string['durationnone'] = 'Sense durada';
$string['durationuntil'] = 'Fins';
$string['editevent'] = 'S\'està editant l\'esdeveniment';
$string['errorbeforecoursestart'] = 'No es pot definir l\'esdeveniment abans de la data d\'inici del curs';
$string['errorinvaliddate'] = 'La data no és vàlida';
$string['errorinvalidminutes'] = 'Especifiqueu la durada en minuts (entre 1 i 999).';
$string['errorinvalidrepeats'] = 'Especifiqueu el nombre d\'esdeveniments (entre 1 i 999).';
$string['errornodescription'] = 'La descripció és necessària';
$string['errornoeventname'] = 'El nom és necessari';
$string['eventdate'] = 'Data';
$string['eventdescription'] = 'Descripció';
$string['eventduration'] = 'Durada';
$string['eventendtime'] = 'Final';
$string['eventinstanttime'] = 'Hora';
$string['eventkind'] = 'Tipus d\'esdeveniment';
$string['eventname'] = 'Nom';
$string['eventnone'] = 'No hi ha esdeveniments';
$string['eventrepeat'] = 'Es repeteix';
$string['eventsall'] = 'Tots els esdeveniments';
$string['eventsfor'] = 'Esdeveniments {$a}';
$string['eventskey'] = 'Llegenda d\'esdeveniments';
$string['eventsrelatedtocourses'] = 'Esdeveniments relacionats amb els cursos';
$string['eventstarttime'] = 'Data d\'inici';
$string['eventtime'] = 'Hora';
$string['eventview'] = 'Detalls de l\'esdeveniment';
$string['expired'] = 'Ha vençut';
$string['explain_site_timeformat'] = 'Podeu triar la visualització de les hores a tot el lloc en format de 12 o 24 h. Si trieu "per defecte", el format es determinarà automàticament conforme a l\'idioma del lloc. Els usuaris podran triar format igualment en les seves preferències.';
$string['export'] = 'Exportació';
$string['exportbutton'] = 'Exporta';
$string['exportcalendar'] = 'Exporta calendari';
$string['for'] = 'per a';
$string['fri'] = 'dv';
$string['friday'] = 'divendres';
$string['generateurlbutton'] = 'Genera URL del calendari';
$string['global'] = 'Global';
$string['globalevent'] = 'Esdeveniment global';
$string['globalevents'] = 'Esdeveniments globals';
$string['gotocalendar'] = 'Vés al calendari';
$string['group'] = 'Grup';
$string['groupevent'] = 'Esdeveniment de grup';
$string['groupevents'] = 'Esdeveniments de grup';
$string['hidden'] = 'ocult';
$string['ical'] = 'iCal';
$string['invalidtimedurationminutes'] = 'La durada en minuts que heu introduït no és vàlida. Si us plau, introduïu un valor més gran de zero o escolliu sense durada.';
$string['invalidtimedurationuntil'] = 'La data i hora que heu escollit per l\'hora final és abans de l\'hora inicial. Si us plau, corregiu-ho abans de continuar.';
$string['iwanttoexport'] = 'Exporta';
$string['manyevents'] = '{$a} esdeveniments';
$string['mon'] = 'dl';
$string['monday'] = 'dilluns';
$string['monthlyview'] = 'Visualització del mes';
$string['monthnext'] = 'Més següent';
$string['monththis'] = 'Aquest mes';
$string['newevent'] = 'Nou esdeveniment';
$string['noupcomingevents'] = 'No hi ha esdeveniments propers.';
$string['oneevent'] = 'un esdeveniment';
$string['preferences'] = 'Preferències';
$string['preferences_available'] = 'Preferències personals';
$string['pref_lookahead'] = 'Esdeveniments propers';
$string['pref_lookahead_help'] = 'Això estableix el (màxim) nombre de dies futurs en què pot caure l\'inici d\'un esdeveniment per tal de mostrar-se com a esdeveniment proper. Els esdeveniments que comencin més enllà no es mostraran mai com a propers. Si us plau, pareu esment en què <strong>no hi ha cap garantia</strong> que els esdeveniments que comencin en aquest interval es mostrin; si n\'hi ha molts (més que els especificats al paràmetre "Nombre màxim d\'esdeveniments propers") aleshores els més distants no es mostraran.';
$string['pref_maxevents'] = 'Nombre màxim d\'esdeveniments propers';
$string['pref_maxevents_help'] = 'Això estableix el nombre màxim d\'esdeveniments propers que poden mostrar-se. Si hi poseu un número molt gran és possible que els esdeveniments mostrats ocupin molt d\'espai a la vostra pantalla.';
$string['pref_persistflt'] = 'Recorda els paràmetres de filtre';
$string['pref_persistflt_help'] = 'Si això està habilitat, el Moodle recordarà els vostres darrers arranjaments de filtre i els restaurarà automàticament cada vegada que inicieu la sessió.';
$string['pref_startwday'] = 'Primer dia de la setmana';
$string['pref_startwday_help'] = 'Les setmanes del calendari es mostraran començant pel dia que escolliu aquí.';
$string['pref_timeformat'] = 'Format de visualització de l\'hora';
$string['pref_timeformat_help'] = 'Podeu escollir visualitzar els temps en format de 12 hores o bé de 24. Si escolliu "omissió", llavors el format s\'escollirà automàticament en funció de l\'idioma que utilitzeu al lloc.';
$string['quickdownloadcalendar'] = 'Baixa subscripció al calendari';
$string['recentupcoming'] = 'Recents i els propers 60 dies';
$string['repeatedevents'] = 'Esdeveniments periòdics';
$string['repeateditall'] = 'Aplica els canvis als altres {$a} esdeveniments d\'aquesta sèrie';
$string['repeateditthis'] = 'Aplica els canvis només a aquest esdeveniment';
$string['repeatevent'] = 'Repeteix aquest esdeveniment';
$string['repeatnone'] = 'No es repeteix';
$string['repeatweeksl'] = 'Es repeteix cada setmana, crea ara';
$string['repeatweeksr'] = 'esdeveniments';
$string['sat'] = 'ds';
$string['saturday'] = 'dissabte';
$string['shown'] = 'mostrat';
$string['spanningevents'] = 'Esdeveniments en marxa';
$string['sun'] = 'dg';
$string['sunday'] = 'diumenge';
$string['thu'] = 'dj';
$string['thursday'] = 'dijous';
$string['timeformat_12'] = '12 hores (am/pm)';
$string['timeformat_24'] = '24 hores';
$string['today'] = 'Avui';
$string['tomorrow'] = 'Demà';
$string['tt_deleteevent'] = 'Suprimeix esdeveniment';
$string['tt_editevent'] = 'Edita esdeveniment';
$string['tt_hidecourse'] = 'S\'estan mostrant els esdeveniments de curs (feu clic per ocultar)';
$string['tt_hideglobal'] = 'S\'estan mostrant els esdeveniments globals (feu clic per ocultar)';
$string['tt_hidegroups'] = 'S\'estan mostrant els esdeveniments de grup (feu clic per ocultar)';
$string['tt_hideuser'] = 'S\'estan mostrant els esdeveniments de l\'usuari (feu clic per ocultar)';
$string['tt_showcourse'] = 'Els esdeveniments del curs estan ocults (feu clic per mostrar)';
$string['tt_showglobal'] = 'Els esdeveniments globals estan ocults (feu clic per mostrar)';
$string['tt_showgroups'] = 'Els esdeveniments de grup estan ocults (feu clic per mostrar)';
$string['tt_showuser'] = 'Els esdeveniments de l\'usuari estan ocults (feu clic per mostrar)';
$string['tue'] = 'dt';
$string['tuesday'] = 'dimarts';
$string['typecourse'] = 'Esdeveniment del curs';
$string['typegroup'] = 'Esdeveniment de grup';
$string['typesite'] = 'Esdeveniment del lloc';
$string['typeuser'] = 'Esdeveniment de l\'usuari';
$string['upcomingevents'] = 'Esdeveniments propers';
$string['urlforical'] = 'URL per a subscriure\'s al calendari en format iCal';
$string['user'] = 'Usuari';
$string['userevent'] = 'Esdeveniment d\'usuari';
$string['userevents'] = 'Esdeveniments de l\'usuari';
$string['wed'] = 'dc';
$string['wednesday'] = 'dimecres';
$string['weeknext'] = 'Setmana següent';
$string['weekthis'] = 'Aquesta setmana';
$string['yesterday'] = 'Ahir';
$string['youcandeleteallrepeats'] = 'Aquest esdeveniment és part d\'una sèrie d\'esdeveniments que es repeteixen. Podeu suprimir només aquest esdeveniment, o tots els {$a} de la sèrie alhora.';
