<div class="padding10 formList">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div class="tabDiv" style="width:100%;">
			<div onclick="location.href='/kmadmin/admin/market_home'" class="left active" style="width:120px;">
				滚动图
			</div>
			<div onclick="location.href='/kmadmin/admin/market_ad'" class="center" style="width:120px;">
				滚动图右侧
			</div>
			<div onclick="location.href='/kmadmin/admin/market_necessity'" class="center" style="width:120px;">
				装机必备
			</div>
			<div onclick="location.href='/kmadmin/admin/market_selection'" class="center" style="width:120px;">
				精品应用
			</div>
			<div onclick="location.href='/kmadmin/admin/market_softdown_life'" class="center" style="width:80px;">
				生活
			</div>
			<div onclick="location.href='/kmadmin/admin/market_softdown_news'" class="center" style="width:80px;">
				新闻
			</div>
			<div onclick="location.href='/kmadmin/admin/market_softdown_joy'" class="center" style="width:80px;">
				娱乐
			</div>
			<div onclick="location.href='/kmadmin/admin/market_softdown_shopping'" class="center" style="width:80px;">
				购物
			</div>
			<div onclick="location.href='/kmadmin/admin/market_select_union'" class="right" style="width:120px;">
				精选专题
			</div>
			<div class="clear">
			</div>
		</div>
	</div>
	<div class="partContent home-scroll" style="">
		<div class="title">
			滚动图片
		</div>
		<div id="Div1">
			<div class="slider-pic">
				<ul id="sliderPic" style="width:790px;margin:0 auto;">
					<?php $array_num=sizeof($scroll); 
					foreach($scroll as $key=>$item):?>
					<li class="slider-item">
						<div class="scroll-info">
							<img class="img-src" src="<?php echo $item->src_marketscroll;?>">
							<span class="label">标题：</span>
							<input type="text" id="title<?php echo $item->id_marketscroll;?>" class="inp-txt width200" placeholder="放在图片上显示的文字" value="<?php echo $item->title_marketscroll;?>">
							<span class="label ml45">链接：</span>
							<input type="text" id="link<?php echo $item->id_marketscroll;?>" class="inp-txt width200" placeholder="单击图片跳转的链接" value="<?php echo $item->link_marketscroll;?>">
							<a style="cursor: pointer" onclick="save_scroll('<?php echo $item->id_marketscroll;?>')" class="btnfa120 ml19">保存</a>
							<div class="img-layer" onclick="change_scroll_click('<?php echo $item->id_marketscroll;?>');">点击更换图片</div>
						</div>
						<div class="oper">
							<?php if($key!=0):?>
							<img title="前移" src="/assets/images/cms/upward.png" onclick="javascript:scroll_order('forward','<?php echo $item->order_marketscroll;?>','<?php echo $item->id_marketscroll;?>')" style="margin-top:60px;">
							<?php endif;?>
							<img title="删除" src="/assets/images/cms/d.png" onclick="javascript:scroll_delete('<?php echo $item->id_marketscroll;?>','<?php echo $item->order_marketscroll;?>','<?php echo $array_num;?>')" style="margin-top:10px;margin-bottom:10px;">
							<?php if($key!=($array_num-1)):?>
							<img title="后移" src="/assets/images/cms/downward.png" onclick="javascript:scroll_order('backward','<?php echo $item->order_marketscroll;?>','<?php echo $item->id_marketscroll;?>')">
							<?php endif;?>
						</div>
						<div class="clearboth"></div>
					</li>
					<?php endforeach;?>
					<div class="clearboth"></div>
					<li id="loading" style="display:none;"><img src="/assets/images/cms/loading.gif" class="loading"/></li>
					<li class="add slider-item" onclick="scrollAdd()">
						<img id="img_add" src="/assets/images/cms/scroll_ad.png">
					</li>
				</ul>
				<form id="changeScrollForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
					<input onchange="return change_scroll()" name="image" type="file" id="scrollfile" style="display:none;" accept="image/*">
				</form>
				<form id="uploadScrollForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
					<input onchange="return upload_scroll()" name="image" type="file" id="file" style="display:none;" accept="image/*">
				</form>
				<input id="new_order_num" type="hidden" value="<?php echo ($array_num+1);?>"/>
			</div>
		</div>
	</div>
</div>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>