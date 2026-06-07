<?php get_header(); ?>

<main id="main" class="ww">
	
	<header id="header-archive">
		<h1>Tag</h1>
		<h2>&ldquo;<?php single_cat_title(); ?>&rdquo;</h2>
		<?php if ( tag_description() ): ?>
			<p>
				<?php echo tag_description(); ?>
			</p>
		<?php endif; ?>
	</header>
	
	<?php if ( have_posts() ): ?>
		
		<?php while ( have_posts() ): the_post(); ?>
			
			<?php get_template_part( 'content', get_post_format() ); ?>
			
		<?php endwhile; ?>
		
		<?php get_template_part( 'nav', 'archive' ); ?>
		
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>
