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

    $('.plus').on('click', function () {
        var input_value = $(this).parent().find('.score').val();
        input_value = parseInt(input_value);
        input_value--;
        $(this).parent().find('.score').val(input_value);
    });

    $('.minus').on('click', function () {
        var input_value = $(this).parent().find('.score').val();
        input_value = parseInt(input_value);
        input_value++;
        $(this).parent().find('.score').val(input_value);
    });

    $('.add-to-cart').on('click', function () {
        var input_element = $(this).parent().parent().find('.score');
        var product_id = input_element.data('product');
        var quantity = input_element.val();
        $.ajax({
            data: {product_id: product_id, quantity: quantity},
            dataType: 'json',
            method: 'get',
            url: '/cart/add',
            success: function (data) {
                if ('success' === data.status) {
                    $('.cart-total-price').html(data.price + ' грн');
                    $('.cart-total-count').html(data.count + ' тов');
                }
            }
        });
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    });

    $('.to-order').on('click', function () {
        $('html,body').animate({scrollTop: $('.lk-bottom__name').offset().top}, 'slow');
    });

    $('.checkboxes input').on('change', function () {
        $(this).closest('form').submit();
    });

    if ($('#link-success-forget').length) {
        $('#link-success-forget').trigger('click');
    }

    if ($('#link-success-order').length) {
        $('#link-success-order').trigger('click');
    }

    if ($('#link-success-signup').length) {
        $('#link-success-signup').trigger('click');
    }

    if ($('#link-success-review').length) {
        $('#link-success-review').trigger('click');
    }

    if ($('#link-success-feedback').length) {
        $('#link-success-feedback').trigger('click');
    }
});