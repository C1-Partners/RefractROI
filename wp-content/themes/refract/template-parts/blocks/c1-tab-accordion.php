<?php

$block_prefix = 'tac';
$block_style = get_field('tac_stl');
$heading = get_field('tac_hd');
$tabs = get_field('tac_rows');
?>

<section class="<?php echo $block_prefix; ?> <?php echo $block_style; ?>">
    <div class="<?php echo $block_prefix; ?>__acc">
    <?php
    echo gsc("tabs", [
        "content" => [
                "tabs_alt"      => $tabs,
                "aria_title"    => "Tab title",
                "title"         => $heading,
            ]
        ]);
    ?>
    </div>
</section>