<?php

/*
 *
 * Block: C1 Client Portal
 *
 */

// Set Vars for this Block
$managerTeamPostIDs = get_field('clientteam');
$clientTeamPostIDs  = get_field('clientteam2');
$postType           = 'staff';
$class              = new c1Helpers();
$getManagers        = $class->getCustomPostsByID($postType, $managerTeamPostIDs);
$getTeamMembers     = $class->getCustomPostsByID($postType, $clientTeamPostIDs);
$clientLogo         = get_field('cl_logo');
$mgTeamHeading      = get_field('mg_heading');
$clTeamHeading      = get_field('tm_heading');
$clientLinks        = get_field('cl_links');

?>

<section class="block-portal">
    <div class="client-logo text-center mb-5">
        <?php if($clientLogo): ?>
        <img class="logo" src="<?php echo $clientLogo['url']; ?>" alt="<?php echo $clientLogo['title']; ?>" height="200" width="auto" />
        <?php endif; ?>
    </div>
    <div class="">
    <?php if($mgTeamHeading): ?>
        <p class="as-h5 mb-5"><?php echo $mgTeamHeading; ?></p>
    <?php endif; ?>
    </div>

    <div class="c1-mgmt-team row justify-content-lg-around mb-5">

        <?php if($getManagers): ?>
            <?php foreach($getManagers as $manager) : 
                $image        = wp_get_attachment_image_src( get_post_thumbnail_id( $manager->ID ), 'full' );
                $fallbackImg  = get_template_directory_uri() . '/assets/images/fallbacks/user.png';
                $title        = get_field('st_title', $manager->ID); 
            ?>
            <div class="manager d-lg-flex">
                <?php if (has_post_thumbnail( $manager->ID ) ): ?>
                <img src="<?php echo $image[0]; ?>" height="100" width="100" alt="<?php echo $manager->post_title; ?>" />
                <?php else: ?>
                    <img src="<?php echo $fallbackImg; ?>" height="100" width="100" alt="<?php echo $teamMember->post_title; ?>" />
                <?php endif; ?>
                <div class="d-flex flex-column pl-3">
                    <p class="name"><?php echo $manager->post_title; ?></p>
                    <?php if ($title): ?>
                    <em><p class="title"><?php echo $title; ?></p></em>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
    <div class="client-mgmt-team">

        <?php if($clTeamHeading): ?>
        <p class="as-h5"><?php echo $clTeamHeading; ?></p>
        <?php endif; ?>

        <div class="row">
        <?php if($getTeamMembers): ?>
            <?php foreach($getTeamMembers as $teamMember) : 
                $image        = wp_get_attachment_image_src( get_post_thumbnail_id( $teamMember->ID ), 'full' );
                $fallbackImg  = get_template_directory_uri() . '/assets/images/fallbacks/user.png';
                $title        = get_field('st_title', $teamMember->ID); 
                $resp         = get_field('cl_resp', $teamMember->ID);
                $wtc          = get_field('cl_ctc', $teamMember->ID);
                $phone        = get_field('cl_phone', $teamMember->ID);
                $email        = get_field('cl_email', $teamMember->ID);
            ?>
            <div class="team-member col-lg-6 d-flex justify-content-center py-5">
                <div class="member-img">
                <?php if (has_post_thumbnail( $teamMember->ID ) ): ?>
                    <img src="<?php echo $image[0]; ?>" height="100" width="100" alt="<?php echo $teamMember->post_title; ?>" />
                <?php else: ?>
                    <img src="<?php echo $fallbackImg; ?>" height="100" width="100" alt="<?php echo $teamMember->post_title; ?>" />
                <?php endif; ?>
                </div>
                <div class="d-flex flex-column pl-3 member-info">
                    <strong><p class="name"><?php echo $teamMember->post_title; ?></p></strong>
                    <?php if ($title): ?>
                    <p class="title"><?php echo $title; ?></p>
                    <?php endif; ?>
                    <?php if ($resp): ?>
                    <strong><p class="responsibilities">What they do: </strong><?php echo $resp; ?></p>
                    <?php endif; ?>
                    <?php if ($wtc): ?>
                    <strong><p class="wtc">When to Contact: </strong><?php echo $wtc; ?></p>
                    <?php endif; ?>
                    <?php if ($phone || $email): ?>
                    <span class="contact">
                        <?php echo $phone; ?> |
                        <?php echo $email; ?>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>

        </div>
    </div>
    <div class="client-links d-lg-flex justify-content-center">
    <?php if($clientLinks): ?>
        <?php foreach($clientLinks as $clientLink): 
            $link = $clientLink['cl_link'];
            if( $link ): 
                $link_url    = $link['url'];
                $link_title  = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            endif;     
        ?>
        <?php if($link): ?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="client-link btn-primary m-5 text-center d-block">
                    <?php echo $link_title  = $link['title']; ?>
                </a>
        <?php endif; ?>


        <?php endforeach; ?>
    <?php endif; ?>   
    </div>
</section>