<?PHP // $Id: assignment_random.php,v 1.1 2009/10/01 10:10:50 evgenij Exp $ 
      // assignment_random.php - created with Moodle 1.9.5+ (Build: 20090722) (2007101550)
      // local modifications from http://lserv.deg.gubkin.ru


$string['assignment'] = 'Задания';
$string['directoryassignment'] = 'Каталог с заданиями';
$string['directoryassignmenthlp'] = 'Выберите каталог с заданиями';
$string['directoryassignmenthlptext'] = '<span style=\'font-weight: bold\'>Note:</span>Для использования случайного задания необходимо соблюдать следующую структуру каталогов: В основном каталоге курса (см. Файлы курса) должен быть подкаталог moddata. Если его нет, создайте его. Затем, в каталоге moddata создайте подкаталог <span style=\'font-weight: bold\'>random</span>. Перейдите в него и создайте там два подкаталога: <span style=\'font-weight: bold\'>assignment</span> и <span style=\'font-weight: bold\'>solution</span>. В каталоге <span style=\'font-weight: bold\'>assignment</span> будут содержаться каталоги с заданиями, а в каталоге <span style=\'font-weight: bold\'>solution</span> - с решениями. Названия подкаталогов могут быть только числовыми (например, структура каталогов может быть такой: <span style=\'font-weight: bold\'>moddata/random/assignment/10</span>). Каталоги с заданиями и соответствующими решениями не обязательно должны называться одинаково (например, файл задания с именем <span style=\'font-weight: bold\'>assign1.html </span> может находиться в каталоге <span style=\'font-weight: bold\'>moddata/random/assignment/10/assign1.html</span>, а файл с соответствующим решением (имеющий такое же имя, что и файл задания) <span style=\'font-weight: bold\'>assign1.html </span> может находиться в каталоге <span style=\'font-weight: bold\'>moddata/random/solutions/20/assign1.html</span>). Связь решения и задания осуществляется выбором двух каталогов (каталог с заданиями: <span style=\'font-weight: bold\'>10</span>) и (каталог с решениями: <span style=\'font-weight: bold\'>20</span>).';
$string['directorysolution'] = 'Каталог с решениями (или указаниями)';
$string['directorysolutionhlp'] = 'Выберите каталог с решениями';
$string['directorysolutionhlptext'] = 'Если решения недоступны, можно не указывать <span style=\'font-weight: bold\'>каталог с решениями</span>';
$string['getassignment'] = 'Вы можете получить задание $a';
$string['getassignmenttext'] = 'здесь';
$string['maindirectoryassignment'] = 'Выберите каталог с заданиями:';
$string['maindirectorysolution'] = 'Выберите каталог с решениями:';
$string['problem'] = 'Файлы заданий пока недоступны!';
$string['problemdirectoryassignment'] = 'Каталог с заданиями не выбран!';
$string['problemdirectorysolution'] = 'Каталог с решениями не выбран!';
$string['problemfileassignment'] = 'В каталоге с заданиями нет файлов!';
$string['problemfilesolution'] = 'В каталоге с решениями нет файлов!';
$string['responsefilesassignment'] = 'Файл задания: $a';
$string['responsefilessolution'] = 'Файл решения: $a';
$string['solution'] = 'Решения';
$string['typerandom'] = 'Случайное задание';

?>
