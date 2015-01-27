<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv" style="width:100%;">
			<div onclick="location.href='/kmadmin/admin/market_home'" class="left" style="width:120px;">
				滚动图
			</div>
			<div onclick="location.href='/kmadmin/admin/market_ad'" class="center" style="width:120px;">
				滚动图右侧
			</div>
			<div onclick="location.href='/kmadmin/admin/market_necessity'" class="center" style="width:120px;">
				装机必备
			</div>
			<div onclick="location.href='/kmadmin/admin/market_selection'" class="center" style="width:120px;">
				精品应用
			</div>
			<div onclick="location.href='/kmadmin/admin/market_softdown_life'" class="center" style="width:80px;">
				生活
			</div>
			<div onclick="location.href='/kmadmin/admin/market_softdown_news'" class="center active" style="width:80px;">
				新闻
			</div>
			<div onclick="location.href='/kmadmin/admin/market_softdown_joy'" class="center" style="width:80px;">
				娱乐
			</div>
			<div onclick="location.href='/kmadmin/admin/market_softdown_shopping'" class="center" style="width:80px;">
				购物
			</div>
			<div onclick="location.href='/kmadmin/admin/market_select_union'" class="right" style="width:120px;">
				精选专题
			</div>
			<div class="clear">
			</div>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:80px;">图标</th>
				<th style="width:200px;">名称</th>
				<th style="width:160px;">商户</th>
				<th style="width:80px;">分类</th>
				<th style="width:150px;">最后更新时间</th>
				<th style="width:100px;">下载次数</th>
				<th style="width:60px;">状态</th>
				<th style="width:100px;">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($selection->app as $a):?>
			<tr>
				<td><img class="appicon" src="<?php echo $a->icon_app;?>"/></td>
				<td><a href="?appid=<?php echo $a->id_app;?>"><?php echo $a->name_app;?></a></td>
				<td><?php echo $a->merchant->username_merchant;?></td>
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
					<a class="del-essay" href="javascript:app_union('<?php echo $a->id_app;?>','<?php echo $selection->id_marketunion;?>','drop');">移除</a>
					<a class="del-essay" href="javascript:app_per('<?php echo $a->id_app;?>');">权限</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>

<div class="dialog pic-edit add-new-nav" id="appPerDialog">
	<a title="关闭" class="close" href="javascript:void()" onclick="closeAppPerDialog()">关闭</a>
	<div class="dialog-hd"><<span id="per_appname"></span>>权限设置</div>
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
<div id="bkDiv" class="bk-div"></div>
<script src="/assets/js/kmadmin.js" type="text/javascript"></script>