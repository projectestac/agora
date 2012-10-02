function toggledescription(downloadid, dl_desc)
{
    var desciddt = 'download_' + downloadid + '_description_dt';
    var desciddd = 'download_' + downloadid + '_description_dd';

	
	
    if(Element.hasClassName(desciddt,'description_big') == true && Element.hasClassName(desciddd,'description_big') == true) 
	{
        Element.removeClassName(desciddt,'description_big');
        Element.removeClassName(desciddd,'description_big');
        Element.addClassName(desciddt,'description_small');
        Element.addClassName(desciddd,'description_small');
        var thedesc = dl_desc.truncate(35);
		Element.update(desciddd,thedesc);
	}
	else
	{
	  	Element.removeClassName(desciddt,'description_small');
        Element.removeClassName(desciddd,'description_small');
        Element.addClassName(desciddt,'description_big');
        Element.addClassName(desciddd,'description_big');
        var thedesc = dl_desc;
		Element.update(desciddd,thedesc);
	}
	
}
