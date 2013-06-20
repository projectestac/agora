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
 * Strings for component 'enrol_imsenterprise', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_imsenterprise
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving...'] = 'När Du väl har sparat Dina inställningar så kanske Du vill';
$string['allowunenrol'] = 'Tillåt IMS data att <strong>avregistrera</strong> lärande och distanslärare';
$string['allowunenrol_desc'] = '<p>Enterprise data kan lägga till eller ta bort registreringar på kurser. Om du aktiverar det här alternativet då kommer Moodle att genomföra avregistreringar när detta är angivet i data.</p>

<p>Det finns tre sätt att avregistrera användare inom IMS data:</p>

<ul><li> Det finns en &lt;medlems&gt;-komponent som anger en viss student/ elev/ deltagare/ lärande och kurs  och om attributet "recstatus" till  &lt;role&gt;-komponenten är inställt till 3 (vilket betyder "ta bort") så kommer studenten/ eleven/ deltagaren/ den lärande att avregistreras. DETTA ÄR ÄNNU INTE IMPLEMENTERAT I PLUGIN-PROGRAMMET FÖR MOODLE.</li>

<li> Det finns en &lt;medlems&gt;-komponent som anger en viss student/ elev/ deltagare/ lärande och kurs och om  &lt;status&gt;-komponenten inställd till 0 (vilket betyder "inactive")så kommer studenten/ eleven/ deltagaren/ den lärande att avregistreras.</li>
</ul>

<p>Det tredje metoden är lite annorlunda. Den kräver inte att den här inställningen i konfigurationen är aktiverad och den kan anges i god it innan datumet för avregistreringen:</p>

<ul>
  <li>Det finns en &lt;medlems&gt;-komponent som anger en &lt;tidsram> för registreringen och som kan specificera start- och slutdatum för registrering av just denne/a student/ elev/ deltagare/ lärande. Dessa datum laddas in i Moodles datatabell för registrering om det finns en sådan och efter det angivna slutdatumet kommer studenten/ eleven/ deltagaren/ den lärande inte längre att kunna få tillgång till just den kursen.</li>
</ul>';
$string['basicsettings'] = 'Grundläggande inställlningar';
$string['coursesettings'] = 'Alternativ för kursdata';
$string['createnewcategories'] = 'Skapa nya (dolda) kurskategorier om det inte går att hitta några i Moodle.';
$string['createnewcourses'] = 'Skapa nya (dolda) kurser om det inte går att hitta några i Moodle.';
$string['createnewusers'] = 'Skapa användarkonton för användare som ännu inte är registrerade i Moodle.';
$string['cronfrequency'] = 'Hur ofta cron processas';
$string['deleteusers'] = 'Ta bort användarkonton när detta är angivet i IMS data.';
$string['doitnow'] = 'importera en IMS Enterprise nu';
$string['filelockedmail'] = 'Det går inte att radera den textfil (som baserar sig på en IMS-fil) och som Du använder för registreringar ({$a}) med hjälp av processen för cron. Detta innebär vanligtvis att det är något problem med rättigheterna. Var snäll och ställ in rättigheterna så att Moodle kan ta bort filen annars kan den komma att processas upprepade gånger.';
$string['filelockedmailsubject'] = 'Viktigt fel: fil för registreringar';
$string['fixcasepersonalnames'] = 'Ändra personnamn till stora bokstäver';
$string['fixcaseusernames'] = 'Ändra användarnamn till små bokstäver';
$string['imsrolesdescription'] = 'Specifikationen för IMS Enterprise inkluderar 8 olika specifika typer av roller. Var snäll och välj hur Du vill att de ska tilldelas i Moodle, inklusive huruvida någon av dem inte ska användas.';
$string['location'] = 'Placering av fil';
$string['logtolocation'] = 'Loggfil för placering av output (tom om det inte finns några loggar)';
$string['mailadmins'] = 'Meddela administratören via e-post';
$string['mailusers'] = 'Meddela användarna via e-post';
$string['miscsettings'] = 'Övrigt';
$string['processphoto'] = 'Läggt till data för användarfoto till profilen';
$string['processphotowarning'] = 'Varning! Att behandla bilder kommer sannolikt att innebära stor belastning på servern. Därför rekommenderar vi Dig att inte aktivera det här alternativet om det är troligt att Du kommer att behandla många studenter/elever/deltagare/lärande.';
$string['restricttarget'] = 'Behandla data bara om det följande målet är angivet';
$string['sourcedidfallback'] = 'Använd  &quot;sourcedid&quot; för en persons userid om det inte går att hitta fältet &quot;userid&quot;';
$string['truncatecoursecodes'] = 'Trunkera kurskoderna till den här längden';
$string['truncatecoursecodes_desc'] = '<p>I vissa situationer kan du vilja trunkera kurskoder till en angiven längd innan du behandlar dem. I så fall ska du mata in antalet tecken i den här boxen. Om inte så kan du låta boxen förbli tom och då sker ingen trunkering.</p>';
$string['usecapitafix'] = 'Markera den här kryssrutan om Du använder "Capita" (deras XML-format är lite fel)';
$string['usecapitafix_desc'] = '<p>Det system för studentdata som Capita har producerat har visat sig ha ett litet fel i sin XML-output. Om du använder Capita så bör du aktivera det här alternativet - om inte - lämna det omarkerat.</p>';
$string['usersettings'] = 'Alternativ för användardata';
$string['zeroisnotruncation'] = '0 innebär att det inte ska vara någon trunkering';
