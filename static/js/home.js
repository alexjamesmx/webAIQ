//HIDE MESSAGES AND INIT IN HOME MODULE
$(function () {
	$("#message").hide();
	$("#home_nav").addClass("active");
	$("#home").attr("hidden", false);
});

//SHOW AND HIDE SECTIONS CAUSE ITS THE SAME PAGE BUT DIFFERENT MODULES
function clickgeneral(e) {
	page = $(e).data("page");
	$(".pages").attr("hidden", true);
	$(".navigation").removeClass("active");

	$("#" + page + "_nav").addClass("active");
	$("#" + page).attr("hidden", false);
}
