<?php
/*
Plugin Name: Contact Form 7 Tiny MCE
Plugin URI: http://ecolosites.eelv.fr/cf7mce
Description: Add tiny MCE to CF7 editor
Author: bastho
Author URI: http://urbancube.fr/
Text Domain: wpcf7
Domain Path: /languages/
Version: 0.1.4
*/
add_action('wpcf7_add_meta_boxes','cf7mce_add');

function cf7mce_add(){
        add_action('after_wp_tiny_mce','cf7mce');
        add_action('admin_footer','cf7mce_editor');
}
function cf7mce_editor(){
    echo'<div id="tiny-mce-hidden-4-cf7">';
        wp_editor('','hiddeneditor',array('teeny'=>true));
    echo'</div>';
}
function cf7mce($post_id){
        ?>
        <script type="text/javascript">
jQuery(document).ready(function() {
	 jQuery('#tiny-mce-hidden-4-cf7').hide();
         if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
                jQuery("#wpcf7-form").addClass("wp-editor-area");
                var ed = new tinymce.Editor('wpcf7-form', {
                    wpautop:false,
                    menubar : false,
                    plugins:"image,wordpress,wpeditimage,wplink",
                    toolbar: "undo redo | styleselect | bold underline italic |  alignleft aligncenter alignright | bullist numlist | indent outdent | link unlink image code source"

                }, tinymce.EditorManager);

                ed.render();
         }
});
	</script>
        <?php
}