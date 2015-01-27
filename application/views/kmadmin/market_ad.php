<div class="padding10 formList">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv" style="width:100%;">
			<div onclick="location.href='/kmadmin/admin/market_home'" class="left" style="width:120px;">
				滚动图
			</div>
			<div onclick="location.href='/kmadmin/admin/market_ad'" class="center active" style="width:120px;">
				滚动图右侧
			</div>
			<div onclick="location.href='/kmadmin/admin/market_necessity'" class="center" style="width:120px;">
				装机必备
			</div>
			<div onclick="location.href='/kmadmin/admin/market_selection'" class="center" style="width:120px;">
				精品应用
			</div>
			<div onclick="location.href='/kmadmin/admin/market_softdown_life'" class="center" style="width:80px;">
				生活
			</div>
			<div onclick="location.href='/kmadmin/admin/market_softdown_news'" class="center" style="width:80px;">
				新闻
			</div>
			<div onclick="location.href='/kmadmin/admin/market_softdown_joy'" class="center" style="width:80px;">
				娱乐
			</div>
			<div onclick="location.href='/kmadmin/admin/market_softdown_shopping'" class="center" style="width:80px;">
				购物
			</div>
			<div onclick="location.href='/kmadmin/admin/market_select_union'" class="right" style="width:120px;">
				精选专题
			</div>
			<div class="clear">
			</div>
		</div>
	</div>
	<div class="partContent home-ad" style="">
		<div class="title">
			滚动图片右侧
		</div>
		<div id="Div1">
			<div class="ad-pic">
				<ul id="adPic" style="width:790px;margin:0 auto;">
					<li class="ad-item">
						<div class="ad-info">
							<img class="img-src" src="<?php echo $ad->src_marketad;?>" width="253" height="208"><br><br>
							<span class="label">标题：</span>
							<input type="text" id="title" class="inp-txt width200" placeholder="放在图片上显示的文字" value="<?php echo $ad->title_marketad;?>"><br><br>
							<span class="label ml45" style="margin-left:0">链接：</span>
							<input type="text" id="link" class="inp-txt width200" placeholder="单击图片跳转的链接" value="<?php echo $ad->link_marketad;?>"><br><br>
							<a style="cursor: pointer;margin-left: 70px;" onclick="save_ad_data('<?php echo $ad->id_marketad;?>')" class="btnfa120 ml45">保存</a>
							<div class="img-layer" onclick="change_ad_click();">点击更换图片</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<div class="clearboth"></div>
					<li id="loading" style="display:none;"><img src="/assets/images/cms/loading.gif" class="loading"/></li>
				</ul>
				<form id="changeAdForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
					<input onchange="return change_ad('<?php echo $ad->id_marketad;?>')" name="image" type="file" id="adfile" style="display:none;" accept="image/*">
				</form>
			</div>
		</div>
	</div>
</div>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>