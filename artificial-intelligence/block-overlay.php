<section class="slide overlay"
style="background-image:url(<?php the_post_thumbnail_src( $post ); ?>);">
	<div class="ccc">
		
		<a class="c" href="<?php the_field( 'link' ); ?>">
			
			<h1><?php the_field( 'heading' ); ?></h1>
			<h2><?php the_field( 'heading_2' ); ?></h2>
			<p>
				<?php the_field( 'content' ); ?>
			</p>
				
		</a>
		
	</div>
</section>
