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
 * Strings for component 'grades', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   grades
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activities'] = 'Aktivitäten';
$string['addcategory'] = 'Kategorie hinzufügen';
$string['addcategoryerror'] = 'Kategorie konnte nicht hinzugefügt werden.';
$string['addexceptionerror'] = 'Fehler beim Hinzufügen eines Sonderfalls für userid:gradeitem';
$string['addfeedback'] = 'Feedback hinzufügen';
$string['addgradeletter'] = 'Notenstufen hinzufügen';
$string['addidnumbers'] = 'ID-Nummern hinzufügen';
$string['additem'] = 'Bewertungsaspekt hinzufügen';
$string['addoutcome'] = 'Lernziel hinzufügen';
$string['addoutcomeitem'] = 'Lernzielaspekt hinzufügen';
$string['addscale'] = 'Skala hinzufügen';
$string['aggregateextracreditmean'] = 'Durchschnittsbewertung (mit Zusatzpunkten)';
$string['aggregatemax'] = 'Höchste Bewertung';
$string['aggregatemean'] = 'Durchschnittsbewertung';
$string['aggregatemedian'] = 'Median aller Bewertungen';
$string['aggregatemin'] = 'Niedrigste Bewertung';
$string['aggregatemode'] = 'Modus (Modalwert) aller Bewertungen';
$string['aggregateonlygraded'] = 'Zusammenfassen, leere Felder ignorieren';
$string['aggregateonlygraded_help'] = '<h2>Berechne nur nicht-leere Felder</h2>
<p>Nicht vorhandene Bewertungen (z.B. weil der Test nicht vom Teilnehmer bearbeitet wurde) können mit dem niedrigsten Bewertungswert (z.B. 0 Punkte) verarbeitet werden oder bei der Ermittlung der Gesamtnote ignoriert werden.</p>';
$string['aggregateoutcomes'] = 'Lernziele in die Gesamtergebnisse einbeziehen';
$string['aggregateoutcomes_help'] = '<h2>Lernziele beim Gesamtergebnis berücksichtigen oder nicht</h2>
<p>Die Berücksichtigung der Lernziele bei der Ermittlung des Gesamtergebnisses kann zu Verzerrungen führen, die nicht erwünscht sind. Sie haben daher die Möglichkeit, diese einzubeziehen oder zu ignorieren.
</p>';
$string['aggregatesonly'] = 'Nur Gesamtwerte';
$string['aggregatesubcats'] = 'Zusammenfassen, Kategorien einbeziehen';
$string['aggregatesubcats_help'] = '<h2>Berechnen auf der Grundlage der Unterkategorien </h2>
<p>Die Gesamtbewertung wird meist auf Grundlage der Zwischennoten vorgenommen. Es ist jedoch auch möglich, die ursprünglichen Einzelnoten direkt zur Ermittlung der Gesamtnote zu verwenden.
</p>';
$string['aggregatesum'] = 'Summe';
$string['aggregateweightedmean'] = 'Gewichteter Durchschnittswert';
$string['aggregateweightedmean2'] = 'Einfach gewichteter Durchschnittswert';
$string['aggregation'] = 'Gesamtergebnis';
$string['aggregationcoef'] = 'Summenkoeffizient';
$string['aggregationcoefextra'] = 'Zusatzwertung';
$string['aggregationcoefextra_help'] = 'If the aggregation is Sum of grades or Simple weighted mean and the extra credit checkbox is ticked, the grade item\'s maximum grade is not added to the category\'s maximum grade, resulting in the possibility of achieving the maximum grade (or grades over the maximum if enabled by the site administrator) in the category without having the maximum grade in all the grade items.

Wenn die Berechnung auf Basis des Durchschnitts (mit Extrapunkten)  gesetzt ist und Extrapunkte einen Wert größer als Null haben, so wird der Wert für den Extrapunkte erst multipliziert und dann dem Durchschnitt der Bewertungen hinzuaddiert.';
$string['aggregationcoefextrasum'] = 'Zusatzpunkte';
$string['aggregationcoefextrasum_help'] = '<h2>Als Extrapunkte-Bewertung festlegen</h2>
<p>Bei der Einstellung "Summe der Bewertungen" als Berechnungsverfahren kann eine Bewertung als Sonderpunkte definiert werden. Das bedeutet, dass die höchste hierbei mögliche Bewertung nicht in die Summe der Bewertungen der Kategorie eingerechnet wird. Die Bewertung selber wird als Bonus dennoch mit berechnet.
Das folgende Beispiel kann dies verdeutlichen:</p>

<ul>
    <li>Wert 1 ist bewertet mit 0-100</li>
    <li>Wert 2 ist bewertet mit 0-75</li>
    <li>Wert 1 ist als "Extrapunkte" aktiviert, Wert 2 jedoch nicht.</li>
    <li>Beide Werte gehören zur Kategorie 1. Für diese gilt, dass die Summe der Bewertungen ermittelt werden soll </li>
    <li>Kategorie 1 wird gesamt mit 0-75 bewertet</li>
    <li>Ein Teilnehmer erhält nun die Bewertung 20 für Wert 1 und 75 für Wert 2</li>
    <li>Die Berechnung für Kategorie 1 ist nun 75/75 (20+70 = 95; Wert 1 wird als Extrapunkte gewertet. Der Höchstwert kann jedoch nur 75 sein, daher ist die Endnote 75.)</li>
</ul>';
$string['aggregationcoefextraweight'] = 'Gewichtung von Zusatzpunkten';
$string['aggregationcoefextraweight_help'] = '<h2>Extrapunkteberechnung</h2>
<p>Bei der Berechnung der Extrapunkte wird folgendes Verfahren angewandt. Bewertungen für die  Extrapunkte vergeben werden werden erst mit dem Multiplikator multipliziert. Dann werden die Einzelwerte addiert und durch die Zahl der Bewertungen dividiert. Die Zahl durch die dividiert wird   umfasst nur die Berwertungen, für die es keine Extrapunkte gibt. Im folgenden Beispiel erfolgt daher nur eine Division durch 2 und nicht durch 3.
</p>

<ul>
    <li>Wert 1 wird bewertet mit 0-100 und "Extrapunkte" Wert wird gesetzt auf 2</li>
    <li>Wert 2 wird bewertet mit 0-100 und "Extrapunkte" Wert bleibt auf 0.0000</li>
    <li>Wert 3 wird bewertet mit 0-100 und "Extrapunkte" Wert bleibt auf 0.0000</li>
    <li>Alle 3 Werte gehören in Kategorie 1, mit der Bewertungsstrategie "Durchschnitt der Einzelbewertungen (mit Extrapunkten)" als Berechnungsverfahren</li>
    <li>Ein Teilnehmer erhält nun folgende Einzelbewertungen 20 für Wert 1, 40 für Wert 2 und 70 für Wert 3</li>
    <li>Die Gesamtbewertung für Kategorie 1 ist nun 50/100 (20*2 + 40 + 70) / 3</li>
