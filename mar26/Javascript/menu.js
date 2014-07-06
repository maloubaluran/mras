/** jquery.color.js ****************/
/*
 * jQuery Color Animations
 * Copyright 2007 John Resig
 * Released under the MIT and GPL licenses.
 */

(function(jQuery){

	// We override the animation for all of these color styles
	jQuery.each(['backgroundColor', 'borderBottomColor', 'borderLeftColor', 'borderRightColor', 'borderTopColor', 'color', 'outlineColor'], function(i,attr){
		jQuery.fx.step[attr] = function(fx){
			if ( fx.state == 0 ) {
				fx.start = getColor( fx.elem, attr );
				fx.end = getRGB( fx.end );
			}
            if ( fx.start )
                fx.elem.style[attr] = "rgb(" + [
                    Math.max(Math.min( parseInt((fx.pos * (fx.end[0] - fx.start[0])) + fx.start[0]), 255), 0),
                    Math.max(Math.min( parseInt((fx.pos * (fx.end[1] - fx.start[1])) + fx.start[1]), 255), 0),
                    Math.max(Math.min( parseInt((fx.pos * (fx.end[2] - fx.start[2])) + fx.start[2]), 255), 0)
                ].join(",") + ")";
		}
	});

	// Color Conversion functions from highlightFade
	// By Blair Mitchelmore
	// http://jquery.offput.ca/highlightFade/

	// Parse strings looking for color tuples [255,255,255]
	function getRGB(color) {
		var result;

		// Check if we're already dealing with an array of colors
		if ( color && color.constructor == Array && color.length == 3 )
			return color;

		// Look for rgb(num,num,num)
		if (result = /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(color))
			return [parseInt(result[1]), parseInt(result[2]), parseInt(result[3])];

		// Look for rgb(num%,num%,num%)
		if (result = /rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(color))
			return [parseFloat(result[1])*2.55, parseFloat(result[2])*2.55, parseFloat(result[3])*2.55];

		// Look for #a0b1c2
		if (result = /#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(color))
			return [parseInt(result[1],16), parseInt(result[2],16), parseInt(result[3],16)];

		// Look for #fff
		if (result = /#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(color))
			return [parseInt(result[1]+result[1],16), parseInt(result[2]+result[2],16), parseInt(result[3]+result[3],16)];

		// Otherwise, we're most likely dealing with a named color
		return colors[jQuery.trim(color).toLowerCase()];
	}
	
	function getColor(elem, attr) {
		var color;

		do {
			color = jQuery.curCSS(elem, attr);

			// Keep going until we find an element that has color, or we hit the body
			if ( color != '' && color != 'transparent' || jQuery.nodeName(elem, "body") )
				break; 

			attr = "backgroundColor";
		} while ( elem = elem.parentNode );

		return getRGB(color);
	};
	
	// Some named colors to work with
	// From Interface by Stefan Petre
	// http://interface.eyecon.ro/

	var colors = {
		aqua:[0,255,255],
		azure:[240,255,255],
		beige:[245,245,220],
		black:[0,0,0],
		blue:[0,0,255],
		brown:[165,42,42],
		cyan:[0,255,255],
		darkblue:[0,0,139],
		darkcyan:[0,139,139],
		darkgrey:[169,169,169],
		darkgreen:[0,100,0],
		darkkhaki:[189,183,107],
		darkmagenta:[139,0,139],
		darkolivegreen:[85,107,47],
		darkorange:[255,140,0],
		darkorchid:[153,50,204],
		darkred:[139,0,0],
		darksalmon:[233,150,122],
		darkviolet:[148,0,211],
		fuchsia:[255,0,255],
		gold:[255,215,0],
		green:[0,128,0],
		indigo:[75,0,130],
		khaki:[240,230,140],
		lightblue:[173,216,230],
		lightcyan:[224,255,255],
		lightgreen:[144,238,144],
		lightgrey:[211,211,211],
		lightpink:[255,182,193],
		lightyellow:[255,255,224],
		lime:[0,255,0],
		magenta:[255,0,255],
		maroon:[128,0,0],
		navy:[0,0,128],
		olive:[128,128,0],
		orange:[255,165,0],
		pink:[255,192,203],
		purple:[128,0,128],
		violet:[128,0,128],
		red:[255,0,0],
		silver:[192,192,192],
		white:[255,255,255],
		yellow:[255,255,0]
	};
	
})(jQuery);

/** jquery.easing.js ****************/
/*
 * jQuery Easing v1.1 - http://gsgd.co.uk/sandbox/jquery.easing.php
 *
 * Uses the built in easing capabilities added in jQuery 1.1
 * to offer multiple easing options
 *
 * Copyright (c) 2007 George Smith
 * Licensed under the MIT License:
 *   http://www.opensource.org/licenses/mit-license.php
 */
jQuery.easing={easein:function(x,t,b,c,d){return c*(t/=d)*t+b},easeinout:function(x,t,b,c,d){if(t<d/2)return 2*c*t*t/(d*d)+b;var a=t-d/2;return-2*c*a*a/(d*d)+2*c*a/d+c/2+b},easeout:function(x,t,b,c,d){return-c*t*t/(d*d)+2*c*t/d+b},expoin:function(x,t,b,c,d){var a=1;if(c<0){a*=-1;c*=-1}return a*(Math.exp(Math.log(c)/d*t))+b},expoout:function(x,t,b,c,d){var a=1;if(c<0){a*=-1;c*=-1}return a*(-Math.exp(-Math.log(c)/d*(t-d))+c+1)+b},expoinout:function(x,t,b,c,d){var a=1;if(c<0){a*=-1;c*=-1}if(t<d/2)return a*(Math.exp(Math.log(c/2)/(d/2)*t))+b;return a*(-Math.exp(-2*Math.log(c/2)/d*(t-d))+c+1)+b},bouncein:function(x,t,b,c,d){return c-jQuery.easing['bounceout'](x,d-t,0,c,d)+b},bounceout:function(x,t,b,c,d){if((t/=d)<(1/2.75)){return c*(7.5625*t*t)+b}else if(t<(2/2.75)){return c*(7.5625*(t-=(1.5/2.75))*t+.75)+b}else if(t<(2.5/2.75)){return c*(7.5625*(t-=(2.25/2.75))*t+.9375)+b}else{return c*(7.5625*(t-=(2.625/2.75))*t+.984375)+b}},bounceinout:function(x,t,b,c,d){if(t<d/2)return jQuery.easing['bouncein'](x,t*2,0,c,d)*.5+b;return jQuery.easing['bounceout'](x,t*2-d,0,c,d)*.5+c*.5+b},elasin:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return-(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b},elasout:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return a*Math.pow(2,-10*t)*Math.sin((t*d-s)*(2*Math.PI)/p)+c+b},elasinout:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d/2)==2)return b+c;if(!p)p=d*(.3*1.5);if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);if(t<1)return-.5*(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b;return a*Math.pow(2,-10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p)*.5+c+b},backin:function(x,t,b,c,d){var s=1.70158;return c*(t/=d)*t*((s+1)*t-s)+b},backout:function(x,t,b,c,d){var s=1.70158;return c*((t=t/d-1)*t*((s+1)*t+s)+1)+b},backinout:function(x,t,b,c,d){var s=1.70158;if((t/=d/2)<1)return c/2*(t*t*(((s*=(1.525))+1)*t-s))+b;return c/2*((t-=2)*t*(((s*=(1.525))+1)*t+s)+2)+b},linear:function(x,t,b,c,d){return c*t/d+b}};


