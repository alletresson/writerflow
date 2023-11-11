<?php
get_header(); ?>

<?php
if ( have_posts() ) :

	while ( have_posts() ) : the_post();
		get_template_part( 'partials/content', get_post_format() );
	endwhile;

	echo writerflow_pagination(); // the_posts_navigation();

else :
	get_template_part( 'partials/content', 'none' );
endif; ?>

<?php
get_footer(); ?>