</ul>';
$string['aggregationcoefweight'] = 'Gewichtung der Aspekte';
$string['aggregationcoefweight_help'] = '<h2>Gewichtung des Wertes</h2>
<p>Gewichtung der Bewertungen dieser Aktivität bei der Berechnung der Teil- oder Gesamtnote.
</p>';
$string['aggregation_help'] = '<h2>Category aggregation</h2><b>ToDo</b>
<p>In dieser Einstellung können Sie auswählen, wie die Gesamtbewertung eines Teilnehmenden für diese Kategorie berechnet wird.</p>
<p><strong>Wichtig</strong>: Eine leere Bewertung ist ein fehlender Eintrag in den Bewertungen und kann verschiedenes bedeuten: Z.B. kann es sich um einen Teilnehmenden handeln, der eine Aufgabe noch nicht eingereicht hat. Oder es handelt sich um eine Aufgabe, die noch nicht von den Trainer/innen bewertet wurde. Oder es handelt sich um eine Bewertung, die von jemandem manuell gelöscht wurde, der berechtigt ist, die Bewertungen zu verwalten. Daher ist bei der Interpretation von "leeren Bewertungen" Vorsicht geboten.</p>
<p>Folgende Auswahlmöglichkeiten zur Berechnung der Gesamtbewertung für eine Kategorie stehen zur Verfügung:</p>
<table class="generaltable boxaligncenter" cellpadding="4" cellspacing="1" summary="Berechnungsmöglichkeiten für Gesamtbewertungen in einer Bewertungskategorie">
    <tr>
        <th class="header">Berechnungsmöglichkeit</th><th class="header">Beschreibung</th>
    </tr>
    <tr>
        <td class="cell">Durchschnitt aller Bewertungen</td>
        <td class="cell">Alle Bewertungen werden addiert und anschließend durch die Anzahl der Bewertungen geteilt. Leere Bewertungen werden mitgezählt (sie gehen mit Wert gleich 0 in die Aufsummierung ein).</td>
    </tr>
    <tr>
        <td class="cell">Mean of non-empty grades</td>
        <td class="cell">Same as above, except that empty grades are ignored.</td>
    </tr>
    <tr>
        <td class="cell">Median of all grades</td>
        <td class="cell">The median is calculated by counting all the grades and selecting the grade that falls in the middle of that count (or the mean between the two middle grades if there is an even number of grades). The advantage over the mean is that it is not affected by outliers (grades which are uncommonly far from the mean). Empty grades are included.</td>
    </tr>
    <tr>
        <td class="cell">Median of non-empty grades</td>
        <td class="cell">Same as above, except that empty grades are ignored.</td>
    </tr>
    <tr>
        <td class="cell">Smallest grade of non-empty grades</td>
        <td class="cell">Only the smallest grade is kept. Empty grades are ignored.</td>
    </tr>
    <tr>
        <td class="cell">Highest grade of non-empty grades</td>
        <td class="cell">Only the highest grade is kept. Empty grades are ignored.</td>
    </tr>
    <tr>
        <td class="cell">Mode of all grades</td>
        <td class="cell">The mode is the grade that occurs the most frequently. It is more often used for non-numerical  The advantage over the mean is that it is not affected by outliers (grades which are uncommonly far from the mean). Empty grades are included.</td>
    </tr>
    <tr>
        <td class="cell">Mode of non-empty grades</td>
        <td class="cell">Same as above, except that empty grades are ignored.</td>
    </tr>
    <tr>
        <td class="cell">Weighted mean of all grades</td>
        <td class="cell">Each grade item can be given a weight, which is then used in the arithmetic mean aggregation to influence the importance of each item in the overall mean. Empty grades are included.</td>
    </tr>
    <tr>
        <td class="cell">Weighted mean of non-empty grades</td>
        <td class="cell">Same as above, except that empty grades are ignored.</td>
    </tr>
    <tr>
        <td class="cell">Mean of all grades (extra credits)</td>
        <td class="cell">Arithmetic mean with a twist. An old, now unsupported aggregation strategy provided here only
            for backward compatibility with old activities. Empty grades are included.</td>
    </tr>
    <tr>
        <td class="cell">Mean of non-empty grades (extra credits)</td>
        <td class="cell">Same as above, except that empty grades are ignored.</td>
    </tr>

</table>';
$string['aggregationposition'] = 'Anzeige des Gesamtergebnisses';
$string['aggregationposition_help'] = '<h2>Anzeigeposition des Gesamtergebnisses</h2>
<p>Legt fest an welcher Stelle der Tabelle das Gesamtergebnis angezeigt wird.
</p>';
$string['aggregationsvisible'] = 'Mögliche Summierungsarten';
$string['aggregationsvisiblehelp'] = 'Wählen Sie alle Summierungsarten, die nutzbar sein sollen. Benutzen Sie <strg> bzw. <ctrl>, um mehrere Arten zu markieren.';
$string['allgrades'] = 'Alle Bewertungen nach Kategorien';
$string['allstudents'] = 'Alle Teilnehmer/innen';
$string['allusers'] = 'Alle Nutzer/innen';
$string['autosort'] = 'Auto-Sortierung';
$string['availableidnumbers'] = 'Verfügbare ID-Nummern';
$string['average'] = 'Durchschnitt';
$string['averagesdecimalpoints'] = 'Nachkommastellen in den Spaltendurchschnitten';
$string['averagesdecimalpoints_help'] = '<h2>Dezimalziffern bei der Anzeige der Durchschnittswerte</h2>
<p>Legt die Zahl der angezeigten Dezimalziffern des errechneten Durchschnittswerts in der Tabelle fest.  Wenn \'vererbt\' ausgewählt wird, wird die  Festlegung für die Spaltenwerte übernommen.
</p>';
$string['averagesdisplaytype'] = 'Spaltendurchschnittsanzeige';
$string['averagesdisplaytype_help'] = '<h2>Anzeige der Spalte Durchschnitt</h2>
<p>Legt die Anzeige des Durchschnitts in jeder Spalte fest.  Wenn \'Vererben\' gewählt wird, wird der Wert in allen Spalten verwandt.</p>';
$string['backupwithoutgradebook'] = 'Die Sicherung enthält keine Bewertungskonfiguration';
$string['badgrade'] = 'Ungültige Bewertung';
$string['badlyformattedscale'] = 'Bitte tragen Sie eine kommagetrennte Liste von Werten ein (mindestens zwei Werte)';
$string['baduser'] = 'Ungültige/r Teilnehmer/in';
$string['bonuspoints'] = 'Extrapunkte';
$string['bulkcheckboxes'] = 'Checkboxes';
$string['calculatedgrade'] = 'Bewertung berechnen';
$string['calculation'] = 'Berechnung';
$string['calculationadd'] = 'Berechnung hinzufügen';
$string['calculationedit'] = 'Berechnung bearbeiten';
$string['calculation_help'] = 'Eine Berechnung ist eine Formel zur Bestimmung von Gesamtbewertungen. Die Formel sollte mit einem Gleichheitszeichen (=) beginnen und kann die üblichen mathematischen Operatoren (wie etwa max, min, sum) enthalten.

