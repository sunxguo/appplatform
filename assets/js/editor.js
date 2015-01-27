var editor;
$(document).ready(function(){
	KindEditor.ready(function(K) {
		editor = K.create('textarea[editor="description"]', {
			uploadJson : '/assets/kindEditor/php/upload_json.php',
			fileManagerJson : '/assets/kindEditor/php/file_manager_json.php',
			allowFileManager : true,
			width : '680px',
			height:'300px',
			resizeType:0,
			imageTabIndex:1
		});
	});
});
function add_adimg(){
	$("#file").click();
}
function upload_ad_img(form_id){
	$(form_id).ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				$("#adimg").attr("src",result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $(form_id).formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#adimg").attr("src","/assets/images/cms/loading.gif");
		}
	});
	return false;
}
function save_ad(position){
	$("#bt_save").attr("value","正在保存...");
	$.post(
		"/kmadmin/admin/modify_info",
		{
			'info_type':"ad",
			'position':position,
			'img':$("#adimg").attr("src"),
			'content':editor.html()
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				alert("保存成功！");
				location.reload();
			}else{
				alert(result.message);
			}
			$("#bt_save").attr("value","保存");
		});
}