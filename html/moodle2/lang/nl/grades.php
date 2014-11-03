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
 * Strings for component 'grades', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   grades
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activities'] = 'Activiteiten';
$string['addcategory'] = 'Voeg categorie toe';
$string['addcategoryerror'] = 'Kon geen categorie toevoegen';
$string['addexceptionerror'] = 'Fout opgetreden bij het toevoegen van een uitzondering voor userid:gradeitem';
$string['addfeedback'] = 'Feedback toevoegen';
$string['addgradeletter'] = 'Voeg een beoordelingsletter toe';
$string['addidnumbers'] = 'Voeg id-nummers toe';
$string['additem'] = 'Beoordelingsitem toevoegen';
$string['addoutcome'] = 'Voeg competentie toe';
$string['addoutcomeitem'] = 'Voeg competentie-item toe';
$string['addscale'] = 'Voeg schaal toe';
$string['aggregateextracreditmean'] = 'Gemiddelde van cijfers (met bonuspunten)';
$string['aggregatemax'] = 'Hoogste cijfer';
$string['aggregatemean'] = 'Gemiddelde';
$string['aggregatemedian'] = 'Mediaan';
$string['aggregatemin'] = 'Laagste cijfer';
$string['aggregatemode'] = 'Modus';
$string['aggregateonlygraded'] = 'Enkel niet-lege beoordelingen in aggregatie opnemen';
$string['aggregateonlygraded_help'] = '<p>Nietbestaande cijfers kunnen beschouwd worden als minimumcijfers of als niet begrepen in de aggregatie.</p>';
$string['aggregateoutcomes'] = 'Competenites in aggregatie opnemen';
$string['aggregateoutcomes_help'] = '<p>Het opnemen van competenties in aggregatie kan een vreemd totaalcijfer geven. Daarom heb je hier de optie om de competenties op te nemen of niet op te nemen.</p>';
$string['aggregatesonly'] = 'Enkel geaggregeerden';
$string['aggregatesubcats'] = 'Subcategorieën mee opnemen in aggregatie';
$string['aggregatesubcats_help'] = '<p>De aggregatie wordt gewoonlijk gedaan met onmiddellijk onderliggende cijfers. Het is ook mogelijk om individuele cijfers te aggregeren in alle subcategorieën, waarbij cijfers die al geaggregeerd worden uitgesloten worden.</p>';
$string['aggregatesum'] = 'Som van cijfers';
$string['aggregateweightedmean'] = 'Gewogen gemiddelde';
$string['aggregateweightedmean2'] = 'Eenvoudig gewogen cijfergemiddelde';
$string['aggregation'] = 'Aggregatie';
$string['aggregationcoef'] = 'Aggregatiecoëfficiënt';
$string['aggregationcoefextra'] = 'Bonus';
$string['aggregationcoefextra_help'] = 'Wanneer de "som van cijfers" of "Eenvoudig gewogen gemiddelde" als aggregatiestrategie wordt gebruikt en het bonus vinkje is aangevinkt, dan wordt het maximumcijfer niet toegevoegd bij het maximale cijfer van de categorie, met als resultaat de mogelijkheid om het om het maximale cijfer (of cijfers boven het maximum indien ingeschakeld door de site-beheerder) te behalen in de categorie zonder het maximale cijfer te behalen in alle beoordelingsitems.

Als de aggregatie het gemiddelde van cijfers (met bonuspunten) is en het bonuspunt is ingesteld met een waarde groter dan nul, dan is het bonuspunt de factor waarmee het cijfer wordt vermenigvuldigt voor het aan het het totaal wordt toegevoegd en na de berekening van het gemiddelde.';
$string['aggregationcoefextrasum'] = 'Bonus';
$string['aggregationcoefextrasum_help'] = '<p>Wanneer de "som van cijfers" aggregatiestrategie wordt gebruikt, dan kan een beoordelingsitem ingesteld worden als bonusitem voor de categorie. Dit betekent dat het maximumcijfer voor dit item niet toegevoegd zal worden aan het maximumcijfer van de categorie, maar het cijfer van het beoordelingsitem zal wel meegerekend worden. Voorbeeld:</p>

<ul>
    <li>Item 1 wordt beoordeeld tussen 0-100</li>
    <li>Item 2 wordt beoordeeld tussen 0-75</li>
    <li>Item 1 heeft een vinkje bij "bonus", item 2 niet.</li>
    <li>Beide items horen bij categorie 1, die "Som van cijfers" als aggregatiestrategie heeft</li>
    <li>Het totaal van categorie 1 zal tussen 0-75 liggen</li>
    <li>Een leerling krijgt als beoordelingen 20 voor item 1 en 70 voor item 2</li>
    <li>Het totaal van de leerling voor categorie 1 zal 75/75 zijn (20+70 = 90, maar item 1 geldt als bonus en brengt zo het totaal tot het maximumcijfer voor de categorie)</li>
</ul>';
$string['aggregationcoefextraweight'] = 'Bonus weging';
$string['aggregationcoefextraweight_help'] = '<p>Een waarde hoger dan 0 zorgt ervoor dat dit beoordelingsitem als bonus behandeld wordt tijdens aggregatie. Het getal is een factor waarmee dit cijfer wordt vermenigvuldigd voor het opgeteld wordt bij alle andere cijfers, maar het item zelf zal niet inbegrepen worden in de deling. Bijvoorbeeld:</p>

<ul>
    <li>Item 1 wordt beoordeeld tussen 0-100 en de  "Bonus"-waarde staat op 2</li>
    <li>Item 2 wordt beoordeeld tussen 0-100 en de "Bonus"-waarde staat nog op 0.0000</li>
    <li>Item 3 wordt beoordeeld tussen 0-100 en de "Bonus"-waarde staat nog op 0.0000</li>
    <li>De 3 items staan in categorie 1, die als aggregatiestrategie "Gemiddelde van cijfers (met bonus) heeft</li>
    <li>Een leerling krijgt als beoordelingen 20 op Item 1, 40 op Item 2 en 70 op Item 3</li>
    <li>Het totaal voor categorie 1 voor deze leerling zal zijn: 75/100 (20*2 + 40 + 70) / 2</li>
</ul>';
$string['aggregationcoefweight'] = 'Weging beoordelingsitem';
$string['aggregationcoefweight_help'] = '<p>Weging toegepast op alle cijfers in dit beoordelingsitem wanneer dit geaggregeerd wordt met andere beoordelingsitems.</p>';
$string['aggregation_help'] = '<p>Met dit menu kun je kiezen voor een aggregatiestrategie die gebruikt zal worden om het totaalcijfer van elke deelnemer te berekenen. De verschillende mogelijkheden zijn hieronder uitgelegd.</p>

<p>De cijfers worden eerst omgezet naar procentuele waarden (interval van 0 tot 1, dit heet normalisatie), dan geaggregeerd via één van onderstaande functies en uiteindelijk geconverteerd naar de gevraagde schaal of het geassocieerde categorie-itembereik (tussen <em>Minimum cijfer</em> en <em>Maximum cijfer</em>).</p>

<p><strong>Belangrijk</strong>: Een lege beoordeling is gewoon een ontbrekende beoordeling in de cijferlijst en dat kan allerlei oorzaken hebben. Bijvoorbeeld een leerling die nog geen opdracht ingestuurd heeft, een opdracht die nog niet beoordeeld is door de leraar of een beoordeling die manueel verwijderd is door de beheerder van de cijferlijst. Het is dus belangrijk voorzichtig te zijn bij de interpretatie van deze "lege beoordelingen".</p>

