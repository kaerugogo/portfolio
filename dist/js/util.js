//
$(document).ready(function() {
	// contactページを表示
	$("#navContact").click(function(){
		$("#swContact").prop('checked', true);
		$("#outerIframe").addClass("on");
		$("#divIframe").remove();
		$("#h2Iframe").remove();
		$("#outerIframe").prepend(
			"<h2 id='h2Iframe'>Contact</h2><div id='divIframe'><iframe src='contact.php'></iframe></div>"
			);
		return false;

	});
	// contactページを閉じる
	$("#toHome").click(function(){
		$("#divIframe").remove();
		$("#h2Iframe").remove();
		$("#outerIframe").removeClass("on");
	});
});

//
$(window).load(function() {
    $("body").removeClass("preload");
});