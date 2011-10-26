/*          _\|/_
            (0 0)
--------o00o-{_}-o00o-----------------------

UCREASITE v1.0 (2011)
Funciones y procedimientos JQUERY generales
UCREATIVA.
--------------------------------------------
*/


// ---------------- SCROLL TO PLUGIN -----------------------

(function(jQuery){var m=jQuery.scrollTo=function(b,h,f){jQuery(window).scrollTo(b,h,f)};m.defaults={axis:'xy',duration:parseFloat(jQuery.fn.jquery)>=1.3?0:1};m.window=function(b){return jQuery(window).scrollable()};jQuery.fn.scrollable=function(){return this.map(function(){var b=this,h=!b.nodeName||jQuery.inArray(b.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!h)return b;var f=(b.contentWindow||b).document||b.ownerDocument||b;return jQuery.browser.safari||f.compatMode=='BackCompat'?f.body:f.documentElement})};jQuery.fn.scrollTo=function(l,j,a){if(typeof j=='object'){a=j;j=0}if(typeof a=='function')a={onAfter:a};if(l=='max')l=9e9;a=jQuery.extend({},m.defaults,a);j=j||a.speed||a.duration;a.queue=a.queue&&a.axis.length>1;if(a.queue)j/=2;a.offset=n(a.offset);a.over=n(a.over);return this.scrollable().each(function(){var k=this,o=jQuery(k),d=l,p,g={},q=o.is('html,body');switch(typeof d){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px)?jQuery/.test(d)){d=n(d);break}d=jQuery(d,this);case'object':if(d.is||d.style)p=(d=jQuery(d)).offset()}jQuery.each(a.axis.split(''),function(b,h){var f=h=='x'?'Left':'Top',i=f.toLowerCase(),c='scroll'+f,r=k[c],s=h=='x'?'Width':'Height';if(p){g[c]=p[i]+(q?0:r-o.offset()[i]);if(a.margin){g[c]-=parseInt(d.css('margin'+f))||0;g[c]-=parseInt(d.css('border'+f+'Width'))||0}g[c]+=a.offset[i]||0;if(a.over[i])g[c]+=d[s.toLowerCase()]()*a.over[i]}else g[c]=d[i];if(/^\d+jQuery/.test(g[c]))g[c]=g[c]<=0?0:Math.min(g[c],u(s));if(!b&&a.queue){if(r!=g[c])t(a.onAfterFirst);delete g[c]}});t(a.onAfter);function t(b){o.animate(g,j,a.easing,b&&function(){b.call(this,l,a)})};function u(b){var h='scroll'+b;if(!q)return k[h];var f='client'+b,i=k.ownerDocument.documentElement,c=k.ownerDocument.body;return Math.max(i[h],c[h])-Math.min(i[f],c[f])}}).end()};function n(b){return typeof b=='object'?b:{top:b,left:b}}})(jQuery);


(function($){$.fn.extend({scrollToTop:function(options){var defaults={speed:"slow",ease:"jswing",start:0}
var options=$.extend(defaults,options);return this.each(function(){var o=options;var scrollDiv=$(this);$(this).hide().removeAttr("href").css("cursor","pointer");if($(window).scrollTop()>o.start){$(this).fadeIn("slow");}$(window).scroll(function(){if($(window).scrollTop()>o.start){$(scrollDiv).fadeIn("slow");}else{$(scrollDiv).fadeOut("slow");}});});}});})(jQuery);


// ---------------- SCROLL TO PLUGIN -----------------------