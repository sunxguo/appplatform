<link rel="stylesheet" href="/assets/css/admin.css" type="text/css"/>
<div class="wrapper content">
	<div class="login_main" style="margin-top:0px;padding-top:100px;">
		<div class="titL"><?php echo lang('cms_login_login');?></div>
		<form class="form-login" action="/cmsmini/index/login_handler" method="post" enctype="multipart/form-data">
			<input type="text" name="username" placeholder="<?php echo lang('cms_login_username');?>"/><br/>
			<i class="icon icon-user"></i>
			<input type="password" name="pwd" placeholder="<?php echo lang('cms_login_password');?>"/><br/>
			<i class="icon icon-lock"></i>
			<input type="submit" value="<?php echo lang('cms_login_login');?>"  class="btn btn-blue form-control"/>
		</form>
		<a href="/cms/index/register" class="fr" target="_self"><?php echo lang('cms_login_registertip');?></a>
	</div>
</div>