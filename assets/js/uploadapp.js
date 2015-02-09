$(document).ready(function(){
});
function app_upload_click(appid,apptype,merchant,appid){
	$("#apptype").val(apptype);
	$("#merchant").val(merchant);
	$("#appid").val(appid);
	$("#appFile").click();
}
function uploadapp(){
	$('#uploadAppForm').ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				add_new_slider(appid,result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/kmadmin/uploadapp/upload",
		data: $('#uploadAppForm').formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#loading").show();
		}
	});
	return false;
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