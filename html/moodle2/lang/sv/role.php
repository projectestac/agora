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
 * Strings for component 'role', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   role
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addinganewrole'] = 'Lägger till en ny roll';
$string['addingrolebycopying'] = 'Lägger till en ny roll baserad på {$a}';
$string['addrole'] = 'Lägg till en ny roll';
$string['advancedoverride'] = 'Avancerat överskridande av roll';
$string['allow'] = 'Tillåt';
$string['allowassign'] = 'Tillåt tilldelning av roller';
$string['allowed'] = 'Tillåten';
$string['allowoverride'] = 'Tillåt överskridanden av roller';
$string['allowroletoassign'] = 'Tillåt användare med rollen {$a->fromrole} att tilldela rollen {$a->targetrole}';
$string['allowroletooverride'] = 'Tillåt användare med rollen {$a->fromrole} att överskrida rollen {$a->targetrole}';
$string['allowroletoswitch'] = 'Tillåt användare med rollen {$a->fromrole} att byta till rollen {$a->targetrole}';
$string['allowswitch'] = 'Tillåt byten av roller';
$string['allsiteusers'] = 'Alla användare på webbplatsen';
$string['archetype'] = 'Arketyp för roll';
$string['archetypecoursecreator'] = 'ARKETYP: Kursutvecklare';
$string['archetypeeditingteacher'] = 'ARKETYP: (redigerande) (distans)lärare';
$string['archetypefrontpage'] = 'ARKETYP: Användare som är autenticerad på ingångssidan';
$string['archetypeguest'] = 'ARKETYP: Gäst';
$string['archetypemanager'] = 'ARKETYP: Administratör';
$string['archetypestudent'] = 'ARKETYP: student/elev/deltagare/lärande';
$string['archetypeteacher'] = 'ARKETYP: icke-redigerande (distans)lärare';
$string['archetypeuser'] = 'ARKETYP: Autenticerad användare';
$string['assignanotherrole'] = 'Tilldela en annan roll';
$string['assignedroles'] = 'Tilldelade roller';
$string['assignerror'] = 'Fel vid tilldelning av rollen {$a->role} till användaren {$a->user}.';
$string['assignglobalroles'] = 'Tilldela globala roller';
$string['assignrole'] = 'Tilldela roll';
$string['assignrolenameincontext'] = 'Tilldela rollen  \'{$a->role}\' i {$a->context}';
$string['assignroles'] = 'Tilldela roller';
$string['assignroles_help'] = '<p>
Genom att tilldela en roll till användare i ett sammanhang
så ger du dem de tillstånd som den rollen innefattar. Detta
gäller både för det aktuella sammanhanget och alla lägre sammanhang.
</p>

<p>
Sammanhang:
</p>
<ol>
<li>System (hela installationen)</li>
<li>Ingångssidan ("kursen på webbplatsnivå")</li>
<li>Kategorier för kurser</li>
<li>Underkategorier för kurser</li>
<li>Kurser</li>
<li>Block och aktiviteter</li>
</ol>

<p>
Så om du t.ex. tilldelar en roll som student/elev/deltagare/lärande
till en användare i en kurs så kommer de att ha den rollen i den kursen
men även i alla block och aktiviteter inne i den kursen. De tillstånd som de
sedan rent faktiskt kommer att inneha kan vara beroende av andra roller och av överskridanden som har definierats.
</p>

