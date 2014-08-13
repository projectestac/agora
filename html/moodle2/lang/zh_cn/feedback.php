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
 * Strings for component 'feedback', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   feedback
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add_item'] = '向活动添加问题';
$string['add_pagebreak'] = '添加一个分页符';
$string['adjustment'] = '调整';
$string['after_submit'] = '提交后';
$string['allowfullanonymous'] = '允许全匿名';
$string['analysis'] = '分析';
$string['anonymous'] = '匿名';
$string['anonymous_edit'] = '记录用户姓名';
$string['anonymous_entries'] = '匿名条目';
$string['anonymous_user'] = '匿名用户';
$string['append_new_items'] = '追加新题';
$string['autonumbering'] = '自动编号';
$string['autonumbering_help'] = '允许或禁止对每个问题自动编号';
$string['average'] = '平均';
$string['bold'] = '加粗';
$string['cancel_moving'] = '放弃移动';
$string['cannotmapfeedback'] = '数据库问题，无法映射反馈到课程';
$string['cannotsavetempl'] = '不允许保存模板';
$string['cannotunmap'] = '数据库问题，无法取消镜像';
$string['captcha'] = '验证码';
$string['captchanotset'] = '验证码未设置。';
$string['check'] = '多选项 - 多选择';
$string['checkbox'] = '多选项 - 允许多选（复选框）';
$string['check_values'] = '可能的回答';
$string['choosefile'] = '选择一个文件';
$string['chosen_feedback_response'] = '选择反馈答复';
$string['completed'] = '已完成';
$string['completed_feedbacks'] = '已提交的答复';
$string['complete_the_form'] = '回答问题...';
$string['completionsubmit'] = '提交反馈后显示为已完成';
$string['configallowfullanonymous'] = '如果设为“是”，那么不需要登录就可以参与反馈活动。这个选项只影响首页的反馈。';
$string['confirmdeleteentry'] = '您确定要删除此项吗？';
$string['confirmdeleteitem'] = '您确定要删除此问题吗？';
$string['confirmdeletetemplate'] = '您确定要删除此模板吗？';
$string['confirmusetemplate'] = '您确定要使用此模板吗？';
$string['continue_the_form'] = '继续填表';
$string['count_of_nums'] = '数字个数';
$string['courseid'] = '课程ID';
$string['creating_templates'] = '将这些问题存为一个新模板';
$string['delete_entry'] = '删除条目';
$string['delete_item'] = '删除此题';
$string['delete_old_items'] = '删除旧题';
$string['delete_template'] = '删除模板';
$string['delete_templates'] = '删除模板...';
$string['depending'] = '依赖的问题';
$string['depending_help'] = '依赖性使问题的显示取决于对其它问题的回答。<br />
<strong>这里有一个使用例子：</strong>
<br />
<ul>
<li>首先创建一条其它问题要依赖的题。</li>
<li>然后添加一个分页符。</li>
<li>接着添加一条依赖于上面那道题的题。<br />
在创建问题表单中的“依赖于问题”列表中选择那道题，并将需要的值填入“依赖值”文本框中。</li>
</ul>
<strong>结构应该像下面这样：</strong>
<ol>
<li>问题：您有汽车吗？回答：有/没有</li>
<li>分页符</li>
<li>问题：您的车是什么颜色的？<br />
（此题当问题1选择“有”时才显示）</li>
<li>问题：您为什么没有车？<br />
（此题当问题1选择“没有”时才显示）</li>
<li> ……其它问题</li>
</ol>
就是这样。祝您使用愉快！';
$string['dependitem'] = '依赖的问题';
$string['dependvalue'] = '依赖值';
$string['description'] = '描述';
$string['do_not_analyse_empty_submits'] = '不分析空提交';
$string['dropdown'] = '多选项 - 单选（下拉列表）';
$string['dropdownlist'] = '多选项 - 单选（下拉列表）';
$string['dropdownrated'] = '下拉列表（可评分）';
$string['dropdown_values'] = '答卷';
$string['drop_feedback'] = '从此课程移除';
$string['edit_item'] = '编辑问题';
$string['edit_items'] = '编辑问题';
$string['email_notification'] = '发送email通知';
$string['email_notification_help'] = '如果激活，有反馈被提交后，管理员会收到email通知';
$string['emailteachermail'] = '{$a->username}已经填写反馈：“{$a->feedback}”

您可以到这里查看结果：

