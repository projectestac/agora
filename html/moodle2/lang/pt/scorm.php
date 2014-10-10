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
 * Strings for component 'scorm', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   scorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activation'] = 'Ativação';
$string['activityloading'] = 'Vai ser automaticamente redirecionado para a atividade em…';
$string['activityoverview'] = 'Existem Pacotes SCORM que requerem a sua atenção';
$string['activitypleasewait'] = 'Atividade a carregar, por favor aguarde ...';
$string['adminsettings'] = 'Configurações do administrador';
$string['advanced'] = 'Parâmetros';
$string['aicchacpkeepsessiondata'] = 'Sessão de dados AICC HACP';
$string['aicchacpkeepsessiondata_desc'] = 'Período de tempo em dias para manter os dados da sessão externa AICC HACP (uma configuração alta vai encher a tabela com dados antigos, mas pode ser útil quando estiver depurando)';
$string['aicchacptimeout'] = 'Tempo limite AICC HACP';
$string['aicchacptimeout_desc'] = 'Período de tempo em minutos que uma sessão externa AICC HACP pode permanecer aberta';
$string['aliasonly'] = 'Ao selecionar um ficheiro \'imsmanifest.xml\' de um repositório, deverá usar um alias/atalho para este ficheiro.';
$string['allowapidebug'] = 'Ativar debug e tracing da API (configure a máscara de captura com apidebugmask)';
$string['allowtypeaicchacp'] = 'Permitir AICC HACP externo';
$string['allowtypeaicchacp_desc'] = 'Se ativar esta opção, permite a comunicação AICC HACP externa sem a necessidade de autenticação do utilizador para pedidos para o pacote externo AICC';
$string['allowtypeexternal'] = 'Ativar pacote tipo externo';
$string['allowtypeexternalaicc'] = 'Ativar URL AICC direto';
$string['allowtypeexternalaicc_desc'] = 'Se ativar esta opção, permite um url direto para um simples pacote AICC';
$string['allowtypelocalsync'] = 'Ativar pacote tipo descarregado';
$string['apidebugmask'] = 'API debug capture mask  - use um simples regex em &lt;username&gt;:&lt;activityname&gt; ex: admin:.* irá efetuar debug apenas para os administradores';
$string['areacontent'] = 'Ficheiros de conteúdo';
$string['areapackage'] = 'Pacote de conteúdo';
$string['asset'] = 'Recurso';
$string['assetlaunched'] = 'Recursos - Vistos';
$string['attempt'] = 'Tentativa';
$string['attempt1'] = '1 tentativa';
$string['attempts'] = 'Tentativas';
$string['attemptsmanagement'] = 'Gestão das tentativas';
$string['attemptstatusall'] = 'Minha página inicial e de entrada';
$string['attemptstatusentry'] = 'Apenas página de entrada';
$string['attemptstatusmy'] = 'Apenas página inicial';
$string['attemptsx'] = '{$a} tentativas';
$string['attr_error'] = 'Valor errado para o atributo ({$a->attr}) na tag {$a->tag}';
$string['autocontinue'] = 'Prosseguir automaticamente';
$string['autocontinuedesc'] = 'Se ativar esta opção, os objetos de aprendizagem seguintes serão automaticamente iniciados, caso contrário, terá de ser usado o botão \'Continuar\'.';
$string['autocontinue_help'] = 'Se ativar esta opção, os objetos de aprendizagem seguintes serão exibidos automaticamente, caso contrário deverá ser usado o botão Continuar.';
$string['averageattempt'] = 'Média das tentativas';
$string['badarchive'] = 'Tem de fornecer um ficheiro zip válido';
$string['badimsmanifestlocation'] = 'Foi encontrado um ficheiro \'imsmanifest.xml\', mas não na raiz do seu ficheiro zip. Por favor, gere um novo pacote SCORM.';
$string['badmanifest'] = 'Erros no manifesto: ver o registo de erros';
$string['browse'] = 'Pré-visualizar';
$string['browsed'] = 'Consultado';
$string['browsemode'] = 'Modo de pré-visualização';
$string['browserepository'] = 'Pesquisar repositório';
$string['calculatedweight'] = 'Peso calculado';
$string['cannotfindsco'] = 'Não foi possível encontrar o SCO';
$string['chooseapacket'] = 'Selecionar ou atualizar um pacote de conteúdos';
$string['collapsetocwinsize'] = 'Contrair Tabela de Conteúdos quando o tamanho da janela é inferior a';
$string['collapsetocwinsizedesc'] = 'Esta configuração permite especificar o tamanho da janela, abaixo da qual a Tabela de Conteúdos deverá contrair automaticamente.';
$string['compatibilitysettings'] = 'Configurações de compatibilidade';
$string['completed'] = 'Completo';
$string['completionscorerequired'] = 'Exigir nota mínima';
$string['completionscorerequired_help'] = 'Ativar essa configuração vai exigir que o utilizador tenha pelo menos a pontuação mínima inserida para marcar como completa a atividade SCORM, bem como quaisquer outros requisitos de conclusão de atividade.';
$string['completionstatus_completed'] = 'Completo';
$string['completionstatus_passed'] = 'Aprovado';
$string['completionstatusrequired'] = 'Exigir estado';
$string['completionstatusrequired_help'] = 'Verificar um ou mais estados exigirá que o utilizador fique com pelo menos um estado, para se marcar como completa a atividade SCORM, bem como quaisquer outros requisitos de conclusão de atividade.';
$string['confirmloosetracks'] = 'AVISO: O pacote de conteúdos parece ter sido alterado. Caso a estrutura do pacote tenha sido alterada, alguns dados de utilizador poderão perder-se durante a atualização.';
$string['contents'] = 'Conteúdos';
$string['coursepacket'] = 'Pacote de Conteúdos';
$string['coursestruct'] = 'Estrutura do Conteúdo';
$string['currentwindow'] = 'Janela atual';
$string['datadir'] = 'Erro no sistema de ficheiros: não é possível criar a pasta para os dados';
$string['defaultdisplaysettings'] = 'Configurações de exibição predefinidas';
$string['defaultgradesettings'] = 'Configurações das notas predefinidas';
$string['defaultothersettings'] = 'Outras configurações predefinidas';
$string['deleteallattempts'] = 'Apagar todas as tentativas de realização do SCORM';
$string['deleteattemptcheck'] = 'Tem a certeza que deseja apagar estas tentativas?';
$string['deleteuserattemptcheck'] = 'Tem a certeza absoluta de que quer apagar completamente todas as suas tentativas?';
$string['details'] = 'Detalhe do percurso';
$string['directories'] = 'Mostrar links para pastas';
$string['disabled'] = 'Inativa';
$string['display'] = 'Exibir pacote de conteúdos';
$string['displayattemptstatus'] = 'Exibir estado da tentativa';
$string['displayattemptstatusdesc'] = 'Esta opção define se um resumo das tentativas do utilizador é exibido na Visão geral das disciplinas na Minha página principal e/ou na página de entrada do Pacote SCORM.';
$string['displayattemptstatus_help'] = 'Esta preferência disponibiliza um resumo das tentativas do utilizador exibido no bloco Visão geral das disciplinas na Minha página inicial e/ou de entrada do SCORM';
$string['displaycoursestructure'] = 'Exibir estrutura do conteúdo na página de entrada';
$string['displaycoursestructuredesc'] = 'Se ativar esta opção, a tabela de conteúdos é exibida na página de estrutura do Pacote SCORM.';
$string['displaycoursestructure_help'] = 'Se ativar esta opção, a tabela de conteúdos é exibida na página de entrada do SCORM';
$string['displaydesc'] = 'Esta opção define se o Pacote SCORM é exibido numa nova janela.';
$string['displaysettings'] = 'Exibir configurações';
$string['dnduploadscorm'] = 'Adicionar um pacote SCORM';
$string['domxml'] = 'Biblioteca externa DOMXML';
$string['duedate'] = 'Data de fim';
$string['element'] = 'Elemento';
$string['enter'] = 'Entrar';
$string['entercourse'] = 'Entrar';
$string['errorlogs'] = 'Registo de erros';
$string['everyday'] = 'Todos os dias';
$string['everytime'] = 'Sempre que é usado';
$string['exceededmaxattempts'] = 'Atingiu o número máximo de tentativas permitidas';
$string['exit'] = 'Sair';
$string['exitactivity'] = 'Sair da atividade';
$string['expired'] = 'A atividade fechou em {$a} e já não se encontra disponível';
$string['external'] = 'Atualizar calendarização dos pacotes externos';
$string['failed'] = 'Sem aproveitamento';
$string['finishscorm'] = 'Se terminou de visualizar este recurso, {$a}';
$string['finishscormlinkname'] = 'clique aqui para voltar à página da disciplina';
$string['firstaccess'] = 'Primeiro acesso';
$string['firstattempt'] = 'Primeira tentativa';
$string['floating'] = 'Flutuante';
$string['forcecompleted'] = 'Forçar conclusão';
$string['forcecompleteddesc'] = 'Esta opção define o valor predefinido para a configuração \'Forçar conclusão';
$string['forcecompleted_help'] = 'Se ativar esta opção, o estado da tentativa corrente é forçado para "concluída". Esta configuração apenas é aplicável a pacotes SCORM 1.2.';
$string['forcejavascript'] = 'Forçar utilizadores a ativar JavaScript';
$string['forcejavascript_desc'] = 'Se ativar esta opção (recomendado), o acesso a objetos SCORM será impedido quando o JavaScript não é suportado ou não está ativo no navegador dos utilizadores. Se esta opção estiver desativada, o utilizador pode visualizar o SCORM, mas a comunicação API irá falhar e as informações sobre a nota não serão guardadas.';
$string['forcejavascriptmessage'] = 'É necessário ter o JavaScript ativo para ver este objeto. Ative o JavaScript no seu browser e tente de novo.';
$string['forcenewattempt'] = 'Forçar nova tentativa';
$string['forcenewattemptdesc'] = 'Se ativar esta opção, sempre que aceder a um Pacote SCORM será considerada uma nova tentativa.';
$string['forcenewattempt_help'] = 'Se ativar esta opção, cada vez que se aceder ao pacote SCORM irá contar como uma nova tentativa.';
$string['found'] = 'Manifesto encontrado';
$string['frameheight'] = 'Altura da frame ou janela.';
$string['framewidth'] = 'Largura da frame ou janela.';
$string['fromleft'] = 'A partir da esquerda';
$string['fromtop'] = 'De cima';
$string['fullscreen'] = 'Ecrã inteiro';
$string['general'] = 'Dados gerais';
$string['gradeaverage'] = 'Nota média';
$string['gradeforattempt'] = 'Nota da tentativa';
$string['gradehighest'] = 'Nota mais alta';
$string['grademethod'] = 'Método de avaliação';
$string['grademethoddesc'] = 'O método de avaliação define a forma como é determinada a nota de uma tentativa específica da atividade.';
$string['grademethod_help'] = 'O método de avaliação define como a nota é calculada para uma tentativa individual.

