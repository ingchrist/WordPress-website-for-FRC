<?php

$post_next = get_next_post();
$post_prev = get_previous_post();

?>

<footer id="post-nav">
	
	<?php if ( ! empty( $post_next ) ): ?>
		
		<a class="post-next"
		href="<?php echo post_permalink( $post_next->ID ); ?>"
		style="background-image:url(<?php the_post_thumbnail_src( $post_next ); ?>);">
			<div class="c">
				<h4><?php echo $post_next->post_title; ?></h4>
				<p class="icon">
					<span data-icon="previous"></span>
				</p>
			</div>
		</a>
	
	<?php endif; ?>

	<?php if ( ! empty( $post_prev ) ): ?>
		
		<a class="post-prev"
		href="<?php echo post_permalink( $post_prev->ID ); ?>"
		style="background-image:url(<?php the_post_thumbnail_src( $post_prev ); ?>);">
			<div class="c">
				<h4><?php echo $post_prev->post_title; ?></h4>
				<p class="icon">
					<span data-icon="next"></span>
				</p>
			</div>
		</a>
		
	<?php endif; ?>

</footer>
