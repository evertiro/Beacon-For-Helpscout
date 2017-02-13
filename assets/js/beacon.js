/*global jQuery, document, window, wp, _wpMediaViewsL10n, file_frame, beacon_vars*/
jQuery(document).ready(function ($) {
    'use strict';

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
                baseUrl: "https://" + beacon_vars.subdomain + ".helpscoutdocs.com/"
            },
            contact: {
                enabled: beacon_vars.enable_contact,
                formId: beacon_vars.form_id
            }
        };

        var r = e.getElementsByTagName("script")[0], c = e.createElement("script");
        c.type = "text/javascript", c.async = !0, c.src = "https://djtflbt20bdde.cloudfront.net/", r.parentNode.insertBefore(c, r)
    }(document, window.HSCW || {}, window.HS || {});

    if (beacon_vars.modal === 'true') {
        beacon_vars.modal = true;
    } else {
        beacon_vars.modal = false;
    }

    // Return the Topics as Object array
    function return_topics(settingValue) {
      var topic_obj = JSON.parse(settingValue),
          topic_array = [];

      for (var key in topic_obj){
          var val = key,
              label = topic_obj[key];
          topic_array.push({val: val, label: label});
      };

      return topic_array;
    };

    HS.beacon.config({
    	modal: beacon_vars.modal,
    	poweredBy: beacon_vars.powered_by,
        color: beacon_vars.default_color,
        icon: beacon_vars.icon,
        topArticles: beacon_vars.top_articles,
        attachment: beacon_vars.attachment,
        instructions: beacon_vars.instructions,
        translation: {
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
            topicLabel: beacon_vars.topic_label,
            topicError: beacon_vars.topic_error,
            subjectLabel: beacon_vars.subject_label,
            subjectError: beacon_vars.subject_error,
            messageLabel: beacon_vars.message_label,
            messageError: beacon_vars.message_error,
            sendLabel: beacon_vars.send_label,
            contactSuccessLabel: beacon_vars.success_label,
            contactSuccessDescription: beacon_vars.success_desc
        },
        topics: return_topics(beacon_vars.topic_list)
    });

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

    HS.beacon.ready(function() {
        if ( beacon_vars.position === 'bl' ) {
            $('#hs-beacon').addClass('beacon-bottom-left');
        }
    });
});
