<div class="modify_main account-div">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="#" class="current">支付宝账户</a>
		</div>
	</div>
	<div class="titA" style="margin-left:20px;">支付宝收款账户</div>
	<form class="form-modify" action="/kmadmin/admin/modify" method="post" enctype="multipart/form-data">
		<div class="tips-error w230" style="margin-left: 160px; width: 200px;" id="errorInfo"></div>
		<div class="item">
			<span class="label" style="width:100px;">支付宝账号：</span>
			<input class="inp-txt width200" type="text" name="alipayaccount" id="alipayaccount" placeholder="支付宝账号" value="<?php echo $app->alipay_app;?>"/>
		</div>
		<div class="btn-center bor-top" style="width: 315px;">
			<a href="javascript:void(0)" class="btn120" onclick="save_account_config_info('alipay',<?php echo $app->id_app;?>)">保存</a>
		</div>
	</form>
	<form id="uploadAvatarForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
		<input onchange="return upload_avatar()" name="image" type="file" id="avatarfile" style="display:none;" accept="image/*">
	</form>
</div>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>