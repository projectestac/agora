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
 * Strings for component 'backup', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   backup
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autoactivedescription'] = '选择是否进行自动备份。如果选择人工，那么只能通过命令行的自动备份脚本做自动备份。您可以在命令行或通过cron来调用。';
$string['autoactivedisabled'] = '禁用';
$string['autoactiveenabled'] = '启用';
$string['autoactivemanual'] = '人工';
$string['automatedbackupschedule'] = '时间表';
$string['automatedbackupschedulehelp'] = '选择每周的哪一天进行自动备份。';
$string['automatedbackupsinactive'] = '定时备份功能没有开启';
$string['automatedbackupstatus'] = '定时备份状态';
$string['automatedsettings'] = '定时备份设置';
$string['automatedsetup'] = '自动备份设置';
$string['automatedstorage'] = '自动备份存储';
$string['automatedstoragehelp'] = '选择自动备份文件的存储路径';
$string['backupactivity'] = '备份活动：{$a}';
$string['backupcourse'] = '备份课程：{$a}';
$string['backupcoursedetails'] = '课程细节';
$string['backupcoursesection'] = '小节：{$a}';
$string['backupcoursesections'] = '课程小节';
$string['backupdate'] = '备份时间';
$string['backupdetails'] = '备份细节';
$string['backupdetailsnonstandardinfo'] = '所选的文件不是标准的Moodle备份文件。恢复进程会尝试将它转换为标准格式再恢复。';
$string['backupformat'] = '格式';
$string['backupformatimscc1'] = 'IMS Common Cartridge 1.0';
$string['backupformatimscc11'] = 'IMS Common Cartridge 1.1';
$string['backupformatmoodle1'] = 'Moodle 1';
$string['backupformatmoodle2'] = 'Moodle 2';
$string['backupformatunknown'] = '不可识别的格式';
$string['backupmode'] = '方式';
$string['backupmode10'] = '普通';
$string['backupmode20'] = '导入';
$string['backupmode30'] = '中心';
$string['backupmode40'] = '相同网站';
$string['backupmode50'] = '自动';
$string['backupmode60'] = '转换';
$string['backupsection'] = '备份课程小节：{$a}';
$string['backupsettings'] = '备份设置';
$string['backupsitedetails'] = '网站细节';
$string['backupstage16action'] = '继续';
$string['backupstage1action'] = '下一步';
$string['backupstage2action'] = '下一步';
$string['backupstage4action'] = '开始备份';
$string['backupstage8action'] = '继续';
$string['backuptype'] = '类型';
$string['backuptypeactivity'] = '活动';
$string['backuptypecourse'] = '课程';
$string['backuptypesection'] = '主题';
$string['backupversion'] = '备份版本';
$string['cannotfindassignablerole'] = '备份文件中的角色“{$a}”不能映射到任何您可以分配的角色。';
$string['choosefilefromactivitybackup'] = '活动备份区';
$string['choosefilefromactivitybackup_help'] = '当备份活动采用默认设置时，备份文件会被保存在这里';
$string['choosefilefromautomatedbackup'] = '自动备份';
$string['choosefilefromautomatedbackup_help'] = '包含自动生成的备份。';
$string['choosefilefromcoursebackup'] = '课程备份区';
$string['choosefilefromcoursebackup_help'] = '如果使用缺省设置备份课程，那么备份文件会被保存到这里';
$string['choosefilefromuserbackup'] = '用户私人备份区';
$string['choosefilefromuserbackup_help'] = '如果备份时选择了“匿名化用户信息”选项，备份文件会保存在这里';
$string['configgeneralactivities'] = '缺省情况下，备份是否包含各种活动。';
$string['configgeneralanonymize'] = '如果激活，会默认将与用户有关的信息匿名化。';
$string['configgeneralblocks'] = '缺省情况下，备份是否包含各个版块。';
$string['configgeneralcomments'] = '缺省情况下，备份是否包含评论。';
$string['configgeneralfilters'] = '缺省情况下，备份是否包含过滤器。';
$string['configgeneralhistories'] = '缺省情况下，备份是否包含用户的历史记录。';
$string['configgenerallogs'] = '如果激活，会默认将日志包含在备份中。';
$string['configgeneralroleassignments'] = '如果激活，会默认备份角色分配情况。';
$string['configgeneralusers'] = '缺省情况下，备份是否包含用户。';
$string['configgeneraluserscompletion'] = '如果启用，会默认在备份中包含用户的课程完成信息。';
$string['configloglifetime'] = '这里设置将备份的日志信息保留多久。超过此期限的日志会被自动删除。建议把此值设得小一些，因为备份的日志可能会很大。';
$string['confirmcancel'] = '放弃备份';
$string['confirmcancelno'] = '不放弃';
$string['confirmcancelquestion'] = '您确定要放弃吗？
您输入的所有信息都将丢失。';
$string['confirmcancelyes'] = '放弃';
$string['confirmnewcoursecontinue'] = '新课程警告';
$string['confirmnewcoursecontinuequestion'] = '课程恢复过程中会创建一个临时（隐藏）课程。点击放弃按钮放弃恢复。恢复过程中不要关闭浏览器。';
$string['coursecategory'] = '此课程要恢复到的分类';
$string['courseid'] = '原ID';
$string['coursesettings'] = '课程设置';
$string['coursetitle'] = '标题';
$string['currentstage1'] = '初始设置';
$string['currentstage16'] = '完成';
$string['currentstage2'] = '架构设置';
$string['currentstage4'] = '确认和审核';
$string['currentstage8'] = '执行备份';
$string['dependenciesenforced'] = '因为未能满足依赖关系，您的设置被修改了';
$string['enterasearch'] = '键入并搜索';
$string['error_block_for_module_not_found'] = '在课程模块（ID：{$a->mid}）发现无主版块实例（ID：{$a->bid}）。不会备份此版块。';
$string['error_course_module_not_found'] = '发现无主课程模块（ID：{$a}）。不会备份此模块。';
$string['errorfilenamemustbezip'] = '您输入的文件名必须是ZIP文件且扩展名为.mbz';
$string['errorfilenamerequired'] = '您必须输入一个有效的文件名';
$string['errorinvalidformat'] = '无法识别的备份格式';
$string['errorinvalidformatinfo'] = '所选文件不是有效的Moodle备份文件，不能恢复。';
$string['errorminbackup20version'] = '此备份文件由开发版的Moodle备份创建 ({$a->backup})。最低需求是{$a->min}。不能恢复。';
$string['errorrestorefrontpage'] = '不允许恢复首页。';
$string['executionsuccess'] = '成功建立备份文件。';
$string['filealiasesrestorefailures'] = '别名恢复失败';
$string['filealiasesrestorefailures_help'] = '别名是链接到其他文件的符号链接，包括存储在外部容器中的文件。在某些情况下，Moodle 不能恢复它们——例如，在另一个站点恢复此备份文件或引用的文件不存在在时。

