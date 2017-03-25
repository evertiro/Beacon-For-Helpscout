/*global jQuery, document*/
jQuery(document).ready(function ($) {
    'use strict';

    // Icon and position valid for modals!
    $('select[name="beacon_settings[display_type]"]').change(function () {
        var selectedItem = $('select[name="beacon_settings[display_type]"] option:selected');

        if (selectedItem.val() === 'popover') {
            $('select[name="beacon_settings[display_type]"]').closest('tr').next('tr').fadeIn('fast').css('display', 'table-row');
            $('select[name="beacon_settings[icon]"]').closest('tr').fadeIn('fast').css('display', 'table-row');
            $('select[name="beacon_settings[position]"]').closest('tr').fadeIn('fast').css('display', 'table-row');
        } else {
            $('select[name="beacon_settings[display_type]"]').closest('tr').next('tr').fadeOut('fast', function () {
                $(this).css('display', 'none');
            });
            $('select[name="beacon_settings[icon]"]').closest('tr').fadeOut('fast', function () {
                $(this).css('display', 'none');
            });
            $('select[name="beacon_settings[position]"]').closest('tr').fadeOut('fast', function () {
                $(this).css('display', 'none');
            });
        }
    }).change();

    $('input[name="beacon_settings[enable_docs]"]').change(function () {
        if ($(this).prop('checked')) {
            $('input[name="beacon_settings[collection]"]').closest('tr').fadeIn('fast').css('display', 'table-row');
        } else {
            $('input[name="beacon_settings[collection]"]').closest('tr').fadeOut('fast', function () {
                $(this).css('display', 'none');
            });
        }
    }).change();
});
