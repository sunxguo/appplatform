<div class="slider">
<h3>
	<a href="/cms/index" id="menu_portal">
		<span class="ico ico-sy"></span>
		主页
	</a>
</h3>
<!--
<h3>
	<a href="/cms/index/app" id="menu_promotionManage">
		<span class="ico ico-tggl"></span>
		推广管理
	</a>
</h3>
-->
<h3 <?php echo isset($appManager) && $appManager?'class="current"':'';?>>
	<a href="/cms/index/app" id="menu_manageApp">
		<span class="ico ico-yygl"></span>
		应用管理
	</a>
</h3>
<?php if(isset($app) && $app):?>
<h3 class="current">
	<a href="javascript:void()" title="<?php echo $info->name_app;?>">
		<span class="ico" style="background: none;">
			<img src="<?php echo $info->icon_app;?>" height="22" width="25" style="vertical-align:top;">
		</span>
		<?php echo $info->name_app;?>
		<em></em>
	</a>
</h3>
<ul style="display: block;">
	<li><a href="/cms/index/publish?appid=<?php echo $info->id_app;?>" <?php echo isset($publish) && $publish?'class="current"':'';?>>内容发布</a></li>
	<li><a href="/cms/index/contents?appid=<?php echo $info->id_app;?>" <?php echo isset($contents) && $contents?'class="current"':'';?>>内容查询</a></li>
	<li><a href="/cms/index/form?appid=<?php echo $info->id_app;?>" <?php echo isset($form) && $form?'class="current"':'';?>>表单信息</a></li>
	<li><a href="/cms/index/users?appid=<?php echo $info->id_app;?>" <?php echo isset($users) && $users?'class="current"':'';?>>用户管理</a></li>
</ul>
<?php endif;?>
<!--
<h3>
	<a href="" id="menu_portal">
		<span class="ico ico-gggl"></span>
		广告管理
	</a>
</h3>
-->
<h3>
	<a href="" id="menu_portal">
		<span class="ico ico-tsxx"></span>
		推送消息
	</a>
</h3>
<h3 <?php echo isset($log) && $log?'class="current"':'';?>>
	<a href="/cms/index/checklog" id="menu_accountInfo">
		<span class="ico ico-fkgl"></span>
		操作日志
	</a>
</h3>
<h3 <?php echo isset($account) && $account?'class="current"':'';?>>
	<a href="/cms/index/account" id="menu_accountInfo">
		<span class="ico ico-zhxx"></span>
		账户信息
	</a>
</h3>
</div>