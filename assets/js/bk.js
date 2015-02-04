$(document).ready(function(){
		$("input:button[name=deleteButton]").click(function(){
			var checked = [];
			$('input:checkbox[name=pro]:checked').each(function() {
				if($(this).val()!="on"){
					checked.push($(this).val());
				}
			});
			if(checked.length > 0){
				$.post("/merchant/product_delete",{'checked':checked},function(data){alert(data);location.href = "/merchant/"+$("#type").val();});
			}else{
				alert("请先选择要删除的商品！");
			}
			
		});
		$("input:button[name=shelveButton]").click(function(){
			var checked = [];
			$('input:checkbox[name=pro]:checked').each(function() {
				if($(this).val()!="on"){
					checked.push($(this).val());
				}
			});
			if(checked.length > 0){
				$.post("/merchant/shelve",{'checked':checked},function(data){alert(data);location.href = "/merchant/"+$("#type").val();});
			}else{
				alert("请先选择要上架的商品！");
			}
			
		});
		$("input:button[name=offShelveButton]").click(function(){
			var checked = [];
			$('input:checkbox[name=pro]:checked').each(function() {
				if($(this).val()!="on"){
					checked.push($(this).val());
				}
			});
			if(checked.length > 0){
				$.post("/merchant/offShelve",{'checked':checked},function(data){alert(data);location.href = "/merchant/"+$("#type").val();});
			}else{
				alert("请先选择要下架的商品！");
			}
			
		});
		$("#checkAll").click(function(){
			if($("#checkAll").prop("checked")){
				$("#checkAll").prop("checked",true);
				$("#checkAll1").prop("checked",true);
				$("input[name='pro']").prop("checked",true);
			}else{
				$("#checkAll").prop("checked",false);
				$("#checkAll1").prop("checked",false);
				$("input[name='pro']").prop("checked",false);
			}
		});
		$("#checkAll1").click(function(){
			if($("#checkAll1").prop("checked")){
				$("#checkAll").prop("checked",true);
				$("#checkAll1").prop("checked",true);
				$("input[name='pro']").prop("checked",true);
			}else{
				$("#checkAll").prop("checked",false);
				$("#checkAll1").prop("checked",false);
				$("input[name='pro']").prop("checked",false);
			}
		});
		$("input:checkbox[name=pro]").click(function(){
			if($(this).prop("checked")){
				var checkall=true;
				$("input:checkbox[name=pro]").each(function(){
					if(!$(this).prop("checked")){
					checkall=false;}
				});
				if(checkall)
				{
					$("#checkAll").prop("checked",true);
					$("#checkAll1").prop("checked",true);
				}
			}else{
				$("#checkAll").prop("checked",false);
				$("#checkAll1").prop("checked",false);
			}
		}) ;
	});	
	
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
	function jump(keywords){
		var pageNum=$('#pagenum').val();
		if(pageNum>0&&pageNum!=null)
			location.href="/merchant/"+$("#type").val()+"?page="+pageNum+keywords;
		else
			alert("请输入正确页数!");
	}
	//搜索
	function search(){
		var p_name="";
		var p_listed="";
		if($("#type").val()!=undefined){
			p_name=$("#p_name").val();
			if($("#p_listed option:selected").val()!=undefined){
				p_listed=$("#p_listed option:selected").val()!="all"?"&listed="+$("#p_listed option:selected").val():"";
			}
			location.href="/merchant/"+$("#type").val()+"?name="+p_name+p_listed;
		}
		else{
		alert("没有商品可搜索！");}
		
	}
	//单个商品上架
	function shelve(p_id){
		var checked = [];
		checked.push(p_id);
		if(checked.length > 0){
			$.post("/merchant/shelve",{'checked':checked},function(data){alert(data);location.href = "/merchant/"+$("#type").val();});
		}else{
			alert("请先选择要上架的商品！");
		}
	}
	//单个商品下架
	function offShelve(p_id){
		var checked = [];
		checked.push(p_id);
		if(checked.length > 0){
			$.post("/merchant/offShelve",{'checked':checked},function(data){alert(data);location.href = "/merchant/"+$("#type").val();});
		}else{
			alert("请先选择要下架的商品！");
		}
	}
	function logout(){
		$.post("/cusers/user_logout",{'id':''},
			function(data){
				alert(data);
				location.reload();
		});
	}
	
	function modify_merchant_pwd(){
		var username=$("#username").val();
		var oldpwd=$("#oldpwd").val();
		var newpwd=$("#newpwd").val();
		var renewpwd=$("#renewpwd").val();
		if(username==""||oldpwd==""||newpwd==""||renewpwd==""){
			$("#errorInfo").show();
			$("#errorInfo").text("请填写完整！");
		}
		else if(newpwd!=renewpwd){
			$("#errorInfo").show();
			$("#errorInfo").text("两次新密码不一致");
		}
		else{
			$("#errorInfo").hide();
			$.post(
				"/kmadmin/admin/modify",
				{
					'modifytype':"merchantpwd",
					'username':username,
					'oldpwd':oldpwd,
					'newpwd':newpwd
				},
				function(data){
					var result=$.parseJSON(data);
					if(result.result=="success"){
						alert(result.message);
						window.location.href="/cms/index/logout"; 
					}else{
						alert(result.message);
					}
				});
		}
		
	}
function avatar_modify_click(){
	$("#avatarfile").click();
}
function upload_avatar(){
	$('#uploadAvatarForm').ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				modify_avatar(result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $('#uploadAvatarForm').formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#loading").show();
		}
	});
	return false;
}

function modify_avatar(src){
	$.post(
		"/cms/index/modify_info",
		{
			'info_type':"merchant_avatar",
			'src':src
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
	function save_merchant_info(){
		$.post(
			"/cms/index/modify_info",
			{
				'info_type':"merchant_data",
				'gender':$("#gender").val(),
				'email':$("#email").val(),
				'phone':$("#phone").val(),
				'qq':$("#qq").val(),
				'birthday':$("#birthday").val()
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
function add_correlation(){
	$.post(
		"/cms/index/modify_info",
		{
			'info_type':"merchant_correlation",
			'username':$("#username").val(),
			'apply_msg':$("#apply_msg").val()
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				location.reload();
			}else{
				alert("该账号不存在，可注册后再添加");
			}
		});
}
function accept_apply(type){
	if(confirm("接受该申请后只有上一级账号赋予的权限，确定接受？")){
		var resultnum=1;
		if(type=="ok") resultnum=2;
		$.post(
			"/cms/index/modify_info",
			{
				'info_type':"merchant_apply",
				'resultnum':resultnum
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
function save_account_config_info(type,appid){
	switch(type){
		case "alipay":
			$.post(
			"/cms/index/modify_info",
			{
				'info_type':"account_config_alipay",
				'appid':appid,
				'alipay':$("#alipayaccount").val()
			},
			function(data){
				var result=$.parseJSON(data);
				if(result.result=="success"){
					alert("保存成功");
					location.reload();
				}else{
					alert(result.message+"或与原账号相同");
				}
			});
		break;
	}
}