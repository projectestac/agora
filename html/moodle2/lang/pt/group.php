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
 * Strings for component 'group', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   group
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addedby'] = 'Adicionado por {$a}';
$string['addgroup'] = 'Adicionar utilizador ao grupo';
$string['addgroupstogrouping'] = 'Adicionar grupo ao agrupamento';
$string['addgroupstogroupings'] = 'Adicionar/remover grupos';
$string['adduserstogroup'] = 'Adicionar/remover utilizadores';
$string['allocateby'] = 'Atribuir membros';
$string['anygrouping'] = '[Qualquer agrupamento]';
$string['autocreategroups'] = 'Criação automática de grupos';
$string['backtogroupings'] = 'Voltar a agrupamentos';
$string['backtogroups'] = 'Voltar a grupos';
$string['badnamingscheme'] = 'Tem de conter exatamente um carácter \'@\' ou \'#';
$string['byfirstname'] = 'Ordenação alfabética por nome, apelido';
$string['byidnumber'] = 'Ordenação ascendente por número de identificação';
$string['bylastname'] = 'Ordenação alfabética por apelido, nome';
$string['createautomaticgrouping'] = 'Criar agrupamento automático';
$string['creategroup'] = 'Criar grupo';
$string['creategrouping'] = 'Criar agrupamento';
$string['creategroupinselectedgrouping'] = 'Criar grupo no agrupamento';
$string['createingrouping'] = 'Agrupamento de grupos criados automaticamente';
$string['createorphangroup'] = 'Criar grupo órfão';
$string['databaseupgradegroups'] = 'A versão de grupos é, agora, {$a}';
$string['defaultgrouping'] = 'Agrupamento por predefinição';
$string['defaultgroupingname'] = 'Agrupamento';
$string['defaultgroupname'] = 'Grupo';
$string['deleteallgroupings'] = 'Apagar todos os agrupamentos';
$string['deleteallgroups'] = 'Apagar todos os grupos';
$string['deletegroupconfirm'] = 'Tem a certeza que pretende remover o Grupo \'{$a}\'?';
$string['deletegrouping'] = 'Apagar agrupamento';
$string['deletegroupingconfirm'] = 'Tem a certeza de que quer apagar o agrupamento \'{$a}\'? (Os grupos contidos no agrupamento não são apagados)';
$string['deletegroupsconfirm'] = 'Tem a certeza de que deseja excluir os seguintes grupos?';
$string['deleteselectedgroup'] = 'Apagar o grupo selecionado';
$string['editgroupingsettings'] = 'Editar definições do agrupamento';
$string['editgroupsettings'] = 'Editar definições do grupo';
$string['enrolmentkey'] = 'Senha de inscrição';
$string['enrolmentkeyalreadyinuse'] = 'Esta chave de inscrição já está a ser usada por outro grupo.';
$string['enrolmentkey_help'] = 'Uma senha de inscrição permite que o acesso à disciplina seja limitado apenas para aqueles que conhecem a senha. Se especificar a senha de inscrição de um grupo, essa senha não permitirá apenas o acesso do utilizador à disciplina, mas também a sua inscrição automática como membro do grupo.

