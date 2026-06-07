<?php get_header(); ?>

<main id="main" class="ww">
	<div class="cc">
		
		<?php if ( have_posts() ): ?>
			
			<?php while ( have_posts() ): the_post(); ?>
				
				<article class="article c">
					
					<p class="attachment w">
						<img src="<?php echo $post->guid; ?>" alt="Attached file" />
					</p>
					
					<!-- <article class="article c"> -->
						
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
						
					<!-- </article> -->
					
				</article>
				
			<?php endwhile; ?>
			
		<?php endif; ?>
		
	</div>
</main>

<?php get_footer(); ?>