<dl id="grade-aggregation-help">
    <dt>Gemiddelde van alle beoordelingen</dt>
        <dd>Alle cijfers worden opgeteld en dan gedeeld door het aantal cijfers. Lege cijfers worden meegerekend (zij worden geïnterpreteerd als de minimumwaarde voor het beoordelingsitem).</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, category max 100:<br /><code>(0.7 + 0.25 + 1.0)/3 = 0.65 --> 65/100</code></dd>

    <dt>Gewogen gemiddelde</dt>
        <dd>Elk beoordelingsitem kan een weging gegeven worden, die dan gebruikt wordt in het berekening van het aggregatiegemiddelde om het balang van elk item voor het algemeen gemiddelde te beïnvloeden.</dd>
        <dd class="example">A1 70/100 weging 10, A2 20/80 weging 5, A3 10/10 weging 3, categorie max 100:<br /><code>(0.7*10 + 0.25*5 + 1.0*3)/18 = 0.625 --> 62.5/100</code></dd>


    <dt>Eenvoudig gewogen gemiddelde</dt>
        <dd>Het verschil met <em>Gewogen gemiddelde</em> is dat de weging berekend is als <em>Maximum cijfer</em> - <em>Minimum cijfer</em> voor elk item. Een opdracht voor 100 punten krijgt een weging 100, een opdracht voor 10 punten krijgt een weging 10/</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, categorie max 100:<br /><code>(0.7*100 + 0.25*80 + 1.0*10)/190 = 0.526 --> 52.6/100</code></dd>

    <dt>Gemiddelde van cijfers (met bonuspunten)</dt>
        <dd>Rekenkundig gemiddelde met een truukje. Een oude, nu niet meer ondersteunde manier van aggregeren, enkel hier voorzien voor terugwaartse compatibiliteit met oudere activiteitenmodules.</dd>

    <dt>Mediaan van alle beoordelingen</dt>
        <dd>De mediaan wordt berekend door alle beoordelingen in volgorde te zetten en de middelste beoordelingen te nemen (of het gemiddelde van de twee middelste beoordelingen als het om een even aantal beoordelingen gaat). Het voordeel van de mediaan is dat die niet beïnvloed wordt door cijfers die ongewoon ver van het gemiddelde liggen. Lege beoordelingen worden meegerekend.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, categorie max 100:<br />
                         <code>median(0.7 ; 0.25 ; 1.0) = 0.7 --> 70/100</code></dd>

     <dt>Laagste cijfer</dt>
        <dd>Het resultaat is het laagste cijfer na normalisatie. Dit is gewoonlijk gebruikt in combinatie met <em>Aggregeer alleen niet-lege cijfers</em>.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, categorie max 100:<br /><code>min(0.7 + 0.25 + 1.0) = 0.25 --> 25/100</code></dd>

    <dt>Hoogste cijfer</dt>
        <dd>Het resultaat is het hoogste cijfer na normalisatie.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, categorie max 100:<br /><code>max(0.7 + 0.25 + 1.0) = 1.0 --> 100/100</code></dd>

    <dt>Modus van cijfers</dt>
        <dd>De modus is de beoordeling die het meest voorkomt. Dit wordt meer gebruikt voor niet-numerieke beoordelingen. Het voordeel boven het gemiddelde is dat het niet beïnvloed wordt door cijfers die uitzonderlijk ver van het gemiddelde liggen. De modus verliest wel zijn betekenis als er meer dan één cijfer het meest voorkomt (er wordt slechts één weerhouden) of wanneer alle cijfers verschillend zijn. Lege beoordelingen worden meegerekend.</dd>
        <dd class="example">A1 70/100, A2 35/50, A3 20/80, A4 10/10, A5 7/10 categorie max 100:<br /><code>mode(0.7; 0.7; 0.25; 1.0; 0.7) = 0.7 --> 70/100</code></dd>

    <dt>Som van cijfers</dt>
        <dd>De som van alle cijferwaarden. Schaalwaarden worden genegeerd. Dit is het enige type dat intern de cijfers niet naar percentages converteert (normalisatie). Het <em>Maximum cijfer</em> van een geassocieerde categorie-item wordt automatisch berekend als de som van de maxima van alle geaggregeerde items.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10:<br />
                         <code>70 + 20 + 10 = 100/190</code></dd>
