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
 * Strings for component 'block_rss_client', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   block_rss_client
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addfeed'] = 'Aggiungi un URL di feed news:';
$string['addheadlineblock'] = 'Aggiungi il titolo per il blocco RSS';
$string['addnew'] = 'Aggiungi nuovo';
$string['addnewfeed'] = 'Aggiungi un feed';
$string['cannotmakemodification'] = 'Al momento non sei autorizzato a modificare questo feed RSS';
$string['choosefeedlabel'] = 'Scegli quale feed rendere disponibile in questo blocco:';
$string['clientchannellink'] = 'Sito sorgente...';
$string['clientnumentries'] = 'Numero predefinito di voci da visualzzare per ogni feed';
$string['clientshowchannellinklabel'] = 'Si deve visualizzare un collegamento al sito originario (channel link)?<br/> (Da notare che se non è fornito alcun collegamento feed nel feed delle news, <br/>allora nessun collegamento verrà  visualizzato):';
$string['clientshowimagelabel'] = 'Visualizza canale immagine se disponibile:';
$string['configblock'] = 'Configura questo blocco';
$string['couldnotfindfeed'] = 'Non ho trovato il feed tramite l\'id';
$string['customtitlelabel'] = 'Titolo personalizzato (lasciare in bianco per usare il titolo del feed originario):';
$string['deletefeedconfirm'] = 'Sei sicuro di voler cancellare questo feed?';
$string['disabledrssfeeds'] = 'I feed RSS sono disabilitati';
$string['displaydescriptionlabel'] = 'Visualizza descrizione per ogni link?';
$string['editafeed'] = 'Modifica un feed';
$string['editfeeds'] = 'Modifica, sottoscrivi o revoca l\'iscrizione al feed news RSS/Atom';
$string['editnewsfeeds'] = 'Modifica feed di news';
$string['editrssblock'] = 'Modifica titolo blocco RSS';
$string['enableautodiscovery'] = 'Abilita l\'individuazione automatica dei feed';
$string['enableautodiscovery_help'] = '<p>
L\'opzione consente a Moodle di individuare automaticamente un feed senza doverne specificare il link completo.
</p>
<p>Ad esempio, utilizzando l\'URL di Moodle Docs: <pre>http://docs.moodle.org</pre>
Moodle individuerà automaticamente il feed da usare:
<pre>http://docs.moodle.org/en/index.php?title=Special:RecentChanges&feed=rss</pre>
</p>';
$string['errorloadingfeed'] = 'Si è verificato un errore durante il caricamento del feed RSS ({$a})';
$string['feed'] = 'Feed';
$string['feedadded'] = 'Feed News aggiunto';
$string['feeddeleted'] = 'Feed News eliminato';
$string['feeds'] = 'Feed news';
$string['feedsaddedit'] = 'Aggiungi/modifica feed';
$string['feedsconfigurenewinstance'] = 'Prima che questo blocco possa visualizzare un feed RSS, devi configurarlo facendo click qui.';
$string['feedsconfigurenewinstance2'] = 'Per configurare il blocco e visualizzare i feed RSS devi fare click sull\'icona di modifica.';
$string['feedupdated'] = 'Feed news Aggiornato';
$string['feedurl'] = 'URL del feed';
$string['findmorefeeds'] = 'Trova altri feed RSS';
$string['managefeeds'] = 'Gestisci tutti i miei feed';
$string['nofeeds'] = 'Non ci sono altri feed RSS definiti per questo sito.';
$string['numentries'] = 'Elementi per feed';
$string['pickfeed'] = 'Scegli un feed news';
$string['pluginname'] = 'Feed RSS remoto';
$string['remotenewsfeed'] = 'Feed news remoto';
$string['rss_client:addinstance'] = 'Aggiungere blocco Feed RSS remoto';
$string['rss_client:createprivatefeeds'] = 'Creare feed RSS privati';
$string['rss_client:createsharedfeeds'] = 'Creare feed RSS condivisi';
$string['rss_client:manageanyfeeds'] = 'Gestire qualsiasi feed RSS';
$string['rss_client:manageownfeeds'] = 'Gestire i propri feed RSS';
$string['rss_client:myaddinstance'] = 'Aggiungere blocco Feed RSS remoto nella pagina My home';
$string['seeallfeeds'] = 'Visualizza tutti i feed';
$string['sharedfeed'] = 'Feed condivisi';
$string['shownumentrieslabel'] = 'Numero massimo di voci da visualizzare per blocco.';
$string['submitters'] = 'Gli autorizzati a definire nuovi feed RSS. Alcuni feed potranno essere disponibili in qualsiasi pagina del sito.';
$string['submitters2'] = 'Creatori';
$string['timeout'] = 'Tempo in minuti prima che un feed RSS sparisca dalla cache. Notare che questo tempo definisce il minimo intervallo prima della scomparsa; il feed sarà ripristinato nella cache alla prossima esecuzione del cron dopo la scomparsa. Valori raccomandati sono 30 min o superiori.';
$string['timeout2'] = 'Timeout';
$string['timeoutdesc'] = 'Tempo di permanenza nella cache di un RSS feed. (minuti)';
$string['updatefeed'] = 'Aggiorna l\'URL di un feed News:';
$string['viewfeed'] = 'Visualizza feed';
