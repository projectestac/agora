function get_firstchild(n){
	x=n.firstChild;
	while (x.nodeType!=1){
		x=x.nextSibling;
	}
	return x;
}

var div = document.createElement('div');
div.style.backgroundColor = '#FF878D';
div.style.height = '25px';
var p = document.createElement('p');
p.style.padding = '5px';
p.style.whiteSpace = 'nowrap';
var b = document.createElement('b');
var text = document.createTextNode('Warning!');
b.appendChild(text);
p.appendChild(b);
text = document.createTextNode(' WIRIS plugin for Moodle seems not to be correctly installed: the component WIRIS plugin for TinyMCE is missing. Please, visit the troubleshooting page. ');
p.appendChild(text);
var a = document.createElement('a');
a.href = 'http://www.wiris.com/plugins/docs/moodle/troubleshooting';
a.target = '_blank';
var img = document.createElement('img');
img.src = 'http://www.wiris.com/system/files/attachments/1689/WIRIS_manual_icon_17_17.png';
img.alt = '';
img.style.verticalAlign = '-3px';
a.appendChild(img);
p.appendChild(a);
div.appendChild(p);

var bodyFirstChild = get_firstchild(document.body);
bodyFirstChild.parentNode.insertBefore(div, bodyFirstChild);