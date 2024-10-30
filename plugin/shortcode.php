<?php

add_shortcode( 'mapplanner-map', 'print_mapplanner_map' );

function print_mapplanner_map( $atts ) {

    $mppl_debug = "false";
    if( isset($atts["debug"]) && $atts["debug"] == "true" ){
        $mppl_debug = "true";
    }

    if( is_numeric($atts["account"]) && is_numeric($atts["map"]) ){
        $mppl_account = $atts["account"];
        $mppl_map = $atts["map"];
    }else{
        return '<p style="color:red;">Los atributos introducidos no parecen ser correctos, por favor, revísalos</p>';
    }

    $mppl_embed_template = '<div id="mppl-plan-{{plan_id}}" class="mppl-plan-container"></div> <script src="https://app.mapplanner.co/Api/script_load/{{account_id}}"></script>
<script>var obj_mppl_plan_{{plan_id}} = new mppl_plan( { id:"{{plan_id}}",selector:"#mppl-plan-{{plan_id}}",debug:{{debug_config}} } ); </script>';
    
    $mppl_embed_code = str_replace( 
        array("{{plan_id}}", "{{account_id}}" , "{{debug_config}}") , 
        array( $mppl_map , $mppl_account, $mppl_debug) , 
        $mppl_embed_template);

    return $mppl_embed_code;
   
}
?>