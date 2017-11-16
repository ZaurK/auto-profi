<!-- skins/tpl/news/rows.tpl begin -->
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td colspan="2">
    <div id="line_row">
        <div id="line_date">
<?php echo $tpl_date; ?>
        </div>
<a href="<?php echo $tpl_url; ?>" id="menunews">        
<?php echo $tpl_title; ?>
</a>

    </div>
	
	
	</td>
  </tr>
  <tr>
  <td width="120">
  <?php echo $tpl_photo; ?>       
  
  </td>
  <td valign="top">
  
        <div id="line_text">
<?php echo $tpl_text; ?><br />
        </div>    
		</td>
  </tr>
</table>
 <a href="<?php echo $tpl_url; ?>" id="rlink"><?php echo $tpl_link; ?></a>    

</br></br>
<!-- skins/tpl/news/rows.tpl end -->
