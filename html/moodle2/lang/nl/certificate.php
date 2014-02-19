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
 * Strings for component 'certificate', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   certificate
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addlinklabel'] = 'Voeg een andere gelinkte optie toe';
$string['addlinktitle'] = 'Klik om een andere gelinkte activiteit toe te voegen.';
$string['areaintro'] = 'Certificaat introductie';
$string['awarded'] = 'Toegekend';
$string['awardedto'] = 'Toegekend aan';
$string['back'] = 'Terug';
$string['border'] = 'Rand';
$string['borderblack'] = 'Zwart';
$string['borderblue'] = 'Blauw';
$string['borderbrown'] = 'Bruin';
$string['bordercolor'] = 'Randlijnen';
$string['bordercolor_help'] = 'Omdat afbeeldingen de grootte van het pdf-bestand substantieel kunnen vergroten kun je ervoor kiezen om een een rand of lijnen af te drukken ipv een achtergrondafbeelding (zorg er voor dat de randafbeelding op nee is gezet). De randlijnen-optie zal een rand afdrukken van 3 lijnen van variable breedte in de gekozen kleur';
$string['bordergreen'] = 'Groen';
$string['borderlines'] = 'Lijnen';
$string['borderstyle'] = 'Randafbeelding';
$string['borderstyle_help'] = 'De randafbeelding-optie geeft je de mogelijkheid om een afbeelding te gebruiken uit de certificate/pix/border map. Selecteer de afbeelding die je wilt gebruiken rond het certificaat of selecteer geen  (geen afbeelding")';
$string['certificate'] = 'Verifieer de certificaatcode:';
$string['certificate:manage'] = 'Beheer certificaatmodule';
$string['certificatename'] = 'Certificaatnaam';
$string['certificate:printteacher'] = 'Je wordt als leraar getoond op het certificaat als de Druk leraar-instelling aan is.';
$string['certificatereport'] = 'Certificaatrapport';
$string['certificatesfor'] = 'Certificaten voor';
$string['certificate:student'] = 'Haal je certificaat op';
$string['certificatetype'] = 'Certificaattype';
$string['certificatetype_help'] = 'Hier bepaal je de lay-out van het certificaat. De certificaat type folder bevat 4 standaard certificaten:
A4 Embedded drukt op A4 grootte papier met embedded fonts
A4 Non-Embedded druk op A4 zonder embedded fonts
Letter Embedded drukt op Letter grootte papier met embedded fonts
Letter Non-Embedded druk op Letter zonder embedded fonts

De non-embedded fonts gebruiken de Helvetica en Times fonts. Als je gebruikers deze fonts niet op hun computer hebben of in jouw taal karakters of symbolen gebruikt worden die niet door Helvetica en Times ondersteund worden kies Embedded certificaat types. Het embedded certificaat type gebruikt de Dejavusans and Dejavuserif fonts. Dit zal het PDF-bestand vrij groot maken, het is daarom niet aanbevolen om Embedded te gebruiken tenzij je dit nodig hebt.

Nieuwe certificaattype mappen kunnen worden toegevoegd aan de certificaat/type map. De naam van de map en elke nieuwe taalstring voor het nieuwe type moet worden toegevoegd aan het certificaat taalbestand.';
$string['certificate:view'] = 'Toon een certificaat';
$string['certify'] = 'Dit certificaat toont aan dat';
$string['code'] = 'Code';
$string['completiondate'] = 'Cursusvoltooiing';
$string['course'] = 'Voor';
$string['coursegrade'] = 'Cursusbeoordeling';
$string['coursename'] = 'Cursus';
$string['credithours'] = 'Credieturen';
$string['customtext'] = 'Eigen tekst';
$string['customtext_help'] = 'Hier voer je je eigen tekst in, bijvoorbeeld als je niet de aangewezen leraren wilt afdrukken maar andere namen.

Standaard wordt deze tekst links onderaan het certificaat geprint. De volgende html-tags zijn beschikbaar: <br>, <p>, <b>, <i>, <u>, <img> (src and width (of height) zijn verplicht), <a> (href is mandatory), <font> (mogelijke attributen zijn: color, (hex color code), face, (arial, times, courier, helvetica, symbol)).';
$string['date'] = 'Op';
$string['datefmt'] = 'Datumopmaak';
$string['datefmt_help'] = 'Kies een datumopmaak om de datum af te drukken op het certificaat. Of kies de laatste optie om de datum af te drukken in de opmaak van de taal van de gebruiker.';
$string['datehelp'] = 'Datum';
$string['deletissuedcertificates'] = 'Verwijder uitgegeven certificaten';
$string['delivery'] = 'Uitgifte';
$string['delivery_help'] = 'Kies hoe je wilt dat de studenten hun certificaat uitgereikt krijgen.
E-mail (Kies ook Opslaan!) : stuurt het certificaat naar de leerlign met een e-mail
Forceer download : Opent het bestandsdownloadmenu van de browser
Open in nieuw venster : Opent het certificaat in een nieuw browservenster.

