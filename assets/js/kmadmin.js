$(document).ready(function(){
	$("#bkDiv").click(function(){
		$("#bkDiv").hide();
		$("#appPerDialog").hide();
		$("#appUnionDialog").hide();
	});
	$("table tr .msgtitle").hover(function(event){
		$("#msgdata").html("");
		$("#msgwait").show();
		$.post(
		"/kmadmin/admin/get_info",
		{
			'info_type':"message",
			'messageid':$(this).attr("msgid")
		},
		function(data){
			var result=$.parseJSON(data);
			$("#msgwait").hide();
			if(result.result=="success"){
				$("#msgdata").html(result.message.msg_message);
			}else{
				alert(result.message);
			}
		});
		$("#msg_content").show(); 
		$("#msg_content").css("left", event.clientX+10); 
		$("#msg_content").css("top", event.clientY+20);
	},function(){
		$("#msg_content").hide(); 
	});
});

function jump_page(url){
	location.href=url+$("#page_num").val();
}
function freeze_merchant(merchantid){
	if(confirm("确定冻结该账户？")){
		$.post(
			"/kmadmin/admin/modify_info",
			{
				'info_type':"merchant_freeze",
				'merchantid':merchantid
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
function recover_merchant(merchantid){
	if(confirm("确定恢复该账户？")){
		$.post(
			"/kmadmin/admin/modify_info",
			{
				'info_type':"merchant_re",
				'merchantid':merchantid
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
function delete_merchant(merchantid){
	if(confirm("确定彻底删除该账户？")){
		$.post(
			"/kmadmin/admin/del_info",
			{
				'info_type':"merchant",
				'merchantid':merchantid
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

function selectmerc(url){
	if($("#state").val()!=0) url+="&state="+$("#state").val();
	if($("#gender").val()!=0) url+="&gender="+$("#gender").val();
	if($("#keyword").val()!="") url+="&search="+$("#keyword").val();
	location.href=url;
}
function selectapp(url){
	if($("#state").val()!=-1) url+="&state="+$("#state").val();
	if($("#category").val()!=0) url+="&cat="+$("#category").val();
	if($("#keyword").val()!="") url+="&search="+$("#keyword").val();
	location.href=url;
}
function selectmsg(url){
	if($("#keyword").val()!="") url+="&search="+$("#keyword").val();
	url+="&type="+$("#type").val();
	location.href=url;
}
var currentappid=0;
function app_per(appid){
	setDivCenter("#appPerDialog");
	$("#bkDiv").show();
	currentappid=appid;
	$.post(
	"/kmadmin/admin/get_info",
	{
		'info_type':"app",
		'appid':appid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			var msg=result.message;
			$("#per_appname").text(msg.name_app);
			var pernum=parseInt(msg.perid_app-1).toString(2);
			if(pernum+1000>1111){
				$("#per_essay").prop("checked",true);
				pernum-=1000;
			}else $("#per_essay").removeAttr("checked");
			
			if(pernum+100>111){
				$("#per_mall").prop("checked",true);
				pernum-=100;
			}else $("#per_mall").removeAttr("checked");
			if(pernum+10>11){
				$("#per_form").prop("checked",true);
				pernum-=10;
			}else $("#per_form").removeAttr("checked");
			if(pernum+1>1){
				$("#per_user").prop("checked",true);
			}else $("#per_user").removeAttr("checked");
		}else{
			alert(result.message);
		}
	});
}
function per_save(){
	var num=0;
	if($("#per_essay").prop("checked")){
		num+=1000;
	}
	if($("#per_mall").prop("checked")){
		num+=100;
	}
	if($("#per_form").prop("checked")){
		num+=10;
	}
	if($("#per_user").prop("checked")){
		num+=1;
	}
	$.post(
	"/kmadmin/admin/modify_info",
	{
		'info_type':"app_permission",
		'appid':currentappid,
		'permission':(parseInt(num, 2)+1)
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert("修改成功！");
			closeAppPerDialog();
		}else{
			alert(result.message);
		}
	});
}
function receive_type(){
	if($("#type").val()==0){
		$("#device_div").show();
		$("#merchant_div").hide();
	}
	else if($("#type").val()==1){
		$("#device_div").hide();
		$("#merchant_div").show();
	}else{
		$("#device_div").hide();
		$("#merchant_div").hide();
	}
}
function push_msg(){
	$.post(
	"/kmadmin/admin/add_info",
	{
		'info_type':"message",
		'type':$("#type").val(),
		'from':"kmadmin",
		'to':$("#merchant").val(),
		'device':$("#device").val(),
		'title':$("#title").val(),
		'msg':$("#msg_content").val()
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert("发送成功！");
			location.reload();
		}else{
			alert(result.message);
		}
	});
}

function add_new_union(){
	$.post(
	"/kmadmin/admin/add_info",
	{
		'info_type':"union",
		'name':$("#new_union_name").val(),
		'img':$("#new_union_img").attr("src"),
		'description':$("#new_union_description").val()
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			alert("添加成功！");
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function closeAppPerDialog(){
	$("#appPerDialog").hide();
	$("#bkDiv").hide();
}
function add_union_img(){
	$("#newunionfile").click();
}
function change_new_union(){
	$('#changeNewUnionForm').ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				$("#new_union_img").attr("src",result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $('#changeNewUnionForm').formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
//			show_wait();
		}
	});
	return false;
}
//让指定的DIV始终显示在屏幕正中间   
function setDivCenter(divId){  
	var top = ($(window).height() > $(divId).height())?($(window).height() - $(divId).height())/2:0;   
	var left = ($(window).width() - $(divId).width())/2;   
	var scrollTop = $(document).scrollTop();   
	var scrollLeft = $(document).scrollLeft();   
	$(divId).css( { position : 'absolute', 'top' : top + scrollTop, left : left + scrollLeft } ).show(100);  
}
function removeDiv(divId){  
	$(divId).hide(100);  
}

