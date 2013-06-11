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
 * Strings for component 'url', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   url
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['chooseavariable'] = 'Escolha uma variável…';
$string['clicktoopen'] = 'Clique no link {$a} para abrir o URL.';
$string['configdisplayoptions'] = 'Selecione todas as opções que devem estar disponíveis, as definições existentes não serão alteradas. Prima a tecla CTRL para selecionar múltiplas opções.';
$string['configframesize'] = 'Quando uma página web ou um ficheiro é exibido numa frame, este valor é a altura (em pixels) da frame superior (que contém a barra de navegação).';
$string['configrolesinparams'] = 'Ative esta opção se deseja incluir os nomes dos papéis locais na listagem das variáveis de disponíveis nos parâmetros.';
$string['configsecretphrase'] = 'Esta frase secreta é usada para produzir um código criptografado que pode ser enviado para alguns servidores como parâmetro. O código criptografado é produzido por um valor md5 do endereço de IP do utilizador atual concatenado com a sua frase secreta. ie code = md5(IP.secretphrase). Tenha em conta que isto não é fiável pois o endereço IP pode mudar e muitas vezes é partilhado por diferentes computadores.';
$string['contentheader'] = 'Conteúdo';
$string['createurl'] = 'Criar um url';
$string['displayoptions'] = 'Opções de visualização disponíveis';
$string['displayselect'] = 'Exibir em';
$string['displayselectexplain'] = 'Escolha a forma de exibição tendo em conta que nem todos os tipos de exibição são adequados para todos os URLs.';
$string['displayselect_help'] = 'Esta configuração, em conjunto com o tipo de ficheiro do url e possibilidades do browser, determinam a forma como é exibido o ficheiro. As opções podem ser:

* Automático - É selecionada automaticamente a melhor opção para exibir o ficheiro;
* Incorporar - O ficheiro é incorporado e exibido na página, mantendo a barra de navegação, a descrição do ficheiro e os blocos laterais;
* Forçar descarga - É aberta uma janela de diálogo para o utilizador abrir ou guardar o ficheiro;
* Mesma janela - O ficheiro é exibido na janela do browser, ocupando-a toda;
* Janela de pop-up - O ficheiro é exibido numa nova janela do browser sem menus nem barra de endereço;
* Frame - O ficheiro é exibido numa frame, mantendo a barra de navegação e a descrição do ficheiro;
* Nova janela - O ficheiro é exibido numa nova janela do browser, com menus e barra de endereço.';
$string['externalurl'] = 'URL externo';
$string['framesize'] = 'Altura da frame';
$string['invalidstoredurl'] = 'Não é possível mostrar este recurso, o URL é inválido';
$string['invalidurl'] = 'Insira um URL válido';
$string['modulename'] = 'URL';
$string['modulename_help'] = 'O URL permite ao professor disponibilizar um link para um conteúdo externo na página principal da disciplina, Tudo o que esteja disponível livremente online, como documentos ou imagens, pode ser partilhado, o URL não necessita de ser a página de um site. Pode copiar e colar o link de qualquer página online ou escolher um link específico de um repositório como o Flickr, YouTube ou Wikimedia (dependendo dos repositórios que estão disponíveis na plataforma).

Existe uma série de opções de visualização do URL. Este pode ser incorporado, pode surgir numa nova janela ou, mediante opções avançadas, pode passar informações como o nome do aluno, se necessário.';
$string['modulename_link'] = 'mod/url/view';
$string['modulenameplural'] = 'URLs';
$string['neverseen'] = 'Nunca visto';
$string['optionsheader'] = 'Opções';
$string['page-mod-url-x'] = 'Qualquer página do recurso URL';
$string['parameterinfo'] = 'parâmetro=variável';
$string['parametersheader'] = 'Parâmetros';
$string['parametersheader_help'] = 'Algumas variáveis internas Moodle podem ser automaticamente anexadas ao URL. Defina um nome para o parâmetro nas caixas de texto e, em seguida, selecione a variável correspondente.';
$string['pluginadministration'] = 'Administração do URL';
$string['pluginname'] = 'URL';
$string['popupheight'] = 'Altura da janela de pop-up (em pixels)';
$string['popupheightexplain'] = 'Especifique a altura predefinida da janela de pop-up';
$string['popupwidth'] = 'Largura da janela de pop-up (em pixels)';
$string['popupwidthexplain'] = 'Especifique a largura predefinida quando abre numa janela de pop-up';
$string['printheading'] = 'Mostrar nome do URL';
$string['printheadingexplain'] = 'Mostrar o nome do URL por cima do conteúdo? Alguns modos de exibição não apresentam o nome do URL, mesmo com esta configuração ativa.';
$string['printintro'] = 'Mostrar descrição do URL';
$string['printintroexplain'] = 'Mostrar a descrição do URL abaixo do conteúdo? Alguns modos de exibição não apresentam a descrição do recurso, mesmo com esta configuração ativa.';
$string['rolesinparams'] = 'Incluir designações de papéis nos parâmetros';
$string['serverurl'] = 'URL do servidor';
$string['url:addinstance'] = 'Adicionar novo URL';
$string['url:view'] = 'Ver URL';
