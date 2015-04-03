<div class="padding10 formList clearfix">
	<div class="partContent clearboth content">
		<div class="title" onclick="shows(2)"><?php echo $nav->name_nav;?></div>
		<textarea id="content_content" name="description"><?php echo $content->text_content;?></textarea>
	</div>
	<div class="btn-center">
		<a href="javascript:save_content('<?php echo $content->id_content;?>')" class="btnfa120"><?php echo lang('cms_content_save');?></a>
		<!--
		<a href="javascript:save_content(1,'<?php echo $content->id_content;?>')" class="btn120"><?php echo lang('cms_content_savedraft');?></a>
		-->
	</div>
</div>
<link rel="stylesheet" href="/assets/kindEditor/themes/custom/custom.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/cms.js" type="text/javascript"></script>
<script src="/assets/js/module.js" type="text/javascript"></script>