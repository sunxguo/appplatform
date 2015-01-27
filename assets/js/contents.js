$(document).ready(function(){
	
});

function jump_page(url){
	location.href=url+$("#page_num").val();
}
function delete_essay(essayid){
	if(confirm("确定删除该条文章到回收站？")){
		$.post(
			"/cms/index/modify_info",
			{
				'info_type':"essay_del",
				'essayid':essayid
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
function recover_essay(essayid){
	if(confirm("确定恢复该文章到已发布？")){
		$.post(
			"/cms/index/modify_info",
			{
				'info_type':"essay_re",
				'essayid':essayid
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
function pub_essay(essayid){
	if(confirm("确定发布该文章？")){
		$.post(
			"/cms/index/modify_info",
			{
				'info_type':"essay_pub",
				'essayid':essayid
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
function clear_essay(essayid){
	if(confirm("确定彻底清除该文章？")){
		$.post(
			"/cms/index/del_info",
			{
				'info_type':"essay",
				'essayid':essayid
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
function recover_product(productid){
	if(confirm("确定恢复该商品到已发布？")){
		$.post(
			"/cms/index/modify_info",
			{
				'info_type':"product_re",
				'productid':productid
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
function clear_product(productid){
	if(confirm("确定彻底清除该商品？")){
		$.post(
			"/cms/index/del_info",
			{
				'info_type':"product",
				'productid':productid
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
function delete_product(productid){
	if(confirm("确定删除该商品到回收站？")){
		$.post(
			"/cms/index/modify_info",
			{
				'info_type':"product_del",
				'productid':productid
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
function select(url){
	if($("#state").val()!=0) url+="&state="+$("#state").val();
	if($("#nav").val()!=0) url+="&nav="+$("#nav").val();
	if($("#keyword").val()!="") url+="&search="+$("#keyword").val();
	location.href=url;
}
function selectuser(url){
	if($("#state").val()!=0) url+="&state="+$("#state").val();
	if($("#gender").val()!=0) url+="&gender="+$("#gender").val();
	if($("#keyword").val()!="") url+="&search="+$("#keyword").val();
	location.href=url;
}
function selectform(url){
	if($("#nav").val()!=0) url+="&nav="+$("#nav").val();
	if($("#keyword").val()!="") url+="&search="+$("#keyword").val();
	location.href=url;
}