Met de link van het certificaat op de startpagina van de cursus, kunnen de leerlingen verschillende gegevens van het certificaat bekijken : de datum van uitgifte en het certificaat zelf.';
$string['designoptions'] = 'Ontwerpopties';
$string['download'] = 'Forceer download';
$string['emailcertificate'] = 'E-mail (Kies ook Opslaan!)';
$string['emailothers'] = 'E-mail anderen';
$string['emailothers_help'] = 'Geef hier de e-mailadressen in, gescheiden door komma\'s,  van diegenen die een melding via e-mail moeten krijgen wanneer leerlingen een certificaat krijgen.';
$string['emailstudenttext'] = 'Bijgevoegd is uw certificaat voor {$a->course}.';
$string['emailteachermail'] = '{$a->student} heeft zijn of haar certificaat: \'{$a->certificate}\'
voor {$a->course} ontvangen.

Je kunt het met deze link bekijken:

    {$a->url}';
$string['emailteachermailhtml'] = '{$a->student} heeft zijn of haar certificaat: \'<i>{$a->certificate}</i>\'
voor {$a->course} ontvangen.

Je kunt het certificaat bekijken met deze link:

    <a href="{$a->url}">Certificaatrapport</a>.';
$string['emailteachers'] = 'E-mail Leraren';
$string['emailteachers_help'] = 'Indien ingeschakkeld zullen leraren een e-mailnotificatie krijgen wanneer leerlingen een certificaat ontvangen.';
$string['entercode'] = 'Voer code in om certificaat te verifiëren:';
$string['getcertificate'] = 'Haal je certificaat op';
$string['grade'] = 'Beoordeling';
$string['gradedate'] = 'Beoordelingsdatum';
$string['gradefmt'] = 'Beoordelingsformaat';
$string['gradefmt_help'] = 'Er zijn drie beschikbare beoordelingsformaten om op een certificaat weer te geven:

Percentage: toont de beoordeling als een percentage
Punten: toont de puntenwaarde van de beoordeling
Letter: toont de beoordeling als letterwaarde';
$string['gradeletter'] = 'Letter';
$string['gradepercent'] = 'Percentage';
$string['gradepoints'] = 'Punten';
$string['incompletemessage'] = 'Om je certificaat te kunnen downloaden moet je eerst voldoen aan alle vereiste modules. Ga terug naar de cursus om deze te voltooien.';
$string['intro'] = 'Inleiding';
$string['issued'] = 'Uitgegeven';
$string['issueddate'] = 'Datum uitgegeven';
$string['issueoptions'] = 'Uitgifte opties';
$string['landscape'] = 'Horizontaal';
$string['lastviewed'] = 'Je hebt dit certificaat ontvangen op:';
$string['letter'] = 'Letter';
$string['lockingoptions'] = 'Blokkeeropties';
$string['modulename'] = 'Certificaat';
$string['modulenameplural'] = 'Certificaten';
$string['mycertificates'] = 'Mijn certificaten';
$string['nocertificates'] = 'Er zijn geen certificaten';
$string['nocertificatesissued'] = 'Er zijn geen certificaten uitgegeven';
$string['nocertificatesreceived'] = 'heeft uit geen enkele cursus een certificaat ontvangen.';
$string['nogrades'] = 'Geen beoordelingen beschikbaar';
$string['notapplicable'] = 'N/A';
$string['notfound'] = 'De certificaatcode kan niet worden geverifieerd.';
$string['notissued'] = 'Niet uitgegeven';
$string['notissuedyet'] = 'Nog niet uitgegeven';
$string['notreceived'] = 'Je hebt dit certificaat niet ontvangen.';
$string['openbrowser'] = 'Open in een nieuw venster';
$string['opendownload'] = 'Klik op de knop hieronder om het certificaat op te slaan op uw computer.';
$string['openemail'] = 'Klik op de knop hieronder en uw certificaat wordt als een e-mail attachment toegezonden.';
$string['openwindow'] = 'Klik op de knop hieronder en uw certificaat opent in een nieuw browservenster.';
$string['or'] = 'Of';
$string['orientation'] = 'Oriëntatie';
$string['orientation_help'] = 'Kies hier voor een horizontaal of verticaal certificaat';
$string['pluginadministration'] = 'Certificaatbeheer';
$string['pluginname'] = 'Certificaat';
$string['portrait'] = 'Verticaal';
$string['printdate'] = 'Afdrukdatum';
$string['printdate_help'] = 'Dit is de datum die wordt afgedrukt, als een datum is geselecteerd. Als de cursusvoltooiingsdatum is geselcteerd maar de leerling heeft de cursus niet voltooid, dan zal de uitgiftedatum worden afgedrukt. Je kunt ervoor kiezen om de voltooiingsdatum van een bepaalde activiteit af te drukken. Als een certificaat wordt uitgegeven voor deze datum, dan wordt alsnog de datum van ontvangst afgedrukt.';
$string['printerfriendly'] = 'Afdrukvriendelijke pagina';
$string['printgrade'] = 'Druk beoordeling af';
$string['printgrade_help'] = 'Je kunt elk beoordelingsitem uit de cursus kiezen om te laten afdrukken als beoordeling van de leerling. De beoordelingsitems worden getoond in de volgorde zoals ze verschijnen in de cijferlijst. Kies de opmaak van afdrukken hieronder.';
$string['printhours'] = 'Druk kredieturen af';
$string['printhours_help'] = 'Vul hier het aantal kredieturen in dat op het certificaat wordt afgedrukt.';
$string['printnumber'] = 'Druk code af';
$string['printnumber_help'] = 'Een unieke 10-digit code van willekeurige cijfers en letters kan op het certificaat worden afgedrukt. Dit nummer kan later weer worden geverifieerd door het te vergelijken met het getoonde codenummer in het certificatenoverzicht.';
$string['printoutcome'] = 'Druk competenties af';
$string['printoutcome_help'] = 'Je kunt elke cursuscompetentie kiezen als naam en niveau van deze competentie van de cursist die afgedrukt wordt op het certificaat.';
$string['printseal'] = 'Afbeelding, zegel of logo';
$string['printseal_help'] = 'Met deze optie kun je een zegel of een logo kiezen om af te drukken op het certificaat.

