<?php

function upC($atts, $content = null){
    extract(shortcode_atts(array(
        "client_name" => ""
        ),$atts));

    // WP_Query arguments
    $args = array (
        'post_type' => array( 'clients' ),
        'category_name'          => $client_name
    );

    // The Query
    $query_client = new WP_Query( $args );

    $output = "";

       $output .="<table class='display' id='dtc'>";

    
        $output .="<thead>";
        $output .= "<tr>
                    <th>Date Uploaded</th>
                    <th>File Name</th>
                    <th>URL</th>
                    <th>Type</th>
                    <th>Uploaded By</th>
                </tr>";
        $output .="</thead>";
  

    $output .="<tbody>";

    if($query_client->have_posts()){
         while ( $query_client->have_posts() ) { 
            $query_client->the_post(); 

            if(!isset($client_name) ){
                $clientName = get_category();

                $output .= "<tr>";
                $output .= "<td>".$clientName."</td>";
                $output .= "<td><a href='".get_bloginfo('url')."/"."clients/".$clientName."' target='_blank'>".$clientName." View</a></td>";
                $output .= "</tr>";
            }
            else{
                $c_opt_file = rwmb_meta("Cfile", "type=file");
                $c_opt_author = rwmb_meta("uploaded_by" );
                $c_opt_type = rwmb_meta("type");
                $c_opt_file_name = get_the_title();
                $c_opt_date = get_the_date();

               foreach ( $c_opt_file as $c) {
                   $c_file = $c["url"] ;
               }

                $output .= "<tr>";
                $output .= "<td>". $c_opt_date."</td>";
                $output .=  "<td>".$c_opt_file_name."</td>";
                $output .= "<td><a href='".$c_file."' target='_blank'>".$c_file."</a></td>";
                $output .= "<td>".$c_opt_type."</td>";
                $output .= "<td>".$c_opt_author."</td>";
                $output .= "</tr>";
            }
        }
    }
    
    
    $output .="</tbody>";
    $output .="<tfooter></tfooter>";
    $output .= "</table>";

   

    return $output;
 wp_reset_postdata();

}

add_shortcode("uptable", "upC");

