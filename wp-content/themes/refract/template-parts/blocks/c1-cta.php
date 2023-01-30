<?php

$block_prefix = 'callout';
$block_style = get_field('cta_stl');
$heading = get_field('cta_hd');
$img = get_field('cta_img');
$cta_text = get_field('cta_txt');
$link = get_field('cta_lnk');
$link_style = get_field('cta_lnkstl');

?>

<section class="<?php echo $block_prefix; ?> <?php echo $block_style; ?> <?php echo (!$img) ? 'center' : ''; ?>">
    <?php if($img) { ?>
    <div class="<?php echo $block_prefix; ?>__img">
    <?php 
            echo gsc("img", [
                "content" => [
                    "src" => $img['url'],
                    "alt" => $img['title']
                ]
            ]);
    ?>
    </div>
    <?php } ?>
    <div class="<?php echo $block_prefix; ?>__content">
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
</section>