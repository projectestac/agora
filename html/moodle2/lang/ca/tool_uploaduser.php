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
 * Strings for component 'tool_uploaduser', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_uploaduser
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = 'Permet supressions';
$string['allowrenames'] = 'Permet canvis de nom';
$string['allowsuspends'] = 'Permet la suspensió i activació de comptes.';
$string['csvdelimiter'] = 'Delimitador CSV';
$string['defaultvalues'] = 'Valors per defecte';
$string['deleteerrors'] = 'Suprimeix errors';
$string['encoding'] = 'Codificació';
$string['errormnetadd'] = 'No es poden afegir usuaris remots';
$string['errors'] = 'Errors';
$string['nochanges'] = 'Sense canvis';
$string['pluginname'] = 'Càrrega d\'usuari';
$string['renameerrors'] = 'S\'han produït errors en els canvis de nom';
$string['requiredtemplate'] = 'Requerit. Podeu usar-hi la sintaxi de plantilles (%l = cognom, %f = nom, %u = nom d\'usuari). Per a més detalls i exemples consulteu l\'ajuda.';
$string['rowpreviewnum'] = 'Previsualització de files';
$string['uploadpicture_baduserfield'] = 'L\'atribut d\'usuari que heu especificat no és vàlid. Torneu a intentar-ho.';
$string['uploadpicture_cannotmovezip'] = 'No s\'ha pogut moure el fitxer zip al directori temporal.';
$string['uploadpicture_cannotprocessdir'] = 'No s\'han pogut processar els fitxers descomprimits.';
$string['uploadpicture_cannotsave'] = 'No s\'ha pogut desar la imatge de l\'usuari {$a}. Reviseu el fitxer original.';
$string['uploadpicture_cannotunzip'] = 'No es pot descomprimir el fitxer de les imatges';
$string['uploadpicture_invalidfilename'] = 'El nom del fitxer d\'imatge {$a} té caràcters no vàlids. Aquest fitxer s\'ha omès.';
$string['uploadpicture_overwrite'] = 'Voleu sobreescriure les imatges d\'usuari existents?';
$string['uploadpictures'] = 'Càrrega d\'imatges d\'usuaris';
$string['uploadpictures_help'] = 'Les imatges dels usuaris poden ser pujades en un fitxer zip d\'imatges.  Els fitxers d\'imatges es solen anomenar atribut-escollit-usuari.extensió , per exemple usuari1234.jpg per a l\'usuari amb nom d\'usuari usuari1234.';
$string['uploadpicture_userfield'] = 'Atribut d\'usuari utilitzat per aparellar les imatges:';
$string['uploadpicture_usernotfound'] = 'No existeix l\'usuari amb camp \'{$a->userfield}\' igual a \'{$a->uservalue}\'. Aquest usuari s\'ha omès.';
$string['uploadpicture_userskipped'] = 'S\'ha omès l\'usuari {$a} (ja té una imatge).';
$string['uploadpicture_userupdated'] = 'S\'ha actualitzat la imatge de l\'usuari {$a}.';
$string['uploadusers'] = 'Carrega usuaris';
$string['uploadusers_help'] = '<p>En primer lloc, fixeu-vos que <strong>generalment no &eacute;s necessari importar usuaris en massa</strong>. Si voleu minorar les tasques de manteniment abans haur&iacute;eu d\'explorar les formes d\'autenticaci&oacute; que no requereixen un manteniment manual, per exemple la connexi&oacute; amb bases de dades externes o la possibilitat que els usuaris cre&iuml;n els seus comptes. Vg. la secci&oacute; d\'Autenticaci&oacute; dels men&uacute;s d\'administraci&oacute;.</p>

<p>Si esteu segur que voleu importar molts comptes d\'usuari des d\'un fitxer de text, aleshores heu de formatar aix&iacute; el fitxer:</p>

<ul>
  <li>Cada l&iacute;nia del fitxer cont&eacute; un registre.</li>
  <li>Cada registre &eacute;s una seq&uuml;&egrave;ncia de dades separades per comes.</li>
  <li>El primer registre del fitxer &eacute;s especial i cont&eacute; la llista de noms dels camps. Aix&ograve; defineix el format de la resta del fitxer.
    <blockquote>
      <p><strong>Noms de camps necessaris:</strong> aquests camps s\'han d\'incloure al primer registre i han d\'estar definits per a cada usuari</p>
      <p></p>
      <font color="#990000" face="Courier New, Courier, mono">username, password, firstname, lastname, email</font></p>
