/* Author: Ben Walker

*/

(function($){
	
	if (position_fixed_is_supported()) {
		
		$.backstretch($("#photo img").attr("src"));
		
	} else {
		
		$("#photo").show();
		
	}
	
})(this.jQuery);

/* IS_POSITION_FIXED_SUPPORTED */
/* http://kangax.github.com/cft/#IS_POSITION_FIXED_SUPPORTED */

function position_fixed_is_supported() {
	var container = document.body;
	if (document.createElement &&
		container && container.appendChild && container.removeChild) {
			var el = document.createElement("div");
			if (!el.getBoundingClientRect) {
			return null;
		}
		el.innerHTML = "x";
		el.style.cssText = "position:fixed;top:100px;";
		container.appendChild(el);
		var originalHeight = container.style.height, originalScrollTop = container.scrollTop;
		container.style.height = "3000px";
		container.scrollTop = 500;
		var elementTop = el.getBoundingClientRect().top;
		container.style.height = originalHeight;
		var isSupported = elementTop === 100;
		container.removeChild(el);
		container.scrollTop = originalScrollTop;
		return isSupported;
	}
	return null;
}