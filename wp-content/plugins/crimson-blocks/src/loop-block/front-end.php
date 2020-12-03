<?php

require_once __DIR__ . '/../functions/block-functions.php';

function render_loop_block($attributes) {

    ob_start(); // Turn on output buffering

    /* BEGIN HTML OUTPUT */

    ?>
    <?php 

    //Storing varialbes
    $title = $attributes['title'];
    $block_id = $attributes['blockId'];
    $num_posts = $attributes['numPosts'];
    $post_type = $attributes['postType'];
    $post_class = $attributes['postClasses'];
    $before_loop_layout = $attributes['beforeLoopLayout'];
    $post_layout = $attributes['postLayout'];
    $after_loop_layout = $attributes['afterLoopLayout'];
    $taxonomy = $attributes['taxonomy'];
    $taxonomy_term = $attributes['taxonomyTerm'];
    $offset = $attributes['offset'];
    $block_classes = $attributes['className'];

    ?>

    <section class="wp-block-crimson-blocks-loop-block row<?php if(!empty($block_classes)){ echo ' '.$block_classes; }?>" <?php if(!empty($block_id)){ ?> id="<?php echo $block_id ?>" <?php } ?>>
        <div class="col-12">
            <div class="row crimson-block-inner">
                <div class="col-12">
                    <?php
                    if(!empty($before_loop_layout)) {
                    eval('?>'.crimson_handlebars($before_loop_layout));
                    } else {
                    if(!empty($title)){echo '<h2 class="module-heading">' . $title . '</h2>';}
                    }

                    //The Loop
                    ?>
                    <div class="row post-area">
                    <?php
                    $args = array( 'post_type' => $post_type, 'posts_per_page' => $num_posts );
                    if(!empty($taxonomy) && !empty($taxonomy_term)) {
                        $args['tax_query'] = array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field'    => 'slug',
                            'terms'    => $taxonomy_term,
                            )
                        );
                    }
                    if($offset != 0) {
                        $args['offset'] = $offset;
                    }
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="<?php echo $post_class; ?>">
                        <?php
                            if(!empty($post_layout)){
                            eval('?>'.crimson_handlebars($post_layout));
                            } else { ?>
                        <h3><?php the_title(); ?></h3>
                        <?php the_content(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                        <?php } ?>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>

                    <div class="clear"></div>
                    </div>

                    <?php
                    //After The Loop
                    if (!empty($after_loop_layout)) {
                    eval('?>'.crimson_handlebars($after_loop_layout));
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    /* END HTML OUTPUT */

    $output = ob_get_contents(); // collect output
    ob_end_clean(); // Turn off ouput buffer

    return $output; // Print output

}
