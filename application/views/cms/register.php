<div class="wrapper content">
	<div class="formList post">
        <div style="height:35px;">
			<div id="tips" class="tips-error w230" style="width: 228px; display: none;">请输入验证码！</div>
		</div>
    	<div class="item">
        	<span class="label">帐号：</span>
            <input type="text" name="username" id="username" class="inp-txt h2" placeholder="请输入账号" onblur="checkuserName()">
            <span style="color:red;">*</span>
        </div>
    	<div class="item">
        	<span class="label">密码：</span>
            <input type="password" name="LoginPassword" id="LoginPassword" class="inp-txt h2" placeholder="请输入密码" onblur="checkPwd()">
            <span style="color:red;">*</span>
        </div>
        <div class="item">
        	<span class="label">确认密码：</span>
            <input type="password" name="ConfirmPassword" id="ConfirmPassword" placeholder="请输入确认密码" class="inp-txt h2" onblur="checkCfmPwd()">
            <span style="color:red;">*</span>
        </div>
                     <div class="item">
                   	<span class="label">图片验证码：</span>
            <input type="text" style="width:90px" class="inp-txt w60 fl mr10 h2" id="authCode" name="authCode" value="" placeholder="请输入验证码" onblur="checkCode()" onkeyup="checkAll()">
            <span style="color:red;float:left;">*</span> 
            <span id="validCodeContainer" style="">
                        <img id="validCodeImg" style="cursor: pointer;width:80px; height:30px; float:left; margin-right:10px; " src="" alt="验证码" title="看不清,换一张" onclick="refreshCode()"> 
                        <a style="display:block; width:14px; height:15px; background:url(/assets/images/cms/refresh.png) no-repeat; float:left; text-indent:-9999px; margin-top:7px;"  href="javascript:refreshCode()" title="看不清,换一张">刷新</a>
                        </span>
        </div>
        <div id="msgCodeItem" class="item" style=" visibility:hidden; display:none">
        	<span class="label">短信验证码：</span>
            <input type="text" style="width:90px" class="inp-txt w60 fl mr10 h2" id="authMsgCode" name="authMsgCode" value="" placeholder="请输入短信验证码" onkeyup="checkMsgAuthCode()">
            <span style="color:red;float:left;">*</span>
            <input class="btn120" style="border:none;" id="btnGetAuthCode" value="获取短信验证码" type="button" disabled="disabled">
             </div>

        <div class="item" id="GetAuthCodeTip" style="display:none;">
            <span class="label"></span>
            <span style="color:red;">如果没有收到短信验证码,可能是手机运营商服务不稳定造成的，请使用邮箱注册！</span>
        </div>
        <div class="item item-txt">
        	<input type="checkbox" id="chkAgree" name="chkAgree" checked="">
            <span>我同意并遵守<a href="" target="_blank">《蔻美 APP平台服务协议》</a></span>
        </div>
        <div class="item">
            <input type="button" style="cursor:default;background:#687685" class="btn-big" id="btnRegister" onclick="register()" value="立即注册">
        </div>
        <div class="post-zj">
            <span>已有帐号，<a href="/cms/index/login">直接登录</a></span>
        </div>
    </div>
</div>
<script src="/assets/js/account.js" type="text/javascript"></script>