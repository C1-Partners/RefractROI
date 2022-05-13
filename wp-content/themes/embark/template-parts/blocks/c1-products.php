<?php

$queryPosts = new QueryPosts();
$products = $queryPosts->get_custom_posts('product');

?>

<section class="products grid">

    <?php 

    foreach ($products as $product) :   
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($product->ID), 'single-post-thumbnail' ); 
        $image_alt = get_the_title($product->ID);
        $product_link = get_permalink($product->ID);
        
        echo gsc("ui-card", [
            "content" => [
                "title" => $product->post_title,
                "subtitle" => "",
                "text" => "",
                "cta" => "View",
                "cta_url" => $product_link,
                "list_title" => "",
                "list_items" => [],
                "img_src" => $image_url,
                "img_alt" => $image_alt,
            ],
            "style" => [
                "type" => "standard",
                "cta_type" => "button", 
            "class" => 'grid_item',
            "id" => '',
            "attrs" => [],
            ],
        ]);
        
    endforeach; ?>

</section>