<?PHP // $Id: portfolio_boxnet.php,v 1.2 2009/04/10 12:59:25 andreabix Exp $ 
      // portfolio_boxnet.php - created with Moodle 2.0 dev (Build: 20090410) (2009040100)


$string['apikey'] = 'API key';
$string['apikeyhelp'] = 'Potete ottenerla creando un account su enabled.box.net, dove potrete poi aggiungere una applicazione. La url di callback deve essere  yourwwwroot/portfolio/add.php?postcontrol=1';
$string['apikeyinlinehelp'] = '<p>Per configuare Box.net, visitate la pagina <a href=\"http://enabled.box.net/my-projects\">enabled.box.net</a> ed effettuate il login.</p><p>In My Projects dovrete creare un nuovo progetto per ciascuna istanza di di Moodle.</p><p>L\'unica impostazione fondamentale è la url di callback, che dovrebbe essere  $a. Per le altre impostazioni potete inserire ciò che volete. Salvate le impostazioni ed avete fatto!';
$string['err_noapikey'] = 'Questo plugin non ha una API key configurata. Puoi ottenere una chiave da http://enabled.box.net';
$string['existingfolder'] = 'Cartella già esistente dove inserire file:';
$string['folderclash'] = 'la cartella che avete chiesto di creare è già esistente!';
$string['foldercreatefailed'] = 'Non è stato possibile creare la cartella destinazione su box.net';
$string['folderlistfailed'] = 'Non è stato possibile ottenere l\'elenco dei folder da box.net';
$string['newfolder'] = 'Cartella da creare dove inserire file:';
$string['noauthtoken'] = 'Non è stato possibile ricevere un token di autenticazione da usare in questa sessione';
$string['notarget'] = 'Per caricare file dovete specificare una cartella già esistente oppure una nuova cartella';
$string['noticket'] = 'Non è stato possibile ricevere un ticket da box.net per avviare la sessione di autenticazione';
$string['password'] = 'Password box.net (non verrà memorizzata)';
$string['pluginname'] = 'Box.net internet storage';
$string['sendfailed'] = 'Non è stato possibile inviare contenuti a box.net: $a';
$string['sharedfolder'] = 'Condiviso';
$string['sharefile'] = 'Condividere questo file?';
$string['sharefolder'] = 'Condividere questo nuovo folder?';
$string['targetfolder'] = 'Cartella destinazione';
$string['tobecreated'] = 'Da creare';
$string['username'] = 'Username box.net (non verrà memorizzato)';

?>
