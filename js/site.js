jQuery(document).ready(function ($) {
    $('#language-select').on('selectmenuselect', function () {
        $(this).parent().submit();
    });
});