<?php if ( is_singular() ): ?>
	
	<header id="thumbnail"
		style="background-image:url(<?php the_post_thumbnail_src( $post ); ?>);">
		
		<hgroup class="c">
			
			<div class="icon"></div>
			
			<?php if ( is_sticky() ): ?>
				<div class="icon-sticky" title="Sticky post"></div>
			<?php endif; ?>
			
			<a href="<?php the_permalink(); ?>" class="cc">
				<h1><?php the_title(); ?></h1>
				<?php the_excerpt(); ?>
			</a>
			
		</hgroup>
		
	</header>
	
	<article id="article">
		<div <?php post_class( 'article cc c' ); ?>>
			<?php the_content(); ?>
		</div>
	</article>
	
	<?php if ( is_single() ): ?>
	
		<footer id="article-footer">
			<div class="cc">
				<hr class="end" />
			
				<figure class="profile">
					<p class="profile-img">
						<?php echo get_avatar( $post->post_author, 100 ); ?>
					</p>
					<figcaption class="profile-bio">
						<?php echo get_user_meta( $post->post_author, 'description' )[0]; ?>
					</figcaption>
				</figure>
				
				<aside class="categories">
					
					<div class="col">
						<h6><span data-icon="category"></span></h6>
						<?php the_category(); ?>
					</div>
					
					<?php if ( get_tags() ): ?>
						<div class="col">
							<h6><span data-icon="tag"></span></h6>
							<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
						</div>
					<?php endif; ?>
					
				</aside>
				
			</div>
		</footer>
		
		<?php if ( is_single() ): ?>
			
			<?php get_template_part( 'nav', 'single' ); ?>
			
		<?php endif; ?>
		
	<?php endif; ?>
	
	<?php comments_template(); ?>
	
<?php else: ?>
	
	<section <?php post_class( 'w' ); ?>
		style="background-image:url(<?php the_post_thumbnail_src( $post ); ?>);">
		
		<hgroup class="c">
			
			<div class="icon"></div>
			
			<?php if ( is_sticky() ): ?>
				<div class="icon-sticky" title="Sticky post"></div>
			<?php endif; ?>
			
			<a href="<?php the_permalink(); ?>" class="cc">
				<h1><?php the_title(); ?></h1>
				<?php the_excerpt(); ?>
			</a>
			
		</hgroup>
		
	</section>
	
<?php endif; ?>
