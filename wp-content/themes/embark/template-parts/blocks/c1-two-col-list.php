<?php

/** 
 * Two Column List Block
 */

$block_style = get_field('tcl_stl');
$left_style = get_field('tcl_lct');
$image = get_field('tcl_img');
$list_style = get_field('list_style');
$items = get_field('tcl_list');
$cta_text = get_field('tcl_cta');
$link = get_field('tcl_lnk');
if ($link) : 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
endif; 

?>

<section class="tcl <?php echo $block_style; ?>">
    <div class="tcl__left">
        <?php if ($left_style === 'img') { 
            echo gsc("img", [
                "content" => [
                    "src" => $image['url'],
                    "alt" => $image['title']
                ],
                "style" => [
                    "type" => "standard",
                    "attrs" => []
                ]
            ]);
         } elseif ($left_style === 'cta') { ?>
            <h2 class="h1">Test</h2>
         <?php } ?>
      
    </div> <!---END tcl_left -----> 
    <div class="tcl__right">
        <?php 
        if (is_array($items)) {
            foreach ($items as $item) {
                if ($list_style === 'title') {
                    echo gsc("staggered-content", [
                        "content" => [
                            "title" => [
                                "content" => [
                                    "main" => $item['list_title'],
                                ],
                                "style" => [
                                "container" => 'h2',
                                "border" => 'left',
                                ]
                            ],
                            "text" => $item['list_txt'],
                        ],
                        "style" => [
                            "divider" => FALSE,
                            "icon" => FALSE,
                        ]
                    ]);
                }
                if ($list_style === 'icon') {
                    echo gsc("staggered-content", [
                        "content" => [
                            "text" => $item['list_txt'],
                        ],
                        "image-content" => [
                            "src" => $item['list_icon']['url'],
                            "alt" => $item['list_icon']['title']
                        ],
                        "style" => [
                            "divider" => TRUE,
                            "icon" => TRUE,
                        ]
                    ]);
                }
            } 
        } ?>
        <?php if ($cta_text) { ?>
            <div class="tcl__cta">
            <?php if ($cta_text): ?>
                <p class="h3 tcl__cta-text"><?php echo $cta_text; ?></p>
            <?php endif; ?>
            <?php if($link): ?>
                <div class="btn-row">
                    <a class="btn" role="link"  
                        href="<?php echo esc_url( $link_url ); ?>" 
                        target="<?php echo esc_attr( $link_target ); ?>">
                        <?php echo esc_html( $link_title ); ?>
                    </a> 
                </div>
            <?php endif; ?>
            </div> <!---END tcl_cta -----> 
      <?php  } ?>
    </div> <!---END tcl_right -----> 
</section>