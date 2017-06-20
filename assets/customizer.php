<?php /* WP Customizer */
function protago_theme_customizer( $wp_customize ) {

	// REMOVE some core theme settings first

	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('background_color');
	$wp_customize->remove_panel('colors');





	// ADD new panels (parent sections)
	$wp_customize->add_panel('protago_settings_panel', array(
        'title'    => __('Settings', 'protago'),
        'priority' => 10,
    ));
	$wp_customize->add_panel('protago_identity_panel', array(
        'title'    => __('Identity', 'protago'),
        'priority' => 10,
    ));
    $wp_customize->add_panel('protago_colors_panel', array(
        'title'    => __('Colors', 'protago'),
		'priority' => 20,
    ));
	$wp_customize->add_panel('protago_styling_panel', array(
		'title'    => __('Styling', 'protago'),
		'priority' => 30,
	));
	$wp_customize->add_panel('protago_images_panel', array(
		'title'    => __('Images', 'protago'),
		'priority' => 40,
	));




	// ADD sections (child sections)
		$wp_customize->add_section('protago_settings_content', array(
        	'title'    => __('Content', 'protago'),
        	'panel'  => 'protago_settings_panel',
    	));
    	$wp_customize->add_section('protago_settings_sidebar', array(
        	'title'    => __('Sidebar', 'protago'),
        	'panel'  => 'protago_settings_panel',
    	));


		$wp_customize->add_section('protago_styling_lettertype', array(
        	'title'    => __('Lettertype', 'protago'),
        	'panel'  => 'protago_styling_panel',
    	));

		$wp_customize->add_section('protago_styling_spacing', array(
        	'title'    => __('Spacing', 'protago'),
        	'panel'  => 'protago_styling_panel',
    	));

    	$wp_customize->add_section('protago_colors_global', array(
        	'title'    => __('Global Colors', 'protago'),
        	'panel'  => 'protago_colors_panel',
		'priority' => 10,
    	));
    	$wp_customize->add_section('protago_colors_top', array(
        	'title'    => __('Topbar Colors', 'protago'),
        	'panel'  => 'protago_colors_panel',
		'priority' => 20,
    	));
    	$wp_customize->add_section('protago_colors_footer', array(
        	'title'    => __('Footer Colors', 'protago'),
        	'panel'  => 'protago_colors_panel',
		'priority' => 30,
    	));

    	$wp_customize->add_section('protago_identity_panel_logo', array(
        	'title'    => __('Logo image', 'protago'),
        	'panel'  => 'protago_identity_panel',
		'priority' => 10,
    	));

    	$wp_customize->add_section('protago_identity_panel_featured', array(
        	'title'    => __('SEO & Featured data', 'protago'),
        	'panel'  => 'protago_identity_panel',
		'priority' => 30,
    	));


    	$wp_customize->add_section('protago_identity_panel_info', array(
        	'title'    => __('Contact, Copyright & Disclaimer', 'protago'),
        	'panel'  => 'protago_identity_panel',
		'priority' => 30,
    	));





	// MOVE some wp-core sections and settings to new positions
    	$wp_customize->add_section('title_tagline', array(
        	'title'    => __('Title, Tagline & Icon', 'protago'),
        	'panel'  => 'protago_identity_panel',
		'priority' => 20,
    	));
    	$wp_customize->add_section('header_image', array(
        	'title'    => __('Header Image', 'protago'),
        	'panel'  => 'protago_images_panel',
		'priority' => 30,
    	));
    	$wp_customize->add_section('background_image', array(
        	'title'    => __('Background Image', 'protago'),
        	'panel'  => 'protago_images_panel',
		'priority' => 40,
    	));
    	$wp_customize->add_section('static_front_page', array(
        	'title'    => __('Static Frontpage', 'protago'),
        	'description'    => __('Select one of your pages to be the frontpage. The selected page might have it\'s own page-template to make a special layout. This setting overrules any custom frontpage settings.', 'protago'),
        	'panel'  => 'protago_settings_panel',
		'priority' => 400,
    	));







	// SETTINGS DATA
	$wp_customize->add_setting( 'protago_settings_content_datedisplay' , array(
		'default' => 'list',
		'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_settings_content_datedisplay', array(
            'label'          => __( 'Date and Time display', 'protago' ),
            'section'        => 'protago_settings_content',
            'settings'       => 'protago_settings_content_datedisplay',
            'type'           => 'radio',
 	    	'description'    => __( 'Select to display the date.', 'protago' ),
            'choices'        => array(
                'none'   => __( 'No date display', 'protago' ),
                'single'   => __( 'Display post dates in single post view only', 'protago' ),
                'list'   => __( 'Display dates in lists and single views', 'protago' ),
                'page'   => __( 'Display date in pages only', 'protago' ),
            	'all'   => __( 'Always display dates  (pages and posts)', 'protago' ),
            )
    )));

	$wp_customize->add_setting( 'protago_settings_content_dateformat' , array(
		'default' => 'default',
		'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_settings_content_dateformat', array(
            'label'          => __( 'Date and Time format', 'protago' ),
            'section'        => 'protago_settings_content',
            'settings'       => 'protago_settings_content_dateformat',
            'type'           => 'radio',
 	    	'description'    => __( 'Select to display the date.', 'protago' ),
            'choices'        => array(
                'default'   => __( 'Normal wp settings display', 'protago' ),
                'ago'   => __( 'Format Time Ago', 'protago' ),
            )
    )));

	$wp_customize->add_setting( 'protago_settings_content_authordisplay' , array(
		'default' => 'list',
		'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_settings_content_authordisplay', array(
            'label'          => __( 'Author name display', 'protago' ),
            'section'        => 'protago_settings_content',
            'settings'       => 'protago_settings_content_authordisplay',
            'type'           => 'radio',
 	    	'description'    => __( 'Select to display the author name.', 'protago' ),
            'choices'        => array(
                'none'   => __( 'No author display', 'protago' ),
                'single'   => __( 'Display post author in single post view only', 'protago' ),
                'list'   => __( 'Display author name in lists and single views', 'protago' ),
                'page'   => __( 'Display authorname in pages only', 'protago' ),
            	'all'   => __( 'Always display author name (pages and posts)', 'protago' ),
            )
    )));



	// Settings Spacing
	$wp_customize->add_setting( 'protago_settings_spacing_vertical' , array(
		'default' => '2',
		'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_settings_spacing_vertical', array(
            'label'          => __( 'Vertical Space', 'protago' ),
            'section'        => 'protago_styling_spacing',
            'settings'       => 'protago_settings_spacing_vertical',
            'type'           => 'number',
 	    	'description'    => __( 'Select a default percentage for vertical spacing', 'protago' ),
    )));
	$wp_customize->add_setting( 'protago_settings_spacing_horizontal' , array(
		'default' => '4',
		'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_settings_spacing_horizontal', array(
            'label'          => __( 'Horizontal Space', 'protago' ),
            'section'        => 'protago_styling_spacing',
            'settings'       => 'protago_settings_spacing_horizontal',
            'type'           => 'number',
 	    	'description'    => __( 'Select a default percentage for horizontal spacing', 'protago' ),
    )));


	// Fonttypes
	// list google fonts

	// Fontsize
	$wp_customize->add_setting( 'protago_styling_lettertype_fontsize' , array(
		'default' => '5',
		'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_styling_lettertype_fontsize', array(
            'label'          => __( 'Font size', 'protago' ),
            'section'        => 'protago_styling_lettertype',
            'settings'       => 'protago_styling_lettertype_fontsize',
            'type'           => 'number',
 	    	'description'    => __( 'Select global fontsize in scale 1-10 (body default).', 'protago' ),
    )));




	// SETTINGS SIDEBAR
	$wp_customize->add_setting( 'protago_settings_sidebar1_display' , array(
		'default' => 'left',
		'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_settings_sidebar1_display', array(
            'label'          => __( 'Sidebar 1 Position', 'protago' ),
            'section'        => 'protago_settings_sidebar',
            'settings'       => 'protago_settings_sidebar1_display',
            'type'           => 'radio',
 	    	'description'    => __( 'Select sidebar 1 display position.', 'protago' ),
            'choices'        => array(
                'none'   => __( 'None', 'protago' ),
                'left'   => __( 'left', 'protago' ),
            	'right'   => __( 'right', 'protago' ),
            )
    )));
	$wp_customize->add_setting( 'protago_settings_sidebar1_width' , array(
		'default' => '30',
		'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_settings_sidebar1_width', array(
            'label'          => __( 'Sidebar 1 large width', 'protago' ),
            'section'        => 'protago_settings_sidebar',
            'settings'       => 'protago_settings_sidebar1_width',
            'type'           => 'number',
 	    	'description'    => __( 'Select sidebar 1 width (percentage) for large screens.', 'protago' ),
    )));

	$wp_customize->add_setting( 'protago_settings_sidebar1_width2' , array(
		'default' => '30',
		'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_settings_sidebar1_width2', array(
            'label'          => __( 'Sidebar 1 medium width', 'protago' ),
            'section'        => 'protago_settings_sidebar',
            'settings'       => 'protago_settings_sidebar1_width2',
            'type'           => 'number',
 	    	'description'    => __( 'Select sidebar 1 width (percentage) for medium (tablet) screens.', 'protago' ),
    )));

	$wp_customize->add_setting( 'protago_settings_sidebar2_display' , array(
		'default' => 'none',
		'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_settings_sidebar2_display', array(
            'label'          => __( 'Sidebar 2 Position', 'protago' ),
            'section'        => 'protago_settings_sidebar',
            'settings'       => 'protago_settings_sidebar2_display',
            'type'           => 'radio',
 	    	'description'    => __( 'Select sidebar 2 display position.', 'protago' ),
            'choices'        => array(
                'none'   => __( 'none', 'protago' ),
                'left'   => __( 'left', 'protago' ),
            	'right'   => __( 'right', 'protago' ),
            )
    )));
	$wp_customize->add_setting( 'protago_settings_sidebar2_width' , array(
		'default' => '20',
		'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_settings_sidebar2_width', array(
            'label'          => __( 'Sidebar 2 large width', 'protago' ),
            'section'        => 'protago_settings_sidebar',
            'settings'       => 'protago_settings_sidebar2_width',
            'type'           => 'number',
 	    	'description'    => __( 'Select sidebar 2 width (percentage) for large screens.', 'protago' ),
    )));

	$wp_customize->add_setting( 'protago_settings_sidebar2_width2' , array(
		'default' => '16',
		'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_settings_sidebar2_width2', array(
            'label'          => __( 'Sidebar 2 medium width', 'protago' ),
            'section'        => 'protago_settings_sidebar',
            'settings'       => 'protago_settings_sidebar2_width2',
            'type'           => 'number',
 	    	'description'    => __( 'Select sidebar 2 width (percentage) for medium (tablet) screens.', 'protago' ),
    )));






	// SETTINGS IDENTITY CONTACT, COPYRIGHT & DISCLAIMER
	$wp_customize->add_setting('protago_identity_contact_text', array(
		'sanitize_callback' => 'protago_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_identity_contact_text', array(
            	'label'          => __( 'Contact text', 'protago' ),
            	'section'        => 'protago_identity_panel_info',
            	'settings'       => 'protago_identity_contact_text',
            	'type'           => 'textarea',
        	'priority' => 2,
    	)));
	$wp_customize->add_setting('protago_identity_copyright_text', array(
		'sanitize_callback' => 'protago_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_identity_copyright_text', array(
            	'label'          => __( 'Copyright text', 'protago' ),
            	'section'        => 'protago_identity_panel_info',
            	'settings'       => 'protago_identity_copyright_text',
            	'type'           => 'textarea',
        	'priority' => 10,
    	)));
	$wp_customize->add_setting('protago_identity_disclaimer_text', array(
		'sanitize_callback' => 'protago_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_identity_disclaimer_text', array(
            	'label'          => __( 'Disclaimer text', 'protago' ),
            	'section'        => 'protago_identity_panel_info',
            	'settings'       => 'protago_identity_disclaimer_text',
            	'type'           => 'textarea',
        	'priority' => 18,
    	)));





	// ADD COLORS settings
	$wp_customize->add_setting( 'protago_style_colors_bodybg' , array(
		'default' => '#eaeaea',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_bodytext' , array(
		'default' => '#494949',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_bodylink' , array(
		'default' => '#353535',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_bodylinkhover' , array(
		'default' => '#5e5e5e',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_mainheaders' , array(
		'default' => '#424242',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_subheaders' , array(
		'default' => '#606060',
		'sanitize_callback' => 'protago_sanitize_default',
    	));


	$wp_customize->add_setting( 'protago_style_colors_top_bg' , array(
		'default' => '#cccccc',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_top_text' , array(
		'default' => '#494949',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_topheaders' , array(
		'default' => '#494949',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_top_link' , array(
		'default' => '#353535',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_top_linkhover' , array(
		'default' => '#5e5e5e',
		'sanitize_callback' => 'protago_sanitize_default',
    	));

	$wp_customize->add_setting( 'protago_style_colors_footer_bg' , array(
		'default' => '#cccccc',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_footer_text' , array(
		'default' => '#494949',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_footerheaders' , array(
		'default' => '#494949',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_footer_link' , array(
		'default' => '#353535',
		'sanitize_callback' => 'protago_sanitize_default',
    	));
	$wp_customize->add_setting( 'protago_style_colors_footer_linkhover' , array(
		'default' => '#5e5e5e',
		'sanitize_callback' => 'protago_sanitize_default',
    	));




    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_bodybg', array(
		'label' => __( 'Background Color', 'protago' ),
		'section' => 'protago_colors_global',
		'settings' => 'protago_style_colors_bodybg',
    	) ) );
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_bodytext', array(
		'label' => __( 'Text Color', 'protago' ),
		'section' => 'protago_colors_global',
		'settings' => 'protago_style_colors_bodytext',
    	) ) );
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_bodylink', array(
		'label' => __( 'Link Color', 'protago' ),
		'section' => 'protago_colors_global',
		'settings' => 'protago_style_colors_bodylink',
    	) ) );
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_bodylinkhover', array(
		'label' => __( 'Link Hover Color', 'protago' ),
		'section' => 'protago_colors_global',
		'settings' => 'protago_style_colors_bodylinkhover',
    	) ) );
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_mainheaders', array(
		'label' => __( 'H1 & H2 Text Color', 'protago' ),
		'section' => 'protago_colors_global',
		'settings' => 'protago_style_colors_mainheaders',
    	) ) );
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_subheaders', array(
		'label' => __( 'H3,H4 & H5 Text Color', 'protago' ),
		'section' => 'protago_colors_global',
		'settings' => 'protago_style_colors_subheaders',
    	) ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_top_bg', array(
		'label' => __( 'Background Color', 'protago' ),
		'section' => 'protago_colors_top',
		'settings' => 'protago_style_colors_top_bg',
    	) ) );
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_top_text', array(
		'label' => __( 'Text Color', 'protago' ),
		'section' => 'protago_colors_top',
		'settings' => 'protago_style_colors_top_text',
    	) ) );

    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_topheaders', array(
		'label' => __( 'Headers Top', 'protago' ),
		'section' => 'protago_colors_top',
		'settings' => 'protago_style_colors_topheaders',
    	) ) );
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_top_link', array(
		'label' => __( 'Link Color', 'protago' ),
		'section' => 'protago_colors_top',
		'settings' => 'protago_style_colors_top_link',
    	) ) );
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_top_linkhover', array(
		'label' => __( 'Link Hover Color', 'protago' ),
		'section' => 'protago_colors_top',
		'settings' => 'protago_style_colors_top_linkhover',
    	) ) );


		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_footer_bg', array(
		'label' => __( 'Background Color', 'protago' ),
		'section' => 'protago_colors_footer',
		'settings' => 'protago_style_colors_footer_bg',
    	) ) );
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_footer_text', array(
		'label' => __( 'Text Color', 'protago' ),
		'section' => 'protago_colors_footer',
		'settings' => 'protago_style_colors_footer_text',
    	) ) );
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_footerheaders', array(
		'label' => __( 'Headers Footer', 'protago' ),
		'section' => 'protago_colors_footer',
		'settings' => 'protago_style_colors_footerheaders',
    	) ) );
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_footer_link', array(
		'label' => __( 'Link Color', 'protago' ),
		'section' => 'protago_colors_footer',
		'settings' => 'protago_style_colors_footer_link',
    	) ) );
    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'protago_style_colors_footer_linkhover', array(
		'label' => __( 'Link Hover Color', 'protago' ),
		'section' => 'protago_colors_footer',
		'settings' => 'protago_style_colors_footer_linkhover',
    	) ) );




	// PANEL IMAGES
	$wp_customize->add_setting( 'protago_identity_logo_top', array(
		'sanitize_callback' => 'protago_sanitize_default',
	));
	$wp_customize->add_setting( 'protago_identity_logo_bottom', array(
		'sanitize_callback' => 'protago_sanitize_default',
	));


	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'protago_identity_logo_top', array(
        	'label'    => __( 'Site Logo Image Top', 'protago' ),
        	'section'  => 'protago_identity_panel_logo',
        	'settings' => 'protago_identity_logo_top',
		'description' => __( 'Upload or select an image to use as site logo (replacing the site-title text on top).', 'protago' ),
        	'priority' => 10,
    	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'protago_identity_logo_bottom', array(
        	'label'    => __( 'Site Logo Image Bottom', 'protago' ),
        	'section'  => 'protago_identity_panel_logo',
        	'settings' => 'protago_identity_logo_bottom',
		'description' => __( 'Upload or select an image for alternative site logo (replacing the site-title text at the bottom).', 'protago' ),
        	'priority' => 10,
    	) ) );



	/* SEO & Featured content */
	$wp_customize->add_setting('protago_identity_featured_keywords', array(
		'sanitize_callback' => 'protago_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_identity_featured_keywords', array(
            	'label'          => __( 'Meta keywords', 'protago' ),
            	'section'        => 'protago_identity_panel_featured',
            	'settings'       => 'protago_identity_featured_keywords',
				'description' => __( 'SEO meta data keywords, comma separated (replaced by specific content tags if available).', 'protago' ),
            	'type'           => 'textarea',
        	'priority' => 10,
    	)));


	$wp_customize->add_setting('protago_identity_featured_text', array(
		'sanitize_callback' => 'protago_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_identity_featured_text', array(
            	'label'          => __( 'Meta description', 'protago' ),
            	'section'        => 'protago_identity_panel_featured',
            	'settings'       => 'protago_identity_featured_text',
				'description' => __( 'SEO meta data and snippets (replaced by specific content description if available).', 'protago' ),
            	'type'           => 'textarea',
        	'priority' => 10,
    	)));


	$wp_customize->add_setting( 'protago_identity_featured_image', array(
		'sanitize_callback' => 'protago_sanitize_default',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'protago_identity_featured_image', array(
        	'label'    => __( 'Site featured image', 'protago' ),
        	'section'  => 'protago_identity_panel_featured',
        	'settings' => 'protago_identity_featured_image',
		'description' => __( 'Upload or select a featured site-image, this might be used when no source related image is available.', 'protago' ),
        	'priority' => 10,
    	) ) );

	$wp_customize->add_setting('protago_identity_trackingcode', array(
		'sanitize_callback' => 'protago_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_identity_trackingcode', array(
            	'label'          => __( 'Tracking code', 'protago' ),
            	'section'        => 'protago_identity_panel_featured',
            	'settings'       => 'protago_identity_trackingcode',
            	'description'       => __( 'Paste JS code here to be used on start body content (like google tracker)' , 'protago' ),
            	'type'           => 'textarea',
        	'priority' => 24,
    	)));


}
add_action( 'customize_register', 'protago_theme_customizer' );

