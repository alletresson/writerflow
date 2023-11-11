<?php
if ( has_post_thumbnail() ) :
	$writertheme_feat_img = get_the_post_thumbnail_url();

	list( $width, $height ) = getimagesize( $writertheme_feat_img );
	if ( $width < $height ) { ?>
		<article itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

			<header class="entry-header">
				<div class="posted-on">
					<?php echo get_the_date(); ?>
				</div>
				<div>
					<?php writertheme_posted_cat(); ?>
					<a href="<?php echo get_permalink(); ?>">
						<?php the_title( sprintf( '<h1 class="entry-title" itemprop="headline"><span>', esc_url( get_permalink() ) ), '</span></h3>' ); ?>
					</a>
				</div>
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
		<article itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

			<header class="entry-header">
				<div class="posted-on">
					<?php echo get_the_date(); ?>
				</div>
				<div>
					<?php writertheme_posted_cat(); ?>
					<a href="<?php echo get_permalink(); ?>">
						<?php the_title( sprintf( '<h1 class="entry-title" itemprop="headline"><span>', esc_url( get_permalink() ) ), '</span></h3>' ); ?>
					</a>
				</div>
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
	<article itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
		<header class="entry-header">
			<div class="posted-on">
				<?php echo get_the_date(); ?>
			</div>
			<div>
				<?php writertheme_posted_cat(); ?>
				<a href="<?php echo get_permalink(); ?>">
					<?php the_title( sprintf( '<h1 class="entry-title" itemprop="headline"><span>', esc_url( get_permalink() ) ), '</span></h3>' ); ?>
				</a>
			</div>
		</header>

		<div class="entry-content" itemprop="articleBody">
			<?php the_content(); ?>

			<?php wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'writer-theme' ),
					'after'  => '</div>',
				)
			); ?>
		</div>
	</article>

<?php endif; ?>
