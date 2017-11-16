<!-- /skins/tpl/exams/show.tpl begin -->
<div class="main_text">
<?php if(defined('IRB_ADMIN')){ ?>
<div id="editlink">
<a href="<?php echo href('mod=edit'); ?>" id="menu1">Редактировать</a>
</div>
<?php } ?>

<?php echo $exams_content; ?>
</div>
<!-- /skins/tpl/exams/show.tpl end -->



