requirejs.config({
    'waitSeconds' : 25,
    "baseUrl": "",
    "paths": {
        "app": "",
        "jquery": "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min",
        "bootstrap.bundle.min": "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min",
        "moment": "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min",  // videme_addons
        "geo_chart_jq": "/system/geo_chart_jq", // geo_chart_jq
        "videme_func1": "/system/videme_func1", // videme_app
        "videme_jq_click": "/system/videme_jq_click", // videme_app
        "videme_upload": "/system/videme_upload_r", // videme_app
        "video": "https://unpkg.com/video.js/dist/video.min",
        "image-picker": "https://api.vide.me/system/image-picker.min", // videme_addons
        "chartjs": "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min",
        "chartjs-adapter-moment": "https://cdnjs.cloudflare.com/ajax/libs/chartjs-adapter-moment/1.0.0/chartjs-adapter-moment.min", // videme_addons
        "jquery-ui": "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min",
        "jquery-ui/ui/widget": "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/jquery.ui.widget.min",
        "jquery.cookie": "https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/jquery.cookie",
        "jquery.fileupload": "https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.30.0/js/jquery.fileupload"

    },
    map: {
        '*': {
            "video.js": "video",
            "chart.js": "chartjs"
        }
    },
    shim: {
        'jquery': { // TODO: remove NOO
            exports: '$'
        },
        'geo_chart_jq': {
            deps: ['videme_func1', 'videme_jq_click', 'jquery', 'jquery.cookie', 'image-picker']
        },
        'videme_func1': {
            deps: ['jquery', "moment", 'chartjs', 'chartjs-adapter-moment'],
        },
        'videme_jq_click': {
            deps: ['videme_func1', 'jquery', "moment"],
        },
        'jquery.fileupload': {
            deps: ['jquery', 'jquery-ui/ui/widget' /*, 'jquery.hashtags', 'jquery.autosize'*/]
        },
        'bootstrap.bundle.min': {
            deps: [/*'img_cropper', 'cropperjs', 'jquery-cropper'*/]
        },
        'videme_upload': {
            deps: ['geo_chart_jq', 'videme_func1', 'videme_jq_click', 'jquery', 'jquery.fileupload', 'jquery-ui']
        },
        'image-picker': {
            deps: ['jquery']
        },
        deps:["jquery", 'moment', 'geo_chart_jq', ]
    }
});

requirejs(['jquery', "bootstrap.bundle.min", 'geo_chart_jq', 'video']);

define('global/document', ['global/window'], function (window) {
    return window.document;
});

// window.js file
define('global/window', [], function () {
    return window;
});

define('global/document', ['global/window'], function (window) {
    return window.global;
});

requirejs.onError = function (err) {
    console.log(err.requireType);
    if (err.requireType === 'timeout') {
        console.log('modules: ' + err.requireModules);
    }

    throw err;
};
