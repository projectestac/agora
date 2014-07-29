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
 * Strings for component 'simplecertificate', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   simplecertificate
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allusers'] = 'Tots els usuaris';
$string['awardedto'] = 'Concedit a';
$string['bulkaction'] = 'Tria una acció en bloc';
$string['bulkbuttonlabel'] = 'Envia';
$string['bulkview'] = 'Accions en bloc';
$string['cantdeleteissue'] = 'S\'ha produït un error en eliminar els certificats emesos';
$string['cantissue'] = 'El certificat no es pot emetre, perquè l\'usuari no ha assolit els objectius del curs';
$string['certificateimage'] = 'Imatge per al certificat';
$string['certificateimage_help'] = 'Aquesta és la imatge que es farà servir en el certificat';
$string['certificatename'] = 'Nom del certificat';
$string['certificatename_help'] = 'Nom del certificat';
$string['certificatetext'] = 'Text del certificat';
$string['certificatetext_help'] = 'Aquest és el text que s\'utilitzarà en el dors del certificat; algunes paraules especials seran substituïdes per variables com el nom del curs, el nom de l\'estudiant, grau ...
Aquests són:

{USERNAME} -> Nom d\'usuari complet
{COURSENAME} -> Nom llarg del curs (o un nom alternatiu definit)
{GRADE} -> Qualificació
{DATA} -> Data
{OUTCOME} -> Competències {HOURS} -> Hores definides al curs
{TEACHERS} ->Llista de Professors
{IDNUMBER} -> ID del usuari
{FIRSTNAME} -> Nom d\'usuari {LASTNAME} -> Cognom de l\'usuari
{EMAIL} -> Correu electrònic de l\'usuari
Altres camps del perfil:
{ICQ} -> ICQ de l\'usuari
{SKYPE} -> Núm. Skype de l\'usuari
{YAHOO} -> Yahoo messenger ID de l\'usuari
{AIM} -> AIM ID de l\'usuari
{MSN} -> MSN ID de l\'usuari
{PHONE1} -> 1r. No. de telèfon de l\'usuari
{PHONE2} -> 2n. No. de telèfon de l\'usuari
{INSTITUTION} -> Institució de l\'usuari
{DEPARTMENT} -> Departament de l\'usuari
{ADDRESS} -> Adreça de l\'usuari
{CITY} -> Ciutat de l\'usuari
{COUNTRY} -> País de l\'usuari
{URL} -> Pàgina personal de l\'usuari
{PROFILE_xxxx} -> Camps del perfil d\'usuari.

