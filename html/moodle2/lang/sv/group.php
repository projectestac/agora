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
 * Strings for component 'group', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   group
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addedby'] = 'Lagt till av {$a}';
$string['addgroup'] = 'Lägg till användaren till gruppen';
$string['addgroupstogrouping'] = 'Lägg till grupp till gruppkategorisering';
$string['addgroupstogroupings'] = 'Lägg till/ta bort grupper';
$string['adduserstogroup'] = 'Lägg till/ta bort användare';
$string['allocateby'] = 'Fördela medlemmar';
$string['anygrouping'] = '[Alla typer av gruppkategoriseringar ]';
$string['autocreategroups'] = 'Skapa grupper automatiskt';
$string['backtogroupings'] = 'Tillbaka till gruppkategoriseringar';
$string['backtogroups'] = 'Tillbaka till grupper';
$string['badnamingscheme'] = 'Det måste innehålla exakt ett \'@\' eller ett \'#\' tecken.';
$string['byfirstname'] = 'Alfabetiskt enligt förnamn, efternamn';
$string['byidnumber'] = 'Alfabetiskt enligt  ID-nummer';
$string['bylastname'] = 'Alfabetiskt enligt efternamn, förnamn';
$string['createautomaticgrouping'] = 'Skapa automatiska gruppkategoriseringar';
$string['creategroup'] = 'Skapa grupp';
$string['creategrouping'] = 'Skapa gruppkategoriseringar';
$string['creategroupinselectedgrouping'] = 'Skapa grupp  i gruppkategorisering';
$string['createingrouping'] = 'Skapa i gruppkategorisering';
$string['createorphangroup'] = 'Skapa \'föräldralös\' grupp';
$string['databaseupgradegroups'] = 'Versionerna för grupper är nu {$a}';
$string['defaultgrouping'] = 'Förinställd gruppkategorisering';
$string['defaultgroupingname'] = 'Gruppkategorisering';
$string['defaultgroupname'] = 'Grupp';
$string['deleteallgroupings'] = 'Ta bort alla gruppkategoriseringar';
$string['deleteallgroups'] = 'Ta bort alla grupper';
$string['deletegroupconfirm'] = 'Är Du säker på att Du vill ta bort grupp \'{$a}\'?';
$string['deletegrouping'] = 'Tar bort gruppkategorisering';
$string['deletegroupingconfirm'] = 'Är Du säker på att Du vill ta bort gruppindelning \'{$a}\'? (Grupper i gruppkategorisering tas inte bort.)';
$string['deletegroupsconfirm'] = 'Är Du säker på att Du vill ta bort de följande grupperna?';
$string['deleteselectedgroup'] = 'Ta bort markerad grupp';
$string['editgroupingsettings'] = 'Redigera inställningar för gruppkategorisering';
$string['editgroupsettings'] = 'Redigera inställningar för grupp';
$string['enrolmentkey'] = 'Nyckel för registrering';
$string['enrolmentkey_help'] = 'En kursnyckel ger tillgång till kursen och begränsar tillträdet till de som känner till nyckeln. Om en grupp-kursnyckel används kommer användaren förutom att få tillträde till kursen även bli medlem av den här gruppen automatiskt.';
$string['erroraddremoveuser'] = 'Fel i samband med att användare  {$a} skulle läggas till/ tas bort från grupp';
$string['erroreditgroup'] = 'Fel i samband med skapande/uppdatering av  {$a}';
$string['erroreditgrouping'] = 'Fel i samband med skapande/uppdatering av gruppkategorisering  {$a}';
$string['errorinvalidgroup'] = 'Fel, ogiltig grupp {$a}';
$string['errorremovenotpermitted'] = 'Du har inte behörighet att ta bort den automatiskt tillagda grupp medlemen {$a}';
$string['errorselectone'] = 'Var snäll och välj en enskild grupp innan Du väljer det här alternativet.';
$string['errorselectsome'] = 'Var snäll och välj en eller flera grupper innan Du väljer det här alternativet.';
$string['evenallocation'] = 'OBS! För att fördelningen på grupper ska bli jämn så kommer det faktiska antalet medlemmar per grupp att variera i förhållande till det antal du har angivit.';
$string['existingmembers'] = 'Befintliga medlemmar: {$a}';
$string['filtergroups'] = 'Filtrera grupper enligt:';
$string['group'] = 'Grupp';
$string['groupaddedsuccesfully'] = 'Grupp {$a} har lagts till framgångsrikt';
$string['groupby'] = 'Specificera:';
$string['groupdescription'] = 'Beskrivning av grupp';
$string['groupinfo'] = 'Info om vald grupp';
$string['groupinfomembers'] = 'Info om valda  medlemmar';
$string['groupinfopeople'] = 'Info om valda personer';
$string['grouping'] = 'gruppkategorisering';
$string['groupingdescription'] = 'Beskrivning av gruppkategorisering';
$string['grouping_help'] = '<p>En gruppering är en samling av grupper
 inom en kurs - ett nytt koncept som introducerades i Moodle 1.8.
