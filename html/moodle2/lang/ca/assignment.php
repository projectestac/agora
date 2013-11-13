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
 * Strings for component 'assignment', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Teniu tasques que necessiten la vostra atenció';
$string['addsubmission'] = 'Afegeix tramesa';
$string['allowdeleting'] = 'Permet suprimir';
$string['allowdeleting_help'] = '<p>Si habiliteu aquesta opció, els participants podran suprimir els fitxers que hagin penjat, sempre que no hagin estat ja qualificats.</p>';
$string['allowmaxfiles'] = 'Nombre màxim de fitxers';
$string['allowmaxfiles_help'] = '<p>El nombre màxim de fitxers que pot penjar cada participant en aquesta tasca. Aquest nombre no es mostra als estudiants. Per tant, cal que indiqueu clarament en la descripció de la tasca el nombre de fitxers que esteu demanant.</p>';
$string['allownotes'] = 'Permet notes';
$string['allownotes_help'] = '<p>Si habiliteu aquesta opció, els participants podran introduir notes en un quadre de text, com en una tasca de text en línia.</p>';
$string['allowresubmit'] = 'Permet tornar a trametre';
$string['allowresubmit_help'] = '<p>Per defecte els estudiants no poden tornar a trametre les tasques una vegada el professor ja les ha qualificades.</p>

<p>Si activeu aquesta opci&oacute;, aleshores els estudiants podran tornar a trametre les tasques despr&eacute;s que hagin estat qualificades (per tal que les torneu a qualificar). Aix&ograve; pot ser &uacute;til si el professor vol engrescar els estudiants a fer un treball millor en un proc&eacute;s iteratiu.</p>
<p>&Ograve;bviament aquesta opci&oacute; &eacute;s irrellevant en les tasques fora de l&iacute;nia.</p>';
$string['alreadygraded'] = 'La vostra tasca ja ha estat qualificada i no es permet tornar-la a trametre.';
$string['assignment:addinstance'] = 'Afegeix una tasca nova';
$string['assignmentdetails'] = 'Detalls de la tasca';
$string['assignment:exportownsubmission'] = 'Exporta les trameses pròpies';
$string['assignment:exportsubmission'] = 'Exporta tramesa';
$string['assignment:grade'] = 'Qualificar tasca';
$string['assignmentmail'] = '{$a->teacher} ha introduït una retroacció en la vostra tramesa de la tasca \'{$a->assignment}\'

Podeu veure-ho en la vostra tramesa:

{$a->url}';
$string['assignmentmailhtml'] = '{$a->teacher} ha introduït una retroacció en la vostra tramesa de la tasca \'<i>{$a->assignment}</i>\'<br /><br />
Podeu veure-ho en la vostra <a href="{$a->url}">tramesa</a>.';
$string['assignmentmailsmall'] = '{$a->teacher} ha publicat alguns comentaris en la tasca tramesa per a \'{$a->assignment}\'. La podreu trobar afegida a la vostra tramesa';
$string['assignmentname'] = 'Nom de la tasca';
$string['assignmentsubmission'] = 'Tasques trameses';
$string['assignment:submit'] = 'Trametre tasca';
$string['assignmenttype'] = 'Tipus de tasca';
$string['assignment:view'] = 'Veure tasca';
$string['availabledate'] = 'Disponible des de';
$string['cannotdeletefiles'] = 'S\'ha produït un error i no es poden suprimir els fitxers';
$string['cannotviewassignment'] = 'No podeu veure aquesta tasca';
$string['changegradewarning'] = 'Aquesta tasca té enviaments qualificats, i canviar la qualificació no recalcularà automàticament les qualificacions dels enviaments ja qualificats. Si voleu canviar la qualificació, heu de requalificar tots els enviaments.';
$string['closedassignment'] = 'La data d\'enviament d\'aquesta tasca s\'ha tancat.';
$string['comment'] = 'Comentari';
$string['commentinline'] = 'Comentaris inserits';
$string['commentinline_help'] = '<p>Si seleccioneu aquesta opció, la tramesa original es copiarà en el camp de comentaris de retroacció quan aneu a qualificar, de manera que sigui més fàcil inserir comentaris (potser fent servir un color diferent) o editar el text original.</p>';
$string['configitemstocount'] = 'Naturalesa dels elements que cal comptar en les trameses de les tasques en línia.';
$string['configmaxbytes'] = 'Mida màxima per defecte de la tasca per a totes les tasques del lloc (subjecta als límits del curs i a altres paràmetres locals)';
$string['configshowrecentsubmissions'] = 'Tothom pot veure les notificacions de trameses en els informes d\'activitat recent.';
$string['confirmdeletefile'] = 'Esteu absolutament segur que voleu suprimir aquest fitxer?<br /><strong>{$a}</strong>';
$string['coursemisconf'] = 'El curs està mal configurat';
$string['currentgrade'] = 'Qualificació actual en el llibre de qualificacions';
$string['deleteallsubmissions'] = 'Suprimeix totes les trameses';
$string['deletefilefailed'] = 'No s\'ha pogut suprimir el fitxer.';
$string['description'] = 'Descripció';
$string['downloadall'] = 'Baixa totes les tasques en un fitxer zip';
$string['draft'] = 'Esborrany';
$string['due'] = 'Data límit de la tasca';
$string['duedate'] = 'Data de venciment';
$string['duedateno'] = 'Sense data de venciment';
$string['early'] = '{$a} aviat';
$string['editmysubmission'] = 'Edita la meva tramesa';
$string['editthesefiles'] = 'Editeu aquests fitxers';
$string['editthisfile'] = 'Actualitzeu aquest fitxer';
$string['emailstudents'] = 'Envia avisos per correu a l\'estudiantat';
$string['emailteachermail'] = '{$a->username} ha actualitzat la tramesa  de la tasca "{$a->assignment}" a les {$a->timeupdated}

Està disponible aquí:

{$a->url}';
$string['emailteachermailhtml'] = '{$a->username} ha actualitzat la tramesa  de la tasca <i>"{$a->assignment}" a les {$a->timeupdated}</i>.<br /><br />
Està <a href="{$a->url}">disponible al web</a>.';
$string['emailteachers'] = 'Avisa els professors per correu electrònic';
$string['emailteachers_help'] = '<p>Si s\'habilita aquesta opció, els professors reben un avís breu per correu electrònic cada vegada que un estudiant fa o actualitza una tramesa.</p>

<p>Només reben la notificació els professors que poden qualificar la tramesa. Així, per exemple, si un curs utilitza grups separats, un professor restringit a un grup d\'estudiants no rep notificacions referents a les trameses d\'estudiants d\'altres grups.</p>

<p>Evidentment no s\'envien mai avisos referents a activitats fora de línia.</p>';
$string['emptysubmission'] = 'Encara no heu fet cap tramesa';
$string['enablenotification'] = 'Envia notificacions per correu';
$string['enablenotification_help'] = '<p>Si activeu aquesta opció, l\'estudiantat rebrà notificacions per correu referents a les seves qualificacions i retroacció.</p>

