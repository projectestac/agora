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
text = document.createTextNode(' WIRIS plugin for Moodle seems not to be correctly installed: the component WIRIS plugin for TinyMCE is missing. Please, visit the ');
p.appendChild(text);
var a = document.createElement('a');
a.href = 'http://www.wiris.com/plugins/docs/moodle/troubleshooting';
a.target = '_blank';
text = document.createTextNode('troubleshooting');
a.appendChild(text);
p.appendChild(a);
text = document.createTextNode(' page.');
p.appendChild(text);
div.appendChild(p);

var bodyFirstChild = get_firstchild(document.body);
bodyFirstChild.parentNode.insertBefore(div, bodyFirstChild);