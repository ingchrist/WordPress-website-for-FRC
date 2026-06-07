<?php get_header( 'forums' ); ?>

<main id="main-forums">
	<div class="c nav-padding">
		
		<?php get_template_part( 'forums', 'breadcrumbs' ); ?>
	
		<header id="forums-header">
			
			<h1><?php single_cat_title(); ?></h1>
			<p>
				<?php echo get_queried_object()->description; ?>
			</p>
			<hr>
			
		</header>
		
		<section class="forums-subforums">
			
			<?php $sub_forums = get_term_children( get_queried_object()->term_id, 'forum' ); ?>
			
			<?php if ( !empty( $sub_forums ) ): ?>
				
				<h2 class="forums-subheader">Subforums</h2>
				
				<?php foreach ( $sub_forums as $forum ): $forum = get_term( $forum, 'forum' ); ?>
					
					<?php get_template_part( 'forums', 'loop-forums' ); ?>
					
				<?php endforeach; ?>
				
				<br><hr>
				
			<?php endif; ?>
			
		</section>
		
		<section class="forums-posts">
			
			<h2 class="forums-subheader">Threads</h2>
			
			<?php
			
			$tax_query = new WP_Query( array(
				'posts_per_page'        => get_option( 'posts_per_page' ),
				'paged'                 => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
				'tax_query' => array(
					array(
						'taxonomy'          => 'forum',
						'field'             => 'term_id',
						'terms'             => get_queried_object()->term_id,
						'include_children'  => false,
					),
				),
			));
			
			$paginate = (bool) $tax_query->have_posts();
			
			?>
			
			<?php if ( $tax_query->have_posts() ): ?>
				
				<?php while ( $tax_query->have_posts() ): $tax_query->the_post(); ?>
					
					<?php get_template_part( 'forums', 'loop-threads' ); ?>
					
				<?php endwhile; ?>
				
			<?php else: ?>
				
				<h3 class="no-posts">No threads</h3>
				
			<?php endif; ?>
			
		</section>
		
		<?php if ( $paginate ): ?>
			
			<?php get_template_part( 'forums', 'pagination' ); ?>
			
		<?php endif; ?>
		
		<?php if ( current_user_can( 'publish_forum_threads' ) ): ?>
		
			<form class="forums-new-thread" method="POST">
				
				<br><hr>
				
				<h2 class="forums-subheader">New Thread</h2>
				
				<?php get_template_part( 'forums', 'form-thread-new' ); ?>
				
			</form>
			
		<?php endif; ?>
	
	</div>
</main>

<?php get_footer( 'forums' ); ?>
