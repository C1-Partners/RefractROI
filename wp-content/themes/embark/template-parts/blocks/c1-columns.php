<?php
/** 
 * Two Column List Block
 */
$utils = new Utils();

$block_prefix = 'cb';
$block_style = get_field('cb_stl');
$col_style = get_field('col_stl');
$heading = get_field('cb_hd');
$items = get_field('cb_cols');
$link = get_field('cb_lnk');
$link_style = get_field('cb_lnkstl');

?>

<section class="<?php echo $block_prefix; ?> <?php echo $block_style; ?>">
    <?php if ($heading): ?>
    <h2 class="h1"><?php echo $heading; ?></h2>
    <?php endif; ?>
    <div class="<?php echo $block_prefix; ?>__cols">
    <?php 
        if (is_array($items)) {
            foreach ($items as $item) {
                $col_link = $item['col_lnk'];
                if ($col_style === 'text') {
                    echo gsc("staggered-content", [
                        "content" => [
                            "title" => [
                                "content" => [
                                    "main" => $item['col_title'],
                                ],
                                "style" => [
                                "container" => 'h2',
                                "border" => 'left',
                                ]
                            ],
                            "text" => $item['col_txt'],
                        ],
                        "link" => [
                            "acf_link" => $col_link,
                        ],
                        "style" => [
                            "divider" => TRUE,
                            "icon" => FALSE,
                            "class" => "cb__col"
                        ]
                    ]);
                }
                if ($col_style === 'icon') {
                    echo gsc("staggered-content", [
                        "content" => [
                            "text" => $item['col_txt'],
                        ],
                        "image-content" => [
                            "src" => $item['col_icon']['url'],
                            "alt" => $item['col_icon']['title']
                        ],
                        "style" => [
                            "divider" => TRUE,
                            "icon" => TRUE,
                            "class" => "cb__col"
                        ]
                    ]);
                }
            } 
        } ?>
    </div>
    <?php if ($link) : ?>
    <div class="<?php echo $block_prefix; ?>__cta btn-row">
        <a class="<?php echo ($link_style); ?>" 
            role="link"  
            href="<?php echo esc_url( $link['url'] ); ?>" 
            target="<?php echo esc_attr( $link['target'] ); ?>">
            <?php echo esc_html( $link['title'] ); ?>
            <?php if ($link_style === 'arrow'): 
                echo $utils->inline_icon('up-right-goldenrod.svg');
            endif; ?> 
        </a> 
    </div>
    <?php endif; ?>
</section>