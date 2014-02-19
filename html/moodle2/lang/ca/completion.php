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
 * Strings for component 'completion', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   completion
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['achievinggrade'] = 'Qualificació assolida';
$string['activities'] = 'Activitats';
$string['activitiescompleted'] = 'Activitats realitzades';
$string['activitycompletion'] = 'Compleció de l\'activitat';
$string['afterspecifieddate'] = 'Després de la data especificada';
$string['aggregationmethod'] = 'Mètode d\'agregació';
$string['all'] = 'Tot';
$string['any'] = 'Cap';
$string['approval'] = 'Aprovació';
$string['badautocompletion'] = 'Quan habiliteu la compleció automàtica, cal que activeu almenys un requisit (a sota).';
$string['completed'] = 'Completat';
$string['completedunlocked'] = 'Opcions de compleció debloquejades';
$string['completedunlockedtext'] = 'Quan deseu els canvis, l\'estat de compleció per a tots els estudiants s\'esborrarà. Si canvieu d\'opinió sobre això no deseu el formulari.';
$string['completedwarning'] = 'Opcions de compleció bloquejades';
$string['completedwarningtext'] = 'Un o més estudiants ({$a}) ja tenen completada aquesta activitat. Canviar les opcions de compleció esborrarà el seu estat de compleció i pot provocar errors. Per això aquestes opcions estan bloquejades i no s\'haurien de desbloquejar si no és absolutament necessari.';
$string['completion'] = 'Seguiment de compleció';
$string['completion-alt-auto-enabled'] = 'El sistema indica que aquest apartat està completat d\'acord amb les condicions: {$a}';
$string['completion-alt-auto-fail'] = 'Completat: {$a} (no han aconseguit assolir la qualificació)';
$string['completion-alt-auto-n'] = 'Incomplet: {$a}';
$string['completion-alt-auto-pass'] = 'Completat: {$a} (han assolit la qualificació)';
$string['completion-alt-auto-y'] = 'Completat: {$a}';
$string['completion-alt-manual-enabled'] = 'L\'estudiantat pot marcar de forma manual aquest apartat com completat: {$a}';
$string['completion-alt-manual-n'] = 'Incomplet: {$a}. Seleccioneu-lo per marcar com a completat.';
$string['completion-alt-manual-y'] = 'Completat: {$a}. Seleccioneu-lo per marcar com a incomplet';
$string['completion_automatic'] = 'Mostra l\'activitat com completada si es compleixen les condicions';
$string['completiondependencies'] = 'Dependències de compleció';
$string['completiondisabled'] = 'Deshabilitada, no mostreu els paràmetres de l\'activitat';
$string['completionenabled'] = 'Habilitada, control mitjançant compleció i paràmetres de l\'activitat';
$string['completionexpected'] = 'S\'espera que es completi el';
$string['completionexpected_help'] = 'Aquest paràmetre especifica la data en què s\'espera que es completi l\'activitat. La data no es mostra a l\'estudiantat i sols es mostra a l\'informe de compleció d\'activitat.';
$string['completion-fail'] = 'Completat (no han aconseguit assolir la qualificació)';
$string['completion_help'] = 'Si s\'habilita, es fa un seguiment de compleció de l\'activitat, de forma manual o de forma automàtica, sobre la base de certes condicions. Es poden configurar múltiples condicions. Si es vol, l\'activitat només es considerarà completada quan es complisquen TOTES les condicions.

Una marca al costat del nom de l\'activitat en la pàgina del curs indica que l\'activitat s\'ha completat.';
$string['completionicons'] = 'Caixa de marques de compleció';
$string['completionicons_help'] = 'Una marca a la vora d\'un nom d\'activitat pot ser utilitzada per indicar que l\'activitat està completada.

Si es mostra una marca puntejada, una marca apareixerà de forma automàtica quan hagis completat l\'activitat d\'acord amb les condicions establertes pel professor.

