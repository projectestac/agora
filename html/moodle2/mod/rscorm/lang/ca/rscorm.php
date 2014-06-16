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
 * Strings for component 'scorm', language 'ca', branch 'MOODLE_20_STABLE'
 *
 * @package   scorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activation'] = 'Activació';
$string['activityloading'] = 'Es redirigirà automàticament a l\'activitat en';
$string['activitypleasewait'] = 'Carregant activitat, espereu si us plau ...';
$string['advanced'] = 'Paràmetres';
$string['allowapidebug'] = 'Activar depuració i traçat API (ajustar la màscara de captura amb apidebugmask)';
$string['allowtypeexternal'] = 'Habilitar tipus de paquet extern';
$string['allowtypeimsrepository'] = 'Habilitar tipus de paquet IMS';
$string['allowtypelocalsync'] = 'Habilitar tipus de paquet descarregat';
$string['apidebugmask'] = 'Màscara de captura de depuració API (regex simple en &lt;username&gt;:&lt;activityname&gt;)';
$string['areacontent'] = 'Arxius de contingut';
$string['areapackage'] = 'Arxiu de paquet';
$string['asset'] = 'Recurs';
$string['assetlaunched'] = 'Recurs - visualitzat';
$string['attempt'] = 'intent';
$string['attempt1'] = '1 intent';
$string['attempts'] = 'Intents';
$string['attemptsx'] = '{$a} intents';
$string['attr_error'] = 'Valor incorrecte de l\'atribut ({$a->attr}) en l\'etiqueta {$a->tag}';
$string['autocontinue'] = 'Continuació automàtica';
$string['autocontinuedesc'] = 'Aquesta preferència fixa la continuació automàtica per defecte de l\'activitat';
$string['autocontinue_help'] = '<p><b>Continuació automàtica</b></p>

<p>Si trieu l\'opció de continuació automàtica, quan el SCO cridi el mètode de "comunicació pròxima", automàticament es llançarà el següent SCO disponible.</p>

<p>Si no utilitzeu aquesta opció, els usuaris hauran de fer servir el botó "Continua" per seguir.</p>';
$string['averageattempt'] = 'Mitjana d\'intents';
$string['badmanifest'] = 'El manifest té errors: vg. el registre d\'errors';
$string['badpackage'] = 'Aquest paquet té alguns problemes. Reviseu-lo i torneu-ho a intentar.';
$string['browse'] = 'Explora';
$string['browsed'] = 'Explorat';
$string['browsemode'] = 'Mode exploració';
$string['browserepository'] = 'Explora el repositori';
$string['cannotfindsco'] = 'No s\'ha trobat SCO';
$string['chooseapacket'] = 'Tria un paquet SCORM/AICC';
$string['completed'] = 'Completat';
$string['confirmloosetracks'] = 'Avís: sembla que s\'hagi canviat o modificat el paquet. Si l\'estructura del paquet ha canviat, les dades de seguiment dels usuaris es podrien perdre durant l\'actualització.';
$string['contents'] = 'Continguts';
$string['coursepacket'] = 'Paquet de curs';
$string['coursestruct'] = 'Estructura del curs';
$string['currentwindow'] = 'Finestra actual';
$string['datadir'] = 'S\'ha produït un error del sistema de fitxers: no s\'ha pogut crear el directori de dades del curs';
$string['deleteallattempts'] = 'Suprimeix tots els intents SCORM';
$string['deleteattemptcheck'] = 'Està completament segur de que vol eliminar aquests intents?';
$string['details'] = 'Detalls de seguiment';
$string['directories'] = 'Mostra els enllaços del directori';
$string['display'] = 'Visualitza';
$string['displaysettings'] = 'Configuració de pantalla';
$string['displayattemptstatus'] = 'Mostrar estat dels intents';
$string['displayattemptstatusdesc'] = 'Aquesta preferència estableix el valor per defecte del paràmetre mostrar l\'estat dels intents';
$string['displayattemptstatus_help'] = 'Si està activat, les puntuacions i les qualificacions es mostren a la plana de resum SCORM';
$string['displaycoursestructure'] = 'Mostra l\'estructura del curs a la plana d\'entrada';
$string['displaycoursestructuredesc'] = 'Aquesta preferència estableix el valor per defecte per mostrar el paràmetre mostra estructura a la plana d\'entrada';
$string['displaycoursestructure_help'] = 'Si esta activat, la taula de continguts es mostrarà a la plana resum SCORM';
$string['displaydesc'] = 'Aquesta preferència estableix el valor per defecte per mostrar o no el paquet d\'una activitat';
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
$string['grademethod_help'] = '<p>El mètode de qualificació defineix com es qualifica un intent en l\'activitat determinada. Hi ha quatre mètodes::</p>
    <ul>
	<li><b>Nombre SCO</b><br />Aquest mode mostra el nombre de SCO que s\'han passat/completat dins l\'activitat. El valor màxim és el nombre de SCO.</li>
	<li><b>Qualificació més alta</b><br />La pàgina de qualificacions mostrarà la puntuació més alta obtinguda per cada usuari en tots els SCO que hagi completat.</li>
	<li><b>Qualificació mitjana</b><br />Si trieu aquest mode, Moodle calcularà la mitjana de totes les puntuacions.</li>
	<li><b>Suma de qualificacions</b><br />En aquest mode se sumen totes totes les puntuacions.</li>
