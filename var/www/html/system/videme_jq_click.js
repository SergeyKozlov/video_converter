console.log("videme_jq_click.js");

//$(document).on('click', 'span.videme-chart-button-1st2weeks', function (event) {
$(document).on('click', 'span.videme-chart-button', function (event) {
    //event.preventDefault();
    var $this = $(this);
    var item_id = $this.attr('item_id');
    var time_shift_type = $this.attr('time_shift_type');
    var time_shift_val = $this.attr('time_shift_val');
    var state = $('#videme-chart-stump_' + item_id).attr('state');
    var toggled = $('#videme-chart-stump_' + item_id).attr('toggled');
    if (toggled == 'false') {
        removeURLparam('d_start');
        removeURLparam('d_stop');
        removeURLparam('w_start');
        removeURLparam('w_stop');
        removeURLparam('m_start');
        removeURLparam('m_stop');
        URLUpdate(time_shift_type, time_shift_val);
    }
    $('#videme-chart-stump_' + item_id).attr('time_shift_type', time_shift_type).attr('time_shift_val', time_shift_val);
    //$('.videme-chart-button').removeClass('text-bg-primary').addClass('text-bg-secondary');
    $('.videme-chart-button_' + item_id).removeClass('text-bg-primary').addClass('text-bg-secondary');
    //$('#videme-chart-button-1st2weeks_' + item_id).removeClass('text-bg-secondary').addClass('text-bg-primary');
    $(this).removeClass('text-bg-secondary').addClass('text-bg-primary');
    //$('#videme-item-chart-canvas_' + item_id).remove();
    //$('#videme-item-chart-canvas-place_' + item_id).append('<canvas id="videme-item-chart-canvas_' + item_id + '"></canvas>');
    var param = {
        item: item_id,
        showChartShareItemId: 'videme-item-chart-canvas_' + item_id,
        [time_shift_type]: time_shift_val,
        state: state
    };
    console.log('click span.videme-chart-button-1st2weeks param: ' + JSON.stringify(param));
    $('#videme-item-chart-canvas_' + item_id).showChartShareItem(param);
});
$(document).on('click', 'span.videme-chart-pop-state-button', function (event) {
    //event.preventDefault();
    var $this = $(this);
    var item_id = $this.attr('item_id');
    var state = $this.attr('state');
    var time_shift_val = $('#videme-chart-stump_' + item_id).attr('time_shift_val');
    var time_shift_type = $('#videme-chart-stump_' + item_id).attr('time_shift_type');
    $('#videme-chart-stump_' + item_id).attr('state', state);
    //$('.videme-chart-button').removeClass('text-bg-primary').addClass('text-bg-secondary');
    $('.videme-chart-pop-state-button_' + item_id).removeClass('text-bg-primary').addClass('text-bg-secondary');
    //$('#videme-chart-button-1st2weeks_' + item_id).removeClass('text-bg-secondary').addClass('text-bg-primary');
    $(this).removeClass('text-bg-secondary').addClass('text-bg-primary');
    var param = {
        item: item_id,
        showChartShareItemId: 'videme-item-chart-canvas_' + item_id,
        [time_shift_type]: time_shift_val,
        state: state
    };
    console.log('click span.videme-chart-button-1st2weeks param: ' + JSON.stringify(param));
    $('#videme-item-chart-canvas_' + item_id).showChartShareItem(param);
});
$(document).on('click', '#chart_run', function (event){
    //event.preventDefault();
    var $this = $(this);
    var item_id = $this.attr('item_id');

    console.log('click chart_run item_id: ' + item_id);

    $.fn.showRunChartUpdate({'item_id': item_id});
});
$(document).on('click', '#chart_next', function (event){
    //event.preventDefault();
    var $this = $(this);
    var item_data = {};
    item_data.item_id = $this.attr('item_id');
    item_data.title = $this.attr('title');
    item_data.content = $this.attr('content');
    console.log('click chart_next item_id: ' + JSON.stringify(item_data));
    /*$('#chart_run').attr('item_id', item_id);
    $('#geo_chart_image').attr('src', 'https://pre-image-w320.videcdn.net/' + item_id + '-pre-i-w320.jpg');
    $('#geo_chart_title').html(geo_chart_title);
    $('#geo_chart_content').html(geo_chart_content);*/
    itemCardUpdate(item_data);
    //$('#videme-item-chart-canvas_' + item_data.item_id).empty();
    $('#videme-item-chart-canvas-place_' + item_data.item_id).empty();
    //$('#videme-chart-pop-states-place_' + item_data.item_id).empty();
    $('#videme-chart-pop-states-place_' + item_data.item_id).empty();
});

$(document).on('click', '#videme_upload_video_image', function (event){

    event.preventDefault();
    //if ($.cookie('vide_nad')) {
        require(['videme_upload'], function(videme_upload) {
            videme_upload.uploadItint();
        });
        //=== $('#modal-videme_upload_video_image').modal('show');
        //$('#upload_type').val('upload_image');
        //===$('#nad').val($.cookie('vide_nad'));
        //$('#access').val('public');
        //setUploadModal();
    /*} else {
        //$('#modal-signin').modal('show');
        //$('#feedback').val(window.location.href);
        gotoLogin();
    }*/
});

$(document).on('click', '.for_action_video', function (event){
    var $this = $(this);
    var item_data = {};
    item_data.item_id = $this.attr('item_id');
    //event.preventDefault();
    //if ($.cookie('vide_nad')) {
 //       require(['videme_upload'], function(videme_upload) {
 //           videme_upload.uploadItint();
 //       });
        //=== $('#modal-videme_upload_video_image').modal('show');
        //$('#upload_type').val('upload_image');
        //===$('#nad').val($.cookie('vide_nad'));
        //$('#access').val('public');
        //setUploadModal();
    /*} else {
        //$('#modal-signin').modal('show');
        //$('#feedback').val(window.location.href);
        gotoLogin();
    }*/
    var options = {};
    var options = {
        "poster": '/media/' + item_data.item_id + '.jpg',
        "preload": "auto",
        "autoplay": true
    };
    //$('#action_video').empty();
    require(['video.js'], function(videojs) {

    var player = videojs('action_video', options, function onPlayerReady() {
        //videojs(player).dispose();
        var video_player = this;
        //video_player.dispose();
        videojs.log('Your player is ready!');
        video_player.src({
            type: "application/x-mpegURL",
            //src: 'https://s3.amazonaws.com/video.vide.me/' + value.item_id + '.m3u8', // TODO: add message_id
            src: '/media/' + item_data.item_id + '.m3u8', // TODO: add message_id
        });
        // In this context, `this` is the player that was created by Video.js.
        this.play();

        // How about an event listener?
        this.on('ended', function() {
            videojs.log('Awww...over so soon?!');
        });
    });

    });
});