<p>
Sen även
<a href="help.php?file=roles.html">Roller</a>,
<a href="help.php?file=contexts.html">Sammanhang</a>,
<a href="help.php?file=permissions.html">Tillstånd</a> och
<a href="help.php?file=overrides.html">Överskridanden</a>.
</p>';
$string['assignrolesin'] = 'Tilldela roller i {$a}';
$string['assignrolesrelativetothisuser'] = 'Tilldela roller som är relativa i förh till den här användaren';
$string['backtoallroles'] = 'Tillbaka till listan över alla roller';
$string['backup:anonymise'] = 'Anonymisera användardata vid säkerhetskopiering';
$string['backup:backupactivity'] = 'Aktiviteter för säkerhetskopiering';
$string['backup:backupcourse'] = 'Säkerhetskopiering - kurser';
$string['backup:backupsection'] = 'Sektioner för säkerhetskopiering';
$string['backup:backuptargethub'] = 'Säkerhetskopiering för hubb';
$string['backup:backuptargetimport'] = 'Säkerhetskopiering för import';
$string['backup:configure'] = 'Konfigurera alternativ för säkerhetskopiering';
$string['backup:downloadfile'] = 'Ladda ner filer från områden för säkerhetskopiering';
$string['backup:userinfo'] = 'Säkerhetskopiera användardata';
$string['block:edit'] = 'Redigera inställningarna ett block';
$string['block:view'] = 'Visa block';
$string['blog:associatecourse'] = 'Koppla inlägg i bloggar till kurser';
$string['blog:associatemodule'] = 'Koppla inlägg i bloggar till aktivitetsmoduler';
$string['blog:create'] = 'Skapa nya bidrag till bloggar';
$string['blog:manageentries'] = 'Redigera och administrera inlägg';
$string['blog:manageexternal'] = 'Redigera och administrera externa bloggar';
$string['blog:manageofficialtags'] = 'Administrera officiella etiketter';
$string['blog:managepersonaltags'] = 'Administrera personliga etiketter';
$string['blog:search'] = 'Sök inlägg i bloggar';
$string['blog:view'] = 'Visa bidrag till bloggar';
$string['blog:viewdrafts'] = 'Visa utkast till inlägg i bloggar';
$string['calendar:manageentries'] = 'Administrera vilka bidrag som helst  till kalender';
$string['calendar:managegroupentries'] = 'Administrera bidrag till gruppkalendern';
$string['calendar:manageownentries'] = 'Administrera egna bidrag till kalender';
$string['capabilities'] = 'Kapaciteter';
$string['capability'] = 'Kapacitet';
$string['category:create'] = 'Skapa kategorier';
$string['category:delete'] = 'Ta bort kategorier';
$string['category:manage'] = 'Administrera kategorier';
$string['category:update'] = 'Uppdatera kategorier';
$string['category:viewhiddencategories'] = 'Se dolda kategorier';
$string['category:visibility'] = 'Visa dolda kategorier';
$string['checkglobalpermissions'] = 'Kontrollera tillstånd för system';
$string['checkpermissions'] = 'Kontrollera tillstånd';
$string['checkpermissionsin'] = 'Kontrollera tillstånd i {$a}';
$string['checksystempermissionsfor'] = 'Kontrollera tillstånd på systemnivå för  {$a->fullname}';
$string['checkuserspermissionshere'] = 'Kontrollera vilka tillstånd  {$a->fullname} har i det här sammanhanget {$a->contextlevel}';
$string['chooseroletoassign'] = 'Var snäll och välj en roll att tilldela';
$string['cohort:assign'] = 'Lägg till och ta bort medlemmar i kohort';
$string['cohort:manage'] = 'Skapa, ta bort och flytta kohorter';
$string['cohort:view'] = 'Visa kohorter på webbplatsnivå';
$string['comment:delete'] = 'Ta bort kommentarer';
$string['comment:post'] = 'Publicera kommentarer';
$string['comment:view'] = 'Läs kommentarer';
$string['community:add'] = 'Använd blocket för gemenskap för att söka efter hubbar och hitta kurser';
$string['community:download'] = 'Ladda ner en kurs från blocket för gemenskap';
$string['confirmaddadmin'] = 'Vill Du verkligen lägga till användaren <strong>{$a}</strong> som ny administratör på webbplatsen?';
$string['confirmdeladmin'] = 'Vill Du verkligen ta bort användaren <strong>{$a}</strong> från listan över administratörer på webbplatsen?';
$string['confirmroleprevent'] = 'Vill Du verkligen ta bort <strong>{$a->role}</strong> från listan av tillåtna roller för kapaciteten {$a->cap} i sammanhanget {$a->context}?';
$string['confirmroleunprohibit'] = 'Vill Du verkligen ta bort <strong>{$a->role}</strong> från listan av inte tillåtna roller för kapaciteten {$a->cap} i sammanhanget {$a->context}?';
$string['confirmunassignno'] = 'Avbryt';
$string['confirmunassigntitle'] = 'Bekräfta byte av roll';
$string['confirmunassignyes'] = 'Ta bort';
$string['context'] = 'Sammanhang';
$string['course:activityvisibility'] = 'Dölj/visa aktiviteter';
$string['course:bulkmessaging'] = 'Skicka ett meddelande till många människor';
$string['course:changecategory'] = 'Byt kategori av kurs';
$string['course:changefullname'] = 'Ändra kursens fulla namn';
$string['course:changeidnumber'] = 'Ändra kursens ID-nummer';
$string['course:changeshortname'] = 'Ändra kursens kortnamn';
$string['course:changesummary'] = 'Ändra kursens sammanfattning';
$string['course:create'] = 'Skapa kurser';
$string['course:delete'] = 'Ta bort kurser';
$string['course:enrolconfig'] = 'Konfigurera instanser av registreringar i kurser';
$string['course:enrolreview'] = 'Ta bort registreringar på kurser';
$string['course:manageactivities'] = 'Administrera aktiviteter';
$string['course:managefiles'] = 'Administrera filer';
$string['course:managegrades'] = 'Administrera betyg/omdömen';
$string['course:managegroups'] = 'Administrera grupper';
$string['course:managescales'] = 'Administrera skalor';
$string['course:markcomplete'] = 'Markera användare som färdiga i dokumentation om kursens fullföljande';
$string['course:publish'] = 'Publicera en kurs i en hubb';
$string['course:request'] = 'Begär nya kurser';
$string['course:reset'] = 'Återställ kurs';
$string['course:sectionvisibility'] = 'Kontrollera huruvuda en sektion är synlig';
$string['course:setcurrentsection'] = 'Ställ in aktuell sektion';
$string['course:update'] = 'Uppdatera inställningar för kurs';
$string['course:useremail'] = 'Aktivera/avaktivera e-postadress';
$string['course:view'] = 'Visa kurser utan deltagande';
$string['course:viewcoursegrades'] = 'Visa kursbetyg/omdömen';
$string['course:viewhiddenactivities'] = 'Visa dolda aktiviteter';
$string['course:viewhiddencourses'] = 'Visa dolda kurser';
$string['course:viewhiddensections'] = 'Visa dolda sektioner';
$string['course:viewhiddenuserfields'] = 'Visa dolda fält för användare';
$string['course:viewparticipants'] = 'Visa deltagare';
$string['course:viewscales'] = 'Visa skalor';
$string['course:visibility'] = 'Dölj/visa kurser';
$string['createrolebycopying'] = 'Skapar en ny roll genom att kopiera {$a}';
$string['createthisrole'] = 'Skapa den här rollen';
$string['currentcontext'] = 'Aktuellt sammanhang';
$string['currentrole'] = 'Aktuell roll';
$string['defaultrole'] = 'Standardroll';
$string['defaultx'] = 'Standard: {$a}';
$string['defineroles'] = 'Definiera roller';
$string['deletecourseoverrides'] = 'Ta bort alla överskridanden i kursen';
$string['deletelocalroles'] = 'Ta bort alla lokala tilldelningar av roller';
$string['deleterolesure'] = 'Är Du säker på att Du vill ta bort rollen "{$a->name} ({$a->shortname})"?<br /> F.n. är den rollen tilldelad till {$a->count} användare.';
$string['deletexrole'] = 'Ta bort rollen {$a}';
$string['duplicaterole'] = 'Dubblerad roll';
$string['duplicaterolesure'] = 'Är Du säker på att Du vill dubblera rollen
"{$a->name} ({$a->shortname})"?';
$string['editingrolex'] = 'Redigerar rollen {$a}';
$string['editrole'] = 'Redigera roll';
$string['editxrole'] = ' Redigera rollen {$a}';
$string['errorbadrolename'] = 'Felaktigt namn på roll';
$string['errorbadroleshortname'] = 'Felaktigt kortnamn på roll';
$string['errorexistsrolename'] = 'Namnet på rollen finns redan';
$string['errorexistsroleshortname'] = 'Namnet på rollen finns redan';
$string['existingadmins'] = 'Aktuella administratörer av webbplats';
$string['existingusers'] = '{$a} befintliga användare';
$string['explanation'] = 'Förklaring';
$string['extusers'] = 'Befintliga användare';
$string['extusersmatching'] = 'Befintliga användare som matchar {$a}';
$string['filter:manage'] = 'Administrera lokala inställningar för filter';
$string['frontpageuser'] = 'Användare som är autenticerade på ingångssidan';
$string['frontpageuserdescription'] = 'Alla användare som är inloggade på kursens ingångssida.';
$string['globalrole'] = 'Global roll';
$string['globalroleswarning'] = 'Varning! Vilka roller Du än tilldelar från den här sidan kommer att vara giltiga för de tilldelade användarna globalt över hela webbplatsen, inklusive ingångssidan (första/hem) och alla kurser.';
$string['gotoassignroles'] = 'Gå till \'Tilldela roller\' för det här {$a->contextlevel}';
$string['gotoassignsystemroles'] = 'Gå till \'Tilldela systemroller\'';
$string['grade:edit'] = 'Redigera betyg';
$string['grade:export'] = 'Exportera betyg/omdömen';
$string['grade:hide'] = 'Dölj/visa betyg/omdömen';
$string['grade:import'] = 'Importera betyg/omdömen';
$string['grade:lock'] = 'Lås betyg/omdömen eller komponenter';
$string['grade:manage'] = 'Administrera betygskomponenter';
$string['grade:managegradingforms'] = 'Hantera avancerade betygssättningsmetoder';
$string['grade:manageletters'] = 'Administrera bokstavsbetyg';
$string['grade:manageoutcomes'] = 'Administrera resultat för betyg/omdömen';
$string['grade:managesharedforms'] = 'Hantera mallar för avancerade betygssättningsmetoder';
$string['grade:override'] = 'Överskrid betyg/omdömen';
$string['grade:sharegradingforms'] = 'Dela formulär för avancerade betygssättningsmetod som en mall.';
$string['grade:unlock'] = 'Lås upp betyg/omdömen eller komponenter';
$string['grade:view'] = 'Visa egna betyg/omdömen';
$string['grade:viewall'] = 'Visa betyg/omdömen för andra användare';
$string['grade:viewhidden'] = 'Visa dolda getyg/omdömen för ägaren';
$string['hidden'] = 'Dold';
$string['inactiveformorethan'] = 'Inaktiv i mer än {$a->timeperiod}';
$string['ingroup'] = 'i gruppen "{$a->group}"';
$string['inherit'] = 'Ärv';
$string['legacy:admin'] = 'ÄRVD ROLL: Administratör';
$string['legacy:coursecreator'] = 'ÄRVD ROLL: Kursutvecklare';
$string['legacy:editingteacher'] = 'ÄRVD ROLL: (redigerande) distanslärare';
$string['legacy:guest'] = 'ÄRVD ROLL: Gäst';
$string['legacy:student'] = 'ÄRVD ROLL: Student/elev/deltagare/lärande';
$string['legacy:teacher'] = 'ÄRVD ROLL: (icke-redigerande) distanslärare';
$string['legacytype'] = 'Typ av ärvd roll';
$string['legacy:user'] = 'ÄRVD ROLL: autenticerad användare';
$string['listallroles'] = 'Lista alla roller';
$string['localroles'] = 'Lokalt tilldelade roller';
$string['manageadmins'] = 'Administrera administratörer på webbplatsnivå';
$string['manager'] = 'Administratör';
$string['manageroles'] = 'Administrera roller';
$string['morethan'] = 'Mer än {$a}';
$string['multipleroles'] = 'Flerfaldiga roller';
$string['my:configsyspages'] = 'Konfigurera systemmallarna för MittMoodle-sidorna';
$string['my:manageblocks'] = 'Administrera sidblock för MittMoodle';
$string['neededroles'] = 'Roller med tillstånd';
$string['nocapabilitiesincontext'] = 'Det finns inte några tillgängliga kapaciteter i det här sammanhanget.';
$string['noneinthisx'] = 'Ingen/a i den här {$a}';
$string['noneinthisxmatching'] = 'Inga användare som matchar \'{$a->search}\' i den här {$a->contexttype}';
$string['noroles'] = 'Inga roller';
$string['notabletoassignroleshere'] = 'Du har inte tillstånd att tilldela några roller här';
$string['notes:manage'] = 'Administrera anteckningar';
$string['notes:view'] = 'Visa anteckningar';
$string['notset'] = 'Inte inställd';
$string['overrideanotherrole'] = 'Överskrid en annan roll';
$string['overridecontext'] = 'Överskrid sammanhanget';
$string['overridepermissions'] = 'Överskrid tillstånd';
$string['overridepermissionsforrole'] = 'Överskrid tillstånden för rollen {$a->role}\' i {$a->context}';
$string['overridepermissions_help'] = '<p>
Överskridanden är de specifika tillstånd som är utformade
för att överskrida en roll i ett specifikt sammanhang;
vilket innebär att du kan modifiera dina tillstånd så
som du önskar.
</p>

