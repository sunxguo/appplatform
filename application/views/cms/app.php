<div class="padding10 app-base-info">
	<?php if(!isset($app->name_app)):?>
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<a href="/cms/index/createapp" class="btn creatAPP" target="_blank"><?php echo lang('cms_app_createmyapp');?></a>
		<div class="clear">
		</div>
	</div>
	<?php else:?>
	<div class="main-box card app-card">
		<div class="box-content box-header">
			<img class="app-logo show-logo" src="<?php echo $app->icon_app;?>">
			<div class="app-info">
			  <h1><a href="/market/app?appid=<?php echo $app->id_app;?>" target="_blank"><?php echo $app->name_app;?></a></h1>
			  <p><?php echo lang('cms_app_updatetime');?>：<?php echo date("Y-m-d",strtotime($app->update_time_app));?></p>
			  <p>
				<span><?php echo lang('cms_app_appstate');?>：</span>
				<a href="" target="_blank" style="color: #5F7392;text-decoration: underline;">
				<?php echo $app->state_app_cn;?>(<?php echo lang('cms_app_clicktoview');?>)</a></p>
			  <p><?php echo lang('cms_app_downloadtime');?>：<?php echo $app->download_time_app;?><?php echo lang('cms_app_downloadtimeunit');?></p>
			</div>
			<div class="app-operation">
				<a href="/cms/index/editapp?appid=<?php echo $app->id_app;?>" class="btn60" target="_blank" style="margin-right: 20px;font-size:12px;"><?php echo lang('cms_button_design');?></a>
				<a href="/cms/index/publish?appid=<?php echo $app->id_app;?>" class="btn60 recreate" style="font-size:12px;"><?php echo lang('cms_button_content');?></a>
				<a href="/cms/index/publishapp?appid=<?php echo $app->id_app;?>" class="btn80s publish" style="margin-right: 20px;font-size:12px;"><?php echo lang('cms_button_release');?></a>
			</div>
		</div>
		<div class="box-content box-middle download-app">
			<h1><?php echo lang('cms_app_appdownload');?></h1>
			<figure class="align">
			  <img src="<?php echo $app->two_code_app;?>">
			  <figcaption><?php echo lang('cms_app_scandownloaddirectly');?></figcaption>
			</figure>
			<ul>
				<li class="android-download">
					<a href="<?php echo $app->android_link_app;?>"><?php echo lang('cms_app_downloadapk');?></a>
				</li>
				<li class="ios-download">
					<a href="<?php echo $app->ios_link_app;?>"><?php echo lang('cms_app_downloadipa');?></a>
				</li>
			</ul>
		</div>
		<div class="box-content box-footer download-url">
			<h1><?php echo lang('cms_app_downloadlink2');?></h1>
			<p class="align"><a id="copy-url" href="<?php echo WEBSITE_URL."/market/download?appid=".$app->id_app;?>"><?php echo WEBSITE_URL."/market/download?appid=".$app->id_app;?></a><?php echo lang('cms_app_accessdownloaddirectly');?></p>
		</div>
	</div>
	<?php endif;?>
</div>
<script src="/assets/js/manage.js" type="text/javascript"></script>