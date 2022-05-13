<?php

$tagline = get_field('int_txt', 'options');
$bg = get_field('b_bg', 'options');

?>

<?php
    echo gsc("banner", [
        "content" => [
            "tagline" => $tagline,
            "title" =>  get_bloginfo(),
            "image" => ''
            ],
        "style" => [
        "class" => "int-header",
        "id" => 'banner',
        "attrs" => [
            "custom-attr" => "attr"
        ]
        ]
    ]);
?>
