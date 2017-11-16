<!-- skins/tpl/admin/guestbook/form.tpl begin -->
<div class="line">
<form action="" name="post" method="post" enctype="multipart/form-data" >
<h2 class="line_head">Публикация или удаление записи</h2>
<?php echo $rows; ?>
<strong style="color:red"><?php echo getInfo($info); ?></strong><br />
<br />
<?php if($GET['mod'] == 'edit'){ ?>
<input name="ok" type="submit" value="Опубликовать" />
<input name="delete" type="submit" 
       style="color:red; margin-left:100px" value="Удалить"
       onclick="return confirm('Точно?')"/>
<?php } ?>
</form>
</div>

<!-- skins/tpl/admin/guestbook/form.tpl end -->
