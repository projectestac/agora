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
 * Strings for component 'badges', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   badges
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Åtgärder';
$string['activate'] = 'Aktivera tillgång';
$string['activatesuccess'] = 'Aktivering av tillgång till märken lyckades.';
$string['addbadgecriteria'] = 'Lägg till kriterier för märke';
$string['addcourse'] = 'Lägg till kurser';
$string['addcourse_help'] = 'Välj alla kurser som ska läggas till kraven för det här märket. Håll ned CTRL-tangenten för att välja fler än en kurs.';
$string['addcriteria'] = 'Lägg till kriterier';
$string['addcriteriatext'] = 'För att börja lägga till kriterier, var god välj ett av alternativen från rullgardinsmenyn.';
$string['addtobackpack'] = 'Lägg till i ryggsäck';
$string['adminonly'] = 'Den här sidan är begränsad till enbart administratörer för webbplatsen.';
$string['after'] = 'efter datumet för utfärdande.';
$string['aggregationmethod'] = 'Metod för aggregation';
$string['all'] = 'Alla';
$string['allmethod'] = 'Alla de valda villkoren är uppfyllda';
$string['allmethodactivity'] = 'Alla de valda aktiviteterna är slutförda';
$string['allmethodcourseset'] = 'Alla de valda kurserna är slutförda';
$string['allmethodmanual'] = 'Alla valda roller tilldelar märket';
$string['allmethodprofile'] = 'Alla de valda profilfälten har fyllts i';
$string['allowcoursebadges'] = 'Aktivera märken för kurser';
$string['allowcoursebadges_desc'] = 'Tillåt märken att skapas och tilldelas i kontexten av kursen.';
$string['allowexternalbackpack'] = 'Aktivera anslutning till externa ryggsäckar';
$string['allowexternalbackpack_desc'] = 'Tillåt användare att konfigurera anslutningar och visa märken från deras externa ryggsäcks-leverantörer.

Observera: Det är rekommenderat att låta den här inställningen förbli deaktiverad om webbplatsen inte kan nås via Internet (t.ex. på grund av brandväggen).';
$string['any'] = 'Någon/något';
$string['anymethod'] = 'Något av de valda villkoren är uppfyllt';
$string['anymethodactivity'] = 'Någon av de valda aktiviteterna är slutförd';
$string['anymethodcourseset'] = 'Någon av de valda kurserna är slutförd';
$string['anymethodmanual'] = 'Någon av de valda rollerna tilldelar märket';
$string['anymethodprofile'] = 'Något av de valda profilfälten är ifyllt';
$string['attachment'] = 'Bifoga märke med meddelande';
$string['attachment_help'] = 'Om ikryssad så kommer ett utfärdat märke bifogas med mottagarens epost för nedladdning';
$string['award'] = 'Tilldela märke';
$string['awardedtoyou'] = 'Utfärdade till mig';
$string['awardoncron'] = 'Aktivering av tillgång till märken lyckades. Det här märket kan omedelbart tas av för många användare, för att säkerställa webbplatsens prestanda så kommer denna åtgärd att ta lite tid att bearbeta.';
$string['awards'] = 'Mottagare';
$string['backpackavailability'] = 'Extern verifikation av märke';
$string['backpackavailability_help'] = 'För att mottagare av märken ska ha möjlighet att bevisa att de tagit märken från er så måste en extern ryggsäcks-tjänst kunna komma åt eran webbplats och verifiera märken som utfärdats från den. För tillfället verkar eran webbplats inte vara tillgänglig, vilket betyder att märken som ni redan utfärdat, eller kommer utfärda i framtiden, inte kan verifieras.

##Varför ser jag det här meddelandet?

Det kan vara så att eran brandvägg förhindrar åtkomst från användare utanför erat nätverk, att eran webbplats är lösenordsskyddad eller att webbplatsen körs på en dator som inte är tillgänglig via Internet (som t.ex. en lokal utvecklingsmaskin).

##Är det här ett problem?

