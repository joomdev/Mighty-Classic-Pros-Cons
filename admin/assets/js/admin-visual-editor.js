jQuery(function($) {
    tinymce.create("tinymce.plugins.joomdev_wpc_shortcode", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //add new button     
            ed.addButton("joomdev_wpc_shortcode", {
                title : "WP Pros & Cons Shortcode",
                cmd : "joomdev_wpc_shortcode_command",
                image : joomdev_wpc_plugin_url + '/admin/assets/images/joomdev-wpc.png'
            });

            //button functionality.
            ed.addCommand("joomdev_wpc_shortcode_command", function(ui, v) {

                // open popup on click this button
                $('#joomdev_wpc_editor_button_popup').addClass('joomdev-wpc-popup-display');
                $('body').css('overflow', 'hidden');

            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "WP Pros &amp; Cons Button",
                author : "MightyThemes",
                version : "2.0.0"
            };
        }
    });

    tinymce.PluginManager.add("joomdev_wpc_shortcode", tinymce.plugins.joomdev_wpc_shortcode);
});