<?php
$block_prefix = 'tm';
$heading = get_field('tm_hd');
$post_ids = get_field('tm_rows');
$query_posts = new QueryCustomPosts();
$custom_posts = $query_posts->get_custom_posts('team', $post_ids);
$titles = [];
$content = [];
$post_image_src_urls = [];
//get post titles and content into separate arrays of each
foreach ($custom_posts as $custom_post) {
    $titles[]   = $custom_post->post_title;
    $subtitles[] = get_field('tm_pos', $custom_post->ID);
    $content[]  = $custom_post->post_content;
    $post_image_src_urls[] = wp_get_attachment_image_src( get_post_thumbnail_id( $custom_post->ID ), 'single-post-thumbnail' )[0];
}

?>

<section class="<?php echo $block_prefix; ?>">
    <div class="<?php echo $block_prefix; ?>__acc">
    <?php
        echo gsc("accordion", [
            "content" => [
                "titles"        => $titles,
                "subtitles"     => $subtitles,
                "content"       => $content,
                "image_urls"    => $post_image_src_urls,
            ]
        ]);
    ?>
    </div>
</section>