</p>';
$string['gradereported'] = 'Qualificació enviada';
$string['gradescoes'] = 'Nombre de Sco';
$string['gradesum'] = 'Suma de qualificacions';
$string['height'] = 'Alçada';
$string['hidden'] = 'Ocult';
$string['hidebrowse'] = 'Inhabilita el mode d\'exploració';
$string['hidebrowsedesc'] = 'Aquesta preferència estableix el valor per defecte per activar o desactivar el mode de previsualització';
$string['hidebrowse_help'] = 'El mode de previsualització permet a l\'alumne navegar per una activitat abans de fer un intent. Si el mode previsualització està desactivat, el botó previsualització està amagat.';
$string['hideexit'] = 'Oculta l\'enllaç de sortida';
$string['hidenav'] = 'Oculta els botons de navegació';
$string['hidenavdesc'] = 'Aquesta preferència estableix el valor per defecte per mostrar o no els botons de navegació';
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
$string['last'] = 'Darrer accés';
$string['lastaccess'] = 'Darrer accés';
$string['lastattempt'] = 'Darrer intent';
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
$string['modulename'] = 'SCORM/AICC Remot';
$string['modulename_help'] = 'SCORM i AICC són un conjunt d\'especificacions que permeten la interoperabilitat, accessibilitat i reutilització dels continguts d\'aprenentatge basats en la web. El mòdul SCORM/AICC permet que s\'incloguin al curs paquets SCORM/AICC.';
$string['modulenameplural'] = 'SCORMs/AICCs Remots';
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
$string['onchanges'] = 'Quan hi hagi modificacions';
$string['optallstudents'] = 'tots els usuaris';
$string['optattemptsonly'] = 'només usuaris amb intents';
$string['options'] = 'Opcions (Impedides per alguns navegadors)';
$string['optnoattemptsonly'] = 'només usuaris sense intents';
$string['organization'] = 'Organització';
$string['organizations'] = 'Organitzacions';
$string['othersettings'] = 'Paràmetres addicionals';
$string['othertracks'] = 'Altres rastres';
$string['package'] = 'Fitxer del paquet';
$string['packagedir'] = 'S\'ha produït un error del sistema de fitxers: no es pot crear el directori del paquet';
$string['packagefile'] = 'No s\'ha especificat el fitxer del paquet';
$string['package_help'] = '<p><b>Paquets</b></p>

<p>El paquet és un fitxer amb extensió <b>zip</b> (o pif) que conté fitxers vàlids de definició de cursos AICC o SCORM/AICC.</p>

