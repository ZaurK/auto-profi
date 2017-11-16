<?php
/**
* АДМИН-ПАНЕЛЬ
* О школе контроллер  
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

    $news = new Admin_Line_Model('news', $GET['num'], false);
    
    if($GET['mod'] === 'add')
    {
    // Блок добавления
        if($ok)
        {
            $img = '';
         // Если есть файл, пытемся загрузить картинку        
            if($_FILES['file']['error'] === 0)
            {
            $info[] = $news -> addNewsImg($lang_file_error);
            }
            if(empty($info[0]))
                $info[] = $news -> addNews($POST['value1'],
                                           $POST['value2'],
                                           $news->img);
           

            if(empty($info[0]))
                reDirect('mod=edit', 'parent='. $news->id);
            
        $title  = $POST['value1'];
        $text = $POST['value2'];
			        
         
        }    
     
        $rows = $text = $title = '';
        include IRB_ROOT .'/skins/tpl/admin/news/form.tpl';
    }    
    elseif($GET['mod'] === 'edit')
    {
    // Блок редактирования
        if($edit)
        {
            $img = '';
        // Если есть файл, пытемся загрузить картинку         
            if($_FILES['file']['error'] === 0)
            {
                $upload = new IRB_Upload_Img($lang_file_error);
                
                if($error = $upload -> uploadFile('file'))
                   $info[] = $error;
             
                $img = '[img]'. $upload -> new_name .'[/img]';        
            }
            // Если все прошло гладко, изменяем новость
            if(empty($info))
            {        
                $news->id = $GET['parent'];
                $info[] = $news -> editLine($POST['value1'], $POST['value2'] . $img);
            }
            // Опять гладко - сбрасываем POST параметры
            if(empty($info[0]))
                reDirect();
        }
        // Блок публикации
        if($ok)
        { 
            $news->id = $GET['parent'];
            $info[] = $news -> publicLine();
            
            if(empty($info[0]))
                reDirect('mod=all');
        }
        // Блок удаления     
        if($delete)
        { 
            $news->id = $GET['parent'];
            $info[] = $news -> deleteLine();
            
            if(empty($info[0]))
                reDirect('mod=all');
        } 
        
        // Блок отображения
        $news -> createFull($GET['parent']);
        $rows  = $news -> createRows('news/rows', 'all', IRB_LANG_BACK);
        $edit  = $news -> createEdit($GET['parent']);
        $text  = $edit['text'];
        $title = $edit['title'];
        include IRB_ROOT .'/skins/tpl/admin/news/form.tpl';    
    }
    else
    {  
    // Блок отображения ленты новостей
        $news->clear = true;
        $news -> createPreview(IRB_CONFIG_NUM_ROWS, IRB_CONFIG_NUM_WORDS);       
        $rows = $news -> createRows('news/rows', 'edit', IRB_LANG_EDIT); 
        $page_menu = $news->menu; 
        include IRB_ROOT .'/skins/tpl/news/show.tpl';        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    