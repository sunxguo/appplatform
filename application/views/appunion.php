<div class="union-main">
	<ul class="union-list-box clearfix">
		<?php foreach($marketunion as $u):?>
		<li class="union-list">
			<div class="union-data-box">
				<a href="javascript:;" class="union-data-pic" title="<?php echo $u->name_marketunion;?>">
					<img src="<?php echo $u->img_marketunion;?>" alt="<?php echo $u->name_marketunion;?>">
				</a>
				<div class="union-data-inf-box">
					<p class="union-data-tit ofh"><?php echo $u->name_marketunion;?></p>
					<p class="union-data-detail"><?php echo $u->description_marketunion;?></p>
				</div>
			</div>
			<div class="union-app-box">
				<?php foreach($u->app as $a):?>
				<section class="union-list-app  ">
					<div class="union-list-app-info">
						<a href="/market/app?appid=<?php echo $a->id_app;?>" target="_blank" class="union-list-app-pic icon">
							<img src="<?php echo $a->icon_app;?>" alt="<?php echo $a->name_app;?>">
						</a>
						<div class="union-list-app-detail">
							<a href="/market/app?appid=<?php echo $a->id_app;?>" target="_blank" title="<?php echo $a->name_app;?>" class="appName ofh"><?php echo $a->name_app;?></a>
							<span class="download">下载<?php echo $a->download_time_app;?>次</span>
							<div class="stars center star<?php echo $a->star?>" style="margin:10px 0 0 0;"></div>
							<div class="down">
								<span onclick="window.open('/market/app?appid=<?php echo $a->id_app;?>');" style="top: 0px;">下载</span>
							</div>
						</div>
					</div>
				</section>
				<?php endforeach;?>
			</div>
			<div class="union-list-toggle">
				<p class="union-list-arrow"></p>
			</div>
		</li>
		<?php endforeach;?>
	</ul>
	<div class="clearboth"></div>
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