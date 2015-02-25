<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectform('<?php echo $select_link;?>')" class="btn80"><?php echo lang('cms_content_search');?></a>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12"><?php echo lang('cms_content_nav');?>：</span>
			<select id="nav" onchange="selectform('<?php echo $select_link;?>')" class="select w100">
                <option value="0"><?php echo lang('cms_content_all');?></option>
				<?php foreach($info->navs as $nav):?>
                <option value="<?php echo $nav->id_nav;?>" <?php echo isset($_GET["nav"]) && $_GET["nav"]==$nav->id_nav?'selected = "selected"':'';?>><?php echo $nav->name_nav;?></option>
				<?php endforeach;?>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:150px;"><?php echo lang('cms_content_nav');?></th>
				<th style="width:150px;"><?php echo lang('cms_content_field');?></th>
				<th style="width:400px;"><?php echo lang('cms_content_data');?></th>
				<th style="width:100px;"><?php echo lang('cms_content_user');?></th>
				<th style="width:200px;"><?php echo lang('cms_content_feedbacktime');?></th>
				<th style="width:100px;"><?php echo lang('cms_content_operation');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($form as $f):?>
			<tr>
				<td><?php echo $navdata[$forms[$f->formid_formdata]->navid_form];?></td>
				<td><?php echo $forms[$f->formid_formdata]->name_form;?></td>
				<td><?php echo $f->data_formdata;?></td>
				<td><?php echo $f->userid_formdata;?></td>
				<td><?php echo $f->time_formdata;?></td>
				<td></td>
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