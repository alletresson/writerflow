<?php
function writertheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	// Theme Texts

	$wp_customize->add_section(
		'writertheme_texts_section',
		array(
			'title'    => __( 'Theme Texts', 'writerflow' ),
			'priority' => 1,
		)
	);

	$wp_customize->add_setting(
		'writertheme_menu_text_setting',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writertheme_menu_text_control',
			array(
				'label'         => __( 'Menu text', 'writerflow' ),
				'description'   => __( 'Default is Menu', 'writerflow' ),
				'section'       => 'writertheme_texts_section',
				'settings'      => 'writertheme_menu_text_setting',
				'type'          => 'text',
			)
		)
	);
	
	// Social Media Icons

	$wp_customize->add_section(
		'writertheme_social_media_section',
		array(
			'title'    => __( 'Social Media Icons', 'writerflow' ),
			'priority' => 3,
		)
	);

    $wp_customize->add_setting(
        'writertheme_social_media_instagram_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'writertheme_social_media_instagram_control',
            array(
                'label'    => __( 'Instagram URL', 'writerflow' ),
                'section'  => 'writertheme_social_media_section',
                'settings' => 'writertheme_social_media_instagram_setting',
                'type'     => 'text',
            )
        )
    );

    $wp_customize->add_setting(
        'writertheme_social_media_youtube_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'writertheme_social_media_youtube_control',
            array(
                'label'    => __( 'YouTube URL', 'writerflow' ),
                'section'  => 'writertheme_social_media_section',
                'settings' => 'writertheme_social_media_youtube_setting',
                'type'     => 'text',
            )
        )
    );

    $wp_customize->add_setting(
        'writertheme_social_media_pinterest_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'writertheme_social_media_pinterest_control',
            array(
                'label'    => __( 'Pinterest URL', 'writerflow' ),
                'section'  => 'writertheme_social_media_section',
                'settings' => 'writertheme_social_media_pinterest_setting',
                'type'     => 'text',
            )
        )
    );

    $wp_customize->add_setting(
        'writertheme_social_media_facebook_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'writertheme_social_media_facebook_control',
            array(
                'label'    => __( 'Facebook URL', 'writerflow' ),
                'section'  => 'writertheme_social_media_section',
                'settings' => 'writertheme_social_media_facebook_setting',
                'type'     => 'text',
            )
        )
    );

	$wp_customize->add_setting(
		'writertheme_social_media_twitter_setting',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writertheme_social_media_twitter_control',
			array(
				'label'    => __( 'Twitter URL', 'writerflow' ),
				'section'  => 'writertheme_social_media_section',
				'settings' => 'writertheme_social_media_twitter_setting',
				'type'     => 'text',
			)
		)
	);

	// About Widget

	$wp_customize->add_section(
		'writertheme_about_section',
		array(
			'title'    => __( 'Intro text', 'writerflow' ),
			'priority' => 4,
		) );

	$wp_customize->add_setting(
		'writertheme_about_text_setting',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writertheme_about_text_control',
			array(
				'label'    => __( 'Text', 'writerflow' ),
				'section'  => 'writertheme_about_section',
				'settings' => 'writertheme_about_text_setting',
				'type'     => 'textarea',
			)
		)
	);

	$wp_customize->add_setting(
		'writertheme_about_button_setting',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writertheme_about_button_control',
			array(
				'label'    => __( 'Link Text', 'writerflow' ),
				'section'  => 'writertheme_about_section',
				'settings' => 'writertheme_about_button_setting',
				'type'     => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		'writertheme_about_link_setting',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writertheme_about_link_control',
			array(
				'label'    => __( 'Link URL', 'writerflow' ),
				'section'  => 'writertheme_about_section',
				'settings' => 'writertheme_about_link_setting',
				'type'     => 'text',
			)
		)
	);

	// Related posts

	$wp_customize->add_section(
		'writertheme_related_section',
		array(
			'title'    => __( 'Related Articles', 'writerflow' ),
			'priority' => 6,
		)
	);

	$wp_customize->add_setting(
		'writertheme_related_setting',
		array(
			'default'           => false,
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writertheme_related_control',
			array(
				'label'       => __( 'Hide Related Articles', 'writerflow' ),
				'description' => __( 'Check to hide the related posts section on single article page.', 'writerflow' ),
				'section'     => 'writertheme_related_section',
				'settings'    => 'writertheme_related_setting',
				'type'        => 'checkbox',
			)
		)
	);

	$wp_customize->add_setting(
		'writertheme_related_title_setting',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
			'default'           => 'You might also like',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writertheme_related_title_control',
			array(
				'label'    => __( 'Related posts title', 'writerflow' ),
				'section'  => 'writertheme_related_section',
				'settings' => 'writertheme_related_title_setting',
				'type'     => 'text',
			)
		)
	);
}

add_action( 'customize_register', 'writertheme_customize_register' );