console.log("videme_func1.js");

function showChartItem(showChartItem, chart_id) { // 31072022
    console.log('showChartItem ---> ' + JSON.stringify(showChartItem));
    console.log('showChartItem chart_id ---> ' + chart_id);
    //var chartData = JSON.stringify(showChartItem);
    //console.log('showChartItem chartData ---> ' + chartData);
    /*var data = tempObject.map(function(e) {
        return e;
    });
    console.log('showChartItem data ---> ' + JSON.stringify(data));*/
    //var html = [];
    var data = {
        datasets: [{
            data: showChartItem
        }]
    };
    //var ctx = document.getElementById(tempObject).getContext('2d');
    //var ctx = document.getElementById('videme-share-item').getContext('2d');
    //var ctx = $("#" + tempObject);
    //var ctx = $("#" + tempObject).getContext('2d');
    //var ctx = $("#" + tempObject)[0].getContext('2d');
    const canvas = $('#' + chart_id);
    const ctx = canvas[0].getContext('2d');
    //html.push("<ul class=\"list-group videme-doorbell-sign-small\">");
    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            maintainAspectRatio: false,
            //responsive: true,
            backgroundColor: 'rgb(203,76,76)',
            borderColor: 'rgb(101,39,39)',
            borderWidth: 1,
            borderRadius: 12,
            borderSkipped: false,
            aspectRatio: 5,
            scales: {
                x: {
                    type: 'timeseries',
                }
            },
            plugins: {
                legend:
                    {
                        display: false
                    }
            }
        }
    });
    //html.push("</ul>");
    //return html.join('');
}

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

/**
 * http://stackoverflow.com/a/10997390/11236
 */
function updateURLParameter(url, param, paramVal) { // 02082022
    var TheAnchor = null;
    var newAdditionalURL = "";
    var tempArray = url.split("?");
    var baseURL = tempArray[0];
    var additionalURL = tempArray[1];
    var temp = "";

    if (additionalURL) {
        var tmpAnchor = additionalURL.split("#");
        var TheParams = tmpAnchor[0];
        TheAnchor = tmpAnchor[1];
        if (TheAnchor)
            additionalURL = TheParams;

        tempArray = additionalURL.split("&");

        for (var i = 0; i < tempArray.length; i++) {
            if (tempArray[i].split('=')[0] != param) {
                newAdditionalURL += temp + tempArray[i];
                temp = "&";
            }
        }
    } else {
        var tmpAnchor = baseURL.split("#");
        var TheParams = tmpAnchor[0];
        TheAnchor = tmpAnchor[1];

        if (TheParams)
            baseURL = TheParams;
    }

    if (TheAnchor)
        paramVal += "#" + TheAnchor;

    var rows_txt = temp + "" + param + "=" + paramVal;
    return baseURL + "?" + newAdditionalURL + rows_txt;
}
function URLUpdate(param, value) { // 02082022
    window.history.replaceState('', '', updateURLParameter(window.location.href, param, value));
}
function removeURLparam(paramName) { // 02082022
    var re = new RegExp("[&\?]" + paramName + "=\\d+");
    //var newUrl = "http://example.com/home.php?course_id=12&id=1&branch_id=4&course_id=5";
    var oldURL = window.location.href;
    //return newUrl.replace(re, '');
    var newUrl = oldURL.replace(re, '');
    //console.log(newUrl);
    window.history.replaceState('', '', newUrl);
}

function chartButtonComposition(item_id) { // 31072022
    return "<div id='videme-item-chart-canvas-place_" + item_id + "' class='videme-item-chart-canvas-place'>\
            </div>\
            <div id='videme-chart-stump_" + item_id + "' class='hidden' item_id='" + item_id + "'></div>\
            <span id='videme-chart-button-1st2weeks_" + item_id + "' class='badge rounded-pill text-bg-secondary videme-chart-button videme-chart-button_" + item_id + "' item_id='" + item_id + "' time_shift_type='w_stop' time_shift_val='2'>First 2 weeks</span>\
            <span id='videme-chart-button-1st1months_" + item_id + "' class='badge rounded-pill text-bg-secondary videme-chart-button videme-chart-button_" + item_id + "' item_id='" + item_id + "' time_shift_type='m_stop' time_shift_val='1'>First 1 months</span>\
            <span id='videme-chart-button-last2weeks_" + item_id + "' class='badge rounded-pill text-bg-secondary videme-chart-button videme-chart-button_" + item_id + "' item_id='" + item_id + "' time_shift_type='w_stop' time_shift_val='-2'>Last 2 weeks</span>\
            <span id='videme-chart-button-last1months_" + item_id + "' class='badge rounded-pill text-bg-secondary videme-chart-button videme-chart-button_" + item_id + "' item_id='" + item_id + "' time_shift_type='m_stop' time_shift_val='-1'>Last 1 months</span>\
            <div id='videme-chart-pop-states-place_" + item_id + "' class='videme-chart-pop-states-place'></div>";
}

