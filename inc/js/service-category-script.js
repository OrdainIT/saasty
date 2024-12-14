jQuery(document).ready(function($) {
    function media_upload(button_class) {
        var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;

        $('body').on('click', button_class, function(e) {
            var button_id = '#' + $(this).attr('id');
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = $(button_id);
            _custom_media = true;

            wp.media.editor.send.attachment = function(props, attachment) {
                if (_custom_media) {
                    $('#service-category-image-id').val(attachment.id);
                    $('#service-category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                    $('#service-category-image-wrapper .custom_media_image').attr('src', attachment.url).css('display', 'block');
                } else {
                    return _orig_send_attachment.apply(button_id, [props, attachment]);
                }
            }

            wp.media.editor.open(button);
            return false;
        });

        $('body').on('click', '.service-category-image-remove', function() {
            $('#service-category-image-id').val('');
            $('#service-category-image-wrapper').html('');
        });
    }

    media_upload('.service-category-image-upload.button');
});
