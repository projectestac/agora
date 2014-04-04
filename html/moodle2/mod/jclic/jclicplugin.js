var player_files =    "jclic.jar";
var player_versions = "0.2.3.4.02";

var author_files =    "jclicauthor.jar";
var author_versions = "0.2.3.4.02";

var jar_cache_files = player_files;
var jar_cache_versions = player_versions;

var mainClass="JClicApplet";

var _info = navigator.userAgent;
var _ns = false;
var _mac = false;
var _ie = (_info.indexOf("MSIE") > 0 && _info.indexOf("Win") > 0 && _info.indexOf("Windows 3.1") < 0);
if(_info.indexOf("Opera")>=0){
   _ie=false;
   _ns=true;
}
else if(_ie==false){
  _ns = (navigator.appName.indexOf("Netscape") >= 0 && ((_info.indexOf("Win") > 0 && _info.indexOf("Win16") < 0) || (_info.indexOf("Sun") > 0) || (_info.indexOf("Linux") > 0) || (_info.indexOf("AIX") > 0) || (_info.indexOf("OS/2") > 0)));
  _mac = _info.indexOf("Mac_PowerPC") > 0;
}

var jarBase='http://clic.xtec.cat/dist/jclic';
function setJarBase(base){
   jarBase=base;
}

var useLanguage=false;
var language='';
var country='';
var variant='';
function setLanguage(l, c, v){
   if(l!=null){
     language=l.toString();
     if(c!=null) country=c.toString();
     if(v!=null) variant=v.toString();
     useLanguage=true;
   }
}

var useReporter=false;
var reporterClass='';
var reporterParams='';
function setReporter(rClass, rParams){
   if(rClass!=null){
     reporterClass=rClass.toString();
     if(rParams!=null) reporterParams=rParams.toString();
     useReporter=true;
   }
}

var useSkin=false;
var skinName='';
function setSkin(skName){
   if(skName!=null){
     skinName=skName.toString();
     useSkin=true;
   }
}

var useCookie=false;
var cookie='';
function setCookie(text){
   if(text!=null){
     cookie=text.toString();
     useCookie=true;
   }
}

var useExitUrl=false;
var exitUrl='';
function setExitUrl(text){
   if(text!=null){
     exitUrl=text.toString();
     useExitUrl=true;
   }
}

var useInfoUrlFrame=false;
var infoUrlFrame='';
function setInfoUrlFrame(text){
   if(text!=null){
     infoUrlFrame=text.toString();
     useInfoUrlFrame=true;
   }
}

var useSequence=false;
var sequence='';
function setSequence(text){
   if(text!=null){
     sequence=text.toString();
     useSequence=true;
   }
}

var useSystemSounds=false;
var systemSounds=false;
function setSystemSounds(value){
   if(value!=null){
     systemSounds=value.toString();
     useSystemSounds=true;
   }
}

var useCompressImages=false;
var compressImages=true;
function setCompressImages(value){
   if(value!=null){
      compressImages=value.toString();
      useCompressImages=true;
   }
}

var useTrace=false;
var trace=false;
function setTrace(value){
   if(value!=null){
      trace=value.toString();
      useTrace=true;
   }
}

var useMyURL=true;
var myURL=window.location.href;

var isFile=false;
if(myURL.indexOf("file:")==0){
    isFile=true;
}

var authorApplet=false;
function setAuthorApplet(value){
   if(value!=null){
      authorApplet=value;
      if(authorApplet==true){
        jar_cache_files = player_files+","+author_files;
        jar_cache_versions = player_versions+","+author_versions;
        mainClass="JClicAuthorApplet";
      } else {
        jar_cache_files = player_files;
        jar_cache_versions = player_versions;
        mainClass="JClicApplet";
      }
   }
}

function writePlugin(project, width, height, rWidth, rHeight){
   document.writeln(getPlugin(project, width, height, rWidth, rHeight));
}

function writeCacheInfo(p){
  document.writeln(getCacheInfo(p));
}

function writeDownloadPageInfo(){
  document.writeln(getDownloadPageInfo());
}

function writeParams(project, p){
  document.writeln(getParams(project, p));
}


function writeTable(w, h, nsw, nsh, s){
  document.write(getTable(w, h, nsw, nsh, s));
}

function getPlugin(project, width, height, rWidth, rHeight){
   var w=width.toString();
   var h=height.toString();
   var nsw=w;
   var nsh=h;
   if(rWidth!=null) w=rWidth.toString();
   if(rHeight!=null) h=rHeight.toString();

   var htmlcode = '';
   if (_ie == true){
      htmlcode = '<object classid="clsid:8AD9C840-044E-11D1-B3E9-00805F499D93"' +
        ' width="' +w+ '" height="' +h+ '">' +
      '<param name="code" value="' +mainClass+ '">' +
      '<param name="codebase" value="' +jarBase+ '">' +
      getCacheInfo(true) +
      '<param name="type" value="application/x-java-applet;jpi-version=1.5">' +
      '<param name="scriptable" value="false">' +
      getParams(project, true) +
      getDownloadPageInfo() +
      '</object>';
   }
   else if (_ns == true){
      htmlcode = '<embed type="application/x-java-applet;version=1.5"'+
      ' code="' +mainClass+ '" codebase="' +jarBase+ '"'+
      ' width="' +nsw+ '" height="' +nsh +'" ' +
      getCacheInfo(false) +
      getParams(project, false) +
      ' scriptable="false"'+
      ' pluginspage="http://www.java.com/">' +
      '<noembed>' + getDownloadPageInfo() + '</noembed>' +
      '</embed>';
   }
   else{
     htmlcode = '<applet code="' +mainClass+ '" codebase="' +jarBase+ '"' +
     ' archive="'+ jar_cache_files +'"' +
     ' width="' +nsw+ '" height="' +nsh+ '">' +
     '<param name="type" value="application/x-java-applet;version=1.5">' +
     '<param name="scriptable" value="false">' +
     getParams(project, true) +
     '</applet>';
  }
  return htmlcode;
}

