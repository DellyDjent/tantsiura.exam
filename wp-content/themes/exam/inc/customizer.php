<?php
/**
 * template Theme Customizer
 *
 * @package template
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function template_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'template_customize_register' );

function template_customize_preview_js() {
	wp_enqueue_script( 'template_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'template_customize_preview_js' );

//field
function hw_customize_register( $wp_customize ) {
	//All our sections, settings, and controls will be added here
	$wp_customize->add_section( 'hw_social_links' , array(
		'title'      => __( 'Social links', 'hw' ),
		'priority'   => 30,
	) );

	$wp_customize->add_setting( 'social_links_facebook' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_facebook', array(
		'label'        => __( 'Facebook', 'hw' ),
		'section'    => 'hw_social_links',
		'settings'   => 'social_links_facebook',
	) ) );

	$wp_customize->add_setting( 'social_links_twitter' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_twitter', array(
		'label'        => __( 'Twitter', 'hw' ),
		'section'    => 'hw_social_links',
		'settings'   => 'social_links_twitter',
	) ) );

	$wp_customize->add_setting( 'social_links_google' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_google', array(
		'label'        => __( 'Google', 'hw' ),
		'section'    => 'hw_social_links',
		'settings'   => 'social_links_google',
	) ) );

	$wp_customize->add_setting( 'social_links_youtube' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_youtube', array(
		'label'        => __( 'Youtube', 'hw' ),
		'section'    => 'hw_social_links',
		'settings'   => 'social_links_youtube',
	) ) );

	$wp_customize->add_setting( 'social_links_instagram' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_instagram', array(
		'label'        => __( 'Instagram', 'hw' ),
		'section'    => 'hw_social_links',
		'settings'   => 'social_links_instagram',
	) ) );

	$wp_customize->add_setting( 'social_links_dribbble' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_dribbble', array(
		'label'        => __( 'Dribbble', 'hw' ),
		'section'    => 'hw_social_links',
		'settings'   => 'social_links_dribbble',
	) ) );

	$wp_customize->add_setting( 'social_links_pinterest' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_pinterest', array(
		'label'        => __( 'Pinterest', 'hw' ),
		'section'    => 'hw_social_links',
		'settings'   => 'social_links_pinterest',
	) ) );

	$wp_customize->add_setting( 'social_links_color' , array(
		'default'     => '',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_links_color', array(
		'label'        => __( 'Social links background color', 'hw' ),
		'section'    => 'hw_social_links',
		'settings'   => 'social_links_color',
	) ) );
}
add_action( 'customize_register', 'hw_customize_register' );


function about_us_register( $wp_customize ) {

	////////////////!!!!!CUSTOM SECTION!!!!!///////////////

	$wp_customize->add_section ( 'custom',
		array(
			'title' => __('Custom'),
			'priority' => 10,
			'panel' => 'Home page panel'
		)
	);

	$wp_customize->add_setting(
		'custom_title',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'custom_title',
			array(
				'settings'  => 'custom_title',
				'section'  => 'custom',
				'type'   => 'text',
				'label'         => __( 'Title' )
			)
		)
	);

	$wp_customize->add_setting(
		'custom_subtitle',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'custom_subtitle',
			array(
				'settings'  => 'custom_subtitle',
				'section'  => 'custom',
				'type'   => 'text',
				'label'         => __( 'Subtitle' )
			)
		)
	);

	$wp_customize->add_setting(
		'custom_article',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'custom_article',
			array(
				'settings'  => 'custom_article',
				'section'  => 'custom',
				'type'   => 'textarea',
				'label'         => __( 'Article' )
			)
		)
	);

	$wp_customize->add_setting(
		'custom_pages',
		array(
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'custom_page',
			array(
				'settings'  => 'custom_pages',
				'section'  => 'custom',
				'type'   => 'dropdown-pages',
				'label'   => __( 'Select a Page' )
			)
		)
	);

	////////////////////!!!!CUSTOM SECTION END!!!!///////////////////////



	////////////////WELCOME SECTION///////////////

	$wp_customize->add_section ( 'welcome',
		array(
			'title' => __('Welcome'),
			'priority' => 10,
			'panel' => 'Home page panel'
		)
	);

	$wp_customize->add_setting(
		'welcome_title',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'welcome_title',
			array(
				'settings'  => 'welcome_title',
				'section'  => 'welcome',
				'type'   => 'text',
				'label'         => __( 'Title' )
			)
		)
	);

	$wp_customize->add_setting(
		'welcome_subtitle',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'welcome_subtitle',
			array(
				'settings'  => 'welcome_subtitle',
				'section'  => 'welcome',
				'type'   => 'text',
				'label'         => __( 'Subtitle' )
			)
		)
	);

	$wp_customize->add_setting(
		'welcome_article',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'welcome_article',
			array(
				'settings'  => 'welcome_article',
				'section'  => 'welcome',
				'type'   => 'textarea',
				'label'         => __( 'Article' )
			)
		)
	);

	$wp_customize->add_setting(
		'client_pages',
		array(
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'client_page',
			array(
				'settings'  => 'client_pages',
				'section'  => 'client',
				'type'   => 'dropdown-pages',
				'label'   => __( 'Select a Page' )
			)
		)
	);

	////////////////WELCOME SECTION END///////////////




	////////////////OFFERING SECTION///////////////

	$wp_customize->add_section ( 'offering',
		array(
			'title' => __('Offering'),
			'priority' => 10,
			'panel' => 'Home page panel'
		)
	);

	$wp_customize->add_setting(
		'offering_title',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'offering_title',
			array(
				'settings'  => 'offering_title',
				'section'  => 'offering',
				'type'   => 'text',
				'label'         => __( 'Title' )
			)
		)
	);

	$wp_customize->add_setting(
		'offering_subtitle',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'offering_subtitle',
			array(
				'settings'  => 'offering_subtitle',
				'section'  => 'offering',
				'type'   => 'text',
				'label'         => __( 'Subtitle' )
			)
		)
	);

	$wp_customize->add_setting(
		'offering_article',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'offering_article',
			array(
				'settings'  => 'offering_article',
				'section'  => 'offering',
				'type'   => 'textarea',
				'label'         => __( 'Article' )
			)
		)
	);

	$wp_customize->add_setting(
		'offering_pages',
		array(
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'offering_page',
			array(
				'settings'  => 'offering_pages',
				'section'  => 'offering',
				'type'   => 'dropdown-pages',
				'label'   => __( 'Select a Page' )
			)
		)
	);

	$wp_customize->add_panel ('Home page panel',
		array(
			'title' => __('Home page panel'),
			'priority' => 10,
		)
	);

	////////////////OFFERING SECTION END///////////////


	////////////////LATEST SECTION///////////////

	$wp_customize->add_section ( 'works',
		array(
			'title' => __('Works'),
			'priority' => 10,
			'panel' => 'Home page panel'
		)
	);

	$wp_customize->add_setting(
		'works_title',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'works_title',
			array(
				'settings'  => 'works_title',
				'section'  => 'works',
				'type'   => 'text',
				'label'         => __( 'Title' )
			)
		)
	);

	$wp_customize->add_setting(
		'works_subtitle',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'works_subtitle',
			array(
				'settings'  => 'works_subtitle',
				'section'  => 'works',
				'type'   => 'text',
				'label'         => __( 'Subtitle' )
			)
		)
	);

	$wp_customize->add_setting(
		'works_article',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'works_article',
			array(
				'settings'  => 'works_article',
				'section'  => 'works',
				'type'   => 'textarea',
				'label'         => __( 'Article' )
			)
		)
	);

	$wp_customize->add_setting(
		'price_pages',
		array(
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'price_page',
			array(
				'settings'  => 'price_pages',
				'section'  => 'price',
				'type'   => 'dropdown-pages',
				'label'   => __( 'Select a Page' )
			)
		)
	);

	////////////////PRICING SECTION END///////////////




	////////////////CLIENTS SECTION///////////////

	$wp_customize->add_section ( 'clients',
		array(
			'title' => __('Clients'),
			'priority' => 10,
			'panel' => 'Home page panel'
		)
	);

	$wp_customize->add_setting(
		'clients_title',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'clients_title',
			array(
				'settings'  => 'clients_title',
				'section'  => 'clients',
				'type'   => 'text',
				'label'         => __( 'Title' )
			)
		)
	);

	$wp_customize->add_setting(
		'clients_subtitle',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'clients_subtitle',
			array(
				'settings'  => 'clients_subtitle',
				'section'  => 'clients',
				'type'   => 'text',
				'label'         => __( 'Subtitle' )
			)
		)
	);

	$wp_customize->add_setting(
		'clients_article',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'clients_article',
			array(
				'settings'  => 'clients_article',
				'section'  => 'clients',
				'type'   => 'textarea',
				'label'         => __( 'Article' )
			)
		)
	);

	$wp_customize->add_setting(
		'clients_pages',
		array(
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'clients_page',
			array(
				'settings'  => 'clients_pages',
				'section'  => 'clients',
				'type'   => 'dropdown-pages',
				'label'   => __( 'Select a Page' )
			)
		)
	);

	////////////////CLIENTS SECTION END///////////////



	////////////////!!!!!CONTACT SECTION!!!!!///////////////

	$wp_customize->add_section ( 'contact',
		array(
			'title' => __('Contact'),
			'priority' => 10,
			'panel' => 'Home page panel'
		)
	);

	$wp_customize->add_setting(
		'contact_title',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'contact_title',
			array(
				'settings'  => 'contact_title',
				'section'  => 'contact',
				'type'   => 'text',
				'label'         => __( 'Title' )
			)
		)
	);

	$wp_customize->add_setting(
		'contact_subtitle',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'contact_subtitle',
			array(
				'settings'  => 'contact_subtitle',
				'section'  => 'contact',
				'type'   => 'text',
				'label'         => __( 'Subtitle' )
			)
		)
	);

	$wp_customize->add_setting(
		'contact_article',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'contact_article',
			array(
				'settings'  => 'contact_article',
				'section'  => 'contact',
				'type'   => 'textarea',
				'label'         => __( 'Article' )
			)
		)
	);

	$wp_customize->add_setting(
		'contact_pages',
		array(
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'contact_page',
			array(
				'settings'  => 'contact_pages',
				'section'  => 'contact',
				'type'   => 'dropdown-pages',
				'label'   => __( 'Select a Page' )
			)
		)
	);

	////////////////////!!!!CONTACT SECTION END!!!!///////////////////////


////////////////!!!!!CONTACT SECTION!!!!!///////////////

	$wp_customize->add_section ( 'address',
		array(
			'title' => __('Address'),
			'priority' => 10,
			'panel' => 'Home page panel'
		)
	);

	$wp_customize->add_setting(
		'address_title',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'address_title',
			array(
				'settings'  => 'address_title',
				'section'  => 'address',
				'type'   => 'text',
				'label'         => __( 'Title' )
			)
		)
	);

	$wp_customize->add_setting(
		'address_subtitle',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'address_subtitle',
			array(
				'settings'  => 'address_subtitle',
				'section'  => 'address',
				'type'   => 'text',
				'label'         => __( 'Subtitle' )
			)
		)
	);

	$wp_customize->add_setting(
		'address_article',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'address_article',
			array(
				'settings'  => 'address_article',
				'section'  => 'address',
				'type'   => 'textarea',
				'label'         => __( 'Article' )
			)
		)
	);

	$wp_customize->add_setting(
		'address_pages',
		array(
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'address_page',
			array(
				'settings'  => 'address_pages',
				'section'  => 'address',
				'type'   => 'dropdown-pages',
				'label'   => __( 'Select a Page' )
			)
		)
	);

	////////////////////!!!!CUSTOM SECTION END!!!!///////////////////////



	////////////////COPYRIGHT SECTION///////////////

	$wp_customize->add_section ( 'copyright',
		array(
			'title' => __('Copyright'),
			'priority' => 10,
			'panel' => 'Home page panel'
		)
	);

	$wp_customize->add_setting(
		'copyright_title',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'copyright_title',
			array(
				'settings'  => 'copyright_title',
				'section'  => 'copyright',
				'type'   => 'text',
				'label'         => __( 'Title' )
			)
		)
	);

	$wp_customize->add_setting(
		'copyright_subtitle',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'copyright_subtitle',
			array(
				'settings'  => 'copyright_subtitle',
				'section'  => 'copyright',
				'type'   => 'text',
				'label'         => __( 'Subtitle' )
			)
		)
	);

	$wp_customize->add_setting(
		'copyright_article',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'copyright_article',
			array(
				'settings'  => 'copyright_article',
				'section'  => 'copyright',
				'type'   => 'textarea',
				'label'         => __( 'Article' )
			)
		)
	);

	$wp_customize->add_setting(
		'copyright_pages',
		array(
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'copyright_page',
			array(
				'settings'  => 'copyright_pages',
				'section'  => 'copyright',
				'type'   => 'dropdown-pages',
				'label'   => __( 'Select a Page' )
			)
		)
	);

	////////////////COPYRIGHT SECTION///////////////

	////////////////BLOG SECTION///////////////

	$wp_customize->add_section ( 'blog',
		array(
			'title' => __('Blog Post'),
			'priority' => 10,
			'panel' => 'Home page panel'
		)
	);

	$wp_customize->add_setting(
		'blog_title',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'blog_title',
			array(
				'settings'  => 'blog_title',
				'section'  => 'blog',
				'type'   => 'text',
				'label'         => __( 'Title' )
			)
		)
	);

	$wp_customize->add_setting(
		'blog_subtitle',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'blog_subtitle',
			array(
				'settings'  => 'blog_subtitle',
				'section'  => 'blog',
				'type'   => 'text',
				'label'         => __( 'Subtitle' )
			)
		)
	);

	$wp_customize->add_setting(
		'blog_article',
		array(
			'default'   => '',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'blog_article',
			array(
				'settings'  => 'blog_article',
				'section'  => 'blog',
				'type'   => 'textarea',
				'label'         => __( 'Article' )
			)
		)
	);

	$wp_customize->add_setting(
		'blog_pages',
		array(
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'blog_page',
			array(
				'settings'  => 'blog_pages',
				'section'  => 'blog',
				'type'   => 'dropdown-pages',
				'label'   => __( 'Select a Page' )
			)
		)
	);

	////////////////Blog SECTION///////////////
}
add_action( 'customize_register', 'about_us_register' );
