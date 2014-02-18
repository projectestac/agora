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
 * Strings for component 'assign', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Je hebt opdrachten die nagekeken moeten worden';
$string['addsubmission'] = 'Inzending toevoegen';
$string['allowsubmissions'] = 'Sta de gebruiker toe om inzendingen te blijven maken voor deze opdracht.';
$string['allowsubmissionsanddescriptionfromdatesummary'] = 'De opdrachtdetails en het instuurformulier zullen beschikbaar zijn vanaf <strong>{$a}</strong>';
$string['allowsubmissionsfromdate'] = 'Insturen toestaan vanaf';
$string['allowsubmissionsfromdate_help'] = 'Indien ingeschakeld zullen leerlingen niet kunnen insturen voor deze datum. Indien uitgeschakeld zullen leerlingen hun opdracht onmiddellijk kunnen insturen.';
$string['allowsubmissionsfromdatesummary'] = 'Deze opdracht zal inzendingen ontvangen vanaf <strong>{$a}</strong>';
$string['allowsubmissionsshort'] = 'Sta het wijzigen van ingestuurde opdrachten toe';
$string['alwaysshowdescription'] = 'Toon de beschrijving altijd';
$string['alwaysshowdescription_help'] = 'Indien uitgeschakeld, zal de opdrachtbeschrijving voor de leerlingen pas zichtbaar worden op uur en datum vermeld bij "Insturen toestaan vanaf".';
$string['applytoteam'] = 'Cijfers en feedback aan de hele groep geven';
$string['assign:addinstance'] = 'Voeg een nieuwe opdracht toe';
$string['assign:exportownsubmission'] = 'Exporteer je opdracht';
$string['assignfeedback'] = 'Feedback plugin';
$string['assignfeedbackpluginname'] = 'Feedback plugin';
$string['assign:grade'] = 'Beoordeel opdracht';
$string['assign:grantextension'] = 'Geef extra tijd';
$string['assignmentisdue'] = 'Opdracht tegen';
$string['assignmentmail'] = '{$a->grader} heeft feedback gepost voor je ingestuurde opdracht voor \'{$a->assignment}\'

Je kunt de feedback nalezen onderaan je ingestuurde opdracht: {$a->url}';
$string['assignmentmailhtml'] = '{$a->grader} heeft feedback gepost voor je ingestuurde opdracht voor <i>\'{$a->assignment}\'</i><br />

