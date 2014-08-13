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
 * Strings for component 'enrol_self', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['canntenrol'] = 'A inscrição está desativada ou inativa';
$string['cohortnonmemberinfo'] = 'Apenas membros do grupo global \'{$a}\' se podem autoinscrever';
$string['cohortonly'] = 'Apenas membros do grupo global';
$string['cohortonly_help'] = 'A autoinscrição pode ser restrita apenas a membros de um grupo global específico. Note que a alteração dessa configuração não tem efeito sobre as inscrições existentes.';
$string['customwelcomemessage'] = 'Mensagem personalizada de boas-vindas';
$string['customwelcomemessage_help'] = 'Pode definir uma mensagem personalizada em texto simples ou Autoformatação-Moodle, incluíndo código HTML e multi-lang tags. The following placeholders may be included in the message: * Course name {$a->coursename} * Link to user\'s profile page {$a->profileurl}';
$string['defaultrole'] = 'Atribuição de papel predefinida';
$string['defaultrole_desc'] = 'Selecione o papel que deve ser atribuído aos utilizadores durante a inscrição.';
$string['enrolenddate'] = 'Data de fim';
$string['enrolenddate_help'] = 'Se ativo, os utilizadores podem inscrever-se apenas até esta data.';
$string['enrolenddaterror'] = 'A data de fim de inscrição não pode ser anterior à data de início';
$string['enrolme'] = 'Inscrever-me';
$string['enrolperiod'] = 'Duração da inscrição';
$string['enrolperiod_desc'] = 'Duração predefinida da inscrição.  Se for definida para zero, a validade da inscrição será ilimitada por predefinição.';
$string['enrolperiod_help'] = 'Período de tempo que a inscrição é válida, a partir do momento em que o utilizador se inscreve. Se inativo a duração da inscrição será ilimitada.';
$string['enrolstartdate'] = 'Data de início';
$string['enrolstartdate_help'] = 'Se ativo, os utilizadores apenas se podem auto-inscrever a partir desta data.';
$string['expiredaction'] = 'Ação para expiração da inscrição';
$string['expiredaction_help'] = 'Selecione a ação a implementar quando a inscrição do utilizador expira. Por favor, note que alguns dados e definições do utilizador são removidos da disciplina durante o cancelamento da inscrição.';
$string['expirymessageenrolledbody'] = 'Caro(a) {$a->user},

Esta é uma notificação de que a sua inscrição na disciplina \'{$a->course}\' expira em {$a->timeend}.

