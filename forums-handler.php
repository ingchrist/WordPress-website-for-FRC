<?php

if ( ! is_user_logged_in() )
{
	wp_redirect( wp_login_url( get_post_type_archive_link( 'forum_thread' ) ) );
	exit;
}

elseif ( ! current_user_can( 'do_forums' ) )
{
	wp_redirect( home_url() );
	exit;
}

// Implement creating forum threads
// TODO: Add editing and deleting support to frontend, maybe?
//

if ( ! empty( $_POST['thread_new'] ) )
{
	
	// Check if current use is allowed to publish forum threads, because that would be bad
	//
	if ( current_user_can( 'publish_forum_threads' ) && check_admin_referer( 'publish_forum_thread' ) )
	{
		$thread_new = $_POST['thread_new'];
		
		$tags_ids = array();
		
		// If any thread tags are set, make them nice too.
		//
		if ( ! empty( $thread_new['tags'] ) )
		{
			
			foreach ( explode( ',', $thread_new['tags'] ) as $tag )
			{
				// Trim the raw tag and replace any internal whitespace with a space
				//
				$tag = preg_replace( '/\s/', ' ', trim( $tag ) );
				
				// Let WordPress handle the hard stuff
				//
				if ( term_exists( $tag ) )
				{
					// If the tag already exists, get its ID
					//
					$tags_ids[] = (int) get_term_by( 'name', $tag, 'forum_tag' )->term_id;
				}
				
				else
				{
					// If not, create it and get its ID
					//
					$tags_ids[] = wp_insert_term( $tag, 'forum_tag' )['term_id'];
				}
				
			}
			
			update_option( 'temp_tags_ids', $tags_ids );
			
		}
		
		// Make the new post
		//
		$thread_new_id = wp_insert_post( array(
			'post_content' => $thread_new['content'],
			'post_title' => $thread_new['title'],
			'post_type' => 'forum_thread',
			'post_status' => 'publish',
			'tax_input' => array(
				'forum' => array(
					$thread_new['forum'],
				),
				'forum_tag' => $tags_ids,
			),
		));
		
		if ( $thread_new_id === 0 )
		{
			// Post creation failed for some reason
			//
			// TODO: Implement fallback
		}
		
		else
		{
			// Post created; redirect to post page
			//
			wp_redirect( get_post( $thread_new_id )->guid );
		}
		
	}
	
	else
	{
		// Not allowed to post, so die
		//
		wp_die( 'Cheatin\', \'uh?' );
	}
	
}
	
