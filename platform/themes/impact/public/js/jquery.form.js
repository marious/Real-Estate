/*!
 * jQuery Form Plugin
 * version: 3.32.0-2013.04.09
 * @requires jQuery v1.5 or later
 * Copyright (c) 2013 M. Alsup
 * Examples and documentation at: http://malsup.com/jquery/form/
 * Project repository: https://github.com/malsup/form
 * Dual licensed under the MIT and GPL licenses.
 * https://github.com/malsup/form#copyright-and-license
 */
!function(e){"use strict";var t={};t.fileapi=void 0!==e("<input type='file'/>").get(0).files,t.formdata=void 0!==window.FormData;var r=!!e.fn.prop;function a(t){var r=t.data;t.isDefaultPrevented()||(t.preventDefault(),e(this).ajaxSubmit(r))}function n(t){var r=t.target,a=e(r);if(!a.is("[type=submit],[type=image]")){var n=a.closest("[type=submit]");if(0===n.length)return;r=n[0]}var i=this;if(i.clk=r,"image"==r.type)if(void 0!==t.offsetX)i.clk_x=t.offsetX,i.clk_y=t.offsetY;else if("function"==typeof e.fn.offset){var o=a.offset();i.clk_x=t.pageX-o.left,i.clk_y=t.pageY-o.top}else i.clk_x=t.pageX-r.offsetLeft,i.clk_y=t.pageY-r.offsetTop;setTimeout((function(){i.clk=i.clk_x=i.clk_y=null}),100)}function i(){if(e.fn.ajaxSubmit.debug){var t="[jquery.form] "+Array.prototype.join.call(arguments,"");window.console&&window.console.log?window.console.log(t):window.opera&&window.opera.postError&&window.opera.postError(t)}}e.fn.attr2=function(){if(!r)return this.attr.apply(this,arguments);var e=this.prop.apply(this,arguments);return e&&e.jquery||"string"==typeof e?e:this.attr.apply(this,arguments)},e.fn.ajaxSubmit=function(a){if(!this.length)return i("ajaxSubmit: skipping submit process - no element selected"),this;var n,o,s,u=this;"function"==typeof a&&(a={success:a}),n=this.attr2("method"),(s=(s="string"==typeof(o=this.attr2("action"))?e.trim(o):"")||window.location.href||"")&&(s=(s.match(/^([^#]+)/)||[])[1]),a=e.extend(!0,{url:s,success:e.ajaxSettings.success,type:n||"GET",iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},a);var l={};if(this.trigger("form-pre-serialize",[this,a,l]),l.veto)return i("ajaxSubmit: submit vetoed via form-pre-serialize trigger"),this;if(a.beforeSerialize&&!1===a.beforeSerialize(this,a))return i("ajaxSubmit: submit aborted via beforeSerialize callback"),this;var c=a.traditional;void 0===c&&(c=e.ajaxSettings.traditional);var f,m=[],d=this.formToArray(a.semantic,m);if(a.data&&(a.extraData=a.data,f=e.param(a.data,c)),a.beforeSubmit&&!1===a.beforeSubmit(d,this,a))return i("ajaxSubmit: submit aborted via beforeSubmit callback"),this;if(this.trigger("form-submit-validate",[d,this,a,l]),l.veto)return i("ajaxSubmit: submit vetoed via form-submit-validate trigger"),this;var p=e.param(d,c);f&&(p=p?p+"&"+f:f),"GET"==a.type.toUpperCase()?(a.url+=(a.url.indexOf("?")>=0?"&":"?")+p,a.data=null):a.data=p;var h=[];if(a.resetForm&&h.push((function(){u.resetForm()})),a.clearForm&&h.push((function(){u.clearForm(a.includeHidden)})),!a.dataType&&a.target){var v=a.success||function(){};h.push((function(t){var r=a.replaceTarget?"replaceWith":"html";e(a.target)[r](t).each(v,arguments)}))}else a.success&&h.push(a.success);a.success=function(e,t,r){for(var n=a.context||this,i=0,o=h.length;i<o;i++)h[i].apply(n,[e,t,r||u,u])};var g=e('input[type=file]:enabled[value!=""]',this).length>0,x="multipart/form-data",b=u.attr("enctype")==x||u.attr("encoding")==x,y=t.fileapi&&t.formdata;i("fileAPI :"+y);var T,j=(g||b)&&!y;!1!==a.iframe&&(a.iframe||j)?a.closeKeepAlive?e.get(a.closeKeepAlive,(function(){T=S(d)})):T=S(d):T=(g||b)&&y?function(t){for(var r=new FormData,i=0;i<t.length;i++)r.append(t[i].name,t[i].value);if(a.extraData){var o=function(t){var r,a,n=e.param(t).split("&"),i=n.length,o=[];for(r=0;r<i;r++)n[r]=n[r].replace(/\+/g," "),a=n[r].split("="),o.push([decodeURIComponent(a[0]),decodeURIComponent(a[1])]);return o}(a.extraData);for(i=0;i<o.length;i++)o[i]&&r.append(o[i][0],o[i][1])}a.data=null;var s=e.extend(!0,{},e.ajaxSettings,a,{contentType:!1,processData:!1,cache:!1,type:n||"POST"});a.uploadProgress&&(s.xhr=function(){var e=jQuery.ajaxSettings.xhr();return e.upload&&e.upload.addEventListener("progress",(function(e){var t=0,r=e.loaded||e.position,n=e.total;e.lengthComputable&&(t=Math.ceil(r/n*100)),a.uploadProgress(e,r,n,t)}),!1),e});s.data=null;var u=s.beforeSend;return s.beforeSend=function(e,t){t.data=r,u&&u.call(this,e,t)},e.ajax(s)}(d):e.ajax(a),u.removeData("jqxhr").data("jqxhr",T);for(var w=0;w<m.length;w++)m[w]=null;return this.trigger("form-submit-notify",[this,a]),this;function S(t){var o,s,l,c,f,d,p,h,v,g,x,b,y=u[0],T=e.Deferred();if(t)for(s=0;s<m.length;s++)o=e(m[s]),r?o.prop("disabled",!1):o.removeAttr("disabled");if((l=e.extend(!0,{},e.ajaxSettings,a)).context=l.context||l,f="jqFormIO"+(new Date).getTime(),l.iframeTarget?(g=(d=e(l.iframeTarget)).attr2("name"))?f=g:d.attr2("name",f):(d=e('<iframe name="'+f+'" src="'+l.iframeSrc+'" />')).css({position:"absolute",top:"-1000px",left:"-1000px"}),p=d[0],h={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(t){var r="timeout"===t?"timeout":"aborted";i("aborting upload... "+r),this.aborted=1;try{p.contentWindow.document.execCommand&&p.contentWindow.document.execCommand("Stop")}catch(e){}d.attr("src",l.iframeSrc),h.error=r,l.error&&l.error.call(l.context,h,r,t),c&&e.event.trigger("ajaxError",[h,l,r]),l.complete&&l.complete.call(l.context,h,r)}},(c=l.global)&&0==e.active++&&e.event.trigger("ajaxStart"),c&&e.event.trigger("ajaxSend",[h,l]),l.beforeSend&&!1===l.beforeSend.call(l.context,h,l))return l.global&&e.active--,T.reject(),T;if(h.aborted)return T.reject(),T;(v=y.clk)&&(g=v.name)&&!v.disabled&&(l.extraData=l.extraData||{},l.extraData[g]=v.value,"image"==v.type&&(l.extraData[g+".x"]=y.clk_x,l.extraData[g+".y"]=y.clk_y));function j(e){var t=null;try{e.contentWindow&&(t=e.contentWindow.document)}catch(e){i("cannot get iframe.contentWindow document: "+e)}if(t)return t;try{t=e.contentDocument?e.contentDocument:e.document}catch(r){i("cannot get iframe.contentDocument: "+r),t=e.document}return t}var w=e("meta[name=csrf-token]").attr("content"),S=e("meta[name=csrf-param]").attr("content");function k(){var t=u.attr2("target"),r=u.attr2("action");y.setAttribute("target",f),n||y.setAttribute("method","POST"),r!=l.url&&y.setAttribute("action",l.url),l.skipEncodingOverride||n&&!/post/i.test(n)||u.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"}),l.timeout&&(b=setTimeout((function(){x=!0,M(1)}),l.timeout));var a=[];try{if(l.extraData)for(var o in l.extraData)l.extraData.hasOwnProperty(o)&&(e.isPlainObject(l.extraData[o])&&l.extraData[o].hasOwnProperty("name")&&l.extraData[o].hasOwnProperty("value")?a.push(e('<input type="hidden" name="'+l.extraData[o].name+'">').val(l.extraData[o].value).appendTo(y)[0]):a.push(e('<input type="hidden" name="'+o+'">').val(l.extraData[o]).appendTo(y)[0]));l.iframeTarget||(d.appendTo("body"),p.attachEvent?p.attachEvent("onload",M):p.addEventListener("load",M,!1)),setTimeout((function e(){try{var t=j(p).readyState;i("state = "+t),t&&"uninitialized"==t.toLowerCase()&&setTimeout(e,50)}catch(e){i("Server abort: ",e," (",e.name,")"),M(2),b&&clearTimeout(b),b=void 0}}),15);try{y.submit()}catch(e){document.createElement("form").submit.apply(y)}}finally{y.setAttribute("action",r),t?y.setAttribute("target",t):u.removeAttr("target"),e(a).remove()}}S&&w&&(l.extraData=l.extraData||{},l.extraData[S]=w),l.forceSync?k():setTimeout(k,10);var D,A,E,L=50;function M(t){if(!h.aborted&&!E){if((A=j(p))||(i("cannot access response document"),t=2),1===t&&h)return h.abort("timeout"),void T.reject(h,"timeout");if(2==t&&h)return h.abort("server abort"),void T.reject(h,"error","server abort");if(A&&A.location.href!=l.iframeSrc||x){p.detachEvent?p.detachEvent("onload",M):p.removeEventListener("load",M,!1);var r,a="success";try{if(x)throw"timeout";var n="xml"==l.dataType||A.XMLDocument||e.isXMLDoc(A);if(i("isXml="+n),!n&&window.opera&&(null===A.body||!A.body.innerHTML)&&--L)return i("requeing onLoad callback, DOM not available"),void setTimeout(M,250);var o=A.body?A.body:A.documentElement;h.responseText=o?o.innerHTML:null,h.responseXML=A.XMLDocument?A.XMLDocument:A,n&&(l.dataType="xml"),h.getResponseHeader=function(e){return{"content-type":l.dataType}[e]},o&&(h.status=Number(o.getAttribute("status"))||h.status,h.statusText=o.getAttribute("statusText")||h.statusText);var s=(l.dataType||"").toLowerCase(),u=/(json|script|text)/.test(s);if(u||l.textarea){var f=A.getElementsByTagName("textarea")[0];if(f)h.responseText=f.value,h.status=Number(f.getAttribute("status"))||h.status,h.statusText=f.getAttribute("statusText")||h.statusText;else if(u){var m=A.getElementsByTagName("pre")[0],v=A.getElementsByTagName("body")[0];m?h.responseText=m.textContent?m.textContent:m.innerText:v&&(h.responseText=v.textContent?v.textContent:v.innerText)}}else"xml"==s&&!h.responseXML&&h.responseText&&(h.responseXML=F(h.responseText));try{D=X(h,s,l)}catch(e){a="parsererror",h.error=r=e||a}}catch(e){i("error caught: ",e),a="error",h.error=r=e||a}h.aborted&&(i("upload aborted"),a=null),h.status&&(a=h.status>=200&&h.status<300||304===h.status?"success":"error"),"success"===a?(l.success&&l.success.call(l.context,D,"success",h),T.resolve(h.responseText,"success",h),c&&e.event.trigger("ajaxSuccess",[h,l])):a&&(void 0===r&&(r=h.statusText),l.error&&l.error.call(l.context,h,a,r),T.reject(h,"error",r),c&&e.event.trigger("ajaxError",[h,l,r])),c&&e.event.trigger("ajaxComplete",[h,l]),c&&!--e.active&&e.event.trigger("ajaxStop"),l.complete&&l.complete.call(l.context,h,a),E=!0,l.timeout&&clearTimeout(b),setTimeout((function(){l.iframeTarget||d.remove(),h.responseXML=null}),100)}}}var F=e.parseXML||function(e,t){return window.ActiveXObject?((t=new ActiveXObject("Microsoft.XMLDOM")).async="false",t.loadXML(e)):t=(new DOMParser).parseFromString(e,"text/xml"),t&&t.documentElement&&"parsererror"!=t.documentElement.nodeName?t:null},O=e.parseJSON||function(e){return window.eval("("+e+")")},X=function(t,r,a){var n=t.getResponseHeader("content-type")||"",i="xml"===r||!r&&n.indexOf("xml")>=0,o=i?t.responseXML:t.responseText;return i&&"parsererror"===o.documentElement.nodeName&&e.error&&e.error("parsererror"),a&&a.dataFilter&&(o=a.dataFilter(o,r)),"string"==typeof o&&("json"===r||!r&&n.indexOf("json")>=0?o=O(o):("script"===r||!r&&n.indexOf("javascript")>=0)&&e.globalEval(o)),o};return T}},e.fn.ajaxForm=function(t){if((t=t||{}).delegation=t.delegation&&e.isFunction(e.fn.on),!t.delegation&&0===this.length){var r={s:this.selector,c:this.context};return!e.isReady&&r.s?(i("DOM not ready, queuing ajaxForm"),e((function(){e(r.s,r.c).ajaxForm(t)})),this):(i("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)")),this)}return t.delegation?(e(document).off("submit.form-plugin",this.selector,a).off("click.form-plugin",this.selector,n).on("submit.form-plugin",this.selector,t,a).on("click.form-plugin",this.selector,t,n),this):this.ajaxFormUnbind().bind("submit.form-plugin",t,a).bind("click.form-plugin",t,n)},e.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")},e.fn.formToArray=function(r,a){var n=[];if(0===this.length)return n;var i,o,s,u,l,c,f,m=this[0],d=r?m.getElementsByTagName("*"):m.elements;if(!d)return n;for(i=0,c=d.length;i<c;i++)if((s=(l=d[i]).name)&&!l.disabled)if(r&&m.clk&&"image"==l.type)m.clk==l&&(n.push({name:s,value:e(l).val(),type:l.type}),n.push({name:s+".x",value:m.clk_x},{name:s+".y",value:m.clk_y}));else if((u=e.fieldValue(l,!0))&&u.constructor==Array)for(a&&a.push(l),o=0,f=u.length;o<f;o++)n.push({name:s,value:u[o]});else if(t.fileapi&&"file"==l.type){a&&a.push(l);var p=l.files;if(p.length)for(o=0;o<p.length;o++)n.push({name:s,value:p[o],type:l.type});else n.push({name:s,value:"",type:l.type})}else null!=u&&(a&&a.push(l),n.push({name:s,value:u,type:l.type,required:l.required}));if(!r&&m.clk){var h=e(m.clk),v=h[0];(s=v.name)&&!v.disabled&&"image"==v.type&&(n.push({name:s,value:h.val()}),n.push({name:s+".x",value:m.clk_x},{name:s+".y",value:m.clk_y}))}return n},e.fn.formSerialize=function(t){return e.param(this.formToArray(t))},e.fn.fieldSerialize=function(t){var r=[];return this.each((function(){var a=this.name;if(a){var n=e.fieldValue(this,t);if(n&&n.constructor==Array)for(var i=0,o=n.length;i<o;i++)r.push({name:a,value:n[i]});else null!=n&&r.push({name:this.name,value:n})}})),e.param(r)},e.fn.fieldValue=function(t){for(var r=[],a=0,n=this.length;a<n;a++){var i=this[a],o=e.fieldValue(i,t);null==o||o.constructor==Array&&!o.length||(o.constructor==Array?e.merge(r,o):r.push(o))}return r},e.fieldValue=function(t,r){var a=t.name,n=t.type,i=t.tagName.toLowerCase();if(void 0===r&&(r=!0),r&&(!a||t.disabled||"reset"==n||"button"==n||("checkbox"==n||"radio"==n)&&!t.checked||("submit"==n||"image"==n)&&t.form&&t.form.clk!=t||"select"==i&&-1==t.selectedIndex))return null;if("select"==i){var o=t.selectedIndex;if(o<0)return null;for(var s=[],u=t.options,l="select-one"==n,c=l?o+1:u.length,f=l?o:0;f<c;f++){var m=u[f];if(m.selected){var d=m.value;if(d||(d=m.attributes&&m.attributes.value&&!m.attributes.value.specified?m.text:m.value),l)return d;s.push(d)}}return s}return e(t).val()},e.fn.clearForm=function(t){return this.each((function(){e("input,select,textarea",this).clearFields(t)}))},e.fn.clearFields=e.fn.clearInputs=function(t){var r=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each((function(){var a=this.type,n=this.tagName.toLowerCase();r.test(a)||"textarea"==n?this.value="":"checkbox"==a||"radio"==a?this.checked=!1:"select"==n?this.selectedIndex=-1:"file"==a?/MSIE/.test(navigator.userAgent)?e(this).replaceWith(e(this).clone(!0)):e(this).val(""):t&&(!0===t&&/hidden/.test(a)||"string"==typeof t&&e(this).is(t))&&(this.value="")}))},e.fn.resetForm=function(){return this.each((function(){("function"==typeof this.reset||"object"==typeof this.reset&&!this.reset.nodeType)&&this.reset()}))},e.fn.enable=function(e){return void 0===e&&(e=!0),this.each((function(){this.disabled=!e}))},e.fn.selected=function(t){return void 0===t&&(t=!0),this.each((function(){var r=this.type;if("checkbox"==r||"radio"==r)this.checked=t;else if("option"==this.tagName.toLowerCase()){var a=e(this).parent("select");t&&a[0]&&"select-one"==a[0].type&&a.find("option").selected(!1),this.selected=t}}))},e.fn.ajaxSubmit.debug=!1}(jQuery);