Se precisar de ajuda, por favor contacte {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Notificação de expiração da autoinscrição';
$string['expirymessageenrollerbody'] = 'A autoinscrição na disciplina \'{$a->course}\' irá expirar nos próximos {$a->threshold} para os seguintes utilizadores:

{$a->users}

Para prolongar estas inscrições, vá a {$a->extendurl}';
$string['expirymessageenrollersubject'] = 'Notificação de expiração da autoinscrição';
$string['groupkey'] = 'Usar senhas de inscrição de grupo';
$string['groupkey_desc'] = 'Usar senhas de inscrição de grupo como configuração predefinida.';
$string['groupkey_help'] = 'Para além de restringir o acesso à disciplina apenas aos utilizadores que têm a senha de inscrição, é possível definir senhas de inscrição para grupos, o que faz com que os utilizadores, ao se inscreverem na disciplina, fiquem automaticamente integrados num grupo.

Nota: Uma senha de inscrição para a disciplina deve ser especificada nas configurações de autoinscrição, bem como as senhas de inscrição do grupo nas configurações do grupo.';
$string['longtimenosee'] = 'Remover inscrições inativas há mais de';
$string['longtimenosee_help'] = 'Tempo limite após o qual os utilizadores que não acedam à disciplina durante muito tempo verão a sua inscrição cancelada.';
$string['maxenrolled'] = 'Número máximo de inscrições permitidas';
$string['maxenrolled_help'] = 'Define o número de máximo de utilizadores que se podem inscrever autonomamente numa disciplina. Se o valor definido for zero não existe limite.';
$string['maxenrolledreached'] = 'O número máximo de inscrições já foi atingido.';
$string['messageprovider:expiry_notification'] = 'Notificações de expiração da autoinscrição';
$string['newenrols'] = 'Permitir novas inscrições';
$string['newenrols_desc'] = 'Permitir, por predefinição, que os utilizadores se auto-inscrevam nas novas disciplinas.';
$string['newenrols_help'] = 'Esta configuração determina se o utilizador se pode inscrever nesta disciplina.';
$string['nopassword'] = 'Não é pedida senha de inscrição';
$string['password'] = 'Senha de inscrição';
$string['password_help'] = 'A senha de inscrição permite restringir o acesso à disciplina apenas aos utilizadores que conheçam a senha de inscrição.

Se este campo não estiver preenchido, então qualquer utilizador poderá inscrever-se nesta disciplina.

Se for especificada uma senha, qualquer utilizador que tente aceder à disciplina terá que indicar essa senha. Este procedimento só acontece no momento da inscrição nas disciplinas, os acessos posteriores dos alunos inscritos dispensam a indicação desta senha.';
$string['passwordinvalid'] = 'A senha de inscrição que indicou não é a correta, por favor, tente novamente';
$string['passwordinvalidhint'] = 'A senha de inscrição que indicou não é a correta, por favor, tente novamente. Sugestão: A primeira letra é "{$a}"';
$string['pluginname'] = 'Auto-inscrição';
$string['pluginname_desc'] = 'Este módulo permite aos utilizadores decidir em que disciplinas se pretendem inscrever. As disciplinas podem ser protegidas por uma senha de inscrição. Internamente a inscrição é feita através do módulo de inscrições manuais, pelo que este módulo tem que estar igualmente ativo na disciplina.';
$string['requirepassword'] = 'Pedir senha de inscrição';
$string['requirepassword_desc'] = 'Esta configuração faz com que as novas disciplinas criadas peçam sempre senha de inscrição e evita que as disciplinas que já existem possam deixar de pedir essa senha.';
$string['role'] = 'Atribuir papel';
$string['self:config'] = 'Configurar instâncias de auto-inscrição';
$string['self:manage'] = 'Gerir utilizadores inscritos';
$string['self:unenrol'] = 'Remover inscrições de alunos desta disciplina';
$string['self:unenrolself'] = 'Remover a sua inscrição desta disciplina';
$string['sendcoursewelcomemessage'] = 'Enviar mensagem de boas-vindas';
$string['sendcoursewelcomemessage_help'] = 'Se esta configuração estiver ativa os utilizadores que se inscreverem na disciplina receberão um e-mail com uma mensagem de boas-vindas.';
$string['showhint'] = 'Mostrar sugestão';
$string['showhint_desc'] = 'Se esta configuração estiver ativa será mostrada aos utilizadores a primeira letra da senha de inscrição.';
$string['status'] = 'Ativar inscrições existentes';
$string['status_desc'] = 'Ativar o método de autoinscrição nas novas disciplinas.';
$string['status_help'] = 'Se esta opção estiver desativada, todas as auto-inscrições existentes serão suspensas e os novos utilizadores não poderão inscrever-se.';
$string['unenrol'] = 'Cancelar inscrição do utilizador';
$string['unenrolselfconfirm'] = 'Tem a certeza de que quer cancelar a sua inscrição na disciplina "{$a}"?';
$string['unenroluser'] = 'Tem a certeza de que quer cancelar a sua inscrição de "{$a->user}" da disciplina "{$a->course}"?';
$string['usepasswordpolicy'] = 'Usar a política de senhas do site';
$string['usepasswordpolicy_desc'] = 'Se esta configuração estiver ativa a senha de inscrição nas disciplinas terá que obedecer às mesmas regras que as palavras-senhas das contas dos utilizadores.';
$string['welcometocourse'] = 'Bem-vindo(a) a "{$a}"';
$string['welcometocoursetext'] = 'Bem-vindo(a) à disciplina "{$a->coursename}"!

Se ainda não o fez, complete aqui o seu perfil de utilizador para que possamos conhecê-lo(a) melhor: {$a->profileurl}';
