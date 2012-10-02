<?PHP // $Id: enrol_imsenterprise.php,v 1.4 2008/01/15 20:31:18 villate Exp $ 
      // enrol_imsenterprise.php - created with Moodle 1.8 + (2007021503)


$string['aftersaving...'] = 'Uma vez guardadas as suas definições, poderá querer';
$string['allowunenrol'] = 'Permitir que os dados IMS <strong>anulem</strong> alunos/professores';
$string['basicsettings'] = 'Definições básicas';
$string['coursesettings'] = 'Opções dos dados da Disciplina';
$string['createnewcategories'] = 'Criar novas (escondidas) categorias de Disciplinas se não encontradas no Moodle';
$string['createnewcourses'] = 'Criar novas (escondidas) Disciplinas se não encontradas no Moodle';
$string['createnewusers'] = 'Criar novas contas de utilizador ainda não registadas no Moodle';
$string['cronfrequency'] = 'Frquência de processamento';
$string['deleteusers'] = 'Apagar contas de utilizador quando especificadas nos dados IMS';
$string['description'] = 'Este método verificará repetidamente e processará um ficheiro texto formatado especialmente no sítio que especificar. O ficheiro deverá seguir o <a href=\'../help.php?module=enrol/imsenterprise&file=formatoverview.html\' target=\'_blank\'>IMS Enterprise specifications</a> contendo pessoas, grupos e elementos XML.';
$string['doitnow'] = 'executar uma importação IMS Enterprise agora mesmo';
$string['enrolname'] = 'Ficheiro IMS Enterprise';
$string['filelockedmail'] = 'O ficheiro de texto que está a utilizar nas inscrições baseadas no IMS ($a) não pode ser apagado  pelo processo Cron. Isto normalmente significa que as permissões estão erradas. Por favor verifique as permissões para que o Moodle possa apagar o ficheiro, caso contrário irá ser processado repetidamente.';
$string['filelockedmailsubject'] = 'Erro grave: Ficheiro de inscrições';
$string['fixcasepersonalnames'] = 'Mudar nomes pessoais para o do Título';
$string['fixcaseusernames'] = 'Alterar nomes de utilizador para letra pequena';
$string['imsrolesdescription'] = 'A especificação IMS Enterprise inclui 8 tipos distintos de cargos.
Por favor, escolha como quer que eles sejam atribuídos no Moodle, incluindo se quer que algum deles deva ser ignorado.';
$string['location'] = 'Localização de ficheiro';
$string['logtolocation'] = 'Localização da saída do log (em branco para não logar)';
$string['mailadmins'] = 'Informar administradores por email';
$string['mailusers'] = 'Informar utilizadores por email';
$string['miscsettings'] = 'Vários';
$string['processphoto'] = 'Adicionar dados da fotografia do utilizador';
$string['processphotowarning'] = 'Aviso: ao processar uma imagem é provável ocorrer uma lentidão no servidor. Não é recomendado activar esta opção se houver um grande número de alunos a processar.';
$string['restricttarget'] = 'Apenas dados de processamento se o seguinte objectivo for especificado';
$string['sourcedidfallback'] = 'Utilize o &quot;sourcedid&quot; para o nome de utilizador se &quot;userid&quot; o campo não for encontrado';
$string['truncatecoursecodes'] = 'Truncados códigos do curso a este comprimento';
$string['usecapitafix'] = 'Ajeite esta caixa se utilizar &quot;Capita&quot; (o seu formato XML é ligeiramente errado)';
$string['usersettings'] = 'Opções dos dados do utilizador';
$string['zeroisnotruncation'] = '0 indica que não há truncagem';

?>
