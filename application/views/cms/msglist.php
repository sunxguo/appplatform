<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv">
			<div onclick="location.href='/cms/index/message?type=2'" class="left <?php echo (!isset($_GET['type']) || $_GET['type']==2)?"active":""?>" style="width:150px;">
				<?php echo lang("cms_pushmsg_deliverytotheclient");?>
			</div>
			<div onclick="location.href='/cms/index/message?type=3'" class="right <?php echo (isset($_GET['type']) && $_GET['type']==3)?"active":""?>" style="width:150px;">
				<?php echo lang("cms_pushmsg_senttoauser");?>
			</div>
			<div class="clear">
			</div>
		</div>
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectmsg('<?php echo $select_link;?>')" class="btn80"><?php echo lang("cms_content_search");?></a>
			<input type="hidden" id="type" value="<?php echo !isset($_GET['type'])?0:$_GET['type'];?>">
		<a href="/cms/index/sendmsg" class="msg-btn"><?php echo lang("cms_pushmsg_sendmessage");?></a>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<?php if(isset($_GET['type']) && $_GET['type']==3):?>
				<th style="width:200px;"><?php echo lang("cms_pushmsg_receiver");?></th>
				<?php endif;?>
				<th style="width:400px;"><?php echo lang("cms_pushmsg_title");?></th>
				<th style="width:200px;"><?php echo lang("cms_pushmsg_sendtime");?></th>
				<?php if(isset($_GET['type']) && $_GET['type']==2):?>
				<th style="width:300px;"><?php echo lang("cms_pushmsg_app");?></th>
				<th style="width:150px;"><?php echo lang("cms_pushmsg_device");?></th>
				<?php endif;?>
				<?php if(isset($_GET['type']) && $_GET['type']==3):?>
				<th style="width:140px;"><?php echo lang("cms_pushmsg_whetherhavetosee");?></th>
				<?php endif;?>
			</tr>
		</thead>
		<tbody>
			<?php foreach($message as $m):?>
			<tr>
				<?php if(isset($_GET['type']) && $_GET['type']==3):?>
				<td><?php echo $m->to_message==0?lang("cms_pushmsg_allusers"):$m->username_merchant;?></td>
				<?php endif;?>
				<td class="msgtitle" msgid="<?php echo $m->id_message;?>">
					<a href="javascript:void()"><?php echo $m->title_message;?></a>
				</td>
				<td><?php echo $m->time_message;?></td>
				<?php if(isset($_GET['type']) && $_GET['type']==2):?>
				<td><?php echo "id:".$m->app->id_app."【".$m->app->name_app."】";?></td>
				<td><?php
						if($m->device_message==0) echo lang("cms_pushmsg_alldevices");
						elseif($m->device_message==1) echo lang("cms_pushmsg_androiddevices");
						else echo lang("cms_pushmsg_iosdevices");
				?></td>
				<?php endif;?>
				<?php if(isset($_GET['type']) && $_GET['type']==3):?>
				<td><?php echo $m->check_message?lang("cms_pushmsg_haveviewed"):lang("cms_pushmsg_didnotview");?></td>
				<?php endif;?>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<div class="page-div">
		<span class=""><?php echo lang("cms_content_total");?><?php echo $amount;?><?php echo lang("cms_content_totalunit");?></span>
		<span onclick="location.href='<?php echo $first_link=="no"?"#":$first_link;?>'" class="page-bt first <?php echo $first_link=="no"?"last-disabled":"";?>" title="<?php echo lang('cms_content_firstpage');?>"><?php echo lang('cms_content_firstpage');?></span>
		<span onclick="location.href='<?php echo $prev_link=="no"?"#":$prev_link;?>'" class="page-bt prev <?php echo $prev_link=="no"?"prev-disabled":"";?>" title="<?php echo lang('cms_content_previouspage');?>"><?php echo lang('cms_content_previouspage');?></span>
		<span class="showpagenum"><?php echo $page;?>/<?php echo $page_amount;?></span>
		<span onclick="location.href='<?php echo $next_link=="no"?"#":$next_link;?>'" class="page-bt next <?php echo $next_link=="no"?"next-disabled":"";?>" title="<?php echo lang('cms_content_nextpage');?>"><?php echo lang('cms_content_nextpage');?></span>
		<span onclick="location.href='<?php echo $last_link=="no"?"#":$last_link;?>'" class="page-bt last <?php echo $last_link=="no"?"last-disabled":"";?>" title="<?php echo lang('cms_content_lastpage');?>"><?php echo lang('cms_content_lastpage');?></span>
		<span class="jump">
			<?php echo lang('cms_content_to');?>
			<input id="page_num" type="text" class="jumpinput">
			<?php echo lang('cms_content_page');?>
		</span>
		<button class="jumpbt" onclick="jump_page('<?php echo $jump_link;?>')"><?php echo lang('cms_content_jump');?></button>
	</div>
</div>
<div id="msg_content" class="showinfo">
	<div class="dialog-hd"><?php echo lang('cms_pushmsg_infocontent');?></div>
	<div class="itemPar" id="msgwait"><img src="/assets/images/cms/loading.gif" width="60" height="60"></div>
	<div class="itemPar" id="msgdata"></div>
</div>
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script src="/assets/js/cms.js" type="text/javascript"></script>