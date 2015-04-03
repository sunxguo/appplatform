<div class="slider">
<?php foreach($navs as $item):?>
<h3 <?php echo $nav->id_nav==$item->id_nav?'class="current"':'';?>>
	<a href="/cmsmini/module?nav=<?php echo $item->id_nav;?>" id="menu_manageApp">
		<span class="ico" style="background:none;"><img src="<?php echo $item->icon_nav;?>" style="width: 30px;height: 30px;top: -13px;position: relative;"></span>
		<?php echo $item->name_nav;?>
	</a>
</h3>
<?php endforeach;?>
</div>