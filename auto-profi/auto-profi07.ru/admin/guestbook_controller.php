<?php
/**
* АДМИН-ПАНЕЛЬ
* Гостевая контроллер  
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
///////////////////////////////////////////////////////////////

    $posts = new Admin_Guestbook_Model('guestbook', $GET['num'], false);
    
   
    if($GET['mod'] === 'edit')
    {
   
        // Блок публикации
        if($ok)
        { 
            $posts->id = $GET['parent'];
            $info[] = $posts -> publicPost();
            
            if(empty($info[0]))
                reDirect('page=guestbook');
        }
        // Блок удаления     
        if($delete)
        { 
            $posts->id = $GET['parent'];
            $info[] = $posts -> deletePost();
            
            if(empty($info[0]))
                reDirect('page=guestbook');
        } 
        
        // Блок отображения
        $posts -> createFull($GET['parent']);
        $rows  = $posts -> createRows('guestbook/rows', 'all', IRB_LANG_BACK);
        $edit  = $posts -> createEdit($GET['parent']);
        $text  = $edit['text'];
        $name = $edit['name'];
        include IRB_ROOT .'/skins/tpl/admin/guestbook/form.tpl';    
    }
    else
    {  

    // Блок отображения ленты 
        $posts->clear = true;
        $posts -> createPreviewAdmin(IRB_CONFIG_NUM_ROWS, IRB_CONFIG_NUM_WORDS);       
        $rows = $posts -> createRows('guestbook/rows', 'edit', IRB_LANG_EDIT); 
        $page_menu = $posts->menu; 
        include IRB_ROOT .'/skins/tpl/guestbook/show.tpl';        
    }   
    
    
    
    
    
    
    
    
    
    
    
    