</dl>';
$string['aggregationposition'] = 'Aggregatiepositie';
$string['aggregationposition_help'] = '<p>Definieert de positie van de totalenkolom van de aggregatie in het rapport tenopzichte van de cijfers die geaggregeerd worden.</p>';
$string['aggregationsvisible'] = 'Beschikbare aggregatietypes';
$string['aggregationsvisiblehelp'] = 'Selecteer alle aggregatietypes die beschikbaar moeten zijn. Houd de Ctrl-toets ingedrukt om meerdere items te selecteren';
$string['allgrades'] = 'Alle cijfers per categorie';
$string['allstudents'] = 'Alle leerlingen';
$string['allusers'] = 'Alle gebruikers';
$string['autosort'] = 'Auto-sorteer';
$string['availableidnumbers'] = 'Beschikbare id-nummers';
$string['average'] = 'Gemiddelde';
$string['averagesdecimalpoints'] = 'Decimalen in kolom gemiddelden';
$string['averagesdecimalpoints_help'] = '<p>Specifieert het aantal te tonen decimalen voor elk kolomgemiddelde. Als overerven is geselecteerd, dan wordt deze opmaak voor elke kolom gebruikt.</p>';
$string['averagesdisplaytype'] = 'Opmaak kolom gemiddelden';
$string['averagesdisplaytype_help'] = '<p>Specifieert hoe het gemiddelde voor elke kolom getoond wordt. Als overerven is ingeschakeld dan wordt deze opmaak voor elke kolom gebruikt.</p>';
$string['backupwithoutgradebook'] = 'De configuratie van de cijferlijst is niet opgenomen in de back-up.';
$string['badgrade'] = 'Beoordeling ongeldig';
$string['badlyformattedscale'] = 'Geef een komma-gescheiden lijst met waarden (minstens twee waarden vereist)';
$string['baduser'] = 'Gebruiker ongeldig';
$string['bonuspoints'] = 'Bonuspunten';
$string['bulkcheckboxes'] = 'Selectievakjes voor bulkoperaties';
$string['calculatedgrade'] = 'Berekend cijfer';
$string['calculation'] = 'Berekening';
$string['calculationadd'] = 'Berekening toevoegen';
$string['calculationedit'] = 'Berekening bewerken';
$string['calculation_help'] = 'Een cijferberekening is een formule die gebruikt wordt om cijfers te bepalen. De formule moet beginnen met een gelijkheidsteken (=) en mag algemene wiskundige operators bevatten, zoals min, max, sum. Indien gewenst kunnen andere cijferelementen in de berekening betrokken worden door hun ID-nummer tussen dubbele vierkante haken op te nemen.';
$string['calculationsaved'] = 'Berekening bewaard';
$string['calculationview'] = 'Bekijk berekening';
$string['cannotaccessgroup'] = 'Geen toegang tot de cijfers van de geselecteerde groep.';
$string['categories'] = 'Categorieën';
$string['categoriesanditems'] = 'Categorieën en items';
$string['categoriesedit'] = 'Bewerk categorieën en items';
$string['category'] = 'Categorie';
$string['categoryedit'] = 'Bewerk categorie';
$string['categoryname'] = 'Categorienaam';
$string['categorytotal'] = 'Categorietotaal';
$string['categorytotalfull'] = '{$a->category} totaal';
$string['categorytotalname'] = 'Naam categorietotaal';
$string['changedefaults'] = 'Wijzig standaardinstellingen';
$string['changereportdefaults'] = 'Wijzig standaardinstellingen rapport';
$string['chooseaction'] = 'Kies een actie ...';
$string['choosecategory'] = 'Kies categorie';
$string['combo'] = 'Tabbladen en rolmenu';
$string['compact'] = 'Compact';
$string['componentcontrolsvisibility'] = 'Of dit cijfer al dan niet verborgen is, wordt gecontroleerd door de activiteitsinstellingen.';
$string['contract'] = 'Contractcategorie';
$string['controls'] = 'Beheer';
$string['courseavg'] = 'Cursusgemiddelde';
$string['coursegradecategory'] = 'Cursus beoordelingscategorie';
$string['coursegradedisplaytype'] = 'Opmaak beoordelingen voor de cursus';
$string['coursegradedisplayupdated'] = 'De opmaak van beoordelingen voor deze cursus is gewijzigd.';
$string['coursegradesettings'] = 'Instellingen cursuscijfer';
$string['coursename'] = 'Cursusnaam';
$string['coursescales'] = 'Cursusschalen';
$string['coursesettings'] = 'Cursusinstellingen';
$string['coursesettingsexplanation'] = 'Cursusinstellingen bepalen hoe de cijferlijst er zal uitzien voor alle deelnemers van de cursus';
$string['coursetotal'] = 'Cursustotaal';
$string['createcategory'] = 'Maak categorie';
$string['createcategoryerror'] = 'Kon geen nieuwe categorie maken';
$string['creatinggradebooksettings'] = 'Instellingen cijferlijst maken';
$string['csv'] = 'CSV';
$string['currentparentaggregation'] = 'Huidige bovenliggende aggregatie';
$string['curveto'] = 'Afbuigen naar';
$string['decimalpoints'] = 'Aantal decimalen';
$string['decimalpoints_help'] = '<p>Stelt het aantal te tonen decimalen in voor elk cijfer. Deze instelling heeft geen effect op de berekeningen met cijfers. Die worden gemaakt met een nauwkeurigheid van 5 decimalen.</p>';
$string['default'] = 'Standaard';
$string['defaultprev'] = 'Standaard ({$a})';
$string['deletecategory'] = 'Verwijder categorie';
$string['disablegradehistory'] = 'Geschiedenis van cijfertabellen uitschakelen';
$string['disablegradehistory_help'] = 'Geschiedenis van wijzigingen in cijfertabellen uitschakelen. Dit kan de server een klein beetje minder belasten en zal wat plaats in de databank besparen.';
$string['displaylettergrade'] = 'Toon een beoordeling met letters';
$string['displaypercent'] = 'Toon procent';
$string['displaypoints'] = 'Toon punten';
$string['displayweighted'] = 'Toon een gewogen cijfer';
$string['dropdown'] = 'Rolmenu';
$string['droplow'] = 'Laagste weglaten';
$string['droplowestvalue'] = 'Laat laagste cijferwaarde vallen';
$string['droplow_help'] = '<p>Indien ingesteld zal deze optie de X laagste cijfers negeren, waarbij X de ingestelde waarde voor deze optie is.</p>';
$string['dropped'] = 'Weggelaten';
$string['dropxlowest'] = 'Laat de X laagste weg';
$string['dropxlowestwarning'] = 'Opmerking: als je \'Laat de X laagste weg\' gebruikt, dan gaat het cijferlijst er van uit dat alle items in de categorie dezelfde puntenwaarde hebben. Als de puntenwaarden verschillen, dan zullen de resultaten onvoorspelbaar zijn.';
$string['duplicatescale'] = 'Kopieer schaal';
$string['edit'] = 'Bewerk';
$string['editcalculation'] = 'Bewerk berekening';
$string['editcalculationverbose'] = 'Bewerk berekening voor {$a->category} {$a->itemmodule} {$a->itemname}';
$string['editfeedback'] = 'Bewerk feedback';
$string['editgrade'] = 'Bewerk beoordeling';
$string['editgradeletters'] = 'Bewerk beoordelingsletters';
$string['editoutcome'] = 'Bewerk competentie';
$string['editoutcomes'] = 'Bewerk competenties';
$string['editscale'] = 'Bewerk schaal';
$string['edittree'] = 'Categorieën en items';
$string['editverbose'] = 'Bewerk {$a->category} {$a->itemmodule} {$a->itemname}';
$string['enableajax'] = 'AJAX inschakelen';
$string['enableajax_help'] = 'Voegt een laagje AJAX functionaliteit toe aan het rapport, wat het bewerken ervan vereenvoudigd en versneld. Dit werkt alleen als Javascript is ingeschakeld in de browser van de gebruiker.';
$string['enableoutcomes'] = 'Competenties inschakelen';
$string['enableoutcomes_help'] = 'Ondersteuning voor competenties (ook bekend als doelen, standaarden, criteria, ...) betekent dat we zaken kunnen beoordelen door gebruik te maken van één of meerder schalen die verbonden zijn aan een competentiebeschrijving. Het inschakelen van competenties maakt deze speciale beoordelingsmanier mogelijk op heel de site';
$string['encoding'] = 'Codering';
$string['errorcalculationbroken'] = 'Waarschijnlijk een kringloopreferentie of een foute berekeningsformule';
$string['errorcalculationnoequal'] = 'Formule moet beginnen met een gelijkheidsteken (=1+2)';
$string['errorcalculationunknown'] = 'Formule is niet geldig';
$string['errorgradevaluenonnumeric'] = 'Niet-numerieke waarde ontvangen voor laagste en hoogste cijfer voor';
$string['errornocalculationallowed'] = 'Berekeningen zijn voor dit item niet toegelaten';
$string['errornocategorisedid'] = 'Kon geen id zonder categorie vinden';
$string['errornocourse'] = 'Kon geen informatie over de cursus vinden';
$string['errorreprintheadersnonnumeric'] = 'Niet-numerieke waarde ontvangen voor koppen herhalen';
$string['errorsavegrade'] = 'Kon cijfer niet bewaren.';
$string['errorsettinggrade'] = 'Fout bij het bewaren van het cijfer voor "{$a->itemname}" voor gebruikersid {$a->userid}';
$string['errorupdatinggradecategoryaggregateonlygraded'] = 'Fout bij het updaten van de "Aggregeer alleen beoordeelde items"-instelling van cijfercategorie ID {$a->id}';
$string['errorupdatinggradecategoryaggregateoutcomes'] = 'Fout bij het updaten van de "Aggregeer competenties"-instelling van de cijfercategorie ID {$a->id}';
$string['errorupdatinggradecategoryaggregatesubcats'] = 'Fout bij het updaten van de "Aggregeer sub-categorieën"-instelling van cijfercategorie ID {$a->id}';
$string['errorupdatinggradecategoryaggregation'] = 'Fout bij het aanpassen van het aggregatietype van cijfercategorie ID {$a->id}';
$string['errorupdatinggradeitemaggregationcoef'] = 'Fout bij het updaten van de aggregatiecoëfficiënt (weging of bonus) van beoordelingsitem ID {$a->id}';
$string['excluded'] = 'Uitgesloten';
$string['excluded_help'] = '<p>Als -uitgesloten- is ingesloten, dan zal dit cijfer niet gebruikt worden in aggregaties door bovenliggende beoordelingsitems of categorieën.</p>';
$string['expand'] = 'Categorie uitbreiden';
$string['export'] = 'Exporteer';
$string['exportalloutcomes'] = 'Exporteer alle competenties';
$string['exportfeedback'] = 'Feedback opnemen in export';
$string['exportonlyactive'] = 'Geschorste gebruikers uitsluiten';
$string['exportonlyactive_help'] = 'Enkel leerlingen in de export zetten van wie de aanmelding actief en niet geschorst is';
$string['exportplugins'] = 'Exporteerplugins';
$string['exportsettings'] = 'Exporteer instellingen';
$string['exportto'] = 'Exporteer naar';
$string['extracreditvalue'] = 'Extra bonus voor {$a}';
$string['extracreditwarning'] = 'Opmerking: als je alle items van een categorie als \'Extra krediet\' instelt, haal je ze uit de berekening van de cijfers omdat er geen puntentotaal meer is';
$string['feedback'] = 'Feedback';
$string['feedbackadd'] = 'Voeg feedback toe';
$string['feedbackedit'] = 'Bewerk feedback';
$string['feedbackforgradeitems'] = 'Feedback voor {$a}';
$string['feedback_help'] = '<p>Notities die de leraar kan maken om bij de beoordelingen te voegen. Dit kan uitgebreide, gepersonaliseerde feedback zijn of een eenvoudige code die verwijst naar een intern systeem of feedback.</p>';
$string['feedbacks'] = 'Feedback';
$string['feedbacksaved'] = 'Feedback bewaard';
$string['feedbackview'] = 'Bekijk feedback';
$string['finalgrade'] = 'Totaal beoordeling';
$string['finalgrade_help'] = '<p>Het uiteindelijke cijfer (gecached) nadat alle berekeningen uitgevoerd zijn.</p>';
$string['fixedstudents'] = 'Geblokkeerde namenkolom';
$string['fixedstudents_help'] = 'Blokkeert de kolom met namen, zodat de cijfers horizontaal kunnen scrollen.';
$string['forceoff'] = 'Verplicht: uit';
$string['forceon'] = 'Verplicht: aan';
$string['forelementtypes'] = 'Voor de gekozen {$a}';
$string['forstudents'] = 'Voor leerlingen';
$string['full'] = 'Volledig';
$string['fullmode'] = 'Volledig overzicht';
$string['fullview'] = 'Volledig overzicht';
$string['generalsettings'] = 'Algemene instellingen';
$string['grade'] = 'Beoordeling';
$string['gradeadministration'] = 'Cijferbeheer';
$string['gradeanalysis'] = 'Cijferanalyse';
$string['gradebook'] = 'Cijferlijst';
$string['gradebookhiddenerror'] = 'Het cijferlijst is nu ingesteld om alles voor de leerlingen te verbergen.';
$string['gradebookhistories'] = 'Cijfergeschiedenis';
$string['gradeboundary'] = 'Marge cijferbeoordeling';
$string['gradeboundary_help'] = 'Deze instelling bepaalt het minimale percentage waarboven cijfers de letter zullen toegewezen krijgen.';
$string['gradecategories'] = 'Beoordelingscategorieën';
$string['gradecategory'] = 'Beoordelingscategorie';
$string['gradecategoryonmodform'] = 'Beoordelingscategorie';
$string['gradecategoryonmodform_help'] = 'Deze instelling controleert de categorie waarin deze cijfers gezet worden in het puntenboek.';
$string['gradecategorysettings'] = 'Beoordelingscategorieën';
$string['gradedisplay'] = 'Beoordelingen tonen';
$string['gradedisplaytype'] = 'Hoe beoordelingen tonen';
$string['gradedisplaytype_help'] = 'Deze instelling bepaalt hoe cijfers getoond worden in beoordeler- en gebruikersrapporten.