<p>
i normalfallet är det så att användare som har tilldelats rollen som student/elev/deltagare/lärande
i din kurs kan inleda nya diskussionsämnen. Om du då har ett speciellt forum där du vill förhindra den kapaciteten då kan du ange ett överskridande som FÖRHINDRAR att studenter/elever/deltagare/lärande kan använda den kapaciteten att "Inleda nya diskussionsämnen".
</p>

<p>
Överskridanden kan också användas för att "öppna upp" delar av din webbplats
och dina kurser så att användare får utökade tillstånd där du finner det
motiverat. Du kan t.ex. tänkas vilja experimentera genom att ge studenter/elever/deltagare/lärande
kapacitetet att sätta betyg på en del uppgifter. </p>

<p>
Gränssnittet liknar det som du använder för att definiera roller,
förutom det att ibland så visas bara relevanta kapaciteter,
och du kommer också att upptäcka att en del kapaciteter
framhävs särskilt för att visa dig vilket tillståndet för
den rollen skulle vara om  det INTE fanns något aktivt
överskridande (dvs när ditt överskridande är inställt till
ÄRV).
</p>

<p>
See also
<a href="help.php?file=roles.html">Roller</a>,
<a href="help.php?file=contexts.html">Sammanhang</a>,
<a href="help.php?file=assignroles.html">Tilldela roller</a> and
<a href="help.php?file=permissions.html">Tillstånd</a>.
</p>';
$string['overridepermissionsin'] = 'Överskrid tillstånd i {$a}';
$string['overrideroles'] = 'Överskrida roller';
$string['overriderolesin'] = 'Överskrid roller i {$a}';
$string['overrides'] = 'Överskridningar';
$string['permission'] = 'Tillstånd';
$string['permission_help'] = '<p>
Tillstånd är de inställningar som Du medger för vissa specifika kapaciteter.
</p>

