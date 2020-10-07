<?php 
/*
	Plugin Name: JoomDev WP Pros & Cons
	Plugin URI: https://mightythemes.com
	Description: This plugin provides you the shortcode to show pros/cons on any of the page. It will add a button to editor, which enables you the visual shortcode.
	Version: 2.0.4
	Author: MightyThemes
	Author URI: https://mightythemes.com
*/

global $JoomDev_wpc_options;
$JoomDev_wpc_options = array();

if(!defined('JOOMDEV_WPC_DIR')){
	define('JOOMDEV_WPC_DIR', 'joomdev-wp-pros-cons');
}

define('JOOMDEV_WPC_MORE_THEMES_PLUGINS_URL', 'https://mightythemes.com');
define('JOOMDEV_WPC_VER', '1.0.6');

include 'joomdev-wpc-functions.php';
include 'admin/joomdev-wpc-options.php';
include 'joomdev-wpc-shortcodes.php';

add_action('init', 'get_joomdev_wpc_options', 99);

add_action( 'admin_enqueue_scripts', 'joomdev_wpc_color_picker' );
function joomdev_wpc_color_picker( $hook ) {
 
    // if( is_admin() ) { 
        // Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' ); 
         
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'joomdev-wpc-admin-scripts', plugins_url( '/admin/assets/js/admin-scripts.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
    // }

        wp_enqueue_script( 'jquery-ui-dialog' ); // jquery and jquery-ui should be dependencies, didn't check though...
		wp_enqueue_style( 'wp-jquery-ui-dialog' );

		wp_enqueue_style( 'joomdev-wpc-admin-styles', plugins_url( '/admin/assets/css/admin-styles.css', __FILE__ ) );
}

add_action('admin_footer', 'joomdev_wpc_admin_footer_scripts', 99);
function joomdev_wpc_admin_footer_scripts(){
	?>
		<script type="text/javascript">
			var joomdev_wpc_site_url = '<?php echo site_url(); ?>';
			var joomdev_wpc_plugin_url = '<?php echo plugins_url( "", __FILE__ ); ?>';
		</script>
	<?php 
	joomdev_wpc_editor_button_popup();
}

add_action('init', 'joomdev_wpc_init_functions', 999);
function joomdev_wpc_init_functions(){
	global $JoomDev_wpc_options;

	add_action('wp_enqueue_scripts', 'joomdev_wpc_scripts', 999);
}

function joomdev_wpc_scripts(){
	wp_enqueue_style('joomdev-wpc-styles', plugins_url( 'assets/css/styles.css', __FILE__ ));
}

// file ends here