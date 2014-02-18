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
 * Strings for component 'qtype_pmatch', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_pmatch
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmoreanswerblanks'] = 'Leerfeld für {$a} weitere Antworten';
$string['addmoresynonymblanks'] = 'Leerfeld für {$a} weitere Synonyme';
$string['allowsubscript'] = 'Benutzung von tiefgestellten Buchstaben erlauben';
$string['allowsuperscript'] = 'Benutzung von hochgestellten Buchstaben erlauben';
$string['answer'] = 'Antwort: {$a}';
$string['answeringoptions'] = 'Optionen für Antworten';
$string['answermustbegiven'] = 'Sie müssen eine Antwort eingeben, wenn es eine Note oder Feedback gibt.';
$string['answerno'] = 'Antwort {$a}';
$string['anyotheranswer'] = 'Jede andere Antwort';
$string['applydictionarycheck'] = 'Rechtschreibung des Teilnehmers überprüfen';
$string['caseno'] = 'Nein, Groß- und Kleinschreibung ist unwichtig';
$string['casesensitive'] = 'Groß- und Kleinschreibung';
$string['caseyes'] = 'Ja, Groß- und Kleinschreibung muß stimmen';
$string['converttospace'] = 'Folgende Zeichen in Leerzeichen umwandeln';
$string['correctanswers'] = 'Richtige Antworten';
$string['env_dictmissing'] = 'Sprachpacket  \'{$a->humanfriendlylang}\' ({$a->lang}) installiert, konnte aber das pspell dictionary ({$a->langforspellchecker}) nicht finden.';
$string['env_dictmissing2'] = 'Teilnehmer hat eine Rechtschreibprüfung in der Sprache \'{$a}\' probiert. Leider ist das aspell dictionary für diese Sprache nicht installiert.';
$string['env_dictok'] = 'Sprachpacket \'{$a->humanfriendlylang}\' ({$a->lang}) installiert und pspell dictionary für die Sprache ({$a->langforspellchecker}) ebenfalls installiert.';
$string['environmentcheck'] = 'Prüfung, ob die Anforderungen des Musterabgleich-Fragetyps vom Server erfüllt werden';
$string['env_peclnormalisationmissing'] = 'PECL Package for Unicode Normalizer scheint nicht korrekt installiert zu sein';
$string['env_peclnormalisationok'] = 'PECL Package for Unicode Normalizer scheint korrekt installiert zu sein';
$string['env_pspellmissing'] = 'Pspell library scheint nicht korrekt installiert zu sein';
$string['env_pspellok'] = 'Pspell library scheint korrekt installiert zu sein';
$string['extenddictionary'] = 'Diese Worte dem Wörterbuch hinzufügen';
$string['filloutoneanswer'] = 'Benutzen Sie die Musterabgleich-Syntax, um die richtige Antwort zu beschreiben. Sie müssen mindestens eine Antwort vorgeben. Leergelassene Antworten werden nicht verwendet. Die erste passende Antwort wird genommen und benutzt, um das Ergebnis und das Feedback zu bestimmen.';
$string['forcelength'] = 'Wenn die Antwort länger als 20 Wörter ist';
$string['forcelengthno'] = 'nicht warnen';
$string['forcelengthyes'] = 'warnen, dass die Antwort zu lang ist, und den Studenten auffordern, sie zu kürzen';
$string['ie_illegaloptions'] = 'Unzulässige Option in Ausdruck "match<strong><em>{$a}</em></strong>()".';
$string['ie_lastsubcontenttypeorcharacter'] = 'Das Oder-Zeichen darf den Teiltext "{$a}" nicht beenden.';
$string['ie_lastsubcontenttypeworddelimiter'] = 'Das Wortbegrenzungszeichen darf den Teiltext "{$a}" nicht beenden.';
$string['ie_missingclosingbracket'] = 'Schließende Klammer fehlt im Code Fragment "{$a}".';
$string['ie_nomatchfound'] = 'Fehler im Musterabgleichs-Code.';
$string['ie_unrecognisedexpression'] = 'Unerkannter Ausdruck.';
$string['ie_unrecognisedsubcontents'] = 'Nicht erkannter Teiltext im Code Fragment "{$a}".';
$string['inputareatoobig'] = 'Der Eingabebereich, der von "{$a}" bestimmt wurde, ist zu groß. Die Größe eines Eingabebereichs ist auf eine Breite von 150 und eine Höhe von 100 Zeichen beschränkt.';
$string['nomatchingsynonymforword'] = 'Keine Synonyme für das Wort angegeben. Löschen Sie das Wort oder geben Sie Synonyme an.';
$string['nomatchingwordforsynonym'] = 'Sie haben kein Wort angegeben, für welches das Synonym stellvertretend ist. Löschen Sie das Synonym oder geben Sie ein stellvertretendes Wort an.';
$string['notenoughanswers'] = 'Diese Frageart erfordert mindestens {$a} Antworten';
$string['pleaseenterananswer'] = 'Bitte geben Sie eine Antwort ein.';
$string['pluginname'] = 'Musterabgleich';
$string['pluginnameadding'] = 'Musterabgleichs-Frage hinzufügen';
$string['pluginnameediting'] = 'Musterabgleichs-Frage bearbeiten';
$string['pluginname_help'] = 'Der Teilnehmende schreibt einen kurzen Satz als Antwort auf eine Frage (diese kann ein Bild enthalten). Es kann mehrere richtige Antworten geben, welche unterschiedlich gewertet werden. Wenn die Groß- und Kleinschreibungsoption ausgewählt ist, kann es verschiedene Wertungen für "Wort" oder "wort" geben.';
$string['pluginnamesummary'] = 'Erlaubt eine kurze Antwort für einen oder mehrere Sätze, welche nach dem Abgleich mit mehreren Muster-Antworten (beschrieben durch die OU Musterabgleichs-Syntax) unterschiedlich bewertet werden können.';
$string['repeatedword'] = 'Dieses Wort taucht mehrmals in der Synonymliste auf.';
$string['spellingmistakes'] = 'Das folgende Wort ist nicht in unserem Wörterbuch: {$a}. Bitte korrigieren Sie Ihre Rechtschreibung.';
$string['subsuponelineonly'] = 'Der Editor für hoch-/tiefgestellte Buchstaben kann nur in einer einzeiligen Eingabebox verwendet werden.';
$string['synonym'] = 'Synonyme';
$string['synonymcontainsillegalcharacters'] = 'Synonym enthält ungültige Zeichen';
$string['synonymsheader'] = 'Synonyme für Wörter in der Antwort festlegen';
$string['toomanywords'] = 'Ihre Antwort ist zu lang. Bitte ändern Sie die Antwort auf weniger als 20 Worte.';
$string['unparseable'] = 'Wir verstehen die Buchstaben oder Satzzeichen bei "{$a}" nicht.';
$string['wordcontainsillegalcharacters'] = 'Wort enthält ungültige Zeichen.';
$string['wordwithsynonym'] = 'Wort';
