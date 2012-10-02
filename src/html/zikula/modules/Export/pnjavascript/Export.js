function CheckAllBoxes() {
	for (var i=0;i<document.modules_form.elements.length;i++) {
		var e = document.modules_form.elements[i];
		if (e.type=='checkbox' && e.name=='modules_selected[]')
			e.checked = true;
	}
}

function UnCheckAllBoxes() {
	for (var i=0;i<document.modules_form.elements.length;i++) {
		var e = document.modules_form.elements[i];
		if (e.type=='checkbox' && e.name=='modules_selected[]')
			e.checked = false;
	}
}
