<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="modal-close">&times;</span>
            <h2><?php esc_html_e("Add Shortcode", "rng-shortcodes"); ?></h2>
        </div>
        <div class="modal-body">
            <select class="rng-shortcodes-list">
                <option data-shortcode="rng-download-button" class="download-button"><?php esc_html_e("Download Button", "rng-shortcodes"); ?></option>
                <option data-shortcode="rng-download-button-list" class="download-button-list"><?php esc_html_e("Download List", "rng-shortcodes"); ?></option>
            </select>
            <hr>
            <div class="rng-shortcode-contents-wrapper">
                <div id="rng-download-button" class="rng-shortcode-content">
                    <label class="label-block"><?php esc_html_e("Title", "rng-shortcodes"); ?></label><input type="text" name="title" class="download-button-title input-full-width height-28" >
                    <label class="label-block"><?php esc_html_e("Link", "rng-shortcodes"); ?></label><input type="text" name="title" class="download-button-link input-full-width height-28" >
                    <label class="label-block"><?php esc_html_e("Description", "rng-shortcodes"); ?><textarea class="download-button-description input-full-width height-100"></textarea></label>
                    
                </div><!--#rng-download-button-->
                <div id="rng-download-button-list" class="rng-shortcode-content">
                    <ul class="accordian ui-sortable" id="sortable"></ul>
                    <h4 class="add-slide button button-primary"><span class="dashicons dashicons-plus"></span></h4>
                </div><!--#rng-download-list-->
            </div>
        </div>
        <div class="modal-footer">
            <button class="button button-primary button-large rng-insert-shortcode"><?php esc_html_e("Insert Shortcode", "rng-shortcodes"); ?></button>
        </div>
    </div>

</div>