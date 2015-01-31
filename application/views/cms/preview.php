<div class="app-warp">
	<div class="h2-wrap">
		<h2>
			<a class="en-tab e-n-tab-l goto" href="/cms/index/editapp?appid=<?php echo $appid;?>">APP编辑</a>
			<a class="en-tab e-n-tab-c goto" href="/cms/index/navedit?appid=<?php echo $appid;?>">APP导航设计</a>
			<span class="en-tab e-n-tab-r active">预览</span>
		</h2>
	</div>
    <div class="app-con">
		<div id="left" class="app-side">
		</div>
		<div class="preview-div">
			<iframe src="/mobile/home?appid=<?php echo $appid;?>" frameBorder="0" width="300" scrolling="no" height="533"></iframe>
		</div>
		
		<!--导航编辑 对话框 end-->
	</div>
</div>

<div id="bkDiv" class="bk-div"></div>
<link rel="stylesheet" href="/assets/kindEditor/themes/default/default.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/editnav.js" type="text/javascript"></script>