</p>

<p>Avsikten är att olika grupperingar kan användas för olika aktiviteter
i kursen, så att grupperna i t.ex.
 en "gruppering för samarbete" skulle användas för en grupp-wiki medan
en "gruppering för diskussioner" skulle användas för en forum-aktivitetet.

</p>

<p>På sidan för inställningar för kurs så kan Du helt enkelt behålla det förinställda
standardvärdet (vilken gruppering som helst) eller välja den gruppering Du vill ha och spara Dina ändringar.
</p>';
$string['groupingname'] = 'Namn på ggruppkategori';
$string['groupingnameexists'] = 'Namnet \'{$a}\' för gruppkategorisering finns redan i den här kursen, var snäll och välj en annan.';
$string['groupings'] = 'gruppkategorisering';
$string['groupingsection'] = 'Gruperat tillträde';
$string['groupingsection_help'] = 'En gruppering är en samling av grupper inom en kurs. Om gruppering väljs här kommer endast studenter som tilldelats grupper inom den här gruppen ha tillgång till sektionen.';
$string['groupingsonly'] = 'Endast gruppkategoriseringar';
$string['groupmember'] = 'Medlem av grupp';
$string['groupmemberdesc'] = 'Standardroll för en medlem i en grupp';
$string['groupmembers'] = 'Gruppmedlemmar';
$string['groupmembersonly'] = 'Endast tillgänglig för gruppmedlemmar';
$string['groupmembersonlyerror'] = 'Du måste tyvärr vara medlem i åtminstone en grupp som används i den här aktiviteten.';
$string['groupmembersonly_help'] = 'Om alternativet är ikryssat kommer aktiviteten (eller resursen) endast vara tillgänglig för studenter som tillhör grupper inom den valda grupperingen.';
$string['groupmemberssee'] = 'Se gruppmedlemmar';
$string['groupmembersselected'] = 'Medlemmar i vald grupp';
$string['groupmode'] = 'Gruppläge';
$string['groupmodeforce'] = 'Framtvinga gruppläge';
$string['groupmodeforce_help'] = 'Om gruppläge är tvingande, kommer gruppläge att tillämpas på varje aktivitet i kursen. Gruppinställningar för varje enskild aktivitet kommer då att ignoreras.';
$string['groupmode_help'] = 'Du kan göra indelningar i grupper på följande tre sätt:
   <ul>
      <li><b>Inga grupper</b> - det finns inga subgrupper utan alla tillhör samma stora gemenskap (ung. klass).</li>
      <li><b>Separata grupper</b> - deltagarna i varje grupp kan bara se sin egen grupp, övriga grupper är dolda.</li>
      <li><b>Synliga grupper</b>  - deltagarna i varje grupp arbetar i sin egen grupp men de kan också se de andra grupperna.</li>
   </ul>
