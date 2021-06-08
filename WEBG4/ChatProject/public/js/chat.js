/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/chat.js":
/*!******************************!*\
  !*** ./resources/js/chat.js ***!
  \******************************/
/***/ (() => {

function getFormattedDate(date) {
  date = new Date(date);
  var year = date.getFullYear().padStart(2, "0");
  var month = (date.getMonth() + 1).padStart(2, "0");
  var day = date.getDate().padStart(2, "0");
  var hour = date.getHours().padStart(2, "0");
  var min = date.getMinutes().padStart(2, "0");
  var sec = date.getSeconds().padStart(2, "0");
  return day + '/' + month + '/' + year + " " + hour + ":" + min + ":" + sec;
}

function loadMessages() {
  $.getJSON("/api/channels/" + getRoomId() + "/messages", function (data, status) {
    $(".messages").empty();

    if (data.length === 0) {
      $(".messages").append($('<div>').addClass("msg").append($('<div>').css("margin-bottom", ".5em").addClass("msg-text").text("Aucun message pour l'instant ! Mettez le premier !")));
    }

    data.forEach(function (item) {
      var user = item.displayName + " (" + item.login + ") - " + getFormattedDate(item.added_on);
      $(".messages").append($('<div>').addClass("msg").append($('<div>').addClass("msg-info").text(user)).append($('<div>').addClass("msg-text").text(item.content)));
    });
  });
}

function loadDynamicAside() {
  $.getJSON("/api/channels/", function (data) {
    $(".lateral").empty();
    data.forEach(function (item) {
      if (getRoomId() === item.id) {
        $("h2").text(item.name + " - " + item.topic);
      }

      $(".lateral").append($('<a>').attr("href", "/chat/" + item.id).append($('<div>').addClass("channel").addClass(getRoomId() === item.id ? "active" : "").text(item.name)));
    });
  });
}

function makeForm() {
  $("#addMessage").submit(function (e) {
    e.preventDefault();
    var $this = $(this);
    $(".alert").css("display", "none").empty().removeClass("error");
    $.ajax({
      url: $this.attr('action'),
      type: $this.attr('method'),
      data: new FormData(this),
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function success(json) {
        if (json) {
          loadMessages();
          $("textarea").val("").focus();
        } else {
          $(".alert").css("display", "block").addClass("error").append($("<p>").text("Une erreur est survenue, merci de réessayer."));
        }
      },
      error: function error(request) {
        var errors = request.responseJSON;
        $.each(errors.errors, function (k, v) {
          $(".alert").css("display", "block").addClass("error").append($("<p>").text(v));
        });
      }
    });
  });
}

$(document).ready(function () {
  $('textarea').focus();
  loadDynamicAside();
  loadMessages();
  makeForm();
  window.setInterval(loadMessages, 8000);
});

/***/ }),

/***/ "./resources/css/app.scss":
/*!********************************!*\
  !*** ./resources/css/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/chat.scss":
/*!*********************************!*\
  !*** ./resources/css/chat.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/channel.scss":
/*!************************************!*\
  !*** ./resources/css/channel.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/connection.scss":
/*!***************************************!*\
  !*** ./resources/css/connection.scss ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					result = fn();
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/chat": 0,
/******/ 			"css/connection": 0,
/******/ 			"css/channel": 0,
/******/ 			"css/chat": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) var result = runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/connection","css/channel","css/chat","css/app"], () => (__webpack_require__("./resources/js/chat.js")))
/******/ 	__webpack_require__.O(undefined, ["css/connection","css/channel","css/chat","css/app"], () => (__webpack_require__("./resources/css/app.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/connection","css/channel","css/chat","css/app"], () => (__webpack_require__("./resources/css/chat.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/connection","css/channel","css/chat","css/app"], () => (__webpack_require__("./resources/css/channel.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/connection","css/channel","css/chat","css/app"], () => (__webpack_require__("./resources/css/connection.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;