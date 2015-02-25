<div class="app-warp">
	<div class="h2-wrap">
		<h2>
			<a class="en-tab e-n-tab-l goto" href="/cms/index/editapp?appid=<?php echo $app->id_app?>"><?php echo lang('cms_editapp_editapp');?></a>
			<span class="en-tab e-n-tab-c active"><?php echo lang('cms_editapp_designappnav');?></span>
			<a class="en-tab e-n-tab-r goto" href="/cms/index/preview?appid=<?php echo $app->id_app?>"><?php echo lang('cms_editapp_preview');?></a>
		</h2>
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
				<a class="addModleBtn" href="javascript:add_nav()"><?php echo lang('cms_editnav_addnav');?></a>
			</div>
			<div><?php echo lang('cms_editnav_navtip');?></div>
			<ul>
				<?php $array_num=sizeof($navs); 
				foreach($navs as $key=>$item):?>
				<li>
					<img src="<?php echo $item->icon_nav;?>"/>
					<span><?php echo $item->name_nav;?></span>
					<div class="order">
						<span class="order-num">No：<?php echo $item->order_nav;?></span>
						<?php if($key!=0):?>
						<a href="javascript:order_nav('<?php echo $item->app_id_nav;?>','plus','<?php echo $item->id_nav;?>','<?php echo $item->order_nav;?>')" class="upBtn" title="<?php echo lang('cms_editnav_moveup');?>"></a>
						<?php endif;?>
						<?php if($key!=($array_num-1)):?>
						<a href="javascript:order_nav('<?php echo $item->app_id_nav;?>','sub','<?php echo $item->id_nav;?>','<?php echo $item->order_nav;?>')" class="downBtn" title="<?php echo lang('cms_editnav_movedown');?>"></a>
						<?php endif;?>
						<a href="javascript:edit_nav('<?php echo $item->name_nav;?>','<?php echo $item->id_nav;?>','<?php echo $item->type_nav;?>')" class="editBtn" title="<?php echo lang('cms_editnav_edit');?>"></a>
						<a href="javascript:del_nav('<?php echo $item->app_id_nav;?>','<?php echo $item->id_nav;?>','<?php echo $item->order_nav;?>','<?php echo $array_num;?>')" class="deleteBtn" title="<?php echo lang('cms_editnav_delete');?>"></a>
					</div>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
		<div class="dialog pic-edit add-new-nav" id="addNewFuncDialog">
			<a title="<?php echo lang('cms_editapp_close');?>" class="close" href="javascript:void()" onclick="closeAddFuncDialog()"><?php echo lang('cms_editapp_close');?></a>
			<div class="dialog-hd"><?php echo lang('cms_editnav_addnewnav');?></div>
			<div class="custom-pic">
				<div>
					<span class="label"><?php echo lang('cms_editnav_navname');?>：</span>
					<input id="new_nav_name" class="inp-text" type="text" value=""/>
				</div>
				<div class="icon">
					<span class="label"><?php echo lang('cms_editnav_navicon');?>：</span>
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
					<input id="save_bt" class="save" type="button" value="<?php echo lang('cms_editapp_add');?>" onclick="add_new_nav('<?php echo $app->id_app?>')">
				</div>
			</div>
		</div>
		<!--导航编辑 对话框 start-->
		<div class="dialog" id="edit_nav_dialog" style="width: 700px;">
			<input id="navid_edit" type="hidden">
			<a title="<?php echo lang('cms_editapp_close');?>" class="close" href="javascript:closeEditNavDialog()"><?php echo lang('cms_editapp_close');?></a>
			<div class="dialog-hd"><?php echo lang('cms_editnav_editnav');?><<span id="edit_nav_name"></span>></div>
			<div id="waitUpload" style="margin-top:20px;"><?php echo lang('cms_editnav_loading');?><img src="/assets/images/cms/loading.gif" ></div>
			<div id="edit_nav_main">
				<div>
					<span class="label">><?php echo lang('cms_editnav_navname');?>：</span>
					<input type="text" id="edit_name_input">
				</div>
				<div class="category">
					<span class="label">><?php echo lang('cms_editnav_afterclick');?>：</span>
					<div class="cat" id="category">
						<input id="cat1" onclick="cat_click(this,1);" type="button" value="<?php echo lang('cms_editnav_fixedpage');?>" class="active">
						<textarea id="cat1_content" style="display:none;"></textarea>
						<input id="cat2" onclick="cat_click(this,2);" type="button" value="<?php echo lang('cms_editnav_fixedsubpage');?>">
						<input id="cat3" onclick="cat_click(this,3);" type="button" value="<?php echo lang('cms_editnav_essaylist');?>">
						<input id="cat4" onclick="cat_click(this,4);" type="button" value="<?php echo lang('cms_editnav_form');?>">
						<input id="cat5" onclick="cat_click(this,5);" type="button" value="<?php echo lang('cms_editnav_mall');?>">
						<input id="cat6" onclick="cat_click(this,6);" type="button" value="<?php echo lang('cms_editnav_link');?>">
						<input id="catval" type="hidden" value="0">
					</div>
				</div>
				<div id="subCategory" class="subCategory">
					<span class="label">><?php echo lang('cms_editnav_subnavlist');?>：</span>
					<input id="sub_nav_num" type="hidden" value="0">
					<div style="margin-bottom:10px;">
						<input id="new_input" type="text" placeholder="<?php echo lang('cms_editnav_newsublist');?>">
						<input onclick="add_new_sub()" type="button" value="<?php echo lang('cms_editnav_addnewsub');?>" class="add-bt">
					</div>
					<ul id="sub_nav_list" class="clearfix"></ul>
					<div id="update_subnavname" style="margin-top:8px;">
						<input id="update_subname_input" type="text">
						<img onclick="update_subname()" src="/assets/images/cms/update.png" width="21" height="21" title="<?php echo lang('cms_editnav_modify');?>" class="update-nav-bt">
						<img onclick="delete_subnav()" src="/assets/images/cms/del.png" width="20" height="20" title="<?php echo lang('cms_editnav_delete');?>" class="update-nav-bt">
					</div>
				</div>
				<div id="content" style="display:none;">
					<span class="label">><?php echo lang('cms_editnav_correspond');?>：</span>
					<input id="current_id" value="cat1_content" type="hidden">
					<textarea name="description"></textarea>
				</div>
				<div id="essay" style="display:none;">
					<span><?php echo lang('cms_editnav_addcontenttip');?></span>
				</div>
				<div id="mall" style="display:none;">
					<input type="radio" value="0" name="hascat" checked="true" onclick="select_has_cat('no')"><?php echo lang('cms_editnav_nocat');?>
					<input id="hascatradio" type="radio" value="1" name="hascat" onclick="select_has_cat('has')"><?php echo lang('cms_editnav_hascat');?>
					<input id="mall_cat_num" type="hidden" value="0">
					<div id="mall_cat_info">
						<input type="text" id="new_cat" class="inp-txt">
						<input type="button" value="<?php echo lang('cms_editapp_add');?>" onclick="add_new_mallcat()" class="add-bt">
						<ul id="mallcat_list" class="clearfix"></ul>
						<div id="update_mallcat" style="margin-top:8px;display:none;">
							<input id="update_mallcatname_input" type="text">
							<img onclick="update_mallcat()" src="/assets/images/cms/update.png" width="21" height="21" title="<?php echo lang('cms_editnav_modify');?>" class="update-nav-bt">
							<img onclick="delete_mallcat()" src="/assets/images/cms/del.png" width="20" height="20" title="<?php echo lang('cms_editnav_delete');?>" class="update-nav-bt">
						</div>
					</div>
				</div>
				<div id="form" class="nav-form" style="display:none;">
					<span class="label">><?php echo lang('cms_editnav_formitem');?>：</span>
					<input id="form_item_num" type="hidden" value="0">
					<div style="margin-bottom:10px;">
						<input id="new_formitem_input" type="text" placeholder="<?php echo lang('cms_editnav_newformitemname');?>">
						<select id="form_item_size_add">
							<option value="short"><?php echo lang('cms_editnav_shorttext');?></option>
							<option value="long"><?php echo lang('cms_editnav_longtext');?></option>
						</select>
						<input onclick="add_new_formitem()" type="button" value="<?php echo lang('cms_editnav_addformitem');?>" class="add-bt">
					</div>
					<ul id="form_item_list" class="clearfix"></ul>
					<div id="update_form_item" style="margin-top:8px;">
						<input id="update_formitemname_input" type="text">
						<select id="form_item_size_update">
							<option value="short"><?php echo lang('cms_editnav_shorttext');?></option>
							<option value="long"><?php echo lang('cms_editnav_longtext');?></option>
						</select>
						<img onclick="update_formitem()" src="/assets/images/cms/update.png" width="21" height="21" title="<?php echo lang('cms_editnav_modify');?>" class="update-nav-bt">
						<img onclick="delete_formitem()" src="/assets/images/cms/del.png" width="20" height="20" title="<?php echo lang('cms_editnav_delete');?>" class="update-nav-bt">
					</div>
				</div>
				<div id="link" style="display:none;">
					<span class="label">><?php echo lang('cms_editnav_linkurl');?>：</span>
					<input type="text" id="edit_link_input" value="http://">
				</div>
				<div class="bt-div">
					<input id="save_edit_bt" class="save" type="button" value="<?php echo lang('cms_editapp_save');?>" onclick="savenav();">
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