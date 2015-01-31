<link rel="stylesheet" href="/assets/css/admin.css" type="text/css"/>
<div class="wrapper content">
	<div class="login_main" style="margin-top:0px;padding-top:100px;">
		<div class="titL">登录</div>
		<form class="form-login" action="/cms/index/login_handler" method="post" enctype="multipart/form-data">
			<input type="text" name="username" placeholder="用户名"/><br/>
			<i class="icon icon-user"></i>
			<input type="password" name="pwd" placeholder="密码"/><br/>
			<i class="icon icon-lock"></i>
			<input type="submit" value="登录"  class="btn btn-blue form-control"/>
		</form>
		<a href="/cms/index/register" class="fr" target="_self">没有帐号，现在注册</a>
	</div>
</div>