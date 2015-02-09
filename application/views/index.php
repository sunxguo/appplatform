<div class="part-content">
	<div class="slider box-shadow" id="slider">
		<ul>
			<?php foreach($marketscroll as $img):?>
			<li>
				<a href="<?php echo $img->link_marketscroll;?>" title="<?php echo $img->title_marketscroll;?>">
					<img src="<?php echo $img->src_marketscroll;?>"/>
				</a>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
	<div class="market-ad box-shadow">
		<ul>
			<li class="ad">
				<a href="<?php echo $marketad->link_marketad;?>" title="<?php echo $marketad->title_marketad;?>">
					<img src="<?php echo $marketad->src_marketad;?>">
				</a>
			</li>
		</ul>
	</div>
	<div class="clearboth"></div>
</div>
<div class="part-content necessary-div">
	<div class="title">装机必备</div>
	<!-- 图片轮换 -->
	<div class="necessary box-shadow">
		<a class="turn-left-btn unused" id="prev_arrow" href="javascript:void(0)" hidefocus="true">
		</a>
		<div class="necessary-app-box" id="html-carousel">
			<ul class="carousel-list" id="carousel_list" style="margin-left: 0px;">
				<?php if(isset($necessaryapps)):
				foreach($necessaryapps as $app):?>
				<li class="app-container">
					<div class="vertical-app">
						<a href="/market/app?appid=<?php echo $app->id_app;?>" target="_blank" class="vertical-icon">
							<img src="<?php echo $app->icon_app;?>" alt="<?php echo $app->name_app;?>">
						</a>
						<a href="/market/app?appid=<?php echo $app->id_app;?>" class="vertical-tit-nes" title="<?php echo $app->name_app;?>" target="_blank"><?php echo $app->name_app;?></a>
						<div class="stars center star<?php echo $app->star?>" style="display: block;"></div>
						<div class="down">
							<span onclick="window.open('/market/app?appid=<?php echo $app->id_app;?>');" style="top: 0px;">下载</span>
						</div>
					</div>
				</li>
				<?php endforeach;endif;?>
			</ul>
		</div>
		<a class="turn-right-btn" id="next_arrow" href="javascript:void(0)"></a>
		<div class="clearboth"></div>
	</div>
