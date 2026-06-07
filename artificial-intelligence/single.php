<?php get_header(); ?>

<main id="main" class="ww">
	
	<?php if ( have_posts() ): ?>
		
		<?php while ( have_posts() ): the_post(); ?>
			
			<?php get_template_part( 'content', get_post_format() ); ?>
			
		<?php endwhile; ?>
		
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>
