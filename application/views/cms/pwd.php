<div class="modify_main account-div">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="/cms/index/account"><?php echo lang('cms_account_basicinformation');?></a>
			<a href="#" class="current"><?php echo lang('cms_account_modifypwd');?></a>
			<a href="/cms/index/correlation"><?php echo lang('cms_account_setthesubaccount');?></a>
			<a href="/cms/index/pingkey"><?php echo lang('cms_account_pingkey');?></a>
		</div>
	</div>
	<div class="titA" style="margin-left:20px;"><?php echo lang('cms_account_modifypwd');?></div>
	<form class="form-modify" action="/kmadmin/admin/modify" method="post" enctype="multipart/form-data">
		<div class="tips-error w230" style="margin-left: 160px; width: 200px;" id="errorInfo"></div>
		<div class="item">
			<input class="inp-txt width200" type="text" name="username" id="username" placeholder="<?php echo lang('cms_account_username');?>" value="<?php echo $_SESSION['username'];?>"/>
			<span style="color:red;">*</span>
		</div>
		<div class="item">
			<input class="inp-txt width200" type="password" name="oldpwd" id="oldpwd" placeholder="<?php echo lang('cms_account_oldpwd');?>"/>
			<span style="color:red;">*</span>
		</div>
		<div class="item">
			<input class="inp-txt width200" type="password" name="newpwd" id="newpwd" placeholder="<?php echo lang('cms_account_newpwd');?>"/>
			<span style="color:red;">*</span>
		</div>
		<div class="item">
			<input class="inp-txt width200" type="password" name="renewpwd" id="renewpwd" placeholder="<?php echo lang('cms_account_confirmpwd');?>"/>
			<span style="color:red;">*</span>
		</div>
		<div class="btn-center bor-top" style="width:212px;">
			<a href="javascript:modify_merchant_pwd()" class="btn120"><?php echo lang('cms_account_save');?></a>
		</div>
	</form>
</div>