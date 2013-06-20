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
 * Strings for component 'grades', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   grades
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activities'] = 'Aktiviteter';
$string['addcategory'] = 'Lägg till en kategori';
$string['addcategoryerror'] = 'Det gick inte att lägga till en kategori';
$string['addexceptionerror'] = 'Ett fel inträffade när ett undantag lades till för användarid:betygselement';
$string['addfeedback'] = 'Lägg till återkoppling';
$string['addgradeletter'] = 'Lägg till ett bokstavsbetyg';
$string['addidnumbers'] = 'Lägg till id-nummer';
$string['additem'] = 'Lägg till betygskomponent';
$string['addoutcome'] = 'Lägg till ett resultat';
$string['addoutcomeitem'] = 'Lägg till resultatkomponent';
$string['addscale'] = 'Lägg till en skala';
$string['aggregateextracreditmean'] = 'Medelbetyg (med extra tillgodoräknanden)';
$string['aggregatemax'] = 'Högsta betyget';
$string['aggregatemean'] = 'Medelbetyg';
$string['aggregatemedian'] = 'Medianvärde för betyg';
$string['aggregatemin'] = 'Lägsta betyg';
$string['aggregatemode'] = 'Typ av betyg';
$string['aggregateonlygraded'] = 'Aggregera bara icke-tomma betyg';
$string['aggregateonlygraded_help'] = '<p>Icke-existerande betyg behandlas antingen som minimibetyg eller så tas de inte med i aggregationen. </p>';
$string['aggregateoutcomes'] = 'Ta med resultaten i aggregeringen.';
$string['aggregateoutcomes_help'] = '<p>Om du tar med resultaten i aggregationerna så är det inte säkert att det leder till det önskade sammanfattningsbetyget och därför har du valmöjligheten att ta med dem eller att utelämna dem. </p>';
$string['aggregatesonly'] = 'Endast aggregeringar';
$string['aggregatesubcats'] = 'Aggregera och inkludera underkategorier';
$string['aggregatesubcats_help'] = '<p>Vanligtvis så genomförs aggregationen bara med omedelbara barn men det är även möjligt att aggregera betyg i alla underkategorier samtidigt som man undantar alla andra aggregerade betyg.  </p>';
$string['aggregatesum'] = 'Summan av alla betyg';
$string['aggregateweightedmean'] = 'Viktat medelbetyg';
$string['aggregateweightedmean2'] = 'Enkelt vägt medelbetyg';
$string['aggregation'] = 'Aggregering';
$string['aggregationcoef'] = 'Koefficient för aggregering';
$string['aggregationcoefextra'] = 'Extra tillägg';
$string['aggregationcoefextrasum'] = 'Extra tillägg';
$string['aggregationcoefextrasum_help'] = '<p>Extra tillgodoräknande för den här betygskomponenten under aggregation.</p>';
$string['aggregationcoefextraweight'] = 'Vikt på extra tillägg';
$string['aggregationcoefextraweight_help'] = '<p>Extra tillgodoräknande för den här betygskomponenten under aggregation.</p>';
$string['aggregationcoefweight'] = 'Vikt för komponent';
$string['aggregationcoefweight_help'] = '<p>Den viktning som tillämpas på alla betyg i den här betygskomponenten under aggregation med andra betygskomponenter.</p>';
$string['aggregation_help'] = '<p>Den här menyn gör det möjligt för dig att välja vilken strategi för aggregering som ska användas för att beräkna varje deltagares övergripande betyg för den här kategorin.
De olika alternativen förklarar vi här nedan:</p>

<p>Betygen omvandlas först till värden i procent (i intervall från 0 till 1, detta kallas normalisation), sedan aggregeras de med hjälp av en av funktionerna här nedan och slutligen omvandlas de i förhållande till spännvidden för komponenten tillhörande den associerade kategorin (mellan <em>minimibetyget</em> och <em>maxbetyget</em>).</p>

<p><strong>Viktigt!</strong><br /> Ett tomt fält för betyg innebär bara att det saknas en inmatning i betygskatalogen. Detta kan betyda lite olika saker. Det kan t.ex. vara det att en student/elev/deltagare/lärande ännu inte har skickat in en viss uppgift; det kan röra sig om en inskickad uppgift som ännu inte har blivit betygssatt av läraren eller ett betyg som har tagits bort manuellt av den som administrerar betygskatalogen. Du bör alltså iaktta viss försiktighet när du tolkar vad dessa \'tomma betyg\' egentligen innebär. </p>

<dl id="grade-aggregation-help">
    <dt>Medelbetyg</dt>
    <dd>Summan av alla betyg dividerat med det totala antalet betyg.</dd>
    <dd class="example">A1 70/100, A2 20/80, A3 10/10, kategori max 100:<br />
                     <code>(0.7 + 0.25 + 1.0)/3 = 0.65 --> 65/100</code></dd>

    <dt>Viktat medel</dt>
        <dd>Varje betygskomponent kan tilldelas en viktning som sedan används för den aritmetiska medelvärdes-aggregering som syftar till att påverka den betydelse som varje komponent ska ha i det övergripande medelvärdet. </dd>
        <dd class="example">A1 70/100 weight 10, A2 20/80 weight 5, A3
                         10/10 weight 3, kategori max 100:<br /><code>(0.7*10 + 0.25*5 + 1.0*3)/18 = 0.625 --> 62.5/100</code></dd>

    <dt>Enkelt viktat medelvärde</dt>
        <dd>Skillnaden i förhållande till <em>Viktat medelvärde</em> är den att viktningen beräknas som <em>maxbetyg</em> - <em>minimibetyg</em>
                         för varje komponent. En uppgift på 100 poäng har en viktning på 100 , en uppgift på 10 poäng har en viktning på 10.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, kategori max 100:<br />
                         <code>(0.7*100 + 0.25*80 + 1.0*10)/190 = 0.526 --> 52.6/100</code></dd>

    <dt>Medelvärde för betyg (med extra tillgodoräknanden)</dt>
        <dd>Aritmetiskt medelvärde med ett tillägg. Detta är en gammal typ av aggregation som inte längre stödjs. Den finns med här endast p.g.a. behovet av bakåtkompatibilitet.</dd>

    <dt>Medianvärde för betyg</dt>
        <dd>Det mittersta betyget (eller medelvärdet av de två mittersta betygen) när betygen har arrangerats efter storlek. Fördelen med detta i förhållande till medelvärdet är att det inte påverkas av undantagsvärden (betyg som ligger extremt långt från medelvärdet).</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, kategori max 100:<br />
                         <code>0.7 + 0.25 + 1.0 --> 0.25 --> 25/100</code></dd>

    <dt>Minsta betyget</dt>
        <dd>Resultatet är det minsta betyget efter normalisation. Det används vanligen i kombination med <em>Aggregera bara icke-tomma betyg</em>.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, kategori max 100:<br />
                         <code>min(0.7 + 0.25 + 1.0) = 0.25 --> 25/100</code></dd>

    <dt>Högsta betyget</dt>
        <dd>Resultatet är det högsta betyget efter normalisation.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, category max 100:<br />
                         <code>max(0.7 + 0.25 + 1.0) = 1.0 --> 100/100</code></dd>

    <dt>"Mode" för betyg</dt>
        <dd>"Mode" är det betyg som är det vanligaste. Det används mer ofta för icke-numeriska betyg. Fördelen jämfört med medelvärdet är att det inte påverkas av undantagsvärden.                         (betyg som ligger extremt långt från medelvärdet).
                        Detta förlorar dock sin mening så fort det finns mer än ett betyg som är det vanligaste (det är bara ett som används), eller när alla betyg skiljer sig från varandra.</dd>
        <dd class="example">A1 70/100, A2 35/50, A3 20/80, A4 10/10, A5 7/10 kategori max 100:<br />
                         <code>mode(0.7; 0.7; 0.25; 1.0; 0.7) = 0.7 --> 70/100</code></dd>

    <dt>Summan av betygen</dt>
        <dd>Summan av alla betygsvärden. Ingen hänsyn tas till betyg i skalor. Detta är den enda  typen som inte omvandlar betygen till procentvärden internt (normalisation). <em>Maxbetyget</em> på en associerad komponent i en kategori beräknas automatiskt som en summa av max från alla aggregerade komponenter.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10:<br />
                         <code>70 + 20 + 10 = 100/190</code></dd>
