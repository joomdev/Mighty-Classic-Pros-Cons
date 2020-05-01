<?php 

function get_joomdev_wpc_options(){
	global $JoomDev_wpc_options;
	$JoomDev_wpc_options = array(
							'box_background_color' => '#F9F9F9',
							'disable_box_border' => 'no',
							'box_border_style' => 'dashed',
							'box_border_color' => '#27C110',
							'box_border_width' => 2,
							'button_color' => '#212121',
							'button_text_color' => '#fff',
							'button_shape' => 5,
							'verdict_text_color' => '#000',
							'verdict_font_size' => '22',
						);

	$_joomdev_wpc_options = get_option('joomdev_wpc_options', array());

	$JoomDev_wpc_options = shortcode_atts($JoomDev_wpc_options, $_joomdev_wpc_options);
	return $JoomDev_wpc_options;
}

function joomdev_wpc_extract_shortcode($content){
	// $pattern = get_shortcode_regex(array('joomdev-wpc-pros-cons', 'joomdev-wpc-pros', 'joomdev-wpc-cons'));
	$pattern = get_shortcode_regex(array('joomdev-wpc-pros-cons'));
	$r = array(
			'disable_title' => 'no',
			'title' => 'Title Here',
			'pros_title' => 'Pros',
			'cons_title' => 'Cons',
			'button_text' => 'Get it now',
			'verdict_text' => '',
			'pros' => array(),
			'cons' => array(),
			'disable_button' => 'no',
			'button_link' => '',
			'button_link_target' => '_SELF',
			'button_rel_attr' => 'nofollow',
			'wpc_style' => 'wppc-view1',
			'title_tag' => 'H3',
		);

	return $r;
}


// file ends here...