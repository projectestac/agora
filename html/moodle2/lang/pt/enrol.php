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
 * Strings for component 'enrol', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actenrolshhdr'] = 'Módulos de inscrição disponíveis';
$string['addinstance'] = 'Adicionar método';
$string['ajaxnext25'] = 'Próximos 25...';
$string['ajaxoneuserfound'] = 'Um(a) utilizador(a) encontrado(a)';
$string['ajaxxusersfound'] = '{$a} utilizadores encontrados';
$string['assignnotpermitted'] = 'Não tem permissões para atribuir papéis nesta disciplina';
$string['bulkuseroperation'] = 'Operações de utilizadores em massa';
$string['configenrolplugins'] = 'Selecione todos os módulos necessários e coloque-os pela ordem correta.';
$string['custominstancename'] = 'Nome personalizado da instância';
$string['defaultenrol'] = 'Adicionar a instância a novas disciplinas';
$string['defaultenrol_desc'] = 'Se esta configuração estiver ativa este módulo estará ativo por predefinição nas novas disciplinas criadas.';
$string['deleteinstanceconfirm'] = 'Está prestes a apagar o método de inscrição "{$a->name}". Todos os {$a->users} utilizadores atualmente inscritos através deste método deixarão de estar inscritos e quaisquer informações relacionadas com a disciplina, tais como notas, participação em grupos ou subscrições de fórum, serão eliminados. Tem a certeza que pretende continuar?';
$string['deleteinstancenousersconfirm'] = 'Está prestes a apagar o método de inscrição "{$a->name}". Tem a certeza que pretende continuar?';
$string['durationdays'] = '{$a} dias';
$string['enrol'] = 'Inscrever';
$string['enrolcandidates'] = 'Utilizadores não inscritos';
$string['enrolcandidatesmatching'] = 'A procurar utilizadores não inscritos';
$string['enrolcohort'] = 'Inscrever grupo global';
$string['enrolcohortusers'] = 'Inscrever utilizadores';
$string['enrollednewusers'] = 'Foram inscritos {$a} novos utilizadores';
$string['enrolledusers'] = 'Utilizadores inscritos';
$string['enrolledusersmatching'] = 'A procurar utilizadores inscritos';
$string['enrolme'] = 'Inscrever-me nesta disciplina';
$string['enrolmentinstances'] = 'Métodos de inscrição';
$string['enrolmentnew'] = 'Nova inscrição em {$a}';
$string['enrolmentnewuser'] = 'O utilizador "{$a->user}" inscreveu-se na disciplina "{$a->course}"';
$string['enrolmentoptions'] = 'Opções de inscrição';
$string['enrolments'] = 'Inscrições';
$string['enrolnotpermitted'] = 'Não term permissões para inscrever utilizadores nesta disciplina';
$string['enrolperiod'] = 'Duração da inscrição';
$string['enroltimecreated'] = 'Inscrição criada';
$string['enroltimeend'] = 'A inscrição termina em';
$string['enroltimestart'] = 'A inscrição começa em';
$string['enrolusage'] = 'Instâncias / inscrições';
$string['enrolusers'] = 'Inscrever utilizadores';
$string['errajaxfailedenrol'] = 'A inscrição do utilizador falhou';
$string['errajaxsearch'] = 'Erro ao procurar utilizadores';
$string['erroreditenrolment'] = 'Ocorreu um erro ao tentar editar o papel dos utilizadores';
$string['errorenrolcohort'] = 'Ocorreu um erro ao criar uma instância de sincronização de inscrições de grupos globais nesta disciplina.';
$string['errorenrolcohortusers'] = 'Ocorreu um erro ao inscrever membros de grupos globais nesta disciplina.';
$string['errorthresholdlow'] = 'A notificação deve ser feita, pelo menos, 1 dia antes.';
$string['errorwithbulkoperation'] = 'Ocorreu um erro durante o processamento da alteração da sua inscrição';
$string['expirynotify'] = 'Notificar antes de a inscrição expirar';
$string['expirynotifyall'] = 'Responsável pela inscrição e utilizador inscrito';
$string['expirynotifyenroller'] = 'Apenas o responsável pela inscrição';
$string['expirynotify_help'] = 'Esta configuração determina se as mensagens de notificação de fim da inscrição são ou não enviadas.';
$string['expirynotifyhour'] = 'Hora de envio das notificações de fim da inscrição';
$string['expirythreshold'] = 'Limiar de notificação';
$string['expirythreshold_help'] = 'Quanto tempo antes da data limite devem ser notificados os utilizadores?';
$string['extremovedaction'] = 'Ação de cancelamento de inscrição externa';
$string['extremovedaction_help'] = 'Selecione a ação a realizar quando a inscrição de um utilizador desaparece da fonte externa de inscrições. De notar que alguma informação do utilizador e respetivas configurações são apagadas quando a inscrição é cancelada.';
$string['extremovedkeep'] = 'Manter os utilizadores inscritos';
$string['extremovedsuspend'] = 'Desativar inscrições na disciplina';
$string['extremovedsuspendnoroles'] = 'Desativar inscrições na disciplina e remover atribuições de papéis';
$string['extremovedunenrol'] = 'Cancelar inscrição do utilizador na disciplina';
$string['finishenrollingusers'] = 'Terminar inscrições';
$string['invalidenrolinstance'] = 'Instância de inscrição inválida';
$string['invalidrole'] = 'Papel inválido';
$string['manageenrols'] = 'Gerir módulos de inscrição';
$string['manageinstance'] = 'Gerir';
$string['nochange'] = 'Sem alteração';
$string['noexistingparticipants'] = 'Não existem participantes';
$string['noguestaccess'] = 'O acesso de visitantes a esta disciplina não é permitido, por favor, tente autenticar-se';
$string['none'] = 'Nenhum(a)';
$string['notenrollable'] = 'Esta disciplina não aceita inscrições neste momento.';
$string['notenrolledusers'] = 'Outros utilizadores';
$string['otheruserdesc'] = 'Estes utilizadores não estão inscritos nesta disciplina mas têm papéis atribuídos (herdados ou atribuídos diretamente).';
$string['participationactive'] = 'Ativo(a)';
$string['participationstatus'] = 'Estado';
$string['participationsuspended'] = 'Suspenso(a)';
$string['periodend'] = 'até {$a}';
$string['periodnone'] = '{$a} inscrito(s)';
$string['periodstart'] = 'desde {$a}';
$string['periodstartend'] = 'desde {$a->start} até {$a->end}';
$string['recovergrades'] = 'Recuperar,se possível as notas antigas do utilizador';
$string['rolefromcategory'] = 'Papel "{$a->role}" herdado da categoria da disciplina';
$string['rolefrommetacourse'] = 'Papel "{$a->role}" herdado de disciplina-pai';
$string['rolefromsystem'] = 'Papel "{$a->role}" atribuído no contexto do site';
$string['rolefromthiscourse'] = 'Papel "{$a->role}" atribuído no contexto da disciplina';
$string['startdatetoday'] = 'Hoje';
$string['synced'] = 'Sincronizado(a)';
$string['totalenrolledusers'] = '{$a} utilizadores inscritos';
$string['totalotherusers'] = '{$a} outros utilizadores';
$string['unassignnotpermitted'] = 'Não tem permissões para remover atribuições de papéis nesta disciplina';
$string['unenrol'] = 'Cancelar inscrição';
$string['unenrolconfirm'] = 'Tem a certeza de que quer cancelar a inscrição do utilizador "{$a->user}" da disciplina "{$a->course}"?';
$string['unenrolme'] = 'Cancele a minha inscrição na disciplina {$a}';
$string['unenrolnotpermitted'] = 'Não term permissões para cancelar a inscrição deste utilizador nesta disciplina';
$string['unenrolroleusers'] = 'Cancelar a inscrição de utilizadores';
$string['uninstallconfirm'] = 'Está prestes a desinstalar o módulo de inscrição \'{$a}\'. Isto resultará na eliminação de todos os dados associados a este tipo de inscrição, incluindo as notas dos utilizadores, atribuições a grupos, subscrições de fórum e qualquer outro dado relacionado com a disciplina.

Tem a certeza que pretende continuar?';
$string['uninstalldelete'] = 'Eliminar todas as inscrições e desinstalar';
$string['uninstalldeletefiles'] = 'Toda a informação existente na base de dados sobre o módulo "{$a->plugin}" foi apagada. Para completar a remoção do módulo (e evitar a sua reinstalação) deve apagar a pasta "{$a->directory}" do servidor.';
$string['uninstallmigrate'] = 'Desinstalar mas manter todas as inscrições';
$string['uninstallmigrating'] = 'Migrar "{$a}" inscrições';
$string['unknowajaxaction'] = 'A ação pedida é desconhecida';
$string['unlimitedduration'] = 'Ilimitado(a)';
$string['usersearch'] = 'Procurar';
$string['withselectedusers'] = 'Com os utilizadores selecionados';
