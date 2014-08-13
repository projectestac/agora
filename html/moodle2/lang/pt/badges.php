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
 * Strings for component 'badges', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   badges
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Ações';
$string['activate'] = 'Ativar acesso';
$string['activatesuccess'] = 'O acesso às Medalhas foi ativado com sucesso.';
$string['addbadgecriteria'] = 'Adicionar critérios à Medalha';
$string['addcourse'] = 'Adicionar disciplinas';
$string['addcourse_help'] = 'Selecione todas as disciplinas que devem fazer parte dos requisitos desta Medalha. Mantenha a tecla CTRL pressionada para selecionar vários itens.';
$string['addcriteria'] = 'Adicionar critério';
$string['addcriteriatext'] = 'Para começar a adicionar critérios, por favor, selecione uma das opções a partir da caixa de seleção.';
$string['addtobackpack'] = 'Adicionar à Backpack';
$string['adminonly'] = 'Esta página é restrita apenas aos administradores do site.';
$string['after'] = 'após a data de emissão.';
$string['aggregationmethod'] = 'Método de agregação';
$string['all'] = 'Todos';
$string['allmethod'] = 'Todas as condições selecionadas se verificam';
$string['allmethodactivity'] = 'Todas as atividades selecionadas estão concluídas';
$string['allmethodcourseset'] = 'Todas as disciplinas selecionadas estão concluídas';
$string['allmethodmanual'] = 'Todos os papéis selecionados podem atribuir a Medalha';
$string['allmethodprofile'] = 'Todos os campos de perfil selecionados foram completados';
$string['allowcoursebadges'] = 'Ativar Medalhas na disciplina';
$string['allowcoursebadges_desc'] = 'Permitir que as Medalhas sejam criadas e atribuídas no contexto da disciplina';
$string['allowexternalbackpack'] = 'Ativar ligação a Backpacks externas';
$string['allowexternalbackpack_desc'] = 'Permitir aos utilizadores configurar ligações e exibir Medalhas a partir dos seus fornecedores externos de Backpacks. Nota: É recomendável deixar esta opção desativada caso não seja possível aceder ao site a partir da Internet (por exemplo, por causa da firewall).';
$string['any'] = 'Qualquer um';
$string['anymethod'] = 'Qualquer uma das condições selecionadas se verifica';
$string['anymethodactivity'] = 'Qualquer uma das atividades selecionadas está concluída';
$string['anymethodcourseset'] = 'Qualquer uma das disciplinas selecionadas está concluída';
$string['anymethodmanual'] = 'Qualquer um dos papéis selecionados pode atribuir a Medalha';
$string['anymethodprofile'] = 'Qualquer um dos campos de perfil foi completado';
$string['attachment'] = 'Anexar Medalha à mensagem';
$string['attachment_help'] = 'Se ativar esta opção, uma Medalha emitida será anexada ao email para que os destinatários possam fazer o seu download. Para usar esta opção, a funcionalidade de anexos de email tem de ser ativada nas configurações do site.';
$string['award'] = 'Atribuir Medalha';
$string['awardedtoyou'] = 'Atribuídas a mim';
$string['awardoncron'] = 'O acesso às Medalhas foi ativado com sucesso. Esta Medalha pode ser recebida por um grande número de utilizadores. Para assegurar o desempenho do site, esta ação levará algum tempo a processar.';
$string['awards'] = 'Destinatários';
$string['backpackavailability'] = 'Verificação externa da Medalha';
$string['backpackavailability_help'] = 'Para que os destinatários possam provar que lhes atribuiu as Medalhas, é necessário que um serviço externo de Backpack possa aceder ao seu site e verificar as Medalhas que foram emitidas a partir dele. Aparentemente, o seu site não está acessível de momento, o que significa que as Medalhas que já emitiu ou irá emitir não poderão ser verificadas.

**Porque é que está a ver esta mensagem?**

Isto pode dever-se ao facto de: a sua firewall impedir o acesso de utilizadores externos à sua rede; o seu site está protegido com uma senha; ou o site está a ser carregado num computador que não está acessível a partir da Internet (p.ex. uma máquina de desenvolvimento local).

