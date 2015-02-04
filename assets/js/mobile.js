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
	$("#tit_con").text(currentNavName);
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
function goBackUC(){
	showUC();
	$("#goBackUC_bt").hide();
	$("#goBackSub_bt").show();
	$("#show_sider_bt").hide();
	$("#goBackCat_bt").hide();
}
function goBackUCOrders(){
	checkOrders();
	$("#goBackUCOrders_bt").hide();
	$("#goBackUC_bt").show();
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
			$("#tit_con").text(productinfo.name_product);
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
	$("#goBackUC_bt").hide();
	$("#goBackUCOrders_bt").hide();
	$("#tit_con").text("购物车");
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
			'		<a class="btn-right-block" onclick="goto_order()" id="submit" style="background: rgb(192, 0, 0);">结算(<span id="checkedNum">'+total+'</span>)</a>'+
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
function register(){
	if($("#username").val().length<3 || $("#username").val().length>20){//3-20位
		alert("用户名位数应在3～20"); return false;
	}else if($("#password").val().length<3 || $("#password").val().length>30){//3-30位
		alert("密码位数应在3～20"); return false;
	}
	var appid=$("#appid").val();
	var username=$("#username").val();
	var password=$("#password").val();
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$.post(
	"/mobile/home/register",
	{
		'appid':appid,
		'username':username,
		'pwd':password
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert("注册成功！请登录");
			showLogin();
		}else{
			alert(result.message);
		}
	});
}
function showRegister(){
	$("#tit_con").text("注册");
	var register_div=''+
	'	<div class="mobile-common-wrapper uc" style="min-height:300px;">	'+
	'		<div class="uc-main">	'+
	'			<div class="item item-phone">	'+
	'				<input id="username" class="txt-input txt-phone" type="text" placeholder="请输入用户名" autofocus="">	'+
	'			</div>	'+
	'			<div class="item item-phone">	'+
	'				<input id="password" class="txt-input txt-phone" type="password" placeholder="请输入密码">	'+
	'			</div>	'+
	'			<div class="item item-btns" style="margin-top:30px;">	'+
	'				<a class="btn-next" href="javascript:register();">注册</a>	'+
	'			</div>	'+
	'			<div style="text-align:right;">	'+
	'				<a style="font-size: 14px; color: rgb(37, 37, 37); text-decoration: underline;" href="javascript:showLogin();">登录	'+
	'				</a>	'+
	'			</div>	'+
	'		</div>	'+
	'	</div>	';
	$("#main_body").html(register_div);
}
var rememberMeValue=true;
var saveAsDefault=true;
function rememberMe(){
	rememberMeValue=!rememberMeValue;
	if(rememberMeValue) $("#rmdiv").addClass("login-free-selected");
	else $("#rmdiv").removeClass("login-free-selected");
}
function saveDefault(){
	saveAsDefault=!saveAsDefault;
	if(saveAsDefault) $("#sddiv").addClass("login-free-selected");
	else $("#sddiv").removeClass("login-free-selected");
}
function showLogin(){
	rememberMeValue=true;
	$("#tit_con").text("登录");
	var login_div=''+
	'	<div class="mobile-common-wrapper uc" style="min-height:300px;">	'+
	'		<div class="uc-main">	'+
	'			<div class="item item-phone">	'+
	'				<input id="username" class="txt-input txt-phone" type="text" placeholder="请输入用户名" autofocus="">	'+
	'			</div>	'+
	'			<div class="item item-phone">	'+
	'				<input id="password" class="txt-input txt-phone" type="password" placeholder="请输入密码">	'+
	'			</div>	'+
	'			<div id="rmdiv" onclick="rememberMe()" class="login-free login-free-selected"><b></b>一个月内免登录</div>	'+
	'			<div class="item item-btns" style="margin-top:30px;">	'+
	'				<a class="btn-next" href="javascript:login();">登录</a>	'+
	'			</div>	'+
	'			<div class="item item-login-option">	'+
	'				<span class="register-free">	'+
	'					<a rel="nofollow" href="javascript:showRegister()">免费注册</a>	'+
	'				</span>	'+
	'			</div>	'+
	'		</div>	'+
	'	</div>	';
	$("#main_body").html(login_div);
}
function usercenter(){
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$.post(
	"/mobile/home/check_user_login",
	{},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success" && result.message=="login"){
			showUC();
		}else{
			showLogin();
		}
	});
}

