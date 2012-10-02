<?PHP // $Id: enrol_imsenterprise.php,v 1.2 2006/10/25 11:49:19 carlesbellver Exp $ 
      // enrol_imsenterprise.php - created with Moodle 1.7 beta + (2006101001)


$string['aftersaving...'] = 'Després de desar els paràmetres, potser voldreu';
$string['allowunenrol'] = 'Permet que les dades IMS <strong>cancel·lin les inscripcions</strong> d\'estudiantat i/o professorat';
$string['basicsettings'] = 'Paràmetres bàsics';
$string['coursesettings'] = 'Opcions de les dades de cursos';
$string['createnewcategories'] = 'Crea noves categories de cursos (ocultes) si no existeixen en Moodle';
$string['createnewcourses'] = 'Crea nous cursos (ocults) si no existeixen en Moodle';
$string['createnewusers'] = 'Crea comptes d\'usuari per a usuaris no registrats en Moodle';
$string['cronfrequency'] = 'Freqüència de processament';
$string['deleteusers'] = 'Suprimeix comptes d\'usuari quan ho especifiquin les dades IMS';
$string['description'] = 'Aquest mètode comprova repetidament l\'existència d\'un fitxer, amb un format especial, en una ubicació especificada per l\'administrador, i en processa el contingut. El fitxer ha de ser conforme a les <a href=\'../help.php?module=enrol/imsenterprise&file=formatoverview.html\' target=\'_blank\'>especificacions IMS Enterprise</a> i ha de contenir els elements XML person, group i membership.';
$string['doitnow'] = 'executar ara una importació IMS Enterprise';
$string['enrolname'] = 'Fitxer IMS Enterprise';
$string['filelockedmail'] = 'El procés del cron no pot suprimir el fitxer que esteu utilitzant per a inscripcions basades en IMS Enterprise ($a). Generalment això vol dir que té permisos erronis. Arregleu els permisos de manera que Moodle pugui suprimir aquest fitxer, o en cas contrari podria processar-se repetidament.';
$string['filelockedmailsubject'] = 'Error important: fitxer d\'inscripcions';
$string['fixcasepersonalnames'] = 'Canvia a majúscules les inicials dels noms de persones';
$string['fixcaseusernames'] = 'Canvia a minúscules els noms d\'usuari';
$string['imsrolesdescription'] = 'L\'especificació IMS Enterprise inclou vuit tipus de rol distints. Trieu com voleu que s\'assignin en Moodle i si preferiu ignorar-ne algun.';
$string['location'] = 'Ubicació del fitxer';
$string['logtolocation'] = 'Ubicació del fitxer de registre (en blanc si no voleu registre)';
$string['mailadmins'] = 'Notifica a l\'administrador per correu electrònic';
$string['mailusers'] = 'Notifica als usuaris per correu electrònic';
$string['miscsettings'] = 'Miscel·lània';
$string['processphoto'] = 'Afegeix la foto de l\'usuari al perfil';
$string['processphotowarning'] = 'Avís: el processament d\'imatges probablement afegirà una càrrega significativa al vostre servidor. Se us recomana no activar aquesta opció si espereu que es processi un gran nombre d\'estudiants.';
$string['restricttarget'] = 'Processa les dades només si s\'especifica l\'objectiu següent';
$string['sourcedidfallback'] = 'Utilitza el \"sourcedid\" com a userid si el camp \"userid\" no hi és';
$string['truncatecoursecodes'] = 'Trunca els codis de curs a aquesta longitud';
$string['usecapitafix'] = 'Activeu aquest quadre si esteu utilitzant \"Capita\" (el seu format XML és lleugerament erroni)';
$string['usersettings'] = 'Opcions de les dades d\'usuari';
$string['zeroisnotruncation'] = '0 indica no truncar';

?>