在恢复日志文件里能找到更多的细节和失败的确切原因。';
$string['filealiasesrestorefailuresinfo'] = '备份文件里的一些别名不能恢复。下面列出了它们预期的位置，和它们在原始网站的源文件。';
$string['filename'] = '文件名';
$string['filereferencesincluded'] = '备份包中某些文件引用了外部内容，它们在其它网站上无效。';
$string['filereferencesnotsamesite'] = '备份来自其他网站，文件引用不能恢复';
$string['filereferencessamesite'] = '备份来自同一网站，文件引用可以恢复';
$string['generalactivities'] = '包括活动';
$string['generalanonymize'] = '匿名信息';
$string['generalbackdefaults'] = '备份默认设置';
$string['generalblocks'] = '包括版块';
$string['generalcomments'] = '包括评论';
$string['generalfilters'] = '包括过滤器';
$string['generalgradehistories'] = '包括历史';
$string['generalhistories'] = '包括历史';
$string['generallogs'] = '包括日志';
$string['generalroleassignments'] = '包括角色分配';
$string['generalsettings'] = '一般备份设置';
$string['generalusers'] = '包括用户';
$string['generaluserscompletion'] = '包含用户课程完成信息';
$string['importbackupstage16action'] = '继续';
$string['importbackupstage1action'] = '下一步';
$string['importbackupstage2action'] = '下一步';
$string['importbackupstage4action'] = '执行导入';
$string['importbackupstage8action'] = '继续';
$string['importcurrentstage0'] = '课程选择';
$string['importcurrentstage1'] = '初始设置';
$string['importcurrentstage16'] = '完成';
$string['importcurrentstage2'] = '架构设置';
$string['importcurrentstage4'] = '确认和审核';
$string['importcurrentstage8'] = '执行导入';
$string['importfile'] = '导入一个备份文件';
$string['importsuccess'] = '导入完成。点继续返回到课程。';
$string['includeactivities'] = '包括：';
$string['includeditems'] = '包括项目：';
$string['includefilereferences'] = '文件引用了外部内容';
$string['includesection'] = '小节{$a}';
$string['includeuserinfo'] = '用户数据';
$string['locked'] = '锁定';
$string['lockedbyconfig'] = '此设置已被默认备份设置锁定';
$string['lockedbyhierarchy'] = '因依赖关系而锁定';
$string['lockedbypermission'] = '您没有更改此设置的权限';
$string['loglifetime'] = '保留日志多久';
$string['managefiles'] = '管理备份文件';
$string['missingfilesinpool'] = '在备份过程中某些文件不能保存，所以也不可能恢复它们。';
$string['moodleversion'] = 'Moodle版本';
$string['moreresults'] = '搜索结果太多了，请输入更多特别的搜索词。';
$string['nomatchingcourses'] = '没有可显示的课程';
$string['norestoreoptions'] = '没有您可以恢复到的分类或已有课程。';
$string['originalwwwroot'] = '备份的URL';
$string['previousstage'] = '上一步';
$string['qcategory2coursefallback'] = '备份文件中的题目类别“{$a->name}”原来是在系统/课程级类别中，恢复后将建立在课程级类别';
$string['qcategorycannotberestored'] = '恢复过程中不能创建题目类别“{$a->name}”';
$string['question2coursefallback'] = '备份文件中的题目类别“{$a->name}”原来是在系统/课程级类别中，恢复后将建立在课程级类别';
$string['questionegorycannotberestored'] = '这些题目“{$a->name}”不能用还原来创建';
$string['restoreactivity'] = '恢复活动';
$string['restorecourse'] = '恢复课程';
$string['restorecoursesettings'] = '课程设置';
$string['restoreexecutionsuccess'] = '课程已成功恢复。点击继续按钮浏览此课程。';
$string['restorefileweremissing'] = '某些文件不能恢复，因为该文件不在备份文件中。';
$string['restorenewcoursefullname'] = '新课程名';
$string['restorenewcourseshortname'] = '新课程简称';
$string['restorenewcoursestartdate'] = '新开始日期';
$string['restorerolemappings'] = '恢复角色映射';
$string['restorerootsettings'] = '恢复设置';
$string['restoresection'] = '恢复小节';
$string['restorestage1'] = '确认';
$string['restorestage16'] = '审核';
$string['restorestage16action'] = '开始恢复';
$string['restorestage1action'] = '下一步';
$string['restorestage2'] = '目标';
$string['restorestage2action'] = '下一步';
$string['restorestage32'] = '处理';
$string['restorestage32action'] = '继续';
$string['restorestage4'] = '设置';
$string['restorestage4action'] = '下一步';
$string['restorestage64'] = '完成';
$string['restorestage64action'] = '继续';
$string['restorestage8'] = '结构';
$string['restorestage8action'] = '下一步';
$string['restoretarget'] = '恢复目标';
$string['restoretocourse'] = '恢复到课程：';
$string['restoretocurrentcourse'] = '恢复到此课程';
$string['restoretocurrentcourseadding'] = '合并备份的课程到此课程';
$string['restoretocurrentcoursedeleting'] = '删除课程内容然后恢复';
$string['restoretoexistingcourse'] = '恢复到已有的课程';
$string['restoretoexistingcourseadding'] = '合并备份的课程到已有的课程';
$string['restoretoexistingcoursedeleting'] = '删除已有课程的内容然后恢复';
$string['restoretonewcourse'] = '恢复为一个新课程';
$string['restoringcourse'] = '课程正在恢复';
$string['restoringcourseshortname'] = '恢复中';
$string['rootsettingactivities'] = '包括活动';
$string['rootsettinganonymize'] = '匿名化用户信息';
$string['rootsettingblocks'] = '包括版块';
$string['rootsettingcalendarevents'] = '包括日历事件';
$string['rootsettingcomments'] = '包括评论';
$string['rootsettingfilters'] = '包括过滤器';
$string['rootsettinggradehistories'] = '包括成绩历史';
$string['rootsettingimscc1'] = '转换到 IMS Common Cartridge 1.0';
$string['rootsettingimscc11'] = '转换到 IMS Common Cartridge 1.1';
$string['rootsettinglogs'] = '包括课程日志';
$string['rootsettingroleassignments'] = '包括角色分配';
$string['rootsettings'] = '备份设置';
$string['rootsettingusers'] = '包括已选课用户';
$string['rootsettinguserscompletion'] = '包括用户学习进度细节';
$string['sectionactivities'] = '活动';
$string['sectioninc'] = '包含在备份中（无用户信息）';
$string['sectionincanduser'] = '随用户信息一起包含在备份中';
$string['selectacategory'] = '选择一个分类';
$string['selectacourse'] = '选择一个课程';
$string['setting_course_fullname'] = '课程名';
$string['setting_course_shortname'] = '课程简称';
$string['setting_course_startdate'] = '课程开始时间';
$string['setting_keep_groups_and_groupings'] = '保留当前的小组和大组';
$string['setting_keep_roles_and_enrolments'] = '保留当前角色和选课';
$string['setting_overwriteconf'] = '覆盖课程配置';
$string['storagecourseandexternal'] = '课程备份文件区和指定的目录';
$string['storagecourseonly'] = '课程备份文件区';
$string['storageexternalonly'] = '指定自动备份的目录';
$string['totalcategorysearchresults'] = '分类总数：{$a}';
$string['totalcoursesearchresults'] = '课程总数：{$a}';
