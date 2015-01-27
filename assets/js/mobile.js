$(document).ready(function(){
	$("#all").css("height",$(window).height());
	$("#all").css("max-height",$(window).height());
//	$("#ad_banner").css("height",$(window).height()-460);
	$("#ad_img").attr("height",$(window).height()-465);
	$("#main_body").css("max-width",$(window).width());
	$("#main_body img").css("max-width",$(window).width());
	$("#slider .slider_img").css("width",$(window).width());
	$("#slider .slider_img").css("height",$(window).height()-30);
	$("#header").css("width",$(window).width()-10);
	$(document.body).css({
		"overflow-x":"hidden",
		"overflow-y":"hidden"
	});
	$('#slider').unslider();
});
function show_sider(){
	if($("#sider").css('width') !="220px"){
		$("#sider").animate({width:220},100,"linear",$("#sider").show());
		$("#tit_div").hide();
		$("#main_body").hide();
		$("#header").css("left","220px");
	}
	else{
		$("#sider").animate({width:0},100,"linear",$("#sider").hide());
		$("#tit_div").show();
		$("#main_body").show();
		$("#header").css("position","fixed");
		$("#header").css("left","0");
	}
}
function getinfo(pid,name){
	$("#main_body").html($(pid).html());
	$("#tit_con").text(name);
	$("#main_body").css("padding","40px 8px 10px 8px");
	show_sider();
}