<?php
namespace rng\dlbox;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class dlbox {
    public function __construct(){
    	add_action("media_buttons",array($this,"add_shortcode_button"));
		add_action("admin_footer-post.php",array($this,"shortcode_content_options"));
		add_action("admin_footer-post-new.php",array($this,"content_shortcode_options"));
		add_action("admin_enqueue_scripts",array($this,"localize_shortcode_translate"));
        add_shortcode("rng_download_button",array($this,"download_button_shortcode"));
        add_shortcode("rng_download_list_buttons",array($this,"download_list_buttons_shortcode"));
    }
    public function add_shortcode_button(){
    	echo '<a href="#" class="button"><span class="dashicons dashicons-editor-code"></span><span>'. esc_html__('Add Shortcode','rng-dlbox') .'</span></a>';
    }
    public function localize_shortcode_translate($hook) {
        $translates = array();
        if($hook == 'post-new.php' || $hook == 'post.php'){
            wp_localize_script("dl-box-shortcode-scripts","translates",$translates);
        }
    }
    public function content_shortcode_options(){}
    public function download_button_shortcode(){}
    public function download_list_buttons_shortcode(){}
}

new dlbox();