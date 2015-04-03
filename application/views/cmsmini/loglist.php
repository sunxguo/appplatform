<div class="padding10 contentlist">
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:250px;"><?php echo lang('cms_sendmsg_operator');?></th>
				<th style="width:450px;"><?php echo lang('cms_sendmsg_operatingcontent');?></th>
				<th style="width:180px;"><?php echo lang('cms_sendmsg_operatingtime');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($logs as $l):?>
			<tr>
				<td><?php echo $_SESSION["username"];?></td>
				<td><?php echo $l->operation_log;?></td>
				<td><?php echo $l->time_log;?></td>
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
<!--
		<span class="jump">
			到第
			<input id="page_num" type="text" class="jumpinput">
			页
		</span>
		<button class="jumpbt" onclick="jump_page('<?php echo $jump_link;?>')">跳转</button>-->
	</div>
</div>