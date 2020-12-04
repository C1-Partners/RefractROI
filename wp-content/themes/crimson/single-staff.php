<?php 

/*
    Template Name: Staff
*/

$staffQuery = new WP_Query([
    'post_type' => 'staff',
    'posts_per_page' => -1,
    'post_status'   =>  'publish'
]);

if($staffQuery->have_posts()) {

    while($staffQuery->have_posts()) {
        $staffQuery->the_post();

        $teamMembers[] = [
            'id' => get_the_ID(),
            'url' => get_the_permalink(),
            'title' => get_the_title(),
            'content' => get_the_content(),
            'image' => get_the_post_thumbnail(),
        ];
    }

}

get_header();
while ( have_posts() ) :
  the_post();
  ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="page-header">
      <?php 
      the_title( '<h1 class="entry-title">', '</h1>' );
       ?>
    </header>
    <div class="page-content page-staff container">

        <?php the_content(); ?>

        <div class="row ">

            <?php 

                $count = 0;   
                foreach( $teamMembers as $teamMember ) : ?>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 js-staff team-member">
                        <div class="team-member-img">
                            <?php echo $teamMember['image']; ?>
                            
                            <button class="action" data-toggle="modal" data-target="#teamModal-<?php echo $count ?>" role="button">Click for Bio</button>
                        </div>
                        <p class="team-member-name text-center"><?php echo $teamMember['title']; ?></p>
                    </div> 
                   
                    <div class="modal fade" id="teamModal-<?php echo $count ?>" aria-labelledby="teamModalLabel-<?php echo $count ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo $teamMember['image']; ?>
                                    <?php echo $teamMember['content']; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="btn btn-primary" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $count++ ?>
                <?php endforeach; ?>

        </div>
    </div>
  </article>
  <?php
endwhile;
get_footer();