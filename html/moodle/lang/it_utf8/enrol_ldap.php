<?PHP // $Id$ 
      // enrol_ldap.php - created with Moodle 1.9 Beta 4 (2007101508)


$string['description'] = '<p>E\' possibile usare un server LDAP per gestire le iscrizioni ai corsi. Si suppone che l\'albero LDAP contenga gruppi corrispondenti ai corsi e che all\'interno di ciascun gruppo siano elencati gli utenti da iscrivere.</p>
<p>All\'interno dei gruppi LDAP, ciascuno dei quali rappresenta un corso,  gli utenti da iscrivere saranno elencati tramite un campo, (es. <em>member</em> o <em>memberUid</em>), che contiene l\'identificativo univoco dell\'utente.</p>
<p>Per poter utilizzare le iscrizioni LDAP, i vostri utenti <strong>devono</strong> 
avere un campo \'idnumber\' valido. I gruppi LDAP devono avere questo idnumber nei campi <em>member</em> per gli utenti che si iscrivono a quel corso.</p>
<p>Questo metodo di iscrizione ai corsi darà i migliori risultati se utilizzato in abbinamento all\'autenticazione LDAP.</p>
<p>Le iscrizioni ai corsi in Moodle verranno aggiornate contemporaneamente alle login degli utenti. Se lo desiderate, potete comunque eseguire uno script per tenere le iscrizioni ai corsi in Moodle sincronizzate a LDAP. Maggiori informazioni in 
<em>enrol/ldap/enrol_ldap_sync.php</em>.</p>

<p>Questo plugin può anche essere impostato in modo da creare  automaticamente nuovi corsi quando appaiono nuovi gruppi in LDAP.</p>';
$string['enrol_ldap_autocreate'] = 'I corsi possono essere creati automaticamente se in LDAP esistono iscrizioni ad un corso che ancora non è presente in Moodle.';
$string['enrol_ldap_autocreation_settings'] = 'Impostazioni per la creazione automatica dei corsi';
$string['enrol_ldap_bind_dn'] = 'Distinguished Name (dn) del bind-user da utilizzare (es. \'cn=ldapuser,ou=public,o=org\')';
$string['enrol_ldap_bind_pw'] = 'Password per il bind-user';
$string['enrol_ldap_category'] = 'Categoria dove aggiungere i corsi creati automaticamente';
$string['enrol_ldap_contexts'] = 'Contesti LDAP';
$string['enrol_ldap_course_fullname'] = 'Opzionale: nome del campo LDAP che contiene il nome lungo del corso.';
$string['enrol_ldap_course_idnumber'] = 'Nome del campo LDAP che contiene l\'ID univoco del corso (es. <em>cn</em> oppure <em>uid</em>).';
$string['enrol_ldap_course_settings'] = 'Impostazioni per l\'iscrizione al corso';
$string['enrol_ldap_course_shortname'] = 'Opzionale: nome del campo LDAP che contiene il nome breve del corso.';
$string['enrol_ldap_course_summary'] = 'Opzionale: nome del campo LDAP che contiene la descrizione del corso.';
$string['enrol_ldap_editlock'] = 'Blocca valore';
$string['enrol_ldap_general_options'] = 'Opzioni Generali';
$string['enrol_ldap_host_url'] = 'URL dell\'Host LDAP (es. \'ldap://ldap.miosito.com/\' oppure \'ldaps://ldap.miosito.com/\')';
$string['enrol_ldap_memberattribute'] = 'Identificativo univoco  LDAP degli utenti';
$string['enrol_ldap_objectclass'] = 'objectClass LDAP utilizzata per cercare i corsi. In genere è \'posixGroup\'.';
$string['enrol_ldap_roles'] = 'Mappatura dei ruoli';
$string['enrol_ldap_search_sub'] = 'Cerca l\'appartenenza al gruppo anche nei sotto contesti (subcontext).';
$string['enrol_ldap_server_settings'] = 'Impostazioni del Server LDAP';
$string['enrol_ldap_student_contexts'] = 'Lista dei contesti dove vengono collocati i gruppi con registrazioni studente. Separare contesti differenti con \'.\'. Per esempio: \'ou=courses,o=org; ou=others,o=org\'';
$string['enrol_ldap_student_memberattribute'] = 'Attributo Membro, quando gli utenti appartengono (sono iscritti) ad un gruppo. Di solito, \'membro\' o \'uid membro\'.';
$string['enrol_ldap_student_settings'] = 'Impostazioni registrazione studente';
$string['enrol_ldap_teacher_contexts'] = 'Lista dei contesti dove vengono collocati i gruppi con registrazioni docente. Separare contesti differenti con \'.\'. Per esempio: \'ou=courses,o=org; ou=others,o=org\'';
$string['enrol_ldap_teacher_memberattribute'] = 'attributo Membro, quando gli utenti appartengono (sono iscritti) ad un gruppo. Di solito, \'membro\' o \'uid membro\'.';
$string['enrol_ldap_teacher_settings'] = 'Impostazioni registrazione docente';
$string['enrol_ldap_template'] = 'Opzionale: i corsi creati automaticamente possono ereditare le impostazioni da un corso modello. Inserite qui il nome del corso da usare come modello.';
$string['enrol_ldap_updatelocal'] = 'Aggiorna dati locali';
$string['enrol_ldap_version'] = 'Versione del protocollo LDAP da utilizzare';
$string['enrolname'] = 'LDAP';

?>
