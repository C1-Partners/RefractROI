<?php
$col_style = get_field('col_stl');

$block_prefix = 'cb';
$heading = get_field('cb_hd');
$items = get_field('cb_cols');

?>



<section class="cb">
    <?php if ($heading): ?>
    <h2 class="h1"><?php echo $heading; ?></h2>
    <?php endif; ?>
    <div class="cb__cols">
    <?php 
        if (is_array($items)) {
            foreach ($items as $item) {
                if ($col_style === 'title') {
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
                        "style" => [
                            "divider" => FALSE,
                            "icon" => FALSE,
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
</section>