function get_firstchild(n){
	x=n.firstChild;
	while (x.nodeType!=1){
		x=x.nextSibling;
	}
	return x;
}

innerHTML = '<p style="padding: 5px; white-space: nowrap;">'+
'<b>Warning!</b> WIRIS editor for Moodle seems not to be correctly installed: the component WIRIS filter for Moodle is missing.'+
' Please, visit <a target="_blank" href="http://www.wiris.com/plugins/docs/moodle/troubleshooting?url='+encodeURI(location.href)+
'#missing-filter">the following page to get further help <img style="vertical-align: -3px;" alt="" src="https://www.wiris.com/system/files/attachments/1689/WIRIS_manual_icon_17_17.png"></a></p>';

var div = document.createElement('div');
div.style.backgroundColor = '#FF878D';
div.style.height = '25px';
div.innerHTML = innerHTML;
var bodyFirstChild = get_firstchild(document.body);
bodyFirstChild.parentNode.insertBefore(div, bodyFirstChild);
