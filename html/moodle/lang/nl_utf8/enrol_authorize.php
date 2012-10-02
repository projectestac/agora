<?PHP // $Id$ 
      // enrol_authorize.php - created with Moodle 2.0 dev (Build: 20080710) (2008070701)


$string['adminacceptccs'] = 'Welke kredietkaarten zullen aanvaard worden?';
$string['adminaccepts'] = 'Kies toegelaten betalingsmethoden en hun types';
$string['adminauthcode'] = 'Als de Kredietkaart van een gebruiker niet kan gecontroleerd worden over internet, vraag dan een authorisatiecode aan de bank van de gebruiker via de telefoon .';
$string['adminauthorizeccapture'] = 'Bestellingsoverzicht & instellingen automatische ontvangsten';
$string['adminauthorizeemail'] = 'Instellingen e-mail';
$string['adminauthorizesettings'] = 'Instellingen Authorize.net';
$string['adminauthorizewide'] = 'Instellingen voor heel de site';
$string['adminavs'] = 'Controleer of je Adress Verification System (AVS) hebt geactiveerd in je authorize.net account. Wanneer de gebruiker het betaalformulier invult, worden hierdoor adresvelden zoals straat, staat, land en postcode gevraagd.';
$string['adminconfighttps'] = 'Verzeker je ervan dat je \"<a href=\"$a->url\"> loginhttps INGESCHAKELD</a>\" hebt om deze plugin te gebruiken<br />in Beheer >> Variablen >> Beveiliging >> HTTP beveiliging.';
$string['adminconfighttpsgo'] = 'Ga naar de <a href=\"$a->url\">beveiligingspagina</a> om deze plugin te configureren.';
$string['admincronsetup'] = 'Het onderhoudsscript cron.php heeft al minstens 24 uur niet gelopen.<br />Om de autocapture mogelijkheid te gebruiken moet cron ingeschakeld zijn. <br />Cron installeren of schakel an_review opnieuw uit. <br />Als je autocapture uitschakeld, zullen de transacties geannuleerd worden, tenzij je ze binnen de 30 dagen bevestigd.<br />Controleer an_review en zet \'0\' in het an_capture_day veld <br /> als je betalingen manueel wil aanvaarden/niet aanvaarden binnen 30 dagen?';
$string['adminemailexpired'] = 'Stuur een waarschuwingsmail naar de beheerders <b>$a</b> dagen geleden hoeveel het aantal van \'authorized/pending capture\' transacties er waren, voor transacties vervallen. (0=mail uitschakelen, standaardinstelling=2, maximum=5)<br />Dit is nuttig als je capturing manueel ingesteld hebt(an_review=checked, an_capture_day=0).';
$string['adminemailexpiredsort'] = 'Waneer het aantal wachtende bestellingen die gaan vervallen naar de leraren verstuurd worden, welke is dan belangrijk?';
$string['adminemailexpiredsortcount'] = 'Het aantal bestellingen';
$string['adminemailexpiredsortsum'] = 'Het totaalbedrag';
$string['adminemailexpiredteacher'] = 'Als je manueel krediteren hebt ingeschakeld (zie boven) en leraren kunnen de betalingen beheren, dan kunnen leraren ook verwittigd worden over het vervallen van wachtende bestellingen. Hierdoor zal een e-mail gestuurd worden naar de leraren van een cursus met daarin hoeveel bestellingen er gaan vervallen.';
$string['adminemailexpsetting'] = '(0=schakel mail sturen uit, standaard=2, maximum=5)<br />(Instelling voor het sturen van mail bij Manueel krediteren: cron=ingeschakeld, an_review=vinkje, an_capture_day=0, an_emailexpired=1-5)';
$string['adminhelpcapturetitle'] = 'Dag voor automatisch aanvaarden';
$string['adminhelpreviewtitle'] = 'Nakijken bestellingen';
$string['adminneworder'] = 'Beste beheerder,

Je hebt een nieuwe bestelling binnengekregen:

Order ID: $a->orderid
Transaction ID: $a->transid
Gebruiker: $a->user
Cursus: $a->course
Bedrag: $a->amount

Automatisch aanvaarden ingeschakeld? $a->acstatus

Als automatisch aanvaarden ingeschakeld is, dan zal de kredietkaart aanvaard worden op $a->captureon en zal de leerling automatisch aangemeld worden in de cursus, anders zal deze aanvraag verlopen op $a->expireon en kan die niet meer bevestigd worden na die dag.

Je kunt de betaling ook onmiddellijk aanvaarden en de leerling onmiddellijk toegang geven tot de cursus door deze link te volgen $a->url';
$string['adminnewordersubject'] = '$a->course: Nieuwe bestelling ($a->orderid)';
$string['adminpendingorders'] = 'Je hebt de functie voor automatisch krediteren uitgeschakeld.<br />Er zijn $a->count transacties met als status AN_STATUS_AUTH die geannulleerd zullen worden, tenzij je ze krediteerd.<br />Deze betalingen aanvaarden/verwerpen doe je met de <a href=\'$a->url\'>Beheer betalingen</a> pagina';
$string['adminreview'] = 'Controleer de bestelling voor het aanvaarden van de kredietkaart';
$string['adminteachermanagepay'] = 'Leraren kunnen de betalingen van de cursus beheren';
$string['allpendingorders'] = 'Alle lopende bestellingen';
$string['amount'] = 'Bedrag';
$string['anlogin'] = 'Authorize.net: Login naam';
$string['anpassword'] = 'Authorize.net: Wachtwoord (niet vereist)';
$string['anreferer'] = 'Type hier de URL-verwijzing als je dit instelt met je authorize.net account. Dit zal een header \"Referer:URL\" in de webaanvraag zetten.';
$string['antestmode'] = 'Authorize.net: test transacties';
$string['antrankey'] = 'Authorize.net: transactiesleutel';
$string['approvedreview'] = 'Nakijken goedgekeurd';
$string['authcaptured'] = 'Goedgekeurd /  Gekrediteerd';
$string['authcode'] = 'Authorisatiecode';
$string['authorize:managepayments'] = 'Beheer betalingen';
$string['authorize:uploadcsv'] = 'CSV-bestand uploaden';
$string['authorizedpendingcapture'] = 'Goedgekeurd / Wachten op kreditering';
$string['authorizeerror'] = 'Authorize.net fout: $a';
$string['avsa'] = 'Adres (straat) is juist';
$string['avsb'] = 'Adres niet opgegeven';
$string['avse'] = 'Systeem fout in adresverificatie';
$string['avsg'] = 'Non-U.S. Card Issuing Bank';
$string['avsn'] = 'Straat en postcode fout';
$string['avsp'] = 'Adres verificatiesysteem niet beschikbaar';
$string['avsr'] = 'Probeer opnieuw - Systeem niet beschikbaar of time out';
$string['avsresult'] = 'AVS Resultaat';
$string['avss'] = 'Service niet ondersteund';
$string['avsu'] = 'Adresinformatie niet beschikbaar';
$string['avsw'] = '9 cijferige postcode klopt, adres (straat) niet';
$string['avsx'] = 'Adres (straat) en 9 cijferige postcode niet juist';
$string['avsy'] = 'Adres (straat) en 5 cijferige postcode niet juist';
$string['avsz'] = '5 cijferige postcode is juist, adres (straat) niet';
$string['canbecredit'] = 'Kan teruggestort worden op $a->upto';
$string['cancelled'] = 'Geannuleerd';
$string['capture'] = 'Aanvaardt';
$string['capturedpendingsettle'] = 'Aanvaard / Verwerking bezig';
$string['capturedsettled'] = 'Aanvaard / afgewerkt';
$string['captureyes'] = 'De kredietkaart wordt aanvaard en de leerling wordt in de cursus aangemeld. Ben je zeker?';
$string['ccexpire'] = 'Vervaldatum';
$string['ccexpired'] = 'De kredietkaart is vervallen';
$string['ccinvalid'] = 'Ongeldig kaartnummer';
$string['cclastfour'] = 'CC laatste vier';
$string['ccno'] = 'Kredietkaartnummer';
$string['cctype'] = 'Kredietkaarttype';
$string['ccvv'] = 'Kaartverificatie';
$string['ccvvhelp'] = 'Kijk op de achterkant van de kaart (laatste 3 cijfers)';
$string['choosemethod'] = 'Als je de cursussleutel voor deze cursus kent, geef die dan in, indien je hem niet kent moet je betalen voor deze cursus';
$string['chooseone'] = 'Vul één of beide velden in';
$string['costdefaultdesc'] = '<strong>In cursusinstellingen, geef -1 in</strong> om dit standaardprijs naar cursusprijsveld te gebruiken.';
$string['cutofftime'] = 'Transactie Cut-Off Time. Wanneer is de laatste transactie voor betaling opgenomen?';
$string['dataentered'] = 'Datum ingevoerd';
$string['delete'] = 'Vernietig';
$string['description'] = 'Met de Authorize.net module kun je betaalde cursussen inrichten via CC-providers. Als de prijs voor een cursus 0 is, dan krijgen leerlingen de vraag om te betalen niet. Er is een standaardprijs die je hier voor de hele site kunt instellen en er is een instelling om de prijs per cursus vast te leggen. De prijs per cursus gaat over de standaardprijs van de site.';
$string['echeckabacode'] = 'Bank ABA-nummer';
$string['echeckaccnum'] = 'Bank rekeningnummer';
$string['echeckacctype'] = 'Bank accounttype';
$string['echeckbankname'] = 'Banknaam';
$string['echeckbusinesschecking'] = 'Ondernemingscontrole';
$string['echeckchecking'] = 'Controleren';
$string['echeckfirslasttname'] = 'Bank rekeningeigenaar';
$string['echecksavings'] = 'Opgespaard';
$string['enrolname'] = 'Authorize.net Kredietkaart toegang';
$string['expired'] = 'Vervallen';
$string['haveauthcode'] = 'Ik heb al een authorisatiecode';
$string['howmuch'] = 'Hoe veel?';
$string['httpsrequired'] = 'Jammer, maar je aanvraag kan nu niet verwerkt worden. De instellingen van deze site konden niet juist gezet worden<br /><br />
Geef het nummer van je kredietkaart niet in voor je een geel hangslot onderaan je browser ziet. Dat betekent dat alle informatie die over internet verstuurd wordt, versleuteld is. Op die manier is de informatie tijdens de transactie beschermd en kan je kredietkaartnummer niet onderschept worden op het internet.';
$string['invalidaba'] = 'Ongeldig ABA nummer';
$string['invalidaccnum'] = 'Ongeldig rekeningnummer';
$string['invalidacctype'] = 'Ongeldig accounttype';
$string['isbusinesschecking'] = 'Wordt de onderneming gecontroleerd?';
$string['logindesc'] = 'Deze optie moet AAN staan.<br /><br />
Je kunt de optie <a href=\"$a->url\">loginhttps</a> instellen in de sectie Variablen/Veiligheid.
<br /><br />
Door die instelling te gebruiken zal Moodle een veilige https-connectie maken voor de aanmelding- en betalingspagina\'s.';
$string['logininfo'] = 'Accountnaam, wachtwoord en transactiesleutel worden om veiligheidsredenen niet getoond. Het is echter niet nodig ze opnieuw in te geven als je dat voordien al gedaan hebt. Je kunt een groene tekst zien, links van de vakjes wanneer sommige velden al ingevuld zijn. Als je deze velden voor de eerste keer invult, dan is de accountnaam (*) vereist en dan moet je de transachtiesleutel (#1)  <strong>ofwel</strong> het wachtwoord  (#2) ingeven in het juiste vakje. We raden je echter aan om de transactiesleutel in te geven om veiligheidsredenen. Als je je huidig wachtwoord wil verwijderen, vink dan het vakje af.';
$string['methodcc'] = 'Kredietkaart';
$string['methodecheck'] = 'eCheck (ACH)';
$string['missingaba'] = 'ABA-nummer ontbreekt';
$string['missingaddress'] = 'adres ontbreekt';
$string['missingbankname'] = 'Banknaam ontbreekt';
$string['missingcc'] = 'Kaartnummer  ontbreekt';
$string['missingccauthcode'] = 'Authorisatiecode ontbreekt';
$string['missingccexpire'] = 'vervaldatum  ontbreekt';
$string['missingcctype'] = 'kaarttype  ontbreekt';
$string['missingcvv'] = 'verificatienummer  ontbreekt';
$string['missingzip'] = 'postcode  ontbreekt';
$string['mypaymentsonly'] = 'Toon alleen mijn betalingen';
$string['nameoncard'] = 'naam op de kaart';
$string['new'] = 'Nieuw';
$string['noreturns'] = 'geen teruggave!';
$string['notsettled'] = 'Niet betaald';
$string['orderdetails'] = 'Details bestelling';
$string['orderid'] = 'Bestelnummer';
$string['paymentmanagement'] = 'Beheer betalingen';
$string['paymentmethod'] = 'Betalingsmethode';
$string['paymentpending'] = 'Je betaling voor deze cursus wordt verwerkt met dit bestelnummer: $a->orderid.';
$string['pendingecheckemail'] = 'Beste manager,