Du bör åtgärda det här problemet på alla produktionswebbplatser där ni planerar att utfärda märken, annars kommer mottagarna inte kunna bevisa att de tagit märken från er. Om eran webbplats inte ännu är live så kan ni skapa och utfärda testmärken, så länge eran webbplats är tillgänglig innan ni går live.

##Vad händer om jag inte kan göra hela webbplatsen publikt tillgänglig?

Den enda URL som krävs för verifikation är [din-webbplats-url]/badges/assertion.php så om du kan konfigurera din brandvägg för extern åtkomst till den filen så kommer verifikation av märken fortfarande fungera.';
$string['backpackbadges'] = 'Du har {$a->totalbadges} märke(n) visade av {$a->totalcollections} samling(ar). <a href="mybackpack.php">Ändra inställningar för ryggsäck</a>.';
$string['backpackconnection'] = 'Anslutning till ryggsäck';
$string['backpackconnection_help'] = 'Den här sidan tillåter dig att ansluta en extern ryggsäcks-leverantör. Att ansluta till en ryggsäck låter dig visa externa märken inom den här webbplatsen och att trycka ut märken du tagit här till din externa ryggsäck.

För nuvarande stöds endast <a href="http://backpack.openbadges.org">Mozilla OpenBadges Backpack</a>. Du behöver registrera dig hos en ryggsäcks-tjänst innan du försöker ansluta ryggsäcken via den här sidan.';
$string['backpackdetails'] = 'Inställningar för ryggsäck';
$string['backpackemail'] = 'E-postadress';
$string['backpackemail_help'] = 'E-postadress associerad med din ryggsäck.

Om anslutning till ryggsäcken etableras kommer den här e-postadressen användas istället för din interna e-postadress för att trycka ut märken till din ryggsäck.';
$string['backpackimport'] = 'Inställningar för import av märken';
$string['backpackimport_help'] = 'Efter lyckad anslutning av ryggsäck så kan märken från din ryggsäck visas på din "Mina märken"-sida och din profilsida.

I detta område kan du välja samlingar av märken från din ryggsäck som du vill visa i din profil.';
$string['badgedetails'] = 'Detaljer för märke';
$string['badgeimage'] = 'Bild';
$string['badgeimage_help'] = 'Det här är en bild som kommer användas när det här märket utfärdas.

För att lägga till en ny bild, bläddra och välj en bild (i JPG- eller PNG-format), klicka sedan på "Spara ändringar". Bilden kommer att beskäras till en fyrkant och skalas om för att matcha bildkraven för märken.';
$string['badgeprivacysetting'] = 'Sekretessinställningar för märke';
$string['badgeprivacysetting_help'] = 'Märken som du tar kan visas på din kontoprofilsida. Den här inställningen tillåter dig att automatiskt ställa in synligheten på nyligen tagna märken.