// default sanitize function
function protago_sanitize_default($obj){
    //.. global sanitizer
    return $obj;
}

function protago_customize_adaptive() {

$contentpos = 'right';
if( get_theme_mod('protago_settings_sidebar_position') == $contentpos ){
$contentpos = 'left';
}
?>
<style type='text/css'>
body {
height:100%;
width:100%;
background-color:<?php echo get_theme_mod('protago_style_colors_bodybg', '#ffffff'); ?>;
color:<?php echo get_theme_mod('protago_style_colors_bodytext', '#494949' ); ?>;
font-size: <?php echo get_theme_mod('protago_styling_lettertype_fontsize', 5 )*0.2; ?>em;
}
a {
color:<?php echo get_theme_mod('protago_style_colors_bodylink', '#353535' ) ?> ;
}
a:hover {
color:<?php echo get_theme_mod('protago_style_colors_bodylinkhover', '#5e5e5e' ); ?> ;
}
h1,h2,
h1 a, h2 a
{
color:<?php echo get_theme_mod('protago_style_colors_mainheaders' , '#000000' ); ?> ;
}
h3,h4,h5,
h3 a, h4 a, h5 a
{
color:<?php echo get_theme_mod('protago_style_colors_subheaders', '#606060'); ?> ;
}

#topcontainer {
background-color:<?php echo get_theme_mod('protago_style_colors_top_bg', '#cccccc') ?> ;
color:<?php echo get_theme_mod('protago_style_colors_toptext', '#494949' ) ?> ;
}
#topcontainer a {
color:<?php echo get_theme_mod('protago_style_colors_top_link', '#353535' ) ?> ;
}
#topcontainer a:hover {
color:<?php echo get_theme_mod('protago_style_colors_top_linkhover', '#5e5e5e' ); ?> ;
}
#topcontainer h1,#topcontainer h2,#topcontainer h3,#topcontainer h4,#topcontainer h5,#topcontainer h6,
#topcontainer h1 a,#topcontainer h2 a,#topcontainer h3 a,#topcontainer h4 a,#topcontainer h5 a,#topcontainer h6 a
{
color:<?php echo get_theme_mod('protago_style_colors_topheaders' , '#494949' ); ?> ;
}




