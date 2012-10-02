
This theme is to be used with mobile devices. Once installed, the hack
below can be used in order to change automatically the theme when users
access through a mobile device but not otherwise.


Hack: add this code to pnUser.php, line 518 (inside the function 
pnUserGetTheme()):


// ******* XTEC ADDED BEGIN *********
if ( preg_match('/Windows CE/i',$_SERVER['HTTP_USER_AGENT']) || 
     preg_match('/Palm/i',$_SERVER['HTTP_USER_AGENT']) || 
     preg_match('/BlackBerry/i',$_SERVER['HTTP_USER_AGENT']) || 
     preg_match('/J2ME/i',$_SERVER['HTTP_USER_AGENT']) ||
     preg_match('/Opera Mini/i',$_SERVER['HTTP_USER_AGENT']) )
          return "iw_mobile";
// ******* XTEC ADDED END *********

