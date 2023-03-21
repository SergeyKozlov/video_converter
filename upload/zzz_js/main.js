/*
 * jQuery File Upload Plugin JS Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/* global $, window */

$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        //url: 'server/php/'
        url: 'https://api.vide.me/upload/'
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );
    //var formData = $('form').serializeArray();
    var formData = $(this).serializeArray();
    //if (window.location.hostname === 'blueimp.github.io') {
    if (window.location.hostname === 'api.vide.me') {
            // Demo settings:
        $('#fileupload').fileupload('option', {
            //formData: formData,
            //=== formData: {subject: 'testSubject'},
            //url: '//jquery-file-upload.appspot.com/',
            url: 'https://api.vide.me/upload/',
            // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
            //==maxFileSize: 999000,
            //maxFileSize: 19999000,
            //maxFileSize: 100000000,
            maxFileSize: 250000000,
            //acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
            //acceptFileTypes: /(\.|\/)(mp4|3gp|mkv)$/i
            acceptFileTypes: /(\.|\/)(mp4|3gp|mkv|webm|flv|mpg|mpeg|wmf|avi|mov|vob|rm|rmvb)$/i
        });
        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                //url: '//jquery-file-upload.appspot.com/',
                url: 'https://api.vide.me/upload/',
                type: 'HEAD'
            }).fail(function () {
                $('<div class="alert alert-danger"/>')
                    .text('Upload server currently unavailable - ' +
                            new Date())
                    .appendTo('#fileupload');
            });
        }
    } else {
        // Load existing files:
        $('#fileupload').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: $('#fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done')
                .call(this, $.Event('done'), {result: result});
        });
    }

});
