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
		<ul class="nav clearfix">
			<?php foreach($navs as $key=>$item):?>
			<li>
				<a href="javascript:getinfo('#con_<?php echo $key;?>','<?php echo $item->name_nav;?>');">
					<img src="<?php echo $item->icon_nav;?>">
					<span><?php echo $item->name_nav;?></span>
				</a>
				<MonkeyKing style="display:none;" id="con_<?php echo $key;?>">
				<?php echo $item->type_nav;?>
				</MonkeyKing>
			</li>
			<?php endforeach;?>
		</ul>
		<div class="ad" id="ad_banner">
			<img id="ad_img" width="196" src="/assets/images/mobile/mobile-ad.png">
		</div>
	</div>
	<div class="main" id="main">
		<div class="header" id="header">
			<div class="bt-div" onclick="show_sider()">
				<a href="javascript:void()">
					<img src="/assets/images/mobile/14.png"/>
				</a>
			</div>
			<div class="tit-div" id="tit_div">
				<span class="title" id="tit_con">蔻美APP首页</span>
			</div>
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