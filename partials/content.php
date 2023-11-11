<?php
if ( has_post_thumbnail() ) { ?>
	<div class="grid-item">
		<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/blogPosting">
			<header class="entry-header">
				<div class="posted-on">
					<?php echo get_the_date(); ?>
				</div>
				<div>
					<?php writertheme_posted_cat(); ?>
					<a href="<?php echo get_permalink(); ?>">
						<?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><span>', esc_url( get_permalink() ) ), '</span></h3>' ); ?>
					</a>
				</div>
			</header>

			<a href="<?php the_permalink(); ?>" class="entry-thumbnail">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" />
			</a>

			<footer class="entry-meta homepage">
				<meta itemprop="mainEntityOfPage" content="<?php the_title(); ?>">

				<span itemprop="author publisher" itemscope itemtype="http://schema.org/Organization">
					<meta itemprop="name" content="<?php echo get_the_author_meta( $field = 'display_name' ); ?>">

					<span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
						<meta itemprop="url" content="<?php $bt_custom_logo_url = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $bt_custom_logo_url , 'full' );
						if ($image !== false) {
							echo $image[0];
						} ?>"/>
					</span>

					<meta itemprop="url" content="<?php echo esc_url( home_url() ); ?>"/>
	            </span>

				<?php writertheme_posted_on(); ?>
			</footer>
		</article>
	</div>

<?php } else { ?>
	<div class="no-img grid-item">
		<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/blogPosting">
			<header class="entry-header">
				<div class="posted-on">
					<?php echo get_the_date(); ?>
				</div>
				<div>
					<?php writertheme_posted_cat(); ?>
					<a href="<?php echo get_permalink(); ?>">
						<?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><span>', esc_url( get_permalink() ) ), '</span></h3>' ); ?>
					</a>
				</div>
			</header>

			<div class="entry-content" itemprop="articleBody">
				<?php the_excerpt(); ?>

				<?php wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'writerflow' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>

			<footer class="entry-meta homepage">
				<meta itemprop="mainEntityOfPage" content="<?php the_title(); ?>">

				<span itemprop="author publisher" itemscope itemtype="http://schema.org/Person">
					<meta itemprop="name" content="<?php echo get_the_author_meta( $field = 'display_name' ); ?>">

					<meta itemprop="url" content="<?php echo esc_url( home_url() ); ?>"/>
				</span>

				<?php writertheme_posted_on(); ?>
			</footer>
		</article>
	</div>
<?php } ?>