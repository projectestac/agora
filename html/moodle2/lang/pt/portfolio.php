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
 * Strings for component 'portfolio', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activeexport'] = 'Exportação ativa';
$string['activeportfolios'] = 'Portefólio disponíveis';
$string['addalltoportfolio'] = 'Exportar todos para portefólio';
$string['addnewportfolio'] = 'Adicionar novo portefólio';
$string['addtoportfolio'] = 'Exportar para portefólio';
$string['alreadyalt'] = 'Já foi exportado - por favor clique aqui para resolver esta transferência';
$string['alreadyexporting'] = 'Já possui uma exportação de portefólio ativa nesta sessão. Antes de prosseguir, deve concluir esta exportação ou cancelá-la. Pretende continuar? (selecionar esta opção não irá cancelar a exportação)';
$string['availableformats'] = 'Formatos de exportação';
$string['callbackclassinvalid'] = 'A classe de callback que indicou não é válida ou não faz parte da hierarquia do porfolio_caller';
$string['callercouldnotpackage'] = 'Erro ao compactar os seus dados para exportação: erro original {$a}';
$string['cannotsetvisible'] = 'Não é possível definir como visível - o módulo foi completamente desativado devido a um erro de configuração';
$string['commonportfoliosettings'] = 'Configurações do portefólio';
$string['commonsettingsdesc'] = '<p>Considerar se uma transferência demora um intervalo de tempo "Moderado" ou "Elevado" depende se o utilizador pode ou não aguardar a sua conclusão.</p><p>Para tamanhos até ao nível "Moderado" as transferências são feitas imediatamente, sem questionar o utilizador. Para valores entre "Moderado" e "Elevado" é disponibilizada a transferência, mas é emitido um aviso de que pode levar algum tempo.</p><p>De notar que alguns módulos podem ignorar esta configuração e obrigar a que todas as transferências sejam colocadas na fila de espera.</p>';
$string['configexport'] = 'Configurar dados exportados';
$string['configplugin'] = 'Configurar módulo portefólio';
$string['configure'] = 'Configurar';
$string['confirmcancel'] = 'Tem a certeza que pretende cancelar esta exportação?';
$string['confirmexport'] = 'Por favor, confirme a exportação';
$string['confirmsummary'] = 'Resumo da exportação';
$string['continuetoportfolio'] = 'Continuar para portefólio';
$string['deleteportfolio'] = 'Apagar instância de portefólio';
$string['destination'] = 'Destino';
$string['disabled'] = 'Lamentamos mas a exportação de portefólio não está disponível neste site';
$string['disabledinstance'] = 'Inativo';
$string['displayarea'] = 'Área de exportação';
$string['displayexpiry'] = 'A transferência expirou o tempo limite';
$string['displayinfo'] = 'Informação de exportação';
$string['dontwait'] = 'Não aguardar';
$string['enabled'] = 'Ativar portefólios';
$string['enableddesc'] = 'Se ativar esta opção, os utilizadores podem exportar conteúdo, tal como tópicos dos fóruns e submissões de trabalhos, para portefólios externos ou páginas HTML.';
$string['err_uniquename'] = 'O nome do portefólio deve ser único (por cada módulo)';
$string['exportalreadyfinished'] = 'A exportação do portefólio está completa';
$string['exportalreadyfinisheddesc'] = 'A exportação do portefólio está completa';
$string['exportcomplete'] = 'A exportação do portefólio está completa';
$string['exportedpreviously'] = 'Exportações anteriores';
$string['exportexceptionnoexporter'] = 'Foi lançada uma exceção do tipo "portfolio_export_exception" com uma sessão ativa, mas sem objeto de exportação';
$string['exportexpired'] = 'A exportação do portefólio expirou';
$string['exportexpireddesc'] = 'Repetiu a exportação de algumas informações, ou iniciou a exportação de um ficheiro vazio. Para realizar o procedimento correto, deve voltar ao site original e recomeçar o processo de exportação. Este erro pode ocorrer se após concluir uma exportação, clicar no botão voltar, ou aceder a marcadores e url inválidos.';
$string['exporting'] = 'A exportar portefólio';
$string['exportingcontentfrom'] = 'A exportar conteúdo de {$a}';
$string['exportingcontentto'] = 'A exportar conteúdo para {$a}';
$string['exportqueued'] = 'A exportação do portefólio foi adicionada à lista de transferências';
$string['exportqueuedforced'] = 'A exportação do portefólio foi adicionada à lista de espera das transferências (o sistema externo obriga a que todas as transferências sejam colocadas na fila de espera)';
$string['failedtopackage'] = 'Não é possível encontrar os arquivos para compactar';
$string['failedtosendpackage'] = 'Ocorreu um erro ao enviar os seus ficheiros para o portefólio selecionado: erro original {$a}';
$string['filedenied'] = 'O acesso a este ficheiro foi-lhe negado';
$string['filenotfound'] = 'O ficheiro não foi encontrado';
$string['fileoutputnotsupported'] = 'Este formato não permite que se reescreva o resultado do ficheiro';
$string['format_document'] = 'Documento';
$string['format_file'] = 'Ficheiro';
$string['format_image'] = 'Imagem';
$string['format_leap2a'] = 'Formato de portefólio Leap2A';
$string['format_mbkp'] = 'Formato cópia de segurança moodle';
$string['format_pdf'] = 'PDF';
$string['format_plainhtml'] = 'HTML';
$string['format_presentation'] = 'Apresentação';
$string['format_richhtml'] = 'HTML com anexos';
$string['format_spreadsheet'] = 'Folha de cálculo';
$string['format_text'] = 'Texto simples';
$string['format_video'] = 'Vídeo';
$string['hidden'] = 'Oculto';
$string['highdbsizethreshold'] = 'Tamanho da base de dados para transferências de alto débito';
$string['highdbsizethresholddesc'] = 'Número de registos na base de dados acima do qual será considerado que a transferência demorará muito tempo';
$string['highfilesizethreshold'] = 'Tamanho de ficheiro para transferências de alto débito';
$string['highfilesizethresholddesc'] = 'Tamanho de ficheiro acima do qual será considerado que a transferência demorará muito tempo';
$string['insanebody'] = 'Olá! Está a receber esta mensagem como administrador de "{$a->sitename}".

