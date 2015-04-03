<div class="padding10 formList">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv">
			<div class="left active">
				<?php echo lang('cms_content_home');?>
			</div>
			<div onclick="location.href='/cms/index/publish?type=essay&appid=<?php echo $info->id_app;?>'" class="center">
				<?php echo lang('cms_content_essay');?>
			</div>
			<div onclick="location.href='/cms/index/publish?type=product&appid=<?php echo $info->id_app;?>'" class="right">
				<?php echo lang('cms_content_product');?>
			</div>
			<div class="clear">
			</div>
		</div>
	</div>
	<div class="partContent" style="">
		<div class="title">
			<?php echo lang('cms_content_scroll');?>
		</div>
		<div id="Div1">
			<div class="slider-pic">
				<ul id="sliderPic">
					<?php $array_num=sizeof($info->homeslider); 
					foreach($info->homeslider as $key=>$slider):?>
					<li id="slider1" class="slider-item">
						<img id="img1" src="<?php echo $slider->src_homeslider;?>" width="116" height="206">
						<div class="oper">
							<?php if($key!=0):?>
							<img title="<?php echo lang('cms_content_forward');?>" src="/assets/images/cms/forward.png" onclick="javascript:slider_order('forward','<?php echo $slider->ordernum_homeslider;?>','<?php echo $slider->appid_homeslider;?>','<?php echo $slider->id_homeslider;?>')">
							<?php endif;?>
							<img title="<?php echo lang('cms_content_delete');?>" src="/assets/images/cms/d.png" onclick="javascript:slider_delete('<?php echo $slider->appid_homeslider;?>','<?php echo $slider->id_homeslider;?>','<?php echo $slider->ordernum_homeslider;?>','<?php echo $array_num;?>')" style="margin-left:18px;margin-right:19px;">
							<?php if($key!=($array_num-1)):?>
							<img title="<?php echo lang('cms_content_backward');?>" src="/assets/images/cms/backward.png" onclick="javascript:slider_order('backward','<?php echo $slider->ordernum_homeslider;?>','<?php echo $slider->appid_homeslider;?>','<?php echo $slider->id_homeslider;?>')">
							<?php endif;?>
						</div>
					</li>
					<?php endforeach;?>
					<li id="loading" style="display:none;"><img src="/assets/images/cms/loading.gif" class="loading"/></li>
					<li class="add" style="height:206px;"><a href="javascript:sliderAdd()"><?php echo lang('cms_content_add');?></a></li>
				</ul>
				<form id="uploadSliderForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
					<input onchange="return upload_slider('<?php echo $info->id_app;?>')" name="image" type="file" id="file" style="display:none;" accept="image/*">
				</form>
				<input id="new_order_num" type="hidden" value="<?php echo ($array_num+1);?>"/>
			</div>
		</div>
	</div>
</div>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/cms.js" type="text/javascript"></script>