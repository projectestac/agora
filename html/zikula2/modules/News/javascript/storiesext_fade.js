/***********************************************
* Based upon:
* Memory Ticker script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
function fadescroller(content, divId, delay){
this.curmsg=0
this.content=content //message array content
this.tickerid=divId //ID of ticker div to display information
this.delay=delay //Delay between msg change, in miliseconds.
if (document.all||document.getElementById){
document.write('<div id="'+divId+'"></div>')
}
var scrollerinstance=this
if (window.addEventListener) //run onload in DOM2 browsers
window.addEventListener("load", function(){scrollerinstance.beginticker()}, false)
else if (window.attachEvent) //run onload in IE5.5+
window.attachEvent("onload", function(){scrollerinstance.beginticker()})
else if (document.getElementById) //if legacy DOM browsers, just start scroller after 0.5 sec
setTimeout(function(){scrollerinstance.beginticker()}, 500)
}
fadescroller.prototype.beginticker=function(){
var scrollerinstance=this
this.tickerdiv=document.getElementById? document.getElementById(this.tickerid) : eval("document.all."+this.tickerid)
this.changetickercontent()
}
fadescroller.prototype.changetickercontent=function(){
if (this.tickerdiv.filters && this.tickerdiv.filters.length>0)
this.tickerdiv.filters[0].Apply()
this.tickerdiv.innerHTML=this.content[this.curmsg]
if (this.tickerdiv.filters && this.tickerdiv.filters.length>0)
this.tickerdiv.filters[0].Play()
this.curmsg=(this.curmsg==this.content.length-1)? this.curmsg=0 : this.curmsg+1
this.filterduration=(this.tickerdiv.filters&&this.tickerdiv.filters.length>0)? this.tickerdiv.filters[0].duration*1000 : 0
var scrollerinstance=this
setTimeout(function(){scrollerinstance.changetickercontent()},this.delay+this.filterduration)
}