* Echt - De echte cijfers
* Percentage
* Letter - Er worden letters of woorden gebruikt om een bereik van cijfers voor te stellen';
$string['gradedon'] = 'Beoordeeld op {$a}';
$string['gradeexport'] = 'Export beoordeling';
$string['gradeexportcustomprofilefields'] = 'Cijferexport aangepaste profielvelden';
$string['gradeexportcustomprofilefields_desc'] = 'Geef deze aangepaste profielvelden mee in de cijferexport, gescheiden door komma\'s';
$string['gradeexportdecimalpoints'] = 'Cijfers exporteren: decimalen';
$string['gradeexportdecimalpoints_desc'] = 'Het aantal te tonen decimalen voor export. Deze instelling kan genegeerd worden tijdens de export.';
$string['gradeexportdisplaytype'] = 'Cijfers exporteren: hoe beoordelingen tonen';
$string['gradeexportdisplaytype_desc'] = 'Beoordelingen kunnen tijdens de export getoond worden als cijfers, als percentages (zich verhoudend tot het minimum- en het maximumcijfer) of als letters (A,B,C, enz). Dit kan genegeerd worden tijdens de export.';
$string['gradeexportuserprofilefields'] = 'Cijferexport gebruikersprofielvelden';
$string['gradeexportuserprofilefields_desc'] = 'Geef deze profielvelden mee in de cijferexport, gescheiken door komma\'s';
$string['gradeforstudent'] = '{$a->student}<br />{$a->item}{$a->feedback}';
$string['gradehelp'] = 'Hulp bij cijfers';
$string['gradehistorylifetime'] = 'Levensduur van de cijfergeschiedenis';
$string['gradehistorylifetime_help'] = 'Met deze instelling bepaal je hoelang je de geschiedenis van de wijzigingen aan de cijfertabellen wil bijhouden. Het is aangewezen dit zo lang mogelijk te doen. Als je performantieproblemen ondervindt of je hebt maar beperkte databaseruimte, dan kun je hier een lagere waarde instellen.';
$string['gradeimport'] = 'Import beoordeling';
$string['gradeimportfailed'] = 'Importeren cijfer mislukt tijdens het insturen. Details:';
$string['gradeitem'] = 'Beoordelingsitem';
$string['gradeitemaddusers'] = 'Niet meerekenen';
$string['gradeitemadvanced'] = 'Geavanceerde opties';
$string['gradeitemadvanced_help'] = 'Kies alle elementen die als geavanceerd getoond moeten worden wanneer cijfers bewerkt worden.';
$string['gradeitemislocked'] = 'Deze activiteit is in het puntenboek geblokkeerd. Als je de cijfers wijzigt, dan zullen de cijfers, intern door deze activiteit bijgehouden, verschillen van de cijfers in het puntenboek. Dat zal ongewijzigd blijven. Ben je zeker dat je wil verdergaan met het wijzigen van de cijfers?';
$string['gradeitemlocked'] = 'Beoordeling geblokkeerd';
$string['gradeitemmembersselected'] = 'Niet meegerekend';
$string['gradeitemnonmembers'] = 'Meegerekend';
$string['gradeitemremovemembers'] = 'Meerekenen';
$string['gradeitems'] = 'Beoordelingsitems';
$string['gradeitemsettings'] = 'Instellingen beoordelingsitems';
$string['gradeitemsinc'] = 'Te gebruiken beoordelingsitems';
$string['gradeletter'] = 'Letterbeoordeling';
$string['gradeletter_help'] = '<p>Een letter of ander symbool dat gebruikt wordt om een cijfermarge voor te stellen.</p>';
$string['gradeletternote'] = 'Om een letterbeoordeling te verwijderen, maak je<br /> gewoon één van de drie tekstzones voor die letter leeg en klik je op bewaren.';
$string['gradeletters'] = 'Letterbeoordelingen';
$string['gradelocked'] = 'Cijfer is geblokkeerd';
$string['gradelong'] = '{$a->grade} / {$a->max}';
$string['grademax'] = 'Maximumcijfer';
$string['grademax_help'] = 'Deze instelling bepaalt het maximumcijfer wanneer je een waarde als cijfer gebruikt. De maximumwaarde voor een activiteitsgebaseerd cijfer wordt ingesteld op de instellingspagina van de activiteit.';
$string['grademin'] = 'Minimale beoordeling';
$string['grademin_help'] = 'Deze instelling bepaalt het minimumcijfer wanneer je met cijfers beoordeelt.';
$string['gradeoutcomeitem'] = 'Item voor beoordeling competentie';
$string['gradeoutcomes'] = 'Competenties';
$string['gradeoutcomescourses'] = 'Cursuscompetenties';
$string['gradepass'] = 'Cijfer om te slagen';
$string['gradepass_help'] = 'Deze instelling bepaalt het minimumcijfer dat vereist is om te slagen. De waarde wordt gebruikt in activiteits- en cursusvoltooiing en in het puntenboek, waar geslaagde cijfers in groen en niet geslaagd in rood wordt weergegeven.';
$string['gradepreferences'] = 'Beoordelingsvoorkeuren';
$string['gradepreferenceshelp'] = 'Help bij voorkeursinstellingen';
$string['gradepublishing'] = 'Publiceren inschakelen';
$string['gradepublishing_help'] = 'Publiceren in import en export inschakelen: Geëxporteerde cijfers kunnen opgevraagd worden via een URL zonder te moeten inloggen. Cijfers kunnen door zo een URL te bezoeken ook geïmporteerd worden (wat betekent dat een Moodle site cijfers kan importeren die gepubliceerd worden door een andere site).';
$string['gradereport'] = 'Beoordelingsrapport';
$string['graderreport'] = 'Rapportage';
$string['grades'] = 'Cijfers';
$string['gradesforuser'] = 'Cijfers voor {$a->user}';
$string['gradesonly'] = 'Enkel beoordelingen';
$string['gradessettings'] = 'Beoordelingsinstellingen';
$string['gradetype'] = 'Beoordelingstype';
$string['gradetype_help'] = 'Er zijn 4 beoordelingstypes:

