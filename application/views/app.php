<div class="app">
	<div class="app-detail-container">
		<div class="app-div-base">
			<div class="app-icon-box">
				<img src="<?php echo $app->icon_app;?>" alt="<?php echo $app->name_app;?>" title="<?php echo $app->name_app;?>">
			</div>
			<div class="app-data-box">
				<div class="app-name">
					<?php echo $app->name_app;?>
				</div>
				<div class="app-data">
					<span>分类：<?php echo $categories[$app->cat_app];?></span>
					<span>下载次数：<?php echo $app->download_time_app;?></span>
					<span>时间：<?php echo $app->create_time_app;?></span>
					<span><a href="/market/preview?appid=<?php echo $app->id_app;?>" target="_blank">手机网站</a></span>
					<span>作者：<?php echo $merchant->username_merchant;?></span>
					<span class="stars center star<?php echo $app->star?>"></span>
				</div>
				<div class="dowmloadBtnDiv">
					<a href="<?php echo $app->android_link_app;?>" target="_blank" class="bigAndroidBtn"></a>
					<a href="<?php echo $app->ios_link_app;?>" target="_blank" class="bidIosBtn"></a>
				</div>
			</div>
			<div class="app-2dcode-box">
				<img src="<?php echo $app->two_code_app;?>">
				<span>扫描二维码下载</span>
			</div>
		</div>
		<div class="app-div-detail">
			<div class="pic-turn-hidden-box" id="html-carousel" style="min-height:330px;">
				<span class="pic-turn-left-btn picTurnBtn" id="scroll_prev_arrow"></span>
				<ul class="carousel-list clearfix" id="scroll_list">
					<?php foreach($previewImgs as $img):?>
					<li><img src="<?php echo $img->src_previewimg?>" alt="预览图"></li>
					<?php endforeach;?>
				</ul>
                <span class="pic-turn-right-btn picTurnBtn" id="scroll_next_arrow"></span>
				<div class="clearboth"></div>
			</div>
			<div class="description">
				<span class="det-intro-tit">应用简介：</span>
				<div class="desc-text"><?php echo $app->desc_app;?></div>
			</div>
		</div>
	</div>
	<div class="app-recommend">
		<div class="week-rank">
			<div class="rank-tit">
				<span class="tit">推荐下载</span>
				<div class="clearboth"></div>
			</div>
			<ul class="rank-tab-body rank-body">
				<?php foreach($recommendapps as $key=>$a):?>
				<li>
					<span class="rank-num rank-num<?php echo ($key+1);?>"><?php echo ($key+1);?></span>
					<div class="rank-info">
						<a href="/market/app?appid=<?php echo $a->id_app;?>" title="<?php echo $a->name_app;?>" class="name" target="_blank"><?php echo $a->name_app;?></a>
						<div class="down-count">
							<span><?php echo $a->download_time_app;?>次</span>下载
						</div>
					</div>
					<img src="<?php echo $a->icon_app;?>" alt="<?php echo $a->name_app;?>"></a>
					<div class="clearboth"></div>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
	<div class="clearboth"></div>
	<div class="app-comments">
		<div class="comments-container">
			<span class="det-intro-tit">用户评论：</span>
			<ul>
				<?php foreach($comments as $c):?>
				<li class="commentList">
					<div class="comment-name-line">
						<span class="comment-name"><?php echo $c->user_comment;?></span>
						
						<div class="comment-date"><span class="stars center star<?php echo $c->star_comment?>" style="display:inline-block;margin-right:10px;"></span> <?php echo $c->time_comment;?></div>
						<div class="clearboth"></div>
					</div>
					<div class="comment-datatext"><?php echo $c->text_comment;?></div>
				</li>
				<?php endforeach;?>
			</ul>
			<div class="page-box">
				<div class="inlineblock clearfix pagin">
					<a href="<?php echo $prev_link=="no"?"javascript:void()":$prev_link;?>" class="prev"><i></i>上一页</a>
					<?php for($i=$start;$i<=$end;$i++):?>
					<a href="<?php echo $jump_link.$i;?>" <?php echo $i==$page?'class="current"':"";?>><?php echo $i;?></a>
					<?php endfor;?>
					<a href="<?php echo $next_link=="no"?"javascript:void()":$next_link;?>" class="next">下一页<i></i></a>
				</div>
			</div>
		</div>
		<ul class="mycomment">
			<li>
				<span class="label">评分：</span>
				<span id="star" style="cursor: pointer; width: 110px;vertical-align: -webkit-baseline-middle;">
					<img src="/assets/images/market/star-on.png" alt="1" title="1">&nbsp;
					<img src="/assets/images/market/star-on.png" alt="2" title="2">&nbsp;
					<img src="/assets/images/market/star-on.png" alt="3" title="3">&nbsp;
					<img src="/assets/images/market/star-on.png" alt="4" title="4">&nbsp;
					<img src="/assets/images/market/star-on.png" alt="5" title="5">
					<input type="hidden" id="score" value="5">
				</span>
			</li>
			<li>
				<span class="label">昵称：</span><input type="text" id="nickname" placeholder="请输入1-15个字" class="inp-txt width200">
			</li>
			<!--
			<li>
				<span class="label">标题：</span><input type="text" id="title" placeholder="请输入1-30个字" class="inp-txt width400">
			</li>
			-->
			<li>
				<span class="label">评论：</span><textarea id="comment" class="areaBig width400" style="color: rgb(0, 0, 0);"></textarea>
			</li>
			<li>
				<a href="javascript:publish_comment('<?php echo $app->id_app;?>')" class="btnfa120" style="margin:0 auto;display:block;">发表</a>
			</li>
		</ul>
	</div>
	<div class="clearboth"></div>
</div>