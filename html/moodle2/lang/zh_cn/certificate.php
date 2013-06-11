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
 * Strings for component 'certificate', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   certificate
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addlinklabel'] = '添加另一个链接活动选项';
$string['addlinktitle'] = '点击添加另一个链接活动选项';
$string['areaintro'] = '证书介绍';
$string['awarded'] = '颁发';
$string['awardedto'] = '授予';
$string['back'] = '后退';
$string['border'] = '边界';
$string['borderblack'] = '黑色';
$string['borderblue'] = '蓝色';
$string['borderbrown'] = '棕色';
$string['bordercolor'] = '边界线';
$string['bordercolor_help'] = '由于图像会大幅增加 pdf 文件的大小，您可以选择打印边界线，而不是使用边界图像（确保边界图像选项设置为否）。边界线选项将打印一个使用选中颜色的不同宽度的三条线的漂亮边界。';
$string['bordergreen'] = '绿色';
$string['borderlines'] = '线条';
$string['borderstyle'] = '边界图像';
$string['borderstyle_help'] = '边界图像选项允许您从 certificate/pix/borders 文件夹选择一个边界图像。选择证书边缘您想要的图像或选择没有边框。';
$string['certificate'] = '证书编码验证：';
$string['certificate:manage'] = '管理证书';
$string['certificatename'] = '证书名称';
$string['certificate:printteacher'] = '打印教师';
$string['certificatereport'] = '证书报告';
$string['certificatesfor'] = '证书';
$string['certificate:student'] = '获得证书';
$string['certificatetype'] = '证书类型';
$string['certificatetype_help'] = '这是您确定证书布局的地方。证书类型文件夹包含了四种默认证书：
A4 嵌入式打印在 A4 大小的纸上，使用嵌入字体。
A4 非嵌入式打印在 A4 大小的纸上，不使用嵌入字体。
信件嵌入式打印在信件大小的纸上，使用嵌入字体。
信件非嵌入式打印在信件大小的纸上，不使用嵌入字体。

非嵌入类型使用 Helvetica 和 Times 字体。如果您担心您的用户的电脑上没有这种字体，或者您的语言使用的字符或符号无法接受Helvetica 和 Times 字体，那么选择一种嵌入类型。嵌入类型使用 Dejavusans 和 Dejavuserif 字体。这会使得 PDF 文件变得相当大；因此不建议使用嵌入类型，除非您必须使用。

新类型文件夹可以添加到 certificate/type 文件夹里。文件夹的名字和新类型使用的任何语言字符串必须添加到证书的语言文件里。';
$string['certificate:view'] = '查看证书';
$string['certify'] = '这是为了验证';
$string['code'] = '编码';
$string['completiondate'] = '课程结业';
$string['course'] = '为了';
$string['coursegrade'] = '课程成绩';
$string['coursename'] = '课程';
$string['credithours'] = '学时';
$string['customtext'] = '自定义文本';
$string['customtext_help'] = '如果您想让证书打印除已经分配为教师以外的不同教师的名字，不要选择打印教师或除线条图像以外的任何签名图像。在文本框里以您想要它们出现的形式输入教师的名字。默认情况下，这个文本被放置在证书的左下角。以下 HTML 标签可用： <br>，<p>，<b>，<i>，<u>，<img> （src 和 width（或 height）是强制性的），<a>（href 是强制性的），<font> （可能的属性是：color，（hex color code）, face， (arial，times，courier，helvetica，symbol））。';
$string['date'] = '在';
$string['datefmt'] = '日期格式';
$string['datefmt_help'] = '选择在证书上打印的日期的格式。或者选择最后一项来按户选择的语言的日期格式来打印日期。';
$string['datehelp'] = '日期';
$string['deletissuedcertificates'] = '删除颁发的证书';
$string['delivery'] = '递送';
$string['delivery_help'] = '在这儿选择您希望您的学生怎么获得他们的证书。
在浏览器中打开：在浏览器新窗口中打开证书。
强制下载：打开浏览器下载窗口。
电子邮寄证书：选择此项来将证书作为电子邮件附件发送给学生。
在用户收到证书后，如果他们在课程主页上点击证书链接，他们将看到他们获得证书的日期并可以查看他们获得的证书。';
$string['designoptions'] = '设计选项';
$string['download'] = '强制下载';
$string['emailcertificate'] = '发电子邮件（必须同时选择保存！）';
$string['emailothers'] = '给其他人发电子邮件';
$string['emailothers_help'] = '在这儿输入在学生获得证书时需要收到电子邮件提醒的人的电子邮件地址，由逗号分开。';
$string['emailstudenttext'] = '附件是您在{$a->course}课程获得的证书。';
$string['emailteachermail'] = '{$a->student}已经获得证书：{$a->course}课程的“{$a->certificate}”。

