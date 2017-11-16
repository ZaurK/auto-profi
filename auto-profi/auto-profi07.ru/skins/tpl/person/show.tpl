<!-- skins/tpl/person/show.tpl begin -->
<div class="main">
<h2>Наши профессионалы</h2>
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

<!-- skins/tpl/person/show.tpl end -->
