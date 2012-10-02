<?PHP // $Id: enrol_ldap.php,v 1.6 2008/01/15 20:31:18 villate Exp $ 
      // enrol_ldap.php - created with Moodle 1.8.2+ (2007021520)


$string['description'] = '<p>Pode utilizar um servidor LDAP para controlar os seus registos. É assumido que a sua árvore LDAP contém grupos que mapeiam as Disciplinas e que cada um desses grupos/disciplinas terão entradas de membros para mapear os alunos.</p>
<p>Assume-se que as Disciplinas são definidas como grupos no LDAP, com cada grupo a ter multiplos campos de membros (<em>member</em> or <em>memberUid</em>) que contêm uma identificação única de utilizador.</p>
<p>Para utilizar o registo LDAP, os seus utilizadores <strong>têm</strong> que ter um campo idnumber válido. Os grupos LDAP têm que ter esse idnumber nos campos de membro para que um utilizador possa ser registado numa disciplina.
Isto normalmente corre bem se já estiver a utilizar Autenticação LDAP.</p>
<p>Os registos serão actualizados quando o utilizador faz o log in. Também poderá correr um script para manter os registos sincronizados. Veja em <em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p>Este plugin também poderá ser definido para criar automaticamente novas Disciplinas quando aparecem novos grupos no LDAP.</p>';
$string['enrol_ldap_autocreate'] = 'As disciplinas podem ser criadas automaticamente se houver registos numa disciplina que ainda não exista no Moodle.';
$string['enrol_ldap_autocreation_settings'] = 'Definições automáticas de criação de disciplinas';
$string['enrol_ldap_bind_dn'] = 'Se quiser utilizar o bind-user para procurar utilizadores, especifique-o aqui. Qualquer coisa como \'cn=ldapuser,ou=public,o=org\'';
$string['enrol_ldap_bind_pw'] = 'Senha para bind-user';
$string['enrol_ldap_category'] = 'A categoria para criar automaticamente disciplinas';
$string['enrol_ldap_contexts'] = 'Contextos LDAP';
$string['enrol_ldap_course_fullname'] = 'Opcional: Campo LDAP de onde tirar o nome completo';
$string['enrol_ldap_course_idnumber'] = 'Mapa para o identificador único no LDAP, normalmente  <em>cn</em> ou <em>uid</em>. É recomendado que bloqueie o valor se estiver a utilizar a criação automatica de disciplinas';
$string['enrol_ldap_course_settings'] = 'Definições de registo nas disciplinas';
$string['enrol_ldap_course_shortname'] = 'Opcional: Campo LDAP de onde tirar o nome curto';
$string['enrol_ldap_course_summary'] = 'Opcional: Campo LDAP de onde tirar o sumário';
$string['enrol_ldap_editlock'] = 'Valor bloqueado';
$string['enrol_ldap_general_options'] = 'Opções Gerais';
$string['enrol_ldap_host_url'] = 'Especifique o host LDAP em forma URL, do tipo \'ldap://ldap.myorg.com/\'
or \'ldaps://ldap.myorg.com/\'';
$string['enrol_ldap_memberattribute'] = 'Atributo do membro LDAP';
$string['enrol_ldap_objectclass'] = 'objectClass utilizada para procurar Disciplinas. Normalmente \'posixGroup\'';
$string['enrol_ldap_roles'] = 'Mapear cargo';
$string['enrol_ldap_search_sub'] = 'Procurar membros do Grupo em subcontexts';
$string['enrol_ldap_server_settings'] = 'Definições do servidor LDAP';
$string['enrol_ldap_student_contexts'] = 'Lista de contextos onde os grupos com registos de alunos estão localizados. Separe os diferentes contextos com \';\'. Por exemplo: \'ou=courses,o=org; ou=others,o=org\'';
$string['enrol_ldap_student_memberattribute'] = 'Atributo do membro, quando os utilizadores pertencem (estão registados) num grupo. Normalmente \'member\' ou \'memberUid\'.';
$string['enrol_ldap_student_settings'] = 'Definições de registo de aluno';
$string['enrol_ldap_teacher_contexts'] = 'Lista de contextos onde os grupos com registos de professores estão localizados. Separe os diferentes contextos com \';\'. Por exemplo: \'ou=courses,o=org; ou=others,o=org\'';
$string['enrol_ldap_teacher_memberattribute'] = 'Atributo do membro, quando os utilizadores pertencem (estão registados) num grupo. Normalmente \'member\' ou \'memberUid\'.';
$string['enrol_ldap_teacher_settings'] = 'Definições de registo de professores';
$string['enrol_ldap_template'] = 'Opcional:Disciplinas criadas automaticamente podem receber as definições copiadas de uma disciplina template';
$string['enrol_ldap_updatelocal'] = 'Actualizar dados locais';
$string['enrol_ldap_version'] = 'A versão do protocolo LDAP que o seu servidor está a utilizar.';
$string['enrolname'] = 'LDAP';

?>