Du kan fortfarande göra individuella sekretessinställningar för märken på din "Mina märken"-sida.';
$string['badgeprivacysetting_str'] = 'Visa automatiskt märken jag tagit på min profilsida';
$string['badgesalt'] = 'Salt för att hasha mottagarens epost-adress';
$string['badgesalt_desc'] = 'Användningen av en hash ger ryggsäcks-tjänster möjligheten att bekräfta den som tagit ett märke utan att exponera dennes epost-adress. Den här inställningen ska bara använda siffror och bokstäver.';
$string['badgesdisabled'] = 'Märken är inte aktiverade på den här webbplatsen.';
$string['badgesearned'] = 'Antal tagna märken: {$a}';
$string['badgesettings'] = 'Inställningar för märken';
$string['badgestatus_0'] = 'Inte tillgängliga för användare';
$string['badgestatus_1'] = 'Tillgängliga för användare';
$string['badgestatus_2'] = 'Inte tillgängliga för användare';
$string['badgestatus_3'] = 'Tillgängliga för användare';
$string['badgestatus_4'] = 'Arkiverade';
$string['badgestoearn'] = 'Antal tillgängliga märken: {$a}';
$string['badgesview'] = 'Märken för kurs';
$string['badgeurl'] = 'Länk till utfärdat märke';
$string['bawards'] = 'Mottagare ({$a})';
$string['bcriteria'] = 'Kriterier';
$string['bdetails'] = 'Redigera detaljer';
$string['bmessage'] = 'Meddelande';
$string['boverview'] = 'Översikt';
$string['bydate'] = 'slutför senast';
$string['clearsettings'] = 'Rensa inställningar';
$string['completioninfo'] = 'Det här märket utfärdades för slutförandet av:';
$string['completionnotenabled'] = 'Slutförande av kurs är inte aktiverad för den här kursen så den kan inte inkluderas i kriterierna för märket. Slutförande av kurs kan aktiveras i inställningarna för kurser.';
$string['configenablebadges'] = 'Om aktiverad så låter den här funktionen dig skapa märken och tilldela dem till webbplatsens användare.';
$string['configuremessage'] = 'Meddelande för märke';
$string['connect'] = 'Anslut';
$string['connected'] = 'Ansluten';
$string['connecting'] = 'Ansluter ...';
$string['contact'] = 'Kontakt';
$string['contact_help'] = 'En e-postadress associerad med utfärdaren av märken.';
$string['copyof'] = 'Kopia av {$a}';
$string['coursebadges'] = 'Märken';
$string['coursebadgesdisabled'] = 'Märken för kurser är inte aktiverade på den här webbplatsen.';
$string['coursecompletion'] = 'Användare måste slutföra den här kursen.';
$string['create'] = 'Nytt märke';
$string['createbutton'] = 'Skapa märke';
$string['creatorbody'] = '<p>{$a->user} har uppnått alla krav för märket och har tilldelats det. Visa det utfärdade märket via {$a->link} </p>';
$string['creatorsubject'] = '\'{$a}\' har tagits!';
$string['criteria_0'] = 'Det här märket tilldelas när...';
$string['criteria_1'] = 'Slutförande av aktivitet';
$string['criteria_1_help'] = 'Låter ett märke tilldelas en användare baserat på slutförandet av en uppsättning aktiviteter inom en kurs.';
$string['criteria_2'] = 'Manuellt utförande genom roll';
$string['criteria_2_help'] = 'Låter ett märke tilldelas manuellt av användare med en specifik roll inom webbplatsen eller kursen.';
$string['criteria_3'] = 'Social medverkan';
$string['criteria_3_help'] = 'Socialt';
$string['criteria_4'] = 'Slutförande av kurs';
$string['criteria_4_help'] = 'Låter ett märke tilldelas en användare som slutfört kursen. Det här kriteriet kan ha ytterligare parametrar som t.ex. lägst tillåtna betyg och datum för slutförande av kurs.';
$string['criteria_5'] = 'Slutförande av en uppsättning kurser';
$string['criteria_5_help'] = 'Låter ett märke tilldelas en användare som slutfört en uppsättning kurser. Varje kurs kan ha ytterligare parametrar som t.ex. lägst tillåtna betyg och datum för slutförande av kurs.';
$string['criteria_6'] = 'Ifyllnad av profil';
$string['criteria_6_help'] = 'Låter ett märke tilldelas en användare för att de fyllt i vissa fält i deras profil. Du kan välja bland de profilfält, standard och anpassade, som är tillgängliga för användarna.';
$string['criteria_descr'] = 'Användare tilldelas det här märket när de uppnått följande krav:';
$string['criteria_descr_0'] = 'Användare tilldelas det här märket när de uppnått <strong>{$a}</strong> av de listade kraven.';
$string['criteria_descr_1'] = '<strong>{$a}</strong> av de följande aktiviteterna är slutförda:';
$string['criteria_descr_2'] = 'Det här märket behöver tilldelas av användare med <strong>{$a}</strong> av de följande rollerna:';
$string['criteria_descr_4'] = 'Användare måste slutföra kursen';
$string['criteria_descr_5'] = '<strong>{$a}</strong> av de följande kurserna måste slutföras:';
$string['criteria_descr_6'] = '<strong>{$a}</strong> av de följande användarprofilfälten måste fyllas i:';
$string['criteria_descr_bydate'] = 'senast <em>{$a}</em>';
$string['criteria_descr_grade'] = 'med lägst betyget <em>{$a}</em>';
$string['criteria_descr_short0'] = 'Slutför <strong>{$a}</strong> av:';
$string['criteria_descr_short1'] = 'Slutför <strong>{$a}</strong> av:';
$string['criteria_descr_short2'] = 'Tilldelat genom <strong>{$a}</strong> av:';
$string['criteria_descr_short4'] = 'Slutför kursen';
$string['criteria_descr_short5'] = 'Slutför <strong>{$a}</strong> av:';
$string['criteria_descr_short6'] = 'Slutför <strong>{$a}</strong> av:';
$string['criteria_descr_single_1'] = 'Följande aktivitet måste slutföras:';
$string['criteria_descr_single_2'] = 'Det här märket behöver tilldelas av en användare med följande roll:';
$string['criteria_descr_single_4'] = 'Användare måste slutföra kursen';
$string['criteria_descr_single_5'] = 'Den följande kursen måste slutföras:';
$string['criteria_descr_single_6'] = 'Det följande användarprofilfältet måste fyllas i:';
$string['criteria_descr_single_short1'] = 'Slutfört:';
$string['criteria_descr_single_short2'] = 'Tilldelad av:';
$string['criteria_descr_single_short4'] = 'Slutför kursen';
$string['criteria_descr_single_short5'] = 'Slutfört:';
$string['criteria_descr_single_short6'] = 'Slutfört:';
$string['criteriasummary'] = 'Sammanfattning av kriterier';
$string['criterror'] = 'Aktuella problem med parametrar';
$string['criterror_help'] = 'Den här fältgruppen visar alla parametrar som ursprungligen lades till kraven för det här märket men som inte längre är tillgängliga. Det rekommenderas att du avmarkerar sådana parametrar för att säkerställa att studerande kan ta det här märket i framtiden.';
$string['currentimage'] = 'Aktuell bild';
$string['currentstatus'] = 'Aktuell status:';
$string['dateawarded'] = 'Utfärdandedatum';
$string['dateearned'] = 'Datum: {$a}';
$string['day'] = 'Dag(ar)';
$string['deactivate'] = 'Inaktivera tillgång';
$string['deactivatesuccess'] = 'Inaktivering av tillgång till märken lyckades.';
$string['defaultissuercontact'] = 'Kontaktuppgifter för standardutfärdaren av märken';
$string['defaultissuercontact_desc'] = 'En e-postadress associerad med utfärdaren av märken.';
$string['defaultissuername'] = 'Namn för standardutfärdaren av märken.';
$string['defaultissuername_desc'] = 'Namn på utfärdarombud eller -auktoritet.';
$string['delbadge'] = 'Ta bort märke';
$string['delconfirm'] = 'Är du säker på att du vill ta bort märke \'{$a}\'?';
$string['delcritconfirm'] = 'Är du säker på att du vill ta bort det här kriteriet?';
$string['delparamconfirm'] = 'Är du säker på att du vill ta bort den här parametern?';
$string['description'] = 'Beskrivning';
$string['disconnect'] = 'Koppla från';
$string['donotaward'] = 'För nuvarande är det här märket inte aktivt så det kan inte tilldelas användare. Om du skulle vilja tilldela det här märket, var god att aktivera dess status.';
$string['editsettings'] = 'Redigera inställningar';
$string['enablebadges'] = 'Aktivera märken';
$string['error:backpacknotavailable'] = 'Din webbplats är inte tillgänlig via Internet så märken som utfärdats från den här webbplatsen kan inte verifieras av externa ryggsäcks-tjänster.';
$string['error:cannotact'] = 'Kan inte aktivera märket.';
$string['error:cannotawardbadge'] = 'Kan inte tilldela märke till en användare.';
$string['error:clone'] = 'Kan inte klona märket.';
$string['error:duplicatename'] = 'Ett märke med det namnet finns redan i systemet.';
$string['error:invalidbadgeurl'] = 'Ogiltigt URL-format för utfärdare av märke';
$string['error:invalidcriteriatype'] = 'Ogiltig kriterietyp.';
$string['error:invalidexpiredate'] = 'Förfallodatum måste vara i framtiden.';
$string['error:invalidexpireperiod'] = 'Förfallotid kan inte vara negativ eller noll.';
$string['error:noactivities'] = 'Det finns inga aktiviteter med kriterier för slutförande som är aktiverade i den här kursen.';
$string['error:nocourses'] = 'Slutförande av kurs är inte aktiverad för någon av webbplatsens kurser så därför kan inga visas. Slutförande av kurs kan aktiveras i inställningarna för kurser.';
$string['error:nogroups'] = '<p>Det finns inga publika samlingar av märken tillgängliga i din ryggsäck. </p>
<p>Endast publika samlingar visas så <a href="http://backpack.openbadges.org">besök din ryggsäck</a> för att skapa några publika samlingar.</p>';
$string['error:nopermissiontoview'] = 'Du har inte rättigheter att visa mottagare av märken';
$string['error:nosuchbadge'] = 'Märke med id {$a} existerar inte.';
$string['error:nosuchcourse'] = 'Varning: Den här kursen är inte längre tillgänglig.';
$string['error:nosuchfield'] = 'Varning: Det här användarprofilfältet är inte längre tillgängligt.';
$string['error:nosuchmod'] = 'Varning: Den här aktiviteten är inte längre tillgänglig.';
$string['error:nosuchrole'] = 'Varning: Den här rollen är inte längre tillgänglig.';
$string['error:nosuchuser'] = 'Användaren med den här e-postadressen har inget konto hos den aktuella ryggsäcks-leverantören.';
$string['error:notifycoursedate'] = 'Varning: Märken associerade med kursen och slutförande av aktiviteter kommer inte att utfärdas förrän kursens startdatum.';
$string['error:parameter'] = 'Varning: Minst en parameter måste väljas för att garantera ett korrekt arbetsflöde för utfärdande av märken.';
$string['error:save'] = 'Kan inte spara märket.';
$string['evidence'] = 'Bevis';
$string['existingrecipients'] = 'Existerande mottagare av märke';
$string['expired'] = 'Förfallen';
$string['expiredate'] = 'Det här märket förfaller {$a}.';
$string['expireddate'] = 'Det här märket förföll {$a}.';
$string['expireperiod'] = 'Det här märket förfaller {$a} dag(ar) efter utfärdande.';
$string['expireperiodh'] = 'Det här märket förfaller {$a} timma(r) efter utfärdande.';
$string['expireperiodm'] = 'Det här märket förfaller {$a} minut(er) efter utfärdande.';
$string['expireperiods'] = 'Det här märket förfaller {$a} sekund(er) efter  utfärdande.';
$string['expirydate'] = 'Förfallodatum';
$string['expirydate_help'] = 'Alternativt så kan märken förfalla på ett specifikt datum, eller så kan datumet beräknas baserat på datumet när märket utfärdades till en användare.';
$string['externalbadges'] = 'Mina märken från andra webbplatser';
$string['externalbadges_help'] = 'Den här arean visar märken från din externa ryggsäck.';
$string['externalbadgesp'] = 'Märken från andra webbplatser:';
$string['externalconnectto'] = 'För att visa externa märken så behöver du <a href="{$a}">ansluta till en ryggsäck</a>.';
$string['fixed'] = 'Fast datum';
$string['hidden'] = 'Dold';
$string['hiddenbadge'] = 'Tyvärr, ägaren av märket har inte gjort den här informationen tillgänglig.';
$string['issuancedetails'] = 'Förfallande av märke';
$string['issuedbadge'] = 'Information för utfärdat märke';
$string['issuerdetails'] = 'Utfärdarens detaljer';
$string['issuername'] = 'Utfärdarens namn';
$string['issuername_help'] = 'Namn på utfärdarombud eller -auktoritet.';
$string['issuerurl'] = 'Utfärdarens URL';
$string['localbadges'] = 'Mina märken från webbplats {$a}';
$string['localbadgesh'] = 'Mina märken från den här webbplatsen';
$string['localbadgesh_help'] = 'Alla märken som tagits inom den här webbplatsen genom att slutföra kurser, kursaktiviteter eller andra krav.