Nota: As senhas de inscrição para grupos devem ser ativadas nas configurações de autoinscrição, devendo também ser especificada uma chave de inscrição para a disciplina.';
$string['erroraddremoveuser'] = 'Ocorreu um erro ao adicionar/remover o utilizador {$a} de um grupo';
$string['erroreditgroup'] = 'Erro ao criar/atualizar grupo {$a}';
$string['erroreditgrouping'] = 'Erro ao criar/atualizar agrupamento {$a}';
$string['errorinvalidgroup'] = 'Erro, o grupo {$a} não é válido';
$string['errorremovenotpermitted'] = 'Não tem permissão para remover o membro do grupo {$a} adicionado automaticamente';
$string['errorselectone'] = 'Selecione um único grupo, antes de escolher esta opção';
$string['errorselectsome'] = 'Selecione um ou mais grupos, antes de escolher esta opção';
$string['evenallocation'] = 'Nota: Para manter o equilíbrio no número de membros de cada grupo, o número destes é diferente do número especificado.';
$string['event_group_created'] = 'Grupo criado';
$string['event_group_deleted'] = 'Grupo apagado';
$string['event_grouping_created'] = 'Agrupamento criado';
$string['event_grouping_deleted'] = 'Agrupamento apagado';
$string['event_grouping_updated'] = 'Agrupamento atualizado';
$string['event_group_member_added'] = 'Membro do grupo adicionado';
$string['event_group_member_removed'] = 'Membro do grupo removido';
$string['event_group_updated'] = 'Grupo atualizado';
$string['existingmembers'] = 'Membros existentes: {$a}';
$string['filtergroups'] = 'Filtrar grupos por:';
$string['group'] = 'Grupo';
$string['groupaddedsuccesfully'] = 'Grupo {$a} adicionado com sucesso';
$string['groupaddedtogroupingsuccesfully'] = 'O grupo {$a->groupname} foi adicionado com sucesso ao agrupamento {$a->groupingname}';
$string['groupby'] = 'Criar automaticamente com base em';
$string['groupdescription'] = 'Descrição do Grupo';
$string['groupinfo'] = 'Informação sobre o grupo selecionado';
$string['groupinfomembers'] = 'Informação sobre os membros selecionados';
$string['groupinfopeople'] = 'Informação sobre as pessoas selecionadas';
$string['grouping'] = 'Agrupamento';
$string['groupingaddedsuccesfully'] = 'O agrupamento {$a} foi adicionado com sucesso';
$string['groupingdescription'] = 'Descrição do agrupamento';
$string['grouping_help'] = 'Um agrupamento é uma compilação de grupos dentro de uma disciplina. Se um grupo é selecionado, os alunos atribuídos a grupos dentro do agrupamento poderão trabalhar em conjunto.';
$string['groupingname'] = 'Nome do agrupamento';
$string['groupingnameexists'] = 'Já existe um agrupamento com o nome \'{$a}\' nesta disciplina; escolha outro nome.';
$string['groupings'] = 'Agrupamentos';
$string['groupingsection'] = 'Acesso a agrupamentos';
$string['groupingsection_help'] = 'Um agrupamento é uma coleção de grupos dentro de uma disciplina. Se um agrupamento for aqui selecionado, unicamente os alunos que pertençam a esse agrupamento terão acesso à secção.';
$string['groupingsonly'] = 'Apenas agrupamentos';
$string['groupmember'] = 'Membro do grupo';
$string['groupmemberdesc'] = 'Papel por predefinição para um membro de um grupo.';
$string['groupmembers'] = 'Membros do grupo';
$string['groupmembersonly'] = 'Disponível apenas para membros do agrupamento';
$string['groupmembersonlyerror'] = 'Tem de pertencer a, pelo menos, um grupo utilizado nesta atividade.';
$string['groupmembersonly_help'] = 'Se esta opção estiver selecionada, a atividade (ou recurso) só estará disponível para os alunos atribuídos a grupos dentro do agrupamento selecionado.';
$string['groupmemberssee'] = 'Ver membros do grupo';
$string['groupmembersselected'] = 'Membros do grupo selecionado';
$string['groupmode'] = 'Modo de grupo';
$string['groupmodeforce'] = 'Forçar modo de grupo';
$string['groupmodeforce_help'] = 'Se esta configuração tiver o valor "Sim", então o modo de grupo é forçado ao nível da disciplina e o modo de grupo definido no âmbito das atividades será ignorado.';
$string['groupmode_help'] = 'A definição do modo de grupo pode ser uma das três seguintes:

* Sem grupos - não existem grupos, todos são parte de uma comunidade.
* Grupos separados - cada grupo pode ver apenas o seu próprio grupo, estando os restantes grupos invisíveis.
* Grupos visíveis - cada grupo trabalha apenas dentro do seu próprio grupo, mas pode ver os outros grupos.

O modo de grupo definido ao nível da disciplina será o modo aplicado automaticamente a todas as atividades nessa disciplina. Contudo, cada atividade  poderá também ter a sua própria definição de modo de grupo. No entanto, se o modo de grupo for forçado ao nível da disciplina, então o modo de grupo definido no âmbito das atividades será ignorado.';
$string['groupmy'] = 'Meu grupo';
$string['groupname'] = 'Nome do Grupo';
$string['groupnameexists'] = 'O nome de grupo \'{$a}\' já existe nesta disciplina, escolha outro.';
$string['groupnotamember'] = 'Não é membro desse grupo.';
$string['groups'] = 'Grupos';
$string['groupscount'] = 'Grupos ({$a})';
$string['groupsettingsheader'] = 'Grupos';
$string['groupsgroupings'] = 'Grupos e agrupamentos';
$string['groupsinselectedgrouping'] = 'Grupos em:';
$string['groupsnone'] = 'Não há grupos';
$string['groupsonly'] = 'Apenas grupos';
$string['groupspreview'] = 'Pré-visualização de grupos';
$string['groupsseparate'] = 'Grupos separados';
$string['groupsvisible'] = 'Grupos visíveis';
$string['grouptemplate'] = 'Grupo @';
$string['hidepicture'] = 'Ocultar imagem';
$string['importgroups'] = 'Importar grupos';
$string['importgroups_help'] = 'Os grupos podem ser importados através de ficheiros de texto. O formato do ficheiro deve ser o seguinte:

