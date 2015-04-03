var content_content_editor;
$(document).ready(function(){
	KindEditor.ready(function(K) {
		content_content_editor = K.create('#content_content', {
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
function save_content(contentId){
	
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