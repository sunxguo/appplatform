<link rel="stylesheet" href="/assets/kindEditor/themes/custom/custom.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/cms.js" type="text/javascript"></script>
<script src="/assets/js/module.js" type="text/javascript"></script><div class="padding10 formList clearfix">
	<?php foreach($subNavs as $key=>$sub):?>
	<div class="partContent clearboth content">
		<div class="title" onclick="shows(2)"><?php echo $sub->name_subnav;?></div>
		<textarea id="content<?php echo $sub->id_subnav;?>" name="description"><?php echo $sub->content_subnav;?></textarea>
		<script>
			var content_editor<?php echo $sub->id_subnav;?>;
			KindEditor.ready(function(K) {
				content_editor<?php echo $sub->id_subnav;?> = K.create('#content<?php echo $sub->id_subnav;?>', {
					uploadJson : '/assets/kindEditor/php/upload_json.php',
					fileManagerJson : '/assets/kindEditor/php/file_manager_json.php',
					allowFileManager : true,
					width : '100%',
					height:'300px',
					resizeType:0,
					imageTabIndex:1
				});
			});
		</script>
	</div>
	<?php endforeach;?>
	<div class="btn-center">
		<a href="javascript:save_subNav('<?php echo $sub->id_subnav;?>')" class="btnfa120"><?php echo lang('cms_content_save');?></a>
		<!--
		<a href="javascript:save_content(1,'')" class="btn120"><?php echo lang('cms_content_savedraft');?></a>
		-->
	</div>
</div>