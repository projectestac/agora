<?PHP // $Id$ 
      // enrol_database.php - created with Moodle 1.9.5 (Build: 20090520) (2007101550)


$string['autocreate'] = '如果 Moodle 中某课程不存在，则当有人选修课程时系统会自动创建课程。';
$string['autocreation_settings'] = '自动创建课程的设置';
$string['category'] = '自动创建的课程所属类别。';
$string['course_fullname'] = '存储课程全称的字段的名称。';
$string['course_id'] = '存储课程 ID 的字段的名称。这个字段的值与那些在 Moodle 的课程表单里的“enrol_db_l_coursefield”的字段相匹配。';
$string['course_shortname'] = '存储课程简称的字段的名称。';
$string['course_table'] = '我们希望课程的细节（缩略名、全名、ID 等）的表单的名称';
$string['dbhost'] = '服务器域名或 IP';
$string['dbname'] = '数据库名';
$string['dbpass'] = '服务器密码';
$string['dbtable'] = '数据库表名';
$string['dbtype'] = '数据库类型';
$string['dbuser'] = '服务器用户名';
$string['defaultcourseroleid'] = '如果未指定任何角色，那么用户的缺省角色。';
$string['description'] = '您可以是用外部的数据库(任意类型)来控制选课信息。在这种情况下，通常假设您的外部数据库包含了一个字段对应着课程的 ID 和一个字段对应着用户的 ID。它们将与您选择的本地课程和用户表中的字段相关联。';
$string['disableunenrol'] = '如果设置为“是”，先前通过外部数据库插件注册的用户将不能以同样的插件来注销。';
$string['enrol_database_autocreation_settings'] = '自动建立新课程';
$string['enrolname'] = '外部数据库';
$string['general_options'] = '通用选项';
$string['host'] = '数据库服务的主机名';
$string['ignorehiddencourse'] = '此项如果设置为是，用户将不能登录到那些对学生不可利用的课程。';
$string['local_fields_mapping'] = 'Moodle（本地）数据库字段';
$string['localcoursefield'] = '用来和远程数据库条目匹配的课程表中的字段名（如：idnumber）。';
$string['localrolefield'] = '用来和远程数据库条目匹配的角色表中的字段名（如：shortname）。';
$string['localuserfield'] = '用来和远程数据库条目匹配的用户表中的字段名（如：idnumber）。';
$string['name'] = '要使用的数据库。';
$string['pass'] = '访问服务器的口令。';
$string['remote_fields_mapping'] = '选课（远程）数据库。';
$string['remotecoursefield'] = '用来和课程表中条目匹配的远程表的字段名。';
$string['remoterolefield'] = '用来和角色表中条目匹配的远程表的字段名。';
$string['remoteuserfield'] = '用来和用户表中条目匹配的远程表的字段名。';
$string['server_settings'] = '服务器设置';
$string['student_coursefield'] = '远程学生选课表格中，存储课程 ID 的字段名。';
$string['student_l_userfield'] = '本地用户表格中，用来和远程记录匹配学生的字段名（如 idnumber）。';
$string['student_r_userfield'] = '远程学生选课名单表格中，存储用户 ID 的字段名。';
$string['student_table'] = '存储学生选课名单的表格。';
$string['teacher_coursefield'] = '远程教师授课表格中，存储课程 ID 的字段名。';
$string['teacher_l_userfield'] = '本地用户表格中，用来和远程记录匹配教师的字段名。';
$string['teacher_r_userfield'] = '远程教师授课表格中，存储用户 ID 的字段名。';
$string['teacher_table'] = '存储教师名单的表格的名称。';
$string['template'] = '可选的：自动创建的课程可以从模板课程中拷贝设置。在此输入模板课程的简称。';
$string['type'] = '数据库服务的类型';
$string['user'] = '访问服务器的用户名';

?>
