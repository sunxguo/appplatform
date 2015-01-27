var editor;
$(document).ready(function(){
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="description"]', {
			uploadJson : '/assets/kindEditor/php/upload_json.php',
			fileManagerJson : '/assets/kindEditor/php/file_manager_json.php',
			allowFileManager : true,
			width : '680px',
			height:'300px',
			resizeType:0,
			imageTabIndex:1
		});
	});
	$(".icon-click").click(function (){
		$(".icon-click").removeClass("icon-active");
		$(this).addClass("icon-active");
//		alert($(this).children("img").attr("src"));
	});
	$("input[name='hascat']").click(function(){
		if($("input[name='hascat'][checked]").val()==1){
			
		}else{
			
		}
	});
});
function add_nav(){
	setDivCenter("#addNewFuncDialog");
	$("#bkDiv").show();
}
function closeAddFuncDialog(){
	removeDiv("#addNewFuncDialog");
	$("#bkDiv").hide();
}
function edit_nav(name,navid,type){
	setDivCenter("#edit_nav_dialog");
	$("#bkDiv").show();
	$("#edit_nav_name").text(name);
	$("#edit_name_input").val(name);
	$("#edit_nav_main").hide();
	$("#waitUpload").show();
	$("#navid_edit").val(navid);
	if(type==0){
		$("#edit_nav_main").show();
		$("#waitUpload").hide();
		cat_click("#cat1",1);
		editor.html("");
	}else{
		$.post(
			"/cms/index/get_nav_info",
			{
				'navid':navid
			},
			function(data){
				$("#edit_nav_main").show();
				$("#waitUpload").hide();
				var result=$.parseJSON(data);
				switch(result.result){
					case "1":
						cat_click("#cat1",1);
						$("#sub_nav_list").html("");
						editor.html(result.message);
					break;
					case "2":
						cat_click("#cat2",2);
						$("#sub_nav_list").html("");
						var subnav_data=$.parseJSON(result.message);
						$("#sub_nav_num").val(subnav_data.length);
						for(var i=0;i<subnav_data.length;i++){
							$("#sub_nav_list").append("<li id='sub_nav"+(i+1)+"' onclick='sub_nav_click(this,"+(i+1)+")'>"+subnav_data[i].name_subnav+"</li><textarea id='subnav"+(i+1)+"_content' style='display:none;'>"+subnav_data[i].content_subnav+"</textarea>");
						}
/*						if(subnav_data.length>0){
							sub_nav_click("#sub_nav1",1);
						}*/
					break;
					case "3":
						cat_click("#cat3",3);
						$("#sub_nav_list").html("");
					break;
					case "4":
						cat_click("#cat4",4);
						$("#form_item_list").html("");
						var formitem_data=$.parseJSON(result.message);
						$("#form_item_num").val(formitem_data.length);
						for(var i=0;i<formitem_data.length;i++){
							$("#form_item_list").append("<li id='form_item"+(i+1)+"' onclick='form_item_click(this,"+(i+1)+")'>"+formitem_data[i].name_form+"</li><textarea id='formitem"+(i+1)+"_content' style='display:none;'>"+formitem_data[i].type_form+"</textarea>");
						}
					break;
					case "5":
						cat_click("#cat5",5);
						$("#sub_nav_list").html("");
					break;
					case "6":
						cat_click("#cat6",6);
						$("#sub_nav_list").html("");
						$("#edit_link_input").val(result.message);
					break;
					
				}
			});
	}
}
function closeEditNavDialog(){
	removeDiv("#edit_nav_dialog");
	$("#bkDiv").hide();
}
function addNavIconImg(){
	$("#file").click();
}
function upload_icon_img(form_id){
	$(form_id).ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				$("#preimg").show();
				$("#preimg img").attr("src",result.message);
				$(".icon-click").removeClass("icon-active");
				$("#preimg").addClass("icon-active");
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $(form_id).formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#preimg img").attr("src","/assets/images/cms/loading.gif");
		}
	});
	return false;
}
function add_new_nav(appid){
	$("#save_bt").attr("value","正在添加...");
	$.post(
		"/cms/index/add_info",
		{
			'info_type':"nav",
			'appid':appid,
			'name':$("#new_nav_name").val(),
			'icon':$(".icon-active img").attr("src"),
			'order':$("#new_order_num").val()
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				location.reload();
			}else{
				alert(result.message);
			}
			$("#save_bt").attr("value","添加");
		});
}
function order_nav(appid,direction,navid,navorder){
	$.post(
		"/cms/index/modify_info",
		{
			'info_type':"nav_order",
			'direction':direction,
			'order':navorder,
			'appid':appid,
			'navid':navid
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
function del_nav(appid,navid,order,amount){
	if(confirm("确定删除该条导航？")){
		$.post(
			"/cms/index/del_info",
			{
				'info_type':"nav",
				'appid':appid,
				'navid':navid,
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
var currentSubNav=1;
function sub_nav_click(obj,sub_nav_acount){
	$("#sub_nav_list li").removeClass("active");
	$(obj).addClass("active");
	$("#content").show();
	$($("#current_id").val()).html(editor.html());
	$("#current_id").val("#subnav"+sub_nav_acount+"_content");
	editor.html($("#subnav"+sub_nav_acount+"_content").val());
	$("#update_subnavname").show();
	$("#update_subname_input").val($("#sub_nav"+sub_nav_acount).text());
	currentSubNav=sub_nav_acount;
}
var currentFormItem=1;
function form_item_click(obj,form_item_acount){
	$("#form_item_list li").removeClass("active");
	$(obj).addClass("active");
	$("#update_form_item").show();
//	$("#current_id").val("#subnav"+form_item_acount+"_content");
//	$("#update_subnavname").show();
	$("#update_formitemname_input").val($("#form_item"+form_item_acount).text());
	$("#form_item_size_update").val($("#formitem"+form_item_acount+"_content").val());
	currentFormItem=form_item_acount;
}
var add_sub_nav_count=0;
function add_new_sub(){
	if($("#new_input").val()==""){
		alert("新二级列表项不能为空！");
		$("#new_input").focus();
	}else{
		add_sub_nav_count++;
		var sub_nav_acount=parseInt($("#sub_nav_num").val())+add_sub_nav_count;
		$("#sub_nav_list").append("<li id='sub_nav"+sub_nav_acount+"' onclick='sub_nav_click(this,"+sub_nav_acount+")'>"+$("#new_input").val()+"</li><textarea id='subnav"+sub_nav_acount+"_content' style='display:none;'></textarea>");
		$("#new_input").val("");
	}
}
var add_form_item_count=0;
function add_new_formitem(){
	if($("#new_formitem_input").val()==""){
		alert("新表单项不能为空！");
		$("#new_formitem_input").focus();
	}else{
		add_form_item_count++;
		var form_item_acount=parseInt($("#form_item_num").val())+add_form_item_count;
		$("#form_item_list").append("<li id='form_item"+form_item_acount+"' onclick='form_item_click(this,"+form_item_acount+")'>"+$("#new_formitem_input").val()+"</li><textarea id='formitem"+form_item_acount+"_content' style='display:none;'>"+$("#form_item_size_add").val()+"</textarea>");
		$("#new_formitem_input").val("");
	}
}
function cat_click(obj,cat){
	$("#category input").removeClass("active");
	$(obj).addClass("active");
	$("#catval").val(cat);
	switch(cat){
		case 1:
			$("#subCategory").hide();
			$("#content").show();
			$("#update_subnavname").hide();
			$("#update_form_item").hide();
			$("#essay").hide();
			$("#form").hide();
			$("#mall").hide();
			$("#link").hide();
			$($("#current_id").val()).html(editor.html());
			$("#current_id").val("#cat1_content");
			editor.html($("#cat1_content").val());
		break;
		case 2:
			$("#sub_nav_list li").removeClass("active");
			$("#subCategory").show();
			$("#content").hide();
			$("#update_subnavname").hide();
			$("#update_form_item").hide();
			$("#essay").hide();
			$("#form").hide();
			$("#mall").hide();
			$("#link").hide();
		break;
		case 3:
			$("#subCategory").hide();
			$("#content").hide();
			$("#update_subnavname").hide();
			$("#update_form_item").hide();
			$("#essay").show();
			$("#form").hide();
			$("#mall").hide();
			$("#link").hide();
		break;
		case 4:
			$("#subCategory").hide();
			$("#content").hide();
			$("#update_subnavname").hide();
			$("#update_form_item").hide();
			$("#essay").hide();
			$("#form").show();
			$("#mall").hide();
			$("#link").hide();
		break;
		case 5:
			$("#subCategory").hide();
			$("#content").hide();
			$("#update_subnavname").hide();
			$("#update_form_item").hide();
			$("#essay").hide();
			$("#mall").show();
			$("#form").hide();
			$("#link").hide();
		break;
		case 6:
			$("#subCategory").hide();
			$("#content").hide();
			$("#update_subnavname").hide();
			$("#update_form_item").hide();
			$("#essay").hide();
			$("#form").hide();
			$("#mall").hide();
			$("#link").show();
		break;
	}
}
function initialization(){
	//清空共用部件数据
}
function savenav(){
	$($("#current_id").val()).html(editor.html());
	$("#save_edit_bt").attr("value","正在保存...");
	$.post(
		"/cms/index/update_nav",
		{
			'type':$("#catval").val(),
			'navid':$("#navid_edit").val(),
			'name':$("#edit_name_input").val(),
			'cat1_content':$("#cat1_content").val(),
			'subnavs': get_subnav(),
			'form':get_formitem(),
			'link':$("#edit_link_input").val(),
			'hascat':$("input[name='hascat'][checked]").val()
		},
		function(data){
			var result=$.parseJSON(data);
			if(result.result=="success"){
				$("#save_edit_bt").attr("value","保存成功");
				location.reload();
			}else{
				alert(result.message);
			}
			$("#save_edit_bt").attr("value","保存");
		});
}
function get_subnav(){
	var objJson = [];
	for(var i=1;i<=parseInt($("#sub_nav_num").val())+add_sub_nav_count;i++){
		if($("#sub_nav"+i).length>0)
		objJson.push(jQuery.parseJSON('{"name":"' + $("#sub_nav"+i).text() + '","content":"' + $("#subnav"+i+"_content").html() + '"}')); 
	}
	return objJson;
}
function get_formitem(){
	var objJson = [];
	for(var i=1;i<=parseInt($("#form_item_num").val())+add_form_item_count;i++){
		if($("#form_item"+i).length>0)
		objJson.push(jQuery.parseJSON('{"name":"' + $("#form_item"+i).text() + '","type":"' + $("#formitem"+i+"_content").val() + '"}')); 
	}
	return objJson;
}
function update_subname(){
	$("#sub_nav"+currentSubNav).text($("#update_subname_input").val());
}
function update_formitem(){
	$("#form_item"+currentFormItem).text($("#update_formitemname_input").val());
	$("#formitem"+currentFormItem+"_content").val($("#form_item_size_update").val());
}
function delete_subnav(){
	$("#sub_nav"+currentSubNav).remove();
	$("#subnav"+currentSubNav+"_content").remove();
	$("#content").hide();
	$("#update_subnavname").hide();
}
function delete_formitem(){
	$("#form_item"+currentFormItem).remove();
	$("#formitem"+currentFormItem+"_content").remove();
	$("#update_form_item").hide();
}