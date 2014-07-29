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
 * Strings for component 'question', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   question
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Actie';
$string['addanotherhint'] = 'Voeg nog een hint toe';
$string['addcategory'] = 'Voeg categorie toe';
$string['addmorechoiceblanks'] = 'Lege lijnen voor {no} meer keuzes';
$string['adminreport'] = 'Rapport over mogelijke problemen in je vragendatabank';
$string['answer'] = 'Antwoord';
$string['answers'] = 'Antwoorden';
$string['answersaved'] = 'Antwoord bewaard';
$string['attemptfinished'] = 'Poging beëindigd';
$string['attemptfinishedsubmitting'] = 'Poging beëindigd en ingestuurd:';
$string['attemptoptions'] = 'Pogingopties';
$string['availableq'] = 'Beschikbaar?';
$string['badbase'] = 'Slechte basis voor  **: {$a}**';
$string['behaviour'] = 'Gedrag';
$string['behaviourbeingused'] = 'Gebruikt gedrag: {$a}';
$string['broken'] = 'Dit is een "gebroken link" - verwijst naar een niet-bestaand bestand.';
$string['byandon'] = 'door <em>{$a->user}</em> op <em>{$a->time}</em>';
$string['cannotcopybackup'] = 'Kon back-uupbestand niet kopieëren';
$string['cannotcreate'] = 'Kon geen nieuw item maken in de question_attemptstabel';
$string['cannotcreatepath'] = 'Kon pad niet maken: {$a}';
$string['cannotdeletebehaviourinuse'] = 'Je kunt vraaggedrag \'{$a}\'niet verwijderen; Het wordt al gebruikt in pogingen van leerlingen.';
$string['cannotdeletecate'] = 'Je kunt die categorie niet verwijderen. Het is de standaardcategorie voor deze context.';
$string['cannotdeleteneededbehaviour'] = 'Kan vraaggedrag \'{$a}\' niet verwijderen. Er zijn andere instellingen die er op steunen.';
$string['cannotdeleteqtypeinuse'] = 'Je kunt vraagtype \'{$a}\' niet verwijderen. Er zijn vragen van dit type in de vragenpool.';
$string['cannotdeleteqtypeneeded'] = 'Je kunt vraagtype \'{$a}\' niet verwijderen. Er zijn andere vraagtypes geïnstalleerd die dit type nodig hebben.';
$string['cannotenable'] = 'Vraagtype {$a} kan niet rechtstreeks gemaakt worden.';
$string['cannotenablebehaviour'] = 'Vraaggedrag {$a} kan niet rechtstreeks gebruikt worden. Het is enkel bedoeld voor intern gebruik.';
$string['cannotfindcate'] = 'Kon categorierecord niet vinden';
$string['cannotfindquestionfile'] = 'kon vraaggegevensbestand niet vinden in zip';
$string['cannotgetdsfordependent'] = 'Kan de dataset niet vinden voor een vraag die afhankelijk is van een dataset! (vraag: {$a->id}, datasetitem: {a->item})';
$string['cannotgetdsforquestion'] = 'kan de dataset niet vinden voor een berekende vraag! (vraag: {$a})';
$string['cannothidequestion'] = 'Kon vraag niet verbergen';
$string['cannotimportformat'] = 'Het importeren van deze format is nog niet geïmplementeerd.';
$string['cannotinsertquestion'] = 'Kon geen nieuwe vraag invoegen!';
$string['cannotinsertquestioncatecontext'] = 'Kon de nieuwe vraagcategorie niet invoegen {$a->cat} ongeldige context ID {$a->ctx}';
$string['cannotloadquestion'] = 'Kon vraag niet laden';
$string['cannotmovequestion'] = 'Je kan dit script niet gebruiken om vragen te verplaatsen waaraan bestanden geassocieerd zijn vanuit andere plaatsen';
$string['cannotopenforwriting'] = 'Kan niet openen om te schrijven:  {$a}';
$string['cannotpreview'] = 'Je kunt geen voorbeeld van deze vragen zien';
$string['cannotread'] = 'Kan importbestand niet lezen (of bestand is leeg)';
$string['cannotretrieveqcat'] = 'Kon vraagcategorie niet ophalen';
$string['cannotunhidequestion'] = 'Terug zichtbaar maken van deze vraag mislukt';
$string['cannotunzip'] = 'Kon bestand niet unzippen';
$string['cannotwriteto'] = 'Kan geëxporteerde bestanden niet schrijven naar {$a}';
$string['category'] = 'Categorie';
$string['categorycurrent'] = 'Huidige categorie';
$string['categorycurrentuse'] = 'Gebruik deze categorie';
$string['categorydoesnotexist'] = 'Deze categorie bestaat niet';
$string['categoryinfo'] = 'Categorie info';
$string['categorymove'] = 'De categorie \'{$a->name}\' bevat {$a->count} vragen. Kies alsjeblieft een categorie om deze vragen naar te verplaatsen';
$string['categorymoveto'] = 'Bewaar in categorie';
$string['categorynamecantbeblank'] = 'De categorienaam kan niet leeg zijn';
$string['changeoptions'] = 'Wijzig opties';
$string['changepublishstatuscat'] = 'De instelling voor het delen van <a href="{$a->caturl}">categorie "{$a->name}"</a> in cursus "{$a->coursename}" zal gewijzigd worden van <strong>{$a->changefrom} naar {$a->changeto}</strong>.';
$string['check'] = 'Controleer';
$string['chooseqtypetoadd'] = 'Kies een vraagtype om toe te voegen';
$string['clearwrongparts'] = 'Verwijder de foute antwoorden';
$string['clickflag'] = 'Markeer vraag';
$string['clicktoflag'] = 'Markeer deze vraag om ze later gemakkelijk terug te vinden';
$string['clicktounflag'] = 'Verwijder vlag';
$string['clickunflag'] = 'Verwijder vlag';
$string['closepreview'] = 'Sluit voorbeeld';
$string['combinedfeedback'] = 'Gecombineerde feedback';
$string['comment'] = 'Opmerking';
$string['commented'] = 'Opmerking gegeven: {$a}';
$string['commentormark'] = 'Maak opmerking of overschrijf cijfer';
$string['comments'] = 'Opmerkingen';
$string['commentx'] = 'Opmerking: {$a}';
$string['complete'] = 'Volledig';
$string['contexterror'] = 'Je zou alleen op deze pagina moeten zijn als je een categorie verplaatst naar een andere context';
$string['copy'] = 'Kopiëer van {$a} en wijzig de links.';
$string['correct'] = 'Juist';
$string['correctfeedback'] = 'Voor elk juist antwoord';
$string['correctfeedbackdefault'] = 'Je antwoord is juist.';
$string['created'] = 'Aangemaakt';
$string['createdby'] = 'Gemaakt door';
$string['createdmodifiedheader'] = 'Aangemaakt / gewijzigd';
$string['createnewquestion'] = 'Maak een nieuwe vraag...';
$string['cwrqpfs'] = 'Willekeurige vragen kiezen vragen uit subcategorieën';
$string['cwrqpfsinfo'] = '<p>Gedurende de upgrade naar Moodle 1.9 zullen we vragencategorieën opsplitsen in verschillende contexten. Van sommige vragencategorieën en vragen op je site zal de status van het delen gewijzigd worden. Dit is nodig in het zeldzame geval dat één of meer \'willekeurige vragen\' van een test ingesteld zijn om uit een mix van gedeelde en niet gedeelde categorieën vragen te kiezen (zoals het geval is op deze site). Dit gebeurt wanneer een \'willekeurige vraag\' is ingesteld om te kiezen uit subcategorieën en bij één of meer subcategorieën is het delen anders ingesteld dan de bovenliggende categorie waarin de willekeurige vraag is gecreëerd.</p>
<p>Van de volgende vragencategorieën, waaruit \'willekeurige vragen\' in bovenliggende categorieën vragen selecteren, zal het delen gewijzigd worden naar de zelfde status als de categorie waarin de \'willekeurige vraag\' zich bevindt tijdens de upgrade naar Moodle 1.9. De betreffende vragen zullen blijven werken in alle bestaande testen tot ze uit deze testen verwijderd worden.</p>';
$string['cwrqpfsnoprob'] = 'Er zijn geen vragencategorieën in jouw site die het probleem met \'willekeurige vragen\' kiezen uit subcategorieën vertonen.';
$string['decimalplacesingrades'] = 'Aantal decimalen in cijfers';
$string['defaultfor'] = 'Standaard voor {$a}';
$string['defaultinfofor'] = 'De standaardcategorie voor gedeelde vragen in context \'{$a}\'';
$string['defaultmark'] = 'Standaard cijfer';
$string['defaultmarkmustbepositive'] = 'Het standaardcijfer moet positief zijn.';
$string['deletecoursecategorywithquestions'] = 'Er zijn vragen in de vragenbank geassocieerd met deze cursuscategorie. Als je verdergaat zullen die verwijderd worden. Misschien wil je ze eerst verplaatsen. Gebruik hiervoor de vragenbankinterface.';
$string['deletequestioncheck'] = 'Weet je zeker dat je \'{$a}\' wil verwijderen?';
$string['deletequestionscheck'] = '<p>Weet je zeker dat je volgende vragen wil verwijderen?</p><p> {$a}<p>';
$string['deletingbehaviour'] = 'Vraaggedrag \'{$a}\' verwijderen';
$string['deletingqtype'] = 'Vraagtype \'{$a}\' aan het verwijderen';
$string['didnotmatchanyanswer'] = '[Komt met geen enkel antwoord overeen]';
$string['disabled'] = 'Uitgeschakeld';
$string['displayoptions'] = 'Toonopties';
$string['disterror'] = 'De {$a} distributie veroorzaakte problemen';
$string['donothing'] = 'Kopieëer of verplaats geen bestanden, wijzig geen links.';
$string['editcategories'] = 'Bewerk categorieën';
$string['editcategories_help'] = 'Eerder dan alle vragen in een grote lijst te bewaren, kunnen vragen geordend worden in categorieën en subcategorieën.