<p>
Det kan t.ex. vara kapaciteten att \'Starta ett nytt diskussionsämne\' (i forum).
</p>

<p>
I varje roll kan Du välja att ställa in tillståndet för en sådan kapacitet
till ett av fyra värden:
<dl>
<dt>INTE INSTÄLLT</dt>
<dd>Detta är, normalt sett, det förinställda standardvärdet.
Det är en neutral inställning som betyder \'använd de inställningar som redan gäller för användaren\'.
Om någon blir tilldelad en roll (t.ex. i en kurs) som har detta tillstånd för en kapacitet
då kommer det faktiska tillstånd som de kommer att ha bara att vara samma tillstånd som de har
i det högre sammanhanget (t.ex. på kategori- eller webbplatsnivå).
Och i slutänden blir det så att, om rollen inte medger ett tillstånd på någon nivå så kommer användaren inte att ha något tillstånd för den kapaciteten.
    </dd>

<dt>TILLÅT</dt>
<dd>Om Du väljer detta så innebär det att Du medger tillstånd för den här kapaciteten till de som har tilldelats den här rollen. Detta tillstånd är tillämpbart på det sammanhang där denna roll tilldelas - och för alla \'lägre\' sammanhang.  Om det här t.ex. är en roll som \'Lärande\' som är tilldelad en kurs då kommer de som har rollen att kunna \'Starta nytt diskussionsämne\' i alla forum i den kursen. Detta FÖRUTOM i de fall då något forum innehåller ett överskridande eller en ny uppgift med ett Förhindra eller Förbjud-attribut för den här kapaciteten.</dd>