Je kunt de feedback nalezen onderaan je <a href="{$a->url}">ingestuurde opdracht</a>';
$string['assignmentmailsmall'] = '{$a->grader} heeft feedback gepost voor je ingestuurde opdracht voor \'{$a->assignment}\'
Je kunt de feedback nalezen onderaan je ingestuurde opdracht';
$string['assignmentname'] = 'Naam van de opdracht';
$string['assignmentplugins'] = 'Opdracht plugins';
$string['assignmentsperpage'] = 'Opdrachten per pagina';
$string['assign:revealidentities'] = 'Identiteit leerlingen tonen';
$string['assignsubmission'] = 'Inzendingsplugin';
$string['assignsubmissionpluginname'] = 'Inzendingsplugin';
$string['assign:submit'] = 'Stuur opdracht in';
$string['assign:view'] = 'Bekijk opdracht';
$string['availability'] = 'Beschikbaarheid';
$string['backtoassignment'] = 'Terug naar opdracht';
$string['batchoperationconfirmgrantextension'] = 'Geef extra tijd voor alle';
$string['batchoperationconfirmlock'] = 'Blokkeer alle geselecteerde inzendingen?';
$string['batchoperationconfirmreverttodraft'] = 'Alle geselecteerde inzendingen terug naar kladwerk zetten?';
$string['batchoperationconfirmunlock'] = 'Alle geselecteerde opdrachten deblokkeren?';
$string['batchoperationlock'] = 'blokkeer inzendingen';
$string['batchoperationreverttodraft'] = 'inzendingen terugdraaien naar kladwerk';
$string['batchoperationsdescription'] = 'Met geselecteerde...';
$string['batchoperationunlock'] = 'deblokkeer inzendingen';
$string['blindmarking'] = 'Blind beoordelen';
$string['blindmarking_help'] = 'Blind beoordelen verbergt de identiteit van leerlingen voor de beoordelaars. De blind beooordelen instellingen zullen geblokkeerd worden als er minstens één beoordeling is gebeurd voor deze opdracht.';
$string['changegradewarning'] = 'Deze opdracht heeft beoordeelde inzendingen en het wijzigen van het cijfer zal de bestaande cijfers niet herberekenen. Je moet alle bestaande inzendingen herbeoordelen als je het cijfer wil wijzigen.';
$string['choosegradingaction'] = 'Beoordelingsactie';
$string['chooseoperation'] = 'Kies bewerking';
$string['comment'] = 'Commentaar';
$string['completionsubmit'] = 'leerling moet deze actitviteit insturen om ze te voltooien';
$string['configshowrecentsubmissions'] = 'Iedereen kan in rapporteringen over "Recente activiteit" zien dat er opdrachten zijn ingestuurd.';
$string['confirmbatchgradingoperation'] = 'Weet je zeker dat je wil {$a->operation} voor {$a->count} leerlingen?';
$string['confirmsubmission'] = 'Weet je zeker dat je je werk wil insturen voor beoordeling? Je zult geen wijzigingen meer kunnen aanbrengen';
$string['conversionexception'] = 'Kon opdracht niet converteren. Het probleem was: {$a}.';
$string['couldnotconvertgrade'] = 'Kon beoordelingscijfer van de opdracht niet converteren voor gebruiker {$a}.';
$string['couldnotconvertsubmission'] = 'Kon inzending van de opdracht niet converteren voor gebruiker {$a}';
$string['couldnotcreatecoursemodule'] = 'Kon cursusmodule niet aanmaken.';
$string['couldnotcreatenewassignmentinstance'] = 'Kon geen nieuwe opdrachtinstantie maken.';
$string['couldnotfindassignmenttoupgrade'] = 'Kon geen oude opdracht-instantie vinden om te upgraden.';
$string['currentgrade'] = 'Huidig cijfer in puntenboek';
$string['cutoffdate'] = 'Afsluitdatum';
$string['cutoffdatefromdatevalidation'] = 'Afsluitdatum moet na de startdatum zijn.';
$string['cutoffdate_help'] = 'Indien ingesteld zal een opdracht geen inzendingen meer ontvangen na deze datum zonder extra tijd';
$string['cutoffdatevalidation'] = 'Afsluitdatum moet na de einddatum zijn.';
$string['defaultplugins'] = 'Standaard opdrachtinstellingen';
$string['defaultplugins_help'] = 'Deze instellingen definiëren de standaardinstellingen voor alle nieuwe opdrachten.';
$string['defaultteam'] = 'Standaard groep';
$string['deleteallsubmissions'] = 'Verwijder alle inzendingen';
$string['deletepluginareyousure'] = 'Opdrachtplugin {$a} verwijderen: weet je het zeker?';
$string['deletepluginareyousuremessage'] = 'Je gaat de opdrachtplugin {$a} volledig verwijderen. Dit zal alles in de databank, geassocieerd met deze opdracht-plugin verwijderen. Weet je zeker dat je wil verder gaan?';
$string['deletingplugin'] = 'Plugin {$a} aan het verwijderen.';
$string['description'] = 'Beschrijving';
$string['downloadall'] = 'Download alle inzendingen';
$string['duedate'] = 'Uiterste inleverdatum';
$string['duedate_help'] = 'Dit is wanneer de opdracht moet afgegeven worden. Indien opdrachten te laat mogen afgegeven worden, dan zullen alle opdrachten die na deze datum ingestuurd zijn als laat gemarkeerd worden. Om te verhinderen dat opdrachten na een bepaalde datum insgestuurd worden, kun je een afsluitdatum instellen.';
$string['duedateno'] = 'Geen uiterste inleverdatum';
$string['duedatereached'] = 'De datum waarop deze opdracht moest afgegeven worden is nu voorbij.';
$string['duedatevalidation'] = 'De datum waarop de opdrachten moeten afgegeven worden moet na de datum vallen vanaf wanneer opdrachten kunnen afgegeven worden.';
$string['editaction'] = 'Acties...';
$string['editingstatus'] = 'Status bewerken';
$string['editsubmission'] = 'Bewerk mijn inzending';
$string['enabled'] = 'Ingeschakeld';
$string['errornosubmissions'] = 'Er zijn geen inzendingen om te downloaden';
$string['errorquickgradingvsadvancedgrading'] = 'De cijfers werden niet bewaard omdat deze opdracht nu op geavanceerd beoordelen is ingesteld';
$string['errorrecordmodified'] = 'De cijfers werden niet bewaard omdat iemand één of meer gegevens heeft gewijzigd sinds jij de pagina hebt geladen.';
$string['extensionduedate'] = 'Extra tijd einddatum';
$string['extensionnotafterduedate'] = 'De extra tijd einddatum moet na de einddatum zijn.';
$string['extensionnotafterfromdate'] = 'De extra tijd einddatum moet na de startdatum zijn';
$string['feedback'] = 'Feedback';
$string['feedbackavailablehtml'] = '{$a->username} heeft feedbackgegeven op je ingestuurde opdracht voor \'<i>{$a->assignment}</i>\'<br /><br />
Je kunt die bekijken bij je <a href="{$a->url}">ingestuurde opdracht</a>.';
$string['feedbackavailablesmall'] = '{$a->username} heeft feedback gegeven voor opdracht {$a->assignment}';
$string['feedbackavailabletext'] = '{$a->username} heeft feedbackgegeven op je ingestuurde opdracht voor \'{$a->assignment}\'

