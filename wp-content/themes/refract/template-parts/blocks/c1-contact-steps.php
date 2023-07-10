<?php
/** 
 * Steps Block
 */

$block_prefix   = 'cstp';
$formID         = get_field('cstp_gform');
$form_heading   = get_field('cstp_gfh');
$heading        = get_field('cstp_hd');
$cta_text       = get_field('cstp_cta');
$items          = get_field('cstp_cols');
$link           = get_field('cstp_lnk');
$link_style     = get_field('cstp_lnkstl');

?>

<section class="<?php echo $block_prefix; ?>">
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
        <div class="<?php echo $block_prefix; ?>__col-1">
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
                                "class" => "cstp__col"
                            ]
                        ]);
                    }
                    
                } 
            } ?>
        </div>
        <div class="<?php echo $block_prefix; ?>__col-2">
            <div class="<?php echo $block_prefix; ?>__gform">
            <?php
                if( $form_heading ) { ?>
                <h3 class="<?php echo $block_prefix; ?>__gform--title">
                    <?php echo $form_heading; ?>
                </h3>
            <?php } ?>
            <?php
                if( $formID ) {
                    echo gravity_form( 
                        $formID,
                        $display_title          = false,
                        $display_description    = true,
                        $display_inactive       = false,
                        $field_values           = null,
                        $ajax                   = false,
                        $echo                   = true
                    ); 
                }
            ?>
            </div>
        </div>
    </div>
</section>