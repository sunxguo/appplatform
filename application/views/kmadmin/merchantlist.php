<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectmerc('<?php echo $select_link;?>')" class="btn80">搜索</a>
		</div>
		<div style="float: right;">
			<span class="font12">状态：</span>
			<select id="state" onchange="selectmerc('<?php echo $select_link;?>')" class="select w100">
                <option value="0">全部</option>
                <option value="normal" <?php echo isset($_GET["state"]) && $_GET["state"]=="normal"?'selected = "selected"':'';?>>正常</option>
                <option value="freeze" <?php echo isset($_GET["state"]) && $_GET["state"]=="freeze"?'selected = "selected"':'';?>>冻结</option>
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">性别：</span>
			<select id="gender" onchange="selectmerc('<?php echo $select_link;?>')" class="select w100">
                <option value="0">全部</option>
                <option value="male" <?php echo isset($_GET["gender"]) && $_GET["gender"]=="male"?'selected = "selected"':'';?>>男</option>
                <option value="female" <?php echo isset($_GET["gender"]) && $_GET["gender"]=="female"?'selected = "selected"':'';?>>女</option>
				<option value="unknown" <?php echo isset($_GET["gender"]) && $_GET["gender"]=="unknown"?'selected = "selected"':'';?>>未知</option>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:120px;">用户名</th>
				<th style="width:60px;">性别</th>
				<th style="width:60px;">等级</th>
				<th style="width:160px;">邮箱</th>
				<th style="width:150px;">手机</th>
				<th style="width:80px;">VIP</th>
				<th style="width:140px;">最后登录时间</th>
				<th style="width:140px;">创建时间</th>
				<th style="width:50px;">状态</th>
				<th style="width:100px;">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($merchant as $m):?>
			<tr>
				<td><a target="_blank" href="merchantid=<?php echo $m->id_merchant;?>"><?php echo $m->username_merchant;?></a></td>
				<td><?php echo $m->gender_merchant==0?"男":"女";?></td>
				<td><?php echo $m->grade_merchant;?></td>
				<td><?php echo $m->email_merchant;?></td>
				<td><?php echo $m->phone_merchant;?></td>
				<td><?php echo $m->vip_grade_merchant==0?"普通用户":"VIP".$m->vip_grade_merchant."级";?></td>
				<td><?php echo $m->lasttime_merchant;?></td>
				<td><?php echo $m->reg_time_merchant;?></td>
				<?php if($m->state_merchant==0):?>
				<td>正常</td>
				<td>
					<a class="del-essay" href="javascript:freeze_merchant('<?php echo $m->id_merchant;?>');">冻结</a>
				</td>
				<?php else:?>
				<td>冻结</td>
				<td>
					<a class="del-essay" href="javascript:recover_merchant('<?php echo $m->id_merchant;?>');">恢复</a>
					<a class="del-essay" href="javascript:delete_merchant('<?php echo $m->id_merchant;?>');">删除</a>
				</td>
				<?php endif;?>
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
<script src="/assets/js/kmadmin.js" type="text/javascript"></script>