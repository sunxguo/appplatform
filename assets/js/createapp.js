$(document).ready(function(){
	
});
function get_cat(){
	
}
function pickcolor(){
	$("#skincolor").click();
	colorClick('5');
}
function checkAppName(){
	var length = $("#appName").val().length;
	if(length<1 || length>10){
		$("#appNameMes").show();
		return false;
	}else{
		$("#appNameMes").hide(); 
		$("#appNamePre").text($("#appName").val());
		return true;
	}
}
function checkDisplayWord(){
	var str=$("#displayWord").val();
	str=str.substr(0,4);
	$("#displayWord").val(str);
	var className="";
	switch(str.length){
		case 1:
			className="font-one";
		break;
		case 2:
			className="font-two";
		break;
		case 3:
			className="font-three";
		break;
		case 4:
			className="font-four";
			var str1=str.substr(0,2);
			var str2=str.substr(2,2);
			str=str1+"<br>"+str2;
		break;
	}
	$("#iconFontShow").html(str);
	$("#iconFontShow").prop("class",className);
	return true;
}
function checkDesc(){
	var length = $("#appDesc").val().length;
	if(length<50){
		$("#appDescMes").show();
		$("#appDescMes").text("应用描述长度不能小于50个字");
		return false;
	}else if(length>2000){
		$("#appDescMes").show();
		$("#appDescMes").text("应用描述长度不能大于2000个字");
		return false;
	}else{
		$("#appDescMes").hide();
		return true;
	}
}
function iconClick(id){
	$("#iconArray").children().each(function(i,n){
		var obj = $(n)
		$("#icon"+(i+1)).removeClass();
    });
	$("#icon"+id).attr("class","current");
	if(id==6) $("#iconFontShow").css("color","black");
	else $("#iconFontShow").css("color","white");
	if(id==7){
		$("#previewimg").attr("src",$("#cusImg").attr("src"));
		$("#displayWord").val("");
		$("#iconFontShow").text("");
		$("#displayWord").attr("disabled","disabled");
		$("#is_text_input").val("no");
	}else{
		$("#previewimg").attr("src","/resource/icon/"+id+".png");
		$('#displayWord').removeAttr("disabled"); 
		$("#is_text_input").val("yes");
	}
	$("#icon_pic_input").val(id);
}
function launchClick(id){
	$("#launchPic").children().each(function(i,n){
		$("#launch"+(i+1)).removeClass();
    });
	$("#launch"+id).attr("class","current");
	if(id==5){
		$("#phoneBg").attr("src",$("#img5").attr("src"));
	}else{
		$("#phoneBg").attr("src","/resource/launch/"+id+".png");
	}
	$("#launch_pic_input").val(id);
}
function colorClick(id){
	$("#skinDiv").children().each(function(i,n){
		$("#skin"+(i+1)).removeClass();
    });
	$("#skin"+id).attr("class","current");
	$("#phoneBg").attr("src","/resource/skin/"+$("#template_input").val()+"/"+id+".png");
	$("#skin_color_input").val(id);
}
function temClick(id){
	$("#temDiv").children().each(function(i,n){
		$("#tem"+(i+1)).removeClass();
    });
	$("#tem"+id).attr("class","current");
	$("#phoneBg").attr("src","/resource/skin/"+id+"/"+$("#skin_color_input").val()+".png");
	$("#template_input").val(id);
}
function iconAdd(){
	$("#bkDiv").show();
	$("#uploadIconDialog").show();
	setDivCenter("#uploadIconDialog");
}
function launchAdd(){
	$("#bkDiv").show();
	$("#uploadLaunchDialog").show();
	setDivCenter("#uploadLaunchDialog");
}
function closeAddDialog(){
	$("#bkDiv").hide();
	$("#uploadIconDialog").hide();
}
function closeLaunchDialog(){
	$("#bkDiv").hide();
	$("#uploadLaunchDialog").hide();
}
function closeCreateAppDialog(){
	$("#bkDiv").hide();
	$("#createAppDialog").hide();
}
function chooseImg(){
	$("#file").click();
}
function chooseLaunchImg(){
	$("#launchFile").click();
}
function upload_img(form_id){
	$(form_id).ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				$("#waitUpload").hide();
				$("#bkDiv").hide();
				$("#uploadIconDialog").hide();
				$("#icon7").show();
				$("#iconAdd").hide();
				$("#reupload").show();
				$("#cusImg").attr("src",result.message);
				$("#previewimg").attr("src",result.message);
				iconClick(7);
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $(form_id).formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#waitUpload").show();
		}
	});
	return false;
}
function upload_launch(){
	$("#uploadLaunchForm").ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				$("#waitLaunchUpload").hide();
				$("#bkDiv").hide();
				$("#uploadLaunchDialog").hide();
				$("#launch5").show();
				$("#div5").hide();
				$("#divupload").show();
				$("#img5").attr("src",result.message);
				$("#phoneBg").attr("src",result.message);
				launchClick(5);
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $("#uploadLaunchForm").formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#waitLaunchUpload").show();
		}
	});
	return false;
}
function step(fromStep,toStep){
	var check=false;
	switch(fromStep){
		case 1:
			if(checkAppName() && checkDisplayWord() && checkDesc()){
				$("#step1Div").hide();
				$("#previewDiv").hide();
				$("#stepDiv").removeClass("step1");
				check=true;
			}
		break;
		case 2:
			$("#step2Div").hide();
			$("#stepDiv").removeClass("step2");
			check=true;
		break;
		case 3:
			$("#step3Div").hide();
			$("#stepDiv").removeClass("step3");
			check=true;
		break;
	}
	if(check){
		switch(toStep){
			case 1:
				$("#step1Div").show();
				$("#phoneBg").attr("src","/assets/images/cms/16.png");
				iconClick($("#icon_pic_input").val());
				$("#previewDiv").show();
				$("#stepDiv").addClass("step1");
			break;
			case 2:
				$("#step2Div").show();
				//$("#phoneBg").attr("src",get_pic_src("launch",$("#launch_pic_input").val()));
				launchClick($("#launch_pic_input").val());
				$("#stepDiv").addClass("step2");
			break;
			case 3:
				$("#step3Div").show();
				//$("#phoneBg").attr("src","/resource/skin/"+$("#template_input").val()+"/"+$("#skin_color_input").val()+".png");
				colorClick($("#skin_color_input").val());
				temClick($("#template_input").val());
				$("#stepDiv").addClass("step3");
			break;
		}
	}
}
function get_pic_src(type,id){
	var src="";
	switch(type){
		case "icon":
			if(id==7) src=$("#cusImg").attr("src");
			else src="/resource/icon/"+id+".png";
		break;
		case "launch":
			if(id==5) src=$("#img5").attr("src");
			else src="/resource/launch/"+id+".png";
		break;
	}
	return src;
}
var interval;
var count=0;
function create(){
	$("#bkDiv").show();
	$("#createAppDialog").show();
	setDivCenter("#createAppDialog");
	interval = setInterval(progress,"250");
	uploadAppInfo();
}
function save(){
	$("#bkDiv").show();
	$("#createAppDialog").show();
	setDivCenter("#createAppDialog");
	interval = setInterval(progress,"250");
	saveAppInfo();
}
function progress(){
	if(count<100){
		$("#percent").text(count+"%");
		$("#create_bar").css("width",count+"%");
		count++;
	}else{
		clearTimeout(interval); 
	}
}
function uploadAppInfo(){
	$.post("/cms/index/add_info",
		{
			'info_type':'app',
			'name':$("#appName").val(),
			'icon':get_pic_src("icon",$("#icon_pic_input").val()),
			'icontext':$("#displayWord").val(),
			'isicontext':$("#is_text_input").val(),
			'launch':get_pic_src("launch",$("#launch_pic_input").val()),
			'description':$("#appDesc").val(),
			'template':$("#template_input").val(),
			'category':$("#category").val(),
			'skin':$("#skin_color_input").val(),
			'skincolor':$("#skincolor").val()
		},
		function(data){
			var result=$.parseJSON(data);
			$("#create_tip_msg").text(result.message);
			if(result.result=="success"){
				clearTimeout(interval);
				$("#percent").text("100%");
				$("#create_bar").css("width","100%");
				location.href="/cms/index/app";
			}
		});
}function saveAppInfo(id){
	$.post("/cms/index/modify_info",
		{
			'info_type':'app_info',
			'id':id,
			'name':$("#appName").val(),
			'icon':get_pic_src("icon",$("#icon_pic_input").val()),
			'icontext':$("#displayWord").val(),
			'isicontext':$("#is_text_input").val(),
			'launch':get_pic_src("launch",$("#launch_pic_input").val()),
			'description':$("#appDesc").val(),
			'template':$("#template_input").val(),
			'category':$("#category").val(),
			'skin':$("#skin_color_input").val(),
			'skincolor':$("#skincolor").val()
		},
		function(data){
			var result=$.parseJSON(data);
			$("#create_tip_msg").text(result.message);
			if(result.result=="success"){
				clearTimeout(interval);
				$("#percent").text("100%");
				$("#create_bar").css("width","100%");
				location.href="/cms/index/app";
			}
		});
}
