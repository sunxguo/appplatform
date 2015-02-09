<div class="padding10">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv">
			<div onclick="location.href='/cms/index/app'" id="all" class="left <?php echo !isset($_GET['type'])?"active":""?>">
				<?php echo lang('cms_internal_all');?>
			</div>
			<div onclick="location.href='/cms/index/app?type=del'" id="delete" class="right <?php echo isset($_GET['type'])?"active":""?>">
				<?php echo lang('cms_internal_recyclebin');?>
			</div>
			<div class="clear">
			</div>
		</div>
		<a href="/cms/index/createapp" class="btn creatAPP" target="_blank"><?php echo lang('cms_app_createmyapp');?></a>
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
								<a href="/market/app?appid=<?php echo $item->id_app;?>" target="_blank"><?php echo $item->name_app;?></a>
							</dt>
							<dd>
								<span><?php echo lang('cms_app_appstate');?>：</span>
								<a href="" target="_blank" style="color: #5F7392;text-decoration: underline;">
									<?php echo $item->state_app_cn;?>
								(<?php echo lang('cms_app_clicktoview');?>)</a>
							</dd>
							<dd>
								<span class=""><?php echo lang('cms_app_updatetime');?>：</span>
								<?php echo date("Y-m-d",strtotime($item->update_time_app));?>
							</dd>
							<dd>
								<span class=""><?php echo lang('cms_app_downloadtime');?>：</span>
								<?php echo $item->download_time_app;?><?php echo lang('cms_app_downloadtimeunit');?>
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
						<a id="" href="/cms/index/editapp?appid=<?php echo $item->id_app;?>" class="btn60" target="_blank" style="margin-right: 20px;"><?php echo lang('cms_button_design');?></a>
						<a id="" href="Javascript:modify('app_drop','<?php echo $item->id_app;?>','down');" class="btn60" style="margin-right: 20px;"><?php echo lang('cms_button_delete');?></a>
						<a id="" name="" href="/cms/index/publish?appid=<?php echo $item->id_app;?>" class="btn60 recreate"><?php echo lang('cms_button_content');?></a>
						<a id="" name="" href="/cms/index/publishapp?appid=<?php echo $item->id_app;?>" class="btn80s publish" style="margin-right: 20px;"><?php echo lang('cms_button_release');?></a>
						<a class="ico-help" href="###" onclick="AuditHelpOpen()" style="margin-right: 20px;"></a>
						<?php if($item->state_app!=7 && $item->state_app>1):?>
						<a target="_blank" href="/market/app?appid=<?php echo $item->id_app;?>" class="" onclick="" style="cursor: pointer; margin-right: 10px; float: right; text-decoration: underline; color: rgb(82, 102, 127);"><?php echo lang('cms_app_downloadlink');?></a>
						<?php endif;?>
					<?php else:?>
						<a id="" href="Javascript:modify('app_validity','<?php echo $item->id_app;?>','up');" class="btn60" style="margin-right: 20px;"><?php echo lang('cms_app_clear');?></a>
						<a id="" href="Javascript:modify('app_drop','<?php echo $item->id_app;?>','up');" class="btn60" style="margin-right: 20px;"><?php echo lang('cms_app_restore');?></a>
					<?php endif;?>
					</div>
					<div class="app-ft">
						<?php echo lang('cms_app_appdownloadlink');?>：
						<?php if($item->state_app!=7 && $item->state_app>1):?>
						<a href="<?php echo $item->android_link_app;?>" style="cursor:pointer; margin-right:10px;" onclick="DownloadTitle(this);"><?php echo lang('cms_app_appandroiddownloadlink');?></a>
						<a href="<?php echo $item->ios_link_app;?>" style="cursor:pointer; margin-right:10px;" onclick="DownloadTitle(this);"><?php echo lang('cms_app_appiosdownloadlink');?></a>
						<a href="/cms/index/publish?appid=<?php echo $item->id_app;?>" style="cursor:pointer; margin-right:20px;float: right;" onclick="GoToSummaryPage(this);"><?php echo lang('cms_app_viewstatistics');?></a>
						<?php elseif($item->state_app!=7):?>
						<?php echo lang('cms_app_waitforgenerating');?> <?php echo $item->left_time_app;?> <?php echo lang('cms_app_minute');?>
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
				<span style="vertical-align:middle;margin-right:10px;"><?php echo lang('cms_app_total');?> <?php echo $amount;?> <?php echo lang('cms_app_countapp');?></span>
				<a href="/cms/index/createapp" class="btn creatAPP" target="_blank"><?php echo lang('cms_app_createmyapp');?></a>
				<div></div>
			</div>
		</div>
		<div class="page" id="PageAreaDiv">
			<a title="<?php echo lang('cms_app_previouspage');?>" href="<?php echo $pre_link;?>"><?php echo lang('cms_app_previouspage');?></a>
			<?php for($i=1;$i<=$page_amount;$i++):?>
			<a href="<?php echo isset($_GET['page']) && $_GET['page']==$i?"javascript:void(0)":"/cms/index/app?page=".$i;?>" <?php echo (!isset($_GET['page']) && $i==1) || (isset($_GET['page']) && $_GET['page']==$i)?"class='active'":"";?> style="background-color: rgb(206, 210, 221);"><?php echo $i;?></a>
			<?php endfor;?>
			<a title="<?php echo lang('cms_app_nextpage');?>" href="<?php echo $next_link;?>"><?php echo lang('cms_app_nextpage');?></a>
		</div>
	</div>
</div>
<script src="/assets/js/manage.js" type="text/javascript"></script>