<?php

$block_prefix = 'tcg';
$cont_left = get_field('cont_l');
$cont_rght = get_field('cont_r');
$icon = get_field('tcg_icn');
$txt_clr = get_field('tcg_txclr');
// $cta_text = get_field('pgt_txt');
// $link = get_field('pgt_lnk');
// $link_style = get_field('pgt_lnkstl');

?>

<section class="<?php echo $block_prefix;?>">
    <div class="<?php echo $block_prefix; ?>__left <?php echo $txt_clr; ?>">
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
                ]); ?>
            </div>
       <?php } ?>
    </div>
    <div class="<?php echo $block_prefix; ?>__right">
    <?php if ($cont_rght) {
            echo $cont_rght;
        } ?>
    </div>
</section>