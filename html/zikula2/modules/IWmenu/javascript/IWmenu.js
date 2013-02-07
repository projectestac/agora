function sendNewItem() {
	var error=false;
	var f=document.forms['new_menu'];
	f.action="index.php?module=IWmenu&type=admin&func=create";
	if(!error){f.submit();}
}

function sendNewItemSub() {
	var error=false;
	var f=document.forms['new_menu'];
	f.action="index.php?module=IWmenu&type=admin&func=create_sub";
	if(!error){f.submit();}
}

function sendConf(){
	f=document.forms['menu'];
	var error=false;		
	if(!IsNumeric(f.width.value) && !error){
		alert(InvalidData);
		error=true;
	}									
	if(!error){f.submit();}		
}

function IsNumeric(strString){
   //  check for valid numeric strings	
   var strValidChars = "0123456789.-";
   var strChar;
   var blnResult = true;

   if (strString.length == 0) return false;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
	  {
	  strChar = strString.charAt(i);
	  if (strValidChars.indexOf(strChar) == -1)
		 {
		 blnResult = false;
		 }
	  }
   return blnResult;
}