<?php
/**
 * Customizer Blog
 *
 * @package Amela
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
* Meta
*/

// Meta category
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_meta_category_show',
	'label'       => esc_html__( 'Show meta category', 'amela' ),
	'section'     => 'amela_settings_post_meta',
	'default'     => true,
) );

// Meta date
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_meta_date_show',
	'label'       => esc_html__( 'Show meta date', 'amela' ),
	'section'     => 'amela_settings_post_meta',
	'default'     => true,
) );

// Meta author
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_meta_author_show',
	'label'       => esc_html__( 'Show meta author', 'amela' ),
	'section'     => 'amela_settings_post_meta',
	'default'     => true,
) );


/**
* Excerpt
*/

// Post excerpt
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_post_excerpt_show',
	'label'       => esc_html__( 'Show post excerpt', 'amela' ),
	'section'     => 'amela_settings_post_excerpt',
	'default'     => true,
) );

// Post excerpt length
Kirki::add_field( 'amela_config', array(
	'type'        => 'number',
	'settings'    => 'amela_settings_posts_excerpt_length',
	'label'       => esc_attr__( 'Posts excerpt length', 'amela' ),
	'section'     => 'amela_settings_post_excerpt',
	'default'     => 55,
	'choices'     => array(
		'min'  => 0,
		'max'  => 9999,
		'step' => 1,
	),
) );


/**
* Single Post
*/

// Post title
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_single_post_title_show',
	'label'       => esc_html__( 'Show post title', 'amela' ),
	'section'     => 'amela_settings_single_post',
	'default'     => true,
) );

// Featured Image
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_single_featured_image_show',
	'label'       => esc_html__( 'Show featured image', 'amela' ),
	'section'     => 'amela_settings_single_post',
	'default'     => true,
) );

// Meta category
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_single_category_show',
	'label'       => esc_html__( 'Show category', 'amela' ),
	'section'     => 'amela_settings_single_post',
	'default'     => true,
) );

// Meta date
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_single_date_show',
	'label'       => esc_html__( 'Show date', 'amela' ),
	'section'     => 'amela_settings_single_post',
	'default'     => true,
) );

// Meta author
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_single_author_show',
	'label'       => esc_html__( 'Show author', 'amela' ),
	'section'     => 'amela_settings_single_post',
	'default'     => true,
) );

// Meta comments
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_single_comments_show',
	'label'       => esc_html__( 'Show comments', 'amela' ),
	'section'     => 'amela_settings_single_post',
	'default'     => true,
) );

// Post tags
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_post_tags_show',
	'label'       => esc_html__( 'Show tags', 'amela' ),
	'section'     => 'amela_settings_single_post',
	'default'     => true,
) );

// Post author box
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_author_box_show',
	'label'       => esc_html__( 'Show author box', 'amela' ),
	'section'     => 'amela_settings_single_post',
	'default'     => true,
) );

// Post navigation
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_post_navigation_show',
	'label'       => esc_html__( 'Show post navigation', 'amela' ),
	'section'     => 'amela_settings_single_post',
	'default'     => true,
) );

// Related posts heading
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'amela_settings_single_post',
	'default'     => '<h3 class="customizer-title">' . esc_html__( 'Related Posts', 'amela' ) . '</h3>',
) );

// Related posts
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_related_posts_show',
	'label'       => esc_html__( 'Show related posts', 'amela' ),
	'section'     => 'amela_settings_single_post',
	'default'     => true,
) );

// Related by
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'select',
	'settings'    => 'amela_settings_related_posts_relation',
	'label'       => esc_html__( 'Related by', 'amela' ),
	'section'     => 'amela_settings_single_post',
	'default'     => 'category',
	'choices'     => array(
		'category' => esc_html__( 'Category', 'amela' ),
		'tag' => esc_html__( 'Tag', 'amela' ),
		'author' => esc_html__( 'Author', 'amela' ),
	),
) );


/**
* Socials Share Buttons
*/

// Social Share Buttons
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_post_share_buttons_show',
	'label'       => esc_html__( 'Show share buttons', 'amela' ),
	'section'     => 'amela_settings_social_share',
	'default'     => true,
) );

