<?php
get_header(); ?>

<?php
if ( have_posts() ) :

	while ( have_posts() ) : the_post();
		get_template_part( 'partials/content', 'page' );
	endwhile;

	echo writertheme_pagination(); // the_posts_navigation();

else :
	get_template_part( 'partials/content', 'none' );
endif; ?>

<?php
get_footer(); ?>