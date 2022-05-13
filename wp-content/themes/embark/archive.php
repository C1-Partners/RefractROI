<?php

/**
 * Template Name: Frontpage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SW
 */

 get_header();

 ?>

    <?php get_template_part( 'template-parts/internal/banner', 'int'); ?>

 	<main id="primary" class="main container">
		<div class="grid">

		<?php if ( have_posts() ) : 
			// Start the Loop.
			while ( have_posts() ) :
				the_post(); 

				/*
				* Include the post format-specific template for the content. If you want
				* to use this in a child theme, then include a file called content-___.php
				* (where ___ is the post format) and that will be used instead.
				*/
				?>

			<article class="grid__item" id="post-<?php the_ID(); ?>">
				<a class="outer" href="<?php echo get_the_permalink(); ?>">
					<div class="img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
					<div class="content">
					<?php foreach( ( get_the_category() ) as $category ) :
						if( $category): ?>
							<span class="cat-label"><?php echo $category->cat_name;?></span>
						<?php endif;
					 ?>
					
					<?php endforeach; ?>
						<h3 class="h4"><?php the_title(); ?></h3>
						<span class="cta">Read Story 
							<svg width="15" height="15" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
								<path d="M26.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z" fill="#747474"/>
							</svg>
						</span>
						<p class="auth">by <?php echo get_the_author(); ?></p>
					</div>
				</a>
			</article>			

			<?php endwhile;

		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif; ?>

		

		</div>
		<div class="pagination">
			<?php the_posts_pagination(); ?>
		</div>
 	</main><!-- #main -->

 <?php
 get_footer();
