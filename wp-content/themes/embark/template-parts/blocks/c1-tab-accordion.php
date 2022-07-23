<?php

$block_prefix = 'tac';
$block_style = get_field('tac_stl');
// $cont_label = get_field('pgt_lbl');
$heading = get_field('tac_hd');
// $img = get_field('pgt_img');
// $cta_text = get_field('pgt_txt');
// $link = get_field('pgt_lnk');
// $link_style = get_field('pgt_lnkstl');

$tabs = get_field('tac_rows');

?>

<section class="<?php echo $block_prefix; ?> <?php echo $block_style; ?>">
    <div class="<?php echo $block_prefix; ?>__ctrl">
        <h2 class="<?php echo $block_prefix; ?>__heading"><?php echo $heading; ?></h2>
    </div>
    <div class="<?php echo $block_prefix; ?>__acc">

    <?php
    echo gsc("tabs", [
        "content" => [
                "tabs_alt" => $tabs,
                "aria_title" => "Tab title",
            ]
        ]);
    ?>
        
    </div>
</section>