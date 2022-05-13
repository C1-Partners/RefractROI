
<?php

class QueryPosts {
    // Constructor function to add get_custom_posts to init hook
    function __construct() {
        add_action('init', array($this, 'get_custom_posts'));
    }
    /**
     * @param string $post_type
     * @return array
     *
     * Return posts in an array $posts 
     * -----------
     * Returns 
     */
    public function get_custom_posts($post_type) {
        $posts = [];
        $args = array(
              'post_type' => $post_type,
              'posts_per_page' => -1,
              'suppress_filters' => false
        );
        $query = new WP_Query( $args ); 
        
        if($query->have_posts()) {
            while($query->have_posts()) {
                $query->the_post();
                $posts[] = $query->post;
            }
        }
    
        wp_reset_postdata();
    
        return $posts;
    }
}