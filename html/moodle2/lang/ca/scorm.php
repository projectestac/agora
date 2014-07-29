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
 * Strings for component 'scorm', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   scorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activation'] = 'Activació';
$string['activityloading'] = 'Es redirigirà automàticament a l\'activitat en';
$string['activityoverview'] = 'Hi ha pàquets SCORM que requereixen la vostra atenció';
$string['activitypleasewait'] = 'Carregant activitat, espereu si us plau ...';
$string['adminsettings'] = 'Paràmetres d\'administació';
$string['advanced'] = 'Paràmetres';
$string['aicchacpkeepsessiondata'] = 'Dades de sessió AICC HACP';
$string['aicchacpkeepsessiondata_desc'] = 'Període de temps durant el qual es mantindran les dades de la sessió externa AICC HACP (un valor alt omplirà la taula amb dades antigues, però pot ser útil a l\'hora de depurar)';
$string['aicchacptimeout'] = 'Temps d\'espera AICC HACP';
$string['aicchacptimeout_desc'] = 'Període de temps en minuts que una sessió externa AICC HACP es mantindrà oberta';
$string['allowapidebug'] = 'Activar depuració i traçat API (ajustar la màscara de captura amb apidebugmask)';
$string['allowtypeaicchacp'] = 'Habilitar AICC HACP extern';
$string['allowtypeaicchacp_desc'] = 'Si s\'habilita permet comunicacions externes AICC HACP sense necessitat d\'identificació de l\'usuari per a peticions d\'un paquet AICC extern.';
$string['allowtypeexternal'] = 'Habilitar tipus de paquet extern';
$string['allowtypeexternalaicc'] = 'Habilitar url AICC directa';
$string['allowtypeexternalaicc_desc'] = 'Si s\'habilita permet una url directa a un paquet AICC simple';
$string['allowtypelocalsync'] = 'Habilitar tipus de paquet descarregat';
$string['apidebugmask'] = 'Màscara de captura de depuració API (regex simple en &lt;username&gt;:&lt;activityname&gt;)';
$string['areacontent'] = 'Arxius de contingut';
$string['areapackage'] = 'Arxiu de paquet';
$string['asset'] = 'Recurs';
$string['assetlaunched'] = 'Recurs - visualitzat';
$string['attempt'] = 'Intent';
$string['attempt1'] = '1 intent';
$string['attempts'] = 'Intents';
$string['attemptsmanagement'] = 'Gestió dels intents';
$string['attemptstatusall'] = 'La meva carpeta personal i pàgina d\'entrada';
$string['attemptstatusentry'] = 'Només la meva pàgina d\'entrada';
$string['attemptstatusmy'] = 'Només la meva carpeta personal';
$string['attemptsx'] = '{$a} intents';
$string['attr_error'] = 'Valor incorrecte de l\'atribut ({$a->attr}) en l\'etiqueta {$a->tag}';
$string['autocontinue'] = 'Continuació automàtica';
$string['autocontinuedesc'] = 'Aquesta preferència fixa la continuació automàtica per defecte de l\'activitat';
$string['autocontinue_help'] = '<p><b>Continuació automàtica</b></p>

<p>Si trieu l\'opció de continuació automàtica, quan el SCO cridi el mètode de "comunicació pròxima", automàticament es llançarà el següent SCO disponible.</p>

