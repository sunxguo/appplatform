var essay_editor;
$(document).ready(function(){
	$(".slider-item").mouseout(function(){
		$(this).find('.oper').hide();
	});
	$(".slider-item").mouseover(function(){
		$(this).find('.oper').show();
	});
	KindEditor.ready(function(K) {
		essay_editor = K.create('#essay_content', {
			uploadJson : '/assets/kindEditor/php/upload_json.php',
			fileManagerJson : '/assets/kindEditor/php/file_manager_json.php',
			allowFileManager : true,
			width : '100%',
			height:'300px',
			resizeType:0,
			imageTabIndex:1
		});
	});
});
function imgout(obj){
	$(obj).find('.del-bt').hide();
}
function imgover(obj){
	$(obj).find('.del-bt').show();
}
function delclick(obj){
	$(obj).parent('.imagelist').remove();
	$("#file").val("");
	$("#addImgList").show();
}
function sliderAdd(){
	$("#file").click();
}
function previewimgAdd(){
	$("#file").click();
}
function upload_slider(appid){
	$('#uploadSliderForm').ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				add_new_slider(appid,result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $('#uploadSliderForm').formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#loading").show();
		}
	});
	return false;
}
function upload_previewimg(appid){
	$('#uploadPreviewImgForm').ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				add_new_previewimg(appid,result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $('#uploadPreviewImgForm').formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#loading").show();
		}
	});
	return false;
}

