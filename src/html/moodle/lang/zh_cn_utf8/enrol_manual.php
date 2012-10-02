<?PHP // $Id: enrol_manual.php,v 1.4 2010/04/25 04:52:33 liling Exp $ 
      // enrol_manual.php - created with Moodle 1.9.5 (Build: 20090520) (2007101550)


$string['description'] = '这是选课的缺省形式。学生有两种方法可以进入到课程中:
<ul>
<li>教师或管理员可以通过课程中的课程管理菜单里的链接，手工将学生加入到课程中。</li>
<li>课程可以定义一个密码，即“选课密钥”。所有知道这个密钥的人都能够进入课程。</li>
</ul>';
$string['enrol_manual_requirekey'] = '强制在新课程中使用选课密钥，且不能删除已有的密钥。';
$string['enrol_manual_showhint'] = '开启此选项，则用户输入了错误的选课密钥时，会提示他们密钥的第一个字母。';
$string['enrol_manual_usepasswordpolicy'] = '用当前的用户密码策略作为选课密钥设置策略。';
$string['enrolmentkeyerror'] = '选课密钥错误，请重试。';
$string['enrolname'] = '内部选课';
$string['keyholderrole'] = '此角色控制课程的选课密钥。将他显示给尝试选课的学生。';

?>
