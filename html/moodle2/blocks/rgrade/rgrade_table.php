<?php

require_once('../../config.php');
require_once('rgrade_lib.php');

// Opt. Avoid default javascript inclusion
$CFG->javascript = "javascript.php";

$courseid = required_param('courseid', PARAM_NUMBER);
$bookid = required_param('bookid', PARAM_NUMBER);
$course = rgrade_get_course($courseid);
if(!$course) {
	error('Course not valid');
}
$book = rgrade_get_book_from_course($courseid, $bookid);
if(!$book) {
	error('Book not valid');
}

require_login($courseid, false);
$PAGE->set_url(new moodle_url('/blocks/rgrade/rgrade_table.php', array('courseid' => $courseid, 'bookid' => $bookid)));

$tshourly = "";

// Init params 
$groupid = optional_param('groupid', '', PARAM_NUMBER);

$unitid = rgrade_last_units_with_grades($courseid, $bookid, $groupid);

$studentid = null;
if (!rgrade_check_capability("moodle/grade:viewall")) {
	$studentid = $USER->id;
}

$mod_title = rgrade_get_string("rgrade");
$mod_url = "#";
$page_title = $mod_title . ": " . $course->shortname . " | " . $book->name;
$title = $mod_title . ": " . $course->fullname . " | " . $book->name;

$PAGE->set_heading($page_title);
$PAGE->set_title($title);

$jspath = $CFG->wwwroot.'/blocks/rgrade/js';
$PAGE->requires->js(new moodle_url($jspath.'/jquery-1.7.1.min.js'));
$PAGE->requires->js(new moodle_url($jspath.'/jquery.ba-bbq.js'));
$PAGE->requires->js(new moodle_url($jspath.'/handlebars-1.0.0.beta.6.js'));
$PAGE->requires->js(new moodle_url($jspath.'/i18n.js')); 
$PAGE->requires->js(new moodle_url($jspath.'/css.js'));
$PAGE->requires->js(new moodle_url($jspath.'/jquery.cookie.js'));
$PAGE->requires->js(new moodle_url($jspath.'/jquery.simplemodal.1.4.2.min.js'));
$PAGE->requires->js(new moodle_url($jspath.'/rgrade.js?v='.$tshourly));

$csspath = $CFG->wwwroot.'/blocks/rgrade/css';
$PAGE->requires->css(new moodle_url($csspath.'/custom-theme/jquery-ui-1.8.18.custom.css'));
$PAGE->requires->css(new moodle_url($csspath.'/rgrade.css'));

$PAGE->navbar->add($mod_title, new moodle_url($mod_url));
$PAGE->navbar->add($book->name, null);

//Compatibilitat css moodle 1.9
$PAGE->add_body_class("blocks-rgrade");

echo $OUTPUT->header();
?>

<form id="rgrade_search_form"
	action="#"></form>

<div id="rgrade_table">

	<div id="combo" class="clearfix"></div>

</div>

<form id="combo-export" method="post" action="rgrade_export.php">
	<div>
		<textarea name="table"></textarea>
	</div>
</form>

<script id="search-template" type="text/x-handlebars-template">

<div id="rgrade_search_wrapper" class="hide-print">

<div id="rgrade_search">
<div class="in clearfix">