**Isto constitui um problema?**

Deve resolver este problema em qualquer site de produção onde pretende emitir Medalhas, caso contrário, os destinatários não poderão provar que lhes atribuiu as Medalhas. Se o seu site ainda está em desenvolvimento, pode criar e emitir Medalhas de teste, desde que o site esteja acessível enquanto está em desenvolvimento.

**E se não conseguir que todo o seu site fique publicamente acessível?**

O único URL que requer verificação é [url-do-seu-site]/badges/assertion.php, logo, se lhe for possível alterar a sua firewall para permitir o acesso externo a esse ficheiro, a verificação da Medalha continuará a funcionar.';
$string['backpackbadges'] = 'Tem {$a->totalbadges} Medalha(s) exibidas a partir de {$a->totalcollections} coleções(s). <a href="mybackpack.php">Altere as configurações da Backpack</a>.';
$string['backpackconnection'] = 'Ligação à Backpack';
$string['backpackconnection_help'] = 'Esta página permite-lhe configurar a ligação com um fornecedor externo de Backpack. Ligar-se a uma Backpack permite-lhe exibir as Medalhas externas neste site e encaminhar para a sua Backpack as Medalhas que recebeu aqui.

Para já, apenas é suportado o <a href="http://backpack.openbadges.org">Mozilla OpenBadges Backpack</a>. Tem de se registar num serviço de Backpack antes de tentar configurar a ligação à Backpack nesta página.';
$string['backpackdetails'] = 'Configurações da Backpack';
$string['backpackemail'] = 'Endereço de email';
$string['backpackemail_help'] = 'Endereço de email associado à sua Backpack. Enquanto estiver ligado, qualquer Medalha recebida neste site será associada a este endereço de email.';
$string['backpackimport'] = 'Configurações de importação de Medalhas';
$string['backpackimport_help'] = 'Depois da ligação à Backpack ser estabelecida com sucesso, as Medalhas da sua Backpack podem ser exibidas na sua página "Minhas Medalhas" e no seu perfil.

Nesta área, pode selecionar coleções de Medalhas a partir da sua Backpack e que gostaria de exibir no seu perfil.';
$string['badgedetails'] = 'Detalhes da Medalha';
$string['badgeimage'] = 'Imagem';
$string['badgeimage_help'] = 'Esta é a imagem que será usada quando esta Medalha for emitida.

Para adicionar uma nova imagem, procure e selecione uma imagem (nos formatos JPG ou PNG) e clique em "Guardar alterações". Para cumprir com os requisitos de imagem das Medalhas, a imagem será recortada para ter forma quadrada e redimensionada.';
$string['badgeprivacysetting'] = 'Configurações de privacidade da Medalha';
$string['badgeprivacysetting_help'] = 'As Medalhas que receber podem ser exibidas na página do seu perfil. Esta configuração permite-lhe definir automaticamente a visibilidade das Medalhas recebidas recentemente.

