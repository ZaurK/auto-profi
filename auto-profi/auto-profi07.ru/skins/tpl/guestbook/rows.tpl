<!-- skins/tpl/guestbook/rows.tpl begin -->
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td>
    <div id="line_row">
        <div id="line_date">
<?php echo $tpl_date; ?>
        </div>
<strong>      
<?php echo $tpl_name; ?>
</strong>
    </div>
	
	
	</td>
  </tr>
  <tr>
  <td valign="top">
  
        <div id="line_text">
<?php echo $tpl_text; ?><br />
        </div>    
		</td>
  </tr>
</table>
<?php if(defined('IRB_ADMIN')){ ?>
 <a href="<?php echo $tpl_url; ?>" id="rlink"><?php echo $tpl_link; ?></a>    
<?php } ?>

</br></br>
<!-- skins/tpl/guestbook/rows.tpl end -->
