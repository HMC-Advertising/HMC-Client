<?php

function upC($atts, $content = null){
    extract(shortcode_atts(array(
        "id" => "id"
        ),$atts));
    if($id == "dtc"){
        $output ="<table class='display' id='dtc'>";
        $output .="<thead>";
        $output .= "<tr>
                    <th>Client</th>
                    <th>Edit</th>
                    <th>View</th>
                </tr>";
        $output .="</thead>";

    }
    else{
        $output ="<table class='display' id='dt'>";
        $output .="<thead>";
        $output .= "<tr>
                    <th>Date Uploaded</th>
                    <th>File Name</th>
                    <th>URL</th>
                    <th>Type</t h>
                    <th>Uploaded By</th>
                </tr>";
        $output .="</thead>";
    }
    $output .="<tbody>";
    $output .= do_shortcode($content);
    $output .="</tbody>";
    $output .="<tfooter></tfooter>";
    $output .= "</table>";



    return $output;

}

add_shortcode("uptable", "upC");

function upS($atts, $content = null){
    extract(shortcode_atts(array(
        "table" => "table",
        "client" => "client",
        "edit" => "edit",
        "view" => "view",
        "uploaded_by" => "uploaded_by",
        "url" =>"url",
        "date_uploaded" => "date_uploaded",
        "file_name" =>"file_name",
        "type" => "type"
        ),$atts));

    if($table == "client"){
        $output = "<tr>";
        $output .= "<td>".$client."</td>";
        $output .= "<td><a href='".$edit."' target='_blank'>".$edit."</a></td>";
        $output .= "<td><a href='".$view."' target='_blank'>".$view."</a></td>";
        $output .= "</tr>";
    }
    else{
        $output = "<tr>";
        $output .= "<td>".$date_uploaded."</td>";
        $output .=  "<td>".$file_name."</td>";
        $output .= "<td><a href='".$url."' target='_blank'>".$url."</a></td>";
        $output .= "<td>".$type."</td>";
        $output .= "<td>".$uploaded_by."</td>";
        $output .= "</tr>";
    }

    return $output;
}

add_shortcode("upcontent", "upS");
