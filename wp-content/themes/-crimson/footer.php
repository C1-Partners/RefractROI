<?php

$link = get_field('expert_btn', 'options');

if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
endif; 

?>
		
		<?php get_template_part( 'template-parts/page/content', 'footer' ); ?>

		</main>
		
		<?php wp_footer(); ?>

		<?php if( $link ): ?>
			<a class="btn-primary btn-float" role="link" 
				href="<?php echo esc_url( $link_url ); ?>" 
				target="<?php echo esc_attr( $link_target ); ?>">
				<span><?php echo esc_html( $link_title ); ?></span>
			</a>
		<?php endif; ?>
		
	</body>
</html>
