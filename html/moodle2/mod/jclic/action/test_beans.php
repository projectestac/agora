<HTML>
<HEAD><TITLE>Ajax + XML</TITLE></HEAD>
<SCRIPT type="text/javascript" src="./prototype.js"></SCRIPT>
<BODY>

<script type="text/javascript">
function sendRequest(){
    $('response').value='';
		var success = function(t){$('response').value=t.responseText;}
	 	var failure = function(){alert('ko');}
	    if ($('request').value!=''){
  	 	var service = $('service').value;

  		var pars = $('request').value;
  	 	var myAjax = new Ajax.Request(service, {method:'post', contentType: 'text/xml', postBody:pars, onSuccess:success, onFailure:failure});
    }
}

function setRequest(){
  var request = '<'+'?xml version="1.0" encoding="UTF-8"?'+'>\n';
  switch($('bean').value){
    case 'get_properties': request+='<bean id="get_properties" />';break;
    case 'add session': request+='<bean id="add session">\n  <param name="key" value="1" />\n <param name="user" value="2" />\n <param name="time" value="1225709369639" />\n <param name="project" value="conc_mat" />\n</bean>';break;
    case 'multiple': request+='<bean id="multiple">\n <bean id="add activity">\n <param name="num" value="0" /> \n <param name="session" value="2_1225709369639" /> \n <activity name="serord01.puz" start="1225709399639" time="5313" solved="false" score="2" minActions="5" actions="3" /> \n </bean>\n <bean id="add activity">\n <param name="num" value="1" />\n <param name="session" value="2_1225709369639" />\n <activity name="serord02.puz" start="1225709469639" time="5062" solved="false" score="0" minActions="5" actions="3" />\n </bean>\n</bean>';break;
    default: request="";
  }
  $('response').value='';
  $('request').value=request;
}
</script>

<FORM name="wsForm">
<ul>
<li>
<div class="title">Service:</div>
<!--INPUT type="text" name="service" id="service" value="ws.php"/-->
<INPUT type="text" name="service" id="service" value="/agora2/moodle2/mod/jclic/action/beans.php" size="100"/>
</li>
<li>
<div class="title">Bean:</div>
<SELECT name="bean" id="bean" onchange="setRequest();">
  <OPTION value="none"></OPTION>
  <OPTION value="get_properties">get_properties</OPTION>
  <OPTION value="add session">add session</OPTION>
  <OPTION value="multiple">multiple</OPTION>
</SELECT>
</li>
<li>
<div class="title">Request:</div>
<TEXTAREA name="request" id="request" cols="70" rows="8"></TEXTAREA>
</li>
<a href="javascript:sendRequest();">Execute</a>

<li>
<div class="title">Response:</div>
<TEXTAREA name="response" id="response" cols="70" rows="15" readOnly></TEXTAREA>
</li>
</ul>
</FORM>
</BODY>
</HTML>
