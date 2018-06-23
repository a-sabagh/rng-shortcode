<?php 
$titles = extract($titles);
$links = extract($links);
$descriptions = extract($descriptions);
$count = max(count($titles),count($links),count($descriptions));
?>
<div class="shc-download-list-wrapper">
	<ul class="shc-download-list">
		<?php
		$i = 0;
		while ($i < $count) {
			?>
			<li>
				<a class="shc-download-list-btn" href="<?php echo esc_url($titles[$i]); ?>" download="<?php echo esc_html($titles[$i]); ?>" title="<?php echo esc_html($links[$i]); ?>"></a>
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