Je kunt die bekijken bij je ingestuurde opdracht:

{$a->url}';
$string['feedbackplugin'] = 'Feedback plugin';
$string['feedbackpluginforgradebook'] = 'Feedbackplugin om opmerkingen naar het puntenboek te sturen';
$string['feedbackpluginforgradebook_help'] = 'Slechts één opdracht feedbackplugin kan feedback naar het puntenboek sturen.';
$string['feedbackplugins'] = 'Feedback plugins';
$string['feedbacksettings'] = 'Feedback-instellingen';
$string['filesubmissions'] = 'Ingestuurde bestanden';
$string['filter'] = 'Filter';
$string['filternone'] = 'Geen filter';
$string['filterrequiregrading'] = 'Beoordelen vereist';
$string['filtersubmitted'] = 'Ingestuurd';
$string['gradeabovemaximum'] = 'Cijfer moet gelijk zijn aan of kleiner zijn dan {$a}.';
$string['gradebelowzero'] = 'Cijfer moet groter of gelijk zijnj aan nul.';
$string['graded'] = 'Beoordeeld';
$string['gradedby'] = 'Beoordeeld door';
$string['gradedon'] = 'Beoordeeld op';
$string['gradelocked'] = 'Dit cijfer is geblokkeerd of overschreven in het puntenboek.';
$string['gradeoutof'] = 'Cijfer op {$a}';
$string['gradeoutofhelp'] = 'Cijfer';
$string['gradeoutofhelp_help'] = 'Geef hier het cijfer voor de opdracht van de leerling. Je mag ook decimalen gebruiken.';
$string['gradersubmissionupdatedhtml'] = '{$a->username} heeft de inzending voor opdracht <i>{$a->assignment}</i> aangepast om {$a->timeupdated}.<br /><br />
Je kunt ze <a href="{$a->url}"> nakijken op de website</a>.';
$string['gradersubmissionupdatedsmall'] = '{$a->username} heeft zijn ingestuurde taak aangepast voor opdracht {$a->assignment}';
$string['gradersubmissionupdatedtext'] = '{$a->username} heeft de inzending voor opdracht {$a->assignment} aangepast om {$a->timeupdated}.

Je kunt ze hier vinden:

{$a->url}';
$string['gradestudent'] = 'Beoordeel leerling: (id={$a->id}, naam={$a->fullname}).';
$string['gradeuser'] = 'Cijfer {$a}';
$string['grading'] = 'Beoordeling';
$string['gradingmethodpreview'] = 'Beoordelingscriteria';
$string['gradingoptions'] = 'Opties';
$string['gradingstatus'] = 'Beoordelingsstatus';
$string['gradingstudentprogress'] = 'Beoordeling leerling {$a->index} van {$a->count}';
$string['gradingsummary'] = 'Samenvatting beoordeling';
$string['grantextension'] = 'Geef extra tijd';
$string['grantextensionforusers'] = 'Geef extra tijd voor {$a} leerlingen';
$string['hiddenuser'] = 'Deelnemer';
$string['hideshow'] = 'Verberg/toon';
$string['instructionfiles'] = 'Instructiebestanden';
$string['invalidfloatforgrade'] = 'De gegeven beoordeling kon niet begrepen worden: {$a}';
$string['invalidgradeforscale'] = 'De gegeven beoordeling was niet geldig in de gebruikte schaal';
$string['lastmodifiedgrade'] = 'Laatst gewijzigd (beoordeling)';
$string['lastmodifiedsubmission'] = 'Laatst gewijzigd (inzending)';
$string['latesubmissions'] = 'Te late inzendingen';
$string['latesubmissionsaccepted'] = 'Enkel leerlingen die extra tijd gekregen hebben mogen de opdracht nog insturen';
$string['locksubmissionforstudent'] = 'Verhinder het insturen voor leerling (id={$a->id}, naam={$a->fullname}).';
$string['locksubmissions'] = 'Blokkeer insturen';
$string['manageassignfeedbackplugins'] = 'Beheer opdracht feedback plugins';
$string['manageassignsubmissionplugins'] = 'Beheer opdracht instuur plugins';
$string['maxgrade'] = 'Maximaal cijfer';
$string['messageprovider:assign_notification'] = 'Opdracht meldingen';
$string['modulename'] = 'Opdracht';
$string['modulename_help'] = 'Met de opdrachtactiviteit kan een leraar taken geven aan leerlingen, hun werk ophalen en cijfers en feedback geven.

Leerlingen kunnen gelijk welke digitale inhoud (bestanden), zoals documenten gemaakt met tekstverwerkers, rekenbladen, afbeeldingen, audio- en videobestanden, insturen. Wat eveneens kan, of als aanvulling, is dat leerlingen rechtstreeks tekst typen in een tekstformulier. Een opdracht kan ook gebruikt worden om leerlingen te herinneren aan een niet-digitale opdracht, zoals een kunstwerk.