Elke categorie heeft een context die bepaalt waar de vragen in de categorie gebruikt kunnen worden:

* Activiteitscontext - vragen zijn enkel beschikbaar in de activiteitsmodule
* Cursuscontext - vragen zijn beschikbaar in alle activiteitsmodules van de cursus
* Cursuscategoriecontext - vragen zijn beschikbaar in alle activiteitsmodules en cursussen in de cursuscategorie
* Systeemcontext - vragen zijn beschikbaar in alle cursussen en alle activiteitsmodules op de site

Categorieën worden ook gebruikt voor willekeurige vragen, zijnde vragen die automatisch gekozen worden uit een bepaalde categorie.';
$string['editcategory'] = 'Bewerk categorie';
$string['editingcategory'] = 'Categorie bewerken';
$string['editingquestion'] = 'Vraag bewerken';
$string['editquestion'] = 'Bewerk vraag';
$string['editquestions'] = 'Bewerk vragen';
$string['editthiscategory'] = 'Bewerk deze categorie';
$string['emptyxml'] = 'Onbekende fout - leeg imsmanifest.xml';
$string['enabled'] = 'Ingeschakeld';
$string['erroraccessingcontext'] = 'Fout: geen toegang tot context';
$string['errordeletingquestionsfromcategory'] = 'Fout bij het verwijderen van vragen uit categorie {$a}.';
$string['errorduringpost'] = 'Fout tijdens verwerking!';
$string['errorduringpre'] = 'Fout tijdens voorbereiding!';
$string['errorduringproc'] = 'Fout tijdens verwerking!';
$string['errorduringregrade'] = 'Kon vraag {$a->qid} niet herwaarderen, ga naar toestand {$a->stateid}';
$string['errorfilecannotbecopied'] = 'Fout: kan bestand {$a} niet kopieëren.';
$string['errorfilecannotbemoved'] = 'Fout: kan bestand {$a} niet verplaatsen.';
$string['errorfileschanged'] = 'Fout: bestanden gelinkt aan vragen zijn gewijzigd sinds het tonen van dit formulier.';
$string['errormanualgradeoutofrange'] = 'Het cijfer {$a->grade} is niet tussen 0 en  {$a->maxgrade} voor vraag {$a->name}. De score en commentaar zijn niet bewaard.';
$string['errormovingquestions'] = 'Fout tijdens het verplaatsen van vragen met ID {$a}';
$string['errorpostprocess'] = 'Fout opgetreden tijdens naverwerking';
$string['errorpreprocess'] = 'Fout opgetreden tijdens voorbereiding';
$string['errorprocess'] = 'Fout opgetreden tijdens verwerking';
$string['errorprocessingresponses'] = 'Er is een fout opgetreden tijdens het verwerken van je antwoorden ({$a}). Klik op \'Verder\' om terug te keren naar de pagina waar je was en probeer opnieuw.';
$string['errorsavingcomment'] = 'Fout bij het bewaren van de commentaar voor vraag {$a->name} in de databank.';
$string['errorsavingflags'] = 'Fout bij het bewaren van de vlagstatus';
$string['errorupdatingattempt'] = 'Fout bij het updaten van poging {$a->id} in de databank.';
$string['exportcategory'] = 'Exporteer categorie';
$string['exportcategory_help'] = 'Deze instelling bepaalt de categorie van waaruit de geëxporteerde vragen gehaald worden.

