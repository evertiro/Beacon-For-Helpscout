/*global jQuery, document, window, wp, _wpMediaViewsL10n, file_frame, beacon_vars*/
jQuery(document).ready(function ($) {
    'use strict';

    var contact, docs;

    // Help Scout Beacon
    ! function(e, o, n) {
        window.HSCW = o, window.HS = n, n.beacon = n.beacon || {};
        var t = n.beacon;

        t.userConfig = {}, t.readyQueue = [], t.config = function(e) {
            this.userConfig = e
        }, t.ready = function(e) {
            this.readyQueue.push(e)
        }, o.config = {
            docs: {
                enabled: beacon_vars.enable_docs,
                baseUrl: "http://" + beacon_vars.subdomain + ".helpscoutdocs.com/"
            },
            contact: {
                enabled: beacon_vars.enable_contact,
                formId: beacon_vars.form_id
            }
        };

        var r = e.getElementsByTagName("script")[0], c = e.createElement("script");
        c.type = "text/javascript", c.async = !0, c.src = "https://djtflbt20bdde.cloudfront.net/", r.parentNode.insertBefore(c, r)
    }(document, window.HSCW || {}, window.HS || {});

    HS.beacon.config({
        color: beacon_vars.default_color,
        icon: beacon_vars.icon,
        topArticles: beacon_vars.top_articles,
        attachment: beacon_vars.attachment,
        instructions: beacon_vars.instructions,
        /*translation: {
            searchLabel: beacon_vars.search_label,
            searchErrorLabel: beacon_vars.search_error_label,
            noResultsLabel: beacon_vars.no_results_label,
            contactLabel: beacon_vars.contact_label,
            attachFileLabel: beacon_vars.attach_file_label,
            attachFileError: beacon_vars.attach_file_error,
            nameLabel: beacon_vars.name_label,
            nameError: beacon_vars.name_error,
            emailLabel: beacon_vars.email_label,
            emailError: beacon_vars.email_error,
            subjectLabel: beacon_vars.subject_label,
            subjectError: beacon_vars.subject_error,
            messageLabel: beacon_vars.message_label,
            messageError: beacon_vars.message_error,
            contactSuccessLabel: beacon_vars.success_label,
            contactSuccessDescription: beacon_vars.success_desc
        }*/
    });
});
