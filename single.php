<?php
get_header(); ?>

<?php
if ( have_posts() ) :

	while ( have_posts() ) : the_post();
		get_template_part( 'partials/content', 'single' );
	endwhile;

	echo writertheme_pagination(); // the_posts_navigation();

	writertheme_related_posts();

	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

else :
	get_template_part( 'partials/content', 'none' );
endif; ?>

<?php
get_footer(); ?>
