<?php
$block_prefix = 'tm';
$heading = get_field('tm_hd');
$tabs = get_field('tm_rows');
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