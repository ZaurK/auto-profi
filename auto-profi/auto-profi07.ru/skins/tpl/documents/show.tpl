﻿<!-- /skins/tpl/documents/show.tpl begin -->
<div class="main_text">
<?php if(defined('IRB_ADMIN')){ ?>
<div id="editlink">
<a href="<?php echo href('mod=edit'); ?>" id="menu1">Редактировать</a>
</div>
<?php } ?>

<?php echo $documents_content; ?>
</div>
<!-- /skins/tpl/documents/show.tpl end -->


