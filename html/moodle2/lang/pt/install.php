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
 * Strings for component 'install', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   install
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admindirerror'] = 'A pasta de administração especificada não está correta';
$string['admindirname'] = 'Pasta de administração';
$string['admindirsetting'] = 'Alguns servidores Web utilizam a pasta <strong>admin</strong> em URLs especiais de acesso a funcionalidades especiais, como é o caso de painéis de controlo. Algumas situações podem criar conflitos com a localização normal das páginas de administração do Moodle. Estes problemas podem ser resolvidos renomeando a pasta <strong>admin</strong> na instalação do Moodle e indicando aqui o novo nome a utilizar. Por exemplo:<br /><br /><b>moodleadmin</b><br /><br />Esta ação resolverá os problemas de acesso dos links para as funcionalidades de administração do Moodle.';
$string['admindirsettinghead'] = 'A configurar a pasta de administração...';
$string['admindirsettingsub'] = 'Alguns servidores Web utilizam a pasta <strong>admin</strong> em URLs especiais de acesso a funcionalidades especiais, como é o caso de painéis de controlo. Algumas situações podem criar conflitos com a localização normal das páginas de administração do Moodle. Estes problemas podem ser resolvidos renomeando a pasta <strong>admin</strong> na instalação do Moodle e indicando aqui o novo nome a utilizar. Por exemplo:<br /><br /><b>moodleadmin</b><br /><br />Esta ação resolverá os problemas de acesso dos links para as funcionalidades de administração do Moodle.';
$string['availablelangs'] = 'Idiomas disponíveis';
$string['caution'] = 'Atenção';
$string['chooselanguage'] = 'Selecione um idioma';
$string['chooselanguagehead'] = 'Selecione um idioma';
$string['chooselanguagesub'] = 'Selecione o idioma a utilizar durante a instalação. Poderá depois selecionar um outro idioma para o site e para os utilizadores.';
$string['cliadminpassword'] = 'Nova senha do administrador';
$string['cliadminusername'] = 'Nome de utilizador do administrador';
$string['clialreadyconfigured'] = 'O ficheiro config.php já existe, use admin/cli/install_database.php se desejar instalar este site.';
$string['clialreadyinstalled'] = 'O ficheiro <b>config.php</b> já se encontra no servidor, o que indica que já existe uma instalação prévia do Moodle. Se pretender realizar uma atualização do Moodle existente, deve usar o <i>script</i> <b>admin/cli/upgrade.php</b>';
$string['cliinstallfinished'] = 'A instalação foi concluída com sucesso.';
$string['cliinstallheader'] = 'Programa para instalação do Moodle <b>{$a}</b> através da linha de comandos';
$string['climustagreelicense'] = 'No modo não interativo terá que aceitar a licença proposta indicando a opção <b>--agree-license</b>';
$string['clitablesexist'] = 'A instalação através da linha de comandos não pode continuar porque a base de dados já contém as tabelas a criar.';
$string['compatibilitysettings'] = 'A verificar a configuração do PHP...';
$string['compatibilitysettingshead'] = 'A verificar a configuração do PHP...';
$string['compatibilitysettingssub'] = 'O servidor deve passar todos os testes com sucesso para que o Moodle possa funcionar corretamente';
$string['configfilenotwritten'] = 'O script de instalação não conseguiu criar o ficheiro <b>config.php</b> de forma automática, provavelmente por não ter permissão de escrita na pasta do Moodle. Para resolver este problema, pode copiar o código que se segue, manualmente, para o ficheiro <b>config.php</b> situado na raíz da pasta Moodle.';
$string['configfilewritten'] = 'o ficheiro <b>config.php</b> foi criado com sucesso';
$string['configurationcomplete'] = 'A configuração foi concluída com sucesso';
$string['configurationcompletehead'] = 'A configuração foi concluída com sucesso';
$string['configurationcompletesub'] = 'O Moodle tentou gravar a configuração indicada num ficheiro situado na raiz da pasta do Moodle.';
$string['database'] = 'Base de dados';
$string['databasecreationsettings'] = 'Deverá agora configurar a base de dados onde será guardada a maior parte da informação do Moodle. Esta base de dados será criada automaticamente durante o processo de instalação com as configurações indicadas abaixo.<br /> <br /> <br /> <b>Tipo:</b> corrigido para "mysql" pelo programa de instalação<br /> <b>Servidor:</b> corrigido para "localhost" pelo programa de instalação<br /> <b>Nome:</b> nome da base de dados (Ex: moodle)<br /> <b>Utilizador:</b> corrigido para  "root" pelo programa de instalação<br /> <b>Senha:</b> senha de acesso à base de dados<br /> <b>Prefixo das tabelas:</b> prefixo (opcional) que será adicionado aos nomes de todas as tabelas do Moodle';
$string['databasecreationsettingshead'] = 'Deverá agora configurar a base de dados onde será guardada a maior parte da informação do Moodle. Esta base de dados será criada automaticamente durante o processo de instalação com as configurações indicadas abaixo.';
$string['databasecreationsettingssub'] = '<b>Tipo:</b> corrigido para "mysql" pelo programa de instalação<br /> <b>Servidor:</b> corrigido para "localhost" pelo programa de instalação<br /> <b>Nome:</b> nome da base de dados (Ex: moodle)<br /> <b>Utilizador:</b> corrigido para  "root" pelo programa de instalação<br /> <b>Senha:</b> senha de acesso à base de dados<br /> <b>Prefixo das tabelas:</b> prefixo (opcional) que será adicionado aos nomes de todas as tabelas do Moodle';
$string['databasecreationsettingssub2'] = '<b>Tipo:</b> corrigido para "mysqli" pelo programa de instalação<br /> <b>Servidor:</b> corrigido para "localhost" pelo programa de instalação<br /> <b>Nome:</b> nome da base de dados (Ex: moodle)<br /> <b>Utilizador:</b> corrigido para  "root" pelo programa de instalação<br /> <b>Senha:</b> senha de acesso à base de dados<br /> <b>Prefixo das tabelas:</b> prefixo (opcional) que será adicionado aos nomes de todas as tabelas do Moodle';
$string['databasehead'] = 'Configurações da base de dados';
$string['databasehost'] = 'Servidor da base de dados';
$string['databasename'] = 'Nome da base de dados';
$string['databasepass'] = 'Senha da base de dados';
$string['databasesettings'] = 'Deverá agora configurar a base de dados onde será guardada a maior parte da informação do Moodle. Esta base de dados deverá ter sido criada previamente, assim como uma conta de acesso à mesma.<br /> <br /> <br /> <b>Tipo:</b> mysql or postgres7<br /> <b>Servidor:</b> Ex: localhost ou db.isp.com<br /> <b>Nome:</b> nome da base de dados (Ex: moodle)<br /> <b>Utilizador:</b> corrigido para  "root" pelo programa de instalação<br /> <b>Senha:</b> senha de acesso à base de dados<br /> <b>Prefixo das tabelas:</b> prefixo (opcional) que será adicionado aos nomes de todas as tabelas do Moodle';
$string['databasesettingshead'] = 'Deverá agora configurar a base de dados onde será guardada a maior parte da informação do Moodle. Esta base de dados deverá ter sido criada previamente, assim como uma conta de acesso à mesma.';
$string['databasesettingssub'] = '<b>Tipo:</b> mysql or postgres7<br /> <b>Servidor:</b> Ex: localhost ou db.isp.com<br /> <b>Nome:</b> nome da base de dados (Ex: moodle)<br /> <b>Utilizador:</b> corrigido para  "root" pelo programa de instalação<br /> <b>Senha:</b> senha de acesso à base de dados<br /> <b>Prefixo das tabelas:</b> prefixo (opcional) que será adicionado aos nomes de todas as tabelas do Moodle';
$string['databasesettingssub_mssql'] = '<b>Tipo:</b>  SQL*Server (non UTF-8)<b><strong class="errormsg">Experimental! (não usar em servidores de produção)</strong></b><br /> <b>Servidor:</b> Ex: localhost ou db.isp.com<br /> <b>Nome:</b> nome da base de dados (Ex: moodle)<br /> <b>Utilizador:</b> corrigido para  "root" pelo programa de instalação<br /> <b>Senha:</b> senha de acesso à base de dados<br /> <b>Prefixo das tabelas:</b> prefixo (opcional) que será adicionado aos nomes de todas as tabelas do Moodle';
$string['databasesettingssub_mssql_n'] = '<b>Tipo:</b> SQL*Server (UTF-8 enabled)<br /> <b>Servidor:</b> Ex: localhost ou db.isp.com<br /> <b>Nome:</b> nome da base de dados (Ex: moodle)<br /> <b>Utilizador:</b> corrigido para  "root" pelo programa de instalação<br /> <b>Senha:</b> senha de acesso à base de dados<br /> <b>Prefixo das tabelas:</b> prefixo (obrigatório) que será adicionado aos nomes de todas as tabelas do Moodle';
$string['databasesettingssub_mysql'] = '<b>Tipo:</b> MySQL<br /> <b>Servidor:</b> Ex: localhost ou db.isp.com<br /> <b>Nome:</b> nome da base de dados (Ex: moodle)<br /> <b>Utilizador:</b> corrigido para  "root" pelo programa de instalação<br /> <b>Senha:</b> senha de acesso à base de dados<br /> <b>Prefixo das tabelas:</b> prefixo (opcional) que será adicionado aos nomes de todas as tabelas do Moodle';
$string['databasesettingssub_mysqli'] = '<b>Tipo:</b>  Improved MySQL (mysqli)<br /> <b>Servidor:</b> Ex: localhost ou db.isp.com<br /> <b>Nome:</b> nome da base de dados (Ex: moodle)<br /> <b>Utilizador:</b> corrigido para  "root" pelo programa de instalação<br /> <b>Senha:</b> senha de acesso à base de dados<br /> <b>Prefixo das tabelas:</b> prefixo (opcional) que será adicionado aos nomes de todas as tabelas do Moodle';
$string['databasesettingssub_oci8po'] = '<b>Tipo:</b> Oracle<br /> <b>Servidor:</b> deixar o valor deste campo vazio<br /> <b>Nome:</b> nome da ligação <b>tnsnames.ora</b><br /> <b>Utilizador:</b> corrigido para  "root" pelo programa de instalação<br /> <b>Senha:</b> senha de acesso à base de dados<br /> <b>Prefixo das tabelas:</b> prefixo (obrigatório, com um máximo de dois carateres) que será adicionado aos nomes de todas as tabelas do Moodle';
$string['databasesettingssub_odbc_mssql'] = '<b>Tipo:</b> SQL*Server (over ODBC) <b><strong class="errormsg">Experimental! (não usar em servidores de produção)</strong></b><br /> <b>Servidor:</b>nome do DSN no painel de controlo ODBC<br /> <b>Nome:</b> nome da base de dados (Ex: moodle)<br /> <b>Utilizador:</b> corrigido para  "root" pelo programa de instalação<br /> <b>Senha:</b> senha de acesso à base de dados<br /> <b>Prefixo das tabelas:</b> prefixo (obrigatório) que será adicionado aos nomes de todas as tabelas do Moodle';
$string['databasesettingssub_postgres7'] = '<b>Tipo:</b> PostgreSQL<b></b><br /> <b>Servidor:</b>nome do DSN no painel de controlo ODBC<br /> <b>Nome:</b>Ex: localhost ou db.isp.com<br /> <b>Nome:</b> nome da base de dados (Ex: moodle)<br /> <b>Utilizador:</b> corrigido para  "root" pelo programa de instalação<br /> <b>Senha:</b> senha de acesso à base de dados<br /> <b>Prefixo das tabelas:</b> prefixo (obrigatório) que será adicionado aos nomes de todas as tabelas do Moodle';
$string['databasesettingswillbecreated'] = '<b>Nota:</b> A base de dados indicada será criada de forma automática durante a instalação do Moodle caso ainda não exista.';
$string['databasesocket'] = 'Socket Unix';
$string['databasetypehead'] = 'Escolha o <i>driver</i> da base de dados';
$string['databasetypesub'] = 'O Moodle permite a utilização de vários tipos de base de dados. Contacte o administrador do servidor caso não haja informação disponível sobre este assunto.';
$string['databaseuser'] = 'Utilizador da base de dados';
$string['dataroot'] = 'Pasta de dados';
$string['datarooterror'] = 'Não foi possível encontrar ou criar a pasta de dados que indicada. Corrija o caminho indicado ou crie a pasta manualmente.';
$string['datarootpermission'] = 'Permissões da diretoria de dados';
$string['datarootpublicerror'] = 'A pasta de dados que especificou está acessível diretamente através da Internet. Por questões de segurança deve utilizar uma pasta diferente.';
$string['dbconnectionerror'] = 'Não foi possível estabelecer a ligação à base de dados indicada. Verifique a configuração da base de dados.';
$string['dbcreationerror'] = 'Erro na criação da base de dados. Não foi possível criar a base de dados com as configurações indicadas.';
$string['dbhost'] = 'Servidor de alojamento';
$string['dbpass'] = 'Senha';
$string['dbport'] = 'Porta';
$string['dbprefix'] = 'Prefixo das tabelas';
$string['dbtype'] = 'Tipo';
$string['dbwrongencoding'] = 'A base de dados selecionada utiliza a codificação <b>{$a}</b> que não é a recomendada. É aconselhada a codificação <b>UTF-8</b>. É possível ignorar este teste se selecionar a opção <b>Ignorar teste de codificação da base de dados</b>. Note-se que a opção de ignorar este teste poderá originar problemas no futuro.';
$string['dbwronghostserver'] = 'Deverá usar as regras do "Servidor" como explicado acima.';
$string['dbwrongnlslang'] = 'A variável de configuração NLS_LANG no seu servidor Web deverá usar os carateres AL32UTF8. Veja como configurar corretamente o OCI8, na documentação do PHP.';
$string['dbwrongprefix'] = 'Deverá seguir as regras de utilização definidas para o campo "Prefixo das Tabelas", como explicado acima.';
$string['directorysettings'] = '<p>Confirme as localizações para esta instalação do Moodle.</p><p><b>Endereço Web:</b>Indique o endereço web completo de acesso ao Moodle. Caso o site possa ser acedido através de vários URLs, selecione o mais frequentemente utilizado pelos alunos. Não inclua a barra "/" no fim do URL.</p><p><b>pasta do Moodle:</b>Indique o caminho completo para a pasta desta instalação. Assegure-se de que as maiúsculas e minúsculas estão corretas.</p><p><b>pasta de dados:</b>Local onde são guardados os ficheiros enviados para o Moodle. O utilizador do Moodle no servidor web (normalmente <b>nobody</b> ou <b>apache</b>) deve ter permissão de <b>leitura</b> e <b>escrita</b> nessa pasta, mas esta não deve estar diretamente acessível através da Internet.</p>';
$string['directorysettingshead'] = 'Confirme as localizações para esta instalação do Moodle';
$string['directorysettingssub'] = '<p>Confirme as localizações para esta instalação do Moodle.</p><p><b>Endereço Web:</b>Indique o endereço web completo de acesso ao Moodle. Caso o site possa ser acedido através de vários URLs, selecione o mais frequentemente utilizado pelos alunos. Não inclua a barra "/" no fim do URL.</p><p><b>pasta do Moodle:</b>Indique o caminho completo para a pasta desta instalação. Assegure-se de que as maiúsculas e minúsculas estão corretas.</p><p><b>pasta de dados:</b>Local onde são guardados os ficheiros enviados para o Moodle. O utilizador do Moodle no servidor web (normalmente <b>nobody</b> ou <b>apache</b>) deve ter permissão de <b>leitura</b> e <b>escrita</b> nessa pasta, mas esta não deve estar diretamente acessível através da Internet.</p>';
$string['dirroot'] = 'Pasta do Moodle';
$string['dirrooterror'] = 'O valor do campo <b>pasta do Moodle</b> não parece ser válido porque não foram encontrados os ficheiros de instalação do Moodle. Foi reposto o valor original indicado em baixo.';
$string['download'] = 'Descarregar';
$string['downloadlanguagebutton'] = 'Descarregar pacote linguístico <b>{$a}</b>;';
$string['downloadlanguagehead'] = 'Instalar pacote linguístico';
$string['downloadlanguagenotneeded'] = 'Pode continuar o processo de instalação usando o pacote linguístico original ({$a}).';
$string['downloadlanguagesub'] = 'Nesta fase pode escolher o idioma a utilizar durante a instalação. <br /><br />Se não for possível obter o pacote linguístico indicado o processo de instalação decorrerá no idioma original do Moodle (Inglês).<br /><br />Após a conclusão da instalação é possível proceder à instalação de pacotes linguísticos adicionais.';
$string['doyouagree'] = 'Concorda? (sim/não):';
$string['environmenthead'] = 'A verificar sistema...';
$string['environmentsub'] = 'Estamos a verificar se os vários componentes do seu sistema respeitam os requisitos do sistema';
$string['environmentsub2'] = 'Cada nova versão do Moodle tem pré-requisitos mínimos relativamente à versão do PHP e extensões necessárias para o seu correto funcionamento. Estes pré-requisitos são verificados sempre que o Moodle é instalado ou atualizado. Contacte o administrador do servidor caso seja necessário atualizar a versão do PHP ou instalar novas extensões.';
$string['errorsinenvironment'] = 'A verificação do sistema falhou!';
$string['fail'] = 'Falha';
$string['fileuploads'] = 'Envio de ficheiros';
$string['fileuploadserror'] = 'Esta opção deve estar ativa';
$string['fileuploadshelp'] = '<p>Aparentemente a possibilidade de enviar ficheiros está desativada ao nível do servidor.</p><p>Neste caso, o Moodle poderá ser instalado, mas, sem essa funcionalidade, não será possível, por exemplo, os utilizadores submeterem ficheiros nas disciplinas ou definir uma fotografia para o seu perfil.</p><p>Para ativar o envio de ficheiros é necessário alterar a configuração do PHP (ficheiro php.ini), definindo o valor do parâmetro <b>file_upload</b> para "1".</p>';
$string['gdversion'] = 'Versão do GD';
$string['gdversionerror'] = 'A biblioteca GD deve estar instalada para processar e criar imagens.';
$string['gdversionhelp'] = '<p>Aparentemente a extensão <b>GD</b> do PHP não está instalada no servidor.</p><p>A biblioteca GD é necessária para a criação e processamento de imagens (ex: fotografias de perfil dos utilizadores e apresentação de gráficos). O Moodle pode funcionar sem esta extensão estar instalada, mas algumas das funcionalidades não estarão disponíveis.</p><p>Para instalar esta extensão no sistema operativo Unix o PHP deve ser compilado com a configuração <b>--with-gd parameter</b>.</p><p>Em sistemas operativos Windows a instalação é feita descomentando a linha referente ao executável <b>php_gd2.dll</b> no ficheiro de configuração do PHP (php.ini).</p>';
$string['globalsquotes'] = 'Gestão insegura de variáveis globais';
$string['globalsquoteserror'] = 'Verifique a configuração do PHP: desative o parâmetro <b>register_globals</b> e/ou ative o parâmetro <b>magic_quotes_gpc</b>';
$string['globalsquoteshelp'] = '<p>Não é recomendada a configuração do PHP que defina simultaneamente a desativação do parâmetro <b>magic quotes GPC</b> e a ativação do parâmetro <b>register globals</b>.</p><p>A configuração recomendada é <b>magic_quotes_gpc = On</b> e <b>register_globals = Off</b>. Esta configuração é definida no ficheiro <b>php.ini</b></p><p>Se não for possível alterar este ficheiro, é possível definir esta configuração através da inclusão, num ficheiro <b>.htaccess</b> localizado na raiz da pasta do moodle, da linha:</p> <p><b>php_value magic_quotes_gpc On</b></p> <p><b>php_value register_globals Off</b></p>';
$string['inputdatadirectory'] = 'Pasta de dados:';
$string['inputwebadress'] = 'Endereço web:';
$string['inputwebdirectory'] = 'Pasta do Moodle:';
$string['installation'] = 'Instalação';
$string['langdownloaderror'] = 'Não foi possível instalar o idioma <b>{$a}</b> por falha na descarga. O processo de instalação continuará em Inglês.';
$string['langdownloadok'] = 'O idioma <b>{$a}</b> foi instalado com sucesso. O processo de instalação continuará neste idioma.';
$string['magicquotesruntime'] = '<i>Magic quotes run time</i>';
$string['magicquotesruntimeerror'] = 'Esta opção não deve estar ativa.';
$string['magicquotesruntimehelp'] = '<p>Para o correto funcionamento do Moodle o parâmetro <b>Magic quotes runtime</b> deve estar desativado.</p><p>Esta é a configuração habitual e pode ser verificada através do valor do parâmetro <b>magic_quotes_runtime</b> no ficheiro <b>php.ini</b>.</p><p>Se não for possível alterar este ficheiro, é possível definir esta configuração através da inclusão, num ficheiro <b>.htaccess</b> localizado na raiz da pasta do moodle, da linha:</p> <p><b>php_value magic_quotes_runtime Off</b></p>';
$string['memorylimit'] = 'Limite de memória';
$string['memorylimiterror'] = 'O limite de memória definido na configuração do PHP é muito baixo... poderá originar problemas mais tarde.';
$string['memorylimithelp'] = '<p>O limite de memória para o PHP definido atualmente no servidor é <b>{$a}</b>.</p><p>Um número elevado de módulos em utilização ou de utilizadores registados pode fazer com que o Moodle apresente problemas de falta de memória.</p><p>É recomendado que o PHP seja configurado com um limite de memória de pelo menos 40MB. Esta configuração pode ser definida de diversas formas:</p><ol><li>Compilação do PHP com o parâmetro <b>--enable-memory-limit</b>. Esta definição permitirá ao próprio Moodle definir o valor a utilizar.</li><li>Alteração do parâmetro <b>memory_limit</b> no ficheiro de configuração do PHP para um valor igual ou superior a 40MB.</li><li>Criação de um ficheiro <b>.htaccess</b> na raiz da pasta do Moodle com a linha <b>php_value memory_limit 40M</b><p>ATENÇÃO: Em alguns servidores esta configuração impedirá o funcionamento de <b>todas</b> as páginas PHP. Nestes casos, não poderá ser utilizado o ficheiro <b>.htaccess</b>.</p></li></ol>';
$string['mssql'] = 'SQL*Server (mssql)';
$string['mssqlextensionisnotpresentinphp'] = 'O PHP não foi corretamente configurado com a extensão MSSQL (de forma a permitir a comunicação com o servidor SQL*Server). Verifique o ficheiro de configuração ou recompile o PHP.';
$string['mssql_n'] = 'SQL*Server with UTF-8 support (mssql_n)';
$string['mysql'] = 'MySQL (mysql)';
$string['mysqlextensionisnotpresentinphp'] = 'O PHP não foi corretamente configurado com a extensão MySQL (de forma a permitir a comunicação com servidor MySQL). Verifique o ficheiro de configuração ou recompile o PHP.';
$string['mysqli'] = 'Improved MySQL (mysqli)';
$string['mysqliextensionisnotpresentinphp'] = 'O PHP não foi corretamente configurado com a extensão MySQLi (de forma a permitir a comunicação com servidor MySQL). Verifique o ficheiro de configuração ou recompile o PHP. Esta extensão não está disponível em versões do PHP anteriores à versão 5.0.';
$string['nativemssql'] = 'SQL*Server FreeTDS (native/mssql)';
$string['nativemssqlhelp'] = 'Deverá agora configurar a base de dados onde será guardada a maior parte da informação do Moodle. Esta base de dados deverá ter sido criada previamente, assim como uma conta de acesso à mesma. A definição de um prefixo para os nomes das tabelas é obrigatório.';
$string['nativemysqli'] = '	
Improved MySQL (native/mysqli)';
$string['nativemysqlihelp'] = 'Deverá agora configurar a base de dados onde será guardada a maior parte da informação do Moodle. Esta base de dados poderá ser criada durante o processo de instalação de a conta de acesso indicada tiver as permissões necessárias. A definição de um prefixo para os nomes das tabelas é opcional.';
$string['nativeoci'] = 'Oracle (native/oci)';
$string['nativeocihelp'] = 'Deverá agora configurar a base de dados onde será guardada a maior parte da informação do Moodle. Esta base de dados deverá ter sido criada previamente, assim como uma conta de acesso à mesma. A definição de um prefixo para os nomes das tabelas é obrigatório.';
$string['nativepgsql'] = 'PostgreSQL (native/pgsql)';
$string['nativepgsqlhelp'] = 'Deverá agora configurar a base de dados onde será guardada a maior parte da informação do Moodle. Esta base de dados deverá ter sido criada previamente, assim como uma conta de acesso à mesma. A definição de um prefixo para os nomes das tabelas é obrigatório.';
$string['nativesqlsrv'] = 'SQL*Server Microsoft (native/sqlsrv)';
$string['nativesqlsrvhelp'] = 'Deverá agora configurar a base de dados onde será guardada a maior parte da informação do Moodle. Esta base de dados deverá ter sido criada previamente, assim como uma conta de acesso à mesma. A definição de um prefixo para os nomes das tabelas é obrigatório.';
$string['nativesqlsrvnodriver'] = 'As Drivers Microsoft para servidores SQL para PHP não estão instaladas ou configuradas corretamente.';
$string['nativesqlsrvnonwindows'] = 'As Drivers Microsoft para servidores SQL para PHP estão disponíveis apenas para Windows OS..';
$string['oci8po'] = 'Oracle (oci8po)';
$string['ociextensionisnotpresentinphp'] = 'O PHP não foi corretamente configurado com a extensão OCI8 (de forma a permitir a comunicação com servidor Oracle). Verifique o ficheiro de configuração ou recompile o PHP.';
$string['odbcextensionisnotpresentinphp'] = 'O PHP não foi corretamente configurado com a extensão ODBC (de forma a permitir a comunicação com servidor SQL*Server). Verifique o ficheiro de configuração ou recompile o PHP.';
$string['odbc_mssql'] = 'SQL*Server over ODBC (odbc_mssql)';
$string['pass'] = 'Sucesso';
$string['paths'] = 'Caminhos';
$string['pathserrcreatedataroot'] = 'O programa de instalação não conseguiu criar a pasta de dados <b>{$a->dataroot}</b>.';
$string['pathshead'] = 'Confirmar caminhos';
$string['pathsrodataroot'] = 'A pasta de dados não tem permissões de escrita.';
$string['pathsroparentdataroot'] = 'A pasta pai <b>{$a->parent}</b> não tem permissões de escrita. O programa de instalação não conseguiu criar a pasta <b>{$a->dataroot}</b>.';
$string['pathssubadmindir'] = 'Alguns servidores Web utilizam a pasta <strong>admin</strong> em URLs especiais de acesso a funcionalidades especiais, como é o caso de painéis de controlo. Algumas situações podem criar conflitos com a localização normal das páginas de administração do Moodle. Estes problemas podem ser resolvidos renomeando a pasta <strong>admin</strong> na instalação do Moodle e indicando aqui o novo nome a utilizar. Por exemplo:<br /><br /><b>moodleadmin</b><br /><br />Esta ação resolverá os problemas de acesso dos links para as funcionalidades de administração do Moodle.';
$string['pathssubdataroot'] = 'É necessária uma pasta onde o Moodle possa gravar os ficheiros enviados para a plataforma. Esta pasta deve ter permissão de <b>leitura</b> e <b>escrita</b> pelo utilizador do web server (normalmente <b>nobody</b> ou <b>apache</b>). Por razões de segurança esta pasta não deve estar diretamente acessível através da Internet.';
$string['pathssubdirroot'] = 'Caminho completo para a pasta de instalação do Moodle.';
$string['pathssubwwwroot'] = 'Endereço web completo de acesso ao Moodle. Não é possível aceder ao Moodle usando mais do que um endereço. Se o site tiver mais do que um endereço público, devem ser configurados redireccionamentos permanentes em todos eles, à exceção deste. Se o site pode ser acedido a partir da Internet e de Intranets, então este endereço deve ser configurado no DNS de forma a que os utilizadores das Intranets possam usar este endereço público para aceder ao Moodle. Se o endereço não está correto, então altere o endereço indicado no browser para reiniciar a instalação com o URL correto.';
$string['pathsunsecuredataroot'] = 'A localização da pasta de dados não é segura';
$string['pathswrongadmindir'] = 'A pasta <b>admin</b> não existe';
$string['pgsqlextensionisnotpresentinphp'] = 'O PHP não foi corretamente configurado com a extensão PGSQL (de forma a permitir a comunicação com servidor PostgreSQL). Verifique o ficheiro de configuração ou recompile o PHP.';
$string['phpextension'] = 'Extensão <b>{$a}</b> do PHP';
$string['phpversion'] = 'Versão do PHP';
$string['phpversionhelp'] = '<p>A instalação do Moodle só é possível se o servidor tiver instalada a versão 4.3.0 ou 5.1.0 ( a versão 5.0.x apresenta vários problemas) ou superiores.</p><p>A versão atualmente instalada é  <b>{$a}</b></p><p>É necessário atualizar esta versão do PHP ou mudar para um novo servidor que possua as referidas versões!<br />(Se a versão instalada for a 5.0.x é possível regredir para a versão 4.4.x)</p>';
$string['postgres7'] = 'PostgreSQL (postgres7)';
$string['releasenoteslink'] = 'Para obter mais informações sobre esta versão do Moodle consulte as notas de lançamento na página {$a}';
$string['safemode'] = '<i>Safe mode</i>';
$string['safemodeerror'] = 'O Moodle poderá ter problemas de funcionamento se a configuração do PHP estiver em <i>Safe mode</i>';
$string['safemodehelp'] = '<p>O Moodle pode ter vários problemas quando executado com <b>Safe mode</b> ativo.</p><p>É possível continuar a instalação  com esta configuração, mas poderá originar problemas no futuro, por exemplo, a impossibilidade de criar novos ficheiros.</p>';
$string['sessionautostart'] = 'Início automático de sessão';
$string['sessionautostarterror'] = 'Esta configuração não deve estar ativa';
$string['sessionautostarthelp'] = '<p>Para o correto funcionamento do Moodle é necessário que a funcionalidade de sessões do PHP esteja ativa.</p><p>Esta ativação é definida no ficheiro de configuração do PHP através do parâmetro <b>session.auto_start</b>.</p>';
$string['skipdbencodingtest'] = 'Ignorar teste de codificação da base de dados';
$string['sqliteextensionisnotpresentinphp'] = 'O PHP não foi corretamente configurado com a extensão SQLite. Verifique o ficheiro de configuração ou recompile o PHP.';
$string['upgradingqtypeplugin'] = 'A atualizar o módulo <b>question/type</b>';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'A apresentação desta página confirma a correta instalação e ativação do pacote <strong>{$a->packname} {$a->packversion}</strong> no servidor.';
$string['welcomep30'] = 'Esta versão do pacote <strong>{$a->installername}</strong> inclui as aplicações necessárias para o correto funcionamento do  <strong>Moodle</strong>, nomeadamente:';
$string['welcomep40'] = 'Este pacote inclui <strong>Moodle {$a->moodlerelease} ({$a->moodleversion})</strong>.';
$string['welcomep50'] = 'A utilização de todas as aplicações incluídas neste pacote é limitada pelas respetivas licenças. O pacote completo <strong>{$a->installername}</strong> é <ahref="http://www.opensource.org/docs/definition_plain.html">código aberto</a> e distribuído nos termos da licença <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a>.';
$string['welcomep60'] = 'As páginas seguintes irão levá-lo através de alguns passos simples para
     configurar e definir o <strong>Moodle</strong> no seu computador. Você pode aceitar as configurações predefinidas ou, opcionalmente, alterá-las para atender às suas próprias necessidades.';
$string['welcomep70'] = 'Clique no botão "Seguinte" para continuar a configuração do <strong>Moodle</strong>.';
$string['wwwroot'] = 'Endereço web';
$string['wwwrooterror'] = 'O valor do campo <b>Endereço web</b> não parece ser válido porque não foram encontrados os ficheiros de instalação do Moodle. Foi reposto o valor original indicado em baixo.';