{$a->url}';
$string['emailteachermailhtml'] = '{$a->username}已经填写反馈：<i>“{$a->feedback}”</i><br /><br />
您可以到<a href="{$a->url}">这里</a>查看结果。';
$string['entries_saved'] = '您的回答已被保存。谢谢。';
$string['export_questions'] = '导出问题';
$string['export_to_excel'] = '导出到Excel';
$string['feedback:addinstance'] = '添加新反馈';
$string['feedbackclose'] = '关闭此反馈时间';
$string['feedback:complete'] = '填写反馈';
$string['feedback:createprivatetemplate'] = '建立私有模板';
$string['feedback:createpublictemplate'] = '建立公共模板';
$string['feedback:deletesubmissions'] = '删除已填完的问卷';
$string['feedback:deletetemplate'] = '删除模板';
$string['feedback:edititems'] = '编辑项目';
$string['feedback_is_not_for_anonymous'] = '此反馈不能匿名参加';
$string['feedback_is_not_open'] = '此反馈未开放';
$string['feedback:mapcourse'] = '向全局反馈映射课程';
$string['feedbackopen'] = '开放此反馈时间';
$string['feedback:receivemail'] = '接收email通知';
$string['feedback:view'] = '查看反馈活动';
$string['feedback:viewanalysepage'] = '提交后查看分析页面';
$string['feedback:viewreports'] = '查看报告';
$string['file'] = '文件';
$string['filter_by_course'] = '按课程过滤';
$string['handling_error'] = '反馈模块动作处理出错';
$string['hide_no_select_option'] = '不显示“未选择”选项';
$string['horizontal'] = '水平';
$string['importfromthisfile'] = '从此文件导入';
$string['import_questions'] = '导入问题';
$string['import_successfully'] = '导入成功';
$string['info'] = '信息';
$string['infotype'] = '信息类型';
$string['insufficient_responses'] = '问卷数不够';
$string['insufficient_responses_for_this_group'] = '此组给出的答复数量不足';
$string['insufficient_responses_help'] = '此小组的回答数量不足。

