<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_block',
		'title' => 'Block',
		'fields' => array (
			array (
				'key' => 'field_54dfed04b9239',
				'label' => 'Layout',
				'name' => 'layout',
				'type' => 'radio',
				'instructions' => 'Choose the layout of this block. Thumbnail is laid out as a background image spread out with a caption at the bottom. Overlay places text on top of the featured image. Solid is laid out horizontally on a solid background.',
				'required' => 1,
				'choices' => array (
					'thumbnail' => 'Thumbnail',
					'overlay' => 'Overlay',
					'solid' => 'Solid',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'thumbnail',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_54dec16354b3a',
				'label' => 'Heading',
				'name' => 'heading',
				'type' => 'text',
				'instructions' => 'The heading to use in the slide.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54dfed4db923a',
				'label' => 'Heading 2',
				'name' => 'heading_2',
				'type' => 'text',
				'instructions' => 'Add a secondary heading. Only supported for overlay.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54dfed04b9239',
							'operator' => '==',
							'value' => 'overlay',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54dec16854b3b',
				'label' => 'Content',
				'name' => 'content',
				'type' => 'textarea',
				'instructions' => 'The content that will appear in the slide\'s footer.',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_54dec16d54b3c',
				'label' => 'Link',
				'name' => 'link',
				'type' => 'page_link',
				'instructions' => 'Where do you want this slide\'s link to take you?',
				'post_type' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slides',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'showcases',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'slug',
				7 => 'format',
				8 => 'categories',
				9 => 'tags',
				10 => 'send-trackbacks',
			),
		),
		'menu_order' => 100,
	));
	register_field_group(array (
		'id' => 'acf_slides',
		'title' => 'Slides',
		'fields' => array (
			array (
				'key' => 'field_54dec49dfe827',
				'label' => 'Position',
				'name' => 'position',
				'type' => 'radio',
				'choices' => array (
					'slider' => 'Slider',
					'whole' => 'Below Slider',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'whole',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slides',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'format',
				9 => 'categories',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 200,
	));
	register_field_group(array (
		'id' => 'acf_showcase-blocks',
		'title' => 'Showcase Blocks',
		'fields' => array (
			array (
				'key' => 'field_54dec415f4283',
				'label' => 'Show on Page',
				'name' => 'show',
				'type' => 'relationship',
				'instructions' => 'Which page this part should be displayed on. The chosen page must be be a showcase page. Parts are displayed in the order assigned to them via the "Order" option, from smallest to largest.',
				'return_format' => 'id',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'showcases',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'format',
				9 => 'categories',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 800,
	));
	register_field_group(array (
		'id' => 'acf_showcase-pages',
		'title' => 'Showcase Pages',
		'fields' => array (
			array (
				'key' => 'field_54dec37ebd895',
				'label' => 'Menu',
				'name' => 'nav_menu',
				'type' => 'text',
				'instructions' => 'Enter the name of the navigation menu you want to display for this showcase page. You can access your navigation menus through Appearance > Menus.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'showcase.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'format',
				9 => 'categories',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 900,
	));
	register_field_group(array (
		'id' => 'acf_fade-in',
		'title' => 'Fade In',
		'fields' => array (
			array (
				'key' => 'field_54dec30c32909',
				'label' => 'Fade In',
				'name' => 'fade_in',
				'type' => 'true_false',
				'instructions' => 'Whether the first slide or block on the page should fade into view.',
				'message' => '',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'showcase.php',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'format',
				9 => 'categories',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 1000,
	));
}
