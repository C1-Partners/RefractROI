<?php

$block_prefix = 'crd';
$block_style = get_field('crd_stl');
$heading = get_field('crd_hd');
$cards = get_field('crds');

?>

<section class="<?php echo $block_prefix; ?> <?php echo $block_style; ?>">
    <div class="<?php echo $block_prefix; ?>__cols">
        <div class="<?php echo $block_prefix; ?>__col l">
        <?php if ($heading): ?>
            <h2 class="h1"><?php echo $heading; ?></h2>
        <?php endif; ?>
        </div>
        <div class="<?php echo $block_prefix; ?>__col r">
            <?php foreach ($cards as $card) {
                echo gsc("ui-card", [
                    "content" => [
                        "title"     => $card['crd_ttl'],
                        "text"      => $card['crd_txt'],
                        "cta_url"   => $card['crd_lnk'],
                        "img_src"   => $card['crd_img']['url'],
                        "img_alt"   => $card['crd_img']['title'],
                    ],
                    "style" => [
                        // "type" => "standard",
                        // "class"     => "arrow",
                    ],
                ]);
            } ?>
        </div>
    </div>
</section>