<p>Un paquet <b>SCORM/AICC</b> ha de contenir en l\'arrel del zip un fitxer anomenat <b>imsmanifest.xml</b>, el qual defineix l\'estructura del curs SCORM, la ubicació dels recursos i moltes altres coses.</p>

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
$string['packageurl_help'] = 'Aquest paràmetre habilita una URL per especificar un paquet SCORM/AICC en comptes de seleccionar un fitxer mitjançant el selector de fitxers.';
$string['pagesize'] = 'Mida de la plana';
$string['passed'] = 'S\'ha passat';
$string['php5'] = 'PHP 5 (biblioteca nativa DOMXML)';
$string['pluginadministration'] = 'Administració SCORM/AICC';
$string['pluginname'] = 'SCORM/AICC';
$string['popup'] = 'Obre els objectes d\'aprenentatge en una altra finestra';
$string['popupmenu'] = 'En un menú desplegable';
$string['popupopen'] = 'Obre el paquet en una finestra nova';
$string['popupsblocked'] = 'Sembla que les finestres emergents estan bloquejades, aturant l\'execució d\'aquest mòdul SCORM/AICC. Si us plau comprovi la configuració del seu navegador abans de començar de nou.';
$string['position_error'] = 'L\'etiqueta {$a->tag} no pot ser filla de {$a->parent}';
$string['preferencespage'] = 'Preferències només per aquesta plana';
$string['preferencesuser'] = 'Preferències per aquest informe';
$string['prev'] = 'Anterior';
$string['raw'] = 'Puntuació bruta';
$string['regular'] = 'Manifest normal';
$string['report'] = 'Informe';
$string['reportcountallattempts'] = '{$a->nbattempts} intents de {$a->nbusers} usuaris, d\'un total de {$a->nbresults} resultats';
$string['reportcountattempts'] = '{$a->nbresults} resultats ({$a->nbusers} users)';
$string['resizable'] = 'Permet redimensionar la finestra';
$string['result'] = 'Resultat';
$string['results'] = 'Resultats';
$string['review'] = 'Revisa';
$string['reviewmode'] = 'Mode de revisió';
$string['scoes'] = 'Objectes d\'aprenentatge';
$string['score'] = 'Puntuació';
$string['scormclose'] = 'Fins';
$string['scormcourse'] = 'Curs SCORM/AICC';
$string['scorm:deleteresponses'] = 'Esborrar els intents SCORM';
$string['rscorm:deleteresponses'] = 'Esborrar els intents SCORM';
$string['rscorm:addinstance'] = 'Afegir un nou SCORM/AICC';
$string['rscormclose'] = 'Fins';
$string['rscormcourse'] = 'Curs SCORM/AICC';
$string['rscorm:deleteresponses'] = 'Esborra SCORM intents';
$string['rscormloggingoff'] = 'Entrada API desactivada';
$string['rscormloggingon'] = 'Entrada API activada';
$string['rscormopen'] = 'Obert';
$string['rscormresponsedeleted'] = 'Eliminar els intents de l\'usuari';
$string['rscorm:deleteownresponses'] = 'Eliminar els meus intents';
// MARSUPIAL ********** MODIFICAT - to set it operative
$string['rscorm:savetrack'] = 'Deixar rastres';
$string['rscorm:skipview'] = 'Ometre resum';
$string['rscorm:viewreport'] = 'Veure informes';
$string['rscorm:viewscores'] = 'Veure puntuacions';
// ********** FI

$string['rscormtype'] = 'Tipus';
$string['rscormtype_help'] = 'This setting determines how the package is included in the course. There are up to 4 options:';

