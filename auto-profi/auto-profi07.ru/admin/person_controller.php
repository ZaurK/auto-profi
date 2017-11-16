<?php
/**  
* АДМИН-ПАНЕЛЬ
* Персоны контроллер  
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

    $person = new Admin_Person_Model('person', $GET['num'], false);
    
    if($GET['mod'] === 'add')
    {
    // Блок добавления
        if($ok)
        {
            $img = '';
         // Если есть файл, пытаемся загрузить картинку        
            if($_FILES['file']['error'] === 0)
            {
            $info[] = $person -> addPersonImg($lang_file_error);
            }
            if(empty($info[0]))
                $info[] = $person -> addPerson($POST['value1'],
                                           $POST['value2'],
                                           $person->img);
           

            if(empty($info[0]))
                reDirect('mod=edit', 'parent='. $person->id);
            
        $name  = $POST['value1'];
        $text = $POST['value2'];
			        
         
        }    
     
        $rows = $text = $name = '';
        include IRB_ROOT .'/skins/tpl/admin/person/form.tpl';
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
                $person->id = $GET['parent'];
                $info[] = $person -> editPerson($POST['value1'], $POST['value2'] . $img);
            }
            // Опять гладко - сбрасываем POST параметры
            if(empty($info[0]))
                reDirect();
        }
        // Блок публикации
        if($ok)
        { 
            $person->id = $GET['parent'];
            $info[] = $person -> publicPerson();
            
            if(empty($info[0]))
                reDirect('mod=all');
        }
        // Блок удаления     
        if($delete)
        { 
            $person->id = $GET['parent'];
            $info[] = $person -> deletePerson();
            
            if(empty($info[0]))
                reDirect('mod=all');
        } 
        
        // Блок отображения
        $person -> createFull($GET['parent']);
        $rows  = $person -> createRows('person/rows', 'all', IRB_LANG_BACK);
        $edit  = $person -> createEdit($GET['parent']);
        $text  = $edit['text'];
        $name = $edit['name'];
        include IRB_ROOT .'/skins/tpl/admin/person/form.tpl';    
    }
    else
    {  
    // Блок отображения ленты 
        $person->clear = true;
        $person -> createPreview(IRB_CONFIG_NUM_ROWS, IRB_CONFIG_NUM_WORDS);       
        $rows = $person -> createRows('admin/person/rows', 'edit', IRB_LANG_EDIT); 
        include IRB_ROOT .'/skins/tpl/person/show.tpl';        
    }
