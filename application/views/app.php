<div class="app">
	<div class="app-detail-container">
		<div class="app-div-base">
			<div class="app-icon-box">
				<img src="/assets/images/market/icon/8.png" alt="" title="">
			</div>
			<div class="app-data-box">
				<div class="app-name">
					网络助手
				</div>
				<div class="app-data">
					<span>分类：系统工具</span>
					<span>下载次数：5万+</span>
					<span>时间：2015年01月10日</span>
					<span>大小：7.5M</span>
					<span>作者：孙行者</span>
					<span class="stars center"></span>
				</div>
				<div class="dowmloadBtnDiv">
					<a href="" class="bigAndroidBtn"></a>
					<a href="" class="bidIosBtn"></a>
				</div>
			</div>
			<div class="app-2dcode-box">
				<img src="/assets/images/market/2dcode.png">
				<span>扫描二维码下载</span>
			</div>
		</div>
		<div class="app-div-detail">
			<div class="pic-turn-hidden-box" id="html-carousel">
				<span class="pic-turn-left-btn picTurnBtn" id="scroll_prev_arrow"></span>
				<ul class="carousel-list" id="scroll_list">
					<?php for($i=1;$i<6;$i++):?>
					<li><img src="/assets/images/market/scroll<?php echo $i;?>.png" alt=""></li>
					<?php endfor;?>
				</ul>
                <span class="pic-turn-right-btn picTurnBtn" id="scroll_next_arrow"></span>
				<div class="clearboth"></div>
			</div>
			<div class="description">
				<span class="det-intro-tit">应用简介：</span>
				<div class="desc-text">QQ手机版，致力于更完美的移动社交、娱乐与生活体验――乐在沟通15年，聊天欢乐8亿人！【主要功能】-乐在沟通：语音通话，视频聊天，图片分享，趣味表情-多人聊天：免费建讨论组、200人QQ群-实用贴心：手机、电脑文件互传，查看关联QQ号消息，通讯录备份，位置分享-个性主张：丰富主题，多彩气泡，自定义聊天背景，自定义资料卡背景【意见反馈】-帮助与反馈：进入QQ设置->关于QQ->帮助与反馈，把你的宝贵建议反馈给QQ项目组，我们会认真倾听你的每一条建议。-QQ客服：0755-61369988
				</div>
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
				<?php for($i=1;$i<8;$i++):?>
				<li>
					<span class="rank-num rank-num<?php echo $i;?>"><?php echo $i;?></span>
					<div class="rank-info">
						<a href="" title="国学经典诵读" class="name" target="_blank">国学经典诵读</a>
						<div class="down-count">
							<span>8万+</span>下载
						</div>
					</div>
					<img src="/assets/images/market/icon/<?php echo $i;?>.png" alt="国学经典诵读"></a>
					<div class="clearboth"></div>
				</li>
				<?php endfor;?>
			</ul>
		</div>
	</div>
	<div class="clearboth"></div>
</div>