* Geen - geen beoordeling mogelijk
* Waarde - een numerieke waarde met een maximum en een minimum
* Schaal - een item in een lijst
* Tekst - enkel feedback

Enkel de waarde en schaal kunnen geaggregeerd worden. Het beoordelingstype voor een activiteitsgebaseerd beoordelingsitem wordt op de instellingspagina van de activiteit ingesteld.';
$string['gradeview'] = 'Bekijk beoordeling';
$string['gradewasmodifiedduringediting'] = 'Het ingegeven cijfer voor {$a->itemname} van {$a->username} is weggelaten omdat het recent is aangepast door iemand anders.';
$string['gradeweighthelp'] = 'Help bij gewogen beoordelingen';
$string['groupavg'] = 'Groepsgemiddelde';
$string['hidden'] = 'Verborgen';
$string['hiddenasdate'] = 'Toon de datum voor verborgen beoordelingen';
$string['hiddenasdate_help'] = 'Als een gebruiker verborgen cijfers niet kan zien, toon dan de datum in de plaats van een \'-\'.';
$string['hidden_help'] = 'Beoordelingen worden verborgen voor leerlingen indien geselecteerd. Een verborgen tot-datum kan ingesteld worden indien gewenst. De cijfers worden pas getoond nadat het beoordelen klaar is.';
$string['hiddenuntil'] = 'Verborgen tot';
$string['hiddenuntildate'] = 'Verborgen tot: {$a}';
$string['hideadvanced'] = 'Verberg geavanceerde mogelijkheden';
$string['hideaverages'] = 'Verberg gemiddelden';
$string['hidecalculations'] = 'Verberg berekeningen';
$string['hidecategory'] = 'Verborgen';
$string['hideeyecons'] = 'Verberg toon/verberg-icoontjes';
$string['hidefeedback'] = 'Verberg feedback';
$string['hideforcedsettings'] = 'Verberg opgelegde instellingen';
$string['hideforcedsettings_help'] = 'Toon geen geforceerde instellignen in de beoordelingsgebruikerinterface';
$string['hidegroups'] = 'Verberg groepen';
$string['hidelocks'] = 'Verberg blokkering';
$string['hidenooutcomes'] = 'Toon competenties';
$string['hidequickfeedback'] = 'Verberg snelle feedback';
$string['hideranges'] = 'Verberg marges';
$string['hidetotalifhiddenitems'] = 'Totalen verbergen als ze verborgen items bevatten?';
$string['hidetotalifhiddenitems_help'] = 'Deze instelling bepaalt of totalen die verborgen beoordelingen bevatten aan leerllingen getoond worden of vervangen worden door een liggend streepje (-). Indien ze getoond worden, dan kan in het totaal de verborgen items meegerekend worden of niet.

