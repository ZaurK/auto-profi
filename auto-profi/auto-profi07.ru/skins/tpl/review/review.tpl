<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $title; ?></title>
    <meta name="keywords" content="<?php echo $keywords; ?>" />  
    <meta name="description" content="<?php echo $description; ?>" />
    <link type="text/css" rel="stylesheet" href="/skins/css/style.css" />
<script type="text/javascript" language="javascript">     
    var irb_bb_path = '/skins/images/bb/';
</script>  
<script type="text/javascript" src="/skins/js/bb.js"></script>        

</head>

<body>
<div id="total">
<div id="header">

</div>

<div id="right">
</div>
<div id="left">
<? include IRB_ROOT .'/skins/tpl/menu.tpl'; ?>
</div>


<!-- content begin -->
<div id="content">
<?php echo $content; ?>
</div>
<!-- content end -->

<div id="footer_guarantor">&nbsp;</div>
</div>
<div id="footer">
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td width="600" valign="top">
	<p id="contacts_footer">Кабардино-Балкария, г. Нальчик, ул. Неделина, д.10<br />email: titan_kbr@mail.ru</p></td>
    <td width="200" valign="top">
	<p id="contacts_footer">Тел.:
 +7(8662)96-22-25<br />
 +7(909)487-73-51<br />
 +7(928)915-21-68</p></td>
    <td valign="top"><p id="copyright_footer">© ООО Титан  2012-<? echo $date=date('Y'); ?>   </p></td>
  </tr>
</table>

 

 
</div>
</body>
</html>
