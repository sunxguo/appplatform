var header_height=0;
$(document).ready(function(){
	$("#all").css("height",$(window).height());
	$("#all").css("max-height",$(window).height());
//	$("#ad_banner").css("height",$(window).height()-460);
//	$("#ad_img").attr("height",$(window).height()-465);
	$("#main_body").css("max-width",$(window).width());
	$("#main_body img").css("max-width",$(window).width());
	$("#slider .slider_img").css("width",$(window).width());
	$("#sider .nav").css("min-height",($(window).height()-50-92)+"px");
	header_height=($(window).height())/15;
	$("#slider .slider_img").css("height",header_height*14);
	$("#main_body").css("height",header_height*14);
	$("#header").css("width",$(window).width()+"px");
	$("#header").css("height",header_height+"px");
	$("#header").css("line-height",header_height+"px");
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
		if(!$("#mall_more").is(":hidden")) showMallMore();
	}
	else{
		$("#sider").animate({width:0},100,"linear",$("#sider").hide());
		$("#tit_div").show();
		$("#slider .slider_img").css("height",header_height*14);
		$("#main_body").show();
	}
}
var currentNavid=0;
var currentNavName="";
var goBack=false;
var inputAmount=0;
var currenCategoryId=0;
var currentCatHas="";
function getinfo(navid,name){
	$("#malMore_bt").show();
	currentNavid=navid;
	currentNavName=name;
	$("#tit_con").text(name);
//	$("#main_body").css("padding","40px 8px 10px 8px");
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$.post(
	"/mobile/home/get_info",
	{
		'info_type':"nav",
		'navid':navid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			$("#main_body").html("");
			switch(result.message.type_nav){
				case "1":
					$("#main_body").html(result.message.content);
					$("#main_body").addClass("con-pd");
				break;
				case "2":
					$("#main_body").removeClass("con-pd");
					var subNavs=result.message.subnavs;
					$("#main_body").append("<ul class='subnavlist'></ul>");
					for(var i=0;i<subNavs.length;i++){
						$("#main_body .subnavlist").append("<li onclick='sub_nav_click("+subNavs[i].id_subnav+")'>"+subNavs[i].name_subnav+"</li>");
					}
				break;
				case "3":
					$("#main_body").removeClass("con-pd");
					var essays=result.message.essays;
					$("#main_body").append("<ul class='essaylist'></ul>");
					for(var i=0;i<essays.length;i++){
						var thumbnails=$.parseJSON(essays[i].thumbnail_essay);
						var essayLi='<li onclick="essay_click('+essays[i].id_essay+')"><div class="title">'+essays[i].title_essay+'</div><div class="detail"><img src="'+thumbnails[0].src+'"><div class="summary">'+essays[i].summary_essay+'</div></div></li>';
						$("#main_body .essaylist").append(essayLi);
					}
				break;
				case "4":
					$("#main_body").removeClass("con-pd");
					var forms=result.message.forms;
					$("#main_body").append("<ul class='formlist'></ul>");
					inputAmount=forms.length;
					for(var i=0;i<forms.length;i++){
						var formLi="";
						if(forms[i].type_form=="short") formLi='<li><span class="label">'+forms[i].name_form+'：</span><input class="inp-txt" type="text" id="input'+i+'"><input type="hidden" id="formid'+i+'" value="'+forms[i].id_form+'"></li>';
						else formLi='<li><span class="label">'+forms[i].name_form+'：</span><textarea id="input'+i+'"></textarea><input type="hidden" id="formid'+i+'" value="'+forms[i].id_form+'"></li>';
						$("#main_body .formlist").append(formLi);
					}
					$("#main_body .formlist").append('<li><a style="cursor: pointer;" onclick="submitInfo()" class="btnfa120">提交</a></li>');
				break;
				case "5":
					if(result.message.hasmallcat_nav=="1"){
						$("#main_body").removeClass("con-pd");
						var categorys=result.message.categorys;
						$("#main_body").append("<ul class='categorylist'></ul>");
						for(var i=0;i<categorys.length;i++){
							var catLi=''+
							'<li onclick="category_click('+categorys[i].id_mall_category+')">'+
								'<span class="icon"></span>'+
								'<div class="name">'+categorys[i].name_mall_category+'</div>'+
							'</li>';
							$("#main_body .categorylist").append(catLi);
						}
					}else{
						$("#main_body").removeClass("con-pd");
						var products=result.message.products;
						$("#main_body").append("<ul class='productlist'></ul>");
						for(var i=0;i<products.length;i++){
							var thumbnails=$.parseJSON(products[i].thumbnail_product);
							var productLi='<li onclick="product_click('+products[i].id_product+',\'no\')">'+
								'<div class="thumbnail"><img src="'+thumbnails[0].src+'"></div>'+
								'<div class="detail">'+
									'<div class="title">'+products[i].name_product+'</div>'+
									'<div class="price">'+
										'<div class="now-price">'+products[i].unit_product+products[i].price_product+'</div>'+
										'<div class="ori-price">'+products[i].unit_product+products[i].oriprice_product+'</div>'+
									'</div>'+
									'<div class="buy"><a class="btnred120">查看详情</a></div>'+
								'</div></li>';
							$("#main_body .productlist").append(productLi);
						}
					}
				break;
				case "6":
					$("#main_body").html(result.message.link);
					//alert(result.message.link);
					$("#main_body").addClass("con-pd");
				break;
			}
		}else{
			alert("获取信息失败，请重试！");
		}
	});
	if(!goBack) show_sider();
	goBack=false;
}
function sub_nav_click(subnavid){
	$("#show_sider_bt").hide();
	$("#goBackSub_bt").show();
	goBack=true;
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$("#main_body").addClass("con-pd");
	$.post(
	"/mobile/home/get_info",
	{
		'info_type':"subnav",
		'subnavid':subnavid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			$("#main_body").html(result.message.content_subnav);
		}else{
			alert("获取信息失败，请重试！");
		}
	});
}
function goBackSub(){
	getinfo(currentNavid,currentNavName);
	$("#goBackSub_bt").hide();
	$("#show_sider_bt").show();
	$("#goBackCat_bt").hide();
}
function goBackCat(){
	category_click(currenCategoryId);
	$("#goBackSub_bt").show();
	$("#show_sider_bt").hide();
	$("#goBackCat_bt").hide();
}
function essay_click(essayid){
	$("#show_sider_bt").hide();
	$("#goBackSub_bt").show();
	goBack=true;
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$("#main_body").addClass("con-pd");
	$.post(
	"/mobile/home/get_info",
	{
		'info_type':"essay",
		'essayid':essayid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			$("#main_body").html(result.message.text_essay);
		}else{
			alert("获取文章失败，请重试！");
		}
	});
}
function category_click(categoryid){
	currenCategoryId=categoryid;
	$("#show_sider_bt").hide();
	$("#goBackSub_bt").show();
	$("#goBackCat_bt").hide();
	goBack=true;
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$("#main_body").addClass("con-pd");
	$.post(
	"/mobile/home/get_info",
	{
		'info_type':"category_product",
		'categoryid':categoryid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			$("#main_body").html("");
			$("#main_body").removeClass("con-pd");
			var products=result.message;
			$("#main_body").append("<ul class='productlist'></ul>");
			for(var i=0;i<products.length;i++){
				var thumbnails=$.parseJSON(products[i].thumbnail_product);
				var productLi='<li onclick="product_click('+products[i].id_product+',\'has\')">'+
					'<div class="thumbnail"><img src="'+thumbnails[0].src+'"></div>'+
					'<div class="detail">'+
						'<div class="title">'+products[i].name_product+'</div>'+
						'<div class="price">'+
							'<div class="now-price">'+products[i].unit_product+products[i].price_product+'</div>'+
							'<div class="ori-price">'+products[i].unit_product+products[i].oriprice_product+'</div>'+
						'</div>'+
						'<div class="buy"><a class="btnred120">查看详情</a></div>'+
					'</div></li>';
				$("#main_body .productlist").append(productLi);
			}
		}else{
			alert("获取商品失败，请重试！");
		}
	});
}
function submitInfo(){
	$.post(
	"/mobile/home/add_formdata",
	{
		'data':get_formdata()
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert("提交成功！");
		}else{
			alert("提交失败，请重试！");
		}
	});
}
function product_click(productid,cat){
	$("#show_sider_bt").hide();
	$("#goBackCat_bt").hide();
	$("#goBackSub_bt").hide();
	if(cat=="has"){
		$("#goBackCat_bt").show();
		currentCatHas="has";
	}else{
		$("#goBackSub_bt").show();
		currentCatHas="no";
	}
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$.post(
	"/mobile/home/get_info",
	{
		'info_type':"product",
		'productid':productid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			var productinfo=result.message;
			var thumbnails=$.parseJSON(productinfo.thumbnail_product);
			var product=''+
			'<div class="product">'+
				'<div class="imgs">'+
					'<img src="'+thumbnails[0].src+'">'+
					'<div class="price">'+
						'<span class="now-price">'+productinfo.unit_product+productinfo.price_product+'</span>'+
						'<span class="ori-price">'+productinfo.unit_product+productinfo.oriprice_product+'</span>'+
					'</div>'+
				'</div>'+
				'<div class="title">'+productinfo.name_product+'</div>'+
				'<div class="bt-div clearfix">'+
				'	<a onclick="put_in_cart(\''+productinfo.id_product+'\')" class="btnred120">加入购物车</a>'+
				'</div>'+
				'<div class="description">'+
				'	<div class="label">商品信息</div>'+
				'	<div class="content">'+productinfo.description_product+'</div>'+
				'</div>'+
			'</div>';
			$("#main_body").html(product);
		}else{
			alert("获取商品失败，请重试！");
		}
	});
	goBack=true;
}
function get_formdata(){
	var objJson = [];
	for(var i=0;i<inputAmount;i++){
		objJson.push(jQuery.parseJSON('{"formid":"' + $("#formid"+i).val() + '","data":"' + $("#input"+i).val() + '"}')); 
	}
	return objJson;
}
function show_cart(){
	$("#show_sider_bt").hide();
	$("#goBackCat_bt").hide();
	$("#goBackSub_bt").hide();
	if(currentCatHas=="has") $("#goBackCat_bt").show();
	else $("#goBackSub_bt").show();
	goBack=true;
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$.post(
	"/mobile/home/get_info",
	{
		'info_type':"cart"
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			$("#main_body").html("");
			$("#main_body").removeClass("con-pd");
			var products=result.message.products;
			var unit=result.message.unit;
			var total_price=result.message.total_price;
			var total=result.message.total;
			var is_all_checked=result.message.is_all_checked?"checked":"";
			$("#main_body").append("<ul class='cart'></ul>");
			for(var i=0;i<products.length;i++){
				var thumbnails=$.parseJSON(products[i].thumbnail_product);
				var is_disabled=parseInt(products[i].countnum)>1?'':'disabled';
				var is_checked=products[i].checked?"checked":"";
				var cartItem=''+
					'	<li id="product10064429">   '+
					'		<div class="items">   '+
					'			<div class="check-wrapper">   '+
					'				<span id="checkIcon10064429" class="cart-checkbox '+is_checked+'" onclick="changeSelected(\''+products[i].id_product+'\')"></span>   '+
					'			</div>   '+
					'			<div class="shp-cart-item-core">   '+
					'				<div class="cart-product-cell-3">   '+
					'					<span class="shp-cart-item-price" id="price10064429">'+products[i].unit_product+products[i].price_product+'</span>   '+
					'				</div>   '+
					'				<a class="cart-product-cell-1" href="">   '+
					'					<img class="cart-photo-thumb" alt="" src="'+thumbnails[0].src+'">   '+
					'				</a>   '+
					'				<div class="cart-product-cell-2">   '+
					'					<div class="cart-product-name">   '+
					'						<a href="">   '+
					'							<span>'+products[i].name_product+'</span>   '+
					'						</a>   '+
					'					</div>   '+
					'					<div class="shp-cart-opt">   '+
					'						<div class="quantity-wrapper">   '+
					'							<input type="hidden" id="limitSukNum10064429" value="1000">   '+
					'							<a class="quantity-decrease '+is_disabled+'" id="subnum'+products[i].id_product+'" href="javascript:subWareBybutton(\''+products[i].id_product+'\')">-</a>   '+
					'							<input type="text" class="quantity" size="4" onchange="modifyWare(\''+products[i].id_product+'\')" value="'+products[i].countnum+'" name="num" id="num'+products[i].id_product+'">   '+
					'							<a class="quantity-increase" id="addnum10064429" href="javascript:addWareBybutton(\''+products[i].id_product+'\')">+</a>   '+
					'						</div>   '+
					'						<a class="shp-cart-icon-remove" href="javascript:deleteWare(\''+products[i].id_product+'\')"></a>   '+
					'					</div>   '+
					'				</div>   '+
					'			</div>    '+
					'		</div>   '+
					'	</li>  ';
				$("#main_body .cart").append(cartItem);
			}
			var counter=''+
			'	<div class="payment-total-bar" id="payment">'+
			'		<div class="shp-chk">'+
			'			<span onclick="checkAllHandler();" class="cart-checkbox '+is_all_checked+'" id="checkIcon-1"></span>'+
			'		</div>'+
			'		<div class="shp-cart-info">'+
			'			<strong class="shp-cart-total">总计:'+unit+'<span class="" id="cart_realPrice">'+total_price+'</span></strong>'+
			'			<span class="sale-off">商品总额:'+unit+'<span class="bottom-bar-price" id="cart_oriPrice">'+total_price+'</span> </span>'+
			'		</div>'+
			'		<a class="btn-right-block" id="submit" style="background: rgb(192, 0, 0);">结算(<span id="checkedNum">'+total+'</span>)</a>'+
			'	</div>';
			$("#main_body .cart").append(counter);
		}else{
			alert("获取购物车失败，请重试！");
		}
	});
}
var moreShow=false;
function showMallMore(){
	$("#mall_more").toggle(50);
	moreShow=!moreShow;
	if(moreShow) $("#mmbt").attr("src","/assets/images/cms/hidemm.png");
	else $("#mmbt").attr("src","/assets/images/cms/mallmore.png");
}
function goHome(){
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	location.reload();
}
function put_in_cart(pid){
	$.post(
	"/mobile/home/putin_cart",
	{
		'productid':pid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert("提交成功！");
		}else{
			alert("提交失败，请重试！");
		}
	});
}
function deleteWare(pid){
	$.post(
	"/mobile/home/putout_cart",
	{
		'productid':pid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			show_cart();
		}else{
			alert("删除失败，请重试！");
		}
	});
}
function subWareBybutton(pid){
	var  now_num=parseInt($("#num"+pid).val());
	if(now_num>1) $("#num"+pid).val(now_num-1);
	modifyWare(pid);
}
function addWareBybutton(pid){
	var  now_num=parseInt($("#num"+pid).val());
	$("#num"+pid).val(now_num+1);
	modifyWare(pid);
}
function modifyWare(pid){
	if(parseInt($("#num"+pid).val())<2) $("#subnum"+pid).addClass("disabled");
	else $("#subnum"+pid).removeClass("disabled");
	$.post(
	"/mobile/home/modify_num_cart",
	{
		'productid':pid,
		'countnum':$("#num"+pid).val()
	},
	function(data){
		show_cart();
	});
}
function checkAllHandler(){
	$.post(
	"/mobile/home/check_all_cart",
	{
		
	},
	function(data){
		show_cart();
	});
}
function changeSelected(pid){
	$.post(
	"/mobile/home/checked",
	{
		'productid':pid
	},
	function(data){
		show_cart();
	});
}