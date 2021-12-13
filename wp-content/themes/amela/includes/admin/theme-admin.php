<?php

/**
 * Theme admin functions.
 *
 * @package Amela
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/**
* Add admin menu
*
* @since 1.0.0
*/
function amela_theme_admin_menu()
{
    add_theme_page(
        __( 'Amela Getting Started', 'amela' ),
        __( 'Amela', 'amela' ),
        'manage_options',
        'amela-theme',
        'amela_admin_page_content',
        30
    );
}

add_action( 'admin_menu', 'amela_theme_admin_menu' );
/**
* Add admin page content
*
* @since 1.0.0
*/
function amela_admin_page_content()
{
    $docs_url = 'https://docs.deothemes.com/amela/knowledgebase/';
    $urls = array(
        'docs'                  => 'https://docs.deothemes.com/amela',
        'video-tutorials'       => 'https://www.youtube.com/watch?v=R9tPDGK1q-Q&list=PLaPNmyRO67T0BsLPlGdrXO0T_5SxM5A4-&ab_channel=DeoThemes',
        'header-footer-builder' => $docs_url . 'header-footer-builder',
        'product-builder'       => $docs_url . 'product-builder',
        'mega-menu-builder'     => $docs_url . 'mega-menu-builder',
        'page-layout'           => $docs_url . 'page-layout',
        'gdpr'                  => $docs_url . 'gdpr',
        'home-page-demos'       => $docs_url . 'home-page-demos',
    );
    $buttons = array(
        'logo'          => array(
        'link_url'  => admin_url( 'customize.php?autofocus[section]=amela_settings_logo' ),
        'link_text' => __( 'Logo', 'amela' ),
        'icon'      => 'dashicons dashicons-format-image',
    ),
        'header'        => array(
        'link_url'  => admin_url( 'customize.php?autofocus[panel]=amela_settings_header' ),
        'link_text' => __( 'Header', 'amela' ),
        'icon'      => 'dashicons dashicons-align-center',
    ),
        'footer'        => array(
        'link_url'  => admin_url( 'customize.php?autofocus[section]=amela_settings_footer' ),
        'link_text' => __( 'Footer', 'amela' ),
        'icon'      => 'dashicons dashicons-align-full-width',
    ),
        'layout'        => array(
        'link_url'  => admin_url( 'customize.php?autofocus[panel]=amela_settings_layout' ),
        'link_text' => __( 'Layout', 'amela' ),
        'icon'      => 'dashicons dashicons-layout',
    ),
        'colors'        => array(
        'link_url'  => admin_url( 'customize.php?autofocus[section]=amela_settings_colors' ),
        'link_text' => __( 'Colors', 'amela' ),
        'icon'      => 'dashicons dashicons-admin-appearance',
    ),
        'typography'    => array(
        'link_url'  => admin_url( 'customize.php?autofocus[section]=amela_settings_typography' ),
        'link_text' => __( 'Typography', 'amela' ),
        'icon'      => 'dashicons dashicons-editor-textcolor',
    ),
        'customizer'    => array(
        'link_url'  => admin_url( 'customize.php' ),
        'link_text' => __( 'Customizer', 'amela' ),
        'icon'      => 'dashicons dashicons-admin-generic',
    ),
        'documentation' => array(
        'link_url'  => 'https://docs.deothemes.com/amela',
        'link_text' => __( 'Documentation', 'amela' ),
        'icon'      => 'dashicons dashicons-book-alt',
    ),
        'support'       => array(
        'link_url'  => admin_url( 'themes.php?page=amela-theme-contact' ),
        'link_text' => __( 'Support', 'amela' ),
        'icon'      => 'dashicons dashicons-sos',
    ),
    );
    
    if ( amela_fs()->can_use_premium_code__premium_only() && defined( 'AMELA_CORE_VERSION' ) ) {
        $buttons['theme_templates'] = array(
            'link_url'  => admin_url( 'edit.php?post_type=theme_template' ),
            'link_text' => __( 'Theme Templates', 'amela' ),
            'icon'      => 'dashicons dashicons-table-row-after',
        );
        $buttons['adobe_fonts'] = array(
            'link_url'  => admin_url( 'admin.php?page=amela-core-custom-typekit-fonts' ),
            'link_text' => __( 'Adobe Fonts', 'amela' ),
            'icon'      => 'dashicons dashicons-editor-spellcheck',
        );
        $buttons['integrations'] = array(
            'link_url'  => admin_url( 'admin.php?page=amela-core-integrations' ),
            'link_text' => __( 'Google Map', 'amela' ),
            'icon'      => 'dashicons dashicons-location-alt',
        );
    }
    
    $videos = array(
        'theme-installation' => array(
        'links' => array( array(
        'link_url'     => 'https://www.youtube.com/watch?v=O9cfL3sqwvc',
        'link_text'    => __( 'Theme Installation', 'amela' ),
        'link_img_src' => AMELA_URI . '/assets/admin/img/videos/amela_video_demo_import.jpg',
    ) ),
    ),
        'color-editing'      => array(
        'links' => array( array(
        'link_url'     => 'https://www.youtube.com/watch?v=MpjPEHzWti8&list=PLaPNmyRO67T0BsLPlGdrXO0T_5SxM5A4-&index=3&ab_channel=DeoThemes',
        'link_text'    => __( 'Color Editing', 'amela' ),
        'link_img_src' => AMELA_URI . '/assets/admin/img/videos/amela_video_colors_editing.jpg',
    ) ),
    ),
        'product-builder'    => array(
        'links' => array( array(
        'link_url'     => 'https://www.youtube.com/watch?v=2zUr4KWO6rQ&list=PLaPNmyRO67T0BsLPlGdrXO0T_5SxM5A4-&index=2&ab_channel=DeoThemes',
        'link_text'    => __( 'Product Builder', 'amela' ),
        'link_img_src' => AMELA_URI . '/assets/admin/img/videos/amela_video_product_builder.jpg',
    ) ),
    ),
    );
    $info = array(
        'header-footer-builder' => array(
        'title'     => esc_html__( 'Header / Footer Builder', 'amela' ),
        'class'     => 'amela-addon-list-item',
        'title_url' => $urls['header-footer-builder'],
        'links'     => array( array(
        'link_class'   => 'amela-learn-more',
        'link_url'     => $urls['header-footer-builder'],
        'link_text'    => esc_html__( 'Learn More &#187;', 'amela' ),
        'target_blank' => true,
    ) ),
    ),
        'product-builder'       => array(
        'title'     => esc_html__( 'Product Builder', 'amela' ),
        'class'     => 'amela-addon-list-item',
        'title_url' => $urls['product-builder'],
        'links'     => array( array(
        'link_class'   => 'amela-learn-more',
        'link_url'     => $urls['product-builder'],
        'link_text'    => esc_html__( 'Learn More &#187;', 'amela' ),
        'target_blank' => true,
    ) ),
    ),
        'mega-menu-builder'     => array(
        'title'     => esc_html__( 'Mega Menu Builder', 'amela' ),
        'class'     => 'amela-addon-list-item',
        'title_url' => $urls['mega-menu-builder'],
        'links'     => array( array(
        'link_class'   => 'amela-learn-more',
        'link_url'     => $urls['mega-menu-builder'],
        'link_text'    => esc_html__( 'Learn More &#187;', 'amela' ),
        'target_blank' => true,
    ) ),
    ),
        'page-layouts'          => array(
        'title'     => esc_html__( 'Page Layout', 'amela' ),
        'class'     => 'amela-addon-list-item',
        'title_url' => $urls['page-layout'],
        'links'     => array( array(
        'link_class'   => 'amela-learn-more',
        'link_url'     => $urls['page-layout'],
        'link_text'    => esc_html__( 'Learn More &#187;', 'amela' ),
        'target_blank' => true,
    ) ),
    ),
        'gdpr'                  => array(
        'title'     => esc_html__( 'GDPR Tools', 'amela' ),
        'class'     => 'amela-addon-list-item',
        'title_url' => $urls['gdpr'],
        'links'     => array( array(
        'link_class'   => 'amela-learn-more',
        'link_url'     => $urls['gdpr'],
        'link_text'    => esc_html__( 'Learn More &#187;', 'amela' ),
        'target_blank' => true,
    ) ),
    ),
    );
    ?>

		<div class="amela-page-header">
			<div class="amela-page-header__container">
				<div class="amela-page-header__branding">
					<img src="<?php 
    echo  esc_url( AMELA_URI . '/assets/admin/img/amela_logo.png' ) ;
    ?>" class="amela-page-header__logo" alt="<?php 
    echo  esc_attr__( 'Amela', 'amela' ) ;
    ?>" />
					<span class="amela-theme-version"><?php 
    echo  esc_html( AMELA_VERSION ) ;
    ?></span>
				</div>
				<div class="amela-page-header__tagline">
					<span class="amela-page-header__tagline-text"><?php 
    echo  esc_html__( 'Modern eCommerce Theme', 'amela' ) ;
    ?></span>					
				</div>				
			</div>
		</div>

		<div class="wrap amela-container">
			<div class="amela-grid">

				<div class="amela-grid-content">
					<div class="amela-body">

						<h1 class="amela-title"><?php 
    esc_html_e( 'Getting Started', 'amela' );
    ?></h1>
						<p class="amela-intro-text">
							<?php 
    echo  esc_html__( 'Amela is now installed and ready to use. Get ready to build something beautiful. To get started check the links below. We hope you enjoy it!', 'amela' ) ;
    ?>
						</p>

						<h3><?php 
    echo  esc_html__( 'What is next?', 'amela' ) ;
    ?></h3>
						<ol>
							<li><?php 
    printf( esc_html__( 'Install and activate all the %1$s', 'amela' ), sprintf( '<a href="%s">%s</a>', esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ), esc_html__( 'required plugins', 'amela' ) ) );
    ?></li>					
							<li>
								<?php 
    
    if ( class_exists( 'OCDI_Plugin' ) ) {
        ?>
									<a href="<?php 
        echo  esc_url( admin_url( 'themes.php?page=one-click-demo-import' ) ) ;
        ?>">
								<?php 
    } else {
        ?>
									<a href="<?php 
        echo  esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) ;
        ?>">
								<?php 
    }
    
    ?>
										<?php 
    echo  esc_html__( 'Import demo content', 'amela' ) ;
    ?>
									</a>								
							</li>
						</ol>

						<!-- Buttons -->
						<ul class="amela-navigation-buttons">
							<?php 
    foreach ( $buttons as $button => $link ) {
        echo  '<li class="amela-navigation-buttons__item">' ;
        echo  '<a href="' . esc_url( $link['link_url'] ) . '" class="amela-navigation-buttons__url">' ;
        echo  '<span class="amela-navigation-buttons__icon ' . esc_attr( $link['icon'] ) . '"></span>' ;
        echo  '<span class="amela-navigation-buttons__label">' . esc_html( $link['link_text'] ) . '</span>' ;
        echo  '</a>' ;
        echo  '</li>' ;
    }
    ?>							
						</ul>
						
						<?php 
    ?>
						
					</div> <!-- .body -->

				</div> <!-- .content -->
				
				<aside class="amela-grid-sidebar">
					<div class="amela-grid-sidebar-widget-area">

						<div class="amela-widget amela-widget-video-tutorials">
							<h2 class="amela-widget-title"><?php 
    esc_html_e( 'Video Tutorials', 'amela' );
    ?></h2>
							<ul class="amela-video-tutorials">
								<?php 
    foreach ( (array) $videos as $video_items => $video ) {
        echo  '<li class="amela-video-tutorials__item">' ;
        foreach ( $video['links'] as $key => $link ) {
            echo  '<a href="' . esc_url( $link['link_url'] ) . '" class="amela-video-tutorials__url" target="_blank" rel="noopener">' ;
            echo  '<img src="' . esc_url( $link['link_img_src'] ) . '" alt="' . esc_html( $link['link_text'] ) . '" class="amela-video-tutorials__img" />' ;
            echo  '<span class="amela-video-tutorials__label">' . esc_html( $link['link_text'] ) . '</span>' ;
            echo  '</a>' ;
        }
        echo  '</li>' ;
    }
    ?>
							</ul>
						</div>

						<div class="amela-widget">
							<?php 
    ?>
								<h2 class="amela-widget-title"><?php 
    echo  esc_html__( 'Amela Pro Features', 'amela' ) ;
    ?></h2>
							<?php 
    ?>
							<ul class="amela-addon-list">
								<?php 
    foreach ( (array) $info as $addon => $info ) {
        $title_url = ( isset( $info['title_url'] ) && !empty($info['title_url']) ? 'href="' . esc_url( $info['title_url'] ) . '"' : '' );
        $anchor_target = ( isset( $info['title_url'] ) && !empty($info['title_url']) ? "rel='noopener'" : '' );
        echo  '<li class="' . esc_attr( $info['class'] ) . '"><a class="amela-addon-item-title" target="_blank"' . $title_url . $anchor_target . ' >' . esc_html( $info['title'] ) . '</a></li>' ;
    }
    ?>
							</ul>
						</div>

					</div>					
				</aside>	

			</div> <!-- .grid -->

		</div>
	<?php 
}

/**
* Change theme icon
*
* @since 1.0.0
*/
function amela_fs_custom_icon()
{
    return AMELA_DIR . '/assets/admin/img/theme-icon.png';
}

amela_fs()->add_filter( 'plugin_icon', 'amela_fs_custom_icon' );
/**
 * Add extra permissions to Freemius
 */
function amela_freemius_extra_permissions( $permissions )
{
    $permissions['newsletter'] = array(
        'icon-class' => 'dashicons dashicons-email-alt',
        'label'      => amela_fs()->get_text_inline( 'Newsletter', 'amela' ),
        'desc'       => amela_fs()->get_text_inline( 'Your email is added to our newsletter. Updates, announcements, marketing, no spam. Unsubscribe anytime.', 'amela' ),
        'priority'   => 15,
    );
    return $permissions;
}

amela_fs()->add_filter( 'permission_list', 'amela_freemius_extra_permissions' );