<fieldset id="report_extended_users_fs1">
<label>
	<span>{{I18n "Group"}}</span>
	<select name="groupid" id="field_groupid">
	<option value="">{{I18n "All options"}}</option>
	{{#each groups}}
	<option value="{{id}}">{{name}}</option>
	{{/each}}
	</select>
</label>
</fieldset>

<fieldset id="report_extended_users_fs2">
<label>
	<span>{{I18n "Students"}}</span>
	<select name="studentid[]" multiple="true" id="field_studentid" size="4">
	</select>
</label>
</fieldset>

<fieldset id="report_extended_units_fs">
<label>
	<span>{{I18n "Units"}}</span>
	<select name="unitid[]" multiple="true" id="field_unitid" size="4">
	{{#each book.units}}
	<option value="{{id}}">{{name}} ({{code}})</option>
	{{/each}}
	</select>
</label>
</fieldset>

<fieldset id="report_extended_date_fs">
<label>
	<span>{{I18n "Begin"}}</span>
	<input type="text" class="datepicker" name="begin"/>
</label>
<label>
	<span>{{I18n "End"}}</span>
	<input type="text" class="datepicker" name="end"/>
</label>
</fieldset>

<fieldset id="report_extended_state_fs">
<label>
	<span>{{I18n "State"}}</span>
	<select name="stateid" id="field_stateid">
	<option value="">{{I18n "All states"}}</option>
	{{#each status}}
	<option value="{{.}}">{{I18n .}}</option>
	{{/each}}
	</select>
</label>

<input id="submit1" type="button" name="filter" value="{{I18n "Filter"}}" class="button filter"/>
</fieldset>

</div>
</div><!--/rgrade_search -->
</div><!-- /rgrade_search_wrapper -->

<div class="filter_export_print_wrapper clearfix hide-print">
<fieldset id="report_extended_score_fs">
<label>
	<select name="scoreid" id="field_scoreid">
	{{#each scores}}
	<option value="{{.}}">{{I18n .}}</option>
	{{/each}}
	</select>
</label>
<input id="submit2" type="button" name="change_score" value="{{I18n "Change"}}" class="button change"/>
</fieldset>

<div id="back_print_excel">
<input id="submit_print" type="button" name="print" value="{{I18n "Print"}}" class="button print"/>
<input id="submit_excel" type="button" name="export" value="{{I18n "Excel Export"}}" class="button excel"/>
<a id="button_book" href="#view=book" title=""  class="button">{{I18n "Book data"}}</a>
<input id="submit_back" type="button" name="back" value="{{I18n "Back"}}" class="button back"/>
</div>

</div><!-- /filter_export_print_wrapper -->

</script>

<script type="text/javascript">
	var language = "<?php echo current_language();?>";
	
	var courseid = "<?php echo $courseid; ?>";
	var bookid = "<?php echo $bookid; ?>";

	var unitid = <?php echo json_encode($unitid); ?>;
	var studentid = "<?php echo $studentid; ?>";  
</script>

<div id="layer-grades"></div>

<!-- formulario del popup-->
<script id="content-grades-edit-partial"
	type="text/x-handlebars-template">
	{{#each contentUserData}}
	<div class="grades-content">
		<div class="user-info">
			<img alt="" class="userpicture" src="css/no-foto.jpg" />
			<h1 class="name">{{user.lastname}}, {{user.firstname}}</h1>
			{{#if grades.score}}<div class="aggregate"><em>{{I18n ../../scoreid}}</em> <strong>{{formatScore grades.score}}</strong></div>{{/if}}
		</div>

		<div class="grades clearfix">
			{{#each grades.attempts}}
				{{#if ../../studentid}}
				<table>
				<tr class="firstline">
					<td class="attempt"><em>{{I18n "Attempt"}} {{attempt}}</em></td>
					<td class="starttime">{{formatDate starttime}}</td>
					<td class="totaltime">{{formatDuration totaltime}}</td>
					<td class="grade">{{formatScore grade}}</td>
					<td class="state"><span class="{{status}}">{{I18n status}}</span></td>
					<td class="url">{{#if urlviewresults}}<a href="{{urlviewresults}}" target="_blank" title="">{{I18n "View"}}</a>{{/if}}</td>
				</tr>
				{{#if comments}}
				<tr class="secondline">
					<td class="icon">&nbsp;</td>
					<td colspan="5" class="comments">{{{comments}}}</td>
				</tr>
				{{/if}}
				</table>
				{{else}}
				<form action="#" id="formGrade{{id}}">
				<table>
				<tr class="firstline">
					<td class="attempt"><em>{{I18n "Attempt"}} {{attempt}}</em></td>
					<td class="starttime">{{formatDate starttime}}</td>
					<td class="totaltime">{{formatDuration totaltime}}</td>
					<td class="grade"><input type="text" name="grade" value="{{formatScore grade}}"/><input type="hidden" name="id" value="{{id}}"/><input type="hidden" name="touch" value=""/></td>
					<td class="state"><span class="{{status}}">{{I18n status}}</span></td>
					<td class="url">{{#if urlviewresults}}<a href="{{urlviewresults}}" target="_blank" title="">{{I18n "View"}}</a>{{/if}}</td>
				</tr>
				<tr class="secondline">
					<td class="icon">&nbsp;</td>
					<td colspan="5" class="comments"><textarea name="comments">{{comments}}</textarea></td>
				</tr>				
				</table>
				</form>
				{{/if}}
			{{/each}}
		</div>
		{{#unless ../studentid}}<a class="button disabled" disabled="disabled" id="submit_save" href="#" title="">{{I18n "Save"}}</a>{{/unless}}
	</div>
{{/each}}
</script>

<script id="content-grades-partial" type="text/x-handlebars-template">
{{#each contentUserData}}
	<div class="grades-content">
		<div class="user-info">
			<img alt="" class="userpicture" src="css/no-foto.jpg" />
			<h2 class="name">{{user.lastname}} {{user.firstname}}</h2>
			{{#if grades.score}}<div class="aggregate"><em>{{I18n ../../scoreid}}</em> <strong>{{formatScore grades.score}}</strong></div>{{/if}}
		</div>

		<div class="grades">
		{{#each grades.attempts}}
			<table>
			<tr class="firstline">
				<td class="attempt">
				{{#if ../../isUnit}}
				<a href="?type=UNIT&contentid={{../../../content.id}}}&userid={{userid}}" class="grade-edit"><em>{{I18n "Attempt"}} {{attempt}}</em></a>
				{{else}}
				<a href="?type=ACTIVITY&contentid={{activityid}}&userid={{userid}}" class="grade-edit"><em>{{I18n "Attempt"}} {{attempt}}</em></a>
				{{/if}}
				</td>
				<td class="starttime">{{formatDate starttime}}</td>
				<td class="totaltime">{{formatDuration totaltime}}</td>
				<td class="grade">{{formatScore grade}}</td>
				<td class="state"><span class="{{status}}">{{I18n status}}</span></td>
				<td class="url">{{#if urlviewresults}}<a href="{{urlviewresults}}" target="_blank" title="">{{I18n "View"}}</a>{{/if}}</td>
			</tr>
			{{#if comments}}
			<tr class="secondline">
				<td class="icon">&nbsp;</td>
				<td colspan="5" class="comments">{{{comments}}}</td>
			</tr>
			{{/if}}
			</table>
		{{/each}}
	</div>
	</div>
{{/each}}
</script>


<script id="header-grades-partial" type="text/x-handlebars-template">
<div class="grades-header clearfix">
	<div class="unit-book">
		{{#if book}}<span class="book">{{book.name}}</span>{{/if}} {{#if unit}}/ <span class="unit">{{unit.name}}</span> {{/if}}
	</div>
	{{#if content}}
		<div class="content">
			<em>{{#if unit}}<span class="activity {{activityType content.code}}">{{I18n "Activity"}}</span>{{else}}{{I18n "Unit"}}{{/if}}</em>
			<span class="title">{{content.name}}</span>
		</div>
	{{/if}}	
	<hr/>
	{{#if content}}<div class="code">{{content.code}}</div>{{/if}}
</div>
</script>

<script id="layer-edit-content-template"
	type="text/x-handlebars-template">
<a href="#" class="simplemodal-close">X</a>
{{> headerGrades}}
{{> contentGradesEdit}}
</script>

<script id="activity-template" type="text/x-handlebars-template">
<div class="activity-template">
	{{> headerGrades}}
	{{> contentGrades}}
</div>
</script>

<script id="unit-template" type="text/x-handlebars-template">
<div class="unit-template">
	<div class="grades-header clearfix">
		{{#if book.name}}
			<div class="unit-book"><span class="book">{{book.name}}</span></div>
		{{/if}}
		{{#if content}}
			<div class="content"><em>{{I18n "Unit"}}</em> <span class="title">{{content.name}}</span></div>
		{{/if}}		
	</div>

	{{#if contentUserData}}
		<div class="unit-grades titol-code clearfix">
			<span class="expand less" rel="grades-unit-{{content.id}}">&nbsp;</span>
			<h2>{{content.name}}</h2>
			<div class="code2">{{content.code}}</div>
		</div>
		<div class="grades-unit-{{content.id}}">{{> contentGrades}}</div>
	{{/if}}

	
	{{#if activities}}
	<div class="subtitle activities"><em>{{I18n "Activities"}}</em></div>
	<div class="grades">
		{{#each activities}}
			{{#if contentUserData}}
			<div class="unit-activity">
				<div class="titol-code clearfix">
					<span class="expand less" rel="grades-activity-{{content.id}}">&nbsp;</span>
					<h2><span class="activity {{activityType content.code}}">{{content.name}}</h2>
					<div class="code2">{{content.code}}</div>
				</div>
			<div class="grades-activity-{{content.id}}">
			{{> contentGrades}}
			</div>
			</div>
			{{/if}}
		{{/each}}
	</div>
	{{/if}}
</div>
</script>

<script id="book-template" type="text/x-handlebars-template">
<div class="book-template">
	<table>
		<tr class="book-info">
			<td><em>{{I18n "Book"}}</em> <span class="book">{{book.name}}</span></td>
			<td class="count">
			{{#if book.count}}<em>{{I18n "Reports"}}</em> <span class="num">{{book.count}}</span>
			{{else}}&nbsp;{{/if}}
			</td>
		</tr>
	</table>
	{{#each units}}
		<table class="unit">
			<tr class="unit-info">
				<td class="content-type">
				{{#if activities}}<span class="expand less" rel="unit-{{id}}">&nbsp;</span>{{/if}}
				<em>{{I18n "Unit"}}</em></td>
				<td><a class="title" href="#view=unit&id={{id}}" title="">{{name}}</a> <em class='code'>({{code}})</em></td>
				<td class="count">
				{{#if count}}<em>{{I18n "Reports"}}</em> <span class="num">{{count}}</span>
				{{else}}&nbsp;{{/if}}
				</td>
			</tr>
			<tr class="unit-activities">
				<td class="content-type">&nbsp;</td>
				<td><em>{{I18n "Activities"}}</em></td>
				<td class="count"><span class="num"><span class="sum-sign">&#8721;</span> {{activities_count}}</span></td>
			</tr>
			{{#each activities}}
				<tr class="activity unit-{{../id}} {{activityType code}}">
					<td class="content-type">&nbsp;</td>
					<td><a href="#view=activity&id={{id}}" title="">{{name}}</a></td>
					<td class="count">{{count}}</td>
				</tr>
			{{/each}}
		</table>
	{{/each}}

	<div class="book"><span class="book"></span></div>
</div>
</script>


<script id="student-template" type="text/x-handlebars-template">
<div class="student-template">
	<div class="user-info">
		<img alt="" class="userpicture" src="css/no-foto.jpg" />
		<h2 class="name">{{user.lastname}} {{user.firstname}}</h2>
	</div>

	{{#each book.units}}

	<div class="unit-template">
	<div class="grades-header clearfix">
		<div class="content">
		<span class="expand less" rel="grades-unit-{{id}}">&nbsp;</span>
		<em>{{I18n "Unit"}}</em>&nbsp;&nbsp;&nbsp;<span class="title">{{name}}</span>
		</div>
		<div class="code2">{{code}}</div>
	</div>

	<div class="grades-unit grades-unit-{{id}}">
		{{#if grades.attempts}}
			{{> grades}}
		{{/if}}


		{{#if activities}}
			<div class="subtitle activities"><em>{{I18n "Activities"}}</em></div>
			{{#each activities}}
				{{#if grades.attempts}}
				<div class="unit-activity">
					<div class="titol-code clearfix">
						<h2><span class="activity {{activityType code}}">{{name}}</h2>
						{{#if grades.score}}<div class="aggregate"><em>{{I18n ../../../../scoreid}}</em> <strong>{{formatScore grades.score}}</strong></div>{{/if}}			
					</div>
					<em class="code">{{code}}</em>
					{{> grades}}
				</div>
				{{/if}}
			{{/each}}
		{{/if}}
	</div> <!-- .grades-unit -->

	</div> <!-- .unit-template -->

	{{/each}}
</div>

</script>


<script id="grades-partial" type="text/x-handlebars-template">
	<div class="grades-content">
	<div class="grades">
		{{#each grades.attempts}}
			<table>
			<tr class="firstline">
				<td class="attempt">
				{{#if ../unit}}
				<a href="?type=UNIT&contentid={{../../id}}}&userid={{userid}}" class="grade-edit"><em>{{I18n "Attempt"}} {{attempt}}</em></a>
				{{else}}
				<a href="?type=ACTIVITY&contentid={{activityid}}}&userid={{userid}}" class="grade-edit"><em>{{I18n "Attempt"}} {{attempt}}</em></a>
				{{/if}}
				</td>
				<td class="starttime">{{formatDate starttime}}</td>
				<td class="totaltime">{{formatDuration totaltime}}</td>
				<td class="grade">{{formatScore grade}}</td>
				<td class="state"><span class="{{status}}">{{I18n status}}</span></td>
				<td class="url">{{#if urlviewresults}}<a href="{{urlviewresults}}" target="_blank" title="">{{I18n "View"}}</a>{{/if}}</td>
			</tr>
			{{#if comments}}
			<tr class="secondline">
				<td class="icon">&nbsp;</td>
				<td colspan="5" class="comments">{{{comments}}}</td>
			</tr>
			{{/if}}
			</table>
		{{/each}}
	</div>
	</div>
</script>

<div id="layer-unit_message">
<span><?php echo rgrade_get_string('alert_units_table');?></span>
<form id="form_hide_unit_msg" action="#"> 
	<input type="checkbox" id="hide_msg" value="1" name="hide_msg"/>
	<label for="hide_msg"><strong><?php echo rgrade_get_string('alert_units_table_hide');?></strong></label>
	<div class="container-button">
	<input type="submit" class="button" name="ok" value="<?php echo rgrade_get_string('alert_units_table_ok');?>"/>
	</div>
</form>
</div>

<div class="agraiment">
	Per gentilesa de <a href="http://www.lagaleratext.cat/"
		class="lagalera" target="_blank">Text-LaGalera</a> | <a
		href="http://projecteeso.lagaleratext.cat/static/llibres/moodle/manual_modul_120601.pdf"
		target="_blank">Manual d'usuari</a>
</div>

<?php print $OUTPUT->footer(); ?>
