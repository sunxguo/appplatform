<div class="modify_main account-div">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="#" class="current"><?php echo lang('cms_account_basicinformation');?></a>
			<a href="/cms/index/pwd"><?php echo lang('cms_account_modifypwd');?></a>
			<a href="/cms/index/correlation"><?php echo lang('cms_account_setthesubaccount');?></a>
			<a href="/cms/index/pingkey"><?php echo lang('cms_account_pingkey');?></a>
		</div>
	</div>
	<div class="titA" style="margin-left:20px;"><?php echo lang('cms_account_basicinformation');?></div>
	<form class="form-modify" action="/kmadmin/admin/modify" method="post" enctype="multipart/form-data">
		<div class="top-header">
			<div class="head">
				<div class="pic">
					<img id="PhotoPath" src="<?php echo $merchant->avatar_merchant==""?"/assets/images/cms/head.png":$merchant->avatar_merchant;?>" width="80" height="80">
				</div>
				<a href="#nogo" id="PhotoPathBtn" style="background-color: rgb(230, 230, 230); line-height: 22px;
					height: 22px; text-align: center; display: block; color: #3f5164;" onclick="avatar_modify_click()">
					<?php echo lang('cms_account_replaceavatar');?></a>
			</div>
			<div class="base-info">
				<div class="item" style="margin:10px 0 10px 0;"><?php echo lang('cms_account_account');?>： <?php echo $_SESSION['username'];?></div>
				<div class="item"><?php echo lang('cms_account_rank');?>： <?php  echo $merchant->grade_merchant;?><?php echo lang('cms_account_rankunit');?></div>
			</div>
			<div class="clearboth"></div>
		</div>
		<div class="tips-error w230" style="margin-left: 160px; width: 200px;" id="errorInfo"></div>
		<div class="item" style="margin-top:10px;">
			<span class="label"><?php echo lang('cms_content_gender');?>：</span>
			<select id="gender" class="select width210">
				<option value="2" <?php if($merchant->gender_merchant=="2") echo "selected";?>><?php echo lang('cms_content_unknown');?></option>
				<option value="0" <?php if($merchant->gender_merchant=="0") echo "selected";?>><?php echo lang('cms_content_male');?></option>
				<option value="1" <?php if($merchant->gender_merchant=="1") echo "selected";?>><?php echo lang('cms_content_female');?></option>
			</select>
		</div>
		<div class="item">
			<span class="label"><?php echo lang('cms_account_email');?>：</span>
			<input class="inp-txt width200" type="text" name="email" id="email" placeholder="<?php echo lang('cms_account_email');?>" value="<?php echo $merchant->email_merchant;?>"/>
		</div>
		<div class="item">
			<span class="label"><?php echo lang('cms_account_phone');?>：</span>
			<input class="inp-txt width200" type="text" name="phone" id="phone" placeholder="<?php echo lang('cms_account_phone');?>" value="<?php echo $merchant->phone_merchant;?>"/>
		</div>
		<div class="item">
			<span class="label"><?php echo lang('cms_account_qq');?>：</span>
			<input class="inp-txt width200" type="text" name="qq" id="qq" placeholder="<?php echo lang('cms_account_qq');?>" value="<?php echo $merchant->qq_merchant;?>"/>
		</div>
		<div class="item">
			<span class="label"><?php echo lang('cms_account_birthday');?>：</span>
			<input class="inp-txt width200" type="date" name="birthday" id="birthday" placeholder="<?php echo lang('cms_account_birthday');?>" value="<?php echo $merchant->birthday_merchant;?>"/>
		</div>
		<div class="btn-center bor-top" style="width:250px;">
			<a href="javascript:void(0)" class="btn120" onclick="save_merchant_info()"><?php echo lang('cms_account_save');?></a>
		</div>
	</form>
	<form id="uploadAvatarForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
		<input onchange="return upload_avatar()" name="image" type="file" id="avatarfile" style="display:none;" accept="image/*">
	</form>
</div>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>