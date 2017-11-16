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

/**
* Текст на странице
*/

$stc = new Static_Model('auto');

    if($GET['mod'] === 'edittext')
{
    if($edit)
{
$stc -> saveContent($POST['value1']);
reDirect('page=auto');
}
    $auto_content = $stc -> editContent();
include IRB_ROOT .'/skins/tpl/admin/auto/formtext.tpl';
}
else
{
$auto_content = $stc -> createContent();
  
include IRB_ROOT .'/skins/tpl/admin/auto/showtext.tpl';    
    }    


/**
* Блок автомобилей
*/

    $auto = new Admin_Auto_Model('auto', $GET['num'], false);
    
    if($GET['mod'] === 'add')
    {
    // Блок добавления
        if($ok)
        {
            $img = '';
         // Если есть файл, пытаемся загрузить картинку        
            if($_FILES['file']['error'] === 0)
            {
            $info[] = $auto -> addAutoImg($lang_file_error);
            }
            if(empty($info[0]))
                $info[] = $auto -> addAuto($POST['value1'],
                                           $POST['value2'],
                                           $auto->img);
           

            if(empty($info[0]))
                reDirect('mod=edit', 'parent='. $auto->id);
            
        $name  = $POST['value1'];
        $text = $POST['value2'];
			        
         
        }    
     
        $rows = $text = $name = '';
        include IRB_ROOT .'/skins/tpl/admin/auto/form.tpl';
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
                $auto->id = $GET['parent'];
                $info[] = $auto -> editAuto($POST['value1'], $POST['value2'] . $img);
            }
            // Опять гладко - сбрасываем POST параметры
            if(empty($info[0]))
                reDirect('mod=all');
        }
        // Блок публикации
        if($ok)
        { 
            $auto->id = $GET['parent'];
            $info[] = $auto -> publicAuto();
            
            if(empty($info[0]))
                reDirect('mod=all');
        }
        // Блок удаления     
        if($delete)
        { 
            $auto->id = $GET['parent'];
            $info[] = $auto -> deleteAuto();
            
            if(empty($info[0]))
                reDirect('mod=all');
        } 
        
        // Блок отображения
        $auto -> createFull($GET['parent']);
        $rows  = $auto -> createRows('admin/auto/rows1', 'all', IRB_LANG_BACK);
        $edit  = $auto -> createEdit($GET['parent']);
        $text  = $edit['text'];
        $name = $edit['name'];
        include IRB_ROOT .'/skins/tpl/admin/auto/form.tpl';    
    }
	
    else
    {  
    // Блок отображения ленты 
        $auto->clear = true;
        $auto -> createPreview(IRB_CONFIG_NUM_ROWS, IRB_CONFIG_NUM_WORDS);       
        $rows = $auto -> createRows('admin/auto/rows', 'edit', IRB_LANG_EDIT); 
        include IRB_ROOT .'/skins/tpl/admin/auto/show.tpl';        
    }
