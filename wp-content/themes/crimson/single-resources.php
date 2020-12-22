<?php 

/*
    Template Name: Resources
*/

$freeResourcesQuery = new WP_Query([
    'post_type' => 'resource',
    'posts_per_page' => -1,
    'post_status'   =>  'publish'
]);

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

get_header(); while ( have_posts() ) : the_post();

?>

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
            foreach( $freeResources as $freeResource ) : ?>

              <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 resource-container">
                  <div class="resource text-center">
                    <div class="resource-image">
                      <?php echo $freeResource['image']; ?>
                    </div>  
                    <h3 class="resource-title"><?php echo $freeResource['title']; ?></h3>
                    <p class="resource-desc"><?php echo $freeResource['description']; ?></p>
                    <button class="btn-primary download action" data-toggle="modal" data-target="#resourceModal-<?php echo $count ?>" role="button">Download Now</button>
                  </div>
              </div> 

              <!--Modal-->

              <div class="modal fade" id="resourceModal-<?php echo $count ?>" aria-labelledby="resourceModalLabel-<?php echo $count ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo $freeResource['image']; ?>
                            <?php echo $freeResource['description']; ?>
                            <?php echo gravity_form( 7, false, false, false, '', false ); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="btn btn-primary" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--End Modal-->
            
            <?php $count++ ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </article>

<!--End Content-->

<?php
echo '<pre>';
var_dump($freeResources);
echo '</pre>';
?>

<!--Footer-->

<?php

endwhile;
get_footer();
