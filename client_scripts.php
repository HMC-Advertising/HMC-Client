<?php
function theme_name_scripts() {


	wp_enqueue_style( 'style-sheet', plugins_url('assets/style/css/style.css', __FILE__) );
	wp_enqueue_style( 'dt-style', '//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css' );

	//wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	
	wp_enqueue_script( 'jquery' );
	

	wp_enqueue_script( 'dt-script', '//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'  , array(), '1.0.0', false );


	
	wp_enqueue_script( 'script-name', plugins_url('assets/script/main.js', __FILE__) , array(), '1.0.0', true );

				
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
?>