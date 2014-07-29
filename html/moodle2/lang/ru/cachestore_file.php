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
 * Strings for component 'cachestore_file', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_file
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autocreate'] = 'Автоматическое создание каталога';
$string['autocreate_help'] = 'При включении этого параметра по указанному пути будет автоматически создан каталог, если он еще не существует.';
$string['path'] = 'Путь к кэшу';
$string['path_help'] = 'Каталог, в который будут сохраняться файлы, используемые этим хранилищем кэша. Здесь можно указать каталог на более производительном диске (например, созданном в памяти). Если оставить поле пустым (по умолчанию), то каталог будет автоматически создан в каталоге moodledata.';
$string['pluginname'] = 'Кэш в файловой системе';
$string['prescan'] = 'Предварительное сканирование каталога';
$string['prescan_help'] = 'Если параметр включен, то при первом использовании кэша каталог сканируется и наличие файлов сначала проверяются по полученному списку файлов. Это может помочь, если у вас медленная файловая система и операции с поиском файлов являются узким местом.';
$string['singledirectory'] = 'Хранить в одном каталоге';
$string['singledirectory_help'] = 'При включении этого параметра файлы (кэшированные элементы) будут храниться в одном каталоге, а не будут разбиты на несколько каталогов.<br />Это ускорит взаимодействие с файлами, но повысит риск возникновения проблем из-за ограничений файловой системы.<br />Рекомендуется включать параметр только при соблюдении следующих условий:<br /> - Если Вы знаете, что количество элементов в кэше будет достаточно мало и это не приведет к проблемам в Вашей файловой системе.<br /> - Не требуется больших затрат на посторную генерацию данных в кэше. При этом придерживаться значений по умолчанию все еще может быть лучшим вариантом, так как это снижает вероятность проблем.';
