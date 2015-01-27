<div class="app-warp">
	<div class="h2-wrap">
		<h2><a class="en-tab e-n-tab-l goto" href="/cms/index/editapp?appid=<?php echo $app->id_app?>">APP编辑</a><span class="en-tab e-n-tab-r active">APP导航设计</span></h2>
	</div>
    <div class="app-con">
		<div id="left" class="app-side">
			<div class="app-side-bd">
				<div class="p-b-wrap">
					<div id="showimgdiv" class="phone-bd">
						<div class="phone-bd" id="preview">
							<img id="phoneBg" src="/assets/images/cms/bk.png" width="245" height="430">
							<ul class="left-nav">
								<?php $count=0;foreach($navs as $item):?>
								<?php if($count<8):?>
								<li>
									<img src="<?php echo $item->icon_nav;?>"/>
									<span><?php echo $item->name_nav;?></span>
								</li>
								<?php endif;?>
								<?php $count++; endforeach;?>
							</ul>
						</div>
					</div>
					<!--自定义 左侧 start-->
					<div id="customcontent">
					</div>
					<!--自定义 左侧 end-->
				</div>
			</div>
		</div>
		<div class="app-edit-nav-div">
			<div class="clearfix">
				<a class="addModleBtn" href="javascript:add_nav()">添加导航</a>
			</div>
			<div>通过导航后面的编辑按钮<img src="/assets/images/cms/edit.png">可以编辑该导航详细信息</div>
			<ul>
				<?php $array_num=sizeof($navs); 
				foreach($navs as $key=>$item):?>
				<li>
					<img src="<?php echo $item->icon_nav;?>"/>
					<span><?php echo $item->name_nav;?></span>
					<div class="order">
						<span class="order-num">No：<?php echo $item->order_nav;?></span>
						<?php if($key!=0):?>
						<a href="javascript:order_nav('<?php echo $item->app_id_nav;?>','plus','<?php echo $item->id_nav;?>','<?php echo $item->order_nav;?>')" class="upBtn" title="上移"></a>
						<?php endif;?>
						<?php if($key!=($array_num-1)):?>
						<a href="javascript:order_nav('<?php echo $item->app_id_nav;?>','sub','<?php echo $item->id_nav;?>','<?php echo $item->order_nav;?>')" class="downBtn" title="下移"></a>
						<?php endif;?>
						<a href="javascript:edit_nav('<?php echo $item->name_nav;?>','<?php echo $item->id_nav;?>','<?php echo $item->type_nav;?>')" class="editBtn" title="编辑"></a>
						<a href="javascript:del_nav('<?php echo $item->app_id_nav;?>','<?php echo $item->id_nav;?>','<?php echo $item->order_nav;?>','<?php echo $array_num;?>')" class="deleteBtn" title="删除"></a>
					</div>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
		<div class="dialog pic-edit add-new-nav" id="addNewFuncDialog">
			<a title="关闭" class="close" href="javascript:void()" onclick="closeAddFuncDialog()">关闭</a>
			<div class="dialog-hd">添加新导航</div>
			<div class="custom-pic">
				<div>
					<span class="label">名称：</span>
					<input id="new_nav_name" class="inp-text" type="text" value=""/>
				</div>
				<div class="icon">
					<span class="label">图标：</span>
					<ul class="clearfix">
						<li class="icon-click icon-active"><img src="/assets/images/mobile/2.png"/></li>
						<li class="icon-click"><img src="/assets/images/mobile/3.png"/></li>
						<li class="icon-click"><img src="/assets/images/mobile/5.png"/></li>
						<li class="icon-click"><img src="/assets/images/mobile/8.png"/></li>
						<li class="icon-click"><img src="/assets/images/mobile/9.png"/></li>
						<li class="icon-click"><img src="/assets/images/mobile/11.png"/></li>
						<li class="icon-click"><img src="/assets/images/mobile/12.png"/></li>
						<li class="icon-click"><img src="/assets/images/mobile/14.png"/></li>
						<li class="icon-click"><img src="/assets/images/mobile/24.png"/></li>
						<li class="icon-click" id="preimg" style="display:none;"><img src=""/></li>
						<li class="add-new-bt" onclick="addNavIconImg()">
							<img src="/assets/images/cms/defAdd.png" width="60" height="60">
						</li>
						<form id="uploadImgForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
							<input onchange="return upload_icon_img('#uploadImgForm')" name="image" type="file" id="file" style="display:none;" accept="image/*">
						</form>
						<input id="new_order_num" type="hidden" value="<?php echo (sizeof($navs)+1);?>"/>
					</ul>
				</div>
				<div class="custom-pic-top">
					<input id="save_bt" class="save" type="button" value="添加" onclick="add_new_nav('<?php echo $app->id_app?>')">
				</div>
			</div>
		</div>
		<!--导航编辑 对话框 start-->
		<div class="dialog" id="edit_nav_dialog" style="width: 700px;">
			<input id="navid_edit" type="hidden">
			<a title="关闭" class="close" href="javascript:closeEditNavDialog()">关闭</a>
			<div class="dialog-hd">编辑导航<<span id="edit_nav_name"></span>></div>
			<div id="waitUpload" style="margin-top:20px;">正在加载...  <img src="/assets/images/cms/loading.gif" ></div>
			<div id="edit_nav_main">
				<div>
					<span class="label">>名称：</span>
					<input type="text" id="edit_name_input">
				</div>
				<div class="category">
					<span class="label">>点击后内容：</span>
					<div class="cat" id="category">
						<input id="cat1" onclick="cat_click(this,1);" type="button" value="固定页面" class="active">
						<textarea id="cat1_content" style="display:none;"></textarea>
						<input id="cat2" onclick="cat_click(this,2);" type="button" value="固定二级页面">
						<input id="cat3" onclick="cat_click(this,3);" type="button" value="文章列表">
						<input id="cat4" onclick="cat_click(this,4);" type="button" value="表单页">
						<input id="cat5" onclick="cat_click(this,5);" type="button" value="商城">
						<input id="cat6" onclick="cat_click(this,6);" type="button" value="链接">
						<input id="catval" type="hidden" value="0">
					</div>
				</div>
				<div id="subCategory" class="subCategory">
					<span class="label">>二级列表：</span>
					<input id="sub_nav_num" type="hidden" value="0">
					<div style="margin-bottom:10px;">
						<input id="new_input" type="text" placeholder="新二级列表项">
						<input onclick="add_new_sub()" type="button" value="添加二级列表项" class="add-bt">
					</div>
					<ul id="sub_nav_list" class="clearfix"></ul>
					<div id="update_subnavname" style="margin-top:8px;">
						<input id="update_subname_input" type="text">
						<img onclick="update_subname()" src="/assets/images/cms/update.png" width="21" height="21" title="修改" class="update-nav-bt">
						<img onclick="delete_subnav()" src="/assets/images/cms/del.png" width="20" height="20" title="删除" class="update-nav-bt">
					</div>
				</div>
				<div id="content" style="display:none;">
					<span class="label">>对应内容：</span>
					<input id="current_id" value="cat1_content" type="hidden">
					<textarea name="description"></textarea>
				</div>
				<div id="essay" style="display:none;">
					<span>内容在“应用管理->应用->内容管理”增加</span>
				</div>
				<div id="mall" style="display:none;">
					<input type="radio" value="0" name="hascat" checked="true">无分类
					<input type="radio" value="1" name="hascat">有分类
					<div>
						<input type="text" id="new_cat">
						<input type="button" value="添加">
					</div>
				</div>
				<div id="form" class="nav-form" style="display:none;">
					<span class="label">>表单项：</span>
					<input id="form_item_num" type="hidden" value="0">
					<div style="margin-bottom:10px;">
						<input id="new_formitem_input" type="text" placeholder="新表单项名称">
						<select id="form_item_size_add">
							<option value="short">短文本</option>
							<option value="long">长文本</option>
						</select>
						<input onclick="add_new_formitem()" type="button" value="添加表单项" class="add-bt">
					</div>
					<ul id="form_item_list" class="clearfix"></ul>
					<div id="update_form_item" style="margin-top:8px;">
						<input id="update_formitemname_input" type="text">
						<select id="form_item_size_update">
							<option value="short">短文本</option>
							<option value="long">长文本</option>
						</select>
						<img onclick="update_formitem()" src="/assets/images/cms/update.png" width="21" height="21" title="修改" class="update-nav-bt">
						<img onclick="delete_formitem()" src="/assets/images/cms/del.png" width="20" height="20" title="删除" class="update-nav-bt">
					</div>
				</div>
				<div id="link" style="display:none;">
					<span class="label">>链接地址：</span>
					<input type="text" id="edit_link_input" value="http://">
				</div>
				<div class="bt-div">
					<input id="save_edit_bt" class="save" type="button" value="保存" onclick="savenav();">
				</div>
			</div>
		</div>
		<!--导航编辑 对话框 end-->
	</div>
</div>

<div id="bkDiv" class="bk-div"></div>
<link rel="stylesheet" href="/assets/kindEditor/themes/default/default.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/editnav.js" type="text/javascript"></script>