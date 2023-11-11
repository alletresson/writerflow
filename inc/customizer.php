<?php
function writerflow_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	// Theme Texts

	$wp_customize->add_section(
		'writerflow_texts_section',
		array(
			'title'    => __( 'Theme Texts', 'writerflow' ),
			'priority' => 1,
		)
	);

	$wp_customize->add_setting(
		'writerflow_menu_text_setting',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writerflow_menu_text_control',
			array(
				'label'         => __( 'Menu text', 'writerflow' ),
				'description'   => __( 'Default is Menu', 'writerflow' ),
				'section'       => 'writerflow_texts_section',
				'settings'      => 'writerflow_menu_text_setting',
				'type'          => 'text',
			)
		)
	);
	
	// Social Media Icons

	$wp_customize->add_section(
		'writerflow_social_media_section',
		array(
			'title'    => __( 'Social Media Icons', 'writerflow' ),
			'priority' => 3,
		)
	);

    $wp_customize->add_setting(
        'writerflow_social_media_instagram_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'writerflow_social_media_instagram_control',
            array(
                'label'    => __( 'Instagram URL', 'writerflow' ),
                'section'  => 'writerflow_social_media_section',
                'settings' => 'writerflow_social_media_instagram_setting',
                'type'     => 'text',
            )
        )
    );

    $wp_customize->add_setting(
        'writerflow_social_media_youtube_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'writerflow_social_media_youtube_control',
            array(
                'label'    => __( 'YouTube URL', 'writerflow' ),
                'section'  => 'writerflow_social_media_section',
                'settings' => 'writerflow_social_media_youtube_setting',
                'type'     => 'text',
            )
        )
    );

    $wp_customize->add_setting(
        'writerflow_social_media_pinterest_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'writerflow_social_media_pinterest_control',
            array(
                'label'    => __( 'Pinterest URL', 'writerflow' ),
                'section'  => 'writerflow_social_media_section',
                'settings' => 'writerflow_social_media_pinterest_setting',
                'type'     => 'text',
            )
        )
    );

    $wp_customize->add_setting(
        'writerflow_social_media_facebook_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'writerflow_social_media_facebook_control',
            array(
                'label'    => __( 'Facebook URL', 'writerflow' ),
                'section'  => 'writerflow_social_media_section',
                'settings' => 'writerflow_social_media_facebook_setting',
                'type'     => 'text',
            )
        )
    );

	$wp_customize->add_setting(
		'writerflow_social_media_twitter_setting',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writerflow_social_media_twitter_control',
			array(
				'label'    => __( 'Twitter URL', 'writerflow' ),
				'section'  => 'writerflow_social_media_section',
				'settings' => 'writerflow_social_media_twitter_setting',
				'type'     => 'text',
			)
		)
	);

	// Intro Text

	$wp_customize->add_section(
		'writerflow_about_section',
		array(
			'title'    => __( 'Intro Text', 'writerflow' ),
			'priority' => 4,
		) );

	$wp_customize->add_setting(
		'writerflow_about_text_setting',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writerflow_about_text_control',
			array(
				'label'    => __( 'Text', 'writerflow' ),
				'section'  => 'writerflow_about_section',
				'settings' => 'writerflow_about_text_setting',
				'type'     => 'textarea',
			)
		)
	);

	$wp_customize->add_setting(
		'writerflow_about_button_setting',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writerflow_about_button_control',
			array(
				'label'    => __( 'Link Text', 'writerflow' ),
				'section'  => 'writerflow_about_section',
				'settings' => 'writerflow_about_button_setting',
				'type'     => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		'writerflow_about_link_setting',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writerflow_about_link_control',
			array(
				'label'    => __( 'Link URL', 'writerflow' ),
				'section'  => 'writerflow_about_section',
				'settings' => 'writerflow_about_link_setting',
				'type'     => 'text',
			)
		)
	);

	// Related Posts

	$wp_customize->add_section(
		'writerflow_related_section',
		array(
			'title'    => __( 'Related Articles', 'writerflow' ),
			'priority' => 6,
		)
	);

	$wp_customize->add_setting(
		'writerflow_related_setting',
		array(
			'default'           => false,
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writerflow_related_control',
			array(
				'label'       => __( 'Hide Related Articles', 'writerflow' ),
				'description' => __( 'Check to hide the related posts section on single article page.', 'writerflow' ),
				'section'     => 'writerflow_related_section',
				'settings'    => 'writerflow_related_setting',
				'type'        => 'checkbox',
			)
		)
	);

	$wp_customize->add_setting(
		'writerflow_related_title_setting',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
			'default'           => 'You might also like',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'writerflow_related_title_control',
			array(
				'label'    => __( 'Related posts title', 'writerflow' ),
				'section'  => 'writerflow_related_section',
				'settings' => 'writerflow_related_title_setting',
				'type'     => 'text',
			)
		)
	);
}

add_action( 'customize_register', 'writerflow_customize_register' );