<?php

/*
	
@package purnatur
	



/*
	
	========================
		FRONT ENQUEUE FUNCTIONS
	========================
*/

function quanta_load_scripts() {

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_template_directory_uri().'/dist/js/jquery-3.5.1.min.js', array(), '3.5.1', true );
		wp_enqueue_script( 'jquery' );

		wp_enqueue_style('nunitosans' , 'https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&display=swap');
		wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/dist/css/bootstrap.min.css', array(), '4.5.2', 'all' );
		wp_enqueue_style( 'purnatur', get_template_directory_uri().'/dist/css/styles.min.css', array(), '1.0.0', 'all' );

		wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/dist/js/bootstrap.min.js', array('jquery'), '4.5.2', true );

		wp_enqueue_script( 'quanta', get_template_directory_uri().'/dist/js/scripts.min.js', array('jquery'), '', true );

		

		

}

add_action( 'wp_enqueue_scripts', 'quanta_load_scripts');