<p>Gruppindelningen kan definieras på två nivåer:</p>
<dl>
   <dt><b>1. Kursnivå</b></dt>
   <dd>Gruppindelningen definieras på kursnivå vilket är standardinställningen för alla aktiviteter på den kursen.
    <br /><br /></dd>
   <dt><b>2. Aktivitetsnivå</b></dt>
   <dd>Varje enskild aktivitet som stödjer grupper kan också delas upp så att flera olika grupper arbetar med samma aktivitet.
   Om kursen är inställd för "<a href="help.php?module=moodle&file=groupmodeforce.html">Obligatorisk indelning i grupper</a>" då kommer
   inställningen för varje enskild aktivitet att bli ogiltig.</dd>
</dl>';
$string['groupmy'] = 'Min grupp';
$string['groupname'] = 'Group name';
$string['groupnameexists'] = 'Gruppnamnet \'{$a}\' finns redan i den här kursen, var snäll och välj en annan,';
$string['groupnotamember'] = 'Du är tyvärr inte medlem av den gruppen.';
$string['groups'] = 'Grupper';
$string['groupscount'] = 'Grupper ({$a})';
$string['groupsettingsheader'] = 'Grupper';
$string['groupsgroupings'] = 'Grupper & gruppkategoriseringar';
$string['groupsinselectedgrouping'] = 'Grupper i gruppindelning';
$string['groupsnone'] = 'Inga grupper';
$string['groupsonly'] = 'Endast grupper';
$string['groupspreview'] = 'Förhandsgranska grupper';
$string['groupsseparate'] = 'Separata grupper';
$string['groupsvisible'] = 'Synliga grupper';
$string['grouptemplate'] = 'Grupp @';
$string['hidepicture'] = 'Dölj bild';
$string['importgroups'] = 'Importera grupper';
$string['importgroups_help'] = 'Grupper kan importeras via testfiler. Formatet för filen ska vara som följer:

* Varje rad i filen innehåller en post
* Varje post är en serie av data separerade av kommatecken
* Den första posten innehåller en lista över fältnamn och definierar formatet på resten av filen.
* Obligatoriska fältnamn är groupname (gruppnamn)
* Valfria fältnamn är description, enrolmentkey, picture, hidepicture (beskrivning, kursnyckel, offentlig bild, dold bild)';
$string['javascriptrequired'] = 'Den här sidan kräver Javascript för att aktiveras.';
$string['members'] = 'Medlemmar per grupp';
$string['membersofselectedgroup'] = 'Medlemmar av grupp';
$string['namingscheme'] = 'Modell för namngivning';
$string['namingscheme_help'] = 'At (@) symbolen kan användas för att skapa grupper med fortlöpande bokstavs benämning. Till exempel Grupp @ genererar grupper med namnen Grupp A, Grupp B, Grupp C osv.

