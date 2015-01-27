<div class="app-category-container">
	<div class="nav-menu">
		<!-- 应用分类 -->
		<div class="softWareCateg">
			<div class="titleDiv">
				<a href="" class="title app">
					<i class="menu-icon-app"></i>应用分类
				</a>
			</div>
			<ul class="menu-junior">
				<li class=""><a href="">全部应用</a></li>
					<li class=" selected"><a href="">生活</a></li>                        
					<li class=" "><a href="">新闻</a></li>                        
					<li class=" "><a href="">娱乐</a></li>                        
					<li class=" "><a href="">体育</a></li>                        
					<li class=" "><a href="">美食佳饮</a></li>                        
					<li class=" "><a href="">旅游</a></li>                        
					<li class=" "><a href="">社交</a></li>                        
					<li class=" "><a href="">参考</a></li>                        
					<li class=" "><a href="">医疗</a></li>                        
					<li class=" "><a href="">购物</a></li>                        
					<li class=" "><a href="">音乐音频</a></li>
					<li>
						<a href="">财务</a></li>
					<li>
						<a href="">健康健身</a></li>
					<li>
						<a href="">导航</a></li>
					<li>
						<a href="">儿童</a></li>
					<li>
						<a href="">工具</a></li>
					<li>
						<a href="">教育</a></li>
					<li>
						<a href="">商务</a></li>
					<li>
						<a href="">媒体视频</a></li>
					<li>
						<a href="">天气</a></li>
					<li>
						<a href="">图书</a></li>
					<li>
						<a href="">效率</a></li>
					<li>
						<a href="">报刊杂志</a></li>
					<li>
						<a href="">政企门户</a></li>
			</ul>  
		</div>
	</div>
	<div class="app-category-main">
		<div id="sortWay"><!-- 排序方式 -->
			<div class="item clearfix">
				<span class="label">排序方式：</span>
				<ul class="l">
					<li data-sort="" class="active">相关度</li>
					<li data-sort="DownloadCount" class="">最热<i class="downIco"></i></li>
					<li data-sort="SubTime" class="">新品<i class="downIco"></i></li>
					<li data-sort="RecommandRank" class="">综合<i class="downIco"></i></li>
				</ul>
			</div>
		</div>
		<ul class="app-list clearfix">
			<?php for($i=1;$i<33;$i++):?>
			<li>
				<div class="app-info clearfix app-li">
					<a href="" target="_blank" class="app-info-icon">
						<img src="/assets/images/market/icon/<?php echo $i;?>.png" alt="微信">
					</a>
					<div class="app-info-desc">
						<a href="" target="_blank" title="微信" class="name ofh">微信</a>
						<span class="size">27.80M</span>
						<span class="download">下载 6229万+次</span>
					</div>
				</div>
			</li>
			<?php endfor;?>
		</ul>
		<div class="page-box">
			<div class="inlineblock clearfix pagin">
				<a href="" class="prev"><i></i>上一页</a>
				<a href="" class="">1</a>
				<a href="" class="">2</a>
				<a href="" class="current">3</a>
				<a href="" class="">4</a>
				<a href="" class="">5</a>
				<a href="" class="next">下一页<i></i></a>
			</div>
		</div>
	</div>
	<div class="clearboth"></div>
</div>