Du kan administrera dina märken här genom att göra dem publika eller privata för din profilsida.

Du kan ladda ned alla dina märken, eller varje märke separat, och spara dem på din dator. Nedladdade märken kan adderas till din externa ryggsäcks-tjänst.';
$string['localbadgesp'] = 'Märken från {$a}:';
$string['localconnectto'] = 'För att dela de här märkena utanför den här webbplatsen så behöver du <a href="{$a}">ansluta till en ryggsäck</a>.';
$string['makeprivate'] = 'Gör privat';
$string['makepublic'] = 'Gör publik';
$string['managebadges'] = 'Administrera märken';
$string['message'] = 'Meddelandets brödtext';
$string['messagebody'] = '<p>Du har tilldelats märket "%badgename%"!</p>
<p>Mer information om det här märket kan du hitta på %badgelink%.</p>
<p>Om inget märke bifogats med det här e-postmeddelandet så kan du administrera och ladda ned det från sidan {$a}.</p>';
$string['messagesubject'] = 'Grattis! Du har just tagit ett märke!';
$string['method'] = 'Det här kriteriet är uppfyllt när...';
$string['mingrade'] = 'Lägsta betyg som krävs';
$string['month'] = 'Månad(er)';
$string['mybackpack'] = 'Mina inställningar för ryggsäck';
$string['mybadges'] = 'Mina märken';
$string['never'] = 'Aldrig';
$string['newbadge'] = 'Lägg till ett nytt märke';
$string['newimage'] = 'Ny bild';
$string['noawards'] = 'Det här märket har inte tagits ännu.';
$string['nobackpack'] = 'Ingen tjänst för ryggsäck är ansluten till det här kontot.<br/>';
$string['nobackpackbadges'] = 'Det finns inga märken i samlingen du har valt. <a href="mybackpack.php">Lägg till fler samlingar</a>.';
$string['nobackpackcollections'] = 'Inga samlingar av märken har valts. <a href="mybackpack.php">Lägg till samlingar</a>.';
$string['nobadges'] = 'Det finns inga märken tillgängliga.';
$string['nocriteria'] = 'Kriterier för det här märket har inte konfigurerats ännu.';
$string['noexpiry'] = 'Det här märket har inget förfallodatum.';
$string['noparamstoadd'] = 'Det finns inga ytterligare parametrar tillgängliga att lägga till kraven för det här märket.';
$string['notacceptedrole'] = 'Din nuvarande rolltilldelning finns inte bland de roller som manuellt kan tilldela det här märket.<br/>
Om du skulle vilja se vilka användare som redan tagit det här märket så kan du besöka sidan {$a}.';
$string['notconnected'] = 'Inte ansluten';
$string['nothingtoadd'] = 'Det finns inga tillgängliga kriterier att lägga till.';
$string['notification'] = 'Notifiera skaparen av märket';
$string['notification_help'] = 'Den här inställningen administrerar notifieringarna som skickas till skaparen av ett märke för att låta dem veta att märket tilldelats.

