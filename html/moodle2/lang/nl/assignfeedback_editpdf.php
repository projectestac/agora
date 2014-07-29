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
 * Strings for component 'assignfeedback_editpdf', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_editpdf
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtoquicklist'] = 'Voeg toe aan snellijst';
$string['annotationcolour'] = 'Annotatiekleur';
$string['black'] = 'Zwart';
$string['blue'] = 'Blauw';
$string['cannotopenpdf'] = 'Kan het PDF-bestand niet openen. Het bestand kan corrupt zijn of in een niet-ondersteund formaat.';
$string['clear'] = 'Wissen';
$string['colourpicker'] = 'Kleurkiezer';
$string['command'] = 'Commando:';
$string['comment'] = 'Opmerkingen';
$string['commentcolour'] = 'Kleur opmerkingen';
$string['commentcontextmenu'] = 'Contextmenu opmerkingen';
$string['couldnotsavepage'] = 'Kon pagina {$a} niet bewaren';
$string['currentstamp'] = 'Stempel';
$string['deleteannotation'] = 'Verwijder annotatie';
$string['deletecomment'] = 'Verwijder opmerking';
$string['deletefeedback'] = 'Verwijder feedback PDF';
$string['downloadablefilename'] = 'feedback.pdf';
$string['downloadfeedback'] = 'Download feedback PDF';
$string['editpdf'] = 'Annoteer PDF';
$string['editpdf_help'] = 'Annoteer de inzendingen van de leerlingen rechtstreeks in je browser en maak een bewerkte downloadbare PDF.';
$string['enabled'] = 'Annoteer PDF';
$string['enabled_help'] = 'Indien ingeschakeld zal de leraar annoteerbare PDF-bestanden kunnen maken tijdens het beoordelen van de opdrachten. Hiermee kan de leraar opmerkingen toevoegen, tekeningen en stempels, rechtstreeks op het werk van de leerling. Het annoteren gebeurt in de browser - er is geen extra software vereist.';
$string['errorgenerateimage'] = 'Fout bij het genereren van een afbeelding met ghostscript, foutopsporingsinformatie: {$a}';
$string['filter'] = 'Filter opmerkingen...';
$string['generatefeedback'] = 'Genereer feedback PDF';
$string['generatingpdf'] = 'PDF aan het genereren...';
$string['gotopage'] = 'Ga naar pagina';
$string['green'] = 'Groen';
$string['gspath'] = 'Ghostscript pad';
$string['gspath_help'] = 'Op de meeste Linux-installaties kan dit gelaten worden als \'/usr/bin/gs\'. Op Windows zal het iets zijn als \'c:gsbingswin32c.exe\' (zorg er voor dat er geen spaties in het pad staan - indien nodig kopieer de bestanden \'gswin32c.exe\' en \'gsdll32.dll\' naar een nieuwe map zonder spaties in het pad)';
$string['highlight'] = 'Markeer';
$string['jsrequired'] = 'Het annoteren van PDF-documenten vereist javascript. Schakel Javascript in in je browser als je deze functie wil gebruiken';
$string['launcheditor'] = 'Start PDF-editor...';
$string['line'] = 'Lijn';
$string['loadingeditor'] = 'PDF-editor aan het laden';
$string['navigatenext'] = 'Volgende pagina';
$string['navigateprevious'] = 'Vorige pagina';
$string['output'] = 'Output:';
$string['oval'] = 'Ovaal';
$string['pagenumber'] = 'pagina {$a}';
$string['pagexofy'] = 'Pagina {$a->page} van {$a->total}';
$string['pen'] = 'Pen';
$string['pluginname'] = 'Annoteer PDF';
$string['rectangle'] = 'Rechthoek';
$string['red'] = 'Rood';
$string['result'] = 'Resultaat:';
$string['searchcomments'] = 'Zoek opmerkingen';
$string['select'] = 'Selecteer';
$string['stamp'] = 'Stempel';
$string['stamppicker'] = 'Stempelzoeker';
$string['stamps'] = 'Stempels';
$string['stampsdesc'] = 'Stempels moeten afbeeldingen zijn (aanbevolen grootte: 40 X 40à. Deze afbeeldingen kunnen gebruikt worden met het stempelgereedschap om PDF\'s mee te annoteren.';
$string['test_doesnotexist'] = 'Het pad naar Ghostscript verwijst naar een bestand dat niet bestaat.';
$string['test_empty'] = 'Het Ghostscript-pad is leeg - geef het juiste pad in.';
$string['testgs'] = 'Test het ghostscript-pad';
$string['test_isdir'] = 'Het Ghostscript-pad wijst naar een map. Zet ook het programmabestand in het opgegeven pad.';
$string['test_notestfile'] = 'De test-PDF ontbreekt';
$string['test_notexecutable'] = 'Het Gostscript-pad verwijst naar een bestand dat niet uitvoerbaar is.';
$string['test_ok'] = 'Het Ghostscript-pad lijkt in orde - controleer of je de boodschap in onderstaand bericht kunt zien.';
$string['tool'] = 'Gereedschap';
$string['toolbarbutton'] = '{$a->tool} {$a->shortcut}';
$string['unsavedchanges'] = 'Onbewaarde wijzigingen';
$string['viewfeedbackonline'] = 'Bekijk een geannoteerde pdf...';
$string['white'] = 'Wit';
$string['yellow'] = 'Geel';
$string['zlibnotavailable'] = 'De PHP-extentie "zlib" is niet beschikbaar. Het annoteren op PDF heeft deze php-extentie nodig en zal uitgeschakeld worden tot zlib geïnstalleerd en ingeschakeld is.';
