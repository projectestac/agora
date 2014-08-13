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
 * Strings for component 'grading', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   grading
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activemethodinfo'] = '\'{$a->method}\' is gekozen als beoordelingsmethode voor de zone \'{$a->area}\'.';
$string['activemethodinfonone'] = 'Er is geen geavanceerde beoordelingsmethode geselecteerd voor de \'{$a->area}\' zone. Eenvoudig rechtstreeks beoordelen zal gebruikt worden';
$string['changeactivemethod'] = 'Wijzig de beoordelingsmethode naar';
$string['clicktoclose'] = 'klik om te sluiten';
$string['exc_gradingformelement'] = 'Kon beoordelingsformulierelement niet instantiëren';
$string['formnotavailable'] = 'Geavanceerd beoordelen was geselecteerd, maar het beoordelingsformulier is nog niet beschikbaar. Je moet het eerst maken via een link in het instellingenblok.';
$string['gradingformunavailable'] = 'Merk op: het formulier voor geavanvceerd beoordelen is nog niet klaar op dit ogenblik. Eenvoudig beoordelen zal gebruikt worden tot het beoordelingsformulier geldig is.';
$string['gradingmanagement'] = 'Geavanceerd beoordelen';
$string['gradingmanagementtitle'] = 'Geavanceerd beoordelen: {$a->component} ({$a->area})';
$string['gradingmethod'] = 'Beoordelingsmethode';
$string['gradingmethod_help'] = 'Kies de geavanceerde beoordelingsmethode die zou moeten gebruikt worden voor het berekenen van de cijfers in de gegeven context.

Om geavanceerd beoordelen uit te schakelen en terug te gaan naar het standaard beoordelingsmechanisme, kies \'Eenvoudig rechtstreeks beoordelen\'';
$string['gradingmethodnone'] = 'Eenvoudig rechtstreeks beoordelen';
$string['gradingmethods'] = 'Beoordelingsmethodes';
$string['manageactionclone'] = 'Maak een nieuw beoordelingsformulier van een sjabloon';
$string['manageactiondelete'] = 'Verwijder de huidige formulierdefinitie';
$string['manageactiondeleteconfirm'] = 'Je gaat nu beoordelingsformulier \'{$a->formname}\' en alle geassocieerde informatie van \'{$a->component}\' (\'{$a->area}\') verwijderen. Zorg ervoor dat je volgende consequenties begrijpt:

* Je kunt deze operatie niet ongedaan maken
* Je kunt naar een andere beoordelingsmethode, zoals \'Eenvoudig rechtstreeks beoordelen\', overschakelen zonder dit formulier te verwijderen.
* Alle informatie over hoe de beoordelingsformulieren gevuld zijn zal verloren gaan.
* De berekende resultaatscijfers die in het puntenboek staan zullen niet gewijzigd worden. De manier waarop ze bekomen werden zal niet meer beschikbaar zijn.
* Deze operatie heeft geen invloed op eventuele kopieën van dit formulier die in andere activiteiten gebruikt worden.';
$string['manageactiondeletedone'] = 'Het formulier is verwijderd';
$string['manageactionedit'] = 'Bewerk de huidige formulierdefinitie';
$string['manageactionnew'] = 'Definieer een nieuw beoordelingsformulier';
$string['manageactionshare'] = 'Publiceer het formulier als een nieuw sjabloon';
$string['manageactionshareconfirm'] = 'Je gaat een kopie bewaren van het beoordelingsfomulier \'{$a}\' als een nieuw publiek sjabloon. Andere gebruikers op de site kunnen nieuwe beoordelingsformulieren maken, gebaseerd op dat sjabloon.';
$string['manageactionsharedone'] = 'Het formulier is bewaard als sjabloon';
$string['noitemid'] = 'Beoordeling niet mogelijk; Het beoordeelde item bestaat niet;';
$string['nosharedformfound'] = 'Geen sjabloon gevonden';
$string['searchownforms'] = 'voeg mijn eigen formulieren toe';
$string['searchtemplate'] = 'Beoordelingsformulieren zoeken';
$string['searchtemplate_help'] = 'Je kunt zoeken naar een beoordelingsformulier en het hier als sjabloon gebruiken voor een nieuw beoordelingsformulier. Typ woorden die in de formuliernaam, de beschrijving of in het formulier zelf zouden moeten voorkomen. Om een zin te zoeken, plaats je de woorden tussen dubbele aanhalingstekens.

Standaard worden alleen beoordelingsformulieren die als gedeelde sjablonen bewaard zijn getoond. Je kunt ook al je eigen formulieren in de zoekresultaten opnemen. Hiermee kun je eenvoudig je eigen formulieren hergebruiken zonder ze te moeten delen. Enkel formulieren die gemarkeerd zijn met \'Klaar voor gebruik\' kunnen op deze manier herbruikt worden.';
$string['statusdraft'] = 'Klad';
$string['statusready'] = 'Klaar voor gebruik';
$string['templatedelete'] = 'Verwijder';
$string['templatedeleteconfirm'] = 'Je gaat dit gedeelde sjabloon \'{$a}\' verwijderen. Het verwijderen van een sjabloon heeft geen invloed op bestaande formulieren die er op gebaseerd zijn.';
$string['templateedit'] = 'Bewerk';
$string['templatepick'] = 'Gebruik dit sjabloon';
$string['templatepickconfirm'] = 'Wil je beoordelingsformulier \'{$a->formname}\' gebruiken als sjabloon voor het nieuwe beoordelingsformulier in \'{$a->component} ({$a->area})\'?';
$string['templatepickownform'] = 'Gebruik dit formulier als sjabloon';
$string['templatesource'] = 'Plaats: {$a->component} ({$a->area})';
$string['templatetypeown'] = 'Eigen formulier';
$string['templatetypeshared'] = 'Gedeeld sjabloon';