No entanto, continuará a poder controlar individualmente as configurações de privacidade das Medalhas na sua página "Minhas Medalhas".';
$string['badgeprivacysetting_str'] = 'Exibe automaticamente na página do meu perfil as Medalhas que recebi';
$string['badgesalt'] = 'Salt para encriptar endereço de email dos destinatários';
$string['badgesalt_desc'] = 'Usar uma encriptação permite aos serviços de Backpack confirmar o utilizador que recebeu a Medalha sem ter de expor o seu endereço de email. Esta configuração deverá usar icluir números e letras.';
$string['badgesdisabled'] = 'As Medalhas não estão ativas neste site.';
$string['badgesearned'] = 'Número de Medalhas recebidas: {$a}';
$string['badgesettings'] = 'Configurações das Medalhas';
$string['badgestatus_0'] = 'Não disponível para os utilizadores';
$string['badgestatus_1'] = 'Disponível para os utilizadores';
$string['badgestatus_2'] = 'Não disponível para os utilizadores';
$string['badgestatus_3'] = 'Disponível para os utilizadores';
$string['badgestatus_4'] = 'Arquivado';
$string['badgestoearn'] = 'Número de Medalhas disponíveis: {$a}';
$string['badgesview'] = 'Medalhas da disciplina';
$string['badgeurl'] = 'Hiperligação para a Medalha emitida';
$string['bawards'] = 'Destinatários ({$a})';
$string['bcriteria'] = 'Critérios';
$string['bdetails'] = 'Editar detalhes';
$string['bmessage'] = 'Mensagem';
$string['boverview'] = 'Perspetiva global';
$string['bydate'] = 'obtida em';
$string['clearsettings'] = 'Limpar configurações';
$string['completioninfo'] = 'Esta Medalha foi atribuida porque completou:';
$string['completionnotenabled'] = 'A \'Conclusão da disciplina\' não está ativa para esta disciplina, por isso não poderá ser incluída nos critérios da Medalha. A \'Conclusão da disciplina\' pode ser ativada nas configurações da disciplina.';
$string['configenablebadges'] = 'Quando ativada, esta funcionalidade permite-lhe criar Medalhas e atribuí-las aos utilizadores do site.';
$string['configuremessage'] = 'Mensagem da Medalha';
$string['connect'] = 'Ligar';
$string['connected'] = 'Ligado';
$string['connecting'] = 'A estabelecer a ligação...';
$string['contact'] = 'Contacto';
$string['contact_help'] = 'Um endereço de email associado ao emissor da Medalha.';
$string['copyof'] = 'Cópia de {$a}';
$string['coursebadges'] = 'Medalhas';
$string['coursebadgesdisabled'] = 'Medalhas da disciplina não estão ativas neste site.';
$string['coursecompletion'] = 'Os utilizadores têm de completar esta disciplina';
$string['create'] = 'Nova Medalha';
$string['createbutton'] = 'Criar Medalha';
$string['creatorbody'] = '<p>{$a->user} completou todos os requisitos e foi-lhe atribuída a Medalha. Veja a Medalha emitida em {$a->link} </p>';
$string['creatorsubject'] = '\'{$a}\' foi atribuído(a)!';
$string['criteria_0'] = 'Esta Medalha é atribuída quando...';
$string['criteria_1'] = 'Conclusão da atividade';
$string['criteria_1_help'] = 'Permite que uma Medalha seja atribuída aos utilizadores em função da conclusão de um conjunto de atividades de uma disciplina.';
$string['criteria_2'] = 'Emissão manual pelo papel';
$string['criteria_2_help'] = 'Permite que uma Medalha seja atribuída manualmente pelos utilizadores que têm um papel específico dentro do site ou da disciplina.';
$string['criteria_3'] = 'Participação social';
$string['criteria_3_help'] = 'Social';
$string['criteria_4'] = 'Conclusão da disciplina';
$string['criteria_4_help'] = 'Permite que uma Medalha seja atribuída a utilizadores que tenham concluído a disciplina. Este critério pode ter parâmetros adicionais, tais como uma nota mínima e a data de conclusão da disciplina.';
$string['criteria_5'] = 'Completar um conjunto de disciplinas';
$string['criteria_5_help'] = 'Permite que uma Medalha seja atribuída a utilizadores que tenham concluído um conjunto de disciplinas. Cada disciplina pode ter parâmetros adicionais, tais como uma nota mínima e a data de conclusão da disciplina.';
$string['criteria_6'] = 'Preenchimento do perfil';
$string['criteria_6_help'] = 'Permite que uma Medalha seja atribuída a utilizadores que completem determinados campos do seu perfil. Pode selecionar campos predefinidos e campos personalizados que estão disponíveis para os utilizadores.';
$string['criteriacreated'] = 'Critérios da Medalha criados com sucesso';
$string['criteriadeleted'] = 'Critérios da Medalha eliminados com sucesso';
$string['criteria_descr'] = 'Os utilizadores recebem esta Medalha quando cumprem os seguintes requisitos:';
$string['criteria_descr_0'] = 'Os utilizadores recebem esta Medalha quando cumprem <strong>{$a}</strong> dos requisitos listados.';
$string['criteria_descr_1'] = '<strong>{$a}</strong> das seguintes atividades estão concluídas:';
$string['criteria_descr_2'] = 'Esta Medalha tem de ser atribuída por utilizadores com <strong>{$a}</strong> dos seguintes papéis:';
$string['criteria_descr_4'] = 'Os utilizadores têm de concluir a disciplina';
$string['criteria_descr_5'] = '<strong>{$a}</strong> das seguintes disciplinas têm de ser concluídas:';
$string['criteria_descr_6'] = '<strong>{$a}</strong> dos seguintes campos de perfil têm de ser completados:';
$string['criteria_descr_bydate'] = 'por <em>{$a}</em>';
$string['criteria_descr_grade'] = 'com a nota mínima de <em>{$a}</em>';
$string['criteria_descr_short0'] = 'Concluir <strong>{$a}</strong> de:';
$string['criteria_descr_short1'] = 'Concluir <strong>{$a}</strong> de:';
$string['criteria_descr_short2'] = 'Atribuído por <strong>{$a}</strong> de:';
$string['criteria_descr_short4'] = 'Concluir a disciplina';
$string['criteria_descr_short5'] = 'Concluir <strong>{$a}</strong> de:';
$string['criteria_descr_short6'] = 'Concluir <strong>{$a}</strong> de:';
$string['criteria_descr_single_1'] = 'A seguinte atividade tem ser concluída:';
$string['criteria_descr_single_2'] = 'Esta Medalha tem de ser atribuída por um utilizador com o seguinte papel:';
$string['criteria_descr_single_4'] = 'Os utilizadores têm de concluir a disciplina';
$string['criteria_descr_single_5'] = 'A seguinte disciplina tem ser concluída:';
$string['criteria_descr_single_6'] = 'O seguinte campo de perfil do utilizador tem de ser completo:';
$string['criteria_descr_single_short1'] = 'Conclusão:';
$string['criteria_descr_single_short2'] = 'Atribuído por:';
$string['criteria_descr_single_short4'] = 'Conclusão da disciplina';
$string['criteria_descr_single_short5'] = 'Conclusão:';
$string['criteria_descr_single_short6'] = 'Conclusão:';
$string['criteriasummary'] = 'Resumo de critérios';
$string['criteriaupdated'] = 'Critérios da Medalha atualizados com sucesso';
$string['criterror'] = 'Erros de parâmetros atuais';
$string['criterror_help'] = 'Este critério mostra todos os parâmetros que foram inicialmente adicionados aos requisitos deste Medalha, mas que já não estão disponíveis. É recomendável que não selecione esses parâmetros para se certificar de que os utilizadores podem receber este Medalha no futuro.';
$string['currentimage'] = 'Imagem atual';
$string['currentstatus'] = 'Estado atual:';
$string['dateawarded'] = 'Data de emissão';
$string['dateearned'] = 'Data: {$a}';
$string['day'] = 'Dia(s)';
$string['deactivate'] = 'Desativar acesso';
$string['deactivatesuccess'] = 'O acesso às Medalha foi desativado com sucesso.';
$string['defaultissuercontact'] = 'Detalhes de contacto do emissor predefinido de Medalhas';
$string['defaultissuercontact_desc'] = 'Endereço de email associado ao emissor de Medalhas.';
$string['defaultissuername'] = 'Nome predefinido do emissor de Medalhas';
$string['defaultissuername_desc'] = 'Nome do agente ou autoridade emissora.';
$string['delbadge'] = 'Eliminar Medalha';
$string['delconfirm'] = 'Tem a certeza de que pretende eliminar a Medalha \'{$a}\'?';
$string['delcritconfirm'] = 'Tem a certeza de que pretende eliminar este critério?';
$string['delparamconfirm'] = 'Tem a certeza de que pretende eliminar este parâmetro?';
$string['description'] = 'Descrição';
$string['disconnect'] = 'Desligar';
$string['donotaward'] = 'Esta Medalha não se encontra disponível de momento e, por isso, não pode ser atribuída aos utilizadores. Se pretende atribuir esta Medalha, por favor configure o seu estado para ativo.';
$string['editsettings'] = 'Editar configurações';
$string['enablebadges'] = 'Ativar Medalhas';
$string['error:backpackdatainvalid'] = 'A informação devolvida pela Backpack é inválida.';
$string['error:backpackemailnotfound'] = 'O email \'{$a}\' não está associado à Backpack. Tem de criar uma Backpack <a href="http://backpack.openbadges.org"></a> para essa conta ou entrar com outro endereço de email.';
$string['error:backpackloginfailed'] = 'Não é possível ligar-se a uma Backpack externa pelo seguinte motivo: {$a}';
$string['error:backpacknotavailable'] = 'O seu site não está disponível a partir da internet e, por isso, nenhuma Medalha atribuída neste site poderá ser verificada por um serviço externo de Backpacks.';
$string['error:backpackproblem'] = 'Ocorreu um problema ao ligar ao seu fornecedor de serviços de Backpack. Por favor, tente mais tarde.';
$string['error:badjson'] = 'A tentativa de ligação devolveu informação inválida.';
$string['error:cannotact'] = 'Não é possível ativar a Medalha.';
$string['error:cannotawardbadge'] = 'Não é possível atribuir a Medalha a um utilizador.';
$string['error:clone'] = 'Não é possível duplicar a Medalha.';
$string['error:connectionunknownreason'] = 'A ligação não foi bem sucedida sem que nenhum motivo fosse indicado para o justificar.';
$string['error:duplicatename'] = 'Já existe uma Medalha com o mesmo nome no sistema.';
$string['error:externalbadgedoesntexist'] = 'Medalha não encontrada';
$string['error:guestuseraccess'] = 'Encontra-se a usar acesso de visitante. Para ver as Medalhas tem de entrar com a sua conta de utilizador.';
$string['error:invalidbadgeurl'] = 'Formato de URL do emissor da Medalha inválido.';
$string['error:invalidcriteriatype'] = 'Tipo de critério inválido.';
$string['error:invalidexpiredate'] = 'A data de expiração tem de ser futura.';
$string['error:invalidexpireperiod'] = 'O período de expiração não pode ser negativo ou igual a 0.';
$string['error:noactivities'] = 'Não existem atividades com critérios de conclusão ativos nesta disciplina.';
$string['error:noassertion'] = 'Nenhuma afirmação foi devolvida pelo sistema Persona. Poderá ter fechado a caixa de diálogo antes de completar o processo de autenticação.';
$string['error:nocourses'] = 'A Conclusão da disciplina não está ativa para nenhuma das disciplinas neste site e, por isso, nenhuma pode ser exibida. A Conclusão da disciplina pode ser ativada nas configurações da disciplina.';
$string['error:nogroups'] = '<p> Não existem coleções públicas de Medalhas disponíveis na sua Backpack. </p><p> Apenas coleções públicas são exibidas, <a href="http://backpack.openbadges.org">aceda à sua Backpack</a> para criar algumas coleções públicas. </p>';
$string['error:nopermissiontoview'] = 'Não tem permissão para ver os destinatários da Medalha';
$string['error:nosuchbadge'] = 'A Medalha com a identificação {$a} não existe.';
$string['error:nosuchcourse'] = 'Aviso: Esta disciplina já não está disponí';
$string['error:nosuchfield'] = 'Aviso: Este campo de perfil do utilizador já não está disponível.';
$string['error:nosuchmod'] = 'Aviso: Esta atividade já não está disponível.';
$string['error:nosuchrole'] = 'Aviso: Este papel já não está disponível.';
$string['error:nosuchuser'] = 'O utilizador com este endereço de e-mail não tem uma conta com o no atual fornecedor de Medalhas.';
$string['error:notifycoursedate'] = 'Aviso: As Medalhas associadas à conclusão de disciplina e de atividade não serão emitidas até à data de início da disciplina.';
$string['error:parameter'] = 'Aviso: Pelo menos um parâmetro deve ser selecionado para garantir a correta emissão da Medalha.';
$string['error:personaneedsjs'] = 'Atualmente, é necessário Javascript para estabelecer a ligação à sua Backpack. Se tiver permissão para tal, ative o Javascript e recarregue a página.';
$string['error:requesterror'] = 'O pedido de ligação falhou (código de erro {$a})';
$string['error:requesttimeout'] = 'O pedido de ligação expirou antes de ser concluído.';
$string['error:save'] = 'Não é possível guardar a Medalha.';
$string['error:userdeleted'] = '{$a->user} (Este utilizador já não existe em {$a->site})';
$string['evidence'] = 'Evidência';
$string['existingrecipients'] = 'Atuais destinatários da Medalha';
$string['expired'] = 'Expirada';
$string['expiredate'] = 'A validade desta Medalha termina em {$a}.';
$string['expireddate'] = 'A validade desta Medalha terminou em {$a}.';
$string['expireperiod'] = 'A validade desta Medalha termina em {$a} dia(s) após a sua emissão.';
$string['expireperiodh'] = 'A validade desta Medalha termina em {$a} hora(s) após a sua emissão.';
$string['expireperiodm'] = 'A validade desta Medalha termina em {$a} minuto(s) após a sua emissão.';
$string['expireperiods'] = 'A validade desta Medalha termina em {$a} segundo(s) após a sua emissão.';
$string['expirydate'] = 'Data de validade';
$string['expirydate_help'] = 'Opcionalmente, as Medalhas podem expirar numa data específica, ou a data pode ser calculada com base na data em que a Medalha foi emitida a um utilizador.';
$string['externalbadges'] = 'As minhas Medalhas de outros sites';
$string['externalbadges_help'] = 'Esta área exibe as Medalhas da sua Backpack externa.';
$string['externalbadgesp'] = 'Medalhas de outros sites:';
$string['externalconnectto'] = 'Para exibir Medalhas externas tem de <a href="{$a}">ligar a uma Backpack</a>.';
$string['fixed'] = 'Data fixa';
$string['hidden'] = 'Oculta(s)';
$string['hiddenbadge'] = 'Lamentamos, mas o proprietário da Medalha não disponibiliza esta informação.';
$string['issuancedetails'] = 'Data de validade da Medalha';
$string['issuedbadge'] = 'Informação da Medalha emitida';
$string['issuerdetails'] = 'Detalhes do emissor';
$string['issuername'] = 'Nome do emissor';
$string['issuername_help'] = 'Nome do agente emissor ou autoridade.';
$string['issuerurl'] = 'URL do emissor';
$string['localbadges'] = 'As minhas Medalhas do site {$a}';
$string['localbadgesh'] = 'As Minhas Medalhas deste site';
$string['localbadgesh_help'] = 'Todas as Medalhas ganhas dentro deste web site por conclusão de disciplina, atividades e outros requisitos.