</dl>';
$string['aggregationposition'] = 'Position för aggregering';
$string['aggregationposition_help'] = '<p>Detta definierar vilken position aggregationens kolumn för totalsumman ska ha i rapporten i förhållande till de betyg som aggregeras.</p>';
$string['aggregationsvisible'] = 'Tillgängliga typer av aggregation';
$string['aggregationsvisiblehelp'] = 'Välj alla typer av aggregation som ska finnas tillgängliga. Håll ner Ctrk-tangenten för att välja flera alternativ.';
$string['allgrades'] = 'Alla betyg/omdömen enligt kategori';
$string['allstudents'] = 'Alla studenter/elever/deltagare/lärande';
$string['allusers'] = 'Alla användare';
$string['autosort'] = 'Sortera automatiskt';
$string['availableidnumbers'] = 'Tillgängliga id-nummer';
$string['average'] = 'Medelvärde';
$string['averagesdecimalpoints'] = 'Decimaler i medelvärde i kolumner';
$string['averagesdecimalpoints_help'] = '<p>Detta anger det antal decimaler som ska visas för varje medelvärde för kolumn. Om du har valt Ärv så kommer visningstypen för varje kolumn att visas.</p>';
$string['averagesdisplaytype'] = 'Visningstyp för medelvärde i kolumner';
$string['averagesdisplaytype_help'] = '<p>Detta specificerar hur medelvärdet för varje kolumn ska visas. Om du väljer Ärv så kommer visningstypen för varje kolumn att användas.</p>';
$string['backupwithoutgradebook'] = 'Säkerhetskopieringen innehåller inte konfigurering av Betygskatalogen.';
$string['badgrade'] = 'Det betyg som har avgivits är ogiltigt';
$string['badlyformattedscale'] = 'Ange en kommaseparerad lista med värden (minst två värden krävs).';
$string['baduser'] = 'Den användare som har lagts till är ogiltig';
$string['bonuspoints'] = 'Bonuspoäng';
$string['bulkcheckboxes'] = 'Kryssrutor för bulk';
$string['calculatedgrade'] = 'Kalkylerat betyg/omdöme';
$string['calculation'] = 'Beräkning';
$string['calculationadd'] = 'Lägg till beräkning';
$string['calculationedit'] = 'Redigera beräkning';
$string['calculationsaved'] = 'Beräkningen har sparats';
$string['calculationview'] = 'Visa beräkning';
$string['cannotaccessgroup'] = 'Det går tyvärr inte att få tillgång till betyg/omdömen för den valda gruppen.';
$string['categories'] = 'Kategorier';
$string['categoriesanditems'] = 'Kategorier och komponenter';
$string['categoriesedit'] = 'Redigera kategorier och komponenter';
$string['category'] = 'Kategori';
$string['categoryedit'] = 'Redigera kategori';
$string['categoryname'] = 'Namn på kategori';
$string['categorytotal'] = 'Summa av kategori';
$string['categorytotalfull'] = 'Fulla {$a->category} ';
$string['categorytotalname'] = 'Fullt namn på kategori';
$string['changedefaults'] = 'Ändra standardvärdena';
$string['changereportdefaults'] = 'Ändra standardvärdena för rapport';
$string['chooseaction'] = 'Välj en åtgärd...';
$string['choosecategory'] = 'Välj kategori';
$string['combo'] = 'Tabbar och nedrullningsmeny';
$string['compact'] = 'Kompakt';
$string['componentcontrolsvisibility'] = 'Huruvida denna betygskomponent döljs styrs av aktivitetens inställningar.';
$string['contract'] = 'Kategori av kontrakt';
$string['controls'] = 'Kontroller';
$string['courseavg'] = 'Medelbetyg för kurs';
$string['coursegradecategory'] = 'Kategori för kursbetyg';
$string['coursegradedisplaytype'] = 'Visningstyp för kursbetyg';
$string['coursegradedisplayupdated'] = 'Visningstypen för kursbetyg har uppdaterats.';
$string['coursegradesettings'] = 'Inställningar för kursbetyg/omdömen';
$string['coursename'] = 'Namn på kurs';
$string['coursescales'] = 'Skalor för kurs';
$string['coursesettings'] = 'Inställningar för kurs';
$string['coursetotal'] = 'Samlat resultat på kurs';
$string['createcategory'] = 'Skapa kategori';
$string['createcategoryerror'] = 'Det gick inte att skapa någon ny kategori';
$string['creatinggradebooksettings'] = 'Skapar inställningar för betygskatalog';
$string['csv'] = 'CSV';
$string['currentparentaggregation'] = 'Aktuell aggregation för förälder';
$string['curveto'] = 'Kurva till';
$string['decimalpoints'] = 'Övergripande decimaler';
$string['decimalpoints_help'] = '<p>Detta specificerar det antal decimaler som ska visas för varje betyg. Den här inställningen har ingen inverkan på beräkningen av betyg eftersom den utförs med en precision av 5 decimaler.</p>';
$string['default'] = 'Förinställt standardvärde';
$string['defaultprev'] = 'Förvalt standardvärde ({$a})';
$string['deletecategory'] = 'Ta bort kategori';
$string['disablegradehistory'] = 'Avaktivera betygshistorik';
$string['disablegradehistory_help'] = 'Avaktivera spårning av ändringshistorik i betygsrelaterade tabeller. Detta kan snabba upp servern lite och bevara utrymme i databasen.';
$string['displaylettergrade'] = 'Visa bokstavsbetyg';
$string['displaypercent'] = 'Visa procent';
$string['displaypoints'] = 'Visa poäng';
$string['displayweighted'] = 'Visa viktade betyg/omdömen';
$string['dropdown'] = 'Nedrullningsmeny';
$string['droplow'] = 'Ignorera de lägsta';
$string['droplow_help'] = '<p>Om detta är aktiverat, så kommer de X lägsta betygen att undantas från beräkningen. X är det valda värdet för det här alternativet.</p>';
$string['dropped'] = 'Inte inkluderad';
$string['dropxlowest'] = 'Ta inte med X lägsta';
$string['dropxlowestwarning'] = 'OBS! Om Du använder Dig av \'Ta inte med X lägsta\' så innebär det att alla enheter i den kategorin har samma värde i poäng räknat. Om poängtalen varierar så kommer resultaten att bli oförutsägbara.';
$string['duplicatescale'] = 'Dubblera skala';
$string['edit'] = 'Redigera';
$string['editcalculation'] = 'Redigera beräkning';
$string['editcalculationverbose'] = 'Redigera beräkning för  {$a->category} {$a->itemmodule} {$a->itemname}';
$string['editfeedback'] = 'Redigera återkoppling';
$string['editgrade'] = 'Redigera betyg';
$string['editgradeletters'] = 'Redigera bokstavsbetyg';
$string['editoutcome'] = 'Redigera resultat';
$string['editoutcomes'] = 'Redigera resultat';
$string['editscale'] = 'Redigera skala';
$string['edittree'] = 'Kategorier och komponenter';
$string['editverbose'] = 'Redigera {$a->category} {$a->itemmodule} {$a->itemname}';
$string['enableajax'] = 'Aktivera AJAX';
$string['enableajax_help'] = 'Detta lägger till ett lager av AJAX-funktionalitet till betygsrapporten, vilket förenklar och snabbar på vanliga operationer. Detta förutsätter att JavaScript är aktiverat i användarens webbläsare.';
$string['enableoutcomes'] = 'Aktivera resultat';
$string['enableoutcomes_help'] = 'Stöd för Resultat (också benämnt kompetenser, mål, standarder och kriterier) betyder att vi kan betygssätta saker som använder en eller flera skalor som är kopplade till krav på resultat. Om detta är aktiverat så möjliggör det sådan betygssättning av specialtyp över hela webbplatsen.';
$string['encoding'] = 'Kodning';
$string['errorcalculationnoequal'] = 'Formler måste inledas med likhetstecken (=1+2)';
$string['errorcalculationunknown'] = 'Ogiltig formel';
$string['errorgradevaluenonnumeric'] = 'Fick icke-numerisk för lågt eller högt betyg för';
$string['errornocalculationallowed'] = 'Det är inte tillåtet med beräkningar av den här komponenten.';
$string['errornocategorisedid'] = 'Det gick inte att hämta något icke-kategoriserat id!';
$string['errornocourse'] = 'Det gick inte att hitta någon information om kurs';
$string['errorreprintheadersnonnumeric'] = 'Fick ett icke-numeriskt värde för skriv-ut-igen-rubriker';
$string['errorsavegrade'] = 'Det gick tyvärr inte att spara betyg/omdöme.';
$string['excluded'] = 'Utesluten';
$string['excluded_help'] = '<p>Om - undantagen - är aktiverat så kommer det här betyget att undantas från varje aggregering som utförs av vilken förälder som helst till en betygskomponent eller kategori.</p>';
$string['expand'] = 'Expandera kategori';
$string['export'] = 'Exportera';
$string['exportalloutcomes'] = 'Exportera alla resultat';
$string['exportfeedback'] = 'Ta med återkoppling i export';
$string['exportonlyactive'] = 'Kräver aktiv registrering';
$string['exportplugins'] = 'Exportera \'plugin\'-program';
$string['exportsettings'] = 'Exportera inställningar';
$string['exportto'] = 'Exportera till';
$string['extracreditwarning'] = 'OBS! Om Du ställer in alla enheter i en kategori till \'Extra tillgodoräknande\' så kommer det att effektivt ta bort dem från beräkningen av betyg/omdömen. Detta eftersom det inte kommer att bli någon totalsumma för poäng.';
$string['feedback'] = 'Återkoppling';
$string['feedbackadd'] = 'Lägg till återkoppling';
$string['feedbackedit'] = 'Redigera återkoppling';
$string['feedback_help'] = '<p>Detta är anteckningar som (distans)läraren lägger till betyget. Det kan vara omfattande, individualiserad återkoppling eller en enkel kod som hänvisar till ett internt system för återkoppling.</p>';
$string['feedbacksaved'] = 'Återkoppling sparad';
$string['feedbackview'] = 'Visa återkoppling';
$string['finalgrade'] = 'Slutbetyg';
$string['finalgrade_help'] = '<p>Det slutliga betyget (cachat) efter det att alla beräkningar har genomförts.</p>';
$string['fixedstudents'] = 'Statisk kolumn för studenter/elever/deltagare/lärande';
$string['fixedstudents_help'] = 'Tillåt betyg att scrollas horisontellt utan att tappa översikt över elevkolunmen genom att göra den statisk.';
$string['forceoff'] = 'Tvinga: På';
$string['forceon'] = 'Tvinga: Av';
$string['forelementtypes'] = 'för den markerade {$a}';
$string['forstudents'] = 'För studenter/elever/deltagare/lärande';
$string['full'] = 'Fullständig';
$string['fullmode'] = 'Fullständig vy';
$string['fullview'] = 'Full vy';
$string['generalsettings'] = 'Generella inställningar';
$string['grade'] = 'Betyg';
$string['gradeadministration'] = 'Administration av betyg/omdömen';
$string['gradeanalysis'] = 'Betygsanalys';
$string['gradebook'] = 'Betygskatalog';
$string['gradebookhiddenerror'] = 'Betygskatalogen är f.n. inställd till att dölja allt för studenterna/eleverna/deltagarna/de lärande.';
$string['gradebookhistories'] = 'Historik för betyg';
$string['gradeboundary'] = 'Gräns för bokstavsbetyg';
$string['gradeboundary_help'] = '<h1Betygsgräns</h1>
<p>Detta är en gräns i form av i procent. Om den överskrids så kommer betygen att uttryckas som bokstäver. (detta om visningstypen för bokstavsbetyg används). </p>';
$string['gradecategories'] = 'Betygskategorier';
$string['gradecategory'] = 'Betygskategori';
$string['gradecategoryonmodform'] = 'Betygskategori';
$string['gradecategoryonmodform_help'] = 'Denna inställning bestämmer under vilken kategori som denna aktivitetens betyg placeras i betygsrapporten.';
$string['gradecategorysettings'] = 'Inställningar för betygskategori';
$string['gradedisplay'] = 'Visning av betyg';
$string['gradedisplaytype'] = 'Visningstyp för betyg';
$string['gradedisplaytype_help'] = '<p>Detta anger hur betyg ska visas i betygssättaren och i användarrapporter. Betyg kan visas som faktiska betyg, som procenttal (i förhållande till till minimi- och maxbetygen) eller som bokstäver.</p>';
$string['gradedon'] = 'Betygssatt {$a}';
$string['gradeexport'] = 'Export av betyg/omdömen';
$string['gradeexportdecimalpoints'] = 'Decimaler för exporterade betyg';
$string['gradeexportdecimalpoints_desc'] = 'Antalet decimaler att visa i samband med export. Detta kan överskridas under export.';
$string['gradeexportdisplaytype'] = 'Visningstyp för exporterade betyg';
$string['gradeexportdisplaytype_desc'] = 'Betyg kan visas som heltal, som procenttal (i förhållande till minimi- och maxbetyg) eller som bokstäver  (A, B, C etc..) under export. Detta kan överskridas under export.';
$string['gradeforstudent'] = '{$a->student}<br />{$a->item}{$a->feedback}';
$string['gradehelp'] = 'Hjälp angående betyg/omdömen';
$string['gradehistorylifetime'] = 'Livscykel för betygshistorik';
$string['gradehistorylifetime_help'] = 'Detta anger hur länge du vill att ändringshistoriken ska finnas kvar när det gäller betygsrelaterade tabeller. Det bästa är att behålla detta så länge det går. Om du';
$string['gradeimport'] = 'Import av betyg/omdöpmen';
$string['gradeitem'] = 'Komponent för betyg/omdöme';
$string['gradeitemaddusers'] = 'Ta inte med i betyg/omdöme';
$string['gradeitemadvanced'] = 'Avancerade alternativ för betygskomponent';
$string['gradeitemadvanced_help'] = 'Markera alla komponenter som bör visas som avancerade när du redigerar betygskomponenter';
$string['gradeitemislocked'] = 'Den här aktivitieten är låst av betygskatalogen. Ändringar som görs på betyg i den här aktiviteten kommer inte att kopieras till betygskatalogen förrän den har låsts upp.';
$string['gradeitemlocked'] = 'Betygssättning är låst';
$string['gradeitemmembersselected'] = 'Inte med i betyg/omdöme';
$string['gradeitemnonmembers'] = 'Med i betyg/omdöme';
$string['gradeitemremovemembers'] = 'Ta med i betyg/omdöme';
$string['gradeitems'] = 'Komponent för betyg/omdömen';
$string['gradeitemsettings'] = 'Inställningar för betygskomponent';
$string['gradeitemsinc'] = 'Betygskoponenter som ska tas med';
$string['gradeletter'] = 'Bokstav för betyg/omdöme';
$string['gradeletter_help'] = '<p>En bokstav eller någon annan symbol kan användas för att representera betyg enligt en skala.</p>';
$string['gradeletternote'] = 'För att ta bort en bokstav för betyg/omdöme så tömmer Du bara vilken som helst av de<br />tre textrutorna på den bokstaven och bekräftar.';
$string['gradeletters'] = 'Bokstavsbetyg';
$string['gradelocked'] = 'Betyg är låst';
$string['gradelong'] = '{$a->grade} / {$a->max}';
$string['grademax'] = 'Maxbetyg';
$string['grademax_help'] = '<p>När du använder en betygstyp som värderar, så kan du ställa in ett maxbetyg. Maxbetyget för en aktivitetsbaserad betygskomponent ställer du in på sidan för att uppdatera aktiviteten. </p>';
$string['grademin'] = 'Minimibetyg';
$string['grademin_help'] = 'När du använder en betygstyp som värderar, så kan du ställa in ett minimibetyg. Minimibetyget för en aktivitetsbaserad betygskomponent ställer du in på sidan för att uppdatera aktiviteten.';
$string['gradeoutcomeitem'] = 'Komponent för betygsresultat';
$string['gradeoutcomes'] = 'Resultat';
$string['gradeoutcomescourses'] = 'Resultat på kurs';
$string['gradepass'] = 'Betyg som krävs för godkänt';
$string['gradepass_help'] = '<p>Om en komponent har ett betyg som användarna måste uppnå eller överträffa för att få godkänt på komponenten så kan du ställa in det här.</p>';
$string['gradepreferences'] = 'Föredragna kriterier för betyg';
$string['gradepreferenceshelp'] = 'Hjälp angående inställningar för betyg/omdömen';
$string['gradepublishing'] = 'Aktivera publicering';
$string['gradepublishing_help'] = 'Aktivera publicering vid export och import: Exporterade betyg är tillgängliga via en URL. Detta utan att man måste logga in på en webbplats för Moodle. Betyg kan importeras genom att Du går via en sådan URL. Detta innebär att en webbplats för Moodle kan importera betyg som har publicerats på en annan webbplats.';
$string['gradereport'] = 'Rapport om betyg/omdömen';
$string['graderreport'] = 'Betygsrapport';
$string['grades'] = 'Betyg/omdömen';
$string['gradesforuser'] = 'Betyg/omdömen för {$a->user}';
$string['gradesonly'] = 'Endast betyg';
$string['gradessettings'] = 'Inställningar för betyg';
$string['gradetype'] = 'Typ av betyg';
$string['gradetype_help'] = '<p>Detta anger vilken typ av betyg som används: <ul><li><b>inget</b> (det går inte att sätta betyg),</li><li> <b>värde</b> (aktiverar inställningarna för max- och minimibetyg),</li><li><b> skala</b> (aktiverar inställningarna för skalor),</li><li> <b>text</b> (endast återkoppling).</li></ul> Det är bara betyg av typen värde och skala som går att aggregera. På sidan för att uppdatera aktiviteten kan du ställa in vilken typ av betyg det ska vara för en aktivitetsbaserad betygskomponent  .</p>';
$string['gradeview'] = 'Visa betyg';
$string['gradeweighthelp'] = 'Hjälp angående viktning av betyg/omdömen';
$string['groupavg'] = 'Medelbetyg för grupp';
$string['hidden'] = 'Dold';
$string['hiddenasdate'] = 'Visa datum för dolda betyg';
$string['hiddenasdate_help'] = 'Om en användare inte kan se dolda betyg visa då datum för inskickning istället för  \'-\'.';
$string['hidden_help'] = 'Om förbockat döljs betyg för elever. Ett Dölj till datum kan sättas om önskvärt för att visa betyg efter att betygssättningen är fullföljd.';
$string['hiddenuntil'] = 'Dold tills';
$string['hiddenuntildate'] = 'Dold tills: {$a}';
$string['hideadvanced'] = 'Dölj avancerade egenskaper';
$string['hideaverages'] = 'Dölj medel';
$string['hidecalculations'] = 'Dölj beräkningar';
$string['hidecategory'] = 'Dold';
$string['hideeyecons'] = 'Dölj/visa ikoner';
$string['hidefeedback'] = 'Dölj återkoppling';
$string['hideforcedsettings'] = 'Dölj framtvingade inställningar';
$string['hidegroups'] = 'Dölj grupper';
$string['hidelocks'] = 'Dölj låsningar';
$string['hidenooutcomes'] = 'Visa resultat';
$string['hidequickfeedback'] = 'Dölj snabb återkoppling';
$string['hideranges'] = 'Visa omfång';
$string['hidetotalifhiddenitems'] = 'Dölj totalresultat om den innehåller dolda delar';
$string['hidetotalifhiddenitems_help'] = 'Denna inställning specificerar om totalresultat som innehåller dolda betyg ska visas för elever eller ersättas med bindestreck (-). Om de visas kan totalen beräknas antingen med eller utan dolda delar.

