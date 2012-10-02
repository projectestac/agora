<?PHP // $Id: debug.php,v 1.11 2009/12/14 09:22:14 mudrd8mz Exp $ 
      // debug.php - created with Moodle 2.0 dev (Build: 20081216) (2008121000)


$string['authpluginnotfound'] = 'Authenticatieplugin $a niet gevonden.';
$string['blocknotexist'] = 'Blok $a bestaat niet';
$string['cannotbenull'] = '$a kan niet nul zijn !!!';
$string['cannotcreateadminuser'] = 'ERNSTIGE FOUT: kon geen gebruikersrecord voor de beheerder bewaren !!!';
$string['cannotdowngrade'] = 'Kan niet terugdraaien van from $a->oldversion to $a->newversion.';
$string['cannotfindadmin'] = 'Kon geen beheerder vinden!';
$string['cannotinitpage'] = 'Kan pagina niet helemaal initialiseren: ongeldige $a->name id $a->id';
$string['cannotsetupsite'] = 'Fatale fout: kon de site niet installeren!';
$string['cannotsetuptable'] = '$a tabellen konden NIET juist ingesteld worden!';
$string['cannotupdaterelease'] = 'Fout: kon de versie niet updaten in de databank!';
$string['cannotupdateversion'] = 'Upgrade mislukt! (Kon de versie niet upgraden in de config tabel)';
$string['cannotupgradecapabilities'] = 'Problemen met het upgraden van de hoofdmogelijkheden van het rollensysteem';
$string['cannotupgradedbcustom'] = 'Upgrade van de locale databankaanpassingen mislukt! (kon de versie niet aanpasssen in de config tabel)';
$string['codingerror'] = 'Fout in de programmeercode gevonden. Dit moet door een programmeur hersteld worden. $a';
$string['configmoodle'] = 'Moodle is nog niet geconfigureerd. Je moet eerst config.php bewerken.';
$string['dbnotinsert'] = 'Databank fout - kan $a niet invoegen';
$string['dbnotsetup'] = 'Fout. Hoofddatabank niet correct geïnstalleerd';
$string['dbnotsupport'] = 'Fout. Je databank ($a) is nog niet ondersteund door Moodle of install.xml ontbreekt. Zoek in de lib/db-map.';
$string['dbnotupdate'] = 'Databankfout - kan $a niet updaten';
$string['doesnotworkwitholdversion'] = 'Dit script werkt niet met deze oude Moodleversie';
$string['erroroccur'] = 'Er is een fout opgetreden tijdens dit proces.';
$string['fixsetting'] = 'Verbeter je instellingen in config.php: <p>Je hebt:</p> <p>\$CFG->dirroot = \"$a->current\";</p> <p>maar het moet:</p> <p>\$CFG->dirroot = \"$a->found\" zijn</p>';
$string['invalidarraysize'] = 'Array grootte in params van $a fout';
$string['invalideventdata'] = 'Foute gebeurtenisgegevens ingestuurd: $a';
$string['missingconfigversion'] = 'De versie staat niet in de config-tabel. Kan niet verdergaan.';
$string['modulenotexist'] = 'module $a bestaat niet';
$string['morethanonerecordinfetch'] = 'Meer dan één record gevonden !';
$string['mustbeoveride'] = 'Abstract $a methode moet overschreven worden.';
$string['noactivityname'] = 'Pagina-object gehaald van page_generic_activity, maar \$this->activityname is niet gedefiniëerd';
$string['noadminrole'] = 'Er kon geen beheerderrol gevonden worden';
$string['noblockbase'] = 'Klasse block_base is niet gedefinieerd of bestand niet gevonden voor /blocks/moodleblock.class.php';
$string['noblocks'] = 'Geen blokken geïnstalleerd!';
$string['nocaps'] = 'Fout: geen mogelijkheden (capabilities) gedefinieerd!';
$string['nocate'] = 'Geen categorieën!';
$string['nomodules'] = 'Geen modules gevonden!';
$string['nopageclass'] = 'Geïmporteerde $a maar geen paginaklassen gevonden';
$string['noreports'] = 'Geen toegankelijke rapporten';
$string['notables'] = 'Geen tabellen!';
$string['phpvaroff'] = 'De PHP server variable \'$a->name\' moet Off zijn - $a->link';
$string['phpvaron'] = 'De PHP server variable \'$a->name\' is niet ingeschakeld - $a->link';
$string['sessionmissing'] = '$a object ontbreekt in de sessie';
$string['siteisnotdefined'] = 'Site is niet gedefiniëerd';
$string['sqlrelyonobsoletetable'] = 'Deze SQL steunt op onbestaande tabellen: $a! Je code moet aangepast worden door een software-ontwikkelaar.';
$string['upgradefail'] = 'Upgrade mislukt! zie: $a';
$string['withoutversion'] = 'version.php is niet leesbaar of niet opgegeven';
$string['xmlizeunavailable'] = 'xmlize functies zijn niet beschikbaar';

?>