function getCacheInfo(p){
  var htmlcode = '';
  if(p){
    htmlcode = '<param name="cache_option" value="Plugin">' +
               '<param name="cache_archive" value="' +jar_cache_files+ '">';
    if(!isFile){
      htmlcode += '<param name="cache_version" value="' +jar_cache_versions+ '">';
    }
  }else{
    htmlcode = ' cache_option="Plugin"' +
               ' cache_archive="' +jar_cache_files+ '"';
    if(!isFile){
      htmlcode += ' cache_version="' +jar_cache_versions+ '"';
    }
  }
  return htmlcode;
}


function getParams(project, p){
  var htmlcode = '';

  if(p) htmlcode += '<param name="activityPack" value="' +project+ '">';
  else htmlcode += ' activityPack="' +project+ '"';

  if(useSequence){
    if(p) htmlcode += '<param name="sequence" value="' +sequence+ '">';
    else htmlcode += ' sequence="' +sequence+ '" ';
  }

  if(useLanguage){
    if(p){
      htmlcode += '<param name="language" value="' +language+ '">' +
                  '<param name="country" value="' +country+ '">' +
                  '<param name="variant" value="' +variant+ '">';
    }
    else htmlcode += ' language="' +language+ '" country="' +country+ '" variant="' +variant+ '" ';
  }

  if(useSkin){
    if(p) htmlcode += '<param name="skin" value="' +skinName+ '">';
    else htmlcode += ' skin="' +skinName+ '" ';
  }

  if(useExitUrl){
    if(p) htmlcode += '<param name="exitUrl" value="' +exitUrl+ '">';
    else htmlcode += ' exitUrl="' +exitUrl+ '" ';
  }

  if(useInfoUrlFrame){
    if(p) htmlcode += '<param name="infoUrlFrame" value="' +infoUrlFrame+ '">';
    else htmlcode += ' infoUrlFrame="' +infoUrlFrame+ '" ';
  }

  if(useReporter){
    if(p){
      htmlcode += '<param name="reporter" value="' +reporterClass+ '">' +
                  '<param name="reporterParams" value="' +reporterParams+ '">';
    }
    else htmlcode += ' reporter="' +reporterClass+ '" reporterParams="' +reporterParams+ '" ';
  }

  if(useCookie){
    if(p) htmlcode += '<param name="cookie" value="' +cookie+ '">';
    else htmlcode += ' cookie="' +cookie+ '" ';
  }

  if(useSystemSounds){
    if(p) htmlcode += '<param name="systemSounds" value="' +systemSounds+ '">';
    else htmlcode += ' systemSounds="' +systemSounds+ '" ';
  }

  if(useCompressImages){
    if(p) htmlcode += '<param name="compressImages" value="' +compressImages+ '">';
    else htmlcode += ' compressImages="' +compressImages+ '" ';
  }

  if(useTrace){
    if(p) htmlcode += '<param name="trace" value="' +trace+ '">';
    else htmlcode += ' trace="' +trace+ '" ';
  }

  if(useMyURL){
    if(p) htmlcode += '<param name="myurl" value="' +myURL+ '">';
    else htmlcode += ' myurl="' +myURL+ '" ';
  }

  return htmlcode;
}

function getDownloadPageInfo(){
  var htmlcode = '';

  var pluginBase="http://clic.xtec.cat/";
  var pluginCat=pluginBase+"ca/jclic/instjava.htm";
  var pluginEsp=pluginBase+"es/jclic/instjava.htm";
  var pluginEng=pluginBase+"en/jclic/instjava.htm";

  htmlcode += '<span style="background-color: #F5DEB3; color: Black; display: block; padding: 10; font-family: Verdana,Arial; border-style: solid; border-width: thin; font-size: 12px; text-align: center; font-weight: bold;">'+
    'Per utilitzar aquesta aplicaci&oacute; cal instal&middot;lar un plug-in Java&#153; actualitzat<br><a href="'+pluginCat+'" target="_blank">Feu clic aqu&iacute; per descarregar-lo</a><br>&nbsp;<br>'+
    'Para utilizar esta aplicaci&oacute;n es necesario un plug-in Java&#153; actualizado<br><a href="'+pluginEsp+'" target="_blank">Haga clic aqu&iacute; para descargarlo</a><br>&nbsp;<br>'+
    'In order to run this program you need an updated Java&#153; plug-in<br><a href="'+pluginEng+'" target="_blank">Click here to download it</a><br>'+
    '</span>';

  return htmlcode;
}

function getTable(w, h, nsw, nsh, s){
  var htmlcode = '';
  htmlcode += '<table '+ s;
  if(_ie == true){
    if(w!=null) htmlcode += ' width='+ w;
    if(h!=null) htmlcode += ' height='+ h;
  }
  else{
    if(nsw!=null) htmlcode += ' width='+ nsw;
    if(nsh!=null) htmlcode += ' height='+ nsh;
  }
  htmlcode += '>';
  return htmlcode;
}
