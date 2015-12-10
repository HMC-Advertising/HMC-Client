<?php

add_filter( 'rwmb_meta_boxes', 'cl_options' );
function cl_options( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Client Items', 'textdomain' ),
        'post_types' => 'clients',
        'fields'     => array(
        	array(
        		"id" => "type",
        		"name" => __('File Type', 'textdomain'),
        		"type" => 'text'
        	),
        	array(
        		"id" => "uploaded_by",
        		"name" => __('Uploaded By', 'textdomain'),
        		"type" => 'text'
        	),
            array(
				'name' => __( 'File Upload', 'client_file' ),
				'id'   => "Cfile",
				'type' => 'file',
			),
        ),
    );
    return $meta_boxes;
}