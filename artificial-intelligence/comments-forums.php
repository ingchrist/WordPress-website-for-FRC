<?php

class Forums_Walker_Comment extends Walker_Comment
{
	
	public $tree_type = 'comment';
	public $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
	
	// opens the comments section
	public function __construct()
	{ ?>
		<section id="comments-old" class="comments-old w">
			<hr>
			<h2>Replies</h2>
				<ul class="comments-old c">
	<?php }
				
	// opens a comment thread
	public function start_lvl( &$output, $depth = 0, $args = array() )
	{
		$GLOBALS['comment_depth'] = $depth + 1; ?>
		<ul class="comment-replies">
	<?php }
						
	// closes a comment thread
	public function end_lvl( &$output, $depth = 0, $args = array() )
	{
		$GLOBALS['comment_depth'] = $depth + 1; ?>
		</ul>
	<?php }
						
	// opens a single comment
	public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 )
	{
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;
		$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
		
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( $parent_class ); ?>>
			<div class="comment-header">
				<div class="left">
					<ul class="c">
						<li class="author">
							<a href="<?php comment_author_url(); ?>">
								<?php comment_author(); ?>
							</a>
						</li>
						<li class="date">
							<?php comment_time( get_option( 'n/j/Y g:i A' ) ); ?>
						</li>
					</ul>
				</div>
				<div class="right">
					<ul class="c">
						<li class="reply">
							<?php
							
							$reply_args = array(
								'depth' => $depth,
								'max_depth' => $args['max_depth'],
								'reply_text' => '<span data-icon="reply"></span>'
							);
							
							comment_reply_link( array_merge( $args, $reply_args ) );
							
							?>
						</li>
						<li class="edit">
							<?php edit_comment_link( '<span data-icon="edit"></span>' ); ?>
						</li>
					</ul>
				</div>
			</div>
			<section class="comment-body">
				<?php comment_text(); ?>
			</section>
	<?php }
								
	// closes a single comment
	public function end_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 )
	{ ?>
		</li>
	<?php }
							
	// closes the comments section
	public function __destruct()
	{ ?>
		</ul>
	</section>
	
	<?php
	$comments_pages = paginate_comments_links( array(
		'base' => add_query_arg( 'cpage', '%#%' ),
		'type' => 'array',
		'prev_next' => false,
		'echo' => false,
		'add_fragment' => '#comments-old',
	));
	?>
	
	<div class="comments-pagination">
		<ul class="c">
			
			<?php foreach ( $comments_pages as $link ): ?>
				
				<li class="comments-pagination-li">
					<?php echo $link; ?>
				</li>
				
			<?php endforeach; ?>
			
		</ul>
	</div>
	
	<hr>
	
	<?php }

}

function ai_comments_fields( $fields )
{
	$req = '';
	if ( get_option( 'require_name_email' ) )
	{
	$req = ' req';
	}

	$commenter = wp_get_current_commenter();

	$fields['author'] =
	'<div class="form-group' . $req . '">' .
	'<input type="text" name="author" placeholder="' . __( 'Name' ) .
	'" value="' . esc_attr( $commenter['comment_author'] ) . '" />' .
	'</div>';

	$fields['email'] =
	'<div class="form-group' . $req . '">' .
	'<input type="text" name="author" placeholder="' . __( 'Email' ) .
	'"value="' . esc_attr( $commenter['comment_author_email'] ) . '"  />' .
	'</div>';

	$fields['url'] =
	'<div class="form-group">' .
		'<input type="text" name="author" placeholder="' . __( 'Website' ) .
		'"value="' . esc_attr( $commenter['comment_author_url'] ) . '"  />' .
		'</div>';
	
	return $fields;
}
add_filter( 'comment_form_default_fields', 'ai_comments_fields' );

function ai_comments_field()
{
	return
	'<div class="form-group req">' .
		'<textarea name="comment" placeholder="Comment" style="min-height:10em;"></textarea>' .
	'</div>';
}
add_filter( 'comment_form_field_comment', 'ai_comments_field' );
	
?>
	
<?php if ( comments_open() || get_comments_number() ): ?>
	
	<aside id="comments-forums">
		<div class="cc">
			
			<?php if ( get_comments_number() ): ?>
				
				<?php
				wp_list_comments( array(
					'walker' => new Forums_Walker_Comment,
				));
				?>
				
			<?php endif; if ( comments_open() ): ?>
				
				<section class="comments-new w">
					
					<?php
					comment_form( array(
					
					'id_form'              => '',
					
					'comment_notes_before' => '',
					'comment_notes_after'  => '',
					
					'title_reply'          => __( 'Reply' ),
					'title_reply_to'       => __( 'Reply to %s' ),
					'cancel_reply_link'    => __( 'Cancel' ),
					
					'label_submit'         => __( 'Submit' ),
					
					));
					?>
					
				</section>
				
			<?php endif; ?>
			
		</div>
	</aside>
	
<?php endif; ?>
