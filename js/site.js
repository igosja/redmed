jQuery(document).ready(function ($) {
    $('#language-select').on('selectmenuselect', function () {
        $(this).parent().submit();
    });

    $('.load-more').on('click', function () {
        var button = $(this);
        var filter = button.data('filter');
        var get_id = button.data('id');
        var item_div = $('.item-div');
        var offset = button.data('offset');
        var type = button.data('type');

        $.ajax({
            beforeSend: function () {
                button.hide();
            },
            url: '/' + type + '/more?offset=' + offset + '&id=' + get_id + '&filter=' + filter,
            success: function (data) {
                item_div.append(data);
                $.ajax({
                    dataType: 'json',
                    url: '/' + type + '/check?offset=' + offset + '&id=' + get_id + '&filter=' + filter,
                    success: function (data) {
                        if (true === data.remove) {
                            button.remove();
                        } else {
                            button.data('offset', data.offset);
                            button.show();
                        }
                    }
                });
            }
        });
    });
});