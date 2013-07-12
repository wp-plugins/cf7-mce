<?php
/*
Plugin Name: Contact Form 7 Tiny MCE
Plugin URI: http://ecolosites.eelv.fr/cf7mce
Description: Add tiny MCE to CF7 editor
Author: bastho
Author URI: http://urbancube.fr/
Text Domain: wpcf7
Domain Path: /languages/
Version: 0.1.0
*/
add_action('wpcf7_add_meta_boxes','cf7mce_add');

function cf7mce_add(){	
	add_action('admin_footer','cf7mce');
}
function cf7mce($post_id){
 	wp_editor('','hiddeneditor',array('teeny'=>true));
	?>
	<script type="text/javascript">
 jQuery(document).ready(function() {
	 if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
	  	jQuery("#wpcf7-form").addClass("wp-editor-area");
	  	tinyMCE.settings.theme_advanced_buttons1 += ',code';
	  	tinyMCE.settings.wpautop = false;
		tinyMCE.execCommand("mceAddControl", false, 'wpcf7-form');
	 }
	 jQuery('#wp-hiddeneditor-wrap').hide();
});
 </script>
	<?php
}
