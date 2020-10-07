<?php 
// add_action('the_content', 'do_shortcode', 10);
// add_filter('the_content', 'do_shortcode', 10);
add_shortcode('joomdev-wpc-pros-cons', 'joomdev_wpc_pros_cons');
function joomdev_wpc_pros_cons($atts, $content){

	global $JoomDev_wpc_options;

	$default = array(
        'disable_title' => 'no',
        'title' => 'Title Here',
        'pros_title' => 'Pros',
        'cons_title' => 'Cons',
        'button_text' => 'Get it now',
        'verdict_text' => '',
        'disable_button' => 'no',
        'button_link' => '',
        'button_link_target' => '_SELF',
        'button_rel_attr' => 'nofollow',
        'wpc_style' => 'wppc-view1',
        'title_tag' => 'H3',
        );
	$atts = shortcode_atts(
            $default,
            $atts,
            'joomdev-wpc-pros-cons'
        );

	extract($atts);
    
	// get pros and cons
	$p1 = get_shortcode_regex(array('joomdev-wpc-pros'));
    $p2 = get_shortcode_regex(array('joomdev-wpc-cons'));

    $pros = '';
    if ( preg_match_all( '/'. $p1 .'/s', $content, $m1 ) && array_key_exists( 2, $m1 ) && in_array( 'joomdev-wpc-pros', $m1[2] )) {
        $pros = $m1[5][0];
    }

    $cons = '';
    if ( preg_match_all( '/'. $p2 .'/s', $content, $m2 ) && array_key_exists( 2, $m2 ) && in_array( 'joomdev-wpc-cons', $m2[2] )){
    	$cons = $m2[5][0];
    }

	ob_start();

	?>
<style type="text/css">
    .wp-pros-cons {
        background: <?php echo $JoomDev_wpc_options['box_background_color'];
        ?>;
        <?php if($JoomDev_wpc_options['disable_box_border']=='yes') {
            echo 'border: none;';
        }
        else {
            ?>border: <?php echo $JoomDev_wpc_options['box_border_style'] . " ". $JoomDev_wpc_options['box_border_width'] . "px " . $JoomDev_wpc_options['box_border_color'];
            ?>;
            <?php
        }
        ?>
    }

    .wp-pros-cons .wppc-btn-wrapper .jd-wppc-btn {
        color: <?php echo $JoomDev_wpc_options['button_text_color']; ?>;
        background: <?php echo $JoomDev_wpc_options['button_color']; ?>;
    }
    .wp-pros-cons .wppc-btn-wrapper .jd-wppc-btn {
        border-radius: <?php echo $JoomDev_wpc_options['button_shape'] . "px"; ?>;
    }
    .wp-pros-cons .wppc-verdict-wrapper {
        color: <?php echo $JoomDev_wpc_options['verdict_text_color']; ?>;
        font-size: <?php echo $JoomDev_wpc_options['verdict_font_size'] . "px"; ?>;
    }
    
    .wp-pros-cons .wppc-header .wppc-box-symbol i {
        font-size: <?php echo $JoomDev_wpc_options['icons_font_size'] . "px"; ?>;
    }

</style>
<div class="wp-pros-cons <?php echo $wpc_style; ?>">
    <?php 
        if($disable_title == 'yes'){
            // do nothing
        }
        else {
            echo "<$title_tag class='wppc-pros-cons-heading'>$title</$title_tag>";
        }
    ?>

    <div class="wppc-boxs">
        <div class="wppc-box pros-content">
            <div class="wppc-header">
                <?php if ( ! ($wpc_style == 'wppc-view2' || $wpc_style == 'wppc-view3') ) { ?>
                <div class="wppc-box-symbol">
                    <img src="<?php echo plugins_url( JOOMDEV_WPC_DIR . "/assets/icons/thumbs-up-regular.svg" ); ?>">
                </div>
                <?php } ?>
                <h4 class="wppc-content-title cons-title"><?php echo $pros_title; ?></h4>
            </div>
            <?php echo $pros; ?>
        </div>

        <div class="wppc-box cons-content">
            <div class="wppc-header">
                <?php if ( ! ($wpc_style == 'wppc-view2' || $wpc_style == 'wppc-view3') ) { ?>
                <div class="wppc-box-symbol">
                    <img src="<?php echo plugins_url( JOOMDEV_WPC_DIR . "/assets/icons/thumbs-down-regular.svg" ); ?>">
                </div>
                <?php } ?>
                <h4 class="wppc-content-title cons-title"><?php echo $cons_title; ?></h4>
            </div>
            <?php echo $cons; ?>
        </div>
    </div>

    <?php if ( ! empty($verdict_text) ) { ?>
        <div class="wppc-verdict-wrapper">
            <?php echo $verdict_text; ?>
        </div>
    <?php } ?>
    
    <?php 
    if($disable_button == 'yes') {
        // do nothing
    }
    else {
    ?>  
    <div class="wppc-btn-wrapper">
        <a href="<?php echo $button_link; ?>" target="<?php echo $button_link_target; ?>" rel="<?php echo $button_rel_attr; ?>" class="jd-wppc-btn wp-block-button__link">
            <?php echo $button_text; ?>
        </a>
    </div>
    <?php } ?>

</div>

<?php 

	return ob_get_clean();
}

// add_shortcode('joomdev-wpc-pros', 'joomdev_wpc_pros');
function joomdev_wpc_pros($atts, $content){

}

// add_shortcode('joomdev-wpc-cons', 'joomdev_wpc_cons');
function joomdev_wpc_cons($atts, $content){

}

// file ends here...
