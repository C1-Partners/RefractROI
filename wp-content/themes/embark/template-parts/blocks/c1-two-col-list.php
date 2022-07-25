<?php

/** 
 * Two Column List Block
 */

$block_prefix = 'tcl';
$block_style = get_field('tcl_stl');
$left_style = get_field('tcl_lct');
$cont_label = get_field('tcl_lbl');
$image = get_field('tcl_img');
$list_style = get_field('list_style');
$items = get_field('tcl_list');
$cta_text = get_field('tcl_cta');
$cta_text2 = get_field('tcl_cta2');
$link = get_field('tcl_lnk');
$link_style = get_field('tcl_lnkst');
$link_style2 = get_field('tcl_lnkst2');
$link2 = get_field('tcl_lnk2');
$cta_heading = get_field('tcl_hd');

?>

<section class="tcl <?php echo $block_style; ?>">
    <div class="tcl__left <?php echo ($left_style === 'cta') ? 'cta' : '' ?>">
    <?php if ($cont_label): ?>
    <span class="c_lb"><?php echo $cont_label; ?></span>
    <?php endif; ?>
        <?php if ($left_style === 'img' && $image) { 
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
            <?php if ($cta_heading): ?>
            <h2 class="h1"><?php echo $cta_heading; ?></h2>
            <?php endif; ?>
            <?php if ($cta_text || $link) { 
                    get_template_part( 
                        'template-parts/blocks/parts/cta', 
                        null, 
                        [
                            'block_prefix'  => $block_prefix,
                            'link'          => $link,
                            'link_style'    => $link_style,
                            'cta_text'      => $cta_text,
                        ]
                    );
                } ?>
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
        <?php if ($cta_text2) { 
            get_template_part( 
                'template-parts/blocks/parts/cta', 
                null, 
                [
                    'block_prefix'  => $block_prefix,
                    'link'          => $link2,
                    'link_style'    => $link_style2,
                    'cta_text'      => $cta_text2,
                ]
            );
        } ?>
    </div> <!---END tcl_right -----> 
</section>