Pode gerir as suas Medalhas aqui e torná-las públicas ou privadas na página do seu perfil.

Pode fazer o download de todas as Medalhas, ou de cada Medalha separadamente, e guardá-las no seu computador. As Medalhas das quais fez download podem ser adicionadas ao seu serviço externo de Backpack.';
$string['localbadgesp'] = 'Medalhas de {$a}:';
$string['localconnectto'] = 'Para partilhar estas Medalhas para além deste web site tem de <a href="{$a}">ligar a uma Backpack</a>.';
$string['makeprivate'] = 'Tornar privadas';
$string['makepublic'] = 'Tornar públicas';
$string['managebadges'] = 'Gerir Medalhas';
$string['message'] = 'Corpo da mensagem';
$string['messagebody'] = '<p> Foi premiado com a Medalha "%badgename%"!</p> <p> Mais informações sobre esta Medalha em %badgelink%.</p> <p> Se não houver uma Medalha anexada a este e-mail, pode gerir e fazer o seu download a partir da página {$a}. </p>';
$string['messagesubject'] = 'Parabéns! Acabou de ganhar uma Medalha!';
$string['method'] = 'Este critério é cumprido quando…';
$string['mingrade'] = 'Nota mínima necessária';
$string['month'] = 'Mês/Meses';
$string['mybackpack'] = 'Configurações da minha Backpack';
$string['mybadges'] = 'Minhas Medalhas';
$string['never'] = 'Nunca';
$string['newbadge'] = 'Adicionar uma nova Medalha';
$string['newimage'] = 'Nova imagem';
$string['noawards'] = 'Esta Medalha ainda não foi atribuída.';
$string['nobackpack'] = 'Não existe nenhum serviço de Backpack ligado a esta conta.<br/>';
$string['nobackpackbadges'] = 'Não existem Medalhas nas coleções que selecionou. <a href="mybackpack.php">Adicionar mais coleções</a>.';
$string['nobackpackcollections'] = 'Não foi selecionada nenhuma coleção de Medalhas. <a href="mybackpack.php">Adicionar coleções</a>.';
$string['nobadges'] = 'Não existem Medalhas disponíveis.';
$string['nocriteria'] = 'Os critérios desta Medalha ainda não foram definidos.';
$string['noexpiry'] = 'Esta Medalha não tem uma data de validade.';
$string['noparamstoadd'] = 'Não existem parâmetros adicionais disponíveis para adicionar aos requisitos desta Medalha.';
$string['notacceptedrole'] = 'O seu papel atual não está entre os papéis que podem emitir manualmente esta Medalha. <br/> Se pretender visualizar os utilizadores que já ganharam esta Medalha, pode visitar a página {$a}.';
$string['notconnected'] = 'Desligado';
$string['nothingtoadd'] = 'Não existem critérios disponíveis para adicionar.';
$string['notification'] = 'Notificar o criador da Medalha';
$string['notification_help'] = 'Esta configuração gere as notificações enviadas ao criador da Medalha para que ele saiba que a Medalha foi emitida.

