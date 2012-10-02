<?PHP // $Id$ 
      // enrol_flatfile.php - created with Moodle 1.6.2 (2006050521)


$string['description'] = 'Este método analisa e processa repetidamente um ficheiro de texto que você indica, com um formato específico.
O ficheiro deverá ter quatro ou seis campos por linha, separados por vírgulas:<pre>
* operação, cargo, código (utilizador), código(disciplina) [, tempo_inicial, tempo_final]

onde:
* operação = add | del
* cargo = student | teacher | teacheredit
* código(utilizador) = número de identificação na tabela de utilizadores
* código(disciplina) = número de identificação na tabela de disciplinas
* tempo_inicial = opcional - tempo de início (em segundos desde a época de referência)
* tempo_final = opcional - tempo de finalização (em segundos desde a época de referência)
</pre>
Por exemplo, o conteúdo do ficheiro poderia ser:
<pre>
add, student, 5, CF101
add, teacher, 6, CF101
add, teacheredit, 7, CF101
del, student, 8, CF101
del, student, 17, CF101
add, student, 21, CF101, 1091115000, 1091215000
</pre>';
$string['enrolname'] = 'Ficheiro simples';
$string['filelockedmail'] = 'O ficheiro de texto que está a utilizar para as inscrições por ficheiro ($a), não pode ser apagado pelo processo cron. Isso normalmente é devido a permissões não apropriadas. Por favor corrija as permissões para que Moodle possa apagar o ficheiro; se não o fizer, poderá ser processado várias vezes.';
$string['filelockedmailsubject'] = 'Erro grave: Ficheiro de inscrições';
$string['location'] = 'Localização do ficheiro';
$string['mailadmin'] = 'Notificar administrador pelo correio electrónico';
$string['mailusers'] = 'Notificar utilizadores pelo correio electrónico';

?>
