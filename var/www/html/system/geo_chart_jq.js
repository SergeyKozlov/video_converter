console.log("geo_chart_jq.js");

(function ($) {
//    var authorized = false;


    /***************************************************************************
     v2 get chart pop states
     ***************************************************************************/
    $.fn.showChartPopStates = function (options) { // 27072022
        //console.log("$.fn.showRelation -----> ok");
        showChartPopStatesSettings = $.extend({
            showChartPopStatesId: "videme-chart-pop-states-place"
        }, options);
        //var placeId = "videme-share-item";
        //placeId = showChartShareItemSettings.showChartShareItemId;
        if ($(this).length) {
            //console.log("$.fn.showRelation $(this) -----> yes " + $(this).length);
            //var tempObject = $(this);
            //var placeId = $(this).attr('id');
            var tempObject = $(this);
        } else {
            //console.log("$.fn.showRelation $(this) -----> nooo! " + $(this).length);
            var tempObject = $('#' + showChartPopStatesSettings.showChartPopStatesId);
            //var placeId = showChartPopStatesSettings.showChartPopStatesId;
        }
        //console.log("$.fn.showRelation tempObject -----> " + tempObject.length);
        tempObject.html(VidemeProgress);
        //$('.videme-media-info').showItemCard({'item_id': showChartPopStatesSettings.item});

        //$.getJSON("https://insight.vide.me/v2/chart/item/pop_states/?" + $.param(showChartPopStatesSettings) + "&videmecallback=?",
        $.getJSON("/v2/chart/item/pop_states/?" + $.param(showChartPopStatesSettings) + "&videmecallback=?",
            function (data) {
                //console.log("$.fn.showChartPopStates data -----> " + JSON.stringify(data));
                if (!$.isEmptyObject(data)) {
                    tempObject.html(showChartPopStates(data, showChartPopStatesSettings));
                } else {
                    console.warn("$.fn.showChartPopStates data -----> no");
                    //tempObject.html("No friends");
                    tempObject.html("");
                }
            })
            .done(function (data) {
            })
            .fail(function (data) {
                tempObject.html(showError(data));
            })
            .always(function () {
            });
    };

    /***************************************************************************
     v2 Chart Share item
     ***************************************************************************/
    $.fn.showChartShareItem = function (options) { // 27072022
        console.log("$.fn.showChartShareItem -----> ok");
        showChartShareItemSettings = $.extend({
            showChartShareItemId: "videme-item-chart-canvas_"
        }, options);
        //var placeId = "videme-share-item";
        //placeId = showChartShareItemSettings.showChartShareItemId;
        if ($(this).length) {
            //console.log("$.fn.showRelation $(this) -----> yes " + $(this).length);
            //var tempObject = $(this);
            var placeId = $(this).attr('id');
            var tempObject = $(this);
        } else {
            //console.log("$.fn.showRelation $(this) -----> nooo! " + $(this).length);
            var tempObject = $('#' + showChartShareItemSettings.showChartShareItemId);
            var placeId = showChartShareItemSettings.showChartShareItemId;
        }
        //console.log("$.fn.showRelation tempObject -----> " + tempObject.length);
        tempObject.html(VidemeProgress);
        //$('.videme-media-info').showItemCard({'item_id': showChartShareItemSettings.item});
        //$.getJSON("https://insight.vide.me/v2/chart/item/?" + $.param(showChartShareItemSettings) + "&videmecallback=?",
        $.getJSON("/v2/chart/item/?" + $.param(showChartShareItemSettings) + "&videmecallback=?",
            function (data) {
                console.log("$.fn.showChartShareItem data -----> " + JSON.stringify(data));
                if (!$.isEmptyObject(data)) {
                    $('#' + showChartShareItemSettings.showChartShareItemId).remove();
                    $('#videme-item-chart-canvas-place_' + showChartShareItemSettings.item).append('<canvas id="videme-item-chart-canvas_' + showChartShareItemSettings.item + '"></canvas>');
                    showChartItem(data, placeId);
                    //$('#videme-item-chart-canvas-share-place').html(chartButtonComposition(item_id));
                } else {
                    $('#' + showChartShareItemSettings.showChartShareItemId).remove();
                    $('#videme-item-chart-canvas-place_' + showChartShareItemSettings.item).html('No data...');
                }
            })
            .done(function (data) {
            })
            .fail(function (data) {
                tempObject.html(showError(data));
            })
            .always(function () {
            });
    };
    $.fn.showRunChartUpdate = function (options) {
        console.log("$.fn.showRunChartUpdate -----> run");
        showChartShareItemSettings = $.extend({
            item_id: "d941a70e91f5"
        }, options);
        //var placeId = "videme-share-item";
        //placeId = showChartShareItemSettings.showChartShareItemId;
        if ($(this).length) {
            //console.log("$.fn.showRelation $(this) -----> yes " + $(this).length);
            //var tempObject = $(this);
            var placeId = $(this).attr('id');
            var tempObject = $(this);
        } else {
            //console.log("$.fn.showRelation $(this) -----> nooo! " + $(this).length);
            var tempObject = $('#' + showChartShareItemSettings.showChartShareItemId);
            var placeId = showChartShareItemSettings.showChartShareItemId;
        }
        //console.log("$.fn.showRelation tempObject -----> " + tempObject.length);
        tempObject.html(VidemeProgress);
        //$('.videme-media-info').showItemCard({'item_id': showChartShareItemSettings.item});
        //$.getJSON("https://insight.vide.me/v2/chart/item/?" + $.param(showChartShareItemSettings) + "&videmecallback=?",
        $('.geo_chart_progress').html(VidemeProgress);

        $.getJSON("/system/cm/tm_action/?" + $.param(showChartShareItemSettings) + "&videmecallback=?",
            function (data) {
                //console.log("$.fn.showRelation data -----> " + data);
                if (!$.isEmptyObject(data)) {
                    $('#chart_result').val(JSON.stringify(data.staff));
                    $('#chart_next').removeClass('hidden')
                        .attr('item_id', data.next_item_info.item_id)
                        .attr('title', data.next_item_info.title)
                        .attr('content', data.next_item_info.content)
                        .html('Next');
                    //$('#chart_run').removeClass('hidden');
                    $('.geo_chart_progress').empty();
                    $('#chart_run').addClass('hidden');

                    var item_id = showChartShareItemSettings.item_id;

                    $('#videme-item-chart-canvas-share-place').html(chartButtonComposition(item_id));

                    $('.videme-item-chart-canvas-place').attr('id', 'videme-item-chart-canvas-place_' + item_id);

                    $('#videme-item-chart-canvas_' + item_id).showChartShareItem({
                        showChartShareItemId: 'videme-item-chart-canvas_' + item_id,
                        item: item_id,
                        m_stop: 1,
                    });
                    $.fn.showChartPopStates({
                        item: item_id,
                        showChartPopStatesId: 'videme-chart-pop-states-place_' + item_id
                    });
                } else {
                    $('#' + showChartShareItemSettings.showChartShareItemId).remove();
                    $('#chart_result').val('No data...');
                }
            })
            .done(function (data) {
            })
            .fail(function (data) {
                tempObject.html(showError(data));
            })
            .always(function () {
            });
    };


    /*$(document).on('click', 'button.get-chart-fake', function (event) {
        console.log("button.chart_item_mel_toggle -----> click");
        event.preventDefault();
        let $this = $(this);
        let item_id = $this.attr('item_id');
        var toggled = $('#videme-chart-stump_' + item_id).attr('toggled');
        //if ($.isEmptyObject(toggled) || toggled == 'true') {
            $('#videme-chart-stump_' + item_id).attr('toggled', 'true');
            $('#videme-chart-button-1st1months_' + item_id).removeClass('text-bg-secondary').addClass('text-bg-primary');
            $('#videme-chart-stump_' + item_id).attr('time_shift_type', 'm_stop').attr('time_shift_val', '1');
            $.fn.showChartShareItem_fake({
                item: item_id,
                //showChartShareItemId: 'videme-item-chart-canvas_' + item_id,
                //showChartShareItemId: 'videme-item-chart-canvas-fake_' + item_id,
                showChartShareItemId: 'videme-item-chart-canvas-place-fake_' + item_id,
                m_stop: '1'
            });
            $.fn.showChartPopStates({
                item: item_id,
                showChartPopStatesId: 'videme-chart-pop-states-place_' + item_id
            });
        //}
    });*/


    function getParameterByName(name, url) { // 02082022
        console.log('videme_func1.js function getParameterByName name: ' + name);
        /*if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));*/
        /*https://stackoverflow.com/questions/5237725/take-a-url-variable-with-regex*/
        if (typeof (url) === 'undefined')
            url = window.location.href;
        var match = url.match('[?&]' + name + '=([^&]+)');
        return match ? match[1] : null;
    }

    $.fn.showMyTaskActiveOnly = function (options) { // 26072022 // TODO: remove
        showMyTaskActiveOnlySettings = $.extend({
            limit: 6,
            showcaseMyTask: "#videme-my-task"
        }, options);
        if ($(this).length) {
            console.log("$.fn.showMyTaskActiveOnly $(this) -----> yes " + $(this).length);
            var tempObject = $(this);
        } else {
            console.log("$.fn.showMyTaskActiveOnly $(this) -----> nooo! " + $(this).length);
            var tempObject = $(showMyTaskActiveOnlySettings.showcaseMyTask);
        }
        //if ($.cookie('videme_last_upload')) {
        //tempObject.html(VidemeProgress);
        var li = 1;
        var win = $(window);
        var getItemOpt = [];
        var offset = 0;
        //var limit = 4;
        var limit = showMyTaskActiveOnlySettings.limit;
        //var itemsData = true;
        var id_list_group = 'list-group_' + Math.floor(Math.random() * 100);
        //tempObject.html("<ul class='list-group' id='" + id_list_group + "'></ul>");
        //tempObject.append("<ul class='list-group' id='" + id_list_group + "'></ul><i class=\"videme_tile_loading fa fa-circle-o-notch fa-spin hidden\"></i>");
        //$.getJSON("https://api.vide.me/upload/getmytask/?limit=" + showMyTaskActiveOnlySettings.limit + "&videmecallback=?",

        videmeUI.doGetJSONTileV3(emptyItemsData,
            "/upload/getmytask/?limit=" + showMyTaskActiveOnlySettings.limit + "&videmecallback=?",
            id_list_group,
            //'videme-v3-my-item-url',
            'showmulti',
            offset,
            tempObject);
        offset = offset + limit;

    };

    $.fn.showMyTaskById = function (options) { // TODO: why??? // 26072022
        showMyTaskByIdSettings = $.extend({
            limit: 6,
            showcaseMyTask: ".videme_last_task_icon"
        }, options);
        if ($(this).length) {
            //console.log("$.fn.showMyTask $(this) -----> yes " + $(this).length);
            var tempObject = $(this);
        } else {
            //console.log("$.fn.showMyTask $(this) -----> nooo! " + $(this).length);
            var tempObject = $(showMyTaskByIdSettings.showcaseMyTask);
        }
        //$('.videme_nav_badge_last_upload').html('?');
        console.log("$.fn.showMyTaskById showMyTaskByIdSettings.task_id -----> ", showMyTaskByIdSettings.task_id);
        if ($.cookie('videme_last_upload')) {

            $.getJSON("https://api.vide.me/upload/get_task_status/?task_id=" + showMyTaskByIdSettings.task_id + "&videmecallback=?",
                function (data) {
                    //console.log("$.fn.showMyTask -----> typeof " + typeof data);
                    if (!$.isEmptyObject(data)) {
                        console.log("$.fn.showMyTaskById data.task_id -----> " + data.task_id);
                        console.log("$.fn.showMyTaskById data.task_type -----> " + data.task_type);
                        console.log("$.fn.showMyTaskById data.task_status -----> " + data.task_status);
                        //$('.videme-browse-media-button').attr('disabled', true); // <--------------------------- 1 upload
                        //$('.videme-file-input').attr('disabled', true); // <--------------------------- 1 upload
                        /***********************************************************************************************/
                        if (!$.isEmptyObject(data.task_type)) {
                            if (data.task_type == 'fileSendToS3') {
                                if (!$.isEmptyObject(data.task_status)) {
                                    if (data.task_status == 'success') {
                                        console.log("$.fn.showMyTaskById -----> fileSendToS3 success");
                                        cookieLastUploadRemove();
                                        $('#videme-tile').empty();
                                        $('#videme-tile').itemsMyVideosScroll({});
                                        //$('#videme-tile-spring-video').postsOfSpringVideoScroll({});
                                    }
                                }
                            }
                        }
                        /***********************************************************************************************/
                        /*var htmlResult = [];
                        var rowClass;
                        $.each(data, function (key, value) {
                            //console.log("showMyTask value.value.type -----> " + JSON.stringify(value.value.type));
                            //console.log("showMyTask value.value.status -----> " + JSON.stringify(value.value.status));
                            //switch (value.value.type) {
                            switch (value.task_status) {
                                case "awaiting":
                                    rowClass = "active";
                                    break;
                                case "success":
                                    rowClass = "success";
                                    break;
                                case "error":
                                    rowClass = "danger";
                                    break;
                                default:
                                    rowClass = "";
                            }
                            htmlResult.push("\
                        <tr class=\"" + rowClass + "\">\
                            <td>" + value['created_at'] + "</td>\
                            <td>" + value['task_status'] + "</td>\
                            <!--<td>" + value['file_size_start'] + "</td>\
                            <td>" + value['file_size_done'] + "</td>\
                            <td>" + value['file'] + "</td>-->\
                            <td>" + value['title'] + "</td>\
                            <td>" + value['content'] + "</td>\
                            <td>" + sec2str(value['video_duration']) + "</td>\
                        </tr>")
                        });*/
                        //console.log("showMyTask value -----> html" + "<table>" + htmlResult.join("") + "</table>");
                        //console.log('showMyTask data.0 --->', JSON.stringify(data[0]));
                        /*if (!$.isEmptyObject(data[0].task_type) && data[0].task_type == 'fileUploadVideoTest') {
                            document.title = data[0].percentage + ' % ' + data[0].title;
                        }*/
                        /*var db = (
                            showTileTasks(parseMyTaskForDoorbellSign(data), tempObject)
                        );*/
                        /*tempObject.html("<table class=\"table\" >\
                                    <tr class=\"\">\
                            <td>created_at</td>\
                            <td>status</td>\
                            <!--<td>fileSizeStart</td>\
                            <td>fileSizeDone</td>\
                            <td>file</td>-->\
                            <td>subject</td>\
                            <td>message</td>\
                            <td>videoDuration</td>\
                        </tr>" + htmlResult.join("") + "</table> " +
                            db);*/

                        /***********************************************************************************************/
                        var percentage = 0;
                        if (!$.isEmptyObject(data.task_status)) {
                            $('.videme_nav_badge_last_upload').html('+1');
                        }
                        if (!$.isEmptyObject(data.percentage)) {
                            //console.log("$.fn.showMyTaskById data.percentage -----> ", data.percentage);

                            if (data.percentage > 0) {

                                $('#videme_upload_progress')
                                    .addClass('bg-success')
                                    .addClass('progress-bar-striped')
                                    .addClass('progress-bar-animated');

                                percentage = data.percentage;
                                if (data.percentage > 97) {
                                    percentage = 100;
                                    $('#videme_upload_progress')
                                        .html('Successfully converted')
                                        .removeClass('progress-bar-striped')
                                        .removeClass('progress-bar-animated');
                                    //$('.videme-uploader-status').html('Successfully converted');
                                    document.title = 'Successfully converted ' + $('#title_for_video').val();
                                    //cookieLastUploadRemove();
                                } else {
                                    //$('#videme_upload_progress').html('Converted ' + percentage + '%');
                                    //$('.videme-uploader-status').html('Converted ' + percentage + '%');
                                    document.title = 'Converted ' + percentage + '% ' + $('#title_for_video').val();
                                    //console.log("$.fn.showMyTaskById data.percentage videme_nav_badge_last_upload -----> ", percentage);

                                    $('.videme_nav_badge_last_upload').html(percentage + '%');
                                    //$('.videme-browse-media-button').attr('disabled', true); // <---------
                                    /* *************************************/
                                    //$('#videme_last_upload_li').html(db);
                                    /* *************************************/

                                }
                                $('#videme_upload_progress').css('width', percentage + '%').attr('aria-valuenow', percentage);

                            }
                        } else {
                            //$('#videme_conversion_progress').html('Awaiting conversion');
                            //$('.videme-uploader-status').html('Awaiting conversion');
                            //console.log("$.fn.showMyTaskById data.percentage empty -----> ", data.percentage);
                            //cookieLastUploadRemove();

                        }
                        //$('#videme_upload_progress').css('width', percentage + '%').attr('aria-valuenow', percentage);

                        /*$("#videme_upload_progress")
                            .animate({
                                "value": data.percentage + "%"
                            }, {
                                duration: 600,
                                easing: 'linear'
                            });*/
                        /***********************************************************************************************/
                        var videme_last_task = [];
                        //var videme_last_task = {};
                        //videme_last_task.push = data;
                        videme_last_task.push(data);
                        //videme_last_task[0] = data;

                        //tempObject.html(showIconForTask(paddingUserInfo(parseMyTaskForDoorbellSign(videme_last_task))));
                        var iconArray = parseMyTaskForDoorbellSign(videme_last_task);
                        var icon = paddingUserInfo(iconArray[0]);
                        //tempObject.html(showIconForTask(parseMyTaskForDoorbellSign(videme_last_task)));
                        //console.log("$.fn.showMyTaskById icon -----> ", JSON.stringify(icon));

                        //tempObject.html(showIconForTask(icon[0]));
                        tempObject.html(showIconForTask(icon)); // TODO: why?
                        //});
                    } else {
                        console.log("$.fn.showMyTaskById data -----> no");
                        //tempObject.html("No results");
                        cookieLastUploadRemove();

                    }
                })
                .done(function (data) {
                })
                .fail(function (data) {
                    tempObject.html(showError(data));
                })
                .always(function () {
                });
        } else {
            console.log("$.fn.showMyTaskById no cookie -----> ");

        }
    };

    /***************************************************************************
     Функции Нотификации
     ***************************************************************************/
    $.fn.processNotification = function (options) {
        //console.log("$.fn.processNotification -----> ok");
        /*processNotificationSettings = $.extend({
            processNotification: "#process_notification",
            videmeProgress: ".videme-progress",
            do: "#do"
        }, options);
        if ($(this).length) {
            //console.log("$.fn.processNotification $(this) -----> yes " + $(this).length);
            var tempObject = $(this);
        } else {
            //console.log("$.fn.processNotification $(this) -----> nooo! " + $(this).length);
            var tempObject = $(processNotificationSettings.processNotification);
        }
        //console.log("$.fn.processNotification tempObject -----> " + tempObject.length);
        $(processNotificationSettings.videmeProgress).html(VidemeProgress);
        $(processNotificationSettings.do).attr("disabled", true);
        tempObject.append();
        if (!tempObject.is('.in')) {
            tempObject.addClass('in');
            setTimeout(function () {
                tempObject.removeClass('in');
            }, 2200);
        }*/
        $('.videme-nav-spinner').removeClass('hidden');
    };

    $.fn.successNotification = function (options) {
        //console.log("$.fn.successNotification -----> ok");
        /*successNotificationSettings = $.extend({
            successNotification: "#success_notification",
            videmeProgress: ".videme-progress",
            do: "#do"
        }, options);
        //console.log("$.fn.successNotification -----> successNotificationSettings: " + JSON.stringify(successNotificationSettings));
        if ($(this).length) {
            //console.log("$.fn.successNotification $(this) -----> yes " + $(this).length);
            var tempObject = $(this);
        } else {
            //console.log("$.fn.successNotification $(this) -----> nooo! " + $(this).length);
            var tempObject = $(successNotificationSettings.successNotification);
        }
        //console.log("$.fn.successNotification tempObject -----> " + tempObject.length);
        //console.log("$.fn.successNotification successNotificationSettings.msg -----> " + successNotificationSettings.msg);
        $(successNotificationSettings.videmeProgress).empty();
        $(successNotificationSettings.do).attr("disabled", false);
        $.fn.lastNotification({
            msg: successNotificationSettings.msg
        });
        //tempObject.append(successNotificationSettings.msg + "<br>");
        tempObject.html(successNotificationSettings.msg + "<br>");
        if (!tempObject.is('.in')) {
            tempObject.addClass('in');
            setTimeout(function () {
                tempObject.removeClass('in');
            }, 3200);
        }*/
        $('.videme-nav-spinner').addClass('hidden');
        $('#videme-toast-success').toast('show');

    };

    $.fn.errorNotification = function (options) {
        //console.log("$.fn.errorNotification -----> ok");
        /*errorNotificationSettings = $.extend({
            successNotification: "#error_notification",
            videmeProgress: ".videme-progress",
            do: "#do"
        }, options);
        if ($(this).length) {
            //console.log("$.fn.errorNotification $(this) -----> yes " + $(this).length);
            var tempObject = $(this);
        } else {
            //console.log("$.fn.errorNotification $(this) -----> nooo! " + $(this).length);
            var tempObject = $(errorNotificationSettings.successNotification);
        }
        //console.log("$.fn.errorNotification tempObject -----> " + tempObject.length);
        $(errorNotificationSettings.videmeProgress).empty();
        $(errorNotificationSettings.do).attr("disabled", false);
        /!*        $.fn.lastNotification({
         msg: errorNotificationSettings.msg
         });*!/
        $.fn.lastNotification({
            msg: "<div class='alert alert-error span3'>Failed from timeout. Please try again later. " + JSON.stringify(errorNotificationSettings.msg) + " <span id='timer'></span> sec.</div><script type='text/javascript'>setTimeout('window.location.reload()', 6000); var t=5; function refr_time(){ if (t>1) { t--;  document.getElementById('timer').innerHTML=t; document.getElementById('timer').style.color = '#FF0000'; } else { document.getElementById('timer').style.color = '#FFA122'; } } var tm=setInterval('refr_time();' ,1000); </script>"
        });
        tempObject.append(JSON.stringify(errorNotificationSettings.msg) + "<br>");
        if (!tempObject.is('.in')) {
            tempObject.addClass('in');
            setTimeout(function () {
                tempObject.removeClass('in');
            }, 3200);
        }*/
        $('.videme-nav-spinner').addClass('hidden');

    };

    $.fn.lastNotification = function (options) {
        //console.log("$.fn.lastNotification -----> ok");
        lastNotificationSettings = $.extend({
            lastNotification: "#videme-result"
        }, options);
        if ($(this).length) {
            //console.log("$.fn.errorNotification $(this) -----> yes " + $(this).length);
            var tempObject = $(this);
        } else {
            //console.log("$.fn.errorNotification $(this) -----> nooo! " + $(this).length);
            var tempObject = $(lastNotificationSettings.lastNotification);
        }
        //console.log("$.fn.errorNotification tempObject -----> " + tempObject.length);
        tempObject.html(lastNotificationSettings.msg);
    };

    var itemsData = true;

    function emptyItemsData(salutation, tempObject) {
        $('.videme_tile_loading').addClass('hidden');
        itemsData = false;
    }

    function emptyItemsDataTrue(salutation, tempObject) {
        $('.videme_tile_loading').addClass('hidden');
    }

    Thing.prototype.doGetJSONTileV3 = function (callback, url, id_list_group, classM, offset, tempObject) { // 26072022
        // Call our callback, but using our own instance as the context
        //callback.call(this, salutation);
        $('.videme_tile_loading').removeClass('hidden');
        var self = $(this); // using self to store $(this)
        if (itemsData !== false) {
            $.getJSON(url,
                function (data) {
                    //console.log("Thing.prototype.doGetJSONTileV3 data -----> url " + url + ' data ' + JSON.stringify(data));
                    //console.log("postsOfSpringVideoOnlyMultiple data -----> " + JSON.stringify(data));
                    //var response_time = Math.round(performance.now() - start_time);
                    //$('#result-response').append('<p><small>' + data.length + ' messages. API response time: ' + response_time + ' milliseconds</small></p>');
                    if (!$.isEmptyObject(data)) {
                        //tempObject.empty();
                        //console.log("Thing.prototype.doGetJSONTileV3 data -----> url " + url + ' data ' + JSON.stringify(data));
                        //tempObject.html(showTileMultiple(parseDataArrayToObject(data), tempObject, "shownext"));
                        //===showTileMultiple(parseDataArrayToObject(data), tempObject, "shownext");
                        //showTileV3(parseDataArrayToObject(data), tempObject, classM, offset);
//                        showTileTestV4(parseDataArrayToObject(data), tempObject, classM, offset);
                        showTileTestV4(tempObject, data);
//                        tempObject.html(itemCardShow(data));
                        //$.fn.showcaseVideoTextButton(paddingButtonMySpring(data[0]));
                    } else {
                        console.log("$.fn.doGetJSONTileV3 data -----> no");
                        //tempObject.html("No results");
                        //$('#' + id_list_group).html("No results");
                        //callback();
                        //callback.call(this, url);
                        callback.call(self, url, tempObject);
                    }
                })
                .done(function (data) {
                    //$('.videme-scroll-progress').empty();
                    $('.videme_tile_loading').addClass('hidden');
                })
                .fail(function (data) {
                    tempObject.html(showError(data));
                    //callback.call(self, url, id_list_group);
                    //==Xcallback.call(self, url, tempObject);
                })
                .always(function () {
                });
        } else {
            $('.videme_tile_loading').addClass('hidden');
        }
    }
    $.fn.itemsMyVideosScrollV3 = function (options) { // 25072022 // TODO: remove
        console.log("$.fn.itemsMyVideosScrollV3 -----> ok");
        itemsMyVideosScrollV3Settings = $.extend({
            limit: 16,
            showcaseVideo: "#videme-tile-v3"
        }, options);
        if ($(this).length) {
            console.log("$.fn.fileInbox $(this) -----> yes " + $(this).length);
            var tempObject = $(this);
        } else {
            console.log("$.fn.fileInbox $(this) -----> nooo! " + $(this).length);
            var tempObject = $(itemsMyVideosScrollV3Settings.showcaseVideo);
        }
        console.log("$.fn.itemsMyVideosScrollV3 tempObject -----> " + tempObject.length);
        tempObject.html(VidemeProgress);
        var li = 1;
        var win = $(window);
        var getItemOpt = [];
        var offset = 0;
        //var limit = 4;
        var limit = itemsMyVideosScrollV3Settings.limit;
        //var itemsData = true;
        var id_list_group = 'list-group_' + Math.floor(Math.random() * 100);
        //tempObject.html("<ul class='list-group' id='" + id_list_group + "'></ul>");
        //tempObject.append("<ul class='list-group' id='" + id_list_group + "'></ul><i class=\"videme_tile_loading fa fa-circle-o-notch fa-spin hidden\"></i>");
        //$.getJSON("https://api.vide.me/upload/getmytask/?limit=" + showMyTaskActiveOnlySettings.limit + "&videmecallback=?",

        videmeUI.doGetJSONTileV3(emptyItemsData,
            "/system/items/get_my_items/?offset=" + offset + "&limit=" + limit + "&videmecallback=?",
            id_list_group,
            //'videme-v3-my-item-url',
            'showmulti',
            offset,
            tempObject);
        offset = offset + limit;

        /*win.scroll(function () {
            onScroll();
        });
        $(document.body).on('touchmove', onScroll()); // for mobile
        function onScroll(){
            if( $(window).scrollTop() + window.innerHeight >= document.body.scrollHeight ) {
                console.log("$.fn.itemsMyVideosScroll onScroll");
                eventScroll(); // TODO: recreate
                $('.videme-scroll-progress').html(VidemeProgress);
                videmeUI.doGetJSONTileV3(emptyConnectData,
                    "https://api.vide.me/v2/items/my/?offset=" + offset + "&limit=" + limit + "&videmecallback=?",
                    id_list_group,
                    //'videme-v3-my-item-url',
                    'showmulti',
                    offset,
                    tempObject);
                offset = offset + limit;
            }
        }*/
    };
    function showTileTestV4(tempObject, data) { // 26072022
        console.log("showTileTestV4 data -----> " + JSON.stringify(data));

        var html = [];
        //var courent_id = offset;
        $.each(data, function (key, value) {
            //console.log("showTileTestV4 each value -----> " + JSON.stringify(value));
            html.push(itemCardShow(value));

        });
        tempObject.html(html)
        //videoThumbnail();
    }
}
(jQuery));


