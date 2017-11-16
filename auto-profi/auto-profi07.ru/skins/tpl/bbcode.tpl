<!-- skins/tpl/bbcode.tpl begin -->


<select class="quest_input" name="color" 
onchange="click_bb('text', 'color=' + this.options[this.selectedIndex].value)">
  <option value="цвет">цвет</option>
  <option value="gray">серый</option>
  <option value="green">зеленый</option>
  <option value="purple">фиолетовый</option>
  <option value="olive">оливковый</option>
  <option value="silver">серебряный</option>
  <option value="aqua">морской</option>
  <option value="yellow">желтый</option>
  <option value="blue">синий</option>
  <option value="orange">оранжевый</option>
  <option value="red">красный</option>  
</select>
&nbsp;
<select class="quest_input" name="size" 
onchange="click_bb('text', 'size=' + this.options[this.selectedIndex].value)">
  <option value="размер">размер</option>
  <option value="1">мелкий</option>
  <option value="2">небольшой</option>
  <option value="3">средний</option>
  <option value="4">большой</option>
  <option value="5">огромный</option>
</select>
&nbsp;
<select class="quest_input" name="head" 
onchange="click_bb('text', 'h=' + this.options[this.selectedIndex].value)">
  <option value="размер">заголовки</option>
  <option value="1">H1</option>
  <option value="2">H2</option>
  <option value="3">H3</option>
  <option value="4">H4</option>
  <option value="5">H5</option>
</select>
<br />

<img id="1" src="<?php echo IRB_HOST ?>/skins/images/bb/bold.gif" 
onmouseover="change(1, 'bold_on')" onmouseout="change(1, 'bold')" 
onclick="click_bb('text', 'b');" />&nbsp;
<img id="2" src="<?php echo IRB_HOST ?>/skins/images/bb/italics.gif" 
onmouseover="change(2, 'italics_on')" onmouseout="change(2, 'italics')" 
onclick="click_bb('text', 'i');" />&nbsp;
<img id="3" src="<?php echo IRB_HOST ?>/skins/images/bb/underline.gif" 
onmouseover="change(3, 'underline_on')" onmouseout="change(3, 'underline')" 
onclick="click_bb('text', 'u');" />&nbsp;
<img id="4" src="<?php echo IRB_HOST ?>/skins/images/bb/strikethrough.gif" 
onmouseover="change(4, 'strikethrough_on')" onmouseout="change(4, 'strikethrough')" 
onclick="click_bb('text', 's');" />&nbsp;
<img id="5" src="<?php echo IRB_HOST ?>/skins/images/bb/subscript.gif" 
onmouseover="change(5, 'subscript_on')" onmouseout="change(5, 'subscript')" 
onclick="click_bb('text', 'sub');" />&nbsp;
<img id="6" src="<?php echo IRB_HOST ?>/skins/images/bb/superscript.gif" 
onmouseover="change(6, 'superscript_on')" onmouseout="change(6, 'superscript')" 
onclick="click_bb('text', 'sup');" />&nbsp;
<img id="7" src="<?php echo IRB_HOST ?>/skins/images/bb/justify.gif" 
onmouseover="change(7, 'justify_on')" onmouseout="change(7, 'justify')" 
onclick="click_bb('text', 'justify');" />&nbsp;
<img id="8" src="<?php echo IRB_HOST ?>/skins/images/bb/left.gif" 
onmouseover="change(8, 'left_on')" onmouseout="change(8, 'left')" 
onclick="click_bb('text', 'left');" />&nbsp;
<img id="9" src="<?php echo IRB_HOST ?>/skins/images/bb/center.gif" 
onmouseover="change(9, 'center_on')" onmouseout="change(9, 'center')" 
onclick="click_bb('text', 'center');" />&nbsp;
<img id="10" src="<?php echo IRB_HOST ?>/skins/images/bb/right.gif" 
onmouseover="change(10, 'right_on')" onmouseout="change(10, 'right')" 
onclick="click_bb('text', 'right');" />&nbsp;  
<img id="11" src="<?php echo IRB_HOST ?>/skins/images/bb/list_ordered.gif" 
onmouseover="change(11, 'list_ordered_on')" onmouseout="change(11, 'list_ordered')" 
onclick="click_bb('text', 'list=ol');" />&nbsp;
<img id="12" src="<?php echo IRB_HOST ?>/skins/images/bb/list_unordered.gif" 
onmouseover="change(12, 'list_unordered_on')" onmouseout="change(12, 'list_unordered')" 
onclick="click_bb('text', 'list=ul');" />&nbsp;
<img id="22" src="<?php echo IRB_HOST ?>/skins/images/bb/li.gif" 
onmouseover="change(22, 'li_on')" onmouseout="change(22, 'li')" 
onclick="click_bb('text', '*');" />&nbsp;
<img id="20" src="<?php echo IRB_HOST ?>/skins/images/bb/insert_hyperlink.gif" 
onmouseover="change(20, 'insert_hyperlink_on')" onmouseout="change(20, 'insert_hyperlink')" 
onclick="click_url();" />&nbsp;
<img id="21" src="<?php echo IRB_HOST ?>/skins/images/bb/insert_picture.gif" 
onmouseover="change(21, 'insert_picture_on')" onmouseout="change(21, 'insert_picture')" 
onclick="click_bb('text', 'img');" />&nbsp;

<br /> 

<!-- skins/tpl/bbcode.tpl end -->
