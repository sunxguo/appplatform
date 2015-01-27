<div class="padding10 formList clearfix">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv">
			<div onclick="location.href='/cms/index/publish?type=home&appid=<?php echo $info->id_app;?>'" class="left">
				首页
			</div>
			<div onclick="location.href='/cms/index/publish?type=essay&appid=<?php echo $info->id_app;?>'" class="center">
				文章
			</div>
			<div class="right active">
				商品
			</div>
			<div class="clear">
			</div>
		</div>
	</div>
	<div class="partContent baseInfo">
		<div class="title">
			基本信息 
		</div>
		<div id="Div1">
			<div class="item" style="margin-top: 10px;">
				<span class="label">导航：</span>
				<select class="select" id="nav" style="width: 125px;" onchange="get_cat()">
					<option value="-1">--选择APP导航--</option>
					<?php foreach($info->product as $item):?>
					<option value="<?php echo $item->id_nav;?>"><?php echo $item->name_nav;?></option>
					<?php endforeach;?>
				</select>
				<select class="select" id="category" style="width: 125px;display:none;">
				</select>
				<span style="color: red;">*</span>
					<a href="/cms/index/navedit?appid=<?php echo $info->id_app?>" class="underline" target="_blank">导航设计</a>
					<?php if(sizeof($info->product)==0):?>
					<span style="color: red;">--没有商城类型的导航，请先设计导航--</span>
					<?php endif;?>
				<br>
			</div>
			<div class="item">
				<span class="label">单位：</span>
				<select id="unit" class="select" style="width: 92px; margin-right:20px;">
					<option value="RMB" title="人民币">人民币 ￥</option>
					<option value="NTD" title="新台币">新台币 NT$</option>
					<option value="USD" title="美元">美元 $</option>
					<option value="HKD" title="港元">港元 HK$</option>
				</select>
				<span class="label">原价：</span>
				<input type="text" id="oriPrice" class="inp-txt width80">
				<span style="color: red; margin-right:20px;">*</span>
				<span class="label">价格：</span>
				<input type="text" id="price" class="inp-txt width80">
				<span style="color: red;">*</span>
			</div>
			<div class="item">
				<span class="label">标题：</span>
				<input type="text" id="title" class="inp-txt width400" maxlength="30" placeholder="1~30字">
				<span style="color: red;">*</span>
			</div>
			<div class="item" style="margin-bottom: 20px;">
				<span class="label">摘要：</span>
				<input class="inp-txt width400" id="summary" maxlength="30"  placeholder="最多30字">
			</div>
		</div>
	</div>
	<div class="partContent listImgs" id="ListImgs" style="margin-bottom: 23px">
		<div class="title" style="position: relative">
			<span style="float: left;">缩略图</span>
		</div>
		<div class="lists" id="Div6">
			<span class="example">
				<a href="javascript:void(0)" style="color: Red;display:none">示例</a>
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
		<div class="title">正文内容</div>
		<textarea id="essay_content" name="description"></textarea>
	</div>
	<div class="btn-center">
		<a href="javascript:publish_product(0)" class="btnfa120">发布商品</a>
		<a href="javascript:publish_product(1)" class="btn120">保存到草稿箱</a>
	</div>
</div>
<link rel="stylesheet" href="/assets/kindEditor/themes/custom/custom.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/cms.js" type="text/javascript"></script>