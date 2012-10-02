/***********************************************
* Adapted by E.Spaan, Jan 08, Based upon:
* Cross browser Marquee II- © Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/
function marqueescroller(divIdOut, divIdIn, delay, speed){
this.tickeridout=divIdOut //ID of outer ticker div containing the inner div
this.tickeridin=divIdIn //ID of inner ticker div containing the information
this.delay=delay // Initial delay (msec)
this.speed=speed //Specify marquee scroll speed (larger is faster 1-10)
this.scrollwait=30 // delay time used in the scrolling (msec)
this.pxstep=8
this.mouseover=0 //Boolean to indicate whether mouse is currently over scroller (and pause it if it is)
this.actualheight=''
var scrollerinstance=this
if (window.addEventListener) //run onload in DOM2 browsers
window.addEventListener("load", function(){scrollerinstance.initialize()}, false)
else if (window.attachEvent) //run onload in IE5.5+
window.attachEvent("onload", function(){scrollerinstance.initialize()})
else if (document.getElementById) //if legacy DOM browsers, just start scroller after 0.5 sec
setTimeout(function(){scrollerinstance.initialize()}, 500)
}
// -------------------------------------------------------------------
// initialize()- Initialize scroller method.
// -Get div objects, set initial positions, start animation
// -------------------------------------------------------------------
marqueescroller.prototype.initialize=function(){
this.marqueein=document.getElementById(this.tickeridin)
this.marqueeout=document.getElementById(this.tickeridout)
this.marqueein.style.top=parseInt(marqueescroller.getCSSpadding(this.marqueeout))
this.marqueeheight=this.marqueeout.offsetHeight
this.actualheight=this.marqueein.offsetHeight
this.marqueeout.onmouseover=function(){scrollerinstance.mouseover=1}
this.marqueeout.onmouseout=function(){scrollerinstance.mouseover=0}
if (window.opera||navigator.userAgent.indexOf("Netscape/7")!=-1){ //if Opera or Netscape 7x, add scrollbars to scroll and exit
this.marqueein.style.height=marqueeheight+"px"
this.marqueein.style.overflow="scroll"
return
}
var scrollerinstance=this
if (window.attachEvent) //Clean up loose references in IE
window.attachEvent("onunload", function(){scrollerinstance.marqueeout.onmouseover=scrollerinstance.marqueeout.onmouseout=null})
setTimeout(function(){scrollerinstance.scrollmarquee()}, this.delay)
}
// -------------------------------------------------------------------
// scrollmarquee()- Move the inner div of the scroller up
// -------------------------------------------------------------------
marqueescroller.prototype.scrollmarquee=function(){
var scrollerinstance=this
if (this.mouseover==1){ //Pause if mouse is currently over scoller
setTimeout(function(){scrollerinstance.scrollmarquee()}, 100)
}else{
if (parseInt(this.marqueein.style.top)>(this.actualheight*(-1)+8)){
this.marqueein.style.top=parseInt(this.marqueein.style.top)-this.speed+"px"
}else{
this.marqueein.style.top=parseInt(this.marqueeheight)+8+"px"
}
setTimeout(function(){scrollerinstance.scrollmarquee()}, this.scrollwait)
}
}
// -------------------------------------------------------------------
// getCSSpadding()- get CSS padding top value, if any
// -------------------------------------------------------------------
marqueescroller.getCSSpadding=function(tickerobj){
if (tickerobj.currentStyle)
return tickerobj.currentStyle["paddingTop"]
else if (window.getComputedStyle) //if DOM2
return window.getComputedStyle(tickerobj,"").getPropertyValue("padding-top")
else
return 0
}