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
 * Strings for component 'tool_uploaduser', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_uploaduser
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = 'Tillåt borttagningar';
$string['allowrenames'] = 'Tillåt namnbyten';
$string['csvdelimiter'] = 'Avskiljare för CSV';
$string['defaultvalues'] = 'Förinställda standardvärden';
$string['deleteerrors'] = 'Ta bort fel';
$string['encoding'] = 'Inkodning';
$string['errors'] = 'Fel';
$string['nochanges'] = 'Inga ändringar';
$string['renameerrors'] = 'Fel vid namnbyte';
$string['requiredtemplate'] = 'Obligatoriskt. Du kan använda syntax för mall här  (%l = lastname, %f = firstname, %u = username).Se hjälpen för detaljer och exempel.';
$string['rowpreviewnum'] = 'Förhandsgranska rader';
$string['uploadpicture_baduserfield'] = 'Det attribut för användare som har angivits är inte giltigt. Var snäll och försök igen.';
$string['uploadpicture_cannotmovezip'] = 'Det går inte att flytta zip-filen till en temporär katalog.';
$string['uploadpicture_cannotprocessdir'] = 'Det går inte att behandla de icke-hoppackade filerna';
$string['uploadpicture_cannotsave'] = 'Det går inte att spara bilden för användare {$a}. Kontrollera originalbilden.';
$string['uploadpicture_cannotunzip'] = 'Det går inte att packa upp filen med bilder.';
$string['uploadpicture_invalidfilename'] = 'Bildfilen {$a} s namn innehåller ogiltiga tecken. Hoppar över.';
$string['uploadpicture_overwrite'] = 'Vill du skriva över de befintliga användarbilderna?';
$string['uploadpictures'] = 'Ladda upp bilder för användare';
$string['uploadpictures_help'] = '<p>Det går att ladda upp användarbilder som zippade bildfiler. Man bör ge bildfilerna ett namn <i>chosen-user-attribute.extension</i>. Om t.ex. det valda användarattribut som används för att matcha  bilder är användarnamn och detta namn är pelle1234, då bör filnamnet på bilden vara pelle1234.jpg.</p>
<p>De bildformat som  stödjs är gif, jpg, och png.</p>
<p>Namn på bildfiler är inte skiftlägeskänsliga.</p>';
$string['uploadpicture_userfield'] = 'Attribut för användare som kan användas för att matcha bilder:';
$string['uploadpicture_usernotfound'] = 'Det finns ingen användare med ett \'{$a->userfield}\' värde av \'{$a->uservalue}\'. Hoppar över.';
$string['uploadpicture_userskipped'] = 'Hoppar över användare {$a} (det finns redan en bild).';
$string['uploadpicture_userupdated'] = 'Bilden för användare {$a} har uppdaterats.';
$string['uploadusers'] = 'Ladda upp användare';
$string['uploadusers_help'] = '<p>Lägg till att börja med märke till att <strong>det i de flesta fall inte är nödvändigt att importera användare i bulk</strong>. För att minimera ditt underhållsarbete bör du istället först och främst undersöka de olika inte-manuella alternativen för autenticering, som t.ex. att koppla till befintliga externa databaser eller att låta användarna skapa sina konton själva. För mer info se sektionen för autenticering i menyerna för administration.</p>
<p>Om du är säker på att du vill importera ett flertal användarkonton från en textfil då behöver du formatera din textfil enligt följande:</p>

