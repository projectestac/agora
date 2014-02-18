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
 * Strings for component 'condition', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   condition
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcompletions'] = 'Adicionar {no} condições de atividade';
$string['addgrades'] = 'Adicionar {no} condições de nota';
$string['adduserfields'] = 'Adicionar {no} campos de condições do utilizador ao formulário';
$string['availabilityconditions'] = 'Condições de acesso';
$string['availablefrom'] = 'Permitir acesso de';
$string['availablefrom_help'] = 'A opção \'Permitir acesso de/até\' determina o intervalo de datas em que os alunos podem aceder à atividade a partir da respetiva hiperligação na página da disciplina.

A diferença entre a opção \'Permitir acesso de/até\' e as configurações de disponibilidade da atividade é que estas permitem que os alunos vejam a descrição da atividade, ainda que fora das datas, enquanto que a opção \'Permitir acesso de/até\' impede o total acesso à atividade fora do intervalo de datas estabelecido.';
$string['availableuntil'] = 'Permitir acesso até';
$string['badavailabledates'] = 'Datas inválidas. Se ativar ambas as datas, a data de inicio deverá ser anterior à de fim.';
$string['badgradelimits'] = 'Se definir uma nota mínima e máxima, a  máxima deve ser superior à mínima.';
$string['completion_complete'] = 'deve estar concluída';
$string['completioncondition'] = 'A atividade';
$string['completioncondition_help'] = 'Esta configuração determina as condições que o aluno deve cumprir relativamente à conclusão de outras atividades para que possa aceder a esta atividade. Note que para que possam ser definidas condições relativas à conclusão de atividades, deverá ter ativado previamente o controlo da conclusão dessas atividades.

Pode adicionar várias condição de conclusão, se necessitar. O acesso à atividade apenas será permitido quando o aluno cumpre TODAS as condições estabelecidas.';
$string['completionconditionsection'] = 'Condições de conclusão de atividade';
$string['completionconditionsection_help'] = 'Esta configuração determina as condições de conclusão de atividades que o aluno deve cumprir para podser aceder à secção (tópico ou semana). Note que para que possam ser definidas condições relativas à conclusão de atividades, deverá ter ativado previamente o controlo da conclusão dessas atividades.

Pode adicionar várias condição de conclusão, se necessitar. O acesso à secção apenas será permitido quando o aluno cumpre TODAS as condições estabelecidas.';
$string['completion_fail'] = 'deve estar concluída com nota de reprovação';
$string['completion_incomplete'] = 'não deve estar concluída';
$string['completion_pass'] = 'deve estar concluída com nota de aprovação';
$string['configenableavailability'] = 'Se ativar esta opção poderá definir em cada atividade ou secção as condições necessárias (baseadas na data, notas ou conclusão de outras atividades) para um aluno poder aceder à atividade.';
$string['contains'] = 'contém';
$string['doesnotcontain'] = 'não contém';
$string['enableavailability'] = 'Ativar condições de acesso';
$string['endswith'] = 'terminado em';
$string['fielddeclaredmultipletimes'] = 'Não pode declarar o mesmo campo mais do que uma vez por atividade.';
$string['grade_atleast'] = 'deve ser pelo menos';
$string['gradecondition'] = 'A nota de';
$string['gradecondition_help'] = 'Esta configuração determina condições de nota que o aluno deve cumprir para aceder à atividade.

Se desejar pode configurar várias condições de notas. Nesse caso, o aluno apenas poderá aceder à atividade quando cumpre TODAS as condições de notas.';
$string['gradeconditionsection'] = 'Condição de nota';
$string['gradeconditionsection_help'] = 'Esta configuração determina uma condição de nota necessária para aceder à secção (tópico ou semana).

