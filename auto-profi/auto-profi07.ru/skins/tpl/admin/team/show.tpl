<!-- /skins/tpl/admin/team/show.tpl begin -->
<div class="main_text">
<?php if(defined('IRB_ADMIN')){ ?>
<div id="editlink">
<a href="<?php echo href('mod=edit'); ?>" id="menu1">Редактировать</a>
</div>
<?php } ?>

<?php echo $team_content; ?>
<?php if(defined('IRB_ADMIN')){ ?>
<div id="editlink">
   <a href="<?php echo href('page=person'); ?>" id="menu1">Наши профессионалы</a> 
 
</div>
<?php } ?>

</div>
<!-- /skins/tpl/admin/team/show.tpl end -->



