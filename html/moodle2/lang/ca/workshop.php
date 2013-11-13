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
 * Strings for component 'workshop', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   workshop
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesscontrol'] = 'Control d\'accés';
$string['aggregategrades'] = 'Torna a calcular les qualificacions';
$string['aggregation'] = 'Agregació de les qualificacions';
$string['allocate'] = 'Assigneu les trameses';
$string['allocatedetails'] = 'esperades: {$a->expected}<br />trameses: {$a->submitted}<br />per assignar: {$a->allocate}';
$string['allocation'] = 'Assignació de les trameses';
$string['allocationconfigured'] = 'S\'ha configurat l\'assignació';
$string['allocationdone'] = 'S\'ha efectuat l\'assignació';
$string['allocationerror'] = 'Error en l\'assignació';
$string['allsubmissions'] = 'Totes les trameses ({$a})';
$string['alreadygraded'] = 'Ja qualificat';
$string['areaconclusion'] = 'Text d\'acabament';
$string['areainstructauthors'] = 'Instruccions per a la tramesa';
$string['areainstructreviewers'] = 'Instruccions per a l\'avaluació';
$string['areasubmissionattachment'] = 'Adjuncions a la tramesa';
$string['areasubmissioncontent'] = 'Texts de la tramesa';
$string['assess'] = 'Avalua';
$string['assessedexample'] = 'S\'ha avaluat la tramesa d\'exemple';
$string['assessedsubmission'] = 'S\'ha avaluat la tramesa';
$string['assessingexample'] = 'S\'està avaluant la tramesa d\'exemple';
$string['assessingsubmission'] = 'S\'està avaluant la tramesa';
$string['assessment'] = 'Avaluació';
$string['assessmentby'] = 'per <a href="{$a->url}">{$a->name}</a>';
$string['assessmentbyfullname'] = 'Avaluació per {$a}';
$string['assessmentbyyourself'] = 'Autoavaluació';
$string['assessmentdeleted'] = 'S\'ha desassignat l\'avaluació';
$string['assessmentend'] = 'Data límit per a l\'avaluació';
$string['assessmentendbeforestart'] = 'La data límit per a l\'avaluació no pot ser anterior a la data d\'inici de les avaluacions';
$string['assessmentenddatetime'] = 'Data límit de l\'avaluació: {$a->daydatetime} ({$a->distanceday})';
$string['assessmentendevent'] = '{$a} (termini de l\'avaluació)';
$string['assessmentform'] = 'Formulari d\'avaluació';
$string['assessmentofsubmission'] = '<a href="{$a->assessmenturl}">Avaluació</a> de <a href="{$a->submissionurl}">{$a->submissiontitle}</a>';
$string['assessmentreference'] = 'Avaluació de referència';
$string['assessmentreferenceconflict'] = 'No és possible avaluar una tramesa d\'exemple per la qual hàgiu proporcionat una avaluació d\'exemple.';
$string['assessmentreferenceneeded'] = 'Heu d\'avaluar aquesta tramesa d\'exemple per tal de subministrar una avaluació de referència. Feu clic en el botó \'Continua\' per avaluar la tramesa.';
$string['assessmentsettings'] = 'Paràmetres de l\'avaluació';
$string['assessmentstart'] = 'Inici de les avaluacions des de';
$string['assessmentstartdatetime'] = 'Inici de les avaluacions des de {$a->daydatetime} ({$a->distanceday})';
$string['assessmentstartevent'] = '{$a} (inici de les avaluacions)';
$string['assessmentweight'] = 'Pes de l\'avaluació';
$string['assignedassessments'] = 'Trameses assignades per avaluar';
$string['assignedassessmentsnone'] = 'No teniu cap tramesa per avaluar';
$string['backtoeditform'] = 'Torna al formulari d\'edició';
$string['byfullname'] = 'per <a href="{$a->url}">{$a->name}</a>';
$string['calculategradinggrades'] = 'Calculeu les qualificacions de l\'avaluació';
$string['calculategradinggradesdetails'] = 'esperades: {$a->expected}<br />calculades: {$a->calculated}';
$string['calculatesubmissiongrades'] = 'Calculeu les qualificacions de la tramesa';
$string['calculatesubmissiongradesdetails'] = 'esperades: {$a->expected}<br />calculades: {$a->calculated}';
$string['chooseuser'] = 'Escull usuari...';
$string['clearaggregatedgrades'] = 'Esborra totes les qualificacions agregades';
$string['clearaggregatedgradesconfirm'] = 'Segur que voleu esborrar les qualificacions calculades per les trameses i les avaluacions?';
$string['clearaggregatedgrades_help'] = 'S\'esborraran les qualificacions agregades de les trameses i les avaluacions. Podeu calcular de nou aquestes qualificacions a la fase de qualificació de les avaluacions.';
$string['clearassessments'] = 'Esborra les avaluacions';
$string['clearassessmentsconfirm'] = 'Segur que voleu esborrar totes les qualificacions de les avaluacions? No podreu reconstruir aquesta informació vós mateix, sinó que els revisors hauran de tornar a avaluar les trameses assignades.';
$string['clearassessments_help'] = 'Les qualificacions calculades de les trameses i avaluacions es reiniciaran. Encara es conservarà la informació sobre com s\'han omplert els formularis d\'avaluació, però tots els revisors hauran d\'obrir el formulari d\'avaluació i tornar-lo a desar per tal de fer que es tornin a calcular les qualificacions.';
$string['conclusion'] = 'Conclusió';
$string['conclusion_help'] = 'El text d\'acabament es mostra als participants al final de l\'activitat.';
$string['configexamplesmode'] = 'Mode d\'avaluació d\'exemples establert per omissió en els tallers.';
$string['configgrade'] = 'Qualificació màxima per omissió de les trameses en els tallers.';
$string['configgradedecimals'] = 'Nombre de dígits que cal mostrar després del separador decimal quan es mostrin les qualificacions.';
$string['configgradinggrade'] = 'Qualificació màxima per omissió de les avaluacions en els tallers.';
$string['configmaxbytes'] = 'Mida de fitxer màxima per omissió en tots els tallers del lloc (subjecte als límits establerts per al curs i altres ajustaments locals)';
$string['configstrategy'] = 'Estratègia de qualificació per omissió en els tallers.';
$string['createsubmission'] = 'Comenceu a editar la vostra tramesa';
$string['daysago'] = 'Fa {$a} dies';
$string['daysleft'] = 'Queden {$a} dies';
$string['daystoday'] = 'avui';
$string['daystomorrow'] = 'demà';
$string['daysyesterday'] = 'ahir';
$string['deadlinesignored'] = 'Les restriccions de temps no se us apliquen';
$string['editassessmentform'] = 'Editeu el formulari d\'avaluació';
$string['editassessmentformstrategy'] = 'Editeu el formulari d\'avaluació ({$a})';
$string['editingassessmentform'] = 'Edita el formulari d\'avaluació';
$string['editingsubmission'] = 'S\'està editant la tramesa';
$string['editsubmission'] = 'Edita la tramesa';
$string['err_multiplesubmissions'] = 'Mentre s\'estava editant aquest formulari, s\'ha desat una altra versió de la tramesa. No es permeten trameses múltiples per usuari.';
$string['err_removegrademappings'] = 'No s\'han pogut esborrar els mapatges de qualificacions no utilitzats';
$string['evaluategradeswait'] = 'Si us plau, espereu mentre s\'avaluen les avaluacions i es calculen les qualificacions.';
$string['evaluation'] = 'Càlcul de les qualificacions';
$string['evaluationmethod'] = 'Mètode de càlcul de les qualificacions';
$string['evaluationmethod_help'] = 'El mètode de càlcul de les qualificacions determina com es calcula la qualificació de l\'avaluació. Actualment només hi ha una opció: comparació amb la millor avaluació.';
$string['evaluationsettings'] = 'Paràmetres de la puntuació d\'avaluacions';
$string['example'] = 'Tramesa d\'exemple';
$string['exampleadd'] = 'Afegeix una tramesa d\'exemple';
$string['exampleassess'] = 'Avalua la tramesa d\'exemple';
$string['exampleassessments'] = 'Trameses d\'exemple per avaluar';
$string['exampleassesstask'] = 'Avalua els exemples';
$string['exampleassesstaskdetails'] = 'esperades: {$a->expected}<br />avaluades: {$a->assessed}';
$string['examplecomparing'] = 'S\'estan comparant les avaluacions de la tramesa d\'exemple';
$string['exampledelete'] = 'Esborra l\'exemple';
$string['exampledeleteconfirm'] = 'Segur que voleu esborrar la següent tramesa d\'exemple? Cliqueu el botó \'Continua\' per esborrar-la.';
$string['exampleedit'] = 'Edita l\'exemple';
$string['exampleediting'] = 'S\'està editant l\'exemple';
$string['exampleneedassessed'] = 'Cal que avalueu primer totes les trameses d\'exemple';
$string['exampleneedsubmission'] = 'Primer cal que envieu la vostra feina i que avalueu totes les trameses d\'exemple';
$string['examplesbeforeassessment'] = 'Els exemples estan disponibles després de la pròpia tramesa i cal que s\'avaluin abans d\'avaluar les trameses dels companys';
$string['examplesbeforesubmission'] = 'Cal avaluar els exemples abans que la pròpia tramesa';
$string['examplesmode'] = 'Mode d\'avaluació dels exemples';
$string['examplesubmissions'] = 'Trameses d\'exemple';
$string['examplesvoluntary'] = 'L\'avaluació de la tramesa d\'exemple és voluntària';
$string['feedbackauthor'] = 'Retroacció per a l\'autor';
$string['feedbackby'] = 'Retroacció de {$a}';
$string['feedbackreviewer'] = 'Retroacció per al revisor';
$string['formataggregatedgrade'] = '{$a->grade}';
$string['formataggregatedgradeover'] = '<del>{$a->grade}</del><br /><ins>{$a->over}</ins>';
$string['formatpeergrade'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span>';
$string['formatpeergradeover'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span>';
$string['formatpeergradeoverweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span> @ <span class="weight">{$a->weight}</span>';
$string['formatpeergradeweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span> @ <span class="weight">{$a->weight}</span>';
$string['givengrades'] = 'Qualificacions donades';
$string['gradecalculated'] = 'Qualificació calculada per la tramesa';
$string['gradedecimals'] = 'Xifres decimals en les qualificacions';
$string['gradegivento'] = '&gt;';
$string['gradeinfo'] = 'Qualificació: {$a->received} de {$a->max}';
$string['gradeitemassessment'] = '{$a->workshopname} (avaluació)';
$string['gradeitemsubmission'] = '{$a->workshopname} (tramesa)';
$string['gradeover'] = 'Rectifica la qualificació de la tramesa';
$string['gradereceivedfrom'] = '&lt;';
$string['gradesreport'] = 'Informe de qualificacions del taller';
$string['gradinggrade'] = 'Qualificació de la tasca d\'avaluació';
$string['gradinggradecalculated'] = 'Qualificació calculada per l\'avaluació';
$string['gradinggrade_help'] = 'Aquest paràmetre especifica la qualificació màxima que es pot obtenir per la feina d\'avaluació de trameses.';
$string['gradinggradeof'] = 'Qualificació de la tasca d\'avaluació (de {$a})';
$string['gradinggradeover'] = 'Rectifica la qualificació de l\'avaluació';
$string['gradingsettings'] = 'Paràmetres de qualificació';
$string['groupnoallowed'] = 'No teniu permís per accedir a cap grup en aquest taller';
$string['iamsure'] = 'Si, n\'estic segur(a)';
$string['info'] = 'Info';
$string['instructauthors'] = 'Instruccions per la tramesa';
$string['instructreviewers'] = 'Instruccions per l\'avaluació';
$string['introduction'] = 'Introducció';
$string['latesubmissions'] = 'Trameses fora de termini';
$string['latesubmissionsallowed'] = 'Es permeten les trameses fora de termini';
$string['latesubmissions_desc'] = 'Permet les trameses fora de termini';
$string['latesubmissions_help'] = 'Si s\'habilita, un autor podrà enviar la seva feina després del termini establert, o durant la fase d\'avaluació. Tanmateix, les trameses fora de termini no poden editar-se.';
$string['maxbytes'] = 'Mida màxima de fitxer';
$string['miscellaneoussettings'] = 'Paràmetres diversos';
$string['modulename'] = 'Taller';
$string['modulename_help'] = 'El mòdul d\'activitat del taller permet la recollida, anàlisi i col·laboració dels dels estudiants.
Els estudiants poden presentar qualsevol contingut digital (fitxers), com documents o fulls de càlcul en Word o LibreOffice , i també es pot escriure text directament en un camp utilitzant l\'editor de text.

Les contribucions seran avaluades mitjançant un formulari d\'avaluació de múltiples criteris definits pel professor. El procés d\'avaluació per parells i la comprensió de la forma d\'avaluació es pot practicar amb exemples de presentacions proporcionades pel professor, així com una avaluació de referència. Els estudiants tenen l\'oportunitat d\'avaluar una o diverses de les presentacions dels seus companys. Els enviaments i revisions poden ser anònimes si cal.

Els estudiants obtenen dues notes en una activitat de taller - un qualificació per a la seva presentació i una qualificació per la seva avaluació de les presentacions dels seus companys. Ambdós qualificacions es registren en el llibre de qualificacions.';
$string['modulenameplural'] = 'Tallers';
$string['mysubmission'] = 'La meva tramesa';
$string['nattachments'] = 'Nombre màxim d\'adjuncions a la tramesa';
$string['noexamples'] = 'Aquest taller encara no té exemples';
$string['noexamplesformready'] = 'Heu de definir un formulari d\'avaluació abans d\'especificar trameses d\'exemple';
$string['nogradeyet'] = 'Encara sense qualificar';
$string['nosubmissionfound'] = 'No s\'ha trobat cap tramesa per aquest usuari';
$string['nosubmissions'] = 'Aquest taller encara no té trameses';
$string['notassessed'] = 'No avaluat encara';
$string['nothingtoreview'] = 'No hi ha res per revisar';
$string['notoverridden'] = 'No rectificada';
$string['noworkshops'] = 'Aquest curs no té tallers';
$string['noyoursubmission'] = 'Encara no heu enviat la vostra feina';
$string['nullgrade'] = '-';
$string['page-mod-workshop-x'] = 'Qualsevol pàgina del mòdul de tallers';
$string['participant'] = 'Participant';
$string['participantrevierof'] = 'El participant és el revisor de';
$string['participantreviewedby'] = 'El participant és revisat per';
$string['phaseassessment'] = 'Fase d\'avaluació';
$string['phaseclosed'] = 'Tancament';
$string['phaseevaluation'] = 'Fase de qualificació de les avaluacions';
$string['phasesetup'] = 'Fase de configuració';
$string['phasesoverlap'] = 'La fase de tramesa i la fase d\'avaluació no es poden superposar';
$string['phasesubmission'] = 'Fase de tramesa';
$string['pluginadministration'] = 'Administració del taller';
$string['pluginname'] = 'Taller';
$string['prepareexamples'] = 'Prepareu trameses d\'exemple';
$string['previewassessmentform'] = 'Previsualització';
$string['publishedsubmissions'] = 'Trameses publicades';
$string['publishsubmission'] = 'Publica la tramesa';
$string['publishsubmission_help'] = 'Les trameses publicades estan disponibles als altres quan el taller està tancat.';
$string['reassess'] = 'Torna a avaluar';
$string['receivedgrades'] = 'Qualificacions rebudes';
$string['recentassessments'] = 'Avaluacions del taller:';
$string['recentsubmissions'] = 'Trameses del taller:';
$string['saveandclose'] = 'Desa i tanca';
$string['saveandcontinue'] = 'Desa i continua editant';
$string['saveandpreview'] = 'Desa i previsualitza';
$string['selfassessmentdisabled'] = 'L\'autoavaluació està deshabilitada';
$string['showingperpage'] = 'S\'estan mostrant {$a} elements per pàgina';
$string['showingperpagechange'] = 'Canvia a...';
$string['someuserswosubmission'] = 'Hi ha com a mínim un autor que encara no ha tramès la seva feina.';
$string['sortasc'] = 'Ordenació ascendent';
$string['sortdesc'] = 'Ordenació descendent';
$string['strategy'] = 'Estratègia de qualificació';
$string['strategyhaschanged'] = 'L\'estratègia de qualificació del taller ha canviat des que el formulari s\'ha obert per editar-lo.';
$string['strategy_help'] = 'L\'estratègia de qualificació determina el formulari d\'avaluació utilitzat i el mètode per qualificar les trameses. Hi ha 4 opcions:
* Qualificació acumulativa - S\'assigna una qualificació i uns comentaris al voltant d\'aspectes concrets
* Comentaris - S\'assignen uns comentaris al voltant d\'aspectes concrets però no es pot assignar cap qualificació
* Nombre d\'errors - S\'assignen comentaris i una avaluació de tipus Si/No al voltant d\'aspectes concrets
* Rúbrica - S\'assigna un nivell d\'avaluació al voltant d\'aspectes concrets';
$string['submission'] = 'Tramesa';
$string['submissionattachment'] = 'Adjunció';
$string['submissionby'] = 'Tramesa de {$a}';
$string['submissioncontent'] = 'Contingut de la tramesa';
$string['submissionend'] = 'Data límit per trametre';
$string['submissionendbeforestart'] = 'La data límit per trametre no pot ser anterior a la data d\'apertura de les trameses';
$string['submissionenddatetime'] = 'Data límit per trametre: {$a->daydatetime} ({$a->distanceday})';
$string['submissionendevent'] = '{$a} (data límit per trametre)';
$string['submissionendswitch'] = 'Canvia a la fase següent després de la data límit per trametre';
$string['submissionendswitch_help'] = 'Si s\'ha indicat la data límit per trametre i aquesta casella està marcada, el taller automàticament canviarà a la fase d\'avaluació després de la data límit per trametre.

Si activeu aquesta característica, es recomana configurar també el mètode d\'assignació programada. Si no s\'assignen les trameses, no podrà fer-se cap avaluació encara que el taller estigui en la fase d\'avaluació.';
$string['submissiongrade'] = 'Qualificació de la tramesa';
$string['submissiongrade_help'] = 'Aquest paràmetre especifica la qualificació màxima que es pot obtenir per la feina tramesa.';
$string['submissiongradeof'] = 'Qualificació de la tramesa (de {$a})';
$string['submissionsettings'] = 'Paràmetres de la tramesa';
$string['submissionstart'] = 'Inici de les trameses des de';
$string['submissionstartdatetime'] = 'Inici de les trameses:{$a->daydatetime} ({$a->distanceday})';
$string['submissionstartevent'] = '{$a} (inici de les trameses)';
$string['submissiontitle'] = 'Títol';
$string['subplugintype_workshopallocation'] = 'Mètode d\'assignació de trameses';
$string['subplugintype_workshopallocation_plural'] = 'Mètodes d\'assignació d\'enviaments';
$string['subplugintype_workshopeval'] = 'Mètode d\'avaluació de qualificacions';
$string['subplugintype_workshopeval_plural'] = 'Mètodes d\'avaluació de qualificacions';
$string['subplugintype_workshopform'] = 'Estratègia de qualificació';
$string['subplugintype_workshopform_plural'] = 'Estratègies de qualificació';
$string['switchingphase'] = 'S\'està canviant de fase';
$string['switchphase'] = 'Canvia de fase';
$string['switchphase10info'] = 'Ara canviareu el taller a la <strong>Fase de configuració</strong>. En aquesta fase, els usuaris no poden modificar les seves trameses ni avaluacions. El professorat pot utilitzar aquesta fase per canviar els paràmetres del taller, modificar l\'estratègia de qualificació o retocar els formularis d\'avaluació.';
$string['switchphase20info'] = 'Ara canviareu el taller a la  <strong>Fase de tramesa</strong>. Els estudiants poden trametre la seva feina durant aquesta fase (entre les dates d\'inici i final de tramesa, si estan establertes). El professorat pot assignar trameses per tal que siguin revisades per companys.';
$string['switchphase30auto'] = 'El taller canviarà automàticament a la fase d\'avaluació després de {$a->daydatetime} ({$a->distanceday})';
$string['switchphase30info'] = 'Ara canviareu el taller a la  <strong>Fase d\'avaluació</strong>. En aquesta fase, els revisors poden avaluar les trameses que els han estat assignades (entre les dates d\'inici i final d\'avaluació, si estan establertes).';
$string['switchphase40info'] = 'Ara canviareu el taller a la  <strong>Fase d\'avaluació de les qualificacions</strong>. En aquesta fase, els usuaris no poden modificar les seves trameses ni avaluacions. El professorat poden usar les eines d\'avaluació de qualificacions per calcular les qualificacions finals i oferir retroacció als revisors.';
$string['switchphase50info'] = 'Ara tancareu el taller. Això farà que les qualificacions calculades apareguin al llibre de qualificacions. Els estudiants podran veure les seves trameses i l\'avaluació d\'aquestes.';
$string['taskassesspeers'] = 'Avalueu els companys';
$string['taskassesspeersdetails'] = 'total: {$a->total}<br />pendents: {$a->todo}';
$string['taskassessself'] = 'Autoavalueu-vos';
$string['taskconclusion'] = 'Proporcioneu una conclusió de l\'activitat';
$string['taskinstructauthors'] = 'Especifiqueu les instruccions per la tramesa';
$string['taskinstructreviewers'] = 'Especifiqueu les instruccions per l\'avaluació';
$string['taskintro'] = 'Establiu la introducció del taller';
$string['tasksubmit'] = 'Trameteu la vostra feina';
$string['toolbox'] = 'Eines del taller';
$string['undersetup'] = 'El taller d\'està configurant. Si us plau, espereu fins que es canvii a la fase següent.';
$string['useexamples'] = 'Usa exemples';
$string['useexamples_desc'] = 'Les trameses d\'exemple serveixen per practicar l\'avaluació';
$string['useexamples_help'] = 'Si s\'habilita, els usuaris poden provar d\'avaluar una o més trameses d\'exemple i comparar la seva avaluació amb una avaluació de referència. La qualificació obtinguda no computa per a la qualificació de l\'avaluació.';
$string['usepeerassessment'] = 'Usa l\'avaluació entre iguals';
$string['usepeerassessment_desc'] = 'Els estudiants poden avaluar els treballs dels altres';
$string['usepeerassessment_help'] = 'Si s\'habilita, a un usuari se li podran assignar trameses d\'altres usuaris per tal d\'avaluar-les, i rebrà una qualificació per aquesta avaluació a més de la qualificació de la seva pròpia tramesa.';
$string['userdatecreated'] = 'tramesa el <span>{$a}</span>';
$string['userdatemodified'] = 'modificada el <span>{$a}</span>';
$string['userplan'] = 'Planificador del taller';
$string['userplan_help'] = 'El planificador del taller mostra totes les fases de l\'activitat i llista les tasques de cada fase. La fase actual es destaca i les tasques completades es marquen amb un senyal.';
$string['useselfassessment'] = 'Usa l\'autoavaluació';
$string['useselfassessment_desc'] = 'Els estudiants poden avaluar les seves pròpies trameses';
$string['useselfassessment_help'] = 'Si s\'habilita, a un usuari se li podrà assignar la seva pròpia tramesa per tal d\'avaluar-la, i rebrà una qualificació per aquesta avaluació a més de la qualificació de la seva pròpia tramesa.';
$string['weightinfo'] = 'Pes: {$a}';
$string['withoutsubmission'] = 'Revisor sense tramesa pròpia';
$string['workshop:addinstance'] = 'Afegeix un taller nou';
$string['workshop:allocate'] = 'Assigna les trameses per revisar';
$string['workshop:editdimensions'] = 'Edita els formularis d\'avaluació';
$string['workshopfeatures'] = 'Característiques del taller';
$string['workshop:ignoredeadlines'] = 'Ignora les restriccions temporals';
$string['workshop:manageexamples'] = 'Gestiona les trameses d\'exemple';
$string['workshopname'] = 'Nom del taller';
$string['workshop:overridegrades'] = 'Rectifica les qualificacions calculades';
$string['workshop:peerassess'] = 'Avaluacions dels companys';
$string['workshop:publishsubmissions'] = 'Publica trameses';
$string['workshop:submit'] = 'Envia';
$string['workshop:switchphase'] = 'Canvia de fase';
$string['workshop:view'] = 'Visualitza el taller';
$string['workshop:viewallassessments'] = 'Mostra totes les avaluacions';
$string['workshop:viewallsubmissions'] = 'Mostra totes les trameses';
$string['workshop:viewauthornames'] = 'Mostra els noms dels autors';
$string['workshop:viewauthorpublished'] = 'Mostra els autors de les trameses publicades';
$string['workshop:viewpublishedsubmissions'] = 'Mostra les trameses publicades';
$string['workshop:viewreviewernames'] = 'Mostra els noms dels revisors';
$string['yourassessment'] = 'La vostra avaluació';
$string['yourgrades'] = 'Les vostres qualificacions';
$string['yoursubmission'] = 'La vostra tramesa';
