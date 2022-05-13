<?php

/*
 * Creates the Documentation tab for products
 */
if (class_exists('acf') && class_exists('WooCommerce')) {
    add_filter('woocommerce_product_tabs', function($tabs) {
		global $post, $product;  // Access to the current product
		$documentation_tab = get_field('product_documentation', $post->ID); // ACF Group Tab
        $documentation_files = $documentation_tab['doc_files']; // Documentation Repeater
 
		if (!empty($documentation_files)) {
			$start_at_priority = 10;
            
            $tabs['documentation_tab'] = [
                'title'     => 'Documentation',
                'callback'  => 'output_documentation_files',
                'priority'  => $start_at_priority
            ];
		}
		return $tabs;
	});

    function output_documentation_files($tabs) {
		global $post;
        $product_documentation = get_field('product_documentation', $post_id);
        $files = $product_documentation['doc_files'];
        $fileSVG = inline_icon('file.svg');

        echo '<h2>Documentation</h2>';
        echo '<ul>';
        if ($files) {
            foreach ($files as $file) {
                $file = $file['doc_file'];
                $fileLink = $file['url'];
                echo  '<li><a href="'.$fileLink.'">'.$fileSVG.$file['filename'].'</a></li>';
            }
        }
       echo '</ul>';
	}
}
/*
 * Allows for creation of custom tabs for product
 */
if (class_exists('acf') && class_exists('WooCommerce')) {
	add_filter('woocommerce_product_tabs', function($tabs) {
		global $post, $product;  // Access to the current product 
		
		$custom_tabs_repeater = get_field('custom_tabs', $post->ID);
 
		if (!empty($custom_tabs_repeater)) {
			$counter = 0;
			$start_at_priority = 10;
			foreach ($custom_tabs_repeater as $custom_tab) {
				$tab_id = $counter . '_' . sanitize_title($custom_tab['tab_title']);
				
				$tabs[$tab_id] = [
					'title'     => $custom_tab['tab_title'],
					'callback'  => 'awp_custom_woocommerce_tabs',
					'priority'  => $start_at_priority++
				];
				$counter++;
			}
		}
		return $tabs;
	});
 
	function awp_custom_woocommerce_tabs($key, $tab) {
		global $post;
 
		?>
        
        <h2><?php echo $tab['title']; ?></h2>
        
        <?php
 
		$custom_tabs_repeater = get_field('custom_tabs', $post->ID);
		$tab_id = explode('_', $key);
		$tab_id = $tab_id[0];
 
		echo $custom_tabs_repeater[$tab_id]['tab_contents'];
	}
}
