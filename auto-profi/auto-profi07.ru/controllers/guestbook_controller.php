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

///////////////////////////////////////////////////////////////

    $posts = new Guestbook_Model('guestbook', $GET['num'], false);


    // Блок добавления
        if($ok)
        {
            if(empty($info[0]))
                $info[] = $posts -> addPost($POST['value1'],
                                           $POST['value2']
                                          );
           

            if(empty($info[0]))
                reDirect('page=goguestbook');
            
        $name  = $POST['value1'];
        $text = $POST['value2'];
			        
         
        }    
        $rows = $text = $title = '';
        include IRB_ROOT .'/skins/tpl/guestbook/form.tpl';
       
	    // Блок отображения ленты 
        $posts->clear = true;
        $posts -> createPreview(IRB_CONFIG_NUM_ROWS, IRB_CONFIG_NUM_WORDS);       
        $rows = $posts -> createRows('guestbook/rows', 'edit', IRB_LANG_EDIT); 
        $page_menu = $posts->menu; 
        include IRB_ROOT .'/skins/tpl/guestbook/show.tpl';        
