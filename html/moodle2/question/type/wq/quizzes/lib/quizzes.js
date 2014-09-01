var $hxClasses = $hxClasses || {},$estr = function() { return js.Boot.__string_rec(this,''); };
function $extend(from, fields) {
	function inherit() {}; inherit.prototype = from; var proto = new inherit();
	for (var name in fields) proto[name] = fields[name];
	return proto;
}
var EReg = $hxClasses["EReg"] = function(r,opt) {
	opt = opt.split("u").join("");
	this.r = new RegExp(r,opt);
};
EReg.__name__ = ["EReg"];
EReg.prototype = {
	customReplace: function(s,f) {
		var buf = new StringBuf();
		while(true) {
			if(!this.match(s)) break;
			buf.b += Std.string(this.matchedLeft());
			buf.b += Std.string(f(this));
			s = this.matchedRight();
		}
		buf.b += Std.string(s);
		return buf.b;
	}
	,replace: function(s,by) {
		return s.replace(this.r,by);
	}
	,split: function(s) {
		var d = "#__delim__#";
		return s.replace(this.r,d).split(d);
	}
	,matchedPos: function() {
		if(this.r.m == null) throw "No string matched";
		return { pos : this.r.m.index, len : this.r.m[0].length};
	}
	,matchedRight: function() {
		if(this.r.m == null) throw "No string matched";
		var sz = this.r.m.index + this.r.m[0].length;
		return this.r.s.substr(sz,this.r.s.length - sz);
	}
	,matchedLeft: function() {
		if(this.r.m == null) throw "No string matched";
		return this.r.s.substr(0,this.r.m.index);
	}
	,matched: function(n) {
		return this.r.m != null && n >= 0 && n < this.r.m.length?this.r.m[n]:(function($this) {
			var $r;
			throw "EReg::matched";
			return $r;
		}(this));
	}
	,match: function(s) {
		if(this.r.global) this.r.lastIndex = 0;
		this.r.m = this.r.exec(s);
		this.r.s = s;
		return this.r.m != null;
	}
	,r: null
	,__class__: EReg
}
var Hash = $hxClasses["Hash"] = function() {
	this.h = { };
};
Hash.__name__ = ["Hash"];
Hash.prototype = {
	toString: function() {
		var s = new StringBuf();
		s.b += Std.string("{");
		var it = this.keys();
		while( it.hasNext() ) {
			var i = it.next();
			s.b += Std.string(i);
			s.b += Std.string(" => ");
			s.b += Std.string(Std.string(this.get(i)));
			if(it.hasNext()) s.b += Std.string(", ");
		}
		s.b += Std.string("}");
		return s.b;
	}
	,iterator: function() {
		return { ref : this.h, it : this.keys(), hasNext : function() {
			return this.it.hasNext();
		}, next : function() {
			var i = this.it.next();
			return this.ref["$" + i];
		}};
	}
	,keys: function() {
		var a = [];
		for( var key in this.h ) {
		if(this.h.hasOwnProperty(key)) a.push(key.substr(1));
		}
		return HxOverrides.iter(a);
	}
	,remove: function(key) {
		key = "$" + key;
		if(!this.h.hasOwnProperty(key)) return false;
		delete(this.h[key]);
		return true;
	}
	,exists: function(key) {
		return this.h.hasOwnProperty("$" + key);
	}
	,get: function(key) {
		return this.h["$" + key];
	}
	,set: function(key,value) {
		this.h["$" + key] = value;
	}
	,h: null
	,__class__: Hash
}
var HxOverrides = $hxClasses["HxOverrides"] = function() { }
HxOverrides.__name__ = ["HxOverrides"];
HxOverrides.dateStr = function(date) {
	var m = date.getMonth() + 1;
	var d = date.getDate();
	var h = date.getHours();
	var mi = date.getMinutes();
	var s = date.getSeconds();
	return date.getFullYear() + "-" + (m < 10?"0" + m:"" + m) + "-" + (d < 10?"0" + d:"" + d) + " " + (h < 10?"0" + h:"" + h) + ":" + (mi < 10?"0" + mi:"" + mi) + ":" + (s < 10?"0" + s:"" + s);
}
HxOverrides.strDate = function(s) {
	switch(s.length) {
	case 8:
		var k = s.split(":");
		var d = new Date();
		d.setTime(0);
		d.setUTCHours(k[0]);
		d.setUTCMinutes(k[1]);
		d.setUTCSeconds(k[2]);
		return d;
	case 10:
		var k = s.split("-");
		return new Date(k[0],k[1] - 1,k[2],0,0,0);
	case 19:
		var k = s.split(" ");
		var y = k[0].split("-");
		var t = k[1].split(":");
		return new Date(y[0],y[1] - 1,y[2],t[0],t[1],t[2]);
	default:
		throw "Invalid date format : " + s;
	}
}
HxOverrides.cca = function(s,index) {
	var x = s.charCodeAt(index);
	if(x != x) return undefined;
	return x;
}
HxOverrides.substr = function(s,pos,len) {
	if(pos != null && pos != 0 && len != null && len < 0) return "";
	if(len == null) len = s.length;
	if(pos < 0) {
		pos = s.length + pos;
		if(pos < 0) pos = 0;
	} else if(len < 0) len = s.length + len - pos;
	return s.substr(pos,len);
}
HxOverrides.remove = function(a,obj) {
	var i = 0;
	var l = a.length;
	while(i < l) {
		if(a[i] == obj) {
			a.splice(i,1);
			return true;
		}
		i++;
	}
	return false;
}
HxOverrides.iter = function(a) {
	return { cur : 0, arr : a, hasNext : function() {
		return this.cur < this.arr.length;
	}, next : function() {
		return this.arr[this.cur++];
	}};
}
var IntHash = $hxClasses["IntHash"] = function() {
	this.h = { };
};
IntHash.__name__ = ["IntHash"];
IntHash.prototype = {
	toString: function() {
		var s = new StringBuf();
		s.b += Std.string("{");
		var it = this.keys();
		while( it.hasNext() ) {
			var i = it.next();
			s.b += Std.string(i);
			s.b += Std.string(" => ");
			s.b += Std.string(Std.string(this.get(i)));
			if(it.hasNext()) s.b += Std.string(", ");
		}
		s.b += Std.string("}");
		return s.b;
	}
	,iterator: function() {
		return { ref : this.h, it : this.keys(), hasNext : function() {
			return this.it.hasNext();
		}, next : function() {
			var i = this.it.next();
			return this.ref[i];
		}};
	}
	,keys: function() {
		var a = [];
		for( var key in this.h ) {
		if(this.h.hasOwnProperty(key)) a.push(key | 0);
		}
		return HxOverrides.iter(a);
	}
	,remove: function(key) {
		if(!this.h.hasOwnProperty(key)) return false;
		delete(this.h[key]);
		return true;
	}
	,exists: function(key) {
		return this.h.hasOwnProperty(key);
	}
	,get: function(key) {
		return this.h[key];
	}
	,set: function(key,value) {
		this.h[key] = value;
	}
	,h: null
	,__class__: IntHash
}
var IntIter = $hxClasses["IntIter"] = function(min,max) {
	this.min = min;
	this.max = max;
};
IntIter.__name__ = ["IntIter"];
IntIter.prototype = {
	next: function() {
		return this.min++;
	}
	,hasNext: function() {
		return this.min < this.max;
	}
	,max: null
	,min: null
	,__class__: IntIter
}
var List = $hxClasses["List"] = function() {
	this.length = 0;
};
List.__name__ = ["List"];
List.prototype = {
	map: function(f) {
		var b = new List();
		var l = this.h;
		while(l != null) {
			var v = l[0];
			l = l[1];
			b.add(f(v));
		}
		return b;
	}
	,filter: function(f) {
		var l2 = new List();
		var l = this.h;
		while(l != null) {
			var v = l[0];
			l = l[1];
			if(f(v)) l2.add(v);
		}
		return l2;
	}
	,join: function(sep) {
		var s = new StringBuf();
		var first = true;
		var l = this.h;
		while(l != null) {
			if(first) first = false; else s.b += Std.string(sep);
			s.b += Std.string(l[0]);
			l = l[1];
		}
		return s.b;
	}
	,toString: function() {
		var s = new StringBuf();
		var first = true;
		var l = this.h;
		s.b += Std.string("{");
		while(l != null) {
			if(first) first = false; else s.b += Std.string(", ");
			s.b += Std.string(Std.string(l[0]));
			l = l[1];
		}
		s.b += Std.string("}");
		return s.b;
	}
	,iterator: function() {
		return { h : this.h, hasNext : function() {
			return this.h != null;
		}, next : function() {
			if(this.h == null) return null;
			var x = this.h[0];
			this.h = this.h[1];
			return x;
		}};
	}
	,remove: function(v) {
		var prev = null;
		var l = this.h;
		while(l != null) {
			if(l[0] == v) {
				if(prev == null) this.h = l[1]; else prev[1] = l[1];
				if(this.q == l) this.q = prev;
				this.length--;
				return true;
			}
			prev = l;
			l = l[1];
		}
		return false;
	}
	,clear: function() {
		this.h = null;
		this.q = null;
		this.length = 0;
	}
	,isEmpty: function() {
		return this.h == null;
	}
	,pop: function() {
		if(this.h == null) return null;
		var x = this.h[0];
		this.h = this.h[1];
		if(this.h == null) this.q = null;
		this.length--;
		return x;
	}
	,last: function() {
		return this.q == null?null:this.q[0];
	}
	,first: function() {
		return this.h == null?null:this.h[0];
	}
	,push: function(item) {
		var x = [item,this.h];
		this.h = x;
		if(this.q == null) this.q = x;
		this.length++;
	}
	,add: function(item) {
		var x = [item];
		if(this.h == null) this.h = x; else this.q[1] = x;
		this.q = x;
		this.length++;
	}
	,length: null
	,q: null
	,h: null
	,__class__: List
}
var Reflect = $hxClasses["Reflect"] = function() { }
Reflect.__name__ = ["Reflect"];
Reflect.hasField = function(o,field) {
	return Object.prototype.hasOwnProperty.call(o,field);
}
Reflect.field = function(o,field) {
	var v = null;
	try {
		v = o[field];
	} catch( e ) {
	}
	return v;
}
Reflect.setField = function(o,field,value) {
	o[field] = value;
}
Reflect.getProperty = function(o,field) {
	var tmp;
	return o == null?null:o.__properties__ && (tmp = o.__properties__["get_" + field])?o[tmp]():o[field];
}
Reflect.setProperty = function(o,field,value) {
	var tmp;
	if(o.__properties__ && (tmp = o.__properties__["set_" + field])) o[tmp](value); else o[field] = value;
}
Reflect.callMethod = function(o,func,args) {
	return func.apply(o,args);
}
Reflect.fields = function(o) {
	var a = [];
	if(o != null) {
		var hasOwnProperty = Object.prototype.hasOwnProperty;
		for( var f in o ) {
		if(hasOwnProperty.call(o,f)) a.push(f);
		}
	}
	return a;
}
Reflect.isFunction = function(f) {
	return typeof(f) == "function" && !(f.__name__ || f.__ename__);
}
Reflect.compare = function(a,b) {
	return a == b?0:a > b?1:-1;
}
Reflect.compareMethods = function(f1,f2) {
	if(f1 == f2) return true;
	if(!Reflect.isFunction(f1) || !Reflect.isFunction(f2)) return false;
	return f1.scope == f2.scope && f1.method == f2.method && f1.method != null;
}
Reflect.isObject = function(v) {
	if(v == null) return false;
	var t = typeof(v);
	return t == "string" || t == "object" && !v.__enum__ || t == "function" && (v.__name__ || v.__ename__);
}
Reflect.deleteField = function(o,f) {
	if(!Reflect.hasField(o,f)) return false;
	delete(o[f]);
	return true;
}
Reflect.copy = function(o) {
	var o2 = { };
	var _g = 0, _g1 = Reflect.fields(o);
	while(_g < _g1.length) {
		var f = _g1[_g];
		++_g;
		o2[f] = Reflect.field(o,f);
	}
	return o2;
}
Reflect.makeVarArgs = function(f) {
	return function() {
		var a = Array.prototype.slice.call(arguments);
		return f(a);
	};
}
var Std = $hxClasses["Std"] = function() { }
Std.__name__ = ["Std"];
Std["is"] = function(v,t) {
	return js.Boot.__instanceof(v,t);
}
Std.string = function(s) {
	return js.Boot.__string_rec(s,"");
}
Std["int"] = function(x) {
	return x | 0;
}
Std.parseInt = function(x) {
	var v = parseInt(x,10);
	if(v == 0 && (HxOverrides.cca(x,1) == 120 || HxOverrides.cca(x,1) == 88)) v = parseInt(x);
	if(isNaN(v)) return null;
	return v;
}
Std.parseFloat = function(x) {
	return parseFloat(x);
}
Std.random = function(x) {
	return Math.floor(Math.random() * x);
}
var StringBuf = $hxClasses["StringBuf"] = function() {
	this.b = "";
};
StringBuf.__name__ = ["StringBuf"];
StringBuf.prototype = {
	toString: function() {
		return this.b;
	}
	,addSub: function(s,pos,len) {
		this.b += HxOverrides.substr(s,pos,len);
	}
	,addChar: function(c) {
		this.b += String.fromCharCode(c);
	}
	,add: function(x) {
		this.b += Std.string(x);
	}
	,b: null
	,__class__: StringBuf
}
var StringTools = $hxClasses["StringTools"] = function() { }
StringTools.__name__ = ["StringTools"];
StringTools.urlEncode = function(s) {
	return encodeURIComponent(s);
}
StringTools.urlDecode = function(s) {
	return decodeURIComponent(s.split("+").join(" "));
}
StringTools.htmlEscape = function(s) {
	return s.split("&").join("&amp;").split("<").join("&lt;").split(">").join("&gt;");
}
StringTools.htmlUnescape = function(s) {
	return s.split("&gt;").join(">").split("&lt;").join("<").split("&amp;").join("&");
}
StringTools.startsWith = function(s,start) {
	return s.length >= start.length && HxOverrides.substr(s,0,start.length) == start;
}
StringTools.endsWith = function(s,end) {
	var elen = end.length;
	var slen = s.length;
	return slen >= elen && HxOverrides.substr(s,slen - elen,elen) == end;
}
StringTools.isSpace = function(s,pos) {
	var c = HxOverrides.cca(s,pos);
	return c >= 9 && c <= 13 || c == 32;
}
StringTools.ltrim = function(s) {
	var l = s.length;
	var r = 0;
	while(r < l && StringTools.isSpace(s,r)) r++;
	if(r > 0) return HxOverrides.substr(s,r,l - r); else return s;
}
StringTools.rtrim = function(s) {
	var l = s.length;
	var r = 0;
	while(r < l && StringTools.isSpace(s,l - r - 1)) r++;
	if(r > 0) return HxOverrides.substr(s,0,l - r); else return s;
}
StringTools.trim = function(s) {
	return StringTools.ltrim(StringTools.rtrim(s));
}
StringTools.rpad = function(s,c,l) {
	var sl = s.length;
	var cl = c.length;
	while(sl < l) if(l - sl < cl) {
		s += HxOverrides.substr(c,0,l - sl);
		sl = l;
	} else {
		s += c;
		sl += cl;
	}
	return s;
}
StringTools.lpad = function(s,c,l) {
	var ns = "";
	var sl = s.length;
	if(sl >= l) return s;
	var cl = c.length;
	while(sl < l) if(l - sl < cl) {
		ns += HxOverrides.substr(c,0,l - sl);
		sl = l;
	} else {
		ns += c;
		sl += cl;
	}
	return ns + s;
}
StringTools.replace = function(s,sub,by) {
	return s.split(sub).join(by);
}
StringTools.hex = function(n,digits) {
	var s = "";
	var hexChars = "0123456789ABCDEF";
	do {
		s = hexChars.charAt(n & 15) + s;
		n >>>= 4;
	} while(n > 0);
	if(digits != null) while(s.length < digits) s = "0" + s;
	return s;
}
StringTools.fastCodeAt = function(s,index) {
	return s.charCodeAt(index);
}
StringTools.isEOF = function(c) {
	return c != c;
}
var ValueType = $hxClasses["ValueType"] = { __ename__ : ["ValueType"], __constructs__ : ["TNull","TInt","TFloat","TBool","TObject","TFunction","TClass","TEnum","TUnknown"] }
ValueType.TNull = ["TNull",0];
ValueType.TNull.toString = $estr;
ValueType.TNull.__enum__ = ValueType;
ValueType.TInt = ["TInt",1];
ValueType.TInt.toString = $estr;
ValueType.TInt.__enum__ = ValueType;
ValueType.TFloat = ["TFloat",2];
ValueType.TFloat.toString = $estr;
ValueType.TFloat.__enum__ = ValueType;
ValueType.TBool = ["TBool",3];
ValueType.TBool.toString = $estr;
ValueType.TBool.__enum__ = ValueType;
ValueType.TObject = ["TObject",4];
ValueType.TObject.toString = $estr;
ValueType.TObject.__enum__ = ValueType;
ValueType.TFunction = ["TFunction",5];
ValueType.TFunction.toString = $estr;
ValueType.TFunction.__enum__ = ValueType;
ValueType.TClass = function(c) { var $x = ["TClass",6,c]; $x.__enum__ = ValueType; $x.toString = $estr; return $x; }
ValueType.TEnum = function(e) { var $x = ["TEnum",7,e]; $x.__enum__ = ValueType; $x.toString = $estr; return $x; }
ValueType.TUnknown = ["TUnknown",8];
ValueType.TUnknown.toString = $estr;
ValueType.TUnknown.__enum__ = ValueType;
var Type = $hxClasses["Type"] = function() { }
Type.__name__ = ["Type"];
Type.getClass = function(o) {
	if(o == null) return null;
	return o.__class__;
}
Type.getEnum = function(o) {
	if(o == null) return null;
	return o.__enum__;
}
Type.getSuperClass = function(c) {
	return c.__super__;
}
Type.getClassName = function(c) {
	var a = c.__name__;
	return a.join(".");
}
Type.getEnumName = function(e) {
	var a = e.__ename__;
	return a.join(".");
}
Type.resolveClass = function(name) {
	var cl = $hxClasses[name];
	if(cl == null || !cl.__name__) return null;
	return cl;
}
Type.resolveEnum = function(name) {
	var e = $hxClasses[name];
	if(e == null || !e.__ename__) return null;
	return e;
}
Type.createInstance = function(cl,args) {
	switch(args.length) {
	case 0:
		return new cl();
	case 1:
		return new cl(args[0]);
	case 2:
		return new cl(args[0],args[1]);
	case 3:
		return new cl(args[0],args[1],args[2]);
	case 4:
		return new cl(args[0],args[1],args[2],args[3]);
	case 5:
		return new cl(args[0],args[1],args[2],args[3],args[4]);
	case 6:
		return new cl(args[0],args[1],args[2],args[3],args[4],args[5]);
	case 7:
		return new cl(args[0],args[1],args[2],args[3],args[4],args[5],args[6]);
	case 8:
		return new cl(args[0],args[1],args[2],args[3],args[4],args[5],args[6],args[7]);
	default:
		throw "Too many arguments";
	}
	return null;
}
Type.createEmptyInstance = function(cl) {
	function empty() {}; empty.prototype = cl.prototype;
	return new empty();
}
Type.createEnum = function(e,constr,params) {
	var f = Reflect.field(e,constr);
	if(f == null) throw "No such constructor " + constr;
	if(Reflect.isFunction(f)) {
		if(params == null) throw "Constructor " + constr + " need parameters";
		return f.apply(e,params);
	}
	if(params != null && params.length != 0) throw "Constructor " + constr + " does not need parameters";
	return f;
}
Type.createEnumIndex = function(e,index,params) {
	var c = e.__constructs__[index];
	if(c == null) throw index + " is not a valid enum constructor index";
	return Type.createEnum(e,c,params);
}
Type.getInstanceFields = function(c) {
	var a = [];
	for(var i in c.prototype) a.push(i);
	HxOverrides.remove(a,"__class__");
	HxOverrides.remove(a,"__properties__");
	return a;
}
Type.getClassFields = function(c) {
	var a = Reflect.fields(c);
	HxOverrides.remove(a,"__name__");
	HxOverrides.remove(a,"__interfaces__");
	HxOverrides.remove(a,"__properties__");
	HxOverrides.remove(a,"__super__");
	HxOverrides.remove(a,"prototype");
	return a;
}
Type.getEnumConstructs = function(e) {
	var a = e.__constructs__;
	return a.slice();
}
Type["typeof"] = function(v) {
	switch(typeof(v)) {
	case "boolean":
		return ValueType.TBool;
	case "string":
		return ValueType.TClass(String);
	case "number":
		if(Math.ceil(v) == v % 2147483648.0) return ValueType.TInt;
		return ValueType.TFloat;
	case "object":
		if(v == null) return ValueType.TNull;
		var e = v.__enum__;
		if(e != null) return ValueType.TEnum(e);
		var c = v.__class__;
		if(c != null) return ValueType.TClass(c);
		return ValueType.TObject;
	case "function":
		if(v.__name__ || v.__ename__) return ValueType.TObject;
		return ValueType.TFunction;
	case "undefined":
		return ValueType.TNull;
	default:
		return ValueType.TUnknown;
	}
}
Type.enumEq = function(a,b) {
	if(a == b) return true;
	try {
		if(a[0] != b[0]) return false;
		var _g1 = 2, _g = a.length;
		while(_g1 < _g) {
			var i = _g1++;
			if(!Type.enumEq(a[i],b[i])) return false;
		}
		var e = a.__enum__;
		if(e != b.__enum__ || e == null) return false;
	} catch( e ) {
		return false;
	}
	return true;
}
Type.enumConstructor = function(e) {
	return e[0];
}
Type.enumParameters = function(e) {
	return e.slice(2);
}
Type.enumIndex = function(e) {
	return e[1];
}
Type.allEnums = function(e) {
	var all = [];
	var cst = e.__constructs__;
	var _g = 0;
	while(_g < cst.length) {
		var c = cst[_g];
		++_g;
		var v = Reflect.field(e,c);
		if(!Reflect.isFunction(v)) all.push(v);
	}
	return all;
}
var Xml = $hxClasses["Xml"] = function() {
};
Xml.__name__ = ["Xml"];
Xml.Element = null;
Xml.PCData = null;
Xml.CData = null;
Xml.Comment = null;
Xml.DocType = null;
Xml.Prolog = null;
Xml.Document = null;
Xml.parse = function(str) {
	return haxe.xml.Parser.parse(str);
}
Xml.createElement = function(name) {
	var r = new Xml();
	r.nodeType = Xml.Element;
	r._children = new Array();
	r._attributes = new Hash();
	r.setNodeName(name);
	return r;
}
Xml.createPCData = function(data) {
	var r = new Xml();
	r.nodeType = Xml.PCData;
	r.setNodeValue(data);
	return r;
}
Xml.createCData = function(data) {
	var r = new Xml();
	r.nodeType = Xml.CData;
	r.setNodeValue(data);
	return r;
}
Xml.createComment = function(data) {
	var r = new Xml();
	r.nodeType = Xml.Comment;
	r.setNodeValue(data);
	return r;
}
Xml.createDocType = function(data) {
	var r = new Xml();
	r.nodeType = Xml.DocType;
	r.setNodeValue(data);
	return r;
}
Xml.createProlog = function(data) {
	var r = new Xml();
	r.nodeType = Xml.Prolog;
	r.setNodeValue(data);
	return r;
}
Xml.createDocument = function() {
	var r = new Xml();
	r.nodeType = Xml.Document;
	r._children = new Array();
	return r;
}
Xml.prototype = {
	toString: function() {
		if(this.nodeType == Xml.PCData) return this._nodeValue;
		if(this.nodeType == Xml.CData) return "<![CDATA[" + this._nodeValue + "]]>";
		if(this.nodeType == Xml.Comment) return "<!--" + this._nodeValue + "-->";
		if(this.nodeType == Xml.DocType) return "<!DOCTYPE " + this._nodeValue + ">";
		if(this.nodeType == Xml.Prolog) return "<?" + this._nodeValue + "?>";
		var s = new StringBuf();
		if(this.nodeType == Xml.Element) {
			s.b += Std.string("<");
			s.b += Std.string(this._nodeName);
			var $it0 = this._attributes.keys();
			while( $it0.hasNext() ) {
				var k = $it0.next();
				s.b += Std.string(" ");
				s.b += Std.string(k);
				s.b += Std.string("=\"");
				s.b += Std.string(this._attributes.get(k));
				s.b += Std.string("\"");
			}
			if(this._children.length == 0) {
				s.b += Std.string("/>");
				return s.b;
			}
			s.b += Std.string(">");
		}
		var $it1 = this.iterator();
		while( $it1.hasNext() ) {
			var x = $it1.next();
			s.b += Std.string(x.toString());
		}
		if(this.nodeType == Xml.Element) {
			s.b += Std.string("</");
			s.b += Std.string(this._nodeName);
			s.b += Std.string(">");
		}
		return s.b;
	}
	,insertChild: function(x,pos) {
		if(this._children == null) throw "bad nodetype";
		if(x._parent != null) HxOverrides.remove(x._parent._children,x);
		x._parent = this;
		this._children.splice(pos,0,x);
	}
	,removeChild: function(x) {
		if(this._children == null) throw "bad nodetype";
		var b = HxOverrides.remove(this._children,x);
		if(b) x._parent = null;
		return b;
	}
	,addChild: function(x) {
		if(this._children == null) throw "bad nodetype";
		if(x._parent != null) HxOverrides.remove(x._parent._children,x);
		x._parent = this;
		this._children.push(x);
	}
	,firstElement: function() {
		if(this._children == null) throw "bad nodetype";
		var cur = 0;
		var l = this._children.length;
		while(cur < l) {
			var n = this._children[cur];
			if(n.nodeType == Xml.Element) return n;
			cur++;
		}
		return null;
	}
	,firstChild: function() {
		if(this._children == null) throw "bad nodetype";
		return this._children[0];
	}
	,elementsNamed: function(name) {
		if(this._children == null) throw "bad nodetype";
		return { cur : 0, x : this._children, hasNext : function() {
			var k = this.cur;
			var l = this.x.length;
			while(k < l) {
				var n = this.x[k];
				if(n.nodeType == Xml.Element && n._nodeName == name) break;
				k++;
			}
			this.cur = k;
			return k < l;
		}, next : function() {
			var k = this.cur;
			var l = this.x.length;
			while(k < l) {
				var n = this.x[k];
				k++;
				if(n.nodeType == Xml.Element && n._nodeName == name) {
					this.cur = k;
					return n;
				}
			}
			return null;
		}};
	}
	,elements: function() {
		if(this._children == null) throw "bad nodetype";
		return { cur : 0, x : this._children, hasNext : function() {
			var k = this.cur;
			var l = this.x.length;
			while(k < l) {
				if(this.x[k].nodeType == Xml.Element) break;
				k += 1;
			}
			this.cur = k;
			return k < l;
		}, next : function() {
			var k = this.cur;
			var l = this.x.length;
			while(k < l) {
				var n = this.x[k];
				k += 1;
				if(n.nodeType == Xml.Element) {
					this.cur = k;
					return n;
				}
			}
			return null;
		}};
	}
	,iterator: function() {
		if(this._children == null) throw "bad nodetype";
		return { cur : 0, x : this._children, hasNext : function() {
			return this.cur < this.x.length;
		}, next : function() {
			return this.x[this.cur++];
		}};
	}
	,attributes: function() {
		if(this.nodeType != Xml.Element) throw "bad nodeType";
		return this._attributes.keys();
	}
	,exists: function(att) {
		if(this.nodeType != Xml.Element) throw "bad nodeType";
		return this._attributes.exists(att);
	}
	,remove: function(att) {
		if(this.nodeType != Xml.Element) throw "bad nodeType";
		this._attributes.remove(att);
	}
	,set: function(att,value) {
		if(this.nodeType != Xml.Element) throw "bad nodeType";
		this._attributes.set(att,value);
	}
	,get: function(att) {
		if(this.nodeType != Xml.Element) throw "bad nodeType";
		return this._attributes.get(att);
	}
	,getParent: function() {
		return this._parent;
	}
	,setNodeValue: function(v) {
		if(this.nodeType == Xml.Element || this.nodeType == Xml.Document) throw "bad nodeType";
		return this._nodeValue = v;
	}
	,getNodeValue: function() {
		if(this.nodeType == Xml.Element || this.nodeType == Xml.Document) throw "bad nodeType";
		return this._nodeValue;
	}
	,setNodeName: function(n) {
		if(this.nodeType != Xml.Element) throw "bad nodeType";
		return this._nodeName = n;
	}
	,getNodeName: function() {
		if(this.nodeType != Xml.Element) throw "bad nodeType";
		return this._nodeName;
	}
	,_parent: null
	,_children: null
	,_attributes: null
	,_nodeValue: null
	,_nodeName: null
	,parent: null
	,nodeValue: null
	,nodeName: null
	,nodeType: null
	,__class__: Xml
	,__properties__: {set_nodeName:"setNodeName",get_nodeName:"getNodeName",set_nodeValue:"setNodeValue",get_nodeValue:"getNodeValue",get_parent:"getParent"}
}
var com = com || {}
if(!com.wiris) com.wiris = {}
if(!com.wiris.editor) com.wiris.editor = {}
com.wiris.editor.EditorListener = $hxClasses["com.wiris.editor.EditorListener"] = function() { }
com.wiris.editor.EditorListener.__name__ = ["com","wiris","editor","EditorListener"];
com.wiris.editor.EditorListener.prototype = {
	transformationReceived: null
	,styleChanged: null
	,contentChanged: null
	,clipboardChanged: null
	,caretPositionChanged: null
	,__class__: com.wiris.editor.EditorListener
}
if(!com.wiris.quizzes) com.wiris.quizzes = {}
if(!com.wiris.quizzes.api) com.wiris.quizzes.api = {}
if(!com.wiris.quizzes.api.ui) com.wiris.quizzes.api.ui = {}
com.wiris.quizzes.api.ui.MathViewer = $hxClasses["com.wiris.quizzes.api.ui.MathViewer"] = function() { }
com.wiris.quizzes.api.ui.MathViewer.__name__ = ["com","wiris","quizzes","api","ui","MathViewer"];
com.wiris.quizzes.api.ui.MathViewer.prototype = {
	render: null
	,__class__: com.wiris.quizzes.api.ui.MathViewer
}
com.wiris.quizzes.HxMathViewer = $hxClasses["com.wiris.quizzes.HxMathViewer"] = function() {
};
com.wiris.quizzes.HxMathViewer.__name__ = ["com","wiris","quizzes","HxMathViewer"];
com.wiris.quizzes.HxMathViewer.__interfaces__ = [com.wiris.quizzes.api.ui.MathViewer];
com.wiris.quizzes.HxMathViewer.prototype = {
	render: function(mathml) {
		var params = { };
		params.loadEditorDefinition = "false";
		params.mode = "visualization";
		var editor;
		throw "Not implemented yet!";
		return null;
	}
	,__class__: com.wiris.quizzes.HxMathViewer
}
com.wiris.quizzes.api.ui.QuizzesComponent = $hxClasses["com.wiris.quizzes.api.ui.QuizzesComponent"] = function() { }
com.wiris.quizzes.api.ui.QuizzesComponent.__name__ = ["com","wiris","quizzes","api","ui","QuizzesComponent"];
com.wiris.quizzes.api.ui.QuizzesComponent.prototype = {
	getElement: null
	,__class__: com.wiris.quizzes.api.ui.QuizzesComponent
}
com.wiris.quizzes.JsComponent = $hxClasses["com.wiris.quizzes.JsComponent"] = function(d) {
	this.ownerDocument = d;
};
com.wiris.quizzes.JsComponent.__name__ = ["com","wiris","quizzes","JsComponent"];
com.wiris.quizzes.JsComponent.__interfaces__ = [com.wiris.quizzes.api.ui.QuizzesComponent];
com.wiris.quizzes.JsComponent.translator = null;
com.wiris.quizzes.JsComponent.lang = null;
com.wiris.quizzes.JsComponent.setLanguage = function(lang) {
	com.wiris.quizzes.JsComponent.lang = com.wiris.quizzes.JsComponent.parseLanguage(lang);
}
com.wiris.quizzes.JsComponent.parseLanguage = function(text) {
	var hypen = text.indexOf("-");
	if(hypen != -1) text = HxOverrides.substr(text,0,hypen);
	hypen = text.indexOf("_");
	if(hypen != -1) text = HxOverrides.substr(text,0,hypen);
	text = text.toLowerCase();
	return text;
}
com.wiris.quizzes.JsComponent.getNewUniqueId = function() {
	return "wirisquizzes_" + com.wiris.quizzes.JsComponent.idcounter++;
}
com.wiris.quizzes.JsComponent.prototype = {
	setEnabled: function(b) {
	}
	,removeClass: function(className) {
		com.wiris.quizzes.JsDomUtils.removeClass(this.element,className);
	}
	,addClass: function(className) {
		com.wiris.quizzes.JsDomUtils.addClass(this.element,className);
	}
	,getOwnerDocument: function() {
		return this.ownerDocument;
	}
	,getOwnerWindow: function() {
		if(this.ownerWindow == null) {
			var doc = this.getOwnerDocument();
			this.ownerWindow = null;
			if('defaultView' in doc) this.ownerWindow = doc.defaultView; else if('parentWindow' in doc) this.ownerWindow = doc.parentWindow;
		}
		return this.ownerWindow;
	}
	,getLang: function() {
		if(com.wiris.quizzes.JsComponent.lang == null) com.wiris.quizzes.JsComponent.lang = "en";
		return com.wiris.quizzes.JsComponent.lang;
	}
	,getElementId: function() {
		if(this.id == null) {
			if(this.element.id == null) this.element.id = com.wiris.quizzes.JsComponent.getNewUniqueId();
			this.id = this.element.id;
		}
		return this.id;
	}
	,t: function(key) {
		if(com.wiris.quizzes.JsComponent.translator == null) {
			var lang = this.getLang();
			com.wiris.quizzes.JsComponent.translator = com.wiris.quizzes.impl.Translator.getInstance(lang);
		}
		return com.wiris.quizzes.JsComponent.translator.t(key);
	}
	,addChild: function(c) {
		if(this.children == null) this.children = new Array();
		this.children.push(c);
		this.element.appendChild(c.element);
	}
	,getElement: function() {
		return this.element;
	}
	,destroy: function() {
	}
	,ownerDocument: null
	,ownerWindow: null
	,id: null
	,children: null
	,element: null
	,__class__: com.wiris.quizzes.JsComponent
}
com.wiris.quizzes.JsContainer = $hxClasses["com.wiris.quizzes.JsContainer"] = function(d) {
	com.wiris.quizzes.JsComponent.call(this,d);
	this.element = d.createElement("div");
	this.addClass("wiriscontainer");
};
com.wiris.quizzes.JsContainer.__name__ = ["com","wiris","quizzes","JsContainer"];
com.wiris.quizzes.JsContainer.__super__ = com.wiris.quizzes.JsComponent;
com.wiris.quizzes.JsContainer.prototype = $extend(com.wiris.quizzes.JsComponent.prototype,{
	__class__: com.wiris.quizzes.JsContainer
});
com.wiris.quizzes.api.ui.QuizzesField = $hxClasses["com.wiris.quizzes.api.ui.QuizzesField"] = function() { }
com.wiris.quizzes.api.ui.QuizzesField.__name__ = ["com","wiris","quizzes","api","ui","QuizzesField"];
com.wiris.quizzes.api.ui.QuizzesField.__interfaces__ = [com.wiris.quizzes.api.ui.QuizzesComponent];
com.wiris.quizzes.api.ui.QuizzesField.prototype = {
	addQuizzesFieldListener: null
	,setValue: null
	,getValue: null
	,__class__: com.wiris.quizzes.api.ui.QuizzesField
}
com.wiris.quizzes.JsInput = $hxClasses["com.wiris.quizzes.JsInput"] = function(d,v) {
	com.wiris.quizzes.JsComponent.call(this,d);
	this.value = v;
};
com.wiris.quizzes.JsInput.__name__ = ["com","wiris","quizzes","JsInput"];
com.wiris.quizzes.JsInput.__interfaces__ = [com.wiris.quizzes.api.ui.QuizzesField];
com.wiris.quizzes.JsInput.__super__ = com.wiris.quizzes.JsComponent;
com.wiris.quizzes.JsInput.prototype = $extend(com.wiris.quizzes.JsComponent.prototype,{
	addQuizzesFieldListener: function(listener) {
		var _g = this;
		this.addOnChangeHandler(function(value) {
			listener.contentChanged(_g);
		});
	}
	,init: function() {
	}
	,addOnChangeHandler: function(handler) {
		this.changeHandler = handler;
	}
	,setValue: function(v) {
		this.value = v;
		if(this.changeHandler != null) this.changeHandler(this.value);
	}
	,getValue: function() {
		return this.value;
	}
	,isEmpty: function() {
		return this.value == null || this.value == "";
	}
	,changeHandler: null
	,value: null
	,__class__: com.wiris.quizzes.JsInput
});
com.wiris.quizzes.JsTextInput = $hxClasses["com.wiris.quizzes.JsTextInput"] = function(d,s) {
	com.wiris.quizzes.JsInput.call(this,d,s);
	var input = d.createElement("input");
	input.type = "text";
	input.value = this.value;
	this.element = input;
};
com.wiris.quizzes.JsTextInput.__name__ = ["com","wiris","quizzes","JsTextInput"];
com.wiris.quizzes.JsTextInput.__super__ = com.wiris.quizzes.JsInput;
com.wiris.quizzes.JsTextInput.prototype = $extend(com.wiris.quizzes.JsInput.prototype,{
	addOnChangeHandler: function(handler) {
		var _g = this;
		com.wiris.quizzes.JsInput.prototype.addOnChangeHandler.call(this,handler);
		com.wiris.quizzes.JsDomUtils.addEvent(this.element,"change",function(e) {
			var input = _g.element;
			_g.changeHandler(input.value);
		});
	}
	,getValue: function() {
		this.value = this.element.value;
		return this.value;
	}
	,setValue: function(v) {
		this.element.value = v;
	}
	,__class__: com.wiris.quizzes.JsTextInput
});
com.wiris.quizzes.JsTextAreaInput = $hxClasses["com.wiris.quizzes.JsTextAreaInput"] = function(d,s,rows,cols) {
	com.wiris.quizzes.JsInput.call(this,d,s);
	var input = d.createElement("textarea");
	input.value = this.value;
	if(rows != null) input.rows = rows;
	if(cols != null) input.cols = cols;
	this.element = input;
};
com.wiris.quizzes.JsTextAreaInput.__name__ = ["com","wiris","quizzes","JsTextAreaInput"];
com.wiris.quizzes.JsTextAreaInput.__super__ = com.wiris.quizzes.JsInput;
com.wiris.quizzes.JsTextAreaInput.prototype = $extend(com.wiris.quizzes.JsInput.prototype,{
	getValue: function() {
		this.value = this.element.value;
		return this.value;
	}
	,setValue: function(v) {
		this.element.value = v;
	}
	,__class__: com.wiris.quizzes.JsTextAreaInput
});
com.wiris.quizzes.JsPopupInput = $hxClasses["com.wiris.quizzes.JsPopupInput"] = function(d,v) {
	com.wiris.quizzes.JsInput.call(this,d,v);
	this.popupWidth = 700;
	this.popupHeight = 500;
	this.popupName = "wirisquizzespopup";
	this.popupTitle = "WIRIS quizzes";
	this.popup = null;
};
com.wiris.quizzes.JsPopupInput.__name__ = ["com","wiris","quizzes","JsPopupInput"];
com.wiris.quizzes.JsPopupInput.__super__ = com.wiris.quizzes.JsInput;
com.wiris.quizzes.JsPopupInput.prototype = $extend(com.wiris.quizzes.JsInput.prototype,{
	addPopupChild: function(c) {
		if(this.popup == null) throw "Popup must be built before adding children to it.";
		if(this.popupChildren == null) this.popupChildren = new Array();
		this.popup.document.body.appendChild(c.element);
		this.popupChildren.push(c);
	}
	,buildPopup: function() {
	}
	,newPopup: function() {
		var _g = this;
		var currentWindow = this.getOwnerWindow();
		this.popup = currentWindow.open(com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL) + "?service=resource&name=popup.html",this.popupName,"status=no,toolbar=no,location=no,menubar=no,directories=no,scrollbars=no,resizable=yes,width=" + this.popupWidth + ",height=" + this.popupHeight);
		var html = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">" + "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"/><title>" + this.popupTitle + "</title>" + "<link rel=\"stylesheet\" type=\"text/css\" href=\"" + com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL) + "?service=resource&name=wirisquizzes.css\" />" + "</head><body class=\"wirisquizzespopup\"></body></html>";
		this.popup.document.open();
		this.popup.document.write(html);
		this.popup.document.close();
		com.wiris.quizzes.JsDomUtils.addEvent(this.popup,"unload",function(e) {
			_g.popup = null;
		});
	}
	,launchPopup: function(e) {
		if(this.popup == null || this.popup.closed) {
			this.newPopup();
			this.buildPopup();
		}
		this.popup.focus();
	}
	,popupChildren: null
	,popupTitle: null
	,popupName: null
	,popupHeight: null
	,popupWidth: null
	,popup: null
	,__class__: com.wiris.quizzes.JsPopupInput
});
com.wiris.quizzes.JsInitialCasInput = $hxClasses["com.wiris.quizzes.JsInitialCasInput"] = function(d,session) {
	com.wiris.quizzes.JsPopupInput.call(this,d,session);
	this.button = new com.wiris.quizzes.JsButton(d,this.t("initialcascontent"));
	this.button.setOnClick($bind(this,this.launchPopup));
	this.input = d.createElement("input");
	this.input.type = "hidden";
	this.element = d.createElement("span");
	this.element.appendChild(this.button.element);
	this.element.appendChild(this.input);
	this.setValue(session);
};
com.wiris.quizzes.JsInitialCasInput.__name__ = ["com","wiris","quizzes","JsInitialCasInput"];
com.wiris.quizzes.JsInitialCasInput.__super__ = com.wiris.quizzes.JsPopupInput;
com.wiris.quizzes.JsInitialCasInput.prototype = $extend(com.wiris.quizzes.JsPopupInput.prototype,{
	setEnabled: function(b) {
		this.button.setEnabled(b);
	}
	,getValue: function() {
		this.value = this.input.value;
		return this.value;
	}
	,setValue: function(v) {
		com.wiris.quizzes.JsPopupInput.prototype.setValue.call(this,v);
		this.input.value = v;
	}
	,buildPopup: function() {
		var _g = this;
		com.wiris.quizzes.JsPopupInput.prototype.buildPopup.call(this);
		var container = new com.wiris.quizzes.JsContainer(this.popup.document);
		container.addClass("wirismaincontainer");
		this.addPopupChild(container);
		var cas = new com.wiris.quizzes.JsCasInput(this.popup.document,this.getValue(),false,true);
		cas.addClass("wirispopupsimplecontent");
		container.addChild(cas);
		var submit = new com.wiris.quizzes.JsSubmitButtons(this.popup.document);
		submit.setAcceptHandler(function(e) {
			_g.setValue(cas.getValue());
		});
		container.addChild(submit);
		cas.init();
	}
	,input: null
	,button: null
	,__class__: com.wiris.quizzes.JsInitialCasInput
});
com.wiris.quizzes.JsImageMathInput = $hxClasses["com.wiris.quizzes.JsImageMathInput"] = function(d,v,grammar) {
	com.wiris.quizzes.JsPopupInput.call(this,d,v);
	this.grammar = grammar;
	this.popupWidth = 470;
	this.popupHeight = 300;
	this.popupName = "wiriseditorpopup";
	this.popupTitle = "WIRIS editor";
	this.tools = new com.wiris.quizzes.impl.HTMLTools();
	this.element = d.createElement("span");
	this.addClass("wirisimagemathinput");
	this.mathWrapper = d.createElement("span");
	this.button = new com.wiris.quizzes.JsImageButton(d,this.t("edit"),this.getIconSrc());
	this.button.setOnClick($bind(this,this.launchPopup));
	this.element.appendChild(this.mathWrapper);
	this.buttonWrapper = d.createElement("span");
	this.buttonWrapper.style.display = "inline-block";
	this.buttonWrapper.style.position = "relative";
	this.buttonWrapper.style.bottom = "-" + this.getIconUnderBaseline() + "px";
	var buttonWrapper2 = d.createElement("span");
	buttonWrapper2.style.position = "absolute";
	this.button.element.style.position = "relative";
	this.button.element.style.top = "-" + this.getIconHeight() + "px";
	buttonWrapper2.appendChild(this.button.element);
	this.buttonWrapper.appendChild(buttonWrapper2);
	this.element.appendChild(this.buttonWrapper);
	this.setValue(v);
};
com.wiris.quizzes.JsImageMathInput.__name__ = ["com","wiris","quizzes","JsImageMathInput"];
com.wiris.quizzes.JsImageMathInput.__super__ = com.wiris.quizzes.JsPopupInput;
com.wiris.quizzes.JsImageMathInput.prototype = $extend(com.wiris.quizzes.JsPopupInput.prototype,{
	setInputChangeHandler: function() {
		var _g = this;
		if(this.input != null && this.changeHandler != null) com.wiris.quizzes.JsDomUtils.addEvent(this.input,"change",function(e) {
			_g.changeHandler(_g.input.value);
		});
	}
	,addOnChangeHandler: function(handler) {
		com.wiris.quizzes.JsPopupInput.prototype.addOnChangeHandler.call(this,handler);
		this.setInputChangeHandler();
	}
	,setGrammarUrl: function(grammar) {
		this.grammar = grammar;
	}
	,buildMath: function(d) {
		this.mathWrapper = d.createElement("span");
		if(com.wiris.quizzes.impl.MathContent.getMathType(this.value) != com.wiris.quizzes.impl.MathContent.TYPE_MATHML) {
			var text = new com.wiris.quizzes.JsTextInput(d,this.value);
			this.input = text.element;
			this.mathWrapper.appendChild(this.input);
		} else {
			var image = new com.wiris.quizzes.JsMathMLImage(d,this.value);
			this.input = d.createElement("input");
			this.input.type = "hidden";
			this.input.value = this.value;
			this.mathWrapper.appendChild(image.element);
			this.mathWrapper.appendChild(this.input);
		}
		this.setInputChangeHandler();
	}
	,buildPopup: function() {
		var _g = this;
		com.wiris.quizzes.JsPopupInput.prototype.buildPopup.call(this);
		var container = new com.wiris.quizzes.JsContainer(this.popup.document);
		container.addClass("wirismaincontainer");
		var params = { };
		params.toolbar = "quizzes";
		var editor = new com.wiris.quizzes.JsEditorInput(this.popup.document,this.getValue(),params);
		editor.setGrammarUrl(this.grammar);
		editor.addClass("wirispopupsimplecontent");
		container.addChild(editor);
		var submit = new com.wiris.quizzes.JsSubmitButtons(this.popup.document);
		submit.setAcceptHandler(function(e) {
			_g.setValue(editor.getValue());
		});
		container.addChild(submit);
		this.addPopupChild(container);
	}
	,getValue: function() {
		if(this.input != null) this.value = this.input.value;
		return this.value;
	}
	,setValue: function(v) {
		if(com.wiris.quizzes.impl.MathContent.getMathType(v) == com.wiris.quizzes.impl.MathContent.TYPE_MATHML && this.tools.isTokensMathML(v)) v = this.tools.mathMLToText(v);
		this.value = v;
		var oldWrapper = this.mathWrapper;
		this.buildMath(this.getOwnerDocument());
		this.element.replaceChild(this.mathWrapper,oldWrapper);
		if(this.changeHandler != null) this.changeHandler(this.value);
	}
	,getIconSrc: function() {
		return com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL) + "?service=resource&name=editor.gif";
	}
	,getIconHeight: function() {
		return 16;
	}
	,getIconUnderBaseline: function() {
		return 2;
	}
	,tools: null
	,button: null
	,input: null
	,buttonWrapper: null
	,mathWrapper: null
	,grammar: null
	,__class__: com.wiris.quizzes.JsImageMathInput
});
com.wiris.quizzes.JsCompoundMathInput = $hxClasses["com.wiris.quizzes.JsCompoundMathInput"] = function(d,v,image,grammar) {
	com.wiris.quizzes.JsInput.call(this,d,v);
	this.image = image;
	this.grammar = grammar;
	this.element = d.createElement("div");
	this.rebuildComponent(d);
};
com.wiris.quizzes.JsCompoundMathInput.__name__ = ["com","wiris","quizzes","JsCompoundMathInput"];
com.wiris.quizzes.JsCompoundMathInput.__super__ = com.wiris.quizzes.JsInput;
com.wiris.quizzes.JsCompoundMathInput.prototype = $extend(com.wiris.quizzes.JsInput.prototype,{
	addOnChangeHandler: function(handler) {
		var _g2 = this;
		com.wiris.quizzes.JsInput.prototype.addOnChangeHandler.call(this,handler);
		var _g1 = 0, _g = this.inputs.length;
		while(_g1 < _g) {
			var i = _g1++;
			this.inputs[i].addOnChangeHandler(function(value) {
				_g2.changeHandler(_g2.getValue());
			});
		}
	}
	,setGrammarUrl: function(grammar) {
		this.grammar = grammar;
		if(this.image) {
			var _g1 = 0, _g = this.inputs.length;
			while(_g1 < _g) {
				var i = _g1++;
				var mathinput = this.inputs[i];
				mathinput.setGrammarUrl(this.grammar);
			}
		}
	}
	,setValue: function(v) {
		com.wiris.quizzes.JsInput.prototype.setValue.call(this,v);
		this.rebuildComponent(this.getOwnerDocument());
	}
	,getValue: function() {
		var i;
		var _g1 = 0, _g = this.inputs.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			this.answers[i1][1] = this.inputs[i1].getValue();
			if(com.wiris.quizzes.impl.MathContent.getMathType(this.answers[i1][1]) == com.wiris.quizzes.impl.MathContent.TYPE_TEXT) this.answers[i1][1] = new com.wiris.quizzes.impl.HTMLTools().textToMathML(this.answers[i1][1]);
		}
		var math = com.wiris.quizzes.impl.HTMLTools.joinCompoundAnswer(this.answers);
		this.value = math.content;
		return this.value;
	}
	,getMathInput: function(d,v) {
		if(this.image) return new com.wiris.quizzes.JsImageMathInput(d,v,this.grammar); else {
			if(com.wiris.quizzes.impl.MathContent.getMathType(v) == com.wiris.quizzes.impl.MathContent.TYPE_MATHML) v = new com.wiris.quizzes.impl.HTMLTools().mathMLToText(v);
			return new com.wiris.quizzes.JsTextInput(d,v);
		}
	}
	,rebuildComponent: function(d) {
		var elem = new com.wiris.quizzes.JsContainer(d);
		this.inputs = new Array();
		var math = new com.wiris.quizzes.impl.MathContent();
		math.set(this.value);
		this.answers = com.wiris.quizzes.impl.HTMLTools.parseCompoundAnswer(math);
		var i;
		var _g1 = 0, _g = this.answers.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var container = new com.wiris.quizzes.JsContainer(d);
			var label = new com.wiris.quizzes.JsMathMLImage(d,this.answers[i1][0]);
			container.addChild(label);
			var value = this.getMathInput(d,this.answers[i1][1]);
			container.addChild(value);
			this.inputs.push(value);
			elem.addChild(container);
		}
		var old = this.element.firstChild;
		if(old == null) this.element.appendChild(elem.element); else this.element.replaceChild(elem.element,old);
	}
	,grammar: null
	,answers: null
	,inputs: null
	,image: null
	,__class__: com.wiris.quizzes.JsCompoundMathInput
});
com.wiris.quizzes.JsMathMLImage = $hxClasses["com.wiris.quizzes.JsMathMLImage"] = function(d,v) {
	com.wiris.quizzes.JsComponent.call(this,d);
	this.value = v;
	this.element = d.createElement("span");
	com.wiris.quizzes.JsDomUtils.addClass(this.element,"mathml");
	var img = d.createElement("img");
	img.src = this.getRenderUrl();
	img.align = "middle";
	this.element.appendChild(img);
};
com.wiris.quizzes.JsMathMLImage.__name__ = ["com","wiris","quizzes","JsMathMLImage"];
com.wiris.quizzes.JsMathMLImage.__super__ = com.wiris.quizzes.JsComponent;
com.wiris.quizzes.JsMathMLImage.prototype = $extend(com.wiris.quizzes.JsComponent.prototype,{
	getRenderUrl: function() {
		var safeMathML = com.wiris.quizzes.impl.HTMLTools.encodeUnicodeChars(this.value);
		return com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL) + "?service=render&mml=" + StringTools.urlEncode(safeMathML);
	}
	,value: null
	,__class__: com.wiris.quizzes.JsMathMLImage
});
com.wiris.quizzes.JsChooser = $hxClasses["com.wiris.quizzes.JsChooser"] = function(d,options,v) {
	com.wiris.quizzes.JsInput.call(this,d,v);
	this.element = d.createElement("select");
	var i;
	var _g1 = 0, _g = options.length;
	while(_g1 < _g) {
		var i1 = _g1++;
		var opt = d.createElement("option");
		opt.value = options[i1][0];
		opt.appendChild(d.createTextNode(options[i1][1]));
		if(opt.value == v) opt.selected = true;
		this.element.appendChild(opt);
	}
};
com.wiris.quizzes.JsChooser.__name__ = ["com","wiris","quizzes","JsChooser"];
com.wiris.quizzes.JsChooser.__super__ = com.wiris.quizzes.JsInput;
com.wiris.quizzes.JsChooser.prototype = $extend(com.wiris.quizzes.JsInput.prototype,{
	getValue: function() {
		this.value = this.element.value;
		return this.value;
	}
	,setOnChange: function(f) {
		this.element.onchange = f;
	}
	,__class__: com.wiris.quizzes.JsChooser
});
com.wiris.quizzes.JsSubmitButtons = $hxClasses["com.wiris.quizzes.JsSubmitButtons"] = function(d,acceptButton,cancelButton) {
	com.wiris.quizzes.JsComponent.call(this,d);
	if(acceptButton == null) acceptButton = true;
	if(cancelButton == null) cancelButton = true;
	this.element = d.createElement("div");
	this.addClass("wirissubmitbuttons");
	var wrapper = d.createElement("div");
	com.wiris.quizzes.JsDomUtils.addClass(wrapper,"wirissubmitbuttonswrapper");
	if(acceptButton) {
		this.accept = new com.wiris.quizzes.JsButton(d,this.t("accept"));
		wrapper.appendChild(this.accept.element);
	}
	if(cancelButton) {
		this.cancel = new com.wiris.quizzes.JsButton(d,this.t("cancel"));
		this.cancel.setOnClick($bind(this,this.closePopup));
		wrapper.appendChild(this.cancel.element);
	}
	this.element.appendChild(wrapper);
};
com.wiris.quizzes.JsSubmitButtons.__name__ = ["com","wiris","quizzes","JsSubmitButtons"];
com.wiris.quizzes.JsSubmitButtons.__super__ = com.wiris.quizzes.JsComponent;
com.wiris.quizzes.JsSubmitButtons.prototype = $extend(com.wiris.quizzes.JsComponent.prototype,{
	setCorporateLogo: function(src,title,url) {
		var doc = this.getOwnerDocument();
		var img = doc.createElement("img");
		img.src = src;
		img.alt = title;
		img.title = title;
		var a = doc.createElement("a");
		a.href = url;
		a.title = title;
		a.appendChild(img);
		a.target = "_blank";
		var div = doc.createElement("div");
		com.wiris.quizzes.JsDomUtils.addClass(div,"wirispoweredbywrapper");
		div.appendChild(a);
		if(this.right != null) this.element.removeChild(this.right);
		this.right = div;
		this.element.appendChild(this.right);
	}
	,closePopup: function(e) {
		this.getOwnerWindow().close();
	}
	,setCancelHandler: function(f) {
		var _g = this;
		if(this.cancel != null) this.cancel.setOnClick(function(e) {
			f(e);
			_g.closePopup(e);
		});
	}
	,setAcceptHandler: function(f) {
		var _g = this;
		if(this.accept != null) this.accept.setOnClick(function(e) {
			f(e);
			_g.closePopup(e);
		});
	}
	,right: null
	,cancel: null
	,accept: null
	,__class__: com.wiris.quizzes.JsSubmitButtons
});
com.wiris.quizzes.JsButton = $hxClasses["com.wiris.quizzes.JsButton"] = function(d,label) {
	com.wiris.quizzes.JsComponent.call(this,d);
	var input = d.createElement("input");
	input.type = "button";
	input.value = label;
	this.element = input;
};
com.wiris.quizzes.JsButton.__name__ = ["com","wiris","quizzes","JsButton"];
com.wiris.quizzes.JsButton.__super__ = com.wiris.quizzes.JsComponent;
com.wiris.quizzes.JsButton.prototype = $extend(com.wiris.quizzes.JsComponent.prototype,{
	setEnabled: function(b) {
		this.element.disabled = !b;
	}
	,setOnClick: function(f) {
		this.element.onclick = f;
	}
	,__class__: com.wiris.quizzes.JsButton
});
com.wiris.quizzes.JsImageButton = $hxClasses["com.wiris.quizzes.JsImageButton"] = function(d,label,src) {
	com.wiris.quizzes.JsButton.call(this,d,label);
	this.enabled = true;
	var image = d.createElement("img");
	image.src = src;
	image.title = label;
	image.alt = label;
	image.style.cursor = "pointer";
	this.element = image;
};
com.wiris.quizzes.JsImageButton.__name__ = ["com","wiris","quizzes","JsImageButton"];
com.wiris.quizzes.JsImageButton.__super__ = com.wiris.quizzes.JsButton;
com.wiris.quizzes.JsImageButton.prototype = $extend(com.wiris.quizzes.JsButton.prototype,{
	setEnabled: function(b) {
		this.enabled = b;
	}
	,setOnClick: function(f) {
		var _g = this;
		com.wiris.quizzes.JsButton.prototype.setOnClick.call(this,function(e) {
			if(_g.enabled) f(e);
		});
	}
	,enabled: null
	,__class__: com.wiris.quizzes.JsImageButton
});
com.wiris.quizzes.JsCasInput = $hxClasses["com.wiris.quizzes.JsCasInput"] = function(d,v,library,delayload,languageLabelKey) {
	com.wiris.quizzes.JsInput.call(this,d,v);
	if(library == null) library = false;
	if(delayload == null) delayload = false;
	if(languageLabelKey == null) languageLabelKey = "algorithmlanguage";
	this.library = library;
	this.listenChanges = false;
	this.caslang = this.getCasLang();
	this.element = d.createElement("div");
	this.input = d.createElement("input");
	this.input.type = "hidden";
	this.input.id = com.wiris.quizzes.JsComponent.getNewUniqueId();
	this.element.appendChild(this.input);
	this.appletWrapper = d.createElement("div");
	com.wiris.quizzes.JsDomUtils.addClass(this.appletWrapper,"wiriscaswrapper");
	this.element.appendChild(this.appletWrapper);
	this.langChooser = new com.wiris.quizzes.JsChooser(d,this.getCasLangs(),this.caslang);
	this.langChooser.setOnChange($bind(this,this.languageSelected));
	var langChooserWrapper = new com.wiris.quizzes.JsContainer(d);
	langChooserWrapper.addClass("wirisalgorithmlanguage");
	var label = new com.wiris.quizzes.JsLabel(d,this.t(languageLabelKey),this.langChooser);
	langChooserWrapper.addChild(label);
	langChooserWrapper.addChild(this.langChooser);
	this.element.appendChild(langChooserWrapper.element);
	this.setValue(v);
	if(!delayload) this.buildCasApplet(d);
};
com.wiris.quizzes.JsCasInput.__name__ = ["com","wiris","quizzes","JsCasInput"];
com.wiris.quizzes.JsCasInput.__super__ = com.wiris.quizzes.JsInput;
com.wiris.quizzes.JsCasInput.prototype = $extend(com.wiris.quizzes.JsInput.prototype,{
	pollChanges: function() {
		var newValue = this.input.value;
		if(newValue != this.value) {
			this.value = newValue;
			if(this.changeHandler != null) this.changeHandler(this.value);
		}
		if(this.listenChanges) {
			var win = this.getOwnerWindow();
			win.setTimeout($bind(this,this.pollChanges),500);
		}
	}
	,addOnChangeHandler: function(handler) {
		com.wiris.quizzes.JsInput.prototype.addOnChangeHandler.call(this,handler);
		this.listenChanges = true;
		this.pollChanges();
	}
	,getEmptyWirisCasSession: function() {
		var session = "<session lang=\"" + this.caslang + "\" version=\"2.0\">";
		if(this.library) session += "<library closed=\"false\"><mtext style=\"color:#ffc800\" xml:lang=\"" + this.caslang + "\">variables</mtext>";
		session += "<group><command><input><math xmlns=\"http://www.w3.org/1998/Math/MathML\"/></input></command></group>";
		if(this.library) session += "</library>";
		session += "</session>";
		return session;
	}
	,setValue: function(v) {
		com.wiris.quizzes.JsInput.prototype.setValue.call(this,v);
		if(this.isEmpty()) this.value = this.getEmptyWirisCasSession();
		this.input.value = this.value;
	}
	,getValue: function() {
		this.value = this.input.value;
		return this.value;
	}
	,isEmpty: function() {
		return com.wiris.quizzes.impl.HTMLTools.emptyCasSession(this.value);
	}
	,getCasLang: function() {
		var caslang = "en";
		var start;
		if(this.value != null && (start = this.value.indexOf("<session")) != -1) {
			var end = this.value.indexOf(">",start + 1);
			start = this.value.indexOf("lang",start);
			if(start == -1 || start > end) return null;
			start = this.value.indexOf("\"",start) + 1;
			caslang = HxOverrides.substr(this.value,start,2);
		} else {
			var caslangs = this.getCasLangs();
			var i;
			var _g1 = 0, _g = caslangs.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				if(caslangs[i1][0] == this.getLang()) {
					caslang = this.getLang();
					break;
				}
			}
		}
		return caslang;
	}
	,getCasLangs: function() {
		var langs = [["ca",this.t("catalan")],["en",this.t("english")],["es",this.t("spanish")],["et",this.t("estonian")],["eu",this.t("basque")],["fr",this.t("french")],["de",this.t("german")],["it",this.t("italian")],["nl",this.t("dutch")],["pt",this.t("portuguese")]];
		return langs;
	}
	,loadApplet2: function() {
		var appletHtml = "<applet name=\"WIRIS cas\" codeBase=\"" + com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.WIRIS_URL) + "/wiris-codebase\" " + "code=\"WirisApplet_net_" + this.caslang + "\" archive=\"wrs_net_" + this.caslang + ".jar\" height=\"100%\" width=\"100%\" >" + "<param name=\"command\" value=\"false\"/>" + "<param name=\"commands\" value=\"false\"/>" + "<param name=\"interface\" value=\"false\"/>" + "<param name=\"syncElementId\" value=\"" + this.input.id + "\"/>" + "<p>" + this.t("javaAppletMissing") + "</p>" + "</applet>";
		this.appletWrapper.innerHTML = appletHtml;
		this.applet = this.appletWrapper.getElementsByTagName("applet")[0];
	}
	,buildCasApplet: function(d) {
		haxe.Timer.delay($bind(this,this.loadApplet2),150);
	}
	,languageSelected: function(e) {
		var newlang = this.langChooser.getValue();
		if(newlang != this.caslang) {
			this.caslang = newlang;
			this.getValue();
			if(!this.isEmpty()) {
				var builder = com.wiris.quizzes.api.QuizzesBuilder.getInstance();
				var question = builder.newQuestion();
				question.wirisCasSession = this.getValue();
				var req = builder.newTranslationRequest(question,this.caslang);
				try {
					var service = builder.getQuizzesService();
					question.update(service.execute(req));
					this.setValue(question.wirisCasSession);
				} catch( e1 ) {
					js.Lib.alert(e1);
				}
			} else this.setValue("");
			this.applet = null;
			this.buildCasApplet(this.getOwnerDocument());
		}
	}
	,init: function() {
		if(this.applet == null) this.buildCasApplet(this.getOwnerDocument());
	}
	,listenChanges: null
	,library: null
	,input: null
	,langChooser: null
	,appletWrapper: null
	,applet: null
	,caslang: null
	,__class__: com.wiris.quizzes.JsCasInput
});
com.wiris.quizzes.JsLabel = $hxClasses["com.wiris.quizzes.JsLabel"] = function(d,text,input) {
	com.wiris.quizzes.JsComponent.call(this,d);
	this.element = d.createElement("label");
	this.element.appendChild(d.createTextNode(this.t(text)));
	this.element.setAttribute("for",input.getElementId());
	this.addClass("wirisleftlabel");
};
com.wiris.quizzes.JsLabel.__name__ = ["com","wiris","quizzes","JsLabel"];
com.wiris.quizzes.JsLabel.__super__ = com.wiris.quizzes.JsComponent;
com.wiris.quizzes.JsLabel.prototype = $extend(com.wiris.quizzes.JsComponent.prototype,{
	__class__: com.wiris.quizzes.JsLabel
});
com.wiris.quizzes.JsEditorInput = $hxClasses["com.wiris.quizzes.JsEditorInput"] = function(d,v,params) {
	com.wiris.quizzes.JsInput.call(this,d,v);
	if(params == null) params = { };
	this.params = params;
	if(this.params.language == null) this.params.language = this.getLang();
	if(this.params.forceReservedWords == null) this.params.forceReservedWords = "true";
	this.element = d.createElement("div");
	com.wiris.quizzes.JsDomUtils.addClass(this.element,"wiriseditorwrapper");
	if(!this.isEditorScriptLoaded()) this.addEditorScript(d);
	this.loadEditor();
};
com.wiris.quizzes.JsEditorInput.__name__ = ["com","wiris","quizzes","JsEditorInput"];
com.wiris.quizzes.JsEditorInput.getReservedWords = function(grammarurl,callbackFunction) {
	grammarurl += grammarurl.indexOf("?") != -1?"&":"?";
	grammarurl += "reservedWords=true";
	var proxyurl = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL);
	var http = new haxe.Http(proxyurl);
	http.async = true;
	http.setParameter("service","url");
	http.setParameter("url",grammarurl);
	http.setHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");
	http.onData = callbackFunction;
	http.request(true);
}
com.wiris.quizzes.JsEditorInput.__super__ = com.wiris.quizzes.JsInput;
com.wiris.quizzes.JsEditorInput.prototype = $extend(com.wiris.quizzes.JsInput.prototype,{
	getEditorAsync: function() {
		if(this.editor != null) this.getEditorCallback(this.editor); else {
			var win = this.getOwnerWindow();
			win.setTimeout($bind(this,this.getEditorAsync),200);
		}
	}
	,getEditor: function(callbackFunction) {
		if(callbackFunction != null) {
			this.getEditorCallback = callbackFunction;
			this.getEditorAsync();
		}
		return this.editor;
	}
	,setEditorListener: function() {
		if(this.editor != null) this.editor.getEditorModel().addEditorListener(new com.wiris.quizzes.QuizzesEditorListener(this.changeHandler)); else {
			var win = this.getOwnerWindow();
			win.setTimeout($bind(this,this.setEditorListener),200);
		}
	}
	,addOnChangeHandler: function(handler) {
		var _g = this;
		com.wiris.quizzes.JsInput.prototype.addOnChangeHandler.call(this,function(value) {
			_g.value = value;
			handler(value);
		});
		this.setEditorListener();
	}
	,setGrammarUrl: function(grammar,check) {
		if(check == null) check = true;
		var params = new Hash();
		params.set("grammarURL",grammar);
		params.set("checkSyntax",check?"true":"false");
		this.setParams(params);
		this.updateReservedWords(grammar);
	}
	,setParams: function(parameters) {
		var it = parameters.keys();
		var dynparam = { };
		while(it.hasNext()) {
			var key = it.next();
			this.params[key] = parameters.get(key);
			dynparam[key] = parameters.get(key);
		}
		if(this.editor != null) this.editor.setParams(dynparam);
	}
	,updateReservedWords: function(grammarurl) {
		var _g = this;
		var callbackFunction = function(data) {
			var params = new Hash();
			params.set("reservedWords",data);
			var value = _g.getValue();
			_g.setParams(params);
		};
		com.wiris.quizzes.JsEditorInput.getReservedWords(grammarurl,callbackFunction);
	}
	,getValue: function() {
		return this.value;
	}
	,setValue: function(s) {
		com.wiris.quizzes.JsInput.prototype.setValue.call(this,s);
		if(com.wiris.quizzes.impl.MathContent.getMathType(this.value) != com.wiris.quizzes.impl.MathContent.TYPE_MATHML) this.value = new com.wiris.quizzes.impl.HTMLTools().textToMathML(this.value);
		if(this.editor != null) this.editor.setMathML(this.value);
	}
	,isEditorScriptLoaded: function() {
		var win = this.getOwnerWindow();
		return win.com != null && win.com.wiris != null && win.com.wiris.jsEditor != null && win.com.wiris.jsEditor.JsEditor != null;
	}
	,loadEditor: function() {
		var _g = this;
		var win = this.getOwnerWindow();
		if(this.isEditorScriptLoaded()) {
			var params = this.params;
			try {
				this.editor = win.com.wiris.jsEditor.JsEditor.newInstance(params);
			} catch( e ) {
				js.Lib.alert(e);
			}
			this.editor.insertInto(this.element);
			this.setValue(this.value);
			if(this.changeHandler == null) {
				this.changeHandler = function(value) {
					_g.value = value;
				};
				this.setEditorListener();
			}
		} else if(win != null && !win.closed) win.setTimeout($bind(this,this.loadEditor),200);
	}
	,addEditorScript: function(d) {
		var found = false;
		var url = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.EDITOR_URL) + "/editor";
		var scripts = d.getElementsByTagName("script");
		var i;
		var _g1 = 0, _g = scripts.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var script = scripts[i1];
			if(script.src == url) found = true;
		}
		if(!found) {
			var script = d.createElement("script");
			script.setAttribute("type","text/javascript");
			script.setAttribute("src",url);
			d.getElementsByTagName("head")[0].appendChild(script);
		}
	}
	,getEditorCallback: null
	,params: null
	,editor: null
	,__class__: com.wiris.quizzes.JsEditorInput
});
com.wiris.quizzes.JsStudentAnswerInput = $hxClasses["com.wiris.quizzes.JsStudentAnswerInput"] = function(d,v,type,label,grammar,checkSyntax) {
	com.wiris.quizzes.JsInput.call(this,d,v);
	this.type = type;
	this.label = label;
	this.fieldset = this.label != null;
	this.grammar = grammar;
	this.element = d.createElement("div");
	this.checkSyntax = checkSyntax != null?checkSyntax:true;
};
com.wiris.quizzes.JsStudentAnswerInput.__name__ = ["com","wiris","quizzes","JsStudentAnswerInput"];
com.wiris.quizzes.JsStudentAnswerInput.__super__ = com.wiris.quizzes.JsInput;
com.wiris.quizzes.JsStudentAnswerInput.prototype = $extend(com.wiris.quizzes.JsInput.prototype,{
	getEditorInput: function() {
		var editor;
		if(this.input == null) {
			if(this.editorParams == null) this.editorParams = { };
			if(this.editorParams.toolbar == null) this.editorParams.toolbar = "quizzes";
			editor = new com.wiris.quizzes.JsEditorInput(this.getOwnerDocument(),this.value,this.editorParams);
			if(this.grammar != null) editor.setGrammarUrl(this.grammar,this.checkSyntax);
			this.input = editor;
		} else editor = this.input;
		return editor;
	}
	,getEditorAsync: function(listener) {
		if(this.type == com.wiris.quizzes.JsStudentAnswerInput.TYPE_EDITOR) {
			var editor = this.getEditorInput();
			editor.getEditor($bind(listener,listener.onGetEditor));
		}
	}
	,getEditor: function() {
		if(this.type == com.wiris.quizzes.JsStudentAnswerInput.TYPE_EDITOR) {
			var editor = this.getEditorInput();
			return editor.getEditor();
		}
		return null;
	}
	,setEditorInitialParams: function(editorParams) {
		if(this.type == com.wiris.quizzes.JsStudentAnswerInput.TYPE_EDITOR && this.input != null) throw "WIRIS editor already initialized.";
		this.editorParams = editorParams;
	}
	,addOnChangeHandler: function(handler) {
		com.wiris.quizzes.JsInput.prototype.addOnChangeHandler.call(this,handler);
		if(this.input != null) this.input.addOnChangeHandler(handler);
	}
	,setGrammarUrl: function(grammar) {
		this.grammar = grammar;
		if(this.input != null) switch(this.type) {
		case com.wiris.quizzes.JsStudentAnswerInput.TYPE_EDITOR:
			var mathinput = this.input;
			mathinput.setGrammarUrl(this.grammar,this.checkSyntax);
			break;
		case com.wiris.quizzes.JsStudentAnswerInput.TYPE_IMAGEMATH:
			var mathinput = this.input;
			mathinput.setGrammarUrl(this.grammar);
			break;
		case com.wiris.quizzes.JsStudentAnswerInput.TYPE_COMPOUND_IMAGEMATH:
			var mathinput = this.input;
			mathinput.setGrammarUrl(this.grammar);
			break;
		}
	}
	,isCompound: function() {
		return this.type == com.wiris.quizzes.JsStudentAnswerInput.TYPE_COMPOUND_TEXTFIELD || this.type == com.wiris.quizzes.JsStudentAnswerInput.TYPE_COMPOUND_IMAGEMATH;
	}
	,isText: function() {
		return this.type == com.wiris.quizzes.JsStudentAnswerInput.TYPE_TEXTFIELD || this.type == com.wiris.quizzes.JsStudentAnswerInput.TYPE_COMPOUND_TEXTFIELD;
	}
	,buildInput: function(d) {
		switch(this.type) {
		case com.wiris.quizzes.JsStudentAnswerInput.TYPE_TEXTFIELD:
			this.input = new com.wiris.quizzes.JsTextInput(d,this.value);
			break;
		case com.wiris.quizzes.JsStudentAnswerInput.TYPE_IMAGEMATH:
			this.input = new com.wiris.quizzes.JsImageMathInput(d,this.value,this.grammar);
			break;
		case com.wiris.quizzes.JsStudentAnswerInput.TYPE_EDITOR:
			this.getEditor();
			break;
		case com.wiris.quizzes.JsStudentAnswerInput.TYPE_COMPOUND_TEXTFIELD:
			this.input = new com.wiris.quizzes.JsCompoundMathInput(d,this.value,false,this.grammar);
			break;
		case com.wiris.quizzes.JsStudentAnswerInput.TYPE_COMPOUND_IMAGEMATH:
			this.input = new com.wiris.quizzes.JsCompoundMathInput(d,this.value,true,this.grammar);
			break;
		default:
			throw "Illegal student answer input type " + this.type + ".";
		}
		if(this.changeHandler != null) this.input.addOnChangeHandler(this.changeHandler);
		if(this.fieldset && this.type != com.wiris.quizzes.JsStudentAnswerInput.TYPE_EDITOR) {
			var f = new com.wiris.quizzes.JsFieldset(d,this.label,true);
			f.addChild(this.input);
			this.wrapper = f.element;
		} else this.wrapper = this.input.element;
	}
	,setType: function(t) {
		if(t != this.type) {
			this.type = t;
			var old = this.wrapper;
			var value = this.getValue();
			if(com.wiris.quizzes.impl.MathContent.getMathType(value) == com.wiris.quizzes.impl.MathContent.TYPE_MATHML) this.lastMathML = value;
			this.input = null;
			this.buildInput(this.getOwnerDocument());
			this.element.replaceChild(this.wrapper,old);
			if(this.lastMathML != null && com.wiris.quizzes.impl.MathContent.getMathType(value) == com.wiris.quizzes.impl.MathContent.TYPE_TEXT && new com.wiris.quizzes.impl.HTMLTools().mathMLToText(this.lastMathML) == value) value = this.lastMathML;
			this.setValue(value);
		}
	}
	,setValue: function(v) {
		if(this.type == com.wiris.quizzes.JsStudentAnswerInput.TYPE_TEXTFIELD && com.wiris.quizzes.impl.MathContent.getMathType(v) == com.wiris.quizzes.impl.MathContent.TYPE_MATHML) v = new com.wiris.quizzes.impl.HTMLTools().mathMLToText(v);
		this.value = v;
		if(this.input != null) this.input.setValue(this.value);
	}
	,getValue: function() {
		if(this.input != null) this.value = this.input.getValue();
		return this.value;
	}
	,getElement: function() {
		this.buildInput(this.getOwnerDocument());
		this.element.appendChild(this.wrapper);
		return com.wiris.quizzes.JsInput.prototype.getElement.call(this);
	}
	,lastMathML: null
	,editorParams: null
	,checkSyntax: null
	,grammar: null
	,type: null
	,fieldset: null
	,label: null
	,wrapper: null
	,input: null
	,__class__: com.wiris.quizzes.JsStudentAnswerInput
});
com.wiris.quizzes.JsFieldset = $hxClasses["com.wiris.quizzes.JsFieldset"] = function(d,label,top) {
	com.wiris.quizzes.JsComponent.call(this,d);
	this.element = d.createElement("fieldset");
	this.addClass("wirisfieldset");
	if(top) this.addClass("wirismainfieldset");
	if(label != null) {
		var legend = d.createElement("legend");
		legend.appendChild(d.createTextNode(label));
		this.element.appendChild(legend);
		if(top) com.wiris.quizzes.JsDomUtils.addClass(legend,"wirismainfieldset");
	}
};
com.wiris.quizzes.JsFieldset.__name__ = ["com","wiris","quizzes","JsFieldset"];
com.wiris.quizzes.JsFieldset.__super__ = com.wiris.quizzes.JsComponent;
com.wiris.quizzes.JsFieldset.prototype = $extend(com.wiris.quizzes.JsComponent.prototype,{
	__class__: com.wiris.quizzes.JsFieldset
});
com.wiris.quizzes.JsStudioInput = $hxClasses["com.wiris.quizzes.JsStudioInput"] = function(d,v,q,qi,index,conf) {
	this.htmlguiconf = conf;
	this.index = index;
	com.wiris.quizzes.JsImageMathInput.call(this,d,v,null);
	this.htmlgui = new com.wiris.quizzes.impl.HTMLGui(this.getLang());
	this.popupWidth = 800;
	this.popupHeight = 600;
	this.popupName = "wirisstudiopopup";
	this.popupTitle = "WIRIS quizzes studio";
	this.summaryWrapper = d.createElement("span");
	this.element.appendChild(this.summaryWrapper);
	this.question = q;
	this.instance = qi;
	this.updateSummary();
	if(com.wiris.quizzes.JsStudioInput.inputs == null) com.wiris.quizzes.JsStudioInput.inputs = new Array();
	com.wiris.quizzes.JsStudioInput.inputs.push(this);
	this.addOnChangeHandler($bind(this,this.setCorrectAnswer));
};
com.wiris.quizzes.JsStudioInput.__name__ = ["com","wiris","quizzes","JsStudioInput"];
com.wiris.quizzes.JsStudioInput.inputs = null;
com.wiris.quizzes.JsStudioInput.__super__ = com.wiris.quizzes.JsImageMathInput;
com.wiris.quizzes.JsStudioInput.prototype = $extend(com.wiris.quizzes.JsImageMathInput.prototype,{
	setCorrectAnswer: function(value) {
		var qq = (js.Boot.__cast(this.question , com.wiris.quizzes.impl.QuestionInternal)).getImpl();
		if(value != null && value.length > 0) qq.setCorrectAnswer(this.index,value); else if(qq.correctAnswers != null) qq.removeCorrectAnswer(this.index);
	}
	,addOnChangeHandler: function(handler) {
		var _g = this;
		com.wiris.quizzes.JsImageMathInput.prototype.addOnChangeHandler.call(this,function(value) {
			_g.setCorrectAnswer(value);
			handler(value);
		});
	}
	,copyQuestion: function() {
		var serialized = this.question.serialize();
		var newQuestion = com.wiris.quizzes.api.QuizzesBuilder.getInstance().readQuestion(serialized);
		return newQuestion;
	}
	,updateQuestion: function(q) {
		var thisq = this.question.getImpl();
		var qq = q.getImpl();
		thisq.id = qq.id;
		thisq.wirisCasSession = qq.wirisCasSession;
		thisq.correctAnswers = qq.correctAnswers;
		thisq.assertions = qq.assertions;
		thisq.options = qq.options;
		thisq.localData = qq.localData;
	}
	,updateSummaries: function() {
		var i;
		var _g1 = 0, _g = com.wiris.quizzes.JsStudioInput.inputs.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			com.wiris.quizzes.JsStudioInput.inputs[i1].updateSummary();
		}
	}
	,checkConfirmExit: function(studio) {
		var _g = this;
		return function(e) {
			if(_g.confirmExit) return;
			var qq = (js.Boot.__cast(_g.question , com.wiris.quizzes.impl.QuestionInternal)).getImpl();
			if(qq.isEquivalent((js.Boot.__cast(studio.getQuestion() , com.wiris.quizzes.impl.QuestionInternal)).getImpl())) return;
			var me = _g;
			var v = v || me.popup.event;
			var text = _g.t("yourchangeswillbelost");
			if(v != null) v.returnValue = text;
			return text;
		};
	}
	,buildPopup: function() {
		var _g = this;
		var container = new com.wiris.quizzes.JsContainer(this.popup.document);
		if(this.htmlguiconf.optOpenAnswer) this.question.setCorrectAnswer(this.index,this.getValue());
		var studio = new com.wiris.quizzes.JsStudio(this.popup.document,this.copyQuestion(),this.instance,this.index,this.htmlguiconf);
		container.addChild(studio);
		var submit = new com.wiris.quizzes.JsSubmitButtons(this.popup.document);
		submit.setAcceptHandler(function(e) {
			_g.confirmExit = true;
			_g.updateQuestion(studio.getQuestion());
			if(_g.htmlguiconf.optOpenAnswer) _g.setValue(studio.getCorrectAnswer()); else if(_g.changeHandler != null) _g.changeHandler(null);
			_g.updateSummaries();
		});
		submit.setCancelHandler(function(e) {
			_g.confirmExit = true;
		});
		submit.setCorporateLogo(com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL) + "?service=resource&name=poweredbywiris.png",this.t("poweredbywiris"),"http://www.wiris.com/quizzes");
		container.addChild(submit);
		this.addPopupChild(container);
		studio.init();
		this.confirmExit = false;
		var checkFunction = this.checkConfirmExit(studio);
		this.popup.onbeforeunload = checkFunction;
	}
	,buildMath: function(d) {
		if(this.htmlguiconf.optOpenAnswer) com.wiris.quizzes.JsImageMathInput.prototype.buildMath.call(this,d);
	}
	,getQuestion: function() {
		return this.question;
	}
	,updateSummary: function() {
		var h = new com.wiris.quizzes.impl.HTML();
		this.htmlgui.printAssertionsSummary(h,(js.Boot.__cast(this.question , com.wiris.quizzes.impl.QuestionInternal)).getImpl(),this.index,0,this.htmlguiconf);
		this.summaryWrapper.innerHTML = h.getString();
	}
	,getIconUnderBaseline: function() {
		return 4;
	}
	,getIconHeight: function() {
		return 24;
	}
	,getIconSrc: function() {
		return com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL) + "?service=resource&name=studio.gif";
	}
	,confirmExit: null
	,htmlguiconf: null
	,htmlgui: null
	,summaryWrapper: null
	,options: null
	,instance: null
	,question: null
	,index: null
	,__class__: com.wiris.quizzes.JsStudioInput
});
com.wiris.quizzes.api.ui.AuthoringField = $hxClasses["com.wiris.quizzes.api.ui.AuthoringField"] = function() { }
com.wiris.quizzes.api.ui.AuthoringField.__name__ = ["com","wiris","quizzes","api","ui","AuthoringField"];
com.wiris.quizzes.api.ui.AuthoringField.__interfaces__ = [com.wiris.quizzes.api.ui.QuizzesField];
com.wiris.quizzes.api.ui.AuthoringField.prototype = {
	showGradingFunction: null
	,showAuxiliarCasReplaceEditor: null
	,showAuxiliarCas: null
	,showCorrectAnswer: null
	,showPreviewTab: null
	,showVariablesTab: null
	,showValidationTab: null
	,showCorrectAnswerTab: null
	,getFieldType: null
	,setFieldType: null
	,__class__: com.wiris.quizzes.api.ui.AuthoringField
}
com.wiris.quizzes.JsAuthoringInput = $hxClasses["com.wiris.quizzes.JsAuthoringInput"] = function(d,v,q,qi,index) {
	if(v == null) v = "";
	com.wiris.quizzes.JsInput.call(this,d,v);
	this.index = index;
	this.question = q;
	this.instance = qi;
	this.type = com.wiris.quizzes.api.ui.QuizzesUIConstants.INLINE_EDITOR;
	this.htmlguiconf = new com.wiris.quizzes.impl.HTMLGuiConfig(null);
};
com.wiris.quizzes.JsAuthoringInput.__name__ = ["com","wiris","quizzes","JsAuthoringInput"];
com.wiris.quizzes.JsAuthoringInput.__interfaces__ = [com.wiris.quizzes.api.ui.AuthoringField];
com.wiris.quizzes.JsAuthoringInput.__super__ = com.wiris.quizzes.JsInput;
com.wiris.quizzes.JsAuthoringInput.prototype = $extend(com.wiris.quizzes.JsInput.prototype,{
	showGradingFunction: function(visible) {
		this.htmlguiconf.optGradingFunction = visible;
	}
	,showAuxiliarCasReplaceEditor: function(visible) {
		this.htmlguiconf.optAuxiliarCasReplaceEditor = visible;
	}
	,showAuxiliarCas: function(visible) {
		this.htmlguiconf.optAuxiliarCas = visible;
	}
	,showCorrectAnswer: function(visible) {
		this.htmlguiconf.optOpenAnswer = visible;
	}
	,showPreviewTab: function(visible) {
		this.htmlguiconf.tabPreview = visible;
	}
	,showVariablesTab: function(visible) {
		this.htmlguiconf.tabVariables = visible;
	}
	,showValidationTab: function(visible) {
		this.htmlguiconf.tabValidation = visible;
	}
	,showCorrectAnswerTab: function(visible) {
		this.htmlguiconf.tabCorrectAnswer = visible;
	}
	,getFieldType: function() {
		return this.type;
	}
	,setFieldType: function(type) {
		if(type == com.wiris.quizzes.api.ui.QuizzesUIConstants.STUDIO || type == com.wiris.quizzes.api.ui.QuizzesUIConstants.INLINE_EDITOR) this.type = type; else throw "Invalid parameter type.";
	}
	,getQuestion: function() {
		var q;
		if(this.type == com.wiris.quizzes.api.ui.QuizzesUIConstants.STUDIO) q = this.studio.getQuestion(); else q = this.question;
		var qq = q.getImpl();
		qq.setCorrectAnswer(this.index,this.getValue());
		return q;
	}
	,getValue: function() {
		this.value = this.input.getValue();
		return this.value;
	}
	,getElement: function() {
		this.buildElement();
		return com.wiris.quizzes.JsInput.prototype.getElement.call(this);
	}
	,buildElement: function() {
		if(this.type == com.wiris.quizzes.api.ui.QuizzesUIConstants.STUDIO) {
			this.studio = new com.wiris.quizzes.JsStudioInput(this.getOwnerDocument(),this.value,this.question,this.instance,this.index,this.htmlguiconf);
			this.input = this.studio;
		} else {
			var params = { };
			params.toolbar = "quizzes";
			this.input = new com.wiris.quizzes.JsEditorInput(this.getOwnerDocument(),this.value,params);
		}
		if(this.changeHandler != null) this.input.addOnChangeHandler(this.changeHandler);
		this.element = this.input.element;
	}
	,htmlguiconf: null
	,index: null
	,instance: null
	,question: null
	,type: null
	,studio: null
	,input: null
	,__class__: com.wiris.quizzes.JsAuthoringInput
});
com.wiris.quizzes.api.ui.AnswerField = $hxClasses["com.wiris.quizzes.api.ui.AnswerField"] = function() { }
com.wiris.quizzes.api.ui.AnswerField.__name__ = ["com","wiris","quizzes","api","ui","AnswerField"];
com.wiris.quizzes.api.ui.AnswerField.__interfaces__ = [com.wiris.quizzes.api.ui.QuizzesField];
com.wiris.quizzes.api.ui.AnswerField.prototype = {
	getEditorAsync: null
	,getEditor: null
	,setEditorInitialParams: null
	,getFieldType: null
	,__class__: com.wiris.quizzes.api.ui.AnswerField
}
com.wiris.quizzes.JsAnswerInput = $hxClasses["com.wiris.quizzes.JsAnswerInput"] = function(d,v,q,qi,index) {
	if(v == null) v = "";
	com.wiris.quizzes.JsStudentAnswerInput.call(this,d,this.answerValue(v,q,qi),this.getStudentAnswerInputType(q),null,(js.Boot.__cast(q , com.wiris.quizzes.impl.QuestionInternal)).getImpl().getGrammarUrl(index));
	this.question = q;
	this.instance = qi;
	this.addClass("wirisstudentanswer");
};
com.wiris.quizzes.JsAnswerInput.__name__ = ["com","wiris","quizzes","JsAnswerInput"];
com.wiris.quizzes.JsAnswerInput.__interfaces__ = [com.wiris.quizzes.api.ui.AnswerField];
com.wiris.quizzes.JsAnswerInput.__super__ = com.wiris.quizzes.JsStudentAnswerInput;
com.wiris.quizzes.JsAnswerInput.prototype = $extend(com.wiris.quizzes.JsStudentAnswerInput.prototype,{
	getStudentAnswerInputType: function(question) {
		var type = 0;
		var qq = question.getImpl();
		var inputfield = qq.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_INPUT_FIELD);
		if(qq.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER) == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE) {
			if(inputfield == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT) type = com.wiris.quizzes.JsStudentAnswerInput.TYPE_COMPOUND_TEXTFIELD; else type = com.wiris.quizzes.JsStudentAnswerInput.TYPE_COMPOUND_IMAGEMATH;
		} else if(inputfield == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT) type = com.wiris.quizzes.JsStudentAnswerInput.TYPE_TEXTFIELD; else if(inputfield == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_POPUP_EDITOR) type = com.wiris.quizzes.JsStudentAnswerInput.TYPE_IMAGEMATH; else if(inputfield == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_INLINE_EDITOR) type = com.wiris.quizzes.JsStudentAnswerInput.TYPE_EDITOR;
		return type;
	}
	,answerValue: function(v,q,qi) {
		var qq = q.getImpl();
		if(qq.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER) == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE && com.wiris.quizzes.impl.MathContent.isEmpty(v) && qq.correctAnswers != null && qq.correctAnswers.length > 0) {
			var parsed = com.wiris.quizzes.impl.HTMLTools.parseCompoundAnswer(qq.correctAnswers[0]);
			var i;
			var _g1 = 0, _g = parsed.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				parsed[i1][1] = "";
			}
			v = com.wiris.quizzes.impl.HTMLTools.joinCompoundAnswer(parsed).content;
		}
		return v;
	}
	,getFieldType: function() {
		var qq = this.question.getImpl();
		return qq.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_INPUT_FIELD);
	}
	,instance: null
	,question: null
	,__class__: com.wiris.quizzes.JsAnswerInput
});
com.wiris.quizzes.JsAuxiliarCasInput = $hxClasses["com.wiris.quizzes.JsAuxiliarCasInput"] = function(d,v,q,qi,index,classes) {
	com.wiris.quizzes.JsInput.call(this,d,v);
	this.question = q;
	this.instance = qi;
	var qq = q.getImpl();
	var ii = qi;
	if(qq.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_SHOW_CAS) != com.wiris.quizzes.impl.LocalData.VALUE_SHOW_CAS_FALSE) {
		if(ii.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_CAS_SESSION) == null) ii.setLocalData(com.wiris.quizzes.impl.LocalData.KEY_CAS_SESSION,qq.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_CAS_INITIAL_SESSION));
		this.cas = new com.wiris.quizzes.JsCasInput(d,ii.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_CAS_SESSION),false,false,"calculatorlanguage");
		var container = new com.wiris.quizzes.JsFieldset(d,null,true);
		container.addClass("wirisauxiliarcas");
		container.addChild(this.cas);
		this.element = container.element;
		this.cas.addOnChangeHandler($bind(this,this.updateQuestionInstance));
	}
};
com.wiris.quizzes.JsAuxiliarCasInput.__name__ = ["com","wiris","quizzes","JsAuxiliarCasInput"];
com.wiris.quizzes.JsAuxiliarCasInput.__super__ = com.wiris.quizzes.JsInput;
com.wiris.quizzes.JsAuxiliarCasInput.prototype = $extend(com.wiris.quizzes.JsInput.prototype,{
	addOnChangeHandler: function(handler) {
		var _g = this;
		if(this.cas != null) this.cas.addOnChangeHandler(function(value) {
			_g.updateQuestionInstance(value);
			handler(value);
		});
	}
	,getValue: function() {
		this.value = this.cas.getValue();
		return this.value;
	}
	,updateQuestionInstance: function(value) {
		var ii = this.instance;
		ii.setLocalData(com.wiris.quizzes.impl.LocalData.KEY_CAS_SESSION,value);
	}
	,cas: null
	,instance: null
	,question: null
	,__class__: com.wiris.quizzes.JsAuxiliarCasInput
});
com.wiris.quizzes.JsActionsMenu = $hxClasses["com.wiris.quizzes.JsActionsMenu"] = function(d) {
	com.wiris.quizzes.JsComponent.call(this,d);
	this.element = d.createElement("div");
	com.wiris.quizzes.JsDomUtils.addClass(this.element,"wirisactionswrapper");
	this.actions = d.createElement("ul");
	com.wiris.quizzes.JsDomUtils.addClass(this.actions,"wirisactionslist");
	this.element.appendChild(this.actions);
};
com.wiris.quizzes.JsActionsMenu.__name__ = ["com","wiris","quizzes","JsActionsMenu"];
com.wiris.quizzes.JsActionsMenu.__super__ = com.wiris.quizzes.JsComponent;
com.wiris.quizzes.JsActionsMenu.prototype = $extend(com.wiris.quizzes.JsComponent.prototype,{
	addAction: function(name,func) {
		var d = this.getOwnerDocument();
		var li = d.createElement("li");
		this.actions.appendChild(li);
		var a = d.createElement("a");
		li.appendChild(a);
		var text = d.createTextNode(name);
		a.appendChild(text);
		com.wiris.quizzes.JsDomUtils.addEvent(a,"click",function(e) {
			func();
		});
	}
	,map: null
	,actions: null
	,__class__: com.wiris.quizzes.JsActionsMenu
});
com.wiris.quizzes.JsVerticalTabs = $hxClasses["com.wiris.quizzes.JsVerticalTabs"] = function(d,start) {
	com.wiris.quizzes.JsComponent.call(this,d);
	this.started = start;
	this.element = d.createElement("div");
	this.addClass("wiristabs");
	this.left = d.createElement("div");
	com.wiris.quizzes.JsDomUtils.addClass(this.left,"wiristabsleftcolumn");
	this.element.appendChild(this.left);
	var menuwrapper = d.createElement("div");
	com.wiris.quizzes.JsDomUtils.addClass(menuwrapper,"wiristablistwrapper");
	this.menu = d.createElement("ul");
	com.wiris.quizzes.JsDomUtils.addClass(this.menu,"wiristablist");
	menuwrapper.appendChild(this.menu);
	this.left.appendChild(menuwrapper);
	this.help = d.createElement("div");
	com.wiris.quizzes.JsDomUtils.addClass(this.help,"wirishelpwrapper");
	this.left.appendChild(this.help);
	this.main = d.createElement("div");
	com.wiris.quizzes.JsDomUtils.addClass(this.main,"wiristabcontentwrapper");
	this.element.appendChild(this.main);
	this.setEmpty();
};
com.wiris.quizzes.JsVerticalTabs.__name__ = ["com","wiris","quizzes","JsVerticalTabs"];
com.wiris.quizzes.JsVerticalTabs.__super__ = com.wiris.quizzes.JsComponent;
com.wiris.quizzes.JsVerticalTabs.prototype = $extend(com.wiris.quizzes.JsComponent.prototype,{
	reset: function() {
		while(this.menu.firstChild != null) this.menu.removeChild(this.menu.firstChild);
		while(this.help.firstChild != null) this.help.removeChild(this.help.firstChild);
		while(this.main.firstChild != null) this.main.removeChild(this.main.firstChild);
		this.setEmpty();
	}
	,init: function() {
		this.started = true;
		this.main.removeChild(this.loading);
		this.loading = null;
		this.setActive(this.current);
	}
	,getElementTabIndex: function(elem) {
		var tabs = this.main.childNodes;
		var _g1 = 0, _g = tabs.length;
		while(_g1 < _g) {
			var i = _g1++;
			if(tabs[i] == elem) return this.loading != null?i - 1:i;
		}
		if(elem.parentNode == null) return -1;
		return this.getElementTabIndex(elem.parentNode);
	}
	,addSpecialInput: function(input) {
		var index = this.getElementTabIndex(input.element);
		if(this.inputs[index] == null) this.inputs[index] = new Array();
		this.inputs[index].push(input);
	}
	,setActive: function(index) {
		if(index == this.current) return;
		if(!this.started) return;
		if(index < 0 || index >= this.length) throw "Illegal tab index " + index + ".";
		var contentdiv;
		var helpdiv;
		var li;
		var a;
		if(this.current != -1) {
			contentdiv = this.main.childNodes[this.current];
			com.wiris.quizzes.JsDomUtils.removeClass(contentdiv,"wirisselected");
			com.wiris.quizzes.JsDomUtils.addClass(contentdiv,"wirishidden");
			helpdiv = this.help.childNodes[this.current];
			com.wiris.quizzes.JsDomUtils.addClass(helpdiv,"wirishidden");
			li = this.menu.childNodes[this.current];
			a = li.firstChild;
			com.wiris.quizzes.JsDomUtils.removeClass(a,"wirisselected");
		}
		contentdiv = this.main.childNodes[index];
		com.wiris.quizzes.JsDomUtils.removeClass(contentdiv,"wirishidden");
		com.wiris.quizzes.JsDomUtils.addClass(contentdiv,"wirisselected");
		helpdiv = this.help.childNodes[index];
		com.wiris.quizzes.JsDomUtils.removeClass(helpdiv,"wirishidden");
		li = this.menu.childNodes[index];
		a = li.firstChild;
		com.wiris.quizzes.JsDomUtils.addClass(a,"wirisselected");
		var special = this.inputs[index];
		if(special != null) {
			var _g = 0;
			while(_g < special.length) {
				var input = special[_g];
				++_g;
				input.init();
			}
		}
		this.current = index;
	}
	,addTab: function(title,component,help) {
		var _g = this;
		var index = this.menu.childNodes.length;
		var d = this.getOwnerDocument();
		var li = d.createElement("li");
		com.wiris.quizzes.JsDomUtils.addClass(li,"wiristab");
		var a = d.createElement("a");
		com.wiris.quizzes.JsDomUtils.addClass(a,"wiristablink");
		var text = d.createTextNode(title);
		a.appendChild(text);
		li.appendChild(a);
		this.menu.appendChild(li);
		var helpdiv = d.createElement("div");
		com.wiris.quizzes.JsDomUtils.addClass(helpdiv,"wiristabhelp");
		com.wiris.quizzes.JsDomUtils.addClass(helpdiv,"wirishidden");
		var lines = help.split("\n");
		var _g1 = 0;
		while(_g1 < lines.length) {
			var line = lines[_g1];
			++_g1;
			var p = d.createElement("p");
			var t = d.createTextNode(line);
			p.appendChild(t);
			helpdiv.appendChild(p);
		}
		this.help.appendChild(helpdiv);
		var contentdiv = d.createElement("div");
		com.wiris.quizzes.JsDomUtils.addClass(contentdiv,"wiristabcontent");
		com.wiris.quizzes.JsDomUtils.addClass(contentdiv,"wirishidden");
		contentdiv.appendChild(component.element);
		this.main.appendChild(contentdiv);
		com.wiris.quizzes.JsDomUtils.addEvent(a,"click",function(e) {
			_g.setActive(index);
		});
		this.length++;
	}
	,getLength: function() {
		return this.length;
	}
	,addLeftComponent: function(component) {
		this.left.appendChild(component.getElement());
	}
	,setEmpty: function() {
		var d = this.getOwnerDocument();
		this.loading = d.createElement("div");
		com.wiris.quizzes.JsDomUtils.addClass(this.loading,"wiristabcontent");
		this.loading.appendChild(d.createTextNode(this.t("loading...")));
		this.main.appendChild(this.loading);
		this.inputs = new Array();
		this.length = 0;
		this.current = -1;
	}
	,started: null
	,length: null
	,current: null
	,inputs: null
	,left: null
	,loading: null
	,main: null
	,leftComponent: null
	,help: null
	,menu: null
	,__class__: com.wiris.quizzes.JsVerticalTabs
});
com.wiris.quizzes.api.ui.AnswerFeedback = $hxClasses["com.wiris.quizzes.api.ui.AnswerFeedback"] = function() { }
com.wiris.quizzes.api.ui.AnswerFeedback.__name__ = ["com","wiris","quizzes","api","ui","AnswerFeedback"];
com.wiris.quizzes.api.ui.AnswerFeedback.__interfaces__ = [com.wiris.quizzes.api.ui.QuizzesComponent];
com.wiris.quizzes.JsAnswerFeedback = $hxClasses["com.wiris.quizzes.JsAnswerFeedback"] = function(d,q,qi,index) {
	com.wiris.quizzes.JsComponent.call(this,d);
	var g = new com.wiris.quizzes.impl.HTMLGui(this.getLang());
	var html = g.getAnswerFeedbackHtml(0,index,(js.Boot.__cast(q , com.wiris.quizzes.impl.QuestionInternal)).getImpl(),qi);
	this.element = d.createElement("div");
	this.addClass("wirisassertionfeedback");
	this.element.innerHTML = html;
};
com.wiris.quizzes.JsAnswerFeedback.__name__ = ["com","wiris","quizzes","JsAnswerFeedback"];
com.wiris.quizzes.JsAnswerFeedback.__interfaces__ = [com.wiris.quizzes.api.ui.AnswerFeedback];
com.wiris.quizzes.JsAnswerFeedback.__super__ = com.wiris.quizzes.JsComponent;
com.wiris.quizzes.JsAnswerFeedback.prototype = $extend(com.wiris.quizzes.JsComponent.prototype,{
	__class__: com.wiris.quizzes.JsAnswerFeedback
});
com.wiris.quizzes.JsCtrlShiftXPopup = $hxClasses["com.wiris.quizzes.JsCtrlShiftXPopup"] = function(d,studio) {
	var _g = this;
	com.wiris.quizzes.JsPopupInput.call(this,d,null);
	this.studio = studio;
	this.element = d.documentElement;
	com.wiris.quizzes.JsDomUtils.addEvent(this.element,"keydown",function(e) {
		if(e.shiftKey && e.ctrlKey && !e.altKey && e.keyCode == 89) _g.launchPopup(e);
	});
};
com.wiris.quizzes.JsCtrlShiftXPopup.__name__ = ["com","wiris","quizzes","JsCtrlShiftXPopup"];
com.wiris.quizzes.JsCtrlShiftXPopup.__super__ = com.wiris.quizzes.JsPopupInput;
com.wiris.quizzes.JsCtrlShiftXPopup.prototype = $extend(com.wiris.quizzes.JsPopupInput.prototype,{
	buildPopup: function() {
		com.wiris.quizzes.JsPopupInput.prototype.buildPopup.call(this);
		var question = this.studio.getQuestion();
		this.setValue(question.serialize());
		var container = new com.wiris.quizzes.JsContainer(this.popup.document);
		container.addClass("wirismaincontainer");
		this.addPopupChild(container);
		var content = new com.wiris.quizzes.JsContainer(this.popup.document);
		content.addClass("wirispopupsimplecontent");
		var first = new com.wiris.quizzes.JsContainer(this.popup.document);
		first.addClass("wirispopupctrlshiftqfirst");
		var textarea = new com.wiris.quizzes.JsTextAreaInput(this.popup.document,this.getValue(),21,80);
		var label = new com.wiris.quizzes.JsLabel(this.popup.document,"questionxml",textarea);
		first.addChild(label);
		first.addChild(textarea);
		content.addChild(first);
		var second = new com.wiris.quizzes.JsContainer(this.popup.document);
		second.addClass("wirispopupctrlshiftqsecond");
		var questionImpl = question.getImpl();
		var grammar = questionImpl.getGrammarUrl(0);
		var text = new com.wiris.quizzes.JsTextInput(this.popup.document,grammar);
		var label2 = new com.wiris.quizzes.JsLabel(this.popup.document,"grammarurl",text);
		second.addChild(label2);
		second.addChild(text);
		content.addChild(second);
		var third = new com.wiris.quizzes.JsContainer(this.popup.document);
		third.addClass("wirispopupctrlshiftqthird");
		var wordstext = new com.wiris.quizzes.JsTextInput(this.popup.document,"");
		com.wiris.quizzes.JsEditorInput.getReservedWords(grammar,function(data) {
			wordstext.setValue(data);
		});
		var label3 = new com.wiris.quizzes.JsLabel(this.popup.document,"reservedwords",wordstext);
		third.addChild(label3);
		third.addChild(wordstext);
		content.addChild(third);
		container.addChild(content);
		var submit = new com.wiris.quizzes.JsSubmitButtons(this.popup.document,false,true);
		container.addChild(submit);
	}
	,studio: null
	,__class__: com.wiris.quizzes.JsCtrlShiftXPopup
});
com.wiris.quizzes.JsDomUtils = $hxClasses["com.wiris.quizzes.JsDomUtils"] = function() { }
com.wiris.quizzes.JsDomUtils.__name__ = ["com","wiris","quizzes","JsDomUtils"];
com.wiris.quizzes.JsDomUtils.getElementsByClassName = function(className,tagName,element) {
	if(element == null) element = js.Lib.document;
	if(tagName == null) tagName = "*";
	try {
		if(typeof(element.getElementsByClassName) != 'undefined') return element.getElementsByClassName(className,tagName);
	} catch( e ) {
	}
	var elements = element.getElementsByTagName(tagName);
	var selected = new Array();
	var i;
	var n = elements.length;
	var _g = 0;
	while(_g < n) {
		var i1 = _g++;
		var elem = elements[i1];
		if(com.wiris.quizzes.JsDomUtils.hasClass(elem,className)) selected.push(elem);
	}
	return selected;
}
com.wiris.quizzes.JsDomUtils.hasClass = function(elem,className) {
	var elemClass = elem.className;
	return elem.nodeType == 1 && com.wiris.quizzes.JsDomUtils.hasClassString(elemClass,className);
}
com.wiris.quizzes.JsDomUtils.addClass = function(element,className) {
	element.className = com.wiris.quizzes.JsDomUtils.addClassToString(element.className,className);
}
com.wiris.quizzes.JsDomUtils.removeClass = function(element,className) {
	element.className = com.wiris.quizzes.JsDomUtils.removeClassFromString(element.className,className);
}
com.wiris.quizzes.JsDomUtils.hasClassString = function(elemClass,className) {
	return elemClass != null && (elemClass == className || StringTools.startsWith(elemClass,className + " ") || StringTools.endsWith(elemClass," " + className) || elemClass.indexOf(" " + className + " ") != -1);
}
com.wiris.quizzes.JsDomUtils.addClassToString = function(str,className) {
	if(!com.wiris.quizzes.JsDomUtils.hasClassString(str,className)) {
		if(str == null || str.length == 0) str = className; else str += " " + className;
	}
	return str;
}
com.wiris.quizzes.JsDomUtils.removeClassFromString = function(elemClass,className) {
	if(com.wiris.quizzes.JsDomUtils.hasClassString(elemClass,className)) {
		elemClass = StringTools.replace(elemClass," " + className + " "," ");
		if(StringTools.startsWith(elemClass,className + " ")) elemClass = HxOverrides.substr(elemClass,className.length + 1,null);
		if(StringTools.endsWith(elemClass," " + className)) elemClass = HxOverrides.substr(elemClass,0,elemClass.length - (className.length + 1));
		if(elemClass == className) elemClass = "";
	}
	return elemClass;
}
com.wiris.quizzes.JsDomUtils.addEvent = function(element,event,func) {
	if(element.addEventListener) element.addEventListener(event,func,false); else if(element.attachEvent) element.attachEvent("on" + event,func);
}
com.wiris.quizzes.JsDomUtils.removeEvent = function(element,event,func) {
	if(element.removeEventListener) element.removeEventListener(event,func,false); else if(element.detachEvent) element.detachEvent("on" + event,func);
}
com.wiris.quizzes.JsDomUtils.getNearestElementByClassName = function(element,className) {
	var target = com.wiris.quizzes.JsDomUtils.getChildByClassName(element,className);
	while(target == null && element.parentNode != null) {
		var brothers = element.parentNode.childNodes;
		var i = 0;
		var n = brothers.length;
		while(target == null && i < n) {
			var brother = brothers[i];
			if(element != brother) target = com.wiris.quizzes.JsDomUtils.getChildByClassName(brother,className);
			i++;
		}
		element = element.parentNode;
	}
	return target;
}
com.wiris.quizzes.JsDomUtils.getChildByClassName = function(element,className) {
	if(com.wiris.quizzes.JsDomUtils.hasClass(element,className)) return element; else if(element.hasChildNodes()) {
		var i;
		var n = element.childNodes.length;
		var _g = 0;
		while(_g < n) {
			var i1 = _g++;
			var target = com.wiris.quizzes.JsDomUtils.getChildByClassName(element.childNodes[i1],className);
			if(target != null) return target;
		}
	}
	return null;
}
com.wiris.quizzes.JsDomUtils.loadFile = function(elem,url,func,params) {
	var d = elem.ownerDocument;
	var iframe = d.createElement("iframe");
	var submitted = false;
	com.wiris.quizzes.JsDomUtils.addEvent(iframe,"load",function(e) {
		if(submitted) {
			var node = iframe.contentWindow.document.body.firstChild;
			while(node.nodeType != 3) node = node.firstChild;
			var text = node.textContent;
			elem.removeChild(iframe);
			func(text);
		}
	});
	elem.appendChild(iframe);
	var form = com.wiris.quizzes.JsDomUtils.createForm(iframe.contentWindow.document,url,params);
	form.setAttribute("enctype","multipart/form-data");
	var fileInput = d.createElement("input");
	fileInput.setAttribute("name","data");
	fileInput.setAttribute("type","file");
	form.appendChild(fileInput);
	com.wiris.quizzes.JsDomUtils.addEvent(fileInput,"change",function(e) {
		iframe.contentWindow.document.body.appendChild(form);
		submitted = true;
		form.submit();
	});
	fileInput.click();
}
com.wiris.quizzes.JsDomUtils.saveFile = function(elem,url,filename,contents,params) {
	var d = elem.ownerDocument;
	var iframe = d.createElement("iframe");
	var submitted = false;
	com.wiris.quizzes.JsDomUtils.addEvent(iframe,"load",function(e) {
		if(!submitted) {
			submitted = true;
			var iframedoc = iframe.contentWindow.document;
			params.set("data",contents);
			params.set("filename",filename);
			var form = com.wiris.quizzes.JsDomUtils.createForm(iframedoc,url,params);
			iframedoc.body.appendChild(form);
			form.submit();
		} else elem.removeChild(iframe);
	});
	elem.appendChild(iframe);
}
com.wiris.quizzes.JsDomUtils.createForm = function(d,action,items) {
	var form = d.createElement("form");
	form.setAttribute("action",action);
	form.setAttribute("method","POST");
	var $it0 = items.keys();
	while( $it0.hasNext() ) {
		var name = $it0.next();
		var input = d.createElement("input");
		input.setAttribute("type","hidden");
		input.setAttribute("name",name);
		input.setAttribute("value",items.get(name));
		form.appendChild(input);
	}
	return form;
}
com.wiris.quizzes.JsInputController = $hxClasses["com.wiris.quizzes.JsInputController"] = function(element,question,questionElement,instance,instanceElement) {
	this.element = element;
	this.question = question;
	this.questionElement = questionElement;
	this.instance = instance;
	this.instanceElement = instanceElement;
};
com.wiris.quizzes.JsInputController.__name__ = ["com","wiris","quizzes","JsInputController"];
com.wiris.quizzes.JsInputController.parseBool = function(b) {
	return b.toLowerCase() == "true";
}
com.wiris.quizzes.JsInputController.getElementWindow = function(element) {
	try {
		var doc = element.ownerDocument;
		var win;
		if('defaultView' in doc) return doc.defaultView; else if('parentWindow' in doc) return doc.parentWindow; else throw "Incompatible browser!";
	} catch( e ) {
		return null;
	}
}
com.wiris.quizzes.JsInputController.prototype = {
	setBehavior: function() {
		var _g = this;
		var name = this.element.nodeName.toLowerCase();
		var type = null;
		if(name == "input") {
			var input = this.element;
			type = input.type.toLowerCase();
		}
		var handler = function(e) {
			_g.updateInputValue();
		};
		if(name == "input" && (type == "hidden" || type == "radio" || type == "checkbox") || name == "textarea" || name == "select") com.wiris.quizzes.JsDomUtils.addEvent(this.element,"change",handler); else if(name == "input" && type == "text") {
			com.wiris.quizzes.JsDomUtils.addEvent(this.element,"change",handler);
			com.wiris.quizzes.JsDomUtils.addEvent(this.element,"keyup",handler);
		} else if(name == "applet") com.wiris.quizzes.JsDomUtils.addEvent(this.element,"blur",handler); else if(name == "a" || name == "input" && type == "button" || name == "button") com.wiris.quizzes.JsDomUtils.addEvent(this.element,"click",handler); else if(com.wiris.quizzes.JsInputController.DEBUG) throw "Unsupported element " + name + ".";
	}
	,contentValue: function(value) {
		if(this.mode == com.wiris.quizzes.JsInputController.GET) value = this.element.innerHTML; else if(this.mode == com.wiris.quizzes.JsInputController.SET) this.element.innerHTML = value;
		return value;
	}
	,setAppletValue: function() {
		try {
			if(this.isAppletActive()) {
				this.element.setXml(this.auxAppletValue);
				if(this.appletTimer != null) {
					this.appletTimer.stop();
					this.appletTimer = null;
				}
			} else if(this.appletTimer == null) {
				this.appletTimer = new haxe.Timer(200);
				this.appletTimer.run = $bind(this,this.setAppletValue);
			}
			if(com.wiris.quizzes.JsInputController.getElementWindow(this.element) == null) this.term();
		} catch( e ) {
			this.term();
		}
	}
	,appletValue: function(value) {
		if(this.mode == com.wiris.quizzes.JsInputController.GET) {
			try {
				if(this.isAppletActive()) this.auxAppletValue = this.element.getXml();
			} catch( e ) {
			}
			return this.auxAppletValue;
		} else if(this.mode == com.wiris.quizzes.JsInputController.SET) {
			this.auxAppletValue = value;
			this.setAppletValue();
		}
		return value;
	}
	,isAppletActive: function() {
		try {
			if(this.element.isActive()) {
				if(this.element.getXml()) return true;
			}
			return false;
		} catch( e ) {
			return false;
		}
	}
	,selectedValue: function(value) {
		var elem = this.element;
		if(this.mode == com.wiris.quizzes.JsInputController.GET) value = elem.options[elem.selectedIndex].value; else if(this.mode == com.wiris.quizzes.JsInputController.SET) {
			var index;
			var _g1 = 0, _g = elem.options.length;
			while(_g1 < _g) {
				var index1 = _g1++;
				if(elem.options[index1].value == value) elem.selectedIndex = index1;
			}
		}
		return value;
	}
	,valueValue: function(name,value) {
		var elem = this.element;
		if(this.mode == com.wiris.quizzes.JsInputController.GET) value = elem.value; else if(this.mode == com.wiris.quizzes.JsInputController.SET) elem.value = value == null?"":value;
		return value;
	}
	,checkedValue: function(name,value) {
		var elem = this.element;
		if(this.mode == com.wiris.quizzes.JsInputController.GET) value = Std.string(elem.checked); else if(this.mode == com.wiris.quizzes.JsInputController.SET) elem.checked = value != null && value.toLowerCase() == "true";
		return value;
	}
	,jsInputValue: function(value) {
		if(this.mode == com.wiris.quizzes.JsInputController.GET) value = this.jsInput.getValue(); else if(this.mode == com.wiris.quizzes.JsInputController.SET) this.jsInput.setValue(value);
		return value;
	}
	,inputValue: function(value) {
		if(this.jsInput != null) value = this.jsInputValue(value); else {
			var name = this.element.nodeName.toLowerCase();
			if(name == "input") {
				var type = this.element.getAttribute("type").toLowerCase();
				if(type == "checkbox" || type == "radio") value = this.checkedValue("checked",value); else if(type == "hidden" || type == "text") value = this.valueValue("value",value);
			} else if(name == "textarea") value = this.valueValue("value",value); else if(name == "select") value = this.selectedValue(value); else if(name == "applet") value = this.appletValue(value);
		}
		return value;
	}
	,hideElementValue: function() {
		var name = this.element.nodeName.toLowerCase();
		if(name == "input" || name == "textarea" || name == "select" || name == "button") {
			var formElem = this.element;
			formElem.name = "";
		}
	}
	,updateInputValue: function() {
		this.mode = com.wiris.quizzes.JsInputController.GET;
		var value = this.inputValue(null);
		this.setQuestionValue(value);
		this.updateInterface(value);
		if(com.wiris.quizzes.JsInputController.DEBUG) {
			if(this.question != null && this.questionElement != null) this.questionElement.value = this.question.serialize();
			if(this.instance != null && this.instanceElement != null) this.instanceElement.value = this.instance.serialize();
		}
	}
	,saveInputValue: function() {
		this.mode = com.wiris.quizzes.JsInputController.GET;
		var value = this.inputValue(null);
		this.setQuestionValue(value);
		if(com.wiris.quizzes.JsInputController.DEBUG) {
			if(this.question != null && this.questionElement != null) this.questionElement.value = this.question.serialize();
			if(this.instance != null && this.instanceElement != null) this.instanceElement.value = this.instance.serialize();
		}
	}
	,updateInterface: function(value) {
	}
	,getQuestionValue: function() {
		return "";
	}
	,setQuestionValue: function(value) {
	}
	,term: function() {
		if(this.appletTimer != null) {
			this.appletTimer.stop();
			this.appletTimer = null;
		}
	}
	,init: function() {
		this.mode = com.wiris.quizzes.JsInputController.SET;
		var value = this.getQuestionValue();
		this.inputValue(value);
		if(this.jsInput != null) return;
		this.setBehavior();
		var updateInterface = true;
		var name = this.element.nodeName.toLowerCase();
		if(name == "input") {
			var felem = this.element;
			var type = felem.type.toLowerCase();
			if(type == "button" || type == "submit") updateInterface = false;
		} else if(name == "a" || name == "button") updateInterface = false;
		if(updateInterface) this.updateInterface(value);
	}
	,auxAppletValue: null
	,appletTimer: null
	,mode: null
	,jsInput: null
	,element: null
	,instanceElement: null
	,questionElement: null
	,instance: null
	,question: null
	,__class__: com.wiris.quizzes.JsInputController
}
com.wiris.quizzes.api.QuizzesBuilder = $hxClasses["com.wiris.quizzes.api.QuizzesBuilder"] = function() {
};
com.wiris.quizzes.api.QuizzesBuilder.__name__ = ["com","wiris","quizzes","api","QuizzesBuilder"];
com.wiris.quizzes.api.QuizzesBuilder.getInstance = function() {
	return com.wiris.quizzes.JsQuizzesBuilder.getInstance();
}
com.wiris.quizzes.api.QuizzesBuilder.prototype = {
	getQuizzesUIBuilder: function() {
		return null;
	}
	,getConfiguration: function() {
		return null;
	}
	,getMathFilter: function() {
		return null;
	}
	,getQuizzesService: function() {
		return null;
	}
	,newEvalMultipleAnswersRequest: function(correctAnswer,studentAnswer,question,instance) {
		return null;
	}
	,newEvalRequest: function(correctAnswer,studentAnswer,question,instance) {
		return null;
	}
	,newVariablesRequest: function(html,question,instance) {
		return null;
	}
	,readQuestionInstance: function(xml) {
		return null;
	}
	,readQuestion: function(xml) {
		return null;
	}
	,newQuestionInstance: function() {
		return null;
	}
	,newQuestion: function() {
		return null;
	}
	,__class__: com.wiris.quizzes.api.QuizzesBuilder
}
if(!com.wiris.quizzes.impl) com.wiris.quizzes.impl = {}
com.wiris.quizzes.impl.QuizzesBuilderImpl = $hxClasses["com.wiris.quizzes.impl.QuizzesBuilderImpl"] = function() {
	com.wiris.quizzes.api.QuizzesBuilder.call(this);
};
com.wiris.quizzes.impl.QuizzesBuilderImpl.__name__ = ["com","wiris","quizzes","impl","QuizzesBuilderImpl"];
com.wiris.quizzes.impl.QuizzesBuilderImpl.singleton = null;
com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance = function() {
	if(com.wiris.quizzes.impl.QuizzesBuilderImpl.singleton == null) com.wiris.quizzes.impl.QuizzesBuilderImpl.singleton = new com.wiris.quizzes.impl.QuizzesBuilderImpl();
	return com.wiris.quizzes.impl.QuizzesBuilderImpl.singleton;
}
com.wiris.quizzes.impl.QuizzesBuilderImpl.__super__ = com.wiris.quizzes.api.QuizzesBuilder;
com.wiris.quizzes.impl.QuizzesBuilderImpl.prototype = $extend(com.wiris.quizzes.api.QuizzesBuilder.prototype,{
	inArray: function(n,a) {
		var i;
		var _g1 = 0, _g = a.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(a[i1] == n) return true;
		}
		return false;
	}
	,getPairings: function(c,u) {
		var p = new Array();
		var reverse;
		if(c >= u) reverse = false; else {
			var aux = c;
			c = u;
			u = aux;
			reverse = true;
		}
		var n = Math.floor(c / u);
		var d = Math.floor(c % u);
		var i;
		var cc = 0;
		var cu = 0;
		var _g = 0;
		while(_g < u) {
			var i1 = _g++;
			var j;
			var _g1 = 0;
			while(_g1 < n) {
				var j1 = _g1++;
				p.push([reverse?cu:cc,reverse?cc:cu]);
				cc++;
			}
			if(i1 < d) {
				p.push([reverse?cu:cc,reverse?cc:cu]);
				cc++;
			}
			cu++;
		}
		return p;
	}
	,getSerializer: function() {
		if(this.serializer == null) {
			this.serializer = new com.wiris.util.xml.XmlSerializer();
			this.serializer.register(new com.wiris.quizzes.impl.Answer());
			this.serializer.register(new com.wiris.quizzes.impl.Assertion());
			this.serializer.register(new com.wiris.quizzes.impl.AssertionCheckImpl());
			this.serializer.register(new com.wiris.quizzes.impl.AssertionParam());
			this.serializer.register(new com.wiris.quizzes.impl.CorrectAnswer());
			this.serializer.register(new com.wiris.quizzes.impl.LocalData());
			this.serializer.register(new com.wiris.quizzes.impl.MathContent());
			this.serializer.register(new com.wiris.quizzes.impl.MultipleQuestionRequest());
			this.serializer.register(new com.wiris.quizzes.impl.MultipleQuestionResponse());
			this.serializer.register(new com.wiris.quizzes.impl.Option());
			this.serializer.register(new com.wiris.quizzes.impl.ProcessGetCheckAssertions());
			this.serializer.register(new com.wiris.quizzes.impl.ProcessGetTranslation());
			this.serializer.register(new com.wiris.quizzes.impl.ProcessGetVariables());
			this.serializer.register(new com.wiris.quizzes.impl.ProcessStoreQuestion());
			this.serializer.register(new com.wiris.quizzes.impl.QuestionImpl());
			this.serializer.register(new com.wiris.quizzes.impl.QuestionRequestImpl());
			this.serializer.register(new com.wiris.quizzes.impl.QuestionResponseImpl());
			this.serializer.register(new com.wiris.quizzes.impl.QuestionInstanceImpl());
			this.serializer.register(new com.wiris.quizzes.impl.ResultError());
			this.serializer.register(new com.wiris.quizzes.impl.ResultErrorLocation());
			this.serializer.register(new com.wiris.quizzes.impl.ResultGetCheckAssertions());
			this.serializer.register(new com.wiris.quizzes.impl.ResultGetTranslation());
			this.serializer.register(new com.wiris.quizzes.impl.ResultGetVariables());
			this.serializer.register(new com.wiris.quizzes.impl.ResultStoreQuestion());
			this.serializer.register(new com.wiris.quizzes.impl.TranslationNameChange());
			this.serializer.register(new com.wiris.quizzes.impl.UserData());
			this.serializer.register(new com.wiris.quizzes.impl.Variable());
		}
		return this.serializer;
	}
	,newMultipleResponseFromXml: function(xml) {
		var s = this.getSerializer();
		var elem = s.read(xml);
		var mqr;
		var tag = s.getTagName(elem);
		if(tag == com.wiris.quizzes.impl.QuestionResponseImpl.tagName) {
			var res = js.Boot.__cast(elem , com.wiris.quizzes.impl.QuestionResponseImpl);
			mqr = new com.wiris.quizzes.impl.MultipleQuestionResponse();
			mqr.questionResponses = new Array();
			mqr.questionResponses.push(res);
		} else if(tag == com.wiris.quizzes.impl.MultipleQuestionResponse.tagName) mqr = js.Boot.__cast(elem , com.wiris.quizzes.impl.MultipleQuestionResponse); else throw "Unexpected XML root tag " + tag + ".";
		return mqr;
	}
	,newResponseFromXml: function(xml) {
		var mqr = this.newMultipleResponseFromXml(xml);
		return mqr.questionResponses[0];
	}
	,newRequestFromXml: function(xml) {
		var s = this.getSerializer();
		var elem = s.read(xml);
		var req;
		var tag = s.getTagName(elem);
		if(tag == com.wiris.quizzes.impl.QuestionRequestImpl.tagName) req = js.Boot.__cast(elem , com.wiris.quizzes.impl.QuestionRequestImpl); else if(tag == com.wiris.quizzes.impl.MultipleQuestionRequest.tagName) {
			var mqr = js.Boot.__cast(elem , com.wiris.quizzes.impl.MultipleQuestionRequest);
			req = mqr.questionRequests[0];
		} else throw "Unexpected XML root tag " + tag + ".";
		return req;
	}
	,newTranslationRequest: function(q,lang) {
		var r = new com.wiris.quizzes.impl.QuestionRequestImpl();
		r.question = q;
		var p = new com.wiris.quizzes.impl.ProcessGetTranslation();
		p.lang = lang;
		r.addProcess(p);
		return r;
	}
	,breakCompoundAnswers: function(q,u) {
		var assertions = new Array();
		var correctAnswers = new Array();
		var userAnswers = new Array();
		var aux = new Array();
		var i;
		var _g1 = 0, _g = q.correctAnswers.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var c = q.correctAnswers[i1];
			var parts = com.wiris.quizzes.impl.HTMLTools.parseCompoundAnswer(c);
			aux[c.id] = parts.length;
			var j;
			var _g3 = 0, _g2 = parts.length;
			while(_g3 < _g2) {
				var j1 = _g3++;
				var cc = new com.wiris.quizzes.impl.CorrectAnswer();
				cc.type = c.type;
				cc.id = 1000 + c.id * 1000 + j1;
				cc.content = parts[j1][1];
				cc.weight = 1.0 / parts.length;
				correctAnswers.push(cc);
			}
		}
		var _g1 = 0, _g = u.answers.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var a = u.answers[i1];
			var parts = com.wiris.quizzes.impl.HTMLTools.parseCompoundAnswer(a);
			var j;
			var _g3 = 0, _g2 = parts.length;
			while(_g3 < _g2) {
				var j1 = _g3++;
				var ca = new com.wiris.quizzes.impl.Answer();
				ca.type = a.type;
				ca.id = 1000 + a.id * 1000 + j1;
				ca.content = parts[j1][1];
				userAnswers.push(ca);
			}
		}
		var _g1 = 0, _g = q.assertions.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var a = q.assertions[i1];
			var n = aux[a.getCorrectAnswer()];
			var j;
			var _g2 = 0;
			while(_g2 < n) {
				var j1 = _g2++;
				var ca = new com.wiris.quizzes.impl.Assertion();
				ca.name = a.name;
				ca.parameters = a.parameters;
				assertions.push(ca);
				if(a.name == com.wiris.quizzes.impl.Assertion.EQUIVALENT_FUNCTION) {
					var caa = new Array();
					var aa = new Array();
					var k;
					var _g3 = 0;
					while(_g3 < n) {
						var k1 = _g3++;
						caa[k1] = 1000 + a.getCorrectAnswer() * 1000 + k1;
						aa[k1] = 1000 + a.getAnswer() * 1000 + k1;
					}
					ca.setCorrectAnswers(caa);
					ca.setAnswers(aa);
					break;
				} else {
					ca.setCorrectAnswer(1000 + a.getCorrectAnswer() * 1000 + j1);
					ca.setAnswer(1000 + a.getAnswer() * 1000 + j1);
				}
			}
		}
		q.correctAnswers = correctAnswers;
		q.assertions = assertions;
		u.answers = userAnswers;
	}
	,newEvalMultipleAnswersRequest: function(correctAnswers,userAnswers,question,instance) {
		var q = null;
		var qi = null;
		if(question != null) q = (js.Boot.__cast(question , com.wiris.quizzes.impl.QuestionInternal)).getImpl();
		if(instance != null) qi = js.Boot.__cast(instance , com.wiris.quizzes.impl.QuestionInstanceImpl);
		var qq = new com.wiris.quizzes.impl.QuestionImpl();
		if(q != null) {
			qq.wirisCasSession = q.wirisCasSession;
			qq.options = q.options;
		}
		var i;
		var k;
		qq.assertions = new Array();
		if(q != null && q.assertions != null && q.assertions.length > 0) {
			var _g1 = 0, _g = q.assertions.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				qq.assertions.push(q.assertions[i1]);
			}
		}
		var uu = new com.wiris.quizzes.impl.UserData();
		if(qi != null && qi.userData != null) uu.randomSeed = qi.userData.randomSeed; else {
			var qqi = new com.wiris.quizzes.impl.QuestionInstanceImpl();
			uu.randomSeed = qqi.userData.randomSeed;
		}
		if(correctAnswers != null) {
			var _g1 = 0, _g = correctAnswers.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var value = correctAnswers[i1];
				if(value == null) value = "";
				qq.setCorrectAnswer(i1,value);
			}
		} else if(q != null) qq.correctAnswers = q.correctAnswers;
		if(userAnswers != null) {
			var _g1 = 0, _g = userAnswers.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var answerValue = userAnswers[i1];
				if(answerValue == null) answerValue = "";
				uu.setUserAnswer(i1,userAnswers[i1]);
			}
		} else if(qi != null) uu.answers = qi.userData.answers;
		var syntax = null;
		var _g1 = 0, _g = qq.assertions.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(qq.assertions[i1].isSyntactic()) syntax = qq.assertions[i1];
		}
		if(syntax == null) {
			syntax = new com.wiris.quizzes.impl.Assertion();
			syntax.addCorrectAnswer(0);
			syntax.name = com.wiris.quizzes.impl.Assertion.SYNTAX_EXPRESSION;
			qq.assertions.push(syntax);
		}
		var _g1 = 0, _g = uu.answers.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var foundSyntax = false;
			var _g3 = 0, _g2 = qq.assertions.length;
			while(_g3 < _g2) {
				var k1 = _g3++;
				var ass = qq.assertions[k1];
				if(ass.isSyntactic() && this.inArray(i1,ass.getAnswers())) foundSyntax = true;
			}
			if(!foundSyntax) syntax.addAnswer(i1);
		}
		if(qi != null && qi.hasVariables()) {
			var _g1 = 0, _g = qq.correctAnswers.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var value = qq.getCorrectAnswer(i1);
				if(syntax.name == com.wiris.quizzes.impl.Assertion.SYNTAX_STRING) value = qi.expandVariablesText(value); else value = qi.expandVariablesMathML(value);
				qq.setCorrectAnswer(i1,value);
			}
		}
		var equivall = new Array();
		i = qq.assertions.length - 1;
		while(i >= 0) {
			if(qq.assertions[i].name == com.wiris.quizzes.impl.Assertion.EQUIVALENT_ALL) {
				var correctanswer = qq.assertions[i].getCorrectAnswer();
				var j = qq.assertions.length - 1;
				while(j >= 0) {
					if(qq.assertions[j].isSyntactic()) {
						qq.assertions[j].removeCorrectAnswer(correctanswer);
						if(qq.assertions[j].getCorrectAnswers().length == 0) {
							HxOverrides.remove(qq.assertions,qq.assertions[j]);
							if(j < i) i--;
						}
					}
					j--;
				}
			}
			i--;
		}
		var usedcorrectanswers = new Array();
		var _g1 = 0, _g = qq.correctAnswers.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			usedcorrectanswers[i1] = false;
		}
		var usedanswers = new Array();
		var _g1 = 0, _g = uu.answers.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			usedanswers[i1] = false;
		}
		var _g1 = 0, _g = qq.assertions.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var ass = qq.assertions[i1];
			if(ass.isEquivalence()) {
				usedcorrectanswers[ass.getCorrectAnswer()] = true;
				usedanswers[ass.getAnswer()] = true;
			} else if(ass.isCheck()) usedanswers[ass.getAnswer()] = true;
		}
		var pairs = this.getPairings(qq.correctAnswers.length,uu.answers.length);
		var _g1 = 0, _g = usedcorrectanswers.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(!usedcorrectanswers[i1]) {
				var _g3 = 0, _g2 = pairs.length;
				while(_g3 < _g2) {
					var k1 = _g3++;
					if(pairs[k1][0] == i1) {
						var user = pairs[k1][1];
						qq.setAssertion(com.wiris.quizzes.impl.Assertion.EQUIVALENT_SYMBOLIC,i1,user);
						usedanswers[user] = true;
					}
				}
			}
		}
		var _g1 = 0, _g = usedanswers.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(!usedanswers[i1]) {
				var _g3 = 0, _g2 = pairs.length;
				while(_g3 < _g2) {
					var k1 = _g3++;
					if(pairs[k1][1] == i1) qq.setAssertion(com.wiris.quizzes.impl.Assertion.EQUIVALENT_SYMBOLIC,pairs[k1][0],i1);
				}
			}
		}
		if(q != null && q.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER) == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE) this.breakCompoundAnswers(qq,uu);
		var qr = new com.wiris.quizzes.impl.QuestionRequestImpl();
		qr.question = qq;
		qr.userData = uu;
		qr.checkAssertions();
		return qr;
	}
	,newEvalRequest: function(correctAnswer,userAnswer,q,qi) {
		var correctAnswers = correctAnswer == null?null:[correctAnswer];
		var userAnswers = userAnswer == null?null:[userAnswer];
		return this.newEvalMultipleAnswersRequest(correctAnswers,userAnswers,q,qi);
	}
	,extractQuestionInstanceVariableNames: function(qi) {
		var vars = new Array();
		var i = qi.variables.keys();
		while(i.hasNext()) {
			var h = qi.variables.get(i.next());
			var j = h.keys();
			while(j.hasNext()) com.wiris.quizzes.impl.HTMLTools.insertStringInSortedArray(j.next(),vars);
		}
		return com.wiris.quizzes.impl.HTMLTools.toNativeArray(vars);
	}
	,getConfiguration: function() {
		return com.wiris.quizzes.impl.ConfigurationImpl.getInstance();
	}
	,newVariablesRequest: function(html,question,instance) {
		if(question == null) throw "Question q cannot be null.";
		var q = js.Boot.__cast(question , com.wiris.quizzes.impl.QuestionInternal);
		var qi = null;
		if(instance != null) qi = js.Boot.__cast(instance , com.wiris.quizzes.impl.QuestionInstanceImpl);
		if(qi == null || qi.userData == null) qi = new com.wiris.quizzes.impl.QuestionInstanceImpl();
		var variables = null;
		if(html == null) variables = this.extractQuestionInstanceVariableNames(qi); else {
			var h = new com.wiris.quizzes.impl.HTMLTools();
			variables = h.extractVariableNames(html);
		}
		var qr = new com.wiris.quizzes.impl.QuestionRequestImpl();
		qr.question = q;
		qr.userData = qi.userData;
		if(variables.length > 0) {
			qr.variables(variables,com.wiris.quizzes.impl.MathContent.TYPE_TEXT);
			qr.variables(variables,com.wiris.quizzes.impl.MathContent.TYPE_MATHML);
		}
		return qr;
	}
	,readQuestionInstance: function(xml) {
		var s = this.getSerializer();
		var elem = s.read(xml);
		var tag = s.getTagName(elem);
		if(!(tag == "questionInstance")) throw "Unexpected root tag " + tag + ". Expected questionInstance.";
		return js.Boot.__cast(elem , com.wiris.quizzes.impl.QuestionInstanceImpl);
	}
	,readQuestion: function(xml) {
		return new com.wiris.quizzes.impl.QuestionLazy(xml);
	}
	,getMathFilter: function() {
		return new com.wiris.quizzes.impl.MathMLFilter();
	}
	,getQuizzesService: function() {
		return new com.wiris.quizzes.impl.QuizzesServiceImpl();
	}
	,newQuestionInstance: function() {
		return new com.wiris.quizzes.impl.QuestionInstanceImpl();
	}
	,newQuestion: function() {
		return new com.wiris.quizzes.impl.QuestionImpl();
	}
	,serializer: null
	,__class__: com.wiris.quizzes.impl.QuizzesBuilderImpl
});
com.wiris.quizzes.JsQuizzesBuilder = $hxClasses["com.wiris.quizzes.JsQuizzesBuilder"] = function() {
	com.wiris.quizzes.impl.QuizzesBuilderImpl.call(this);
};
com.wiris.quizzes.JsQuizzesBuilder.__name__ = ["com","wiris","quizzes","JsQuizzesBuilder"];
com.wiris.quizzes.JsQuizzesBuilder.singleton = null;
com.wiris.quizzes.JsQuizzesBuilder.getInstance = function() {
	if(com.wiris.quizzes.JsQuizzesBuilder.singleton == null) com.wiris.quizzes.JsQuizzesBuilder.singleton = new com.wiris.quizzes.JsQuizzesBuilder();
	return com.wiris.quizzes.JsQuizzesBuilder.singleton;
}
com.wiris.quizzes.JsQuizzesBuilder.__super__ = com.wiris.quizzes.impl.QuizzesBuilderImpl;
com.wiris.quizzes.JsQuizzesBuilder.prototype = $extend(com.wiris.quizzes.impl.QuizzesBuilderImpl.prototype,{
	getQuizzesUIBuilder: function() {
		if(this.uibuilder == null) this.uibuilder = new com.wiris.quizzes.JsQuizzesUIBuilder();
		return this.uibuilder;
	}
	,uibuilder: null
	,__class__: com.wiris.quizzes.JsQuizzesBuilder
});
com.wiris.quizzes.JsQuizzesFilter = $hxClasses["com.wiris.quizzes.JsQuizzesFilter"] = function() {
	this.builder = com.wiris.quizzes.api.QuizzesBuilder.getInstance();
	this.uibuilder = this.builder.getQuizzesUIBuilder();
};
com.wiris.quizzes.JsQuizzesFilter.__name__ = ["com","wiris","quizzes","JsQuizzesFilter"];
com.wiris.quizzes.JsQuizzesFilter.main = function() {
	if(js.Lib.document.readyState == "complete") com.wiris.quizzes.JsQuizzesFilter.init(); else com.wiris.quizzes.JsDomUtils.addEvent(js.Lib.window,"load",function(e) {
		com.wiris.quizzes.JsQuizzesFilter.init();
	});
	delete Array.prototype.__class__;
}
com.wiris.quizzes.JsQuizzesFilter.init = function() {
	new com.wiris.quizzes.JsQuizzesFilter().run();
}
com.wiris.quizzes.JsQuizzesFilter.prototype = {
	getUniqueId: function(prefix) {
		var ident = prefix + Std.random(65536);
		while(js.Lib.document.getElementById(ident) != null) ident = prefix + Std.random(65536);
		return ident;
	}
	,getInstanceObject: function(instanceElement) {
		if(instanceElement == null) {
			if(this.defaultInstance == null) this.defaultInstance = com.wiris.quizzes.api.QuizzesBuilder.getInstance().newQuestionInstance();
			return this.defaultInstance;
		}
		if(instanceElement.id == null || instanceElement.id == "") instanceElement.id = this.getUniqueId("wirisquestioninstance");
		if(!this.instances.exists(instanceElement.id)) {
			var instance;
			if(instanceElement.value == "") instance = com.wiris.quizzes.api.QuizzesBuilder.getInstance().newQuestionInstance(); else instance = com.wiris.quizzes.api.QuizzesBuilder.getInstance().readQuestionInstance(instanceElement.value);
			this.instances.set(instanceElement.id,instance);
		}
		return this.instances.get(instanceElement.id);
	}
	,getQuestionObject: function(questionElement) {
		if(questionElement == null) {
			if(this.defaultQuestion == null) this.defaultQuestion = com.wiris.quizzes.api.QuizzesBuilder.getInstance().newQuestion();
			return this.defaultQuestion;
		}
		if(questionElement.id == null || questionElement.id == "") questionElement.id = this.getUniqueId("wirisquestion");
		if(!this.questions.exists(questionElement.id)) {
			var question;
			if(questionElement.value == "") question = com.wiris.quizzes.api.QuizzesBuilder.getInstance().newQuestion(); else question = com.wiris.quizzes.api.QuizzesBuilder.getInstance().readQuestion(questionElement.value);
			this.questions.set(questionElement.id,question);
		}
		return this.questions.get(questionElement.id);
	}
	,filterAnswerFeedback: function(element,index,question,instance,options) {
		var ii = instance;
		if(ii.hasEvaluation()) {
			var component = this.uibuilder.newAnswerFeedback(question,instance,index);
			element.parentNode.insertBefore(component.getElement(),element);
		}
	}
	,filterAuxiliarCasApplet: function(element,index,question,questionElement,instance,instanceElement,options) {
		var qq = question.getImpl();
		if(qq.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_SHOW_CAS) != com.wiris.quizzes.impl.LocalData.VALUE_SHOW_CAS_FALSE) {
			var ii = instance;
			var doc = element.ownerDocument;
			var component = new com.wiris.quizzes.JsAuxiliarCasInput(doc,element.value,question,instance,index,options);
			element.parentNode.insertBefore(component.element,element);
			component.addOnChangeHandler(function(value) {
				element.value = value;
				instanceElement.value = instance.serialize();
			});
		}
	}
	,filterAnswerField: function(element,index,question,questionElement,instance,instanceElement,options) {
		instance.setStudentAnswer(index,element.value);
		var component = this.uibuilder.newAnswerField(question,instance,index);
		component.addQuizzesFieldListener(new com.wiris.quizzes.FieldSynchronizer(element,instanceElement,instance));
		element.parentNode.insertBefore(component.getElement(),element);
		if(instanceElement != null) this.numUserAnswers.set(instanceElement.id,this.numUserAnswers.exists(instanceElement.id)?this.numUserAnswers.get(instanceElement.id) + 1:1);
	}
	,filterAuthoringField: function(element,index,question,questionElement,instance,instanceElement,options) {
		var cfg = new com.wiris.quizzes.impl.HTMLGuiConfig(options);
		if(cfg.optOpenAnswer && element.value != null && element.value.length > 0) question.setCorrectAnswer(index,element.value);
		var component = this.uibuilder.newAuthoringField(question,instance,index);
		if(com.wiris.quizzes.JsDomUtils.hasClassString(options,"wirisstudio")) {
			component.setFieldType(com.wiris.quizzes.api.ui.QuizzesUIConstants.STUDIO);
			component.showCorrectAnswerTab(cfg.tabCorrectAnswer);
			component.showValidationTab(cfg.tabValidation);
			component.showVariablesTab(cfg.tabVariables);
			component.showPreviewTab(cfg.tabPreview);
			component.showCorrectAnswer(cfg.optOpenAnswer);
			component.showAuxiliarCas(cfg.optAuxiliarCas);
			component.showAuxiliarCasReplaceEditor(cfg.optAuxiliarCasReplaceEditor);
			component.showGradingFunction(cfg.optGradingFunction);
		}
		component.addQuizzesFieldListener(new com.wiris.quizzes.FieldSynchronizer(element,questionElement,question));
		element.parentNode.insertBefore(component.getElement(),element);
		if(questionElement != null) {
			if(cfg.optOpenAnswer) this.numCorrectAnswers.set(questionElement.id,this.numCorrectAnswers.exists(questionElement.id)?this.numCorrectAnswers.get(questionElement.id) + 1:1); else this.numCorrectAnswers.set(questionElement.id,0);
		}
	}
	,filterQuestion: function(element,index,question,instance,options) {
		var qq = question.getImpl();
		if(this.numCorrectAnswers.exists(element.id) && qq.correctAnswers != null && qq.correctAnswers.length > 0) {
			var i = qq.correctAnswers.length - 1;
			var n = this.numCorrectAnswers.get(element.id);
			while(i >= n) {
				qq.removeCorrectAnswer(i);
				i--;
			}
		}
	}
	,filterQuestionInstance: function(element,index,question,instance,options) {
		var ii = instance;
		if(this.numUserAnswers.exists(element.id)) {
			var i = ii.userData.answers.length - 1;
			var n = this.numUserAnswers.get(element.id);
			while(i >= n) HxOverrides.remove(ii.userData.answers,ii.userData.answers[i]);
		}
	}
	,filterFields: function(className) {
		var elements = com.wiris.quizzes.JsDomUtils.getElementsByClassName(className);
		var i;
		var index = 0;
		var currentQuestionIndex = 0;
		var lastQuestionElement = null;
		var _g1 = 0, _g = elements.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var element = elements[i1];
			if(!com.wiris.quizzes.JsDomUtils.hasClass(element,"wirisprocessed")) {
				var questionElement = com.wiris.quizzes.JsDomUtils.getNearestElementByClassName(element,com.wiris.quizzes.JsQuizzesFilter.CLASS_QUESTION);
				var question = this.getQuestionObject(questionElement);
				var instanceElement = com.wiris.quizzes.JsDomUtils.getNearestElementByClassName(element,com.wiris.quizzes.JsQuizzesFilter.CLASS_QUESTION_INSTANCE);
				var instance = this.getInstanceObject(instanceElement);
				if(lastQuestionElement != questionElement) {
					index = 0;
					currentQuestionIndex++;
				}
				lastQuestionElement = questionElement;
				switch(className) {
				case com.wiris.quizzes.JsQuizzesFilter.CLASS_LANG:
					this.uibuilder.setLanguage(element.value);
					break;
				case com.wiris.quizzes.JsQuizzesFilter.CLASS_AUTHOR_FIELD:
					this.filterAuthoringField(element,index,question,questionElement,instance,instanceElement,element.className);
					break;
				case com.wiris.quizzes.JsQuizzesFilter.CLASS_ANSWER_FIELD:
					this.filterAnswerField(element,index,question,questionElement,instance,instanceElement,element.className);
					break;
				case com.wiris.quizzes.JsQuizzesFilter.CLASS_AUXILIAR_CAS_APPLET:
					this.filterAuxiliarCasApplet(element,index,question,questionElement,instance,instanceElement,element.className);
					break;
				case com.wiris.quizzes.JsQuizzesFilter.CLASS_ANSWER_FEEDBACK:
					this.filterAnswerFeedback(element,index,question,instance,element.className);
					break;
				case com.wiris.quizzes.JsQuizzesFilter.CLASS_QUESTION:
					this.filterQuestion(element,index,question,instance,element.className);
					break;
				case com.wiris.quizzes.JsQuizzesFilter.CLASS_QUESTION_INSTANCE:
					this.filterQuestionInstance(element,index,question,instance,element.className);
					break;
				}
				element.style.display = "none";
				com.wiris.quizzes.JsDomUtils.addClass(element,"wirisprocessed");
				index++;
			}
		}
	}
	,loadCSS: function() {
		var styles = js.Lib.document.createElement("link");
		styles.setAttribute("type","text/css");
		styles.setAttribute("rel","stylesheet");
		styles.setAttribute("href",com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL) + "?service=resource&name=wirisquizzes.css");
		js.Lib.document.getElementsByTagName("head")[0].appendChild(styles);
	}
	,run: function() {
		this.questions = new Hash();
		this.instances = new Hash();
		this.numCorrectAnswers = new Hash();
		this.numUserAnswers = new Hash();
		this.loadCSS();
		this.filterFields(com.wiris.quizzes.JsQuizzesFilter.CLASS_LANG);
		this.filterFields(com.wiris.quizzes.JsQuizzesFilter.CLASS_AUTHOR_FIELD);
		this.filterFields(com.wiris.quizzes.JsQuizzesFilter.CLASS_ANSWER_FIELD);
		this.filterFields(com.wiris.quizzes.JsQuizzesFilter.CLASS_AUXILIAR_CAS_APPLET);
		this.filterFields(com.wiris.quizzes.JsQuizzesFilter.CLASS_QUESTION);
		this.filterFields(com.wiris.quizzes.JsQuizzesFilter.CLASS_QUESTION_INSTANCE);
		this.filterFields(com.wiris.quizzes.JsQuizzesFilter.CLASS_ANSWER_FEEDBACK);
	}
	,uibuilder: null
	,builder: null
	,numUserAnswers: null
	,numCorrectAnswers: null
	,defaultInstance: null
	,defaultQuestion: null
	,instances: null
	,questions: null
	,__class__: com.wiris.quizzes.JsQuizzesFilter
}
com.wiris.quizzes.api.ui.QuizzesFieldListener = $hxClasses["com.wiris.quizzes.api.ui.QuizzesFieldListener"] = function() { }
com.wiris.quizzes.api.ui.QuizzesFieldListener.__name__ = ["com","wiris","quizzes","api","ui","QuizzesFieldListener"];
com.wiris.quizzes.api.ui.QuizzesFieldListener.prototype = {
	contentChanged: null
	,__class__: com.wiris.quizzes.api.ui.QuizzesFieldListener
}
com.wiris.quizzes.FieldSynchronizer = $hxClasses["com.wiris.quizzes.FieldSynchronizer"] = function(element,questionElement,question) {
	this.element = element;
	this.questionElement = questionElement;
	this.question = question;
};
com.wiris.quizzes.FieldSynchronizer.__name__ = ["com","wiris","quizzes","FieldSynchronizer"];
com.wiris.quizzes.FieldSynchronizer.__interfaces__ = [com.wiris.quizzes.api.ui.QuizzesFieldListener];
com.wiris.quizzes.FieldSynchronizer.prototype = {
	contentChanged: function(source) {
		this.element.value = source.getValue();
		if(this.questionElement != null && this.question != null) this.questionElement.value = this.question.serialize();
	}
	,question: null
	,questionElement: null
	,element: null
	,__class__: com.wiris.quizzes.FieldSynchronizer
}
com.wiris.quizzes.api.ui.QuizzesUIBuilder = $hxClasses["com.wiris.quizzes.api.ui.QuizzesUIBuilder"] = function() { }
com.wiris.quizzes.api.ui.QuizzesUIBuilder.__name__ = ["com","wiris","quizzes","api","ui","QuizzesUIBuilder"];
com.wiris.quizzes.api.ui.QuizzesUIBuilder.prototype = {
	getMathViewer: null
	,newAuxiliarCasField: null
	,newAuthoringField: null
	,newAnswerField: null
	,newAnswerFeedback: null
	,setLanguage: null
	,__class__: com.wiris.quizzes.api.ui.QuizzesUIBuilder
}
com.wiris.quizzes.JsQuizzesUIBuilder = $hxClasses["com.wiris.quizzes.JsQuizzesUIBuilder"] = function() {
};
com.wiris.quizzes.JsQuizzesUIBuilder.__name__ = ["com","wiris","quizzes","JsQuizzesUIBuilder"];
com.wiris.quizzes.JsQuizzesUIBuilder.__interfaces__ = [com.wiris.quizzes.api.ui.QuizzesUIBuilder];
com.wiris.quizzes.JsQuizzesUIBuilder.prototype = {
	getMathViewer: function() {
		return new com.wiris.quizzes.HxMathViewer();
	}
	,newAuxiliarCasField: function(question,instance,index) {
		throw "Not implemented";
		return null;
	}
	,newAuthoringField: function(question,instance,index) {
		if(question == null) question = com.wiris.quizzes.api.QuizzesBuilder.getInstance().newQuestion();
		if(instance == null) instance = com.wiris.quizzes.api.QuizzesBuilder.getInstance().newQuestionInstance();
		return new com.wiris.quizzes.JsAuthoringInput(js.Lib.document,question.getCorrectAnswer(index),question,instance,index);
	}
	,newAnswerField: function(question,instance,index) {
		if(question == null) question = com.wiris.quizzes.api.QuizzesBuilder.getInstance().newQuestion();
		if(instance == null) instance = com.wiris.quizzes.api.QuizzesBuilder.getInstance().newQuestionInstance();
		return new com.wiris.quizzes.JsAnswerInput(js.Lib.document,instance.getStudentAnswer(index),question,instance,index);
	}
	,newAnswerFeedback: function(question,instance,index) {
		if(question == null) question = com.wiris.quizzes.api.QuizzesBuilder.getInstance().newQuestion();
		if(instance == null) instance = com.wiris.quizzes.api.QuizzesBuilder.getInstance().newQuestionInstance();
		return new com.wiris.quizzes.JsAnswerFeedback(js.Lib.document,question,instance,index);
	}
	,setLanguage: function(lang) {
		com.wiris.quizzes.JsComponent.setLanguage(lang);
	}
	,__class__: com.wiris.quizzes.JsQuizzesUIBuilder
}
com.wiris.quizzes.JsStudio = $hxClasses["com.wiris.quizzes.JsStudio"] = function(d,q,qi,index,conf) {
	com.wiris.quizzes.JsComponent.call(this,d);
	this.index = index;
	this.htmlgui = new com.wiris.quizzes.impl.HTMLGui(this.getLang());
	this.tabs = new com.wiris.quizzes.JsVerticalTabs(d,false);
	this.element = this.tabs.element;
	var actions = new com.wiris.quizzes.JsActionsMenu(d);
	actions.addAction(this.t("actionimport"),$bind(this,this.importQuestion));
	actions.addAction(this.t("actionexport"),$bind(this,this.exportQuestion));
	this.tabs.addLeftComponent(actions);
	this.ctrlshiftx = new com.wiris.quizzes.JsCtrlShiftXPopup(d,this);
	this.create(q,qi,conf);
};
com.wiris.quizzes.JsStudio.__name__ = ["com","wiris","quizzes","JsStudio"];
com.wiris.quizzes.JsStudio.__super__ = com.wiris.quizzes.JsComponent;
com.wiris.quizzes.JsStudio.prototype = $extend(com.wiris.quizzes.JsComponent.prototype,{
	getController: function(id) {
		return this.controllersMap.get(id);
	}
	,addBehaviors: function(element,question,instance) {
		var _g1 = this;
		var allelements = element.getElementsByTagName("*");
		var behaviorElements = ["wiriscas","wiriscorrectanswer","wirisassertionparampart","wirisassertionparam","wirisassertion","wirisstructureselect","wirisoptionpart","wirisoption","wirisanswer","wiristablink","wirisrestartbutton","wiristestbutton","wirislocaldata","wirisinitialcontentbutton"];
		var elements = new Array();
		var n = allelements.length;
		var _g = 0;
		while(_g < n) {
			var i = _g++;
			var elem = allelements[i];
			if(elem.id == null || elem.id == "" || !StringTools.startsWith(elem.id,"wiris")) continue;
			var id = this.getMainId(elem.id);
			if(id == null || !this.inArray(id,behaviorElements)) continue;
			elements.push(elem);
		}
		var i = 0;
		n = elements.length;
		var _g = 0;
		while(_g < n) {
			var i1 = _g++;
			var elem = [elements[i1]];
			var id = this.getMainId(elem[0].id);
			var controller = [new com.wiris.quizzes.JsInputController(elem[0],question,null,instance,null)];
			if(id == "wiriscas") {
				controller[0].setQuestionValue = (function(controller) {
					return function(value) {
						if(controller[0].jsInput != null) {
							var input = controller[0].jsInput;
							if(input.isEmpty()) question.wirisCasSession = null; else question.wirisCasSession = value;
						}
					};
				})(controller);
				controller[0].getQuestionValue = (function() {
					return function() {
						return question.wirisCasSession;
					};
				})();
				controller[0].updateInterface = (function(controller,elem) {
					return function(value) {
						if(com.wiris.quizzes.JsDomUtils.hasClass(elem[0],"wirisjscomponent")) {
							var input = new com.wiris.quizzes.JsCasInput(elem[0].ownerDocument,value,true,true);
							elem[0].parentNode.replaceChild(input.element,elem[0]);
							controller[0].jsInput = input;
							n = elements.length;
							_g1.tabs.addSpecialInput(input);
						}
					};
				})(controller,elem);
			} else if(id == "wiriscorrectanswer") {
				var index = [Std.parseInt(this.getIndex(elem[0].id,1))];
				controller[0].setQuestionValue = (function(index) {
					return function(value) {
						if(com.wiris.quizzes.impl.MathContent.isEmpty(value)) value = "";
						question.setCorrectAnswer(index[0],value);
					};
				})(index);
				controller[0].getQuestionValue = (function(index) {
					return function() {
						return question.correctAnswers[index[0]].content;
					};
				})(index);
				controller[0].updateInterface = (function(controller,elem) {
					return function(value) {
						if(com.wiris.quizzes.JsDomUtils.hasClass(elem[0],"wirisjscomponent")) {
							var fieldType = question.getAssertionIndex("syntax_string",0,0) == -1?com.wiris.quizzes.JsStudentAnswerInput.TYPE_EDITOR:com.wiris.quizzes.JsStudentAnswerInput.TYPE_TEXTFIELD;
							_g1.correctAnswer = new com.wiris.quizzes.JsStudentAnswerInput(_g1.getOwnerDocument(),value,fieldType,_g1.t("correctanswer"),question.getGrammarUrl(0),false);
							elem[0].parentNode.replaceChild(_g1.correctAnswer.getElement(),elem[0]);
							controller[0].jsInput = _g1.correctAnswer;
							n = elements.length;
						}
					};
				})(controller,elem);
			} else if(id == "wirisassertionparampart" && question != null) {
				var assertionNames = [this.getIndex(elem[0].id,1)];
				var paramName = [this.getIndex(elem[0].id,2)];
				var correctAnswer = [Std.parseInt(this.getIndex(elem[0].id,3))];
				var userAnswer = [Std.parseInt(this.getIndex(elem[0].id,4))];
				var elemDoc = elem[0].ownerDocument;
				controller[0].setQuestionValue = (function(userAnswer,correctAnswer,paramName,assertionNames,elem) {
					return function(value) {
						value = _g1.getAllPartsValue(elem[0]);
						var names = _g1.compoundParamToArray(assertionNames[0]);
						var _g2 = 0;
						while(_g2 < names.length) {
							var assertionName = names[_g2];
							++_g2;
							var _g3 = 0, _g4 = question.assertions;
							while(_g3 < _g4.length) {
								var ass = _g4[_g3];
								++_g3;
								if(ass.name == assertionName && ass.getAnswer() == userAnswer[0] && (correctAnswer[0] == ass.getCorrectAnswer() || ass.isSyntactic())) ass.setParam(paramName[0],value);
							}
						}
					};
				})(userAnswer,correctAnswer,paramName,assertionNames,elem);
				controller[0].getQuestionValue = (function(userAnswer,correctAnswer,paramName,assertionNames,elem) {
					return function() {
						var names = _g1.compoundParamToArray(assertionNames[0]);
						var formelem = elem[0];
						if(formelem.type == "checkbox" || formelem.type == "radio") {
							var arrayPart = _g1.compoundParamToArray(formelem.value);
							var _g2 = 0;
							while(_g2 < names.length) {
								var assertionName = names[_g2];
								++_g2;
								var assCorrectAnswer = StringTools.startsWith(assertionName,"syntax_")?0:correctAnswer[0];
								var index = question.getAssertionIndex(assertionName,assCorrectAnswer,userAnswer[0]);
								if(index != -1) {
									var qValue = question.assertions[index].getParam(paramName[0]);
									if(formelem.value == qValue || formelem.value != "" && _g1.inList(formelem.value,qValue)) return "true"; else return "false";
								}
							}
							var defValue = com.wiris.quizzes.impl.Assertion.getParameterDefaultValue(names[0],paramName[0]);
							if(formelem.value == defValue || formelem.value != "" && _g1.inList(formelem.value,defValue)) return "true"; else return "false";
						} else if(formelem.type == "text") {
							var _g2 = 0;
							while(_g2 < names.length) {
								var assertionName = names[_g2];
								++_g2;
								var assCorrectAnswer = StringTools.startsWith(assertionName,"syntax_")?0:correctAnswer[0];
								var index = question.getAssertionIndex(assertionName,assCorrectAnswer,userAnswer[0]);
								if(index != -1) {
									var paramValue = _g1.compoundParamToArray(question.assertions[index].getParam(paramName[0]));
									var paramDefault = _g1.compoundParamToArray(com.wiris.quizzes.impl.Assertion.getParameterDefaultValue(assertionName,paramName[0]));
									return _g1.arrayDiff(paramValue,paramDefault).join(", ");
								}
							}
						}
						return "";
					};
				})(userAnswer,correctAnswer,paramName,assertionNames,elem);
				controller[0].updateInterface = (function(userAnswer,assertionNames,elem) {
					return function(value) {
						if(com.wiris.quizzes.JsDomUtils.hasClass(elem[0],"wirisassertionparamall")) {
							var parent = elem[0].parentNode;
							while(parent.nodeName.toLowerCase() != "div") parent = parent.parentNode;
							var brothers = parent.getElementsByTagName("input");
							var j;
							var _g2 = 0, _g11 = brothers.length;
							while(_g2 < _g11) {
								var j1 = _g2++;
								var input = brothers[j1];
								if(input.type.toLowerCase() == "checkbox" && input != elem[0]) {
									if(value.toLowerCase() == "true") input.checked = true;
									input.disabled = value.toLowerCase() == "true";
								}
							}
						}
						if(_g1.ready) {
							var names = _g1.compoundParamToArray(assertionNames[0]);
							var _g2 = 0;
							while(_g2 < names.length) {
								var assertionName = names[_g2];
								++_g2;
								if(StringTools.startsWith(assertionName,"syntax_")) {
									_g1.updateGrammar(userAnswer[0]);
									break;
								}
							}
						}
					};
				})(userAnswer,assertionNames,elem);
			} else if(id == "wirisassertionparam" && question != null) {
				var assertionNames = [this.getIndex(elem[0].id,1)];
				var paramName = [this.getIndex(elem[0].id,2)];
				var correctAnswer = [Std.parseInt(this.getIndex(elem[0].id,3))];
				var userAnswer = [Std.parseInt(this.getIndex(elem[0].id,4))];
				controller[0].setQuestionValue = (function(userAnswer,correctAnswer,paramName,assertionNames,elem) {
					return function(value) {
						var names = _g1.compoundParamToArray(assertionNames[0]);
						var _g2 = 0;
						while(_g2 < names.length) {
							var assertionName = names[_g2];
							++_g2;
							var _g4 = 0, _g3 = question.assertions.length;
							while(_g4 < _g3) {
								var index = _g4++;
								if(question.assertions[index].name == assertionName && question.assertions[index].getAnswer() == userAnswer[0] && (question.assertions[index].getCorrectAnswer() == correctAnswer[0] || question.assertions[index].isSyntactic())) {
									var actualName = paramName[0];
									if(assertionName == "equivalent_function" && paramName[0] == "name") {
										if(StringTools.startsWith(value,"#")) {
											value = HxOverrides.substr(value,1,null);
											elem[0].value = value;
										}
									} else if(paramName[0] == "list") {
										if(assertionName == "syntax_quantity" || value != "true") question.assertions[index].setParam("nobracketslist",value);
										value = value == "true"?"(,[":"(,[,{";
										actualName = "groupoperators";
									} else if(paramName[0] == "forcebrackets") {
										value = value == "true"?"false":"true";
										actualName = "nobracketslist";
									} else if(paramName[0] == "itemseparators") value = value == "true"?"\\,,\\n":"\\n"; else if(paramName[0] == "comparesets") {
										value = value == "true"?"false":"true";
										question.assertions[index].setParam("ordermatters",value);
										actualName = "repetitionmatters";
									}
									question.assertions[index].setParam(actualName,value);
								}
							}
						}
					};
				})(userAnswer,correctAnswer,paramName,assertionNames,elem);
				controller[0].getQuestionValue = (function(userAnswer,correctAnswer,paramName,assertionNames) {
					return function() {
						var names = _g1.compoundParamToArray(assertionNames[0]);
						var value;
						var _g2 = 0;
						while(_g2 < names.length) {
							var assertionName = names[_g2];
							++_g2;
							var assCorrectAnswer = StringTools.startsWith(assertionName,"syntax_")?0:correctAnswer[0];
							var index = question.getAssertionIndex(assertionName,assCorrectAnswer,userAnswer[0]);
							if(index != -1) {
								if(paramName[0] == "list") {
									value = "" + Std.string(!_g1.inList("{",question.assertions[index].getParam("groupoperators")));
									if(assertionName == "syntax_quantity" && value == "true") value = question.assertions[index].getParam("nobracketslist");
								} else if(paramName[0] == "forcebrackets") value = question.assertions[index].getParam("nobracketslist") == "true"?"false":"true"; else if(paramName[0] == "itemseparators") value = Std.string(question.assertions[index].getParam(paramName[0]) == "\\,,\\n") + ""; else if(paramName[0] == "comparesets") value = question.assertions[index].getParam("ordermatters") == "true"?"false":"true"; else value = question.assertions[index].getParam(paramName[0]);
								return value;
							}
						}
						return "";
					};
				})(userAnswer,correctAnswer,paramName,assertionNames);
				controller[0].updateInterface = (function(userAnswer,correctAnswer,paramName,assertionNames,elem) {
					return function(value) {
						if(paramName[0] == "list") {
							var unique = _g1.getUniqueNumber(elem[0].id);
							var doc = elem[0].ownerDocument;
							var bvalue = value == "true";
							var forcebrackets = doc.getElementById("wirisassertionparam" + unique + "[syntax_expression][forcebrackets][" + correctAnswer[0] + "][" + userAnswer[0] + "]");
							if(!bvalue) forcebrackets.checked = true;
							forcebrackets.disabled = !bvalue;
							var comma = doc.getElementById("wirisassertionparam" + unique + "[syntax_quantity][itemseparators][" + correctAnswer[0] + "][" + userAnswer[0] + "]");
							if(!bvalue) comma.checked = false;
							comma.disabled = !bvalue;
							_g1.setCompareSetsEnabled(doc,unique,correctAnswer[0],userAnswer[0]);
						}
						if(_g1.ready) {
							var names = _g1.compoundParamToArray(assertionNames[0]);
							var _g2 = 0;
							while(_g2 < names.length) {
								var assertionName = names[_g2];
								++_g2;
								if(StringTools.startsWith(assertionName,"syntax_")) {
									_g1.updateGrammar(userAnswer[0]);
									break;
								}
							}
						}
					};
				})(userAnswer,correctAnswer,paramName,assertionNames,elem);
			} else if(id == "wirisassertion" && question != null) {
				var assertionName = [this.getIndex(elem[0].id,1)];
				var correctAnswer = [StringTools.startsWith(assertionName[0],"syntax_")?0:Std.parseInt(this.getIndex(elem[0].id,2))];
				var userAnswer = [Std.parseInt(this.getIndex(elem[0].id,3))];
				var unique = [this.getUniqueNumber(elem[0].id)];
				var singletons = [["equivalent_","syntax_"]];
				var defaultSingleton = [["equivalent_symbolic","syntax_expression"]];
				controller[0].setQuestionValue = (function(singletons,userAnswer,correctAnswer,assertionName) {
					return function(value) {
						var boolValue = value.toLowerCase() == "true";
						if(boolValue) {
							var prefix;
							var _g11 = 0;
							while(_g11 < singletons[0].length) {
								var prefix1 = singletons[0][_g11];
								++_g11;
								if(question.assertions != null && StringTools.startsWith(assertionName[0],prefix1)) {
									var k = question.assertions.length - 1;
									while(k >= 0) {
										var assertion = question.assertions[k];
										if(StringTools.startsWith(assertion.name,prefix1) && assertion.getAnswer() == userAnswer[0] && (assertion.getCorrectAnswer() == correctAnswer[0] || assertion.isSyntactic())) HxOverrides.remove(question.assertions,assertion);
										k--;
									}
								}
							}
							question.setAssertion(assertionName[0],correctAnswer[0],userAnswer[0]);
							var _g2 = 0, _g3 = _g1.controllers;
							while(_g2 < _g3.length) {
								var cont = _g3[_g2];
								++_g2;
								if(StringTools.startsWith(_g1.getMainId(cont.element.id),"wirisassertionparam")) {
									if(_g1.inList(assertionName[0],_g1.getIndex(cont.element.id,1))) {
										var paramName = _g1.getIndex(cont.element.id,2);
										if(paramName != "list" && paramName != "forcebrackets" && paramName != "groupOperators") cont.saveInputValue();
									}
								}
							}
						} else {
							var index = question.getAssertionIndex(assertionName[0],correctAnswer[0],userAnswer[0]);
							if(index != -1) HxOverrides.remove(question.assertions,question.assertions[index]);
						}
					};
				})(singletons,userAnswer,correctAnswer,assertionName);
				controller[0].getQuestionValue = (function(defaultSingleton,singletons,userAnswer,correctAnswer,assertionName) {
					return function() {
						if(question.getAssertionIndex(assertionName[0],correctAnswer[0],userAnswer[0]) != -1) return "true"; else {
							var j;
							var _g2 = 0, _g11 = defaultSingleton[0].length;
							while(_g2 < _g11) {
								var j1 = _g2++;
								if(defaultSingleton[0][j1] == assertionName[0]) {
									var found = false;
									if(question.assertions != null) {
										var assertion;
										var _g3 = 0, _g4 = question.assertions;
										while(_g3 < _g4.length) {
											var assertion1 = _g4[_g3];
											++_g3;
											if(StringTools.startsWith(assertion1.name,singletons[0][j1]) && assertion1.getCorrectAnswer() == correctAnswer[0] && assertion1.getAnswer() == userAnswer[0]) {
												found = true;
												break;
											}
										}
									}
									if(!found) {
										question.setAssertion(assertionName[0],correctAnswer[0],userAnswer[0]);
										return "true";
									}
								}
							}
							return "false";
						}
					};
				})(defaultSingleton,singletons,userAnswer,correctAnswer,assertionName);
				controller[0].updateInterface = (function(unique,userAnswer,correctAnswer,assertionName,elem) {
					return function(value) {
						var boolValue = value.toLowerCase() == "true";
						if(boolValue && StringTools.startsWith(assertionName[0],"syntax_")) {
							var superFieldset = elem[0].parentNode;
							while(superFieldset.nodeName.toLowerCase() != "fieldset") superFieldset = superFieldset.parentNode;
							var paramsFieldset = com.wiris.quizzes.JsDomUtils.getElementsByClassName("wirissyntaxparams","fieldset",superFieldset)[0];
							var legend = _g1.t("syntaxparams");
							var visibleDivs = [];
							var visibleEquivs = [];
							var showChecks = true;
							var showTolerance = true;
							var correctAnswerType = com.wiris.quizzes.JsStudentAnswerInput.TYPE_EDITOR;
							if(assertionName[0] == "syntax_expression") {
								legend = _g1.t("syntaxparams_expression");
								visibleDivs = ["wirissyntaxconstants","wirissyntaxfunctions","wirissyntaxlist","wirissyntaxforcebrackets"];
								visibleEquivs = ["wirisequivalent_literal","wirisequivalent_symbolic","wirisequivalent_equations","wirisequivalent_all","wirisequivalent_function","wiriscomparesets"];
							} else if(assertionName[0] == "syntax_quantity") {
								legend = _g1.t("syntaxparams_quantity");
								visibleDivs = ["wirissyntaxconstants","wirissyntaxunits","wirissyntaxunitprefixes","wirissyntaxmixedfractions","wirissyntaxlist","wirissyntaxitemseparators"];
								visibleEquivs = ["wirisequivalent_literal","wirisequivalent_symbolic","wirisequivalent_equations","wirisequivalent_all","wirisequivalent_function","wiriscomparesets"];
							} else if(assertionName[0] == "syntax_string") {
								visibleEquivs = ["wirisequivalent_literal","wirisequivalent_all","wirisequivalent_function","wirisusecase","wirisusespaces"];
								showChecks = false;
								showTolerance = false;
								correctAnswerType = com.wiris.quizzes.JsStudentAnswerInput.TYPE_TEXTFIELD;
							}
							var allDivs = ["wirissyntaxconstants","wirissyntaxfunctions","wirissyntaxunits","wirissyntaxunitprefixes","wirissyntaxcurlybracket","wirissyntaxmixedfractions","wirissyntaxnobracketslist","wirissyntaxitemseparators","wirissyntaxlist","wirissyntaxforcebrackets"];
							if(visibleDivs.length == 0) com.wiris.quizzes.JsDomUtils.addClass(paramsFieldset,"wirishidden"); else {
								com.wiris.quizzes.JsDomUtils.removeClass(paramsFieldset,"wirishidden");
								paramsFieldset.getElementsByTagName("legend")[0].innerHTML = legend;
								var divs = paramsFieldset.getElementsByTagName("div");
								var j;
								var _g3 = 0, _g2 = divs.length;
								while(_g3 < _g2) {
									var j1 = _g3++;
									var divId = _g1.getMainId(divs[j1].id);
									if(_g1.inArray(divId,allDivs)) {
										if(!_g1.inArray(divId,visibleDivs)) com.wiris.quizzes.JsDomUtils.addClass(divs[j1],"wirishidden"); else com.wiris.quizzes.JsDomUtils.removeClass(divs[j1],"wirishidden");
										if(divId == "wirissyntaxcurlybracket") divs[j1].getElementsByTagName("label")[0].innerHTML = assertionName[0] == "syntax_quantity"?_g1.t("nothing"):_g1.t("list");
									}
								}
							}
							var _g2 = 0, _g3 = _g1.controllers;
							while(_g2 < _g3.length) {
								var cont = _g3[_g2];
								++_g2;
								if(_g1.getMainId(cont.element.id) == "wirisassertionparam") {
									var paramname = _g1.getIndex(cont.element.id,2);
									if(paramname == "list" || paramname == "forcebrackets" || paramname == "itemseparators") {
										var listValue = cont.getQuestionValue();
										var box = cont.element;
										box.checked = listValue == "true";
										cont.updateInterface(listValue);
									}
								}
							}
							var toleranceDiv = com.wiris.quizzes.JsDomUtils.getElementsByClassName("wiristolerance","div",_g1.getOwnerDocument())[0];
							if(showTolerance) com.wiris.quizzes.JsDomUtils.removeClass(toleranceDiv,"wirishidden"); else com.wiris.quizzes.JsDomUtils.addClass(toleranceDiv,"wirishidden");
							var comparisonFieldset = com.wiris.quizzes.JsDomUtils.getElementsByClassName("wiriscomparisonfieldset","fieldset",_g1.getOwnerDocument())[0];
							var lis = comparisonFieldset.getElementsByTagName("li");
							var j;
							var _g3 = 0, _g2 = lis.length;
							while(_g3 < _g2) {
								var j1 = _g3++;
								var classes = lis[j1].className.split(" ");
								var found = false;
								var className;
								var _g4 = 0;
								while(_g4 < classes.length) {
									var className1 = classes[_g4];
									++_g4;
									if(_g1.inArray(className1,visibleEquivs)) found = true;
								}
								if(found) com.wiris.quizzes.JsDomUtils.removeClass(lis[j1],"wirishidden"); else {
									com.wiris.quizzes.JsDomUtils.addClass(lis[j1],"wirishidden");
									var inputs = lis[j1].getElementsByTagName("input");
									var j2;
									var _g5 = 0, _g4 = inputs.length;
									while(_g5 < _g4) {
										var j3 = _g5++;
										var input = inputs[j3];
										if(input.type.toLowerCase() == "radio" && true == input.checked) {
											input.checked = false;
											var equivalence = assertionName[0] == "syntax_string"?"equivalent_literal":"equivalent_sybolic";
											var newEquiv = _g1.getOwnerDocument().getElementById("wirisassertion" + unique[0] + "[" + equivalence + "][" + correctAnswer[0] + "][" + userAnswer[0] + "]");
											newEquiv.checked = true;
										} else if(input.type.toLowerCase() == "checkbox" && true == input.checked) input.checked = false;
									}
								}
							}
							var additionalFieldset = com.wiris.quizzes.JsDomUtils.getElementsByClassName("wirisadditionalchecksfieldset","fieldset",_g1.getOwnerDocument())[0];
							if(showChecks) com.wiris.quizzes.JsDomUtils.removeClass(additionalFieldset,"wirishidden"); else com.wiris.quizzes.JsDomUtils.addClass(additionalFieldset,"wirishidden");
							var editor = _g1.getOwnerDocument().getElementById("wirislocaldata" + unique[0] + "[inputField][0]");
							var popup = _g1.getOwnerDocument().getElementById("wirislocaldata" + unique[0] + "[inputField][1]");
							var compound = _g1.getOwnerDocument().getElementById("wirislocaldata" + unique[0] + "[inputCompound]");
							if(assertionName[0] == "syntax_string") {
								var plain = _g1.getOwnerDocument().getElementById("wirislocaldata" + unique[0] + "[inputField][2]");
								if(editor != null) {
									editor.disabled = true;
									editor.checked = false;
								}
								if(popup != null) {
									popup.disabled = true;
									popup.checked = false;
								}
								if(plain != null) {
									plain.checked = true;
									_g1.getController(plain.id).updateInputValue();
								}
								if(compound != null) {
									compound.disabled = true;
									compound.checked = false;
									_g1.getController(compound.id).updateInputValue();
								}
							} else {
								if(compound != null) compound.disabled = false;
								if(editor != null) editor.disabled = compound != null && compound.checked;
								if(popup != null) popup.disabled = false;
							}
							if(_g1.correctAnswer != null) _g1.correctAnswer.setType(correctAnswerType);
							if(_g1.ready) _g1.updateGrammar(userAnswer[0]);
						} else if(StringTools.startsWith(assertionName[0],"check_")) {
							var inputs = elem[0].parentNode.getElementsByTagName("input");
							var j;
							var _g2 = 0, _g11 = inputs.length;
							while(_g2 < _g11) {
								var j1 = _g2++;
								if(inputs[j1] != elem[0]) {
									var finput = inputs[j1];
									finput.disabled = !boolValue;
								}
							}
						} else if(boolValue && StringTools.startsWith(assertionName[0],"equivalent_")) {
							var equivFunction = assertionName[0] == "equivalent_function";
							var paramid = "wirisassertionparam" + unique[0] + "[equivalent_function][name][" + correctAnswer[0] + "][" + userAnswer[0] + "]";
							var finput = elem[0].ownerDocument.getElementById(paramid);
							if(finput != null) finput.disabled = !equivFunction;
							if(question.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER) == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE) {
								var distribute = elem[0].ownerDocument.getElementById("wirislocaldata" + unique[0] + "[gradeCompound][distribute]");
								if(equivFunction && distribute.checked) {
									distribute.checked = false;
									var and = elem[0].ownerDocument.getElementById("wirislocaldata" + unique[0] + "[gradeCompound][and]");
									and.checked = true;
									var dist = elem[0].ownerDocument.getElementById("wirislocaldata" + unique[0] + "[gradeCompoundDistribution]");
									dist.value = "";
									dist.disabled = true;
								}
								distribute.disabled = equivFunction;
							}
							_g1.setCompareSetsEnabled(elem[0].ownerDocument,unique[0],correctAnswer[0],userAnswer[0]);
						}
					};
				})(unique,userAnswer,correctAnswer,assertionName,elem);
			} else if(id == "wirisstructureselect" && question != null) {
				var correctAnswer = [Std.parseInt(this.getIndex(elem[0].id,1))];
				var userAnswer = [Std.parseInt(this.getIndex(elem[0].id,2))];
				controller[0].setQuestionValue = (function(userAnswer,correctAnswer,elem) {
					return function(value) {
						var sel = elem[0];
						var index;
						var _g2 = 0, _g11 = sel.options.length;
						while(_g2 < _g11) {
							var index1 = _g2++;
							question.removeAssertion(sel.options[index1].value,correctAnswer[0],userAnswer[0]);
						}
						if(value != null && value != "") question.setAssertion(value,correctAnswer[0],userAnswer[0]);
					};
				})(userAnswer,correctAnswer,elem);
				controller[0].getQuestionValue = (function(userAnswer,correctAnswer) {
					return function() {
						var name;
						var _g11 = 0, _g2 = com.wiris.quizzes.impl.Assertion.structure;
						while(_g11 < _g2.length) {
							var name1 = _g2[_g11];
							++_g11;
							var index = question.getAssertionIndex(name1,correctAnswer[0],userAnswer[0]);
							if(index != -1) return name1;
						}
						return "";
					};
				})(userAnswer,correctAnswer);
			} else if(id == "wirisoptionpart" && question != null) {
				var name = [this.getIndex(elem[0].id,1)];
				controller[0].setQuestionValue = (function(name,elem) {
					return function(value) {
						value = _g1.getAllPartsValue(elem[0]);
						question.setOption(name[0],value);
					};
				})(name,elem);
				controller[0].getQuestionValue = (function(name,elem) {
					return function() {
						var qvalue = question.getOption(name[0]);
						var felem = elem[0];
						if(_g1.inList(felem.value,qvalue)) return "true"; else return "false";
					};
				})(name,elem);
			} else if(id == "wirisoption" && question != null) {
				var name = [this.getIndex(elem[0].id,1)];
				var formelem = elem[0];
				controller[0].setQuestionValue = (function(name) {
					return function(value) {
						if(name[0] == com.wiris.quizzes.impl.Option.OPTION_TOLERANCE) value = "10^(-" + value + ")";
						question.setOption(name[0],value);
					};
				})(name);
				controller[0].getQuestionValue = (function(name) {
					return function() {
						var value = question.getOption(name[0]);
						if(name[0] == com.wiris.quizzes.impl.Option.OPTION_TOLERANCE) value = HxOverrides.substr(value,5,value.length - 6);
						return value;
					};
				})(name);
				controller[0].updateInterface = (function(name,elem) {
					return function(value) {
						if(name[0] == com.wiris.quizzes.impl.Option.OPTION_TOLERANCE || name[0] == com.wiris.quizzes.impl.Option.OPTION_PRECISION) {
							var warn = false;
							if(_g1.htmlguiconf.tabVariables && _g1.htmlguiconf.tabCorrectAnswer && _g1.htmlguiconf.optOpenAnswer) {
								var precision = question.getOption(com.wiris.quizzes.impl.Option.OPTION_PRECISION);
								var tolerance = question.getOption(com.wiris.quizzes.impl.Option.OPTION_TOLERANCE);
								tolerance = HxOverrides.substr(tolerance,5,tolerance.length - 6);
								var pint = Std.parseInt(precision);
								var tint = Std.parseInt(tolerance);
								warn = pint < tint;
							}
							var doc = elem[0].ownerDocument;
							var unique = _g1.getUniqueNumber(elem[0].id);
							_g1.setWarning(doc,unique,"warningprecision",warn);
							_g1.setWarning(doc,unique,"warningtolerance",warn);
						}
					};
				})(name,elem);
			} else if(id == "wirisanswer") {
				var index = [Std.parseInt(this.getIndex(elem[0].id,1))];
				controller[0].setQuestionValue = (function(index) {
					return function(value) {
						if(instance != null) {
							if(instance.userData == null) instance.userData = new com.wiris.quizzes.impl.UserData();
							instance.userData.setUserAnswer(index[0],value);
						}
					};
				})(index);
				controller[0].getQuestionValue = (function(index) {
					return function() {
						var value = "";
						if(instance != null && instance.userData != null && instance.userData.answers != null && instance.userData.answers.length > index[0]) value = instance.userData.answers[index[0]].content;
						if(question.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER) == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE) {
							if(com.wiris.quizzes.impl.MathContent.isEmpty(value)) {
								var answers = com.wiris.quizzes.impl.HTMLTools.parseCompoundAnswer(question.correctAnswers[0]);
								var j;
								var _g2 = 0, _g11 = answers.length;
								while(_g2 < _g11) {
									var j1 = _g2++;
									answers[j1][1] = "";
								}
								value = com.wiris.quizzes.impl.HTMLTools.joinCompoundAnswer(answers).content;
							}
						}
						return value;
					};
				})(index);
				controller[0].updateInterface = (function(index,controller,elem) {
					return function(value) {
						if(com.wiris.quizzes.JsDomUtils.hasClass(elem[0],"wirisjscomponent")) {
							var type = _g1.getStudentAnswerInputType(question);
							_g1.testAnswer = new com.wiris.quizzes.JsStudentAnswerInput(_g1.getOwnerDocument(),value,type,_g1.t("studentanswer"),question.getGrammarUrl(index[0]));
							elem[0].parentNode.replaceChild(_g1.testAnswer.getElement(),elem[0]);
							controller[0].jsInput = _g1.testAnswer;
							n = elements.length;
						}
					};
				})(index,controller,elem);
			} else if(id == "wirisrestartbutton") controller[0].updateInterface = (function(elem) {
				return function(value) {
					_g1.setPreviewLoading(elem[0],true);
					var caDiv = com.wiris.quizzes.JsDomUtils.getNearestElementByClassName(elem[0],"wiristestcorrectanswer");
					var caIndex = Std.parseInt(_g1.getIndex(caDiv.id,1));
					_g1.getQuestion();
					if(instance.userData == null) instance.userData = new com.wiris.quizzes.impl.UserData();
					instance.userData.randomSeed = Std.random(65536);
					instance.clearChecks();
					instance.clearVariables();
					if(question.wirisCasSession != null && question.correctAnswers != null && question.correctAnswers.length > caIndex) {
						var caDef = question.correctAnswers[caIndex].content;
						var builder = com.wiris.quizzes.api.QuizzesBuilder.getInstance();
						var req = builder.newVariablesRequest(caDef,question,instance);
						var service = builder.getQuizzesService();
						try {
							instance.update(service.execute(req));
						} catch( e ) {
							var w = _g1.getOwnerWindow();
							if(w != null) w.alert(e); else js.Lib.alert(e);
						}
					}
					var content = _g1.correctAnswer.getValue();
					if(_g1.correctAnswer.isText()) content = instance.expandVariablesText(content); else content = instance.expandVariablesMathML(content);
					_g1.testAnswer.setValue(content);
					var dynamicDiv = com.wiris.quizzes.JsDomUtils.getNearestElementByClassName(elem[0],"wiristestdynamic");
					dynamicDiv.innerHTML = _g1.htmlgui.getWirisTestDynamic(question,instance,caIndex,0);
					_g1.setPreviewLoading(elem[0],false);
					var elems = elem[0].parentNode.getElementsByTagName("input");
					var j;
					var _g3 = 0, _g2 = elems.length;
					while(_g3 < _g2) {
						var j1 = _g3++;
						if(_g1.getMainId(elems[j1].id) == "wiristestbutton") {
							var testbutton = elems[j1];
							testbutton.disabled = false;
						}
					}
				};
			})(elem); else if(id == "wiristestbutton") {
				var felem = elem[0];
				felem.disabled = true;
				controller[0].updateInterface = (function(elem) {
					return function(value) {
						_g1.setPreviewLoading(elem[0],true);
						var caDiv = com.wiris.quizzes.JsDomUtils.getNearestElementByClassName(elem[0],"wiristestcorrectanswer");
						var caIndex = Std.parseInt(_g1.getIndex(caDiv.id,1));
						var uaDef = _g1.testAnswer.getValue();
						if(question.correctAnswers != null && question.correctAnswers.length > caIndex && !com.wiris.quizzes.impl.MathContent.isEmpty(question.correctAnswers[caIndex].content) && uaDef != null && !com.wiris.quizzes.impl.MathContent.isEmpty(uaDef)) {
							var userAnswers = new Array();
							userAnswers.push(uaDef);
							var correctAnswers = new Array();
							var j;
							var _g2 = 0;
							while(_g2 < caIndex) {
								var j1 = _g2++;
								correctAnswers.push("");
							}
							correctAnswers.push(question.correctAnswers[caIndex].content);
							var builder = com.wiris.quizzes.api.QuizzesBuilder.getInstance();
							var req = builder.newEvalMultipleAnswersRequest(correctAnswers,userAnswers,question,instance);
							var service = builder.getQuizzesService();
							try {
								instance.update(service.execute(req));
							} catch( e ) {
								var w = _g1.getOwnerWindow();
								if(w != null) w.alert(e); else js.Lib.alert(e);
							}
						} else instance.clearChecks();
						_g1.setPreviewLoading(elem[0],false);
						var dynamicDiv = com.wiris.quizzes.JsDomUtils.getNearestElementByClassName(elem[0],"wiristestdynamic");
						dynamicDiv.innerHTML = _g1.htmlgui.getWirisTestDynamic(question,instance,caIndex,0);
					};
				})(elem);
			} else if(id == "wirislocaldata") {
				var name = [this.getIndex(elem[0].id,1)];
				var felem = [elem[0]];
				controller[0].setQuestionValue = (function(felem,name) {
					return function(value) {
						if(felem[0].type == "checkbox") {
							if(value == "true") question.setLocalData(name[0],felem[0].value); else question.removeLocalData(name[0]);
						} else if(felem[0].type == "radio") {
							if(value == "true") question.setLocalData(name[0],felem[0].value);
						} else question.setLocalData(name[0],value);
					};
				})(felem,name);
				controller[0].getQuestionValue = (function(felem,name) {
					return function() {
						var value = question.getLocalData(name[0]);
						if(felem[0].type == "checkbox" || felem[0].type == "radio") value = Std.string(value == felem[0].value);
						return value;
					};
				})(felem,name);
				controller[0].updateInterface = (function(felem,name,elem) {
					return function(value) {
						if(name[0] == com.wiris.quizzes.impl.LocalData.KEY_SHOW_CAS) {
							var button = null;
							var inputs = elem[0].parentNode.getElementsByTagName("input");
							var j;
							var _g2 = 0, _g11 = inputs.length;
							while(_g2 < _g11) {
								var j1 = _g2++;
								var input = inputs[j1];
								if(input.type == "button") {
									button = input;
									break;
								}
							}
							if(button != null) button.disabled = !(value == "true" || value == "add" || value == "replace");
						}
						if(name[0] == com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER) {
							var doc = elem[0].ownerDocument;
							var unique = _g1.getUniqueNumber(elem[0].id);
							var inlineEditorRadioId = "wirislocaldata" + unique + "[inputField][0]";
							var inlineEditorRadio = doc.getElementById(inlineEditorRadioId);
							if(value == "true") {
								if(inlineEditorRadio.checked) {
									inlineEditorRadio.checked = false;
									var popupEditorRadioId = "wirislocaldata" + unique + "[inputField][1]";
									var popupEditorRadio = doc.getElementById(popupEditorRadioId);
									popupEditorRadio.checked = true;
								}
								inlineEditorRadio.disabled = true;
							} else inlineEditorRadio.disabled = false;
							var gradeDivId = "wiriscompoundanswergradediv" + unique;
							var gradeDiv = doc.getElementById(gradeDivId);
							if(value == "true") gradeDiv.style.display = "block"; else gradeDiv.style.display = "none";
						}
						if(name[0] == com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER || name[0] == com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_INPUT_FIELD) {
							if(_g1.testAnswer != null) _g1.testAnswer.setType(_g1.getStudentAnswerInputType(question));
						}
						if(name[0] == com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE) {
							if(value == "true") {
								var doc = elem[0].ownerDocument;
								var unique = _g1.getUniqueNumber(elem[0].id);
								var distributionInputId = "wirislocaldata" + unique + "[" + com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTION + "]";
								var distributionInput = doc.getElementById(distributionInputId);
								if(felem[0].value == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_AND) distributionInput.disabled = true; else if(felem[0].value == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTE) distributionInput.disabled = false;
							}
						}
					};
				})(felem,name,elem);
			} else if(id == "wirisinitialcontentbutton") {
				controller[0].setQuestionValue = (function() {
					return function(value) {
						if(value == "") value = null;
						question.setLocalData(com.wiris.quizzes.impl.LocalData.KEY_CAS_INITIAL_SESSION,value);
					};
				})();
				controller[0].getQuestionValue = (function() {
					return function() {
						return question.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_CAS_INITIAL_SESSION);
					};
				})();
				controller[0].updateInterface = (function(controller,elem) {
					return function(value) {
						if(com.wiris.quizzes.JsDomUtils.hasClass(elem[0],"wirisjscomponent")) {
							var initial = new com.wiris.quizzes.JsInitialCasInput(elem[0].ownerDocument,value);
							elem[0].parentNode.replaceChild(initial.element,elem[0]);
							controller[0].jsInput = initial;
							initial.setEnabled(question.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_SHOW_CAS) != "false");
							n = elements.length;
						}
					};
				})(controller,elem);
			}
			controller[0].init();
			this.controllers.push(controller[0]);
			this.controllersMap.set(elem[0].id,controller[0]);
		}
	}
	,exportQuestion: function() {
		var proxyurl = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL);
		var params = new Hash();
		params.set("service","echo");
		com.wiris.quizzes.JsDomUtils.saveFile(this.element,proxyurl,"wirisquestion.xml",this.getQuestion().serialize(),params);
	}
	,importQuestionCallback: function(data) {
		var builder = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance();
		var question = builder.readQuestion(data);
		this.tabs.reset();
		this.create(question,builder.newQuestionInstance(),this.htmlguiconf);
		this.init();
		this.getOwnerWindow().focus();
	}
	,importQuestion: function() {
		var proxyurl = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL);
		var params = new Hash();
		params.set("service","echo");
		com.wiris.quizzes.JsDomUtils.loadFile(this.element,proxyurl,$bind(this,this.importQuestionCallback),params);
	}
	,setWarning: function(doc,unique,warning,enabled) {
		var warning1 = doc.getElementById("wiriswarning" + unique + "[" + warning + "]");
		if(warning1 != null) {
			if(enabled) warning1.style.display = "block"; else warning1.style.display = "none";
		}
	}
	,setCompareSetsEnabled: function(doc,unique,correctAnswer,userAnswer) {
		var compareSets = doc.getElementById("wirisassertionparam" + unique + "[equivalent_symbolic,equivalent_literal][comparesets][" + correctAnswer + "][" + userAnswer + "]");
		var equivSymbolic = doc.getElementById("wirisassertion" + unique + "[equivalent_symbolic][" + correctAnswer + "][" + userAnswer + "]");
		var equivLiteral = doc.getElementById("wirisassertion" + unique + "[equivalent_literal][" + correctAnswer + "][" + userAnswer + "]");
		var list = doc.getElementById("wirisassertionparam" + unique + "[syntax_expression,syntax_quantity][list][" + correctAnswer + "][" + userAnswer + "]");
		compareSets.disabled = !equivSymbolic.checked && !equivLiteral.checked || !list.checked;
	}
	,updateGrammar: function(userAnswer) {
		var _g = this;
		var win = this.getOwnerWindow();
		var q = this.question.getImpl();
		if(this.testAnswer != null) {
			var f = function() {
				_g.testAnswer.setGrammarUrl(q.getGrammarUrl(userAnswer));
			};
			win.setTimeout(f,0);
		}
		if(this.correctAnswer != null) {
			var f = function() {
				_g.correctAnswer.setGrammarUrl(q.getGrammarUrl(userAnswer));
			};
			win.setTimeout(f,0);
		}
	}
	,getStudentAnswerInputType: function(question) {
		var type = 0;
		var qq = question.getImpl();
		var inputfield = qq.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_INPUT_FIELD);
		if(qq.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER) == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE) {
			if(inputfield == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT) type = com.wiris.quizzes.JsStudentAnswerInput.TYPE_COMPOUND_TEXTFIELD; else type = com.wiris.quizzes.JsStudentAnswerInput.TYPE_COMPOUND_IMAGEMATH;
		} else if(inputfield == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT) type = com.wiris.quizzes.JsStudentAnswerInput.TYPE_TEXTFIELD; else if(inputfield == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_POPUP_EDITOR) type = com.wiris.quizzes.JsStudentAnswerInput.TYPE_IMAGEMATH; else if(inputfield == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_INLINE_EDITOR) type = com.wiris.quizzes.JsStudentAnswerInput.TYPE_EDITOR;
		return type;
	}
	,getUniqueNumber: function(id) {
		var start = this.getMainId(id).length;
		var end = id.indexOf("[");
		if(end == -1) return HxOverrides.substr(id,start,null); else return HxOverrides.substr(id,start,end - start);
	}
	,getIndex: function(id,position) {
		var start = 0;
		var i = 0;
		var _g = 0;
		while(_g < position) {
			var i1 = _g++;
			start = id.indexOf("[",start) + 1;
		}
		return HxOverrides.substr(id,start,id.indexOf("]",start) - start);
	}
	,getMainId: function(id) {
		if(id == null) return null;
		var sb = new StringBuf();
		var i = 0;
		while(i < id.length && (HxOverrides.cca(id,i) >= 65 && HxOverrides.cca(id,i) <= 90) || HxOverrides.cca(id,i) >= 97 && HxOverrides.cca(id,i) <= 122) {
			sb.b += Std.string(id.charAt(i));
			i++;
		}
		return sb.b;
	}
	,inArray: function(value,array) {
		var elem;
		var _g = 0;
		while(_g < array.length) {
			var elem1 = array[_g];
			++_g;
			if(value == elem1) return true;
		}
		return false;
	}
	,computeCompoundParam: function(old,part,add) {
		var oldelems = this.compoundParamToArray(old);
		var partelems = this.compoundParamToArray(part);
		if(add) {
			var _g = 0;
			while(_g < partelems.length) {
				var partelem = partelems[_g];
				++_g;
				if(!this.inArray(partelem,oldelems)) oldelems.push(partelem);
			}
		} else {
			var _g = 0;
			while(_g < partelems.length) {
				var partelem = partelems[_g];
				++_g;
				HxOverrides.remove(oldelems,partelem);
			}
		}
		return oldelems.join(", ");
	}
	,compoundParamToArray: function(value) {
		if(StringTools.trim(value).length == 0) return new Array();
		var array = value.split(",");
		var i;
		var _g1 = 0, _g = array.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			array[i1] = StringTools.trim(array[i1]);
		}
		return array;
	}
	,inList: function(sub,all) {
		var allarray = this.compoundParamToArray(all);
		var subarray = this.compoundParamToArray(sub);
		var _g = 0;
		while(_g < subarray.length) {
			var elem = subarray[_g];
			++_g;
			if(!this.inArray(elem,allarray)) return false;
		}
		return true;
	}
	,equalList: function(a,b) {
		if(a == b) return true;
		var aarray = this.compoundParamToArray(a);
		var barray = this.compoundParamToArray(b);
		if(aarray.length != barray.length) return false;
		var _g = 0;
		while(_g < aarray.length) {
			var elem = aarray[_g];
			++_g;
			if(!this.inArray(elem,barray)) return false;
		}
		return true;
	}
	,concatSet: function(a,b) {
		var _g = 0;
		while(_g < b.length) {
			var elem = b[_g];
			++_g;
			if(!this.inArray(elem,a)) a.push(elem);
		}
		return a;
	}
	,arrayDiff: function(a,b) {
		var _g = 0;
		while(_g < b.length) {
			var elem = b[_g];
			++_g;
			HxOverrides.remove(a,elem);
		}
		return a;
	}
	,getAllPartsValue: function(elem) {
		var elemDoc = elem.ownerDocument;
		var paramid = HxOverrides.substr(elem.id,0,elem.id.lastIndexOf("["));
		var j = 0;
		var valueArray = new Array();
		var parampart;
		do {
			parampart = elemDoc.getElementById(paramid + "[" + j + "]");
			if(parampart != null) {
				if((parampart.type == "checkbox" || parampart.type == "radio") && parampart.checked || parampart.type == "text") valueArray = this.concatSet(valueArray,this.compoundParamToArray(parampart.value));
			}
			j++;
		} while(parampart != null);
		return valueArray.join(", ");
	}
	,setPreviewLoading: function(elem,loading) {
		var parent = elem.parentNode;
		if(loading) {
			var doc = elem.ownerDocument;
			var img = doc.createElement("span");
			com.wiris.quizzes.JsDomUtils.addClass(img,"wirisloading");
			parent.appendChild(img);
		} else {
			var img = com.wiris.quizzes.JsDomUtils.getElementsByClassName("wirisloading","span",parent)[0];
			parent.removeChild(img);
		}
	}
	,getCorrectAnswer: function() {
		if(this.htmlguiconf.optOpenAnswer) return this.correctAnswer.getValue(); else return null;
	}
	,getQuestion: function() {
		var _g = 0, _g1 = this.controllers;
		while(_g < _g1.length) {
			var controller = _g1[_g];
			++_g;
			controller.saveInputValue();
		}
		return this.question;
	}
	,init: function() {
		var qq = this.question.getImpl();
		var ii = this.instance;
		this.addBehaviors(this.element,qq,ii);
		this.tabs.init();
		if(!this.htmlguiconf.optOpenAnswer && this.htmlguiconf.optAuxiliarCas && this.htmlguiconf.tabVariables) this.tabs.setActive(this.tabs.getLength() - 1); else this.tabs.setActive(0);
		this.updateGrammar(0);
		this.ready = true;
	}
	,create: function(q,qi,conf) {
		this.question = q;
		this.instance = qi;
		this.htmlguiconf = conf;
		this.ready = false;
		this.correctAnswer = null;
		this.testAnswer = null;
		this.controllers = new Array();
		this.controllersMap = new Hash();
		var qimpl = (js.Boot.__cast(q , com.wiris.quizzes.impl.QuestionInternal)).getImpl();
		if(qimpl.isDeprecated()) {
			var confirm = this.getOwnerWindow().confirm(this.t("confirmimportdeprecated"));
			if(confirm) qimpl.importDeprecated(); else {
				this.getOwnerWindow().close();
				return;
			}
		}
		var d = this.getOwnerDocument();
		if(this.htmlguiconf.tabCorrectAnswer) {
			var content = new com.wiris.quizzes.JsContainer(d);
			content.element.innerHTML = this.htmlgui.getTabCorrectAnswer(qimpl,this.index,0,this.htmlguiconf);
			this.tabs.addTab(this.t("correctanswer"),content,this.t("correctanswertabhelp"));
		}
		if(this.htmlguiconf.tabValidation) {
			var content = new com.wiris.quizzes.JsContainer(d);
			content.element.innerHTML = this.htmlgui.getTabValidation(qimpl,this.index,0,this.htmlguiconf);
			this.tabs.addTab(this.t("validation"),content,this.t("assertionstabhelp"));
		}
		if(this.htmlguiconf.tabVariables) {
			var content = new com.wiris.quizzes.JsContainer(d);
			content.element.innerHTML = this.htmlgui.getTabVariables(qimpl,this.index,0,this.htmlguiconf);
			this.tabs.addTab(this.t("variables"),content,this.t("variablestabhelp"));
		}
		if(this.htmlguiconf.tabPreview) {
			var content = new com.wiris.quizzes.JsContainer(d);
			content.element.innerHTML = this.htmlgui.getTabPreview(qimpl,qi,this.index,0,this.htmlguiconf);
			this.tabs.addTab(this.t("preview"),content,this.t("testtabhelp"));
		}
	}
	,ctrlshiftx: null
	,ready: null
	,tabs: null
	,testAnswer: null
	,correctAnswer: null
	,controllersMap: null
	,controllers: null
	,instance: null
	,question: null
	,htmlguiconf: null
	,htmlgui: null
	,index: null
	,__class__: com.wiris.quizzes.JsStudio
});
com.wiris.quizzes.QuizzesEditorListener = $hxClasses["com.wiris.quizzes.QuizzesEditorListener"] = function(handler) {
	this.handler = handler;
};
com.wiris.quizzes.QuizzesEditorListener.__name__ = ["com","wiris","quizzes","QuizzesEditorListener"];
com.wiris.quizzes.QuizzesEditorListener.__interfaces__ = [com.wiris.editor.EditorListener];
com.wiris.quizzes.QuizzesEditorListener.prototype = {
	styleChanged: function(source) {
	}
	,transformationReceived: function(source,transformation) {
	}
	,clipboardChanged: function(source) {
	}
	,caretPositionChanged: function(source) {
	}
	,contentChanged: function(source) {
		this.handler(source.getMathML());
	}
	,handler: null
	,__class__: com.wiris.quizzes.QuizzesEditorListener
}
com.wiris.quizzes.api.AssertionCheck = $hxClasses["com.wiris.quizzes.api.AssertionCheck"] = function() { }
com.wiris.quizzes.api.AssertionCheck.__name__ = ["com","wiris","quizzes","api","AssertionCheck"];
com.wiris.quizzes.api.AssertionCheck.prototype = {
	getValue: null
	,getAssertionName: null
	,__class__: com.wiris.quizzes.api.AssertionCheck
}
com.wiris.quizzes.api.Configuration = $hxClasses["com.wiris.quizzes.api.Configuration"] = function() { }
com.wiris.quizzes.api.Configuration.__name__ = ["com","wiris","quizzes","api","Configuration"];
com.wiris.quizzes.api.Configuration.prototype = {
	get: null
	,__class__: com.wiris.quizzes.api.Configuration
}
com.wiris.quizzes.api.ConfigurationKeys = $hxClasses["com.wiris.quizzes.api.ConfigurationKeys"] = function() { }
com.wiris.quizzes.api.ConfigurationKeys.__name__ = ["com","wiris","quizzes","api","ConfigurationKeys"];
com.wiris.quizzes.api.MathFilter = $hxClasses["com.wiris.quizzes.api.MathFilter"] = function() { }
com.wiris.quizzes.api.MathFilter.__name__ = ["com","wiris","quizzes","api","MathFilter"];
com.wiris.quizzes.api.MathFilter.prototype = {
	filter: null
	,__class__: com.wiris.quizzes.api.MathFilter
}
com.wiris.quizzes.api.Serializable = $hxClasses["com.wiris.quizzes.api.Serializable"] = function() { }
com.wiris.quizzes.api.Serializable.__name__ = ["com","wiris","quizzes","api","Serializable"];
com.wiris.quizzes.api.Serializable.prototype = {
	serialize: null
	,__class__: com.wiris.quizzes.api.Serializable
}
com.wiris.quizzes.api.Question = $hxClasses["com.wiris.quizzes.api.Question"] = function() { }
com.wiris.quizzes.api.Question.__name__ = ["com","wiris","quizzes","api","Question"];
com.wiris.quizzes.api.Question.__interfaces__ = [com.wiris.quizzes.api.Serializable];
com.wiris.quizzes.api.Question.prototype = {
	getAlgorithm: null
	,setAlgorithm: null
	,setAnswerFieldType: null
	,setOption: null
	,addAssertion: null
	,getCorrectAnswer: null
	,setCorrectAnswer: null
	,getStudentQuestion: null
	,__class__: com.wiris.quizzes.api.Question
}
com.wiris.quizzes.api.QuestionInstance = $hxClasses["com.wiris.quizzes.api.QuestionInstance"] = function() { }
com.wiris.quizzes.api.QuestionInstance.__name__ = ["com","wiris","quizzes","api","QuestionInstance"];
com.wiris.quizzes.api.QuestionInstance.__interfaces__ = [com.wiris.quizzes.api.Serializable];
com.wiris.quizzes.api.QuestionInstance.prototype = {
	areVariablesReady: null
	,getAssertionChecks: null
	,getStudentAnswer: null
	,setStudentAnswer: null
	,setCasSession: null
	,setRandomSeed: null
	,getStudentQuestionInstance: null
	,getAnswerGrade: null
	,expandVariablesText: null
	,expandVariablesMathML: null
	,expandVariables: null
	,isAnswerCorrect: null
	,update: null
	,__class__: com.wiris.quizzes.api.QuestionInstance
}
com.wiris.quizzes.api.QuestionRequest = $hxClasses["com.wiris.quizzes.api.QuestionRequest"] = function() { }
com.wiris.quizzes.api.QuestionRequest.__name__ = ["com","wiris","quizzes","api","QuestionRequest"];
com.wiris.quizzes.api.QuestionRequest.__interfaces__ = [com.wiris.quizzes.api.Serializable];
com.wiris.quizzes.api.QuestionRequest.prototype = {
	isEmpty: null
	,addMetaProperty: null
	,__class__: com.wiris.quizzes.api.QuestionRequest
}
com.wiris.quizzes.api.QuestionResponse = $hxClasses["com.wiris.quizzes.api.QuestionResponse"] = function() { }
com.wiris.quizzes.api.QuestionResponse.__name__ = ["com","wiris","quizzes","api","QuestionResponse"];
com.wiris.quizzes.api.QuestionResponse.__interfaces__ = [com.wiris.quizzes.api.Serializable];
com.wiris.quizzes.api.QuizzesService = $hxClasses["com.wiris.quizzes.api.QuizzesService"] = function() { }
com.wiris.quizzes.api.QuizzesService.__name__ = ["com","wiris","quizzes","api","QuizzesService"];
com.wiris.quizzes.api.QuizzesService.prototype = {
	executeAsync: null
	,execute: null
	,__class__: com.wiris.quizzes.api.QuizzesService
}
com.wiris.quizzes.api.QuizzesServiceListener = $hxClasses["com.wiris.quizzes.api.QuizzesServiceListener"] = function() { }
com.wiris.quizzes.api.QuizzesServiceListener.__name__ = ["com","wiris","quizzes","api","QuizzesServiceListener"];
com.wiris.quizzes.api.QuizzesServiceListener.prototype = {
	onResponse: null
	,__class__: com.wiris.quizzes.api.QuizzesServiceListener
}
com.wiris.quizzes.api.ui.AuxiliarCasField = $hxClasses["com.wiris.quizzes.api.ui.AuxiliarCasField"] = function() { }
com.wiris.quizzes.api.ui.AuxiliarCasField.__name__ = ["com","wiris","quizzes","api","ui","AuxiliarCasField"];
com.wiris.quizzes.api.ui.AuxiliarCasField.__interfaces__ = [com.wiris.quizzes.api.ui.QuizzesField];
com.wiris.quizzes.api.ui.EditorFieldListener = $hxClasses["com.wiris.quizzes.api.ui.EditorFieldListener"] = function() { }
com.wiris.quizzes.api.ui.EditorFieldListener.__name__ = ["com","wiris","quizzes","api","ui","EditorFieldListener"];
com.wiris.quizzes.api.ui.EditorFieldListener.prototype = {
	onGetEditor: null
	,__class__: com.wiris.quizzes.api.ui.EditorFieldListener
}
com.wiris.quizzes.api.ui.QuizzesUIConstants = $hxClasses["com.wiris.quizzes.api.ui.QuizzesUIConstants"] = function() { }
com.wiris.quizzes.api.ui.QuizzesUIConstants.__name__ = ["com","wiris","quizzes","api","ui","QuizzesUIConstants"];
if(!com.wiris.util) com.wiris.util = {}
if(!com.wiris.util.xml) com.wiris.util.xml = {}
com.wiris.util.xml.SerializableImpl = $hxClasses["com.wiris.util.xml.SerializableImpl"] = function() {
};
com.wiris.util.xml.SerializableImpl.__name__ = ["com","wiris","util","xml","SerializableImpl"];
com.wiris.util.xml.SerializableImpl.prototype = {
	serialize: function() {
		var s = new com.wiris.util.xml.XmlSerializer();
		return s.write(this);
	}
	,newInstance: function() {
		return new com.wiris.util.xml.SerializableImpl();
	}
	,onSerialize: function(s) {
	}
	,__class__: com.wiris.util.xml.SerializableImpl
}
com.wiris.quizzes.impl.MathContent = $hxClasses["com.wiris.quizzes.impl.MathContent"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.MathContent.__name__ = ["com","wiris","quizzes","impl","MathContent"];
com.wiris.quizzes.impl.MathContent.getMathType = function(content) {
	if(content == null) return com.wiris.quizzes.impl.MathContent.TYPE_TEXT;
	content = StringTools.trim(content);
	var i;
	if(StringTools.startsWith(content,"<") && StringTools.endsWith(content,">")) {
		var mathmltags = ["math","mn","mo","mi","mrow","mfrac","mtext","ms","mroot","msqrt","mfenced","msub","msup","msubsup","mover","munder","munderover"];
		var _g1 = 0, _g = mathmltags.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(StringTools.startsWith(content,"<" + mathmltags[i1])) return com.wiris.quizzes.impl.MathContent.TYPE_MATHML;
		}
	}
	return com.wiris.quizzes.impl.MathContent.TYPE_TEXT;
}
com.wiris.quizzes.impl.MathContent.isEmpty = function(content) {
	content = StringTools.trim(content);
	if(StringTools.startsWith(content,"<math")) {
		content = HxOverrides.substr(content,content.indexOf(">") + 1,null);
		content = HxOverrides.substr(content,0,content.lastIndexOf("<"));
	}
	while(StringTools.startsWith(content,"<mrow")) {
		content = HxOverrides.substr(content,content.indexOf(">") + 1,null);
		content = HxOverrides.substr(content,0,content.lastIndexOf("<"));
	}
	return content.length == 0;
}
com.wiris.quizzes.impl.MathContent.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.MathContent.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.MathContent();
	}
	,onSerializeInner: function(s) {
		this.type = s.attributeString("type",this.type,"text");
		this.content = s.textContent(this.content);
	}
	,onSerialize: function(s) {
		s.beginTag("math");
		this.onSerializeInner(s);
		s.endTag();
	}
	,set: function(content) {
		this.type = com.wiris.quizzes.impl.MathContent.getMathType(content);
		this.content = content;
	}
	,content: null
	,type: null
	,__class__: com.wiris.quizzes.impl.MathContent
});
com.wiris.quizzes.impl.Answer = $hxClasses["com.wiris.quizzes.impl.Answer"] = function() {
	com.wiris.quizzes.impl.MathContent.call(this);
	this.id = 0;
};
com.wiris.quizzes.impl.Answer.__name__ = ["com","wiris","quizzes","impl","Answer"];
com.wiris.quizzes.impl.Answer.__super__ = com.wiris.quizzes.impl.MathContent;
com.wiris.quizzes.impl.Answer.prototype = $extend(com.wiris.quizzes.impl.MathContent.prototype,{
	onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.Answer.tagName);
		this.id = s.attributeInt("id",this.id,0);
		com.wiris.quizzes.impl.MathContent.prototype.onSerializeInner.call(this,s);
		s.endTag();
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.Answer();
	}
	,id: null
	,__class__: com.wiris.quizzes.impl.Answer
});
com.wiris.quizzes.impl.Assertion = $hxClasses["com.wiris.quizzes.impl.Assertion"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.Assertion.__name__ = ["com","wiris","quizzes","impl","Assertion"];
com.wiris.quizzes.impl.Assertion.paramdefault = null;
com.wiris.quizzes.impl.Assertion.paramnames = null;
com.wiris.quizzes.impl.Assertion.initParams = function() {
	com.wiris.quizzes.impl.Assertion.paramnames = new Hash();
	com.wiris.quizzes.impl.Assertion.paramnames.set("syntax_expression",["constants","functions","listoperators","groupoperators","itemseparators","nobracketslist"]);
	com.wiris.quizzes.impl.Assertion.paramnames.set("syntax_list",["constants","functions"]);
	com.wiris.quizzes.impl.Assertion.paramnames.set("syntax_quantity",["constants","units","unitprefixes","groupoperators","mixedfractions","itemseparators","nobracketslist"]);
	com.wiris.quizzes.impl.Assertion.paramnames.set("check_divisible",["value"]);
	com.wiris.quizzes.impl.Assertion.paramnames.set("check_unit",["unit"]);
	com.wiris.quizzes.impl.Assertion.paramnames.set("check_unit_literal",["unit"]);
	com.wiris.quizzes.impl.Assertion.paramnames.set("check_no_more_decimals",["digits"]);
	com.wiris.quizzes.impl.Assertion.paramnames.set("check_no_more_digits",["digits"]);
	com.wiris.quizzes.impl.Assertion.paramnames.set("equivalent_function",["name"]);
	com.wiris.quizzes.impl.Assertion.paramnames.set("equivalent_symbolic",["ordermatters"]);
	com.wiris.quizzes.impl.Assertion.paramnames.set("equivalent_symbolic",["repetitionmatters"]);
	com.wiris.quizzes.impl.Assertion.paramnames.set("equivalent_literal",["ordermatters"]);
	com.wiris.quizzes.impl.Assertion.paramnames.set("equivalent_literal",["repetitionmatters"]);
	var paramvalues;
	com.wiris.quizzes.impl.Assertion.paramdefault = new Hash();
	var constants = com.wiris.system.Utf8.uchr(960) + ", e, i, j";
	var functions = "exp, log, ln, sin, cos, tan, asin, acos, atan, cosec, sec, cotan, acosec, asec, acotan, sinh, cosh, tanh, asinh, acosh, atanh, min, max, sign";
	var groupoperators = "(,[";
	var listoperators = "{";
	paramvalues = new Hash();
	paramvalues.set("constants",constants);
	paramvalues.set("functions",functions);
	paramvalues.set("groupoperators",groupoperators);
	paramvalues.set("listoperators",listoperators);
	paramvalues.set("itemseparators","\\,,\\n");
	paramvalues.set("nobracketslist","false");
	com.wiris.quizzes.impl.Assertion.paramdefault.set("syntax_expression",paramvalues);
	paramvalues = new Hash();
	paramvalues.set("constants",constants);
	paramvalues.set("functions",functions);
	com.wiris.quizzes.impl.Assertion.paramdefault.set("syntax_list",paramvalues);
	paramvalues = new Hash();
	paramvalues.set("constants",constants);
	paramvalues.set("groupoperators",groupoperators);
	paramvalues.set("listoperators",listoperators);
	paramvalues.set("units",com.wiris.system.Utf8.uchr(176) + ", ', \", sr, m, g, s, E, K, mol, cd, rad, h, min, l, N, Pa, Hz, W,J, C, V, " + com.wiris.system.Utf8.uchr(937) + ", F, S, Wb, b, H, T, lx, lm, Gy, Bq, Sv, kat");
	paramvalues.set("unitprefixes","m, c, k, M");
	paramvalues.set("mixedfractions","false");
	paramvalues.set("itemseparators","\\n");
	paramvalues.set("nobracketslist","false");
	com.wiris.quizzes.impl.Assertion.paramdefault.set("syntax_quantity",paramvalues);
	paramvalues = new Hash();
	paramvalues.set("ordermatters","true");
	paramvalues.set("repetitionmatters","true");
	com.wiris.quizzes.impl.Assertion.paramdefault.set("equivalent_symbolic",paramvalues);
	paramvalues = new Hash();
	paramvalues.set("ordermatters","true");
	paramvalues.set("repetitionmatters","true");
	com.wiris.quizzes.impl.Assertion.paramdefault.set("equivalent_literal",paramvalues);
	paramvalues = new Hash();
	paramvalues.set("value","");
	com.wiris.quizzes.impl.Assertion.paramdefault.set("check_divisible",paramvalues);
	paramvalues = new Hash();
	paramvalues.set("unit","");
	com.wiris.quizzes.impl.Assertion.paramdefault.set("check_unit",paramvalues);
	paramvalues = new Hash();
	paramvalues.set("unit","");
	com.wiris.quizzes.impl.Assertion.paramdefault.set("check_unit_literal",paramvalues);
	paramvalues = new Hash();
	paramvalues.set("digits","");
	com.wiris.quizzes.impl.Assertion.paramdefault.set("check_no_more_decimals",paramvalues);
	paramvalues = new Hash();
	paramvalues.set("digits","");
	com.wiris.quizzes.impl.Assertion.paramdefault.set("check_no_more_digits",paramvalues);
	paramvalues = new Hash();
	paramvalues.set("name","");
	com.wiris.quizzes.impl.Assertion.paramdefault.set("equivalent_function",paramvalues);
}
com.wiris.quizzes.impl.Assertion.getParameterNames = function(name) {
	if(com.wiris.quizzes.impl.Assertion.paramnames == null) com.wiris.quizzes.impl.Assertion.initParams();
	return com.wiris.quizzes.impl.Assertion.paramnames.get(name);
}
com.wiris.quizzes.impl.Assertion.getParameterDefaultValue = function(assertion,parameter) {
	var value;
	if(com.wiris.quizzes.impl.Assertion.paramdefault == null) com.wiris.quizzes.impl.Assertion.initParams();
	if(com.wiris.quizzes.impl.Assertion.paramdefault.exists(assertion) && com.wiris.quizzes.impl.Assertion.paramdefault.get(assertion).exists(parameter)) value = com.wiris.quizzes.impl.Assertion.paramdefault.get(assertion).get(parameter); else value = "";
	return value;
}
com.wiris.quizzes.impl.Assertion.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.Assertion.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	isCheck: function() {
		return this.inArray(this.name,com.wiris.quizzes.impl.Assertion.checks);
	}
	,isEquivalence: function() {
		return this.inArray(this.name,com.wiris.quizzes.impl.Assertion.equivalent);
	}
	,isSyntactic: function() {
		return this.inArray(this.name,com.wiris.quizzes.impl.Assertion.syntactic);
	}
	,inIntArray: function(e,a) {
		var i;
		var _g1 = 0, _g = a.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(e == a[i1]) return true;
		}
		return false;
	}
	,inArray: function(e,a) {
		var i;
		var _g1 = 0, _g = a.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(e == a[i1]) return true;
		}
		return false;
	}
	,equalLists: function(a,b) {
		var aa = a.split(",");
		var bb = b.split(",");
		if(aa.length != bb.length) return false;
		var i;
		var _g1 = 0, _g = aa.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(!this.inArray(aa[i1],bb)) return false;
		}
		return true;
	}
	,isDefaultParameterValue: function(name,value) {
		var defValue = com.wiris.quizzes.impl.Assertion.getParameterDefaultValue(this.name,name);
		return this.equalLists(defValue,value);
	}
	,getParam: function(name) {
		if(this.parameters != null) {
			var i;
			var _g1 = 0, _g = this.parameters.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				if(this.parameters[i1].name == name) return this.parameters[i1].content;
			}
		}
		if(com.wiris.quizzes.impl.Assertion.paramdefault == null) com.wiris.quizzes.impl.Assertion.initParams();
		if(com.wiris.quizzes.impl.Assertion.paramdefault.exists(this.name)) {
			var values = com.wiris.quizzes.impl.Assertion.paramdefault.get(this.name);
			if(values.exists(name)) return values.get(name);
		}
		return null;
	}
	,setParam: function(name,value) {
		if(this.parameters == null) this.parameters = new Array();
		if(this.isDefaultParameterValue(name,value)) {
			var j = this.parameters.length - 1;
			while(j >= 0) {
				if(this.parameters[j].name == name) HxOverrides.remove(this.parameters,this.parameters[j]);
				j--;
			}
		} else {
			var found = false;
			var i;
			var _g1 = 0, _g = this.parameters.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var p = this.parameters[i1];
				if(p.name == name) {
					p.content = value;
					found = true;
				}
			}
			if(!found) {
				var q = new com.wiris.quizzes.impl.AssertionParam();
				q.name = name;
				q.content = value;
				q.type = com.wiris.quizzes.impl.MathContent.TYPE_TEXT;
				this.parameters.push(q);
			}
		}
	}
	,getAnswers: function() {
		if(this.answer != null) return this.answer; else return new Array();
	}
	,getAnswer: function() {
		if(this.answer != null && this.answer.length > 0) return this.answer[0]; else return -1;
	}
	,addAnswer: function(a) {
		var current = this.getAnswers();
		if(!this.inIntArray(a,current)) {
			var newa = new Array();
			var i;
			var _g1 = 0, _g = current.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				newa[i1] = current[i1];
			}
			newa[current.length] = a;
			this.setAnswers(newa);
		}
	}
	,setAnswers: function(a) {
		this.answer = a;
	}
	,setAnswer: function(a) {
		this.setAnswers([a]);
	}
	,getCorrectAnswers: function() {
		if(this.correctAnswer != null) return this.correctAnswer; else return new Array();
	}
	,getCorrectAnswer: function() {
		if(this.correctAnswer != null && this.correctAnswer.length > 0) return this.correctAnswer[0]; else return -1;
	}
	,removeCorrectAnswer: function(ca) {
		if(this.hasCorrectAnswer(ca)) {
			var current = this.getCorrectAnswers();
			var newca = new Array();
			var i;
			var j = 0;
			var _g1 = 0, _g = current.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				if(current[i1] != ca) {
					newca[j] = current[i1];
					j++;
				}
			}
			this.setCorrectAnswers(newca);
		}
	}
	,hasCorrectAnswer: function(ca) {
		return this.inIntArray(ca,this.getCorrectAnswers());
	}
	,addCorrectAnswer: function(ca) {
		var current = this.getCorrectAnswers();
		if(!this.inIntArray(ca,current)) {
			var newca = new Array();
			var i;
			var _g1 = 0, _g = current.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				newca[i1] = current[i1];
			}
			newca[current.length] = ca;
			this.setCorrectAnswers(newca);
		}
	}
	,setCorrectAnswers: function(ca) {
		this.correctAnswer = ca;
	}
	,setCorrectAnswer: function(ca) {
		this.setCorrectAnswers([ca]);
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.Assertion();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.Assertion.tagName);
		this.name = s.attributeString("name",this.name,null);
		this.correctAnswer = s.attributeIntArray("correctAnswer",this.correctAnswer,[0]);
		this.answer = s.attributeIntArray("answer",this.answer,[0]);
		this.parameters = s.serializeArray(this.parameters,com.wiris.quizzes.impl.AssertionParam.tagName);
		s.endTag();
	}
	,parameters: null
	,answer: null
	,correctAnswer: null
	,name: null
	,__class__: com.wiris.quizzes.impl.Assertion
});
com.wiris.quizzes.impl.AssertionCheckImpl = $hxClasses["com.wiris.quizzes.impl.AssertionCheckImpl"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.AssertionCheckImpl.__name__ = ["com","wiris","quizzes","impl","AssertionCheckImpl"];
com.wiris.quizzes.impl.AssertionCheckImpl.__interfaces__ = [com.wiris.quizzes.api.AssertionCheck];
com.wiris.quizzes.impl.AssertionCheckImpl.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.AssertionCheckImpl.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	getValue: function() {
		return this.value;
	}
	,getAssertionName: function() {
		return this.assertion;
	}
	,getAnswers: function() {
		return this.answer;
	}
	,getAnswer: function() {
		return this.answer[0];
	}
	,setAnswers: function(a) {
		this.answer = a;
	}
	,setAnswer: function(a) {
		this.setAnswers([a]);
	}
	,getCorrectAnswers: function() {
		return this.correctAnswer;
	}
	,getCorrectAnswer: function() {
		return this.correctAnswer[0];
	}
	,setCorrectAnswers: function(ca) {
		this.correctAnswer = ca;
	}
	,setCorrectAnswer: function(ca) {
		this.setCorrectAnswers([ca]);
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.AssertionCheckImpl();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.AssertionCheckImpl.tagName);
		this.assertion = s.attributeString("assertion",this.assertion,null);
		this.answer = s.attributeIntArray("answer",this.answer,[0]);
		this.correctAnswer = s.attributeIntArray("correctAnswer",this.correctAnswer,[0]);
		this.value = s.floatContent(this.value);
		s.endTag();
	}
	,correctAnswer: null
	,answer: null
	,assertion: null
	,value: null
	,__class__: com.wiris.quizzes.impl.AssertionCheckImpl
});
com.wiris.quizzes.impl.AssertionParam = $hxClasses["com.wiris.quizzes.impl.AssertionParam"] = function() {
	com.wiris.quizzes.impl.MathContent.call(this);
};
com.wiris.quizzes.impl.AssertionParam.__name__ = ["com","wiris","quizzes","impl","AssertionParam"];
com.wiris.quizzes.impl.AssertionParam.__super__ = com.wiris.quizzes.impl.MathContent;
com.wiris.quizzes.impl.AssertionParam.prototype = $extend(com.wiris.quizzes.impl.MathContent.prototype,{
	normalizeContent: function() {
		if(this.name == "name") {
			if(StringTools.startsWith(this.content,"#")) this.content = HxOverrides.substr(this.content,1,null);
		}
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.AssertionParam.tagName);
		this.name = s.attributeString("name",this.name,null);
		com.wiris.quizzes.impl.MathContent.prototype.onSerializeInner.call(this,s);
		s.endTag();
		if(s.getMode() == com.wiris.util.xml.XmlSerializer.MODE_WRITE) this.normalizeContent();
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.AssertionParam();
	}
	,name: null
	,__class__: com.wiris.quizzes.impl.AssertionParam
});
var haxe = haxe || {}
haxe.BaseCode = $hxClasses["haxe.BaseCode"] = function(base) {
	var len = base.length;
	var nbits = 1;
	while(len > 1 << nbits) nbits++;
	if(nbits > 8 || len != 1 << nbits) throw "BaseCode : base length must be a power of two.";
	this.base = base;
	this.nbits = nbits;
};
haxe.BaseCode.__name__ = ["haxe","BaseCode"];
haxe.BaseCode.encode = function(s,base) {
	var b = new haxe.BaseCode(haxe.io.Bytes.ofString(base));
	return b.encodeString(s);
}
haxe.BaseCode.decode = function(s,base) {
	var b = new haxe.BaseCode(haxe.io.Bytes.ofString(base));
	return b.decodeString(s);
}
haxe.BaseCode.prototype = {
	decodeString: function(s) {
		return this.decodeBytes(haxe.io.Bytes.ofString(s)).toString();
	}
	,encodeString: function(s) {
		return this.encodeBytes(haxe.io.Bytes.ofString(s)).toString();
	}
	,decodeBytes: function(b) {
		var nbits = this.nbits;
		var base = this.base;
		if(this.tbl == null) this.initTable();
		var tbl = this.tbl;
		var size = b.length * nbits >> 3;
		var out = haxe.io.Bytes.alloc(size);
		var buf = 0;
		var curbits = 0;
		var pin = 0;
		var pout = 0;
		while(pout < size) {
			while(curbits < 8) {
				curbits += nbits;
				buf <<= nbits;
				var i = tbl[b.b[pin++]];
				if(i == -1) throw "BaseCode : invalid encoded char";
				buf |= i;
			}
			curbits -= 8;
			out.b[pout++] = buf >> curbits & 255 & 255;
		}
		return out;
	}
	,initTable: function() {
		var tbl = new Array();
		var _g = 0;
		while(_g < 256) {
			var i = _g++;
			tbl[i] = -1;
		}
		var _g1 = 0, _g = this.base.length;
		while(_g1 < _g) {
			var i = _g1++;
			tbl[this.base.b[i]] = i;
		}
		this.tbl = tbl;
	}
	,encodeBytes: function(b) {
		var nbits = this.nbits;
		var base = this.base;
		var size = b.length * 8 / nbits | 0;
		var out = haxe.io.Bytes.alloc(size + (b.length * 8 % nbits == 0?0:1));
		var buf = 0;
		var curbits = 0;
		var mask = (1 << nbits) - 1;
		var pin = 0;
		var pout = 0;
		while(pout < size) {
			while(curbits < nbits) {
				curbits += 8;
				buf <<= 8;
				buf |= b.b[pin++];
			}
			curbits -= nbits;
			out.b[pout++] = base.b[buf >> curbits & mask] & 255;
		}
		if(curbits > 0) out.b[pout++] = base.b[buf << nbits - curbits & mask] & 255;
		return out;
	}
	,tbl: null
	,nbits: null
	,base: null
	,__class__: haxe.BaseCode
}
com.wiris.quizzes.impl.Base64 = $hxClasses["com.wiris.quizzes.impl.Base64"] = function() {
	haxe.BaseCode.call(this,haxe.io.Bytes.ofString("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/"));
};
com.wiris.quizzes.impl.Base64.__name__ = ["com","wiris","quizzes","impl","Base64"];
com.wiris.quizzes.impl.Base64.__super__ = haxe.BaseCode;
com.wiris.quizzes.impl.Base64.prototype = $extend(haxe.BaseCode.prototype,{
	__class__: com.wiris.quizzes.impl.Base64
});
com.wiris.quizzes.impl.ClasspathLoader = $hxClasses["com.wiris.quizzes.impl.ClasspathLoader"] = function() { }
com.wiris.quizzes.impl.ClasspathLoader.__name__ = ["com","wiris","quizzes","impl","ClasspathLoader"];
com.wiris.quizzes.impl.ClasspathLoader.load = function(classpath) {
}
com.wiris.quizzes.impl.ClasspathLoader.loadImpl = function(classpath) {
}
com.wiris.quizzes.impl.ClasspathLoader.registerClass = function(path,file) {
}
com.wiris.quizzes.impl.ConfigurationImpl = $hxClasses["com.wiris.quizzes.impl.ConfigurationImpl"] = function() {
	this.properties = new Hash();
	this.properties.set(com.wiris.quizzes.api.ConfigurationKeys.WIRIS_URL,com.wiris.quizzes.impl.ConfigurationImpl.DEF_WIRIS_URL);
	this.properties.set(com.wiris.quizzes.api.ConfigurationKeys.EDITOR_URL,com.wiris.quizzes.impl.ConfigurationImpl.DEF_EDITOR_URL);
	this.properties.set(com.wiris.quizzes.api.ConfigurationKeys.SERVICE_URL,com.wiris.quizzes.impl.ConfigurationImpl.DEF_SERVICE_URL);
	this.properties.set(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL,com.wiris.quizzes.impl.ConfigurationImpl.DEF_PROXY_URL);
	this.properties.set(com.wiris.quizzes.api.ConfigurationKeys.CACHE_DIR,com.wiris.quizzes.impl.ConfigurationImpl.DEF_CACHE_DIR);
	this.properties.set(com.wiris.quizzes.api.ConfigurationKeys.MAXCONNECTIONS,com.wiris.quizzes.impl.ConfigurationImpl.DEF_MAXCONNECTIONS);
	this.properties.set(com.wiris.quizzes.impl.ConfigurationImpl.CONFIG_FILE,com.wiris.quizzes.impl.ConfigurationImpl.DEF_CONFIG_FILE);
	this.properties.set(com.wiris.quizzes.impl.ConfigurationImpl.CONFIG_CLASS,com.wiris.quizzes.impl.ConfigurationImpl.DEF_CONFIG_CLASS);
	this.properties.set(com.wiris.quizzes.impl.ConfigurationImpl.CONFIG_CLASSPATH,com.wiris.quizzes.impl.ConfigurationImpl.DEF_CONFIG_CLASSPATH);
	this.properties.set(com.wiris.quizzes.api.ConfigurationKeys.HTTPPROXY_HOST,com.wiris.quizzes.impl.ConfigurationImpl.DEF_HTTPPROXY_HOST);
	this.properties.set(com.wiris.quizzes.api.ConfigurationKeys.HTTPPROXY_PORT,com.wiris.quizzes.impl.ConfigurationImpl.DEF_HTTPPROXY_PORT);
	this.properties.set(com.wiris.quizzes.api.ConfigurationKeys.HTTPPROXY_USER,com.wiris.quizzes.impl.ConfigurationImpl.DEF_HTTPPROXY_USER);
	this.properties.set(com.wiris.quizzes.api.ConfigurationKeys.HTTPPROXY_PASS,com.wiris.quizzes.impl.ConfigurationImpl.DEF_HTTPPROXY_PASS);
	this.properties.set(com.wiris.quizzes.api.ConfigurationKeys.REFERER_URL,com.wiris.quizzes.impl.ConfigurationImpl.DEF_REFERER_URL);
	if(!com.wiris.settings.PlatformSettings.IS_JAVASCRIPT) {
		try {
			var ini = com.wiris.util.sys.IniFile.newIniFileFromFilename(com.wiris.quizzes.impl.ConfigurationImpl.DEF_DIST_CONFIG_FILE);
			this.setAll(ini.getProperties());
		} catch( e ) {
			throw "Could not read the configuration file \"" + com.wiris.quizzes.impl.ConfigurationImpl.DEF_DIST_CONFIG_FILE + "\".";
		}
		var classpath = this.get(com.wiris.quizzes.impl.ConfigurationImpl.CONFIG_CLASSPATH);
		if(!(classpath == "")) com.wiris.quizzes.impl.ClasspathLoader.load(classpath);
		var className = this.get(com.wiris.quizzes.impl.ConfigurationImpl.CONFIG_CLASS);
		if(!(className == "")) try {
			var config = js.Boot.__cast(Type.createInstance(Type.resolveClass(className),new Array()) , com.wiris.quizzes.api.Configuration);
			var keys = [com.wiris.quizzes.api.ConfigurationKeys.WIRIS_URL,com.wiris.quizzes.api.ConfigurationKeys.EDITOR_URL,com.wiris.quizzes.api.ConfigurationKeys.SERVICE_URL,com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL,com.wiris.quizzes.api.ConfigurationKeys.CACHE_DIR,com.wiris.quizzes.api.ConfigurationKeys.MAXCONNECTIONS,com.wiris.quizzes.api.ConfigurationKeys.HTTPPROXY_HOST,com.wiris.quizzes.api.ConfigurationKeys.HTTPPROXY_PORT,com.wiris.quizzes.api.ConfigurationKeys.HTTPPROXY_USER,com.wiris.quizzes.api.ConfigurationKeys.HTTPPROXY_PASS,com.wiris.quizzes.api.ConfigurationKeys.REFERER_URL];
			var i;
			var _g1 = 0, _g = keys.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var value = config.get(keys[i1]);
				if(value != null) this.properties.set(keys[i1],value);
			}
		} catch( e ) {
			throw "Could not find the Configuration class \"" + className + "\".";
		}
		var file = this.properties.get(com.wiris.quizzes.impl.ConfigurationImpl.CONFIG_FILE);
		if(com.wiris.system.Storage.newStorage(file).exists() || com.wiris.system.Storage.newResourceStorage(file).exists()) try {
			var ini = com.wiris.util.sys.IniFile.newIniFileFromFilename(file);
			this.setAll(ini.getProperties());
		} catch( e ) {
			throw "Could not read configuration file \"" + file + "\".";
		}
	}
};
com.wiris.quizzes.impl.ConfigurationImpl.__name__ = ["com","wiris","quizzes","impl","ConfigurationImpl"];
com.wiris.quizzes.impl.ConfigurationImpl.__interfaces__ = [com.wiris.quizzes.api.Configuration];
com.wiris.quizzes.impl.ConfigurationImpl.config = null;
com.wiris.quizzes.impl.ConfigurationImpl.getInstance = function() {
	if(com.wiris.quizzes.impl.ConfigurationImpl.config == null) com.wiris.quizzes.impl.ConfigurationImpl.config = new com.wiris.quizzes.impl.ConfigurationImpl();
	return com.wiris.quizzes.impl.ConfigurationImpl.config;
}
com.wiris.quizzes.impl.ConfigurationImpl.prototype = {
	jsEscape: function(text) {
		text = StringTools.replace(text,"\\","\\\\");
		text = StringTools.replace(text,"\"","\\\"");
		text = StringTools.replace(text,"\n","\\n");
		text = StringTools.replace(text,"\r","\\r");
		text = StringTools.replace(text,"\t","\\t");
		return text;
	}
	,getJSConfig: function() {
		var sb = new StringBuf();
		var prefix = "com.wiris.quizzes.impl.ConfigurationImpl.";
		sb.b += Std.string(prefix + "DEF_WIRIS_URL" + " = \"" + this.jsEscape(this.get(com.wiris.quizzes.api.ConfigurationKeys.WIRIS_URL)) + "\";\n");
		sb.b += Std.string(prefix + "DEF_EDITOR_URL" + " = \"" + this.jsEscape(this.get(com.wiris.quizzes.api.ConfigurationKeys.EDITOR_URL)) + "\";\n");
		sb.b += Std.string(prefix + "DEF_SERVICE_URL" + " = \"" + this.jsEscape(this.get(com.wiris.quizzes.api.ConfigurationKeys.SERVICE_URL)) + "\";\n");
		sb.b += Std.string(prefix + "DEF_PROXY_URL" + " = \"" + this.jsEscape(this.get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL)) + "\";\n");
		sb.b += Std.string(prefix + "DEF_CACHE_DIR" + " = \"" + this.jsEscape(this.get(com.wiris.quizzes.api.ConfigurationKeys.CACHE_DIR)) + "\";\n");
		sb.b += Std.string(prefix + "DEF_MAXCONNECTIONS" + " = \"" + this.jsEscape(this.get(com.wiris.quizzes.api.ConfigurationKeys.MAXCONNECTIONS)) + "\";\n");
		return sb.b;
	}
	,set: function(key,value) {
		this.properties.set(key,value);
	}
	,get: function(key) {
		return this.properties.get(key);
	}
	,setAll: function(props) {
		var it = props.keys();
		while(it.hasNext()) {
			var key = it.next();
			this.properties.set(key,props.get(key));
		}
	}
	,loadFile: function(file) {
		var ini = com.wiris.util.sys.IniFile.newIniFileFromFilename(file);
		this.setAll(ini.getProperties());
	}
	,load: function(text) {
		var ini = com.wiris.util.sys.IniFile.newIniFileFromString(text);
		this.setAll(ini.getProperties());
	}
	,properties: null
	,__class__: com.wiris.quizzes.impl.ConfigurationImpl
}
com.wiris.quizzes.impl.CorrectAnswer = $hxClasses["com.wiris.quizzes.impl.CorrectAnswer"] = function() {
	com.wiris.quizzes.impl.MathContent.call(this);
	this.weight = 1.0;
	this.id = 0;
};
com.wiris.quizzes.impl.CorrectAnswer.__name__ = ["com","wiris","quizzes","impl","CorrectAnswer"];
com.wiris.quizzes.impl.CorrectAnswer.__super__ = com.wiris.quizzes.impl.MathContent;
com.wiris.quizzes.impl.CorrectAnswer.prototype = $extend(com.wiris.quizzes.impl.MathContent.prototype,{
	onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.CorrectAnswer.tagName);
		this.id = s.attributeInt("id",this.id,0);
		this.weight = s.attributeFloat("weight",this.weight,1.0);
		com.wiris.quizzes.impl.MathContent.prototype.onSerializeInner.call(this,s);
		s.endTag();
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.CorrectAnswer();
	}
	,id: null
	,weight: null
	,__class__: com.wiris.quizzes.impl.CorrectAnswer
});
com.wiris.quizzes.impl.PersistentVariables = $hxClasses["com.wiris.quizzes.impl.PersistentVariables"] = function() { }
com.wiris.quizzes.impl.PersistentVariables.__name__ = ["com","wiris","quizzes","impl","PersistentVariables"];
com.wiris.quizzes.impl.PersistentVariables.prototype = {
	unlockVariable: null
	,lockVariable: null
	,setVariable: null
	,getVariable: null
	,__class__: com.wiris.quizzes.impl.PersistentVariables
}
com.wiris.quizzes.impl.FilePersistentVariables = $hxClasses["com.wiris.quizzes.impl.FilePersistentVariables"] = function() {
	var dir = this.getDir();
	if(!dir.exists()) dir.mkdirs();
	if(!dir.exists()) throw "Variable folder \"" + Std.string(dir) + "\" does not exist and can't be automatically created. Please create it with write permissions.";
};
com.wiris.quizzes.impl.FilePersistentVariables.__name__ = ["com","wiris","quizzes","impl","FilePersistentVariables"];
com.wiris.quizzes.impl.FilePersistentVariables.__interfaces__ = [com.wiris.quizzes.impl.PersistentVariables];
com.wiris.quizzes.impl.FilePersistentVariables.h = null;
com.wiris.quizzes.impl.FilePersistentVariables.prototype = {
	getDir: function() {
		return com.wiris.system.Storage.newStorage(com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.CACHE_DIR));
	}
	,unlockVariable: function(name) {
		if(com.wiris.quizzes.impl.FilePersistentVariables.h != null) {
			var l = com.wiris.quizzes.impl.FilePersistentVariables.h.get(name);
			if(l != null) {
				com.wiris.quizzes.impl.FilePersistentVariables.h.remove(name);
				l.release();
			}
		}
	}
	,lockVariable: function(name) {
		var s = this.getPath(name);
		var l = com.wiris.system.FileLock.getLock(s.toString());
		if(com.wiris.quizzes.impl.FilePersistentVariables.h == null) com.wiris.quizzes.impl.FilePersistentVariables.h = new Hash();
		com.wiris.quizzes.impl.FilePersistentVariables.h.set(name,l);
	}
	,getPath: function(name) {
		return com.wiris.system.Storage.newStorageWithParent(this.getDir(),name + ".var");
	}
	,setVariable: function(name,value) {
		var s = this.getPath(name);
		s.write(value);
	}
	,getVariable: function(name) {
		var s = this.getPath(name);
		if(s.exists()) return s.read(); else return null;
	}
	,__class__: com.wiris.quizzes.impl.FilePersistentVariables
}
com.wiris.quizzes.impl.HTML = $hxClasses["com.wiris.quizzes.impl.HTML"] = function() {
	this.s = new StringBuf();
	this.tags = new Array();
};
com.wiris.quizzes.impl.HTML.__name__ = ["com","wiris","quizzes","impl","HTML"];
com.wiris.quizzes.impl.HTML.prototype = {
	openTd: function(className) {
		this.open("td",[["class",className]]);
	}
	,openTr: function() {
		this.open("tr",null);
	}
	,openTable: function(id,className) {
		this.open("table",[["id",id],["class",className]]);
	}
	,jsComponent: function(id,className,arg) {
		this.input("hidden",id,null,arg,null,"wirisjscomponent " + className);
	}
	,dd: function(text) {
		this.open("dd",null);
		this.text(text);
		this.close();
	}
	,dt: function(text) {
		this.open("dt",null);
		this.text(text);
		this.close();
	}
	,openDl: function(id,classes) {
		this.open("dl",[["id",id],["class",classes]]);
	}
	,formatText: function(text) {
		var ps = text.split("\n");
		var i;
		var _g1 = 0, _g = ps.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			this.openP();
			this.text(ps[i1]);
			this.close();
		}
	}
	,openP: function() {
		this.open("p",null);
	}
	,help: function(id,href,title) {
		this.openSpan(id + "span","wirishelp");
		this.open("a",[["id",id],["href",href],["class","wirishelp"],["title",title],["target","_blank"]]);
		this.close();
		this.close();
	}
	,openStrong: function() {
		this.open("strong",null);
	}
	,openA: function(id,href,className,target) {
		this.open("a",[["id",id],["href",href],["class",className],["target",target]]);
	}
	,select: function(id,name,options) {
		this.open("select",[["id",id],["name",name]]);
		var i;
		var _g1 = 0, _g = options.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			this.open("option",[["value",options[i1][0]]]);
			this.text(options[i1][1]);
			this.close();
		}
		this.close();
	}
	,openFieldset: function(id,legend,classes) {
		var className = "wirisfieldset";
		if(classes != null && classes.length > 0) className += " " + classes;
		this.open("fieldset",[["id",id],["class",className]]);
		this.open("legend",[["class",classes]]);
		this.text(legend);
		this.close();
	}
	,label: function(text,id,className) {
		this.open("label",[["for",id],["class",className]]);
		this.text(text);
		this.close();
	}
	,openLiClass: function(className) {
		this.open("li",[["class",className]]);
	}
	,openLi: function() {
		this.open("li",[]);
	}
	,li: function(content) {
		this.open("li",[]);
		this.text(content);
		this.close();
	}
	,openUl: function(id,className) {
		this.open("ul",[["id",id],["class",className]]);
	}
	,image: function(id,src,title,style) {
		this.openclose("img",[["id",id],["src",src],["alt",title],["title",title],["style",style]]);
	}
	,textarea: function(id,name,value,className,lang) {
		this.open("textarea",[["id",id],["name",name],["class",className],["lang",lang]]);
		this.text(value);
		this.close();
	}
	,input: function(type,id,name,value,title,className) {
		this.openclose("input",[["type",type],["id",id],["name",name],["value",value],["class",className]]);
	}
	,js: function(code) {
		this.open("script",[["type","text/javascript"]]);
		this.text(code);
		this.close();
	}
	,openSpan: function(id,className) {
		this.open("span",[["id",id],["class",className]]);
	}
	,openDivClass: function(id,className) {
		this.open("div",[["id",id],["class",className]]);
	}
	,openDiv: function(id) {
		this.open("div",[["id",id]]);
	}
	,raw: function(raw) {
		this.s.b += Std.string(raw);
	}
	,getString: function() {
		return this.s.b;
	}
	,close: function() {
		this.s.b += Std.string("</");
		this.s.b += Std.string(this.tags.pop());
		this.s.b += Std.string(">");
	}
	,text: function(text) {
		if(text != null) this.s.b += Std.string(com.wiris.util.xml.WXmlUtils.htmlEscape(text));
	}
	,textEm: function(text) {
		this.open("em",null);
		this.text(text);
		this.close();
	}
	,openclose: function(name,attributes) {
		this.start(name,attributes);
		this.s.b += Std.string("/>");
	}
	,open: function(name,attributes) {
		this.tags.push(name);
		this.start(name,attributes);
		this.s.b += Std.string(">");
	}
	,start: function(name,attributes) {
		this.s.b += Std.string("<");
		this.s.b += Std.string(name);
		if(attributes != null) {
			var i;
			var _g1 = 0, _g = attributes.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				if(attributes[i1].length == 2 && attributes[i1][0] != null && attributes[i1][1] != null) {
					this.s.b += Std.string(" ");
					this.s.b += Std.string(attributes[i1][0]);
					this.s.b += Std.string("=\"");
					this.s.b += Std.string(com.wiris.util.xml.WXmlUtils.htmlEscape(attributes[i1][1]));
					this.s.b += Std.string("\"");
				}
			}
		}
	}
	,tags: null
	,s: null
	,__class__: com.wiris.quizzes.impl.HTML
}
com.wiris.quizzes.impl.HTMLGui = $hxClasses["com.wiris.quizzes.impl.HTMLGui"] = function(lang) {
	this.lang = lang != null?lang:"en";
	this.t = com.wiris.quizzes.impl.Translator.getInstance(this.lang);
};
com.wiris.quizzes.impl.HTMLGui.__name__ = ["com","wiris","quizzes","impl","HTMLGui"];
com.wiris.quizzes.impl.HTMLGui.prototype = {
	printMathML: function(h,mathml) {
		h.open("span",[["class","mathml"]]);
		var safeMathML = com.wiris.quizzes.impl.HTMLTools.encodeUnicodeChars(mathml);
		var src = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL) + "?service=render&mml=" + StringTools.urlEncode(safeMathML);
		h.openclose("img",[["src",src],["align","middle"]]);
		h.close();
	}
	,printLocalData: function(h,q,unique,conf) {
		h.openFieldset("wirislocaldatafieldset" + unique,this.t.t("inputmethod"),"wirismainfieldset");
		var anchor = conf.optAuxiliarCas && !conf.optOpenAnswer?"#auxiliar-cas":"";
		h.help("wirisinputmethodhelp" + unique,"http://www.wiris.com/quizzes/docs/moodle/manual/correct-answer" + anchor,this.t.t("manual"));
		var id;
		if(conf.optOpenAnswer) {
			h.openDivClass("wirisinputfielddiv" + unique,"wirissecondaryfieldset");
			h.openUl("wirisinputfieldul","wirisul");
			id = "wirislocaldata" + unique + "[" + com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_INPUT_FIELD + "]";
			h.openLi();
			h.input("radio",id + "[0]",id,com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_INLINE_EDITOR,null,null);
			h.label(this.t.t("answerinputinlineeditor"),id + "[0]",null);
			h.close();
			h.openLi();
			h.input("radio",id + "[1]",id,com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_POPUP_EDITOR,null,null);
			h.label(this.t.t("answerinputpopupeditor"),id + "[1]",null);
			h.close();
			h.openLi();
			h.input("radio",id + "[2]",id,com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT,null,null);
			h.label(this.t.t("answerinputplaintext"),id + "[2]",null);
			h.close();
			h.close();
			h.close();
			h.openDivClass("wiriscompoundanswerdiv" + unique,"wirissecondaryfieldset");
			id = "wirislocaldata" + unique + "[" + com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER + "]";
			h.input("checkbox",id,"",com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE,null,null);
			h.label(this.t.t("compoundanswer"),id,null);
			h.openDivClass("wiriscompoundanswergradediv" + unique,"wiristerciaryfieldset");
			h.openDiv("wiriscompoundanswergradeand" + unique);
			id = "wirislocaldata" + unique + "[" + com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE + "][and]";
			h.input("radio",id,"wiriscompoundanswergrade",com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_AND,null,null);
			h.label(this.t.t("allanswerscorrect"),id,null);
			h.close();
			h.openDiv("wiriscompoundanswergradedistribute" + unique);
			id = "wirislocaldata" + unique + "[" + com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE + "][distribute]";
			h.input("radio",id,"wiriscompoundanswergrade",com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTE,null,null);
			h.label(this.t.t("distributegrade"),id,null);
			id = "wirislocaldata" + unique + "[" + com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTION + "]";
			h.input("text",id,"","",this.t.t("gradedistribution"),"wirisadditionalinput");
			h.close();
			h.close();
			h.close();
		}
		if(conf.optAuxiliarCas) {
			h.openDivClass("wirisauxiliarcasdiv" + unique,"wirissecondaryfieldset");
			id = "wirislocaldata" + unique + "[" + com.wiris.quizzes.impl.LocalData.KEY_SHOW_CAS + "]";
			if(!conf.optAuxiliarCasReplaceEditor) h.input("checkbox",id,"",com.wiris.quizzes.impl.LocalData.VALUE_SHOW_CAS_ADD,null,null);
			h.label(this.t.t("showauxiliarcas"),id,null);
			if(conf.optAuxiliarCasReplaceEditor) {
				h.text(" ");
				h.select(id,null,[[com.wiris.quizzes.impl.LocalData.VALUE_SHOW_CAS_FALSE,this.t.t("no")],[com.wiris.quizzes.impl.LocalData.VALUE_SHOW_CAS_ADD,this.t.t("add")],[com.wiris.quizzes.impl.LocalData.VALUE_SHOW_CAS_REPLACE_INPUT,this.t.t("replaceeditor")]]);
			}
			h.text(" ");
			h.jsComponent("wirisinitialcontentbutton" + unique,"JsInitialCasInput",q.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_CAS_INITIAL_SESSION));
			h.close();
		}
		h.close();
	}
	,getLangFromCasSession: function(session) {
		var start = session.indexOf("<session");
		if(start == -1) return null;
		var end = session.indexOf(">",start + 1);
		start = session.indexOf("lang",start);
		if(start == -1 || start > end) return null;
		start = session.indexOf("\"",start) + 1;
		return HxOverrides.substr(session,start,2);
	}
	,printAssertionFeedback: function(h,c,q) {
		var gradeClass = this.getGradeClass(c.value);
		var typeClass = HxOverrides.substr(c.assertion,0,c.assertion.indexOf("_"));
		h.openSpan(null,gradeClass + " " + typeClass);
		var feedback = this.t.t(c.assertion + "_correct_feedback");
		var index = q.getAssertionIndex(c.assertion,c.getCorrectAnswer(),c.getAnswer());
		if(index != -1) {
			var a = q.assertions[index];
			if(a.parameters != null) {
				var i;
				var _g1 = 0, _g = a.parameters.length;
				while(_g1 < _g) {
					var i1 = _g1++;
					var name = a.parameters[i1].name;
					var value = a.parameters[i1].content;
					feedback = StringTools.replace(feedback,"${" + name + "}",value);
				}
			}
		}
		h.text(feedback);
		h.close();
	}
	,getAnswerFeedbackHtml: function(correctAnswer,userAnswer,q,qi) {
		var h = new com.wiris.quizzes.impl.HTML();
		this.printAnswerFeedback(h,correctAnswer,userAnswer,q,qi);
		return h.getString();
	}
	,printAnswerFeedback: function(h,correctAnswer,userAnswer,q,qi) {
		h.openUl(null,"wiristestassertionslist");
		var checks = qi.getMatchingChecks(correctAnswer,userAnswer);
		var j;
		var _g1 = 0, _g = checks.length;
		while(_g1 < _g) {
			var j1 = _g1++;
			if(!(checks[j1].getAssertionName() == com.wiris.quizzes.impl.Assertion.EQUIVALENT_ALL)) {
				h.openLi();
				this.printAssertionFeedback(h,checks[j1],q);
				h.close();
			}
		}
		h.close();
	}
	,getWirisTestDynamic: function(q,qi,correctAnswer,unique) {
		var h = new com.wiris.quizzes.impl.HTML();
		var hasCorrectAnswer = q.correctAnswers != null && correctAnswer < q.correctAnswers.length;
		h.openDivClass("wiristestresult" + unique,"wiristestresult");
		h.openFieldset("wiristestvalidationfieldset" + unique,this.t.t("validation"),"wirismainfieldset");
		if(q.assertions != null && q.assertions.length > 0 && qi.hasEvaluation()) {
			h.openDivClass("wiristestgrade" + unique,"wiristestgrade");
			var grade = qi.getAnswerGrade(correctAnswer,0,q);
			if(grade == 1.0) {
				h.openSpan("wiristestgradetext" + unique,"wiristestgradetext wiriscorrect");
				h.text(this.t.t("correct"));
				h.close();
			} else if(grade == 0.0) {
				h.openSpan("wiristestgradetext" + unique,"wiristestgradetext wirisincorrect");
				h.text(this.t.t("incorrect"));
				h.close();
			} else {
				h.openSpan("wiristestgradetext" + unique,"wiristestgradetext wirispartiallycorrect");
				h.text(Math.round(grade * 100) + "% ");
				h.text(this.t.t("partiallycorrect"));
				h.close();
			}
			h.close();
			h.openDivClass("wiristestassertions" + unique,"wiristestassertions");
			h.openDivClass("wiristestassertionslistwrapper" + unique,"wiristestassertionslistwrapper");
			this.printAnswerFeedback(h,correctAnswer,0,q,qi);
			h.close();
			h.close();
		} else h.text(this.t.t("clicktesttoevaluate"));
		h.close();
		h.close();
		h.openDivClass("wiristestcorrectanswer" + unique + "[" + correctAnswer + "]","wiristestcorrectanswer");
		h.openFieldset("wiristestcorrectanswerfieldset" + unique,this.t.t("correctanswer"),"wirismainfieldset");
		if(hasCorrectAnswer) {
			var content = q.correctAnswers[correctAnswer].content;
			if(com.wiris.quizzes.impl.MathContent.getMathType(content) == com.wiris.quizzes.impl.MathContent.TYPE_MATHML) {
				if(qi.hasVariables()) content = qi.expandVariablesMathML(content);
				this.printMathML(h,content);
			} else {
				if(qi.hasVariables()) content = qi.expandVariablesText(content);
				h.text(content);
			}
		}
		h.close();
		h.close();
		return h.getString();
	}
	,printTester: function(h,q,qi,correctAnswer,unique) {
		if(q == null) q = new com.wiris.quizzes.impl.QuestionImpl();
		if(qi == null) qi = new com.wiris.quizzes.impl.QuestionInstanceImpl();
		var hasUserAnswer = qi.userData != null && qi.userData.answers != null && qi.userData.answers.length > 0;
		h.openDivClass("wiristestwrapper" + unique,"wiristestwrapper");
		h.openDivClass("wiristestanswerwrapper" + unique,"wiristestanswerwrapper");
		h.jsComponent("wirisanswer" + unique + "[0]","JsInput",hasUserAnswer?qi.userData.answers[0].content:"");
		h.close();
		h.openDivClass("wiristestbuttons" + unique,"wiristestbuttons");
		h.input("button","wiristestbutton" + unique,null,this.t.t("test"),null,"wirisbutton");
		h.input("button","wirisrestartbutton" + unique,null,this.t.t("start"),null,"wirisbutton");
		h.close();
		h.openDivClass("wiristestdynamic" + unique,"wiristestdynamic");
		h.raw(this.getWirisTestDynamic(q,qi,correctAnswer,unique));
		h.close();
		h.close();
	}
	,printAssertionsControls: function(h,q,correctAnswer,unique,conf) {
		h.openDiv("wirisassertioncontrols" + unique);
		h.openFieldset("wiriscomparisonfieldset" + unique + "[" + correctAnswer + "][0]",this.t.t("comparisonwithstudentanswer"),"wirismainfieldset wiriscomparisonfieldset");
		h.help("wiriscomparisonhelp" + unique,"http://www.wiris.com/quizzes/docs/moodle/manual/validation#comparison",this.t.t("manual"));
		h.openUl("wiriscomparison" + unique + "[" + correctAnswer + "][0]","wirisul");
		var i;
		var idassertion;
		var _g1 = 0, _g = com.wiris.quizzes.impl.Assertion.equivalent.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(!conf.optGradingFunction && com.wiris.quizzes.impl.Assertion.equivalent[i1] == com.wiris.quizzes.impl.Assertion.EQUIVALENT_FUNCTION) continue;
			h.openLiClass("wiris" + com.wiris.quizzes.impl.Assertion.equivalent[i1]);
			idassertion = "wirisassertion" + unique + "[" + com.wiris.quizzes.impl.Assertion.equivalent[i1] + "][" + correctAnswer + "][0]";
			h.input("radio",idassertion,"wirisradiocomparison" + unique + "[" + correctAnswer + "][0]",null,null,null);
			h.label(this.t.t(com.wiris.quizzes.impl.Assertion.equivalent[i1]),idassertion,null);
			if(com.wiris.quizzes.impl.Assertion.equivalent[i1] == com.wiris.quizzes.impl.Assertion.EQUIVALENT_FUNCTION) {
				h.text(" ");
				h.input("text","wirisassertionparam" + unique + "[" + com.wiris.quizzes.impl.Assertion.EQUIVALENT_FUNCTION + "][name][" + correctAnswer + "][0]","","",null,null);
				var idNotEvaluate = "wirisassertionparam" + unique + "[" + com.wiris.quizzes.impl.Assertion.EQUIVALENT_FUNCTION + "][notevaluate][" + correctAnswer + "][0]";
				h.input("checkbox",idNotEvaluate,null,null,null,null);
				h.label(this.t.t("notevaluate"),idNotEvaluate,"wirissmalllabel");
			}
			h.close();
		}
		h.openLiClass("wiriscomparesets");
		var comparesetsid = "wirisassertionparam" + unique + "[" + com.wiris.quizzes.impl.Assertion.EQUIVALENT_SYMBOLIC + "," + com.wiris.quizzes.impl.Assertion.EQUIVALENT_LITERAL + "][comparesets][" + correctAnswer + "][0]";
		h.input("checkbox",comparesetsid,null,null,null,null);
		h.text(" ");
		h.label(this.t.t("comparesets"),comparesetsid,null);
		h.close();
		h.openLiClass("wirisusecase");
		var usecaseid = "wirisassertionparam" + unique + "[" + com.wiris.quizzes.impl.Assertion.EQUIVALENT_LITERAL + "][usecase][" + correctAnswer + "][0]";
		h.input("checkbox",usecaseid,null,null,null,null);
		h.text(" ");
		h.label(this.t.t("usecase"),usecaseid,null);
		h.close();
		h.openLiClass("wirisusespaces");
		var usespacesid = "wirisassertionparam" + unique + "[" + com.wiris.quizzes.impl.Assertion.EQUIVALENT_LITERAL + "][usespaces][" + correctAnswer + "][0]";
		h.input("checkbox",usespacesid,null,null,null,null);
		h.text(" ");
		h.label(this.t.t("usespaces"),usespacesid,null);
		h.close();
		h.close();
		h.close();
		h.openFieldset("wirisadditionalchecksfieldset" + unique + "[" + correctAnswer + "][0]",this.t.t("additionalproperties"),"wirismainfieldset wirisadditionalchecksfieldset");
		h.help("wirisadditionalcheckshelp" + unique,"http://www.wiris.com/quizzes/docs/moodle/manual/validation#properties",this.t.t("manual"));
		h.openDivClass("wirisstructurediv" + unique + "[" + correctAnswer + "][0]","wirissecondaryfieldset");
		h.openDivClass("wirisstructuredivlegend" + unique + "[" + correctAnswer + "][0]","wirissecondaryfieldsetlegend");
		h.text(this.t.t("structure") + ":");
		h.close();
		var options = new Array();
		options[0] = new Array();
		options[0][0] = "";
		options[0][1] = this.t.t("none");
		var _g1 = 0, _g = com.wiris.quizzes.impl.Assertion.structure.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			options[i1 + 1] = new Array();
			options[i1 + 1][0] = com.wiris.quizzes.impl.Assertion.structure[i1];
			options[i1 + 1][1] = this.t.t(com.wiris.quizzes.impl.Assertion.structure[i1]);
		}
		h.select("wirisstructureselect" + unique + "[" + correctAnswer + "][0]","",options);
		h.close();
		h.openDivClass("wirismorediv" + unique + "[" + correctAnswer + "][0]","wirissecondaryfieldset");
		h.text(this.t.t("more") + ":");
		h.openUl("wirismore" + unique + "[" + correctAnswer + "][0]","wirisul");
		var _g1 = 0, _g = com.wiris.quizzes.impl.Assertion.checks.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			h.openLi();
			idassertion = "wirisassertion" + unique + "[" + com.wiris.quizzes.impl.Assertion.checks[i1] + "][" + correctAnswer + "][0]";
			h.input("checkbox",idassertion,null,null,null,null);
			h.label(this.t.t(com.wiris.quizzes.impl.Assertion.checks[i1]),idassertion,null);
			var parameters = com.wiris.quizzes.impl.Assertion.getParameterNames(com.wiris.quizzes.impl.Assertion.checks[i1]);
			if(parameters != null) {
				var j;
				var _g3 = 0, _g2 = parameters.length;
				while(_g3 < _g2) {
					var j1 = _g3++;
					h.text(" ");
					h.input("text","wirisassertionparam" + unique + "[" + com.wiris.quizzes.impl.Assertion.checks[i1] + "][" + parameters[j1] + "][" + correctAnswer + "][0]",null,null,null,null);
				}
			}
			h.close();
		}
		h.close();
		h.close();
		h.close();
		h.close();
	}
	,printAssertionsSummary: function(h,q,index,unique,conf) {
		var syntax = null;
		var equivalent = null;
		var properties = new Array();
		var showSyntax = false;
		var showComparison = false;
		var showProperties = false;
		var showAlgorithm = false;
		var showOptions = false;
		if(q.assertions != null) {
			var i;
			var _g1 = 0, _g = q.assertions.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var a = q.assertions[i1];
				if(a.isSyntactic()) {
					var text = this.getAssertionString(a,80);
					if(!(text == this.t.t(com.wiris.quizzes.impl.Assertion.SYNTAX_EXPRESSION))) {
						syntax = text;
						showSyntax = true;
					}
				} else if(index == a.getCorrectAnswer()) {
					var text = this.getAssertionString(a,80);
					if(StringTools.startsWith(a.name,"equivalent_")) {
						if(!(text == this.t.t(com.wiris.quizzes.impl.Assertion.EQUIVALENT_SYMBOLIC))) {
							equivalent = text;
							showComparison = true;
						}
					} else {
						properties.push(text);
						showProperties = true;
					}
				}
			}
		}
		var options = "";
		var tolerance = q.getOption(com.wiris.quizzes.impl.Option.OPTION_TOLERANCE);
		if(!(tolerance == q.defaultOption(com.wiris.quizzes.impl.Option.OPTION_TOLERANCE))) {
			options = this.t.t("tolerancedigits") + ": " + HxOverrides.substr(tolerance,5,tolerance.length - 6);
			showOptions = true;
		}
		var relative = q.getOption(com.wiris.quizzes.impl.Option.OPTION_RELATIVE_TOLERANCE);
		if(!(relative == q.defaultOption(com.wiris.quizzes.impl.Option.OPTION_RELATIVE_TOLERANCE))) {
			if(options.length > 0) options += ", ";
			options += this.t.t("relativetolerance");
			showOptions = true;
		}
		showAlgorithm = q.wirisCasSession != null && q.wirisCasSession.length > 0;
		if(showSyntax || showComparison || showProperties || showAlgorithm || showOptions) {
			h.openFieldset("validationandvariables" + unique,this.t.t("validationandvariables"),"wirisfieldsetvalidationandvariables");
			h.help("wirisvalidationandvariableshelp" + unique,"http://www.wiris.com/quizzes/docs/moodle/manual/short-answer#vav",this.t.t("manual"));
			h.openDl("wirisassertionsummarydl" + unique,"wirisassertionsummarydl");
			if(showSyntax) {
				h.dt(this.t.t("allowedinput"));
				h.dd(syntax);
			}
			if(showComparison || showOptions) {
				h.dt(this.t.t("comparison"));
				var cmp = "";
				if(showComparison) cmp += equivalent;
				if(showOptions) {
					if(cmp.length > 0) cmp += ", ";
					cmp += options;
				}
				h.dd(cmp);
			}
			if(showProperties) {
				h.dt(this.t.t("properties"));
				var prop = new StringBuf();
				var i;
				var _g1 = 0, _g = properties.length;
				while(_g1 < _g) {
					var i1 = _g1++;
					if(i1 > 0) prop.b += Std.string(", ");
					prop.b += Std.string(properties[i1]);
				}
				h.dd(prop.b);
			}
			if(showAlgorithm) {
				h.dt(this.t.t("variables"));
				var variables = this.t.t("hasalgorithm");
				if(!(q.getOption(com.wiris.quizzes.impl.Option.OPTION_PRECISION) == q.defaultOption(com.wiris.quizzes.impl.Option.OPTION_PRECISION))) variables += ", " + this.t.t("precision") + ": " + q.getOption(com.wiris.quizzes.impl.Option.OPTION_PRECISION);
				h.dd(variables);
			}
			h.close();
			h.close();
		}
	}
	,shortenText: function(text,chars) {
		if(text.length > chars) {
			text = HxOverrides.substr(text,0,chars - 3);
			var n = text.length - 1;
			var c = HxOverrides.cca(text,n);
			while(c == 32 || c == 44 || c == 46) {
				text = HxOverrides.substr(text,0,n);
				n--;
				c = HxOverrides.cca(text,n);
			}
			text += "...";
		}
		return text;
	}
	,getAssertionString: function(a,chars) {
		var text = this.t.t(a.name);
		if(a.parameters != null && a.parameters.length > 0) {
			var sb = new StringBuf();
			var i;
			var count = 0;
			var _g1 = 0, _g = a.parameters.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var ap = a.parameters[i1];
				if(ap.name == com.wiris.quizzes.impl.Assertion.PARAM_ORDER_MATTERS && !(ap.content == "true")) {
					if(count > 0) sb.b += Std.string("; ");
					sb.b += Std.string(this.t.t("comparesets"));
					count++;
				} else if(ap.name == com.wiris.quizzes.impl.Assertion.PARAM_REPETITION_MATTERS) {
				} else if(ap.content == "true") {
					if(count > 0) sb.b += Std.string("; ");
					sb.b += Std.string(this.t.t(ap.name));
					count++;
				} else if(ap.content == "false") {
				} else {
					if(count > 0) sb.b += Std.string("; ");
					sb.b += Std.string(this.shortenText(ap.content,Math.floor(Math.round(chars / 3.0))));
					count++;
				}
			}
			if(count > 0) {
				var parameters = this.shortenText(sb.b,chars - text.length - 3);
				text += " (" + parameters + ")";
			}
		}
		return text;
	}
	,getWirisCasApplet: function(id,lang) {
		var caslangs = this.getWirisCasLanguages();
		var caslang = "en";
		var i;
		var _g1 = 0, _g = caslangs.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(caslangs[i1][0] == lang) caslang = lang;
		}
		var h = new com.wiris.quizzes.impl.HTML();
		h.open("applet",[["id",id],["name","wiriscas"],["codebase",com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.SERVICE_URL) + "/wiris-codebase"],["code","WirisApplet_net_" + caslang],["archive","wrs_net_" + caslang + ".jar"],["height","100%"],["width","100%"]]);
		h.openclose("param",[["name","command"],["value","false"]]);
		h.openclose("param",[["name","commands"],["value","false"]]);
		h.openclose("param",[["name","interface"],["value","false"]]);
		h.close();
		return h.getString();
	}
	,printOutputControls: function(h,unique) {
		h.openDiv("wirisoutputcontrols" + unique);
		h.openFieldset("wirisoutputcontrolsfieldset" + unique,this.t.t("outputoptions"),"wirismainfieldset");
		h.help("wirisoutputcontrolshelp" + unique,"http://www.wiris.com/quizzes/docs/moodle/manual/variables",this.t.t("manual"));
		h.openTable("wirisoutputcontrolslist" + unique,"wirisoutputcontrolslist");
		var id;
		h.openTr();
		h.openTd("wirisleftlabellist");
		id = "wirisoption" + unique + "[" + com.wiris.quizzes.impl.Option.OPTION_PRECISION + "]";
		h.label(this.t.t(com.wiris.quizzes.impl.Option.OPTION_PRECISION),id,"wirisleftlabel");
		h.close();
		h.openTd(null);
		h.input("text",id,null,null,null,"wirissmalltextfield");
		h.openSpan("wiriswarning" + unique + "[warningprecision]","wirisinlinewarning");
		h.text(this.t.t("warningtoleranceprecision"));
		h.close();
		h.close();
		h.close();
		h.openTr();
		h.openTd("wirisleftlabellist");
		id = "wirisoption" + unique + "[" + com.wiris.quizzes.impl.Option.OPTION_IMPLICIT_TIMES_OPERATOR + "]";
		h.label(this.t.t(com.wiris.quizzes.impl.Option.OPTION_IMPLICIT_TIMES_OPERATOR),id,"wirisleftlabel wirisleftlabellist");
		h.close();
		h.openTd(null);
		h.input("checkbox",id,null,"true",this.t.t(id),null);
		h.close();
		h.close();
		h.openTr();
		h.openTd("wirisleftlabellist");
		id = "wirisoptionpart" + unique + "[" + com.wiris.quizzes.impl.Option.OPTION_TIMES_OPERATOR + "]";
		h.label(this.t.t(com.wiris.quizzes.impl.Option.OPTION_TIMES_OPERATOR),null,"wirisleftlabel wirisleftlabellist");
		h.close();
		h.openTd(null);
		h.openSpan(null,"wirishorizontalparam");
		h.input("radio",id + "[0]",id,com.wiris.system.Utf8.uchr(183),com.wiris.system.Utf8.uchr(183),null);
		h.label("a" + com.wiris.system.Utf8.uchr(183) + "b",id + "[0]",null);
		h.close();
		h.openSpan(null,"wirishorizontalparam");
		h.input("radio",id + "[1]",id,com.wiris.system.Utf8.uchr(215),com.wiris.system.Utf8.uchr(215),null);
		h.label("a" + com.wiris.system.Utf8.uchr(215) + "b",id + "[1]",null);
		h.close();
		h.close();
		h.close();
		h.openTr();
		h.openTd("wirisleftlabellist");
		id = "wirisoptionpart" + unique + "[" + com.wiris.quizzes.impl.Option.OPTION_IMAGINARY_UNIT + "]";
		h.label(this.t.t(com.wiris.quizzes.impl.Option.OPTION_IMAGINARY_UNIT),null,"wirisleftlabel wirisleftlabellist");
		h.close();
		h.openTd(null);
		h.openSpan(null,"wirishorizontalparam");
		h.input("radio",id + "[0]",id,"i","i",null);
		h.label("i",id + "[0]",null);
		h.close();
		h.openSpan(null,"wirishorizontalparam");
		h.input("radio",id + "[1]",id,"j","j",null);
		h.label("j",id + "[1]",null);
		h.close();
		h.close();
		h.close();
		h.close();
		h.close();
		h.close();
	}
	,getWirisCasLanguages: function() {
		var langs = [["ca",this.t.t("Catalan")],["en",this.t.t("English")],["es",this.t.t("Spanish")],["et",this.t.t("Estonian")],["eu",this.t.t("Basque")],["fr",this.t.t("French")],["de",this.t.t("German")],["it",this.t.t("Italian")],["nl",this.t.t("Dutch")],["pt",this.t.t("Portuguese")]];
		return langs;
	}
	,printInputControls: function(h,q,correctAnswer,unique) {
		var id;
		h.openDiv("wirisinputcontrols" + unique);
		h.openFieldset("wirisinputcontrolsfieldset" + unique,this.t.t("allowedinput"),"wirismainfieldset");
		h.help("wirisinputcontrolshelp" + unique,"http://www.wiris.com/quizzes/docs/moodle/manual/validation#allowed-input",this.t.t("manual"));
		h.openDivClass("wirissyntaxassertions" + unique,"wirissyntaxassertions");
		h.openUl("wirisinputcontrolslist" + unique,"wirisinputcontrolslist");
		var i;
		var _g1 = 0, _g = com.wiris.quizzes.impl.Assertion.syntactic.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			h.openLi();
			id = "wirisassertion" + unique + "[" + com.wiris.quizzes.impl.Assertion.syntactic[i1] + "][" + correctAnswer + "][0]";
			h.input("radio",id,"wirisradiosyntax" + unique,null,null,null);
			h.openStrong();
			h.label(this.t.t(com.wiris.quizzes.impl.Assertion.syntactic[i1]),id,null);
			h.close();
			h.text(" ");
			h.label(this.t.t(com.wiris.quizzes.impl.Assertion.syntactic[i1] + "_description"),id,null);
			h.close();
		}
		h.close();
		h.openFieldset("wirissyntaxparams" + unique,this.t.t("syntaxparams"),"wirissyntaxparams");
		h.openDivClass("wirissyntaxconstants" + unique,"wirissyntaxparam");
		h.openSpan("wirissyntaxconstantslabel" + unique,"wirissyntaxlabel");
		h.text(this.t.t("constants") + ":");
		h.close();
		h.openSpan("wirissyntaxconstantsvalues" + unique,"wirissyntaxvalues");
		id = "wirisassertionparampart" + unique + "[syntax_expression, syntax_quantity][constants][" + correctAnswer + "][0]";
		var letterpi = com.wiris.system.Utf8.uchr(960);
		this.syntaxCheckbox(h,id + "[0]",letterpi,letterpi,false);
		this.syntaxCheckbox(h,id + "[1]","e","e",false);
		this.syntaxCheckbox(h,id + "[2]","i","i",false);
		this.syntaxCheckbox(h,id + "[3]","j","j",false);
		h.close();
		h.close();
		h.openDivClass("wirissyntaxfunctions" + unique,"wirissyntaxparam");
		h.openDiv("wirissyntaxfunctionscheckboxes" + unique);
		h.openSpan("wirissyntaxfunctionlabel" + unique,"wirissyntaxlabel");
		h.text(this.t.t("functions") + ":");
		h.close();
		h.openSpan("wirissyntaxfunctionvalues" + unique,"wirissyntaxvalues");
		id = "wirisassertionparampart" + unique + "[syntax_expression][functions][" + correctAnswer + "][0]";
		this.syntaxCheckbox(h,id + "[0]","exp, log, ln",this.t.t("explog"),false);
		this.syntaxCheckbox(h,id + "[1]","sin, cos, tan, asin, acos, atan, cosec, sec, cotan, acosec, asec, acotan",this.t.t("trigonometric"),false);
		this.syntaxCheckbox(h,id + "[2]","sinh, cosh, tanh, asinh, acosh, atanh",this.t.t("hyperbolic"),false);
		this.syntaxCheckbox(h,id + "[3]","min, max, sign",this.t.t("arithmetic"),false);
		h.close();
		h.close();
		h.openDiv("wirissyntaxfunctionscustom" + unique);
		h.openSpan("wirissyntaxuserfunctionlabel" + unique,"wirissyntaxlabel");
		h.label(this.t.t("userfunctions") + ":",id + "[4]",null);
		h.close();
		h.openSpan("wirissyntaxfunctionscustomvalues" + unique,"wirissyntaxvalues");
		h.input("text",id + "[4]","",null,null,"wirisuserfunctions");
		h.close();
		h.close();
		h.close();
		h.openDivClass("wirissyntaxunits" + unique,"wirissyntaxparam");
		h.openSpan("wirissyntaxunitslabel" + unique,"wirissyntaxlabel");
		h.text(this.t.t("units") + ":");
		h.close();
		h.openSpan("wirissyntaxunitsvalues" + unique,"wirissyntaxvalues");
		id = "wirisassertionparampart" + unique + "[syntax_quantity][units][" + correctAnswer + "][0]";
		this.syntaxCheckbox(h,id + "[0]","m","m",false);
		this.syntaxCheckbox(h,id + "[1]","s","s",false);
		this.syntaxCheckbox(h,id + "[2]","g","g",false);
		this.syntaxCheckbox(h,id + "[3]",com.wiris.system.Utf8.uchr(176) + ", ', \"",com.wiris.system.Utf8.uchr(176) + " ' \"",false);
		this.syntaxCheckbox(h,id + "[4]",com.wiris.system.Utf8.uchr(176) + ", ', \", sr, m, g, s, E, K, mol, cd, rad, h, min, l, N, Pa, Hz, W,J, C, V, " + com.wiris.system.Utf8.uchr(937) + ", F, S, Wb, b, H, T, lx, lm, Gy, Bq, Sv, kat",this.t.t("all"),true);
		h.close();
		h.close();
		h.openDivClass("wirissyntaxunitprefixes" + unique,"wirissyntaxparam");
		h.openSpan("wirissyntaxunitslabel" + unique,"wirissyntaxlabel");
		h.text(this.t.t("unitprefixes") + ":");
		h.close();
		h.openSpan("wirissyntaxunitsvalues" + unique,"wirissyntaxvalues");
		id = "wirisassertionparampart" + unique + "[syntax_quantity][unitprefixes][" + correctAnswer + "][0]";
		this.syntaxCheckbox(h,id + "[0]","M","M",false);
		this.syntaxCheckbox(h,id + "[1]","k","k",false);
		this.syntaxCheckbox(h,id + "[2]","c","c",false);
		this.syntaxCheckbox(h,id + "[3]","m","m",false);
		this.syntaxCheckbox(h,id + "[4]","y, z, a, f, p, n, " + com.wiris.system.Utf8.uchr(181) + ", m, c, d, da, h, k, M, G, T, P, E, Z, Y",this.t.t("all"),true);
		h.close();
		h.close();
		h.openDivClass("wirissyntaxmixedfractions" + unique,"wirissyntaxparam");
		id = "wirisassertionparam" + unique + "[syntax_quantity][mixedfractions][" + correctAnswer + "][0]";
		h.openSpan("wirissyntaxmixedfractionslabel" + unique,"wirissyntaxlabel");
		h.label(this.t.t("mixedfractions") + ":",id,null);
		h.close();
		h.openSpan("wirissyntaxmixedfractionsvalues" + unique,"wirissyntaxvalues");
		h.input("checkbox",id,"","true",null,null);
		h.close();
		h.close();
		h.openDivClass("wirissyntaxlist" + unique,"wirissyntaxparam");
		id = "wirisassertionparam" + unique + "[syntax_expression,syntax_quantity][list][" + correctAnswer + "][0]";
		h.openSpan("wirissyntaxlistlabel" + unique,"wirissyntaxlabel");
		h.label(this.t.t("list") + ":",id,null);
		h.close();
		h.openSpan("wirissyntaxlistvalue" + unique,"wirissyntaxvalues");
		h.input("checkbox",id,"","true",null,null);
		h.close();
		h.close();
		h.openDivClass("wirissyntaxforcebrackets" + unique,"wirissyntaxparam");
		h.openSpan("wirissyntaxforcebracketslabel" + unique,"wirissyntaxlabel");
		h.close();
		h.openSpan("wirissyntaxforcebracketsvalues" + unique,"wirissyntaxvalues");
		id = "wirisassertionparam" + unique + "[syntax_expression][forcebrackets][" + correctAnswer + "][0]";
		this.syntaxCheckbox(h,id,"true",this.t.t("forcebrackets"),false);
		h.close();
		h.close();
		h.openDivClass("wirissyntaxitemseparators" + unique,"wirissyntaxparam");
		h.openSpan("wirissyntaxitemseparatorslabel" + unique,"wirissyntaxlabel");
		h.close();
		h.openSpan("wirissyntaxitemseparatorsvalues" + unique,"wirissyntaxvalues");
		id = "wirisassertionparam" + unique + "[syntax_quantity][itemseparators][" + correctAnswer + "][0]";
		this.syntaxCheckbox(h,id,"\\,,\\n",this.t.t("commaasitemseparator"),false);
		h.close();
		h.close();
		h.close();
		h.close();
		h.openDivClass("wiristolerance" + unique,"wiristolerance");
		var idtol = "wirisoption" + unique + "[" + com.wiris.quizzes.impl.Option.OPTION_TOLERANCE + "]";
		h.label(this.t.t("tolerancedigits") + ":",idtol,"wirisleftlabel2");
		h.text(" ");
		h.input("text",idtol,"",null,null,null);
		var idRelTol = "wirisoption" + unique + "[" + com.wiris.quizzes.impl.Option.OPTION_RELATIVE_TOLERANCE + "]";
		h.input("checkbox",idRelTol,"",null,null,null);
		h.label(this.t.t("relative"),idRelTol,null);
		h.openSpan("wiriswarning" + unique + "[warningtolerance]","wirisinlinewarning");
		h.text(this.t.t("warningtoleranceprecision"));
		h.close();
		h.close();
		h.close();
		h.close();
	}
	,syntaxInput: function(h,id,name,value,label,all,radio) {
		var className = all?"wirisassertionparamall":null;
		h.openSpan(null,"wirishorizontalparam");
		h.input(radio?"radio":"checkbox",id,name,value,value,className);
		h.label(label,id,null);
		h.close();
	}
	,syntaxRadio: function(h,id,name,value,label) {
		this.syntaxInput(h,id,name,value,label,false,true);
	}
	,syntaxCheckbox: function(h,id,value,label,all) {
		this.syntaxInput(h,id,null,value,label,all,false);
	}
	,getAssertionFeedback: function(q,a) {
		var h = new com.wiris.quizzes.impl.HTML();
		h.openUl(null,"wirisfeedbacklist");
		var i;
		var _g1 = 0, _g = a.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var c = a[i1];
			h.openLi();
			var className = this.getGradeClass(c.value);
			var suffix = c.value == 1.0?"_correct_feedback":"_incorrect_feedback";
			h.openSpan(null,className);
			var text = this.t.t(c.assertion + suffix);
			if(q != null && q.assertions != null) {
				var index = q.getAssertionIndex(c.assertion,c.getCorrectAnswer(),c.getAnswer());
				if(index != -1) {
					var ass = q.assertions[index];
					if(ass.parameters != null) {
						var j;
						var _g3 = 0, _g2 = ass.parameters.length;
						while(_g3 < _g2) {
							var j1 = _g3++;
							var p = ass.parameters[j1];
							text = StringTools.replace(text,"${" + p.name + "}",p.content);
						}
					}
				}
			}
			h.text(text);
			h.close();
			h.close();
		}
		h.close();
		return h.getString();
	}
	,getGradeClass: function(grade) {
		var className;
		if(grade == 1.0) className = "wiriscorrect"; else if(grade == 0.0) className = "wirisincorrect"; else className = "wirispartiallycorrect";
		return className;
	}
	,getTabPreview: function(q,qi,correctAnswer,unique,conf) {
		var h = new com.wiris.quizzes.impl.HTML();
		this.printTester(h,q,qi,correctAnswer,unique);
		return h.getString();
	}
	,getTabVariables: function(q,correctAnswer,unique,conf) {
		var h = new com.wiris.quizzes.impl.HTML();
		h.jsComponent("wiriscas" + unique,"jsCasInput",q.wirisCasSession);
		h.openDivClass("wiriscasbottomwrapper" + unique,"wiriscasbottomwrapper");
		this.printOutputControls(h,unique);
		h.close();
		return h.getString();
	}
	,getTabValidation: function(q,correctAnswer,unique,conf) {
		var h = new com.wiris.quizzes.impl.HTML();
		this.printInputControls(h,q,correctAnswer,unique);
		this.printAssertionsControls(h,q,correctAnswer,unique,conf);
		return h.getString();
	}
	,getTabCorrectAnswer: function(q,correctAnswer,unique,conf) {
		var h = new com.wiris.quizzes.impl.HTML();
		if(conf.optOpenAnswer) {
			h.openDivClass("wiriseditorwrapper" + unique,"wiriscorrectanswerfieldwrapper");
			var content = "";
			if(q.correctAnswers != null && q.correctAnswers.length > correctAnswer) content = q.correctAnswers[correctAnswer].content;
			h.jsComponent("wiriscorrectanswer" + unique + "[" + correctAnswer + "]","jsEditorInput",content);
			h.close();
		}
		this.printLocalData(h,q,unique,conf);
		return h.getString();
	}
	,lang: null
	,t: null
	,__class__: com.wiris.quizzes.impl.HTMLGui
}
com.wiris.quizzes.impl.HTMLGuiConfig = $hxClasses["com.wiris.quizzes.impl.HTMLGuiConfig"] = function(classes) {
	this.openAnswerConfig();
	if(classes == null) classes = "";
	var classArray = classes.split(" ");
	var i;
	var _g1 = 0, _g = classArray.length;
	while(_g1 < _g) {
		var i1 = _g1++;
		var className = classArray[i1];
		if(className == com.wiris.quizzes.impl.HTMLGuiConfig.WIRISMULTICHOICE) this.multichoiceConfig(); else if(className == com.wiris.quizzes.impl.HTMLGuiConfig.WIRISOPENANSWER) this.openAnswerConfig(); else if(className == com.wiris.quizzes.impl.HTMLGuiConfig.WIRISESSAY) this.essayConfig();
	}
	var _g1 = 0, _g = classArray.length;
	while(_g1 < _g) {
		var i1 = _g1++;
		var className = classArray[i1];
		if(className == com.wiris.quizzes.impl.HTMLGuiConfig.WIRISVARIABLES) this.tabVariables = true; else if(className == com.wiris.quizzes.impl.HTMLGuiConfig.WIRISVALIDATION) this.tabValidation = true; else if(className == com.wiris.quizzes.impl.HTMLGuiConfig.WIRISPREVIEW) this.tabPreview = true; else if(className == com.wiris.quizzes.impl.HTMLGuiConfig.WIRISCORRECTANSWER) this.tabCorrectAnswer = true; else if(className == com.wiris.quizzes.impl.HTMLGuiConfig.WIRISAUXILIARCAS) {
			this.optAuxiliarCas = true;
			this.tabCorrectAnswer = true;
		} else if(className == com.wiris.quizzes.impl.HTMLGuiConfig.WIRISAUXILIARCASREPLACEEDITOR) this.optAuxiliarCasReplaceEditor = true; else if(className == com.wiris.quizzes.impl.HTMLGuiConfig.WIRISTEACHERANSWER) this.optOpenAnswer = true; else if(className == com.wiris.quizzes.impl.HTMLGuiConfig.WIRISGRADINGFUNCTION) this.optGradingFunction = true;
	}
};
com.wiris.quizzes.impl.HTMLGuiConfig.__name__ = ["com","wiris","quizzes","impl","HTMLGuiConfig"];
com.wiris.quizzes.impl.HTMLGuiConfig.prototype = {
	add: function(sb,className) {
		sb.b += Std.string(className);
		sb.b += Std.string(" ");
	}
	,getClasses: function() {
		var sb = new StringBuf();
		if(this.tabCorrectAnswer) this.add(sb,com.wiris.quizzes.impl.HTMLGuiConfig.WIRISCORRECTANSWER);
		if(this.tabValidation) this.add(sb,com.wiris.quizzes.impl.HTMLGuiConfig.WIRISVALIDATION);
		if(this.tabVariables) this.add(sb,com.wiris.quizzes.impl.HTMLGuiConfig.WIRISVARIABLES);
		if(this.tabPreview) this.add(sb,com.wiris.quizzes.impl.HTMLGuiConfig.WIRISPREVIEW);
		if(this.optOpenAnswer) this.add(sb,com.wiris.quizzes.impl.HTMLGuiConfig.WIRISTEACHERANSWER);
		if(this.optAuxiliarCas) this.add(sb,com.wiris.quizzes.impl.HTMLGuiConfig.WIRISAUXILIARCAS);
		if(this.optAuxiliarCasReplaceEditor) this.add(sb,com.wiris.quizzes.impl.HTMLGuiConfig.WIRISAUXILIARCASREPLACEEDITOR);
		if(this.optGradingFunction) this.add(sb,com.wiris.quizzes.impl.HTMLGuiConfig.WIRISGRADINGFUNCTION);
		return StringTools.trim(sb.b);
	}
	,essayConfig: function() {
		this.multichoiceConfig();
		this.optAuxiliarCasReplaceEditor = true;
	}
	,multichoiceConfig: function() {
		this.tabCorrectAnswer = false;
		this.tabValidation = false;
		this.tabVariables = true;
		this.tabPreview = false;
		this.optOpenAnswer = false;
		this.optAuxiliarCas = false;
		this.optAuxiliarCasReplaceEditor = false;
		this.optGradingFunction = false;
	}
	,openAnswerConfig: function() {
		this.tabCorrectAnswer = true;
		this.tabValidation = true;
		this.tabVariables = false;
		this.tabPreview = true;
		this.optOpenAnswer = true;
		this.optAuxiliarCas = false;
		this.optAuxiliarCasReplaceEditor = false;
		this.optGradingFunction = false;
	}
	,optGradingFunction: null
	,optAuxiliarCasReplaceEditor: null
	,optAuxiliarCas: null
	,optOpenAnswer: null
	,tabPreview: null
	,tabVariables: null
	,tabValidation: null
	,tabCorrectAnswer: null
	,__class__: com.wiris.quizzes.impl.HTMLGuiConfig
}
com.wiris.quizzes.impl.HTMLTools = $hxClasses["com.wiris.quizzes.impl.HTMLTools"] = function() {
};
com.wiris.quizzes.impl.HTMLTools.__name__ = ["com","wiris","quizzes","impl","HTMLTools"];
com.wiris.quizzes.impl.HTMLTools.toNativeArray = function(a) {
	var n = new Array();
	var k;
	var _g1 = 0, _g = a.length;
	while(_g1 < _g) {
		var k1 = _g1++;
		n[k1] = a[k1];
	}
	return n;
}
com.wiris.quizzes.impl.HTMLTools.insertStringInSortedArray = function(s,a) {
	if(s != null) {
		var i = 0;
		while(i < a.length) {
			if(com.wiris.quizzes.impl.HTMLTools.compareStrings(a[i],s) >= 0) break;
			i++;
		}
		if(i < a.length) {
			if(!(a[i] == s)) a.splice(i,0,s);
		} else a.push(s);
	}
}
com.wiris.quizzes.impl.HTMLTools.encodeUnicodeChars = function(mathml) {
	var sb = new StringBuf();
	var i;
	var _g1 = 0, _g = mathml.length;
	while(_g1 < _g) {
		var i1 = _g1++;
		var c = HxOverrides.cca(mathml,i1);
		if(c > 127) {
			sb.b += Std.string("&#");
			sb.b += Std.string(c);
			sb.b += Std.string(";");
		} else sb.b += String.fromCharCode(c);
	}
	return sb.b;
}
com.wiris.quizzes.impl.HTMLTools.compareStrings = function(a,b) {
	var i;
	var an = a.length;
	var bn = b.length;
	var n = an > bn?bn:an;
	var _g = 0;
	while(_g < n) {
		var i1 = _g++;
		var c = HxOverrides.cca(a,i1) - HxOverrides.cca(b,i1);
		if(c != 0) return c;
	}
	return a.length - b.length;
}
com.wiris.quizzes.impl.HTMLTools.stripRootTag = function(xml,tag) {
	xml = StringTools.trim(xml);
	if(StringTools.startsWith(xml,"<" + tag)) {
		xml = HxOverrides.substr(xml,xml.indexOf(">") + 1,null);
		xml = HxOverrides.substr(xml,0,xml.lastIndexOf("<"));
	}
	return xml;
}
com.wiris.quizzes.impl.HTMLTools.ensureRootTag = function(xml,tag) {
	xml = StringTools.trim(xml);
	if(!StringTools.startsWith(xml,"<" + tag)) xml = "<" + tag + ">" + xml + "</" + tag + ">";
	return xml;
}
com.wiris.quizzes.impl.HTMLTools.isDigit = function(c) {
	if(48 <= c && c <= 57) return true;
	if(1632 <= c && c <= 1641) return true;
	if(1776 <= c && c <= 1785) return true;
	return false;
}
com.wiris.quizzes.impl.HTMLTools.isLetter = function(c) {
	if(com.wiris.quizzes.impl.HTMLTools.isDigit(c)) return false;
	if(65 <= c && c <= 90) return true;
	if(97 <= c && c <= 122) return true;
	if(192 <= c && c <= 696 && c != 215 && c != 247) return true;
	if(867 <= c && c <= 1521) return true;
	if(1552 <= c && c <= 8188) return true;
	if(c == 8450 || c == 8461 || c == 8469 || c == 8473 || c == 8474 || c == 8477 || c == 8484) return true;
	if(c >= 13312 && c <= 40959) return true;
	return false;
}
com.wiris.quizzes.impl.HTMLTools.parseCompoundAnswer = function(correctAnswer) {
	var answers = new Array();
	if(correctAnswer.content == null) return answers;
	var NEWLINE = "<mspace linebreak=\"newline\"/>";
	var EQUAL = "<mo>=</mo>";
	var mml = com.wiris.quizzes.impl.HTMLTools.convertEditor2Newlines(correctAnswer.content);
	mml = com.wiris.quizzes.impl.HTMLTools.stripRootTag(mml,"math");
	mml = com.wiris.quizzes.impl.HTMLTools.stripRootTag(mml,"mrow");
	var lines = new Array();
	var end = 0;
	var start = 0;
	while((end = mml.indexOf(NEWLINE,start)) != -1) {
		lines.push(HxOverrides.substr(mml,start,end - start));
		start = end + NEWLINE.length;
	}
	lines.push(HxOverrides.substr(mml,start,null));
	var i;
	var _g1 = 0, _g = lines.length;
	while(_g1 < _g) {
		var i1 = _g1++;
		var line = com.wiris.quizzes.impl.HTMLTools.stripRootTag(lines[i1],"mrow");
		var equalIndex = line.indexOf(EQUAL);
		if(equalIndex != -1) {
			equalIndex += EQUAL.length;
			var label = com.wiris.quizzes.impl.HTMLTools.ensureRootTag(HxOverrides.substr(line,0,equalIndex),"math");
			var value = com.wiris.quizzes.impl.HTMLTools.ensureRootTag(HxOverrides.substr(line,equalIndex,null),"math");
			var answer = [label,value];
			answers.push(answer);
		}
	}
	return answers;
}
com.wiris.quizzes.impl.HTMLTools.joinCompoundAnswer = function(answers) {
	var sb = new StringBuf();
	var m = new com.wiris.quizzes.impl.MathContent();
	if(answers.length > 0) {
		m.type = com.wiris.quizzes.impl.MathContent.getMathType(answers[0][0]);
		var i;
		var _g1 = 0, _g = answers.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(i1 != 0) sb.b += Std.string("<mspace linebreak=\"newline\"/>");
			var ans = answers[i1];
			sb.b += Std.string(com.wiris.quizzes.impl.HTMLTools.stripRootTag(ans[0],"math"));
			sb.b += Std.string(com.wiris.quizzes.impl.HTMLTools.stripRootTag(ans[1],"math"));
		}
		m.content = sb.b;
		m.content = com.wiris.quizzes.impl.HTMLTools.ensureRootTag(m.content,"math");
	} else m.set("");
	return m;
}
com.wiris.quizzes.impl.HTMLTools.tagName = function(xml,n) {
	var endtag = xml.indexOf(">",n);
	var tag = HxOverrides.substr(xml,n + 1,endtag - (n + 1));
	var aux;
	if((aux = tag.indexOf(" ")) != -1) tag = HxOverrides.substr(tag,0,aux);
	return tag;
}
com.wiris.quizzes.impl.HTMLTools.endTag = function(xml,n) {
	var name = com.wiris.quizzes.impl.HTMLTools.tagName(xml,n);
	var depth = 1;
	var pos = n + 1;
	while(depth > 0) {
		pos = xml.indexOf("<",pos);
		if(pos == -1) return xml.length; else if(HxOverrides.substr(xml,xml.indexOf(">",pos) - 1,1) == "/") {
		} else if(HxOverrides.substr(xml,pos + 1,1) == "/") {
			if(com.wiris.quizzes.impl.HTMLTools.tagName(xml,pos + 1) == name) depth--;
		} else if(com.wiris.quizzes.impl.HTMLTools.tagName(xml,pos) == name) depth++;
		pos = pos + 1;
	}
	pos = xml.indexOf(">",pos) + 1;
	return pos;
}
com.wiris.quizzes.impl.HTMLTools.convertEditor2Newlines = function(mml) {
	var HEAD = "<mtable columnalign=\"left\" rowspacing=\"0\">";
	var start;
	if((start = mml.indexOf(HEAD)) != -1) {
		start += HEAD.length;
		var end = mml.lastIndexOf("</mtable>");
		mml = HxOverrides.substr(mml,start,end - start);
		start = 0;
		var sb = new StringBuf();
		var lines = 0;
		while((start = mml.indexOf("<mtd>",start)) != -1) {
			if(lines != 0) sb.b += Std.string("<mspace linebreak=\"newline\"/>");
			end = com.wiris.quizzes.impl.HTMLTools.endTag(mml,start);
			start += 5;
			end -= 6;
			sb.b += Std.string(HxOverrides.substr(mml,start,end - start));
			start = end + 6;
			lines++;
		}
		mml = sb.b;
		mml = com.wiris.quizzes.impl.HTMLTools.ensureRootTag(mml,"math");
	}
	return mml;
}
com.wiris.quizzes.impl.HTMLTools.emptyCasSession = function(value) {
	return value == null || value.indexOf("<mo") == -1 && value.indexOf("<mi") == -1 && value.indexOf("<mn") == -1 && value.indexOf("<csymbol") == -1;
}
com.wiris.quizzes.impl.HTMLTools.main = function() {
	var h = new com.wiris.quizzes.impl.HTMLTools();
	h.unitTest();
}
com.wiris.quizzes.impl.HTMLTools.prototype = {
	unitTestDev: function() {
		haxe.Log.trace("compare(a,a1)=" + com.wiris.quizzes.impl.HTMLTools.compareStrings("a","a1"),{ fileName : "HTMLTools.hx", lineNumber : 1537, className : "com.wiris.quizzes.impl.HTMLTools", methodName : "unitTestDev"});
		var a = new Array();
		a.push("a");
		a.push("a1");
		var s = this.sortIterator(HxOverrides.iter(a));
		var i;
		var r = "";
		var _g1 = 0, _g = s.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			r = r + " " + s[i1];
		}
		haxe.Log.trace("sort({a1,a})" + r,{ fileName : "HTMLTools.hx", lineNumber : 1548, className : "com.wiris.quizzes.impl.HTMLTools", methodName : "unitTestDev"});
	}
	,unitTest: function() {
		this.unitTestReplaceVariablesInHTML();
		this.unitTestUpdateReservedWords();
		this.unitTestVariableNames();
		this.unitTestConvertEditor2Newlines();
		this.unitTestExtractText();
		this.unitTestTextToMathML();
		this.unitTestPrepareFormulasAlgorithm();
		this.unitTestMathMLToText();
	}
	,implode: function(a,tok) {
		var sb = new StringBuf();
		var i;
		var _g1 = 0, _g = a.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(i1 > 0) sb.b += Std.string(tok);
			sb.b += Std.string(a[i1]);
		}
		return sb.b;
	}
	,unitTestVariableNames: function() {
		var html = ["<math><mi>#a1</mi></math>","<p>Calcular la corriente que circula por el condensador D del circuito adjunto. Los valores de los compenentes son: A = #A Ω;  B = #B Ω;  C = #C Ω;  D = #D Ω.</p>\n" + "<p><img src=\"@@PLUGINFILE@@/Circuito1.gif\" alt=\"\" width=\"424\" height=\"170\" /></p> <p>#x</p> <p>#x1</p> <p>#x2</p> <p>#x3</p> ","<span style=\"color: #aaffaa;\">&#x32;#x_11</span>","123 #a<ol>\n" + "<li><span style=\"background-color: #ffff00; font-family: 'times new roman', times, serif;\">Use inverse operations to undo Addition and Subtraction (add and/or subtract all terms from left to right)</span></li>\n" + "<li><span style=\"background-color: #ffff00; font-family: 'times new roman', times, serif;\">Use inverse operations to undo Multiplication and Division (multiply and/or divide all factors from left to right)</span></li>\n" + "</ol>","ΩΩΩΩΩΩΩ<div>ΩΩΩ<p>ΩΩ#aΩΩ</p>ΩΩΩ</div>ΩΩΩΩΩΩΩ"];
		var vars = [["a1"],["A","B","C","D","x","x1","x2","x3"],["x_11"],["a"],["a"]];
		var i;
		var _g1 = 0, _g = html.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var v = this.extractVariableNames(html[i1]);
			var a1 = this.implode(vars[i1],", ");
			var a2 = this.implode(v,", ");
			if(!(a1 == a2)) throw "Expected: " + a1 + ". Found: " + a2 + ".";
		}
	}
	,unitTestMathMLToText: function() {
		var mathml = ["<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>sin</mi><mo>(</mo><mi>x</mi><mo>)</mo><mo>+</mo><mn>1</mn></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mo>#</mo><mi>F</mi><mo>+</mo><mi>C</mi></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mn>2</mn><mo>.</mo><mn>0</mn><mo>·</mo><mi>x</mi><mi>y</mi></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi mathvariant=\"normal\">sin</mi><mi>x</mi></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mfenced><mrow><mn>1</mn><mo>,</mo><mn>0</mn></mrow></mfenced></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mfrac><mn>1</mn><mn>3</mn></mfrac></math>","<math><mfenced open=\"|\" close = \"|\"><mtable><mtr><mtd><mn>1</mn></mtd><mtd><mn>0</mn></mtd></mtr><mtr><mtd><mn>0</mn></mtd><mtd><mn>1</mn></mtd></mtr></mtable></mfenced></math>","<math><mfenced><mtable><mtr><mtd><mn>1</mn></mtd><mtd><mn>0</mn></mtd></mtr><mtr><mtd><mn>0</mn></mtd><mtd><mn>1</mn></mtd></mtr></mtable></mfenced></math>"];
		var responses = ["sin(x)+1","#F+C","2.0·xy","sinx","(1,0)","1/3","|((1,0),(0,1))|","((1,0),(0,1))"];
		var i;
		var _g1 = 0, _g = mathml.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var res = this.mathMLToText(mathml[i1]);
			if(!(res == responses[i1])) throw "Expected: '" + responses[i1] + "' but got: '" + res + "'.";
		}
	}
	,unitTestTextToMathML: function() {
		var texts = ["sin(x)+1","#F +C","2.0·xy","x<3"];
		var responses = ["<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>sin</mi><mo>(</mo><mi>x</mi><mo>)</mo><mo>+</mo><mn>1</mn></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mo>#</mo><mi>F</mi><mo> </mo><mo>+</mo><mi>C</mi></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mn>2</mn><mo>.</mo><mn>0</mn><mo>·</mo><mi>x</mi><mi>y</mi></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>x</mi><mo>&lt;</mo><mn>3</mn></math>"];
		var i;
		var _g1 = 0, _g = texts.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var res = this.textToMathML(texts[i1]);
			if(!(res == responses[i1])) throw "Expected: '" + responses[i1] + "' but got: '" + res + "'.";
		}
	}
	,unitTestReplaceVariablesInHTML: function() {
		var texts = ["<math><mi>#a1</mi></math>","<math><mo>#</mo><mi>a</mi><mn>1</mn></math>","<p><img align=\"middle\" src=\"http://localhost/moodle21/lib/editor/tinymce/tiny_mce/3.4.2/plugins/tiny_mce_wiris/integration/showimage.php?formula=cb550f21cbc30fac59e4f2bba550693d.png\" /> + #dif</p>","a  «math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;»«mfrac»«mrow»«mi»#«/mi»«mi»a«/mi»«mo»+«/mo»«mn»1«/mn»«/mrow»«mrow»«mi»#«/mi»«mi»b«/mi»«mo»-«/mo»«mn»1«/mn»«/mrow»«/mfrac»«/math» a","<p>#a&#xa1;<script type=\"text/javascript\"> <!-- #a1 will be replaced by wiris quizzes --> <![CDATA[ a = #a1; ]]> </script> <select><option>#a</option><option>#a1</option></select></p>","<math><mo>#</mo><mi>a</mi><mn>0</mn></math>"];
		var mml = new Hash();
		mml.set("dif","<math><mn>0</mn></math>");
		mml.set("a","<math><mi>x</mi></math>");
		mml.set("b","<math><mi>y</mi></math>");
		mml.set("a1","<math><mi>z</mi></math>");
		var txt = new Hash();
		txt.set("dif","0");
		txt.set("a","x");
		txt.set("b","y");
		txt.set("a1","z");
		var v = new Hash();
		v.set(com.wiris.quizzes.impl.MathContent.TYPE_MATHML,mml);
		v.set(com.wiris.quizzes.impl.MathContent.TYPE_TEXT,txt);
		var responses = ["<math><mrow><mi>z</mi></mrow></math>","<math><mrow><mi>z</mi></mrow></math>","<p><img align=\"middle\" src=\"http://localhost/moodle21/lib/editor/tinymce/tiny_mce/3.4.2/plugins/tiny_mce_wiris/integration/showimage.php?formula=cb550f21cbc30fac59e4f2bba550693d.png\" /> + <math><mn>0</mn></math></p>","a  «math xmlns=¨http://www.w3.org/1998/Math/MathML¨»«mfrac»«mrow»«mrow»«mi»x«/mi»«/mrow»«mo»+«/mo»«mn»1«/mn»«/mrow»«mrow»«mrow»«mi»y«/mi»«/mrow»«mo»-«/mo»«mn»1«/mn»«/mrow»«/mfrac»«/math» a","<p><math><mi>x</mi></math>&#xa1;<script type=\"text/javascript\"> <!-- #a1 will be replaced by wiris quizzes --> <![CDATA[ a = z; ]]> </script> <select><option>x</option><option>z</option></select></p>","<math><mrow><mrow><mi>x</mi></mrow><mo>0</mo></mrow></math>"];
		var i;
		var _g1 = 0, _g = texts.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var res = this.expandVariables(texts[i1],v);
			if(!(res == responses[i1])) throw "Expected: '" + responses[i1] + "' but got: '" + res + "'.";
		}
	}
	,unitTestExtractText: function() {
		var inputs = ["<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mrow><mtext>Cap de les altres</mtext></mrow></math>","<math><mrow><mtext>La resposta és </mtext><mfrac><mfrac><mn>1</mn><mn>2</mn></mfrac><mi>x</mi></mfrac><mtext>.</mtext></mrow></math>","<math><mrow><mo>(</mo><mtext>tiruliru</mtext><mo>)</mo></mrow></math>","<math><mrow><msqrt><mtext>radicand</mtext></msqrt></mrow></math>"];
		var outputs = ["Cap de les altres","La resposta és <math><mrow><mfrac><mfrac><mn>1</mn><mn>2</mn></mfrac><mi>x</mi></mfrac></mrow></math>.","<math><mrow><mo>(</mo></mrow></math>tiruliru<math><mrow><mo>)</mo></mrow></math>","<math><mrow><msqrt><mtext>radicand</mtext></msqrt></mrow></math>"];
		var i;
		var _g1 = 0, _g = inputs.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var coutput = this.extractTextFromMathML(inputs[i1]);
			if(!(coutput == outputs[i1])) throw "Expected: '" + outputs[i1] + "' but got: '" + coutput + "'.";
		}
	}
	,unitTestPrepareFormulasAlgorithm: function() {
		var tests = ["<math><mo>#</mo><mi>v</mi><mi>a</mi><mi>r</mi><mo>_</mo><mi>k</mi></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mo>#</mo><mi>a</mi><mo>&#160;</mo><mo>+</mo><mo>#</mo><mi>b</mi></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>p</mi><mo>(</mo><mi>x</mi><mo>)</mo><mo>=</mo><mi>#</mi><mi>p</mi></math>","<math><mrow><mi>#</mi><mi>f</mi></mrow></math>","<math><mrow><mi>#</mi><msup><mi>f</mi><mn>2</mn></msup></mrow></math>","<math><mrow><msqrt><mrow><mn>2</mn><msqrt><mn>3</mn></msqrt></mrow></msqrt><mi>#</mi><mi>a</mi></mrow></math>","<math><mrow><msub><mi>#</mi><mi>a</mi></msub></mrow></math>","<math><mrow><mi>#</mi><msub><mi>a</mi><mi>c</mi></msub></mrow></math>","<math><mrow><msqrt><mrow><mi>#</mi><mi>f</mi><mi>u</mi><mi>n</mi><mi>c</mi></mrow></msqrt></mrow></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mo>&#8594;</mo><mn>0</mn></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>x</mi><mo>=</mo><mo>#</mo><mi>a</mi><mspace linebreak=\"newline\"/><mi>y</mi><mo>=</mo><mo>#</mo><mi>b</mi></math>"];
		var responses = ["<math><mo>#var_k</mo></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mo>#a</mo><mo>&#160;</mo><mo>+</mo><mo>#b</mo></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>p</mi><mo>(</mo><mi>x</mi><mo>)</mo><mo>=</mo><mi>#p</mi></math>","<math><mrow><mi>#f</mi></mrow></math>","<math><mrow><msup><mi>#f</mi><mn>2</mn></msup></mrow></math>","<math><mrow><msqrt><mrow><mn>2</mn><msqrt><mn>3</mn></msqrt></mrow></msqrt><mi>#a</mi></mrow></math>","<math><mrow><msub><mi>#</mi><mi>a</mi></msub></mrow></math>","<math><mrow><msub><mi>#a</mi><mi>c</mi></msub></mrow></math>","<math><mrow><msqrt><mrow><mi>#func</mi></mrow></msqrt></mrow></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mo>&#8594;</mo><mn>0</mn></math>","<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mi>x</mi><mo>=</mo><mo>#a</mo><mspace linebreak=\"newline\"/><mi>y</mi><mo>=</mo><mo>#b</mo></math>"];
		var i;
		var _g1 = 0, _g = tests.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var res = this.prepareFormulas(tests[i1]);
			if(!(res == responses[i1])) throw "Expected: '" + responses[i1] + "' but got: '" + res + "'.";
		}
	}
	,unitTestConvertEditor2Newlines: function() {
		var tests = ["<mtable columnalign=\"left\" rowspacing=\"0\"><mtr><mtd><mfenced><mtable><mtr><mtd><mn>1</mn></mtd><mtd><mn>2</mn></mtd></mtr><mtr><mtd><mtable><mtr><mtd><mi>a</mi></mtd><mtd><mi>b</mi></mtd></mtr></mtable></mtd><mtd><mn>2</mn></mtd></mtr></mtable></mfenced></mtd></mtr><mtr><mtd><mtable><mtr><mtd><mn>1</mn></mtd><mtd><mn>2</mn></mtd></mtr></mtable></mtd></mtr></mtable>"];
		var res = ["<math><mfenced><mtable><mtr><mtd><mn>1</mn></mtd><mtd><mn>2</mn></mtd></mtr><mtr><mtd><mtable><mtr><mtd><mi>a</mi></mtd><mtd><mi>b</mi></mtd></mtr></mtable></mtd><mtd><mn>2</mn></mtd></mtr></mtable></mfenced><mspace linebreak=\"newline\"/><mtable><mtr><mtd><mn>1</mn></mtd><mtd><mn>2</mn></mtd></mtr></mtable></math>"];
		var i;
		var _g1 = 0, _g = tests.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var u = com.wiris.quizzes.impl.HTMLTools.convertEditor2Newlines(tests[i1]);
			if(!(u == res[i1])) throw "Expected: " + res[i1] + ". Got: " + u + ".";
		}
	}
	,unitTestUpdateReservedWords: function() {
		var tests = ["<math><mi>si</mi><mi>n</mi><mi>x</mi></math>","<math><mn>2</mn><mi>k</mi><mi>m</mi></math>","<math><mn>2</mn><mi>k</mi><mo>&nbsp;</mo><mi>m</mi></math>"];
		var words = new Array();
		words.push("s");
		words.push("si");
		words.push("sin");
		words.push("m");
		words.push("km");
		var res = ["<math><mi>sin</mi><mi>x</mi></math>","<math><mn>2</mn><mi>km</mi></math>","<math><mn>2</mn><mi>k</mi><mo>&nbsp;</mo><mi mathvariant=\"normal\">m</mi></math>"];
		var i;
		var _g1 = 0, _g = tests.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var u = this.updateReservedWords(tests[i1],words);
			if(!(u == res[i1])) throw "Expected: " + res[i1] + ". Got: " + u + ".";
		}
	}
	,fullMathML2TextImpl: function(e) {
		var sb = new StringBuf();
		if(e.getNodeName() == "mo" || e.getNodeName() == "mn" || e.getNodeName() == "mi") sb.b += Std.string(com.wiris.util.xml.WXmlUtils.getNodeValue(e.firstChild())); else if(e.getNodeName() == "mfenced" || e.getNodeName() == "mtr" || e.getNodeName() == "mtable") {
			var open = e.get("open");
			if(open == null) open = "(";
			var close = e.get("close");
			if(close == null) close = ")";
			var separators = e.get("separators");
			if(separators == null) separators = ",";
			if(open == "(" && close == ")" && e.firstElement().getNodeName() == "mtable") {
				open = "";
				close = "";
			}
			sb.b += Std.string(open);
			var it = e.elements();
			var i = 0;
			var n = separators.length;
			while(it.hasNext()) {
				if(i > 0 && n > 0) sb.b += Std.string(com.wiris.system.Utf8.uchr(HxOverrides.cca(separators,i < n?i:n - 1)));
				sb.b += Std.string(this.fullMathML2TextImpl(it.next()));
				i++;
			}
			sb.b += Std.string(close);
		} else if(e.getNodeName() == "mfrac") {
			var it = e.elements();
			var num = this.fullMathML2TextImpl(it.next());
			if(num.length > 1) num = "(" + num + ")";
			var den = this.fullMathML2TextImpl(it.next());
			if(den.length > 1) den = "(" + den + ")";
			sb.b += Std.string(num);
			sb.b += Std.string("/");
			sb.b += Std.string(den);
		} else if(e.getNodeName() == "msup") {
			var it = e.elements();
			var bas = this.fullMathML2TextImpl(it.next());
			if(bas.length > 1) bas = "(" + bas + ")";
			var exp = this.fullMathML2TextImpl(it.next());
			if(exp.length > 1) exp = "(" + exp + ")";
			sb.b += Std.string(bas);
			sb.b += Std.string("^");
			sb.b += Std.string(exp);
		} else {
			var it = e.elements();
			while(it.hasNext()) sb.b += Std.string(this.fullMathML2TextImpl(it.next()));
		}
		return sb.b;
	}
	,mathMLToText: function(mathml) {
		var root = com.wiris.util.xml.WXmlUtils.parseXML(mathml);
		if(root.nodeType == Xml.Document) root = root.firstElement();
		return this.fullMathML2TextImpl(root);
	}
	,updateReservedWords: function(mathml,words) {
		mathml = this.breakWords(mathml);
		mathml = this.joinWords(mathml,words);
		return mathml;
	}
	,getBrokenWordMathML: function(word) {
		var sb = new StringBuf();
		var n = word.length;
		var i;
		var _g = 0;
		while(_g < n) {
			var i1 = _g++;
			sb.b += Std.string("<mi>");
			sb.b += Std.string(com.wiris.system.Utf8.uchr(HxOverrides.cca(word,i1)));
			sb.b += Std.string("</mi>");
		}
		return sb.b;
	}
	,standardWordMathML: function(word) {
		if(word.length > 1) return "<mi>" + word + "</mi>"; else return "<mi mathvariant=\"normal\">" + word + "</mi>";
	}
	,joinWords: function(mathml,words) {
		var sb = new StringBuf();
		var start = 0;
		var end = 0;
		while((start = mathml.indexOf("<mi>",end)) != -1) {
			sb.b += Std.string(HxOverrides.substr(mathml,end,start - end));
			var i;
			var max = 0;
			var n = -1;
			var _g1 = 0, _g = words.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var word = words[i1];
				if(word.length > max) {
					var wml = this.getBrokenWordMathML(words[i1]);
					if(start + wml.length < mathml.length && HxOverrides.substr(mathml,start,wml.length) == wml) {
						max = word.length;
						n = i1;
					}
				}
			}
			if(n != -1) {
				sb.b += Std.string(this.standardWordMathML(words[n]));
				end = start + this.getBrokenWordMathML(words[n]).length;
			} else {
				sb.b += Std.string("<mi>");
				end = start + 4;
			}
		}
		sb.b += Std.string(HxOverrides.substr(mathml,end,null));
		return sb.b;
	}
	,breakWords: function(mathml) {
		var sb = new StringBuf();
		var start = 0;
		var end = 0;
		while((start = mathml.indexOf("<mi",end)) != -1) {
			sb.b += Std.string(HxOverrides.substr(mathml,end,start - end));
			var wstart = start + 3;
			var next = HxOverrides.substr(mathml,wstart,1);
			if(next == " ") wstart = mathml.indexOf(">",wstart); else if(!(next == ">")) {
				sb.b += Std.string(HxOverrides.substr(mathml,start,1));
				end = start + 1;
				continue;
			}
			wstart++;
			var wend = mathml.indexOf("</mi>",start);
			var word = HxOverrides.substr(mathml,wstart,wend - wstart);
			end = wend + 5;
			var n = word.length;
			var i = 0;
			while(i < n) {
				sb.b += Std.string("<mi>");
				var ch = com.wiris.system.Utf8.uchr(HxOverrides.cca(word,i));
				if(ch == "&") {
					var ent = new StringBuf();
					ent.b += Std.string(ch);
					do {
						i++;
						ch = com.wiris.system.Utf8.uchr(HxOverrides.cca(word,i));
						ent.b += Std.string(ch);
					} while(!(ch == ";"));
					ch = com.wiris.util.xml.WXmlUtils.htmlUnescape(ent.b);
				}
				sb.b += Std.string(ch);
				sb.b += Std.string("</mi>");
				i++;
			}
		}
		sb.b += Std.string(HxOverrides.substr(mathml,end,null));
		return sb.b;
	}
	,getParentTag: function(s,n) {
		var stack = new Array();
		var error = false;
		while((n = s.indexOf("<",n)) != -1 && !error) {
			if(this.isQuizzesIdentifierStart(HxOverrides.cca(s,n + 1))) {
				var close = s.indexOf(">",n);
				var space = s.indexOf(" ",n);
				if(space != -1 && space < close) close = space;
				if(close != -1) stack.push(HxOverrides.substr(s,n + 1,close - n - 1)); else error = true;
			} else if(HxOverrides.cca(s,n + 1) == 47) {
				var close = s.indexOf(">",n);
				var tag = HxOverrides.substr(s,n + 2,close - n - 2);
				if(stack.length == 0) return tag; else if(!(stack.pop() == tag)) error = true;
			} else if(HxOverrides.substr(s,n,4) == "<!--") {
				n = s.indexOf("-->",n);
				if(n == -1) error = true;
			}
			n++;
		}
		return null;
	}
	,isEntity: function(s,n) {
		if(n > 0 && HxOverrides.cca(s,n - 1) == 38) {
			n++;
			var end = s.indexOf(";",n);
			if(end != -1) {
				while(this.isQuizzesIdentifierPart(HxOverrides.cca(s,n))) n++;
				return n == end;
			}
		}
		return false;
	}
	,variablePosition: function(s,n) {
		if(this.insideTag(s,n) || this.isEntity(s,n) || this.insideComment(s,n)) return com.wiris.quizzes.impl.HTMLTools.POSITION_NONE; else {
			var parent = this.getParentTag(s,n);
			if(parent == null) return com.wiris.quizzes.impl.HTMLTools.POSITION_ALL;
			if(parent == "script" || parent == "option") return com.wiris.quizzes.impl.HTMLTools.POSITION_ONLY_TEXT; else if(parent == "style") return com.wiris.quizzes.impl.HTMLTools.POSITION_NONE; else if(parent == "mi" || parent == "mo" || parent == "mtext" || parent == "ms") return com.wiris.quizzes.impl.HTMLTools.POSITION_ONLY_MATHML; else return com.wiris.quizzes.impl.HTMLTools.POSITION_ALL;
		}
	}
	,extractTextFromMathML: function(formula) {
		if(formula.indexOf("<mtext") == -1) return formula;
		var allowedTags = ["math","mrow"];
		var stack = new Array();
		var omittedcontent = false;
		var lasttag = null;
		var beginformula = formula.indexOf("<");
		var start;
		var end = 0;
		while(end < formula.length && (start = formula.indexOf("<",end)) != -1) {
			end = formula.indexOf(">",start);
			var tag = HxOverrides.substr(formula,start,end - start + 1);
			var trimmedTag = HxOverrides.substr(formula,start + 1,end - start - 1);
			if(HxOverrides.substr(trimmedTag,trimmedTag.length - 1,null) == "/") continue;
			var spacepos = tag.indexOf(" ");
			if(spacepos != -1) trimmedTag = HxOverrides.substr(tag,1,spacepos - 1);
			if(this.inArray(trimmedTag,allowedTags)) {
				stack.push([trimmedTag,tag]);
				lasttag = trimmedTag;
			} else if(trimmedTag == "/" + lasttag) {
				stack.pop();
				if(stack.length > 0) {
					var lastpair = stack[stack.length - 1];
					lasttag = lastpair[0];
				} else lasttag = null;
				if(stack.length == 0 && !omittedcontent) {
					var formula1 = HxOverrides.substr(formula,0,beginformula);
					if(end < formula.length - 1) {
						var formula2 = HxOverrides.substr(formula,end + 1,null);
						formula = formula1 + formula2;
					} else formula = formula1;
				}
			} else if(trimmedTag == "mtext") {
				var pos2 = formula.indexOf("</mtext>",start);
				var text = HxOverrides.substr(formula,start + 7,pos2 - start - 7);
				text = StringTools.replace(text,"&centerdot;","&middot;");
				text = StringTools.replace(text,"&apos;","&#39;");
				var formula1 = HxOverrides.substr(formula,0,start);
				var formula2 = HxOverrides.substr(formula,pos2 + 8,null);
				if(omittedcontent) {
					var tail1 = "";
					var head2 = "";
					var i = stack.length - 1;
					while(i >= 0) {
						var pair = stack[i];
						tail1 = tail1 + "</" + pair[0] + ">";
						head2 = pair[1] + head2;
						i--;
					}
					formula1 = formula1 + tail1;
					formula2 = head2 + formula2;
					if(com.wiris.quizzes.impl.MathContent.isEmpty(formula2)) formula2 = "";
					formula = formula1 + text + formula2;
					beginformula = start + tail1.length + text.length;
					end = beginformula + head2.length;
				} else {
					var head = HxOverrides.substr(formula1,0,beginformula);
					var head2 = HxOverrides.substr(formula1,beginformula,null);
					formula2 = head2 + formula2;
					if(com.wiris.quizzes.impl.MathContent.isEmpty(formula2)) formula2 = "";
					formula = head + text + formula2;
					beginformula += text.length;
					end = beginformula + formula1.length;
				}
				omittedcontent = false;
			} else {
				var num = 1;
				var pos = start + tag.length;
				while(num > 0) {
					end = formula.indexOf("</" + trimmedTag + ">",pos);
					var mid = formula.indexOf("<" + trimmedTag,pos);
					if(end == -1) return formula; else if(mid == -1 || end < mid) {
						num--;
						pos = end + ("</" + trimmedTag + ">").length;
					} else {
						pos = mid + ("<" + trimmedTag).length;
						num++;
					}
				}
				end += ("</" + trimmedTag + ">").length;
				omittedcontent = true;
			}
		}
		return formula;
	}
	,addImageTag: function(filename) {
		var url = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL) + "?service=cache&name=" + filename;
		var h = new com.wiris.quizzes.impl.HTML();
		var id = HxOverrides.substr(filename,0,filename.indexOf("."));
		h.image(id,url,null,null);
		return h.getString();
	}
	,isTokensMathML: function(mathml) {
		mathml = com.wiris.quizzes.impl.HTMLTools.stripRootTag(mathml,"math");
		var allowedTags = ["mrow","mn","mi","mo"];
		var start = 0;
		while((start = mathml.indexOf("<",start)) != -1) {
			var sb = new StringBuf();
			start++;
			var c = HxOverrides.cca(mathml,start);
			if(c == 47) continue;
			while(c != 32 && c != 47 && c != 62) {
				sb.b += String.fromCharCode(c);
				start++;
				c = HxOverrides.cca(mathml,start);
			}
			if(c == 32 || c == 47) return false;
			var tagname = sb.b;
			if(!this.inArray(tagname,allowedTags)) return false;
			start++;
			var end = mathml.indexOf("<",start);
			var content = HxOverrides.substr(mathml,start,end - start);
			var i;
			var _g1 = 0, _g = content.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				c = HxOverrides.cca(content,i1);
				if(!(c == 35 || c >= 48 && c <= 57 || c >= 65 && c <= 90 || c >= 97 && c <= 122)) return false;
			}
		}
		return true;
	}
	,textToMathML: function(text) {
		var mathml = new StringBuf();
		var token;
		var n = text.length;
		var i = 0;
		while(i < n) {
			var c = HxOverrides.cca(text,i);
			if(com.wiris.quizzes.impl.HTMLTools.isDigit(c)) {
				token = new StringBuf();
				while(i < n && com.wiris.quizzes.impl.HTMLTools.isDigit(c)) {
					token.b += String.fromCharCode(c);
					i++;
					if(i < n) c = HxOverrides.cca(text,i);
				}
				mathml.b += Std.string("<mn>");
				mathml.b += Std.string(token.b);
				mathml.b += Std.string("</mn>");
			} else if(com.wiris.quizzes.impl.HTMLTools.isLetter(c)) {
				token = new StringBuf();
				while(i < n && com.wiris.quizzes.impl.HTMLTools.isLetter(c)) {
					token.b += Std.string(com.wiris.system.Utf8.uchr(c));
					i++;
					if(i < n) c = HxOverrides.cca(text,i);
				}
				var tok = token.b;
				var tokens;
				if(this.isReservedWord(tok)) tokens = [tok]; else {
					var m = tok.length;
					tokens = new Array();
					var j;
					var _g = 0;
					while(_g < m) {
						var j1 = _g++;
						tokens[j1] = com.wiris.system.Utf8.uchr(HxOverrides.cca(tok,j1));
					}
				}
				var k;
				var _g1 = 0, _g = tokens.length;
				while(_g1 < _g) {
					var k1 = _g1++;
					mathml.b += Std.string("<mi>");
					mathml.b += Std.string(tokens[k1]);
					mathml.b += Std.string("</mi>");
				}
			} else {
				mathml.b += Std.string("<mo>");
				if(c == 32) c = 160;
				mathml.b += Std.string(com.wiris.util.xml.WXmlUtils.htmlEscape(com.wiris.system.Utf8.uchr(c)));
				mathml.b += Std.string("</mo>");
				i++;
				if(i < n) c = HxOverrides.cca(text,i);
			}
		}
		var result = this.addMathTag(mathml.b);
		return result;
	}
	,isReservedWord: function(word) {
		var reservedWords = ["sin","cos","tan","log","ln"];
		return this.inArray(word,reservedWords);
	}
	,toSubFormula: function(mathml) {
		mathml = com.wiris.quizzes.impl.HTMLTools.stripRootTag(mathml,"math");
		return "<mrow>" + mathml + "</mrow>";
	}
	,addMathTag: function(mathml) {
		if(!StringTools.startsWith(mathml,"<math")) mathml = "<math xmlns=\"http://www.w3.org/1998/Math/MathML\">" + mathml + "</math>";
		return mathml;
	}
	,inArray: function(value,array) {
		var i;
		var _g1 = 0, _g = array.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(array[i1] == value) return true;
		}
		return false;
	}
	,prepareFormulas: function(text) {
		var start = 0;
		while((start = text.indexOf("<math",start)) != -1) {
			var length = text.indexOf("</math>",start) - start + "</math>".length;
			var formula = HxOverrides.substr(text,start,length);
			var pos = 0;
			while((pos = formula.indexOf("#",pos)) != -1) {
				var initag = pos;
				while(initag >= 0 && HxOverrides.cca(formula,initag) != 60) initag--;
				var parentpos = initag;
				var parenttag = null;
				var parenttagname = null;
				while(parenttag == null) {
					while(parentpos >= 2 && HxOverrides.cca(formula,parentpos - 2) == 47 && HxOverrides.cca(formula,parentpos - 1) == 62) {
						parentpos -= 2;
						while(parentpos >= 0 && HxOverrides.cca(formula,parentpos) != 60) parentpos--;
					}
					parentpos--;
					while(parentpos >= 0 && HxOverrides.cca(formula,parentpos) != 60) parentpos--;
					if(HxOverrides.cca(formula,parentpos) == 60 && HxOverrides.cca(formula,parentpos + 1) == 47) {
						var namepos = parentpos + "</".length;
						var character = HxOverrides.cca(formula,namepos);
						var nameBuf = new StringBuf();
						while(this.isQuizzesIdentifierPart(character)) {
							nameBuf.b += String.fromCharCode(character);
							namepos++;
							character = HxOverrides.cca(formula,namepos);
						}
						var name = nameBuf.b;
						var depth = 1;
						var namelength = name.length;
						while(depth > 0 && parentpos >= 0) {
							var currentTagName = HxOverrides.substr(formula,parentpos,namelength);
							if(name == currentTagName) {
								var currentStartTag = HxOverrides.substr(formula,parentpos - "<".length,namelength + "<".length);
								if("<" + name == currentStartTag && formula.indexOf(">",parentpos) < formula.indexOf("/",parentpos)) depth--; else {
									var currentOpenCloseTag = HxOverrides.substr(formula,parentpos - "</".length,namelength + "</".length);
									if("</" + name == currentOpenCloseTag) depth++;
								}
							}
							if(depth > 0) parentpos--; else parentpos -= "<".length;
						}
						if(depth > 0) return text;
					} else {
						parenttag = HxOverrides.substr(formula,parentpos,formula.indexOf(">",parentpos) - parentpos + 1);
						parenttagname = HxOverrides.substr(parenttag,1,parenttag.length - 2);
						if(parenttagname.indexOf(" ") != -1) parenttagname = HxOverrides.substr(parenttagname,0,parenttagname.indexOf(" "));
					}
				}
				var allowedparenttags = ["mrow","mtd","math","msqrt","mstyle","merror","mpadded","mphantom","menclose"];
				if(this.inArray(parenttagname,allowedparenttags)) {
					var firstchar = true;
					var appendpos = pos + 1;
					var character = HxOverrides.cca(formula,appendpos);
					while(this.isQuizzesIdentifierStart(character) || this.isQuizzesIdentifierPart(character) && !firstchar) {
						appendpos++;
						character = HxOverrides.cca(formula,appendpos);
						firstchar = false;
					}
					if(HxOverrides.cca(formula,appendpos) != 60) {
						pos++;
						continue;
					}
					var nextpos = formula.indexOf(">",pos);
					var end = false;
					while(!end && nextpos != -1 && pos + ">".length < formula.length) {
						nextpos += ">".length;
						var nexttaglength = formula.indexOf(">",nextpos) - nextpos + ">".length;
						var nexttag = HxOverrides.substr(formula,nextpos,nexttaglength);
						var nexttagname = HxOverrides.substr(nexttag,1,nexttag.length - 2);
						if(nexttagname.indexOf(" ") != -1) nexttagname = HxOverrides.substr(nexttagname,0,nexttagname.indexOf(" "));
						var specialtag = null;
						var speciallength = 0;
						if(nexttagname == "msup" || nexttagname == "msub" || nexttagname == "msubsup") {
							specialtag = nexttag;
							speciallength = nexttaglength;
							nextpos = nextpos + nexttaglength;
							nexttaglength = formula.indexOf(">",nextpos) - nextpos + ">".length;
							nexttag = HxOverrides.substr(formula,nextpos,nexttaglength);
							nexttagname = HxOverrides.substr(nexttag,1,nexttag.length - 2);
							if(nexttagname.indexOf(" ") != -1) nexttagname = HxOverrides.substr(nexttagname,0,nexttagname.indexOf(" "));
						}
						if(nexttagname == "mi" || nexttagname == "mn" || nexttagname == "mo") {
							var contentpos = nextpos + nexttaglength;
							var toappend = new StringBuf();
							character = HxOverrides.cca(formula,contentpos);
							while(this.isQuizzesIdentifierStart(character) || this.isQuizzesIdentifierPart(character) && !firstchar) {
								contentpos++;
								toappend.b += String.fromCharCode(character);
								character = HxOverrides.cca(formula,contentpos);
								firstchar = false;
							}
							var toAppendStr = toappend.b;
							var nextclosepos = formula.indexOf("<",contentpos);
							var nextcloseend = formula.indexOf(">",nextclosepos) + ">".length;
							if(toAppendStr.length == 0) end = true; else if(nextclosepos != contentpos) {
								var content = HxOverrides.substr(formula,contentpos,nextclosepos - contentpos);
								var nextclosetag = HxOverrides.substr(formula,nextclosepos,nextcloseend - nextclosepos);
								var newnexttag = nexttag + content + nextclosetag;
								formula = HxOverrides.substr(formula,0,nextpos) + newnexttag + HxOverrides.substr(formula,nextcloseend,null);
								formula = HxOverrides.substr(formula,0,appendpos) + toAppendStr + HxOverrides.substr(formula,appendpos,null);
								end = true;
							} else {
								formula = HxOverrides.substr(formula,0,nextpos) + HxOverrides.substr(formula,nextcloseend,null);
								formula = HxOverrides.substr(formula,0,appendpos) + toAppendStr + HxOverrides.substr(formula,appendpos,null);
								if(specialtag != null) {
									var fulltaglength = formula.indexOf(">",appendpos) + ">".length - initag;
									formula = HxOverrides.substr(formula,0,initag) + specialtag + HxOverrides.substr(formula,initag,fulltaglength) + HxOverrides.substr(formula,initag + fulltaglength + speciallength,null);
									end = true;
								}
							}
							appendpos += toAppendStr.length;
						} else end = true;
						if(!end) nextpos = formula.indexOf(">",pos);
					}
				}
				pos++;
			}
			text = HxOverrides.substr(text,0,start) + formula + HxOverrides.substr(text,start + length,null);
			start = start + formula.length;
		}
		return text;
	}
	,sortIterator: function(it) {
		var sorted = new Array();
		while(it.hasNext()) {
			var a = it.next();
			var j = 0;
			while(j < sorted.length) {
				if(com.wiris.quizzes.impl.HTMLTools.compareStrings(sorted[j],a) > 0) break;
				j++;
			}
			sorted.splice(j,0,a);
		}
		return sorted;
	}
	,getPlaceHolder: function(name) {
		return "#" + name;
	}
	,insideComment: function(html,pos) {
		var beginComment = this.lastIndexOf(html,"<!--",pos);
		if(beginComment != -1) {
			var endComment = this.lastIndexOf(html,"-->",pos);
			return endComment < beginComment;
		}
		return false;
	}
	,lastIndexOf: function(src,str,pos) {
		return HxOverrides.substr(src,0,pos).lastIndexOf(str);
	}
	,insideTag: function(html,pos) {
		var beginTag = this.lastIndexOf(html,"<",pos);
		while(beginTag != -1 && !this.isQuizzesIdentifierStart(HxOverrides.cca(html,beginTag + 1))) {
			if(beginTag == 0) return false;
			beginTag = this.lastIndexOf(html,"<",beginTag - 1);
		}
		if(beginTag == -1) return false;
		var endTag = html.indexOf(">",beginTag);
		return endTag > pos;
	}
	,isQuizzesIdentifierPart: function(c) {
		return c >= 97 && c <= 122 || c >= 65 && c <= 90 || c == 95 || c >= 48 && c <= 57;
	}
	,isQuizzesIdentifierStart: function(c) {
		return c >= 97 && c <= 122 || c >= 65 && c <= 90 || c == 95;
	}
	,getVariableName: function(html,pos) {
		var name = null;
		if(HxOverrides.cca(html,pos) == 35) {
			var end = pos + 1;
			if(end < html.length) {
				var c = HxOverrides.cca(html,end);
				if(this.isQuizzesIdentifierStart(c)) {
					end++;
					while(end < html.length && this.isQuizzesIdentifierPart(HxOverrides.cca(html,end))) end++;
					name = HxOverrides.substr(html,pos + 1,end - (pos + 1));
				}
			}
		}
		return name;
	}
	,replaceVariablesInsideHTML: function(token,variables,type) {
		var mathml = type == com.wiris.quizzes.impl.MathContent.TYPE_MATHML;
		var text = type == com.wiris.quizzes.impl.MathContent.TYPE_TEXT;
		var image = type == com.wiris.quizzes.impl.MathContent.TYPE_IMAGE_REF;
		var keys = this.sortIterator(variables.keys());
		var j = keys.length - 1;
		while(j >= 0) {
			var name = keys[j];
			var placeholder = this.getPlaceHolder(name);
			var pos = 0;
			while((pos = token.indexOf(placeholder,pos)) != -1) {
				var v = this.variablePosition(token,pos);
				if((v == com.wiris.quizzes.impl.HTMLTools.POSITION_ALL || text && v == com.wiris.quizzes.impl.HTMLTools.POSITION_ONLY_TEXT || mathml && v == com.wiris.quizzes.impl.HTMLTools.POSITION_ONLY_MATHML) && name == this.getVariableName(token,pos)) {
					var value = variables.get(name);
					if(text) value = com.wiris.util.xml.WXmlUtils.htmlEscape(value); else if(mathml) {
						value = this.addMathTag(value);
						value = this.extractTextFromMathML(value);
					} else if(image) value = this.addImageTag(value);
					token = HxOverrides.substr(token,0,pos) + value + HxOverrides.substr(token,pos + placeholder.length,null);
					pos += value.length;
				} else pos++;
			}
			j--;
		}
		return token;
	}
	,replaceMathMLVariablesInsideMathML: function(formula,variables) {
		var keys = this.sortIterator(variables.keys());
		var j = keys.length - 1;
		while(j >= 0) {
			var name = keys[j];
			var placeholder = this.getPlaceHolder(name);
			var pos = 0;
			while((pos = formula.indexOf(placeholder,pos)) != -1) {
				if(this.variablePosition(formula,pos) >= 2) {
					var value = this.toSubFormula(variables.get(name));
					var splittag = false;
					var formula1 = HxOverrides.substr(formula,0,pos);
					var formula2 = HxOverrides.substr(formula,pos + placeholder.length,null);
					var openTag1 = formula1.lastIndexOf("<");
					var closeTag1 = formula1.lastIndexOf(">");
					var openTag2 = formula2.indexOf("<");
					var closeTag2 = formula2.indexOf(">");
					var after = "";
					var before = "";
					if(closeTag1 + 1 < formula1.length) {
						splittag = true;
						var closeTag = HxOverrides.substr(formula2,openTag2,closeTag2 - openTag2 + 1);
						before = HxOverrides.substr(formula1,openTag1,null) + closeTag;
					}
					if(openTag2 > 0) {
						splittag = true;
						var openTag = HxOverrides.substr(formula1,openTag1,closeTag1 - openTag1 + 1);
						after = openTag + HxOverrides.substr(formula2,0,closeTag2 + 1);
					}
					formula1 = HxOverrides.substr(formula1,0,openTag1);
					formula2 = HxOverrides.substr(formula2,closeTag2 + 1,null);
					if(splittag) formula = formula1 + "<mrow>" + before + value + after + "</mrow>" + formula2; else formula = formula1 + value + formula2;
				}
				pos++;
			}
			j--;
		}
		return formula;
	}
	,splitHTMLbyMathML: function(html) {
		var tokens = new Array();
		var start = 0;
		var end = 0;
		while((start = html.indexOf("<math",end)) != -1) {
			if(start - end > 0) tokens.push(HxOverrides.substr(html,end,start - end));
			var firstClose = html.indexOf(">",start);
			if(firstClose != -1 && HxOverrides.substr(html,firstClose - 1,1) == "/") end = firstClose + 1; else end = html.indexOf("</math>",start) + "</math>".length;
			tokens.push(HxOverrides.substr(html,start,end - start));
		}
		if(end < html.length) tokens.push(HxOverrides.substr(html,end,null));
		return tokens;
	}
	,expandVariables: function(html,variables) {
		if(variables == null || html.indexOf("#") == -1) return html;
		var encoded = this.isMathMLEncoded(html);
		if(encoded) html = this.decodeMathML(html);
		html = this.prepareFormulas(html);
		var tokens = this.splitHTMLbyMathML(html);
		var sb = new StringBuf();
		var i;
		var _g1 = 0, _g = tokens.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var token = tokens[i1];
			var v;
			if(StringTools.startsWith(token,"<math")) {
				v = variables.get(com.wiris.quizzes.impl.MathContent.TYPE_MATHML);
				if(v != null) token = this.replaceMathMLVariablesInsideMathML(token,v);
				v = variables.get(com.wiris.quizzes.impl.MathContent.TYPE_TEXT);
				if(v != null) token = this.replaceMathMLVariablesInsideMathML(token,v);
			} else {
				v = variables.get(com.wiris.quizzes.impl.MathContent.TYPE_IMAGE_REF);
				if(v != null) token = this.replaceVariablesInsideHTML(token,v,com.wiris.quizzes.impl.MathContent.TYPE_IMAGE_REF);
				v = variables.get(com.wiris.quizzes.impl.MathContent.TYPE_MATHML);
				if(v != null) token = this.replaceVariablesInsideHTML(token,v,com.wiris.quizzes.impl.MathContent.TYPE_MATHML);
				v = variables.get(com.wiris.quizzes.impl.MathContent.TYPE_TEXT);
				if(v != null) token = this.replaceVariablesInsideHTML(token,v,com.wiris.quizzes.impl.MathContent.TYPE_TEXT);
			}
			sb.b += Std.string(token);
		}
		var result = sb.b;
		if(encoded) result = this.encodeMathML(result);
		return result;
	}
	,encodeMathML: function(html) {
		var opentag = "«";
		var closetag = "»";
		var quote = "¨";
		var amp = "§";
		var start;
		var end = 0;
		while((start = html.indexOf("<math",end)) != -1) {
			var closemath = "</math>";
			end = html.indexOf(closemath,start) + closemath.length;
			var formula = HxOverrides.substr(html,start,end - start);
			formula = StringTools.replace(formula,"<",opentag);
			formula = StringTools.replace(formula,">",closetag);
			formula = StringTools.replace(formula,"\"",quote);
			formula = StringTools.replace(formula,"&",amp);
			html = HxOverrides.substr(html,0,start) + formula + HxOverrides.substr(html,end,null);
			end = start + formula.length;
		}
		return html;
	}
	,decodeMathML: function(html) {
		var opentag = "«";
		var closetag = "»";
		var quote = "¨";
		var amp = "§";
		var closemath = opentag + "/math" + closetag;
		var start;
		var end = 0;
		while((start = html.indexOf(opentag + "math",end)) != -1) {
			end = html.indexOf(closemath,start) + closemath.length;
			var formula = HxOverrides.substr(html,start,end - start);
			formula = com.wiris.util.xml.WXmlUtils.htmlUnescape(formula);
			formula = StringTools.replace(formula,opentag,"<");
			formula = StringTools.replace(formula,closetag,">");
			formula = StringTools.replace(formula,quote,"\"");
			formula = StringTools.replace(formula,amp,"&");
			html = HxOverrides.substr(html,0,start) + formula + HxOverrides.substr(html,end,null);
			end = start + formula.length;
		}
		return html;
	}
	,isMathMLEncoded: function(html) {
		var opentag = "«";
		return html.indexOf(opentag + "math") != -1;
	}
	,extractVariableNames: function(html) {
		if(this.isMathMLEncoded(html)) html = this.decodeMathML(html);
		html = this.prepareFormulas(html);
		var names = new Array();
		var start = 0;
		while((start = html.indexOf("#",start)) != -1) {
			if(this.variablePosition(html,start) > 0) {
				var name = this.getVariableName(html,start);
				com.wiris.quizzes.impl.HTMLTools.insertStringInSortedArray(name,names);
			}
			start++;
		}
		return com.wiris.quizzes.impl.HTMLTools.toNativeArray(names);
	}
	,__class__: com.wiris.quizzes.impl.HTMLTools
}
haxe.Http = $hxClasses["haxe.Http"] = function(url) {
	this.url = url;
	this.headers = new Hash();
	this.params = new Hash();
	this.async = true;
};
haxe.Http.__name__ = ["haxe","Http"];
haxe.Http.requestUrl = function(url) {
	var h = new haxe.Http(url);
	h.async = false;
	var r = null;
	h.onData = function(d) {
		r = d;
	};
	h.onError = function(e) {
		throw e;
	};
	h.request(false);
	return r;
}
haxe.Http.prototype = {
	onStatus: function(status) {
	}
	,onError: function(msg) {
	}
	,onData: function(data) {
	}
	,request: function(post) {
		var me = this;
		var r = new js.XMLHttpRequest();
		var onreadystatechange = function() {
			if(r.readyState != 4) return;
			var s = (function($this) {
				var $r;
				try {
					$r = r.status;
				} catch( e ) {
					$r = null;
				}
				return $r;
			}(this));
			if(s == undefined) s = null;
			if(s != null) me.onStatus(s);
			if(s != null && s >= 200 && s < 400) me.onData(r.responseText); else switch(s) {
			case null: case undefined:
				me.onError("Failed to connect or resolve host");
				break;
			case 12029:
				me.onError("Failed to connect to host");
				break;
			case 12007:
				me.onError("Unknown host");
				break;
			default:
				me.onError("Http Error #" + r.status);
			}
		};
		if(this.async) r.onreadystatechange = onreadystatechange;
		var uri = this.postData;
		if(uri != null) post = true; else {
			var $it0 = this.params.keys();
			while( $it0.hasNext() ) {
				var p = $it0.next();
				if(uri == null) uri = ""; else uri += "&";
				uri += StringTools.urlEncode(p) + "=" + StringTools.urlEncode(this.params.get(p));
			}
		}
		try {
			if(post) r.open("POST",this.url,this.async); else if(uri != null) {
				var question = this.url.split("?").length <= 1;
				r.open("GET",this.url + (question?"?":"&") + uri,this.async);
				uri = null;
			} else r.open("GET",this.url,this.async);
		} catch( e ) {
			this.onError(e.toString());
			return;
		}
		if(this.headers.get("Content-Type") == null && post && this.postData == null) r.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		var $it1 = this.headers.keys();
		while( $it1.hasNext() ) {
			var h = $it1.next();
			r.setRequestHeader(h,this.headers.get(h));
		}
		r.send(uri);
		if(!this.async) onreadystatechange();
	}
	,setPostData: function(data) {
		this.postData = data;
	}
	,setParameter: function(param,value) {
		this.params.set(param,value);
	}
	,setHeader: function(header,value) {
		this.headers.set(header,value);
	}
	,params: null
	,headers: null
	,postData: null
	,async: null
	,url: null
	,__class__: haxe.Http
}
com.wiris.quizzes.impl.HttpImpl = $hxClasses["com.wiris.quizzes.impl.HttpImpl"] = function(url,listener) {
	haxe.Http.call(this,url);
	this.listener = listener;
	var c = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration();
	this.async = false;
};
com.wiris.quizzes.impl.HttpImpl.__name__ = ["com","wiris","quizzes","impl","HttpImpl"];
com.wiris.quizzes.impl.HttpImpl.__super__ = haxe.Http;
com.wiris.quizzes.impl.HttpImpl.prototype = $extend(haxe.Http.prototype,{
	setAsync: function(async) {
		this.async = async;
	}
	,onError: function(msg) {
		this.listener.onError(msg);
	}
	,onData: function(data) {
		this.listener.onData(data);
	}
	,listener: null
	,__class__: com.wiris.quizzes.impl.HttpImpl
});
com.wiris.quizzes.impl.HttpListener = $hxClasses["com.wiris.quizzes.impl.HttpListener"] = function() { }
com.wiris.quizzes.impl.HttpListener.__name__ = ["com","wiris","quizzes","impl","HttpListener"];
com.wiris.quizzes.impl.HttpListener.prototype = {
	onError: null
	,onData: null
	,__class__: com.wiris.quizzes.impl.HttpListener
}
com.wiris.quizzes.impl.HttpSyncListener = $hxClasses["com.wiris.quizzes.impl.HttpSyncListener"] = function() {
};
com.wiris.quizzes.impl.HttpSyncListener.__name__ = ["com","wiris","quizzes","impl","HttpSyncListener"];
com.wiris.quizzes.impl.HttpSyncListener.__interfaces__ = [com.wiris.quizzes.impl.HttpListener];
com.wiris.quizzes.impl.HttpSyncListener.prototype = {
	getData: function() {
		return this.data;
	}
	,onError: function(error) {
		throw error;
	}
	,onData: function(data) {
		this.data = data;
	}
	,data: null
	,__class__: com.wiris.quizzes.impl.HttpSyncListener
}
com.wiris.quizzes.impl.HttpToQuizzesListener = $hxClasses["com.wiris.quizzes.impl.HttpToQuizzesListener"] = function(listener,mqr,service,async) {
	this.protocol = com.wiris.quizzes.impl.QuizzesServiceImpl.PROTOCOL_REST;
	this.listener = listener;
	this.service = service;
	this.mqr = mqr;
	this.async = async;
};
com.wiris.quizzes.impl.HttpToQuizzesListener.__name__ = ["com","wiris","quizzes","impl","HttpToQuizzesListener"];
com.wiris.quizzes.impl.HttpToQuizzesListener.__interfaces__ = [com.wiris.quizzes.impl.HttpListener];
com.wiris.quizzes.impl.HttpToQuizzesListener.prototype = {
	isCacheMiss: function(response) {
		return this.isFault(response) && StringTools.startsWith(this.getFaultMessage(response),"CACHEMISS");
	}
	,getFaultMessage: function(response) {
		if(this.protocol == com.wiris.quizzes.impl.QuizzesServiceImpl.PROTOCOL_REST) {
			var start = response.indexOf("<fault>") + 7;
			var end = response.indexOf("</fault>");
			var msg = HxOverrides.substr(response,start,end - start);
			return com.wiris.util.xml.WXmlUtils.htmlUnescape(msg);
		}
		return response;
	}
	,isFault: function(response) {
		if(this.protocol == com.wiris.quizzes.impl.QuizzesServiceImpl.PROTOCOL_REST) return response.indexOf("<fault>") != -1;
		return false;
	}
	,stripWebServiceEnvelope: function(data) {
		if(this.protocol == com.wiris.quizzes.impl.QuizzesServiceImpl.PROTOCOL_REST) {
			var startTagName = "doProcessQuestionsResponse";
			var start = data.indexOf("<" + startTagName + ">") + startTagName.length + 2;
			var end = data.indexOf("</" + startTagName + ">");
			data = HxOverrides.substr(data,start,end - start);
		}
		return data;
	}
	,onError: function(msg) {
		throw msg;
	}
	,onData: function(response) {
		if(this.isCacheMiss(response)) {
			this.service.callService(this.mqr,false,this.listener,this.async);
			return;
		}
		if(this.isFault(response)) throw "Remote exception: " + this.getFaultMessage(response);
		response = this.stripWebServiceEnvelope(response);
		var res = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().newMultipleResponseFromXml(response);
		var k;
		var _g1 = 0, _g = res.questionResponses.length;
		while(_g1 < _g) {
			var k1 = _g1++;
			var results = res.questionResponses[k1].results;
			if(results != null && results.length > 0) {
				var last = results[results.length - 1];
				if(js.Boot.__instanceof(last,com.wiris.quizzes.impl.ResultStoreQuestion)) {
					var rsq = js.Boot.__cast(last , com.wiris.quizzes.impl.ResultStoreQuestion);
					this.mqr.questionRequests[k1].question.setId(rsq.id);
					results.pop();
				}
			}
		}
		this.listener.onResponse(res);
	}
	,async: null
	,protocol: null
	,mqr: null
	,service: null
	,listener: null
	,__class__: com.wiris.quizzes.impl.HttpToQuizzesListener
}
com.wiris.quizzes.impl.LocalData = $hxClasses["com.wiris.quizzes.impl.LocalData"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.LocalData.__name__ = ["com","wiris","quizzes","impl","LocalData"];
com.wiris.quizzes.impl.LocalData.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.LocalData.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.LocalData();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.LocalData.tagName);
		this.name = s.attributeString("name",this.name,null);
		this.value = s.textContent(this.value);
		s.endTag();
	}
	,value: null
	,name: null
	,__class__: com.wiris.quizzes.impl.LocalData
});
com.wiris.quizzes.impl.MathMLFilter = $hxClasses["com.wiris.quizzes.impl.MathMLFilter"] = function() {
	if(com.wiris.settings.PlatformSettings.IS_FLASH || com.wiris.settings.PlatformSettings.IS_JAVASCRIPT) throw "MathFilter is only available in server technologies.";
};
com.wiris.quizzes.impl.MathMLFilter.__name__ = ["com","wiris","quizzes","impl","MathMLFilter"];
com.wiris.quizzes.impl.MathMLFilter.__interfaces__ = [com.wiris.quizzes.api.MathFilter];
com.wiris.quizzes.impl.MathMLFilter.prototype = {
	removeWirisPluginImages: function(html) {
		var start = 0;
		var end = 0;
		var sb = new StringBuf();
		while((start = html.indexOf("<img",end)) != -1) {
			sb.b += Std.string(HxOverrides.substr(html,end,start - end));
			end = html.indexOf("/>",start) + 2;
			var img = HxOverrides.substr(html,start,end - start);
			if(img.indexOf("class=\"Wirisformula\"") != -1) {
				var pos = img.indexOf("data-mathml");
				pos = img.indexOf("\"",pos) + 1;
				var endpos = img.indexOf("\"",pos);
				img = HxOverrides.substr(img,pos,endpos - pos);
			}
			sb.b += Std.string(img);
		}
		sb.b += Std.string(HxOverrides.substr(html,end,null));
		return sb.b;
	}
	,writeImage: function(mathml,s) {
		var listener = new com.wiris.quizzes.impl.HttpSyncListener();
		var h = new com.wiris.quizzes.impl.HttpImpl(com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.EDITOR_URL) + "/render",listener);
		h.setParameter("mml",mathml);
		h.request(true);
		var response = listener.getData();
		var b = haxe.io.Bytes.ofString(response);
		s.writeBinary(b.b);
	}
	,mathml2img: function(mathml) {
		var md5 = haxe.Md5.encode(mathml);
		var filename = md5 + ".png";
		var path = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.CACHE_DIR) + "/" + filename;
		var s = com.wiris.system.Storage.newStorage(path);
		if(!s.exists()) this.writeImage(mathml,s);
		var url = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL) + "?service=cache&amp;name=" + filename;
		return "<img src=\"" + url + "\" align=\"middle\" />";
	}
	,filter: function(html) {
		var h = new com.wiris.quizzes.impl.HTMLTools();
		html = this.removeWirisPluginImages(html);
		if(h.isMathMLEncoded(html)) html = h.decodeMathML(html);
		var sb = new StringBuf();
		var start = 0;
		var end = 0;
		while((start = html.indexOf("<math",end)) != -1) {
			sb.b += Std.string(HxOverrides.substr(html,end,start - end));
			end = html.indexOf("</math>",start) + 7;
			var mathml = HxOverrides.substr(html,start,end - start);
			var img = this.mathml2img(mathml);
			sb.b += Std.string(img);
		}
		sb.b += Std.string(HxOverrides.substr(html,end,null));
		return sb.b;
	}
	,__class__: com.wiris.quizzes.impl.MathMLFilter
}
com.wiris.quizzes.impl.MaxConnectionsHttpImpl = $hxClasses["com.wiris.quizzes.impl.MaxConnectionsHttpImpl"] = function(url,listener) {
	com.wiris.quizzes.impl.HttpImpl.call(this,url,listener);
	try {
		this.MAX_CONNECTIONS = Std.parseInt(com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.MAXCONNECTIONS));
	} catch( t ) {
		this.MAX_CONNECTIONS = 10;
	}
};
com.wiris.quizzes.impl.MaxConnectionsHttpImpl.__name__ = ["com","wiris","quizzes","impl","MaxConnectionsHttpImpl"];
com.wiris.quizzes.impl.MaxConnectionsHttpImpl.__super__ = com.wiris.quizzes.impl.HttpImpl;
com.wiris.quizzes.impl.MaxConnectionsHttpImpl.prototype = $extend(com.wiris.quizzes.impl.HttpImpl.prototype,{
	getConnectionSlot: function() {
		var p = new com.wiris.quizzes.impl.FilePersistentVariables();
		p.lockVariable(com.wiris.quizzes.impl.MaxConnectionsHttpImpl.DATA_KEY_MAX_CONNECTIONS);
		var data = p.getVariable(com.wiris.quizzes.impl.MaxConnectionsHttpImpl.DATA_KEY_MAX_CONNECTIONS);
		var connections = null;
		if(data != null) try {
			connections = js.Boot.__cast(haxe.Unserializer.run(data) , Array);
		} catch( t ) {
			connections = null;
		}
		if(connections == null) connections = new Array();
		while(connections.length > this.MAX_CONNECTIONS) HxOverrides.remove(connections,connections[connections.length - 1]);
		var n = js.Boot.__cast(Math.floor(haxe.Timer.stamp()) , Int);
		this.current = n;
		this.slot = -1;
		var i;
		var _g1 = 0, _g = connections.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var con = js.Boot.__cast(connections[i1] , Int);
			if(this.current - con > com.wiris.quizzes.impl.MaxConnectionsHttpImpl.CONNECTION_TIMEOUT || con > this.current + 1) {
				this.slot = i1;
				connections[i1] = this.current;
				break;
			}
		}
		if(this.slot == -1 && connections.length < this.MAX_CONNECTIONS) {
			this.slot = connections.length;
			connections.push(this.current);
		}
		if(this.slot != -1) {
			data = haxe.Serializer.run(connections);
			p.setVariable(com.wiris.quizzes.impl.MaxConnectionsHttpImpl.DATA_KEY_MAX_CONNECTIONS,data);
		}
		p.unlockVariable(com.wiris.quizzes.impl.MaxConnectionsHttpImpl.DATA_KEY_MAX_CONNECTIONS);
		return this.slot != -1;
	}
	,releaseConnectionSlot: function() {
		var p = new com.wiris.quizzes.impl.FilePersistentVariables();
		p.lockVariable(com.wiris.quizzes.impl.MaxConnectionsHttpImpl.DATA_KEY_MAX_CONNECTIONS);
		var data = p.getVariable(com.wiris.quizzes.impl.MaxConnectionsHttpImpl.DATA_KEY_MAX_CONNECTIONS);
		var connections = js.Boot.__cast(haxe.Unserializer.run(data) , Array);
		if(connections[this.slot] == this.current) {
			var n = 0;
			connections[this.slot] = n;
			data = haxe.Serializer.run(connections);
			p.setVariable(com.wiris.quizzes.impl.MaxConnectionsHttpImpl.DATA_KEY_MAX_CONNECTIONS,data);
		}
		p.unlockVariable(com.wiris.quizzes.impl.MaxConnectionsHttpImpl.DATA_KEY_MAX_CONNECTIONS);
	}
	,request: function(post) {
		if(this.MAX_CONNECTIONS == -1) com.wiris.quizzes.impl.HttpImpl.prototype.request.call(this,post); else if(this.getConnectionSlot()) {
			com.wiris.quizzes.impl.HttpImpl.prototype.request.call(this,post);
			this.releaseConnectionSlot();
		} else throw "Too many concurrent connections.";
	}
	,current: null
	,slot: null
	,MAX_CONNECTIONS: null
	,__class__: com.wiris.quizzes.impl.MaxConnectionsHttpImpl
});
com.wiris.quizzes.impl.MultipleQuestionRequest = $hxClasses["com.wiris.quizzes.impl.MultipleQuestionRequest"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.MultipleQuestionRequest.__name__ = ["com","wiris","quizzes","impl","MultipleQuestionRequest"];
com.wiris.quizzes.impl.MultipleQuestionRequest.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.MultipleQuestionRequest.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.MultipleQuestionRequest();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.MultipleQuestionRequest.tagName);
		this.questionRequests = s.serializeArray(this.questionRequests,com.wiris.quizzes.impl.QuestionRequestImpl.tagName);
		s.endTag();
	}
	,questionRequests: null
	,__class__: com.wiris.quizzes.impl.MultipleQuestionRequest
});
com.wiris.quizzes.impl.MultipleQuestionResponse = $hxClasses["com.wiris.quizzes.impl.MultipleQuestionResponse"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.MultipleQuestionResponse.__name__ = ["com","wiris","quizzes","impl","MultipleQuestionResponse"];
com.wiris.quizzes.impl.MultipleQuestionResponse.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.MultipleQuestionResponse.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.MultipleQuestionResponse();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.MultipleQuestionResponse.tagName);
		this.questionResponses = s.serializeArray(this.questionResponses,com.wiris.quizzes.impl.QuestionResponseImpl.tagName);
		s.endTag();
	}
	,questionResponses: null
	,__class__: com.wiris.quizzes.impl.MultipleQuestionResponse
});
com.wiris.quizzes.impl.Option = $hxClasses["com.wiris.quizzes.impl.Option"] = function() {
	com.wiris.quizzes.impl.MathContent.call(this);
};
com.wiris.quizzes.impl.Option.__name__ = ["com","wiris","quizzes","impl","Option"];
com.wiris.quizzes.impl.Option.__super__ = com.wiris.quizzes.impl.MathContent;
com.wiris.quizzes.impl.Option.prototype = $extend(com.wiris.quizzes.impl.MathContent.prototype,{
	onSerialize: function(s) {
		s.beginTag("option");
		this.name = s.attributeString("name",this.name,null);
		com.wiris.quizzes.impl.MathContent.prototype.onSerializeInner.call(this,s);
		s.endTag();
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.Option();
	}
	,name: null
	,__class__: com.wiris.quizzes.impl.Option
});
com.wiris.quizzes.impl.Process = $hxClasses["com.wiris.quizzes.impl.Process"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.Process.__name__ = ["com","wiris","quizzes","impl","Process"];
com.wiris.quizzes.impl.Process.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.Process.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.Process();
	}
	,onSerialize: function(s) {
	}
	,__class__: com.wiris.quizzes.impl.Process
});
com.wiris.quizzes.impl.ProcessGetCheckAssertions = $hxClasses["com.wiris.quizzes.impl.ProcessGetCheckAssertions"] = function() {
	com.wiris.quizzes.impl.Process.call(this);
};
com.wiris.quizzes.impl.ProcessGetCheckAssertions.__name__ = ["com","wiris","quizzes","impl","ProcessGetCheckAssertions"];
com.wiris.quizzes.impl.ProcessGetCheckAssertions.__super__ = com.wiris.quizzes.impl.Process;
com.wiris.quizzes.impl.ProcessGetCheckAssertions.prototype = $extend(com.wiris.quizzes.impl.Process.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.ProcessGetCheckAssertions();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.ProcessGetCheckAssertions.tagName);
		s.endTag();
	}
	,__class__: com.wiris.quizzes.impl.ProcessGetCheckAssertions
});
com.wiris.quizzes.impl.ProcessGetTranslation = $hxClasses["com.wiris.quizzes.impl.ProcessGetTranslation"] = function() {
	com.wiris.quizzes.impl.Process.call(this);
};
com.wiris.quizzes.impl.ProcessGetTranslation.__name__ = ["com","wiris","quizzes","impl","ProcessGetTranslation"];
com.wiris.quizzes.impl.ProcessGetTranslation.__super__ = com.wiris.quizzes.impl.Process;
com.wiris.quizzes.impl.ProcessGetTranslation.prototype = $extend(com.wiris.quizzes.impl.Process.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.ProcessGetTranslation();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.ProcessGetTranslation.tagName);
		this.lang = s.attributeString("lang",this.lang,null);
		s.endTag();
	}
	,lang: null
	,__class__: com.wiris.quizzes.impl.ProcessGetTranslation
});
com.wiris.quizzes.impl.ProcessGetVariables = $hxClasses["com.wiris.quizzes.impl.ProcessGetVariables"] = function() {
	com.wiris.quizzes.impl.Process.call(this);
};
com.wiris.quizzes.impl.ProcessGetVariables.__name__ = ["com","wiris","quizzes","impl","ProcessGetVariables"];
com.wiris.quizzes.impl.ProcessGetVariables.__super__ = com.wiris.quizzes.impl.Process;
com.wiris.quizzes.impl.ProcessGetVariables.prototype = $extend(com.wiris.quizzes.impl.Process.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.ProcessGetVariables();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.ProcessGetVariables.tagName);
		this.names = s.attributeString("names",this.names,null);
		this.type = s.attributeString("type",this.type,"mathml");
		s.endTag();
	}
	,type: null
	,names: null
	,__class__: com.wiris.quizzes.impl.ProcessGetVariables
});
com.wiris.quizzes.impl.ProcessStoreQuestion = $hxClasses["com.wiris.quizzes.impl.ProcessStoreQuestion"] = function() {
	com.wiris.quizzes.impl.Process.call(this);
};
com.wiris.quizzes.impl.ProcessStoreQuestion.__name__ = ["com","wiris","quizzes","impl","ProcessStoreQuestion"];
com.wiris.quizzes.impl.ProcessStoreQuestion.__super__ = com.wiris.quizzes.impl.Process;
com.wiris.quizzes.impl.ProcessStoreQuestion.prototype = $extend(com.wiris.quizzes.impl.Process.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.ProcessGetCheckAssertions();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.ProcessStoreQuestion.tagName);
		s.endTag();
	}
	,__class__: com.wiris.quizzes.impl.ProcessStoreQuestion
});
com.wiris.quizzes.impl.Property = $hxClasses["com.wiris.quizzes.impl.Property"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.Property.__name__ = ["com","wiris","quizzes","impl","Property"];
com.wiris.quizzes.impl.Property.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.Property.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.Property();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.Property.tagName);
		this.name = s.attributeString("name",this.name,null);
		this.value = s.textContent(this.value);
		s.endTag();
	}
	,value: null
	,name: null
	,__class__: com.wiris.quizzes.impl.Property
});
com.wiris.quizzes.impl.QuestionInternal = $hxClasses["com.wiris.quizzes.impl.QuestionInternal"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.QuestionInternal.__name__ = ["com","wiris","quizzes","impl","QuestionInternal"];
com.wiris.quizzes.impl.QuestionInternal.__interfaces__ = [com.wiris.quizzes.api.Question];
com.wiris.quizzes.impl.QuestionInternal.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.QuestionInternal.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	getAlgorithm: function() {
		return null;
	}
	,setAlgorithm: function(session) {
	}
	,getCorrectAnswer: function(index) {
		return null;
	}
	,setCorrectAnswer: function(index,answer) {
	}
	,setAnswerFieldType: function(type) {
	}
	,setOption: function(name,value) {
	}
	,addAssertion: function(name,correctAnswer,studentAnswer,parameters) {
	}
	,getStudentQuestion: function() {
		return null;
	}
	,hasId: function() {
		return false;
	}
	,setId: function(id) {
	}
	,getImpl: function() {
		return null;
	}
	,__class__: com.wiris.quizzes.impl.QuestionInternal
});
com.wiris.quizzes.impl.QuestionImpl = $hxClasses["com.wiris.quizzes.impl.QuestionImpl"] = function() {
	com.wiris.quizzes.impl.QuestionInternal.call(this);
};
com.wiris.quizzes.impl.QuestionImpl.__name__ = ["com","wiris","quizzes","impl","QuestionImpl"];
com.wiris.quizzes.impl.QuestionImpl.__interfaces__ = [com.wiris.quizzes.api.Question];
com.wiris.quizzes.impl.QuestionImpl.syntacticAssertionToURL = function(a) {
	var sb = new StringBuf();
	if(a.name == com.wiris.quizzes.impl.Assertion.SYNTAX_EXPRESSION) sb.b += Std.string("Expression"); else if(a.name == com.wiris.quizzes.impl.Assertion.SYNTAX_QUANTITY) sb.b += Std.string("Quantity"); else if(a.name == com.wiris.quizzes.impl.Assertion.SYNTAX_STRING) sb.b += Std.string("String"); else if(a.name == com.wiris.quizzes.impl.Assertion.SYNTAX_LIST) sb.b += Std.string("List");
	if(a.parameters != null && a.parameters.length > 0) {
		sb.b += Std.string("?");
		var i;
		var _g1 = 0, _g = a.parameters.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var p = a.parameters[i1];
			if(i1 > 0) sb.b += Std.string("&");
			sb.b += Std.string(StringTools.urlEncode(p.name));
			sb.b += Std.string("=");
			sb.b += Std.string(StringTools.urlEncode(p.content));
		}
	}
	return sb.b;
}
com.wiris.quizzes.impl.QuestionImpl.__super__ = com.wiris.quizzes.impl.QuestionInternal;
com.wiris.quizzes.impl.QuestionImpl.prototype = $extend(com.wiris.quizzes.impl.QuestionInternal.prototype,{
	getAlgorithm: function() {
		if(com.wiris.quizzes.impl.HTMLTools.emptyCasSession(this.wirisCasSession)) return null; else return this.wirisCasSession;
	}
	,setAlgorithm: function(session) {
		this.wirisCasSession = session;
	}
	,setAnswerFieldType: function(type) {
		if(com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_INLINE_EDITOR == type || com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT == type || com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_POPUP_EDITOR == type) this.setLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_INPUT_FIELD,type); else throw "Invalid type parameter.";
	}
	,importDeprecated: function() {
		if(this.assertions != null) {
			var i;
			var _g1 = 0, _g = this.assertions.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var a = this.assertions[i1];
				if(a.name == com.wiris.quizzes.impl.Assertion.EQUIVALENT_SET) {
					a.name = com.wiris.quizzes.impl.Assertion.EQUIVALENT_SYMBOLIC;
					a.setParam(com.wiris.quizzes.impl.Assertion.PARAM_ORDER_MATTERS,"false");
					a.setParam(com.wiris.quizzes.impl.Assertion.PARAM_REPETITION_MATTERS,"false");
				}
				if(a.name == com.wiris.quizzes.impl.Assertion.SYNTAX_LIST) {
					a.name = com.wiris.quizzes.impl.Assertion.EQUIVALENT_SYMBOLIC;
					a.setParam(com.wiris.quizzes.impl.Assertion.PARAM_NO_BRACKETS_LIST,"true");
				}
			}
		}
	}
	,isDeprecated: function() {
		if(this.assertions != null) {
			var i;
			var _g1 = 0, _g = this.assertions.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var a = this.assertions[i1];
				if(a.name == com.wiris.quizzes.impl.Assertion.EQUIVALENT_SET || a.name == com.wiris.quizzes.impl.Assertion.SYNTAX_LIST) return true;
			}
		}
		return false;
	}
	,getImpl: function() {
		return this;
	}
	,hasId: function() {
		return this.id != null && this.id.length > 0;
	}
	,getGrammarUrl: function(studentAnswer) {
		var prefix = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.SERVICE_URL);
		prefix += "/grammar/";
		var i;
		if(this.assertions != null) {
			var _g1 = 0, _g = this.assertions.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var a = this.assertions[i1];
				if(a.getAnswer() == studentAnswer && a.isSyntactic()) return prefix + com.wiris.quizzes.impl.QuestionImpl.syntacticAssertionToURL(a);
			}
		}
		return prefix + "Expression";
	}
	,addAssertion: function(name,correctAnswer,studentAnswer,parameters) {
		this.setParametrizedAssertion(name,correctAnswer,studentAnswer,parameters);
	}
	,isEquivalent: function(q) {
		var te = com.wiris.quizzes.impl.HTMLTools.emptyCasSession(this.wirisCasSession);
		var qe = com.wiris.quizzes.impl.HTMLTools.emptyCasSession(q.wirisCasSession);
		if(te && !qe || !te && qe) return false; else if(!te && !qe && !(this.wirisCasSession == q.wirisCasSession)) return false;
		if(this.correctAnswers != null && q.correctAnswers != null) {
			if(this.correctAnswers.length != q.correctAnswers.length) return false;
			var i;
			var _g1 = 0, _g = this.correctAnswers.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var tca = this.correctAnswers[i1];
				var qca = q.correctAnswers[i1];
				if(tca.id != qca.id) return false;
				if(!(tca.content == qca.content)) return false;
			}
		}
		if(this.assertions != null && q.assertions != null) {
			if(this.assertions.length != q.assertions.length) return false;
			var i;
			var _g1 = 0, _g = this.assertions.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var ta = this.assertions[i1];
				var qa = q.assertions[i1];
				if(ta.getCorrectAnswer() != qa.getCorrectAnswer() || ta.getAnswer() != qa.getAnswer() || !(ta.name == qa.name)) return false;
				if(ta.parameters == null && qa.parameters != null || ta.parameters != null && qa.parameters == null) return false;
				if(ta.parameters != null && qa.parameters != null) {
					if(ta.parameters.length != qa.parameters.length) return false;
					var j;
					var _g3 = 0, _g2 = ta.parameters.length;
					while(_g3 < _g2) {
						var j1 = _g3++;
						var tp = ta.parameters[j1];
						var qp = qa.parameters[j1];
						if(tp.name != qp.name || tp.content != qp.content) return false;
					}
				}
			}
		}
		var k;
		var _g1 = 0, _g = com.wiris.quizzes.impl.Option.options.length;
		while(_g1 < _g) {
			var k1 = _g1++;
			var to = this.getOption(com.wiris.quizzes.impl.Option.options[k1]);
			var qo = q.getOption(com.wiris.quizzes.impl.Option.options[k1]);
			if(to == null && qo != null || to != null && qo == null || !(to == qo)) return false;
		}
		var _g1 = 0, _g = com.wiris.quizzes.impl.LocalData.keys.length;
		while(_g1 < _g) {
			var k1 = _g1++;
			var td = this.getLocalData(com.wiris.quizzes.impl.LocalData.keys[k1]);
			var qd = q.getLocalData(com.wiris.quizzes.impl.LocalData.keys[k1]);
			if(td == null && qd != null || td != null && qd == null || !(td == qd)) return false;
		}
		return true;
	}
	,update: function(response) {
		this.id = null;
		var qs = js.Boot.__cast(response , com.wiris.quizzes.impl.QuestionResponseImpl);
		if(qs != null && qs.results != null) {
			var i;
			var _g1 = 0, _g = qs.results.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var r = qs.results[i1];
				var s = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getSerializer();
				var tag = s.getTagName(r);
				if(tag == com.wiris.quizzes.impl.ResultGetTranslation.tagName) {
					var rgt = js.Boot.__cast(r , com.wiris.quizzes.impl.ResultGetTranslation);
					this.wirisCasSession = rgt.wirisCasSession;
				}
			}
		}
	}
	,hideCompoundAnswerAnswers: function(m) {
		var a = new com.wiris.quizzes.impl.MathContent();
		a.set(m);
		var c = com.wiris.quizzes.impl.HTMLTools.parseCompoundAnswer(a);
		var i;
		var _g1 = 0, _g = c.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			c[i1][1] = "<math></math>";
		}
		a = com.wiris.quizzes.impl.HTMLTools.joinCompoundAnswer(c);
		return a.content;
	}
	,getStudentQuestion: function() {
		var q = new com.wiris.quizzes.impl.QuestionImpl();
		q.id = this.id;
		var i;
		q.assertions = this.assertions;
		q.localData = this.localData;
		if(q.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER) == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE) {
			if(this.correctAnswers != null) {
				q.correctAnswers = new Array();
				var _g1 = 0, _g = this.correctAnswers.length;
				while(_g1 < _g) {
					var i1 = _g1++;
					var ca = this.correctAnswers[i1];
					var content = ca.content;
					if(ca.content != null && ca.content.length > 0) content = this.hideCompoundAnswerAnswers(ca.content);
					q.setCorrectAnswer(i1,content);
				}
			}
		}
		return q;
	}
	,defaultLocalData: function(name) {
		if(name == com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER) return com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_FALSE; else if(name == com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_INPUT_FIELD) return com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_INLINE_EDITOR; else if(name == com.wiris.quizzes.impl.LocalData.KEY_SHOW_CAS) return com.wiris.quizzes.impl.LocalData.VALUE_SHOW_CAS_FALSE; else if(name == com.wiris.quizzes.impl.LocalData.KEY_CAS_INITIAL_SESSION) return null; else if(name == com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE) return com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_AND; else if(name == com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTION) return null; else return null;
	}
	,getLocalData: function(name) {
		if(this.localData != null) {
			var i;
			var _g1 = 0, _g = this.localData.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				if(this.localData[i1].name == name) return this.localData[i1].value;
			}
		}
		return this.defaultLocalData(name);
	}
	,setLocalData: function(name,value) {
		this.id = null;
		if(this.localData == null) this.localData = new Array();
		var data = new com.wiris.quizzes.impl.LocalData();
		data.name = name;
		data.value = value;
		var i;
		var found = false;
		var _g1 = 0, _g = this.localData.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(this.localData[i1].name == name) {
				this.localData[i1] = data;
				found = true;
			}
		}
		if(!found) this.localData.push(data);
	}
	,getAssertionIndex: function(name,correctAnswer,userAnswer) {
		if(this.assertions == null) return -1;
		var i;
		var _g1 = 0, _g = this.assertions.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var a = this.assertions[i1];
			if(a.getCorrectAnswer() == correctAnswer && a.getAnswer() == userAnswer && a.name == name) return i1;
		}
		return -1;
	}
	,getCorrectAnswer: function(index) {
		if(this.correctAnswers != null && this.correctAnswers.length > index) {
			var a = this.correctAnswers[index];
			if(a != null) return a.content;
		}
		return null;
	}
	,setCorrectAnswer: function(index,content) {
		this.id = null;
		if(index < 0) throw "Invalid index: " + index;
		if(this.correctAnswers == null) this.correctAnswers = new Array();
		while(index >= this.correctAnswers.length) this.correctAnswers.push(new com.wiris.quizzes.impl.CorrectAnswer());
		var ca = this.correctAnswers[index];
		ca.id = index;
		ca.weight = 1.0;
		content = com.wiris.quizzes.impl.HTMLTools.convertEditor2Newlines(content);
		ca.set(content);
	}
	,defaultOption: function(name) {
		if(name == com.wiris.quizzes.impl.Option.OPTION_EXPONENTIAL_E) return "e"; else if(name == com.wiris.quizzes.impl.Option.OPTION_IMAGINARY_UNIT) return "i"; else if(name == com.wiris.quizzes.impl.Option.OPTION_IMPLICIT_TIMES_OPERATOR) return "false"; else if(name == com.wiris.quizzes.impl.Option.OPTION_NUMBER_PI) return com.wiris.system.Utf8.uchr(960); else if(name == com.wiris.quizzes.impl.Option.OPTION_PRECISION) return "4"; else if(name == com.wiris.quizzes.impl.Option.OPTION_RELATIVE_TOLERANCE) return "false"; else if(name == com.wiris.quizzes.impl.Option.OPTION_TIMES_OPERATOR) return com.wiris.system.Utf8.uchr(183); else if(name == com.wiris.quizzes.impl.Option.OPTION_TOLERANCE) return "10^(-4)"; else return null;
	}
	,removeCorrectAnswer: function(index) {
		HxOverrides.remove(this.correctAnswers,this.correctAnswers[index]);
		if(this.assertions != null) {
			var i = this.assertions.length - 1;
			while(i >= 0) {
				var a = this.assertions[i];
				var ca = a.getCorrectAnswer();
				if(ca == index) HxOverrides.remove(this.assertions,a); else if(ca > index) a.setCorrectAnswer(ca - 1);
				i--;
			}
		}
	}
	,removeLocalData: function(name) {
		this.id = null;
		if(this.localData != null) {
			var i = this.localData.length - 1;
			while(i >= 0) {
				if(this.localData[i].name == name) HxOverrides.remove(this.localData,this.localData[i]);
				i--;
			}
		}
	}
	,removeOption: function(name) {
		this.id = null;
		if(this.options != null) {
			var i = this.options.length - 1;
			while(i >= 0) {
				if(this.options[i].name == name) HxOverrides.remove(this.options,this.options[i]);
				i--;
			}
		}
	}
	,getOption: function(name) {
		if(this.options != null) {
			var i;
			var _g1 = 0, _g = this.options.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				if(this.options[i1].name == name) return this.options[i1].content;
			}
		}
		return this.defaultOption(name);
	}
	,setOption: function(name,value) {
		this.id = null;
		if(this.options == null) this.options = new Array();
		if(value == null) this.removeOption(name);
		var opt = new com.wiris.quizzes.impl.Option();
		opt.name = name;
		opt.content = value;
		opt.type = com.wiris.quizzes.impl.MathContent.TYPE_TEXT;
		var i;
		var found = false;
		var _g1 = 0, _g = this.options.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(this.options[i1].name == name) {
				this.options[i1] = opt;
				found = true;
			}
		}
		if(!found) this.options.push(opt);
	}
	,setParametrizedAssertion: function(name,correctAnswer,userAnswer,parameters) {
		this.id = null;
		if(this.assertions == null) this.assertions = new Array();
		var a = new com.wiris.quizzes.impl.Assertion();
		a.name = name;
		a.setCorrectAnswer(correctAnswer);
		a.setAnswer(userAnswer);
		var names = com.wiris.quizzes.impl.Assertion.getParameterNames(name);
		if(parameters != null && names != null) {
			a.parameters = new Array();
			var n = parameters.length < names.length?parameters.length:names.length;
			var i;
			var _g = 0;
			while(_g < n) {
				var i1 = _g++;
				var ap = new com.wiris.quizzes.impl.AssertionParam();
				ap.name = names[i1];
				ap.content = parameters[i1];
				ap.type = com.wiris.quizzes.impl.MathContent.TYPE_TEXT;
				a.parameters.push(ap);
			}
		}
		var index = this.getAssertionIndex(name,correctAnswer,userAnswer);
		if(index == -1) this.assertions.push(a); else this.assertions[index] = a;
	}
	,removeAssertion: function(name,correctAnswer,userAnswer) {
		this.id = null;
		if(this.assertions != null) {
			var i = this.assertions.length - 1;
			while(i >= 0) {
				var a = this.assertions[i];
				if(a.name == name && a.getCorrectAnswer() == correctAnswer && a.getAnswer() == userAnswer) HxOverrides.remove(this.assertions,a);
				i--;
			}
		}
	}
	,setAssertion: function(name,correctAnswer,userAnswer) {
		this.setParametrizedAssertion(name,correctAnswer,userAnswer,null);
	}
	,setId: function(id) {
		this.id = id;
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.QuestionImpl();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.QuestionImpl.tagName);
		this.id = s.cacheAttribute("id",this.id,null);
		this.wirisCasSession = s.childString("wirisCasSession",this.wirisCasSession,null);
		this.correctAnswers = s.serializeArrayName(this.correctAnswers,"correctAnswers");
		this.assertions = s.serializeArrayName(this.assertions,"assertions");
		this.options = s.serializeArrayName(this.options,"options");
		this.localData = s.serializeArrayName(this.localData,"localData");
		s.endTag();
	}
	,localData: null
	,options: null
	,assertions: null
	,correctAnswers: null
	,wirisCasSession: null
	,id: null
	,__class__: com.wiris.quizzes.impl.QuestionImpl
});
com.wiris.quizzes.impl.QuestionInstanceImpl = $hxClasses["com.wiris.quizzes.impl.QuestionInstanceImpl"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
	this.userData = new com.wiris.quizzes.impl.UserData();
	this.userData.randomSeed = Std.random(65536);
	this.variables = null;
	this.checks = null;
};
com.wiris.quizzes.impl.QuestionInstanceImpl.__name__ = ["com","wiris","quizzes","impl","QuestionInstanceImpl"];
com.wiris.quizzes.impl.QuestionInstanceImpl.__interfaces__ = [com.wiris.quizzes.api.QuestionInstance];
com.wiris.quizzes.impl.QuestionInstanceImpl.base64 = null;
com.wiris.quizzes.impl.QuestionInstanceImpl.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.QuestionInstanceImpl.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	areVariablesReady: function() {
		if(this.variables != null) {
			if(this.variables.exists(com.wiris.quizzes.impl.MathContent.TYPE_IMAGE_REF)) {
				var images = this.variables.get(com.wiris.quizzes.impl.MathContent.TYPE_IMAGE_REF);
				var names = images.keys();
				while(names.hasNext()) {
					var filename = images.get(names.next());
					var path = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.CACHE_DIR) + "/" + filename;
					var s = com.wiris.system.Storage.newStorage(path);
					if(!s.exists()) return false;
				}
			}
		}
		return true;
	}
	,getAssertionChecks: function(correctAnswer,studentAnswer) {
		if(this.checks != null) {
			var answerChecks = this.checks.get("" + studentAnswer);
			if(answerChecks != null) {
				var res = new Array();
				var i;
				var _g1 = 0, _g = answerChecks.length;
				while(_g1 < _g) {
					var i1 = _g1++;
					var ca = answerChecks[i1].getCorrectAnswers();
					var j;
					var _g3 = 0, _g2 = ca.length;
					while(_g3 < _g2) {
						var j1 = _g3++;
						if(ca[j1] == correctAnswer) res.push(answerChecks[i1]);
					}
				}
				return res;
			}
		}
		return null;
	}
	,getStudentAnswer: function(index) {
		if(this.userData.answers != null && index < this.userData.answers.length) {
			var a = this.userData.answers[index];
			if(a != null) return a.content;
		}
		return null;
	}
	,setStudentAnswer: function(index,answer) {
		this.userData.setUserAnswer(index,answer);
	}
	,setCasSession: function(session) {
		if(session != null && StringTools.trim(session).length > 0) this.setLocalData(com.wiris.quizzes.impl.LocalData.KEY_CAS_SESSION,session); else if(this.localData != null) {
			var i;
			var _g1 = 0, _g = this.localData.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				if(this.localData[i1].name == com.wiris.quizzes.impl.LocalData.KEY_CAS_SESSION) HxOverrides.remove(this.localData,this.localData[i1]);
			}
		}
	}
	,setRandomSeed: function(seed) {
		this.userData.randomSeed = seed;
	}
	,parseTextBoolean: function(text) {
		var trues = ["true","cierto","cert","tõene","ziur","vrai","wahr","vero","waar","verdadeiro","certo"];
		var i;
		var _g1 = 0, _g = trues.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(trues[i1] == text) return true;
		}
		return false;
	}
	,updateAnswer: function(qi) {
		var i;
		if(this.userData.answers == null) this.userData.answers = new Array();
		var _g1 = 0, _g = qi.userData.answers.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var a = qi.userData.answers[i1];
			if(this.userData.answers.length > i1) this.userData.answers[i1] = a; else this.userData.answers.push(a);
		}
		this.setLocalData(com.wiris.quizzes.impl.LocalData.KEY_CAS_SESSION,qi.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_CAS_SESSION));
	}
	,getStudentQuestionInstance: function() {
		var qi = new com.wiris.quizzes.impl.QuestionInstanceImpl();
		qi.userData.randomSeed = 0;
		qi.userData.answers = this.userData.answers;
		qi.localData = this.localData;
		qi.checks = this.checks;
		return qi;
	}
	,getBooleanVariableValue: function(name) {
		if(!this.hasVariables()) return false;
		name = StringTools.trim(name);
		if(StringTools.startsWith(name,"#")) name = HxOverrides.substr(name,1,null);
		if(this.variables.exists(com.wiris.quizzes.impl.MathContent.TYPE_TEXT)) {
			var textvars = this.variables.get(com.wiris.quizzes.impl.MathContent.TYPE_TEXT);
			if(textvars.exists(name)) {
				var textValue = textvars.get(name);
				return this.parseTextBoolean(textValue);
			}
		}
		if(this.variables.exists(com.wiris.quizzes.impl.MathContent.TYPE_MATHML)) {
			var mmlvars = this.variables.get(com.wiris.quizzes.impl.MathContent.TYPE_MATHML);
			if(mmlvars.exists(name)) {
				var mmlValue = mmlvars.get(name);
				var striptags = new EReg("<[^>]*>","");
				var textValue = striptags.replace(mmlValue,"");
				textValue = StringTools.trim(textValue);
				return this.parseTextBoolean(textValue);
			}
		}
		return false;
	}
	,hashToVariables: function(h,a) {
		if(h == null) return null;
		if(a == null) a = new Array();
		var t = h.keys();
		while(t.hasNext()) {
			var type = t.next();
			var vars = h.get(type);
			var names = vars.keys();
			while(names.hasNext()) {
				var name = names.next();
				var v = new com.wiris.quizzes.impl.Variable();
				v.type = type;
				v.name = name;
				v.content = vars.get(name);
				a.push(v);
			}
		}
		return a;
	}
	,variablesToHash: function(a,h) {
		if(a == null) return null;
		if(h == null) h = new Hash();
		var i;
		var _g1 = 0, _g = a.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var v = a[i1];
			if(!h.exists(v.type)) h.set(v.type,new Hash());
			h.get(v.type).set(v.name,v.content);
		}
		return h;
	}
	,hashToChecks: function(h,a) {
		if(h == null) return null;
		if(a == null) a = new Array();
		var answers = h.keys();
		while(answers.hasNext()) {
			var answer = answers.next();
			a = a.concat(h.get(answer));
		}
		return a;
	}
	,checksToHash: function(a,h) {
		if(a == null) return null;
		if(h == null) h = new Hash();
		var i;
		var _g1 = 0, _g = a.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var c = a[i1];
			if(!h.exists("" + c.getAnswer())) h.set("" + c.getAnswer(),new Array());
			var answerChecks = h.get("" + c.getAnswer());
			answerChecks.push(c);
		}
		return h;
	}
	,getAnswerFeedback: function(q,answer,lang,correct,incorrect,syntax,equivalent,check) {
		if(this.checks == null || !this.checks.exists(answer + "")) return null;
		var checks = this.checks.get(answer + "");
		var h = new com.wiris.quizzes.impl.HTMLGui(lang);
		var ass = new Array();
		var i;
		var _g1 = 0, _g = checks.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var c = checks[i1];
			if(correct && c.value == 1.0 || incorrect && c.value == 0.0) {
				if(syntax && StringTools.startsWith(c.assertion,"syntax_") || equivalent && StringTools.startsWith(c.assertion,"equivalent_") || check && StringTools.startsWith(c.assertion,"check_")) ass.push(c);
			}
		}
		var html = h.getAssertionFeedback(q,ass);
		return html;
	}
	,getMatchingChecks: function(correctAnswer,userAnswer) {
		var result = new Array();
		if(this.checks == null || !this.checks.exists(userAnswer + "")) return result;
		var checks = this.checks.get(userAnswer + "");
		var i;
		var eval = 0;
		var check = 0;
		var _g1 = 0, _g = checks.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(checks[i1].getCorrectAnswer() == correctAnswer) {
				var c = checks[i1];
				if(StringTools.startsWith(c.assertion,"syntax_")) {
					result.splice(eval,0,checks[i1]);
					eval++;
					check++;
				} else if(StringTools.startsWith(c.assertion,"equivalent_")) {
					result.splice(check,0,checks[i1]);
					check++;
				} else result.push(checks[i1]);
			}
		}
		return result;
	}
	,isAnswerSyntaxCorrect: function(answer) {
		var correct = true;
		if(this.checks != null && this.checks.exists(answer + "")) {
			var checks = this.checks.get(answer + "");
			var i;
			var _g1 = 0, _g = checks.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var ac = checks[i1];
				var j;
				var _g3 = 0, _g2 = com.wiris.quizzes.impl.Assertion.syntactic.length;
				while(_g3 < _g2) {
					var j1 = _g3++;
					if(ac.assertion == com.wiris.quizzes.impl.Assertion.syntactic[j1]) correct = correct && ac.value == 1.0;
				}
			}
		}
		return correct;
	}
	,getCompoundComponents: function() {
		var it = this.compoundChecks.keys();
		var n = -1;
		while(it.hasNext()) {
			var key = it.next();
			try {
				var m = Std.parseInt(key) % 1000;
				if(m > n) n = m;
			} catch( e ) {
			}
		}
		return n + 1;
	}
	,isNumberPart: function(c) {
		var parts = [".","-","0","1","2","3","4","5","6","7","8","9"];
		var i;
		var _g1 = 0, _g = parts.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(parts[i1] == c) return true;
		}
		return false;
	}
	,getCompoundGradeDistribution: function(s) {
		var n = this.getCompoundComponents();
		var d = new Array();
		if(s == null || StringTools.trim(s) == "") {
			var i;
			var _g = 0;
			while(_g < n) {
				var i1 = _g++;
				d[i1] = 1.0 / n;
			}
		} else {
			var content = false;
			var j = 0;
			var l = s.length;
			var i = 0;
			var sb = new StringBuf();
			while(i < l && j < n) {
				var c = com.wiris.system.Utf8.uchr(HxOverrides.cca(s,i));
				var digit = this.isNumberPart(c);
				if(digit) {
					sb.b += Std.string(c);
					content = true;
				}
				if(content && (!digit || i + 1 == l)) {
					var t = 0.0;
					try {
						t = Std.parseFloat(sb.b);
					} catch( e ) {
					}
					d[j] = t;
					j++;
					sb = new StringBuf();
					content = false;
				}
				i++;
			}
			while(j < n) {
				d[j] = 0.0;
				j++;
			}
			var sum = 0.0;
			var _g = 0;
			while(_g < n) {
				var j1 = _g++;
				sum += d[j1];
			}
			var _g = 0;
			while(_g < n) {
				var j1 = _g++;
				d[j1] = d[j1] / sum;
			}
		}
		return d;
	}
	,getAnswerGrade: function(correctAnswer,studentAnswer,q) {
		var grade = 0.0;
		var question = q != null?(js.Boot.__cast(q , com.wiris.quizzes.impl.QuestionInternal)).getImpl():null;
		if(question != null && question.getAssertionIndex(com.wiris.quizzes.impl.Assertion.EQUIVALENT_FUNCTION,correctAnswer,studentAnswer) != -1) {
			grade = 1.0;
			var checks = this.checks.get(studentAnswer + "");
			var i;
			var _g1 = 0, _g = checks.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				if(checks[i1].getCorrectAnswer() == correctAnswer) grade = grade * checks[i1].value;
			}
		} else if(question != null && question.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER) == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE && question.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE) == com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTE) {
			var distribution = this.getCompoundGradeDistribution(question.getLocalData(com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTION));
			var i;
			var _g1 = 0, _g = distribution.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var checks = this.compoundChecks.get(1000 + studentAnswer * 1000 + i1 + "").get(1000 + correctAnswer * 1000 + i1 + "");
				var j;
				var correct = true;
				var _g3 = 0, _g2 = checks.length;
				while(_g3 < _g2) {
					var j1 = _g3++;
					correct = correct && checks[j1].value == 1.0;
				}
				if(correct) grade += distribution[i1];
			}
		} else {
			var correct = this.isAnswerMatching(correctAnswer,studentAnswer);
			grade = correct?1.0:0.0;
		}
		return grade;
	}
	,isAnswerCorrect: function(answer) {
		var correct = true;
		if(this.checks != null && this.checks.exists(answer + "")) {
			var checks = this.checks.get(answer + "");
			var i;
			var _g1 = 0, _g = checks.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				correct = correct && checks[i1].value == 1.0;
			}
		}
		return correct;
	}
	,isAnswerMatching: function(correctAnswer,answer) {
		var correct = true;
		if(this.checks != null && this.checks.exists(answer + "")) {
			var checks = this.checks.get(answer + "");
			var i;
			var _g1 = 0, _g = checks.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var c = checks[i1];
				if(!(StringTools.startsWith(c.getAssertionName(),"syntax") && (c.getAnswers().length > 1 || c.getCorrectAnswers().length > 1))) {
					if(c.getCorrectAnswer() == correctAnswer) correct = correct && c.value == 1.0;
				}
			}
		}
		return correct;
	}
	,isCacheReady: function() {
		return this.areVariablesReady();
	}
	,hasEvaluation: function() {
		return this.checks != null && this.checks.keys().hasNext();
	}
	,hasVariables: function() {
		return this.variables != null && this.variables.keys().hasNext();
	}
	,clearChecks: function() {
		this.checks = null;
	}
	,clearVariables: function() {
		this.variables = null;
	}
	,getBase64Code: function() {
		if(com.wiris.quizzes.impl.QuestionInstanceImpl.base64 == null) com.wiris.quizzes.impl.QuestionInstanceImpl.base64 = new com.wiris.quizzes.impl.Base64();
		return com.wiris.quizzes.impl.QuestionInstanceImpl.base64;
	}
	,storeImageVariable: function(v) {
		var base64 = this.getBase64Code();
		var value = StringTools.replace(v.content,"=","");
		var b = base64.decodeBytes(haxe.io.Bytes.ofString(value));
		var filename = haxe.Md5.encode(value) + ".png";
		var path = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.CACHE_DIR) + "/" + filename;
		var s = com.wiris.system.Storage.newStorage(path);
		if(!s.exists()) s.writeBinary(b.b);
		var w = new com.wiris.quizzes.impl.Variable();
		w.type = com.wiris.quizzes.impl.MathContent.TYPE_IMAGE_REF;
		w.content = filename;
		w.name = v.name;
		return w;
	}
	,isCompoundAnswer: function(rgca) {
		if(rgca.checks != null && rgca.checks.length > 0) return rgca.checks[0].getCorrectAnswer() >= 1000;
		return false;
	}
	,collapseCompoundAnswerChecks: function(checks) {
		this.compoundChecks = new Hash();
		var i;
		var _g1 = 0, _g = checks.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var c = checks[i1];
			var answers = c.getAnswers();
			var j;
			var _g3 = 0, _g2 = answers.length;
			while(_g3 < _g2) {
				var j1 = _g3++;
				if(!this.compoundChecks.exists(answers[j1] + "")) this.compoundChecks.set(answers[j1] + "",new Hash());
				var answerChecks = this.compoundChecks.get(answers[j1] + "");
				var correctAnswers = c.getCorrectAnswers();
				var k;
				var _g5 = 0, _g4 = correctAnswers.length;
				while(_g5 < _g4) {
					var k1 = _g5++;
					if(!answerChecks.exists(correctAnswers[k1] + "")) answerChecks.set(correctAnswers[k1] + "",new Array());
					var pairchecks = answerChecks.get(correctAnswers[k1] + "");
					pairchecks.push(c);
				}
			}
			c.setAnswer(js.Boot.__cast(Math.floor((c.getAnswer() - 1000) / 1000.0) , Int));
			c.setCorrectAnswer(js.Boot.__cast(Math.floor((c.getCorrectAnswer() - 1000) / 1000.0) , Int));
		}
	}
	,update: function(response) {
		var qs = js.Boot.__cast(response , com.wiris.quizzes.impl.QuestionResponseImpl);
		if(qs != null && qs.results != null) {
			var variables = false;
			var checks = false;
			var i;
			var _g1 = 0, _g = qs.results.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				var r = qs.results[i1];
				var s = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getSerializer();
				var tag = s.getTagName(r);
				if(tag == com.wiris.quizzes.impl.ResultGetVariables.tagName) {
					if(!variables) {
						variables = true;
						this.variables = null;
					}
					var rgv = js.Boot.__cast(r , com.wiris.quizzes.impl.ResultGetVariables);
					var resultVars = rgv.variables;
					var j;
					var _g3 = 0, _g2 = resultVars.length;
					while(_g3 < _g2) {
						var j1 = _g3++;
						var v = resultVars[j1];
						if(v.type == com.wiris.quizzes.impl.MathContent.TYPE_IMAGE) resultVars[j1] = this.storeImageVariable(v);
					}
					this.variables = this.variablesToHash(rgv.variables,this.variables);
				} else if(tag == com.wiris.quizzes.impl.ResultGetCheckAssertions.tagName) {
					if(!checks) {
						checks = true;
						this.checks = null;
					}
					var rgca = js.Boot.__cast(r , com.wiris.quizzes.impl.ResultGetCheckAssertions);
					if(this.isCompoundAnswer(rgca)) this.collapseCompoundAnswerChecks(rgca.checks);
					this.checks = this.checksToHash(rgca.checks,this.checks);
				}
			}
		}
	}
	,expandVariablesText: function(text) {
		if(text == null) return null;
		var h = new com.wiris.quizzes.impl.HTMLTools();
		if(com.wiris.quizzes.impl.MathContent.getMathType(text) == com.wiris.quizzes.impl.MathContent.TYPE_MATHML) text = h.mathMLToText(text);
		if(this.variables == null || this.variables.get(com.wiris.quizzes.impl.MathContent.TYPE_TEXT) == null) return text; else {
			var textvars = new Hash();
			textvars.set(com.wiris.quizzes.impl.MathContent.TYPE_TEXT,this.variables.get(com.wiris.quizzes.impl.MathContent.TYPE_TEXT));
			return h.expandVariables(text,textvars);
		}
	}
	,expandVariablesMathML: function(equation) {
		var h = new com.wiris.quizzes.impl.HTMLTools();
		if(com.wiris.quizzes.impl.MathContent.getMathType(equation) == com.wiris.quizzes.impl.MathContent.TYPE_TEXT) equation = h.textToMathML(equation);
		return h.expandVariables(equation,this.variables);
	}
	,expandVariables: function(text) {
		if(text == null) return null;
		var h = new com.wiris.quizzes.impl.HTMLTools();
		return h.expandVariables(text,this.variables);
	}
	,defaultLocalData: function(name) {
		if(name == com.wiris.quizzes.impl.LocalData.KEY_CAS_SESSION) return null; else return null;
	}
	,getLocalData: function(name) {
		if(this.localData != null) {
			var i;
			var _g1 = 0, _g = this.localData.length;
			while(_g1 < _g) {
				var i1 = _g1++;
				if(this.localData[i1].name == name) return this.localData[i1].value;
			}
		}
		return this.defaultLocalData(name);
	}
	,setLocalData: function(name,value) {
		if(this.localData == null) this.localData = new Array();
		var data = new com.wiris.quizzes.impl.LocalData();
		data.name = name;
		data.value = value;
		var i;
		var found = false;
		var _g1 = 0, _g = this.localData.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(this.localData[i1].name == name) {
				this.localData[i1] = data;
				found = true;
			}
		}
		if(!found) this.localData.push(data);
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.QuestionInstanceImpl();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.QuestionInstanceImpl.tagName);
		this.userData = s.serializeChildName(this.userData,com.wiris.quizzes.impl.UserData.tagName);
		this.checks = this.checksToHash(s.serializeArrayName(this.hashToChecks(this.checks,null),"checks"),null);
		this.variables = this.variablesToHash(s.serializeArrayName(this.hashToVariables(this.variables,null),"variables"),null);
		this.localData = s.serializeArrayName(this.localData,"localData");
		s.endTag();
	}
	,compoundChecks: null
	,localData: null
	,checks: null
	,variables: null
	,userData: null
	,__class__: com.wiris.quizzes.impl.QuestionInstanceImpl
});
com.wiris.quizzes.impl.QuestionLazy = $hxClasses["com.wiris.quizzes.impl.QuestionLazy"] = function(xml) {
	com.wiris.quizzes.impl.QuestionInternal.call(this);
	var s = xml.indexOf("<question");
	if(s > 0) xml = HxOverrides.substr(xml,s,null);
	s = xml.lastIndexOf(">");
	if(s < xml.length - 1) xml = HxOverrides.substr(xml,0,s);
	s = xml.indexOf(">") + 1;
	var tag = HxOverrides.substr(xml,0,s);
	xml = HxOverrides.substr(xml,s,null);
	s = xml.lastIndexOf("<");
	if(s != -1) xml = HxOverrides.substr(xml,0,s);
	this.xml = xml;
	if(StringTools.startsWith(tag,"<question id")) {
		s = tag.indexOf("\"") + 1;
		var e = tag.indexOf("\"",s);
		this.id = HxOverrides.substr(tag,s,e - s);
	}
};
com.wiris.quizzes.impl.QuestionLazy.__name__ = ["com","wiris","quizzes","impl","QuestionLazy"];
com.wiris.quizzes.impl.QuestionLazy.__interfaces__ = [com.wiris.quizzes.api.Question];
com.wiris.quizzes.impl.QuestionLazy.__super__ = com.wiris.quizzes.impl.QuestionInternal;
com.wiris.quizzes.impl.QuestionLazy.prototype = $extend(com.wiris.quizzes.impl.QuestionInternal.prototype,{
	getImpl: function() {
		if(this.question == null) {
			var s = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getSerializer();
			var elem = s.read("<question>" + this.xml + "</question>");
			var tag = s.getTagName(elem);
			if(!(tag == "question")) throw "Unexpected root tag " + tag + ". Expected question.";
			this.question = js.Boot.__cast(elem , com.wiris.quizzes.impl.QuestionImpl);
			this.question.id = this.id;
		}
		return this.question;
	}
	,onSerialize: function(s) {
		if(this.question != null) this.question.onSerialize(s); else {
			s.beginTag("question");
			s.cacheAttribute("id",this.id,null);
			this.xml = s.rawXml(this.xml);
			s.endTag();
		}
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.QuestionImpl();
	}
	,setId: function(id) {
		if(this.question != null) this.question.setId(id); else this.id = id;
	}
	,hasId: function() {
		if(this.question != null) return this.question.hasId(); else return this.id != null;
	}
	,getAlgorithm: function() {
		return this.getImpl().getAlgorithm();
	}
	,setAlgorithm: function(session) {
		this.getImpl().setAlgorithm(session);
	}
	,getCorrectAnswer: function(index) {
		return this.getImpl().getCorrectAnswer(index);
	}
	,setCorrectAnswer: function(index,answer) {
		this.getImpl().setCorrectAnswer(index,answer);
	}
	,setAnswerFieldType: function(type) {
		this.getImpl().setAnswerFieldType(type);
	}
	,setOption: function(name,value) {
		this.getImpl().setOption(name,value);
	}
	,addAssertion: function(name,correctAnswer,studentAnswer,parameters) {
		this.getImpl().addAssertion(name,correctAnswer,studentAnswer,parameters);
	}
	,getStudentQuestion: function() {
		return this.getImpl().getStudentQuestion();
	}
	,question: null
	,id: null
	,xml: null
	,__class__: com.wiris.quizzes.impl.QuestionLazy
});
com.wiris.quizzes.impl.QuestionRequestImpl = $hxClasses["com.wiris.quizzes.impl.QuestionRequestImpl"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.QuestionRequestImpl.__name__ = ["com","wiris","quizzes","impl","QuestionRequestImpl"];
com.wiris.quizzes.impl.QuestionRequestImpl.__interfaces__ = [com.wiris.quizzes.api.QuestionRequest];
com.wiris.quizzes.impl.QuestionRequestImpl.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.QuestionRequestImpl.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	isEmpty: function() {
		return this.processes == null || this.processes.length == 0;
	}
	,addMetaProperty: function(name,value) {
		if(this.meta == null) this.meta = new Array();
		var p = new com.wiris.quizzes.impl.Property();
		p.name = name;
		p.value = value;
		this.meta.push(p);
	}
	,addProcess: function(p) {
		if(this.processes == null) this.processes = new Array();
		this.processes.push(p);
	}
	,variables: function(names,type) {
		var p = new com.wiris.quizzes.impl.ProcessGetVariables();
		var sb = new StringBuf();
		var i;
		var _g1 = 0, _g = names.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(i1 != 0) sb.b += Std.string(",");
			sb.b += Std.string(names[i1]);
		}
		p.names = sb.b;
		p.type = type;
		this.addProcess(p);
	}
	,checkAssertions: function() {
		var p = new com.wiris.quizzes.impl.ProcessGetCheckAssertions();
		this.addProcess(p);
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.QuestionRequestImpl();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.QuestionRequestImpl.tagName);
		this.question = s.serializeChildName(this.question,com.wiris.quizzes.impl.QuestionImpl.tagName);
		this.userData = s.serializeChildName(this.userData,com.wiris.quizzes.impl.UserData.tagName);
		this.processes = s.serializeArrayName(this.processes,"processes");
		this.meta = s.serializeArrayName(this.meta,"meta");
		s.endTag();
	}
	,meta: null
	,processes: null
	,userData: null
	,question: null
	,__class__: com.wiris.quizzes.impl.QuestionRequestImpl
});
com.wiris.quizzes.impl.QuestionResponseImpl = $hxClasses["com.wiris.quizzes.impl.QuestionResponseImpl"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.QuestionResponseImpl.__name__ = ["com","wiris","quizzes","impl","QuestionResponseImpl"];
com.wiris.quizzes.impl.QuestionResponseImpl.__interfaces__ = [com.wiris.quizzes.api.QuestionResponse];
com.wiris.quizzes.impl.QuestionResponseImpl.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.QuestionResponseImpl.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.QuestionResponseImpl();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.QuestionResponseImpl.tagName);
		this.results = s.serializeArray(this.results,null);
		s.endTag();
	}
	,results: null
	,__class__: com.wiris.quizzes.impl.QuestionResponseImpl
});
com.wiris.quizzes.impl.QuizzesServiceImpl = $hxClasses["com.wiris.quizzes.impl.QuizzesServiceImpl"] = function() {
	this.protocol = com.wiris.quizzes.impl.QuizzesServiceImpl.PROTOCOL_REST;
	this.url = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration().get(com.wiris.quizzes.api.ConfigurationKeys.SERVICE_URL);
};
com.wiris.quizzes.impl.QuizzesServiceImpl.__name__ = ["com","wiris","quizzes","impl","QuizzesServiceImpl"];
com.wiris.quizzes.impl.QuizzesServiceImpl.__interfaces__ = [com.wiris.quizzes.api.QuizzesService];
com.wiris.quizzes.impl.QuizzesServiceImpl.prototype = {
	getServiceUrl: function() {
		var url = this.url;
		if(this.protocol == com.wiris.quizzes.impl.QuizzesServiceImpl.PROTOCOL_REST) url += "/rest";
		return url;
	}
	,webServiceEnvelope: function(data) {
		if(this.protocol == com.wiris.quizzes.impl.QuizzesServiceImpl.PROTOCOL_REST) data = "<doProcessQuestions>" + data + "</doProcessQuestions>";
		return data;
	}
	,callService: function(mqr,cache,listener,async) {
		var s = new com.wiris.util.xml.XmlSerializer();
		s.setCached(cache);
		if(!cache && com.wiris.quizzes.impl.QuizzesServiceImpl.USE_CACHE) {
			var j;
			var _g1 = 0, _g = mqr.questionRequests.length;
			while(_g1 < _g) {
				var j1 = _g1++;
				mqr.questionRequests[j1].addProcess(new com.wiris.quizzes.impl.ProcessStoreQuestion());
			}
		}
		var postData = this.webServiceEnvelope(s.write(mqr));
		var http;
		var httpl = new com.wiris.quizzes.impl.HttpToQuizzesListener(listener,mqr,this,async);
		var config = com.wiris.quizzes.impl.QuizzesBuilderImpl.getInstance().getConfiguration();
		if(com.wiris.settings.PlatformSettings.IS_JAVASCRIPT || com.wiris.settings.PlatformSettings.IS_FLASH) {
			var url = config.get(com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL);
			http = new com.wiris.quizzes.impl.HttpImpl(url,httpl);
			http.setParameter("service","quizzes");
			http.setParameter("rawpostdata","true");
			http.setParameter("postdata",postData);
			http.setHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");
		} else {
			var url = this.getServiceUrl();
			http = new com.wiris.quizzes.impl.MaxConnectionsHttpImpl(url,httpl);
			http.setHeader("Content-Type","text/xml; charset=UTF-8");
			http.setHeader("Referer",config.get(com.wiris.quizzes.api.ConfigurationKeys.REFERER_URL));
			http.setPostData(postData);
		}
		http.setAsync(async);
		http.request(true);
	}
	,executeMultipleImpl: function(mqr,listener,async) {
		var cache = com.wiris.quizzes.impl.QuizzesServiceImpl.USE_CACHE;
		var i = 0;
		while(cache && i < mqr.questionRequests.length) {
			var q = mqr.questionRequests[i].question;
			cache = cache && q.hasId();
			i++;
		}
		this.callService(mqr,cache,listener,async);
	}
	,executeMultiple: function(mqr) {
		var listener = new com.wiris.quizzes.impl.QuizzesServiceSyncListener();
		this.executeMultipleImpl(mqr,listener,false);
		return listener.mqs;
	}
	,executeMultipleAsync: function(req,listener) {
		this.executeMultipleImpl(req,listener,true);
	}
	,singleResponse: function(mqs) {
		if(mqs.questionResponses.length == 0) return new com.wiris.quizzes.impl.QuestionResponseImpl(); else return mqs.questionResponses[0];
	}
	,multipleRequest: function(req) {
		var reqi = js.Boot.__cast(req , com.wiris.quizzes.impl.QuestionRequestImpl);
		var mqr = new com.wiris.quizzes.impl.MultipleQuestionRequest();
		mqr.questionRequests = new Array();
		mqr.questionRequests.push(reqi);
		return mqr;
	}
	,executeAsync: function(req,listener) {
		var mqr = this.multipleRequest(req);
		this.executeMultipleAsync(mqr,new com.wiris.quizzes.impl.QuizzesServiceSingleListener(listener));
	}
	,execute: function(req) {
		var mqr = this.multipleRequest(req);
		var mqs = this.executeMultiple(mqr);
		return this.singleResponse(mqs);
	}
	,protocol: null
	,url: null
	,__class__: com.wiris.quizzes.impl.QuizzesServiceImpl
}
com.wiris.quizzes.impl.QuizzesServiceMultipleListener = $hxClasses["com.wiris.quizzes.impl.QuizzesServiceMultipleListener"] = function() { }
com.wiris.quizzes.impl.QuizzesServiceMultipleListener.__name__ = ["com","wiris","quizzes","impl","QuizzesServiceMultipleListener"];
com.wiris.quizzes.impl.QuizzesServiceMultipleListener.prototype = {
	onResponse: null
	,__class__: com.wiris.quizzes.impl.QuizzesServiceMultipleListener
}
com.wiris.quizzes.impl.QuizzesServiceSingleListener = $hxClasses["com.wiris.quizzes.impl.QuizzesServiceSingleListener"] = function(listener) {
	this.listener = listener;
};
com.wiris.quizzes.impl.QuizzesServiceSingleListener.__name__ = ["com","wiris","quizzes","impl","QuizzesServiceSingleListener"];
com.wiris.quizzes.impl.QuizzesServiceSingleListener.__interfaces__ = [com.wiris.quizzes.impl.QuizzesServiceMultipleListener];
com.wiris.quizzes.impl.QuizzesServiceSingleListener.prototype = {
	onResponse: function(mqs) {
		var qs;
		if(mqs.questionResponses.length == 0) qs = new com.wiris.quizzes.impl.QuestionResponseImpl(); else qs = mqs.questionResponses[0];
		this.listener.onResponse(qs);
	}
	,listener: null
	,__class__: com.wiris.quizzes.impl.QuizzesServiceSingleListener
}
com.wiris.quizzes.impl.QuizzesServiceSyncListener = $hxClasses["com.wiris.quizzes.impl.QuizzesServiceSyncListener"] = function() {
};
com.wiris.quizzes.impl.QuizzesServiceSyncListener.__name__ = ["com","wiris","quizzes","impl","QuizzesServiceSyncListener"];
com.wiris.quizzes.impl.QuizzesServiceSyncListener.__interfaces__ = [com.wiris.quizzes.impl.QuizzesServiceMultipleListener];
com.wiris.quizzes.impl.QuizzesServiceSyncListener.prototype = {
	onResponse: function(mqs) {
		this.mqs = mqs;
	}
	,mqs: null
	,__class__: com.wiris.quizzes.impl.QuizzesServiceSyncListener
}
com.wiris.quizzes.impl.Result = $hxClasses["com.wiris.quizzes.impl.Result"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.Result.__name__ = ["com","wiris","quizzes","impl","Result"];
com.wiris.quizzes.impl.Result.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.Result.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	onSerializeInner: function(s) {
		this.errors = s.serializeArray(this.errors,com.wiris.quizzes.impl.ResultError.tagName);
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.Result();
	}
	,onSerialize: function(s) {
	}
	,errors: null
	,__class__: com.wiris.quizzes.impl.Result
});
com.wiris.quizzes.impl.ResultError = $hxClasses["com.wiris.quizzes.impl.ResultError"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.ResultError.__name__ = ["com","wiris","quizzes","impl","ResultError"];
com.wiris.quizzes.impl.ResultError.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.ResultError.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.ResultError.tagName);
		this.type = s.attributeString("type",this.type,null);
		this.id = s.attributeString("id",this.id,null);
		this.location = s.serializeChild(this.location);
		this.detail = s.childString("detail",this.detail,null);
		s.endTag();
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.ResultError();
	}
	,id: null
	,type: null
	,detail: null
	,location: null
	,__class__: com.wiris.quizzes.impl.ResultError
});
com.wiris.quizzes.impl.ResultErrorLocation = $hxClasses["com.wiris.quizzes.impl.ResultErrorLocation"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
	this.fromline = -1;
	this.toline = -1;
	this.fromcolumn = -1;
	this.tocolumn = -1;
};
com.wiris.quizzes.impl.ResultErrorLocation.__name__ = ["com","wiris","quizzes","impl","ResultErrorLocation"];
com.wiris.quizzes.impl.ResultErrorLocation.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.ResultErrorLocation.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.ResultErrorLocation.tagName);
		this.element = s.attributeString("element",this.element,null);
		this.elementid = s.attributeString("ref",this.elementid,null);
		this.fromline = s.attributeInt("fromline",this.fromline,-1);
		this.toline = s.attributeInt("toline",this.toline,-1);
		this.fromcolumn = s.attributeInt("fromcolumn",this.fromcolumn,-1);
		this.tocolumn = s.attributeInt("tocolumn",this.tocolumn,-1);
		s.endTag();
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.ResultErrorLocation();
	}
	,tocolumn: null
	,fromcolumn: null
	,toline: null
	,fromline: null
	,elementid: null
	,element: null
	,__class__: com.wiris.quizzes.impl.ResultErrorLocation
});
com.wiris.quizzes.impl.ResultGetCheckAssertions = $hxClasses["com.wiris.quizzes.impl.ResultGetCheckAssertions"] = function() {
	com.wiris.quizzes.impl.Result.call(this);
};
com.wiris.quizzes.impl.ResultGetCheckAssertions.__name__ = ["com","wiris","quizzes","impl","ResultGetCheckAssertions"];
com.wiris.quizzes.impl.ResultGetCheckAssertions.__super__ = com.wiris.quizzes.impl.Result;
com.wiris.quizzes.impl.ResultGetCheckAssertions.prototype = $extend(com.wiris.quizzes.impl.Result.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.ResultGetCheckAssertions();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.ResultGetCheckAssertions.tagName);
		this.onSerializeInner(s);
		this.checks = s.serializeArray(this.checks,com.wiris.quizzes.impl.AssertionCheckImpl.tagName);
		s.endTag();
	}
	,checks: null
	,__class__: com.wiris.quizzes.impl.ResultGetCheckAssertions
});
com.wiris.quizzes.impl.ResultGetTranslation = $hxClasses["com.wiris.quizzes.impl.ResultGetTranslation"] = function() {
	com.wiris.quizzes.impl.Result.call(this);
};
com.wiris.quizzes.impl.ResultGetTranslation.__name__ = ["com","wiris","quizzes","impl","ResultGetTranslation"];
com.wiris.quizzes.impl.ResultGetTranslation.__super__ = com.wiris.quizzes.impl.Result;
com.wiris.quizzes.impl.ResultGetTranslation.prototype = $extend(com.wiris.quizzes.impl.Result.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.ResultGetTranslation();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.ResultGetTranslation.tagName);
		this.onSerializeInner(s);
		this.wirisCasSession = s.childString("wirisCasSession",this.wirisCasSession,null);
		this.namechanges = s.serializeArray(this.namechanges,com.wiris.quizzes.impl.TranslationNameChange.tagName);
		s.endTag();
	}
	,namechanges: null
	,wirisCasSession: null
	,__class__: com.wiris.quizzes.impl.ResultGetTranslation
});
com.wiris.quizzes.impl.ResultGetVariables = $hxClasses["com.wiris.quizzes.impl.ResultGetVariables"] = function() {
	com.wiris.quizzes.impl.Result.call(this);
};
com.wiris.quizzes.impl.ResultGetVariables.__name__ = ["com","wiris","quizzes","impl","ResultGetVariables"];
com.wiris.quizzes.impl.ResultGetVariables.__super__ = com.wiris.quizzes.impl.Result;
com.wiris.quizzes.impl.ResultGetVariables.prototype = $extend(com.wiris.quizzes.impl.Result.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.ResultGetVariables();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.ResultGetVariables.tagName);
		this.onSerializeInner(s);
		this.variables = s.serializeArray(this.variables,com.wiris.quizzes.impl.Variable.tagName);
		s.endTag();
	}
	,variables: null
	,__class__: com.wiris.quizzes.impl.ResultGetVariables
});
com.wiris.quizzes.impl.ResultStoreQuestion = $hxClasses["com.wiris.quizzes.impl.ResultStoreQuestion"] = function() {
	com.wiris.quizzes.impl.Result.call(this);
};
com.wiris.quizzes.impl.ResultStoreQuestion.__name__ = ["com","wiris","quizzes","impl","ResultStoreQuestion"];
com.wiris.quizzes.impl.ResultStoreQuestion.__super__ = com.wiris.quizzes.impl.Result;
com.wiris.quizzes.impl.ResultStoreQuestion.prototype = $extend(com.wiris.quizzes.impl.Result.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.ResultStoreQuestion();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.ResultStoreQuestion.tagName);
		this.onSerializeInner(s);
		this.id = s.childString("id",this.id,null);
		s.endTag();
	}
	,id: null
	,__class__: com.wiris.quizzes.impl.ResultStoreQuestion
});
com.wiris.quizzes.impl.Strings = $hxClasses["com.wiris.quizzes.impl.Strings"] = function() { }
com.wiris.quizzes.impl.Strings.__name__ = ["com","wiris","quizzes","impl","Strings"];
com.wiris.quizzes.impl.TranslationNameChange = $hxClasses["com.wiris.quizzes.impl.TranslationNameChange"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
};
com.wiris.quizzes.impl.TranslationNameChange.__name__ = ["com","wiris","quizzes","impl","TranslationNameChange"];
com.wiris.quizzes.impl.TranslationNameChange.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.TranslationNameChange.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	newInstance: function() {
		return new com.wiris.quizzes.impl.TranslationNameChange();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.TranslationNameChange.tagName);
		this.newname = s.attributeString("new",this.newname,null);
		this.oldname = s.attributeString("old",this.oldname,null);
		s.endTag();
	}
	,newname: null
	,oldname: null
	,__class__: com.wiris.quizzes.impl.TranslationNameChange
});
com.wiris.quizzes.impl.Translator = $hxClasses["com.wiris.quizzes.impl.Translator"] = function(lang,source) {
	this.lang = lang;
	this.strings = new Hash();
	var i = 0;
	while(i < source.length && !(source[i][0] == "lang" && source[i][1] == lang)) i++;
	while(i < source.length && !(source[i][0] == "lang" && !(source[i][1] == lang))) {
		this.strings.set(source[i][0],source[i][1]);
		i++;
	}
};
com.wiris.quizzes.impl.Translator.__name__ = ["com","wiris","quizzes","impl","Translator"];
com.wiris.quizzes.impl.Translator.languages = null;
com.wiris.quizzes.impl.Translator.getInstance = function(lang) {
	if(com.wiris.quizzes.impl.Translator.languages == null) com.wiris.quizzes.impl.Translator.languages = new Hash();
	if(!com.wiris.quizzes.impl.Translator.languages.exists(lang)) {
		var translator = new com.wiris.quizzes.impl.Translator(lang,com.wiris.quizzes.impl.Strings.lang);
		if(!translator.strings.keys().hasNext() && !(lang == "en")) return com.wiris.quizzes.impl.Translator.getInstance("en");
		com.wiris.quizzes.impl.Translator.languages.set(lang,translator);
	}
	return com.wiris.quizzes.impl.Translator.languages.get(lang);
}
com.wiris.quizzes.impl.Translator.prototype = {
	t: function(code) {
		if(this.strings.exists(code)) code = this.strings.get(code); else if(!(this.lang == "en")) code = com.wiris.quizzes.impl.Translator.getInstance("en").t(code);
		return code;
	}
	,lang: null
	,strings: null
	,__class__: com.wiris.quizzes.impl.Translator
}
com.wiris.quizzes.impl.UserData = $hxClasses["com.wiris.quizzes.impl.UserData"] = function() {
	com.wiris.util.xml.SerializableImpl.call(this);
	this.randomSeed = -1;
};
com.wiris.quizzes.impl.UserData.__name__ = ["com","wiris","quizzes","impl","UserData"];
com.wiris.quizzes.impl.UserData.__super__ = com.wiris.util.xml.SerializableImpl;
com.wiris.quizzes.impl.UserData.prototype = $extend(com.wiris.util.xml.SerializableImpl.prototype,{
	ensureAnswerPlace: function(index) {
		if(index < 0) throw "Invalid index: " + index;
		if(this.answers == null) this.answers = new Array();
		while(this.answers.length <= index) this.answers.push(new com.wiris.quizzes.impl.Answer());
	}
	,getUserCompoundAnswer: function(index,compoundindex) {
		var a = this.answers[index];
		var compound = com.wiris.quizzes.impl.HTMLTools.parseCompoundAnswer(a);
		return compound[compoundindex][1];
	}
	,setUserCompoundAnswer: function(index,compoundindex,content) {
		this.ensureAnswerPlace(index);
		if(compoundindex < 0) throw "Invalid compound index: " + compoundindex;
		var a = this.answers[index];
		a.id = index;
		var compound;
		if(a.content == null || a.content.length == 0) compound = new Array(); else compound = com.wiris.quizzes.impl.HTMLTools.parseCompoundAnswer(a);
		var i = compound.length;
		while(i <= compoundindex) {
			compound[i] = ["<math><mo>=</mo></math>","<math></math>"];
			i++;
		}
		if(com.wiris.quizzes.impl.MathContent.getMathType(content) == com.wiris.quizzes.impl.MathContent.TYPE_TEXT) content = new com.wiris.quizzes.impl.HTMLTools().textToMathML(content);
		compound[compoundindex][1] = content;
		var m = com.wiris.quizzes.impl.HTMLTools.joinCompoundAnswer(compound);
		a.type = m.type;
		a.content = m.content;
	}
	,setUserAnswer: function(index,content) {
		this.ensureAnswerPlace(index);
		var a = this.answers[index];
		a.id = index;
		a.set(content);
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.UserData();
	}
	,onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.UserData.tagName);
		this.randomSeed = s.childInt("randomSeed",this.randomSeed,-1);
		this.answers = s.serializeArrayName(this.answers,"answers");
		s.endTag();
	}
	,answers: null
	,randomSeed: null
	,__class__: com.wiris.quizzes.impl.UserData
});
com.wiris.quizzes.impl.Variable = $hxClasses["com.wiris.quizzes.impl.Variable"] = function() {
	com.wiris.quizzes.impl.MathContent.call(this);
};
com.wiris.quizzes.impl.Variable.__name__ = ["com","wiris","quizzes","impl","Variable"];
com.wiris.quizzes.impl.Variable.__super__ = com.wiris.quizzes.impl.MathContent;
com.wiris.quizzes.impl.Variable.prototype = $extend(com.wiris.quizzes.impl.MathContent.prototype,{
	onSerialize: function(s) {
		s.beginTag(com.wiris.quizzes.impl.Variable.tagName);
		this.name = s.attributeString("name",this.name,null);
		this.onSerializeInner(s);
		s.endTag();
	}
	,newInstance: function() {
		return new com.wiris.quizzes.impl.Variable();
	}
	,name: null
	,__class__: com.wiris.quizzes.impl.Variable
});
if(!com.wiris.settings) com.wiris.settings = {}
com.wiris.settings.PlatformSettings = $hxClasses["com.wiris.settings.PlatformSettings"] = function() { }
com.wiris.settings.PlatformSettings.__name__ = ["com","wiris","settings","PlatformSettings"];
if(!com.wiris.std) com.wiris.std = {}
if(!com.wiris.std.system) com.wiris.std.system = {}
com.wiris.std.system.HttpProxy = $hxClasses["com.wiris.std.system.HttpProxy"] = function(host,port) {
	this.port = port;
	this.host = host;
	this.auth = null;
};
com.wiris.std.system.HttpProxy.__name__ = ["com","wiris","std","system","HttpProxy"];
com.wiris.std.system.HttpProxy.newHttpProxy = function(host,port,user,pass) {
	var proxy = new com.wiris.std.system.HttpProxy(host,port);
	var hpa = new com.wiris.std.system.HttpProxyAuth();
	hpa.user = user;
	hpa.pass = pass;
	proxy.auth = hpa;
	return proxy;
}
com.wiris.std.system.HttpProxy.prototype = {
	auth: null
	,host: null
	,port: null
	,__class__: com.wiris.std.system.HttpProxy
}
com.wiris.std.system.HttpProxyAuth = $hxClasses["com.wiris.std.system.HttpProxyAuth"] = function() {
};
com.wiris.std.system.HttpProxyAuth.__name__ = ["com","wiris","std","system","HttpProxyAuth"];
com.wiris.std.system.HttpProxyAuth.prototype = {
	pass: null
	,user: null
	,__class__: com.wiris.std.system.HttpProxyAuth
}
if(!com.wiris.system) com.wiris.system = {}
com.wiris.system.ArrayEx = $hxClasses["com.wiris.system.ArrayEx"] = function() { }
com.wiris.system.ArrayEx.__name__ = ["com","wiris","system","ArrayEx"];
com.wiris.system.ArrayEx.contains = function(a,b) {
	var _g = 0;
	while(_g < a.length) {
		var x = a[_g];
		++_g;
		if(x == b) return true;
	}
	return false;
}
com.wiris.system.FileLock = $hxClasses["com.wiris.system.FileLock"] = function(lh,filename) {
	this.lh = lh;
	this.filename = filename;
};
com.wiris.system.FileLock.__name__ = ["com","wiris","system","FileLock"];
com.wiris.system.FileLock.getLock = function(file) {
	return com.wiris.system.FileLock.getLockImpl(file,com.wiris.system.FileLock.TIMEOUT);
}
com.wiris.system.FileLock.getLockImpl = function(file,remaining) {
	var startwait = haxe.Timer.stamp();
	try {
	} catch( e ) {
		if(remaining < 0) throw e;
		var actualwait = js.Boot.__cast((haxe.Timer.stamp() - startwait) * 1000 , Int);
		return com.wiris.system.FileLock.getLockImpl(file,remaining - actualwait);
	}
	return new com.wiris.system.FileLock(null,null);
}
com.wiris.system.FileLock.prototype = {
	release: function() {
	}
	,filename: null
	,lh: null
	,__class__: com.wiris.system.FileLock
}
com.wiris.system.Storage = $hxClasses["com.wiris.system.Storage"] = function(location) {
	location = StringTools.replace(location,"/",com.wiris.system.Storage.getDirectorySeparator());
	location = StringTools.replace(location,"\\",com.wiris.system.Storage.getDirectorySeparator());
	this.location = location;
};
com.wiris.system.Storage.__name__ = ["com","wiris","system","Storage"];
com.wiris.system.Storage.directorySeparator = null;
com.wiris.system.Storage.resourcesDir = null;
com.wiris.system.Storage.newResourceStorage = function(name) {
	return new com.wiris.system.Storage(name);
}
com.wiris.system.Storage.newStorage = function(name) {
	return new com.wiris.system.Storage(name);
}
com.wiris.system.Storage.newStorageWithParent = function(parent,name) {
	return new com.wiris.system.Storage(parent.location + com.wiris.system.Storage.getDirectorySeparator() + name);
}
com.wiris.system.Storage.getResourcesDir = function() {
	if(com.wiris.system.Storage.resourcesDir == null) com.wiris.system.Storage.setResourcesDir();
	return com.wiris.system.Storage.resourcesDir;
}
com.wiris.system.Storage.setResourcesDir = function() {
	com.wiris.system.Storage.resourcesDir = ".";
}
com.wiris.system.Storage.getDirectorySeparator = function() {
	if(com.wiris.system.Storage.directorySeparator == null) com.wiris.system.Storage.setDirectorySeparator();
	return com.wiris.system.Storage.directorySeparator;
}
com.wiris.system.Storage.setDirectorySeparator = function() {
	var sep;
	sep = "/";
	com.wiris.system.Storage.directorySeparator = sep;
}
com.wiris.system.Storage.prototype = {
	toString: function() {
		return this.location;
	}
	,getParent: function() {
		var path = null;
		if(path == null) path = this.location;
		var index = path.lastIndexOf(com.wiris.system.Storage.getDirectorySeparator());
		path = index != -1?HxOverrides.substr(path,0,index):".";
		return new com.wiris.system.Storage(path);
	}
	,mkdirs: function() {
		throw "Not implemented!";
	}
	,exists: function() {
		var exists = false;
		var names = haxe.Resource.listNames();
		var i;
		var _g1 = 0, _g = names.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(names[i1] == this.location) {
				exists = true;
				break;
			}
		}
		return exists;
	}
	,read: function() {
		return haxe.io.Bytes.ofData(this.readBinary()).toString();
	}
	,readBinary: function() {
		var res = null;
		var bytes = haxe.Resource.getBytes(this.location);
		res = bytes.b;
		return res;
	}
	,write: function(s) {
		this.writeBinary(haxe.io.Bytes.ofString(s).b);
	}
	,writeBinary: function(bs) {
		throw "Not implemented!";
	}
	,location: null
	,__class__: com.wiris.system.Storage
}
com.wiris.system.StringEx = $hxClasses["com.wiris.system.StringEx"] = function() { }
com.wiris.system.StringEx.__name__ = ["com","wiris","system","StringEx"];
com.wiris.system.StringEx.substring = function(s,start,end) {
	if(end == null) return HxOverrides.substr(s,start,null);
	return HxOverrides.substr(s,start,end - start);
}
com.wiris.system.StringEx.compareTo = function(s1,s2) {
	if(s1 > s2) return 1;
	if(s1 < s2) return -1;
	return 0;
}
com.wiris.system.System = $hxClasses["com.wiris.system.System"] = function() { }
com.wiris.system.System.__name__ = ["com","wiris","system","System"];
com.wiris.system.System.arraycopy = function(src,srcPos,dest,destPos,n) {
	var _g = 0;
	while(_g < n) {
		var i = _g++;
		dest[destPos + i] = src[srcPos + i];
	}
}
com.wiris.system.Utf8 = $hxClasses["com.wiris.system.Utf8"] = function() {
};
com.wiris.system.Utf8.__name__ = ["com","wiris","system","Utf8"];
com.wiris.system.Utf8.getLength = function(s) {
	return s.length;
}
com.wiris.system.Utf8.charCodeAt = function(s,i) {
	return HxOverrides.cca(s,i);
}
com.wiris.system.Utf8.charAt = function(s,i) {
	return com.wiris.system.Utf8.uchr(HxOverrides.cca(s,i));
}
com.wiris.system.Utf8.uchr = function(i) {
	var s = new haxe.Utf8();
	s.__b += String.fromCharCode(i);
	return s.__b;
}
com.wiris.system.Utf8.sub = function(s,pos,len) {
	return HxOverrides.substr(s,pos,len);
}
com.wiris.system.Utf8.toBytes = function(s) {
	return haxe.io.Bytes.ofString(s).b;
}
com.wiris.system.Utf8.fromBytes = function(s) {
	var bs = haxe.io.Bytes.ofData(s);
	return bs.toString();
}
com.wiris.system.Utf8.prototype = {
	__class__: com.wiris.system.Utf8
}
if(!com.wiris.util.sys) com.wiris.util.sys = {}
com.wiris.util.sys.IniFile = $hxClasses["com.wiris.util.sys.IniFile"] = function() {
	this.props = new Hash();
};
com.wiris.util.sys.IniFile.__name__ = ["com","wiris","util","sys","IniFile"];
com.wiris.util.sys.IniFile.newIniFileFromFilename = function(path) {
	var ini = new com.wiris.util.sys.IniFile();
	ini.filename = path;
	ini.loadINI();
	return ini;
}
com.wiris.util.sys.IniFile.newIniFileFromString = function(inifile) {
	var ini = new com.wiris.util.sys.IniFile();
	ini.filename = "";
	ini.loadProperties(inifile);
	return ini;
}
com.wiris.util.sys.IniFile.propertiesToString = function(h) {
	var sb = new StringBuf();
	var iter = h.keys();
	var keys = new Array();
	while(iter.hasNext()) keys.push(iter.next());
	var i;
	var j;
	var n = keys.length;
	var _g = 0;
	while(_g < n) {
		var i1 = _g++;
		var _g1 = i1 + 1;
		while(_g1 < n) {
			var j1 = _g1++;
			var s1 = keys[i1];
			var s2 = keys[j1];
			if(com.wiris.util.sys.IniFile.compareStrings(s1,s2) > 0) {
				keys[i1] = s2;
				keys[j1] = s1;
			}
		}
	}
	var _g = 0;
	while(_g < n) {
		var i1 = _g++;
		var key = keys[i1];
		sb.b += Std.string(key);
		sb.b += Std.string("=");
		var value = h.get(key);
		value = StringTools.replace(value,"\\","\\\\");
		value = StringTools.replace(value,"\n","\\n");
		value = StringTools.replace(value,"\r","\\r");
		value = StringTools.replace(value,"\t","\\t");
		sb.b += Std.string(value);
		sb.b += Std.string("\n");
	}
	return sb.b;
}
com.wiris.util.sys.IniFile.compareStrings = function(a,b) {
	var i;
	var an = a.length;
	var bn = b.length;
	var n = an > bn?bn:an;
	var _g = 0;
	while(_g < n) {
		var i1 = _g++;
		var c = HxOverrides.cca(a,i1) - HxOverrides.cca(b,i1);
		if(c != 0) return c;
	}
	return a.length - b.length;
}
com.wiris.util.sys.IniFile.prototype = {
	loadProperties: function(file) {
		var start;
		var end = 0;
		var count = 1;
		while((start = file.indexOf("\n",end)) != -1) {
			var line = HxOverrides.substr(file,end,start - end);
			end = start + 1;
			this.loadPropertiesLine(line,count);
			count++;
		}
		if(end < file.length) {
			var line = HxOverrides.substr(file,end,null);
			this.loadPropertiesLine(line,count);
		}
	}
	,loadPropertiesLine: function(line,count) {
		line = StringTools.trim(line);
		if(line.length == 0) return;
		if(StringTools.startsWith(line,";") || StringTools.startsWith(line,"#")) return;
		var equals = line.indexOf("=");
		if(equals == -1) throw "Malformed INI file " + this.filename + " in line " + count + " no equal sign found.";
		var key = HxOverrides.substr(line,0,equals);
		key = StringTools.trim(key);
		var value = HxOverrides.substr(line,equals + 1,null);
		value = StringTools.trim(value);
		if(StringTools.startsWith(value,"\"") && StringTools.endsWith(value,"\"")) value = HxOverrides.substr(value,1,value.length - 2);
		var backslash = 0;
		while((backslash = value.indexOf("\\",backslash)) != -1) {
			if(value.length <= backslash + 1) continue;
			var letter = HxOverrides.substr(value,backslash + 1,1);
			if(letter == "n") letter = "\n"; else if(letter == "r") letter = "\r"; else if(letter == "t") letter = "\t";
			value = HxOverrides.substr(value,0,backslash) + letter + HxOverrides.substr(value,backslash + 2,null);
			backslash++;
		}
		this.props.set(key,value);
	}
	,loadINI: function() {
		var s = com.wiris.system.Storage.newStorage(this.filename);
		if(!s.exists()) s = com.wiris.system.Storage.newResourceStorage(this.filename);
		try {
			var file = s.read();
			if(file != null) this.loadProperties(file);
		} catch( e ) {
		}
	}
	,getProperties: function() {
		return this.props;
	}
	,props: null
	,filename: null
	,__class__: com.wiris.util.sys.IniFile
}
com.wiris.util.xml.WEntities = $hxClasses["com.wiris.util.xml.WEntities"] = function() { }
com.wiris.util.xml.WEntities.__name__ = ["com","wiris","util","xml","WEntities"];
com.wiris.util.xml.WXmlUtils = $hxClasses["com.wiris.util.xml.WXmlUtils"] = function() { }
com.wiris.util.xml.WXmlUtils.__name__ = ["com","wiris","util","xml","WXmlUtils"];
com.wiris.util.xml.WXmlUtils.getElementContent = function(element) {
	var sb = new StringBuf();
	if(element.nodeType == Xml.Document || element.nodeType == Xml.Element) {
		var i = element.iterator();
		while(i.hasNext()) sb.b += Std.string(i.next().toString());
	}
	return sb.b;
}
com.wiris.util.xml.WXmlUtils.getElementsByAttributeValue = function(nodeList,attributeName,attributeValue) {
	var nodes = new Array();
	while(nodeList.hasNext()) {
		var node = nodeList.next();
		if(node.nodeType == Xml.Element && attributeValue == com.wiris.util.xml.WXmlUtils.getAttribute(node,attributeName)) nodes.push(node);
	}
	return nodes;
}
com.wiris.util.xml.WXmlUtils.getElementsByTagName = function(nodeList,tagName) {
	var nodes = new Array();
	while(nodeList.hasNext()) {
		var node = nodeList.next();
		if(node.nodeType == Xml.Element && node.getNodeName() == tagName) nodes.push(node);
	}
	return nodes;
}
com.wiris.util.xml.WXmlUtils.getElements = function(node) {
	var nodes = new Array();
	var nodeList = node.iterator();
	while(nodeList.hasNext()) {
		var item = nodeList.next();
		if(item.nodeType == Xml.Element) nodes.push(item);
	}
	return nodes;
}
com.wiris.util.xml.WXmlUtils.getDocumentElement = function(doc) {
	var nodeList = doc.iterator();
	while(nodeList.hasNext()) {
		var node = nodeList.next();
		if(node.nodeType == Xml.Element) return node;
	}
	return null;
}
com.wiris.util.xml.WXmlUtils.getAttribute = function(node,attributeName) {
	var value = node.get(attributeName);
	if(value == null) return null;
	if(com.wiris.settings.PlatformSettings.PARSE_XML_ENTITIES) return com.wiris.util.xml.WXmlUtils.htmlUnescape(value);
	return value;
}
com.wiris.util.xml.WXmlUtils.setAttribute = function(node,name,value) {
	if(value != null && com.wiris.settings.PlatformSettings.PARSE_XML_ENTITIES) value = com.wiris.util.xml.WXmlUtils.htmlEscape(value);
	node.set(name,value);
}
com.wiris.util.xml.WXmlUtils.getNodeValue = function(node) {
	var value = node.getNodeValue();
	if(value == null) return null;
	if(com.wiris.settings.PlatformSettings.PARSE_XML_ENTITIES && node.nodeType == Xml.PCData) return com.wiris.util.xml.WXmlUtils.htmlUnescape(value);
	return value;
}
com.wiris.util.xml.WXmlUtils.createPCData = function(node,text) {
	if(com.wiris.settings.PlatformSettings.PARSE_XML_ENTITIES) text = com.wiris.util.xml.WXmlUtils.htmlEscape(text);
	return Xml.createPCData(text);
}
com.wiris.util.xml.WXmlUtils.htmlEscape = function(input) {
	var output = StringTools.replace(input,"&","&amp;");
	output = StringTools.replace(output,"<","&lt;");
	output = StringTools.replace(output,">","&gt;");
	output = StringTools.replace(output,"\"","&quot;");
	return output;
}
com.wiris.util.xml.WXmlUtils.htmlUnescape = function(input) {
	var output = "";
	var start = 0;
	var position = input.indexOf("&",start);
	while(position != -1) {
		output += HxOverrides.substr(input,start,position - start);
		if(input.charAt(position + 1) == "#") {
			var startPosition = position + 2;
			var endPosition = input.indexOf(";",startPosition);
			if(endPosition != -1) {
				var number = HxOverrides.substr(input,startPosition,endPosition - startPosition);
				if(StringTools.startsWith(number,"x")) number = "0" + number;
				var charCode = Std.parseInt(number);
				output += com.wiris.system.Utf8.uchr(charCode);
				start = endPosition + 1;
			} else {
				output += "&";
				start = position + 1;
			}
		} else {
			output += "&";
			start = position + 1;
		}
		position = input.indexOf("&",start);
	}
	output += HxOverrides.substr(input,start,input.length - start);
	output = StringTools.replace(output,"&lt;","<");
	output = StringTools.replace(output,"&gt;",">");
	output = StringTools.replace(output,"&quot;","\"");
	output = StringTools.replace(output,"&amp;","&");
	return output;
}
com.wiris.util.xml.WXmlUtils.entities = null;
com.wiris.util.xml.WXmlUtils.parseXML = function(xml) {
	xml = com.wiris.util.xml.WXmlUtils.filterMathMLEntities(xml);
	var x = Xml.parse(xml);
	return x;
}
com.wiris.util.xml.WXmlUtils.serializeXML = function(xml) {
	var s = xml.toString();
	s = com.wiris.util.xml.WXmlUtils.filterMathMLEntities(s);
	return s;
}
com.wiris.util.xml.WXmlUtils.filterMathMLEntities = function(text) {
	com.wiris.util.xml.WXmlUtils.initEntities();
	var sb = new StringBuf();
	var i = 0;
	var n = text.length;
	while(i < n) {
		var c = HxOverrides.cca(text,i);
		if(c == 60 && i + 12 < n && HxOverrides.cca(text,i + 1) == 33) {
			if(HxOverrides.substr(text,i,9) == "<![CDATA[") {
				var e = text.indexOf("]]>",i);
				if(e != -1) {
					sb.b += Std.string(HxOverrides.substr(text,i,e - i + 3));
					i = e + 3;
					continue;
				}
			}
		}
		if(c > 127) {
			var d = c;
			if(com.wiris.settings.PlatformSettings.UTF8_CONVERSION) {
				var j = 0;
				c = 128;
				do {
					c = c >> 1;
					j++;
				} while((d & c) != 0);
				d = c - 1 & d;
				while(--j > 0) {
					i++;
					c = HxOverrides.cca(text,i);
					d = (d << 6) + (c & 63);
				}
			}
			sb.b += Std.string("&#" + d + ";");
		} else {
			sb.b += String.fromCharCode(c);
			if(c == 38) {
				i++;
				c = HxOverrides.cca(text,i);
				if(com.wiris.util.xml.WXmlUtils.isNameStart(c)) {
					var name = new StringBuf();
					name.b += String.fromCharCode(c);
					i++;
					c = HxOverrides.cca(text,i);
					while(com.wiris.util.xml.WXmlUtils.isNameChar(c)) {
						name.b += String.fromCharCode(c);
						i++;
						c = HxOverrides.cca(text,i);
					}
					var ent = name.b;
					if(c == 59 && com.wiris.util.xml.WXmlUtils.entities.exists(ent)) {
						var val = com.wiris.util.xml.WXmlUtils.entities.get(ent);
						sb.b += Std.string("#");
						sb.b += Std.string(val);
					} else sb.b += Std.string(name);
				} else if(c == 35) {
					sb.b += String.fromCharCode(c);
					i++;
					c = HxOverrides.cca(text,i);
					if(c == 120) {
						var hex = new StringBuf();
						i++;
						c = HxOverrides.cca(text,i);
						while(com.wiris.util.xml.WXmlUtils.isHexDigit(c)) {
							hex.b += String.fromCharCode(c);
							i++;
							c = HxOverrides.cca(text,i);
						}
						var hent = hex.b;
						if(c == 59) {
							var dec = Std.parseInt("0x" + hent);
							sb.b += Std.string("" + dec);
						} else {
							sb.b += Std.string("x");
							sb.b += Std.string(hent);
						}
					}
				}
				sb.b += String.fromCharCode(c);
			}
		}
		i++;
	}
	return sb.b;
}
com.wiris.util.xml.WXmlUtils.isNameStart = function(c) {
	if(65 <= c && c <= 90) return true;
	if(97 <= c && c <= 122) return true;
	if(c == 95 || c == 58) return true;
	return false;
}
com.wiris.util.xml.WXmlUtils.isNameChar = function(c) {
	if(com.wiris.util.xml.WXmlUtils.isNameStart(c)) return true;
	if(48 <= c && c <= 57) return true;
	if(c == 46 || c == 45) return true;
	return false;
}
com.wiris.util.xml.WXmlUtils.isHexDigit = function(c) {
	if(c >= 48 && c <= 57) return true;
	if(c >= 65 && c <= 70) return true;
	if(c >= 97 && c <= 102) return true;
	return false;
}
com.wiris.util.xml.WXmlUtils.initEntities = function() {
	if(com.wiris.util.xml.WXmlUtils.entities == null) {
		var e = com.wiris.util.xml.WEntities.MATHML_ENTITIES;
		com.wiris.util.xml.WXmlUtils.entities = new Hash();
		var start = 0;
		var mid;
		while((mid = e.indexOf("@",start)) != -1) {
			var name = HxOverrides.substr(e,start,mid - start);
			mid++;
			start = e.indexOf("@",mid);
			if(start == -1) break;
			var value = HxOverrides.substr(e,mid,start - mid);
			var num = Std.parseInt("0x" + value);
			com.wiris.util.xml.WXmlUtils.entities.set(name,"" + num);
			start++;
		}
	}
}
com.wiris.util.xml.WXmlUtils.getText = function(xml) {
	if(xml.nodeType == Xml.PCData) return xml.getNodeValue();
	var r = "";
	var iter = xml.iterator();
	while(iter.hasNext()) r += com.wiris.util.xml.WXmlUtils.getText(iter.next());
	return r;
}
com.wiris.util.xml.WXmlUtils.copyXml = function(elem) {
	return com.wiris.util.xml.WXmlUtils.importXml(elem,elem);
}
com.wiris.util.xml.WXmlUtils.importXml = function(elem,model) {
	var n = null;
	if(elem.nodeType == Xml.Element) {
		n = Xml.createElement(elem.getNodeName());
		var keys = elem.attributes();
		while(keys.hasNext()) {
			var key = keys.next();
			n.set(key,elem.get(key));
		}
		var children = elem.iterator();
		while(children.hasNext()) n.addChild(com.wiris.util.xml.WXmlUtils.importXml(children.next(),model));
	} else if(elem.nodeType == Xml.Document) n = com.wiris.util.xml.WXmlUtils.importXml(elem.firstElement(),model); else if(elem.nodeType == Xml.CData) n = Xml.createCData(elem.getNodeValue()); else if(elem.nodeType == Xml.PCData) n = Xml.createPCData(elem.getNodeValue()); else throw "Unsupported node type: " + Std.string(elem.nodeType);
	return n;
}
com.wiris.util.xml.WXmlUtils.indentXml = function(xml,space) {
	var depth = 0;
	var opentag = new EReg("^<([\\w-_]+)[^>]*>$","");
	var autotag = new EReg("^<([\\w-_]+)[^>]*/>$","");
	var closetag = new EReg("^</([\\w-_]+)>$","");
	var res = new StringBuf();
	var end = 0;
	var start;
	var text;
	while(end < xml.length && (start = xml.indexOf("<",end)) != -1) {
		text = start > end;
		if(text) res.b += Std.string(HxOverrides.substr(xml,end,start - end));
		end = xml.indexOf(">",start) + 1;
		var aux = HxOverrides.substr(xml,start,end - start);
		if(autotag.match(aux)) {
			res.b += Std.string("\n");
			var i;
			var _g = 0;
			while(_g < depth) {
				var i1 = _g++;
				res.b += Std.string(space);
			}
			res.b += Std.string(aux);
		} else if(opentag.match(aux)) {
			res.b += Std.string("\n");
			var i;
			var _g = 0;
			while(_g < depth) {
				var i1 = _g++;
				res.b += Std.string(space);
			}
			res.b += Std.string(aux);
			depth++;
		} else if(closetag.match(aux)) {
			depth--;
			if(!text) {
				res.b += Std.string("\n");
				var i;
				var _g = 0;
				while(_g < depth) {
					var i1 = _g++;
					res.b += Std.string(space);
				}
			}
			res.b += Std.string(aux);
		} else {
			haxe.Log.trace("WARNING! malformed XML at character " + end + ":" + xml,{ fileName : "WXmlUtils.hx", lineNumber : 498, className : "com.wiris.util.xml.WXmlUtils", methodName : "indentXml"});
			res.b += Std.string(aux);
		}
	}
	return StringTools.trim(res.b);
}
com.wiris.util.xml.XmlSerializer = $hxClasses["com.wiris.util.xml.XmlSerializer"] = function() {
	this.tags = new Hash();
	this.elementStack = new Array();
	this.childrenStack = new Array();
	this.childStack = new Array();
	this.cacheTagStackCount = 0;
	this.ignoreTagStackCount = 0;
};
com.wiris.util.xml.XmlSerializer.__name__ = ["com","wiris","util","xml","XmlSerializer"];
com.wiris.util.xml.XmlSerializer.getXmlTextContent = function(element) {
	if(element.nodeType == Xml.CData || element.nodeType == Xml.PCData) return com.wiris.util.xml.WXmlUtils.getNodeValue(element); else if(element.nodeType == Xml.Document || element.nodeType == Xml.Element) {
		var sb = new StringBuf();
		var children = element.iterator();
		while(children.hasNext()) sb.b += Std.string(com.wiris.util.xml.XmlSerializer.getXmlTextContent(children.next()));
		return sb.b;
	} else return "";
}
com.wiris.util.xml.XmlSerializer.parseBoolean = function(s) {
	return s.toLowerCase() == "true" || s == "1";
}
com.wiris.util.xml.XmlSerializer.booleanToString = function(b) {
	return b?"true":"false";
}
com.wiris.util.xml.XmlSerializer.compareStrings = function(a,b) {
	var i;
	var an = a.length;
	var bn = b.length;
	var n = an > bn?bn:an;
	var _g = 0;
	while(_g < n) {
		var i1 = _g++;
		var c = HxOverrides.cca(a,i1) - HxOverrides.cca(b,i1);
		if(c != 0) return c;
	}
	return a.length - b.length;
}
com.wiris.util.xml.XmlSerializer.prototype = {
	isIgnoreTag: function(s) {
		if(this.ignore != null) {
			var i = HxOverrides.iter(this.ignore);
			while(i.hasNext()) if(i.next() == s) return true;
		}
		return false;
	}
	,setIgnoreTags: function(ignore) {
		this.ignore = ignore;
	}
	,serializeXml: function(tag,elem) {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) {
			if(tag == null || this.currentChild() != null && this.currentChild().getNodeName() == tag) {
				elem = this.currentChild();
				this.nextChild();
			}
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE) {
			if(elem != null) {
				var imported = com.wiris.util.xml.WXmlUtils.importXml(elem,this.element);
				this.element.addChild(imported);
			}
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_REGISTER) this.beginTag(tag);
		return elem;
	}
	,getMainTag: function(xml) {
		var i = 0;
		var c;
		do {
			i = xml.indexOf("<",i);
			i++;
			c = HxOverrides.cca(xml,i);
		} while(c != 33 && c != 63);
		var end = [">"," ","/"];
		var j;
		var min = 0;
		var _g1 = 0, _g = end.length;
		while(_g1 < _g) {
			var j1 = _g1++;
			var n = xml.indexOf(end[j1]);
			if(n != -1 && n < min) n = min;
		}
		return HxOverrides.substr(xml,i,min);
	}
	,endCache: function() {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_CACHE) this.mode = com.wiris.util.xml.XmlSerializer.MODE_WRITE;
	}
	,beginCache: function() {
		if(this.cache && this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE) this.mode = com.wiris.util.xml.XmlSerializer.MODE_CACHE;
	}
	,setCached: function(cache) {
		this.cache = cache;
	}
	,childInt: function(name,value,def) {
		return Std.parseInt(this.childString(name,"" + value,"" + def));
	}
	,childString: function(name,value,def) {
		if(!(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE && (value == null && def == null || value != null && value == def))) {
			if(this.beginTag(name)) {
				value = this.textContent(value);
				this.endTag();
			}
		}
		return value;
	}
	,popState: function() {
		this.element = this.elementStack.pop();
		this.children = this.childrenStack.pop();
		this.child = this.childStack.pop();
	}
	,pushState: function() {
		this.elementStack.push(this.element);
		this.childrenStack.push(this.children);
		this.childStack.push(this.child);
	}
	,currentChild: function() {
		if(this.child == null && this.children.hasNext()) this.child = this.children.next();
		return this.child;
	}
	,nextChild: function() {
		if(this.children.hasNext()) this.child = this.children.next(); else this.child = null;
		return this.child;
	}
	,setCurrentElement: function(element) {
		this.element = element;
		this.children = this.element.elements();
		this.child = null;
	}
	,readNodeModel: function(model) {
		var node = model.newInstance();
		node.onSerialize(this);
		return node;
	}
	,readNode: function() {
		if(!this.tags.exists(this.currentChild().getNodeName())) throw "Tag " + this.currentChild().getNodeName() + " not registered.";
		var model = this.tags.get(this.currentChild().getNodeName());
		return this.readNodeModel(model);
	}
	,getTagName: function(elem) {
		var mode = this.mode;
		this.mode = com.wiris.util.xml.XmlSerializer.MODE_REGISTER;
		this.currentTag = null;
		elem.onSerialize(this);
		this.mode = mode;
		return this.currentTag;
	}
	,register: function(elem) {
		this.tags.set(this.getTagName(elem),elem);
	}
	,serializeArrayName: function(array,tagName) {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) {
			if(this.beginTag(tagName)) {
				array = this.serializeArray(array,null);
				this.endTag();
			}
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE && array != null && array.length > 0) {
			var element = this.element;
			this.element = Xml.createElement(tagName);
			element.addChild(this.element);
			array = this.serializeArray(array,null);
			this.element = element;
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_REGISTER) this.beginTag(tagName);
		return array;
	}
	,serializeChildName: function(s,tagName) {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) {
			var child = this.currentChild();
			if(child != null && child.getNodeName() == tagName) s = this.serializeChild(s);
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE) s = this.serializeChild(s);
		return s;
	}
	,serializeArray: function(array,tagName) {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) {
			array = new Array();
			var child = this.currentChild();
			while(child != null && (tagName == null || tagName == child.getNodeName())) {
				var elem = this.readNode();
				array.push(elem);
				child = this.currentChild();
			}
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE && array != null && array.length > 0) {
			var items = HxOverrides.iter(array);
			while(items.hasNext()) (js.Boot.__cast(items.next() , com.wiris.util.xml.SerializableImpl)).onSerialize(this);
		}
		return array;
	}
	,serializeChild: function(s) {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) {
			var child = this.currentChild();
			if(child != null) s = this.readNode(); else s = null;
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE && s != null) (js.Boot.__cast(s , com.wiris.util.xml.SerializableImpl)).onSerialize(this);
		return s;
	}
	,floatContent: function(d) {
		return Std.parseFloat(this.textContent(d + ""));
	}
	,booleanContent: function(content) {
		return com.wiris.util.xml.XmlSerializer.parseBoolean(this.textContent(com.wiris.util.xml.XmlSerializer.booleanToString(content)));
	}
	,rawXml: function(xml) {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) throw "Should not use rawXml() function on read operation!"; else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE) {
			var raw = Xml.createElement("rawXml");
			raw.set("id","" + this.rawxmls.length);
			this.rawxmls.push(xml);
			this.element.addChild(raw);
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_REGISTER) this.currentTag = this.getMainTag(xml);
		return xml;
	}
	,base64Content: function(data) {
		var b64 = new haxe.BaseCode(haxe.io.Bytes.ofString("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/"));
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) {
			var content = this.textContent(null);
			data = b64.decodeBytes(haxe.io.Bytes.ofString(content));
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE) this.textContent(b64.encodeBytes(data).toString());
		return data;
	}
	,textContent: function(content) {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) content = com.wiris.util.xml.XmlSerializer.getXmlTextContent(this.element); else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE && content != null && this.ignoreTagStackCount == 0) {
			var textNode;
			if(content.length > 100 || StringTools.startsWith(content,"<") && StringTools.endsWith(content,">")) textNode = Xml.createCData(content); else textNode = com.wiris.util.xml.WXmlUtils.createPCData(this.element,content);
			this.element.addChild(textNode);
		}
		return content;
	}
	,attributeFloat: function(name,value,def) {
		return Std.parseFloat(this.attributeString(name,"" + value,"" + def));
	}
	,stringToArray: function(s) {
		if(s == null) return null;
		var ss = s.split(",");
		var a = new Array();
		var i;
		var _g1 = 0, _g = ss.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			a[i1] = Std.parseInt(ss[i1]);
		}
		return a;
	}
	,arrayToString: function(a) {
		if(a == null) return null;
		var sb = new StringBuf();
		var i;
		var _g1 = 0, _g = a.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			if(i1 != 0) sb.b += Std.string(",");
			sb.b += Std.string(a[i1] + "");
		}
		return sb.b;
	}
	,attributeIntArray: function(name,value,def) {
		return this.stringToArray(this.attributeString(name,this.arrayToString(value),this.arrayToString(def)));
	}
	,attributeInt: function(name,value,def) {
		return Std.parseInt(this.attributeString(name,"" + value,"" + def));
	}
	,attributeBoolean: function(name,value,def) {
		return com.wiris.util.xml.XmlSerializer.parseBoolean(this.attributeString(name,com.wiris.util.xml.XmlSerializer.booleanToString(value),com.wiris.util.xml.XmlSerializer.booleanToString(def)));
	}
	,cacheAttribute: function(name,value,def) {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE) {
			if(this.cache) {
				value = this.attributeString(name,value,def);
				this.mode = com.wiris.util.xml.XmlSerializer.MODE_CACHE;
				this.cacheTagStackCount = 0;
			}
		} else value = this.attributeString(name,value,def);
		return value;
	}
	,attributeString: function(name,value,def) {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) {
			value = com.wiris.util.xml.WXmlUtils.getAttribute(this.element,name);
			if(value == null) value = def;
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE) {
			if(value != null && !(value == def) && this.ignoreTagStackCount == 0) com.wiris.util.xml.WXmlUtils.setAttribute(this.element,name,value);
		}
		return value;
	}
	,endTag: function() {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) {
			this.element = this.element.getParent();
			this.popState();
			this.nextChild();
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE) {
			if(this.ignoreTagStackCount > 0) this.ignoreTagStackCount--; else this.element = this.element.getParent();
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_CACHE) {
			if(this.cacheTagStackCount > 0) this.cacheTagStackCount--; else {
				this.mode = com.wiris.util.xml.XmlSerializer.MODE_WRITE;
				this.element = this.element.getParent();
			}
		}
	}
	,beginTag: function(tag) {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) {
			if(this.currentChild() != null && this.currentChild().nodeType == Xml.Element && tag == this.currentChild().getNodeName()) {
				this.pushState();
				this.setCurrentElement(this.currentChild());
			} else return false;
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_WRITE) {
			if(this.isIgnoreTag(tag) || this.ignoreTagStackCount > 0) this.ignoreTagStackCount++; else {
				var child = Xml.createElement(tag);
				this.element.addChild(child);
				this.element = child;
			}
		} else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_REGISTER && this.currentTag == null) this.currentTag = tag; else if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_CACHE) this.cacheTagStackCount++;
		return true;
	}
	,beginTagIfBool: function(tag,current,desired) {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) {
			if(this.beginTag(tag)) return desired;
		} else if(current == desired) this.beginTag(tag);
		return current;
	}
	,beginTagIf: function(tag,current,desired) {
		if(this.mode == com.wiris.util.xml.XmlSerializer.MODE_READ) {
			if(this.beginTag(tag)) return desired;
		} else if(current == desired) this.beginTag(tag);
		return current;
	}
	,write: function(s) {
		this.mode = com.wiris.util.xml.XmlSerializer.MODE_WRITE;
		this.element = Xml.createDocument();
		this.rawxmls = new Array();
		s.onSerialize(this);
		var res = this.element.toString();
		var i;
		var _g1 = 0, _g = this.rawxmls.length;
		while(_g1 < _g) {
			var i1 = _g1++;
			var start = res.indexOf("<rawXml id=\"" + i1 + "\"");
			if(start != -1) {
				var end = res.indexOf(">",start);
				res = HxOverrides.substr(res,0,start) + this.rawxmls[i1] + HxOverrides.substr(res,end + 1,null);
			}
		}
		return res;
	}
	,read: function(xml) {
		var document = Xml.parse(xml);
		this.setCurrentElement(document);
		this.mode = com.wiris.util.xml.XmlSerializer.MODE_READ;
		return this.readNode();
	}
	,getMode: function() {
		return this.mode;
	}
	,ignoreTagStackCount: null
	,ignore: null
	,cacheTagStackCount: null
	,cache: null
	,currentTag: null
	,rawxmls: null
	,tags: null
	,childStack: null
	,childrenStack: null
	,elementStack: null
	,child: null
	,children: null
	,element: null
	,mode: null
	,__class__: com.wiris.util.xml.XmlSerializer
}
haxe.Int32 = $hxClasses["haxe.Int32"] = function() { }
haxe.Int32.__name__ = ["haxe","Int32"];
haxe.Int32.make = function(a,b) {
	return a << 16 | b;
}
haxe.Int32.ofInt = function(x) {
	return x | 0;
}
haxe.Int32.clamp = function(x) {
	return x | 0;
}
haxe.Int32.toInt = function(x) {
	if((x >> 30 & 1) != x >>> 31) throw "Overflow " + Std.string(x);
	return x;
}
haxe.Int32.toNativeInt = function(x) {
	return x;
}
haxe.Int32.add = function(a,b) {
	return a + b | 0;
}
haxe.Int32.sub = function(a,b) {
	return a - b | 0;
}
haxe.Int32.mul = function(a,b) {
	return a * (b & 65535) + (a * (b >>> 16) << 16 | 0) | 0;
}
haxe.Int32.div = function(a,b) {
	return a / b | 0;
}
haxe.Int32.mod = function(a,b) {
	return a % b;
}
haxe.Int32.shl = function(a,b) {
	return a << b;
}
haxe.Int32.shr = function(a,b) {
	return a >> b;
}
haxe.Int32.ushr = function(a,b) {
	return a >>> b;
}
haxe.Int32.and = function(a,b) {
	return a & b;
}
haxe.Int32.or = function(a,b) {
	return a | b;
}
haxe.Int32.xor = function(a,b) {
	return a ^ b;
}
haxe.Int32.neg = function(a) {
	return -a;
}
haxe.Int32.isNeg = function(a) {
	return a < 0;
}
haxe.Int32.isZero = function(a) {
	return a == 0;
}
haxe.Int32.complement = function(a) {
	return ~a;
}
haxe.Int32.compare = function(a,b) {
	return a - b;
}
haxe.Int32.ucompare = function(a,b) {
	if(a < 0) return b < 0?~b - ~a:1;
	return b < 0?-1:a - b;
}
haxe.Log = $hxClasses["haxe.Log"] = function() { }
haxe.Log.__name__ = ["haxe","Log"];
haxe.Log.trace = function(v,infos) {
	js.Boot.__trace(v,infos);
}
haxe.Log.clear = function() {
	js.Boot.__clear_trace();
}
haxe.Md5 = $hxClasses["haxe.Md5"] = function() {
};
haxe.Md5.__name__ = ["haxe","Md5"];
haxe.Md5.encode = function(s) {
	return new haxe.Md5().doEncode(s);
}
haxe.Md5.prototype = {
	doEncode: function(str) {
		var x = this.str2blks(str);
		var a = 1732584193;
		var b = -271733879;
		var c = -1732584194;
		var d = 271733878;
		var step;
		var i = 0;
		while(i < x.length) {
			var olda = a;
			var oldb = b;
			var oldc = c;
			var oldd = d;
			step = 0;
			a = this.ff(a,b,c,d,x[i],7,-680876936);
			d = this.ff(d,a,b,c,x[i + 1],12,-389564586);
			c = this.ff(c,d,a,b,x[i + 2],17,606105819);
			b = this.ff(b,c,d,a,x[i + 3],22,-1044525330);
			a = this.ff(a,b,c,d,x[i + 4],7,-176418897);
			d = this.ff(d,a,b,c,x[i + 5],12,1200080426);
			c = this.ff(c,d,a,b,x[i + 6],17,-1473231341);
			b = this.ff(b,c,d,a,x[i + 7],22,-45705983);
			a = this.ff(a,b,c,d,x[i + 8],7,1770035416);
			d = this.ff(d,a,b,c,x[i + 9],12,-1958414417);
			c = this.ff(c,d,a,b,x[i + 10],17,-42063);
			b = this.ff(b,c,d,a,x[i + 11],22,-1990404162);
			a = this.ff(a,b,c,d,x[i + 12],7,1804603682);
			d = this.ff(d,a,b,c,x[i + 13],12,-40341101);
			c = this.ff(c,d,a,b,x[i + 14],17,-1502002290);
			b = this.ff(b,c,d,a,x[i + 15],22,1236535329);
			a = this.gg(a,b,c,d,x[i + 1],5,-165796510);
			d = this.gg(d,a,b,c,x[i + 6],9,-1069501632);
			c = this.gg(c,d,a,b,x[i + 11],14,643717713);
			b = this.gg(b,c,d,a,x[i],20,-373897302);
			a = this.gg(a,b,c,d,x[i + 5],5,-701558691);
			d = this.gg(d,a,b,c,x[i + 10],9,38016083);
			c = this.gg(c,d,a,b,x[i + 15],14,-660478335);
			b = this.gg(b,c,d,a,x[i + 4],20,-405537848);
			a = this.gg(a,b,c,d,x[i + 9],5,568446438);
			d = this.gg(d,a,b,c,x[i + 14],9,-1019803690);
			c = this.gg(c,d,a,b,x[i + 3],14,-187363961);
			b = this.gg(b,c,d,a,x[i + 8],20,1163531501);
			a = this.gg(a,b,c,d,x[i + 13],5,-1444681467);
			d = this.gg(d,a,b,c,x[i + 2],9,-51403784);
			c = this.gg(c,d,a,b,x[i + 7],14,1735328473);
			b = this.gg(b,c,d,a,x[i + 12],20,-1926607734);
			a = this.hh(a,b,c,d,x[i + 5],4,-378558);
			d = this.hh(d,a,b,c,x[i + 8],11,-2022574463);
			c = this.hh(c,d,a,b,x[i + 11],16,1839030562);
			b = this.hh(b,c,d,a,x[i + 14],23,-35309556);
			a = this.hh(a,b,c,d,x[i + 1],4,-1530992060);
			d = this.hh(d,a,b,c,x[i + 4],11,1272893353);
			c = this.hh(c,d,a,b,x[i + 7],16,-155497632);
			b = this.hh(b,c,d,a,x[i + 10],23,-1094730640);
			a = this.hh(a,b,c,d,x[i + 13],4,681279174);
			d = this.hh(d,a,b,c,x[i],11,-358537222);
			c = this.hh(c,d,a,b,x[i + 3],16,-722521979);
			b = this.hh(b,c,d,a,x[i + 6],23,76029189);
			a = this.hh(a,b,c,d,x[i + 9],4,-640364487);
			d = this.hh(d,a,b,c,x[i + 12],11,-421815835);
			c = this.hh(c,d,a,b,x[i + 15],16,530742520);
			b = this.hh(b,c,d,a,x[i + 2],23,-995338651);
			a = this.ii(a,b,c,d,x[i],6,-198630844);
			d = this.ii(d,a,b,c,x[i + 7],10,1126891415);
			c = this.ii(c,d,a,b,x[i + 14],15,-1416354905);
			b = this.ii(b,c,d,a,x[i + 5],21,-57434055);
			a = this.ii(a,b,c,d,x[i + 12],6,1700485571);
			d = this.ii(d,a,b,c,x[i + 3],10,-1894986606);
			c = this.ii(c,d,a,b,x[i + 10],15,-1051523);
			b = this.ii(b,c,d,a,x[i + 1],21,-2054922799);
			a = this.ii(a,b,c,d,x[i + 8],6,1873313359);
			d = this.ii(d,a,b,c,x[i + 15],10,-30611744);
			c = this.ii(c,d,a,b,x[i + 6],15,-1560198380);
			b = this.ii(b,c,d,a,x[i + 13],21,1309151649);
			a = this.ii(a,b,c,d,x[i + 4],6,-145523070);
			d = this.ii(d,a,b,c,x[i + 11],10,-1120210379);
			c = this.ii(c,d,a,b,x[i + 2],15,718787259);
			b = this.ii(b,c,d,a,x[i + 9],21,-343485551);
			a = this.addme(a,olda);
			b = this.addme(b,oldb);
			c = this.addme(c,oldc);
			d = this.addme(d,oldd);
			i += 16;
		}
		return this.rhex(a) + this.rhex(b) + this.rhex(c) + this.rhex(d);
	}
	,ii: function(a,b,c,d,x,s,t) {
		return this.cmn(this.bitXOR(c,this.bitOR(b,~d)),a,b,x,s,t);
	}
	,hh: function(a,b,c,d,x,s,t) {
		return this.cmn(this.bitXOR(this.bitXOR(b,c),d),a,b,x,s,t);
	}
	,gg: function(a,b,c,d,x,s,t) {
		return this.cmn(this.bitOR(this.bitAND(b,d),this.bitAND(c,~d)),a,b,x,s,t);
	}
	,ff: function(a,b,c,d,x,s,t) {
		return this.cmn(this.bitOR(this.bitAND(b,c),this.bitAND(~b,d)),a,b,x,s,t);
	}
	,cmn: function(q,a,b,x,s,t) {
		return this.addme(this.rol(this.addme(this.addme(a,q),this.addme(x,t)),s),b);
	}
	,rol: function(num,cnt) {
		return num << cnt | num >>> 32 - cnt;
	}
	,str2blks: function(str) {
		var nblk = (str.length + 8 >> 6) + 1;
		var blks = new Array();
		var _g1 = 0, _g = nblk * 16;
		while(_g1 < _g) {
			var i = _g1++;
			blks[i] = 0;
		}
		var i = 0;
		while(i < str.length) {
			blks[i >> 2] |= HxOverrides.cca(str,i) << (str.length * 8 + i) % 4 * 8;
			i++;
		}
		blks[i >> 2] |= 128 << (str.length * 8 + i) % 4 * 8;
		var l = str.length * 8;
		var k = nblk * 16 - 2;
		blks[k] = l & 255;
		blks[k] |= (l >>> 8 & 255) << 8;
		blks[k] |= (l >>> 16 & 255) << 16;
		blks[k] |= (l >>> 24 & 255) << 24;
		return blks;
	}
	,rhex: function(num) {
		var str = "";
		var hex_chr = "0123456789abcdef";
		var _g = 0;
		while(_g < 4) {
			var j = _g++;
			str += hex_chr.charAt(num >> j * 8 + 4 & 15) + hex_chr.charAt(num >> j * 8 & 15);
		}
		return str;
	}
	,addme: function(x,y) {
		var lsw = (x & 65535) + (y & 65535);
		var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
		return msw << 16 | lsw & 65535;
	}
	,bitAND: function(a,b) {
		var lsb = a & 1 & (b & 1);
		var msb31 = a >>> 1 & b >>> 1;
		return msb31 << 1 | lsb;
	}
	,bitXOR: function(a,b) {
		var lsb = a & 1 ^ b & 1;
		var msb31 = a >>> 1 ^ b >>> 1;
		return msb31 << 1 | lsb;
	}
	,bitOR: function(a,b) {
		var lsb = a & 1 | b & 1;
		var msb31 = a >>> 1 | b >>> 1;
		return msb31 << 1 | lsb;
	}
	,__class__: haxe.Md5
}
haxe.Resource = $hxClasses["haxe.Resource"] = function() { }
haxe.Resource.__name__ = ["haxe","Resource"];
haxe.Resource.content = null;
haxe.Resource.listNames = function() {
	var names = new Array();
	var _g = 0, _g1 = haxe.Resource.content;
	while(_g < _g1.length) {
		var x = _g1[_g];
		++_g;
		names.push(x.name);
	}
	return names;
}
haxe.Resource.getString = function(name) {
	var _g = 0, _g1 = haxe.Resource.content;
	while(_g < _g1.length) {
		var x = _g1[_g];
		++_g;
		if(x.name == name) {
			if(x.str != null) return x.str;
			var b = haxe.Unserializer.run(x.data);
			return b.toString();
		}
	}
	return null;
}
haxe.Resource.getBytes = function(name) {
	var _g = 0, _g1 = haxe.Resource.content;
	while(_g < _g1.length) {
		var x = _g1[_g];
		++_g;
		if(x.name == name) {
			if(x.str != null) return haxe.io.Bytes.ofString(x.str);
			return haxe.Unserializer.run(x.data);
		}
	}
	return null;
}
haxe.Serializer = $hxClasses["haxe.Serializer"] = function() {
	this.buf = new StringBuf();
	this.cache = new Array();
	this.useCache = haxe.Serializer.USE_CACHE;
	this.useEnumIndex = haxe.Serializer.USE_ENUM_INDEX;
	this.shash = new Hash();
	this.scount = 0;
};
haxe.Serializer.__name__ = ["haxe","Serializer"];
haxe.Serializer.run = function(v) {
	var s = new haxe.Serializer();
	s.serialize(v);
	return s.toString();
}
haxe.Serializer.prototype = {
	serializeException: function(e) {
		this.buf.b += Std.string("x");
		this.serialize(e);
	}
	,serialize: function(v) {
		var $e = (Type["typeof"](v));
		switch( $e[1] ) {
		case 0:
			this.buf.b += Std.string("n");
			break;
		case 1:
			if(v == 0) {
				this.buf.b += Std.string("z");
				return;
			}
			this.buf.b += Std.string("i");
			this.buf.b += Std.string(v);
			break;
		case 2:
			if(Math.isNaN(v)) this.buf.b += Std.string("k"); else if(!Math.isFinite(v)) this.buf.b += Std.string(v < 0?"m":"p"); else {
				this.buf.b += Std.string("d");
				this.buf.b += Std.string(v);
			}
			break;
		case 3:
			this.buf.b += Std.string(v?"t":"f");
			break;
		case 6:
			var c = $e[2];
			if(c == String) {
				this.serializeString(v);
				return;
			}
			if(this.useCache && this.serializeRef(v)) return;
			switch(c) {
			case Array:
				var ucount = 0;
				this.buf.b += Std.string("a");
				var l = v.length;
				var _g = 0;
				while(_g < l) {
					var i = _g++;
					if(v[i] == null) ucount++; else {
						if(ucount > 0) {
							if(ucount == 1) this.buf.b += Std.string("n"); else {
								this.buf.b += Std.string("u");
								this.buf.b += Std.string(ucount);
							}
							ucount = 0;
						}
						this.serialize(v[i]);
					}
				}
				if(ucount > 0) {
					if(ucount == 1) this.buf.b += Std.string("n"); else {
						this.buf.b += Std.string("u");
						this.buf.b += Std.string(ucount);
					}
				}
				this.buf.b += Std.string("h");
				break;
			case List:
				this.buf.b += Std.string("l");
				var v1 = v;
				var $it0 = v1.iterator();
				while( $it0.hasNext() ) {
					var i = $it0.next();
					this.serialize(i);
				}
				this.buf.b += Std.string("h");
				break;
			case Date:
				var d = v;
				this.buf.b += Std.string("v");
				this.buf.b += Std.string(HxOverrides.dateStr(d));
				break;
			case Hash:
				this.buf.b += Std.string("b");
				var v1 = v;
				var $it1 = v1.keys();
				while( $it1.hasNext() ) {
					var k = $it1.next();
					this.serializeString(k);
					this.serialize(v1.get(k));
				}
				this.buf.b += Std.string("h");
				break;
			case IntHash:
				this.buf.b += Std.string("q");
				var v1 = v;
				var $it2 = v1.keys();
				while( $it2.hasNext() ) {
					var k = $it2.next();
					this.buf.b += Std.string(":");
					this.buf.b += Std.string(k);
					this.serialize(v1.get(k));
				}
				this.buf.b += Std.string("h");
				break;
			case haxe.io.Bytes:
				var v1 = v;
				var i = 0;
				var max = v1.length - 2;
				var charsBuf = new StringBuf();
				var b64 = haxe.Serializer.BASE64;
				while(i < max) {
					var b1 = v1.b[i++];
					var b2 = v1.b[i++];
					var b3 = v1.b[i++];
					charsBuf.b += Std.string(b64.charAt(b1 >> 2));
					charsBuf.b += Std.string(b64.charAt((b1 << 4 | b2 >> 4) & 63));
					charsBuf.b += Std.string(b64.charAt((b2 << 2 | b3 >> 6) & 63));
					charsBuf.b += Std.string(b64.charAt(b3 & 63));
				}
				if(i == max) {
					var b1 = v1.b[i++];
					var b2 = v1.b[i++];
					charsBuf.b += Std.string(b64.charAt(b1 >> 2));
					charsBuf.b += Std.string(b64.charAt((b1 << 4 | b2 >> 4) & 63));
					charsBuf.b += Std.string(b64.charAt(b2 << 2 & 63));
				} else if(i == max + 1) {
					var b1 = v1.b[i++];
					charsBuf.b += Std.string(b64.charAt(b1 >> 2));
					charsBuf.b += Std.string(b64.charAt(b1 << 4 & 63));
				}
				var chars = charsBuf.b;
				this.buf.b += Std.string("s");
				this.buf.b += Std.string(chars.length);
				this.buf.b += Std.string(":");
				this.buf.b += Std.string(chars);
				break;
			default:
				this.cache.pop();
				if(v.hxSerialize != null) {
					this.buf.b += Std.string("C");
					this.serializeString(Type.getClassName(c));
					this.cache.push(v);
					v.hxSerialize(this);
					this.buf.b += Std.string("g");
				} else {
					this.buf.b += Std.string("c");
					this.serializeString(Type.getClassName(c));
					this.cache.push(v);
					this.serializeFields(v);
				}
			}
			break;
		case 4:
			if(this.useCache && this.serializeRef(v)) return;
			this.buf.b += Std.string("o");
			this.serializeFields(v);
			break;
		case 7:
			var e = $e[2];
			if(this.useCache && this.serializeRef(v)) return;
			this.cache.pop();
			this.buf.b += Std.string(this.useEnumIndex?"j":"w");
			this.serializeString(Type.getEnumName(e));
			if(this.useEnumIndex) {
				this.buf.b += Std.string(":");
				this.buf.b += Std.string(v[1]);
			} else this.serializeString(v[0]);
			this.buf.b += Std.string(":");
			var l = v.length;
			this.buf.b += Std.string(l - 2);
			var _g = 2;
			while(_g < l) {
				var i = _g++;
				this.serialize(v[i]);
			}
			this.cache.push(v);
			break;
		case 5:
			throw "Cannot serialize function";
			break;
		default:
			throw "Cannot serialize " + Std.string(v);
		}
	}
	,serializeFields: function(v) {
		var _g = 0, _g1 = Reflect.fields(v);
		while(_g < _g1.length) {
			var f = _g1[_g];
			++_g;
			this.serializeString(f);
			this.serialize(Reflect.field(v,f));
		}
		this.buf.b += Std.string("g");
	}
	,serializeRef: function(v) {
		var vt = typeof(v);
		var _g1 = 0, _g = this.cache.length;
		while(_g1 < _g) {
			var i = _g1++;
			var ci = this.cache[i];
			if(typeof(ci) == vt && ci == v) {
				this.buf.b += Std.string("r");
				this.buf.b += Std.string(i);
				return true;
			}
		}
		this.cache.push(v);
		return false;
	}
	,serializeString: function(s) {
		var x = this.shash.get(s);
		if(x != null) {
			this.buf.b += Std.string("R");
			this.buf.b += Std.string(x);
			return;
		}
		this.shash.set(s,this.scount++);
		this.buf.b += Std.string("y");
		s = StringTools.urlEncode(s);
		this.buf.b += Std.string(s.length);
		this.buf.b += Std.string(":");
		this.buf.b += Std.string(s);
	}
	,toString: function() {
		return this.buf.b;
	}
	,useEnumIndex: null
	,useCache: null
	,scount: null
	,shash: null
	,cache: null
	,buf: null
	,__class__: haxe.Serializer
}
haxe.Timer = $hxClasses["haxe.Timer"] = function(time_ms) {
	var me = this;
	this.id = window.setInterval(function() {
		me.run();
	},time_ms);
};
haxe.Timer.__name__ = ["haxe","Timer"];
haxe.Timer.delay = function(f,time_ms) {
	var t = new haxe.Timer(time_ms);
	t.run = function() {
		t.stop();
		f();
	};
	return t;
}
haxe.Timer.measure = function(f,pos) {
	var t0 = haxe.Timer.stamp();
	var r = f();
	haxe.Log.trace(haxe.Timer.stamp() - t0 + "s",pos);
	return r;
}
haxe.Timer.stamp = function() {
	return new Date().getTime() / 1000;
}
haxe.Timer.prototype = {
	run: function() {
	}
	,stop: function() {
		if(this.id == null) return;
		window.clearInterval(this.id);
		this.id = null;
	}
	,id: null
	,__class__: haxe.Timer
}
haxe.Unserializer = $hxClasses["haxe.Unserializer"] = function(buf) {
	this.buf = buf;
	this.length = buf.length;
	this.pos = 0;
	this.scache = new Array();
	this.cache = new Array();
	var r = haxe.Unserializer.DEFAULT_RESOLVER;
	if(r == null) {
		r = Type;
		haxe.Unserializer.DEFAULT_RESOLVER = r;
	}
	this.setResolver(r);
};
haxe.Unserializer.__name__ = ["haxe","Unserializer"];
haxe.Unserializer.initCodes = function() {
	var codes = new Array();
	var _g1 = 0, _g = haxe.Unserializer.BASE64.length;
	while(_g1 < _g) {
		var i = _g1++;
		codes[haxe.Unserializer.BASE64.charCodeAt(i)] = i;
	}
	return codes;
}
haxe.Unserializer.run = function(v) {
	return new haxe.Unserializer(v).unserialize();
}
haxe.Unserializer.prototype = {
	unserialize: function() {
		switch(this.buf.charCodeAt(this.pos++)) {
		case 110:
			return null;
		case 116:
			return true;
		case 102:
			return false;
		case 122:
			return 0;
		case 105:
			return this.readDigits();
		case 100:
			var p1 = this.pos;
			while(true) {
				var c = this.buf.charCodeAt(this.pos);
				if(c >= 43 && c < 58 || c == 101 || c == 69) this.pos++; else break;
			}
			return Std.parseFloat(HxOverrides.substr(this.buf,p1,this.pos - p1));
		case 121:
			var len = this.readDigits();
			if(this.buf.charCodeAt(this.pos++) != 58 || this.length - this.pos < len) throw "Invalid string length";
			var s = HxOverrides.substr(this.buf,this.pos,len);
			this.pos += len;
			s = StringTools.urlDecode(s);
			this.scache.push(s);
			return s;
		case 107:
			return Math.NaN;
		case 109:
			return Math.NEGATIVE_INFINITY;
		case 112:
			return Math.POSITIVE_INFINITY;
		case 97:
			var buf = this.buf;
			var a = new Array();
			this.cache.push(a);
			while(true) {
				var c = this.buf.charCodeAt(this.pos);
				if(c == 104) {
					this.pos++;
					break;
				}
				if(c == 117) {
					this.pos++;
					var n = this.readDigits();
					a[a.length + n - 1] = null;
				} else a.push(this.unserialize());
			}
			return a;
		case 111:
			var o = { };
			this.cache.push(o);
			this.unserializeObject(o);
			return o;
		case 114:
			var n = this.readDigits();
			if(n < 0 || n >= this.cache.length) throw "Invalid reference";
			return this.cache[n];
		case 82:
			var n = this.readDigits();
			if(n < 0 || n >= this.scache.length) throw "Invalid string reference";
			return this.scache[n];
		case 120:
			throw this.unserialize();
			break;
		case 99:
			var name = this.unserialize();
			var cl = this.resolver.resolveClass(name);
			if(cl == null) throw "Class not found " + name;
			var o = Type.createEmptyInstance(cl);
			this.cache.push(o);
			this.unserializeObject(o);
			return o;
		case 119:
			var name = this.unserialize();
			var edecl = this.resolver.resolveEnum(name);
			if(edecl == null) throw "Enum not found " + name;
			var e = this.unserializeEnum(edecl,this.unserialize());
			this.cache.push(e);
			return e;
		case 106:
			var name = this.unserialize();
			var edecl = this.resolver.resolveEnum(name);
			if(edecl == null) throw "Enum not found " + name;
			this.pos++;
			var index = this.readDigits();
			var tag = Type.getEnumConstructs(edecl)[index];
			if(tag == null) throw "Unknown enum index " + name + "@" + index;
			var e = this.unserializeEnum(edecl,tag);
			this.cache.push(e);
			return e;
		case 108:
			var l = new List();
			this.cache.push(l);
			var buf = this.buf;
			while(this.buf.charCodeAt(this.pos) != 104) l.add(this.unserialize());
			this.pos++;
			return l;
		case 98:
			var h = new Hash();
			this.cache.push(h);
			var buf = this.buf;
			while(this.buf.charCodeAt(this.pos) != 104) {
				var s = this.unserialize();
				h.set(s,this.unserialize());
			}
			this.pos++;
			return h;
		case 113:
			var h = new IntHash();
			this.cache.push(h);
			var buf = this.buf;
			var c = this.buf.charCodeAt(this.pos++);
			while(c == 58) {
				var i = this.readDigits();
				h.set(i,this.unserialize());
				c = this.buf.charCodeAt(this.pos++);
			}
			if(c != 104) throw "Invalid IntHash format";
			return h;
		case 118:
			var d = HxOverrides.strDate(HxOverrides.substr(this.buf,this.pos,19));
			this.cache.push(d);
			this.pos += 19;
			return d;
		case 115:
			var len = this.readDigits();
			var buf = this.buf;
			if(this.buf.charCodeAt(this.pos++) != 58 || this.length - this.pos < len) throw "Invalid bytes length";
			var codes = haxe.Unserializer.CODES;
			if(codes == null) {
				codes = haxe.Unserializer.initCodes();
				haxe.Unserializer.CODES = codes;
			}
			var i = this.pos;
			var rest = len & 3;
			var size = (len >> 2) * 3 + (rest >= 2?rest - 1:0);
			var max = i + (len - rest);
			var bytes = haxe.io.Bytes.alloc(size);
			var bpos = 0;
			while(i < max) {
				var c1 = codes[buf.charCodeAt(i++)];
				var c2 = codes[buf.charCodeAt(i++)];
				bytes.b[bpos++] = (c1 << 2 | c2 >> 4) & 255;
				var c3 = codes[buf.charCodeAt(i++)];
				bytes.b[bpos++] = (c2 << 4 | c3 >> 2) & 255;
				var c4 = codes[buf.charCodeAt(i++)];
				bytes.b[bpos++] = (c3 << 6 | c4) & 255;
			}
			if(rest >= 2) {
				var c1 = codes[buf.charCodeAt(i++)];
				var c2 = codes[buf.charCodeAt(i++)];
				bytes.b[bpos++] = (c1 << 2 | c2 >> 4) & 255;
				if(rest == 3) {
					var c3 = codes[buf.charCodeAt(i++)];
					bytes.b[bpos++] = (c2 << 4 | c3 >> 2) & 255;
				}
			}
			this.pos += len;
			this.cache.push(bytes);
			return bytes;
		case 67:
			var name = this.unserialize();
			var cl = this.resolver.resolveClass(name);
			if(cl == null) throw "Class not found " + name;
			var o = Type.createEmptyInstance(cl);
			this.cache.push(o);
			o.hxUnserialize(this);
			if(this.buf.charCodeAt(this.pos++) != 103) throw "Invalid custom data";
			return o;
		default:
		}
		this.pos--;
		throw "Invalid char " + this.buf.charAt(this.pos) + " at position " + this.pos;
	}
	,unserializeEnum: function(edecl,tag) {
		if(this.buf.charCodeAt(this.pos++) != 58) throw "Invalid enum format";
		var nargs = this.readDigits();
		if(nargs == 0) return Type.createEnum(edecl,tag);
		var args = new Array();
		while(nargs-- > 0) args.push(this.unserialize());
		return Type.createEnum(edecl,tag,args);
	}
	,unserializeObject: function(o) {
		while(true) {
			if(this.pos >= this.length) throw "Invalid object";
			if(this.buf.charCodeAt(this.pos) == 103) break;
			var k = this.unserialize();
			if(!js.Boot.__instanceof(k,String)) throw "Invalid object key";
			var v = this.unserialize();
			o[k] = v;
		}
		this.pos++;
	}
	,readDigits: function() {
		var k = 0;
		var s = false;
		var fpos = this.pos;
		while(true) {
			var c = this.buf.charCodeAt(this.pos);
			if(c != c) break;
			if(c == 45) {
				if(this.pos != fpos) break;
				s = true;
				this.pos++;
				continue;
			}
			if(c < 48 || c > 57) break;
			k = k * 10 + (c - 48);
			this.pos++;
		}
		if(s) k *= -1;
		return k;
	}
	,get: function(p) {
		return this.buf.charCodeAt(p);
	}
	,getResolver: function() {
		return this.resolver;
	}
	,setResolver: function(r) {
		if(r == null) this.resolver = { resolveClass : function(_) {
			return null;
		}, resolveEnum : function(_) {
			return null;
		}}; else this.resolver = r;
	}
	,resolver: null
	,scache: null
	,cache: null
	,length: null
	,pos: null
	,buf: null
	,__class__: haxe.Unserializer
}
haxe.Utf8 = $hxClasses["haxe.Utf8"] = function(size) {
	this.__b = "";
};
haxe.Utf8.__name__ = ["haxe","Utf8"];
haxe.Utf8.iter = function(s,chars) {
	var _g1 = 0, _g = s.length;
	while(_g1 < _g) {
		var i = _g1++;
		chars(HxOverrides.cca(s,i));
	}
}
haxe.Utf8.encode = function(s) {
	throw "Not implemented";
	return s;
}
haxe.Utf8.decode = function(s) {
	throw "Not implemented";
	return s;
}
haxe.Utf8.charCodeAt = function(s,index) {
	return HxOverrides.cca(s,index);
}
haxe.Utf8.validate = function(s) {
	return true;
}
haxe.Utf8.compare = function(a,b) {
	return a > b?1:a == b?0:-1;
}
haxe.Utf8.sub = function(s,pos,len) {
	return HxOverrides.substr(s,pos,len);
}
haxe.Utf8.prototype = {
	toString: function() {
		return this.__b;
	}
	,addChar: function(c) {
		this.__b += String.fromCharCode(c);
	}
	,__b: null
	,__class__: haxe.Utf8
}
if(!haxe.io) haxe.io = {}
haxe.io.Bytes = $hxClasses["haxe.io.Bytes"] = function(length,b) {
	this.length = length;
	this.b = b;
};
haxe.io.Bytes.__name__ = ["haxe","io","Bytes"];
haxe.io.Bytes.alloc = function(length) {
	var a = new Array();
	var _g = 0;
	while(_g < length) {
		var i = _g++;
		a.push(0);
	}
	return new haxe.io.Bytes(length,a);
}
haxe.io.Bytes.ofString = function(s) {
	var a = new Array();
	var _g1 = 0, _g = s.length;
	while(_g1 < _g) {
		var i = _g1++;
		var c = s.charCodeAt(i);
		if(c <= 127) a.push(c); else if(c <= 2047) {
			a.push(192 | c >> 6);
			a.push(128 | c & 63);
		} else if(c <= 65535) {
			a.push(224 | c >> 12);
			a.push(128 | c >> 6 & 63);
			a.push(128 | c & 63);
		} else {
			a.push(240 | c >> 18);
			a.push(128 | c >> 12 & 63);
			a.push(128 | c >> 6 & 63);
			a.push(128 | c & 63);
		}
	}
	return new haxe.io.Bytes(a.length,a);
}
haxe.io.Bytes.ofData = function(b) {
	return new haxe.io.Bytes(b.length,b);
}
haxe.io.Bytes.prototype = {
	getData: function() {
		return this.b;
	}
	,toHex: function() {
		var s = new StringBuf();
		var chars = [];
		var str = "0123456789abcdef";
		var _g1 = 0, _g = str.length;
		while(_g1 < _g) {
			var i = _g1++;
			chars.push(HxOverrides.cca(str,i));
		}
		var _g1 = 0, _g = this.length;
		while(_g1 < _g) {
			var i = _g1++;
			var c = this.b[i];
			s.b += String.fromCharCode(chars[c >> 4]);
			s.b += String.fromCharCode(chars[c & 15]);
		}
		return s.b;
	}
	,toString: function() {
		return this.readString(0,this.length);
	}
	,readString: function(pos,len) {
		if(pos < 0 || len < 0 || pos + len > this.length) throw haxe.io.Error.OutsideBounds;
		var s = "";
		var b = this.b;
		var fcc = String.fromCharCode;
		var i = pos;
		var max = pos + len;
		while(i < max) {
			var c = b[i++];
			if(c < 128) {
				if(c == 0) break;
				s += fcc(c);
			} else if(c < 224) s += fcc((c & 63) << 6 | b[i++] & 127); else if(c < 240) {
				var c2 = b[i++];
				s += fcc((c & 31) << 12 | (c2 & 127) << 6 | b[i++] & 127);
			} else {
				var c2 = b[i++];
				var c3 = b[i++];
				s += fcc((c & 15) << 18 | (c2 & 127) << 12 | c3 << 6 & 127 | b[i++] & 127);
			}
		}
		return s;
	}
	,compare: function(other) {
		var b1 = this.b;
		var b2 = other.b;
		var len = this.length < other.length?this.length:other.length;
		var _g = 0;
		while(_g < len) {
			var i = _g++;
			if(b1[i] != b2[i]) return b1[i] - b2[i];
		}
		return this.length - other.length;
	}
	,sub: function(pos,len) {
		if(pos < 0 || len < 0 || pos + len > this.length) throw haxe.io.Error.OutsideBounds;
		return new haxe.io.Bytes(len,this.b.slice(pos,pos + len));
	}
	,blit: function(pos,src,srcpos,len) {
		if(pos < 0 || srcpos < 0 || len < 0 || pos + len > this.length || srcpos + len > src.length) throw haxe.io.Error.OutsideBounds;
		var b1 = this.b;
		var b2 = src.b;
		if(b1 == b2 && pos > srcpos) {
			var i = len;
			while(i > 0) {
				i--;
				b1[i + pos] = b2[i + srcpos];
			}
			return;
		}
		var _g = 0;
		while(_g < len) {
			var i = _g++;
			b1[i + pos] = b2[i + srcpos];
		}
	}
	,set: function(pos,v) {
		this.b[pos] = v & 255;
	}
	,get: function(pos) {
		return this.b[pos];
	}
	,b: null
	,length: null
	,__class__: haxe.io.Bytes
}
haxe.io.BytesBuffer = $hxClasses["haxe.io.BytesBuffer"] = function() {
	this.b = new Array();
};
haxe.io.BytesBuffer.__name__ = ["haxe","io","BytesBuffer"];
haxe.io.BytesBuffer.prototype = {
	getBytes: function() {
		var bytes = new haxe.io.Bytes(this.b.length,this.b);
		this.b = null;
		return bytes;
	}
	,addBytes: function(src,pos,len) {
		if(pos < 0 || len < 0 || pos + len > src.length) throw haxe.io.Error.OutsideBounds;
		var b1 = this.b;
		var b2 = src.b;
		var _g1 = pos, _g = pos + len;
		while(_g1 < _g) {
			var i = _g1++;
			this.b.push(b2[i]);
		}
	}
	,add: function(src) {
		var b1 = this.b;
		var b2 = src.b;
		var _g1 = 0, _g = src.length;
		while(_g1 < _g) {
			var i = _g1++;
			this.b.push(b2[i]);
		}
	}
	,addByte: function($byte) {
		this.b.push($byte);
	}
	,b: null
	,__class__: haxe.io.BytesBuffer
}
haxe.io.Eof = $hxClasses["haxe.io.Eof"] = function() {
};
haxe.io.Eof.__name__ = ["haxe","io","Eof"];
haxe.io.Eof.prototype = {
	toString: function() {
		return "Eof";
	}
	,__class__: haxe.io.Eof
}
haxe.io.Error = $hxClasses["haxe.io.Error"] = { __ename__ : ["haxe","io","Error"], __constructs__ : ["Blocked","Overflow","OutsideBounds","Custom"] }
haxe.io.Error.Blocked = ["Blocked",0];
haxe.io.Error.Blocked.toString = $estr;
haxe.io.Error.Blocked.__enum__ = haxe.io.Error;
haxe.io.Error.Overflow = ["Overflow",1];
haxe.io.Error.Overflow.toString = $estr;
haxe.io.Error.Overflow.__enum__ = haxe.io.Error;
haxe.io.Error.OutsideBounds = ["OutsideBounds",2];
haxe.io.Error.OutsideBounds.toString = $estr;
haxe.io.Error.OutsideBounds.__enum__ = haxe.io.Error;
haxe.io.Error.Custom = function(e) { var $x = ["Custom",3,e]; $x.__enum__ = haxe.io.Error; $x.toString = $estr; return $x; }
haxe.io.Input = $hxClasses["haxe.io.Input"] = function() { }
haxe.io.Input.__name__ = ["haxe","io","Input"];
haxe.io.Input.prototype = {
	getDoubleSig: function(bytes) {
		return Std.parseInt((((bytes[1] & 15) << 16 | bytes[2] << 8 | bytes[3]) * Math.pow(2,32)).toString()) + Std.parseInt(((bytes[4] >> 7) * Math.pow(2,31)).toString()) + Std.parseInt(((bytes[4] & 127) << 24 | bytes[5] << 16 | bytes[6] << 8 | bytes[7]).toString());
	}
	,readString: function(len) {
		var b = haxe.io.Bytes.alloc(len);
		this.readFullBytes(b,0,len);
		return b.toString();
	}
	,readInt32: function() {
		var ch1 = this.readByte();
		var ch2 = this.readByte();
		var ch3 = this.readByte();
		var ch4 = this.readByte();
		return this.bigEndian?(ch1 << 8 | ch2) << 16 | (ch3 << 8 | ch4):(ch4 << 8 | ch3) << 16 | (ch2 << 8 | ch1);
	}
	,readUInt30: function() {
		var ch1 = this.readByte();
		var ch2 = this.readByte();
		var ch3 = this.readByte();
		var ch4 = this.readByte();
		if((this.bigEndian?ch1:ch4) >= 64) throw haxe.io.Error.Overflow;
		return this.bigEndian?ch4 | ch3 << 8 | ch2 << 16 | ch1 << 24:ch1 | ch2 << 8 | ch3 << 16 | ch4 << 24;
	}
	,readInt31: function() {
		var ch1, ch2, ch3, ch4;
		if(this.bigEndian) {
			ch4 = this.readByte();
			ch3 = this.readByte();
			ch2 = this.readByte();
			ch1 = this.readByte();
		} else {
			ch1 = this.readByte();
			ch2 = this.readByte();
			ch3 = this.readByte();
			ch4 = this.readByte();
		}
		if((ch4 & 128) == 0 != ((ch4 & 64) == 0)) throw haxe.io.Error.Overflow;
		return ch1 | ch2 << 8 | ch3 << 16 | ch4 << 24;
	}
	,readUInt24: function() {
		var ch1 = this.readByte();
		var ch2 = this.readByte();
		var ch3 = this.readByte();
		return this.bigEndian?ch3 | ch2 << 8 | ch1 << 16:ch1 | ch2 << 8 | ch3 << 16;
	}
	,readInt24: function() {
		var ch1 = this.readByte();
		var ch2 = this.readByte();
		var ch3 = this.readByte();
		var n = this.bigEndian?ch3 | ch2 << 8 | ch1 << 16:ch1 | ch2 << 8 | ch3 << 16;
		if((n & 8388608) != 0) return n - 16777216;
		return n;
	}
	,readUInt16: function() {
		var ch1 = this.readByte();
		var ch2 = this.readByte();
		return this.bigEndian?ch2 | ch1 << 8:ch1 | ch2 << 8;
	}
	,readInt16: function() {
		var ch1 = this.readByte();
		var ch2 = this.readByte();
		var n = this.bigEndian?ch2 | ch1 << 8:ch1 | ch2 << 8;
		if((n & 32768) != 0) return n - 65536;
		return n;
	}
	,readInt8: function() {
		var n = this.readByte();
		if(n >= 128) return n - 256;
		return n;
	}
	,readDouble: function() {
		var bytes = [];
		bytes.push(this.readByte());
		bytes.push(this.readByte());
		bytes.push(this.readByte());
		bytes.push(this.readByte());
		bytes.push(this.readByte());
		bytes.push(this.readByte());
		bytes.push(this.readByte());
		bytes.push(this.readByte());
		if(this.bigEndian) bytes.reverse();
		var sign = 1 - (bytes[0] >> 7 << 1);
		var exp = (bytes[0] << 4 & 2047 | bytes[1] >> 4) - 1023;
		var sig = this.getDoubleSig(bytes);
		if(sig == 0 && exp == -1023) return 0.0;
		return sign * (1.0 + Math.pow(2,-52) * sig) * Math.pow(2,exp);
	}
	,readFloat: function() {
		var bytes = [];
		bytes.push(this.readByte());
		bytes.push(this.readByte());
		bytes.push(this.readByte());
		bytes.push(this.readByte());
		if(this.bigEndian) bytes.reverse();
		var sign = 1 - (bytes[0] >> 7 << 1);
		var exp = (bytes[0] << 1 & 255 | bytes[1] >> 7) - 127;
		var sig = (bytes[1] & 127) << 16 | bytes[2] << 8 | bytes[3];
		if(sig == 0 && exp == -127) return 0.0;
		return sign * (1 + Math.pow(2,-23) * sig) * Math.pow(2,exp);
	}
	,readLine: function() {
		var buf = new StringBuf();
		var last;
		var s;
		try {
			while((last = this.readByte()) != 10) buf.b += String.fromCharCode(last);
			s = buf.b;
			if(HxOverrides.cca(s,s.length - 1) == 13) s = HxOverrides.substr(s,0,-1);
		} catch( e ) {
			if( js.Boot.__instanceof(e,haxe.io.Eof) ) {
				s = buf.b;
				if(s.length == 0) throw e;
			} else throw(e);
		}
		return s;
	}
	,readUntil: function(end) {
		var buf = new StringBuf();
		var last;
		while((last = this.readByte()) != end) buf.b += String.fromCharCode(last);
		return buf.b;
	}
	,read: function(nbytes) {
		var s = haxe.io.Bytes.alloc(nbytes);
		var p = 0;
		while(nbytes > 0) {
			var k = this.readBytes(s,p,nbytes);
			if(k == 0) throw haxe.io.Error.Blocked;
			p += k;
			nbytes -= k;
		}
		return s;
	}
	,readFullBytes: function(s,pos,len) {
		while(len > 0) {
			var k = this.readBytes(s,pos,len);
			pos += k;
			len -= k;
		}
	}
	,readAll: function(bufsize) {
		if(bufsize == null) bufsize = 16384;
		var buf = haxe.io.Bytes.alloc(bufsize);
		var total = new haxe.io.BytesBuffer();
		try {
			while(true) {
				var len = this.readBytes(buf,0,bufsize);
				if(len == 0) throw haxe.io.Error.Blocked;
				total.addBytes(buf,0,len);
			}
		} catch( e ) {
			if( js.Boot.__instanceof(e,haxe.io.Eof) ) {
			} else throw(e);
		}
		return total.getBytes();
	}
	,setEndian: function(b) {
		this.bigEndian = b;
		return b;
	}
	,close: function() {
	}
	,readBytes: function(s,pos,len) {
		var k = len;
		var b = s.b;
		if(pos < 0 || len < 0 || pos + len > s.length) throw haxe.io.Error.OutsideBounds;
		while(k > 0) {
			b[pos] = this.readByte();
			pos++;
			k--;
		}
		return len;
	}
	,readByte: function() {
		return (function($this) {
			var $r;
			throw "Not implemented";
			return $r;
		}(this));
	}
	,bigEndian: null
	,__class__: haxe.io.Input
	,__properties__: {set_bigEndian:"setEndian"}
}
haxe.io.Output = $hxClasses["haxe.io.Output"] = function() { }
haxe.io.Output.__name__ = ["haxe","io","Output"];
haxe.io.Output.prototype = {
	writeString: function(s) {
		var b = haxe.io.Bytes.ofString(s);
		this.writeFullBytes(b,0,b.length);
	}
	,writeInput: function(i,bufsize) {
		if(bufsize == null) bufsize = 4096;
		var buf = haxe.io.Bytes.alloc(bufsize);
		try {
			while(true) {
				var len = i.readBytes(buf,0,bufsize);
				if(len == 0) throw haxe.io.Error.Blocked;
				var p = 0;
				while(len > 0) {
					var k = this.writeBytes(buf,p,len);
					if(k == 0) throw haxe.io.Error.Blocked;
					p += k;
					len -= k;
				}
			}
		} catch( e ) {
			if( js.Boot.__instanceof(e,haxe.io.Eof) ) {
			} else throw(e);
		}
	}
	,prepare: function(nbytes) {
	}
	,writeInt32: function(x) {
		if(this.bigEndian) {
			this.writeByte(haxe.Int32.toInt(x >>> 24));
			this.writeByte(haxe.Int32.toInt(x >>> 16) & 255);
			this.writeByte(haxe.Int32.toInt(x >>> 8) & 255);
			this.writeByte(haxe.Int32.toInt(x & (255 | 0)));
		} else {
			this.writeByte(haxe.Int32.toInt(x & (255 | 0)));
			this.writeByte(haxe.Int32.toInt(x >>> 8) & 255);
			this.writeByte(haxe.Int32.toInt(x >>> 16) & 255);
			this.writeByte(haxe.Int32.toInt(x >>> 24));
		}
	}
	,writeUInt30: function(x) {
		if(x < 0 || x >= 1073741824) throw haxe.io.Error.Overflow;
		if(this.bigEndian) {
			this.writeByte(x >>> 24);
			this.writeByte(x >> 16 & 255);
			this.writeByte(x >> 8 & 255);
			this.writeByte(x & 255);
		} else {
			this.writeByte(x & 255);
			this.writeByte(x >> 8 & 255);
			this.writeByte(x >> 16 & 255);
			this.writeByte(x >>> 24);
		}
	}
	,writeInt31: function(x) {
		if(x < -1073741824 || x >= 1073741824) throw haxe.io.Error.Overflow;
		if(this.bigEndian) {
			this.writeByte(x >>> 24);
			this.writeByte(x >> 16 & 255);
			this.writeByte(x >> 8 & 255);
			this.writeByte(x & 255);
		} else {
			this.writeByte(x & 255);
			this.writeByte(x >> 8 & 255);
			this.writeByte(x >> 16 & 255);
			this.writeByte(x >>> 24);
		}
	}
	,writeUInt24: function(x) {
		if(x < 0 || x >= 16777216) throw haxe.io.Error.Overflow;
		if(this.bigEndian) {
			this.writeByte(x >> 16);
			this.writeByte(x >> 8 & 255);
			this.writeByte(x & 255);
		} else {
			this.writeByte(x & 255);
			this.writeByte(x >> 8 & 255);
			this.writeByte(x >> 16);
		}
	}
	,writeInt24: function(x) {
		if(x < -8388608 || x >= 8388608) throw haxe.io.Error.Overflow;
		this.writeUInt24(x & 16777215);
	}
	,writeUInt16: function(x) {
		if(x < 0 || x >= 65536) throw haxe.io.Error.Overflow;
		if(this.bigEndian) {
			this.writeByte(x >> 8);
			this.writeByte(x & 255);
		} else {
			this.writeByte(x & 255);
			this.writeByte(x >> 8);
		}
	}
	,writeInt16: function(x) {
		if(x < -32768 || x >= 32768) throw haxe.io.Error.Overflow;
		this.writeUInt16(x & 65535);
	}
	,writeInt8: function(x) {
		if(x < -128 || x >= 128) throw haxe.io.Error.Overflow;
		this.writeByte(x & 255);
	}
	,writeDouble: function(x) {
		if(x == 0.0) {
			this.writeByte(0);
			this.writeByte(0);
			this.writeByte(0);
			this.writeByte(0);
			this.writeByte(0);
			this.writeByte(0);
			this.writeByte(0);
			this.writeByte(0);
			return;
		}
		var exp = Math.floor(Math.log(Math.abs(x)) / haxe.io.Output.LN2);
		var sig = Math.floor(Math.abs(x) / Math.pow(2,exp) * Math.pow(2,52));
		var sig_h = sig & 34359738367;
		var sig_l = Math.floor(sig / Math.pow(2,32));
		var b1 = exp + 1023 >> 4 | (exp > 0?x < 0?128:64:x < 0?128:0), b2 = exp + 1023 << 4 & 255 | sig_l >> 16 & 15, b3 = sig_l >> 8 & 255, b4 = sig_l & 255, b5 = sig_h >> 24 & 255, b6 = sig_h >> 16 & 255, b7 = sig_h >> 8 & 255, b8 = sig_h & 255;
		if(this.bigEndian) {
			this.writeByte(b8);
			this.writeByte(b7);
			this.writeByte(b6);
			this.writeByte(b5);
			this.writeByte(b4);
			this.writeByte(b3);
			this.writeByte(b2);
			this.writeByte(b1);
		} else {
			this.writeByte(b1);
			this.writeByte(b2);
			this.writeByte(b3);
			this.writeByte(b4);
			this.writeByte(b5);
			this.writeByte(b6);
			this.writeByte(b7);
			this.writeByte(b8);
		}
	}
	,writeFloat: function(x) {
		if(x == 0.0) {
			this.writeByte(0);
			this.writeByte(0);
			this.writeByte(0);
			this.writeByte(0);
			return;
		}
		var exp = Math.floor(Math.log(Math.abs(x)) / haxe.io.Output.LN2);
		var sig = Math.floor(Math.abs(x) / Math.pow(2,exp) * 8388608) & 8388607;
		var b1 = exp + 127 >> 1 | (exp > 0?x < 0?128:64:x < 0?128:0), b2 = exp + 127 << 7 & 255 | sig >> 16 & 127, b3 = sig >> 8 & 255, b4 = sig & 255;
		if(this.bigEndian) {
			this.writeByte(b4);
			this.writeByte(b3);
			this.writeByte(b2);
			this.writeByte(b1);
		} else {
			this.writeByte(b1);
			this.writeByte(b2);
			this.writeByte(b3);
			this.writeByte(b4);
		}
	}
	,writeFullBytes: function(s,pos,len) {
		while(len > 0) {
			var k = this.writeBytes(s,pos,len);
			pos += k;
			len -= k;
		}
	}
	,write: function(s) {
		var l = s.length;
		var p = 0;
		while(l > 0) {
			var k = this.writeBytes(s,p,l);
			if(k == 0) throw haxe.io.Error.Blocked;
			p += k;
			l -= k;
		}
	}
	,setEndian: function(b) {
		this.bigEndian = b;
		return b;
	}
	,close: function() {
	}
	,flush: function() {
	}
	,writeBytes: function(s,pos,len) {
		var k = len;
		var b = s.b;
		if(pos < 0 || len < 0 || pos + len > s.length) throw haxe.io.Error.OutsideBounds;
		while(k > 0) {
			this.writeByte(b[pos]);
			pos++;
			k--;
		}
		return len;
	}
	,writeByte: function(c) {
		throw "Not implemented";
	}
	,bigEndian: null
	,__class__: haxe.io.Output
	,__properties__: {set_bigEndian:"setEndian"}
}
if(!haxe.xml) haxe.xml = {}
haxe.xml.Parser = $hxClasses["haxe.xml.Parser"] = function() { }
haxe.xml.Parser.__name__ = ["haxe","xml","Parser"];
haxe.xml.Parser.parse = function(str) {
	var doc = Xml.createDocument();
	haxe.xml.Parser.doParse(str,0,doc);
	return doc;
}
haxe.xml.Parser.doParse = function(str,p,parent) {
	if(p == null) p = 0;
	var xml = null;
	var state = 1;
	var next = 1;
	var aname = null;
	var start = 0;
	var nsubs = 0;
	var nbrackets = 0;
	var c = str.charCodeAt(p);
	while(!(c != c)) {
		switch(state) {
		case 0:
			switch(c) {
			case 10:case 13:case 9:case 32:
				break;
			default:
				state = next;
				continue;
			}
			break;
		case 1:
			switch(c) {
			case 60:
				state = 0;
				next = 2;
				break;
			default:
				start = p;
				state = 13;
				continue;
			}
			break;
		case 13:
			if(c == 60) {
				var child = Xml.createPCData(HxOverrides.substr(str,start,p - start));
				parent.addChild(child);
				nsubs++;
				state = 0;
				next = 2;
			}
			break;
		case 17:
			if(c == 93 && str.charCodeAt(p + 1) == 93 && str.charCodeAt(p + 2) == 62) {
				var child = Xml.createCData(HxOverrides.substr(str,start,p - start));
				parent.addChild(child);
				nsubs++;
				p += 2;
				state = 1;
			}
			break;
		case 2:
			switch(c) {
			case 33:
				if(str.charCodeAt(p + 1) == 91) {
					p += 2;
					if(HxOverrides.substr(str,p,6).toUpperCase() != "CDATA[") throw "Expected <![CDATA[";
					p += 5;
					state = 17;
					start = p + 1;
				} else if(str.charCodeAt(p + 1) == 68 || str.charCodeAt(p + 1) == 100) {
					if(HxOverrides.substr(str,p + 2,6).toUpperCase() != "OCTYPE") throw "Expected <!DOCTYPE";
					p += 8;
					state = 16;
					start = p + 1;
				} else if(str.charCodeAt(p + 1) != 45 || str.charCodeAt(p + 2) != 45) throw "Expected <!--"; else {
					p += 2;
					state = 15;
					start = p + 1;
				}
				break;
			case 63:
				state = 14;
				start = p;
				break;
			case 47:
				if(parent == null) throw "Expected node name";
				start = p + 1;
				state = 0;
				next = 10;
				break;
			default:
				state = 3;
				start = p;
				continue;
			}
			break;
		case 3:
			if(!(c >= 97 && c <= 122 || c >= 65 && c <= 90 || c >= 48 && c <= 57 || c == 58 || c == 46 || c == 95 || c == 45)) {
				if(p == start) throw "Expected node name";
				xml = Xml.createElement(HxOverrides.substr(str,start,p - start));
				parent.addChild(xml);
				state = 0;
				next = 4;
				continue;
			}
			break;
		case 4:
			switch(c) {
			case 47:
				state = 11;
				nsubs++;
				break;
			case 62:
				state = 9;
				nsubs++;
				break;
			default:
				state = 5;
				start = p;
				continue;
			}
			break;
		case 5:
			if(!(c >= 97 && c <= 122 || c >= 65 && c <= 90 || c >= 48 && c <= 57 || c == 58 || c == 46 || c == 95 || c == 45)) {
				var tmp;
				if(start == p) throw "Expected attribute name";
				tmp = HxOverrides.substr(str,start,p - start);
				aname = tmp;
				if(xml.exists(aname)) throw "Duplicate attribute";
				state = 0;
				next = 6;
				continue;
			}
			break;
		case 6:
			switch(c) {
			case 61:
				state = 0;
				next = 7;
				break;
			default:
				throw "Expected =";
			}
			break;
		case 7:
			switch(c) {
			case 34:case 39:
				state = 8;
				start = p;
				break;
			default:
				throw "Expected \"";
			}
			break;
		case 8:
			if(c == str.charCodeAt(start)) {
				var val = HxOverrides.substr(str,start + 1,p - start - 1);
				xml.set(aname,val);
				state = 0;
				next = 4;
			}
			break;
		case 9:
			p = haxe.xml.Parser.doParse(str,p,xml);
			start = p;
			state = 1;
			break;
		case 11:
			switch(c) {
			case 62:
				state = 1;
				break;
			default:
				throw "Expected >";
			}
			break;
		case 12:
			switch(c) {
			case 62:
				if(nsubs == 0) parent.addChild(Xml.createPCData(""));
				return p;
			default:
				throw "Expected >";
			}
			break;
		case 10:
			if(!(c >= 97 && c <= 122 || c >= 65 && c <= 90 || c >= 48 && c <= 57 || c == 58 || c == 46 || c == 95 || c == 45)) {
				if(start == p) throw "Expected node name";
				var v = HxOverrides.substr(str,start,p - start);
				if(v != parent.getNodeName()) throw "Expected </" + parent.getNodeName() + ">";
				state = 0;
				next = 12;
				continue;
			}
			break;
		case 15:
			if(c == 45 && str.charCodeAt(p + 1) == 45 && str.charCodeAt(p + 2) == 62) {
				parent.addChild(Xml.createComment(HxOverrides.substr(str,start,p - start)));
				p += 2;
				state = 1;
			}
			break;
		case 16:
			if(c == 91) nbrackets++; else if(c == 93) nbrackets--; else if(c == 62 && nbrackets == 0) {
				parent.addChild(Xml.createDocType(HxOverrides.substr(str,start,p - start)));
				state = 1;
			}
			break;
		case 14:
			if(c == 63 && str.charCodeAt(p + 1) == 62) {
				p++;
				var str1 = HxOverrides.substr(str,start + 1,p - start - 2);
				parent.addChild(Xml.createProlog(str1));
				state = 1;
			}
			break;
		}
		c = str.charCodeAt(++p);
	}
	if(state == 1) {
		start = p;
		state = 13;
	}
	if(state == 13) {
		if(p != start || nsubs == 0) parent.addChild(Xml.createPCData(HxOverrides.substr(str,start,p - start)));
		return p;
	}
	throw "Unexpected end";
}
haxe.xml.Parser.isValidChar = function(c) {
	return c >= 97 && c <= 122 || c >= 65 && c <= 90 || c >= 48 && c <= 57 || c == 58 || c == 46 || c == 95 || c == 45;
}
var js = js || {}
js.Boot = $hxClasses["js.Boot"] = function() { }
js.Boot.__name__ = ["js","Boot"];
js.Boot.__unhtml = function(s) {
	return s.split("&").join("&amp;").split("<").join("&lt;").split(">").join("&gt;");
}
js.Boot.__trace = function(v,i) {
	var msg = i != null?i.fileName + ":" + i.lineNumber + ": ":"";
	msg += js.Boot.__string_rec(v,"");
	var d;
	if(typeof(document) != "undefined" && (d = document.getElementById("haxe:trace")) != null) d.innerHTML += js.Boot.__unhtml(msg) + "<br/>"; else if(typeof(console) != "undefined" && console.log != null) console.log(msg);
}
js.Boot.__clear_trace = function() {
	var d = document.getElementById("haxe:trace");
	if(d != null) d.innerHTML = "";
}
js.Boot.isClass = function(o) {
	return o.__name__;
}
js.Boot.isEnum = function(e) {
	return e.__ename__;
}
js.Boot.getClass = function(o) {
	return o.__class__;
}
js.Boot.__string_rec = function(o,s) {
	if(o == null) return "null";
	if(s.length >= 5) return "<...>";
	var t = typeof(o);
	if(t == "function" && (o.__name__ || o.__ename__)) t = "object";
	switch(t) {
	case "object":
		if(o instanceof Array) {
			if(o.__enum__) {
				if(o.length == 2) return o[0];
				var str = o[0] + "(";
				s += "\t";
				var _g1 = 2, _g = o.length;
				while(_g1 < _g) {
					var i = _g1++;
					if(i != 2) str += "," + js.Boot.__string_rec(o[i],s); else str += js.Boot.__string_rec(o[i],s);
				}
				return str + ")";
			}
			var l = o.length;
			var i;
			var str = "[";
			s += "\t";
			var _g = 0;
			while(_g < l) {
				var i1 = _g++;
				str += (i1 > 0?",":"") + js.Boot.__string_rec(o[i1],s);
			}
			str += "]";
			return str;
		}
		var tostr;
		try {
			tostr = o.toString;
		} catch( e ) {
			return "???";
		}
		if(tostr != null && tostr != Object.toString) {
			var s2 = o.toString();
			if(s2 != "[object Object]") return s2;
		}
		var k = null;
		var str = "{\n";
		s += "\t";
		var hasp = o.hasOwnProperty != null;
		for( var k in o ) { ;
		if(hasp && !o.hasOwnProperty(k)) {
			continue;
		}
		if(k == "prototype" || k == "__class__" || k == "__super__" || k == "__interfaces__" || k == "__properties__") {
			continue;
		}
		if(str.length != 2) str += ", \n";
		str += s + k + " : " + js.Boot.__string_rec(o[k],s);
		}
		s = s.substring(1);
		str += "\n" + s + "}";
		return str;
	case "function":
		return "<function>";
	case "string":
		return o;
	default:
		return String(o);
	}
}
js.Boot.__interfLoop = function(cc,cl) {
	if(cc == null) return false;
	if(cc == cl) return true;
	var intf = cc.__interfaces__;
	if(intf != null) {
		var _g1 = 0, _g = intf.length;
		while(_g1 < _g) {
			var i = _g1++;
			var i1 = intf[i];
			if(i1 == cl || js.Boot.__interfLoop(i1,cl)) return true;
		}
	}
	return js.Boot.__interfLoop(cc.__super__,cl);
}
js.Boot.__instanceof = function(o,cl) {
	try {
		if(o instanceof cl) {
			if(cl == Array) return o.__enum__ == null;
			return true;
		}
		if(js.Boot.__interfLoop(o.__class__,cl)) return true;
	} catch( e ) {
		if(cl == null) return false;
	}
	switch(cl) {
	case Int:
		return Math.ceil(o%2147483648.0) === o;
	case Float:
		return typeof(o) == "number";
	case Bool:
		return o === true || o === false;
	case String:
		return typeof(o) == "string";
	case Dynamic:
		return true;
	default:
		if(o == null) return false;
		if(cl == Class && o.__name__ != null) return true; else null;
		if(cl == Enum && o.__ename__ != null) return true; else null;
		return o.__enum__ == cl;
	}
}
js.Boot.__cast = function(o,t) {
	if(js.Boot.__instanceof(o,t)) return o; else throw "Cannot cast " + Std.string(o) + " to " + Std.string(t);
}
js.Lib = $hxClasses["js.Lib"] = function() { }
js.Lib.__name__ = ["js","Lib"];
js.Lib.document = null;
js.Lib.window = null;
js.Lib.debug = function() {
	debugger;
}
js.Lib.alert = function(v) {
	alert(js.Boot.__string_rec(v,""));
}
js.Lib.eval = function(code) {
	return eval(code);
}
js.Lib.setErrorHandler = function(f) {
	js.Lib.onerror = f;
}
var $_;
function $bind(o,m) { var f = function(){ return f.method.apply(f.scope, arguments); }; f.scope = o; f.method = m; return f; };
if(Array.prototype.indexOf) HxOverrides.remove = function(a,o) {
	var i = a.indexOf(o);
	if(i == -1) return false;
	a.splice(i,1);
	return true;
}; else null;
Math.__name__ = ["Math"];
Math.NaN = Number.NaN;
Math.NEGATIVE_INFINITY = Number.NEGATIVE_INFINITY;
Math.POSITIVE_INFINITY = Number.POSITIVE_INFINITY;
$hxClasses.Math = Math;
Math.isFinite = function(i) {
	return isFinite(i);
};
Math.isNaN = function(i) {
	return isNaN(i);
};
String.prototype.__class__ = $hxClasses.String = String;
String.__name__ = ["String"];
Array.prototype.__class__ = $hxClasses.Array = Array;
Array.__name__ = ["Array"];
Date.prototype.__class__ = $hxClasses.Date = Date;
Date.__name__ = ["Date"];
var Int = $hxClasses.Int = { __name__ : ["Int"]};
var Dynamic = $hxClasses.Dynamic = { __name__ : ["Dynamic"]};
var Float = $hxClasses.Float = Number;
Float.__name__ = ["Float"];
var Bool = $hxClasses.Bool = Boolean;
Bool.__ename__ = ["Bool"];
var Class = $hxClasses.Class = { __name__ : ["Class"]};
var Enum = { };
var Void = $hxClasses.Void = { __ename__ : ["Void"]};
Xml.Element = "element";
Xml.PCData = "pcdata";
Xml.CData = "cdata";
Xml.Comment = "comment";
Xml.DocType = "doctype";
Xml.Prolog = "prolog";
Xml.Document = "document";
haxe.Resource.content = [];
if(typeof document != "undefined") js.Lib.document = document;
if(typeof window != "undefined") {
	js.Lib.window = window;
	js.Lib.window.onerror = function(msg,url,line) {
		var f = js.Lib.onerror;
		if(f == null) return false;
		return f(msg,[url + ":" + line]);
	};
}
js.XMLHttpRequest = window.XMLHttpRequest?XMLHttpRequest:window.ActiveXObject?function() {
	try {
		return new ActiveXObject("Msxml2.XMLHTTP");
	} catch( e ) {
		try {
			return new ActiveXObject("Microsoft.XMLHTTP");
		} catch( e1 ) {
			throw "Unable to create XMLHttpRequest object.";
		}
	}
}:(function($this) {
	var $r;
	throw "Unable to create XMLHttpRequest object.";
	return $r;
}(this));
com.wiris.quizzes.JsComponent.idcounter = 0;
com.wiris.quizzes.JsStudentAnswerInput.TYPE_TEXTFIELD = 0;
com.wiris.quizzes.JsStudentAnswerInput.TYPE_IMAGEMATH = 1;
com.wiris.quizzes.JsStudentAnswerInput.TYPE_EDITOR = 2;
com.wiris.quizzes.JsStudentAnswerInput.TYPE_COMPOUND_TEXTFIELD = 3;
com.wiris.quizzes.JsStudentAnswerInput.TYPE_COMPOUND_IMAGEMATH = 4;
com.wiris.quizzes.JsAuthoringInput.TYPE_EDITOR = "inlineEditor";
com.wiris.quizzes.JsAuthoringInput.TYPE_STUDIO = "studio";
com.wiris.quizzes.JsAuthoringInput.CLASS_WIRISSTUDIO = "wirisstudio";
com.wiris.quizzes.JsInputController.DEBUG = false;
com.wiris.quizzes.JsInputController.GET = 1;
com.wiris.quizzes.JsInputController.SET = 2;
com.wiris.quizzes.JsQuizzesFilter.CLASS_QUESTION = "wirisquestion";
com.wiris.quizzes.JsQuizzesFilter.CLASS_QUESTION_INSTANCE = "wirisquestioninstance";
com.wiris.quizzes.JsQuizzesFilter.CLASS_AUTHOR_FIELD = "wirisauthoringfield";
com.wiris.quizzes.JsQuizzesFilter.CLASS_ANSWER_FIELD = "wirisanswerfield";
com.wiris.quizzes.JsQuizzesFilter.CLASS_AUXILIAR_CAS_APPLET = "wirisauxiliarcasapplet";
com.wiris.quizzes.JsQuizzesFilter.CLASS_ANSWER_FEEDBACK = "wirisanswerfeedback";
com.wiris.quizzes.JsQuizzesFilter.CLASS_LANG = "wirislang";
com.wiris.quizzes.api.ConfigurationKeys.WIRIS_URL = "quizzes.wiris.url";
com.wiris.quizzes.api.ConfigurationKeys.EDITOR_URL = "quizzes.editor.url";
com.wiris.quizzes.api.ConfigurationKeys.SERVICE_URL = "quizzes.service.url";
com.wiris.quizzes.api.ConfigurationKeys.PROXY_URL = "quizzes.proxy.url";
com.wiris.quizzes.api.ConfigurationKeys.CACHE_DIR = "quizzes.cache.dir";
com.wiris.quizzes.api.ConfigurationKeys.MAXCONNECTIONS = "quizzes.maxconnections";
com.wiris.quizzes.api.ConfigurationKeys.HTTPPROXY_HOST = "quizzes.httpproxy.host";
com.wiris.quizzes.api.ConfigurationKeys.HTTPPROXY_PORT = "quizzes.httpproxy.port";
com.wiris.quizzes.api.ConfigurationKeys.HTTPPROXY_USER = "quizzes.httpproxy.user";
com.wiris.quizzes.api.ConfigurationKeys.HTTPPROXY_PASS = "quizzes.httpproxy.pass";
com.wiris.quizzes.api.ConfigurationKeys.CONFIGURATION_FILE = "quizzes.configuration.file";
com.wiris.quizzes.api.ConfigurationKeys.REFERER_URL = "quizzes.referer.url";
com.wiris.quizzes.api.ui.QuizzesUIConstants.TEXT_FIELD = "textField";
com.wiris.quizzes.api.ui.QuizzesUIConstants.INLINE_EDITOR = "inlineEditor";
com.wiris.quizzes.api.ui.QuizzesUIConstants.POPUP_EDITOR = "popupEditor";
com.wiris.quizzes.api.ui.QuizzesUIConstants.STUDIO = "studio";
com.wiris.quizzes.impl.MathContent.TYPE_TEXT = "text";
com.wiris.quizzes.impl.MathContent.TYPE_MATHML = "mathml";
com.wiris.quizzes.impl.MathContent.TYPE_IMAGE = "image";
com.wiris.quizzes.impl.MathContent.TYPE_IMAGE_REF = "imageref";
com.wiris.quizzes.impl.MathContent.TYPE_STRING = "string";
com.wiris.quizzes.impl.Answer.tagName = "answer";
com.wiris.quizzes.impl.Assertion.tagName = "assertion";
com.wiris.quizzes.impl.Assertion.SYNTAX_EXPRESSION = "syntax_expression";
com.wiris.quizzes.impl.Assertion.SYNTAX_QUANTITY = "syntax_quantity";
com.wiris.quizzes.impl.Assertion.SYNTAX_STRING = "syntax_string";
com.wiris.quizzes.impl.Assertion.SYNTAX_LIST = "syntax_list";
com.wiris.quizzes.impl.Assertion.PARAM_NO_BRACKETS_LIST = "nobracketslist";
com.wiris.quizzes.impl.Assertion.EQUIVALENT_SYMBOLIC = "equivalent_symbolic";
com.wiris.quizzes.impl.Assertion.EQUIVALENT_LITERAL = "equivalent_literal";
com.wiris.quizzes.impl.Assertion.EQUIVALENT_EQUATIONS = "equivalent_equations";
com.wiris.quizzes.impl.Assertion.EQUIVALENT_FUNCTION = "equivalent_function";
com.wiris.quizzes.impl.Assertion.EQUIVALENT_ALL = "equivalent_all";
com.wiris.quizzes.impl.Assertion.PARAM_ORDER_MATTERS = "ordermatters";
com.wiris.quizzes.impl.Assertion.PARAM_REPETITION_MATTERS = "repetitionmatters";
com.wiris.quizzes.impl.Assertion.CHECK_INTEGER_FORM = "check_integer_form";
com.wiris.quizzes.impl.Assertion.CHECK_FRACTION_FORM = "check_fraction_form";
com.wiris.quizzes.impl.Assertion.CHECK_POLYNOMIAL_FORM = "check_polynomial_form";
com.wiris.quizzes.impl.Assertion.CHECK_RATIONAL_FUNCTION_FORM = "check_rational_function_form";
com.wiris.quizzes.impl.Assertion.CHECK_ELEMENTAL_FUNCTION_FORM = "check_elemental_function_form";
com.wiris.quizzes.impl.Assertion.CHECK_SCIENTIFIC_NOTATION = "check_scientific_notation";
com.wiris.quizzes.impl.Assertion.CHECK_SIMPLIFIED = "check_simplified";
com.wiris.quizzes.impl.Assertion.CHECK_EXPANDED = "check_expanded";
com.wiris.quizzes.impl.Assertion.CHECK_FACTORIZED = "check_factorized";
com.wiris.quizzes.impl.Assertion.CHECK_NO_COMMON_FACTOR = "check_no_common_factor";
com.wiris.quizzes.impl.Assertion.CHECK_DIVISIBLE = "check_divisible";
com.wiris.quizzes.impl.Assertion.CHECK_COMMON_DENOMINATOR = "check_common_denominator";
com.wiris.quizzes.impl.Assertion.CHECK_UNIT = "check_unit";
com.wiris.quizzes.impl.Assertion.CHECK_UNIT_LITERAL = "check_unit_literal";
com.wiris.quizzes.impl.Assertion.CHECK_NO_MORE_DECIMALS = "check_no_more_decimals";
com.wiris.quizzes.impl.Assertion.CHECK_NO_MORE_DIGITS = "check_no_more_digits";
com.wiris.quizzes.impl.Assertion.EQUIVALENT_SET = "equivalent_set";
com.wiris.quizzes.impl.Assertion.syntactic = [com.wiris.quizzes.impl.Assertion.SYNTAX_EXPRESSION,com.wiris.quizzes.impl.Assertion.SYNTAX_QUANTITY,com.wiris.quizzes.impl.Assertion.SYNTAX_STRING];
com.wiris.quizzes.impl.Assertion.equivalent = [com.wiris.quizzes.impl.Assertion.EQUIVALENT_LITERAL,com.wiris.quizzes.impl.Assertion.EQUIVALENT_SYMBOLIC,com.wiris.quizzes.impl.Assertion.EQUIVALENT_EQUATIONS,com.wiris.quizzes.impl.Assertion.EQUIVALENT_ALL,com.wiris.quizzes.impl.Assertion.EQUIVALENT_FUNCTION];
com.wiris.quizzes.impl.Assertion.structure = [com.wiris.quizzes.impl.Assertion.CHECK_INTEGER_FORM,com.wiris.quizzes.impl.Assertion.CHECK_FRACTION_FORM,com.wiris.quizzes.impl.Assertion.CHECK_POLYNOMIAL_FORM,com.wiris.quizzes.impl.Assertion.CHECK_RATIONAL_FUNCTION_FORM,com.wiris.quizzes.impl.Assertion.CHECK_ELEMENTAL_FUNCTION_FORM,com.wiris.quizzes.impl.Assertion.CHECK_SCIENTIFIC_NOTATION];
com.wiris.quizzes.impl.Assertion.checks = [com.wiris.quizzes.impl.Assertion.CHECK_SIMPLIFIED,com.wiris.quizzes.impl.Assertion.CHECK_EXPANDED,com.wiris.quizzes.impl.Assertion.CHECK_FACTORIZED,com.wiris.quizzes.impl.Assertion.CHECK_NO_COMMON_FACTOR,com.wiris.quizzes.impl.Assertion.CHECK_DIVISIBLE,com.wiris.quizzes.impl.Assertion.CHECK_COMMON_DENOMINATOR,com.wiris.quizzes.impl.Assertion.CHECK_UNIT,com.wiris.quizzes.impl.Assertion.CHECK_UNIT_LITERAL,com.wiris.quizzes.impl.Assertion.CHECK_NO_MORE_DECIMALS,com.wiris.quizzes.impl.Assertion.CHECK_NO_MORE_DIGITS];
com.wiris.quizzes.impl.AssertionCheckImpl.tagName = "check";
com.wiris.quizzes.impl.AssertionParam.tagName = "param";
com.wiris.quizzes.impl.ConfigurationImpl.CONFIG_FILE = "quizzes.configuration.file";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_CONFIG_FILE = "configuration.ini";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_DIST_CONFIG_FILE = "integration.ini";
com.wiris.quizzes.impl.ConfigurationImpl.CONFIG_CLASS = "quizzes.configuration.class";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_CONFIG_CLASS = "";
com.wiris.quizzes.impl.ConfigurationImpl.CONFIG_CLASSPATH = "quizzes.configuration.classpath";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_CONFIG_CLASSPATH = "";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_WIRIS_URL = "http://www.wiris.net/demo/wiris";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_EDITOR_URL = "http://www.wiris.net/demo/editor";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_SERVICE_URL = "http://www.wiris.net/demo/quizzes";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_PROXY_URL = "quizzes/service";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_CACHE_DIR = "/var/wiris/cache";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_MAXCONNECTIONS = "20";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_HTTPPROXY_HOST = "";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_HTTPPROXY_PORT = "8080";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_HTTPPROXY_USER = "";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_HTTPPROXY_PASS = "";
com.wiris.quizzes.impl.ConfigurationImpl.DEF_REFERER_URL = "";
com.wiris.quizzes.impl.CorrectAnswer.tagName = "correctAnswer";
com.wiris.quizzes.impl.HTMLGuiConfig.WIRISMULTICHOICE = "wirismultichoice";
com.wiris.quizzes.impl.HTMLGuiConfig.WIRISOPENANSWER = "wirisopenanswer";
com.wiris.quizzes.impl.HTMLGuiConfig.WIRISESSAY = "wirisessay";
com.wiris.quizzes.impl.HTMLGuiConfig.WIRISCORRECTANSWER = "wiriscorrectanswer";
com.wiris.quizzes.impl.HTMLGuiConfig.WIRISVARIABLES = "wirisvariables";
com.wiris.quizzes.impl.HTMLGuiConfig.WIRISVALIDATION = "wirisvalidation";
com.wiris.quizzes.impl.HTMLGuiConfig.WIRISPREVIEW = "wirispreview";
com.wiris.quizzes.impl.HTMLGuiConfig.WIRISTEACHERANSWER = "wiristeacheranswer";
com.wiris.quizzes.impl.HTMLGuiConfig.WIRISAUXILIARCAS = "wirisauxiliarcas";
com.wiris.quizzes.impl.HTMLGuiConfig.WIRISAUXILIARCASREPLACEEDITOR = "wirisauxiliarcasreplaceeditor";
com.wiris.quizzes.impl.HTMLGuiConfig.WIRISGRADINGFUNCTION = "wirisgradingfunction";
com.wiris.quizzes.impl.HTMLTools.POSITION_NONE = -1;
com.wiris.quizzes.impl.HTMLTools.POSITION_ONLY_TEXT = 1;
com.wiris.quizzes.impl.HTMLTools.POSITION_ONLY_MATHML = 2;
com.wiris.quizzes.impl.HTMLTools.POSITION_ALL = 3;
com.wiris.quizzes.impl.LocalData.tagName = "data";
com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER = "inputCompound";
com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_INPUT_FIELD = "inputField";
com.wiris.quizzes.impl.LocalData.KEY_SHOW_CAS = "cas";
com.wiris.quizzes.impl.LocalData.KEY_CAS_INITIAL_SESSION = "casSession";
com.wiris.quizzes.impl.LocalData.KEY_CAS_SESSION = "casSession";
com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE = "gradeCompound";
com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTION = "gradeCompoundDistribution";
com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_TRUE = "true";
com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_FALSE = "false";
com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_INLINE_EDITOR = "inlineEditor";
com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_POPUP_EDITOR = "popupEditor";
com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_INPUT_FIELD_PLAIN_TEXT = "textField";
com.wiris.quizzes.impl.LocalData.VALUE_SHOW_CAS_FALSE = "false";
com.wiris.quizzes.impl.LocalData.VALUE_SHOW_CAS_ADD = "add";
com.wiris.quizzes.impl.LocalData.VALUE_SHOW_CAS_REPLACE_INPUT = "replace";
com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_AND = "and";
com.wiris.quizzes.impl.LocalData.VALUE_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTE = "distribute";
com.wiris.quizzes.impl.LocalData.keys = [com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER,com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_INPUT_FIELD,com.wiris.quizzes.impl.LocalData.KEY_SHOW_CAS,com.wiris.quizzes.impl.LocalData.KEY_CAS_INITIAL_SESSION,com.wiris.quizzes.impl.LocalData.KEY_CAS_SESSION,com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE,com.wiris.quizzes.impl.LocalData.KEY_OPENANSWER_COMPOUND_ANSWER_GRADE_DISTRIBUTION];
com.wiris.quizzes.impl.MaxConnectionsHttpImpl.CONNECTION_TIMEOUT = 60;
com.wiris.quizzes.impl.MaxConnectionsHttpImpl.DATA_KEY_MAX_CONNECTIONS = "wiris_maxconnections";
com.wiris.quizzes.impl.MultipleQuestionRequest.tagName = "processQuestions";
com.wiris.quizzes.impl.MultipleQuestionResponse.tagName = "processQuestionsResult";
com.wiris.quizzes.impl.Option.OPTION_RELATIVE_TOLERANCE = "relative_tolerance";
com.wiris.quizzes.impl.Option.OPTION_TOLERANCE = "tolerance";
com.wiris.quizzes.impl.Option.OPTION_PRECISION = "precision";
com.wiris.quizzes.impl.Option.OPTION_TIMES_OPERATOR = "times_operator";
com.wiris.quizzes.impl.Option.OPTION_IMAGINARY_UNIT = "imaginary_unit";
com.wiris.quizzes.impl.Option.OPTION_EXPONENTIAL_E = "exponential_e";
com.wiris.quizzes.impl.Option.OPTION_NUMBER_PI = "number_pi";
com.wiris.quizzes.impl.Option.OPTION_IMPLICIT_TIMES_OPERATOR = "implicit_times_operator";
com.wiris.quizzes.impl.Option.options = [com.wiris.quizzes.impl.Option.OPTION_RELATIVE_TOLERANCE,com.wiris.quizzes.impl.Option.OPTION_TOLERANCE,com.wiris.quizzes.impl.Option.OPTION_PRECISION,com.wiris.quizzes.impl.Option.OPTION_TIMES_OPERATOR,com.wiris.quizzes.impl.Option.OPTION_IMAGINARY_UNIT,com.wiris.quizzes.impl.Option.OPTION_EXPONENTIAL_E,com.wiris.quizzes.impl.Option.OPTION_NUMBER_PI,com.wiris.quizzes.impl.Option.OPTION_IMPLICIT_TIMES_OPERATOR];
com.wiris.quizzes.impl.ProcessGetCheckAssertions.tagName = "getCheckAssertions";
com.wiris.quizzes.impl.ProcessGetTranslation.tagName = "getTranslation";
com.wiris.quizzes.impl.ProcessGetVariables.tagName = "getVariables";
com.wiris.quizzes.impl.ProcessStoreQuestion.tagName = "storeQuestion";
com.wiris.quizzes.impl.Property.tagName = "property";
com.wiris.quizzes.impl.QuestionImpl.tagName = "question";
com.wiris.quizzes.impl.QuestionInstanceImpl.tagName = "questionInstance";
com.wiris.quizzes.impl.QuestionRequestImpl.tagName = "processQuestion";
com.wiris.quizzes.impl.QuestionResponseImpl.tagName = "processQuestionResult";
com.wiris.quizzes.impl.QuizzesServiceImpl.USE_CACHE = true;
com.wiris.quizzes.impl.QuizzesServiceImpl.PROTOCOL_REST = 0;
com.wiris.quizzes.impl.ResultError.tagName = "error";
com.wiris.quizzes.impl.ResultError.TYPE_MATHSYNTAX = "mathSyntax";
com.wiris.quizzes.impl.ResultError.TYPE_PARAMVALUE = "paramValue";
com.wiris.quizzes.impl.ResultErrorLocation.tagName = "location";
com.wiris.quizzes.impl.ResultGetCheckAssertions.tagName = "getCheckAssertionsResult";
com.wiris.quizzes.impl.ResultGetTranslation.tagName = "getTranslationResult";
com.wiris.quizzes.impl.ResultGetVariables.tagName = "getVariablesResult";
com.wiris.quizzes.impl.ResultStoreQuestion.tagName = "storeQuestionResult";
com.wiris.quizzes.impl.Strings.lang = [["lang","en"],["comparisonwithstudentanswer","Comparison with student answer"],["otheracceptedanswers","Other accepted answers"],["equivalent_literal","Literally equal"],["equivalent_literal_correct_feedback","The answer is literally equal to the correct one."],["equivalent_symbolic","Mathematically equal"],["equivalent_symbolic_correct_feedback","The answer is mathematically equal to the correct one."],["equivalent_set","Equal as sets"],["equivalent_set_correct_feedback","The answer set is equal to the correct one."],["equivalent_equations","Equivalent equations"],["equivalent_equations_correct_feedback","The answer has the same solutions as the correct one."],["equivalent_function","Grading function"],["equivalent_function_correct_feedback","The answer is correct."],["equivalent_all","Any answer"],["any","any"],["gradingfunction","Grading function"],["additionalproperties","Additional properties"],["structure","Structure"],["none","none"],["check_integer_form","has integer form"],["check_integer_form_correct_feedback","The answer is an integer."],["check_fraction_form","has fraction form"],["check_fraction_form_correct_feedback","The answer is a fraction."],["check_polynomial_form","has polynomial form"],["check_polynomial_form_correct_feedback","The answer is a polynomial."],["check_rational_function_form","has rational function form"],["check_rational_function_form_correct_feedback","The answer is a rational function."],["check_elemental_function_form","is a combination of elementary functions"],["check_elemental_function_form_correct_feedback","The answer is an elementary expression."],["check_scientific_notation","is expressed in scientific notation"],["check_scientific_notation_correct_feedback","The answer is expressed in scientific notation."],["more","More"],["check_simplified","is simplified"],["check_simplified_correct_feedback","The answer is simplified."],["check_expanded","is expanded"],["check_expanded_correct_feedback","The answer is expanded."],["check_factorized","is factorized"],["check_factorized_correct_feedback","The answer is factorized."],["check_no_common_factor","doesn't have common factors"],["check_no_common_factor_correct_feedback","The answer doesn't have common factors."],["check_divisible","is divisible by"],["check_divisible_correct_feedback","The answer is divisible by ${value}."],["check_common_denominator","has a single common denominator"],["check_common_denominator_correct_feedback","The answer has a single common denominator."],["check_unit","has unit equivalent to"],["check_unit_correct_feedback","The unit of the answer is ${unit}."],["check_unit_literal","has unit literally equal to"],["check_unit_literal_correct_feedback","The unit of the answer is ${unit}."],["check_no_more_decimals","has less or equal decimals than"],["check_no_more_decimals_correct_feedback","The answer has ${digits} or less decimals."],["check_no_more_digits","has less or equal digits than"],["check_no_more_digits_correct_feedback","The answer has ${digits} or less digits."],["syntax_expression","General"],["syntax_expression_description","(formulas, expressions, equations, matrices...)"],["syntax_expression_correct_feedback","The answer syntax is correct."],["syntax_quantity","Quantity"],["syntax_quantity_description","(numbers, measure units, fractions, mixed fractions, ratios...)"],["syntax_quantity_correct_feedback","The answer syntax is correct."],["syntax_list","List"],["syntax_list_description","(lists without comma separator or brackets)"],["syntax_list_correct_feedback","The answer syntax is correct."],["syntax_string","Text"],["syntax_string_description","(words, sentences, character strings)"],["syntax_string_correct_feedback","The answer syntax is correct."],["none","none"],["edit","Edit"],["accept","Accept"],["cancel","Cancel"],["explog","exp/log"],["trigonometric","trigonometric"],["hyperbolic","hyperbolic"],["arithmetic","arithmetic"],["all","all"],["tolerance","Tolerance"],["relative","relative"],["relativetolerance","Relative tolerance"],["precision","Precision"],["implicit_times_operator","Invisible times operator"],["times_operator","Times operator"],["imaginary_unit","Imaginary unit"],["mixedfractions","Mixed fractions"],["constants","Constants"],["functions","Functions"],["userfunctions","User functions"],["units","Units"],["unitprefixes","Unit prefixes"],["syntaxparams","Syntax options"],["syntaxparams_expression","Options for general"],["syntaxparams_quantity","Options for quantity"],["syntaxparams_list","Options for list"],["allowedinput","Allowed input"],["manual","Manual"],["correctanswer","Correct answer"],["variables","Variables"],["validation","Validation"],["preview","Preview"],["correctanswertabhelp","Insert the correct answer using WIRIS editor. Select also the behaviour for the formula editor when used by the student.\nYou will not be able to store the answer until it is a valid expression.\n"],["assertionstabhelp","Select which properties the student answer has to verify. For example, if it has to be simplified, factorized, expressed using physical units or have a specific numerical precision."],["variablestabhelp","Write an algorithm with WIRIS cas to create random variables: numbers, expressions, plots or a grading function.\nYou can also specify the output format of the variables shown to the student.\n"],["testtabhelp","Insert a possible student answer to simulate the behaviour of the question. You are using the same tool that the student will use.\nNote that you can also test the evaluation criteria, success and automatic feedback.\n"],["start","Start"],["test","Test"],["clicktesttoevaluate","Click Test button to validate the current answer."],["correct","Correct!"],["incorrect","Incorrect!"],["partiallycorrect","Partially correct!"],["inputmethod","Input method"],["compoundanswer","Compound answer"],["answerinputinlineeditor","WIRIS editor embedded"],["answerinputpopupeditor","WIRIS editor in popup"],["answerinputplaintext","Plain text input field"],["showauxiliarcas","Include WIRIS cas"],["initialcascontent","Initial content"],["tolerancedigits","Tolerance digits"],["validationandvariables","Validation and variables"],["algorithmlanguage","Algorithm language"],["calculatorlanguage","Calculator language"],["hasalgorithm","Has algorithm"],["comparison","Comparison"],["properties","Properties"],["studentanswer","Student answer"],["poweredbywiris","Powered by WIRIS"],["yourchangeswillbelost","Your changes will be lost if you leave the window."],["outputoptions","Output options"],["catalan","Català"],["english","English"],["spanish","Español"],["estonian","Eesti"],["basque","Euskara"],["french","Français"],["german","Deutsch"],["italian","Italiano"],["dutch","Nederlands"],["portuguese","Português (Portugal)"],["javaAppletMissing","Warning! This component cannot be displayed properly because you need to <a href=\"http://www.java.com/en/\">install the Java plugin</a> or <a href=\"http://www.java.com/en/download/help/enable_browser.xml\">enable the Java plugin</a>."],["allanswerscorrect","All answers must be correct"],["distributegrade","Distribute grade"],["no","No"],["add","Add"],["replaceeditor","Replace editor"],["list","List"],["questionxml","Question XML"],["grammarurl","Grammar URL"],["reservedwords","Reserved words"],["forcebrackets","Lists always need curly brackets \"{}\"."],["commaasitemseparator","Use comma \",\" as list item separator."],["confirmimportdeprecated","Import the question?\n    The question you are about to open contains deprecated features. The import process may change slightly the behavior of the question. It is highly recommended that you carefully test de question after import."],["comparesets","Compare as sets"],["nobracketslist","Lists without brackets"],["warningtoleranceprecision","Less precision digits than tolerance digits."],["actionimport","Import"],["actionexport","Export"],["usecase","Match case"],["usespaces","Match spaces"],["notevaluate","Keep arguments unevaluated"],["lang","es"],["comparisonwithstudentanswer","Comparación con la respuesta del estudiante"],["otheracceptedanswers","Otras respuestas aceptadas"],["equivalent_literal","Literalmente igual"],["equivalent_literal_correct_feedback","La respuesta es literalmente igual a la correcta."],["equivalent_symbolic","Matemáticamente igual"],["equivalent_symbolic_correct_feedback","La respuesta es matemáticamente igual a la correcta."],["equivalent_set","Igual como conjuntos"],["equivalent_set_correct_feedback","El conjunto de respuestas es igual al correcto."],["equivalent_equations","Ecuaciones equivalentes"],["equivalent_equations_correct_feedback","La respuesta tiene las soluciones requeridas."],["equivalent_function","Función de calificación"],["equivalent_function_correct_feedback","La respuesta es correcta."],["equivalent_all","Cualquier respuesta"],["any","cualquier"],["gradingfunction","Función de calificación"],["additionalproperties","Propiedades adicionales"],["structure","Estructura"],["none","ninguno"],["check_integer_form","tiene forma de número entero"],["check_integer_form_correct_feedback","La respuesta es un número entero."],["check_fraction_form","tiene forma de fracción"],["check_fraction_form_correct_feedback","La respuesta es una fracción."],["check_polynomial_form","tiene forma de polinomio"],["check_polynomial_form_correct_feedback","La respuesta es un polinomio."],["check_rational_function_form","tiene forma de función racional"],["check_rational_function_form_correct_feedback","La respuesta es una función racional."],["check_elemental_function_form","es una combinación de funciones elementales"],["check_elemental_function_form_correct_feedback","La respuesta es una expresión elemental."],["check_scientific_notation","está expresada en notación científica"],["check_scientific_notation_correct_feedback","La respuesta está expresada en notación científica."],["more","Más"],["check_simplified","está simplificada"],["check_simplified_correct_feedback","La respuesta está simplificada."],["check_expanded","está expandida"],["check_expanded_correct_feedback","La respuesta está expandida."],["check_factorized","está factorizada"],["check_factorized_correct_feedback","La respuesta está factorizada."],["check_no_common_factor","no tiene factores comunes"],["check_no_common_factor_correct_feedback","La respuesta no tiene factores comunes."],["check_divisible","es divisible por"],["check_divisible_correct_feedback","La respuesta es divisible por ${value}."],["check_common_denominator","tiene denominador común"],["check_common_denominator_correct_feedback","La respuesta tiene denominador común."],["check_unit","tiene unidad equivalente a"],["check_unit_correct_feedback","La unidad de respuesta es ${unit}."],["check_unit_literal","tiene unidad literalmente igual a"],["check_unit_literal_correct_feedback","La unidad de respuesta es ${unit}."],["check_no_more_decimals","tiene menos decimales o exactamente"],["check_no_more_decimals_correct_feedback","La respuesta tiene ${digits} o menos decimales."],["check_no_more_digits","tiene menos dígitos o exactamente"],["check_no_more_digits_correct_feedback","La respuesta tiene ${digits} o menos dígitos."],["syntax_expression","General"],["syntax_expression_description","(fórmulas, expresiones, ecuaciones, matrices ...)"],["syntax_expression_correct_feedback","La sintaxis de la respuesta es correcta."],["syntax_quantity","Cantidad"],["syntax_quantity_description","(números, unidades de medida, fracciones, fracciones mixtas, razones...)"],["syntax_quantity_correct_feedback","La sintaxis de la respuesta es correcta."],["syntax_list","Lista"],["syntax_list_description","(listas sin coma separadora o paréntesis)"],["syntax_list_correct_feedback","La sintaxis de la respuesta es correcta."],["syntax_string","Texto"],["syntax_string_description","(palabras, frases, cadenas de caracteres)"],["syntax_string_correct_feedback","La sintaxis de la respuesta es correcta."],["none","ninguno"],["edit","Editar"],["accept","Aceptar"],["cancel","Cancelar"],["explog","exp/log"],["trigonometric","trigonométricas"],["hyperbolic","hiperbólicas"],["arithmetic","aritmética"],["all","todo"],["tolerance","Tolerancia"],["relative","relativa"],["relativetolerance","Tolerancia relativa"],["precision","Precisión"],["implicit_times_operator","Omitir producto"],["times_operator","Operador producto"],["imaginary_unit","Unidad imaginaria"],["mixedfractions","Fracciones mixtas"],["constants","Constantes"],["functions","Funciones"],["userfunctions","Funciones de usuario"],["units","Unidades"],["unitprefixes","Prefijos de unidades"],["syntaxparams","Opciones de sintaxis"],["syntaxparams_expression","Opciones para general"],["syntaxparams_quantity","Opciones para cantidad"],["syntaxparams_list","Opciones para lista"],["allowedinput","Entrada permitida"],["manual","Manual"],["correctanswer","Respuesta correcta"],["variables","Variables"],["validation","Validación"],["preview","Vista previa"],["correctanswertabhelp","Introduzca la respuesta correcta utilizando WIRIS editor. Seleccione también el comportamiento del editor de fórmulas cuando sea utilizado por el estudiante.\nNo podrá guardar la respuesta hasta que sea una expresión válida.\n"],["assertionstabhelp","Seleccione las propiedades que deben cumplir las respuestas de estudiante. Por ejemplo, si tiene que estar simplificado, factorizado, expresado utilizando unidades físicas o tener una precisión numérica específica."],["variablestabhelp","Escriba un algoritmo con WIRIS CAS para crear variables aleatorias: números, expresiones, gráficas o funciones de calificación.\nTambién puede especificar el formato de salida de las variables que se muestran a los estudiantes.\n"],["testtabhelp","Insertar una posible respuesta de estudiante para simular el comportamiento de la pregunta. Está usted utilizando la misma herramienta que el estudiante utilizará.\nObserve que también se pueden probar los criterios de evaluación, el éxito y la retroalimentación automática.\n"],["start","Inicio"],["test","Prueba"],["clicktesttoevaluate","Haga clic en botón de prueba para validar la respuesta actual."],["correct","¡correcto!"],["incorrect","¡incorrecto!"],["partiallycorrect","¡parcialmente correcto!"],["inputmethod","Método de entrada"],["compoundanswer","Respuesta compuesta"],["answerinputinlineeditor","WIRIS editor incrustado"],["answerinputpopupeditor","WIRIS editor en una ventana emergente"],["answerinputplaintext","Campo de entrada de texto llano"],["showauxiliarcas","Incluir WIRIS CAS"],["initialcascontent","Contenido inicial"],["tolerancedigits","Dígitos de tolerancia"],["validationandvariables","Validación y variables"],["algorithmlanguage","Idioma del algoritmo"],["calculatorlanguage","Idioma de la calculadora"],["hasalgorithm","Tiene algoritmo"],["comparison","Comparación"],["properties","Propiedades"],["studentanswer","Respuesta del estudiante"],["poweredbywiris","Powered by WIRIS"],["yourchangeswillbelost","Sus cambios se perderán si abandona la ventana."],["outputoptions","Opciones de salida"],["catalan","Català"],["english","English"],["spanish","Español"],["estonian","Eesti"],["basque","Euskara"],["french","Français"],["german","Deutsch"],["italian","Italiano"],["dutch","Nederlands"],["portuguese","Português (Portugal)"],["javaAppletMissing","Aviso! Este componente requiere <a href=\"http://www.java.com/es/\">instalar el plugin de Java</a> o quizás es suficiente <a href=\"http://www.java.com/es/download/help/enable_browser.xml\">activar el plugin de Java</a>."],["allanswerscorrect","Todas las respuestas deben ser correctas"],["distributegrade","Distribuir la nota"],["no","No"],["add","Añadir"],["replaceeditor","Sustituir editor"],["list","Lista"],["questionxml","Question XML"],["grammarurl","Grammar URL"],["reservedwords","Palabras reservadas"],["forcebrackets","Las listas siempre necesitan llaves \"{}\"."],["commaasitemseparator","Utiliza la coma \",\" como separador de elementos de listas."],["confirmimportdeprecated","Importar la pregunta?\nEsta pregunta tiene características obsoletas. El proceso de importación puede modificar el comportamiento de la pregunta. Revise cuidadosamente la pregunta antes de utilizarla."],["comparesets","Compara como conjuntos"],["nobracketslist","Listas sin llaves"],["warningtoleranceprecision","Precisión menor que la tolerancia."],["actionimport","Importar"],["actionexport","Exportar"],["usecase","Coincidir mayúsculas y minúsculas"],["usespaces","Coincidir espacios"],["notevaluate","Mantener los argumentos sin evaluar"],["lang","ca"],["comparisonwithstudentanswer","Comparació amb la resposta de l'estudiant"],["otheracceptedanswers","Altres respostes acceptades"],["equivalent_literal","Literalment igual"],["equivalent_literal_correct_feedback","La resposta és literalment igual a la correcta."],["equivalent_symbolic","Matemàticament igual"],["equivalent_symbolic_correct_feedback","La resposta és matemàticament igual a la correcta."],["equivalent_set","Igual com a conjunts"],["equivalent_set_correct_feedback","El conjunt de respostes és igual al correcte."],["equivalent_equations","Equacions equivalents"],["equivalent_equations_correct_feedback","La resposta té les solucions requerides."],["equivalent_function","Funció de qualificació"],["equivalent_function_correct_feedback","La resposta és correcta."],["equivalent_all","Qualsevol resposta"],["any","qualsevol"],["gradingfunction","Funció de qualificació"],["additionalproperties","Propietats addicionals"],["structure","Estructura"],["none","cap"],["check_integer_form","té forma de nombre enter"],["check_integer_form_correct_feedback","La resposta és un nombre enter."],["check_fraction_form","té forma de fracció"],["check_fraction_form_correct_feedback","La resposta és una fracció."],["check_polynomial_form","té forma de polinomi"],["check_polynomial_form_correct_feedback","La resposta és un polinomi."],["check_rational_function_form","té forma de funció racional"],["check_rational_function_form_correct_feedback","La resposta és una funció racional."],["check_elemental_function_form","és una combinació de funcions elementals"],["check_elemental_function_form_correct_feedback","La resposta és una expressió elemental."],["check_scientific_notation","està expressada en notació científica"],["check_scientific_notation_correct_feedback","La resposta està expressada en notació científica."],["more","Més"],["check_simplified","està simplificada"],["check_simplified_correct_feedback","La resposta està simplificada."],["check_expanded","està expandida"],["check_expanded_correct_feedback","La resposta està expandida."],["check_factorized","està factorizada"],["check_factorized_correct_feedback","La resposta està factorizada."],["check_no_common_factor","no té factors comuns"],["check_no_common_factor_correct_feedback","La resposta no té factors comuns."],["check_divisible","és divisible per"],["check_divisible_correct_feedback","La resposta és divisible per ${value}."],["check_common_denominator","té denominador comú"],["check_common_denominator_correct_feedback","La resposta té denominador comú."],["check_unit","té unitat equivalent a"],["check_unit_correct_feedback","La unitat de resposta és ${unit}."],["check_unit_literal","té unitat literalment igual a"],["check_unit_literal_correct_feedback","La unitat de resposta és ${unit}."],["check_no_more_decimals","té menys decimals o exactament"],["check_no_more_decimals_correct_feedback","La resposta té ${digits} o menys decimals."],["check_no_more_digits","té menys dígits o exactament"],["check_no_more_digits_correct_feedback","La resposta té ${digits} o menys dígits."],["syntax_expression","General"],["syntax_expression_description","(fórmules, expressions, equacions, matrius ...)"],["syntax_expression_correct_feedback","La sintaxi de la resposta és correcta."],["syntax_quantity","Quantitat"],["syntax_quantity_description","(nombres, unitats de mesura, fraccions, fraccions mixtes, raons...)"],["syntax_quantity_correct_feedback","La sintaxi de la resposta és correcta."],["syntax_list","Llista"],["syntax_list_description","(llistes sense coma separadora o parèntesis)"],["syntax_list_correct_feedback","La sintaxi de la resposta és correcta."],["syntax_string","Text"],["syntax_string_description","(paraules, frases, cadenas de caràcters)"],["syntax_string_correct_feedback","La sintaxi de la resposta és correcta."],["none","cap"],["edit","Editar"],["accept","Acceptar"],["cancel","Cancel·lar"],["explog","exp/log"],["trigonometric","trigonomètriques"],["hyperbolic","hiperbòliques"],["arithmetic","aritmètica"],["all","tot"],["tolerance","Tolerància"],["relative","relativa"],["relativetolerance","Tolerància relativa"],["precision","Precisió"],["implicit_times_operator","Ometre producte"],["times_operator","Operador producte"],["imaginary_unit","Unitat imaginària"],["mixedfractions","Fraccions mixtes"],["constants","Constants"],["functions","Funcions"],["userfunctions","Funcions d'usuari"],["units","Unitats"],["unitprefixes","Prefixos d'unitats"],["syntaxparams","Opcions de sintaxi"],["syntaxparams_expression","Opcions per a general"],["syntaxparams_quantity","Opcions per a quantitat"],["syntaxparams_list","Opcions per a llista"],["allowedinput","Entrada permesa"],["manual","Manual"],["correctanswer","Resposta correcta"],["variables","Variables"],["validation","Validació"],["preview","Vista prèvia"],["correctanswertabhelp","Introduïu la resposta correcta utilitzant WIRIS editor. Seleccioneu també el comportament de l'editor de fórmules quan sigui utilitzat per l'estudiant. \nNo podreu guardar la resposta fins que no sigui una expressió vàlida.\n"],["assertionstabhelp","Seleccioneu les propietats que han de complir les respostes d'estudiant. Per exemple, si ha d'estar simplificat, factoritzat, expressat utilitzant unitats físiques o tenir una precisió numèrica específica."],["variablestabhelp","Escriviu un algorisme amb WIRIS CAS per crear variables aleatòries: números, expressions, gràfiques o funcions de qualificació. \nTambé podeu especificar el format de sortida de les variables que es mostren als estudiants.\n"],["testtabhelp","Inserir una possible resposta d'estudiant per simular el comportament de la pregunta. Està utilitzant la mateixa eina que l'estudiant utilitzarà per entrar la resposta.\nObserve que también se pueden probar los criterios de evaluación, el éxito y la retroalimentación automática.\n"],["start","Inici"],["test","Prova"],["clicktesttoevaluate","Feu clic a botó de prova per validar la resposta actual."],["correct","Correcte!"],["incorrect","Incorrecte!"],["partiallycorrect","Parcialment correcte!"],["inputmethod","Mètode d'entrada"],["compoundanswer","Resposta composta"],["answerinputinlineeditor","WIRIS editor incrustat"],["answerinputpopupeditor","WIRIS editor en una finestra emergent"],["answerinputplaintext","Camp d'entrada de text pla"],["showauxiliarcas","Incloure WIRIS CAS"],["initialcascontent","Contingut inicial"],["tolerancedigits","Dígits de tolerància"],["validationandvariables","Validació i variables"],["algorithmlanguage","Idioma de l'algorisme"],["calculatorlanguage","Idioma de la calculadora"],["hasalgorithm","Té algorisme"],["comparison","Comparació"],["properties","Propietats"],["studentanswer","Resposta de l'estudiant"],["poweredbywiris","Powered by WIRIS"],["yourchangeswillbelost","Els seus canvis es perdran si abandona la finestra."],["outputoptions","Opcions de sortida"],["catalan","Català"],["english","English"],["spanish","Español"],["estonian","Eesti"],["basque","Euskara"],["french","Français"],["german","Deutsch"],["italian","Italiano"],["dutch","Nederlands"],["portuguese","Português (Portugal)"],["javaAppletMissing","Warning! This component cannot be displayed properly because you need to <a href=\"http://www.java.com/en/\">install the Java plugin</a> or <a href=\"http://www.java.com/en/download/help/enable_browser.xml\">enable the Java plugin</a>."],["allanswerscorrect","Totes les respostes han de ser correctes"],["distributegrade","Distribueix la nota"],["no","No"],["add","Afegir"],["replaceeditor","Substitueix l'editor"],["list","Llista"],["questionxml","Question XML"],["grammarurl","Grammar URL"],["reservedwords","Paraules reservades"],["forcebrackets","Les llistes sempre necessiten claus \"{}\"."],["commaasitemseparator","Utilitza la coma \",\" com a separador d'elements de llistes."],["confirmimportdeprecated","Importar la pregunta?\nAquesta pregunta conté característiques obsoletes. El procés d'importació pot canviar lleugerament el comportament de la pregunta. És altament recomanat comprovar cuidadosament la pregunta després de la importació."],["comparesets","Compara com a conjunts"],["nobracketslist","Llistes sense claus"],["warningtoleranceprecision","Hi ha menys dígits de precisió que dígits de tolerància."],["actionimport","Importar"],["actionexport","Exportar"],["usecase","Coincideix majúscules i minúscules"],["usespaces","Coincideix espais"],["notevaluate","Mantén els arguments sense avaluar"],["lang","it"],["comparisonwithstudentanswer","Confronto con la risposta dello studente"],["otheracceptedanswers","Altre risposte accettate"],["equivalent_literal","Letteralmente uguale"],["equivalent_literal_correct_feedback","La risposta è letteralmente uguale a quella corretta."],["equivalent_symbolic","Matematicamente uguale"],["equivalent_symbolic_correct_feedback","La risposta è matematicamente uguale a quella corretta."],["equivalent_set","Uguale come serie"],["equivalent_set_correct_feedback","La risposta è una serie uguale a quella corretta."],["equivalent_equations","Equazioni equivalenti"],["equivalent_equations_correct_feedback","La risposta ha le stesse soluzioni di quella corretta."],["equivalent_function","Funzione di classificazione"],["equivalent_function_correct_feedback","La risposta è corretta."],["equivalent_all","Any answer"],["any","qualsiasi"],["gradingfunction","Funzione di classificazione"],["additionalproperties","Proprietà aggiuntive"],["structure","Struttura"],["none","nessuno"],["check_integer_form","corrisponde a un numero intero"],["check_integer_form_correct_feedback","La risposta è un numero intero."],["check_fraction_form","corrisponde a una frazione"],["check_fraction_form_correct_feedback","La risposta è una frazione."],["check_polynomial_form","corrisponde a un polinomio"],["check_polynomial_form_correct_feedback","La risposta è un polinomio."],["check_rational_function_form","corrisponde a una funzione razionale"],["check_rational_function_form_correct_feedback","La risposta è una funzione razionale."],["check_elemental_function_form","è una combinazione di funzioni elementari"],["check_elemental_function_form_correct_feedback","La risposta è un'espressione elementare."],["check_scientific_notation","è espressa in notazione scientifica"],["check_scientific_notation_correct_feedback","La risposta è espressa in notazione scientifica."],["more","Altro"],["check_simplified","è semplificata"],["check_simplified_correct_feedback","La risposta è semplificata."],["check_expanded","è espansa"],["check_expanded_correct_feedback","La risposta è espansa."],["check_factorized","è scomposta in fattori"],["check_factorized_correct_feedback","La risposta è scomposta in fattori."],["check_no_common_factor","non ha fattori comuni"],["check_no_common_factor_correct_feedback","La risposta non ha fattori comuni."],["check_divisible","è divisibile per"],["check_divisible_correct_feedback","La risposta è divisibile per ${value}."],["check_common_denominator","ha un solo denominatore comune"],["check_common_denominator_correct_feedback","La risposta ha un solo denominatore comune."],["check_unit","ha un'unità equivalente a"],["check_unit_correct_feedback","La risposta è l'unità ${unit}."],["check_unit_literal","ha un'unità letteralmente uguale a"],["check_unit_literal_correct_feedback","La risposta è l'unità ${unit}."],["check_no_more_decimals","ha un numero inferiore o uguale di decimali rispetto a"],["check_no_more_decimals_correct_feedback","La risposta ha ${digits} o meno decimali."],["check_no_more_digits","ha un numero inferiore o uguale di cifre rispetto a"],["check_no_more_digits_correct_feedback","La risposta ha ${digits} o meno cifre."],["syntax_expression","Generale"],["syntax_expression_description","(formule, espressioni, equazioni, matrici etc.)"],["syntax_expression_correct_feedback","La sintassi della risposta è corretta."],["syntax_quantity","Quantità"],["syntax_quantity_description","(numeri, unità di misura, frazioni, frazioni miste, proporzioni etc.)"],["syntax_quantity_correct_feedback","La sintassi della risposta è corretta."],["syntax_list","Elenco"],["syntax_list_description","(elenchi senza virgola di separazione o parentesi)"],["syntax_list_correct_feedback","La sintassi della risposta è corretta."],["syntax_string","Text"],["syntax_string_description","(words, sentences, character strings)"],["syntax_string_correct_feedback","The answer syntax is correct."],["none","nessuno"],["edit","Modifica"],["accept","Accetta"],["cancel","Annulla"],["explog","esponenziale/logaritmica"],["trigonometric","trigonometrica"],["hyperbolic","iperbolica"],["arithmetic","aritmetica"],["all","tutto"],["tolerance","Tolleranza"],["relative","relativa"],["relativetolerance","Tolleranza relativa"],["precision","Precisione"],["implicit_times_operator","Operatore prodotto non visibile"],["times_operator","Operatore prodotto"],["imaginary_unit","Unità immaginaria"],["mixedfractions","Frazioni miste"],["constants","Costanti"],["functions","Funzioni"],["userfunctions","Funzioni utente"],["units","Unità"],["unitprefixes","Prefissi unità"],["syntaxparams","Opzioni di sintassi"],["syntaxparams_expression","Opzioni per elementi generali"],["syntaxparams_quantity","Opzioni per la quantità"],["syntaxparams_list","Opzioni per elenchi"],["allowedinput","Input consentito"],["manual","Manuale"],["correctanswer","Risposta corretta"],["variables","Variabili"],["validation","Verifica"],["preview","Anteprima"],["correctanswertabhelp","Inserisci la risposta corretta utilizzando l'editor WIRIS. Seleziona anche un comportamento per l'editor di formule se utilizzato dallo studente.\nNon potrai archiviare la risposta se non si tratta di un'espressione valida.\n"],["assertionstabhelp","Seleziona quali proprietà deve verificare la risposta dello studente. Ad esempio, se la risposta deve essere semplificata, scomposta in fattori o espressa in unità fisiche o se ha una precisione numerica specifica."],["variablestabhelp","Scrivi un algoritmo con WIRIS cas per creare variabili casuali: numeri, espressioni, diagrammi o funzioni di classificazione.\nPuoi anche specificare il formato delle variabili mostrate allo studente.\n"],["testtabhelp","Inserisci la risposta di un possibile studente per simulare il comportamento della domanda. Per questa operazione, utilizzi lo stesso strumento che utilizzerà lo studente.\nNota: puoi anche testare i criteri di valutazione, di risposta corretta e il feedback automatico.\n"],["start","Inizio"],["test","Test"],["clicktesttoevaluate","Fai clic sul pulsante Test per verificare la risposta attuale."],["correct","Risposta corretta."],["incorrect","Risposta sbagliata."],["partiallycorrect","Risposta corretta in parte."],["inputmethod","Metodo di input"],["compoundanswer","Risposta composta"],["answerinputinlineeditor","WIRIS editor integrato"],["answerinputpopupeditor","WIRIS editor nella finestra a comparsa"],["answerinputplaintext","Campo di input testo semplice"],["showauxiliarcas","Includi WIRIS cas"],["initialcascontent","Contenuto iniziale"],["tolerancedigits","Cifre di tolleranza"],["validationandvariables","Verifica e variabili"],["algorithmlanguage","Lingua algoritmo"],["calculatorlanguage","Lingua calcolatrice"],["hasalgorithm","Ha l'algoritmo"],["comparison","Confronto"],["properties","Proprietà"],["studentanswer","Risposta dello studente"],["poweredbywiris","Realizzato con WIRIS"],["yourchangeswillbelost","Se chiudi la finestra, le modifiche andranno perse."],["outputoptions","Opzioni risultato"],["catalan","Català"],["english","English"],["spanish","Español"],["estonian","Eesti"],["basque","Euskara"],["french","Français"],["german","Deutsch"],["italian","Italiano"],["dutch","Nederlands"],["portuguese","Português (Portugal)"],["javaAppletMissing","Warning! This component cannot be displayed properly because you need to <a href=\"http://www.java.com/en/\">install the Java plugin</a> or <a href=\"http://www.java.com/en/download/help/enable_browser.xml\">enable the Java plugin</a>."],["allanswerscorrect","Tutte le risposte devono essere corrette"],["distributegrade","Fornisci voto"],["no","No"],["add","Aggiungi"],["replaceeditor","Sostituisci editor"],["list","Elenco"],["questionxml","XML domanda"],["grammarurl","URL grammatica"],["reservedwords","Parole riservate"],["forcebrackets","Gli elenchi devono sempre contenere le parentesi graffe \"{}\"."],["commaasitemseparator","Utilizza la virgola \",\" per separare gli elementi di un elenco."],["confirmimportdeprecated","Vuoi importare la domanda?\n    La domanda che vuoi aprire contiene funzionalità obsolete. Il processo di importazione potrebbe modificare leggermente il comportamento della domanda. Ti consigliamo di controllare attentamente la domanda dopo l'importazione."],["comparesets","Confronta come serie"],["nobracketslist","Elenchi senza parentesi"],["warningtoleranceprecision","Le cifre di precisione sono inferiori a quelle di tolleranza."],["actionimport","Import"],["actionexport","Export"],["usecase","Match case"],["usespaces","Match spaces"],["notevaluate","Keep arguments unevaluated"],["lang","fr"],["comparisonwithstudentanswer","Comparaison avec la réponse de l'étudiant"],["otheracceptedanswers","Autres réponses acceptées"],["equivalent_literal","Strictement égal"],["equivalent_literal_correct_feedback","La réponse est strictement égale à la bonne réponse."],["equivalent_symbolic","Mathématiquement égal"],["equivalent_symbolic_correct_feedback","La réponse est mathématiquement égale à la bonne réponse."],["equivalent_set","Égal en tant qu'ensembles"],["equivalent_set_correct_feedback","L'ensemble de réponses est égal à la bonne réponse."],["equivalent_equations","Équations équivalentes"],["equivalent_equations_correct_feedback","La réponse partage les mêmes solutions que la bonne réponse."],["equivalent_function","Fonction de gradation"],["equivalent_function_correct_feedback","C'est la bonne réponse."],["equivalent_all","Any answer"],["any","quelconque"],["gradingfunction","Fonction de gradation"],["additionalproperties","Propriétés supplémentaires"],["structure","Structure"],["none","aucune"],["check_integer_form","a la forme d'un entier."],["check_integer_form_correct_feedback","La réponse est un nombre entier."],["check_fraction_form","a la forme d'une fraction"],["check_fraction_form_correct_feedback","La réponse est une fraction."],["check_polynomial_form","a la forme d'un polynôme"],["check_polynomial_form_correct_feedback","La réponse est un polynôme."],["check_rational_function_form","a la forme d'une fonction rationnelle"],["check_rational_function_form_correct_feedback","La réponse est une fonction rationnelle."],["check_elemental_function_form","est une combinaison de fonctions élémentaires"],["check_elemental_function_form_correct_feedback","La réponse est une expression élémentaire."],["check_scientific_notation","est exprimé en notation scientifique"],["check_scientific_notation_correct_feedback","La réponse est exprimée en notation scientifique."],["more","Plus"],["check_simplified","est simplifié"],["check_simplified_correct_feedback","La réponse est simplifiée."],["check_expanded","est développé"],["check_expanded_correct_feedback","La réponse est développée."],["check_factorized","est factorisé"],["check_factorized_correct_feedback","La réponse est factorisée."],["check_no_common_factor","n'a pas de facteurs communs"],["check_no_common_factor_correct_feedback","La réponse n'a pas de facteurs communs."],["check_divisible","est divisible par"],["check_divisible_correct_feedback","La réponse est divisible par ${value}."],["check_common_denominator","a un seul dénominateur commun"],["check_common_denominator_correct_feedback","La réponse inclut un seul dénominateur commun."],["check_unit","inclut une unité équivalente à"],["check_unit_correct_feedback","La bonne unité est ${unit}."],["check_unit_literal","a une unité strictement égale à"],["check_unit_literal_correct_feedback","La bonne unité est ${unit}."],["check_no_more_decimals","a le même nombre ou moins de décimales que"],["check_no_more_decimals_correct_feedback","La réponse inclut au plus ${digits} décimales."],["check_no_more_digits","a le même nombre ou moins de chiffres que"],["check_no_more_digits_correct_feedback","La réponse inclut au plus ${digits} chiffres."],["syntax_expression","Général"],["syntax_expression_description","(formules, expressions, équations, matrices…)"],["syntax_expression_correct_feedback","La syntaxe de la réponse est correcte."],["syntax_quantity","Quantité"],["syntax_quantity_description","(nombres, unités de mesure, fractions, fractions mixtes, proportions…)"],["syntax_quantity_correct_feedback","La syntaxe de la réponse est correcte."],["syntax_list","Liste"],["syntax_list_description","(listes sans virgule ou crochets de séparation)"],["syntax_list_correct_feedback","La syntaxe de la réponse est correcte."],["syntax_string","Text"],["syntax_string_description","(words, sentences, character strings)"],["syntax_string_correct_feedback","The answer syntax is correct."],["none","aucune"],["edit","Modifier"],["accept","Accepter"],["cancel","Annuler"],["explog","exp/log"],["trigonometric","trigonométrique"],["hyperbolic","hyperbolique"],["arithmetic","arithmétique"],["all","toutes"],["tolerance","Tolérance"],["relative","relative"],["relativetolerance","Tolérance relative"],["precision","Précision"],["implicit_times_operator","Opérateur de multiplication invisible"],["times_operator","Opérateur de multiplication"],["imaginary_unit","Unité imaginaire"],["mixedfractions","Fractions mixtes"],["constants","Constantes"],["functions","Fonctions"],["userfunctions","Fonctions personnalisées"],["units","Unités"],["unitprefixes","Préfixes d'unité"],["syntaxparams","Options de syntaxe"],["syntaxparams_expression","Options générales"],["syntaxparams_quantity","Options de quantité"],["syntaxparams_list","Options de liste"],["allowedinput","Entrée autorisée"],["manual","Manuel"],["correctanswer","Bonne réponse"],["variables","Variables"],["validation","Validation"],["preview","Aperçu"],["correctanswertabhelp","Insérer la bonne réponse à l'aide du WIRIS Editor. Sélectionner aussi le comportement de l'éditeur de formule lorsque l'étudiant y fait appel. Vous ne pouvez pas enregistrer la réponse tant qu'il ne s'agit pas d'une expression valide.\n"],["assertionstabhelp","Sélectionner les propriétés que la réponse de l'étudiant doit satisfaire. Par exemple, si elle doit être simplifiée, factorisée, exprimée dans une unité physique ou présenter une précision chiffrée spécifique."],["variablestabhelp","Écrire un algorithme à l'aide de WIRIS CAS pour créer des variables aléatoires : des nombres, des expressions, des courbes ou une fonction de gradation. Vous pouvez aussi spécifier un format des variables pour l'affichage à l'étudiant.\n"],["testtabhelp","Insérer une réponse possible de l'étudiant afin de simuler le comportement de la question. Vous utilisez le même outil que l'étudiant. Notez que vous pouvez aussi tester le critère d'évaluation, de réussite et les commentaires automatiques.\n"],["start","Démarrer"],["test","Tester"],["clicktesttoevaluate","Cliquer sur le bouton Test pour valider la réponse actuelle."],["correct","Correct !"],["incorrect","Incorrect !"],["partiallycorrect","Partiellement correct !"],["inputmethod","Méthode de saisie"],["compoundanswer","Réponse composée"],["answerinputinlineeditor","WIRIS Editor intégré"],["answerinputpopupeditor","WIRIS Editor dans une fenêtre"],["answerinputplaintext","Champ de saisie de texte brut"],["showauxiliarcas","Inclure WIRIS CAS"],["initialcascontent","Contenu initial"],["tolerancedigits","Tolérance en chiffres"],["validationandvariables","Validation et variables"],["algorithmlanguage","Langage d'algorithme"],["calculatorlanguage","Langage de calcul"],["hasalgorithm","Possède un algorithme"],["comparison","Comparaison"],["properties","Propriétés"],["studentanswer","Réponse de l'étudiant"],["poweredbywiris","Développé par WIRIS"],["yourchangeswillbelost","Vous perdrez vos modifications si vous fermez la fenêtre."],["outputoptions","Options de sortie"],["catalan","Català"],["english","English"],["spanish","Español"],["estonian","Eesti"],["basque","Euskara"],["french","Français"],["german","Deutsch"],["italian","Italiano"],["dutch","Nederlands"],["portuguese","Português (Portugal)"],["javaAppletMissing","Warning! This component cannot be displayed properly because you need to <a href=\"http://www.java.com/en/\">install the Java plugin</a> or <a href=\"http://www.java.com/en/download/help/enable_browser.xml\">enable the Java plugin</a>."],["allanswerscorrect","Toutes les réponses doivent être correctes"],["distributegrade","Degré de distribution"],["no","Non"],["add","Ajouter"],["replaceeditor","Remplacer l'éditeur"],["list","Liste"],["questionxml","Question XML"],["grammarurl","URL de la grammaire"],["reservedwords","Mots réservés"],["forcebrackets","Les listes requièrent l'utilisation d'accolades « {} »."],["commaasitemseparator","Utiliser une virgule « , » comme séparateur d'éléments de liste."],["confirmimportdeprecated","Importer la question ? La question que vous êtes sur le point d'ouvrir contient des fonctionnalités obsolètes. Il se peut que la procédure d'importation modifie légèrement le comportement de la question. Il est fortement recommandé de tester attentivement la question après l'importation."],["comparesets","Comparer en tant qu'ensembles"],["nobracketslist","Listes sans crochets"],["warningtoleranceprecision","Moins de chiffres pour la précision que pour la tolérance."],["actionimport","Import"],["actionexport","Export"],["usecase","Match case"],["usespaces","Match spaces"],["notevaluate","Keep arguments unevaluated"],["lang","de"],["comparisonwithstudentanswer","Vergleich mit Schülerantwort"],["otheracceptedanswers","Weitere akzeptierte Antworten"],["equivalent_literal","Im Wortsinn äquivalent"],["equivalent_literal_correct_feedback","Die Antwort ist im Wortsinn äquivalent zur richtigen."],["equivalent_symbolic","Mathematisch äquivalent"],["equivalent_symbolic_correct_feedback","Die Antwort ist mathematisch äquivalent zur richtigen Antwort."],["equivalent_set","Äquivalent als Sätze"],["equivalent_set_correct_feedback","Der Fragensatz ist äquivalent zum richtigen."],["equivalent_equations","Äquivalente Gleichungen"],["equivalent_equations_correct_feedback","Die Antwort hat die gleichen Lösungen wie die richtige."],["equivalent_function","Benotungsfunktion"],["equivalent_function_correct_feedback","Die Antwort ist richtig."],["equivalent_all","Any answer"],["any","Irgendeine"],["gradingfunction","Benotungsfunktion"],["additionalproperties","Zusätzliche Eigenschaften"],["structure","Struktur"],["none","Keine"],["check_integer_form","hat Form einer ganzen Zahl"],["check_integer_form_correct_feedback","Die Antwort ist eine ganze Zahl."],["check_fraction_form","hat Form einer Bruchzahl"],["check_fraction_form_correct_feedback","Die Antwort ist eine Bruchzahl."],["check_polynomial_form","hat Form eines Polynoms"],["check_polynomial_form_correct_feedback","Die Antwort ist ein Polynom."],["check_rational_function_form","hat Form einer rationalen Funktion"],["check_rational_function_form_correct_feedback","Die Antwort ist eine rationale Funktion."],["check_elemental_function_form","ist eine Kombination aus elementaren Funktionen"],["check_elemental_function_form_correct_feedback","Die Antwort ist ein elementarer Ausdruck."],["check_scientific_notation","ist in wissenschaftlicher Schreibweise ausgedrückt"],["check_scientific_notation_correct_feedback","Die Antwort ist in wissenschaftlicher Schreibweise ausgedrückt."],["more","Mehr"],["check_simplified","ist vereinfacht"],["check_simplified_correct_feedback","Die Antwort ist vereinfacht."],["check_expanded","ist erweitert"],["check_expanded_correct_feedback","Die Antwort ist erweitert."],["check_factorized","ist faktorisiert"],["check_factorized_correct_feedback","Die Antwort ist faktorisiert."],["check_no_common_factor","hat keine gemeinsamen Faktoren"],["check_no_common_factor_correct_feedback","Die Antwort hat keine gemeinsamen Faktoren."],["check_divisible","ist teilbar durch"],["check_divisible_correct_feedback","Die Antwort ist teilbar durch ${value}."],["check_common_denominator","hat einen einzigen gemeinsamen Nenner"],["check_common_denominator_correct_feedback","Die Antwort hat einen einzigen gemeinsamen Nenner."],["check_unit","hat äquivalente Einheit zu"],["check_unit_correct_feedback","Die Einheit der Antwort ist ${unit}."],["check_unit_literal","hat Einheit im Wortsinn äquivalent zu"],["check_unit_literal_correct_feedback","Die Einheit der Antwort ist ${unit}."],["check_no_more_decimals","hat weniger als oder gleich viele Dezimalstellen wie"],["check_no_more_decimals_correct_feedback","Die Antwort hat ${digits} oder weniger Dezimalstellen."],["check_no_more_digits","hat weniger oder gleich viele Stellen wie"],["check_no_more_digits_correct_feedback","Die Antwort hat ${digits} oder weniger Stellen."],["syntax_expression","Allgemein"],["syntax_expression_description","(Formeln, Ausdrücke, Gleichungen, Matrizen ...)"],["syntax_expression_correct_feedback","Die Syntax der Antwort ist richtig."],["syntax_quantity","Menge"],["syntax_quantity_description","(Zahlen, Maßeinheiten, Brüche, gemischte Brüche, Verhältnisse ...)"],["syntax_quantity_correct_feedback","Die Syntax der Antwort ist richtig."],["syntax_list","Liste"],["syntax_list_description","(Listen ohne Komma als Trennzeichen oder Klammern)"],["syntax_list_correct_feedback","Die Syntax der Antwort ist richtig."],["syntax_string","Text"],["syntax_string_description","(words, sentences, character strings)"],["syntax_string_correct_feedback","The answer syntax is correct."],["none","Keine"],["edit","Bearbeiten"],["accept","Akzeptieren"],["cancel","Abbrechen"],["explog","exp/log"],["trigonometric","Trigonometrische"],["hyperbolic","Hyperbolische"],["arithmetic","Arithmetische"],["all","Alle"],["tolerance","Toleranz"],["relative","Relative"],["relativetolerance","Relative Toleranz"],["precision","Genauigkeit"],["implicit_times_operator","Unsichtbares Multiplikationszeichen"],["times_operator","Multiplikationszeichen"],["imaginary_unit","Imaginäre Einheit"],["mixedfractions","Gemischte Brüche"],["constants","Konstanten"],["functions","Funktionen"],["userfunctions","Nutzerfunktionen"],["units","Einheiten"],["unitprefixes","Einheitenpräfixe"],["syntaxparams","Syntaxoptionen"],["syntaxparams_expression","Optionen für Allgemein"],["syntaxparams_quantity","Optionen für Menge"],["syntaxparams_list","Optionen für Liste"],["allowedinput","Zulässige Eingabe"],["manual","Anleitung"],["correctanswer","Richtige Antwort"],["variables","Variablen"],["validation","Validierung"],["preview","Vorschau"],["correctanswertabhelp","Geben Sie die richtige Antwort unter Verwendung des WIRIS editors ein. Wählen Sie auch die Verhaltensweise des Formel-Editors, wenn er vom Schüler verwendet wird. Sie können die Antwort erst dann speichern, wenn es sich um einen gültigen Ausdruck handelt.\n"],["assertionstabhelp","Wählen Sie die Eigenschaften, welche die Schülerantwort erfüllen muss: Ob Sie zum Beispiel vereinfacht, faktorisiert, durch physikalische Einheiten ausgedrückt werden oder eine bestimmte numerische Genauigkeit aufweisen soll."],["variablestabhelp","Schreiben Sie einen Algorithmus mit WIRIS cas, um zufällige Variablen zu erstellen:  Zahlen, Ausdrücke, grafische Darstellungen oder eine Benotungsfunktion. Sie können auch das Ausgabeformat bestimmen, in welchem die Variablen dem Schüler angezeigt werden.\n"],["testtabhelp","Geben Sie eine mögliche Schülerantwort ein, um die Verhaltensweise der Frage zu simulieren. Sie verwenden das gleiche Tool, das der Schüler verwenden wird. Beachten Sie bitte, dass Sie auch die Bewertungskriterien, den Erfolg und das automatische Feedback testen können.\n"],["start","Start"],["test","Testen"],["clicktesttoevaluate","Klicken Sie auf die Schaltfläche „Testen“, um die aktuelle Antwort zu validieren."],["correct","Richtig!"],["incorrect","Falsch!"],["partiallycorrect","Teilweise richtig!"],["inputmethod","Eingabemethode"],["compoundanswer","Zusammengesetzte Antwort"],["answerinputinlineeditor","WIRIS editor eingebettet"],["answerinputpopupeditor","WIRIS editor in Popup"],["answerinputplaintext","Eingabefeld mit reinem Text"],["showauxiliarcas","WIRIS cas einbeziehen"],["initialcascontent","Anfangsinhalt"],["tolerancedigits","Toleranzstellen"],["validationandvariables","Validierung und Variablen"],["algorithmlanguage","Algorithmussprache"],["calculatorlanguage","Sprache des Rechners"],["hasalgorithm","Hat Algorithmus"],["comparison","Vergleich"],["properties","Eigenschaften"],["studentanswer","Schülerantwort"],["poweredbywiris","Powered by WIRIS"],["yourchangeswillbelost","Bei Verlassen des Fensters gehen Ihre Änderungen verloren."],["outputoptions","Ausgabeoptionen"],["catalan","Català"],["english","English"],["spanish","Español"],["estonian","Eesti"],["basque","Euskara"],["french","Français"],["german","Deutsch"],["italian","Italiano"],["dutch","Nederlands"],["portuguese","Português (Portugal)"],["javaAppletMissing","Warning! This component cannot be displayed properly because you need to <a href=\"http://www.java.com/en/\">install the Java plugin</a> or <a href=\"http://www.java.com/en/download/help/enable_browser.xml\">enable the Java plugin</a>."],["allanswerscorrect","Alle Antworten müssen richtig sein."],["distributegrade","Note zuweisen"],["no","Nein"],["add","Hinzufügen"],["replaceeditor","Editor ersetzen"],["list","Liste"],["questionxml","Frage-XML"],["grammarurl","Grammatik-URL"],["reservedwords","Reservierte Wörter"],["forcebrackets","Listen benötigen immer geschweifte Klammern „{}“."],["commaasitemseparator","Verwenden Sie ein Komma „,“ zur Trennung von Listenelementen."],["confirmimportdeprecated","Frage importieren? Die Frage, die Sie öffnen möchten, beinhaltet veraltete Merkmale. Durch den Importvorgang kann die Verhaltensweise der Frage leicht verändert werden. Es wird dringend empfohlen, die Frage nach dem Importieren gründlich zu überprüfen."],["comparesets","Als Sätze vergleichen"],["nobracketslist","Listen ohne Klammern"],["warningtoleranceprecision","Weniger Genauigkeitstellen als Toleranzstellen."],["actionimport","Import"],["actionexport","Export"],["usecase","Match case"],["usespaces","Match spaces"],["notevaluate","Keep arguments unevaluated"]];
com.wiris.quizzes.impl.TranslationNameChange.tagName = "nameChange";
com.wiris.quizzes.impl.UserData.tagName = "userData";
com.wiris.quizzes.impl.Variable.tagName = "variable";
com.wiris.settings.PlatformSettings.PARSE_XML_ENTITIES = true;
com.wiris.settings.PlatformSettings.UTF8_CONVERSION = false;
com.wiris.settings.PlatformSettings.IS_JAVASCRIPT = true;
com.wiris.settings.PlatformSettings.IS_FLASH = false;
com.wiris.system.FileLock.TIMEOUT = 5000;
com.wiris.system.FileLock.WAIT = 100;
com.wiris.util.xml.WEntities.s1 = "boxDL@02557@boxDl@02556@boxdL@02555@boxdl@02510@boxDR@02554@boxDr@02553@boxdR@02552@boxdr@0250C@boxH@02550@boxh@02500@boxHD@02566@boxHd@02564@boxhD@02565@boxhd@0252C@boxHU@02569@boxHu@02567@boxhU@02568@boxhu@02534@boxUL@0255D@boxUl@0255C@boxuL@0255B@boxul@02518@boxUR@0255A@boxUr@02559@boxuR@02558@boxur@02514@boxV@02551@boxv@02502@boxVH@0256C@boxVh@0256B@boxvH@0256A@boxvh@0253C@boxVL@02563@boxVl@02562@boxvL@02561@boxvl@02524@boxVR@02560@boxVr@0255F@boxvR@0255E@boxvr@0251C@Acy@00410@acy@00430@Bcy@00411@bcy@00431@CHcy@00427@chcy@00447@Dcy@00414@dcy@00434@Ecy@0042D@ecy@0044D@Fcy@00424@fcy@00444@Gcy@00413@gcy@00433@HARDcy@0042A@hardcy@0044A@Icy@00418@icy@00438@IEcy@00415@iecy@00435@IOcy@00401@iocy@00451@Jcy@00419@jcy@00439@Kcy@0041A@kcy@0043A@KHcy@00425@khcy@00445@Lcy@0041B@lcy@0043B@Mcy@0041C@mcy@0043C@Ncy@0041D@ncy@0043D@numero@02116@Ocy@0041E@ocy@0043E@Pcy@0041F@pcy@0043F@Rcy@00420@rcy@00440@Scy@00421@scy@00441@SHCHcy@00429@shchcy@00449@SHcy@00428@shcy@00448@SOFTcy@0042C@softcy@0044C@Tcy@00422@tcy@00442@TScy@00426@tscy@00446@Ucy@00423@ucy@00443@Vcy@00412@vcy@00432@YAcy@0042F@yacy@0044F@Ycy@0042B@ycy@0044B@YUcy@0042E@yucy@0044E@Zcy@00417@zcy@00437@ZHcy@00416@zhcy@00436@DJcy@00402@djcy@00452@DScy@00405@dscy@00455@DZcy@0040F@dzcy@0045F@GJcy@00403@gjcy@00453@Iukcy@00406@iukcy@00456@Jsercy@00408@jsercy@00458@Jukcy@00404@jukcy@00454@KJcy@0040C@kjcy@0045C@LJcy@00409@ljcy@00459@NJcy@0040A@njcy@0045A@TSHcy@0040B@tshcy@0045B@Ubrcy@0040E@ubrcy@0045E@YIcy@00407@yicy@00457@acute@000B4@breve@002D8@caron@002C7@cedil@000B8@circ@002C6@dblac@002DD@die@000A8@dot@002D9@grave@00060@macr@000AF@ogon@002DB@ring@002DA@tilde@002DC@uml@000A8@Aacute@000C1@aacute@000E1@Acirc@000C2@acirc@000E2@AElig@000C6@aelig@000E6@Agrave@000C0@agrave@000E0@Aring@000C5@aring@000E5@Atilde@000C3@atilde@000E3@Auml@000C4@auml@000E4@Ccedil@000C7@ccedil@000E7@Eacute@000C9@eacute@000E9@Ecirc@000CA@ecirc@000EA@Egrave@000C8@egrave@000E8@ETH@000D0@eth@000F0@Euml@000CB@euml@000EB@Iacute@000CD@iacute@000ED@Icirc@000CE@icirc@000EE@Igrave@000CC@igrave@000EC@Iuml@000CF@iuml@000EF@Ntilde@000D1@ntilde@000F1@Oacute@000D3@oacute@000F3@Ocirc@000D4@ocirc@000F4@Ograve@000D2@ograve@000F2@Oslash@000D8@oslash@000F8@Otilde@000D5@otilde@000F5@Ouml@000D6@ouml@000F6@szlig@000DF@THORN@000DE@thorn@000FE@Uacute@000DA@uacute@000FA@Ucirc@000DB@ucirc@000FB@Ugrave@000D9@ugrave@000F9@Uuml@000DC@uuml@000FC@Yacute@000DD@yacute@000FD@yuml@000FF@Abreve@00102@abreve@00103@Amacr@00100@amacr@00101@Aogon@00104@aogon@00105@Cacute@00106@cacute@00107@Ccaron@0010C@ccaron@0010D@Ccirc@00108@ccirc@00109@Cdot@0010A@cdot@0010B@Dcaron@0010E@dcaron@0010F@Dstrok@00110@dstrok@00111@Ecaron@0011A@ecaron@0011B@Edot@00116@edot@00117@Emacr@00112@emacr@00113@ENG@0014A@eng@0014B@Eogon@00118@eogon@00119@gacute@001F5@Gbreve@0011E@gbreve@0011F@Gcedil@00122@Gcirc@0011C@gcirc@0011D@Gdot@00120@gdot@00121@Hcirc@00124@hcirc@00125@Hstrok@00126@hstrok@00127@Idot@00130@IJlig@00132@ijlig@00133@Imacr@0012A@imacr@0012B@inodot@00131@Iogon@0012E@iogon@0012F@Itilde@00128@itilde@00129@Jcirc@00134@jcirc@00135@Kcedil@00136@kcedil@00137@kgreen@00138@Lacute@00139@lacute@0013A@Lcaron@0013D@lcaron@0013E@Lcedil@0013B@lcedil@0013C@Lmidot@0013F@lmidot@00140@Lstrok@00141@lstrok@00142@Nacute@00143@nacute@00144@napos@00149@Ncaron@00147@ncaron@00148@Ncedil@00145@ncedil@00146@Odblac@00150@odblac@00151@OElig@00152@oelig@00153@Omacr@0014C@omacr@0014D@Racute@00154@racute@00155@Rcaron@00158@rcaron@00159@Rcedil@00156@rcedil@00157@Sacute@0015A@sacute@0015B@Scaron@00160@scaron@00161@Scedil@0015E@scedil@0015F@Scirc@0015C@scirc@0015D@Tcaron@00164@tcaron@00165@Tcedil@00162@tcedil@00163@Tstrok@00166@tstrok@00167@Ubreve@0016C@ubreve@0016D@Udblac@00170@udblac@00171@Umacr@0016A@umacr@0016B@Uogon@00172@uogon@00173@Uring@0016E@uring@0016F@Utilde@00168@utilde@00169@Wcirc@00174@wcirc@00175@Ycirc@00176@ycirc@00177@Yuml@00178@Zacute@00179@zacute@0017A@Zcaron@0017D@zcaron@0017E@Zdot@0017B@zdot@0017C@apos@00027@ast@0002A@brvbar@000A6@bsol@0005C@cent@000A2@colon@0003A@comma@0002C@commat@00040@copy@000A9@curren@000A4@darr@02193@deg@000B0@divide@000F7@dollar@00024@equals@0003D@excl@00021@frac12@000BD@frac14@000BC@frac18@0215B@frac34@000BE@frac38@0215C@frac58@0215D@frac78@0215E@gt@0003E@half@000BD@horbar@02015@hyphen@02010@iexcl@000A1@iquest@000BF@laquo@000AB@larr@02190@lcub@0007B@ldquo@0201C@lowbar@0005F@lpar@00028@lsqb@0005B@lsquo@02018@micro@000B5@middot@000B7@nbsp@000A0@not@000AC@num@00023@ohm@02126@ordf@000AA@ordm@000BA@para@000B6@percnt@00025@period@0002E@plus@0002B@plusmn@000B1@pound@000A3@quest@0003F@quot@00022@raquo@000BB@rarr@02192@rcub@0007D@rdquo@0201D@reg@000AE@rpar@00029@rsqb@0005D@rsquo@02019@sect@000A7@semi@0003B@shy@000AD@sol@0002F@sung@0266A@sup1@000B9@sup2@000B2@sup3@000B3@times@000D7@trade@02122@uarr@02191@verbar@0007C@yen@000A5@blank@02423@blk12@02592@blk14@02591@blk34@02593@block@02588@bull@02022@caret@02041@check@02713@cir@025CB@clubs@02663@copysr@02117@cross@02717@Dagger@02021@dagger@02020@dash@02010@diams@02666@dlcrop@0230D@drcrop@0230C@dtri@025BF@dtrif@025BE@emsp@02003@emsp13@02004@emsp14@02005@ensp@02002@female@02640@ffilig@0FB03@fflig@0FB00@ffllig@0FB04@filig@0FB01@flat@0266D@fllig@0FB02@frac13@02153@frac15@02155@frac16@02159@frac23@02154@frac25@02156@frac35@02157@frac45@02158@frac56@0215A@hairsp@0200A@hearts@02665@hellip@02026@hybull@02043@incare@02105@ldquor@0201E@lhblk@02584@loz@025CA@lozf@029EB@lsquor@0201A@ltri@025C3@ltrif@025C2@male@02642@malt@02720@marker@025AE@mdash@02014@mldr@02026@natur@0266E@ndash@02013@nldr@02025@numsp@02007@phone@0260E@puncsp@02008@rdquor@0201D@rect@025AD@rsquor@02019@rtri@025B9@rtrif@025B8@rx@0211E@sext@02736@sharp@0266F@spades@02660@squ@025A1@squf@025AA@star@02606@starf@02605@target@02316@telrec@02315@thinsp@02009@uhblk@02580@ulcrop@0230F@urcrop@0230E@utri@025B5@utrif@025B4@vellip@022EE@angzarr@0237C@cirmid@02AEF@cudarrl@02938@cudarrr@02935@cularr@021B6@cularrp@0293D@curarr@021B7@curarrm@0293C@Darr@021A1@dArr@021D3@ddarr@021CA@DDotrahd@02911@dfisht@0297F@dHar@02965@dharl@021C3@dharr@021C2@duarr@021F5@duhar@0296F@dzigrarr@027FF@erarr@02971@hArr@021D4@harr@02194@harrcir@02948@harrw@021AD@hoarr@021FF@imof@022B7@lAarr@021DA@Larr@0219E@larrbfs@0291F@larrfs@0291D@larrhk@021A9@larrlp@021AB@larrpl@02939@larrsim@02973@larrtl@021A2@lAtail@0291B@latail@02919@lBarr@0290E@lbarr@0290C@ldca@02936@ldrdhar@02967@ldrushar@0294B@ldsh@021B2@lfisht@0297C@lHar@02962@lhard@021BD@lharu@021BC@lharul@0296A@llarr@021C7@llhard@0296B@loarr@021FD@lrarr@021C6@lrhar@021CB@lrhard@0296D@lsh@021B0@lurdshar@0294A@luruhar@02966@Map@02905@map@021A6@midcir@02AF0@mumap@022B8@nearhk@02924@neArr@021D7@nearr@02197@nesear@02928@nhArr@021CE@nharr@021AE@nlArr@021CD@nlarr@0219A@nrArr@021CF@nrarr@0219B@nvHarr@02904@nvlArr@02902@nvrArr@02903@nwarhk@02923@nwArr@021D6@nwarr@02196@nwnear@02927@olarr@021BA@orarr@021BB@origof@022B6@rAarr@021DB@Rarr@021A0@rarrap@02975@rarrbfs@02920@rarrc@02933@rarrfs@0291E@rarrhk@021AA@rarrlp@021AC@rarrpl@02945@rarrsim@02974@Rarrtl@02916@rarrtl@021A3@rarrw@0219D@rAtail@0291C@ratail@0291A@RBarr@02910@rBarr@0290F@rbarr@0290D@rdca@02937@rdldhar@02969@rdsh@021B3@rfisht@0297D@rHar@02964@rhard@021C1@rharu@021C0@rharul@0296C@rlarr@021C4@rlhar@021CC@roarr@021FE@rrarr@021C9@rsh@021B1@ruluhar@02968@searhk@02925@seArr@021D8@searr@02198@seswar@02929@simrarr@02972@slarr@02190@srarr@02192@swarhk@02926@swArr@021D9@swarr@02199@swnwar@0292A@Uarr@0219F@uArr@021D1@Uarrocir@02949@udarr@021C5@udhar@0296E@ufisht@0297E@uHar@02963@uharl@021BF@uharr@021BE@uuarr@021C8@vArr@021D5@varr@02195@xhArr@027FA@xharr@027F7@xlArr@027F8@xlarr@027F5@xmap@027FC@xrArr@027F9@xrarr@027F6@zigrarr@021DD@ac@0223E@amalg@02A3F@barvee@022BD@Barwed@02306@barwed@02305@bsolb@029C5@Cap@022D2@capand@02A44@capbrcup@02A49@capcap@02A4B@capcup@02A47@capdot@02A40@ccaps@02A4D@ccups@02A4C@ccupssm@02A50@coprod@02210@Cup@022D3@cupbrcap@02A48@cupcap@02A46@cupcup@02A4A@cupdot@0228D@cupor@02A45@cuvee@022CE@cuwed@022CF@Dagger@02021@dagger@02020@diam@022C4@divonx@022C7@eplus@02A71@hercon@022B9@intcal@022BA@iprod@02A3C@loplus@02A2D@lotimes@02A34@lthree@022CB@ltimes@022C9@midast@0002A@minusb@0229F@minusd@02238@minusdu@02A2A@ncap@02A43@ncup@02A42@oast@0229B@ocir@0229A@odash@0229D@odiv@02A38@odot@02299@odsold@029BC@ofcir@029BF@ogt@029C1@ohbar@029B5@olcir@029BE@olt@029C0@omid@029B6@ominus@02296@opar@029B7@operp@029B9@oplus@02295@osol@02298@Otimes@02A37@otimes@02297@otimesas@02A36@ovbar@0233D@plusacir@02A23@plusb@0229E@pluscir@02A22@plusdo@02214@plusdu@02A25@pluse@02A72@plussim@02A26@plustwo@02A27@prod@0220F@race@029DA@roplus@02A2E@rotimes@02A35@rthree@022CC@rtimes@022CA@sdot@022C5@sdotb@022A1@setmn@02216@simplus@02A24@smashp@02A33@solb@029C4@sqcap@02293@sqcup@02294@ssetmn@02216@sstarf@022C6@subdot@02ABD@sum@02211@supdot@02ABE@timesb@022A0@timesbar@02A31@timesd@02A30@tridot@025EC@triminus@02A3A@triplus@02A39@trisb@029CD@tritime@02A3B@uplus@0228E@veebar@022BB@wedbar@02A5F@wreath@02240@xcap@022C2@xcirc@025EF@xcup@022C3@xdtri@025BD@xodot@02A00@xoplus@02A01@xotime@02A02@xsqcup@02A06@xuplus@02A04@xutri@025B3@xvee@022C1@xwedge@022C0@dlcorn@0231E@drcorn@0231F@gtlPar@02995@langd@02991@lbrke@0298B@lbrksld@0298F@lbrkslu@0298D@lceil@02308@lfloor@0230A@lmoust@023B0@lparlt@02993@ltrPar@02996@rangd@02992@rbrke@0298C@rbrksld@0298E@rbrkslu@02990@rceil@02309@rfloor@0230B@rmoust@023B1@rpargt@02994@ulcorn@0231C@urcorn@0231D@gnap@02A8A@gnE@02269@gne@02A88@gnsim@022E7@lnap@02A89@lnE@02268@lne@02A87@lnsim@022E6@nap@02249@ncong@02247@nequiv@02262@nge@02271@ngsim@02275@ngt@0226F@nle@02270@nlsim@02274@nlt@0226E@nltri@022EA@nltrie@022EC@nmid@02224@npar@02226@npr@02280@nprcue@022E0@nrtri@022EB@nrtrie@022ED@nsc@02281@nsccue@022E1@nsim@02241@nsime@02244@nsmid@02224@nspar@02226@nsqsube@022E2@nsqsupe@022E3@nsub@02284@nsube@02288@nsup@02285@nsupe@02289@ntgl@02279@ntlg@02278@nVDash@022AF@nVdash@022AE@nvDash@022AD@nvdash@022AC@parsim@02AF3@prnap@02AB9@prnE@02AB5@prnsim@022E8@rnmid@02AEE@scnap@02ABA@scnE@02AB6@scnsim@022E9@simne@02246@solbar@0233F@subnE@02ACB@subne@0228A@supnE@02ACC@supne@0228B@ang@02220@ange@029A4@angmsd@02221@angmsdaa@029A8@angmsdab@029A9@angmsdac@029AA@angmsdad@029AB@angmsdae@029AC@angmsdaf@029AD@angmsdag@029AE@angmsdah@029AF@angrtvb@022BE@angrtvbd@0299D@bbrk@023B5@bbrktbrk@023B6@bemptyv@029B0@beth@02136@boxbox@029C9@";
com.wiris.util.xml.WEntities.s2 = "bprime@02035@bsemi@0204F@cemptyv@029B2@cirE@029C3@cirscir@029C2@comp@02201@daleth@02138@demptyv@029B1@ell@02113@empty@02205@emptyv@02205@gimel@02137@iiota@02129@image@02111@imath@00131@jmath@0006A@laemptyv@029B4@lltri@025FA@lrtri@022BF@mho@02127@nexist@02204@oS@024C8@planck@0210F@plankv@0210F@raemptyv@029B3@range@029A5@real@0211C@tbrk@023B4@trpezium@0FFFD@ultri@025F8@urtri@025F9@vzigzag@0299A@weierp@02118@apE@02A70@ape@0224A@apid@0224B@asymp@02248@Barv@02AE7@bcong@0224C@bepsi@003F6@bowtie@022C8@bsim@0223D@bsime@022CD@bump@0224E@bumpE@02AAE@bumpe@0224F@cire@02257@Colon@02237@Colone@02A74@colone@02254@congdot@02A6D@csub@02ACF@csube@02AD1@csup@02AD0@csupe@02AD2@cuepr@022DE@cuesc@022DF@Dashv@02AE4@dashv@022A3@easter@02A6E@ecir@02256@ecolon@02255@eDDot@02A77@eDot@02251@efDot@02252@eg@02A9A@egs@02A96@egsdot@02A98@el@02A99@els@02A95@elsdot@02A97@equest@0225F@equivDD@02A78@erDot@02253@esdot@02250@Esim@02A73@esim@02242@fork@022D4@forkv@02AD9@frown@02322@gap@02A86@gE@02267@gEl@02A8C@gel@022DB@ges@02A7E@gescc@02AA9@gesdot@02A80@gesdoto@02A82@gesdotol@02A84@gesles@02A94@Gg@022D9@gl@02277@gla@02AA5@glE@02A92@glj@02AA4@gsim@02273@gsime@02A8E@gsiml@02A90@Gt@0226B@gtcc@02AA7@gtcir@02A7A@gtdot@022D7@gtquest@02A7C@gtrarr@02978@homtht@0223B@lap@02A85@lat@02AAB@late@02AAD@lE@02266@lEg@02A8B@leg@022DA@les@02A7D@lescc@02AA8@lesdot@02A7F@lesdoto@02A81@lesdotor@02A83@lesges@02A93@lg@02276@lgE@02A91@Ll@022D8@lsim@02272@lsime@02A8D@lsimg@02A8F@Lt@0226A@ltcc@02AA6@ltcir@02A79@ltdot@022D6@ltlarr@02976@ltquest@02A7B@ltrie@022B4@mcomma@02A29@mDDot@0223A@mid@02223@mlcp@02ADB@models@022A7@mstpos@0223E@Pr@02ABB@pr@0227A@prap@02AB7@prcue@0227C@prE@02AB3@pre@02AAF@prsim@0227E@prurel@022B0@ratio@02236@rtrie@022B5@rtriltri@029CE@Sc@02ABC@sc@0227B@scap@02AB8@sccue@0227D@scE@02AB4@sce@02AB0@scsim@0227F@sdote@02A66@sfrown@02322@simg@02A9E@simgE@02AA0@siml@02A9D@simlE@02A9F@smid@02223@smile@02323@smt@02AAA@smte@02AAC@spar@02225@sqsub@0228F@sqsube@02291@sqsup@02290@sqsupe@02292@ssmile@02323@Sub@022D0@subE@02AC5@subedot@02AC3@submult@02AC1@subplus@02ABF@subrarr@02979@subsim@02AC7@subsub@02AD5@subsup@02AD3@Sup@022D1@supdsub@02AD8@supE@02AC6@supedot@02AC4@suphsub@02AD7@suplarr@0297B@supmult@02AC2@supplus@02AC0@supsim@02AC8@supsub@02AD4@supsup@02AD6@thkap@02248@thksim@0223C@topfork@02ADA@trie@0225C@twixt@0226C@Vbar@02AEB@vBar@02AE8@vBarv@02AE9@VDash@022AB@Vdash@022A9@vDash@022A8@vdash@022A2@Vdashl@02AE6@vltri@022B2@vprop@0221D@vrtri@022B3@Vvdash@022AA@alpha@003B1@beta@003B2@chi@003C7@Delta@00394@delta@003B4@epsi@003B5@epsiv@003F5@eta@003B7@Gamma@00393@gamma@003B3@Gammad@003DC@gammad@003DD@iota@003B9@kappa@003BA@kappav@003F0@Lambda@0039B@lambda@003BB@mu@003BC@nu@003BD@Omega@003A9@omega@003C9@Phi@003A6@phi@003C6@phiv@003D5@Pi@003A0@pi@003C0@piv@003D6@Psi@003A8@psi@003C8@rho@003C1@rhov@003F1@Sigma@003A3@sigma@003C3@sigmav@003C2@tau@003C4@Theta@00398@theta@003B8@thetav@003D1@Upsi@003D2@upsi@003C5@Xi@0039E@xi@003BE@zeta@003B6@Cfr@0212D@Hfr@0210C@Ifr@02111@Rfr@0211C@Zfr@02128@Copf@02102@Hopf@0210D@Nopf@02115@Popf@02119@Qopf@0211A@Ropf@0211D@Zopf@02124@acd@0223F@aleph@02135@And@02A53@and@02227@andand@02A55@andd@02A5C@andslope@02A58@andv@02A5A@angrt@0221F@angsph@02222@angst@0212B@ap@02248@apacir@02A6F@awconint@02233@awint@02A11@becaus@02235@bernou@0212C@bNot@02AED@bnot@02310@bottom@022A5@cap@02229@Cconint@02230@cirfnint@02A10@compfn@02218@cong@02245@Conint@0222F@conint@0222E@ctdot@022EF@cup@0222A@cwconint@02232@cwint@02231@cylcty@0232D@disin@022F2@Dot@000A8@DotDot@020DC@dsol@029F6@dtdot@022F1@dwangle@029A6@elinters@0FFFD@epar@022D5@eparsl@029E3@equiv@02261@eqvparsl@029E5@exist@02203@fltns@025B1@fnof@00192@forall@02200@fpartint@02A0D@ge@02265@hamilt@0210B@iff@021D4@iinfin@029DC@imped@001B5@infin@0221E@infintie@029DD@Int@0222C@int@0222B@intlarhk@02A17@isin@02208@isindot@022F5@isinE@022F9@isins@022F4@isinsv@022F3@isinv@02208@lagran@02112@Lang@0300A@lang@027e8@lArr@021D0@lbbrk@03014@le@02264@loang@03018@lobrk@0301A@lopar@02985@lowast@02217@minus@02212@mnplus@02213@nabla@02207@ne@02260@nhpar@02AF2@ni@0220B@nis@022FC@nisd@022FA@niv@0220B@Not@02AEC@notin@02209@notinva@02209@notinvb@022F7@notinvc@022F6@notni@0220C@notniva@0220C@notnivb@022FE@notnivc@022FD@npolint@02A14@nvinfin@029DE@olcross@029BB@Or@02A54@or@02228@ord@02A5D@order@02134@oror@02A56@orslope@02A57@orv@02A5B@par@02225@parsl@02AFD@part@02202@permil@02030@perp@022A5@pertenk@02031@phmmat@02133@pointint@02A15@Prime@02033@prime@02032@profalar@0232E@profline@02312@profsurf@02313@prop@0221D@qint@02A0C@qprime@02057@quatint@02A16@radic@0221A@Rang@0300B@rang@027e9@rArr@021D2@rbbrk@03015@roang@03019@robrk@0301B@ropar@02986@rppolint@02A12@scpolint@02A13@sim@0223C@simdot@02A6A@sime@02243@smeparsl@029E4@square@025A1@squarf@025AA@strns@000AF@sub@02282@sube@02286@sup@02283@supe@02287@tdot@020DB@there4@02234@tint@0222D@top@022A4@topbot@02336@topcir@02AF1@tprime@02034@utdot@022F0@uwangle@029A7@vangrt@0299C@veeeq@0225A@Verbar@02016@wedgeq@02259@xnis@022FB@angle@02220@ApplyFunction@02061@approx@02248@approxeq@0224A@Assign@02254@backcong@0224C@backepsilon@003F6@backprime@02035@backsim@0223D@backsimeq@022CD@Backslash@02216@barwedge@02305@Because@02235@because@02235@Bernoullis@0212C@between@0226C@bigcap@022C2@bigcirc@025EF@bigcup@022C3@bigodot@02A00@bigoplus@02A01@bigotimes@02A02@bigsqcup@02A06@bigstar@02605@bigtriangledown@025BD@bigtriangleup@025B3@biguplus@02A04@bigvee@022C1@bigwedge@022C0@bkarow@0290D@blacklozenge@029EB@blacksquare@025AA@blacktriangle@025B4@blacktriangledown@025BE@blacktriangleleft@025C2@blacktriangleright@025B8@bot@022A5@boxminus@0229F@boxplus@0229E@boxtimes@022A0@Breve@002D8@bullet@02022@Bumpeq@0224E@bumpeq@0224F@CapitalDifferentialD@02145@Cayleys@0212D@Cedilla@000B8@CenterDot@000B7@centerdot@000B7@checkmark@02713@circeq@02257@circlearrowleft@021BA@circlearrowright@021BB@circledast@0229B@circledcirc@0229A@circleddash@0229D@CircleDot@02299@circledR@000AE@circledS@024C8@CircleMinus@02296@CirclePlus@02295@CircleTimes@02297@ClockwiseContourIntegral@02232@CloseCurlyDoubleQuote@0201D@CloseCurlyQuote@02019@clubsuit@02663@coloneq@02254@complement@02201@complexes@02102@Congruent@02261@ContourIntegral@0222E@Coproduct@02210@CounterClockwiseContourIntegral@02233@CupCap@0224D@curlyeqprec@022DE@curlyeqsucc@022DF@curlyvee@022CE@curlywedge@022CF@curvearrowleft@021B6@curvearrowright@021B7@dbkarow@0290F@ddagger@02021@ddotseq@02A77@Del@02207@DiacriticalAcute@000B4@DiacriticalDot@002D9@DiacriticalDoubleAcute@002DD@DiacriticalGrave@00060@DiacriticalTilde@002DC@Diamond@022C4@diamond@022C4@diamondsuit@02666@DifferentialD@02146@digamma@003DD@div@000F7@divideontimes@022C7@doteq@02250@doteqdot@02251@DotEqual@02250@dotminus@02238@dotplus@02214@dotsquare@022A1@doublebarwedge@02306@DoubleContourIntegral@0222F@DoubleDot@000A8@DoubleDownArrow@021D3@DoubleLeftArrow@021D0@DoubleLeftRightArrow@021D4@DoubleLeftTee@02AE4@DoubleLongLeftArrow@027F8@DoubleLongLeftRightArrow@027FA@DoubleLongRightArrow@027F9@DoubleRightArrow@021D2@DoubleRightTee@022A8@DoubleUpArrow@021D1@DoubleUpDownArrow@021D5@DoubleVerticalBar@02225@DownArrow@02193@Downarrow@021D3@downarrow@02193@DownArrowUpArrow@021F5@downdownarrows@021CA@downharpoonleft@021C3@downharpoonright@021C2@DownLeftVector@021BD@DownRightVector@021C1@DownTee@022A4@DownTeeArrow@021A7@drbkarow@02910@Element@02208@emptyset@02205@eqcirc@02256@eqcolon@02255@eqsim@02242@eqslantgtr@02A96@eqslantless@02A95@EqualTilde@02242@Equilibrium@021CC@Exists@02203@expectation@02130@ExponentialE@02147@exponentiale@02147@fallingdotseq@02252@ForAll@02200@Fouriertrf@02131@geq@02265@geqq@02267@geqslant@02A7E@gg@0226B@ggg@022D9@gnapprox@02A8A@gneq@02A88@gneqq@02269@GreaterEqual@02265@GreaterEqualLess@022DB@GreaterFullEqual@02267@GreaterLess@02277@GreaterSlantEqual@02A7E@GreaterTilde@02273@gtrapprox@02A86@gtrdot@022D7@gtreqless@022DB@gtreqqless@02A8C@gtrless@02277@gtrsim@02273@Hacek@002C7@hbar@0210F@heartsuit@02665@HilbertSpace@0210B@hksearow@02925@hkswarow@02926@hookleftarrow@021A9@hookrightarrow@021AA@hslash@0210F@HumpDownHump@0224E@HumpEqual@0224F@iiiint@02A0C@iiint@0222D@Im@02111@ImaginaryI@02148@imagline@02110@imagpart@02111@Implies@021D2@in@02208@integers@02124@Integral@0222B@intercal@022BA@Intersection@022C2@intprod@02A3C@InvisibleComma@02063@InvisibleTimes@02062@langle@027e8@Laplacetrf@02112@lbrace@0007B@lbrack@0005B@LeftAngleBracket@027e8@LeftArrow@02190@Leftarrow@021D0@leftarrow@02190@LeftArrowBar@021E4@LeftArrowRightArrow@021C6@leftarrowtail@021A2@LeftCeiling@02308@LeftDoubleBracket@0301A@LeftDownVector@021C3@LeftFloor@0230A@leftharpoondown@021BD@leftharpoonup@021BC@leftleftarrows@021C7@LeftRightArrow@02194@Leftrightarrow@021D4@leftrightarrow@02194@leftrightarrows@021C6@leftrightharpoons@021CB@leftrightsquigarrow@021AD@LeftTee@022A3@LeftTeeArrow@021A4@leftthreetimes@022CB@LeftTriangle@022B2@LeftTriangleEqual@022B4@LeftUpVector@021BF@LeftVector@021BC@leq@02264@leqq@02266@leqslant@02A7D@lessapprox@02A85@lessdot@022D6@lesseqgtr@022DA@lesseqqgtr@02A8B@LessEqualGreater@022DA@LessFullEqual@02266@LessGreater@02276@lessgtr@02276@lesssim@02272@LessSlantEqual@02A7D@LessTilde@02272@ll@0226A@llcorner@0231E@Lleftarrow@021DA@lmoustache@023B0@lnapprox@02A89@lneq@02A87@lneqq@02268@LongLeftArrow@027F5@Longleftarrow@027F8@longleftarrow@027F5@LongLeftRightArrow@027F7@Longleftrightarrow@027FA@longleftrightarrow@027F7@longmapsto@027FC@LongRightArrow@027F6@Longrightarrow@027F9@longrightarrow@027F6@looparrowleft@021AB@looparrowright@021AC@LowerLeftArrow@02199@LowerRightArrow@02198@lozenge@025CA@lrcorner@0231F@Lsh@021B0@maltese@02720@mapsto@021A6@measuredangle@02221@Mellintrf@02133@MinusPlus@02213@mp@02213@multimap@022B8@napprox@02249@natural@0266E@naturals@02115@nearrow@02197@NegativeMediumSpace@0200B@NegativeThickSpace@0200B@NegativeThinSpace@0200B@NegativeVeryThinSpace@0200B@NestedGreaterGreater@0226B@NestedLessLess@0226A@nexists@02204@ngeq@02271@ngtr@0226F@nLeftarrow@021CD@nleftarrow@0219A@nLeftrightarrow@021CE@nleftrightarrow@021AE@nleq@02270@nless@0226E@NonBreakingSpace@000A0@NotCongruent@02262@NotDoubleVerticalBar@02226@NotElement@02209@NotEqual@02260@NotExists@02204@NotGreater@0226F@NotGreaterEqual@02271@NotGreaterLess@02279@NotGreaterTilde@02275@NotLeftTriangle@022EA@NotLeftTriangleEqual@022EC@NotLess@0226E@NotLessEqual@02270@NotLessGreater@02278@NotLessTilde@02274@NotPrecedes@02280@NotPrecedesSlantEqual@022E0@NotReverseElement@0220C@NotRightTriangle@022EB@NotRightTriangleEqual@022ED@NotSquareSubsetEqual@022E2@NotSquareSupersetEqual@022E3@NotSubsetEqual@02288@NotSucceeds@02281@NotSucceedsSlantEqual@022E1@NotSupersetEqual@02289@NotTilde@02241@NotTildeEqual@02244@NotTildeFullEqual@02247@NotTildeTilde@02249@NotVerticalBar@02224@nparallel@02226@nprec@02280@nRightarrow@021CF@nrightarrow@0219B@nshortmid@02224@nshortparallel@02226@nsimeq@02244@nsubseteq@02288@nsucc@02281@nsupseteq@02289@ntriangleleft@022EA@ntrianglelefteq@022EC@ntriangleright@022EB@ntrianglerighteq@022ED@nwarrow@02196@oint@0222E@OpenCurlyDoubleQuote@0201C@OpenCurlyQuote@02018@orderof@02134@parallel@02225@PartialD@02202@pitchfork@022D4@PlusMinus@000B1@pm@000B1@Poincareplane@0210C@prec@0227A@precapprox@02AB7@preccurlyeq@0227C@Precedes@0227A@PrecedesEqual@02AAF@PrecedesSlantEqual@0227C@PrecedesTilde@0227E@preceq@02AAF@precnapprox@02AB9@precneqq@02AB5@precnsim@022E8@precsim@0227E@primes@02119@Proportion@02237@Proportional@0221D@propto@0221D@quaternions@0210D@questeq@0225F@rangle@027e9@rationals@0211A@rbrace@0007D@rbrack@0005D@Re@0211C@realine@0211B@realpart@0211C@reals@0211D@ReverseElement@0220B@ReverseEquilibrium@021CB@ReverseUpEquilibrium@0296F@RightAngleBracket@027e9@RightArrow@02192@Rightarrow@021D2@rightarrow@02192@RightArrowBar@021E5@RightArrowLeftArrow@021C4@rightarrowtail@021A3@RightCeiling@02309@RightDoubleBracket@0301B@RightDownVector@021C2@RightFloor@0230B@rightharpoondown@021C1@rightharpoonup@021C0@rightleftarrows@021C4@rightleftharpoons@021CC@rightrightarrows@021C9@rightsquigarrow@0219D@RightTee@022A2@RightTeeArrow@021A6@rightthreetimes@022CC@RightTriangle@022B3@RightTriangleEqual@022B5@RightUpVector@021BE@RightVector@021C0@risingdotseq@02253@rmoustache@023B1@Rrightarrow@021DB@Rsh@021B1@searrow@02198@setminus@02216@ShortDownArrow@02193@ShortLeftArrow@02190@shortmid@02223@shortparallel@02225@ShortRightArrow@02192@ShortUpArrow@02191@simeq@02243@SmallCircle@02218@smallsetminus@02216@spadesuit@02660@Sqrt@0221A@sqsubset@0228F@sqsubseteq@02291@sqsupset@02290@sqsupseteq@02292@Square@025A1@SquareIntersection@02293@SquareSubset@0228F@SquareSubsetEqual@02291@SquareSuperset@02290@SquareSupersetEqual@02292@SquareUnion@02294@Star@022C6@straightepsilon@003F5@straightphi@003D5@Subset@022D0@subset@02282@subseteq@02286@subseteqq@02AC5@SubsetEqual@02286@subsetneq@0228A@subsetneqq@02ACB@succ@0227B@succapprox@02AB8@succcurlyeq@0227D@Succeeds@0227B@SucceedsEqual@02AB0@SucceedsSlantEqual@0227D@SucceedsTilde@0227F@succeq@02AB0@succnapprox@02ABA@succneqq@02AB6@succnsim@022E9@succsim@0227F@SuchThat@0220B@Sum@02211@Superset@02283@SupersetEqual@02287@Supset@022D1@supset@02283@supseteq@02287@supseteqq@02AC6@supsetneq@0228B@supsetneqq@02ACC@swarrow@02199@Therefore@02234@therefore@02234@thickapprox@02248@thicksim@0223C@ThinSpace@02009@Tilde@0223C@TildeEqual@02243@TildeFullEqual@02245@TildeTilde@02248@toea@02928@tosa@02929@triangle@025B5@triangledown@025BF@triangleleft@025C3@trianglelefteq@022B4@triangleq@0225C@triangleright@025B9@trianglerighteq@022B5@TripleDot@020DB@twoheadleftarrow@0219E@twoheadrightarrow@021A0@ulcorner@0231C@Union@022C3@UnionPlus@0228E@UpArrow@02191@Uparrow@021D1@uparrow@02191@UpArrowDownArrow@021C5@UpDownArrow@02195@Updownarrow@021D5@updownarrow@02195@UpEquilibrium@0296E@upharpoonleft@021BF@upharpoonright@021BE@UpperLeftArrow@02196@UpperRightArrow@02197@upsilon@003C5@UpTee@022A5@UpTeeArrow@021A5@upuparrows@021C8@urcorner@0231D@varepsilon@003F5@varkappa@003F0@varnothing@02205@varphi@003C6@varpi@003D6@varpropto@0221D@varrho@003F1@varsigma@003C2@vartheta@003D1@vartriangleleft@022B2@vartriangleright@022B3@Vee@022C1@vee@02228@Vert@02016@vert@0007C@VerticalBar@02223@VerticalTilde@02240@VeryThinSpace@0200A@Wedge@022C0@wedge@02227@wp@02118@wr@02240@zeetrf@02128@af@02061@asympeq@0224D@Cross@02A2F@DD@02145@dd@02146@DownArrowBar@02913@DownBreve@00311@DownLeftRightVector@02950@DownLeftTeeVector@0295E@DownLeftVectorBar@02956@DownRightTeeVector@0295F@DownRightVectorBar@02957@ee@02147@EmptySmallSquare@025FB@EmptyVerySmallSquare@025AB@Equal@02A75@FilledSmallSquare@025FC@FilledVerySmallSquare@025AA@GreaterGreater@02AA2@Hat@0005E@HorizontalLine@02500@ic@02063@ii@02148@it@02062@larrb@021E4@LeftDownTeeVector@02961@LeftDownVectorBar@02959@LeftRightVector@0294E@LeftTeeVector@0295A@LeftTriangleBar@029CF@LeftUpDownVector@02951@LeftUpTeeVector@02960@LeftUpVectorBar@02958@LeftVectorBar@02952@LessLess@02AA1@mapstodown@021A7@mapstoleft@021A4@mapstoup@021A5@MediumSpace@0205F@NewLine@0000A@NoBreak@02060@NotCupCap@0226D@OverBar@000AF@OverBrace@023DE@OverBracket@023B4@OverParenthesis@023DC@planckh@0210E@Product@0220F@rarrb@021E5@RightDownTeeVector@0295D@RightDownVectorBar@02955@RightTeeVector@0295B@RightTriangleBar@029D0@RightUpDownVector@0294F@RightUpTeeVector@0295C@RightUpVectorBar@02954@RightVectorBar@02953@RoundImplies@02970@RuleDelayed@029F4@Tab@00009@UnderBar@00332@UnderBrace@023DF@UnderBracket@023B5@UnderParenthesis@023DD@UpArrowBar@02912@Upsilon@003A5@VerticalLine@0007C@VerticalSeparator@02758@ZeroWidthSpace@0200B@omicron@003BF@amalg@02210@NegativeThinSpace@0E000@";
com.wiris.util.xml.WEntities.oldWebeq = "infty@221e@partial@2202@iint@222c@neq@2260@nsubset@2284@nsupset@2285@exists@2203@ldots@2026@vdots@22ee@cdots@22ef@ddots@22f1@bar@00af@hat@005e@vec@21c0@ddot@00A8@";
com.wiris.util.xml.WEntities.MATHML_ENTITIES = com.wiris.util.xml.WEntities.s1 + com.wiris.util.xml.WEntities.s2 + com.wiris.util.xml.WEntities.oldWebeq;
com.wiris.util.xml.XmlSerializer.MODE_READ = 0;
com.wiris.util.xml.XmlSerializer.MODE_WRITE = 1;
com.wiris.util.xml.XmlSerializer.MODE_REGISTER = 2;
com.wiris.util.xml.XmlSerializer.MODE_CACHE = 3;
haxe.Serializer.USE_CACHE = false;
haxe.Serializer.USE_ENUM_INDEX = false;
haxe.Serializer.BASE64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789%:";
haxe.Unserializer.DEFAULT_RESOLVER = Type;
haxe.Unserializer.BASE64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789%:";
haxe.Unserializer.CODES = null;
haxe.io.Output.LN2 = Math.log(2);
js.Lib.onerror = null;
