<?php
/** 
 * SW main banner
 * 
 * @package SW
 */

$tagline = get_field('int_txt', 'options');
$bg = get_field('b_bg', 'options');

?>

<section id="banner">
    <?php
        echo gsc("banner", [
            "content" => [
                "tagline" => $tagline,
                "title" =>  get_bloginfo(),
                "image" => $bg['url']
                ],
            "style" => [
            "class" => "custom-class",
                "attrs" => [
                    "custom-attr" => "attr"
                ]
            ]
        ]);
?>
</section>