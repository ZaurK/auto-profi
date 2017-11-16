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


	$stc = new Static_Model('auto');
$auto_content = $stc -> createContent();


 $auto = new Auto_Model('auto', $GET['num']);

    if($GET['mod'] === 'full')
    {       
        $auto -> createFull($GET['parent']);
        $rows = $auto -> createRowsFull('auto/rows', 'all', IRB_LANG_BACK);
    }
    else
    {   
        $auto->clear = true;
        $auto -> createPreview(IRB_CONFIG_NUM_ROWS, IRB_CONFIG_NUM_WORDS);       
        $rows = $auto -> createRows('auto/rows', 'full', IRB_LANG_FULL); 
    }

    include IRB_ROOT .'/skins/tpl/auto/show.tpl';
    
   
    
