<div class="padding10 formList clearfix">
	<div class="partContent baseInfo">
		<div class="title">
			基本信息 
		</div>
		<div id="Div1">
			<div class="item" style="margin-top: 10px;">
				<span class="label">接收对象：</span>
				<select class="select" id="type" style="width: 125px;" onclick="receive_type()">
					<option value="-1">--选择发送对象--</option>
					<option value="0">APP客户端</option>
					<option value="1">商户</option>
				</select>
				<span style="color: red;">*</span>
			</div>
			<div class="item" id="device_div" style="margin-top: 10px;display:none;">
				<span class="label">设备：</span>
				<select class="select" id="device" style="width: 120px;">
					<option value="0">所有</option>
					<option value="1">Android客户端</option>
					<option value="2">IOS客户端</option>
				</select>
				<span style="color: red;">*</span>
			</div>
			<div class="item" id="merchant_div" style="margin-top: 10px;display:none;">
				<span class="label">商户：</span>
				<input id="merchant" class="inp-txt width200" type="text" placeholder="商户的id，0 为所有商户">
			</div>
			<div class="item">
				<span class="label">消息标题：</span>
				<input type="text" id="title" class="inp-txt width400" maxlength="30" placeholder="1~30字">
				<span style="color: red;">*</span>
			</div>
		</div>
	</div>
	<div class="partContent clearboth content">
		<div class="title" onclick="shows(2)">消息内容</div>
		<textarea id="msg_content" name="description"></textarea>
	</div>
	<div class="btn-center">
		<a href="javascript:push_msg()" class="btnfa120">发送</a>
	</div>
</div>
<script src="/assets/js/kmadmin.js" type="text/javascript"></script>