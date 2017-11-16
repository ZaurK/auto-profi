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

$stc = new Static_Model('about');

    if($GET['mod'] === 'edit')
{
    if($edit)
{
$stc -> saveContent($POST['value1']);
reDirect('page=about');
}
 
    $about_content = $stc -> editContent();
include IRB_ROOT .'/skins/tpl/admin/about/form.tpl';
}
else
{

     
$about_content = $stc -> createContent();
  
include IRB_ROOT .'/skins/tpl/about/show.tpl';    
    }    
    