<dt>FÖRHINDRA</dt>
<dd>Om Du väljer detta så innebär det att Du tar bort tillståndet för den här kapaciteten även om användarna med denna roll skulle ha kvar tillståndet på en högre nivå. </dd>

<dt>FÖRBJUD</dt>
<dd>Det här behöver Du sällan använda men någon gång kan Du tänkas vilja neka tillstånd för en roll
helt och hållet och det så att det INTE går att överskrida det på något sätt i ett \'lägre\' sammanhang. Ett bra exempel är när en sysadmin vill förhindra en person från att starta några nya diskussionsämnen på webbplatsen överhuvudtaget. I det fallet kan de skapa en roll där denna kapacitet är inställd till \'Förbjud\' och sedan tilldela den personen rollen på webbplatsnivå.
  </dd>

</dl>
</p>


<p> Tillstånd i ett \'lägre\' sammanhang kommer generellt sett att överskrida allting i ett \'högre\' sammanhang (detta är tillämpbart på överskridanden och tilldelade roller). Undantaget är   FÖRBJUD som inte kan överskridas i lägre sammanhang.
</p>

<p> Om två roller skulle tilldelas samma person i ett visst givet sammanhang, den ena med TILLÅT och den andra med FÖRHINDRA - vilken är det då som kommer att gälla? I det här fallet kommer Moodle att inspektera trädet för sammanhang och leta efter \'något som kan avgöra det hela\'.   </p>

