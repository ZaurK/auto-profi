<!-- skins/tpl/admin/person/form.tpl begin -->
<div class="line">
<form action="" name="post" method="post" enctype="multipart/form-data" >
<?php echo $rows; ?>
<strong style="color:red"><?php echo getInfo($info); ?></strong><br />
Фамилия Имя Отчество<br />
<input name="form[value1]" type="text" size="70" value="<?php echo $name; ?>" /><br />
Информация<br />
<textarea id="text" name="form[value2]" cols="70" rows="20"><?php echo $text; ?></textarea>
<br /><br />
Фотография<br />
<input name="file" type="file" /><br /><br />

<?php if($GET['mod'] == 'edit'){ ?>
<input name="edit" type="submit" value="Сохранить изменения" />
<input name="ok" type="submit" value="Опубликовать" />
<input name="delete" type="submit" 
       style="color:red; margin-left:100px" value="Удалить"
       onclick="return confirm('Точно?')"/>
	   
<?php }else{ ?>
<br />
<input name="ok" type="submit" value="Добавить" />
<?php } ?>
</form>
</div>

<!-- skins/tpl/admin/person/form.tpl end -->
