<section <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" class="c">
		
		<h2 class="forum_thread-name"><?php the_title(); ?></h2>
		<p class="forum_thread-meta">
			<?php the_author(); ?> |
			<?php the_time( get_option( 'date_format' ) ); ?> |
			<?php comments_number( '0 comments', '1 comment', '% comments' ); ?>
		</p>
		
		<article class="forum_thread-excerpt">
			<?php the_excerpt(); ?>
		</article>
		
	</a>
</section>
