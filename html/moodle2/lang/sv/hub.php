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
 * Strings for component 'hub', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   hub
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addscreenshots'] = 'Lägg till skärmbilder';
$string['advertise'] = 'Påannonsera att den här kursen nu går att ansluta sig till';
$string['advertised'] = 'Påannonserad';
$string['advertiseon'] = 'Påannonsera den här kursen på {$a}';
$string['advertiseonhub'] = 'Påannonsera den här kursen på en hubb';
$string['advertiseonmoodleorg'] = '';
$string['advertisepublication_help'] = 'Om du påannonserar Din kurs på en hubbserver för gemenskapen så gör detta det möjligt för folk att hitta den här kursen och komma hit och registrera sig.';
$string['all'] = 'Alla';
$string['audience'] = 'Målgrupp';
$string['audienceadmins'] = 'Moodle administratörer';
$string['audienceeducators'] = 'Utbildare';
$string['audience_help'] = 'Välj den tänkta målgruppen för den här kursen.';
$string['audiencestudents'] = 'Studenter/elever/deltagare/lärande';
$string['badgesnumber'] = 'Antal märken ({$a})';
$string['badurlformat'] = 'Dåligt format för URL';
$string['cannotsearchcommunity'] = 'Du har tyvärr inte tillstånd att visa den här sidan. ';
$string['community'] = 'Gemenskap';
$string['communityremoved'] = 'Den kurslänken har tagits bort från Din lista.';
$string['confirmregistration'] = 'Bekräfta registrering';
$string['contactable'] = 'Kontakt från åhörarna';
$string['contactable_help'] = 'Om detta är inställt till \'Ja\' så kommer hubben att visa Din e-postadress.';
$string['contactemail'] = 'E-postadress för kontakt';
$string['contactname'] = 'Namn för kontakt';
$string['contactphone'] = 'Tfn';
$string['contactphone_help'] = 'Tfn nr visas bara för administratören av hubben och inte offentligt.';
$string['continue'] = 'Fortsätt';
$string['contributornames'] = 'Övriga bidragsgivare';
$string['contributornames_help'] = 'Du kan använda detta fält för att lista namnen på vem som helst som bidragit till denna kurs.';
$string['coursemap'] = 'Karta över kurs';
$string['coursename'] = 'Namn';
$string['coursepublished'] = 'Den här kursen har framgångsrikt publicerats på "{$a}".';
$string['courseshortname'] = 'Kortnamn';
$string['courseshortname_help'] = 'Skriv in ett kort namn på Din kurs. Det behöver inte vara unikt.';
$string['coursesnumber'] = 'Antal kurser  ({$a})';
$string['courseunpublished'] = 'Kursen {$a->courseshortname} är inte längre publicerad på {$a->hubname}.';
$string['courseurl'] = 'URL till kurs';
$string['courseurl_help'] = 'Det är URLen till Din kurs, den visas som en länk i ett sökresultat.';
$string['creatorname'] = 'Upphovsman';
$string['creatorname_help'] = 'Upphovsman är kursutvecklaren';
$string['creatornotes'] = 'Anteckningar av upphovsmannen';
$string['creatornotes_help'] = 'Upphovsmannens anteckningar är vägledning för (distans)lärare ang hur man ska använda kursen.';
$string['deletescreenshots'] = 'Ta bort de här skärmbilderna';
$string['deletescreenshots_help'] = 'Ta bort alla de aktuella uppladdade skärmbilderna';
$string['demourl'] = 'Demo URL';
$string['demourl_help'] = 'Ange demo URL för din kurs. Som förval är det URL:en till din kurs. Demo URL:en visas som en länk i ett sökresultat.';
$string['description'] = 'Beskrivning';
$string['description_help'] = 'Denna beskrivningstext kommer visas i kurslistningen på hubben.';
$string['detectednotexistingpublication'] = '{$a->hubname} listar en kurs som inte längre existerar. Meddela denna hubadministratör att publiceringen med nummer {$a->id} borde tas bort.';
$string['downloadable'] = 'Möjlig att ladda ner';
$string['educationallevel'] = 'Utbildningsnivå';
$string['educationallevel_help'] = 'Välj den mest lämpliga utbildningsnivån som kursen passar in i.';
$string['edulevelassociation'] = 'Koppling';
$string['edulevelcorporate'] = 'Näringsliv';
$string['edulevelgovernment'] = 'Statlig';
$string['edulevelother'] = 'Övriga';
$string['edulevelprimary'] = 'Primär';
$string['edulevelsecondary'] = 'Sekundär';
$string['eduleveltertiary'] = '';
$string['emailalert'] = 'Meddelanden via e-post';
$string['emailalert_help'] = 'Om detta är aktiverat kommer hubadministratören skicka e-post till dig om säkerhetsfrågor och andra viktiga nyheter.';
$string['enrollable'] = 'Möjlig att registrera sig på';
$string['errorbadimageheightwidth'] = 'Bilden bör ha en maximal storlek av {$a->width} X {$a->height}';
$string['errorcourseinfo'] = 'Ett fel inträffade vid hämtning av metadata för kurs från hubben ({$a}). Försök hämta kursens metadata från hubben igen genom att ladda om sidan senare. Du kan även besluta att fortsätta registreringsprocessen med följande förvalda metadate.';
$string['errorcoursepublish'] = 'Ett fel inträffade under kurspubliceringen ({$a}). Försök igen senare.';
$string['errorcoursewronglypublished'] = 'Ett publiceringsfel har returnerats från hubben. Försök igen senare.';
$string['errorcron'] = 'Ett fel inträffade under registreringsuppdatering på "{$a->hubname}" ({$a->errormessage})';
$string['errorcronnoxmlrpc'] = 'XML-RPC måste vara aktiverat för att kunna uppdatera registreringen.';
$string['errorhublisting'] = 'Ett fel inträffade vid erhållande av hublistningen från Moodle.org, försök igen senare. ({$a})';
$string['errorlangnotrecognized'] = 'Den angivna språkkoden är okänd av Moodle. Kontakta {$a}';
$string['errorregistration'] = 'Ett fel inträffade under registrering, försök igen senare. ({$a})';
$string['errorunpublishcourses'] = 'På grund av ett oväntat fel kunde kursen inte raderas från hubben. Försök igen senare (rekommenderas) eller kontakta hubadministratören.';
$string['existingscreenshotnumber'] = '{$a} existerande skärmbilder. Du kommer att kunna se dessa skärmbilder på denna sida så snart hubadministratörern aktiverar din kurs.';
$string['existingscreenshots'] = 'Befintliga skärmbilder';
$string['forceunregister'] = 'Ja, rena data för registrering';
$string['forceunregisterconfirmation'] = 'Din webbplats kan inte nå {$a}. Denna hub kan vara tillfälligt nere. Såvida inte du är säker på att du vill fortsätta att avregistrera lokalt, avbryt försöket och prova igen senare.';
$string['geolocation'] = 'Geografisk lokalisering';
$string['geolocation_help'] = 'I framtiden kanske vi kommer att erbjuda sökning baserad på geografisk lokalisering. Om du vill ange loklaisering för din kurs använd latitud/longitud här (tex: -31.947884,115.871285). Ett av sätten att hitta dessa värden är att använda Google maps.';
$string['hub'] = 'Hubb';
$string['imageurl'] = 'URL till bild';
$string['imageurl_help'] = 'Denna bild kommer att visas på hubben. Denna bild måste vara tiilgänglig från hubben när som helst. Bilden bör ha en maximal storlek av {$a->width} X {$a->height}';
$string['information'] = 'Information';
$string['issuedbadgesnumber'] = 'Antal utfärdade märken ({$a})';
$string['language'] = 'Språk';
$string['language_help'] = 'Huvudspråket för den här kursen';
$string['lasttimechecked'] = 'Senast kontrollerad';
$string['licence'] = 'Licens';
$string['licence_help'] = 'Välj under vilken licens du vill distribuera din kurs.';
$string['logourl'] = 'URL till Logo';
$string['modulenumberaverage'] = 'Genomsnittligt antal kursmoduler ({$a})';
$string['moodleorg'] = 'Moodle.org';
$string['mustselectsubject'] = 'Du måste välja ett ämne';
$string['name'] = 'Namn';
$string['name_help'] = 'Detta namn kommer att visas i kurslistningen.';
$string['neverchecked'] = 'Aldrig kontrollerad';
$string['next'] = 'Nästa';
$string['no'] = 'Ingen/a';
$string['nocheckstatusfromunreghub'] = 'Webbplatsen är inte registrerad på hubben varför statusen inte kan kontrolleras.';
$string['nohubselected'] = 'Ingen hubb är vald';
$string['none'] = 'Ingen/a';
$string['nosearch'] = 'Publicera inte hubb eller kurser';
$string['notregisteredonhub'] = 'Din administratör måste registrera denna webbplats på åtminstone en hub innan du kan publicera någon kurs. Kontakta din webbplatsadministratör.';
$string['notregisteredonmoodleorg'] = 'Din administratör måste registrera denna webbplats hos moodle.org.';
$string['operation'] = 'Åtgärder';
$string['orenterprivatehub'] = 'Alternativt, skriv in en privat URL till hubb';
$string['participantnumberaverage'] = 'Genomsnittsligt antal deltagare ({$a})';
$string['postaladdress'] = 'Postadress';
$string['postaladdress_help'] = 'Postadress för denna webbplats eller för den enhet som representeras av webbplatsen.';
$string['postsnumber'] = 'Antal poster ({$a})';
$string['previousregistrationdeleted'] = 'Föregående registrering har raderats från {$a}. Du kan starta om registreringsprocessen. Tack.';
$string['prioritise'] = 'Prioritera';
$string['privacy'] = 'Integritet';
$string['privacy_help'] = 'Huben kanske vill visa en lista över registrerade webbplatser. Om den gär så kan du välja om du vill synas i denna lista eller inte.';
$string['private'] = 'Privat';
$string['privatehuburl'] = 'Privat hub URL';
$string['publicationinfo'] = 'Publiceringsinformation för kurs';
$string['publichub'] = 'Publik hub';
$string['publishcourse'] = 'Publicera {$a}';
$string['publishcourseon'] = 'Publicera på {$a}';
$string['publishedon'] = 'Publicerad på';
$string['publisheremail'] = 'Publicerarens e-postadress';
$string['publisheremail_help'] = 'Publicerarens e-postadress möjliggör för hubadministratörern att meddela publiceraren om ändringar på statusen för den publicerade kursen.';
$string['publishername'] = 'Publicerare';
$string['publishername_help'] = 'Publiceraren är den person eller organisation som är den officiella utgivaren av kursen. Såvida inte du publicerar kursen åt någon annan är det vanligen du.';
$string['publishon'] = 'Publicera på';
$string['questionsnumber'] = 'Antal frågor ({$a})';
$string['readvertiseon'] = 'Uppdatera annonseringsinformation på {$a}';
$string['registeredmoodleorg'] = 'Moodle.org ({$a})';
$string['registeredsites'] = 'Registrerade webbplatser';
$string['registersite'] = 'Registrera på {$a}';
$string['registrationconfirmed'] = 'Webbplatsregistrering bekräftad';
$string['registrationconfirmedon'] = 'Du är nu registrerad på hubben {$a}. Du kan nu publicera kurser på denna hub med hjälp av länken "Offentliggör" i kursadministrationsmenyn.';
$string['registrationinfo'] = 'Registreringsinformation';
$string['registrationupdated'] = '';
$string['removefromhub'] = 'Ta bort från hub';
$string['renewregistration'] = 'Förnya registrering';
$string['resourcesnumber'] = 'Antal resurser ({$a})';
$string['restartregistration'] = 'Starta om registrering';
$string['roleassignmentsnumber'] = 'Antal rolltilldelningar ({$a})';
$string['screenshots'] = 'Skärmbilder';
$string['screenshots_help'] = 'Alla skärmbilder för kursen kommer att visas i sökresultat.';
$string['search'] = 'Sök';
$string['selecthub'] = 'Välj hub';
$string['selecthubinfo'] = 'En gemenskaps hub är en server som listar kurser. Du kan endast publicera (offentliggöra) kurser på hubbar som denna Moodleplats är registrerad på. Om hubben du vill använda inte är listad nedan kontakta din webbplatsadministratör.';
$string['sendfollowinginfo'] = 'Mer information';
$string['sendfollowinginfo_help'] = 'Följande information kommer att skickas enbart för att bidra till övergripande statistik. Informationen kommer inte att göras publik på någon listning över webbplatser.';
$string['sendingcourse'] = 'Sänder kurs';
$string['sendingsize'] = 'Vänta medan kursfilen laddas upp ({$a->total}Mb)...';
$string['sent'] = '...klar';
$string['settings'] = 'Inställningar';
$string['share'] = 'Dela denna kurs för andra att ladda ner';
$string['shared'] = 'Delad';
$string['shareon'] = 'Ladda upp denna kurs till {$a}';
$string['shareonhub'] = 'Ladda upp denna kurs till en hub';
$string['sharepublication_help'] = 'Uppladdning av denna kurs till en hubserver kommer att medge att andra kan ladda ner kursen och installera den på deras Moodleplats.';
$string['siteadmin'] = 'Administratör';
$string['siteadmin_help'] = 'Det fulla namnet för webbplatsadministratören.';
$string['sitecountry'] = 'Land';
$string['sitecountry_help'] = 'Det land din organisation är i.';
$string['sitedesc'] = 'Beskrivning';
$string['sitedesc_help'] = 'Beskrivningen av din webbplats kan komma att visas i listningen över webbplatser. Använd endast ren text.';
$string['siteemail'] = 'E-postadress';
$string['siteemail_help'] = 'Du måste ange en e-postadress så att hubadministratören kan kontakta dig om det blir nödvändigt. Detta kommer inte att användas för andra ändamål. Det rekomenderas att använda en e-postadress med anknytning till befattning (till exempel: befattningshavare@exempel.se) istället för direkt till en person.';
$string['sitegeolocation'] = 'Geografisk lokalisering';
$string['sitegeolocation_help'] = 'I framtiden kommer vi kanske att erbjuda lokaliseringsbaserad sökning efter hubbar. Om du vill ange lokalisering för din webbplats ange latitud/longitud här (tex: -31.947884,115.871285). Ett av sätten att hitta detta är att använda Google Maps.';
$string['sitelang'] = 'Språk';
$string['sitelang_help'] = 'Ditt språk för webbplatsen kommer att visas på listningen över webbplatser.';
$string['sitename'] = 'Namn';
$string['sitename_help'] = 'Webbplatsens namn kommer att visas i listningen över webbplatser om hubbeb tillåter det.';
$string['sitephone'] = 'Telefon';
$string['sitephone_help'] = 'Ditt telefonnummer kommer bara att kunna ses av hubadministratören.';
$string['siteprivacy'] = 'Intergitet';
$string['siteprivacylinked'] = 'Publicera webbplatsnamnet med en länk';
$string['siteprivacynotpublished'] = 'Publicera inte denna webbplats';
$string['siteprivacypublished'] = 'Publicera endast webbplatsens namn';
$string['siteregistrationcontact'] = 'Kontaktformulär';
$string['siteregistrationcontact_help'] = 'Om du tillåter det kommer andra personer kanske kunna kontakta dig via ett kontaktformulär på hubben. De kommer aldrig att kunna se din e-postadress.';
$string['siteregistrationemail'] = 'E-postmeddelanden';
$string['siteregistrationemail_help'] = 'Om du aktiverar detta kan hubadministratören kontakta dig via e-post med viktiga nyheter som tex säkerhetsfrågor.';
$string['siteregistrationupdated'] = 'Webbplatsregistrering uppdaterad';
$string['siterelease'] = '';
$string['siterelease_help'] = 'Moodle versionsnummer för denna plats';
$string['siteupdatedcron'] = 'Webbplatsregistrering uppdaterad på "{$a}"';
$string['siteupdatesend'] = 'Uppdatering av registrering på hubbar slutförd.';
$string['siteupdatesstart'] = 'Startar uppdatering av registrering på hubbar...';
$string['siteurl'] = 'Webbplats URL';
$string['siteurl_help'] = 'URL:en är adressen till denna webbplats. Om säkerhetsinställningarna tillåter att användare ser webbplatsadresser är detta den URL som kommer att användas.';
$string['siteversion'] = 'Moodleversion';
$string['siteversion_help'] = 'Moodleversion för denna webbplats.';
$string['specifichubregistrationdetail'] = 'Du kan även registrera din webbplats på andra hubbar.';
$string['statistics'] = 'Integritet för statistik';
$string['status'] = 'Hublistning';
$string['statuspublished'] = 'Listad';
$string['statusunpublished'] = 'Inte listad';
$string['subject'] = 'Ämne';
$string['subject_help'] = 'Välj det huvudämnesområde som kursen täcker.';
$string['tags'] = 'Taggar';
$string['tags_help'] = 'Taggar hjälper vid framtida kategorisering av din kurs och underlättar att den hittas. Använd enkla, meningsfulla ord och separera dem med kommatecken. Exempel: mattamatik,algebra,geometri';
$string['type'] = 'Annonserad/ Delad';
$string['unlistedurl'] = 'Olistad hub URL';
$string['unpublish'] = 'Avpublicera';
$string['unpublishalladvertisedcourses'] = 'Avpublicera alla kurser som för närvarande annonseras på en hub';
$string['unpublishalluploadedcourses'] = 'Avpublicera alla kurser som har laddats upp på en hub.';
$string['unpublishconfirmation'] = 'Vill du verkligen ta bort kursen "{$a->courseshortname}" från huben "{$a->hubname}"';
$string['unpublishcourse'] = 'Avpublicera {$a}';
$string['unregister'] = 'Avregistrera';
$string['unregisterfrom'] = 'Avregistrera från {$a}';
$string['unregistrationerror'] = 'Ett fel inträffade vid försök att avregistrera webbplstsen från hub: {$a}';
$string['update'] = 'Uppdatera';
$string['updatesite'] = 'Uppdatera registrering på {$a}';
$string['updatestatus'] = 'Kontrollera detta nu.';
$string['uploaded'] = 'Uppladdad';
$string['url'] = 'hubbens URL';
$string['urlalreadyregistered'] = 'Din webbplats verkar redan vara registrerad på denna hub vilket innebär att något har gått fel. Kontakta hubadministratören för att återställa din registrering så att du kan försöka igen.';
$string['usersnumber'] = 'Antal användare ({$a})';
$string['warning'] = 'VARNING';
$string['wrongtoken'] = 'Registreringen misslyckades av någon okänd anledning (nätverk?) Försök igen.';
$string['wrongurlformat'] = 'Felaktigt format för URL';
$string['xmlrpcdisabledcommunity'] = 'Tillägget XML-RPC är inte aktiverat på servern. Du kan inte söka och ladda ner kurser.';
$string['xmlrpcdisabledpublish'] = 'Tillägget XML-RPC är inte aktiverat på servern. Du kan inte publicera kurser eller hantera publicerade kurser.';
$string['xmlrpcdisabledregistration'] = 'Tillägget XML-RPC är inte aktiverat på servern. Du kommer inte kunna avregistrera eller uppdatera din registrering förrän du aktiverar tillägget.';
