<?php
/*
 * Secondary Navigation
 */
?>

<div id="secondaryNav" class="header__nav-secondary">
    <nav class="header__secondary-nav" id="secondaryNav" aria-label="secondary">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'secondary-menu',
                'container'		 =>  false,
                'menu_id'        => 'menuSecondary',
                'menu_class'	 => 'header__nav-secondary',
            ));
        ?>
    </nav>
    
    <?php 
        echo gsc("btn-close", [
            "content" => [
                "class" => "search-close",
                "attrs" => [
                    "id" => "searchClose"
                ]
            ]
        ]);
    ?>
</div>