#maincontentcontainer
{
position:relative;
height:100%;
}

#footercontainer {
background-color:<?php echo get_theme_mod('protago_style_colors_footer_bg', '#cccccc') ?> ;
color:<?php echo get_theme_mod('protago_style_colors_footer_text', '#494949' ) ?> ;
}
#footercontainer a {
color:<?php echo get_theme_mod('protago_style_colors_footer_link', '#353535' ) ?> ;
}
#footercontainer a:hover {
color:<?php echo get_theme_mod('protago_style_colors_footer_linkhover', '#5e5e5e' ); ?> ;
}
#footercontainer h1,#footercontainer h2,#footercontainer h3,#footercontainer h4,#footercontainer h5,#footercontainer h6,
#footercontainer h1 a,#footercontainer h2 a,#footercontainer h3 a,#footercontainer h4 a,#footercontainer h5 a,#footercontainer h6 a
{
color:<?php echo get_theme_mod('protago_style_colors_footerheaders' , '#494949' ); ?> ;
}
<?php

/* Spacing */
$verticalspace = get_theme_mod('protago_settings_spacing_vertical', 2);
$horizontalspace = get_theme_mod('protago_settings_spacing_horizontal', 4);
?>

/* logobox */


.logobox a img
{
margin:<?php echo $verticalspace*2; ?>px <?php echo $horizontalspace*4; ?>px;
width:20%;
min-width: 40px;
max-width: 180px;
height:auto;
}

