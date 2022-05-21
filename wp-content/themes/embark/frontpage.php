<?php
/**
 * Template Name: Front Page
 * The template for displaying front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SW
 */

 get_header(); ?>
<div class="page">
	<?php get_template_part( 'template-parts/internal/banner', 'int'); ?>
	
 	<main id="primary" class="site-main container">
	<?php get_template_part( 'template-parts/internal/article-parts/article', 'header'); ?>
		<div class="content-page">
		<?php
			the_content();
		?>
		</div>
 	</main><!-- #main -->
</div>
 <?php get_footer();
