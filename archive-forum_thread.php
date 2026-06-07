<?php get_header( 'forums' ); ?>

<?php

$forums = get_terms( 'forum', array(
	// 'orderby' => 'name',
	// 'order' => 'ASC',
	'hide_empty' => false,
	'parent' => 0,
));

?>

<main id="main-forums" class="ww">
	
	<div class="c nav-padding">
		
		<header id="forums-header">
			<h1><?php bloginfo( 'tagline' ); ?> Forums</h1>
			<hr>
		</header>
		
		<?php foreach ( $forums as $forum ): ?>
			
			<?php get_template_part( 'forums', 'loop-forums' ); ?>
			
		<?php endforeach; ?>
		
	</div>
	
</main>

<?php get_footer( 'forums' ); ?>
