<?PHP // $Id: auth_cas.php,v 1.3 2010/03/26 08:26:39 ueu_ueu Exp $ 
      // auth_cas.php - created with Moodle 1.9.4+ (Build: 20090218) (2007101541)


$string['CASform'] = 'Autentifikaziorako modua';
$string['accesCAS'] = 'CAS erabiltzaileak';
$string['accesNOCAS'] = 'beste erabiltzaile batzuk';
$string['auth_cas_auth_user_create'] = 'Erabiltzaileak kanpotik sortu';
$string['auth_cas_baseuri'] = 'Zerbitzariaren URIa (zuriz Uri oinarririk ez badago)<br />Adibidez, CAS zerbitzariak host.domaine.com/CAS/ helbideari erantzuten badio, orduan<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'URI oinarria';
$string['auth_cas_broken_password'] = 'Ezin duzu pasahitza aldatu gabe jarraitu. Hala ere, ez dago pasahitza aldatzeko orririk. Mesedez, jar zaitez harremanetan zure Moodle-ko kudeatzailearekin.';
$string['auth_cas_cantconnect'] = 'CAS moduluaren LDAP atala ezin da ondoko zerbitzariarekin konektatu: $a';
$string['auth_cas_casversion'] = 'Bertsioa';
$string['auth_cas_changepasswordurl'] = 'Pasahitza aldatzeko URLa';
$string['auth_cas_create_user'] = 'Aktibatu hau Moodle-ren datu-basean CASen bidez onartutako erabiltzaileak erantsi nahi badituzu. Bestela, Moodle-ren datu-basean honez gero dauden erabiltzaileek soilik izango dute sarbidea.';
$string['auth_cas_create_user_key'] = 'Sortu erabiltzailea';
$string['auth_cas_enabled'] = 'Aktibatu hau CAS autentifikazioa nahi baduzu.';
$string['auth_cas_hostname'] = 'CAS zerbitzariaren izena<br />ad.: host.domain.eu';
$string['auth_cas_hostname_key'] = 'Ostalari-izena';
$string['auth_cas_invalidcaslogin'] = 'Sentitzen dugu, zure saio-hasierak kale egin du: ezin zara sartu';
$string['auth_cas_language'] = 'Hizkuntza aukeratua';
$string['auth_cas_language_key'] = 'Hizkuntza';
$string['auth_cas_logincas'] = 'Konexio seguruaren sarbidea';
$string['auth_cas_logoutcas'] = '\'bai\' aldatu CASetik irten nahi baduzu Moodle-n saioa amaitutakoan';
$string['auth_cas_logoutcas_key'] = 'CASen saioa amaitu';
$string['auth_cas_multiauth'] = '\'bai\' aldatu autentifikazio anitza izan nahi baduzu, (CAS + beste autentifikazioa)';
$string['auth_cas_multiauth_key'] = 'Autentifikazio anitza';
$string['auth_cas_port'] = 'CAS zerbitzariaren ataka';
$string['auth_cas_port_key'] = 'Ataka';
$string['auth_cas_proxycas'] = '\'bai\' aldatu CAS proxy moduan  erabili nahi baduzu';
$string['auth_cas_proxycas_key'] = 'Proxy modua';
$string['auth_cas_server_settings'] = 'CAS zerbitzariaren ezarpenak';
$string['auth_cas_text'] = 'Konexio segurua';
$string['auth_cas_use_cas'] = 'Erabili CAS';
$string['auth_cas_version'] = 'CAS bertsioa';
$string['auth_casdescription'] = 'Metodo honek CAS zerbitzaria erabiltzen du (Central Authentication Service) erabiltzaileak SSO (Single Sign On) inguruan autentifikatzeko. Nahi baduzu LDAP autentifikazio xumea erabil dezakezu. Erabiltzaile-izena eta pasahitza CASen arabera egokiak badira, Moodle-k erabiltzaile berri bat sortzen du datu-basean, beharko balitz LDAPetik atributuak hartuz. Hurrengo konexioetan erabiltzaile-izena eta pasahitza baieztatzen dira, besterik ez.';
$string['auth_casnotinstalled'] = 'Ezin da CAS autentifikazioa erabili. PHP LDAP modulua ez dago instalatuta.';
$string['auth_castitle'] = 'CAS zerbitzaria (SSO)';

?>
