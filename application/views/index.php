<div class="part-content">
	<div class="slider box-shadow" id="slider">
		<ul>
			<li><a href="/shopping?cat=1"><img src="/assets/images/market/slider3.jpg"/></a></li>
			<li><a href="/shopping?cat=1"><img src="/assets/images/market/slider1.jpg"/></a></li>
			<li><a href="/shopping?cat=8"><img src="/assets/images/market/slider2.jpg"/></a></li>
		</ul>
	</div>
	<div class="market-ad box-shadow">
		<ul>
			<li class="ad">
				<img src="/assets/images/market/ad-market.jpg">
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
				<?php for($i=29;$i>0;$i--):?>
				<li class="app-container">
					<div class="vertical-app">
						<a href="" target="_blank" class="vertical-icon">
							<img src="/assets/images/market/icon/<?php echo $i;?>.png" alt="京东商城">
						</a>
						<a href="" class="vertical-tit-nes" title="蔻美软件" target="_blank">蔻美软件</a>
						<div class="stars center" style="display: block;background-position: 0px -96px;"></div>
						<div class="down">
							<span onclick="opendown(2034787);" style="top: 0px;">下载</span>
						</div>
					</div>
				</li>
				<?php endfor;?>
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
				<?php for($i=9;$i<21;$i++):?>
				<li class="app-container">
					<div class="vertical-app">
						<a href="" target="_blank" class="vertical-icon">
							<img src="/assets/images/market/icon/<?php echo $i;?>.png" alt="京东商城" width="72" height="72">
						</a>
						<a href="" class="vertical-tit" title="蔻美软件" target="_blank">蔻美软件</a>
						<span class="vertical-type">教育</span>
						<div class="stars center" style="display: block;background-position: 0px -96px;"></div>
						<div class="down">
							<span onclick="opendown(2034787);" style="top: 0px;">下载</span>
						</div>
					</div>
				</li>
				<?php endfor;?>
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
						<?php for($i=1;$i<10;$i++):?>
						<div class="crosswise-app app-container">
							<a href="" class="icon" target="_blank">
								<img src="/assets/images/market/icon/<?php echo $i;?>.png" width="72" height="72" alt="">
							</a>
							<div class="app-info">
								<a class="name" href="" target="_blank" title="">京东商城</a>
								<span class="down-count">下载次</span>
								<div class="stars center" ></div>
								<div class="down">
									<span onclick="opendown(2034787);" style="left: 0px;">下载</span>
								</div>
							</div>
							<div class="clearboth"></div>
						</div>
						<?php endfor;?>
					</li>
					<li class="unselected">
						<?php for($i=10;$i<19;$i++):?>
						<div class="crosswise-app app-container">
							<a href="" class="icon" target="_blank">
								<img src="/assets/images/market/icon/<?php echo $i;?>.png" width="72" height="72" alt="">
							</a>
							<div class="app-info">
								<a class="name" href="" target="_blank" title="">京东商城</a>
								<span class="down-count">下载次</span>
								<div class="stars center" ></div>
								<div class="down">
									<span onclick="opendown(2034787);" style="left: 0px;">下载</span>
								</div>
							</div>
							<div class="clearboth"></div>
						</div>
						<?php endfor;?>
					</li>
					<li class="unselected">
						<?php for($i=19;$i<28;$i++):?>
						<div class="crosswise-app app-container">
							<a href="" class="icon" target="_blank">
								<img src="/assets/images/market/icon/<?php echo $i;?>.png" width="72" height="72" alt="">
							</a>
							<div class="app-info">
								<a class="name" href="" target="_blank" title="">京东商城</a>
								<span class="down-count">下载次</span>
								<div class="stars center" ></div>
								<div class="down">
									<span onclick="opendown(2034787);" style="left: 0px;">下载</span>
								</div>
							</div>
							<div class="clearboth"></div>
						</div>
						<?php endfor;?>
					</li>
					<li class="unselected">
						<?php for($i=1;$i<10;$i++):?>
						<div class="crosswise-app app-container">
							<a href="" class="icon" target="_blank">
								<img src="/assets/images/market/icon/<?php echo $i;?>.png" width="72" height="72" alt="">
							</a>
							<div class="app-info">
								<a class="name" href="" target="_blank" title="">京东商城</a>
								<span class="down-count">下载次</span>
								<div class="stars center" ></div>
								<div class="down">
									<span onclick="opendown(2034787);" style="left: 0px;">下载</span>
								</div>
							</div>
							<div class="clearboth"></div>
						</div>
						<?php endfor;?>
					</li>
				</ul>
			</div>
		</div>
		<!-- 精选专题 -->
		<div class="part-content union">
			<div class="title">精选专题</div>
			<div class="union-left">
				<div class="union-banner">
					<a href="" target="_blank">
						<img src="/assets/images/market/gamebook.png" alt="精选专题">
					</a>
				</div>
				<div class="union-app">
					<ul>
						<?php for($i=1;$i<9;$i++):?>
						<li>
							<div class="vertical-lit-app">
								<a class="vertical-lit-icon" target="_blank" href="">
									<img src="/assets/images/market/icon/<?php echo $i;?>.png" alt="天天酷跑最新辅助">
								</a>
								<a class="vertical-lit-tit" target="_blank" href="" title="天天酷跑最新辅助" style="display: block;">天天酷跑最新辅助</a>
								<a class="install-lit-btn" href="" onclick="" style="display: none;" target="_blank">详情</a>
							</div>
						</li>
						<?php endfor;?>
					</ul>
				</div>
			</div>
			<div class="union-right">
				<div class="union-banner">
					<a href="" target="_blank">
						<img src="/assets/images/market/travel.png" alt="精选专题">
					</a>
				</div>
				<div class="union-app">
					<ul>
						<?php for($i=9;$i<17;$i++):?>
						<li>
							<div class="vertical-lit-app">
								<a class="vertical-lit-icon" target="_blank" href="">
									<img src="/assets/images/market/icon/<?php echo $i;?>.png" alt="天天酷跑最新辅助">
								</a>
								<a class="vertical-lit-tit" target="_blank" href="" title="天天酷跑最新辅助" style="display: block;">天天酷跑最新辅助</a>
								<a class="install-lit-btn" href="" onclick="" style="display: none;" target="_blank">详情</a>
							</div>
						</li>
						<?php endfor;?>
					</ul>
				</div>
			</div>
			<div class="clearboth"></div>
			<!-- 更多精选专题banner -->
			<div class="union-more-banner">
				<div class="union-banner-cell">
					<a href="" target="_blank">
						<img  src="/assets/images/market/food.png" alt="">
					</a>
				</div>
				<div class="union-banner-cell ml15">
					<a href="" target="_blank">
						<img  src="/assets/images/market/corporation.png" alt="">
					</a>
				</div>
				<div class="union-banner-cell ml15">
					<a href="" target="_blank">
						<img  src="/assets/images/market/CET.png" alt="">
					</a>
				</div>
				<div class="clearboth"></div>
			</div>
		</div>
		<div class="union-link-all">
			<a href=""><span>更多软件专题</span><i class="arrow-right"></i></a>
			<a href="" class="ml15"><span>更多游戏专题</span><i class="arrow-right"></i></a>
			<div class="clearboth"></div>
		</div>
		<!-- 分类列表 -->
		<div class="catelist">
			<dl class="clearfix">
				<dt>软件分类：</dt>
				<?php foreach($categories as $c):?>
				<dd>
					<a href="" target="_blank"><?php echo $c->name_category;?></a>
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
				<?php for($i=1;$i<8;$i++):?>
				<li>
					<span class="rank-num rank-num<?php echo $i;?>"><?php echo $i;?></span>
					<div class="rank-info">
						<a href="" title="国学经典诵读" class="name" target="_blank">国学经典诵读</a>
						<div class="down-count">
							<span>8万+</span>下载
						</div>
					</div>
					<img src="/assets/images/market/icon/<?php echo $i;?>.png" alt="国学经典诵读"></a>
					<div class="clearboth"></div>
				</li>
				<?php endfor;?>
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
				<?php for($i=1;$i<8;$i++):?>
				<li>
					<span class="rank-num rank-num<?php echo $i;?>"><?php echo $i;?></span>
					<div class="rank-info">
						<a href="" title="国学经典诵读" class="name" target="_blank">国学经典诵读</a>
						<div class="down-count">
							<span>8万+</span>下载
						</div>
					</div>
					<img src="/assets/images/market/icon/<?php echo $i;?>.png" alt="国学经典诵读"></a>
					<div class="clearboth"></div>
				</li>
				<?php endfor;?>
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
				<?php for($i=1;$i<8;$i++):?>
				<li>
					<span class="rank-num rank-num<?php echo $i;?>"><?php echo $i;?></span>
					<div class="rank-info">
						<a href="" title="国学经典诵读" class="name" target="_blank">国学经典诵读</a>
						<div class="down-count">
							<span>8万+</span>下载
						</div>
					</div>
					<img src="/assets/images/market/icon/<?php echo $i;?>.png" alt="国学经典诵读"></a>
					<div class="clearboth"></div>
				</li>
				<?php endfor;?>
			</ul>
		</div>
	</div>
	<div class="clearboth"></div>
</div>