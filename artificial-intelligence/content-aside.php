<?php if ( is_singular() ): ?>
	
	<article id="article"
		style="background-image:url(<?php the_post_thumbnail_src( $post ); ?>);">
		<div class="c">
			<div <?php post_class( 'article cc c' ); ?>>
				
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				
			</div>
		</div>
	</article>
	
	<?php if ( is_single() ): ?>
		
		<?php get_template_part( 'nav', 'single' ); ?>
		
	<?php endif; ?>
	
<?php else: ?>
	
	<section <?php post_class( 'ww' ); ?>>
		<div class="cc">
			
			<a class="icon" href="<?php the_permalink(); ?>"></a>
			
			<ul class="meta">
				<li>
					<?php the_author_posts_link(); ?>
				</li>
				<li>
					<a href="#"><?php the_time( 'F d, Y' ); ?></a>
				</li>
				<li>
					<a href="<?php comments_link(); ?>"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></a>
				</li>
				<li>
					<a href="<?php the_permalink(); ?>">Read more</a>
				</li>
			</ul>
			
			<div class="content">
				<h3 class="content-title"><?php the_title(); ?></h3>
				<?php the_excerpt(); ?>
			</div>
			
		</div>
	</section>
	
<?php endif; ?>
