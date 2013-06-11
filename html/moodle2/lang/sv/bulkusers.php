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
 * Strings for component 'bulkusers', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   bulkusers
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addall'] = 'Lägg till alla';
$string['addsel'] = 'Lägg till urvalet av tillgängliga användare';
$string['allfilteredusers'] = 'Alla filtrerade ({$a->count}/{$a->total})';
$string['allselectedusers'] = 'Alla valda ({$a->count}/{$a->total})';
$string['allusers'] = 'Alla användare';
$string['available'] = 'Tillgänglig';
$string['confirmmessage'] = 'Vill du verkligen skicka det ovanstående meddelandet till alla dessa användare?<br />{$a}';
$string['nofilteredusers'] = 'Det gick inte att hitta några användare(0/{$a})';
$string['noselectedusers'] = 'Inga användare är valda';
$string['removeall'] = 'Ta bort alla ';
$string['removesel'] = 'Ta bort urvalet av tillgängliga användare';
$string['selected'] = 'Urvald/a';
$string['selectedlist'] = 'Lista över urval av användare...';
$string['selectedlist_help'] = '<h2>Lista över valda användare...</h2>

<ul>
<li>Lägg till till urvalet - lägger till valda användare från listan över Tillgängliga till listan över Utvalda. Du kan välja ett flertal användare genom att hålla nere Apple- eller Ctrl-tangenten medan du klickar på användarnas namn.
</li>
<li>Lägg till alla - lägger till alla användare från listan över Tillgängliga till listan över Utvalda. </li>
<li>Ta bort från urval  - tar bort valda användare från listan över Utvalda. </li>
<li>Ta bort alla - tar bort alla användare från listan över Utvalda.</li>
</ul>';
$string['users'] = 'Användare';
$string['usersfound'] = '{$a} användare har hittats';
$string['users_help'] = '<h2>Listor över användare</h2>

<p>Listan över <strong>tillgängliga</strong> innehåller användare som har passerat de aktiva filtren. Om t.ex. sektionerna för aktiva filter innehåller bara ett filter för användare vars land är Rumänien, då kommer listan över tillgängliga endast att innehålla användare som har angivit Rumänien som sitt land i sidan för profiler.</p>

<p>Listan över <strong>Utvalda</strong> innehåller användare som du har lagt till till listan genom att använda knapparna från <em>Listan över utvalda användare...</em>. När du håller ned knappen <em>Gå</em> från  <em> med valda användare...</em> så kommer den åtgärd du har valt att utföras på användarna från denna lista.</p>';
$string['usersinlist'] = 'Användare i lista';
$string['usersselected'] = '{$a} användare har förts till urvalet';
