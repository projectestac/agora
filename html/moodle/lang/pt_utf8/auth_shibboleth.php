<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_shib_changepasswordurl'] = 'URL para mudar a senha';
$string['auth_shib_convert_data'] = 'API de modificação de dados';
$string['auth_shib_convert_data_description'] = 'Pode utilizar esta API para depois poder modificar os dados provenientes do Shibboleth. Leia <a href=\"../auth/shibboleth/README.txt\" target=\"_blank\">README</a> para mais instruções.';
$string['auth_shib_convert_data_warning'] = 'O ficheiro não existe ou não está disponível para leitura pelo processo do servidor Web!';
$string['auth_shib_instructions'] = 'Utilize autenticação <a href=\"$a\">Shibboleth</a> para ter acesso via Shibboleth, se a sua instituição o suportar.<br />Caso contrário utilize o formulário de autenticação  normal mostrado aqui.';
$string['auth_shib_instructions_help'] = 'Aqui deverá fornecer as instruções a explicar o Shibboleth aos seus utilizadores. Serão mostradas na página de autenticação, na secção de instruções. As instruções deverão incluir um link para \"<b>$a</b>\" para os utilizadores clicarem quando quiserem entrar no sítio.';
$string['auth_shib_no_organizations_warning'] = 'Se quiser integrar o serviço WAYF, deverá fornecer uma lista de identificadores de identidade dos Provedores de Identidade, separados por vírgulas, os seus nomes e, opcionalmente, um iniciador de sessão.';
$string['auth_shib_only'] = 'Apenas Shibboleth';
$string['auth_shib_only_description'] = 'Marque esta opção se quiser forçar uma autenticação Shibboleth';
$string['auth_shib_username_description'] = 'Nome da variável de ambiente do servidor web Shibboleth que deverá ser utilizada como nome de utilizador Moodle.';
$string['auth_shibboleth_contact_administrator'] = 'Caso não esteja associado com as organizações referidase precisar de aceder a uma disciplina nesse servidor, por favor contacte o';
$string['auth_shibboleth_errormsg'] = 'Seleccione por favor a organização à qual pertence!';
$string['auth_shibboleth_login'] = 'Autenticação Shibboleth';
$string['auth_shibboleth_login_long'] = 'Entrar no Moodle via Shibboleth';
$string['auth_shibboleth_manual_login'] = 'Autenticação Manual';
$string['auth_shibboleth_select_member'] = 'Sou membro de...';
$string['auth_shibboleth_select_organization'] = 'Para autenticar-se via Shiboleth, seleccione por favor a sua organização na lista:';
$string['auth_shibbolethdescription'] = 'Com este método os utilizadores serão criados e autenticados utilizando o <a href=\"http://shibboleth.internet2.edu/\" target=\"_blank\">Shibboleth</a>.<br />Leia atentamente <a href=\"../auth/shibboleth/README.txt\" target=\"_blank\">README</a> do Shibboleth de como configurar o seu Moodle com o Shibboleth.';
$string['auth_shibbolethtitle'] = 'Shibboleth';
$string['shib_no_attributes_error'] = 'Parece ser um utilizador com autenticação Shibboleth  mas o Moodle não recebeu quaisquer atributos de utilizador. Por favor verifique que o seu Fornecedor de Identidade libertou os atributos necessários ($a) para o Fornecedor de serviços Moodle que está a correr ou então informe o webmaster deste servidor.';
$string['shib_not_all_attributes_error'] = 'O Moodle precisa de certos atributos Shibboleth que não estão presentes no seu caso. Os atributos são: $a<br />Por favor contacte com o webmaster do servidor ou com o seu Fornecedor de Identidade.';
$string['shib_not_set_up_error'] = 'A autenticação Shibboleth não parece estar definida correctamente porque não estão presentes variáveis de ambiente Shibboleth nesta página. Por favor consulte a <a href=\"README.txt\">README</a> para mais instruções de como configurar a autenticação Shibboleth ou contacte o webmaster desta instalação Moodle.';