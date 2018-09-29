$(document).ready(function ($) {
    $('#sort-table').rowSorter({
        handler: '.sorter',
        onDrop: function (tbody, row, new_index, old_index) {
            var item_id = $(row).data('id');
            var controller_name = $(row).data('controller');
            $.ajax({
                url: '/' + controller_name + '/order/' + item_id + '/?order_new=' + new_index + '&order_old=' + old_index
            });
        }
    });

    $('.sort-table').rowSorter({
        handler: '.sorter',
        onDrop: function (tbody, row, new_index, old_index) {
            var item_id = $(row).data('id');
            var controller_name = $(row).data('controller');
            $.ajax({
                url: '/' + controller_name + '/order/' + item_id + '/?order_new=' + new_index + '&order_old=' + old_index
            });
        }
    });

    var datetimepicker1 = $('#datetimepicker1');
    if (datetimepicker1.length) {
        datetimepicker1.datetimepicker({
            locale: 'ru',
            date: moment.unix($('.date-td').data('time')),
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down",
                previous: 'fa fa-angle-left',
                next: 'fa fa-angle-right',
                today: 'fa fa-crosshairs',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });
    }

    CGridViewAfterAjax();

    $('.order-status').on('change', function () {
        var item_id = $(this).data('order');
        var status = $(this).val();
        $.ajax({
            url: '/admin/order/status/' + item_id + '?status=' + status,
        });
    });
    
    $(document).on('click', '.order-product-delete', function () {
        $(this).parent().parent().remove();
    });

    $('.order-product-add').on('click', function () {
        var rows = $('.order-product-table').find('tr');
        var lastRow = rows[rows.length-1];
        var lastKey = $(lastRow).data('key');
        lastKey++;
        var html = '<tr data-key="' + lastKey + '"><td class="col-lg-3">' +
            $('.order-product-select-div').html() +
            '</td>' +
            '<td>' +
            '<input class="form-control" type="text" value="1" name="Product[0][quantity]" id="Product_0_quantity">' +
            '</td>' +
            '<td><a href="javascript:" class="order-product-delete">Удалить</a></td></tr>';
        html = html.replace("Product[0]", "Product[" + lastKey + "]");
        html = html.replace("Product[0]", "Product[" + lastKey + "]");
        html = html.replace("Product_0", "Product_" + lastKey);
        html = html.replace("Product_0", "Product_" + lastKey);
        console.log(html);
        $(lastRow).after(html)
    });
});

function status_change() {
    $('.status').on('change', function () {
        var item_id = $(this).data('id');
        var controller_name = $(this).closest('tr').data('controller');
        $.ajax({
            url: '/' + controller_name + '/status/' + item_id,
        });
    });
}

function toogle_on() {
    $(function () {
        $('input:checkbox[data-toggle="toggle"]').bootstrapToggle();
    });
}

function filter_css_class() {
    $('.filters input').addClass('form-control');
    $('.filters select').addClass('form-control');
}

function CGridViewAfterAjax() {
    status_change();
    toogle_on();
    filter_css_class();
}