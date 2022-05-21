<?php 

$headline = get_field('hero_hl');
$cta_text = get_field('hero_cta_txt');
$img = get_field('hero_img');
$link = get_field('hero_cta_lnk');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
endif; 

?>

<section class="hero">
    <div class="hero__headline">
    <?php if ($headline): ?>
        <h2 class="hero__heading"><?php echo $headline; ?></h2>
    <?php endif; ?>
    </div>
    <div class="hero__lower">
        <div class="hero__cta">
        <?php if ($cta_text): ?>
            <p class="h3 hero__cta-text"><?php echo $cta_text; ?></p>
        <?php endif; ?>
        <?php if($link): ?>
            <div class="btn-row">
                <a class="btn hero__btn" role="link"  
                    href="<?php echo esc_url( $link_url ); ?>" 
                    target="<?php echo esc_attr( $link_target ); ?>">
                    <?php echo esc_html( $link_title ); ?>
                </a> 
            </div>
        <?php endif; ?>
        </div>
        <div class="hero__img" <?php echo ($img) ? 'style="background-image: url(' . $img['url'] . ');"' : ''; ?> >
        </div> 
    </div>
</section>