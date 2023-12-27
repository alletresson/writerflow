<?php
function writermuse_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	
	// Social Media Icons

	$wp_customize->add_section(
		'writermuse_social_media_section',
		array(
			'title'    => __( 'Social Media Icons', 'writermuse' ),
			'priority' => 3,
		)
	);

    $wp_customize->add_setting(
        'writermuse_social_media_instagram_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'writermuse_social_media_instagram_control',
            array(
                'label'    => __( 'Instagram URL', 'writermuse' ),
                'section'  => 'writermuse_social_media_section',
                'settings' => 'writermuse_social_media_instagram_setting',
                'type'     => 'text',
            )
        )
    );

    $wp_customize->add_setting(
        'writermuse_social_media_youtube_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'writermuse_social_media_youtube_control',
            array(
                'label'    => __( 'YouTube URL', 'writermuse' ),
                'section'  => 'writermuse_social_media_section',
                'settings' => 'writermuse_social_media_youtube_setting',
                'type'     => 'text',
            )
        )
    );

    $wp_customize->add_setting(
        'writermuse_social_media_pinterest_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'writermuse_social_media_pinterest_control',
            array(
                'label'    => __( 'Pinterest URL', 'writermuse' ),
                'section'  => 'writermuse_social_media_section',
                'settings' => 'writermuse_social_media_pinterest_setting',
                'type'     => 'text',
            )
        )
    );

    $wp_customize->add_setting(
        'writermuse_social_media_facebook_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'writermuse_social_media_facebook_control',
            array(
                'label'    => __( 'Facebook URL', 'writermuse' ),
                'section'  => 'writermuse_social_media_section',
                'settings' => 'writermuse_social_media_facebook_setting',
                'type'     => 'text',
            )
        )
    );

	$wp_customize->add_setting(
		'writermuse_social_media_twitter_setting',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writermuse_social_media_twitter_control',
			array(
				'label'    => __( 'Twitter URL', 'writermuse' ),
				'section'  => 'writermuse_social_media_section',
				'settings' => 'writermuse_social_media_twitter_setting',
				'type'     => 'text',
			)
		)
	);

	// Intro Text

	$wp_customize->add_section(
		'writermuse_about_section',
		array(
			'title'    => __( 'Intro Text', 'writermuse' ),
			'priority' => 4,
		) );

	$wp_customize->add_setting(
		'writermuse_about_text_setting',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writermuse_about_text_control',
			array(
				'label'    => __( 'Text', 'writermuse' ),
				'section'  => 'writermuse_about_section',
				'settings' => 'writermuse_about_text_setting',
				'type'     => 'textarea',
			)
		)
	);

	$wp_customize->add_setting(
		'writermuse_about_button_setting',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writermuse_about_button_control',
			array(
				'label'    => __( 'Link Text', 'writermuse' ),
				'section'  => 'writermuse_about_section',
				'settings' => 'writermuse_about_button_setting',
				'type'     => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		'writermuse_about_link_setting',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writermuse_about_link_control',
			array(
				'label'    => __( 'Link URL', 'writermuse' ),
				'section'  => 'writermuse_about_section',
				'settings' => 'writermuse_about_link_setting',
				'type'     => 'text',
			)
		)
	);

	// Related Posts

	$wp_customize->add_section(
		'writermuse_related_section',
		array(
			'title'    => __( 'Related Articles', 'writermuse' ),
			'priority' => 6,
		)
	);

	$wp_customize->add_setting(
		'writermuse_related_setting',
		array(
			'default'           => false,
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writermuse_related_control',
			array(
				'label'       => __( 'Hide Related Articles', 'writermuse' ),
				'description' => __( 'Check to hide the related posts section on single article page.', 'writermuse' ),
				'section'     => 'writermuse_related_section',
				'settings'    => 'writermuse_related_setting',
				'type'        => 'checkbox',
			)
		)
	);

	$wp_customize->add_setting(
		'writermuse_related_title_setting',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
			'default'           => 'You might also like',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writermuse_related_title_control',
			array(
				'label'    => __( 'Related posts title', 'writermuse' ),
				'section'  => 'writermuse_related_section',
				'settings' => 'writermuse_related_title_setting',
				'type'     => 'text',
			)
		)
	);
}

add_action( 'customize_register', 'writermuse_customize_register' );