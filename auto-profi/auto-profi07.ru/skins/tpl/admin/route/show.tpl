<!-- /skins/tpl/admin/route/show.tpl begin -->
<div class="main_text">
<?php if(defined('IRB_ADMIN')){ ?>
<div id="editlink">
<a href="<?php echo href('mod=edit'); ?>" id="menu1">Редактировать</a>
</div>
<?php } ?>

<?php echo $route_content; ?>
<?php if(defined('IRB_ADMIN')){ ?>
<?php } ?>

</div>
<!-- /skins/tpl/admin/route/show.tpl end -->



