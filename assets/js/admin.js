/*global jQuery, document, window, wp, _wpMediaViewsL10n, file_frame, beacon_vars*/
jQuery(document).ready(function ($) {
    'use strict';

    // Icon isn't valid for modals!
    $('select[name="beacon_settings[display_type]"]').change(function () {
        var selectedItem = $('select[name="beacon_settings[display_type]"] option:selected');

        if (selectedItem.val() === 'popover') {
            $('select[name="beacon_settings[icon]"]').closest('tr').css('display', 'table-row');
        } else {
            $('select[name="beacon_settings[icon]"]').closest('tr').css('display', 'none');
        }
    }).change();
});