<p> Om t.ex. en student/elev/deltagare/lärande har två roller i en kurs; en som tillåter honom/henne att starta nya diskussionsämnen och en som förhindrar detta. I det här fallet kontrollerar vi sammanhangen på kategori- och webbplatsnivå för att hitta något annat definierat tillstånd som kan hjälpa oss att avgöra saken. Om vi inte kan hitta någonting så är det tillståndet FÖRHINDRA som gäller som förinställt standardvärde. Detta därför att de två tillstånden tar ut varandra och därmed har Du inget tillstånd.
</p>


<p> Lägg märke till att kontot för gästanvändare normalt sett förhindrar gäster från att bidra med innehåll, (t.ex. i forum, kalendrar, bloggar osv) även om det har tilldelats tillståndet att göra det.

<p>
Se även
<a href="help.php?file=roles.html">Roller</a>,
<a href="help.php?file=contexts.html">Sammanhang</a>,
<a href="help.php?file=assignroles.html">Tilldela roller</a> and
<a href="help.php?file=overrides.html">Överskridanden</a>.
</p>';
$string['permissions'] = 'Tillstånd';
$string['permissionsforuser'] = 'Tillstånd för användaren {$a}';
$string['permissionsincontext'] = 'Tillstånd i {$a}';
$string['portfolio:export'] = 'Exportera till portfolios';
$string['potentialusers'] = '{$a} potentiella användare';
$string['potusers'] = 'Möjliga användare';
$string['potusersmatching'] = 'Möjliga användare som matchar \'{$a}\'';
$string['prevent'] = 'Förhindra';
$string['prohibit'] = 'Förbjud';
$string['prohibitedroles'] = 'Förbjuden';
$string['question:add'] = 'Lägg till nya frågor';
$string['question:config'] = 'Konfigurera frågetyper';
$string['question:editall'] = 'Redigera alla frågor';
$string['question:editmine'] = 'Redigera Dina egna frågor';
$string['question:flag'] = 'Flagga frågor när det görs försök att besvara dem';
$string['question:managecategory'] = 'Redigera kategorier för frågor';
$string['question:moveall'] = 'Flytta alla frågor';
$string['question:movemine'] = 'Flytta Dina egna frågor';
$string['question:useall'] = 'Använd alla frågor';
$string['question:usemine'] = 'Använd Dina egna frågor';
$string['question:viewall'] = 'Visa alla frågor';
$string['question:viewmine'] = 'Visa Dina egna frågor';
$string['rating:rate'] = 'Lägg till betygssättning/omdömen till komponenterna';
$string['rating:view'] = 'Visa den sammanlagda bedömning som Du har fått';
$string['rating:viewall'] = 'Visa alla \'råa\' bedömningar som har avgivits av individer';
$string['rating:viewany'] = 'Visa de sammanlagda bedömningar som någon har fått';
$string['resetrole'] = 'Återställ till standardvärden';
$string['resetrolenolegacy'] = 'Återta tillstånd';
$string['resetrolesure'] = 'Är Du säker på att Du vill återställa rollen "{$a->name} ({$a->shortname})" till standardvärdena? <br /> Standardvärdena är  tagna från den valda ärvda kapaciteten ({$a->legacytype}).';
$string['resetrolesurenolegacy'] = 'Är Du säker på att Du vill återta alla tillstånd som har tilldelats till den här rollen "{$a->name} ({$a->shortname})"?';
$string['restore:configure'] = 'Konfigurera alternativ för återställande';
$string['restore:createuser'] = 'Skapa användare i sb m återställande';
$string['restore:restoreactivity'] = 'Aktiviteter för återställande';
$string['restore:restorecourse'] = 'Återställ kurser';
$string['restore:restoresection'] = 'Återställ sektioner';
$string['restore:restoretargethub'] = 'Återställ från filer som är markerade för hubb';
$string['restore:restoretargetimport'] = 'Återställ från filer som är markerade som import';
$string['restore:uploadfile'] = 'Ladda upp filer till områden för säkerhetskopiering';
$string['restore:userinfo'] = 'Återställ användardata';
$string['restore:viewautomatedfilearea'] = 'Återställ kurser från automatiska säkerhetskopior';
$string['risks'] = 'Risker';
$string['roleallowheader'] = 'Tillåt roll:';
$string['roleallowinfo'] = 'Väl en roll som ska läggas till listan med tillåtna roller i sammanhanget';
$string['role:assign'] = 'Tilldela användare roller';
$string['roleassignments'] = 'Tilldelning av roller';
$string['rolefullname'] = 'Namn';
$string['role:manage'] = 'Skapa och administrera roller';
$string['role:override'] = 'Översskrid tillstånd för andra';
$string['roleprohibitinfo'] = 'Välj en roll att lägga till listan av förbjudna roller i kontext {$a->context}, förmåga {$a->cap}:';
$string['roles'] = 'Roller';
$string['roleselect'] = 'Välj roll';
$string['roles_help'] = '<p>
En roll är en samling tillstånd som har definierats för hela systemet.
Du kan tilldela en viss roll till specifika användare i specifika sammanhang.

