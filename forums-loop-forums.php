<?php global $forum; ?>

<section class="forum">
	<a href="<?php echo get_term_link( $forum ); ?>" class="c">
		
		<h2 class="forum-name"><?php echo $forum->name; ?></h2>
		
		<p class="forum-excerpt">
			<?php echo $forum->description; ?>
		</p>
		
	</a>
</section>
