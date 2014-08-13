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
 * Strings for component 'blog', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   blog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addnewentry'] = 'Nuovo intervento';
$string['addnewexternalblog'] = 'Registra blog esterno';
$string['assocdescription'] = 'Se stai scrivendo qualcosa su un corso e/o su moduli di attività, puoi sceglerli qui:';
$string['associated'] = '{$a} è stato associato';
$string['associatewithcourse'] = 'Blog sul corso {$a->coursename}';
$string['associatewithmodule'] = 'Blog su {$a->modtype}: {$a->modname}';
$string['association'] = 'Associazione';
$string['associations'] = 'Associazioni';
$string['associationunviewable'] = 'Questo intervento non può essere visualizzato da altri utenti finché non sarà associato un corso oppure non sarà cambiato il campo \'Pubblica in\'';
$string['autotags'] = 'Aggiungi questi tag';
$string['autotags_help'] = 'Inserisci uno più tag locali (separati da virgole) da aggiungere automaticamente agli interventi copiati dal blog esterno al blog locale. ';
$string['backupblogshelp'] = 'Se abilitato, i blog verranno inclusi nei backup automatici di SITO';
$string['blockexternalstitle'] = 'Blog esterni';
$string['blocktitle'] = 'Titolo blocco tag dei blog';
$string['blog'] = 'Blog';
$string['blogaboutthis'] = 'Blog su questo {$a->type}';
$string['blogaboutthiscourse'] = 'Aggiungi un intervento su questo corso';
$string['blogaboutthismodule'] = 'Aggiungi un intervento su questo {$a}';
$string['blogadministration'] = 'Gestione blog';
$string['blogdeleteconfirm'] = 'Eliminare questo blog?';
$string['blogdisable'] = 'I blog sono disabilitati!';
$string['blogentries'] = 'Interventi blog';
$string['blogentriesabout'] = 'Interventi blog su {$a}';
$string['blogentriesbygroupaboutcourse'] = 'Interventi blog di {$a->group} su {$a->course}';
$string['blogentriesbygroupaboutmodule'] = 'Interventi blog di {$a->group} su {$a->mod}';
$string['blogentriesbyuseraboutcourse'] = 'Interventi blog di {$a->user} su {$a->course}';
$string['blogentriesbyuseraboutmodule'] = 'Interventi blog di {$a->user} su questo {$a->mod}';
$string['blogentrybyuser'] = 'Interventi Blogi di {$a}';
$string['blogpreferences'] = 'Preferenze blog';
$string['blogs'] = 'Blog';
$string['blogscourse'] = 'Blog del corso';
$string['blogssite'] = 'Blog del sito';
$string['blogtags'] = 'Tag dei blog';
$string['cannotviewcourseblog'] = 'Non sei autorizzato a vedere i blog in questo corso';
$string['cannotviewcourseorgroupblog'] = 'Non sei autorizzato a visualizzare i blog di questo corso o gruppo';
$string['cannotviewsiteblog'] = 'Non sei autorizzato a visualizzare i blog del sito';
$string['cannotviewuserblog'] = 'Non sei autorizzato a visualizzare i blog degli utenti';
$string['configexternalblogcrontime'] = 'La frequenza con cui Moodle controllerà la presenza di nuovi interventi nei blog esterni.';
$string['configmaxexternalblogsperuser'] = 'Il numero massimo consentito di blog esterni utilizzabile in Moodle';
$string['configuseblogassociations'] = 'Abilità agli utenti ad associare gli interventi blog ai corsi ed ai moduli di attività.';
$string['configuseexternalblogs'] = 'Abilità agli utenti ad aggiungere blog feed esterni. Moodle controllerà periodicamente i blog esterni e copierà i nuovi interventi nel blog locale dell\'utente.';
$string['courseblog'] = 'Blog del corso: {$a}';
$string['courseblogdisable'] = 'I blog del corso non sono abilitati.';
$string['courseblogs'] = 'Gli utenti possono vedere solo i blog  delle persone con le quali condividono un corso';
$string['deleteblogassociations'] = 'Elimina associazioni blog';
$string['deleteblogassociations_help'] = 'Consente l\'eliminazione dell\'associazione degli interventi blog da questo corso e dalle attività e risorse correlate. Gli interventi non saranno eliminati.';
$string['deleteexternalblog'] = 'Elimina la registrazione di questo blog esterno';
$string['deleteotagswarn'] = 'Sei sicuro di voler rimuovere questi tag da tutti gli interventi di blog e dal sistema?';
$string['description'] = 'Descrizione';
$string['description_help'] = 'Inserisci una frase descrittiva dei contenuti del tuo blog esterno. (Se non inserisci nessuna descrizione, verrà utilizzata la descrizione presa dal blog esterno).';
$string['donothaveblog'] = 'Spiacente, ma non hai un tuo blog.';
$string['editentry'] = 'Modifica un intervento blog';
$string['editexternalblog'] = 'Modifica questo blog esterno';
$string['emptybody'] = 'Il testo di un intervento di blog non può essere vuoto';
$string['emptyrssfeed'] = 'L\'URL fornita non punta ad un fedd RSS valido';
$string['emptytitle'] = 'Il titolo di un intervento di blog non può essere vuoto';
$string['emptyurl'] = 'Devi inserire una URL di un feed RSS valido';
$string['entrybody'] = 'Testo dell\'intervento';
$string['entrybodyonlydesc'] = 'Descrizione intervento';
$string['entryerrornotyours'] = 'Questo intervento non ti appartiene';
$string['entrysaved'] = 'Il tuo intervento è stato salvato';
$string['entrytitle'] = 'Titolo intervento';
$string['evententryadded'] = 'Inserito intervento blog';
$string['evententrydeleted'] = 'Eliminato intervento blog';
$string['evententryupdated'] = 'Intervento del blog aggiornato';
$string['externalblogcrontime'] = 'Frequenza controllo blog esterni tramite cron';
$string['externalblogdeleteconfirm'] = 'Eliminare la registrazione al blog esterno?';
$string['externalblogdeleted'] = 'La registrazione al blog esterno è stata eliminata';
$string['externalblogs'] = 'Blog esterni';
$string['feedisinvalid'] = 'Il feed non è valido';
$string['feedisvalid'] = 'Il feed è valido';
$string['filterblogsby'] = 'Filtra gli interventi per...';
$string['filtertags'] = 'Filtra tag';
$string['filtertags_help'] = 'Puoi usare questa funzione per filtrare gli interventi da utilizzare. Specificando dei tag (separati da virgole), saranno copiati dal blog esterno solo gli interventi che contengono questi tag.';
$string['groupblog'] = 'Blog del gruppo: {$a}';
$string['groupblogdisable'] = 'I blog di gruppo non sono abilitati';
$string['groupblogentries'] = 'Interventi blog associati con {$a->coursename} dal gruppo {$a->groupname}';
$string['groupblogs'] = 'Gli utenti possono vedere solo i blog  delle persone che appartengono allo stesso gruppo';
$string['incorrectblogfilter'] = 'E\' stato specificato un tipo di filtro blog errato';
$string['intro'] = 'Questo RSS è stato creato automaticamente da uno o più blog.';
$string['invalidgroupid'] = 'ID gruppo non valida';
$string['invalidurl'] = 'L\'URL non è raggiungibile';
$string['linktooriginalentry'] = 'Collegamento all\'intervento originale';
$string['maxexternalblogsperuser'] = 'Numero massimo di blog esterni per ciascun utente';
$string['name'] = 'Nome';
$string['name_help'] = 'Inserisci un nome che descriva il tuo blog esterno. (Se non inserisci nessun nome, verrà utilizzato il titolo del blog esterno).';
$string['noentriesyet'] = 'Non ci sono interventi visibili';
$string['noguestpost'] = 'Gli ospiti non possono inserire interventi nel blog!';
$string['nopermissionstodeleteentry'] = 'Non hai i privilegi necessari per eliminare questo intervento';
$string['norighttodeletetag'] = 'Non ti è consentito di eliminare questo tag - {$a}';
$string['nosuchentry'] = 'Questo intervento blog non esiste';
$string['notallowedtoedit'] = 'Non ti è consentito di modificare questo intervento';
$string['numberofentries'] = 'Interventi: {$a}';
$string['numberoftags'] = 'Numero tag da visualizzare';
$string['page-blog-edit'] = 'Pagine di modifica blog';
$string['page-blog-index'] = 'Pagine elenco blog';
$string['page-blog-x'] = 'Tutte le pagine blog';
$string['pagesize'] = 'Interventi del blog per pagina';
$string['permalink'] = 'Permalink';
$string['personalblogs'] = 'Gli utenti possono vedere solo i propri blog';
$string['preferences'] = 'Preferenze';
$string['publishto'] = 'Pubblicazione';
$string['publishtocourse'] = 'Utenti iscritti ai tuoi stessi corsi';
$string['publishtocourseassoc'] = 'Membri del corso associato';
$string['publishtocourseassocparam'] = 'Membri di {$a}';
$string['publishtogroup'] = 'Utenti membri dei tuoi stessi gruppi';
$string['publishtogroupassoc'] = 'I membri del tuo gruppo nel corso associato';
$string['publishtogroupassocparam'] = 'I membri del tuo gruppo in {$a}';
$string['publishto_help'] = 'Sono disponibili 3 opzioni:

* Te stesso (draft) - L\'intervento è visualizzabile solo da te e dagli amministratori
* Utenti autenticati - L\'intervento è visualizzabile da qualsiasi utente che abbia un account su questo sito
* Chiunque - L\'intervento è visualizzabile da chiunque, inclusi gli ospiti';
$string['publishtonoone'] = 'Personale (Bozza)';
$string['publishtosite'] = 'Su questo sito';
$string['publishtoworld'] = 'Su tutto il web';
$string['readfirst'] = 'Leggi subito';
$string['relatedblogentries'] = 'Interventi blog collegati';
$string['retrievedfrom'] = 'Ripresi da';
$string['rssfeed'] = 'Feed RSS blog';
$string['searchterm'] = 'Cerca: {$a}';
$string['settingsupdatederror'] = 'Si è verificato un errore, non è stato possibile aggiornare le preferenze del blog.';
$string['siteblog'] = 'Blog del sito: {$a}';
$string['siteblogdisable'] = 'I blog di sito non sono abilitati';
$string['siteblogs'] = 'Gli utenti del sito possono vedere qualsiasi intervento nei blog';
$string['tagdatelastused'] = 'Data ultima utilizzazione tag';
$string['tagparam'] = 'Tag: {$a}';
$string['tags'] = 'Tag';
$string['tagsort'] = 'Ordina elenco tag per';
$string['tagtext'] = 'Testo tag';
$string['timefetched'] = 'Ultima sincronizzazione';
$string['timewithin'] = 'Visualizza tag utilizzate da';
$string['updateentrywithid'] = 'Aggiornamento intervento';
$string['url'] = 'URL feed RSS';
$string['url_help'] = 'Inserisci l\'URL del feed RSS del blog esterno.';
$string['useblogassociations'] = 'Abilita associazioni blog';
$string['useexternalblogs'] = 'Abilita blog esterni';
$string['userblog'] = 'Blog utente: {$a}';
$string['userblogentries'] = 'Interventi blog di {$a}';
$string['valid'] = 'Valido';
$string['viewallblogentries'] = 'Tutti gli interventi su {$a}';
$string['viewallmodentries'] = 'Visualizza tutti gli interventi su {$a->type}';
$string['viewallmyentries'] = 'Visualizza tutti i miei interventi';
$string['viewblogentries'] = 'Interventi su questo {$a->type}';
$string['viewblogsfor'] = 'Visualizza tutti gli interventi su...';
$string['viewcourseblogs'] = 'Visualizza tutti gli interventi su questo corso';
$string['viewentriesbyuseraboutcourse'] = 'Visualizza tutti gli interventi sul corso di {$a}';
$string['viewgroupblogs'] = 'Visualizza interventi sul gruppo...';
$string['viewgroupentries'] = 'Interventi sul gruppo';
$string['viewmodblogs'] = 'Visualizza interventi sul modulo...';
$string['viewmodentries'] = 'Interventi sul modulo';
$string['viewmyentries'] = 'I miei interventi';
$string['viewmyentriesaboutcourse'] = 'Visualizza i miei interventi sul corso';
$string['viewmyentriesaboutmodule'] = 'Visualizza i miei interventi su {$a}';
$string['viewsiteentries'] = 'Visualizza tutti gli interventi';
$string['viewuserentries'] = 'Visualizza tutti gli interventi di {$a}';
$string['worldblogs'] = 'Chiunque può leggere gli interventi impostati come pubblici';
$string['wrongpostid'] = 'Id errata dell\'intervento blog';