Följande alternativ är tillgängliga:

* **ALDRIG** – Skicka inte notifieringar.

* **VARJE GÅNG** – Skicka en notifiering varje gång det här märket tilldelats.

* **DAGLIGEN** – Skicka notifieringar en gång per dag.

* **VECKOVIS** – Skicka notifieringar en gång per vecka.

* **MÅNADSVIS** – Skicka notifieringar en gång per månad.';
$string['notifydaily'] = 'Dagligen';
$string['notifyevery'] = 'Varje gång';
$string['notifymonthly'] = 'Månadsvis';
$string['notifyweekly'] = 'Veckovis';
$string['numawards'] = 'Det här märket har tilldelats <a href="{$a->link}">{$a->count}</a> användare.';
$string['numawardstat'] = 'Det här märket har tilldelats {$a} användare.';
$string['overallcrit'] = 'av de valda kriterierna är slutförda.';
$string['potentialrecipients'] = 'Potentiella mottagare av märket';
$string['recipients'] = 'Mottagare av märket';
$string['relative'] = 'Relativt datum';
$string['requiredcourse'] = 'Åtminstone en kurs måste läggas till kriteriet för uppsättningen kurser.';
$string['reviewbadge'] = 'Granska kriterier för märke';
$string['reviewconfirm'] = '<p>Den här åtgärden kommer utföra en kontroll för att se om några användare redan har slutfört alla krav för märket \'{$a}\'.</p>
<p>Vill du fortsätta?</p>';
$string['save'] = 'Spara';
$string['searchname'] = 'Sök via namn';
$string['selectaward'] = 'Var vänlig välj rollen som du skulle vilja använda för att tilldela det här märket:';
$string['selectgroup_end'] = 'Endast publika samlingar visas, <a href="http://backpack.openbadges.org">besök din ryggsäck</a> för att skapa fler publika samlingar.';
$string['selectgroup_start'] = 'Välj samlingar från din ryggsäck att visa på den här webbplatsen:';
$string['selecting'] = 'Med valda märken...';
$string['setup'] = 'Konfigurera anslutning';
$string['sitebadges'] = 'Märken för webbplatsen';
$string['sitebadges_help'] = 'Märken för webbplatsen kan enbart tilldelas användare för aktiviteter som rör webbplatsen. Det kan inkludera slutförandet av en uppsättning kurser eller delar av användarprofiler. Märken för webbplatser kan också manuellt tilldelas av en användare till en annan.