您可以在这里查看：

     {$a->url}';
$string['emailteachermailhtml'] = '{$a->student}已经获得证书：{$a->course}课程的“<i>{$a->certificate}</i>”。

您可以在这里查看：

    <a href="{$a->url}">证书报告</a>。';
$string['emailteachers'] = '向教师发电子邮件';
$string['emailteachers_help'] = '如果启用，那么当学生获得证书时，老师会收到一封电子邮件提醒。';
$string['entercode'] = '输入证书号码来验证：';
$string['getcertificate'] = '获得您的证书';
$string['grade'] = '成绩';
$string['gradedate'] = '评分日期';
$string['gradefmt'] = '成绩格式';
$string['gradefmt_help'] = '如果您选择在证书上打印成绩，有三种可用的格式：

百分比成绩：以百分比形式打印成绩。
分数成绩：以分数值形式打印成绩。
信件成绩：以信件形式打印百分比成绩。';
$string['gradeletter'] = '信件成绩';
$string['gradepercent'] = '百分比成绩';
$string['gradepoints'] = '分数成绩';
$string['incompletemessage'] = '要下载您的证书，您必须先完成所有要求完成的活动。请返回到课程并做完您的课程任务。';
$string['intro'] = '介绍';
$string['issued'] = '颁发';
$string['issueddate'] = '颁发日期';
$string['issueoptions'] = '颁发选项';
$string['landscape'] = '横排';
$string['lastviewed'] = '您最后得到此证书于：';
$string['letter'] = '信件';
$string['lockingoptions'] = '锁定选项';
$string['modulename'] = '证书';
$string['modulenameplural'] = '证书';
$string['mycertificates'] = '我的证书';
$string['nocertificates'] = '没有证书';
$string['nocertificatesissued'] = '没有已经颂发的证书';
$string['nocertificatesreceived'] = '还没有得到任何课程证书。';
$string['nogrades'] = '没有可用成绩';
$string['notapplicable'] = '不可用';
$string['notfound'] = '证书的号码不能通过验证。';
$string['notissued'] = '没有颁发';
$string['notissuedyet'] = '尚未颁发';
$string['notreceived'] = '您还没有得到此证书';
$string['openbrowser'] = '在新窗口中打开';
$string['opendownload'] = '点击下面的按钮把您的证书保存到您的计算机里。';
$string['openemail'] = '点击下面的按钮，您的证书会通过电子邮件附件发给您。';
$string['openwindow'] = '点击下面的按钮在一个新的浏览器窗口中打开您的证书。';
$string['or'] = '或者';
$string['orientation'] = '排版方向';
$string['orientation_help'] = '选择您希望您的证书的排版方向是竖排还是横排。';
$string['pluginadministration'] = '证书管理';
$string['pluginname'] = '证书';
$string['portrait'] = '竖排';
$string['printdate'] = '打印日期';
$string['printdate_help'] = '如果选择了打印日期，这个日期将会打印出来。如果选择了课程结业日期但学生没有完成课程，将会打印获得证书的日期。您也可以选择打印活动评分的日期。如果证书在活动评分前颁发，将会打印获得证书的日期。';
$string['printerfriendly'] = '可打印的页面';
$string['printgrade'] = '打印成绩';
$string['printgrade_help'] = '您可以从成绩单中选择任何可用的课程成绩项，在证书上打印用户在该项得到的成绩。成绩项以他们在成绩单中的顺序排列。在下面选择成绩格式。';
$string['printhours'] = '打印学时';
$string['printhours_help'] = '在这里输入在证书上打印的学时数。';
$string['printnumber'] = '打印号码';
$string['printnumber_help'] = '证书上会打印一个随机的字母和数字组成的独一无二的 10 位号码。通过和证书报告里显示的号码比较，可以验证号码。';
$string['printoutcome'] = '打印能力';
$string['printoutcome_help'] = '您可以将任何课程能力名和用户得到的能力打印在证书上。例如：作业能力：精通。';
$string['printseal'] = '印章或标志图片';
$string['printseal_help'] = '这个选项允许您从 certificate/pix/seals 文件夹选择一个印章或标志打印在证书上。默认情况下，这个图片被放在证书的右下角。';
$string['printsignature'] = '签名图片';
$string['printsignature_help'] = '这个选项允许您从  certificate/pix/signatures 文件夹打印一个签名图片。您可以打印一个图形表示的签名或打印一个用来书写签名的直线。默认情况下，这个图片被放在证书的左下角。';
$string['printteacher'] = '打印老师的名字';
$string['printteacher_help'] = '为在证书上打印教师的名字， 设置教师的角色在模块水平上。举例来说，如果您课程里有不止一个教师，或者您课程里有不止一个证书，并且您想要在每一个证书上打印不同的教师名字，就要这样做。点击编辑证书，然后点击“本地分配的角色” 选项卡。然后分配角色教师（编辑教师）给证书（他们不一定是此课程中的教师 —— 您可以将角色分配给任何人）。这些名字将会作为教师打印在证书上。';
$string['printwmark'] = '水印图像';
$string['printwmark_help'] = '一个水印文件将会放在证书的背景里。水印是一个浅色的图形。水印可以是一个标志、印章、饰章、文字或您想用来作为图形背景的任何东西。';
$string['receivedcerts'] = '得到的证书';
$string['receiveddate'] = '接收日期';
$string['reissuecert'] = '重新颁发证书';
$string['reissuecert_help'] = '如果您这里选择了是，那么每次用户点击证书的链接时证书将会用新的日期、成绩和号码重新颁发。注：虽然有一个表格显示出过去得到证书的日期，但是没有可供用户使用的查看按钮。只有最新颁发的证书显示在证书报告里。';
$string['removecert'] = '颁发的证书已删除';
$string['report'] = '报告';
$string['reportcert'] = '报告证书';
$string['reportcert_help'] = '如果您这里选择了是，那么证书的接收日期、号码和课程名称将会显示在用户的证书报告上。如果您选择了在证书上打印成绩，那么成绩也将会显示在证书报告上。';
$string['reviewcertificate'] = '查看您的证书';
$string['savecert'] = '保存证书';
$string['savecert_help'] = '如果您选择此项，有此证书的每个用户的证书 pdf 文件的副本将会保存在课程的 moddata 文件夹里。每个用户保存的证书的链接将会显示在证书报告里。';
$string['sigline'] = '线';
$string['statement'] = '已经完成此课程';
$string['summaryofattempts'] = '以前得到的证书的摘要';
$string['textoptions'] = '文本选项';
$string['title'] = '证书';
$string['to'] = '授予';
$string['typeA4_embedded'] = 'A4 嵌入式';
$string['typeA4_non_embedded'] = 'A4 非嵌入式';
$string['typeletter_embedded'] = '信件嵌入式';
$string['typeletter_non_embedded'] = '信件非嵌入式';
$string['userdateformat'] = '用户语言的日期格式';
$string['validate'] = '验证';
$string['verifycertificate'] = '验证证书';
$string['viewcertificateviews'] = '查看 {$a} 个颁发的证书';
$string['viewed'] = '您得到此证书于：';
$string['viewtranscript'] = '查看证书';