Per utilitzar camps personalitzats del perfil heu d\'emprar el prefix «PROFILE_»; per exemple, si heu creat un camp personalitzat al perfil amb el nom curt d\'«ANIVERSARI», la marca textual que heu d\'emprar al certificat és {PROFILE_ANIVERSARI}.
El text pot emprar HTML bàsic, fonts bàsiques, taules, però eviteu qualsevol definició de posició.';
$string['certificatetextx'] = 'Posició horitzontal del text del certificat';
$string['certificatetexty'] = 'Posició vertical del text del certificat';
$string['certificateverification'] = 'Verificació del certificat';
$string['certlifetime'] = 'Mantenir els certificats emesos durant: (en mesos)';
$string['certlifetime_help'] = 'Especifica la longitud de temps que vol mantenir els certificats emesos. Els certificats emesos que superin aquest temps, s\'esborren automàticament.';
$string['code'] = 'Codi';
$string['codex'] = 'Posició horitzontal del codi QR';
$string['codey'] = 'Posició vertical del codi QR';
$string['completedusers'] = 'Usuaris que compleixin els objectius del curs';
$string['completiondate'] = 'Compleció del curs';
$string['coursegrade'] = 'Qualificació del curs';
$string['coursename'] = 'Nom del curs alternatiu';
$string['coursename_help'] = 'Assigna un nom alternatiu al curs';
$string['coursetimereq'] = 'Minuts requerits en el curs';
$string['coursetimereq_help'] = 'Indiqueu-hi la quantitat mínima de temps, en minuts, que l\'estudiant ha de passar registrat en el curs abans que pugui rebre el certificat.';
$string['datefmt'] = 'Format de data';
$string['datefmt_help'] = 'Introduïu un patró de format de data PHP vàlid (http://www.php.net/manual/en/function.strftime.php). O bé, deixeu-lo en blanc per utilitzar el format definit en l\'idioma escollit per l\'usuari.';
$string['defaultcertificatetextx'] = 'Posició horitzontal del text per defecte';
$string['defaultcertificatetexty'] = 'Posició vertical del text per defecte';
$string['defaultcodex'] = 'Posició horitzontal del codi QR per defecte';
$string['defaultcodey'] = 'Posició vertical del codi QR per defecte';
$string['defaultheight'] = 'Alçada per defecte';
$string['defaultperpage'] = 'Per pàgina';
$string['defaultperpage_help'] = 'Nombre de certificats mostrats per pàgina (màxim 200)';
$string['defaultwidth'] = 'Amplada per defecte';
$string['deletissuedcertificates'] = 'Certificats emesos eliminats';
$string['delivery'] = 'Lliurament';
$string['delivery_help'] = 'Trieu com voleu que els estudiants obtinguin el seu certificat.
Obrir al navegador: Obre el certificat en una nova finestra del navegador.
Força la descàrrega: Obre la finestra de descàrrega d\'arxius del navegador.
Correu electrònic: Si escolliu aquesta opció envia el certificat a l\'estudiant com un arxiu adjunt de correu electrònic. Quan un usuari rep el seu certificat, si clica damunt l\'enllaç de certificat de la pàgina principal del curs, veurà la data en què va rebre el seu certificat i podrà revisar el certificat rebut.';
$string['designoptions'] = 'Opcions de disseny';
$string['download'] = 'Imposa que es baixi';
$string['emailcertificate'] = 'Correu electrònic';
$string['emailfrom'] = 'Nom del remitent del correu electrònic';
$string['emailfrom_help'] = 'Nom alternatiu del remitent del correu electrònic';
$string['emailothers'] = 'Enviar a altres correus electrònics';
$string['emailothers_help'] = 'Introduïu les adreces de correu electrònic aquí, separades per una coma, dels qui han de ser alertats amb un correu electrònic cada vegada que els estudiants reben un certificat.';
$string['emailsent'] = 'S\'han enviat els correus electrònics';
$string['emailstudentsubject'] = 'El vostre certificat pel curs {$a->course}';
$string['emailstudenttext'] = 'Hola {$a->username},

		Trobareu adjunt el vostre certificat del curs {$a->course}.

AQUEST ÉS UN MISSATGE AUTOMÀTIC - SI US PLAU NO EL RESPONGUEU';
$string['emailteachermail'] = 'L\'usuari {$a->student} ha rebut el seu certificat: «{$a->certificate}» del curs {$a->course}.

Podeu consultar-lo aquí:

{$a->url}';
$string['emailteachermailhtml'] = 'L\'usuari {$a->student} ha rebut el seu certificat: «<i>{$a->certificate}</i>» del curs {$a->course}.

Podeu consultar-lo aquí:

    <a href="{$a->url}">Informe del certificat</a>.';
$string['emailteachers'] = 'Envia correus electrònics als professors';
$string['emailteachers_help'] = 'Si està habilitat, llavors els professors rebran una notificació cada vegada que un estudiant rebi un certificat.';
$string['enablesecondpage'] = 'Habilita la pàgina del dors del certificat';
$string['enablesecondpage_help'] = 'Habilita l\'edició del dors del certificat. Si es deshabilita, al dors només s\'imprimirà el codi QR (si aquest s\'ha de mostrar)';
$string['filenotfound'] = 'Fitxer no trobat: {$a}';
$string['getcertificate'] = 'Obtenir certificat';
$string['grade'] = 'Qualificació';
$string['gradefmt'] = 'Format de la qualificació';
$string['gradefmt_help'] = 'Hi ha tres formats disponibles, si decideix que ha d\'aparèixer al certificat:

Percentatge: Apareix com a percentatge
Punts: Apareix el valor numèric de la qualificació
Lletres: Apareix com a lletres (definides al qualificador)';
$string['gradeletter'] = 'Lletres';
$string['gradepercent'] = 'Percentatge';
$string['gradepoints'] = 'Punts';
$string['height'] = 'Alçada del certificat';
$string['hours'] = 'hores';
$string['intro'] = 'Introducció';
$string['invalidcode'] = 'Codi de certificat no vàlid';
$string['issued'] = 'Emès';
$string['issueddate'] = 'Data d\'emisió';
$string['issueddownload'] = 'Certificat emès [id: {$a}] descarregat';
$string['issuedview'] = 'Certificats emesos';
$string['issueoptions'] = 'Opcions d\'emisió';
$string['keywords'] = 'certificat, curs, pdf, moodle';
$string['modulename'] = 'Certificat simple';
$string['modulenameplural'] = 'Certificats simples';
$string['multipdf'] = 'Descarrega els certificats en un arxiu zip';
$string['neverdeleteoption'] = 'No esborrar mai';
$string['nocertificatesissued'] = 'No hi ha certificats emesos';
$string['nodelivering'] = 'No enviar, l\'usuari rebrà aquest certificat per altres vies.';
$string['onepdf'] = 'Descarrega els certificats en un sol fitxer pdf';
$string['openbrowser'] = 'Obre en una nova finestra';
$string['opendownload'] = 'Feu clic al botó de sota per a desar el vostre certificat al teu ordinador.';
$string['openemail'] = 'Feu clic al botó de sota per a enviar el certificat al vostre correu electrònic com a adjunt.';
$string['openwindow'] = 'Feu clic al botó de sota per obrir el vostre certificat en una nova finestra del navegador';
$string['pluginadministration'] = 'Gestió de certificats';
$string['pluginname'] = 'Certificat simple';
$string['printdate'] = 'Imprimir data';
$string['printdate_help'] = 'Aquesta és la data que s\'imprimirà, si s\'ha triat una data d\'impressió.
Si es selecciona la data de la finalització del curs, però l\'estudiant no ha completat el curs, s\'imprimirà en el seu defecte la data de recepció del certificat.
També podeu optar per imprimir la data en funció de quan es va qualificar una activitat. Si s\'emet un certificat abans que es qualifica l\'activitat, s\'imprimirà en el seu defecte, la data de recepció del certificat.';
$string['printgrade'] = 'Imprimir qualificació';
$string['printgrade_help'] = 'Podeu triar qualsevol element de qualificació del llibre de qualificacions.
Els elements de qualificació s\'enumeren en l\'ordre en què apareixen en el llibre de qualificacions. Trieu el format de la nota a continuació.';
$string['printoutcome'] = 'Imprimir competència';
$string['printoutcome_help'] = 'Podeu triar qualsevol competència de curs, i apareixerà si s\'ha assolit o no.';
$string['printqrcode'] = 'Imprimir codi QR del certificat';
$string['printqrcode_help'] = 'Imprimir (o no) el codi identificador del certificat, com  a codi QR';
$string['qrcodefirstpage'] = 'Imprimir el codi QR en la primera pàgina';
$string['qrcodefirstpage_help'] = 'Imprimeix el codi QR en la primera pàgina';
$string['qrcodeposition'] = 'Posició del codi QR';
$string['qrcodeposition_help'] = 'Especifica les coordenades XY (en mil·límetres) on s\'imprimirà el codi QR';
$string['receiveddate'] = 'Data de recepció';
$string['report'] = 'Informe';
$string['requiredtimenotmet'] = 'Cal que estigueu com a mínim {$a->requiredtime} minuts en el curs per emetre aquest certificat';
$string['secondimage'] = 'Imatge del dors del certificat';
$string['secondimage_help'] = 'Aquesta imatge es farà servir al dors del certificat';
$string['secondpageoptions'] = 'Dors (revers) del certificat';
$string['secondpagetext'] = 'Text del dors del certificat';
$string['secondpagex'] = 'Posició horitzontal del text del dors';
$string['secondpagey'] = 'Posició vertical del text del dors';
$string['secondtextposition'] = 'Posició del text del dors';
$string['secondtextposition_help'] = 'Especifica les coordenades XY (en mil·límetres) on s\'imprimirà el text de fons';
$string['sendtoemail'] = 'Envia al correu electrònic de l\'usuari';
$string['showusers'] = 'Mostra';
$string['size'] = 'Mida del certificat';
$string['size_help'] = 'Especifica l\'amplada i l\'alçada (en mil·límetres) del certificat. La mida per defecte és un A4 apaïsat.';
$string['standardview'] = 'Emet un certificat de mostra';
$string['summaryofattempts'] = 'Resum dels certificats emesos prèviament';
$string['textposition'] = 'Posició del text del certificat';
$string['textposition_help'] = 'Especifica les coordenades XY (en mil·límetres) on s\'imprimirà el text del certificat';
$string['userdateformat'] = 'Feu servir el format de data de l\'idioma.';
$string['variablesoptions'] = 'Altres opcions';
$string['verifycertificate'] = 'Verifiqueu el certificat';
$string['viewcertificateviews'] = 'Veure els {$a} certificats emesos';
$string['width'] = 'Amplada del certificat';