.logobox h1,
.logobox h2,
.logobox h4,
.logobox h5
{
padding:<?php echo $verticalspace*2; ?>px <?php echo $horizontalspace*4; ?>px;
}

/* menu items */
ul.menu li
{
margin:<?php echo $verticalspace*2; ?>px <?php echo $horizontalspace; ?>px;
}
ul.menu li a
{
padding:<?php echo $verticalspace*2; ?>px <?php echo $horizontalspace; ?>px;
}

#topcontainer ul.menu li,
#footercontainer ul.menu li
{
margin:<?php echo $verticalspace*2; ?>px <?php echo $horizontalspace; ?>px;
}
#topcontainer ul.menu li a,
#footercontainer ul.menu li a
{
padding:<?php echo $verticalspace*2; ?>px <?php echo $horizontalspace; ?>px;
}


/* content & widget headers */
#pagecontentbox
{
padding:<?php echo $verticalspace*6; ?>px <?php echo $horizontalspace*2; ?>px;
}



#pagecontentbox h1,
#pagecontentbox h2,
#pagecontentbox h3,
#pagecontentbox h4,
.widget h1,
.widget h2,
.widget h3,
.widget h4
{
padding-top:<?php echo $verticalspace*3; ?>px;
padding-bottom:<?php echo $verticalspace*3; ?>px;
}

