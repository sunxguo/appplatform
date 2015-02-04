<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectform('<?php echo $select_link;?>')" class="btn80">搜索</a>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">导航：</span>
			<select id="nav" onchange="selectform('<?php echo $select_link;?>')" class="select w100">
                <option value="0">全部</option>
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
				<th style="width:100px;">导航</th>
				<th style="width:100px;">字段</th>
				<th style="width:300px;">数据</th>
				<th style="width:100px;">用户</th>
				<th style="width:150px;">反馈时间</th>
				<th style="width:100px;">操作</th>
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
<script src="/assets/js/contents.js" type="text/javascript"></script>