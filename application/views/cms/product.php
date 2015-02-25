<div class="padding10 formList clearfix">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv">
			<div onclick="location.href='/cms/index/publish?type=home&appid=<?php echo $info->id_app;?>'" class="left">
				<?php echo lang('cms_content_home');?>
			</div>
			<div onclick="location.href='/cms/index/publish?type=essay&appid=<?php echo $info->id_app;?>'" class="center">
				<?php echo lang('cms_content_essay');?>
			</div>
			<div class="right active">
				<?php echo lang('cms_content_product');?>
			</div>
			<div class="clear">
			</div>
		</div>
	</div>
	<div class="partContent baseInfo">
		<div class="title">
			<?php echo lang('cms_content_baseinfo');?>
			<?php if($info->merchant->pingkey_merchant==""):?>
				<a href="/cms/index/pingkey" style='color: red;font-size:14px;font-weight: normal;text-decoration:underline;'>【Warning:未设置Ping++ Key】</a>
			<?php endif;?>
			<?php if($info->pingid_app==""):?>
				<a href="/cms/index/accountconfig?appid=<?php echo $_GET["appid"];?>" style='color: red;font-size:14px;font-weight: normal;text-decoration:underline;'>【Warning:该应用未设置Ping++ Id】</a>
			<?php endif;?>
		</div>
		<div id="Div1">
			<div class="item" style="margin-top: 10px;">
				<span class="label"><?php echo lang('cms_content_nav');?>：</span>
				<select class="select" id="nav" style="width: 125px;" onchange="get_cat()">
					<option value="-1">--<?php echo lang('cms_content_choosenav');?>--</option>
					<?php foreach($info->product as $item):?>
					<option value="<?php echo $item->id_nav;?>"><?php echo $item->name_nav;?></option>
					<?php endforeach;?>
				</select>
				<select class="select" id="category" style="width: 125px;display:none;">
				</select>
				<span style="color: red;">*</span>
					<a href="/cms/index/navedit?appid=<?php echo $info->id_app?>" class="underline" target="_blank"><?php echo lang('cms_content_designnav');?></a>
					<?php if(sizeof($info->product)==0):?>
					<span style="color: red;">--<?php echo lang('cms_content_nomallnavtip');?>--</span>
					<?php endif;?>
				<br>
			</div>
			<div class="item">
				<span class="label"><?php echo lang('cms_content_unit');?>：</span>
				<select id="unit" class="select" style="width: 92px; margin-right:20px;">
					<option value="RMB" title="<?php echo lang('cms_content_chinayuan');?>"><?php echo lang('cms_content_chinayuan');?> ￥</option>
					<option value="NTD" title="<?php echo lang('cms_content_newtaiwandollar');?>"><?php echo lang('cms_content_newtaiwandollar');?> NT$</option>
					<option value="USD" title="<?php echo lang('cms_content_usdollar');?>"><?php echo lang('cms_content_usdollar');?> $</option>
					<option value="HKD" title="<?php echo lang('cms_content_hongkongdollar');?>"><?php echo lang('cms_content_hongkongdollar');?> HK$</option>
				</select>
				<span class="label"><?php echo lang('cms_content_oriprice');?>：</span>
				<input type="text" id="oriPrice" class="inp-txt width80">
				<span style="color: red; margin-right:20px;">*</span>
				<span class="label"><?php echo lang('cms_content_price');?>：</span>
				<input type="text" id="price" class="inp-txt width80">
				<span style="color: red;">*</span>
			</div>
			<div class="item">
				<span class="label"><?php echo lang('cms_content_title');?>：</span>
				<input type="text" id="title" class="inp-txt width400" maxlength="30" placeholder="<?php echo lang('cms_content_titlelength');?>">
				<span style="color: red;">*</span>
			</div>
			<div class="item" style="margin-bottom: 20px;">
				<span class="label"><?php echo lang('cms_content_summary');?>：</span>
				<input class="inp-txt width400" id="summary" maxlength="30"  placeholder="<?php echo lang('cms_content_summarylength');?>">
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
				<li id="addImgList" class="img-item">
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
		<textarea id="essay_content" name="description"></textarea>
	</div>
	<div class="btn-center">
		<a href="javascript:publish_product(0)" class="btnfa120"><?php echo lang('cms_content_publishproduct');?></a>
		<a href="javascript:publish_product(1)" class="btn120"><?php echo lang('cms_content_savedraft');?></a>
	</div>
</div>
<link rel="stylesheet" href="/assets/kindEditor/themes/custom/custom.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/cms.js" type="text/javascript"></script>