<?php

/*
	
@package purnatur
	
	========================
		REMOVE GENERATOR VERSION NUMBER
	========================
*/


// remove version string in js and css 
function quanta_remove_wp_version_strings( $src ) {

	global $wp_version;
	parse_str( parse_url($src , PHP_URL_QUERY) , $query );

	if( !empty($query) && $query['ver'] === $wp_version  ) {
		$src = remove_query_arg( 'ver', $src );
	}

	return $src;

}

// remove meta tag geberator form header

add_filter( 'script_loader_src' , 'quanta_remove_wp_version_strings');
add_filter( 'style_loader_src' , 'quanta_remove_wp_version_strings');


function quanta_remove_meta_version() {
	return '';
}

add_filter( 'the_generator' , 'quanta_remove_meta_version');