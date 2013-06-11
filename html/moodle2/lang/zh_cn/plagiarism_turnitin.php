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
 * Strings for component 'plagiarism_turnitin', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   plagiarism_turnitin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminlogin'] = '以管理员身份登录到 Turnitin';
$string['compareinstitution'] = '将提交的文件和提交给机构的文件进行比较';
$string['compareinstitution_help'] = '此选项只有在您设置和购买了一个定制节点才可用。如果不确定就应该设置为 “否”。';
$string['compareinternet'] = '将提交的文件与网络内容相对比';
$string['compareinternet_help'] = '这一选项允许将提交的文件与 Turnitin 当前索引的网络内容相比较';
$string['comparejournals'] = '将提交的文件与期刊，文献相比较';
$string['comparejournals_help'] = '这一选项允许将提交的文件与 Turnitin 当前索引的期刊，文献相比较';
$string['comparestudents'] = '将提交的文件与其他学生提交的文件相比较';
$string['comparestudents_help'] = '这一选项允许将提交的文件与其他学生提交的文件相比较';
$string['configdefault'] = '这是作业创建页面的默认设置。只有拥有 plagiarism/turnitin:enableturnitin 权限的用户可以对个人作业更改这一设置';
$string['configusetiimodule'] = '启用 Turnitin 提交。';
$string['defaultsdesc'] = '当在活动模块中启用 Turnitin 时，下列设置是默认设置';
$string['defaultupdated'] = 'Turnitin 默认设置已经更新';
$string['draftsubmit'] = '该文件何时应被提交到 Turnitin';
$string['excludebiblio'] = '忽略参考文献';
$string['excludebiblio_help'] = '在查看原创性报告时，书目材料也可以包含进去或排除掉。在第一个文件提交后，此设置不能再修改。';
$string['excludematches'] = '排除小的匹配';
$string['excludematches_help'] = '您可以按百分比或字数来忽略小规模的雷同-选择您所希望使用的标准，并将百分比或者字数输入到下面的框中。';
$string['excludequoted'] = '忽略引用材料';
$string['excludequoted_help'] = '在查看原创性报告时，引用的材料也可以包含进去或排除掉。在第一个文件提交后，此设置不能再修改。';
$string['file'] = '文件';
$string['filedeleted'] = '从队列中删除的文件';
$string['fileresubmitted'] = '排队等待重新提交的文件';
$string['module'] = '模块';
$string['name'] = '名称';
$string['percentage'] = '百分比';
$string['pluginname'] = 'Turnitin 反抄袭插件';
$string['reportgen'] = '什么时候生成原创性报告';
$string['reportgenduedate'] = '在截止日期';
$string['reportgen_help'] = '此选项可让您选择什么时候应该生成原创性报告';
$string['reportgenimmediate'] = '立即（第一份报告就是最终的）';
$string['reportgenimmediateoverwrite'] = '立即（可以覆盖报告）';
$string['resubmit'] = '重新提交';
$string['savedconfigfailure'] = '无法连接 / 验证到 Turnitin —— 您可能有一个不正确的 密钥 / 帐号 ID 组合或此服务器不能连接到该 API';
$string['savedconfigsuccess'] = 'Turnitin 设置已经保存，并且已经创建教师帐号';
$string['showstudentsreport'] = '向学生展示相似性报告';
$string['showstudentsreport_help'] = '相似性报告给出一个关于提交的哪些部分是抄袭的和 Turnitin 首先看到这些内容的位置的统计分析';
$string['showstudentsscore'] = '向学生显示相似度分值';
$string['showstudentsscore_help'] = '相似度分值是所提交的文件与其他材料雷同的百分比——高的分值通常是不好的。';
$string['showwhenclosed'] = '当活动关闭时';
$string['similarity'] = '相似度';
$string['status'] = '状态';
$string['studentdisclosuredefault'] = '所有上传的文件将会被提交到抄袭检测服务 Turnitin.com';
$string['studentdisclosure_help'] = '该文本将会在文件上传页面上展示给所有学生。';
$string['submitondraft'] = '第一次上传时提交文件';
$string['submitonfinal'] = '当学生发送来评分时提交文件';
$string['teacherlogin'] = '以教师身份登录到 Turnitin';
$string['tii'] = 'Turnitin';
$string['tiiaccountid'] = 'Turnitin 账户 ID';
$string['tiiaccountid_help'] = '这是由 Turnitin.com 所提供的您的账户ID';
$string['tiiapi'] = 'Turnitin API';
$string['tiiapi_help'] = '这是 Turnitin API 的地址——通常是 https://api.turnitin.com/api.asp';
$string['tiiconfigerror'] = '在尝试将该文件传输到 Turnitin 时发生了站点配置错误';
$string['tiiemailprefix'] = '学生电子邮件前缀';
$string['tiiemailprefix_help'] = '如果您不希望学生能登录到 turnitin.com 网站并查看完整的报告，您必须设置此项。';
$string['tiienablegrademark'] = '启用 Grademark (试验性)';
$string['tiienablegrademark_help'] = 'Grademark 是 Turnitin 的一个可选功能 —— 要使用它，您必须在您的 Turnitin 订阅里包括这 个。启用这个将会造成查看提交页面时加载缓慢。';
$string['tiierror'] = 'TII 错误：';
$string['tiierror1007'] = 'Turnitin 不能处理这个文件，因为它太过庞大';
$string['tiierror1008'] = '当尝试发送此文件到 Turnitin 时发生了一个错误';
$string['tiierror1009'] = 'Turnitin 不能处理这个文件 —— 这是一个不支持的文件类型。有效的文件类型是 MS Word，Acrobat PDF，Postscript，文本，HTML，WordPerfect 和 RTF 格式';
$string['tiierror1010'] = 'Turnitin 不能处理这个文件 —— 它必须包含多于 100 个非空白字符';
$string['tiierror1011'] = 'Turnitin 不能处理这个文件 —— 它的格式不正确，问题似乎是因为每两个字母间有空格';
$string['tiierror1012'] = 'Turnitin 不能处理这个文件 ——  它的长度超出了 Turnitin 的限制';
$string['tiierror1013'] = 'Turnitin 不能处理这个文件 —— 它必须包含多于 20 个词语';
$string['tiierror1020'] = 'Turnitin 不能处理这个文件 —— 它包含不支持的字符集中的字符';
$string['tiierror1023'] = 'Turnitin 不能处理这个文件 —— 确保它没有密码保护并且包含可以选择的文本而不是扫描的图片';
$string['tiierror1024'] = 'Turnitin 不能处理这个文件 —— 它不符合 Turnitin 合法文件的标准';
$string['tiierrorpaperfail'] = 'Turnitin 无法处理该文件。';
$string['tiierrorpending'] = '文件等待提交到 Turnitin';
$string['tiiexplain'] = 'Turnitin 是一个商业产品，您必须付费订阅才能使用这项服务；详细信息请参阅 <a href="http://docs.moodle.org/en/Turnitin_administration">http://docs.moodle.org/en/Turnitin_administration</a>';
$string['tiiexplainerrors'] = '此页面显示任何已经提交到 Turnitin 并且目前处于错误状态的文件。 Turnitin 的错误代码及其描述的列表可以在这里找到： :<a href="http://docs.moodle.org/en/Turnitin_errors">docs.moodle.org/en/Turnitin_errors</a><br/>当文件重置后，计划程序将会尝试再次将文件提交到 Turnitin。<br/>当文件在此页面被删除后，他们将再也不能被重新提交到 Turnitin，并且也不会向教师和学生显示错误';
$string['tiisecretkey'] = 'Turnitin 密钥';
$string['tiisecretkey_help'] = '以您站点的管理员身份登录 Turnitin.com 来获取这个。';
$string['tiisenduseremail'] = '发送电子邮件给用户';
$string['tiisenduseremail_help'] = '给每个学生发送一个 TII 系统创建的包含登录到 www.turnitin.com 的链接和临时密码的电子邮件';
$string['turnitin'] = 'Turnitin';
$string['turnitin_attemptcodes'] = '自动重新提交的错误代码';
$string['turnitin_attemptcodes_help'] = 'Turnitin 能接受第二次提交的错误代码（这个域的修改可能导致服务器负载加重）';
$string['turnitin_attempts'] = '重试的次数';
$string['turnitin_attempts_help'] = '代码指定的重新提交到  Turnitin 的次数，一次重试的意思是带有此错误代码的文件将会被提交两次。';
$string['turnitindefaults'] = 'Turnitin 的默认值';
$string['turnitin:enable'] = '允许教师在 Moodle 里开启 / 禁用 Turnitin';
$string['turnitinerrors'] = 'Turnitin 错误';
$string['turnitin_institutionnode'] = '启用机构节点';
$string['turnitin_institutionnode_help'] = '如果您已经使用您的帐号 设置 / 购买了一个机构节点，开启这个并在创建作业时允许选中节点。注意：如果您没有机构节点，启用此设置会导致您的文件提交失败。';
$string['turnitin:viewfullreport'] = '允许教师查看 Turnitin 返回的完整报告';
$string['turnitin:viewsimilarityscore'] = '允许教师查看Turnitin 返回的相似性分数';
$string['useturnitin'] = '启用 Turnitin';
$string['wordcount'] = '字数统计';
