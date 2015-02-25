<div class="wrapper content">
	<div class="formList post">
        <div style="height:35px;">
			<div id="tips" class="tips-error w230" style="width: 228px; display: none;">请输入验证码！</div>
		</div>
    	<div class="item">
        	<span class="label"><?php echo lang('cms_register_account');?>：</span>
            <input type="text" name="username" id="username" class="inp-txt h2" placeholder="<?php echo lang('cms_register_accounttip');?>" onblur="checkuserName()">
            <span style="color:red;">*</span>
        </div>
    	<div class="item">
        	<span class="label"><?php echo lang('cms_register_password');?>：</span>
            <input type="password" name="LoginPassword" id="LoginPassword" class="inp-txt h2" placeholder="<?php echo lang('cms_register_passwordtip');?>" onblur="checkPwd()">
            <span style="color:red;">*</span>
        </div>
        <div class="item">
        	<span class="label"><?php echo lang('cms_register_confirmpassword');?>：</span>
            <input type="password" name="ConfirmPassword" id="ConfirmPassword" placeholder="<?php echo lang('cms_register_confirmpasswordtip');?>" class="inp-txt h2" onblur="checkCfmPwd()">
            <span style="color:red;">*</span>
        </div>
                     <div class="item">
                   	<span class="label"><?php echo lang('cms_register_imageverification');?>：</span>
            <input type="text" style="width:90px" class="inp-txt w60 fl mr10 h2" id="authCode" name="authCode" value="" placeholder="<?php echo lang('cms_register_imageverificationtip');?>" onblur="checkCode()" onkeyup="checkAll()">
            <span style="color:red;float:left;">*</span> 
            <span id="validCodeContainer" style="">
                        <img id="validCodeImg" style="cursor: pointer;width:80px; height:30px; float:left; margin-right:10px; " src="" alt="<?php echo lang('cms_register_verificationcode');?>" title="<?php echo lang('cms_register_cantseechangeone');?>" onclick="refreshCode()"> 
                        <a style="display:block; width:14px; height:15px; background:url(/assets/images/cms/refresh.png) no-repeat; float:left; text-indent:-9999px; margin-top:7px;"  href="javascript:refreshCode()" title="<?php echo lang('cms_register_cantseechangeone');?>"><?php echo lang('cms_register_refresh');?></a>
                        </span>
        </div>
        <div id="msgCodeItem" class="item" style=" visibility:hidden; display:none">
        	<span class="label"><?php echo lang('cms_register_messageauthenticationcode');?>：</span>
            <input type="text" style="width:90px" class="inp-txt w60 fl mr10 h2" id="authMsgCode" name="authMsgCode" value="" placeholder="<?php echo lang('cms_register_messageauthenticationcodetip');?>" onkeyup="checkMsgAuthCode()">
            <span style="color:red;float:left;">*</span>
            <input class="btn120" style="border:none;" id="btnGetAuthCode" value="<?php echo lang('cms_register_getmessageauthenticationcode');?>" type="button" disabled="disabled">
             </div>

        <div class="item" id="GetAuthCodeTip" style="display:none;">
            <span class="label"></span>
            <span style="color:red;">如果没有收到短信验证码,可能是手机运营商服务不稳定造成的，请使用邮箱注册！</span>
        </div>
        <div class="item item-txt">
        	<input type="checkbox" id="chkAgree" name="chkAgree" checked="">
            <span><?php echo lang('cms_register_iagree');?><a href="" target="_blank"><?php echo lang('cms_register_agreement');?></a></span>
        </div>
        <div class="item">
            <input type="button" style="cursor:default;background:#687685" class="btn-big" id="btnRegister" onclick="register()" value="<?php echo lang('cms_register_registernow');?>">
        </div>
        <div class="post-zj">
            <span><?php echo lang('cms_register_hasaccount');?><a href="/cms/index/login"><?php echo lang('cms_register_logindirectly');?></a></span>
        </div>
    </div>
</div>
<script src="/assets/js/account.js" type="text/javascript"></script>