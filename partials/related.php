<?php if (!empty($related_posts) && !get_theme_mod('writermuse_related_setting')) { ?>
    <div class="widget writermuse-related-posts">
        <?php
        if (get_theme_mod('writermuse_related_title_setting')) { ?>
            <h4 class="widget-title"><?php echo esc_html(get_theme_mod('writermuse_related_title_setting')); ?></h4>

        <?php } else { ?>
            <h4 class="widget-title"><?php _e('You might also like', 'writermuse'); ?></h4>
            <?php
        }
        ?>

        <ul>
            <?php
            foreach ($related_posts as $post) {
                setup_postdata($post);
                ?>
                <li itemscope itemtype="http://schema.org/blogPost">
                    <a class="title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <h4 class="entry-title"><?php the_title(); ?></h4>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <?php
}
