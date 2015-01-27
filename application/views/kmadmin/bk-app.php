<div class="padding10">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv">
			<div onclick="GetTypeApp(this.id)" id="all" class="left  active">
				全部
			</div>
			<div onclick="GetTypeApp(this.id)" id="delete" class="right">
				我的回收站
			</div>
			<div class="clear">
			</div>
		</div>
		<a href="###" class="btn creatAPP" id="CreateAppBtn" onclick="CreateAPP();">我要制作APP</a>
		<div class="clear">
		</div>
	</div>
	<div id="applistDiv" class="app-list">
		<ul>
			<li id="">
				<div class="app-info">
					<div class="app-top">
						<div class="side-left">
							<div>
								<img id="" name="" src="/assets/images/cms/72.png" alt="">
							</div>
							<div id="" style="float: right;margin-top: -35px;z-index: 2;"><img style="z-index: 2;position: relative;" src="/assets/images/cms/tuwen.png" alt="">
							</div>
						</div>
						<dl>
							<dt>
								<a href="#nogo" id="">测试</a>
							</dt>
							<dd>
								<span>应用状态：</span>
								<a href="" target="_blank" style="color: #5F7392;text-decoration: underline;">待发布(点击查看)</a>
							</dd>
							<dd>
								<span class="">更新于：</span>
								2014-12-08
							</dd>
							<dd>
								<span class="">下载量：</span>
								1次
							</dd>
						</dl>
						<div class="code">
							<img id="" alt="" style="width:100px;height:100px;" src="/assets/images/cms/erwei.png">
						</div>
					</div>
					<div class="btn-area">
						<a id="" href="#" class="btn60" onclick="" style="margin-right: 20px;">设置</a>
						<a id="" href="#" class="btn60" style="margin-right: 20px;">删除</a>
						<a id="" name="测试" href="#" class="btn60 recreate" onclick="appcreate(this)">重新生成</a>
						<a id="" name="测试" href="#" class="btn80s publish" onclick="AuditApp(this)" style="margin-right: 20px;">发布到市场</a>
						<a class="ico-help" href="###" onclick="AuditHelpOpen()" style="margin-right: 20px;"></a>
						<a id="" href="#" class="" onclick="" style="cursor: pointer; margin-right: 10px; float: right; text-decoration: underline; color: rgb(82, 102, 127);">地址下载及推广</a>
						<input type="hidden" id="" value="">
					</div>
					<div class="app-ft">
						APP下载地址：
						<a id="" url="" href="#" style="cursor:pointer; margin-right:10px;" onclick="DownloadTitle(this);">安卓 V6.0.1下载</a>
						<a id="-a2b7-4196-b7c9-8949d83c097e" url="" href="#" style="cursor:pointer; margin-right:10px;" onclick="DownloadTitle(this);">IOS V4.2.1下载</a>
						<a id="" href="#" style="cursor:pointer; margin-right:20px;float: right;" onclick="GoToSummaryPage(this);">查看统计</a>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<div class="table-ft">
		<div class="fr" id="totalCount">
			<div>
				<span style="vertical-align:middle；">共2个应用</span>
				<a href="###" class="btn-app" id="CreateAppBtn" onclick="CreateAPP();">我要制作APP</a>
				<div></div>
			</div>
		</div>
		<div class="page" id="PageAreaDiv">
			<a title="上一页" href="javascript:void(0);" onclick="TurnPage('back');">上一页</a>
			<a id="p1" title="1" href="javascript:void(0);" onclick="TurnPage(1);" class="active" style="background-color: rgb(206, 210, 221);">1</a>
			<a title="下一页" href="javascript:void(0);" onclick="TurnPage('next');">下一页</a>
		</div>
	</div>
</div>
