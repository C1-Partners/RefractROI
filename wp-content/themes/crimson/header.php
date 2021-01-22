<?php

$phone = get_field('phone_number', 'options');
$phoneReplaced = preg_replace('/\D+/', '', $phone);
$siteAddr = get_field('site_address', 'options');
$ctaText = get_field('cta_text', 'options');
$ctaLink = get_field('cta_link', 'options');

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php crimson_favicons() ?>

	<?php wp_head(); ?>

	<script>var $ = jQuery.noConflict();</script>

</head>

<body <?php body_class(); ?>>

    <?php // googleTagManagerBody('id-here'); ?>

	<a class="skip-link sr-only" href="#site-main"><?php esc_html_e( 'Skip to content', 'crimson' ); ?></a>

	<header class="site-header" role="banner">
		<div class="site-info container-fluid">
			<a class="site-phone" href="tel:+1<?php echo $phoneReplaced; ?>"><?php echo $phone ?></a>
			<p class="site-address"><?php echo $siteAddr; ?></p>
			<a class="head-cta" href="<?php echo $ctaLink; ?>"><?php echo $ctaText; ?></a>
		</div>
		<div class="container-fluid">
			<nav class="primary-nav navbar-expand-lg" id="site-navigation">
				<div class="site-logo" id="site-branding">
					<?php echo the_custom_logo(); ?>
				</div>
				<div class="collapse navbar-collapse nav-wrap" id="PrimaryNav">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary-menu',
						'container'		 =>  false,
						'menu_id'        => 'menu-primary',
						'menu_class'	 => 'navbar-nav ml-auto',
					) );
					?>
				</div>
				<div id="site-search" class="search-form-wrap">
					<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
						<label class="sr-only" for="site-search-field">Search for</label>
						<input type="search" id="site-search-field" class="search-field" placeholder="Search <?php bloginfo( 'name' ) ?>&hellip;" value="<?php echo get_search_query() ?>" name="s" />
						<input type="submit" class="search-submit search-btn" value="Go" />
					</form>
				</div>
				<div class="site-actions">
					<ul id="search-actions" class="search-btns">
						<li class="list">
							<button id="search-open"><?php echo crimson_inline_icon('search.svg') ?><span class="sr-only">Open search</span></button>
							<button id="search-close"><?php echo crimson_inline_icon('close.svg') ?><span class="sr-only">Close search</span></button>
						</li>
					</ul>
					<button 
						class="menu navbar-toggler collapsed" 
						onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" 
						data-target="#PrimaryNav"
						data-toggle="collapse"
						aria-controls="PrimaryNav" 
						aria-expanded="false" 
						aria-label="Toggle navigation"
					>
						<svg width="50" height="50" viewBox="0 0 100 100">
							<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
							<path class="line line2" d="M 20,50 H 80" />
							<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
						</svg>
					</button>
				</div>
			</nav>
		</div>
	</header>

	<main class="site-main" id="site-main" role="main">
