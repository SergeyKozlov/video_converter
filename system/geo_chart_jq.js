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

}
(jQuery));


(function (d) {
    var k = {
        seconds: 10,
        color: "rgba(255, 255, 255, 0.8)",
        height: null,
        width: null
    }, e = 3 * Math.PI / 2, g = Math.PI / 180, f = function (b, a, c) {
        null === a.width && (a.width = b.width());
        null === a.height && (a.height = b.height());
        this.settings = a;
        this.jquery_object = b;
        this.interval_id = null;
        this.current_value = 360;
        this.initial_time = new Date;
        this.accrued_time = 0;
        this.callback = c;
        this.is_paused = !0;
        this.is_reversed = "undefined" != typeof a.is_reversed ? a.is_reversed : !1;
        this.jquery_object.html('<canvas class="pie_timer" width="' + a.width +
            '" height="' + a.height + '"></canvas>');
        this.canvas = this.jquery_object.children(".pie_timer")[0]
    };
    f.prototype = {
        start: function () {
            this.is_paused && (this.initial_time = new Date - this.accrued_time, 0 >= this.current_value && (this.current_value = 360), this.interval_id = setInterval(d.proxy(this.run_timer, this), 40), this.is_paused = !1)
        }, pause: function () {
            this.is_paused || (this.accrued_time = new Date - this.initial_time, clearInterval(this.interval_id), this.is_paused = !0)
        }, run_timer: function () {
            if (this.canvas.getContext) if (this.elapsed_time =
                (new Date - this.initial_time) / 1E3, this.current_value = 360 * Math.max(0, this.settings.seconds - this.elapsed_time) / this.settings.seconds, 0 >= this.current_value) clearInterval(this.interval_id), this.canvas.width = this.settings.width, d.isFunction(this.callback) && this.callback.call(), this.is_paused = !0; else {
                this.canvas.width = this.settings.width;
                var b = this.canvas.getContext("2d"), a = [this.canvas.width, this.canvas.height],
                    c = Math.min(a[0], a[1]) / 2, a = [a[0] / 2, a[1] / 2], h = this.is_reversed;
                b.beginPath();
                b.moveTo(a[0], a[1]);
                b.arc(a[0], a[1], c, h ? e - (360 - this.current_value) * g : e - this.current_value * g, e, h);
                b.closePath();
                b.fillStyle = this.settings.color;
                b.fill()
            }
        }
    };
    var l = function (b, a) {
        var c = d.extend({}, k, b);
        return this.each(function () {
            var b = d(this), e = new f(b, c, a);
            b.data("pie_timer", e)
        })
    }, m = function (b) {
        b in f.prototype || d.error("Method " + b + " does not exist on jQuery.pietimer");
        var a = Array.prototype.slice.call(arguments, 1);
        return this.each(function () {
            var c = d(this).data("pie_timer");
            if (!c) return !0;
            c[b].apply(c, a)
        })
    };
    d.fn.pietimer =
        function (b) {
            return "object" === typeof b || !b ? l.apply(this, arguments) : m.apply(this, arguments)
        }
})(jQuery);
