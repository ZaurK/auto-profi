<!-- skins/tpl/admin/auto/show.tpl begin -->
<div class="main">
<h3>Наши автомобили</h3>
<br />
<?php if(defined('IRB_ADMIN')){ ?>
<div style="float:left;"><a href="<?php echo href('mod=add')?>">Добавить</a></div>
<?php } ?>
<br />
<br />
<div id="imgcontainer">
<?php echo $rows; ?>
</div>
</div>

<!-- skins/tpl/admin/auto/show.tpl end -->
