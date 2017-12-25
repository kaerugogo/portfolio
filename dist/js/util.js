// chromeバグ対策
$(window).load(function() {
    $("body").removeClass("preload");
});

//
$(document).ready(function() {
	// contactページを表示
	$("#navContact").click(function(){
		$("#swContact").prop('checked', true);
		$("#outerIframe").addClass("on");
		$("#divIframe").remove();
		$("#outerIframe").prepend(
			"<div id='divIframe'><iframe src='contact.php'></iframe></div>"
		);
		return false;
	});

	// Worksの各項目ページを表示
	$(".toItem").click(function() {
		var $href = $(this).attr("href");
		$("#outerIframe").addClass("onItem");
		$("#divIframe").remove();
		$("#outerIframe").prepend(
			"<div id='divIframe'><iframe src='" + $href + "'></iframe></div>"
		);
//		$("#divIframe iframe").attr("src", "$href");
		return false;
	});

	// Worksの各項目ページを閉じる
	$(".closer").click(function(){
		$("#outerIframe").removeClass("onItem");
		setTimeout(function(){
			$("#divIframe").remove();
		},300);
	});

	// contactページ、Worksの各項目ページを閉じる
	$("#toHome").click(function(){
		$("#outerIframe").removeClass("on");
		$("#outerIframe").removeClass("onItem");
		setTimeout(function(){
			$("#divIframe").remove();
		},300);
	});
});

