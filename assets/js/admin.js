/*global jQuery, document*/
jQuery(document).ready(function ($) {
    'use strict';

    // Icon and position valid for modals!
    $('select[name="beacon_settings[display_type]"]').change(function () {
        var selectedItem = $('select[name="beacon_settings[display_type]"] option:selected');

        if (selectedItem.val() === 'popover') {
            $('select[name="beacon_settings[icon]"]').closest('tr').css('display', 'table-row');
            $('select[name="beacon_settings[position]"]').closest('tr').css('display', 'table-row');
        } else {
            $('select[name="beacon_settings[icon]"]').closest('tr').css('display', 'none');
            $('select[name="beacon_settings[position]"]').closest('tr').css('display', 'none');
        }
    }).change();
});