$string['scormloggingoff'] = 'Entrada API desactivada';
$string['scormloggingon'] = 'Entrada API activada';
$string['scormopen'] = 'Obrir';
$string['scormresponsedeleted'] = 'Eliminar els intents de l\'usuari';
$string['scorm:savetrack'] = 'Deixar rastres';
$string['scorm:skipview'] = 'Ometre resum';
$string['scormtype'] = 'Tipus';
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
$string['suspended'] = 'Suspès';
$string['syntax'] = 'S\'ha produït un error de sintaxi';
$string['tag_error'] = 'Etiqueta desconeguda ({$a->tag}) amb aquest contingut: {$a->value}';
$string['time'] = 'Temps';
$string['timerestrict'] = 'Restringir la resposta a aquest període de temps';
$string['title'] = 'Títol';
$string['toc'] = 'TOC (Taula de Continguts)';
$string['toolbar'] = 'Mostra la barra d\'eines';
$string['too_many_attributes'] = 'L\'etiqueta {$a->tag} té massa atributs';
$string['too_many_children'] = 'L\'etiqueta {$a->tag} té massa fills';
$string['totaltime'] = 'Temps';
$string['trackingloose'] = 'ATENCIÓ: les dades de seguiment d\'aquest paquet es perdran.';
$string['type'] = 'Tipus';
$string['typeexternal'] = 'Manifest SCORM/AICC extern';
$string['typeimsrepository'] = 'Repositori de contingut IMS local';
$string['typelocal'] = 'Paquet pujat';
$string['typelocalsync'] = 'Paquet descarregat';
$string['unziperror'] = 'S\'ha produït un error durant la descompressió del paquet';
$string['updatefreq'] = 'Freqüència d\'actualització automàtica';
$string['updatefreqdesc'] = 'Aquesta preferència estableix el valor per defecte sobre la freqüència d\'actualització automàtica d\'una activitat';
$string['validateascorm'] = 'Valida un paquet';
$string['validation'] = 'Resultat de la validació';
$string['validationtype'] = 'Aquesta preferència defineix la biblioteca DOMXML utilitzada per validar el manifest SCORM/AICC. Si no sabeu, deixeu l\'opció seleccionada per defecte.';
$string['value'] = 'Valor';
$string['versionwarning'] = 'La versió del manifest és anterior a la 1.3, avís en l\'etiqueta {$a->tag}';
$string['viewallreports'] = 'Visualitza informes de {$a} intents';
$string['viewalluserreports'] = 'Veure els informes de {$a} usuaris';
$string['whatgrade'] = 'Qualificació dels intents';
$string['whatgradedesc'] = 'Aquesta preferència estableix el valor per defecte sobre la qualificació dels intents';
$string['whatgrade_help'] = 'Si es permeten múltiples intents, aquest paràmetre especifica si s\'emmagatzemarà al llibre de qualificacions el valor més alt, el promig (la mitja), el primer intent o l\'últim.

Gestió de Múltiples Intents

* La possibilitat d\'iniciar un nou intent es troba marcant la casella que es troba a sobre del botó Enter a plana d\'estructura del contingut, així que cal assegurar-se que permet l\'accés a aquesta plana si es vol permetre més d\'un intent.
*Alguns paquets scorm són intel·ligents sobre els nous intents, però molts altres no. Això vol dir que si l\'estudiant torna a fer un intent, si el contingut SCORM/AICC no té una lògica interna per evitar la sobre escriptura dels intents anterior, aquest es poden sobre escriure fins i tot si l\'intent consta com a "completat" o "passat".
*La configuració de "Forçar completar","Forçar nou intent" i "Bloqueig després de l\'intent final" també milloren la gestió de múltiples intents.';
$string['width'] = 'Amplada';
$string['window'] = 'Finestra';
//MARSUPIAL ********** AFEGIT - text strings
$string['level']='Nivell';
$string['isbn']='Llibre (ISBN)';
$string['unit']='Unitat';
$string['activity']='Activitat';

$string['isbnerror']='Heu de seleccionar una opció vàlida aquí.';

$string['parametererror']='Par√†metre ID no està present en la cadena de sol.licitud';
$string['jsonerror']='La cadena ajax de resposta no és vàlida';
$string['ajaxresponseerror']='Resposta ajax no vàlida';
$string['errorloadinstancebd']='No es pot carregar de la base de dades la instància sol.licitada';
$string['errorloadcoursebd']='No es pot carregar de la base de dades el id del curs';
$string['wsautenticationerror']='El web services d\'autenticació a respos amb un error';
$string['documentdomain'] = "Domini document";
// ********** FI
