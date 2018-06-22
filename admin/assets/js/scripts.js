jQuery(document).ready(function ($) {
    /***********************************************************/
    var modal = $(".modal");
    var btn = $(".modal-button");

    if (modal.length) {
        //open modal
        btn.on("click", function (e) {
            e.preventDefault();
            var modal = $(this).data("modal");
            $("#" + modal).show(0, function () {
                $(this).addClass("open-modal");
            });
        });
        //close modal
        $(".modal-close").on("click", function () {
            var modal = $(this).closest(".modal");
            modal.hide();
        });

    }
    /***********************************************************/
    $(".rng-shortcode-contents-wrapper .rng-shortcode-content").hide();
    $(".rng-shortcode-contents-wrapper .rng-shortcode-content").first().show().addClass("active-option");
    ;
    $(".rng-shortcodes-list").find("option").first().prop("selected", true);
    $(".rng-shortcodes-list").on("change", function () {
        var selected_shortcode = $("option:selected", this);
        var active_shortcode = selected_shortcode.data("shortcode");
        var active_content_id = "#" + active_shortcode;
        $(".rng-shortcode-contents-wrapper .rng-shortcode-content").hide().removeClass("active-option");
        $(".rng-shortcode-contents-wrapper").find(active_content_id).show().addClass("active-option");
    });
    /***********************************************************/
    var download_list_item_output = '<li>\n\
                                <h5 class="element"><span class="dashicons dashicons-menu"></span>' + TRANSLATES.heading + '</h5>\n\
                                <div class="accordian-panel" style="display: none;">\n\
                                    <label class="label-block">' + TRANSLATES.title + '</label><input name="title" class="download-list-button-title input-full-width height-28" type="text">\n\
                                    <label class="label-block">' + TRANSLATES.link + '</label><input name="title" class="download-list-button-link input-full-width height-28" type="text">\n\
                                    <label class="label-block">' + TRANSLATES.description + '<textarea class="download-list-button-description input-full-width height-100"></textarea></label>\n\
                                </div><!--.accordian-panel-->\n\
                                <span class="open-slider"><span class="dashicons dashicons-arrow-down-alt2"></span></span>\n\
                                <span class="remove-slider"><span class="dashicons dashicons-trash"></span></span>\n\
                            </li>';
    $("#rng-download-button-list .accordian").append(download_list_item_output);
    $("#rng-download-button-list .accordian .accordian-panel").hide();
    $("#rng-download-button-list .add-slide").on('click', function () {
        $("#rng-download-button-list .accordian").append(download_list_item_output);
    });
    $("#rng-download-button-list ").on("click", ".accordian li .remove-slider", function (e) {
        e.preventDefault();
        $(this).parent("li").remove();
    });
    $("#rng-download-button-list").on("click", ".accordian li .open-slider", function (e) {
        e.preventDefault();
        $(this).prev(".accordian-panel").slideToggle();
    });
    $("#sortable").sortable({
        handle: 'h5 .dashicons-menu'
    });
    /***********************************************************/
    $(".modal-footer .rng-insert-shortcode").on("click", function () {
        var active_option = $(".rng-shortcode-contents-wrapper .active-option").attr("id");
        switch (active_option) {
            case 'rng-download-button':
                rng_download_button();
                break;
            case 'rng-download-button-list':
                rng_download_button_list();
                break;
        }
    });
    /***********************************************************/
    function rng_download_button() {
        var download_button = $("#rng-download-button");
        var title = download_button.find(".download-button-title").val();
        var link = download_button.find(".download-button-link").val();
        var description = download_button.find(".download-button-description").val();
        var shortcode_content = "[rng_download_button title='" + title + "' link='" + link + "' description='" + description + "']";
        tinymce.activeEditor.execCommand('insertHtml', false, shortcode_content);
        modal.hide();
    }
    /***********************************************************/
    function rng_download_button_list() {
        var download_list = $("#rng-download-button-list");
        var titles = "";
        var links = "";
        var descriptions = "";
        download_list.find("ul.accordian li").each(function (index, element) {
            var title = $(this).find(".download-list-button-title").val();
            var link = $(this).find(".download-list-button-link").val();
            var description = $(this).find(".download-list-button-description").val();
            
            titles += title + ",";
            links += link + ",";
            descriptions += description + ",";
        });
        titles = titles.slice(0,-1);
        links = links.slice(0,-1);
        descriptions = descriptions.slice(0,-1);
        var shortcode_content = "[rng_download_lists titles='" + titles + "' links='" + links + "' descriptions='" + descriptions + "']";
        tinymce.activeEditor.execCommand('insertHtml', false, shortcode_content);
        modal.hide();
    }
});