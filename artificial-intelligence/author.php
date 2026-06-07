<?php get_header(); ?>

<main id="main" class="ww">
	
	<header id="header-archive">
		<h1>Author</h1>
		<h2><?php the_author(); ?></h2>
		<p>
			<?php the_author_meta( 'description' ); ?>
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
