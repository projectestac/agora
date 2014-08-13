var I18n = {
	init : function(options) {
		lang = options.lang;
		
		if(lang != 'ca' && lang != 'es') {
			lang : 'en';
		}
	},

	t : function(key) {

		if (!key || !this.messages) {
			return key;
		}

		if (arguments.length == 2) {
			msg = this.messages[lang][arguments[1]][key];
		} else {
			msg = this.messages[lang][key];
		}

		if (!msg) {
			return key;
		}

		return msg;
	},

	lang : "en",

	messages : {

		"en" : {
			"Confirm unsaved data" : "You have unsaved changes that will be lost if you close the window.\nAre you sure?",
			"Data saved" : "Changes has been saved successfully.",
			"All options" : "All",
			"All states" : "All states",
			"Group" : "Group",
			"Students" : "Students",
			"Units" : "Units",
			"State" : "State",
			"INCOMPLETO" : "Incomplete",
			"FINALIZADO" : "Completed",
			"POR_CORREGIR" : "Pending",
			"CORREGIDO" : "Corrected",
			"AVERAGE" : "Average",
			"BEST_ATTEMPT" : "Best attempt",
			"LAST_ATTEMPT" : "Last attempt",
			"FIRST_ATTEMPT" : "First attempt",
			"Begin" : "Begin",
			"End" : "End",
			"Filter" : "Filter",
			"Score" : "Score",
			"Change" : "Change",
			"Unit" : "Unit",
			"Activity" : "Activity",
			"Average" : "Average",
			"Attemp" : "Attemp",
			"View/Correct" : "View/Correct",
			"Save" : "Save",
			"View" : "View",
			"datepicker" : {
				dateFormat : 'dd/mm/yy' // unificamos formato a dd/mm/yyyy
			}
		},
		"ca" : {
			"Confirm unsaved data" : "Tens canvis en el formulari que encara no s'han salvat i si tanques la finestra es perdran.\nVols tancar-la?",
			"Data saved" : "Les dades s'han desat correctament",
			"All options" : "Tots",
			"All states" : "Tots els estats",
			"Group" : "Grup",
			"Students" : "Alumnes",
			"Units" : "Unitats",
			"State" : "Estat",
			"NO_INICIADO" : "No iniciat",
			"INCOMPLETO" : "Incomplet",
			"FINALIZADO" : "Finalitzat",
			"POR_CORREGIR" : "Per corregir",
			"CORREGIDO" : "Corregit",
			"AVERAGE" : "Mitjana d'intents",
			"BEST_ATTEMPT" : "Millor intent",
			"LAST_ATTEMPT" : "Últim intent",
			"FIRST_ATTEMPT" : "Primer intent",
			"Begin" : "Inici",
			"End" : "Fi",
			"Filter" : "Filtra",
			"Score" : "Puntuació",
			"Change" : "Canvia",
			"Excel Export" : "Exporta",
			"Back" : "Torna",
			"Print" : "Imprimeix",
			"Activities Average" : "Mitjana d'activitats",
			"Activities Coverage" : "Percentatge d'activitats",
			"Attempt" : "Intent",
			"View/Correct" : "Visualitza/Actualitza",
			"Unit" : "Unitat",
			"Activities" : "Activitats",
			"Activity" : "Activitat",
			"View" : "Visualitza",
			"Unit Report" : "Informe d'unitat",
			"Save" : "Desa",
			"Book" : "Llibre",
			"Reports" : "Informes",
			"Book data" : "Informes llibre",
			"datepicker" : {
				monthNames : ['Gener', 'Febrer', 'Març', 'Abril', 'Maig', 'Juny', 'Juliol', 'Agost', 'Septembre',
						'Octubre', 'Novembre', 'Decembre'],
				closeText : 'Tancar',
				prevText : '&#x3c;Ant',
				nextText : 'Seg&#x3e;',
				currentText : 'Avui',
				monthNamesShort : ['Gen', 'Feb', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Des'],
				dayNames : ['Diumenge', 'Dilluns', 'Dimarts', 'Dimecres', 'Dijous', 'Divendres', 'Dissabte'],
				dayNamesShort : ['Dug', 'Dln', 'Dmt', 'Dmc', 'Djs', 'Dvn', 'Dsb'],
				dayNamesMin : ['Dg', 'Dl', 'Dt', 'Dc', 'Dj', 'Dv', 'Ds'],
				weekHeader : 'Sm',
				dateFormat : 'dd/mm/yy',
				firstDay : 1,
				isRTL : false,
				showMonthAfterYear : false,
				yearSuffix : ''
			}
		},
		"es" : {
			"Confirm unsaved data" : "Tiene cambios en el formulario que no se han salvado, si cierra la ventana los perderá.\nQuiere cerrarla?",
			"Data saved" : "Los datos se han guardado correctamente.",
			"All options" : "Todas",
			"All states" : "Todos los estados",
			"Group" : "Grupo",
			"Students" : "Estudiantes",
			"Units" : "Unidades",
			"State" : "Estado",
			"NO_INICIADO" : "No iniciado",
			"INCOMPLETO" : "Incompleto",
			"FINALIZADO" : "Finalizado",
			"POR_CORREGIR" : "Por corregir",
			"CORREGIDO" : "Corregido",
			"AVERAGE" : "Media de intentos",
			"BEST_ATTEMPT" : "Mejor intento",
			"LAST_ATTEMPT" : "Último intento",
			"FIRST_ATTEMPT" : "Primer intento",
			"Begin" : "Inicio",
			"End" : "Fin",
			"Filter" : "Filtra",
			"Score" : "Puntuación",
			"Change" : "Cambia	",
			"Excel Export" : "Exporta",
			"Back" : "Vuelve",
			"Print" : "Imprime",
			"Activities Average" : "Media de actividades",
			"Activities Coverage" : "Porcentaje de actividades",
			"Attempt" : "Intento",
			"View/Correct" : "Visualiza/Actualiza",
			"Unit" : "Unidad",
			"Activities" : "Actividades",
			"Activity" : "Actividad",
			"View" : "Visualiza",
			"Unit Report" : "Informe de unidad",
			"Save" : "Guarda",
			"Book" : "Libro",
			"Reports" : "Informes",
			"Book data" : "Informes libro",
			"datepicker" : {
				closeText : 'Cierra',
				prevText : '&#x3c;Ant',
				nextText : 'Sig&#x3e;',
				currentText : 'Hoy',
				monthNames : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
						'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort : ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
				dayNames : ['Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'S&aacute;bado'],
				dayNamesShort : ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'S&aacute;b'],
				dayNamesMin : ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'S&aacute;'],
				weekHeader : 'Sm',
				dateFormat : 'dd/mm/yy',
				firstDay : 1,
				isRTL : false,
				showMonthAfterYear : false,
				yearSuffix : ''
			}
		}
	}

};
