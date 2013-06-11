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
 * Strings for component 'chat', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   chat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Inicia em breve uma sessão de Chat';
$string['ajax'] = 'Versão com Ajax';
$string['autoscroll'] = 'Scroll automático';
$string['beep'] = 'Chamar';
$string['cantlogin'] = 'Não foi possível entrar no chat!';
$string['chat:addinstance'] = 'Adicionar novo chat';
$string['chat:chat'] = 'Aceder a uma sala de chat';
$string['chat:deletelog'] = 'Apagar as gravações do chat';
$string['chat:exportparticipatedsession'] = 'Exportar sessão de chat em que participou';
$string['chat:exportsession'] = 'Exportar qualquer sessão de chat';
$string['chatintro'] = 'Descrição';
$string['chatname'] = 'Nome da sala de chat';
$string['chat:readlog'] = 'Ler gravações do chat';
$string['chatreport'] = 'Sessões de chat';
$string['chat:talk'] = 'Submeter mensagens no chat';
$string['chattime'] = 'Próxima sessão de chat';
$string['composemessage'] = 'Compor mensagem';
$string['configmethod'] = 'O método de chat com ajax proporciona um inteface de chat baseado em ajax e contacta o servidor regularmente para atualização. O método normal do chat precisa que os clientes contactem regularmente o servidor para obter atualizações. Não precisa de nenhuma configuração e funciona em qualquer parte, mas poderá sobrecarregar um servidor quando há muitas pessoas no chat. A utilização dum servidor daemon requer acesso via shell ao Unix, mas o resultado é um ambiente de chat mais rápido e que escala melhor.';
$string['confignormalupdatemode'] = 'Normalmente, as atualizações da sala de chat são feitas de forma eficiente usando o comando <em>Keep-Alive</em> do HTTP 1.1, mas esse método gera uma grande carga no servidor. Um método mais avançado consiste em usar a estratégia de  <em>Stream</em> para enviar atualizações para os utilizadores. A utilização do <em>Stream</em> tem uma escalabilidade melhor (semelhante à do método chat) mas o seu servidor poderá não suportar este método.';
$string['configoldping'] = 'Qual o tempo máximo sem resposta para considerar que o utilizador está desconectado (em segundos)? Este é apenas um limite superior pois habitualmente quando um utilizador se desconecta tal é detetado rapidamente. Valores reduzidos irão exigir mais do servidor. Se estiver a utilizar o método normal <strong>nunca</strong> defina este valor para menos de 2 x o tempo de Atualizar sala';
$string['configrefreshroom'] = 'Com que frequência será atualizada a sala de chat (em segundos)? Um valor muito baixo fará com que a resposta da sala de chat seja mais rápida, mas vai impor uma carga mais pesada ao seu servidor quando o número de participantes no chat for elevado. Se estiver a usar atualizações <em>Stream</em>, pode escolher uma frequência de atualização superior - tente o valor 2.';
$string['configrefreshuserlist'] = 'Com que frequência deve ser atualizada a lista de participantes? (em segundos)';
$string['configserverhost'] = 'O nome do computador onde se encontra o servidor daemon.';
$string['configserverip'] = 'O endereço IP do servidor acima.';
$string['configservermax'] = 'Número máximo de participantes permitido';
$string['configserverport'] = 'Porta a usar no servidor para o daemon';
$string['currentchats'] = 'Sessões de chat ativas';
$string['currentusers'] = 'Utilizadores no chat';
$string['deletesession'] = 'Apagar sessão';
$string['deletesessionsure'] = 'Tem a certeza que deseja apagar a gravação desta sessão?';
$string['donotusechattime'] = 'Sem hora definida';
$string['enterchat'] = 'Clique aqui para entrar no chat';
$string['entermessage'] = 'Introduza a sua mensagem';
$string['errornousers'] = 'Não foi encontrado nenhum utilizador!';
$string['explaingeneralconfig'] = 'Estas configurações serão  <strong>sempre</strong> aplicadas.';
$string['explainmethoddaemon'] = 'Estas configurações aplicam-se <strong>unicamente</strong> se tiver selecionado "Servidor daemon de Chat" na opção Método do Chat';
$string['explainmethodnormal'] = 'Estas configurações aplicam-se <strong>unicamente</strong> se tiver selecionado o "Método Normal" na opção Método do Chat';
$string['generalconfig'] = 'Configuração geral';
$string['idle'] = 'Parado';
$string['inputarea'] = 'Área de entrada';
$string['invalidid'] = 'Não foi possível encontrar a sala de chat!';
$string['list_all_sessions'] = 'Listar todas as sessões';
$string['list_complete_sessions'] = 'Listar apenas sessões completas.';
$string['listing_all_sessions'] = 'Listagem de todas as sessões';
$string['messagebeepseveryone'] = '{$a} chama toda a gente!';
$string['messagebeepsyou'] = '{$a} acabou de o chamar!';
$string['messageenter'] = '{$a} acabou de entrar neste chat';
$string['messageexit'] = '{$a} acabou de sair deste chat';
$string['messages'] = 'Mensagens';
$string['messageyoubeep'] = 'Você chamou {$a}';
$string['method'] = 'Método do Chat';
$string['methodajax'] = 'Método Ajax';
$string['methoddaemon'] = 'Servidor daemon de Chat';
$string['methodnormal'] = 'Método Normal';
$string['modulename'] = 'Chat';
$string['modulename_help'] = 'A atividade Chat permite aos alunos participarem numa sessão síncrona via web.

