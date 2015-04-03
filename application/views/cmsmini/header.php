<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/bk.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/cms.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
    <script src="/assets/js/db_handler.js" type="text/javascript"></script>
	<script src="/assets/js/bk.js" type="text/javascript"></script>
</head>
<body>
    <div class="header-cms">
		<a  class="km-logo" href="/">
            <img title="<?php echo WEBSITE_NAME;?>" class="logo-cms" src="/assets/images/cms/logo-cms.png" alt="网站logo" />
		</a>
		<a href="/cmsmini/module" class="panel <?php echo isset($panelModule) && $panelModule?'current':'';?>">模组</a>
		<a href="/cmsmini/index" class="panel <?php echo isset($panelApp) && $panelApp?'current':'';?>">App</a>
        <ul class="menu-cms">
            <li class="name">
                <img id="userPhoto" src="<?php echo $_SESSION['useravatar']==""?"/assets/images/cms/defaulthead.png":$_SESSION['useravatar'];?>" width="35" height="35">
				<span id="userShowName"><?php echo $_SESSION['username'];?></span>
			</li>
			<li class="message">
				<a href="/cms/index/message?type=2" title="<?php echo lang('cms_user_message');?>" id="js-openmsg">
                <img src="/assets/images/cms/ico_mail.png" width="24" height="24"></a>
				<span id="unreadMesNumber"></span>
			</li>
			<li class="logout">
				<a href="/cms/index/logout" title="<?php echo lang('cms_user_logout');?>"><?php echo lang('cms_user_logout');?></a>
			</li>
			<li class="language">
				<a href="javascript:language('zh_cn')" class="<?php echo (!isset($_SESSION['language']) || $_SESSION['language']=="zh_cn")?"active":""?>" title="切换简体中文版">简中</a> <span>|</span>
				<a href="javascript:language('tw_cn')" class="<?php echo (!isset($_SESSION['language']) || $_SESSION['language']=="tw_cn")?"active":""?>" title="切換繁體中文版">繁中</a> <span>|</span>
				<a href="javascript:language('english')" class="<?php echo (!isset($_SESSION['language']) || $_SESSION['language']=="english")?"active":""?>" title="Switch to the English version">English</a>
			</li>
        </ul>
    </div>
	<div class="main-bk <?php echo isset($showSlider) && $showSlider?"":"extend";?>">
	<?php 
		if(isset($showSlider) && $showSlider && $_SESSION['usertype']=="merchant"){
			if(isset($panelApp) && $panelApp) require("slider.php");
			else require("moduleSider.php");
		}
	?>