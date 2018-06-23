<?php
/**
 * Add Shortcode button above of TinyMce Editor
 * @author  Abolfazl Sabagh
 * @package rng-shortcode/Admin
 * @version 0.1
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<button class="button modal-button rng-shortcode-wrapper" data-modal="myModal">
    <span class="dashicons dashicons-editor-code"></span>
    <span class="text"><?php esc_html_e("Add Shortcode" , "rng-shortcodes"); ?></span>
</button>