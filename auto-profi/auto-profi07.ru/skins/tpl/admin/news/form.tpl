<!-- skins/tpl/admin/news/form.tpl begin -->
<div class="line">
<form action="" name="post" method="post" enctype="multipart/form-data" >
<h2 class="line_head">Добавление или редактирование новости</h2>
<?php echo $rows; ?>
<strong style="color:red"><?php echo getInfo($info); ?></strong><br />
<?php include IRB_ROOT .'/skins/tpl/bbcode.tpl'; ?>
<input name="file" type="file" /><br />
Заголовок<br />
<input name="form[value1]" type="text" size="70" value="<?php echo $title; ?>" /><br />
Текст<br />
<textarea id="text" name="form[value2]" cols="120" rows="30"><?php echo $text; ?></textarea>
<br />
<?php if($GET['mod'] == 'edit'){ ?>
<input name="edit" type="submit" value="Редактировать" />
<input name="ok" type="submit" value="Опубликовать" />
<input name="delete" type="submit" 
       style="color:red; margin-left:100px" value="Удалить"
       onclick="return confirm('Точно?')"/>
<?php }else{ ?>
<input name="ok" type="submit" value="Добавить" />
<?php } ?>
</form>
</div>

<!-- skins/tpl/admin/news/form.tpl end -->
