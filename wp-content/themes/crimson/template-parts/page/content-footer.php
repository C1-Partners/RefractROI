<?php

$footer_choice = get_theme_mod('crimson_default_footer_template', 'b12');

if( is_plugin_active('advanced-custom-fields/acf.php') ) {
 
  if ( !empty(get_field('footer')) && get_field('footer') !== 'default' ) {
    echo '<h1>Test</h1>';
    $footer_choice = get_field('footer');
  }
}
//look into get_footer instead here
get_template_part( 'templates/footer-' . $footer_choice );

?>
