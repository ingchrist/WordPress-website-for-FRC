<?php // Template Name: Showcase ?>

<?php get_header( 'showcase' ); ?>

<main id="main" class="ww<?php echo ( get_field( 'fade_in' ) ? ' fade-slide' : '' ); ?>">

	<?php
	
	// Build new WordPress query
	// Request all showcase blocks that have the show ID of this post
	//
	$showcase_q = new WP_Query( array(
		'post_type'      => 'showcases',
		'nopaging'       => false,
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
	));
	?>

	<?php if ( $showcase_q->have_posts() ): ?>
		
		<?php while ( $showcase_q->have_posts() ): $showcase_q->the_post(); ?>
			
			<?php // Major hack because WordPress queries kind of suck... ?>
			
			<?php if ( in_array( get_queried_object()->ID, get_field( 'show' ), true ) ): ?>
				
				<?php get_template_part( 'block', get_field( 'layout' ) ); ?>
				
			<?php endif; ?>
			
		<?php endwhile; ?>
		
	<?php endif; ?>
	
</main>

<?php get_footer( 'showcase' ); ?>
