var $lly=jQuery.noConflict(),o,setOptions=function(t){o=$lly.extend({theme:"dark",controls:!0},t)};$lly(document).ready(function(){var t=function(){$lly("a.lazy-load-youtube").each(function(t){var l=$lly(this).attr("href").split("/embed/")[1];l||(l=$lly(this).attr("href").split("://youtu.be/")[1]),l||(l=$lly(this).attr("href").split("v=")[1].replace(/\&/,"?"));var e=l.split("?")[0].split("#")[0],s=l.match(/[#&]t=(\d+)s/);s?s=s[1]:(s=l.match(/[#&]t=(\d+)m(\d+)s/),s?s=60*parseInt(s[1])+parseInt(s[2]):(s=l.match(/[?&]start=(\d+)/),s&&(s=s[1]))),l=l.split("#")[0],s&&-1===l.indexOf("start=")&&(l+=(-1===l.indexOf("?")?"?":"&")+"start="+s),$lly(this).html(-1!==l.indexOf("showinfo=0")?"":'<div class="lazy-load-youtube-info"><span class="titletext youtube">'+$lly(this).html()+"</div></div>"),$lly(this).prepend('<div style="height:'+(parseInt($lly(this).css("height"))-4)+"px;width:"+(parseInt($lly(this).css("width"))-4)+'px;" class="lazy-load-youtube-div"></div>'),$lly(this).css("background","#000 url(http://i2.ytimg.com/vi/"+e+"/0.jpg) center center no-repeat"),$lly(this).attr("id",e+t),$lly(this).attr("href","http://www.youtube.com/watch?v="+e+(s?"#t="+s+"s":""));var i="http://www.youtube.com/embed/"+l,a="";o.controls||(a="&controls=0"),i+=(-1===i.indexOf("?")?"?":"&")+"autoplay=1&theme="+o.theme+a;var r='<iframe width="'+parseInt($lly(this).css("width"))+'" height="'+parseInt($lly(this).css("height"))+'" style="vertical-align:top;" src="'+i+'" frameborder="0" allowfullscreen></iframe>';$lly(this).attr("onclick","$lly('#"+e+t+"').replaceWith('"+r+"');return false;")})};$lly(document).ready(t()).ajaxStop(function(){t()})});