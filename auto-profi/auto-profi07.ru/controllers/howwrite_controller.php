<?php

/**
* Контроллер как записаться
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

	
	$stc = new Static_Model('howwrite');
$howwrite_content = $stc -> createContent();

    include IRB_ROOT .'/skins/tpl/howwrite/show.tpl';
    
   
    
