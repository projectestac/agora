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
 * Strings for component 'auth_shibboleth', language 'eu', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_shibboleth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_shib_auth_method'] = 'Autentifikazio-metodoaren izena';
$string['auth_shibbolethdescription'] = 'Metodo honen bidez Shibboleth zerbitzari batera konekta zaitezke kontu berriak sortu eta konprobatzeko';
$string['auth_shibboleth_errormsg'] = 'Mesedez, aukera ezazu zein erakundetakoa zaren!';
$string['auth_shibboleth_login'] = 'Shibboleth sarbidea';
$string['auth_shibboleth_login_long'] = 'Saioa hasi Moodle-n  Shibboleth-en bidez';
$string['auth_shibboleth_manual_login'] = 'Eskuzko sarbidea';
$string['auth_shibboleth_select_member'] = 'Ni hemengo kidea naiz:';
$string['auth_shib_changepasswordurl'] = 'Pasahitza aldatzeko URLa';
$string['auth_shib_convert_data'] = 'Datuen aldaketarako APIa';
$string['auth_shib_convert_data_description'] = 'API hau aurrerago Shibboleth-ek emandako datuak aldatzeko erabil dezakezu. <a href="../auth/shibboleth/README.txt" target="_blank">README</a> irakurri argibide gehigarriak ikusteko.';
$string['auth_shib_convert_data_warning'] = 'Fitxategirik ez dago, edo zerbitzariaren prozesuak ezin du irakurri.';
$string['auth_shib_idp_list'] = 'Nortasun-hornitzaileak';
$string['auth_shib_instructions'] = '<a href="{$a}">Shibboleth login</a> erabili Shibboleth-en bidez sartzeko zure erakundeak onartzen badu.<br />Bestela, hemen erakusten den sarrera arrunteko formularioa erabili.';
$string['auth_shib_instructions_help'] = 'Hemen zure erabiltzaileei Shibboleth erabiltzeko argibide pertsonalizatuak eman beharko zenizkieke. Sarbide orriko argibideen atalean agertu beharko lirateke, eta "<b>{$a}</b>" esteka erakutsi, Shibboletheko erabiltzaileak erraz sar daitezen. Zuriz utziz gero, argibide estandarrak erakutsiko dira (ez Shibboleth-enak berak)';
$string['auth_shib_integrated_wayf'] = 'Moodle-ren WAYF zerbitzua';
$string['auth_shib_only'] = 'Shibboleth soilik';
$string['auth_shib_only_description'] = 'Aukera hau hartu soilik Shibboleth autentikazioa bortxatu nahi baduzu.';
$string['auth_shib_username_description'] = 'Moodlen erabiltzaile izen gisa erabiliko den Shibboleth zerbitzariaren testuinguru aldagaiaren izena';
$string['pluginname'] = 'Shibboleth';
$string['shib_no_attributes_error'] = 'Badirudi Shibboleth-ek autentikatu zaituela, baina Moodlek ez du erabiltzaile-atributurik jaso. Zure nortasun-emaileak beharrezkoak diren ({$a}) atributuak Moodle egikaritzen ari den Zerbitzu Emaileari pasa dizkiola ziurtatu, edo zerbitzari honetako webmasterrari jakinarazi.';
$string['shib_not_all_attributes_error'] = 'Moodle Shibboleth-en atributu batzuk behar ditu, kasu honetan agertzen ez direnak. Atributuak hauek dira: {$a}<br />Mesedez, web masterrarekin edo nortasun-emailearekin harremanetan jarri.';
$string['shib_not_set_up_error'] = 'Ez dirudi Shibboleth autentifikazioa zuzena denik orri honetan Shibboleth-en testuinguruko aldagaiak ez daudelako. Shibboleth autentikazioa nola definitzen den jakin nahi baduzu, <a href="README.txt">README</a> fitxategia kontsultatu edo Moodle-ren instalazio honetako web masterrarekin harremanetan jarri, mesedez.';