Estão disponíveis as seguintes opções:

* **NUNCA** – Não enviar notificações.

* **SEMPRE** – Enviar uma notificação sempre que esta Medalha é atribuída.

* **DIARIAMENTE** – Enviar notificações uma vez por dia.

* **SEMANALMENTE** – Enviar notificações uma vez por semana.

* **MENSALMENTE** – Enviar notificações uma vez por mês.';
$string['notifydaily'] = 'Diariamente';
$string['notifyevery'] = 'Sempre';
$string['notifymonthly'] = 'Mensalmente';
$string['notifyweekly'] = 'Semanalmente';
$string['numawards'] = 'Esta Medalha foi emitida a <a href="{$a->link}">{$a->count}</a> utilizador(es).';
$string['numawardstat'] = 'Esta Medalha foi emitida a {$a} utilizador(es).';
$string['overallcrit'] = 'dos critérios selecionados são cumpridos.';
$string['personaconnection'] = 'Identifique-se com o seu email';
$string['personaconnection_help'] = 'O Persona é um sistema que permite que você seja identificado em toda a web, usando um endereço de e-mail. A Backpack "Open Badges" usa o Persona como um sistema de autenticação e, por isso, você precisa de uma conta Persona para se ligar a uma Backpack.

Para mais informações sobre o Persona visite <a href="https://login.persona.org/about">https://login.persona.org/about</a> .';
$string['potentialrecipients'] = 'Potenciais destinatários da Medalha';
$string['recipientdetails'] = 'Detalhes do destinatário';
$string['recipientidentificationproblem'] = 'Não é possível encontrar um destinatário para esta Medalha entre os utilizadores existentes.';
$string['recipients'] = 'Destinatários da Medalha';
$string['recipientvalidationproblem'] = 'Não é possível verificar este utilizador como um destinatário desta Medalha.';
$string['relative'] = 'Data relativa';
$string['requiredcourse'] = 'Deve ser adicionada pelo menos uma disciplina ao critério disciplinas.';
$string['reviewbadge'] = 'Alterações ao acesso à Medalha';
$string['reviewconfirm'] = '<p> Isto fará com que esta Medalha fique visível para os utilizadores e disponível para lhes ser atribuída. </p>

