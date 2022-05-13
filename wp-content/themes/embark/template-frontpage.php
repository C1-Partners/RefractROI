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

    <?php get_template_part( 'template-parts/banner', 'hp'); ?>
	<?php get_template_part( 'template-parts/internal/cat', 'filters'); ?>


 <?php
 get_footer();
