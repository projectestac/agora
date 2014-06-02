<?php 
	if(is_active_sidebar('below-header') ) : ?>

		<div class="container">
		    <div class="row">
		        <div class="span12">	
					<?php dynamic_sidebar( 'below-header' );   ?>
		        </div>
		    </div>
		</div>

<?php endif ?>