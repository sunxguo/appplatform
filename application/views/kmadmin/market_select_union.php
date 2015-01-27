<div class="union-main"><div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv" style="width:100%;">
			<div onclick="location.href='/kmadmin/admin/market_home'" class="left" style="width:120px;">
				滚动图
			</div>
			<div onclick="location.href='/kmadmin/admin/market_ad'" class="center" style="width:120px;">
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
			<div onclick="location.href='/kmadmin/admin/market_select_union'" class="right active" style="width:120px;">
				精选专题
			</div>
			<div class="clear">
			</div>
		</div>
	</div>
	<ul class="union-list-box clearfix">
		<?php foreach($select_union as $u):?>
		<li class="union-list">
			<div class="union-data-box">
				<a href="javascript:void();" class="union-data-pic" title="<?php echo $u->name_marketunion?>">
					<img src="<?php echo $u->img_marketunion;?>" alt="<?php echo $u->name_marketunion?>">
					<div class="img-layer" onclick="change_union_img_click('<?php echo $u->id_marketunion;?>');">点击更换图片</div>
				</a>
				<div class="union-data-inf-box">
					<input id="name<?php echo $u->id_marketunion;?>" type="text" class="inp-txt union-name-input" value="<?php echo $u->name_marketunion;?>">
					<textarea id="description<?php echo $u->id_marketunion;?>" class="union-description-input"><?php echo $u->description_marketunion;?></textarea>
					<a href="javascript:void();" onclick="save_union_data('<?php echo $u->id_marketunion;?>');" class="btn80 fl" style="margin-right: 3px;">保存</a>
					<a href="javascript:void();" onclick="del_union('<?php echo $u->id_marketunion;?>');" class="btn80 fl">删除</a>
					<?php if($u->home_marketunion==0):?>
					<a href="javascript:set_union_home('<?php echo $u->id_marketunion;?>','up');" class="newbtn up" style="float:left;margin-left:17px;font-size:12px;margin-top:3px;">设置到首页</a>
					<?php else:?>
					<a href="javascript:set_union_home('<?php echo $u->id_marketunion;?>','down');" class="newbtn up" style="float:left;margin-left:17px;font-size:12px;margin-top:3px;">从首页移除</a>
					<?php endif;?>
				</div>
			</div>
			<div class="union-app-box">
				<?php foreach($u->app as $a):?>
				<section class="union-list-app  ">
					<div class="union-list-app-info">
						<a href="" target="_blank" class="union-list-app-pic icon">
							<img src="<?php echo $a->icon_app;?>" alt="<?php echo $a->name_app;?>">
						</a>
						<div class="union-list-app-detail">
							<a href="" target="_blank" title="<?php echo $a->name_app;?>" class="appName ofh"><?php echo $a->name_app;?></a>
							<span class="download">下载<?php echo $a->download_time_app;?>次</span>
							<div class="stars center" style="margin:10px 0 0 0;"></div>
							<div class="down">
								<span class="remove-union-app" onclick="app_union('<?php echo $a->id_app;?>','<?php echo $u->id_marketunion;?>','drop');" style="top: 0px;cursor:pointer;">移除</span>
							</div>
						</div>
					</div>
				</section>
				<?php endforeach;?>
			</div>
			<div class="union-list-toggle">
				<p class="union-list-arrow"></p>
			</div>
		</li>
		<?php endforeach;?>
	</ul>
	<form id="changeUnionForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
		<input onchange="return change_union()" name="image" type="file" id="unionfile" style="display:none;" accept="image/*">
	</form>
	<div class="clearboth"></div>
</div>
<div id="bkDiv" class="bk-div"></div>
<div id="wait_img_div" style="display:none;"><img src="/assets/images/cms/loading.gif" width="100" height="100"></div>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>