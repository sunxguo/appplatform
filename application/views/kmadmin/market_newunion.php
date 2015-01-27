<div class="padding10 formList clearfix">
	<div class="partContent baseInfo">
		<div class="title">
			新专题基本信息 
		</div>
		<div class="newunion">
			<div class="union-data-box" style="width:167px;margin:10px auto;">
				<a href="javascript:void();" class="union-data-pic" title="新专题图片">
					<img id="new_union_img" src="/assets/images/cms/appbg_ad.png">
					<div class="img-layer" onclick="add_union_img()" style="display: none;">点击更换图片</div>
				</a>
				<div class="union-data-inf-box">
					<input id="new_union_name" type="text" class="inp-txt union-name-input" placeholder="标题">
					<textarea id="new_union_description" class="union-description-input" placeholder="描述"></textarea>
				</div>
			</div>
		</div>
	</div>
	<form id="changeNewUnionForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
		<input onchange="return change_new_union()" name="image" type="file" id="newunionfile" style="display:none;" accept="image/*">
	</form>
	<div class="btn-center">
		<a href="javascript:add_new_union()" class="btnfa120">添加</a>
	</div>
</div>
<script src="/assets/js/kmadmin.js" type="text/javascript"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>