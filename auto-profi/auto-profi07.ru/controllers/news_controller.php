<?php

/**
* * Главный контроллер  
* @copyright © 2012 ZaurK 
* Основа © 2011 IRBIS-team
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
   
    $news = new Line_Model('news', $GET['num']);

    if($GET['mod'] === 'full')
    {       
        $news -> createFull($GET['parent']);
        $rows = $news -> createRowsFull('news/rows', 'all', IRB_LANG_BACK);
        $page_menu = '';
    }
    else
    {   
        $news->clear = true;
        $news -> createPreview(IRB_CONFIG_NUM_ROWS, IRB_CONFIG_NUM_WORDS);       
        $rows = $news -> createRows('news/rows', 'full', IRB_LANG_FULL); 
        $page_menu = $news->menu;       
    }

    include IRB_ROOT .'/skins/tpl/news/show.tpl';

    