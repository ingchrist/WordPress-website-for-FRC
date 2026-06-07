<?php

global $tax_query;

/**
* Total number of published posts in the database that are viewable by everyone
*
* @var int
**/
$posts_count = $tax_query ? (int) $tax_query->found_posts : (int) $wp_query->found_posts;

/**
* Maximum number of posts in a listing page
*
* @var int
**/
$posts_per_page = (int) get_query_var( 'posts_per_page' );

/**
* Number of pages required to display all the posts
*
* @var int
**/
$pages_of_posts = (int) ceil( $posts_count / $posts_per_page );

/**
* Current page of posts
*
* @var int
**/
$paged = (int) ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 );

?>

<footer class="threads-pagination">
	<ul class="c">
		
		<?php if ( $paged !== 1 ): ?>
			<li class="threads-pagination-li threads-pagination-newest">
				<a href="<?php echo get_term_link( get_queried_object() ); ?>">
					1
				</a>
			</li>
		<?php else: ?>
			<li class="threads-pagination-li threads-pagination-empty">
				0
			</li>
		<?php endif; ?>
		
		<?php if ( ( $newer = $paged - 2 ) > 1 ): ?>
			<li class="threads-pagination-li threads-pagination-newer-2">
				<a href="<?php echo get_term_link( get_queried_object() ) . 'page/' . $newer . '/'; ?>">
					<?php echo $newer; ?>
				</a>
			</li>
		<?php else: ?>
			<li class="threads-pagination-li threads-pagination-empty">
				0
			</li>
		<?php endif; ?>
		
		<?php if ( ( $newer = $paged - 1 ) > 1 ): ?>
			<li class="threads-pagination-li threads-pagination-newer">
				<a href="<?php echo get_term_link( get_queried_object() ) . 'page/' . $newer . '/'; ?>">
					<?php echo $newer; ?>
				</a>
			</li>
		<?php else: ?>
			<li class="threads-pagination-li threads-pagination-empty">
				0
			</li>
		<?php endif; ?>
		
		<li class="threads-pagination-li threads-pagination-current">
			<?php echo $paged; ?>
		</li>
		
		<?php if ( ( $older = $paged + 1 ) < $pages_of_posts ): ?>
			<li class="threads-pagination-li threads-pagination-older">
				<a href="<?php echo get_term_link( get_queried_object() ) . 'page/' . $older . '/'; ?>">
					<?php echo $older; ?>
				</a>
			</li>
		<?php else: ?>
			<li class="threads-pagination-li threads-pagination-empty">
				0
			</li>
		<?php endif; ?>
		
		<?php if ( ( $older = $paged + 2 ) < $pages_of_posts ): ?>
			<li class="threads-pagination-li threads-pagination-older-2">
				<a href="<?php echo get_term_link( get_queried_object() ) . 'page/' . $older . '/'; ?>">
					<?php echo $older; ?>
				</a>
			</li>
		<?php else: ?>
			<li class="threads-pagination-li threads-pagination-empty">
				0
			</li>
		<?php endif; ?>
		
		<?php if ( $paged !== $pages_of_posts ): ?>
			<li class="threads-pagination-li threads-pagination-oldest">
				<a href="<?php echo get_term_link( get_queried_object() ) . 'page/' . $pages_of_posts . '/'; ?>">
					<?php echo $pages_of_posts; ?>
				</a>
			</li>
		<?php else: ?>
			<li class="threads-pagination-li threads-pagination-empty">
				0
			</li>
		<?php endif; ?>
		
	</ul>
</footer>
