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