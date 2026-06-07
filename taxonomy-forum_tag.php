<?php get_header( 'forums' ); ?>

<main id="main-forums">
	<div class="nav-padding">
		
		<?php //get_template_part( 'forums', 'breadcrumbs' ); // might need special breadcrumb handling ?>
		
		<header id="forums-header">
			
			<h1><?php single_cat_title(); ?></h1>
			<p>
				<?php echo get_queried_object()->description; ?>
			</p>
			<hr>
			
		</header>
		
		<?php $paginate = (bool) have_posts(); ?>
		
		<section class="forums-posts">
			
			<?php if ( have_posts() ): ?>
				
				<?php while ( have_posts() ): the_post(); ?>
					
					<?php get_template_part( 'forums', 'loop-threads' ); ?>
					
				<?php endwhile; ?>
				
			<?php else: ?>
				
				<h3 class="no-posts">No threads</h3>
				
			<?php endif; ?>
			
		</section>
		
		<?php if ( $paginate ): ?>
			
			<?php get_template_part( 'forums', 'pagination' ); ?>
			
		<?php endif; ?>
		
	</div>
</main>

<?php get_footer( 'forums' ); ?>
