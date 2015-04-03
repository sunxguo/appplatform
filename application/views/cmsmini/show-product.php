<div class="padding10 formList clearfix">
	<div class="partContent baseInfo">
		<div class="title">
			<?php echo lang('cms_content_baseinfo');?>
		</div>
		<div id="Div1">
			<div class="item" style="margin-top: 10px;">
				<span class="label"><?php echo lang('cms_content_nav');?>：</span>
				<select class="select" id="nav" style="width: 125px;">
					<option value="-1">--<?php echo lang('cms_content_choosenav');?>--</option>
					<?php foreach($app->navs as $item):?>
					<option <?php echo $item->id_nav==$product->navid_product?'selected = "selected"':'';?> value="<?php echo $item->id_nav;?>"><?php echo $item->name_nav;?></option>
					<?php endforeach;?>
				</select>
				<select class="select" id="category" style="width: 125px;display:none;">
				</select>
				<span style="color: red;">*</span>
					<a href="/cms/index/navedit?appid=<?php echo $app->id_app?>" class="underline" target="_blank"><?php echo lang('cms_content_designnav');?></a>
					<?php if(sizeof($app->navs)==0):?>
					<span style="color: red;">--<?php echo lang('cms_content_nomallnavtip');?>--</span>
					<?php endif;?>
				<br>
			</div>
			<div class="item">
				<span class="label"><?php echo lang('cms_content_unit');?>：</span>
				<select id="unit" class="select" style="width: 92px; margin-right:20px;">
					<option value="RMB" title="<?php echo lang('cms_content_chinayuan');?>" <?php echo "RMB"==$product->unit_product?"selected='selected'":"";?>><?php echo lang('cms_content_chinayuan');?> ￥</option>
					<option value="NTD" title="<?php echo lang('cms_content_newtaiwandollar');?>" <?php echo "NTD"==$product->unit_product?"selected='selected'":"";?>><?php echo lang('cms_content_newtaiwandollar');?> NT$</option>
					<option value="USD" title="<?php echo lang('cms_content_usdollar');?>" <?php echo "USD"==$product->unit_product?"selected='selected'":"";?>><?php echo lang('cms_content_usdollar');?> $</option>
					<option value="HKD" title="<?php echo lang('cms_content_hongkongdollar');?>" <?php echo "HKD"==$product->unit_product?"selected='selected'":"";?>><?php echo lang('cms_content_hongkongdollar');?> HK$</option>
				</select>
				<span class="label"><?php echo lang('cms_content_oriprice');?>：</span>
				<input type="text" id="oriPrice" class="inp-txt width80" value="<?php echo $product->oriprice_product;?>">
				<span style="color: red; margin-right:20px;">*</span>
				<span class="label"><?php echo lang('cms_content_price');?>：</span>
				<input type="text" id="price" class="inp-txt width80" value="<?php echo $product->price_product;?>">
				<span style="color: red;">*</span>
			</div>
			<div class="item">
				<span class="label"><?php echo lang('cms_content_title');?>：</span>
				<input type="text" id="title" class="inp-txt width400" maxlength="30" placeholder="<?php echo lang('cms_content_titlelength');?>" value="<?php echo $product->name_product;?>">
				<span style="color: red;">*</span>
			</div>
			<div class="item" style="margin-bottom: 20px;">
				<span class="label"><?php echo lang('cms_content_summary');?>：</span>
				<input class="inp-txt width400" id="summary" maxlength="30"  placeholder="<?php echo lang('cms_content_summarylength');?>" value="<?php echo $product->summary_product;?>">
			</div>
		</div>
	</div>
	<div class="partContent listImgs" id="ListImgs" style="margin-bottom: 23px">
		<div class="title" style="position: relative">
			<span style="float: left;"><?php echo lang('cms_content_thumbnail');?></span>
		</div>
		<div class="lists" id="Div6">
			<span class="example">
				<a href="javascript:void(0)" style="color: Red;display:none"><?php echo lang('cms_content_example');?></a>
			</span>
			<ul id="imgListDivs">
				<?php $num=sizeof($product->thumbnail_product);foreach($product->thumbnail_product as $item):?>
				<li class="img-item imagelist" onmouseover="imgover(this)" onmouseout="imgout(this)">
					<img class="thumb-src" width="77" height="77" src="<?php echo $item->src;?>">
					<img onclick="delclick(this)" class="del-bt" title="<?php echo lang('cms_content_delthisthumbnail');?>" src="/assets/images/cms/delete.png">
				</li>
				<?php endforeach;?>
				<li id="addImgList" class="img-item" <?php if($num>=3) echo "style='display:none;'";?>>
					<div onclick="add_thumb()" style="cursor:pointer;">
						<img width="77" height="77" src="/assets/images/cms/appbg_ad.png">
					</div>
					<form id="uploadImgThumb" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
						<input onchange="return upload_thumb_img('#uploadImgThumb')" name="image" type="file" id="file" style="display:none;" accept="image/*">
					</form>
				</li>
			</ul>
		</div>
	</div>
	<div class="partContent clearboth content">
		<div class="title"><?php echo lang('cms_content_content');?></div>
		<textarea id="essay_content" name="description"><?php echo $product->description_product;?></textarea>
	</div>
	<div class="btn-center">
		<a href="javascript:save_product(0,'<?php echo $_GET["productid"];?>')" class="btnfa120"><?php echo lang('cms_content_saveandpublish');?></a>
		<a href="javascript:save_product(1,'<?php echo $_GET["productid"];?>')" class="btn120"><?php echo lang('cms_content_savedraft');?></a>
	</div>
</div>
<link rel="stylesheet" href="/assets/kindEditor/themes/custom/custom.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/cms.js" type="text/javascript"></script>