Bij sommige importformaten, zoals GIFT en Moodle XML, kun je categorie en contextgegevens opnemen in het exportbestand, waardoor je ze opnieuw kan aanmaken bij import (optioneel). Indien je dat wenst, moet je de nodige selectievakjes aanduiden.';
$string['exporterror'] = 'Fouten opgetreden tijdens exporteren!';
$string['exportfilename'] = 'quiz';
$string['exportnameformat'] = '%Y%m%d-%H%M';
$string['exportquestions'] = 'Exporteer vragen naar bestand';
$string['exportquestions_help'] = 'Met deze functie kun je een volledige categorie met vragen (en subcategorieën)  exporteren naar een bestand. Merk op dat, afhankelijk van het gekozen bestandsformaat, sommige gegevens van je vragen en sommige vraagtypes niet geëxporteerd kunnen worden.';
$string['feedback'] = 'Feedback';
$string['filecantmovefrom'] = 'De vragenbestanden kunnen niet verplaatst worden omdat je het recht niet hebt om bestanden te verwijderen van de plaats waar je dat probeert te doen.';
$string['filecantmoveto'] = 'De vragenbestanden kunnen niet verplaatst of gekopieerd worden omdat je het recht niet hebt om bestanden toe te voegen op de plaats waar je de vragen naartoe wil verplaatsten.';
$string['fileformat'] = 'Bestandsopmaak';
$string['filesareacourse'] = 'de plaats voor cursusbestanden';
$string['filesareasite'] = 'de plaats voor sitebestanden';
$string['filestomove'] = 'Verplaats / kopieëer bestanden naar {$a}?';
$string['fillincorrect'] = 'Vul de juiste antwoorden in';
$string['flagged'] = 'Gemarkeerd';
$string['flagthisquestion'] = 'Markeer deze vraag';
$string['formquestionnotinids'] = 'Formulier bevat vraag die niet bij de vraag ID\'s staat';
$string['fractionsnomax'] = 'Eén van de vragen moet een score van 100% hebben, zodat het mogelijk is om alle punten voor deze vraag te behalen.';
$string['generalfeedback'] = 'Algemene feedback vraag';
$string['generalfeedback_help'] = 'Algemene feedback wordt aan de leerling getoond nadat die geprobeerd heeft een vraag te beantwoorden. Anders dan feedback, die afhangt van het vraagtype en welk antwoord de leerling gegeven heeft, wordt dezelfde algemene feedback tekst getoond aan alle leerlingen.

