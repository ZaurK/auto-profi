<?php

/**
* Ёкзамены контроллер
* @author IT studio IRBIS-team
* @copyright © 2011 IRBIS-team
*/
/////////////////////////////////////////////////////////

/**
* √енераци€ страницы ошибки при доступе вне системы
*/
    if(!defined('IRB_KEY'))
    {
       header("HTTP/1.1 404 Not Found");     
       exit(file_get_contents('../404.html'));
    }

	
	$stc = new Static_Model('documents');
$documents_content = $stc -> createContent();

    include IRB_ROOT .'/skins/tpl/documents/show.tpl';
    
   
    