// Facebook Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_post_share_facebook',
	'label'       => esc_html__( 'Facebook', 'amela' ),
	'section'     => 'amela_settings_social_share',
	'default'     => true,
) );

// Twitter Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_post_share_twitter',
	'label'       => esc_html__( 'Twitter', 'amela' ),
	'section'     => 'amela_settings_social_share',
	'default'     => true,
) );

// Linkedin Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_post_share_linkedin',
	'label'       => esc_html__( 'Linkedin', 'amela' ),
	'section'     => 'amela_settings_social_share',
	'default'     => true,
) );

// Pinterest Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_post_share_pinterest',
	'label'       => esc_html__( 'Pinterest', 'amela' ),
	'section'     => 'amela_settings_social_share',
	'default'     => false,
) );

// Pocket Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_post_share_pocket',
	'label'       => esc_html__( 'Pocket', 'amela' ),
	'section'     => 'amela_settings_social_share',
	'default'     => false,
) );

// Facebook Messenger Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_post_share_facebook_messenger',
	'label'       => esc_html__( 'Facebook Messenger', 'amela' ),
	'section'     => 'amela_settings_social_share',
	'default'     => false,
) );

// Whatsapp Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_post_share_whatsapp',
	'label'       => esc_html__( 'Whatsapp', 'amela' ),
	'section'     => 'amela_settings_social_share',
	'default'     => false,
) );

// Viber Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_post_share_viber',
	'label'       => esc_html__( 'Viber', 'amela' ),
	'section'     => 'amela_settings_social_share',
	'default'     => false,
) );

// Telegram Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_post_share_telegram',
	'label'       => esc_html__( 'Telegram', 'amela' ),
	'section'     => 'amela_settings_social_share',
	'default'     => false,
) );

// Reddit Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_post_share_reddit',
	'label'       => esc_html__( 'Reddit', 'amela' ),
	'section'     => 'amela_settings_social_share',
	'default'     => false,
) );

// Email Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_post_share_email',
	'label'       => esc_html__( 'Email', 'amela' ),
	'section'     => 'amela_settings_social_share',
	'default'     => false,
) );


/**
 * Newsletter
 */

if ( defined( 'MC4WP_VERSION' ) ) {

	// Newsletter
	Kirki::add_field( 'amela_settings_config', array(
		'type'        => 'toggle',
		'settings'    => 'amela_settings_newsletter_show',
		'label'       => esc_html__( 'Show newsletter box', 'amela' ),
		'section'     => 'amela_settings_newsletter',
		'default'     => true,
	) );

	// Newsletter Image
	Kirki::add_field( 'amela_settings_config', array(
		'type'        => 'image',
		'settings'    => 'amela_settings_newsletter_image',
		'label'       => esc_html__( 'Image', 'amela' ),
		'section'     => 'amela_settings_newsletter',
		'default'     => [
			'url' => AMELA_URI . '/assets/img/newsletter/amela_newsletter-min.jpg',
			'id' => 0
		],
		'choices'   => [
			'save_as' => 'array',
		],
	) );

	// Title
	Kirki::add_field( 'amela_settings_config', array(
		'type'        => 'text',
		'settings'    => 'amela_settings_newsletter_title',
		'label'       => esc_html__( 'Title', 'amela' ),
		'section'     => 'amela_settings_newsletter',
		'default'     => esc_html__( 'Sign up now & get 10% off', 'amela' ),
	) );

	// Text
	Kirki::add_field( 'amela_settings_config', array(
		'type'        => 'text',
		'settings'    => 'amela_settings_newsletter_text',
		'label'       => esc_html__( 'Text', 'amela' ),
		'section'     => 'amela_settings_newsletter',
		'default'     => esc_html__( 'Be the first to know about our new arrivals and exclusive offers.', 'amela' ),
	) );

}


/**
* Read More
*/

// Read More Show
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_read_more_show',
	'label'       => esc_html__( 'Show read more', 'amela' ),
	'section'     => 'amela_settings_read_more',
	'default'     => false,
) );

// Read More Text
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'text',
	'settings'    => 'amela_settings_read_more_text',
	'label'       => esc_html__( 'Read more text', 'amela' ),
	'section'     => 'amela_settings_read_more',
	'default'     => esc_html__( 'Read More', 'amela' ),
) );