<p> É possível que alguns utilizadores já tenham completado os critérios desta Medalha e, por isso, esta ser-lhes-á atribuída assim que a ativar. </p>

<p> Assim que uma Medalha for emitida, esta será <strong>bloqueada</strong> - algumas configurações, incluindo os critérios e as configurações da data de validade, não poderão ser alteradas.</p>

<p> Tem a certeza de que pretende ativar o acesso à Medalha {$a}? </p>';
$string['save'] = 'Guardar';
$string['searchname'] = 'Pesquisar por nome';
$string['selectaward'] = 'Por favor, selecione o papel que gostaria de usar para atribuir esta Medalha:';
$string['selectgroup_end'] = 'Apenas as coleções públicas são exibidas, <a href="http://backpack.openbadges.org">visite a sua Backpack</a> para criar mais coleções públicas.';
$string['selectgroup_start'] = 'Selecione coleções da sua Backpack para exibir neste site:';
$string['selecting'] = 'Com as Medalhas selecionadas…';
$string['setup'] = 'Configurar ligação';
$string['signinwithyouremail'] = 'Autentique-se com o seu email.';
$string['sitebadges'] = 'Medalhas do site';
$string['sitebadges_help'] = 'As Medalhas do site só podem ser atribuídas aos utilizadores para atividades relacionadas com o site. Estas incluem completar um conjunto de disciplinas ou partes dos perfis dos utilizadores. As Medalhas do site também podem ser emitidas manualmente por um utilizador e atribuídas a outro.