Je kunt de algemene feedback gebruiken om leerlingen achtergrond te geven bij welke leerstof getest werd of hen een link geven naar meer informatie als ze de vragen niet begrepen hebben.';
$string['getcategoryfromfile'] = 'Haal categorie uit bestand';
$string['getcontextfromfile'] = 'Haal context uit bestand';
$string['hidden'] = 'Verborgen';
$string['hintn'] = 'Hint {no}';
$string['hintnoptions'] = 'Hint {no} opties';
$string['hinttext'] = 'Hint tekst';
$string['howquestionsbehave'] = 'Hoe vragen zich gedragen';
$string['howquestionsbehave_help'] = 'Leerlingen kunnen op verschillende manieren interageren met de vragen. Bijvoorbeeld kun je wensen dat de leerlingen elke vraag beantwoorden en dan de test insturen voor er ook maar iets beoordeeld wordt of feedback gegeven wordt. Dat is dan de  "Uitgestelde feedback" modus.
Je zou ook kunnen willen dat leerlingen bij elke vraag die ze insturen onmiddellijk feedback krijgen, en als ze het niet juist hebben, een tweede kans krijgen voor minder punten. Dat is dan de "Interactief met meerdere pogingen"-modus.';
$string['ignorebroken'] = 'Negeer gebroken links';
$string['importcategory'] = 'Importeer categorie';
$string['importcategory_help'] = 'Deze instelling bepaalt de categorie waarin geïmporteerde vragen terecht komen.

Bij sommige importformaten, zoals GIFT en Moodle XML, kun je categorie en contextgegevens opnemen in het exportbestand. Om gebruik te maken van deze gegevens, eerder dan van een geselecteerde categorie, moet je de nodige selectievakjes aanduiden. Als categorieën in het importbestand niet bestaan, dan zullen die gemaakt worden.';
$string['importerror'] = 'Er is een fout gebeurd tijdens het verwerken van de import';
$string['importerrorquestion'] = 'Fout bij het importeren van de vraag';
$string['importfromcoursefiles'] = '...of kies een cursusbestand om te importeren';
$string['importfromupload'] = 'Kies een bestand om te uploaden...';
$string['importingquestions'] = '{$a} vragen importeren uit bestand';
$string['importparseerror'] = 'Fout(en) gevonden tijdens het verwerken van het importbestand. Er zijn geen vragen geïmporteerd. Om eventuele juiste vragen te importeren, wijzig de instelling \'Stop bij fout\' naar \'Nee\'';
$string['importquestions'] = 'Importeer vragen uit een bestand';
$string['importquestions_help'] = 'Deze functie maakt het mogelijk om verschillende vraagtypes te importeren via een tekstbestand. Merk op dat het bestand UTF-8-encodering moet gebruiken.';
$string['importwrongfiletype'] = 'Het type bestand dat je selecteerde ({$a->actualtype}) komt niet overeen met het type dat verwacht werd met dit importformaat ({$a->expectedtype}).';
$string['impossiblechar'] = 'Onmogelijk teken {$a} gevonden als haakje';
$string['includesubcategories'] = 'Toon ook vragen uit subcategorieën';
$string['incorrect'] = 'Fout';
$string['incorrectfeedback'] = 'Voor elk fout antwoord';
$string['incorrectfeedbackdefault'] = 'Je antwoord is niet juist.';
$string['information'] = 'Informatie';
$string['invalidanswer'] = 'Onvolledig antwoord';
$string['invalidarg'] = 'Geen geldige argumenten gegeven of foute serverconfiguratie';
$string['invalidcategoryidforparent'] = 'Ongeldige categorieID voor bovenliggende!';
$string['invalidcategoryidtomove'] = 'Ongeldig categorie ID om te verplaatsen';
$string['invalidconfirm'] = 'Bevestigingsstring was fout';
$string['invalidcontextinhasanyquestions'] = 'Ongeldige context doorgegeven aan question_context_has_any_questions.';
$string['invalidgrade'] = 'Cijfers komen niet overeen met beoordelingsopties - vraag overgeslagen';
$string['invalidpenalty'] = 'Ingeldige strafpunten';
$string['invalidwizardpage'] = 'Ongeldige of geen pagina opgegeven!';
$string['lastmodifiedby'] = 'Laatst gewijzigd door';
$string['linkedfiledoesntexist'] = 'Het gelinkte bestand {$a} bestaat niet';
$string['makechildof'] = 'Maak ondergeschikt aan \'{$a}\'';
$string['makecopy'] = 'Maak kopie';
$string['maketoplevelitem'] = 'Verplaats naar top';
$string['manualgradeoutofrange'] = 'Dit cijfer is buiten het geldig bereik';
$string['manuallygraded'] = 'Manueel beoordeeld {$a->mark} met opmerking: {$a->comment}';
$string['mark'] = 'Cijfer';
$string['markedoutof'] = 'Punten op';
$string['markedoutofmax'] = 'Punten op {$a}';
$string['markoutofmax'] = '{$a->mark} punten op {$a->max}';
$string['marks'] = 'Cijfers';
$string['matchgrades'] = 'Koppel cijfers';
$string['matchgradeserror'] = 'Fout als cijfer niet getoond';
$string['matchgrades_help'] = 'Geïmporteerde cijfers moeten overeen komen met één uit de vaste lijst met geldige cijfers - 100, 90, 80, 75, 70, 66.666, 60, 50, 40, 33.333, 30, 25, 20, 16.666, 14.2857, 12.5, 11.111, 10, 5, 0 (ook negatieve cijfers). Indien dat niet het geval is, zijn er twee opties:

* Fout als het cijfer niet in de lijst voorkomt - als een vraag cijfers bevat die niet in de lijst voorkomen, dan zal wordt er een foutmelding getoond en de vraag wordt niet geïmporteerd;
* Dichtsbijzijnde cijfer indien niet in de lijst - Als een cijfer wordt gevonden dat niet overeenkomt met een cijfer in de lijst, dan wordt het cijfer gewijzigd naar de dichtsbijzijnde waarde in de lijst';
$string['matchgradesnearest'] = 'Dichtsbijliggende cijfer indien niet getoond';
$string['missingcourseorcmid'] = 'Moet courseid of cmid opgeven voor print_question';
$string['missingcourseorcmidtolink'] = 'Moet cursusid of cmid geven voor get_question_edit_link';
$string['missingimportantcode'] = 'Dit vraagtype mist belangrijke code: {$a}';
$string['missingoption'] = 'De ingebedde vraag {$a} mist de opties';
$string['modified'] = 'Gewijzigd';
$string['move'] = 'Verplaats van {$a} en wijzig links.';
$string['movecategory'] = 'Verplaats categorie';
$string['movedquestionsandcategories'] = 'Vragen en vraagcategorieën verplaatst van {$a->oldplace} naar {$a->newplace}.';
$string['movelinksonly'] = 'Wijzig alleen verwijzing van links, verplaats noch kopieëer bestanden';
$string['moveq'] = 'Verplaats vraag/vragen';
$string['moveqtoanothercontext'] = 'Verplaats vraag naar andere context.';
$string['moveto'] = 'Verplaats naar >>';
$string['movingcategory'] = 'Categorie verplaatsen';
$string['movingcategoryandfiles'] = 'Ben je er zeker van dat je de categorie{$a->name} en alle onderliggende categorieën wil verplaatsen naar context "{$a->contextto}"?<br /> We hebben {$a->urlcount} bestanden gevonden die vanuit vragen gelinkt zijn in {$a->fromareaname}. Wil je die bestanden kopiëren of verplaatsen naar {$a->toareaname}?';
$string['movingcategorynofiles'] = 'Ben je er zeker van dat je categorie "{$a->name}" en alle onderliggende categorieën wil verplaatsen naar "{$a->contextto}"?';
$string['movingquestions'] = 'Vragen en bestanden verplaatsen';
$string['movingquestionsandfiles'] = 'Ben je er zeker van dat je de vraag / vragen {$a->questions} naar <strong>"{$a->tocontext}"</strong> wil kopieëren?<br /> Er zijn <strong>{$a->urlcount} bestanden </strong> gelinkt vanuit deze vraag / vragen naar {$a->fromareaname}. Wil je deze kopieëren of verplaatsen naar {$a->toareaname}?';
$string['movingquestionsnofiles'] = 'Ben je er zeker van dat je deze vraag / vragen  {$a->questions} naar <strong>"{$a->tocontext}"</strong> wil verplaatsen?<br /> Er zijn <strong>geen bestanden</strong> gelinkt vanuit deze vraag / vragen in  {$a->fromareaname}.';
$string['needtochoosecat'] = 'Je moet een categorie kiezen om deze vragen naartoe te verplaatsen of klik op \'annuleer\'.';
$string['nocate'] = 'Geen categorie {$a}!';
$string['nopermissionadd'] = 'Je hebt het recht niet om hier vragen toe te voegen.';
$string['nopermissionmove'] = 'Je hebt het recht niet om vragen van hieruit te verplaatsen. Je moet de vraag in deze categorie bewaren of ze bewaren als nieuwe vraag.';
$string['noprobs'] = 'Er zijn geen problemen gevonden in je vragendatabank.';
$string['noquestions'] = 'Er zijn geen vragen gevonden die geëxporteerd kunnen worden. Zorg ervoor dat en een categorie geselecteerd die vragen bevat om te exporteren.';
$string['noquestionsinfile'] = 'Er zijn geen vragen in het importbestand';
$string['noresponse'] = '[Geen antwoord]';
$string['notanswered'] = 'Niet beantwoord';
$string['notchanged'] = 'Niet gewijzigd sinds de laatste poging';
$string['notenoughanswers'] = 'Dit vraagtype vereist minstens {$a} antwoorden';
$string['notenoughdatatoeditaquestion'] = 'Noch een vraad ID, een categorie ID of een vraagtype is opgegeven.';
$string['notenoughdatatomovequestions'] = 'Je moet de vraag id\'s opgeven van de vragen die je wil verplaatsen.';
$string['notflagged'] = 'Niet gemarkeerd';
$string['notgraded'] = 'Niet beoordeeld';
$string['notshown'] = 'Niet getoond';
$string['notyetanswered'] = 'Nog niet beantwoord';
$string['notyourpreview'] = 'Dit voorbeeld is niet voor jou bestemd';
$string['novirtualquestiontype'] = 'Geen virtueel vraagtype voor vraagtype {$a}';
$string['numqas'] = 'Aantal vraagpogingen';
$string['numquestions'] = 'Geen vragen';
$string['numquestionsandhidden'] = '{$a->numquestions} (+{$a->numhidden} verborgen)';
$string['options'] = 'Opties';
$string['orphanedquestionscategory'] = 'Vragen bewaard uit verwijderde categorieën';
$string['orphanedquestionscategoryinfo'] = 'Af en toe, gewoonlijk te wijten aan oude softwarebugs, blijven vragen in de databank, zelfs wanneer de overeenkomstige vragencategorie al verwijderd is. Dit zou natuurlijk niet mogen gebeuren, maar het is in het verleden op deze site gebeurd. Deze categorie is automatisch gemaakt en verweesde vragen zijn naar hier verplaatst, zodat je ze terug kunt beheren. Merk op dat mediabestanden of afbeeldingen die bij de vraag horen, waarschijnlijk verloren gegaan zijn.';
$string['page-question-category'] = 'Pagina voor vragencategorieën';
$string['page-question-edit'] = 'Pagina voor bewerken van vragen';
$string['page-question-export'] = 'Vraagexportpagina';
$string['page-question-import'] = 'Vraagimportpagina';
$string['page-question-x'] = 'Elke vragenpagina';
$string['parent'] = 'Bovenliggende';
$string['parentcategory'] = 'Bovenliggende categorie';
$string['parentcategory_help'] = 'De bovenliggende categorie is diegene waarin de nieuwe categorie wordt gemaakt. "Top" betekent dat deze categorie geen deel uitmaakt van een andere categorie. Categoriecontexten worden in het vet getoond. Er moet minstens één categorie zijn per context.';
$string['parenthesisinproperclose'] = 'De haakjes voor ** zijn niet goed gesloten in {$a}**';
$string['parenthesisinproperstart'] = 'De haakjes voor ** zijn niet geopend in {$a}**';
$string['parsingquestions'] = 'Vragen verwerken van importbestand';
$string['partiallycorrect'] = 'Gedeeltelijk juist';
$string['partiallycorrectfeedback'] = 'Voor elk gedeeltelijk juist antwoord';
$string['partiallycorrectfeedbackdefault'] = 'Je antwoord is gedeeltelijk juist.';
$string['penaltyfactor'] = 'Strafpuntfactor';
$string['penaltyfactor_help'] = '<p>Je kunt instellen welk deel van de behaalde score moet afgetrokken worden voor elk fout antwoord. Dit is enkel relevant als de test in adaptieve modus loopt, zodat de leerling meerdere keren kan antwoorden op elke vraag. De straffactor moet een getal zijn tussen 0 en 1. Een straffactor van 1 betekent dat de leerling het antwoord van de eerste keer juist moet hebben om een cijfer te krijgen. Een straffactor van 0 betekent dat de leerling zo dikwijls als hij wil mag proberen en toch nog het volledige cijfer krijgt als hij het antwoord juist heeft.</p>';
$string['penaltyforeachincorrecttry'] = 'Strafpunt voor elke foute poging';
$string['penaltyforeachincorrecttry_help'] = 'Wanneer je je vragen laat lopen met het vraaggedrag \'Interactief met meerdere pogingen\' of met \'Adaptieve modus\', zodat de leerling meerdere pogingen heeft om het antwoord juist te hebben, dan controleert deze optie hoe veel strafpunten ze krijgen voor elke foute poging.

