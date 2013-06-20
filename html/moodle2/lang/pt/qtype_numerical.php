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
 * Strings for component 'qtype_numerical', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_numerical
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acceptederror'] = 'Erro aceite';
$string['addmoreanswerblanks'] = 'Adicionar mais {no} campos de opção de resposta';
$string['addmoreunitblanks'] = 'Adicionar mais {no} campos para unidades';
$string['answercolon'] = 'Resposta:';
$string['answermustbenumberorstar'] = 'A resposta deve ser um número, por exemplo -1234 or 3e8,ou \'*\'.';
$string['answerno'] = 'Resposta {$a}';
$string['decfractionofquestiongrade'] = 'como parte decimal (0 a 1) da nota da pergunta';
$string['decfractionofresponsegrade'] = 'como parte decimal (0 a 1) da nota obtida na resposta';
$string['decimalformat'] = 'casas decimais';
$string['editableunittext'] = 'Com o valor numérico';
$string['errornomultiplier'] = 'Deve especificar um multiplicador para esta unidade.';
$string['errorrepeatedunit'] = 'Não pode ter duas unidades com o mesmo nome.';
$string['geometric'] = 'Geométrico';
$string['invalidnumber'] = 'Deve inserir um número válido.';
$string['invalidnumbernounit'] = 'Deve inserir um número válido. Não inclua a unidade na sua resposta.';
$string['invalidnumericanswer'] = 'Uma das respostas que inseriu não é um número válido.';
$string['invalidnumerictolerance'] = 'Uma das tolerâncias que inseriu não é um número válido.';
$string['leftexample'] = 'Esquerda (exemplo: $1.00)';
$string['manynumerical'] = 'A unidade é opcional. Se introduzida, é usada para converter a resposta para a unidade 1.';
$string['multiplier'] = 'Multiplicador';
$string['nominal'] = 'Nominal';
$string['noneditableunittext'] = 'Texto não editável da Unidade 1';
$string['nonvalidcharactersinnumber'] = 'Número com carateres inválidos';
$string['notenoughanswers'] = 'Tem que introduzir pelo menos uma resposta.';
$string['nounitdisplay'] = 'Sem avaliação de Unidades';
$string['numericalmultiplier'] = 'Multiplicador';
$string['numericalmultiplier_help'] = 'O multiplicador é o fator pelo qual a resposta correta será multiplicada.

A primeira unidade (Unidade 1) tem um multiplicador predefinido de 1. Assim, se a resposta correta for 5500 e configurar W como unidade na Unidade 1, que tem 1 como multiplicador predefinido, a resposta correta é 5500 W.

Se adicionar a unidade kW com o multiplicador de  0.001, isto irá tornar igualmente correta a resposta 5.5 kW. Significa assim, que a resposta 5500W ou 5.5kW são ambas consideradas corretas.

Tenha em conta que o erro aceite é também multiplicado, um erro aceite de 100W equivale a um erro de 0.1kW.';
$string['oneunitshown'] = 'A Unidade 1 será exibida automaticamente junto da caixa destinada à resposta numérica.';
$string['onlynumerical'] = 'Não se usam as unidades. Apenas é pedida e avaliada a resposta numérica.';
$string['pleaseenterananswer'] = 'Por favor introduza uma resposta.';
$string['pleaseenteranswerwithoutthousandssep'] = 'Por favor insira a sua resposta sem usar o separador dos milhares ({$a}).';
$string['pluginname'] = 'Numérica';
$string['pluginnameadding'] = 'A adicionar pergunta numérica';
$string['pluginnameediting'] = 'A editar pergunta numérica';
$string['pluginname_help'] = 'Da perspetiva do aluno a pergunta numérica é idêntica a uma pergunta de resposta curta, no entanto as numéricas permitem definir uma margem de erro. Isto permite que uma opção de resposta enquadre um conjunto de respostas possíveis. Por exemplo, se a resposta for 10 com um erro aceite de 2, os números entre 8 e 12 serão aceites como corretos.';
$string['pluginname_link'] = 'pergunta/tipo/numérica';
$string['pluginnamesummary'] = 'Aceita uma resposta numérica, eventualmente com unidades, a qual é avaliada comparando com várias respostas modelo, com eventuais margens de erro.';
$string['relative'] = 'Relativa';
$string['rightexample'] = 'Direita (exemplo: 1.00cm)';
$string['selectunit'] = 'Selecione uma unidade';
$string['selectunits'] = 'Selecione unidades';
$string['studentunitanswer'] = 'Unidade da resposta é introduzida';
$string['tolerancetype'] = 'Tipo de tolerância';
$string['unit'] = 'Unidade';
$string['unitappliedpenalty'] = 'Estas notas incluem penalização de {$a} porque a unidade não foi introduzida ou está incorreta.';
$string['unitchoice'] = 'Escolha múltipla';
$string['unitedit'] = 'Editar unidade';
$string['unitgraded'] = 'A unidade deve ser introduzida e será avaliada.';
$string['unithandling'] = 'Unidade a usar';
$string['unithdr'] = 'Unidade {$a}';
$string['unitincorrect'] = 'Não inseriu uma unidade correta.';
$string['unitmandatory'] = 'Obrigatório';
$string['unitmandatory_help'] = '* A resposta será avaliada de acordo com a unidade selecionada.

* A penalização da unidade será aplicada se o campo da unidade não for preenchido';
$string['unitnotselected'] = 'Nenhuma unidade selecionada';
$string['unitonerequired'] = 'Tem de inserir pelo menos uma unidade.';
$string['unitoptional'] = 'Unidade opcional';
$string['unitoptional_help'] = '* Se o campo da unidade não está vazio, a resposta será avaliada de acordo com esta unidade.


* Se a unidade estiver escrita incorretamente ou for desconhecida, a resposta será considerada como inválida.';
$string['unitpenalty'] = 'Penalização da unidade';
$string['unitpenalty_help'] = 'A penalização é aplicada se

* Uma unidade inválida for inserida no campo de resposta da unidade ou
* Um nome para a unidade for inserido no campo para o elemento numérico da resposta';
$string['unitposition'] = 'Posição da unidade';
$string['unitselect'] = 'Caixa de seleção';
$string['validnumberformats'] = 'Formatos numéricos válidos';
$string['validnumberformats_help'] = '* números regulares  13500.67 : 13 500.67 : 13500,67: 13 500,67

* se usar , como separador dos milhares introduza *sempre* o separador decimal como .
 13,500.67 : 13,500.

* para formas exponenciais, por exemplo 1,350067 * 10<sup>4</sup>,  use
 1,350067 E4 : 1,350067 E04';
$string['validnumbers'] = '13500.67, 13 500.67, 13,500.67, 13500,67, 13 500,67, 1.350067 E4 ou 1.350067 E04';
