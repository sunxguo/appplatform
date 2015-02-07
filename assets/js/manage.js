$(document).ready(function(){
});
function modify(type,id,data){
	switch(type){
		case "app_drop":
			$.post("/cms/index/checkAuhority",
				{
					'type':'pDelApp'
				},
				function(returndata){
					if(returndata=="true"){
						var msg=(data=="down")?"删除":"恢复";
						var con_msg=(data=="down")?"是否删除该应用?（删除后可在“我的回收站”中找到）":"是否恢复该应用？";
						if(confirm(con_msg)){
							$.post("/cms/index/modify_info",
								{
									'info_type':'app_drop',
									'id':id,
									'data':data=="down"?7:1
								},
								function(data){
									var result=$.parseJSON(data);
									if(result.result=="success"){
										alert("应用"+msg+"成功！");
										location.reload();
									}else alert(msg+"失败，请稍后重试！");
								});
						}
					}else alert("抱歉，你没有权限删除应用！");
				});
		break;
		case "app_validity":
			$.post("/cms/index/checkAuhority",
				{
					'type':'pClearApp'
				},
				function(returndata){
					if(confirm("是否彻底删除该应用?（删除后不可恢复）")){
						$.post("/cms/index/modify_info",
							{
								'info_type':'app_validity',
								'id':id,
								'data':0
							},
							function(data){
								var result=$.parseJSON(data);
								if(result.result=="success"){
									alert("应用清除成功！");
									location.reload();
								}else alert("清除失败，请稍后重试！");
							});
					}
				});
		break;
	}
}