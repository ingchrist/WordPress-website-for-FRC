<?php if ( is_singular() ): ?>
	
	<article id="article"
	style="background-image:url(<?php the_post_thumbnail_src( $post ); ?>);">
		<div class="c">
			<div <?php post_class( 'article cc c' ); ?>>
				
				<?php the_content(); ?>
				
			</div>
		</div>
	</article>
	
	<?php if ( is_single() ): ?>
		
		<?php get_template_part( 'nav', 'single' ); ?>
		
	<?php endif; ?>
	
<?php else: ?>
	
	<section <?php post_class( 'w' ); ?>>
		<div class="cc">
			
			<a class="icon" href="<?php the_permalink(); ?>"></a>
			
			<ul class="meta">
				<li>
					<?php the_title(); ?>
				</li>
				<li>
					<?php the_time( 'n/j/Y g:i A' ); ?>
				</li>
			</ul>
			
			<div class="content">
				<h3 class="content-title"><?php the_title(); ?></h3>
				<?php the_content(); ?>
			</div>
			
		</div>
	</section>
	
<?php endif; ?>