</p>
      <p><strong>Noms de camps per defecte:</strong> aquests s&oacute;n opcionals - si no s&oacute;n inclosos, aleshores s\'agafen del perfil de l\'administrador principal</p>
      <p><font color="#990000" face="Courier New, Courier, mono">institution, department, city, country, lang, timezone</font> </p>
      <p><strong>Noms de camps opcionals: </strong>tots aquests s&oacute;n completament opcionals. Els noms dels cursos s&oacute;n els &quot;noms curts&quot; dels cursos - si s\'inclouen, aleshores l\'usuari &eacute;s inscrit com a estudiant en aquests cursos. Els noms de grups s\'han d\'associar als cursos corresponents, p. e. group1 a course1, etc.</p>
      <p> <font color="#990000" face="Courier New, Courier, mono">idnumber, icq, phone1, phone2, address, url, description, mailformat, maildisplay, htmleditor, autosubscribe, course1, course2, course3, course4, course5, group1, group2, group3, group4, group5</font></p>
    </blockquote>
    </li>
  <li>Les comes dins de les dades s\'han de codificar com &amp;#44. El programa far&agrave; autom&agrave;ticament la descodificaci&oacute;. </li>
  <li>En els camps booleans, feu servir 0 per a fals i 1 per a vertader.</li>
  <li>Nota: si un usuari ja est&agrave; registrat en la base de dades d\'usuaris de Moodle, aquest programa torna el n&uacute;mero userid de l\'usuari (l\'&iacute;ndex de la base de dades) i l\'inscriu com a estudiant en els cursos especificats SENSE actualitzar les altres dades.</li>
</ul>


<p>Heus ac&iacute; un exemple d\'un fitxer d\'importaci&oacute; v&agrave;lid:</p>
<p><font size="-1" face="Courier New, Courier, mono">username, password, firstname, lastname, email, lang, idnumber, maildisplay, course1, group1<br />
jonest, verysecret, Tom, Jones, jonest@someplace.edu, en, 3663737, 1, Intro101, Section 1<br />
reznort, somesecret, Trent, Reznor, reznort@someplace.edu, en_us, 6736733, 0, Advanced202, Section 3</font></p>';
$string['uploaduserspreview'] = 'Previsualització de la càrrega d\'usuaris';
$string['uploadusersresult'] = 'Resultats de la càrrega d\'usuaris';
$string['useraccountupdated'] = 'S\'ha actualitzat l\'usuari';
$string['useraccountuptodate'] = 'Usuari actualitzat';
$string['userdeleted'] = 'S\'ha suprimit l\'usuari';
$string['userrenamed'] = 'S\'ha canviat el nom de l\'usuari';
$string['userscreated'] = 'S\'han creat els usuaris';
$string['usersdeleted'] = 'S\'han suprimit els usuaris';
$string['usersrenamed'] = 'S\'han canviat els noms dels usuaris';
$string['usersskipped'] = 'S\'han omès els usuaris';
$string['usersupdated'] = 'S\'han actualitzat els usuaris';
$string['usersweakpassword'] = 'Usuaris que tenen uns contrasenya dèbil';
$string['uubulk'] = 'Selecció per a operacions en bloc';
$string['uubulkall'] = 'Tots els usuaris';
$string['uubulknew'] = 'Usuaris nous';
$string['uubulkupdated'] = 'Usuaris actualitzats';
$string['uucsvline'] = 'Línia CSV';
$string['uulegacy1role'] = '(Estudiant original) typeN=1';
$string['uulegacy2role'] = '(Professor original) typeN=2';
$string['uulegacy3role'] = '(Professor sense drets d\'edició original) typeN=3';
$string['uunoemailduplicates'] = 'Evita adreces de correu duplicades';
$string['uuoptype'] = 'Tipus de càrrega';
$string['uuoptype_addinc'] = 'Afegeix tots els usuaris, afegeix si escau un comptador al nom d\'usuari';
$string['uuoptype_addnew'] = 'Afegeix només usuaris nous, omet els ja existents';
$string['uuoptype_addupdate'] = 'Afegeix usuaris nous i actualitza els ja existents';
$string['uuoptype_update'] = 'Només actualiza els usuaris ja existents';
$string['uupasswordcron'] = 'Generat en cron';
$string['uupasswordnew'] = 'Nova contrasenya d\'usuari';
$string['uupasswordold'] = 'Contrasenya d\'usuari existent';
$string['uustandardusernames'] = 'Estandarditza els noms d\'usuari';
$string['uuupdateall'] = 'Sobreescriu amb el fitxer i els valors predeterminats';
$string['uuupdatefromfile'] = 'Sobreescriu amb el fitxer';
$string['uuupdatemissing'] = 'Omple els buits amb el fitxer i els valors predeterminats';
$string['uuupdatetype'] = 'Detalls de l\'usuari existent';
$string['uuusernametemplate'] = 'Plantilla de noms d\'usuari';