Existem 4 métodos de avaliação:

* Objetos de aprendizagem - Número de objetos de aprendizagem completos/com aprovação
* Nota mais alta - A nota mais alta obtida em todos os objetos com aprovação
* Nota média - A média de todas as notas
* Soma de notas - A soma de todas as notas';
$string['gradereported'] = 'Nota reportada';
$string['gradescoes'] = 'Objetos de aprendizagem';
$string['gradesettings'] = 'Configurações de nota';
$string['gradesum'] = 'Nota da soma';
$string['height'] = 'Altura';
$string['hidden'] = 'Oculto';
$string['hidebrowse'] = 'Desativar modo de pré-visualização';
$string['hidebrowsedesc'] = 'O modo de pré-visualização permite que o aluno navegue na atividade antes de iniciar a sua tentativa de realização.';
$string['hidebrowse_help'] = 'O modo de pré-visualização permite ao aluno ver a atividade antes de efetuar uma tentativa de realização. Se este modo estiver desativado, o botão de pré-visualização não é disponibilizado.';
$string['hideexit'] = 'Ocultar link de saída';
$string['hidereview'] = 'Ocultar botão de revisão';
$string['hidetoc'] = 'Exibir a tabela de conteúdos na página do SCORM';
$string['hidetocdesc'] = 'Esta configuração determina a forma como a tabela de conteúdos é exibida na janela de reprodução do SCORM.';
$string['hidetoc_help'] = 'Como a tabela de conteúdos é exibida na janela de reprodução do SCORM';
$string['highestattempt'] = 'Tentativa com melhor nota';
$string['identifier'] = 'Identificador de pergunta';
$string['incomplete'] = 'Incompleto';
$string['info'] = 'Info';
$string['interactions'] = 'Interações';
$string['invalidactivity'] = 'A atividade SCORM está incorreta';
$string['invalidhacpsession'] = 'Sessão de HACP inválida';
$string['invalidmanifestname'] = 'Apenas \'imsmanifest.xml\' ou ficheiros zip podem ser selecionados';
$string['invalidmanifestresource'] = 'AVISO: Os seguintes recursos foram referenciados no seu manifesto, mas não podem ser encontrados.';
$string['invalidurl'] = 'O URL é inválido';
$string['invalidurlhttpcheck'] = 'Foi especificado um URL inválido. Mensagem de erro:<pre>{$a->cmsg}</pre>';
$string['last'] = 'Último acesso em';
$string['lastaccess'] = 'Último acesso';
$string['lastattempt'] = 'Última tentativa concluída';
$string['lastattemptlock'] = 'Bloquear após tentativa final';
$string['lastattemptlockdesc'] = 'Se ativar esta opção, o aluno é impedido de abrir a janela de reprodução do SCORM depois de usar todas as tentativas que lhe foram permitidas.';
$string['lastattemptlock_help'] = 'Se ativar esta opção, o aluno é impedido de aceder ao SCORM após atingir o número de tentativas permitidas.';
$string['location'] = 'Mostrar barra de endereço';
$string['max'] = 'Pontuação máxima';
$string['maximumattempts'] = 'Número de tentativas';
$string['maximumattemptsdesc'] = 'Esta opção define o valor predefinido para a configuração \'Número de tentativas';
$string['maximumattempts_help'] = 'Esta opção permite que o número de tentativas seja restrito. Apenas é aplicável a SCORM 1.2 e pacotes AICC.';
$string['maximumgradedesc'] = 'Esta opção define o valor predefinido da configuração \'Nota máxima';
$string['menubar'] = 'Mostrar barra de menu';
$string['min'] = 'Pontuação mínima';
$string['missing_attribute'] = 'Falta o atributo {$a->attr} na tag {$a->tag}';
$string['missingparam'] = 'Um parâmetro requerido está em falta ou errado';
$string['missing_tag'] = 'Falta a tag {$a->tag}';
$string['mode'] = 'Modo';
$string['modulename'] = 'Pacote SCORM';
$string['modulename_help'] = 'Um pacote SCORM (Sharable Content Object Reference Model) é um conjunto de ficheiros agregados em zip sob as normas standard para objetos de aprendizagem. A atividade SCORM permite carregar pacotes SCORM ou AICC numa disciplina.

