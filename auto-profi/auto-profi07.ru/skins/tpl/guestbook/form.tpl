<!-- skins/tpl/admin/guestbook/form.tpl begin -->
<div class="line">
<form action=""  name="post" method="post"  enctype="multipart/form-data" >
<h1>Отзывы</h1>
<strong style="color:red"><?php echo getInfo($info); ?></strong><br />
Имя:<br />
<input name="form[value1]" name="status" id="status" value="Представьтесь, пожалуйста" type="text" size="70" /><br />
Сообщение:<br />
<textarea id="gtext" name="form[value2]" cols="120" rows="5" name="text">Оставьте свой отзыв...</textarea>
<br /><br />
<input name="ok" type="submit" value="Отправить" />
</form>
</div>

