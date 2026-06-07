<form class="body-search" method="get" role="search"
action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<input class="body-search-input"
	name="s" value="<?php echo get_search_query(); ?>"
	placeholder="Search" />

</form>