Sie können auch andere Bewertungselemente in die Rechnung einbeziehen, indem Sie die ID-Nummer in eine doppelte eckige Klammer [[ID]] einfügen.';
$string['calculationsaved'] = 'Berechnung gespeichert';
$string['calculationview'] = 'Berechnung ansehen';
$string['cannotaccessgroup'] = 'Bei der gewählten Gruppe kann nicht auf die Bewertung zugegriffen werden.';
$string['categories'] = 'Kategorien';
$string['categoriesanditems'] = 'Kategorien und Aspekte';
$string['categoriesedit'] = 'Kategorien und Aspekte bearbeiten';
$string['category'] = 'Kategorie';
$string['categoryedit'] = 'Kategorie bearbeiten';
$string['categoryname'] = 'Name der Kategorie';
$string['categorytotal'] = 'Summe für die Kategorie';
$string['categorytotalfull'] = 'Summe für {$a->category}';
$string['categorytotalname'] = 'Vollständiger Kategorienname';
$string['changedefaults'] = 'Grundeinstellungen ändern';
$string['changereportdefaults'] = 'Voreinstellungen für Berichte ändern';
$string['chooseaction'] = 'Aktion auswählen ...';
$string['choosecategory'] = 'Kategorie auswählen';
$string['combo'] = 'Dropdown-Menü und Registrierkarten';
$string['compact'] = 'Komprimieren';
$string['componentcontrolsvisibility'] = 'Die Sichtbarkeit dieses Bewertungselements wird in den Aktivitätseinstellungen festgelegt.';
$string['contract'] = 'Kategorie einschränken';
$string['controls'] = 'Kontrollen';
$string['courseavg'] = 'Kurs-Durchschnitt';
$string['coursegradecategory'] = 'Kursbewertungskategorie';
$string['coursegradedisplaytype'] = 'Anzeigetyp der Bewertungskategorie';
$string['coursegradedisplayupdated'] = 'Die Anzeige der Kursbewertung wurde aktualisiert.';
$string['coursegradesettings'] = 'Einstellungen zur Kursbewertung';
$string['coursename'] = 'Name des Kurses';
$string['coursescales'] = 'Kursskalen';
$string['coursesettings'] = 'Kurseinstellungen';
$string['coursesettingsexplanation'] = 'Die Kurseinstellungen legen fest, wie die Bewertungen für alle Teilnehmer/innen im Kurs gezeigt werden';
$string['coursetotal'] = 'Summe für den Kurs';
$string['createcategory'] = 'Kategorie anlegen';
$string['createcategoryerror'] = 'Neue Kategorie konnte nicht erstellt werden';
$string['creatinggradebooksettings'] = 'Einstellungen für die Bewertungsübersicht';
$string['csv'] = 'CSV';
$string['currentparentaggregation'] = 'Aktuelle übergeordnete Gesamtsumme';
$string['curveto'] = 'Ändern auf';
$string['decimalpoints'] = 'Dezimalstellen';
$string['decimalpoints_help'] = '<h2>Dezimalzeichen</h2>
<p>Legt die Zahl der angezeigten Dezimalzeichen einer Bewertung fest. Die Einstellung wirkt sich nicht auf die Genauigkeit der Berechnungen aus. Bei Berechnungen wird eine Genauigkeit von bis zu fünf Dezimalziffern mit beachtet.</p>';
$string['default'] = 'Standard';
$string['defaultprev'] = 'Voreinstellung ({$a})';
$string['deletecategory'] = 'Kategorie löschen';
$string['disablegradehistory'] = 'Bewertungsverlauf ausschalten';
$string['disablegradehistory_help'] = 'Mit dieser Einstellung schalten Sie die Verlaufsspeicherung von Änderungen in bewertungsspezifischen Tabellen aus. Damit können Sie u.a. die Servergeschwindigkeit erhöhen und den Speicherverbrauch in der Datenbank vermindern.';
$string['displaylettergrade'] = 'Notenstufen anzeigen';
$string['displaypercent'] = 'Prozentwerte anzeigen';
$string['displaypoints'] = 'Punktwerte anzeigen';
$string['displayweighted'] = 'Gewichtete Bewertungen anzeigen';
$string['dropdown'] = 'Dropdown-Menü';
$string['droplow'] = 'Niedrigste Bewertungen herausnehmen';
$string['droplow_help'] = '<h2>Niedrigste Bewertungen auslassen</h2>
<p>Mit dieser Funktion werden die x niedrigsten Bewertungen einfach ignoriert und bei der Berechnung der Gesamtnote übersprungen. X steht für die Zahl der niedrigsten Resultate. Damit kann folgendes Szenario umgesetzt werden: Bei fünf Tests eines Kurses werden die schlechtesten beiden Ergebnisse nicht für die Gesamtnote berücksichtigt.  </p>';
$string['dropped'] = 'herausgenommen';
$string['dropxlowest'] = 'Die X niedrigsten <br />herausnehmen';
$string['dropxlowestwarning'] = 'Anmerkung: Wenn Sie die Option "die X niedrigsten herausnehmen" verwenden, wird angenommen, dass alle Elemente der Kategorie die gleiche Punktzahl haben. Wenn die Punktwerte differieren, werden die Ergebnisse unkalkulierbar.';
$string['duplicatescale'] = 'Skala duplizieren';
$string['edit'] = 'Bearbeiten';
$string['editcalculation'] = 'Berechnung bearbeiten';
$string['editcalculationverbose'] = 'Berechnung {$a->category} {$a->itemmodule} {$a->itemname} bearbeiten';
$string['editfeedback'] = 'Feedback bearbeiten';
$string['editgrade'] = 'Bewertung bearbeiten';
$string['editgradeletters'] = 'Notenstufen bearbeiten';
$string['editoutcome'] = 'Lernziel bearbeiten';
$string['editoutcomes'] = 'Lernziele bearbeiten';
$string['editscale'] = 'Skala bearbeiten';
$string['edittree'] = 'Kategorien und Aspekte';
$string['editverbose'] = '{$a->category} {$a->itemmodule} {$a->itemname} bearbeiten';
$string['enableajax'] = 'Ajax aktivieren';
$string['enableajax_help'] = 'Ajax-Funktionalität für die Bewerterübersicht bereitstellen, um allgemeine Operationen zu vereinfachen und zu beschleunigen. Ajax arbeitet mit JavaScript, das deswegen anwenderseits im Webbrowser aktiviert sein muss.';
$string['enableoutcomes'] = 'Lernziele';
$string['enableoutcomes_help'] = 'Unterstützung für Lernziele (auch Lernkompetenzen, -ergebnisse, -standards, -kriterien genannt) meint, dass Dinge in einer oder mehreren Skalen bewertet werden können. Die Aktivierung der Lernziele macht eine Bewertung auf der gesamten Website möglich.';
$string['encoding'] = 'Kodierung';
$string['errorcalculationnoequal'] = 'Formeln müssen mit einem Gleichheitszeichen beginnen (=1+2)';
$string['errorcalculationunknown'] = 'Ungültige Formel';
$string['errorgradevaluenonnumeric'] = 'Nicht-numerischer Wert für hohe oder niedrige Bewertung!';
$string['errornocalculationallowed'] = 'Für diesen Wert sind keine Berechnungen zulässig.';
$string['errornocategorisedid'] = 'Keine nicht kategorisierte id!';
$string['errornocourse'] = 'Keine Kursinformation!';
$string['errorreprintheadersnonnumeric'] = 'Nicht-numerischer Wert für Kopfzeile!';
$string['errorsavegrade'] = 'Endschuldigung, aber die Bewertung konnte nicht gespeichert werden.';
$string['errorupdatinggradecategoryaggregateonlygraded'] = 'Es ist ein Fehler beim Aktualisieren der Einstellungen "Zusammenfassung nur bewerteter Elemente" in der Bewertungskategorie mit der ID {$a->id} aufgetreten.';
$string['errorupdatinggradecategoryaggregateoutcomes'] = 'Es ist ein Fehler beim Aktualisieren der Einstellungen "Zusammenfassen der Ergebnisse" in der Bewertungskategorie mit der ID {$a->id} aufgetreten.';
$string['errorupdatinggradecategoryaggregatesubcats'] = 'Es ist ein Fehler beim Aktualisieren der Einstellungen "Zusammenfassung der Unter-Kategorien" in der Bewertungskategorie mit der ID {$a->id} aufgetreten.';
$string['errorupdatinggradecategoryaggregation'] = 'Es ist ein Fehler beim Aktualisieren des Typs der Zusammenfassung in der Bewertungskategorie mit der ID {$a->id} aufgetreten.';
$string['errorupdatinggradeitemaggregationcoef'] = 'Es ist ein Fehler beim Aktualisieren des Summenkoeffizients (Gewichtung oder Zusatzpunkte) des Bewertungselements mit der ID {$a->id} aufgetreten.';
$string['excluded'] = 'Unberücksichtigt';
$string['excluded_help'] = '<h2>Bewertung ausgrenzen</h2>
<p>Wenn - ausgrenzen/ausschließen - aktiviert ist, werden diese Bewertungen bei der weiteren Gesamtnotenberechnung übersprungen und nicht einbezogen.</p>';
$string['expand'] = 'Kategorie erweitern';
$string['export'] = 'Export';
$string['exportalloutcomes'] = 'Alle Lernziele exportieren';
$string['exportfeedback'] = 'Feedback mit exportieren';
$string['exportonlyactive'] = 'Aktive Einschreibung notwendig';
$string['exportonlyactive_help'] = 'Nur Teilnehmende exportieren, deren Einschreibung nicht aufgehoben wurde.';
$string['exportplugins'] = 'Export-Plugins';
$string['exportsettings'] = 'Exporteinstellungen';
$string['exportto'] = 'Export nach';
$string['extracreditwarning'] = 'Anmerkung: Wenn für alle Elemente einer Kategorie Extrapunkte vergeben werden, dann werden sie bei der Gesamtbewertung nicht berücksichtigt. Es wird keine Gesamtpunktzahl ermittelt.';
$string['feedback'] = 'Feedback';
$string['feedbackadd'] = 'Feedback hinzufügen';
$string['feedbackedit'] = 'Feedback bearbeiten';
$string['feedback_help'] = '<h2>Feedback</h2>
<p>Anmerkungen zur Bewertung durch den/die Trainer/in. Das Feedback kann ein ausführlicher Text, eine sehr persönliche Rückmeldung oder ein Code sein, der üblicherweise in der Bildungseinrichtung verwandt wird.
</p>';
$string['feedbacksaved'] = 'Feedback gespeichert';
$string['feedbackview'] = 'Feedback ansehen';
$string['finalgrade'] = 'Endbewertung';
$string['finalgrade_help'] = '<p>Gesamtnote nachdem alle Bewertungen berechnet wurden.</p>';
$string['fixedstudents'] = 'Feste Spaltenbreite';
$string['fixedstudents_help'] = 'Feste Breite der Spalten, dadurch horizontales Scrollen.';
$string['forceoff'] = 'Festgelegt: Aus';
$string['forceon'] = 'Festgelegt: An';
$string['forelementtypes'] = 'für die ausgewählten {$a}';
$string['forstudents'] = 'Für Teilnehmer/innen';
$string['full'] = 'Vollständig';
$string['fullmode'] = 'Vollständige Ansicht';
$string['fullview'] = 'Vollständige Ansicht';
$string['generalsettings'] = 'Grundeinstellungen';
$string['grade'] = 'Bewertung';
$string['gradeadministration'] = 'Bewertungsverwaltung';
$string['gradeanalysis'] = 'Bewertungsanalyse';
$string['gradebook'] = 'Bewertungen';
$string['gradebookhiddenerror'] = 'Die Bewertungen sind zur Zeit für die Teilnehmer/innen nicht sichtbar.';
$string['gradebookhistories'] = 'Bewertungsverlauf';
$string['gradeboundary'] = 'Untere Grenze für Note';
$string['gradeboundary_help'] = '<h2>Bewertungsgrenze</h2>
<p>Eine prozentuale Grenze über der die Bewertung einer bestimmten Note (Buchstaben) zugeordnet wird. </p>';
$string['gradecategories'] = 'Bewertungskategorien';
$string['gradecategory'] = 'Bewertungskategorie';
$string['gradecategoryonmodform'] = 'Bewertungskategorie';
$string['gradecategoryonmodform_help'] = 'Die Einstellung legt fest in welcher Kategorie des Bewertungsbereich die Aktivität angezeigt wird.';
$string['gradecategorysettings'] = 'Bewertungskategorie-Einstellungen';
$string['gradedisplay'] = 'Bewertungsanzeige';
$string['gradedisplaytype'] = 'Bewertungsanzeige-Typ';
$string['gradedisplaytype_help'] = '<h2>Anzeigetyp für Bewertungen</h2>
<p>Bewertungen können als reale Bewertungen, Prozentwerte (relativ zum höchsten/ niedrigsten Wert), oder als Buchstaben (A,B,C,..) angezeigt werden.</p>';
$string['gradedon'] = '{$a} bewertet';
$string['gradeexport'] = 'Bewertungsexport';
$string['gradeexportdecimalpoints'] = 'Dezimalstellen bei Bewertungsexport';
$string['gradeexportdecimalpoints_desc'] = 'Zahl der angezeigten Dezimalstellen bei Export. Diese Einstellung kann durch Definition im Export überschrieben werden.';
$string['gradeexportdisplaytype'] = 'Anzeigetyp bei Bewertungsexport';
$string['gradeexportdisplaytype_desc'] = 'Bewertungen können als Note, Prozentwert (in Relation zur niedrigsten/höchsten Note) oder als Notenstufe (A,B,C, sehr gut, gut) beim Export gesetzt werden. Beim Export erfolgt dann  ein Überschreiben der vorliegenden Werte.';
$string['gradeforstudent'] = '{$a->student}<br />{$a->item}{$a->feedback}';
$string['gradehelp'] = 'Hilfe für Bewertungen';
$string['gradehistorylifetime'] = 'Anzeigedauer für den Bewertungsverlauf';
$string['gradehistorylifetime_help'] = 'Legen Sie fest wie lange die vorgenommenen Veränderungen in den Notentabellen noch verfügbar sein sollen. In manchen Situationen ist es gut, diesen Wert möglichst hoch zu setzen. Sollten Sie Speicherengpässe oder Leistungsprobleme haben, können Sie den Wert wieder niedriger setzen.';
$string['gradeimport'] = 'Bewertungsimport';
$string['gradeitem'] = 'Bewertungsaspekt';
$string['gradeitemaddusers'] = 'Nicht bewerten';
$string['gradeitemadvanced'] = 'Erweiterte Optionen für Bewertungsaspekte';
$string['gradeitemadvanced_help'] = 'Wählen Sie die Elemente aus, die bei der Bearbeitung von Bewertungsaspekten als Erweiterung angezeigt werden sollen.';
$string['gradeitemislocked'] = 'Diese Aktivität ist in der Bewertung gesperrt. Änderungen an den Bewertungen werden nicht in die Bewertungen des Kurses übernommen solange diese Sperre besteht.';
$string['gradeitemlocked'] = 'Bewertung gesperrt';
$string['gradeitemmembersselected'] = 'Nicht bewertet';
$string['gradeitemnonmembers'] = 'Wird bewertet';
$string['gradeitemremovemembers'] = 'Mit bewerten';
$string['gradeitems'] = 'Bewertungsaspekte';
$string['gradeitemsettings'] = 'Bewertungsaspekte';
$string['gradeitemsinc'] = 'Einzuschließende Bewertungsaspekte';
$string['gradeletter'] = 'Note';
$string['gradeletter_help'] = '<h2>Bewertung mit Buchstaben</h2>
<p>Ein Buchstabe oder eine andere Bezeichnung als Symbol zur Wiedergabe eines Bewertungsbereichs (z.B. sehr gut für 100-97 Punkte).</p>';
$string['gradeletternote'] = 'Füllen Sie die letzte Zeile und speichern Sie, <br />um eine neue Leerzeile für eine weitere Note zu erhalten.';
$string['gradeletters'] = 'Notenstufen';
$string['gradelocked'] = 'Bewertung ist gesperrt';
$string['gradelong'] = '{$a->grade} / {$a->max}';
$string['grademax'] = 'Maximale Bewertung';
$string['grademax_help'] = '<h2>Höchste Bewertung</h2>
<p>Wenn der Wert-Typ der Bewertung verwandt wird, kann hier eine oberste oder höchste Bewertung festgesetzt werden. Die Festlegung erfolgt auf der Seite mit den Einstellungen zur einzelnen Lernaktivität.</p>';
$string['grademin'] = 'Minimale Bewertung';
$string['grademin_help'] = '<h2>Niedrigste Bewertung</h2>
<p>Wenn der Wert-Typ der Bewertung verwandt wird, kann hier eine unterste oder niedrigste Bewertung festgesetzt werden.</p>';
$string['gradeoutcomeitem'] = 'Lernziel bewerten';
$string['gradeoutcomes'] = 'Lernziele';
$string['gradeoutcomescourses'] = 'Kurs-Lernziele';
$string['gradepass'] = 'Bewertung zum Bestehen';
$string['gradepass_help'] = 'Diese Option legt die erforderliche Mindestbewertung für das Bestehen fest. Der Wert wird beim Aktivitäts- und beim Kursabschluss verwendet, außerdem wird bei der Bewertung ein Bestehen in grün und ein Scheitern in rot markiert.
';
$string['gradepreferences'] = 'Bewertungseinstellungen';
$string['gradepreferenceshelp'] = 'Hilfe für Bewertungseinstellungen';
$string['gradepublishing'] = 'Veröffentlichen erlauben';
$string['gradepublishing_help'] = 'Aktiviert die Export und Importfunktion: Exportierte Bewertungen können für andere verlinkt werden, ohne dass sie sich im Moodle-System einloggen müssen.  Bewertungen können auf die gleiche Art und Weise importiert werden. Damit können Bewertungen, die aus anderen Systemen stammen integriert werden. Normalerweise können nur Administratoren diese Funktion nutzen. Falls dieses Recht weitergegeben wird, sind die betroffenen Personen darauf hinzuweisen, dass mit entsprechender Sorgfalt mit diesen persönlichen Daten umgegangen wird.';
$string['gradereport'] = 'Bewertungsbericht';
$string['graderreport'] = 'Bewerterübersicht';
$string['grades'] = 'Bewertung';
$string['gradesforuser'] = 'Bewertung für {$a->user}';
$string['gradesonly'] = 'Nur Bewertung';
$string['gradessettings'] = 'Bewertungseinstellungen';
$string['gradetype'] = 'Bewertungstyp';
$string['gradetype_help'] = '<h2>Bewertungstyp</h2>
<p>Legt den verwendeten Bewertungstyp fest: keine (keine Bewertung möglich), Werte(aktiviert die maximalen/minimalen Notenwerte), Skala (aktiviert die Einstellung einer Skala) oder Text (nur freie Feedbacktexte). Nur Werte und Skalen können weiter als Grundlage für Berechnungen genutzt werden. Der Bewertungstyp einer Lernaktivität wird in den Einstellungen der jeweiligen Lernaktivität im Kurs festgelegt.
</p>';
$string['gradeview'] = 'Bewertung ansehen';
$string['gradeweighthelp'] = 'Hilfe zur Bewertung';
$string['groupavg'] = 'Gruppendurchschnitt';
$string['hidden'] = 'Verborgen';
$string['hiddenasdate'] = 'Erstellungsdatum für verborgene Bewertungen anzeigen';
$string['hiddenasdate_help'] = 'Falls Nutzer/innen verborgene Bewertungen nicht sehen können, soll das Abgabedatum anstelle von \'-\' angezeigt werden.';
$string['hidden_help'] = 'Die Option verbirgt die Bewertungen vor den Teilnehmer/innen. \'Verborgen bis...\' kann auf Wunsch eingestellt werden, um die Bewert ungen so lange zu verbergen, bis der Bewertungsdurchlauf abgeschlossen wurde. ';
$string['hiddenuntil'] = 'Verborgen bis';
$string['hiddenuntildate'] = 'Verborgen bis: {$a}';
$string['hideadvanced'] = 'Erweiterte Funktionen verbergen';
$string['hideaverages'] = 'Durchschnittswerte verbergen';
$string['hidecalculations'] = 'Berechnungen verbergen';
$string['hidecategory'] = 'Verborgen';
$string['hideeyecons'] = 'Symbole zur Sichtbarkeit (Auge) verbergen';
$string['hidefeedback'] = 'Feedback verbergen';
$string['hideforcedsettings'] = 'Gesetzte Einstellungen verbergen';
$string['hideforcedsettings_help'] = 'Keine voreingestellten Einträge im Bewertungsdialog anzeigen.';
$string['hidegroups'] = 'Gruppen verbergen';
$string['hidelocks'] = 'Sperrungen verbergen';
$string['hidenooutcomes'] = 'Lernziele zeigen';
$string['hidequickfeedback'] = 'Schnelles Feedback verbergen';
$string['hideranges'] = 'Stufen verbergen';
$string['hidetotalifhiddenitems'] = 'Summen verbergen, wenn sie verborgene Elemente enthalten';
$string['hidetotalifhiddenitems_help'] = 'Die Einstellung legt fest ob die Gesamtbewertung angezeigt wird oder durch ein (-) ersetzt wird, wenn es verborgene Einzelbewertungen gibt. Soll sie angezeigt werden kann festgelegt werden, ob die verborgene Bewertung in das angezeigte Gesamtergebnisse einbezogen wird oder nicht.
Wenn verborgene Werte ausgeschlossen werden, ist die sichtbare Gesamtbewertung die der Trainer sieht und die der Teilnehmer sieht, nicht identisch.  Der Trainer sieht immer sichtbare und verborgene Ergebnisse als Gesamtergebnis. Sollen verborgene Werte für Teilnehmer nicht sichtbar sein, können diese von den Teilnehmern u.U. aus dem Gesamtergebnis errechnet werden.';
$string['hidetotalshowexhiddenitems'] = 'Summen anzeigen, ausgenommen der verborgenen Elemente';
$string['hidetotalshowinchiddenitems'] = 'Summen anzeigen, inclusive der verborgenen Elemente';
$string['hideverbose'] = '{$a->category} {$a->itemmodule} {$a->itemname} verbergen';
$string['highgradeascending'] = 'Sortiert nach Höchstbewertung aufsteigend';
$string['highgradedescending'] = 'Sortiert nach Höchstbewertung absteigend';
$string['highgradeletter'] = 'Hoch';
$string['identifier'] = 'Teilnehmer/in identifizieren durch';
$string['idnumbers'] = 'ID-Nummern';
$string['import'] = 'Import';
$string['importcsv'] = 'CSV importieren';
$string['importcustom'] = 'Import als individuelle Lernziele (nur für diesen Kurs)';
$string['importerror'] = 'Es ist ein Fehler aufgetreten. Das Script wurde mit falschen Parametern gestartet.';
$string['importfailed'] = 'Import gescheitert';
$string['importfeedback'] = 'Feedback importieren';
$string['importfile'] = 'Importdatei';
$string['importfilemissing'] = 'Es konnte keine Datei importiert werden. Gehen Sie noch einmal zu dem Formular zurück und prüfen Sie, ob die richtige Datei ausgewählt wurde.';
$string['importfrom'] = 'Import von';
$string['importoutcomenofile'] = 'Die hochgeladene Datei ist leer oder fehlerhaft. Prüfen Sie die Datei noch einmal. Das Problem trat in Zeile {$a} auf. Die Meldung erscheint, wenn in den Datenzeilen nicht genau so viele Einträge vorhanden sind wie in der Kopfzeile angelegt wurden, oder ein Fehler in der Kopfzeile vorliegt. Wenn Sie einen Export vornehmen, können Sie darin die richtige Struktur der Kopfzeile erkennen.';
$string['importoutcomes'] = 'Lernziele importieren';
$string['importoutcomes_help'] = 'Lernziele können als csv-Datei importiert werden. Erstellen Sie einen Export von Lernzielen, um sich das Format für den Import anzuschauen. ';
$string['importoutcomesuccess'] = 'Lernziel "{$a->name}" mit ID #{$a->id} importieren';
$string['importplugins'] = 'Import-Plugins';
$string['importpreview'] = 'Importvorschau';
$string['importsettings'] = 'Importeinstellungen';
$string['importskippednomanagescale'] = 'Sie haben nicht die Berechtigung, neue Bewertungsskalen anzulegen. Das Lernziel "{$a}" wurde übersprungen, da es die Anlage einer neuen Skala erfordert.';
$string['importskippedoutcome'] = 'Ein Lernziel mit der Kurzbezeichnung "{$a}" besteht in diesem Kontext bereits. Das zu importierende Lernziel wurde übersprungen.';
$string['importstandard'] = 'Import als Standardlernziel';
$string['importsuccess'] = 'Bewertungsimport erfolgreich';
$string['importxml'] = 'XML importieren';
$string['includescalesinaggregation'] = 'Skalen bei Berechnung einbeziehen';
$string['includescalesinaggregation_help'] = 'Sie können festlegen, ob alle Bewertungsskalen in Zahlwerte umgerechnet und bei der Berechnung von Zwischen- und Gesamtnoten in allen Bewertungen der Kurse verwendet werden. ACHTUNG: nach dem Ändern dieser Einstellung werden alle Gesamtnoten neu berechnet.';
$string['incorrectcourseid'] = 'Ungültige Kurs-ID';
$string['incorrectcustomscale'] = '(Fehlerhafte Skalenanpassung - bitte ändern)';
$string['incorrectminmax'] = 'Der unterste Wert muss niedriger als der höchste Wert sein.';
$string['inherit'] = 'Vererben';
$string['intersectioninfo'] = 'Info zu Teilnehmer/Bewertung';
$string['item'] = 'Aspekt';
$string['iteminfo'] = 'Info zum Aspekt';
$string['iteminfo_help'] = '<h2>Information zum Wert</h2>
<p>Raum zum Eingeben weiterer Informationen über den Wert. Der Text wird nicht an einer anderen Stelle angezeigt.</p>';
$string['itemname'] = 'Name des Aspekts';
$string['itemnamehelp'] = 'Name des Aspekts, der vom Modul festgelegt wird.';
$string['items'] = 'Aspekte';
$string['itemsedit'] = 'Bewertungsaspekt bearbeiten';
$string['keephigh'] = 'Höchste Bewertungen behalten';
$string['keephigh_help'] = 'Wenn diese Einstellung gesetzt ist, dann werden nur die X höchsten Bewertungen behalten. X ist der benutzte Wert für diese Option.';
$string['keymanager'] = 'Schlüsselverwaltung';
$string['lessthanmin'] = 'Die eingegeben Bewertung für {$a->itemname} für {$a->username} ist niedriger als zulässig.';
$string['letter'] = 'Note';
$string['lettergrade'] = 'Notenstufenbewertung';
$string['lettergradenonnumber'] = 'Niedriger und/oder hoher Wert waren nicht-numerisch für';
$string['letterpercentage'] = 'Note (Prozent)';
$string['letterreal'] = 'Note (dezimal)';
$string['letters'] = 'Notenstufen';
$string['linkedactivity'] = 'Verknüpfte Aktivität';
$string['linkedactivity_help'] = '<h2>Verlinkte Aktivität</h2>
<p>Festlegung der Zuordnung einer Aktivität zu einem Lernziel. Dies ist sinnvoll, um Leistungen der Teilnehmer/innen zu messen, die nicht über Notendimensionen erfasst werden sollen.
</p>';
$string['linktoactivity'] = 'Link zur Aktivität {$a->name}';
$string['lock'] = 'Sperren';
$string['locked'] = 'Gesperrt';
$string['locked_help'] = 'Mit der Aktivierung werden die Bewertungen nicht mehr automatisch durch die Lernaktivität aktualisiert. ';
$string['locktime'] = 'Gesperrt bis';
$string['locktimedate'] = 'Gesperrt nach: {$a}';
$string['lockverbose'] = '{$a->category} {$a->itemmodule} {$a->itemname} sperren';
$string['lowest'] = 'Niedrigste';
$string['lowgradeletter'] = 'Niedrig';
$string['manualitem'] = 'Manueller Aspekt';
$string['mapfrom'] = 'Zuordnung von';
$string['mappings'] = 'Zuordnung von Bewertungsaspekten';
$string['mapto'] = 'Zuordnung auf';
$string['max'] = 'Höchste';
$string['maxgrade'] = 'Beste Bewertung';
$string['meanall'] = 'Alle Bewertungen';
$string['meangraded'] = 'Leere Bewertungen ignorieren';
$string['meanselection'] = 'Ausgewählte Bewertungen für Spalte Durchschnittswerte';
$string['meanselection_help'] = 'Wählen Sie bitte aus, welche Bewertungen in den Spaltendurchschnitt einfließen sollen. Zellen ohne Werte können ignoriert oder als 0 gewertet (Voreinstellung) werden.';
$string['median'] = 'Median';
$string['min'] = 'Niedrigste';
$string['missingscale'] = 'Skala auswählen';
$string['mode'] = 'Modus';
$string['morethanmax'] = 'Die eingegeben Bewertung für {$a->itemname} für {$a->username} ist höher als zulässig.';
$string['moveselectedto'] = 'Ausgewählte Aspekte verschieben nach:';
$string['movingelement'] = '{$a} verschieben';
$string['multfactor'] = 'Multiplikator';
$string['multfactor_help'] = '<h2>Multiplikator</h2>
<p>Faktor mit dem jeder Wert dieser Benotung multipliziert wird. Damit können die Ergebnisse unterschiedlich gewichtet werden.</p>';
$string['mypreferences'] = 'Meine Einstellungen';
$string['myreportpreferences'] = 'Meine Einstellungen für Berichte';
$string['navmethod'] = 'Navigationsmethode';
$string['neverdeletehistory'] = 'Verlauf niemals löschen';
$string['newcategory'] = 'Neue Kategorie';
$string['newitem'] = 'Neuer Bewertungsaspekt';
$string['newoutcomeitem'] = 'Neuer Lernzielaspekt';
$string['no'] = 'Nein';
$string['nocategories'] = 'Kategorien konnten nicht angelegt oder nicht gefunden werden.';
$string['nocategoryname'] = 'Es wurde kein Kategorientitel angegeben';
$string['nocategoryview'] = 'Keine Kategorie zum Anzeigen für';
$string['nocourses'] = 'Bisher sind keine Kurse vorhanden';
$string['noforce'] = 'Nicht festlegen';
$string['nogradeletters'] = 'Keine Noten definiert';
$string['nogradesreturned'] = 'Keine Bewertung zum Anzeigen vorhanden';
$string['noidnumber'] = 'Keine ID-Nummer';
$string['nolettergrade'] = 'Keine Note für';
$string['nomode'] = 'unbekannt';
$string['nonnumericweight'] = 'Nicht-numerischen Wert erhalten für';
$string['nonunlockableverbose'] = 'Die Bewertung kann nicht entsperrt werden bevor {$a->itemname} entsperrt wurde.';
$string['nonweightedpct'] = 'nicht gewichtet %';
$string['nooutcome'] = 'Kein Lernziel';
$string['nooutcomes'] = 'Einzelne Lernziel-Aspekte müssen zu einem Lernziel eines Kurses verlinkt werden, aber in diesem Kurs gibt es keine Lernziele. Möchten Sie eines hinzufügen?';
$string['nopublish'] = 'Nicht veröffentlichen';
$string['norolesdefined'] = 'Es wurden keine Rollen definiert unter Website Administration > Bewertungen > Grundeinstellungen > Bewertete Rollen';
$string['noscales'] = 'Lernziele müssen zu einer Bewertungsskala eines Kurses oder einer globalen Skala zu gewiesen werden, aber es existiert keine. Möchten Sie eine hinzufügen?';
$string['noselectedcategories'] = 'Keine Kategorie wurde ausgewählt.';
$string['noselecteditems'] = 'keine Werte ausgewählt.';
$string['notteachererror'] = 'Diese Funktionen können nur Trainer/innen nutzen';
$string['nousersloaded'] = 'Es wurden keine Nutzer importiert.';
$string['numberofgrades'] = 'Anzahl der Bewertungsstufen';
$string['onascaleof'] = 'auf einer Skala von {$a->grademin} bis {$a->grademax}';
$string['operations'] = 'Vorgänge';
$string['options'] = 'Einstellungen';
$string['outcome'] = 'Lernziel';
$string['outcomeassigntocourse'] = 'Ein anderes Lernziel diesem Kurs zuweisen';
$string['outcomecategory'] = 'Lernziele in der Kategorie erstellen';
$string['outcomecategorynew'] = 'Neue Kategorie';
$string['outcomeconfirmdelete'] = 'Sind Sie sicher, dass Lernziel "{$a}" gelöscht werden soll?';
$string['outcomecreate'] = 'Neues Lernziel hinzufügen';
$string['outcomedelete'] = 'Lernziel löschen';
$string['outcomefullname'] = 'Vollständiger Name';
$string['outcome_help'] = 'Lernziel, das zu diesem Bewertungsaspekt passt';
$string['outcomeitem'] = 'Lernziel';
$string['outcomeitemsedit'] = 'Lernziel bearbeiten';
$string['outcomereport'] = 'Übersicht über die Lernziele';
$string['outcomes'] = 'Lernziele';
$string['outcomescourse'] = 'Lernziele werden im Kurs benutzt';
$string['outcomescoursecustom'] = 'Anpassung benutzt (nicht entfernbar)';
$string['outcomescoursenotused'] = 'Voreinstellung nicht benutzt';
$string['outcomescourseused'] = 'Voreinstellung benutzt (nicht entfernbar)';
$string['outcomescustom'] = 'Angepasste Lernziele';
$string['outcomeshortname'] = 'Kurzbezeichnung';
$string['outcomesstandard'] = 'Standard-Lernziele';
$string['outcomesstandardavailable'] = 'Verfügbare Standard-Lernziele';
$string['outcomestandard'] = 'Standard-Lernziel';
$string['outcomestandard_help'] = '<h2>Standard-Lernziele</h2>
<p>Ein Standard-Lernziel steht in jedem Kurs des gesamten Systems zur Verfügung.</p>';
$string['overallaverage'] = 'Gesamtdurchschnitt';
$string['overridden'] = 'Überschrieben';
$string['overridden_help'] = '<h2>Überschreiben</h2>
<p>Wenn Sie diese Funktion verwenden, verhindern Sie jeden weiteren Versuch des Teilnehmers und damit die Änderung der Bewertung in der Tabelle. Eine manuell vorgenommene Bewertung in der Tabelle kann also nicht mehr durch einen weiteren Testversuch korrigiert werden. Versuche aus der Lernaktivität heraus neue Daten in die Tabelle zu schreiben sind nicht mehr möglich. </p>
<p>Diese Funktion wird vielfach automatisch durch das Bewertungssystem aktiviert. Sie kann manuell an dieser Stelle an- und ausgeschaltet werden.</p>';
$string['overriddennotice'] = 'Die endgültige Bewertung zu dieser Aktivität wurde manuell bearbeitet.';
$string['overridesitedefaultgradedisplaytype'] = 'Voreinstellungen überschreiben';
$string['overridesitedefaultgradedisplaytype_help'] = '<h2>Voreinstellungen für Site überschreiben</h2>
<p>Die Checkkox erlaubt die systemweiten Voreinstellungen für die Bewertungen zu überschreiben. Danach besteht die Möglichkeit Gesamtnotenumrechnungen (Punktwerte in Noten) oder Begrenzungen anzupassen.
</p>';
$string['parentcategory'] = 'Übergeordnete Kategorie';
$string['pctoftotalgrade'] = '% der Gesamtbewertung';
$string['percent'] = 'Prozent';
$string['percentage'] = 'Prozentsatz';
$string['percentageletter'] = 'Prozent (Note)';
$string['percentagereal'] = 'Prozent (real)';
$string['percentascending'] = '% aufsteigend sortieren';
$string['percentdescending'] = '% absteigend sortieren';
$string['percentshort'] = '%';
$string['plusfactor'] = 'Offset';
$string['plusfactor_help'] = '<h2>Zuschlag</h2>
<p>Wert, der zu jeder Bewertung für diese Note hinzuaddiert wird nachdem der Multiplikationsfaktor ausgeführt wurde.</p>';
$string['points'] = 'Punkte';
$string['pointsascending'] = 'sortieren, Punkte aufsteigend';
$string['pointsdescending'] = 'sortieren, Punkte absteigend';
$string['positionfirst'] = 'Erste';
$string['positionlast'] = 'Letzte';
$string['preferences'] = 'Grundeinstellungen';
$string['prefgeneral'] = 'Allgemein';
$string['prefletters'] = 'Notenstufen und -grenzen';
$string['prefrows'] = 'Spezielle Zeilen';
$string['prefshow'] = 'Schalter zeigen/verbergen';
$string['previewrows'] = 'Zeilenvorschau';
$string['profilereport'] = 'Bericht zum Nutzerprofil';
$string['profilereport_help'] = 'Der Bewertungsbericht wird auf der Seite des Nutzerprofils angezeigt.';
$string['publishing'] = 'Veröffentlichen';
$string['quickfeedback'] = 'Schnelles Feedback';
$string['quickgrading'] = 'Schnelle Bewertung';
$string['quickgrading_help'] = '<h2>Schnelle Bewertung</h2>
<p>Die Schnelle Bewertung ergänzt ein Eingabefeld in jeder Zelle der Bewertungstabelle. Damit können  mehrere Bewertungen auf einer Seite schnell eingegeben werden. Mit einem Klick auf den Aktualisierungsbutton werden alle Bewertungen auf einmal abgespeichert. </p>';
$string['range'] = 'Bereich';
$string['rangedecimals'] = 'Dezimalstellen für Spannbreite';
$string['rangedecimals_help'] = 'Zahl der Dezimalstellen, um die Spannbreite der Ergebnisse anzuanzeigen ';
$string['rangesdecimalpoints'] = 'Nachkommastellen in Bereichen';
$string['rangesdecimalpoints_help'] = '<h2>Dezimalwerte  anzeigen im Bewertungsbereich</h2>
<p>Festlegung der Zahl der Dezimalziffern für jeden Bewertungsbereich. Die Einstellung kann für jede einzelne Bewertungsspalte überschrieben werden.</p>';
$string['rangesdisplaytype'] = 'Bereichsanzeige';
$string['rangesdisplaytype_help'] = '<h2>Anzeige des Bewertungsbereichs</h2>
<p>Festlegung wie der Bewertungsbereich angezeigt wird. Wenn \'Vererben\' ausgewählt wurde, wird der Anzeigetyp in jeder Spalte verwendet.</p>';
$string['rank'] = 'Rang';
$string['rawpct'] = 'Rohwert %';
$string['real'] = 'Punkte';
$string['realletter'] = 'Real (Noten)';
$string['realpercentage'] = 'Real (Prozent)';
$string['recovergradesdefault'] = 'Bewertungen wiederherstellen';
$string['recovergradesdefault_help'] = 'Standardmäßig werden alte Bewertungen wiederhergestellt, wenn Nutzer/innen erneut in einen Kurs eingeschrieben werden.';
$string['regradeanyway'] = 'Auf jeden Fall neu bewerten';
$string['removeallcoursegrades'] = 'Alle Bewertungen löschen';
$string['removeallcourseitems'] = 'Alle Aspekte und Kategorien löschen';
$string['report'] = 'Bericht';
$string['reportdefault'] = 'Voreinstellung für Bericht ({$a})';
$string['reportplugins'] = 'Plugins für Berichte';
$string['reportsettings'] = 'Berichtseinstellungen';
$string['reprintheaders'] = 'Kopfzeilen wiederholen';
$string['respectingcurrentdata'] = 'Die aktuelle Konfiguration wird nicht verändert.';
$string['rowpreviewnum'] = 'Zeilenvorschau';
$string['savechanges'] = 'Änderungen speichern';
$string['savepreferences'] = 'Grundeinstellungen speichern';
$string['scaleconfirmdelete'] = 'Sind Sie sicher, dass Sie die Skala "{$a}" löschen möchten?';
$string['scaledpct'] = 'Berechnete %';
$string['seeallcoursegrades'] = 'Alle Kursbewertungen anzeigen';
$string['selectalloroneuser'] = 'Alle oder einen auswählen';
$string['selectauser'] = 'Nutzer/in wählen';
$string['selectdestination'] = 'Ziel für {$a} auswählen';
$string['separator'] = 'Trennzeichen';
$string['sepcomma'] = 'Komma';
$string['septab'] = 'Tab';
$string['setcategories'] = 'Kategorien einrichten';
$string['setcategorieserror'] = 'Sie müssen Kategorien anlegen, bevor diese gewichtet werden können.';
$string['setgradeletters'] = 'Noten definieren';
$string['setpreferences'] = 'Grundeinstellungen';
$string['setting'] = 'Einstellung';
$string['settings'] = 'Einstellungen';
$string['setweights'] = 'Kategorien gewichten';
$string['showactivityicons'] = 'Aktivitätssymbole zeigen';
$string['showactivityicons_help'] = '<h2>Anzeige der Icons für Lernaktivitäten</h2>
<p>Ergänzt eine Anzeige der Icons der verschiedenen Lernaktivitäten neben dem Namen der bewerteten Lernaktivität.</p>';
$string['showallhidden'] = 'Verborgene anzeigen';
$string['showallstudents'] = 'Alle Teilnehmer/innen anzeigen';
$string['showanalysisicon'] = 'Icon zur Bewertungsanalyse anzeigen';
$string['showanalysisicon_desc'] = 'Soll das Icon zur Bewertungsanalyse standardmässig angezeigt werden? Wenn die Aktivität die Funktion unterstützt wird ein Link mit einer detaillierten Erläuterung der Bewertung angezeigt.';
$string['showanalysisicon_help'] = 'Wenn die Aktivität die Funktion unterstützt wird ein Link mit einer detaillierten Erläuterung der Bewertung angezeigt.';
$string['showaverage'] = 'Mittelwert anzeigen';
$string['showaverage_help'] = 'Alte Nutzerbewertungen wiederherstellen, falls möglich';
$string['showaverages'] = 'Spaltendurchschnitt anzeigen';
$string['showaverages_help'] = 'Spaltendurchschnitte in der Bewerterübersicht anzeigen';
$string['showcalculations'] = 'Berechnungen anzeigen';
$string['showcalculations_help'] = 'Rechner-Symbol neben den Bewertungsaspekten und -kategorien anzeigen, Tooltipps über den berechneten Elementen und eine Markierung, dass eine Spalte berechnet wurde.';
$string['showeyecons'] = 'Icons anzeigen/verbergen';
$string['showeyecons_help'] = 'Symbol zur Sichtbarkeit (Auge) neben jeder Bewertung anzeigen, um die Sichtbarkeit für Teilnehmer/innen zu kontrollieren';
$string['showfeedback'] = 'Feedback anzeigen';
$string['showfeedback_help'] = 'Spalte für Feedback anzeigen?';
$string['showgrade'] = 'Bewertung anzeigen';
$string['showgrade_help'] = 'Spalte für Bewertung anzeigen?';
$string['showgroups'] = 'Gruppen anzeigen';
$string['showhiddenitems'] = 'Verborgene Werte anzeigen';
$string['showhiddenitems_help'] = 'Diese Einstellung legt fest, ob verborgene Elemente angezeigt werden.