Het aantal strafpunten is een deel van het totaal aantal punten voor de vraag, dus als de vraag drie punten waard is en het aantal strafpunten is 0,3333333, dan zal de leerling een 3 krijgen als die het antwoord van de eerste keer juist heeft, een 3 als die het bij de tweede poging juist heeft en een 1 bij de derde poging.';
$string['permissionedit'] = 'Bewerk deze vraag';
$string['permissionmove'] = 'Verplaats deze vraag';
$string['permissionsaveasnew'] = 'Bewaar dit als een nieuwe vraag';
$string['permissionto'] = 'Je hebt het recht om:';
$string['previewquestion'] = 'Voorbeeld van vraag: {$a}';
$string['published'] = 'gepubliceerd';
$string['qtypeveryshort'] = 'T';
$string['questionaffected'] = '<a href="{$a->qurl}">Vraag "{$a->name}" ({$a->qtype})</a> is in deze vragencategorie, maar is ook gebruikt in <a href="{$a->qurl}">de test "{$a->quizname}"</a> in een andere cursus: "{$a->coursename}".';
$string['questionbank'] = 'Vragenpool';
$string['questionbehaviouradminsetting'] = 'Vraaggedraginstellingen';
$string['questionbehavioursdisabled'] = 'Uit te schakelen vraaggedrag';
$string['questionbehavioursdisabledexplained'] = 'Geef een komma gescheiden lijst van vraaggedrag dat je niet in het rolmenu wil zien verschijnen';
$string['questionbehavioursorder'] = 'Vraaggedrag volgorde';
$string['questionbehavioursorderexplained'] = 'Geef een komma gescheiden lijst van vraaggedrag in de volgorde dat je het wil zien verschijnen';
$string['questioncategory'] = 'Vraagcategorie';
$string['questioncatsfor'] = 'Vragencategorieën voor \'{$a}\'';
$string['questiondoesnotexist'] = 'Deze vraag bestaat niet.';
$string['questionidmismatch'] = 'Vraag ID\'s komen niet overeen';
$string['questionname'] = 'Vraagnaam';
$string['questionno'] = 'Vraag {$a}';
$string['questionpreviewdefaults'] = 'Standaardinstellingen vraagvoorbeeld';
$string['questionpreviewdefaults_desc'] = 'Deze standaardwaarden worden gebruikt wanneer een gebruiker vragen bekijkt in de vragenbank. Wanneer een gebruiker een vraag bekeken heeft, worden deze instellingen bewaard als persoonlijke gebruikersvoorkeuren.';
$string['questions'] = 'Vragen';
$string['questionsaveerror'] = 'Fouten opgetreden tijdens het bewaren van de vraag - ({$a})';
$string['questionsinuse'] = '(* Vragen, gemerkt met een sterretje, zijn al in gebruik in sommige testen. Deze vragen zullen niet uit de testen gewist worden, enkel uit de categorielijst.)';
$string['questionsmovedto'] = 'De nog gebruikte vragen zijn verplaatst naar "{$a}" in de bovenliggende cursuscategorie.';
$string['questionsrescuedfrom'] = 'Vragen bewaard vanuit context {$a}.';
$string['questionsrescuedfrominfo'] = 'Deze vragen (waarvan sommigen verborgen kunnen zijn) werden bewaard wanneer context {$a} is verwijderd omdat ze nog gebruikt worden door sommige testen of andere activiteiten.';
$string['questiontext'] = 'Vraag tekst';
$string['questiontype'] = 'Vraagtype';
$string['questionuse'] = 'Gebruik vraag in deze activiteit';
$string['questionvariant'] = 'Vraag variant';
$string['questionx'] = 'Vraag {$a}';
$string['requiresgrading'] = 'Beoordelen vereist';
$string['responsehistory'] = 'Antwoordgeschiedenis';
$string['restart'] = 'Start opnieuw';
$string['restartwiththeseoptions'] = 'Start opnieuw met deze opties';
$string['reviewresponse'] = 'Bekijk antwoord';
$string['rightanswer'] = 'Juist antwoord';
$string['rightanswer_help'] = 'Een automatisch gegenereerde samenvatting van het juiste antwoord. Dit kan beperkt zijn. Overweeg om het juiste antwoord in de algemene feedback foor de vraag mee te geven en deze optie uit te schakelen.';
$string['save'] = 'Bewaar';
$string['saved'] = 'Bewaard: {$a}';
$string['saveflags'] = 'Bewaar de status van deze markeringen';
$string['selectacategory'] = 'Selecteer een categorie:';
$string['selectaqtypefordescription'] = 'Selecteer een vraagtype om de beschrijving ervan te zien.';
$string['selectcategoryabove'] = 'Selecteer één van de bovenstaande categorieën';
$string['selectquestionsforbulk'] = 'Selecteer vragen voor bulkoperaties';
$string['settingsformultipletries'] = 'Meerdere pogingen';
$string['shareincontext'] = 'Deel in context voor {$a}';
$string['showhidden'] = 'Toon ook oude vragen';
$string['showmarkandmax'] = 'Toon cijfer en maximum';
$string['showmaxmarkonly'] = 'Toon alleen maximum';
$string['shown'] = 'Getoond';
$string['shownumpartscorrect'] = 'Toon het aantal juiste antwoorden';
$string['shownumpartscorrectwhenfinished'] = 'Toon het aantal juiste antwoorden wanneer de vraag beëindigd is';
$string['showquestiontext'] = 'Toon de vraagtekst in de vragenlijst';
$string['specificfeedback'] = 'Specifieke feedback';
$string['specificfeedback_help'] = 'Feedback die afhankelijk is van het antwoord van de leerling';
$string['started'] = 'Gestart';
$string['state'] = 'Status';
$string['step'] = 'Stap';
$string['stoponerror'] = 'Stop bij fout';
$string['stoponerror_help'] = 'Deze instelling bepaalt of het importproces stopt wanneer er een fout gevonden wordt, met als resultaat dat er geen vragen geïmporteerd worden, of dat alle vragen met fouten genegeerd worden en de geldige vragen geïmporteerd worden.';
$string['submissionoutofsequence'] = 'Toegang uit volgorde. Klik niet op de terug-knop van je browser wanneer je aan testvragen werkt.';
$string['submissionoutofsequencefriendlymessage'] = 'Je hebt gegevens ingevoerd buiten de normale volgorde. Dit kan gebeuren als je de terugknop van je browser gebruikt; doe dit aub niet tijdens de test; Dit kan ook gebeuren wanneer je ergens op klikt tijdens het laden van de pagina. Klik op \'Ga verder\' om de fout te herstellen.';
$string['submit'] = 'Afgeven';
$string['submitandfinish'] = 'Afgeven en beëindigen';
$string['submitted'] = 'Afgeven: {$a}';
$string['technicalinfo'] = 'Technische documentatie';
$string['technicalinfo_help'] = 'Deze technische informatie is waarschijnlijk enkel nuttig voor ontwikkelaars die aan nieuwe vraagtypes werken. Ze kan ook nuttig zijn om een diagnose te meken bij het oplossen van problemen met vragen.';
$string['technicalinfomaxfraction'] = 'Maximale fractie: {$a}';
$string['technicalinfominfraction'] = 'Minimumfractie: {$a}';
$string['technicalinfoquestionsummary'] = 'Samenvatting vraag: {$a}';
$string['technicalinforightsummary'] = 'Samenvatting juist antwoord: {$a}';
$string['technicalinfostate'] = 'Vraagstatus: {$a}';
$string['tofilecategory'] = 'Bewaar categorie in bestand';
$string['tofilecontext'] = 'Bewaar context in bestand';
$string['uninstallbehaviour'] = 'Verwijder dit vraaggedrag.';
$string['uninstallqtype'] = 'Verwijder dit vraagtype';
$string['unknown'] = 'Onbekend';
$string['unknownbehaviour'] = 'Onbekend vraaggedrag: {$a}';
$string['unknownorunhandledtype'] = 'Onbekend of onbehandeld vraagtype: {$a}';
$string['unknownquestion'] = 'Onbekende vraag: {$a}';
$string['unknownquestioncatregory'] = 'Onbekende vraagcategorie: {$a}';
$string['unknownquestiontype'] = 'Onbekend vraagtype: {$a}.';
$string['unknowntolerance'] = 'Onbekend tolerantietype {$a}';
$string['unpublished'] = 'Niet gepubliceerd';
$string['updatedisplayoptions'] = 'Toonopties aanpassen';
$string['upgradeproblemcategoryloop'] = 'Probleem gevonden tijdens de upgrade van de vragencategorieën. Er is een lus in de categorieënboom. De betreffende categorie-id\'s zijn {$a}.';
$string['upgradeproblemcouldnotupdatecategory'] = 'Kon vragencategorie {$a->name}({$a->id}) niet updaten.';
$string['upgradeproblemunknowncategory'] = 'Probleem gevonden tijdens het upgraden van vragencategorieën.
Categorie {$a->id} refereert naar bovenliggende categorie {$a->parent}, die niet bestaat. Bovenliggende categorie gewijzigd om het probleem op te lossen';
$string['whethercorrect'] = 'Indien juist';
$string['whethercorrect_help'] = 'Dit geldt zowel voor de tekstuele omschrijving \'juist\', \'gedeeltelijk juist\' of \'fout\', en alle gekleurde markeringen die dezelfde informatie overbrengt.';
$string['withselected'] = 'Met geselecteerd';
$string['wrongprefix'] = 'Fout geformateerde naamprefix {$a}';
$string['xoutofmax'] = '{$a->mark} op {$a->max}';
$string['yougotnright'] = 'Je hebt juist geselecteerd {$a->num}.';
$string['youmustselectaqtype'] = 'Je moet een vraagtype kiezen';
$string['yourfileshoulddownload'] = 'De download van je exportbestand begint zodadelijk. Indien niet, <a href="{$a}">klik hier</a>.';
