<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Админка</title>
    <link type="text/css" rel="stylesheet" href="/skins/css/style.css" />
<script type="text/javascript" language="javascript">     
    var irb_bb_path = '/skins/images/bb/';
</script>  

<script type="text/javascript" src="/skins/js/bb.js"></script>        

</head>

<body>
<?php if(isset($_SESSION['admin'])){ ?>    

<div id="admintotal">

<div id="adminheader">
<center><h1>Страница администратора</h1></center>
</div>

<div id="adminright">
</div>

<div id="adminleft">
<? include IRB_ROOT .'/skins/tpl/admin/menu.tpl'; ?>

</div>

<!-- content begin -->
<div id="admincontent">
<?php echo $content; ?>
</div>
<!-- content end -->

<div id="footer_guarantor">&nbsp;</div>
</div>
<div id="adminfooter">
 <p id="copyright_adminfooter">© Автошкола Профессионал 2012-<? echo $date=date('Y'); ?>   </p>
</div>
<?php }else{ ?>
<div style="margin-top:200px">
<center>
<h1>Вход на страницу администратора</h1>
<br />
<form action="" method="post">
<label>Логин</label>
<input name="form[value1]" type="text" />
&nbsp;&nbsp;&nbsp;<label>Пароль</label>
<input name="form[value2]" type="text" />
<br /><br />
<input name="ok" type="submit" value="Войти"  class="buttonstyle"/>
</form>
</center>
</div>
<?php } ?>
</body>
</html>
