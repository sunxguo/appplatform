<div class="slider">
<h3>
	<a href="/" target="_blank" id="menu_portal">
		<span class="ico ico-sy"></span>
		<?php echo lang('cms_sider_home');?>
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
		<?php echo lang('cms_sider_app');?>
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
	<li><a href="/cms/index/publish?appid=<?php echo $info->id_app;?>" <?php echo isset($publish) && $publish?'class="current"':'';?>><?php echo lang('cms_sider_publishcontent');?></a></li>
	<li><a href="/cms/index/contents?appid=<?php echo $info->id_app;?>" <?php echo isset($contents) && $contents?'class="current"':'';?>><?php echo lang('cms_sider_selectcontent');?></a></li>
	<li><a href="/cms/index/form?appid=<?php echo $info->id_app;?>" <?php echo isset($form) && $form?'class="current"':'';?>><?php echo lang('cms_sider_formdata');?></a></li>
	<li><a href="/cms/index/orders?appid=<?php echo $info->id_app;?>" <?php echo isset($orders) && $orders?'class="current"':'';?>><?php echo lang('cms_sider_orders');?></a></li>
	<li><a href="/cms/index/users?appid=<?php echo $info->id_app;?>" <?php echo isset($users) && $users?'class="current"':'';?>><?php echo lang('cms_sider_users');?></a></li>
<!--
	<li><a href="/cms/index/accountconfig?appid=<?php echo $info->id_app;?>" <?php echo isset($accountconfig) && $accountconfig?'class="current"':'';?>><?php echo lang('cms_sider_accountconfig');?></a></li>
-->
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
<h3 <?php echo isset($message) && $message?'class="current"':'';?>>
	<a href="/cms/index/message?type=2" id="menu_portal">
		<span class="ico ico-tsxx"></span>
		<?php echo lang('cms_sider_pushmsg');?>
	</a>
</h3>
<h3 <?php echo isset($log) && $log?'class="current"':'';?>>
	<a href="/cms/index/checklog" id="menu_accountInfo">
		<span class="ico ico-fkgl"></span>
		<?php echo lang('cms_sider_log');?>
	</a>
</h3>
<h3 <?php echo isset($account) && $account?'class="current"':'';?>>
	<a href="/cms/index/account" id="menu_accountInfo">
		<span class="ico ico-zhxx"></span>
		<?php echo lang('cms_sider_account');?>
	</a>
</h3>
</div>