Bij het beoordelen van opdrachten, kunnen leraren feedback geven en bestanden uploaden, zoals beoordeelde bestanden van leerlingen, documenten met opmerkingen of audiobestanden met gesproken tekst. Opdrachten kunnen beoordeeld worden met een numerieke of aangepaste schaal of met geavanceerde beoordelingsmethodes zoals een rubric. Het totaalcijfer wordt opgenomen in het puntenboek.';
$string['modulenameplural'] = 'Opdrachten';
$string['mysubmission'] = 'Status van jouw opdracht:';
$string['newsubmissions'] = 'Ingestuurde opdrachten';
$string['nofiles'] = 'Geen bestanden';
$string['nograde'] = 'Geen cijfer.';
$string['nolatesubmissions'] = 'Er worden geen te late ingestuurde opdrachten meer aanvaard.';
$string['nomoresubmissionsaccepted'] = 'Er worden geen te late ingestuurde opdrachten meer aanvaard.';
$string['noonlinesubmissions'] = 'Voor deze opdracht moet je niets online insturen';
$string['nosavebutnext'] = 'Volgende';
$string['nosubmission'] = 'Er is nog niets ingestuurd voor deze opdracht';
$string['nosubmissionsacceptedafter'] = 'Er worden geen opdrachten meer aanvaard na';
$string['notgraded'] = 'Niet beoordeeld';
$string['notgradedyet'] = 'Nog niet beoordeeld';
$string['notifications'] = 'Meldingen';
$string['notsubmittedyet'] = 'Nog niet ingestuurd';
$string['nousersselected'] = 'Geen gebruikers geselecteerd';
$string['numberofdraftsubmissions'] = 'Kladwerken';
$string['numberofparticipants'] = 'Deelnemers';
$string['numberofsubmissionsneedgrading'] = 'Beoordeling nodig';
$string['numberofsubmittedassignments'] = 'Ingestuurd';
$string['numberofteams'] = 'Groepen';
$string['offline'] = 'Je hoeft niets online in te sturen';
$string['open'] = 'Open';
$string['outlinegrade'] = 'Cijfer: {$a}';
$string['overdue'] = '<font color="red">Opdracht {$a} te laat ingestuurd</font>';
$string['page-mod-assign-view'] = 'Opdrachtmodule hoofdpagina';
$string['page-mod-assign-x'] = 'Elke opdracht module pagina';
$string['participant'] = 'Deelnemer';
$string['pluginadministration'] = 'Opdrachtbeheer';
$string['pluginname'] = 'Opdracht';
$string['preventsubmissions'] = 'Verhinder de gebruiker om meer in te sturen voor deze opdracht.';
$string['preventsubmissionsshort'] = 'Verhinder het wijzigen van ingestuurde opdrachten';
$string['previous'] = 'Vorige';
$string['quickgrading'] = 'Snel beoordelen';
$string['quickgradingchangessaved'] = 'De wijzigingen aan de cijfers zijn bewaard';
$string['quickgrading_help'] = 'Met snel beoordelen kun je rechtstreeks cijfers geven in de tabel met ingstuurde opdrachten. Snel beoordelen is niet compatibel met geavanceerde beoordelingsmethodes en wordt niet aangeraden wanneer er meerdere beoordelaars zijn.';
$string['quickgradingresult'] = 'Snel beoordelen';
$string['recordid'] = 'Identificatie';
$string['requireallteammemberssubmit'] = 'Eis dat alle groepsleden insturen';
$string['requireallteammemberssubmit_help'] = 'Indien ingeschakeld moeten alle leden van de groep op de insturen-knop klikken voor de opdracht als ingestuurd beschouwd wordt. Indien uitgeschakeld zal de opdracht van de groep als ingestuurd beschouwd worden als één van de leden van de groep op de instuurknop klikt.';
$string['requiresubmissionstatement'] = 'Eis dat leerlingen de voorwaarden voor insturen aanvaarden.';
$string['requiresubmissionstatementassignment'] = 'Eis dat leerlingen de voorwaarden voor insturen aanvaarden.';
$string['requiresubmissionstatementassignment_help'] = 'Vereis dat de leerling de inzendingsverklaring aanvaardt voor alle inzendingen voor deze opdracht.';
$string['requiresubmissionstatement_help'] = 'Eisen dat leerlingen de voorwaarden voor insturen aanvaarden voor alle opdrachten van deze Moodle installatie. Als deze instelling niet is ingeschakeld, dan kan dit nog in- of uitgeschakeld worden per opdracht.';
$string['revealidentities'] = 'Toon identiteit leerlingen';
$string['revealidentitiesconfirm'] = 'Weet je zeker dat je de identiteit van de leerlingen wil tonen voor deze opdracht? Deze operatie kan niet ongedaan gemaakt worden. Als de identiteit van de leerlingen getoond wordt, dan worden de punten vrijgegeven in het puntenboek.';
$string['reverttodraft'] = 'Zet de ingestuurde opdracht terug naar kladwerk';
$string['reverttodraftforstudent'] = 'Zet de ingestuurde opdracht terug naar kladwerk voor leerling:  (id={$a->id}, naam={$a->fullname}).';
$string['reverttodraftshort'] = 'Zet de ingestuurde opdracht terug naar kladwerk';
$string['reviewed'] = 'Nagekeken';
$string['saveallquickgradingchanges'] = 'Bewaar alle "snel beoordelen" wijzigen';
$string['savechanges'] = 'Bewaar de wijzigingen';
$string['savenext'] = 'Bewaar en toon volgende';
$string['scale'] = 'Schaal';
$string['selectlink'] = 'Selecteer...';
$string['selectuser'] = 'Selecteer {$a}';
$string['sendlatenotifications'] = 'Stuur een melding naar de beoordelaars over te laat ingestuurde opdrachten';
$string['sendlatenotifications_help'] = 'Indien ingeschakeld zullen beoordelaars (gewoonlijk leraren) een bericht ontvangen wanneer een leerling een opdracht te laat instuurt. De manier van berichtgeving kan ingesteld worden.';
$string['sendnotifications'] = 'Stuur een melding naar beoordelaars over ingestuurde opdrachten';
$string['sendnotifications_help'] = 'Indien ingeschakeld zullen beoordelaars (gewoonlijk leraren) een bericht ontvangen wanneer een leerling een opdracht instuurt, te vroeg, op tijd en te laat. De manier van berichtgeving kan ingesteld worden.';
$string['sendsubmissionreceipts'] = 'Stuur ontvangstbewijs naar leerlingen';
$string['sendsubmissionreceipts_help'] = 'Dit schakelt ontvangstbewijzen in voor leerlingen. Leerlingen zullen een melding krijgen, telkens ze met succes een opdracht ingestuurd hebben';
$string['settings'] = 'Opdracht instellingen';
$string['showrecentsubmissions'] = 'Toon recente inzendingen';
$string['submission'] = 'Ingestuurde opdracht';
$string['submissiondrafts'] = 'Verwacht van leerlingen dat ze op de "Instuur"-knop klikken';
$string['submissiondrafts_help'] = 'Indien ingeschakeld, zullen leerlingen op een instuurknop moeten klikken om hun opdracht als voltooid te verklaren. Dit maakt het mogelijk dat leerlingen een kladwerk van de opdracht op het systeem bewaren. Indien deze instelling van "Nee" naar "Ja" gewijzigd wordt, nadat leerlingen al iets ingestuurd hebben, dan zullen die ingestuurde opdrachten als voltooid beschouwd worden.';
$string['submissioneditable'] = 'Leerling kan zijn ingestuurde opdracht bewerken';
$string['submissionempty'] = 'Er is niets ingestuurd';
$string['submissionnoteditable'] = 'Leerling kan ingestuurde opdracht niet bewerken';
$string['submissionnotready'] = 'De opdracht is niet klaar om ingestuurd te worden:';
$string['submissionplugins'] = 'Instuurplugins';
$string['submissionreceipthtml'] = 'Je hebt een opdracht ingestuurd voor \'<i>{$a->assignment}</i>\'<br /><br />
Je kunt de status hiervan volgen <a href="{$a->url}">via deze link</a>.';
$string['submissionreceipts'] = 'Stuur instuurbewijzen';
$string['submissionreceiptsmall'] = 'Je hebt je opdracht ingestuurd voor {$a->assignment}';
$string['submissionreceipttext'] = 'Je hebt een opdracht ingestuurd voor \'{$a->assignment}\'.

