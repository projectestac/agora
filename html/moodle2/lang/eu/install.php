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
 * Strings for component 'install', language 'eu', branch 'MOODLE_26_STABLE'
 *
 * @package   install
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admindirerror'] = 'Kudeaketarako zehaztu den direktorioa ez da zuzena';
$string['admindirname'] = 'Admin direktorioa';
$string['admindirsetting'] = '<p>Oso web zerbitzari gutxik erabiltzen dute /admin kontrol-panel edo antzekora era sartzeko URL berezi gisa. Zoritxorrez, hau ez dator bat Moodlen lehenetsitako administrazio-orrien kokapenarekin. Nahi izanez gero, zure instalazioko admin direktorioaren izena alda dezakezu, hemen izen berria idatziz. Adibidez: <blockquote> moodleadmin</blockquote>.
Horrela Moodle-ko admin loturak berrezarriko dira.</p>';
$string['admindirsettinghead'] = 'Ezarri Admin direktorioa...';
$string['admindirsettingsub'] = '<p>Oso web zerbitzari gutxik erabiltzen dute /admin kontrol-panel edo antzekora era sartzeko URL berezi gisa. Zoritxorrez, hau ez dator bat Moodlen lehenetsitako administrazio-orrien kokapenarekin. Nahi izanez gero, zure instalazioko admin direktorioaren izena alda dezakezu, hemen izen berria idatziz. Adibidez: <blockquote> moodleadmin</blockquote>.
Horrela Moodle-ko admin loturak berrezarriko dira.</p>';
$string['availablelangs'] = 'Hizkuntza-pakete eskuragarriak';
$string['caution'] = 'Kontuz';
$string['chooselanguage'] = 'Aukeratu hizkuntza bat';
$string['chooselanguagehead'] = 'Aukeratu hizkuntza bat';
$string['chooselanguagesub'] = 'Mesedez, aukeratu instalaziorako hizkuntza bat. Hizkuntza hori erabiliko da gunearen berezko hizkuntza gisa, baina aurrerago alda daiteke.';
$string['cliadminpassword'] = 'Kudeatzaile berriaren pasahitza';
$string['cliadminusername'] = 'Kudeatzaile kontuaren erabiltzaile-izena';
$string['clialreadyconfigured'] = 'File config.php fitxategia badago, mesedez erabili admin/cli/install_database.php gune hau instalatu nahi baduzu.';
$string['clialreadyinstalled'] = 'File config.php fitxategia badago, mesedez erabili admin/cli/upgrade.php zure gunea eguneratu nahi baduzu.';
$string['cliinstallfinished'] = 'Instalazioa ondo burutu da.';
$string['compatibilitysettings'] = 'zuren PHPren ezarpenak egiaztatzen...';
$string['compatibilitysettingshead'] = 'zure PHPren ezarpenak egiaztatzen...';
$string['compatibilitysettingssub'] = 'Zure zerbitzariak baldintza hauek guztiak bete beharko ditu Moodle bertan egokiro funtzionatzeko.';
$string['configfilenotwritten'] = 'Instalazioaren scriptak ezin izan du aukeratutako zehaztapen guztiak beteko dituen config.php fitxategia automatikoki sortu. Mesedez, kode hau config.php izeneko fitxategi batean kopiatu eta Moodle-ren sustraiko direktorioan itsatsi.';
$string['configfilewritten'] = 'config.php arrakastaz sortu da';
$string['configurationcomplete'] = 'Ezarpen osatua';
$string['configurationcompletehead'] = 'Ezarpen osatua';
$string['configurationcompletesub'] = 'Moodle-k ezarpen-fitxategia sortu du';
$string['database'] = 'Datu-basea';
$string['databasehead'] = 'Datu-basearen ezarpenak';
$string['databasehost'] = 'Datu-basearen ostalaria';
$string['databasename'] = 'Datu-basearen izena';
$string['databasepass'] = 'Datu-basearen pasahitza';
$string['databasetypesub'] = 'Moodle-k hainbat motatako datu-base zerbitzariak onartzen ditu. Mesedez, jarri harremanetan zerbitzariaren kudeatzailearekin ez badakizu zein mota erabili.';
$string['databaseuser'] = 'Datu-basearen erabiltzailea';
$string['dataroot'] = 'Datu-direktorioa';
$string['datarooterror'] = '\'Datu-direktorioa\' ezin izan da sortu edo aurkitu. Adierazi zuzen bidea edo direktorioa eskuz sortu.';
$string['datarootpermission'] = 'Datu-direktorioen baimena';
$string['datarootpublicerror'] = 'Zehaztutako \'Datu-direktoriora\' web bidez ailega daiteke, beste direktorio bat erabili behar duzu.';
$string['dbconnectionerror'] = 'Datu-basearekiko konexio-errorea. Mesedez, datu-basearen ezarpenak aztertu.';
$string['dbcreationerror'] = 'Errorea datu-basea sortzean. Ezin izan da datu-basea sortu emandako izen eta ezarpenekin';
$string['dbhost'] = 'Ostalariaren zerbitzaria';
$string['dbpass'] = 'Pasahitza';
$string['dbport'] = 'Ataka';
$string['dbprefix'] = 'Taulen aurrizkia';
$string['dbtype'] = 'Mota';
$string['directorysettings'] = '<p><b>Web helbidea:</b>
Moodle-ri non dagoen kokaturik esan behar diozu. Moodle instalatu den interneteko helbide osoa zehaztu. Zure webgunera URL ezberdinetatik sartzea badago, zure ikasleek normalean erabiliko dutena idatzi. Azken barra ez jarri.</p>
<p><b>Direktorioa:</b>
Kokapen honetarako bide osoa zehaztu.
Maiuskulak eta minuskulak ondo daudela ziurtatu.</p>
<p><b>Datu-direktorioa:</b>
Moodle-k igotako fitxategiak gordeko ditueneko tokia behar duzu. Direktorio horretan web zerbatzariko erabiltzaileek irakurri eta IDATZI ahal izango dute (normalean \'nobody\' edo \'apache\'), baina ez da komenigarria web-etik zuzenean sartu ahal izatea.</p>';
$string['directorysettingshead'] = 'Mesedez, baieztatu zure instalazioaren kokapenak';
$string['directorysettingssub'] = '<b>Web helbidea:</b>
Moodlera sartzeko web helbide osoa zehaztu.
Zure webgunera URL ezberdinetatik sartzea badago,
zure ikasleek normalean erabiliko dutena idatzi.
Azken barra ez jarri.
<br />
<br />
<b>Moodle-ren direktorioa:</b>
Kokapen honetarako bide osoa zehaztu.
Maiuskulak eta minuskulak ondo daudela ziurtatu.<br /><br />
<b>Datuen direktorioa:</b>
Moodle-k igotako fitxategiak gordeko ditueneko tokia behar duzu.
Direktorio horretan web zerbatzariko erabiltzaileek irakurri eta IDATZI ahal izango dute (normalean \'nobody\' edo \'apache\'),
baina ez da komenigarria webetik zuzenean sartu ahal izatea.';
$string['dirroot'] = 'Moodle direktorioa';
$string['dirrooterror'] = '\'Moodle-ren direktorioa\' zuzena ez dela dirudi. Ezin izan da Moodle-ren instalaziorik aurkitu. Jatorrizko balorea berrezarri da.';
$string['download'] = 'Jaitsi';
$string['downloadlanguagebutton'] = '"{$a}" hizkuntza-paketea jaitsi';
$string['downloadlanguagehead'] = 'Jaitsi hizkuntza-paketea';
$string['downloadlanguagenotneeded'] = 'Instalazio-prozesua lehenetsitako hizkuntzaz jarrai dezakezu, "{$a}".';
$string['downloadlanguagesub'] = 'Orain zure hizkuntza-paketea jaisteko eta hizkuntza horretan instalazioarekin jarraitzeko aukera daukazu.<br /><br />Jaitsiera eskuragarri ez balitz, prozesuak ingelesez jarraituko luke (instalazioa burututakoan, beste hizkuntzak jaitsi eta instalatu ahal izango dituzu).';
$string['doyouagree'] = 'Ados al zaude? (bai/ez):';
$string['environmenthead'] = 'Zure ingurunea egiaztatzen...';
$string['environmentsub'] = 'Zure zerbitzariaren osagai ezberdinak sistemaren betebeharrekin bat datozen egiaztatzen ari gara';
$string['errorsinenvironment'] = 'Kale egin du ingurunearen egiaztatzeak!';
$string['fail'] = 'Errorea';
$string['fileuploads'] = 'Fitxategien igoerak';
$string['fileuploadserror'] = 'Aktibatuta egon behar du';
$string['fileuploadshelp'] = '<p>Zure zerbitzarian fitxategien igoera ez dagoela aktibatuta dirudi.</p>

<p>Moodle oraindik instala daiteke, baina ezingo dituzu fitxategirik, ezta erabiltzaileen irudirik ere, ikastaroetara igo.</p>

<p>Fitxategien igoera ahalbidetzeko, zeuk (edo sistemaren administratzaileak) jatorrizko php.ini fitxategia editatu eta <b>file_uploads</b> ezarpena \'1\'ra aldatu behar duzu.</p>';
$string['inputdatadirectory'] = 'Datu-direktorioa:';
$string['inputwebadress'] = 'Web helbidea:';
$string['inputwebdirectory'] = 'Moodle direktorioa:';
$string['installation'] = 'Instalazioa';
$string['langdownloaderror'] = '"{$a}" hizkuntza ezin izan da instalatu. Instalazio-prozesuak ingelesez jarraituko du.';
$string['langdownloadok'] = '"{$a}" hizkuntza zuzen instalatu da. Instalazio-prozesuak hizkuntza horretan jarraituko du.';
$string['magicquotesruntime'] = 'Magic Quotes Run Time';
$string['magicquotesruntimeerror'] = 'Aktibatuta egon behar du';
$string['magicquotesruntimehelp'] = '<p>Magic quotes runtime desaktibatu behar da Moodle-k ondo funtzionatzeko.</p>

<p>Desaktibazioa lehenetsita egoten da... Zure php.ini fitxategiko <b>magic_quotes_runtime</b> ezarpena ikusi.</p>

<p>php.ini fitxategira sarbiderik ez baduzu, Moodle-ren direktorioaren barruko .htaccess izeneko fitxategian lerro hau idatzi beharko duzu:
<blockquote>php_value magic_quotes_runtime Off</blockquote>
</p>';
$string['memorylimit'] = 'Memoriaren muga';
$string['memorylimiterror'] = 'PHP memoriaren muga baxuegia da... Beranduago arazoak izan ditzakezu.';
$string['memorylimithelp'] = '<p>Zure zerbitzarian PHP memoria-muga {$a} da.</p>

<p>Aurrerago honek Moodle-ri arazoak sor diezaizkioke, bereziki modulu edo/eta erabiltzaile asko badituzu.</p>

<p>PHP muga altuenarekin konfiguratzea aholkatzen dizugu, ad. 40M.
Hori egiteko modu asko daude:</p>
<ol>
<li>Ahal baduzu, PHP <i>--enable-memory-limit</i>-ekin berriz konpilatu.
Horrek Moodle-k berak memoria-muga ezartzea ahalbidetzen du.</li>
<li>php.ini fitxategirako sarbidea baduzu,<b>memory_limit</b> ezarpena alda dezakezu
40Mra, adibidez. Sarbiderik ez baduzu, zure administratzaileari egin dezala eska diezaiokezu.</li>
<li>PHP zerbitzari batzuetan Moodle-ren direktorioan beheko lerro hau daukan .htaccess fitxategia sor dezakezu:
<p><blockquote>php_value memory_limit 40M</blockquote></p>
<p>Hala ere, zerbitzari batzuetan horrek PHP orri <b>GUZTIEK</b> ez funtzionatzea ekar dezake
(orriak ikustean erroreak ere ikusiko dituzu). Kasu horretan, .htaccess fitxategia ezabatu beharko duzu.</p></li>
</ol>';
$string['nativemssql'] = 'SQL*Server FreeTDS (native/mssql)';
$string['nativeoci'] = 'Oracle (native/oci)';
$string['nativepgsql'] = 'PostgreSQL (native/pgsql)';
$string['nativesqlsrv'] = 'SQL*Server Microsoft (native/sqlsrv)';
$string['pass'] = 'Zuzena';
$string['paths'] = 'Bideak';
$string['pathserrcreatedataroot'] = 'Instalatzaileak ezin du datu-direktorioa ({$a->dataroot}) sortu.';
$string['pathshead'] = 'Egiaztatu bideak';
$string['pathsrodataroot'] = 'Dataroot direktorioa ez da idazteko modukoa.';
$string['pathsroparentdataroot'] = 'Goragoko direktorioa ({$a->parent}) ez da idazteko modukoa. Instalatzaileak ezin du datu-direktorioa ({$a->dataroot}) sortu.';
$string['pathsunsecuredataroot'] = 'Dataroot-en kokapena ez da segurua';
$string['pathswrongadmindir'] = 'Kudeaketa direktorioa ez da existitzen';
$string['phpextension'] = '{$a} PHP luzapena';
$string['phpversion'] = 'PHP bertsioa';
$string['phpversionhelp'] = '<p>Moodle-k PHP 4.1.0 edo geroagoko bertsioa behar du.</p>
<p>Zure bertsioa: {$a}</p>
<p>PHP eguneratu edo PHP bertsio berriagoa duen zerbitzari batera jo</p>';
$string['releasenoteslink'] = 'Moodle-ren bertsio honi buruzko informazio gehiagorako, mesedez ikus itzazu Bertsio-oharrak hemen: {$a}';
$string['safemode'] = 'Modu segurua';
$string['safemodeerror'] = 'Moodle-k arazoak izan ditzake \'modu segurua\' ezarriz gero';
$string['safemodehelp'] = '<p>Moodle-k arazo ezberdinak izan ditzake \'modu segurua\' ezarriz gero, eta baliteke fitxategi berriak ezin sortu izana.</p>

<p>Normalean \'modu segurua\' web zerbitzari publiko paranoideek soilik aktibatzen dute. Hori dela eta, zure Moodle webgunerako beste enpresa bilatu beharko duzu.</p>

<p>Nahi izanez gero, zure instalazioarekin jarrai dezakezu, baina aurrerago arazoak izango dituzu.</p>';
$string['sessionautostart'] = 'Saioaren hasiera automatikoa';
$string['sessionautostarterror'] = 'Indargabetuta egon behar du';
$string['sessionautostarthelp'] = '<p>Moodle-k saioko laguntza behar du eta horren ezean ez du funtzionatuko.</p>

<p>Saioak php.ini fitxategian aktibatu behar dira session.auto_start parametroari dagokionez.</p>';
$string['upgradingqtypeplugin'] = 'Galdera/mota plugina eguneratzen';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Orri hau ikusten baduzu <strong>{$a->packname} {$a->packversion}</strong> paketea
    zure ordenadorean instalatu ahal izan duzu. Zorionak!';
$string['welcomep30'] = '<strong>{$a->installername}</strong>ren bertsio honek <strong>Moodle</strong>k
    zure ordenadorean funtzionatzeko behar diren aplikazioak dauzka,
    bereziki:';
$string['welcomep40'] = 'Paketeak ere zera dauka: <strong>Moodle {$a->moodlerelease} ({$a->moodleversion})</strong>.';
$string['welcomep50'] = 'Paketeko aplikazio guztien erabilpena dagozkien lizentziek
    arautzen dute. <strong>{$a->installername}</strong> aplikazioak
    <a href="http://www.opensource.org/docs/definition_plain.html">kode irekia</a> dauka eta
   <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a> lizentziapean banatzen da.';
$string['welcomep60'] = 'Datozen orriek urrats erraz batzuen bidez gidatuko zaituzte
   <strong>Moodle</strong> zure ordenadorean instalatu eta konfiguratzeko. Aholkatzen diren lehentsitako baloreak
   mantendu edo, nahi izanez gero, alda ditzakezu zure beharrei erantzun diezaieten.';
$string['welcomep70'] = '"Hurrengoa" botoia sakatu <strong>Moodle</strong>ren konfigurazioarekin jarraitzeko.';
$string['wwwroot'] = 'Web helbidea';
$string['wwwrooterror'] = '\'Web helbidea\' zuzena ez dela dirudi. Ezin izan da Moodle-ren instalazioa aurkitu. Jatorrizko balorea berrezarri da.';
