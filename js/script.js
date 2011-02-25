/* Author: Ben Walker

*/

(function($){
	
	$.backstretch($("#photo img").attr("src"));
	
	$("#photo").hide();
	
	$("#songkick").gigscraper("<?php echo $myzbase_songkick_id ?>", "0trHk7OHF9iyGVwE");
	
})(this.jQuery);











