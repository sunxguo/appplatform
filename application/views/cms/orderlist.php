<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>" placeholder="Consignee or Address">
			<a href="javascript:selectorder('<?php echo $select_link;?>')" class="btn80"><?php echo lang('cms_content_search');?></a>
		</div>
		<div style="float: right;">
			<span class="font12"><?php echo lang('cms_content_state');?>：</span>
			<select id="state" onchange="selectorder('<?php echo $select_link;?>')" class="select w100">
                <option value="-1"><?php echo lang('cms_content_all');?></option>
                <option value="0" <?php echo isset($_GET["state"]) && $_GET["state"]=="0"?'selected = "selected"':'';?>><?php echo lang('cms_content_nonpayment');?></option>
                <option value="1" <?php echo isset($_GET["state"]) && $_GET["state"]=="1"?'selected = "selected"':'';?>><?php echo lang('cms_content_paid');?></option>
                <option value="2" <?php echo isset($_GET["state"]) && $_GET["state"]=="2"?'selected = "selected"':'';?>><?php echo lang('cms_content_delivered');?></option>
                <option value="3" <?php echo isset($_GET["state"]) && $_GET["state"]=="3"?'selected = "selected"':'';?>><?php echo lang('cms_content_deal');?></option>
                <option value="4" <?php echo isset($_GET["state"]) && $_GET["state"]=="4"?'selected = "selected"':'';?>><?php echo lang('cms_content_cancel');?></option>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:120px;"><?php echo lang('cms_content_ordernumber');?></th>
				<th style="width:260px;"><?php echo lang('cms_content_product');?></th>
				<th style="width:80px;"><?php echo lang('cms_content_totalprice');?></th>
				<th style="width:80px;"><?php echo lang('cms_content_consignee');?></th>
				<th style="width:100px;"><?php echo lang('cms_content_phone');?></th>
				<th style="width:180px;"><?php echo lang('cms_content_address');?></th>
				<th style="width:80px;"><?php echo lang('cms_content_ordertime');?></th>
				<th style="width:80px;"><?php echo lang('cms_content_user');?></th>
				<th style="width:60px;"><?php echo lang('cms_content_state');?></th>
				<th style="width:100px;"><?php echo lang('cms_content_operation');?></th>
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
					<a class="del-essay" href="javascript:cancel_order('<?php echo $o->id_order;?>');"><?php echo lang('cms_content_cancel');?></a>
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