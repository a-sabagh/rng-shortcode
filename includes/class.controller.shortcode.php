<?php

namespace rng\shortcodes;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class shortcode {

    public function __construct() {
        add_action("media_buttons", array($this, "add_shortcode_button"));
        add_action("admin_footer-post.php", array($this, "content_shortcode_options"));
        add_action("admin_footer-post-new.php", array($this, "content_shortcode_options"));
        add_action("admin_enqueue_scripts", array($this, "localize_shortcode_translate"));
        add_shortcode("rng_download_button", array($this, "download_button_shortcode"));
        add_shortcode("rng_download_list_buttons", array($this, "download_list_buttons_shortcode"));
    }

    public function add_shortcode_button() {
        require_once SHC_ADM . "shortcode-button.php";
    }

    public function localize_shortcode_translate($hook) {
        $translates = array(
            'heading' => esc_html__("Download item", "rng-shortcodes"),
            'title' => esc_html__("Title", "rng-shortcodes"),
            'link' => esc_html__("Link", "rng-shortcodes"),
            'description' => esc_html__("Description", "rng-shortcodes"),
        );
        if ($hook == 'post-new.php' || $hook == 'post.php') {
            wp_localize_script("shc-box-shortcode-scripts", "TRANSLATES", $translates);
        }
    }

    public function content_shortcode_options() {
        require_once SHC_ADM . "shortcode-options.php";
    }

    public function download_button_shortcode($atts) {
        //ATTRIBUTE
        $array_atts = shortcode_atts( array( 'title' => '', 'link' => '#', 'description' => '' ), $atts, 'rng_download_button' );
        ob_start();
        shc_get_template("download-button.php",$array_atts);
        $output = ob_get_clean();
        return $output;
    }

    public function download_list_buttons_shortcode($atts) {
        //ATTRIBUTE
        $array_atts = shortcode_atts( array( 'titles' => '', 'links' => '#', 'descriptions' => '' ), $atts, 'rng_download_list_buttons' );
        ob_start();
        shc_get_template("download-list-button.php",$array_atts);
        $output = ob_get_clean();
        return $output;
    }

}

new shortcode();
