<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $title; ?></title>
    <meta name="keywords" content="<?php echo $keywords; ?>" />  
    <meta name="description" content="<?php echo $description; ?>" />
    <link type="text/css" rel="stylesheet" href="/skins/css/style.css" />



    <script>
        !window.jQuery && document.write('<script src="/skins/js/jquery-1.4.3.min.js"><\/script>');
    </script>

    <script type="text/javascript" src="/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

    <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
     <link rel="stylesheet" href="style.css" />
    <script type="text/javascript">
        $(document).ready(function() {
            /*
            *   Examples - images
            */

            $("a[rel=example_group]").fancybox({
                'transitionIn'        : 'elastic',
                'transitionOut'        : 'elastic',
                'titlePosition'     : 'over',
                        'titleFormat'        : function(title, currentArray, currentIndex, currentOpts) {
                    return '<span id=""></span>';
                }
                
            });

        
        });
    </script>

<script type="text/javascript" src="skins/flash/swfobject.js"></script>


    <script type="text/javascript">
var flashvars = {};
var params = {
wmode: "opaque"
};
var attributes = {};
    swfobject.embedSWF("skins/flash/proff.swf", "myContent", "1000", "320", "9.0.0",
	"expressInstall.swf", flashvars, params, attributes);
    </script>

<!-- Contact Form -->
<script src="js/jquery.simplemodal.js" type="text/javascript"></script>
<script src='js/contact.js' type='text/javascript'></script>
<link type='text/css' href='css/contact.css' rel='stylesheet' media='screen' />
<!-- IE 6 hacks -->
<!--[if lt IE 7]>
<link type='text/css' href='css/contact_ie.css' rel='stylesheet' media='screen' />
<![endif]-->

<!-- форма связи -->

<script type="text/javascript">
		$(document).ready(function() {
			$('input[type="text"]').addClass("idleField");
       		$('input[type="text"]').focus(function() {
       			$(this).removeClass("idleField").addClass("focusField");
    		    if (this.value == this.defaultValue){ 
    		    	this.value = '';
				}
				if(this.value != this.defaultValue){
	    			this.select();
	    		}
    		});
    		$('input[type="text"]').blur(function() {
    			$(this).removeClass("focusField").addClass("idleField");
    		    if ($.trim(this.value) == ''){
			    	this.value = (this.defaultValue ? this.defaultValue : '');
				}
    		});
		});


$(document).ready(function() {
			$('textarea').addClass("idleField");
       		$('textarea').focus(function() {
       			$(this).removeClass("idleField").addClass("focusField");
    		    if (this.value == this.defaultValue){ 
    		    	this.value = '';
				}
				if(this.value != this.defaultValue){
	    			this.select();
	    		}
    		});
    		$('textarea').blur(function() {
    			$(this).removeClass("focusField").addClass("idleField");
    		    if ($.trim(this.value) == ''){
			    	this.value = (this.defaultValue ? this.defaultValue : '');
				}
    		});
		});						
	</script>



</head>



<body>

<div id="total">
<div id="header">

 
<div id="myContent">
      <p>Обновите Ваш флеш-плеер, загрузка флеш затруднена</p>
    </div>

</div>

<div id="right">
<? include IRB_ROOT .'/skins/tpl/right.tpl'; ?>

</div>
<div id="left">
<? include IRB_ROOT .'/skins/tpl/menu.tpl'; ?>
<? include IRB_ROOT .'/skins/tpl/left.tpl'; ?>

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
      <td width="300" valign="top">
	<p id="contacts_footer">Кабардино-Балкария, г. Нальчик, ул. Пачева, 23<br />email: auto-profi07@mail.ru</p></td>
    <td width="300" valign="top">
	<p id="contacts_footer">
Тел./факс: +7(8662)42-13-36<br />
 +7(928)70-66-111<br />
 +7(964)03-35-111</p></td>
    <td valign="top">

<p id="copyright_footer">© Автошкола Профессионал  2012-<? echo $date=date('Y'); ?>   </p>
<div style="float:right;">
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t44.10;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
//--></script><!--/LiveInternet-->
</div>
</td>
  </tr>
</table>

 

 
</div>
<!-- Load JavaScript files -->
</body>
</html>
