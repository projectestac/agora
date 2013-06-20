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
 * Strings for component 'assignfeedback_offline', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   assignfeedback_offline
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmimport'] = 'Confirmar a importação de notas';
$string['default'] = 'Ativo por predefinição';
$string['default_help'] = 'Se ativar esta opção, a avaliação por carregamento de ficheiro será configurada como ativa, por predefinição, para todos os novos trabalhos.';
$string['downloadgrades'] = 'Descarregar ficheiro para avaliação';
$string['enabled'] = 'Ficheiro de avaliação';
$string['enabled_help'] = 'Se ativar esta opção, o professor poderá descarregar e carregar ficheiro com as notas dos alunos quando estiver a avaliar os trabalhos.';
$string['feedbackupdate'] = 'Definir o campo "{$a->field}" do aluno "{$a->student}" para "{$a->text}"';
$string['gradelockedingradebook'] = 'A nota foi bloqueada na pauta para {$a}';
$string['graderecentlymodified'] = 'A nota foi alterada no Moodle mais recentemente do que no ficheiro de avaliação para {$a}';
$string['gradesfile'] = 'Ficheiro de avaliação (formato CSV)';
$string['gradesfile_help'] = '&quot;Ficheiro de avaliação com notas alteradas. Este ficheiro tem de ser um ficheiro no formato CSV, descarregado a partir deste trabalho e tem de conter colunas para a nota e identificador do aluno. A codificação para o ficheiro deve ser &quot;UTF-8&quot;';
$string['gradeupdate'] = 'Definir a nota do aluno {$a->student} para {$a->grade}';
$string['ignoremodified'] = 'Permitir a atualização de registos que foram modificados mais recentemente no Moodle do que no Ficheiro de avaliação.';
$string['ignoremodified_help'] = 'Quando é descarregado a partir do Moodle, o ficheiro para avaliação contém a data da última modificação para cada uma das notas. Se alguma nota for atualizada no Moodle depois deste ficheiro ser descarregado, o Moodle irá recusar, por predefinição, a substituição desta informação atualizada quando importar as notas. Se ativar esta opção o Moodle não fará esta verificação de segurança, sendo possível que múltiplos avaliadores substituam as notas uns dos outros.';
$string['importgrades'] = 'Confirme as alterações no ficheiro de avaliação';
$string['invalidgradeimport'] = 'O Moodle não conseguiu ler o ficheiro carregado. Assegure-se que o ficheiro foi gravado no formato .csv (valores separados por vírgula) e tente novamente.';
$string['nochanges'] = 'Não foram encontradas notas alteradas no ficheiro carregado';
$string['offlinegradingworksheet'] = 'Notas';
$string['pluginname'] = 'Ficheiro de avaliação';
$string['processgrades'] = 'Importar notas';
$string['skiprecord'] = 'Saltar registo';
$string['updatedgrades'] = 'Atualizadas {$a} notas e feedback';
$string['updaterecord'] = 'Atualizar registo';
$string['uploadgrades'] = 'Carregar ficheiro de avaliação';