Si es mostra una marca blanca, podeu prémer sobre ella per marcar la caixa quan penseu que l\'activitat s\'ha finalitzat. (Prémer una altra vegada sobre la marca la traurà si canvies de parer).
La marca és opcional però és una forma senzilla de seguir el progres del curs.';
$string['completion_manual'] = 'Els estudiants poden marcar de forma manual l\'activitat com completada';
$string['completionmenuitem'] = 'Compleció';
$string['completion-n'] = 'Incomplet';
$string['completion_none'] = 'No indiqueu la compleció de l\'activitat';
$string['completionnotenabled'] = 'No s\'ha habilitat la compleció';
$string['completionnotenabledforcourse'] = 'No s\'ha habilitat la compleció en aquest curs';
$string['completionnotenabledforsite'] = 'No s\'ha habilitat la compleció en aquest lloc';
$string['completiononunenrolment'] = 'Compleció quan es cancel·li la inscripció';
$string['completion-pass'] = 'Completat (s\'ha assolit la qualificació)';
$string['completionsettingslocked'] = 'Bloquejats els paràmetres de compleció';
$string['completionstartonenrol'] = 'El seguiment de la compleció comença amb la inscripció al curs';
$string['completionstartonenrolhelp'] = 'Comença el seguiment del progrés d\'un estudiant en la compleció del curs en inscriure\'s al curs';
$string['completion-title-manual-n'] = 'Marca com completat: {$a}';
$string['completion-title-manual-y'] = 'Marca com a incomplet: {$a}';
$string['completionusegrade'] = 'Qualificació requerida';
$string['completionusegrade_desc'] = 'L\'estudiant ha de rebre una qualificació per completar aquesta activitat';
$string['completionusegrade_help'] = 'Si s\'habilita, l\'activitat es considera completa quan un estudiant rep una qualificació. La icona aprova o suspèn es mostrarà si s\'ha configurat la qualificació per a aprovar de l\'activitat.';
$string['completionview'] = 'Visualització requerida';
$string['completionview_desc'] = 'Cal que l\'estudiant visualitzi aquesta activitat per completar-la.';
$string['completion-y'] = 'Completat';
$string['configenablecompletion'] = 'Quan s\'habilita, us permet activar el seguiment de la compleció (progrés) dins d\'un curs.';
$string['confirmselfcompletion'] = 'Confirma auto-compleció';
$string['coursealreadycompleted'] = 'Ja heu completat aquest curs';
$string['coursecomplete'] = 'Curs complet';
$string['coursecompleted'] = 'Curs completat';
$string['coursegrade'] = 'Qualificació del curs';
$string['coursesavailable'] = 'Cursos disponibles';
$string['coursesavailableexplaination'] = '<i>Cal configurar els criteris de compleció del curs per tal que aparegui en aquesta llista</i>';
$string['criteria'] = 'Criteris';
$string['criteriagradenote'] = 'Tingueu en compte que actualitzar ací la qualificació requerida no actualitzarà la qualificació actual per a aprovar el curs.';
$string['criteriagroup'] = 'Grup de criteris';
$string['criteriarequiredall'] = 'Calen tots els criteris de sota. ';
$string['criteriarequiredany'] = 'Cal qualsevol dels criteris de sota';
$string['csvdownload'] = 'Baixa en un full de càlcul en format (UTF-8 .csv)';
$string['datepassed'] = 'Data en què es va aprovar';
$string['days'] = 'Dies';
$string['daysafterenrolment'] = 'Dies després de la inscripció';
$string['deletecompletiondata'] = 'Suprimeix les dades de compleció';
$string['dependencies'] = 'Dependències';
$string['dependenciescompleted'] = 'Dependències completades';
$string['durationafterenrolment'] = 'Durada després de la inscripció';
$string['editcoursecompletionsettings'] = 'Edita els paràmetres de compleció del curs';
$string['enablecompletion'] = 'Habilita el seguiment de la compleció';
$string['enrolmentduration'] = 'Dies perquè acabi';
$string['err_noactivities'] = 'La informació de compleció no està habilitada per cap activitat, per això no se\'n mostra cap. Podeu habilitar la informació de compleció editant els paràmetres de l\'activitat.';
$string['err_nocourses'] = 'La compleció del curs no està habilitada per cap altre curs, per això cap més es mostra. Podeu habilitar la compleció del curs editant els paràmetres del curs.';
$string['err_nograde'] = 'No s\'ha configurat cap nota per aprovar aquest curs. Per habilitar aquest criteri us cal crear una qualificació d\'aprovat per a aquest curs.';
$string['err_noroles'] = 'No hi ha cap rol dins del curs amb la capacitat \'moodle/course:markcomplete\' . Podeu habilitar aquest tipus de criteri afegint aquesta capacitat a algun rol. ';
$string['err_nousers'] = 'No hi ha estudiants en aquest curs o grup per als quals la informació de compleció es pugui mostrar. (Per defecte, la informació de compleció sols es mostra per als alumnes, per això com no hi ha alumnes teniu aquest error. Els administradors poden alterar aquesta opció mitjançant els menús d\'administració).';
$string['err_settingslocked'] = 'Un o més estudiants han completat els criteris, per això la configuració està bloquejada. Desbloquejar els paràmetres dels criteris de compleció suprimirà qualsevol dada dels usuaris i provocarà confusió. ';
$string['err_system'] = 'Ha succeït un error intern en el sistema de compleció. (Els administradors del sistema poden habilitar la depuració d\'errors per trobar més informació.) ';
$string['excelcsvdownload'] = 'Descarrega en format compatible amb Excel (.csv)';
$string['fraction'] = 'Fracció';
$string['graderequired'] = 'Qualificació requerida';
$string['gradexrequired'] = '{$a} requerit';
$string['inprogress'] = 'En progrés';
$string['manualcompletionby'] = 'Compleció manual per';
$string['manualselfcompletion'] = 'Auto-compleció manual';
$string['markcomplete'] = 'Senyala completat';
$string['markedcompleteby'] = 'Senyala completat per {$a}';
$string['markingyourselfcomplete'] = 'Autosenyalant completat';
$string['moredetails'] = 'Més detalls';
$string['nocriteriaset'] = 'No s\'han definit criteris de compleció per a aquest curs';
$string['notcompleted'] = 'Incomplet';
$string['notenroled'] = 'No us heu inscrit en aquest curs';
$string['nottracked'] = 'A hores d\'ara no s\'està realitzant el seguiment de la vostra compleció en aquest curs.';
$string['notyetstarted'] = 'No començat encara';
$string['overallcriteriaaggregation'] = 'Sobre tots els tipus de criteri d\'agregació';
$string['pending'] = 'Pendents';
$string['periodpostenrolment'] = 'Període posterior a la inscripció';
$string['progress'] = 'Progrés de l\'estudiant';
$string['progress-title'] = '{$a->user}, {$a->activity}: {$a->state} {$a->date}';
$string['progresstotal'] = 'Progrés: {$a->complete} / {$a->total}';
$string['recognitionofpriorlearning'] = 'Reconeixement d\'aprenentatges previs';
$string['remainingenroledfortime'] = 'Resta d\'inscrits per un període determinat de temps';
$string['remainingenroleduntildate'] = 'Resta d\'inscrits fins a una data determinada';
$string['reportpage'] = 'Es mostren els usuaris {$a->from} a {$a->to} de {$a->total}.';
$string['requiredcriteria'] = 'Criteri requerit';
$string['restoringcompletiondata'] = 'Escrivint les dades de compleció';
$string['saved'] = 'Desat';
$string['seedetails'] = 'Visualitza detalls';
$string['self'] = 'Auto';
$string['selfcompletion'] = 'Auto-compleció';
$string['showinguser'] = 'Visualitza usuaris';
$string['unenrolingfromcourse'] = 'Suprimeix la inscripció del curs';
$string['unenrolment'] = 'Suprimeix la inscripció';
$string['unit'] = 'Unitat';
$string['unlockcompletion'] = 'Desbloqueja les opcions de compleció';
$string['unlockcompletiondelete'] = 'Desbloqueja les opcions de compleció i suprimeix les dades de compleció de l\'usuari';
$string['usealternateselector'] = 'Utilitza el selector de curs alternatiu';
$string['usernotenroled'] = 'L\'usuari no s\'ha inscrit en aquest curs';
$string['viewcoursereport'] = 'Visualitza l\'informe del curs';
$string['viewingactivity'] = 'Visualitzar la {$a}';
$string['writingcompletiondata'] = 'Escrivint les dades de compleció';
$string['xdays'] = '{$a} dies';
$string['yourprogress'] = 'El vostre progrés';
