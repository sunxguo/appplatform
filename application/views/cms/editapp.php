<div class="app-warp">
	<div class="h2-wrap">
		<h2>
			<span class="en-tab e-n-tab-l active"><?php echo lang('cms_editapp_editapp');?></span>
			<a class="en-tab e-n-tab-c goto" href="/cms/index/navedit?appid=<?php echo $info->id_app?>"><?php echo lang('cms_editapp_designappnav');?></a>
			<a class="en-tab e-n-tab-r goto" href="/cms/index/preview?appid=<?php echo $info->id_app?>"><?php echo lang('cms_editapp_preview');?></a>
		</h2>
	</div>
    <div class="app-con">
		<div id="left" class="app-side">
			<div class="app-side-bd">
				<div class="p-b-wrap">
					<div id="prevdiv" class="scroll-btn btn-prev" href="javascript:void()" style="display: none;">
					</div>
					<div id="nextdiv" class="scroll-btn btn-next" href="javascript:void()" style="display: none;">
					</div>
					<div id="showimgdiv" class="phone-bd">
						<div class="phone-bd" id="preview">
							<img id="phoneBg" src="/assets/images/cms/16.png" width="245" height="430">
							<div class="app-icon" id="previewDiv">
								<div class="app-icon-show">
									<img id="previewimg" src="<?php echo $info->icon_app;?>" style="width:60px;height:60px;">
									<p id="iconFontShow" style="width: 60px; height: 60px; margin-top: -60px;" class="font-one"></p>
								</div>
								<span id="appNamePre"><?php echo $info->name_app;?></span>
							</div>
						</div>
					</div>
					<!--自定义 左侧 start-->
					<div id="customcontent">
					</div>
					<!--自定义 左侧 end-->
				</div>
			</div>
		</div>
		<div class="app-main">
			<div class="top-link">
				<div id="stepDiv" class="app-step step1">
					<div class="line" style="width: 477px;">
						<span></span>
					</div>
					<ul id="top">
						<li id="info" class="item1"><span class="num">1</span><?php echo lang('cms_editapp_appinfo');?></li>
						<li id="start" class="item2"><span class="num">2</span><?php echo lang('cms_editapp_launchimg');?></li>
						<li id="skin" class="item3"><span class="num">3</span><?php echo lang('cms_editapp_skin');?></li>
						<li id="user" class="item4" style="display: none;"><span class="num">4</span>用户信息</li>
					</ul>
				</div>
			</div>
			<div class="app-scroll" id="step1Div">
				<h3>APP名称</h3>
				<div>
					<input type="text" id="appName" placeholder="请输入1-10个字" class="inp-txt blackVal" onblur="checkAppName()" onkeyup="checkAppName()" value="<?php echo $info->name_app?>">
					<span style="color: red">*</span>
					<a class="ico-help" href="" target="_blank"></a>
					<span id="appNameMes" style="margin-left: 6px;" class="tip-error">应用名称长度为1-10个字</span>
				</div>
				<h3> APP图标
					<span style="font-size:14px; padding-left:10px;">(只有使用自定义上传的图标，才能发布到市场!)</span>
				</h3>
				<p>图标背景</p>
				<ul class="app-bg" id="iconArray">
					<li id="icon1" onclick="iconClick('1')">
						<a href="javascript:void()"><img src="/resource/icon/1.png"></a></li>
					<li id="icon2" onclick="iconClick('2')">
						<a href="javascript:void()"><img src="/resource/icon/2.png"></a>
					</li>
					<li id="icon3" onclick="iconClick('3')"><a href="javascript:void()">
						<img src="/resource/icon/3.png"></a></li>
					<li id="icon4" onclick="iconClick('4')"><a href="javascript:void()">
						<img src="/resource/icon/4.png"></a></li>
					<li id="icon5" onclick="iconClick('5')"><a href="javascript:void()">
						<img src="/resource/icon/5.png"></a></li>
					<li id="icon6" onclick="iconClick('6')"><a href="javascript:void()">
						<img src="/resource/icon/6.png"></a></li>
					<li id="icon7" onclick="iconClick('7')" class="current"><a href="javascript:void()">
						<img id="cusImg" src="<?php echo $info->icon_app;?>" width="60" height="60"></a></li>
					
				</ul>
				<form id="uploadImgForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
					<input onchange="return upload_img('#uploadImgForm')" name="image" type="file" id="file" style="display:none;" accept="image/*">
				</form>
				<div id="reupload" class="app-bg-up" style="display:block;">
					<a href="javascript:iconAdd()">重新上传</a>
				</div>
				<p class="h30">可设置图标上显示的文字</p>
				<div>
					<input type="text" placeholder="请输入1-4个字" class="inp-txt blackVal" id="displayWord" onblur="checkDisplayWord()" onkeyup="checkDisplayWord()" value="<?php echo $info->icon_text_app;?>" disabled="disabled">
					<span id="displayWordMes" style="margin-left: 6px;"></span>
				</div>
				<h3>应用分类</h3>
				<select id="category" class="select w100">
					<?php foreach($category as $key=>$cat):?>
					<option value="<?php echo $key;?>" <?php echo $key==$info->cat_app?"selected='selected'":"";?>><?php echo $cat;?></option>
					<?php endforeach;?>
				</select>
				<div>
				</div>
				<h3>APP描述
					<span style="font-size:14px; padding-left:10px;">(长度在50~2000个字之间)</span>
				</h3>
				<div>
					<textarea id="appDesc" class="areaBig blackVal" onblur="checkDesc()" onkeyup="checkDesc()" style="color: rgb(0, 0, 0);"><?php echo $info->desc_app?></textarea>
					<p class="h30">
						<span id="appDescMes" class="tip-error"></span>
					</p>
				</div>
				<div class="btn-center">
					<a id="prevbtn" class="btn120" href="javascript:void()" style="display: none;">上一步</a>
					<a href="Javascript:step(1,2);" class="btn120">下一步</a>
				</div>
			</div>
			<div class="app-scroll" id="step2Div" style="display:none;">
				<h3>请选择APP打开时显示的界面</h3>
				<div class="open-pic">
					<ul id="launchPic">
						<li id="launch1" class="current"><a href="javascript:launchClick('1')">
							<img id="img1" src="/resource/launch/1.png" width="116" height="206"></a></li>
						<li id="launch2"><a href="javascript:launchClick('2')">
							<img id="img2" src="/resource/launch/2.png" width="116" height="206"></a></li>
						<li id="launch3"><a href="javascript:launchClick('3')">
							<img id="img3" src="/resource/launch/3.png" width="116" height="206"></a></li>
						<li id="launch4"><a href="javascript:launchClick('4')">
							<img id="img4" src="/resource/launch/4.png" width="116" height="206"></a></li>
						<li id="launch5" style="<?php echo $info->poslaunch?"display:none;":"";?>"><a href="javascript:launchClick('5')">
							<img id="img5" src="<?php echo $info->poslaunch?"":$info->launch_app;?>" width="116" height="206"></a></li>
						<?php if($info->poslaunch):?>
						<li id="div5" class="add"><a href="javascript:launchAdd()">添加</a></li>
						<?php endif;?>
					</ul>
					<form id="uploadLaunchForm" method="post" action="/cms/index/upload_img" enctype="multipart/form-data">
						<input onchange="return upload_launch('#uploadLaunchForm')" name="image" type="file" id="launchFile" style="display:none;" accept="image/*">
					</form>
					<div id="divupload" class="add-link" style="<?php echo !$info->poslaunch?"display:none;":"";?>" onclick="openupload()">
						<a href="javascript:launchAdd()">重新上传</a>
					</div>
				</div>
				<div class="btn-center">
					<a id="prevbtn" class="btn120" href="Javascript:step(2,1);">上一步</a> <a href="Javascript:step(2,3);" id="nextbtn" class="btn120">下一步</a>
				</div>
			</div>
			<div class="app-scroll" id="step3Div" style="display:none;">
				<h3>请为您的APP设置漂亮的皮肤吧</h3>
				<div class="skin">
					<ul id="skinDiv">
						<li id="skin1" class="current"><a href="javascript:colorClick('1')">
							<img src="/assets/images/cms/skin/1.png" width="150" height="160"></a></li>
						<li id="skin2" class=""><a href="javascript:colorClick('2')">
							<img src="/assets/images/cms/skin/2.png" width="150" height="160"></a></li>
						<li id="skin3" class=""><a href="javascript:colorClick('3')">
							<img src="/assets/images/cms/skin/3.png" width="150" height="160"></a></li>
						<li id="skin4" class=""><a href="javascript:colorClick('4')">
							<img src="/assets/images/cms/skin/4.png" width="150" height="160"></a></li>
					</ul>
				</div>
				<div>
					<span style="font-size:16px;color:#51657F;display:block;margin:30px 0 5px 0;">请设置您的版式<span style="font-size:14px;color: red; margin-left:5px;">（IOS暂不支持九宫格版式）</span></span>
					<div class="banshi">
						<ul id="temDiv">
							<li id="tem1" class="current"><a href="#nogo"><img id="layout0" src="/resource/layout/Layout0.png" width="144" height="190"></a></li>
							<!--
								<li class=""><a href="#nogo"><img id="layout1" src="/resource/skin/Layout1.png" width="144" height="190"></a></li>   
							-->
						</ul>
					</div>
				</div>
				<div class="btn-center">
					<a id="prevbtn" class="btn120" href="Javascript:step(3,2);">上一步</a> <a href="Javascript:saveAppInfo(<?php echo $info->id_app;?>)" id="nextbtn" class="btn120">保存</a>
				</div>
			</div>
		</div>
		<div class="dialog pic-edit" id="uploadIconDialog">
			<a title="关闭" class="close" href="javascript:void()" onclick="closeAddDialog()">关闭</a>
			<div class="dialog-hd">自定义图片</div>
			<div class="custom-pic">
				<div class="custom-pic-top">
					<div id="uploadIconInner" class="uploadify">
						<input type="button" value="上传" onclick="chooseImg()">
						<img id="waitUpload" src="/assets/images/cms/loading.gif" style="display:none;">
					</div>
					<p style="display: inline-block;margin-left:40px;">
						请上传JPG、PNG格式的图片，建议上传尺寸为<br>
						512px*512px的图片（图片过小会导致图片效果变虚）
					</p>
				</div>
			</div>
		</div>
		<div class="dialog pic-edit" id="uploadLaunchDialog">
			<a title="关闭" class="close" href="javascript:void()" onclick="closeLaunchDialog()">关闭</a>
			<div class="dialog-hd">自定义图片</div>
			<div class="custom-pic">
				<div class="custom-pic-top">
					<div id="uploadIconInner" class="uploadify">
						<input type="button" value="上传" onclick="chooseLaunchImg()">
						<img id="waitLaunchUpload" src="/assets/images/cms/loading.gif" style="display:none;">
					</div>
					<p style="display: inline-block;margin-left:40px;">
						请上传JPG、PNG格式的图片，建议上传尺寸为<br>
						512px*512px的图片（图片过小会导致图片效果变虚）
					</p>
				</div>
			</div>
		</div>
		<div class="dialog pic-edit" id="createAppDialog">
			<a title="关闭" class="close" href="javascript:void()" onclick="closeCreateAppDialog()">关闭</a>
			<div class="dialog-hd">正在生成...</div>
			<div id="percent">0%</div>
			<div class="progress-bar">
				<span class="progress" id="create_bar"></span>
			</div>
			<div id="create_tip_msg" class="tip-msg">正在写入信息</div>
		</div>
	</div>
</div>
<input type="hidden" id="icon_pic_input" value="7">
<input type="hidden" id="is_text_input" value="<?php echo $info->icon_text_app==""?"no":"yes";?>">
<input type="hidden" id="launch_pic_input" value="<?php echo $info->poslaunch?$info->poslaunch:5;?>">
<input type="hidden" id="skin_color_input" value="<?php echo $info->skin_app;?>">
<input type="hidden" id="template_input" value="<?php echo $info->template_app;?>">
<div id="bkDiv" class="bk-div"></div>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/createapp.js" type="text/javascript"></script>