<p>La vostra preferència personal es desarà i s\'aplicarà a totes les trameses de tasques que qualifiqueu.</p>';
$string['errornosubmissions'] = 'No hi ha tasques per baixar';
$string['existingfiledeleted'] = 'S\'ha suprimit el fitxer existent : {$a}';
$string['failedupdatefeedback'] = 'Ha fallat l\'actualització de la retroacció en la tasca de l\'usuari {$a}';
$string['feedback'] = 'Retroacció';
$string['feedbackfromteacher'] = 'Retroacció del {$a}';
$string['feedbackupdated'] = 'S\'ha actualitzat la retroacció en les tasques de {$a} persones';
$string['finalize'] = 'Impedeix l\'enviament d\'actualitzacions';
$string['finalizeerror'] = 'S\'ha produït un error i no s\'ha pogut completar la tramesa';
$string['futureaassignment'] = 'Aquesta tasca encara no està disponible.';
$string['graded'] = 'Qualificada';
$string['guestnosubmit'] = 'Els visitants no poden trametre una tasca. Abans de trametre una tasca heu d\'entrar o us heu de registrar.';
$string['guestnoupload'] = 'Els usuaris visitants no poden penjar fitxers.';
$string['helpoffline'] = '<p>Útil quan la tasca es realitza fora de Moodle. Pot ser una cosa que es faci en una altra pàgina web o presencialment.</p><p>Els estudiants podran veure aquí la descripció de la tasca, però no podran penjar-hi fitxers ni res. La qualificació funciona de la manera normal i els estudiants reben l\'avís de les seves notes.</p>';
$string['helponline'] = '<p>Aquest tipus de tasca demana als usuaris que editen un text, utilitzant les eines d\'edició normals. Els professors poden qualificar els treballs en línia i també inserir-los comentaris o fer-hi canvis.</p><p>(Si teniu experiència amb versions anteriors de Moodle, aquest tipus de tasca funciona igual que l\'antic mòdul Diari.)</p>';
$string['helpupload'] = '<p>Aquest tipus de tasca permet que cada participant pengi un fitxer, o diversos fitxers, de qualsevol mena.</p>
<p>Poden ser documents del processador de textos, imatges, un lloc web complet empaquetat en un fitxer zip, o qualsevol altra cosa que els vulgueu demanar que trametin.</p>
<p>Aquest tipus també us permet penjar múltiples fitxers de qualsevol mena en resposta a les trameses dels participants.</p>
<p>Els participants poden incloure notes per descriure els arxius enviats, el seu progrés o qualsevol altra informació textual.</p>
<p>L\'enviament d\'aquest tipus de tasca ha de ser finalitzada pel participant. Vós podeu revisar el seu estat en qualsevol moment, les tasques inacabades es marquen com a esborrany. Vós podeu retornar qualsevol tasca no qualificada a l\'estat d\'esborrany.</p>';
$string['helpuploadsingle'] = '<p>Aquest tipus de tasca permet que cada participant pengi un fitxer, només un, de qualsevol mena.</p><p>Pot ser un document de processador de textos, una imatge, un lloc web complet empaquetat en un fitxer zip, o qualsevol altra cosa que els vulgueu demanar que trametin.</p>';
$string['hideintro'] = 'Oculta la descripció fins la data de disponibilitat';
$string['hideintro_help'] = '<p>Si habiliteu aquesta opció, la descripció de la tasca romandrà oculta fins la data en què la tasca s\'obri.</p>';
$string['invalidassignment'] = 'Tasca incorrecta';
$string['invalidfileandsubmissionid'] = 'Manca l\'ID del fitxer o de la tramesa';
$string['invalidid'] = 'L\'ID de la tasca és incorrecte';
$string['invalidsubmissionid'] = 'L\'ID de la tramesa és incorrecte';
$string['invalidtype'] = 'El tipus de tasca és incorrecte';
$string['invaliduserid'] = 'L\'ID de l\'usuari és incorrecte';
$string['itemstocount'] = 'Nombre';
$string['lastgrade'] = 'Última qualificació';
$string['late'] = '{$a} tard';
$string['maximumgrade'] = 'Nota màxima';
$string['maximumsize'] = 'Mida màxima';
$string['maxpublishstate'] = 'Màxima visibilitat de la entrada del blog abans de la data de venciment';
$string['messageprovider:assignment_updates'] = 'Notificacions de tasques';
$string['modulename'] = 'Tasca (2.2)';
$string['modulename_help'] = '<p><img alt="" src="<?php echo $CFG->wwwroot?>/mod/assignment/icon.gif" />&nbsp;<b>Tasques</b></p>


