<div class="app-category-container">
	<div class="nav-menu">
		<!-- 应用分类 -->
		<div class="softWareCateg">
			<div class="titleDiv">
				<a href="#" class="title app">
					<i class="menu-icon-app"></i><?php echo lang('market_home_appscategories');?>
				</a>
			</div>
			<ul class="menu-junior">
				<li class="<?php echo !isset($_GET["cid"])?"selected":"";?>"><a href="/market/appcategory"><?php echo lang('market_home_allapps');?></a></li>
				<?php foreach($categories as $cid=>$cat):?>
				<li class="<?php echo (isset($_GET["cid"]) && $_GET["cid"]==$cid)?"selected":"";?>"><a href="/market/appcategory?cid=<?php echo $cid;?>"><?php echo $cat;?></a></li>
				<?php endforeach;?>
			</ul>  
		</div>
	</div>
	<div class="app-category-main">
		<div id="sortWay"><!-- 排序方式 -->
			<div class="item clearfix">
				<span class="label"><?php echo lang('market_home_sortby');?>：</span>
				<ul class="l" id="orderType">
					<li data-sort="correlation" class="<?php echo (!isset($_GET["order"]) || $_GET["order"]=="correlation")?"active":"";?>"><?php echo lang('market_home_correlation');?></li>
					<li data-sort="hot" class="<?php echo (isset($_GET["order"]) && $_GET["order"]=="hot")?"active":"";?>"><?php echo lang('market_home_hot');?><i class="downIco"></i></li>
					<li data-sort="new" class="<?php echo (isset($_GET["order"]) && $_GET["order"]=="new")?"active":"";?>"><?php echo lang('market_home_new');?><i class="downIco"></i></li>
					<li data-sort="comprehension" class="<?php echo (isset($_GET["order"]) && $_GET["order"]=="comprehension")?"active":"";?>"><?php echo lang('market_home_comprehensive');?><i class="downIco"></i></li>
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
						<span class="download"><?php echo lang('market_home_download');?> <?php echo $app->download_time_app;?><?php echo lang('market_home_times');?></span>
					</div>
				</div>
			</li>
			<?php endforeach;?>
		</ul>
		<div class="page-box">
			<div class="inlineblock clearfix pagin">
				<a href="<?php echo $prev_link=="no"?"javascript:void()":$prev_link;?>" class="prev"><i></i><?php echo lang('market_home_previouspage');?></a>
				<?php for($i=$start;$i<=$end;$i++):?>
				<a href="<?php echo $jump_link.$i;?>" <?php echo $i==$page?'class="current"':"";?>><?php echo $i;?></a>
				<?php endfor;?>
				<a href="<?php echo $next_link=="no"?"javascript:void()":$next_link;?>" class="next"><?php echo lang('market_home_nextpage');?><i></i></a>
			</div>
		</div>
	</div>
	<div class="clearboth"></div>
</div>