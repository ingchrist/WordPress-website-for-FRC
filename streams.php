<?php

if ( ! is_user_logged_in() )
{
	wp_redirect( wp_login_url( get_permalink() ), 302 ); exit;
}

?>

<?php get_header( 'streams' ); ?>
	
<?php get_footer( 'streams' ); ?>
