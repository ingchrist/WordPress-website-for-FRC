<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php wp_title( '|', true, 'right' ) ?>
		<?php bloginfo( 'tagline' ); ?> -
		<?php bloginfo( 'description' ); ?>
	</title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="www" <?php body_class(); ?>>
		<header id="header-showcase" class="ww">
			<div class="cc">
				
				<?php
				wp_nav_menu( array(
					'menu'            => get_field( 'nav_menu' ),
					'container'       => 'nav',
					'container_class' => '',
					'container_id'    => 'nav-showcase',
					'menu_class'      => 'c',
					'menu_id'         => 'nav-c',
					'fallback_cb'     => false,
					'depth'           => 1,
				));
				?>
					
			</div>
		</header>
		
