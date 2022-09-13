<?php
/** 
 * Steps Block
 */

$block_prefix = 'stp';
$block_style = get_field('stp_stl');
$cont_label = get_field('stp_lbl');
$heading = get_field('stp_hd');
$cta_text = get_field('stp_cta');
$items = get_field('stp_cols');
$link = get_field('stp_lnk');
$link_style = get_field('stp_lnkstl');


?>



<section class="<?php echo $block_prefix; ?> <?php echo $block_style; ?>">
    <?php if ($cont_label): ?>
    <span class="c_lb"><?php echo $cont_label; ?></span>
    <?php endif; ?>
    <?php if ($heading): ?>
    <h2 class="h1"><?php echo $heading; ?></h2>
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
    <div class="<?php echo $block_prefix; ?>__cols">
    <?php 
        $i = 0;
        if (is_array($items)) {
            foreach ($items as $item) {
                $i++;
                if ($item['col_img']) {
           
                    echo gsc("staggered-content", [
                        "content" => [
                            "title" => [
                                "content" => [
                                    "main" => $item['col_title'],
                                ],
                                "style" => [
                                    "container" => 'h3',
                                    "border" => 'left',
                                ]
                            ],
                            "text" => $item['col_txt'],
                        ],
                        "acf_obj" => $item['col_lst'],
                        "image-content" => [
                            "src" => $item['col_img']['url'],
                            "alt" => $item['col_img']['title']
                        ],
                        "counter"   => [
                            "number" => $i,
                        ],
                        "style" => [
                            "divider" => TRUE,
                            "icon" => TRUE,
                            "class" => "stp__col"
                        ]
                    ]);
                }
                
            } 
        } ?>
    </div>
</section>