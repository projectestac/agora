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
 * Strings for component 'qtype_randomsamatch', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_randomsamatch
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['nosaincategory'] = 'Det finns inga kortsvars-frågor i den kategori \'{$a->catname}\' som Du valde. Välj en annan kategori, och producera några frågor i den kategorin.';
$string['notenoughsaincategory'] = 'Det finns bara {$a->nosaquestions} kortsvars-frågor i den kategori \'{$a->catname}\' som Du valde. Välj en annan kategori, och producera några fler frågor i den kategorin eller reducera det antal frågor som Du har valt.';
$string['pluginname'] = 'Slumpmässiga korta svar matchning';
$string['pluginnameadding'] = 'Lägga till en slumpmässig kort svar matchningsfråga';
$string['pluginnameediting'] = 'Redigera en slumpmässig kort svar matchningsfråga';
$string['pluginname_help'] = 'Från elevens perspektiv ser detta bara ut som en matchningsfråga. Skillnaden är att listan med namn eller påståenden (frågor) för matchning hämtas slumpmässigt från kortsvarsfrågora i den aktuella kategorin. Det bör finnas tillräckligt med oanvända kortsvarsfrågor i kategorin, annars kommer ett felmeddelande att visas.';
$string['pluginnamesummary'] = 'Som en matchningsfråga, dock skapad slumpmässigt från de kortsvarsfrågorna i en viss kategori.';