</p>

<p>
Du kan t.ex. ha en roll som kallas för "(Distans)lärare" som är inställd så att den ger (distans)lärare tillstånd att göra vissa saker och andra inte. När en sådan roll väl finns
så kan du tilldela den till någon i en kurs för att göra dem till "(distans)lärare.  Du skulle även kunna tilldela rollen till användare som kan utöva den i en kurskategori så att de kan undervisa på alla kurser i den kategorin. Du kan också tilldela någon rollen i ett mycket avgränsat och specifikt sammanhang som t.ex. bara i ett visst forum.
</p>

<p>
En roll måste ha ett <strong>namn</strong>.  Om du behöver ett namn för rollen på ett flertal språk så kan du använda multilang syntax som t.ex. <pre>
  &lt;span lang="en"&gt;Teacher&lt;/span&gt;
  &lt;span lang="es_es"&gt;Profesor&lt;/span&gt;
  </pre>Om du gör detta så måste du se till att inställningen "filtrera strängar" är aktiverad i din  installation.
</p>

<p><strong>Kortnamnet</strong> är nödvändigt för andra plugin-program i Moodle som kan behöva referera till dina roller (t.ex. när du laddar upp användare från en fil eller när du gör inställningar för registrering via ett plugin-program för det).
</p>

<p>
<strong>Beskrivningen</strong> är helt enkelt till för att du ska kunna beskriva din roll med
egna ord så att var och en kan förstå syftet med den rollen.
</p>

