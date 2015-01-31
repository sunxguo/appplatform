$(document).ready(function(){
	$(document.body).css({
		"overflow-x":"hidden",
		"overflow-y":"hidden"
	});
	$('#slider').unslider();
});
function show_sider(){
	/*
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
	}*/
	$("#sider").show();
}
function close_sider(){
	$("#sider").hide();
}
function getinfo(pid,name){
	$("#main_body").html($(pid).html());
	$("#tit_con").text(name);
	$("#main_body").css("padding","40px 8px 10px 8px");
	show_sider();
}