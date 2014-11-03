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
$string['ago'] = 'fa';
$string['attachment'] = 'Adjunt';
$string['attachments'] = 'Adjunts';
$string['bulkopener'] = 'Obertura massiva';
$string['bulkopenrule'] = 'Regla d\'obertura massiva';
$string['bulkopenrulenotifymessage'] = '<strong>Nota:</strong> <br/> Quan s\'utilitza una regla d\'obertura massiva, les converses no s\'obren immediatament. Aquestes s\'obriran quan s\'executi la funció cron del sistema, normalment cada 30 minuts.';
$string['bulkopenrules'] = 'Regles d\'obertura massiva';
$string['cachedef_params'] = 'Paràmetres - Interfície d\'usuari';
$string['cachedef_participants'] = 'Id dels participants (informació bàsica)';
$string['cachedef_unreadcounts'] = 'Comptador de missatges sense llegir dels usuaris';
$string['cachedef_userdetails'] = 'Breu detall dels usuaris, tots els usuaris inscrits';
$string['cannotclosedraftconversation'] = 'No podeu tancar una conversa que no ha començat';
$string['cannotdeleteopenconversation'] = 'No podeu suprimir una conversa oberta';
$string['closeconversation'] = 'Tanca la conversa';
$string['closed'] = 'Tancades';
$string['completed'] = 'Completat';
$string['configmaxattachments'] = 'Nombre màxim d\'adjunts per defecte permesos per missatge.';
$string['configmaxbytes'] = 'Mida màxima per defecte per a tots els adjunts de diàlegs al lloc (tenint en compte els límits de curs i altres configuracions locals)';
$string['configtrackunread'] = 'Fes el seguiment dels missatges no llegits a la pàgina principal del curs';
$string['configviewconversationsbyrole'] = 'Experimental: Visualitza converses per rol, ordena el llistat de converses pel rol de l\'autor';
$string['configviewstudentconversations'] = 'Experimental: llistat d\'estudiants amb les converses en què han participat';
$string['conversationcloseconfirm'] = 'Esteu segur que voleu tancar la conversa {$a}?';
$string['conversationclosed'] = 'La conversa {$a} s\'ha tancat';
$string['conversationdeleteconfirm'] = 'Esteu segur que voleu suprimir la conversa {$a}? (aquesta acció no es pot desfer)';
$string['conversationdeleted'] = 'S\'ha suprimit la conversa {$a}';
$string['conversationdiscarded'] = 'S\'ha descartat la conversa';
$string['conversationlistdisplayheader'] = 'S\'estan mostrant {$a->show} {$a->state} converses {$a->groupname}';
$string['conversationopened'] = 'S\'ha obert la conversa';
$string['conversationopenedcron'] = 'Les converses s\'obriran automàticament';
$string['conversationopenedwith'] = '<strong>1</strong> conversa oberta amb:';
$string['conversations'] = 'Converses';
$string['conversationsopenedwith'] = '<string>{$a}</strong> converses obertes amb:';
$string['cutoffdate'] = 'Data límit';
$string['datefullyear'] = '{$a->datefull}<small>{{$a->time}}</small>';
$string['dateshortyear'] = '{$a->dateshort}<small>({$a->time})</small>';
$string['deleteconversation'] = 'Suprimeix la conversa';
$string['deletereply'] = 'Suprimeix la resposta';
$string['dialogue:addinstance'] = 'Afegeix un diàleg';
$string['dialogue:bulkopenrulecreate'] = 'Crea una regla d\'obertura massiva';
$string['dialogue:bulkopenruleeditany'] = 'Permet a l\'usuari editar qualsevol regla, útil per a administradors, etc.';
$string['dialogue:close'] = 'Tanca una conversa';
$string['dialogue:closeany'] = 'Tanca qualsevol';
$string['dialogue:delete'] = 'Suprimeix els propis';
$string['dialogue:deleteany'] = 'Suprimeix qualsevol';
$string['dialogueintro'] = 'Descripció';
$string['dialoguename'] = 'Nom del diàleg';
$string['dialogue:open'] = 'Obri una conversa';
$string['dialogue:receive'] = 'Rep, qui pot ser el destinatari quan s\'obri una conversa';
$string['dialogue:reply'] = 'Contesta';
$string['dialogue:replyany'] = 'Contesta a qualsevol';
$string['dialogueupgradehelper'] = 'Eina d\'actualització de diàlegs';
$string['dialogue:viewany'] = 'Visualitza qualsevol';
$string['dialogue:viewbyrole'] = 'Visualitza llistat de converses per rol, experimental';
$string['displaybystudent'] = 'Mostra per estudiant';
$string['displayconversationsheading'] = 'S\'estan mostrant {$a} converses';
$string['displaying'] = 'S\'estan mostrant';
$string['draft'] = 'Esborrany';
$string['draftconversation'] = 'Esborrany de la conversa';
$string['draftconversationtrashed'] = 'S\'ha suprimit l\'esborrany de la conversa';
$string['draftlistdisplayheader'] = 'S\'estan mostrant els meus esborranys';
$string['draftreply'] = 'Esborrany de la resposta';
$string['draftreplytrashed'] = 'L\'esborrany de la resposta s\'ha enviat a la paperera';
$string['drafts'] = 'Esborranys';
$string['errorcutoffdateinpast'] = 'La data límit no es pot establir en el passat';
$string['erroremptymessage'] = 'El missatge no pot estar buit';
$string['erroremptysubject'] = 'L\'assumpte no pot estar buit';
$string['errornoparticipant'] = 'Heu d\'obrir un diàleg amb algú...';
$string['everybody'] = 'Tothom (lliure per a tots)';
$string['everyone'] = 'Tothom';
$string['firstname'] = 'Nom';
$string['fullname'] = 'Nom complet';
$string['groupmodenotifymessage'] = 'Aquesta activitat s\'ha configurat per a usar grups. Això afectarà a amb qui podeu iniciar una conversa i quines converses es mostren.';
$string['hasnotrun'] = 'No s\'ha executat encara';
$string['includefuturemembers'] = 'Inclou membres futurs';
$string['ingroup'] = 'En grup {$a}';
$string['lastname'] = 'Cognoms';
$string['lastranon'] = 'Última vegada executat';
$string['latest'] = 'Últimes';
$string['listpaginationheader'] = '{$a->start}-{$a->end} de {$a->total}';
$string['matchingpeople'] = 'Persones coincidents ({$a})';
$string['maxattachments'] = 'Nombre màxim d\'adjunts';
$string['maxattachments_help'] = 'Aquest paràmetre indica el nombre màxim de fitxers que es poden adjuntar a un missatge del diàleg.';
$string['maxattachmentsize'] = 'Mida màxima de cada adjunt';
$string['maxattachmentsize_help'] = 'Indica la mida màxima de fitxer que pot ser adjuntat a un missatge del diàleg.';
$string['message'] = 'Missatge';
$string['messageapibasicmessage'] = '<p> {$a->userfrom} ha publicat un nou missatge en una conversa on hi esteu participant amb l\'assumpte: <i>{$a->subject}</i> <br/><br/>
<a href="{$a->url}">Vegeu en Moodle</a> </p>';
$string['messageapismallmessage'] = '{$a} ha publicat un nou missatge en una conversa on hi esteu participant';
$string['messageprovider:post'] = 'Notificacions del diàleg';
$string['messages'] = 'missatges';
$string['mine'] = 'Meus';
$string['modulename'] = 'Diàleg';
$string['modulename_help'] = 'Els diàlegs permeten a l\'estudiantat i al professorat iniciar diàlegs de doble sentit amb una altra persona. Són activitats del curs que poden resultar útils quan el professorat vol un lloc per donar retroacció privada a l\'estudiantat sobre la seua activitat en línia. Per exemple, si un estudiant està participant en un fòrum de llengua i comet un error gramatical que el professorat vol puntualitzar sense avergonyir l\'estudiant, un diàleg és el lloc perfecte. Una activitat de diàleg també seria una excel·lent via perquè els consellers d\'una institució puguin interactuar amb l\'estudiantat - totes les activitats es registren i el correu electrònic no es requereix necessàriament.';
$string['modulenameplural'] = 'Diàlegs';
$string['nobulkrulesfound'] = 'No s\'han trobat regles d\'obertura massiva';
$string['noconversationsfound'] = 'No s\'han trobat converses';
$string['nodraftsfound'] = 'No s\'han trobat esborranys';
$string['nomatchingpeople'] = 'Cap persona amb \'{$a}';
$string['nopermissiontoclose'] = 'No teniu permís per a tancar aquesta conversa';
$string['nopermissiontodelete'] = 'No teniu permís per a suprimir';
$string['nosubject'] = '[sens assumpte]';
$string['numberattachments'] = '{$a} adjunts';
$string['numberunread'] = '{$a} sense llegir';
$string['oldest'] = 'Més vell';
$string['onlydraftscanbetrashed'] = 'Només els esborranys poden suprimir-se';
$string['open'] = 'Obertes';
$string['openedbyfullyear'] = '<small>Oberta per</small> <strong>{$a->fullname}</strong> <small>el</small> {$a->datefull} <small>({$a->time})</small>';
$string['openedbyshortyear'] = '<small>Oberta per</small> <strong>{$a->fullname}</strong> <small>a les</small> {$a->dateshort} <small>({$a->time})</small>';
$string['openedbytoday'] = '<small>Obert per</small> <strong>{$a->fullname}</strong> <small>a les</small> {$a->time} <small> (fa {$a->timepast})</small>';
$string['openwith'] = 'Obre amb';
$string['participants'] = 'participants';
$string['people'] = 'Persones';
$string['pluginadministration'] = 'Administració del diàleg';
$string['pluginname'] = 'Diàleg';
$string['repliedby'] = '<strong>{$a->fullname}</strong> <small>va respondre</small> {$a->timeago}';
$string['repliedbyfullyear'] = '<strong>{$a->fullname}</strong> <small>va respondre el</small> {$a->datefull} <small>({$a->time})</small>';
$string['repliedbyshortyear'] = '<strong>{$a->fullname}</strong> <small>va respondre el</small> {$a->dateshort} <small>({$a->time})</small>';
$string['repliedbytoday'] = '<strong>{$a->fullname}</strong> <small>va respondre a les </small> {$a->time} <small>(fa {$a->timepast})</small>';
$string['reply'] = 'Contesta';
$string['replydeleteconfirm'] = 'Esteu segur que voleu contestar?';
$string['replydeleted'] = 'S\'ha suprimit la resposta';
$string['replysent'] = 'La vostra resposta s\'ha enviat';
$string['runsuntil'] = 'S\'executa fins';
$string['savedraft'] = 'Desa l\'esborrany';
$string['searchpotentials'] = 'Cerca usuaris potencials...';
$string['send'] = 'Envia';
$string['senton'] = '<small><strong>Enviat el: </strong></small>';
$string['sortedby'] = 'Ordenat per: {$a}';
$string['studenttostudent'] = 'Estudiant a estudiant';
$string['subject'] = 'Assumpte';
$string['teachertostudent'] = 'Professor a estudiant';
$string['trashdraft'] = 'Suprimeix l\'esborrany';
$string['unread'] = 'No llegit';
$string['unreadmessages'] = 'Missatges no llegits';
$string['unreadmessagesnumber'] = '{$a} missatges no llegits';
$string['unreadmessagesone'] = '1 missatge no llegit';
$string['upgrade'] = 'Actualitza';
$string['upgradecheck'] = 'Actualitza el diàleg {$a}?';
$string['upgradedcount'] = 'Actualitzats {$a} diàlegs';
$string['upgradeiscompleted'] = 'L\'actualització s\'ha completat';
$string['upgrademessage'] = 'Aquest diàleg s\'ha d\'actualitzar. Si us plau, poseu-vos en contacte amb l\'administrador de Moodle.';
$string['upgradenodialoguesselected'] = 'Cap diàleg seleccionat';
$string['upgradenoneedupgrade'] = '{$a} diàlegs s\'han d\'actualitzar';
$string['upgradereport'] = 'LLista diàlegs per a actualitzar';
$string['upgradereportdescription'] = 'Això us mostrarà un informe de tots els diàlegs al sistema que encara han de ser actualitzats';
$string['upgradeselected'] = 'Actualitza els diàlegs seleccionats';
$string['upgradeselectedcount'] = 'Actualitza {$a} diàlegs seleccionats?';
$string['upgradingresultfailed'] = 'Resultat: L\'actualització ha fallat';
$string['upgradingresultsuccess'] = 'Resultat: Actualització correcta';
$string['upgradingsummary'] = 'S\'està actualitzant el diàleg: {$a}';
$string['usecoursegroups'] = 'Utilitza els grups del curs';
$string['usecoursegroups_help'] = 'Si el curs té grups definits, s\'afegirà una restricció de amb qui es pot obrir un diàleg. Els diàlegs només es poden obrir entre membres del grup tret que la persona que obre el diàleg tinga la capacitat "Accedir a tots els grups" establerta.';
$string['usesearch'] = 'Utilitza la cerca per a trobar gent amb qui iniciar un diàleg';
$string['viewconversations'] = 'Visualitza les converses';
$string['viewconversationsbyrole'] = 'Visualitza les converses per rol';
