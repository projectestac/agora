function opencodewin(code)
{
    newWindow = window.open("", "Code", "fullscreen=no,toolbar=yes,status=yes,menubar=no,scrollbars=yes,resizable=yes,directories=no,location=no,width=700,height=400,left=50,top=50");
    newWindow.document.open();
    newWindow.document.write(unescape(code));
    newWindow.document.close();
    newWindow.focus();
}
