/*global jQuery, document, window, HS, beacon_vars*/
jQuery(document).ready(function ($) {
    'use strict';

    /**
     * Beacon init
     */
    var Beacon_Setup = {
        init : function() {
            this.register();
            this.config();
            this.processTriggers();
        },
        register : function() {
            // Register beacon, ported from official Beacon embed code
            ! function(e, o, n) {
                window.HSCW = o, window.HS = n, n.beacon = n.beacon || {};
                var t = n.beacon;

                t.userConfig = {}, t.readyQueue = [], t.config = function(e) {
                    this.userConfig = e;
                }, t.ready = function(e) {
                    this.readyQueue.push(e);
                }, o.config = {
                    docs: {
                        enabled: beacon_vars.enable_docs,
                        baseUrl: 'https://' + beacon_vars.subdomain + '.helpscoutdocs.com/'
                    },
                    contact: {
                        enabled: beacon_vars.enable_contact,
                        formId: beacon_vars.form_id
                    }
                };

                var r = e.getElementsByTagName('script')[0], c = e.createElement('script');
                c.type = 'text/javascript', c.async = !0, c.src = 'https://djtflbt20bdde.cloudfront.net/', r.parentNode.insertBefore(c, r);
            }(document, window.HSCW || {}, window.HS || {});
        },
        config : function() {
            HS.beacon.config({
                modal: beacon_vars.modal === 'true' ? true : false,
                collection: beacon_vars.collection,
                poweredBy: beacon_vars.powered_by,
                color: beacon_vars.default_color,
                icon: beacon_vars.icon,
                position: beacon_vars.position,
                zIndex: parseInt(beacon_vars.zindex),
                topArticles: beacon_vars.top_articles,
                showName: beacon_vars.show_name,
                showSubject: beacon_vars.show_subject,
                showContactFields: beacon_vars.show_contact_fields === 'true' ? true : false,
                attachment: beacon_vars.attachment,
                instructions: beacon_vars.instructions,
                translation: {
                    searchLabel: beacon_vars.search_label,
                    searchErrorLabel: beacon_vars.search_error_label,
                    noResultsLabel: beacon_vars.no_results_label,
                    contactLabel: beacon_vars.contact_label,
                    attachFileLabel: beacon_vars.attach_file_label,
                    attachFileError: beacon_vars.attach_file_error,
                    fileExtensionError: beacon_vars.file_extension_error,
                    nameLabel: beacon_vars.name_label,
                    nameError: beacon_vars.name_error,
                    emailLabel: beacon_vars.email_label,
                    emailError: beacon_vars.email_error,
                    topicLabel: beacon_vars.topic_label,
                    topicError: beacon_vars.topic_error,
                    subjectLabel: beacon_vars.subject_label,
                    subjectError: beacon_vars.subject_error,
                    messageLabel: beacon_vars.message_label,
                    messageError: beacon_vars.message_error,
                    sendLabel: beacon_vars.send_label,
                    contactSuccessLabel: beacon_vars.success_label,
                    contactSuccessDescription: beacon_vars.success_desc
                }
            });


            HS.beacon.ready(function () {
                // http://developer.helpscout.net/beacons/javascript-api/#identify
                HS.beacon.identify({
                    name: beacon_vars.user_name,
                    email: beacon_vars.user_email
                });

                // http://developer.helpscout.net/beacons/javascript-api/#prefill
                //HS.beacon.prefill({});
            });
        },
        processTriggers : function () {
            // ID-based triggers
            $('#beacon-open').click(function(e) {
                e.preventDefault();
                HS.beacon.open();
            });
            $('#beacon-close').click(function(e) {
                e.preventDefault();
                HS.beacon.close();
            });
            $('#beacon-toggle').click(function(e) {
                e.preventDefault();
                HS.beacon.toggle();
            });

            // Class-based triggers
            $('.beacon-open').click(function(e) {
                e.preventDefault();
                HS.beacon.open();
            });
            $('.beacon-close').click(function(e) {
                e.preventDefault();
                HS.beacon.close();
            });
            $('.beacon-toggle').click(function(e) {
                e.preventDefault();
                HS.beacon.toggle();
            });
            $('.beacon-article-link').click(function(e) {
                e.preventDefault();
            });

            // Core modal trigger
            if ( beacon_vars.modal === 'true' ) {
                $('.show-beacon.menu-item a').click(function(e) {
                    e.preventDefault();

                    HS.beacon.open();
                });

                $('.show-beacon').click(function(e) {
                    e.preventDefault();

                    HS.beacon.open();
                });
            }
        }
    };
    Beacon_Setup.init();
});
