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
 * Strings for component 'cachestore_file', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_file
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autocreate'] = 'Criar diretoria automaticamernte';
$string['autocreate_help'] = 'Se ativado, e caso ainda não exista, o diretório especificado no caminho será automaticamente criado.';
$string['path'] = 'Caminho da cache';
$string['path_help'] = 'Diretoria que deverá ser usada para armazenar ficheiros para esta cache. Se deixado em branco (configurado por predefinição) uma diretoria será automaticamente criada na diretoria moodledata. Isto pode ser usado para apontar um armazenamento de ficheiros numa uma diretoria com melhor desempenho da unidade (tal como uma na memória).';
$string['pluginname'] = 'Ficheiro da cache';
$string['prescan'] = 'Pré-verificação da diretoria';
$string['prescan_help'] = 'Se ativado, a diretoria é verificada quando a cache é usada pela primeira vez e os pedidos de ficheiros são verificados primeiro contra os dados de verificação. Isto pode ser útil se tiver um sistema de ficheiros lento e constatar que as operações de ficheiros estão a causar um congestionamento.';
$string['singledirectory'] = 'Armazenamento único de diretoria';
$string['singledirectory_help'] = 'Se os ficheiros disponíveis (itens armazenados em cache) forem armazenados numa única diretoria ao invés de serem divididos em várias diretorias. <br />
Ativar esta funcionalidade irá acelerar as interações de ficheiro, porém causará um aumento do risco de atingir as limitações do sistema de ficheiros. <br />
É aconselhável que ative esta funcionalidade apenas se: <br />
   - Souber que o número de itens na cache vai ser suficientemente pequeno para não causar problemas no sistema de ficheiros com que está a executar. <br />
   - Os dados que estão a ser armazenados em cache não forem dispendiosos de gerar. Se forem, manter a configuração predefinida poderá ser a melhor opção, uma vez que reduz a probabilidade de gerar problemas.';
