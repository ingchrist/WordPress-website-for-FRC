<?php get_header(); ?>

<main id="main" class="ww">
	
	<header id="header-archive">
		<h1>Category</h1>
		<h2>&ldquo;<?php single_cat_title(); ?>&rdquo;</h2>
		<p>
			<?php echo get_the_category()[0]->description; ?>
		</p>
	</header>
	
	<?php if ( have_posts() ): ?>
		
		<?php while ( have_posts() ): the_post(); ?>
			
			<?php get_template_part( 'content', get_post_format() ); ?>
			
		<?php endwhile; ?>
		
		<?php get_template_part( 'nav', 'archive' ); ?>
		
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>
