<?php

$block_prefix = 'tcg';
$cont_left = get_field('cont_l');
$cont_rght = get_field('cont_r');
$icon = get_field('tcg_icn');
$txt_clr = get_field('tcg_txclr');
$bg_img = get_field('tcg_img');
$img_ord = (empty(get_field('tcg_ord')) || get_field('tcg_ord') == 1) ? 'order-1' : 'order-2';
$cont_ord = (get_field('tcg_ord') == 1) ? 'order-2' : 'order-1';
$link = get_field('tcg_lnk');

?>

<section class="<?php echo $block_prefix;?>">
    <div class="<?php echo $block_prefix; ?>__col-1 <?php echo $txt_clr; ?> <?php echo $cont_ord; ?>" <?php echo ($bg_img) ? 'style="background-image:url('.$bg_img['url'].')"' : '';?>>
        <?php if ($cont_left) {
            echo $cont_left;
        } ?>
        <?php if ($icon) { ?>
            <div class="<?php echo $block_prefix; ?>__icon">
            <?php
                echo gsc("img", [
                    "content" => [
                        "src" => $icon['url'],
                        "alt" => $icon['title']
                    ],
                    "style" => ["type" => "standard"]
                ]); 
            ?>
            </div>
       <?php } ?>
    </div>
    <div class="<?php echo $block_prefix; ?>__col-2 <?php echo $img_ord; ?>"> 
    <div class="<?php echo $block_prefix; ?>__inner">
        <?php if ($cont_rght) {
            echo $cont_rght;
        } ?>
    </div>
    <?php if ($link): ?>
        <?php 
            echo gsc("link", [
                "content" => [
                    "acf_link" => $link,
                ],
                "style" => [
                    "class" => 'arrow',
                    ]
            ]);
        ?>
    <?php endif; ?>  
    </div>
</section>