* Verborgene anzeigen - Verborgene Bewertungselemente werden grau gezeigt, wobei die Bewertung unsichtbar bleibt
* Nur verborgen bis - Bewertungselemente mit einem Zeitpunkt "Verborgen bis" werden grau gezeigt, wobei die Bewertung  unsichtbar ist. Ab dem gesetzten Zeitpunkt wird das Element vollständig angezeigt
* Nicht anzeigen - Bewertungselemente sind vollständig unsichtbar';
$string['showhiddenuntilonly'] = 'Nur verborgen bis';
$string['showlettergrade'] = 'Notenbewertung anzeigen';
$string['showlettergrade_help'] = 'Spalte für Notenbewertung anzeigen?';
$string['showlocks'] = 'Sperrungen anzeigen';
$string['showlocks_help'] = 'Symbol zum Sperren bzw. Freigeben neben jeder Bewertung anzeigen';
$string['shownohidden'] = 'Nicht anzeigen';
$string['shownooutcomes'] = 'Lernziele verbergen';
$string['shownumberofgrades'] = 'Anzahl in Durchschnittsbewertungen anzeigen';
$string['shownumberofgrades_help'] = 'Anzahl der erfassten Bewertungen in Klammern neben dem Durchschnittswert anzeigen. Beispiel: 45 (34)';
$string['showpercentage'] = 'Prozentwerte anzeigen';
$string['showpercentage_help'] = 'Legt fest, ob Prozentwerte für jede Bewertung angezeigt werden.';
$string['showquickfeedback'] = 'Schnelles Feedback anzeigen';
$string['showquickfeedback_help'] = 'Schnelles Feedback stellt ein Texteingabefeld zu jeder Einzelbewertung zur Verfügung. Auf einer Seite können dann viele Bewertungen auf einmal bearbeitet werden. Die Schaltfläche \'Aktualisieren\' erlaubt alle Änderungen auf einmal abzuspeichern.';
$string['showrange'] = 'Spannbreite anzeigen';
$string['showrange_help'] = 'Spalte für die Spannbreite der Ergebnisse anzeigen?';
$string['showranges'] = 'Stufen anzeigen';
$string['showranges_help'] = 'Zeile anzeigen, die die möglichen Bereiche für alle Bewertungen in der Bewerterübersicht darstellt';
$string['showrank'] = 'Rang anzeigen';
$string['showrank_help'] = 'Rang für jeden Aspekt anzeigen';
$string['showuserimage'] = 'Nutzerbilder anzeigen';
$string['showuserimage_help'] = 'Nutzerbild neben dem Namen in der Bewerterübersicht anzeigen';
$string['showverbose'] = '{$a->category} {$a->itemmodule} {$a->itemname} anzeigen';
$string['showweight'] = 'Gewichtungen anzeigen';
$string['showweight_help'] = 'Spalte für die Bewertungsgewichtung anzeigen?';
$string['simpleview'] = 'Vereinfachte Ansicht';
$string['sitewide'] = 'Für die ganze Website';
$string['sort'] = 'sortieren';
$string['sortasc'] = 'Aufsteigend sortieren';
$string['sortbyfirstname'] = 'Sortieren nach Vorname';
$string['sortbylastname'] = 'Sortieren nach Nachname';
$string['sortdesc'] = 'Absteigend sortieren';
$string['standarddeviation'] = 'Standardabweichung';
$string['stats'] = 'Statistik';
$string['statslink'] = 'Statistik';
$string['student'] = 'Teilnehmer/in';
$string['studentsperpage'] = 'Teilnehmer/innen pro Seite';
$string['studentsperpage_help'] = 'Anzahl der Teilnehmer/innen, die pro Seite in der Bewertungsübersicht gezeigt werden';
$string['studentsperpagereduced'] = 'Verringert die Höchstzahl der Teilnehmenden pro Seite von {$a->originalstudentsperpage} auf {$a->studentsperpage}. Die PHP Einstellung max_input_vars sollte auf  {$a->maxinputvars} gesetzt werden.';
$string['subcategory'] = 'Kategorie normal';
$string['submissions'] = 'Einträge';
$string['submittedon'] = 'Erstellt: {$a}';
$string['switchtofullview'] = 'Zur vollständigen Ansicht wechseln';
$string['switchtosimpleview'] = 'Zur vereinfachten Ansicht wechseln';
$string['tabs'] = 'Registerkarten';
$string['topcategory'] = 'Kategorie super';
$string['total'] = 'Gesamt';
$string['totalweight100'] = 'Summe der Gewichtungen ist 100';
$string['totalweightnot100'] = 'Summe der Gewichtungen ist nicht 100';
$string['turnfeedbackoff'] = 'Feedback einschalten';
$string['turnfeedbackon'] = 'Feedback ausschalten';
$string['typenone'] = 'Keines';
$string['typescale'] = 'Skala';
$string['typescale_help'] = '<h2>Bewertungsskala</h2>
<p>Wenn eine Skalenbewertung verwendet wird, kann diese aus den vorhandenen Skalentypen ausgewählt werden. Die Bewertungsskala für eine Lernaktivität wird auf der Einstellungsseite der jeweiligen Lernaktivität vorgenommen.</p>';
$string['typetext'] = 'Text';
$string['typevalue'] = 'Wert';
$string['uncategorised'] = 'Nicht kategorisiert';
$string['unchangedgrade'] = 'Unveränderte Bewertungen';
$string['unenrolledusersinimport'] = 'Beim Import werden Bewertungen der folgenden Teilnehmer/innen importiert, die zur Zeit nicht im Kurs registriert sind: {$a}';
$string['unlimitedgrades'] = 'Offene Bewertung';
$string['unlimitedgrades_help'] = 'Standardmäßig sind Bewertungen durch Minimal- und Maximalwert einer Bewertungsstufe definiert. Falls diese Einstellung aktiviert wird, entfällt die Einschränkung und erlaubt das direkte Eintragen von Bewertungen über 100%. Es wird empfohlen, diese Einstellung nicht während der Spitzenzeiten aktiviert, weil dann alle Bewertungen neu berechnet werden und dies zu einer starken Serverlast führen kann.';
$string['unlock'] = 'Freigeben';
$string['unlockverbose'] = '{$a->category} {$a->itemmodule} {$a->itemname} entsperren';
$string['unused'] = 'Unbenutzt';
$string['updatedgradesonly'] = 'Nur neue oder aktualisierte Bewertungen exportieren';
$string['uploadgrades'] = 'Bewertungen hochladen';
$string['useadvanced'] = 'Erweiterte Funktionen nutzen';
$string['usedcourses'] = 'Benutzte Kurse';
$string['usedgradeitem'] = 'Benutzte Bewertungsaspekte';
$string['usenooutcome'] = 'Keine Lernziele nutzen';
$string['usenoscale'] = 'Keine Skala nutzen';
$string['usepercent'] = 'Prozentwerte verwenden';
$string['user'] = 'Nutzer/in';
$string['userenrolmentsuspended'] = 'Nutzereinschreibung gesperrt';
$string['usergrade'] = 'Nutzer/in {$a->fullname} ({$a->useridnumber}) mit Wert {$a->gradeidnumber}';
$string['userpreferences'] = 'Nutzereinstellungen';
$string['useweighted'] = 'Gewichtung verwenden';
$string['verbosescales'] = 'Wortreiche Skalen';
$string['viewbygroup'] = 'Gruppe';
$string['viewgrades'] = 'Bewertungen anzeigen';
$string['warningexcludedsum'] = 'Warnung: Der Ausschluss von Bewertungen ist nicht kompatibel mit der Bildung der Gesamtsumme.';
$string['weight'] = 'Gewichtung';
$string['weightcourse'] = 'Gewichtete Bewertung im Kurs benutzen';
$string['weightedascending'] = 'Sortierung nach % gewichtet, aufsteigend';
$string['weighteddescending'] = 'Sortierung nach % gewichtet, absteigend';
$string['weightedpct'] = 'Gewichtung in %';
$string['weightedpctcontribution'] = 'Gewichtung in % der Zugaben';
$string['weightorextracredit'] = 'Gewichtung oder Zusatzpunkte';
$string['weights'] = 'Gewichtungen';
$string['weightsedit'] = 'Gewichtungen oder Zusatzpunkte ändern';
$string['weightuc'] = 'Gewichtung';
$string['writinggradebookinfo'] = 'Einstellungen festhalten';
$string['xml'] = 'XML';
$string['yes'] = 'Ja';
$string['yourgrade'] = 'Ihre Bewertung';