<p>Si no utilitzeu aquesta opció, els usuaris hauran de fer servir el botó "Continua" per seguir.</p>';
$string['averageattempt'] = 'Mitjana d\'intents';
$string['badmanifest'] = 'El manifest té errors: vg. el registre d\'errors';
$string['browse'] = 'Explora';
$string['browsed'] = 'Explorat';
$string['browsemode'] = 'Mode exploració';
$string['browserepository'] = 'Explora el repositori';
$string['cannotfindsco'] = 'No s\'ha trobat SCO';
$string['chooseapacket'] = 'Tria un paquet SCORM';
$string['compatibilitysettings'] = 'Configuració de compatibilitat';
$string['completed'] = 'Completat';
$string['completionscorerequired'] = 'Requereix una puntuació mínima';
$string['completionscorerequired_help'] = 'Si s\'activa aquest paràmetre, l\'usuari haurà de tenir almenys la puntuació mínima introduïda perquè aquesta activitat SCORM li sigui qualificada com a completa, a més a més de qualsevol altre requeriment de compleció de l\'activitat.';
$string['completionstatus_completed'] = 'Completat';
$string['completionstatus_passed'] = 'Passat';
$string['completionstatusrequired'] = 'Estat requerit';
$string['completionstatusrequired_help'] = 'Marcar un o més estats requerirà que l\'usuari aconsegueixi almenys un dels estats marcats perquè aquesta activitat SCORM li sigui qualificada com a completa o finalitzada, a més a més de necessitar complir els altres requeriments de finalització de l\'activitat, si hi haguera.';
$string['confirmloosetracks'] = 'Avís: sembla que s\'hagi canviat o modificat el paquet. Si l\'estructura del paquet ha canviat, les dades de seguiment dels usuaris es podrien perdre durant l\'actualització.';
$string['contents'] = 'Continguts';
$string['coursepacket'] = 'Paquet de curs';
$string['coursestruct'] = 'Estructura del curs';
$string['currentwindow'] = 'Finestra actual';
$string['datadir'] = 'S\'ha produït un error del sistema de fitxers: no s\'ha pogut crear el directori de dades del curs';
$string['defaultdisplaysettings'] = 'Configuració de pantalla predeterminada';
$string['defaultgradesettings'] = 'Configuració de qualificacions predeterminada';
$string['defaultothersettings'] = 'Altres configuracions predeterminades';
$string['deleteallattempts'] = 'Suprimeix tots els intents SCORM';
$string['deleteattemptcheck'] = 'Està completament segur de que vol eliminar aquests intents?';
$string['deleteuserattemptcheck'] = 'Està completament segur de que vol eliminar tots els seus intents?';
$string['details'] = 'Detalls de seguiment';
$string['directories'] = 'Mostra els enllaços del directori';
$string['disabled'] = 'Deshabilitat';
$string['display'] = 'Visualitza';
$string['displayattemptstatus'] = 'Mostrar estat dels intents';
$string['displayattemptstatusdesc'] = 'Aquesta preferència estableix el valor per defecte del paràmetre mostrar l\'estat dels intents';
$string['displayattemptstatus_help'] = 'Si està activat, les puntuacions i les qualificacions es mostren a la plana de resum SCORM';
$string['displaycoursestructure'] = 'Mostra l\'estructura del curs a la plana d\'entrada';
$string['displaycoursestructuredesc'] = 'Aquesta preferència estableix el valor per defecte per mostrar el paràmetre mostra estructura a la plana d\'entrada';
$string['displaycoursestructure_help'] = 'Si esta activat, la taula de continguts es mostrarà a la plana resum SCORM';
$string['displaydesc'] = 'Aquesta preferència estableix el valor per defecte per mostrar o no el paquet d\'una activitat';
$string['displaysettings'] = 'Configuració de pantalla';
$string['dnduploadscorm'] = 'Afegeix un paquet SCORM nou';
$string['domxml'] = 'Biblioteca externa DOMXML';
$string['duedate'] = 'Venciment';
$string['element'] = 'Element';
$string['enter'] = 'Entra';
$string['entercourse'] = 'Entra al curs SCORM';
$string['errorlogs'] = 'Registre d\'errors';
$string['everyday'] = 'Cada dia';
$string['everytime'] = 'Cada vegada que s\'utilitzi';
$string['exceededmaxattempts'] = 'Has arribat al nombre màxim d\'intents';
$string['exit'] = 'Surt del curs';
$string['exitactivity'] = 'Surt de l\'activitat';
$string['expired'] = 'Ho sentim, aquesta activitat es va tancar el {$a} i ja no està disponible';
$string['external'] = 'Termini d\'actualització de paquets externs';
$string['failed'] = 'Fallat';
$string['finishscorm'] = 'Si ha acabat de veure aquest recurs, {$a}';
$string['finishscormlinkname'] = 'fes clic aquí per tornar a la plana del curs';
$string['firstaccess'] = 'Primer accés';
$string['firstattempt'] = 'Primer intent';
$string['forcecompleted'] = 'Forçar completats';
$string['forcecompleteddesc'] = 'Aquesta preferència estableix el valor per defecte per mostrar el paràmetre forçar completats';
$string['forcecompleted_help'] = 'Si s\'activa, l\'estat de l\'intent actual es canvia a "completat". Aquest paràmetre només s\'aplica als paquets SCORM 1.2. És útil si el paquet SCORM no revisa l\'intent correctament, ja sigui en mode revisió o mode exploració, o es produeix qualsevol altre funcionament incorrecte a l\'estat completat.';
$string['forcejavascript'] = 'Forçar als usuaris a habilitar JavaScript';
$string['forcejavascript_desc'] = 'Si està activat (recomanat) impedeix l\'accés als objectes SCORM quan JavaScript no està suportat/activat al navegador de l\'usuari. Si està desactivat, l\'usuari pot veure l\'SCORM, però la comunicació API fallarà i no es guardarà la qualificació.';
$string['forcejavascriptmessage'] = 'Es requereix JavaScript per veure aquest objecte, si us plau, activeu JavaScript al vostre navegador i torneu a provar.';
$string['forcenewattempt'] = 'Forçar nou intent';
$string['forcenewattemptdesc'] = 'Aquesta preferència estableix el valor per defecte del paràmetre de forçar nou intent';
$string['forcenewattempt_help'] = 'Si està activat, cada vegada que s\'accedeixi a un paquet SCORM comptarà com a nou intent.';
$string['found'] = 'S\'ha trobat el manifest';
$string['frameheight'] = 'Aquesta preferència defineix l\'alçada per defecte del marc del SCO';
$string['framewidth'] = 'Aquesta preferència defineix l\'amplada per defecte del marc del SCO';
$string['fullscreen'] = 'Omple la pantalla completa';
$string['general'] = 'Dades generals';
$string['gradeaverage'] = 'Qualificació mitjana';
$string['gradeforattempt'] = 'Qualificació de l\'intent';
$string['gradehighest'] = 'Qualificació més alta';
$string['grademethod'] = 'Mètode de qualificació';
$string['grademethoddesc'] = 'Aquesta preferència estableix el valor per defecte del mètode de qualificació d\'una activitat';
$string['grademethod_help'] = 'El mètode de qualificació defineix com es determina la qualificació d\'un intent en l\'activitat.

