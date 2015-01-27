$(document).ready(function(){
	refreshCode();
});
function refreshCode(){
	$("#validCodeImg").attr("src","/cms/index/create_veri_code");
}
function checkuserName(){
	var length = $("#username").val().length;
	if(length<3 || length>15){	//3-15个字符
		$("#tips").show(); 
		$("#tips").text("账号长度为3~15个字符！");
		return false;
	}else{
		$("#tips").hide();
		return true;
	}
}
function checkPwd(){
	var length = $("#LoginPassword").val().length;
	if(length<6 || length>25){	//3-15个字符
		$("#tips").show(); 
		$("#tips").text("密码长度为6~25个字符！");
		return false;
	}else{
		$("#tips").hide(); 
		return true;
	}
}
function checkCfmPwd(){
	var pwd = $("#LoginPassword").val();
	var confirmpwd = $("#ConfirmPassword").val();
	if(pwd!=confirmpwd){	//3-15个字符
		$("#tips").show(); 
		$("#tips").text("两次密码不一致！");
		return false;
	}else{
		$("#tips").hide(); 
		return true;
	}
}
function checkCode(){
	if($("#authCode").val().length==4){
		$.post("/cms/index/check_code",
		{
			'code':$("#authCode").val()
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="failed"){
				$("#tips").show(); 
				$("#tips").text(result.message);
			}else{
				$("#tips").hide();
			}
		});
	}else{
		$("#tips").show(); 
		$("#tips").text("验证码输入错误！");
	}
}
function checkAll(){
	if(checkuserName() && checkPwd() && checkCfmPwd()){
		validation();
		return true;
	}else{
		invalidation();
		return false;
	}
}
function invalidation(){
	$('#btnRegister').attr("style","cursor:default;background:#687685")
}
function validation(){
	$("#btnRegister").attr("style","");
}
function check_veri_code(){
	var result=false;
	$.ajax({
	  type : "post",
	  url : "/cms/index/check_code",
	  data : 'code='+$("#authCode").val(),
	  async : false,
	  success : function(data){
		var result=$.parseJSON(data);
		if(result.result=="failed"){
			$("#tips").show(); 
			$("#tips").text(result.message);
			result=false;
		}else{
			$("#tips").hide();
			result=true;
		}
	  }
	});
	return result;
}
function register(){
	if(checkAll()){
		$.post("/cms/index/add_info",
		{
			'info_type':'register',
			'username':$("#username").val(),
			'pwd':$("#LoginPassword").val()
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				alert("注册成功！请登录");
				location.href="/cms/index/login";
			}else if(result.result=="notunique"){
				$("#tips").show(); 
				$("#tips").text(result.message);
			}else{
				alert("抱歉，注册失败！请稍后重试");
			}
		});
	}
	
}