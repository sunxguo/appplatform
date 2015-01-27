<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv">
			<div  onclick="location.href='/cms/index/contents?type=essay&appid=<?php echo $_GET["appid"];?>'" class="left">
				文章
			</div>
			<div class="right active">
				商品
			</div>
			<div class="clear">
			</div>
		</div>
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:select('<?php echo $select_link;?>')" class="btn80">搜索</a>
		</div>
		<div style="float: right;">
			<span class="font12">状态：</span>
			<select id="state" onchange="select('<?php echo $select_link;?>')" class="select w100">
                <option value="0">全部</option>
                <option value="normal" <?php echo isset($_GET["state"]) && $_GET["state"]=="normal"?'selected = "selected"':'';?>>发布</option>
                <option value="delete" <?php echo isset($_GET["state"]) && $_GET["state"]=="delete"?'selected = "selected"':'';?>>删除</option>
				<option value="draft" <?php echo isset($_GET["state"]) && $_GET["state"]=="draft"?'selected = "selected"':'';?>>草稿</option>
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">导航：</span>
			<select id="nav" onchange="select('<?php echo $select_link;?>')" class="select w100">
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
				<th style="width:270px;">名称</th>
				<th style="width:70px;">价格</th>
				<th style="width:80px;">收藏总数</th>
				<th style="width:150px;">最后修改时间</th>
				<th style="width:150px;">创建时间</th>
				<th style="width:60px;">状态</th>
				<th style="width:100px;">操作</th>
				<th style="width:80px;">预览</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($product as $p):?>
			<tr>
				<td><?php echo $navdata[$p->navid_product];?></td>
				<td><a href="/cms/index/product?productid=<?php echo $p->id_product;?>"><?php echo $p->name_product;?></a></td>
				<td><?php echo $p->unit_product.$p->price_product;?></td>
				<td><?php echo $p->collect_product;?></td>
				<td><?php echo $p->lasttime_product;?></td>
				<td><?php echo $p->time_product;?></td>
				<td>
					<?php
						if($p->state_product==0) echo "已发布";
						elseif($p->state_product==1) echo "草稿";
						elseif($p->state_product==2) echo "已删除";
					?>
				</td>
				<td>
					<?php if($p->state_product==0):?>
					<a class="del-essay" href="javascript:delete_essay('<?php echo $p->id_product;?>');">删除</a>
					<?php elseif($p->state_product==2):?>
					<a class="del-essay" href="javascript:recover_essay('<?php echo $p->id_product;?>');">恢复</a>
					<a class="del-essay" href="javascript:clear_essay('<?php echo $p->id_product;?>');">清除</a>
					<?php elseif($p->state_product==1):?>
					<a class="del-essay" href="javascript:recover_essay('<?php echo $p->id_product;?>');">发布</a>
					<?php endif;?>
				</td>
				<td>预览</td>
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