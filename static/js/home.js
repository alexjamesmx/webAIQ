$(function () {
	$("#message").hide();
	$("#home_nav").addClass("active");
	$("#home").attr("hidden", false);
});

function clickgeneral(e) {
	page = $(e).data("page");
	$(".pages").attr("hidden", true);
	$(".navigation").removeClass("active");

	$("#" + page + "_nav").addClass("active");
	$("#" + page).attr("hidden", false);
}
