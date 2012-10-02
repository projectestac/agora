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
 * Strings for component 'plagiarism_turnitin', language 'ca', branch 'MOODLE_23_STABLE'
 *
 * @package   plagiarism_turnitin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminlogin'] = 'Entreu a Turnitin com a administrador';
$string['compareinstitution'] = 'Compareu els arxius enviats amb els documents presentats dins d\'aquesta institució';
$string['compareinstitution_help'] = 'Aquesta opció només està disponible si heu instal·lat/comprat un node personalitzat. Si no n\'esteu segurs, deixeu "No".';
$string['compareinternet'] = 'Compareu els arxius enviats amb Internet';
$string['compareinternet_help'] = 'Aquesta opció permet comparar els enviaments amb el contingut d\'Internet que Turnitin té catalogat actualment';
$string['comparejournals'] = 'Compareu els arxius enviats amb els diaris, revistes, publicacions';
$string['comparejournals_help'] = 'Aquesta opció permet comparar els enviaments amb revistes, diaris i publicacions que Turnitin té catalogat actualment';
$string['comparestudents'] = 'Compareu els arxius enviats amb els arxius d\'altres estudiants';
$string['comparestudents_help'] = 'Aquesta opció permet comparar els enviaments amb arxius d\'altres estudiants';
$string['configdefault'] = 'Es tracta d\'un valor predeterminat per a la pàgina de creació de l\'assignació. Només els usuaris amb els drets de plagiarism/ turnitin: enableturnitin poden canviar aquesta configuració per a una tramesa en particular';
$string['configusetiimodule'] = 'Activeu l\'enviament de Turnitin.';
$string['defaultsdesc'] = 'Els següents paràmetres són els valors predeterminats quan s\'habilita Turnitin en un mòdul d\'activitat';
$string['defaultupdated'] = 'Opcions per defecte de Turnitin  actualitzades';
$string['draftsubmit'] = 'Quan l\'arxiu s\'hagi d\'enviar a Turnitin';
$string['excludebiblio'] = 'Excloeu bibliografia';
$string['excludebiblio_help'] = 'El material bibliogràfic també es pot incloure i excloure en el moment de visualitzar l\'Informe d\'originalitat. Aquest paràmetre ja no es pot  modificar després de rebre la primera tramesa.';
$string['excludematches'] = 'Excloeu partides petites';
$string['excludematches_help'] = 'Podeu excloure les partides petites per percentatge o per quantitat de paraules - Seleccioneu el tipus que voleu utilitzar i introduïu el percentatge o el nombre de paraules en el quadre de sota.';
$string['excludequoted'] = 'Excloeu el material esmentat';
$string['excludequoted_help'] = 'Els materials esmentats també es poden incloure i excloure en el moment de visualitzar l\'Informe d\'originalitat. Aquest paràmetre ja no es pot  modificar després de rebre la primera tramesa.';
$string['file'] = 'Arxiu';
$string['filedeleted'] = 'Arxiu esborrat de la cua';
$string['fileresubmitted'] = 'Arxiu a l\'espera de ser tramès de nou';
$string['module'] = 'Mòdul';
$string['name'] = 'Nom';
$string['percentage'] = 'Percentatge';
$string['pluginname'] = 'Turnitin plugin de plagi';
$string['reportgen'] = 'Quan volgueu generar els informes d\'originalitat';
$string['reportgenduedate'] = 'En la data de venciment';
$string['reportgen_help'] = 'Aquesta opció us permet triar quan voleu que es generi l\'Informe d\'originalitat';
$string['reportgenimmediate'] = 'Immediatament (el primer informe és definitiu)';
$string['reportgenimmediateoverwrite'] = 'Immediatament (pot sobreescriure altres informes)';
$string['resubmit'] = 'Torneu a enviar';
$string['savedconfigfailure'] = 'No es pot connectar / autenticar Turnitin -potser la vostra clau secreta/Compte combinació d\'ID és incorrecta o bé el servidor no pot connectar-se a l\'API';
$string['savedconfigsuccess'] = 'La configuració de Turnitin s\'ha guardat, i s\'ha creat el compte del professor';
$string['showstudentsreport'] = 'Mostra l\'Informe de similitud a l\'estudiant';
$string['showstudentsreport_help'] = 'L\'informe de similitud presenta un desglossament de quines parts de la tramesa són plagi i a quin lloc Turnitin ha detectat per primera vegada aquest contingut';
$string['showstudentsscore'] = 'Mostra el percentatge de similitud als estudiants';
$string['showstudentsscore_help'] = 'El percentatge de similitud és el percentatge de la tramesa que ha estat aparellat amb un altre contingut - un pecentatge alt és generalment negatiu.';
$string['showwhenclosed'] = 'Quan l\'activitat està tancada';
$string['similarity'] = 'Similitud';
$string['status'] = 'Estat';
$string['studentdisclosure'] = 'Revelació de l\'estudiant';
$string['studentdisclosuredefault'] = 'Tots els fitxers enviats es presentaran al servei de detecció de plagi Turnitin.com';
$string['studentdisclosure_help'] = 'Aquest text es mostrarà a tots els estudiants a la pàgina de càrrega d\'arxius.';
$string['submitondraft'] = 'Envia l\'arxiu un cop carregat';
$string['submitonfinal'] = 'Envia l\'arxiu quan l\'estudiant l\'envia per ser avaluat';
$string['teacherlogin'] = 'Entreu a Turnitin com a professor';
$string['tii'] = 'Turnitin';
$string['tiiaccountid'] = 'Número de compte de Turnitin';
$string['tiiaccountid_help'] = 'Aquest és el seu número de compte d\'acord amb el que disposa Turnitin.com';
$string['tiiapi'] = 'API de Turnitin';
$string['tiiapi_help'] = 'Aquesta és la direcció de l\'API  de Turnitin - generalment https://api.turnitin.com/api.asp';
$string['tiiconfigerror'] = 'S\'ha produït un error de configuració del lloc quan s\'intentava enviar l\'arxiu a Turnitin';
$string['tiiemailprefix'] = 'Prefix de correu electrònic de l\'estudiant';
$string['tiiemailprefix_help'] = 'Heu d\'establir aquesta opció si no voleu que els alumnes puguin entrar a turnitin.com i veure els informes complets.';
$string['tiienablegrademark'] = 'Activar GradeMark (Experimental)';
$string['tiienablegrademark_help'] = 'GradeMark és una característica opcional de Turnitin - per poder utilitzar-la l\'heu d\'haver inclòs en la vostra subscripció a Turnitin. Si l\'activeu farà que la visualització de les pàgines enviades es carregui més lentament.';
$string['tiierror'] = 'Error de TII :';
$string['tiierror1007'] = 'Turnitin no ha pogut processar aquest fitxer, ja que és massa gran';
$string['tiierror1008'] = 'S\'ha produït un error en intentar enviar l\'arxiu a Turnitin';
$string['tiierror1009'] = 'Turnitin no ha pogut processar aquest fitxer - és un tipus de fitxer no compatible. El tipus de fitxers vàlids són MS Word, PDF Acrobat, PostScript, Text, HTML, WordPerfect i format de text enriquit';
$string['tiierror1010'] = 'Turnitin no ha pogut processar aquest fitxer - ha de contenir més de 100 caràcters sense espai en blanc';
$string['tiierror1011'] = 'Turnitin  no ha pogut processar aquest fitxer - té un format incorrecte i sembla que hi ha espais entre cada lletra.';
$string['tiierror1012'] = 'Turnitin no ha pogut processar aquest fitxer - la seva longitud supera els límits de Turnitin';
$string['tiierror1013'] = 'Turnitin no ha pogut processar aquest fitxer - ha de contenir més de 20 paraules';
$string['tiierror1020'] = 'Turnitin no ha pogut processar aquest fitxer - conté caràcters d\'un conjunt de caràcters que no és compatible';
$string['tiierror1023'] = 'Turnitin no ha pogut processar aquest pdf - assegureu-vos que no està protegit i que conté text seleccionable en comptes d\'imatges escanejades';
$string['tiierror1024'] = 'Turnitin no ha pogut processar aquest fitxer -no compleix els criteris de Turnitin com a document legítim';
$string['tiierrorpaperfail'] = 'Turnitin no ha pogut processar aquest fitxer';
$string['tiierrorpending'] = 'Fitxer pendent de ser enviat a Turnitin';
$string['tiiexplain'] = 'Turnitin és un producte comercial i heu de tenir una quota de subscripció per utilitzar aquest servei; si voleu més informació, visiteu <a href="http://docs.moodle.org/en/Turnitin_administration">http://docs.moodle.org/en/Turnitin_administration</a>';
$string['tiiexplainerrors'] = 'Aquesta pàgina enumera tots els fitxers enviats a Turnitin que estan actualment en un estat d\'error.Trobareu un llistat dels codis d\'error Turnitin i la seva descripció a: <a href="http://docs.moodle.org/en/Turnitin_errors"> docs.moodle.org / ca / Turnitin_errors </ a> <br/>Quan els fitxers es restableixen, el cron intenta tornar a enviar el fitxer a Turnitin <br/>Quan s\'eliminen els fitxers d\'aquesta pàgina ja no es poden tornar a enviar a Turnitin i els errors ja no es tornen a mostrar als professors ni als alumnes';
$string['tiisecretkey'] = 'Clau Secreta de Turnitin';
$string['tiisecretkey_help'] = 'Per obenir-ho, entra a Turnitin.com com a administrador de la pàgina.';
$string['tiisenduseremail'] = 'Envieu el correu electrònic de l\'usuari';
$string['tiisenduseremail_help'] = 'Envieu el correu electrònic a cada estudiant en el sistema TII amb un enllaç que permet entrar a www.turnitin.com amb una contrasenya temporal';
$string['turnitin'] = 'Turnitin';
$string['turnitin_attemptcodes'] = 'Codis d\'error per tornar a enviar automàticament';
$string['turnitin_attemptcodes_help'] = 'Els codis d\'error que Turnitin  generalment accepta en un segon intent (els canvis en aquest camp poden suposar una càrrega addicional al servidor)';
$string['turnitin_attempts'] = 'Número de reintents';
$string['turnitin_attempts_help'] = 'Número de vegades que els codis especificats es tornen a enviar a Turnitin, 1 intent vol dir que els  fitxers amb els codis d\'error que s\'especifiquen s\'enviaran dues vegades.';
$string['turnitindefaults'] = 'Valors predeterminats de Turnitin';
$string['turnitin:enable'] = 'Permet al professor activar / desactivar Turnitin dins d\'un mòdul';
$string['turnitinerrors'] = 'Errors de Turnitin';
$string['turnitin_institutionnode'] = 'Permetre el node de la institució';
$string['turnitin_institutionnode_help'] = 'Si heu instal·lat/comprat un node de la institució amb el vostre compte, activeu aquesta opció perquè el node es seleccioni en crear les tasques. NOTA: si no teniu un node de la institució, si activeu aquesta opció farà que falli l\'enviament de treballs.';
$string['turnitin:viewfullreport'] = 'Permet que el professor pugui veure l\'informe complet generat per Turnitin';
$string['turnitin:viewsimilarityscore'] = 'Permet que el professor pugui veure el percentatge de similitud generat per Turnitin';
$string['useturnitin'] = 'Activeu Turnitin';
$string['wordcount'] = 'Recompte de paraules';
