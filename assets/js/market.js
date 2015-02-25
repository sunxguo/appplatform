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
	$("#orderType li").click(function(){
		location.href=$("#select_link").val()+"&order="+$(this).attr("data-sort");
	});
	$("#star img").hover(function(){
		showStar(parseInt($(this).attr("title")));
	},function(){
		showStar(parseInt($("#score").val()));
	});
	$("#star img").click(function(){
		var score=parseInt($(this).attr("title"));
		$("#score").val(score);
	});
});
function showStar(currentNum){
	for(var i=0;i<5;i++){
		var imgSrc="";
		if(i<currentNum) imgSrc="/assets/images/market/star-on.png";
		else imgSrc="/assets/images/market/star-off.png";
		$('#star').children().eq(i).attr("src",imgSrc);
	}
}
function publish_comment(appid){
	var nickname=$("#nickname").val();
//	var title=$("#title").val();
	var comment=$("#comment").val();
	var score=$("#score").val();
	if(nickname.length<1 || nickname.length>15){
		alert("请重新确认昵称长度（1～15）！");
		return false;
	}
/*	if(title.length<1 || title.length>30){
		alert("请重新确认标题长度（1～30）！");
		return false;
	}*/
	if(comment==""){
		alert("请输入评论内容！");
		return false;
	}
	$.post(
	"/market/add_info",
	{
		'info_type':"comment",
		'appid':appid,
		'user':nickname,
		'star':score,
		'text':comment
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert("发表成功");
			location.reload();
		}else{
			alert("发表失败，请稍后重试！");
		}
	});
}
function language(language){
	$.post(
	"/cms/index/set_language",
	{
		'language':language
	},
	function(data){
		location.reload();
	});
}