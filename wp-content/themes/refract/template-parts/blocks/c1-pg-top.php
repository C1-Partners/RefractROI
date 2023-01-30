<?php

$block_prefix = 'pgt';
$block_style = get_field('pgt_stl');
$cont_label = get_field('pgt_lbl');
$heading = get_field('pgt_hd');
$img = get_field('pgt_img');
$cta_text = get_field('pgt_txt');
$link = get_field('pgt_lnk');
$link_style = get_field('pgt_lnkstl');

?>

<section class="<?php echo $block_prefix; ?> <?php echo $block_style; ?>">
    
    <div class="<?php echo $block_prefix; ?>__content">
    <?php if ($cont_label): ?>
        <span class="c_lb"><?php echo $cont_label; ?></span>
    <?php endif; ?>
    <?php if ($heading): ?>
        <h2 class="<?php echo $block_prefix; ?>__heading"><?php echo $heading; ?></h2>
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
    </div>
    <div class="<?php echo $block_prefix; ?>__img">
        <?php if($img) { 
            echo gsc("img", [
                "content" => [
                    "src" => $img['url'],
                    "alt" => $img['title']
                ]
            ]);
        } ?>
    </div>
</section>