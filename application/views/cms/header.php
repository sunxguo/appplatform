<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/bk.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/cms.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
    <script src="/assets/js/db_handler.js" type="text/javascript"></script>
	<script src="/assets/js/bk.js" type="text/javascript"></script>
</head>
<body>
    <div class="header-cms">
		<a  class="km-logo" href="">
            <img title="<?php echo WEBSITE_NAME;?>" class="logo-cms" src="/assets/images/cms/logo-cms.png" alt="网站logo" />
		</a>
        <ul class="menu-cms">
            <li class="name">
                <img id="userPhoto" src="<?php echo $_SESSION['useravatar']==""?"/assets/images/cms/defaulthead.png":$_SESSION['useravatar'];?>" width="35" height="35">
				<span id="userShowName"><?php echo $_SESSION['username'];?></span>
			</li>
			<li class="message">
				<a href="#nogo" title="消息" id="js-openmsg">
                <img src="/assets/images/cms/ico_mail.png" width="24" height="24"></a>
				<span id="unreadMesNumber"></span>
			</li>
			<li class="logout">
				<a href="/cms/index/logout" title="退出">退出</a>
			</li>
			<li class="language">
				中文 <span>|</span>
				<a href="" target="_blank" title="切换英文版">English</a>
			</li>
        </ul>
    </div>
	<div class="main-bk <?php echo isset($showSlider) && $showSlider?"":"extend";?>">
	<?php 
		if(isset($showSlider) && $showSlider && $_SESSION['usertype']=="merchant"){
			require("slider.php");
		}
	?>