</main>

<aside>
    <?php
    get_sidebar(); ?>

    <?php if (
        esc_url(get_theme_mod('writermuse_social_media_twitter_setting')) ||
        esc_url(get_theme_mod('writermuse_social_media_facebook_setting')) ||
        esc_url(get_theme_mod('writermuse_social_media_instagram_setting')) ||
        esc_url(get_theme_mod('writermuse_social_media_pinterest_setting')) ||
        esc_url(get_theme_mod('writermuse_social_media_youtube_setting'))
    ) {
        require_once(get_template_directory() . '/partials/social.php');
    } ?>
</aside>

<footer id="site-footer" itemscope itemtype="http://schema.org/WPFooter">
	&copy;<?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> ·
</footer>
<?php wp_footer(); ?>

</div>

</body>
</html>