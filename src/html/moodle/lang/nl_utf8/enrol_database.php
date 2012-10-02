<?PHP // $Id$ 
      // enrol_database.php - created with Moodle 2.0 dev (2007101504)


$string['autocreate'] = 'Cursussen kunnen automatisch aangemaakt worden als er aanmeldingen zijn voor een cursus die in Moodle nog niet bestaat';
$string['autocreation_settings'] = 'Automatisch instellingen maken';
$string['category'] = 'Kies de categorie voor de automatisch aangemaakte cursussen';
$string['course_fullname'] = 'De veldnaam waar de volledige cursusnaam is bewaard';
$string['course_id'] = 'De veldnaam waar de courseID is bewaard. De waarden van dit veld worden gebruikt om de koppeling te maken met het \"enrol_db_l_coursefield\" veld in de course tabel van Moodle';
$string['course_shortname'] = 'De veldnaam waar de korte cursusnaam is bewaard';
$string['course_table'] = 'De tabelnaam waar de cursusdetails bewaard worden (short name, fullname, ID enz)';
$string['dbhost'] = 'Server IP naam of nummer';
$string['dbname'] = 'Databanknaam';
$string['dbpass'] = 'Serverwachtwoord';
$string['dbtable'] = 'Databanktabel';
$string['dbtype'] = 'Databanktype';
$string['dbuser'] = 'Server gebruikersnaam';
$string['defaultcourseroleid'] = 'De rol die standaard toegewezen wordt als er geen andere rol is opgegeven.';
$string['description'] = 'Je kunt een externe datatabank (nagenoeg elk type) gebruiken om je cursusaanmeldingen te controleren. Er wordt verondersteld dat je externe databank een veld met course ID bevat en een veld met user ID. Deze worden vergeleken met velden die je kiest in de lokale cursus- en gebruikerstabellen';
$string['disableunenrol'] = 'Als dit op ja gezet wordt, zullen gebruikers die voordien aangemeld waren door de externe databank plugin, niet afgemeld worden door dezelfde plugin, ongeacht de databankinhoud.';
$string['enrol_database_autocreation_settings'] = 'Automatisch aanmaken van nieuwe cursussen';
$string['enrolname'] = 'Externe databank';
$string['general_options'] = 'Algemene instellingen';
$string['host'] = 'Database server hostnaam';
$string['ignorehiddencourse'] = 'Als dit op ja gezet wordt, dan zullen gebreukers niet aangemeld worden in cursussen die als niet beschikbaar voor leerlingen ingesteld zijn.';
$string['local_fields_mapping'] = 'Locale databankvelden van Moodle';
$string['localcoursefield'] = 'De veldnaam in de cursustabel die we gebruiken om records te koppelen in de externe databank (vb IDnummer).';
$string['localrolefield'] = 'De veldnaam in de rollentabel die we gebruiken om records te koppelen in de externe databank (vb kortenaam).';
$string['localuserfield'] = 'De velnaam in de gebruikerstabel die we gebruiken om records te koppelen in de externe databank (vb IDnummer).';
$string['name'] = 'De te gebruiken databank';
$string['pass'] = 'Wachtwoord om toegang tot de server te krijgen';
$string['remote_fields_mapping'] = 'Databankvelden voor (externe) aanmelding';
$string['remotecoursefield'] = 'De velnaam uit de externe tabel die we gebruiken om records in de cursussentabel te koppelen.';
$string['remoterolefield'] = 'De velnaam uit de externe tabel die we gebruiken om records in de rollentabel te koppelen.';
$string['remoteuserfield'] = 'De velnaam uit de externe tabel die we gebruiken om records in de gebruikerstabel te koppelen.';
$string['server_settings'] = 'Severinstellingen';
$string['student_coursefield'] = 'De veldnaam in de tabel voor leerlingaanmeldingen waar de courseID te vinden is.';
$string['student_l_userfield'] = 'De veldnaam in de locale gebruikerstabel die we gebruiken om records voor leerlingen te koppelen met de externe databank (vb idnumber)';
$string['student_r_userfield'] = 'De veldnaam in de externe aanmeldingstabel waar de user ID te vinden is';
$string['student_table'] = 'De tabelnaam waar de aanmeldingen van leerlingen bewaard worden';
$string['teacher_coursefield'] = 'De veldnaam in de aanmeldingstabel van leraren waar de coursID te vinden is';
$string['teacher_l_userfield'] = 'De veldnaam in de locale gebruikerstabel die we gebruiken om de gebruiker te koppelen aan een externe record voor leraren (vb idnumber)';
$string['teacher_r_userfield'] = 'De veldnaam in de externe tabel voor aanmeldingen van leraren waar we de userID in kunnen vinden.';
$string['teacher_table'] = 'De tabelnaam waar de aanmeldingen van leraren worden bewaard.';
$string['template'] = 'Optioneel: automatisch aangemaakte cursussen kunnen hun instellingen overnemen van een sjablooncursus';
$string['type'] = 'Databank type';
$string['user'] = 'Gebruikersnaam voor de databank';
$string['local_coursefield'] = 'De naam van het veld in de course tabel die we gebruiken om records te koppelen met de externe databank (bv idnummer)'; // ORPHANED

?>
