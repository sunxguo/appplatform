<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv">
			<div onclick="location.href='/kmadmin/admin/message?type=0'" class="left <?php echo (!isset($_GET['type']) || $_GET['type']==0)?"active":""?>" style="width:150px;">
				推送到客户端
			</div>
			<div onclick="location.href='/kmadmin/admin/message?type=1'" class="right <?php echo (isset($_GET['type']) && $_GET['type']==1)?"active":""?>" style="width:150px;">
				发送到商户
			</div>
			<!--
			<div onclick="location.href='/kmadmin/admin/message?type=2'" class="center <?php echo (isset($_GET['type']) && $_GET['type']==2)?"active":""?>">
				商户推送到客户端
			</div>
			<div onclick="location.href='/kmadmin/admin/message?type=3'" class="right <?php echo (isset($_GET['type']) && $_GET['type']==3)?"active":""?>">
				商户发送到用户
			</div>
			-->
			<div class="clear">
			</div>
		</div>
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectmsg('<?php echo $select_link;?>')" class="btn80">搜索</a>
			<input type="hidden" id="type" value="<?php echo !isset($_GET['type'])?0:$_GET['type'];?>">
		<a href="/kmadmin/admin/sendmsg" class="msg-btn">发送消息</a>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<?php if(isset($_GET['type']) && $_GET['type']==1):?>
				<th style="width:200px;">接收者</th>
				<?php endif;?>
				<th style="width:350px;">标题</th>
				<th style="width:180px;">发送时间</th>
				<th style="width:100px;">设备</th>
				<th style="width:140px;">是否已查看</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($message as $m):?>
			<tr>
				<?php if(isset($_GET['type']) && $_GET['type']==1):?>
				<td><?php echo $m->to_message==0?"所有商户":$m->username_merchant;?></td>
				<?php endif;?>
				<td class="msgtitle" msgid="<?php echo $m->id_message;?>">
					<a href="javascript:void()"><?php echo $m->title_message;?></a>
				</td>
				<td><?php echo $m->time_message;?></td>
				<td><?php
						if($m->device_message==0) echo "所有设备";
						elseif($m->device_message==1) echo "Android设备";
						else echo "IOS设备";
				?></td>
				<td><?php echo $m->check_message?"已查看":"未查看";?></td>
				
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<div class="page-div">
		<span class="">总记录数<?php echo $amount;?>条</span>
		<span onclick="location.href='<?php echo $first_link=="no"?"#":$first_link;?>'" class="page-bt first <?php echo $first_link=="no"?"last-disabled":"";?>" title="第一页">第一页</span>
		<span onclick="location.href='<?php echo $prev_link=="no"?"#":$prev_link;?>'" class="page-bt prev <?php echo $prev_link=="no"?"prev-disabled":"";?>" title="上一页">上一页</span>
		<span class="showpagenum"><?php echo $page;?>/<?php echo $page_amount;?></span>
		<span onclick="location.href='<?php echo $next_link=="no"?"#":$next_link;?>'" class="page-bt next <?php echo $next_link=="no"?"next-disabled":"";?>" title="下一页">下一页</span>
		<span onclick="location.href='<?php echo $last_link=="no"?"#":$last_link;?>'" class="page-bt last <?php echo $last_link=="no"?"last-disabled":"";?>" title="最后一页">最后一页</span>
		<span class="jump">
			到第
			<input id="page_num" type="text" class="jumpinput">
			页
		</span>
		<button class="jumpbt" onclick="jump_page('<?php echo $jump_link;?>')">跳转</button>
	</div>
</div>
<div id="msg_content" class="showinfo">
	<div class="dialog-hd">信息内容</div>
	<div class="itemPar" id="msgwait"><img src="/assets/images/cms/loading.gif" width="60" height="60"></div>
	<div class="itemPar" id="msgdata"></div>
</div>
<script src="/assets/js/kmadmin.js" type="text/javascript"></script>