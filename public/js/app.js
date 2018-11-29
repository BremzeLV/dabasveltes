/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 42);
/******/ })
/************************************************************************/
/******/ ({

/***/ 42:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(43);


/***/ }),

/***/ 43:
/***/ (function(module, exports) {

$(function () {
    $.fn.selectpicker.Constructor.BootstrapVersion = '4';

    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.geocomplete').geocomplete({
        details: '#address-information',
        map: "#address-map",
        mapOptions: {
            zoom: 10
        },
        markerOptions: {
            draggable: true
        }
    });

    $('select').selectpicker();

    $('.geocomplete').trigger("geocode");

    if ($('*[data-upload-id="upload-input"]').length) {
        var upload = new FileUploadWithPreview('upload-input');
    }

    $('#notificationsDropdown').click(function () {
        if ($(this).parent().find('#notificationsDropdown[aria-expanded="false"]').length) {
            $.ajax({
                type: "GET",
                url: "/user/notificationsSeen",
                success: function success(data) {
                    console.log(data);
                    $('.notification-count').hide();
                    if (typeof data !== 'undefined' && data.length) {
                        var notifyArray = [];
                        for (var i = 0; i < data.length; i++) {
                            var className = '';

                            if (!data[i].is_seen) {
                                className = 'not-seen';
                            }

                            notifyArray.push('<li><a href="/' + data[i].link + '" class="notification-item ' + className + '">' + data[i].text + '</a></li>');
                        }
                        $('.notification-list').html(notifyArray);
                    } else {
                        $('.notification-list').html('<li><span class="notification-item alert alert-default">Nav paziņojumu</span></li>');
                    }
                }

            });
        }
    });

    $('.send-notification').on('click', function () {
        $.ajax({
            type: "POST",
            url: "/subscribe/notify",
            data: {
                id: $(this).data('id')
            },
            success: function success(data) {
                alert('Done!');
            }
        });
    });
});

/***/ })

/******/ });