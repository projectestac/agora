<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_changingemailaddress'] = 'Je hebt gevraagd om je e-mailadres wijzigen van $a->oldemail naar $a->newemail. Als veiligheidsmaatregel sturen we je een e-mailbericht naar het nieuwe adres om te bevestigen dat dit adres van jouw is. Je e-mailadres zal gewijzigd worden zodra je de URL opent die in dat bericht staat.';
$string['auth_emailchangecancel'] = 'Annuleer e-mailwijziging';
$string['auth_emailchangepending'] = 'De wijziging is in behandeling. Open de link in het bericht dat gestuurd is naar $a->preference_newemail.';
$string['auth_emaildescription'] = 'E-mail zelfregistratie is standaard ingesteld als authenticatiemethode. De gebruiker maakt zelf zijn account op de moodle site: op het moment dat de gebruiker zich aanmeldt en daarbij een nieuwe gebruikersnaam en wachtwoord kiest, wordt er een bevestigingse-mail gestuurd naar het e-mailadres van de gebruiker. In deze e-mail staat een veilige link naar een pagina waar de gebruiker zijn account kan bevestigen. Tijdens alle latere aanmeldingen worden de gebruikersnaam en het wachtwoord alleen maar vergeleken met de bewaarde gebruikersgegevens in de Moodle database.';
$string['auth_emailnoemail'] = 'Probeerde je een e-mail te zenden maar het zenden is mislukt!';
$string['auth_emailnoinsert'] = 'Kon jouw record niet aan de databank toevoegen';
$string['auth_emailnowexists'] = 'Het e-mailadres dat je probeert te gebruiken, is al in gebruik door iemand anders. Daarom wordt deze wijziging geannuleerd. Je kunt wel opnieuw proberen met een ander e-mailadres.';
$string['auth_emailrecaptcha'] = 'Hiermee voeg je een visueel/auditief bevestigingsformulier toe aan de zelfregistratiepagina voor e-mailgebaseerde authenticatie. Dit beschermt je site tegen spammers. Bovendien help je mee aan de digitalisering van oude manuscripten door het gebruik van reCAPTCHA op je site (kijk op de reCAPTCHA site voor meer informatie).';
$string['auth_emailrecaptcha_key'] = 'reCAPTCHA-element inschakelen';
$string['auth_emailsettings'] = 'Instellingen';
$string['auth_emailtitle'] = 'E-mail zelfregistratie';
$string['auth_emailupdate'] = 'E-mailadres aanpassen';
$string['auth_emailupdatemessage'] = 'Beste $a->fullname,

Je hebt gevraagd om je e-mailadres te wijzigen voor je account op $a->site. Open volgende URL in je browser om deze wijziging te bevestigen.

$a->url';
$string['auth_emailupdatesuccess'] = 'Het e-mail adres van gebruiker <em>$a->fullname</em> is gewijzigd naar <em>$a->email</em>.';
$string['auth_emailupdatetitle'] = 'Bevestiging van wijziging e-mailadres op  $a->site';
$string['auth_invalidnewemailkey'] = 'Fout. Als je probeert een wijziging van e-mailadres te bevestigen, dan heb je misschien een fout gemaakt bij het kopieëren van de URL van de e-mail die we je toezonden. Probeer opnieuw.';
$string['auth_outofnewemailupdateattempts'] = 'Je hebt het maximum aantal pogingen om je wijziging van e-mailadres te bevestigen bereikt. Je wijzigingsaanvraag is geannuleerd.';