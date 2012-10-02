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
 * [EN] Brazilian portuguese strings for jclic
 * [BR] Textos em português do Brasil para jclic 
 *
 * @package    mod
 * @copyright  2012 4Linux Free Software Solutions <http://www.4linux.com.br>
 * @author     Kleber Calegario Batista <klebercal@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Ações';
$string['activity'] = 'Atividade';
$string['activitydone'] = 'Atividades prontas';
$string['activitysolved'] = 'Atividades completadas com sucesso';
$string['attempts'] = 'Tentativas';
$string['avaluation'] = 'Critério de avaliação';
$string['avaluation_score'] = 'Atingindo esta nota global';
$string['avaluation_solved'] = 'Resolvendo este número de diferentes atividades';
$string['description'] = 'Descrição';
$string['height'] = 'Altura';
$string['hideall'] = 'Mostrar apenas sumários';
$string['lastaccess'] = 'Última visita';
$string['maxattempts'] = 'Número máximo de tentativas';
$string['maxgrade'] = 'Pontuação/atividades que devem ser atingidas';
$string['modulename'] = 'JClic';
$string['modulenameplural'] = 'JClic';
$string['msg_noattempts'] = 'Você excedeu o número máximo de tentativas para esta atividade';
$string['msg_nosessions'] = 'Esta atividade JClic ainda não tem uma sessão';
$string['score'] = 'Pontuação';
$string['sessions'] = 'Sessões';
$string['showall'] = 'Mostrar detalhes de todas as sessões';
$string['size'] = 'Tamanho';
$string['starttime'] = 'Data de início';
$string['skin'] = 'Tema';
$string['solved'] = 'Correto';
$string['time'] = 'Tempo';
$string['totals'] = 'Totais';
$string['totaltime'] = 'Tempo total';
$string['unlimited'] = 'Ilimitado';
$string['url'] = 'URL';
$string['width'] = 'Largura';

/* Revision 20071002 */
$string['header_jclic'] = 'Configurações JClic';
$string['header_score'] = 'Configurações da Avaliação';

/* Revision 20091023 */
$string['deleteallsessions'] = 'Apagar todas as sessões';

/* Revision 20110119  - version 0.1.0.11 */
$string['lang'] = 'Idioma';
$string['exiturl'] = 'URL de saída';

/* Revision Moodle 2.X */
$string['availabledate'] = 'Disponível em';
$string['closebeforeopen'] = 'Não foi possível atualizar o jclic. Você especificou uma data de vencimento anterior à data disponível.';
$string['duedate'] = 'Data de vencimento';
$string['exiturl_help'] = 'Esta é a URL que aparece quando um aluno termina a última atividade JClic.

Para fazer este redirecionamento funcionar, é preciso associar a última atividade da aba de Sequências à ação "Saída JClic" na seção da seta Próximo'; 
$string['expired'] = 'Desculpe, esta atividade foi fechada em {$a} e não está mais disponível';
$string['filetype'] = 'Tipo';
$string['filetype_help'] = 'Esta configuração determina como a atividade JClic é incluída no curso. Existem 2 opções disponíveis:

* Upload de arquivo JClic - Habilita um pacote ".jclic.zip" válido para ser escolhido pelo file picker. 
* URL Externa - Habilita uma URL a ser especificada. Nota: A URL deve começar com http(s) ou www, além de conter um arquivo "jclic.zip" válido.';
$string['filetypeexternal'] = 'URL externa';
$string['filetypelocal'] = 'Upload de arquivo JClic';
$string['invalidjclicfile'] = 'Foi informado um JClic inválido. O arquivo deve ter uma extensão ".jclic.zip".';
$string['invalidurl'] = 'Foi informada uma URL inválida. A URL deve começar com http(s) ou www, além de conter um arquivo "jclic.zip" válido.';
$string['jclic'] = 'JClic';
$string['jclicjarbase'] = 'Base Jar';
$string['jclicjarbase_help'] = 'Endereço Web onde estão localizados todos os arquivos JClic jar';
$string['jclicurl'] = 'URL';
$string['jclicurl_help'] = 'Esta configuração habilita a especifiação de uma URL para ser usada pelo pacote JClic, ao invés da escolha de um arquivo através do file picker.';
$string['jclicfile'] = 'Arquivo JClic';
$string['jclicfile_help'] = 'O arquivo ".jclic.zip" contendo os arquivos JClic.';
$string['lap'] = 'Volta';
$string['lap_help'] = 'Tempo entre as transações cliente-servidor (em segundos)';
$string['modulename_help'] = '<a href="http://clic.xtec.cat" target="_blank">JClic</a> é um projeto do Ministério da Educação da Catalunha. 
    Ele consiste em um conjunto de aplicações de código-aberto que permitem a criação de diversos tipos de atividades educacionais multimídia: quebra-cabeças, jogos associativos, atividades de texto, palavras cruzadas, caça-palavras, entre outras.
    Além disso, a <a href="http://clic.xtec.cat/db/listact_ca.jsp" target="_blank">ClicZone</a> oferece um repositório onde mais de mil atividades estão disponíveis.
	Ela foi criada por professores e outros profissionais que querem compartilhar seu trabalho com outras pessoas.

Este módulo possibilita aos professores adicionar atividades JClick a qualquer curso e acompanhar os resultados de seus pupilos (tempo gasto em cada atividade, número de tentativas, nota...).';
$string['notopenyet'] = 'Desculpe, esta atividade não estará disponível até {$a}';
$string['pluginadministration'] = 'Administração do JClic';
$string['pluginname'] = 'JClic';
$string['preview_jclic'] = 'Visualizar atividade JClic';
$string['return_results'] = 'Retornar aos resultados';
$string['show_my_results'] = 'Mostrar resultados';
$string['solveddone'] = 'Atividades resolvidas / concluídas';
$string['urledit'] = 'Arquivos de atividade JClic';
$string['urledit_help'] = 'O arquivo "jclic.zip" onde você vai encontraro pacote da atividade JClic.';

$string['jclic:view'] = 'Visualizar JClic';
$string['jclic:submit'] = 'Enviar JClic';
$string['jclic:grade'] = 'Avaliar JClic';