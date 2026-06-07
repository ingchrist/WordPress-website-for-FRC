<section class="slide solid">
	<div class="ccc">
		
		<div class="c solid-thumbnail" style="background-image:url(<?php the_post_thumbnail_src( $post ); ?>);"></div>
		<div class="c solid-headers">
			<h1><?php the_field( 'heading' ); ?></h1>
		</div>
		<div class="c solid-content">
			<p>
				<?php the_field( 'content' ); ?>
			</p>
		</div>
			
	</div>
</section>
