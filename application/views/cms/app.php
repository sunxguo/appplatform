<div class="padding10">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv">
			<div onclick="location.href='/cms/index/app'" id="all" class="left <?php echo !isset($_GET['type'])?"active":""?>">
				全部
			</div>
			<div onclick="location.href='/cms/index/app?type=del'" id="delete" class="right <?php echo isset($_GET['type'])?"active":""?>">
				我的回收站
			</div>
			<div class="clear">
			</div>
		</div>
		<a href="/cms/index/createapp" class="btn creatAPP" target="_blank">我要制作APP</a>
		<div class="clear">
		</div>
	</div>
	<div id="applistDiv" class="app-list">
		<ul>
			<?php foreach($apps as $item):?>
			<li id="">
				<div class="app-info">
					<div class="app-top">
						<div class="side-left">
							<div>
								<img id="" name="" src="<?php echo $item->icon_app;?>" alt="<?php echo $item->name_app;?>" width="72" height="72">
							</div>
							<!--
								<div id="" style="float: right;margin-top: -35px;z-index: 2;"><img style="z-index: 2;position: relative;" src="/assets/images/cms/tuwen.png" alt="">
								</div>
							-->
						</div>
						<dl>
							<dt>
								<a href="#nogo" id=""><?php echo $item->name_app;?></a>
							</dt>
							<dd>
								<span>应用状态：</span>
								<a href="" target="_blank" style="color: #5F7392;text-decoration: underline;">
									<?php echo $item->state_app_cn;?>
								(点击查看)</a>
							</dd>
							<dd>
								<span class="">更新于：</span>
								<?php echo date("Y-m-d",strtotime($item->update_time_app));?>
							</dd>
							<dd>
								<span class="">下载量：</span>
								<?php echo $item->download_time_app;?>次
							</dd>
						</dl>
						<?php if($item->state_app!=7 && $item->state_app>1):?>
						<div class="code">
							<img id="" alt="" style="width:100px;height:100px;" src="<?php echo $item->two_code_app;?>">
						</div>
						<?php endif;?>
					</div>
					<div class="btn-area">
					<?php if($item->state_app!=7):?>
						<a id="" href="/cms/index/editapp?appid=<?php echo $item->id_app;?>" class="btn60" target="_blank" style="margin-right: 20px;">设计</a>
						<a id="" href="Javascript:modify('app_drop','<?php echo $item->id_app;?>','down');" class="btn60" style="margin-right: 20px;">删除</a>
						<a id="" name="" href="/cms/index/publish?appid=<?php echo $item->id_app;?>" class="btn60 recreate">内容管理</a>
						<a id="" name="" href="#" class="btn80s publish" onclick="AuditApp(this)" style="margin-right: 20px;">发布到市场</a>
						<a class="ico-help" href="###" onclick="AuditHelpOpen()" style="margin-right: 20px;"></a>
						<?php if($item->state_app!=7 && $item->state_app>1):?>
						<a id="" href="#" class="" onclick="" style="cursor: pointer; margin-right: 10px; float: right; text-decoration: underline; color: rgb(82, 102, 127);">地址下载及推广</a>
						<?php endif;?>
					<?php else:?>
						<a id="" href="Javascript:modify('app_validity','<?php echo $item->id_app;?>','up');" class="btn60" style="margin-right: 20px;">清除</a>
						<a id="" href="Javascript:modify('app_drop','<?php echo $item->id_app;?>','up');" class="btn60" style="margin-right: 20px;">恢复</a>
					<?php endif;?>
					</div>
					<div class="app-ft">
						APP下载地址：
						<?php if($item->state_app!=7 && $item->state_app>1):?>
						<a href="<?php echo $item->android_link_app;?>" style="cursor:pointer; margin-right:10px;" onclick="DownloadTitle(this);">安卓 app下载</a>
						<a href="<?php echo $item->ios_link_app;?>" style="cursor:pointer; margin-right:10px;" onclick="DownloadTitle(this);">IOS app下载</a>
						<a id="" href="#" style="cursor:pointer; margin-right:20px;float: right;" onclick="GoToSummaryPage(this);">查看统计</a>
						<?php elseif($item->state_app!=7):?>
						等待排队生成中，大约还有<?php echo $item->left_time_app;?>分钟
						<?php endif;?>
					</div>
				</div>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
	<div class="table-ft">
		<div class="fr" id="totalCount">
			<div>
				<span style="vertical-align:middle；">共<?php echo $amount;?>个应用</span>
				<a href="/cms/index/createapp" class="btn creatAPP" target="_blank">我要制作APP</a>
				<div></div>
			</div>
		</div>
		<div class="page" id="PageAreaDiv">
			<a title="上一页" href="<?php echo $pre_link;?>">上一页</a>
			<?php for($i=1;$i<=$page_amount;$i++):?>
			<a href="<?php echo isset($_GET['page']) && $_GET['page']==$i?"javascript:void(0)":"/cms/index/app?page=".$i;?>" <?php echo (!isset($_GET['page']) && $i==1) || (isset($_GET['page']) && $_GET['page']==$i)?"class='active'":"";?> style="background-color: rgb(206, 210, 221);"><?php echo $i;?></a>
			<?php endfor;?>
			<a title="下一页" href="<?php echo $next_link;?>">下一页</a>
		</div>
	</div>
</div>
<script src="/assets/js/manage.js" type="text/javascript"></script>