<ul>
  <li>Varje rad i filen innehåller en post</li>
  <li>Varje post utgörs av en serie data som är separerade med komman (eller andra avskiljare)</li>
  <li>Den första posten i posten är speciell och innehåller en lista med namn på de olika fälten. Detta fungerar som en mall för formatet på resten av filen.
    <blockquote>
      <p><strong>Obligatoriska fältnamn:</strong> dessa fält måste ingå i den första posten och vara  definierade för varje användare</p>
      <p><code>firstname(förnamn), lastname (efternamn)</code> när du matar in eller uppdaterar <code>username(användarnamn)</code> </p>
      <p><strong>Valfria fältnamn:</strong> alla dessa fältnamn är helt valfria: Om det finns ett värde för fältet i filen då kommer det värdet att användas; om inte så kommer standardvärdet för det fältet att användas.</p>
      <p><code>institution, department(avdelning), city (stad, ort), country (land), lang (språk), auth, ajax, timezone (tidszon), idnumber (id-nummer), icq, phone1 (tfn1), phone2 (tfn2), address (adress), url, description (beskrivning), mailformat (format på e-post), maildisplay (visning av e-post), htmleditor (XHTML-redigerare), autosubscribe (prenumerera automatiskt, emailstop</code></p>
      <p><strong>Standardnamn för fält i profilen:</strong> valfritt, xxxxx är det riktiga standardnamnet på fältet i användarprofilen (dvs det unika kortnamnet)</p>
      <p><code>profile_field_xxxxx</code></p>
      <p><strong>Speciella fältnamn:</strong> dessa används för att ändra användarnamn och för att ta bort användare, se nedan:</p>
      <p><code>deleted (borttagen), oldusername (gammaltanvändarnamn)</code></p>
      <p><strong>Fältnamn för registrering (valfritt):</strong> Kursnamnen utgörs av  &quot;kortnamnen&quot; på kurserna - om det finns sådana så kommer användaren att registreras på de kurserna.  </p>
<p>&quot;Type&quot; betyder den typ av roll som ska användas för den aktuella registreringen på kursen.
         Värde 1 är den förvalda standardrollen i kursen, 2 är den auktoriserade  (distans)lärarrollen och  3 är den auktoriserade icke-redigerande (distans)lärarrollen.</p> <p>Du kan använda rollfältet istället för att ange rollerna direkt; isåfall ska du antingen använda kortnamnet för rollen eller ID (numeriska namn på roller stödjs inte).
</p><p>Du kan även dela in användare i grupper
i kurs (grupp1 i kurs1, grupp2 i kurs2, etc.). Grupper identifieras igen via sina namn eller IDn          (numeriska namn på grupper stödjs inte).</p> <p><code>course1, type1, role1, group1, course2, type2, role2, group2, etc.</code></p>
    </blockquote>
    </li>
  <li>Komman inom datan bör du märka upp som &amp;#44 -  skriptet kommer automatiskt att avkoda
dessa och omvandla dem till komman.</li>
  <li>När det gäller Booleanska fält ska du använda 0 för "false" (falsk) och 1 för "true" (sann). </li>
</ul>
<p>Här är ett exempel på en giltig fil för import:</p>
<p><code>username, password, firstname, lastname, email, lang, idnumber, maildisplay, course1, group1, type1<br />
jonest, mycket_hemligt, Tom, Jonsson, jonest@ort.edu, sv, 3663737, 1, Intro101, Section 1, 1<br />
reznort, lite_hemligt, Trent, Reznor, reznort@skaane.edu, sv, 6736733, 0, Advanced202, Section 3, 3
</code></p>

<h2>Mallar</h2>
<p>Standardvärdena behandlas som mallar och i dem är de följande koderna tillåtna:</p>
<ul>
<li><code>%l</code> - kommer att ersättas av lastname</li>
<li><code>%f</code> - kommer att ersättas av firstname</li>
<li><code>%u</code> - kommer att ersättas av username</li>
<li><code>%%</code> - kommer att ersättas av %</li>
</ul>
<p>Mellan procenttecknet (%) och valfri kodbokstav (l, f eller u) är de följande modifierarna tillåtna:</p>
<ul>
<li>(-) minustecknet - den information som specificeras av kodbokstaven kommer att omvandlas till minuskler (små bokstäver)</li>
<li>(+) plustecknet - t den information som specificeras av kodbokstaven kommer att omvandlas till VERSALER (stora bokstäver)</li>
<li>(~) tildetecknet -  den information som specificeras av kodbokstaven kommer att omvandlas till  "Title Case"</li>
<li>ett decimaltal -  den information som specificeras av kodbokstaven kommer att trunkeras till det antalet tecken</li>
</ul>

<p>Om t.ex. förnamnet är Johan och efternamnet är Andersson då kommer du att få följande värden om du använder de angivna mallarna:</p>
<ul>
<li>%l%f = AnderssonJohan</li>
<li>%l%1f = AnderssonJ</li>
<li>%-l%+f = anderssonJOHAN</li>
<li>%-f_%-l = johan_andersson</li>
<li>http://www.example.com/~%u/ = http://www.example.com/~jdoe/ (om användarnamnet är jdoe eller %-1f%-l)</li>
</ul>
<p>Denna behandling av mallarna tillämpas bara på standardvärdena och inte på den värden som hämtas från den (kommaseparerade) CSV-filen.</p>
<p>För att du ska kunna skapa riktiga användarnamn för Moodle så omvandlas användarnamnen alltid till minuskler (små bokstäver). Dessutom är det så att om alternativet &quot;Tillåt specialtecken i användarnamn&quot; på sidan Regler för användning är avaktiverat så kommer tecken som inte är bokstäver, siffror, bindestreck (-) och punkt (.) att tas bort. </p>
<p>Om t.ex. förnamnet är Johan Jr. och efternamnet är Andersson då kommer användarnamnet %-f_%-l att  resultera i johan jr._andersson när  &quot;Tillåt specialtecken i användarnamn&quot; är aktiverat och  johanjr.andersson när det är avaktiverat.</p>
<p>När &quot;Lägg till räknare&quot; i &quot;Hantering av nya användarnamn som är dubbletter&quot; är aktiverat så kommer en räknare att automatiskt lägga till ett tal till de dubbletter av användarnamn som skapas av mallen.</p><p> Om t.ex. CSV-filen innehåller användarna Johan Andersson, Janna Andersson och Johanna Andersson utan uttryckliga användarnamn så kommer det standardmässiga användarnamnet att vara %-1f%-l.</p><p> Och om dessutom &quot;Lägg till räknare&quot; i &quot;Hantering av nya användarnamn som är dubbletter&quot; är aktiverat då kommer de resulterande användarnamnen att bli jandersson, jandersson2 och jandersson3.
</p>

<h2>Att uppdatera befintliga konton</h2>

<p>Som standardmässigt förval så kommer Moodle att anta att du kommer att skapa nya konton och därför hoppa över poster där användarnamnet överensstämmer med ett befintligt konto. </p><p> Om du däremot tillåter uppdatering så kommer även det befintliga användarkontot att uppdateras. </p>

<p>När du uppdaterar befintliga konton så kan du även byta användarnamnen. Ange isåfall <b>"Ja"</b> som svar på  "Tillåt namnbyten"  och ta även med ett fält i din fil som ska heta <code>oldusername</code>.</p>

<p><b>OBS!</b> Alla fel som kan uppstå när du uppdaterar befintliga konton kan påverka dina användare på ett menligt sätt. Var därför försiktig när du använder det här alternativet.</p>

<h2>Att ta bort konton</h2>
<p>Om fältet <code>deleted (borttagen)</code> finns med så kommer användare med värdet 1 för det
att tas bort. I det här fallet kan alla fält undantas utom det för <code>username (användarnamn)</code>.</p>
<p>Du kan ta bort eller ladda upp konton med hjälp av en enda CSV-fil. Den följande filen kommer t.ex. att lägga till användaren Johan Andersson och ta bort användaren kurtnilsson:</p>
<p><code>username, firstname, lastname, deleted<br />
jand, Johan, Andersson, 0<br />
kurtnilsson, , , 1
</code></p>';
$string['uploaduserspreview'] = 'Ladda upp förhandsgranskning av användare';
$string['uploadusersresult'] = 'Ladda upp resultat för användare';
$string['useraccountupdated'] = 'Användare har uppdaterats';
$string['userdeleted'] = 'Användare borttagen';
$string['userrenamed'] = 'Användare  har fått nya namn';
$string['userscreated'] = 'Användare har skapats';
$string['usersdeleted'] = 'Användare borttagna';
$string['usersrenamed'] = 'Användare  har fått nya namn';
$string['usersskipped'] = 'Användare hoppades över';
$string['usersupdated'] = 'Användare har uppdaterats';
$string['usersweakpassword'] = 'Användare som har ett svagt lösenord';
$string['uubulk'] = 'Markera för bearbetning i bulk';
$string['uubulkall'] = 'Alla användare';
$string['uubulknew'] = 'Nya användare';
$string['uubulkupdated'] = 'Uppdaterade användare';
$string['uucsvline'] = 'CSV-rad';
$string['uulegacy1role'] = '(Original Student) typeN=1';
$string['uulegacy2role'] = '(Original lärare) typeN=2';
$string['uulegacy3role'] = '(Original icke-redigrerande lärare) typeN=3';
$string['uunoemailduplicates'] = 'Förhindra att den skapas dubletter av e-postadresser';
$string['uuoptype'] = 'Typ av uppladdning';
$string['uuoptype_addinc'] = 'Lägg till alla, koppla till en räknare till användarnamn om det behövs.';
$string['uuoptype_addnew'] = 'Lägg endast till en ny, hoppa över befintliga användare';
$string['uuoptype_addupdate'] = 'Lägg till nya och uppdatera befintliga användare';
$string['uuoptype_update'] = 'Uppdatera endast befintliga användare';
$string['uupasswordnew'] = 'Nytt lösenord för användare';
$string['uupasswordold'] = 'Befintligt lösenord för användare';
$string['uuupdateall'] = 'Överskrid med fil och standardmässiga förval';
$string['uuupdatefromfile'] = 'Överskrid med fil';
$string['uuupdatemissing'] = 'Fyll i det som saknas från fil och standardmässiga förval';
$string['uuupdatetype'] = 'Befintliga detaljer för användare';
