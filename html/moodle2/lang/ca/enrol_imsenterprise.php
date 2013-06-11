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
 * Strings for component 'enrol_imsenterprise', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_imsenterprise
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving...'] = 'Després de desar els paràmetres, potser voldreu';
$string['allowunenrol'] = 'Permet que les dades IMS <strong>cancel·lin les inscripcions</strong> d\'estudiantat i/o professorat';
$string['allowunenrol_desc'] = 'Si s\'habilita la inscripció dels cursos s\'esborrarà quan s\'especifiqui a les dades del connector Enterprise.';
$string['basicsettings'] = 'Paràmetres bàsics';
$string['coursesettings'] = 'Opcions de les dades de cursos';
$string['createnewcategories'] = 'Crea noves categories de cursos (ocultes) si no existeixen en Moodle';
$string['createnewcategories_desc'] = 'Si l\'<org><orgunit>element és present a les dades inicials del curs, els seus continguts s\'utilitzaran per especificar una categoria si el curs s\'ha creat des de cero. El connector NO canviarà de categoria els cursos que ja existeixen.

Si no existeix cap categoria amb el nom desitjat es crearà una categoria oculta.';
$string['createnewcourses'] = 'Crea nous cursos (ocults) si no existeixen en Moodle';
$string['createnewcourses_desc'] = 'Si s\'habilita el connector d\'inscripció IMS Enterprise podrà crear cursos nous per a qualsevol que trobi a les dades IMS però no en la base de dades de Moodle. Qualsevol curs nou creat estarà inicialment ocult.';
$string['createnewusers'] = 'Crea comptes d\'usuari per a usuaris no registrats en Moodle';
$string['createnewusers_desc'] = 'La inscripció de dades IMS Enterprise descriu de forma típica un conjunt d\'usuaris. Si està habilitada, es poden crear comptes d\'usuaris per usuaris que no es troben a la base de dades de Moodle.

Els usuaris es cerquen primer per «número id» i després pel nom d\'usuari de Moodle. Les contrasenyes no s\'importen amb el connector IMS Enterprise. Es recomana l\'ús d\'un connector d\'autenticació  per autenticar usuaris.';
$string['cronfrequency'] = 'Freqüència de processament';
$string['deleteusers'] = 'Suprimeix comptes d\'usuari quan ho especifiquin les dades IMS';
$string['deleteusers_desc'] = 'Si s\'habilita les dades d\'inscripció IMS Enterprise poden permetre la supressió de comptes d\'usuaris ( si la senyal «recstatus» és configura a l\'estat 3, que representa la supressió d\'un compte d\'usuari). Com que és un estàndard en Moodle, les dades de l\'usuari no es poden esborrar actualment de la base de dades de Moodle, però una senyal indica que el compte es pot suprimir.';
$string['doitnow'] = 'executar ara una importació IMS Enterprise';
$string['filelockedmail'] = 'El procés del cron no pot suprimir el fitxer que esteu utilitzant per a inscripcions basades en IMS Enterprise ({$a}). Generalment això vol dir que té permisos erronis. Arregleu els permisos de manera que Moodle pugui suprimir aquest fitxer, o en cas contrari podria processar-se repetidament.';
$string['filelockedmailsubject'] = 'Error important: fitxer d\'inscripcions';
$string['fixcasepersonalnames'] = 'Canvia a majúscules les inicials dels noms de persones';
$string['fixcaseusernames'] = 'Canvia a minúscules els noms d\'usuari';
$string['ignore'] = 'Ignora';
$string['importimsfile'] = 'Importa fitxer IMS Enterprise';
$string['imsrolesdescription'] = 'L\'especificació IMS Enterprise inclou vuit tipus de rol distints. Trieu com voleu que s\'assignin en Moodle i si preferiu ignorar-ne algun.';
$string['location'] = 'Ubicació del fitxer';
$string['logtolocation'] = 'Ubicació del fitxer de registre (en blanc si no voleu registre)';
$string['mailadmins'] = 'Notifica a l\'administrador per correu electrònic';
$string['mailusers'] = 'Notifica als usuaris per correu electrònic';
$string['messageprovider:imsenterprise_enrolment'] = 'Missatges d\'inscripció en fitxer IMS Enterprise';
$string['miscsettings'] = 'Miscel·lània';
$string['pluginname'] = 'Fitxer IMS Enterprise';
$string['pluginname_desc'] = 'Aquest mètode comprovarà de forma cíclica en un procés  un fitxer de text formatat en la localització que heu indicat. El fitxer seguirà les especificacions IMS Enterprise i contindrà  els elements XML  persona, grup, i categoria.';
$string['processphoto'] = 'Afegeix la foto de l\'usuari al perfil';
$string['processphotowarning'] = 'Avís: el processament d\'imatges probablement afegirà una càrrega significativa al vostre servidor. Se us recomana no activar aquesta opció si espereu que es processi un gran nombre d\'estudiants.';
$string['restricttarget'] = 'Processa les dades només si s\'especifica l\'objectiu següent';
$string['restricttarget_desc'] = 'Un fitxer de dades IMS Enterprise pot preveure\'s per diferents «objectius» - diferents entorns virtuals d\'aprenentatge, o diferents sistemes  dins d\'un centre educatiu/universitat. Es possible especificar al fitxer IMS Enterprise que les dades estiguen previstes per un o més sistemes posant nom a <target> etiquetes dins d\' <properties>etiquetes.

En general no heu de preocupar-vos d\'això. Deixeu el paràmetre en blanc i Moodle processarà sempre les dades del fitxer, no patiu si una etiqueta està posada o no. Tanmateix, poseu el nom exacte que voleu que tingui l\'<target> etiqueta.';
$string['roles'] = 'Rols';
$string['sourcedidfallback'] = 'Utilitza el "sourcedid" com a userid si el camp "userid" no hi és';
$string['sourcedidfallback_desc'] = 'A les dades IMS, el camp <sourcedid> representa la identificació persistent per a una persona utilitzada per la font del sistema. El camp <userid> és un camp separat que conté el codi d\'identificació utilitzat per l\'usuari quan entra al sistema. En molt casos aquests dos codis poden ser el mateix - però no sempre és així.

Alguns sistemes d\'informació d\'estudiants tenen errors obtenint el camp <userid>. Si és aquest el cas, podeu habilitar aquest paràmetre per permetre utilitzar <sourcedid> com identificació e l\'usuari en Moodle. En cas contrari deixeu aquest paràmetre deshabilitat.';
$string['truncatecoursecodes'] = 'Trunca els codis de curs a aquesta longitud';
$string['truncatecoursecodes_desc'] = 'En algunes situacions podeu tindre codis de cursos en els quals truncar una determinada longitud abans de processar-la. Si és aquest el cas, entreu el nombre de caràcters en aquest quadre. En cas contrari, deixeu el quadre buit i no truncarà res.';
$string['usecapitafix'] = 'Activeu aquest quadre si esteu utilitzant "Capita" (el seu format XML és lleugerament erroni)';
$string['usecapitafix_desc'] = 'El sistema de dades de l\'estudiant produïdes per Capita ha trobat un error lleu en aquesta sortida XML. Si esteu utilitzant Capita hauríeu de habilitar aquest paràmetre - en cas contrari deixeu-ho deshabilitat.';
$string['usersettings'] = 'Opcions de les dades d\'usuari';
$string['zeroisnotruncation'] = '0 indica no truncar';
