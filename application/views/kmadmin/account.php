<div class="modify_main">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="#" class="current">密码修改</a>
			<a href="/kmadmin/admin/accountconfig">账号配置</a>
		</div>
	</div>
	<div class="titA">修改密码</div>
	<form class="form-modify" action="/kmadmin/admin/modify" method="post" enctype="multipart/form-data">
		<div class="tips-error w230" style="margin-left: 160px; width: 200px;" id="errorInfo"></div>
		<div class="item" style="padding-left: 60px;">
			<input class="inp-txt width200" type="text" name="username" id="username" placeholder="用户名" value="<?php echo $_SESSION['username'];?>"/>
			<span style="color:red;">*</span>
		</div>
		<div class="item" style="padding-left: 60px;">
			<input class="inp-txt width200" type="password" name="oldpwd" id="oldpwd" placeholder="旧密码"/>
			<span style="color:red;">*</span>
		</div>
		<div class="item" style="padding-left: 60px;">
			<input class="inp-txt width200" type="password" name="newpwd" id="newpwd" placeholder="新密码"/>
			<span style="color:red;">*</span>
		</div>
		<div class="item" style="padding-left: 60px;">
			<input class="inp-txt width200" type="password" name="renewpwd" id="renewpwd" placeholder="确认密码"/>
			<span style="color:red;">*</span>
		</div>
		<div class="btn-center bor-top">
			<a href="javascript:void(0)" class="btn120" onclick="modify('adminpwd')">保存</a>
		</div>
	</form>
</div>
<script src="/assets/js/db_handler.js" type="text/javascript"></script>