Je kunt de status hiervan volgen:

{$a->url}';
$string['submissions'] = 'Ingestuurde opdrachten';
$string['submissionsclosed'] = 'Insturen afgesloten';
$string['submissionsettings'] = 'Instellingen insturen opdrachten';
$string['submissionslocked'] = 'Voor deze opdracht kan nu niets ingestuurd worden.';
$string['submissionslockedshort'] = 'Wijzigen van je ingestuurde opdracht niet toegestaan';
$string['submissionsnotgraded'] = 'Ingestuurde opdracht niet beoordeeld: {$a}';
$string['submissionstatement'] = 'Voorwaarden voor insturen.';
$string['submissionstatementacceptedlog'] = 'Voorwaarden voor insturen aanvaard door gebruiker {$a}';
$string['submissionstatementdefault'] = 'Deze opdracht is mijn eigen werk, behalve waar ik verwijs naar het werk van anderen.';
$string['submissionstatement_help'] = 'Bevestiging voor het aanvaarden van de voorwaarden voor insturen';
$string['submissionstatus'] = 'Status ingestuurde opdracht';
$string['submissionstatus_'] = 'Geen ingestuurde opdracht';
$string['submissionstatus_draft'] = 'Kladwerk (nog niet ingestuurd)';
$string['submissionstatusheading'] = 'Status ingestuurde opdracht';
$string['submissionstatus_marked'] = 'Beoordeeld';
$string['submissionstatus_new'] = 'Nieuwe ingestuurde opdracht';
$string['submissionstatus_submitted'] = 'Opdracht ingestuurd om te beoordelen';
$string['submissionteam'] = 'Groep';
$string['submitaction'] = 'Insturen';
$string['submitassignment'] = 'Stuur opdracht in';
$string['submitassignment_help'] = 'Als je deze opdracht hebt ingestuurd, dan zul je geen wijzigingen meer kunnen aanbrengen';
$string['submitted'] = 'Ingestuurd';
$string['submittedearly'] = 'Opdracht was {$a} te vroeg ingestuurd';
$string['submittedlate'] = 'Opdracht was {$a} te laat ingestuurd';
$string['submittedlateshort'] = '{$a} laat';
$string['teamsubmission'] = 'Leerlingen sturen groepsopdracht in';
$string['teamsubmissiongroupingid'] = 'Groepering voor groepen van leerlingen';
$string['teamsubmissiongroupingid_help'] = 'Dit is de groepering die de opdracht zal gebruiken om groepen voor leerlingen te vinden. Indien niet ingesteld zal de standaard set groepen gebruikt worden.';
$string['teamsubmission_help'] = 'Indien ingeschakeld zullen de leerlingen in groepen verdeeld worden, gebaseerd op de standaard set groepen van een aangepaste groepering. De ingestuurde opdracht van een groep zal gedeeld worden door de groepsleden en alle leden van de groep zullen elkaars wijzigingen aan de opdracht zien.';
$string['teamsubmissionstatus'] = 'Groep instuur status';
$string['textinstructions'] = 'Opdracht instructies';
$string['timemodified'] = 'Laatst gewijzigd';
$string['timeremaining'] = 'Resterende tijd';
$string['unlocksubmissionforstudent'] = 'Insturen toestaan voor leerling:  (id={$a->id}, fullname={$a->fullname}).';
$string['unlocksubmissions'] = 'Insturen deblokkeren';
$string['updategrade'] = 'Cijfer aanpassen';
$string['updatetable'] = 'Bewaar en vernieuw tabel';
$string['upgradenotimplemented'] = 'Upgrade nog niet geïmplementeerd in plugin ({$a->type} {$a->subtype})';
$string['userextensiondate'] = 'Extra tijd gegeven tot: {$a}';
$string['usergrade'] = 'Gebruikerscijfer';
$string['userswhoneedtosubmit'] = 'Leerlingen die nog moeten insturen: {$a}';
$string['viewfeedback'] = 'Bekijk feedback';
$string['viewfeedbackforuser'] = 'Bekijk feedback voor gebruiker: {$a}';
$string['viewfull'] = 'Bekijk volledig';
$string['viewfullgradingpage'] = 'Open de volledige beoordelingspagina om feedback te geven';
$string['viewgradebook'] = 'Bekijk puntenboek';
$string['viewgrading'] = 'Bekijk/beoordeel alle ingestuurde opdrachten';
$string['viewgradingformforstudent'] = 'Bekijk beoordelingspagina voor leerling:  (id={$a->id}, fullname={$a->fullname}).';
$string['viewownsubmissionform'] = 'Bekijk je eigen pagina om de opdracht in te sturen';
$string['viewownsubmissionstatus'] = 'Bekijk je eigen status van je ingestuurde opdracht';
$string['viewrevealidentitiesconfirm'] = 'Bekijk de toon leerling identiteit bevestigingspagina.';
$string['viewsubmission'] = 'Bekijk ingestuurde opdracht';
$string['viewsubmissionforuser'] = 'Bekijk ingestuurde opdracht voor gebruiker: {$a}';
$string['viewsubmissiongradingtable'] = 'Bekijk beoordelingstabel voor ingestuurde opdracht.';
$string['viewsummary'] = 'Bekijk samenvatting';
