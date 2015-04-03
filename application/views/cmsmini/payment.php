<div class="modify_main account-div">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="/cms/index/account"><?php echo lang('cms_account_basicinformation');?></a>
			<a href="/cms/index/pwd"><?php echo lang('cms_account_modifypwd');?></a>
			<a href="/cms/index/correlation"><?php echo lang('cms_account_setthesubaccount');?></a>
			<a class="current"><?php echo lang('cms_account_payment');?></a>
		</div>
	</div>
	<div class="titA" style="margin-left:20px;"><?php echo lang('cms_account_paymentaccountconfiguration');?></div>
	<dl class="store-payment icons">
		<dd>
			<div class="way-title active">
				<div class="control">
					<label>
						<input value="1" type="radio" class="ng-pristine ng-valid" name="cash" <?php echo $merchant->cashondelivery_merchant==1?"checked":"";?>><?php echo lang('cms_account_payment_open');?>
					</label>
					<label>
						<input value="0" type="radio" class="ng-pristine ng-valid" name="cash" <?php echo $merchant->cashondelivery_merchant==0?"checked":"";?>><?php echo lang('cms_account_payment_close');?>
					</label>
				</div>
				<i class="img-cash"></i>
				<div class="txt">
					<h3><?php echo lang('cms_account_payment_cash');?></h3>
					<h4><?php echo lang('cms_account_payment_cashtip');?></h4>
				</div>
			</div>
		</dd>
		<dd>
			<div class="way-title active">
				<?php if(isset($merchant->paypal_merchant) && $merchant->paypal_merchant!=''):?>
				<div class="control">
					<label>
						<input value="1" type="radio" class="ng-valid ng-dirty" name="paypal" <?php echo $merchant->paypalswitch_merchant==1?"checked":"";?>><?php echo lang('cms_account_payment_open');?>
					</label>
					<label>
						<input value="0" type="radio" class="ng-valid ng-dirty" name="paypal" <?php echo $merchant->paypalswitch_merchant==0?"checked":"";?>><?php echo lang('cms_account_payment_close');?>
					</label>
				</div>
				<?php endif;?>
				<i class="img-paypal"></i>
				<div class="txt">
					<h3>PayPal</h3>
					<h4>
						<?php echo lang('cms_account_payment_paypaltip');?>
						<?php if(!isset($merchant->paypal_merchant) || $merchant->paypal_merchant==''):?>
						<a class="pull-right ng-hide" href="javascript:show_pay_detail('paypal',true);"><?php echo lang('cms_account_payment_openpaypal');?></a>
						<?php endif;?>
					</h4>
				</div>
			</div>
			<?php if(isset($merchant->paypal_merchant) && $merchant->paypal_merchant!=''):?>
			<div class="way-content">
				<div class="inner">
					<h3>
						<a class="pull-right" href="javascript:show_pay_detail('paypal',true);"><?php echo lang('cms_account_payment_modify');?></a>
						<div class="ng-binding"><?php echo lang('cms_account_payment_paypalaccount');?><?php echo $merchant->paypal_merchant;?></div>
					</h3>
				</div>
			</div>
			<?php endif;?>
			<div id="paypal_div" class="way-content ng-hide hide">
				<h4 class="title"><?php echo lang('cms_account_payment_bindpaypalaccount');?></h4>
				<div class="dd">
					<label>
						<span><?php echo lang('cms_account_payment_paypalaccount');?></span>
						<input id="paypalAccount" type="text" class="inp-txt width200" value="<?php echo $merchant->paypal_merchant;?>">
					</label>
				</div>
				<div class="btns">
					<?php if(!isset($merchant->paypal_merchant) || $merchant->paypal_merchant==''):?>
					<a class="btn btn-middle btn-primary ng-hide pay-button" href="javascript:save_account_config_info('paypal_config','');"><?php echo lang('cms_account_payment_submit');?></a>
					<?php else:?>
					<a class="btn btn-middle btn-primary pay-button" href="javascript:save_account_config_info('paypal_config','');"><?php echo lang('cms_account_payment_update');?></a>
					<?php endif;?>
					<a class="btn btn-middle pay-button" href="javascript:show_pay_detail('paypal',false);"><?php echo lang('cms_account_payment_cancel');?></a>
				</div>
			</div>
		</dd>
		<dd>
			<div class="way-title">
				<?php if(isset($merchant->alipay_merchant) && $merchant->alipay_merchant!=''):?>
				<div class="control ng-hide">
					<label>
						<input value="1" type="radio" class="ng-pristine ng-valid" name="alipay" <?php echo $merchant->alipayswitch_merchant==1?"checked":"";?>><?php echo lang('cms_account_payment_open');?>
					</label>
					<label>
						<input value="0" type="radio" class="ng-pristine ng-valid" name="alipay" <?php echo $merchant->alipayswitch_merchant==0?"checked":"";?>><?php echo lang('cms_account_payment_close');?>
					</label>
				</div>
				<?php endif;?>
				<i class="img-zhifubao disable"></i>
				<div class="txt">
					<h3><?php echo lang('cms_account_payment_alipay');?></h3>
					<h4>
						<?php echo lang('cms_account_payment_alipaytip');?>
						<?php if(!isset($merchant->alipay_merchant) || $merchant->alipay_merchant==''):?>
						<a class="pull-right" href="javascript:show_pay_detail('alipay',true);"><?php echo lang('cms_account_payment_openalipay');?></a>
						<?php endif;?>
					</h4>
					<a href="#setting/help/alipay"><?php echo lang('cms_account_payment_howopenalipay');?></a>
				</div>
			</div>
			<?php if(isset($merchant->alipay_merchant) && $merchant->alipay_merchant!=''):?>
			<div class="way-content">
				<div class="inner">
					<h3 class="ng-binding">
						<a class="pull-right" href="javascript:show_pay_detail('alipay',true);"><?php echo lang('cms_account_payment_modify');?></a>
						<?php echo lang('cms_account_payment_isboundto');?><?php echo $merchant->alipay_merchant;?>
					</h3>
				</div>
			</div>
			<?php endif;?>
			<div id="alipay_div" class="way-content hide">
				<h4 class="title"><?php echo lang('cms_account_payment_bindingaccount');?></h4>
				<div class="dd">
					<label><span><?php echo lang('cms_account_payment_alipayaccount');?></span>
						<input id="alipayAccount" type="text" placeholder="<?php echo lang('cms_account_payment_inputalipayaccount');?>" class="inp-txt width200" value="<?php echo $merchant->alipay_merchant;?>">
					</label>
				</div>
				<div class="dd">
					<label>
						<span><?php echo lang('cms_account_payment_alipaypid');?></span>
						<input id="alipayPid" type="text" class="inp-txt width200" value="<?php echo $merchant->alipaypid_merchant;?>">
					</label>
				</div>
				<div class="dd">
					<label>
						<span><?php echo lang('cms_account_payment_alipaykey');?></span>
						<input id="alipayKey" type="text" class="inp-txt width200" value="<?php echo $merchant->alipaykey_merchant;?>">
					</label>
				</div>
				<div class="btns">
					<?php if(!isset($merchant->alipay_merchant) || $merchant->alipay_merchant==''):?>
					<a class="btn btn-middle btn-primary pay-button" href="javascript:save_account_config_info('alipay_config','');"><?php echo lang('cms_account_payment_submit');?></a>
					<?php else:?>
					<a class="btn btn-middle btn-primary ng-hide pay-button" href="javascript:save_account_config_info('alipay_config','');"><?php echo lang('cms_account_payment_update');?></a>
					<?php endif;?>
					<a class="btn btn-middle pay-button" href="javascript:show_pay_detail('alipay',false);"><?php echo lang('cms_account_payment_cancel');?></a>
				</div>
			</div>
		</dd>
	</dl>
	<div class="store-payment-help" style="display:none;">
		<h4>支付宝企业账号绑定流程</h4>
		<div class="wizard-tags">
			<div class="no-left-bd active"><span><i class="wizard-point">1</i></span></div>
			<div class="active"><span><i class="wizard-point">2</i></span></div>
			<div class="active"><span><i class="wizard-point">3</i></span></div>
			<div class="active"><span><i class="wizard-point">4</i></span></div>
		</div>
		<ul class="zhifubao">
			<li>注册支付宝企业账号，<br>具体流程请参考<a target="_blank" href="https://cshall.alipay.com/lab/help_detail.htm?help_id=211702">支付宝<br>官方文档</a></li>
			<li><a target="_blank" href="https://b.alipay.com/order/productDetail.htm?productId=2013080604609688">申请手机网站支付</a>（注意<br>：必须填写以公司名义备<br>案的域名）</li>
			<li>获取商户PID以及Key，获取<br>路径：支付宝-&gt;我的商家<br>服务-&gt;查询PID，Key</li>
			<li>回到快站支付方式页面，<br>点击支付宝开启按钮，输入<br>相关信息，即可成功绑定</li>
		</ul>
		<div class="wizard-hint">
			<h4>温馨提示</h4>
			<p>1、到<a target="_blank" href="http://help.alipay.com/support/index_sh.htm">支付宝商家帮助中心</a>查看更多帮助信息</p>
			<p>2、请确保您的支付宝PID和Key是有效的，否则无法使用支付宝支付</p>
			<p>3、支付金额将转至您的支付宝账号，请确保所填的账号准确无误，避免损失</p>
		</div>
	</div>
	<form id="uploadAvatarForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
		<input onchange="return upload_avatar()" name="image" type="file" id="avatarfile" style="display:none;" accept="image/*">
	</form>
</div>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>