Om dolda delar exkluderas kommer totalen bli annorlunda mot totalen som visas för läraren i betygsrapporten efterssom lärare alltid ser totalresultat beräknat på alla delar, dolda och ej dolda. Om dolda delar inkluderas kan elever kanske räkna ut deras värde.';
$string['hidetotalshowexhiddenitems'] = 'Visa totalresultat förutom dolda delar';
$string['hidetotalshowinchiddenitems'] = 'Visa totalresultat inklusive dolda delar';
$string['hideverbose'] = ' {Dölj {$a->category} {$a->itemmodule} {$a->itemname}';
$string['highgradeascending'] = 'Sortera enligt stigande skala för höga betyg/omdömen';
$string['highgradedescending'] = 'Sortera enligt fallande skala för höga betyg/omdömen';
$string['highgradeletter'] = 'Hög/a';
$string['identifier'] = 'Identifiera användare genom';
$string['idnumbers'] = 'Idnummer';
$string['import'] = 'Importera';
$string['importcsv'] = 'Importera CSV';
$string['importcustom'] = 'Importera som standardresultat (endast den här kursen).';
$string['importerror'] = 'Det inträffade ett fel, det här skriptet anropades inte med rätt parametrar.';
$string['importfailed'] = 'Importen misslyckades';
$string['importfeedback'] = 'Importera återkoppling';
$string['importfile'] = 'Importera fil';
$string['importfilemissing'] = 'Det gick inte att ta emot någon fil. gå tillbaka till formuläret och säkerställ att du laddar upp en giltig fil.';
$string['importfrom'] = 'Importera från';
$string['importoutcomenofile'] = 'Den upppladdade filen i tom eller skadad. Var snäll och verifiera att det här är en giltig fil. Problemet upptäcktes vid rad {$a}; detta utlöses av att dataraderna inte har lika många kolumner som den första raden (raden med rubriker) eller av att den importerade filen saknar de förväntade rubrikerna. Titta på den exporterade filen för att se ett exempel på en giltig rubrik.';
$string['importoutcomes'] = 'Resultat av import';
$string['importoutcomes_help'] = 'Resultat kan importeras via csv fil med samma format som för csv fil för exporterade resultat.';
$string['importoutcomesuccess'] = 'Importerade resultat "{$a->name}" med ID #{$a->id}';
$string['importplugins'] = 'Importera \'plugin\'-program';
$string['importpreview'] = 'Förhandsgranskning av import';
$string['importsettings'] = 'Inställningar för import';
$string['importskippednomanagescale'] = 'Du har inte tillstånd att lägga till en ny skala så resultatet "{$a}" hoppades över eftersom det krävde en ny skala.';
$string['importskippedoutcome'] = 'Ett resultat med kortnamnet "{$a}" finns redan in det här sammanhanget, det som fanns i den importerade filen hoppades över.';
$string['importstandard'] = 'Importera som standardresultat';
$string['importsuccess'] = 'Import av betyg framgångsrik';
$string['importxml'] = 'Importera XML';
$string['includescalesinaggregation'] = 'Ta med skalor i aggregering';
$string['includescalesinaggregation_help'] = 'Du kan ändra ditt val huruvida skalor ska tas med som tal i alla aggregerade betyg i alla betygskataloger i alla kurser. VARNING:om du ändrar den här inställningen så kommer alla aggregerade betyg att beräknas om.';
$string['incorrectcourseid'] = 'ID för kurs var felaktigt';
$string['incorrectminmax'] = 'Minimum måste vara lägre än maximum';
$string['inherit'] = 'Ärv';
$string['item'] = 'Komponent';
$string['iteminfo'] = 'Info om komponent';
$string['iteminfo_help'] = '<p>Det här är ett utrymme där du kan mata in information om komponenten. Den text som matas in visas inte någon annanstans.</p>';
$string['itemname'] = 'Namn på komponent';
$string['itemnamehelp'] = 'Namnet på den här komponenten som har laddats in av modulen.';
$string['items'] = 'Komponenter';
$string['itemsedit'] = 'Redigera betygskomponent';
$string['keephigh'] = 'Behåll den högsta';
$string['keephigh_help'] = 'Om detta är inställt så kommer detta alternativ endast att behålla de X högsta betygen, där X är det utvalda värdet för det här alternativet.';
$string['keymanager'] = 'Administratör av nycklar';
$string['lessthanmin'] = 'Det betyg som har matats in för {$a->itemname} för {$a->username} är lägre än minimum';
$string['letter'] = 'Bokstav';
$string['lettergrade'] = 'Bokstavsbetyg/omdöme';
$string['lettergradenonnumber'] = 'Lågt och/eller högt betyg/omdöme var icke-numeriskt för';
$string['letterpercentage'] = 'Bokstav (procent)';
$string['letterreal'] = 'Bokstav (real)';
$string['letters'] = 'Bokstäver';
$string['linkedactivity'] = 'Länkad aktivitet';
$string['linkedactivity_help'] = '<p>Det här specificerar en valfri aktivitet som den här komponenten för resultat är länkad till. Detta kan du använda för att mäta det som studenterna/eleverna/deltagarna/de lärande presterar när det gäller kriterier som inte utvärderas genom betyget på aktiviteten.</p>';
$string['linktoactivity'] = 'Länk till {$a->name} aktivitet';
$string['lock'] = 'Lås';
$string['locked'] = 'Låst';
$string['locked_help'] = 'Om förbockat kan betyg inte längre uppdateras automatiskt av den relaterade aktiviteten.';
$string['locktime'] = 'Lås efter';
$string['locktimedate'] = 'Låst efter: {$a}';
$string['lockverbose'] = 'Lås {$a->category} {$a->itemmodule} {$a->itemname}';
$string['lowest'] = 'Lägsta';
$string['lowgradeletter'] = 'Låg/a';
$string['manualitem'] = 'Manuell komponent';
$string['mapfrom'] = 'Avbilda från';
$string['mappings'] = 'Avbildningar av betygskomponenter';
$string['mapto'] = 'Avbilda till';
$string['max'] = 'Högsta';
$string['maxgrade'] = 'Max betyg/omdöme';
$string['meanall'] = 'Alla betyg';
$string['meangraded'] = 'Icke-tomma betyg';
$string['meanselection'] = 'Betyg som har valts ut för medel';
$string['meanselection_help'] = 'Markera vilka typer av betyg som ska tas med i medelvärdena på kolumnnivå. Fält som inte innehåller något betyg kan bortses från eller räknas som 0 (det sista är det förinställda värdet).';
$string['median'] = 'Medel';
$string['min'] = 'Lägsta';
$string['missingscale'] = 'Du måste välja en skala';
$string['mode'] = 'Läge';
$string['morethanmax'] = 'Betyget som har matats in för {$a->itemname} för {$a->username} är högre än maximum';
$string['moveselectedto'] = 'Flytta valda komponenter till';
$string['movingelement'] = 'Flyttar {$a}';
$string['multfactor'] = 'Multiplikator';
$string['multfactor_help'] = '<p>Faktor som används för att multiplicera alla betyg för den här betygskomponenten.</p>';
$string['mypreferences'] = 'Mina preferenser';
$string['myreportpreferences'] = 'Det jag föredrar när det gäller rapporter';
$string['navmethod'] = 'Metod för navigation';
$string['neverdeletehistory'] = 'Radera aldrig historiken';
$string['newcategory'] = 'Ny kategori';
$string['newitem'] = 'Ny komponent för betyg/omdömen';
$string['newoutcomeitem'] = 'Ny komponent för resultat';
$string['no'] = 'Ingen';
$string['nocategories'] = 'Det gick inte att hitta eller lägga till kategorier för betyg/omdömen för denna kurs';
$string['nocategoryname'] = 'Inget namn på kategori har avgivits';
$string['nocategoryview'] = 'Ingen kategori att visa med';
$string['nocourses'] = 'Det finns inga kurser ännu';
$string['noforce'] = 'Framtvinga inte';
$string['nogradeletters'] = 'Inga bokstavsbetyg har blivit inställda';
$string['nogradesreturned'] = 'Inga bokstavsbetyg har returnerats';
$string['noidnumber'] = 'Inget id-nummer';
$string['nolettergrade'] = 'Inget bokstavsbetyg/omdöme för';
$string['nomode'] = 'NA';
$string['nonnumericweight'] = 'Mottaget icke-numeriskt värde för';
$string['nonunlockableverbose'] = 'Det här betyget går inte att låsa upp förrän {$a->itemname} har låsts upp';
$string['nonweightedpct'] = 'icke-viktat %';
$string['nooutcome'] = 'Inget resultat';
$string['nooutcomes'] = 'Resultatdelar måste länkas till ett kursresultat men det finns inga resultat för denna kurs. Vill du lägga till ett resultat?';
$string['nopublish'] = 'Publicera inte';
$string['norolesdefined'] = 'Inga roller definierade i Administration > Betyg > Generella inställningar > Betygssatta roller';
$string['noscales'] = 'Resultat måste länkas till en kursskala eller en global skala men det finns ingen. Vill du lägga till en skala?';
$string['noselectedcategories'] = 'inga kategorier valdes';
$string['noselecteditems'] = 'inga komponenter valdes';
$string['notteachererror'] = 'Du måste vara lärare för att få använda det här';
$string['numberofgrades'] = 'Antal betyg';
$string['onascaleof'] = 'på en skala av  {$a->grademin} till {$a->grademax}';
$string['operations'] = 'Operationer';
$string['options'] = 'Alternativ';
$string['outcome'] = 'Resultat';
$string['outcomeassigntocourse'] = 'Tilldela ett annat resultat till den här kursen';
$string['outcomecategory'] = 'Skapa resultat i kategori';
$string['outcomecategorynew'] = 'Ny kategori';
$string['outcomeconfirmdelete'] = 'Är du säker på att du vill ta bort resultatet "{$a}"?';
$string['outcomecreate'] = 'Lägg till ett nytt resultat';
$string['outcomedelete'] = 'Ta bort Resultat';
$string['outcomefullname'] = 'Hela namnet';
$string['outcome_help'] = 'Det resultat som den här betygskomponenten representerar';
$string['outcomeitem'] = 'Komponent för resultat';
$string['outcomeitemsedit'] = 'Redigera komponent för resultat';
$string['outcomereport'] = 'Rapport angående resultat';
$string['outcomes'] = 'Resultat';
$string['outcomescourse'] = 'Resultat som har använts i kurs';
$string['outcomescoursecustom'] = 'Specialstandard som används (ta inte bort)';
$string['outcomescoursenotused'] = 'Standard som inte används';
$string['outcomescourseused'] = 'Standard som används (ta inte bort)';
$string['outcomescustom'] = 'Specialstandard för resultat';
$string['outcomeshortname'] = 'Kortnamn';
$string['outcomesstandard'] = 'Standardresultat';
$string['outcomesstandardavailable'] = 'Tillgängliga standarresultat';
$string['outcomestandard'] = 'Standardresultat';
$string['outcomestandard_help'] = '<p>Ett standardresultat är tillgängligt (för alla kurser) på webbplatsnivå.</p>';
$string['overallaverage'] = 'Övergripande medelbetyg';
$string['overridden'] = 'Överskriden';
$string['overridden_help'] = '<p>När detta är aktiverat så kommer flaggan för överskridanden att förhindra framtida försök att automatiskt modifiera värdet på betyget. Den här flaggan ställs ofta in internt av betygskatalogen men du kan aktivera eller avaktivera den manuellt genom att använda den här komponenten i formuläret. </p>';
$string['overriddennotice'] = 'Ditt sammanfattningsbetyg för den här aktiviteten har justerats manuellt.';
$string['overridesitedefaultgradedisplaytype'] = 'Överskrid de förvalda standardvärdena för webbplatsen';
$string['overridesitedefaultgradedisplaytype_help'] = '<p>Markera den här kryssrutan om du vill aktivera överskridning av standardinställningen på webbplatsnivå för visning av betyg i betygskatalogen. Detta aktiverar komponenter i formuläret som gör det möjligt för dig att definiera bokstavsbetyg och betygsgränser så som du önskar. </p>';
$string['parentcategory'] = 'Föräldrakategori';
$string['pctoftotalgrade'] = '% av sammanlagda betyget/omdömet';
$string['percent'] = 'Procent';
$string['percentage'] = 'Procenttal';
$string['percentageletter'] = 'Procent (bokstav)';
$string['percentagereal'] = 'Procent (real)';
$string['percentascending'] = 'Sortera stigande enligt procent';
$string['percentdescending'] = 'Sortera fallande enligt procent';
$string['percentshort'] = '%';
$string['plusfactor'] = 'Offset';
$string['plusfactor_help'] = '<p>Tal som kommer att läggas till varje betyg för den här betygskomponenten efter det att multiplikatorn har tillämpats.</p>';
$string['points'] = 'poäng';
$string['pointsascending'] = 'Sortera stigande enligt poäng';
$string['pointsdescending'] = 'Sortera fallande enligt poäng';
$string['positionfirst'] = 'Först';
$string['positionlast'] = 'Sist';
$string['preferences'] = 'Preferenser';
$string['prefgeneral'] = 'Generellt';
$string['prefletters'] = 'Bokstäver och gränser för betyg';
$string['prefrows'] = 'Specialrader';
$string['prefshow'] = 'Visa/dölj brytare';
$string['previewrows'] = 'Förhandsgranska rader';
$string['profilereport'] = 'Använd rapport för användarprofil';
$string['profilereport_help'] = 'Betygsrapporten används på sidan med användarens profil.';
$string['publishing'] = 'Publicerar';
$string['quickfeedback'] = 'Snabb återkoppling';
$string['quickgrading'] = 'Snabb betygssättning';
$string['quickgrading_help'] = 'Snabb Betygssättning lägger till en inmatningsbar textkomponent i varje betygsruta i betygsrapporten så att Du ska kunna redigera många betyg på samma gång. Du kan sedan klicka på knappen \'Uppdatera\' för att genomföra alla dessa ändringar samtidigt istället för en i taget.';
$string['range'] = 'Omfång';
$string['rangedecimals'] = '';
$string['rangesdecimalpoints'] = 'Decimaler som visas i omfång';
$string['rangesdecimalpoints_help'] = '<p>Detta specificerar det antal decimaler som du vill visa i varje omfång. Du kan överskrida den här inställningen per komponents som ska betygssättas.</p>';
$string['rangesdisplaytype'] = 'Typ av  visning av omfång';
$string['rangesdisplaytype_help'] = '<p>Detta anger hur omfång ska visas. Om du har valt Ärv så kommer visningstypen för varje kolumn att användas.</p>';
$string['rank'] = 'Ranking';
$string['rawpct'] = 'Rå %';
$string['real'] = 'Reell';
$string['realletter'] = 'Real (bokstav)';
$string['realpercentage'] = 'Real (procent)';
$string['regradeanyway'] = 'Gör om betygssättningen ändå';
$string['removeallcoursegrades'] = 'Ta bort alla betyg';
$string['removeallcourseitems'] = 'Ta bort alla komponenter och kategorier';
$string['report'] = 'Rapport';
$string['reportdefault'] = 'Rapportera förvalt standardvärde ({$a})';
$string['reportplugins'] = 'Plugins för rapport';
$string['reportsettings'] = 'Inställningar för rapport';
$string['reprintheaders'] = 'Skriv rubrikerna igen';
$string['respectingcurrentdata'] = 'den aktuella konfigurationen lämnas opåverkad';
$string['rowpreviewnum'] = 'Förhandsgranska rader';
$string['savechanges'] = 'Spara ändringar';
$string['savepreferences'] = 'Spara preferenser';
$string['scaledpct'] = 'Skalad %';
$string['seeallcoursegrades'] = 'Visa alla kursbetyg';
$string['selectalloroneuser'] = 'Välj alla eller en användare';
$string['selectauser'] = 'Välj en användare';
$string['selectdestination'] = 'Välj destination för {$a}';
$string['separator'] = 'Separator';
$string['sepcomma'] = 'Komma';
$string['septab'] = 'Tabb';
$string['setcategories'] = 'Ställ in kategorier';
$string['setcategorieserror'] = 'Du måste först ställa in kategorierna för Din kurs innan Du kan ge dem viktningar.';
$string['setgradeletters'] = 'Ställ in bokstavsbetyg';
$string['setpreferences'] = 'Ställ in preferenser';
$string['setting'] = 'Inställning';
$string['settings'] = 'Inställningar';
$string['setweights'] = 'Ställ in viktningar';
$string['showactivityicons'] = 'Visa ikoner för aktiviteter';
$string['showactivityicons_help'] = '<p>Här kan du välja om du vill visa ikoner för aktiviteter intill namnet på aktiviteterna.</p>';
$string['showallhidden'] = 'Visa dolda';
$string['showallstudents'] = 'Visa alla studenter/elever/deltagare/lärande';
$string['showanalysisicon'] = 'Visa betygsanalysikonen';
$string['showanalysisicon_desc'] = 'Ska betygsanalysikonen visas som förvalt. Om aktivitetsmodulen stödjer det länkas analysikonen till en sida med mer detaljerad förklaring av betyget och hur det erhölls.';
$string['showanalysisicon_help'] = 'Om aktivitetsmodulen stödjer det länkar analysikonen till en sida med mer detaljerad förklaring av betyget samt hur det erhölls.';
$string['showaverage'] = 'Visa medel';
$string['showaverage_help'] = 'Visa medelkolumn? Elever kan kanske uppskatta andra elevers betyg om medelbetyget beräknas av ett litet antal betyg. Av prestandaskäl är medelbetyget ungefärligt om det beror på några dolda delabetyg.';
$string['showaverages'] = 'Visa medel för kolumner';
$string['showaverages_help'] = 'Visa medelvärdena för kolumner i betygsrapporten.';
$string['showcalculations'] = 'Visa beräkningar';
$string['showcalculations_help'] = 'Detta avgör huruvida ikoner för räknare ska visas bredvid varje betygskomponent och kategori, informationsrutor och visuella signaler som visar att kolumnen är beräknad.';
$string['showeyecons'] = 'Visa \'visa/dölj\'-ikoner';
$string['showeyecons_help'] = 'Detta avgör huruvida en ikon för visa/dölj ska visas bredvid varje betyg (vilket styr huruvida betyget ska vara synligt för användaren eller inte).';
$string['showfeedback'] = 'Visa återkoppling';
$string['showfeedback_help'] = 'Visa kolumnen för återkoppling?';
$string['showgrade'] = 'Visa betyg';
$string['showgrade_help'] = 'Ska betygskolumn visas?';
$string['showgroups'] = 'Visa grupper';
$string['showhiddenitems'] = 'Visa alla dolda element';
$string['showhiddenitems_help'] = 'Detta anger huruvida dolda betygskomponenter visas. Om du har valt Dölj så kommer de att döljas helt och hållet. Om du har valt Visa så kommer raden med dolda betyg att visas som gråtonad med själva betygen helt dolda. Om du har valt "Endast dolda tills"  så kommer betygskomponenter som har ett "dölj tills" datum inställt att visas gråtonat med själva betygen helt dolda fram till det inställda datumet, sedan visas hela komponenten.';
$string['showhiddenuntilonly'] = 'Endast dold till';
$string['showlettergrade'] = 'Visa bokstavsbetyg';
$string['showlettergrade_help'] = 'Ska bokstavsbetygskolumnen visas?';
$string['showlocks'] = 'Visa låsningar';
$string['showlocks_help'] = 'Detta avgör huruvida en ikon för stäng/öppna ska visas bredvid varje betyg.';
$string['shownohidden'] = 'Visa inte';
$string['shownooutcomes'] = 'Dölj resultat';
$string['shownumberofgrades'] = 'Visa antalet betyg i medel';
$string['shownumberofgrades_help'] = 'Detta anger huruvida det antal betyg som ska användas när medelvärdet ska beräknas ska visas inom parenteser efter varje medelvärde t.ex. 45 (34)';
$string['showpercentage'] = 'Visa procent';
$string['showpercentage_help'] = 'Visa procentvärdet för varje betygsdel?';
$string['showquickfeedback'] = 'Visa Snabb återkoppling';
$string['showquickfeedback_help'] = 'Sanbb återkoppling lägger till en komponent för att mata in text i, i varje betygscell i betygsrapporten, vilket innebär att du kan redigera återkopplingen för många betyg samtidigt. Du kan sedan klicka på knappen Uppdatera för att genomföra alla dessa ändringar på en gång i stället för en i taget.';
$string['showranges'] = 'Visa omfång';
$string['showranges_help'] = 'Visa en rad som innehåller skalan av möjligheter för varje betygskomponent i betygsrapporten.';
$string['showrank'] = 'Visa rangordning';
$string['showrank_help'] = 'Visa användarens ställning i förhållande till resten av klassen, för varje betygskomponent.';
$string['showuserimage'] = 'Visa bilderna från användarnas profiler';
$string['showuserimage_help'] = 'Detta avgör huruvida användarnas bilder ska visas bredvid namnet i betygsrapporten.';
$string['showverbose'] = 'Visa {$a->category} {$a->itemmodule} {$a->itemname}';
$string['showweight'] = 'Visa viktningar';
$string['showweight_help'] = 'Ska betygsviktningskolumnen visas?';
$string['simpleview'] = 'Enkel vy';
$string['sitewide'] = 'Över hela webbplatsen';
$string['sort'] = 'Sortera';
$string['sortasc'] = 'Sortera i stigande ordning';
$string['sortbyfirstname'] = 'Sortera efter förnamn';
$string['sortbylastname'] = 'Sortera efter efternamn';
$string['sortdesc'] = 'Sortera i fallande ordning';
$string['standarddeviation'] = 'Standaravvikelse';
$string['stats'] = 'Statistik';
$string['statslink'] = 'Stats';
$string['student'] = 'Student/elev/deltagare/lärande';
$string['studentsperpage'] = 'Studenter/elever/deltagare/lärande per sida';
$string['studentsperpage_help'] = 'Antalet studenter/elever/deltagare/lärande  som ska visas på varje sida i betygsrapporten.';
$string['subcategory'] = 'Normal kategori';
$string['submissions'] = 'Inskickningar';
$string['submittedon'] = 'Inskickad: {$a}';
$string['switchtofullview'] = 'Växla till fullständig vy';
$string['switchtosimpleview'] = 'Växla till enkel vy';
$string['topcategory'] = 'Superkategori';
$string['total'] = 'Summa';
$string['totalweight100'] = 'Den sammanlagda viktningen är lika med 100';
$string['totalweightnot100'] = 'Den sammanlagda viktningen är inte lika med 100';
$string['turnfeedbackoff'] = 'Avaktivera återkoppling';
$string['turnfeedbackon'] = 'Aktivera återkoppling';
$string['typenone'] = 'Ingen';
$string['typescale'] = 'Skala';
$string['typescale_help'] = '<p>När du använder betyg av typen skala så kan du välja en sådan. Vilken skala för en aktivitetsbaserad betygskomponent som du vill ha väljer du på sidan för att uppdatera aktiviteten.</p>';
$string['typetext'] = 'Text';
$string['typevalue'] = 'Värde';
$string['uncategorised'] = 'Inte kategoriserad';
$string['unchangedgrade'] = 'Betyget har inte ändrats';
$string['unenrolledusersinimport'] = 'Den här importen tar med de följande betygen för användare som f.n. inte är registrerade på den här kursen: {$a}';
$string['unlimitedgrades'] = 'Obegränsade betyg';
$string['unlimitedgrades_help'] = 'Som förval begränsas betyg av maxvärdet och minvärdet för betygsdelen. Aktivering av denna inställning tar bor denna begränsning och tillåter betyg över 100% att sättas direkt i betygsboken. Det rekomenderas att denna inställning aktiveras vid en lågbelastningstidpunkt eftersom alla betyg kommer att räknas om vilket kan resultera i hög serverbelastning.';
$string['unlock'] = 'lås upp';
$string['unlockverbose'] = 'Lås upp {$a->category} {$a->itemmodule} {$a->itemname}';
$string['unused'] = 'ej använd';
$string['updatedgradesonly'] = 'Exportera bara nya eller uppdaterade betyg';
$string['uploadgrades'] = 'ladda upp betyg';
$string['useadvanced'] = 'Använd avancerade egenskaper';
$string['usedcourses'] = 'använda kurser';
$string['usedgradeitem'] = 'använd betygskomponent';
$string['usenooutcome'] = 'Använd inget resultat';
$string['usenoscale'] = 'Använd ingen skala';
$string['usepercent'] = 'Använd procent';
$string['user'] = 'Användare';
$string['userenrolmentsuspended'] = '';
$string['usergrade'] = 'Användare {$a->fullname} ({$a->useridnumber}) på komponent {$a->gradeidnumber}';
$string['userpreferences'] = 'Användarens föredragna värden';
$string['useweighted'] = 'Använd viktat';
$string['verbosescales'] = 'Detaljerade skalor';
$string['viewbygroup'] = 'Grupp';
$string['viewgrades'] = 'Visa betyg/omdömen';
$string['warningexcludedsum'] = 'Varning: exkludering av betyg är inte kompatibelt med sumeringsaggregering.';
$string['weight'] = 'vikt';
$string['weightcourse'] = 'Använd viktade betyg för kurs';
$string['weightedascending'] = 'Sortera efter stigande viktad procent';
$string['weighteddescending'] = 'Sortera efter fallande viktad procent';
$string['weightedpct'] = 'viktad %';
$string['weightedpctcontribution'] = 'viktat  %  bidrag';
$string['weights'] = 'Viktningar';
$string['weightuc'] = 'Viktning';
$string['writinggradebookinfo'] = 'Skriver inställningar för betygskatalogen';
$string['xml'] = 'XML';
$string['yes'] = 'Ja';
$string['yourgrade'] = 'Ditt betyg/omdöme';
