<div class="app-category-container">
	<div class="nav-menu">
		<!-- 应用分类 -->
		<div class="softWareCateg">
			<div class="titleDiv">
				<a href="#" class="title app">
					<i class="menu-icon-app"></i>应用分类
				</a>
			</div>
			<ul class="menu-junior">
				<li class="<?php echo !isset($_GET["cid"])?"selected":"";?>"><a href="/market/appcategory">全部应用</a></li>
				<?php foreach($categories as $cid=>$cat):?>
				<li class="<?php echo (isset($_GET["cid"]) && $_GET["cid"]==$cid)?"selected":"";?>"><a href="/market/appcategory?cid=<?php echo $cid;?>"><?php echo $cat;?></a></li>
				<?php endforeach;?>
			</ul>  
		</div>
	</div>
	<div class="app-category-main">
		<div id="sortWay"><!-- 排序方式 -->
			<div class="item clearfix">
				<span class="label">排序方式：</span>
				<ul class="l" id="orderType">
					<li data-sort="correlation" class="<?php echo (!isset($_GET["order"]) || $_GET["order"]=="correlation")?"active":"";?>">相关度</li>
					<li data-sort="hot" class="<?php echo (isset($_GET["order"]) && $_GET["order"]=="hot")?"active":"";?>">最热<i class="downIco"></i></li>
					<li data-sort="new" class="<?php echo (isset($_GET["order"]) && $_GET["order"]=="new")?"active":"";?>">新品<i class="downIco"></i></li>
					<li data-sort="comprehension" class="<?php echo (isset($_GET["order"]) && $_GET["order"]=="comprehension")?"active":"";?>">综合<i class="downIco"></i></li>
				</ul>
				<input type="hidden" id="select_link" value="<?php echo $select_link;?>">
			</div>
		</div>
		<ul class="app-list clearfix">
			<?php foreach($apps as $app):?>
			<li>
				<div class="app-info clearfix app-li">
					<a href="/market/app?appid=<?php echo $app->id_app;?>" target="_blank" class="app-info-icon">
						<img src="<?php echo $app->icon_app;?>" alt="<?php echo $app->name_app;?>">
					</a>
					<div class="app-info-desc">
						<a href="" target="_blank" title="<?php echo $app->name_app;?>" class="name ofh"><?php echo $app->name_app;?></a>
						<span class="size">27.80M</span>
						<span class="download">下载 <?php echo $app->download_time_app;?>次</span>
					</div>
				</div>
			</li>
			<?php endforeach;?>
		</ul>
		<div class="page-box">
			<div class="inlineblock clearfix pagin">
				<a href="<?php echo $prev_link=="no"?"javascript:void()":$prev_link;?>" class="prev"><i></i>上一页</a>
				<?php for($i=$start;$i<=$end;$i++):?>
				<a href="<?php echo $jump_link.$i;?>" <?php echo $i==$page?'class="current"':"";?>><?php echo $i;?></a>
				<?php endfor;?>
				<a href="<?php echo $next_link=="no"?"javascript:void()":$next_link;?>" class="next">下一页<i></i></a>
			</div>
		</div>
	</div>
	<div class="clearboth"></div>
</div>