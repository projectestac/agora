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
 * Strings for component 'qtype_calculated', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   qtype_calculated
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additem'] = 'Eintrag hinzufügen';
$string['addmoreanswerblanks'] = 'Weiteres Antwortfeld hinzufügen';
$string['addmoreunitblanks'] = 'Leerfeld für {$a} weitere Abschnitte';
$string['addsets'] = 'Datensatz/-sätze hinzufügen';
$string['answerhdr'] = 'Antwort';
$string['answerstoleranceparam'] = 'Antworttoleranzen';
$string['answerwithtolerance'] = '{$a->answer} (±{$a->tolerance} {$a->tolerancetype})';
$string['anyvalue'] = 'Jeder Wert';
$string['atleastoneanswer'] = 'Sie müssen mindestens eine Antwort angeben.';
$string['atleastonerealdataset'] = 'Im Fragetext sollte mindestens einer realer Datensatz vorkommen.';
$string['atleastonewildcard'] = 'In der Antwortformel oder im Fragetext sollte mindestens ein Ersatzzeichen vorkommen.';
$string['calcdistribution'] = 'Verteilung';
$string['calclength'] = 'Dezimalstellen';
$string['calcmax'] = 'Maximum';
$string['calcmin'] = 'Minimum';
$string['choosedatasetproperties'] = 'Datensatzeinstellungen für Ersatzzeichen auswählen';
$string['choosedatasetproperties_help'] = 'Ein Datensatz ist ein Satz von Werten, die anstelle der Ersatzzeichen eingefügt werden. Sie können einen individuellen Datensatz für eine spezielle Frage anlegen oder ein gemeinsamen, in mehreren Fragen der Kategorie benutzten Datensatz ';
$string['correctanswerformula'] = 'Richtige Antwortformel';
$string['correctanswershows'] = 'Anzeige für richtige Antwort';
$string['correctanswershowsformat'] = 'Format';
$string['correctfeedback'] = 'Für jede richtige Antwort';
$string['dataitemdefined'] = 'mit {$a} numerischen Wert(en) steht/en bereits zur Verfügung';
$string['datasetrole'] = 'Die Ersatzzeichen <strong>{x..}</strong> werden durch numerische Werte aus ihrem Datensatz ersetzt';
$string['decimals'] = 'mit {$a}';
$string['deleteitem'] = 'Gelöschter Eintrag';
$string['deletelastitem'] = 'Zuletzt gelöschter Eintrag';
$string['editdatasets'] = 'Datensatz für Ersatzzeichen bearbeiten';
$string['editdatasets_help'] = 'Ein Datensatz für die Ersatzzeichen kann erstellt werden, indem jeweils eine Zahl in die Ersatzzeichenfelder eingetragen und anschließend die Taste \'Hinzufügen\' gedrückt wird. Um automatisch 10 oder mehr Datensätze zu erstellen, wählen Sie die Anzahl der Datensätze aus, bevor Sie die Taste drücken. Eine einfache Verteilung erzeugt die Werte gleichmäßig verteilt zwischen den vorgegebenen Grenzen, eine logarithmische Verteilung bevorzugt Werte in der Nähe der unteren Grenze.';
$string['existingcategory1'] = 'wird einen bereits existierenden gemeinsamen Datensatz verwenden';
$string['existingcategory2'] = 'eine bestehende Datei, die auch von anderen Fragen in dieser Kategorie genutzt wird';
$string['existingcategory3'] = 'ein bestehender Link, der auch von anderen Fragen in dieser Kategorie genutzt wird ';
$string['forceregeneration'] = 'Erneuerung erzwingen';
$string['forceregenerationall'] = 'Erneuerung aller Ersatzzeichen erzwingen';
$string['forceregenerationshared'] = 'Erneuerung der nicht gemeinsamen Ersatzzeichen erzwingen';
$string['functiontakesatleasttwo'] = 'Die Funktion {$a} muss mindestens zwei Argumente haben';
$string['functiontakesnoargs'] = 'Die Funktion {$a} darf kein Argument haben';
$string['functiontakesonearg'] = 'Die Funktion {$a} muss genau ein Argument haben';
$string['functiontakesoneortwoargs'] = 'Die Funktion {$a} muss entweder ein oder zwei Argumente haben';
$string['functiontakestwoargs'] = 'Die Funktion {$a} muss genau zwei Argumente haben';
$string['generatevalue'] = 'Wählen Sie einen neuen Wert zwischen';
$string['getnextnow'] = 'Jetzt neuen \'Wert zum Hinzufügen\' erzeugen';
$string['hexanotallowed'] = 'Der Datensatz <strong>{$a->name}</strong> enthält einen nicht erlaubten Hexadezimal-Wert: {$a->value}';
$string['illegalformulasyntax'] = 'Ungültige Formelsyntax beginnend mit \'{$a}';
$string['incorrectfeedback'] = 'Für jede falsche Antwort';
$string['itemno'] = 'Eintrag {$a}';
$string['itemscount'] = 'Werte <br />Zahl';
$string['itemtoadd'] = 'Hinzuzufügender Wert';
$string['keptcategory1'] = 'wird denselben existierenden Datensatz wie zuvor verwenden';
$string['keptcategory2'] = 'eine Datei aus der selben Kategorie wiederverwendbarer Datei wie zuvor';
$string['keptcategory3'] = 'ein Link aus der selben Kategorie wiederverwendbarer Dateien wie zuvor';
$string['keptlocal1'] = 'wird denselben existierenden privaten Datensatz wie zuvor verwenden';
$string['keptlocal2'] = 'eine Datei aus dem persönlichen Fragenset wie zuvor';
$string['keptlocal3'] = 'ein Link aus dem persönlichen Fragenset wie zuvor';
$string['loguniform'] = 'Logarithmisch';
$string['loguniformbit'] = 'Ziffern einer logarithmischen Verteilung';
$string['makecopynextpage'] = 'Nächste Seite (neue Frage)';
$string['mandatoryhdr'] = 'Obligatorische Ersatzzeichen in Antworten vorhanden';
$string['max'] = 'Max';
$string['min'] = 'Min';
$string['minmax'] = 'Wertebereich';
$string['missingformula'] = 'Formel fehlt';
$string['missingname'] = 'Fragename fehlt';
$string['missingquestiontext'] = 'Fragetext fehlt';
$string['mustbenumeric'] = 'Sie müssen hier eine Zahl eingeben.';
$string['mustenteraformulaorstar'] = 'Sie müssen eine Formel oder \'*\' eingeben';
$string['mustnotbenumeric'] = 'Dies darf keine Zahl sein.';
$string['newcategory1'] = 'wird einen neuen gemeinsamen Datensatz verwenden';
$string['newcategory2'] = 'eine Datei aus einen neuen Set von Dateien, die auch von anderen Fragen in dieser Kategorie verwendet werden kann. ';
$string['newcategory3'] = 'ein Link aus einen neuen Set von Links, der auch von anderen Fragen in dieser Kategorie verwendet werden kann. ';
$string['newlocal1'] = 'Einen neuen privaten Datensatz verwenden';
$string['newlocal2'] = 'eine Datei aus einen neuen Set von Dateien, die nur für diese Frage genutzt werden kann. ';
$string['newlocal3'] = 'eine Link aus einen neuen Set von Links, der nur für diese Frage genutzt werden kann. ';
$string['newsetwildcardvalues'] = 'Neue Datensätze von Ersatzzeichenwerten';
$string['nextitemtoadd'] = 'Weiteren \'Eintrag hinzufügen\'';
$string['nextpage'] = 'Nächste Seite';
$string['nocoherencequestionsdatyasetcategory'] = 'Die gewählte Wildcardkategorie {$a->name} ist nicht identisch mit der Kategorie  id {$a->qcat} von Frage id {$a->qid}. Bearbeiten Sie bitte die Frage.';
$string['nocommaallowed'] = 'Kein Komma zulässig! Verwenden Sie bitte einen Punkt in 0.013 oder 1.3e-2. ';
$string['nodataset'] = 'Nichts - das ist kein Ersatzzeichen';
$string['nosharedwildcard'] = 'Kein gemeinsames Ersatzzeichen in dieser Kategorie';
$string['notvalidnumber'] = 'Der Wert für das Ersatzzeichen ist keine gültige Zahl';
$string['oneanswertrueansweroutsidelimits'] = 'Wenigstens eine richtige Antwort liegt außerhalb des Wertebereichs. <br />. Passen Sie die Toleranzwerte in den erweiterten Einstellungen an.';
$string['param'] = 'Parameter {<strong>{$a}</strong>}';
$string['partiallycorrectfeedback'] = 'Für jede teilweise richtige Antwort';
$string['pluginname'] = 'Berechnet';
$string['pluginnameadding'] = 'Eine berechnete Frage hinzufügen';
$string['pluginnameediting'] = 'Berechnete Frage ändern';
$string['pluginname_help'] = 'Berechnete Multiple-Choice-Fragen entsprechen normalen Multiple-Choice-Fragen, können aber im Gegensatz zu diesen Ersatzzeichen (Wildcards) in geschweiften Klammern enthalten, welche dann bei der Durchführung des Tests durch vordefinierte Werte ersetzt werden. Beispiel: Auf die Frage "Welche Fläche hat ein Rechteck mit der Länger {l} und der Breite {b}?" wäre "{={l}*{b}}" eine Antwortmöglichkeit (das Sternchen (*) steht für die Multiplikation).';
$string['pluginnamesummary'] = 'Berechnete Fragen ähneln numerischen Fragen. Die Zahlen werden jedoch zufällig beim Start des Tests gewählt.';
$string['possiblehdr'] = 'Mögliche Ersatzzeichen nur im Fragetext vorhanden';
$string['questiondatasets'] = 'Datensätze für Fragen';
$string['questiondatasets_help'] = 'Datensatz für Wildcards der Frage, die nur in dieser Frage genutzt werden';
$string['questionstoredname'] = 'gespeicherter Titel für Frage';
$string['replacewithrandom'] = 'Durch Zufallswert ersetzen';
$string['reuseifpossible'] = 'Vorherigen Wert benutzen falls verfügbar';
$string['setno'] = 'Satz {$a}';
$string['setwildcardvalues'] = 'Sätze von Ersatzzeichenwerten';
$string['sharedwildcard'] = 'Gemeinsames Ersatzzeichen {<strong>{$a}</strong>}';
$string['sharedwildcardname'] = 'Gemeinsames Ersatzzeichen';
$string['sharedwildcards'] = 'Gemeinsame Ersatzzeichen';
$string['showitems'] = 'Anzeigen';
$string['significantfigures'] = 'mit {$a}';
$string['significantfiguresformat'] = 'signifikante Zeichen';
$string['synchronize'] = 'Daten von gemeinsam genutzten Datensätzen im Test synchronisieren';
$string['synchronizeno'] = 'Nicht synchronisieren';
$string['synchronizeyes'] = 'Synchronisieren';
$string['synchronizeyesdisplay'] = 'Gemeinsam genutzte Datensatztitel als Prefix vor Fragetitel anzeigen und synchronisieren';
$string['tolerance'] = 'Toleranz ±';
$string['trueanswerinsidelimits'] = 'Richtige Antwort: {$a->correct} liegt innerhalb der Grenzen des wahren Wertes {$a->true}';
$string['trueansweroutsidelimits'] = '<span class="error">Fehler in der richtigen Antwort: {$a->correct} liegt außerhalb der Grenzen des wahren Wertes {$a->true}</span>';
$string['uniform'] = 'Einfach';
$string['uniformbit'] = 'Dezimalzahlen aus einer gleichmäßigen Verteilung';
$string['unsupportedformulafunction'] = 'Die Funktion {$a} wird nicht unterstützt';
$string['updatecategory'] = 'Kategorie aktualisieren';
$string['updatedatasetparam'] = 'Datensatzparameter aktualisieren';
$string['updatetolerancesparam'] = 'Antworttoleranzen aktualisieren';
$string['updatewildcardvalues'] = 'Erzatzzeichenwerte aktualisieren';
$string['useadvance'] = '\'Erweitert\'-Button für Fehlerinformationen';
$string['usedinquestion'] = 'In Fragen verwendet';
$string['wildcard'] = 'Ersatzzeichen <strong>{$a}</stron';
$string['wildcardparam'] = 'Ersatzzeichenparameter werden benutzt, um die Werte zu erzeugen';
$string['wildcardrole'] = 'Anstelle der Ersatzzeichen <strong>{x..}</strong> werden Zahlen aus den erzeugten Wertemengen eingefügt';
$string['wildcards'] = 'Ersatzzeichen {a}...{z}';
$string['wildcardvalues'] = 'Ersatzzeichenwerte';
$string['wildcardvaluesgenerated'] = 'Ersatzzeichenwerte erzeugt';
$string['youmustaddatleastoneitem'] = 'Sie müssen mindestens einen Datensatzelement hinzufügen, bevor Sie die Frage speichern können';
$string['youmustaddatleastonevalue'] = 'Sie müssen mindestens einen Datensatz von Ersatzzeichenwerten hinzufügen, bevor Sie die Frage speichern können';
$string['youmustenteramultiplierhere'] = 'Sie müssen hier einen Multiplikationsfaktor eingeben.';
$string['zerosignificantfiguresnotallowed'] = 'Die richtige Antwort darf nicht aus Null signifikanten Zeichen bestehen!';