#pagecontentbox .innerpadding h1,
#pagecontentbox .innerpadding h2,
#pagecontentbox .innerpadding h3,
#pagecontentbox .innerpadding h4,
.widget .innerpadding h1,
.widget .innerpadding h2,
.widget .innerpadding h3,
.widget .innerpadding h4
{
padding:0;
}

/* content innerpadding */
#maincontent .innerpadding
{
padding:0px;
}


#sidebar1 .innerpadding,
#sidebar2 .innerpadding
{
padding:<?php echo $verticalspace*6; ?>px 0px;
}
/* widget content */
.widget .innerpadding,
#bottommenu .innerpadding
{
margin:<?php echo $verticalspace*4; ?>px <?php echo $horizontalspace*4; ?>px;
}
<?php


// sidebar settings
$sidebar1display = get_theme_mod('protago_settings_sidebar1_display','right');
$sidebar2display = get_theme_mod('protago_settings_sidebar2_display','none');
// large screen (default)
$sidebar1width = 0;
$sidebar2width = 0;
$maincontentwidth = 100;
// medium screen
$sidebar1width2 = 0;
$sidebar2width2 = 0;
$maincontentwidth2 = 100;

if( $sidebar1display != 'none' ){
$sidebar1width = get_theme_mod('protago_settings_sidebar1_width',37);
$sidebar1width2 = get_theme_mod('protago_settings_sidebar1_width2',30);
}
if( $sidebar2display != 'none' ){
$sidebar2width = get_theme_mod('protago_settings_sidebar2_width',20);
$sidebar2width2 = get_theme_mod('protago_settings_sidebar2_width2',14);
}

