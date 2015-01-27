<div class="padding10 formList clearfix">
	<div class="partContent baseInfo" style="width:681px;">
		<div class="title">
			广告图片（建议大小...）
		</div>
		<div id="Div1">
			<div onclick="add_adimg()" style="cursor:pointer; margin:10px auto; width:200px;">
				<img id="adimg" src="<?php echo $ad->img_ad;?>" width="200">点击图片更换
			</div>
			<form id="uploadAdImg" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
				<input onchange="return upload_ad_img('#uploadAdImg')" name="image" type="file" id="file" style="display:none;" accept="image/*">
			</form>
		</div>
	</div>
	<div class="partContent clearboth content" style="width:681px;">
		<div class="title" onclick="shows(2)">点击后显示内容</div>
		<textarea id="adeditor" editor="description"><?php echo $ad->content_ad;?></textarea>
	</div>
	<div class="btn-center">
		<a href="javascript:save_ad(<?php echo $ad->position_ad;?>)" class="btnfa120" id="bt_save">保存</a>
	</div>
</div>
<link rel="stylesheet" href="/assets/kindEditor/themes/custom/custom.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/kmadmin.js" type="text/javascript"></script>
<script src="/assets/js/editor.js" type="text/javascript"></script>