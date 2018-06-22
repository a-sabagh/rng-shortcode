<?php
$grid_class = (!empty($description))? "shc-col-3" : "shc-col-12";
?>
<div class="shc-row">
    <div class="<?php echo esc_attr($grid_class); ?>">
        <a class="shc-btn-download" href="<?php echo esc_url($link); ?>" download="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>"><i class="icon-download3"></i><?php esc_html_e("Download","rng-shortcodes"); ?></a>
    </div>
    <?php if(!empty($description)){ ?>
    <div class="shc-col-9">
        <p><?php echo esc_html($description); ?></p>
    </div>
    <?php } ?>
</div><!--.shc-row-->