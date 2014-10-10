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
 * Strings for component 'tool_installaddon', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_installaddon
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acknowledgement'] = 'Confirmação';
$string['acknowledgementmust'] = 'Confirme o seguinte Termo de Responsabilidade:';
$string['acknowledgementtext'] = 'Compreendo que é da minha responsabilidade ter cópias de segurança completas deste site antes de instalar add-ons. Aceito e compreendo que as add-ons (especialmente, mas não apenas as originárias de fontes não oficiais) podem conter falhas de segurança, podem tornar o site indisponível ou causar fuga ou perda de dados privados.';
$string['featuredisabled'] = 'O instalador de add-ons está desativado neste site.';
$string['installaddon'] = 'Instalar add-on!';
$string['installaddons'] = 'Instalar add-ons';
$string['installexception'] = 'Ocorreu um erro ao tentar instalar o add-on. Ative o modo de depuração para ver os detalhes do erro.';
$string['installfromrepo'] = 'Instalar add-ons a partir de moodle.org/plugins';
$string['installfromrepo_help'] = 'Será redirecionado para a diretoria de módulos do Moodle para procurar e instalar um add-on. Note que o nome do site completo, URL e versão Moodle também serão enviados de forma a facilitar-lhe o processo de instalação.';
$string['installfromzip'] = 'Instale o add-on a partir do ficheiro ZIP';
$string['installfromzipfile'] = 'Pacote ZIP';
$string['installfromzipfile_help'] = 'O pacote ZIP do módulo deve conter apenas uma diretoria e ter um nome correspondente ao do módulo. O conteúdo do ficheiro ZIP será extraído numa localização apropriada para o tipo de módulo. Se fez o download do pacote a partir de moodle.org/plugins, então ele terá essa estrutura.';
$string['installfromzip_help'] = 'Uma alternativa para instalar diretamente um add-on da diretoria moodle.org/plugins passará por fazer o upload de um pacote ZIP desse add-on. O pacote ZIP deve ter a mesma estrutura de um pacote cujo download foi feito a partir de moodle.org/plugins.';
$string['installfromziprootdir'] = 'Alterar o nome da diretoria raiz';
$string['installfromziprootdir_help'] = 'Alguns pacotes ZIP, tais como os gerados por Github, podem conter um nome de diretoria raiz incorreto. Se assim for, o nome correto pode ser introduzido aqui.';
$string['installfromzipsubmit'] = 'Instalar o add-on a partir do ficheiro ZIP';
$string['installfromziptype'] = 'Tipo de módulo';
$string['installfromziptype_help'] = 'Selecione o tipo de módulo correto que está prestes a instalar. Aviso: O procedimento de instalação pode falhar se um tipo de módulo incorreto for especificado.';
$string['permcheck'] = 'Certifique-se de que a localização raiz do tipo de módulo permite gravação pelo processo de servidor web.';
$string['permcheckerror'] = 'Erro durante a verificação de permissão de gravação';
$string['permcheckprogress'] = 'A verificar a permissão de gravação…';
$string['permcheckresultno'] = 'A localização do tipo de módulo <em>{$a->path}</em> não permite gravaçã';
$string['permcheckresultyes'] = 'A localização do tipo de módulo <em>{$a->path}</em> permite gravação';
$string['pluginname'] = 'Instalador de add-on';
$string['remoterequestalreadyinstalled'] = 'Há um pedido para instalar neste site um add-on {$a->name} ({$a->component}) versão {$a->version} a partir da diretoria de módulos Moodle. No entanto, este módulo<strong>já está instalado</strong> no site.';
$string['remoterequestconfirm'] = 'Há um pedido para instalar neste site um add-on<strong>{$a->name}</strong> ({$a->component}) versão {$a->version} a partir da diretoria de módulos Moodle. Se continuar, o pacote ZIP do add-on será descarregado para validação. Para já, nada será instalado.';
$string['remoterequestinvalid'] = 'Há um pedido para instalar neste site um add-on a partir da diretoria de módulos Moodle. Infelizmente, o pedido não é válido e, por isso, o add-on não pode ser instalado.';
$string['remoterequestpermcheck'] = 'Há um pedido para instalar neste site um add-on{$a->name} ({$a->component}) versão {$a->version} a partir da diretoria de módulos Moodle. No entanto,  a localização do tipo de módulo <strong>{$a->typepath} </strong> <strong>não permite a gravação.</strong>  Precisa dar acesso de gravação para o utilizador do servidor web para o tipo de localização do módulo, em seguida, clique no botão \'Continuar\' a repetir a verificação.';
$string['remoterequestpluginfoexception'] = 'Ocorreu um erro ao tentar obter informações sobre o add-on {$a->name} ({$a->component}) versão {$a->version}. O add-on não pode ser instalado. Ative o modo de depuração para ver os detalhes do erro.';
$string['validation'] = 'Validação do pacote add-on';
$string['validationmsg_componentmatch'] = 'Nome completo do componente';
$string['validationmsg_componentmismatchname'] = 'Incompatibilidade de nome do add-on';
$string['validationmsg_componentmismatchname_help'] = 'Alguns pacotes ZIP, tais como os gerados pelo Github, podem conter um nome incorreto da diretoria raiz. É preciso corrigir o nome da diretoria raiz para que este corresponda ao nome do add-on declarado.';
$string['validationmsg_componentmismatchname_info'] = 'O add-on declara que o seu nome é \'{$a}\', mas que este não corresponde ao nome da diretoria raiz.';
$string['validationmsg_componentmismatchtype'] = 'Incompatibilidade de tipo do add-on';
$string['validationmsg_componentmismatchtype_info'] = 'Selecionou o tipo \'{$a->expected}\' mas o add-on declara que o seu tipo é \'{$a->found}\'.';
$string['validationmsg_filenotexists'] = 'Ficheiro extraído não encontrado';
$string['validationmsg_filesnumber'] = 'Não foram encontrados ficheiros suficientes no pacote';
$string['validationmsg_filestatus'] = 'Não é possível extrair todos os ficheiros';
$string['validationmsg_filestatus_info'] = 'A tentativa de extração do ficheiro {$a->file} resultou num erro \'{$a->status}.';
$string['validationmsglevel_debug'] = 'Depurar';
$string['validationmsglevel_error'] = 'Erro';
$string['validationmsglevel_info'] = 'OK';
$string['validationmsglevel_warning'] = 'Aviso';
$string['validationmsg_maturity'] = 'Nível de maturidade declarado';
$string['validationmsg_maturity_help'] = 'O add-on pode declarar o seu nível de maturidade. Se o responsável pela manutenção considerar o add-on estável, o nível de maturidade declarado irá ler MATURIDADE_ESTÁVEL. Todos os outros níveis de maturidade (tais como alfa ou beta) devem ser considerados instáveis e é gerado um aviso.';
$string['validationmsg_missingexpectedlangenfile'] = 'Incompatibilidade de nome do ficheiro de idioma em inglês';
$string['validationmsg_missingexpectedlangenfile_info'] = 'O ficheiro de idioma em inglês {$a} está em falta para o tipo de add-on em causa';
$string['validationmsg_missinglangenfile'] = 'Não foi encontrado o ficheiro de idioma em inglês';
$string['validationmsg_missinglangenfolder'] = 'A pasta do idioma em inglês está em falta';
$string['validationmsg_missingversion'] = 'O add-on não declara a sua versão';
$string['validationmsg_missingversionphp'] = 'Ficheiro \'version.php\' não encontrado';
$string['validationmsg_multiplelangenfiles'] = 'Foram encontrados múltiplos ficheiros de idioma em inglês';
$string['validationmsg_onedir'] = 'Estrutura inválida do pacote ZIP.';
$string['validationmsg_onedir_help'] = 'O pacote ZIP deve conter apenas uma diretoria raiz que contém o código do add-on. O nome dessa diretoria raiz deve coincidir com o nome do módulo.';
$string['validationmsg_pathwritable'] = 'Verificação do acesso de gravação';
$string['validationmsg_pluginversion'] = 'Versão do add-on';
$string['validationmsg_release'] = 'Lançamento do add-on';
$string['validationmsg_requiresmoodle'] = 'Versão Moodle requerida';
$string['validationmsg_rootdir'] = 'Nome do add-on a ser instalado';
$string['validationmsg_rootdir_help'] = 'O nome da diretoria raiz no pacote ZIP forma o nome do add-on a ser instalado. Se o nome não estiver correto, poderá querer mudar o nome da diretoria raiz no pacote ZIP antes de instalar o add-on.';
$string['validationmsg_rootdirinvalid'] = 'Nome de add-on inválido';
$string['validationmsg_rootdirinvalid_help'] = 'O nome da diretoria raiz no pacote ZIP viola requisitos formais de sintaxe. Alguns pacotes ZIP, tais como os gerados pelo Github, podem conter um nome de diretoria raiz incorreta. É preciso corrigir o nome da diretoria raiz para corresponder ao nome do add-on.';
$string['validationmsg_targetexists'] = 'O local de destino já existe';
$string['validationmsg_targetexists_help'] = 'A diretoria em que o add-on será instalado ainda não deverá existir.';
$string['validationmsg_unknowntype'] = 'Tipo de módulo inválido';
$string['validationresult0'] = 'Validação reprovada!';
$string['validationresult0_help'] = 'Um problema sério foi detetado e por isso não é seguro instalar o add-on. Veja as mensagens de registo de validação para mais detalhes.';
$string['validationresult1'] = 'Módulo aprovado!';
$string['validationresult1_help'] = 'O pacote de add-on foi validado e nenhum problema grave foi detetado.';
$string['validationresultinfo'] = 'Informação';
$string['validationresultmsg'] = 'Mensagem';
$string['validationresultstatus'] = 'Estado';
