<div class="modify_main">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="/kmadmin/admin/account">密码修改</a>
			<a href="#" class="current">账号配置</a>
		</div>
	</div>
	<div class="titA" style="margin-left:20px;">Apple开发者账号</div>
	<form class="form-modify" action="/kmadmin/admin/modify" method="post" enctype="multipart/form-data">
		<div class="tips-error w230" style="margin-left: 160px; width: 200px;" id="errorInfo"></div>
		<div class="item" style="padding-left:0px;">
			<span class="label" style="width:100px;">Apple开发者账号：</span>
			<input class="inp-txt width200" type="text" name="appleaccount" id="appleaccount" placeholder="Apple开发者账号" value="<?php echo $appleDeveloperAccount->value_websiteconfig;?>"/>
		</div>
		<div class="item" style="padding-left:0px;">
			<span class="label" style="width:100px;">Apple开发者密码：</span>
			<input class="inp-txt width200" type="password" name="applepassword" id="applepassword" value="<?php echo $appleDeveloperPassword->value_websiteconfig;?>"/>
		</div>
		<div class="btn-center bor-top" style="width: 315px;">
			<a href="javascript:void(0)" class="btn120" onclick="save_website_config('appleaccount')">保存</a>
		</div>
	</form>
</div>
<script src="/assets/js/db_handler.js" type="text/javascript"></script>