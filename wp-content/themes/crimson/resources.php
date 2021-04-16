<?php 

/**
 * 
 *  Template Name: Resources  (ebooks)
 * 
 */

?>

<!--Header-->

<?php get_header(); ?>

<!--End Header-->

<?php 
 // Query our resource posts
$freeResourcesQuery = new WP_Query([
    'post_type' => 'resource',
    'posts_per_page' => -1,
    'post_status'   =>  'publish'
]);

// Map custom keys into an array
if($freeResourcesQuery->have_posts()) {

    while($freeResourcesQuery->have_posts()) {
        $freeResourcesQuery->the_post();

        $freeResources[] = [
            'id' => get_the_ID(),
            'url' => get_the_permalink(),
            'resource' => get_field('attachment'),
            'title' => get_the_title(),
            'description' => get_the_content(),
            'image' => get_the_post_thumbnail(),
        ];
    }
}

?>

<?php while ( have_posts() ) : the_post(); ?>

<!--Content-->

<article class="int-page">
  <div class="container-fluid page-hero" <?php if (has_post_thumbnail()) { ?>style="background-image: url('<?php the_post_thumbnail_url() ?>')"<?php } ?>>
    <div class="row page-hero-overlay">
      <div class="col-12">
        <div class="row" id="title-bar">
          <div class="col-12">
            <?php get_template_part( 'template-parts/internal/content', 'title' ); ?>
          </div>
        </div>
      </div>   
    </div>
  </div>

  <!--Breadcrumbs-->

  <?php get_template_part( 'template-parts/internal/content', 'breadcrumbs' ); ?>

  <!--End Breadcrumbs-->

  <div class="container" id="main-wrapper">
    <div class="row" id="content-wrapper">
      <div class="col-12">
        <div class="row page-resources">
          <?php 
            
            the_content(); 
            $count = 0; 
            foreach( $freeResources as $freeResource ) : 
          
          ?>

            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 resource-container">
                <?php if ($freeResource['url']) : ?>
                <a href="<?php echo $freeResource['url']; ?>">
                <?php endif; ?>
                    <div class="resource">
                        <div class="resource-image">
                            <?php echo $freeResource['image']; ?>
                        </div>  
                        <p class="resource-title"><?php echo $freeResource['title']; ?></p>
                        <a href="<?php echo $freeResource['url']; ?>" class="resource-show-more">Show me more</a>
                    </div>
                <?php if ($freeResource['url']) : ?>
                </a>
                <?php endif; ?>
            </div> 
          
            <?php $count++ ?>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </article>

<!--End Content-->

<!--Footer-->

<?php

endwhile;
get_footer();
