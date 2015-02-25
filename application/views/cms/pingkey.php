<div class="modify_main account-div">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="/cms/index/account"><?php echo lang('cms_account_basicinformation');?></a>
			<a href="/cms/index/pwd"><?php echo lang('cms_account_modifypwd');?></a>
			<a href="/cms/index/correlation"><?php echo lang('cms_account_setthesubaccount');?></a>
			<a class="current"><?php echo lang('cms_account_pingkey');?></a>
		</div>
	</div>
	<div class="titA" style="margin-left:20px;"><?php echo lang('cms_account_pingkey');?></div>
	<form class="form-modify" action="/kmadmin/admin/modify" method="post" enctype="multipart/form-data">
		<div class="tips-error w230" style="margin-left: 160px; width: 200px;" id="errorInfo"></div>
		<div class="item">
			<span class="label" style="width:100px;"><?php echo lang('cms_account_pingkey');?>：</span>
			<input class="inp-txt width200" type="text" name="pingkey" id="pingkey" placeholder="<?php echo lang('cms_account_setkeyinping');?>" value="<?php  echo $merchant->pingkey_merchant;?>"/>
		</div>
		<div class="btn-center bor-top" style="width: 315px;">
			<a href="javascript:void(0)" class="btn120" onclick="save_account_config_pingkey()"><?php echo lang('cms_content_save');?></a>
		</div>
	</form>
	<form id="uploadAvatarForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
		<input onchange="return upload_avatar()" name="image" type="file" id="avatarfile" style="display:none;" accept="image/*">
	</form>
</div>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>