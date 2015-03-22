<div class="padding10 formList msglist clearfix">
	<div class="partContent baseInfo" style="width: 581px;margin: 10px auto; float:none;">
		<div class="title">
			<?php echo lang("cms_content_baseinfo");?>
		</div>
		<div id="Div1">
			<div class="item" style="margin-top: 10px;">
				<span class="label"><?php echo lang("cms_sendmsg_receiver");?>：</span>
				<select class="select" id="type" style="width: 125px;" onclick="receive_type()">
					<option value="-1">--<?php echo lang("cms_sendmsg_choosereceiver");?>--</option>
					<option value="2"><?php echo lang("cms_sendmsg_appclient");?></option>
					<option value="3"><?php echo lang("cms_sendmsg_user");?></option>
				</select>
				<span style="color: red;">*</span>
			</div>
			<div class="item" id="app_div" style="margin-top: 10px;display:none;">
				<span class="label"><?php echo lang("cms_pushmsg_app");?>：</span>
				<select class="select" id="app" style="width: 120px;">
					<option value="0"><?php echo lang("cms_sendmsg_all");?></option>
					<?php if(sizeof($apps)>0):?>
					<option value="<?php echo $apps[0]->id_app;?>"><?php echo $apps[0]->name_app;?></option>
					<?php endif;?>
				</select>
				<span style="color: red;">*</span>
			</div>
			<div class="item" id="device_div" style="margin-top: 10px;display:none;">
				<span class="label"><?php echo lang("cms_pushmsg_device");?>：</span>
				<select class="select" id="device" style="width: 120px;">
					<option value="0"><?php echo lang("cms_sendmsg_all");?></option>
					<option value="1"><?php echo lang("cms_sendmsg_androidclient");?></option>
					<option value="2"><?php echo lang("cms_sendmsg_iosclient");?></option>
				</select>
				<span style="color: red;">*</span>
			</div>
			<div class="item" id="user_div" style="margin-top: 10px;display:none;">
				<span class="label"><?php echo lang("cms_sendmsg_user");?>：</span>
				<input id="user" class="inp-txt width200" type="text" placeholder="<?php echo lang("cms_sendmsg_usertip");?>">
			</div>
			<div class="item">
				<span class="label"><?php echo lang("cms_sendmsg_msgtitle");?>：</span>
				<input type="text" id="title" class="inp-txt width400" maxlength="30" placeholder="<?php echo lang("cms_sendmsg_msgtitlelengthtip");?>">
				<span style="color: red;">*</span>
			</div>
		</div>
	</div>
	<div class="partContent clearboth content" style="width: 581px;margin: 10px auto;">
		<div class="title" onclick="shows(2)"><?php echo lang("cms_sendmsg_msgcontent");?></div>
		<textarea id="msg_content" name="description" style="width: 90%;height: 70px;margin: 10px 0 10px 23px;"></textarea>
	</div>
	<div class="btn-center">
		<a href="javascript:push_msg()" class="btnfa120"><?php echo lang("cms_sendmsg_send");?></a>
	</div>
</div>
<script src="/assets/js/cms.js" type="text/javascript"></script>