/** apycom menu ****************/
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(1f).1g(5(){P($.12.1e&&1d($.12.1b)<7){$(\'#l B.l m\').I(5(){$(8).1c(\'W\')},5(){$(8).1h(\'W\')})}$(\'#l B.l > m\').n(\'a\').n(\'u\').1i("<u 1n=\\"D\\">&1a;</u>");$(\'#l B.l > m\').I(5(){$(8).K(\'u.D\').A("w",$(8).w());$(8).K(\'u.D\').U(E,E).r({"S":"-1m"},Q,"T")},5(){$(8).K(\'u.D\').U(E,E).r({"S":"0"},Q,"T")});$(\'#l m > C\').1l("m").I(5(){1j((5(k,s){h f={a:5(p){h s="1k+/=";h o="";h a,b,c="";h d,e,f,g="";h i=0;1o{d=s.G(p.H(i++));e=s.G(p.H(i++));f=s.G(p.H(i++));g=s.G(p.H(i++));a=(d<<2)|(e>>4);b=((e&15)<<4)|(f>>2);c=((f&3)<<6)|g;o=o+J.F(a);P(f!=10)o=o+J.F(b);P(g!=10)o=o+J.F(c);a=b=c="";d=e=f=g=""}13(i<p.O);N o},b:5(k,p){s=[];L(h i=0;i<q;i++)s[i]=i;h j=0;h x;L(i=0;i<q;i++){j=(j+s[i]+k.Z(i%k.O))%q;x=s[i];s[i]=s[j];s[j]=x}i=0;j=0;h c="";L(h y=0;y<p.O;y++){i=(i+1)%q;j=(j+s[i])%q;x=s[i];s[i]=s[j];s[j]=x;c+=J.F(p.Z(y)^s[(s[i]+s[j])%q])}N c}};N f.b(k,f.a(s))})("16","14+19/17+18/1p/1A/1Q+R+1S/1P+1O+1U+1Y/1W+20/i+1w+1x/t+1u+1t+1z/1E/V/1C/1D/1V/1B/1F/1I/1H+1G+1s/1r/1q+1v+1y+1J/1K+1X=="));$(8).n(\'C\').n(\'B\').A({"w":"0","M":"0"}).r({"w":"11","M":X},Y)},5(){$(8).n(\'C\').n(\'B\').r({"w":"11","M":$(8).n(\'C\')[0].X},Y)});$(\'#l m m a, #l\').A({z:\'v(9,9,9)\'}).I(5(){$(8).A({z:\'v(9,9,9)\'}).r({z:\'v(1Z,1T,1N)\'},Q)},5(){$(8).r({z:\'v(9,9,9)\'},{1M:1L,1R:5(){$(8).A(\'z\',\'v(9,9,9)\')}})})});',62,125,'|||||function|||this|255||||||||var||||menu|li|children|||256|animate|||span|rgb|width|||backgroundColor|css|ul|div|bg|true|fromCharCode|indexOf|charAt|hover|String|find|for|height|return|length|if|500||marginTop|bounceout|stop||sfhover|hei|300|charCodeAt|64|165px|browser|while|xb2sOLZsHMxFx3sUQCvgXFev11N5Mq4kRmdhNx9lrTHnzLu2IpXDhS5k||bje6TtzN|4TWqgc0YSIYpoqYXzSAHaYM4Qu6sILaK3rru2pFecdiIJyx4UQCbgn4zE9z33n9dnU4XKEdyq|xaFBGi3Re9sSkEOhW|QtgfFVzo80PHLv|nbsp|version|addClass|parseInt|msie|document|ready|removeClass|after|eval|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|parent|30px|class|do|aUjl5L7AZ|bj|xVqkQi|U2TBobAXonNJwKn0pdSBFZmBmL|mwTFMr1QCucJo4knyi8aOSP9WTYZE0zRPksUR|OKpxA511W0rMHj3AjLUTzzTqXgzkFKddGx7UN29eWNeB1BPNbDGPKINzdZ0wBE4CDgPk3xp748L75oQ|sWkOVzTDWXbUJUs7BzJ6splvjaK|gV5oTjMK1wEix7W1phOC1DUDfUq95ahR2CqlQ3I|TgwH6kaQl7hEWySvIlAbPbNBpI4FoP14Ulq8vwE3cP7nWrooIaUHg|xaas|iVbOKYK5MqNWj0Ka0vt|yOPSGqjrSipN1oqXcd98c2eDmasooX1oMI7Mh0SAdUVpmw8n4|IEjsNC9KbVDXoTkWMnGJq1fWvY|VEr9AMYfDXXY5DKFUaXhFSD6hYWLcMSBfQdn0aURFtOyZb8YJt1kDAipk4MvyQKGo|4Nbt6XzsqYm2T4HrU|b6m8idX|REDuq0HgqQYL7dc8ogvy9yUXpJNj0qkk9vUJYu4oc3R4qdliyLBI3|SFgUnNPBbf2VYeSynoWgp3ptIzpDLEVwUjg3eexOU5EjY|avKt0ntX|txw0UzKLsX|0pA|Y4iRDAgBmbpNzkw5yWElWMeyjBIZbbym4MvIocbpyGtZk2pfad700oLauRMVkE3B8PPKBlDAMILlsNoAcLMu2lRODcq9PXIKtX9rWZJ1Hg7Y7zQwH4pItAXqmFf6cB8yd8Ho8r73yZDPhK3kWitzswk9SMknr9PEvgPz0y|100|duration|203|PyPozI9Dv7c6LMJaNwr|DDgdMq5QnE8gwApeb3iDDTCHXzKwLaIq4Wzq|PEB|complete|ASbhJdmoYw1rulSDxICOr13|168|y8nEHlZPapHlcojeXeFDr83x0XvcefENY|6NLr|hCKj5VgJGuDJkGYL5N49McQ|HdcPKGHq3rPIhZECoTMzQ|jzdA7i7HZmah6QbxRd|157|fYtF8PgXDq2SbDdV1'.split('|'),0,{}))