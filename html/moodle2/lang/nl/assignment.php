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
 * Strings for component 'assignment', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Je hebt opdrachten die nagekeken moeten worden';
$string['addsubmission'] = 'Inzending toevoegen';
$string['allowdeleting'] = 'Verwijderen toestaan';
$string['allowdeleting_help'] = 'Indien ingeschakeld kunnen deelnemers geüploade bestanden verwijderen voor de opdracht ingestuurd wordt om beoordeeld te worden.';
$string['allowmaxfiles'] = 'Maximaal aantal geüploade bestanden';
$string['allowmaxfiles_help'] = 'Maximaal aantal bestanden die elke deelnemers mag uploaden. Dit aantal wordt niet aan de deelnemers getoond. Noteer het aantal gevraagde bestanden ergens in de beschrijving van de opdracht.';
$string['allownotes'] = 'Notities toestaan';
$string['allownotes_help'] = 'Indien ingeschakeld kunnen deelnemers notities plaatsen in een tekstzone.
Het werkt zoals een online opdracht.';
$string['allowresubmit'] = 'Sta herhaald insturen toe';
$string['allowresubmit_help'] = 'Indien ingeschakeld, kunnen leerlingen hun opdracht  opnieuw insturen nadat de leraar ze al beoordeeld heeft (zodat de opdracht opnieuw kan beoordeeld worden).';
$string['alreadygraded'] = 'Jouw opdracht is al beoordeeld en opnieuw insturen is niet toegelaten.';
$string['assignment:addinstance'] = 'Voeg een nieuwe opdracht toe';
$string['assignmentdetails'] = 'De details van de opdracht';
$string['assignment:exportownsubmission'] = 'Exporteer je opdracht';
$string['assignment:exportsubmission'] = 'Exporteer inzending';
$string['assignment:grade'] = 'Beoordeel opdracht';
$string['assignmentmail'] = '{$a->teacher} heeft feedback gepost voor je bijdrage aan de opdracht \'{$a->assignment}\'
Hij is toegevoegd aan je ingestuurde opdracht:
{$a->url}';
$string['assignmentmailhtml'] = '<p>{$a->teacher} heeft feedback gepost voor je bijdrage aan de opdracht \'<i>{$a->assignment}</i>\'</p><p>
Hij is toegevoegd aan je ingestuurde <a href="{$a->url}">opdracht</a>.</p>';
$string['assignmentmailsmall'] = '{$a->teacher} heeft feedback voor jou geschreven over je ingestuurde opdracht voor  \'{$a->assignment}\' Je kunt de feedback lezen bij je ingestuurde opdracht.';
$string['assignmentname'] = 'Naam van de opdracht';
$string['assignmentsubmission'] = 'Ingestuurde opdrachten';
$string['assignment:submit'] = 'Stuur opdracht in';
$string['assignmenttype'] = 'Soort opdracht';
$string['assignment:view'] = 'Bekijk opdracht';
$string['availabledate'] = 'Inleveren kan vanaf';
$string['cannotdeletefiles'] = 'Er is een fout opgetreden en de bestanden konden niet verwijderd worden';
$string['cannotviewassignment'] = 'Je kunt deze opdracht niet bekijken';
$string['changegradewarning'] = 'Deze opdracht heeft beoordeelde inzendingen en het wijzigen van het cijfer zal de bestaande cijfers niet herberekenen. Je moet alle bestaande inzendingen herbeoordelen als je het cijfer wil wijzigen.';
$string['closedassignment'] = 'Deze opdracht is gesloten. De instuurdatum is voorbij.';
$string['comment'] = 'Commentaar';
$string['commentinline'] = 'Commentaar invoegen';
$string['commentinline_help'] = '<p>Als deze optie gekozen is, dan zal de originele inzending naar het feedbackveld gekopieerd worden, zodat het gemakkelijker is om commentaar in de tekst te geven (bijvoorbeeld door een andere kleur te gebruiken) of om de originele tekst te bewerken.</p>';
$string['configitemstocount'] = 'Wat er moet geteld worden wanneer leerlingen hun online opdracht ingestuurd hebben.';
$string['configmaxbytes'] = 'Standaard maximale grootte voor alle opdrachten op de site (afhankelijk van de limiet van de cursus en van andere lokale instellingen)';
$string['configshowrecentsubmissions'] = 'Iedereen kan in rapporteringen over "Recente activiteit" zien dat er opdrachten zijn ingestuurd.';
$string['confirmdeletefile'] = 'Ben je er zeker van dat je dit bestand wil verwijderen?<br/><strong>{$a}</strong>';
$string['coursemisconf'] = 'De instellingen van de cursus zijn fout';
$string['currentgrade'] = 'Huidig cijfer in puntenboek';
$string['deleteallsubmissions'] = 'Alle inzendingen verwijderen';
$string['deletefilefailed'] = 'Bestand verwijderen mislukt';
$string['description'] = 'Beschrijving';
$string['downloadall'] = 'Download alle opdrachten als zip';
$string['draft'] = 'Kladwerk';
$string['due'] = 'Opdracht insturen op';
$string['duedate'] = 'Uiterste inleverdatum';
$string['duedateno'] = 'Geen uiterste inleverdatum';
$string['early'] = '{$a} vroeg';
$string['editmysubmission'] = 'Bewerk mijn inzending';
$string['editthesefiles'] = 'Bewerk deze bestanden';
$string['editthisfile'] = 'Update dit bestand';
$string['emailstudents'] = 'E-mail een verwittiging naar alle leerlingen';
$string['emailteachermail'] = '{$a->username} heeft de inzending voor opdracht {$a->assignment} aangepast om {$a->timeupdated}.

