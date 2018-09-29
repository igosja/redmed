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
        var language = $('#language-select').val();

        $.ajax({
            beforeSend: function () {
                button.hide();
            },
            url: '/' + type + '/more?language' + language +'&offset=' + offset + '&id=' + get_id + '&filter=' + filter,
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
        if (input_value < 1) {
            input_value = 1;
        }
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

    $('.add-to-cart-on-page').on('click', function () {
        var product_id = $(this).data('product');
        var scroll = $(this).hasClass('cart-fix__btn');
        $.ajax({
            data: {product_id: product_id, quantity: 1, language: $('#language-select').val()},
            dataType: 'json',
            method: 'get',
            url: '/cart/addonpage',
            success: function (data) {
                if ('success' === data.status) {
                    if (data.count > 0) {
                        $('.cart-fix__btn').show();
                    } else {
                        $('.cart-fix__btn').hide()
                    }
                    if (1 == data.count && 0 != product_id) {
                        $('.cart-fix__btn').trigger('click');
                    } else {
                        $('.form-buy-product-list').html(data.list);
                        $('.form-buy-total-price').html(data.price);
                    }
                    if (scroll) {
                        $('html, body').animate({scrollTop: $('.sitewrap').offset().top}, 1000);
                    }
                    $('#order-popup-form').find('.e-form__submit').prop('disabled', false);
                }
            }
        });
    });

    $(document).on('click', '.on-page-plus', function () {
        var input_value = $(this).parent().find('.score').val();
        input_value = parseInt(input_value);
        input_value--;
        if (input_value < 1) {
            input_value = 1;
        }
        $(this).parent().find('.score').val(input_value);
        product_id = $(this).data('product');
        change_on_page_quantity(product_id, input_value);
    });

    $(document).on('click', '.on-page-minus', function () {
        var input_value = $(this).parent().find('.score').val();
        input_value = parseInt(input_value);
        input_value++;
        $(this).parent().find('.score').val(input_value);
        var product_id = $(this).data('product');
        change_on_page_quantity(product_id, input_value);
    });

    $(document).on('change', '.on-page-quantity', function () {
        if ($(this).val() < 0) {
            $(this).val(1);
        }
        var product_id = $(this).data('product');
        var quantity = $(this).val();
        change_on_page_quantity(product_id, quantity);
    });

    $(document).on('click', '.form-buy__item__del', function () {
        var product_id = $(this).data('product');
        change_on_page_quantity(product_id, 0);
        $(this).parent().remove();
        if (0 === $(document).find('.form-buy__item__del').length) {
            $('#order-popup-form').find('.e-form__submit').prop('disabled', true);
        }
    });

    $('.to-order').on('click', function () {
        $('html,body').animate({scrollTop: $('.lk-bottom__name').offset().top}, 'slow');
    });

    $('.checkboxes input').on('change', function () {
        var data = $('#filter-form').serialize();
        $.ajax({
            data: data,
            method: 'get',
            url: window.location.pathname,
            success: function (data) {
                $('.cat-r').html(data);
            },
            complete: function () {
                setTimeout(function () {
                    $(document).find(".b-mhalf__i").matchHeight();
                    $(document).find(".art__i").matchHeight();
                    $(document).find(".cat-i").matchHeight();
                    $(document).find(".lk-m-item").matchHeight();
                    $(document).find(".don-three__i").matchHeight();
                    $(document).find(".m-cat__i").matchHeight();
                    $(document).find(".m-cat__i__title").matchHeight();
                }, 100);
            }
        });
        window.history.pushState(null, null, window.location.pathname + '?' + $('#filter-form').serialize());
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

    if ($('#link-error-forget').length) {
        $('#link-error-forget').trigger('click');
    }

    $('.prod-video').on('click', function() {
        $('.form-video iframe').attr('src', 'https://www.youtube.com/embed/' + $(this).data('video'));
    });

    $('.form-buy-more-btn').on('click', function () {
        $('.of-form').stop().fadeOut();
        $('.overlay-forms').stop().fadeOut();
    });

    var error_messages = $('.errorMessage');
    for (var i = 0; i < error_messages.length; i++) {
        if ('' !== $(error_messages[i]).html()) {
            var form_id = $(error_messages[i]).closest('form').attr('id');
            if ('order-popup-form' === form_id) {
                setTimeout(function() {
                    $('.cart-fix__btn').trigger('click');
                }, 1000);
                break;
            }
        }
    }
});

function change_on_page_quantity (product_id, quantity) {
    $.ajax({
        data: {product_id: product_id, quantity: quantity},
        dataType: 'json',
        method: 'get',
        url: '/cart/change',
        success: function (data) {
            if ('success' === data.status) {
                $('.form-buy-total-price').html(data.price);
                $(document).find('.cart-price-div-' + data.product_id).html(data.product_price + ' грн.');
            }
        }
    });
}