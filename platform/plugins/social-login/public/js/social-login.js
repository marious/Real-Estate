!function(e){var n={};function o(t){if(n[t])return n[t].exports;var r=n[t]={i:t,l:!1,exports:{}};return e[t].call(r.exports,r,r.exports,o),r.l=!0,r.exports}o.m=e,o.c=n,o.d=function(e,n,t){o.o(e,n)||Object.defineProperty(e,n,{enumerable:!0,get:t})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(e,n){if(1&n&&(e=o(e)),8&n)return e;if(4&n&&"object"==typeof e&&e&&e.__esModule)return e;var t=Object.create(null);if(o.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:e}),2&n&&"string"!=typeof e)for(var r in e)o.d(t,r,function(n){return e[n]}.bind(null,r));return t},o.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(n,"a",n),n},o.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},o.p="/",o(o.s=202)}({202:function(e,n,o){e.exports=o(203)},203:function(e,n){function o(e,n){for(var o=0;o<n.length;o++){var t=n[o];t.enumerable=t.enumerable||!1,t.configurable=!0,"value"in t&&(t.writable=!0),Object.defineProperty(e,t.key,t)}}var t=function(){function e(){!function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}(this,e)}var n,t,r;return n=e,(t=[{key:"init",value:function(){$("#social_login_enable").on("change",(function(e){$(e.currentTarget).prop("checked")?$(".wrapper-list-social-login-options").show():$(".wrapper-list-social-login-options").hide()})),$(".enable-social-login-option").on("change",(function(e){var n=$(e.currentTarget);n.prop("checked")?(n.closest(".wrapper-content").find(".enable-social-login-option-wrapper").show(),n.closest(".form-group").removeClass("mb-0")):(n.closest(".wrapper-content").find(".enable-social-login-option-wrapper").hide(),n.closest(".form-group").addClass("mb-0"))}))}}])&&o(n.prototype,t),r&&o(n,r),e}();$(document).ready((function(){(new t).init()}))}});