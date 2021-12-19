<?php

define('DS', DIRECTORY_SEPARATOR);
define('THEME_PATH', get_template_directory());
define('THEME_INC_PATH', get_template_directory().DS.'inc');
define('THEME_URL', get_template_directory_uri());

if (!function_exists('mii_theme_setup')):
	function mii_theme_setup(){
		load_theme_textdomain('wptw-simple', get_template_directory() . '/languages');
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 100,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
		add_theme_support('custom-header', array(	
			'width'         => 1280,
			'height'        => 200,
			'default-image' => get_template_directory_uri() . '/assets/img/default-header.jpg',
		));
		
		// Require Tailwind_Navwalker class
		require_once THEME_INC_PATH.DS.'tailwind-navwalker.php';
		register_nav_menu( 'primary', __( 'Primary Menu', 'wptw-simple' ) );
	}

	add_action('after_setup_theme', 'mii_theme_setup');
endif;

if (!function_exists('mii_enqueue_assets')):
	function mii_enqueue_assets() {
		wp_enqueue_style( 'mii', THEME_URL.'/style.css');
		wp_enqueue_style( 'app', THEME_URL.'/assets/dist/css/app.css');
		wp_enqueue_script( 'alpine', THEME_URL.'/assets/dist/js/alpine.js');
		wp_enqueue_script( 'app', THEME_URL.'/assets/dist/js/app.js');
	}

	add_action('wp_enqueue_scripts', 'mii_enqueue_assets');
endif;

if (!function_exists('defer_alpinejs_tag')):
	function defer_alpinejs_tag($tag, $handle, $src) {

		if ($handle === 'alpine') {

			if (false === stripos($tag, 'defer')) {
				
				$tag = str_replace('<script ', '<script defer ', $tag);
				
			}
			
		}
		
		return $tag;
		
	}
	add_filter('script_loader_tag', 'defer_alpinejs_tag', 10, 3);
endif;