* Cada linha do ficheiro contém um registo
* Cada registo é uma série de dados separados por vírgulas
* O primeiro registo contém uma lista de nomes de campos que definem o formato do resto do ficheiro
* Obrigatoriamente o nome do ficheiro é o nome do grupo.
* os campos opcionais são a descrição, senha de inscrição, imagem, imagem oculta';
$string['importgroups_link'] = 'grupo/importar';
$string['javascriptrequired'] = 'Esta página requer a ativação do Javascript.';
$string['members'] = 'Membros por grupo';
$string['membersofselectedgroup'] = 'Membros:';
$string['namingscheme'] = 'Esquema de nomeação';
$string['namingscheme_help'] = 'O símbolo de arroba (@) pode ser utilizado para criar grupos com nomes que contenham letras. Por exemplo, o Grupo @ irá gerar grupos, denominados Grupo A, Grupo B, Grupo C, ...

O símbolo cardinal (#) pode ser utilizado para criar grupos com nomes que contenham números. Por exemplo, o Grupo # irá gerar grupos, denominados Grupo 1, Grupo 2, Grupo 3, ...';
$string['newgrouping'] = 'Novo agrupamento';
$string['newpicture'] = 'Nova imagem';
$string['newpicture_help'] = 'Selecione uma imagem no formato JPG ou PNG. A imagem será ajustada a um quadrado e redimensionada para 100x100 pixels.';
$string['noallocation'] = 'Sem atribuições';
$string['nogrouping'] = 'Sem agrupamento';
$string['nogroups'] = 'Ainda não há grupos definidos nesta disciplina';
$string['nogroupsassigned'] = 'Não foram atribuídos grupos';
$string['nopermissionforcreation'] = 'Não é possível criar o grupo"{$a}", porque não tem as permissões necessárias';
$string['nosmallgroups'] = 'Apagar último pequeno grupo';
$string['notingrouping'] = '[Não está num agrupamento]';
$string['nousersinrole'] = 'Não existem utilizadores adequados no papel selecionado';
$string['number'] = 'Número de grupos/membros por grupo';
$string['numgroups'] = 'Número de grupos';
$string['nummembers'] = 'Membros por grupo';
$string['overview'] = 'Perspetiva global';
$string['potentialmembers'] = 'Potenciais membros: {$a}';
$string['potentialmembs'] = 'Potenciais membros';
$string['printerfriendly'] = 'Exibir versão para imprimir';
$string['random'] = 'Aleatoriamente';
$string['removefromgroup'] = 'Retirar utilizador do grupo {$a}';
$string['removefromgroupconfirm'] = 'Tem a certeza de que quer remover o utilizador "{$a->user}" do grupo "{$a->group}"?';
$string['removegroupfromselectedgrouping'] = 'Remover grupo do agrupamento';
$string['removegroupingsmembers'] = 'Remover todos os grupos de agrupamentos';
$string['removegroupsmembers'] = 'Remover todos os membros do(s) grupo(s)';
$string['removeselectedusers'] = 'Remover utilizadores selecionados';
$string['selectfromrole'] = 'Selecionar membros com o papel';
$string['showgroupsingrouping'] = 'Mostrar grupos no agrupamento';
$string['showmembersforgroup'] = 'Mostrar membros do grupo';
$string['toomanygroups'] = 'Número de utilizadores insuficiente para preencher este número de grupos; existem apenas {$a} utilizadores no papel selecionado.';
$string['usercount'] = 'Número de utilizadores';
$string['usercounttotal'] = 'Número de utilizadores ({$a})';
$string['usergroupmembership'] = 'Associação a grupos dos utilizadores selecionados:';
