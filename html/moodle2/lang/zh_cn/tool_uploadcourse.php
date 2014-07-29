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
 * Strings for component 'tool_uploadcourse', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_uploadcourse
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = '允许删除';
$string['allowdeletes_help'] = '不管被删除的字段被接受还是没有。';
$string['allowrenames'] = '允许重命名';
$string['allowrenames_help'] = '不管被重命名的字段被接受还是没有。';
$string['allowresets'] = '允许重置';
$string['allowresets_help'] = '不管被重置的字段被接受还是没有。';
$string['coursecreated'] = '创建课程';
$string['coursedeleted'] = '删除课程';
$string['coursedeletionnotallowed'] = '不允许删除课程';
$string['coursefile'] = '文件';
$string['coursefile_help'] = '文件的格式必须为 CSV 格式。';
$string['createnew'] = '仅创建新课程，忽略已经存在的课程';
$string['createorupdate'] = '创建新课程，或者更新已经存在的课程';
$string['csvdelimiter'] = 'CSV 分隔符';
$string['csvdelimiter_help'] = 'CSV 文件的分隔符。';
$string['csvline'] = '行';
$string['defaultvalues'] = '默认课程值';
$string['encoding'] = '编码格式';
$string['encoding_help'] = 'CSV 文件的编码格式。';
$string['errorwhiledeletingcourse'] = '在删除课程的时候出现错误';
$string['errorwhilerestoringcourse'] = '在恢复课程的时候出现错误';
$string['generatedshortnamealreadyinuse'] = '生成的短名称已经被使用';
$string['generatedshortnameinvalid'] = '生成的短名称无效';
$string['id'] = 'ID';
$string['idnumberalreadyinuse'] = 'ID 值已经被其他课程使用';
$string['importoptions'] = '导入选项';
$string['invalidbackupfile'] = '无效的备份文件';
$string['invalidcourseformat'] = '无效的课程格式';
$string['invalidcsvfile'] = '无效的 CSV 上传文件';
$string['invalidencoding'] = '无效的编码格式';
$string['invalideupdatemode'] = '更新模式选择无效';
$string['invalidmode'] = '上传模式选择无效';
$string['invalidroles'] = '无效的角色名称：{$a}';
$string['invalidshortname'] = '无效的短名称';
$string['mode'] = '上传模式';
$string['mode_help'] = '这里允许你对上传的课程进行新建还是更新。';
$string['nochanges'] = '无修改';
$string['preview'] = '预览';
$string['reset'] = '课程上传完成后重置课程';
$string['restoreafterimport'] = '导入后恢复';
$string['result'] = '结果';
$string['rowpreviewnum'] = '预览记录';
$string['rowpreviewnum_help'] = '下一页中显示预览 CSV 文件中的数据数量，这个选项的数量将决定下一页显示的大小，请选择合理的值。';
$string['unknownimportmode'] = '未知导入模式';
$string['updatemode'] = '更新模式';
$string['updatemode_help'] = '如果你允许课程被更新，你需要告诉本工具课程需要更新成什么。';
$string['updateonly'] = '仅更新已存在的课程';
$string['uploadcourses'] = '上传课程';
$string['uploadcourses_help'] = '课程可以通过文件文件上传。上传的文件可是可以为下面的格式：

* 文件的每一行只包含一条记录
* 每条记录通过逗号分隔符进行分隔，或者其他分隔符
* 第一条记录需要包含有字段列表来标识文件的所有数据
* 必须的字段包括有 shortname（短名），fullname（长名），和 category（分类）';
$string['uploadcoursespreview'] = '课程上传预览';
$string['uploadcoursesresult'] = '课程上传结果';