O chat pode ocorrer apenas numa sessão ou repetir-se à mesma hora ao longo de vários dias ou semanas. As sessões são gravadas e podem ser disponibilizadas a todos os alunos ou a apenas ao professor.

O Chat é uma ferramenta particularmente útil em situações em que as pessoas não podem encontrar-se presencialmente, tais como:

* Encontros regulares entre alunos inscritos num curso online, o que lhes permite compartilhar experiências com outros alunos inscritos no mesmo curso, independentemente do local (cidade ou país) onde se encontrem
* Conversas entre professor e aluno, quando este se encontra temporariamente impedido de comparecer pessoalmente nas aulas, permitindo-lhe recuperar os trabalhos em atraso;
* Para permitir que os alunos se possam reunir fora do contexto de aula e discutir as suas experiências;
* Para os pais terem a oportunidade de monitorizar e acompanhar as suas crianças pela descoberta do mundo das redes sociais;
* Sessões dinamizadas por um orador convidado que se encontra num local distante, permitindo assim a comunicação entre todos os participantes.';
$string['modulename_link'] = 'mod/chat/view';
$string['modulenameplural'] = 'Chats';
$string['neverdeletemessages'] = 'Nunca apagar mensagens';
$string['nextsession'] = 'Próxima sessão agendada';
$string['nochat'] = 'Chat não encontrado';
$string['no_complete_sessions_found'] = 'Não foram encontradas sessões completas.';
$string['noguests'] = 'O chat não está disponível para visitantes.';
$string['nomessages'] = 'Ainda não há mensagens';
$string['nopermissiontoseethechatlog'] = 'Não tem permissão para visualizar as gravações do chat';
$string['normalkeepalive'] = 'KeepAlive';
$string['normalstream'] = 'Stream';
$string['noscheduledsession'] = 'Nenhuma sessão agendada';
$string['notallowenter'] = 'Não tem permissão para entrar no chat.';
$string['notlogged'] = 'Você não está autenticado!';
$string['oldping'] = 'Tempo limite sem atividade';
$string['page-mod-chat-x'] = 'Qualquer página do chat';
$string['pastchats'] = 'Sessões de chat anteriores';
$string['pluginadministration'] = 'Administração do chat';
$string['pluginname'] = 'Chat';
$string['refreshroom'] = 'Atualizar sala';
$string['refreshuserlist'] = 'Atualizar lista de utilizadores';
$string['removemessages'] = 'Apagar todas as mensagens';
$string['repeatdaily'] = 'Todos os dias à mesma hora';
$string['repeatnone'] = 'Sem repetições - apenas à hora definida';
$string['repeattimes'] = 'Tipo de chat';
$string['repeatweekly'] = 'Todas as semanas à mesma hora';
$string['saidto'] = 'disse a';
$string['savemessages'] = 'Manter gravação de sessões anteriores durante';
$string['seesession'] = 'Ver sessão';
$string['send'] = 'Enviar';
$string['sending'] = 'A enviar';
$string['serverhost'] = 'Nome do servidor';
$string['serverip'] = 'IP do servidor';
$string['servermax'] = 'Num. máx. utilizadores';
$string['serverport'] = 'Porta do servidor';
$string['sessions'] = 'Sessões de chat';
$string['sessionstart'] = 'A próxima sessão de chat irá iniciar em: {$a}';
$string['strftimemessage'] = '%H:%M';
$string['studentseereports'] = 'Todos podem ver as sessões anteriores';
$string['studentseereports_help'] = 'Se definir como Não, apenas os utilizadores com a permissão mod/chat:readlog podem ver as gravações das sessões';
$string['talk'] = 'Falar';
$string['updatemethod'] = 'Método de atualização';
$string['updaterate'] = 'Frequência de atualização:';
$string['userlist'] = 'Lista de utilizadores';
$string['usingchat'] = 'A usar o chat';
$string['usingchat_help'] = 'O módulo de chat inclui algumas caraterísticas para tornar o chat mais agradável.
* Ícones expressivos - Qualquer ícone expressivo (emoticon) que pode usar noutras partes do Moodle pode ser usada também aqui e será substituída pela imagem correspondente. Por exemplo, :-)
* Links - Os endereços da Web serão transformados automaticamente em links.
* Personalização - Pode começar uma linha com "/me" ou ":" para personalizar a mensagem. Por exemplo, se o seu nome for Joaquim, e escrever ":sorriu!" ou "/me sorri!", todos os outros participantes verão "Joaquim sorriu!"
* Beeps - Pode enviar um som a os outros participantes clicando em "chamar" junto dos seus nomes. Um atalho útil para chamar todos os participantes consiste em escrever "beep all".
* HTML - Se souber algum código HTML, poderá usá-lo no seu texto para fazer coisas como, por exemplo, inserir imagens, tocar sons, ou enviar texto com cores diferentes.';
$string['viewreport'] = 'Ver gravações de sessões anteriores';
