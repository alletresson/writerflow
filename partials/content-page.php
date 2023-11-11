<?php
if ( has_post_thumbnail() ) :
	$writertheme_feat_img = get_the_post_thumbnail_url();

	list( $width, $height ) = getimagesize( $writertheme_feat_img );
	if ( $width < $height ) { ?>
		<article itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>

			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title" itemprop="headline">', '</h2>' ); ?>
			</header>

			<div class="entry-content" itemprop="articleBody">
				<div class="entry-thumbnail-single" itemprop="image">
					<?php the_post_thumbnail( 'full' ); ?>
				</div>

				<?php the_content(); ?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'writer-theme' ),
					'after'  => '</div>',
				) ); ?>
			</div>
		</article>

	<?php } else { ?>
		<article itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>

			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title" itemprop="headline">', '</h2>' ); ?>
			</header>

			<div class="entry-content" itemprop="articleBody">
				<div class="entry-thumbnail-single landscape" itemprop="image">
					<?php the_post_thumbnail( 'full' ); ?>
				</div>

				<?php the_content(); ?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'writer-theme' ),
					'after'  => '</div>',
				) ); ?>
			</div>
		</article>
	<?php }

else : ?>
	<article itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>

		<header class="entry-header">
			<?php writertheme_posted_cat(); ?>
			<?php the_title( '<h2 class="entry-title" itemprop="headline">', '</h2>' ); ?>
		</header>

		<div class="entry-content" itemprop="articleBody">
			<?php the_content(); ?>

			<?php wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'writer-theme' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
	</article>

<?php endif; ?>

