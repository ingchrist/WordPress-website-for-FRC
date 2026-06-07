<?php if ( get_previous_posts_link() || get_next_posts_link() ): ?>

	<footer id="posts-nav">
		
		<?php if ( get_previous_posts_link() ): ?>
			
			<a class="posts-nav-prev" href="<?php echo get_previous_posts_page_link(); ?>">
				<span data-icon="previous"></span>
				Newer posts
			</a>
			
		<?php endif; ?>
		
		<?php if ( get_next_posts_link() ): ?>
			
			<a class="posts-nav-next" href="<?php echo get_next_posts_page_link(); ?>">
				Older posts
				<span data-icon="next"></span>
			</a>
			
		<?php endif; ?>
		
	</footer>
	
<?php endif; ?>
