<?PHP // $Id$ 
      // enrol_database.php - created with Moodle 2.0 dev (2007101506)


$string['autocreate'] = 'As Disciplinas podem ser criadas automaticamente se houver inscrições para uma disciplina que ainda não exista no Moodle.';
$string['autocreation_settings'] = 'Definições de Criação Automática';
$string['category'] = 'A categoria para as Disciplinas criadas automaticamente';
$string['course_fullname'] = 'O nome do campo onde está guardado o nome completo da disciplina.';
$string['course_id'] = 'O nome do campo onde o está guardado o identificador (ID) da disciplina. Os valores deste campo são utilizados para comparar com os do campo \"enrol_db_l_coursefield\" na tabela de disciplinas do Moodle';
$string['course_shortname'] = 'O nome do campo onde está guardado o nome curto da disciplina.';
$string['course_table'] = 'O nome da tabela onde se esperam encontrar os detalhes da disciplina (nome curto, nome completo, ID, etc.)';
$string['dbhost'] = 'Número ou nome do servidor (de/do) IP';
$string['dbname'] = 'Nome da Base de Dados';
$string['dbpass'] = 'Password do Servidor';
$string['dbtable'] = 'Tabela da Base de Dados';
$string['dbtype'] = 'Tipo de Base de Dados';
$string['dbuser'] = 'Utilizador do (Servidor)';
$string['defaultcourseroleid'] = 'Cargo que vai atribuído por defeito se nenhum outro cargo for especificado.';
$string['description'] = 'Pode usar uma base de dados externa (de quase qualquer tipo) para controlar as inscrições. Admite-se que a sua base de dados externa contém um campo com um identificador de disciplina (course ID), e um campo com o código de utilizador (user ID). Esses campos serão comparados com os campos que seleccionar nas tabelas locais de disciplina e utilizador.';
$string['disableunenrol'] = 'Se escolher sim os utilizadores previamente matriculados pelo plugin de base de dados externa não serão retirados da disciplina pelo mesmo plugin, independentemente do conteúdo da base de dados.';
$string['enrol_database_autocreation_settings'] = 'Criação automática de novas disciplinas';
$string['enrolname'] = 'Base de dados externa';
$string['general_options'] = 'Opções Gerais';
$string['host'] = 'Nome do servidor de bases de dados';
$string['ignorehiddencourse'] = 'Se seleccionar sim, os utilizadores não serão inscritos em disciplinas que não estejam diponíveis para alunos.';
$string['local_fields_mapping'] = 'Campos da base de dados (local) do Moodle';
$string['localcoursefield'] = 'Nome do campo na tabela Disciplina que esta a ser usada para comparar entradas na base de dados (remota)(eg idnumber).';
$string['localrolefield'] = 'Nome do campo na tabela de Cargos que esta a ser usada para comparar entradas na base de dados (remota)(eg shortname).';
$string['localuserfield'] = 'Nome do campo na tabela Utilizador que esta a ser usada para comparar entradas na base de dados remota (por exemplo, idnumber).';
$string['name'] = 'Base de dados específica a utilizar';
$string['pass'] = 'Senha para aceder ao servidor';
$string['remote_fields_mapping'] = 'Campos da base de dados (remota) de inscritos.';
$string['remotecoursefield'] = 'Nome do campo na tabela (remota) que esta a ser usada para comparar entradas na tabela Disciplina.';
$string['remoterolefield'] = 'Nome do campo na tabela (remota) que esta a ser usada para comparar entradas na tabela Cargos.';
$string['remoteuserfield'] = 'Nome do campo na tabela (remota) que esta a ser usada para comparar entradas na tabela Utilizador.';
$string['server_settings'] = 'Definições do servidor externo de bases de dados';
$string['student_coursefield'] = 'Nome do campo na tabela de alunos inscritos
onde se espera encontrar o identificador (ID) da disciplina.';
$string['student_l_userfield'] = 'Nome do campo, na tabela local de utilizadores, que será utilizado para comparar com um registo remoto de alunos (por exemplo, idnumber)';
$string['student_r_userfield'] = 'Nome do campo, na tabela remota de alunos inscritos, onde se espera encontrar o código (ID) de utilizador.';
$string['student_table'] = 'Nome da tabela de alunos inscritos.';
$string['teacher_coursefield'] = 'Nome do campo na tabela de docentes inscritos onde se espera encontrar o identificador (ID) da disciplina.';
$string['teacher_l_userfield'] = 'Nome do campo, na tabela local de utilizadores, que será utilizado para comparar com um registo remoto de docentes (por exemplo, idnumber).';
$string['teacher_r_userfield'] = 'Nome do campo, na tabela remota de docentes inscritos, onde se espera encontrar o código (ID) de utilizador.';
$string['teacher_table'] = 'Nome da tabela onde se encontram os docentes inscritos.';
$string['template'] = 'Opcional: as disciplinas criadas automaticamente podem copiar as definições de uma disciplina padrão. Escreva aqui o nome curto dessa disciplina padrão.';
$string['type'] = 'Tipo de servidor de bases de dados.';
$string['user'] = 'Nome de utilizador para aceder ao servidor.';

?>
