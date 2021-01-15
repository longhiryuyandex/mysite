require('@fortawesome/fontawesome-free/js/all.js');
require('./bootstrap');
require('jquery-datetimepicker/build/jquery.datetimepicker.full.js');
window.toastr = require('toastr');
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "300",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
require("jquery-confirm/dist/jquery-confirm.min.js");
require('./scripts');
require('./product');
