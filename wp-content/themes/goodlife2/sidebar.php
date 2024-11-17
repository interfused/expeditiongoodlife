<aside id="header-sidebar">
	<?php 
		dynamic_sidebar('primary');
		echo wpautop(get_option('copyright', 'Configure this message in "appearance" => "customize"')); 
	?>
</aside>