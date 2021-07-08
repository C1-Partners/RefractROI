<?php
add_action('acf/init', 'crimson_acf_init');
function crimson_acf_init()
{
  if (function_exists('acf_register_block')) {

    $namespace = 'c1-';
    $themeKeywords = array('c1', 'ds');
    $customBlocks = array(
    
      array( 'card', 'Card block', 'Triptych card block', 'shield', array('card') ),
      array( 'two-col-content', 'Two Column block', 'Block with Two columns', 'shield', array('two column') ),
      array( 'services', 'Services block', 'Block services', 'shield', array('services') ),
      array( 'client-portal', 'Client Portal', 'Portal block used for client pages', 'shield', array('portal') ),
    );

    foreach ($customBlocks as $block ) {
      acf_register_block(
        [
          'name' => $namespace . $block[0],
          'title' => __($block[1]),
          'description' => __($block[2]),
          'render_callback' => 'crimson_acf_block_render_callback',
          'category' => 'layout',
          'icon' => $block[3],
          'mode' => 'preview',
          'supports' => [
              'align' => false,
              'mode' => false,
          ],
          'keywords' => array_merge($themeKeywords, $block[4]),
        ]
      );
    }
  }
}


//load in the appropriate blocks
function crimson_acf_block_render_callback($block)
{
  // convert name ("acf/ep-floating-block") into path friendly slug ("ep-floating-block")
  $slug = str_replace('acf/', '', $block['name']);

  // include a template part from within the "template-parts/block" folder
  if (file_exists(get_theme_file_path("/template-parts/block/{$slug}.php"))) {
    include(get_theme_file_path("/template-parts/block/{$slug}.php"));
  }
}