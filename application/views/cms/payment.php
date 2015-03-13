<div class="modify_main account-div">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="/cms/index/account"><?php echo lang('cms_account_basicinformation');?></a>
			<a href="/cms/index/pwd"><?php echo lang('cms_account_modifypwd');?></a>
			<a href="/cms/index/correlation"><?php echo lang('cms_account_setthesubaccount');?></a>
			<a href="/cms/index/pingkey"><?php echo lang('cms_account_ping');?></a>
			<a class="current"><?php echo lang('cms_account_payment');?></a>
		</div>
	</div>
	<div class="titA" style="margin-left:20px;"><?php echo lang('cms_account_pingsetting');?></div>
	
	<form id="uploadAvatarForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
		<input onchange="return upload_avatar()" name="image" type="file" id="avatarfile" style="display:none;" accept="image/*">
	</form>
</div>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>