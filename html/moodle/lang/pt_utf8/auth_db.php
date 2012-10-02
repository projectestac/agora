<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_dbcantconnect'] = 'Não é possível ligar à base de dados de autenticação...';
$string['auth_dbchangepasswordurl_key'] = 'URL para alteração da senha';
$string['auth_dbdebugauthdb'] = 'Depurador ADOdb';
$string['auth_dbdebugauthdbhelp'] = 'Depurador da ligação ADOdb para base de dados externas - usar quando receber página vazia durante a autenticação. Não é aconselhada para sítios em produção.';
$string['auth_dbdeleteuser'] = 'Utilizador apagado $a[0] id $a[1]';
$string['auth_dbdeleteusererror'] = 'Erro ao apagar utilizador $a';
$string['auth_dbdescription'] = 'Este método usa uma tabela numa base de dados externa para verificar se um nome de utilizador e senha são válidos. Se for uma conta nova, a informação de outros campos pode ser também transferida para Moodle.';
$string['auth_dbextencoding'] = 'Codificação da base de dados externa';
$string['auth_dbextencodinghelp'] = 'Codificação usada na base de dados externa';
$string['auth_dbextrafields'] = '<p>Estes campos são optativos. Pode optar por preencher previamente alguns dos campos do utilizador em Moodle com informação dos campos da <b>base de dados externa</b> que especificar aqui.</p><p>Se deixar estes campos em branco, nada será transferido de LDAP e os valores por omissão do Moodle serão usados.</p><p>De qualquer forma o utilizador poderá editar todos estes campos mais tarde depois de entrar no servidor.';
$string['auth_dbfieldpass'] = 'Nome do campo que contem as senhas';
$string['auth_dbfieldpass_key'] = 'Campo de senha';
$string['auth_dbfielduser'] = 'Nome do campo que contem os nomes de utilizadores';
$string['auth_dbfielduser_key'] = 'Campo do nome do utilizador';
$string['auth_dbhost'] = 'Endereço IP do computador que hospeda a base de dados de utilizadores.';
$string['auth_dbhost_key'] = 'Servidor';
$string['auth_dbinsertuser'] = 'Utilizador inserido $a[0] id $a[1]';
$string['auth_dbinsertusererror'] = 'Erro ao inserir utilizador $a';
$string['auth_dbname'] = 'Nome da própria base de dados';
$string['auth_dbname_key'] = 'Nome da Base de Dados';
$string['auth_dbpass'] = 'Senha para o utilizador acima';
$string['auth_dbpass_key'] = 'Senha';
$string['auth_dbpasstype'] = 'Indique o modo que se está a usar no campo de senha. A criptografia MD5 é útil para trabalhar com outras aplicações como PostNuke';
$string['auth_dbpasstype_key'] = 'Formato da senha';
$string['auth_dbreviveduser'] = 'Utilizador reactivado $a[0] id $a[1]';
$string['auth_dbrevivedusererror'] = 'Erro ao reactivar o utilizador $a';
$string['auth_dbsetupsql'] = 'Comando de configuração do SQL';
$string['auth_dbsetupsqlhelp'] = 'Comando SQL para configurações especiais de base de dados, regularmente usado para configurar a codificação da comunicação - exemplo para MySQL e PostgreSQL: <em>Definir Nomes \'utf8\'</em>';
$string['auth_dbsuspenduser'] = 'Utilizador suspenso $a[0] id $a[1]';
$string['auth_dbsuspendusererror'] = 'Erro suspendendo utilizador $a';
$string['auth_dbsybasequoting'] = 'Usar aspas da \"sybase\"';
$string['auth_dbsybasequotinghelp'] = 'Estilo \"Sybase\" para proteger apóstrofos -- necessário para ORACLE, Ms SQL e outras bases de dados. Não usar para MySQL!';
$string['auth_dbtable'] = 'Nome da tabela na base de dados';
$string['auth_dbtable_key'] = 'Tabela';
$string['auth_dbtitle'] = 'Use uma base de dados externa';
$string['auth_dbtype'] = 'O tipo de base de dados (veja <a href=\"../lib/adodb/readme.htm#drivers\">Documentação do ADOdb</a> para mais pormenores)';
$string['auth_dbtype_key'] = 'Base de Dados';
$string['auth_dbupdatinguser'] = 'Actualizando utilizador $a[0] id $a[1]';
$string['auth_dbuser'] = 'Nome de utilizador para aceder à base de dados';
$string['auth_dbuser_key'] = 'Utilizador da Base de Dados';
$string['auth_dbusernotexist'] = 'Não pode actualizar um utilizador não existente: $a';
$string['auth_dbuserstoadd'] = 'Dados do utilizador para adicionar: $a';
$string['auth_dbuserstoremove'] = 'Dados do utilizador para eliminar: $a';