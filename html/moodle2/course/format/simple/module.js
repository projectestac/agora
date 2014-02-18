
M.format_simple = {};

M.format_simple.init = function(Y, icons) {
	Y.on('change', M.format_simple.setIcon, '#id_default_image');
	
	M.format_simple.icons = icons;
	
	M.format_simple.setIcon();
	
};

M.format_simple.setIcon = function(e){
	var img = document.getElementById("id_default_image").value;
	document.getElementById("def_img").src = M.format_simple.icons[img];
}
