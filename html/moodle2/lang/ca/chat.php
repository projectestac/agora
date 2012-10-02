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
 * Strings for component 'chat', language 'ca', branch 'MOODLE_23_STABLE'
 *
 * @package   chat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['ajax'] = 'Versió Ajax';
$string['autoscroll'] = 'Desplaçament automàtic';
$string['beep'] = 'bip';
$string['cantlogin'] = 'No s\'ha pogut entrar a la sala de xat';
$string['chat:addinstance'] = 'Afegeix un xat nou';
$string['chat:chat'] = 'Parlar en un xat';
$string['chat:deletelog'] = 'Suprimir registres de xat';
$string['chat:exportparticipatedsession'] = 'Exporta la sessió del xat en la qual heu intervingut.';
$string['chat:exportsession'] = 'Exporta qualsevol sessió de xat';
$string['chatintro'] = 'Text de presentació';
$string['chatname'] = 'Nom d\'aquesta sala de xat';
$string['chat:readlog'] = 'Llegir registres de xat';
$string['chatreport'] = 'Sessions de xat';
$string['chat:talk'] = 'Participar en un xat';
$string['chattime'] = 'Proper dia i hora de xat';
$string['configmethod'] = 'El mètode normal de xat implica que els clients contactin regularment el servidor en cerca d\'actualitzacions. No necessita cap configuració i funciona enlloc, però pot crear una càrrega gran al servidor si s\'apleguen molts usuaris. Utilitzar un dimoni servidor requereix accés a l\'intèrpret d\'ordres d\'Unix, però comporta un entorn de xat ràpid i escalable.';
$string['confignormalupdatemode'] = 'El refresc de la sala de xat se sol realitzar d\'una manera prou eficient per mitjà de la característica <em>Keep-Alive</em> de l\'HTTP 1.1, però això és bastant pesat per al servidor. Un mètode més avançat consisteix a utilitzar l\'estratègia <em>Corrent de dades</em> per enviar les actualitzacions als usuaris. L\'estratègia <em>Corrent de dades</em> és més escalable (similar al mètode chatd) però no funciona en tots els servidors.';
$string['configoldping'] = 'Després de quant temps d\'estar en silenci cal considerar que un usuari ha marxat?';
$string['configrefreshroom'] = 'Freqüència de refresc de la sala de xat (en segons). Posar aquest valor massa baix farà que la sala sembli més ràpida, però pot carregar excessivament el servidor quan hi ha molt gent xerrant.';
$string['configrefreshuserlist'] = 'Freqüència de refresc de la llista d\'usuaris (en segons)';
$string['configserverhost'] = 'El nom de l\'ordinador on hi ha el dimoni servidor';
$string['configserverip'] = 'L\'adreça IP numèrica corresponent al mateix ordinador';
$string['configservermax'] = 'Nombre màxim de clients permesos';
$string['configserverport'] = 'Número del port que pot utilitzar el dimoni';
$string['currentchats'] = 'Sessions de xat actives';
$string['currentusers'] = 'Usuaris actuals';
$string['deletesession'] = 'Suprimeix aquesta sessió';
$string['deletesessionsure'] = 'Esteu segur que voleu suprimir aquesta sessió?';
$string['donotusechattime'] = 'No publiquis el dia i hora dels xats';
$string['enterchat'] = 'Feu clic aquí per entrar al xat';
$string['errornousers'] = 'No s\'ha pogut trobar cap usuari!';
$string['explaingeneralconfig'] = 'Aquests paràmetres són efectius <strong>sempre</strong>';
$string['explainmethoddaemon'] = 'Aquests paràmetres <strong>només</strong> compten si heu seleccionat "Dimoni servidor de chat" en chat_method';
$string['explainmethodnormal'] = 'Aquests paràmetres <strong>només</strong> compten si heu seleccionat "Mètode normal" en chat_method';
$string['generalconfig'] = 'Configuració normal';
$string['idle'] = 'Inactiu';
$string['inputarea'] = 'Àrea d\'entrada de text';
$string['invalidid'] = 'No s\'ha pogut trobar aquesta sala de xat';
$string['list_all_sessions'] = 'Llista totes les sessions';
$string['list_complete_sessions'] = 'Mostra només la llista de les sessions completes.';
$string['listing_all_sessions'] = 'S\'està mostrant la llista de totes les sessions.';
$string['messagebeepseveryone'] = '{$a} ha fet bip a tothom!';
$string['messagebeepsyou'] = '{$a} t\'acaba de fer bip!';
$string['messageenter'] = '{$a} acaba d\'entrar en aquest xat';
$string['messageexit'] = '{$a} ha abandonat aquest xat';
$string['messages'] = 'Missatges';
$string['messageyoubeep'] = 'Heu fet un toc a {$a}';
$string['method'] = 'Mètode de xat';
$string['methodajax'] = 'Mètode Ajax';
$string['methoddaemon'] = 'Dimoni servidor de xat';
$string['methodnormal'] = 'Mètode normal';
$string['modulename'] = 'Xat';
$string['modulename_help'] = 'El mòdul de xat permet que els participants mantinguin una conversa sincrònica en temps real a través del web. Aquesta és una manera útil de tenir un major coneixement dels altres i el tema en debat - la manera de
de la utilització d\'una sala de xat és bastant diferent dels fòrums asíncrons.';
$string['modulenameplural'] = 'Xats';
$string['neverdeletemessages'] = 'No suprimeixis mai els missatges';
$string['nextsession'] = 'Propera sessió programada';
$string['nochat'] = 'No es troba el xat';
$string['no_complete_sessions_found'] = 'No s\'han trobat sessions completades.';
$string['noguests'] = 'El xat no està obert a visitants';
$string['nomessages'] = 'No hi ha missatges encara';
$string['nopermissiontoseethechatlog'] = 'No teniu permisos per veure el registre de xats.';
$string['normalkeepalive'] = 'Keep-Alive';
$string['normalstream'] = 'Corrent de dades';
$string['noscheduledsession'] = 'No hi ha cap sessió programada';
$string['notallowenter'] = 'No teniu permesa l\'entrada a la sala de xat.';
$string['notlogged'] = 'No heu entrat';
$string['oldping'] = 'Temps límit de desconnexió';
$string['page-mod-chat-x'] = 'Qualsevol pàgina del mòdul de xat';
$string['pastchats'] = 'Sessions de xat anteriors';
$string['pluginadministration'] = 'Administració del xat';
$string['pluginname'] = 'Xat';
$string['refreshroom'] = 'Refresca la cambra';
$string['refreshuserlist'] = 'Refresca la llista d\'usuaris';
$string['removemessages'] = 'Suprimeix tots els missatges';
$string['repeatdaily'] = 'A la mateixa hora cada dia';
$string['repeatnone'] = 'No es repeteix - publica només la data i hora especificades';
$string['repeattimes'] = 'Repeteix sessions';
$string['repeatweekly'] = 'El mateix dia a la mateixa hora cada setmana';
$string['saidto'] = 'dit a';
$string['savemessages'] = 'Desa les sessions anteriors';
$string['seesession'] = 'Visualitza aquesta sessió';
$string['send'] = 'Envia';
$string['sending'] = 'S\'està enviant';
$string['serverhost'] = 'Nom del servidor';
$string['serverip'] = 'Adreça IP del servidor';
$string['servermax'] = 'Nombre màxim d\'usuaris';
$string['serverport'] = 'Port del servidor';
$string['sessions'] = 'Sessions de xat';
$string['sessionstart'] = 'La sessió de xat començarà en: {$a}';
$string['strftimemessage'] = '%H:%M';
$string['studentseereports'] = 'Tothom pot veure les sessions anteriors';
$string['studentseereports_help'] = 'Si es configura en No, només els usuaris amb la capacitat mod/chat:readlog poden veure els registres del xat';
$string['talk'] = 'Parla';
$string['updatemethod'] = 'Mètode d\'actualització';
$string['updaterate'] = 'Freqüència d\'actualització:';
$string['userlist'] = 'Llista d\'usuaris/àries';
$string['usingchat'] = 'Ús del xat';
$string['usingchat_help'] = '<p>El m&ograve;dul de xat t&eacute; algunes caracter&iacute;stiques que fan m&eacute;s una mica m&eacute;s agradables les tert&uacute;lies.</p>