<ul>

	<p>Les tasques permeten al professorat especificar una feina que requereix que els estudiants preparin un contingut digital (en qualsevol format) i el trametin penjant-lo en el servidor. Exemples de tasques podrien ser assajos, projectes, informes, etc. Aquest m&ograve;dul inclou la possibilitat de qualificar la feina.</p>

</ul>';
$string['modulenameplural'] = 'Tasques';
$string['newsubmissions'] = 'Tasques trameses';
$string['noassignments'] = 'Encara no hi tasques';
$string['noattempts'] = 'No s\'han fet intents en aquesta tasca';
$string['noblogs'] = 'No teniu entrades del blog per enviar!';
$string['nofiles'] = 'No s\'ha tramès cap fitxer';
$string['nofilesyet'] = 'Encara no s\'ha tramès cap fitxer';
$string['nomoresubmissions'] = 'No es permet fer més trameses.';
$string['norequiregrading'] = 'No hi ha tasques per qualificar';
$string['nosubmisson'] = 'No s\'ha tramès cap tasca';
$string['notavailableyet'] = 'Aquesta tasca encara no està disponible.<br />Les instruccions de la tasca es mostraran aquí a partir de la data que s\'indica més avall.';
$string['notes'] = 'Notes';
$string['notesempty'] = 'No hi ha entrades';
$string['notesupdateerror'] = 'S\'ha produït un error en actualitzar les notes';
$string['notgradedyet'] = 'No s\'ha qualificat encara';
$string['notsubmittedyet'] = 'No s\'ha tramès encara';
$string['onceassignmentsent'] = 'Després que envieu la tasca perquè sigui avaluada, ja no podreu adjuntar-hi ni suprimir cap fitxer. De veritat voleu continuar ?';
$string['operation'] = 'Operació';
$string['optionalsettings'] = 'Paràmetres opcionals';
$string['overwritewarning'] = 'Avís: si torneu a penjar un fitxer REEMPLAÇAREU la tramesa existent';
$string['page-mod-assignment-submissions'] = 'Pàgina de trameses del mòdul de tasques';
$string['page-mod-assignment-view'] = 'Pàgina principal del mòdul de tasques';
$string['page-mod-assignment-x'] = 'Pàgina de qualsevol mòdul de tasques';
$string['pagesize'] = 'Trameses mostrades per pàgina';
$string['pluginadministration'] = 'Administració de tasques';
$string['pluginname'] = 'Tasca (2.2)';
$string['popupinnewwindow'] = 'Obre en una finestra emergent';
$string['preventlate'] = 'Impedeix trameses fora de termini';
$string['quickgrade'] = 'Permet qualificació ràpida';
$string['quickgrade_help'] = '<p>Amb la qualificació ràpida habilitada podeu qualificar ràpidament diverses tasques en una pàgina.</p>

<p>Només heu de canviar les qualificacions i els comentaris i utilitzar el botó Desa, al capdavall de la pàgina, per desar tots els canvis de la pàgina d\'una sola vegada.</p>

