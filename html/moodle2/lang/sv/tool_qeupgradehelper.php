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
 * Strings for component 'tool_qeupgradehelper', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_qeupgradehelper
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Åtgärd';
$string['alreadydone'] = 'Allt har redan konverterats';
$string['areyousure'] = 'Är du säker?';
$string['areyousuremessage'] = 'Vill du gå vidare med att uppgradera alla {$a->numtoconvert} försök för test \'{$a->name}\' i kurs {$a->shortname}?';
$string['areyousureresetmessage'] = 'Test \'{$a->name}\' i kurs {$a->shortname} har {$a->totalattempts} försök, varav {$a->convertedattempts} blev uppgraderade från det gamla systemet. Av dessa, {$a->resettableattempts} kan återställas, för senare återkonvertering. Vill du fortsätta med detta?';
$string['attemptstoconvert'] = 'Försök som behöver konverteras';
$string['backtoindex'] = 'Tillbaka till huvudsidan';
$string['conversioncomplete'] = 'Konvertering är klar';
$string['convertattempts'] = 'Konvertera försök';
$string['convertedattempts'] = 'Konverterade försök';
$string['convertquiz'] = 'Konverterade försök...';
$string['cronenabled'] = 'Cron aktiverat';
$string['croninstructions'] = 'Du kan aktivera cron för att automatiskt slutföra uppgraderingen följande på en partiell uppgradering. Cron kommer köras mellan de angivna tiderna och angiven dag (enligt serverns lokala tid). Varje gång cron körs kommer det att processa ett antal försök tills tidsgränsen nås, för att då stoppas och fortsätta nästa gång cron körs. Även om du ställt in cron kommer det inte att göra någonting såvida inte det indikerar att huvuduppgraderingen till 2.1 har genomförts.';
$string['cronprocesingtime'] = 'Processtid vid varje cronkörning';
$string['cronsetup'] = 'Konfigurera cron';
$string['cronsetup_desc'] = 'Du kan konfigurera cron att slutföra uppgraderingen av testförsöks data automatiskt';
$string['cronstarthour'] = 'Start timme';
$string['cronstophour'] = 'Stopp timme';
$string['extracttestcase'] = 'Extrahera testfall';
$string['extracttestcase_desc'] = 'Använd exempeldata från databasen för att hjälpa till att skapa enhetstester som kan användas för att testa uppgraderingen.';
$string['gotoindex'] = 'Tillbaka till listan över tester som kan uppgraderas';
$string['gotoquizreport'] = 'Gå till rapporten för denna test för att kontrollera uppgraderingen';
$string['gotoresetlink'] = 'Gå till listan över tester som kan återställas';
$string['includedintheupgrade'] = 'Inkludera i uppgraderingen?';
$string['invalidquizid'] = 'Felaktigt test id. Antingen finns inte testet eller har det inga försök att konvertera.';
$string['listpreupgrade'] = 'Lista tester och försök';
$string['listpreupgrade_desc'] = 'Detta kommer att visa en rapport över alla tester på systemet och hur många försök de har. Detta kommer ge dig en uppfattning om omfattningen av den uppgradering du behöver göra.';
$string['listpreupgradeintro'] = 'Detta är antalet testförsök som kommer att behöva processas när du uppgraderar din webbplats. Några tiotusentals är ingen fara. Men om det är mycket mer än så behöver du tänka över hur lång tid uppgraderingen kommer att ta.';
$string['listtodo'] = 'Lista tester som återstår att uppgradera';
$string['listtodo_desc'] = 'Detta kommer att visa en rapport över alla tester i systemet (om några finns) som har försök som fortfarande behöver uppgraderas för den nya frågemotorn.';
$string['listtodointro'] = 'Detta är alla tester med data över försök som fortfarande behöver konverteras. Du kan konvertera försöken genom att klicka på länken.';
$string['listupgraded'] = 'Lista redan uppgraderade tester som kan återställas';
$string['listupgraded_desc'] = 'Detta kommer att visa en rapport över alla tester i systemet vilkas försök har uppgraderats, och där gammal data fortfarande finns så att uppgraderingen kan återställas och göras om.';
$string['listupgradedintro'] = 'Detta är alla tester som har försök som blev uppgraderade, och där gammal data för försök fortfarande finns, så att dessa kan återställas och uppgraderingen göras om.';
$string['noquizattempts'] = 'Din webbplats har inga test försök överhuvud taget!';
$string['nothingupgradedyet'] = 'Inga uppgraderade försök kan återställas';
$string['notupgradedsiterequired'] = 'Detta script kan bara fungera före webbplatsen har uppgraderats.';
$string['numberofattempts'] = 'Antal testförsök';
$string['oldsitedetected'] = 'Detta verkar vara en webbplats som ännu inte har uppgraderats för att innehålla den nya frågemotorn.';
$string['outof'] = '$a->some} av {$a->total}';
$string['pluginname'] = 'Uppgraderingshjälp för frågemotorn';
$string['pretendupgrade'] = 'Gör en testkörning av uppgraderingen av försök';
$string['pretendupgrade_desc'] = 'Uppgraderingen gör tre saker: Laddar existerande data från databasen; transformerar denna; skriver sedan transformerad data till DB. Detta script kommer att testa de två första stegen i processen.';
$string['questionsessions'] = 'Frågesessioner';
$string['quizid'] = 'Test id';
$string['quizupgrade'] = 'Test uppdateringsstatus';
$string['quizzesthatcanbereset'] = 'Följande tester har konverterade försök som du kanske kan återställa';
$string['quizzestobeupgraded'] = 'Alla tester med försök';
$string['quizzeswithunconverted'] = 'Följande tester har försök som behöver konverteras';
$string['resetcomplete'] = 'Återställning klar';
$string['resetquiz'] = 'Återställ försök...';
$string['resettingquizattempts'] = 'Återställer testförsök';
$string['resettingquizattemptsprogress'] = 'Återställer försök {$a->done} / {$a->outof}';
$string['upgradedsitedetected'] = 'Detta verkar vara en webbplats som har uppgraderats till att innehålla den nya frågemotorn.';
$string['upgradedsiterequired'] = 'Detta script kan bara fungera efter att webbplatsen har uppgraderats.';
$string['upgradingquizattempts'] = 'Uppgraderar försöken för test \'{$a->name}\' i kurs {$a->shortname}';
$string['veryoldattemtps'] = 'Din webbplats har {$a} testförsök som inte blev fullständigt uppdaterade under uppgraderingen från Moodle 1.4 till Moodle 1.5. Dessa försök kommer att hanteras före den huvudsakliga uppgraderingen. Du behöver överväga den extra tid som krävs för detta.';
