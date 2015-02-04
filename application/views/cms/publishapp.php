<div class="padding10 formList">
<!--<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv">
			<div class="left active">
				预览图
			</div>
			<div class="clear">
			</div>
		</div>
	</div>-->
	<div class="partContent" style="">
		<div class="title">
			预览图
		</div>
		<div id="Div1">
			<div class="slider-pic">
				<ul id="previewimgPic">
					<?php $array_num=sizeof($previewimgs);
					foreach($previewimgs as $key=>$previewimg):?>
					<li id="slider1" class="slider-item">
						<img id="img1" src="<?php echo $previewimg->src_previewimg;?>" width="116" height="206">
						<div class="oper">
							<?php if($key!=0):?>
							<img title="前移" src="/assets/images/cms/forward.png" onclick="javascript:previewimg_order('forward','<?php echo $previewimg->ordernum_previewimg;?>','<?php echo $previewimg->appid_previewimg;?>','<?php echo $previewimg->id_previewimg;?>')">
							<?php endif;?>
							<img title="删除" src="/assets/images/cms/d.png" onclick="javascript:previewimg_delete('<?php echo $previewimg->appid_previewimg;?>','<?php echo $previewimg->id_previewimg;?>','<?php echo $previewimg->ordernum_previewimg;?>','<?php echo $array_num;?>')" style="margin-left:18px;margin-right:19px;">
							<?php if($key!=($array_num-1)):?>
							<img title="后移" src="/assets/images/cms/backward.png" onclick="javascript:previewimg_order('backward','<?php echo $previewimg->ordernum_previewimg;?>','<?php echo $previewimg->appid_previewimg;?>','<?php echo $previewimg->id_previewimg;?>')">
							<?php endif;?>
						</div>
					</li>
					<?php endforeach;?>
					<li id="loading" style="display:none;"><img src="/assets/images/cms/loading.gif" class="loading"/></li>
					<li class="add" style="height:206px;"><a href="javascript:previewimgAdd()">添加</a></li>
				</ul>
				<form id="uploadPreviewImgForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
					<input onchange="return upload_previewimg('<?php echo $app->id_app;?>')" name="image" type="file" id="file" style="display:none;" accept="image/*">
				</form>
				<input id="new_order_num" type="hidden" value="<?php echo ($array_num+1);?>"/>
			</div>
		</div>
	</div>
	<div class="btn-center">
		<a href="javascript:publish_app('<?php echo $app->id_app;?>')" class="btnfa120">发布到市场</a>
	</div>
</div>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/cms.js" type="text/javascript"></script>