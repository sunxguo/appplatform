<div class="padding10 contentlist">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv">
			<div  onclick="location.href='/cms/index/contents?type=essay&appid=<?php echo $_GET["appid"];?>'" class="left">
				<?php echo lang('cms_content_essay');?>
			</div>
			<div class="right active">
				<?php echo lang('cms_content_product');?>
			</div>
			<div class="clear">
			</div>
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
		<div style="float: right;margin-right:10px;">
			<span class="font12"><?php echo lang('cms_content_nav');?>：</span>
			<select id="nav" onchange="select('<?php echo $select_link;?>')" class="select w100">
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
				<th style="width:100px;"><?php echo lang('cms_content_nav');?></th>
				<th style="width:270px;"><?php echo lang('cms_content_title');?></th>
				<th style="width:70px;"><?php echo lang('cms_content_price');?></th>
				<th style="width:80px;"><?php echo lang('cms_content_collectionnum');?></th>
				<th style="width:150px;"><?php echo lang('cms_content_lasttime');?></th>
				<th style="width:150px;"><?php echo lang('cms_content_createtime');?></th>
				<th style="width:60px;"><?php echo lang('cms_content_state');?></th>
				<th style="width:100px;"><?php echo lang('cms_content_operation');?></th>
				<th style="width:80px;"><?php echo lang('cms_content_preview');?></th>
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
						if($p->state_product==0) echo lang('cms_content_published');
						elseif($p->state_product==1) echo lang('cms_content_draft');
						elseif($p->state_product==2) echo lang('cms_content_deleted');
					?>
				</td>
				<td>
					<?php if($p->state_product==0):?>
					<a class="del-essay" href="javascript:delete_essay('<?php echo $p->id_product;?>');"><?php echo lang('cms_content_delete');?></a>
					<?php elseif($p->state_product==2):?>
					<a class="del-essay" href="javascript:recover_essay('<?php echo $p->id_product;?>');"><?php echo lang('cms_content_restore');?></a>
					<a class="del-essay" href="javascript:clear_essay('<?php echo $p->id_product;?>');"><?php echo lang('cms_content_clear');?></a>
					<?php elseif($p->state_product==1):?>
					<a class="del-essay" href="javascript:recover_essay('<?php echo $p->id_product;?>');"><?php echo lang('cms_content_publish');?></a>
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