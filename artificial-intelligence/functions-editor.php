<?php

class Editor
{
	
	public static function init()
	{
		add_action( 'admin_init', array(
			__CLASS__, 'assets'
		));
	}
	
	public static function assets()
	{
		add_editor_style(
			'editor/gen/' . Artificial_Intelligence::$skin . '.css'
		);
	}
	
}

Editor::init();