Hi ha quatre mètodes d\'avaluació:

* Objectes d\'aprenentatge - El nombre d\'objectes d\'aprenentatge que s\'han completat/superat

* Qualificació més alta - La puntuació més alta obtinguda en tots els objectes d\'aprenentatge superats

* Qualificació mitjana - La mitjana de totes les puntuacions

* Suma de qualificacions - La suma de totes les puntuacions';
$string['gradereported'] = 'Qualificació enviada';
$string['gradescoes'] = 'Nombre de Sco';
$string['gradesettings'] = 'Paràmetres de qualificació';
$string['gradesum'] = 'Suma de qualificacions';
$string['height'] = 'Alçada';
$string['hidden'] = 'Ocult';
$string['hidebrowse'] = 'Inhabilita el mode d\'exploració';
$string['hidebrowsedesc'] = 'Aquesta preferència estableix el valor per defecte per activar o desactivar el mode de previsualització';
$string['hidebrowse_help'] = 'El mode de previsualització permet a l\'alumne navegar per una activitat abans de fer un intent. Si el mode previsualització està desactivat, el botó previsualització està amagat.';
$string['hideexit'] = 'Oculta l\'enllaç de sortida';
$string['hidereview'] = 'Oculta el botó Revisa';
$string['hidetoc'] = 'Mostra l\'estructura del curs en el reproductor';
$string['hidetocdesc'] = 'Aquesta preferència estableix el valor per defecte per mostrar o no la estructura del curs (TOC) al reproductor SCORM';
$string['hidetoc_help'] = 'Aquest paràmetre especifica com s\'ensenya la taula de continguts al reproductor SCORM.';
$string['highestattempt'] = 'Intent més alt';
$string['identifier'] = 'Identificador de pregunta';
$string['incomplete'] = 'Incomplet';
$string['info'] = 'Info';
$string['interactions'] = 'Interaccions';
$string['invalidactivity'] = 'L\'activitat SCORM és incorrecta';
$string['invalidhacpsession'] = 'Sessió HACP no vàlida';
$string['invalidmanifestresource'] = 'AVÍS: Els següents recursos són al manifest però no s\'han pogut trobar';
$string['invalidurl'] = 'S\'ha especificat una URL no vàlida';
$string['invalidurlhttpcheck'] = 'L\'URL especificat no és vàlid. Missatge de depuració: <pre> {$a->cmsg} </pre>';
$string['last'] = 'Darrer accés';
$string['lastaccess'] = 'Darrer accés';
$string['lastattempt'] = 'Darrer intent completat';
$string['lastattemptlock'] = 'Bloquejar després del darrer intent';
$string['lastattemptlockdesc'] = 'Aquesta preferència estableix el valor per defecte del paràmetre per al bloqueig després del darrer intent';
$string['lastattemptlock_help'] = 'Si està activat, a l\'estudiant se l\'impedeix executar el reproductor SCORM després d\'haver fet servir tots els intents disponibles.';
$string['location'] = 'Mostra la barra d\'ubicació';
$string['max'] = 'Puntuació màxima';
$string['maximumattempts'] = 'Nombre d\'intents';
$string['maximumattemptsdesc'] = 'Aquesta preferència estableix el valor per defecte sobre el nombre màxim d\'intents per una activitat';
$string['maximumattempts_help'] = 'Aquest paràmetre defineix el nombre d\'intents permesos als usuaris. Només funciona amb paquets SCORM 1.2 i AICC';
$string['maximumgradedesc'] = 'Aquesta preferència estableix el valor per defecte sobre la qualificació màxima d\'una activitat';
$string['menubar'] = 'Mostra la barra de menús';
$string['min'] = 'Puntuació mínima';
$string['missing_attribute'] = 'Falta l\'atribut {$a->attr} en l\'etiqueta {$a->tag}';
$string['missingparam'] = 'Falta un paràmetre necessari o el valor és incorrecte';
$string['missing_tag'] = 'Falta l\'etiqueta {$a->tag}';
$string['mode'] = 'Mode';
$string['modulename'] = 'Paquet SCORM';
$string['modulename_help'] = 'SCORM i AICC són un conjunt d\'especificacions que permeten la interoperabilitat, accessibilitat i reutilització dels continguts d\'aprenentatge basats en la web. El mòdul SCORM/AICC permet que s\'incloguin al curs paquets SCORM/AICC.';
$string['modulenameplural'] = 'Paquets SCORM';
$string['navigation'] = 'Navegació';
$string['newattempt'] = 'Comença un nou intent';
$string['next'] = 'Continua';
$string['noactivity'] = 'Res per informar';
$string['noattemptsallowed'] = 'Nombre d\'intents permesos';
$string['noattemptsmade'] = 'Nombre d\'intents realitzats';
$string['no_attributes'] = 'L\'etiqueta {$a->tag} ha de tenir atributs';
$string['no_children'] = 'L\'etiqueta {$a->tag} ha de tenir fills';
$string['nolimit'] = 'Intents il·limitats';
$string['nomanifest'] = 'No s\'ha trobat el manifest';
$string['noprerequisites'] = 'No compliu prou prerequisits per accedir a aquest objecte d\'aprenentatge';
$string['noreports'] = 'Cap informe per visualitzar';
$string['normal'] = 'Normal';
$string['noscriptnoscorm'] = 'El vostre navegador no pot executar JavaScript o el teniu inhabilitat. El paquet SCORM no es podrà reproduir o no desarà les dades correctament.';
$string['notattempted'] = 'No intentat';
$string['not_corr_type'] = 'El tipus de l\'etiqueta {$a->tag} no coincideix';
$string['notopenyet'] = 'Ho sentim, aquest activitat no estarà disponible fins {$a}';
$string['objectives'] = 'Objectius';
$string['optallstudents'] = 'tots els usuaris';
$string['optattemptsonly'] = 'només usuaris amb intents';
$string['options'] = 'Opcions (Impedides per alguns navegadors)';
$string['optionsadv'] = 'Opcions (Avançat)';
$string['optionsadv_desc'] = 'Si s\'activa, la finestra d\'opcions passarà  a opcions avançades al formulari';
$string['optnoattemptsonly'] = 'només usuaris sense intents';
$string['organization'] = 'Organització';
$string['organizations'] = 'Organitzacions';
$string['othersettings'] = 'Paràmetres addicionals';
$string['package'] = 'Fitxer del paquet';
$string['packagedir'] = 'S\'ha produït un error del sistema de fitxers: no es pot crear el directori del paquet';
$string['packagefile'] = 'No s\'ha especificat el fitxer del paquet';
$string['packagehdr'] = 'Paquet';
$string['package_help'] = '<p><b>Paquets</b></p>

