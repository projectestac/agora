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
 * Strings for component 'tool_qeupgradehelper', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_qeupgradehelper
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Actie';
$string['alreadydone'] = 'Alles is al geconverteerd';
$string['areyousure'] = 'Weet je het zeker?';
$string['areyousuremessage'] = 'Wil je verder gaan met het upgraden van alle {$a->numtoconvert} pogingen voor de test \'{$a->name}\' in cursus {$a->shortname}?';
$string['areyousureresetmessage'] = 'De test \'{$a->name}\' in cursus {$a->shortname} heeft {$a->totalattempts} pogingen, waarvan er {$a->convertedattempts} al geüpgraded zijn vanuit het oude systeem. Daarvan kunnen er {$a->resettableattempts} gereset worden om later opnieuw te converteren. Wil je hier mee verder gaan?';
$string['attemptstoconvert'] = 'Pogingen die conversie nodig hebben';
$string['backtoindex'] = 'Terug naar de hoofdpagina';
$string['conversioncomplete'] = 'Conversie compleet';
$string['convertattempts'] = 'Converteer pogingen';
$string['convertedattempts'] = 'Geconverteerde pogingen';
$string['convertquiz'] = 'Pogingen aan het converteren...';
$string['cronenabled'] = 'Cron ingeschakeld';
$string['croninstructions'] = 'Je kunt cron inschakelen om de upgrade automatisch te voltooien in kleine stukjes. Cron zal tussen vastgestelde uren van de dag (volgens de server tijd). Telkens wanneer cron loopt, zal het een aantal pogingen verwerkten tot de tijdslimiet bereikt is. Dan zal het proces stoppen en wachten tot de volgende keer dat cron loopt. Zelfs als je de crontaak ingesteld hebt, zal er niets gebeuren voor je upgrade tot versie 2.1 voltooid is.';
$string['cronprocesingtime'] = 'Rekentijd bij elke cron';
$string['cronsetup'] = 'Configureer cron';
$string['cronsetup_desc'] = 'Je kunt cron configureren om de upgrade van de testpogingen automatisch te voltooien';
$string['cronstarthour'] = 'Start uur';
$string['cronstophour'] = 'Einde uur';
$string['extracttestcase'] = 'Extraheer testgegevens';
$string['extracttestcase_desc'] = 'Gebruik voorbeelddata uit de databank om een unit test mee te maken die gebruikt kan worden om de upgrade te testen';
$string['gotoindex'] = 'Terug naar de lijst met testen die geüpgraded kunnen worden';
$string['gotoquizreport'] = 'Ga naar de rapporten voor deze test om de upgrade te controleren';
$string['gotoresetlink'] = 'Ga naar de lijst met testen die gereset kan worden';
$string['includedintheupgrade'] = 'Mee upgraden?';
$string['invalidquizid'] = 'Ongeldige test ID. Ofwel bestaat de test niet of die heeft geen pogingen om te converteren.';
$string['listpreupgrade'] = 'Toon testen en pogingen';
$string['listpreupgrade_desc'] = 'Dit toont een rapport met alle testen op het systeem en het aantal pogingen ze hebben. Dit geeft je een idee van de omvang van de upgrade die je moet doen.';
$string['listpreupgradeintro'] = 'Er zijn een aantal testpogingen die verwerkt moeten worden wanneer je je site upgrade. Enkele tienduizenden is geen probleem. Als het er veel meer dan dat zijn, moet je eens gaan nadenken hoe lang de upgrade zal duren.';
$string['listtodo'] = 'Lijst met testen om te upgraden';
$string['listtodo_desc'] = 'Dit toont een rapport van alle testen op het systeem (als die er al zijn) met pogingen die nog geüpgraded moeten worden naar de nieuwe vragenmotor.';
$string['listtodointro'] = 'Dit zijn alle testen die pogingen hebben die nog moeten geconverteerd worden. Je kunt die pogingen converteren door op de link te klikken.';
$string['listupgraded'] = 'Lijst met geüpgraded testen die gereset kunnen worden';
$string['listupgraded_desc'] = 'Dit toont een rapport van alle testen op het systeem waarvan de pogingen al geüpgraded zijn en waar de oude data nog van aanwezig is, zodat de upgrade gereset kan worden en opnieuw gedaan kan worden.';
$string['listupgradedintro'] = 'Dit zijn alle testen die pogingen hebben die geüpgraded zijn en waar de oude data nog van aanwezig is, zodat ze gereset kunnen worden en de upgrade opnieuw kan gedaan worden.';
$string['noquizattempts'] = 'Je site heeft helemaal geen testpogingen.';
$string['nothingupgradedyet'] = 'Er zijn geen geüpgraded pogingen die gereset kunnen worden.';
$string['notupgradedsiterequired'] = 'Dit script kan alleen werken voor de site geüpgraded werd.';
$string['numberofattempts'] = 'Aantal testpogingen';
$string['oldsitedetected'] = 'Blijkbaar is deze site nog niet geüpgraded met de nieuwe vragenmotor.';
$string['outof'] = '{$a->some} van de {$a->total}';
$string['pluginname'] = 'Vraagmotor upgrade';
$string['pretendupgrade'] = 'Doe een testpoging voor de upgrade';
$string['pretendupgrade_desc'] = 'De upgrade doet drie dingen: de bestaande gegevens laden uit de databank, ze omzetten, de omgezette gegevens terug in de databank zetten. Dit script zal de eerste twee stappen van het proces testen.';
$string['questionsessions'] = 'Vraag sessies';
$string['quizid'] = 'Test id';
$string['quizupgrade'] = 'Test upgrade status';
$string['quizzesthatcanbereset'] = 'Volgende testen hebben omgezette pogingen die je eventueel kunt resetten.';
$string['quizzestobeupgraded'] = 'Alle testen met pogingen';
$string['quizzeswithunconverted'] = 'Volgende testen hebben pogingen die geconverteerd moeten worden';
$string['resetcomplete'] = 'Reset klaar';
$string['resetquiz'] = 'Reset pogingen...';
$string['resettingquizattempts'] = 'Reset testpogingen';
$string['resettingquizattemptsprogress'] = 'Poging {$a->done} / {$a->outof} aan het resetten';
$string['upgradedsitedetected'] = 'Dit blijkt een site te zijn die geüpgraded is om de nieuwe vraagmotor te gebruiken.';
$string['upgradedsiterequired'] = 'Dit script werkt alleen als de site geüpgraded is.';
$string['upgradingquizattempts'] = 'Testpogingen upgraden voor test  \'{$a->name}\' in cursus {$a->shortname}';
$string['veryoldattemtps'] = 'Je site heeft {$a} testpogingen dat nooit volledig zijn geüpgraded tijdens de upgrade van 1.4 naar Moodle 1.5. Deze pogingen zullen eerst omgezet worden voor de eigenlijke upgrade. Reken wat extra tijd hiervoor.';
