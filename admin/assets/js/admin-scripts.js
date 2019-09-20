jQuery(function( $ ) {
 
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {

    	var joomdev_color_picker_options = {
		    // you can declare a default color here,
		    // or in the data-default-color attribute on the input
		    defaultColor: false,
		    // a callback to fire whenever the color changes to a valid color
		    change: function(event, ui){},
		    // a callback to fire when the input is emptied or an invalid color
		    clear: function() {},
		    // hide the color picker controls on load
		    hide: true,
		    // show a group of common colors beneath the square
		    // or, supply an array of colors to customize further
		    palettes: true
		};
        $('.joomdev-color-picker').wpColorPicker(joomdev_color_picker_options);
    });
     
});