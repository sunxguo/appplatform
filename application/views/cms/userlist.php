<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectuser('<?php echo $select_link;?>')" class="btn80">搜索</a>
		</div>
		<div style="float: right;">
			<span class="font12">状态：</span>
			<select id="state" onchange="selectuser('<?php echo $select_link;?>')" class="select w100">
                <option value="0">全部</option>
                <option value="normal" <?php echo isset($_GET["state"]) && $_GET["state"]=="normal"?'selected = "selected"':'';?>>正常</option>
                <option value="freeze" <?php echo isset($_GET["state"]) && $_GET["state"]=="freeze"?'selected = "selected"':'';?>>冻结</option>
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">性别：</span>
			<select id="gender" onchange="selectuser('<?php echo $select_link;?>')" class="select w100">
                <option value="0">全部</option>
                <option value="male" <?php echo isset($_GET["gender"]) && $_GET["gender"]=="male"?'selected = "selected"':'';?>>男</option>
                <option value="female" <?php echo isset($_GET["gender"]) && $_GET["gender"]=="female"?'selected = "selected"':'';?>>女</option>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:160px;">用户名</th>
				<th style="width:160px;">真实姓名</th>
				<th style="width:80px;">性别</th>
				<th style="width:200px;">地点</th>
				<th style="width:150px;">最后登录时间</th>
				<th style="width:150px;">创建时间</th>
				<th style="width:60px;">状态</th>
				<th style="width:100px;">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($user as $u):?>
			<tr>
				<td><a href="/cms/index/user?userid=<?php echo $u->id_user;?>"><?php echo $u->username_user;?></a></td>
				<td><?php echo $u->realname_user;?></td>
				<td><?php echo $u->gender_user==0?"男":"女";?></td>
				<td><?php echo $u->address_user;?></td>
				<td><?php echo $u->lasttime_user;?></td>
				<td><?php echo $u->time_user;?></td>
				<td><?php echo $u->state_user==0?"正常":"冻结";?></td>
				<td>
					<?php if($u->state_user==0):?>
					<a class="del-essay" href="javascript:delete_user('<?php echo $u->id_user;?>');">冻结</a>
					<?php else:?>
					<a class="del-essay" href="javascript:recover_user('<?php echo $u->id_user;?>');">恢复</a>
					<a class="del-essay" href="javascript:clear_user('<?php echo $u->id_user;?>');">清除</a>
					<?php endif;?>
				</td>
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