//var VidemeProgress = "<img src='data:image/gif;base64,R0lGODlhDQAMAKIAAP///7W1ta2trXNzczExMf4BAgAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQFCgAFACwAAAAADQAMAAADIgi6zCIghDilejRbgK2fHPRloVaB3Umm5iWqGzuW49bcQAIAIfkEBQoABQAsAAABAAMACgAAAwhYRMrb8ElHEwAh+QQFCgAFACwAAAEADAAKAAADHlgzRVRCQLnai1Mxl3HlmLddkmh11IhqZ5i25QvGCQAh+QQFCgAFACwAAAEACQAKAAADGVgiNVOEKOagXO3FmS2vGwZelEZ2YemJZgIAIfkEBQoABQAsBAABAAgACgAAAxYYUTNFRDEHZXtx3appnpjliWFXglACACH5BAUKAAUALAcAAQAFAAoAAAMNGFEzym61N2WE9FZsEwA7' />";
var VidemeProgress = "<div class='videme_tile_loading_text'></div><div class=\"spinner-border videme_tile_loading\" role=\"status\">\n" +
    "  <span class=\"visually-hidden\">Loading...</span>\n" +
    "</div>";

function showChartPopStates(showChartPopStates, param) { // 31072022
    //console.log('showChartPopStates ---> ' + JSON.stringify(showChartPopStates));
    //console.log('showChartPopStates chart_id ---> ' + chart_id);
    var html = [];
    if (!$.isEmptyObject(showChartPopStates)) {
        html.push("<div class='videme-chart-filter-pop-states'>");
        html.push("<div class='videme-v3-tile-title'>Popular regions:</div>");
        html.push("<span id='' class='badge rounded-pill text-bg-primary videme-chart-pop-state-button videme-chart-pop-state-button_" + param.item + "' state='' item_id='" + param.item + "'>All</span>");

        $.each(showChartPopStates, function (key, value) {
            //console.log('showChartPopStates value ---> ' + JSON.stringify(value));
            var obj_names = jQuery.parseJSON(value['names']);
            //html.push(" State # " + key + " Name: " + obj_names['en']);
            html.push("<span id='' class='badge rounded-pill text-bg-secondary videme-chart-pop-state-button videme-chart-pop-state-button_" + param.item + "' state='" + value['state'] + "' item_id='" + param.item + "'>" + obj_names['en'] + " - " + value['count_state'] + "</span>");
        });
        html.push("</div>");
    }
    return html.join('');
}