<dl>

  <dt><b>Emoticones</b></dt>

  <dd>Totes les emoticones que es poden teclejar en altres parts de Moodle tamb&eacute; es poden teclejar als xats i es visualitzaran correctament. Per exemple: :-) = <img alt="" src="pix/s/smiley.gif" />

  </dd>


  <dt><b>Enlla&ccedil;os</b></dt>

  <dd>Les adreces d\'Internet es transformen autom&agrave;ticament en enlla&ccedil;os.</dd>

  <dt><b>Emocions</b></dt>

  <dd>Podeu comen&ccedil;ar una l&iacute;nia amb "/me" o":" per expressar emocions. Per exemple, si el vostre nom &eacute;s Joan i escriviu ":riu!" o"/me riu!" aleshores tothom veur&agrave; "Joan riu!"</dd>

  <dt><b>Bips</b></dt>

  <dd>Podeu enviar un so a una altra persona prement l\'enlla&ccedil; "bip" del costat del seu nom. Una drecera &uacute;til per fer bip a tothom alhora &eacute;s escriure "beep all".</dd>

<dt><b>HTML</b></dt>

  <dd>Si sabeu una mica de codi HTML, el podeu utilitzar per fer coses com ara inserir imatges en el text, fer sons o crear text de diverses mides i colors.</dd>

</dl>';
$string['viewreport'] = 'Visualitza les sessions de xat anteriors';
