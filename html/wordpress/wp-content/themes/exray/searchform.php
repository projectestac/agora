<form action="<?php echo esc_url(home_url()); ?>" id="search-form" method="get">

	<input type="text" value="<?php echo esc_attr( 'Search' ); ?>" name="s" id="s" onblur="if(this.value=='')this.value='search'" 
		onfocus="if(this.value=='search') this.value=''" />
	<input type="hidden" value="submit" />

</form>