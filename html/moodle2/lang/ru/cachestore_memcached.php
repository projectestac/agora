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
 * Strings for component 'cachestore_memcached', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_memcached
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bufferwrites'] = 'Буферизованная запись';
$string['bufferwrites_help'] = 'Включает или отключает буферизацию ввода/вывода. Включение буферизации ввода/вывода вызывает хранение команд в «буфере» вместо их  отправки. Любое действие, которое извлекает данные, вызывает отправку этого буфера к удаленному подключению. Завершение соединения или полное закрытие соединения также вызовет передачу данных буфера к удаленному подключению.';
$string['hash'] = 'Хэш-метод';
$string['hash_crc'] = 'CRC';
$string['hash_default'] = 'По умолчанию (хэш-функция Дженкинса)';
$string['hash_fnv1_32'] = 'FNV1_32';
$string['hash_fnv1_64'] = 'FNV1_64';
$string['hash_fnv1a_32'] = 'FNV1A_32';
$string['hash_fnv1a_64'] = 'FNV1A_64';
$string['hash_help'] = 'Задает алгоритм хэширования, используемый для ключей элементов. Каждый алгоритм хэширования имеет свои преимущества и свои недостатки. Используйте значение по умолчанию, если Вы не знаете, что выбрать или Вам всё-равно.';
$string['hash_hsieh'] = 'Hsieh';
$string['hash_md5'] = 'MD5';
$string['hash_murmur'] = 'Murmur';
$string['pluginname'] = 'Memcached';
$string['prefix'] = 'Префикс ключа';
$string['prefix_help'] = 'Может использоваться для создания «домена» для ключей элементов. Это позволяет создать несколько хранилищ memcahced на одной инсталляции memcahced. В связи с ограничением на длину ключа префикс не может быть длиннее 16 символов.';
$string['prefixinvalid'] = 'Неверный префикс. Вы можете использовать только a-z A-Z 0-9-_.';
$string['serialiser_igbinary'] = 'Сериализатор IGBINARY.';
$string['serialiser_json'] = 'Сериализатор JSON.';
$string['serialiser_php'] = 'Сериализатор PHP по умолчанию';
$string['servers'] = 'Серверы';
$string['servers_help'] = 'Перечень серверов, которые  будут использованы как устройства кэширования в памяти. Серверы должны быть перечислены по одному на строке и состоять из адреса сервера, порта и веса. Если порт не представлен, то используется порт по умолчаниют (11211) . Например: <pre> server.url.com
IP-адрес:порт
имя_сервера:порт:вес </pre>';
$string['testservers'] = 'Тестовые серверы';
$string['testservers_desc'] = 'Тестовые серверы используются для модульного тестирования и для тестирования производительности. Совершенно не обязательно указывать тестовые серверы. Серверы должны указываться по одному в строке и состоять из адреса сервера и необязательных порта и веса.
Если порт не задан, то используется порт по умолчанию (11211).';
$string['usecompression'] = 'Использовать сжатие';
$string['usecompression_help'] = 'Включение или выключение сжатия значений. При включеннии этого параметра элементы, размер которых больше некоторого порога (в настоящее время 100 байт) будут незаметно сжиматься при сохранении и распаковываться при извлечении.';
$string['useserialiser'] = 'Использовать сериализатор';
$string['useserialiser_help'] = 'Определяет сериализатор, который будет использоваться для сериализации нескалярных значений. Допустимые сериализаторы -  Memcached::SERIALIZER_PHP и Memcached::SERIALIZER_IGBINARY. Последний поддерживается только в случае, если Memcached собран с опцией --enable-memcached-igbinary и загружено расширение igbinary.';