function login(){
	if($("#username").val().length<3 || $("#username").val().length>20){//3-20位
		alert("用户名位数应在3～20"); return false;
	}else if($("#password").val().length<3 || $("#password").val().length>30){//3-30位
		alert("密码位数应在3～20"); return false;
	}
	var appid=$("#appid").val();
	var username=$("#username").val();
	var password=$("#password").val();
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$.post(
	"/mobile/home/login",
	{
		'appid':appid,
		'username':username,
		'pwd':password,
		'rememberMe':rememberMeValue
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			showUC();
		}else{
			alert(result.message);
		}
	});
}
function showUC(){
	$("#tit_con").text("个人中心");
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$.post(
	"/mobile/home/get_info",
	{"info_type":"user"},
	function(data){
		var result=$.parseJSON(data);
		var ucDiv=''+
		'	<div class="common-wrapper uc">	'+
		'		<div class="head-img">	'+
		'			<span class="my-img" style="background-image:url(\'/assets/images/mobile/photo.jpg\')"></span>	'+
		'			<p>'+result.message.username_user+'</p>	'+
		'		</div>	'+
		'		<ul class="menu-list">	'+
		'			<li>	'+
		'				<a href="javascript:checkOrders()">	'+
		'					<img src="/assets/images/mobile/orders.png" alt="">	'+
		'					<p>全部订单</p>	'+
		'				</a>	'+
		'			</li>	'+
		'			<li>	'+
		'				<a href="javascript:checkAccount()">	'+
		'					<img src="/assets/images/mobile/account.png" alt="">	'+
		'					<p>修改密码</p>	'+
		'				</a>	'+
		'			</li>	'+
		'			<li>	'+
		'				<a href="javascript:checkMessages()">	'+
		'					<img src="/assets/images/mobile/messages.png" alt="">	'+
		'					<p>我的消息</p>	'+
		'				</a>	'+
		'			</li>	'+
		'			<li>	'+
		'				<a href="javascript:logout()">	'+
		'					<img src="/assets/images/mobile/logout.png" alt="">	'+
		'					<p>退出</p>	'+
		'				</a>	'+
		'			</li>	'+
		'		</ul>	'+
		'	</div>	';
		$("#main_body").html(ucDiv);
	});
}
function goto_order(){
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$.post(
	"/mobile/home/check_user_login",
	{},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success" && result.message=="login"){
			showOrderInfo();
		}else{
			showLogin();
		}
	});
}
function showOrderInfo(){
	$("#tit_con").text("下单");
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$.post(
	"/mobile/home/get_info",
	{"info_type":"user"},
	function(data){
		saveAsDefault=true;
		var result=$.parseJSON(data);
		if(result.result=="success"){
			var userInfo=result.message;
			var orderInfo=''+
			'	<div class="order-info">	'+
			'		<div class="new-set-info">	'+
			'			<span class="new-txt2 new-mg-b5">收货人姓名</span>	'+
			'			<span class="new-input-span new-mg-b10">	'+
			'				<input type="text" id="address_name" maxlength="30" class="new-input" value="'+((userInfo.realname_user==null)?"":userInfo.realname_user)+'">	'+
			'			</span>	'+
			'			<span class="new-txt2 new-mg-b5">手机号码</span>	'+
			'			<span class="new-span-block">	'+
			'				<span class="new-input-span new-mg-b10"><input type="text" id="address_mobile" class="new-input" value="'+((userInfo.phone_user==null)?"":userInfo.phone_user)+'"></span>	'+
			'			</span>	'+
			'			<span class="new-txt2 new-mg-b5">详细收货地址</span>	'+
			'			<span class="new-input-span new-mg-b10">	'+
			'				<input type="text" id="address" class="new-input" value="'+((userInfo.address_user==null)?"":userInfo.address_user)+'">	'+
			'			</span>	'+
			'			<div id="sddiv" onclick="saveDefault()" class="login-free login-free-selected"><b></b>保存为默认地址</div>	'+
			'			<a href="javascript:submitOrder();" class="new-abtn-type new-mg-t15">提交订单</a>	'+
			'		</div>	'+
			'	</div>	';
			$("#main_body").html(orderInfo);
		}else{
			alert(result.message);
		}
	});
}
function submitOrder(){
	if($("#address_name").val()=="" || $("#address_mobile").val()=="" || $("#address").val()==""){
		alert("请填写完整！"); return false;
	}
//	alert($("#address_name").val()+$("#address_mobile").val()+$("#address").val());
	var name=$("#address_name").val();
	var phone=$("#address_mobile").val();
	var address=$("#address").val();
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$.post(
	"/mobile/home/create_order",
	{
		'appid':$("#appid").val(),
		'name':name,
		'phone':phone,
		'address':address,
		'saveAsDefault':saveAsDefault
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			showUC();
		}else{
			alert(result.message);
		}
	});
}
function checkOrders(){
	$("#show_sider_bt").hide();
	$("#goBackSub_bt").hide();
	$("#goBackCat_bt").hide();
	$("#goBackUC_bt").show();
	goBack=true;
	$("#tit_con").text("所有订单");
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$("#main_body").addClass("con-pd");
	$.post(
	"/mobile/home/get_info",
	{
		'info_type':"orderlist"
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			$("#main_body").html("");
			$("#main_body").removeClass("con-pd");
			var orders=result.message;
			$("#main_body").append("<ul class='orderlist productlist'></ul>");
			for(var i=0;i<orders.length;i++){
				var products=$.parseJSON(orders[i].products_order);
				var thumbnails=$.parseJSON(products[0].info.thumbnail_product);
				var orderLi=''+
				'	<li onclick="order_click(\''+orders[i].id_order+'\')">	'+
				'		<div class="thumbnail"><img src="'+thumbnails[0].src+'"></div>	'+
				'		<div class="detail" style="font-size:14px;">	'+
				'			<div class="title">订单号：'+orders[i].num_order+'</div>	'+
				'			<div class="title">'+orders[i].time_order+'</div>	'+
				'			<div class="buy">	'+
				'				<div class="now-price">'+products[0].info.unit_product+orders[i].total_order+'</div>	'+
				'				<a class="btnred120">查看详情</a>	'+
				'			</div>	'+
				'		</div>	'+
				'	</li>	';
				$("#main_body .orderlist").append(orderLi);
			}
		}else{
			alert("获取订单失败，请重试！");
		}
	});
}
function order_click(orderid){
	$("#goBackUC_bt").hide();
	$("#goBackUCOrders_bt").show();
	$("#tit_con").text("订单");
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$.post(
	"/mobile/home/get_info",
	{
		'info_type':"order",
		'orderid':orderid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			var orderinfo=result.message;
			var products=$.parseJSON(orderinfo.products_order);
			var order=''+
			'	<div class="common-wrapper">	'+
			'		<ul class="order">	'+
			'			<li>	'+
			'				<div class="order-box">	'+
			'					<div class="order-width">	'+
			'						<p>订单编号：'+orderinfo.num_order+'</p>	'+
			'						<p>订单金额：'+products[0].info.unit_product+orderinfo.total_order+'</p>	'+
			'						<p>订单日期：'+orderinfo.time_order+'</p>	'+
			'					</div>	'+
			'				</div>	'+
			'			</li>	';
			for(var i=0;i<products.length;i++){
				var thumbnails=$.parseJSON(products[i].info.thumbnail_product);
				order+=''+
				'		<li>	'+
				'			<div class="order-box">	'+
				'				<ul class="book-list">	'+
				'					<li class="border-bottom">	'+
				'					   <a href="javascript:product_click('+products[i].id_product+',\'no\')">	'+
				'					   	<div class="order-msg">	'+
				'							<img src="'+thumbnails[0].src+'" class="img_ware">	'+
				'							<div class="order-msg">	'+
				'								<p class="title"> '+products[i].info.name_product+'</p>	'+
				'								<p class="price">'+products[i].info.unit_product+products[i].info.price_product+'<span></span></p>	'+
				'								<p class="order-data">X'+products[i].countnum+'</p>	'+
				'							</div>	'+
				'						 </div>	'+
				'						</a>	'+
				'						</li>	'+
				'					</ul>	'+
				'				</div>	'+
				'			</li>	';
			}
			order+=''+
			'			<li>	'+
			'				<div class="order-box">	'+
			'					<div class="order-width">	'+
			'						<p class="border-bottom usr-name">	'+
			'							'+orderinfo.name_order+'	'+
			'							<span class="fr">'+orderinfo.phone_order+'</span>	'+
			'						</p>	'+
			'						<p class="usr-addr">'+orderinfo.address_order+'</p>	'+
			'					</div>	'+
			'				</div>	'+
			'			</li>	'+
			'		</ul>	'+
			'	</div>	';
			$("#main_body").html(order);
		}else{
			alert("获取订单失败，请重试！");
		}
	});
}
function checkAccount(){
	$("#show_sider_bt").hide();
	$("#goBackSub_bt").hide();
	$("#goBackCat_bt").hide();
	$("#goBackUC_bt").show();
	goBack=true;
	$("#tit_con").text("修改密码");
	var changepwd=''+
	'	<div class="order-info">	'+
	'		<div class="new-set-info">	'+
	'			<span class="new-txt2 new-mg-b5">旧密码</span>	'+
	'			<span class="new-input-span new-mg-b10">	'+
	'				<input type="password" id="old_pwd" maxlength="30" class="new-input">	'+
	'			</span>	'+
	'			<span class="new-txt2 new-mg-b5">新密码</span>	'+
	'			<span class="new-span-block">	'+
	'				<span class="new-input-span new-mg-b10"><input type="password" id="new_pwd" class="new-input"></span>	'+
	'			</span>	'+
	'			<a href="javascript:change_pwd();" class="new-abtn-type new-mg-t15">修改</a>	'+
	'		</div>	'+
	'	</div>	';
	$("#main_body").html(changepwd);
}
function change_pwd(){
	var old_pwd=$("#old_pwd").val();
	var new_pwd=$("#new_pwd").val();
	if(new_pwd.length<3 || new_pwd.length>30){//3-30位
		alert("密码位数应在3～20"); return false;
	}
	$.post(
	"/mobile/home/change_pwd",
	{
		'oldpwd':old_pwd,
		'newpwd':new_pwd
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert("修改成功！");
			showUC();
		}else{
			alert(result.message);
		}
	});
}
function checkMessages(){
	$("#show_sider_bt").hide();
	$("#goBackSub_bt").hide();
	$("#goBackCat_bt").hide();
	$("#goBackUC_bt").show();
	goBack=true;
	$("#tit_con").text("我的消息");
	var waitDiv="<img src='/assets/images/cms/loading.gif'>";
	$("#main_body").html(waitDiv);
	$("#main_body").addClass("con-pd");
	$.post(
	"/mobile/home/get_info",
	{
		'info_type':"msglist"
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			$("#main_body").html("");
			$("#main_body").removeClass("con-pd");
			var messages=result.message;
			$("#main_body").append('<div class="new-msg-center messagelist"></div>');
			for(var i=0;i<messages.length;i++){
				var msgLi=''+
				'	<div class="new-msg-section">	'+
				'		<div class="new-tit">	'+
				'			<span class="new-user">	'+
				'				<span class="new-elps">'+messages[i].title_message+'</span>	'+
				'			</span>	'+
				'			<span class="new-time">'+messages[i].time_message+'</span>	'+
				'		</div>	'+
				'		<div class="new-cont">	'+
				'			<span class="new-cont-txt">内容：'+messages[i].msg_message+'</span>	'+
				'		</div>	'+
				'	</div>	';
				$("#main_body .messagelist").append(msgLi);
			}
		}else{
			alert("获取消息失败，请重试！");
		}
	});
}
function logout(){
	$.post(
	"/mobile/home/logout",
	{},
	function(data){
		showLogin();
	});
}