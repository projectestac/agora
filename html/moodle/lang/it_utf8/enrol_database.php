<?PHP // $Id$ 
      // enrol_database.php - created with Moodle 1.9 Beta 4 (2007101508)


$string['autocreate'] = 'I corsi possono essere creati automaticamente se nel Database esterno esistono iscrizioni ad un corso che ancora non è presente in Moodle.';
$string['autocreation_settings'] = 'Impostazioni per la creazione automatica dei corsi';
$string['category'] = 'Categoria dei corsi creati automaticamente';
$string['course_fullname'] = 'Campo dove è registrato il nome completo del corso.';
$string['course_id'] = 'Campo dove è registrata l\'ID del corso. I valori in questo campo vengono confrontati con quelli inseriti nel campo \"enrol_db_l_coursefield\" nella tabella dei corsi di Moodle.';
$string['course_shortname'] = 'Campo dove è registrato il nome breve del corso.';
$string['course_table'] = 'Tabella dove sono contenuti i dettagli del corso (nome breve, nome completo, ID, eccetera)';
$string['dbhost'] = 'Nome o IP del server';
$string['dbname'] = 'Nome del Database';
$string['dbpass'] = 'Password del Database';
$string['dbtable'] = 'Tabella del Database';
$string['dbtype'] = 'Genere del Database';
$string['dbuser'] = 'Utente del Database';
$string['defaultcourseroleid'] = 'Il ruolo che sarà assegnato per default se non sono specificati ruoli diversi.';
$string['description'] = 'E\' possibile utilizzare un Database (praticamente di qualsiasi genere) per gestire le iscrizioni ai corsi. Si suppone che il Database contenga un campo con la ID del corso ed una campo con la user ID dell\'utente iscritto al corso. Questi campi saranno confrontati con i campi (configurabili sotto) delle tabelle degli utenti e dei corsi di Moodle.';
$string['disableunenrol'] = 'Se impostato a Si, gli utenti già iscritti ad un corso tramite il Database esterno non saranno disiscritti a prescindere dal contenuto del Database esterno.';
$string['enrol_database_autocreation_settings'] = 'Auto creazione di nuovi corsi';
$string['enrolname'] = 'Database Esterno';
$string['general_options'] = 'Opzioni Generali';
$string['host'] = 'Nome Host del Database server';
$string['ignorehiddencourse'] = 'Se impostato a Si, gli utenti non potranno essere iscritti ai corsi impostati come \"non disponibili\" per gli studenti.';
$string['local_fields_mapping'] = 'Campi del database di Moodle (locale)';
$string['localcoursefield'] = 'Nome del campo nella tabella dei corsi di Moodle che sarà usato per confrontare i dati nel Database esterno (es. idnumber)';
$string['localrolefield'] = 'Nome del campo nella tabella dei ruoli di Moodle che sarà usato per confrontare i dati nel Database esterno (es. shortname).';
$string['localuserfield'] = 'Nome del campo nella tabella utenti di Moodle che sarà usato per confrontare i dati nel Database esterno (es. idnumber)';
$string['name'] = 'Nome del database da usare';
$string['pass'] = 'Password di accesso al server';
$string['remote_fields_mapping'] = 'Campi per le iscrizioni nel Database remoto';
$string['remotecoursefield'] = 'Nome del Campo del Database remoto che contiene l\'ID del corso';
$string['remoterolefield'] = 'Nome del Campo del Database remoto che contiene l\'ID del ruolo.';
$string['remoteuserfield'] = 'Nome del Campo del Database remoto che contiene l\'ID degli utenti';
$string['server_settings'] = 'Impostazioni del Database Server remoto';
$string['student_coursefield'] = 'Nome del campo nella tabella di iscrizione degli studenti che contiene l\'ID del corso.';
$string['student_l_userfield'] = 'Nome del campo nella tabella locale utenti usata per abbinare l\'utente a un record remoto per gli studenti (es. idnumber).';
$string['student_r_userfield'] = 'Nome del campo nella tabella remota delle iscrizioni degli studenti che contiene l\'ID dell\'utente.';
$string['student_table'] = 'Nome della tabella che contiene le iscrizioni degli studenti.';
$string['teacher_coursefield'] = 'Nome del campo nella tabella di iscrizione dei docenti che contiene l\'ID del corso.';
$string['teacher_l_userfield'] = 'Nome del campo nella tabella locale utenti usata per abbinare l\'utente a un record remoto per i docenti (es. idnumber).';
$string['teacher_r_userfield'] = 'Nome del campo nella tabella remota delle iscrizioni dei docenti che contiene l\'ID dell\'utente.';
$string['teacher_table'] = 'Nome della tabella che contiene le iscrizioni dei docenti.';
$string['template'] = 'Opzionale: i corsi creati automaticamente possono ereditare le impostazioni da un corso modello. Inserite qui il nome del corso da usare come modello.';
$string['type'] = 'Genere del server del Database';
$string['user'] = 'Nome utente per accedere al server';

?>