Deze logo\'s vindt je in de map : certificate/pix/seals . Standaard wordt deze afbeelding in de rechteronderhoek van het certificaat geplaatst.';
$string['printsignature'] = 'Afbeelding handtekening';
$string['printsignature_help'] = 'Met deze optie kun je de afbeelding van een handtekening uit de certificate/pix/signatures-map afdrukken. Je kunt een grafische voorstelling van een handtekening afdrukken of een lijn plaatsen voor een geschreven handtekening. Standaard wordt deze afbeelding links onderaan het certificaat geplaatst.';
$string['printteacher'] = 'Druk naam leraren af.';
$string['printteacher_help'] = 'Zet de rol van leraar op het module niveau om de naam van de leraar af te drukken op het certificaat. Doe dit , bijvoorbeeld als je meer dan één leraar hebt voor de cursus of je hebt meer dan één certificaat in de cursus en je wilt verschillende leraarsnamen op elk certificaat afdrukken.

Klik om het certificaat te bewerken, klik dan op de lokaal toegewezen rollen tab. Wijs dan de rol van leraar toe. Deze leraar hoeft geen leraar te zijn in de cursus. Deze namen wordenop het certificaat als leraar afgedrukt.';
$string['printwmark'] = 'Afbeelding watermerk';
$string['printwmark_help'] = 'Een watermerkbestand kan als achtergrond van het certificaat  worden geplaatst. Een watermerk is een vergrijsde afbeelding. Dit kan een logo, een zegel, een schild, een tekst of iets anders zijn.';
$string['receivedcerts'] = 'Ontvangen certificaten.';
$string['receiveddate'] = 'Datum ontvangen';
$string['reissuecert'] = 'Geef certificaat opnieuw uit.';
$string['reissuecert_help'] = 'Als je hier ka kiest, dan wordt het certificaat opnieuw uitgegeven met een nieuwe datum, cijfer en code nummer, iedere keer als de gebruiker op de certificaat link klikt. Alhoewel in een tabel de in eerder  uitgeven data zijn opgenomen, is er geen review knop voor gebruikers. Alleen het laatst uitgegeven certificaat wordt getoond in het certificaat rapport.';
$string['removecert'] = 'Uitgegeven certificaten verwijderd.';
$string['report'] = 'Overzicht';
$string['reportcert'] = 'Overzicht certificaten';
$string['reportcert_help'] = 'Als je hier ja kiest zullen de ontvangsdatum, code en de cursusnaam verschijnen op de gebruikersoverzichten. Als je er ook voor kiest om een beoordeling af te drukken, dan zal de beoordeling ook te zien zijn op het certificaatoverzicht.';
$string['reviewcertificate'] = 'Bekijk je certificaat';
$string['savecert'] = 'Bewaar certificaten';
$string['savecert_help'] = 'Als je deze optie kiest wordt een kopie van het certificaat van elke gebruikers certificaat als pdf-bestand opgeslagen in de cursusbestanden moddata-map voor dat certificaat. Een link voor elk opgeslagen certificaat zal worden getoond in het certificaat overzicht.';
$string['sigline'] = 'lijn';
$string['statement'] = 'de onderstaande cursus heeft voltooid:';
$string['summaryofattempts'] = 'Overzicht van eerder ontvangen certificaten.';
$string['textoptions'] = 'Tekstopties.';
$string['title'] = 'Certificaat';
$string['to'] = 'Toegekend aan';
$string['typeA4_embedded'] = 'A4 Embedded';
$string['typeA4_non_embedded'] = 'A4 Non-Embedded';
$string['typeletter_embedded'] = 'Letter Embedded';
$string['typeletter_non_embedded'] = 'Letter Non-Embedded';
$string['userdateformat'] = 'Datumopmaak voor de taal van de gebruiker';
$string['validate'] = 'Verifiëren';
$string['verifycertificate'] = 'Verifiëer Certificaat';
$string['viewcertificateviews'] = 'Bekijk {$a} uitgegven certificaten.';
$string['viewed'] = 'Je ontving dit certificaat op:';
$string['viewtranscript'] = 'Bekijk certificaten.';
