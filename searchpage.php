<?php // Template Name: Search ?>

<?php get_header(); ?>

<main id="main" class="ww">
	
	<?php if ( have_posts() ): ?>
		
		<?php while ( have_posts() ): the_post(); ?>
			
			<article id="article"
			style="background-image:url(<?php the_post_thumbnail_src( $post ); ?>);">
				<div class="c">
					<div <?php post_class( 'article cc c' ); ?>>
						
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
						<?php get_search_form(); ?>
						
					</div>
				</div>
			</article>
			
		<?php endwhile; ?>
		
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>