Er zijn nu $a->count wachtende echecks en je moet een CSV-bestand uploaden om de gebruikers aangemeld te krijgen.

Volg de link en lees het helpbestand op pagina $a->url';
$string['pendingechecksubject'] = '$a->course:; Wachtende eChecks ($a->count)';
$string['pendingordersemail'] = 'Beste beheerder,

$a->pending transacties voor cursus \"$a->course\" zullen vervallen tenzij je de betaling aanvaardt binnen $a->days dagen.

Dit is een waarschuwing omdat je automatische aanvaarding niet ingeschakeld hebt. Dat betekent dat je de betalingen manueel moet aanvaarden of weigeren.

Om betalingen te aanvaarden of te weigeren ga je naar $a->url

Om automatische aanvaarding van betalingen in te schakelen ga je naar $a->enrolurl. Dat betekent dat je geen waarschuwings e-mails meer zult krijgen.';
$string['pendingordersemailteacher'] = 'Beste leraar,

$a->pending transacties voor de prijs van $a->currency $a->sumcost voor cursus \"$a->course\" zullen vervallen tenzij je de betaling binnen de $a->days dagen accepteerd.

Je moet manueel betalingen accepteren en weigeren omdat de beheerder de automatische aanvaarding niet ingeschakeld heeft. 

