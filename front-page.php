<?php get_header(); ?>

<main id="main" class="ww<?php echo ( get_field( 'fade_in' ) ? ' fade-slide' : '' ); ?>">
	
	<?php if ( is_home() ): ?>
	
		<?php if ( have_posts() ): ?>
			
			<?php while ( have_posts() ): the_post(); ?>
				
				<?php get_template_part( 'content', get_post_format() ); ?>
				
			<?php endwhile; ?>
			
		<?php endif; ?>
	
	<?php else: ?>
		
		<?php
		
		// Build new WordPress query
		// Request all slides that are in the slider
		//
		$q_slides = new WP_Query( array(
			'post_type'  => 'slides',
			'meta_key'   => 'position',
			'meta_value' => 'slider',
			'orderby'    => 'menu_order',
			'order'      => 'ASC',
		));
		
		?>
		
		<?php if ( $q_slides->have_posts() ): ?>
			
			<section class="slidesjs">
				
				<?php while ( $q_slides->have_posts() ): $q_slides->the_post(); ?>
					
					<?php get_template_part( 'block', ( get_field( 'layout' ) === 'solid' ? 'thumbnail' : get_field( 'layout' ) ) ); ?>
					
				<?php endwhile; ?>
				
			</section>
			
		<?php endif; ?>
		
		<?php
		
		// Build new WordPress query
		// Request all slides not in the slider position
		//
		$q_blocks = new WP_Query(array(
			'post_type'    => 'slides',
			'meta_key'     => 'position',
			'meta_compare' => '!=',
			'meta_value'   => 'slider',
			'orderby'      => 'menu_order',
			'order'        => 'ASC',
		));
		?>
		
		<?php if ( $q_blocks->have_posts() ): ?>
			
			<?php while ( $q_blocks->have_posts() ): $q_blocks->the_post(); ?>
				
				<?php get_template_part( 'block', ( get_field( 'layout' ) === 'solid' ? 'thumbnail' : get_field( 'layout' ) ) ); ?>
				
			<?php endwhile; ?>
			
		<?php endif; ?>
	
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>
