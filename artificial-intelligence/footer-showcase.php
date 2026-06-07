	<footer id="footer" class="ww">
		<div class="cc">
			
			<?php if ( ! dynamic_sidebar( 'footer_showcase' ) ): ?>
				<section class="col">
					<h6>Widget here</h6>
					<p>
						Place a widget in the Showcase Footer section and it will appear here.
					</p>
				</section>
			<?php endif; ?>
			
		</div>
	</footer>

	<footer id="copyright">
		<?php
		
		if ( get_theme_mod( 'copyright' ) )
		{
			printf(
			get_theme_mod( 'copyright' ),
			date( 'Y' ),
			get_bloginfo( 'description' ),
			get_bloginfo( 'tagline' )
		);
	}

	else
	{
		printf(
		'Copyright 2004&ndash;%1$s by <abbr title="For Insipration and Recognition of Science and Technology">FIRST</abbr> Team %2$s, the %3$s. All rights reserved.',
		date( 'Y' ),
		get_bloginfo( 'description' ),
		get_bloginfo( 'tagline' )
	);
	}

	?>
	</footer>
	</div>

	<footer id="inc">
		<?php wp_footer(); ?>
	</footer>
</body>

</html>
