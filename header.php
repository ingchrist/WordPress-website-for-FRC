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
		<header id="header" class="ww">
			<div class="cc">
				
				<hgroup id="logo" class="header-sep">
					<ul class="c">
						<?php if ( has_nav_menu( 'offcanvas_left' ) ): ?>
							<li class="nav-mobile-toggle">
								<a href="#"><span data-icon="menu"></span></a>
							</li>
						<?php endif; ?>
						<li class="number">
							<a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'description' ); ?></a>
						</li>
						<li class="name">
							<a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'tagline' ); ?></a>
						</li>
					</ul>
				</hgroup>
				
				<?php
					wp_nav_menu(array(
						'theme_location'  => 'primary',
						'menu'            => 'Primary',
						'container'       => 'nav',
						'container_class' => 'header-sep',
						'container_id'    => 'nav',
						'menu_class'      => 'c',
						'menu_id'         => 'nav-c',
						'fallback_cb'     => false,
						'depth'           => 2,
					));
				?>
				
			</div>
			
			<form id="nav-search" method="get" role="search"
			action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input id="nav-search-input"
				name="s" value="<?php echo get_search_query(); ?>"
				placeholder="Search" />
			</form>
			
			<?php
			
			wp_nav_menu(array(
				'theme_location'  => 'offcanvas_left',
				'menu'            => 'Mobile',
				'container'       => 'nav',
				'container_class' => 'reset-offcanvas-2',
				'container_id'    => 'nav-offcanvas-left',
				'menu_class'      => 'c',
				'menu_id'         => '',
				'fallback_cb'     => false,
				'depth'           => 1,
			));
			
			
			wp_nav_menu(array(
				'theme_location'  => 'offcanvas_right',
				'menu'            => 'Offcanvas Right',
				'container'       => 'nav',
				'container_class' => 'reset-offcanvas-2',
				'container_id'    => 'nav-offcanvas-right',
				'menu_class'      => 'c',
				'menu_id'         => '',
				'fallback_cb'     => false,
				'depth'           => 1,
			));
			
			?>
			
		</header>