O conteúdo é normalmente distribuído por várias páginas, com navegação entre as mesmas. Existem várias opções de visualização como numa janela pop-up, com tabela de conteúdos, botões de navegação, etc. Os SCORM geralmente incluem perguntas, em que as notas são registadas no relatório de avaliação da disciplina.

A atividade SCORM pode ser utilizada;

* Para a apresentação de conteúdo multimédia e animações;
* Como uma ferramenta de avaliação.';
$string['modulename_link'] = 'mod/scorm/view';
$string['modulenameplural'] = 'Pacotes SCORM';
$string['nav'] = 'Mostrar Navegação';
$string['navdesc'] = 'Esta configuração especifica se deseja mostrar ou ocultar os botões de navegação e a sua posição.';
$string['nav_help'] = 'Esta configuração determina se os botões de navegação serão mostrados ou ocultados e a respetiva posição.

Existem 3 opções:

* Não - os botões de navegação não são mostrados;

* Sob o conteúdo - botões de navegação são mostrados abaixo do conteúdo do pacote SCORM;

 * Flutuante - os botões de navegação são mostrados no modo flutuante, sendo a posição a partir do topo e da esquerda determinada pelo pacote.';
$string['navigation'] = 'Navegação';
$string['navpositionleft'] = 'Posição dos botões de navegação a partir da esquerda em pixeis.';
$string['navpositiontop'] = 'Posição dos botões de navegação de cima em pixeis.';
$string['newattempt'] = 'Iniciar uma nova tentativa';
$string['next'] = 'Continuar';
$string['noactivity'] = 'Nada a registar';
$string['noattemptsallowed'] = 'Número de tentativas permitidas';
$string['noattemptsmade'] = 'Número de tentativas realizadas';
$string['no_attributes'] = 'A tag {$a->tag} tem de ter atributos';
$string['no_children'] = 'A tag {$a->tag} tem de ter descendentes';
$string['nolimit'] = 'Tentativas ilimitadas';
$string['nomanifest'] = 'Pacote de ficheiro incorreto - está em falta o \'imsmanifest.xml\' ou a estrutura AICC.';
$string['noprerequisites'] = 'Lamentamos, mas não reúne os pré-requisitos necessários para poder aceder a esta atividade.';
$string['noreports'] = 'Não há relatórios para exibir';
$string['normal'] = 'Normal';
$string['noscriptnoscorm'] = 'O seu browser não suporta JavaScript ou tem o suporte para JavaScript desativado. Este SCORM poderá ser inacessível ou não registará quaisquer dados.';
$string['notattempted'] = 'Sem tentativas';
$string['not_corr_type'] = 'Discrepância de tipo para a tag {$a->tag}';
$string['notopenyet'] = 'Esta atividade não se encontra disponível até {$a}';
$string['objectives'] = 'Objetivos';
$string['optallstudents'] = 'todos os utilizadores';
$string['optattemptsonly'] = 'apenas utilizadores com tentativas';
$string['options'] = 'Opções (Disponível apenas em alguns browsers)';
$string['optionsadv'] = 'Opções (Avançado)';
$string['optionsadv_desc'] = 'Se selecionar esta opção, a largura e altura serão listadas como configurações avançadas.';
$string['optnoattemptsonly'] = 'apenas utilizadores sem tentativas';
$string['organization'] = 'Organização';
$string['organizations'] = 'Organizações';
$string['othersettings'] = 'Definições adicionais';
$string['package'] = 'Ficheiro do pacote';
$string['packagedir'] = 'Erro no sistema de ficheiros: não é possível criar a pasta do pacote';
$string['packagefile'] = 'O ficheiro do pacote não foi especificado';
$string['packagehdr'] = 'Pacote';
$string['package_help'] = 'O ficheiro do pacote é um zip (ou pif) contendo ficheiros de definição da disciplina em formato SCORM.';
$string['packageurl'] = 'URL';
$string['packageurl_help'] = 'Esta opção permite selecionar o pacote SCORM através de um URL em vez de identificar o ficheiro através do localizador de ficheiros.';
$string['page-mod-scorm-x'] = 'Qualquer página da atividade SCORM';
$string['pagesize'] = 'Tamanho da página';
$string['passed'] = 'Com aprovação';
$string['php5'] = 'PHP 5 (biblioteca DOMXML nativa)';
$string['pluginadministration'] = 'Administração do pacote SCORM';
$string['pluginname'] = 'Pacote SCORM';
$string['popup'] = 'Nova janela';
$string['popuplaunched'] = 'Este Pacote SCORM foi carregado numa janela de pop-up, se já terminou de ver este conteúdo, clique aqui para voltar à página da disciplina.';
$string['popupmenu'] = 'Numa caixa de seleção';
$string['popupopen'] = 'Abrir pacote numa nova janela';
$string['popupsblocked'] = 'Aparentemente, as janelas pop-up estão bloqueadas, impedindo o pacote SCORM de ser exibido. Verifique as configurações do seu navegador antes de tentar de novo.';
$string['position_error'] = 'A tag {$a->tag} não pode ser descendente da tag {$a->parent}';
$string['preferencespage'] = 'Preferências apenas para esta página';
$string['preferencesuser'] = 'Preferências para este relatório';
$string['prev'] = 'Anterior';
$string['raw'] = 'Nota bruta';
$string['regular'] = 'Manifesto regular';
$string['report'] = 'Relatório';
$string['reportcountallattempts'] = '{$a->nbattempts} tentativas para {$a->nbusers} utilizadores, em {$a->nbresults} resultados';
$string['reportcountattempts'] = '{$a->nbresults} resultados ({$a->nbusers} utilizadores)';
$string['reports'] = 'Relatórios';
$string['repositorynotsupported'] = 'Apenas os repositórios do sistema de ficheiro são suportados quando ligar diretamente a um ficheiro imsmanifest.xml.';
$string['response'] = 'Resposta';
$string['result'] = 'Resultado';
$string['results'] = 'Resultados';
$string['review'] = 'Rever';
$string['reviewmode'] = 'Modo de revisão';
$string['rightanswer'] = 'Resposta certa';
$string['scoes'] = 'Objetos de aprendizagem';
$string['score'] = 'Nota';
$string['scorm:addinstance'] = 'Adicionar um novo SCORM';
$string['scormclose'] = 'Disponível até';
$string['scormcourse'] = 'Pacote de aprendizagem';
$string['scorm:deleteownresponses'] = 'Apagar todas as tentativas';
$string['scorm:deleteresponses'] = 'Apagar tentativas SCORM';
$string['scormloggingoff'] = 'Logging do API está inativo';
$string['scormloggingon'] = 'Logging do API está ativo';
$string['scormopen'] = 'Disponível a partir de';
$string['scormresponsedeleted'] = 'Apagar tentativas dos utilizadores';
$string['scorm:savetrack'] = 'Gravar dados de percurso';
$string['scorm:skipview'] = 'Saltar vista global';
$string['scormtype'] = 'Tipo';
$string['scormtype_help'] = 'Esta configuração define como o Pacote SCORM será inserido na disciplina. Existem 4 opções:

