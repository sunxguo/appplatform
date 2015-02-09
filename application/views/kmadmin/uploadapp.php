<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>上传app</title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/bk.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/admin.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
</head>
<body>
<div class="padding10 contentlist">
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:80px;">图标</th>
				<th style="width:100px;">ID</th>
				<th style="width:150px;">名称</th>
				<th style="width:130px;">商户</th>
				<th style="width:130px;">启动图</th>
				<th style="width:150px;">最后更新时间</th>
				<th style="width:100px;">下载次数</th>
				<th style="width:210px;">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($apps as $a):?>
			<tr>
				<td><img class="appicon" src="<?php echo $a->icon_app;?>"/></td>
				<td><?php echo $a->id_app;?></td>
				<td><a href="/market/app?appid=<?php echo $a->id_app;?>" target="_blank" title="点击查看详情"><?php echo $a->name_app;?></a></td>
				<td><?php echo $a->username_merchant;?></td>
				<td><img class="appicon" src="<?php echo $a->launch_app;?>"></td>
				<td><?php echo $a->update_time_app;?></td>
				<td><?php echo $a->download_time_app;?></td>
				<td>
					<a class="del-essay" href="javascript:app_upload_click('<?php echo $a->id_app;?>','android','<?php echo $a->username_merchant;?>','<?php echo $a->id_app;?>');">上传APK</a>
					<a class="del-essay" href="javascript:app_upload_click('<?php echo $a->id_app;?>','ios','<?php echo $a->username_merchant;?>','<?php echo $a->id_app;?>');">上传ipa</a>
				</td>
			</tr>
			<?php endforeach;?>
			<form id="uploadAppForm" method="post" action="/kmadmin/uploadapp/upload" enctype="multipart/form-data">
				<input onchange="return uploadapp()" name="file" type="file" id="appFile" style="display:none;">
				<input name="apptype" id="apptype" type="hidden">
				<input name="appid" id="appid" type="hidden">
				<input name="merchant" id="merchant" type="hidden">
			</form>
		</tbody>
	</table>
</div>
<script src="/assets/js/uploadapp.js" type="text/javascript"></script>
<script src="/assets/js/jquery.form.js" type="text/javascript"></script>
</body>
</html>