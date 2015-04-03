<div class="modify_main account-div">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="/cms/index/account"><?php echo lang('cms_account_basicinformation');?></a>
			<a href="/cms/index/pwd"><?php echo lang('cms_account_modifypwd');?></a>
			<a href="#" class="current"><?php echo lang('cms_account_setthesubaccount');?></a>
			<a href="/cms/index/payment"><?php echo lang('cms_account_payment');?></a>
		</div>
	</div>
	<div class="titA" style="margin-left:20px;"><?php echo lang('cms_account_setthesubaccount');?></div>
	<?php if($merchant->accept_apply_merchant==0 && $merchant->correlation_merchant!=0):?>
	<div class="apply-msg-div">
			<span class="apply-msg"><?php echo lang('cms_account_account');?>：【<?php echo $merchant->correlation_merchant;?>】<?php echo lang('cms_account_applytip');?> | <?php echo lang('cms_account_additionalinformation');?>：“<?php echo $merchant->msg_apply_merchant;?>”</span>
			<a href="javascript:accept_apply('ok')" class="ac-bt"><?php echo lang('cms_account_accept');?></a>
			<a href="javascript:accept_apply('no')" class="ac-bt"><?php echo lang('cms_account_refuse');?></a>
	</div>
	<?php endif;?>
	<?php if(sizeof($FMerchant)>0):?>
	<div class="apply-msg-div">
	<?php echo lang('cms_account_parentaccount');?> 【<?php echo $FMerchant[0]->username_merchant;?>】
	</div>
	<?php endif;?>
	<?php if(sizeof($correlation)>0):?>
	<div class="apply-msg-div">
		<div class="item" style="margin-bottom:5px;">
			<span class="label" style="width:60px;dispaly:inline-block;"><?php echo lang('cms_account_existingchildaccounts');?></span>
		</div>
		<?php foreach($correlation as $c):?>
		<div class="item">
			<span class="apply-msg">
				<?php echo lang('cms_account_childaccount');?>：<?php echo $c->username_merchant;?>   
				<?php echo lang('cms_account_state');?>：<?php if($c->accept_apply_merchant==0) echo lang('cms_account_otherparty');elseif($c->accept_apply_merchant==1) echo lang('cms_account_refuse');else echo lang('cms_account_accept');?>
			</span>
		</div>
		<?php endforeach;?>
	</div>
	<?php else:?>
	<div class="apply-msg-div">
		<div class="item">
			<span class="label" style="width:60px;dispaly:inline-block;"><?php echo lang('cms_account_hasnotachildaccount');?></span>
		</div>
	</div>
	<?php endif;?>
	<form class="form-modify" action="/kmadmin/admin/modify" method="post" enctype="multipart/form-data">
		<div class="tips-error w230" style="margin-left: 160px; width: 200px;" id="errorInfo"></div>
		<div class="item">
			<span class="label" style="width:120px;dispaly:inline-block;"><?php echo lang('cms_account_addachildaccount');?></span>
		</div>
		<div class="item">
			<span class="label" style="width:60px;dispaly:inline-block;"><?php echo lang('cms_account_account');?>：</span>
			<input class="inp-txt width200" type="text" name="username" id="username" placeholder="<?php echo lang('cms_account_username');?>" value=""/>
			<span style="color:red;">*</span>
		</div>
		<div class="item">
			<span class="label" style="width:60px;dispaly:inline-block;height:30px;line-height:30px;"><?php echo lang('cms_account_additionalinformation');?>：</span>
			<textarea class="width200" id="apply_msg" placeholder="<?php echo lang('cms_account_additionalinformation');?>"></textarea>
		</div>
		<div class="item">
			<span class="label" style="width:60px;dispaly:inline-block;height:30px;line-height:30px;"><?php echo lang('cms_account_authority');?>：</span>
			<ul style="margin-left:20px;">
				<li><input type="checkbox" value="1" id="permission1" checked="checked"><?php echo lang('cms_account_addnewapp');?></li>
				<li><input type="checkbox" value="2" id="permission2" checked="checked"><?php echo lang('cms_account_deleteapp');?></li>
				<li><input type="checkbox" value="3" id="permission3" checked="checked"><?php echo lang('cms_account_clearapp');?></li>
				<li><input type="checkbox" value="4" id="permission4" checked="checked"><?php echo lang('cms_account_setapp');?></li>
				<li><input type="checkbox" value="5" id="permission5" checked="checked"><?php echo lang('cms_account_addappcontent');?></li>
				<li><input type="checkbox" value="6" id="permission6" checked="checked"><?php echo lang('cms_account_deleteappcontent');?></li>
				<li><input type="checkbox" value="7" id="permission7" checked="checked"><?php echo lang('cms_account_modifyappcontent');?></li>
				<li><input type="checkbox" value="8" id="permission8" checked="checked"><?php echo lang('cms_account_pushmsg');?></li>
				<li><input type="checkbox" value="9" id="permission9" checked="checked"><?php echo lang('cms_account_setchidaccount');?></li>
			</ul>
		</div>
		<div class="btn-center bor-top" style="width:260px;">
			<a href="javascript:add_correlation()" class="btn120"><?php echo lang('cms_account_add');?></a>
		</div>
	</form>
	
</div>