<?php 

/** 
 * Hero Block
 */

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

<div class="hero">
    <?php if ($headline): ?>
    <div class="hero__headline">
        <h1 class="hero__heading"><?php echo $headline; ?></h1>
    </div>
    <?php endif; ?>
    <div class="hero__lower">
        <div class="hero__cta <?php echo (!$headline) ? 'hero__alt' : '';?>">
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
        <div class="hero__img <?php echo (!$headline) ? 'hero__img-alt' : '';?>" <?php echo ($img && $headline) ? 'style="background-image: url(' . $img['url'] . ');"' : ''; ?> >
            <?php if(!$headline) {
                echo gsc("img", [
                    "content" => [
                        "src" => $img['url'],
                        "alt" => $img['title']
                    ],
                    "style" => [
                        "type"  => "standard",
                    ]
                ]);
            } ?>
        </div> 
    </div>
</div>