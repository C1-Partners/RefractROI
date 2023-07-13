<?php 

$formID = 13;

?>

<div class="flf" id="formFloat">
    <?php
        echo gsc("btn-close", [
            "content" => [
            "class" => "flf__close",
            "attrs" => [
                "id" => "flfClose"
            ]
            ]
        ]);
    ?>
    <div class="flf__inner">
        <p class="flf__text">
            Hey there, anything we can assist with?
        </p>
    <?php          
        echo gravity_form( 
            $formID,
            $display_title          = false,
            $display_description    = false,
            $display_inactive       = false,
            $field_values           = null,
            $ajax                   = true,
            $echo                   = true
        );              
    ?>
    </div>
</div>