Indien de verborgen items niet meegerekend worden, dan kan het totaal dat leerling en leraar ziet verschillend zijn, omdat de leraar altijd het totaal ziet van alle items, verborgen of niet. Indien de verborgen items wel meegerekend worden, dan zou het kunnen dat leerlingen het resultaat van die items zelf berekenen.';
$string['hidetotalshowexhiddenitems'] = 'Toon totalen zonder verborgen items';
$string['hidetotalshowinchiddenitems'] = 'Toon totalen met verborgen items';
$string['hideverbose'] = 'Verberg {$a->category} {$a->itemmodule} {$a->itemname}';
$string['highgradeascending'] = 'Sorteer cijfers oplopend';
$string['highgradedescending'] = 'Sorteer cijfers aflopend';
$string['highgradeletter'] = 'Hoog';
$string['identifier'] = 'Identificeer gebruiker door';
$string['idnumbers'] = 'id-nummers';
$string['ignore'] = 'Negeer';
$string['import'] = 'Importeer';
$string['importcsv'] = 'Importeer CSV';
$string['importcustom'] = 'Importeer als aangepaste competenties (enkel deze cursus)';
$string['importerror'] = 'Er is een fout opgetreden. Dit script is niet aangeroepen met de juiste parameters.';
$string['importfailed'] = 'Importeren mislukt. Er zijn geen gegevens geïmporteerd.';
$string['importfeedback'] = 'Importeer feedback';
$string['importfile'] = 'Importeer bestand';
$string['importfilemissing'] = 'Geen bestand ontvangen, ga terug naar het formulier en upload een geldig bestand.';
$string['importfrom'] = 'Importeer van';
$string['importoutcomenofile'] = 'Het geüploade bestand is leeg of corrupt. Controleer de geldigheid van je bestand. Het probleem is gevonden op lijn {$a}; De oorzaak is dat de data lijn niet evenveel kolommen telt als de eerste lijn (de lijn met veldnamen) of er ontbreken veldnamen op de eerste lijn. Kijk naar een geëxporteerd bestand als voorbeeld van een bestand met een geldige eerste lijn.';
$string['importoutcomes'] = 'Importeer competenties';
$string['importoutcomes_help'] = 'Competenties kunnen geïmporteerd worden via een CSV-bestand met dezelfde opmaak als het export CSV-bestand';
$string['importoutcomesuccess'] = 'Geïmporteerde competentie "{$a->name}" met ID #{$a->id}';
$string['importplugins'] = 'Importeer plugins';
$string['importpreview'] = 'Importeervoorbeeld';
$string['importsettings'] = 'Importeer instellingen';
$string['importskippednomanagescale'] = 'Je hebt het recht niet om een nieuwe schaal toe te voegen, dus competentie "{$a}" is overgeslagen omdat daarvoor een nieuwe schaal aangemaakt moest worden.';
$string['importskippedoutcome'] = 'Een competentie met de korte naam "{$a}" bestaat al in deze context. Degene die in het geïmporteerde bestand zat is overgeslagen.';
$string['importstandard'] = 'Importeer als standaard competenties';
$string['importsuccess'] = 'Beoordelingen importeren gelukt';
$string['importxml'] = 'Importeer XML';
$string['includescalesinaggregation'] = 'Gebruik ook schalen in aggregatie';
$string['includescalesinaggregation_help'] = 'Je kunt kiezen of schalen als getallen in alle geaggregeerde cijfers over alle cijferlijsten in alle cursussen opgenomen worden.
OPGELET: door deze instelling te wijzigen zullen alle geaggregeerde cijfers herberekend worden.';
$string['incorrectcourseid'] = 'Cursus ID was fout';
$string['incorrectcustomscale'] = '(Verkeerde aangepaste schaal, wijzigen aub.)';
$string['incorrectminmax'] = 'Het minimum moet kleiner zijn dan het maximum';
$string['inherit'] = 'overerf';
$string['intersectioninfo'] = 'Leerling/cijferinformatie';
$string['item'] = 'Item';
$string['iteminfo'] = 'Iteminformatie';
$string['iteminfo_help'] = '<p>Een plaats om informatie te zetten over dit item. De tekst die je hier ingeeft wordt nergens anders getoond.</p>';
$string['itemname'] = 'Itemnaam';
$string['itemnamehelp'] = 'De naam van dit item, doorgegeven vanuit de module.';
$string['items'] = 'Items';
$string['itemsedit'] = 'Bewerk beoordelingsitem';
$string['keephigh'] = 'Weerhoud hoogste';
$string['keephigh_help'] = 'Indien ingesteld, zal deze optie enkel de X hoogst cijfers behouden, waarbij X de geselecteerde waarde is voor deze optie.';
$string['keymanager'] = 'Sleutelbeheerder';
$string['lessthanmin'] = 'Het cijfer, ingegeven voor {$a->itemname} voor {$a->username} is minder dan het minimaal toegelaten';
$string['letter'] = 'Letter';
$string['lettergrade'] = 'Letterbeoordeling';
$string['lettergradenonnumber'] = 'Laagste en/of hoogste cijfer was geen cijfer';
$string['letterpercentage'] = 'Letter (percentage)';
$string['letterreal'] = 'Letter (reëel)';
$string['letters'] = 'Letters';
$string['linkedactivity'] = 'Gelinkte activiteit';
$string['linkedactivity_help'] = '<p>Specifiëert een optionele activiteit waaraan deze competentie is gelinkt. Dit wordt gebruikt om de performantie van de leerling te testen voor criteria die niet beoordeeld worden door het cijfer van de activiteit.</p>';
$string['linktoactivity'] = 'Link naar {$a->name} activiteit';
$string['lock'] = 'Blokkeer';
$string['locked'] = 'Geblokkeerd';
$string['locked_help'] = 'Indien geselecteerd kunnen beoordelingen niet meer automatisch aangepast worden vanuit de activiteitsmodule.';
$string['locktime'] = 'Blokkeer na';
$string['locktimedate'] = 'Geblokkeerd na: {$a}';
$string['lockverbose'] = 'Blokkeer {$a->category} {$a->itemmodule} {$a->itemname}';
$string['lowest'] = 'Laagste';
$string['lowgradeletter'] = 'Laag';
$string['manualitem'] = 'Manueel beoordelingsitem';
$string['mapfrom'] = 'Koppel van';
$string['mappings'] = 'Beoordelingsitems koppelingen';
$string['mapto'] = 'Koppel aan';
$string['max'] = 'Hoogste';
$string['maxgrade'] = 'Maximaal cijfer';
$string['meanall'] = 'Alle beoordelingen';
$string['meangraded'] = 'Niet lege beoordelingen';
$string['meanselection'] = 'Beoordelingen opgenomen in gemiddelde';
$string['meanselection_help'] = 'Kies welke beoordelingstypes voor gemiddeldes zullen gebruikt worden. Lege cellen kunnen genegeerd worden of als 0 berekend worden (standaardinstelling)';
$string['median'] = 'Mediaan';
$string['min'] = 'Laagste';
$string['missingscale'] = 'Je moet een schaal selecteren';
$string['mode'] = 'Modus';
$string['morethanmax'] = 'Het cijfer, ingegeven voor {$a->itemname} voor {$a->username} is meer dan het maximaal toegelaten.';
$string['moveselectedto'] = 'Verplaats geselecteerde items naar:';
$string['movingelement'] = '{$a} aan het verplaatsen';
$string['multfactor'] = 'Multiplicator';
$string['multfactor_help'] = '<p>Factor waarmee alle cijfers voor dit beoordelingsitem moeten vermenigvuldigd worden.</p>';
$string['multfactorvalue'] = 'Vermenigvuldig waarde voor {$a}';
$string['mypreferences'] = 'Mijn voorkeuren';
$string['myreportpreferences'] = 'Mijn rapport voorkeuren';
$string['navmethod'] = 'Navigatiemethode';
$string['neverdeletehistory'] = 'Cijfergeschiedenis nooit verwijderen';
$string['newcategory'] = 'Nieuwe categorie';
$string['newitem'] = 'Nieuw beoordelingsitem';
$string['newoutcomeitem'] = 'Nieuw competentie-item';
$string['no'] = 'Nee';
$string['nocategories'] = 'Cijfercategorieën konden voor deze cursus niet gevonden of toegevoegd worden';
$string['nocategoryname'] = 'Je hebt geen categorienaam opgegeven';
$string['nocategoryview'] = 'Geen categorieën om te tonen';
$string['nocourses'] = 'Er zijn nog geen cursussen';
$string['noforce'] = 'Niet forceren';
$string['nogradeletters'] = 'Geen cijferbeoordelingen ingesteld';
$string['nogradesreturned'] = 'Geen cijfers';
$string['noidnumber'] = 'Geen id nummer';
$string['nolettergrade'] = 'Geen letterbeoordeling voor';
$string['nomode'] = 'NA';
$string['nonnumericweight'] = 'Een niet-numerieke waarde ontvangen voor';
$string['nonunlockableverbose'] = 'Dit cijfer kan niet gedeblokkeerd worden tot {$a->itemname} gedeblokkeerd is.';
$string['nonweightedpct'] = '% zonder weging';
$string['nooutcome'] = 'Geen competentie';
$string['nooutcomes'] = 'Competentie-items moeten gelinkt zijn aan een cursuscompetentie, maar er zijn geen competenties in deze cursus. Wil je er toevoegen?';
$string['nopublish'] = 'Niet publiceren';
$string['norolesdefined'] = 'Geen rollen gedefiniëerd in Beheer -> Algemene instellingen -> Beoordelingsrollen';
$string['noscales'] = 'Competenties moeten gelinkt zijn aan een cursusschaal of een globale schaal, maar er zijn er geen. Wil je er toevoegen?';
$string['noselectedcategories'] = 'Je hebt geen categorieën geselecteerd';
$string['noselecteditems'] = 'Je hebt geen items geselecteerd';
$string['notteachererror'] = 'Je moet leraar zijn om deze functie te gebruiken';
$string['nousersloaded'] = 'Geen gebruikers geladen';
$string['numberofgrades'] = 'Aantal beoordelingen';
$string['onascaleof'] = 'op een schaal van {$a-grademin} tot {$a->grademax}';
$string['operations'] = 'Operatie';
$string['options'] = 'Opties';
$string['others'] = 'Anderen';
$string['outcome'] = 'Competentie';
$string['outcomeassigntocourse'] = 'Wijs nog een competentie toe aan deze cursus';
$string['outcomecategory'] = 'Maak competenties in categorie';
$string['outcomecategorynew'] = 'Nieuwe categorie';
$string['outcomeconfirmdelete'] = 'Ben je zeker dat je competentie "{$a}" wil verwijderen?';
$string['outcomecreate'] = 'Voeg een nieuwe competentie toe';
$string['outcomedelete'] = 'Verwijder competentie';
$string['outcomefullname'] = 'Volledige naam';
$string['outcome_help'] = 'De competentie waarvoor dit beoordelingsitem staat.';
$string['outcomeitem'] = 'Competentie-item';
$string['outcomeitemsedit'] = 'Bewerk competentie-item';
$string['outcomereport'] = 'Rapport competentie';
$string['outcomes'] = 'Competenties';
$string['outcomescourse'] = 'Competenties gebruikt in deze cursus';
$string['outcomescoursecustom'] = 'Eigen gebruikt (niet verwijderen)';
$string['outcomescoursenotused'] = 'Standaard niet gebruikt';
$string['outcomescourseused'] = 'Standaard gebruikt (niet verwijderen)';
$string['outcomescustom'] = 'Eigen competenties';
$string['outcomeshortname'] = 'Korte naam';
$string['outcomesstandard'] = 'Standaardcompetenties';
$string['outcomesstandardavailable'] = 'Beschikbare standaardcompetenties';
$string['outcomestandard'] = 'Standaardcompetentie';
$string['outcomestandard_help'] = '<p>Een standaardcompetentie is voor de hele site beschikbaar, voor alle cursussen.</p>';
$string['overallaverage'] = 'Algemeen gemiddelde';
$string['overridden'] = 'Gewijzigd';
$string['overridden_help'] = '<p>Wanneer ingeschakeld zal deze vlag verhinderen dat deze beoordeling automatisch overschreven kan worden. Deze vlag wordt dikwijls intern ingeschakeld door het puntenboek, maar kan hier manueel in- en uitgeschakeld worden.</p>';
$string['overriddennotice'] = 'Je totaalcijfer voor deze activiteit is manueel aangepast.';
$string['overridesitedefaultgradedisplaytype'] = 'Standaardinstellingen voor de site negeren';
$string['overridesitedefaultgradedisplaytype_help'] = '<p>Vink dit af om de site-standaarden voor het tonen van cijfers in het puntenboek uit te schakelen. Hierdoor worden formulierelementen geactiveerd waarmee je de marges voor letterbeoordeling kunt aanpassen volgens jouw keuze.</p>';
$string['parentcategory'] = 'Bovenliggende categorie';
$string['pctoftotalgrade'] = '% van totaalcijfer';
$string['percent'] = 'Procent';
$string['percentage'] = 'Percentage';
$string['percentageletter'] = 'Percentage (letter)';
$string['percentagereal'] = 'Percentage (Reëel)';
$string['percentascending'] = 'Sorteer procent oplopend';
$string['percentdescending'] = 'Sorteer procent aflopend';
$string['percentshort'] = '%';
$string['plusfactor'] = 'Compensatie';
$string['plusfactor_help'] = '<p>Getal dat zal opgeteld worden bij elk cijfer voor dit beoordelingsitem, nadat de Multiplicator is toegepast.</p>';
$string['plusfactorvalue'] = 'Offsetwaarde voor {$a}';
$string['points'] = 'punten';
$string['pointsascending'] = 'Sorteer punten oplopend';
$string['pointsdescending'] = 'Sorteer punten aflopend';
$string['positionfirst'] = 'Eerst';
$string['positionlast'] = 'Laatst';
$string['preferences'] = 'Voorkeuren';
$string['prefgeneral'] = 'Algemeen';
$string['prefletters'] = 'Beoordelingscijfers en marges';
$string['prefrows'] = 'Speciale rijen';
$string['prefshow'] = 'Toon/verberg schakelaars';
$string['previewrows'] = 'Voorbeeld rijen';
$string['profilereport'] = 'Rapport gebruikersprofiel';
$string['profilereport_help'] = 'Cijferrapport, gebruikt op gebruikersprofielpagina';
$string['publishing'] = 'Publiceren';
$string['quickfeedback'] = 'Snelle feedback';
$string['quickgrading'] = 'Snel beoordelen';
$string['quickgrading_help'] = '<p>Snel beoordelen voegt een tekstveld toe aan elke beoordelingscel op het rapportagescherm, waarmee je tegelijk de feedback kunt geven voor een heel aantal beoordelingen tegelijk. Je kunt dan op de Aanpassen-knop klikken om al deze wijzigingen in één keer door te voeren i.p.v. één voor één.</p>';
$string['range'] = 'Marge';
$string['rangedecimals'] = 'Bereik decimale cijfers';
$string['rangedecimals_help'] = 'Het aantal te tonen decimale cijfers voor bereik';
$string['rangesdecimalpoints'] = 'Aantal decimalen in marges';
$string['rangesdecimalpoints_help'] = '<p>Specifieerd het aantal decimalen die voor elke marge getoond worden. Deze instelling kan overschreven worden per beoordelingsitem.</p>';
$string['rangesdisplaytype'] = 'Hoe marges tonen';
$string['rangesdisplaytype_help'] = '<p>Specifieerd hoe marges getoond moeten worden. Als je voor overerven kiest, dan wordt dit type voor elke kolom gebruikt.</p>';
$string['rank'] = 'Ranglijst';
$string['rawpct'] = 'Ruw %';
$string['real'] = 'Echt';
$string['realletter'] = 'Reëel (letter)';
$string['realpercentage'] = 'Reëel (percentage)';
$string['recovergradesdefault'] = 'Standaard herstel cijfers';
$string['recovergradesdefault_help'] = 'Herstel als standaardinstelling oude cijfers bij het opnieuw aanmelden in een cursus.';
$string['regradeanyway'] = 'Cijfers toch opnieuw berekenen';
$string['removeallcoursegrades'] = 'Verwijder alle cijfers';
$string['removeallcourseitems'] = 'Verwijder alle items en categorieën';
$string['report'] = 'Rapport';
$string['reportdefault'] = 'Rapportvoorbeeld ({$a})';
$string['reportplugins'] = 'Rapportplugins';
$string['reportsettings'] = 'Rapportinstellingen';
$string['reprintheaders'] = 'Koppen herhalen';
$string['respectingcurrentdata'] = 'huidige configuratie wordt niet aangepast';
$string['rowpreviewnum'] = 'Voorbeeld rijen';
$string['savechanges'] = 'Bewaar wijzigingen';
$string['savepreferences'] = 'Bewaar instellingen';
$string['scaleconfirmdelete'] = 'Ben je er zeker van dat je schaal \'{$a}\' wil verwijderen?';
$string['scaledpct'] = 'Procentuele schaal';
$string['seeallcoursegrades'] = 'Bekijk alle cursuscijfers';
$string['select'] = 'Selecteer {$a}';
$string['selectalloroneuser'] = 'Selecteer alle of één gebruiker';
$string['selectauser'] = 'Kies een gebruiker';
$string['selectdestination'] = 'Selecteer bestemming voor {$a}';
$string['separator'] = 'Scheidingsteken';
$string['sepcolon'] = 'Dubbele punt';
$string['sepcomma'] = 'Komma';
$string['sepsemicolon'] = 'Kommapunt';
$string['septab'] = 'Tabulatie';
$string['setcategories'] = 'Categorieën instellen';
$string['setcategorieserror'] = 'Je moet eerst de categorieën voor je cursus instellen voor je er wegingen kan aan geven.';
$string['setgradeletters'] = 'Letterbeoordeling instellen';
$string['setpreferences'] = 'Voorkeuren instellen';
$string['setting'] = 'Instelling';
$string['settings'] = 'Instellingen';
$string['setweights'] = 'Wegingen instellen';
$string['showactivityicons'] = 'Toon icoontjes voor activiteiten';
$string['showactivityicons_help'] = '<p>Moeten de activiteiten-icoontjes naast de activiteitennamen getoond worden?</p>';
$string['showallhidden'] = 'Toon verborgen';
$string['showallstudents'] = 'Toon alle leerlingen';
$string['showanalysisicon'] = 'Toon cijferanalyse icoontje';
$string['showanalysisicon_desc'] = 'Toon standaard het icoontje voor cijferanalyse. Als de activiteitsmodule dit ondersteund, dan zal het cijferanalyse icoontje linken naar een pagina met meer gedetailleerde informatie over het cijfer en hoe dat verkregen is.';
$string['showanalysisicon_help'] = 'Als de activiteitsmodule het ondersteunt, dan zal het cijferanalyse icoontje naar een pagina linken die meer informatie geeft over het cijfer en hoe het verkregen is.';
$string['showaverage'] = 'Toon gemiddelde';
$string['showaverage_help'] = 'Toon gemiddelde kolom? Leerlingen kunnen de cijfers van andere leerlingen schatten als het gemiddelde uit een klein aantal cijfers berekend wordt. Voor performantieredenen is het gemiddelde benarderd als het afhankelijk is van verborgen items.';
$string['showaverages'] = 'Toon kolomgemiddelden';
$string['showaverages_help'] = 'Toon kolomgemiddeldes op het rapport';
$string['showcalculations'] = 'Toon berekeningen';
$string['showcalculations_help'] = 'Of er berekeningsicoontjes getoond moeten worden naast elk beoordelingsitem en categorie, tooltips over berekende items en een visuele indicator wanneer een kolom berekend is.';
$string['showeyecons'] = 'Toon toon/verberg-icoontjes';
$string['showeyecons_help'] = 'Of er een toon/verberg icoontje getoond moet worden naast elk cijfer (waarmee de zichtbaarheid voor de gebruiker ingesteld kan worden.';
$string['showfeedback'] = 'Toon feedback';
$string['showfeedback_help'] = 'Toon de feedbackkolom?';
$string['showgrade'] = 'Toon cijfers';
$string['showgrade_help'] = 'Toon de cijferkolom?';
$string['showgroups'] = 'Toon groepen';
$string['showhiddenitems'] = 'Toon verborgen items';
$string['showhiddenitems_help'] = 'Of verborgen items in een rapport volledig verborgen zijn of enkel de cijfers verborgen zijn en de naam niet.

