<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SW
 */


$contentLeft = get_field('l_col', 'options');
$contentRight = get_field('r_col', 'options');

?>
            <footer class="footer">
                <div class="footer__main">
                    <div class="footer__a">
                        <?php get_template_part('template-parts/foot/menu-a'); ?>
                    </div>
                    <div class="footer__b">
                        <?php get_template_part('template-parts/foot/menu-b'); ?>
                    </div>
                    <div class="footer__c">
                        <?php get_template_part('template-parts/foot/menu-c'); ?>
                    </div>
                    <div class="footer__d">
                        <?php get_template_part('template-parts/foot/info'); ?>
                    </div>
                </div>
                <div class="footer__copyright">
                    <div class="footer__bl">
                        <?php 
                            if ( function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();
                            }
                        ?>
                        <?php bloginfo('description'); ?>
                    </div>
                    <div class="footer__br">
                        <a href="https://www.google.com/partners/agency?id=4626088094" target="_blank">
                            <img height="60" width="60" src="https://www.gstatic.com/partners/badge/images/2022/PartnerBadgeClickable.svg"/>
                        </a>
                        <?php get_template_part('template-parts/foot/copyright'); ?>
                    </div>
                </div>
            </footer> <!-- END footer -->
        </div><!-- END #page -->

    <?php wp_footer(); ?>

    </body>
</html>
