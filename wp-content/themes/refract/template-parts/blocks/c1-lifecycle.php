<?php

$block_prefix = 'lc';
$heading = get_field('lc_hd');
$tabs = get_field('lc_rows');

?>

<section class="<?php echo $block_prefix; ?>">
    <div class="<?php echo $block_prefix; ?>__acc">
    <?php
    echo gsc("lifecycle", [
        "content" => [
                "tabs_alt"      => $tabs,
                "aria_title"    => "Tab title",
                "title"         => $heading,
                "group_name" => 'lc',
            ]
        ]);
    ?>
    </div>
</section>