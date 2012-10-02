<?PHP // $Id: enrol_imsenterprise.php,v 1.3 2006/10/16 17:45:55 koenr Exp $ 
      // enrol_imsenterprise.php - created with Moodle 1.7 dev (2006100401)


$string['aftersaving...'] = 'Als je instellingen bewaard zijn, wil je misschien';
$string['allowunenrol'] = 'Laat IMS data toe om leraars en leerlingen <strong>af te melden</strong>';
$string['basicsettings'] = 'Basisinstellingen';
$string['coursesettings'] = 'Data opties van de cursus';
$string['createnewcategories'] = 'Maak nieuwe (verborgen) cursuscategorieën indien niet gevonden in Moodle';
$string['createnewcourses'] = 'Maak nieuwe (verborgen) cursussen indien niet gevonden in Moodle';
$string['createnewusers'] = 'Maak gebruikersaccounts voor gebruikers die nog niet geregistreerd zijn in Moodle';
$string['cronfrequency'] = 'Frequentie van verwerken';
$string['deleteusers'] = 'Verwijder gebruikersaccounts indien gespecifieerd in IMS data';
$string['description'] = 'Deze methode zal herhaaldelijk een speciaal opgemaakt tekstdocument bekijken op een locatie die jij ingeeft. Het bestand moet de <a href=\'../help.php?module=enrol/imsenterprise&file=formatoverview.html\' target=\'_blank\'>IMS Enterprise specificaties</a> volgen en gebruiker, groep en lidmaatschap XML elementen bevatten.';
$string['doitnow'] = 'Doe nu een IMS Enterprise import';
$string['enrolname'] = 'IMS Enterprise bestand';
$string['filelockedmail'] = 'Het tekstbestand dat je gebruikt voor je IMS-bestand gebaseerde aanmeldingen ($a) kan door het cronproces niet verwijderd worden. Dit betekent gewoonlijk dat de rechten van dat bestand slecht ingesteld staan. Zet de rechten zo dat Moodle het bestand kan verwijderen, anders zal het herhaaldelijk verwerkt proberen te worden.';
$string['filelockedmailsubject'] = 'Belangrijke fout: Aanmeldingsbestand';
$string['fixcasepersonalnames'] = 'Begin namen met Hoofdletters';
$string['fixcaseusernames'] = 'Wijzig gebruikersnamen naar kleine letters';
$string['imsrolesdescription'] = 'De IMS Enterprise specificatie bevat 8 verschillende rollen. Geef aan hoe je ze in Moodle wil toewijzen en eventueel welke genegeerd mogen worden.';
$string['location'] = 'Bestandslocatie';
$string['logtolocation'] = 'Locatie logbestand (niets invullen voor geen logbestand)';
$string['mailadmins'] = 'Verwittig beheerder via e-mail';
$string['mailusers'] = 'Verwittig gebruikers via e-mail';
$string['miscsettings'] = 'Diverse';
$string['processphoto'] = 'Voeg een gebruikersfoto toe aan het profiel';
$string['processphotowarning'] = 'Waarschuwing: bewerken van afbeeldingen kan je server behoorlijk belasten. Aangeraden wordt om deze optie niet te gebruiken wanneer je grote aantallen leerlingen wil verwerken.';
$string['restricttarget'] = 'Verwerk alleen datea als volgend doel ie opgegeven';
$string['sourcedidfallback'] = 'Gebruik het \"sourcedid\" als gebruikersid als het \"sourcedid\"-veld niet gevonden kan worden';
$string['truncatecoursecodes'] = 'Verkort cursuscodes tot deze lengte';
$string['usecapitafix'] = 'Zet hier een vinkje als je using \"Capita\" gebruikt (hun XML-formaat wijkt een klein beetje af)';
$string['usersettings'] = 'Opties voor gebruikersgegevens';
$string['zeroisnotruncation'] = '0 betekent niet verkorten';

?>
