<?PHP // $Id: auth_email.php,v 1.1 2009/06/11 16:35:18 andreabix Exp $ 
      // auth_email.php - created with Moodle 2.0 dev (Build: 20090611) (2009060200)


$string['auth_changingemailaddress'] = 'Hai richiesto il cambio di indirizzo email da $a->oldemail a $a->newemail. Per motivi di sicurezza ti stiamo mandando un messaggio al nuovo indirizzo per avere conferma che ti appartiene. Il tuo indirizzo email sarà aggiornato appena tu clicchi sul link presente nel messaggio inviato.';
$string['auth_emailchangecancel'] = 'Annulla cambio email';
$string['auth_emailchangepending'] = 'Cambio email in corso. Clicca sul link presente nel messaggio che ti è stato inviato a $a->preference_newemail.';
$string['auth_emaildescription'] = 'La creazione di account via email consente ai visitatori del sito di creare un account in autonomia. Il visitatore compila il form di creazione account scegliendo username, password ed email. Moodle invierà all\'indirizzo di email specificato un messaggio contenente un link ad un pagina di conferma. Solo dopo aver confermato il proprio account l\'utente potrà eseguire il login usando il proprio username e password memorizzati nel database degli utenti di Moodle.';
$string['auth_emailnoemail'] = 'Fallito il tentativo di inviarti una email !';
$string['auth_emailnoinsert'] = 'Il tuo record non può essere aggiunto al database!';
$string['auth_emailnowexists'] = 'L\'indirizzo email che hai cercato di assegnare al tuo profilo è stato, nel frattempo, assegnato a qualcun altro, dal momento della tua richiesta. La richiesta di modifica email è stata quindi annullata, ma puoi provare ancora con un indirizzo email differente.';
$string['auth_emailrecaptcha'] = 'Nella pagina di creazione account è possibile far comparire un elemento di conferma audio/visuale. Lo scopo è quello di evitare la creazione automatica di account da parte di spammer, contribuendo al tempo stesso ad una buona causa. Per maggiori informazioni su reCAPTCHA vedi http://recaptcha.net/learnmore.html.<br/><me> <em>Prerequisito per il funzionamento è l\'estensione cURL del PHP</em>';
$string['auth_emailrecaptcha_key'] = 'Abilita reCAPTCHA';
$string['auth_emailsettings'] = 'Impostazioni';
$string['auth_emailtitle'] = 'Account via email';
$string['auth_emailupdate'] = 'Modifica indirizzo email';
$string['auth_emailupdatemessage'] = 'Caro $a->fullname,

hai richiesto la modifica dell\'indirizzo email del tuo account sul sito $a->site. Clicca sul link seguente (o aprilo nel tuo browser) per confermare la richiesta.

$a->url';
$string['auth_emailupdatesuccess'] = 'L\'indirizzo email dell\'utente <em>$a->fullname</em> è stato modificato in <em>$a->email</em>.';
$string['auth_emailupdatetitle'] = 'Conferma del cambio di email su $a->site';
$string['auth_invalidnewemailkey'] = 'Errore: se state tentando di confermare un cambio di indirizzo email, potreste aver copiato male l\'URL dalla email di richiesta conferma che avete ricevuto. Verificate e provate di nuovo.';
$string['auth_outofnewemailupdateattempts'] = 'Hai superato i tentativi permessi per modificare il tuo indirizzo email. La richiesta di modifica è stata annullata.';

?>
