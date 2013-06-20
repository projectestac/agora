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
 * Strings for component 'qtype_calculated', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_calculated
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additem'] = 'Adicionar conjunto';
$string['addmoreanswerblanks'] = 'Adicionar mais um campo de resposta';
$string['addmoreunitblanks'] = 'Adicionar mais {$a} campos de unidades';
$string['addsets'] = 'Adicionar conjunto(s)';
$string['answerhdr'] = 'Resposta';
$string['answerstoleranceparam'] = 'Configuração da tolerância das respostas';
$string['answerwithtolerance'] = '{$a->answer} (±{$a->tolerance} {$a->tolerancetype})';
$string['anyvalue'] = 'Qualquer valor';
$string['atleastoneanswer'] = 'Tem que inserir pelo menos uma resposta.';
$string['atleastonerealdataset'] = 'Deve existir pelo menos um conjunto de dados real no texto da pergunta';
$string['atleastonewildcard'] = 'Deve existir pelo menos uma variável <strong>{x..}</strong> no texto da pergunta e na fórmula da resposta';
$string['calcdistribution'] = 'Distribuição';
$string['calclength'] = 'Casas decimais';
$string['calcmax'] = 'Máximo';
$string['calcmin'] = 'Mínimo';
$string['choosedatasetproperties'] = 'Configure as séries numéricas associadas às variáveis';
$string['choosedatasetproperties_help'] = 'Uma série numérica é um conjunto de valores numéricos que serão inseridos no lugar de uma variável da pergunta. Pode criar uma série numérica privada para uma pergunta específica, ou uma série numérica partilhada que pode ser usada por outra pergunta numérica com variáveis dentro da mesma categoria.';
$string['correctanswerformula'] = 'Fórmula da resposta';
$string['correctanswershows'] = 'Formatar resposta com';
$string['correctanswershowsformat'] = 'Tipo de formato';
$string['correctfeedback'] = 'Para qualquer resposta correta';
$string['dataitemdefined'] = 'com {$a} valores numéricos já definidos está disponível';
$string['datasetrole'] = 'As variáveis <strong>{x..}</strong> serão substituídas por um valor numérico da respetiva série numérica';
$string['decimals'] = 'com {$a}';
$string['deleteitem'] = 'Apagar conjunto';
$string['deletelastitem'] = 'Apagar último conjunto';
$string['distributionoption'] = 'Selecione a opção de distribuição';
$string['editdatasets'] = 'Editar os conjuntos de valores das variáveis';
$string['editdatasets_help'] = 'Os conjuntos de valores das variáveis podem ser criados introduzindo um valor para cada variável e clicando em seguida no botão adicionar. Para gerar automaticamente 10 ou mais conjuntos de valores, selecione o número de conjuntos pretendido e clique no botão adicionar. Uma distribuição uniforme significa que qualquer valor dentro dos limites tem a mesma probabilidade ocorrer; numa distribuição log-uniforme  os valores mais próximos do limite  inferior têm maior probabilidade de ocorrer.';
$string['editdatasets_link'] = 'pergunta/tipo/numericacomvariaveis';
$string['existingcategory1'] = 'terá por base uma série numérica partilhada já existente';
$string['existingcategory2'] = 'um ficheiro de um conjunto de ficheiros já existente que é usado noutras perguntas nesta categoria';
$string['existingcategory3'] = 'um link de um conjunto de links já existente que é usado noutras perguntas nesta categoria';
$string['forceregeneration'] = 'Forçar regeneração';
$string['forceregenerationall'] = 'Forçar regeneração de todas as séries numéricas';
$string['forceregenerationshared'] = 'Forçar regeneração apenas das séries não partilhadas';
$string['functiontakesatleasttwo'] = 'A função {$a} necessita no mínimo de dois argumentos';
$string['functiontakesnoargs'] = 'A função {$a} não possui nenhuns argumentos';
$string['functiontakesonearg'] = 'A função {$a} tem de ter exatamente um argumento';
$string['functiontakesoneortwoargs'] = 'A função {$a} tem de ter um ou dois argumentos';
$string['functiontakestwoargs'] = 'A função {$a} tem de ter exatamente dois argumentos';
$string['generatevalue'] = 'Gerar um novo valor entre';
$string['getnextnow'] = 'Gerar novo \'Conjunto a adicionar\' sem adicionar o atual';
$string['hexanotallowed'] = 'No conjunto de valores <strong>{$a->name}</strong> o formato hexadecimal  $a->value não é permitido';
$string['illegalformulasyntax'] = 'Síntaxe de fórmula inválida a começar com {$a}';
$string['incorrectfeedback'] = 'Para qualquer resposta incorreta';
$string['itemno'] = 'Conjunto {$a}';
$string['itemscount'] = 'Total de <br />itens';
$string['itemtoadd'] = 'Conjunto a adicionar';
$string['keptcategory1'] = 'terá por base a série numérica partilhada já existente';
$string['keptcategory2'] = 'um ficheiro do mesmo conjunto reutilizável de ficheiros da categoria, como anteriormente';
$string['keptcategory3'] = 'um link do mesmo conjunto reutilizável de links da categoria, como anteriormente';
$string['keptlocal1'] = 'terá por base a série numérica privada já existente';
$string['keptlocal2'] = 'um ficheiro do mesmo conjunto privado de ficheiros da pergunta, como anteriormente';
$string['keptlocal3'] = 'um link do mesmo conjunto privado de links da pergunta, como anteriormente';
$string['lengthoption'] = 'Selecione a opção de amplitude';
$string['loguniform'] = 'Log-uniforme';
$string['loguniformbit'] = 'dígitos, de uma distribuição loguniform';
$string['makecopynextpage'] = 'Página seguinte (nova pergunta)';
$string['mandatoryhdr'] = 'Variáveis presentes nas respostas';
$string['max'] = 'Max';
$string['min'] = 'Min';
$string['minmax'] = 'Intervalo de variação';
$string['missingformula'] = 'A fórmula está em falta';
$string['missingname'] = 'O nome da pergunta está em falta';
$string['missingquestiontext'] = 'O texto da pergunta está em falta';
$string['mustbenumeric'] = 'Tem que introduzir um número';
$string['mustenteraformulaorstar'] = 'Tem de inserir uma fórmula ou \'*\'.';
$string['mustnotbenumeric'] = 'Não pode ser um número';
$string['newcategory1'] = 'terá por base uma nova série numérica partilhada';
$string['newcategory2'] = 'um ficheiro de um novo conjunto de ficheiros que também poderá ser usado por outras perguntas nesta categoria';
$string['newcategory3'] = 'um link de um novo conjunto de links que também poderá ser usado por outras perguntas nesta categoria';
$string['newlocal1'] = 'terá por base uma nova série numérica privada';
$string['newlocal2'] = 'um ficheiro de um novo conjunto de ficheiros que só será usado nesta pergunta';
$string['newlocal3'] = 'um link de um novo conjunto de links que só será usada nesta pergunta';
$string['newsetwildcardvalues'] = 'novos conjunto(s) de valores das variáveis';
$string['nextitemtoadd'] = 'Próximo \'Conjunto a adicionar';
$string['nextpage'] = 'Página seguinte';
$string['nocoherencequestionsdatyasetcategory'] = 'Para a pergunta com o id {$a->qid}, a categoria com o id {$a->qcat} não é idêntica à da variável partilhada {$a->name} da categoria com o id {$a->sharedcat}. Edite a pergunta.';
$string['nocommaallowed'] = 'A , não pode ser usada, use o . como em 0.013 ou 1.3e-2';
$string['nodataset'] = 'nada - não é uma variável';
$string['nosharedwildcard'] = 'Não existem séries numéricas partilhadas nesta categoria';
$string['notvalidnumber'] = 'O valor da variável não é um número válido';
$string['oneanswertrueansweroutsidelimits'] = 'Pelo menos uma resposta correta está fora dos limites dos valores.<br />Modifique as configurações das margens de erro das respostas';
$string['param'] = 'Variável {<strong>{$a}</strong>}';
$string['partiallycorrectfeedback'] = 'Para qualquer resposta parcialmente correta';
$string['pluginname'] = 'Numérica com variáveis';
$string['pluginnameadding'] = 'A adicionar pergunta numérica com variáveis';
$string['pluginnameediting'] = 'A editar pergunta numérica com variáveis';
$string['pluginname_help'] = 'A pergunta Numérica com variáveis permite criar perguntas numéricas com variáveis <strong>{x..}</strong> que são substituídas por diferentes valores em cada nova tentativa de resolução. Por exemplo, a pergunta "Qual a área do retângulo de comprimento {l} e largura {w}?" teria como fórmula correta de resposta "{l}*{w}" (onde * é o símbolo de multiplicação).';
$string['pluginname_link'] = 'pergunta/tipo/numericacomvariaveis';
$string['pluginnamesummary'] = 'As perguntas numéricas com variáveis são idênticas às perguntas numéricas mas em que os números apresentados são selecionados aleatoriamente de uma série de conjuntos de valores definida previamente.';
$string['possiblehdr'] = 'Possíveis variáveis presentes apenas no texto da pergunta';
$string['questiondatasets'] = 'Conjunto de valores da pergunta';
$string['questiondatasets_help'] = 'Conjuntos de valores das variáveis das perguntas que serão usados em cada pergunta individual';
$string['questionstoredname'] = 'Nome da pergunta guardado';
$string['replacewithrandom'] = 'Substituir por um valor aleatório';
$string['reuseifpossible'] = 'Usar valor já existente na série, se disponível';
$string['setno'] = 'Conjunto {$a}';
$string['setwildcardvalues'] = 'Conjunto(s) de valores das variáveis';
$string['sharedwildcard'] = 'Série partilhada <strong>{$a}</strong>';
$string['sharedwildcardname'] = 'Série partilhada';
$string['sharedwildcards'] = 'Séries partilhadas';
$string['showitems'] = 'Mostrar';
$string['significantfigures'] = 'com {$a}';
$string['significantfiguresformat'] = 'algarismos significativos';
$string['synchronize'] = 'Sincronizar os dados das séries numéricas partilhadas com outras perguntas do teste';
$string['synchronizeno'] = 'Não sincronizar';
$string['synchronizeyes'] = 'Sincronizar';
$string['synchronizeyesdisplay'] = 'Sincronizar e mostrar o nome das séries numéricas partilhadas como prefixo do nome da pergunta';
$string['tolerance'] = 'Tolerância &plusmn;';
$string['trueanswerinsidelimits'] = 'Resposta correta : {$a->correct} dentro dos limites do valor aceite de {$a->true}';
$string['trueansweroutsidelimits'] = '<span class="error">ERRO resposta correta : {$a->correct} fora dos limites do valor aceite {$a->true}</span>';
$string['uniform'] = 'Uniforme';
$string['uniformbit'] = 'decimais, a partir de uma distribuição uniforme';
$string['unsupportedformulafunction'] = 'A função {$a} não é suportada';
$string['updatecategory'] = 'Atualizar a categoria';
$string['updatedatasetparam'] = 'Atualizar os parâmetros das séries numéricas';
$string['updatetolerancesparam'] = 'Atualizar a configuração da tolerância das respostas';
$string['updatewildcardvalues'] = 'Atualizar os valores das variáveis';
$string['useadvance'] = 'Usar o botão avançado para visualizar os erros';
$string['usedinquestion'] = 'Usado na pergunta';
$string['wildcard'] = 'Série privada  {<strong>{$a}</strong>}';
$string['wildcardparam'] = 'Parâmetros usados para gerar valores das séries';
$string['wildcardrole'] = 'As variáveis <strong>{x..}</strong> serão substituídas por um valor numérico a partir dos valores gerados';
$string['wildcards'] = 'Séries {a}...{z}';
$string['wildcardvalues'] = 'Valores das séries numéricas';
$string['wildcardvaluesgenerated'] = 'Valores gerados das séries numéricas';
$string['youmustaddatleastoneitem'] = 'Deve adicionar pelo menos um conjunto de valores para poder guardar esta pergunta';
$string['youmustaddatleastonevalue'] = 'Deve adicionar pelo menos um conjunto de valores das variáveis para poder guardar esta pergunta';
$string['youmustenteramultiplierhere'] = 'Tem que introduzir um multiplicador aqui';
$string['zerosignificantfiguresnotallowed'] = 'A resposta correta não pode ter zero algarismos significativos!';
