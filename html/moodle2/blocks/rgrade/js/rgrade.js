/**
 * Remote contents' grades module.
 * 
 * unitid = array con las 2 últimas unidades con seguimiento
 */
function Rgrade(courseid, bookid, unitid, studentid) {

	var ACTIVITY = 'ACTIVITY';

	var UNIT = 'UNIT';

	var UNIT_AVERAGE = 'UNIT_AVERAGE';

	var UNIT_COVERAGE = 'UNIT_COVERAGE';

	var BOOK = 'BOOK';

	var BOOK_AVERAGE = 'BOOK_AVERAGE';

	var BOOK_COVERAGE = 'BOOK_COVERAGE';

	var COOKIE_NAME = "hideUnitMessage";

	// Inicializar idiomas
	I18n.init({
		lang : language
	});

	Handlebars.registerHelper('I18n', function(str) {
		return (I18n ? I18n.t(str) : str);
	});

	Handlebars.registerHelper('formatDate', function(unixTime) {
		return formatDate(unixTime);
	});

	Handlebars.registerHelper('formatDuration', function(seconds) {
		return secondsToHms(seconds);
	});

	Handlebars.registerHelper('formatScore', function(number) {
		return formatScore(number);
	});

	Handlebars.registerHelper('activityType', function(code) {
		return getActivityType(code);
	});

	/**
	 * Logs a message in the console if available.
	 * 
	 * @param msg
	 */
	function log(msg) {

		if (window.console && console.log) {
			console.log(msg);
		}

	}

	log("---");

	function check(object) {

		if (!object) {

			if (console && console.error) {
				console.error("Failed check: FalsyException");
			}

			throw {
				name : "FalsyException",
				message : "Object is falsy: null, undefined, false, 0, NaN, empty string"
			};
		}
	}

	function checkObject(object) {

		if (!object || typeof (object) !== 'object') {

			if (console && console.error) {
				console.error("Failed check: NotObjectException");
			}

			throw {
				name : "NotObjectException",
				message : "Object should be an object: plain, prototiped, array"
			};
		}
	}

	function checkArray(array) {

		if (!$.isArray(array)) {

			if (console && console.error) {
				console.error("Failed check: NotArrayException");
			}

			throw {
				name : "NotArrayException",
				message : "Object should be an array"
			};
		}
	}

	function checkArrayNonEmpty(array) {

		if (!$.isArray(array) || array.length == 0) {

			if (console && console.error) {
				console.error("Failed check: ArrayEmptyException");
			}

			throw {
				name : "ArrayEmptyException",
				message : "Object should be an array and non-empty"
			};
		}
	}

	function emptyArray(array) {

		if (!array || array.length == 0) {

			return true;
		}

		return false;
	}

	function emptySubArray(array, index) {

		if (emptyArray(array)) {
			return true;
		}

		if (!index) {
			return false;
		}

		return emptyArray(array[index]);
	}

	function isEmpty(object) {

		if (!object) {
			return true;
		}

		if ($.isArray(object)) {

			if (object.length == 0) {
				return true;
			}
		}

		return false;
	}

	function initData2(object, a, b) {

		// checkObject(object);
		// check(a);
		// check(b);

		var t1 = object[a];

		if (!t1) {
			t1 = object[a] = {};
		}

		var t2 = t1[b];

		if (!t2) {
			t2 = t1[b] = {
				attempts : []
			};
		}

		return t2;
	}

	function getData2(object, a, b) {

		// checkObject(object);
		// check(a);
		// check(b);

		var t = object[a];

		if (!t) {
			return null;
		}

		t = t[b];

		if (!t) {
			return null;
		}

		return t;
	}

	function initData1(object, a) {

		// checkObject(object);
		// check(a);

		var t = object[a];

		if (!t) {
			t = object[a] = {
				attempts : []
			};
		}

		return t;
	}

	function getData1(object, a) {

		// checkObject(object);
		// check(a);

		var t = object[a];

		if (!t) {
			return null;
		}

		return t;
	}

	function getIndex(index, a) {

		if (!a || emptyArray(index)) {
			return;
		}

		return index[a];
	}

	var tagsToReplace = {
		'&' : '&amp;',
		'<' : '&lt;',
		'>' : '&gt;'
	};

	function replaceTag(tag) {
		return tagsToReplace[tag] || tag;
	}

	function safe_tags_replace(str) {
		return str.replace(/[&<>]/g, replaceTag);
	}

	function safe_export_replace(str) {

		str = str.replace('"', " ");
		str = str.replace('\t', ' ');
		str = str.replace(';', '\;');
		str = str.replace('\r', ' | ');

		return str.replace('\n', ' | ');
	}

	function formatDate(unixTime) {

		var date = new Date(unixTime * 1000);

		var d = zeroPad(date.getDate());
		var m = zeroPad(date.getMonth() + 1);
		var h = zeroPad(date.getHours());
		var min = zeroPad(date.getMinutes());

		return d + "/" + m + "/" + date.getFullYear() + " " + h + ":" + min;
	}

	function secondsToHms(d) {

		d = Number(d);

		var h = Math.floor(d / 3600);
		var m = Math.floor(d % 3600 / 60);
		var s = Math.floor(d % 3600 % 60);

		return ((h > 0 ? h + "h:" : "") + (m > 0 ? (h > 0 && m < 10 ? "0" : "") + m + "m:" : "0m:")
				+ (s < 10 ? "0" : "") + s + "s");
	}

	function zeroPad(s) {

		var str = "" + s;
		var pad = "00";

		return pad.substring(0, pad.length - str.length) + str;
	}

	function getActivityType(code) {

		if (!code) {
			return;
		}

		var length = code.length;
		var pos = code.lastIndexOf("-");
		if (pos == -1 || pos + 1 >= length) {
			return;
		}

		var sufix = code.substring(pos + 1, length);
		if (jQuery.inArray(sufix, ['AU', 'I', 'P', 'A', 'AV']) != -1) {
			return sufix;
		}
	}

	function formatScore(score) {

		var BASE = 1.0;

		return (score * BASE).toFixed(2);
	}

	function formatStatus(status, exportCell) {
		if (exportCell) {
			return t(status);
		}
		return '<span class="' + status + '">' + t(status) + '</span>';
	}

	function indexArray(array, map) {

		if (!map) {
			map = {};
		}

		for ( var i = 0; i < array.length; i++) {
			map[array[i].id] = array[i];
		}

		return map;
	}

	/**
	 * Helper handlebars compile template
	 */
	(function($) {
		var compiled = {};

		$.fn.handlebars = function(template, data) {

			if (template instanceof jQuery) {
				template = $(template).html();
			}

			compiled[template] = Handlebars.compile(template);

			// Register partials
			Handlebars.registerPartial("headerGrades", $("#header-grades-partial").html());
			Handlebars.registerPartial("grades", $("#grades-partial").html());
			Handlebars.registerPartial("contentGrades", $("#content-grades-partial").html());
			Handlebars.registerPartial("contentGradesEdit", $("#content-grades-edit-partial").html());

			this.html(compiled[template](data));
		};

	})(jQuery);

	var t = function(key) {
		return I18n.t(key);
	};

	var url = 'rgrade_json_data.php' + window.location.search;

	var options = null;

	var def = {};

	var queryString = $.deparam.querystring();

	/**
	 * Retorna un template con el estado inicial de las opciones de filtrado. Es
	 * posible que haya una unidad y grupo por defecto.
	 * 
	 * @returns
	 */
	def.options = function() {
		return {

			groupid : queryString.groupid || null,

			studentid : studentid ? [studentid] : [],

			unitid : unitid ? unitid : [],

			stateid : null,

			begin : null,

			end : null,

			scoreid : 'AVERAGE'
		};
	};

	def.view = function() {
		return "table";
	};

	var book = {};

	var unitsIndex = {};

	var activitiesIndex = {};

	// Array of students
	var students = [];

	// Index by studentid
	var studentsIndex = {};

	// Array of groups
	var groups = [];

	// Index by groupid
	var groupsIndex = {};

	var gradeManager = null;

	var view = null;

	var currentView = null;

	if (studentid) {
		$('body').addClass('student');
	}

	jQuery.getJSON(url, function(data) {

		groups = data.groups;

		students = data.students;

		book = data.book;

		indexArray(book.units, unitsIndex);

		// Reference unit from activity
		$.each(book.units, function(index1, unit) {

			indexArray(unit.activities, activitiesIndex);

			$.each(unit.activities, function(index2, activity) {
				activity.unit = unit;
			});

		});

		indexArray(students, studentsIndex);

		indexArray(groups, groupsIndex);

		$('#rgrade_search_form').handlebars($('#search-template'), data);

		// Lazy load datepicker
		$('#rgrade_search .datepicker').one("click", function(e) {

			var datepickers = $('#rgrade_search .datepicker');
			datepickers.off("click");

			$.getScript('js/jquery-ui-1.8.18.custom.min.js', function() {

				$.datepicker.setDefaults(t('datepicker'));

				datepickers.datepicker();

				$(e.target).focus(); // Force datepicker to open
			});
		});

		// Define onchange group
		$("#field_groupid").change(function() {

			var selectOptions = "";

			function addUserOption(u) {
				selectOptions += "<option value='" + u.id + "'>" + u.lastname + " " + u.firstname + "</option>";
			}

			options.groupid = $(this).val();

			if (!options.groupid) {

				for ( var i = 0; i < students.length; i++) {
					addUserOption(students[i]);
				}

			} else {

				var uids = groupsIndex[options.groupid].studentids;
				for ( var i = 0; i < uids.length; i++) {
					addUserOption(studentsIndex[uids[i]]);
				}
			}

			$('#field_studentid').html(selectOptions);
		});

		$("#submit1, #submit2").click(function() {

			formToOptions();

			pushState({
				options : options
			}, true);

			return false;
		});

		$("#submit_back").click(function() {
			javascript: history.back();
			return false;
		});

		$("#submit_print").click(function() {
			javascript: print();
			return false;
		});

		function formToOptions() {

			options = def.options();

			options.groupid = $('#field_groupid').val();

			options.studentid = $('#field_studentid').val();

			options.unitid = $('#field_unitid').val();

			options.begin = $('#rgrade_search input[name="begin"]').val();

			options.end = $('#rgrade_search input[name="end"]').val();

			options.stateid = $('#field_stateid').val();

			options.scoreid = $('#field_scoreid').val();

		}

		function optionsToForm() {

			$('#field_groupid').val(options.groupid).change();

			$('#field_studentid').val(options.studentid);

			$('#field_unitid').val(options.unitid);

			$('#rgrade_search input[name="begin"]').val(options.begin);

			$('#rgrade_search input[name="end"]').val(options.end);

			$('#field_stateid').val(options.stateid);

			$('#field_scoreid').val(options.scoreid);

		}

		// Array is assumed
		function equalsArray(a, b) {

			checkArray(a);
			checkArray(b);

			if (a.length != b.length) {
				return false;
			}

			// var a1 = a.sort(), a2 = b.sort();

			for ( var i = 0; a[i]; i++) {

				if (a[i] != b[i]) {
					return false;
				}
			}

			return true;
		}

		function equalsShallow(a, b) {

			if (isEmpty(a) && isEmpty(b)) {
				return true;
			}

			if (a == b) {
				return true;
			}

			if ($.isArray(a)) {

				if ($.isArray(b)) {

					return equalsArray(a, b);
				}

				return false;

			} else if ($.isArray(b)) {

				return false;
			}

			// default to objects, functions...
			return false;
		}

		/**
		 * Igualdad sencilla de 1 nivel solo válida para primitivos y objetos.
		 */
		function equals(a, b) {

			if (!a && !b) {
				return true;
			}

			if (a == b) {
				return true;
			}

			if (typeof a !== 'object') {
				return false;
			}

			if (typeof b !== 'object') {
				return false;
			}

			var properties = {};

			for ( var p in a) {
				properties[p] = true;
			}

			for ( var p in b) {
				properties[p] = true;
			}

			for ( var p in properties) {

				if (!equalsShallow(a[p], b[p])) {
					return false;
				}
			}

			return true;
		}

		function filter(object) {
			for ( var i in object) {
				if (isEmpty(object[i])) {
					delete (object[i]);
				}
			}
		}

		function pushState(state, replace) {

			var state = $.extend(true, {}, state);

			if (state.options) {
				filter(state.options);
			}

			if (replace) {

				var url = window.location.toString();

				var to = $.param.fragment(url, state, 0);

				window.location.replace(to);

			} else {

				$.bbq.pushState(state);
			}

		}

		$(window).hashchange(function() {
			route($.deparam.fragment(true));
		});

		function route(state) {

			log("route ---------------------------- ");

			var views = [{
				name : "table",
				callback : ShowTable,
				excel : true,
				enable_unit : true
			}, {
				name : "book",
				callback : ShowBook,
				print : true,
				disable_book : true,
				disable_score : true
			}, {
				name : "unit",
				callback : ShowUnit,
				print : true
			}, {
				name : "activity",
				callback : ShowActivity,
				print : true
			}, {
				name : "student",
				callback : ShowStudent,
				print : true,
				enable_unit : true,
				disable_student : true,
				disable_group : true

			}];

			if (!state) {
				state = {};
			}

			if (!state.options) {
				state.options = def.options();
			}

			if (!state.view) {
				state.view = def.view();
			}

			if (!options) {

				log("options: initial");

				// Caso inicial
				options = state.options;

				optionsToForm();

			} else if (!equals(state.options, options)) {

				log("options: unequal");

				// En el resto de casos tiene prioridad la configuración actual
				pushState({
					options : options
				}, true);

				return;
			}

			var reload = (!view || (view === state.view));

			view = state.view;

			log("route, reload: " + reload);

			$.each(views, function(index1, v) {

				if (v.name === state.view) {

					currentView = v;

					v.callback(state, reload, function() {
						$("#footer").show();
						$("div.agraiment").show();
					});

					callbackUpdateSearch(v);

					return false; // break
				}
			});
		}

		// Procesamos el estado inicial
		$(window).hashchange();

		alertUnitsTable();
	});

	function scrollTableHeader() {

		var tableHeader = $('#rgrade_table .top');
		var columnHeader = $("#column-header");

		if (tableHeader.size() == 0) {
			return;
		}

		var originalTop = tableHeader.offset().top;
		var originalLeft = columnHeader.offset().left;

		$(window).scroll(function() {

			var scrollTop = $(window).scrollTop();
			var position = tableHeader.css("position");

			if (scrollTop > originalTop && position != 'fixed') {
				tableHeader.css("top", "0");
				tableHeader.css("left", originalLeft);
				tableHeader.css("position", "fixed");
			}

			else if (scrollTop <= originalTop && position == 'fixed') {
				tableHeader.css("position", "static");
			}
		});

		$(window).resize(function() {
			originalLeft = columnHeader.offset().left;
			tableHeader.css("left", originalLeft);
		});

	}

	function alertUnitsTable() {

		if (view != 'table' || $.cookie(COOKIE_NAME)) {
			return false;
		}

		$("#layer-unit_message").modal({
			overlayClose : true,

			minHeight : 140
		});

		$("#form_hide_unit_msg").submit(function() {

			if ($("#hide_msg").is(':checked')) {
				$.cookie(COOKIE_NAME, true);
			}

			$.modal.close();
			return false;
		});
	}

	function callbackUpdateSearch(v) {

		if (v.excel) {
			$('#submit_excel').show();
		} else {
			$('#submit_excel').hide();
		}

		if (v.enable_unit) {
			$('#field_unitid').removeAttr('disabled');
		} else {
			$('#field_unitid').attr('disabled', 'disabled');
		}

		// Fix BUG Chrome color option selected in select multiple disabled
		$('#field_unitid option').css("color", v.enable_unit ? "" : "#ccc");

		if (v.print) {
			$('#submit_print').show();
		} else {
			$('#submit_print').hide();
		}

		if (v.disable_book) {
			$('#button_book').hide();
		} else {
			$('#button_book').show();
		}

		if (v.disable_score) {
			$('#report_extended_score_fs').hide();
		} else {
			$('#report_extended_score_fs').show();
		}

		if (v.disable_student) {
			$('#field_studentid').attr('disabled', 'disabled');
		} else {
			$('#field_studentid').removeAttr('disabled');
		}

		if (v.disable_group) {
			$('#field_groupid').attr('disabled', 'disabled');
		} else {
			$('#field_groupid').removeAttr('disabled');
		}
	}

	function ShowTable(args, forceReload, onload) {

		var table = null;

		var cols = [];

		var rows = [];

		/**
		 * Add all the rows for a unit, including average, coverage and indivual
		 * results for its activities.
		 * 
		 * @properties rows
		 * 
		 */
		function addUnitToTable(unit) {

			rows.push({
				title : "<a href='#view=unit&amp;id=" + unit.id + "'>" + unit.name + "</a>",
				exportTitle : safe_export_replace(unit.name),
				css : 'unit main',
				unit : unit,
				type : UNIT
			});

			rows.push({
				title : t("Activities Average"),
				exportTitle : t("Activities Average"),
				css : 'unit average',
				unit : unit,
				type : UNIT_AVERAGE
			});

			rows.push({
				title : t("Activities Coverage"),
				exportTitle : t("Activities Coverage"),
				css : 'unit coverage',
				unit : unit,
				type : UNIT_COVERAGE
			});

			// Actividades de la unidad
			var activities = unit.activities;
			for ( var i in activities) {

				var activity = activities[i];

				rows.push({
					title : "<a class='partial' href='#view=activity&amp;id=" + activity.id + "'>" + activity.name
							+ "</a>",
					exportTitle : safe_export_replace(activity.name) + " (" + safe_export_replace(activity.code) + ")",
					activity : activity,
					css : "activity " + getActivityType(activity.code),
					type : ACTIVITY
				});
			}

		} // addUnitToTable

		/**
		 * Callback para cada celda de la tabla.
		 * 
		 * @properties gradeManager
		 * 
		 */
		function displayCell(row, col, i, j, exportCell) {

			var activityUserData = gradeManager.activityUserData;

			var unitUserData = gradeManager.unitUserData;

			// checkObject(row);
			// checkObject(col);
			// checkObject(col.student); // by now
			var student = col.student;

			var cell = "";

			if (row.activity) {

				var activity = row.activity;

				var aud = getData2(activityUserData, activity.id, col.student.id);

				if (!aud) {
					cell = '---';
				} else if (aud.status) {
					cell = formatStatus(aud.status, exportCell);
				} else {
					cell = formatScore(aud.score);
				}
			} // activity case

			else if (row.unit) {

				var unit = row.unit;

				var uud = getData2(unitUserData, unit.id, student.id);

				if (row.type === UNIT) {

					if (!uud || (!uud.status && !uud.score)) {
						cell = '---';
					} else if (uud.status) {
						cell = formatStatus(uud.status, exportCell);
					} else {
						cell = formatScore(uud.score);
					}

				} else if (row.type === UNIT_AVERAGE) {

					if (!uud || !uud.aggregate) {
						cell = '---';
					} else {
						cell = formatScore(uud.aggregate.score);
					}

				} else if (row.type === UNIT_COVERAGE) {

					if (!uud || !uud.aggregate) {
						cell = '---';
					} else {
						cell = ((uud.aggregate.count / unit.activities.length) * 100).toFixed(1) + "%";
					}

				}

			} // unit case

			return cell;
		}

		function dataExport() {

			var data = '" "';

			for ( var i = 0; i < cols.length; i++) {
				data += ';"' + cols[i].exportTitle + '"';
			}
			data += '\r\n';

			for ( var i = 0; i < rows.length; i++) {

				data += '"' + rows[i].exportTitle + '"';

				for ( var j = 0; j < cols.length; j++) {

					var cell = displayCell(rows[i], cols[j], i, j, true);
					cell = cell || '';

					if (typeof cell === 'number') {
						cell = cell.toString();
					}

					// Low cost localization of numbers
					cell = cell.replace(".", ",");

					data += ';' + cell + '';
				}

				data += '\r\n';
			}

			return data;

		} // dataExport

		function showTable(nop) {

			for ( var i = 0; i < options.unitid.length; i++) {

				var unit = unitsIndex[options.unitid[i]];

				addUnitToTable(unit);
			}

			var students = getSelectedStudents();

			jQuery.each(students, function(nop, sid) {

				var student = studentsIndex[sid];

				cols.push({
					title : "<p class='lastname'>" + safe_tags_replace(student.lastname) + "</p><p class='name'>"
							+ safe_tags_replace(student.firstname) + "</p>",
					exportTitle : safe_export_replace(student.lastname) + " " + safe_export_replace(student.firstname),
					student : student
				});
			});

			table = Table('#combo', cols, rows, displayCell, rowOnClick);

			$("#submit_excel").unbind().click(function() {

				$("#combo-export textarea[name='table']").val(dataExport());

				$('#combo-export').submit();
			});

			if (onload) {
				onload();
			}
		}

		if (!gradeManager || forceReload) {
			gradeManager = GradeManager(options, showTable);
		} else {
			showTable();
		}

	} // ShowTable

	function rowOnClick(row, col, precheck) {

		var contentUserData = null;
		var content = null;

		if (row.type === ACTIVITY) {

			contentUserData = gradeManager.activityUserData;
			content = row.activity;

		} else if (row.type === UNIT) {

			contentUserData = gradeManager.unitUserData;
			content = row.unit;

		} else {
			return false;
		}

		// No data: no do
		if (!content || emptySubArray(contentUserData, content.id)) {
			return false;
		}

		if (emptySubArray(contentUserData[content.id][col.student.id], "attempts")) {
			return false;
		}

		if (precheck) {
			return true;
		}

		var data = dataLayerGrades(contentUserData, content, col.student);
		if (data && row.type === ACTIVITY) {
			data.unit = content.unit;
		}

		openLayerGrades(data, null);
	}

	function gradeOnClick(contentid, studentid, type, args) {

		if (type === ACTIVITY) {
			contentUserData = gradeManager.activityUserData;
			content = activitiesIndex[contentid];

		} else if (type === UNIT) {
			contentUserData = gradeManager.unitUserData;
			content = unitsIndex[contentid];

		} else {
			return false;
		}

		var data = dataLayerGrades(contentUserData, content, studentsIndex[studentid]);
		openLayerGrades(data, args);
	}

	function dataLayerGrades(contentUserData, content, student) {

		if (!content || emptySubArray(contentUserData, content.id)) {
			return null;
		}

		var ud = contentUserData[content.id][student.id];
		if (emptySubArray(ud, "attempts")) {
			return null;
		}

		var data = {
			scoreid : options.scoreid,
			book : book,
			content : content,
			studentid : studentid,
			contentUserData : [{
				user : student,
				grades : ud
			}]
		};

		if (content.unit) {
			data.unit = content.unit;
		}

		return data;
	}

	function openLayerGrades(data, args) {

		if (!data) {
			return;
		}

		var reload = false;

		$('#layer-grades').handlebars($('#layer-edit-content-template'), data);

		$('#layer-grades').modal({
			overlayClose : true,
			focus : false,
			minHeight : 400,
			minWidth : 800,
			onClose : function(dialog) {

				log("onClose dialog, reload: " + reload);

				if (existsFormTouched() && !confirm(t('Confirm unsaved data'))) {
					// Solve simplemodal bug - rebinding the events
					this.bindEvents();
					this.occb = false;
					this.overlayClose = true;
					return;
				}

				$.modal.close();

				if (reload && currentView) {
					log("Reload view " + currentView.name);
					currentView.callback(args, true, function() {});
				}

			}
		});

		// Solve simplemodal bug - rebinding handler
		$('#layer-grades').on('click', '.simplemodal-close', function(e) {
			log("Closing simpleModal ...");
			$.modal.close();

			return false;
		});

		/*
		 * Getter y Setter del touch de un formulario (idem jquery val()). Si
		 * sólo recibe un parámetro devuelve el valor actual y si dos setea la
		 * propiedad con el segundo.
		 * 
		 * Un formulario con touch = 1 indica que alguna de sus propiedades
		 * persistentes se ha modificado y no se ha submiteado.
		 */
		function touch(form) {
			var input = form.find("input[name='touch']");
			if (arguments.length == 2) {
				input.val(arguments[1]);
				return;
			}

			return input.val();
		}

		/*
		 * Indica si algún formulario está modificado y pendiente de enviar
		 */
		function existsFormTouched() {
			var touched = false;

			$("#layer-grades form").each(function() {
				touched = touched || touch($(this));
			});

			return touched;
		}

		/*
		 * Actualizar touch cuando los campos grade y comments se modifiquen
		 */
		$('#layer-grades input[name="grade"], #layer-grades textarea[name="comments"]').change(function() {
			var form = $(this).parents("form");
			touch($(form), 1);

			$("#submit_save").removeAttr('disabled');
			$("#submit_save").removeClass("disabled");

			return false;

		});

		/*
		 * Evitar que se envíen los formularios con enter en input
		 */
		$('#layer-grades form').submit(function() {
			return false;
		});

		/*
		 * Submit de todos los formularios
		 */
		$("#submit_save").click(function() {
			if (!existsFormTouched()) {
				return false;
			}

			var button = $(this);

			button.attr('disabled', 'disabled');
			button.addClass("disabled");

			var forms = $(this).parents("#layer-grades .grades-content").find('form');
			forms.each(function() {

				var form = $(this);

				if (!touch(form)) {
					return true; // Continue;
				}

				var formData = form.serialize();
				formData += "&courseid=" + courseid;

				$.post("rgrade_json_update_grade.php", formData, function(data) {

					if (data.error) {
						alert(data.message);
						return false;
					}

					// Reset touch
					touch(form, '');

					reload = true;

					// Los formularios se han enviado OK si !existsFormTouched
					if (!existsFormTouched()) {
						log("Cerrando después del save");

						if (reload && currentView) {
							log("Reload view " + currentView.name);
							currentView.callback(args, true, function() {});
						}

						$.modal.close();
					}
				});

			});

			return false;
		}); // $("#submit_save").click

	} // openLayerGrades

	function showNoData() {
		$("#combo").html("<p>NO DATA</p>");
	}

	function toogleTableInfo(element) {

		$("#rgrade_table ." + element.attr("rel")).toggle();
		element.toggleClass("less");

		return false;
	}

	function ShowBook(args, forceReload, onload) {

		function templateDataUnit(data, templateData, unit) {

			var content = unitsIndex[unit];
			if (!content) {
				return;
			}

			var unitData = {
				"id" : unit,
				"name" : content['name'],
				"code" : content['code'],
				"activities_count" : 0,
				"activities" : []
			};

			for ( var activity in data[unit]) {

				// Unidad
				if (activity == 0 && data[unit][0] != 0) {
					unitData['count'] = data[unit][0];
				} else {
					var content = activitiesIndex[activity];
					if (!content) {
						continue;
					}

					var activityData = {
						"id" : activity,
						"name" : content['name'],
						"code" : content['code'],
						"count" : data[unit][activity]
					};

					unitData['activities_count'] += data[unit][activity];

					unitData['activities'].push(activityData);
				}
			}

			templateData['units'].push(unitData);
		}

		function showBook() {

			var book_args = {
				"courseid" : courseid,
				"bookid" : bookid,
				"groupid" : options.groupid || "",
				"begin" : options.begin || "",
				"end" : options.end || "",
				"stateid" : options.stateid || "",
				"studentid" : options.studentid
			};

			jQuery.getJSON("rgrade_json_counts.php", book_args, function(data) {

				if (data.error) {
					log("Error: " + data.message);
					return;
				}

				var templateData = {
					"book" : {
						name : book.name
					},
					"units" : []
				};

				for ( var unit in data) {

					if (unit == 0) { // Book
						templateData['book']['count'] = data[unit][0];

					} else {
						templateDataUnit(data, templateData, unit);
					}
				}

				$("#combo").handlebars($('#book-template'), templateData);

				$(".book-template span.expand").click(function() {
					return toogleTableInfo($(this));
				});

				if (onload) {
					onload();
				}
			});

			if (forceReload) {
				log("Invalidating Grademanager");
				gradeManager = null;
			}
		}

		showBook();
	}

	function ShowUnit(args, forceReload, onload) {

		function showUnit(gradeManager) {

			// Intentos de unidad
			var unitData = getContentDataTemplate(gradeManager.unitUserData, unit);

			unitData.book = book;
			unitData.activities = [];
			unitData.isUnit = true;

			// Intentos por actividad
			for ( var i = 0; i < unit.activities.length; i++) {

				var activityData = getContentDataTemplate(gradeManager.activityUserData, unit.activities[i]);

				if (!activityData) {
					continue;
				}

				unitData.activities.push(activityData);
			}

			$("#combo").handlebars($('#unit-template'), unitData);

			$('#combo').on('click', 'a.grade-edit', function(e) {

				var queryString = $.deparam.querystring($(this).attr("href"));

				gradeOnClick(queryString['contentid'], queryString['userid'], queryString['type'], args);

				return false;
			});

			$(".unit-template span.expand").click(function() {
				return toogleTableInfo($(this));
			});

			if (onload) {
				onload();
			}
		}

		var unit = getIndex(unitsIndex, args.id);

		if (!unit) {
			showNoData();
			return;
		}

		var dataCallback;

		if (!hasUnit(unit.id, options.unitid)) {

			var loptions = $.extend(true, {}, options);
			loptions.unitid = [unit.id];

			GradeManager(loptions, showUnit);

			dataCallback = function nop() {};

		} else {

			dataCallback = showUnit;
		}

		if (!gradeManager || forceReload) {
			gradeManager = GradeManager(options, dataCallback);
		} else {
			dataCallback(gradeManager);
		}
	}

	function hasUnit(a, b) {

		if (!a || !b) {
			return false;
		}

		for ( var i = 0; i < b.length; i++) {
			if (a == b[i]) {
				return true;
			}
		}

		return false;
	}

	function ShowActivity(args, forceReload, onload) {

		function showActivity(gradeManager) {

			var data = getContentDataTemplate(gradeManager.activityUserData, activity);

			data.unit = activity.unit;
			data.book = book;

			$("#combo").handlebars($('#activity-template'), data);

			$('#combo').on('click', 'a.grade-edit', function(e) {

				var queryString = $.deparam.querystring($(this).attr("href"));

				gradeOnClick(queryString['contentid'], queryString['userid'], queryString['type'], args);

				return false;
			});

			if (onload) {
				onload();
			}
		}

		var activity = getIndex(activitiesIndex, args.id);

		if (!activity) {
			showNoData();
			return;
		}

		var dataCallback;

		if (!hasUnit(activity.unit.id, options.unitid)) {

			var loptions = $.extend(true, {}, options);
			loptions.unitid = [activity.unit.id];

			GradeManager(loptions, showActivity);

			dataCallback = function nop() {};

		} else {

			dataCallback = showActivity;
		}

		if (!gradeManager || forceReload) {
			gradeManager = GradeManager(options, dataCallback);
		} else {
			dataCallback(gradeManager);
		}

	}

	/**
	 * Devuelve un objeto, utilizado en los templates de presentación, con una
	 * referencia al contenido y un array con todos los intentos agrupados por
	 * usuario.
	 * 
	 * Sólo contiene los intentos de los alumnos definidos en options.
	 * 
	 * NO retorna NULL
	 * 
	 * @property studentsIndex
	 * 
	 * @param contentUserData
	 *            (activityUserData o unitUserData)
	 * @param content
	 *            (activity o unit)
	 */
	function getContentDataTemplate(contentUserData, content) {

		var templateData = {
			scoreid : options.scoreid,
			content : content,
			studentid : studentid,
			contentUserData : []
		};

		if (!content || emptySubArray(contentUserData, content.id)) {
			return templateData;
		}

		var students = getSelectedStudents();

		jQuery.each(students, function(nothing, sid) {

			var cd = contentUserData[content.id];
			var student = studentsIndex[sid];

			if (!student || !cd || emptySubArray(cd[student.id], "attempts")) {
				return;
			}

			templateData.contentUserData.push({
				user : student,
				grades : cd[student.id]
			});
		});

		return templateData;
	}

	function getSelectedStudents() {

		var students = options.studentid;

		// If no students selected, assume all students in the select box
		// are selected
		if (isEmpty(students)) {
			students = $('#field_studentid option').map(function() {
				return $(this).val();
			});
		}

		return students;
	}

	function Table(id, cols, rows, displayCell, onClick) {

		var t1 = new Date().getTime();

		var table = $(id);

		var p1 = '<div class="shadow"></div><div class="top"><div class="row-header-wrapper"><table id="row-header"><tbody><tr>';

		var row_header = '';

		for ( var i = 0; i < cols.length; i++) {
			row_header += '<td><a class="partial" href="#view=student&amp;id=' + cols[i].student.id + '">'
					+ cols[i].title + '</a></td>';
		}

		var p2 = '</tr></tbody></table></div></div>';

		var p3 = '<div class="bottom"><div class="column-header-wrapper"><table id="column-header"><tbody>';

		var col_header = '';

		for ( var i = 0; i < rows.length; i++) {
			var css = rows[i].css || '';
			col_header += '<tr class="' + css + '"><td>' + rows[i].title + '</td></tr>';
		}

		var p4 = '</tbody></table></div>';

		var p5 = '<div class="data-wrapper"><table id="data"><tbody>';

		var sdata = '';

		// Accedemos por ahora como Arrays simples
		for ( var i = 0; i < rows.length; i++) {

			var css = rows[i].css || '';
			sdata += '<tr class="' + css + '">';

			for ( var j = 0; j < cols.length; j++) {

				var cell = displayCell(rows[i], cols[j], i, j);

				var click = '';

				if (onClick(rows[i], cols[j], true)) {
					click = 'clickable';
				}

				cell = cell || '';

				sdata += '<td class="' + click + '">' + cell + '</td>';
			}

			sdata += '</tr>';
		}

		var p6 = '</tbody></table></div></div>';

		var all = new Array(p1, row_header, p2, p3, col_header, p4, p5, sdata, p6);

		table.html(all.join(''));

		var t2 = new Date().getTime();

		log("Table creation time (ms): " + (t2 - t1));

		var w1 = $($(".row-header-wrapper").get(0));

		$(".data-wrapper").scroll(function(e) {
			w1.scrollLeft($(this).scrollLeft());
		});

		scrollTableHeader();

		if (onClick) {

			$('#data').on('click', 'td', function(e) {

				var td = $(e.target);

				if (!td.is('td')) {
					td = td.parent('td');
				}

				var tr = td.parent();

				var j = tr.children().index(td);

				var i = tr.parent().children().index(tr);

				onClick(rows[i], cols[j]);
			});
		}

	} // Table

	function ShowStudent(args, forceReload, onload) {

		function showStudent(gradeManager) {

			var data = {
				user : student,
				scoreid : options.scoreid,
				book : {
					id : book.id,
					name : book.name,
					units : []
				}
			};

			for ( var uid in gradeManager.unitUserData) {

				var u = getIndex(unitsIndex, uid);

				var unit = {
					id : u.id,
					unit : true,
					name : u.name,
					code : u.code,
					grades : gradeManager.unitUserData[uid][student.id],
					activities : []
				};

				for ( var i = 0; i < u.activities.length; i++) {
					var a = u.activities[i];

					if (!gradeManager.activityUserData[a.id] || !gradeManager.activityUserData[a.id][student.id]) {
						continue;
					}

					unit.activities.push({
						id : a.id,
						name : a.name,
						code : a.code,
						grades : gradeManager.activityUserData[a.id][student.id]
					});
				}

				if (!emptySubArray(unit.grades, 'attempts') || !emptyArray(unit.activities)) {
					data.book.units.push(unit);
				}
			}

			$("#combo").handlebars($('#student-template'), data);

			$('#combo').on('click', 'a.grade-edit', function(e) {

				var queryString = $.deparam.querystring($(this).attr("href"));

				gradeOnClick(queryString['contentid'], queryString['userid'], queryString['type'], args);

				return false;
			});

			$(".unit-template span.expand").click(function() {
				return toogleTableInfo($(this));
			});

			if (onload) {
				onload();
			}
		}

		var student = getIndex(studentsIndex, args.id);

		if (!student) {
			showNoData();
			return;
		}

		var dataCallback = showStudent;

		if (!gradeManager || forceReload) {
			gradeManager = GradeManager(options, dataCallback);
		} else {
			dataCallback(gradeManager);
		}

	}

	function GradeManager(options, onload) {

		// Raw attempt data from datasource by unitid
		var unitsData;

		// Processed attempts data by activity and user
		var activityUserData = {};

		// Processed attempts data by unit and user
		var unitUserData = {};

		// Processed attempts by user
		var bookUserData = {};

		/**
		 * Process attempt based on current user-activity status. Grading data
		 * must be given order by attempt number (asc).
		 * 
		 * @param grade
		 * @param data
		 * 
		 * @properties options.scoreid
		 * 
		 */
		function processAttempt(grade, data) {

			if (!data) {
				die("Data cannot be empty at this point");
			}

			data.attempts.push(grade);
			var n = data.attempts.length;

			var score = grade.grade;
			var attempt = grade.attempt;

			// Unknown semantics
			if (!grade.status || grade.status === 'NO_INICIADO' || grade.status === 'INCOMPLETO') {
				return;
			}

			// Score ignored
			if (grade.status === 'POR_CORREGIR') {
				data.status = 'POR_CORREGIR';
				data.current = grade;
				return;
			}

			// Status: finalizado corregido
			// Unspecified semantics for null/undefined score

			delete (data.status); // Unset status: only score

			if (!data.score) {
				data.score = 0;
			}

			var method = options.scoreid;

			if (method === 'AVERAGE') {
				data.score = ((data.score) * (n - 1) + score) / n;
				data.current = null;
			}

			if (method === 'BEST_ATTEMPT') {
				if (score > data.score) {
					data.score = score;
					data.current = grade;
				}
			}

			if (method === 'FIRST_ATTEMPT') {
				if (!data.current) {
					data.score = score;
					data.current = grade;
				}
			}

			if (method === 'LAST_ATTEMPT') {
				data.score = score;
				data.current = grade;
			}
		} // processAttempt

		/**
		 * Rellena las tablas intermedias y agrega los datos de las unidades.
		 * 
		 * @param unit
		 * @properties unitsData, activityUserData, unitUserData, bookUserData
		 * 
		 * @returns
		 */
		function processData(unit) {

			if (!unit) {

				log("Warning processData: Parameter unit required");

				return;
			}

			log("Processing unit: " + unit.id);

			var ud = unitsData[unit.id];

			if (!ud) {
				return; // No data to process
			}

			checkArray(ud);

			log("Total input attempts: " + ud.length);

			for ( var i = 0, total = ud.length; i < total; i++) {

				var grade = ud[i];

				var data;

				if (grade.activityid && grade.activityid != 0) {

					data = initData2(activityUserData, grade.activityid, grade.userid);

				} else if (unit.id && unit.id != 0) {

					data = initData2(unitUserData, unit.id, grade.userid);

				} else {
					data = initData1(bookUserData, grade.userid);
				}

				processAttempt(grade, data);
			}

			/*
			 * Next: Aggregate data looping activityUserData
			 */
			jQuery.each(unit.activities, function(nothing, activity) {

				var aid = activity.id;

				var aud = activityUserData[aid];

				if (!aud) {
					return;
				}

				for ( var uid in aud) {

					var data = aud[uid];

					if (!data) {
						die("Data could not be falsy");
					}

					var uud = initData2(unitUserData, unit.id, uid);

					if (!uud.aggregate) {
						uud.aggregate = {
							count : 0,
							score : 0
						};
					}

					var score = 0;

					if (!data.status && typeof data.score === 'number') {
						score = data.score;
					}

					var n = ++uud.aggregate.count; // Also for coverage
					uud.aggregate.score = ((uud.aggregate.score) * (n - 1) + score) / n;

				}
			});

		} // processData

		function load(options, onload) {

			log("Loading json raw data");

			if (!options || !options.unitid) {
				return;
			}

			var grades_pars = {
				"courseid" : courseid,
				"bookid" : bookid,
				"unitid[]" : options.unitid,
				"begin" : options.begin || "",
				"end" : options.end || "",
				"stateid" : options.stateid || ""
			};

			jQuery.getJSON("rgrade_json_grades.php", grades_pars, function(data) {

				if (data.error) {
					log("Error: " + data.message);
					return;
				}

				// Maybe extend in a future
				unitsData = data;

				for ( var i = 0; i < options.unitid.length; i++) {
					var unit = unitsIndex[options.unitid[i]];
					processData(unit);
				}

				if (onload) {
					onload(instance);
				}

			});

		} // load

		var instance = {

			activityUserData : activityUserData,
			unitUserData : unitUserData,
			bookUserData : bookUserData

		};

		load(options, onload);

		return instance;

	} // GradeManager
};

// Parámetros mínimos: curso y libro
Rgrade(courseid, bookid, unitid, studentid);
