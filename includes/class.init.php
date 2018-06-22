<?php
namespace rng\shortcodes;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class init {

    public $version;
    public $slug;

    public function __construct($version, $slug) {
        $this->version = $version;
        $this->slug = $slug;
        add_action('plugins_loaded', array($this, 'add_text_domain'));
        add_action('wp_enqueue_scripts', array($this, 'public_enqueue_scripts'));
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
        $this->load_modules();
    }

    /**
     * add text domain for translate files
     */
    public function add_text_domain() {
        load_plugin_textdomain($this->slug, FALSE, SHC_PRT . "/languages");
    }
    /**
    * adding dlbox public scripts
    */
    public function public_enqueue_scripts() {
        wp_enqueue_style("shc-box-stylesheet",SHC_PDU . "assets/css/style.css");
    }
    /**
    * adding admin enqueue scripts
    */
    public function admin_enqueue_scripts($hook){
        if($hook == 'post-new.php' || $hook == 'post.php'){
            wp_enqueue_style('shc-box-shortcode-style',SHC_PDU . "admin/assets/css/style.css");
            wp_enqueue_script('shc-box-shortcode-scripts',SHC_PDU . "admin/assets/js/scripts.js",array("jquery"),$this->version,TRUE);
        }
    }
    /**
     * load modules
     */
    public function load_modules() {
        require_once 'class.controller.shortcode.php';
    }

}
