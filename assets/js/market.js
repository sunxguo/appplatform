$(document).ready(function(){
	var slidey=$('#slider').unslider({
		speed: 500,               //  The speed to animate each slide (in milliseconds)
		delay: 2000,              //  The delay between slide animations (in milliseconds)
		complete: function() {},  //  A function that gets called after every slide animation
		keys: true,               //  Enable keyboard (left, right) arrow shortcuts
		dots: true,               //  Display dot navigation
		fluid: false              //  Support responsive design. May break non-responsive designs
	});
	var data = slidey.data('unslider');
	$(".dots .dot").hover(function(){
		data.move($(this).index(), function() {});
	});
	$(".app-container").hover(function(){
		$(this).find(".stars").hide();
		$(this).find(".down").show();
	},function(){
		$(this).find(".stars").show();
		$(this).find(".down").hide();
	});
	$(".vertical-lit-app").hover(function(){
		$(this).find(".vertical-lit-tit").hide();
		$(this).find(".install-lit-btn").show();
	},function(){
		$(this).find(".install-lit-btn").hide();
		$(this).find(".vertical-lit-tit").show();
	});
	var left_count=0;
	var li_amount=$("#carousel_list li").length;
	$("#next_arrow").click(function(){
		if(li_amount-left_count>=14){
			left_count+=7;
		}else{
			left_count=li_amount-7;
			$("#next_arrow").addClass("unused");
		}
		$("#prev_arrow").removeClass("unused");
		$("#carousel_list").animate({"margin-left":"-"+left_count*122+"px"},"slow");
	});
	$("#prev_arrow").click(function(){
		if(left_count>=7){
			left_count-=7;
		}else{
			left_count=0;
			$("#prev_arrow").addClass("unused");
		}
		$("#carousel_list").animate({"margin-left":"-"+left_count*122+"px"},"slow");
		$("#next_arrow").removeClass("unused");
	});
	
	$("#CategoryTabTit li").hover(function(){
		$("#CategoryTabTit .selected").addClass("unselected").removeClass("selected");
		$(this).removeClass("unselected").addClass("selected");
		$("#CategoryTabBody .selected").addClass("unselected").removeClass("selected");
		$("#CategoryTabBody").children('li').eq($(this).index()).removeClass("unselected").addClass("selected");
	});
	$(".union-list-toggle").click(function(){
		if($(this).parent('.union-list').css("height")=="110px")
			$(this).parent('.union-list').css("height","auto");
		else
			$(this).parent('.union-list').css("height","110px");
	});
	$("#scroll_prev_arrow").click(function(){
		$("#scroll_list").animate({"margin-left":"0px"},"slow");
	});
	$("#scroll_next_arrow").click(function(){
		$("#scroll_list").animate({"margin-left":"-"+($("#scroll_list li").length*228-760)+"px"},"slow");
	});
});
