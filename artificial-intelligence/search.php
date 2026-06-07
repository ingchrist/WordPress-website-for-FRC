<?php get_header(); ?>

<main id="main" class="ww">
	
	<header id="header-archive">
		<h1>Search Results</h1>
		<!-- <h2>&ldquo;<?php echo get_search_query(); ?>&rdquo;</h2> -->
		<?php get_search_form(); ?>
	</header>
	
	<?php if ( have_posts() ): ?>
		
		<?php while ( have_posts() ): the_post(); ?>
			
			<?php get_template_part( 'content', get_post_format() ); ?>
			
		<?php endwhile; ?>
		
		<?php get_template_part( 'nav', 'archive' ); ?>
		
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>
