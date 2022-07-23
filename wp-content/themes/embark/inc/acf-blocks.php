<?php
add_action('acf/init', 'sw_acf_init');
function sw_acf_init() {

  if (function_exists('acf_register_block')) {

    $namespace = 'c1-';
    $themeKeywords = array('c1', 'ln');
    $customBlocks = array(
      array( 'hp-hero', 'Hero Block ', 'Front-page hero block', 'shield', array('hero', 'front-page') ),
      array( 'pg-top', 'Interior page top block', 'Use for inteior page hero', 'shield', array('page', 'interior') ),
      array( 'cta', 'Call to Action Block', 'Prompt user action', 'shield', array('cta', 'action') ),
      array( 'tab-accordion', 'Accordion Tabs', '', 'shield', array('tab', 'accordion') ),
      array( 'steps', 'Numbered Steps Block', 'Showcase content in numerical columns', 'shield', array('steps', 'column') ),
      array( 'cards', 'Cards Block', 'Showcase services or simple content', 'shield', array('cards', 'grid') ),
      array( 'two-col-list', 'Two Column List Block', 'Use for listed content on right side', 'shield', array('two column', 'content') ),
      array( 'columns', 'Columns Block', 'Use to create two or more columns for content', 'shield', array('column', 'content') ),
      array( 'products', 'Products Block', 'Display products', 'shield', array('products', 'product') ),
      array( 'pullquote', 'Pull Quote Block ', 'Highlight quotes in articles and pages', 'shield', array('quote', 'pullquote', 'content') ),
    );
    
    foreach ($customBlocks as $block ) {
      acf_register_block(
        [
          'name' => $namespace . $block[0],
          'title' => __($block[1]),
          'description' => __($block[2]),
          'render_callback' => 'sw_acf_block_render_callback',
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
function sw_acf_block_render_callback($block) {
  // convert name ("acf/sw-floating-block") into path friendly slug ("sw-floating-block")
  $slug = str_replace('acf/', '', $block['name']);

  // include a template part from within the "template-parts/block" folder
  if (file_exists(get_theme_file_path("/template-parts/blocks/{$slug}.php"))) {
    include(get_theme_file_path("/template-parts/blocks/{$slug}.php"));
  }
}