$a->url';
$string['pendingorderssubject'] = 'WAARSCHUWING: $a->course, $a->pending bestelling(en) zullen vervallen binnen de $a->days dag(en)';
$string['reason11'] = 'Deze transactie is dubbel ingestuurd';
$string['reason13'] = 'De login ID van de handelaar is niet geldig of de account is niet actief.';
$string['reason16'] = 'De transactie is niet gevonden';
$string['reason17'] = 'De handelaar accepteert dit type kredietkaart niet.';
$string['reason245'] = 'Dit type eCheck is niet toegelaten als je het betalingsformulier voor deze betalingsgateway gebruikt.';
$string['reason246'] = 'Dit type eCheck is niet toegelaten';
$string['reason27'] = 'De transactie resulteerde in een AVS-probleem. Het gegeven adres klopt niet met het adres van de kaarthouder.';
$string['reason28'] = 'De handelaar accepteert dit type kredietkaart niet.';
$string['reason30'] = 'De configuratie met de processor is niet geldig. Bel de Merchant Service Provider.';
$string['reason39'] = 'De opgegeven munteenheidscode is ofwel niet geldig, niet ondersteund, niet toegelaten door deze handelaar of heeft geen wisselkoers.';
$string['reason43'] = 'De handelaar is niet juist ingesteld bij de processor. Bel de Merchant Service Provider.';
$string['reason44'] = 'De transactie is afgewezen. Kaart code filterfout!';
$string['reason45'] = 'Deze transactie is afgewezen. Kaart code/AVS filterfout!';
$string['reason47'] = 'Het opgevraagde betalingsbedrag mag niet groter zijn dan het toegestane bedrag.';
$string['reason5'] = 'Geldig bedrag invullen';
$string['reason50'] = 'De transactie wacht op betaling en kan niet teruggestort worden.';
$string['reason51'] = 'De som van alle krediet tegenover deze transactie is groter dan de oorspronkelijke transactiehoeveelheid.';
$string['reason54'] = 'De referentietransactie komt niet overeen met de criteria om een krediet op te vragen.';
$string['reason55'] = 'De som van de kredieten tegenover de referentietransactie zou het oorspronkelijke debetbedrag overschrijden.';
$string['reason56'] = 'De handelaar accepteert alleen eCheck (ACH)-transacties. Er worden geen kredietkaarten aanvaard.';
$string['refund'] = 'Terugstorten';
$string['refunded'] = 'Teruggestort';
$string['returns'] = 'Teruggave';
$string['reviewday'] = 'Vraag het kredietkaartnummer automatisch, tenzij een leraar of beheer de bestelling herziet binnen de <b>$a</b> dagen. CRON MOET INGESCHAKELD ZIJN.<br />
<0 dagen = schakel automatisch vragen uit = leraar of beheerder herzien de bestelling manueel. De transactie zal niet doorgaan als je automatisch kredietkaart vragen uitschakelt tenzij je ze goedkeurt binnen de 30 dagen.)';
$string['reviewfailed'] = 'Nakijken mislukt';
$string['reviewnotify'] = 'Je betaling zal bekeken worden. Verwacht binnen enkele dagen een e-mail van je leraar.';
$string['sendpaymentbutton'] = 'Stuur betaling';
$string['settled'] = 'Betaald';
$string['settlementdate'] = 'Betalingsdatum';
$string['shopper'] = 'Klant';
$string['subvoidyes'] = 'De teruggestortte transactie ($a->transid) gaat geannuleerd worden en dat zal het crediteren van $a->amount op jouw rekening veroorzaken. Ben je zeker?';
$string['tested'] = 'Getest';
$string['testmode'] = '[TESTMODUS]';
$string['testwarning'] = 'Aanvaarden/weigeren/terugbetalen schijnt te werken in testmodus, maar er is geen enkele record geüpdated of toegevoegd aan de databank.';
$string['transid'] = 'TransactieID';
$string['underreview'] = 'Wordt nagekeken';
$string['unenrolstudent'] = 'Leerling afmelden?';
$string['uploadcsv'] = 'Upload een CSV-bestand';
$string['usingccmethod'] = 'Gebruik van <a href=\"$a->url\"><strong>Credit Card</strong></a> voor aanmelding';
$string['usingecheckmethod'] = 'Gebruik van <a href=\"$a->url\"><strong>eCheck</strong></a> voor aanmelding';
$string['verifyaccount'] = 'Controleer je authorize.net handelaarsaccount';
$string['verifyaccountresult'] = 'Verificatieresultaat: $a';
$string['void'] = 'Geannuleerd';
$string['voidyes'] = 'Transactie zal geannuleerd worden. Wil je dat echt?';
$string['welcometocoursesemail'] = 'Beste $a->name,

Bedankt voor je betaling. Je bent aangemeld in deze cursussen:

$a->courses

Je kunt je betalingsdetails bekijken of je profiel bewerken:
$a->paymenturl
$a->profileurl';
$string['youcantdo'] = 'Deze actie kun je niet doen: $a->action';
$string['zipcode'] = 'Postcode';

?>
