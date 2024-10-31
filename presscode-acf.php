<?php


function pcode_acf_register_field_groups()
{	
	if(function_exists("register_field_group"))
	{	$options = get_option('Pcode_Apf_Page_Settings');
		$defaultTheme = $options['editor_theme_general'];
		$cssTheme = $options['editor_theme_css'];
		$jsTheme = $options['editor_theme_js'];
		$phpTheme = $options['editor_theme_php'];
		
		
		if(empty($cssTheme) || $cssTheme === "not-set")
		{	$cssTheme = $defaultTheme;
		}
		
		if(empty($jsTheme) || $jsTheme === "not-set")
		{	$jsTheme = $defaultTheme;
		}
		
		if(empty($phpTheme) || $phpTheme === "not-set")
		{	$phpTheme = $defaultTheme;
		}
		
		
		$pages = get_posts(array('post_type' => 'page', 'numberposts' => -1));
		$pageChoices = array('-1' => 'All');
		
		
		foreach($pages as $page)
		{	$pageChoices[$page->ID] = $page->post_title;
		}
		
		
		$posts = get_posts(array('post_type' => 'post', 'numberposts' => -1));
		$postChoices = array('-1' => 'All');
		
		
		foreach($posts as $post)
		{	$postChoices[$post->ID] = $post->post_title;
		}
		
		
		register_field_group(array (
			'id' => 'acf_pcode_custom_php',
			'title' => 'Custom PHP',
			'fields' => array (
				array (
					'key' => 'pcode_field_custom_php_code',
					'label' => 'Code',
					'name' => 'code',
					'type' => 'acf_code_field',
					'required' => 1,
					'default_value' => "<?php\r\n\r\n\r\n?>",
					'placeholder' => '',
					'mode' => 'application/x-httpd-php',
					'theme' => $phpTheme,
					'formatting' => 'br',
					'maxlength' => '',
					'rows' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'pcode_custom_php',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 10,
		));
		
		
		register_field_group(array (
			'id' => 'acf_pcode_custom_css',
			'title' => 'Custom CSS',
			'fields' => array (
				array (
					'key' => 'pcode_field_custom_css_code',
					'label' => 'Code',
					'name' => 'code',
					'type' => 'acf_code_field',
					'required' => 1,
					'default_value' => "",
					'placeholder' => '',
					'mode' => 'css',
					'theme' => $cssTheme,
					'formatting' => 'br',
					'maxlength' => '',
					'rows' => '',
				)
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'pcode_custom_css',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 10,
		));
		
		
		register_field_group(array (
			'id' => 'acf_pcode_custom_js',
			'title' => 'Custom JS',
			'fields' => array (
				array (
					'key' => 'pcode_field_custom_js_code',
					'label' => 'Code',
					'name' => 'code',
					'type' => 'acf_code_field',
					'required' => 1,
					'default_value' => "",
					'placeholder' => '',
					'mode' => 'javascript',
					'theme' => $jsTheme,
					'formatting' => 'br',
					'maxlength' => '',
					'rows' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'pcode_custom_js',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 10,
		));
		
		
		register_field_group(array (
			'id' => 'acf_pcode_enabled',
			'title' => 'Enabled',
			'fields' => array (
				array (
					'key' => 'pcode_field_enabled',
					'label' => 'Enabled',
					'name' => 'enabled',
					'type' => 'true_false',
					'message' => '',
					'default_value' => 1,
				)
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'pcode_custom_css',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'pcode_custom_js',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'pcode_custom_php',
						'order_no' => 0,
						'group_no' => 0,
					),
				)
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		
		
		register_field_group(array (
			'id' => 'acf_pcode_options',
			'title' => 'Options',
			'fields' => array (
				array (
					'key' => 'pcode_field_include_on_specific_pages',
					'label' => 'Include Only on Specific Pages',
					'name' => 'include_on_specific_pages',
					'type' => 'true_false',
					'message' => '',
					'default_value' => 0,
				),
				array (
					'key' => 'pcode_field_pages',
					'label' => 'Pages',
					'name' => 'pages',
					'type' => 'select',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'pcode_field_include_on_specific_pages',
								'operator' => '==',
								'value' => '1',
							),
						),
						'allorany' => 'all',
					),
					'choices' => $pageChoices,
					'default_value' => '',
					'allow_null' => 0,
					'multiple' => 1,
				),
				array (
					'key' => 'pcode_field_include_on_specific_posts',
					'label' => 'Include Only on Specific Posts',
					'name' => 'include_on_specific_posts',
					'type' => 'true_false',
					'message' => '',
					'default_value' => 0,
				),
				array (
					'key' => 'pcode_field_posts',
					'label' => 'Posts',
					'name' => 'posts',
					'type' => 'select',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'pcode_field_include_on_specific_posts',
								'operator' => '==',
								'value' => '1',
							),
						),
						'allorany' => 'all',
					),
					'choices' => $postChoices,
					'default_value' => '',
					'allow_null' => 0,
					'multiple' => 1,
				)
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'pcode_custom_css',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'pcode_custom_js',
						'order_no' => 0,
						'group_no' => 0,
					),
				)
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 20,
		));
		
	}
	
}


function pcode_acf_get_field($key, $postId)
{	$postMeta = get_post_meta($postId);
 	$field = $postMeta[$key][0];
 	
 	
 	if(is_serialized($field))
 	{	$field = unserialize($field);
 	}
 
 
 	return $field;
 
}

?>