function getNextItem() {
    console.log("getNextItem -----> run");
    $.getJSON("/system/cm/next_item/?videmecallback=?",
        function (data) {
            //console.log("$.fn.showRelation data -----> " + data);
            if (!$.isEmptyObject(data)) {
                var item_id = data[0].item_id;
                console.log("getNextItem -----> item_id: " + item_id);

                //$('#chart_run').attr('item_id', item_id);
                itemCardUpdate(data[0]);

                /*$('#videme-item-chart-canvas_' + item_id).showChartShareItem({
                    showChartShareItemId: 'videme-item-chart-canvas_' + item_id,
                    item: item_id
                });
                $.fn.showChartPopStates({
                    item: item_id,
                    showChartPopStatesId: 'videme-chart-pop-states-place_' + item_id
                });*/
            } else {
                $('#chart_result').val('No data...');
            }
        })
        .done(function (data) {
        })
        .fail(function (data) {
            //tempObject.html(showError(data));
        })
        .always(function () {
        });
}
function showError(data) { // 01082022 recreate
    var html = [];
    html.push("\
			<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">\
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\
					<span aria-hidden=\"true\">&times;</span>\
				</button>\
				<strong>Warning!</strong>\
				Network error. <a href=\"" + document.URL + "\" class=\"alert-link\">Please reload the page.</a> <a href='https://api.vide.me/enter/' class=\"alert-link\"> Or Sign in.</a>\
				<p>" + JSON.stringify(data) + "</p>\
			</div>\
		")
    return html;
}
function itemCardUpdate(itemCardUpdate) {
    $('.videme-item-chart-canvas-place').empty();
    $('#chart_next').addClass('hidden');
    $('#chart_run').attr('item_id', itemCardUpdate.item_id).removeClass('hidden');
    $('#geo_chart_image').attr('src', 'https://img.videcdn.net/' + itemCardUpdate.item_id + '.jpg');
    $('#geo_chart_title').html(itemCardUpdate.title);
    $('#geo_chart_content').html(itemCardUpdate.content);
}
function itemCardShow(itemCardShow) {
    //console.log("itemCardShow -----> itemCardShow: " + JSON.stringify(itemCardShow));

    var item_id = (itemCardShow.item_id) ? (itemCardShow.item_id) : ('');
    var title = (itemCardShow.title) ? (itemCardShow.title) : ('');
    var content = (itemCardShow.content) ? (itemCardShow.content) : ('');
    var image_icon = '';
    var progress_convert = '';
    if (!$.isEmptyObject(itemCardShow.task_type)) {
        /*progress_convert = '<div class="progress videme-convert-progress" style="height: .2rem; margin-top: .2rem;">' +
            '<div aria-valuemax="100" aria-valuemin="0" ' +
            'class="progress-bar progress-bar-striped progress-bar-animated" id="videme_convert_progress" ' +
            'role="progressbar" style=""></div>' +
            '</div>';*/

        if (itemCardShow.percentage > 0) {
            //console.log("itemCardShow -----> itemCardShow.percentage: " + itemCardShow.percentage);

            /*$('#videme_convert_progress')
                .addClass('bg-success')
                .addClass('progress-bar-striped')
                .addClass('progress-bar-animated');*/
            var addClass = 'progress-bar-striped progress-bar-animated ';

            var percentage = itemCardShow.percentage;
            if (itemCardShow.percentage > 97) {
                percentage = 100;
                //addClass = addClass + ' bg-success';
                addClass = 'bg-success';
                /*$('#videme_convert_progress')
                    .html('Successfully converted')
                    .removeClass('progress-bar-striped')
                    .removeClass('progress-bar-animated');*/
                //$('.videme-uploader-status').html('Successfully converted');
                //document.title = 'Successfully converted ' + $('#title_for_video').val();
                //cookieLastUploadRemove();
            } else {
                //$('#videme_upload_progress').html('Converted ' + percentage + '%');
                //$('.videme-uploader-status').html('Converted ' + percentage + '%');
                //document.title = 'Converted ' + percentage + '% ' + $('#title_for_video').val();
                //console.log("$.fn.showMyTaskById data.percentage videme_nav_badge_last_upload -----> ", percentage);

                //$('.videme_nav_badge_last_upload').html(percentage + '%');

                /* *************************************/
                //$('#videme_last_upload_li').html(db);
                /* *************************************/

            }
            //$('#videme_convert_progress').css('width', percentage + '%').attr('aria-valuenow', percentage);
            progress_convert = '<div class="progress videme-convert-progress my-2">' +
                '<div aria-valuemax="100" aria-valuemin="0" ' +
                'class="progress-bar ' + addClass + '" id="videme_convert_progress" ' +
                'role="progressbar" style="width: ' + percentage + '%" aria-valuenow="' + percentage + '"></div>' +
                '</div>';
        }
        if (itemCardShow.task_status === 'worked') {
            image_icon = "<i class='img-thumbnail fa fa-cogs fa-2x fa-pull-left text-center align-items-center d-flex justify-content-center videme-doorbell-sign-icon'></i>";
        } else {
            image_icon = "<i class='img-thumbnail fa fa-clock-o fa-2x fa-pull-left text-center align-items-center d-flex justify-content-center videme-doorbell-sign-icon'></i>";
        }
    } else {
        image_icon = '<img style="width: 150px;" src="/media/' + item_id + '.jpg" class="for_action_video img-thumbnail me-2" item_id="' + item_id + '"/>';

    }
    //console.log("itemCardShow -----> progress_convert: " + progress_convert);

    return '<div class="d-flex text-muted pt-3">\n' +
        image_icon +
    '<div class="pb-3 mb-0 small lh-sm border-bottom">\n' +
    '<strong class="d-block text-gray-dark" id="geo_chart_title">' + title + '</strong>\n' +
    '<div id="geo_chart_content">' + content + '</div>\n' +
        progress_convert +
    '</div>\n' +
    '</div>';
}