</div>
<div class="part-content">
	<div class="part-left">
		<div>
			<div class="title">精品软件</div>
			<ul class="software-list box-shadow" style="margin-left: 0px;">
				<?php if(isset($selectapps)):
				foreach($selectapps as $app):?>
				<li class="app-container">
					<div class="vertical-app">
						<a href="/market/app?appid=<?php echo $app->id_app;?>" target="_blank" class="vertical-icon">
							<img src="<?php echo $app->icon_app;?>" alt="<?php echo $app->name_app;?>" width="72" height="72">
						</a>
						<a href="/market/app?appid=<?php echo $app->id_app;?>" class="vertical-tit" title="<?php echo $app->name_app;?>" target="_blank"><?php echo $app->name_app;?></a>
						<span class="vertical-type"><?php echo $categories[$app->cat_app];?></span>
						<div class="stars center star<?php echo $app->star?>" style="display: block;"></div>
						<div class="down">
							<span onclick="window.open('/market/app?appid=<?php echo $app->id_app;?>');" style="top: 0px;">下载</span>
						</div>
					</div>
				</li>
				<?php endforeach;endif;?>
			</ul>
		</div>
		<div class="category  box-shadow">
			<div class="category-tab-tit">
				<ul class="clearfix" id="CategoryTabTit">
						<li class="cate1 selected">
							<span class="category1">
								<img style="width:22px;height:22px;vertical-align:middle;" src="/assets/images/market/life.png" alt="生活">
								生活
							</span>
						</li>
						<li class="cate2"><span class="category2">
							<img src="/assets/images/market/news.png" alt="新闻">新闻</span></li>
						<li class="cate3"><span class="category3">
							<img src="/assets/images/market/entertainment.png" alt="娱乐">娱乐</span></li>
						<li class="cate4"><span class="category4">
							<img src="/assets/images/market/shopping.png" alt="购物">购物</span></li>
				</ul>
			</div>
			<div class="category-tab-body">
				<ul id="CategoryTabBody">
					<li class="selected">
						<?php if(isset($lifeapps)):
						foreach($lifeapps as $app):?>
						<div class="crosswise-app app-container">
							<a href="/market/app?appid=<?php echo $app->id_app;?>" class="icon" target="_blank">
								<img src="<?php echo $app->icon_app;?>" width="72" height="72" alt="<?php echo $app->name_app;?>">
							</a>
							<div class="app-info">
								<a class="name" href="/market/app?appid=<?php echo $app->id_app;?>" target="_blank" title="<?php echo $app->name_app;?>"><?php echo $app->name_app;?></a>
								<span class="down-count">下载<?php echo $app->download_time_app;?>次</span>
								<div class="stars center star<?php echo $app->star?>" ></div>
								<div class="down">
									<span onclick="window.open('/market/app?appid=<?php echo $app->id_app;?>');" style="left: 0px;">下载</span>
								</div>
							</div>
							<div class="clearboth"></div>
						</div>
						<?php endforeach;endif;?>
					</li>
					<li class="unselected">
						<?php if(isset($newsapps)):
						foreach($newsapps as $app):?>
						<div class="crosswise-app app-container">
							<a href="/market/app?appid=<?php echo $app->id_app;?>" class="icon" target="_blank">
								<img src="<?php echo $app->icon_app;?>" width="72" height="72" alt="<?php echo $app->name_app;?>">
							</a>
							<div class="app-info">
								<a class="name" href="/market/app?appid=<?php echo $app->id_app;?>" target="_blank" title="<?php echo $app->name_app;?>"><?php echo $app->name_app;?></a>
								<span class="down-count">下载<?php echo $app->download_time_app;?>次</span>
								<div class="stars center star<?php echo $app->star?>" ></div>
								<div class="down">
									<span onclick="window.open('/market/app?appid=<?php echo $app->id_app;?>');" style="left: 0px;">下载</span>
								</div>
							</div>
							<div class="clearboth"></div>
						</div>
						<?php endforeach;endif;?>
					</li>
					<li class="unselected">
						<?php if(isset($entertainmentapps)):
						foreach($entertainmentapps as $app):?>
						<div class="crosswise-app app-container">
							<a href="/market/app?appid=<?php echo $app->id_app;?>" class="icon" target="_blank">
								<img src="<?php echo $app->icon_app;?>" width="72" height="72" alt="<?php echo $app->name_app;?>">
							</a>
							<div class="app-info">
								<a class="name" href="/market/app?appid=<?php echo $app->id_app;?>" target="_blank" title="<?php echo $app->name_app;?>"><?php echo $app->name_app;?></a>
								<span class="down-count">下载<?php echo $app->download_time_app;?>次</span>
								<div class="stars center star<?php echo $app->star?>" ></div>
								<div class="down">
									<span onclick="window.open('/market/app?appid=<?php echo $app->id_app;?>');" style="left: 0px;">下载</span>
								</div>
							</div>
							<div class="clearboth"></div>
						</div>
						<?php endforeach;endif;?>
					</li>
					<li class="unselected">
						<?php if(isset($shoppingapps)):
						foreach($shoppingapps as $app):?>
						<div class="crosswise-app app-container">
							<a href="/market/app?appid=<?php echo $app->id_app;?>" class="icon" target="_blank">
								<img src="<?php echo $app->icon_app;?>" width="72" height="72" alt="<?php echo $app->name_app;?>">
							</a>
							<div class="app-info">
								<a class="name" href="/market/app?appid=<?php echo $app->id_app;?>" target="_blank" title="<?php echo $app->name_app;?>"><?php echo $app->name_app;?></a>
								<span class="down-count">下载<?php echo $app->download_time_app;?>次</span>
								<div class="stars center star<?php echo $app->star?>" ></div>
								<div class="down">
									<span onclick="window.open('/market/app?appid=<?php echo $app->id_app;?>');" style="left: 0px;">下载</span>
								</div>
							</div>
							<div class="clearboth"></div>
						</div>
						<?php endforeach;endif;?>
					</li>
				</ul>
			</div>
		</div>
		<!-- 精选专题 -->
		<div class="part-content union">
			<div class="title">精选专题</div>
			<div class="union-left">
				<div class="union-banner">
					<a href="/market/appunion?uid=<?php echo $selectUnions[0]->id_marketunion;?>" target="_blank">
						<img src="<?php echo $selectUnions[0]->img_marketunion;?>" alt="精选专题">
					</a>
				</div>
				<div class="union-app">
					<ul>
						<?php if(isset($selectUnionsApps[0])):
						foreach($selectUnionsApps[0] as $app):?>
						<li>
							<div class="vertical-lit-app">
								<a class="vertical-lit-icon" target="_blank" href="/market/app?appid=<?php echo $app->id_app;?>">
									<img src="<?php echo $app->icon_app;?>" alt="<?php echo $app->name_app;?>">
								</a>
								<a class="vertical-lit-tit" target="_blank" href="/market/app?appid=<?php echo $app->id_app;?>" title="<?php echo $app->name_app;?>" style="display: block;"><?php echo $app->name_app;?></a>
								<a class="install-lit-btn" href="/market/app?appid=<?php echo $app->id_app;?>" onclick="" style="display: none;" target="_blank">详情</a>
							</div>
						</li>
						<?php endforeach;endif;?>
					</ul>
				</div>
			</div>
			<div class="union-right">
				<div class="union-banner">
					<a href="/market/appunion?uid=<?php echo $selectUnions[0]->id_marketunion;?>" target="_blank">
						<img src="<?php echo $selectUnions[1]->img_marketunion;?>" alt="<?php echo $selectUnions[0]->name_marketunion;?>">
					</a>
				</div>
				<div class="union-app">
					<ul>
						<?php if(isset($selectUnionsApps[1])):
						foreach($selectUnionsApps[1] as $app):?>
						<li>
							<div class="vertical-lit-app">
								<a class="vertical-lit-icon" target="_blank" href="/market/app?appid=<?php echo $app->id_app;?>">
									<img src="<?php echo $app->icon_app;?>" alt="<?php echo $app->name_app;?>">
								</a>
								<a class="vertical-lit-tit" target="_blank" href="/market/app?appid=<?php echo $app->id_app;?>" title="<?php echo $app->name_app;?>" style="display: block;"><?php echo $app->name_app;?></a>
								<a class="install-lit-btn" href="/market/app?appid=<?php echo $app->id_app;?>" onclick="" style="display: none;" target="_blank">详情</a>
							</div>
						</li>
						<?php endforeach;endif;?>
					</ul>
				</div>
			</div>
			<div class="clearboth"></div>
			<!-- 更多精选专题banner -->
			<div class="union-more-banner">
				<?php if(isset($selectUnions[2])):?>
				<div class="union-banner-cell">
					<a href="/market/appunion?uid=<?php echo $selectUnions[2]->id_marketunion;?>" target="_blank">
						<img  src="<?php echo $selectUnions[2]->img_marketunion;?>" alt="<?php echo $selectUnions[2]->name_marketunion;?>" title="<?php echo $selectUnions[2]->name_marketunion;?>">
					</a>
				</div>
				<?php endif;?>
				<?php if(isset($selectUnions[3])):?>
				<div class="union-banner-cell ml15">
					<a href="/market/appunion?uid=<?php echo $selectUnions[3]->id_marketunion;?>" target="_blank">
						<img  src="<?php echo $selectUnions[3]->img_marketunion;?>" alt="<?php echo $selectUnions[3]->name_marketunion;?>" title="<?php echo $selectUnions[3]->name_marketunion;?>">
					</a>
				</div>
				<?php endif;?>
				<?php if(isset($selectUnions[4])):?>
				<div class="union-banner-cell ml15">
					<a href="/market/appunion?uid=<?php echo $selectUnions[4]->id_marketunion;?>" target="_blank">
						<img  src="<?php echo $selectUnions[4]->img_marketunion;?>" alt="<?php echo $selectUnions[4]->name_marketunion;?>" title="<?php echo $selectUnions[4]->name_marketunion;?>">
					</a>
				</div>
				<?php endif;?>
				<div class="clearboth"></div>
			</div>
		</div>
		<div class="union-link-all">
			<a href="/market/appunion"><span>更多软件专题</span><i class="arrow-right"></i></a>
			<a href="/market/appunion" class="ml15"><span>更多游戏专题</span><i class="arrow-right"></i></a>
			<div class="clearboth"></div>
		</div>
		<!-- 分类列表 -->
		<div class="catelist">
			<dl class="clearfix">
				<dt>软件分类：</dt>
				<?php foreach($categories as $key=>$c):?>
				<dd>
					<a href="/market/appcategory?cid=<?php echo $key;?>" target="_blank"><?php echo $c;?></a>
				</dd>
				<?php endforeach;?>
			</dl>
		</div>
	</div>
	<div class="part-right">
		<!-- 综合排行 -->
		<div class="week-rank">
			<div class="rank-tit">
				<span class="tit">综合排行</span>
				<!--
				<ul class="rank-tab-btn">
					<li class="selected"><a href="javascript:;">软件</a></li>
					<li><a href="javascript:;">游戏</a></li>
				</ul>
				-->
				<div class="clearboth"></div>
			</div>
			<ul class="rank-tab-body rank-body">
				<?php foreach($comprehensiveList as $key=>$app):?>
				<li>
					<span class="rank-num rank-num<?php echo ($key+1);?>"><?php echo ($key+1);?></span>
					<div class="rank-info">
						<a href="/market/app?appid=<?php echo $app->id_app;?>" title="<?php echo $app->name_app;?>" class="name" target="_blank"><?php echo $app->name_app;?></a>
						<div class="down-count">
							<span><?php echo $app->download_time_app;?>次</span>下载
						</div>
					</div>
					<img src="<?php echo $app->icon_app;?>" alt="<?php echo $app->name_app;?>"></a>
					<div class="clearboth"></div>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
		<!-- 下载排行 -->
		<div class="week-rank">
			<div class="rank-tit" style="margin: 20px 0 10px;">
				<span class="tit">下载排行</span>
				<!--
				<ul class="rank-tab-btn">
					<li class="selected"><a href="javascript:;">软件</a></li>
					<li><a href="javascript:;">游戏</a></li>
				</ul>
				-->
				<div class="clearboth"></div>
			</div>
			<ul class="rank-tab-body rank-body">
				<?php foreach($downloadList as $key=>$app):?>
				<li>
					<span class="rank-num rank-num<?php echo ($key+1);?>"><?php echo ($key+1);?></span>
					<div class="rank-info">
						<a href="/market/app?appid=<?php echo $app->id_app;?>" title="<?php echo $app->name_app;?>" class="name" target="_blank"><?php echo $app->name_app;?></a>
						<div class="down-count">
							<span><?php echo $app->download_time_app;?>次</span>下载
						</div>
					</div>
					<img src="<?php echo $app->icon_app;?>" alt="<?php echo $app->name_app;?>"></a>
					<div class="clearboth"></div>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
		<!-- 上升排行 -->
		<div class="week-rank">
			<div class="rank-tit" style="margin: 20px 0 10px;">
				<span class="tit">上升排行</span>
				<!--
				<ul class="rank-tab-btn">
					<li class="selected"><a href="javascript:;">软件</a></li>
					<li><a href="javascript:;">游戏</a></li>
				</ul>
				-->
				<div class="clearboth"></div>
			</div>
			<ul class="rank-tab-body rank-body">
				<?php foreach($riseList as $key=>$app):?>
				<li>
					<span class="rank-num rank-num<?php echo ($key+1);?>"><?php echo ($key+1);?></span>
					<div class="rank-info">
						<a href="/market/app?appid=<?php echo $app->id_app;?>" title="<?php echo $app->name_app;?>" class="name" target="_blank"><?php echo $app->name_app;?></a>
						<div class="down-count">
							<span><?php echo $app->download_time_app;?>次</span>下载
						</div>
					</div>
					<img src="<?php echo $app->icon_app;?>" alt="<?php echo $app->name_app;?>"></a>
					<div class="clearboth"></div>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
	<div class="clearboth"></div>
</div>