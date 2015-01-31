<div class="modify_main account-div">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="/cms/index/account">基本资料</a>
			<a href="/cms/index/pwd">密码修改</a>
			<a href="#" class="current">设置子帐号</a>
		</div>
	</div>
	<div class="titA" style="margin-left:20px;">设置子帐号</div>
	<?php if($merchant->accept_apply_merchant==0 && $merchant->correlation_merchant!=0):?>
	<div class="apply-msg-div">
			<span class="apply-msg">账号：【<?php echo $merchant->correlation_merchant;?>】申请你成为子帐号 | 附加信息：“<?php echo $merchant->msg_apply_merchant;?>”</span>
			<a href="javascript:accept_apply('ok')" class="ac-bt">接受</a>
			<a href="javascript:accept_apply('no')" class="ac-bt">拒绝</a>
	</div>
	<?php endif;?>
	<?php if(sizeof($FMerchant)>0):?>
	<div class="apply-msg-div">
	上一级账号 【<?php echo $FMerchant[0]->username_merchant;?>】
	</div>
	<?php endif;?>
	<?php if(sizeof($correlation)>0):?>
	<div class="apply-msg-div">
		<div class="item" style="margin-bottom:5px;">
			<span class="label" style="width:60px;dispaly:inline-block;">已有子帐号</span>
		</div>
		<?php foreach($correlation as $c):?>
		<div class="item">
			<span class="apply-msg">
				子账号：<?php echo $c->username_merchant;?>   
				状态：<?php if($c->accept_apply_merchant==0) echo "对方还未处理";elseif($c->accept_apply_merchant==1) echo "拒绝";else echo "接受";?>
			</span>
		</div>
		<?php endforeach;?>
	</div>
	<?php else:?>
	<div class="apply-msg-div">
		<div class="item">
			<span class="label" style="width:60px;dispaly:inline-block;">还没有子帐号</span>
		</div>
	</div>
	<?php endif;?>
	<form class="form-modify" action="/kmadmin/admin/modify" method="post" enctype="multipart/form-data">
		<div class="tips-error w230" style="margin-left: 160px; width: 200px;" id="errorInfo"></div>
		<div class="item">
			<span class="label" style="width:60px;dispaly:inline-block;">添加子帐号</span>
		</div>
		<div class="item">
			<span class="label" style="width:60px;dispaly:inline-block;">账号：</span>
			<input class="inp-txt width200" type="text" name="username" id="username" placeholder="用户名" value=""/>
			<span style="color:red;">*</span>
		</div>
		<div class="item">
			<span class="label" style="width:60px;dispaly:inline-block;height:30px;line-height:30px;">附加信息：</span>
			<textarea class="width200" id="apply_msg" placeholder="附加信息"></textarea>
		</div>
		<div class="item">
			<span class="label" style="width:60px;dispaly:inline-block;height:30px;line-height:30px;">权限：</span>
			<ul style="margin-left:20px;">
				<li><input type="checkbox" value="1" id="permission1" checked="checked">添加新应用</li>
				<li><input type="checkbox" value="2" id="permission2" checked="checked">删除应用</li>
				<li><input type="checkbox" value="3" id="permission3" checked="checked">清除应用</li>
				<li><input type="checkbox" value="4" id="permission4" checked="checked">设置应用</li>
				<li><input type="checkbox" value="5" id="permission5" checked="checked">添加应用内容</li>
				<li><input type="checkbox" value="6" id="permission6" checked="checked">删除应用内容</li>
				<li><input type="checkbox" value="7" id="permission7" checked="checked">修改应用内容</li>
				<li><input type="checkbox" value="8" id="permission8" checked="checked">推送消息管理</li>
				<li><input type="checkbox" value="9" id="permission9" checked="checked">设置并赋予新账号自己权限之内的权限</li>
			</ul>
		</div>
		<div class="btn-center bor-top" style="width:260px;">
			<a href="javascript:add_correlation()" class="btn120">添加</a>
		</div>
	</form>
	
</div>
<script></script>