为了保证反馈的匿名性，至少需要两个以上的回答。';
$string['item_label'] = '标签';
$string['item_name'] = '问题';
$string['label'] = '标签';
$string['line_values'] = '评分';
$string['mapcourse'] = '映射反馈到课程';
$string['mapcourse_help'] = '默认情况下，在您的主页创建的反馈表全站可用，并且会在所有使用了反馈版块的课程中出现。你可以把反馈表设成粘性版块来强制它出现，或者通过将它映射到指定的课程来限制此反馈表出现的课程。';
$string['mapcourseinfo'] = '这是一个全站反馈，所有使用了反馈版块的课程都可以使用它。你也可以通过映射来限制此反馈出现在哪些课程中。搜索课程然后将它映射到此反馈即可。';
$string['mapcoursenone'] = '没有课程被映射。反馈对所有课程可用。';
$string['mapcourses'] = '将反馈映射到课程';
$string['mapcourses_help'] = '如果您在搜索中选择了相关的课程，您可以使用映射课程将它们与本反馈关联。按住Apple或Ctrl键点击课程名，可以选择多个课程。任何时候都可以取消课程和反馈的关联。';
$string['mappedcourses'] = '已映射课程';
$string['max_args_exceeded'] = '最多只能处理 6 个参数，参数太多';
$string['maximal'] = '最大';
$string['messageprovider:message'] = '反馈提醒';
$string['messageprovider:submission'] = '反馈通知';
$string['mode'] = '模式';
$string['modulename'] = '反馈';
$string['modulename_help'] = '反馈模块可以建立自定义的问卷调查';
$string['modulenameplural'] = '反馈';
$string['movedown_item'] = '向下移动此题';
$string['move_here'] = '移动到此';
$string['move_item'] = '移动此题';
$string['moveup_item'] = '向上移动此题';
$string['multichoice'] = '选择题';
$string['multichoicerated'] = '选择题（可评分）';
$string['multichoicetype'] = '选择题';
$string['multichoice_values'] = '选项';
$string['multiplesubmit'] = '多次提交';
$string['multiplesubmit_help'] = '如果对匿名调查也启用，那么用户就可以无限次提交反馈。';
$string['name'] = '名称';
$string['name_required'] = '必须输入名称';
$string['next_page'] = '下一页';
$string['no_handler'] = '没有动作处理器给';
$string['no_itemlabel'] = '无标签';
$string['no_itemname'] = '无项目名';
$string['no_items_available_yet'] = '还没有已设置的问题';
$string['non_anonymous'] = '用户姓名会被记录，并和他们的反馈一起显示';
$string['non_anonymous_entries'] = '非匿名条目';
$string['non_respondents_students'] = '未答复的学生';
$string['notavailable'] = '本反馈不可用';
$string['not_completed_yet'] = '还未完成';
$string['no_templates_available_yet'] = '还没有模板';
$string['not_selected'] = '未选择';
$string['not_started'] = '还未答题';
$string['numeric'] = '数字题';
$string['numeric_range_from'] = '范围从';
$string['numeric_range_to'] = '到';
$string['of'] = '/';
$string['oldvaluespreserved'] = '所有旧题和相关数据都会保留';
$string['oldvalueswillbedeleted'] = '已有的问题和所有用户的答复都会被删除';
$string['only_one_captcha_allowed'] = '反馈中只可以有一个验证码';
$string['overview'] = '概述';
$string['page'] = '页面';
$string['page_after_submit'] = '提交后页面';
$string['pagebreak'] = '分页符';
$string['page-mod-feedback-x'] = '任意反馈模块页';
$string['parameters_missing'] = '缺少参数';
$string['picture'] = '图片';
$string['picture_file_list'] = '图片列表';
$string['picture_values'] = '从此列表选择一个或多个<br />图片文件：';
$string['pluginadministration'] = '反馈管理';
$string['pluginname'] = '反馈';
$string['position'] = '位置';
$string['preview'] = '预览';
$string['preview_help'] = '在预览中可以修改问题的顺序。';
$string['previous_page'] = '前一页';
$string['public'] = '公共的';
$string['question'] = '问题';
$string['questions'] = '问题';
$string['radio'] = '多选项 - 单选';
$string['radiobutton'] = '多选项 - 单选（单选按钮）';
$string['radiobutton_rated'] = '单选按钮（评分）';
$string['radiorated'] = '单选框（可评分）';
$string['radio_values'] = '回答';
$string['ready_feedbacks'] = '就绪反馈';
$string['relateditemsdeleted'] = '所有用户对此问题的答复也都会被删除';
$string['required'] = '必须回答';
$string['resetting_data'] = '清空反馈的答复';
$string['resetting_feedbacks'] = '正在重置反馈';
$string['response_nr'] = '答复编号';
$string['responses'] = '答复';
$string['responsetime'] = '答复时间';
$string['save_as_new_item'] = '另存为新问题';
$string['save_as_new_template'] = '另存为新模板';
$string['save_entries'] = '提交您的答复';
$string['save_item'] = '保存问题';
$string['saving_failed'] = '保存失败';
$string['saving_failed_because_missing_or_false_values'] = '无法保存，因为没有值或值为假';
$string['search_course'] = '搜索课程';
$string['searchcourses'] = '搜索课程';
$string['searchcourses_help'] = '搜索您想和此反馈关联的课程名称或代码';
$string['selected_dump'] = '$SESSION 选择的索引变量显示如下：';
$string['send'] = '发送';
$string['send_message'] = '发送消息';
$string['separator_decimal'] = '.';
$string['separator_thousand'] = ',';
$string['show_all'] = '显示全部';
$string['show_analysepage_after_submit'] = '提交后显示分析页';
$string['show_entries'] = '显示答复';
$string['show_entry'] = '显示答复';
$string['show_nonrespondents'] = '显示未答复者';
$string['site_after_submit'] = '提交后访问';
$string['sort_by_course'] = '按课程排序';
$string['start'] = '开始';
$string['started'] = '已经开始';
$string['stop'] = '结束';
$string['subject'] = '主题';
$string['switch_group'] = '切换组';
$string['switch_item_to_not_required'] = '切换到：不必须回答';
$string['switch_item_to_required'] = '切换到：必须回答';
$string['template'] = '模板';
$string['templates'] = '模板';
$string['template_saved'] = '模板已保存';
$string['textarea'] = '问答题';
$string['textarea_height'] = '行数';
$string['textarea_width'] = '宽度';
$string['textfield'] = '填空题';
$string['textfield_maxlength'] = '最多可接受字符数';
$string['textfield_size'] = '文本域宽度';
$string['there_are_no_settings_for_recaptcha'] = '没有captcha的设置';
$string['this_feedback_is_already_submitted'] = '您已经完成此活动。';
$string['typemissing'] = '缺少"type"值';
$string['update_item'] = '保存对问题的修改';
$string['url_for_continue'] = '继续按钮的URL';
$string['url_for_continue_help'] = '提交反馈后，继续按钮的目标缺省是课程页面。您可以在这里定义另一个目标URL。';
$string['use_one_line_for_each_value'] = '<br />每个选项只占一行！';
$string['use_this_template'] = '使用此模板';
$string['using_templates'] = '选择一个模板';
$string['vertical'] = '垂直';
$string['viewcompleted'] = '已完成的反馈';
$string['viewcompleted_help'] = '您可以查看已完成的反馈表。可以通过课程或问题查询。
对反馈的答复可以导出到Excel。';
