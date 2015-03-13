<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css">
	<link rel="stylesheet" href="/assets/css/menu.css" type="text/css">
	<link rel="stylesheet" href="/assets/css/mall.css" type="text/css">
	<link rel="stylesheet" href="/assets/css/market.css" type="text/css">
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
    <script src="/assets/js/menu.js" type="text/javascript"></script>
    <script src="/assets/js/market.js" type="text/javascript"></script>
    <script src="/assets/js/unslider.min.js" type="text/javascript"></script>
    <script src="/assets/js/jquery.backgroundpos.js" type="text/javascript"></script>
</head>
<body>
    <div class="header">
        <ul class="menu">
            <li class="current first"><a href="/" target="_self"><?php echo lang('market_home_home');?></a></li>
            <li><a href="/market/appunion" target="_self"><?php echo lang('market_home_special');?></a></li>
            <li class="li_3"><a class="noclick" href="/market/appcategory" target="_blank"><?php echo lang('market_home_popularcategories');?></a>
                <dl class="li_3_content">
                    <dt></dt>
                    <dd><a href="/market/appcategory?cid=7" target="_blank"><span><?php echo lang('market_home_socialactivity');?></span></a></dd>
                    <dd><a href="/market/appcategory?cid=16" target="_blank"><span><?php echo lang('market_home_tool');?></span></a></dd>
                    <dd class="lastItem"><a href="/market/appcategory?cid=10" target="_blank"><span><?php echo lang('market_home_shopping');?></span></a></dd>
                </dl>
            </li>
            <li class=""><a class="noborder " href="/cms/index/login" target="_self"><?php echo lang('market_home_platform');?></a></li>
        </ul>
        <a href="/">
            <img title="<?php echo lang('market_website_name');?>" class="km_logo" src="/assets/images/index/km-logo.png" alt="网站logo" />
		</a>
        <p class="language">
			<?php if (isset($_SESSION['language']) && $_SESSION['language']=="zh_cn"):?>
				简中
			<?php else:?>
				<a href="javascript:language('zh_cn')" title="切换简体中文版">简中</a>
			<?php endif;?><span>|</span>
			
			<?php if (isset($_SESSION['language']) && $_SESSION['language']=="tw_cn"):?>
				繁中
			<?php else:?>
				<a href="javascript:language('tw_cn')" title="切換繁體中文版">繁中</a>
			<?php endif;?><span>|</span>
			
			<?php if (isset($_SESSION['language']) && $_SESSION['language']=="english"):?>
				English
			<?php else:?>
				<a href="javascript:language('english')" title="Switch to the English version">English</a>
			<?php endif;?>
		</p>
    </div>
	<div class="main">