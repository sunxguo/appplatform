<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectuser('<?php echo $select_link;?>')" class="btn80"><?php echo lang('cms_content_search');?></a>
		</div>
		<div style="float: right;">
			<span class="font12"><?php echo lang('cms_content_state');?>：</span>
			<select id="state" onchange="selectuser('<?php echo $select_link;?>')" class="select w100">
                <option value="0"><?php echo lang('cms_content_all');?></option>
                <option value="normal" <?php echo isset($_GET["state"]) && $_GET["state"]=="normal"?'selected = "selected"':'';?>><?php echo lang('cms_content_nomal');?></option>
                <option value="freeze" <?php echo isset($_GET["state"]) && $_GET["state"]=="freeze"?'selected = "selected"':'';?>><?php echo lang('cms_content_frozen');?></option>
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12"><?php echo lang('cms_content_gender');?>：</span>
			<select id="gender" onchange="selectuser('<?php echo $select_link;?>')" class="select w100">
                <option value="0"><?php echo lang('cms_content_all');?></option>
                <option value="male" <?php echo isset($_GET["gender"]) && $_GET["gender"]=="male"?'selected = "selected"':'';?>><?php echo lang('cms_content_male');?></option>
                <option value="female" <?php echo isset($_GET["gender"]) && $_GET["gender"]=="female"?'selected = "selected"':'';?>><?php echo lang('cms_content_female');?></option>
                <option value="unknown" <?php echo isset($_GET["gender"]) && $_GET["gender"]=="unknown"?'selected = "selected"':'';?>><?php echo lang('cms_content_unknown');?></option>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:160px;"><?php echo lang('cms_content_username');?></th>
				<th style="width:160px;"><?php echo lang('cms_content_realname');?></th>
				<th style="width:80px;"><?php echo lang('cms_content_gender');?></th>
				<th style="width:200px;"><?php echo lang('cms_content_useraddress');?></th>
				<th style="width:150px;"><?php echo lang('cms_content_lastlogintime');?></th>
				<th style="width:150px;"><?php echo lang('cms_content_createtime');?></th>
				<th style="width:60px;"><?php echo lang('cms_content_state');?></th>
				<th style="width:100px;"><?php echo lang('cms_content_operation');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($user as $u):?>
			<tr>
				<td><a href="/cms/index/user?userid=<?php echo $u->id_user;?>"><?php echo $u->username_user;?></a></td>
				<td><?php echo $u->realname_user;?></td>
				<td><?php if($u->gender_user==0) echo lang('cms_content_male'); elseif($u->gender_user==1) echo lang('cms_content_female'); else echo lang('cms_content_unkonwn');?></td>
				<td><?php echo $u->address_user;?></td>
				<td><?php echo $u->lasttime_user;?></td>
				<td><?php echo $u->time_user;?></td>
				<td><?php echo $u->state_user==0?lang('cms_content_nomal'):lang('cms_content_frozen');?></td>
				<td>
					<?php if($u->state_user==0):?>
					<a class="del-essay" href="javascript:delete_user('<?php echo $u->id_user;?>');"><?php echo lang('cms_content_freeze');?></a>
					<?php else:?>
					<a class="del-essay" href="javascript:recover_user('<?php echo $u->id_user;?>');"><?php echo lang('cms_content_restore');?></a>
					<a class="del-essay" href="javascript:clear_user('<?php echo $u->id_user;?>');"><?php echo lang('cms_content_clear');?></a>
					<?php endif;?>
				</td>
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