<?php
/*
Plugin Name: Random Headers
Description: If the current theme supports multiple custom headers, this plugin will randomly choose one to display.
Version: 1.0
Plugin URI: http://www.itsananderson.com/plugins/random-headers
Plugin Author: Will Anderson
Author URI: http://www.itsananderson.com/
*/

function random_headers_filter($default) {
	global $_wp_default_headers;
	
	$header_count = count($_wp_default_headers);
	$index = rand(0, $header_count - 1);
	
	$values = array_values($_wp_default_headers);
	
	$header_url = sprintf( $values[$index]['url'], get_template_directory_uri(), get_stylesheet_directory_uri() );
	
	return esc_url($header_url);
}

add_filter('theme_mod_header_image', 'random_headers_filter');