Nummertecknet (#) kan användas för att skapa grupper med fortlöpande numerisk benämning. Till exempel Grupp # genererar grupper med namnen Grupp1, Grupp2, Grupp3 osv.';
$string['newgrouping'] = 'Ny gruppkategorisering';
$string['newpicture'] = 'Ny bild';
$string['newpicture_help'] = '<p>Du kan ladda upp en bild fr&aring;n Din dator till den h&auml;r servern.
Denna bild kommer att anv&auml;ndas i olika sammanhang f&ouml;r att
representera Dig.</p>
<p>Av den h&auml;r anledningen &auml;r det b&auml;st med en
n&auml;rbild p&aring; Ditt ansikte, men Du kan anv&auml;nda vilken bild Du vill.</p>
<p>Bilden m&aring;ste vara i JPG- eller PNG-format (dvs filnamnen slutar vanligtvis p&aring; .jpg eller .png).</p>
<p>Du kan skapa en bildfil med en av de fyra nedanst&aring;ende metoderna:</p>
<ol>
<li>Du kan anv&auml;nda en digital kamera, vilket inneb&auml;r att Dina bilder
sannolikt redan finns i Din dator och i r&auml;tt format.</li>
<li>Du kan anv&auml;nda en scanner f&ouml;r att scanna en pappersbild.
Se till att Du sparar den i JPG- eller PNG-format.</li>
<li>Om Du &auml;r konstn&auml;rligt lagd s&aring; kan Du kanske teckna en bild
med hj&auml;lp av ett grafiskt program.</li>
<li>Slutligen kan Du hitta bilder p&aring; webben som n&aring;gon har st&auml;llt till fritt f&ouml;rfogande.
<br />Du b&ouml;r dock kontrollera att bilden verkligen &auml;r fri att anv&auml;nda.
<br />
Normalt sett s&aring; &auml;r bilder upphovsr&auml;ttsskyddade
och d&aring; m&aring;ste Du fr&aring;ga den som &auml;ger r&auml;ttigheterna om lov f&ouml;rst.
<br />
<a target="google" href="http://images.google.com/">http://images.google.com</a>
&auml;r en superb plats att leta efter bilder p&aring;. N&auml;r Du v&auml;l har funnit
en kan Du \'h&ouml;gerklicka\' p&aring; den med musen och v&auml;lja \'Spara bild\' fr&aring;n
menyn. Det kan skilja sig lite fr&aring;n dator till dator hur man g&ouml;r.</li>
</ol>
<p>F&ouml;r att ladda upp bilden ska Du klicka p&aring; \'Bl&auml;ddra\'-knappen
p&aring; den h&auml;r sidan och v&auml;lja bilden fr&aring;n Din h&aring;rddisk.
</p>
<p>OBS! F&ouml;rvissa Dig om att filen inte &auml;r st&ouml;rre &auml;n
den angivna maxstorleken, annars laddas den inte upp.</p>
<p>Klicka sedan p&aring; \'Uppdatera profil\' l&auml;ngst ner -
bilden kommer att formas om till en kvadrat och skalas ner till en storlek av
100x100 pixlar.</p>
<p>N&auml;r Du kommer till Din personliga presentationssida kanske det visar sig att bilden inte
har &auml;ndrats. Om det skulle vara s&aring; beh&ouml;ver Du bara anv&auml;nda funktionen
\'Ladda om sidan\' i Din webbl&auml;sare.</p>';
$string['noallocation'] = 'Ingen fördelning';
$string['nogroups'] = 'Det finns ingen uppsättning av grupper i den här kursen ännu.';
$string['nogroupsassigned'] = 'Det har inte tilldelats några grupper';
$string['nopermissionforcreation'] = 'Det går inte att skapa grupp \'{$a}\' eftersom Du inte har de rättigheter som krävs.';
$string['nosmallgroups'] = 'Förhindra den sista lilla gruppen';
$string['notingrouping'] = '[Inte i gruppkategorisering]';
$string['nousersinrole'] = 'Det finns inga lämpliga användare i den valda rollen';
$string['number'] = 'Räkning av grupper/medlemmar';
$string['numgroups'] = 'Antal grupper';
$string['nummembers'] = 'Medlemmar per grupp';
$string['overview'] = 'Översikt';
$string['potentialmembers'] = 'Potentiella medlemmar: {$a}';
$string['potentialmembs'] = 'Möjliga medlemmar';
$string['printerfriendly'] = 'Utskriftsvänlig visning';
$string['random'] = 'Slumpmässig';
$string['removefromgroup'] = 'Ta bort användare från grupp {$a}';
$string['removefromgroupconfirm'] = 'Vill du verkligen ta bort användaren "{$a->user}" från gruppen  "{$a->group}"?';
$string['removegroupfromselectedgrouping'] = 'Ta bort grupp från gruppkategorisering';
$string['removegroupingsmembers'] = 'Ta bort alla grupper från gruppkategoriseringarna';
$string['removegroupsmembers'] = 'Ta bort alla medlemmar i grupp';
$string['removeselectedusers'] = 'Ta bort de markerade användarna';
$string['selectfromrole'] = 'Välj medlem från roll';
$string['showgroupsingrouping'] = 'Visa grupper i gruppkategorisering';
$string['showmembersforgroup'] = 'Visa medlemmar i grupp';
$string['toomanygroups'] = 'Otillräckligt antal användare för att fylla upp det här antalet grupper - det finns bara {$a} användare i den valda rollen.';
$string['usercount'] = 'Räkning av användare';
$string['usercounttotal'] = 'Räkning av användare ({$a})';
$string['usergroupmembership'] = 'Den valda användarens medlemsskap:';
