<?php
	if(get_field('alternative_title')) { /* echo ' alternative title'; */
		the_field('alternative_title');}
	/* elseif(is_tax()) { single_cat_title( '', true ); /* echo ' (tax)'; } */
	else {the_title(); /* echo ' (else)'; */ }
?>