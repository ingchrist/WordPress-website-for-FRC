<?php get_template_part( 'forums', 'handler' ); ?>
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
		<header id="header-forums" class="ww">
			<div class="cc">
				
				<hgroup id="logo" class="header-sep">
					<ul class="c">
						<?php if ( has_nav_menu( 'offcanvas_left_forums' ) ): ?>
							<li class="nav-mobile-toggle">
								<a href="#"><span data-icon="menu"></span></a>
							</li>
						<?php endif; ?>
						<li class="number">
							<a href="<?php echo get_post_type_archive_link( 'forum_thread' ); ?>"><?php bloginfo( 'description' ); ?></a>
						</li>
						<li class="name">
							<a href="<?php echo get_post_type_archive_link( 'forum_thread' ); ?>">Forums</a>
						</li>
					</ul>
				</hgroup>
				
				<?php
				wp_nav_menu(array(
					'theme_location'  => 'forums_primary',
					'menu'            => 'Forums',
					'container'       => 'nav',
					'container_class' => 'header-sep',
					'container_id'    => 'nav-forums',
					'menu_class'      => 'c',
					'menu_id'         => 'nav-c',
					'fallback_cb'     => false,
					'depth'           => 2,
				));
				?>
				
			</div>
		
		<?php
		
		wp_nav_menu( array(
			'theme_location'  => 'forums_offcanvas_left',
			'menu'            => 'Forums Mobile',
			'container'       => 'nav',
			'container_class' => 'reset-offcanvas-2',
			'container_id'    => 'nav-offcanvas-left-forums',
			'menu_class'      => 'c',
			'menu_id'         => '',
			'fallback_cb'     => false,
			'depth'           => 1,
		));
		
		
		wp_nav_menu( array(
			'theme_location'  => 'forums_offcanvas_right',
			'menu'            => 'Forums Offcanvas Right',
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
	
