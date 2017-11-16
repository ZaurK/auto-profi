<!-- skins/tpl/news/show.tpl begin -->
<?php if(defined('IRB_ADMIN')){ ?>
<div id="editlink">
<a href="<?php echo href('mod=add')?>" id="menu1">Добавить новость</a>
</div>
<?php } ?>
<div class="main">
<h1>Новости</h1>
<br />
<?php echo $rows; ?>
<div style="text-align:center">
<?php echo $page_menu; ?>
</div>
</div>

<!-- skins/tpl/news/show.tpl end -->