Algumas instâncias do módulo Portefólio foram desativadas automaticamente devido a erros de configuração. Isto significa que os utilizadores não podem exportar conteúdo para estes portefólios.

Lista de instâncias do módulo Portefólio que foram desativadas:

{$a->textlist}

Deve corrigir esta situação logo que possível na página {$a->fixurl}.';
$string['insanebodyhtml'] = '<p>Olá! Está a receber esta mensagem como administrador de "{$a->sitename}". </p>
<p>Algumas instâncias do módulo Portefólio foram desativadas devido a erros de configuração. Neste momento, os utilizadores não podem exportar conteúdo para estes portefólios. </p>
<p>Lista de instâncias do módulo Portefólio que foram desativadas:</p>
{$a->htmllist}
<p>Deve corrigir esta situação logo que possível na página de <a href="{$a->fixurl}">configuração</a></p>';
$string['insanebodysmall'] = 'Olá! Está a receber esta mensagem como administrador de "{$a->sitename}". Algumas instâncias do módulo Portefólio foram desativadas devido a erros de configuração. Neste momento, os utilizadores não podem exportar conteúdo para estes portefólios. Deve corrigir esta situação logo que possível na página {$a->fixurl}.';
$string['insanesubject'] = 'Algumas instâncias do módulo Portefólio foram desativadas automaticamente';
$string['instancedeleted'] = 'O portefólio foi apagado';
$string['instanceismisconfigured'] = 'Esta instância de Portefólio não foi considerada devido a erros de configuração. Mensagem de erro: {$a}';
$string['instancenotdelete'] = 'Erro ao apagar o portefólio';
$string['instancenotsaved'] = 'Erro ao guardar o portefólio';
$string['instancesaved'] = 'O portefólio foi gravado com sucesso';
$string['invalidaddformat'] = 'O formato de adição passado a portfolio_add_button é inválido. O valor "{$a}" deve ser um de PORTFOLIO_ADD_XXX';
$string['invalidbuttonproperty'] = 'Não é possível encontrar a propriedade ({$a}) no portfolio_button';
$string['invalidconfigproperty'] = 'Não é possível encontrar esta propriedade de configuração ({$a->property} de {$a->class})';
$string['invalidexportproperty'] = 'Não é possível encontrar esta propriedade de configuração de exportação ({$a->property} of {$a->class})';
$string['invalidfileareaargs'] = 'Os argumentos de área de ficheiro passados a  set_file_and_format_data são inválidos. Estes devem conter contextid, component, filearea e itemid';
$string['invalidformat'] = 'Algo está a exportar num formato inválido, {$a}';
$string['invalidinstance'] = 'Não foi possível encontrar a instância de Portefólio indicada';
$string['invalidpreparepackagefile'] = 'Invocação inválida de prepare_package_file inválida. Devem estar definidos ficheiros individuais ou múltiplos';
$string['invalidproperty'] = 'Não é possível encontrar a propriedade ({$a->property} em {$a->class})';
$string['invalidsha1file'] = 'Invocação inválida de get_sha1_file inválida. Devem estar definidos ficheiros individuais ou múltiplos';
$string['invalidtempid'] = 'O id exportado é inválido. Pode ter expirado.';
$string['invaliduserproperty'] = 'Não é possível encontrar a propriedade de conf do utilizador ({$a->property} em {$a->class})';
$string['leap2a_emptyselection'] = 'O valor não foi selecionado';
$string['leap2a_entryalreadyexists'] = 'Está a tentar adicionar uma entrada Leap2A com o id ({$a}) que já existe nesta lista';
$string['leap2a_feedtitle'] = 'Leap2A exportado do Moodle para {$a}';
$string['leap2a_filecontent'] = 'Foi feita uma tentativa de converter o conteúdo de um registo Leap2A num ficheiro em vez de usar a subclasse do ficheiro';
$string['leap2a_invalidentryfield'] = 'Foi feita a tentativa de definir um campo de registo  que não existe ({$a}) ou então não é possível fazer essa definição diretamente';
$string['leap2a_invalidentryid'] = 'Está a tentar aceder a uma entrada mas o id não existe ({$a})';
$string['leap2a_missingfield'] = 'Não foi encontrado o campo de registo Leap2A {$a} que é obrigatório';
$string['leap2a_nonexistantlink'] = 'Um registo Leap2A ({$a->from}) tentou estabelecer uma ligação com um registo que não existe ({$a->to}) com rel {$a->rel}';
$string['leap2a_overwritingselection'] = '> substituir o tipo original de um registo ({$a}) para seleção em make_selection';
$string['leap2a_selflink'] = 'Um registo Leap2A ({$a->id}) tentou estabelecer uma ligação para si próprio com rel {$a->rel}';
$string['logs'] = 'Transferência de registos';
$string['logsummary'] = 'Transferências anteriores';
$string['manageportfolios'] = 'Gerir portefólios';
$string['manageyourportfolios'] = 'Gerir os seus portefólios';
$string['mimecheckfail'] = 'O módulo de portefólio "{$a->plugin}" não permite a utilização do mimetype "{$a->mimetype}"';
$string['missingcallbackarg'] = 'Falta o argumento de callback "{$a->arg}" para a classe "{$a->class}"';
$string['moderatedbsizethreshold'] = 'Tamanho da base de dados para transferências de débito moderado';
$string['moderatedbsizethresholddesc'] = 'Número de registos na base de dados acima do qual será considerado que a transferência demorará um intervalo de tempo moderado';
$string['moderatefilesizethreshold'] = 'Tamanho de ficheiro para transferências de débito moderado';
$string['moderatefilesizethresholddesc'] = 'Tamanho de ficheiro acima do qual será considerado que a transferência demorará um intervalo de tempo moderado';
$string['multipleinstancesdisallowed'] = 'O módulo "{$a}" não permite a criação de mais do que uma instância';
$string['mustsetcallbackoptions'] = 'Deve definir as opções de callback no construtor da classe portfolio_add_button ou usando o método set_callback_options';
$string['noavailableplugins'] = 'Lamentamos, mas não existem portefólios disponíveis para exportar';
$string['nocallbackclass'] = 'A classe "{$a}" não foi encontrada';
$string['nocallbackcomponent'] = 'Não foi possível encontrar a componente especificada {$a}.';
$string['nocallbackfile'] = 'Algo está danificado no módulo a partir do qual está a tentar exportar - não foi possível encontrar o ficheiro de portefólio solicitado';
$string['noclassbeforeformats'] = 'Antes de invocar o método set_formats() da classe portfolio_button deve definir a classe de callback';
$string['nocommonformats'] = 'Não existem formatos comuns entre os módulos de portefólio disponíveis e a localização de invocação  {$a->location} (esta permite os seguintes formatos {$a->formats})';
$string['noinstanceyet'] = 'Nada selecionado';
$string['nologs'] = 'Não existem registos para mostrar!';
$string['nomultipleexports'] = 'Lamentamos mas o destino do portefólio ({$a->plugin}) não permite exportações em simultâneo. Por favor <a href="{$a->link}">termine a exportação a decorrer primeiro</a> e tente novamente';
$string['nonprimative'] = 'Foi passado um valor não primitivo como argumento de callback à classe portfolio_add_button. Não é possível continuar. A chave usada foi {$a->key} com o valor {$a->value}';
$string['nopermissions'] = 'Lamentamos mas não possui permissão para exportar ficheiros desta área';
$string['notexportable'] = 'Lamentamos mas o tipo de conteúdo que está a tentar exportar não é compatível';
$string['notimplemented'] = 'Lamentamos mas está a tentar exportar conteúdos num formato que ainda não se encontra compatível com o portfólio  ({$a})';
$string['notyetselected'] = 'Nada selecionado';
$string['notyours'] = 'Está a tentar retomar a exportação de um portefólio que não lhe pertence!';
$string['nouploaddirectory'] = 'Não foi possível criar uma pasta temporária para guardar os seus dados';
$string['off'] = 'Ativo, mas oculto';
$string['on'] = 'Ativo, mas visível';
$string['plugin'] = 'Módulo portefólio';
$string['plugincouldnotpackage'] = 'Erro ao compactar os seus dados para exportação: erro original {$a}';
$string['pluginismisconfigured'] = 'Ignorado - o módulo Portefólio está mal configurado. Mensagem de erro: {$a}';
$string['portfolio'] = 'Portefólio';
$string['portfolios'] = 'Portefólios';
$string['queuesummary'] = 'Transferências em lista de espera';
$string['returntowhereyouwere'] = 'Voltar para onde estava anteriormente';
$string['save'] = 'Guardar';
$string['selectedformat'] = 'Selecionar formato de exportação';
$string['selectedwait'] = 'Selecionar para colocar em espera?';
$string['selectplugin'] = 'Selecionar destino';
$string['singleinstancenomultiallowed'] = 'Apenas está disponível uma instância do módulo. Este módulo não permite mais do que uma exportação por sessão e já existe uma exportação ativa nesta sessão a usar este módulo!';
$string['somepluginsdisabled'] = 'Foram desativados módulos de portefólio por estarem mal configurados ou por dependerem de elementos que estão mal configurados:';
$string['sure'] = 'Tem a certeza de que quer apagar "{$a}"? Este procedimento é irreversível.';
$string['thirdpartyexception'] = 'Foi lançada uma exceção por parte de um sistema externo durante a exportação do portefólio "{$a}". A exceção foi apanhada e lançada novamente, mas esta situação deve ser corrigida';
$string['transfertime'] = 'Tempo de transferência';
$string['unknownplugin'] = 'Desconhecido (podem ter sido removido pelo administrador)';
$string['wait'] = 'Esperar';
$string['wanttowait_high'] = 'Não é recomendável que aguarde que a transferência termine, mas pode fazê-lo se tiver a certeza do que está a fazer';
$string['wanttowait_moderate'] = 'Quer esperar até a transferência estar concluída? Pode demorar alguns minutos.';