function add_new_slider(appid,src){
	$.post(
		"/cms/index/add_info",
		{
			'info_type':"slider",
			'appid':appid,
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
function add_new_previewimg(appid,src){
	$.post(
	"/cms/index/add_info",
	{
		'info_type':"previewimg",
		'appid':appid,
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
function slider_order(direction,ordernum,appid,sliderid){
	$.post(
	"/cms/index/modify_info",
	{
		'info_type':"slider_order",
		'direction':direction,
		'order':ordernum,
		'appid':appid,
		'sliderid':sliderid
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
function previewimg_order(direction,ordernum,appid,previewimgid){
	$.post(
	"/cms/index/modify_info",
	{
		'info_type':"previewimg_order",
		'direction':direction,
		'order':ordernum,
		'appid':appid,
		'previewimgid':previewimgid
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
function slider_delete(appid,sliderid,order,amount){
	if(confirm("确定删除该滚动图片？")){
		$.post(
			"/cms/index/del_info",
			{
				'info_type':"slider",
				'appid':appid,
				'sliderid':sliderid,
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
function previewimg_delete(appid,previewimgid,order,amount){
	if(confirm("确定删除该预览图？")){
		$.post(
			"/cms/index/del_info",
			{
				'info_type':"previewimg",
				'appid':appid,
				'previewimgid':previewimgid,
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
function publish_essay(draft){
	if($("#nav").val()==-1){
		alert("请选择发布到的导航！");
		return false;
	}
	if($("#title").val()==""){
		alert("请输入文章标题！");
		return false;
	}
	if($("#imgListDivs .imagelist").length<1){
		alert("请上传至少一张缩略图！");
		return false;
	}
	$.post(
	"/cms/index/add_info",
	{
		'info_type':"essay",
		'navid':$("#nav").val(),
		'title':$("#title").val(),
		'summary':$("#summary").val(),
		'content':essay_editor.html(),
		'thumbnail':get_thumb(),
		'draft':draft
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			var info="发布";
			if(draft==1)  info="保存草稿";
			alert(info+"成功！");
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function save_essay(draft,essayid){
	if($("#nav").val()==-1){
		alert("请选择发布到的导航！");
		return false;
	}
	if($("#title").val()==""){
		alert("请输入文章标题！");
		return false;
	}
	if($("#imgListDivs .imagelist").length<1){
		alert("请上传至少一张缩略图！");
		return false;
	}
	$.post(
	"/cms/index/modify_info",
	{
		'info_type':"essay",
		'navid':$("#nav").val(),
		'essayid':essayid,
		'title':$("#title").val(),
		'summary':$("#summary").val(),
		'content':essay_editor.html(),
		'thumbnail':get_thumb(),
		'draft':draft
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			var info="发布";
			if(draft==1)  info="保存草稿";
			alert(info+"成功！");
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function save_product(draft,productid){
	if($("#nav").val()==-1){
		alert("请选择发布到的导航！");
		return false;
	}
	if($("#title").val()==""){
		alert("请输入商品名称！");
		return false;
	}
	if($("#imgListDivs .imagelist").length<1){
		alert("请上传至少一张缩略图！");
		return false;
	}
	$.post(
	"/cms/index/modify_info",
	{
		'info_type':"product",
		'navid':$("#nav").val(),
		'productid':productid,
		'title':$("#title").val(),
		'summary':$("#summary").val(),
		'catid':$("#category").val(),
		'unit':$("#unit").val(),
		'oriPrice':$("#oriPrice").val(),
		'price':$("#price").val(),
		'content':essay_editor.html(),
		'thumbnail':get_thumb(),
		'draft':draft
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			var info="发布";
			if(draft==1)  info="保存草稿";
			alert(info+"成功！");
			location.reload();
		}else{
			alert(result.message);
		}
	});
}
function publish_product(draft){
	if($("#nav").val()==-1){
		alert("请选择发布到的导航！");
		return false;
	}
	if($("#title").val()==""){
		alert("请输入商品标题！");
		return false;
	}
	if($("#price").val()==""){
		alert("请输入商品价格！");
		return false;
	}
	$.post(
	"/cms/index/add_info",
	{
		'info_type':"product",
		'navid':$("#nav").val(),
		'catid':$("#category").val(),
		'unit':$("#unit").val(),
		'oriPrice':$("#oriPrice").val(),
		'price':$("#price").val(),
		'title':$("#title").val(),
		'summary':$("#summary").val(),
		'content':essay_editor.html(),
		'thumbnail':get_thumb(),
		'draft':draft
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			var info="发布";
			if(draft==1)  info="保存草稿";
			alert(info+"成功！");
			location.reload();
		}else{
			alert(result.message);
		}
	});
}

function get_thumb(){
	var objJson = [];
	$("#imgListDivs .imagelist").each(function(index){
		objJson.push(jQuery.parseJSON('{"src":"' + $(this).find('.thumb-src').attr("src") + '"}')); 
	})
	return objJson;
}
function add_thumb(){
	$("#file").click();
}
function upload_thumb_img(form_id){
	$(form_id).ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				$("#addImgList div img").attr("src","/assets/images/cms/appbg_ad.png");
				var new_img_item='<li onmouseover="imgover(this)" onmouseout="imgout(this)" class="img-item imagelist"><img class="thumb-src" width="77" height="77" src="'+result.message+'"><img onclick="delclick(this)" class="del-bt" title="删除该缩略图" src="/assets/images/cms/delete.png"></li>';
				$("#addImgList").before(new_img_item);
				if($("#imgListDivs").children(".imagelist").length>=3){
					$("#addImgList").hide();
				}
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $(form_id).formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#addImgList div img").attr("src","/assets/images/cms/loading.gif");
		}
	});
	return false;
}
function get_cat(){
	$.post(
	"/cms/index/get_mallcat_info",
	{
		'navid':$("#nav").val()
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="1"){
			$("#category").show();
			$("#category").html("");
			var cat_data=$.parseJSON(result.message);
			for(var i=0;i<cat_data.length;i++){
				$("#category").append('<option value="'+cat_data[i].id_mall_category+'">'+cat_data[i].name_mall_category+'</option>');
			}
		}else{
			$("#category").hide();
		}
	});
}
function publish_app(appid){
	if($("#previewimgPic .slider-item").length<1){
		alert("请上传至少一张预览图！");
		return false;
	}
	if(confirm("确定发布该应用？")){
		$.post(
		"/cms/index/modify_info",
		{
			'info_type':"publish_app",
			'id':appid
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				alert("提交成功！等待审核");
				location.reload();
			}else{
				alert(result.message);
			}
		});
	}
}