Medalhas para atividades relacionadas com a disciplina têm de ser criadas ao nível da disciplina. As Medalhas da disciplina encontram-se em Administração da Disciplina > Medalhas.';
$string['status'] = 'Estado da Medalha';
$string['status_help'] = 'O estado da Medalha determina o seu comportamento no sistema:

* **DISPONÍVEL** – Significa que esta Medalha pode ser atribuída aos utilizadores. Enquanto uma Medalha estiver disponível para os utilizadores, os respetivos critérios não podem ser alterados.

* **INDISPONÍVEL** – Significa que esta Medalha não está disponível para os utilizadores e que não pode ser ganha nem manualmente atribuída. Se essa Medalha nunca tiver sido emitida anteriormente, os seus critérios podem ser alterados.

Assim que uma Medalha tiver sido atribuída pelo menos a um utilizador, esta fica automaticamente **BLOQUEADA**. As Medalhas bloqueadas podem continuar a ser ganhas pelos utilziadores, mas os seus critérios já não poderão ser alterados. Se precisar de alterar detalhes os critérios de uma Medalha bloqueada, pode duplicar esta Medalha e fazer as alterações necessárias.

*Porque são as Medalhas bloqueadas?*

É uma forma de assegurar que todos os utilizadores completam os mesmos requisitos para receber uma Medalha. Atualmente, não é possível anular Medalhas. Se fosse permitido que os critérios das Medalhas fossem constantemente modificados, provavelmente resultaria em vários utilizadores a terem a mesma Medalha apesar de terem cumprido com requisitos completamente diferentes.';
$string['statusmessage_0'] = 'Atualmente, esta Medalha não está disponível para os utilizadores. Ative o acesso se pretende que os utilizadores consigam obter esta Medalha.';
$string['statusmessage_1'] = 'Atualmente, esta Medalha está disponível para os utilizadores. Desative o acesso para fazer alterações.';
$string['statusmessage_2'] = 'Atualmente, esta Medalha não está disponível para os utilizadores e os seus critérios estão bloqueados. Ative o acesso se pretende que os utilizadores consigam obter esta Medalha.';
$string['statusmessage_3'] = 'Atualmente, esta Medalha está disponível para os utilizadores e os seus critérios estão bloqueados.';
$string['statusmessage_4'] = 'Atualmente, esta Medalha está arquivada.';
$string['subject'] = 'Assunto da mensagem';
$string['variablesubstitution'] = 'Variável a substituir nas mensagens.';
$string['variablesubstitution_help'] = 'Na mensagem de uma Medalha, certas variáveis podem ser inseridas no assunto e/ou no corpo da mensagem para serem substituídas por valores reais quando a mensagem é enviada. As variáveis devem ser inseridas no texto tal como são exibidas em seguida. Podem ser usadas as seguintes variáveis:

%badgename%:
Isto será substituído pelo nome completo da Medalha.

%username%:
Isto será substituído pelo nome completo do destinatário.

%badgelink%:
Isto será substituído pelo URL público com informação sobre a Medalha emitida.';
$string['viewbadge'] = 'Ver Medalha emitida';
$string['visible'] = 'Visível';
$string['warnexpired'] = '(A validade desta Medalha terminou!)';
$string['year'] = 'Ano(s)';
