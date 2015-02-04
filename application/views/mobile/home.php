<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <title><?=$title?></title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/mobile.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
    <script src="/assets/js/mobile.js" type="text/javascript"></script>
	<script src="/assets/js/unslider.min.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.event.swipe.js" type="text/javascript"></script>
</head>
<body scroll="no">
<div id="all">
	<div class="sider" id="sider">
		<div class="search">
			<input type="text" placeholder="搜索">
		</div>
		<input type="hidden" id="appid" value="<?php echo $_GET["appid"];?>">
		<ul class="nav clearfix">
			<?php foreach($navs as $key=>$item):?>
			<li>
				<a href="javascript:getinfo('<?php echo $item->id_nav;?>','<?php echo $item->name_nav;?>');">
					<img src="<?php echo $item->icon_nav;?>">
					<span><?php echo $item->name_nav;?></span>
				</a>
			</li>
			<?php endforeach;?>
		</ul>
		<div class="ad" id="ad_banner">
			<img id="ad_img" width="196" src="/assets/images/mobile/mobile-ad.png">
		</div>
	</div>
	<div class="main" id="main">
		<div class="header skin<?php echo $app->skin_app;?>" id="header">
			<div id="show_sider_bt" class="bt-div" onclick="show_sider()">
				<a href="javascript:void()">
					<img src="/assets/images/mobile/14.png"/>
				</a>
			</div>
			<div id="goBackSub_bt" class="bt-div" onclick="goBackSub()" style="display:none;">
				<a href="javascript:void()">
					<img src="/assets/images/cms/scroll_left.png"/>
				</a>
			</div>
			<div id="goBackCat_bt" class="bt-div" onclick="goBackCat()" style="display:none;">
				<a href="javascript:void()">
					<img src="/assets/images/cms/scroll_left.png"/>
				</a>
			</div>
			<div id="goBackUC_bt" class="bt-div" onclick="goBackUC()" style="display:none;">
				<a href="javascript:void()">
					<img src="/assets/images/cms/scroll_left.png"/>
				</a>
			</div>
			<div id="goBackUCOrders_bt" class="bt-div" onclick="goBackUCOrders()" style="display:none;">
				<a href="javascript:void()">
					<img src="/assets/images/cms/scroll_left.png"/>
				</a>
			</div>
			<div class="tit-div" id="tit_div">
				<span class="title" id="tit_con">蔻美APP首页</span>
			</div>
			<div id="malMore_bt" class="malMore-bt-div" onclick="showMallMore()" style="display:none;">
				<a href="javascript:void()">
					<img id="mmbt" src="/assets/images/cms/mallmore.png"/>
				</a>
			</div>
		</div>
		<div class="mall-more clearfix" id="mall_more">
			<a href="javascript:usercenter()" class="new-tbl-cell">
				<span class="icon icon4">个人中心</span>
				<p>个人中心</p>
			</a>
			<a href="javascript:show_cart()" id="html5_cart" class="new-tbl-cell">
				<span class="icon icon3">购物车</span>
				<p>购物车</p>
			</a>
			<a href="javascript:goHome()" class="new-tbl-cell">
				<span class="icon icon1">首页</span>
				<p>首页</p>
			</a>
		</div>
		<div class="main-body" id="main_body">
			<div class="slider" id="slider">
				<ul>
					<li><a href="/shopping?cat=1"><img class="slider_img" src="/assets/images/mobile/slider1.png"/></a></li>
					<li><a href="/shopping?cat=8"><img class="slider_img" src="/assets/images/mobile/slider2.png"/></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
</body>
</html>