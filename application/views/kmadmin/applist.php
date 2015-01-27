<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectapp('<?php echo $select_link;?>')" class="btn80">搜索</a>
		</div>
		<div style="float: right;">
			<span class="font12">状态：</span>
			<select id="state" onchange="selectapp('<?php echo $select_link;?>')" class="select w100">
                <option value="-1">全部</option>
				<?php foreach($state as $key=>$s):?>
                <option value="<?php echo $key;?>" <?php echo isset($_GET["state"]) && $_GET["state"]==$key?'selected = "selected"':'';?>>
					<?php echo $s;?>
				</option>
				<?php endforeach;?>
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">分类：</span>
			<select id="category" onchange="selectapp('<?php echo $select_link;?>')" class="select w100">
                <option value="0">全部</option>
				<?php foreach($category as $key=>$cat):?>
                <option value="<?php echo $key;?>" <?php echo isset($_GET["cat"]) && $_GET["cat"]==$key?'selected = "selected"':'';?>><?php echo $cat;?></option>
				<?php endforeach;?>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:80px;">图标</th>
				<th style="width:150px;">名称</th>
				<th style="width:130px;">商户</th>
				<th style="width:80px;">分类</th>
				<th style="width:150px;">最后更新时间</th>
				<th style="width:100px;">下载次数</th>
				<th style="width:60px;">状态</th>
				<th style="width:210px;">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($app as $a):?>
			<tr>
				<td><img class="appicon" src="<?php echo $a->icon_app;?>"/></td>
				<td><a href="?appid=<?php echo $a->id_app;?>"><?php echo $a->name_app;?></a></td>
				<td><?php echo $a->username_merchant;?></td>
				<td><?php echo $category[$a->cat_app];?></td>
				<td><?php echo $a->update_time_app;?></td>
				<td><?php echo $a->download_time_app;?></td>
				<td><?php echo $state[$a->state_app];?></td>
				<td>
					<?php if($a->state_app==4):?>
					<a class="del-essay" href="javascript:check_app('<?php echo $a->id_app;?>');">审核通过</a>
					<a class="del-essay" href="javascript:check_app('<?php echo $a->id_app;?>');">审核不通过</a>
					<?php elseif($a->state_app==5):?>
					<a class="del-essay" href="javascript:check_app('<?php echo $a->id_app;?>');">下架</a>
					<?php elseif($a->state_app==6):?>
					<a class="del-essay" href="javascript:check_app('<?php echo $a->id_app;?>');">审核通过</a>
					<?php endif;?>
					<a class="del-essay" href="javascript:app_per('<?php echo $a->id_app;?>');">权限</a>
					<a class="del-essay" href="javascript:app_union_click('<?php echo $a->id_app;?>');">添加到</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<div class="page-div">
		<span class="">总记录数<?php echo $amount;?>条</span>
		<span onclick="location.href='<?php echo $first_link=="no"?"#":$first_link;?>'" class="page-bt first <?php echo $first_link=="no"?"last-disabled":"";?>" title="第一页">第一页</span>
		<span onclick="location.href='<?php echo $prev_link=="no"?"#":$prev_link;?>'" class="page-bt prev <?php echo $prev_link=="no"?"prev-disabled":"";?>" title="上一页">上一页</span>
		<span class="showpagenum"><?php echo $page;?>/<?php echo $page_amount;?></span>
		<span onclick="location.href='<?php echo $next_link=="no"?"#":$next_link;?>'" class="page-bt next <?php echo $next_link=="no"?"next-disabled":"";?>" title="下一页">下一页</span>
		<span onclick="location.href='<?php echo $last_link=="no"?"#":$last_link;?>'" class="page-bt last <?php echo $last_link=="no"?"last-disabled":"";?>" title="最后一页">最后一页</span>
		<span class="jump">
			到第
			<input id="page_num" type="text" class="jumpinput">
			页
		</span>
		<button class="jumpbt" onclick="jump_page('<?php echo $jump_link;?>')">跳转</button>
	</div>
</div>

<div class="dialog pic-edit add-new-nav" id="appPerDialog">
	<a title="关闭" class="close" href="javascript:void()" onclick="closeAppPerDialog()">关闭</a>
	<div class="dialog-hd">【<span id="per_appname"></span>】权限设置</div>
	<div class="custom-pic">
		<ul class="permission">
			<li><input type="checkbox" id="per_essay">文章列表</li>
			<li><input type="checkbox" id="per_mall">商城</li>
			<li><input type="checkbox" id="per_form">表单</li>
			<li><input type="checkbox" id="per_user">可以有用户</li>
		</ul>
	</div>
	<div><a href="javascript:per_save()" class="save">保存</a></div>
</div>
<div class="dialog pic-edit add-new-nav" id="appUnionDialog">
	<a title="关闭" class="close" href="javascript:void()" onclick="closeUnionDialog()">关闭</a>
	<div class="dialog-hd">添加到专题</div>
	<div class="custom-pic">
		<ul class="permission" id="unionlist"></ul>
	</div>
	<div><a href="javascript:save_app_union()" class="save">保存</a></div>
</div>
<div id="bkDiv" class="bk-div"></div>
<script src="/assets/js/kmadmin.js" type="text/javascript"></script>