$(document).ready(function(){
	$(".slider-item").mouseout(function(){
		$(this).find('.oper').hide();
		$(this).find('.img-layer').hide();
	});
	$(".slider-item").mouseover(function(){
		$(this).find('.oper').show();
		$(this).find('.img-layer').show();
	});
	$(".ad-item").mouseout(function(){
		$(this).find('.img-layer').hide();
	});
	$(".ad-item").mouseover(function(){
		$(this).find('.img-layer').show();
	});
	$(".union-data-pic").mouseout(function(){
		$(this).find('.img-layer').hide();
	});
	$(".union-data-pic").mouseover(function(){
		$(this).find('.img-layer').show();
	});
	$(".union-list-toggle").click(function(){
		if($(this).parent('.union-list').css("height")=="110px")
			$(this).parent('.union-list').css("height","auto");
		else
			$(this).parent('.union-list').css("height","110px");
	});
});
function scrollAdd(){
	$("#file").click();
}
var scroll_id=0;
function change_scroll_click(scrollid){
	scroll_id=scrollid;
	$("#scrollfile").click();
}
function upload_scroll(){
	$('#uploadScrollForm').ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				add_new_scroll(result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $('#uploadScrollForm').formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#img_add").attr("src","/assets/images/cms/loading.gif");
		}
	});
	return false;
}
function change_scroll(){
	$('#changeScrollForm').ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				change_scroll_img(result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $('#changeScrollForm').formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#img_add").attr("src","/assets/images/cms/loading.gif");
		}
	});
	return false;
}

function change_scroll_img(src){
	$.post(
	"/kmadmin/admin/modify_info",
	{
		'info_type':"scroll_img",
		'src':src,
		'scrollid':scroll_id
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function add_new_scroll(src){
	$.post(
	"/kmadmin/admin/add_info",
	{
		'info_type':"scroll",
		'src':src,
		'order':$("#new_order_num").val()
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function scroll_order(direction,ordernum,scrollid){
	$.post(
	"/kmadmin/admin/modify_info",
	{
		'info_type':"scroll_order",
		'direction':direction,
		'order':ordernum,
		'scrollid':scrollid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			location.reload();
		}else{
			alert(result.message);
		}
	});
}

function scroll_delete(scrollid,order,amount){
	if(confirm("确定删除该滚动图片？")){
		$.post(
			"/kmadmin/admin/del_info",
			{
				'info_type':"scroll",
				'scrollid':scrollid,
				'order':order,
				'amount':amount
			},
			function(data){
				var result=$.parseJSON(data);
				if(result.result=="success"){
					location.reload();
				}else{
					alert(result.message);
				}
			});
	}
}
function save_scroll(scrollid){
	//$(this).parent().find("input[name='link']").val()
	$.post(
	"/kmadmin/admin/modify_info",
	{
		'info_type':"scroll_data",
		'link':$("#link"+scrollid).val(),
		'title':$("#title"+scrollid).val(),
		'scrollid':scrollid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function change_ad_click(){
	$("#adfile").click();
}
function change_ad(ad_id){
	$('#changeAdForm').ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				change_ad_img(ad_id,result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $('#changeAdForm').formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#img_add").attr("src","/assets/images/cms/loading.gif");
		}
	});
	return false;
}
function change_ad_img(ad_id,src){
	$.post(
	"/kmadmin/admin/modify_info",
	{
		'info_type':"ad_img",
		'src':src,
		'adid':ad_id
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function save_ad_data(adid){
	$.post(
	"/kmadmin/admin/modify_info",
	{
		'info_type':"ad_data",
		'link':$("#link").val(),
		'title':$("#title").val(),
		'adid':adid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function app_union(appid,unionid,type){
	$.post(
	"/kmadmin/admin/modify_info",
	{
		'info_type':"union_apparray",
		'type':type,
		'unionid':unionid,
		'appid':appid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			location.reload();
		}
	});
}
var app_id=0;
function app_union_click(appid){
	setDivCenter("#appUnionDialog");
	$("#bkDiv").show();
	app_id=appid;
	$.post(
	"/kmadmin/admin/get_allunion",
	{
		'appid':appid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			var uniondata=result.message;
			$("#unionlist").html("");
			for(var unionid in uniondata){
//				$("#per_mall").prop("checked",true);
//				$("#per_mall").removeAttr("checked");
//				alert(uniondata[unionid]["unionname"]);
				if(uniondata[unionid]["has"]==1)
					$("#unionlist").append('<li><input checked type="checkbox" unionid="'+unionid+'">'+uniondata[unionid]["unionname"]+'</li>');
				else
					$("#unionlist").append('<li><input type="checkbox" unionid="'+unionid+'">'+uniondata[unionid]["unionname"]+'</li>');
			}
		}else{
			alert(result.message);
		}
	});
}
function save_app_union(){
	//app_union(appid,unionid,type)($("#id").attr("checked")==true
	$("#unionlist li").each(function(){
		if($(this).find("input").prop("checked")){
			app_union(app_id,$(this).find("input").attr("unionid"),"add");
		}else{
			app_union(app_id,$(this).find("input").attr("unionid"),"drop");
		}
	});
}
//app_union('<?php echo $a->id_app;?>','<?php echo $necessity->id_marketunion;?>','add')
function closeUnionDialog(){
	$("#appUnionDialog").hide();
	$("#bkDiv").hide();
}
var currrent_union_id=0;
function change_union_img_click(union_id){
	currrent_union_id=union_id;
	$("#unionfile").click();
}
function show_wait(){
	$("#bkDiv").show();
	$("#wait_img_div").show();
}
function change_union(){
	$('#changeUnionForm').ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				change_union_img(result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $('#changeUnionForm').formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
//			show_wait();
		}
	});
	return false;
}
function change_union_img(src){
	$.post(
	"/kmadmin/admin/modify_info",
	{
		'info_type':"union_img",
		'src':src,
		'unionid':currrent_union_id
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			location.reload();
		}else{
			alert(result.message);
		}
	});
}	
function save_union_data(unionid){
	$.post(
	"/kmadmin/admin/modify_info",
	{
		'info_type':"union_data",
		'name':$("#name"+unionid).val(),
		'description':$("#description"+unionid).val(),
		'unionid':unionid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function del_union(unionid){
	if(confirm("确定删除该专题？（应用不受影响）")){
		$.post(
			"/kmadmin/admin/del_info",
			{
				'info_type':"union",
				'unionid':unionid
			},
			function(data){
				var result=$.parseJSON(data);
				if(result.result=="success"){
					location.reload();
				}else{
					alert(result.message);
				}
			});
	}
}
function set_union_home(unionid,direction){
	
	$.post(
	"/kmadmin/admin/modify_info",
	{
		'info_type':"union_home",
		'direction':direction,
		'unionid':unionid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function save_website_config(type){
	switch(type){
		case "appleaccount":
			$.post(
			"/kmadmin/admin/modify_info",
			{
				'info_type':"appleaccount",
				'account':$("#appleaccount").val(),
				'password':$("#applepassword").val()
			},
			function(data){
				var result=$.parseJSON(data);
				if(result.result=="success"){
					alert("保存成功！");
					location.reload();
				}else{
					alert(result.message+"或与原信息相同");
				}
			});
			
		break;
	}
}
function check_app(appid,state){
	$.post(
		"/kmadmin/admin/modify_info",
		{
			'info_type':"app_state",
			'state':state,
			'appid':appid
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				location.reload();
			}else{
				alert(result.message);
			}
		});
}