Se desejar pode configurar várias condições de notas. Nesse caso, o aluno apenas poderá aceder à secção quando cumprir TODAS as condições.';
$string['gradeitembutnolimits'] = 'Deve inseirr uma nota máxima, miníma ou ambas.';
$string['gradelimitsbutnoitem'] = 'Deve selecionar uma atividade';
$string['gradesmustbenumeric'] = 'A nota máxima e mínima deve ser numérica (ou em branco)';
$string['grade_upto'] = 'e menor que';
$string['groupingnoaccess'] = 'Atualmente não pertence a nenhum grupo com permissão de acesso a este tópico';
$string['isempty'] = 'está vazio';
$string['isequalto'] = 'é igual a';
$string['isnotempty'] = 'não está vazio';
$string['none'] = '(nenhum)';
$string['notavailableyet'] = 'Ainda não está disponível';
$string['requires_completion_0'] = 'Disponível apenas quando a atividade <strong>{$a}</strong> não está concluída.';
$string['requires_completion_1'] = 'Disponível depois de concluir a atividade <strong>{$a}</strong>.';
$string['requires_completion_2'] = 'Disponível depois de concluir com aprovação a atividade <strong>{$a}</strong>.';
$string['requires_completion_3'] = 'Disponível depois de concluir sem aprovação a atividade  <strong>{$a}</strong>.';
$string['requires_date'] = 'Disponível a partir de {$a}.';
$string['requires_date_before'] = 'Disponível até {$a}';
$string['requires_date_both'] = 'Disponível de {$a->from} até {$a->until}.';
$string['requires_date_both_single_day'] = 'Disponível em {$a}';
$string['requires_grade_any'] = 'Disponível depois de ter avaliação em <strong>{$a}</strong>.';
$string['requires_grade_max'] = 'Disponível depois de ter uma avaliação apropriada em <strong>{$a}</strong>.';
$string['requires_grade_min'] = 'Disponível depois de ter a avaliação exigida em <strong>{$a}</strong>.';
$string['requires_grade_range'] = 'Disponível depois de ter uma avaliação específica em <strong>{$a}</strong>.';
$string['requires_user_field_contains'] = 'Não está disponível a não ser que o seu <strong>{$a->field}</strong> contains <strong>{$a->value}</strong>.';
$string['requires_user_field_doesnotcontain'] = 'Não disponível se o seu <strong>{$a->field}</strong> contains <strong>{$a->value}</strong>.';
$string['requires_user_field_endswith'] = 'Não está disponível a não ser que o seu <strong>{$a->field}</strong> termine com <strong>{$a->value}</strong>.';
$string['requires_user_field_isempty'] = 'Não está disponível a não ser que o seu <strong>{$a->field}</strong> esteja vazio.';
$string['requires_user_field_isequalto'] = 'Não está disponível a não ser que o seu <strong>{$a->field}</strong> seja igual a <strong>{$a->value}</strong>.';
$string['requires_user_field_isnotempty'] = 'Não está disponível se o seu <strong>{$a->field}</strong> estiver vazio.';
$string['requires_user_field_startswith'] = 'Não está disponível a não ser que o seu <strong>{$a->field}</strong> inicie com <strong>{$a->value}</strong>.';
$string['showavailability'] = 'Quando a atividade está indisponível';
$string['showavailability_hide'] = 'Esconder completamente a atividade';
$string['showavailabilitysection'] = 'Antes da secção ser acedida';
$string['showavailabilitysection_hide'] = 'Esconder toda a secção';
$string['showavailabilitysection_show'] = 'Mostrar a secção em cor cinzenta, com informação sobre indisponibilidade';
$string['showavailability_show'] = 'Mostrar atividade em cor cinzenta, com informação sobre a indisponibilidade';
$string['startswith'] = 'começa com';
$string['userfield'] = 'Campo do utilizador';
$string['userfield_help'] = 'Pode restringir o acesso baseando-se em qualquer campo do perfil dos utilizadores.';
$string['userrestriction_hidden'] = 'Indisponível (completamente oculto, sem mensagem): &lsquo;{$a}&rsquo;';
$string['userrestriction_visible'] = 'Indisponível: &lsquo;{$a}&rsquo;';
