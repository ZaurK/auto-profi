<!-- skins/tpl/admin/auto/formtext.tpl begin -->
<h3>Правка текста</h3>
    <div class="main_edit">
<strong style="color:red"><?php echo getInfo($info); ?></strong>
<form action="" name="post" method="post" enctype="multipart/form-data" >
<?php include IRB_ROOT .'/skins/tpl/bbcode.tpl'; ?>
<textarea id="text" name="form[value1]" cols="120" rows="30"><?php echo $auto_content; ?></textarea>
<br /><br />
<input name="edit" type="submit" value="Сохранить" />
</form>
    </div>
	<br />
<!-- skins/tpl/admin/auto/formtext.tpl end -->