<p>
Se även
<a href="help.php?file=contexts.html">Sammanhang</a>,
<a href="help.php?file=permissions.html">Tillstånd</a>,
<a href="help.php?file=assignroles.html">Tilldela roller</a> and
<a href="help.php?file=overrides.html">Överskridanden</a>.
</p>';
$string['roleshortname'] = 'Kortnamn';
$string['role:switchroles'] = 'Skifta till andra roller';
$string['roletoassign'] = 'Roll att tilldela';
$string['roletooverride'] = 'Roll att överskrida';
$string['selectauser'] = 'Välj en användare';
$string['selectrole'] = 'Välj en roll';
$string['showallroles'] = 'Visa alla roller';
$string['showthisuserspermissions'] = 'Visa denna användares rättigheter';
$string['site:accessallgroups'] = 'Tillträde till alla grupper';
$string['site:approvecourse'] = 'Godkänn skapande av kurs';
$string['site:backup'] = 'Säkerhetskopiera kurser';
$string['site:config'] = 'Ändra konfigurationen för webbplatsen';
$string['site:doanything'] = 'Tillåten att göra allting';
$string['site:doclinks'] = 'Visa länkar till dokument utanför webbplatsen';
$string['site:import'] = 'Importera andra kurser i en kurs';
$string['site:manageblocks'] = 'Administrera block på en sida';
$string['site:mnetloginfromremote'] = 'Logga in från en annan instans av Moodle';
$string['site:mnetlogintoremote'] = 'Flytta över till en annan instans av Moodle';
$string['site:readallmessages'] = 'Läs alla meddelanden på webbplatsen';
$string['site:restore'] = 'Återställ kurser';
$string['site:sendmessage'] = 'Skicka meddelanden till vilken användare som helst';
$string['site:trustcontent'] = 'Lita på det innehåll som har skickats in';
$string['site:uploadusers'] = 'Ladda upp nya användare från fil';
$string['site:viewfullnames'] = 'Se alltid användarnas fullständiga namn';
$string['site:viewparticipants'] = 'Visa deltagare';
$string['site:viewreports'] = 'Visa rapporter';
$string['tag:create'] = 'Skapa nya rubriker för intressen';
$string['tag:edit'] = 'Redigera befintliga rubriker för intressen';
$string['tag:editblocks'] = 'Redigera block som finns på sidorna för rubriker för intressen';
$string['tag:manage'] = 'Administrera alla rubriker för intressen';
$string['thisusersroles'] = 'Denne användares tilldelade roller';
$string['user:changeownpassword'] = 'Ändra Ditt eget lösenord';
$string['user:create'] = 'Skapa användare';
$string['user:delete'] = 'Ta bort användare';
$string['user:editownprofile'] = 'Redigera Din egen profil';
$string['user:editprofile'] = 'Redigera användarprofil';
$string['user:loginas'] = 'Logga in som andra användare';
$string['user:manageblocks'] = 'Hantera block i användarprofil hos andra användare';
$string['user:readuserblogs'] = 'Se alla användarbloggar';
$string['user:readuserposts'] = 'Se alla inlägg från användare';
$string['user:update'] = 'Uppdatera användarprofiler';
$string['user:viewdetails'] = 'Visa användarprofiler';
$string['user:viewhiddendetails'] = 'Visa dolda detaljer angående användare';
$string['user:viewuseractivitiesreport'] = 'Se rapporter över användarnas aktivitet';
$string['user:viewusergrades'] = 'Visa betyg/omdömen för användare';
$string['viewrole'] = 'Visa detaljer angående roll';
$string['xroleassignments'] = ', tilldelade roller';
$string['xuserswiththerole'] = 'Användare med rollen "{$a->role}"';
