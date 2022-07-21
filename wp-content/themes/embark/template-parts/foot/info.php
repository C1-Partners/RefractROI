<?php
$address = get_field('co_adr', 'options');
$fb_link = get_field('fb_link', 'option');
$li_link = get_field('li_link', 'option');
$yt_link = get_field('yt_link', 'option');
$tw_link = get_field('tw_link', 'option');
$ig_link = get_field('ig_link', 'option');
?>

<div class="footer-menu">
    <p class="footer-menu__title">Contact</p>
    <?php if ($address): ?>
        <?php echo $address; ?>
    <?php endif; ?>
    <div class="socials">
        <?php
            echo gsc("socials", [
                "content" => [
                    "facebook"  => $fb_link,
                    "twitter"   => $tw_link,
                    "youtube"   => $yt_link,
                    "linkedin"  => $li_link,
                    "instagram" => $ig_link,
                ]
            ]);
        ?>
    </div>
</div>