<p>El paquet és un fitxer amb extensió <b>zip</b> (o pif) que conté fitxers vàlids de definició de cursos AICC o SCORM.</p>

<p>Un paquet <b>SCORM</b> ha de contenir en l\'arrel del zip un fitxer anomenat <b>imsmanifest.xml</b>, el qual defineix l\'estructura del curs SCORM, la ubicació dels recursos i moltes altres coses.</p>

<p>Un paquet <b>AICC</b> consta de diversos fitxers (de 4 a 7) amb extensions predefinides. Ací teniu el significat d\'aquestes extensions:</p>
   <ul>
        <li>CRS - Course Description (obligatori)</li>
        <li>AU  - Assignable Unit (obligatori)</li>
        <li>DES - Descriptor (obligatori)</li>
        <li>CST - Course Structure (obligatori)</li>
        <li>ORE - Objective Relationship (opcional)</li>
        <li>PRE - Prerequisites (opcional)</li>
        <li>CMP - Completition Requirements (opcional)</li>
   </ul>';
$string['packageurl'] = 'URL';
$string['packageurl_help'] = 'Aquest paràmetre habilita una URL per especificar un paquet SCORM en comptes de seleccionar un fitxer mitjançant el selector de fitxers.';
$string['page-mod-scorm-x'] = 'Qualsevol plana del mòdul SCORM';
$string['pagesize'] = 'Mida de la plana';
$string['passed'] = 'S\'ha passat';
$string['php5'] = 'PHP 5 (biblioteca nativa DOMXML)';
$string['pluginadministration'] = 'Administració SCORM/AICC';
$string['pluginname'] = 'Paquet SCORM';
$string['popup'] = 'Obre els objectes d\'aprenentatge en una altra finestra';
$string['popupmenu'] = 'En un menú desplegable';
$string['popupopen'] = 'Obre el paquet en una finestra nova';
$string['popupsblocked'] = 'Sembla que les finestres emergents estan bloquejades, aturant l\'execució d\'aquest mòdul SCORM. Si us plau comprovi la configuració del seu navegador abans de començar de nou.';
$string['position_error'] = 'L\'etiqueta {$a->tag} no pot ser filla de {$a->parent}';
$string['preferencespage'] = 'Preferències només per aquesta plana';
$string['preferencesuser'] = 'Preferències per aquest informe';
$string['prev'] = 'Anterior';
$string['raw'] = 'Puntuació bruta';
$string['regular'] = 'Manifest normal';
$string['report'] = 'Informe';
$string['reportcountallattempts'] = '{$a->nbattempts} intents de {$a->nbusers} usuaris, d\'un total de {$a->nbresults} resultats';
$string['reportcountattempts'] = '{$a->nbresults} resultats ({$a->nbusers} users)';
$string['reports'] = 'Informes';
$string['result'] = 'Resultat';
$string['results'] = 'Resultats';
$string['review'] = 'Revisa';
$string['reviewmode'] = 'Mode de revisió';
$string['scoes'] = 'Objectes d\'aprenentatge';
$string['score'] = 'Puntuació';
$string['scorm:addinstance'] = 'Afegeix un paquet SCORM nou';
$string['scormclose'] = 'Disponible fins';
$string['scormcourse'] = 'Curs SCORM';
$string['scorm:deleteownresponses'] = 'Esborrar els intents propis';
$string['scorm:deleteresponses'] = 'Esborrar els intents SCORM';
$string['scormloggingoff'] = 'Entrada API desactivada';
$string['scormloggingon'] = 'Entrada API activada';
$string['scormopen'] = 'Disponible des de';
$string['scormresponsedeleted'] = 'Eliminar els intents de l\'usuari';
$string['scorm:savetrack'] = 'Deixar rastres';
$string['scorm:skipview'] = 'Ometre resum';
$string['scormtype'] = 'Tipus';
$string['scormtype_help'] = 'Aquest paràmetre determina com s\'insereix el paquet en el curs. Tenim 4 opcions:

*Paquet pujat - Permet escollir un paquet SCORM mitjançant el selector de ftixers
*Manifest extern SCORM - Permet especificar una URL imsmanifest.xml. Nota: Si la URL té un domini diferent del teu lloc, llavors "Paquet descarregat" és una millor opció, donat que sinó les qualificacions no es guarden.
*Paquet descarregat - Permet especificar la URL d\'un paquet. El paquet es descomprimirà i es guardarà localment, i s\'actualitzarà quan s\'actualitzi el paquet SCORM extern.
*Repositori de contingut IMS local - Permet seleccionar un paquet d\'un repositori IMS.
* URL AICC extern - aquesta és la URL d\'inici per una activitat AICC. Es construirà un pseudo-paquet al seu voltant.';
$string['scorm:viewreport'] = 'Veure informes';
$string['scorm:viewscores'] = 'Veure puntuacions';
$string['scrollbars'] = 'Permet el desplaçament de la finestra';
$string['selectall'] = 'Seleccionar tot';
$string['selectnone'] = 'Deseleccionar tot';
$string['show'] = 'Mostrar';
$string['sided'] = 'A un costat';
$string['skipview'] = 'L\'estudiant omet la pàgina d\'estructura';
$string['skipviewdesc'] = 'Aquesta preferència estableix el valor per defecte sobre quan passar de la estructura del contingut d\'una plana';
$string['skipview_help'] = 'Aquest paràmetre especifica si la pàgina d\'estructura dels continguts ha de ser omesa (no es mostra). Si el paquet conté només un objecte d\'aprenentatge, la pàgina de l\'estructura del contingut sempre es pot saltar.';
$string['slashargs'] = 'WARNING: els arguments \'slash\' estan deshabilitats en aquest lloc i els objectes poden no tenir el funcionament esperat.';
$string['stagesize'] = 'Mida del marc o finestra';
$string['stagesize_help'] = 'Aquests dos paràmetres defineixen l\'amplada i l\'alçada del marc o finestra del objectes d\'aprenentatge.';
$string['started'] = 'Iniciat';
$string['status'] = 'Estat';
$string['statusbar'] = 'Mostra la barra d\'estat';
$string['student_response'] = 'Resposta';
$string['subplugintype_scormreport'] = 'Informe';
$string['subplugintype_scormreport_plural'] = 'Informes';
$string['suspended'] = 'Suspès';
$string['syntax'] = 'S\'ha produït un error de sintaxi';
$string['tag_error'] = 'Etiqueta desconeguda ({$a->tag}) amb aquest contingut: {$a->value}';
$string['time'] = 'Temps';
$string['title'] = 'Títol';
$string['toc'] = 'TOC (Taula de Continguts)';
$string['toolbar'] = 'Mostra la barra d\'eines';
$string['too_many_attributes'] = 'L\'etiqueta {$a->tag} té massa atributs';
$string['too_many_children'] = 'L\'etiqueta {$a->tag} té massa fills';
$string['totaltime'] = 'Temps';
$string['trackcorrectcount_help'] = 'Nombre de resultats correcte per a la pregunta';
$string['trackingloose'] = 'ATENCIÓ: les dades de seguiment d\'aquest paquet es perdran.';
$string['tracklatency_help'] = 'Temps transcorregut entre el moment que l\'alumne te disponible la interacció i el moment de la primera resposta';
$string['trackresult_help'] = 'Resultat basat en la resposta de l\'estudiant i el resultat correcte';
$string['trackscoremax_help'] = 'Valor màxim dintre del rang possible de puntuacions';
$string['trackscoremin_help'] = 'Valor mínim dintre del rang possible de puntuacions';
$string['trackscoreraw_help'] = 'Nombre que reflexa el resultat de l\'alumne en relació amb el rang delimitat pels valors mínim i màxim';
$string['tracksuspenddata_help'] = 'Proporciona espai per emmagatzemar i recuperar dades entre sessions d\'aprenentatge';
$string['tracktime_help'] = 'Hora en la que es va iniciar l\'intent';
$string['trackweight_help'] = 'Pes assignat a l\'element';
$string['type'] = 'Tipus';
$string['typeaiccurl'] = 'URL AICC externa';
$string['typeexternal'] = 'Manifest SCORM extern';
$string['typelocal'] = 'Paquet pujat';
$string['typelocalsync'] = 'Paquet descarregat';
$string['unziperror'] = 'S\'ha produït un error durant la descompressió del paquet';
$string['updatefreq'] = 'Freqüència d\'actualització automàtica';
$string['updatefreqdesc'] = 'Aquesta preferència estableix el valor per defecte sobre la freqüència d\'actualització automàtica d\'una activitat';
$string['updatefreq_help'] = 'Això permet al paquet extern ser descarregat i actualitzat de forma automàtica';
$string['validateascorm'] = 'Valida un paquet';
$string['validation'] = 'Resultat de la validació';
$string['validationtype'] = 'Aquesta preferència defineix la biblioteca DOMXML utilitzada per validar el manifest SCORM. Si no sabeu, deixeu l\'opció seleccionada per defecte.';
$string['value'] = 'Valor';
$string['versionwarning'] = 'La versió del manifest és anterior a la 1.3, avís en l\'etiqueta {$a->tag}';
$string['viewallreports'] = 'Visualitza informes de {$a} intents';
$string['viewalluserreports'] = 'Veure els informes de {$a} usuaris';
$string['whatgrade'] = 'Qualificació dels intents';
$string['whatgradedesc'] = 'Si s\'enregistra en el butlletí de qualificacions la qualificació més alta, la mitjana, la del primer o la del darrer intent completat, si es permeten diversos intents.';
$string['whatgrade_help'] = 'Si es permeten múltiples intents, aquest paràmetre especifica si s\'emmagatzemarà al llibre de qualificacions el valor més alt, el promig (la mitja), el primer intent o l\'últim.

Gestió de Múltiples Intents

* La possibilitat d\'iniciar un nou intent es troba marcant la casella que es troba a sobre del botó Enter a plana d\'estructura del contingut, així que cal assegurar-se que permet l\'accés a aquesta plana si es vol permetre més d\'un intent.
*Alguns paquets scorm són intel·ligents sobre els nous intents, però molts altres no. Això vol dir que si l\'estudiant torna a fer un intent, si el contingut SCORM no té una lògica interna per evitar la sobre escriptura dels intents anterior, aquest es poden sobre escriure fins i tot si l\'intent consta com a "completat" o "passat".
*La configuració de "Forçar completar","Forçar nou intent" i "Bloqueig després de l\'intent final" també milloren la gestió de múltiples intents.';
$string['width'] = 'Amplada';
$string['window'] = 'Finestra';
