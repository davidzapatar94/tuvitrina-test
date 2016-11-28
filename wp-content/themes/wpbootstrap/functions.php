<?php

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

//Agrego todos mis scripts
function add_my_script() {
  wp_enqueue_script(
    'custom-script',
		get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js',
		array( 'jquery' )
  );
  // wp_enqueue_script(
  //   'owl_script',
	// 	get_template_directory_uri() .
	// 	'/owl-carousel/owl.carousel.js',
	// 	rray( 'jquery' )
  // );
  wp_enqueue_script(
    'myscript',
		get_template_directory_uri() . '/assets/js/script.js',
		array( 'jquery' ),
		true
  );
	wp_enqueue_script(
    'lettering',
		get_template_directory_uri() . '/assets/js/jquery.lettering-0.6.min.js',
		array( 'jquery' ),
		true
  );
}
add_action( 'wp_enqueue_scripts', 'add_my_script' );


if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
?>
