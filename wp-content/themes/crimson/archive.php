
<!--Header-->

<?php get_header(); ?>

<!--End Header-->

<!--Content-->

  <article class="int-page archive-page">
    <div class="container-fluid page-hero" <?php if (has_post_thumbnail()) { ?>style="background-image: url('<?php the_post_thumbnail_url() ?>')"<?php } ?>>
      <div class="row page-hero-overlay">
        <div class="col-12">
          <div class="row" id="title-bar">
            <div class="col-12">
              <h1 class="page-title"><?php the_archive_title(); ?></h1>
            </div>
          </div>
        </div>   
      </div>
    </div>

    <!--Breadcrumbs-->

    <?php get_template_part( 'template-parts/internal/content', 'breadcrumbs' ); ?>

    <!--End Breadcrumbs-->

    <div class="container py-4" id="main-wrapper">
      <div class="row" id="content-wrapper">
        <div class="col-12">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <?php if(get_the_post_thumbnail()) : ?>
              <div class="thumbnail-container">
                <?php the_post_thumbnail('full'); ?>
              </div>
            <?php endif; ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>
            <p class="post-date"><?php the_time('F j, Y'); ?></p>
          </div>
          <?php endwhile; ?>
          <div class="navigation">
            <div class="next-posts alignright"><?php next_posts_link(); ?></div>
            <div class="prev-posts alignleft"><?php previous_posts_link(); ?></div>
          </div>
          <?php else : ?>
            <p>We're sorry. There are no results for your query.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </article>


<!--End Content-->

<!--Footer-->

<?php get_footer(); ?>

<!--End Footer-->