<p>Els botons de qualificació normals de la dreta continuen funcionant per si necessiteu més espai. La vostra preferència de qualificació ràpida es desarà i s\'aplicarà a totes les tasques en tots els vostres cursos.</p>';
$string['requiregrading'] = 'Qualificació requerida';
$string['responsefiles'] = 'Fitxers de resposta';
$string['reviewed'] = 'Revisada';
$string['saveallfeedback'] = 'Desa tota la meva retroacció';
$string['selectblog'] = 'Seleccioneu quina entrada del blog voleu enviar';
$string['sendformarking'] = 'Envia per avaluar';
$string['showrecentsubmissions'] = 'Mostra les trameses recents';
$string['submission'] = 'Tramesa';
$string['submissiondraft'] = 'Esborrany de la tramesa';
$string['submissionfeedback'] = 'Retroacció per a la tramesa';
$string['submissions'] = 'Trameses';
$string['submissionsaved'] = 'S\'han desat els canvis';
$string['submissionsnotgraded'] = '{$a} trameses no qualificades';
$string['submitassignment'] = 'Trameteu la vostra tasca per mitjà d\'aquest formulari';
$string['submitedformarking'] = 'La tasca ja s\'ha tramès per ser puntuada i no es pot actualitzar';
$string['submitformarking'] = 'Tramet la tasca per avaluar';
$string['submitted'] = 'S\'ha tramès';
$string['submittedfiles'] = 'Fitxers tramesos';
$string['subplugintype_assignment'] = 'Tipus de tasca';
$string['subplugintype_assignment_plural'] = 'Tipus de tasques';
$string['trackdrafts'] = 'Habilita el botó  «Envia per a puntuar»';
$string['trackdrafts_help'] = '<p>El botó "Envia per avaluar" permet que els usuaris indiquin al seu professorat que han acabat de treballar en una tasca. El professorat tindrà llavors l\'opció de tornar la tasca a l\'estat d\'esborrany, p. ex. si considera que l\'estudiant ha de treballar-hi més.</p>';
$string['typeblog'] = 'Entrada del blog';
$string['typeoffline'] = 'Activitat fora de línia';
$string['typeonline'] = 'Activitat en línia';
$string['typeupload'] = 'Càrrega avançada de fitxers';
$string['typeuploadsingle'] = 'Penjar un fitxer';
$string['unfinalize'] = 'Torna a l\'esborrany';
$string['unfinalizeerror'] = 'S\'ha produït un error i no s\'ha pogut revertir a esborrany aquesta tramesa';
$string['unfinalize_help'] = 'Retornar-ho a draft permet a l\'estudiant actualitzar les seves tasques.';
$string['unsupportedsubplugin'] = 'El tipus de tasca de \'{$a}\' no funciona actualment. Podeu esperar fins que aquest tipus de tasca estigui disponible, o suprimir aquesta tasca.';
$string['upgradenotification'] = 'Aquesta activitat es basa en un mòdul de tasca antic.';
$string['uploadafile'] = 'Pugeu un fitxer';
$string['uploadbadname'] = 'El nom d\'aquest fitxer contenia caràcters estranys i no s\'ha pogut penjar';
$string['uploadedfiles'] = 'fitxers penjats';
$string['uploaderror'] = 'S\'ha produït un error mentre s\'estava desant el fitxer al servidor';
$string['uploadfailnoupdate'] = 'El fitxer s\'ha penjat correctament, però no s\'ha pogut actualitzar la vostra tramesa!';
$string['uploadfiles'] = 'Pugeu fitxers';
$string['uploadfiletoobig'] = 'Aquest fitxer és massa gran (el límit són {$a} bytes)';
$string['uploadnofilefound'] = 'No s\'ha trobat cap fitxer - esteu segur que n\'heu seleccionat un per penjar-lo?';
$string['uploadnotregistered'] = '\'{$a}\' s\'ha penjat correctament, però la tramesa no s\'ha registrat!';
$string['uploadsuccess'] = '\'{$a}\' s\'ha penjat amb èxit';
$string['usermisconf'] = 'L\'usuari està mal configurat';
$string['usernosubmit'] = 'Disculpeu, però no teniu permís per enviar una tasca.';
$string['viewassignmentupgradetool'] = 'Visualitza l\'eina d\'actualització de la tasca';
$string['viewfeedback'] = 'Visualitza les qualificacions i la retroacció de la tasca';
$string['viewmysubmission'] = 'Visualitza la meva tramesa';
$string['viewsubmissions'] = 'Visualitza {$a} tasques trameses';
$string['yoursubmission'] = 'La vostra tramesa';