function showTileTasksActiveOnly(showTileTasks) { // remove
    console.log('showTileTasksActiveOnly');
    //console.log('showTileTasksActiveOnly ---> ' + JSON.stringify(showTileTasks));
    var html = [];
    //var videme_last_task = paddingUserInfo(showTileTasks[0]);
    //$('.videme_last_task').html(showIconForTask(videme_last_task));
    html.push("<ul class=\"list-group videme-doorbell-sign-small\">");
    //$('.videme_last_task').html(showTileTasks[0].icon);
    //$('.videme_last_task').html(JSON.stringify(showTileTasks[0]));

    $.each(showTileTasks, function (key, value) {
        //console.log('showTileTasksActiveOnly value.task_status ---> ' + value.task_status);
        //console.log('showTileTasksActiveOnly value ---> ' + JSON.stringify(value));

        if (value.task_status == 'worked' || value.task_status == 'awaiting') {
            //if (value.task_type !== 'fileUploadVideo_force_mp4') {

            //===var trueValue = paddingUserInfo(value); // TODO: Dobble? No!
            html.push("<li type=\"button\" class=\"list-group-item list-group-item-action videme-card-list-group\">");
            //html.push(showTask(trueValue));
            //html.push(showMediaElementLi(trueValue));
            html.push(itemCardShow(value));
            html.push("</li>");
            //}
        }
    });
    html.push("</ul>");
    return html.join('');
}

function showMediaElementLi(showTask) {

}

