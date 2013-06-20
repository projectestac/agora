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
 * Strings for component 'plagiarism_turnitin', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   plagiarism_turnitin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminlogin'] = 'Autenticar-se no Turnitin como Admin';
$string['compareinstitution'] = 'Compare ficheiros submetidos com trabalhos apresentados no seio desta instituição';
$string['compareinstitution_help'] = 'Esta opção apenas fica disponível se configurar um node personalizado. Se não tem a certeza configure como "Não".';
$string['compareinternet'] = 'Comparar ficheiros submitos com a Internet';
$string['compareinternet_help'] = 'Esta opção permite que as submissões sejam comparadas com conteúdo da Internet que o Turntin indexa';
$string['comparejournals'] = 'Comparar ficheiros submitos com Jornais, periódicos e publicações';
$string['comparejournals_help'] = 'Esta opção permite que as submissões sejam comparadas com Jornais, periódicos e publicações que o Turntin indexa';
$string['comparestudents'] = 'Comparar ficheiros submitos com ficheiros de outros alunos';
$string['comparestudents_help'] = 'Esta opção permite que as submissões sejam comparadas com o trabalho realizado por outros alunos';
$string['configdefault'] = 'Esta é uma configuração predefinida para a página de criação do trabalho. Somente os utilizadores com a capacidade plagiarism/turnitin:enableturnitin podem alterar essa configuração para um trabalho individual';
$string['configusetiimodule'] = 'Ativar submissões Turnitin.';
$string['defaultsdesc'] = 'As definições seguintes são as predefinidas ao ativar Turnitin dentro de uma atividade';
$string['defaultupdated'] = 'Definições atualizadas';
$string['draftsubmit'] = 'Quando o ficheiro deve ser submetido a TurnItIn';
$string['excludebiblio'] = 'Excluir bibliografia';
$string['excludebiblio_help'] = 'A bibliografia pode ser incluida ou excluida quando visualiza o relatório original. Esta configuração não pode ser alterada apó o primeiro ficheiro ser submetido..';
$string['excludematches'] = 'Excluir correspondências pequenas';
$string['excludematches_help'] = 'Pode excluir correspondências pequenas por percentagem ou por número de palavras - selecione o tipo que pretende usar e insira uma percentagem ou número de palavras na caixa abaixo.';
$string['excludequoted'] = 'Excluir citações';
$string['excludequoted_help'] = 'As citações podem ser incluidas ou excluidas quando visualiza o relatório original. Esta configuração não pode ser alterada apó o primeiro ficheiro ser submetido..';
$string['file'] = 'Ficheiro';
$string['filedeleted'] = 'Ficheiro apagado';
$string['fileresubmitted'] = 'Ficheiro Queued para resubmissão';
$string['module'] = 'Atividade';
$string['name'] = 'Nome';
$string['percentage'] = 'Percentagem';
$string['pluginname'] = 'Módulo de plágio Turnitin';
$string['reportgen'] = 'Onde criar os relatórios originais';
$string['reportgenduedate'] = 'Na data de fecho';
$string['reportgen_help'] = 'Esta opção permite que selecione quando o Relatório de Originalidade devem ser gerados';
$string['reportgenimmediate'] = 'Imediatamente (após o primeiro relatório ter terminado)';
$string['reportgenimmediateoverwrite'] = 'Imediatamente (pode substituir relatórios)';
$string['resubmit'] = 'Resubmeter';
$string['savedconfigfailure'] = 'Não é possível ligar/autenticar-se no TurnItIn - pode ter uma chave secreta incorreta ou ID da conta errado para que este servidor não se consiga ligar ao API';
$string['savedconfigsuccess'] = 'As configurações foram guardadas e a conta de professor criada';
$string['showstudentsreport'] = 'Mostrar relatórios de semelhanças aos alunos';
$string['showstudentsreport_help'] = 'Os relatórios de semelhanças apresentam uma repartição onde exibe as partes do trabalho que foram plagiadas e a localização onde o TurnItIn viu pela primeira vez este conteúdo';
$string['showstudentsscore'] = 'Mostrar percentagem de semelhanças';
$string['showstudentsscore_help'] = 'A percentagem de semelhanças mostra a percentagem de conteúdos semelhantes encontados - um valor alto é um mau indicativo.';
$string['showwhenclosed'] = 'Qualquer atividade fechada';
$string['similarity'] = 'Semelhanças';
$string['status'] = 'Estado';
$string['studentdisclosure'] = 'Divulgação ao aluno';
$string['studentdisclosuredefault'] = 'Todos os ficheiros enviados serão submetidos ao controlo de deteção de plágio Turnitin.com';
$string['studentdisclosure_help'] = 'Este texto será exibido para todos os alunos na página de envio de ficheiros.';
$string['submitondraft'] = 'Enviar ficheiro após primeira submissão';
$string['submitonfinal'] = 'Enviar ficheiro quando os alunos submetem a avaliação';
$string['teacherlogin'] = 'Entrar em Turnitin como professor';
$string['tii'] = 'Turnitin';
$string['tiiaccountid'] = 'ID da conta Turnitin';
$string['tiiaccountid_help'] = 'Este é o seu ID da conta criado por Turnitin.com';
$string['tiiapi'] = 'API Turnitin';
$string['tiiapi_help'] = 'Este é o endereço da API TurnItIn - geralmente https://api.turnitin.com/api.asp';
$string['tiiconfigerror'] = 'Ocorreu um erro de configuração do site ao tentar enviar este arquivo para Turnitin';
$string['tiiemailprefix'] = 'Prefixo E-mail do aluno';
$string['tiiemailprefix_help'] = 'Deve definir se pretende que os alunos possam entrar no site e visualizar relatórios completos do Turnitin';
$string['tiienablegrademark'] = 'Ativar Grademark (Experimental)';
$string['tiienablegrademark_help'] = 'Grademark é um recurso opcional do Turnitin – para utiliza-lo, deve tê-lo ativo na sua subscrição do Turnitin.';
$string['tiierror'] = 'TII Erro:';
$string['tiierror1007'] = 'O Turnitin não pode processar este ficheiro, o ficheiro é muito grande';
$string['tiierror1008'] = 'Ocorreu um erro ao tentar enviar este ficheiro para Turnitin';
$string['tiierror1009'] = 'O Turnitin não pode processar este ficheiro – é um tipo de ficheiro não suportando. Os tipos de ficheiro suportados são: MS Word, Acrobat PDF, Postscript, Texto, HTML, WordPerfect e Rich Text Format';
$string['tiierror1010'] = 'O Turnitin não pode processar este ficheiro - deve conter mais de 100 carateres sem espaço em branco.';
$string['tiierror1011'] = 'O Turnitin não pode processar este ficheiro – está mal formatado e parecem existir espaços entre cada letra.';
$string['tiierror1012'] = 'O Turnitin não pode processar este ficheiro – o tempo para carregar o ficheiro excede os limites do Turnitin.';
$string['tiierror1013'] = 'O Turnitin não pode processar este ficheiro – deve conter mais do que 20 palavras';
$string['tiierror1020'] = 'O Turnitin não pode processar este ficheiro – contem carateres não suportados';
$string['tiierror1023'] = 'O Turnitin não pode processar este ficheiro – certifique-se que não é protegido por senha e contém texto selecionável, em vez de imagens digitalizadas';
$string['tiierror1024'] = 'O Turnitin não pode processar este ficheiro – Não cumpre os critérios definidos para um papel legítimo';
$string['tiierrorpaperfail'] = 'O Turnitin não pode processar este ficheiro';
$string['tiierrorpending'] = 'Ficheiros pendentes para submissão no Turnitin';
$string['tiiexplain'] = 'O Turnitin é um produto comercial, deve ter uma assinatura paga para usar este serviço, para mais informações consulte <a href="http://docs.moodle.org/en/Turnitin_administration">http://docs.moodle.org/en/Turnitin_administration</a>';
$string['tiiexplainerrors'] = 'Esta página lista todos os ficheiros submetidos ao Turnitin que estão atualmente em estado de erro. Consulte a lista aqui: <a href="http://docs.moodle.org/en/Turnitin_errors">docs.moodle.org/en/Turnitin_errors</a><br/> Quando os ficheiros forem re-submetidos, o cron irá tentar enviar o ficheiro para Turnitin novamente. <br/> Quando os arquivos são apagados desta página, não será capaz de ser reenviar para o Turnitin e não ficará visivel para os alunos e professor';
$string['tiisecretkey'] = 'Senha de acesso ao Turnitin';
$string['tiisecretkey_help'] = 'Aceda ao Turnitin.com como administrador do site para obter esta informação.';
$string['tiisenduseremail'] = 'Enviar e-mail ao utilizador';
$string['tiisenduseremail_help'] = 'Enviar e-mail a todos os alunos criados no sistema TII com um link para permitir a autenticação em www.turnitin.com com uma senha temporária';
$string['turnitin'] = 'Turnitin';
$string['turnitin_attemptcodes'] = 'Códigos de erro para auto-reenviar';
$string['turnitin_attemptcodes_help'] = 'O Código de erros do Turnitin geralmente só aceita uma segunda tentativa (As alterações neste campo podem causar aumento da carga no servidor)';
$string['turnitin_attempts'] = 'Número de tentativas';
$string['turnitin_attempts_help'] = 'Número de vezes que os códigos especificados são reenviados para o Turnitin.';
$string['turnitindefaults'] = 'Predefinições Turnitin';
$string['turnitin:enable'] = 'Permite ao professor para ativar/desativar o Turnitin dentro de um módulo';
$string['turnitinerrors'] = 'Erros Turnitin';
$string['turnitin_institutionnode'] = 'Ativar Node';
$string['turnitin_institutionnode_help'] = 'If you have setup/purchased an institution node with your account enable this to allow the node to be selected when creating assignments. NOTE: if you do not have an institution node, enabling this setting will cause your paper submission to fail.';
$string['turnitin:viewfullreport'] = 'Permitem ao professor ver o relatório completo gerado pelo Turnitin';
$string['turnitin:viewsimilarityscore'] = 'Permitem ao professor ver o grau de similaridade gerado pelo Turnitin';
$string['useturnitin'] = 'Ativar Turnitin';
$string['wordcount'] = 'Contagem de palavras';
