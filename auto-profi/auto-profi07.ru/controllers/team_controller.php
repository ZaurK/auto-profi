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

	
	$stc = new Static_Model('team');
$team_content = $stc -> createContent();


 $person = new Person_Model('person', $GET['num']);

    if($GET['mod'] === 'full')
    {       
        $person -> createFull($GET['parent']);
        $rows = $person -> createRowsFull('person/rows', 'all', IRB_LANG_BACK);
    }
    else
    {   
        $person->clear = true;
        $person -> createPreview(IRB_CONFIG_NUM_ROWS, IRB_CONFIG_NUM_WORDS);       
        $rows = $person -> createRows('person/rows', 'full', IRB_LANG_FULL); 
    }

    include IRB_ROOT .'/skins/tpl/team/show.tpl';
    
   
    