Je kunt ze hier vinden:

{$a->url}';
$string['emailteachermailhtml'] = '<p>{$a->username} heeft de inzending voor opdracht <i>{$a->assignment}</i> aangepast om {$a->timeupdated}.</p><p>
Je kunt ze <a href="{$a->url}"> nakijken op de website</a>.</p>';
$string['emailteachers'] = 'Stuur een e-mail als waarschuwing naar de leraren';
$string['emailteachers_help'] = 'Als deze optie ingeschakeld is, dan krijgen leraren een korte e-mail als waarschuwing dat een leerling een opdracht heeft ingestuurd of geüpdated.

Enkel leraren die cijfers kunnen geven van die inzendingen worden verwittigd. Als de cursus bijvoorbeeld in verschillende groepen is ingedeeld, dan zullen leraren die bij een bepaalde groep horen geen meldingen krijgen over opdrachten van leerlingen van andere groepen.';
$string['emptysubmission'] = 'Je hebt nog niets ingestuurd';
$string['enablenotification'] = 'Stuur notificatie e-mails';
$string['enablenotification_help'] = 'Als je dit inschakeld, dan zullen leerlingen via e-mail bericht krijgen over hun cijfers en feedback.';
$string['errornosubmissions'] = 'Er zijn geen inzendingen om te downloaden';
$string['existingfiledeleted'] = 'Het vorige bestand is verwijderd: {$a}';
$string['failedupdatefeedback'] = 'Het updaten van de feedback op de ingestuurde opdracht van gebruiker {$a} is niet gelukt';
$string['feedback'] = 'Feedback';
$string['feedbackfromteacher'] = 'Feedback van {$a}';
$string['feedbackupdated'] = 'De feedback op ingestuurde opdrachten is voor {$a} mensen bijgewerkt';
$string['finalize'] = 'Geen inzendingen meer toestaan';
$string['finalizeerror'] = 'Er is een fout opgetreden en die inzending kon niet afgerond worden';
$string['futureaassignment'] = 'De opdracht is nog niet beschikbaar.';
$string['graded'] = 'Beoordeeld';
$string['guestnosubmit'] = 'Sorry, maar gasten mogen geen opdracht insturen. Je moet je aanmelden, eventueel nog registreren voor je je antwoord kunt insturen';
$string['guestnoupload'] = 'Sorry, gasten mogen geen bestanden uploaden';
$string['helpoffline'] = '<p>Dit is nuttig wanneer de opdracht buiten Moodle gebeurt. Dat kan ergens anders op het web zijn of face-to-face.</p><p>Leerlingen kunnen een beschrijving van de opdracht zien, maar kunnen geen bestanden uploaden. Je kunt gewoon cijfers geven en leerlingen kunnen die dan inkijken.</p>';
$string['helponline'] = '<p>Dit type opdracht vraagt gebruikers een tekst te bewerken. Leraren kunnen die dan online beoordelen en zelfs verbeteren en wijzigingen aanbrengen in de tekst.</p>
<p>(Als je vertrouwd bent met oudere versies van Moodle, dan lijkt dit type opdracht erg op de vroegere logboekmodule.)</p>';
$string['helpupload'] = '<p>Dit type opdracht laat elke leerling toe om één of meerdere bestanden te uploaden, van gelijk welk bestandstype.</p>
<p>Dit kan een bestand zijn van een tekstverwerker, een afbeelding, een website in een zip-bestand of gelijk welk type dat je je leerlingen vraagt te maken.</p>
<p>Dit type opdracht maakt het ook voor jou mogelijk om één of meerdere antwoordbestanden van gelijk welk type te uploaden. Deze bestanden kunnen ook op voorhand geüpload worden zodat ze gebruikt kunnen worden om elke leerling een ander bestand te geven om mee te werken.</p>
<p>De deelnemers kunnen ook notities maken waarin ze hun ingezonden bestanden beschrijven, de status van hun werk of gelijk welke andere tekstuele informatie.</p>
<p>Het insturen van dit type opdraht moet door de deelnemer manueel gebeuren. Je kunt de huidige status altijd nakijken, opdrachten die niet klaar zijn, staan als kladwerk gemarkeerd. Je kunt een onbeoordeelde opdracht altijd terug naar de kladwerkstatus zetten.</p>';
$string['helpuploadsingle'] = '<p>Dit type opdracht laat elke deelnemer toe om één bestand te uploaden, van gelijk welk bestandstype.</p><p>Dit kan een bestand zijn van een tekstverwerker, een afbeelding, een website in een zip-bestand of gelijk welk type dat je je leerlingen vraagt te maken</p>';
$string['hideintro'] = 'Verberg beschrijving voor de startdatum';
$string['hideintro_help'] = 'Indien ingeschakeld is de beschrijving verborgen voor de openingsdatum. Enkel de naam van de opdracht wordt dan getoond.';
$string['invalidassignment'] = 'Ongeldige opdracht';
$string['invalidfileandsubmissionid'] = 'Ontbrekend bestand of instuurID';
$string['invalidid'] = 'Opdracht ID was fout';
$string['invalidsubmissionid'] = 'InstuurID ongeldig';
$string['invalidtype'] = 'Fout opdrachttype';
$string['invaliduserid'] = 'Ongeldig gebruiker ID';
$string['itemstocount'] = 'Aantal';
$string['lastgrade'] = 'Laatste cijfer';
$string['late'] = '{$a} laat';
$string['maximumgrade'] = 'Maximumcijfer';
$string['maximumsize'] = 'Maximale grootte';
$string['maxpublishstate'] = 'Maximale zichtbaarheid voor een blog-item voor de indiendatum';
$string['messageprovider:assignment_updates'] = 'Opdracht (2.2) meldingen';
$string['modulename'] = 'Opdracht (2.2)';
$string['modulename_help'] = 'Met opdrachten kunnen leraren een taak opgeven die online of offline gemaakt kan worden en dan beoordeeld kan worden.';
$string['modulenameplural'] = 'Opdrachten (2.2)';
$string['newsubmissions'] = 'Ingestuurde opdrachten';
$string['noassignments'] = 'Er zijn nog geen opdrachten';
$string['noattempts'] = 'Er heeft nog niemand zijn opdracht ingestuurd';
$string['noblogs'] = 'Je hebt nog geen blogberichten om in te sturen!';
$string['nofiles'] = 'Er werden geen bestanden ingestuurd';
$string['nofilesyet'] = 'Er werden nog geen bestanden ingestuurd';
$string['nomoresubmissions'] = 'Inzenden is niet meer toegelaten.';
$string['norequiregrading'] = 'Er zijn geen opdrachten die beoordeeld moeten worden';
$string['nosubmisson'] = 'Er zijn nog geen opdrachten ingestuurd';
$string['notavailableyet'] = 'Sorry, maar deze opdracht is nog niet beschikbaar.<br />De instructies voor de opdracht zullen getoond worden vanaf onderstaande datum.';
$string['notes'] = 'Notities';
$string['notesempty'] = 'Nog leeg';
$string['notesupdateerror'] = 'Fout tijdens het updaten van de notities';
$string['notgradedyet'] = 'Nog niet beoordeeld';
$string['notsubmittedyet'] = 'Nog niet ingestuurd';
$string['onceassignmentsent'] = 'Wanneer de opdracht ingestuurd is, kun je niet langer bestanden toevoegen of verwijderen. Wil je verder gaan?';
$string['operation'] = 'Bewerking';
$string['optionalsettings'] = 'Optionele instellingen';
$string['overwritewarning'] = 'Waarschuwing: als je opnieuw een opdracht instuurt OVERSCHRIJFT deze de huidige ingestuurde opdracht';
$string['page-mod-assignment-submissions'] = 'Opdrachtmodule instuurpagina';
$string['page-mod-assignment-view'] = 'Opdrachtmodule hoofdpagina';
$string['page-mod-assignment-x'] = 'Elke opdracht module pagina';
$string['pagesize'] = 'Aantal te tonen inzendingen per pagina';
$string['pluginadministration'] = 'Opdrachtenbeheer';
$string['pluginname'] = 'Opdracht (2.2)';
$string['popupinnewwindow'] = 'Open in een pop-upvenster';
$string['preventlate'] = 'Blokkeer te laat insturen';
$string['quickgrade'] = 'Snel verbeteren';
$string['quickgrade_help'] = 'Indien ingeschakeld,  kun je de opdrachten van meerdere leerlingen verbeteren op één pagina. Geef cijfers en commentaar en gebruik de bewaar-knop onderaan om alle wijzigingen voor die pagina tegelijk te bewaren.';
$string['requiregrading'] = 'Moet beoordeeld worden';
$string['responsefiles'] = 'Ingestuurde bestanden';
$string['reviewed'] = 'Nagekeken';
$string['saveallfeedback'] = 'Bewaar al mijn feedback';
$string['selectblog'] = 'Kies welk blogbericht je wil insturen';
$string['sendformarking'] = 'Insturen';
$string['showrecentsubmissions'] = 'Toon recente inzendingen';
$string['submission'] = 'Ingestuurde opdracht';
$string['submissiondraft'] = 'Ingestuurd kladwerk';
$string['submissionfeedback'] = 'Feedback op de ingestuurde opdracht';
$string['submissions'] = 'Ingestuurde opdrachten';
$string['submissionsaved'] = 'Je wijzigingen zijn bewaard';
$string['submissionsnotgraded'] = '{$a} inzendingen nog niet beoordeeld';
$string['submitassignment'] = 'Stuur je opdracht in door dit formulier in te vullen';
$string['submitedformarking'] = 'De opdracht is al ingestuurd om te beoordelen en kan niet geüpdatet worden';
$string['submitformarking'] = 'Opdracht helemaal klaar? Klik op insturen.';
$string['submitted'] = 'Ingestuurd';
$string['submittedfiles'] = 'Ingestuurde bestanden';
$string['subplugintype_assignment'] = 'Soort opdracht';
$string['subplugintype_assignment_plural'] = 'Opdrachttypes';
$string['trackdrafts'] = 'Knop "Insturen om de beoordelen" inschakelen';
$string['trackdrafts_help'] = 'De "Stuur in voor beoordeling"-knop laat gebruikers toe om aan de leraar aan te geven dat een opdracht klaar is en beoordeeld kan worden. De leraar kan er voor kiezen de taak terug als kladwerk te markeren als er bijvoorbeeld nog meer werk aan is.';
$string['typeblog'] = 'Blogbericht';
$string['typeoffline'] = 'Offline activiteit';
$string['typeonline'] = 'Online activiteit';
$string['typeupload'] = 'Geavanceerd uploaden van bestanden';
$string['typeuploadsingle'] = 'Upload een bestand';
$string['unfinalize'] = 'Terugzetten naar kladwerk';
$string['unfinalizeerror'] = 'Er is een fout opgetreden. Deze inzending kon niet terug omgezet worden naar kladwerk.';
$string['unfinalize_help'] = 'Het terugzetten naar kladwerk geeft een leerling de kans om terug aanpassingen te doen aan zijn opdracht';
$string['unsupportedsubplugin'] = 'Opdrachttype \'{$a}\' wordt nu niet ondersteund. Je kunt wachten tot dit type beschikbaar wordt of de opdracht verwijderen.';
$string['upgradenotification'] = 'Deze opdracht is gebaseerd op een oudere opdrachtmodule';
$string['uploadafile'] = 'Upload een bestand';
$string['uploadbadname'] = 'In deze bestandsnaam staan rare tekens, het bestand kon daardoor niet worden geüpload';
$string['uploadedfiles'] = 'Ingestuurde bestanden';
$string['uploaderror'] = 'Er is een fout geconstateerd tijdens het opslaan van het bestand op de server';
$string['uploadfailnoupdate'] = 'Het bestand werd prima geüpload, maar je bijdrage kon niet worden bijgewerkt!';
$string['uploadfiles'] = 'Upload bestanden';
$string['uploadfiletoobig'] = 'Helaas is dat bestand te groot (de toegestane grootte is {$a} bytes)';
$string['uploadnofilefound'] = 'Er werd geen bestand gevonden - weet je zeker dat je er één geselecteerd had om te uploaden?';
$string['uploadnotregistered'] = '\'{$a}\' werd prima geüpload, maar je bijdrage werd niet verwerkt!';
$string['uploadsuccess'] = '\'{$a}\' met succes geüpload';
$string['usermisconf'] = 'De instellingen van de gebruiker zijn fout';
$string['usernosubmit'] = 'Je mag geen opdracht insturen';
$string['viewassignmentupgradetool'] = 'Bekijk de opdracht upgrade tool';
$string['viewfeedback'] = 'Bekijk de cijfers en feedback voor de opdrachten';
$string['viewmysubmission'] = 'Mijn inzending bekijken';
$string['viewsubmissions'] = 'Bekijk {$a} ingestuurde opdrachten';
$string['yoursubmission'] = 'Jouw ingestuurde opdracht';
