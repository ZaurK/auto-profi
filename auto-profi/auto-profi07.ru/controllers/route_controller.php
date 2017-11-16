<?php

/**
* Контроллер
* @author IT studio IRBIS-team
* @copyright © 2011 IRBIS-team
*/
/////////////////////////////////////////////////////////

/**
* Генерация страницы ошибки при доступе вне системы
*/
    if(!defined('IRB_KEY'))
    {
       header("HTTP/1.1 404 Not Found");     
       exit(file_get_contents('../404.html'));
    }

	
	$stc = new Static_Model('route');
$route_content = $stc -> createContent();
$routeimg1 = '<a rel="example_group" href="'.IRB_HOST.'skins/images/route/scheme1.jpg">
<img src="'. IRB_HOST .'libs/preview_small.php?src='.IRB_HOST.'skins/images/route/scheme1.jpg"
title="Нажмите, чтобы увеличить" id="routeimgstyle"/>
</a>';
$routeimg2 = '<a rel="example_group" href="'.IRB_HOST.'skins/images/route/scheme2.jpg">
<img src="'. IRB_HOST .'libs/preview_small.php?src='.IRB_HOST.'skins/images/route/scheme2.jpg"
title="Нажмите, чтобы увеличить" id="routeimgstyle"/>
</a>';

    include IRB_ROOT .'/skins/tpl/route/show.tpl';
    
   
    
