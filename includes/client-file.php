<?php

add_action('login_head', 'gc_custom_login_logo');
/**
 * Client Logo - Home link and Image Description
 * |
 * V
 * Fix Image Width and Height on Inline
 */
function gc_custom_login_logo() {
    echo '<style type="text/css">
        .login h1 a { background-image:url(' . get_stylesheet_directory_uri() . '/images/logo.png) !important; width: 260px; !important; height: 60px !important; background-size: 100% 100% !important; margin-bottom: 60px !important;}
	.login form {margin-top: -50px;}
    </style>';
}
add_filter( 'login_headerurl', 'custom_login_url', 10, 4 );
function custom_login_url() {
	return site_url();
}
add_filter( 'login_headertitle','login_header_title' );
function login_header_title() {
	return get_bloginfo( 'name' );
}


add_action('after_setup_theme', 'gc_remove_admin_bar');
// Remove admin bar for subscribers
function gc_remove_admin_bar() {
        if ( !current_user_can( 'edit_posts' ) && !is_admin() ) {
          show_admin_bar( false );
        }
}


add_action('wp_dashboard_setup', 'gc_remove_dashboard_widgets');
function gc_remove_dashboard_widgets () {
  //remove_meta_box('dashboard_quick_press','dashboard','side'); //Quick Press widget
  //remove_meta_box('dashboard_recent_drafts','dashboard','side'); //Recent Drafts
  remove_meta_box('dashboard_primary','dashboard','side'); //WordPress.com Blog
  //remove_meta_box('dashboard_secondary','dashboard','side'); //Other WordPress News
  //remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
  remove_meta_box('dashboard_plugins','dashboard','normal'); //Plugins
  remove_meta_box('dashboard_right_now','dashboard', 'normal'); //Right Now
  //remove_meta_box('rg_forms_dashboard','dashboard','normal'); //Gravity Forms
  //remove_meta_box('dashboard_recent_comments','dashboard','normal'); //Recent Comments
  //remove_meta_box('icl_dashboard_widget','dashboard','normal'); //Multi Language Plugin
  //remove_meta_box('dashboard_activity','dashboard', 'normal'); //Activity
  remove_action('welcome_panel','wp_welcome_panel');
}


add_action('admin_head', 'gc_hide_tabs');
// Hide 'Screen Option' and 'Help' tab for non-Admins
function gc_hide_tabs() {
	if (!current_user_can('activate_plugins')) {
	echo '
            <style type="text/css">
    		#wp-admin-bar-wp-logo,
                #wp-admin-bar-comments,
                #wp-admin-bar-new-content,
                #contextual-help-link-wrap,
                #screen-options-link-wrap {
                    display: none !important;
                }
    		</style>
        ';
	}
}
