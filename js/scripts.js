//幻灯片
(function(w){var E=w(window),u,f,F=-1,n,x,D,v,y,L,r,m=!window.XMLHttpRequest,s=[],l=document.documentElement,k={},t=new Image(),J=new Image(),H,a,g,p,I,d,G,c,A,K;w(function(){w("body").append(w([H=w('<div id="lbOverlay" />')[0],a=w('<div id="lbCenter" />')[0],G=w('<div id="lbBottomContainer" />')[0]]).css("display","none"));g=w('<div id="lbImage" />').appendTo(a).append(p=w('<div style="position: relative;" />').append([I=w('<a id="lbPrevLink" href="#" />').click(B)[0],d=w('<a id="lbNextLink" href="#" />').click(e)[0]])[0])[0];c=w('<div id="lbBottom" />').appendTo(G).append([w('<a id="lbCloseLink" href="#" />').add(H).click(C)[0],A=w('<div id="lbCaption" />')[0],K=w('<div id="lbNumber" />')[0],w('<div style="clear: both;" />')[0]])[0]});w.slimbox=function(O,N,M){u=w.extend({loop:false,overlayOpacity:0.8,overlayFadeDuration:400,resizeDuration:400,resizeEasing:"swing",initialWidth:250,initialHeight:250,imageFadeDuration:400,captionAnimationDuration:400,counterText:"Image {x} of {y}",closeKeys:[27,88,67],previousKeys:[37,80],nextKeys:[39,78]},M);if(typeof O=="string"){O=[[O,N]];N=0}y=E.scrollTop()+(E.height()/2);L=u.initialWidth;r=u.initialHeight;w(a).css({top:Math.max(0,y-(r/2)),width:L,height:r,marginLeft:-L/2}).show();v=m||(H.currentStyle&&(H.currentStyle.position!="fixed"));if(v){H.style.position="absolute"}w(H).css("opacity",u.overlayOpacity).fadeIn(u.overlayFadeDuration);z();j(1);f=O;u.loop=u.loop&&(f.length>1);return b(N)};w.fn.slimbox=function(M,P,O){P=P||function(Q){return[Q.href,Q.title]};O=O||function(){return true};var N=this;return N.unbind("click").click(function(){var S=this,U=0,T,Q=0,R;T=w.grep(N,function(W,V){return O.call(S,W,V)});for(R=T.length;Q<R;++Q){if(T[Q]==S){U=Q}T[Q]=P(T[Q],Q)}return w.slimbox(T,U,M)})};function z(){var N=E.scrollLeft(),M=E.width();w([a,G]).css("left",N+(M/2));if(v){w(H).css({left:N,top:E.scrollTop(),width:M,height:E.height()})}}function j(M){if(M){w("object").add(m?"select":"embed").each(function(O,P){s[O]=[P,P.style.visibility];P.style.visibility="hidden"})}else{w.each(s,function(O,P){P[0].style.visibility=P[1]});s=[]}var N=M?"bind":"unbind";E[N]("scroll resize",z);w(document)[N]("keydown",o)}function o(O){var N=O.keyCode,M=w.inArray;return(M(N,u.closeKeys)>=0)?C():(M(N,u.nextKeys)>=0)?e():(M(N,u.previousKeys)>=0)?B():false}function B(){return b(x)}function e(){return b(D)}function b(M){if(M>=0){F=M;n=f[F][0];x=(F||(u.loop?f.length:0))-1;D=((F+1)%f.length)||(u.loop?0:-1);q();a.className="lbLoading";k=new Image();k.onload=i;k.src=n}return false}function i(){a.className="";w(g).css({backgroundImage:"url("+n+")",visibility:"hidden",display:""});w(p).width(k.width);w([p,I,d]).height(k.height);w(A).html(f[F][1]||"");w(K).html((((f.length>1)&&u.counterText)||"").replace(/{x}/,F+1).replace(/{y}/,f.length));if(x>=0){t.src=f[x][0]}if(D>=0){J.src=f[D][0]}L=g.offsetWidth;r=g.offsetHeight;var M=Math.max(0,y-(r/2));if(a.offsetHeight!=r){w(a).animate({height:r,top:M},u.resizeDuration,u.resizeEasing)}if(a.offsetWidth!=L){w(a).animate({width:L,marginLeft:-L/2},u.resizeDuration,u.resizeEasing)}w(a).queue(function(){w(G).css({width:L,top:M+r,marginLeft:-L/2,visibility:"hidden",display:""});w(g).css({display:"none",visibility:"",opacity:""}).fadeIn(u.imageFadeDuration,h)})}function h(){if(x>=0){w(I).show()}if(D>=0){w(d).show()}w(c).css("marginTop",-c.offsetHeight).animate({marginTop:0},u.captionAnimationDuration);G.style.visibility=""}function q(){k.onload=null;k.src=t.src=J.src=n;w([a,g,c]).stop(true);w([I,d,g,G]).hide()}function C(){if(F>=0){q();F=x=D=-1;w(a).hide();w(H).stop().fadeOut(u.overlayFadeDuration,j)}return false}})(jQuery);
;(function(a){var b=function(b,c){var d=a.extend({},a.fn.nivoSlider.defaults,c);var e={currentSlide:0,currentImage:"",totalSlides:0,running:false,paused:false,stop:false};var f=a(b);f.data("nivo:vars",e);f.css("position","relative");f.addClass("nivoSlider");var g=f.children();g.each(function(){var b=a(this);var c="";if(!b.is("img")){if(b.is("a")){b.addClass("nivo-imageLink");c=b}b=b.find("img:first")}var d=b.width();if(d==0)d=b.attr("width");var g=b.height();if(g==0)g=b.attr("height");if(d>f.width()){f.width(d)}if(g>f.height()){f.height(g)}if(c!=""){c.css("display","none")}b.css("display","none");e.totalSlides++});if(d.randomStart){d.startSlide=Math.floor(Math.random()*e.totalSlides)}if(d.startSlide>0){if(d.startSlide>=e.totalSlides)d.startSlide=e.totalSlides-1;e.currentSlide=d.startSlide}if(a(g[e.currentSlide]).is("img")){e.currentImage=a(g[e.currentSlide])}else{e.currentImage=a(g[e.currentSlide]).find("img:first")}if(a(g[e.currentSlide]).is("a")){a(g[e.currentSlide]).css("display","block")}f.css("background",'url("'+e.currentImage.attr("src")+'") no-repeat');f.append(a('<div class="nivo-caption"><p></p></div>').css({display:"none",opacity:d.captionOpacity}));a(".nivo-caption",f).css("opacity",0);var h=function(b){var c=a(".nivo-caption",f);if(e.currentImage.attr("title")!=""&&e.currentImage.attr("title")!=undefined){var d=e.currentImage.attr("title");if(d.substr(0,1)=="#")d=a(d).html();if(c.css("opacity")!=0){c.find("p").stop().fadeTo(b.animSpeed,0,function(){a(this).html(d);a(this).stop().fadeTo(b.animSpeed,1)})}else{c.find("p").html(d)}c.stop().fadeTo(b.animSpeed,b.captionOpacity)}else{c.stop().fadeTo(b.animSpeed,0)}};h(d);var i=0;if(!d.manualAdvance&&g.length>1){i=setInterval(function(){o(f,g,d,false)},d.pauseTime)}if(d.directionNav){f.append('<div class="nivo-directionNav"><a class="nivo-prevNav">'+d.prevText+'</a><a class="nivo-nextNav">'+d.nextText+"</a></div>");if(d.directionNavHide){a(".nivo-directionNav",f).hide();f.hover(function(){a(".nivo-directionNav",f).show()},function(){a(".nivo-directionNav",f).hide()})}a("a.nivo-prevNav",f).live("click",function(){if(e.running)return false;clearInterval(i);i="";e.currentSlide-=2;o(f,g,d,"prev")});a("a.nivo-nextNav",f).live("click",function(){if(e.running)return false;clearInterval(i);i="";o(f,g,d,"next")})}if(d.controlNav){var j=a('<div class="nivo-controlNav"></div>');f.append(j);for(var k=0;k<g.length;k++){if(d.controlNavThumbs){var l=g.eq(k);if(!l.is("img")){l=l.find("img:first")}if(d.controlNavThumbsFromRel){j.append('<a class="nivo-control" rel="'+k+'"><img src="'+l.attr("rel")+'" alt="" /></a>')}else{j.append('<a class="nivo-control" rel="'+k+'"><img src="'+l.attr("src").replace(d.controlNavThumbsSearch,d.controlNavThumbsReplace)+'" alt="" /></a>')}}else{j.append('<a class="nivo-control" rel="'+k+'">'+(k+1)+"</a>")}}a(".nivo-controlNav a:eq("+e.currentSlide+")",f).addClass("active");a(".nivo-controlNav a",f).live("click",function(){if(e.running)return false;if(a(this).hasClass("active"))return false;clearInterval(i);i="";f.css("background",'url("'+e.currentImage.attr("src")+'") no-repeat');e.currentSlide=a(this).attr("rel")-1;o(f,g,d,"control")})}if(d.keyboardNav){a(window).keypress(function(a){if(a.keyCode=="37"){if(e.running)return false;clearInterval(i);i="";e.currentSlide-=2;o(f,g,d,"prev")}if(a.keyCode=="39"){if(e.running)return false;clearInterval(i);i="";o(f,g,d,"next")}})}if(d.pauseOnHover){f.hover(function(){e.paused=true;clearInterval(i);i=""},function(){e.paused=false;if(i==""&&!d.manualAdvance){i=setInterval(function(){o(f,g,d,false)},d.pauseTime)}})}f.bind("nivo:animFinished",function(){e.running=false;a(g).each(function(){if(a(this).is("a")){a(this).css("display","none")}});if(a(g[e.currentSlide]).is("a")){a(g[e.currentSlide]).css("display","block")}if(i==""&&!e.paused&&!d.manualAdvance){i=setInterval(function(){o(f,g,d,false)},d.pauseTime)}d.afterChange.call(this)});var m=function(b,c,d){for(var e=0;e<c.slices;e++){var f=Math.round(b.width()/c.slices);if(e==c.slices-1){b.append(a('<div class="nivo-slice"></div>').css({left:f*e+"px",width:b.width()-f*e+"px",height:"0px",opacity:"0",background:'url("'+d.currentImage.attr("src")+'") no-repeat -'+(f+e*f-f)+"px 0%"}))}else{b.append(a('<div class="nivo-slice"></div>').css({left:f*e+"px",width:f+"px",height:"0px",opacity:"0",background:'url("'+d.currentImage.attr("src")+'") no-repeat -'+(f+e*f-f)+"px 0%"}))}}};var n=function(b,c,d){var e=Math.round(b.width()/c.boxCols);var f=Math.round(b.height()/c.boxRows);for(var g=0;g<c.boxRows;g++){for(var h=0;h<c.boxCols;h++){if(h==c.boxCols-1){b.append(a('<div class="nivo-box"></div>').css({opacity:0,left:e*h+"px",top:f*g+"px",width:b.width()-e*h+"px",height:f+"px",background:'url("'+d.currentImage.attr("src")+'") no-repeat -'+(e+h*e-e)+"px -"+(f+g*f-f)+"px"}))}else{b.append(a('<div class="nivo-box"></div>').css({opacity:0,left:e*h+"px",top:f*g+"px",width:e+"px",height:f+"px",background:'url("'+d.currentImage.attr("src")+'") no-repeat -'+(e+h*e-e)+"px -"+(f+g*f-f)+"px"}))}}}};var o=function(b,c,d,e){var f=b.data("nivo:vars");if(f&&f.currentSlide==f.totalSlides-1){d.lastSlide.call(this)}if((!f||f.stop)&&!e)return false;d.beforeChange.call(this);if(!e){b.css("background",'url("'+f.currentImage.attr("src")+'") no-repeat')}else{if(e=="prev"){b.css("background",'url("'+f.currentImage.attr("src")+'") no-repeat')}if(e=="next"){b.css("background",'url("'+f.currentImage.attr("src")+'") no-repeat')}}f.currentSlide++;if(f.currentSlide==f.totalSlides){f.currentSlide=0;d.slideshowEnd.call(this)}if(f.currentSlide<0)f.currentSlide=f.totalSlides-1;if(a(c[f.currentSlide]).is("img")){f.currentImage=a(c[f.currentSlide])}else{f.currentImage=a(c[f.currentSlide]).find("img:first")}if(d.controlNav){a(".nivo-controlNav a",b).removeClass("active");a(".nivo-controlNav a:eq("+f.currentSlide+")",b).addClass("active")}h(d);a(".nivo-slice",b).remove();a(".nivo-box",b).remove();var g=d.effect;if(d.effect=="random"){var i=new Array("sliceDownRight","sliceDownLeft","sliceUpRight","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade","boxRandom","boxRain","boxRainReverse","boxRainGrow","boxRainGrowReverse");g=i[Math.floor(Math.random()*(i.length+1))];if(g==undefined)g="fade"}if(d.effect.indexOf(",")!=-1){var i=d.effect.split(",");g=i[Math.floor(Math.random()*i.length)];if(g==undefined)g="fade"}if(f.currentImage.attr("data-transition")){g=f.currentImage.attr("data-transition")}f.running=true;if(g=="sliceDown"||g=="sliceDownRight"||g=="sliceDownLeft"){m(b,d,f);var j=0;var k=0;var l=a(".nivo-slice",b);if(g=="sliceDownLeft")l=a(".nivo-slice",b)._reverse();l.each(function(){var c=a(this);c.css({top:"0px"});if(k==d.slices-1){setTimeout(function(){c.animate({height:"100%",opacity:"1.0"},d.animSpeed,"",function(){b.trigger("nivo:animFinished")})},100+j)}else{setTimeout(function(){c.animate({height:"100%",opacity:"1.0"},d.animSpeed)},100+j)}j+=50;k++})}else if(g=="sliceUp"||g=="sliceUpRight"||g=="sliceUpLeft"){m(b,d,f);var j=0;var k=0;var l=a(".nivo-slice",b);if(g=="sliceUpLeft")l=a(".nivo-slice",b)._reverse();l.each(function(){var c=a(this);c.css({bottom:"0px"});if(k==d.slices-1){setTimeout(function(){c.animate({height:"100%",opacity:"1.0"},d.animSpeed,"",function(){b.trigger("nivo:animFinished")})},100+j)}else{setTimeout(function(){c.animate({height:"100%",opacity:"1.0"},d.animSpeed)},100+j)}j+=50;k++})}else if(g=="sliceUpDown"||g=="sliceUpDownRight"||g=="sliceUpDownLeft"){m(b,d,f);var j=0;var k=0;var o=0;var l=a(".nivo-slice",b);if(g=="sliceUpDownLeft")l=a(".nivo-slice",b)._reverse();l.each(function(){var c=a(this);if(k==0){c.css("top","0px");k++}else{c.css("bottom","0px");k=0}if(o==d.slices-1){setTimeout(function(){c.animate({height:"100%",opacity:"1.0"},d.animSpeed,"",function(){b.trigger("nivo:animFinished")})},100+j)}else{setTimeout(function(){c.animate({height:"100%",opacity:"1.0"},d.animSpeed)},100+j)}j+=50;o++})}else if(g=="fold"){m(b,d,f);var j=0;var k=0;a(".nivo-slice",b).each(function(){var c=a(this);var e=c.width();c.css({top:"0px",height:"100%",width:"0px"});if(k==d.slices-1){setTimeout(function(){c.animate({width:e,opacity:"1.0"},d.animSpeed,"",function(){b.trigger("nivo:animFinished")})},100+j)}else{setTimeout(function(){c.animate({width:e,opacity:"1.0"},d.animSpeed)},100+j)}j+=50;k++})}else if(g=="fade"){m(b,d,f);var q=a(".nivo-slice:first",b);q.css({height:"100%",width:b.width()+"px"});q.animate({opacity:"1.0"},d.animSpeed*2,"",function(){b.trigger("nivo:animFinished")})}else if(g=="slideInRight"){m(b,d,f);var q=a(".nivo-slice:first",b);q.css({height:"100%",width:"0px",opacity:"1"});q.animate({width:b.width()+"px"},d.animSpeed*2,"",function(){b.trigger("nivo:animFinished")})}else if(g=="slideInLeft"){m(b,d,f);var q=a(".nivo-slice:first",b);q.css({height:"100%",width:"0px",opacity:"1",left:"",right:"0px"});q.animate({width:b.width()+"px"},d.animSpeed*2,"",function(){q.css({left:"0px",right:""});b.trigger("nivo:animFinished")})}else if(g=="boxRandom"){n(b,d,f);var r=d.boxCols*d.boxRows;var k=0;var j=0;var s=p(a(".nivo-box",b));s.each(function(){var c=a(this);if(k==r-1){setTimeout(function(){c.animate({opacity:"1"},d.animSpeed,"",function(){b.trigger("nivo:animFinished")})},100+j)}else{setTimeout(function(){c.animate({opacity:"1"},d.animSpeed)},100+j)}j+=20;k++})}else if(g=="boxRain"||g=="boxRainReverse"||g=="boxRainGrow"||g=="boxRainGrowReverse"){n(b,d,f);var r=d.boxCols*d.boxRows;var k=0;var j=0;var t=0;var u=0;var v=new Array;v[t]=new Array;var s=a(".nivo-box",b);if(g=="boxRainReverse"||g=="boxRainGrowReverse"){s=a(".nivo-box",b)._reverse()}s.each(function(){v[t][u]=a(this);u++;if(u==d.boxCols){t++;u=0;v[t]=new Array}});for(var w=0;w<d.boxCols*2;w++){var x=w;for(var y=0;y<d.boxRows;y++){if(x>=0&&x<d.boxCols){(function(c,e,f,h,i){var j=a(v[c][e]);var k=j.width();var l=j.height();if(g=="boxRainGrow"||g=="boxRainGrowReverse"){j.width(0).height(0)}if(h==i-1){setTimeout(function(){j.animate({opacity:"1",width:k,height:l},d.animSpeed/1.3,"",function(){b.trigger("nivo:animFinished")})},100+f)}else{setTimeout(function(){j.animate({opacity:"1",width:k,height:l},d.animSpeed/1.3)},100+f)}})(y,x,j,k,r);k++}x--}j+=100}}};var p=function(a){for(var b,c,d=a.length;d;b=parseInt(Math.random()*d),c=a[--d],a[d]=a[b],a[b]=c);return a};var q=function(a){if(this.console&&typeof console.log!="undefined")console.log(a)};this.stop=function(){if(!a(b).data("nivo:vars").stop){a(b).data("nivo:vars").stop=true;q("Stop Slider")}};this.start=function(){if(a(b).data("nivo:vars").stop){a(b).data("nivo:vars").stop=false;q("Start Slider")}};d.afterLoad.call(this);return this};a.fn.nivoSlider=function(c){return this.each(function(d,e){var f=a(this);if(f.data("nivoslider"))return f.data("nivoslider");var g=new b(this,c);f.data("nivoslider",g)})};a.fn.nivoSlider.defaults={effect:"random",slices:15,boxCols:8,boxRows:4,animSpeed:500,pauseTime:3e3,startSlide:0,directionNav:true,directionNavHide:true,controlNav:true,controlNavThumbs:false,controlNavThumbsFromRel:false,controlNavThumbsSearch:".jpg",controlNavThumbsReplace:"_thumb.jpg",keyboardNav:true,pauseOnHover:true,manualAdvance:false,captionOpacity:.8,prevText:"Prev",nextText:"Next",randomStart:false,beforeChange:function(){},afterChange:function(){},slideshowEnd:function(){},lastSlide:function(){},afterLoad:function(){}};a.fn._reverse=[].reverse})(jQuery);(function(a){function d(){b.column_num=e();var d="";for(var f=0;f<b.column_num;f++)d+='<div class="'+setting.column_className+'" style="width:'+setting.column_width+"px; display:inline-block; *display:inline;zoom:1; margin-left:"+setting.column_space/2+"px;margin-right:"+setting.column_space/2+'px; vertical-align:top; overflow:hidden"></div>';return c.prepend(d),a("."+setting.column_className,c)}function e(){var a=Math.floor(c.innerWidth()/(setting.column_width+setting.column_space));return a<1&&(a=1),a}function f(c,d){if(!a(c).length)return;var e=b.$columns;a(c).each(function(b){if(!setting.auto_imgHeight||setting.insert_type==2)return setting.insert_type==1?g(a(c).eq(b),setting.fadein&&d):setting.insert_type==2&&h(a(c).eq(b),b,setting.fadein&&d),!0;if(a(this)[0].nodeName.toLowerCase()=="img"||a(this).find(setting.img_selector).length>0){var e=new Image,f=a(this)[0].nodeName.toLowerCase()=="img"?a(this).attr("src"):a(this).find(setting.img_selector).attr("src");e.onload=function(){e.onreadystatechange=null,setting.insert_type==1?g(a(c).eq(b),setting.fadein&&d):setting.insert_type==2&&h(a(c).eq(b),b,setting.fadein&&d),e=null},e.onreadystatechange=function(){e.readyState=="complete"&&(e.onload=null,setting.insert_type==1?g(a(c).eq(b),setting.fadein&&d):setting.insert_type==2&&h(a(c).eq(b),b,setting.fadein&&d),e=null)},e.src=f}else setting.insert_type==1?g(a(c).eq(b),setting.fadein&&d):setting.insert_type==2&&h(a(c).eq(b),b,setting.fadein&&d)})}function g(a,c){c?a.css("opacity",0).appendTo(b.$columns.eq(i())).fadeTo(setting.fadein_speed,1):a.appendTo(b.$columns.eq(i()))}function h(a,c,d){d?a.css("opacity",0).appendTo(b.$columns.eq(c%b.column_num)).fadeTo(setting.fadein_speed,1):a.appendTo(b.$columns.eq(c%b.column_num))}function i(){var c=b.$columns.eq(0).outerHeight(),d=0;return b.$columns.each(function(b){a(this).outerHeight()<c&&(c=a(this).outerHeight(),d=b)}),d}var b=a.waterfall={},c=null;a.fn.extend({waterfall:function(e){e=e||{},setting=a.extend(setting,e),c=b.$container=a(this),b.$columns=d(),f(a(this).find(setting.cell_selector).detach(),!1),b._scrollTimer2=null,a(window).bind("scroll",function(){clearTimeout(b._scrollTimer2),b._scrollTimer2=setTimeout(onScroll,300)}),b._scrollTimer3=null,a(window).bind("resize",function(){clearTimeout(b._scrollTimer3),b._scrollTimer3=setTimeout(onResize,300)})}})})(jQuery);
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(9($){$.h.3=9(g){g=$.I({},$.h.3.Y,g);o 4.16(9(){c 8=$.h.3.M(4,g);$(4).15(9(){$.i(4,\'B.3\',1e);c 5=$.i(4,\'C.3\');f(!5){5=$(\'<p J="3"><p J="3-18"></p><p J="3-N"/></p>\');5.d({1b:\'1f\',1a:12});$.i(4,\'C.3\',5)}f($(4).k(\'6\')||q($(4).k(\'z-6\'))!=\'V\'){$(4).k(\'z-6\',$(4).k(\'6\')||\'\').1d(\'6\')}c 6;f(q 8.6==\'V\'){6=$(4).k(8.6==\'6\'?\'z-6\':8.6)}y f(q 8.6==\'9\'){6=8.6.P(4)}5.19(\'.3-N\')[8.H?\'H\':\'1c\'](6||8.10);c 7=$.I({},$(4).F(),{l:4.Z,m:4.O});5.1g(0).11=\'3\';5.D().d({b:0,a:0,A:\'13\',S:\'L\'}).17(E.14);c t=5[0].Z,u=5[0].O;c j=(q 8.j==\'9\')?8.j.P(4):8.j;1k(j.1t(0)){r\'n\':5.d({b:7.b+7.m,a:7.a+7.l/2-t/2}).x(\'3-1s\');v;r\'s\':5.d({b:7.b-u,a:7.a+7.l/2-t/2}).x(\'3-1r\');v;r\'e\':5.d({b:7.b+7.m/2-u/2,a:7.a-t}).x(\'3-1u\');v;r\'w\':5.d({b:7.b+7.m/2-u/2,a:7.a+7.l}).x(\'3-1v\');v}f(8.G){5.d({T:0,S:\'L\',A:\'R\'}).1w({T:1})}y{5.d({A:\'R\'})}},9(){$.i(4,\'B.3\',K);c X=4;1h(9(){f($.i(4,\'B.3\'))o;c 5=$.i(X,\'C.3\');f(8.G){5.1q().1j(9(){$(4).D()})}y{5.D()}},1i)})})};$.h.3.M=9(W,g){o $.U?$.I({},g,$(W).U()):g};$.h.3.Y={G:K,10:\'\',j:\'n\',H:K,6:\'6\'};$.h.3.1l=9(){o $(4).F().b>($(E).1m()+$(Q).m()/2)?\'s\':\'n\'};$.h.3.1o=9(){o $(4).F().a>($(E).1n()+$(Q).l()/2)?\'e\':\'w\'}})(1p);',62,95,'|||tipsy|this|tip|title|pos|opts|function|left|top|var|css||if|options|fn|data|gravity|attr|width|height||return|div|typeof|case||actualWidth|actualHeight|break||addClass|else|original|visibility|cancel|active|remove|document|offset|fade|html|extend|class|false|block|elementOptions|inner|offsetHeight|call|window|visible|display|opacity|metadata|string|ele|self|defaults|offsetWidth|fallback|className|100000|hidden|body|hover|each|appendTo|arrow|find|zIndex|position|text|removeAttr|true|absolute|get|setTimeout|100|fadeOut|switch|autoNS|scrollTop|scrollLeft|autoWE|jQuery|stop|south|north|charAt|east|west|animate'.split('|'),0,{}));
jQuery(document).ready(function($){function tz_backToTop(a){$(window).scrollTop()>150?a.fadeIn(500):a.fadeOut(200)}

//浮动条
var topLink=$("#gototop");$(window).scroll(function(){tz_backToTop(topLink)}),topLink.click(function(){return jQuery("html,body").stop().animate({scrollTop:0},700),!1});$("#primary #content a[rel!=link]:has(img)").slimbox();$('#menu li').hover(function(){$(this).addClass('over')},function(){$(this).removeClass('over')});$('.icon a,.pagenavi a,.smiley a').tipsy({fade:true,gravity:'s'});});

//浮动栏
(function(a){if(typeof define!=="undefined"&&define.amd){define([],a)}else{if(typeof module!=="undefined"&&module.exports){module.exports=a()}else{window.scrollMonitor=a()}}})(function(){var c=function(){return window.pageYOffset||(document.documentElement&&document.documentElement.scrollTop)||document.body.scrollTop};var G={};var k=[];var E="visibilityChange";var B="enterViewport";var z="fullyEnterViewport";var o="exitViewport";var l="partiallyExitViewport";var w="locationChange";var n="stateChange";var p=[E,B,z,o,l,w,n];var F={top:0,bottom:0};var y=function(){return window.innerHeight||document.documentElement.clientHeight};var a=function(){return Math.max(document.body.scrollHeight,document.documentElement.scrollHeight,document.body.offsetHeight,document.documentElement.offsetHeight,document.documentElement.clientHeight)};G.viewportTop=null;G.viewportBottom=null;G.documentHeight=null;G.viewportHeight=y();var v;var s;var b;function t(){G.viewportTop=c();G.viewportBottom=G.viewportTop+G.viewportHeight;G.documentHeight=a();if(G.documentHeight!==v){b=k.length;while(b--){k[b].recalculateLocation()}v=G.documentHeight}}function r(){G.viewportHeight=y();t();q()}var d;function u(){clearTimeout(d);d=setTimeout(r,100)}var h;function q(){h=k.length;while(h--){k[h].update()}h=k.length;while(h--){k[h].triggerCallbacks()}}function m(P,I){var S=this;this.watchItem=P;if(!I){this.offsets=F}else{if(I===+I){this.offsets={top:I,bottom:I}}else{this.offsets={top:I.top||F.top,bottom:I.bottom||F.bottom}}}this.callbacks={};for(var N=0,M=p.length;N<M;N++){S.callbacks[p[N]]=[]}this.locked=false;var L;var Q;var R;var O;var H;var e;function K(i){if(i.length===0){return}H=i.length;while(H--){e=i[H];e.callback.call(S,s);if(e.isOne){i.splice(H,1)}}}this.triggerCallbacks=function J(){if(this.isInViewport&&!L){K(this.callbacks[B])}if(this.isFullyInViewport&&!Q){K(this.callbacks[z])}if(this.isAboveViewport!==R&&this.isBelowViewport!==O){K(this.callbacks[E]);if(!Q&&!this.isFullyInViewport){K(this.callbacks[z]);K(this.callbacks[l])}if(!L&&!this.isInViewport){K(this.callbacks[B]);K(this.callbacks[o])}}if(!this.isFullyInViewport&&Q){K(this.callbacks[l])}if(!this.isInViewport&&L){K(this.callbacks[o])}if(this.isInViewport!==L){K(this.callbacks[E])}switch(true){case L!==this.isInViewport:case Q!==this.isFullyInViewport:case R!==this.isAboveViewport:case O!==this.isBelowViewport:K(this.callbacks[n])}L=this.isInViewport;Q=this.isFullyInViewport;R=this.isAboveViewport;O=this.isBelowViewport};this.recalculateLocation=function(){if(this.locked){return}var U=this.top;var T=this.bottom;if(this.watchItem.nodeName){var j=this.watchItem.style.display;if(j==="none"){this.watchItem.style.display=""}var i=this.watchItem.getBoundingClientRect();this.top=i.top+G.viewportTop;this.bottom=i.bottom+G.viewportTop;if(j==="none"){this.watchItem.style.display=j}}else{if(this.watchItem===+this.watchItem){if(this.watchItem>0){this.top=this.bottom=this.watchItem}else{this.top=this.bottom=G.documentHeight-this.watchItem}}else{this.top=this.watchItem.top;this.bottom=this.watchItem.bottom}}this.top-=this.offsets.top;this.bottom+=this.offsets.bottom;this.height=this.bottom-this.top;if((U!==undefined||T!==undefined)&&(this.top!==U||this.bottom!==T)){K(this.callbacks[w])}};this.recalculateLocation();this.update();L=this.isInViewport;Q=this.isFullyInViewport;R=this.isAboveViewport;O=this.isBelowViewport}m.prototype={on:function(e,j,i){switch(true){case e===E&&!this.isInViewport&&this.isAboveViewport:case e===B&&this.isInViewport:case e===z&&this.isFullyInViewport:case e===o&&this.isAboveViewport&&!this.isInViewport:case e===l&&this.isAboveViewport:j.call(this,s);if(i){return}}if(this.callbacks[e]){this.callbacks[e].push({callback:j,isOne:i||false})}else{throw new Error("Tried to add a scroll monitor listener of type "+e+". Your options are: "+p.join(", "))}},off:function(H,I){if(this.callbacks[H]){for(var e=0,j;j=this.callbacks[H][e];e++){if(j.callback===I){this.callbacks[H].splice(e,1);break}}}else{throw new Error("Tried to remove a scroll monitor listener of type "+H+". Your options are: "+p.join(", "))}},one:function(e,i){this.on(e,i,true)},recalculateSize:function(){this.height=this.watchItem.offsetHeight+this.offsets.top+this.offsets.bottom;this.bottom=this.top+this.height},update:function(){this.isAboveViewport=this.top<G.viewportTop;this.isBelowViewport=this.bottom>G.viewportBottom;this.isInViewport=(this.top<=G.viewportBottom&&this.bottom>=G.viewportTop);this.isFullyInViewport=(this.top>=G.viewportTop&&this.bottom<=G.viewportBottom)||(this.isAboveViewport&&this.isBelowViewport)},destroy:function(){var I=k.indexOf(this),e=this;k.splice(I,1);for(var J=0,H=p.length;J<H;J++){e.callbacks[p[J]].length=0}},lock:function(){this.locked=true},unlock:function(){this.locked=false}};var g=function(e){return function(j,i){this.on.call(this,e,j,i)}};for(var C=0,A=p.length;C<A;C++){var f=p[C];m.prototype[f]=g(f)}try{t()}catch(D){try{window.$(t)}catch(D){throw new Error("If you must put scrollMonitor in the <head>, you must use jQuery.");
}}function x(e){s=e;t();q()}if(window.addEventListener){window.addEventListener("scroll",x);window.addEventListener("resize",u)}else{window.attachEvent("onscroll",x);window.attachEvent("onresize",u)}G.beget=G.create=function(i,j){if(typeof i==="string"){i=document.querySelector(i)}else{if(i&&i.length>0){i=i[0]}}var e=new m(i,j);k.push(e);e.update();return e};G.update=function(){s=null;t();q()};G.recalculateLocations=function(){G.documentHeight=0;G.update()};return G});
$(document).ready(function() {
	var $rollbar = $('.sidebar-roll');
    var $fixedbar = $('.sidebar-fixed');
    var fixedWatcher = scrollMonitor.create($fixedbar);
    fixedWatcher.lock();
    fixedWatcher.visibilityChange(function() {
    	$rollbar.toggleClass('follow', !fixedWatcher.isInViewport);
    });
});