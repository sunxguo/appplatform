<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: left;margin-left:10px;">
			<a href="/" class="btn80">+ 添加</a>
		</div>
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:select('<?php echo $select_link;?>')" class="btn80"><?php echo lang('cms_content_search');?></a>
		</div>
		<div style="float: right;">
			<span class="font12"><?php echo lang('cms_content_state');?>：</span>
			<select id="state" onchange="select('<?php echo $select_link;?>')" class="select w100">
                <option value="0"><?php echo lang('cms_content_all');?></option>
                <option value="normal" <?php echo isset($_GET["state"]) && $_GET["state"]=="normal"?'selected = "selected"':'';?>><?php echo lang('cms_content_publish');?></option>
                <option value="delete" <?php echo isset($_GET["state"]) && $_GET["state"]=="delete"?'selected = "selected"':'';?>><?php echo lang('cms_content_delete');?></option>
				<option value="draft" <?php echo isset($_GET["state"]) && $_GET["state"]=="draft"?'selected = "selected"':'';?>><?php echo lang('cms_content_draft');?></option>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:100px;"><?php echo lang('cms_content_nav');?></th>
				<th style="width:360px;"><?php echo lang('cms_content_title');?></th>
				<th style="width:80px;"><?php echo lang('cms_content_pageviews');?></th>
				<th style="width:150px;"><?php echo lang('cms_content_lasttime');?></th>
				<th style="width:150px;"><?php echo lang('cms_content_createtime');?></th>
				<th style="width:60px;"><?php echo lang('cms_content_state');?></th>
				<th style="width:100px;"><?php echo lang('cms_content_operation');?></th>
				<th style="width:80px;"><?php echo lang('cms_content_preview');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($essays as $e):?>
			<tr>
				<td><?php echo $navArray[$e->navid_essay];?></td>
				<td><a href="/cmsmini/index/essay?essayid=<?php echo $e->id_essay;?>"><?php echo $e->title_essay;?></a></td>
				<td><?php echo $e->visits_essay;?></td>
				<td><?php echo $e->lasttime_essay;?></td>
				<td><?php echo $e->time_essay;?></td>
				<td>
					<?php
						if($e->state_essay==0) echo lang('cms_content_published');
						elseif($e->state_essay==1) echo lang('cms_content_draft');
						elseif($e->state_essay==2) echo lang('cms_content_deleted');
					?>
				</td>
				<td>
					<?php if($e->state_essay==0):?>
					<a class="del-essay" href="javascript:delete_essay('<?php echo $e->id_essay;?>');"><?php echo lang('cms_content_delete');?></a>
					<?php elseif($e->state_essay==2):?>
					<a class="del-essay" href="javascript:recover_essay('<?php echo $e->id_essay;?>');"><?php echo lang('cms_content_restore');?></a>
					<a class="del-essay" href="javascript:clear_essay('<?php echo $e->id_essay;?>');"><?php echo lang('cms_content_clear');?></a>
					<?php elseif($e->state_essay==1):?>
					<a class="del-essay" href="javascript:recover_essay('<?php echo $e->id_essay;?>');"><?php echo lang('cms_content_publish');?></a>
					<?php endif;?>
				</td>
				<td><?php echo lang('cms_content_preview');?></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<div class="page-div">
		<span class=""><?php echo lang('cms_content_total');?><?php echo $amount;?><?php echo lang('cms_content_totalunit');?></span>
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
<script src="/assets/js/contents.js" type="text/javascript"></script>