* Toon verborgen - Namen van verborgen beoordelingsitems worden getoond, maar de cijfers zijn verborgen
* Enkel verborgen tot - Beoordelingsitems met een "verborgen tot"-datum ingesteld, zijn volledig verborgen tot de ingestelde datum. Daarna wordt het hele item getoond.
* Niet tonen - Verborgen items zijn volledig verborgen';
$string['showhiddenuntilonly'] = 'Verborgen tot';
$string['showlettergrade'] = 'Toon letterbeoordelingen';
$string['showlettergrade_help'] = 'Toon de letterbeoordelingskolom?';
$string['showlocks'] = 'Toon blokkeringen';
$string['showlocks_help'] = 'Of er een blokkeer/vrijgeven icoontje getoond moet worden naast elke beoordeling.';
$string['shownohidden'] = 'Niet tonen';
$string['shownooutcomes'] = 'Verberg competenties';
$string['shownumberofgrades'] = 'Toon het aantal cijfers in gemiddelden';
$string['shownumberofgrades_help'] = 'Toont het aantal cijfers dat geaggregeerd wordt tussen haakjes naast elk gemiddelde. Voorbeeld 45(34)';
$string['showonlyactiveenrol'] = 'Toon enkel actieve aanmeldingen';
$string['showonlyactiveenrol_help'] = 'Deze instelling bepaalt of enkel actieve aangemelde gebruikers in het puntenboek zullen verschijnen. Indien ingeschakeld zullen geschorste gebruikers niet verschijnen.';
$string['showpercentage'] = 'Toon percentage';
$string['showpercentage_help'] = 'Het percentage van elk beoordelingsitem tonen?';
$string['showquickfeedback'] = 'Toon formulier voor snelle feedback';
$string['showquickfeedback_help'] = 'Snelle feedback voegt een element voor tekstinvoer toe aan elke cel op het rapportagescherm, waardoor je snel de feedback kunt wijzigen voor veel cijfers tegelijk. Je kunt dan op de Update-knop klikken om al deze wijzigingen in één keer door te voeren.';
$string['showrange'] = 'Toon bereik';
$string['showrange_help'] = 'Toon de bereik kolom?';
$string['showranges'] = 'Toon marges';
$string['showranges_help'] = 'Toon een rij met de mogelijke marges voor elk beoordelingsitem in het rapport.';
$string['showrank'] = 'Toon ranglijst';
$string['showrank_help'] = 'Toon de positie van de leerling in relatie tot de rest van de klas voor elk beoordelingsitem?';
$string['showuserimage'] = 'Toon gebruikersprofielafbeeldingen';
$string['showuserimage_help'] = 'Of de afbeelding van het gebruikersprofiel naast de naam moet getoond worden op het rapport.';
$string['showverbose'] = 'Toon {$a->category} {$a->itemmodule} {$a->itemname}';
$string['showweight'] = 'Toon wegingen';
$string['showweight_help'] = 'Toon de cijfer wegingskolom?';
$string['simpleview'] = 'Eenvoudig overzicht';
$string['sitewide'] = 'Voor heel de site';
$string['sort'] = 'Sorteer';
$string['sortasc'] = 'Sorteer stijgend';
$string['sortbyfirstname'] = 'Sorteer op voornaam';
$string['sortbylastname'] = 'Sorteer op achternaam';
$string['sortdesc'] = 'Sorteer dalend';
$string['standarddeviation'] = 'Standaarddeviatie';
$string['stats'] = 'Statistieken';
$string['statslink'] = 'Statistieken';
$string['student'] = 'Leerling';
$string['studentsperpage'] = 'Aantal leerlingen per pagina';
$string['studentsperpage_help'] = 'Het aantal leerlingen dat op één pagina van het rapport getoond wordt.';
$string['studentsperpagereduced'] = 'Het maximale aantal getoonde leerlingen per pagina is verminderd van {$a->originalstudentsperpage} tot {$a->studentsperpage}. Overweeg om je PHP-instelling  max_input_vars te verhogen van {$a->maxinputvars}.';
$string['subcategory'] = 'Normale categorie';
$string['submissions'] = 'Inzendingen';
$string['submittedon'] = 'Ingezonden: {$a}';
$string['switchtofullview'] = 'Schakel naar volledig overzicht';
$string['switchtosimpleview'] = 'Schakel naar eenvoudig overzicht';
$string['tabs'] = 'Tabbladen';
$string['topcategory'] = 'Topcategorie';
$string['total'] = 'Totaal';
$string['totalweight100'] = 'Het totaalgewicht is 100';
$string['totalweightnot100'] = 'Het totaalgewicht is verschillend van 100';
$string['turnfeedbackoff'] = 'Feedback uitschakelen';
$string['turnfeedbackon'] = 'Feedback inschakelen';
$string['typenone'] = 'Geen';
$string['typescale'] = 'Schaal';
$string['typescale_help'] = '<p>Wanneer het schaal beoordelingstype kiest, kun je een schaal kiezen. De schaal voor een Moodle-activiteit gebaseerde beoording kun je kiezen op de instellingspagina van de activiteit.</p>';
$string['typetext'] = 'Text';
$string['typevalue'] = 'Waarde';
$string['uncategorised'] = 'Zonder categorie';
$string['unchangedgrade'] = 'Beoordeling ongewijzigd';
$string['unenrolledusersinimport'] = 'In deze import zaten cijfers voor gebruikers die niet in de cursus aangemeld zijn: {$a}';
$string['unlimitedgrades'] = 'Onbeperkte cijfers';
$string['unlimitedgrades_help'] = 'Standaard worden cijfers beperkt door de minimum- en de maximumwaarden van het beoordelingsitem. Door deze instelling in te schakelen verwijder je deze limiet en laat je toe om cijfers boven de 100% in het puntenboek te zetten. Aangeraden wordt om deze instelling te wijzigen bij een lage belasting omdat alle cijfers herberekend zullen worden wat een hoge serverbelasting kan veroorzaken.';
$string['unlock'] = 'deblokkeer';
$string['unlockverbose'] = '{$a->category} {$a->itemmodule} {$a->itemname} vrijgeven';
$string['unused'] = 'Ongebruikt';
$string['updatedgradesonly'] = 'Exporteer enkel nieuwe of gewijzigde cijfers';
$string['uploadgrades'] = 'Beoordelingen uploaden';
$string['useadvanced'] = 'Gebruik geavanceerde mogelijkheden';
$string['usedcourses'] = 'Gebruikte cursussen';
$string['usedgradeitem'] = 'Gebruikt beoordelingsitem';
$string['usenooutcome'] = 'Gebruik geen competentie';
$string['usenoscale'] = 'Gebruik geen schaal';
$string['usepercent'] = 'Gebruik procent';
$string['user'] = 'Gebruiker';
$string['userenrolmentsuspended'] = 'Aanmelding gebruiker geschorst';
$string['usergrade'] = 'Gebruiker {$a->fullname} ({$a->useridnumber}) op item {$a->gradeidnumber}';
$string['userid'] = 'GebruikersID';
$string['usermappingerror'] = 'Fout in het koppelen van gebruikers: kon geen gebruiiker vinden met {$a->field} gelijk aan "{$a->value}".';
$string['usermappingerrorcurrentgroup'] = 'Gebruiker is geen lid van huidige groep.';
$string['usermappingerrorusernotfound'] = 'Probleem met koppelen van van gebruiker. Kon gebruiker niet vinden.';
$string['userpreferences'] = 'Gebruikersvoorkeuren';
$string['useweighted'] = 'Gebruik weging';
$string['verbosescales'] = 'Schalen tonen';
$string['viewbygroup'] = 'Groep';
$string['viewgrades'] = 'Bekijk cijfers';
$string['warningexcludedsum'] = 'Waarschuwing: het uitsluiten van cijfers is niet compatibel met som-aggregatie.';
$string['weight'] = 'weging';
$string['weightcourse'] = 'Gebruik gewogen cijfers voor de cursus';
$string['weightedascending'] = 'Sorteer oplopend gewogen procent';
$string['weighteddescending'] = 'Sorteer aflopend gewogen procent';
$string['weightedpct'] = 'gewogen %';
$string['weightedpctcontribution'] = 'gewogen % bijdrage';
$string['weightorextracredit'] = 'Weging of bonus';
$string['weights'] = 'Wegingen';
$string['weightsedit'] = 'Bewerk weging en bonus';
$string['weightuc'] = 'Weging';
$string['writinggradebookinfo'] = 'Instelling cijferlijst wegschrijven';
$string['xml'] = 'XML';
$string['yes'] = 'Ja';
$string['yourgrade'] = 'Jouw cijfer';
