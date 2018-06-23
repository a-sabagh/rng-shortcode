<?php
/**
 * The template for displaying output of download button shortcode
 * This template can be overridden by copying it to yourtheme/rng-shortcodes/download-button.php.
 * @author  Abolfazl Sabagh
 * @package rng-shortcode/Templates
 * @version 0.1
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<div class="shc-download-button">
    <a class="shc-btn-download" href="<?php echo esc_url($link); ?>" download="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>"><i class="shc-icon-download3"></i><?php esc_html_e("Download", "rng-shortcodes"); ?></a>
    <?php if (!empty($description)) { ?>
        <p class="shc-download-button-description"><?php echo esc_html($description); ?></p>
    <?php } ?>
</div><!--.shc-download-button-->