Märken för kursrelaterade aktiviteter måste skapas på kursnivå. Märken för kurser hittas under Administration av kurs -> Märken.';
$string['status'] = 'Status för märke';
$string['status_help'] = 'Statusen för ett märke avgör dess beteende i systemet:

* **TILLGÄNGLIGT** – Betyder att märket kan tas av användarna. Medan ett märke är tillgängligt kan dess kriterier inte ändras.

* **INTE TILLGÄNGLIGT** – Betyder att märket inte är tillgängligt för användarna och kan därför inte tas eller manuellt tilldelas. Så länge märket aldrig tilldelats någon så kan dess kriterier ändras.

Så fort ett märke tilldelats åtminstone en användare så blir det automatiskt **LÅST**. Låsta märken kan fortfarande tas av användare men deras kriterier kan inte längre uppdateras. Om du behöver ändra detaljer eller kriterier för ett låst märke så kan du duplicera märket och göra ändringarna på kopian.

*Varför låser vi märken?*

Vi vill säkerställa att alla användare mött samma krav när de tagit ett märke. För nuvarande är det inte möjligt att återkalla märken. Om vi tillät kraven för märken att ändras när som helst så skulle vi sannolikt till slut hamna i en situation där olika användare innehar samma märke men har mött helt skilda krav.';
$string['statusmessage_0'] = 'För nuvarande är det här märket inte tillgängligt för användarna. Aktivera tillgång om du vill att det här märket ska kunna tas.';
$string['statusmessage_1'] = 'För nuvarande är det här märket tillgängligt för användare. Inaktivera tillgång för att göra ändringar.';
$string['statusmessage_2'] = 'För nuvarande är det här märket inte tillgängligt för användare och dess kriterier är låsta. Aktivera tillgång om du vill att användare ska kunna ta det här märket.';
$string['statusmessage_3'] = 'För nuvarande är det här märket tillgängligt för användare och dess kriterier är låsta.';
$string['statusmessage_4'] = 'För nuvarande är det här märket arkiverat.';
$string['subject'] = 'Meddelanderubrik';
$string['variablesubstitution'] = 'Variabelersättning i meddelanden.';
$string['variablesubstitution_help'] = 'I ett meddelande för ett märke kan vissa variabler läggas in i ämnesraden och/eller brödtexten så att de kommer ersättas med riktiga värden när meddelandet sänds. Variablerna ska infogas i texten exakt som de visas nedan. De följande variablerna kan användas:

%badgename%
:   Det här kommer ersättas med märkets fullständiga namn.

%username%
:   Det här kommer ersättas med mottagarens fullständiga namn.

%badgelink%
:   Det här kommer ersättas med den publika URL som leder till informationen runt det utfärdade märket.';
$string['viewbadge'] = 'Visa utfärdat märke';
$string['visible'] = 'Synlig';
$string['warnexpired'] = '(Det här märket har förfallit!)';
$string['year'] = 'År';