* Carregar pacote: permite selecionar e carregar um pacote SCORM;

* Manifesto externo SCORM: permite especificar um URL imsmanifest.xml. (Nota: Se o URL tiver um nome de domínio diferente do seu site, então selecione a opção "Descarregar pacote", pois caso contrário as notas não são guardadas.);

* Pacote descarregado: permite especificar o URL de um pacote. O pacote será descompactado e gravado localmente, e atualizado quando o pacote SCORM externo é atualizado;

* Repositório local de conteúdo IMS: permite que um pacote seja selecionado a partir de um repositório IMS.';
$string['scorm:viewreport'] = 'Ver relatórios';
$string['scorm:viewscores'] = 'Ver notas';
$string['scrollbars'] = 'Permitir deslocamentos dentro da janela';
$string['selectall'] = 'Selecionar todos';
$string['selectnone'] = 'Desselecionar todos';
$string['show'] = 'Mostrar';
$string['sided'] = 'Do lado esquerdo';
$string['skipview'] = 'O aluno passa à frente da página com a tabela de conteúdos';
$string['skipviewdesc'] = 'Esta opção define o valor predefinido para a configuração \'Saltar tabela de conteúdos';
$string['skipview_help'] = 'Esta configuração especifica se a página da tabela de conteúdos deve ser ignorada (não exibida). Se o pacote contém apenas um objecto de aprendizagem, a página da tabela de conteúdos pode ser sempre ignorada.';
$string['slashargs'] = 'AVISO: os argumentos slash estão desativados neste site e os objetos podem não funcionar corretamente!';
$string['stagesize'] = 'Tamanho da janela';
$string['stagesize_help'] = 'Essas duas opções definem o largura e altura da janela de exibição dos objetos de aprendizagem.';
$string['started'] = 'Iniciado em';
$string['status'] = 'Mostrar barra de estado';
$string['statusbar'] = 'Mostrar barra de estado';
$string['student_response'] = 'Resposta';
$string['subplugintype_scormreport'] = 'Relatório';
$string['subplugintype_scormreport_plural'] = 'Relatórios';
$string['suspended'] = 'Suspenso';
$string['syntax'] = 'Erro de sintaxe';
$string['tag_error'] = 'Tag desconhecida ({$a->tag}) com o seguinte conteúdo: {$a->value}';
$string['time'] = 'Tempo';
$string['title'] = 'Título';
$string['toc'] = 'Índice';
$string['toolbar'] = 'Mostrar barra de ferramentas';
$string['too_many_attributes'] = 'A tag {$a->tag} tem demasiados atributos';
$string['too_many_children'] = 'A tag {$a->tag} tem demasiados descendentes';
$string['totaltime'] = 'Tempo total';
$string['trackcorrectcount'] = 'Contagem correta';
$string['trackcorrectcount_help'] = 'Número de resultados corretos para a pergunta';
$string['trackid'] = 'ID';
$string['trackid_help'] = 'Este é o identificador definido pelo pacote SCORM para esta pergunta, a especificação SCORM não permite que a questão de texto completa seja fornecida.';
$string['trackingloose'] = 'ATENÇÃO: os dados de percurso deste pacote SCORM serão apagados!';
$string['tracklatency'] = 'Latência';
$string['tracklatency_help'] = 'Tempo decorrido entre o tempo de interação <br/> que foi disponibilizado para o aluno responder<br/> e o tempo da primeira resposta';
$string['trackpattern'] = 'Padrão';
$string['trackpattern_help'] = 'Isto é um exemplo do que seria uma resposta correta a esta pergunta. A resposta do aluno não é mostrada.';
$string['trackresponse'] = 'Resposta';
$string['trackresponse_help'] = 'Esta é a resposta que o aluno deu para esta pergunta';
$string['trackresult'] = 'Resultado';
$string['trackresult_help'] = 'Resultado baseado na resposta do aluno e o <br/>resultado correto.';
$string['trackscoremax'] = 'Pontuação máxima';
$string['trackscoremax_help'] = 'Valor máximo no intervalo para o valor total';
$string['trackscoremin'] = 'Pontuação mínima';
$string['trackscoremin_help'] = 'Valor mínimo no intervalo para o valor total';
$string['trackscoreraw'] = 'Nota bruta';
$string['trackscoreraw_help'] = 'Número que reflete o desempenho do aluno <br/> em relação aos valores limitados de min e max';
$string['tracksuspenddata'] = 'Suspender dados';
$string['tracksuspenddata_help'] = 'Fornece espaço para armazenar e recuperar dados <br/> entre as sessões do aluno.';
$string['tracktime'] = 'Tempo';
$string['tracktime_help'] = 'Hora em que a tentativa foi iniciada';
$string['tracktype'] = 'Tipo';
$string['tracktype_help'] = 'Tipo de pergunta, por exemplo "seleção" ou "resposta curta".';
$string['trackweight'] = 'peso';
$string['trackweight_help'] = 'Peso atribuído ao elemento';
$string['type'] = 'Tipo';
$string['typeaiccurl'] = 'URL do AICC Externo';
$string['typeexternal'] = 'Manifesto SCORM externo';
$string['typelocal'] = 'Pacote carregado';
$string['typelocalsync'] = 'Pacote descarregado';
$string['undercontent'] = 'Sob conteúdo';
$string['unziperror'] = 'Ocorreu um erro durante a descompressão do pacote';
$string['updatefreq'] = 'Frequência de atualização automática';
$string['updatefreqdesc'] = 'Esta opção define o valor predefinido de frequência de atualização automática da atividade';
$string['updatefreq_error'] = 'A frequência de atualização automática só pode ser definida quando o ficheiro do pacote está hospedado externamente';
$string['updatefreq_help'] = 'Esta opção permite que o pacote externo seja automaticamente descarregado e atualizado';
$string['validateascorm'] = 'Validar um pacote';
$string['validation'] = 'Resultado da validação';
$string['validationtype'] = 'Esta opção define a biblioteca DOMXML usada para validar o manifesto SCORM. Caso não saiba o que selecionar, mantenha a opção predefinida.';
$string['value'] = 'Valor';
$string['versionwarning'] = 'No identificador {$a->tag} a versão do manifesto é anterior a 1.3';
$string['viewallreports'] = 'Ver relatórios de {$a} tentativas';
$string['viewalluserreports'] = 'Ver relatórios de {$a} utilizadores';
$string['whatgrade'] = 'Avaliação das tentativas';
$string['whatgradedesc'] = 'Caso sejam permitidas múltiplas tentativas, esta opção define como é obtida a nota da atividade que é exibida na pauta (Tentativa com melhor nota, Média das tentativas, Primeira tentativa ou Última tentativa concluída).';
$string['whatgrade_help'] = 'Se forem permitidas múltiplas tentativas de realização, esta opção define se a nota da atividade corresponde à Tentativa com melhor nota, Média das tentativas, Primeira tentativa ou Última tentativa concluída. A opção "Ultima tentativa concluída" não inclui as tentativas com o estado \'Sem aproveitamento\'.


Notas sobre a gestão de Múltiplas Tentativas:

* A possibilidade de iniciar nova tentativa é facultada através de uma caixa de verificação acima do botão \'Entrar\' na página com a tabela de conteúdos, por isso certifique-se de que permite o acesso a esta página se pretende permitir mais do que uma tentativa.

* Alguns pacotes SCORM reconhecem as novas tentativas, outros não. Isto significa que se o aluno entra numa tentativa existente, e o pacote SCORM não possuir lógica interna para evitar a sobreposição dos dados anteriores,  estes poderão ser substituídos mesmo que à tentativa já tenha sido atribuído o estado \'completa\' ou \'com aprovação\'.

* As configurações "Forçar conclusão", "Forçar nova tentativa" e "Bloquear após tentativa final" também permitem gerir as definições das múltiplas tentativas.';
$string['width'] = 'Largura';
$string['window'] = 'Janela';