function paddingUserInfo(paddingUserInfo) { // 01082022
    //console.log('paddingUserInfo paddingUserInfo ---> ' + JSON.stringify(paddingUserInfo));
    if (!$.isEmptyObject(paddingUserInfo)) {
        var trueUserInfo = {};
        if (!$.isEmptyObject(paddingUserInfo.user_id)) {
            trueUserInfo.user_id = paddingUserInfo.user_id;
        } else {
            trueUserInfo.user_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.user_email)) {
            trueUserInfo.user_email = paddingUserInfo.user_email;
        } else {
            trueUserInfo.user_email = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.user_display_name)) {
            trueUserInfo.user_display_name = paddingUserInfo.user_display_name;
        } else {
            //trueUserInfo.user_display_name = 'No name';
            trueUserInfo.user_display_name = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.item_user_display_name)) {
            trueUserInfo.item_user_display_name = paddingUserInfo.item_user_display_name;
        } else {
            //trueUserInfo.item_user_display_name = 'No name';
        }
        if (!$.isEmptyObject(paddingUserInfo.post_user_display_name)) {
            trueUserInfo.post_user_display_name = paddingUserInfo.post_user_display_name;
        } else {
            //trueUserInfo.post_user_display_name = 'No name';
        }
        if (!$.isEmptyObject(paddingUserInfo.user_first_name)) {
            trueUserInfo.user_first_name = paddingUserInfo.user_first_name;
        } else {
            trueUserInfo.user_first_name = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.user_last_name)) {
            trueUserInfo.user_last_name = paddingUserInfo.user_last_name;
        } else {
            trueUserInfo.user_last_name = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.user_link)) {
            trueUserInfo.user_link = paddingUserInfo.user_link;
        } else {
            trueUserInfo.user_link = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.user_gender)) {
            trueUserInfo.user_gender = paddingUserInfo.user_gender;
        } else {
            trueUserInfo.user_gender = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.user_birthday)) {
            trueUserInfo.user_birthday = paddingUserInfo.user_birthday;
        } else {
            trueUserInfo.user_birthday = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.user_locale)) {
            trueUserInfo.user_locale = paddingUserInfo.user_locale;
        } else {
            trueUserInfo.user_locale = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.user_picture) && paddingUserInfo.user_picture !== null) {
            //console.info('paddingUserInfo paddingUserInfo.user_picture !== null ' + paddingUserInfo.user_picture);
            trueUserInfo.user_picture = paddingUserInfo.user_picture;
        } else {
            //console.info('paddingUserInfo null ' + paddingUserInfo.user_picture);
            trueUserInfo.user_picture = 'nonname.jpg';
        }
        //console.log('paddingUserInfo trueUserInfo 1 ---> ' + JSON.stringify(trueUserInfo));

        if (!$.isEmptyObject(paddingUserInfo.item_user_picture)) {
            trueUserInfo.item_user_picture = paddingUserInfo.item_user_picture;
        } else {
            //trueUserInfo.item_user_picture = 'nonname.jpg';
        }
        if (!$.isEmptyObject(paddingUserInfo.post_user_picture)) {
            trueUserInfo.post_user_picture = paddingUserInfo.post_user_picture;
        } else {
            //trueUserInfo.post_user_picture = 'nonname.jpg';
        }
        if (!$.isEmptyObject(paddingUserInfo.spring)) {
            trueUserInfo.spring = paddingUserInfo.spring;
        } else {
            trueUserInfo.spring = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.item_spring)) {
            trueUserInfo.item_spring = paddingUserInfo.item_spring;
        } else {
            trueUserInfo.item_spring = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.post_spring)) {
            trueUserInfo.post_spring = paddingUserInfo.post_spring;
        } else {
            trueUserInfo.post_spring = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.facebook)) {
            trueUserInfo.facebook = paddingUserInfo.facebook;
        } else {
            trueUserInfo.facebook = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.google)) {
            trueUserInfo.google = paddingUserInfo.google;
        } else {
            trueUserInfo.google = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.microsoft)) {
            trueUserInfo.microsoft = paddingUserInfo.microsoft;
        } else {
            trueUserInfo.microsoft = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.last_login)) {
            trueUserInfo.last_login = paddingUserInfo.last_login;
        } else {
            trueUserInfo.last_login = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.last_active)) {
            trueUserInfo.last_active = paddingUserInfo.last_active;
        } else {
            trueUserInfo.last_active = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.user_cover)) {
            trueUserInfo.user_cover = paddingUserInfo.user_cover;
        } else {
            trueUserInfo.user_cover = getRandomCover();
        }
        if (!$.isEmptyObject(paddingUserInfo.user_cover_top)) {
            trueUserInfo.user_cover_top = paddingUserInfo.user_cover_top;
        } else {
            trueUserInfo.user_cover_top = getRandomCover();
        }
        if (!$.isEmptyObject(paddingUserInfo.country)) {
            trueUserInfo.country = paddingUserInfo.country;
        } else {
            trueUserInfo.country = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.city)) {
            trueUserInfo.city = paddingUserInfo.city;
        } else {
            trueUserInfo.city = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.bio)) {
            trueUserInfo.bio = paddingUserInfo.bio;
        } else {
            trueUserInfo.bio = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.slogan)) {
            trueUserInfo.slogan = paddingUserInfo.slogan;
        } else {
            trueUserInfo.slogan = '';
        }
        /* Tile ************************************ */

        if (!$.isEmptyObject(paddingUserInfo.item_id)) {
            trueUserInfo.item_id = paddingUserInfo.item_id;
        } else {
            trueUserInfo.item_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.post_id)) {
            trueUserInfo.post_id = paddingUserInfo.post_id;
        } else {
            trueUserInfo.post_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.type)) {
            trueUserInfo.type = paddingUserInfo.type;
        } else {
            trueUserInfo.type = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.item_count_show)) {
            trueUserInfo.item_count_show = paddingUserInfo.item_count_show;
        } else {
            trueUserInfo.item_count_show = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.post_type)) {
            trueUserInfo.post_type = paddingUserInfo.post_type;
        } else {
            trueUserInfo.post_type = '';
        }
        /* ****************************************** */
        if (!$.isEmptyObject(paddingUserInfo.video)) {
            trueUserInfo.video = paddingUserInfo.video;
        } else {
            trueUserInfo.video = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.src)) {
            trueUserInfo.src = paddingUserInfo.src;
        } else {
            trueUserInfo.src = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.message_id)) {
            trueUserInfo.message_id = paddingUserInfo.message_id;
        } else {
            trueUserInfo.message_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.created_at)) {
            trueUserInfo.created_at = paddingUserInfo.created_at;
        } else {
            trueUserInfo.created_at = null;
        }
        if (!$.isEmptyObject(paddingUserInfo.updated_at)) {
            trueUserInfo.updated_at = paddingUserInfo.updated_at;
        } else {
            trueUserInfo.updated_at = null;
        }
        if (!$.isEmptyObject(paddingUserInfo.title)) {
            trueUserInfo.title = paddingUserInfo.title;
        } else {
            trueUserInfo.title = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.content)) {
            trueUserInfo.content = paddingUserInfo.content;
        } else {
            trueUserInfo.content = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.to_user_id)) {
            trueUserInfo.to_user_id = paddingUserInfo.to_user_id;
        } else {
            trueUserInfo.to_user_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.from_user_id)) {
            trueUserInfo.from_user_id = paddingUserInfo.from_user_id;
        } else {
            trueUserInfo.from_user_id = '';
        }
        /* remove ****************************************** */
        if (!$.isEmptyObject(paddingUserInfo.from_user_display_name)) {
            trueUserInfo.from_user_display_name = paddingUserInfo.from_user_display_name;
        } else {
            trueUserInfo.from_user_display_name = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.from_user_name)) {
            trueUserInfo.from_user_name = paddingUserInfo.from_user_name;
        } else {
            trueUserInfo.from_user_name = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.recipients)) {
            trueUserInfo.recipients = paddingUserInfo.recipients;
        } else {
            trueUserInfo.recipients = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.conference_id)) {
            trueUserInfo.conference_id = paddingUserInfo.conference_id;
        } else {
            trueUserInfo.conference_id = '';
        }
        /* Doorbell sign ****************************************** */

        if (!$.isEmptyObject(paddingUserInfo.dbs_type)) {
            trueUserInfo.dbs_type = paddingUserInfo.dbs_type;
        } else {
            trueUserInfo.dbs_type = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.href)) {
            trueUserInfo.href = paddingUserInfo.href;
        } else {
            trueUserInfo.href = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.image)) {
            trueUserInfo.image = origin_img_vide_me + paddingUserInfo.image;
        } else {
            trueUserInfo.image = getRandomImage();
        }
        /*if (!$.isEmptyObject(paddingUserInfo.cover)) {
            trueUserInfo.cover = paddingUserInfo.cover;
        } else {
            trueUserInfo.cover = getRandomCover();
        }*/
        if (!$.isEmptyObject(paddingUserInfo.cover)) {
            trueUserInfo.cover = paddingUserInfo.cover;
        } else {
            trueUserInfo.cover = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.cover_video)) {
            trueUserInfo.cover_video = paddingUserInfo.cover_video;
        } else {
            trueUserInfo.cover_video = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.started_at)) {
            trueUserInfo.started_at = paddingUserInfo.started_at;
        } else {
            trueUserInfo.started_at = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.stopped_at)) {
            trueUserInfo.stopped_at = paddingUserInfo.stopped_at;
        } else {
            trueUserInfo.stopped_at = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.item_country)) {
            trueUserInfo.item_country = paddingUserInfo.item_country;
        } else {
            trueUserInfo.item_country = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.item_city)) {
            trueUserInfo.item_city = paddingUserInfo.item_city;
        } else {
            trueUserInfo.item_city = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.place)) {
            trueUserInfo.place = paddingUserInfo.place;
        } else {
            trueUserInfo.place = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.access)) {
            trueUserInfo.access = paddingUserInfo.access;
        } else {
            trueUserInfo.access = null;
        }
        if (!$.isEmptyObject(paddingUserInfo.date)) {
            trueUserInfo.date = timeToWord(paddingUserInfo.date);
        } else {
            trueUserInfo.date = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.additional)) {
            trueUserInfo.additional = paddingUserInfo.additional;
        } else {
            trueUserInfo.additional = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.count)) {
            trueUserInfo.count = paddingUserInfo.count;
        } else {
            trueUserInfo.count = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.tags)) {
            trueUserInfo.tags = paddingUserInfo.tags;
        } else {
            trueUserInfo.tags = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.array_tags)) {
            trueUserInfo.array_tags = paddingUserInfo.array_tags;
        } else {
            trueUserInfo.array_tags = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.tag)) {
            trueUserInfo.tag = paddingUserInfo.tag;
        } else {
            trueUserInfo.tag = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.tag_count)) {
            trueUserInfo.tag_count = paddingUserInfo.tag_count;
        } else {
            trueUserInfo.tag_count = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.tags_count)) {
            trueUserInfo.tags_count = paddingUserInfo.tags_count;
        } else {
            trueUserInfo.tags_count = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.tags_conf)) {
            trueUserInfo.tags_conf = paddingUserInfo.tags_conf;
        } else {
            trueUserInfo.tags_conf = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.user_tags_conf)) {
            trueUserInfo.user_tags_conf = paddingUserInfo.user_tags_conf;
        } else {
            trueUserInfo.user_tags_conf = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.user_tags_conf_new)) {
            trueUserInfo.user_tags_conf_new = paddingUserInfo.user_tags_conf_new;
        } else {
            trueUserInfo.user_tags_conf_new = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.tags_conf_count)) {
            trueUserInfo.tags_conf_count = paddingUserInfo.tags_conf_count;
        } else {
            trueUserInfo.tags_conf_count = 0;
        }
        if (!$.isEmptyObject(paddingUserInfo.tags_view_count)) {
            trueUserInfo.tags_view_count = paddingUserInfo.tags_view_count;
        } else {
            trueUserInfo.tags_view_count = 0;
        }
        if (!$.isEmptyObject(paddingUserInfo.ext_links)) {
            trueUserInfo.ext_links = paddingUserInfo.ext_links;
        } else {
            trueUserInfo.ext_links = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.album_id)) {
            trueUserInfo.album_id = paddingUserInfo.album_id;
        } else {
            trueUserInfo.album_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.album)) {
            trueUserInfo.album = paddingUserInfo.album;
        } else {
            trueUserInfo.album = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.dropdown)) {
            trueUserInfo.dropdown = paddingUserInfo.dropdown;
        } else {
            trueUserInfo.dropdown = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.buttons)) {
            trueUserInfo.buttons = paddingUserInfo.buttons;
        } else {
            trueUserInfo.buttons = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.footer)) {
            trueUserInfo.footer = paddingUserInfo.footer;
        } else {
            trueUserInfo.footer = '';
        }
        /* Doorbell Relation ****************************************** */

        if (!$.isEmptyObject(paddingUserInfo.from_user_id)) {
            trueUserInfo.from_user_id = paddingUserInfo.from_user_id;
        } else {
            trueUserInfo.from_user_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.relation_email)) {
            trueUserInfo.relation_email = paddingUserInfo.relation_email;
        } else {
            trueUserInfo.relation_email = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.relation)) {
            trueUserInfo.relation = paddingUserInfo.relation;
        } else {
            trueUserInfo.relation = '';
        }
        /* Connect pop */
        if (!$.isEmptyObject(paddingUserInfo.post_owner_id)) {
            trueUserInfo.post_owner_id = paddingUserInfo.post_owner_id;
        } else {
            trueUserInfo.post_owner_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.posts_count)) {
            trueUserInfo.posts_count = paddingUserInfo.posts_count;
        } else {
            trueUserInfo.posts_count = '';
        }
        /* Doorbell Task ****************************************** */

        if (!$.isEmptyObject(paddingUserInfo.video_duration)) {
            trueUserInfo.video_duration = paddingUserInfo.video_duration;
        } else {
            trueUserInfo.video_duration = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.width)) {
            trueUserInfo.width = paddingUserInfo.width;
        } else {
            trueUserInfo.width = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.height)) {
            trueUserInfo.height = paddingUserInfo.height;
        } else {
            trueUserInfo.height = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.task_id)) {
            trueUserInfo.task_id = paddingUserInfo.task_id;
        } else {
            trueUserInfo.task_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.task_status)) {
            trueUserInfo.task_status = paddingUserInfo.task_status;
        } else {
            trueUserInfo.task_status = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.task_type)) {
            trueUserInfo.task_type = paddingUserInfo.task_type;
        } else {
            trueUserInfo.task_type = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.task_item_id)) {
            trueUserInfo.task_item_id = paddingUserInfo.task_item_id;
        } else {
            trueUserInfo.task_item_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.percentage)) {
            trueUserInfo.percentage = paddingUserInfo.percentage;
        } else {
            trueUserInfo.percentage = '';
        }
        /* Doorbell Icon ****************************************** */
        if (!$.isEmptyObject(paddingUserInfo.icon)) {
            trueUserInfo.icon = paddingUserInfo.icon;
        } else {
            trueUserInfo.icon = '';
        }
        /* Doorbell Relations ****************************************** */
        if (!$.isEmptyObject(paddingUserInfo.relation_email)) {
            trueUserInfo.relation_email = paddingUserInfo.relation_email;
        } else {
            trueUserInfo.relation_email = '';
        }
        /* likes ****************************************** */
        if (!$.isEmptyObject(paddingUserInfo.likes_count)) {
            trueUserInfo.likes_count = paddingUserInfo.likes_count;
        } else {
            trueUserInfo.likes_count = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.its_like)) {
            trueUserInfo.its_like = paddingUserInfo.its_like;
        } else {
            trueUserInfo.its_like = '';
        }
        /* Reposts  ****************************************** */
        if (!$.isEmptyObject(paddingUserInfo.reposts_count)) {
            trueUserInfo.reposts_count = paddingUserInfo.reposts_count;
        } else {
            trueUserInfo.reposts_count = '';
        }
        /* Trends tile  ****************************************** */
        if (!$.isEmptyObject(paddingUserInfo.type_item)) {
            trueUserInfo.type_item = paddingUserInfo.type_item;
        } else {
            trueUserInfo.type_item = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.count_view)) {
            trueUserInfo.count_view = paddingUserInfo.count_view;
        } else {
            trueUserInfo.count_view = '';
        }
        if (paddingUserInfo.embed) {
            trueUserInfo.embed = paddingUserInfo.embed;
        } else {
            trueUserInfo.embed = false;
        }
        /* Stars *****  ****************************************** */
        //if (paddingUserInfo.stars_count) {
        if (!$.isEmptyObject(paddingUserInfo.stars_count)) {
            trueUserInfo.stars_count = paddingUserInfo.stars_count;
        } else {
            trueUserInfo.stars_count = false;
            //trueUserInfo.stars_count = 0;
        }
        if (paddingUserInfo.views_stars) {
            trueUserInfo.views_stars = paddingUserInfo.views_stars;
        } else {
            trueUserInfo.views_stars = false;
        }
        if (paddingUserInfo.pre_v_w320) {
            trueUserInfo.pre_v_w320 = paddingUserInfo.pre_v_w320;
        } else {
            trueUserInfo.pre_v_w320 = false;
        }
        if (paddingUserInfo.pre_i_w320) {
            trueUserInfo.pre_i_w320 = paddingUserInfo.pre_i_w320;
        } else {
            trueUserInfo.pre_i_w320 = false;
        }
        if (paddingUserInfo.spr_w120) {
            trueUserInfo.spr_w120 = paddingUserInfo.spr_w120;
        } else {
            trueUserInfo.spr_w120 = false;
        }
        if (paddingUserInfo.vtt_w120) {
            trueUserInfo.vtt_w120 = paddingUserInfo.vtt_w120;
        } else {
            trueUserInfo.vtt_w120 = false;
        }
        /* Albums **********************************************/
        if (paddingUserInfo.albums_sets_id) {
            trueUserInfo.albums_sets_id = paddingUserInfo.albums_sets_id;
        } else {
            trueUserInfo.albums_sets_id = '';
        }
        if (paddingUserInfo.albums_title) {
            trueUserInfo.albums_title = paddingUserInfo.albums_title;
        } else {
            trueUserInfo.albums_title = '';
        }
        /* Essences *************************************************/
        if (!$.isEmptyObject(paddingUserInfo.ue_id)) {
            trueUserInfo.ue_id = paddingUserInfo.ue_id;
        } else {
            trueUserInfo.ue_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.ure_id)) {
            trueUserInfo.ure_id = paddingUserInfo.ure_id;
        } else {
            trueUserInfo.ure_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.owner_display_name)) {
            trueUserInfo.owner_display_name = paddingUserInfo.owner_display_name;
        } else {
            trueUserInfo.owner_display_name = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.owner_picture)) {
            trueUserInfo.owner_picture = paddingUserInfo.owner_picture;
        } else {
            trueUserInfo.owner_picture = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.owner_spring)) {
            trueUserInfo.owner_spring = paddingUserInfo.owner_spring;
        } else {
            trueUserInfo.owner_spring = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.essence_title)) {
            trueUserInfo.essence_title = paddingUserInfo.essence_title;
        } else {
            trueUserInfo.essence_title = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.ref_title)) {
            trueUserInfo.ref_title = paddingUserInfo.ref_title;
        } else {
            trueUserInfo.ref_title = '';
        }
        /*if (!$.isEmptyObject(paddingUserInfo.raw_json)) {
            trueUserInfo.raw_json = paddingUserInfo.raw_json;
        } else {
            trueUserInfo.raw_json = '';
        }*/
        /* Partners *************************************************/
        if (!$.isEmptyObject(paddingUserInfo.ip_id)) {
            trueUserInfo.ip_id = paddingUserInfo.ip_id;
        } else {
            trueUserInfo.ip_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.partner_id)) {
            trueUserInfo.partner_id = paddingUserInfo.partner_id;
        } else {
            trueUserInfo.partner_id = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.partner_spring)) {
            trueUserInfo.partner_spring = paddingUserInfo.partner_spring;
        } else {
            trueUserInfo.partner_spring = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.partner_user_display_name)) {
            trueUserInfo.partner_user_display_name = paddingUserInfo.partner_user_display_name;
        } else {
            trueUserInfo.partner_user_display_name = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.partner_user_picture)) {
            trueUserInfo.partner_user_picture = paddingUserInfo.partner_user_picture;
        } else {
            trueUserInfo.partner_user_picture = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.partner_country)) {
            trueUserInfo.partner_country = paddingUserInfo.partner_country;
        } else {
            trueUserInfo.partner_country = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.partner_city)) {
            trueUserInfo.partner_city = paddingUserInfo.partner_city;
        } else {
            trueUserInfo.partner_city = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.additional_item)) {
            trueUserInfo.additional_item = paddingUserInfo.additional_item;
        } else {
            trueUserInfo.additional_item = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.partner_status)) {
            trueUserInfo.partner_status = paddingUserInfo.partner_status;
        } else {
            trueUserInfo.partner_status = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.its_my_pend)) {
            trueUserInfo.its_my_pend = paddingUserInfo.its_my_pend;
        } else {
            trueUserInfo.its_my_pend = '';
        }
        if (!$.isEmptyObject(paddingUserInfo.status)) {
            trueUserInfo.status = paddingUserInfo.status;
        } else {
            trueUserInfo.status = '';
        }
        //console.log('paddingUserInfo trueUserInfo ---> ' + JSON.stringify(trueUserInfo));
        return trueUserInfo;
    } else {
        return false;
    }
}

var videmeUI = new Thing('Demo');

function Thing(name) {
    //console.log('Thing this ' + this);
    this.name = name;
    //console.log('Thing this.name333 ' + this.name333);
}


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