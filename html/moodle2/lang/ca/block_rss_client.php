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
 * Strings for component 'block_rss_client', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   block_rss_client
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addfeed'] = 'Afegeix un URL d\'un canal d\'informació:';
$string['addheadlineblock'] = 'Afegeix un bloc de titulars RSS';
$string['addnew'] = 'Afegeix';
$string['addnewfeed'] = 'Afegeix un nou canal';
$string['cannotmakemodification'] = 'No podeu modificar aquest canal RSS en aquest moment.';
$string['choosefeedlabel'] = 'Trieu els canals que voleu incloure en aquest bloc:';
$string['clientchannellink'] = 'Lloc origen...';
$string['clientnumentries'] = 'Nombre d\'entrades de cada canal que es mostren per defecte.';
$string['clientshowchannellinklabel'] = 'S\'ha de mostrar un enllaç al lloc (canal) original? (sempre que el canal proporcioni l\'enllaç):';
$string['clientshowimagelabel'] = 'Mostra la imatge del canal (si n\'hi ha):';
$string['configblock'] = 'Configura aquest bloc';
$string['couldnotfindfeed'] = 'No s\'ha trobat el canal amb id';
$string['customtitlelabel'] = 'Títol personalitzat (deixeu en blanc per utilitzar el que proporciona el canal)';
$string['deletefeedconfirm'] = 'Esteu segur que voleu suprimir aquest canal?';
$string['disabledrssfeeds'] = 'Els canals RSS no estan habilitats.';
$string['displaydescriptionlabel'] = 'Cal visualitzar la descripció de cada enllaç?';
$string['editafeed'] = 'Edita un canal';
$string['editfeeds'] = 'Edita, afegeix subscripcions o cancel·la subscripcions a canals de continguts';
$string['editnewsfeeds'] = 'Edita canals d\'informació';
$string['editrssblock'] = 'Edita bloc de titulars RSS';
$string['enableautodiscovery'] = 'Habilitar l\'auto-descobriment de canals?';
$string['enableautodiscovery_help'] = 'Quan s\'habilita aquesta opció, els canals RSS de les pàgines es poden detectar automàticament. Per exemple, si introduïu http://docs.moodle.org, es trobarà el canal RSS http://docs.moodle.org/en/index.php?title=Special:RecentChanges&feed=rss';
$string['errorloadingfeed'] = 'S\'ha produït un error en carregar aquest canal RSS ({$a})';
$string['feed'] = 'Canal d\'informació';
$string['feedadded'] = 'S\'ha afegit un canal d\'informació';
$string['feeddeleted'] = 'S\'ha suprimit un canal d\'informació';
$string['feeds'] = 'Canals d\'informació';
$string['feedsaddedit'] = 'Afegeix/edita canals';
$string['feedsconfigurenewinstance'] = 'Feu clic aquí per configurar la visualització d\'RSS en aquest bloc.';
$string['feedsconfigurenewinstance2'] = 'Feu clic en la icona d\'edició per configurar aquest bloc per visualitzar canals RSS.';
$string['feedupdated'] = 'S\'ha actualitzat un canal d\'informació';
$string['feedurl'] = 'URL del canal';
$string['findmorefeeds'] = 'Cerca més canals RSS';
$string['managefeeds'] = 'Gestiona els meus canals';
$string['nofeeds'] = 'No hi ha canals RSS definits en aquest lloc';
$string['numentries'] = 'Entrades per canal';
$string['pickfeed'] = 'Tria un canal d\'informació';
$string['pluginname'] = 'Client RSS';
$string['remotenewsfeed'] = 'Canals d\'informació remots';
$string['rss_client:createprivatefeeds'] = 'Crea canals RSS privats';
$string['rss_client:createsharedfeeds'] = 'Crea canals RSS compartits';
$string['rss_client:manageanyfeeds'] = 'Gestiona qualsevol canal RSS';
$string['rss_client:manageownfeeds'] = 'Gestiona canals RSS propis';
$string['seeallfeeds'] = 'Mostra tots els canals';
$string['sharedfeed'] = 'Canal compartit';
$string['shownumentrieslabel'] = 'Nombre màxim d\'entrades que es pot visualitzar en un bloc';
$string['submitters'] = 'Qui pot definir nous canals RSS? Els canals ja definits estan disponibles per a qualsevol pàgina del lloc.';
$string['submitters2'] = 'Contribucions';
$string['timeout'] = 'Temps en minuts abans que venci un canal RSS en la memòria cau. Teniu en compte que aquest paràmetre defineix el temps mínim abans que venci; el canal es refrescarà en la memòria cau en la pròxima execució del cron després que hagi vençut. El valor recomanat és de 30 minuts o més.';
$string['timeout2'] = 'Temps d\'espera';
$string['timeoutdesc'] = 'Temps en minuts que un canal RSS roman a la memòria cau';
$string['updatefeed'] = 'Actualitza l\'URL d\'un canal d\'informació';
$string['viewfeed'] = 'Mira el canal';
