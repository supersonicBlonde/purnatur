<?php

/*
	
@package purnatur
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/




	
add_action( 'init', 'purenatur_recipe' );
add_action( 'init', 'purenatur_recipe_tax' );

add_action( 'init', 'purenatur_job' );
add_action( 'init', 'purenatur_job_tax' );

	


/* portfolio CPT */
function purenatur_recipe() {
	$labels = array(
		'name' 				=> 'Recettes',
		'singular_name' 	=> 'Recette',
		'menu_name'			=> 'Recette',
		'name_admin_bar'	=> 'Recette'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> true,
		'has_archive'		=> true,
		'menu_position'		=> 10,
		'menu_icon'			=> 'dashicons-format-aside',
		'supports'			=> array( 'title', 'author', 'thumbnail' )
	);
	
	register_post_type( 'recipe', $args );
	
}

function purenatur_job() {
	$labels = array(
		'name' 				=> 'Candidatures',
		'singular_name' 	=> 'Candidature',
		'menu_name'			=> 'Candidatures',
		'name_admin_bar'	=> 'Candidature'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> true,
		'has_archive'		=> true,
		'menu_position'		=> 10,
		'menu_icon'			=> 'dashicons-nametag',
		'supports'			=> array( 'title', 'author', 'thumbnail' )
	);
	
	register_post_type( 'job', $args );
	
}

function purenatur_recipe_tax() {
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => __( 'Categories' ),
		'singular_name'     => __( 'Categorie' ),
		'menu_name'         => __( 'Catégorie'),
	);

	$args = array(
		'hierarchical'      => false,
		'public'			=> true,	
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'recipe-category' ),
	);

	register_taxonomy( 'recipe-category', array( 'recipe' ), $args );
}


function purenatur_job_tax() {
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => __( 'Categories' ),
		'singular_name'     => __( 'Categorie' ),
		'menu_name'         => __( 'Catégorie'),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'job-category' ),
	);

	register_taxonomy( 'job-category', array( 'job' ), $args );
}
