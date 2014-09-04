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
 * Strings for component 'dialogue', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   dialogue
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Accions';
$string['attachment'] = 'Adjunt';
$string['attachments'] = 'Adjunts';
$string['bulkopener'] = 'Obertura massiva';
$string['bulkopenrule'] = 'Regla d\'obertura massiva';
$string['bulkopenrulenotifymessage'] = '<strong>Nota:</strong> <br/> Quan s\'utilitza una regla d\'obertura massiva, les converses no s\'obren immediatament. Aquestes s\'obriran quan s\'executei la funció cron del sistema, normalment cada 30 minuts.';
$string['bulkopenrules'] = 'Regles d\'obertura massiva';
$string['cachedef_params'] = 'Paràmetres- Interfície d\'usuari';
$string['cachedef_participants'] = 'Ids de participants (informació bàsica)';
$string['cachedef_unreadcounts'] = 'Comptador de missatges sense llegir dels usuaris';
$string['cachedef_userdetails'] = 'Breus detalls dels usuaris, tots els usuaris inscrits';
$string['cannotclosedraftconversation'] = 'No es pot tancar una conversa que no ha començat!';
$string['cannotdeleteopenconversation'] = 'No pots esborrar una conversa oberta';
$string['closeconversation'] = 'Tancar conversa';
$string['closed'] = 'Tancat';
$string['completed'] = 'Completat';
$string['configmaxattachments'] = 'Nombre d\'adjunts permesos per defecte per missatge.';
$string['configmaxbytes'] = 'Mida màxima per defecte per a tots els adjunts de diàlegs al lloc (tenint en compte els límits de curs i altres configuracions locals)';
$string['configtrackunread'] = 'Fer el seguiment dels missatges no llegits a la pàgina principal del curs';
$string['configviewconversationsbyrole'] = 'Experimental: Veure converses per rol, ordenar el llistat de converses per el rol de l\'autor';
$string['configviewstudentconversations'] = 'Experimental: llistat d\'estudiants amb les converses en que han participat';
$string['conversationcloseconfirm'] = 'Segur que vols tancar la conversa {$a}?';
$string['conversationclosed'] = 'La conversa {$a} ha sigut tancada';
$string['conversationdeleteconfirm'] = 'Estàs segur de que vols esborrar la conversa {$a}? (aquesta acció no es pot desfer)';
$string['conversationdeleted'] = 'La conversa {$a} ha sigut esborrada';
$string['conversationdiscarded'] = 'La conversa ha sigut descartada';
$string['conversationlistdisplayheader'] = 'Mostrant {$a->show} {$a->state} converses {$a->groupname}';
$string['conversationopened'] = 'La conversa ha sigut oberta';
$string['conversationopenedcron'] = 'Les converses s\'obriran automàticament';
$string['conversationopenedwith'] = '<strong>1</strong> conversa oberta amb:';
$string['conversations'] = 'Converses';
$string['conversationsopenedwith'] = '<string>{$a}</strong> converses obertes amb:';
$string['cutoffdate'] = 'Data límit';
$string['datefullyear'] = '{$a->datefull}<small>{{$a->time}}</small>';
$string['dateshortyear'] = '{$a->dateshort}<small>({$a->time})</small>';
$string['deleteconversation'] = 'Esborrar conversa';
$string['deletereply'] = 'Esborrar contestació';
$string['dialogue:addinstance'] = 'Afegir un diàleg';
$string['dialogue:bulkopenrulecreate'] = 'Crear una regla d\'obertura massiva';
$string['dialogue:bulkopenruleeditany'] = 'Permiteix a l\'usuari editar qualsevol regla, útil per a administradors, etc';
$string['dialogue:close'] = 'Tancar una conversa';
$string['dialogue:closeany'] = 'Tancar qualsevol';
$string['dialogue:delete'] = 'Esborrar els propis';
$string['dialogue:deleteany'] = 'Esborrar qualsevol';
$string['dialogueintro'] = 'Descripció';
$string['dialoguename'] = 'Nom del diàleg';
$string['dialogue:open'] = 'Obrir una conversa';
$string['dialogue:receive'] = 'Rebre, qui pot ser el destinatari quan obrim una conversa';
$string['dialogue:reply'] = 'Contestar';
$string['dialogue:replyany'] = 'Contestar a qualsevol';
$string['dialogueupgradehelper'] = 'Eina d\'actualització de diàlegs';
$string['dialogue:viewany'] = 'Vore qualsevol';
$string['dialogue:viewbyrole'] = 'Vore llistat de converses per rol, experimental';
$string['displaybystudent'] = 'Mostrar per estudiant';
$string['displayconversationsheading'] = 'Mostrant {$a} converses';
$string['displaying'] = 'Mostrant';
$string['draft'] = 'Esborrany';
$string['draftlistdisplayheader'] = 'Mostrant els meus esborranys';
$string['drafts'] = 'Esborranys';
$string['errorcutoffdateinpast'] = 'La data límit no es pot establir en el passat';
$string['erroremptymessage'] = 'El missatge no pot estar buit';
$string['erroremptysubject'] = 'L\'assumpte no pot estar buit';
$string['errornoparticipant'] = 'Has d\'obrir un diàleg amb algú...';
$string['everybody'] = 'Tothom (lliure per a tots)';
$string['everyone'] = 'Tothom';
$string['firstname'] = 'Nom';
$string['fullname'] = 'Nom complet';
$string['groupmodenotifymessage'] = 'Aquesta activitat s\'ha configurat per a usar grups. Això afectarà a qui pot iniciar una conversa i quines converses es mostren.';
$string['hasnotrun'] = 'No s\'ha executat encara';
$string['includefuturemembers'] = 'Inclou membres futurs';
$string['ingroup'] = 'En grup {$a}';
$string['lastname'] = 'Cognoms';
$string['lastranon'] = 'Última vegada executat';
$string['latest'] = 'Últimes';
$string['listpaginationheader'] = '{$a->start}-{$a->end} de {$a->total}';
$string['matchingpeople'] = 'Persones coincidents ({$a})';
$string['maxattachments'] = 'Nombre màxim d\'adjunts';
$string['maxattachments_help'] = 'Aquests paràmetres indiquen el nombre màxim de fitxers que es poden adjuntar a un missatge del diàleg.';
$string['maxattachmentsize'] = 'Mida màxima d\'adjunt';
$string['maxattachmentsize_help'] = 'Indica la mida màxima de fitxer que pot ser adjuntat a un missatge del diàleg.';
$string['message'] = 'Missatge';
$string['messageprovider:post'] = 'Notificacions del diàleg';
$string['messages'] = 'missatges';
$string['mine'] = 'Meus';
$string['modulename'] = 'Diàleg';
$string['modulename_help'] = 'Els Diàlegs permeten a l\'estudiantat i professorat iniciar diàlegs amb una altra persona de manera privada.';
$string['modulenameplural'] = 'Diàlegs';
$string['nobulkrulesfound'] = 'No s\'han trobat regles d\'obertura massiva';
$string['noconversationsfound'] = 'No s\'han trobat converses';
$string['nodraftsfound'] = 'No s\'han trobat esborranys';
$string['nomatchingpeople'] = 'Cap persona amb \'{$a}';
$string['nopermissiontoclose'] = 'No tens permís per a tancar aquesta conversa';
$string['nopermissiontodelete'] = 'No tens permís per a esborrar';
$string['nosubject'] = '[sens assumpte]';
$string['numberattachments'] = '{$a} adjunts';
$string['numberunread'] = '{$a} sense llegir';
$string['oldest'] = 'Més vell';
$string['onlydraftscanbetrashed'] = 'Només els esborranys es poden esborrar';
$string['open'] = 'Obrir';
$string['openedbyfullyear'] = '<small>Obert per</small> <strong>{$a->fullname}</strong> <small>el</small> {$a->datefull} <small>({$a->time})</small>';
$string['openedbyshortyear'] = '<small>Obert per</small> <strong>{$a->fullname}</strong> <small>el</small> {$a->dateshort} <small>({$a->time})</small>';
$string['openedbytoday'] = '<small>Obert per</small> <strong>{$a->fullname}</strong> <small>el</small> {$a->time} <small>({$a->timepast}) ago</small>';
$string['openwith'] = 'Obre amb';
$string['participants'] = 'participants';
$string['people'] = 'Persones';
$string['pluginadministration'] = 'Administració del diàleg';
$string['pluginname'] = 'Diàleg';
$string['repliedby'] = '<strong>{$a->fullname}</strong> <small>va respondre</small> {$a->timeago}';
$string['repliedbyfullyear'] = '<strong>{$a->fullname}</strong> <small>va respondre el</small> {$a->datefull} <small>({$a->time})</small>';
$string['repliedbyshortyear'] = '<strong>{$a->fullname}</strong> <small>va respondre el</small> {$a->dateshort} <small>({$a->time})</small>';
$string['repliedbytoday'] = '<strong>{$a->fullname}</strong> <small>va respondre fa</small> {$a->time} <small>({$a->timepast})</small>';
$string['reply'] = 'Respondre';
$string['replydeleteconfirm'] = 'Estàs segur de que vols respondre?';
$string['replydeleted'] = 'La resposta ha sigut esborrada';
$string['replysent'] = 'La teua resposta s\'ha enviat';
$string['runsuntil'] = 'S\'executa fins';
$string['savedraft'] = 'Guardar esborrany';
$string['searchpotentials'] = 'Cercar usuaris potencials...';
$string['send'] = 'Enviar';
$string['senton'] = '<small><strong>Enviat en: </strong></small>';
$string['sortedby'] = 'Ordenat per: {$a}';
$string['studenttostudent'] = 'Estudiant a estudiant';
$string['subject'] = 'Assumpte';
$string['teachertostudent'] = 'Professor a estudiant';
$string['trashdraft'] = 'Esborra esborrany';
$string['unread'] = 'No llegit';
$string['unreadmessages'] = 'Missatges no llegits';
$string['unreadmessagesnumber'] = '{$a} missatges no llegits';
$string['unreadmessagesone'] = '1 missatge no llegit';
$string['upgrade'] = 'Actualitza';
$string['upgradecheck'] = 'Actualitzar diàleg {$a}?';
$string['upgradedcount'] = 'Actualitzats {$a} diàlegs';
$string['upgradeiscompleted'] = 'L\'actualització s\'ha completat';
$string['upgrademessage'] = 'Aquest diàleg ha de ser actualitzat! Si us plau, poseu-vos en contacte amb l\'administrador de Moodle';
$string['upgradenodialoguesselected'] = 'Cap diàleg seleccionat';
$string['upgradenoneedupgrade'] = '{$a} diàlegs tenen que ser actualitzats';
$string['upgradereport'] = 'LListar diàlegs per a actualitzar';
$string['upgradereportdescription'] = 'Això us mostrarà un informe de tots els diàlegs al sistema que encara han de ser actualitzats';
$string['upgradeselected'] = 'Actualitzar els diàlegs seleccionats';
$string['upgradeselectedcount'] = 'Actualitzar {$a} diàlegs seleccionats?';
$string['upgradingresultfailed'] = 'Resultat: L\'actualització va fallar';
$string['upgradingresultsuccess'] = 'Resultat: Actualització correcta';
$string['upgradingsummary'] = 'Actualitzant diàleg: {$a}';
$string['usecoursegroups'] = 'Usar groups del curs';
$string['usecoursegroups_help'] = 'Si el curs defineix grups, restrigeix amb qui es pot obrir un diàleg. Els diàlegs només es poden obrir entre membres de grup tret que la persona que obre el diàleg tinga la capacitat "Accedir a tots els grups" establerta.';
$string['usesearch'] = 'Utilitzar la cerca per a trobar gent amb qui iniciar un diàleg';
$string['viewconversations'] = 'Vore converses';
$string['viewconversationsbyrole'] = 'Vore converses per rol';
