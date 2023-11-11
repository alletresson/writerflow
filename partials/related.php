<?php if (!empty($related_posts) && !get_theme_mod('writerflow_related_setting')) { ?>
    <div class="widget writerflow-related-posts">
        <?php
        if (get_theme_mod('writerflow_related_title_setting')) { ?>
            <h4 class="widget-title"><?php echo esc_html(get_theme_mod('writerflow_related_title_setting')); ?></h4>

        <?php } else { ?>
            <h4 class="widget-title"><?php _e('You might also like', 'writerflow'); ?></h4>
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
