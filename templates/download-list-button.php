<?php 
$titles = explode(",",$titles);
$links = explode(",",$links);
$descriptions = explode(",",$descriptions);
$count = max(count($titles),count($links),count($descriptions));
?>
<div class="shc-download-list-wrapper">
	<ul class="shc-download-list">
		<?php
		$i = 0;
		while ($i < $count) {
			?>
			<li>
                            <a class="shc-download-list-btn" href="<?php echo esc_url($titles[$i]); ?>" download="<?php echo esc_html($titles[$i]); ?>" title="<?php echo esc_html($links[$i]); ?>"><i class="icon-download3"></i><?php esc_html_e("Download","rng-shortcodes"); ?></a>
				<?php if(!empty($descriptions[$i])): ?>
				<p class="shc-download-list-description"><?php echo esc_html($descriptions[$i]); ?></p>
				<?php endif; ?>
			</li>
			<?php
			$i++;
		}
		?>
	</ul><!--.shc-download-list-->
</div><!--.shc-download-list-wrapper-->