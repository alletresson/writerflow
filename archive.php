<?php
get_header(); ?>

<header>
	<?php
	the_archive_title( '<h2 class="page-title">', '</h2>' );
	the_archive_description( '<div class="taxonomy-description">', '</div>' );
	?>
</header><!-- .page-header -->

<?php
if ( have_posts() ) :

	while ( have_posts() ) : the_post();
		get_template_part( 'partials/content', get_post_format() );
	endwhile; ?>

    <div class="grid-item pagination__item">
		<?php  echo writerflow_pagination(); // the_posts_navigation(); ?>
    </div>

<?php
else :
	get_template_part( 'partials/content', 'none' );
endif; ?>

<?php
get_footer(); ?>