$maincontentwidth = $maincontentwidth - ( $sidebar1width + $sidebar2width);
$maincontentwidth2 = $maincontentwidth2 - ( $sidebar1width2 + $sidebar2width2);

?>

/* sidebars medium width */
@media screen and (min-width: 540px) and (max-width: 785px){



<?php if( $sidebar1display != 'none' ){ ?>
#sidebar1
{
float:<?php echo $sidebar1display; ?>;
width:<?php echo $sidebar1width2; ?>%;
}
<?php } ?>
<?php if( $sidebar2display != 'none' ){ ?>
#sidebar2
{
float:<?php echo $sidebar2display; ?>;
width:<?php echo $sidebar2width2; ?>%;
}
<?php } ?>

#maincontent
{
float:left;
width:<?php echo $maincontentwidth2; ?>%;
}


}

/* sidebars large width */
@media screen and (min-width: 786px){

<?php if( $sidebar1display != 'none' ){ ?>
#sidebar1
{
float:<?php echo $sidebar1display; ?>;
width:<?php echo $sidebar1width; ?>%;
}
<?php } ?>
<?php if( $sidebar2display != 'none' ){ ?>
#sidebar2
{
float:<?php echo $sidebar2display; ?>;
width:<?php echo $sidebar2width; ?>%;
}
<?php } ?>

#maincontent
{
float:left;
width:<?php echo $maincontentwidth; ?>%;
}

}

</style>

<?php
}
add_action( 'wp_head' , 'protago_customize_adaptive' );


function example_() {
echo '<script type="text/javascript"> ( function( $ ) {';
echo '// test';
echo '}); } )( jQuery )</script>';
}  // End function example_()
//add_action( 'wp_footer', 'example_', 21);

// http://buildwpyourself.com/building-theme-color-options-customizer/
// https://codex.wordpress.org/Class_Reference/WP_Customize_Control
// http://wptheming.com/2014/09/customizer-panels-field-types/
// http://www.divjot.co/smart-controls-wordpress-customizer/
// >> http://code.tutsplus.com/tutorials/a-guide-to-the-wordpress-theme-customizer-adding-a-new-setting--wp-33180
// http://www.wpbeginner.com/wp-tutorials/how-to-create-a-custom-wordpress-widget/

// blog, enterprise, gallery, portal, profile, shop
?>
