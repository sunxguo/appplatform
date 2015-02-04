<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectorder('<?php echo $select_link;?>')" class="btn80">搜索</a>
		</div>
		<div style="float: right;">
			<span class="font12">状态：</span>
			<select id="state" onchange="selectorder('<?php echo $select_link;?>')" class="select w100">
                <option value="-1">全部</option>
                <option value="0" <?php echo isset($_GET["state"]) && $_GET["state"]=="0"?'selected = "selected"':'';?>>创建未支付</option>
                <option value="1" <?php echo isset($_GET["state"]) && $_GET["state"]=="1"?'selected = "selected"':'';?>>已支付</option>
                <option value="2" <?php echo isset($_GET["state"]) && $_GET["state"]=="2"?'selected = "selected"':'';?>>确认并发货</option>
                <option value="3" <?php echo isset($_GET["state"]) && $_GET["state"]=="3"?'selected = "selected"':'';?>>交易成功</option>
                <option value="4" <?php echo isset($_GET["state"]) && $_GET["state"]=="4"?'selected = "selected"':'';?>>取消</option>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:120px;">订单号</th>
				<th style="width:260px;">商品</th>
				<th style="width:80px;">总价</th>
				<th style="width:80px;">收货人</th>
				<th style="width:100px;">联系电话</th>
				<th style="width:180px;">收货地址</th>
				<th style="width:80px;">下单时间</th>
				<th style="width:80px;">用户</th>
				<th style="width:60px;">状态</th>
				<th style="width:100px;">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($order as $o):?>
			<tr>
				<td><a href="/cms/index/order?orderid=<?php echo $o->id_order;?>"><?php echo $o->num_order;?></a></td>
				<td>
				<?php $products=json_decode($o->products_order);
				foreach($products as $product):?>
				<?php $thumbnails=json_decode($product->info->thumbnail_product);
					echo "<a href='' target='_blank'><img alt='".$product->info->name_product."' title='".$product->info->name_product."' width='60' height='60' src='".$thumbnails[0]->src."'></a>";
					echo "×".$product->countnum;
					$unit=$product->info->unit_product;
				?>
				<?php endforeach;?>
				</td>
				<td><?php echo $unit.$o->total_order;?></td>
				<td><?php echo $o->name_order;?></td>
				<td><?php echo $o->phone_order;?></td>
				<td><?php echo $o->address_order;?></td>
				<td><?php echo $o->time_order;?></td>
				<td><?php echo $o->userid_order;?></td>
				<td><?php echo $state[$o->state_order];?></td>
				<td>
					<a class="del-essay" href="javascript:cancel_order('<?php echo $o->id_order;?>');">取消</a>
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