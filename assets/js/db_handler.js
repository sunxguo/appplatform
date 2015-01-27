$(document).ready(function(){
	});	
	//添加
	function add(type){
		switch(type){
			case "problem":
				var title=$("#new_title").val();
				var con=editor.html();
				if(title==""||con=="") alert("请填写完整！");
				else{
					$.post("/cadmin/add_data",{'title':title,'content':con,'type':'problem'},function(data){alert(data);location.reload();});
				}
			break;
			case "contest":
				var langArray=getCheckBox("lang","语言",true);
				if(langArray!="empty"){
					if($("#title").val()==""||editor.html()=="" || $("#start_time").val()=="" || $("#end_time").val()=="") alert("请填写完整！");
					else{
						$.post("/cadmin/add_data",{
							'title':$("#title").val(),
							'content':editor.html(),
							'type':'contest',
							'start_time':$("#start_time").val(),
							'end_time':$("#end_time").val(),
							'url':$("#url").val(),
							'lang':langArray
						},function(data){
							var Obj=$.parseJSON(data);
							var msg_cn=(Obj.result=="success")?"添加成功":"添加失败";
							if(Obj.message=="urlnotunique"){
								alert("别名网址 不唯一");
								return false;
							}
							alert(msg_cn);
							if(Obj.result=="success")location.reload();
						});
					}
				}
			break;
			case "grouppro":
				var num=$("#input-pro-num").val();
				var pid=$("#input-pro-id").val();
				var title=$("#show-pro-title").text();
				var gid=$("#editor_new_id").val();
				if(num=="" || pid=="" || title=="没有找到该题目") alert("请正确填写！");
				else{
					$.post("/cadmin/add_data",{'type':'grouppro','num':num,'pid':pid,'gid':gid},function(data){
						var Obj=$.parseJSON(data);
						alert(Obj.result);
						$.post("/cadmin/get_detail",{'id':Obj.message.gp_pID,'type':'problem'},
							function(pdata){
								var problem=$.parseJSON(pdata);
								var html='<li id="gp'+Obj.message.gp_ID+'"><span style="width:10%;">'+Obj.message.gp_pNum+'</span><span style="width:20%;">'+Obj.message.gp_pID+'</span><span style="width:40%;">'+problem.p_Title+'</span><a style="width:20%;"  onclick="delete_data(\'grouppro\',\''+Obj.message.gp_ID+'\');">删除</a></li>';
								$("#prolist").prepend(html);
						});
					});
				}
			break;
			default:
			break;
		}
	}
	
	//设置编辑器内容
	function setContent(type,id){
		switch(type){
			case "problem":
				$.post("/cadmin/get_detail",{'id':id,'type':'problem'},
						function(data){
							var Obj=$.parseJSON(data);
							$("#editor_new_id").val(id);
							$("#editor_new_title").val(Obj.p_Title);
							editor1.html(Obj.p_Content);
						});
			break;
			case "user":
				$.post("/cadmin/get_detail",{'id':id,'type':'user'},
						function(data){
							var Obj=$.parseJSON(data);
							$("#editor_new_id").val(id);
							$("#editor_new_title").val(Obj.u_name);
						});
			break;
			case "contest":
				//tab1:基本信息
				$.post("/cadmin/get_detail",{'id':id,'type':'contest'},
						function(data){
							var Obj=$.parseJSON(data);
							$("#editor_new_id").val(id);
							$("#editor_new_title").val(Obj.cont_title);
							$("#start_time").val(Obj.cont_startTime);
							$("#end_time").val(Obj.cont_endTime);
							$("#url").val(Obj.cont_url);
							$("#lang-box").html("");
							for(var langId in Obj.lang){
								$("#lang-box").append('<dd><input type="checkbox" name="lang" value="'+Obj.lang[langId].l_ID+'" checked/>'+Obj.lang[langId].l_name+'</dd>');
							}
							editor.html(Obj.cont_content);
						});
				//tab2:题目列表
				$.post("/cadmin/get_grouppro",{'id':id},
						function(data){
							var Obj=$.parseJSON(data);
							$("#prolist").html("");
							for(var key in Obj){
								$.ajax({
									type:'post',
									url:'/cadmin/get_detail',
									async:false,
									data:{'id':Obj[key].gp_pID,'type':'problem'},
									success:function (pdata){
										var problem=$.parseJSON(pdata);
										var html='<li id="gp'+Obj[key].gp_ID+'"><span style="width:10%;">'+Obj[key].gp_pNum+'</span><span style="width:20%;">'+Obj[key].gp_pID+'</span><span style="width:40%;">'+problem.p_Title+'</span><a style="width:20%;"  onclick="delete_data(\'grouppro\',\''+Obj[key].gp_ID+'\');">删除</a></li>';
										$("#prolist").append(html);
									}});
							}
						});
				//tab3:提交管理
			break;
			default:
			break;
		}
	}
	//修改
	function modify(type){
		switch(type){
			case "adminpwd":
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
					$.post("/kmadmin/admin/modify",
							{'username':username,'oldpwd':oldpwd,'newpwd':newpwd,'modifytype':"adminpwd"},
							function(data){
								var Obj=$.parseJSON(data);
								if(Obj.result=="success"){
									alert(Obj.message);
									window.location.href="/kmadmin/admin/logout"; 
								}else{
									alert(Obj.message);
								}
							}
					);
				}
			break;
			case "user":
				var name=$("#editor_new_title").val();
				if(name=="") alert("请填写完整！");
				else{
					$.post("/cadmin/modify_data",
							{'id':$("#editor_new_id").val(),'type':'user','name':name},
							function(data){
								alert(data);
								location.reload();
							}
					);
				}
			break;
			case "contest":
				var langArray=getCheckBox("lang","语言",true);
				if(langArray!="empty"){
					if($("#editor_new_title").val()==""||editor.html()=="" || $("#start_time").val()=="" || $("#end_time").val()=="") alert("请填写完整！");
					else{
						$.post("/cadmin/modify_data",{
							'id':$("#editor_new_id").val(),
							'title':$("#editor_new_title").val(),
							'content':editor.html(),
							'type':'contest',
							'start_time':$("#start_time").val(),
							'end_time':$("#end_time").val(),
							'url':$("#url").val(),
							'lang':langArray
						},function(data){
							var msg_cn=(data=="success")?"修改成功":"修改失败,或没有修改";
							if(data=="urlnotunique"){
								alert("别名网址 不唯一");
								return false;
							}
							alert(msg_cn);
							if(data=="success")location.reload();
						});
					}
				}
			break;
			default:
			break;
		}
	}
	//删除
	function delete_data(type,id){
		if(confirm("确定删除？")){
			switch(type){
				case "problem":
						$.post("/cadmin/delete_data",
								{'id':id,'type':'problem'},
								function(data){
									alert(data);
									location.reload();
								}
						);
					
				break;
				case "user":
						$.post("/cadmin/delete_data",
								{'id':id,'type':'user'},
								function(data){
									alert(data);
									location.reload();
								}
						);
					
				break;
				case "contest":
						$.post("/cadmin/delete_data",
								{'id':id,'type':'contest'},
								function(data){
									alert(data);
									location.reload();
								}
						);
					
				break;
				case "grouppro":
						$.post("/cadmin/delete_data",
								{'id':id,'type':'grouppro'},
								function(data){
									alert(data);
									$("#gp"+id).remove();
								}
						);
					
				break;
				default:
				break;
			}
		}
	}
	function getCheckBox(name,name_cn,require){  //jquery获取复选框值  
		var value =[];  
		$('input[name="'+name+'"]:checked').each(function(){  
			value.push($(this).val());
		});
		if(require && value.length==0){
			alert('还没有选择'+name_cn+'!');
			return "empty";
		}else{
			return value;
		}
	} 
	